<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_epartnerhub_compre_trans;
use App\Models\cocogen_epartnerhub_compre_upload;
use App\Models\cocogen_epartnerhub_compre_accessorries;
use App\Models\cocogen_epartnerhub_policy_status;
use App\Models\cocogen_epartnerhub_personal_info;
use App\Models\cocogen_admin_branch;
use App\Models\cocogen_epartnerhub_compre_files;
use App\Models\cocogen_epolicy_dtl;
use App\Models\cocogen_compre_file;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Crazymeeks\Foundation\PaymentGateway\Options\Processor;
use Illuminate\Support\Facades\Hash;
use App\Models\cocogen_epartner_compre_file;
use Session;
use Mail;
use PDF;
use Storage;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_ctpl_coc_series;
use App\Models\cocogen_getquote_mvtypes;
use App\Models\cocogen_epartnerhub_personal_info_file;
use App\Models\cocogen_admin_emailtemplate;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_iga_maintenance_class_vehic;
use App\Models\cocogen_fmv;
use App\Models\tbl_giis_mc_make;
use App\Models\cocogen_api_policy_no;
use SoapClient;
use GuzzleHttp\Client;
use App\Models\users;
use App\Models\User;
use App\Models\cocogen_users_client_code;
use DB;

class epartnerhubcompre extends Controller
{
    function fetchbrand(Request $request)
    {
        $yearval = $request->get('yearval');
        $brandval = $request->get('brandval');
        $vehicClass = $request->get('vehicClass');
        $classType = "";
        if($request->get('vehicClass') === "Motorcycle"){
            $classType = "Motorcycle";
        }elseif($request->get('vehicClass') === "Sedan"){
            $classType = "Sedan";
        }elseif($request->get('vehicClass') === "SUV, AUV, Van, Pick Ups"){
            $classType = "Sedan";
        }elseif($request->get('vehicClass') === "Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "4-6 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "8-10 Wheelers Truck"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "4 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "6 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "8-12 Wheelers Trucks & Trailers"){
            $classType = "Trucks";
        }else{
            $classType = "Sedan";
        }

        $data = DB::table('cocogen_fmv')
            ->select('model')
            ->where('year', $yearval)
            ->where('brand', $brandval)
            ->where('car_type', $classType)
            ->where('amount', '<', 5000000)
            ->groupBy('model')
            ->get();
        $dependent = "model";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>' . ucfirst($dependent) . '*</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->model . '">' . $row->model . '</option>';
        }

        echo $output;
    }

    function fetchyear(Request $request)
    {
        $yearval = $request->get('yearval');
        $vehicClass = $request->get('vehicClass');
        $classType = "";
        if($request->get('vehicClass') === "Motorcycle"){
            $classType = "Motorcycle";
        }elseif($request->get('vehicClass') === "Sedan"){
            $classType = "Sedan";
        }elseif($request->get('vehicClass') === "SUV, AUV, Van, Pick Ups"){
            $classType = "Sedan";
        }elseif($request->get('vehicClass') === "Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "4-6 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "8-10 Wheelers Truck"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "4 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "6 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "8-12 Wheelers Trucks & Trailers"){
            $classType = "Trucks";
        }else{
            $classType = "Sedan";
        }

        $data = DB::table('cocogen_fmv')
            ->select('brand')
            ->where('year', $yearval)
            ->where('amount', '<', 5000000)
            ->where('car_type', $classType)
            ->groupBy('brand')
            ->get();
        $dependent = "brand";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>' . ucfirst($dependent) . '*</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->brand . '">' . $row->brand . '</option>';
        }

        echo $output;
    }
    function fetchmodel(Request $request)
    {
        $yearval = $request->get('yearval');
        $brandval = $request->get('brandval');
        $modelval = $request->get('modelval');
        $vehicClass = $request->get('vehicClass');

        $classType = "";
        if($request->get('vehicClass') === "Motorcycle"){
            $classType = "Motorcycle";
        }elseif($request->get('vehicClass') === "Sedan"){
            $classType = "Sedan";
        }elseif($request->get('vehicClass') === "SUV, AUV, Van, Pick Ups"){
            $classType = "Sedan";
        }elseif($request->get('vehicClass') === "Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "4-6 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "8-10 Wheelers Truck"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "4 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "6 Wheelers - Trucks"){
            $classType = "Trucks";
        }elseif($request->get('vehicClass') === "8-12 Wheelers Trucks & Trailers"){
            $classType = "Trucks";
        }else{
            $classType = "Sedan";
        }
        $output = "";
        $data = DB::table('cocogen_fmv')
            ->where('year', $yearval)
            ->where('brand', $brandval)
            ->where('model', $modelval)
            // ->where('car_type', $classType)
            ->get();
        if(count($data)>0){
            foreach ($data as $row) {
                $output = $row->amount;
            }
        }
        echo $output;
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
        $cocogen_epartnerhub_personal_info = cocogen_epartnerhub_personal_info::where('transno', '=', $txnid)->get();  
        return view('epartnerhub.ctpl.reauth.failed', ['title' => $title,'cocogen_epartnerhub_personal_infos' => $cocogen_epartnerhub_personal_info,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function reauthctplconsave(Request $request){  
        //dd($request);
        $dtnow = date('Y-m-d H:i:s');
        $cocogen_epartnerhub_personal_info = cocogen_epartnerhub_personal_info::where('transno', '=', $request->get('txnid'))->get();
                            
            if(count($cocogen_epartnerhub_personal_info)> 0){
                $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::where('id', '=', "1")->get();
                $lastc0c = $cocogen_ctpl_coc_series[0]['coc_no'];
                $lastc0c = $lastc0c + 1;
                $coc = "";

                if($cocogen_epartnerhub_personal_info[0]['cocno']){
                    $coc =   "0".$cocogen_epartnerhub_personal_info[0]['cocno'];
                }else{
                    $coc = "0".$lastc0c;
                }
                $tnxid = $request->get('txnid');
                // dd($coc);
                $statuss = $cocogen_epartnerhub_personal_info[0]['status'];
                $plate = $cocogen_epartnerhub_personal_info[0]['plateNo'];
                $emailAddress = $cocogen_epartnerhub_personal_info[0]['emailAdd'];
                $contactNo = $cocogen_epartnerhub_personal_info[0]['mobileNo'];
                $fullname = $cocogen_epartnerhub_personal_info[0]['firstName'] . " " . $cocogen_epartnerhub_personal_info[0]['middleName'] ." " . $cocogen_epartnerhub_personal_info[0]['lastName'];
                $brand_new = $cocogen_epartnerhub_personal_info[0]['brand_new'];
                $brand_new = $cocogen_epartnerhub_personal_info[0]['brand_new'];

                $cocogen_epartnerhub_personal_infos = cocogen_epartnerhub_personal_info::findorFail($cocogen_epartnerhub_personal_info[0]['id']);
                $cocogen_epartnerhub_personal_infos->status = "Paid";
                $cocogen_epartnerhub_personal_infos->save();

                $dateINEX = substr($plate, -1);
                if ($dateINEX == 1) {
                    $inceptionDate = "02/01/" . date('Y');
                    $expiryDate = "02/28/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 2) {
                    $inceptionDate = "03/01/" . date('Y');
                    $expiryDate = "03/31/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 3) {
                    $inceptionDate = "04/01/" . date('Y');
                    $expiryDate = "04/30/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 4) {
                    $inceptionDate = "05/01/" . date('Y');
                    $expiryDate = "05/31/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 5) {
                    $inceptionDate = "06/01/" . date('Y');
                    $expiryDate = "06/30/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 6) {
                    $inceptionDate = "07/01/" . date('Y');
                    $expiryDate = "07/31/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 7) {
                    $inceptionDate = "08/01/" . date('Y');
                    $expiryDate = "08/31/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 8) {
                    $inceptionDate = "09/01/" . date('Y');
                    $expiryDate = "09/30/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 9) {
                    $inceptionDate = "10/01/" . date('Y');
                    $expiryDate = "10/31/" . date('Y', strtotime('+1 years'));
                } elseif ($dateINEX == 0) {
                    $inceptionDate = "01/01/" . date('Y');
                    $expiryDate = "01/31/" . date('Y', strtotime('+1 years'));
                } else {
                    $inceptionDate = "01/01/" . date('Y');
                    $expiryDate = "01/31/" . date('Y', strtotime('+1 years'));
                }
                
                $cocogen_getquote_mvtypes = cocogen_getquote_mvtypes::where('mvType', '=', $cocogen_epartnerhub_personal_info[0]['vehicleType'])
                                                                ->where('premType', '=', $cocogen_epartnerhub_personal_info[0]['mvType'])
                                                                ->get();
                                                         
                if ($brand_new === "Y") {
                        $brand_new = "Y";
                        $start = date('m/d/Y', strtotime($cocogen_epartnerhub_personal_info[0]['purchaseDate']));
                        $end = date("m/d/Y", strtotime(date("m/d/Y", strtotime($start)) . " + 3 year"));
                        $params = array(
                            "arg0" => array(
                                "username" => env('COC_API_USERNAME'),
                                "password" => env('COC_API_PASSWORD'),
                                "regType" => "N",
                                "cocNo" => $coc,
                                "plateNo" => $cocogen_epartnerhub_personal_info[0]['plateNo'],
                                "mvFileNo" => $cocogen_epartnerhub_personal_info[0]['mvFileNo'],
                                "engineNo" => $cocogen_epartnerhub_personal_info[0]['engineNo'],
                                "chassisNo" => $cocogen_epartnerhub_personal_info[0]['chassisNo'],
                                "inceptionDate" => $start,
                                "expiryDate" => $end,
                                "mvType" => $cocogen_getquote_mvtypes[0]["mvCode"], //C
                                "mvPremType" => $cocogen_getquote_mvtypes[0]["premtype3"], //8
                                "taxType" => "1",
                                "assuredName" => $fullname,
                                "assuredTin" => "999-999-999-999"
                            )
                        );
                }else{
                        $brand_new = "";
                        $params = array(
                            "arg0" => array(
                                "username" => env('COC_API_USERNAME'),
                                "password" => env('COC_API_PASSWORD'),
                                "regType" => "R",
                                "cocNo" => $coc,
                                "plateNo" => $cocogen_epartnerhub_personal_info[0]['plateNo'],
                                "mvFileNo" => $cocogen_epartnerhub_personal_info[0]['mvFileNo'],
                                "engineNo" => $cocogen_epartnerhub_personal_info[0]['engineNo'],
                                "chassisNo" => $cocogen_epartnerhub_personal_info[0]['chassisNo'],
                                "inceptionDate" => $inceptionDate,
                                "expiryDate" => $expiryDate,
                                "mvType" => $cocogen_getquote_mvtypes[0]["mvCode"],
                                "mvPremType" => $cocogen_getquote_mvtypes[0]["premtype1"],
                                "taxType" => "1",
                                "assuredName" => $fullname,
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

                //  dd(env('COC_API_LINK'));     
                $client = new SoapClient(env('COC_API_LINK'), array("trace" => true, "stream_context" => $context));

                $response = $client->__soapCall("register", array($params));


                foreach ($response as $responses) {
                    if (!empty($responses->authNo)) {

                        $cocogen_epartnerhub_personal_infos = cocogen_epartnerhub_personal_info::findorFail($cocogen_epartnerhub_personal_info[0]['id']);
                        $cocogen_epartnerhub_personal_infos->status = "Autheticated";
                        $cocogen_epartnerhub_personal_infos->authno =  $responses->authNo;
                        $cocogen_epartnerhub_personal_infos->cocno =  $lastc0c;
                        $cocogen_epartnerhub_personal_infos->save();


                        $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::findorFail("1");
                        $cocogen_ctpl_coc_series->coc_no = $lastc0c;
                        $cocogen_ctpl_coc_series->save();

                        $authNo = $responses->authNo;
                        // dd($coc);
                        

                        $title = "Success | COCOGEN | General Insurance";

                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 19)->get();
                        $external = str_replace("templatefname", $fullname, $cocogen_admin_emailtemplate[0]['content']);

                         $this->downloadPDFCTPL($request->get('txnid'), $authNo);
                         $cocogen_epartnerhub_personal_info_file = cocogen_epartnerhub_personal_info_file::where('tnxid', '=', $request->get('txnid'))->latest('created_at')->first();
                         $location = storage_path('app') . "/" . $cocogen_epartnerhub_personal_info_file["fileLocation"];

                         $this->emailsendctpl($fullname, $emailAddress, $external, $location);
                         $this->emailsendctplinternal($fullname, $emailAddress, $contactNo, $dtnow, $location);


                        session()->flash('authNo', $authNo);
                        //return redirect('/get-quote/ctpl-insurance/ctpl/success/');
                        return redirect('/get-quote/ctpl-insurance/ctpl/success/')->with('con_no', $request->get('txnid'));
                    } else {
                        
                        $errorMessage = $responses->errorMessage;
                        Session::put('message1', $errorMessage);
                        Session::put('txnid', $tnxid);
                        return redirect('/get-quote/epartnerhub/reauthctplcon');
                    }
                }

                
            }

    }
    public function epartnerhubcompresavePerPagePage1(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        if(!$request->get('editID')){
            $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 
            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }else{
            $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 
            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $request->get('editID');
            $inserted_ids  = str_pad($request->get('editID'), 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($request->get('editID'), 201);
            
        }
    }
    
    public function epartnerhubcompresendsavePerPageSaveAll(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

       


       
        $setNO = 5;
        $cocogen_iga_maintenance_class_vehic = cocogen_iga_maintenance_class_vehic::select('seatNo')->where('vehicleCode', '=', $request->get('vehicClass'))->orderBy('id','DESC')->first();
        if(count($cocogen_iga_maintenance_class_vehic)> 0){
            $setNO = (int)$cocogen_iga_maintenance_class_vehic['seatNo'];
            $subline = $cocogen_iga_maintenance_class_vehic['ClassType'];
        }
        $cocogen_api_policy_no = cocogen_api_policy_no::where('userid', '=', "MC")->get();
        $cocno =  (int)$cocogen_api_policy_no[0]['cocno']+1;
        
        
            $hd_netprem = str_replace( ",", "", $request->get('hd_netprem'));
            $hd_dst = str_replace( ",", "", $request->get('hd_dst'));
            $hd_vat = str_replace( ",", "", $request->get('hd_vat'));
            $hd_lgt = str_replace( ",", "", $request->get('hd_lgt'));
            $hd_duepren = str_replace( ",", "", $request->get('hd_duepren'));
            $hd_deduc = str_replace( ",", "", $request->get('hd_deduc'));
            $hd_rscc_prem = str_replace( ",", "", $request->get('hd_rscc_prem'));
            $aupa = 55000 * (int)$setNO;
            $bodilyInjury = str_replace( ",", "", $request->get('bodilyInjury'));
            $propertyDamage = str_replace( ",", "", $request->get('propertyDamage'));
            $totalValue = str_replace( ",", "", $request->get('totalValue'));
            $aonSI = 0;
            $rsccSU = 0;
            $hd_aon_prem = 0;
            $rsccPrem = 0;
            $withOAN = "No";
            $withRSCC = "No";
            $AON = "";
            $RSCCInclude = "";
            $BIpercentate = ($request->get('hd_bi_prem')/$bodilyInjury)*100;
            $PDpercentate = ($request->get('hd_pd_prem')/$propertyDamage)*100;
            if($request->get('premWithAOM')){
                $withOAN = "Yes";
                $aonSI = str_replace( ",", "", $request->get('totalValue'));
                $hd_aon_prem = str_replace( ",", "", $request->get('hd_aon_prem'));
                $AON = '{
                    "perilCd": 10,
                    "perilRate": '.$request->get('hd_aon_rate').',
                    "perilTsi": '.$aonSI.',
                    "perilPrem": '.$hd_aon_prem.'
                },';
            }

            if($request->get('premWithRSCC')){
                $withRSCC = "Yes";
                $rsccSU = str_replace( ",", "", $request->get('totalValue'));
                $rsccPrem = $hd_rscc_prem;
                $RSCCInclude = '{
                    "perilCd": 13,
                    "perilRate": '.$request->get('hd_rscc_rate').',
                    "perilTsi": '.$rsccSU.',
                    "perilPrem": '.$rsccPrem.'
                },';
            }

            
            $policyincept="";
            $policExpiry="";
            $dateofbirth="";
            if($request->get('policyincept')){
                $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            }
            if($request->get('policyexpiry')){
                $policExpiry = date('Y-m-d', strtotime($request->get('policyexpiry')));
            }
            if($request->get('dateofbirth')){
                $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
            }
            if(!$request->get('editID')){ //empty
                $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            }else{
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));
            }
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->classVehicle  = $request->get('vehicClass'); 
            $cocogen_epartnerhub_compre_trans->page  = $request->get('page'); 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('drpYear'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = $hd_netprem; 
            $cocogen_epartnerhub_compre_trans->dst  = $hd_dst; 
            $cocogen_epartnerhub_compre_trans->vat  = $hd_vat; 
            $cocogen_epartnerhub_compre_trans->lgt  = $hd_lgt; 
            $cocogen_epartnerhub_compre_trans->duePrem  = $hd_duepren;  
            $cocogen_epartnerhub_compre_trans->deductible  = $hd_deduc; 
            $cocogen_epartnerhub_compre_trans->aonPrem  = $hd_aon_prem; 
            $cocogen_epartnerhub_compre_trans->aon  = $aonSI; 
            $cocogen_epartnerhub_compre_trans->rscc  = $rsccSU; 
            $cocogen_epartnerhub_compre_trans->rsccPrem  = $rsccPrem; 
            $cocogen_epartnerhub_compre_trans->AUPA  = $aupa; 
            $cocogen_epartnerhub_compre_trans->rscc_rate  = $request->get('hd_rscc_rate'); 
            $cocogen_epartnerhub_compre_trans->aon_rate  = $request->get('hd_aon_rate'); 
            $cocogen_epartnerhub_compre_trans->odth_rate  = $request->get('hd_odth_rate'); 
            $cocogen_epartnerhub_compre_trans->odTheft  =  str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->bi  = $bodilyInjury;  
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pd  = $propertyDamage; 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->totalValue  = $totalValue; 
            $cocogen_epartnerhub_compre_trans->withAON  = $withOAN; 
            $cocogen_epartnerhub_compre_trans->withRSCC  = $withRSCC; 
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->chassisNo  = $request->get('chassisno'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 
            $cocogen_epartnerhub_compre_trans->agentNo  = $request->get('agentno'); 
            $cocogen_epartnerhub_compre_trans->agentName  = $request->get('agentname'); 
            $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
            $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
            $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
            $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
            $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
            $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
            $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
            $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
            $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
            $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
            $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
            $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
            $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay'); 
            $cocogen_epartnerhub_compre_trans->permanentAddress  = $request->get('permanent_address'); 
            $cocogen_epartnerhub_compre_trans->permanentProvince  = $request->get('permanent_province'); 
            $cocogen_epartnerhub_compre_trans->permanentMunicipality  = $request->get('permanent_municipality'); 
            $cocogen_epartnerhub_compre_trans->permanentBarangay  = $request->get('permanent_barangay'); 
            $cocogen_epartnerhub_compre_trans->nationality  = $request->get('nationality'); 
            $cocogen_epartnerhub_compre_trans->occupation  = $request->get('occupation'); 
            $cocogen_epartnerhub_compre_trans->telNo  = $request->get('telno'); 
            $cocogen_epartnerhub_compre_trans->sourceofFund  = $request->get('sourceoffund'); 
            $cocogen_epartnerhub_compre_trans->typeofID  = $request->get('typeofid'); 
            $cocogen_epartnerhub_compre_trans->idno  = $request->get('idno'); 
            $cocogen_epartnerhub_compre_trans->createdby  = $request->get('created'); 
            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            
            if(!$request->get('editID')){ //empty
                $inserted_ids = $cocogen_epartnerhub_compre_trans->id;
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_ids);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
                $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            }else{
                $inserted_id  = $request->get('editID');
            }
            return response()->json($inserted_id, 201);
    }

    public function epartnerhubcompresavePerPagePage3(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        if(!$request->get('editID')){

            //page1
            $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }else{

            //page1
            $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $request->get('editID');
            $inserted_ids  = str_pad($request->get('editID'), 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }
    }

    public function epartnerhubcompresavePerPagePage4(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        if(!$request->get('editID')){
            //page1
            $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  =$request->get('premWithAOM');

            //page 3

            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));

            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }else{

            //page1
            $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            //page 3
            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $request->get('editID');
            $inserted_ids  = str_pad($request->get('editID'), 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }
    }

    public function epartnerhubcompresavePerPagePage5(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        if(!$request->get('editID')){
            //page1
            $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  =$request->get('premWithAOM');

            //page 3

            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 

            //page 4
            $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
            $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
            $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
            $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
            $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
            $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
            $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
            $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
            $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
            $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
            $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
            $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
            $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
            $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay');  
            
       

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }else{

            //page1
            $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            //page 3
            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 


            //page 4
            $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
            $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
            $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
            $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
            $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
            $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
            $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
            $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
            $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
            $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
            $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
            $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
            $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
            $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay');  
            
            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $request->get('editID');
            $inserted_ids  = str_pad($request->get('editID'), 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }
    }

    public function epartnerhubcompresavePerPagePage6(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        if(!$request->get('editID')){
            //page1
            $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  =$request->get('premWithAOM');

            //page 3

            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 

            //page 4
            $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
            $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
            $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
            $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
            $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
            $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
            $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
            $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
            $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
            $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
            $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
            $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
            $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
            $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay');  
            
            //page5
            $cocogen_epartnerhub_compre_trans->permanentAddress  = $request->get('permanent_address'); 
            $cocogen_epartnerhub_compre_trans->permanentProvince  = $request->get('permanent_province'); 
            $cocogen_epartnerhub_compre_trans->permanentMunicipality  = $request->get('permanent_municipality'); 
            $cocogen_epartnerhub_compre_trans->permanentBarangay  = $request->get('permanent_barangay'); 
            $cocogen_epartnerhub_compre_trans->nationality  = $request->get('nationality'); 
            $cocogen_epartnerhub_compre_trans->occupation  = $request->get('occupation'); 
            $cocogen_epartnerhub_compre_trans->telNo  = $request->get('telno'); 
            $cocogen_epartnerhub_compre_trans->sourceofFund  = $request->get('sourceoffund'); 
            $cocogen_epartnerhub_compre_trans->typeofID  = $request->get('typeofid'); 
            $cocogen_epartnerhub_compre_trans->idno  = $request->get('idno'); 

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }else{

            //page1
            $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            //page 3
            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 


            //page 4
            $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
            $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
            $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
            $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
            $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
            $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
            $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
            $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
            $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
            $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
            $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
            $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
            $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
            $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay');  
            
            //page5
            $cocogen_epartnerhub_compre_trans->permanentAddress  = $request->get('permanent_address'); 
            $cocogen_epartnerhub_compre_trans->permanentProvince  = $request->get('permanent_province'); 
            $cocogen_epartnerhub_compre_trans->permanentMunicipality  = $request->get('permanent_municipality'); 
            $cocogen_epartnerhub_compre_trans->permanentBarangay  = $request->get('permanent_barangay'); 
            $cocogen_epartnerhub_compre_trans->nationality  = $request->get('nationality'); 
            $cocogen_epartnerhub_compre_trans->occupation  = $request->get('occupation'); 
            $cocogen_epartnerhub_compre_trans->telNo  = $request->get('telno'); 
            $cocogen_epartnerhub_compre_trans->sourceofFund  = $request->get('sourceoffund'); 
            $cocogen_epartnerhub_compre_trans->typeofID  = $request->get('typeofid'); 
            $cocogen_epartnerhub_compre_trans->idno  = $request->get('idno'); 

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $request->get('editID');
            $inserted_ids  = str_pad($request->get('editID'), 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }
    }

    public function epartnerhubcompresave(Request $request){

        if($request->get('btnbuy')){

            
            $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
            $subline = "MNP";
            $setNO = 5;
            $cocogen_iga_maintenance_class_vehic = cocogen_iga_maintenance_class_vehic::select('seatNo','ClassType')->where('vehicleCode', '=', $request->get('vehicClass'))->orderBy('id','DESC')->first();
            if(count($cocogen_iga_maintenance_class_vehic)> 0){
                $setNO = (int)$cocogen_iga_maintenance_class_vehic['seatNo'];
                $subline = $cocogen_iga_maintenance_class_vehic['ClassType'];
            }
            $cocogen_api_policy_no = cocogen_api_policy_no::where('userid', '=', "MC")->get();
            $cocno =  (int)$cocogen_api_policy_no[0]['cocno']+1;
            
                $hd_netprem = str_replace( ",", "", $request->get('hd_netprem'));
                $hd_dst = str_replace( ",", "", $request->get('hd_dst'));
                $hd_vat = str_replace( ",", "", $request->get('hd_vat'));
                $hd_lgt = str_replace( ",", "", $request->get('hd_lgt'));
                $hd_duepren = str_replace( ",", "", $request->get('hd_duepren'));
                $hd_deduc = str_replace( ",", "", $request->get('hd_deduc'));
                $hd_rscc_prem = str_replace( ",", "", $request->get('hd_rscc_prem'));
                $aupa = 55000 * (int)$setNO;
                $bodilyInjury = str_replace( ",", "", $request->get('bodilyInjury'));
                $propertyDamage = str_replace( ",", "", $request->get('propertyDamage'));
                $totalValue = str_replace( ",", "", $request->get('totalValue'));
                $aonSI = 0;
                $rsccSU = 0;
                $hd_aon_prem = 0;
                $rsccPrem = 0;
                $withOAN = "No";
                $withRSCC = "No";
                $AON = "";
                $RSCCInclude = "";
                $BIpercentate = ($request->get('hd_bi_prem')/$bodilyInjury)*100;
                $PDpercentate = ($request->get('hd_pd_prem')/$propertyDamage)*100;
                if($request->get('premWithAOM')){
                    $withOAN = "Yes";
                    $aonSI = str_replace( ",", "", $request->get('totalValue'));
                    $hd_aon_prem = str_replace( ",", "", $request->get('hd_aon_prem'));
                    $AON = '{
                        "perilCd": 10,
                        "perilRate": '.$request->get('hd_aon_rate').',
                        "perilTsi": '.$aonSI.',
                        "perilPrem": '.$hd_aon_prem.'
                    },';
                }

                if($request->get('premWithRSCC')){
                    $withRSCC = "Yes";
                    $rsccSU = str_replace( ",", "", $request->get('totalValue'));
                    $rsccPrem = $hd_rscc_prem;
                    $RSCCInclude = '{
                        "perilCd": 13,
                        "perilRate": '.$request->get('hd_rscc_rate').',
                        "perilTsi": '.$rsccSU.',
                        "perilPrem": '.$rsccPrem.'
                    },';
                }

                $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
                $policExpiry = date('Y-m-d', strtotime($request->get('policyexpiry')));
                $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
                
                if(!$request->get('id_editfield')){ //empty
                    $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
                }else{
                    $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('id_editfield'));
                }
                $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
                $cocogen_epartnerhub_compre_trans->classVehicle  = $request->get('vehicClass'); 
                $cocogen_epartnerhub_compre_trans->year  = $request->get('drpYear'); 
                $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand');  
                $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
                $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
                $cocogen_epartnerhub_compre_trans->netPrem  = $hd_netprem; 
                $cocogen_epartnerhub_compre_trans->dst  = $hd_dst; 
                $cocogen_epartnerhub_compre_trans->vat  = $hd_vat; 
                $cocogen_epartnerhub_compre_trans->lgt  = $hd_lgt; 
                $cocogen_epartnerhub_compre_trans->duePrem  = $hd_duepren;  
                $cocogen_epartnerhub_compre_trans->deductible  = $hd_deduc; 
                $cocogen_epartnerhub_compre_trans->aonPrem  = $hd_aon_prem; 
                $cocogen_epartnerhub_compre_trans->aon  = $aonSI; 
                $cocogen_epartnerhub_compre_trans->rscc  = $rsccSU; 
                $cocogen_epartnerhub_compre_trans->rsccPrem  = $rsccPrem; 
                $cocogen_epartnerhub_compre_trans->AUPA  = $aupa; 
                $cocogen_epartnerhub_compre_trans->rscc_rate  = $request->get('hd_rscc_rate'); 
                $cocogen_epartnerhub_compre_trans->aon_rate  = $request->get('hd_aon_rate'); 
                $cocogen_epartnerhub_compre_trans->odth_rate  = $request->get('hd_odth_rate'); 
                $cocogen_epartnerhub_compre_trans->odTheft  =  str_replace( ",", "", $request->get('totalValue')); 
                $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
                $cocogen_epartnerhub_compre_trans->bi  = $bodilyInjury;  
                $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
                $cocogen_epartnerhub_compre_trans->pd  = $propertyDamage; 
                $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
                $cocogen_epartnerhub_compre_trans->totalValue  = $totalValue; 
                $cocogen_epartnerhub_compre_trans->withAON  = $withOAN; 
                $cocogen_epartnerhub_compre_trans->withRSCC  = $withRSCC; 
                $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
                $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
                $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
                $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
                $cocogen_epartnerhub_compre_trans->chassisNo  = $request->get('chassisno'); 
                $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
                $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
                $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
                $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 
                $cocogen_epartnerhub_compre_trans->agentNo  = $request->get('agentno'); 
                $cocogen_epartnerhub_compre_trans->agentName  = $request->get('agentname'); 
                $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
                $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
                $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
                $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
                $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
                $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
                $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
                $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
                $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
                $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
                $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
                $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
                $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay'); 
                $cocogen_epartnerhub_compre_trans->permanentAddress  = $request->get('permanent_address'); 
                $cocogen_epartnerhub_compre_trans->permanentProvince  = $request->get('permanent_province'); 
                $cocogen_epartnerhub_compre_trans->permanentMunicipality  = $request->get('permanent_municipality'); 
                $cocogen_epartnerhub_compre_trans->permanentBarangay  = $request->get('permanent_barangay'); 
                $cocogen_epartnerhub_compre_trans->nationality  = $request->get('nationality'); 
                $cocogen_epartnerhub_compre_trans->occupation  = $request->get('occupation'); 
                $cocogen_epartnerhub_compre_trans->telNo  = $request->get('telno'); 
                $cocogen_epartnerhub_compre_trans->sourceofFund  = $request->get('sourceoffund'); 
                $cocogen_epartnerhub_compre_trans->typeofID  = $request->get('typeofid'); 
                $cocogen_epartnerhub_compre_trans->idno  = $request->get('idno'); 
                $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
                $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
                $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
                $cocogen_epartnerhub_compre_trans->save();
                

                
                if(!$request->get('id_editfield')){ //empty
                    $inserted_id = $cocogen_epartnerhub_compre_trans->id;
                    $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                   
                }else{
                    $inserted_id = $request->get('id_editfield');
                    $inserted_ids  = str_pad($request->get('id_editfield'), 7, '0', STR_PAD_LEFT);
                }

                if($inserted_id){
                    if(!$request->get('id_editfield')){ //empty
                        $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                        $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                        $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                        $cocogen_epartnerhub_compre_trans->save();

                        if($request->accessory){
                                $countsaccessory = $request->accessory;
                                $count = count($countsaccessory);
                                $amountAcct = 0;
                                $accamounts = 0;
                                for($i = 0; $i < $count; $i++){
                                    $accamounts = str_replace(',', '', $request->accessoryValue[$i]);
                                    
                                    if($request->accessory[$i]){
                                        $accessoryfinal = $request->accessory[$i];
                                    }

                                    $cocogen_epartnerhub_compre_accessorries = new cocogen_epartnerhub_compre_accessorries;
                                    $cocogen_epartnerhub_compre_accessorries->tnxid = $inserted_id;
                                    $cocogen_epartnerhub_compre_accessorries->accessory =$accessoryfinal;
                                    $cocogen_epartnerhub_compre_accessorries->amount = $accamounts;
                                    $cocogen_epartnerhub_compre_accessorries->save();
                            }
                        }
                    }else{
                        if($request->accessory){
                            $countsaccessory = $request->accessory;
                            $count = count($countsaccessory);
                            $amountAcct = 0;
                            $accamounts = 0;
                            for($i = 0; $i < $count; $i++){
                                $accamounts = str_replace(',', '', $request->accessoryValue[$i]);
                                
                                if($request->accessory[$i]){
                                    $accessoryfinal = $request->accessory[$i];
                                }
    
                                $cocogen_epartnerhub_compre_accessorries = new cocogen_epartnerhub_compre_accessorries;
                                $cocogen_epartnerhub_compre_accessorries->tnxid = $request->get('id_editfield');
                                $cocogen_epartnerhub_compre_accessorries->accessory =$accessoryfinal;
                                $cocogen_epartnerhub_compre_accessorries->amount = $accamounts;
                                $cocogen_epartnerhub_compre_accessorries->save();
                            }
                        }
                    }
                    
                    $fname = strtoupper($request->get('fname'));
                    $lname = strtoupper($request->get('lname'));
                    $mname = strtoupper($request->get('mname'));
                    $mname = strtoupper($request->get('mname'));
                    $name = $lname .", ".$fname;
                    $palceofbirth = $request->get('placeofbirth');
                    $email = $request->get('email');
                    $contact = $request->get('mobileno');
                    $origdate = strtotime($dateofbirth);
                    $date_month =  date("F", $origdate);
                    $date_year =  date("Y", $origdate);
                    $date_day =  date("d", $origdate);
                    $itemTitle = $request->get('drpYear') .' '.$request->get('brand');
                    $model = $request->get('model');
                    $year = $request->get('drpYear');
                    $brand = $request->get('brand');
                    $makename = "-";
                    $makecode = 0;
                    $tnxid = 0;
                    $address = $request->get('residence_address'). ' ' . $request->get('residence_barangay'). ' ' . $request->get('residence_municipality'). ' ' . $request->get('residence_province');
                    $incept = date('m/d/Y', strtotime($request->get('policyincept')));
                    $expiry = date('m/d/Y', strtotime($request->get('policyexpiry')));
                    $plateNo = $request->get('plateno');
                    $mvfile = $request->get('mvfileno');
                    $color = $request->get('color');
                    $egine = $request->get('engineno');
                    $chassis = $request->get('chassisno');;

                    $cocogen_users_agent_code = cocogen_users_agent_code::select('code')->where('email', '=', \Auth::user()->email)->orderBy('id','DESC')->first();
                    if(count($cocogen_users_agent_code)> 0){
                        //check agent maintenance
                        $agent = (int)$cocogen_users_agent_code['code'];
                        $SecurityCodeAgent = sha1("cocogenAPI".":". "cocogenAPI".":".$agent);
                        $clientAgent = new Client();
                        $resAgent = $clientAgent->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/check/agent', [
                        'form_params' => [
                            'Username' => 'cocogenAPI',
                            'SecurityCode' => $SecurityCodeAgent,
                            'agent' => $agent,
                            ]
                        ]);

                        $contentsAgent = $resAgent->getBody()->getContents();
                        $contentsAgents = json_decode($contentsAgent, true);
                        //change if result is null
                        if(!empty($contentsAgents['TErrorMsg'])){
                            $agent = 2233;
                        }

                    }else{
                        $agent = 2233;
                    }

                    //Check assured maintenance
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
            
                    $contentAssured = $res->getBody()->getContents();
                    $data = json_decode($contentAssured, true);
                    $contact = str_replace( "(", "", $contact);
                    $contact = str_replace( ")", "", $contact);
                    $contact = str_replace( "-", "", $contact);
                    $contact = str_replace( " ", "", $contact);
                    
                    //insert if no null

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
                
                        $contentAssuredInsert = $resInsert->getBody()->getContents();
                        $data_insert = json_decode($contentAssuredInsert, true);
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
                   
                    //check or insert make               
                    $cocogen_fmv = cocogen_fmv::where(strtoupper('brand'), '=', strtoupper($brand))
                            ->where('year', '=', $year)
                            ->where( str_replace("  "," ",strtoupper('model')), '=', str_replace("  "," ",strtoupper($model)) )
                            ->get();
                    if(count($cocogen_fmv)>0){
                        // $makecode = (int)$cocogen_fmv[0]['make_cd'];
                        $tbl_giis_mc_make = tbl_giis_mc_make::where('make_cd', '=',(int)$cocogen_fmv[0]['make_cd'])->get();
                        if(count($tbl_giis_mc_make)>0){
                            $makename = $tbl_giis_mc_make[0]["make"];
                        }
                    
                    }
                    $makename = trim($makename);

                   
                    //dd($cocogen_fmv,strtoupper($brand),str_replace("  "," ",strtoupper($model)),;
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
                    
                    $contentsMake = $resMake->getBody()->getContents();
                    $dataMakeCode = json_decode($contentsMake, true);
                    $itemTitle  = $year ." ".$brand . " " .$model;
                    $itemTitle = substr($itemTitle, 0, 50);
                    $odthprem = $request->get('hd_odtheft')/2;
                    $odthrate = $request->get('hd_odth_rate')/2;

                    //cut char limit
                    $subline = substr($subline, 0, 7);
                    $agent = substr($agent, 0, 12);
                    $assured = substr($assured, 0, 12);
                    $address = substr($address, 0, 150);
                    $color = substr($color, 0, 7);
                    $year = substr($year, 0, 4);
                    $chassis = substr($chassis, 0, 30);
                    $egine = substr($egine, 0, 25);
                    $mvfile = substr($mvfile, 0, 15);
                    $plateNo = substr($plateNo, 0, 10);
                    $brand = substr($brand, 0, 25);
                    //////start of issuance API

                    $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));
                        $dta = '{
                            "userId": "CPI",
                            "sublineCd": "'. $subline.'",
                            "lineCd": "MC",
                            "issCd":  "HO",
                            "intmNo": '.$agent.',
                            "inceptDate": "'. $incept.'",
                            "expiryDate": "'.$expiry.'",
                            "assdNo": '.$assured.',
                            "assdAddress": "'. $address.'",
                            "refPolNo": "'.$tnxid.'",
                            "itemTitle": "'.$itemTitle.'",
                            "currency": "PHP",
                            "currencyRt": 1.0,
                            "paytTerm": "COD",
                            "dueDate": "'. $incept.'",
                            "refInvNo": "140000045308088",
                            "itemDesc": "-",
                            "itemDesc2": "-",
                            "motorNo": "'.$chassis.'",
                            "color": "'.$color.'",
                            "modelYear": "'.$year.'",
                            "makeCd": '.$dataMakeCode.',
                            "serialNo": "'.$egine.'",
                            "plateNo": "'.$plateNo.'",
                            "sublineType": "CAR",
                            "noPass": "'.$setNO.'",
                            "cocIssueDate": "'. $incept.'",
                            "mvFileNo": "'.$mvfile.'",
                            "carCompany": "'.$brand.'",
                            "carVariant": "-",
                            "cocAtcnNo": "12Q341234",
                            "mvPremType": "CARDESC1",
                            "mvType": "c",
                            "regType": "r",
                            "cocSerialNo": '.$cocno.', 
                            "coverageCd": 4,
                            "regionCd": 15, 
                            "peril": [
                                {
                                    "perilCd": 3,
                                    "perilRate":  '.$odthrate.',
                                    "perilTsi": '.str_replace( ",", "", $request->get('totalValue')).',
                                    "perilPrem": '.$odthprem.',
                                    "deductible": [
                                        {
                                            "deductibleCd": "ECOM",
                                            "deductibleAmt": '. $hd_deduc .'
                                        }
                                    ]
                                },
                                {
                                    "perilCd": 4,
                                    "perilRate": '.$odthrate.',
                                    "perilTsi": '.str_replace( ",", "", $request->get('totalValue')).',
                                    "perilPrem": '.$odthprem.'
                                }, '.$AON.' '.$RSCCInclude.'                            
                                {
                                    "perilCd": 5,
                                    "perilRate": '.$BIpercentate.',
                                    "perilTsi": '.$bodilyInjury.',
                                    "perilPrem": '.$request->get('hd_bi_prem').'
                                },
                                {
                                    "perilCd": 6,
                                    "perilRate": '.$PDpercentate.',
                                    "perilTsi": '.$propertyDamage.',
                                    "perilPrem": '.$request->get('hd_pd_prem').'
                                },
                                {
                                    "perilCd": 8,
                                    "perilRate": 0,
                                    "perilTsi": '.$aupa .',
                                    "perilPrem": 0
                                }
                            ],
                            "invTax": [
                                {
                                    "taxCd": 3,
                                    "taxAmt": '.$hd_dst.'
                                },
                                {
                                    "taxCd": 5,
                                    "taxAmt": '.$hd_lgt.'
                                },
                                {
                                    "taxCd": 8,
                                    "taxAmt": '.$hd_vat.'
                                }
                            ]
                        }';
                        // dd($dta);
                        $hashKEY = strtoupper(hash('sha256', 'COCOGEN'.$expiry . ''.$assured. '' .$plateNo));
                        $client = new Client([
                            'headers' => [ 'Content-Type' => 'application/json','hashKey' => $hashKEY ]
                        ]);
                        $response = $client->post('http://136.239.248.120:8080/Geniisys/api/v3.0/mc/policy',
                        //$response = $client->post('http://192.168.4.49:8080/Geniisys/api/v3.0/mc/policy',
                            ['body' => $dta]
                        );
                      
                        $dataraw = $response->getBody()->getContents();
                        $datadecoded = json_decode($dataraw, true);
                        // $datadecoded = rtrim($datadecoded, ',');
                        // dd($dataraw,$dta,$datadecoded);
                        $cocogen_api_policy_no = cocogen_api_policy_no::findorFail(100);
                        $cocogen_api_policy_no->cocno = $cocno;
                        $cocogen_api_policy_no->save();
                        
                        if(!empty($datadecoded["type"])){
                            if($datadecoded["type"] === "created"){
                                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                                $cocogen_epartnerhub_compre_trans->status = "Issued"; 
                                $cocogen_epartnerhub_compre_trans->response_policyid = $datadecoded["policyId"]; 
                                $cocogen_epartnerhub_compre_trans->response_policyno = $datadecoded["policyNo"]; 
                                $cocogen_epartnerhub_compre_trans->response_branch = $datadecoded["issCd"]; 
                                $cocogen_epartnerhub_compre_trans->response_premseqno = $datadecoded["premSeqNo"]; 
                                $cocogen_epartnerhub_compre_trans->save();
                                
                                    $users = users::where('email', '=', $request->get('email'))->orderBy('id','DESC')->first();
                                    if(count($users)>0){
                                        $item['policy_no'] = $datadecoded["policyNo"];
                                        $item['email_address'] = $request->get('email');
                                        $item['assured_id'] = $assured;
                                        $item['assured_name'] = $name;
                                        $messageData = [
                                            'data' => $item,
                                        ];

                                        try {
                                            Mail::send('emailtemplate.email.epolicyView', $messageData, function($message) use($item) {
                                                $message->to($item['email_address'])
                                                //$message->to('rene_paciente@cocogen.com')
                                                ->subject("You may now view your " . $item['policy_no'] . " Policy ");
                                            });
                                        } catch (Exception $e) {
                                            info("Exception at ".$email);
                                        }
                                    }else{
                                        $name_new = $name;
                                        $email_new = $request->get('email');
                                        //create new user
                                        $User = new User();
                                        $User->name = $name_new;
                                        $User->email = $email_new;
                                        $User->active = 'Y';
                                        $User->type = 'C';
                                        $User->status = 'APPROVED';
                                        $User->save();
                                        $inserted_id_users = $User->id;

                                        //query last id
                                        $User = User::where('id', '=', $inserted_id_users)->orderBy('id','DESC')->first();

                                        //insert assured number maintenance
                                        $cocogen_users_client_codes = new  cocogen_users_client_code;
                                        $cocogen_users_client_codes->email = $email_new;
                                        $cocogen_users_client_codes->code = (int)$assured;
                                        $cocogen_users_client_codes->save();

                                        //setup link
                                        $date = date_create();
                                        $datehash = date_timestamp_get($date);
                                        $transID =  $User['email'].":". $datehash;
                                        $digest = sha1($User['created_at']. $User['id']);
                                        $digesthash = base64_encode($digest);
                                        $transID2 = sha1($transID);  
                                        $transID3 = $transID.":".$transID2.":".$digesthash; 
                                        $transID4 = base64_encode($transID3);
                                        // $libnk = "https://www.cocogen.com/activate_account?". $transID4;
                                        $libnk = "http://192.168.1.243/cgen/cocogen/public/activate_account?". $transID4;
                                        $item['assured_name'] = $name;
                                        $messageData = [
                                            'data' => $item,
                                            'link' => $libnk,
                                        ];
                                    
                                        if(str_contains($User['email'], 'info@')){
                                        }else{
                                            try {
                                                Mail::send('emailtemplate.email.epolicyNew', $messageData, function($message) use ($User){
                                                    $message->to($User['email'])
                                                    //$message->to('rene_paciente@cocogen.com')
                                                    ->subject('Welcome to your ePolicy account!');
                                                });
                                            } catch (Exception $e) {
                                            //  info("Exception at ".$email);
                                            }          
                                        }

                                       
                                    }
                            }
                        }
                        session()->flash('quote',"quotequote");
                        $status_message = "Request was successfully issued with policy number ".  $datadecoded["policyNo"];    
                        return back()->withInput()->with('message',$status_message);  
                }
        }
    }

    
    public function epartnerhubcompresendsavePerPagePage2(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        if(!$request->get('editID')){

            //page1
            $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }else{
          

            //page1
            $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $request->get('editID');
            $inserted_ids  = str_pad($request->get('editID'), 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();
            }
            return response()->json($inserted_id, 201);
        }
    }

    public function quotedetails(Request $request)
    {       
        $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::where('id', '=',$request->get('id'))->first();     
        return response()->json($cocogen_epartnerhub_compre_trans, 201);        
    }

    public function quotedetailsctpl(Request $request)
    {       
        $cocogen_epartnerhub_personal_info = cocogen_epartnerhub_personal_info::where('id', '=',$request->get('id'))->get();     
        return response()->json($cocogen_epartnerhub_personal_info, 201);        
    }

    public function updaterenew(Request $request)
    {       
        $cocogen_epartnerhub_policy_status = new cocogen_epartnerhub_policy_status;
        $cocogen_epartnerhub_policy_status->policyno  = $request->get('hd_pol'); 
        $cocogen_epartnerhub_policy_status->status  = "RENEWED"; 
        $cocogen_epartnerhub_policy_status->save();

        $polexplode =  explode( '-', $request->get('hd_pol'));

        $cocogen_admin_branch = cocogen_admin_branch::where('branch_cd', '=', $polexplode[2])->get();

        $email = "";
        $branch = "";
        if(count($cocogen_admin_branch) > 0){
            //$email = $cocogen_admin_branch[0]["email"];
            $email = "christian_kee@cocogen.com";
            $branch = $cocogen_admin_branch[0]["name"];

        }else{
            $email = "christian_kee@cocogen.com";
            $branch  = "CS";
        }

        $this->emailsendRenew(\Auth::user()->name,\Auth::user()->email, $email,$request->get('hd_pol'),$branch);

       // dd($request->get('hd_pol'),$polexplode,$cocogen_admin_branch,$email);
        $status_message = "Policy was successfully renewed!";    
       return back()->withInput()->with('message',$status_message);      
    }

    public function sendmail(Request $request)
    {       
  
        //dd($request,$request->get('txtsendemailremarks'));
      

        $this->emailsendrequest(\Auth::user()->name,"christian_kee@cocogen.com", "christian_kee@cocogen.com",$request->get('send_hd_pol'),$request->get('txtsendemailremarks'));

       $status_message = "Email Successfully Sent!";    
       return back()->withInput()->with('message',$status_message);      
    }

    public function updatenonrenew(Request $request)
    {       
        $cocogen_epartnerhub_policy_status = new cocogen_epartnerhub_policy_status;
        $cocogen_epartnerhub_policy_status->policyno  = $request->get('non_hd_pol'); 
        $cocogen_epartnerhub_policy_status->status  = "NON-RENEWED"; 
        $cocogen_epartnerhub_policy_status->save();

        $polexplode =  explode( '-', $request->get('non_hd_pol'));

        $cocogen_admin_branch = cocogen_admin_branch::where('branch_cd', '=', $polexplode[2])->get();

        $email = "";
        $branch = "";
        if(count($cocogen_admin_branch) > 0){
            //$email = $cocogen_admin_branch[0]["email"];
            $email = "christian_kee@cocogen.com";
            $branch = $cocogen_admin_branch[0]["name"];

        }else{
            //$email = "client_services@cocogen.com";
            $email = "christian_kee@cocogen.com";
            $branch = "CS";
        }

        $this->emailsendNonRenew(\Auth::user()->name,\Auth::user()->email, $email,$request->get('non_hd_pol'), $branch);

       // dd($request->get('hd_pol'),$polexplode,$cocogen_admin_branch,$email);


        $status_message = "Policy was successfully tag as non renewal";    
       return back()->withInput()->with('message',$status_message);      
    }

    public function updaterenewwremarks(Request $request)
    {       
        $cocogen_epartnerhub_policy_status = new cocogen_epartnerhub_policy_status;
        $cocogen_epartnerhub_policy_status->policyno  = $request->get('hd_renew_with_changes'); 
        $cocogen_epartnerhub_policy_status->status  = "RENEWED"; 
        $cocogen_epartnerhub_policy_status->remarks  = $request->get('txtrenewwchanges'); 
        $cocogen_epartnerhub_policy_status->save();

         $polexplode =  explode( '-', $request->get('hd_renew_with_changes'));

        $cocogen_admin_branch = cocogen_admin_branch::where('branch_cd', '=', $polexplode[2])->get();

        $email = "";
        $branch = "";
        if(count($cocogen_admin_branch) > 0){
            //$email = $cocogen_admin_branch[0]["email"];
            $email = "christian_kee@cocogen.com";
            $branch = $cocogen_admin_branch[0]["name"];

        }else{
            //$email = "client_services@cocogen.com";
            $email = "christian_kee@cocogen.com";
            $branch = "CS";
        }

        $this->emailsendRenewwithRemarks(\Auth::user()->name,\Auth::user()->email, $email,$request->get('hd_renew_with_changes'),$request->get('txtrenewwchanges'), $branch);

       // dd($request->get('hd_pol'),$polexplode,$cocogen_admin_branch,$email);


        $status_message = "Policy was successfully renewed!";
        return back()->withInput()->with('message',$status_message);    
    }

    public function addremarks(Request $request)
    {       
        $cocogen_epartnerhub_policy_status = new cocogen_epartnerhub_policy_status;
        $cocogen_epartnerhub_policy_status->policyno  = $request->get('hdAddRemarks'); 
        $cocogen_epartnerhub_policy_status->status  = $request->get('hdStatus');
        $cocogen_epartnerhub_policy_status->remarks  = $request->get('txtAddRemarks'); 
        $cocogen_epartnerhub_policy_status->save();

        $polexplode =  explode( '-', $request->get('hdAddRemarks'));

        $cocogen_admin_branch = cocogen_admin_branch::where('branch_cd', '=', $polexplode[2])->get();

        $email = "";
        if(count($cocogen_admin_branch) > 0){
            //$email = $cocogen_admin_branch[0]["email"];
            $email = "christian_kee@cocogen.com";
        }else{
            //$email = "client_services@cocogen.com";
            $email = "christian_kee@cocogen.com";
        }

        $this->emailsendAddRermarks(\Auth::user()->name,\Auth::user()->email, $email,$request->get('hdAddRemarks'),$request->get('txtAddRemarks'));

        $status_message = "Remarks was successfully added!";
        return back()->withInput()->with('message',$status_message);    
    }

    public function emailsendAddRermarks($fname, $email, $emailto, $pol, $remarks) {
        $data = array('fname'=>$fname, 'email'=>$email,'emailto'=>$emailto,'pol'=>$pol,'remarks'=>$remarks);
            Mail::send('emailtemplate.epolicyaddremarks', $data, function($message) use ($fname, $email, $emailto, $pol, $remarks)
              {
                 $message->to($emailto, 'COCOGEN')->subject('Add Remarks: '. $pol);
              });
           
    }

    public function emailsendRenew($fname, $email, $emailto, $pol,$branch) {
        $data = array('fname'=>$fname, 'email'=>$email,'emailto'=>$emailto,'pol'=>$pol,'branch'=>$branch);
            Mail::send('emailtemplate.epolicyrenew', $data, function($message) use ($fname, $email, $emailto, $pol, $branch)
              {
                 $message->to($emailto, 'COCOGEN')->subject('Renewal Request: '. $pol);
              });
           
    }

    public function emailsendRenewwithRemarks($fname, $email, $emailto, $pol,$remarks, $branch) {
        $data = array('fname'=>$fname, 'email'=>$email,'emailto'=>$emailto,'pol'=>$pol,'remarks'=>$remarks,'branch'=>$branch);
            Mail::send('emailtemplate.epolicyrenewwithremarks', $data, function($message) use ($fname, $email, $emailto, $pol,$remarks, $branch)
              {
                 $message->to($emailto, 'COCOGEN')->subject('Renewal Request with Remarks: '. $pol);
              });
           
    }

    public function emailsendNonRenew($fname, $email, $emailto, $pol,$branch) {
        $data = array('fname'=>$fname, 'email'=>$email,'emailto'=>$emailto,'pol'=>$pol,'branch'=>$branch);
            Mail::send('emailtemplate.epolicynonrenew', $data, function($message) use ($fname, $email, $emailto, $pol, $branch)
              {
                 $message->to($emailto, 'COCOGEN')->subject('Non-Renewal Request: '. $pol);
              });
           
    }

    public function emailsendrequest($fname, $email, $emailto, $pol,$text) {
        $data = array('fname'=>$fname, 'email'=>$email,'emailto'=>$emailto,'pol'=>$pol,'text'=>$text);
            Mail::send('emailtemplate.epolicysendemail', $data, function($message) use ($fname, $email, $emailto, $pol, $text)
              {
                 $message->to($emailto, 'COCOGEN')->subject('Epartnerhub Send Email: '. $pol);
              });
           
    }

    public function downloadcoc($filename,$txnid){
            $tnxid = base64_decode($txnid);
            $s ="/";
            $s2 = substr($s, 0,1);
            //$slash = substr($s2,0, -1);
            $files = cocogen_compre_file::where('tnxid', '=', $tnxid)->get();
            // $file_path = storage_path('app') . $s2 .$files['0']['fileLocation'];
            $file_path = "/var/www/html/cocogen/storage/app/" .$files['0']['fileLocation']; 
          return response()->file($file_path);
    }

    public function downloadPDFCOMPRE($txnid){

        $cocogen_compre_carinfo = cocogen_compre_carinfo::where('tnxid', '=', $txnid)->get();
        $cocogen_compre_personalinfo = cocogen_compre_personalinfo::where('tnxid', '=', $txnid)->get();
        $cocogen_compre_addtlcarinfo = cocogen_compre_addtlcarinfo::where('tnxid', '=', $txnid)->get(); 

        if($cocogen_compre_addtlcarinfo[0]['inceptDate']){
            $dtCreated = date('m/d/Y', strtotime($cocogen_compre_addtlcarinfo[0]['inceptDate']));
            $futureDate =date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['inceptDate'])) );
        }else{
            $dtCreated = date('m/d/Y', strtotime($cocogen_compre_addtlcarinfo[0]['created_at']));
            $futureDate =date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['created_at'])) );
        }


        $assured = $cocogen_compre_personalinfo[0]['firstName'] ." ".$cocogen_compre_personalinfo[0]['lastName'];
        $address = $cocogen_compre_personalinfo[0]['Address'];
        $model = $cocogen_compre_carinfo[0]['model'];
        $promoCode = $cocogen_compre_carinfo[0]['promoCode'];
        $bodyType = $cocogen_compre_addtlcarinfo[0]['bodyType'];
        $color = $cocogen_compre_addtlcarinfo[0]['color'];
        $chassisNo = $cocogen_compre_addtlcarinfo[0]['chassisNo'];
        $engineNo = $cocogen_compre_addtlcarinfo[0]['engineNo'];
        $plateNo = $cocogen_compre_addtlcarinfo[0]['plateNo'];
        $inceptDate = $dtCreated .' - '. $futureDate;
        $ODTheft = number_format($cocogen_compre_carinfo[0]['ODTheft'], 2, '.', ',');
        $mortgagee = $cocogen_compre_carinfo[0]['mortgagee'];
        $deductible = number_format($cocogen_compre_carinfo[0]['deductible'], 2, '.', ',');
        $bodilyInjury = number_format($cocogen_compre_carinfo[0]['bodilyInjury'], 2, '.', ',');
        $propertyDamage =  number_format($cocogen_compre_carinfo[0]['propertyDamage'], 2, '.', ','); 
        $autoPA =  number_format($cocogen_compre_carinfo[0]['autoPA'], 2, '.', ',');
        
        if($cocogen_compre_carinfo[0]['reqType'] === "1"){
            $actsOfNature =  number_format($cocogen_compre_carinfo[0]['actsOfNature'], 2, '.', ',');
            $finalDue = number_format($cocogen_compre_carinfo[0]['finalDueWithAOM'], 2, '.', ',');
            $RSCC =  number_format($cocogen_compre_carinfo[0]['actsOfNature'], 2, '.', ',');
        }else{
            $RSCC =  "0.00";
            $actsOfNature =  "0.00";
            $finalDue = number_format($cocogen_compre_carinfo[0]['finalDue'], 2, '.', ',');
        }

       
        $data = array('assured'=>$assured, 
                    'address'=>$address,
                    'model'=>$model, 
                    'txnid'=>$txnid, 
                    'bodyType'=>$bodyType, 
                    'color'=>$color,
                    'chassisNo'=>$chassisNo, 
                    'engineNo'=>$engineNo, 
                    'plateNo'=>$plateNo, 
                    'inceptDate'=>$inceptDate, 
                    'ODTheft'=>$ODTheft,
                    'mortgagee'=>$mortgagee,
                    'deductible'=>$deductible,
                    'bodilyInjury'=>$bodilyInjury, 
                    'propertyDamage'=>$propertyDamage,
                    'autoPA'=>$autoPA, 
                    'actsOfNature'=>$actsOfNature, 
                    'promoCode'=>$promoCode, 
                    'RSCC'=>$RSCC,  
                    'finalDue'=>$finalDue);
        $hasht = Hash::make($txnid.'-COCCOMPRE');

        $cocogen_compre_file = new cocogen_compre_file;
        $cocogen_compre_file->tnxid = $txnid; 
        $cocogen_compre_file->filename =  md5($hasht).'-COCCOMPRE'; 
        $cocogen_compre_file->fileLocation = 'public/pdf/compre/'. md5($hasht).'-COCCOMPRE.pdf'; 
        $cocogen_compre_file->save(); 
        
        $pdf = PDF::loadView('pdf.comprepdfsample', $data);
        Storage::put('public/pdf/compre/'. md5($hasht).'-COCCOMPRE.pdf', $pdf->output());
         return $pdf->download('COMPRECTPL.pdf');

    }

    public function downloadepartnerhubcomprecoc($filename,$txnid){
      
            $tnxid = base64_decode($txnid);
            $s ="/";
            $s2 = substr($s, 0,1);
            //$slash = substr($s2,0, -1);
            $files = cocogen_compre_file::where('tnxid', '=', $tnxid)->get();
            $file_path = storage_path('app') . $s2 .$files['0']['fileLocation'];
            //$file_path = "/var/www/html/cocogen/storage/app/" .$files['0']['fileLocation']; 
          return response()->file($file_path);
    }

    public function emailsendQuote($fname, $email, $emailto, $pol,$text) {
        $data = array('fname'=>$fname, 'email'=>$email,'emailto'=>$emailto,'pol'=>$pol,'text'=>$text);
            Mail::send('emailtemplate.epartnerhub_compre', $data, function($message) use ($fname, $email, $emailto, $pol, $text)
              {
                 $message->to($emailto, 'COCOGEN')->subject('Epartnerhub Send Email: '. $pol);
              });
           
    }

    public function epartnerhubcompreSENDPerPagePage6(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        if(!$request->get('editID')){
            //page1
            $cocogen_epartnerhub_compre_trans = new cocogen_epartnerhub_compre_trans;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  =$request->get('premWithAOM');

            //page 3

            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 

            //page 4
            $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
            $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
            $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
            $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
            $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
            $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
            $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
            $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
            $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
            $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
            $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
            $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
            $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
            $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay');  
            
            //page5
            $cocogen_epartnerhub_compre_trans->permanentAddress  = $request->get('permanent_address'); 
            $cocogen_epartnerhub_compre_trans->permanentProvince  = $request->get('permanent_province'); 
            $cocogen_epartnerhub_compre_trans->permanentMunicipality  = $request->get('permanent_municipality'); 
            $cocogen_epartnerhub_compre_trans->permanentBarangay  = $request->get('permanent_barangay'); 
            $cocogen_epartnerhub_compre_trans->nationality  = $request->get('nationality'); 
            $cocogen_epartnerhub_compre_trans->occupation  = $request->get('occupation'); 
            $cocogen_epartnerhub_compre_trans->telNo  = $request->get('telno'); 
            $cocogen_epartnerhub_compre_trans->sourceofFund  = $request->get('sourceoffund'); 
            $cocogen_epartnerhub_compre_trans->typeofID  = $request->get('typeofid'); 
            $cocogen_epartnerhub_compre_trans->idno  = $request->get('idno'); 
            $cocogen_epartnerhub_compre_trans->emailsendTO  = $request->get('send_email_mail'); 

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $cocogen_epartnerhub_compre_trans->id;
            $inserted_ids  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();

                $this->downloadPDFEpartnerhubCompre($inserted_id);
               // $cocogen_epartner_compre_file = cocogen_epartner_compre_file::where('tnxid', '=', $inserted_id)->get();
               // $location = storage_path('app') . "/" . $cocogen_epartner_compre_file[0]["fileLocation"];

               //$txnids = "MC-EPARTNERTest-23-COMPRE-0000002";
               //$cocogen_epartner_compre_file = cocogen_epartner_compre_file::where('tnxid', '=', $tnxid)->get();
               $cocogen_epartner_compre_file = cocogen_epartner_compre_file::where('tnxid', '=', $tnxid)->latest('created_at')->first();
               $location = storage_path('app') . "/" . $cocogen_epartner_compre_file["fileLocation"];
               $fname =  $request->get('fname') ." ". $request->get('mname') ." ". $request->get('lname');
            //    $email  = $request->get('send_email_mail'); 
            //    $emailto= $request->get('send_email_mail'); 
            //    $pol= $tnxid;
            //    $text="text";
            //    $amountT = str_replace( ",", "", $request->get('grossprem'));
            //     $amountComma = str_replace( ",", "", $request->get('grossprem'));
            //     $digest1 = env('MERCHANT_ID') . ':' . $transno . ':' . $amountT . ':' . 'PHP' . ':' . $transno . ':' . $request->get('email') . ':' . env('MERCHANT_PASSWORD');
            //     $digest = sha1(env('MERCHANT_ID') . ':' . $transno . ':' . $amountT . ':' . 'PHP' . ':' . $transno . ':' . $request->get('email') . ':' . env('MERCHANT_PASSWORD'));
            //     $paymemtlinklimk = env('DRAGONPAY_LINK') . '?merchantid=' . env('MERCHANT_ID') . '&txnid=' . $transno . '&amount=' . $amountT . '&ccy=' . 'PHP' . '&description=' . $transno . '&email=' . $request->get('email') . '&digest=' . $digest . '&param1=' . $amountT . '&param2=' . $request->get('email') . '&mode=1';
                //dd($digest,$digest1,$limk);
               //$this->emailsendDomesticExternal($fname, $email, $emailto, $pol,$text,$location,\Auth::user()->name,$paymemtlinklimk);


            }
            return response()->json($inserted_id, 201);
        }else{

            //page1
            $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($request->get('editID'));;
            $cocogen_epartnerhub_compre_trans->status  = "Saved"; 
            $cocogen_epartnerhub_compre_trans->year  = $request->get('year'); 
            $cocogen_epartnerhub_compre_trans->brand  = $request->get('brand'); 
            $cocogen_epartnerhub_compre_trans->model  = $request->get('model'); 
            $cocogen_epartnerhub_compre_trans->maketValue  = str_replace( ",", "", $request->get('totalValue')); 
            $cocogen_epartnerhub_compre_trans->createdby  = \Auth::user()->email; 
            $cocogen_epartnerhub_compre_trans->bi  = str_replace( ",", "", $request->get('bodilyInjury')); 
            $cocogen_epartnerhub_compre_trans->pd  = str_replace( ",", "", $request->get('propertyDamage')); 

            //page 2
            $cocogen_epartnerhub_compre_trans->maketValue  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->netPrem  = str_replace( ",", "", $request->get('hd_netprem'));
            $cocogen_epartnerhub_compre_trans->duePrem  = str_replace( ",", "", $request->get('grossprem'));
            $cocogen_epartnerhub_compre_trans->dst  = str_replace( ",", "", $request->get('hd_dst'));
            $cocogen_epartnerhub_compre_trans->vat  = str_replace( ",", "", $request->get('hd_vat'));
            $cocogen_epartnerhub_compre_trans->lgt  =  str_replace( ",", "", $request->get('hd_lgt'));
            $cocogen_epartnerhub_compre_trans->totalValue  = str_replace( ",", "", $request->get('totalValue'));
            $cocogen_epartnerhub_compre_trans->deductible  = str_replace( ",", "", $request->get('hd_deduc'));
            $cocogen_epartnerhub_compre_trans->aonPrem  = str_replace( ",", "", $request->get('hd_aon_prem'));
            $cocogen_epartnerhub_compre_trans->aon  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheft  = $request->get('totalvalhid'); 
            $cocogen_epartnerhub_compre_trans->odTheftPrem  = $request->get('hd_odtheft'); 
            $cocogen_epartnerhub_compre_trans->biPrem  = $request->get('hd_bi_prem'); 
            $cocogen_epartnerhub_compre_trans->pdPrem  = $request->get('hd_pd_prem'); 
            $cocogen_epartnerhub_compre_trans->withAON  = $request->get('premWithAOM');

            //page 3
            $policyincept = date('Y-m-d', strtotime($request->get('policyincept')));
            $policExpiry = date('Y-m-d', strtotime($request->get('policyincept'). ' + 1 years'));
            $cocogen_epartnerhub_compre_trans->mvFileNo  = $request->get('mvfileno'); 
            $cocogen_epartnerhub_compre_trans->plateNo  = $request->get('plateno'); 
            $cocogen_epartnerhub_compre_trans->engineNo  = $request->get('engineno'); 
            $cocogen_epartnerhub_compre_trans->color  = $request->get('color'); 
            $cocogen_epartnerhub_compre_trans->conduction  = $request->get('conduction'); 
            $cocogen_epartnerhub_compre_trans->policyIncept  =  $policyincept;
            $cocogen_epartnerhub_compre_trans->policExpiry  = $policExpiry; 
            $cocogen_epartnerhub_compre_trans->mortgagee  = $request->get('morgagee'); 


            //page 4
            $dateofbirth = date('Y-m-d', strtotime($request->get('dateofbirth')));
            $cocogen_epartnerhub_compre_trans->fName  = $request->get('fname'); 
            $cocogen_epartnerhub_compre_trans->MName  = $request->get('mname'); 
            $cocogen_epartnerhub_compre_trans->lName  = $request->get('lname'); 
            $cocogen_epartnerhub_compre_trans->mobileNo  = $request->get('mobileno'); 
            $cocogen_epartnerhub_compre_trans->email  = $request->get('email'); 
            $cocogen_epartnerhub_compre_trans->gender  = $request->get('gender'); 
            $cocogen_epartnerhub_compre_trans->dateofbBirth  = $dateofbirth; 
            $cocogen_epartnerhub_compre_trans->placeofBirth  = $request->get('placeofbirth'); 
            $cocogen_epartnerhub_compre_trans->civilStatus  = $request->get('civilstatus'); 
            $cocogen_epartnerhub_compre_trans->residenceAddress  = $request->get('residence_address'); 
            $cocogen_epartnerhub_compre_trans->residenceProvince  = $request->get('residence_province'); 
            $cocogen_epartnerhub_compre_trans->residenceMunicipality  = $request->get('residence_municipality'); 
            $cocogen_epartnerhub_compre_trans->residenceBarangay  = $request->get('residence_barangay');  
            
            //page5
            $cocogen_epartnerhub_compre_trans->permanentAddress  = $request->get('permanent_address'); 
            $cocogen_epartnerhub_compre_trans->permanentProvince  = $request->get('permanent_province'); 
            $cocogen_epartnerhub_compre_trans->permanentMunicipality  = $request->get('permanent_municipality'); 
            $cocogen_epartnerhub_compre_trans->permanentBarangay  = $request->get('permanent_barangay'); 
            $cocogen_epartnerhub_compre_trans->nationality  = $request->get('nationality'); 
            $cocogen_epartnerhub_compre_trans->occupation  = $request->get('occupation'); 
            $cocogen_epartnerhub_compre_trans->telNo  = $request->get('telno'); 
            $cocogen_epartnerhub_compre_trans->sourceofFund  = $request->get('sourceoffund'); 
            $cocogen_epartnerhub_compre_trans->typeofID  = $request->get('typeofid'); 
            $cocogen_epartnerhub_compre_trans->idno  = $request->get('idno'); 
            $cocogen_epartnerhub_compre_trans->emailsendTO  = $request->get('send_email_mail'); 

            $cocogen_epartnerhub_compre_trans->created_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->updated_at  = $datenow; 
            $cocogen_epartnerhub_compre_trans->save();
            $inserted_id = $request->get('editID');
            $inserted_ids  = str_pad($request->get('editID'), 7, '0', STR_PAD_LEFT);

            if($inserted_id){
                $tnxid = "MC-". "EPARTNERTest-" .date('y') . "-COMPRE-". $inserted_ids;
                $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::findorFail($inserted_id);
                $cocogen_epartnerhub_compre_trans->transid = $tnxid; 
                $cocogen_epartnerhub_compre_trans->save();

                $this->downloadPDFEpartnerhubCompre($inserted_id);
                //$txnids = "MC-EPARTNERTest-23-COMPRE-0000002";
                $cocogen_epartner_compre_file = cocogen_epartner_compre_file::where('tnxid', '=', $tnxid)->get();
                $location = storage_path('app') . "/" . $cocogen_epartner_compre_file[0]["fileLocation"];
                $fname =  $request->get('fname') ." ". $request->get('mname') ." ". $request->get('lname');
                $email  = $request->get('send_email_mail'); 
                $emailto= $request->get('send_email_mail'); 
                $pol= $tnxid;
                $transno= $tnxid;
                $text="text";

                $amountT = number_format((float)$totalAmount, 2, '.', ''); str_replace( ",", "", $request->get('grossprem'));;
                $amountComma = str_replace( ",", "", $request->get('grossprem'));;
                $digest1 = env('MERCHANT_ID') . ':' . $transno . ':' . $amountT . ':' . 'PHP' . ':' . $transno . ':' . $request->get('send_email_mail') . ':' . env('MERCHANT_PASSWORD');
                $digest = sha1(env('MERCHANT_ID') . ':' . $transno . ':' . $amountT . ':' . 'PHP' . ':' . $transno . ':' . $request->get('send_email_mail') . ':' . env('MERCHANT_PASSWORD'));
                $paymemtlinklimk = env('DRAGONPAY_LINK') . '?merchantid=' . env('MERCHANT_ID') . '&txnid=' . $transno . '&amount=' . $amountT . '&ccy=' . 'PHP' . '&description=' . $transno . '&email=' . $request->get('send_email_mail') . '&digest=' . $digest . '&param1=' . $amountT . '&param2=' . $request->get('send_email_mail') . '&mode=1';
                //dd($digest,$digest1,$limk);

                $this->emailsendDomesticExternal($fname, $email, $emailto, $pol,$text,$location,\Auth::user()->name,$paymemtlinklimk );


            }
            return response()->json($inserted_id, 201);
        }
    }

    public function emailsendDomesticExternal($fname, $email, $emailto, $pol,$text,$location,$agentname,$paymemtlinklim)
    {
        $data = array('fname'=>$fname, 'email'=>$email,'emailto'=>$emailto,'pol' => $pol,'text' => $text,'location' => $location,'agentname' => $agentname,'paymemtlinklim' => $paymemtlinklim);
        Mail::send('emailtemplate.epartnerhub_compre', $data, function($message) use ($fname, $email, $emailto, $pol,$text,$location,$agentname,$paymemtlinklim)
        {
            $message->to($email, 'COCOGEN')->subject($fname.', Send Quote Link')->from('client_services@cocogen.com', 'COCOGEN');
            $message->attach($location, array(
                    'as'    => "PolicyDocs". "-" . $fname . ".pdf",
                    'mime'  => 'application/pdf'
                ));
        });
    }

    public function downloadPDFEpartnerhubCompre($txnid)
    {
       // $txnid = "MC-EPARTNERTest-23-COMPRE-0000002";
        $cocogen_epartnerhub_compre_trans = cocogen_epartnerhub_compre_trans::where('id', '=', $txnid)->get();
            // $futureDate = date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['created_at'])));
        if(count($cocogen_epartnerhub_compre_trans) > 0){

                    //get age
                    $created_at = date('F d, Y', strtotime($cocogen_epartnerhub_compre_trans[0]['created_at']));
                    $bday = date('F d, Y', strtotime($cocogen_epartnerhub_compre_trans[0]['dateofbBirth']));
                    $trans_id = $cocogen_epartnerhub_compre_trans[0]['transid'];
                    $mobileNo = $cocogen_epartnerhub_compre_trans[0]['mobileNo'];
                    $occupation = $cocogen_epartnerhub_compre_trans[0]['occupation'];
                    $year = $cocogen_epartnerhub_compre_trans[0]['year'];
                    $brand = $cocogen_epartnerhub_compre_trans[0]['brand'];
                    $model = $cocogen_epartnerhub_compre_trans[0]['model'];
                    $email = $cocogen_epartnerhub_compre_trans[0]['email'];
                    $maketValue = $cocogen_epartnerhub_compre_trans[0]['maketValue'];
                    $full_name  = $cocogen_epartnerhub_compre_trans[0]['lName'] . ", " . $cocogen_epartnerhub_compre_trans[0]['fName'] . " ". substr($cocogen_epartnerhub_compre_trans[0]['MName'], 0, 1) . ".";
                    $address  = $cocogen_epartnerhub_compre_trans[0]['permanentAddress'] . ", " . $cocogen_epartnerhub_compre_trans[0]['permanentBarangay'] . ", ". $cocogen_epartnerhub_compre_trans[0]['permanentMunicipality'].  ", ". $cocogen_epartnerhub_compre_trans[0]['permanentProvince']. ".";

                    $maketValue = number_format($maketValue, 2, '.', ',');
                    $netPrem = number_format($cocogen_epartnerhub_compre_trans[0]['netPrem'], 2, '.', ',');
                    $dst = number_format($cocogen_epartnerhub_compre_trans[0]['dst'], 2, '.', ',');
                    $vat = number_format($cocogen_epartnerhub_compre_trans[0]['vat'], 2, '.', ',');
                    $lgt = number_format($cocogen_epartnerhub_compre_trans[0]['lgt'], 2, '.', ',');
                    $odTheft = number_format($cocogen_epartnerhub_compre_trans[0]['odTheft'], 2, '.', ',');
                    $bi = number_format($cocogen_epartnerhub_compre_trans[0]['bi'], 2, '.', ',');
                    $pd = number_format($cocogen_epartnerhub_compre_trans[0]['pd'], 2, '.', ',');
                    $duePrem = number_format($cocogen_epartnerhub_compre_trans[0]['duePrem'], 2, '.', ',');
                    $aonAmount = number_format($cocogen_epartnerhub_compre_trans[0]['aon'], 2, '.', ',');
                    $deductible = number_format($cocogen_epartnerhub_compre_trans[0]['deductible'], 2, '.', ',');

                    $policyIncept = date('F d, Y', strtotime($cocogen_epartnerhub_compre_trans[0]['policyIncept']));
                    $policExpiry = date('F d, Y', strtotime($cocogen_epartnerhub_compre_trans[0]['policExpiry']));
                    $policyperiod = $policyIncept . " - ". $policExpiry;
                    
                    $aon = "";
                    if($cocogen_epartnerhub_compre_trans[0]['withAON'] === "No"){
                        $aon = "Option II w/o AON";
                    }else{
                        $aon = "Option I w/ AON";
                    }
                   
                    $data = array(
                        'created_at' => $created_at,
                        'bday' => $bday,
                        'full_name' => $full_name,
                        'occupation' => $occupation,
                        'mobileNo' => $mobileNo,
                        'year' => $year,
                        'brand' => $brand,
                        'model' => $model,
                        'address' => $address,
                        'email' => $email,
                        'maketValue' => $maketValue,
                        'policyperiod' => $policyperiod,
                        'aon' => $aon,
                        'netPrem' => $netPrem,
                        'dst' => $dst,
                        'vat' => $vat,
                        'lgt' => $lgt,
                        'duePrem' => $duePrem,
                        'odTheft' => $odTheft,
                        'bi' => $bi,
                        'pd' => $pd,
                        'aonAmount' => $aonAmount,
                        'deductible' => $deductible,
                        'trans_id' => $trans_id
                    );

                    $hasht = Hash::make($trans_id . '-Epartnerhub-Compre');

                    $cocogen_epartner_compre_file = new cocogen_epartner_compre_file;
                    $cocogen_epartner_compre_file->tnxid = $trans_id;
                    $cocogen_epartner_compre_file->filename =  md5($hasht) . '-Epartnerhub-Compre';
                    $cocogen_epartner_compre_file->fileLocation = 'public/pdf/epartnerhubCompre/' . md5($hasht) . '-Epartnerhub-Compre.pdf';
                    $cocogen_epartner_compre_file->save();

                    $pdf = PDF::loadView('pdf.epartnerhubCompre', $data);

                    Storage::put('public/pdf/epartnerhubCompre/' . md5($hasht) . '-Epartnerhub-Compre.pdf', $pdf->output());
                    //return $pdf->download('-Epartnerhub-Compre.pdf');
                //dd($cover_item1,$cover_item4,$cover_item5,$cover_item6,$relation1, $relation2, $relation3,$name1, $name2, $name3,$age,$bday, $destinations, count($cocogen_domestic_trans_destination), $address,$full_name, $trans_id, $created_at, $from_date, $to_date);

        }
    }

    public function emailsendctpl($fname, $email, $content,$location)
    {
        $data = array('fname' => $fname, 'email' => $email, 'content' => $content,'location' => $location);
        Mail::send('emailtemplate.ctplexternal', $data, function ($message) use ($fname, $email, $content,$location) {
            $message->to($email, 'COCOGEN')->subject($fname . ', here are your CTPL insurance policies')->from('client_services@cocogen.com', 'COCOGEN');
            $message->attach($location, array(
                'as'    => "COC". "-" . $fname . ".pdf",
                'mime'  => 'application/pdf'
            ));
        });
    }

    public function emailsendctplinternal($fname, $email, $contactNo, $dtnow, $location)
    {
        $data = array('fname' => $fname, 'email' => $email, 'contactNo' => $contactNo, 'dtnow' => $dtnow, 'location' => $location);
        Mail::send('emailtemplate.ctplinternal_epartnerhub', $data, function ($message) use ($fname, $email, $contactNo, $dtnow, $location) {
            $message->to("christian_kee@cocogen.com", 'COCOGEN')->subject('Successful CTPL E-Commrce transaction: ' . $fname)->from('client_services@cocogen.com', 'COCOGEN');
            $message->attach($location, array(
                'as'    => "COC". "-" . $fname . ".pdf",
                'mime'  => 'application/pdf'
            ));
        });
    }



    public function downloadPDFCTPL($txnid, $authno)
    {
        // $user = UserDetail::find($id);
        $cocogen_epartnerhub_personal_info = cocogen_epartnerhub_personal_info::where('transno', '=', $txnid)->get();

        $full = $cocogen_epartnerhub_personal_info[0]['firstName'] . " " . $cocogen_epartnerhub_personal_info[0]['middleName'] . " " . $cocogen_epartnerhub_personal_info[0]['lastName'];
        $address = $cocogen_epartnerhub_personal_info[0]['presentAddress']. ", " . $cocogen_epartnerhub_personal_info[0]['barangay'] . ", " . $cocogen_epartnerhub_personal_info[0]['municipality']. ", " .$cocogen_epartnerhub_personal_info[0]['province']; 
        $authNo = $authno;
        $cocNO = $cocogen_epartnerhub_personal_info[0]['cocno'];
        $make = $cocogen_epartnerhub_personal_info[0]['vehicleMake'];
        $bodyType = $cocogen_epartnerhub_personal_info[0]['vehicleType'];
        $chassisNo = $cocogen_epartnerhub_personal_info[0]['chassisNo'];
        $engineNO = $cocogen_epartnerhub_personal_info[0]['engineNo'];
        $premium = $cocogen_epartnerhub_personal_info[0]['premium'];
        $english_format_number = number_format($premium, 2, '.', ',');


        if ($cocogen_epartnerhub_personal_info[0]['brand_new'] == "Y") {
            $dtCreated = date('m/d/Y', strtotime($cocogen_quote_requests[0]['purchaseDate']));
            $futureDate = date("m/d/Y", strtotime(date("m/d/Y", strtotime($dtCreated)) . " + 3 year"));
            $mvFIleNo = "";
            $plateNo = "";
        } else {
            $mvFIleNo = $cocogen_epartnerhub_personal_info[0]['mvFileNo'];
            $plateNo = $cocogen_epartnerhub_personal_info[0]['plateNo'];
            $plate = $cocogen_epartnerhub_personal_info[0]['plateNo'];
            $dateINEX = substr($plate, -1);
            if ($dateINEX == 1) {
                $dtCreated = "02/01/" . date('Y');
                $futureDate = "02/28/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 2) {
                $dtCreated = "03/01/" . date('Y');
                $futureDate = "03/31/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 3) {
                $dtCreated = "04/01/" . date('Y');
                $futureDate = "04/30/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 4) {
                $dtCreated = "05/01/" . date('Y');
                $futureDate = "05/31/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 5) {
                $dtCreated = "06/01/" . date('Y');
                $futureDate = "06/30/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 6) {
                $dtCreated = "07/01/" . date('Y');
                $futureDate = "07/31/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 7) {
                $dtCreated = "08/01/" . date('Y');
                $futureDate = "08/31/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 8) {
                $dtCreated = "09/01/" . date('Y');
                $futureDate = "09/30/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 9) {
                $dtCreated = "10/01/" . date('Y');
                $futureDate = "10/31/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 0) {
                $dtCreated = "01/01/" . date('Y');
                $futureDate = "01/31/" . date('Y', strtotime('+1 years'));
            } else {
                $dtCreated = "01/01/" . date('Y');
                $futureDate = "01/31/" . date('Y', strtotime('+1 years'));
            }
        }

        $data = array(
            'name' => $full,
            'address' => $address,
            'authNo' => $authNo,
            'txnid' => $txnid,
            'cocNO' => $cocNO,
            'dtCreated' => $dtCreated,
            'futureDate' => $futureDate,
            'make' => $make,
            'bodyType' => $bodyType,
            'mvFIleNo' => $mvFIleNo,
            'plateNo' => $plateNo,
            'chassisNo' => $chassisNo,
            'engineNO' => $engineNO,
            'premium' => $english_format_number
        );

        $hasht = Hash::make($txnid . '-COCCTPL');
        $cocogen_epartnerhub_personal_info_file = new cocogen_epartnerhub_personal_info_file;
        $cocogen_epartnerhub_personal_info_file->tnxid = $txnid;
        $cocogen_epartnerhub_personal_info_file->filename =  md5($hasht) . '-COCCTPL.pdf';
        $cocogen_epartnerhub_personal_info_file->fileLocation = 'public/pdf/epartnerhub/ctpl/' .  md5($hasht) . '-COCCTPL.pdf';
        $cocogen_epartnerhub_personal_info_file->save();

        $pdf = PDF::loadView('pdf.pdfsample', $data);
        Storage::put('public/pdf/epartnerhub/ctpl/' . md5($hasht) . '-COCCTPL.pdf', $pdf->output());
        return $pdf->download('COCCTPL.pdf');
    }

    //Generate and send email  Larren
    // MOTOR TEMPLATE
    public function ehubdownloadPDFCOMPRE($txnid){
    
        $ehubcompre= cocogen_epartnerhub_compre_trans::where('id', '=', $txnid)->get();
 
        foreach($ehubcompre as $ehub_compre){
            $issuedate = $ehub_compre['created_at'];
            $invoiceno ='Invoice No-23-0000191-00'; //Invoice Number // STATIC VALUE 
            $insured = $ehub_compre['fName'].','.$ehub_compre['Mname'].','.$ehub_compre['lName'];
            $address = $ehub_compre['residenceAddress'];
            $produceragentname ="ICHOOSE INSURANCE AGENCY"; // Agent name 
            $produceragentcode= "9141"; //agent code
            $vehicletype =$ehub_compre['classVehicle']; //Vehicle type
            $caryear = $ehub_compre['year']; //Car Year
            $carbrand = $ehub_compre['brand'];// CAR  BRAND
            $carmodel = $ehub_compre['model'];// CAR MODEL
            $policyno = $ehub_compre['transid'];
            $suminsured = number_format($ehub_compre['ODTheft'],2, '.', ','); // Sum Insured 
            $premvat =  number_format($ehub_compre['duePrem'],2, '.', ','); // 
            $fromdate=$ehub_compre['policyIncept'];
            $todate=$ehub_compre['policExpiry'];
            $dst = $ehub_compre['dst'];//DOCUMENTARY STAMPS
            $vat =  $ehub_compre['vat'];// VALUE ADDED TAX
            $lgt = $ehub_compre['lgt'];// LOCAL GOVERNMETN TAX
            $totaldue = $ehub_compre['totalValue'];// TOTAL AMOUNT DUE
            $mortgagee= $ehub_compre['mortgagee'];// MOrtgage
            $owndamage=  number_format($ehub_compre['odTheftPrem'], 2, '.', ','); 
            $plateNo =  $ehub_compre['plateNo'];
            $engineNo = $ehub_compre['engineNO'];
            $chasisNo=  $ehub_compre['chassisNo'];
            $color =  $ehub_compre['color'];
            $vtplbodyinjury = number_format($ehub_compre['bi'], 2, '.', ',');
            $vtplpropertydamage = number_format($ehub_compre['pd'], 2, '.', ',');
            $mvFileNo = $ehub_compre['mvFileNo']; // MV FILE NO.
            $autoPersonalAccident = number_format($ehub_compre['AUPA'], 2, '.', ',');
            $rscc = number_format($ehub_compre['rscc'], 2, '.', ',');
            $seatcapacity = '5'; // STATIC VALUE 
            // $actofnature ='0'; 
            $withactofnature =  $ehub_compre['aon'];
            $cocNo ='COCNO';
            $accessories= '';//ACCESSORY  IF There is no accessory display none else segregate the accessory by rtrim($accessories, ',')
            $deductible =' 1.0% of the sum insured, minimum of Php 3,000.00 each and every loss'; // Deductible 

        }
        $header= public_path('images').'/motor_net/cocogen_header.png';
        $footer= public_path('images').'/motor_net/cocogen_footer.png';
        $imagePath = public_path('images').'/motor_net/padinsig.png';
        $data = array(
            'invoiceno' => $invoiceno, // You need to replace $invoiceno with the actual value
            'insured' => $insured, // Replace with actual value
            'address' => $address,
            'produceragentname' => $produceragentname,
            'produceragentcode' => $produceragentcode,
            'caryear'=>$caryear,
            'carbrand'=>$carbrand,
            'carmodel'=>$carmodel,
            'vehicletype' => $vehicletype,
            'policyno' => $policyno,
            'suminsured' => $suminsured,
            'premvat' => $premvat,
            'fromdate' => $fromdate,
            'todate' => $todate,
            'dst' => $dst,
            'vat' => $vat,
            'lgt' => $lgt,
            'totaldue' => $totaldue,
            'issuedate' => $issuedate,
            'mortgagee' => $mortgagee,
            'owndamage' => $owndamage,
            // 'actofnature' => $actofnature,
            'withactofnature' => $withactofnature,
            'plateno' => $plateNo,
            'vtplbodyinjury' => $vtplbodyinjury,
            'egineNo' => $engineNo,
            'vtplpropertydamage' => $vtplpropertydamage,
            'chasisNo' => $chasisNo,
            'autoPersonalAccident' => $autoPersonalAccident,
            'mvFileNo' => $mvFileNo,
            'rscc' => $rscc,
            'seatcapacity' => $seatcapacity,
            'color' => $color,
            'cocNo'=> $cocNo,
            'accessories' => $accessories,
            'deductible' => $deductible,
            'header'=>$header,
            'footer'=>$footer,
            'imagePath'=>$imagePath,
        );
        
        $hasht = Hash::make($txnid.'-COCCOMPRE');
        // Define the data for the record
        $datax = [
            'tnxid' => $txnid,
            'filename' => $hasht.'-COCCOMPRE.pdf',
            'fileLocation' => 'public/pdf/ehubcompre/'.$hasht.'-COCCOMPRE.pdf',
            // Add other fields and values as needed
        ];
        // Use updateOrInsert to create or update the record
        cocogen_epartnerhub_compre_files::updateOrInsert(
            ['tnxid' => $txnid], // The conditions to find the record (update if exists)
            $datax // The data to insert or update
        );
    $pdf = PDF::loadView('pdf.epartnerhub_motor', $data);
    Storage::put('public/pdf/ehubcompre/'.$hasht.'-COCCOMPRE.pdf', $pdf->output());
    return $pdf->download('COMPRECTPL.pdf');

    }

    public function ehubviewpdf($txnid){
        $txnid = base64_decode($txnid);
        $ehubcompre= cocogen_epartnerhub_compre_trans::where('id', '=', $txnid)->get();
        foreach($ehubcompre as $ehub_compre){
            $issuedate = $ehub_compre['created_at'];
            $invoiceno ='Invoice No-23-0000191-00'; //Invoice Number // STATIC VALUE 
            $insured = $ehub_compre['fName'].','.$ehub_compre['Mname'].','.$ehub_compre['lName'];
            $address = $ehub_compre['residenceAddress'];
            $produceragentname =""; // Agent name 
            $produceragentcode= ""; //agent code
            $vehicletype =$ehub_compre['classVehicle']; //Vehicle type
            $caryear = $ehub_compre['year']; //Car Year
            $carbrand = $ehub_compre['brand'];// CAR  BRAND
            $carmodel = $ehub_compre['model'];// CAR MODEL
            $policyno = $ehub_compre['transid'];
            $suminsured = number_format($ehub_compre['ODTheft'],2, '.', ','); // Sum Insured 
            $premvat =  number_format($ehub_compre['duePrem'],2, '.', ','); // 
            $fromdate=$ehub_compre['policyIncept'];
            $todate=$ehub_compre['policExpiry'];
            $dst = $ehub_compre['dst'];//DOCUMENTARY STAMPS
            $vat =  $ehub_compre['vat'];// VALUE ADDED TAX
            $lgt = $ehub_compre['lgt'];// LOCAL GOVERNMETN TAX
            $totaldue = $ehub_compre['totalValue'];// TOTAL AMOUNT DUE
            $mortgagee= $ehub_compre['mortgagee'];// MOrtgage
            $owndamage=  number_format($ehub_compre['odTheftPrem'], 2, '.', ','); 
            $plateNo =  $ehub_compre['plateNo'];
            $engineNo = $ehub_compre['engineNO'];
            $chasisNo=  $ehub_compre['chassisNo'];
            $color =  $ehub_compre['color'];
            $vtplbodyinjury = number_format($ehub_compre['bi'], 2, '.', ',');
            $vtplpropertydamage = number_format($ehub_compre['pd'], 2, '.', ',');
            $mvFileNo = $ehub_compre['mvFileNo']; // MV FILE NO.
            $autoPersonalAccident = number_format($ehub_compre['AUPA'], 2, '.', ',');
            $rscc = number_format($ehub_compre['rscc'], 2, '.', ',');
            $seatcapacity = '5'; // STATIC VALUE 
            // $actofnature ='0'; 
            $withactofnature =  $ehub_compre['aon'];
            $cocNo ='';
            $accessories= '';//ACCESSORY  IF There is no accessory display none else segregate the accessory by rtrim($accessories, ',')
            $deductible =' 1.0% of the sum insured, minimum of Php 3,000.00 each and every loss'; // Deductible 

        }
        $header= public_path('images').'/motor_net/cocogen_header.png';
        $footer= public_path('images').'/motor_net/cocogen_footer.png';
        $imagePath = public_path('images').'/motor_net/padinsig.png';
        $data = array(
            'invoiceno' => $invoiceno, // You need to replace $invoiceno with the actual value
            'insured' => $insured, // Replace with actual value
            'address' => $address,
            'produceragentname' => $produceragentname,
            'produceragentcode' => $produceragentcode,
            'caryear'=>$caryear,
            'carbrand'=>$carbrand,
            'carmodel'=>$carmodel,
            'vehicletype' => $vehicletype,
            'policyno' => $policyno,
            'suminsured' => $suminsured,
            'premvat' => $premvat,
            'fromdate' => $fromdate,
            'todate' => $todate,
            'dst' => $dst,
            'vat' => $vat,
            'lgt' => $lgt,
            'totaldue' => $totaldue,
            'issuedate' => $issuedate,
            'mortgagee' => $mortgagee,
            'owndamage' => $owndamage,
            // 'actofnature' => $actofnature,
            'withactofnature' => $withactofnature,
            'plateno' => $plateNo,
            'vtplbodyinjury' => $vtplbodyinjury,
            'egineNo' => $engineNo,
            'vtplpropertydamage' => $vtplpropertydamage,
            'chasisNo' => $chasisNo,
            'autoPersonalAccident' => $autoPersonalAccident,
            'mvFileNo' => $mvFileNo,
            'rscc' => $rscc,
            'seatcapacity' => $seatcapacity,
            'color' => $color,
            'cocNo'=> $cocNo,
            'accessories' => $accessories,
            'deductible' => $deductible,
            'header'=>$header,
            'footer'=>$footer,
            'imagePath'=>$imagePath,
        );
        
        $hasht = Hash::make($txnid.'-COCCOMPRE');
        // Define the data for the record
        $datax = [
            'tnxid' => $txnid,
            'filename' => $hasht.'-COCCOMPRE.pdf',
            'fileLocation' => 'public/pdf/ehubcompre/'.$hasht.'-COCCOMPRE.pdf',
            // Add other fields and values as needed
        ];
        // Use updateOrInsert to create or update the record
        cocogen_epartnerhub_compre_files::updateOrInsert(
            ['tnxid' => $txnid], // The conditions to find the record (update if exists)
            $datax // The data to insert or update
        );
        $pdf = PDF::loadView('pdf.epartnerhub_motor', $data);
        Storage::put('public/pdf/ehubcompre/'.$hasht.'-COCCOMPRE.pdf', $pdf->output());

        $file = cocogen_epartnerhub_compre_files::where('tnxid', $txnid)->first();
  
        // Check if the file exists
        if ($file) {
         
            $filePath = storage_path('app/'.$file->fileLocation); // Adjust the path as needed
         
            // Check if the file exists in the storage path
            if (file_exists($filePath)) {
                // Display the PDF in the browser
                return response()->file($filePath, ['Content-Type' => 'application/pdf']);
            } else {
                // Handle file not found
                return response()->json(['error' => 'PDF file not found.'], 404);
            }
        } else {
            // Handle record not found
            return response()->json(['error' => 'Record not found.'], 404);
        }
    }

    //BANK CERT
    public function ebankcertPdf($txnid){
    
        $ehub= cocogen_epartnerhub_compre_trans::where('id', '=', $txnid)->get();
 
        foreach($ehub as $getehub){
                $txnid = $getehub['transid'];
                $policyNo = $getehub['transid'];
                $policypPeriodStart=$getehub['policyIncept'];
                $policyPeriodEnd=$getehub['policExpiry'];
                $assured = $getehub['fName'].','.$getehub['Mname'].','.$getehub['lName'];
                $model = $getehub['year'].' '.$getehub['brand'].' '.$getehub['model'];
                $plateNo =  $getehub['plateNo'];
                $engineNo = $getehub['engineNO'];
                $chassisNo=  $getehub['chassisNo'];
                $color =  $getehub['color'];
              
                $ODTheft = number_format($getehub['odTheftPrem'], 2, '.', ','); // Format with 2 decimal places, comma as a thousands separator
                $theft = number_format($getehub['odTheft'], 2, '.', ',');
                $bodilyInjury = number_format($getehub['bi'], 2, '.', ',');
                $propertyDamage = number_format($getehub['pd'], 2, '.', ',');
                $aon = number_format($getehub['aon'], 2, '.', ',');
                $autoPA = number_format($getehub['AUPA'], 2, '.', ',');
                $RSCC = number_format($getehub['rscc'], 2, '.', ',');


                $bodyType= $getehub['classVehicle'];
                $issuedate = $getehub['created_at'];
                $finalDue = $getehub['totalValue'];
                $mortgagee = $getehub['mortgagee'];
               
        }
        $imagePath = public_path('images').'/motor_net/padinsig.png';
        $header= public_path('images').'/motor_net/cocogen_header.png';
        $footer= public_path('images').'/motor_net/cocogen_footer.png';
       
        $data = array('issuedate'=>$issuedate,
                    'assured'=>$assured,
                    'model'=>$model,
                    'txnid'=>$tnxid,
                    'theft'=>$theft,
                    'bodyType'=>$bodyType,
                    'policypPeriodStart'=>$policypPeriodStart,
                    'policyPeriodEnd'=>$policyPeriodEnd,
                    'color'=>$color,
                    'chassisNo'=>$chassisNo,
                    'engineNo'=>$engineNo,
                    'plateNo'=>$plateNo,
                    'ODTheft'=>$ODTheft,
                    'mortgagee'=>$mortgagee,
                    // 'deductible'=>$deductible,
                    'bodilyInjury'=>$bodilyInjury,
                    'propertyDamage'=>$propertyDamage,
                    'autoPA'=>$autoPA,
                    'aon'=>$aon,
                    // 'promoCode'=>$promoCode,
                    'policyNo'=>$policyNo,
                    'imagePath'=>$imagePath,
                    'finalDue'=>$finalDue,
                    'header'=>$header,
                    'footer'=>$footer,
                    'RSCC'=>$RSCC);


        // $hasht = Hash::make($id.'-COCCOMPRE');
        // $timestamp = Carbon::now(); // Replace with your timestamp
        // $formattedDate = $timestamp->format('Ymd');
        
        $hasht = 'Cert'.'_'.$tnxid;

        // $checkPdfmortgage = cocogen_estimate_compre_file_mortgage::where('transid',$id)->get();
       
        //     $cocogen_compre_file = new cocogen_estimate_compre_file_mortgage;
        //     $cocogen_compre_file->tnxid = $id;
        //     $cocogen_compre_file->transid = $id;
        //     $cocogen_compre_file->filename =  $hasht.'-COCCOMPRE';
        //     $cocogen_compre_file->fileLocation = 'public/pdf/mortgage_no_header/'.$hasht.'-COCCOMPRE.pdf';
        //     $cocogen_compre_file->update();
        
        $pdf = PDF::loadView('pdf.epartnerhub_bankcert_motor', $data);
        Storage::put('public/pdf/ehubbankcert/'. $hasht.'-COCCOMPRE.pdf', $pdf->output());
         return $pdf->download('COMPRECTPL.pdf');

    }

    public function ehubquoteemail(Request $request){
        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 22)->get();// uncomment when live
        $get_encrypt =  Crypt::encrypt($tnxid);
        $coclink = url('/get-policy-quote/edit/register/other/new').'/'.$get_encrypt;
        $getMotorDetail = cocogen_epartnerhub_compre_trans::where('transid',$tnxid)->get();
        $firstName = !empty($getMotorDetail[0]['fName']) ? $getMotorDetail[0]['fName'] :'';
        $lastName = !empty($getMotorDetail[0]['lName']) ? $getMotorDetail[0]['lName'] :"";
        $emailAddress = 'larren_aguilar@cocogen.com';//!empty($getDetails[0]['emailAddress']) ? $getDetails[0]['emailAddress'] : "";
        $fullname = $firstName.' '.$lastName;
        $year = $getMotorDetail[0]['year'];
        $brand = $getMotorDetail[0]['brand'];
        $model = $getMotorDetail[0]['model'];
        $bodyInjury = number_format($getMotorDetail[0]['bi'],2);
        $propertyDamage = number_format($getMotorDetail[0]['pd'],2);
        $ownDamage = number_format($getMotorDetail[0]['odTheftPrem'], 2, '.', ','); // Format with 2 decimal places, comma as a thousands separator
        $theft = number_format($getMotorDetail[0]['odTheft'], 2, '.', ',');
        if(!empty($getMotorDetail[0]['aon'])){
            $actsOfNature = 'Not Covered';
        }else{
            $actsOfNature = $getMotorDetail[0]['aon'];
        }
        $seatcount ='Seat Count';//Static
        $marketValue = number_format($getMotorDetail[0]['maketValue']);
        $autoPersonalAccident =number_format($getMotorDetail[0]['AUPA']);
        $rscc = $getMotorDetail[0]['classVehicle'];
        if($rscc != 'Truck' || $rscc != 'TRUCK'){
            $rscc=$ownDamage;
        }else{
            $rscc= 'Not Covered';
        }
        $docstamps = $getMotorDetail[0]['dst'];
        $vats =$getMotorDetail[0]['vat'];
        $localGov = $getMotorDetail[0]['lgt'];
        $grossPremium = $getMotorDetail[0]['totalValue'];
        $finalAmount =$getMotorDetail[0]['totalValue'];
        $baseprem=$getMotorDetail[0]['duePrem'];
        $deduct=$getMotorDetail[0]['deductible'];
        $external = str_replace( "templatefname", $fullname, $cocogen_admin_emailtemplate[0]['content']);
        $external = str_replace( "templatelink", $coclink, $external);
        $external = str_replace( "baseprem", $baseprem, $external);
        $external = str_replace( "docstamps", $docstamps, $external);
        $external = str_replace( "vats", $vats, $external);
        $external = str_replace( "localGov", $localGov, $external);
        $external = str_replace( "grossPremium", $grossPremium,$external);
        $external = str_replace( "finalAmount", $finalAmount, $external);
        $external = str_replace( "geYear", $year, $external);
        $external = str_replace( "getBrand", $brand, $external);
        $external = str_replace( "getModel", $model, $external);
        $external = str_replace( "marketValue", $marketValue, $external);
        $external = str_replace( "bodyInjury", $bodyInjury, $external);
        $external = str_replace( "ownDamage", $ownDamage, $external);
        $external = str_replace( "actOfNature", $actsOfNature, $external);
        $external = str_replace( "rscc", $rscc, $external);
        $external = str_replace( "autoPersonalAccident", $autoPersonalAccident, $external);
        $external = str_replace( "propertyDamage", $bodyInjury, $external);
        $external = str_replace( "deductible", $deduct, $external);
        // $external = str_replace( "agentname", $agentName, $external);
        // $external = str_replace( "agentemail", $agentEmail, $external);
        // $external = str_replace( "contactnumber", $agentNo, $external);
        $this->ehubemailsendcompre($fullname, $emailAddress, $external);
                $summaryInfo = [
                    'transid' => $tnxid,
                    'basePremium' => $baseprem,
                    'docStamps' => $docstamps,
                    'localGovernmentTax' => $localGov,
                    'grossPremium' => $grossPremium,
                    'finalAmountDue' => $finalAmount,
                    'promo' => !empty($request->promo) ? $request->promo : 0,
                    'vat' => $vats,
                    'deduction' => $deduct,
                    'perSeat' =>'5',
                    'validate_link'=>'0',
                    'action' => !empty($request->action) ? $request->action : 0
                ];
            $transno=$tnxid;
            $status_message='Successfuly Sent';
            return response()->json(['success'=>$status_message, 'transno'=>$transno]);
    
        }

    public function check_api(Request $request)
            {
                    $validated = $request->validate([
                        'userId' => 'required|regex:/^[a-zA-Z]+$/u|max:3',
                        'sublineCd' => 'required|regex:/^[a-zA-Z]+$/u|max:3',
                        "lineCd" => 'required|regex:/^[a-zA-Z]+$/u|max:3',
                        "issCd" => 'required|regex:/^[a-zA-Z]+$/u|max:2',
                        "intmNo" => 'required|integer|max:11',
                        "inceptDate" => 'required|date_format:d/m/Y',
                        "expiryDate" => 'required|date_format:d/m/Y',
                        "assdNo" => 'required|integer|max:11',
                        "assdAddress" => 'required|regex:/^[A-Za-z0-9 ]+$/|max:150',
                        "refPolNo" => 'required|string|max:30',
                        "itemTitle" => 'required|string|max:150',
                        "currency" => 'required|regex:/^[a-zA-Z]+$/u|max:4',
                        "currencyRt"=> 'required|regex:/^\d+(\.\d{1,2})?$/',
                        "paytTerm" => 'required',
                        "dueDate" => 'required|date_format:d/m/Y',  
                        "refInvNo" => 'required|regex:/^[A-Za-z0-9 ]+$/|max:10',
                        "itemDesc" => 'required|max:150',
                        "itemDesc2" => 'required|max:150',
                        "motorNo" => 'required|max:50',
                        "color" => 'required|regex:/^[a-zA-Z]+$/u|max:15',
                        "modelYear" => 'required|min:1900|max:'.(date('Y')+1),
                        "makeCd" => 'required|integer', //no response
                        "serialNo" => 'required|max:50',
                        "plateNo" => 'required|max:10',
                        "sublineType" => 'required|max:15',
                        "noPass" => 'required', // no response
                        "cocIssueDate"=> 'required|date_format:d/m/Y',
                        "mvFileNo" => 'required|max:15',
                        "carCompany" => 'required|max:50',
                        "carVariant" => 'required|max:50',
                        "cocAtcnNo" => 'required|max:10',
                        "mvPremType" => 'required|max:50',
                        "mvType" => 'required|max:10',
                        "regType" => 'required|regex:/^[a-zA-Z]+$/u|max:1',
                        "webType" => "4", // no error logs
                        "cocSerialNo" => 'required|max:12',
                        "coverageCd"=> 'required|integer', //no response
                        "regionCd"=> 'required|integer', //no response
                        "taxCd.0" => 'required|digits:4',
                        "taxAmt.0" => 'required|regex:/^\d+(\.\d{1,2})?$/',
                        "taxCd.1" => 'required|digits:4',
                        "taxAmt.1" => 'required|regex:/^\d+(\.\d{1,2})?$/',
                        "taxCd.2" => 'required|digits:4',
                        "taxAmt.2" => 'required|regex:/^\d+(\.\d{1,2})?$/',
                        "mortgageeCd" => 'required|regex:/^[a-zA-Z]+$/u|max:10',
                        "mortgageeAmt" => 'required|digits:11',
                    ]);

                    ini_set('default_socket_timeout', 3600);  
                    $data['cocSerialNo'] = '103576580';
                    $totalExecutionTime = 0;
                    // Set the total number of iterations
                    $totalIterations = 10;
                    // Calculate the midpoint of the iterations
                    $quarter1 = $totalIterations / 4;
                    $quarter2 = $quarter1 * 2;
                    $quarter3 = $quarter1 * 3;
             
                    for ($i = 0; $i < $totalIterations; $i++) {
                       
                        $startTime = Carbon::now()->timestamp;
                        $dta = '{
                            "userId": "CPI",
                            "sublineCd": "MNP",
                            "lineCd": "MC",
                            "issCd": "HO",
                            "intmNo": 3546,
                            "inceptDate": "05/26/2023",
                            "expiryDate": "05/26/2024",
                            "assdNo": 285719,
                            "assdAddress": "392F.ORTIGASST.",
                            "refPolNo": "MC-HO-000032-00-TEST",
                            "itemTitle": "2018LANCEREXGLS",
                            "currency": "PHP",
                            "currencyRt": 1.0,
                            "paytTerm": "COD",
                            "dueDate": "05/26/2023",
                            "refInvNo": "140000045308088aaaaaaaaaa",
                            "itemDesc": "ItemDescriptionOne",
                            "itemDesc2": "ItemDescriptionTwo",
                            "motorNo": "456TSDRFHSDRFHD",
                            "color": "PEARL WHITE",
                            "modelYear": "2018",
                            "makeCd": 2575,
                            "serialNo": "6577856TU7T87TI7T",
                            "plateNo": "ABF-789",
                            "sublineType": "CAR",
                            "noPass": 4,
                            "cocIssueDate": "06/01/2024",
                            "mvFileNo": "8768766476tugy5",
                            "carCompany": "MITSUBISHI",
                            "carVariant": "LANCER EX GLS",
                            "cocAtcnNo": "12Q341231",
                            "mvPremType": "CARDESC1",
                            "mvType": "c",
                            "regType": "r",
                            "webType":"4",
                            "cocSerialNo":  '.(++$data['cocSerialNo']).', 
                            "coverageCd": 4,
                            "regionCd": 15,
                            "peril": [
                                {
                                    "perilCd": 3,
                                    "perilRate": 0.556506329,
                                    "perilTsi": 790000,
                                    "perilPrem": 4396.40,
                                    "deductible": [
                                        {
                                            "deductibleCd": "18",
                                            "deductibleAmt": 3000
                                        }
                                    ]
                                },
                                {
                                    "perilCd": 4,
                                    "perilRate": 0.371003797,
                                    "perilTsi": 790000,
                                    "perilPrem": 2930.93,
                                    "deductible": [
                                        {
                                            "deductibleCd": "18",
                                            "deductibleAmt": 3000
                                        }
                                    ]
                                },
                                {
                                    "perilCd": 10,
                                    "perilRate": 0.500000000,
                                    "perilTsi": 790000,
                                    "perilPrem": 3950.00,
                                    "deductible": [
                                        {
                                            "deductibleCd": "13",
                                        "deductibleAmt": 2000
                                        }
                                    ]
                                },
                            
                                {
                                    "perilCd": 5,
                                    "perilRate": 0.210000000,
                                    "perilTsi": 200000,
                                    "perilPrem": 420.00
                                },
                                {
                                    "perilCd": 6,
                                    "perilRate": 0.622500000,
                                    "perilTsi": 200000,
                                    "perilPrem": 1245.00
                                },
                                {
                                    "perilCd": 8,
                                    "perilRate": 0,
                                    "perilTsi": 250000,
                                    "perilPrem": 0
                                }
                            ],
                            "invTax": [
                                {
                                    "taxCd": 3,
                                    "taxAmt": 1618.00
                                },
                                {
                                    "taxCd": 5,
                                    "taxAmt": 25.88
                                },
                                {
                                    "taxCd": 8,
                                    "taxAmt": 1553.08
                                }
                                
                                
                            ],
                            "mortgagee": [
                                {
                                    "mortgageeCd": "VETB",
                                    "mortgageeAmt": 350000
                                }
                            ]
                        }';

                        // SaveMotorApiJob::dispatch($dta)->onQueue('motor_api_queue');
                        // Dispatch the job with the appropriate data based on the iteration
                        // if ($i < $quarter1) {
                        //     // SaveMotorApiJob::dispatch($dta)->onQueue('motor_api_queue');
                        //     dump($dta);
                        // } elseif ($i < $quarter2) {
                        //     dump($dta);
                        //     // SaveMotorApiJobsSecond::dispatch($dta)->onQueue('motor_api_queue');
                        // } elseif ($i < $quarter3) {
                        //     dump($dta);
                        //     // SaveMotorApiJobsThird::dispatch($dta)->onQueue('motor_api_queue');
                        // } else {
                        //     dump($dta);
                        //     // SaveMotorApiJobsFourth::dispatch($dta)->onQueue('motor_api_queue');
                        // }
                    }
                    $endTime = microtime(true);
                    $executionTime = $endTime - $startTime;
                    $totalExecutionTime += $executionTime;
            
                    // Output the total execution time
                    echo "Total Loop Execution Time: " . $totalExecutionTime . " seconds";

        }


}
