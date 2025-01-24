<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\cocogen_admin_pages;
use App\Models\cocogen_admin_pages_news;
use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_breadcrumbs;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_parentproduct;
use App\Models\cocogen_admin_subparentproduct; 
use App\Models\cocogen_admin_relatedproducts;
use App\Models\cocogen_admin_pages_products;
use App\Models\cocogen_admin_homepage_slider; 
use App\Models\cocogen_admin_homepage_video; 
use App\Models\cocogen_admin_ineedprotection; 
use App\Models\cocogen_admin_ineedprotection_trans; 
use App\Models\cocogen_admin_footer; 
use App\Models\cocogen_admin_faq_category; 
use App\Models\cocogen_admin_faq; 
use App\Models\cocogen_admin_emailtemplate;
use App\Models\cocogen_covid_trans;
use App\Models\cocogen_covid_trans_uploads;
use App\Models\cocogen_covid_file;
use App\Models\cocogen_promo;
use App\Models\cocogen_promo_id;
use App\Models\cocogen_meta;
use App\Models\cocogen_protech_device_part;
use App\Models\cocogen_protech_trans;
use App\Models\cocogen_protect_deductible;
use App\Models\cocogen_protech_trans_uploads;
use App\Models\cocogen_purl_agent;
use DB;
use Session;
use SoapClient;
use DateTime;
use Mail;
use PDF;
use Auth;
use URL;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;

class protech extends Controller
{
    public function openProtect(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "Protech Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       

        $now = date('Y-m-d');
        $start = date('Y-m-d', strtotime($now. ' + 1 days'));
        $end = date('Y-m-d', strtotime($start. ' + 3 months'));

        $yeartoday = date('Y');
        $year3minus = date('Y', strtotime($start. ' - 3 years'));

        $years = array_combine(range(date("Y"), $year3minus), range(date("Y"), $year3minus));

        $myDateTime = DateTime::createFromFormat('Y-m-d', $start);
        $start = $myDateTime->format('F d, Y');

        $myDateTimeend = DateTime::createFromFormat('Y-m-d', $end);
        $end = $myDateTimeend->format('F d, Y');

        return view('getaquote.protech.newhome', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'start' => $start,'end' => $end,'yeartoday' => $yeartoday,'year3minus' => $year3minus, 'years' => $years]);
    }

    public function openProtectPURL($digestsec,$agentid){
        //dd($digestsec);
        $decodeAgentID = base64_decode($agentid);
        $cocogen_purl_agent = cocogen_purl_agent::where('agenID', '=', $decodeAgentID)->get();
             
        
        if(count($cocogen_purl_agent) > 0){
            $sec = sha1($cocogen_purl_agent[0]["id"].":".$cocogen_purl_agent[0]["agenID"].":".$cocogen_purl_agent[0]["agentName"].":".$cocogen_purl_agent[0]["created_at"]);
            if($digestsec === $sec){
                 
                $cocogen_admin_footer = cocogen_admin_footer::all(); 
                $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
                $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
                $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
                $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
            
               
                $cocogen_meta = cocogen_meta::where('page', '=', "Protech Insurance")->get();
                $metadescription = $cocogen_meta[0]["description"]; 
                $keyword = $cocogen_meta[0]["keyword"];
                $title = $cocogen_meta[0]["title"];       

                $now = date('Y-m-d');
                $start = date('Y-m-d', strtotime($now. ' + 1 days'));
                $end = date('Y-m-d', strtotime($start. ' + 3 months'));

                $yeartoday = date('Y');
                $year3minus = date('Y', strtotime($start. ' - 3 years'));

                $years = array_combine(range(date("Y"), $year3minus), range(date("Y"), $year3minus));

                $myDateTime = DateTime::createFromFormat('Y-m-d', $start);
                $start = $myDateTime->format('F d, Y');

                $myDateTimeend = DateTime::createFromFormat('Y-m-d', $end);
                $end = $myDateTimeend->format('F d, Y');
                //dd($sec,$agentid,base64_decode($agentid),$cocogen_purl_agent,$sec);
                $agentID = $cocogen_purl_agent[0]["agenID"];
                $agentName = $cocogen_purl_agent[0]["agentName"];
                return view('getaquote.protech.newhome', ['title' => $title,
                    'cocogen_admin_footer' => $cocogen_admin_footer,
                    'cocogen_admin_productlink' => $cocogen_admin_productlink,
                    'metadescription' => $metadescription,
                    'keyword' => $keyword,
                    'cocogen_admin_main' => $cocogen_admin_main,
                    'cocogen_admin_submain' => $cocogen_admin_submain,
                    'cocogen_admin_subchild' => $cocogen_admin_subchild,
                    'start' => $start,
                    'end' => $end,
                    'years' => $years,
                    'yeartoday' => $yeartoday,
                    'year3minus' => $year3minus,
                    'agentID' => $agentID,
                    'agentName' => $agentName]);
            
            }
        }
    }

    public function protechsave(Request $request){
        //dd($request);
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        $totalprem = $request->get('hidden_totalPremium');

        $now = date('Y-m-d');
        $start = date('Y-m-d', strtotime($now. ' + 8 hours'));
        $start = date('Y-m-d', strtotime($start. ' + 1 days'));
        $end = date('Y-m-d', strtotime($start. ' + 1 year'));
      

        $promo = 0;
        $promo_type = "";
        $data = "";
        $promo_id = 0;
        $limit_usage = 0;
        if($request->get('promo')){
            $data = DB::table('cocogen_promo')
                    ->select('id','rate','amount','type', 'limit_usage')
                    ->where('effectiveDate', '<', \DB::raw('NOW()'))
                    ->where('expiryDate', '>', \DB::raw('NOW()'))
                    ->where('transType',  "PROTECH")
                    ->where('promo', $request->get('promo'))
                    ->where('limit_usage','>', 0)
                    ->get(); 

                    if(count($data) > 0){                    
                        foreach ($data as $val) {

                            $promo_type = $val->type;
                            $promo_id = $val->id;
                            $limit_usage = $val->limit_usage;

                            if($promo_type === "A"){
                                $promo = $val->amount;  
                                $totalprem =  $totalprem - $promo;                                               
                            }else{                                            
                               $promo_orig = $val->rate;
                               $promo = $totalprem * ($promo/100);                               
                               $totalprem =  $totalprem - ($totalprem * ($promo_orig/100));
                            }
                        }                                            
                    }
        }

        $cocogen_protech_trans = new cocogen_protech_trans;
        $cocogen_protech_trans->protech_firstname = $request->get('firstName_personal_info');
        $cocogen_protech_trans->protech_middlename = $request->get('middleName_personal_info');
        $cocogen_protech_trans->protech_lastname = $request->get('lastName_personal_info');
        $cocogen_protech_trans->protech_mobile_no = $request->get('contactNo_personal_info');
        $cocogen_protech_trans->protech_email = $request->get('email_personal_info');
        $cocogen_protech_trans->protech_residence_address = $request->get('residence_address');
        $cocogen_protech_trans->protech_residence_province = $request->get('residence_province');
        $cocogen_protech_trans->protech_residence_city = $request->get('residence_municipality');
        $cocogen_protech_trans->protech_residence_brgy = $request->get('residence_barangay');
        $cocogen_protech_trans->protech_mailing_address = $request->get('mailing_address');
        $cocogen_protech_trans->protech_mailing_province = $request->get('mailing_province');
        $cocogen_protech_trans->protech_mailing_city = $request->get('mailing_municipality');
        $cocogen_protech_trans->protech_mailing_brgy = $request->get('mailing_barangay');
        $cocogen_protech_trans->protech_source_fund = $request->get('sourceofIncome_personal_info');
        $cocogen_protech_trans->protech_gender = $request->get('gender_other_personal_info');
        $cocogen_protech_trans->protech_place_of_birth = $request->get('place_of_birth_other_personal_info');
        $cocogen_protech_trans->protech_civil_status = $request->get('status_other_personal_info');
        $cocogen_protech_trans->protech_nationality = $request->get('nationality_other_personal_info');
        $cocogen_protech_trans->protech_occupation = $request->get('occupation_other_personal_info');
        $cocogen_protech_trans->protech_tel_no = $request->get('tel_no_other_personal_info');
        $cocogen_protech_trans->protech_type_of_id = $request->get('type_of_id_personal_info');
        $cocogen_protech_trans->protech_id_no = $request->get('idno_other_personal_info');
        $cocogen_protech_trans->protech_device_location = $request->get('device_address');
        $cocogen_protech_trans->protech_device_province = $request->get('device_province');
        $cocogen_protech_trans->protech_device_city = $request->get('device_municipality');
        $cocogen_protech_trans->protech_device_brgy = $request->get('device_barangay');
        $cocogen_protech_trans->protech_netpremium = $request->get('hidden_netPremium');
        $cocogen_protech_trans->protech_dst = $request->get('hidden_dst');
        $cocogen_protech_trans->protech_lgt = $request->get('hidden_lgt');
        $cocogen_protech_trans->protech_vat = $request->get('hidden_vat');        
        $cocogen_protech_trans->protect_si = $request->get('hidden_si');   
        if($request->get('agentID')){
            $cocogen_protech_trans->protech_agent_id = $request->get('agentID'); 
        }   
        if($request->get('agent_id')){
            $cocogen_protech_trans->protech_agent_id = $request->get('agent_id'); 
        }       
        if($request->get('agentName')){
            $cocogen_protech_trans->protech_agent_name = $request->get('agentName'); 
        }       
        $cocogen_protech_trans->protech_total_premium = $totalprem;
        $cocogen_protech_trans->protect_status = "SAVED";
        $cocogen_protech_trans->protect_incept = $start;
        $cocogen_protech_trans->protect_expiry = $end;
        $cocogen_protech_trans->updated_at = $datenow;
        $cocogen_protech_trans->created_at = $datenow;
        if($promo > 0){
            $cocogen_protech_trans->protech_promo_amount = $promo;
        }
        if($request->get('type_of_device') == "desktop"){
            $cocogen_protech_trans->protech_device_location_type = "Within Premises";
            $cocogen_protech_trans->protech_type_of_device = "Desktop";

        }else{
            $cocogen_protech_trans->protech_type_of_device = "Laptop";
            if($request->get('device_loc_type') === "Yes"){
                $cocogen_protech_trans->protech_device_location_type = "Within Premises";
            }else{
                $cocogen_protech_trans->protech_device_location_type = "Philippines";
            }
        }
        
        if($request->get('promo')){
            $cocogen_protech_trans->protech_promo_code = $request->get('promo');
        }
        if($request->get('agent_id')){
            $cocogen_protech_trans->protech_agent_id = $request->get('agent_id');
        } 
        $cocogen_protech_trans->save(); 
        $lastid = $cocogen_protech_trans->id;
        $full_name = $request->get('firstName_personal_info') . $request->get('middleName_personal_info') . $request->get('lastName_personal_info');


        if($lastid){
            if($request->file('file')){
                if ($request->file('file')->isValid()) { 
                    $cocogen_protech_trans_uploads = new cocogen_protech_trans_uploads;
                    $cocogen_protech_trans_uploads->filename = $request->file('file')->hashName();
                    $cocogen_protech_trans_uploads->extension = $request->file('file')->extension();
                    $cocogen_protech_trans_uploads->filesize = $request->file('file')->getSize();
                    $cocogen_protech_trans_uploads->location = $request->file('file')->store('protech');
                    $cocogen_protech_trans_uploads->TransID = $lastid;
                    $cocogen_protech_trans_uploads->save();              
                }
            }
        }

        $transnoNo = "";
        if($lastid){
            $transnoNo = "ProTech-" . sprintf('%08d', $lastid);
            $cocogen_protech_trans_update_transno = cocogen_protech_trans::findorFail($lastid);
            $cocogen_protech_trans_update_transno->protect_trans_no = $transnoNo;
            $cocogen_protech_trans_update_transno->save();
        }
         
        if((int)$promo_id > 0){
            $promo_id = (int)$promo_id;
            $limit_usage = (int)$limit_usage - 1;
            $cocogen_promo_update_usage = cocogen_promo_id::findorFail($promo_id);
            $cocogen_promo_update_usage->limit_usage = $limit_usage;
            $cocogen_promo_update_usage->updated_at = $datenow;
            $cocogen_promo_update_usage->save();
        }
        $devicecount = count($request->get('device_access_hardware')) - 1;

        $devicepartArea = "";
        for ($i = 0; $i <= $devicecount; $i++) {
            if(!empty($request->get('device_access_hardware')[$i])){
                $deviceValue_plain = str_replace(',', '',   $request->get('device_access_value')[$i]);
                if($request->get('type_of_device') == "desktop"){
                $limit_usage = (int)$limit_usage - 1;
                    $devicepartArea ="Desktop - Within Premises";
                    $devicePremium = ((int)$deviceValue_plain *0.15)/100;
                }else{
                    if($request->get('device_loc_type') === "Yes"){
                        $devicepartArea ="Laptop - Within Premises";
                        $devicePremium = ((int)$deviceValue_plain *0.75)/100;
                    }else{
                        $devicepartArea ="Laptop - Philippines";
                        $devicePremium = ((int)$deviceValue_plain *3.5)/100;
                    }
                }

              $cocogen_protech_device_part = new cocogen_protech_device_part;
              $cocogen_protech_device_part->protech_trans_no = $transnoNo;
              $cocogen_protech_device_part->protech_device_part = $request->get('device_access_hardware')[$i];
              $cocogen_protech_device_part->protect_make = $request->get('device_access_make')[$i];
              $cocogen_protech_device_part->protect_model = $request->get('device_access_model')[$i];
              $cocogen_protech_device_part->protech_serial_no = $request->get('device_access_serial')[$i];
              $cocogen_protech_device_part->protech_year_purchased = $request->get('device_access_year')[$i];
              $cocogen_protech_device_part->protech_value = $deviceValue_plain;
              $cocogen_protech_device_part->protech_premium = $devicePremium;
              $cocogen_protech_device_part->area = $devicepartArea;
              $cocogen_protech_device_part->updated_at = $datenow;
              $cocogen_protech_device_part->created_at = $datenow;
              $cocogen_protech_device_part->save();
            }
           
        } 

        if($request->get('device_loc_type_modified') === "Yes"){
            $partcount = count($request->get('psrt_access_hardware')) - 1;
            for ($x = 0; $x <= $partcount; $x++) {
                if(!empty($request->get('psrt_access_hardware')[$x])){
                    $partValue_plain = str_replace(',', '',   $request->get('psrt_access_value')[$x]);
                    if($request->get('type_of_device') == "desktop"){
                        $devicepartArea ="Desktop - Within Premises";
                        $partPremium = ((int)$partValue_plain *0.15)/100;
                    }else{
                        if($request->get('device_loc_type') === "Yes"){
                            $devicepartArea ="Laptop - Within Premises";
                            $partPremium = ((int)$partValue_plain *0.75)/100;
                        }else{
                            $devicepartArea ="Laptop - Philippines";
                            $partPremium = ((int)$partValue_plain *3.5)/100;
                        }
                    }

                  $cocogen_protech_device_part = new cocogen_protech_device_part;
                  $cocogen_protech_device_part->protech_trans_no = $transnoNo;
                  $cocogen_protech_device_part->protech_device_part = $request->get('psrt_access_hardware')[$x];
                  $cocogen_protech_device_part->protect_make = $request->get('psrt_access_make')[$x];
                  $cocogen_protech_device_part->protect_model = $request->get('psrt_access_model')[$x];
                  $cocogen_protech_device_part->protech_serial_no = $request->get('psrt_access_serial')[$x];
                  $cocogen_protech_device_part->protech_year_purchased = $request->get('psrt_access_year')[$x];
                  $cocogen_protech_device_part->protech_value = $partValue_plain;
                  $cocogen_protech_device_part->protech_premium = $partPremium;
                  $cocogen_protech_device_part->area = $devicepartArea;          
                  $cocogen_protech_device_part->updated_at = $datenow;
                  $cocogen_protech_device_part->created_at = $datenow;
                  $cocogen_protech_device_part->save();
                }
                
            } 
        }
        

        $cocogen_protect_deductible = new cocogen_protect_deductible;
        $cocogen_protect_deductible->protech_trans_no = $transnoNo;
        $cocogen_protect_deductible->protech_deductible_name = "Deductible";
        $cocogen_protect_deductible->protech_deductible_amount = $request->get('hidden_deductible');
        $cocogen_protect_deductible->updated_at = $datenow;
        $cocogen_protect_deductible->created_at = $datenow;
        $cocogen_protect_deductible->save();

        $cocogen_protect_deductible_acct_dop = new cocogen_protect_deductible;
        $cocogen_protect_deductible_acct_dop->protech_trans_no = $transnoNo;
        $cocogen_protect_deductible_acct_dop->protech_deductible_name = "Accidental Dropping";
        $cocogen_protect_deductible_acct_dop->protech_deductible_amount = $request->get('hidden_acc_drop');
        $cocogen_protect_deductible_acct_dop->updated_at = $datenow;
        $cocogen_protect_deductible_acct_dop->created_at = $datenow;
        $cocogen_protect_deductible_acct_dop->save();

        $cocogen_protect_deductible_rbt = new cocogen_protect_deductible;
        $cocogen_protect_deductible_rbt->protech_trans_no = $transnoNo;
        $cocogen_protect_deductible_rbt->protech_deductible_name = "Robbery/Burglary/Theft";
        $cocogen_protect_deductible_rbt->protech_deductible_amount = $request->get('hidden_rbt');
        $cocogen_protect_deductible_rbt->updated_at = $datenow;
        $cocogen_protect_deductible_rbt->created_at = $datenow;
        $cocogen_protect_deductible_rbt->save();
       
        $parameters = [
            'txnid' => $transnoNo, # Varchar(40) A unique id identifying this specific transaction from the merchant site
            'amount' => $totalprem, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
            'ccy' => 'PHP', # Char(3) The currency of the amount
            'description' => $transnoNo, # Varchar(128) A brief description of what the payment is for
            'email' => $request->get('email_personal_info'), # Varchar(40) email address of customer
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
       

        $cocogen_meta = cocogen_meta::where('page', '=', "Protech Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.protech.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function pending(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "Protech Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.protech.pending', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function failed(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "Protech Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.protech.failed', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function get_promo(Request $request){       
        //$cocogen_promo = cocogen_promo::get();
         $data = DB::table('cocogen_promo')
                    ->select('id','rate','amount','type', 'limit_usage')
                    ->where('effectiveDate', '<', \DB::raw('NOW()'))
                    ->where('expiryDate', '>', \DB::raw('NOW()'))
                    ->where('transType',  "PROTECH")
                    ->where('promo', $request->get('promo'))
                    ->where('limit_usage','>', 0)
                    ->get(); 
        return response()->json($data, 201);
    }   
}
