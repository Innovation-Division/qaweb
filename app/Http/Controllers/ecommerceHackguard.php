<?php

namespace App\Http\Controllers;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_meta;
use App\Models\location;
use App\Models\barangay;
use App\Models\cocogen_promo;
use App\Models\cocogen_hackguard_trans;
use App\Models\cocogen_hackguard_trans_upload;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Crazymeeks\Foundation\PaymentGateway\Options\Processor;

class ecommerceHackguard extends Controller
{
    public function get_Hackguard_Open(Request $request){
        
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "itp")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"]; 

        $username = "cocogenAPI";
        $password = "cocogenAPI";
        $digest = sha1($username.":".$password);
        $region =  location::select('region')->distinct('region')->orderBy('region', 'asc')->get();     

        $response = Response::make(view('ecommerce.hackguard.landing_page', ['title' => $title,

        'region' => $region,
        'metadescription' => $metadescription,
        'keyword' => $keyword,
        'cocogen_admin_main' => $cocogen_admin_main,
        'cocogen_admin_submain' => $cocogen_admin_submain,
        'cocogen_admin_subchild' => $cocogen_admin_subchild,
        'cocogen_admin_productlink' => $cocogen_admin_productlink,
        'utm_source' => $request->utm_source,
        'utm_medium' => $request->utm_medium,
        'cocogen_admin_footer'=>$cocogen_admin_footer]));
 
        // Add headers to prevent caching
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
 
        return $response;
    }

public function saveHackguardInsurance(Request $request)
{
    $username = "cocogenAPI";
    $password = "cocogenAPI";
    $digest = sha1($username . ":" . $password);
    $unparsed_json = file_get_contents("http://webapi.cocogen.ph/api/" . $digest . "/get/get_currency/dollar");
    $geniisysdata = json_decode($unparsed_json, true);
    $dollar_value = $geniisysdata[0]['rate'];

$package = strtolower($request->get('hdn_package'));
$cyberbullying = $request->get('hdn_package_cyberbullying'); // yes or no

$type = $cyberbullying === 'yes' ? $package : "basic_{$package}";

$premium = $request->get("hdn_original_premium_{$type}");
$dst     = $request->get("hdn_dst_{$type}");
$vat     = $request->get("hdn_premtax_{$type}");
$lgt     = $request->get("hdn_lgt_{$type}");
$due     = $request->get("hdn_due_premium_{$type}");
$inputDate = $request->get('date-of-birth');
$formattedDate = \Carbon\Carbon::createFromFormat('d-m-Y', $inputDate)->format('Y-m-d');

switch ($package) {
        case 'cyberultra':
            $premium_details = '150000';
            break;
        case 'cyberprime':
            $premium_details = '100000';
            break;
        case 'cyberpro':
            $premium_details = '25000';
            break;
        case 'cybermax':
            $premium_details = '50000';
            break;
        default:
            $premium_details = 'N/A';
            break;
    }
 $rawCyberbullyingAmount = $request->input('cyberbullying_amount');
    $cleanCyberbullyingAmount = preg_replace('/[^0-9.]/', '', $rawCyberbullyingAmount);
    $cyberbullyingAmount = is_numeric($cleanCyberbullyingAmount) ? floatval($cleanCyberbullyingAmount) : 0;

    // Convert premium_details to float
    $premiumDetailsValue = floatval($premium_details);

    // Calculate sum_insured using PHP logic
    if ($cyberbullyingAmount > 0) {
        $sum_insured = $premiumDetailsValue * 4;
    } else {
        $sum_insured = $premiumDetailsValue * 3;
    }
\Log::info('Cyberbullying Amount: ' . $cyberbullyingAmount);
\Log::info('Premium Details Value: ' . $premiumDetailsValue);
\Log::info('Calculated Sum Insured: ' . $sum_insured);
    $data = [
        'status' => 'SAVED',
        'firstName' => $request->first_name,
        'lastName' => $request->last_name,
        'suffix' => $request->suffix,
        'birthDate' => $formattedDate,
        'emailAddress' => $request->email,
        'contactNo' => $request->mobile,
        'gender' => $request->gender,
        'premium' => $premium,
        'dst' => $dst,
        'vat' => $vat,
        'lgt' => $lgt,
        'total_premium_amount' => $due,
        'package' => ucfirst($package),
        'premium_type' => $cyberbullyingAmount ?: '0',
        'premium_details' => $premium_details,
        'sum_insured' => $sum_insured,
        'promoCode' => $request->get("promo"),
        'promoRate' => $request->get("hdn_promo_amount"),
        'country' => $request->country,
        'region' => $request->region,
        'province' => $request->province,
        'city' => $request->city,
        'barangay' => $request->barangay,
        'houseNo' => $request->get('address-house-unit'),
        'street' => $request->street,
        'zip' => $request->zip,
        'IDtype' => $request->id_type,
        'IDno' => $request->id_no,
        'agent_name' => $request->get('agent-name'), 
        'created_at' => now(),
        'updated_at' => now(),
    ];
// dd([
//     'raw_package' => $request->get('hdn_package'),
//     'normalized_package' => $package,
//     'premium_details' => $premium_details,
//     'cyberbullying' => $request->get('hdn_package_cyberbullying'),
//     'type' => $type,
//     'premium' => $premium,
//     'dst' => $dst,
//     'vat' => $vat,
//     'lgt' => $lgt,
//     'due' => $due,
//     'promoCode' => $request->get("promo"),
//     'promoRate' => $request->get("hdn_promo_amount"),
//     'sum_insured' => $sum_insured
// ]);
// dd($request->all());

if ($request->has('promo')) {
    $data['promo'] = $request->get('promo');
    $data['promoCode'] = $request->get("promo"); 
    $data['promoRate'] = $request->get("hdn_promo_amount");
}

    // Save main transaction
    $transaction = cocogen_hackguard_trans::create($data);
    $paddedId = str_pad($transaction->hackguardID, 7, '0', STR_PAD_LEFT);
    $transaction->transactionID = "CA-PCI-EC-" . date("Y") . "-" . $paddedId . "-00";
    $transaction->save();
    $trans = $transaction->transactionID;
    
    // Save promo
    if ($request->has('promo')) {
        $promo = cocogen_promo::where('promo', $request->promo)->first();
        if ($promo) {
            $promo->limit_usage = max(0, $promo->limit_usage - 1);
            $promo->save();
        }
    }

    // Save uploaded file
    if ($request->hasFile('file-upload-id') && $request->file('file-upload-id')->isValid()) {
    $file = $request->file('file-upload-id');

    $filename = $file->hashName(); 
    $path = $file->store('hackguardIDs', 'public');

    $upload = new cocogen_hackguard_trans_upload();
    $upload->path = $path; 
    $upload->name = basename($path); 
    $upload->trans_ID = $transaction->transactionID;
    $upload->save();
}
   if ($request->has('payment-proceed-to-payment')) {
    $cocogen_hackguard_trans = cocogen_hackguard_trans::where('transactionID', '=',$trans)->get();
        $sha_email = $transaction->emailAddress;
        $sha_created = $transaction->created_at;
        $salt = "COCOGENINNOVATION";
        $sha = $salt . ":" . $trans . ":" . $sha_email . ":" . $sha_created;
        $hashedString = sha1($sha);
        $link = '/payment'. '/'.$hashedString.'/'.base64_encode("HACKGUARD").'/'.base64_encode($cocogen_hackguard_trans[0]["transactionID"]);
        return redirect($link);
    }
        $full_name = $request->get('first_name') . " ". $request->get('last_name');
        $parameters = [
            'transactionID' => $transnoNo, # Varchar(40) A unique id identifying this specific transaction from the merchant site
            'total_premium_amount
            ' => $piso_amount, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
            'ccy' => 'PHP', # Char(3) The currency of the amount
            'description' => $transnoNo, # Varchar(128) A brief description of what the payment is for
            'email' => $request->get('email'), # Varchar(40) email address of customer
            'param1' => $full_name, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
            'param2' => "", # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
        ];
        $merchant_account = [
            'merchantid' => env('MERCHANT_ID'),
            'password'   => env('MERCHANT_PASSWORD')
        ];

        $dragonpay = new Dragonpay($merchant_account);
        $dragonpay->setParameters($parameters)->away();

    return response()->json([
        'success' => true,
        'transactionID' => $transaction->transactionID
    ]);
}

public function calculatePremiumBreakdown(Request $request)
{
    $premium = floatval($request->input('premium'));
    $hasCovid = $request->input('has_covid') === 'Yes';

    $lgt = ($premium * 0.2) / 100;
    $dst = $hasCovid ? 4.00 : 2.00;
    $premtax = ($premium * 2) / 100;
    $total = $premium + $dst + $premtax + $lgt;

    return response()->json([
        'original_premium' => number_format($premium, 2, '.', ''),
        'dst' => number_format($dst, 2, '.', ''),
        'premtax' => number_format($premtax, 2, '.', ''),
        'lgt' => number_format($lgt, 2, '.', ''),
        'due_premium' => number_format($total, 2, '.', ''),
    ]);
}

    public function get_region(Request $request)
    {       
        $location = location::select('region')->distinct('region')->orderBy('region', 'asc')->get();     
        return response()->json($location, 201);        
    }

    public function get_province(Request $request)
    {       
        $location = location::where('region', '=',$request->get('region'))->select('province')->distinct('province')->orderBy('province', 'asc')->get();     
        return response()->json($location, 201);        
    }

    public function get_city(Request $request)
    {       
        $location = location::where('province', '=',$request->get('province'))->select('city')->distinct('city')->orderBy('city', 'asc')->get();     
        return response()->json($location, 201);        
    }

    public function get_barangay(Request $request)
    {       
        $barangay = barangay::where('city_id', '=',$request->get('city'))->select('name as barangay')->distinct('name')->orderBy('name', 'asc')->get();     
        return response()->json($barangay, 201);        
    }
    public function getPromo(Request $request){
        $data = DB::table('cocogen_promo')
                   ->select('id','rate','amount','type', 'limit_usage')
                   ->where('effectiveDate', '<', DB::raw('NOW()'))
                   ->where('expiryDate', '>', DB::raw('NOW()'))
                   ->where('transType',  "HACKGUARD")
                   ->where('promo', $request->get('promo'))
                   ->where('limit_usage','>', 0)
                   ->get();

                   return response()->json($data);
    }
    
    public function success(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();


        $cocogen_meta = cocogen_meta::where('page', '=', "HackGuard")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('ecommerce.hackguard.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function getquote($product)
    {
        $link = '/get-quote';
        if($product === "cant-find-car" ){
            return redirect($link)->with('inquiry', $product);
        }else{
            return redirect($link)->with('product', $product);
        }
        
    }
}