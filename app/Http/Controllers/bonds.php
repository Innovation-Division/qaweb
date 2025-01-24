<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use URL;
use Auth;
use Mail;
use Session;
use Storage;
use App\Models\User;
use DateTime;
use App\Models\users;
use Validator;
use Datatables;
use SoapClient;
use App\Models\cocogen_lgt;
use App\Models\cocogen_meta;
use GuzzleHttp\Client;
use Redirect,Response;
use App\Models\cocogen_admin_faq;
use App\Models\cocogen_bonds_tsi;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_bond_rates;
use App\Models\cocogen_bonds_owner;
use App\Models\cocogen_bonds_quote;
use App\Models\cocogen_bonds_users;
use Illuminate\Http\Request;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_bonds_lossxp;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_pages;
use App\Models\cocogen_bonds_officer;
use App\Models\cocogen_bonds_remarks;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_bonds_cosigner;
use App\Models\cocogen_bonds_projects;
use App\Http\Controllers\bonds;
use App\Rules\MatchOldPassword;
use App\Models\cocogen_bonds_financial;
use App\Models\cocogen_bonds_guarantee;
use App\Models\cocogen_bonds_principal;
use App\Models\cocogen_bonds_projects2;
use App\Models\cocogen_admin_pages_news;
use App\Models\cocogen_bonds_attachment;
use App\Models\cocogen_bonds_collateral;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_view_bonds_quote;
use App\Models\cocogen_admin_breadcrumbs;
use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_bonds_historylogs;
use App\Models\cocogen_bonds_requirement;
use App\Models\cocogen_admin_faq_category;
use App\Models\cocogen_admin_emailtemplate;
use App\Models\cocogen_admin_parentproduct;
use App\Models\cocogen_bonds_principal_api;
use App\Models\cocogen_view_bonds_approver;
use Illuminate\Support\Facades\Hash;
use App\Models\cocogen_admin_homepage_video;
use App\Models\cocogen_admin_pages_products;
use App\Models\cocogen_bonds_financial_type;
use App\Models\cocogen_view_bonds_approver2;
use App\Models\cocogen_admin_homepage_slider;
use App\Models\cocogen_admin_ineedprotection;
use App\Models\cocogen_admin_relatedproducts;
use App\Models\cocogen_bonds_financial_years;
use App\Models\cocogen_admin_subparentproduct;
use App\Models\cocogen_view_bonds_quote_agent;
use App\Models\cocogen_bonds_financial_remarks;
use App\Models\cocogen_bonds_quote_requirement;
use App\Models\cocogen_admin_ineedprotection_trans;
use App\Models\cocogen_bonds_obligee;
use App\Models\cocogen_bonds_obligee2;
use App\Models\cocogen_bonds_policy_broker;
use App\Models\cocogen_agent_bonds_user;
use Carbon\Carbon;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;


class bonds extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function getbondsquote(){

               $agent = \Auth::user()->name;
               $department = \Auth::user()->department;

            if (\Auth::user()->accountType == "Agent")
            {
                $cocogen_bonds_quote_sum = cocogen_view_bonds_quote_agent::select('*')->where('agent',$agent)
                ->get();
            }
            elseif (\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Manager") {
                $cocogen_bonds_quote_sum = cocogen_view_bonds_quote::select('*')->where('department',$department)
                ->get();
            }

            else
            {

                $cocogen_bonds_quote_sum = DB::table('cocogen_view_bonds_approver')->select('*')->get();

            }
            $cocogen_admin_footer = cocogen_admin_footer::all();
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();

            $cocogen_meta = cocogen_meta::where('page', '=', "Bonds")->get();
            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            // $monitoring_agent=cocogen_users_agent_code::get();
            $cocogen_bonds_financial_remarks = cocogen_bonds_financial_remarks::get();
            return view('getaquote.bonds.bonds_home', ['cocogen_bonds_quote_sum' => $cocogen_bonds_quote_sum,
            'title' => $title,
            'cocogen_admin_footer' => $cocogen_admin_footer,
            'cocogen_admin_productlink' => $cocogen_admin_productlink,
            'cocogen_admin_main' => $cocogen_admin_main,
            'cocogen_admin_submain' => $cocogen_admin_submain,
            'cocogen_admin_subchild' => $cocogen_admin_subchild,
            'metadescription' => $metadescription,
            'keyword' => $keyword
        ]);

    }


    public function  getquotebondsview($id)
    {
         $cocogen_bonds_financial_type = cocogen_bonds_financial_type::where('id', '>', "0")
        ->orderBy('id')
        ->get();
         $cocogen_bonds_quote = cocogen_view_bonds_approver2::select('cocogen_view_bonds_approver2.*', 'b.name as createdby', 'c.name as submittedby', 'd.name as bmreviewedby', 'e.name as forsalesreviewby', 'f.name as reviewedby', 'g.name as approvedby', 'h.name as cancelledby', 'i.name as issuedby', 'j.name as dnmby')->where('cocogen_view_bonds_approver2.id', $id)
         ->leftJoin('users as b', 'cocogen_view_bonds_approver2.created_by', '=', 'b.id')
         ->leftJoin('users as c', 'cocogen_view_bonds_approver2.submitted_by', '=', 'c.id')
         ->leftJoin('users as d', 'cocogen_view_bonds_approver2.bmreviewed_by', '=', 'd.id')
         ->leftJoin('users as e', 'cocogen_view_bonds_approver2.forsalesreview_by', '=', 'e.id')
         ->leftJoin('users as f', 'cocogen_view_bonds_approver2.reviewed_by', '=', 'f.id')
         ->leftJoin('users as g', 'cocogen_view_bonds_approver2.approved_by', '=', 'g.id')
         ->leftJoin('users as h', 'cocogen_view_bonds_approver2.cancelled_by', '=', 'h.id')
         ->leftJoin('users as i', 'cocogen_view_bonds_approver2.issued_by', '=', 'i.id')
         ->leftJoin('users as j', 'cocogen_view_bonds_approver2.dnm_by', '=', 'j.id')
         ->orderBy('cocogen_view_bonds_approver2.id')
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

        $cocogen_bonds_list= cocogen_bonds_quote_requirement::where('transno',$id)->get();

        $cocogen_bonds_financial_highlight_year= cocogen_bonds_financial_years::where('trans_id',$id)->get();
        $cocogen_bonds_tsi = cocogen_bonds_tsi::where('trans_id',$id)->get();
        $cocogen_bonds_lossxp = cocogen_bonds_lossxp::where('transno',$id)->get();
        $cocogen_bonds_owner = cocogen_bonds_owner::where('transno',$id)->get();
        $cocogen_bonds_officer= cocogen_bonds_officer::where('transno',$id)->get();
        $cocogen_bonds_collateral= cocogen_bonds_collateral::where('transno',$id)->get();
        $cocogen_bonds_principal= cocogen_bonds_principal::where('transno',$id)->get();
        $cocogen_bonds_cosigner= cocogen_bonds_cosigner::where('transno',$id)->get();
        $cocogen_bonds_projects=cocogen_bonds_projects::where('transno',$id)->get();
        $cocogen_bonds_guarantee=cocogen_bonds_guarantee::where('transno',$id)->get();
        $cocogen_bonds_projects2=cocogen_bonds_projects2::where('transno',$id)->get();
        $cocogen_bonds_attachment=cocogen_bonds_attachment::where('transno',$id)->get();
        $cocogen_bonds_historylogs = cocogen_bonds_historylogs::where('transno',$id)->get();

        $bonds_financial_remarks = cocogen_bonds_financial_remarks::where('transno',$id)
            ->select('cocogen_bonds_financial_remarks.*', 'cocogen_bonds_quote.status')
            ->leftJoin('cocogen_bonds_quote', 'cocogen_bonds_financial_remarks.transno', '=', 'cocogen_bonds_quote.id')
            ->orderBy('id', 'ASC')
            ->get();

            $agent_list =  cocogen_agent_bonds_user::SELECT('code','agentname')
                ->get();
        $cocogen_bonds_financial_years = cocogen_bonds_financial_years::where('trans_id',$id)->get();
        $cocogen_bonds_comment= cocogen_bonds_remarks::where('transno',$id)->get();

        $cocogen_bonds_list_check = cocogen_bonds_quote_requirement::where('transno', $id)
        ->selectRaw("IF(bond_type = 'Heirs', 1, 0) as is_heirs")
        ->get();

        // $cocogen_bonds_list_check = cocogen_bonds_quote_requirement::where('transno', $id)
        // ->selectRaw("IF(COUNT(DISTINCT bond_type) = 1 AND MAX(bond_type) = 'Heirs', 0, 1) as is_heirs")
        // ->get();


        $heirs = 0; // Default value

        foreach ($cocogen_bonds_list_check as $record) {
            if ($record->is_heirs == 1) {
                $heirs = 1;
            }else{
                $heirs = 0;
            }
        }
        
        $cocogen_bonds_compute = cocogen_bonds_quote_requirement::where('transno', $id)->sum('bond_amt');// COUNT THE SUM OF ADDDED BOND REQUIREMENT
        $cocogen_bonds_quote_sum = !empty($cocogen_bonds_compute) ? $cocogen_bonds_compute : 0;
        return view('getaquote.bonds.bonds_view', ['cocogen_bonds_quote' => $cocogen_bonds_quote,
        'cocogen_bonds_financial_type' => $cocogen_bonds_financial_type,
        'title' => $title,
        'cocogen_admin_footer' => $cocogen_admin_footer,
        'cocogen_admin_productlink' => $cocogen_admin_productlink,
        'cocogen_admin_main' => $cocogen_admin_main,
        'cocogen_admin_submain' => $cocogen_admin_submain,
        'cocogen_admin_subchild' => $cocogen_admin_subchild,
        'metadescription' => $metadescription,
        'keyword' => $keyword,
        'cocogen_bonds_list'=>$cocogen_bonds_list,
        'bonds_financial_remarks'=>$bonds_financial_remarks,
        'cocogen_bonds_comment'=>$cocogen_bonds_comment,
        'cocogen_bonds_financial_highlight_year'=>$cocogen_bonds_financial_highlight_year,
        'cocogen_bonds_tsi'=>$cocogen_bonds_tsi,
        'cocogen_bonds_lossxp'=>$cocogen_bonds_lossxp,
        'cocogen_bonds_owner'=>$cocogen_bonds_owner,
        'cocogen_bonds_officer'=>$cocogen_bonds_officer,
        'cocogen_bonds_collateral'=>$cocogen_bonds_collateral,
        'cocogen_bonds_principal'=>$cocogen_bonds_principal,
        'cocogen_bonds_cosigner'=>$cocogen_bonds_cosigner,
        'cocogen_bonds_guarantee'=>$cocogen_bonds_guarantee,
        'cocogen_bonds_projects'=>$cocogen_bonds_projects,
        'cocogen_bonds_projects2'=>$cocogen_bonds_projects2,
        'cocogen_bonds_attachment'=>$cocogen_bonds_attachment,
        'cocogen_bonds_historylogs'=>$cocogen_bonds_historylogs,
        'agent_list'=>$agent_list,
        'cocogen_bonds_financial_years'=>$cocogen_bonds_financial_years,
        'heirs'=>$heirs,
        'cocogen_bonds_quote_sum'=>$cocogen_bonds_quote_sum,
        ]);
}

    public function  getquotebondsapproval($id)
{

        $cocogen_bonds_quote_requirement = cocogen_bonds_quote_requirement::where('transno', $id)
        ->orderBy('id')
        ->get();

         $cocogen_bonds_financial = cocogen_bonds_financial_years::where('trans_id', $id)
        ->orderBy('id')
        ->get();

        $cocogen_bonds_financial_remarks = cocogen_bonds_financial_remarks::where('transno', $id)
        ->orderBy('id')
        ->get();

        $cocogen_bonds_tsi = cocogen_bonds_tsi::where('trans_id', $id)
        ->orderBy('id')
        ->get();


        $cocogen_bonds_lossxp = cocogen_bonds_lossxp::where('transno', $id)
        ->orderBy('id')
        ->get();

        $cocogen_bonds_owner = cocogen_bonds_owner::where('transno', $id)
        ->orderBy('id')
        ->get();

        $cocogen_bonds_officer = cocogen_bonds_officer::where('transno', $id)
        ->orderBy('id')
        ->get();



        $cocogen_bonds_collateral = cocogen_bonds_collateral::where('transno', $id)
        ->orderBy('id')
        ->get();

         $cocogen_bonds_cosigner = cocogen_bonds_cosigner::where('transno', $id)
        ->orderBy('id')
        ->get();

        $cocogen_bonds_projects = cocogen_bonds_projects::where('transno', $id)
        ->orderBy('id')
        ->get();

         $cocogen_bonds_projects2 = cocogen_bonds_projects2::where('transno', $id)
        ->orderBy('id')
        ->get();


         $cocogen_bonds_quote = cocogen_bonds_quote::where('id', $id)
         ->orderBy('id')
        ->get();



        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];

        $hasht = Hash::make($id.'-BONDS');

        $pdf = PDF::loadView('pdf.bondsapproval',  compact('cocogen_bonds_quote', 'cocogen_bonds_quote_requirement', 'cocogen_bonds_financial', 'cocogen_bonds_financial_remarks', 'cocogen_bonds_officer', 'cocogen_bonds_owner', 'cocogen_bonds_lossxp', 'cocogen_bonds_collateral', 'cocogen_bonds_cosigner', 'cocogen_bonds_projects', 'cocogen_bonds_projects2','cocogen_bonds_tsi', 'title'));

        Storage::put('public/pdf/bonds/'. $hasht.'-BONDS.pdf', $pdf->output());
        return $pdf->download('BONDS.pdf');

}


public function getquotebonds(){


    $cocogen_bonds_requirement = cocogen_bonds_requirement::where('active', '=', "Yes")
    ->orderBy('id')
    ->get();

     $cocogen_bonds_financial_type = cocogen_bonds_financial_type::where('id', '>', "0")
    ->orderBy('id')
    ->get();
    $agent_list =  cocogen_agent_bonds_user::SELECT('code','agentname')
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
    $cocogen_bonds_financial_type = cocogen_bonds_financial_type::get();
    $principal = cocogen_bonds_principal_api::limit(10)->get();

    return view('getaquote.bonds.newhomebond', ['cocogen_bonds_requirement' => $cocogen_bonds_requirement,
    'title' => $title,
    'cocogen_admin_footer' => $cocogen_admin_footer,
    'cocogen_admin_productlink' => $cocogen_admin_productlink,
    'cocogen_admin_main' => $cocogen_admin_main,
    'cocogen_admin_submain' => $cocogen_admin_submain,
    'cocogen_admin_subchild' => $cocogen_admin_subchild,
    'metadescription' => $metadescription,
    'keyword' => $keyword,
    'agent_list'=>$agent_list,
     'cocogen_bonds_financial_type' => $cocogen_bonds_financial_type,
     'principal'=>$principal
]);
}



public function getquotebondssave(Request $request){

    $rules = [
        // 'agent' => 'required',
        // 'acode' => 'required',

        'principal' => 'required_without:principal2', // Added 'required_without' rule
        'principal2' => 'required_without:principal', // Added 'required_without' rule


        'obligee' => 'required_without:obligee2', // Added 'required_without' rule
        'obligee2' => 'required_without:obligee', // Added 'required_without' rule
        // 'address' => 'required',
        // 'date_incorp' => 'required|Date',
        // 'company_tin' => 'required|regex:/^[0-9-]+$/',
        // 'contact_person' => 'required',
        // 'contact_no' => 'required',
        'project' => 'required',
        'contract_price' => 'required',
        // 'email' => 'required|email',
        // 'undertaking' => 'required',
        // 'company_bgd' => 'required'
    ];

    $niceNames = [
        // 'agent' => 'agent',
        'principal' => 'principal',
        'principal2'=>'principal2',
        'obligee' => 'obligee',
        'obligee2' => 'obligee2',
        // 'address' => 'address',
        // 'date_incorp' => 'date of incorporation',
        // 'company_tin' => 'company TIN',
        // 'contact_person' => 'contact person',
        // 'contact_no' => 'contact no.',
        'project' => 'project',
        'contract_price' => 'contract price'
        // 'undertaking' => 'undertaking',
        // 'company_bgd' => 'company background',
        // 'email' => 'email'
    ];



        $this->validate($request, $rules, [], $niceNames);

//create a condition for update
    $trans = !empty($request->get('copytransno')) ? $request->get('copytransno') :0;

    $bonds_check_update = cocogen_bonds_quote::where('id', $trans)->get();

    if ($bonds_check_update->count() === 0) {

    if( $request->get('updateKYC') && !empty( $request->get('updateKYC'))) {
        $update_kyc = 'Yes';
    } else {
        $update_kyc = 'No';
    };
        $cleanStringprice = str_replace(',', '', $request->get('contract_price'));
        $contact_price =preg_replace("/[^0-9.]+/", "", $cleanStringprice);
        $date_now = date("Y-m-d");
        $tin_no =$request->get('company_tin');
        $companytin = str_replace('-', '', $tin_no);
        $dateString = $request->get('date_incorp'); // Assuming $request contains the input data
        $formattedDate = date('Y-m-d', strtotime($dateString));

        $cocogen_bonds_quote= new cocogen_bonds_quote;
        $cocogen_bonds_quote->agent = $request->get('agent');
        $cocogen_bonds_quote->acode = !empty($request->get('acode')) ? $request->get('acode') : 0;
        $cocogen_bonds_quote->principal  = !empty($request->get('principal')) ? $request->get('principal'): $request->get('principal2');
        $cocogen_bonds_quote->quote_date = $date_now;
        $cocogen_bonds_quote->obligee  = !empty($request->get('obligee')) ? $request->get('obligee'): $request->get('obligee2');
        $cocogen_bonds_quote->address = $request->get('address');
        $cocogen_bonds_quote->date_incorp = $formattedDate;
        $cocogen_bonds_quote->company_tin = $companytin;
        $cocogen_bonds_quote->contact_person  = $request->get('contact_person');
        $cocogen_bonds_quote->contact_no = $request->get('contact_no');
        $cocogen_bonds_quote->project  = $request->get('project');
        $cocogen_bonds_quote->contract_price = $contact_price;
        $cocogen_bonds_quote->undertaking  = $request->get('undertaking');
        $cocogen_bonds_quote->company_bgd  = $request->get('company_bgd');
        $cocogen_bonds_quote->email  = $request->get('email');
        $cocogen_bonds_quote->client_type = $request->get('client');
        $cocogen_bonds_quote->request_type  = $request->get('qrequest');
        $cocogen_bonds_quote->endorse_no = $request->get('endoresePolNo');
        $cocogen_bonds_quote->others  = $request->get('others');
        $cocogen_bonds_quote->update_kyc  = $update_kyc;
        $cocogen_bonds_quote->status  = 'Save';
        $cocogen_bonds_quote->department  = auth()->user()->department;
        $cocogen_bonds_quote->created_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();
        $transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Your application was successfully saved.";
        $quotestatus = "Save";



    } else {
        if( $request->get('updateKYC') && !empty( $request->get('updateKYC'))) {
            $update_kyc = 'Yes';
        } else {
            $update_kyc = 'No';
        };
        $cleanStringprice = str_replace(',', '', $request->get('contract_price'));
        $contact_price =preg_replace("/[^0-9.]+/", "", $cleanStringprice);
        $date_now = date("Y-m-d");
        $tin_no =$request->get('company_tin');
        $companytin = str_replace('-', '', $tin_no);
        $dateString = $request->get('date_incorp'); // Assuming $request contains the input data
        $formattedDate = date('Y-m-d', strtotime($dateString));
        $cocogen_bonds_quote = cocogen_bonds_quote::findOrFail($trans);
        $cocogen_bonds_quote->agent = $request->get('agent');
        $cocogen_bonds_quote->acode = !empty($request->get('acode')) ? $request->get('acode') : 0;
        $cocogen_bonds_quote->principal  = !empty($request->get('principal')) ? $request->get('principal'): $request->get('principal2');
        $cocogen_bonds_quote->quote_date = $date_now;
        $cocogen_bonds_quote->obligee  = $request->get('obligee');
        $cocogen_bonds_quote->address = $request->get('address');
        $cocogen_bonds_quote->date_incorp = $formattedDate;
        $cocogen_bonds_quote->company_tin = $companytin;
        $cocogen_bonds_quote->contact_person  = $request->get('contact_person');
        $cocogen_bonds_quote->contact_no = $request->get('contact_no');
        $cocogen_bonds_quote->project  = $request->get('project');
        $cocogen_bonds_quote->contract_price = $contact_price;
        $cocogen_bonds_quote->undertaking  = $request->get('undertaking');
        $cocogen_bonds_quote->company_bgd  = $request->get('company_bgd');
        $cocogen_bonds_quote->email  = $request->get('email');
        $cocogen_bonds_quote->client_type = $request->get('client');
        $cocogen_bonds_quote->request_type  = $request->get('qrequest');
        $cocogen_bonds_quote->endorse_no = $request->get('endoresePolNo');
        $cocogen_bonds_quote->others  = $request->get('others');
        $cocogen_bonds_quote->update_kyc  = $update_kyc;
        $cocogen_bonds_quote->status  = 'Save';
        $cocogen_bonds_quote->department  = auth()->user()->department;
        $cocogen_bonds_quote->created_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();
        $status_message = "Success! Your application was successfully Updated.";
        $transno = $request->transno;
        $quotestatus = "Update";
    }

                $cocogen_add_bonds = new cocogen_bonds_obligee2;
                $obligee2 = $request->get('obligee2');

                if (!empty($obligee2)) {

                    $latestRecord = cocogen_bonds_obligee2::latest('id')->first();
                    $obligeeNo = $latestRecord ? str_pad($latestRecord->obligee_no + 1, 8, '0', STR_PAD_LEFT) : '00000001';

                    $cocogen_add_bonds = new cocogen_bonds_obligee2();
                    $cocogen_add_bonds->obligee_no = $obligeeNo;
                    $cocogen_add_bonds->obligee_name = $obligee2;
                    $cocogen_add_bonds->save();

                }


                $cocogen_bonds_financial = cocogen_bonds_financial_years::updateOrCreate(
                    ['trans_id' => $transno], // Search condition for existing record
                    [ // Data to be updated or created
                        'assets' => 0,
                        'assets_previous' => 0,
                        'gross_income' => 0,
                        'gross_income_previous' => 0,
                        'liabilities' => 0,
                        'liabilities_previous' => 0,
                        'net_income' => 0,
                        'net_income_previous' => 0,
                        'networth' => 0,
                        'networth_previous' => 0,
                        'paid_up_capital' => 0,
                        'paid_up_capital_previous' => 0,
                        'retained' => 0,
                        'retained_previous' => 0,
                        'financial_label' => 0,
                        'financial_label2' => 0,
                        'username' => auth()->user()->name
                    ]
                );

        // return back()->withInput()->with(array('message'=>$status_message, 'transno'=>$transno, 'quotestatus'=>$quotestatus));
        return response()->json(['message'=>$status_message, 'transno'=>$transno, 'quotestatus'=>$quotestatus]);


    }

    public function getquotebondssubmit(Request $request){

        $dt = new DateTime;

        $cocogen_bonds_quote = cocogen_bonds_quote_requirement::where('transno', $request->get('trans_id'))->sum('bond_amt');
        $status_quote = cocogen_bonds_quote::select('status')->where('id', $request->get('trans_id'))->get();

            if($status_quote[0]->status == 'For BM Review'){

                $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
                $cocogen_bonds_historylogs->category = "Change Request";
                $cocogen_bonds_historylogs->description = 'From BM Review To Submitted';
                $cocogen_bonds_historylogs->action = "Submit";
                $cocogen_bonds_historylogs->user = auth()->user()->name;
                $cocogen_bonds_historylogs->transno = $request->get('trans_id');
                $cocogen_bonds_historylogs->save();

                $quotestatus = "Submitted";
                $status_message = "Success! Your application was successfully submitted for review.";
            }elseif($status_quote[0]->status == 'UW Reviewed'){

                $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
                $cocogen_bonds_historylogs->category = "Change Request";
                $cocogen_bonds_historylogs->description = 'From UW Review To Submitted';
                $cocogen_bonds_historylogs->action = "Submit";
                $cocogen_bonds_historylogs->user = auth()->user()->name;
                $cocogen_bonds_historylogs->transno = $request->get('trans_id');
                $cocogen_bonds_historylogs->save();

                $quotestatus = "Submitted";
                    $status_message = "Success! Your application was successfully submitted for review.";
            }else{

                if ($cocogen_bonds_quote  <= 35000000.00)
                {
                    $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
                    $cocogen_bonds_historylogs->category = "Change Request";
                    $cocogen_bonds_historylogs->description = 'From Sales To BM Review';
                    $cocogen_bonds_historylogs->action = "Submit";
                    $cocogen_bonds_historylogs->user = auth()->user()->name;
                    $cocogen_bonds_historylogs->transno = $request->get('trans_id');
                    $cocogen_bonds_historylogs->save();

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
                    $status_message = "Success! Your application was successfully submitted for review.";
                }
            }

        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_submitted  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = $quotestatus;
        $cocogen_bonds_quote->submitted_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();
        //$transno = $cocogen_bonds_quote->id;

        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);

        return response()->json(['success'=>$status_message]);
    }


    public function getquotebondscancel(Request $request){
        $dt = new DateTime;
        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_cancelled  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'Cancelled';
        $cocogen_bonds_quote->cancelled_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();

        $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
        $cocogen_bonds_historylogs->category = "Change Request";
        $cocogen_bonds_historylogs->description = 'Cancel the transaction';
        $cocogen_bonds_historylogs->action = "Cancelled";
        $cocogen_bonds_historylogs->user = auth()->user()->name;
        $cocogen_bonds_historylogs->transno = $request->get('trans_id');
        $cocogen_bonds_historylogs->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully cancelled.";

        $quotestatus = "Cancelled";

        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);

        return response()->json(['success'=>$status_message]);
    }

    public function getquotebondsissue(Request $request){

        $dt = new DateTime;
        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_issued  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'Issued';
        $cocogen_bonds_quote->issued_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
        $cocogen_bonds_historylogs->category = "Change Request";
        $cocogen_bonds_historylogs->description = 'From Approve To Issued';
        $cocogen_bonds_historylogs->action = "Approve";
        $cocogen_bonds_historylogs->user = auth()->user()->name;
        $cocogen_bonds_historylogs->transno = $request->get('trans_id');
        $cocogen_bonds_historylogs->save();

        $status_message = "Success! Qutation was successfully tag as issued.";

        $quotestatus = "Issued";


        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);

        return response()->json(['success'=>$status_message]);
    }

    public function getquotebondsreturnsave(Request $request){

        $dt = new DateTime;

        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_issued  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'Save';
        $cocogen_bonds_quote->issued_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
        $cocogen_bonds_historylogs->category = "Change Request";
        $cocogen_bonds_historylogs->description = 'From Sales Review To Save';
        $cocogen_bonds_historylogs->action = "Save";
        $cocogen_bonds_historylogs->user = auth()->user()->name;
        $cocogen_bonds_historylogs->transno = $request->get('trans_id');
        $cocogen_bonds_historylogs->save();


        $status_message = "Success! Qutation was successfully tag as save.";

        $quotestatus = "Save";

        return response()->json(['success'=>$status_message]);
    }


    public function getquotebondsdnm(Request $request){

        $dt = new DateTime;

        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_dnm  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'DNM';
        $cocogen_bonds_quote->dnm_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();

        $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
        $cocogen_bonds_historylogs->category = "Change Request";
        $cocogen_bonds_historylogs->description = 'Change the status to DNM';
        $cocogen_bonds_historylogs->action = "DNM";
        $cocogen_bonds_historylogs->user = auth()->user()->name;
        $cocogen_bonds_historylogs->transno = $request->get('trans_id');
        $cocogen_bonds_historylogs->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Quotation was successfully tag as DNM.";

        $quotestatus = "DNM";

        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);


        return response()->json(['success'=>$status_message]);
    }

        public function getquotebondsreview(Request $request){

        $dt = new DateTime;

        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_uwreviewed  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'UW Reviewed';
        $cocogen_bonds_quote->reviewed_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();

        $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
        $cocogen_bonds_historylogs->category = "Change Request";
        $cocogen_bonds_historylogs->description ='Submitted to UW Reviewed';
        $cocogen_bonds_historylogs->action = "Underwriter Comitee Review";
        $cocogen_bonds_historylogs->user = auth()->user()->name;
        $cocogen_bonds_historylogs->transno = $request->get('trans_id');
        $cocogen_bonds_historylogs->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully reviewed.";

        $quotestatus = "UW Reviewed";

        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);

        return response()->json(['success'=>$status_message]);
    }

    public function getquotebondsmanager(Request $request){

        $dt = new DateTime;

        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_bmreviewed  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'Submitted';
        $cocogen_bonds_quote->bmreviewed_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();
        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully verified.";

        $quotestatus = "Submitted";

        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);

        return response()->json(['success'=>$status_message]);
    }

        public function getquotebondsapprove(Request $request){

        $dt = new DateTime;

        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_approved  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'Approved';
        $cocogen_bonds_quote->approved_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();


        $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
        $cocogen_bonds_historylogs->category = "Change Request";
        $cocogen_bonds_historylogs->description ='UW Reviewed to Approve';
        $cocogen_bonds_historylogs->action = "Approve";
        $cocogen_bonds_historylogs->user = auth()->user()->name;
        $cocogen_bonds_historylogs->transno = $request->get('trans_id');
        $cocogen_bonds_historylogs->save();

        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully approved.";

        $quotestatus = "Approved";

        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);

        return response()->json(['success'=>$status_message]);
    }

        public function getquotebondssales(Request $request){

        $dt = new DateTime;

        $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
        $cocogen_bonds_quote->dt_forsalesreview  = $dt->format('Y-m-d H:i:s');
        $cocogen_bonds_quote->status  = 'For Sales Review';
        $cocogen_bonds_quote->forsalesreview_by  = auth()->user()->id;
        $cocogen_bonds_quote->save();

        $description_per_account='';
        $status_quote = cocogen_bonds_quote::select('status')->where('id', $request->get('trans_id'))->get();
        if($status_quote[0]->status == 'UW Reviewed'){
            $description_per_account = 'UW Reviewed to Submit';
        }
        $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
        $cocogen_bonds_historylogs->category = "Change Request";
        $cocogen_bonds_historylogs->description ='UW Reviewed to Submit';
        $cocogen_bonds_historylogs->action = "Approve";
        $cocogen_bonds_historylogs->user = auth()->user()->name;
        $cocogen_bonds_historylogs->transno = $request->get('trans_id');
        $cocogen_bonds_historylogs->save();

        //$transno = $cocogen_bonds_quote->id;
        $status_message = "Success! Application was successfully returned for sales review.";

        $quotestatus = "For Sales Review";

        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $remarks=0;
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);

        return response()->json(['success'=>$status_message]);
    }


    public function updatequotebond(Request $request){

            $validator = Validator::make($request->all(), [
                    //  'agent'=>'required',
                    // 'acode'=>'required',
                    'principal' => 'required',
                    'obligee' => 'required_without:obligee2', // Added 'required_without' rule
                    'obligee2' => 'required_without:obligee', // Added '
                    // 'address' => 'required',
                    // 'date_incorp' => 'required|Date',
                    // 'company_tin' => 'required|numeric',
                    // 'contact_person' => 'required',
                    // 'contact_no' => 'required',
                    // 'project' => 'required',
                    // 'contract_price' => 'required',
                    // 'email' => 'required|email',
                    // 'undertaking' => 'required',
                    // 'company_bgd' => 'required'
        ]);




        if ($validator->passes()) {

            if( $request->get('updateKYC') && !empty( $request->get('updateKYC'))) {
                $update_kyc = 'Yes';
            } else {
                $update_kyc = 'No';
            };

            $cocogen_bonds_quote = cocogen_bonds_quote::findorFail($request->get('trans_id'));
            $cocogen_bonds_quote->agent = $request->get('agent');
            $cocogen_bonds_quote->acode = !empty($request->get('acode')) ? $request->get('acode') : 0;
            $cocogen_bonds_quote->principal  = $request->get('principal');
            $cocogen_bonds_quote->obligee  = $request->get('obligee');
            $cocogen_bonds_quote->address = $request->get('address');
            $cocogen_bonds_quote->date_incorp = $request->get('date_incorp');
            $cocogen_bonds_quote->company_tin = $request->get('company_tin');
            $cocogen_bonds_quote->contact_person  = $request->get('contact_person');
            $cocogen_bonds_quote->contact_no = $request->get('contact_no');
            $cocogen_bonds_quote->project  = $request->get('project');
            $cocogen_bonds_quote->contract_price = str_replace(',', '', str_replace('Php', '', $request->get('contract_price')));;
            $cocogen_bonds_quote->undertaking  = $request->get('undertaking');
            $cocogen_bonds_quote->company_bgd  = $request->get('company_bgd');
            $cocogen_bonds_quote->email  = $request->get('email');
            $cocogen_bonds_quote->client_type = $request->get('client');
            $cocogen_bonds_quote->request_type  = $request->get('qrequest');
            $cocogen_bonds_quote->endorse_no = $request->get('endoresePolNo');
            $cocogen_bonds_quote->others  = $request->get('others');
            $cocogen_bonds_quote->update_kyc  = $update_kyc;
            $cocogen_bonds_quote->status  = 'Save';
            $cocogen_bonds_quote->updated_by  = auth()->user()->id;
            $cocogen_bonds_quote->save();

            $status_message = "Success! Changes was successfully saved.";

            return response()->json(['success'=>$status_message]);
    }

    if($request->get('qrequest') == 'Quotation'){
        $status_message='Success! Changes was successfully saved.';
        return response()->json(['success'=>$status_message]);
    }else{
        $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('agent'))) {

        $error_fld = "Agent";

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
     if (empty($request->get('company_bgd'))) {

        if (empty($error_fld))
        {
            $error_fld = "Company Background";
        }
        else
         {
            $error_fld =  $error_fld .", Company Background";
        }


    }

     if (empty($request->get('principal'))) {

        if (empty($error_fld))
        {
            $error_fld = "Principal";
        }
        else
         {
            $error_fld =  $error_fld .", Principal";
        }


    }

     if (empty($request->get('obligee'))) {

        if (empty($error_fld))
        {
            $error_fld = "Obligee";
        }
        else
         {
            $error_fld =  $error_fld .", Obligee";
        }


    }

     if (empty($request->get('address'))) {

        if (empty($error_fld))
        {
            $error_fld = "Address";
        }
        else
         {
            $error_fld =  $error_fld .", Address";
        }


    }

     if (empty($request->get('date_incorp'))) {

        if (empty($error_fld))
        {
            $error_fld = "Date of Incorporation";
        }
        else
         {
            $error_fld =  $error_fld .", Date of Incorporation";
        }


    }

     if (empty($request->get('company_tin'))) {

        if (empty($error_fld))
        {
            $error_fld = "Company TIN";
        }
        else
         {
            $error_fld =  $error_fld .", Company TIN";
        }


    }

     if (empty($request->get('contact_person'))) {

        if (empty($error_fld))
        {
            $error_fld = "Contact Person";
        }
        else
         {
            $error_fld =  $error_fld .", Contact Person";
        }


    }

     if (empty($request->get('contact_no'))) {

        if (empty($error_fld))
        {
            $error_fld = "Contact Number";
        }
        else
         {
            $error_fld =  $error_fld .", Contact Number";
        }


    }

     if (empty($request->get('project'))) {

        if (empty($error_fld))
        {
            $error_fld = "Project";
        }
        else
         {
            $error_fld =  $error_fld .", Project";
        }


    }

     if (empty($request->get('contract_price'))) {

        if (empty($error_fld))
        {
            $error_fld = "Contract Price";
        }
        else
         {
            $error_fld =  $error_fld .", Contract Price";
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

      if (empty($request->get('undertaking'))) {

        if (empty($error_fld))
        {
            $error_fld = "Undertaking";
        }
        else
         {
            $error_fld =  $error_fld .", Undertaking";
        }


    }

        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);
    }



    }


    public function getquotebondsrefresh(Request $request){
        return redirect()->back();
    }

    public function getbond_annualrate(Request $request){

                //it will get price if its id match with product id
        $p=cocogen_bonds_requirement::select('id')->where('id',$request->id)->first();

        return response()->json($p);

    }

    public function getbonds_lossxp($id){

               // Remove the leading ampersand if present
        // if ($queryString[0] === '&') {
        //         $queryString = substr($queryString, 1);
        //     }

        //     // Parse the query string
        //     parse_str($queryString, $params);
        //     dd($queryString);
        //     // Access the trans_id value
        //     $id = !empty($params['trans_id']) ? $params['trans_id'] :0;

        if(request()->ajax()) {

            $cocogen_bonds_lossxp = DB::table('cocogen_bonds_lossxp')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_lossxp)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="delete_lossxp btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }



    public function getbonds_owner($id)
    {

        // Access the trans_id value
        if(request()->ajax()) {

             $cocogen_bonds_owner = DB::table('cocogen_bonds_owner')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_owner)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_owner btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

        public function getbonds_principal($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_principal = DB::table('cocogen_bonds_principal')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_principal)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_principal btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }


        public function getbonds_guarantee($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_guarantee = DB::table('cocogen_bonds_guarantee')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_guarantee)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_guarantee btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

    public function getbonds_officer($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_officer = DB::table('cocogen_bonds_officer')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_officer)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_officer btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

    public function getbonds_collateral($id){
        if(request()->ajax()) {

             $cocogen_bonds_collateral = DB::table('cocogen_bonds_collateral')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_collateral)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_collateral btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

    public function getbonds_signer($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_cosigner = DB::table('cocogen_bonds_cosigner')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_cosigner)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_signer btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

    public function getbonds_projects1($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_projects = DB::table('cocogen_bonds_projects')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_projects)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_project1 btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

        public function getbonds_projects2($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_projects2 = DB::table('cocogen_bonds_projects2')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_projects2)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_project2 btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

        public function getbonds_attachment($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_attachment = DB::table('cocogen_bonds_attachment')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_attachment)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_attachment btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

        public function getbonds_financial($id){
        if(request()->ajax()) {

             $cocogen_bonds_financial = DB::table('cocogen_bonds_financial')->select('*')->where('transno',$id);
            return datatables()->of($cocogen_bonds_financial)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="delete_financial btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }


    // public function getbonds_quoterequirement($id) {
    //     $cocogen_bonds_quote_requirement = DB::table('cocogen_bonds_quote_requirement')
    //         ->select('*')
    //         ->where('transno', $id);

    //     return datatables()->of($cocogen_bonds_quote_requirement)
    //         ->addColumn('action', function($data) {
    //             $buttons = '';

    //             if (\Auth::user()->accountType == "Underwriter" && \Auth::user()->accountType != "Account Associates") {
    //                 $buttons .= '<button type="button" name="update" id="' . $data->id . '" class="update_requirement btn-primary btn-sm" data-toggle="modal" data-target="#updateranual"><span class="fa fa-pencil" aria-hidden="true"></span></button>';
    //                 $buttons .= '&nbsp;'; // Adding a space character
    //             }

    //             $buttons .= '<button type="button" name="edit2" id="' . $data->id . '" class="delete_requirement btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
    //             return $buttons;
    //         })
    //         ->rawColumns(['action'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }

public function getbonds_quoterequirement($id) {

    $cocogen_bonds_quote_requirement = DB::table('cocogen_bonds_quote_requirement')
        ->select('*')
        ->where('transno', $id);
    $cocogen_bonds_quote = cocogen_bonds_quote::select('status')->where('id',$id)->first();

      return datatables()->of($cocogen_bonds_quote_requirement)
        ->addColumn('action', function($data) use ($cocogen_bonds_quote) {
            $buttons = '';

            if(\Auth::user()->accountType != "Sales"){
            
                if ($cocogen_bonds_quote->status == "Submitted" && \Auth::user()->accountType == "Underwriter" ) {
                    $buttons .= '<button type="button" name="update" id="' . $data->id . '" class="update_requirement btn-primary btn-sm" data-toggle="modal" data-target="#updateranual"><span class="fa fa-pencil" aria-hidden="true"></span></button>';
                    $buttons .= '&nbsp;'; // Adding a space character

                }


            }else{
                if( $cocogen_bonds_quote->status == "Save" && \Auth::user()->accountType == "Sales"){
                    
                 $buttons .= '<button type="button" name="edit2" id="' . $data->id . '" class="delete_requirement btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                 }else{
                      if($cocogen_bonds_quote->status == "For Sales Review" && \Auth::user()->accountType == "Sales"){
                     $buttons .= '<button type="button" name="edit2" id="' . $data->id . '" class="delete_requirement btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>';
                     }
                 }
                  
            }
            return $buttons;
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
}


    public function  getbonds_requirement($id, $transno)
    {

        $cocogen_bonds_quote_requirement = cocogen_bonds_quote_requirement::where('id',$id)
                                            ->where('transno', $transno)->get();
        return Response::json($cocogen_bonds_quote_requirement);
    }

    public function getbonds_requirement_update(Request $request){
        $postedData = $request->input('value');
        parse_str($postedData, $dataArray);
        //OLD DATA
        $cocogen_get_org_financial = cocogen_bonds_quote_requirement::where('id',$dataArray['id'])->get();
        $bond_type_quote =$cocogen_get_org_financial[0]->bond_type;
        $old_bond_amount =$cocogen_get_org_financial[0]->bond_amt;
        $old_term_premium =$cocogen_get_org_financial[0]->term_premium;
        $old_proposed_retention =$cocogen_get_org_financial[0]->proposed_retention;
        $transno =$cocogen_get_org_financial[0]->transno;;

       // NEW DATA

        // Parse the URL-encoded string into an associative array

        // Get the value of 'prop_ret' from the associative array
        $p_rep = str_replace(',', '',$dataArray['prop_ret']);
        $b_amount_req = str_replace(',', '', $dataArray['bond_amt_req']);
        $annual_amount_req = str_replace(',', '', $dataArray['bonds_annual_prem_req']);
        $term_amount_req = str_replace(',', '', $dataArray['bonds_prem_req']);

        $cocogen_bonds_financial = cocogen_bonds_quote_requirement::updateOrCreate(
            ['id' => $dataArray['id']], // Search condition for existing record
            [ // Data to be updated or created
                'bonds_requirement' => $dataArray['req_bond'],
                'bond_amt'=>$b_amount_req,
                'proposed_retention'=>$p_rep,
                'annual_rate'=>$dataArray['bonds_annual_rate'],
                'annual_premium'=>$annual_amount_req,
                'term_premium' => $term_amount_req
            ]);



            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Change Request";
            $cocogen_bonds_historylogs->description ='Bond Type '.$bond_type_quote.' Bonds Amount from '.number_format($old_bond_amount,2).' to '.$dataArray['bond_amt_req'].' and Proposed Retention from '.number_format($old_proposed_retention,2).' to '.$dataArray['prop_ret'].' and Term Premium from'.number_format($old_term_premium,2).' to '.$dataArray['bonds_prem_req'];
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();

            return response()->json(['success'=>'Update']);

    }

    public function getbonds_allquote()
    {
        if(request()->ajax()) {

            $agent = \Auth::user()->name;
            $department = \Auth::user()->department;

            if (\Auth::user()->accountType == "Agent")
            {
                $cocogen_bonds_quote = DB::table('cocogen_view_bonds_approver2')->select('*')->where('agent',$agent)->orderByDesc('created_at')->get();
            }
            elseif (\Auth::user()->accountType == "Sales" || \Auth::user()->accountType == "Manager") {

                $cocogen_bonds_quote = DB::table('cocogen_view_bonds_approver2')->select('*')->where('department',$department)->orderByDesc('created_at')->get();
            }
            else
            {

                $cocogen_bonds_quote = cocogen_view_bonds_approver2::select('*')->orderByDesc('created_at')->get();

            }


            // $cocogen_bonds_quote = DB::table('cocogen_view_bonds_approver2')
            //                             ->select('id', 'transno', 'principal', 'agent', 'status', 'created_at', 'dt_submitted')
            //                             ->get();

            return datatables()->of($cocogen_bonds_quote)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit2" id="'.$data->id.'" class="view_quote btn btn-link"><span class="fa fa-search" aria-hidden="true"></span></button>';
                        return $button;
                    })
            ->make(true);
        }

    }

    public function getbonds_historylogs($id)
    {
        if(request()->ajax()) {

             $cocogen_bonds_historylogs = DB::table('cocogen_bonds_historylogs')->select('*')->where('transno',$id)->orderByDesc('id');
            return datatables()->of($cocogen_bonds_historylogs)
            ->make(true);
        }

    }

     public function addbonds_lossxp(Request $request){

        $rules = [
            'loss_xp' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


        $cocogen_bonds_lossxp= new cocogen_bonds_lossxp;
        $cocogen_bonds_lossxp->loss_xp = $request->get('loss_xp');
        $cocogen_bonds_lossxp->transno = $request->get('trans_id');
        $cocogen_bonds_lossxp->save();

        //Change Log

        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Loss Expercience";
            $cocogen_bonds_historylogs->description = $request->get('loss_xp');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }


        $status_message = "Success! Loss experience was successfully added.";

        return response()->json(['success'=>$status_message]);
    }
        $status_message = "Loss Expercience is required.";
        return response()->json(['error'=>$status_message]);

    }

     public function addbonds_owner(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'owner_name' => 'required',
            'owner_post' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_owner= new cocogen_bonds_owner;
        $cocogen_bonds_owner->owner_name = $request->get('owner_name');
        $cocogen_bonds_owner->owner_post = $request->get('owner_post');
        $cocogen_bonds_owner->transno = $request->get('trans_id');
        // $cocogen_bonds_owner->assured_no = $request->get('assured_no_owner');
        $cocogen_bonds_owner->save();





        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Owner";
            $cocogen_bonds_historylogs->description = $request->get('owner_name');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Owner was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Owner name and position are required.";
        return response()->json(['error'=>$status_message]);

    }

     public function addbonds_principal(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_type' => 'required',
            'id_no' => 'required',
            'principal_name' => 'required',
            'principal_post' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_principal= new cocogen_bonds_principal;
        $cocogen_bonds_principal->id_type = $request->get('id_type');
        $cocogen_bonds_principal->id_no = $request->get('id_no');
        $cocogen_bonds_principal->principal_name = $request->get('principal_name');
        $cocogen_bonds_principal->principal_post = $request->get('principal_post');
        $cocogen_bonds_principal->transno = $request->get('trans_id');
        $cocogen_bonds_principal->username= auth()->user()->name;
        $cocogen_bonds_principal->save();

        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Principal";
            $cocogen_bonds_historylogs->description = $request->get('principal_name');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Principal Signatory was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Pricipal ID Type, ID No., Name and Position are required.";
        return response()->json(['error'=>$status_message]);

    }

     public function addbonds_guarantee(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_type2' => 'required',
            'id_no2' => 'required',
            'guarantee_name' => 'required',
            'guarantee_post' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_guarantee= new cocogen_bonds_guarantee;
        $cocogen_bonds_guarantee->id_type2 = $request->get('id_type2');
        $cocogen_bonds_guarantee->id_no2 = $request->get('id_no2');
        $cocogen_bonds_guarantee->guarantee_name = $request->get('guarantee_name');
        $cocogen_bonds_guarantee->guarantee_post = $request->get('guarantee_post');
        $cocogen_bonds_guarantee->transno = $request->get('trans_id');
        $cocogen_bonds_guarantee->username= auth()->user()->name;
        $cocogen_bonds_guarantee->save();

        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Co-Signer - Guarantee";
            $cocogen_bonds_historylogs->description = $request->get('guarantee_name');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Co-Signer Guarantee was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "ID Type, ID No., Name and Designation are required.";
        return response()->json(['error'=>$status_message]);

    }


    public function addbonds_officer(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'officer_name' => 'required',
            'officer_post' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_officer= new cocogen_bonds_officer;
        $cocogen_bonds_officer->officer_name = $request->get('officer_name');
        $cocogen_bonds_officer->officer_post = $request->get('officer_post');
        $cocogen_bonds_officer->transno = $request->get('trans_id');
        $cocogen_bonds_officer->assured_no = $request->get('assured_no_office');
        $cocogen_bonds_officer->save();



        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = " Officer";
            $cocogen_bonds_historylogs->description = $request->get('officer_name');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }


        $status_message = "Success! Officer was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Officer name and position are required.";
        return response()->json(['error'=>$status_message]);

    }

    public function addbonds_collateral(Request $request){

        $validator = Validator::make($request->all(), [
            'collateral_type' => 'required',
            'collateral_item' => 'required',
            'collateral_value' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_collateral= new cocogen_bonds_collateral;
        $cocogen_bonds_collateral->collateral_type = $request->get('collateral_type');
        $cocogen_bonds_collateral->collateral_item = $request->get('collateral_item');
        $cocogen_bonds_collateral->collateral_value = str_replace(',', '', $request->get('collateral_value'));
        $cocogen_bonds_collateral->transno = $request->get('trans_id');
        $cocogen_bonds_collateral->save();

        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Collateral";
            $cocogen_bonds_historylogs->description ="Type: " . $request->get('collateral_type') . ", Item: " . $request->get('collateral_item') . ", Value: " .  $request->get('collateral_value') ;
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Collateral was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Collateral Type, Item and Value are required.";
        return response()->json(['error'=>$status_message]);

    }

    public function addbonds_signer(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cosigner_name' => 'required',
            'cosigner_property' => 'required',
            'cosigner_amt' => 'required',
        ]);


        if ($validator->passes()) {
            $cleanStringSize = str_replace(',', '', $request->get('cosigner_property_size'));
            $propertySize =preg_replace("/[^0-9.]+/", "", $cleanStringSize);

            $cleanStringAmt = str_replace(',', '', $request->get('cosigner_amt'));
            $consig_amount =preg_replace("/[^0-9.]+/", "", $cleanStringAmt);

        $cocogen_bonds_cosigner= new cocogen_bonds_cosigner;
        $cocogen_bonds_cosigner->cosigner_name = $request->get('cosigner_name');
        $cocogen_bonds_cosigner->cosigner_property = $request->get('cosigner_property');
        $cocogen_bonds_cosigner->cosigner_amt = $consig_amount;
        $cocogen_bonds_cosigner->transno = $request->get('trans_id');
        $cocogen_bonds_cosigner->cosigner_id_type = $request->get('cosigner_id_type');
        $cocogen_bonds_cosigner->cosigner_id_no = $request->get('cosigner_id_no');
        $cocogen_bonds_cosigner->cosigner_position = $request->get('cosigner_position');
        $cocogen_bonds_cosigner->cosigner_property_tct = !empty($request->get('cosigner_property_tct')) ? $request->get('cosigner_property_tct') :'';
        $cocogen_bonds_cosigner->cosigner_property_location = $request->get('cosigner_property_location');
        $cocogen_bonds_cosigner->cosigner_property_size = $propertySize;
        $cocogen_bonds_cosigner->save();

        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Co-Signer";
            $cocogen_bonds_historylogs->description = $request->get('cosigner_name');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Co-Signer was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Co-Signer Name, Property and Amount are required.";
        return response()->json(['error'=>$status_message]);

    }

    public function addbonds_projects1(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'project_name' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_projects= new cocogen_bonds_projects;
        $cocogen_bonds_projects->project_name = $request->get('project_name');
        $cocogen_bonds_projects->transno = $request->get('trans_id');
        $cocogen_bonds_projects->save();

        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Completed Project";
            $cocogen_bonds_historylogs->description = $request->get('project_name');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Project was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Porject name is required.";
        return response()->json(['error'=>$status_message]);

    }

        public function addbonds_projects2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'project_name2' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_projects2= new cocogen_bonds_projects2;
        $cocogen_bonds_projects2->project_name2 = $request->get('project_name2');
        $cocogen_bonds_projects2->transno = $request->get('trans_id');
        $cocogen_bonds_projects2->save();

        $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "On-Going Project";
            $cocogen_bonds_historylogs->description = $request->get('project_name2');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Project was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Porject name is required.";
        return response()->json(['error'=>$status_message]);

    }


    public function addbonds_attachment(Request $request){

        // $validator = Validator::make($request->all(), [
        //      'filename' => 'required|file|mimes:jpeg,pdf,ppt,doc,gif,PDF,doc,docx,csv,|max:5120',
        //     // 'filename' => 'required|file|mimes:jpg,JPEG,pdf,PDF,doc,docx,csv,txt,xlx,xlsx,xls,rar,zip,ppt,pptx,png,PNG,gif,tif|max:5120', // Maximum file size is 5MB (5120 kilobytes)
        // ]);

        $validator = Validator::make($request->all(), [
            'filename' => 'required|file|max:5120', // Maximum file size is 5MB (5120 kilobytes)
        ]);
        $requestparams = $request->all();

        $fileSize = $request->file('filename')->getSize();

        if ($fileSize > 5120000) { // 5120000 bytes = 5MB
            $status_message = "File size exceeds the maximum allowed (5MB).";
            return response()->json(['error' => $status_message]);
        }
        if ($validator->passes()) {


            $requestparams = $request->all();

            $cocogen_bonds_attachment= new cocogen_bonds_attachment;
            $cocogen_bonds_attachment->filename = $request->file('filename')->hashName();
            $cocogen_bonds_attachment->extension = $request->file('filename')->extension();
            $cocogen_bonds_attachment->filesize = $request->file('filename')->getSize();
            $cocogen_bonds_attachment->location = $request->file('filename')->store('public/bondsfiles');
            $cocogen_bonds_attachment->filename2 =$request->file('filename')->getClientOriginalName();
            $cocogen_bonds_attachment->transno = $requestparams['trans_id'];
            $cocogen_bonds_attachment->save();

            $status=$this->getbondsquote_status($request->get('trans_id'));

            if ($status == "For Sales Review")
            {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Attachment";
            $cocogen_bonds_historylogs->description = $request->file('filename')->getClientOriginalName();
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
            }

            $status_message = "File successfully uploaded.";
            return response()->json(['success' => $status_message]);
        }

        if ($request->hasFile('filename')) {
            $error_msg = "Invalid File! Only accept PDF and Doc files.";
        } else {
            $error_msg = "No file to upload";
        }

        $status_message = $error_msg;
        return response()->json(['error' => $status_message]);
    }

    public function addbonds_financial(Request $request){
        $validator = Validator::make($request->all(), [
            'financial_label' => 'required',
            'financial_label2' => 'required',
            // 'fin_amt' => 'required',
        ]);


        if ($validator->passes()) {


            $trans_id = $request->get('trans_id');
            $cocogen_bonds_financial = cocogen_bonds_financial_years::updateOrCreate(
                ['trans_id' => $trans_id], // Search condition for existing record
                [ // Data to be updated or created
                    'assets' => $request->get('asset'),
                    'assets_previous' => $request->get('asset_previous'),
                    'gross_income' => $request->get('gross_income'),
                    'gross_income_previous' => $request->get('gross_income_previous'),
                    'liabilities' => $request->get('liabilities'),
                    'liabilities_previous' => $request->get('liabilities_previous'),
                    'net_income' => $request->get('net_income'),
                    'net_income_previous' => $request->get('net_income_previous'),
                    'networth' => $request->get('networth'),
                    'networth_previous' => $request->get('networth_previous'),
                    'paid_up_capital' => $request->get('paid_up_capital'),
                    'paid_up_capital_previous' => $request->get('paid_up_capital_previous'),
                    'retained' => $request->get('retained'),
                    'retained_previous' => $request->get('retained_previous'),
                    'financial_label' => $request->get('financial_label'),
                    'financial_label2' => $request->get('financial_label2'),
                    'username' => auth()->user()->name
                ]
            );


        $status = $this->getbondsquote_status($trans_id);

        if ($status == "For Sales Review") {
            $cocogen_bonds_historylogs = new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Financial Highlights";
            $cocogen_bonds_historylogs->description = "Type: ".$request->get('fin_type').", Year: ".$request->get('fin_year').", Amount: ".$request->get('fin_amt');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $trans_id;
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Item was successfully added.";

        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Financial Type, Year and Amount are required.";
        return response()->json(['error'=>$status_message]);

    }


    public function addbonds_financialremarks(Request $request){

        $validator = Validator::make($request->all(), [
            'fin_remarks' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_financial_remarks= new cocogen_bonds_financial_remarks;
        $cocogen_bonds_financial_remarks->remarks = $request->get('fin_remarks');
        $cocogen_bonds_financial_remarks->username = auth()->user()->name;
        $cocogen_bonds_financial_remarks->transno = $request->get('trans_id');
        $cocogen_bonds_financial_remarks->save();

        $status_message = "Success! Remarks was successfully added.";


        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $quotestatus= $cocogen_bonds_quote_email[0]["status"];
        $remarks = $request->get('fin_remarks');
        $comment=0;
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);


        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Remarks is required.";
        return response()->json(['error'=>$status_message]);

    }

    public function addbonds_comments(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'txt_comment' => 'required',
        ]);


        if ($validator->passes()) {

        $cocogen_bonds_remarks= new cocogen_bonds_remarks;
        $cocogen_bonds_remarks->remarks = $request->get('txt_comment');
        $cocogen_bonds_remarks->username = auth()->user()->name;
        $cocogen_bonds_remarks->transno = $request->get('trans_id');
        $cocogen_bonds_remarks->save();

        $status_message = "Success! Comment was successfully added.";


        $cocogen_bonds_quote_email = cocogen_view_bonds_approver2::where('id', '=', $request->get('trans_id'))->get();
        $premium = $cocogen_bonds_quote_email[0]["premium"];
        $sum_insured = $cocogen_bonds_quote_email[0]["sum_insured"];
        $assured = $cocogen_bonds_quote_email[0]["principal"];
        $transno = $cocogen_bonds_quote_email[0]["transno"];
        $contractprice = $cocogen_bonds_quote_email[0]["contract_price"];
        $reqtype = $cocogen_bonds_quote_email[0]["request_type"];
        $quotestatus= $cocogen_bonds_quote_email[0]["status"];
        $comment = !empty($request->get('txt_comment')) ? $request->get('txt_comment') : '0';
        $remarks='0';
        $link = URL::to('/get-quote/bonds-quoteview').'/'.$request->get('trans_id');
        $this->emailbondautoquote($link, $assured, $premium, 'michael_gonzales@cocogen.com',$quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment);


        return response()->json(['success'=>$status_message]);


     }
        $status_message = "Comment is required.";

        return response()->json(['error'=>$status_message]);

    }

    public function addbonds_quoterequirement(Request $request){
        $validator = Validator::make($request->all(), [
            'bond_req' => 'required_without:bond_req2', // Added 'required_without' rule
            'bond_req2' => 'required_without:bond_req', // Added 'required_without' rule
            'bond_amount' => 'required',
            'annual_rate' => 'required',
            'annual_premium' => 'required',
            'date_bterm1' => 'required',
            'date_bterm2' => 'required',
            'term_premium' => 'required',
            'bonds_requirement' => 'required',
            'proposed_retention' => 'required',
        ]);

        if ($validator->passes()) {
        $bond_req = $request->get('bond_req');
        $bond_req2 = $request->get('bond_req2');
        $req_bond = !empty($bond_req) ? $bond_req : $bond_req2;
        $bond_amount =preg_replace("/[^0-9.]+/", "", $request->get('bond_amount'));


        $cocogen_bonds__quote_requirement = new cocogen_bonds_quote_requirement;
        $cocogen_bonds__quote_requirement->bond_type = $req_bond;
        $cocogen_bonds__quote_requirement->bond_amt = str_replace(',', '', $bond_amount);
        $cocogen_bonds__quote_requirement->annual_rate = str_replace(',', '', $request->get('annual_rate'));
        $cocogen_bonds__quote_requirement->annual_premium = preg_replace("/[^0-9.]+/", "", $request->get('annual_premium'));
        $cocogen_bonds__quote_requirement->effective_date = $request->get('date_bterm1');
        $cocogen_bonds__quote_requirement->expiry_date = $request->get('date_bterm2');
        $cocogen_bonds__quote_requirement->bond_term=  $request->get('date_bterm1')." - ". $request->get('date_bterm2');
        $cocogen_bonds__quote_requirement->bond_retention= "0.00";
        $cocogen_bonds__quote_requirement->term_premium = str_replace(',', '', $request->get('term_premium'));
        $cocogen_bonds__quote_requirement->policy_type= !empty($request->get('policy_type')) ? $request->get('policy_type') : $request->get('policy_val');
        $cocogen_bonds__quote_requirement->account_type= !empty($request->get('account_type')) ? $request->get('account_type') : $request->get('account_type_val');
        $cocogen_bonds__quote_requirement->multiplier= $request->get('multiplier');
        $cocogen_bonds__quote_requirement->proposed_retention =preg_replace("/[^0-9.]+/", "", $request->get('proposed_retention'));
        $cocogen_bonds__quote_requirement->bonds_requirement = preg_replace("/[^0-9.]+/", "", $request->get('bonds_requirement'));
        $cocogen_bonds__quote_requirement->transno = $request->get('trans_id');
        $cocogen_bonds__quote_requirement->save();

       $status=$this->getbondsquote_status($request->get('trans_id'));

        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Bond Requirement";
            $cocogen_bonds_historylogs->description = "Type :".$req_bond.", Annual Rate: ".$request->get('annual_rate').", Premium: ".$request->get('term_premium');
            $cocogen_bonds_historylogs->action = "Add";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $request->get('trans_id');
            $cocogen_bonds_historylogs->save();
        }

        $status_message = "Success! Bond requirement was successfully added.";
        $totalAnnualPremium = cocogen_bonds_quote_requirement::where('transno', $request->get('trans_id'))->sum('bond_amt');

        return response()->json(['success'=>$status_message,'totalanualprem'=>$totalAnnualPremium]);


     }
         $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($req_bond)) {

        $error_fld = "Bond Requirement Type";

    }

     if (empty($request->get('bond_amount'))) {

        if (empty($error_fld))
        {
            $error_fld = "Bond Amount";
        }
        else
         {
            $error_fld =  $error_fld .", Bond Amount";
        }


    }

     if (empty($request->get('annual_rate'))) {

        if (empty($error_fld))
        {
            $error_fld = "Annual Rate";
        }
        else
         {
            $error_fld =  $error_fld .", Annual Rate";
        }


    }

     if (empty($request->get('annual_premium'))) {

        if (empty($error_fld))
        {
            $error_fld = "Annual Premium";
        }
        else
         {
            $error_fld =  $error_fld .", Annual Premium";
        }


    }

     if (empty($request->get('date_bterm1'))) {

        if (empty($error_fld))
        {
            $error_fld = "Effective Date";
        }
        else
         {
            $error_fld =  $error_fld .", Effective Date";
        }


    }

     if (empty($request->get('date_bterm2'))) {

        if (empty($error_fld))
        {
            $error_fld = "Expiry Date";
        }
        else
         {
            $error_fld =  $error_fld .", Expiry Date";
        }


    }

     if (empty($request->get('term_premium'))) {

        if (empty($error_fld))
        {
            $error_fld = "Term Premium";
        }
        else
         {
            $error_fld =  $error_fld .", Term Premium";
        }


    }

        $status_message = $error_msg . $error_fld;

        return response()->json(['error'=>$status_message]);

    }

public function  deletebonds_lossxp($id, $transno)
{

    $lossxp = cocogen_bonds_lossxp::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Loss Expercience";
            $cocogen_bonds_historylogs->description = $lossxp[0]["loss_xp"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_lossxp = cocogen_bonds_lossxp::where('id',$id)->delete();

    return Response::json($cocogen_bonds_lossxp);
}

public function  deletebonds_owner($id, $transno)
{

    $owner = cocogen_bonds_owner::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Owner";
            $cocogen_bonds_historylogs->description = $owner[0]["owner_name"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_owner = cocogen_bonds_owner::where('id',$id)->delete();

    return Response::json($cocogen_bonds_owner);
}

public function  deletebonds_principal($id, $transno)
{

    $principal = cocogen_bonds_principal::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Principal";
            $cocogen_bonds_historylogs->description = $principal[0]["principal_name"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_principal = cocogen_bonds_principal::where('id',$id)->delete();

    return Response::json($cocogen_bonds_principal);
}

public function  deletebonds_guarantee($id, $transno)
{

    $guarantee = cocogen_bonds_guarantee::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Co-Signer - Guarantee";
            $cocogen_bonds_historylogs->description = $guarantee[0]["guarantee_name"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_guarantee = cocogen_bonds_guarantee::where('id',$id)->delete();

    return Response::json($cocogen_bonds_guarantee);
}


public function  deletebonds_officer($id, $transno)
{

    $officer = cocogen_bonds_officer::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Officer";
            $cocogen_bonds_historylogs->description = $officer[0]["officer_name"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_officer = cocogen_bonds_officer::where('id',$id)->delete();

    return Response::json($cocogen_bonds_officer);
}

public function  deletebonds_collateral($id, $transno)
{

        $collateral = cocogen_bonds_collateral::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Collateral";
            $cocogen_bonds_historylogs->description = "Item: ".$collateral[0]["collateral_item"].", Value: ".$collateral[0]["collateral_value"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_collateral = cocogen_bonds_collateral::where('id',$id)->delete();

    return Response::json($cocogen_bonds_collateral);
}

public function  deletebonds_signer($id, $transno)
{

    $cosigner = cocogen_bonds_cosigner::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Co-Signer";
            $cocogen_bonds_historylogs->description = $cosigner[0]["cosigner_name"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_cosigner = cocogen_bonds_cosigner::where('id',$id)->delete();

    return Response::json($cocogen_bonds_cosigner);
}


public function  deletebonds_projects1($id, $transno)
{

    $projects = cocogen_bonds_projects::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Completed Project";
            $cocogen_bonds_historylogs->description = $projects[0]["project_name"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_projects = cocogen_bonds_projects::where('id',$id)->delete();

    return Response::json($cocogen_bonds_projects);
}

public function  deletebonds_projects2($id, $transno)
{

    $projects2 = cocogen_bonds_projects2::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "On-Going Project";
            $cocogen_bonds_historylogs->description = $projects2[0]["project_name2"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_projects2 = cocogen_bonds_projects2::where('id',$id)->delete();

    return Response::json($cocogen_bonds_projects2);
}

public function  deletebonds_attachment($id, $transno)
{

    $attachment = cocogen_bonds_attachment::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Attachment";
            $cocogen_bonds_historylogs->description = $attachment[0]["filename2"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_attachment = cocogen_bonds_attachment::where('id',$id)->delete();

    return Response::json($cocogen_bonds_attachment);
}

public function  deletebonds_financial($id, $transno)
{

    $financial = cocogen_bonds_financial::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Financial Highlights";
            $cocogen_bonds_historylogs->description = "Type: ".$financial[0]["fin_type"].", Year: ".$financial[0]["fin_year"].", Amount: ".$financial[0]["fin_amt"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_financial = cocogen_bonds_financial::where('id',$id)->delete();

    return Response::json($cocogen_bonds_financial);
}

public function  deletebonds_financial_remarks($id)
{
    $cocogen_bonds_financial_remarks  = cocogen_bonds_financial_remarks::where('id',$id)->delete();
    return Response::json($cocogen_bonds_financial_remarks);
}

public function  deletebonds_comments($id)
{
    $cocogen_bonds_remarks  = cocogen_bonds_remarks::where('id',$id)->delete();
    return Response::json($cocogen_bonds_remarks);
}


public function getbonds_financial_remarks($id){


     $bonds_financial_remarks = cocogen_bonds_financial_remarks::where('transno',$id)
     ->select('cocogen_bonds_financial_remarks.*', 'cocogen_bonds_quote.status')
     ->leftJoin('cocogen_bonds_quote', 'cocogen_bonds_financial_remarks.transno', '=', 'cocogen_bonds_quote.id')
     ->orderByDesc('id')
     ->get();

    return view('getaquote.bonds.bonds_financial_remarks', compact('bonds_financial_remarks'));

}

public function getbonds_comments($id){


     $cocogen_bonds_remarks = cocogen_bonds_remarks::where('transno',$id)
     ->select('cocogen_bonds_remarks.*', 'cocogen_bonds_quote.status')
     ->leftJoin('cocogen_bonds_quote', 'cocogen_bonds_remarks.transno', '=', 'cocogen_bonds_quote.id')
     ->orderByDesc('id')
     ->get();

    return view('getaquote.bonds.bonds_comments', compact('cocogen_bonds_remarks'));

}

public function  deletebonds_quoterequirement($id, $transno)
{

    $requirement = cocogen_bonds_quote_requirement::where('id',$id)->get();

    $status=$this->getbondsquote_status($transno);
        if ($status == "For Sales Review")
        {
            $cocogen_bonds_historylogs= new cocogen_bonds_historylogs;
            $cocogen_bonds_historylogs->category = "Bond Requirement";
            $cocogen_bonds_historylogs->description = "Type: ".$requirement[0]["bond_type"].", Annual Rate: ".$requirement[0]["annual_rate"].", Premium: ".$requirement[0]["term_premium"];
            $cocogen_bonds_historylogs->action = "Delete";
            $cocogen_bonds_historylogs->user = auth()->user()->name;
            $cocogen_bonds_historylogs->transno = $transno;
            $cocogen_bonds_historylogs->save();
        }

    $cocogen_bonds_quote_requirement = cocogen_bonds_quote_requirement::where('id',$id)->delete();

    return Response::json($cocogen_bonds_quote_requirement);
}

    public function getbondsquote_status($id)
    {


        $cocogen_bonds_quote = cocogen_bonds_quote::where('id', '=', $id)->get();
        $quote_status = $cocogen_bonds_quote[0]["status"];

        return $quote_status;
    }

    public function getbondslogin()
    {
         User::create([
            'name' => 'Sales HO',
            'email' => 'sales_ho@cocogen.com',
            'password' => Hash::make('cocog#n'),
        ]);


        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();


        $cocogen_meta = cocogen_meta::where('page', '=', "Bonds Quotation")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.login.login', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'metadescription' => $metadescription,'keyword' => $keyword]);
    }

 public   function getcheckbondslogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:5'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {

        return redirect()->to('/get-quote/bonds-home');

     }
     else
     {
      return back()->with('error', 'Invalid Email or Password.');
     }

    }

      public  function  getcheckbondslogout()
    {

        Auth::logout();

        return redirect()->to('/epolicy');
    }

    public function emailbondautoquote($link, $assured, $premium, $email, $quotestatus,$transno,$contractprice,$reqtype,$sum_insured,$remarks,$comment) {
        $data = array('link'=>$link, 'assured'=>$assured, 'premium'=>$premium, 'email'=>$email, 'quotestatus'=> $quotestatus,'transno'=> $transno,'contractprice'=> $contractprice,'reqtype'=> $reqtype,'sum_insured'=>$sum_insured,'remarks'=>$remarks,'comment'=>$comment);
        Mail::send('emailtemplate.bonds_auto_quote', $data, function($message) use ($link,$assured, $premium,$email,$quotestatus,$transno,$sum_insured,$remarks,$comment)
          {
            $message->to($email, 'COCOGEN')->subject('New Request Received – Bonds Auto Quote Transaction No. :'.$transno.' Status :'.$quotestatus)
                ->cc('larren_aguilar@cocogen.com'); // to change no email provided
                    // ->cc(['larren.aguilar@gmail.com','rene_paciente@cocogen.com']);
          });
    }


    public function downloadBond($filename,$txnid){

            $s ="\'";
            $s2 = substr($s, 0,1);
            //$slash = substr($s2,0, -1);
            $files = cocogen_bonds_attachment::where('id', '=', $txnid)->get();
            $file_path = "/var/www/html/cocogen/storage/app/" .$files['0']['location'];

          return response()->file($file_path);
    }

        public function getquotebondspremium(Request $request){

        $validator = Validator::make($request->all(), [

            'date_bterm1' => 'required_without:bonds_term_req_a',
            'bonds_term_req_a' => 'required_without:date_bterm1',
            'date_bterm2' => 'required_without:bonds_term_req_b',
            'bonds_term_req_b' => 'required_without:date_bterm2',
            'bond_type' => 'required_without:bond_req,bond_req2',
            'bond_req' => 'required_without_all:bond_req2,bond_type',
            'bond_req2' => 'required_without_all:bond_req,bond_type',
            'bond_amount' => 'required_without:bond_amt_req',
            'bond_amt_req' => 'required_without:bond_amount',

        ]);
        $bond_req = $request->get('bond_req');
        $bond_req2 = $request->get('bond_req2');
        $req_bondfirst = !empty($bond_req) ? $bond_req : $bond_req2;
        $req_bond = !empty($req_bondfirst) ? $req_bondfirst :  $request->get('bond_type');

        if ($validator->passes()) {

        $tdate = !empty($request->get('date_bterm1')) ? $request->get('date_bterm1') : $request->get('bonds_term_req_a');
        $fdate = !empty($request->get('date_bterm2')) ? $request->get('date_bterm2') : $request->get('bonds_term_req_b');
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $amount_bond =!empty($request->get('bond_amount')) ? $request->get('bond_amount') : $request->get('bond_amt_req');
        $sum_insured_clean = str_replace(',', '', $amount_bond);
        $sum_insured =preg_replace("/[^0-9.]+/", "", $sum_insured_clean);

        $ds_rate = "0.125";
        $vat_rate = "0.12";
        $multiplier = "2.000";

        $lgt_rate = cocogen_lgt::where('department',auth()->user()->department)->get();
        $table_rate = cocogen_bond_rates::where('amount1', '<=', $sum_insured)
        ->where('amount2', '>=', $sum_insured)
        ->get();

        //$lgt_rate = "0.500";

        $interval = $datetime1->diff($datetime2);
        $no_days = $interval->format('%a');

        $multiplier = floatval($no_days)/365;
            $policy_type= !empty( $request->get('policy_type')) ? $request->get('policy_type') :  $request->get('policy_field');
        if ( floatval($multiplier)< 1 && $policy_type == "main"){
            $multiplier = "1.000";
        }
        if ($req_bond == "Bidders"){
            $rate = "0.48";
            $annual_premium = (floatval($sum_insured) * floatval($multiplier) * floatval($rate))/100;

        }
        elseif ($req_bond == "Performance"){

            if (floatval($sum_insured) > 100000.00 && floatval($sum_insured) < 300000.00){

                $rate = "0.288";
                $annual_premium = 1104.00 + ((floatval($sum_insured)-100000.00) * floatval($multiplier) * floatval($rate))/100;
            }
            elseif (floatval($sum_insured) >= 300000.00){

                $rate = "0.55";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            else
            {

                $rate = $table_rate[0]["perf"];
                $annual_premium = (floatval($sum_insured) * floatval($multiplier) * floatval($rate))/100;

            }
        }
        elseif ($req_bond == "Warranty"){

            if(floatval($sum_insured) > 500000.0 && ($request->get('account_type') == "anchor_smc" || $request->get('account_type') == "bdoi")){

                $rate = "0.55";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) >= 500000.00 && ($request->get('account_type') == "marsh_cola")){

                $rate = "0.50";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) >= 500000.00 && ($request->get('account_type') == "marsh_regular")){

                $rate = "0.60";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif (floatval($sum_insured) > 150000.00 && floatval($sum_insured) < 1000000.00){

                $rate = "0.288";
                $annual_premium = 2376.00 + ((floatval($sum_insured)-150000.00) * floatval($multiplier) * floatval($rate))/100;
            }
            elseif (floatval($sum_insured) >= 1000000.00){

                $rate = "0.50";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            else
            {

                $rate = $table_rate[0]["gwb"];
                $annual_premium = (floatval($sum_insured) * floatval($multiplier) * floatval($rate))/100;

            }
        }
        elseif ($req_bond == "Heirs"){

            if(floatval($sum_insured) > 500000.0 && ($request->get('account_type') == "anchor_smc" || $request->get('account_type') == "bdoi")){

                $rate = "0.55";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) >= 500000.00 && ($request->get('account_type') == "marsh_cola")){

                $rate = "0.50";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) >= 500000.00 && ($request->get('account_type') == "marsh_regular")){

                $rate = "0.60";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif (floatval($sum_insured) > 150000.00){

                $rate = "0.288";
                $annual_premium_compute = ((floatval($sum_insured)-150000.00) *  floatval($rate))/100 + 2376.00 ;
                $annual_premium = $annual_premium_compute * floatval($multiplier);
            }
            else
            {

                $rate = $table_rate[0]["gwb"];
                $annual_premium = (floatval($sum_insured) * floatval($multiplier) * floatval($rate))/100;

            }
        }
        elseif ($req_bond == "Surety DP"){

            if(floatval($sum_insured) > 500000.00 && ($request->get('account_type') == "anchor_smc")){

                $rate = "0.55";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) > 500000.00 && ($request->get('account_type') == "bdoi")){

                $rate = "0.60";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) >= 1000000.0 && ($request->get('account_type') == "security_services")){

                $rate = "0.60";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) > 500000.00 && ($request->get('account_type') == "marsh_cola")){

                $rate = "0.80";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) > 500000.00 && ($request->get('account_type') == "marsh_regular")){

                $rate = "0.60";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif (floatval($sum_insured) > 200000.00 && floatval($sum_insured) < 1000000.00){

                $rate = "0.288";
                $annual_premium = 4128.00 + ((floatval($sum_insured)-200000.00) * floatval($multiplier) * floatval($rate))/100;
            }
            elseif (floatval($sum_insured) >= 1000000.00){

                $rate = "0.65";

                $annual_premium = (floatval($sum_insured) * floatval($multiplier) * floatval($rate))/100;

            }
            else
            {
                $rate = $table_rate[0]["surety"];
                $annual_premium = (floatval($sum_insured) * floatval($multiplier) * floatval($rate))/100;

            }
        }
        elseif ($req_bond == "Surety Combi"){

            if(floatval($sum_insured) > 500000.00 && ($request->get('account_type') == "anchor_smc")){

                $rate = "0.80";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) > 500000.00 && ($request->get('account_type') == "bdoi")){

                $rate = "0.80";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif(floatval($sum_insured) > 500000.00 && ($request->get('account_type') == "marsh_cola")){

                $rate = "0.80";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            elseif (floatval($sum_insured) > 200000.00 && floatval($sum_insured) < 1000000.00){

                $rate = "0.288";
                $annual_premium = 4128.00 + ((floatval($sum_insured)-200000.00) * floatval($multiplier) * floatval($rate))/100;
            }
            elseif (floatval($sum_insured) >= 1000000.00){

                $rate = "0.65";
                $annual_premium = (floatval($sum_insured)* floatval($multiplier) * floatval($rate))/100;

            }
            else
            {

                $rate = $table_rate[0]["surety"];
                $annual_premium = (floatval($sum_insured) * floatval($multiplier) * floatval($rate))/100;

            }
        }
        else
        {
           $rate = "0.48";
        }

        if ($annual_premium <= 500.00)
        {
            $annual_premium = 500.00;
        }

        $annual_premium_term = $annual_premium;
        $contract_contract = !empty($request->get('bonds_contract')) ? $request->get('bonds_contract') : $request->get('contract_field');
        $cleanString = str_replace(',', '', $contract_contract);
        $bonds_contract =preg_replace("/[^0-9.]+/", "", $cleanString);
        $b_amount = !empty($request->get('bond_amount')) ? $request->get('bond_amount') : $request->get('bond_amt_req');
        $cleanString2 = str_replace(',', '', $b_amount);
        $bonds_amount =preg_replace("/[^0-9.]+/", "", $cleanString2);


        $bond_req = $bonds_amount/$bonds_contract; // Keep two decimal places and remove thousand separators

        $percentage = $bond_req * 100;

        $bond_requiredment = $percentage.'%'; // Assuming 2 decimal places


        return response()->json(['multiplier'=>$multiplier,
        'annual_rate'=>$rate,
        'annual_premium'=>number_format($annual_premium,2),
        'annual_premium_term'=>number_format($annual_premium_term,2),
        'bond_required'=>$bond_requiredment

    ]);

    }


    $error_msg = "The following field is requried: ";

    $error_fld = "";

    if (empty($request->get('date_bterm1'))) {

        $error_fld = "Incept Date";

    }

     if (empty($request->get('date_bterm2'))) {

        if (empty($error_fld))
        {
            $error_fld = "Expiry Date";
        }
        else
         {
            $error_fld =  $error_fld .", Expiry Date";
        }


    }

     if (empty($request->get('bond_req'))) {

        if (empty($error_fld))
        {
            $error_fld = "Bond Requirement";
        }
        else
         {
            $error_fld =  $error_fld .", Bond Requirement";
        }

    }

     if (empty($request->get('bond_amount'))) {

        if (empty($error_fld))
        {
            $error_fld = "Bond Amount";
        }
        else
         {
            $error_fld =  $error_fld .", Bond Amount";
        }


    }

        $status_message = $error_msg . $error_fld;
        return response()->json(['error'=>$status_message]);


    }

    public function getquoteaccountbroker(Request $request) {
        if(strtolower($request->value) == 'regular'){
            $ids = [1, 2, 3, 4, 6];
        }elseif(strtolower($request->value)  == 'anchor_nonsmc'){
            $ids = [1,2,3,4,6];
        }elseif($strtolower($request->value)  == 'anchor_smc'){
            $ids = [1,2,3,4,5,6];
        }elseif(strtolower($request->value)  == 'bdoi'){
            $ids = [1,2,3,4,5,6];
        }elseif(strtolower($request->value)  == 'security_services'){
            $ids = [1,2,4];
        }elseif(strtolower($request->value)  == 'ra_9184'){
            $ids = [1,4,2,3,5];
        }elseif(strtolower($request->value)  == 'marsh_cola'){
            $ids = [1,2,3,5];
        }elseif(strtolower($request->value)  == 'marsh_regular'){
            $ids = [1,2,3,4];
        }else{
            $ids = [2];
        }



        $cocogen_bonds_requirement = cocogen_bonds_requirement::whereIN('id',$ids)
            ->orderBy('id')
            ->get();

        return response()->json($cocogen_bonds_requirement);
    }

    public function financial()
        {
            $users = users::select('*');
            return Datatables::of($users)->make(true);
        }


        public function financial_update(Request $request)
        {
            $user = users::find($request->pk);
            $user->{$request->name} = $request->value;
            $user->save();

            return response()->json(['success' => true]);
        }



     public function addbonds_distribution(Request $request){

        $input = $request->all();
        // Check if the trans_id exists in the database
        // $bondTsi = DB::where('trans_id', $input['trans_id'])->get();
       $bondTsi= cocogen_bonds_tsi::where('trans_id', $input['trans_id'])->get();
       $checkbonds= count($bondTsi);
       // Convert comma-formatted numbers to decimal numbers
    $removeCommas = function ($value) {
        return str_replace(',', '', $value);
    };

    $inForcePolicies = $removeCommas($request->get('in_force_policies'));
    $inForcePolicies1 = $removeCommas($request->get('in_force_policies1'));
    $inForcePolicies2 = $removeCommas($request->get('in_force_policies2'));


    $bondsApplied = $removeCommas($request->get('bonds_applied'));
    $bondsApplied1 = $removeCommas($request->get('bonds_applied1'));
    $bondsApplied2 = $removeCommas($request->get('bonds_applied2'));


    $expiredPolicies = $removeCommas($request->get('expired_policies'));
    $expiredPolicies1 = $removeCommas($request->get('expired_policies1'));
    $expiredPolicies2 = $removeCommas($request->get('expired_policies2'));


    $total = $removeCommas($request->get('total'));
    $total1 = $removeCommas($request->get('total1'));
    $total2 = $removeCommas($request->get('total2'));



    $total_1 = $removeCommas($request->get('total_1'));
    $total_2 = $removeCommas($request->get('total_2'));
    $total_3 = $removeCommas($request->get('total_3'));
    $total_4 = $removeCommas($request->get('total_4'));
    if ($checkbonds != 0) {
        // Update the existing record

        cocogen_bonds_tsi::where('trans_id', $input['trans_id'])->update([
            'in_force_policies' => $inForcePolicies,
            'in_force_policies1' => $inForcePolicies1,
            'in_force_policies2' => $inForcePolicies2,


            'bonds_applied' => $bondsApplied,
            'bonds_applied1' => $bondsApplied1,
            'bonds_applied2' => $bondsApplied2,

            'expired_policies' => $expiredPolicies,
            'expired_policies1' => $expiredPolicies1,
            'expired_policies2' => $expiredPolicies2,

            'total' => $total,
            'total1' => $total1,
            'total2' => $total2,
            // 'total3' => $total3,

            'total_1' => $total_1,
            'total_2' => $total_2,
            'total_3' => $total_3,
            'total_4' => $total_4
        ]);

        return response()->json(['message' => 'Bonds distribution updated successfully.']);
    } else {

        // Save a new record
        $cocogenBondsTsi = new cocogen_bonds_tsi;
        $cocogenBondsTsi->trans_id = $request->get('trans_id');
        $cocogenBondsTsi->in_force_policies = $inForcePolicies;
        $cocogenBondsTsi->in_force_policies1 = $inForcePolicies1;
        $cocogenBondsTsi->in_force_policies2 = $inForcePolicies2;

        $cocogenBondsTsi->bonds_applied = $bondsApplied;
        $cocogenBondsTsi->bonds_applied2 = $bondsApplied2;
        $cocogenBondsTsi->bonds_applied1 = $bondsApplied1;

        $cocogenBondsTsi->total = $total;
        $cocogenBondsTsi->total1 = $total1;
        $cocogenBondsTsi->total2 = $total2;

        $cocogenBondsTsi->total_1 = $total_1;
        $cocogenBondsTsi->total_2 = $total_2;
        $cocogenBondsTsi->total_3 = $total_3;
        $cocogenBondsTsi->total_4 = $total_4;

        $cocogenBondsTsi->expired_policies = $expiredPolicies;
        $cocogenBondsTsi->expired_policies1 = $expiredPolicies1;
        $cocogenBondsTsi->expired_policies2 = $expiredPolicies2;
        $cocogenBondsTsi->save();
    }
        return response()->json(['message' => 'Bonds distribution saved successfully.']);

    }

    public function get_obligee_api(Request $request) {
    // $cocogen_bonds_obligee = cocogen_bonds_obligee::orderbyDesc('obligee_name')->get();

    if ($request->has('existingValue') && $request->existingValue) {
        $cocogen_bonds_obligee = cocogen_bonds_obligee::orderByDesc('obligee_name')
            ->where('obligee_name', $request->existingValue)
            ->get();
    } else {

        $cocogen_bonds_obligee = cocogen_bonds_obligee::orderByDesc('obligee_name')
        ->get();
    }
    return response()->json($cocogen_bonds_obligee, 201);
    }

    public function get_obligee2_api(Request $request) {

        $cocogen_bonds_obligee2 = cocogen_bonds_obligee2::get();

        return response()->json($cocogen_bonds_obligee2, 201);
        }




    public function get_principal_api(Request $request) {
        $perPage = 10; // Number of results per page
        $query = !empty($request->input('query') ) ? $request->input('query') : $request->input('assured');

        $principalAPI = cocogen_bonds_principal_api::where('assured', 'like', '%' . $query . '%')
        ->paginate($perPage);
        //get  assured_no
        $checkAPI = cocogen_bonds_principal_api::select('assured_no')->where('assured', 'like', '%' . $query . '%')->get();


        //Check first
        $isExistingAssuredNo_owner = cocogen_bonds_owner::where('assured_no', $checkAPI[0]['assured_no'])->exists();

        $isExistingAssuredNo_officer = cocogen_bonds_officer::where('assured_no', $checkAPI[0]['assured_no'])->exists();

        if($isExistingAssuredNo_owner == false || $isExistingAssuredNo_officer==false ){
            $principalAPI = cocogen_bonds_principal_api::where('assured', 'like', '%' . $query . '%')
             ->paginate($perPage);
        }else{
            $principalAPI = cocogen_bonds_principal_api::join('cocogen_bonds_officer', function ($join) {
                $join->on('cocogen_bonds_principal_api.assured_no', '=', 'cocogen_bonds_officer.assured_no')
                    ->where('cocogen_bonds_officer.id', function ($subquery) {
                        $subquery->select(DB::raw('MAX(id)'))
                            ->from('cocogen_bonds_officer')
                            ->whereRaw('cocogen_bonds_officer.assured_no = cocogen_bonds_principal_api.assured_no');
                    });
            })
            ->join('cocogen_bonds_owner', function ($join) {
                $join->on('cocogen_bonds_principal_api.assured_no', '=', 'cocogen_bonds_owner.assured_no')
                    ->where('cocogen_bonds_owner.id', function ($subquery) {
                        $subquery->select(DB::raw('MAX(id)'))
                            ->from('cocogen_bonds_owner')
                            ->whereRaw('cocogen_bonds_owner.assured_no = cocogen_bonds_principal_api.assured_no');
                    });
            })
            ->where('cocogen_bonds_principal_api.assured', 'like', '%' . $query . '%')
            ->paginate($perPage);


        }

        return response()->json($principalAPI);

        }

        public function checktsi(Request $request){
            $trans = $request->trans_id;
            $tsi_check = cocogen_bonds_tsi::where('trans_id', $trans)->get();
                if ($tsi_check->isEmpty()) {
                    return "false";
                } else {
                    return "true";
                }

        }

        public function generate_issueonce(Request $request){
                // Get the existing record First Porocess
                $cocogen_bonds_quote = cocogen_bonds_quote::updateOrCreate(
                    ['id' => $request->trans_id], // Search condition for existing record
                    [ // Data to be updated or created
                        'copy_quotation_to_issued' => '1',

                    ]);


                $record = cocogen_bonds_quote::where('id', $request->trans_id)->first();
                // If the record exists, create a new record with the existing values
                if ($record) {
                    $newRecord = new cocogen_bonds_quote;
                    $newRecord->fill($record->toArray());
                    $newRecord->request_type = 'Issue Policy';
                    $newRecord->status = 'Save';
                    $newRecord->created_at = Carbon::now();
                    $newRecord->save();
                    $newId = $newRecord->id;
                    $checklist[] = 'save cocogen_bonds_quote';

                } else {
                    // do something
                }



                $cocogen_bonds_attachment = cocogen_bonds_attachment::where('transno', $request->trans_id)->get();
                foreach ($cocogen_bonds_attachment as $attachment) {
                    // Create a new record with the existing values
                    $newRecordAttachment = new cocogen_bonds_attachment;
                    $newRecordAttachment->fill($attachment->toArray());
                    $newRecordAttachment->transno = $newId;
                    $newRecordAttachment->created_at = Carbon::now();
                    $newRecordAttachment->save();

                    $checklist[] = 'save attatchment';
                }


                $cocogen_bonds_collateral = cocogen_bonds_collateral::where('transno', $request->trans_id)->get();

                foreach ($cocogen_bonds_collateral as $collateral) {
                    // Create a new record with the existing values
                    $newRecordcollateral = new cocogen_bonds_collateral;
                    $newRecordcollateral->fill($collateral->toArray());
                    $newRecordcollateral->transno = $newId;
                    $newRecordcollateral->created_at = Carbon::now();
                    $newRecordcollateral->save();

                    $checklist[] = 'save collateral';
                }


                $cocogen_bonds_cosigner = cocogen_bonds_cosigner::where('transno', $request->trans_id)->get();

                foreach ($cocogen_bonds_cosigner as $cosigner) {
                    // Create a new record with the existing values
                    $newRecordcosigner = new cocogen_bonds_cosigner;
                    $newRecordcosigner->fill($cosigner->toArray());
                    $newRecordcosigner->transno = $newId;
                    $newRecordcosigner->created_at = Carbon::now();
                    $newRecordcosigner->save();

                    $checklist[] = 'save cosigner';
                }


                $cocogen_bonds_financial_remarks = cocogen_bonds_financial_remarks::where('transno', $request->trans_id)->get();

                foreach ($cocogen_bonds_financial_remarks as $financial) {
                    // Create a new record with the existing values
                    $newRecordfinancial = new cocogen_bonds_financial_remarks;
                    $newRecordfinancial->fill($financial->toArray());
                    $newRecordfinancial->transno = $newId;
                    $newRecordfinancial->created_at = Carbon::now();
                    $newRecordfinancial->save();

                    $checklist[] = 'save financial';
                }


                $cocogen_bonds_guarantee = cocogen_bonds_guarantee::where('transno', $request->trans_id)->get();

                foreach ($cocogen_bonds_guarantee as $guarantee) {
                    // Create a new record with the existing values
                    $newRecordguarantee = new cocogen_bonds_guarantee;
                    $newRecordguarantee->fill($guarantee->toArray());
                    $newRecordguarantee->transno = $newId;
                    $newRecordguarantee->created_at = Carbon::now();
                    $newRecordguarantee->save();

                    $checklist[] = 'save guarantee';
                }


            $cocogen_bonds_lossxp = cocogen_bonds_lossxp::where('transno', $request->trans_id)->get();

            foreach ($cocogen_bonds_lossxp as $lossxp) {
                // Create a new record with the existing values
                $newRecordlossxp = new cocogen_bonds_lossxp;
                $newRecordlossxp->fill($lossxp->toArray());
                $newRecordlossxp->transno = $newId;
                $newRecordlossxp->created_at = Carbon::now();
                $newRecordlossxp->save();

                $checklist[] = 'save lossxp';
            }

            $cocogen_bonds_officer = cocogen_bonds_officer::where('transno', $request->trans_id)->get();

            foreach ($cocogen_bonds_officer as $lossxp) {
                // Create a new record with the existing values
                $newRecordofficer = new cocogen_bonds_officer;
                $newRecordofficer->fill($lossxp->toArray());
                $newRecordofficer->transno = $newId;
                $newRecordofficer->created_at = Carbon::now();
                $newRecordofficer->save();

                $checklist[] = 'save officer';
            }

            $cocogen_bonds_owner = cocogen_bonds_owner::where('transno', $request->trans_id)->get();

            foreach ($cocogen_bonds_owner as $owner) {
                // Create a new record with the existing values
                $newRecordowner = new cocogen_bonds_owner;
                $newRecordowner->fill($owner->toArray());
                $newRecordowner->transno = $newId;
                $newRecordowner->created_at = Carbon::now();
                $newRecordowner->save();

                $checklist[] = 'save owner';
            }

            $cocogen_bonds_principal = cocogen_bonds_principal::where('transno', $request->trans_id)->get();
            foreach ($cocogen_bonds_principal as $principal) {
                // Create a new record with the existing values
                $newRecordprincipal = new cocogen_bonds_principal;
                $newRecordprincipal->fill($principal->toArray());
                $newRecordprincipal->transno = $newId;
                $newRecordprincipal->created_at = Carbon::now();
                $newRecordprincipal->save();

                $checklist[] = 'save bond principal';
            }

            $cocogen_bonds_projects = cocogen_bonds_projects::where('transno', $request->trans_id)->get();
            foreach ($cocogen_bonds_projects as $proj) {
                // Create a new record with the existing values
                $newRecordproj = new cocogen_bonds_projects;
                $newRecordproj->fill($proj->toArray());
                $newRecordproj->transno = $newId;
                $newRecordproj->created_at = Carbon::now();
                $newRecordproj->save();

                $checklist[] = 'save bond_project';
            }

            $cocogen_bonds_quote_requirement = cocogen_bonds_quote_requirement::where('transno', $request->trans_id)->get();
            foreach ($cocogen_bonds_quote_requirement as $quotereq) {
                // Create a new record with the existing values
                $newRecordquotereq = new cocogen_bonds_quote_requirement;
                $newRecordquotereq->fill($quotereq->toArray());
                $newRecordquotereq->transno = $newId;
                $newRecordquotereq->created_at = Carbon::now();
                $newRecordquotereq->save();

                $checklist[] = 'save quote_requirement';
            }

            $cocogen_bonds_remarks = cocogen_bonds_remarks::where('transno', $request->trans_id)->get();
            foreach ($cocogen_bonds_remarks as $quotereq) {
                // Create a new record with the existing values
                $newRecordremark = new cocogen_bonds_remarks;
                $newRecordremark->fill($quotereq->toArray());
                $newRecordremark->transno = $newId;
                $newRecordremark->created_at = Carbon::now();
                $newRecordremark->save();

                $checklist[] = 'save remarks';
            }

       

            $cocogen_bonds_tsi = cocogen_bonds_tsi::where('trans_id', $request->trans_id)->get();
            foreach ($cocogen_bonds_tsi as $tsi) {
                // Create a new record with the existing values
                $newRecordtsi = new cocogen_bonds_tsi;
                $newRecordtsi->fill($tsi->toArray());
                $newRecordtsi->trans_id = $newId;
                $newRecordtsi->created_at = Carbon::now();
                $newRecordtsi->save();

                $checklist[] = 'save tsi';
            }

            $cocogen_bonds_financial_years = cocogen_bonds_financial_years::where('trans_id', $request->trans_id)->get();
            foreach ($cocogen_bonds_financial_years as $fsyear) {
                // Create a new record with the existing values
                $newRecordfy = new cocogen_bonds_financial_years;
                $newRecordfy->fill($fsyear->toArray());
                $newRecordfy->trans_id = $newId;
                $newRecordfy->created_at = Carbon::now();
                $newRecordfy->save();

                $checklist[] = 'save Financial Year';
            }

            $cocogen_bonds_projects2 = cocogen_bonds_projects2::where('transno', $request->trans_id)->get();
            foreach ($cocogen_bonds_projects2 as $proj2) {
                // Create a new record with the existing values
                $newRecordproj2 = new cocogen_bonds_projects2;
                $newRecordproj2->fill($proj2->toArray());
                $newRecordproj2->transno = $newId;
                $newRecordproj2->created_at = Carbon::now();
                $newRecordproj2->save();

                $checklist[] = 'save project 2';
            }
                return $checklist;
        }


}
