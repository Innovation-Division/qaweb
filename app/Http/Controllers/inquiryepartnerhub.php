<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tracking_codes;
use App\Models\cocogen_getquote_mvtypes;
use App\Models\cocogen_quote_request;
use App\Models\cocogen_ctpl_vehicleinfo;
use App\Models\cocogen_ctpl_clientinfo;
use App\Models\cocogen_getquote_premium;
use App\Models\cocogen_quote_request_changeprimary;
use App\Models\cocogen_ctpl_vehicleinfochangeprimary;
use App\Models\cocogen_ctpl_clientinfo_changeprimary;
use App\Models\cocogen_compre_personalinfo_changeprimary;
use App\Models\cocogen_ctpl_coc_series;
use App\Models\cocogen_product_trans;
use App\Models\location;
use App\Models\occupation;
use App\Models\cocogen_product_link;
use App\Models\city;
use App\Models\province;
use App\Models\cocogen_fmv;
use App\Models\cocogen_fmv_year;
use App\Models\cocogen_brand_year;
use App\Models\cocogen_compre_bipd;
use App\Models\cocogen_compre_carinfo;
use App\Models\cocogen_compre_personalinfo;
use App\Models\cocogen_compre_addtlcarinfo;
use App\Models\cocogen_compre_carinfo_changeprimary;
use App\Models\cocogen_compre_accessory_trans;
use App\Models\cocogen_onlinepayments;
use App\Models\cocogen_onlinepayments_changeprimary;
use App\Models\cocogen_compre_accessory;
use App\Models\cocogen_ctpl_file;
use App\Models\cocogen_compre_file;
use App\Models\cocogen_careers;
use App\Models\cocogen_careers_trans;
use App\Models\cocogen_careers_uploads;
use App\Models\cocogen_careers_job_description;
use App\Models\cocogen_careers_qualification;
use App\Models\cocogen_feedback_trans;
use App\Models\cocogen_product_line;
use App\Models\cocogen_search;
use App\Models\location_compre;
use App\Models\cocogen_meta;
use App\Models\location_ctpl;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_onlinepayments_dtl;
use App\Models\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use user_uploads;
use App\Models\cocogen_admin_pages;
use App\Models\cocogen_admin_pages_news;
use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_breadcrumbs;
use App\Models\cocogen_admin_main;
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
use DB;
use Session;
use SoapClient;
use DateTime;
use Mail;
use PDF;
use Auth;
use URL;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Crazymeeks\Foundation\PaymentGateway\Options\Processor;
use Storage;
use App\Models\cocogen_covid_trans;
use App\Models\cocogen_covid_trans_uploads;
use App\Models\cocogen_covid_file;
use App\Models\cocogen_promo;
use App\Models\cocogen_epolicy_dtl;
use App\Models\cocogen_general_inquiries;
use App\Models\cocogen_users_client_code;
use App\Models\cocogen_users_client_email;
use App\Models\cocogen_admin_branch;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_users_agent_email;
use App\Models\cocogen_hardcopies;
use App\Models\cocogen_hardcopies_pol;
class inquiryepartnerhub extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }   

	public function epartnergeneralinquirysave(Request $request){
	
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        $cocogen_general_inquiries = new cocogen_general_inquiries;
        $cocogen_general_inquiries->topic  = $request->get('topic'); 
        if($request->get('topic') === "Product Inquiry"){
            $cocogen_general_inquiries->product  = $request->get('product'); 
        	$cocogen_general_inquiries->branch_cd  = $request->get('branch'); 
        }
        $cocogen_general_inquiries->name  = \Auth::user()->name;
        $cocogen_general_inquiries->email  = \Auth::user()->email;
        $cocogen_general_inquiries->message  = $request->get('message'); 
        if(\Auth::user()->type === "C"){
            $cocogen_general_inquiries->type  = "Epolicy";            
        }else{
            $cocogen_general_inquiries->type  = "Epartner Hub";            
        }
        $cocogen_general_inquiries->created_at  = $datenow;
        $cocogen_general_inquiries->updated_at  = $datenow;     
        $cocogen_general_inquiries->save();


        if($request->get('topic') === "Product Inquiry"){
            $product  = $request->get('product'); 
            if($request->get('branch')){
	        	if($request->get('branch') === "HO"){
		        	$email = "client_services@cocogen.com";
		        }else{
		        	$cocogen_admin_branch = cocogen_admin_branch::where('branch_cd', '=', $request->get('branch'))->get();
		        	if(count($cocogen_admin_branch) > 0){
		        		$email = $cocogen_admin_branch[0]["email"];
		        	}else{
		        		$email = "client_services@cocogen.com";
		        	}
		        }
	        }else{
		        $email = "client_services@cocogen.com";
	        }
        }else{
            $product  = "";
		    $email = "client_services@cocogen.com";

        }

        $emailclient = \Auth::user()->email;
        //dd(\Auth::user()->name, $email,$emailclient,$request->get('topic'),$product,$request->get('message'));
        $this->emailsendproductinquireies(\Auth::user()->name, $email,$emailclient,$request->get('topic'),$product,$request->get('message'));
        return redirect('/epolicy-inquiry/success/');
	}

    public function emailsendproductinquireies($fname, $emailto,$email,$topic, $product,$message1) {
        if($emailto === "client_services@cocogen.com"){
            $data = array('fname'=>$fname, 'emailto'=>$emailto,'email'=>$email,  'topic'=>$topic, 'product'=>$product, 'message1'=>$message1);
            Mail::send('emailtemplate.generalinquiryinternal', $data, function($message) use ($fname, $emailto, $email, $topic, $product, $message1)
              {
                 $message->to('val_mangoba@cocogen.com', 'COCOGEN')->subject('General Inquiry: '. $topic);
              });
        }else{
             $data = array('fname'=>$fname, 'emailto'=>$emailto,'email'=>$email,  'topic'=>$topic, 'product'=>$product, 'message1'=>$message1);
            Mail::send('emailtemplate.generalinquiryinternal', $data, function($message) use ($fname, $emailto, $email, $topic, $product, $message1)
              {
                 $message->to('val_mangoba@cocogen.com', 'COCOGEN')->subject('General Inquiry: '. $topic);
              });
        }
           
    }

    public function sendForHardCopyClient(Request $request){ 
       // dd($request);
        $rules = [
            'chckClientPol' =>'required'                
        ];
        $niceNames = [
            'chckClientPol' => 'Account type'   
        ];                                      
        $this->validate($request, $rules, [], $niceNames);

        $cocogen_hardcopies = new cocogen_hardcopies;
        $cocogen_hardcopies->reqName = \Auth::user()->name;
        $cocogen_hardcopies->reqEmail = \Auth::user()->email;
        $cocogen_hardcopies->type = \Auth::user()->type;
        $cocogen_hardcopies->save(); 

        $lastInsertedId = $cocogen_hardcopies->id;
        $chckClientPols = $request->get('chckClientPol');       
        $branch = "";
        if($lastInsertedId){
            if($chckClientPols){
                foreach ($chckClientPols as $chckClientPol) {                    
                    $cocogen_hardcopies_pol = new cocogen_hardcopies_pol;
                    $cocogen_hardcopies_pol->policyNo = $chckClientPol;
                    $cocogen_hardcopies_pol->transno = $lastInsertedId;
                    $cocogen_hardcopies_pol->save(); 

                    $message =  explode( '-', $chckClientPol);
	                if($branch){
	                    $branch = $branch.":".$message[2];
	                }else{
	                    $branch = $message[2];
	                }  
                }
            }            
        }      
        $branch_filtered = explode(':', $branch);
        $cocogen_admin_branch = cocogen_admin_branch::whereIn('branch_cd', $branch_filtered)->get();
        foreach ($cocogen_admin_branch as $key ) {
        	$policyAll = "";
        	$email = "";
        	 if($chckClientPols){
                foreach ($chckClientPols as $chckClientPol) {   
                    $polbranch =  explode( '-', $chckClientPol);
                    if($key->branch_cd === $polbranch[2]){
                    	if($policyAll){
                            $policyAll = $policyAll .''.$chckClientPol . "<br>";
	                    }else{
	                        $policyAll = $chckClientPol .'' . "<br>";
	                    }
                    }
                }
            } 
            if($key->email){
            	$email = $key->email;
            }else{
            	$email = "client_services@cocogen.com";
            }
            $this->emailtoHardCopyClient($policyAll,$email,\Auth::user()->name);            
        }
       

        ///;  
        $status_message = "Request was successfully sent!";
        return back()->withInput()->with('reqhard_success',$status_message); 
    }

    public function emailtoHardCopyClient($policyno,$email,$name) {

        if($email === "client_services@cocogen.com"){
            $data = array('policyno'=>$policyno,'email'=>$email,'name'=>$name);
            Mail::send('emailtemplate.reqforhardcopyclient', $data, function($message) use ($name,$email,$policyno)
              {
                // $message->to($email, 'COCOGEN')->subject('Request for hardcopy : '. $name);
                $message->to('val_mangoba@cocogen.com', 'COCOGEN')->subject('Request for hardcopy : '. $name);
              });
        }else{
            $data = array('policyno'=>$policyno,'email'=>$email,'name'=>$name);
            Mail::send('emailtemplate.reqforhardcopyclient', $data, function($message) use ($name,$email,$policyno)
              {
                $message->to('val_mangoba@cocogen.com', 'COCOGEN')->subject('Request for hardcopy : '. $name);
                // $message->to($email, 'COCOGEN')->cc("client_services@cocogen.com")->subject('Request for hardcopy : '. $name);
              });
        }
            
    }

    public function sendForHardCopyAgent(Request $request){ 
    	
        $rules = [
            'chckClientPol' =>'required'                
        ];
        $niceNames = [
            'chckClientPol' => 'Account type'   
        ];                                      
        $this->validate($request, $rules, [], $niceNames);
        
        $cocogen_hardcopies = new cocogen_hardcopies;
        $cocogen_hardcopies->reqName = \Auth::user()->name;
        $cocogen_hardcopies->reqEmail = \Auth::user()->email;
        $cocogen_hardcopies->type = \Auth::user()->type;
        $cocogen_hardcopies->save(); 

        $lastInsertedId = $cocogen_hardcopies->id;
        $chckClientPols = $request->get('chckClientPol');
        $branch = "";
        if($lastInsertedId){
            if($chckClientPols){
                foreach ($chckClientPols as $chckClientPol) {                    
                    $cocogen_hardcopies_pol = new cocogen_hardcopies_pol;
                    $cocogen_hardcopies_pol->policyNo = $chckClientPol;
                    $cocogen_hardcopies_pol->transno = $lastInsertedId;
                    $cocogen_hardcopies_pol->save(); 

                    $message =  explode( '-', $chckClientPol);
	                if($branch){
	                    $branch = $branch.":".$message[2];
	                }else{
	                    $branch = $message[2];
	                }  
                }
            }            
        }      
        $branch_filtered = explode(':', $branch);
        $cocogen_admin_branch = cocogen_admin_branch::whereIn('branch_cd', $branch_filtered)->get();
        foreach ($cocogen_admin_branch as $key ){
        	$policyAll = "";
        	$email = "";
        	 if($chckClientPols){
                foreach ($chckClientPols as $chckClientPol) {   
                    $polbranch =  explode( '-', $chckClientPol);
                    if($key->branch_cd === $polbranch[2]){
                    	if($policyAll){
                            $policyAll = $policyAll .''.$chckClientPol . "<br>";
	                    }else{
	                        $policyAll = $chckClientPol .'' . "<br>";
	                    }
                    }
                }
            } 
            if($key->email){
            	$email = $key->email;
            }else{
            	$email = "rene_paciente@cocogen.com";
            }
            $this->emailtoHardCopyAgent($policyAll,$email,\Auth::user()->name);         
        } 
        $status_message = "Request was successfully sent!";
        return back()->withInput()->with('success',$status_message); 
    }

    public function emailtoHardCopyAgent($policyno,$email,$name) {

        if($email === "client_services@cocogen.com"){
            $data = array('policyno'=>$policyno,'email'=>$email,'name'=>$name);
            Mail::send('emailtemplate.reqforhardcopyagent', $data, function($message) use ($name,$email,$policyno)
              {
                $message->to('val_mangoba@cocogen.com', 'COCOGEN')->subject('Request for Hardcopy : '. $name);
                // $message->to($email, 'COCOGEN')->subject('Request for Hardcopy : '. $name);
              });
        }else{
            $data = array('policyno'=>$policyno,'email'=>$email,'name'=>$name);
            Mail::send('emailtemplate.reqforhardcopyagent', $data, function($message) use ($name,$email,$policyno)
              {
                $message->to('val_mangoba@cocogen.com', 'COCOGEN')->subject('Request for Hardcopy : '. $name);
                // $message->to($email, 'COCOGEN')->cc("client_services@cocogen.com")->subject('Request for Hardcopy : '. $name);
              });
        }
            
    }
}
