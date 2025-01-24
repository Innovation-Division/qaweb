<?php

namespace App\Http\Controllers;

use App\Models\barangay;
use App\Models\cocogen_admin_blocked_agents_protech;
use Illuminate\Http\Request;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_compre_accessory;
use App\Models\cocogen_compre_bipd;
use App\Models\cocogen_estimate_body_injury;
use App\Models\cocogen_feedback_user_login;
use App\Models\cocogen_fmv;
use App\Models\cocogen_iga_transaction;
use App\Models\cocogen_meta;
use App\Models\cocogen_quotation_accessories_trans;
use App\Models\cocogen_quotation_trans;
use App\Models\cocogen_quotation_batch_trans;
use App\Models\cocogen_set_agent_code;
use App\Models\location;
use App\Models\cocogen_quotation_cocno;
use App\Models\cocogen_quotation_batch_note_uploads_updates;
use App\Models\tbl_giis_mc_make;
use App\Models\cocogen_users_agent_code;
use App\Models\vw_quotation_list;
use App\Models\cocogen_epartnerhub_notificatons;
use GuzzleHttp\Client;
use Carbon\Carbon;
use DB;
use PDF;
class QuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function quotations(Request $request) 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $transID4 = "";

        $cocogen_meta = cocogen_meta::where('page', '=', "E-POLICY")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        if (\Auth::user()->type === "C") {
            $pageTitle = "POLICYHOLDER | ";
        } elseif (\Auth::user()->type === "A") {
            $pageTitle = "ePartner | ";
        } else {
            $pageTitle = "E-POLICY | ";
        }
        $title = $pageTitle . "COCOGEN INSURANCE";
        $quotationsQuery = vw_quotation_list::query()->where('created_by', '=', \Auth::user()->email);
        $quotationsQuery = $quotationsQuery;
        if(!empty($request->search)){
            $search = $request->search;
        }else{
            $search = $request->q;
        }
        if($search) {
            $quotationsQuery = $quotationsQuery->where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE','%'.$search.'%')
                ->orWhere('quote_no', 'LIKE','%'.$search.'%')
                ->orWhere('response_policyNo', 'LIKE','%'.$search.'%')
                ->orWhere('last_name', 'LIKE','%'.$search.'%')
                ->orWhere('middle_name', 'LIKE','%'.$search.'%');
            });
        }
        info($request->selectQuotatio);
        $selectQuotation = '';
        if(!empty($request->status)){
            $selectQuotation = $request->status;
            $quotationsQuery = $quotationsQuery->where('status',  $selectQuotation );
        }else{
            if($request->selectQuotation) {
                if($request->selectQuotation !== "All"){
                    if($request->selectQuotation === 'Quoted') {
                        $selectQuotation = 'Quoted';
                    } else if($request->selectQuotation === 'Processing') {
                        $selectQuotation = 'Processing';
                    } else if($request->selectQuotation === 'Issued') {
                        $selectQuotation = 'Issued';
                    } else if($request->selectQuotation === 'Incomplete') {
                        $selectQuotation = 'Incomplete';
                    } else {
                        $selectQuotation = 'Drafts';
                    }
                    $quotationsQuery = $quotationsQuery->where('status',  $selectQuotation );
                }
            }
        }
        $quotations = $quotationsQuery->orderBy('created_at', 'desc')->paginate(10);

        
        $data = [
            'pagination' => [
                'total' => $quotations->total(),
                'per_page' => $quotations->perPage(),
                'current_page' => $quotations->currentPage(),
                'last_page' => $quotations->lastPage(),
                'from' => $quotations->firstItem(),
                'to' => $quotations->lastItem()
            ],
        ];

        $searchText = "";
       
        if($search) {
            $quoted = vw_quotation_list::where(function ($query)  use ($search)  {
                $query->where('first_name', 'LIKE','%'.$search.'%')
                ->orWhere('quote_no', 'LIKE','%'.$search.'%')
                ->orWhere('response_policyNo', 'LIKE','%'.$search.'%')
                ->orWhere('last_name', 'LIKE','%'.$search.'%')
                ->orWhere('middle_name', 'LIKE','%'.$search.'%');
            })->where('created_by', '=', \Auth::user()->email)->where('status', 'Quoted')->count();

            $proccessing = vw_quotation_list::where(function ($query)  use ($search)  {
                $query->where('first_name', 'LIKE','%'.$search.'%')
                ->orWhere('quote_no', 'LIKE','%'.$search.'%')
                ->orWhere('response_policyNo', 'LIKE','%'.$search.'%')
                ->orWhere('last_name', 'LIKE','%'.$search.'%')
                ->orWhere('middle_name', 'LIKE','%'.$search.'%');
            })->where('created_by', '=', \Auth::user()->email)->where('status', 'Processing')->count();

            $drafts = vw_quotation_list::where(function ($query)  use ($search)  {
                $query->where('first_name', 'LIKE','%'.$search.'%')
                ->orWhere('quote_no', 'LIKE','%'.$search.'%')
                ->orWhere('response_policyNo', 'LIKE','%'.$search.'%')
                ->orWhere('last_name', 'LIKE','%'.$search.'%')
                ->orWhere('middle_name', 'LIKE','%'.$search.'%');
            })->where('created_by', '=', \Auth::user()->email)->where('status', 'Drafts')->count();

            $issued = vw_quotation_list::where(function ($query)  use ($search)  {
                $query->where('first_name', 'LIKE','%'.$search.'%')
                ->orWhere('quote_no', 'LIKE','%'.$search.'%')
                ->orWhere('response_policyNo', 'LIKE','%'.$search.'%')
                ->orWhere('last_name', 'LIKE','%'.$search.'%')
                ->orWhere('middle_name', 'LIKE','%'.$search.'%');
            })->where('created_by', '=', \Auth::user()->email)->where('status', 'Issued')->count();

            $incomplete = vw_quotation_list::where(function ($query)  use ($search)  {
                $query->where('first_name', 'LIKE','%'.$search.'%')
                ->orWhere('quote_no', 'LIKE','%'.$search.'%')
                ->orWhere('response_policyNo', 'LIKE','%'.$search.'%')
                ->orWhere('last_name', 'LIKE','%'.$search.'%')
                ->orWhere('middle_name', 'LIKE','%'.$search.'%');
            })->where('created_by', '=', \Auth::user()->email)->where('status', 'Incomplete')->count();
            $searchText = $search;
        }else{
            $quoted = vw_quotation_list::where('status', 'Quoted')->where('created_by', '=', \Auth::user()->email)->count();
            $proccessing = vw_quotation_list::where('status', 'Processing')->where('created_by', '=', \Auth::user()->email)->count();
            $drafts = vw_quotation_list::where('status', 'Drafts')->where('created_by', '=', \Auth::user()->email)->count();
            $issued = vw_quotation_list::where('status', 'Issued')->where('created_by', '=', \Auth::user()->email)->count();
            $incomplete = vw_quotation_list::where('status', 'Incomplete')->where('created_by', '=', \Auth::user()->email)->count();
        }

        return view('home.quotation', ['title' => $title,
         'searchText' => $searchText,
         'transID4' => $transID4,
         'metadescription' => $metadescription,
         'keyword' => $keyword,
         'cocogen_admin_footer' => $cocogen_admin_footer,
         'cocogen_admin_main' => $cocogen_admin_main,
         'cocogen_admin_submain' => $cocogen_admin_submain,
         'cocogen_admin_productlink' => $cocogen_admin_productlink,
         'cocogen_admin_subchild' => $cocogen_admin_subchild,
         'quotations' => $quotations,
         'data' => $data,
         'quoted' => $quoted,
         'proccessing' => $proccessing,
         'drafts' => $drafts,
         'issued' => $issued,
         'incomplete' => $incomplete,
         'selectQuotation' => $selectQuotation,]);
    }

    public function batchInsert() 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";
            cocogen_quotation_batch_note_uploads_updates::saving(function ($model) {
                // Generate and format the batchId
                $latestId = static::max('batchId');
                $newId = str_pad((int) $latestId + 1, 6, '0', STR_PAD_LEFT);
                $model->batchId = $newId;
            });
     
            // Ensure the initial record starts with '000000'
            cocogen_quotation_batch_note_uploads_updates::created(function ($model) {
                $model->update(['batchId' => '000000']);
            });
            $latestId = cocogen_quotation_batch_note_uploads_updates::max('batchId');
            $number = str_pad((int) $latestId + 1, 6, '0', STR_PAD_LEFT); 
        return view('home.quotation.batch', ['title' => $title, 'metadescription' => $metadescription,'number' => $number, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function singleInsert() 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        return view('home.quotation.single_client_info', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }


    public function getAQuote(Request $request) 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $trans_no = date('YmdHis');

        return view('home.quotation.quote', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'trans_no' => $trans_no]);
    }

    public function getAQuote2ndPage(Request $request) {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $accessories = cocogen_compre_accessory::get();
        $brands = cocogen_fmv::groupBy('brand')->get();
        $bi_amounts = cocogen_estimate_body_injury::select('amount')->get();
        if(empty($request->first_name )) {
            return redirect()->back();
        }

        return view('home.quotation.quote-2nd-page', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'accessories' => $accessories, 'data' => $request, 'brands' => $brands, 'bi_amounts' => $bi_amounts]);
    }

    public function quotation(Request $request) {
        
        $quotation = cocogen_quotation_trans::where('trans_no', $request->trans_no)->first();
       
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
            
            $amountAcct = 0;
            if(!empty($request->accessory)) {
                $accessories = $request->accessory;
                $accessories_value = $request->accessory_value;
                
                foreach ($accessories as $key => $accessory) {
                    if($accessories[$key] != null && $accessories_value[$key] != null) {
                        $amountAcct += $accessories_value[$key];
                    }
                }
            }
            $defaultValue = str_replace(",","",$request->total_value);
            $defaultValue = $defaultValue + $amountAcct;

            $bodilyInjuryPrem = cocogen_compre_bipd::where('amount', $request->bodily_injury . '.00')->first();
            $propertyDamagePrem = cocogen_compre_bipd::where('amount', $request->property_damage . '.00')->first();
            

            $deductible =  $defaultValue*0.005;
            if($deductible < 2000){
                $deductible = 2000;
            }

            $ODTheftPrem =  $defaultValue*0.0125;
            $netPrem = $propertyDamagePrem->pd + $bodilyInjuryPrem->bi + $ODTheftPrem;           

            if($request->aon === 'With Acts of Nature') {
                $actsOfNaturePrem =  $defaultValue*0.005;
                $netPrem =  $netPrem + $actsOfNaturePrem;
            }

            $dst = (ceil($netPrem/4)*0.5);
            $vat = $netPrem*0.12;
            $lgt = $netPrem*0.002;
            $totaltax = $dst + $vat + $lgt;
            $grossprem = $netPrem + $totaltax;

            $finalgrossprem =  $grossprem;
                      
            $deductible =  $defaultValue*0.005;
            if($deductible < 2000){
                $deductible = 2000;
            }

            $odpreemm = $defaultValue*0.75/100;
            $thpreemm = $defaultValue*0.5/100;
          
            $fmv = cocogen_fmv::where('brand', $request->brand)->where('year', $request->year)->where('model', $request->model)->first();

            $auto_pa = $fmv->capacitypass * 55000;
            if(count($quotation)>0) {
                $cocogen_quotation_trans = cocogen_quotation_trans::find($quotation->id);
            } else {
                $cocogen_quotation_trans = new cocogen_quotation_trans;
            }

            // $cocogen_quotation_trans->policy_no = $request->policy_no;
            $cocogen_quotation_trans->product = $request->product;
            $cocogen_quotation_trans->trans_no = $request->trans_no;
            $cocogen_quotation_trans->first_name = $request->first_name;
            $cocogen_quotation_trans->middle_name = $request->middle_name;
            $cocogen_quotation_trans->last_name = $request->last_name;
            $cocogen_quotation_trans->email_address = $request->email_address;
            $cocogen_quotation_trans->phone_number = $request->phone_number;
            $cocogen_quotation_trans->gender = $request->gender;
            $cocogen_quotation_trans->civil_status = $request->civil_status;
            $cocogen_quotation_trans->date_of_birth = $request->date_of_birth;
            $cocogen_quotation_trans->place_of_birth = $request->place_of_birth;
            $cocogen_quotation_trans->occupation = $request->occupation;
            $cocogen_quotation_trans->source_of_income = $request->source_of_income;
            $cocogen_quotation_trans->id_type = $request->id_type;
            $cocogen_quotation_trans->id_number = $request->id_number;
            $cocogen_quotation_trans->zip_code = $request->zip_code;
            $cocogen_quotation_trans->country = $request->country;
            $cocogen_quotation_trans->province = $request->province;
            $cocogen_quotation_trans->city = $request->city;
            $cocogen_quotation_trans->barangay = $request->barangay;
            $cocogen_quotation_trans->address = $request->address;
            if($request->perm_address) {
                $cocogen_quotation_trans->perm_zip_code = $request->perm_zip_code;
                $cocogen_quotation_trans->perm_province = $request->perm_province;
                $cocogen_quotation_trans->perm_city = $request->perm_city;
                $cocogen_quotation_trans->perm_barangay = $request->perm_barangay;
                $cocogen_quotation_trans->perm_address = $request->perm_address;
            } else {
                $cocogen_quotation_trans->perm_zip_code = $request->zip_code;
                $cocogen_quotation_trans->perm_province = $request->province;
                $cocogen_quotation_trans->perm_city = $request->city;
                $cocogen_quotation_trans->perm_barangay = $request->barangay;
                $cocogen_quotation_trans->perm_address = $request->address;
            }
            $cocogen_quotation_trans->vehicle_class = $request->vehicle_class;
            $cocogen_quotation_trans->brand = $request->brand;
            $cocogen_quotation_trans->year = $request->year;
            $cocogen_quotation_trans->model = $request->model;
            $cocogen_quotation_trans->mv_file = $request->mv_file;
            $cocogen_quotation_trans->plate_no = $request->plate_no;
            $cocogen_quotation_trans->engine_no = $request->engine_no;
            $cocogen_quotation_trans->body_type = $request->body_type;
            $cocogen_quotation_trans->color = $request->color;
            $cocogen_quotation_trans->chasis_no = $request->chasis_no;
            $cocogen_quotation_trans->total_value = $defaultValue;
            $cocogen_quotation_trans->quote_no = $request->quote_no;
            $cocogen_quotation_trans->deductible = $deductible;

            $cocogen_quotation_trans->net_premium = $netPrem;
            $cocogen_quotation_trans->plus = 0;
            $cocogen_quotation_trans->doc_stamps = $dst;
            $cocogen_quotation_trans->vat = $vat;
            $cocogen_quotation_trans->lgt = $lgt;
            $cocogen_quotation_trans->gross_premium = $finalgrossprem;
            $cocogen_quotation_trans->total_amount_due = $finalgrossprem;

            $cocogen_quotation_trans->od = $defaultValue;
            $cocogen_quotation_trans->od_prem = $odpreemm;
            $cocogen_quotation_trans->th = $defaultValue;
            $cocogen_quotation_trans->th_prem = $thpreemm;


            if($request->aon === 'With Acts of Nature') {
                $actsOfNaturePrem =  $defaultValue*0.005;
                $cocogen_quotation_trans->aon = "Yes";
                $cocogen_quotation_trans->aon_prem = $actsOfNaturePrem;
                $cocogen_quotation_trans->aon_amount = $defaultValue;
            } else {
                $cocogen_quotation_trans->aon = "No";
                $cocogen_quotation_trans->aon_amount = 0;
                $cocogen_quotation_trans->aon_prem = 0;


            }
            $cocogen_quotation_trans->pa = $auto_pa;
            $cocogen_quotation_trans->market_value = $request->market_value;
            if($request->rscc === 'With RSCC') {
                $cocogen_quotation_trans->rscc_amount = $defaultValue;
                $cocogen_quotation_trans->rscc = "Yes";
            } else {
                $cocogen_quotation_trans->rscc = "No";
                $cocogen_quotation_trans->rscc_amount = 0;
            }
            
            $cocogen_quotation_trans->bodily_injury = $request->bodily_injury;
            $cocogen_quotation_trans->property_damage = $request->property_damage;
            $cocogen_quotation_trans->bi_prem = $bodilyInjuryPrem->bi;
            $cocogen_quotation_trans->pd_prem = $propertyDamagePrem->pd;
            $cocogen_quotation_trans->page = $request->page;
            $cocogen_quotation_trans->created_by = \Auth::user()->email;
            $cocogen_quotation_trans->status = 'Quoted';
            $cocogen_quotation_trans->updated_at = $datenow;
            $cocogen_quotation_trans->created_at = $datenow;
            $cocogen_quotation_trans->save();
            $id = $cocogen_quotation_trans->id;

            cocogen_quotation_accessories_trans::where('trans_no', $request->trans_no)->delete();

            if(!empty($request->accessory)) {
                $accessories = $request->accessory;
                $accessories_value = $request->accessory_value;

                foreach ($accessories as $key => $accessory) {
                    if($accessories[$key] != null && $accessories_value[$key] != null) {
                        $cocogen_quotation_accessories_trans = new cocogen_quotation_accessories_trans;
                        $cocogen_quotation_accessories_trans->trans_no = $request->trans_no;
                        $cocogen_quotation_accessories_trans->policy_no = '';
                        $cocogen_quotation_accessories_trans->accessory = $accessories[$key];
                        $cocogen_quotation_accessories_trans->value = $accessories_value[$key];
                        $cocogen_quotation_accessories_trans->save();
                    }
                }
            }
            if($id){
                    $cocogen_epartnerhub_notificatons = new cocogen_epartnerhub_notificatons;
                    $cocogen_epartnerhub_notificatons->name = "Quoted - ". $request->trans_no;
                    $cocogen_epartnerhub_notificatons->description =  $request->trans_no .' has been created.';
                    $cocogen_epartnerhub_notificatons->link = 'quotation/get-a-quote/quote/' . $request->trans_no;
                    $cocogen_epartnerhub_notificatons->status = "Unread";
                    $cocogen_epartnerhub_notificatons->email = \Auth::user()->email;
                    $cocogen_epartnerhub_notificatons->created_at = $datenow;
                    $cocogen_epartnerhub_notificatons->updated_at = $datenow;
                    $cocogen_epartnerhub_notificatons->save();
            }
        

        return response()->json(['message' => 'success']);
    }

    public function quote($id) {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();

        return view('home.quotation.quotation', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'quotation' => $quotation]);
    }

    public function saveAsDraft(Request $request) 
    {
        $quotation = cocogen_quotation_trans::where('trans_no', $request->trans_no)->first();

        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        if($quotation) {

            $cocogen_quotation_trans = cocogen_quotation_trans::find($quotation->id);
            $cocogen_quotation_trans->quote_no = str_pad($quotation->id, 6, '0', STR_PAD_LEFT);
            $cocogen_quotation_trans->policy_no = $request->policy_no;
            $cocogen_quotation_trans->product = $request->product;
            $cocogen_quotation_trans->trans_no = $request->trans_no;
            $cocogen_quotation_trans->first_name = $request->first_name;
            $cocogen_quotation_trans->middle_name = $request->middle_name;
            $cocogen_quotation_trans->last_name = $request->last_name;
            $cocogen_quotation_trans->email_address = $request->email_address;
            $cocogen_quotation_trans->phone_number = $request->phone_number;
            $cocogen_quotation_trans->gender = $request->gender;
            $cocogen_quotation_trans->civil_status = $request->civil_status;
            $cocogen_quotation_trans->date_of_birth = $request->date_of_birth;
            $cocogen_quotation_trans->place_of_birth = $request->place_of_birth;
            $cocogen_quotation_trans->occupation = $request->occupation;
            $cocogen_quotation_trans->source_of_income = $request->source_of_income;
            $cocogen_quotation_trans->id_type = $request->id_type;
            $cocogen_quotation_trans->id_number = $request->id_number;
            $cocogen_quotation_trans->zip_code = $request->zip_code;
            $cocogen_quotation_trans->country = $request->country;
            $cocogen_quotation_trans->province = $request->province;
            $cocogen_quotation_trans->city = $request->city;
            $cocogen_quotation_trans->barangay = $request->barangay;
            $cocogen_quotation_trans->address = $request->address;
            if($request->perm_address) {
                $cocogen_quotation_trans->perm_zip_code = $request->perm_zip_code;
                $cocogen_quotation_trans->perm_province = $request->perm_province;
                $cocogen_quotation_trans->perm_city = $request->perm_city;
                $cocogen_quotation_trans->perm_barangay = $request->perm_barangay;
                $cocogen_quotation_trans->perm_address = $request->perm_address;
            } else {
                $cocogen_quotation_trans->perm_zip_code = $request->zip_code;
                $cocogen_quotation_trans->perm_province = $request->province;
                $cocogen_quotation_trans->perm_city = $request->city;
                $cocogen_quotation_trans->perm_barangay = $request->barangay;
                $cocogen_quotation_trans->perm_address = $request->address;
            }
            $cocogen_quotation_trans->vehicle_class = $request->vehicle_class;
            $cocogen_quotation_trans->brand = $request->brand;
            $cocogen_quotation_trans->year = $request->year;
            $cocogen_quotation_trans->model = $request->model;
            $cocogen_quotation_trans->mv_file = $request->mv_file;
            $cocogen_quotation_trans->plate_no = $request->plate_no;
            $cocogen_quotation_trans->engine_no = $request->engine_no;
            $cocogen_quotation_trans->body_type = $request->body_type;
            $cocogen_quotation_trans->color = $request->color;
            $cocogen_quotation_trans->chasis_no = $request->chasis_no;
            $cocogen_quotation_trans->total_value = $request->total_value;
            $cocogen_quotation_trans->bodily_injury = $request->bodily_injury;
            $cocogen_quotation_trans->property_damage = $request->property_damage;
            $cocogen_quotation_trans->aon = $request->aon;
            $cocogen_quotation_trans->rscc = $request->rscc;
            $cocogen_quotation_trans->market_value = $request->market_value;
            $cocogen_quotation_trans->quote_no = $request->quote_no;
            $cocogen_quotation_trans->page = $request->page;
            $cocogen_quotation_trans->status = 'Drafts';
            $cocogen_quotation_trans->created_by = \Auth::user()->email;
            $cocogen_quotation_trans->updated_at = $datenow;
            $cocogen_quotation_trans->save();
            $id = $cocogen_quotation_trans->id;

            cocogen_quotation_accessories_trans::where('trans_no', $request->trans_no)->delete();

            if(!empty($request->accessory)) {
                $accessories = $request->accessory;
                $accessories_value = $request->accessory_value;

                foreach ($accessories as $key => $accessory) {
                    if($accessories[$key] != null && $accessories_value[$key] != null) {
                        $cocogen_quotation_accessories_trans = new cocogen_quotation_accessories_trans;
                        $cocogen_quotation_accessories_trans->trans_no = $request->trans_no;
                        $cocogen_quotation_accessories_trans->policy_no = '';
                        $cocogen_quotation_accessories_trans->accessory = $accessories[$key];
                        $cocogen_quotation_accessories_trans->value = $accessories_value[$key];
                        $cocogen_quotation_accessories_trans->save();
                    }
                }
            }

            if($id){
                    $cocogen_epartnerhub_notificatons = new cocogen_epartnerhub_notificatons;
                    $cocogen_epartnerhub_notificatons->name = "Drafts - ". $request->trans_no;
                    $cocogen_epartnerhub_notificatons->description =  $request->trans_no .' has been created.';
                    $cocogen_epartnerhub_notificatons->link = '/quotation/get-a-quote/edit-first-page/' . $request->trans_no;
                    $cocogen_epartnerhub_notificatons->status = "Unread";
                    $cocogen_epartnerhub_notificatons->email = \Auth::user()->email;
                    $cocogen_epartnerhub_notificatons->created_at = $datenow;
                    $cocogen_epartnerhub_notificatons->updated_at = $datenow;
                    $cocogen_epartnerhub_notificatons->save();
            }

        } else {

            $cocogen_quotation_trans = new cocogen_quotation_trans;
            $cocogen_quotation_trans->policy_no = $request->policy_no;
            $cocogen_quotation_trans->product = $request->product;
            $cocogen_quotation_trans->trans_no = $request->trans_no;
            $cocogen_quotation_trans->first_name = $request->first_name;
            $cocogen_quotation_trans->middle_name = $request->middle_name;
            $cocogen_quotation_trans->last_name = $request->last_name;
            $cocogen_quotation_trans->email_address = $request->email_address;
            $cocogen_quotation_trans->phone_number = $request->phone_number;
            $cocogen_quotation_trans->gender = $request->gender;
            $cocogen_quotation_trans->civil_status = $request->civil_status;
            $cocogen_quotation_trans->date_of_birth = $request->date_of_birth;
            $cocogen_quotation_trans->place_of_birth = $request->place_of_birth;
            $cocogen_quotation_trans->occupation = $request->occupation;
            $cocogen_quotation_trans->source_of_income = $request->source_of_income;
            $cocogen_quotation_trans->id_type = $request->id_type;
            $cocogen_quotation_trans->id_number = $request->id_number;
            $cocogen_quotation_trans->zip_code = $request->zip_code;
            $cocogen_quotation_trans->country = $request->country;
            $cocogen_quotation_trans->province = $request->province;
            $cocogen_quotation_trans->city = $request->city;
            $cocogen_quotation_trans->barangay = $request->barangay;
            $cocogen_quotation_trans->address = $request->address;
            if($request->perm_address) {
                $cocogen_quotation_trans->perm_zip_code = $request->perm_zip_code;
                $cocogen_quotation_trans->perm_province = $request->perm_province;
                $cocogen_quotation_trans->perm_city = $request->perm_city;
                $cocogen_quotation_trans->perm_barangay = $request->perm_barangay;
                $cocogen_quotation_trans->perm_address = $request->perm_address;
            } else {
                $cocogen_quotation_trans->perm_zip_code = $request->zip_code;
                $cocogen_quotation_trans->perm_province = $request->province;
                $cocogen_quotation_trans->perm_city = $request->city;
                $cocogen_quotation_trans->perm_barangay = $request->barangay;
                $cocogen_quotation_trans->perm_address = $request->address;
            }
            $cocogen_quotation_trans->vehicle_class = $request->vehicle_class;
            $cocogen_quotation_trans->brand = $request->brand;
            $cocogen_quotation_trans->year = $request->year;
            $cocogen_quotation_trans->model = $request->model;
            $cocogen_quotation_trans->mv_file = $request->mv_file;
            $cocogen_quotation_trans->plate_no = $request->plate_no;
            $cocogen_quotation_trans->engine_no = $request->engine_no;
            $cocogen_quotation_trans->body_type = $request->body_type;
            $cocogen_quotation_trans->color = $request->color;
            $cocogen_quotation_trans->chasis_no = $request->chasis_no;
            $cocogen_quotation_trans->total_value = $request->total_value;
            $cocogen_quotation_trans->bodily_injury = $request->bodily_injury;
            $cocogen_quotation_trans->property_damage = $request->property_damage;
            $cocogen_quotation_trans->aon = $request->aon;
            $cocogen_quotation_trans->rscc = $request->rscc;
            $cocogen_quotation_trans->market_value = $request->market_value;
            $cocogen_quotation_trans->quote_no = $request->quote_no;
            $cocogen_quotation_trans->page = $request->page;
            $cocogen_quotation_trans->status = 'Drafts';
            $cocogen_quotation_trans->created_by = \Auth::user()->email;
            $cocogen_quotation_trans->created_at = $datenow;
            $cocogen_quotation_trans->updated_at = $datenow;
            $cocogen_quotation_trans->save();
            $id = $cocogen_quotation_trans->id;

            cocogen_quotation_accessories_trans::where('trans_no', $request->trans_no)->delete();
            if($id){
                    $cocogen_epartnerhub_notificatons = new cocogen_epartnerhub_notificatons;
                    $cocogen_epartnerhub_notificatons->name = "Drafts - ". $request->trans_no;
                    $cocogen_epartnerhub_notificatons->description =  $request->trans_no .' has been created.';
                    $cocogen_epartnerhub_notificatons->link = '/quotation/get-a-quote/edit-first-page/' . $request->trans_no;
                    $cocogen_epartnerhub_notificatons->status = "Unread";
                    $cocogen_epartnerhub_notificatons->email = \Auth::user()->email;
                    $cocogen_epartnerhub_notificatons->created_at = $datenow;
                    $cocogen_epartnerhub_notificatons->updated_at = $datenow;
                    $cocogen_epartnerhub_notificatons->save();
            }
            
            if(!empty($request->accessory)) {
                $accessories = $request->accessory;
                $accessories_value = $request->accessory_value;

                foreach ($accessories as $key => $accessory) {
                    if($accessories[$key] != null && $accessories_value[$key] != null) {
                        $cocogen_quotation_accessories_trans = new cocogen_quotation_accessories_trans;
                        $cocogen_quotation_accessories_trans->trans_no = $request->trans_no;
                        $cocogen_quotation_accessories_trans->policy_no = '';
                        $cocogen_quotation_accessories_trans->accessory = $accessories[$key];
                        $cocogen_quotation_accessories_trans->value = $accessories_value[$key];
                        $cocogen_quotation_accessories_trans->save();
                    }
                }
            }
        }

        return response()->json(['message' => 'success']);
    }

    public function getPolicy($id) 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $cocogen_quotation_trans = cocogen_quotation_trans::where('id', $id)->first();

        return view('home.quotation.quote', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_quotation_trans' => $cocogen_quotation_trans]);
    }

    public function getYear(Request $request) 
    {
        $years = cocogen_fmv::where('brand', $request->brand)->groupBy('year')->get();

        return response()->json($years);
    }

    public function getModel(Request $request)
    {
        $models = cocogen_fmv::where('brand', $request->brand)->where('year', $request->year)->groupBy('model')->get();

        return response()->json($models);
    }

    public function getCarValue(Request $request) 
    {

        $value = cocogen_fmv::where('brand', $request->brand)->where('year', $request->year)->where('model', $request->model)->max('amount');

        return response()->json($value);
    }

    public function getAQuoteEdit($id) 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();

        return view('home.quotation.edit-1st-page', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'quotation' => $quotation]);
    }

    public function issuePolicy($id) 
    {
        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();
        $cocogen_quotation_cocno = cocogen_quotation_cocno::where('id', '=', "1")->get();
        $lastc0c = $cocogen_quotation_cocno[0]['cocNo'];
        $lastc0c = $lastc0c + 1;

        $cocogen_quotation_cocno = cocogen_quotation_cocno::findorFail(1);
        $cocogen_quotation_cocno->cocNo = $lastc0c;
        $cocogen_quotation_cocno->save();


        $motor = cocogen_quotation_trans::find($quotation['id']);
        $motor->status = "Processing";
        $motor->save();

        $entrydate = date('Y-m-d', strtotime('+8 hours'));
        $cocogen_epartnerhub_notificatons = new cocogen_epartnerhub_notificatons;
        $cocogen_epartnerhub_notificatons->name = "Processing - " . $id;
        $cocogen_epartnerhub_notificatons->description = $id . ' is now processing for issuance.';
        $cocogen_epartnerhub_notificatons->link = 'quotation/view/' . $id;
        $cocogen_epartnerhub_notificatons->status = "Unread";
        $cocogen_epartnerhub_notificatons->email = \Auth::user()->email;;
        $cocogen_epartnerhub_notificatons->created_at = $entrydate;
        $cocogen_epartnerhub_notificatons->updated_at = $entrydate;
        $cocogen_epartnerhub_notificatons->save();

        if(count($quotation)>0){
            $assured = 0;
            $name = $quotation['last_name'] .", ".$quotation['first_name'];
            $name = strtoupper($name);
            $fname = strtoupper($quotation['first_name']);
            $lname = strtoupper($quotation['last_name']);
            $email = $quotation['email_address'];
            $contact = $quotation['phone_number'];
            $palceofbirth = $quotation['place_of_birth'];
            $address = $quotation['address']. "" .$quotation['barangay'] ." ".$quotation['city'].", ". $quotation['province'];
            $brand = $quotation['brand'];
            $model = $quotation['model'];
            $year = $quotation['year'];

    
            $origdate = strtotime($quotation['date_of_birth']);
            $date_month =  date("F", $origdate);
            $date_year =  date("Y", $origdate);
            $date_day =  date("d", $origdate);
            
            $SecurityCode = sha1("cocogenAPI".":". "cocogenAPI".":".$name);
            $client = new Client();
            $res = $client->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/check/assured', [
            'form_params' => [
                'Username' => 'cocogenAPI',
                'SecurityCode' => $SecurityCode,
                'name' => $name,
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'address' => $address,
                'date_month' => $date_month,
                'date_year' => $date_year,
                'date_day' => $date_day,
                ]
            ]);
            $contentsproduction = $res->getBody()->getContents();
            $data = json_decode($contentsproduction, true);

            if(!empty($data['TErrorMsg'])){
                    $client = new Client();
                    $resInsert = $client->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/insert/assured', [
                    'form_params' => [
                        'Username' => 'cocogenAPI',
                        'SecurityCode' => $SecurityCode,
                        'name' => $name,
                        'email' => $email,
                        'address' => $address,
                        'date_month' => $date_month,
                        'date_year' => $date_year,
                        'date_day' => $date_day,
                        'fname' => $fname,
                        'lname' => $lname,
                        'contact' => $contact,
                        'palceofbirth' => $palceofbirth,
                        ]
                    ]);
            
                    $contentsproductionInsert = $resInsert->getBody()->getContents();
                    $data_insert = json_decode($contentsproductionInsert, true);
                    $assured =  $data_insert;
            }else{
                $assured =  $data[0]['assd_no'];
            }

                            //check or insert brand
                $SecurityCodeCar = sha1("cocogenAPI".":". "cocogenAPI".":".strtoupper($brand));
                $clientcar = new Client();
                $rescar = $clientcar->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/checkAndInsert/car_company', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCodeCar,
                    'car' => strtoupper($brand),
                    ]
                ]);
                $contentscar = $rescar->getBody()->getContents();
                $datacarCode = json_decode($contentscar, true);

                $makename = "-";
                $makecode = 0;
                $cocogen_fmv = cocogen_fmv::where(strtoupper('brand'), '=', strtoupper($brand))
                        ->where('year', '=', $year)
                        ->where( str_replace("  "," ",strtoupper('model')), '=', str_replace("  "," ",strtoupper($model)) )
                        ->get();
                if(count($cocogen_fmv)>0){
                    $tbl_giis_mc_make = tbl_giis_mc_make::where('make_cd', '=',(int)$cocogen_fmv[0]['make_cd'])->get();
                    if(count($tbl_giis_mc_make)>0){
                        $makename = $tbl_giis_mc_make[0]["make"];
                    }
                  
                }
                $makename = trim($makename);
                $SecurityCodeMake = sha1("cocogenAPI".":". "cocogenAPI".":".strtoupper($makename));
                $clientMake = new Client();
                $resMake = $clientMake->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/checkAndInsert/make', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCodeMake,
                    'carCode' => $datacarCode,
                    'make' => strtoupper($makename),
                    ]
                ]);
                $brand = strtoupper($brand);
                $itemTitle = $year. ' ' . $brand;
                // $itemTitle  = $itemTitle ." ".strtoupper($makename);
                $contentsMake = $resMake->getBody()->getContents();
                $dataMakeCode = json_decode($contentsMake, true);

                $agent = 3546;
                $cocogen_users_agent_code = cocogen_users_agent_code::where('email', \Auth::user()->email)->orderBy('id', 'ASC')->first();
                if(count($cocogen_users_agent_code)>0){
                    $agent = $cocogen_users_agent_code['code'];
                }
                
                $incept = date("m/d/Y");
                $expiry=date('m/d/Y', strtotime('+1 year'));


                $BIpercentate = ($quotation['bi_prem']/$quotation['bodily_injury'])*100;
                $PDpercentate = ($quotation['pd_prem']/$quotation['property_damage'])*100;

                $AON = "";
                if($quotation['aon'] ==="Yes"){
                    $AONpercentate = ($quotation['aon_prem']/$quotation['total_value'])*100;
                    $AON = '{
                        "perilCd": 10,
                        "perilRate": '.$AONpercentate.',
                        "perilTsi": '.$quotation['total_value'].',
                        "perilPrem": '.$quotation['aon_amount'].'
                    },';
                }

                $RSCC = "";
                if($quotation['rscc'] ==="Yes"){
                    $RSCC = '{
                        "perilCd": 13,
                        "perilRate": 0,
                        "perilTsi": '.$quotation['total_value'].',
                        "perilPrem": 0
                    },';
                }


          
            $dta = '{
                "APIuserId": "CPI",
                "prio": "high",
                "system": "quotation-individual-MC",
                "requestType": "individual",
                "transid":'.$quotation['id'].',
                "userId": "CPI",
                "sublineCd": "MNP",
                "lineCd": "MC",
                "issCd": "HO",
                "intmNo": '.$agent.',
                "inceptDate": "'.$incept.'",
                "expiryDate": "'.$expiry.'",
                "assdNo": '.$assured.',
                "assdAddress": "'.$address.'",
                "refPolNo": "'.$quotation['id'].'-Ecommerce",
                "itemTitle": "2018LANCEREXGLS",
                "currency": "PHP",
                "currencyRt": 1.0,
                "paytTerm": "COD",
                "dueDate": "05/28/2023",
                "refInvNo": "140000045308088",
                "itemDesc": "'.$itemTitle.'",
                "itemDesc2": "'.strtoupper($makename).'",
                "motorNo": "456TSDRFHSDRFHD",
                "color": "-",
                "modelYear": "'.$year.'",
                "makeCd": '.$dataMakeCode.',
                "serialNo": "6577856TU7T87TI7T",
                "plateNo": "ABF-789",
                "sublineType": "CAR",
                "noPass": 4,
                "cocIssueDate": "06/01/2024",
                "mvFileNo": "8768766476tugy5",
                "carCompany": "'.$brand.'",
                "carVariant": "-",
                "cocAtcnNo": "12Q341231",
                "mvPremType": "CARDESC1",
                "mvType": "c",
                "regType": "r",
                "cocSerialNo": '.$lastc0c.',
                "coverageCd": 4,
                "regionCd": 15,
                "peril": [
                    {
                        "perilCd": 3,
                        "perilRate": 0.75,
                        "perilTsi": '.$quotation['total_value'].',
                        "perilPrem": '.$quotation['od_prem'].',
                        "deductible": [
                            {
                                "deductibleCd": "ECOM",
                                "deductibleAmt": '.$quotation['deductible'].'
                            }
                        ]
                    },
                    {
                        "perilCd": 4,
                        "perilRate": 0.5,
                        "perilTsi": '.$quotation['total_value'].',
                        "perilPrem": '.$quotation['th_prem'].'
                    },'.$AON.'
                    
                    {
                        "perilCd": 5,
                        "perilRate": '.$BIpercentate.',
                        "perilTsi": '.$quotation['bodily_injury'].',
                        "perilPrem": '.$quotation['bi_prem'].'
                    },
                    {
                        "perilCd": 6,
                        "perilRate": '.$PDpercentate.',
                        "perilTsi": '.$quotation['property_damage'].',
                        "perilPrem": '.$quotation['pd_prem'].'
                    },'.$RSCC.'
                    
                    {
                        "perilCd": 8,
                        "perilRate": 0,
                        "perilTsi": '.$quotation['pa'].',
                        "perilPrem": 0
                    }
                ],
                "invTax": [
                    {
                        "taxCd": 3,
                        "taxAmt": '.$quotation['doc_stamps'].'
                    },
                    {
                        "taxCd": 5,
                        "taxAmt": '.$quotation['lgt'].'
                    },
                    {
                        "taxCd": 8,
                        "taxAmt": '.$quotation['vat'].'
                    }
                    
                
                ]
            }';


            $hashKEY = 'test';
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json','hashKey' => $hashKEY ]
            ]);
            $responsepayment = $client->post(
                'http://136.239.248.124/queueingAPI/public/test',
                ['body' => $dta]
            );


            return redirect()->route('quotationlist')->with('success', 'Request for issuance is now processing.');
        }
     


       
    }

    public function getAQuote2ndPageEdit(Request $request, $id)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $accessories = cocogen_compre_accessory::get();
        $brands = cocogen_fmv::groupBy('brand')->get();
        $bi_amounts = cocogen_estimate_body_injury::select('amount')->get();

        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();

        $cocogen_quotation_trans = cocogen_quotation_trans::find($quotation->id);
        $cocogen_quotation_trans->quote_no = str_pad($quotation->id, 6, '0', STR_PAD_LEFT);
        $cocogen_quotation_trans->policy_no = $request->policy_no;
        $cocogen_quotation_trans->product = $request->product;
        $cocogen_quotation_trans->trans_no = $request->trans_no;
        $cocogen_quotation_trans->first_name = $request->first_name;
        $cocogen_quotation_trans->middle_name = $request->middle_name;
        $cocogen_quotation_trans->last_name = $request->last_name;
        $cocogen_quotation_trans->email_address = $request->email_address;
        $cocogen_quotation_trans->phone_number = $request->phone_number;
        $cocogen_quotation_trans->gender = $request->gender;
        $cocogen_quotation_trans->civil_status = $request->civil_status;
        $cocogen_quotation_trans->date_of_birth = $request->date_of_birth;
        $cocogen_quotation_trans->place_of_birth = $request->place_of_birth;
        $cocogen_quotation_trans->occupation = $request->occupation;
        $cocogen_quotation_trans->source_of_income = $request->source_of_income;
        $cocogen_quotation_trans->id_type = $request->id_type;
        $cocogen_quotation_trans->id_number = $request->id_number;
        $cocogen_quotation_trans->zip_code = $request->zip_code;
        $cocogen_quotation_trans->country = $request->country;
        $cocogen_quotation_trans->province = $request->province;
        $cocogen_quotation_trans->city = $request->city;
        $cocogen_quotation_trans->barangay = $request->barangay;
        $cocogen_quotation_trans->address = $request->address;
        if($request->perm_address) {
            $cocogen_quotation_trans->perm_zip_code = $request->perm_zip_code;
            $cocogen_quotation_trans->perm_province = $request->perm_province;
            $cocogen_quotation_trans->perm_city = $request->perm_city;
            $cocogen_quotation_trans->perm_barangay = $request->perm_barangay;
            $cocogen_quotation_trans->perm_address = $request->perm_address;
        } else {
            $cocogen_quotation_trans->perm_zip_code = $request->zip_code;
            $cocogen_quotation_trans->perm_province = $request->province;
            $cocogen_quotation_trans->perm_city = $request->city;
            $cocogen_quotation_trans->perm_barangay = $request->barangay;
            $cocogen_quotation_trans->perm_address = $request->address;
        }
        $cocogen_quotation_trans->created_by = \Auth::user()->email;
        $cocogen_quotation_trans->save();

        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();
        $accessories_trans = cocogen_quotation_accessories_trans::where('trans_no', $id)->get();

        return view('home.quotation.edit-2nd-page', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'accessories' => $accessories, 'brands' => $brands, 'bi_amounts' => $bi_amounts, 'quotation' => $quotation, 'accessories_trans' => $accessories_trans]);
    }

    public function viewQuotation($id) 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();

        return view('home.quotation.view', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'quotation' => $quotation]);
    }

    public function downloadPolicy($id)
    {
        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();
        $pdf = PDF::loadView('home.quotation.print', compact('quotation'));
        
        return $pdf->download($quotation->first_name.' '.$quotation->last_name.'.pdf');
    }

    public function sharePolicy($id)
    {
        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();
        $email = $request->email;

        $messageData = [
            'quotation' => $quotation,
            'data' => $request,
        ];

        Mail::send('home.quotation.email', $messageData, function($message) use($email){
            $message->to($email)->subject('Policy');
        });

        return back()->with('success', 'Success'); 
    }
}
