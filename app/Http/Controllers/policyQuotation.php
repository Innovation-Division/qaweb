<?php

namespace App\Http\Controllers;

use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_homepage_slider;
use App\Models\cocogen_admin_homepage_video;
use App\Models\cocogen_admin_ineedprotection;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_ecommerce;
use App\Models\cocogen_meta;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_cancerqr_trans;
use App\Models\cocogen_estimate_accesories;
use App\Models\cocogen_estimate_body_injury;
use App\Models\cocogen_estimate_compre_file;
use App\Models\cocogen_estimate_compre_file_mortgage;
use App\Models\cocogen_estimate_motorplus_historylogs;
use App\Models\cocogen_estimate_motor_add_car_info;
use App\Models\cocogen_estimate_motor_add_other_personal_info;
use App\Models\cocogen_estimate_motor_info;
use App\Models\cocogen_estimate_motor_personal_info;
use App\Models\cocogen_estimate_motor_rate;
use App\Models\cocogen_estimate_motor_rate_detail;
use App\Models\cocogen_estimate_motor_series;
use App\Models\cocogen_estimate_owndamage_rate;
use App\Models\cocogen_estimate_property_damage;
use App\Models\cocogen_estimate_summary;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class policyQuotation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){

            if(Auth::user() === null){
                 return redirect()->route('login');
            }
            $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
            $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
            $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
            $cocogen_admin_footer = cocogen_admin_footer::all();
            $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
            $alllink = "";
                if($cocogen_admin_productlinkthumbnail){
                    foreach ($cocogen_admin_productlinkthumbnail as $val) {
                        if(!$alllink){
                            $alllink = "'".$val->link."'";
                        }else{
                            $alllink = $alllink . "," . "'".$val->link."'" ;
                        }
                    }
                }
                if(count($cocogen_admin_productlinkthumbnail) > 0){
                    $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                        left outer join cocogen_admin_productlink as b on b.link = a.link
                        order by 1 desc
                         ');
                }else{
                    $results = "";
                }
                $metadescription = $cocogen_meta[0]["description"];
                $keyword = $cocogen_meta[0]["keyword"];
                $title = $cocogen_meta[0]["title"];

                if ($request->ajax()) {
                    if(Auth::user() === null){
                         return redirect()->route('login');
                    }else{
                    $user = auth()->user()->email;
                    }


    $user = Auth::user()->email;

    // $data = cocogen_estimate_motor_personal_info::select(
    //     DB::raw('CONCAT(cocogen_estimate_motor_personal_info.firstName, " ", cocogen_estimate_motor_personal_info.lastName) AS firstlast'),
    //     'cocogen_estimate_motor_personal_info.id',
    //     'cocogen_estimate_motor_personal_info.transno',
    //     DB::raw('DATE_FORMAT(cocogen_estimate_motor_personal_info.created_at, "%Y-%m-%d %H:%I:%s %p") AS formatted_created_at'),
    //     DB::raw('DATE_FORMAT(cocogen_estimate_motor_personal_info.updated_at, "%Y-%m-%d %H:%I:%s %p") AS formatted_updated_at'),


    //     'cocogen_estimate_motor_personal_info.status',
    //     'cocogen_estimate_motor_personal_info.disableAll',
    //     'cocogen_estimate_motor_personal_info.saveCondition',
    //     'cocogen_estimate_motor_personal_info.policyNo',
    //     'cocogen_estimate_motor_personal_info.quotationNo'
    //     ->where('cocogen_estimate_motor_personal_info.agent', '=', $user)
    //     ->orderBy('cocogen_estimate_motor_personal_info.id', 'desc')
    //     ->get();

    // return DataTables::of($data)
    //     ->addIndexColumn()
    //     ->addColumn('checkbox', '<input type="checkbox" name="pdr_checkbox[]" class="pdr_checkbox" value="" />')
    //     ->addColumn('action', function ($row) {
    //         $btn = '<button type="button" name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
    //         $btn .= '<button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</button>';
    //         $btn .= '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    //         return $btn;
    //     })
    //     ->rawColumns(['checkbox', 'action'])
    //     ->make(true);


            $data = cocogen_estimate_motor_personal_info::select(
                DB::raw('CONCAT(cocogen_estimate_motor_personal_info.firstName, " ", cocogen_estimate_motor_personal_info.lastName) AS firstlast'),
                'cocogen_estimate_motor_personal_info.id',
                'cocogen_estimate_motor_personal_info.transno',
                DB::raw('DATE_FORMAT(cocogen_estimate_motor_personal_info.created_at, "%Y-%m-%d %H:%I:%s %p") AS formatted_created_at'),
                DB::raw('DATE_FORMAT(cocogen_estimate_motor_personal_info.updated_at, "%Y-%m-%d %H:%I:%s %p") AS formatted_updated_at'),
                'cocogen_estimate_motor_personal_info.status',
                'cocogen_estimate_motor_personal_info.disableAll',
                'cocogen_estimate_motor_personal_info.saveCondition',
                'cocogen_estimate_motor_personal_info.policyNo',
                'cocogen_estimate_motor_personal_info.quotationNo'
            )
            ->where('cocogen_estimate_motor_personal_info.agent', '=', $user)
            ->orderBy('cocogen_estimate_motor_personal_info.id', 'desc')
            ->get();

            // Encrypt the 'id' in each row
            $data->transform(function ($row) {
            $row->encrypted_id = Crypt::encrypt($row->id);
            return $row;
            });

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('checkbox', '<input type="checkbox" name="pdr_checkbox[]" class="pdr_checkbox" value="" />')
            ->addColumn('action', function ($row) {
                $btn = '<button type="button" name="edit" id="'.$row->encrypted_id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $btn .= '<button type="button" name="delete" id="'.$row->encrypted_id.'" class="delete btn btn-primary btn-sm">Delete</button>';
                $btn .= '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
        }



            return view('getaquote.policy_display', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'results' => $results,'cocogen_admin_ineedprotection' => $cocogen_admin_ineedprotection,'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function getquote()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Get a Quote")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.getquote_policyQuote', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function reportsMotorNetRating(){
          if(Auth::user() === null){
                 return redirect()->route('login');
            }
            $cocogen_admin_footer = cocogen_admin_footer::all();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_meta = cocogen_meta::where('page', '=', "Get a Quote")->get();
            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];

            if(!empty(session('endDate')) && !empty(session('startDate')) && !empty(session('status'))){
                $enddate=strtotime(session('endDate'). ' + 1 days');
                $end = !empty(date('Y-m-d', $enddate)) ? date('Y-m-d', $enddate) : $end;

                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('.cocogen_estimate_motor_personal_info.created_at', '>=', session('startDate'))
                                                                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                                                                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                                                                ->where('.cocogen_estimate_motor_personal_info.created_at', '<=', $end)
                                                                ->where('cocogen_estimate_motor_personal_info.status', '=', session('status'))
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
            }elseif(empty(session('endDate')) && !empty(session('startDate')) && empty(session('status'))){
                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('.cocogen_estimate_motor_personal_info.created_at', '>=', session('startDate'))
                                                                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                                                                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
            }elseif(!empty(session('endDate')) && empty(session('startdate')) && empty(session('status'))){
                $enddate=strtotime(session('endDate'). ' + 1 days');
                $end = !empty(date('Y-m-d', $enddate)) ? date('Y-m-d', $enddate) : $end;
                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('.cocogen_estimate_motor_personal_info.created_at', '<=', $end)
                                                                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                                                                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
            }elseif(empty(session('endDate')) && empty(session('startDate')) && !empty(session('status'))){
                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('cocogen_estimate_motor_personal_info.status', '=', session('status'))
                                                                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                                                                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
            }elseif(!empty(session('endDate')) && !empty(session('startDate')) && empty(session('status'))){
                $enddate=strtotime(session('endDate'). ' + 1 days');
                $end = !empty(date('Y-m-d', $enddate)) ? date('Y-m-d', $enddate) : $end;
                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('.cocogen_estimate_motor_personal_info.created_at', '>=', session('startDate'))
                                                                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                                                                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                                                                ->where('.cocogen_estimate_motor_personal_info.created_at', '<=', $end)
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
            }elseif(!empty(session('endDate')) && empty(session('startDate')) && !empty(session('status'))){
                $enddate=strtotime(session('endDate'). ' + 1 days');
                $end = !empty(date('Y-m-d', $enddate)) ? date('Y-m-d', $enddate) : $end;
                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('cocogen_estimate_motor_personal_info.status', '=', session('status'))
                                                                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                                                                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                                                                ->where('.cocogen_estimate_motor_personal_info.created_at', '<=', $end)
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
            }elseif(empty(session('endDate')) && !empty(session('startDate')) && !empty(session('status'))){
                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('cocogen_estimate_motor_personal_info.status', '=', session('status'))
                                                                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                                                                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                                                                ->where('.cocogen_estimate_motor_personal_info.created_at', '>=', session('startDate'))
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
            }else{
                $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::orderBy('id', 'DESC')
                ->select('cocogen_estimate_motor_personal_info.*', 'users.name')
                ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin')
                ->get();
            }
            // return view('reports.motornetview', ['cocogen_admin_main' =>$cocogen_admin_main,'cocogen_admin_submain' =>$cocogen_admin_submain,'cocogen_admin_subchild' =>$cocogen_admin_subchild,'reports' =>$reports,'cocogen_estimate_motor_personal_info'=>$cocogen_estimate_motor_personal_info,'cocogen_admin_access' =>$cocogen_admin_access]);

            return view('getaquote.motornetview', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_estimate_motor_personal_info' =>$cocogen_estimate_motor_personal_info, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
        }

        public function exportMotorNetRating(Request $request){


            $start ="";
            $end  ="";
            $status="";

            $start = $request->has('start_date') ? date('Y-m-d', strtotime($request->get('start_date'))) : '1900-01-01';
            $end = $request->has('end_date') ? date('Y-m-d', strtotime($request->get('end_date') . ' + 1 days')) : '9999-01-01';
            $status = $request->has('status') ? $request->get('status') : null;
            session(['startDate' => $start, 'endDate' => $end, 'status' => $status]);
            if($request->get('refresh') === 'Generate'){
                $this->reportsMotorNetRating();
                return redirect()->route('reportMonitoringRate');
            }else{

    $query = cocogen_estimate_motor_personal_info::query()
    ->select([
        'cocogen_estimate_motor_personal_info.policyNo',
        'cocogen_estimate_motor_personal_info.quotationNo',
        'cocogen_estimate_motor_personal_info.status',
        'users.name',
        'cocogen_estimate_motor_personal_info.created_at',
        'cocogen_estimate_motor_personal_info.lastName',
        'cocogen_estimate_motor_personal_info.firstName',
        'cocogen_estimate_motor_personal_info.residenceAddress',
        'cocogen_estimate_motor_add_other_personal_info.birthDate',
        'cocogen_estimate_motor_add_other_personal_info.idNum',
        'cocogen_estimate_motor_add_other_personal_info.telNo',
        'cocogen_estimate_motor_personal_info.emailAddress',
        'cocogen_estimate_motor_add_car_info.policyInceptionDate',
        DB::raw('DATE_ADD(cocogen_estimate_motor_add_car_info.policyInceptionDate, INTERVAL 1 YEAR) as expiry'),
        'cocogen_estimate_motor_add_car_info.mortgageValue',
        'cocogen_estimate_motor_info.year',
        'cocogen_estimate_motor_info.brand',
        'cocogen_estimate_motor_info.model',
        'cocogen_estimate_motor_info.bodyType',
        'cocogen_estimate_motor_add_car_info.plateNo',
        'cocogen_estimate_motor_add_car_info.chasisNo',
        'cocogen_estimate_motor_add_car_info.engineNo',
        'cocogen_estimate_motor_add_car_info.chasisNo as chasisNo2',
        'cocogen_estimate_motor_add_car_info.mvFileNo',
        'cocogen_estimate_motor_info.perSeat',
        'cocogen_estimate_motor_add_car_info.color',
        'cocogen_estimate_motor_info.originalValueOfVehicle',
        'cocogen_estimate_motor_info.bodyInjury',
        'cocogen_estimate_motor_info.autoPersonalAccident',
        'cocogen_estimate_summary.deduction',
        'cocogen_estimate_motor_info.ownDamageCompute',
        'cocogen_estimate_motor_info.actOfNatureCompute',
        DB::raw('NULL as field_name1'),
        DB::raw('NULL as field_name2'),
        DB::raw('cocogen_estimate_motor_info.totalAccessory + cocogen_estimate_motor_info.valueOfVehicle AS suminsured'),
        'cocogen_estimate_motor_info.ownDamageCompute',
        'cocogen_estimate_motor_info.actOfNatureCompute',
        DB::raw('NULL as field_name3'),
        DB::raw('NULL as field_name4'),
        DB::raw('NULL as field_name5'),
        'cocogen_estimate_motor_info.vtplBodyInjury',
        'cocogen_estimate_motor_info.vtplPropertyDamage',
        DB::raw('NULL as field_name8'),
        'cocogen_estimate_summary.basePremium',
        'cocogen_estimate_summary.docStamps',
        'cocogen_estimate_summary.vat',
        'cocogen_estimate_summary.localGovernmentTax',
        'cocogen_estimate_summary.finalAmountDue'
    ])
    ->leftJoin('cocogen_estimate_summary', 'cocogen_estimate_summary.gid', '=', 'cocogen_estimate_motor_personal_info.transno')
    ->leftJoin('cocogen_estimate_motor_info', 'cocogen_estimate_motor_info.gid', '=', 'cocogen_estimate_motor_personal_info.transno')
    ->leftJoin('cocogen_estimate_motor_add_other_personal_info', 'cocogen_estimate_motor_add_other_personal_info.gid', '=', 'cocogen_estimate_motor_personal_info.transno')
    ->leftJoin('cocogen_estimate_motor_add_car_info', 'cocogen_estimate_motor_add_car_info.gid', '=', 'cocogen_estimate_motor_personal_info.transno')
    ->leftJoin('users', 'users.id', '=', 'cocogen_estimate_motor_personal_info.userLogin');

        if (!empty($start)) {
            $query->where('cocogen_estimate_motor_personal_info.created_at', '>=', $start);

        }

        if (!empty($end) && !empty($status)) {
            $enddate = strtotime($end . ' + 1 days');
            $end = date('Y-m-d', $enddate);

            $query->where(function ($q) use ($end) {
                $q->where('cocogen_estimate_motor_personal_info.created_at', '<=', $end);

            });
        }
        if (!is_null($status)) {
            $query->where('cocogen_estimate_motor_personal_info.status', '=', $status);
        }


        $data = $query->get();

    $csvFile = fopen('Report of Motor net rating '. date('Y-m-d').'.csv', 'w');

    // Write the header row
    $header = [
        'Ref Policy No',
        'Ref Invoice No',
        'Status',
        'Encoder',
        'Date Issued',
        'Insured SURNAME',
        'Insured FIRSTNAME',
        'Address',
        'Birthdate',
        'ID #',
        'Mobile No',
        'Email Add',
        'Inception',
        'Expiry',
        'Mortgagee',
        'Year',
        'Make',
        'Model',
        'Type of body',
        'Plate No',
        'CS No',
        'Engine No',
        'Chassis No',
        'MV File',
        'Seating',
        'Color',
        'FMV',
        'VTPL',
        'Auto PA SI',
        'Deductible',
        'with RSCC',
        'with AON',
        'RSCC FMV',
        'AON FMV',
        'Sum Insured',
        'OD/Theft Premium',
        'AON Premium',
        'RSMD Premium',
        'VTPL-BI Premium',
        'VTPL-PD Premium',
        'Auto PA Premium',
        'Basic Premium',
        'Doc Stamps',
        'VAT',
        'LGT',
        'Total Premium'

    ];
    fputcsv($csvFile, $header);

    foreach ($data as $row) {
        // Convert the row object to an array
        $rowData = $row->toArray();

        // Write the row to the CSV file
        fputcsv($csvFile, $rowData);
    }

    fclose($csvFile);

    return response()->download('Report of Motor net rating '.date('Y-m-d').'.csv');
}

        //     if($request->get('xls')){
        //         $type = "xls";
        //         if($request->get('start')){
        //             $start = $request->get('start');
        //         }else{
        //             $start = "";
        //         }

        //         if($request->get('end')){
        //         $end = $request->get('end');
        //         }else{
        //         $end = "";
        //         }

        //         if($request->get('status')){
        //             $status = $request->get('status');
        //         }else{
        //             $status = "";
        //         }
        //         return Excel::download(new PostsQueryExportMotorNetRating($start,$end,$status), 'Motor Net Rating Report.' . $type);

        //     }
        //     if($request->get('xlsx')){
        //         $type = "xlsx";
        //         if($request->get('start')){
        //             $start = $request->get('start');
        //         }else{
        //             $start = "";
        //         }

        //         if($request->get('end')){
        //         $end = $request->get('end');
        //         }else{
        //         $end = "";
        //         }

        //         if($request->get('status')){
        //             $status = $request->get('status');
        //         }else{
        //             $status = "";
        //         }

        //         return Excel::download(new PostsQueryExportMotorNetRating($start,$end,$status), 'Motor Net Rating Report.' . $type);
        //     }
        //     if($request->get('start')){
        //         session()->flash('startdate',$request->get('start'));
        //     }
        //     if($request->get('end')){
        //         session()->flash('enddate',$request->get('end'));
        //     }
        //     if($request->get('status')){
        //         session()->flash('status',$request->get('status'));
        //     }


        //     return back()->withInput();
        }



}
