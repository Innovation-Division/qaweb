<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\province;
use App\Models\occupation;
use App\Models\nationality;
use App\Models\cocogen_epolicy_dtl;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_users_agent_email;
use App\Models\cocogen_users_client_code;
use App\Models\cocogen_users_client_email;
use App\Models\user_uploads;
use App\Models\cocogen_hardcopies;
use App\Models\cocogen_hardcopies_pol;
use Illuminate\Http\Request;
use App\Models\cocogen_meta;
use App\Models\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_subchild;
use DateTime;
use DB;
use Storage;
use Mail;
use App\Models\cocogen_admin_paidpolicies;
use App\Models\cocogen_admin_cancelledpolicies;
use App\Models\cocogen_product_line;
use App\Models\cocogen_set_agent_code;
use App\Models\cocogen_admin_blocked_agents_protech;
use App\Models\cocogen_admin_blocked_agents_case1;
use App\Models\cocogen_admin_blocked_agents_case2;
use App\Models\cocogen_admin_blocked_client_case3;
use App\Models\cocogen_feedback_user_login;
use App\Models\cocogen_feedback_comment;
use App\Models\cocogen_feedback_user_comment;
use App\Models\cocogen_annual_survey;
use App\Models\cocogen_monitoring_pad_type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use PDF;
use App\Models\cocogen_api_users;
use App\Models\cocogen_user_agent_filter_code;

class epolicy extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $province = province::get();
        $nationality = nationality::get();
        $occupation = occupation::get();
        $transID4 = "";

        $cocogen_product_line = cocogen_product_line::where('status', '=', "Yes")
            ->orderBy('line', 'asc')
            ->get();


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

        $cocogen_epolicy_dtl_agent = "";
        $cocogen_epolicy_dtl_client = "";
        $cocogen_admin_paidpolicies = "";
        $cocogen_admin_cancelledpolicies = "";
        // dd(\Auth::user()->type);
        if(\Auth::user()->type ==="A" || \Auth::user()->type ==="B" || \Auth::user()->type ==="C"){
            if (\Auth::user()->type != "C") {
                $myaccountagent = cocogen_users_agent_code::select('code')->where('email', \Auth::user()->email)->get();
                $myaccountagentcode = "";
                $myaccountagentcodecoodefirst = "";
              
                if ($myaccountagent) {
                 
                    foreach ($myaccountagent as $val) {
                        if (!$myaccountagentcode) {
                            $myaccountagentcodecoodefirst = $val->code;
                            $myaccountagentcode = $val->code;
                        } else {
                            $myaccountagentcode = $myaccountagentcode . "," . $val->code;
                        }
                    }
                }
                $date = date_create();
                $datehash = date_timestamp_get($date);
                $transID = $myaccountagentcodecoodefirst . ":" . $datehash . ":" . \Auth::user()->email;
                $transID2 = sha1($transID);
                $transID3 = $transID . ":" . $transID2;
                $transID4 = base64_encode($transID3);
                $getmyotheraccountemail = cocogen_users_agent_email::select('email2')->where('email', '=', \Auth::user()->email)->get();
                $getmyotheraccountcode = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail)->get();
                //get my other email
                $myotehraccountagentcode = "";
                if ($getmyotheraccountcode) {
                    foreach ($getmyotheraccountcode as $val) {
                        if (!$myotehraccountagentcode) {
                            $myotehraccountagentcode = $val->code;
                        } else {
                            $myotehraccountagentcode = $myotehraccountagentcode . "," . $val->code;
                        }
                    }
                }
                $getmyotheraccountemail2 = cocogen_users_agent_email::select('email')->where('email2', '=', \Auth::user()->email)->get();
                $getmyotheraccountcode2 = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail2)->get();
                //get my other email
                $myotehraccountagentcode2 = "";
                if ($getmyotheraccountcode2) {
                    foreach ($getmyotheraccountcode2 as $val) {
                        if (!$myotehraccountagentcode2) {
                            $myotehraccountagentcode2 = $val->code;
                        } else {
                            $myotehraccountagentcode2 = $myotehraccountagentcode2 . "," . $val->code;
                        }
                    }
                }
                if ($myotehraccountagentcode) {
                    $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode;
                }
                if ($myotehraccountagentcode2) {
                    $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode2;
                }
                // $myaccountagentcode = explode(',', $myaccountagentcode);
                // $cocogen_epolicy_dtl_agent = cocogen_epolicy_dtl::whereIn('agentId', $myaccountagentcode)->get();
                $myaccountagentcodeoldformat = $myaccountagentcode;
                $agent = $myaccountagentcode;
                // dd($agent);
                $start = Carbon::now()->subYears(3)->toDateString();
                $end = Carbon::now()->toDateString();
    
                $SecurityCode = sha1("cocogenAPI".":". "cocogenAPI" .":". $agent);
                $client = new Client();
                $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/get/policy/per/agent', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCode,
                    'agent' => $agent,
                    'start' => $start,
                    'end' => $end,
                ]
                ]);
        
                $contentsproduction = $res->getBody()->getContents();
                $data = json_decode($contentsproduction, true);
    
                $cocogen_epolicy_dtl_agent = collect($data);
    
                // dd($cocogen_epolicy_dtl_agent);
    
                $myclientpolicy = "";
                if ($cocogen_epolicy_dtl_agent) {
                    if(!empty($cocogen_epolicy_dtl_agent["TErrorMsg"])){
    
                    }else{
                        foreach ($cocogen_epolicy_dtl_agent as $val) {
    
                            if (!$myclientpolicy) {
                                $myclientpolicy = $val['policy_no'];
                            } else {
                                $myclientpolicy = $myclientpolicy . "," . $val['policy_no'];
                            }
    
                        }
                        $myclientpolicy = explode(',', $myclientpolicy);
                    }
                    
                
                }
                // $cocogen_admin_paidpolicies = cocogen_admin_paidpolicies::whereIn('policy', $myclientpolicy)->get();
                // $cocogen_admin_cancelledpolicies = cocogen_admin_cancelledpolicies::whereIn('policy', $myclientpolicy)->get();
    
            } else {
                $cocogen_epolicy_dtl_agent = "";
            }
    
            if (\Auth::user()->type != "A") {
                
                //mycode
                $myaccountclient = cocogen_users_client_code::select('code')->where('email', \Auth::user()->email)->get();
                $myaccountclientcode = "";
                if ($myaccountclient) {
                    foreach ($myaccountclient as $val) {
                        if (!$myaccountclientcode) {
                            $myaccountclientcode = $val->code;
                        } else {
                            $myaccountclientcode = $myaccountclientcode . "," . $val->code;
                        }
                    }
                }
                $getmyotheraccountemailclient = cocogen_users_client_email::select('email2')->where('email', '=', \Auth::user()->email)->get();
                $getmyotheraccountcodeclient = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient)->get();
                //get my other email
                $myotehraccountclientcode = "";
                if ($getmyotheraccountcodeclient) {
                    foreach ($getmyotheraccountcodeclient as $val) {
                        if (!$myotehraccountclientcode) {
                            $myotehraccountclientcode = $val->code;
                        } else {
                            $myotehraccountclientcode = $myotehraccountclientcode . "," . $val->code;
                        }
                    }
                }
    
                $getmyotheraccountemailclient2 = cocogen_users_client_email::select('email')->where('email2', '=', \Auth::user()->email)->get();
                $getmyotheraccountcodeclient2 = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient2)->get();
                //get my other email
                $myotehraccountclientcode2 = "";
                if ($getmyotheraccountcodeclient2) {
                    foreach ($getmyotheraccountcodeclient2 as $val) {
                        if (!$myotehraccountclientcode2) {
                            $myotehraccountclientcode2 = $val->code;
                        } else {
                            $myotehraccountclientcode2 = $myotehraccountclientcode2 . "," . $val->code;
                        }
                    }
                }
                if ($myotehraccountclientcode) {
                    $myaccountclientcode = $myaccountclientcode . ',' . $myotehraccountclientcode;
                }
                if ($myotehraccountclientcode2) {
                    $myaccountclientcode = $myaccountclientcode . ',' . $myotehraccountclientcode2;
                }
                // $myaccountclientcode = explode(',', $myaccountclientcode);
                // $cocogen_epolicy_dtl_client = cocogen_epolicy_dtl::whereIn('clientAssuredId', $myaccountclientcode)->get();
                $assd_no = $myaccountclientcode;
                $start = Carbon::now()->subYears(3)->toDateString();
                $end = Carbon::now()->toDateString();
                $SecurityCode = sha1("cocogenAPI".":". "cocogenAPI" .":". $assd_no);
                $client = new Client();
                $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/get/policy/per/client', [
                    'form_params' => [
                        'Username' => 'cocogenAPI',
                        'SecurityCode' => $SecurityCode,
                        'assd_no' => $assd_no,
                        'start' => $start,
                        'end' => $end,
                    ]
                ]);
        
                $contentsproduction = $res->getBody()->getContents();
                $data = json_decode($contentsproduction, true);
    
                $cocogen_epolicy_dtl_client = collect($data);
    
                //($cocogen_epolicy_dtl_client);
    
                $mypolicy = "";
                if ($cocogen_epolicy_dtl_client) {
                    if(!empty($cocogen_epolicy_dtl_client["TErrorMsg"])){
    
                    }else{
                        foreach ($cocogen_epolicy_dtl_client as $val) {
                            if (!$mypolicy) {
                                $mypolicy = $val['policy_no'];
                            } else {
                                $mypolicy = $mypolicy . "," . $val['policy_no'];
                            }
                        }
                    }
                    $mypolicy = explode(',', $mypolicy);
                }
                
                //$cocogen_admin_paidpolicies = cocogen_admin_paidpolicies::whereIn('policy', $mypolicy)->get();
                //dd($cocogen_admin_paidpolicies,$cocogen_epolicy_dtl_client,$mypolicy);
                //$cocogen_admin_cancelledpolicies = cocogen_admin_cancelledpolicies::whereIn('policy', $mypolicy)->get();
            } else {
                $cocogen_epolicy_dtl_client = "";
            }
        }
    
        //get my account code
        $cocogen_epolicy_dtl_last = cocogen_epolicy_dtl::orderBy('created_at', 'desc')->first();
        $cocogen_admin_paidpolicies_last = cocogen_admin_paidpolicies::orderBy('created_at', 'desc')->first();
        //dd($cocogen_epolicy_dtl_last["created_at"],$cocogen_admin_paidpolicies_last["created_at"]);
        
        // if ($cocogen_epolicy_dtl_last["created_at"] > $cocogen_admin_paidpolicies_last["created_at"]) {
        //     $date = $cocogen_admin_paidpolicies_last["created_at"];
        // } else {
        //     $date = $cocogen_epolicy_dtl_last["created_at"];
        // }

        $geniisysdataclient = array();
        $geniisysdata = array();                                      

        if (\Auth::user()->type === "A"){
            if(empty($agentcodesss)){
                $geniisysdata = "";
            }else{
                $username = "cocogenAPI";
                $password = "cocogenAPI";
                $digest = sha1($username.":".$password.":".$agentcodesss);
                $unparsed_json = file_get_contents("http://webapi.cocogen.ph/".$digest."/claimsdashboard?agent=".$agentcodesss);
                $geniisysdata = json_decode($unparsed_json, true);
            }
            
        }elseif (\Auth::user()->type === "B") {
            if(empty($agentcodesss)){
                $geniisysdata = "";
            }else{
                $username = "cocogenAPI";
                $password = "cocogenAPI";
                $digest = sha1($username.":".$password.":".$agentcodesss);
                $unparsed_json = file_get_contents("http://webapi.cocogen.ph/".$digest."/claimsdashboard?agent=".$agentcodesss);
                $geniisysdata = json_decode($unparsed_json, true);
            }
            
            if(empty($clientcodesss)){
                $geniisysdataclient = "";
            }else{
                $username = "cocogenAPI";
                $password = "cocogenAPI";
                $digest = sha1($username.":".$password.":".$clientcodesss);
                $unparsed_json = file_get_contents("http://webapi.cocogen.ph/".$digest."/claimsdashboard?client=".$clientcodesss);
                $geniisysdataclient = json_decode($unparsed_json, true);
            }
        }else{
            if(empty($clientcodesss)){
                $geniisysdataclient = "";
            }else{
                $username = "cocogenAPI";
                $password = "cocogenAPI";
                $digest = sha1($username.":".$password.":".$clientcodesss);
                $unparsed_json = file_get_contents("http://webapi.cocogen.ph/".$digest."/claimsdashboard?client=".$clientcodesss);
                $geniisysdataclient = json_decode($unparsed_json, true);
            }
            
        }   
        
        $agentCode = cocogen_users_agent_code::select('code')->where('cocogen_users_agent_code.email','=', \Auth::user()->email)->get();
        
        $cocogen_user_agent = cocogen_users_agent_code::SELECT('users.name','cocogen_users_agent_code.id','cocogen_users_agent_code.email','cocogen_users_agent_code.code')
        ->join('users','users.email','cocogen_users_agent_code.email')
        ->where('cocogen_users_agent_code.email','=', \Auth::user()->email)
        ->distinct()
        ->orderBy('name','ASC')
        ->get();
        $agentSelectedCode = cocogen_set_agent_code::where('ownerId', \Auth::user()->id)->get();
        $codeAgent = !empty($agentSelectedCode[0]['agentCode']) ? $agentSelectedCode[0]['agentCode'] :'';
        
         $validateProtech = cocogen_admin_blocked_agents_protech::where('agentNo','=',$codeAgent)->get();
        if($validateProtech->isEmpty()){
            $showProtech = 'False';
        }else{
            $showProtech = 'True';
        }
       
        $forFeedback =cocogen_feedback_user_login::where('user_id', \Auth::user()->id)->latest('id')->first();
        $feedbackUserDate = "";
        $feedbackUserNotif = "";
        $cocogen_monitoring_pad_type= cocogen_monitoring_pad_type::get();
        // $date = "";

        // $date = date_format($date, 'F d, Y');
        $date = date("F d, Y", strtotime("+8 hours"));  
        return view('home', ['title' => $title,
         'provinces' => $province,
         'nationalities' => $nationality,
         'occupations' => $occupation,
         'cocogen_epolicy_dtls' => $cocogen_epolicy_dtl_agent,
         'cocogen_epolicy_dtl_clients' => $cocogen_epolicy_dtl_client,
         'transID4' => $transID4,
         'metadescription' => $metadescription,
         'keyword' => $keyword,
         'cocogen_admin_footer' => $cocogen_admin_footer,
         'cocogen_admin_main' => $cocogen_admin_main,
         'cocogen_admin_submain' => $cocogen_admin_submain,
         'cocogen_admin_productlink' => $cocogen_admin_productlink,
         'cocogen_admin_subchild' => $cocogen_admin_subchild,
         'date' => $date,
         'cocogen_admin_paidpolicies' => $cocogen_admin_paidpolicies,
         'cocogen_admin_cancelledpolicies' => $cocogen_admin_cancelledpolicies,
         'cocogen_product_lines' => $cocogen_product_line,
         'geniisysdataclient' => $geniisysdataclient,
         'geniisysdata' => $geniisysdata,
         'agentCode'=>$agentCode,
         'cocogen_user_agent'=>$cocogen_user_agent,
         'codeAgent'=>$codeAgent,
         'showProtech'=>$showProtech,
         'feedbackUserDate'=>$feedbackUserDate,
         'feedbackUserNotif'=>$feedbackUserNotif,
         'cocogen_monitoring_pad_type'=>$cocogen_monitoring_pad_type]);
    }
    public function printPolicyDocs($id)
    {
        //$id = "CA-CFG-HO-21-0000002-06";
        $policy = substr($id, 0, 23);
 
        $line = substr($policy, 0, 2);

        $username = "cocogenAPI";

        $password = "cocogenAPI";
       
        $digest = sha1($username.":".$password.":".$policy);
       $unparsed_json = file_get_contents("http://webapi.cocogen.ph/api/".$digest."/renewalsystem/getrenewals/assuredno?policyno=".$policy. "&line=".$line);

       $geniisysdata = json_decode($unparsed_json, true);
        
       $data = collect($geniisysdata);
            $data->map(function ($item) {
  
                $policyId = $item['policy_id'];
                $password = $item['assd_no'];
                try {
                    $client = new Client();
                    $res = $client->request('POST', 'http://119.92.113.118:8080/epolicy/print', [
                        'json' => [
                            'docType' => 'policy',
                            'policyId' => $item['policy_id'],
                            'packPolFlag' => 'N',
                            'password' => $item['assd_no'],
                        ]
                    ]);

                    $dataraw = $res->getBody()->getContents();

                    if($dataraw) {
                        Storage::disk('public')->put('/pdf/'.$item['policy'].'.pdf', $dataraw);
                    }
                }   catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    return $e->getResponse()->getBody()->getContents();
                }
                       
        });
       
        $file = storage_path('app/public').'/pdf/'.$policy.'.pdf';
        return response()->download($file);
    }

    public function printPolicyJacket($id) 
    {
        $line = mb_substr($id, 0, 2);

        $subline = substr($id, 3, 3);

        $policyJacket = DB::table('cocogen_admin_policy_jacket')->where('line_cd', $line)->where('subline_cd', $subline)->first();

        return response()->download('/var/www/html/cocogen/public/pdfdocuments/ucpbpdf/'.$policyJacket->file_name);
    }

    public function printInvoice(Request $request)
    {

        $messageData = [
            'data' => $request->all(),
        ];

        $pdf = PDF::loadView('pdf.invoice', $messageData);

        return $pdf->download('invoice.pdf');
    }

    public function myaccountPersonalInfoSave(Request $request)
    {
        //dd($request);

        if (\Auth::user()->accountType === 'Group') {

            $rules = [
                'birthdate' => 'required|max:10'
            ];
            $niceNames = [
                'birthdate' => 'Date of Incorporation'
            ];
            $this->validate($request, $rules, [], $niceNames);

            $date = strtotime($request->get('birthdate'));
            $newformat = date('Y-m-d', $date);

            $users = users::findorFail($request->get('emailhid'));
            $users->DateIncorporate = $newformat;
            $users->save();

            $this->emailsendpersonaleinfogroup(\Auth::user()->email, \Auth::user()->name, $newformat);
        } else {

            $rules = [
                'gender' => 'required',
                'birth_date' => 'required',

            ];
            $niceNames = [
                'gender' => 'gender',
                'birth_date' => 'date of birth',

            ];
            $this->validate($request, $rules, [], $niceNames);

            $date = strtotime($request->get('birth_date'));
            $newformatbirthdate = date('Y-m-d', $date);

            $users = users::findorFail($request->get('emailhid'));
            $users->date_birth = $newformatbirthdate;
            $users->gender = $request->get('gender');
            //$users->nationality = $request->get('nationality');
            //$users->occupation = $request->get('occupation');
            $users->save();
            $this->emailsendpersonaleinfoind(\Auth::user()->email, \Auth::user()->name, $newformatbirthdate, $request->get('gender'));
        }


        $status_message = "Personal Info was successfully updated!";
        return back()->withInput()->with('message', $status_message);
    }

    public function emailsendpersonaleinfoind($email, $name, $newdate, $gender)
    {
        $data = array('email' => $email, 'name' => $name,  'newdate' => $newdate, 'gender' => $gender);
        Mail::send('emailtemplate.epolicyUpdatePersonalInfoInd', $data, function ($message) use ($name, $newdate, $email, $gender) {
            $message->to(env('EPOLICY_EMAILTO'), 'COCOGEN')->subject('Update Personal Info : ' . $name);
        });
    }

    public function emailsendpersonaleinfogroup($email, $name, $newdate)
    {
        $data = array('email' => $email, 'name' => $name,  'newdate' => $newdate);
        Mail::send('emailtemplate.epolicyUpdatePersonalInfoGroup', $data, function ($message) use ($name, $newdate, $email) {
            $message->to(env('EPOLICY_EMAILTO'), 'COCOGEN')->subject('Update Personal Info : ' . $name);
        });
    }



    public function profilepicsave(Request $request)
    {
        $status_message = "Upload successfully!";

        if ($request->file('filename')) {
            $shahash = sha1(\Auth::user()->name . $request->file('filename')->hashName());

            if ($request->file('filename')->isValid()) {
                $user_uploads = new user_uploads;
                $user_uploads->filename = $request->file('filename')->hashName();
                $user_uploads->extension = $request->file('filename')->extension();
                $user_uploads->filesize = $request->file('filename')->getClientSize();
                $user_uploads->location = $request->file('filename')->store('/userimage/' . $shahash . '/' . $request->file('filename')->hashName());
                $user_uploads->userID  = \Auth::user()->email;
                $user_uploads->save();

                $file = $request->file('filename');
                $filename = time() . '_' . $request->file('filename')->hashName();
                $path = 'User/' . \Auth::user()->email . '/img';

                $file->move($path, $filename);
                $users = users::findorFail(\Auth::user()->email);
                $users->location = $path . '/' . $filename;
                $users->save();
            }
        } else {
            $errmessage = "Please select file!";
            return back()->withInput()->with('errmessage', $errmessage);
        }
        return back()->withInput()->with('message', $status_message);
    }

    public function emailsendmailinginfo($email, $name, $province, $city, $barangay, $officeContactNo)
    {
        $data = array('email' => $email, 'name' => $name,  'province' => $province, 'city' => $city,  'barangay' => $barangay, 'officeContactNo' => $officeContactNo);
        Mail::send('emailtemplate.epolicyUpdateMailingInfo', $data, function ($message) use ($email, $name, $province, $city, $barangay, $officeContactNo) {
            $message->to(env('EPOLICY_EMAILTO'), 'COCOGEN')->subject('Update Mailing Info : ' . $name);
        });
    }

    public function myaccountMailingSave(Request $request)
    {

        $rules = [
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'officeContactNo' => 'required'
        ];
        $niceNames = [
            'province' => 'province',
            'city' => 'city',
            'barangay' => 'barangay',
            'officeContactNo' => 'office contact no'
        ];
        $this->validate($request, $rules, [], $niceNames);


        $users = users::findorFail($request->get('emailhide'));
        $users->province = $request->get('province');
        $users->city = $request->get('city');
        $users->barangay = $request->get('barangay');
        $users->officeContactNo = $request->get('officeContactNo');
        $users->save();

        $status_message = "Mailing address was successfully updated!";
        $this->emailsendmailinginfo(\Auth::user()->email, \Auth::user()->name, $request->get('province'), $request->get('city'), $request->get('barangay'), $request->get('officeContactNo'));
        return back()->withInput()->with('message', $status_message);
    }

    public function emailsendcontactinfo($email, $name, $pno, $mno)
    {
        $data = array('email' => $email, 'name' => $name,  'pno' => $pno, 'mno' => $mno);
        Mail::send('emailtemplate.epolicyUpdateContactInfo', $data, function ($message) use ($name, $pno, $email, $mno) {
            $message->to(env('EPOLICY_EMAILTO'), 'COCOGEN')->subject('Update Contact Info : ' . $name);
        });
    }

    public function myaccountContactSave(Request $request)
    {
        $rules = [
            'phone_num' => 'required',
            'mobile_num' => 'required'
        ];
        $niceNames = [
            'phone_num' => 'phone number',
            'mobile_num' => 'mobile number'
        ];
        $this->validate($request, $rules, [], $niceNames);

        $users = users::findorFail($request->get('email'));
        $users->telephone  = $request->get('phone_num');
        $users->mobileNo  = $request->get('mobile_num');
        $users->save();

        $status_message = "Contact info was successfully updated!";
        $this->emailsendcontactinfo(\Auth::user()->email, \Auth::user()->name, $request->get('phone_num'), $request->get('mobile_num'));
        return back()->withInput()->with('message', $status_message);
    }

    public function myaccountResetSave(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'confirmation' => ['same:password']
        ]);

        $users = users::findorFail($request->get('emailhidlogin'));
        $users->password  = Hash::make($request->get('password'));
        $users->save();

        $status_message = "Password was successfully reset!";
        return back()->withInput()->with('message', $status_message);
    }

    public function myaccounttypeSave(Request $request)
    {

        $rules = [
            'accountType' => 'required'
        ];
        $niceNames = [
            'accountType' => 'Account type'
        ];
        $this->validate($request, $rules, [], $niceNames);

        $users = users::findorFail($request->get('emailhidlogintype'));
        $users->accountType  = $request->get('accountType');
        $users->save();

        $status_message = "Account type was successfully updated!";
        return back()->withInput()->with('message', $status_message);
    }

    public function myaccounttypeSave2(Request $request)
    {

        $rules = [
            'accountType2' => 'required'
        ];
        $niceNames = [
            'accountType2' => 'Account type'
        ];
        $this->validate($request, $rules, [], $niceNames);
        $users = users::findorFail($request->get('emailhidlogintype2'));
        $users->accountType  = $request->get('accountType2');
        $users->loginAttemptNo  = 1;
        $users->save();

        $status_message = "";
        return back()->withInput()->with('message', $status_message);
    }

    public function sendForHardCopyClient(Request $request)
    {

        $rules = [
            'chckClientPol' => 'required'
        ];
        $niceNames = [
            'chckClientPol' => 'Account type'
        ];
        $this->validate($request, $rules, [], $niceNames);

        $cocogen_hardcopies = new cocogen_hardcopies;
        $cocogen_hardcopies->reqName = \Auth::user()->name;
        $cocogen_hardcopies->reqEmail = \Auth::user()->email;
        $cocogen_hardcopies->type = \Auth::user()->type;
        $cocogen_hardcopies->save();

        $lastInsertedId = $cocogen_hardcopies->id;
        $chckClientPols = $request->get('chckClientPol');
        $policyAll = "";
        if ($lastInsertedId) {
            if ($chckClientPols) {
                foreach ($chckClientPols as $chckClientPol) {
                    $cocogen_hardcopies_pol = new cocogen_hardcopies_pol;
                    $cocogen_hardcopies_pol->policyNo = $chckClientPol;
                    $cocogen_hardcopies_pol->transno = $lastInsertedId;
                    $cocogen_hardcopies_pol->save();

                    if ($policyAll) {
                        $policyAll = $policyAll . '' . $chckClientPol . "<br>";
                    } else {
                        $policyAll = $chckClientPol . '' . "<br>";
                    }
                }
            }
        }
        $this->emailtoHardCopyClient($policyAll, \Auth::user()->name);
        $status_message = "Request was successfully!";
        return back()->withInput()->with('reqhard_success', $status_message);
    }

    public function emailtoHardCopyClient($policyno, $name)
    {
        $data = array('policyno' => $policyno, 'name' => $name);
        Mail::send('emailtemplate.reqforhardcopyclient', $data, function ($message) use ($name, $policyno) {
            $message->to(env('EPOLICY_EMAILTO'), 'COCOGEN')->subject('Request for hardcopy : ' . $name);
        });
    }

    public function sendForHardCopyAgent(Request $request)
    {

        $rules = [
            'chckClientPol' => 'required'
        ];
        $niceNames = [
            'chckClientPol' => 'Account type'
        ];
        $this->validate($request, $rules, [], $niceNames);

        $cocogen_hardcopies = new cocogen_hardcopies;
        $cocogen_hardcopies->reqName = \Auth::user()->name;
        $cocogen_hardcopies->reqEmail = \Auth::user()->email;
        $cocogen_hardcopies->type = \Auth::user()->type;
        $cocogen_hardcopies->save();

        $lastInsertedId = $cocogen_hardcopies->id;
        $chckClientPols = $request->get('chckClientPol');
        $policyAll = "";
        if ($lastInsertedId) {
            if ($chckClientPols) {
                foreach ($chckClientPols as $chckClientPol) {
                    $cocogen_hardcopies_pol = new cocogen_hardcopies_pol;
                    $cocogen_hardcopies_pol->policyNo = $chckClientPol;
                    $cocogen_hardcopies_pol->transno = $lastInsertedId;
                    $cocogen_hardcopies_pol->save();

                    if ($policyAll) {
                        $policyAll = $policyAll . '' . $chckClientPol . "<br>";
                    } else {
                        $policyAll = $chckClientPol . '' . "<br>";
                    }
                }
            }
        }
        $this->emailtoHardCopyAgent($policyAll, \Auth::user()->name);
        $status_message = "Request was successfully!";
        return back()->withInput()->with('reqhard_success', $status_message);
    }

    public function emailtoHardCopyAgent($policyno, $name)
    {
        $data = array('policyno' => $policyno, 'name' => $name);
        Mail::send('emailtemplate.reqforhardcopyagent', $data, function ($message) use ($name, $policyno) {
            $message->to(env('EPOLICY_EMAILTO'), 'COCOGEN')->subject('Request for Hardcopy : ' . $name);
        });
    }

     public function savefeedback(Request $request){
        
        $agentId = auth()->user()->id;
        $agentName = auth()->user()->name;
        $email = auth()->user()->email;
        $id = (int)$request->get('hidden_id');
 
        if(!empty($request->get('firstRowFirst'))){
            $q1 = "Agree";
        }elseif (!empty($request->get('firstRowSecond'))) {
            $q1 = "Disagree";
        }else{
            $q1 = "NA";
        }

        if(!empty($request->get('SecondRowFirst'))){
            $q2 = "Agree";
        }elseif (!empty($request->get('SecondRowSecond'))) {
            $q2 = "Disagree";
        }else{
            $q2 = "NA";
        }

        if(!empty($request->get('ThirdRowFirst'))){
            $q3 = "Agree";
        }elseif (!empty($request->get('ThirdRowSecond'))) {
            $q3 = "Disagree";
        }else{
            $q3 = "NA";
        }

        if(!empty($request->get('FourthRowFirst'))){
            $q4 = "Agree";
        }elseif (!empty($request->get('FourthRowSecond'))) {
            $q4 = "Disagree";
        }else{
            $q4 = "NA";
        }

        if(!empty($request->get('FifthRowFirst'))){
            $q5 = "Agree";
        }elseif (!empty($request->get('FifthRowSecond'))) {
            $q5 = "Disagree";
        }else{
            $q5 = "NA";
        }

        if(!empty($request->get('SixthRowFirst'))){
            $q6 = "Agree";
        }elseif (!empty($request->get('SixthRowSecond'))) {
            $q6 = "Disagree";
        }else{
            $q6 = "NA";
        }

        if(!empty($request->get('SevenRowFirst'))){
            $q7 = "Agree";
        }elseif (!empty($request->get('SevenRowSecond'))) {
            $q7 = "Disagree";
        }else{
            $q7 = "NA";
        }

        if(!empty($request->get('NinthRowFirst'))){
            $q8 = "Agree";
        }elseif (!empty($request->get('NinthRowSecond'))) {
            $q8 = "Disagree";
        }else{
            $q8 = "NA";
        }

        if(!empty($request->get('TenthRowFirst'))){
            $q9 = "Agree";
        }elseif (!empty($request->get('TenthRowSecond'))) {
            $q9 = "Disagree";
        }else{
            $q9 = "NA";
        }  

        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));  

        $cocogen_annual_survey = new cocogen_annual_survey;
        $cocogen_annual_survey->agentNo = $agentName;
        $cocogen_annual_survey->agentName = $agentName;
        $cocogen_annual_survey->email = $email;
        $cocogen_annual_survey->q1 = !empty($q1) ? $q1 :'';
        $cocogen_annual_survey->q2 = !empty($q2) ? $q2 :'';
        $cocogen_annual_survey->q3 = !empty($q3) ? $q3 :'';
        $cocogen_annual_survey->q4 = !empty($q4) ? $q4 :'';
        $cocogen_annual_survey->q5 = !empty($q5) ? $q5 :'';
        $cocogen_annual_survey->q6 = !empty($q6) ? $q6 :'';
        $cocogen_annual_survey->q7 = !empty($q7) ? $q7 :'';
        $cocogen_annual_survey->q8 = !empty($q8) ? $q8 :'';
        $cocogen_annual_survey->q9 = !empty($q9) ? $q9 :'';
        $cocogen_annual_survey->r1 = !empty($request->get('firstRowRemarks')) ? $request->get('firstRowRemarks') :'';
        $cocogen_annual_survey->r2 = !empty($request->get('SecondRowRemarks')) ? $request->get('SecondRowRemarks') :'';
        $cocogen_annual_survey->r3 = !empty($request->get('ThirdRowRemarks')) ? $request->get('ThirdRowRemarks') :'';
        $cocogen_annual_survey->r4 = !empty($request->get('FourthRowRemarks')) ? $request->get('FourthRowRemarks') :'';
        $cocogen_annual_survey->r5 = !empty($request->get('FifthRowRemarks')) ? $request->get('FifthRowRemarks') :'';
        $cocogen_annual_survey->r6 = !empty($request->get('SixthRowRemarks')) ? $request->get('SixthRowRemarks') :'';
        $cocogen_annual_survey->r7 = !empty($request->get('SevenRowRemarks')) ? $request->get('SevenRowRemarks') :'';
        $cocogen_annual_survey->r8 = !empty($request->get('NinthRowRemarks')) ? $request->get('NinthRowRemarks') :'';
        $cocogen_annual_survey->r9 = !empty($request->get('TenthRowRemarks')) ? $request->get('TenthRowRemarks') :'';
        $cocogen_annual_survey->status = "Created";
        $cocogen_annual_survey->remarks_other = $request->get('Remarks_others');
        $cocogen_annual_survey->account_associate = $request->get('account_associate_name');
        $cocogen_annual_survey->mobile_no  = $request->get('Agetno');
        $cocogen_annual_survey->updated_at = $datenow;
        $cocogen_annual_survey->response_date  = $datenow;
        $cocogen_annual_survey->save();
        
        $check_alert_date = cocogen_feedback_user_login::select('user_alert_date')
                                                     ->where('user_id',$agentId)
                                                     ->orderBy('id', 'DESC')
                                                    ->get(); 
        $get_alert_date =$check_alert_date[0]['user_alert_date'];
        $first_day_this_month = date('Y-m-01',strtotime($get_alert_date)); // hard-coded '01' for first day
        $last_day_this_month  = date('Y-m-t',strtotime($get_alert_date));

        $check_update = cocogen_feedback_user_login::where('user_id',$agentId)
                                                     ->whereBetween('user_alert_date', [$first_day_this_month, $last_day_this_month])
                                                     ->orderBy('id', 'DESC')
                                                    ->get(); 
        
         
        $updateFeedback = array('notify_if_open'=>1,'updated_at'=>$datenow);
        cocogen_feedback_user_login::where('id',$check_update[0]['id'])->update($updateFeedback);

     
        // return redirect('/annual-cs-survey/success');
    }

      public function userfeedback(Request $request){
 
            $getAgentId = \Auth::user()->id;
            $saveFeedback = new cocogen_feedback_user_comment();
            $saveFeedback->emailaddress = \Auth::user()->email;
            $saveFeedback->userId = !empty($getAgentId) ? $getAgentId :"";
            $saveFeedback->name = htmlspecialchars($request['fullname']);
            $saveFeedback->comment = htmlspecialchars($request['agentMessage']);
            $saveFeedback->save();
      
    }
}
