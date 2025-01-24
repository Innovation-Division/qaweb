<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tracking_codes;
use App\Models\cocogen_getquote_mvtypes;
use App\Models\cocogen_quote_request;
use App\Models\cocogen_ctpl_vehicleinfo;
use App\Models\cocogen_ctpl_clientinfo;
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
use App\Models\cocogen_compre_trans_uploads;
use App\Models\cocogen_ctpl_uploads;
use App\Models\cocogen_api_ctpl_mvtype_format;
use App\Models\cocogen_api_ctpl_plate_format;

class ctpl extends Controller
{

    public function getquotemotor(){


        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "CTPL Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   
        $mvtypes = cocogen_getquote_mvtypes::get();
        $province = province::get();
        $location = location::get();        
;
       // $premiums = cocogen_getquote_premium::get();    
        return view('getaquote.motor.quote', ['title' => $title,'mvtypes' => $mvtypes,'provinces' => $province,'locations' => $location,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function emailsendctpl($fname, $email,$content) {
            $data = array('fname'=>$fname, 'email'=>$email,'content'=>$content);
            Mail::send('emailtemplate.ctplexternal', $data, function($message) use ($fname, $email, $content)
              {
                $message->to($email, 'COCOGEN')->subject($fname.', here are your CTPL insurance policies')->from('client_services@cocogen.com', 'COCOGEN');
              });
    }

    public function emailsendctplinternal($fname, $email,$contactNo,$dtnow,$coclink) {
            $data = array('fname'=>$fname, 'email'=>$email, 'contactNo'=>$contactNo,'dtnow'=>$dtnow,'coclink'=>$coclink);
            Mail::send('emailtemplate.ctplinternal', $data, function($message) use ($fname, $email,$contactNo,$dtnow,$coclink)
              {
                $message->to(env('PRODUCTINQURY_EMAILTO'), 'COCOGEN')->subject('Successful CTPL E-Commrce transaction: '. $fname)->from('client_services@cocogen.com', 'COCOGEN');
              });
    }


    public function getquotemotorsave(Request $request){           
        //    dd($request);
        if(session('cocogen_ctpl_clientinfo')){
                    session()->flash('cocogen_ctpl_clientinfo',session('cocogen_ctpl_clientinfo'));
        }

        if($request->get('tabmax')){
            session()->flash('tabmax',$request->get('tabmax')); 
        }

        if($request->get('tnxid')){
            $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_ctpl_clientinfo',$cocogen_ctpl_clientinfo );
        }

        if($request->get('firstTabBtutton') === "btntab1"){                    
                if(!session('tabmax') || session('tabmax') === null){      
                    if($request->get('CBnEWcAR')){
                        $rules = [
                                    'policyType'=>'required',
                                    'mvType' => 'required',
                                    'purchaseDate' => 'required|date_format:m/d/Y',  
                                    'firstName' => 'required|regex:/^[\pL\s\-]+$/u|max:255', 
                                    'lastName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                                    'middleName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                                    'contactNo' => 'required',
                                    'emailAddress' =>'required|email|max:255' ,
                                    'premAmount' =>'required'                  
                        ];
                        $niceNames = [
                                    'policyType'=>'vehicle type',
                                    'mvType' => 'MV type', 
                                    'firstName' => 'first name',   
                                    'purchaseDate' => 'purchase date', 
                                    'lastName' => 'last name', 
                                    'middleName' => 'middle name', 
                                    'contactNo' => 'contact number', 
                                    'emailAddress' => 'email address',
                                    'premAmount' => 'premium'                 
                        ];
                    }else{
                        $rules = [
                                    'policyType'=>'required',
                                    'mvType' => 'required',                                   
                                    'firstName' => 'required|regex:/^[\pL\s\-]+$/u|max:255', 
                                    'lastName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                                    'middleName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                                    'contactNo' => 'required',
                                    'emailAddress' =>'required|email|max:255'  ,
                                    'premAmount' =>'required'                   
                        ];
                        $niceNames = [
                                    'policyType'=>'vehicle type',
                                    'mvType' => 'MV type' ,
                                    'firstName' => 'first name',   
                                    'lastName' => 'last name', 
                                    'middleName' => 'middle name', 
                                    'contactNo' => 'contact number', 
                                    'emailAddress' => 'email address' ,
                                    'premAmount' => 'premium'    

                        ];
                    }                    
                    $this->validate($request, $rules, [], $niceNames);
                    
                    $promo = 0;
                        if($request->get('promoCode')){
                            $data = DB::table('cocogen_promo')
                                    ->select('rate')
                                    ->where('effectiveDate', '<', \DB::raw('NOW()'))
                                    ->where('expiryDate', '>', \DB::raw('NOW()'))
                                    ->where('transType',  "CTPL")
                                    ->where('promo', $request->get('promoCode'))
                                    ->get();                                    
                                    if(count($data) === 0){
                                        //session()->flash('promoCodeError',"Error");        
                                        return back()->withInput()->with('promoCodeError',"Incorrect promo code");
                                    }else{
                                        foreach ($data as $val) {
                                           $promo = $val->rate;
                                        }                                            
                                    }
                        }

                    $premtype = 0;;
                    $mvCode = "";
                    if($request->get('CBnEWcAR')){
                        $data = DB::table('cocogen_getquote_mvtypes')
                                ->select('premtype3' , 'mvCode')
                                ->where('policy_id', $request->get('policyType')) 
                                ->where('premType', $request->get('mvType')) 
                               ->get();
                               foreach ($data as $val) {
                                  $premtype = $val->premtype3;
                                  $mvCode = $val->mvCode;
                               }
                    }else{
                        $data = DB::table('cocogen_getquote_mvtypes')
                                ->select('premtype1' , 'mvCode')
                                ->where('policy_id', $request->get('policyType')) 
                                ->where('premType', $request->get('mvType')) 
                               ->get();
                               foreach ($data as $val) {
                                  $premtype = $val->premtype1;
                                  $mvCode = $val->mvCode;
                               }
                    }
                    $grossprem = str_replace(',', '', $request->get('premAmount'));
                    if($request->get('promoCode')){
                            $finalgrossprem =  $grossprem - ($grossprem * ($promo/100));
                        }else{
                            $finalgrossprem =  $grossprem;
                        }

                    $purchaseDatenewformat = "";
                    if($request->get('CBnEWcAR')){
                        $purchaseDatenewformat = date('Y-m-d', strtotime($request->get('purchaseDate')));                        
                    }
                    
                    //save quote reques
                    $cocogen_quote_request = new cocogen_quote_request;
                    $cocogen_quote_request->tnxid = 1;
                    $cocogen_quote_request->policyType = $request->get('policyType');
                    $cocogen_quote_request->mvType = $request->get('mvType');
                    $cocogen_quote_request->status = "Sent";
                    $cocogen_quote_request->mvCode = $mvCode;
                        if($request->get('promoCode')){
                            $cocogen_quote_request->promoCode = $request->get('promoCode');
                            $cocogen_quote_request->promoRate = $promo;
                        }
                    $cocogen_quote_request->premium = $finalgrossprem;
                    $cocogen_quote_request->premCode  = $premtype;
                        if($request->get('CBnEWcAR')){
                            $cocogen_quote_request->purchaseDate = $purchaseDatenewformat;                            
                            $cocogen_quote_request->brand_new = "Y";
                        }else{                           
                            $cocogen_quote_request->brand_new = "N";
                        }
                    $cocogen_quote_request->save();
                    $inserted_id = $cocogen_quote_request->id;

                    //update txnid
                    $cocogen_quote_tnxid = cocogen_quote_request::findorFail($inserted_id);
                    $cocogen_quote_tnxid->tnxid = "MC-MNC-CTPL-". date('y') . "-". $inserted_id . "-00" ;
                    $cocogen_quote_tnxid->save();

                        $cocogen_ctpl_clientinfo = new cocogen_ctpl_clientinfo;
                        $cocogen_ctpl_clientinfo->firstName = $request->get('firstName');
                        $cocogen_ctpl_clientinfo->lastName = $request->get('lastName');
                        $cocogen_ctpl_clientinfo->tnxid = "MC-MNC-CTPL-". date('y') . "-". $inserted_id . "-00" ;
                        $cocogen_ctpl_clientinfo->middleName = $request->get('middleName');
                        $cocogen_ctpl_clientinfo->barangay = $request->get('barangay');
                        $cocogen_ctpl_clientinfo->Address = $request->get('Address');
                        $cocogen_ctpl_clientinfo->contactNo = $request->get('contactNo');
                        $cocogen_ctpl_clientinfo->emailAddress = $request->get('emailAddress');
                        $cocogen_ctpl_clientinfo->save();  

                    session()->flash('tnxid', "MC-MNC-CTPL-". date('y') . "-". $inserted_id . "-00");
                    session()->flash('tabmax',2);
                }

                    $tab = "tab2";             
                    return back()->withInput()->with('tab',$tab);   
        }

        if($request->get('firstTabBtutton') === "btntab1update"){
                    session()->flash('tnxid',$request->get('tnxid') );  
                    $tab = "tab2";             
                    return back()->withInput()->with('tab',$tab);   
        }
        if($request->get('SecondTabButtonBack') === "tab2back"){
                    session()->flash('tnxid',$request->get('tnxid') );  
                    $tab = "tab2back"; 
                     return back()->withInput()->with('tab',$tab);   
        }

        if($request->get('ThirdTabButtonBack') === "default"){
                    session()->flash('tnxid',$request->get('tnxid') );  
                    $tab = "tab3back"; 
                     return back()->withInput()->with('tab',$tab);   
        }

        if($request->get('SecondTabBtuttonNext') === "btntab3"){

                session()->flash('tnxid',$request->get('tnxid') );   
                if(session('tabmax') <= 2){
                        
            $cocogen_quote_request = cocogen_quote_request::where('tnxid', '=', $request->get('tnxid'))->get();
                        if($cocogen_quote_request[0]["brand_new"] === "Y"){
                            $rules = [
                                    'engineNO' => 'required',
                                    'make' => 'required',  
                                    'chassisNo' => 'required',  
                                    'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+5)                              
                            ];
                            $niceNames = [
                                        'mvFIleNo'=>'MV file number',
                                        'plateNo' => 'plate number', 
                                        'engineNO' => 'engine number',
                                        'chassisNo' => 'chassis number',
                                        'make' => 'make',
                                        'year' => 'year'                  
                            ];             
                        }else{
                             $rules = [
                                    'mvFIleNo'=>'required|digits:15',
                                    'plateNo' => 'required',
                                    'engineNO' => 'required',
                                    'make' => 'required',  
                                    'chassisNo' => 'required',  
                                    'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+5)                              
                            ];
                            $niceNames = [
                                        'mvFIleNo'=>'MV file number',
                                        'plateNo' => 'plate number', 
                                        'engineNO' => 'engine number',
                                        'chassisNo' => 'chassis number',
                                        'make' => 'make',
                                        'year' => 'year'                  
                            ];    
                        }            
                        $this->validate($request, $rules, [], $niceNames);
                

                                $cocogen_ctpl_vehicleinfo = new cocogen_ctpl_vehicleinfo;
                                $cocogen_ctpl_vehicleinfo->mvFIleNo = $request->get('mvFIleNo');
                                $cocogen_ctpl_vehicleinfo->plateNo = $request->get('plateNo');
                                $cocogen_ctpl_vehicleinfo->tnxid = $request->get('tnxid');
                                $cocogen_ctpl_vehicleinfo->engineNO = $request->get('engineNO');
                                $cocogen_ctpl_vehicleinfo->make = $request->get('make');
                                $cocogen_ctpl_vehicleinfo->chassisNo = $request->get('chassisNo');
                                $cocogen_ctpl_vehicleinfo->year = $request->get('year');
                                $cocogen_ctpl_vehicleinfo->save(); 

                        $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $request->get('tnxid'))->get();
                        session()->flash('cocogen_ctpl_clientinfo',$cocogen_ctpl_clientinfo );
                        session()->flash('tabmax',3);
                }
                $tab = "tab3";            
                return back()->withInput()->with('tab',$tab);   
        }

        if($request->get('SecondTabBtuttonNext') === "btntab1update"){
                    session()->flash('tnxid',$request->get('tnxid') ); 
                    $tab = "tab3";            
                    return back()->withInput()->with('tab',$tab);   
        }

        if($request->get('ThirdTabBtuttonBuy') === "BuyFinal"){
                 
                    session()->flash('tnxid',$request->get('tnxid') );   
                    //validation
                        $rules = [                                   
                            'birthDate' => 'required|date_format:m/d/Y|before:-18 years',    
                            'gender_personal_info' => 'required',  
                            'placeofBirth' => 'required',  
                            'status_other_personal_info' => 'required', 
                            'nationality' => 'required',                                                     
                            'occupation' => 'required',                                                     
                            'telno' => 'required',                                                     
                            'sourceoffunds' => 'required',                                                     
                            'type_of_id_personal_info' => 'required',                                                     
                            'idno_other_personal_info' => 'required',                                                     
                            'residence_address' => 'required',                                                     
                            'residence_province' => 'required',                                                     
                            'residence_municipality' => 'required',                                                     
                            'residence_barangay' => 'required',                                                     
                        ];
                        $niceNames = [                                   
                            'birthDate' => 'birthdate', 
                            'gender_personal_info' => 'gender', 
                            'placeofBirth' => 'place of birth', 
                            'status_other_personal_info' => 'civil status', 
                            'nationality' => 'nationality', 
                            'occupation' => 'occupation', 
                            'telno' => 'telelephone number', 
                            'sourceoffunds' => 'source of funds', 
                            'type_of_id_personal_info' => 'type of ID', 
                            'idno_other_personal_info' => 'ID number', 
                            'residence_address' => 'address', 
                            'residence_province' => 'province', 
                            'residence_municipality' => 'municipality', 
                            'residence_barangay' => 'barangay'             
                        ];              
                    $this->validate($request, $rules, [], $niceNames);
                    
                    if($request->get('CBPrivacy') != 1){
                        session()->flash('tab',"tab3");
                        $message = "Please accept our Privacy Policy before proceeding to payment.";
                        return back()->withInput()->with('message',$message);
                    }

                    if($request->get('CBTerms') != 1){
                          session()->flash('tab',"tab3");
                        $message = "Please accept our Terms & Conditions before proceeding to payment.";
                        return back()->withInput()->with('message',$message);
                    }

                    if($request->get('CBExclusion') != 1){
                          session()->flash('tab',"tab3");
                        $message = "Please accept our Exclusion & Limitations before proceeding to payment.";
                        return back()->withInput()->with('message',$message);
                    }

                    $data = DB::table('cocogen_quote_request')
                                ->select('premium')
                                ->where('tnxid', $request->get('tnxid')) 
                               ->get();
                        $premium = 0;  
                        if($data){                            
                            foreach ($data as $value){
                                 $premium = $value->premium;
                            }
                        } 
                       
                        $magilasdonation = 0;
                        if($request->get('CBMagilas')){
                            if($request->get('drpMagilas') === "Others"){
                                if($request->get('otherMagilas')){
                                    $magilasdonation = str_replace(',', '', $request->get('otherMagilas'));
                                }
                            }else{
                                    $magilasdonation = $request->get('drpMagilas');
                            }
                        }

                        $bdatenewformat = date('Y-m-d', strtotime($request->get('birthDate')));

                        $premium = $premium + $magilasdonation;
                        $cocogen_quote_request_changeprimary = cocogen_quote_request_changeprimary::findorFail($request->get('tnxid'));
                        $cocogen_quote_request_changeprimary->premium  = $premium;
                        $cocogen_quote_request_changeprimary->magilasDonation  = $magilasdonation;
                        $cocogen_quote_request_changeprimary->save();

                        $cocogen_ctpl_clientinfo_changeprimary = cocogen_ctpl_clientinfo_changeprimary::findorFail($request->get('tnxid'));
                        $cocogen_ctpl_clientinfo_changeprimary->birthDate = $bdatenewformat;
                        $cocogen_ctpl_clientinfo_changeprimary->gender = $request->get('gender_personal_info');
                        $cocogen_ctpl_clientinfo_changeprimary->placeofBirth = $request->get('placeofBirth');
                        $cocogen_ctpl_clientinfo_changeprimary->civilStatus = $request->get('status_other_personal_info');
                        $cocogen_ctpl_clientinfo_changeprimary->nationality = $request->get('nationality');
                        $cocogen_ctpl_clientinfo_changeprimary->occupation = $request->get('occupation');
                        $cocogen_ctpl_clientinfo_changeprimary->telno = $request->get('telno');
                        $cocogen_ctpl_clientinfo_changeprimary->sourceoffunds = $request->get('sourceoffunds');
                        $cocogen_ctpl_clientinfo_changeprimary->typefofID = $request->get('type_of_id_personal_info');
                        $cocogen_ctpl_clientinfo_changeprimary->IDno = $request->get('idno_other_personal_info');
                        $cocogen_ctpl_clientinfo_changeprimary->residence_address = $request->get('residence_address');
                        $cocogen_ctpl_clientinfo_changeprimary->residence_province = $request->get('residence_province');
                        $cocogen_ctpl_clientinfo_changeprimary->residence_municipality = $request->get('residence_municipality');
                        $cocogen_ctpl_clientinfo_changeprimary->residence_barangay = $request->get('residence_barangay');
                        $cocogen_ctpl_clientinfo_changeprimary->save();  
                        $cocogen_quote_request = cocogen_quote_request::where('tnxid', '=',$request->get('tnxid') )->get();
                        $transID = $cocogen_quote_request[0]['id'];
                        if($request->file('file')){
                            if ($request->file('file')->isValid()) { 
                                $cocogen_ctpl_uploads = new cocogen_ctpl_uploads;
                                $cocogen_ctpl_uploads->filename = $request->file('file')->hashName();
                                $cocogen_ctpl_uploads->extension = $request->file('file')->extension();
                                $cocogen_ctpl_uploads->filesize = $request->file('file')->getSize();
                                $cocogen_ctpl_uploads->location = $request->file('file')->store('ctplID');
                                $cocogen_ctpl_uploads->TransID = $transID ;
                                $cocogen_ctpl_uploads->save();              
                            }
                        }

                        $tab = "tab3";
                        $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=',$request->get('tnxid') )->get();


                        $full_name = $cocogen_ctpl_clientinfo[0]['firstName'] . ' ' . $cocogen_ctpl_clientinfo[0]['middleName'] . ' ' . $cocogen_ctpl_clientinfo[0]['lastName']; 

                        $parameters = [
                            'txnid' => $request->get('tnxid'), # Varchar(40) A unique id identifying this specific transaction from the merchant site
                            'amount' => $premium, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                            'ccy' => 'PHP', # Char(3) The currency of the amount
                            'description' => $request->get('tnxid'), # Varchar(128) A brief description of what the payment is for
                            'email' => $cocogen_ctpl_clientinfo[0]['emailAddress'] , # Varchar(40) email address of customer
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
                        $dragonpay->setParameters($parameters)->withProcid(Processor::CREDIT_CARD)->away();
                        //$dragonpay->setParameters($parameters)->away();
                        }        
      
    }

    public function reauthctplcon(){ 


        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $title = "Failed | COCOGEN | General Insurance";  
        $metadescription = "";
        $keyword = "";
        $message1 = session::get('message1');
        $txnid = session::get('txnid');

        //$txnid = "MC-MNC-CTPL-21-231-00";
        session()->flash('message2',$message1); 
        Session::forget('message1');
        if(empty($txnid)){
           return redirect('/');
        }
        $cocogen_ctpl_vehicleinfos = cocogen_ctpl_vehicleinfo::where('tnxid', '=', $txnid)->get();  
  
        return view('getaquote.motor.ctpl.failed', ['title' => $title,'cocogen_ctpl_vehicleinfo' => $cocogen_ctpl_vehicleinfos,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }
    
    public function reauthctplconsave(Request $request){  
        
        $dtnow = date('Y-m-d H:i:s');        
        $cocogen_ctpl_vehicleinfos = cocogen_ctpl_vehicleinfo::where('tnxid', '=', $request->get('txnid'))->get();
        $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $request->get('txnid'))->get();
        $cocogen_quote_requests = cocogen_quote_request::where('tnxid', '=', $request->get('txnid'))->get(); 

        $full_name = $cocogen_ctpl_clientinfo[0]['firstName'] . ' ' . $cocogen_ctpl_clientinfo[0]['middleName'] . ' ' . $cocogen_ctpl_clientinfo[0]['lastName']; 
        $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::where('id', '=', "1")->get();
        $lastc0c = $cocogen_ctpl_coc_series[0]['coc_no'];
        $lastc0c = $lastc0c + 1;
        $lastc0c = "0" . $lastc0c;

        $plateNo = $cocogen_ctpl_vehicleinfos[0]['plateNo'];
        $plate = $request->get('plateNo');
        $emailAddress = $cocogen_ctpl_clientinfo[0]['emailAddress'];
        $contactNo = $cocogen_ctpl_clientinfo[0]['contactNo'];
        $fullname = $cocogen_ctpl_clientinfo[0]['firstName'] ." ".$cocogen_ctpl_clientinfo[0]['lastName'];
        $coclink = URL::to('/get-quote/view_coc_ctpl') . '/' .sha1($emailAddress) . '/' .base64_encode($request->get('txnid'));

        
        

       if(empty($cocogen_quote_requests[0]['brand_new'])){
            $regType = "N";
            $brand_new = "N";
        }else{
            $regType = "R";
            $brand_new = "R";
        } 
       
        if($cocogen_quote_requests[0]['brand_new'] == "Y"){
            $brand_new = "Y";
            $start = date('m/d/Y', strtotime($cocogen_quote_requests[0]['purchaseDate'])); 
            $end = date("m/d/Y", strtotime(date("m/d/Y", strtotime($start)) . " + 3 year"));
            $params = array(
                 "arg0" => array(
                    "username" => env('COC_API_USERNAME'),
                    "password" => env('COC_API_PASSWORD'),
                    "regType" => "N",
                    "cocNo" => $cocogen_ctpl_coc_series[0]['coc_no'],
                    "engineNo" => $request->get('engineNO'),
                    "chassisNo" => $request->get('chassisNo'),
                    "inceptionDate" => $start,
                    "expiryDate" => $end,
                    "mvType" => $cocogen_quote_requests[0]['mvCode'],//$cocogen_quote_requests[0]['mvType'],
                    "mvPremType" => $cocogen_quote_requests[0]['premCode'],
                    "taxType" => "1",
                    "assuredName" => $full_name,
                    "assuredTin" => "999-999-999-999"
                    )
 
            ); 
        }else{
            $brand_new = "";
            if(strlen($plateNo) > 0){
                $dateINEX = substr($plate, -1);
                $cocogen_api_ctpl_mvtype_format = cocogen_api_ctpl_mvtype_format::where('mvtype', '=', $cocogen_quote_requests[0]['mvCode'])->get();
                if(count($cocogen_api_ctpl_mvtype_format) > 0){
                    $first = substr($plateNo, 0, 1);
                    $second = substr($plateNo, 1, 1);
                    $third = substr($plateNo, 2, 1);
                    $fourth = substr($plateNo, 3, 1);
                    $fifith = substr($plateNo, 4, 1);
                    $six = substr($plateNo, 5, 1);
    
                    $barfirst = "";
                    $barsecond = "";
                    $barthird = "";
                    $barfourth = "";
                    $barfifth = "";
                    $barsix = "";
    
                    if(is_numeric($first)){
                            $barfirst = "N";
                    }else{
                            $barfirst = "X";
                    }
    
                    if(is_numeric($second)){
                            $barsecond = "N";
                    }else{
                            $barsecond = "X";
                    }
    
                    if(is_numeric($third)){
                            $barthird = "N";
                    }else{
                            $barthird = "X";
                    }
    
                    if(is_numeric($fourth)){
                            $barfourth = "N";
                    }else{
                            $barfourth = "X";
                    }
    
                    if(is_numeric($fifith)){
                            $barfifth = "N";
                    }else{
                            $barfifth = "X";
                    }
    
                    if(is_numeric($six)){
                            $barsix = "N";
                    }else{
                            $barsix = "X";
                    }
    
                    $finalformat = $barfirst . $barsecond . $barthird . $barfourth . $barfifth . $barsix;
                    $cocogen_api_ctpl_plate_format = cocogen_api_ctpl_plate_format::where('format', '=',$finalformat)->get();  
                    $numberformat = 0;
                    // $dateINEX = "";
                    if(count($cocogen_api_ctpl_plate_format) > 0){
                        $numberformat = $cocogen_api_ctpl_plate_format[0]['index_no'];
                        if ((int)$numberformat === 1) {
                            $dateINEX = substr($plateNo, 0, 1);
                        }elseif ((int)$numberformat === 2) {
                            $dateINEX = substr($plateNo, 1, 1); 
                        }elseif ((int)$numberformat === 3) {
                            $dateINEX = substr($plateNo, 2, 1); 
                        }elseif ((int)$numberformat === 4) {
                            $dateINEX = substr($plateNo, 3, 1); 
                        }elseif ((int)$numberformat === 5) {
                            $dateINEX = substr($plateNo, 4, 1); 
                        }else{
                            $dateINEX = substr($plateNo, 5, 1); 
                        }
                    }
    
                }
    
            }
    
            if ($dateINEX == 1) {
                $dtCreated = "02/01/" . date('Y');
                $futureDate = "02/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 2) {
                $dtCreated = "03/01/" . date('Y');
                $futureDate = "03/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 3) {
                $dtCreated = "04/01/" . date('Y');
                $futureDate = "04/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 4) {
                $dtCreated = "05/01/" . date('Y');
                $futureDate = "05/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 5) {
                $dtCreated = "06/01/" . date('Y');
                $futureDate = "06/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 6) {
                $dtCreated = "07/01/" . date('Y');
                $futureDate = "07/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 7) {
                $dtCreated = "08/01/" . date('Y');
                $futureDate = "08/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 8) {
                $dtCreated = "09/01/" . date('Y');
                $futureDate = "09/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 9) {
                $dtCreated = "10/01/" . date('Y');
                $futureDate = "10/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 0) {
                $dtCreated = "01/01/" . date('Y');
                $futureDate = "01/01/" . date('Y', strtotime('+1 years'));
            } else {
                $dtCreated = "01/01/" . date('Y');
                $futureDate = "01/01/" . date('Y', strtotime('+1 years'));
            }
            $params = array(
                "arg0" => array(
                    "username" => env('COC_API_USERNAME'),
                    "password" => env('COC_API_PASSWORD'),
                    "regType" => "R",
                    "cocNo" => $cocogen_ctpl_coc_series[0]['coc_no'],
                    "plateNo" => $request->get('plateNo'),
                    "mvFileNo" => $request->get('mvFIleNo'), 
                    "engineNo" => $request->get('engineNO'), 
                    "chassisNo" => $request->get('chassisNo'),
                    "inceptionDate" => $dtCreated,
                    "expiryDate" => $futureDate,
                    "mvType" => $cocogen_quote_requests[0]['mvCode'],//$cocogen_quote_requests[0]['mvType'],
                    "mvPremType" => $cocogen_quote_requests[0]['premCode'],
                    "taxType" => "1",
                    "assuredName" => $full_name,
                    "assuredTin" => "999-999-999-999"
                    )
                );
            }           

           $opts = array(
                "ssl" => array(
                    // 'ciphers'=>'RC4-SHA',
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )               
            );
            $context = stream_context_create($opts);
            // *** END ***
            $client = new SoapClient(env('COC_API_LINK'), array("trace" => true, "stream_context" => $context));  

            $response = $client->__soapCall("register", array($params));

            foreach ($response as $responses) {
                //$responses->errorMessage
                //$responses->authNo

                if(!empty($responses->authNo)){

                    $cocogen_quote_tnxid = cocogen_quote_request_changeprimary::findorFail($request->get('txnid'));
                    $cocogen_quote_tnxid->status = "Autheticated";
                    $cocogen_quote_tnxid->save();

                    $cocogen_ctpl_vehicleinfochangeprimary = cocogen_ctpl_vehicleinfochangeprimary::findorFail($request->get('txnid'));
                    $cocogen_ctpl_vehicleinfochangeprimary->authNo =  $responses->authNo;
                    $cocogen_ctpl_vehicleinfochangeprimary->cocNO =  $lastc0c;
                    $cocogen_ctpl_vehicleinfochangeprimary->save();                   

                    Session::forget('txnid');
                    Session::forget('message1');
                    
                    $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::findorFail("1");
                    $cocogen_ctpl_coc_series->coc_no = $lastc0c;
                    $cocogen_ctpl_coc_series->save();

                    $authNo = $responses->authNo;
                    $this->downloadPDFCTPL($request->get('txnid'),$authNo);

                    $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 7)->get();
                    $external = str_replace( "templatefname", $full_name, $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace( "templatelink", $coclink   , $external);
                    $this->emailsendctpl($fullname, $emailAddress,$external); 
                    //$this->emailsendctpl($fullname, $emailAddress, $coclink);   
                    $this->emailsendctplinternal($fullname, $emailAddress,$contactNo,$dtnow,$coclink); 
                    session()->flash('authNo',$authNo); 
                    return redirect('/get-quote/ctpl-insurance/ctpl/success/'); 
                }else{
                    $errorMessage = $responses->errorMessage;   
                    session()->flash('message1',$errorMessage); 
                    return back()->withInput();
                }
                 
            }

    }

    public function ctplonsuccess(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Success | COCOGEN | General Insurance"; 
        $metadescription = "";
        $keyword = "";
        if(!empty(Session::get('authNo'))){
            $authNo = Session::get('authNo');  
        }else{
            $authNo = "";  
        }
         
        return view('getaquote.motor.ctpl.success', ['title' => $title, 'authNo' => $authNo,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function ctplonfailed(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $metadescription = "";
        $keyword = "";
        $title = "Failed | COCOGEN | General Insurance";
        return view('services.failed', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }
}
