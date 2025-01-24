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
use App\Models\cocogen_admin_paidpolicies;

class onlinepayment extends Controller
{
    public function onlinepaymentsWithParameters($id){
        $id = base64_decode($id);

        $cocogen_epolicy_dtl = cocogen_epolicy_dtl::where('id','=', $id)->get();
        $cocogen_admin_paidpolicies = cocogen_admin_paidpolicies::where('policy', $cocogen_epolicy_dtl[0]["policyNo"])->get();           
        if(count($cocogen_admin_paidpolicies) ===0){
                $cocogen_admin_paidpolicies = "";
        }
        //dd($cocogen_epolicy_dtl);
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Online Payments")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];        
        return view('services.online-payments-with-parameter', ['cocogen_epolicy_dtl' => $cocogen_epolicy_dtl,'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_paidpolicies' => $cocogen_admin_paidpolicies]);
    }

    public function onlinepayments(){

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Online Payments")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];        
        return view('services.online-payments', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function onlinepaymentspay(Request $request){        
                    $rules = [                                
                                'name' => 'required|max:255',
                                'email' => 'required|email',
                                'policy_no.*' => 'required_without:amount.*',
                                'amount.*' => 'required_without:policy_no.*',
                                'contact' => 'required'                            
                    ];
                    $niceNames = [
                                'name' => 'name', 
                                'policy_no' => 'policy no',
                                'amount' => 'amount' ,
                                'name.*' => 'name', 
                                'policy_no.*' => 'policy no',
                                'amount.*' => 'amount' ,
                                'email' => 'email', 
                                'contact' => 'contact'                     
                    ];                    
                       
                    $this->validate($request, $rules, [], $niceNames);

                    $cocogen_onlinepayments = new cocogen_onlinepayments;
                    $cocogen_onlinepayments->name = $request->get('name');
                    $cocogen_onlinepayments->emailAddress  = $request->get('email');
                    $cocogen_onlinepayments->contactNo  = $request->get('contact');
                    $cocogen_onlinepayments->save();     
                    $inserted_id = $cocogen_onlinepayments->id;

                    $policy_no = $request->get('policy_no');
                    $invoice_no = $request->get('invoice_no');
                    $amountT = $request->get('amount');

                    $totalAmount = 0;
                    $invoiceall = "";
                    $policyall = "";
                    for($i = 0; $i < count($amountT); $i++){
                        $amountTol = str_replace(',', '',   $amountT[$i]);
                        $totalAmount += $amountTol;

                        $cocogen_onlinepayments_dtl = new cocogen_onlinepayments_dtl;
                        $cocogen_onlinepayments_dtl->pay_id = $inserted_id;
                        $cocogen_onlinepayments_dtl->policyNo =  $policy_no[$i];                       
                        // $cocogen_onlinepayments_dtl->invoiceNo =  $invoice_no[$i];                       
                        $cocogen_onlinepayments_dtl->amount  =  $amountTol;
                        $cocogen_onlinepayments_dtl->save();                         

                        if($policyall){
                            
                            if($policy_no[$i]){
                                // $policyall = $policyall .''.$policy_no[$i] . '/'.$invoice_no[$i] . "<br>";
                                $policyall = $policyall .''.$policy_no[$i]  . "<br>";
                            }else{
                                $policyall = $policyall .''.$invoice_no[$i] . "<br>";
                            }
                        }else{
                            
                            if($policy_no[$i]){
                                $policyall = $policy_no[$i]  . "<br>";
                            }else{
                                $policyall = $invoice_no[$i] .'' . "<br>";
                            }
                        }

                       
                    }
                    $cocogen_onlinepayment = cocogen_onlinepayments::findorFail($inserted_id);
                    $cocogen_onlinepayment->tnxid = "ONPAYMNTS-". date('y') . "-". $inserted_id . "-00" ;
                    $cocogen_onlinepayment->amount = $totalAmount;// $totalAmount;
                    if($request->get('PaymentLater') === "Send Payment Link"){
                        $cocogen_onlinepayment->status = "PENDING";// $totalAmount;
                    }else{
                        $cocogen_onlinepayment->status = "SENT";// $totalAmount;
                    }
                    
                    $cocogen_onlinepayment->save();
                    $transno = "ONPAYMNTS-". date('y') . "-". $inserted_id . "-00";
                    $parameters = [
                        'txnid' => $transno, # Varchar(40) A unique id identifying this specific transaction from the merchant site
                        'amount' => $totalAmount, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                        'ccy' => 'PHP', # Char(3) The currency of the amount
                        'description' => $transno, # Varchar(128) A brief description of what the payment is for
                        'email' => $request->get('email'), # Varchar(40) email address of customer
                        'param1' => $totalAmount, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                        'param2' => $request->get('email'), # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
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
                                                    

                    //PaymentLater
                    if($request->get('PaymentLater') === "Send Payment Link"){
                        $amountT = number_format((float)$totalAmount, 2, '.', '');
                        $amountComma = number_format($totalAmount, 2);
                        $digest1 = env('MERCHANT_ID').':'.$transno.':'.$amountT.':'.'PHP'.':'.$transno.':'. $request->get('email') .':'. env('MERCHANT_PASSWORD');
                        $digest = sha1(env('MERCHANT_ID').':'.$transno.':'.$amountT.':'.'PHP'.':'.$transno.':'. $request->get('email') .':'. env('MERCHANT_PASSWORD'));
                        $limk = env('DRAGONPAY_LINK').'?merchantid='.env('MERCHANT_ID').'&txnid='.$transno.'&amount='.$amountT.'&ccy='.'PHP'.'&description='.$transno.'&email='. $request->get('email') .'&digest='.$digest .'&param1='.$amountT.'&param2='.$request->get('email'). '&mode=1';
                        //dd($digest,$digest1,$limk);
                        $this->emailsendonlinepaymentpaylater($request->get('name'), $request->get('email'), $limk,$transno, \Auth::user()->name, $amountComma,$policyall);
                        $status_message = "Payment request was successfully sent to client!";
                        return back()->withInput()->with('message',$status_message);
                    }else{
                        $dragonpay->setParameters($parameters)->away();
                    }
    }

    public function emailsendonlinepaymentpaylater($fname, $email, $link,$txnid,$cname,$amount,$policy) {
            $data = array('fname'=>$fname, 'email'=>$email, 'link'=>$link, 'txnid'=>$txnid, 'cname'=>$cname, 'amount'=>$amount, 'policy'=>$policy);
            Mail::send('emailtemplate.onlinepaymentpaylater', $data, function($message) use ($fname,$link, $email,$txnid,$cname,$amount,$policy)
              {
                $message->to($email, 'COCOGEN')->subject('Payment link for payment no.'.$txnid )->from('no-reply@cocogen.com', 'COCOGEN');;
              });
    }
}
