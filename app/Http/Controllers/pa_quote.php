<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_meta;
use App\Models\cocogen_lgt;
use App\Models\cocogen_onlinepayments_dtl;
use App\Models\cocogen_pa_peril;
use App\Models\cocogen_pa_subline;
use App\Models\cocogen_pa_quote;
use App\Models\cocogen_pa_quote_enrollee;
use App\Models\cocogen_pa_quote_peril;
use App\Models\cocogen_assured_maintenance;
use App\Models\cocogen_view_assured;
use App\Models\cocogen_pa_attachment;
use App\Models\cocogen_pa_remarks;
use App\Models\cocogen_view_pa_quote;
use App\Models\cocogen_view_pa_quote_agent;
use App\Models\cocogen_view_pa_quote_approver;
use App\Models\cocogen_view_pa_peril_sum;
use App\Models\cocogen_admin_subchild;
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
use Auth;
use App\Models\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\users;
use user_uploads;
use DB;
use Session;
use SoapClient;
use DateTime;
use Mail;
use PDF;
use URL;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Storage;
use Datatables;
use Redirect,Response;
use Validator;


class pa_quote extends Controller
{

	public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getpaassured(){
   
 
   
                $cocogen_pa_assured = cocogen_view_assured::select('*')
                ->get();

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();                 

        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"]; 

        return view('getaquote.pa.assured_home', ['cocogen_pa_assured' => $cocogen_pa_assured, 'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword]);
    }

public function getpaquote(){
   
               $agent = \Auth::user()->agentID;
               $department = \Auth::user()->department;

            if (\Auth::user()->accountType == "Agent")
            {
                $cocogen_pa_quote_sum = cocogen_view_pa_quote_agent::select('*')->where('agent',$agent)
                ->get();

            }
            elseif (\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Manager") {
                $cocogen_pa_quote_sum = cocogen_view_pa_quote::select('*')->where('department',$department)
                ->get();
            }

            else
            {
                $cocogen_pa_quote_sum = cocogen_view_pa_quote_approver::select('*')
                ->get();
            }

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();  

        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"]; 

        return view('getaquote.pa.pa_home', ['cocogen_pa_quote_sum' => $cocogen_pa_quote_sum, 'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword]);
    }


public function  getquotepaview($id)
{

         $cocogen_pa_quote = cocogen_pa_quote::select('cocogen_pa_quote.*', 'b.name as createdby', 'c.name as submittedby', 'd.name as bmreviewedby', 'e.name as forsalesreviewby', 'f.name as reviewedby', 'g.name as approvedby', 'h.name as cancelledby')->where('cocogen_pa_quote.id', $id)
         ->leftJoin('users as b', 'cocogen_pa_quote.created_by', '=', 'b.id')
         ->leftJoin('users as c', 'cocogen_pa_quote.submitted_by', '=', 'c.id')
         ->leftJoin('users as d', 'cocogen_pa_quote.bmreviewed_by', '=', 'd.id')
         ->leftJoin('users as e', 'cocogen_pa_quote.forsalesreview_by', '=', 'e.id')
         ->leftJoin('users as f', 'cocogen_pa_quote.reviewed_by', '=', 'f.id')
         ->leftJoin('users as g', 'cocogen_pa_quote.approved_by', '=', 'g.id')
         ->leftJoin('users as h', 'cocogen_pa_quote.cancelled_by', '=', 'h.id')
         ->orderBy('id') 
         ->get(); 

         $cocogen_assured_maintenance = cocogen_view_assured::select('*')->where('id', $cocogen_pa_quote[0]["assured_no"]) 
         ->get();          

        if(\Auth::user()->accountType == "Manager" || \Auth::user()->accountType == "Approver" || \Auth::user()->accountType == "Underwriter"){
          $readonly = "1";      
        }
        elseif((\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Agent") && ($cocogen_pa_quote[0]["status"] == "Save" || $cocogen_pa_quote[0]["status"] == "For Sales Review")) {
          $readonly = "0";      
        }
        else{
            $readonly = "1";
        }

        $cocogen_pa_subline =  DB::table('cocogen_pa_subline')->select('*')->get();

        $cocogen_pa_peril =  DB::table('cocogen_pa_peril')->select('*')->get();


        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();        
    
        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];     

        return view('getaquote.pa.pa_view', ['cocogen_pa_quote' => $cocogen_pa_quote, 'cocogen_assured_maintenance' => $cocogen_assured_maintenance, 'cocogen_pa_subline' => $cocogen_pa_subline, 'cocogen_pa_peril' => $cocogen_pa_peril, 'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword, 'readonly' => $readonly]);
}    

public function getnewassured(){


 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get(); 

        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"]; 

        return view('getaquote.pa.assured_new', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword]);
    }   

    public function getquoteassuredsave(Request $request){
    
    $dt = new DateTime;

        $rules = [
                    'birthdate' => 'required|Date',
                    'fname' => 'required',
                    'email' => 'required|email',
                    'lname' => 'required',
                    'mi' => 'required',
                    'gender' => 'required',
                    'address' => 'required', 
                    'landline' => 'required', 
                    'cellphone' => 'required',  
                    'tin' => 'required'                          
        ];
        $niceNames = [
                    'birthdate' => 'Date of Birth',
                    'fname' => 'First Name',
                    'email' => 'Email',
                    'lname' => 'Last Name',
                    'mi' => 'Middle Initial',
                    'gender' => 'Gender',
                    'address' => 'address', 
                    'landline' => 'Landline No.', 
                    'cellphone' => 'Mobile No.',  
                    'tin' => 'TIN'                    
        ];  

        $this->validate($request, $rules, [], $niceNames);


        $cocogen_assured_maintenance= new cocogen_assured_maintenance;
        $cocogen_assured_maintenance->fname = $request->get('fname'); 
        $cocogen_assured_maintenance->mi  = $request->get('mi');
        $cocogen_assured_maintenance->lname = $request->get('lname');
        $cocogen_assured_maintenance->gender  = $request->get('gender');
        $cocogen_assured_maintenance->birthdate = $request->get('birthdate'); 
        $cocogen_assured_maintenance->email = $request->get('email');
        $cocogen_assured_maintenance->address = $request->get('address'); 
        $cocogen_assured_maintenance->landline  = $request->get('landline');
        $cocogen_assured_maintenance->cellphone = $request->get('cellphone'); 
        $cocogen_assured_maintenance->tin = $request->get('tin');
        $cocogen_assured_maintenance->department  = auth()->user()->department;
        $cocogen_assured_maintenance->created_by  = auth()->user()->id;
        $cocogen_assured_maintenance->save();
        $status_message = "Success! Your assured info was successfully saved.";
    
        return back()->withInput()->with(array('message'=>$status_message));

 

    } 

        public function getassuredview($id){
 
        $cocogen_assured_maintenance = cocogen_assured_maintenance::where('id', $id)->get();

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();       

        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];     
        return view('getaquote.pa.assured_view', ['cocogen_assured_maintenance' => $cocogen_assured_maintenance, 'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword, 'template' => $id]);
    } 

    public function getquotepanew($id){

        $cocogen_pa_subline =  DB::table('cocogen_pa_subline')->select('*')->get();

        $cocogen_pa_peril =  DB::table('cocogen_pa_peril')->select('*')->get();
 
        $cocogen_assured_maintenance = cocogen_view_assured::where('id', $id)->get();

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();        

        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];     
        return view('getaquote.pa.pa_new', ['cocogen_assured_maintenance' => $cocogen_assured_maintenance, 'cocogen_pa_subline' => $cocogen_pa_subline, 'cocogen_pa_peril' => $cocogen_pa_peril, 'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword, 'template' => $id]);
    }    

public function updateassured(Request $request){
    
    $dt = new DateTime;

        $fname = $request->get('fname'); 
        $lname = $request->get('lname');
        $mi = $request->get('mi'); 
        $gender = $request->get('gender'); 
        $address  = $request->get('address');
        $birthdate = $request->get('birthdate'); 
        $landline  = $request->get('landline');
        $email = $request->get('email'); 
        $tin  = $request->get('tin');
        $cellphone = $request->get('cellphone');

        $validator = Validator::make($request->all(), [
                    'birthdate' => 'required|Date',
                    'fname' => 'required',
                    'email' => 'required|Email',
                    'mi' => 'required',
                    'lname' => 'required',
                    'address' => 'required',
                    'landline' => 'required',
                    'tin' => 'required',
                    'cellphone' => 'required',

        ]);
    
 
        if ($validator->passes()) {
    
        $cocogen_assured_maintenance = cocogen_assured_maintenance::findorFail($request->get('transno')); 
        $cocogen_assured_maintenance->fname= $fname; 
        $cocogen_assured_maintenance->mi  = $mi;
        $cocogen_assured_maintenance->address = $address; 
        $cocogen_assured_maintenance->lname = $lname;
        $cocogen_assured_maintenance->gender = $gender; 
        $cocogen_assured_maintenance->landline  = $landline;
        $cocogen_assured_maintenance->birthdate = $birthdate; 
        $cocogen_assured_maintenance->cellphone  = $cellphone;
        $cocogen_assured_maintenance->email = $email; 
        $cocogen_assured_maintenance->tin  = $tin;      

        $cocogen_assured_maintenance->department  = auth()->user()->department;
        $cocogen_assured_maintenance->updated_by  = auth()->user()->id;
        $cocogen_assured_maintenance->save();         

        $status_message = "Success! Changes was successfully saved.";  

        return response()->json(['success'=>$status_message]);
    }

    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('lname'))) {

        $error_fld = "Last Name";

    }

     if (empty($request->get('mi'))) {

        if (empty($error_fld))
        {
            $error_fld = "Middle Initial";
        }
        else
         {
            $error_fld =  $error_fld .", Middle Initial";
        }
     

    }

     if (empty($request->get('fname'))) {

        if (empty($error_fld))
        {
            $error_fld = "First Name";
        }
        else
         {
            $error_fld =  $error_fld .", First Name";
        }
     

    }


     if (empty($request->get('gender'))) {

        if (empty($error_fld))
        {
            $error_fld = "Gender";
        }
        else
         {
            $error_fld =  $error_fld .", Gender";
        }    
    }
     if (empty($request->get('birthdate'))) {

        if (empty($error_fld))
        {
            $error_fld = "Date of Birth";
        }
        else
         {
            $error_fld =  $error_fld .", Date of Birth";
        }        
     }
     if (empty($request->get('email'))) {

        if (empty($error_fld))
        {
            $error_fld = "Email";
        }
        else
         {
            $error_fld =  $error_fld .", Email";
        }        
     }
     else
     {
        if (!filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {

        if (empty($error_fld))
        {
            $error_fld = "Email is Invalid";
        }
        else
        {
            $error_fld =  $error_fld .", is Invalid";
        } 
        } 
      }

    

     if (empty($request->get('landline'))) {

        if (empty($error_fld))
        {
            $error_fld = "Landline No.";
        }
        else
         {
            $error_fld =  $error_fld .", Landline No.";
        }    
    }

     if (empty($request->get('cellphone'))) {

        if (empty($error_fld))
        {
            $error_fld = "Mobile No.";
        }
        else
         {
            $error_fld =  $error_fld .", Mobile No.";
        }    
    }           
        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

    }

    public function getquotepasave(Request $request){
    
    $dt = new DateTime;

        $rules = [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'item_no' => 'required',
                    'subline' => 'required',
                    'item_title' => 'required',
                    'itm_no' => 'required',
                    'beneficiary' => 'required'                         
        ];
        $niceNames = [
                    'incept_date' => 'Incept Date',
                    'expiry_date' => 'Expiry Date',
                    'item_no' => 'Item No.',
                    'item_title' => 'Item Title',
                    'subline' => 'Subline',
                    'itm_no' => 'Intermediary No.',
                    'beneficiary' => 'Beneficiary Name'                    
        ];  

        $this->validate($request, $rules, [], $niceNames);


        $cocogen_pa_quote= new cocogen_pa_quote;
        $cocogen_pa_quote->assured_no = $request->get('assuredno'); 
        $cocogen_pa_quote->subline  = $request->get('subline');
        $cocogen_pa_quote->quote_date = $dt->format('Y-m-d H:i:s'); 
        $cocogen_pa_quote->item_no  = $request->get('item_no');
        $cocogen_pa_quote->item_title = $request->get('item_title'); 
        $cocogen_pa_quote->currency = $request->get('currency');
        $cocogen_pa_quote->currency_rate = $request->get('currency_rate'); 
        $cocogen_pa_quote->itm_no  = $request->get('itm_no');
        $cocogen_pa_quote->beneficiary = $request->get('beneficiary');
        $cocogen_pa_quote->incept_date = $request->get('incept_date'); 
        $cocogen_pa_quote->expiry_date  = $request->get('expiry_date');
        $cocogen_pa_quote->status  = 'Save';
        $cocogen_pa_quote->department  = auth()->user()->department;
        $cocogen_pa_quote->created_by  = auth()->user()->id;
        $cocogen_pa_quote->save();
        $transno = $cocogen_pa_quote->id;
        $status_message = "Success! Your application was successfully saved.";
        $quotestatus = "Save";
    

        return back()->withInput()->with(array('message'=>$status_message, 'transno'=>$transno, 'quotestatus'=>$quotestatus));

 

    }

    public function addpa_enrollee(Request $request)
    { 

        $validator = Validator::make($request->all(), [
            'enrollee_name' => 'required',
            'age' => 'required',
            'ebirthdate' => 'required|Date',
        ]);


        if ($validator->passes()) {
  
        $cocogen_pa_quote_enrollee = new cocogen_pa_quote_enrollee;
        $cocogen_pa_quote_enrollee->enrollee_name = $request->get('enrollee_name');
        $cocogen_pa_quote_enrollee->age= $request->get('age');
        $cocogen_pa_quote_enrollee->birthdate = $request->get('ebirthdate');
        $cocogen_pa_quote_enrollee->gender = $request->get('egender');
        $cocogen_pa_quote_enrollee->civil_status = $request->get('civil_status');
        $cocogen_pa_quote_enrollee->remarks = $request->get('eremarks');
        $cocogen_pa_quote_enrollee->created_by = auth()->user()->id;
        $cocogen_pa_quote_enrollee->transno = $request->get('transno');
        $cocogen_pa_quote_enrollee->save();   


        $status_message = "Success! Enrollee was successfully added.";  

        return response()->json(['success'=>$status_message]);

 
     }

    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('enrollee_name'))) {

        $error_fld = "Enrollee Name";

    }

     if (empty($request->get('ebirthdate'))) {

        if (empty($error_fld))
        {
            $error_fld = "Birthdate";
        }
        else
         {
            $error_fld =  $error_fld .", Birthdate";
        }
     

    }

     if (empty($request->get('age'))) {

        if (empty($error_fld))
        {
            $error_fld = "Age";
        }
        else
         {
            $error_fld =  $error_fld .", Age";
        }
     

    }

        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

} 


    public function addpa_coverage(Request $request)
    { 

        $validator = Validator::make($request->all(), [
            'peril_name' => 'required',
            'peril_rate' => 'required',
            'sum_insured' => 'required',
        ]);


        if ($validator->passes()) {
  

        $sum_insured = str_replace(',', '', $request->get('sum_insured'));
        $rate = $request->get('peril_rate');

        $premium = floatval($sum_insured) * (floatval($rate)/100);

        $cocogen_pa_quote_peril = new cocogen_pa_quote_peril;
        $cocogen_pa_quote_peril->peril_name = $request->get('peril_name');
        $cocogen_pa_quote_peril->peril_rate= $rate;
        $cocogen_pa_quote_peril->sum_insured = $sum_insured;
        $cocogen_pa_quote_peril->premium = $premium;
        $cocogen_pa_quote_peril->created_by = auth()->user()->id;
        $cocogen_pa_quote_peril->transno = $request->get('transno');
        $cocogen_pa_quote_peril->save();  

        $cocogen_view_pa_peril_sum = cocogen_view_pa_peril_sum::select('*')->where('transno', $request->get('transno')) 
         ->get();

         $ttlpremium = $cocogen_view_pa_peril_sum[0]["premium"];
         $ttlsum_insured = $cocogen_view_pa_peril_sum[0]["sum_insured"];

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno')); 
        $cocogen_pa_quote->sum_insured = $ttlsum_insured; 
        $cocogen_pa_quote->premium  = $ttlpremium;        
        $cocogen_pa_quote->save();

        $status_message = "Success! Coverage was successfully added.";  

        return response()->json(['success'=>$status_message, 'ttlpremium'=>number_format($ttlpremium,2), 'ttlsum_insured'=>number_format($ttlsum_insured,2) ]);

 
     }

    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('peril_name'))) {

        $error_fld = "Peril Name";

    }

     if (empty($request->get('peril_rate'))) {

        if (empty($error_fld))
        {
            $error_fld = "Peril Rate";
        }
        else
         {
            $error_fld =  $error_fld .", Peril Rate";
        }
     

    }

     if (empty($request->get('sum_insured'))) {

        if (empty($error_fld))
        {
            $error_fld = "Sum Insured";
        }
        else
         {
            $error_fld =  $error_fld .", Sum Insured";
        }
     

    }

        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

} 

    public function updatequotepa(Request $request){
    
    $dt = new DateTime;


        $validator = Validator::make($request->all(), [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'item_no' => 'required',
                    'subline' => 'required',
                    'item_title' => 'required',
                    'itm_no' => 'required',
                    'beneficiary' => 'required'

        ]);
    
 
        if ($validator->passes()) {

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno')); 
        $cocogen_pa_quote->subline  = $request->get('subline'); 
        $cocogen_pa_quote->item_no  = $request->get('item_no');
        $cocogen_pa_quote->item_title = $request->get('item_title'); 
        $cocogen_pa_quote->currency = $request->get('currency');
        $cocogen_pa_quote->currency_rate = $request->get('currency_rate'); 
        $cocogen_pa_quote->itm_no  = $request->get('itm_no');
        $cocogen_pa_quote->beneficiary = $request->get('beneficiary');
        $cocogen_pa_quote->incept_date = $request->get('incept_date'); 
        $cocogen_pa_quote->expiry_date  = $request->get('expiry_date'); 
        $cocogen_pa_quote->sum_insured = str_replace(',', '', $request->get('ttl_sum_insured')); 
        $cocogen_pa_quote->premium  = str_replace(',', '', $request->get('ttl_premium'));       

        $cocogen_pa_quote->updated_by  = auth()->user()->id;
        $cocogen_pa_quote->save();         

        $status_message = "Success! Changes was successfully saved.";  

        return response()->json(['success'=>$status_message]);
    }

    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('subline'))) {

        $error_fld = "Subline";

    }

     if (empty($request->get('incept_date'))) {

        if (empty($error_fld))
        {
            $error_fld = "Incept Date";
        }
        else
         {
            $error_fld =  $error_fld .", Incept Date";
        }
     

    }

    if (empty($request->get('expiry_date'))) {

        if (empty($error_fld))
        {
            $error_fld = "Expiry Date";
        }
        else
         {
            $error_fld =  $error_fld .", Expiry Date";
        }   

    }

    if (empty($request->get('item_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Item No.";
        }
        else
         {
            $error_fld =  $error_fld .", Item No.";
        }   

    }

    if (empty($request->get('item_title'))) {

        if (empty($error_fld))
        {
            $error_fld = "Item Title";
        }
        else
         {
            $error_fld =  $error_fld .", Item Title";
        }   

    }

    if (empty($request->get('itm_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Intermediary No.";
        }
        else
         {
            $error_fld =  $error_fld .", Intermediary No.";
        }   

    }

    if (empty($request->get('beneficiary'))) {

        if (empty($error_fld))
        {
            $error_fld = "Beneficiary";
        }
        else
         {
            $error_fld =  $error_fld .", Beneficiary";
        }   

    }

        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

    }

   public function getquotepasubmit(Request $request){
    
    $dt = new DateTime;

        if (auth()->user()->sales_group == "BRANCH")
        {
            $quotestatus = "For BM Review";
            $status_message = "Success! Your application was successfully submitted for Branch Manager review.";
        }
        else
        {
            $quotestatus = "Submitted";
            $status_message = "Success! Your application was successfully submitted for Underwriting review.";
        }

        $validator = Validator::make($request->all(), [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'item_no' => 'required',
                    'subline' => 'required',
                    'item_title' => 'required',
                    'itm_no' => 'required',
                    'beneficiary' => 'required'

        ]);

        if ($validator->passes()) {

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno')); 
        $cocogen_pa_quote->subline  = $request->get('subline'); 
        $cocogen_pa_quote->item_no  = $request->get('item_no');
        $cocogen_pa_quote->item_title = $request->get('item_title'); 
        $cocogen_pa_quote->currency = $request->get('currency');
        $cocogen_pa_quote->currency_rate = $request->get('currency_rate'); 
        $cocogen_pa_quote->itm_no  = $request->get('itm_no');
        $cocogen_pa_quote->beneficiary = $request->get('beneficiary');
        $cocogen_pa_quote->incept_date = $request->get('incept_date'); 
        $cocogen_pa_quote->expiry_date  = $request->get('expiry_date');
        $cocogen_pa_quote->sum_insured = str_replace(',', '', $request->get('ttl_sum_insured')); 
        $cocogen_pa_quote->premium  = str_replace(',', '', $request->get('ttl_premium'));        
        

        $cocogen_pa_quote->status  = $quotestatus;
        $cocogen_pa_quote->dt_submitted  = $dt->format('Y-m-d H:i:s');
        $cocogen_pa_quote->submitted_by  = auth()->user()->id;
        $cocogen_pa_quote->save();         
 

        return response()->json(['success'=>$status_message]);
    }

    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('subline'))) {

        $error_fld = "Subline";

    }

     if (empty($request->get('incept_date'))) {

        if (empty($error_fld))
        {
            $error_fld = "Incept Date";
        }
        else
         {
            $error_fld =  $error_fld .", Incept Date";
        }
     

    }

    if (empty($request->get('expiry_date'))) {

        if (empty($error_fld))
        {
            $error_fld = "Expiry Date";
        }
        else
         {
            $error_fld =  $error_fld .", Expiry Date";
        }   

    }

    if (empty($request->get('item_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Item No.";
        }
        else
         {
            $error_fld =  $error_fld .", Item No.";
        }   

    }

    if (empty($request->get('item_title'))) {

        if (empty($error_fld))
        {
            $error_fld = "Item Title";
        }
        else
         {
            $error_fld =  $error_fld .", Item Title";
        }   

    }

    if (empty($request->get('itm_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Intermediary No.";
        }
        else
         {
            $error_fld =  $error_fld .", Intermediary No.";
        }   

    }

    if (empty($request->get('beneficiary'))) {

        if (empty($error_fld))
        {
            $error_fld = "Beneficiary";
        }
        else
         {
            $error_fld =  $error_fld .", Beneficiary";
        }   

    }

        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

    }

    public function getquotepasales(Request $request){
       
        $dt = new DateTime;

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno'));
        $cocogen_pa_quote->dt_forsalesreview  = $dt->format('Y-m-d H:i:s');
        $cocogen_pa_quote->status  = 'For Sales Review';
        $cocogen_pa_quote->forsalesreview_by  = auth()->user()->id;
        $cocogen_pa_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully returned for sales review.";

        $quotestatus = "For Sales Review";

        return response()->json(['success'=>$status_message]);
    }

    public function getquotepamanager(Request $request){
       
        $dt = new DateTime;

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno'));
        $cocogen_pa_quote->dt_bmreviewed  = $dt->format('Y-m-d H:i:s');
        $cocogen_pa_quote->status  = 'Submitted';
        $cocogen_pa_quote->bmreviewed_by  = auth()->user()->id;
        $cocogen_pa_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully verified.";

        $quotestatus = "Submitted";

        return response()->json(['success'=>$status_message]);
    }    

     public function getquotepareview(Request $request){
       
        $dt = new DateTime;

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno'));
        $cocogen_pa_quote->dt_uwreviewed  = $dt->format('Y-m-d H:i:s');
        $cocogen_pa_quote->status  = 'UW Reviewed';
        $cocogen_pa_quote->reviewed_by  = auth()->user()->id;
        $cocogen_pa_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully reviewed.";

        $quotestatus = "UW Reviewed";

        return response()->json(['success'=>$status_message]);
    }

     public function getquotepaapprove(Request $request){
       
        $dt = new DateTime;

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno'));
        $cocogen_pa_quote->dt_approved  = $dt->format('Y-m-d H:i:s');
        $cocogen_pa_quote->status  = 'Approved';
        $cocogen_pa_quote->approved_by  = auth()->user()->id;
        $cocogen_pa_quote->save();
        //$transno = $cocogen_marine_quote->id;
        $status_message = "Success! Application was successfully approved.";

        $quotestatus = "Approved";

        return response()->json(['success'=>$status_message]);
    }    

    public function getquotepacancel(Request $request){
       
        $dt = new DateTime;

        $cocogen_pa_quote = cocogen_pa_quote::findorFail($request->get('transno'));
        $cocogen_pa_quote->dt_cancelled  = $dt->format('Y-m-d H:i:s');
        $cocogen_pa_quote->status  = 'Cancelled';
        $cocogen_pa_quote->cancelled_by  = auth()->user()->id;
        $cocogen_pa_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully cancelled.";

        $quotestatus = "Cancelled";

        return response()->json(['success'=>$status_message]);
    } 

public function addpa_attachment(Request $request)
    { 


              $validator = Validator::make($request->all(), [
        'filename' => 'required|file|mimes:pdf,PDF,xls,xlsx,doc,docx|max:2048',
      ]);




      if ($validator->passes()) {
                   

                    $requestparams = $request->all();

                    $cocogen_pa_attachment= new cocogen_pa_attachment;
                    $cocogen_pa_attachment->filename = $request->file('filename')->hashName();
                    $cocogen_pa_attachment->extension = $request->file('filename')->extension();
                    $cocogen_pa_attachment->filesize = $request->file('filename')->getSize();
                    $cocogen_pa_attachment->location = $request->file('filename')->store('public/pafiles');
                    $cocogen_pa_attachment->filename2 =$request->file('filename')->getClientOriginalName();
                    $cocogen_pa_attachment->transno = $request->get('transno');
                    $cocogen_pa_attachment->save(); 


                    $status_message = "File successfully uploaded.";  

                    return response()->json(['success'=>$status_message]);


    }

        if($request->hasFile('filename')) {
        $error_msg = "Invalid File! Only accept PDF, Xls, Doc files.";
    } else {
        $error_msg = "No file to upload";
    };


        $status_message = $error_msg;
        return response()->json(['error'=>$status_message]);

    }

    public function getpa_comments($id){


     $cocogen_pa_remarks = cocogen_pa_remarks::where('transno',$id)
     ->select('cocogen_pa_remarks.*', 'cocogen_pa_quote.status')
     ->leftJoin('cocogen_pa_quote', 'cocogen_pa_remarks.transno', '=', 'cocogen_pa_quote.id')
     ->orderByDesc('id')
     ->get();

    return view('getaquote.pa.pa_comments', compact('cocogen_pa_remarks'));

    }

    public function addpa_comments(Request $request)
    { 

        $validator = Validator::make($request->all(), [
            'txt_comment' => 'required',
        ]);


        if ($validator->passes()) {
  
        $cocogen_pa_remarks= new cocogen_pa_remarks;
        $cocogen_pa_remarks->remarks = $request->get('txt_comment');
        $cocogen_pa_remarks->username = auth()->user()->name;
        $cocogen_pa_remarks->transno = $request->get('transno');
        $cocogen_pa_remarks->save();   

        $status_message = "Success! Comment was successfully added.";  

        return response()->json(['success'=>$status_message]);

 
     }
        $status_message = "Comment is required.";
        return response()->json(['error'=>$status_message]);

    } 

public function  deletepa_enrollee($id)
{


    $cocogen_pa_quote_enrollee = cocogen_pa_quote_enrollee::where('id',$id)->delete();
  
    return Response::json($cocogen_pa_quote_enrollee);
}

public function  deletepa_coverage($id)
{


    $cocogen_pa_quote_peril = cocogen_pa_quote_peril::where('id',$id)->delete();
  
    return Response::json($cocogen_pa_quote_peril);
}

public function  deletepa_attachment($id)
{

    $cocogen_pa_attachment = cocogen_pa_attachment::where('id',$id)->delete();
  
    return Response::json($cocogen_pa_attachment);
}

public function  deletepa_comments($id)
{
    $cocogen_pa_remarks  = cocogen_pa_remarks::where('id',$id)->delete();
  
    return Response::json($cocogen_pa_remarks);
}

    public function getpa_allquote()
    {
        if(request()->ajax()) {

            $agent = \Auth::user()->agentID;
            $department = \Auth::user()->department;

            if (\Auth::user()->accountType == "Agent")
            {

                $cocogen_pa_quote = cocogen_pa_quote::select('cocogen_pa_quote.*', 'b.fullname', 'c.name as submitted_name')->where('cocogen_pa_quote.itm_no',$agent)
                ->leftJoin('cocogen_view_assured as b', 'cocogen_pa_quote.assured_no', '=', 'b.id')
                ->leftJoin('users as c', 'cocogen_pa_quote.submitted_by', '=', 'c.id')
                ->get(); 

            }
            elseif (\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Manager") {

                $cocogen_pa_quote = cocogen_pa_quote::select('cocogen_pa_quote.*', 'b.fullname', 'c.name as submitted_name')->where('cocogen_pa_quote.department', $department)
                ->leftJoin('cocogen_view_assured as b', 'cocogen_pa_quote.assured_no', '=', 'b.id')
                ->leftJoin('users as c', 'cocogen_pa_quote.submitted_by', '=', 'c.id')
                ->get();                                
            }
            else
            {
                $cocogen_pa_quote = cocogen_pa_quote::select('cocogen_pa_quote.*', 'b.fullname as fullname', 'c.name as submitted_name')
                ->leftJoin('cocogen_view_assured as b', 'cocogen_pa_quote.assured_no', '=', 'b.id')
                ->leftJoin('users as c', 'cocogen_pa_quote.submitted_by', '=', 'c.id')
                ->get(); 
            }
            
            return datatables()->of($cocogen_pa_quote)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="view_quote btn btn-link"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
                        $button = $button.'<button type="button" name="edit2" id="'.$data->id.'" class="print_quote btn btn-link"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }    

    public function getpa_assured()
    {
        if(request()->ajax()) {

 
                $cocogen_view_assured = DB::table('cocogen_view_assured')->select('*')->orderBy('fullname');
            
            
            return datatables()->of($cocogen_view_assured)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="view_quote btn btn-link"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
                        $button = $button.'<button type="button" name="edit2" id="'.$data->id.'" class="add_quote btn btn-link"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>';                   
                        return $button;                        
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);            
        }

    }

    public function getpa_enrollee($id)
    {
        if(request()->ajax()) {
        
            $cocogen_pa_quote_enrollee = DB::table('cocogen_pa_quote_enrollee')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_pa_quote_enrollee)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="delete_enrollee btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    } 

    public function getpa_coverage($id)
    {
        if(request()->ajax()) {
        
            $cocogen_pa_quote_peril = DB::table('cocogen_pa_quote_peril')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_pa_quote_peril)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="delete_coverage btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

        public function getpa_attachment($id)
    {
        if(request()->ajax()) {
        
             $cocogen_pa_attachment = DB::table('cocogen_pa_attachment')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_pa_attachment)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_attachment btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }   
    public function downloadPA($filename,$txnid){

            $s ="\'";
            $s2 = substr($s, 0,1);
            //$slash = substr($s2,0, -1);
            $files = cocogen_pa_attachment::where('id', '=', $txnid)->get();
            $file_path = storage_path('app') . $s2 .$files['0']['location'];
          return response()->file($file_path);
    }                          

}