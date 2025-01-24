<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_epartnerhub_motor_claim_trans;
use App\Models\cocogen_epartnerhub_pa_claim_trans;
use App\Models\cocogen_epartnerhub_property_claim_trans;
use App\Models\cocogen_epartnerhub_claim_remarks;
use App\Models\cocogen_epartner_claim_motor_uploads;
use App\Models\cocogen_epartner_claim_pa_uploads;
use App\Models\cocogen_epartner_claim_property_uploads;
use App\Models\cocogen_epartnerhub_claim_upload_file;
use App\Models\cocogen_api_users;
use App\Models\cocogen_epartnerhub_claim_generic_files;
use App\Models\users;
use GuzzleHttp\Client;
use Mail;
use DB;
use Carbon\Carbon;


class eparthubClaimAPI extends Controller
{

    public function apiInsertRemark(Request $request)
    {       
        // return response()->json($request);
        $userID = "testAPI";
        $cocogen_api_users = cocogen_api_users::where('name', $userID)->get();
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        $email = "claims_admin@cocogen.com";
        $line = $request->get('line'); 
        $SecurityCode = sha1($cocogen_api_users[0]["name"].":".$cocogen_api_users[0]["password"] .":".$cocogen_api_users[0]["password_key"].":".$email.":".$cocogen_api_users[0]["id"]);
        if($SecurityCode === $request->get('SecurityCode')){
            
            $cocogen_epartnerhub_claim_remarks = new cocogen_epartnerhub_claim_remarks;
            $cocogen_epartnerhub_claim_remarks->line_id  = $request->get('line_id'); 
            $cocogen_epartnerhub_claim_remarks->line  = $request->get('line'); 
            $cocogen_epartnerhub_claim_remarks->remarks  = $request->get('remarks'); 
            $cocogen_epartnerhub_claim_remarks->remarks_by  = $request->get('remarks_by'); 
            $cocogen_epartnerhub_claim_remarks->remarks_name  = $request->get('remarks_name'); 
            $cocogen_epartnerhub_claim_remarks->created_at  = $datenow; 
            $cocogen_epartnerhub_claim_remarks->updated_at  = $datenow; 
            $cocogen_epartnerhub_claim_remarks->save();
            
            $policyNO = "";
            $created_by = "";
            $name = "";
            if($line === "MC"){
                $data = cocogen_epartnerhub_motor_claim_trans::where('id', $request->get('line_id'))->get();
            }elseif ($line === "FI") {
                $data = cocogen_epartnerhub_property_claim_trans::where('id', $request->get('line_id'))->get();
            }else{
                $data = cocogen_epartnerhub_pa_claim_trans::where('id', $request->get('line_id'))->get();
            }

            if(count($data) > 0){
                $policyNO = $data[0]["policy"];
                $created_by = $data[0]["created_by"];

                $users = users::where('email', $created_by = $data[0]["created_by"])->get();
                if(count($users) > 0){
                    $name = $users[0]["name"];
                }
            }
            $this->emailsendInsert($request->get('remarks_name'), $policyNO,$created_by, $name,$request->get('remarks'));
            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }

    public function apiUpdateStatus(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        
        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]["id"]);
        
        if($SecurityCode === $request->get('SecurityCode')){
            if($request->get('line') === "PA"){
                $cocogen_epartnerhub_pa_claim_trans = cocogen_epartnerhub_pa_claim_trans::findorFail($request->get('line_id'));
                $cocogen_epartnerhub_pa_claim_trans->status = $request->get('status');
                $cocogen_epartnerhub_pa_claim_trans->updated_at = $datenow;
                $cocogen_epartnerhub_pa_claim_trans->save();
            }
            
            if($request->get('line') === "FI"){
                $cocogen_epartnerhub_property_claim_trans = cocogen_epartnerhub_property_claim_trans::findorFail($request->get('line_id'));
                $cocogen_epartnerhub_property_claim_trans->status = $request->get('status');
                $cocogen_epartnerhub_property_claim_trans->updated_at = $datenow;
                $cocogen_epartnerhub_property_claim_trans->save();
            }

            if($request->get('line') === "MC"){
                $cocogen_epartnerhub_motor_claim_trans = cocogen_epartnerhub_motor_claim_trans::findorFail($request->get('line_id'));
                $cocogen_epartnerhub_motor_claim_trans->status = $request->get('status');
                $cocogen_epartnerhub_motor_claim_trans->updated_at = $datenow;
                $cocogen_epartnerhub_motor_claim_trans->save();
            }
            
            $cocogen_epartnerhub_claim_remarks = new cocogen_epartnerhub_claim_remarks;
            $cocogen_epartnerhub_claim_remarks->line_id  = $request->get('line_id'); 
            $cocogen_epartnerhub_claim_remarks->line  = $request->get('line'); 
            $cocogen_epartnerhub_claim_remarks->remarks  = "Status was changed to ".$request->get('status'); 
            $cocogen_epartnerhub_claim_remarks->remarks_by  = $request->get('email'); 
            $cocogen_epartnerhub_claim_remarks->remarks_name  = $request->get('name'); 
            $cocogen_epartnerhub_claim_remarks->created_at  = $datenow; 
            $cocogen_epartnerhub_claim_remarks->updated_at  = $datenow; 
            $cocogen_epartnerhub_claim_remarks->save();
            
            $policyNO = "";
            $created_by = "";
            $name = "";
            
            if($request->get('line') === "MC"){
                $data = cocogen_epartnerhub_motor_claim_trans::where('id', $request->get('line_id'))->get();
            }elseif ($request->get('line') === "FI") {
                $data = cocogen_epartnerhub_property_claim_trans::where('id', $request->get('line_id'))->get();
            }else{
                $data = cocogen_epartnerhub_pa_claim_trans::where('id', $request->get('line_id'))->get();
            }
           
            if(count($data) > 0){
                $policyNO = $data[0]["policy"];
                $created_by = $data[0]["created_by"];

                $users = users::where('email', $data[0]["created_by"])->get();
                if(count($users) > 0){
                    $name = $users[0]["name"];
                }
            }
            //return response()->json($name, 201);
            $this->emailUpdateStatus($request->get('name'), $policyNO,$created_by, $name,$request->get('status'));
            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
        
    }

    public function apiInsertNewClaim(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
            
        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email'));
        if($SecurityCode === $request->get('SecurityCode')){

            if($request->get('line') === "FI"){
                $cocogen_epartnerhub_property_claim_trans = new cocogen_epartnerhub_property_claim_trans;
                $cocogen_epartnerhub_property_claim_trans->policy = $request->get('policyNo_property');
                $cocogen_epartnerhub_property_claim_trans->status = "SAVED";
                $cocogen_epartnerhub_property_claim_trans->date_of_loss = date('Y-m-d', strtotime($request->get('Loss_date_property')));
                $cocogen_epartnerhub_property_claim_trans->time_loss = $request->get('Loss_time_property');
                $cocogen_epartnerhub_property_claim_trans->location_of_loss = $request->get('location_loss_property');
                $cocogen_epartnerhub_property_claim_trans->province = $request->get('permanent_province_property');
                $cocogen_epartnerhub_property_claim_trans->municipality = $request->get('permanent_municipality_property');
                $cocogen_epartnerhub_property_claim_trans->barangay = $request->get('permanent_barangay_property');
                $cocogen_epartnerhub_property_claim_trans->contact_no = $request->get('contact_no_property');
                $cocogen_epartnerhub_property_claim_trans->email_address = $request->get('email_address_property');
                $cocogen_epartnerhub_property_claim_trans->claimant_same_insured = $request->get('hd_claim_property_same_insured');
                $cocogen_epartnerhub_property_claim_trans->loss_within_term = $request->get('hd_claim_property_within_inception');
                $cocogen_epartnerhub_property_claim_trans->risk_same_as_inured_policy = $request->get('hd_claim_property_risk_insured');
                $cocogen_epartnerhub_property_claim_trans->premium_paid = $request->get('hd_claim_property_prem_paid');
                $cocogen_epartnerhub_property_claim_trans->document_complete = $request->get('hd_claim_property_morgagee');
                $cocogen_epartnerhub_property_claim_trans->damage_ralated_accident = $request->get('relate_accident_property');
                $cocogen_epartnerhub_property_claim_trans->mortgagee = $request->get('morgaged_to_property');
                $cocogen_epartnerhub_property_claim_trans->gross_amount = str_replace(",", "", $request->get('gross_estimate_property'));
                $cocogen_epartnerhub_property_claim_trans->claim_recovery = $request->get('hd_claim_motor_property_recovery');

                if($request->get('cb_property_building')){
                    $cocogen_epartnerhub_property_claim_trans->cat_loss_building = "Yes";
                }

                if($request->get('cb_property_stocl_building')){
                    $cocogen_epartnerhub_property_claim_trans->cat_loss_stock_building = "Yes";
                }

                $cocogen_epartnerhub_property_claim_trans->first_name = $request->get('property_first_name_owner');
                $cocogen_epartnerhub_property_claim_trans->middle_name = $request->get('property_middle_name_owner');
                $cocogen_epartnerhub_property_claim_trans->last_name = $request->get('property_last_name_owner');
                $cocogen_epartnerhub_property_claim_trans->accident_happen = $request->get('property_acc_happen');
                $cocogen_epartnerhub_property_claim_trans->created_by = \Auth::user()->email;
                $cocogen_epartnerhub_property_claim_trans->updated_at = $datenow;
                $cocogen_epartnerhub_property_claim_trans->created_at = $datenow;
                $cocogen_epartnerhub_property_claim_trans->save();
            }

            if($request->get('line') === "PA"){
                
            }

            if($request->get('line') === "MC"){
                
            }


            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
        

           
    }

    public function apiInsertFiles(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]['id']);

        if($SecurityCode === $request->get('SecurityCode')){
            
            $cocogen_epartnerhub_claim_generic_files = new cocogen_epartnerhub_claim_generic_files;
            $cocogen_epartnerhub_claim_generic_files->line  = $request->get('line'); 
            $cocogen_epartnerhub_claim_generic_files->transID  = $request->get('line_id'); 
            $cocogen_epartnerhub_claim_generic_files->filename  = $request->get('filename'); 
            $cocogen_epartnerhub_claim_generic_files->link  = $request->get('link'); 
            $cocogen_epartnerhub_claim_generic_files->created_at  = $datenow; 
            $cocogen_epartnerhub_claim_generic_files->updated_at  = $datenow; 
            $cocogen_epartnerhub_claim_generic_files->save();


            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }

    public function apiDeleteFiles(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]['id']);

        if($SecurityCode === $request->get('SecurityCode')){
            DB::table('cocogen_epartnerhub_claim_generic_files')
            ->where('line', $request->get('line'))
            ->where('transID', $request->get('line_id'))
            ->where('filename', $request->get('filename'))
            ->delete();

            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }

    public function apiUpdateFilesStatus(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]['id']);
        $email = "rene_paciente@cocogen.com";
        if($SecurityCode === $request->get('SecurityCode')){
            if($request->get('line') === "PA"){
                $cocogentrans = cocogen_epartnerhub_pa_claim_trans::where('id', $request->get('TransID'))->get();
                $datafiles = cocogen_epartner_claim_pa_uploads::
                        where('TransID', '=',$request->get('TransID'))
                        ->where('typename', '=',$request->get('requiredDocs'))
                        ->get();
                        if(count($datafiles)>0){
                            $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::findorFail($datafiles[0]['id']);
                            $cocogen_epartner_claim_pa_uploads->status = $request->get('status');
                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->save();
                        }
            }
            
            if($request->get('line') === "FI"){
                $cocogentrans = cocogen_epartnerhub_property_claim_trans::where('id', $request->get('TransID'))->get();
                
                $datafiles = cocogen_epartner_claim_property_uploads::
                        where('TransID', '=',$request->get('TransID'))
                        ->where('typename', '=',$request->get('requiredDocs'))
                        ->get();
                        if(count($datafiles)>0){
                            $cocogen_epartner_claim_property_uploads = cocogen_epartner_claim_property_uploads::findorFail($datafiles[0]['id']);
                            $cocogen_epartner_claim_property_uploads->status = $request->get('status');
                            $cocogen_epartner_claim_property_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_property_uploads->save();
                        }
            }

            if($request->get('line') === "MC"){
                $cocogentrans = cocogen_epartnerhub_motor_claim_trans::where('id', $request->get('TransID'))->get();
                
                $datafiles = cocogen_epartner_claim_motor_uploads::
                        where('TransID', '=',$request->get('TransID'))
                        ->where('typename', '=',$request->get('requiredDocs'))
                        ->get();
                        if(count($datafiles)>0){
                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($datafiles[0]['id']);
                            $cocogen_epartner_claim_motor_uploads->status = $request->get('status');
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                        }
            }

            if(!empty($cocogentrans[0]["email_address"])){
                $email = $cocogentrans[0]["email_address"];
            }
            if($request->get('status') === "D"){
                $this->emailsendDeniedFiles($email,$request->get('requiredDocs'));
            }
           
            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }
    
    public function emailsendDeniedFiles($email,$docname)
    {
        $data = array('email'=>$email,'docname'=>$docname);
        Mail::send('emailtemplate.NewDeniedFile', $data, function($message) use ($email,$docname)
        {
            $message->to('rene_paciente@cocogen.com')->subject('Denied Documents : '.$docname)->from('client_services@cocogen.com', 'COCOGEN');
        });
    }


    public function emailsendInsert($fname,$policyNO,$created_by,$name,$remarks)
    {
        $data = array('fname'=>$fname,'policyNO'=>$policyNO,'created_by'=>$created_by,'name'=>$name,'remarks'=>$remarks);
        Mail::send('emailtemplate.NewRemarks', $data, function($message) use ($fname,$policyNO,$created_by,$name,$remarks)
        {
            $message->to('rene_paciente@cocogen.com')->subject('Insert Remarks : '.$fname)->from('client_services@cocogen.com', 'COCOGEN');
        });
    }

    public function emailUpdateStatus($fname,$policyNO,$created_by,$name,$status)
    {
        $data = array('fname'=>$fname,'policyNO'=>$policyNO,'created_by'=>$created_by,'name'=>$name,'status'=>$status);
        Mail::send('emailtemplate.NewStatusUpdate', $data, function($message) use ($fname,$policyNO,$created_by,$name,$status)
        {
            $message->to('rene_paciente@cocogen.com')
            ->subject('Claim status changed : '.$status)->from('client_services@cocogen.com', 'COCOGEN');

        });
    }

    public function apiGEt15DaysPending(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        
        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]["id"]);
        
        if($SecurityCode === $request->get('SecurityCode')){
              
            $results = DB::select('SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_motor_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 15 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_motor_uploads where status not in ("A"))
            union
            SELECT a.id,a.fname as first_name,a.mName as middle_name,a.lName as last_name,a.created_by,a.policy FROM cocogen_epartnerhub_pa_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 15 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_pa_uploads where status not in ("A"))
            union
            SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_property_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 15 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_property_uploads where status not in ("A"))
            ');  
            // $data = cocogen_api_ctpl_trans::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
            return response()->json($results, 201);  
            
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
        
    }

    public function apiGEt30DaysPending(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        
        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]["id"]);
        
        if($SecurityCode === $request->get('SecurityCode')){
              
            $results = DB::select('SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_motor_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 30 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_motor_uploads where status not in ("A"))
            union
            SELECT a.id,a.fname as first_name,a.mName as middle_name,a.lName as last_name,a.created_by,a.policy FROM cocogen_epartnerhub_pa_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 30 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_pa_uploads where status not in ("A"))
            union
            SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_property_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 30 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_property_uploads where status not in ("A"))
            ');  
            // $data = cocogen_api_ctpl_trans::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
            return response()->json($results, 201);  
            
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
        
    }

    public function apiGEt45DaysPending(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        
        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]["id"]);
        
        if($SecurityCode === $request->get('SecurityCode')){
              
            $results = DB::select('SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_motor_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 45 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_motor_uploads where status not in ("A"))
            union
            SELECT a.id,a.fname as first_name,a.mName as middle_name,a.lName as last_name,a.created_by,a.policy FROM cocogen_epartnerhub_pa_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 45 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_pa_uploads where status not in ("A"))
            union
            SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_property_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 45 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_property_uploads where status not in ("A"))
            ');  
            // $data = cocogen_api_ctpl_trans::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
            return response()->json($results, 201);  
            
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
        
    }

    public function apiGEt60DaysPending(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        
        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]["id"]);
        
        if($SecurityCode === $request->get('SecurityCode')){
              
            $results = DB::select('SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_motor_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 60 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_motor_uploads where status not in ("A"))
            union
            SELECT a.id,a.fname as first_name,a.mName as middle_name,a.lName as last_name,a.created_by,a.policy FROM cocogen_epartnerhub_pa_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 60 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_pa_uploads where status not in ("A"))
            union
            SELECT a.id,a.first_name,a.middle_name,a.last_name,a.created_by,a.policy FROM cocogen_epartnerhub_property_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) = 60 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_property_uploads where status not in ("A"))
            ');  
            // $data = cocogen_api_ctpl_trans::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
            return response()->json($results, 201);  
            
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }
    public function apiGEt61aboveDaysPending(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        
        $data = cocogen_api_users::where('name', '=',$request->get('UID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key'].":".$request->get('email').":".$data[0]["id"]);
        
        if($SecurityCode === $request->get('SecurityCode')){
              
            $results = DB::select('SELECT a.id,"MC" as line FROM cocogen_epartnerhub_motor_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) > 60 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_motor_uploads where status not in ("A"))
            union
            SELECT a.id,"PA" as line FROM cocogen_epartnerhub_pa_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) > 60 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_pa_uploads where status not in ("A"))
            union
            SELECT a.id, "FI" as line  FROM cocogen_epartnerhub_property_claim_trans as a where DATEDIFF(CURRENT_DATE(),a.created_at) > 60 and a.id in (SELECT distinct transID FROM cocogen_epartner_claim_property_uploads where status not in ("A"))
            ');  
            
            for ($x = 0; $x < count($results); $x++) {
                if($results[$x]->line === "MC"){
                    $cocogen_epartnerhub_motor_claim_trans = cocogen_epartnerhub_motor_claim_trans::findorFail((int)$results[$x]->id);
                    $cocogen_epartnerhub_motor_claim_trans->status = "CANCELLED";
                    $cocogen_epartnerhub_motor_claim_trans->updated_at = $datenow;
                    $cocogen_epartnerhub_motor_claim_trans->save();
                }
                if($results[$x]->line === "FI"){
                    $cocogen_epartnerhub_property_claim_trans = cocogen_epartnerhub_property_claim_trans::findorFail((int)$results[$x]->id);
                    $cocogen_epartnerhub_property_claim_trans->status = "CANCELLED";
                    $cocogen_epartnerhub_property_claim_trans->updated_at = $datenow;
                    $cocogen_epartnerhub_property_claim_trans->save();
                }
                if($results[$x]->line === "PA"){
                    $cocogen_epartnerhub_pa_claim_trans = cocogen_epartnerhub_pa_claim_trans::findorFail((int)$results[$x]->id);
                    $cocogen_epartnerhub_pa_claim_trans->status = "CANCELLED";
                    $cocogen_epartnerhub_pa_claim_trans->updated_at = $datenow;
                    $cocogen_epartnerhub_pa_claim_trans->save();
                }
            } 
            $response['TErrorMsg'] = "Success";
            return response()->json($response, 201); 
            
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
        
        
    }


    public function checkUser(Request $request) 
    {


        $start = Carbon::now()->subDay(1)->toDateString();
        $end = Carbon::now()->subDay(1)->toDateString();
        $SecurityCode = sha1("epolicyAPI".":"."epolicyAPI".":".$start.":".$end);

        if ($SecurityCode === $request->SecurityCode) {
            $user = DB::table('users')->where('email', $request->email)->orWhere('name', $request->name)->first();

            if($user) {
                $response['TErrorMsg'] = "Exist";
                $response['TStatus'] = "Exist";
                return response()->json($response, 201);
            }else{
                $response['TErrorMsg'] = "Not Exist";
                $response['TStatus'] = "Not Exist";
                return response()->json($response, 201);
            }
        } else {
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }

    public function saveUser(Request $request) 
    {
        $start = Carbon::now()->subDay(1)->toDateString();
        $end = Carbon::now()->subDay(1)->toDateString();
        $SecurityCode = sha1("epolicyAPI".":"."epolicyAPI".":".$start.":".$end);

        if($SecurityCode === $request->SecurityCode) {
            $newUser = array();
            if($request->email) {
                $newUser['email'] = $request->email;
            } else {
                $newUser['email'] = "";
            }
            if($request->name) {
                $newUser['name'] = $request->name;
            } else {
                $newUser['name'] = "";
            }
            $newUser['type'] = 'C';
            $newUser['password'] = '';
            $newUser['status']  = 'PENDING';
            $newUser['active'] = 'N';
            DB::table('users')->insert($newUser);

            $newUser = DB::table('users')->where('email', $request->email)->orWhere('name', $request->name)->first();

            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            $response['newUser'] = $newUser;
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }

    public function apiGEtgetUnpaid(Request $request)
    { 
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        
        $data = cocogen_api_users::where('name', '=',$request->get('userID'))->get();
        $SecurityCode = sha1($data[0]['name'].":".$data[0]['password'] .":".$data[0]['password_key']);
        
        if($SecurityCode === $request->get('SecurityCode')){
              
            $results = DB::select('
                select policy,created_at from cocogen_epartnerhub_motor_claim_trans where status = "FOR REVIEW"
                union 
                select policy,created_at from cocogen_epartnerhub_pa_claim_trans where status = "FOR REVIEW"
                union
                select policy,created_at from cocogen_epartnerhub_property_claim_trans where status = "FOR REVIEW"
              ');  
            // $data = cocogen_api_ctpl_trans::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
            return response()->json($results, 201);  
            
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }

    

    
}
