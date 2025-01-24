<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;
use App\Models\barangay;
use App\Models\cocogen_covid_trans;
use App\Models\cocogen_occupation;
use App\Models\cocogen_covid_other_occupation_blocklisted;
use Carbon\Carbon;
use DB;
use App\Models\User;
use App\Models\cocogen_users_client_code;

class apiCocogen extends Controller
{
    public function get_province(Request $request)
    {       
        $location = location::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
        return response()->json($location, 201);        
    }

    public function get_city(Request $request)
    {       
        $location = location::where('province', '=',$request->get('province'))->select('city')->distinct('city')->orderBy('city', 'asc')->get();     
        return response()->json($location, 201);        
    }

    public function get_barangay(Request $request)
    {       
        $barangay = barangay::where('city_id', '=',$request->get('city'))->select('name as barangay')->distinct('name')->orderBy('name', 'asc')->get();     
        return response()->json($barangay, 201);        
    }

    public function get_occupation(Request $request)
    {       
        $cocogen_occupation = cocogen_occupation::get();     
        return response()->json($cocogen_occupation, 201);        
    }

    public function get_occupation_data(Request $request)
    {       
        $cocogen_occupation = cocogen_occupation::where('occupation', '=',$request->get('occupation'))->get();     
        return response()->json($cocogen_occupation, 201);        
    }

    public function getotheroccupation(Request $request)
    {
       $cocogen_covid_trans = cocogen_covid_other_occupation_blocklisted::Where('name', 'like', '%' . $request->get('other'). '%')->get(); 
        return response()->json($cocogen_covid_trans, 201);    
    }
    public function getdatacovid(Request $request){
        $contact = $request->get('contact');
        $dt = now()->subDays(100);
       
        $cocogen_covid_trans = cocogen_covid_trans::where('tnxid', '=',$request->get('cocno'))
                ->where('birthdate', '=', $request->get('fulldate'))
                ->where(function ($q) use ($contact) {
                    $q->where('contractNo', $contact)
                        ->orWhere('telNo', $contact);
                })->get();  
                //$cocogen_covid_trans['test'] = "testq";
        return response()->json($cocogen_covid_trans, 201);   
    }

    public function savecovid(Request $request){

                    $grpID = "";
                    $getlastGroupNo =cocogen_covid_trans::select('grp_id')->orderBy('grp_id', 'desc')->first();
                    if($getlastGroupNo['grp_id']){
                        $getlastGroupNo = $getlastGroupNo['grp_id'] + 1;
                    }else{
                        $getlastGroupNo = 1;
                    }
                    $getlastGroupNo = str_pad($getlastGroupNo, 7, '0', STR_PAD_LEFT);
                    $gdSequence =  "COVID19-GP-". date('y') . "-". $getlastGroupNo;

                    $now = date('Y-m-d');
                    $start = date('Y-m-d', strtotime($now. ' + 1 days'));
                    $end = date('Y-m-d', strtotime($start. ' + 3 months'));
                     
                    $cotanctno = $request->get('contact');
                    $cotanctno = str_replace(" ","",$cotanctno);
                    $cotanctno = str_replace("(","",$cotanctno);
                    $cotanctno = str_replace(")","",$cotanctno);
                    $cotanctno = str_replace("-","",$cotanctno);      

                    $bdate = date('Y-m-d', strtotime($request->get('bday')));
                    if($request->get('occupation') !== "Others" ){
                        $occupation  = $request->get('occupation');
                    }else{
                        $occupation  = $request->get('occupationOther');

                    }              
                    //Basic+Prime
                    if($request->get('coverage') ==="c"){                           






                        //Combo Basic
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = 50; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }

                        //Combo Prime
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  =75; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end; 
                        $cocogen_covid_trans->pwd_tag  = "Y";                            
                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }
                    }elseif($request->get('coverage') ==="b"){
                        //Prime
                        $prem = $request->get('count') * 75;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }
                    }else{
                        //Basic     
                        $prem = $request->get('count') *  50;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }
                    } 
    }

    public function savecovidblocked(Request $request){

                    $grpID = "";
                    $getlastGroupNo =cocogen_covid_trans::select('grp_id')->orderBy('grp_id', 'desc')->first();
                    if($getlastGroupNo['grp_id']){
                        $getlastGroupNo = $getlastGroupNo['grp_id'] + 1;
                    }else{
                        $getlastGroupNo = 1;
                    }
                    $getlastGroupNo = str_pad($getlastGroupNo, 7, '0', STR_PAD_LEFT);
                    $gdSequence =  "COVID19-GP-". date('y') . "-". $getlastGroupNo;

                    $now = date('Y-m-d');
                    $start = date('Y-m-d', strtotime($now. ' + 1 days'));
                    $end = date('Y-m-d', strtotime($start. ' + 3 months'));
                     
                    $cotanctno = $request->get('contact');
                    $cotanctno = str_replace(" ","",$cotanctno);
                    $cotanctno = str_replace("(","",$cotanctno);
                    $cotanctno = str_replace(")","",$cotanctno);
                    $cotanctno = str_replace("-","",$cotanctno);      

                    $bdate = date('Y-m-d', strtotime($request->get('bday')));
                    if($request->get('occupation') !== "Others" ){
                        $occupation  = $request->get('occupation');
                    }else{
                        $occupation  = $request->get('occupationOther');

                    }              
                    //Basic+Prime
                    if($request->get('coverage') ==="c"){                           






                        //Combo Basic
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->status  = "Blocked"; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = 50; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }

                        //Combo Prime
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Sent";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->status  = "Blocked";                         
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  =75; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;                            
                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }
                    }elseif($request->get('coverage') ==="b"){
                        //Prime
                        $prem = $request->get('count') * 75;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Sent";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->status  = "Blocked";                         
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }
                    }else{
                        //Basic     
                        $prem = $request->get('count') *  50;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Sent";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->status  = "Blocked";                         
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();
                        }
                    } 
    }

    public function savecovidrenewal(Request $request){

                    $grpID = "";
                    $getlastGroupNo =cocogen_covid_trans::select('grp_id')->orderBy('grp_id', 'desc')->first();
                    if($getlastGroupNo['grp_id']){
                        $getlastGroupNo = $getlastGroupNo['grp_id'] + 1;
                    }else{
                        $getlastGroupNo = 1;
                    }
                    $getlastGroupNo = str_pad($getlastGroupNo, 7, '0', STR_PAD_LEFT);
                    $gdSequence =  "COVID19-GP-". date('y') . "-". $getlastGroupNo;

                    $now = date('Y-m-d');
                    $start = date('Y-m-d', strtotime($now. ' + 1 days'));
                    $end = date('Y-m-d', strtotime($start. ' + 3 months'));
                     
                    $cotanctno = $request->get('contact');
                    $cotanctno = str_replace(" ","",$cotanctno);
                    $cotanctno = str_replace("(","",$cotanctno);
                    $cotanctno = str_replace(")","",$cotanctno);
                    $cotanctno = str_replace("-","",$cotanctno);      

                    $bdate = date('Y-m-d', strtotime($request->get('bday')));
                    if($request->get('occupation') !== "Others" ){
                        $occupation  = $request->get('occupation');
                    }else{
                        $occupation  = $request->get('occupationOther');

                    }              
                    //Basic+Prime
                    if($request->get('coverage') ==="c"){                           

                        //Combo Basic
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = 50; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }

                        //Combo Prime
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  =75; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end; 
                        $cocogen_covid_trans->pwd_tag  = "Y";                            
                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }
                    }elseif($request->get('coverage') ==="b"){
                        //Prime
                        $prem = $request->get('count') * 75;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }
                    }else{
                        //Basic     
                        $prem = $request->get('count') *  50;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->status  ="Blocked";
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }
                    }   
                    
    }

    public function savecovidrenewalblocked(Request $request){

                    $grpID = "";
                    $getlastGroupNo =cocogen_covid_trans::select('grp_id')->orderBy('grp_id', 'desc')->first();
                    if($getlastGroupNo['grp_id']){
                        $getlastGroupNo = $getlastGroupNo['grp_id'] + 1;
                    }else{
                        $getlastGroupNo = 1;
                    }
                    $getlastGroupNo = str_pad($getlastGroupNo, 7, '0', STR_PAD_LEFT);
                    $gdSequence =  "COVID19-GP-". date('y') . "-". $getlastGroupNo;

                    $now = date('Y-m-d');
                    $start = date('Y-m-d', strtotime($now. ' + 1 days'));
                    $end = date('Y-m-d', strtotime($start. ' + 3 months'));
                     
                    $cotanctno = $request->get('contact');
                    $cotanctno = str_replace(" ","",$cotanctno);
                    $cotanctno = str_replace("(","",$cotanctno);
                    $cotanctno = str_replace(")","",$cotanctno);
                    $cotanctno = str_replace("-","",$cotanctno);      

                    $bdate = date('Y-m-d', strtotime($request->get('bday')));
                    if($request->get('occupation') !== "Others" ){
                        $occupation  = $request->get('occupation');
                    }else{
                        $occupation  = $request->get('occupationOther');

                    }              
                    //Basic+Prime
                    if($request->get('coverage') ==="c"){                           

                        //Combo Basic
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->status  = "Blocked"; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = 50; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }

                        //Combo Prime
                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->status  = "Blocked"; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  =75; 
                        $cocogen_covid_trans->unit  = 1; 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end; 
                        $cocogen_covid_trans->pwd_tag  = "Y";                            
                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }
                    }elseif($request->get('coverage') ==="b"){
                        //Prime
                        $prem = $request->get('count') * 75;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation; 
                        $cocogen_covid_trans->status  = "Blocked"; 
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->coverage  = "Prime"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }
                    }else{
                        //Basic     
                        $prem = $request->get('count') *  50;

                        $cocogen_covid_trans = new cocogen_covid_trans;
                        $cocogen_covid_trans->firstname  = $request->get('first'); 
                        $cocogen_covid_trans->middlename  = $request->get('middle'); 
                        $cocogen_covid_trans->lastname  = $request->get('last'); 
                        $cocogen_covid_trans->birthdate  = $bdate;
                        $cocogen_covid_trans->gender  = $request->get('gender'); 
                        $cocogen_covid_trans->contractNo  = $cotanctno; 
                        $cocogen_covid_trans->email  = $request->get('email'); 
                        $cocogen_covid_trans->occupation  = $occupation;
                        $cocogen_covid_trans->status  = "Blocked";  
                        $cocogen_covid_trans->telNo  = $request->get('tel'); 
                        $cocogen_covid_trans->coverage  = "Basic"; 
                        $cocogen_covid_trans->premium  = $prem; 
                        $cocogen_covid_trans->unit  = $request->get('count'); 
                        $cocogen_covid_trans->beneficiary  = $request->get('beneficiary'); 
                        $cocogen_covid_trans->relationship  = $request->get('relationship'); 
                        $cocogen_covid_trans->PWDcheckbox1  = $request->get('check1'); 
                        $cocogen_covid_trans->PWDcheckbox2  = $request->get('check2'); 
                        $cocogen_covid_trans->PWDcheckbox3  = $request->get('check3'); 
                        $cocogen_covid_trans->PWDcheckbox4  = $request->get('check4'); 
                        $cocogen_covid_trans->PWDcheckbox5  = $request->get('check5'); 
                        $cocogen_covid_trans->PWDOther  = $request->get('pwdother'); 
                        $cocogen_covid_trans->incept_date  = $start; 
                        $cocogen_covid_trans->expiry_date  = $end;
                        $cocogen_covid_trans->pwd_tag  = "Y";

                        $cocogen_covid_trans->save();
                        $inserted_id = $cocogen_covid_trans->id;
                        
                        $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                        if($inserted_id){
                            $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                            $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                            $cocogen_covid_trans->group_tnxid = $gdSequence;
                            $cocogen_covid_trans->save();

                            $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($inserted_id);
                            $cocogen_covid_trans_renewal->old_coc = $request->get('id'); 
                            $cocogen_covid_trans_renewal->save();
                        }
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
          // return response()->json($request, 201);

        if($SecurityCode === $request->SecurityCode) {

            $email = "";
            $email = $request->email;;

            $User = new User;
            $User->email = $email;
            $User->name = $request->name;
            $User->type = "C";
            $User->password = "";
            $User->status = "PENDING";
            $User->active = "N";
            $User->save();
            $lastid = $User->id;
            
            $newUsers = User::where('id', '=',  $lastid)->get();

            if($request->email) {            
                $cocogen_users_client_codes = new  cocogen_users_client_code;
                $cocogen_users_client_codes->email =  $request->email;
                $cocogen_users_client_codes->code = (int)$request->assured_id;
                $cocogen_users_client_codes->save();
            }

            $response['TErrorMsg'] = "Success";
            $response['TStatus'] = "Saved";
            $response['newUser'] = $newUsers;
            return response()->json($response, 201);
        }else{
            $response['TErrorMsg'] = "Incorrect Security Code";
            $response['TStatus'] = "Error";
            return response()->json($response, 201);
        }
    }
}
