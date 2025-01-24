<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_api_ctpl_trans;
use App\Models\cocogen_api_users;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_meta;
use DateTime;
use SoapClient;
use App\Models\cocogen_api_test;
use App\Models\cocogen_user_agent_filter_code;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_monitoring_upload_file;
use App\Models\cocogen_monitoring_api;
use DB;
use GuzzleHttp\Client;
class APImonitoring extends Controller
{

    public function getAgent(Request $request){
        
        $userID = $request->get('userID');
        $cocogen_api_users = cocogen_api_users::where('name', '=',$userID)->get();
        if(count($cocogen_api_users) > 0 ){
        }else{
            $response['TErrorMsg'] = "Invalid userid!";
            return response()->json($response, 201);
        }
        $digest = sha1($userID.":".$cocogen_api_users[0]['password']);
        $messageError = "";
        if($request->get('SecurityCode') === $digest){
            $data = $request->get('data');
            
            foreach ($data as $agentData) {
                $check_dupli = cocogen_user_agent_filter_code::where('agent_no',$agentData['agent_no'])->get();
                if(count($check_dupli) == 0){
                  echo' Insert Duplicate '.$agentData['agent_no'];
                    $agent = new cocogen_user_agent_filter_code();
                    $agent->agent_no = $agentData['agent_no'];
                    $agent->agent_name = $agentData['agent_name'];
                    $agent->branch = $agentData['branch'];
                    $agent->system_status = $agentData['status'];
                    $agent->status = $agentData['status'];
                    $agent->save();
                }else{
                    echo' Update Duplicate '.$agentData['agent_no'];
                    DB::table('cocogen_user_agent_filter_code')
                        ->where('agent_no',$agentData['agent_no']) // replace $intnmno with the specific value of intnmno
                        ->update([
                            'agent_no' =>  $agentData['agent_no'],
                            'agent_name' => $agentData['agent_name'],
                            'branch' => $agentData['branch'],
                            // 'system_status' => $agentData['status'],
                            'status' => $agentData['status']
                            // add as many column-value pairs as you need to update
                        ]);
                }
            }
            $response['TErrorMsg'] = "Success!";
            return response()->json($response, 201);
        }else{
            // $response['TErrorMsg'] = $digest;
            $response['TErrorMsg'] = "Incorrect  Security Code!";
            $response['TStatus'] = "Data Error";
            return response()->json($response, 201);
        }


    }

    public function filterAgent(Request $request){
        $userID = $request->get('userID');
        $cocogen_api_users = cocogen_api_users::where('name', '=',$userID)->get();
        if(count($cocogen_api_users) > 0 ){
        }else{
            $response['TErrorMsg'] = "Invalid userid!";
            return response()->json($response, 201);
        }
        $digest = sha1($userID.":".$cocogen_api_users[0]['password']);
        
        $messageError = "";
        if($request->get('SecurityCode') === $digest){
            
            $cocogen_users_agent_code = cocogen_users_agent_code::
                select('code')
                ->distinct('code')
                ->orderBy('code')
                ->get();
            
            $all_codes='';
            foreach ($cocogen_users_agent_code as $row) {
                // Process the row here
                $codes = $row->code;
                $all_codes .= $codes . ',';

            }
           
            return response()->json($all_codes, 201);
        }else{
            // $response['TErrorMsg'] = $digest;
            $response['TErrorMsg'] = "Incorrect  Security Code!";
            $response['TStatus'] = "Data Error";
            return response()->json($response, 201);
        }


    }
   // Fetch the Value depends on the query 
    public function monitoringResponce(Request $request){
        $userID = $request->get('userID');
        $cocogen_api_users = cocogen_api_users::where('name', '=',$userID)->get();
        if(count($cocogen_api_users) > 0 ){
        }else{
            $response['TErrorMsg'] = "Invalid userid!";
            return response()->json($response, 201);
        }
        $digest = sha1($userID.":".$cocogen_api_users[0]['password']);
        
        $messageError = "";
        if($request->get('SecurityCode') === $digest){
            
            $rows =DB::table('cocogen_monitoring_upload_file')
                        ->select('policyno')
                        ->whereNotNull('policyno')
                        ->where('tag_with_api', null)
                        ->where('policyno', '<>', '')
                        ->get();
            
            $all_codes='';
           
            foreach ($rows as $row) {
                // Process the row here
                $codes = $row->policyno;
                $all_codes .= $codes . ',';


            }
            
            return response()->json($all_codes, 201);
        }else{
            // $response['TErrorMsg'] = $digest;
            $response['TErrorMsg'] = "Incorrect  Security Code!";
            $response['TStatus'] = "Data Error";
            return response()->json($response, 201);
        }
    }
    public function monitoringInsert(Request $request){
   
        $userID = $request->get('userID');
        $cocogen_api_users = cocogen_api_users::where('name', '=',$userID)->get();
        if(count($cocogen_api_users) > 0 ){
        }else{
            $response['TErrorMsg'] = "Invalid userid!";
            return response()->json($response, 201);
        }
        $digest = sha1($userID.":".$cocogen_api_users[0]['password']);
        $messageError = "";
        if($request->get('SecurityCode') === $digest){
        
             $data = $request->get('data');
            
            foreach ($data as $item) {
                $policy = new cocogen_monitoring_api();
                $policy->policy_id = $item['policy_id'];
                $policy->invoice_no = $item['invoice_no'];
                $policy->status = $item['status'];
                $policy->ref_pol_no = $item['ref_pol_no'];
                $policy->issue_date = $item['issue_date'];
                $policy->agent = 'Auto';
                $policy->series = $item['ref_pol_no'];
                $policy->save();
               
                DB::table('cocogen_monitoring_upload_file')->where('adminpolicyno', $item['ref_pol_no'])
                ->update(['tag_with_api'=>'1']);
            }

     
            $response['TErrorMsg'] = "Success!";
     
            return response()->json($response, 201);
        }else{
       
            // $response['TErrorMsg'] = $digest;
            $response['TErrorMsg'] = "Incorrect  Security Code!";
            $response['TStatus'] = "Data Error";
            return response()->json($response, 201);
        }


    }
}
