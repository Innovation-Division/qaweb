<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_admin_footer; 
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_meta;
use App\Models\cocogen_admin_main;
use App\Models\location;
use App\Models\cocogen_domestic_comprehensive;
use App\Models\cocogen_domestic_premium;
use App\Models\cocogen_domestic_covid_premium;
use App\Models\cocogen_domestic_trans;
use App\Models\cocogen_domestic_trans_destination;
use App\Models\cocogen_domestic_trans_beneficiaries;
use App\Models\cocogen_promo;
use App\Models\cocogen_domestic_trans_emergency_contact;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use DateTime;
use DB;
use Carbon\Carbon;

class domestic extends Controller
{
    public function newdomestic(Request $request){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        
        $location = location::select('province')->distinct()->orderBy('province', 'Asc')->get();

        // dd($location);
        $cocogen_meta = cocogen_meta::where('page', '=', "domestic")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       

        $now = date('Y-m-d');
        $start = date('Y-m-d', strtotime($now. ' + 1 days'));
        $end = date('Y-m-d', strtotime($start. ' + 3 months'));


        $myDateTime = DateTime::createFromFormat('Y-m-d', $start);
        $start = $myDateTime->format('F d, Y');

        $myDateTimeend = DateTime::createFromFormat('Y-m-d', $end);
        $end = $myDateTimeend->format('F d, Y');

        // dd($request->utm_source);

        return view('getaquote.domestic.newhome', [
            'title' => $title,
            'cocogen_admin_footer' => $cocogen_admin_footer,
            'cocogen_admin_productlink' => $cocogen_admin_productlink,
            'metadescription' => $metadescription,
            'keyword' => $keyword,
            'locations' => $location,
            'cocogen_admin_main' => $cocogen_admin_main,
            'cocogen_admin_submain' => $cocogen_admin_submain,
            'cocogen_admin_subchild' => $cocogen_admin_subchild,
            'start' => $start,
            'end' => $end,
            'utm_source' => $request->utm_source,
            'utm_medium' => $request->utm_medium
        ]);
    }

    public function domesticinsurancesave(Request $request)
    {    
        $latest = DB::table('cocogen_domestic_trans')->latest('id')->first();

        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        //dd($request);
        $cocogen_domestic_trans = new cocogen_domestic_trans;
        $cocogen_domestic_trans->id = $latest->id + 1;
        $cocogen_domestic_trans->salutation = $request->get('salutation');
        $cocogen_domestic_trans->status = "SAVED";
        $cocogen_domestic_trans->fname = $request->get('first_name');
        if($request->get('covid_amount')){
            $cocogen_domestic_trans->covid_amount = $request->get('covid_amount');
        }
        $cocogen_domestic_trans->mname = $request->get('middle_name');
        $cocogen_domestic_trans->lname = $request->get('last_name');
        $cocogen_domestic_trans->suffix = $request->get('suffix');
        $cocogen_domestic_trans->bday = date('Y-m-d', strtotime($request->get('dateofBirth_personal_info')));
        $cocogen_domestic_trans->email_add = $request->get('email');
        $cocogen_domestic_trans->mobile_no = $request->get('mobile');
        $cocogen_domestic_trans->mode_transpo = $request->get('modeOfTransportation');
        $cocogen_domestic_trans->package = $request->get('coverage');
        if ($request->get('covid_checkbox') === 'Yes') {
            $covid = 'Yes';
        } else {
            $covid = 'No';
        }
        $cocogen_domestic_trans->covid = $covid;
        $cocogen_domestic_trans->net_prem = $request->get('net_premium_all');
        $cocogen_domestic_trans->doc_stamp = $request->get('doc_stamp_all');
        $cocogen_domestic_trans->prem_tax = $request->get('premium_tax_all');
        $cocogen_domestic_trans->lgt_tax = $request->get('lgt_all');
        $cocogen_domestic_trans->amount_due = $request->get('total_amount');
        $cocogen_domestic_trans->final_due = $request->get('total_amount');
        $cocogen_domestic_trans->purpose_travel = "Leisure / Vacation";
        $cocogen_domestic_trans->coverage_type = "Individual";
        $cocogen_domestic_trans->nationality = $request->get('nationality_4thpage');
        $cocogen_domestic_trans->gender = $request->get('sex');
        $cocogen_domestic_trans->place_birth = $request->get('birth_place');
        $cocogen_domestic_trans->present_address = $request->get('residence_address');
        $cocogen_domestic_trans->present_province = $request->get('residence_province');
        $cocogen_domestic_trans->present_city = $request->get('residence_municipality');
        $cocogen_domestic_trans->present_barangay = $request->get('residence_barangay');
        $cocogen_domestic_trans->permanent_address = $request->get('residence_address');
        $cocogen_domestic_trans->permanent_province = $request->get('residence_province');
        $cocogen_domestic_trans->permanent_city = $request->get('residence_municipality');
        $cocogen_domestic_trans->permanent_barangay = $request->get('residence_barangay');
        $cocogen_domestic_trans->id_type = $request->get('id_type');

        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            $extensionFile = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extensionFile;
            $filePath = $request->file('upload')->storeAs('domestic', $file_name, 'public');
            $cocogen_domestic_trans->file = $file_name;
        }
        
        if($request->get('promo_code')){
            $cocogen_domestic_trans->promo = $request->get('promo_code');
            $cocogen_domestic_trans->promo_less = $request->get('less_all');
        }

        if($request->utm_source) {
            $cocogen_domestic_trans->utm_source = $request->utm_source;
            $cocogen_domestic_trans->utm_medium = $request->utm_medium;
        }

        $cocogen_domestic_trans->updated_at = $datenow;
        $cocogen_domestic_trans->created_at = $datenow;
        $cocogen_domestic_trans->save(); 
        $lastid = $latest->id + 1;

        $transnoNo = "";
        if($lastid){
            $transnoNo = "Domestic-" . sprintf('%08d', $lastid);
            $cocogen_domestic_trans_update_transno = cocogen_domestic_trans::findorFail($lastid);
            $cocogen_domestic_trans_update_transno->trans_id = $transnoNo;
            $cocogen_domestic_trans_update_transno->save();

            foreach ($request->destination_itinerary as $key => $value) {
                $cocogen_domestic_trans_destination = new cocogen_domestic_trans_destination;
                $cocogen_domestic_trans_destination->trans_id = $transnoNo;
                $cocogen_domestic_trans_destination->destination = $request->destination_itinerary[$key];
                $cocogen_domestic_trans_destination->date_from = $request->departure_date_itinerary[$key];
                $cocogen_domestic_trans_destination->date_to = $request->return_date_itinerary[$key];
                $cocogen_domestic_trans_destination->updated_at = $datenow;
                $cocogen_domestic_trans_destination->created_at = $datenow;
                $cocogen_domestic_trans_destination->save();
            }


            $cocogen_domestic_trans_emergency_contact = new cocogen_domestic_trans_emergency_contact;
            $cocogen_domestic_trans_emergency_contact->trans_id = $transnoNo;
            $cocogen_domestic_trans_emergency_contact->name = $request->emergency_contact_name;
            $cocogen_domestic_trans_emergency_contact->contact_no = $request->emergency_contact_no;
            $cocogen_domestic_trans_emergency_contact->relation = $request->emergency_contact_relationship;
            $cocogen_domestic_trans_emergency_contact->updated_at = $datenow;
            $cocogen_domestic_trans_emergency_contact->created_at = $datenow;
            $cocogen_domestic_trans_emergency_contact->save();
        }

        if($request->get('promo_code')){
            $cocogen_promo = cocogen_promo::where('promo', '=',$request->get('promo_code'))->where('transType',  "DOMESTIC")->get();
            if (count($cocogen_promo) > 0) {
                $limit = $cocogen_promo[0]['limit_usage'] - 1;
                $cocogen_promo = cocogen_promo::findorFail($request->get('promo_code'));
                $cocogen_promo->limit_usage = $limit;
                $cocogen_promo->save();
            }
        }
        $full_name = $request->get('first_name') . " ". $request->get('middle_name') . " ".  $request->get('last_name');
        $parameters = [
            'txnid' => $transnoNo, # Varchar(40) A unique id identifying this specific transaction from the merchant site
            'amount' => $request->get('total_amount'), # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
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

        // Initialize Dragonpay
        $dragonpay = new Dragonpay($merchant_account);
        // Filter payment channel
        //$dragonpay->filterPaymentChannel( Dragonpay::ONLINE_BANK );
        // Set parameters, then redirect to dragonpay
        $dragonpay->setParameters($parameters)->away();
    }

    public function success(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "domestic")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.domestic.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function pending(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "domestic")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.domestic.pending', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function failed(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "domestic")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.domestic.failed', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }


    public function get_prem(Request $request)
    {      
        $noofday = $request->get('noofday');
        $mode_transpo = $request->get('mode_transpo');
        $package = $request->get('package');

        if($mode_transpo == 'Non-Air Plan') {
            $mode_transpo = 'Non-Air Plan';
        } else {
            $mode_transpo = 'Air Plan';
        }


        $data = cocogen_domestic_premium::where('days', '=', (int)$noofday)
            ->where('mode_of_transpo', '=', $mode_transpo)
            ->where('type', '=', $package)
            ->first(); 

            
      
        return response()->json($data, 201);
    } 

    public function get_prem_covid(Request $request){       
        $noofday = $request->get('noofday');
        $package = $request->get('package');

        $data = cocogen_domestic_covid_premium::where('days', '=', (int)$noofday)
            ->where('type', '=', $package)
            ->first(); 
      
        return response()->json($data, 201);
    }

    public function get_promo(Request $request){   
        
         $data = DB::table('cocogen_promo')
                    ->select('id','rate','amount','type', 'limit_usage')
                    ->where('effectiveDate', '<', \DB::raw('NOW()'))
                    ->where('expiryDate', '>', \DB::raw('NOW()'))
                    ->where('transType',  "DOMESTIC")
                    ->where('promo', $request->get('promo'))
                    ->where('limit_usage','>', 0)
                    ->get();
        return response()->json($data, 201);
    }  
     
}
