<?php

namespace App\Http\Controllers;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_itp_countries;
use App\Models\cocogen_meta;
use App\Models\cocogen_itp_days_count;
use App\Models\cocogen_itp_cruise_premium_schengen;
use App\Models\cocogen_itp_cruise_premium_schengen_travel;
use App\Models\cocogen_itp_cruise_premium_schengen_liability;
use App\Models\cocogen_itp_cruise_premium_schengen_burial_benefits;
use App\Models\cocogen_itp_cruise_premium_schengen_add;
use App\Models\cocogen_itp_cruise_premium_worldwide;
use App\Models\cocogen_itp_cruise_premium_worldwide_travel;
use App\Models\cocogen_itp_cruise_premium_worldwide_liability;
use App\Models\cocogen_itp_cruise_premium_worldwide_burial_benefits;
use App\Models\cocogen_itp_cruise_premium_worldwide_add;
use App\Models\cocogen_itp_premium_schengen;
use App\Models\cocogen_itp_premium_schengen_travel;
use App\Models\cocogen_itp_premium_schengen_liability;
use App\Models\cocogen_itp_premium_schengen_burial_benefits;
use App\Models\cocogen_itp_premium_schengen_add;
use App\Models\cocogen_itp_premium_worldwide;
use App\Models\cocogen_itp_premium_worldwide_travel;
use App\Models\cocogen_itp_premium_worldwide_liability;
use App\Models\cocogen_itp_premium_worldwide_burial_benefits;
use App\Models\cocogen_itp_premium_worldwide_add;
use App\Models\cocogen_itp_covid_premium;
use App\Models\cocogen_itp_premium_asia;
use App\Models\cocogen_itp_premium_asia_travel;
use App\Models\cocogen_itp_premium_asia_liability;
use App\Models\cocogen_itp_premium_asia_burial_benefits;
use App\Models\cocogen_itp_premium_asia_add;
use App\Models\cocogen_itp_cruise_premium_asia;
use App\Models\cocogen_itp_cruise_premium_asia_travel;
use App\Models\cocogen_itp_cruise_premium_asia_liability;
use App\Models\cocogen_itp_cruise_premium_asia_burial_benefits;
use App\Models\cocogen_itp_cruise_premium_asia_add;
use App\Models\location;
use App\Models\barangay;
use App\Models\cocogen_international_trans;
use App\Models\cocogen_international_trans_destination;
use App\Models\cocogen_international_trans_emergency_contact;
use App\Models\cocogen_international_trans_beneficiaries;
use App\Models\cocogen_international_trans_upload;
use App\Models\cocogen_international_trans_destination_cruise;
use App\Models\cocogen_promo;
use App\Models\cocogen_itp_exchange_rate;
use DB;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Crazymeeks\Foundation\PaymentGateway\Options\Processor;

class ecommerceITP extends Controller
{
    public function get_ITP_Open(Request $request){
        
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "itp")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"]; 
        $cocogen_itp_countries = cocogen_itp_countries::where('block', '=', "N")->orderBy('country', 'Asc')->get();

        $username = "cocogenAPI";
        $password = "cocogenAPI";
        $digest = sha1($username.":".$password);
        $unparsed_json = file_get_contents("http://webapi.cocogen.ph/api/".$digest."/get/get_currency/dollar");
        $dollarrate = json_decode($unparsed_json, true);
        $region =  location::select('region')->distinct('region')->orderBy('region', 'asc')->get();     

        return view('ecommerce.itp.page', ['title' => $title,
        'dollarrate' => $dollarrate[0]['rate'],
        'region' => $region,
        'metadescription' => $metadescription,
        'keyword' => $keyword,
        'cocogen_itp_countries' => $cocogen_itp_countries,
        'cocogen_admin_main' => $cocogen_admin_main,
        'cocogen_admin_submain' => $cocogen_admin_submain,
        'cocogen_admin_subchild' => $cocogen_admin_subchild,
        'cocogen_admin_productlink' => $cocogen_admin_productlink,
        'utm_source' => $request->utm_source,
        'utm_medium' => $request->utm_medium,
        'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function ITPinsurancesave(Request $request){
   
        $username = "cocogenAPI";
        $password = "cocogenAPI";
        $digest = sha1($username.":".$password);
        $unparsed_json = file_get_contents("http://webapi.cocogen.ph/api/".$digest."/get/get_currency/dollar");
        $geniisysdata = json_decode($unparsed_json, true);
        $dollar_value = $geniisysdata[0]['rate'];

        $piso_amount = $geniisysdata[0]['rate']* $request->get('hdn_total_'. strtolower($request->get('hdn_package')));
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        $cocogen_international_trans = new cocogen_international_trans;
        $cocogen_international_trans->status = "SAVED";
        $cocogen_international_trans->fname = $request->get('first_name');
        $cocogen_international_trans->lname = $request->get('last_name');
        $cocogen_international_trans->suffix = $request->get('suffix');
        $cocogen_international_trans->bday = $request->get('date-of-birth');
        $cocogen_international_trans->email_add = $request->get('email');
        $cocogen_international_trans->mobile_no = $request->get('mobile');
        $cocogen_international_trans->from_date = $request->get('destination_from');
        $cocogen_international_trans->to_date = $request->get('destination_to');
        $cocogen_international_trans->include_cruise = $request->get('hdn_cruise_tag');
        $cocogen_international_trans->package = $request->get('hdn_package');
        $cocogen_international_trans->covid = $request->get('hdn_covid_tag');
        $cocogen_international_trans->covid_period = $request->get('hdn_covid');
        $cocogen_international_trans->net_prem =  $request->get('hdn_original_premium_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->doc_stamp = $request->get('hdn_dst_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->prem_tax = $request->get('hdn_premtax_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->lgt_tax = $request->get('hdn_lgt_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->amount_due = $request->get('hdn_due_premium_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->final_due = $request->get('hdn_total_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->final_amount_piso = $piso_amount;
        $cocogen_international_trans->personal_liability = $request->get('hdn_prem_liability_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->burial_benefits = $request->get('hdn_prem_burial_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->accidental_death_disablement = $request->get('hdn_prem_add_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->travel_assistance = $request->get('hdn_prem_travel_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->covid_amount = $request->get('hdn_covid_'. strtolower($request->get('hdn_package')));
        $cocogen_international_trans->purpose_travel = "Leisure / Vacation";
        $cocogen_international_trans->coverage_type = "Individual";
        $cocogen_international_trans->nationality = $request->get('modal-citizenship');
        $cocogen_international_trans->gender = $request->get('gender');
        $cocogen_international_trans->place_birth = $request->get('place-of-birth');
        $cocogen_international_trans->present_address = $request->get('street');
        $cocogen_international_trans->present_province = $request->get('province');
        $cocogen_international_trans->house_no = $request->get('address-house-unit');
        $cocogen_international_trans->region = $request->get('region');
        $cocogen_international_trans->present_city = $request->get('city');
        $cocogen_international_trans->present_barangay = $request->get('barangay');
        $cocogen_international_trans->permanent_address = $request->get('street');
        $cocogen_international_trans->permanent_province = $request->get('province');
        $cocogen_international_trans->permanent_city = $request->get('city');
        $cocogen_international_trans->permanent_barangay = $request->get('barangay');
        $cocogen_international_trans->zip = $request->get('zip');
        $cocogen_international_trans->id_type = $request->get('id_type');
        $cocogen_international_trans->idno = $request->get('id_no');

        if($request->utm_source) {
            $cocogen_international_trans->utm_source = $request->utm_source;
            $cocogen_international_trans->utm_medium = $request->utm_medium;
        }

        if($request->get('hdn_agent_tag') == "Yes"){
            $cocogen_international_trans->agent_name = $request->get('agent-name');
        }

        if($request->get('hdn_rtpcr_tag') == "Yes"){
            $cocogen_international_trans->ptpcr_tag = "Yes";
        }
        

        if($request->get('hdn_cruise_tag') == "Yes"){
            $cocogen_international_trans->cruise_from = $request->get('destination_from_cruise');
            $cocogen_international_trans->cruise_to = $request->get('destination_to_cruise');
        }
        if($request->get('hdn_covid_tag') == "Yes"){
            $cocogen_international_trans->covid_period = $request->get('hdn_covid_yes_type');
            $cocogen_international_trans->covid_return = $request->get('hdn_covid_return');
        }


        if($request->get('promo')){
            $cocogen_international_trans->promo = $request->get('promo');
            $cocogen_international_trans->promo_less =$request->get('hdn_promo_less_'. strtolower($request->get('hdn_package')));
        }

        if($request->get('hdn_pwd_tag') == "Yes"){
            $cocogen_international_trans->pwd_tag = "Yes";
            // $cocogen_international_trans->id_no_pwd =$request->get('id_no_pwd');
            // $cocogen_international_trans->id_type_pwd = $request->get('id_type_pwd');
        }else{
            $cocogen_international_trans->pwd_tag = "No";
        }
        $cocogen_international_trans->updated_at = $datenow;
        $cocogen_international_trans->created_at = $datenow;
        $cocogen_international_trans->save();
        $lastid = $cocogen_international_trans->id;
        if($lastid){
            $transnoNo = "PA-ITP-EC-". sprintf('%08d', $lastid);
            $cocogen_international_trans_update_transno = cocogen_international_trans::findorFail($lastid);
            $cocogen_international_trans_update_transno->trans_id = $transnoNo;
            $cocogen_international_trans_update_transno->save();

            $cocogen_international_trans_emergency_contact = new cocogen_international_trans_emergency_contact;
            $cocogen_international_trans_emergency_contact->trans_id = $transnoNo;
            $cocogen_international_trans_emergency_contact->name = $request->get('emergency-fullname');
            $cocogen_international_trans_emergency_contact->contact_no = $request->get('emergency-mobile');
            $cocogen_international_trans_emergency_contact->relation = $request->get('emergency-relationship');
            $cocogen_international_trans_emergency_contact->updated_at = $datenow;
            $cocogen_international_trans_emergency_contact->created_at = $datenow;
            $cocogen_international_trans_emergency_contact->save();


            $destinationCount = count($request->get('destinations'));
            for ($i = 0; $i <= $destinationCount; $i++) {
                $des_itenerary = !empty($request->get('destinations')[$i]) ? $request->get('destinations')[$i] :'0';
                if($des_itenerary){
                        $cocogen_international_trans_destination = new cocogen_international_trans_destination;
                        $cocogen_international_trans_destination->trans_id = $transnoNo;
                        $cocogen_international_trans_destination->destination = $request->get('destinations')[$i];
                        $cocogen_international_trans_destination->updated_at = $datenow;
                        $cocogen_international_trans_destination->created_at = $datenow;
                        $cocogen_international_trans_destination->save();
                }
            }

          

            $destinationCount_cruise = count($request->get('cruise_destinations'))-1;

          
            for ($i = 0; $i <= $destinationCount_cruise; $i++) {
                if($request->get('cruise_destinations')[$i]){
                        $cocogen_international_trans_destination_cruise = new cocogen_international_trans_destination_cruise;
                        $cocogen_international_trans_destination_cruise->trans_id = $transnoNo;
                        $cocogen_international_trans_destination_cruise->destination = $request->get('cruise_destinations')[$i];
                        $cocogen_international_trans_destination_cruise->updated_at = $datenow;
                        $cocogen_international_trans_destination_cruise->created_at = $datenow;
                        $cocogen_international_trans_destination_cruise->save();
                }
            }

            // dd($request);

            $beneCount = count($request->get('beneficiary-fullname')) - 1;
            for ($i = 0; $i <= $beneCount; $i++) {
                if($request->get('beneficiary-fullname')[$i]){
                        $cocogen_international_trans_beneficiaries = new cocogen_international_trans_beneficiaries;
                        $cocogen_international_trans_beneficiaries->trans_id = $transnoNo;
                        $cocogen_international_trans_beneficiaries->name = $request->get('beneficiary-fullname')[$i];
                        $cocogen_international_trans_beneficiaries->relation = $request->get('beneficiary-relationship')[$i];
                        $cocogen_international_trans_beneficiaries->mobile = $request->get('beneficiary-mobile')[$i];
                        $cocogen_international_trans_beneficiaries->updated_at = $datenow;
                        $cocogen_international_trans_beneficiaries->created_at = $datenow;
                        $cocogen_international_trans_beneficiaries->save();
                }
            }

            if($request->hasfile('file-upload-id')){
                if($request->file('file-upload-id')){
                    if ($request->file('file-upload-id')->isValid()) { 
                        $cocogen_international_trans_upload = new cocogen_international_trans_upload;
                        $cocogen_international_trans_upload->name = $request->file('file-upload-id')->hashName();
                        $cocogen_international_trans_upload->path = $request->file('file-upload-id')->store('itpID');
                        $cocogen_international_trans_upload->trans_id = $transnoNo;
                        $cocogen_international_trans_upload->save();              
                    }
                }
            }
            if($request->hasfile('pwd-file-upload-id')){
                if($request->file('pwd-file-upload-id')){
                    if ($request->file('pwd-file-upload-id')->isValid()) { 
                        $cocogen_international_trans_upload = new cocogen_international_trans_upload;
                        $cocogen_international_trans_upload->name = $request->file('pwd-file-upload-id')->hashName();
                        $cocogen_international_trans_upload->path = $request->file('pwd-file-upload-id')->store('itpID');
                        $cocogen_international_trans_upload->trans_id = $transnoNo;
                        $cocogen_international_trans_upload->save();              
                    }
                }
            }

        }

        // FOR EXCHANGE RATE 03082024  
        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i');
        $exchangeMoney = new cocogen_itp_exchange_rate;
        $exchangeMoney->trans_id = $transnoNo;
        $exchangeMoney->exchange_rate  = $request->get('hdn_dollar_rate');
        $exchangeMoney->exchange_rate_date = $formattedDateTime;
        $exchangeMoney->exchange_rate_final = $request->get('hdn_dollar_rate');
        $exchangeMoney->exchange_rate_final_date = $formattedDateTime;
        $exchangeMoney->save();

        if($request->get('promo')){
            $cocogen_promo = cocogen_promo::where('promo', '=', $request->get('promo'))->get();
            if (count($cocogen_promo) > 0) {
                $limit = $cocogen_promo[0]['limit_usage'] - 1;
                $cocogen_promo = cocogen_promo::findorFail($request->get('promo'));
                $cocogen_promo->limit_usage = $limit;
                $cocogen_promo->save();
            }
        }        
        // dd($request);
        $full_name = $request->get('first_name') . " ". $request->get('last_name');
        $parameters = [
            'txnid' => $transnoNo, # Varchar(40) A unique id identifying this specific transaction from the merchant site
            'amount' => $piso_amount, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
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
    }
    
    public function get_promo(Request $request){
        $data = DB::table('cocogen_promo')
                   ->select('id','rate','amount','type', 'limit_usage')
                   ->where('effectiveDate', '<', \DB::raw('NOW()'))
                   ->where('expiryDate', '>', \DB::raw('NOW()'))
                   ->where('transType',  "INTERNATIONAL")
                   ->where('promo', $request->get('promo'))
                   ->where('limit_usage','>', 0)
                   ->get();
       return response()->json($data, 201);
    }

    public function get_premium(Request $request){
            $cruise = $request->get('cruise_tag');
            $covid = $request->get('covid_tag');
            $noofday = $request->get('noofday');
            $covidtype = $request->get('covidtype');

            $destinations = $request->get('destinations');
            $destinations2 = $request->get('destinations_cruise');
            $destination = explode(',', $destinations);
            $destinations2 = explode(',', $destinations2);
            if($covid);
            // DESTINATION FIRST
            $cocogen_itp_countries = cocogen_itp_countries::whereIn('country',$destination)->get();
            $cocogen_itp_days_count = cocogen_itp_days_count::where('id', '=', (int)$noofday)->get();
            
            $shengen = "";
            $worldwide = "";
            foreach($cocogen_itp_countries as $cocogen_itp_country){
                if($cocogen_itp_country->shengen === "Y"){
                    $shengen = "Y";
                }else{
                    if($cocogen_itp_country->continent != "Asia"){
                        $worldwide = "Y";
                    }
                }

            }
            if($shengen === "Y" || $worldwide === "Y" ){
                if($cruise === "Yes"){
                    if($shengen == "Y"){
                        $shengen_cruise = cocogen_itp_cruise_premium_schengen::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $shengen_cruise_travel = cocogen_itp_cruise_premium_schengen_travel::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $shengen_cruise_liability = cocogen_itp_cruise_premium_schengen_liability::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $shengen_cruise_burial_benefits = cocogen_itp_cruise_premium_schengen_burial_benefits::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $shengen_cruise_add = cocogen_itp_cruise_premium_schengen_add::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    }
                    if($worldwide == "Y"){
                        $worldwide_cruise = cocogen_itp_cruise_premium_worldwide::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $worldwide_cruise_travel = cocogen_itp_cruise_premium_worldwide_travel::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $worldwide_cruise_liability = cocogen_itp_cruise_premium_worldwide_liability::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $worldwide_cruise_burial_benefits = cocogen_itp_cruise_premium_worldwide_burial_benefits::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $worldwide_cruise_add = cocogen_itp_cruise_premium_worldwide_add::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    }
                
                }else{
                    if($shengen == "Y"){
                        $data_prem_shengen = cocogen_itp_premium_schengen::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_shengen_travel = cocogen_itp_premium_schengen_travel::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_shengen_liability = cocogen_itp_premium_schengen_liability::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_shengen_burial_benefits = cocogen_itp_premium_schengen_burial_benefits::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_shengen_add = cocogen_itp_premium_schengen_add::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    }
                    if($worldwide == "Y"){
                        $data_prem_world = cocogen_itp_premium_worldwide::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_travel = cocogen_itp_premium_worldwide_travel::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_liability = cocogen_itp_premium_worldwide_liability::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_burial_benefits = cocogen_itp_premium_worldwide_burial_benefits::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_add = cocogen_itp_premium_worldwide_add::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    }
                }
            }else{
                if($cruise === "Yes"){
                    info('asia cruise');
                    $asia_cruise = cocogen_itp_cruise_premium_asia::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_cruise_travel = cocogen_itp_cruise_premium_asia_travel::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_cruise_liability = cocogen_itp_cruise_premium_asia_liability::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_cruise_burial_benefits = cocogen_itp_cruise_premium_asia_burial_benefits::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_cruise_add = cocogen_itp_cruise_premium_asia_add::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                }else{
                    $asia = cocogen_itp_premium_asia::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_travel = cocogen_itp_premium_asia_travel::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_liability = cocogen_itp_premium_asia_liability::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_burial_benefits = cocogen_itp_premium_asia_burial_benefits::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $asia_add = cocogen_itp_premium_asia_add::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                }
            }
            if($covid === "Yes"){
                info($covidtype);
                if($covidtype == 15){
                    info(15);
                    $covid_premium = cocogen_itp_covid_premium::where('no_of_days', '=', 15)->get();
                }else{
                    info("entrire");
                    info((int)$cocogen_itp_days_count[0]["days_original_count"]);
                    $covid_premium = cocogen_itp_covid_premium::where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                }
            }
            $packages = array("economy_individual", "esteem_individual", "executive_individual", "elite_individual");
            foreach($packages as $package){
                if($package){
                    $prem = 0;
                    $prem_travel = 0;
                    $prem_liability = 0;
                    $prem_burial = 0;
                    $prem_add =0;
                    
                    if($shengen === "Y" || $worldwide === "Y" ){
                        if($cruise === "Yes"){
                            if($shengen === "Y"){
                                $prem = $shengen_cruise[0][$package];
                                $prem_travel = $shengen_cruise_travel[0][$package];
                                $prem_liability = $shengen_cruise_liability[0][$package];
                                $prem_burial = $shengen_cruise_burial_benefits[0][$package];
                                $prem_add = $shengen_cruise_add[0][$package];
                            }
                            if($worldwide === "Y"){
                                if($shengen == "Y"){
                                    if($worldwide_cruise[0][$package] >= $shengen_cruise[0][$package]){
                                        $prem = $worldwide_cruise[0][$package];
                                    }
                                    if($worldwide_cruise_travel[0][$package] >= $shengen_cruise_travel[0][$package]){
                                        $prem_travel = $worldwide_cruise_travel[0][$package];
                                    }
                                    if($worldwide_cruise_liability[0][$package] >= $shengen_cruise_liability[0][$package]){
                                        $prem_liability = $worldwide_cruise_liability[0][$package];
                                    }
                                    if($worldwide_cruise_burial_benefits[0][$package] >= $shengen_cruise_burial_benefits[0][$package]){
                                        $prem_burial = $worldwide_cruise_burial_benefits[0][$package];
                                    }
                                    if($worldwide_cruise_add[0][$package] >= $shengen_cruise_add[0][$package]){
                                        $prem_add = $worldwide_cruise_add[0][$package];
                                    }
                                }else{
                                    $prem = $worldwide_cruise[0][$package];
                                    $prem_travel = $worldwide_cruise_travel[0][$package];
                                    $prem_liability = $worldwide_cruise_liability[0][$package];
                                    $prem_burial = $worldwide_cruise_burial_benefits[0][$package];
                                    $prem_add = $worldwide_cruise_add[0][$package];
                                }
                            }
                        }else{
                            if($shengen === "Y"){
                                $prem = $data_prem_shengen[0][$package];
                                $prem_travel = $data_prem_shengen_travel[0][$package];
                                $prem_liability = $data_prem_shengen_liability[0][$package];
                                $prem_burial = $data_prem_shengen_burial_benefits[0][$package];
                                $prem_add = $data_prem_shengen_add[0][$package];
                            }
                            if($worldwide === "Y"){
                                if($shengen == "Y"){
                                    if($data_prem_world[0][$package] >= $data_prem_shengen[0][$package]){
                                        $prem = $data_prem_world[0][$package];
                                    }
                                    if($data_prem_world_travel[0][$package] >= $data_prem_shengen_travel[0][$package]){
                                        $prem_travel = $data_prem_world_travel[0][$package];
                                    }
                                    if($data_prem_world_liability[0][$package] >= $data_prem_shengen_liability[0][$package]){
                                        $prem_liability = $data_prem_world_liability[0][$package];
                                    }
                                    if($data_prem_world_burial_benefits[0][$package] >= $data_prem_shengen_burial_benefits[0][$package]){
                                        $prem_burial = $data_prem_world_burial_benefits[0][$package];
                                    }
                                    if($data_prem_world_add[0][$package] >= $data_prem_shengen_add[0][$package]){
                                        $prem_add = $data_prem_world_add[0][$package];
                                    }
                                }else{
                                    $prem = $data_prem_world[0][$package];
                                    $prem_travel = $data_prem_world_travel[0][$package];
                                    $prem_liability = $data_prem_world_liability[0][$package];
                                    $prem_burial = $data_prem_world_burial_benefits[0][$package];
                                    $prem_add = $data_prem_world_add[0][$package];
                                }
                            }
                        }
                    }else{
                        if($cruise === "Yes"){
                            
                            $prem = $asia_cruise[0][$package];
                            $prem_travel = $asia_cruise_travel[0][$package];
                            $prem_liability = $asia_cruise_liability[0][$package];
                            $prem_burial = $asia_cruise_burial_benefits[0][$package];
                            $prem_add = $asia_cruise_add[0][$package];
                        }else{
                            $prem = $asia[0][$package];
                            $prem_travel = $asia_travel[0][$package];
                            $prem_liability = $asia_liability[0][$package];
                            $prem_burial = $asia_burial_benefits[0][$package];
                            $prem_add = $asia_add[0][$package];
                        }
                    }
                   
                    $covidamount = 0;
                    if($covid === "Yes"){
                        $prem = $prem + $covid_premium[0][$package];
                        $covidamount = $covid_premium[0][$package];
                        // $prem_travel = $prem_travel + $covid_premium[0][$package];
                        // $prem_liability = $prem_liability + $covid_premium[0][$package];
                        // $prem_burial = $prem_burial + $covid_premium[0][$package];
                        // $prem_add = $prem_add + $covid_premium[0][$package];
                    }
                    $packageArray[$package] = array($package, (float)$prem, (float)$prem_liability,(float)$prem_burial,(float)$prem_add,(float)$covidamount,(float)$prem_travel,$shengen);
                }
            }
            info($packageArray);
            return response()->json($packageArray, 201);
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

    public function success(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();


        $cocogen_meta = cocogen_meta::where('page', '=', "itp")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('ecommerce.itp.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
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
