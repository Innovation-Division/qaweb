<?php

namespace App\Http\Controllers;

use App\Models\CocogenAdminBranch;
use Illuminate\Http\Request;
use App\Models\Policyholder;
use App\Models\location;
use App\Models\barangay;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Models\Otp;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\users;
use App\Models\user_orig;
use GuzzleHttp\Client;
use App\Models\UserUpload;
use Illuminate\Support\Facades\Storage;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_meta;
use App\Models\cocogen_admin_emailtemplate;
use App\Models\cocogen_users_client_code;
use Illuminate\Support\Facades\Http;
use URL;
class PolicyholderController extends Controller
{

    public function openRegister(Request $request)
    {
    
        $cocogen_meta = cocogen_meta::where('page', '=', "Sign Up")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];

        $branch = CocogenAdminBranch::pluck('name')->toArray();
        $location = location::distinct()->orderBy('region', 'asc')->pluck('region')->toArray();
        return view('create-account', ['title' => $title,'branch' => $branch, 'location' => $location, 'metadescription' => $metadescription, 'keyword' => $keyword]);
    }

    public function reopenRegister($digest, $id)
    {
        $decode_id = base64_decode($id);
        $user = user_orig::select('id', 'email', 'created_at', 'status','region','province','city','barangay','unitNo','street','zip')
                     ->where('id', $decode_id)
                     ->first();
        if (!$user) {
            abort(404); // Handle case where user is not found
        }
    
        if ($user->status === "APPROVED") {
            return redirect()->route('home'); // Exit early to save execution time
        }
    
        $salt = "COCOGENINNOVATION";
        $recreate_digest = sha1($salt . ":" . $user->id . ":" . $user->email . ":" . $user->created_at);
        //$recreate_digest = sha1($salt.":".$users[0]["id"].":".$users[0]["email"].":".$users[0]["created_at"]);
        if ($digest !== $recreate_digest) {
            abort(403); // Return forbidden if digest doesn't match
        }
    
        // Optimize database queries with selective columns and indexes
        $cocogen_meta = cocogen_meta::where('page', "Sign Up")->first();
    
        if (!$cocogen_meta) {
            abort(404); // Ensure meta data exists
        }
    
        $region = $user->region;
        $province = $user->province;
        $city = $user->city;
        $barangay = $user->barangay;
        $unitno = $user->unitNo;
        $street = $user->street;
        $zip = $user->zip;

        $branch = CocogenAdminBranch::pluck('name')->toArray();
        $location = location::distinct()->orderBy('region', 'asc')->pluck('region')->toArray();
    
        return view('create-account', [
            'ids' => $decode_id,
            'title' => $cocogen_meta->title,
            'branch' => $branch,
            'location' => $location,
            'metadescription' => $cocogen_meta->description,
            'keyword' => $cocogen_meta->keyword,
            'region' => $region,
            'province' => $province,
            'city' => $city,
            'barangay' => $barangay,
            'unitno' => $unitno,
            'street' => $street,
            'zip' => $zip,
        ]);
    }
    
    public function continueLater(Request $request){
        $user = user_orig::where('id', $request->get("hdn_id"))->first();
        info($user);
        $salt = "COCOGENINNOVATION";

        $users = user_orig::findOrFail($request->get("hdn_id"));

        $updated = false;

        if ($request->get("region")) {
            $users->region = $request->get("region");
            $updated = true;
        }
        if ($request->get("province")) {
            $users->province = $request->get("province");
            $updated = true;
        }
        if ($request->get("city")) {
            $users->city = $request->get("city");
            $updated = true;
        }
        if ($request->get("barangay")) {
            $users->barangay = $request->get("barangay");
            $updated = true;
        }
        if ($request->get("unitNo")) {
            $users->unitNo = $request->get("unitNo");
            $updated = true;
        }
        if ($request->get("street")) {
            $users->street = $request->get("street");
            $updated = true;
        }
        if ($request->get("zip")) {
            $users->zip = $request->get("zip");
            $updated = true;
        }

        if ($updated) {
            $users->save();
        }
        
        $digest = sha1($salt . ":" . $user->id . ":" . $user->email . ":" . $user->created_at);
        $id = base64_encode($user->id);
        $baseUrl = url('/');
        $link = $baseUrl ."/account-reopen". "/".  $digest ."/". $id;
        $this->sendContinueLater($user->email, $link);
        //dd($request, $users,$digest,$id,$link);
        return redirect('/account-created-home');
    }
    public function emailsendforgotpassword($name, $content, $email)
    {
        $data = array('name' => $name, 'email' => $email, 'content' => $content);
        Mail::send('emailtemplate.forgotpassword', $data, function ($message) use ($name, $content, $email) {
            //$message->to($email, 'COCOGEN')->subject('Password Reset Request : ' . $name);
             $message->to(["rene_paciente@cocogen.com", "val_mangoba@cocogen.com", "john_lopez@cocogen.com"], 'COCOGEN')->subject('Complete Your Cocogen Online Account Setup: ' . $name);
            //$message->to(["rachel_gener@cocogen.com", "edward_culla@cocogen.com", "john_lopez@cocogen.com"], 'COCOGEN')->subject('Complete Your Cocogen Online Account Setup: ' . $name);
        });
    }
    public function accountCreated(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Sign Up")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];

        return view('register.account-created', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function accountOTPFailed(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $metadescription = "";
        $keyword = "";
        $title = "Account OTP Failed";

        return view('register.create-account-as-ph-OTP-failed', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function get_province(Request $request)
    {       
        $location = location::select('province')
            ->distinct()
            ->where('region', $request->get('region'))
            ->orderBy('province', 'asc')
            ->get();   
        return response()->json($location, 201);        
    }

    public function get_city(Request $request)
    {       
        $location = location::select('city')
            ->distinct()    
            ->where('province', $request->get('province'))
            ->orderBy('city', 'asc')
            ->get();        
        return response()->json($location, 201);        
    }

    public function get_barangay(Request $request)
    {       
        $barangay = barangay::where('city_id', '=',$request->get('city'))->select('name as barangay')->distinct('name')->orderBy('name', 'asc')->get();     
        return response()->json($barangay, 201);        
    }

    public function store(Request $request)
    {
        info($request);
        $validated = $request->validate([
            'firstName' => 'required|string',
            'middleName' => 'nullable|string',
            'lastName' => 'required|string',
            'dateOfBirth' => 'required|string',
            'placeOfBirth' => 'required|string',
            'sex' => 'required|string',
            'citizenship' => 'required|string',
            'contactNumber' => 'required',
            'email' => 'required|email|unique:policyholders,email',

            'branch' => 'required|string',

            'contactEmail' => 'required|string|in:yes,no',
            'contactSMS' => 'required|string|in:yes,no',
            'contactMessenger' => 'required|string|in:yes,no',
            'contactCall' => 'required|string|in:yes,no',

            'AutoExcelPlus' => 'required|string|in:yes,no',
            'InternationalTravelPlus' => 'required|string|in:yes,no',
            'DomesticTravelPlus' => 'required|string|in:yes,no',
            'ProTech' => 'required|string|in:yes,no',
            'ctpl' => 'required|string|in:yes,no',
            'Covid' => 'required|string|in:yes,no',

            'policyOne' => 'nullable|string',
            'policyTwo' => 'nullable|string',
            'policyThree' => 'nullable|string',
        ]);

        // Convert checkbox (boolean) values to "yes" or "no"
        $validated['contactEmail'] = $validated['contactEmail'] === 'yes' ? 'yes' : 'no';
        $validated['contactSMS'] = $validated['contactSMS'] === 'yes' ? 'yes' : 'no';
        $validated['contactMessenger'] = $validated['contactMessenger'] === 'yes' ? 'yes' : 'no';
        $validated['contactCall'] = $validated['contactCall'] === 'yes' ? 'yes' : 'no';

        $validated['branch'] = $request->input('branch', 'None');
        $validated['name'] = $request->get('firstName', 'None') ." ".  $request->get('lastName', 'None') ;
        // $validated['email'] = $request->input('name', 'None') ;
        // Additional default values
        $validated['active'] = 'Y';
        $validated['type'] = 'C';
        $validated['status'] = 'PENDING';
        $validated['accountType'] = 'C';
        // Log data before inserting into the database

        //try {
            $policyholder = Policyholder::create($validated);
            $userdata = Policyholder::where('email', $validated['email'])->latest()->first();
            // Return the policyholder_id in the response
            if(!empty($validated['policyOne'])){
                    $policy =  $validated['policyOne'];
                    $parts = explode('-', $policy); //MC-MNC-HO
                    $line = $parts[0];
                    $subline = $parts[1];
                    $branch = $parts[2];
                    $year = $parts[3];
                    $polno = $parts[4];
                    $renew = $parts[5];
                    $SecurityCode = sha1("cocogenAPI".":". "cocogenAPI" .":". $policy);
                    $client = new Client();
                    $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/check/account', [
                    'form_params' => [
                        'Username' => 'cocogenAPI',
                        'SecurityCode' => $SecurityCode,
                        'policy' => $policy,
                        'line' => $line,
                        'subline' => $subline,
                        'branch' => $branch,
                        'year' => $year,
                        'polno' => $polno,
                        'renew' => $renew,
                    ]
                    ]);
            
                    $contentsproduction = $res->getBody()->getContents();
                    $data = json_decode($contentsproduction, true);
                    if(count($data)>0){
                        foreach($data as $dataIndividual){
                            $assd_no = $dataIndividual["assd_no"];
                            $first_name = $dataIndividual["first_name"];
                            $last_name = $dataIndividual["last_name"];
                            $birth_date = $dataIndividual["birth_date"];
                            $birth_month = $dataIndividual["birth_month"];
                            $birth_year = $dataIndividual["birth_year"];
                            $email_address = $dataIndividual["email_address"];
    
                            $month_number = date('m', strtotime($birth_month));
                            $formatted_date = "$birth_year-$month_number-$birth_date";
                          
                            if(strtolower($userdata->firstName) === strtolower($first_name) && 
                               strtolower($userdata->lastName) === strtolower($last_name) &&
                               $userdata->dateOfBirth === $formatted_date &&
                               strtolower($userdata->email) === strtolower($email_address)
                            ){
                                
                                $cocogen_users_client_code = new cocogen_users_client_code();
                                $cocogen_users_client_code->email = $userdata->email;
                                $cocogen_users_client_code->code = $assd_no;
                                $cocogen_users_client_code->save();
                            }
                        }
                    }
            }
            if(!empty($validated['policyTwo'])){
                $policy =  $validated['policyTwo'];
                $parts = explode('-', $policy);
                $line = $parts[0];
                $subline = $parts[1];
                $branch = $parts[2];
                $year = $parts[3];
                $polno = $parts[4];
                $renew = $parts[5];
                $SecurityCode = sha1("cocogenAPI".":". "cocogenAPI" .":". $policy);
                $client = new Client();
                $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/check/account', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCode,
                    'policy' => $policy,
                    'line' => $line,
                    'subline' => $subline,
                    'branch' => $branch,
                    'year' => $year,
                    'polno' => $polno,
                    'renew' => $renew,
                ]
                ]);
        
                $contentsproduction = $res->getBody()->getContents();
                $data = json_decode($contentsproduction, true);
                if(count($data)>0){
                    foreach($data as $dataIndividual){
                        $assd_no = $dataIndividual["assd_no"];
                        $first_name = $dataIndividual["first_name"];
                        $last_name = $dataIndividual["last_name"];
                        $birth_date = $dataIndividual["birth_date"];
                        $birth_month = $dataIndividual["birth_month"];
                        $birth_year = $dataIndividual["birth_year"];
                        $email_address = $dataIndividual["email_address"];

                        $month_number = date('m', strtotime($birth_month));
                        $formatted_date = "$birth_year-$month_number-$birth_date";
                      
                        if(strtolower($userdata->firstName) === strtolower($first_name) && 
                           strtolower($userdata->lastName) === strtolower($last_name) &&
                           $userdata->dateOfBirth === $formatted_date &&
                           strtolower($userdata->email) === strtolower($email_address)
                        ){
                            
                            $cocogen_users_client_code = new cocogen_users_client_code();
                            $cocogen_users_client_code->email = $userdata->email;
                            $cocogen_users_client_code->code = $assd_no;
                            $cocogen_users_client_code->save();
                        }
                    }
                }
            }
           
            if(!empty($validated['policyThree'])){
                $policy =  $validated['policyThree'];
                $parts = explode('-', $policy);
                $line = $parts[0];
                $subline = $parts[1];
                $branch = $parts[2];
                $year = $parts[3];
                $polno = $parts[4];
                $renew = $parts[5];
                $SecurityCode = sha1("cocogenAPI".":". "cocogenAPI" .":". $policy);
                $client = new Client();
                $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/check/account', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCode,
                    'policy' => $policy,
                    'line' => $line,
                    'subline' => $subline,
                    'branch' => $branch,
                    'year' => $year,
                    'polno' => $polno,
                    'renew' => $renew,
                ]
                ]);
        
                $contentsproduction = $res->getBody()->getContents();
                $data = json_decode($contentsproduction, true);
                if(count($data)>0){
                    foreach($data as $dataIndividual){
                        $assd_no = $dataIndividual["assd_no"];
                        $first_name = $dataIndividual["first_name"];
                        $last_name = $dataIndividual["last_name"];
                        $birth_date = $dataIndividual["birth_date"];
                        $birth_month = $dataIndividual["birth_month"];
                        $birth_year = $dataIndividual["birth_year"];
                        $email_address = $dataIndividual["email_address"];

                        $month_number = date('m', strtotime($birth_month));
                        $formatted_date = "$birth_year-$month_number-$birth_date";
                      
                        if(strtolower($userdata->firstName) === strtolower($first_name) && 
                           strtolower($userdata->lastName) === strtolower($last_name) &&
                           $userdata->dateOfBirth === $formatted_date &&
                           strtolower($userdata->email) === strtolower($email_address)
                        ){
                            
                            $cocogen_users_client_code = new cocogen_users_client_code();
                            $cocogen_users_client_code->email = $userdata->email;
                            $cocogen_users_client_code->code = $assd_no;
                            $cocogen_users_client_code->save();
                        }
                    }
                }
            }
            return response()->json([
                'message' => 'Policyholder created successfully!',
                'id' => $policyholder->id, // Return the policyholder_id
            ], 201);
       // } catch (\Exception $e) {
       // //    return response()->json(['error' => 'Something went wrong!', 'message' => $e->getMessage()], 500);
        //}
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'unitNo' => 'nullable|string',
            'street' => 'nullable|string',
            'barangay' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'region' => 'nullable|string',
            'zip' => 'nullable|string',

            'payment' => 'nullable|string',
            'bankWallet' => 'nullable|string',

            'contactEmail' => 'nullable|string|in:yes,no',
            'contactSMS' => 'nullable|string|in:yes,no',
            'contactMessenger' => 'nullable|string|in:yes,no',
            'contactCall' => 'nullable|string|in:yes,no',

            'policyOne' => 'nullable|string',
            'policyTwo' => 'nullable|string',
            'policyThree' => 'nullable|string',

            'AutoExcelPlus' => 'nullable|string|in:yes,no',
            'InternationalTravelPlus' => 'nullable|string|in:yes,no',
            'DomesticTravelPlus' => 'nullable|string|in:yes,no',
            'ProTech' => 'nullable|string|in:yes,no',
            'CondoExcelPlus' => 'nullable|string|in:yes,no',
        ]);

        // Convert checkbox (boolean) values to "yes" or "no"
        if (isset($validated['contactEmail'])) {
            $validated['contactEmail'] = $validated['contactEmail'] === 'yes' ? 'yes' : 'no';
        }
        if (isset($validated['contactSMS'])) {
            $validated['contactSMS'] = $validated['contactSMS'] === 'yes' ? 'yes' : 'no';
        }
        if (isset($validated['contactMessenger'])) {
            $validated['contactMessenger'] = $validated['contactMessenger'] === 'yes' ? 'yes' : 'no';
        }
        if (isset($validated['contactCall'])) {
            $validated['contactCall'] = $validated['contactCall'] === 'yes' ? 'yes' : 'no';
        }
        //$validated['status'] = 'APPROVED';
        //try {
            $policyholder = Policyholder::findOrFail($id);
            $policyholder->update($validated);

            $this->requestOtp($policyholder['email']);
            return response()->json(['message' => 'Policyholder info updated successfully!'], 200);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Something went wrong!', 'message' => $e->getMessage()], 500);
        // }
    }

    public function checkEmail(Request $request)
    {
            $email = $request->get('email');
            $exists = Policyholder::where('email', $email)->exists();
            return response()->json(['exists' => $exists]);
    }

    public function requestOtp($email)
    {

        // Generate OTP
        $otp = rand(100000, 999999);
        $expiry = Carbon::now()->addMinutes(5);

        // Save OTP
        Otp::updateOrCreate(
            ['email' => $email],
            ['otp' => $otp, 'expires_at' => $expiry]
        );
        info($email);
        info($otp);
        // Send Email via Blade View
        $this->sendOtpEmail($email, $otp);

        return back()->with('message', 'OTP sent successfully to your email.');
    }

    public function verifyOtp(Request $request)
    {
        if(!$request->get('id')){
            $message = "ID is required";
            return response()->json($message, 201); 
        }

        if(!$request->get('otp')){
            $message = "OTP is required";
            return response()->json($message, 201); 
        }
        $user = user_orig::where('id', $request->get('id'))->first(); 
        $otpData = Otp::where('email', $user->email)->first();
        if (!$otpData) {
            $message = "Invalid OTP or email.";
            return response()->json($message, 201);   
        }

        if (Carbon::now()->gt($otpData->expires_at)) {
            $message = "OTP expired.";
            return response()->json($message, 201); 
        }

        if ($otpData->otp != $request->otp) {
            $message = "Incorrect OTP.";
            return response()->json($message, 201); 
        }
      
        if ($user) {
            $user->status = 'APPROVED'; 
            $user->save(); 

            $date = date_create();
            $datehash = date_timestamp_get($date);
            $transID =  $user->email. ":" . $datehash;
            $digest = sha1($user['created_at'] . $user['id']);
            $digesthash = base64_encode($digest);
            $transID2 = sha1($transID);
            $transID3 = $transID . ":" . $transID2 . ":" . $digesthash;
            $transID4 = base64_encode($transID3);
            $contactName = env('FEEDBACK_NAMETO');
            $libnk = URL::to('/reset_password') . '?' . $transID4;

            $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 30)->get();
            $bodytagexternal = str_replace("templatename", $user['name'], $cocogen_admin_emailtemplate[0]['content']);
            $bodytagexternal = str_replace("templatelink", $libnk, $bodytagexternal);
            $this->emailsendforgotpassword($user['name'], $bodytagexternal, $request->get('email'));
        }
        // OTP is valid
        $otpData->delete();
        $message = "OTP verified successfully.";


        return response()->json($message, 201);   
    }

    public function resendOTP(Request $request)
    {
        $email = $request->get('email');

        if (!$email) {
            return response()->json(['error', 'Session Expired. PLease restart the process'], 400);
        }
        //$this->requestOtp($email);
       // return response()->json('OTP resent successfully. Please check your email.', 200);

        $policyholder = Policyholder::findOrFail($email);
        info($policyholder);
        info($policyholder['email']);
        info($email);
        $this->requestOtp($policyholder['email']);
        return response()->json('OTP resent successfully. Please check your email.', 200);
    }

    private function sendOtpEmail($email, $otp)
    {
        $data = ['otp' => $otp];
        Mail::send('emailtemplate.otp', $data, function($mail) use ($email) {
            // $mail->to($email)
            //$mail->to(["rachel_gener@cocogen.com", "edward_culla@cocogen.com", "john_lopez@cocogen.com"])
            $mail->to(["rene_paciente@cocogen.com", "val_mangoba@cocogen.com", "john_lopez@cocogen.com"])
                 ->subject('Account Verification');
        });
    }

    private function sendContinueLater($email, $link)
    {
        $data = ['link' => $link];
        Mail::send('emailtemplate.continueLater', $data, function($mail) use ($email) {
            // $mail->to($email)
            //$mail->to(["rachel_gener@cocogen.com", "edward_culla@cocogen.com", "john_lopez@cocogen.com"])
            $mail->to(["rene_paciente@cocogen.com", "val_mangoba@cocogen.com", "john_lopez@cocogen.com"])
                 ->subject('Complete Your Registration – Continue Later');
        });
    }

    public function uploadImages(Request $request)
    {
        // Validate request
       info("start hereeee");
        $request->validate([
           // 'uploadID' => 'nullable', // Max 5MB
          //  'uploadDisplayPicture' => 'nullable|image|max:5120', // Max 5MB
        ]);
      
        // Retrieve the policyholder ID from the request
        $policyholderId = $request->input('policyholder_id');
        info("test");
        info($request);
        // Log the policyholder ID for debugging
        Log::info('Policyholder ID received:', ['policyholder_id' => $policyholderId]);

        // Retrieve the policyholder by ID
        $policyholder = Policyholder::find($policyholderId);
        info($policyholder);
        // Log the policyholder for debugging
        Log::info('Policyholder found:', ['policyholder' => $policyholder]);

        // Check if the policyholder exists
        if (!$policyholder) {
            Log::error('Policyholder not found for ID:', ['policyholder_id' => $policyholderId]);
            return response()->json(['error' => 'Policyholder not found'], 404);
        }
        info("start here");
	info( $request->file('uploadID')); 
        $uploadedFiles = [];
        // Handle uploadID file
        if ($request->hasFile('uploadID')) {
            $file = $request->file('uploadID');
            $filename = time() . '_' . $file->getClientOriginalName();
            $folderPath = "uploads/users/{$policyholderId}";
            $location = $file->storeAs($folderPath, $filename, 'local');
            info("strat upload");
            info($policyholderId);
            info($filename);
            info($location);
            info($folderPath);
            $userUpload = UserUpload::create([
                'policyholder_id' => $policyholderId,
                'filename' => $filename,
                'location' => $location,
                'filesize' => $file->getSize(),
            ]);

            $uploadedFiles[] = $userUpload;
        }

        // Handle uploadDisplayPicture file
        if ($request->hasFile('uploadDisplayPicture')) {
            $file = $request->file('uploadDisplayPicture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $folderPath = "uploads/users/{$policyholderId}";
            $location = $file->storeAs($folderPath, $filename, 'local');

            $userUpload = UserUpload::create([
                'policyholder_id' => $policyholderId,
                'filename' => $filename,
                'location' => $location,
                'filesize' => $file->getSize(),
            ]);

            $uploadedFiles[] = $userUpload;
        }

        // Return success response if files were uploaded
        if (count($uploadedFiles) > 0) {
            return response()->json(['success' => true, 'message' => 'Files uploaded successfully!', 'files' => $uploadedFiles]);
        }

        // Return success response if no files were uploaded
        return response()->json(['success' => true, 'message' => 'No files were uploaded, but request was successful.']);
    }

    public function getPaymentMethods()
    {
	info('paymentTest');
        $merchantId = env('MERCHANT_ID');  // Replace with your actual merchant ID
        $apiKey = env('MERCHANT_PASSWORD');  // Replace with your actual collection API key
        $apiUrl = 'https://test.dragonpay.ph/api/collect/v2/processors/available/50000';  // Replace with actual endpoint
	info($apiKey);
        if (!$merchantId || !$apiKey || !$apiUrl) {
            return response()->json(['error' => 'Missing Dragonpay credentials. Check config/services.php.'], 500);
        }

        // Encode credentials
        $encodedCredentials = base64_encode("$merchantId:$apiKey");
        // Fetch from Dragonpay API
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . $encodedCredentials
        ])->get($apiUrl);

        // Decode response
        $jsonResponse = json_decode($response->body(), true);
            // info($jsonResponse);
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Log::error('Invalid JSON from Dragonpay:', [$response->body()]);
            return response()->json(['error' => 'Invalid JSON from Dragonpay'], 500);
        }
	info($jsonResponse);
        // Return JSON array of payment methods
        return response()->json($jsonResponse);
    }

    public function accountCreatedRedirect()
    {
        return redirect()->route('home')->with('account_success', 'success');
    }
}
