<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_pages;
use App\Models\cocogen_admin_pages_news;
use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_breadcrumbs;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_itp_countries;
use App\Models\cocogen_payment_bank_list;
use App\Models\cocogen_international_trans;
use App\Models\cocogen_international_trans_destination;
use App\Models\cocogen_payment_trans;
use App\Models\cocogen_ctpl_clientinfo;
use App\Models\cocogen_quote_request;
use App\Models\cocogen_ctpl_vehicleinfo;
use App\Models\location;
use GuzzleHttp\Client;
use App\Models\cocogen_ctpl_trans;
use App\Models\cocogen_domestic_trans;
use App\Models\cocogen_domestic_trans_destination;
use App\Models\cocogen_meta;
use Illuminate\Support\Collection;
use DB;

class paymentv2 extends Controller
{


    public function testpage()
    {
       //return view('testpage');
    }

    public function payment($digest, $product, $trans)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_itp_countries = cocogen_itp_countries::where('block', '=', "N")->orderBy('country', 'Asc')->get();
        $provinces = location::select('province')->distinct('province')->orderBy('province', 'asc')->get();

        $title = "Payment | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $productname = "";
        $amount = "0.00";
        $transaction = "";
        $data = "";
        $destination = "";
        //get data and validate
        $product = base64_decode($product);
        $trans = base64_decode($trans);
        if($product === "ITP"){
            $cocogen_international_trans = cocogen_international_trans::where('id', '=',$trans)->get();
            $sha_email = $cocogen_international_trans[0]["email"];
            $sha_created = $cocogen_international_trans[0]["created_at"];
            $sha = $trans . ":" . $sha_email . ":" . $sha_created;
            $hashedString = sha1($sha);
            if($digest === $hashedString){
                $data = $cocogen_international_trans;
                $productname = "International Travel Excel Plus";
                $amount = $cocogen_international_trans[0]["final_amount_piso"];
                $transaction = $cocogen_international_trans[0]["trans_id"];

                $cocogen_international_trans_destination = cocogen_international_trans_destination::where('trans_id', '=',$transaction)->get();
                if(count($cocogen_international_trans_destination)>0){

                    foreach($cocogen_international_trans_destination as $dest){
                        if(!$destination){
                            $destination = $dest->destination;
                        }else{
                            $destination = $destination.', '.$dest->destination;
                        }
                    }
                }
            }else{
                return redirect('/get-quote/international-travel-excel-plus/failed');
            }

        }

        // if($product === "CTPL"){
        //     $data = cocogen_ctpl_trans::where('tnxid', '=',$trans)->first();
        //     $sha_email = $data->emailAddress;
        //     $sha_created = $data->created_at;
        //     $salt = "COCOGENINNOVATION";
        //     $transaction = $trans;
        //     $sha = $salt . ":" . $trans . ":" . $sha_email . ":" . $sha_created;
        //     $hashedString = sha1($sha);
        //     $productname = "CTPL";
        //     if($digest === $hashedString){
        //     }else{
        //         return redirect('/get-quote/ctpl-insurance/ctpl/failed');
        //     }
        // }

        if($product === "DOMESTIC"){
            $data = cocogen_domestic_trans::where('trans_id', '=',$trans)->get();
            $sha_email = $data[0]['email_add'];
            $sha_created = $data[0]['created_at'];
            $salt = "COCOGENINNOVATION";
            $transaction = $trans;
            $sha = $salt . ":" . $trans . ":" . $sha_email . ":" . $sha_created;
            $hashedString = sha1($sha);
            $productname = "DOMESTIC";
            if($digest === $hashedString){

                $destinations = cocogen_domestic_trans_destination::where('trans_id', '=',$trans)->get();

                $destination = $destinations->pluck('destination')->toArray();

                $destination = implode(', ', $destination);
            }else{
                return redirect('/get-quote/ctpl-insurance/ctpl/failed');
            }
        }
        $merchantId = env('MERCHANT_ID');  // Replace with your actual merchant ID
        $apiKey = env('MERCHANT_PASSWORD');  // Replace with your actual collection API key
        // dd(env('MERCHANT_ID'), env('MERCHANT_PASSWORD'),$merchantId,$apiKey);

        // Combine merchant ID and API key, then base64 encode them for Basic Auth
        $credentials = $merchantId . ':' . $apiKey;
        $encodedCredentials = base64_encode($credentials);

        // Initialize Guzzle client
        $client = new Client();

        // Define the Dragonpay endpoint for retrieving available processors (hypothetical URL)
        $url = 'https://test.dragonpay.ph/api/collect/v2/processors/available/50000';  // Replace with actual endpoint
        // $url = 'https://gw.dragonpay.ph/api/collect/v2/processors';  // Replace with actual endpoint

        // Set the headers for the HTTP request (including Authorization)
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $encodedCredentials,  // Basic authentication header
        ];

        try {
            // Make the GET request to retrieve available processors
            $response = $client->get($url, [
                'headers' => $headers,
                'timeout' => 10,  // Optional timeout setting in seconds
            ]);

            // Get response body and status code
            $responseBody = $response->getBody()->getContents();
            $statusCode = $response->getStatusCode();
            $responseJson = json_decode($responseBody, true);
            //dd( $responseJson);
            $onlinebank = [];
            $ewallet = [];
            $otcbanking = [];
            $otcnonbanking = [];
            //dd($responseJson);
            $test="";
            foreach($responseJson as $responseJsons){

                if($responseJsons['type'] === 1){

                    $onlinebank[] = [
                        'procId' => $responseJsons['procId'],
                        'shortName' => $responseJsons['shortName'],
                        'longName' => $responseJsons['longName'],
                        'logo' => $responseJsons['logo'],
                        'status' => $responseJsons['status'],
                        'type' => $responseJsons['type']
                    ];
                }
                if($responseJsons['type'] === 8){


                    $ewallet[] = [
                        'procId' => $responseJsons['procId'],
                        'shortName' => $responseJsons['shortName'],
                        'longName' => $responseJsons['longName'],
                        'logo' => $responseJsons['logo'],
                        'status' => $responseJsons['status'],
                        'type' => $responseJsons['type']
                    ];
                }

                if($responseJsons['type'] === 2){
                    $otcbanking[] = [
                        'procId' => $responseJsons['procId'],
                        'shortName' => $responseJsons['shortName'],
                        'longName' => $responseJsons['longName'],
                        'logo' => $responseJsons['logo'],
                        'status' => $responseJsons['status'],
                        'type' => $responseJsons['type']
                    ];
                }
                if($responseJsons['type'] === 4){
                    $otcnonbanking[] = [
                        'procId' => $responseJsons['procId'],
                        'shortName' => $responseJsons['shortName'],
                        'longName' => $responseJsons['longName'],
                        'logo' => $responseJsons['logo'],
                        'status' => $responseJsons['status'],
                        'type' => $responseJsons['type']
                    ];
                }

            }
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Invalid JSON response: " . json_last_error_msg();
                return;
            }

        } catch (\Exception $e) {
        }
        return view('payment.payment', ['cocogen_itp_countries' => $cocogen_itp_countries,
        'data' => $data,
        'product' => $product,
        'productname' => $productname,
        'destination' => $destination,
        'amount' => $amount,
        'transaction' => $transaction,
        'provinces' => $provinces,
        'ewallets' => $ewallet,
        'otcbankings' => $otcbanking,
        'otcnonbankings' => $otcnonbanking,
        'cocogen_payment_bank_list_banks' => $onlinebank,
        'title' => $title,
        'cocogen_admin_footer' => $cocogen_admin_footer,
        'cocogen_admin_productlink' => $cocogen_admin_productlink,
        'cocogen_admin_main' => $cocogen_admin_main,
        'cocogen_admin_submain' => $cocogen_admin_submain,
        'cocogen_admin_subchild' => $cocogen_admin_subchild,
        'metadescription' => $metadescription,
        'keyword' => $keyword]);
    }

    public function pendingPayment()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Pending Payment";
        $metadescription = "";
        $keyword = "";

        return view('payment.pendingpayment', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription, 'keyword' => $keyword]);
    }

    public function failedPayment(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_payment_trans = cocogen_payment_trans::where('transaction', '=',$request->input('txnid'))->get();
        // Extracting the 2nd to 4th letters
        $substring = substr($request->input('message'), 1, 3);
        $amount = 0;
        $payment = "";
        $product = "";
        $reason = "";
        if((int)$substring === 107){
            $reason = "Transaction canceled";
        } elseif ((int)$substring === 108) {
            $reason = "Insufficient funds";
        } elseif ((int)$substring === 109) {
           $reason = "Transaction limit exceeded";
        }else{
            $reason ="An unexpected error has occurred. Please try again later.";
        }
            // Starting from index 1 (second character), take 3 characters

        if(count($cocogen_payment_trans)>0){
            $amount = $cocogen_payment_trans[0]['amount'];
            $product = $cocogen_payment_trans[0]['product'];
            if($cocogen_payment_trans[0]['paymentMethod']=== "creditCard"){
                $payment = "Credit Card";
            } elseif ($cocogen_payment_trans[0]['paymentMethod']=== "bank") {
                $payment = "Debit Card";
            } elseif ($cocogen_payment_trans[0]['paymentMethod']=== "ewallet") {
                $payment = "E-wallet";
            } elseif ($cocogen_payment_trans[0]['paymentMethod']=== "otc") {
                $payment = "Over the Counter";
            }
        }
        $title = "Failed Payment";
        $metadescription = "";
        $keyword = "";
        return view('payment.failedpayment', ['title' => $title,
         'reason' => $reason,
         'payment' => $payment,
         'amount' => $amount,
         'product' => $product,
         'cocogen_admin_footer' => $cocogen_admin_footer,
         'cocogen_admin_productlink' => $cocogen_admin_productlink,
         'cocogen_admin_main' => $cocogen_admin_main,
         'cocogen_admin_submain' => $cocogen_admin_submain,
         'cocogen_admin_subchild' => $cocogen_admin_subchild,
         'metadescription' => $metadescription,
         'keyword' => $keyword]);
    }

    public function getquotepending($product)
    {
        $link = '/get-quote';
        return redirect()->route('getquote', ['status' => "pending", 'product' => $product]);
    }

    public function getquotecancelled($product)
    {
        return redirect()->route('getquotestatus', ['status' => "cancelled", 'product' => $product]);
    }

    public function getquotefailed($product)
    {
        $link = '/get-quote';
        return redirect()->route('getquote', ['status' => "failed", 'product' => $product]);
    }

    public function makeRequest(Request $request)
    {
        $cocogen_payment_trans = new cocogen_payment_trans;
        $cocogen_payment_trans->product = $request->input('hdn_product');
        $cocogen_payment_trans->transaction = $request->input('hdn_transaction');
        $cocogen_payment_trans->amount = $request->input('hdn_amount');
        $cocogen_payment_trans->paymentMethod = $request->input('hdn_payment_mode');
        $cocogen_payment_trans->paymentBank = $request->input('paymentOption_specific');
        $cocogen_payment_trans->bankFullName = $request->input('bank_full_name');
        $cocogen_payment_trans->bankEmail = $request->input('bank_email_address');
        $cocogen_payment_trans->bankContact = $request->input('bank_mobile');
        $cocogen_payment_trans->CCFullName = $request->input('credit_card_full_name');
        $cocogen_payment_trans->CCEmail = $request->input('credit_card_email_address');
        $cocogen_payment_trans->CCMobile = $request->input('credit_card_mobile');
        $cocogen_payment_trans->CCCountry = $request->input('credit_card_country');
        $cocogen_payment_trans->CCProvince = $request->input('credit_card_province');
        $cocogen_payment_trans->CCCity = $request->input('credit_card_city');
        $cocogen_payment_trans->CCBarangay = $request->input('credit_card_barangay');
        $cocogen_payment_trans->CCStreet = $request->input('credit_card_street');
        $cocogen_payment_trans->CCZIP = $request->input('credit_card_zip');
        $cocogen_payment_trans->save();


        $merchantId = env('MERCHANT_ID');  // Replace with your actual merchant ID
        $apiKey = env('MERCHANT_PASSWORD');  // Replace with your actual collection API key

        // Combine merchant ID and API key, then base64 encode them
        $credentials = $merchantId . ':' . $apiKey;
        $encodedCredentials = base64_encode($credentials);
        // dd($request);
        $client = new Client();
        $tnxid =$request->input('hdn_transaction');
        if($request->input('hdn_payment_mode') === "creditCard"){
            $url = 'https://test.dragonpay.ph/api/collect/v2/'.$tnxid.'/post'; // Replace with your actual API endpoint
            // $data = [
            //     "Amount" => $request->input('hdn_amount'),           // Amount to be paid
            //     "Currency" => "PHP",            // Currency (PHP for Philippine Peso)
            //     "Description" => $tnxid, // Description of the transaction
            //     "Email" => $request->input('credit_card_email_address'),    // Customer's email
            //     "ProcId" =>  "CC"
            //     ];

                $data = [
                    "Amount" => $request->input('hdn_amount'),
                    "Currency" => "PHP",
                    "Description" => $tnxid,
                    "Email" => $request->input('credit_card_email_address'),
                    "ProcId" => "CC",
                    "Param1" => "Test parameter 1",
                    "Param2" => "Test parameter 2",
                    "BillingDetails" => [
                        "FirstName" =>  $request->input('credit_card_email_address'),
                        "MiddleName" => "-",
                        "LastName" => "-",
                        "Address1" => "-",
                        "Address2" => "-",
                        "Workshop" => "-", // Assumed field
                        "City" => $request->input('credit_card_city'),
                        "Province" => $request->input('credit_card_province'),
                        "Country" => "PH",
                        "ZipCode" => $request->input('credit_card_email_address'),
                        "TelNo" => "-",
                        "Email" => $request->input('credit_card_email_address')
                    ],
                    "IpAddress" => "-",
                    "UserAgent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36"
                ];


                $headers = [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $encodedCredentials,  // Add Authorization header with encoded credentials
                ];
                $response = $client->post($url, [
                    'headers' => $headers,
                    'json' => $data,
                    'timeout' => 10,  // Optional timeout setting in seconds
                ]);

                // Parse the response
                $responseBody = $response->getBody();
                $statusCode = $response->getStatusCode();
                $responseJson = json_decode($responseBody, true);
                info($responseJson);
                 // Handle the response
            if ($statusCode === 200 && isset($responseJson['Url'])) {
                // Redirect the user to the provided URL
                header("Location: " . $responseJson['Url']);
                exit();
            } else {
                // Handle failure or unexpected status
                echo "Transaction failed with status code: " . $statusCode;
            }

        }
        // dd($request);
        if($request->input('hdn_payment_mode') === "bank"  || $request->input('hdn_payment_mode') === "ewallet" || $request->input('hdn_payment_mode') === "otc"){
            $url = 'https://test.dragonpay.ph/api/collect/v2/'.$tnxid.'/post'; // Replace with your actual API endpoint
            $data = [
                "Amount" => $request->input('hdn_amount'),           // Amount to be paid
                "Currency" => "PHP",            // Currency (PHP for Philippine Peso)
                "Description" => $tnxid, // Description of the transaction
                "Email" => $request->input('bank_email_address'),      // Customer's email
                "ProcId" => $request->input('paymentOption_specific'),
                ];

                $headers = [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $encodedCredentials,  // Add Authorization header with encoded credentials
                ];
                $response = $client->post($url, [
                    'headers' => $headers,
                    'json' => $data,
                    'timeout' => 10,  // Optional timeout setting in seconds
                ]);

                // Parse the response
                $responseBody = $response->getBody();
                $statusCode = $response->getStatusCode();
                $responseJson = json_decode($responseBody, true);
                info($responseJson);
                $url = $responseJson['Url'];

                $parsedUrl = parse_url($url);
                //  dd($responseJson);
                 // Handle the response
                 $baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'];
                 if($baseUrl === "https://test.dragonpay.ph/Bank/GetEmailInstruction.aspx"){
if( $request->input('hdn_product') === "DOMESTIC") {
DB::table('cocogen_domestic_trans')
    ->where('trans_id', $tnxid)
    ->update(['status' => 'PENDING']);
                            return redirect()->route('pendingPaymentReact', ['email' =>   $request->input('bank_email_address'), 'product' => $request->input('hdn_product')]);
                    }
                    return redirect()->route('PaymentPending', ['product' => $request->input('hdn_product'), 'amount' => $request->input('hdn_amount'), 'email' =>   $request->input('bank_email_address')]);
                 }else{
                    header("Location: " . $responseJson['Url']);
                    exit();
                 }
            if ($statusCode === 200 && isset($responseJson['Url'])) {
                // Redirect the user to the provided URL
                header("Location: " . $responseJson['Url']);
                exit();
            } else {
                // Handle failure or unexpected status
                echo "Transaction failed with status code: " . $statusCode;
            }

        }


    }

    public function getquote()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Get a Quote")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.getquote', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

}
