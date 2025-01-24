<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_meta;
use App\Models\cocogen_lgt;
use App\Models\cocogen_onlinepayments_dtl;
use App\Models\cocogen_bonds_quote;
use App\Models\cocogen_bonds_requirement;
use App\Models\cocogen_bonds_lossxp;
use App\Models\cocogen_bonds_owner;
use App\Models\cocogen_bonds_principal;
use App\Models\cocogen_bonds_guarantee;
use App\Models\cocogen_bonds_officer;
use App\Models\cocogen_bonds_collateral;
use App\Models\cocogen_bonds_cosigner;
use App\Models\cocogen_bonds_projects;
use App\Models\cocogen_bonds_projects2;
use App\Models\cocogen_bonds_attachment;
use App\Models\cocogen_bonds_financial;
use App\Models\cocogen_bonds_financial_type;
use App\Models\cocogen_bonds_financial_remarks;
use App\Models\cocogen_bonds_remarks;
use App\Models\cocogen_bonds_quote_requirement;
use App\Models\cocogen_marine_quote;
use App\Models\cocogen_marine_truck;
use App\Models\cocogen_marine_remarks;
use App\Models\cocogen_marine_historylogs;
use App\Models\cocogen_marine_attachment;
use App\Models\cocogen_view_marine_quote;
use App\Models\cocogen_view_marine_quote_agent;
use App\Models\cocogen_view_marine_approver;
use App\Models\cocogen_view_bonds_approver2;
use App\Models\cocogen_bonds_historylogs;
use App\Models\cocogen_bonds_users;
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


class marine extends Controller
{

	public function __construct()
    {
        //$this->middleware('auth');
    }

        public function getmarinequote(){
   
               $agent = \Auth::user()->name;
               $department = \Auth::user()->department;

            if (\Auth::user()->accountType == "Agent")
            {
                $cocogen_marine_quote_sum = cocogen_view_marine_quote_agent::select('*')->where('agent',$agent)
                ->get();

            }
            elseif (\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Manager") {
                $cocogen_marine_quote_sum = cocogen_view_marine_quote::select('*')->where('department',$department)
                ->get();
            }

            else
            {
                $cocogen_marine_quote_sum = cocogen_view_marine_approver::select('*')
                ->get();
            }

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();  

        $cocogen_meta = cocogen_meta::where('page', '=', "Marine Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"]; 

        return view('getaquote.marine.marine_home', ['cocogen_marine_quote_sum' => $cocogen_marine_quote_sum, 'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword]);
    }

        public function getquotemarine($id){
 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();  

        $cocogen_meta = cocogen_meta::where('page', '=', "Marine Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];     
        return view('getaquote.marine.marine_new', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword, 'template' => $id]);
    }

    public function getmarine_allquote()
    {
        if(request()->ajax()) {

            $agent = \Auth::user()->name;
            $department = \Auth::user()->department;

            if (\Auth::user()->accountType == "Agent")
            {
                $cocogen_marine_quote = DB::table('cocogen_marine_quote')->select('*')->where('agent',$agent)->orderByDesc('id');
            }
            elseif (\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Manager") {
                $cocogen_marine_quote = DB::table('cocogen_marine_quote')->select('*')->where('department',$department)->orderByDesc('id');                
            }
            else
            {
                $cocogen_marine_quote = DB::table('cocogen_marine_quote')->select('*')->orderByDesc('id');
            }
            
            return datatables()->of($cocogen_marine_quote)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="view_quote btn btn-link"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }  

    public function getquotemarinesave(Request $request){
    
    $dt = new DateTime;

    if( $request->get('template') == "MTR-I" || $request->get('template') == "MCI-I")
    {
        $rules = [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'email' => 'required|email',
                    'subline' => 'required',
                    'sum_insured' => 'required',
                    'agent' => 'required',
                    'acode' => 'required',
                    'assured' => 'required'                         
        ];
        $niceNames = [
                    'incept_date' => 'Incept Date',
                    'expiry_date' => 'Expiry Date',
                    'email' => 'Email',
                    'sum_insured' => 'Sum Insured',
                    'subline' => 'Subline',
                    'agent' => 'Agent',
                    'acode' => 'Agent Code',
                    'assured' => 'Name of Applicant'                    
        ];  

        $this->validate($request, $rules, [], $niceNames);


        $cocogen_marine_quote= new cocogen_marine_quote;
        $cocogen_marine_quote->assured = $request->get('assured'); 
        $cocogen_marine_quote->agent  = $request->get('agent');
        $cocogen_marine_quote->acode  = $request->get('acode');
        $cocogen_marine_quote->quote_date = $dt->format('Y-m-d H:i:s'); 
        $cocogen_marine_quote->template  = $request->get('template');
        $cocogen_marine_quote->address = $request->get('address'); 
        $cocogen_marine_quote->employer = $request->get('employer');
        $cocogen_marine_quote->office_address = $request->get('office_address'); 
        $cocogen_marine_quote->occupation  = $request->get('occupation');
        $cocogen_marine_quote->birth_date = $request->get('birth_date'); 
        $cocogen_marine_quote->contact_no  = $request->get('contact_no');
        $cocogen_marine_quote->email = $request->get('email'); 
        $cocogen_marine_quote->tin  = $request->get('tin');
        $cocogen_marine_quote->other_idno = $request->get('other_idno');
        $cocogen_marine_quote->subline  = $request->get('subline');
        $cocogen_marine_quote->incept_date = $request->get('incept_date'); 
        $cocogen_marine_quote->expiry_date  = $request->get('expiry_date');
        $cocogen_marine_quote->no_days = str_replace(',', '', $request->get('no_days')); 
        $cocogen_marine_quote->rate  = str_replace(',', '', $request->get('rate'));       
        $cocogen_marine_quote->sum_insured  = str_replace(',', '', $request->get('sum_insured'));
        $cocogen_marine_quote->basic_premium  = str_replace(',', '', $request->get('basic_premium'));
        $cocogen_marine_quote->doc_stamps  = str_replace(',', '', $request->get('doc_stamps'));
        $cocogen_marine_quote->vat  = str_replace(',', '', $request->get('vat'));
        $cocogen_marine_quote->lgt  = str_replace(',', '', $request->get('lgt'));
        $cocogen_marine_quote->gross_premium  = str_replace(',', '', $request->get('gross_premium'));
        $cocogen_marine_quote->status  = 'Save';
        $cocogen_marine_quote->department  = auth()->user()->department;
        $cocogen_marine_quote->created_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        $transno = $cocogen_marine_quote->id;
        $status_message = "Success! Your application was successfully saved.";
        $quotestatus = "Save";
    }
    else
    {
         $rules = [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'email2' => 'required|email',
                    'subline' => 'required',
                    'sum_insured' => 'required',
                    'agent2' => 'required',
                    'acode2' => 'required',
                    'assured2' => 'required'                         
        ];
        $niceNames = [
                    'incept_date' => 'Incept Date',
                    'expiry_date' => 'Expiry Date',
                    'email2' => 'Email',
                    'sum_insured' => 'Sum Insured',
                    'subline' => 'Subline',
                    'agent2' => 'Agent',
                    'acode2' => 'Agent Code',
                    'assured2' => 'Name of Applicant'                    
        ];  

        $this->validate($request, $rules, [], $niceNames);

        $cocogen_marine_quote= new cocogen_marine_quote;
        $cocogen_marine_quote->assured = $request->get('assured2'); 
        $cocogen_marine_quote->agent  = $request->get('agent2');
        $cocogen_marine_quote->acode  = $request->get('acode2');
        $cocogen_marine_quote->quote_date = $dt->format('Y-m-d H:i:s'); 
        $cocogen_marine_quote->template  = $request->get('template');
        $cocogen_marine_quote->address = $request->get('address2'); 
        $cocogen_marine_quote->employer = $request->get('employer2');
        $cocogen_marine_quote->office_address = $request->get('office_address2'); 
        $cocogen_marine_quote->occupation  = $request->get('occupation2');
        $cocogen_marine_quote->birth_date = $request->get('birth_date2'); 
        $cocogen_marine_quote->contact_no  = $request->get('contact_no2');
        $cocogen_marine_quote->email = $request->get('email2'); 
        $cocogen_marine_quote->tin  = $request->get('tin2');
        $cocogen_marine_quote->other_idno = $request->get('other_idno2');
        $cocogen_marine_quote->subline  = $request->get('subline');
        $cocogen_marine_quote->incept_date = $request->get('incept_date'); 
        $cocogen_marine_quote->expiry_date  = $request->get('expiry_date');
        $cocogen_marine_quote->no_days = str_replace(',', '', $request->get('no_days')); 
        $cocogen_marine_quote->rate  = str_replace(',', '', $request->get('rate'));       
        $cocogen_marine_quote->sum_insured  = str_replace(',', '', $request->get('sum_insured'));
        $cocogen_marine_quote->basic_premium  = str_replace(',', '', $request->get('basic_premium'));
        $cocogen_marine_quote->doc_stamps  = str_replace(',', '', $request->get('doc_stamps'));
        $cocogen_marine_quote->vat  = str_replace(',', '', $request->get('vat'));
        $cocogen_marine_quote->lgt  = str_replace(',', '', $request->get('lgt'));
        $cocogen_marine_quote->gross_premium  = str_replace(',', '', $request->get('gross_premium'));
        $cocogen_marine_quote->status  = 'Save';
        $cocogen_marine_quote->department  = auth()->user()->department;
        $cocogen_marine_quote->created_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        $transno = $cocogen_marine_quote->id;
        $status_message = "Success! Your application was successfully saved.";
        $quotestatus = "Save";        

    }

        return back()->withInput()->with(array('message'=>$status_message, 'transno'=>$transno, 'quotestatus'=>$quotestatus));

 

    } 

        public function getquotemarinerefresh(Request $request){
        return redirect()->back();
    }  

        public function getmarine_truck($id)
    {
        if(request()->ajax()) {
        
            $cocogen_marine_truck = DB::table('cocogen_marine_truck')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_marine_truck)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="delete_truck btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

        public function getmarine_attachment($id)
    {
        if(request()->ajax()) {
        
             $cocogen_marine_attachment = DB::table('cocogen_marine_attachment')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_marine_attachment)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_attachment btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }    



        public function addmarine_truck(Request $request)
    { 

        $validator = Validator::make($request->all(), [
            'type_truck' => 'required',
            'plate_no' => 'required',
            'motor_no' => 'required',
            'serial_no' => 'required',
        ]);


        if ($validator->passes()) {
  
        $cocogen_marine_truck = new cocogen_marine_truck;
        $cocogen_marine_truck->type_truck = $request->get('type_truck');
        $cocogen_marine_truck->plate_no = $request->get('plate_no');
        $cocogen_marine_truck->motor_no = $request->get('motor_no');
        $cocogen_marine_truck->serial_no = $request->get('serial_no');
        $cocogen_marine_truck->created_by = auth()->user()->id;
        $cocogen_marine_truck->transno = $request->get('transno');
        $cocogen_marine_truck->save();   

        $marine_quote = cocogen_marine_quote::where('id',$request->get('transno'))->get();

        if ( $marine_quote[0]["status"] == "For Sales Review")
        {   
            $cocogen_marine_historylogs= new cocogen_marine_historylogs;
            $cocogen_marine_historylogs->category = "Truck Specification";
            $cocogen_marine_historylogs->description = "Type: ".$request->get('type_truck').", Plate No.: ".$request->get('plate_no');
            $cocogen_marine_historylogs->action = "Add";
            $cocogen_marine_historylogs->user = auth()->user()->name;
            $cocogen_marine_historylogs->transno = $request->get('transno');
            $cocogen_marine_historylogs->save(); 
        }

        $status_message = "Success! Truck specification was successfully added.";  

        return response()->json(['success'=>$status_message]);

 
     }

    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('type_truck'))) {

        $error_fld = "Type of Truck";

    }

     if (empty($request->get('plate_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Plate No.";
        }
        else
         {
            $error_fld =  $error_fld .", Plate_No.";
        }
     

    }

     if (empty($request->get('motor_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Motor No.";
        }
        else
         {
            $error_fld =  $error_fld .", Motor No.";
        }
     

    }

     if (empty($request->get('serial_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Serial No.";
        }
        else
         {
            $error_fld =  $error_fld .", Serial No.";
        }
     

    }


        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

    } 

public function  deletemarine_truck($id, $transno)
{

    $truck = cocogen_marine_truck::where('id',$id)->get();

        $marine_quote = cocogen_marine_quote::where('id',$transno)->get();

        if ( $marine_quote[0]["status"] == "For Sales Review")
        {   
            $cocogen_marine_historylogs= new cocogen_marine_historylogs;
            $cocogen_marine_historylogs->category = "Truck Specification";
            $cocogen_marine_historylogs->description = "Type: ".$truck[0]["type_truck"].", Plate No. ".$truck[0]["plate_no"];
            $cocogen_marine_historylogs->action = "Delete";
            $cocogen_marine_historylogs->user = auth()->user()->name;
            $cocogen_marine_historylogs->transno = $transno;
            $cocogen_marine_historylogs->save(); 
        }

    $cocogen_marine_truck = cocogen_marine_truck::where('id',$id)->delete();
  
    return Response::json($cocogen_marine_truck);
}   

    public function updatequotemarine(Request $request){
    
    $dt = new DateTime;

         if ($request->get('template') == "MTR-I" || $request->get('template') == "MTR-C"){

            $transit = $request->get('transit');
            $point_origin = "";
            $point_destination = "";
            $packaging = "";
        }
        else{
            $transit = "";
            $point_origin = $request->get('point_origin');
            $point_destination = $request->get('point_destination');
            $packaging = $request->get('packaging');           
        }


    if( $request->get('template') == "MTR-I" || $request->get('template') == "MCI-I")
    {
        $assured = $request->get('assured'); 
        $agent = $request->get('agent');
        $acode = $request->get('acode');
        $address = $request->get('address'); 
        $employer = $request->get('employer');
        $office_address = $request->get('office_address'); 
        $occupation  = $request->get('occupation');
        $birth_date = $request->get('birth_date'); 
        $contact_no  = $request->get('contact_no');
        $email = $request->get('email'); 
        $tin  = $request->get('tin');
        $other_idno = $request->get('other_idno');

        $validator = Validator::make($request->all(), [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'email' => 'required|Email',
                    'subline' => 'required',
                    'sum_insured' => 'required',
                    'agent' => 'required',
                    'acode' => 'required',
                    'assured' => 'required',
                    'warehouse' => 'required',

        ]);
    
    } 
    else{
        $assured = $request->get('assured2'); 
        $agent = $request->get('agent2');
        $acode = $request->get('acode2');
        $address = $request->get('address2'); 
        $employer = $request->get('employer2');
        $office_address = $request->get('office_address2'); 
        $occupation  = $request->get('occupation2');
        $birth_date = $request->get('birth_date2'); 
        $contact_no  = $request->get('contact_no2');
        $email = $request->get('email2'); 
        $tin  = $request->get('tin2');
        $other_idno = $request->get('other_idno2'); 

        $validator = Validator::make($request->all(), [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'email2' => 'required|Email',
                    'subline' => 'required',
                    'sum_insured' => 'required',
                    'agent2' => 'required',
                    'acode2' => 'required',
                    'assured2' => 'required',
                    'warehouse' => 'required', 
        ]);       
    }  



        if ($validator->passes()) {

       $marine_quote = cocogen_marine_quote::where('id',$request->get('transno'))->get();

        if ( $marine_quote[0]["status"] == "For Sales Review" &&  number_format($marine_quote[0]["gross_premium"],2) != $request->get('gross_premium') )
        {   
            $cocogen_marine_historylogs= new cocogen_marine_historylogs;
            $cocogen_marine_historylogs->category = "Gross Premium";
            $cocogen_marine_historylogs->description = "From: ".number_format($marine_quote[0]["gross_premium"],2)." - To ".$request->get('gross_premium');
            $cocogen_marine_historylogs->action = "Modify";
            $cocogen_marine_historylogs->user = auth()->user()->name;
            $cocogen_marine_historylogs->transno = $request->get('transno');
            $cocogen_marine_historylogs->save(); 
        }

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno')); 
        $cocogen_marine_quote->assured = $assured; 
        $cocogen_marine_quote->agent  = $agent;
        $cocogen_marine_quote->acode  = $acode;
        $cocogen_marine_quote->address = $address; 
        $cocogen_marine_quote->employer = $employer;
        $cocogen_marine_quote->office_address = $office_address; 
        $cocogen_marine_quote->occupation  = $occupation;
        $cocogen_marine_quote->birth_date = $birth_date; 
        $cocogen_marine_quote->contact_no  = $contact_no;
        $cocogen_marine_quote->email = $email; 
        $cocogen_marine_quote->tin  = $tin;
        $cocogen_marine_quote->other_idno = $other_idno;

        $cocogen_marine_quote->subline  = $request->get('subline');
        $cocogen_marine_quote->incept_date = $request->get('incept_date'); 
        $cocogen_marine_quote->expiry_date  = $request->get('expiry_date');
        $cocogen_marine_quote->no_days = str_replace(',', '', $request->get('no_days')); 
        $cocogen_marine_quote->rate  = str_replace(',', '', $request->get('rate'));       
        $cocogen_marine_quote->sum_insured  = str_replace(',', '', $request->get('sum_insured'));
        $cocogen_marine_quote->basic_premium  = str_replace(',', '', $request->get('basic_premium'));
        $cocogen_marine_quote->doc_stamps  = str_replace(',', '', $request->get('doc_stamps'));
        $cocogen_marine_quote->vat  = str_replace(',', '', $request->get('vat'));
        $cocogen_marine_quote->lgt  = str_replace(',', '', $request->get('lgt'));
        $cocogen_marine_quote->gross_premium  = str_replace(',', '', $request->get('gross_premium'));

        $cocogen_marine_quote->interested_insured = $request->get('interested_insured');
        $cocogen_marine_quote->aggregate_limit  = $request->get('aggregate_limit');
        $cocogen_marine_quote->warehouse = $request->get('warehouse'); 
        $cocogen_marine_quote->frequency = $request->get('frequency');
        $cocogen_marine_quote->prev_insurer = $request->get('prev_insurer'); 
        $cocogen_marine_quote->limit_truck  = $request->get('limit_truck');
        $cocogen_marine_quote->transit = $transit;
        $cocogen_marine_quote->point_origin = $point_origin;
        $cocogen_marine_quote->point_destination = $point_destination;
        $cocogen_marine_quote->packaging = $packaging;
        $cocogen_marine_quote->loss_xp  = $request->get('loss_xp');

        $cocogen_marine_quote->no_driver = $request->get('no_driver');
        $cocogen_marine_quote->no_helper  = $request->get('no_helper');
        $cocogen_marine_quote->reg_employee= $request->get('reg_employee'); 
        $cocogen_marine_quote->no_regular = $request->get('no_regular');
        $cocogen_marine_quote->hired_driver = $request->get('hired_driver'); 
        $cocogen_marine_quote->hired_helper  = $request->get('hired_helper');
        $cocogen_marine_quote->hired_substitute = $request->get('hired_substitute');         

        $cocogen_marine_quote->department  = auth()->user()->department;
        $cocogen_marine_quote->updated_by  = auth()->user()->id;
        $cocogen_marine_quote->save();         

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
    if( $request->get('template') == "MTR-I")
    {

     if (empty($request->get('agent'))) {

        if (empty($error_fld))
        {
            $error_fld = "Agent";
        }
        else
         {
            $error_fld =  $error_fld .", Agent";
        }    
    }
     if (empty($request->get('acode'))) {

        if (empty($error_fld))
        {
            $error_fld = "Agent Code";
        }
        else
         {
            $error_fld =  $error_fld .", Agent Code";
        }    
    }
     if (empty($request->get('assured'))) {

        if (empty($error_fld))
        {
            $error_fld = "Assured";
        }
        else
         {
            $error_fld =  $error_fld .", Assured";
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

    }
     else{

     if (empty($request->get('agent2'))) {

        if (empty($error_fld))
        {
            $error_fld = "Agent";
        }
        else
         {
            $error_fld =  $error_fld .", Agent";
        }    
    }
     if (empty($request->get('acode2'))) {

        if (empty($error_fld))
        {
            $error_fld = "Agent Code";
        }
        else
         {
            $error_fld =  $error_fld .", Agent Code";
        }    
    }    
     if (empty($request->get('assured2'))) {

        if (empty($error_fld))
        {
            $error_fld = "Assured";
        }
        else
         {
            $error_fld =  $error_fld .", Assured";
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
        if (!filter_var($request->get('email2'), FILTER_VALIDATE_EMAIL)) {

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
     }

     if (empty($request->get('interested_insured'))) {

        if (empty($error_fld))
        {
            $error_fld = "Interested Insured";
        }
        else
         {
            $error_fld =  $error_fld .", Interested Insured";
        }    
    }

     if (empty($request->get('warehouse'))) {

        if (empty($error_fld))
        {
            $error_fld = "Location of Warehouse";
        }
        else
         {
            $error_fld =  $error_fld .", Location of Warehouse";
        }    
    }           
        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

    }

   public function getquotemarinesubmit(Request $request){
    
    $dt = new DateTime;

        if (auth()->user()->sales_group == "BRANCH")
        {
            $quotestatus = "For BM Review";
            $status_message = "Success! Your application was successfully submitted for Branch Manager review.";
        }
        elseif (auth()->user()->sales_group == "AGENT")
        {
            $quotestatus = "For Sales Review";
            $status_message = "Success! Your application was successfully submitted for Sales review.";
        }        
        else
        {
            $quotestatus = "Submitted";
            $status_message = "Success! Your application was successfully submitted for Underwriting review.";
        }

        if ($request->get('template') == "MTR-I" || $request->get('template') == "MTR-C"){

            $transit = $request->get('transit');
            $point_origin = "";
            $point_destination = "";
            $packaging = "";
        }
        else{
            $transit = "";
            $point_origin = $request->get('point_origin');
            $point_destination = $request->get('point_destination');
            $packaging = $request->get('packaging');           
        }

    if( $request->get('template') == "MTR-I" || $request->get('template') == "MCI-I")
    {
        $assured = $request->get('assured'); 
        $agent = $request->get('agent');
        $address = $request->get('address'); 
        $employer = $request->get('employer');
        $office_address = $request->get('office_address'); 
        $occupation  = $request->get('occupation');
        $birth_date = $request->get('birth_date'); 
        $contact_no  = $request->get('contact_no');
        $email = $request->get('email'); 
        $tin  = $request->get('tin');
        $other_idno = $request->get('other_idno');

        $validator = Validator::make($request->all(), [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'subline' => 'required',
                    'sum_insured' => 'required',
                    'agent' => 'required',
                    'assured' => 'required',
                    'warehouse' => 'required',
        ]);
    
    } 
    else{
        $assured = $request->get('assured2'); 
        $agent = $request->get('agent2');
        $address = $request->get('address2'); 
        $employer = $request->get('employer2');
        $office_address = $request->get('office_address2'); 
        $occupation  = $request->get('occupation2');
        $birth_date = $request->get('birth_date2'); 
        $contact_no  = $request->get('contact_no2');
        $email = $request->get('email2'); 
        $tin  = $request->get('tin2');
        $other_idno = $request->get('other_idno2'); 

        $validator = Validator::make($request->all(), [
                    'incept_date' => 'required|Date',
                    'expiry_date' => 'required|Date',
                    'subline' => 'required',
                    'sum_insured' => 'required',
                    'agent2' => 'required',
                    'assured2' => 'required',
                    'warehouse' => 'required', 
        ]);       
    }  



        if ($validator->passes()) {

       $marine_quote = cocogen_marine_quote::where('id',$request->get('transno'))->get();

        if ( $marine_quote[0]["status"] == "For Sales Review" &&  number_format($marine_quote[0]["gross_premium"],2) != $request->get('gross_premium') )
        {   
            $cocogen_marine_historylogs= new cocogen_marine_historylogs;
            $cocogen_marine_historylogs->category = "Gross Premium";
            $cocogen_marine_historylogs->description = "From: ".number_format($marine_quote[0]["gross_premium"],2)." - To ".$request->get('gross_premium');
            $cocogen_marine_historylogs->action = "Modify";
            $cocogen_marine_historylogs->user = auth()->user()->name;
            $cocogen_marine_historylogs->transno = $request->get('transno');
            $cocogen_marine_historylogs->save(); 
        }

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno')); 
        $cocogen_marine_quote->assured = $assured; 
        $cocogen_marine_quote->agent  = $agent;
        $cocogen_marine_quote->address = $address; 
        $cocogen_marine_quote->employer = $employer;
        $cocogen_marine_quote->office_address = $office_address; 
        $cocogen_marine_quote->occupation  = $occupation;
        $cocogen_marine_quote->birth_date = $birth_date; 
        $cocogen_marine_quote->contact_no  = $contact_no;
        $cocogen_marine_quote->email = $email; 
        $cocogen_marine_quote->tin  = $tin;
        $cocogen_marine_quote->other_idno = $other_idno;

        $cocogen_marine_quote->subline  = $request->get('subline');
        $cocogen_marine_quote->incept_date = $request->get('incept_date'); 
        $cocogen_marine_quote->expiry_date  = $request->get('expiry_date');
        $cocogen_marine_quote->no_days = str_replace(',', '', $request->get('no_days')); 
        $cocogen_marine_quote->rate  = str_replace(',', '', $request->get('rate'));       
        $cocogen_marine_quote->sum_insured  = str_replace(',', '', $request->get('sum_insured'));
        $cocogen_marine_quote->basic_premium  = str_replace(',', '', $request->get('basic_premium'));
        $cocogen_marine_quote->doc_stamps  = str_replace(',', '', $request->get('doc_stamps'));
        $cocogen_marine_quote->vat  = str_replace(',', '', $request->get('vat'));
        $cocogen_marine_quote->lgt  = str_replace(',', '', $request->get('lgt'));
        $cocogen_marine_quote->gross_premium  = str_replace(',', '', $request->get('gross_premium'));

        $cocogen_marine_quote->interested_insured = $request->get('interested_insured');
        $cocogen_marine_quote->aggregate_limit  = $request->get('aggregate_limit');
        $cocogen_marine_quote->warehouse = $request->get('warehouse'); 
        $cocogen_marine_quote->frequency = $request->get('frequency');
        $cocogen_marine_quote->prev_insurer = $request->get('prev_insurer'); 
        $cocogen_marine_quote->limit_truck  = $request->get('limit_truck');
        $cocogen_marine_quote->transit = $transit;
        $cocogen_marine_quote->point_origin = $point_origin;
        $cocogen_marine_quote->point_destination = $point_destination;
        $cocogen_marine_quote->packaging = $packaging; 
        $cocogen_marine_quote->loss_xp  = $request->get('loss_xp');

        $cocogen_marine_quote->no_driver = $request->get('no_driver');
        $cocogen_marine_quote->no_helper  = $request->get('no_helper');
        $cocogen_marine_quote->reg_employee= $request->get('reg_employee'); 
        $cocogen_marine_quote->no_regular = $request->get('no_regular');
        $cocogen_marine_quote->hired_driver = $request->get('hired_driver'); 
        $cocogen_marine_quote->hired_helper  = $request->get('hired_helper');
        $cocogen_marine_quote->hired_substitute = $request->get('hired_substitute');         

        $cocogen_marine_quote->status  = $quotestatus;
        $cocogen_marine_quote->dt_submitted  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->department  = auth()->user()->department;
        $cocogen_marine_quote->submitted_by  = auth()->user()->id;
        $cocogen_marine_quote->save();         
 

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
    if( $request->get('template') == "MTR-I")
    {

     if (empty($request->get('agent'))) {

        if (empty($error_fld))
        {
            $error_fld = "Agent";
        }
        else
         {
            $error_fld =  $error_fld .", Agent";
        }    
    }
     if (empty($request->get('assured'))) {

        if (empty($error_fld))
        {
            $error_fld = "Assured";
        }
        else
         {
            $error_fld =  $error_fld .", Assured";
        }        
     }
    }
     else{

     if (empty($request->get('agent2'))) {

        if (empty($error_fld))
        {
            $error_fld = "Agent";
        }
        else
         {
            $error_fld =  $error_fld .", Agent";
        }    
    }
     if (empty($request->get('assured2'))) {

        if (empty($error_fld))
        {
            $error_fld = "Assured";
        }
        else
         {
            $error_fld =  $error_fld .", Assured";
        }        
     }
     }

     if (empty($request->get('interested_insured'))) {

        if (empty($error_fld))
        {
            $error_fld = "Interested Insured";
        }
        else
         {
            $error_fld =  $error_fld .", Interested Insured";
        }    
    }

     if (empty($request->get('warehouse'))) {

        if (empty($error_fld))
        {
            $error_fld = "Location of Warehouse";
        }
        else
         {
            $error_fld =  $error_fld .", Location of Warehouse";
        }    
    }           
        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);

    }

public function  getquotemarineview($id)
{

         $cocogen_marine_quote = cocogen_marine_quote::select('cocogen_marine_quote.*', 'b.name as createdby', 'c.name as submittedby', 'd.name as bmreviewedby', 'e.name as forsalesreviewby', 'f.name as reviewedby', 'g.name as approvedby', 'h.name as cancelledby')->where('cocogen_marine_quote.id', $id)
         ->leftJoin('users as b', 'cocogen_marine_quote.created_by', '=', 'b.id')
         ->leftJoin('users as c', 'cocogen_marine_quote.submitted_by', '=', 'c.id')
         ->leftJoin('users as d', 'cocogen_marine_quote.bmreviewed_by', '=', 'd.id')
         ->leftJoin('users as e', 'cocogen_marine_quote.forsalesreview_by', '=', 'e.id')
         ->leftJoin('users as f', 'cocogen_marine_quote.reviewed_by', '=', 'f.id')
         ->leftJoin('users as g', 'cocogen_marine_quote.approved_by', '=', 'g.id')
         ->leftJoin('users as h', 'cocogen_marine_quote.cancelled_by', '=', 'h.id')
         ->orderBy('id') 
         ->get(); 

        if(\Auth::user()->accountType == "Manager" || \Auth::user()->accountType == "Approver" || \Auth::user()->accountType == "Underwriter"){
          $readonly = "1";      
        }
        elseif((\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Agent") && ($cocogen_marine_quote[0]["status"] == "Save" || $cocogen_marine_quote[0]["status"] == "For Sales Review")) {
          $readonly = "0";      
        }
        else{
            $readonly = "1";
        }

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();  
    
        $cocogen_meta = cocogen_meta::where('page', '=', "Marine Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];     

        return view('getaquote.marine.marine_view', ['cocogen_marine_quote' => $cocogen_marine_quote, 'title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription,'keyword' => $keyword, 'readonly' => $readonly]);
}

    public function getquotemarinemanager(Request $request){
       
        $dt = new DateTime;

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno'));
        $cocogen_marine_quote->dt_bmreviewed  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->status  = 'Submitted';
        $cocogen_marine_quote->bmreviewed_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully verified.";

        $quotestatus = "Submitted";

        return response()->json(['success'=>$status_message]);
    }

         public function getquotemarinesales(Request $request){
       
        $dt = new DateTime;

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno'));
        $cocogen_marine_quote->dt_forsalesreview  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->status  = 'For Sales Review';
        $cocogen_marine_quote->forsalesreview_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully returned for sales review.";

        $quotestatus = "For Sales Review";

        return response()->json(['success'=>$status_message]);
    }

     public function getquotemarinereview(Request $request){
       
        $dt = new DateTime;

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno'));
        $cocogen_marine_quote->dt_uwreviewed  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->status  = 'UW Reviewed';
        $cocogen_marine_quote->reviewed_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully reviewed.";

        $quotestatus = "UW Reviewed";

        return response()->json(['success'=>$status_message]);
    }

     public function getquotemarineapprove(Request $request){
       
        $dt = new DateTime;

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno'));
        $cocogen_marine_quote->dt_approved  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->status  = 'Approved';
        $cocogen_marine_quote->approved_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        //$transno = $cocogen_marine_quote->id;
        $status_message = "Success! Application was successfully approved.";

        $quotestatus = "Approved";

        return response()->json(['success'=>$status_message]);
    }

    public function getquotemarinecancel(Request $request){
       
        $dt = new DateTime;

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno'));
        $cocogen_marine_quote->dt_cancelled  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->status  = 'Cancelled';
        $cocogen_marine_quote->cancelled_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully cancelled.";

        $quotestatus = "Cancelled";

        return response()->json(['success'=>$status_message]);
    } 


    public function getquotemarineissue(Request $request){
       
        $dt = new DateTime;

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno'));
        $cocogen_marine_quote->dt_issued  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->status  = 'Issued';
        $cocogen_marine_quote->Issued_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Quotation was successfully tag as Issued.";

        $quotestatus = "Issued";

        return response()->json(['success'=>$status_message]);
    }

    public function getquotemarinednm(Request $request){
       
        $dt = new DateTime;

        $cocogen_marine_quote = cocogen_marine_quote::findorFail($request->get('transno'));
        $cocogen_marine_quote->dt_dnm  = $dt->format('Y-m-d H:i:s');
        $cocogen_marine_quote->status  = 'DNM';
        $cocogen_marine_quote->dnm_by  = auth()->user()->id;
        $cocogen_marine_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Quotation was successfully tag as DNM.";

        $quotestatus = "DNM";

        return response()->json(['success'=>$status_message]);
    }

        public function addmarine_comments(Request $request)
    { 

        $validator = Validator::make($request->all(), [
            'txt_comment' => 'required',
        ]);


        if ($validator->passes()) {
  
        $cocogen_marine_remarks= new cocogen_marine_remarks;
        $cocogen_marine_remarks->remarks = $request->get('txt_comment');
        $cocogen_marine_remarks->username = auth()->user()->name;
        $cocogen_marine_remarks->transno = $request->get('transno');
        $cocogen_marine_remarks->save();   

        $status_message = "Success! Comment was successfully added.";  

        return response()->json(['success'=>$status_message]);

 
     }
        $status_message = "Comment is required.";
        return response()->json(['error'=>$status_message]);

    } 

    public function getmarine_comments($id){


     $cocogen_marine_remarks = cocogen_marine_remarks::where('transno',$id)
     ->select('cocogen_marine_remarks.*', 'cocogen_marine_quote.status')
     ->leftJoin('cocogen_marine_quote', 'cocogen_marine_remarks.transno', '=', 'cocogen_marine_quote.id')
     ->orderByDesc('id')
     ->get();

    return view('getaquote.marine.marine_comments', compact('cocogen_marine_remarks'));

}  

        public function addmarine_attachment(Request $request)
    { 


              $validator = Validator::make($request->all(), [
        'filename' => 'required|file|mimes:pdf,PDF,doc,docx,csv,txt,xlx,xls,rar,zip,ppt,pptx|max:2048',
      ]);




      if ($validator->passes()) {
                   

                    $requestparams = $request->all();

                    $cocogen_marine_attachment= new cocogen_marine_attachment;
                    $cocogen_marine_attachment->filename = $request->file('filename')->hashName();
                    $cocogen_marine_attachment->extension = $request->file('filename')->extension();
                    $cocogen_marine_attachment->filesize = $request->file('filename')->getSize();
                    $cocogen_marine_attachment->location = $request->file('filename')->store('public/marinefiles');
                    $cocogen_marine_attachment->filename2 =$request->file('filename')->getClientOriginalName();
                    $cocogen_marine_attachment->transno = $request->get('transno');
                    $cocogen_marine_attachment->save(); 


        $marine_quote = cocogen_marine_quote::where('id',$request->get('transno'))->get();

        if ( $marine_quote[0]["status"] == "For Sales Review")
        {   
            $cocogen_marine_historylogs= new cocogen_marine_historylogs;
            $cocogen_marine_historylogs->category = "Attachment";
            $cocogen_marine_historylogs->description = "Filename: ".$request->file('filename')->getClientOriginalName();
            $cocogen_marine_historylogs->action = "Add";
            $cocogen_marine_historylogs->user = auth()->user()->name;
            $cocogen_marine_historylogs->transno = $request->get('transno');
            $cocogen_marine_historylogs->save(); 
        }

                    $status_message = "File successfully uploaded.";  

                    return response()->json(['success'=>$status_message]);


    }

        if($request->hasFile('filename')) {
        $error_msg = "Invalid File! Only accept PDF and Doc files.";
    } else {
        $error_msg = "No file to upload";
    };


        $status_message = $error_msg;
        return response()->json(['error'=>$status_message]);

    }

public function  deletemarine_attachment($id, $transno)
{
    $attachment = cocogen_marine_attachment::where('id',$id)->get();

        $marine_quote = cocogen_marine_quote::where('id',$transno)->get();

        if ( $marine_quote[0]["status"] == "For Sales Review")
        {   
            $cocogen_marine_historylogs= new cocogen_marine_historylogs;
            $cocogen_marine_historylogs->category = "Attachment";
            $cocogen_marine_historylogs->description = "Filename: ".$attachment[0]["filename2"];
            $cocogen_marine_historylogs->action = "Delete";
            $cocogen_marine_historylogs->user = auth()->user()->name;
            $cocogen_marine_historylogs->transno = $transno;
            $cocogen_marine_historylogs->save(); 
        }


    $cocogen_marine_attachment = cocogen_marine_attachment::where('id',$id)->delete();
  
    return Response::json($cocogen_marine_attachment);
} 

public function  deletemarine_comments($id)
{
    $cocogen_marine_remarks  = cocogen_marine_remarks::where('id',$id)->delete();
  
    return Response::json($cocogen_marine_remarks);
}

    public function getquotemarinepremium(Request $request){

        $validator = Validator::make($request->all(), [
            'incept_date' => 'required',
            'expiry_date' => 'required',
            'sum_insured' => 'required',
        ]);


        if ($validator->passes()) {

        $tdate = $request->get('expiry_date');
        $fdate = $request->get('incept_date');
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $sum_insured = str_replace(',', '', $request->get('sum_insured'));
        $ds_rate = "0.125";
        $vat_rate = "0.12";

        $lgt_rate = cocogen_lgt::where('department',auth()->user()->department)->get();
        //$lgt_rate = "0.500";

        $interval = $datetime1->diff($datetime2);
        $no_days = $interval->format('%a');

        if (empty($request->get('rate'))) {
                if ((int) $no_days < 91){
                $rate = "0.075";
            }
                elseif((int) $no_days > 90 && (int) $no_days < 121){
                $rate = "0.095";
            }
                elseif((int) $no_days > 120 && (int) $no_days < 181){
                $rate = "0.130";
            }
            else{
                $rate = "0.180"; 
            }
        }else{

             $rate = $request->get('rate');
        }

       $basic_premium = (floatval($sum_insured) * floatval($rate))/100;
       $doc_stamps = floatval($basic_premium) * floatval($ds_rate);
       $vat= floatval($basic_premium) * floatval($vat_rate);
       $lgt= (floatval($basic_premium) * floatval($lgt_rate[0]["lgt"]))/100;
       $gross_premium = floatval($basic_premium)+floatval($doc_stamps)+floatval($vat)+floatval($lgt);

        return response()->json(['nodays'=>$no_days, 'rate'=>$rate, 'basic_premium'=>number_format($basic_premium,2), 'doc_stamps'=>number_format($doc_stamps,2), 'vat'=>number_format($vat,2), 'lgt'=>number_format($lgt,2), 'gross_premium'=>number_format($gross_premium,2)]);

    }


    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('incept_date'))) {

        $error_fld = "Incept Date";

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

    public function getmarine_historylogs($id)
    {
        if(request()->ajax()) {
        
             $cocogen_marine_historylogs = DB::table('cocogen_marine_historylogs')->select('*')->where('transno',$id)->orderByDesc('id');
            return datatables()->of($cocogen_marine_historylogs)
            ->make(true);
        }

    }  

    public function  getquotemarineapproval($id)
{



         $cocogen_marine_quote = cocogen_marine_quote::where('id', $id)
         ->orderBy('id') 
        ->get(); 

         $cocogen_marine_attachment = cocogen_marine_attachment::where('transno', $id)
         ->orderBy('id') 
        ->get(); 

         $cocogen_marine_historylogs = cocogen_marine_historylogs::where('transno', $id)
         ->orderBy('id') 
        ->get();         
    
        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];     

        $hasht = Hash::make($id.'-MARINE');
        
        $pdf = PDF::loadView('pdf.marineapproval',  compact('cocogen_marine_quote', 'cocogen_marine_attachment', 'cocogen_marine_historylogs', 'title'));

        Storage::put('public/pdf/marine/'. $hasht.'-MARINE.pdf', $pdf->output());
        return $pdf->download('marine.pdf');

}

    public function emailmarineautoquote($link, $assured, $premium, $email, $quotestatus) {
            $data = array('link'=>$link, 'assured'=>$assured, 'premium'=>$premium, 'email'=>$email, 'quotestatus'=> $quotestatus);
            Mail::send('emailtemplate.marine_auto_quote', $data, function($message) use ($link,$assured, $premium,$email,$quotestatus)
              {
                $message->to($email, 'COCOGEN')->subject('New Request Received – Bonds Auto Quote')->from('noreply@cocogen.com', 'COCOGEN')->cc('dras_fajutagana@ucpbgen.com');
              });
    }

    public function downloadMarine($filename,$txnid){

            $s ="\'";
            $s2 = substr($s, 0,1);
            //$slash = substr($s2,0, -1);
            $files = cocogen_marine_attachment::where('id', '=', $txnid)->get();
            $file_path = "/var/www/html/cocogen/storage/app/" .$files['0']['location'];           

          return response()->file($file_path);
         
    }


}