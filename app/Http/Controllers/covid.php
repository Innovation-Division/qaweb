<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\cocogen_admin_pages;
use App\Models\cocogen_admin_pages_news;
use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_breadcrumbs;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_parentproduct;
use App\Models\cocogen_admin_subparentproduct; 
use App\Models\cocogen_admin_relatedproducts;
use App\Models\cocogen_admin_pages_products;
use App\Models\cocogen_admin_homepage_slider; 
use App\Models\cocogen_admin_homepage_video; 
use App\Models\cocogen_admin_ineedprotection; 
use App\Models\cocogen_admin_ineedprotection_trans; 
use App\Models\cocogen_admin_footer; 
use App\Models\cocogen_admin_faq_category; 
use App\Models\cocogen_admin_faq; 
use App\Models\cocogen_admin_emailtemplate;
use App\Models\cocogen_covid_trans;
use App\Models\cocogen_covid_trans_uploads;
use App\Models\cocogen_covid_file;
use App\Models\cocogen_promo;
use App\Models\cocogen_meta;
use DB;
use Session;
use SoapClient;
use DateTime;
use Mail;
use PDF;
use Auth;
use URL;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;

class covid extends Controller
{
     //covid19
    public function covidinsurance(){
    
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "covid19-insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.covid19.covidhome', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function newcovid(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       
        
        $cocogen_meta = cocogen_meta::where('page', '=', "covid19-insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       

        $now = date('Y-m-d');
        $start = date('Y-m-d', strtotime($now. ' + 1 days'));
        $end = date('Y-m-d', strtotime($start. ' + 3 months'));


        $myDateTime = DateTime::createFromFormat('Y-m-d', $start);
        $start = $myDateTime->format('F d, Y');

        $myDateTimeend = DateTime::createFromFormat('Y-m-d', $end);
        $end = $myDateTimeend->format('F d, Y');

        return view('getaquote.covid19.newhome', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'start' => $start,'end' => $end]);
    }

    public function renewalcovid(){


        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "covid19-insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.covid19.renewalhome', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }   

    // covid insurance save
    public function covidinsurancesave(Request $request){


                    $count = count($request->get('firstName_personal_info'));
                    $grpID = "";
                    $getlastGroupNo =cocogen_covid_trans::select('grp_id')->orderBy('grp_id', 'desc')->first();
                    if($getlastGroupNo['grp_id']){
                        $getlastGroupNo = $getlastGroupNo['grp_id'] + 1;
                    }else{
                        $getlastGroupNo = 1;
                    }
                    $getlastGroupNo = $inserted_id  = str_pad($getlastGroupNo, 7, '0', STR_PAD_LEFT);
                    $gdSequence =  "COVID19-GP-". date('y') . "-". $getlastGroupNo;

                    $total_premium = str_replace(",", "", $request->get('total_premium_all'));

                    $now = date('Y-m-d');
                    $start = date('Y-m-d', strtotime($now. ' + 1 days'));
                    $end = date('Y-m-d', strtotime($start. ' + 3 months'));
                    for($i = 0; $i < $count; $i++){  
	                    $cotanctno = $request->get('contactNo_personal_info')[$i];
                    	$cotanctno = str_replace(" ","",$cotanctno);
                    	$cotanctno = str_replace("(","",$cotanctno);
                    	$cotanctno = str_replace(")","",$cotanctno);
                    	$cotanctno = str_replace("-","",$cotanctno);                    
                        //Basic+Prime
                        if($request->get('coverage')[$i] ==="Basic+Prime"){

                        	
                            //Combo Basic
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info')[$i]; 
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info')[$i]; 
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info')[$i];                             
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i]; 
                            $cocogen_covid_trans->coverage  = "Basic"; 
                            $cocogen_covid_trans->premium  = 50; 
                            $cocogen_covid_trans->unit  = 1; 
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                    if($request->file('file')[$i]){
                                        if ($request->file('file')[$i]->isValid()) { 
                                            $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $request->file('file')[$i]->hashName();
                                            $cocogen_covid_trans_uploads->extension = $request->file('file')[$i]->extension();
                                            $cocogen_covid_trans_uploads->filesize = $request->file('file')[$i]->getSize();
                                            $cocogen_covid_trans_uploads->location = $request->file('file')[$i]->store('covidID');
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }

                            //Combo Prime
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info')[$i]; 
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info')[$i];
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info')[$i]; 
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i]; 
                            $cocogen_covid_trans->coverage  ="Prime"; 
                            $cocogen_covid_trans->premium  =75; 
                            $cocogen_covid_trans->unit  = 1; 
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                    if($request->file('file')[$i]){
                                        if ($request->file('file')[$i]->isValid()) { 
                                            $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $request->file('file')[$i]->hashName();
                                            $cocogen_covid_trans_uploads->extension = $request->file('file')[$i]->extension();
                                            $cocogen_covid_trans_uploads->filesize = $request->file('file')[$i]->getSize();
                                            $cocogen_covid_trans_uploads->location = $request->file('file')[$i]->store('covidID');
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }
                        }elseif($request->get('coverage')[$i] ==="Prime"){
                            //Prime
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info')[$i]; 
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info')[$i]; 
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info')[$i]; 
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i]; 
                            $cocogen_covid_trans->coverage  = $request->get('coverage')[$i]; 
                            $cocogen_covid_trans->premium  = $request->get('premium')[$i]; 
                            $cocogen_covid_trans->unit  = $request->get('count')[$i]; 
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                    if($request->file('file')[$i]){
                                        if ($request->file('file')[$i]->isValid()) { 
                                            $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $request->file('file')[$i]->hashName();
                                            $cocogen_covid_trans_uploads->extension = $request->file('file')[$i]->extension();
                                            $cocogen_covid_trans_uploads->filesize = $request->file('file')[$i]->getSize();
                                            $cocogen_covid_trans_uploads->location = $request->file('file')[$i]->store('covidID');
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }
                        }else{
                            //Combo Basic
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info')[$i]; 
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info')[$i]; 
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info')[$i];                            
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i];  
                            $cocogen_covid_trans->coverage  = $request->get('coverage')[$i]; 
                            $cocogen_covid_trans->premium  = $request->get('premium')[$i]; 
                            $cocogen_covid_trans->unit  = $request->get('count')[$i]; 
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-B". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                    if($request->file('file')[$i]){
                                        if ($request->file('file')[$i]->isValid()) { 
                                            $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $request->file('file')[$i]->hashName();
                                            $cocogen_covid_trans_uploads->extension = $request->file('file')[$i]->extension();
                                            $cocogen_covid_trans_uploads->filesize = $request->file('file')[$i]->getSize();
                                            $cocogen_covid_trans_uploads->location = $request->file('file')[$i]->store('covidID');
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }
                        }                        
                    }


                    

                    $fullname = $request->get('firstName_personal_info')[0] ." ".$request->get('middleName_personal_info')[0] ." ". $request->get('lastName_personal_info')[0]; 
                    $parameters = [
                        'txnid' => $gdSequence, # Varchar(40) A unique id identifying this specific transaction from the merchant site
                        'amount' => $total_premium, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                        'ccy' => 'PHP', # Char(3) The currency of the amount
                        'description' => $gdSequence, # Varchar(128) A brief description of what the payment is for
                        'email' => $request->get('email_summary'), # Varchar(40) email address of customer
                        'param1' => $fullname, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                        'param2' => $fullname,
                         # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                    ];
                    $merchant_account = [
                        'merchantid' => env('MERCHANT_ID'),
                        'password'   => env('MERCHANT_PASSWORD')
                    ];


                    // Initialize Dragonpay
                    $dragonpay = new Dragonpay($merchant_account);
                    // Filter payment channel
                    //$dragonpay->filterPaymentChannel( Dragonpay::ONLINE_BANK );
                    // Set parameters, then redirect to dragonpay
                    $dragonpay->setParameters($parameters)->away();
                     
    }
    
    // covid insurance renewal save
    public function covidinsurancerenewalsave(Request $request){

                   // dd($request);
                    $count = count($request->get('firstName_personal_info_renewal'));
                    $grpID = "";
                    $getlastGroupNo =cocogen_covid_trans::select('grp_id')->orderBy('grp_id', 'desc')->first();
                    if($getlastGroupNo['grp_id']){
                        $getlastGroupNo = $getlastGroupNo['grp_id'] + 1;
                    }else{
                        $getlastGroupNo = 1;
                    }
                    $getlastGroupNo = $inserted_id  = str_pad($getlastGroupNo, 7, '0', STR_PAD_LEFT);
                    $gdSequence =  "COVID19-GP-". date('y') . "-". $getlastGroupNo;

                    $total_premium = str_replace(",", "", $request->get('total_premium_all'));

                    for($i = 0; $i < $count; $i++){  
                        $cocogen_covid_trans_old =cocogen_covid_trans::where('id', '=' , $request->get('old_id_entry')[$i])->get();
                        $now = $cocogen_covid_trans_old[0]['expiry_date'];
                        $start = date('Y-m-d', strtotime($now. ' + 1 days'));
                        $end = date('Y-m-d', strtotime($start. ' + 3 months'));

                        $cotanctno = $request->get('contactNo_personal_info_renewal')[$i];
                    	$cotanctno = str_replace(" ","",$cotanctno);
                    	$cotanctno = str_replace("(","",$cotanctno);
                    	$cotanctno = str_replace(")","",$cotanctno);
                    	$cotanctno = str_replace("-","",$cotanctno);
                        //Basic+Prime
                        if($request->get('coverage_renewal')[$i] ==="Basic+Prime"){
                            //Combo Basic
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info_renewal')[$i]; 
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i];  
                            $cocogen_covid_trans->coverage  = "Basic"; 
                            $cocogen_covid_trans->premium  = 50; 
                            $cocogen_covid_trans->unit  = 1; 
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address_renewal')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province_renewal')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary_renewal'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary_renewal'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary_renewal'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($request->get('old_id_entry')[$i]);
                                $cocogen_covid_trans_renewal->status = "Renewed"; 
                                $cocogen_covid_trans_renewal->old_coc = $cocogen_covid_trans_old[0]['tnxid']; 
                                $cocogen_covid_trans_renewal->save();


                                    $cocogen_covid_trans_uploads =cocogen_covid_trans_uploads::where('TransID', '=' , $request->get('old_id_entry')[$i])->get();
                                    if($cocogen_covid_trans_uploads){
                                        foreach ($cocogen_covid_trans_uploads as $value) {
                                           $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $value->filename;
                                            $cocogen_covid_trans_uploads->extension = $value->extension;
                                            $cocogen_covid_trans_uploads->filesize = $value->filesize;
                                            $cocogen_covid_trans_uploads->location = $value->location;;
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }

                            //Combo Prime 
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info_renewal')[$i];        
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i];                       
                            $cocogen_covid_trans->coverage  ="Prime"; 
                            $cocogen_covid_trans->premium  =75; 
                            $cocogen_covid_trans->unit  = 1; 
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address_renewal')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province_renewal')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary_renewal'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary_renewal'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary_renewal'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($request->get('old_id_entry')[$i]);
                                $cocogen_covid_trans_renewal->status = "Renewed"; 
                                $cocogen_covid_trans_renewal->old_coc = $cocogen_covid_trans_old[0]['tnxid']; 
                                $cocogen_covid_trans_renewal->save();


                                    $cocogen_covid_trans_uploads =cocogen_covid_trans_uploads::where('TransID', '=' , $request->get('old_id_entry')[$i])->get();
                                    if($cocogen_covid_trans_uploads){
                                        foreach ($cocogen_covid_trans_uploads as $value) {
                                           $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $value->filename;
                                            $cocogen_covid_trans_uploads->extension = $value->extension;
                                            $cocogen_covid_trans_uploads->filesize = $value->filesize;
                                            $cocogen_covid_trans_uploads->location = $value->location;;
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }
                        }elseif($request->get('coverage_renewal')[$i] ==="Prime"){
                            //Prime
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->coverage  = $request->get('coverage_renewal')[$i]; 
                            $cocogen_covid_trans->premium  = $request->get('premium_renewal')[$i]; 
                            $cocogen_covid_trans->unit  = $request->get('count_renewal')[$i]; 
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info_renewal')[$i];       
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i];                        
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address_renewal')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province_renewal')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary_renewal'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary_renewal'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary_renewal'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($request->get('old_id_entry')[$i]);
                                $cocogen_covid_trans_renewal->status = "Renewed"; 
                                $cocogen_covid_trans_renewal->old_coc = $cocogen_covid_trans_old[0]['tnxid']; 
                                $cocogen_covid_trans_renewal->save();


                                    $cocogen_covid_trans_uploads =cocogen_covid_trans_uploads::where('TransID', '=' , $request->get('old_id_entry')[$i])->get();
                                    if($cocogen_covid_trans_uploads){
                                        foreach ($cocogen_covid_trans_uploads as $value) {
                                           $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $value->filename;
                                            $cocogen_covid_trans_uploads->extension = $value->extension;
                                            $cocogen_covid_trans_uploads->filesize = $value->filesize;
                                            $cocogen_covid_trans_uploads->location = $value->location;;
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }
                        }else{
                            //Combo Basic
                            $cocogen_covid_trans = new cocogen_covid_trans;
                            $cocogen_covid_trans->status  ="Sent";
                            $cocogen_covid_trans->firstname  = $request->get('firstName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->middlename  = $request->get('middleName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->lastname  = $request->get('lastName_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->birthdate  = $request->get('dateofBirth_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->gender  = $request->get('gender_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->beneficiary  = $request->get('beneficiary_personal_info')[$i]; 
                            $cocogen_covid_trans->relationship  = $request->get('relationship_personal_info')[$i];  
                            $cocogen_covid_trans->contractNo  = $cotanctno; 
                            $cocogen_covid_trans->email  = $request->get('email_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->occupation  = $request->get('occupation_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->telNo  = $request->get('tel_no_info_renewal')[$i];                             
                            $cocogen_covid_trans->coverage  = $request->get('coverage_renewal')[$i]; 
                            $cocogen_covid_trans->premium  = $request->get('premium_renewal')[$i]; 
                            $cocogen_covid_trans->unit  = $request->get('count_renewal')[$i]; 
                            $cocogen_covid_trans->incept_date  = $start; 
                            $cocogen_covid_trans->expiry_date  = $end; 
                            $cocogen_covid_trans->residence_address  = $request->get('residence_address_renewal')[$i]; 
                            $cocogen_covid_trans->residence_province  = $request->get('residence_province_renewal')[$i]; 
                            $cocogen_covid_trans->residence_municipality  = $request->get('residence_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->residence_barangay  = $request->get('residence_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_address  = $request->get('mailing_address_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_province  = $request->get('mailing_province_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_municipality  = $request->get('mailing_municipality_renewal')[$i]; 
                            $cocogen_covid_trans->mailing_barangay  = $request->get('mailing_barangay_renewal')[$i]; 
                            $cocogen_covid_trans->maritalStatus  = $request->get('status_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->nationality  = $request->get('nationality_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->placeOfBirth  = $request->get('place_of_birth_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->TypeOfdID  = $request->get('type_of_id_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->idno  = $request->get('idno_other_personal_info_renewal')[$i]; 
                            $cocogen_covid_trans->agentName  = $request->get('agent_name_summary_renewal'); 
                            $cocogen_covid_trans->promoCode  = $request->get('promo_summary_renewal'); 
                            $cocogen_covid_trans->emailto  = $request->get('email_summary_renewal'); 
                            $cocogen_covid_trans->grp_total_prem  = $total_premium; 
                            $cocogen_covid_trans->save();
                            $inserted_id = $cocogen_covid_trans->id;
                            
                            $inserted_id  = str_pad($inserted_id, 7, '0', STR_PAD_LEFT);
                            if($inserted_id){
                                $cocogen_covid_trans = cocogen_covid_trans::findorFail($inserted_id);
                                $cocogen_covid_trans->tnxid = "E-P". date('y') . "WS-". $inserted_id  ; 
                                $cocogen_covid_trans->grp_id =  $getlastGroupNo;
                                $cocogen_covid_trans->group_tnxid = $gdSequence;
                                $cocogen_covid_trans->save();

                                $cocogen_covid_trans_renewal = cocogen_covid_trans::findorFail($request->get('old_id_entry')[$i]);
                                $cocogen_covid_trans_renewal->status = "Renewed"; 
                                $cocogen_covid_trans_renewal->old_coc = $cocogen_covid_trans_old[0]['tnxid']; 
                                $cocogen_covid_trans_renewal->save();


                                    $cocogen_covid_trans_uploads =cocogen_covid_trans_uploads::where('TransID', '=' , $request->get('old_id_entry')[$i])->get();
                                    if($cocogen_covid_trans_uploads){
                                        foreach ($cocogen_covid_trans_uploads as $value) {
                                           $cocogen_covid_trans_uploads = new cocogen_covid_trans_uploads;
                                            $cocogen_covid_trans_uploads->filename = $value->filename;
                                            $cocogen_covid_trans_uploads->extension = $value->extension;
                                            $cocogen_covid_trans_uploads->filesize = $value->filesize;
                                            $cocogen_covid_trans_uploads->location = $value->location;;
                                            $cocogen_covid_trans_uploads->TransID = $inserted_id;
                                            $cocogen_covid_trans_uploads->save();              
                                        }
                                    }
                            }
                        }                        
                    }
                    
                    $fullname = $request->get('firstName_personal_info_renewal')[0] ." ".$request->get('middleName_personal_info_renewal')[0] ." ". $request->get('lastName_personal_info_renewal')[0]; 
                    $parameters = [
                        'txnid' => $gdSequence, # Varchar(40) A unique id identifying this specific transaction from the merchant site
                        'amount' => $total_premium, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                        'ccy' => 'PHP', # Char(3) The currency of the amount
                        'description' => $gdSequence, # Varchar(128) A brief description of what the payment is for
                        'email' => $request->get('email_summary_renewal'), # Varchar(40) email address of customer
                        'param1' => $fullname, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                        'param2' => "",
                         # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                    ];
                    $merchant_account = [
                        'merchantid' => env('MERCHANT_ID'),
                        'password'   => env('MERCHANT_PASSWORD')
                    ];


                    // Initialize Dragonpay
                    $dragonpay = new Dragonpay($merchant_account);
                    // Filter payment channel
                    //$dragonpay->filterPaymentChannel( Dragonpay::ONLINE_BANK );
                    // Set parameters, then redirect to dragonpay
                    $dragonpay->setParameters($parameters)->away();
                     
    }

    public function covidsuccess(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "covid19-insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.covid19.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function covidpending(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "covid19-insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.covid19.pending', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function covidfailed(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "covid19-insurance")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('getaquote.covid19.failed', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }
}
