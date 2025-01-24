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
class inquirynologin extends Controller
{
    public function checkbranch(Request $request){
        //client
        if ($request->get('typeid') === "C"){
            //mycode
            $myaccountclient = cocogen_users_client_code::select('code')->where('email', $request->get('email'))->get(); 
            $myaccountclientcode = "";
                if($myaccountclient){
                    foreach ($myaccountclient as $val) {
                        if(!$myaccountclientcode){
                            $myaccountclientcode = $val->code;  
                        }else{
                            $myaccountclientcode = $myaccountclientcode . "," . $val->code ;
                        }                       
                    }
                }  
            $getmyotheraccountemailclient = cocogen_users_client_email::select('email2')->where('email', '=', $request->get('email'))->get();
            $getmyotheraccountcodeclient = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient)->get();    
            //get my other email
            $myotehraccountclientcode = "";
            if($getmyotheraccountcodeclient){
                foreach ($getmyotheraccountcodeclient as $val) {
                    if(!$myotehraccountclientcode){
                        $myotehraccountclientcode = $val->code;  
                    }else{
                        $myotehraccountclientcode = $myotehraccountclientcode . "," . $val->code ;
                    }                           
                } 
            }            

            $getmyotheraccountemailclient2 = cocogen_users_client_email::select('email')->where('email2', '=', $request->get('email'))->get();
            $getmyotheraccountcodeclient2 = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient2)->get();
            //get my other email
            $myotehraccountclientcode2 = "";
            if($getmyotheraccountcodeclient2){
                foreach ($getmyotheraccountcodeclient2 as $val) {
                    if(!$myotehraccountclientcode2){
                        $myotehraccountclientcode2 = $val->code;  
                    }else{
                        $myotehraccountclientcode2 = $myotehraccountclientcode2 . "," . $val->code ;
                    }                           
                } 
            }
            if($myotehraccountclientcode){
                $myaccountclientcode = $myaccountclientcode. ',' .$myotehraccountclientcode;
            }
            if($myotehraccountclientcode2){
                $myaccountclientcode = $myaccountclientcode. ',' .$myotehraccountclientcode2;
            }
            $myaccountclientcode = explode(',', $myaccountclientcode);
            $cocogen_epolicy_dtl_client = cocogen_epolicy_dtl::whereIn('clientAssuredId', $myaccountclientcode)->get(); 
            
            $line = $request->get('line');
	        $branch = "";
	        foreach($cocogen_epolicy_dtl_client as $cocogen_epolicy_dtl){
	            $message =  explode( '-', $cocogen_epolicy_dtl->policyNo);
	            if($message[0] === $line){
	                if($branch){
	                    $branch = $branch.":".$message[2];
	                }else{
	                    $branch = $message[2];
	                }                
	            }                               
	        }        
	        $branch_filtered = explode(':', $branch);
	        $cocogen_admin_branch = cocogen_admin_branch::whereIn('branch_cd', $branch_filtered)->get();   
	        return response()->json($cocogen_admin_branch, 201);   

        }

        //agent
        if ($request->get('typeid') === "A"){
        	$myaccountagent = cocogen_users_agent_code::select('code')->where('email', $request->get('email'))->get();        
            $myaccountagentcode = "";
            $myaccountagentcodecoodefirst = "";
            if($myaccountagent){
                foreach ($myaccountagent as $val) {
                    if(!$myaccountagentcode){
                        $myaccountagentcodecoodefirst = $val->code;  
                        $myaccountagentcode = $val->code;  
                    }else{
                        $myaccountagentcode = $myaccountagentcode . "," . $val->code ;
                    }                       
                }
            } 
            $date = date_create();
            $datehash = date_timestamp_get($date);
            $transID = $myaccountagentcodecoodefirst .":". $datehash .":". $request->get('email');
            $transID2 = sha1($transID);            
            $transID3 = $transID.":".$transID2;            
            $transID4 = base64_encode($transID3);
            $getmyotheraccountemail = cocogen_users_agent_email::select('email2')->where('email', '=', $request->get('email'))->get();
            $getmyotheraccountcode = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail)->get();    
            //get my other email
            $myotehraccountagentcode = "";
            if($getmyotheraccountcode){
                foreach ($getmyotheraccountcode as $val) {
                    if(!$myotehraccountagentcode){
                        $myotehraccountagentcode = $val->code;  
                    }else{
                        $myotehraccountagentcode = $myotehraccountagentcode . "," . $val->code ;
                    }                           
                } 
            }
            $getmyotheraccountemail2 = cocogen_users_agent_email::select('email')->where('email2', '=', $request->get('email'))->get();
            $getmyotheraccountcode2 = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail2)->get();
            //get my other email
            $myotehraccountagentcode2 = "";
            if($getmyotheraccountcode2){
                foreach ($getmyotheraccountcode2 as $val) {
                    if(!$myotehraccountagentcode2){
                        $myotehraccountagentcode2 = $val->code;  
                    }else{
                        $myotehraccountagentcode2 = $myotehraccountagentcode2 . "," . $val->code ;
                    }                           
                } 
            }
            if($myotehraccountagentcode){
                $myaccountagentcode = $myaccountagentcode. ',' .$myotehraccountagentcode;
            }
            if($myotehraccountagentcode2){
                $myaccountagentcode = $myaccountagentcode. ',' .$myotehraccountagentcode2;
            }
            $myaccountagentcode = explode(',', $myaccountagentcode);
            $cocogen_epolicy_dtl_agent = cocogen_epolicy_dtl::whereIn('agentId', $myaccountagentcode)->get();  

            $line = $request->get('line');
	        $branch = "";
	        foreach($cocogen_epolicy_dtl_agent as $cocogen_epolicy_dtl){
	            $message =  explode( '-', $cocogen_epolicy_dtl->policyNo);
	            if($message[0] === $line){
	                if($branch){
	                    $branch = $branch.":".$message[2];
	                }else{
	                    $branch = $message[2];
	                }                
	            }                               
	        }        
	        $branch_filtered = explode(':', $branch);
	        $cocogen_admin_branch = cocogen_admin_branch::whereIn('branch_cd', $branch_filtered)->get();   
	        return response()->json($cocogen_admin_branch, 201);   
        }

        if ($request->get('typeid') === "B"){
			 //mycode
            $myaccountclient = cocogen_users_client_code::select('code')->where('email', $request->get('email'))->get(); 
            $myaccountclientcode = "";
                if($myaccountclient){
                    foreach ($myaccountclient as $val) {
                        if(!$myaccountclientcode){
                            $myaccountclientcode = $val->code;  
                        }else{
                            $myaccountclientcode = $myaccountclientcode . "," . $val->code ;
                        }                       
                    }
                }  
            $getmyotheraccountemailclient = cocogen_users_client_email::select('email2')->where('email', '=', $request->get('email'))->get();
            $getmyotheraccountcodeclient = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient)->get();    
            //get my other email
            $myotehraccountclientcode = "";
            if($getmyotheraccountcodeclient){
                foreach ($getmyotheraccountcodeclient as $val) {
                    if(!$myotehraccountclientcode){
                        $myotehraccountclientcode = $val->code;  
                    }else{
                        $myotehraccountclientcode = $myotehraccountclientcode . "," . $val->code ;
                    }                           
                } 
            }            

            $getmyotheraccountemailclient2 = cocogen_users_client_email::select('email')->where('email2', '=', $request->get('email'))->get();
            $getmyotheraccountcodeclient2 = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient2)->get();
            //get my other email
            $myotehraccountclientcode2 = "";
            if($getmyotheraccountcodeclient2){
                foreach ($getmyotheraccountcodeclient2 as $val) {
                    if(!$myotehraccountclientcode2){
                        $myotehraccountclientcode2 = $val->code;  
                    }else{
                        $myotehraccountclientcode2 = $myotehraccountclientcode2 . "," . $val->code ;
                    }                           
                } 
            }
            if($myotehraccountclientcode){
                $myaccountclientcode = $myaccountclientcode. ',' .$myotehraccountclientcode;
            }
            if($myotehraccountclientcode2){
                $myaccountclientcode = $myaccountclientcode. ',' .$myotehraccountclientcode2;
            }
            $myaccountclientcode = explode(',', $myaccountclientcode);
            $cocogen_epolicy_dtl_client = cocogen_epolicy_dtl::whereIn('clientAssuredId', $myaccountclientcode)->get(); 


            //

            $myaccountagent = cocogen_users_agent_code::select('code')->where('email', $request->get('email'))->get();        
            $myaccountagentcode = "";
            $myaccountagentcodecoodefirst = "";
            if($myaccountagent){
                foreach ($myaccountagent as $val) {
                    if(!$myaccountagentcode){
                        $myaccountagentcodecoodefirst = $val->code;  
                        $myaccountagentcode = $val->code;  
                    }else{
                        $myaccountagentcode = $myaccountagentcode . "," . $val->code ;
                    }                       
                }
            } 
            $date = date_create();
            $datehash = date_timestamp_get($date);
            $transID = $myaccountagentcodecoodefirst .":". $datehash .":". $request->get('email');
            $transID2 = sha1($transID);            
            $transID3 = $transID.":".$transID2;            
            $transID4 = base64_encode($transID3);
            $getmyotheraccountemail = cocogen_users_agent_email::select('email2')->where('email', '=', $request->get('email'))->get();
            $getmyotheraccountcode = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail)->get();    
            //get my other email
            $myotehraccountagentcode = "";
            if($getmyotheraccountcode){
                foreach ($getmyotheraccountcode as $val) {
                    if(!$myotehraccountagentcode){
                        $myotehraccountagentcode = $val->code;  
                    }else{
                        $myotehraccountagentcode = $myotehraccountagentcode . "," . $val->code ;
                    }                           
                } 
            }
            $getmyotheraccountemail2 = cocogen_users_agent_email::select('email')->where('email2', '=', $request->get('email'))->get();
            $getmyotheraccountcode2 = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail2)->get();
            //get my other email
            $myotehraccountagentcode2 = "";
            if($getmyotheraccountcode2){
                foreach ($getmyotheraccountcode2 as $val) {
                    if(!$myotehraccountagentcode2){
                        $myotehraccountagentcode2 = $val->code;  
                    }else{
                        $myotehraccountagentcode2 = $myotehraccountagentcode2 . "," . $val->code ;
                    }                           
                } 
            }
            if($myotehraccountagentcode){
                $myaccountagentcode = $myaccountagentcode. ',' .$myotehraccountagentcode;
            }
            if($myotehraccountagentcode2){
                $myaccountagentcode = $myaccountagentcode. ',' .$myotehraccountagentcode2;
            }
            $myaccountagentcode = explode(',', $myaccountagentcode);
            $cocogen_epolicy_dtl_agent = cocogen_epolicy_dtl::whereIn('agentId', $myaccountagentcode)->get();  

            $line = $request->get('line');
	        $branch = "";
	        foreach($cocogen_epolicy_dtl_client as $cocogen_epolicy_dtl){
	            $message =  explode( '-', $cocogen_epolicy_dtl->policyNo);
	            if($message[0] === $line){
	                if($branch){
	                    $branch = $branch.":".$message[2];
	                }else{
	                    $branch = $message[2];
	                }                
	            }                               
	        }        
	        foreach($cocogen_epolicy_dtl_agent as $cocogen_epolicy_dtl){
	            $message =  explode( '-', $cocogen_epolicy_dtl->policyNo);
	            if($message[0] === $line){
	                if($branch){
	                    $branch = $branch.":".$message[2];
	                }else{
	                    $branch = $message[2];
	                }                
	            }                               
	        }        
	        $branch_filtered = explode(':', $branch);
	        $cocogen_admin_branch = cocogen_admin_branch::whereIn('branch_cd', $branch_filtered)->get();   
	        return response()->json($cocogen_admin_branch, 201);   
		}
	}

	public function success(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 

        $cocogen_meta = cocogen_meta::where('page', '=', "General Inquiry")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $cocogen_product_line = cocogen_product_line::where('status', '=', "Yes")
                ->orderBy('line', 'asc')
                ->get();       
        return view('epolicy.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_product_lines' => $cocogen_product_line,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }
}
