<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\cocogen_view_paid_policies;
use App\Models\cocogen_view_cancelled_policies;

class logs extends Controller
{
    public function update_policies(Request $request)
    {          
    	$user = users::where('email',$request->get('email'))->get();
		$policyno = $user[0]['policies_no'] + 1;

        $users = users::findorFail($request->get('email'));        
        $users->policies_no = $policyno;
        $users->save();  
        return response()->json(['success'=>'Data is successfully modified']);
    }

    public function update_online_payment_no(Request $request)
    {          
    	$user = users::where('email',$request->get('email'))->get();
		$online_payment_no = $user[0]['online_payment_no'] + 1;

        $users = users::findorFail($request->get('email'));        
        $users->online_payment_no = $online_payment_no;
        $users->save();  
        return response()->json(['success'=>'Data is successfully modified']);
    }

    public function update_partner_training_no(Request $request)
    {          
    	$user = users::where('email',$request->get('email'))->get();
		$partner_training_no = $user[0]['partner_training_no'] + 1;

        $users = users::findorFail($request->get('email'));        
        $users->partner_training_no = $partner_training_no;
        $users->save();  
        return response()->json(['success'=>'Data is successfully modified']);
    }

    public function update_reports_training_no(Request $request)
    {          
    	$user = users::where('email',$request->get('email'))->get();
		$reports_training_no = $user[0]['reports_training_no'] + 1;

        $users = users::findorFail($request->get('email'));        
        $users->reports_training_no = $reports_training_no;
        $users->save();  
        return response()->json(['success'=>'Data is successfully modified']);
    }

    public function update_requesst_hardcopy_training_no(Request $request)
    {          
    	$user = users::where('email',$request->get('email'))->get();
		$requesst_hardcopy_training_no = $user[0]['requesst_hardcopy_training_no'] + 1;

        $users = users::findorFail($request->get('email'));        
        $users->requesst_hardcopy_training_no = $requesst_hardcopy_training_no;
        $users->save();  
        return response()->json(['success'=>'Data is successfully modified']);
    }
}
