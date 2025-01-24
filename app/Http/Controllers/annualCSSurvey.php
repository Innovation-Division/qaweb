<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_meta;
use App\Models\cocogen_annual_survey;

class annualCSSurvey extends Controller
{
    public function viewSurvey(Request $request){  
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();   
        $cocogen_meta = cocogen_meta::where('page', '=', "annual survey")->get();      

        $metadescription = $cocogen_meta[0]["description"];  
        $keyword = $cocogen_meta[0]["keyword"]; 
        $title = $cocogen_meta[0]["title"]; 

        $decode = base64_decode($request->segment(2));

        $pieces = explode(":", $decode);
        $cocogen_annual_survey = cocogen_annual_survey::where('id', '=', (int)$pieces[0])->where('status', '=', "SENT")->get();
        if(count($cocogen_annual_survey) === 0){
        	return redirect('/annual-cs-survey/failed'); 
        }
        $hashlink = sha1($cocogen_annual_survey[0]['id'].":".$cocogen_annual_survey[0]['email'].":".$cocogen_annual_survey[0]['agentNo'].":".$cocogen_annual_survey[0]['created_at']);
        $datenow = date("Y-m-d H:i:s", strtotime("-4 days +8hours"));   


        $id = $cocogen_annual_survey[0]['id'];
        // if($datenow > $cocogen_annual_survey[0]['created_at']){
	       //  return redirect('/request_time_out');         	
        // }  
        if($hashlink !== $pieces[1]){
        	return redirect('/annual-cs-survey/failed');
        }
 		return view('annualSurvey', ['title' => $title,
                                'id' => $id,
                                'metadescription' => $metadescription,
                                'keyword' => $keyword,
                                'cocogen_admin_footer' => $cocogen_admin_footer,
                                'cocogen_admin_main' => $cocogen_admin_main,
                                'cocogen_admin_submain' => $cocogen_admin_submain,
                                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                                'cocogen_admin_subchild' => $cocogen_admin_subchild]);
 	}

 	public function failedlink(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $title = "Failed | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('annual.failed', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function successlink(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $title = "Success | Cocogen | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('annual.success', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }
 	public function annualcssurveysave(Request $request){
 		
 		// dd($request,$request->get('hidden_id'));
 		$id = (int)$request->get('hidden_id');
 		$q1 = "";
 		$q2 = "";
 		$q3 = "";
 		$q4 = "";
 		$q5 = "";
 		$q6 = "";
 		$q7 = "";
 		$q8 = "";
 		$q9 = "";
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

        $cocogen_annual_survey = cocogen_annual_survey::findorFail($id);
        $cocogen_annual_survey->q1 = $q1;
        $cocogen_annual_survey->q2 = $q2;
        $cocogen_annual_survey->q3 = $q3;
        $cocogen_annual_survey->q4 = $q4;
        $cocogen_annual_survey->q5 = $q5;
        $cocogen_annual_survey->q6 = $q6;
        $cocogen_annual_survey->q7 = $q7;
        $cocogen_annual_survey->q8 = $q8;
        $cocogen_annual_survey->q9 = $q9;
        $cocogen_annual_survey->r1 = $request->get('firstRowRemarks');
        $cocogen_annual_survey->r2 = $request->get('SecondRowRemarks');
        $cocogen_annual_survey->r3 = $request->get('ThirdRowRemarks');
        $cocogen_annual_survey->r4 = $request->get('FourthRowRemarks');
        $cocogen_annual_survey->r5 = $request->get('FifthRowRemarks');
        $cocogen_annual_survey->r6 = $request->get('SixthRowRemarks');
        $cocogen_annual_survey->r7 = $request->get('SevenRowRemarks');
        $cocogen_annual_survey->r8 = $request->get('NinthRowRemarks');
        $cocogen_annual_survey->r9 = $request->get('TenthRowRemarks');
        $cocogen_annual_survey->status = "REPLIED";
        $cocogen_annual_survey->remarks_other = $request->get('Remarks_others');
        $cocogen_annual_survey->account_associate = $request->get('account_associate_name');
        $cocogen_annual_survey->mobile_no  = $request->get('Agetno');
    	$cocogen_annual_survey->updated_at = $datenow;
        $cocogen_annual_survey->response_date  = $datenow;
        $cocogen_annual_survey->save();
        return redirect('/annual-cs-survey/success');
	}
}
