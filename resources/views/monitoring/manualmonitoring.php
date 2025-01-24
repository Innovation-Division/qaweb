<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PostsExport;
use App\cocogen_monitoring_production;
use App\cocogen_monitoring_upload_file;
use App\cocogen_users_agent_code;
use App\cocogen_monitoring_record;
use App\cocogen_monitoring_for_approval;
use App\cocogen_monitoring_pad_type;
use App\cocogen_user_agent_filter_code;
use App\cocogen_monitoring_api;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use DataTables;
use DB;
use File;
use Mail;

// $string = "CTPL COC-123456-123506";
// $params = explode("-", $string);  // Splits the string into an array at the "-" delimiter
// $param1 = $params[1];  // Extracts the first parameter "123456"
// $param2 = $params[2];  // Extracts the second parameter "123506"
class manualmonitoring extends Controller
{
    public function import(Request $request)
    {
        ini_set("default_socket_timeout", 1000000);
        if (Auth::check()) {
            $requestee = Auth::user()->name;
            $dateToday = now()->format('Y-m-d');
            if (count($request->file("file")) === 0) {

                $check_record = cocogen_monitoring_for_approval::select("status")
                    ->where("intermediary", $request->intermediary)
                    ->first();

                if (count($check_record) === 0) {

                    $cocogen_monitoring_for_approval = new cocogen_monitoring_for_approval();
                    $cocogen_monitoring_for_approval->intermediary = $request->intermediary;
                    $cocogen_monitoring_for_approval->intermediaryname = $request->intermediaryname;
                    $cocogen_monitoring_for_approval->remaining_doc = "";
                    $cocogen_monitoring_for_approval->date_request = $dateToday;
                    $cocogen_monitoring_for_approval->Status = "PENDING";
                    $cocogen_monitoring_for_approval->reason_for_request = !empty($request->padrequest) ? $request->padrequest : "";
                    $cocogen_monitoring_for_approval->padtype = $request->padtype;
                    $cocogen_monitoring_for_approval->request_by = \Auth::user()->email;
                    $cocogen_monitoring_for_approval->save();
                    $cocogen_monitoring_for_approval->intermediarycount = $cocogen_monitoring_for_approval->id;
                    $cocogen_monitoring_for_approval->id;
                    $cocogen_monitoring_for_approval->save();
                    $this->emailsrequest(
                        $request->padtype,
                        $request->intermediary,
                        $request->intermediaryname,
                        $requestee
                    ); // SALES SERVICE REQEUST


                } else {

                    $cocogen_monitoring_for_approval = new cocogen_monitoring_for_approval();
                    $cocogen_monitoring_for_approval->intermediary = $request->intermediary;
                    $cocogen_monitoring_for_approval->intermediaryname = $request->intermediaryname;
                    $cocogen_monitoring_for_approval->remaining_doc = "";
                    $cocogen_monitoring_for_approval->date_request = $dateToday;
                    $cocogen_monitoring_for_approval->Status = "PENDING";
                    $cocogen_monitoring_for_approval->reason_for_request = !empty($request->padrequest) ? $request->padrequest : "";
                    $cocogen_monitoring_for_approval->padtype = $request->padtype;
                    $cocogen_monitoring_for_approval->request_by = \Auth::user()->email;
                    $cocogen_monitoring_for_approval->save();
                    $cocogen_monitoring_for_approval->intermediarycount = $cocogen_monitoring_for_approval->id;
                    $cocogen_monitoring_for_approval->id;
                    $cocogen_monitoring_for_approval->save();
                    $this->emailsrequest(
                        $request->padtype,
                        $request->intermediary,
                        $request->intermediaryname,
                        $requestee
                    ); // SALES SERVICE REQEUST
                }
                $data = "sentrequest";
                return response()->json($data);
            } else {


                if ($request->file("file")) {
                    $files = $request->file("file");
                    $customerArr = $this->csvToArray($files);
                    $nonExistentIds = [];
                    $duplicate = [];
                    $expired = [];
                    $errValue = '';
                    $nopadds = '';
                    $customerArr = array_values($customerArr);

                    if ($request->file('file')->isValid()) {
                        $approval_details = cocogen_monitoring_for_approval::select('intermediarycount')
                            ->where('intermediary', $request->intermediary)
                            ->orderby('intermediarycount', 'desc')
                            ->first();

                        $file = $request->file('file');
                        $originalFilename = $file->getClientOriginalName();
                        $cocogen_monitoring_production = cocogen_monitoring_production::firstOrCreate(
                            [
                                'intermediaryno' => $request->intermediary,
                                'addpad' => $request->addpad,
                            ],
                            [
                                'filename' => $originalFilename,
                                'filepath' => $dateToday . '/' . $originalFilename,
                                'intermediarycount' => isset($approval_details) && is_object($approval_details) ? $approval_details->intermediarycount : null,
                            ]
                        );
                        $request->file('file')->move(storage_path('app/public') . '/monitoring/' . $dateToday . '/', $originalFilename);
                        $prepareemail = cocogen_monitoring_production::where('intermediaryno', $request->intermediary)->first();
                        $location = storage_path('app/public/monitoring') . "/" . $prepareemail->filepath;
                        cocogen_monitoring_for_approval::where('intermediarycount', $approval_details->intermediarycount)
                            ->update(['dateupload' => $dateToday]);

                    } else {
                        return 'Error uploading file!';
                    }


                    $all_codes = array();
                    // $policypadtype=[];
                    $policypadno = [];
                    $intercountnum = [];
                    foreach ($customerArr as $customVal) {

                        if ($request->padtype == 'COC') {
                            $string = $customVal['Policy No.'];
                            if (substr($string, 0, 3) === "COC") {
                                $string = substr($string, 3);
                            }
                            $get_pad_range = cocogen_monitoring_for_approval::select('remaining_doc', 'padrange', 'expirydate', 'intermediarycount')->where('padrange', $string)->get();


                            $remaining = $get_pad_range[0]->remaining_doc;
                            $range = $get_pad_range[0]->padrange;

                            if (preg_match('/^\d+/', $range, $matches)) {
                                $first_number = 'COC' . $matches[0];
                            }

                            $expdate = $get_pad_range[0]->expirydate;
                            $intercount = $get_pad_range[0]->intermediarycount;

                            $countPadrange = cocogen_monitoring_upload_file::where('policyno', $first_number)->count();

                            if ($remaining > $countPadrange) {
                                $policy_no_val = $customVal['Policy No.'];
                                $new_record = new cocogen_monitoring_upload_file;
                                $new_record->intermediaryno = $request->intermediary;
                                $new_record->policyno = $policy_no_val;
                                $new_record->padtype = $request->padtype;
                                $new_record->adminpolicyno = $policy_no_val;
                                $new_record->assuredname = $customVal["Assured's Name"];
                                $new_record->issuedate = $customVal['Issue Date'];
                                $new_record->effectivitydate = $customVal['Effectivity Date'];
                                $new_record->intermediarycount = $intercount;
                                $new_record->created_at = $dateToday;
                                $new_record->expire_date = $expdate;
                                $new_record->owner = \Auth::user()->email;
                                $new_record->save();

                                $padcount = cocogen_monitoring_upload_file::where('policyno', $policy_no_val)->count();
                                cocogen_monitoring_for_approval::where('intermediary', $request->intermediary)
                                    ->where('intermediarycount', $intercount)
                                    ->update(['used_doc' => $padcount]);
                            } else {
                                $nopadds = 'YES';
                            }
                        }
                        // $params =$customVal['Policy No.'].$customVal[''];
                        $params = $customVal['Policy No.'];
                        // $realPolicy = $customVal['Policy No.'] . '#' . $customVal['']; // Prepare the Policy number addopt what they need
                        // $pos = strpos($realPolicy, '#') + 1;
                        // $params = substr($realPolicy, $pos); // Final policy number
                        if (in_array($params, $all_codes)) {
                            // The policy number has already been processed, skip it
                            continue;
                        }
                        if ($customVal['Policy No.'] == 'COC') {

                        } else {
                            $intercount = '';
                            $checkmodal = DB::table('cocogen_monitoring_upload_file')
                                // ->where('intermediaryno', $request->intermediary)// Validate
                                ->where('policyno', $params)
                                ->exists();

                            if ($checkmodal == true || $checkmodal == '') {

                                $checkmodalpolicy = DB::table('cocogen_monitoring_upload_file')
                                    ->where('intermediaryno', $request->intermediary)
                                    ->where('padtype', $customVal['Policy No.'])
                                    ->where('policyno', $params)
                                    ->distinct()
                                    ->exists();


                                if ($checkmodalpolicy == true) {
                                    $duplicate[] = $customVal['Policy No.'];

                                } else {
                                    $dateToday = date('Y-m-d');
                                    // $dateToday = '2023-03-31';
                                    $checkexpire = cocogen_monitoring_upload_file::where('adminpolicyno', $params)
                                        ->where('expire_date', '<=', $dateToday)
                                        ->get();

                                    if (count($checkexpire) == 0) {

                                        if ($customVal['Policy No.'] == 'COC') {

                                        } else {
                                            $dateToday = date('Y-m-d');
                                            // $policy_no_val =  $customVal['Policy No.'].$customVal[''];
                                            $policy_no_val = $customVal['Policy No.'];
                                            $count_update_file = cocogen_monitoring_upload_file::where('adminpolicyno', $policy_no_val)
                                                ->where('intermediaryno', $request->intermediary)
                                                ->update([
                                                    'policyno' => $policy_no_val,
                                                    'assuredname' => $customVal["Assured's Name"],
                                                    'issuedate' => $customVal['Issue Date'],
                                                    'effectivitydate' => $customVal['Effectivity Date'],
                                                    'releasedate' => $customVal['Release date'],
                                                    'created_at' => $dateToday,
                                                    'owner' => \Auth::user()->email,
                                                ]);
                                        }

                                    } else {
                                        $get_pad_range = cocogen_monitoring_for_approval::select('padrange')
                                            ->where('intermediary', $request->intermediary)
                                            // ->where('intermediarycount',$checkexpire[0]['intermediarycount'])
                                            ->get();

                                        $expired[] = $get_pad_range[0]['padrange'];
                                    }

                                }
                                $totalCount = cocogen_monitoring_for_approval::select('remaining_doc', 'intermediarycount')
                                    ->where('intermediary', $request->intermediary)
                                    ->orderby('intermediarycount', 'desc')
                                    ->get();

                                $totalcount = !empty($totalCount[0]['remaining_doc']) ? $totalCount[0]['remaining_doc'] : 0;

                                $getcountno = cocogen_monitoring_upload_file::select('intermediarycount')
                                    ->where('adminpolicyno', $params)
                                    ->value('intermediarycount');

                                $countnum = cocogen_monitoring_upload_file::where(function ($query) {
                                    $query->whereNotNull('policyno')
                                        ->where('policyno', '<>', '');
                                })
                                    ->where('intermediaryno', $request->intermediary)
                                    ->where('intermediarycount', $getcountno)
                                    ->count();

                                $checkupdate = cocogen_monitoring_for_approval::where('intermediary', $request->intermediary)
                                    ->where('intermediarycount', $getcountno)
                                    ->update(['used_doc' => $countnum]);

                                $result = DB::table('cocogen_monitoring_upload_file')
                                    ->select(DB::raw('COUNT(policyno) as test'))
                                    ->where('intermediarycount', $getcountno)
                                    ->where('policyno', '')
                                    ->where('intermediaryno', $request->intermediary)
                                    ->get();

                                $count = $result[0]->test;
                                if ($count == 0) {
                                    // request for additional padds
                                    $nopadds = 'YES';
                                } else {
                                    // Uncomment after testing
                                    //  if ($totalcount / $count >= 0.5) {
                                    // //     cocogen_monitoring_for_approval::where('intermediarycount',$totalCount[0]['intermediarycount'])
                                    // //     ->where('intermediary',$request->intermediary)
                                    // // ->update(['status'=>'PENDING','reason_for_request'=>'Utilization equal or above 50%','dateupload'=>$dateToday]);

                                    //     $cocogen_monitoring_for_approval = new cocogen_monitoring_for_approval();
                                    //     $cocogen_monitoring_for_approval->intermediary =$request->intermediary;
                                    //     $cocogen_monitoring_for_approval->intermediaryname =$request->intermediaryname;
                                    //     $cocogen_monitoring_for_approval->remaining_doc = "";
                                    //     $cocogen_monitoring_for_approval->date_request = $dateToday;
                                    //     $cocogen_monitoring_for_approval->Status = "PENDING";
                                    //     $cocogen_monitoring_for_approval->reason_for_request = "Utilization equal or above 50%";
                                    //     $cocogen_monitoring_for_approval->padtype =$request->padtype;
                                    //     $cocogen_monitoring_for_approval->request_by = \Auth::user()->email;
                                    //     $cocogen_monitoring_for_approval->save();
                                    //     $cocogen_monitoring_for_approval->intermediarycount =$cocogen_monitoring_for_approval->id;
                                    //     $cocogen_monitoring_for_approval->save();
                                    //     $this->emailsrequest(
                                    //         $request->padtype,
                                    //         $request->intermediary,
                                    //         $request->intermediaryname,
                                    //         $requestee
                                    //     ); // SALES SERVICE REQUEST
                                    //  }
                                }


                            } else {

                                // $nonExistentIds[] = $customVal['Policy No.'].'#'.$customVal[''];
                                if (!empty($customVal['Policy No.'])) {
                                    $nonExistentIds[] = $customVal['Policy No.'];
                                }
                            }

                        }
                        $all_codes[] = $params; // Add the policy number to the processed list
                        $policypadno[] = $customVal['Policy No.'];
                        // $policypadtype[]=$customVal['Policy No.'];
                        $intercountnum = $intercount;
                    }

                    $all_codes_str = "'" . implode("','", $all_codes) . "'"; // Set the codes to the desired format

                    $SecurityCode = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . $all_codes_str);
                    $client = new Client();
                    $res = $client->request('POST', 'http://webapi.cocogen.ph/api/manualmonitoring/get/policy/invoice', [
                        'form_params' => [
                            'Username' => 'cocogenAPI',
                            'SecurityCode' => $SecurityCode,
                            'policy' => $all_codes_str,
                        ],
                    ]);
                    $contentsproduction = $res->getBody()->getContents();
                    $data = json_decode($contentsproduction, true);

                    if (array_key_exists('TErrorMsg', $data)) {
                        //no data
                    } else {


                        $productIds = array_unique(array_column($data, 'ref_pol_no'));
                        $existingProductIds = cocogen_monitoring_api::whereIn('ref_pol_no', $productIds)->pluck('ref_pol_no')->toArray();

                        $issuedArray = $data;

                        if (!empty($existingProductIds)) {
                            //Duplicate
                        } else {
                            // Create an empty array to hold the policy ids with greatest value
                            $greatestPolicyIds = [];
                            foreach ($issuedArray as $agentData) {

                                // Explode the policy id and get the value of the last part
                                $policyIdParts = explode('-', $agentData['policy_id']);
                                $policyIdValue = end($policyIdParts);
                                // If the ref_pol_no is not already in the greatestPolicyIds array, add it with its policy id value
                                if (!isset($greatestPolicyIds[$agentData['ref_pol_no']])) {
                                    $greatestPolicyIds[$agentData['ref_pol_no']] = $policyIdValue;
                                } else {
                                    // If the ref_pol_no is already in the greatestPolicyIds array, check if the current policy id value is greater than the stored one
                                    if ($policyIdValue > $greatestPolicyIds[$agentData['ref_pol_no']]) {
                                        $greatestPolicyIds[$agentData['ref_pol_no']] = $policyIdValue;
                                    }
                                }
                            }

                            // Loop through the greatestPolicyIds array to get the policy ids with greatest value
                            foreach ($greatestPolicyIds as $ref_pol_no => $policyIdValue) {
                                // Create a variable to hold the policy id with greatest value
                                $greatestPolicyId = '';

                                foreach ($data as $agentData) {

                                    $agent = new cocogen_monitoring_api;
                                    $agent->policy_id = $agentData['policy_id'];
                                    $agent->invoice_no = $agentData['invoice_no'];
                                    $agent->status = $agentData['status'];
                                    $agent->issue_date = $agentData['issue_date'];
                                    $agent->ref_pol_no = $agentData['ref_pol_no'];
                                    $agent->agent = $request->intermediaryname;
                                    $agent->series = $agentData['ref_pol_no'];
                                    $agent->save();
                                    cocogen_monitoring_upload_file::where('adminpolicyno', $agentData['ref_pol_no'])
                                        ->update(['tag_with_api' => '1']);
                                    // Add the ref_pol_no to the existingProductIds array to prevent duplicates
                                    $existingProductIds[] = $agentData['ref_pol_no'];
                                }

                            }
                        }
                    }
                }
            }
        }



        $last_approve = cocogen_monitoring_for_approval::select("intermediarycount", "intermediary", "status", "last_approve_request", "padtype", "padrange", "remaining_doc")
            ->where("intermediary", $request->intermediary)
            ->where('remaining_doc', '<>', '')
            ->orderby('id', 'desc')
            ->get();

        $intercount = !empty($intercount) ? $intercount : $last_approve[0]->intermediarycount;
        $set_limit = $last_approve[0]->remaining_doc;

        $count_fileupload = cocogen_monitoring_upload_file::where("intermediaryno", $request->intermediary)
            ->where('intermediarycount', $last_approve[0]->intermediarycount)
            ->where('policyno', '<>', '')
            ->count();

        $count_fileupload = $set_limit - $count_fileupload;

        $cocogen_monitoring_record = new cocogen_monitoring_record();
        $cocogen_monitoring_record->intermediaryno = $request->intermediary;
        $cocogen_monitoring_record->intermediary = $request->intermediaryname;
        $cocogen_monitoring_record->intermediarycount = $last_approve[0]["intermediarycount"];
        $cocogen_monitoring_record->dateupload = $dateToday;
        $cocogen_monitoring_record->recordcount = $count_fileupload;
        $cocogen_monitoring_record->status = $last_approve[0]["status"];
        $cocogen_monitoring_record->padtype = $last_approve[0]["padtype"];
        $cocogen_monitoring_record->padrange = $last_approve[0]["padrange"];
        $cocogen_monitoring_record->last_approve_request = $last_approve[0]["last_approve_request"];
        $cocogen_monitoring_record->uploader = \Auth::user()->email;
        $cocogen_monitoring_record->save();

        $data = cocogen_monitoring_record::select("padtype", "padrange", "intermediary", "dateupload", "recordcount", "uploader")
            ->where("intermediaryno", $request->intermediary)
            ->where("intermediarycount", $intercount)
            ->whereIn('status', ['APPROVED', 'RELEASED'])
            ->whereRaw('id IN (SELECT MAX(id) FROM cocogen_monitoring_record WHERE intermediaryno = ? AND intermediarycount = ? AND status IN (?, ?) GROUP BY intermediarycount)', [$request->intermediary, $intercount, 'APPROVED', 'RELEASED'])
            ->orderByDesc("id")
            ->get();




        if ($nopadds == 'Yes') {
            return response()->json([
                "nopadds" => $nopadds,
            ]);
        } elseif (count($duplicate) > 0) {
            return response()->json([
                "duplicate" => $duplicate,
            ]);
        } elseif (count($nonExistentIds) > 0) {
            return response()->json([
                "nonExistentIds" => $nonExistentIds,
            ]);
        } elseif (count($expired) > 0) {
            return response()->json([
                "expired" => $expired,
            ]);
        } else {

            return response()->json($data);
        }
    }
    public function emailsrequest($padtype, $code, $intermediaryname, $requestee)
    {
        //sales
        $email = "";
        if ($padtype == "PC") {
            $padtype = "Private";
        } elseif ($padtype == "CV") {
            $padtype = "Commercial";
        } elseif ($padtype == "MCY") {
            $padtype = "Motor-Motorcycle";
        } elseif ($padtype == "Endorsement") {
            $padtype = "Motor-Endrosement";
        } else {
            $padtype = "CTPL";
        }

        $data = array('padtype' => $padtype, 'code' => $code, 'intermediaryname' => $intermediaryname, 'requestee' => $requestee, 'email' => $email);
        Mail::send('emailtemplate.manualmonitoring', $data, function ($message) use ($padtype, $code, $intermediaryname, $requestee, $email) {
            $message->to('nova_samera@cocogen.com')
                //  ->cc(['larren_aguilar@cocogen.com'])
                //->cc(['christian_kee@cocogen.com','zzzz@cocogen.com','larren_aguilar@cocogen.com'])
                ->subject('Request of Documents ' . $requestee)->from('client_services@cocogen.com', 'COCOGEN');
        });
    }

    public function emailsattachment($padtype, $code, $intermediaryname, $requestee, $location)
    {
        //sales
        $email = "";
        if ($padtype == "PC") {
            $padtype = "Private";
        } elseif ($padtype == "CV") {
            $padtype = "Commercial";
        } elseif ($padtype == "MCY") {
            $padtype = "Motor-Motorcycle";
        } elseif ($padtype == "Endorsement") {
            $padtype = "Motor-Endrosement";
        } else {
            $padtype = "CTPL";
        }
        $data = [
            "padtype" => $padtype,
            "code" => $code,
            "intermediaryname" => $intermediaryname,
            "requestee" => $requestee,
            "location" => $location,
            "email" => $email,
        ];

        Mail::send('emailtemplate.manualmonitoringwithexcel', $data, function ($message) use ($padtype, $code, $intermediaryname, $requestee, $location, $email) {
            $message->to('nova_samera@cocogen.com')
                //->cc(['christian_kee@cocogen.com','nova_samera@cocogen.com','larren_aguilar@cocogen.com'])
                // ->cc(['larren_aguilar@cocogen.com'])
                ->subject('Request of Documents ' . $requestee);
            $message->attach(
                $location,
                array(
                    'as' => "Document Request-" . "-" . $requestee . ".csv",
                    'mime' => 'application/csv'
                )
            );
        });
    }

    public function csvToArray($filename = "", $delimiter = ",")
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = [];
        if (($handle = fopen($filename, "r")) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }

    public function checkApprove(Request $request)
    {

        $results = DB::table("cocogen_monitoring_for_approval")
            ->where("intermediary", $request->intermediary)
            ->whereNotNull('status') // add condition to check if release value exists
            ->whereIn('status', ['APPROVED', 'RELEASED', 'ENDORSED', 'PENDING']) // add condition to check if status is either Release or PENDING
            ->orderBy("intermediarycount", "desc")
            ->first(["used_doc", "status"]);

        if ($results) {
            if ($results->status == 'PENDING') {
                // if ($results->used_doc == 50) {
                DB::table("cocogen_monitoring_for_approval")
                    ->where("intermediary", $request->intermediary)
                    ->update(["complete" => 1]); //Check if the exisitng value is  fulll
                // }
                $status = "PENDING";
            } else if ($results->status == 'RELEASED') {
                // if ($results->used_doc == 50) {
                DB::table("cocogen_monitoring_for_approval")
                    ->where("intermediary", $request->intermediary)
                    ->update(["complete" => 1]); //Check if the exisitng value is  fulll
                return "NO REQUEST";
                // } else {
                //     $status = 'RELEASED';
                // }
            } else {
                $status = 'APPROVED';
            }
            return $status;
        } else {
            return "NO REQUEST";
        }

    }



    public function agentlist(Request $request)
    {
        $data = cocogen_users_agent_code::SELECT(
            "users.name",
            "cocogen_users_agent_code.id",
            "cocogen_users_agent_code.email",
            "cocogen_users_agent_code.code"
        )
            ->join("users", "users.email", "cocogen_users_agent_code.email")
            ->distinct()
            ->orderBy("name", "ASC")
            ->get();
        return response()->json($data, 201);
    }

    public function getResult(Request $request, $id, $id2)
    {

        $checkCtpl = cocogen_monitoring_for_approval::select('padtype')
            ->where("intermediarycount", $id)
            ->where("intermediary", $id2)
            ->get();

        if ($checkCtpl[0]->padtype != 'COC') {

            $data = cocogen_monitoring_upload_file::select(
                "cocogen_monitoring_upload_file.adminpolicyno",
                "cocogen_monitoring_upload_file.assuredname",
                "cocogen_monitoring_upload_file.policyno",
                "cocogen_monitoring_upload_file.issuedate",
                "cocogen_monitoring_upload_file.effectivitydate",
                "cocogen_monitoring_upload_file.created_at",
                "cocogen_monitoring_api.policy_id",
                "cocogen_monitoring_api.status",
                DB::raw("COALESCE(cocogen_monitoring_api.invoice_no, '') AS invoice_no")
            )
                ->leftJoin("cocogen_monitoring_api", "cocogen_monitoring_api.series", "=", "cocogen_monitoring_upload_file.policyno")
                ->where("cocogen_monitoring_upload_file.intermediaryno", $id2)
                ->where("cocogen_monitoring_upload_file.intermediarycount", $id)
                ->orderBy("cocogen_monitoring_upload_file.policyno", 'asc')
                ->get()
                ->groupBy('policyno')
                ->map(function ($group) {
                    $latest = $group->max('policy_id');
                    $result = $group->first(); // Get the first item in the group
                    $item = [
                        "adminpolicyno" => $result->adminpolicyno,
                        "assuredname" => $result->assuredname,
                        "policyno" => $result->policyno,
                        "issuedate" => date("Y-m-d", strtotime($result->issuedate)),
                        "effectivitydate" => $result->effectivitydate,
                        "series" => $result->policy_id,
                        "status" => $result->status,
                        "invoice_no" => !empty($result->invoice_no) ? $result->invoice_no : '',
                    ];
                    if (!empty($result->policyno)) {
                        $item["created_at"] = date("Y-m-d", strtotime($result->created_at));
                    }
                    $seriesParts = explode("-", $latest);
                    $item["policy_id"] = $latest;
                    return $item;
                });
        } else {

            $data = cocogen_monitoring_upload_file::where("intermediaryno", $id2)
                ->where("intermediarycount", $id)
                ->get();

        }

        return response()->json($data, 201);
    }


    public function generateFilter(Request $request)
    {
        $status = $request->status;
        $intermediary = $request->intermediary;
        $startdate = !empty(session("startdate"))
            ? session("startdate")
            : $request->searchstart;
        $enddate = !empty(strtotime(session("enddate") . " + 1 days"))
            ? strtotime(session("enddate") . " + 1 days")
            : $request->searchend;
        $end = date("Y-m-d", $enddate);
        if (
            !empty($end) &&
            !empty($startdate) &&
            !empty($status) &&
            !empty($intermediary)
        ) {
            $startdate = !empty(session("startdate"))
                ? session("startdate")
                : $request->searchstart;
            $enddate = !empty(strtotime(session("enddate") . " + 1 days"))
                ? strtotime(session("enddate") . " + 1 days")
                : $request->searchend;
            $end = date("Y-m-d", $enddate);

            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->where("created_at", ">=", $startdate)
                ->where("created_at", "<=", $end)
                ->where("status", "=", $status)
                // ->where("intermediary", "=", $intermediary)
                ->orderBy("id", "DESC")
                ->get();
        } elseif (empty($end) && !empty($startdate) && empty($status)) {
            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->where("created_at", ">=", $startdate)
                ->get();
        } elseif (!empty($end) && empty($startdate) && empty($status)) {
            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->where("created_at", "<=", $end)
                ->orderBy("id", "DESC")
                ->get();
        } elseif (empty($end) && empty($startdate) && !empty($status)) {
            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->where("status", "=", $status)
                ->orderBy("id", "DESC")
                ->get();
        } elseif (!empty($end) && !empty($startdate) && empty($status)) {
            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->where("created_at", ">=", $startdate)
                ->where("created_at", "<=", $end)
                ->orderBy("id", "DESC")
                ->get();
        } elseif (!empty($end) && empty($startdate) && !empty($status)) {
            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->where("status", "=", $status)
                ->where("created_at", "<=", $end)
                ->orderBy("id", "DESC")
                ->get();
        } elseif (empty($end) && !empty($startdate) && !empty($status)) {
            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->where("status", "=", $startdate)
                ->where("created_at", ">=", session("startdate"))
                ->orderBy("id", "DESC")
                ->get();
        } else {
            $cocogen_monitoring_for_approval = cocogen_monitoring_for_approval::select(
                "*"
            )
                ->orderBy("cocogen_monitoring_for_approval.id", "DESC")
                ->get();
        }

        return response()->json($cocogen_monitoring_for_approval);
    }
    public function monitor_display()
    {
        $data = cocogen_monitoring_for_approval::select('padrange', 'padtype', 'intermediary', 'intermediarycount', 'created_at', 'used_doc')->get();
        return DataTables::of($data)->make(true);
    }


    public function agent_display(Request $request)
    {

        // $data = cocogen_user_agent_filter_code::where('system_status', 'ACTIVE')->get();

        // return response()->json($data);

        $cocogen_user_agent_filter_code = cocogen_user_agent_filter_code::where('system_status', 'ACTIVE')->get();

        return response()->json($cocogen_user_agent_filter_code, 201);


    }




}

