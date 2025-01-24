<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_survey;
use App\Models\cocogen_admin_survey_setting;

class survey extends Controller
{
    //
    public function savesurvey(Request $request){
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
    	$cocogen_survey = new cocogen_survey;
		$cocogen_survey->ratings  = $request->get('starCount');                           
        $cocogen_survey->comment  = $request->get('survey'); 
		$cocogen_survey->user  = $request->get('iduser'); 
        $cocogen_survey->created_at  = $datenow;
        $cocogen_survey->updated_at  = $datenow;
        $cocogen_survey->save();
    }

     public function get_occupation(Request $request)
    {       
        $cocogen_occupation = cocogen_occupation::get();     
        return response()->json($cocogen_occupation, 201);        
    }

    public function getset(Request $request)
    {       
        $cocogen_admin_survey_setting = cocogen_admin_survey_setting::get();     
        return response()->json($cocogen_admin_survey_setting, 201);        
    }
}
