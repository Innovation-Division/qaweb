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
use App\Models\users;
use GuzzleHttp\Client;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_meta;
use App\Models\location;
use App\Models\cocogen_getquote_mvtypes;
use App\Models\cocogen_fmv_year;
use DB;
use Auth;

class epartnerhubClaimNoLogin extends Controller
{
    public function motorClaimsOpen(){
    
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active',
         '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_epartnerhub_claim_upload_file = cocogen_epartnerhub_claim_upload_file::all();

        $location = location::select('province')->distinct('province')->orderBy('province', 'asc')->get();
        $cocogen_fmv_brand = cocogen_getquote_mvtypes::groupBy('mvType')->orderBy('mvType','ASC')->get();
        $cocogen_fmv_year = DB::table('cocogen_fmv')->distinct()->select('year')->groupBy('year')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Claims Automation - Motor")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   

        return view('epartnerhub.claims.motor.outofepartnerhub.createclaimmotor_not_epartnerhub', ['title' => $title,
        'locations' => $location,
        'cocogen_admin_footer' => $cocogen_admin_footer,
        'cocogen_admin_productlink' => $cocogen_admin_productlink,
        'metadescription' => $metadescription,
        'keyword' => $keyword,
        'cocogen_fmv_brand' => $cocogen_fmv_brand,
        'cocogen_fmv_years' => $cocogen_fmv_year,
        'cocogen_epartnerhub_claim_upload_file' => $cocogen_epartnerhub_claim_upload_file,
        'cocogen_admin_main' => $cocogen_admin_main,
        'cocogen_admin_submain' => $cocogen_admin_submain,
        'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function motorClaimsSave(Request $request)
    {
        // dd($request);
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        $latest = DB::table('cocogen_epartnerhub_motor_claim_trans')->latest('id')->first();

        $cocogen_epartnerhub_motor_claim_trans = new cocogen_epartnerhub_motor_claim_trans;
        $cocogen_epartnerhub_motor_claim_trans->policy = $request->get('policyNo');
        $cocogen_epartnerhub_motor_claim_trans->driver = $request->get('driver');
        $cocogen_epartnerhub_motor_claim_trans->status = "FOR REVIEW";
        $cocogen_epartnerhub_motor_claim_trans->relationship_to_driver = $request->get('relationship_motor');
        $cocogen_epartnerhub_motor_claim_trans->date_of_loss = date('Y-m-d', strtotime($request->get('Loss_date')));
        $cocogen_epartnerhub_motor_claim_trans->time_loss = $request->get('Loss_time');
        $cocogen_epartnerhub_motor_claim_trans->location_of_loss = $request->get('location_loss');
        $cocogen_epartnerhub_motor_claim_trans->province = $request->get('claim_motor_permanent_province_not');
        $cocogen_epartnerhub_motor_claim_trans->municipality  = $request->get('permanent_municipality_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->barangay  = $request->get('permanent_barangay_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->first_name  = $request->get('fname_motor');
        $cocogen_epartnerhub_motor_claim_trans->middle_name  = $request->get('mname_motor');
        $cocogen_epartnerhub_motor_claim_trans->last_name  = $request->get('lname_motor');
        $cocogen_epartnerhub_motor_claim_trans->accident_happen  = $request->get('acc_happen_motor');
        $cocogen_epartnerhub_motor_claim_trans->extend_damage  = $request->get('edamage_motor');
        $cocogen_epartnerhub_motor_claim_trans->driving_vehicle  = $request->get('driving_vec_motor');
        $cocogen_epartnerhub_motor_claim_trans->purpose_trip  = $request->get('purpose_vec_motor');
        $cocogen_epartnerhub_motor_claim_trans->tel_no  = $request->get('tel_no_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->mobile_no  = $request->get('mobile_no_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->email_address  = $request->get('email_address_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->no_of_passenger  = $request->get('no_passenger_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->name_reportee  = $request->get('name_reportee_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->third_party_involve  = $request->get('hd_third_party_not');
        $cocogen_epartnerhub_motor_claim_trans->gross_amount  =  str_replace(",", "", $request->get('gross_estimate'));
        $cocogen_epartnerhub_motor_claim_trans->claim_with_recovery  = $request->get('hd_recovery_claim');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_partial  = $request->get('cb_par_total_loss');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_theft_access  = $request->get('cb_theft_accessory');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_carnap  = $request->get('cb_carnap');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_bodily_injury  = $request->get('cb_bi');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_vehicle  = $request->get('cb_vec_tp');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_pd_tp  = $request->get('cb_pd_tp');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_bi_tp  = $request->get('cb_bi_tp');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_recovery  = $request->get('cb_recovery');
        $cocogen_epartnerhub_motor_claim_trans->cat_loss_rec_other_ins  = $request->get('cb_recovery_other_insurance');
        $cocogen_epartnerhub_motor_claim_trans->year  = $request->get('drpYear_claim_not');
        $cocogen_epartnerhub_motor_claim_trans->brand  = $request->get('brand_claim_not');
        $cocogen_epartnerhub_motor_claim_trans->model  = $request->get('model_claim_not');
        $cocogen_epartnerhub_motor_claim_trans->mv_file_no  = $request->get('mv_file_no_claim');
        $cocogen_epartnerhub_motor_claim_trans->plate_no  = $request->get('palte_no_claim');
        $cocogen_epartnerhub_motor_claim_trans->engine_no  = $request->get('engine_no_claim');
        $cocogen_epartnerhub_motor_claim_trans->color  = $request->get('color_claim');
        $cocogen_epartnerhub_motor_claim_trans->chassis_no  = $request->get('chassis_no_claim');
        $cocogen_epartnerhub_motor_claim_trans->conduction_stcker_no  = $request->get('conduction_sticker_no_claim');
        $cocogen_epartnerhub_motor_claim_trans->mortgaged = $request->get('mortgaged');
        $cocogen_epartnerhub_motor_claim_trans->created_by = $request->get('email_address_motor_not');
        $cocogen_epartnerhub_motor_claim_trans->updated_at = $datenow;
        $cocogen_epartnerhub_motor_claim_trans->created_at = $datenow;
        $cocogen_epartnerhub_motor_claim_trans->save();

        $lastInsertedId = $cocogen_epartnerhub_motor_claim_trans->id + 1;

        if ($lastInsertedId) {
            $cocogen_epartnerhub_claim_upload_file = cocogen_epartnerhub_claim_upload_file::where('line', '=',"MC")->get();  
            $countparloss = 0;
            if($request->get('cb_par_total_loss')){
                 
                foreach($cocogen_epartnerhub_claim_upload_file as $filemotorpartiallos){
                    if($filemotorpartiallos->category === "Partial Loss/Total Loss/Theft of Accessory"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Partial Loss/Total Loss/Theft of Accessory";
                            $cocogen_epartner_claim_motor_uploads->typename = $filemotorpartiallos->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->status = "N";
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_partial_loss')[$countparloss])){
                                    
                                    foreach($request->file('file_upload_motor_partial_loss') as $keystock=>$filemotorpartiallosindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $filemotorpartiallosindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $filemotorpartiallosindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $filemotorpartiallosindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $filemotorpartiallosindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $filemotorpartiallosindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }

                                }
                            }
                        $countparloss = $countparloss + 1;
                    }
                }
              
            }

            $counttheftAcc = 0;
            if($request->get('cb_theft_accessory')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileThetAccess){
                        if($fileThetAccess->category === "Partial Loss/Total Loss/Theft of Accessory"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Partial Loss/Total Loss/Theft of Accessory";
                            $cocogen_epartner_claim_motor_uploads->typename = $fileThetAccess->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_partial_loss')[$counttheftAcc])){
                                    foreach($request->file('file_upload_motor_partial_loss') as $keystock=>$fileThetAccessindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $fileThetAccessindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $fileThetAccessindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $fileThetAccessindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $fileThetAccessindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $fileThetAccessindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $counttheftAcc = $counttheftAcc + 1;
                    }
                }
            }

            $countcarnap = 0;
            if($request->get('cb_carnap')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileMotorCarnap){
                        if($fileMotorCarnap->category === "Carnap"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Carnap";
                            $cocogen_epartner_claim_motor_uploads->typename = $fileMotorCarnap->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_carnap')[$countcarnap])){
                                    foreach($request->file('file_upload_motor_carnap') as $keystock=>$fileMotorCarnapindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $fileMotorCarnapindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $fileMotorCarnapindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $fileMotorCarnapindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $fileMotorCarnapindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $fileMotorCarnapindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $countcarnap = $countcarnap + 1;
                    }
                }
            }

            $countbi = 0;
            if($request->get('cb_bi')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileMotorBI){
                        if($fileMotorBI->category === "Bodily Injury"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Bodily Injury";
                            $cocogen_epartner_claim_motor_uploads->typename = $fileMotorBI->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_bi')[$countbi])){
                                    foreach($request->file('file_upload_motor_bi') as $keystock=>$fileMotorBIindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $fileMotorBIindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $fileMotorBIindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $fileMotorBIindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $fileMotorBIindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $fileMotorBIindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $countbi = $countbi + 1;
                    }
                }
            }

            $countvetTP = 0;
            if($request->get('cb_vec_tp')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileMotorVecTP){
                        if($fileMotorVecTP->category === "Vehicle (Third Party)"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Vehicle (Third Party)";
                            $cocogen_epartner_claim_motor_uploads->typename = $fileMotorVecTP->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_vehicleTP')[$countvetTP])){
                                    foreach($request->file('file_upload_motor_vehicleTP') as $keystock=>$fileMotorVecTPindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $fileMotorVecTPindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $fileMotorVecTPindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $fileMotorVecTPindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $fileMotorVecTPindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $fileMotorVecTPindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $countvetTP = $countvetTP + 1;
                    }
                }
            }

            $countvetTP = 0;
            if($request->get('cb_pd_tp')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $filePDTP){
                        if($filePDTP->category === "Property Damage (Third Party)"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Property Damage (Third Party)";
                            $cocogen_epartner_claim_motor_uploads->typename = $filePDTP->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_PDTP')[$countvetTP])){
                                    foreach($request->file('file_upload_motor_PDTP') as $keystock=>$filePDTPindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $filePDTPindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $filePDTPindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $filePDTPindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $filePDTPindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $filePDTPindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $countvetTP = $countvetTP + 1;
                    }
                }
            }

            $countBITP = 0;
            if($request->get('cb_bi_tp')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileBITP){
                        if($fileBITP->category === "Bodily Injury (Third Party)"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Bodily Injury (Third Party)";
                            $cocogen_epartner_claim_motor_uploads->typename = $fileBITP->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_BITP')[$countBITP])){
                                    foreach($request->file('file_upload_motor_BITP') as $keystock=>$fileBITPindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $fileBITPindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $fileBITPindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $fileBITPindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $fileBITPindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $fileBITPindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $countBITP = $countBITP + 1;
                    }
                }
            }

            $countRec = 0;
            if($request->get('cb_recovery')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileVec){
                        if($fileVec->category === "Recovery"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Recovery";
                            $cocogen_epartner_claim_motor_uploads->typename = $fileVec->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_recovery')[$countRec])){
                                    foreach($request->file('file_upload_motor_recovery') as $keystock=>$fileVecindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $fileVecindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $fileVecindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $fileVecindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $fileVecindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $fileVecindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $countRec = $countRec + 1;
                    }
                }
            }

            $countREcOTher = 0;
            if($request->get('cb_recovery_other_insurance')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileVecOther){
                        if($fileVecOther->category === "Recovery of Other Insurance company"){
                            $lastInsertedIdfileMotor = "";
                            $cocogen_epartner_claim_motor_uploads = new cocogen_epartner_claim_motor_uploads;
                            $cocogen_epartner_claim_motor_uploads->type = "Recovery of Other Insurance company";
                            $cocogen_epartner_claim_motor_uploads->typename = $fileVecOther->upload_file_name;
                            $cocogen_epartner_claim_motor_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_motor_uploads->save();
                            $lastInsertedIdfileMotor = $cocogen_epartner_claim_motor_uploads->id;
                            if($lastInsertedIdfileMotor){
                                if(isset($request->file('file_upload_motor_recovery_other_insurance')[$countREcOTher])){
                                    foreach($request->file('file_upload_motor_recovery_other_insurance') as $keystock=>$fileVecOtherindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::findorFail($lastInsertedIdfileMotor);
                                            $cocogen_epartner_claim_motor_uploads->filename = $fileVecOtherindvi->hashName();
                                            $cocogen_epartner_claim_motor_uploads->original_name = $fileVecOtherindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_motor_uploads->status = "P";
                                            $cocogen_epartner_claim_motor_uploads->extension = $fileVecOtherindvi->extension();
                                            $cocogen_epartner_claim_motor_uploads->filesize = $fileVecOtherindvi->getSize();
                                            $cocogen_epartner_claim_motor_uploads->location = $fileVecOtherindvi->store('epolicyquotationMotor/'.$lastInsertedId);
                                            $cocogen_epartner_claim_motor_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_motor_uploads->save();
                                    }
                                }
                            }
                        $countREcOTher = $countREcOTher + 1;
                    }
                }
            }




            $userID = "testAPI";
            $cocogen_api_users = cocogen_api_users::where('name', $userID)->get();
            
            $email = "claims_admin@cocogen.com";
            $line = "MC";
            $SecurityCode = sha1($cocogen_api_users[0]["name"].":".$cocogen_api_users[0]["password"] .":".$cocogen_api_users[0]["password_key"].":".$email.":".$cocogen_api_users[0]["id"]);
            
            $TransID = $lastInsertedId;
            $policy = $request->get('policyNo');
            $claim_status = "FOR REVIEW";
            $driver = $request->get('driver');
            $relationship_to_driver = $request->get('relationship_motor');
            $date_of_loss = date('Y-m-d', strtotime($request->get('Loss_date')));
            $time_loss = $request->get('Loss_time');
            $location_of_loss = $request->get('location_loss');
            $province = $request->get('claim_motor_permanent_province');
            $municipality =  $request->get('permanent_municipality_motor');
            $barangay = $request->get('permanent_barangay_motor');
            $email_address = $request->get('email_address_motor');
            $first_name = $request->get('fname_motor');
            $middle_name = $request->get('mname_motor');
            $last_name  = $request->get('lname_motor');
            $accident_happen = $request->get('acc_happen_motor');
            $extend_damage  = $request->get('edamage_motor');
            $driving_vehicle  = $request->get('driving_vec_motor');
            $tel_no  = $request->get('tel_no_motor');
            $mobile_no = $request->get('mobile_no_motor');
            $no_passenger = $request->get('no_passenger_motor');
            $name_reportee = $request->get('name_reportee_motor');
            $third_party_involve = $request->get('hd_third_party');
            $gross_amount = str_replace(",", "", $request->get('gross_estimate'));
            $claim_with_recovery = $request->get('hd_recovery_claim');
            $year =$request->get('drpYear_claim');
            $brand = $request->get('brand_claim');
            $model = $request->get('model_claim');
            $mv_file_no = $request->get('mv_file_no_claim');
            $plate_no = $request->get('palte_no_claim');
            $engine_no = $request->get('engine_no_claim');
            $color = $request->get('color_claim');
            $chassis_no = $request->get('chassis_no_claim');
            $conduction_stcker_no = $request->get('conduction_sticker_no_claim');
            $created_by = $request->get('email_address_motor_not');
            $cat_loss_partial = "";
            $cat_loss_bodily_injury = "";
            $cat_loss_theft_access = "";
            $cat_loss_carnap = "";
            $cat_loss_vehicle = "";
            $cat_loss_pd_tp = "";
            $cat_loss_bi_tp = "";
            $cat_loss_recovery = "";
            $cat_loss_rec_other_ins = "";

            $dataupload = array();
            if($request->get('cb_par_total_loss')){
                $cat_loss_partial = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Partial Loss/Total Loss/Theft of Accessory")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_bi')){
                $cat_loss_bodily_injury = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Bodily Injury")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_theft_accessory')){
                $cat_loss_theft_access = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Partial Loss/Total Loss/Theft of Accessory")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_carnap')){
                $cat_loss_carnap = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Carnap")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_vec_tp')){
                $cat_loss_vehicle = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Vehicle (Third Party)")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_pd_tp')){
                $cat_loss_pd_tp = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Property Damage (Third Party)")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_bi_tp')){
                $cat_loss_bi_tp = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Bodily Injury (Third Party)")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_recovery')){
                $cat_loss_recovery = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Recovery")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_recovery_other_insurance')){
                $cat_loss_rec_other_ins = "Yes";
                $cocogen_epartner_claim_motor_uploads = cocogen_epartner_claim_motor_uploads::where('type', '=',"Recovery of Other Insurance company")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_motor_uploads as $cocogen_epartner_claim_motor_upload){
                    $fileSec = sha1($cocogen_epartner_claim_motor_upload->id.":".$cocogen_epartner_claim_motor_upload->typename.":".$cocogen_epartner_claim_motor_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_motor_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_motor_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/motor/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_motor_upload->typename,
                        "ID" => $cocogen_epartner_claim_motor_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_motor_upload->original_name,
                        "line" => "MC",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            $policybtanch = explode("-", $request->get('policyNo'));
            if(empty($policybtanch[2])){
                $policyBranch = "HO";
            }else{
                $policyBranch = $policybtanch[2];
            }
            $created_by = $request->get('email_address_motor_not');
            $client = new Client();
              $res = $client->request('POST', 'http://claimsautomation.cocogen.com.ph/api/saveClaims', [
                'form_params' => [
                    'UID' => $userID,
                    'SecurityCode' => $SecurityCode,
                    'email' => $email,
                    'line' => $line,
                    'branch_code'=>$policyBranch ,
                    'id' => $cocogen_api_users[0]["id"],
                    'TransID' =>$TransID,
                    'policy' => $policy,
                    'status' => $claim_status,
                    'driver' => $driver,
                    'relationship_to_driver' => $relationship_to_driver,
                    'date_of_loss' => $date_of_loss,
                    'time_loss' => $time_loss ,
                    'location_of_loss' => $location_of_loss,
                    'province' => $province,
                    'municipality' => $municipality,
                    'email_address' => $email_address,
                    'barangay' => $barangay,
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'accident_happen' => $accident_happen,
                    'extend_damage' => $extend_damage,
                    'driving_vehicle' => $driving_vehicle,
                    'tel_no' => $tel_no,
                    'mobile_no' => $mobile_no,
                    'no_passenger' => $no_passenger,
                    'name_reportee' => $name_reportee,
                    'third_party_involve' => $third_party_involve,
                    'gross_amount' => $gross_amount,
                    'claim_with_recovery' => $claim_with_recovery,
                    'cat_loss_partial' => $cat_loss_partial,
                    'cat_loss_theft_access' => $cat_loss_theft_access,
                    'cat_loss_carnap' => $cat_loss_carnap,
                    'cat_loss_bodily_injury' => $cat_loss_bodily_injury,
                    'cat_loss_vehicle' => $cat_loss_vehicle,
                    'cat_loss_pd_tp' => $cat_loss_pd_tp,
                    'cat_loss_bi_tp' => $cat_loss_bi_tp,
                    'cat_loss_recovery' => $cat_loss_recovery,
                    'cat_loss_rec_other_ins' => $cat_loss_rec_other_ins,
                    'year' => $year,
                    'brand' => $brand,
                    'model' => $model,
                    'mv_file_no' => $mv_file_no,
                    'plate_no' => $plate_no,
                    'engine_no' => $engine_no,
                    'color' => $color,
                    'chassis_no' => $chassis_no,
                    'conduction_stcker_no' => $conduction_stcker_no,
                    'created_by' => $created_by,
                    'dataupload' => $dataupload 
                ]
            ]);
            $dataraw = $res->getBody()->getContents();
            $datadecoded = json_decode($dataraw, true);

            
        }

        $status_message = "Success!";
        return back()->withInput()->with('message', $status_message);
    }

    public function paClaimsOpen(){
    
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active',
         '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_epartnerhub_claim_upload_file = cocogen_epartnerhub_claim_upload_file::all();

        $location = location::select('province')->distinct('province')->orderBy('province', 'asc')->get();
        $cocogen_fmv_brand = cocogen_getquote_mvtypes::groupBy('mvType')->orderBy('mvType','ASC')->get();
        $cocogen_fmv_year = DB::table('cocogen_fmv')->distinct()->select('year')->groupBy('year')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Claims Automation - Personal Accident")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   

        return view('epartnerhub.claims.pa.outofepartnerhub.createclaimpa_not_epartner', ['title' => $title,
        'locations' => $location,
        'cocogen_admin_footer' => $cocogen_admin_footer,
        'cocogen_admin_productlink' => $cocogen_admin_productlink,
        'metadescription' => $metadescription,
        'keyword' => $keyword,
        'cocogen_fmv_brand' => $cocogen_fmv_brand,
        'cocogen_fmv_years' => $cocogen_fmv_year,
        'cocogen_epartnerhub_claim_upload_file' => $cocogen_epartnerhub_claim_upload_file,
        'cocogen_admin_main' => $cocogen_admin_main,
        'cocogen_admin_submain' => $cocogen_admin_submain,
        'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function paClaimsSave(Request $request)
    {
        //dd($request);
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        $cocogen_epartnerhub_pa_claim_trans = new cocogen_epartnerhub_pa_claim_trans;
        $cocogen_epartnerhub_pa_claim_trans->policy = $request->get('policyNo_pa');
        $cocogen_epartnerhub_pa_claim_trans->status = "FOR REVIEW";
        $cocogen_epartnerhub_pa_claim_trans->date_of_loss = date('Y-m-d', strtotime($request->get('Loss_date_pa_not')));
        $cocogen_epartnerhub_pa_claim_trans->time_loss = $request->get('Loss_time_pa');
        $cocogen_epartnerhub_pa_claim_trans->location_of_loss = $request->get('location_loss_pa');
        $cocogen_epartnerhub_pa_claim_trans->province = $request->get('permanent_province_pa');
        $cocogen_epartnerhub_pa_claim_trans->municipality = $request->get('permanent_municipality_pa');
        $cocogen_epartnerhub_pa_claim_trans->barangay = $request->get('permanent_barangay_pa');
        $cocogen_epartnerhub_pa_claim_trans->contact_no = $request->get('contact_no_pa');
        $cocogen_epartnerhub_pa_claim_trans->email_address = $request->get('email_address_pa');
        $cocogen_epartnerhub_pa_claim_trans->claimant_same_insured = $request->get('hd_claim_pa_same_insured');
        $cocogen_epartnerhub_pa_claim_trans->date_loss_within_terms = $request->get('hd_claim_pa_within_inception');
        $cocogen_epartnerhub_pa_claim_trans->premium_paid = $request->get('hd_claim_pa_prem_paid');
        $cocogen_epartnerhub_pa_claim_trans->document_complete = $request->get('hd_claim_pa_required_doc');
        $cocogen_epartnerhub_pa_claim_trans->process_send_followup = $request->get('hd_claim_pa_not_submitted');
        $cocogen_epartnerhub_pa_claim_trans->checlklist_accomplished = $request->get('hd_claim_pa_checklist_accomplished');
        $cocogen_epartnerhub_pa_claim_trans->gross_amount = str_replace(",", "", $request->get('gross_estigross_estimate_pamate_pa_view')); 
        $cocogen_epartnerhub_pa_claim_trans->fName = $request->get('pa_first_name_owner_out');
        $cocogen_epartnerhub_pa_claim_trans->mName = $request->get('pa_middle_name_owner_out');
        $cocogen_epartnerhub_pa_claim_trans->lName = $request->get('pa_last_name_owner_out');
        $cocogen_epartnerhub_pa_claim_trans->claim_recovery = $request->get('hd_claim_motor_pa_recovery');
        $cocogen_epartnerhub_pa_claim_trans->accident_happen = $request->get('pa_acc_happen');
        if($request->get('cb_med_expense_reim')){
            $cocogen_epartnerhub_pa_claim_trans->cat_loss_med_reembsment = "Yes";
        }
        if($request->get('cb_dis_de')){
            $cocogen_epartnerhub_pa_claim_trans->cat_loss_death = "Yes";
        }
        if($request->get('cb_educ_asst_claim')){
            $cocogen_epartnerhub_pa_claim_trans->cat_loss_education_asst_claim = "Yes";
        }
        if($request->get('cb_fire_asst_bene_claim')){
            $cocogen_epartnerhub_pa_claim_trans->cat_loss_asstnce_bene_claim = "Yes";
        }

        $cocogen_epartnerhub_pa_claim_trans->created_by = $request->get('email_address_pa');
        $cocogen_epartnerhub_pa_claim_trans->save();

        $lastInsertedId = $cocogen_epartnerhub_pa_claim_trans->id;

        if ($lastInsertedId) {
            //api insert to standalone
            $dataupload = array();
            $userID = "testAPI";
            $cocogen_api_users = cocogen_api_users::where('name', $userID)->get();
            
            $email = "claims_admin@cocogen.com";
            $line = "PA";
            $SecurityCode = sha1($cocogen_api_users[0]["name"].":".$cocogen_api_users[0]["password"] .":".$cocogen_api_users[0]["password_key"].":".$email.":".$cocogen_api_users[0]["id"]);
            
            $TransID = $lastInsertedId;
            $policy = $request->get('policyNo_pa');
            $claim_status = "FOR REVIEW";
            $date_of_loss = date('Y-m-d', strtotime($request->get('Loss_date_pa')));
            $time_loss = $request->get('Loss_time_pa');
            $location_of_loss = $request->get('location_loss_pa');
            $province = $request->get('permanent_province_pa');
            $municipality =  $request->get('permanent_municipality_pa');
            $barangay = $request->get('permanent_barangay_pa');
            $contact_no = $request->get('contact_no_pa');
            $email_address = $request->get('email_address_pa');
            $claimnat_name_insured = $request->get('hd_claim_pa_same_insured');
            $date_loss_within_terms = $request->get('hd_claim_pa_within_inception');
            $premium_paid  = $request->get('hd_claim_pa_prem_paid');
            $document_complete = $request->get('hd_claim_pa_required_doc');
            $process_send_followup  = $request->get('hd_claim_pa_not_submitted');
            $checlklist_accomplished  = $request->get('hd_claim_pa_checklist_accomplished');
            $gross_amount = str_replace(",", "", $request->get('gross_estimate_pa'));
            $cat_loss_reembsment = "";
            $cat_loss_death = "";
            $cat_loss_education_asst_claim ="";
            $cat_loss_asstnce_bene_claim ="";

            $cocogen_epartnerhub_claim_upload_file = cocogen_epartnerhub_claim_upload_file::where('line', '=',"PA")->get(); 
        

            $countmedreim = 0;
            if($request->get('cb_med_expense_reim')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $filemedreim){
                        if($filemedreim->category === "Medical Reimbursement"){
                            $lastInsertedIdfilePA = "";
                            $cocogen_epartner_claim_pa_uploads = new cocogen_epartner_claim_pa_uploads;
                            $cocogen_epartner_claim_pa_uploads->type = "Medical Reimbursement";
                            $cocogen_epartner_claim_pa_uploads->status = "N";
                            $cocogen_epartner_claim_pa_uploads->typename = $filemedreim->upload_file_name;
                            $cocogen_epartner_claim_pa_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->save();
                            $lastInsertedIdfilePA = $cocogen_epartner_claim_pa_uploads->id;
                            if($lastInsertedIdfilePA){
                                if(isset($request->file('file_upload_pa_reimbursment')[$countmedreim])){
                                    foreach($request->file('file_upload_pa_reimbursment') as $keystock=>$filemedreimindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::findorFail($lastInsertedIdfilePA);
                                            $cocogen_epartner_claim_pa_uploads->filename = $filemedreimindvi->hashName();
                                            $cocogen_epartner_claim_pa_uploads->original_name = $filemedreimindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_pa_uploads->status = "P";
                                            $cocogen_epartner_claim_pa_uploads->extension = $filemedreimindvi->extension();
                                            $cocogen_epartner_claim_pa_uploads->filesize = $filemedreimindvi->getSize();
                                            $cocogen_epartner_claim_pa_uploads->location = $filemedreimindvi->store('epolicyquotationPA/'.$lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->save();
                                    }
                                }
                            }
                        $countmedreim = $countmedreim + 1;
                    }
                }
            }

            $countdisdea = 0;
            if($request->get('cb_dis_de')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $filedisdeat){
                        if($filedisdeat->category === "Disability / Death Claim"){
                            $lastInsertedIdfilePA = "";
                            $cocogen_epartner_claim_pa_uploads = new cocogen_epartner_claim_pa_uploads;
                            $cocogen_epartner_claim_pa_uploads->type = "Disability / Death Claim";
                            $cocogen_epartner_claim_pa_uploads->status = "N";
                            $cocogen_epartner_claim_pa_uploads->typename = $filedisdeat->upload_file_name;
                            $cocogen_epartner_claim_pa_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->save();
                            $lastInsertedIdfilePA = $cocogen_epartner_claim_pa_uploads->id;
                            if($lastInsertedIdfilePA){
                                if(isset($request->file('file_upload_pa_dis_death_claim')[$countdisdea])){
                                    foreach($request->file('file_upload_pa_dis_death_claim') as $keystock=>$filedisdeatindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::findorFail($lastInsertedIdfilePA);
                                            $cocogen_epartner_claim_pa_uploads->filename = $filedisdeatindvi->hashName();
                                            $cocogen_epartner_claim_pa_uploads->original_name = $filedisdeatindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_pa_uploads->status = "P";
                                            $cocogen_epartner_claim_pa_uploads->extension = $filedisdeatindvi->extension();
                                            $cocogen_epartner_claim_pa_uploads->filesize = $filedisdeatindvi->getSize();
                                            $cocogen_epartner_claim_pa_uploads->location = $filedisdeatindvi->store('epolicyquotationPA/'.$lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->save();
                                    }
                                }
                            }
                        $countdisdea = $countdisdea + 1;
                    }
                }
            }

            $countedassistance = 0;
            if($request->get('cb_educ_asst_claim')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $filedisdeat){
                        if($filedisdeat->category === "Educational Assistance Claim"){
                            $lastInsertedIdfilePA = "";
                            $cocogen_epartner_claim_pa_uploads = new cocogen_epartner_claim_pa_uploads;
                            $cocogen_epartner_claim_pa_uploads->type = "Educational Assistance Claim";
                            $cocogen_epartner_claim_pa_uploads->status = "N";
                            $cocogen_epartner_claim_pa_uploads->typename = $filedisdeat->upload_file_name;
                            $cocogen_epartner_claim_pa_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->save();
                            $lastInsertedIdfilePA = $cocogen_epartner_claim_pa_uploads->id;
                            if($lastInsertedIdfilePA){
                                if(isset($request->file('file_upload_pa_edu_asstnce')[$countedassistance])){
                                    foreach($request->file('file_upload_pa_edu_asstnce') as $keystock=>$filedisdeatindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::findorFail($lastInsertedIdfilePA);
                                            $cocogen_epartner_claim_pa_uploads->filename = $filedisdeatindvi->hashName();
                                            $cocogen_epartner_claim_pa_uploads->original_name = $filedisdeatindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_pa_uploads->status = "P";
                                            $cocogen_epartner_claim_pa_uploads->extension = $filedisdeatindvi->extension();
                                            $cocogen_epartner_claim_pa_uploads->filesize = $filedisdeatindvi->getSize();
                                            $cocogen_epartner_claim_pa_uploads->location = $filedisdeatindvi->store('epolicyquotationPA/'.$lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->save();
                                    }
                                }
                            }
                        $countedassistance = $countedassistance + 1;
                    }
                }
            }

            $countassstancebene = 0;
            if($request->get('cb_fire_asst_bene_claim')){
                    foreach($cocogen_epartnerhub_claim_upload_file as $fileasstancebene){
                        if($fileasstancebene->category === "Fire Assistance Benefit Claims"){
                            $lastInsertedIdfilePA = "";
                            $cocogen_epartner_claim_pa_uploads = new cocogen_epartner_claim_pa_uploads;
                            $cocogen_epartner_claim_pa_uploads->type = "Fire Assistance Benefit Claims";
                            $cocogen_epartner_claim_pa_uploads->status = "N";
                            $cocogen_epartner_claim_pa_uploads->typename = $fileasstancebene->upload_file_name;
                            $cocogen_epartner_claim_pa_uploads->TransID = $lastInsertedId;
                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                            $cocogen_epartner_claim_pa_uploads->save();
                            $lastInsertedIdfilePA = $cocogen_epartner_claim_pa_uploads->id;
                            if($lastInsertedIdfilePA){
                                if(isset($request->file('file_upload_pa_fire_asstance_bene')[$countassstancebene])){
                                    foreach($request->file('file_upload_pa_fire_asstance_bene') as $keystock=>$fileasstancebeneindvi){
                                            if($keystock === $lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::findorFail($lastInsertedIdfilePA);
                                            $cocogen_epartner_claim_pa_uploads->filename = $fileasstancebeneindvi->hashName();
                                            $cocogen_epartner_claim_pa_uploads->original_name = $fileasstancebeneindvi->getClientOriginalName();
                                            $cocogen_epartner_claim_pa_uploads->status = "P";
                                            $cocogen_epartner_claim_pa_uploads->extension = $fileasstancebeneindvi->extension();
                                            $cocogen_epartner_claim_pa_uploads->filesize = $fileasstancebeneindvi->getSize();
                                            $cocogen_epartner_claim_pa_uploads->location = $fileasstancebeneindvi->store('epolicyquotationPA/'.$lastInsertedId);
                                            $cocogen_epartner_claim_pa_uploads->updated_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->created_at = $datenow;
                                            $cocogen_epartner_claim_pa_uploads->save();
                                    }
                                }
                            }
                        $countassstancebene = $countassstancebene + 1;
                    }
                }
            }

            if($request->get('cb_med_expense_reim')){
                $cat_loss_reembsment = "Yes";
                $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::where('type', '=',"Medical Reimbursement")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_pa_uploads as $cocogen_epartner_claim_pa_upload){
                    $fileSec = sha1($cocogen_epartner_claim_pa_upload->id.":".$cocogen_epartner_claim_pa_upload->typename.":".$cocogen_epartner_claim_pa_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_pa_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_pa_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/pa/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_pa_upload->typename,
                        "ID" => $cocogen_epartner_claim_pa_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_pa_upload->original_name,
                        "line" => "PA",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_dis_de')){
                $cat_loss_death = "Yes";
                $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::where('type', '=',"Disability / Death Claim")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                foreach($cocogen_epartner_claim_pa_uploads as $cocogen_epartner_claim_pa_upload){
                    $fileSec = sha1($cocogen_epartner_claim_pa_upload->id.":".$cocogen_epartner_claim_pa_upload->typename.":".$cocogen_epartner_claim_pa_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_pa_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_pa_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/pa/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_pa_upload->typename,
                        "ID" => $cocogen_epartner_claim_pa_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_pa_upload->original_name,
                        "line" => "PA",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_educ_asst_claim')){
                $cat_loss_education_asst_claim = "Yes";
                $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::where('type', '=',"Educational Assistance Claim")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_pa_uploads as $cocogen_epartner_claim_pa_upload){
                    $fileSec = sha1($cocogen_epartner_claim_pa_upload->id.":".$cocogen_epartner_claim_pa_upload->typename.":".$cocogen_epartner_claim_pa_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_pa_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_pa_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/pa/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_pa_upload->typename,
                        "ID" => $cocogen_epartner_claim_pa_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_pa_upload->original_name,
                        "line" => "PA",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }
            if($request->get('cb_fire_asst_bene_claim')){
                $cat_loss_asstnce_bene_claim = "Yes";
                $cocogen_epartner_claim_pa_uploads = cocogen_epartner_claim_pa_uploads::where('type', '=',"Fire Assistance Benefit Claims")
                            ->where('TransID', '=',$TransID)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_pa_uploads as $cocogen_epartner_claim_pa_upload){
                    $fileSec = sha1($cocogen_epartner_claim_pa_upload->id.":".$cocogen_epartner_claim_pa_upload->typename.":".$cocogen_epartner_claim_pa_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_pa_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_pa_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/pa/claim/" .$fileSec ."/". $idbase;
                        $status = "P";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_pa_upload->typename,
                        "ID" => $cocogen_epartner_claim_pa_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_pa_upload->original_name,
                        "line" => "PA",
                        "status" => $status,
                        "Link" => $link
                    ));
                }
            }

            $policybtanch = explode("-", $request->get('policyNo_pa'));
            if(empty($policybtanch[2])){
                $policyBranch = "HO";
            }else{
                $policyBranch = $policybtanch[2];
            }
            
            
            $accident_happen = $request->get('pa_acc_happen');
            $created_by = $request->get('email_address_pa');
            $client = new Client();
              $res = $client->request('POST', 'http://claimsautomation.cocogen.com.ph/api/saveClaims', [
                'form_params' => [
                    'UID' => $userID,
                    'SecurityCode' => $SecurityCode,
                    'email' => $email,
                    'line' => $line,
                    'id' => $cocogen_api_users[0]["id"],
                    'TransID'=>$TransID ,
                    'policy'=> $policy ,
                    'branch_code'=>$policyBranch ,
                    'status'=> $claim_status ,
                    'date_of_loss'=> $date_of_loss ,
                    'time_loss'=> $time_loss ,
                    'location_of_loss'=> $location_of_loss ,
                    'province'=> $province ,
                    'municipality'=> $municipality ,
                    'barangay'=> $barangay ,
                    'contact_no'=> $contact_no ,
                    'email_address'=> $email_address ,
                    'claimnat_name_insured'=> $claimnat_name_insured ,
                    'date_loss_within_terms'=> $date_loss_within_terms ,
                    'premium_paid '=> $premium_paid  ,
                    'document_complete'=> $document_complete ,
                    'process_send_followup '=> $process_send_followup  ,
                    'checlklist_accomplished '=> $checlklist_accomplished  ,
                    'gross_amount'=> $gross_amount ,
                    'cat_loss_reembsment'=> $cat_loss_reembsment ,
                    'cat_loss_death'=> $cat_loss_death ,
                    'cat_loss_education_asst_claim'=> $cat_loss_education_asst_claim ,
                    'cat_loss_asstnce_bene_claim'=> $cat_loss_asstnce_bene_claim ,
                    'accident_happen'=> $accident_happen ,
                    'created_by'=> $created_by,
                    'fName'=> $request->get('pa_first_name_owner_out'),
                    'mName'=> $request->get('pa_middle_name_owner_out'),
                    'lName'=> $request->get('pa_last_name_owner_out'),
                    'dataupload' => $dataupload  
                ]
            ]);
            $dataraw = $res->getBody()->getContents();
            $datadecoded = json_decode($dataraw, true);
           
        }

        $status_message = "Success!";
        return back()->withInput()->with('message', $status_message);

    }

    public function propertyClaimsOpen(){
    
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active',
         '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_epartnerhub_claim_upload_file = cocogen_epartnerhub_claim_upload_file::all();

        $location = location::select('province')->distinct('province')->orderBy('province', 'asc')->get();
        $cocogen_fmv_brand = cocogen_getquote_mvtypes::groupBy('mvType')->orderBy('mvType','ASC')->get();
        $cocogen_fmv_year = DB::table('cocogen_fmv')->distinct()->select('year')->groupBy('year')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Claims Automation - Property")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   

        return view('epartnerhub.claims.property.outofepartnerhub.createclaimproperty_not_epartnerhub', ['title' => $title,
        'locations' => $location,
        'cocogen_admin_footer' => $cocogen_admin_footer,
        'cocogen_admin_productlink' => $cocogen_admin_productlink,
        'metadescription' => $metadescription,
        'keyword' => $keyword,
        'cocogen_fmv_brand' => $cocogen_fmv_brand,
        'cocogen_fmv_years' => $cocogen_fmv_year,
        'cocogen_epartnerhub_claim_upload_file' => $cocogen_epartnerhub_claim_upload_file,
        'cocogen_admin_main' => $cocogen_admin_main,
        'cocogen_admin_submain' => $cocogen_admin_submain,
        'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function propertyClaimsSave(Request $request)
    {
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        //dd($request);
        $cocogen_epartnerhub_property_claim_trans = new cocogen_epartnerhub_property_claim_trans;
        $cocogen_epartnerhub_property_claim_trans->policy = $request->get('policyNo_property');
        $cocogen_epartnerhub_property_claim_trans->status = "FOR REVIEW";
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
        $cocogen_epartnerhub_property_claim_trans->created_by = $request->get('email_address_property');
        $cocogen_epartnerhub_property_claim_trans->updated_at = $datenow;
        $cocogen_epartnerhub_property_claim_trans->created_at = $datenow;
        $cocogen_epartnerhub_property_claim_trans->save();

        $lastInsertedId = $cocogen_epartnerhub_property_claim_trans->id;

     
        $cocogen_epartnerhub_claim_upload_file = cocogen_epartnerhub_claim_upload_file::where('line', '=',"FI")->get();     
        $countbuilding = 0;
        $dataupload = array();
        if($request->get('cb_property_building')){
            if ($lastInsertedId) {
                foreach($cocogen_epartnerhub_claim_upload_file as $filebuiding){
                    if($filebuiding->category === "Building"){
                        $lastInsertedIdfile = "";
                        $cocogen_epartner_claim_property_uploads = new cocogen_epartner_claim_property_uploads;
                        $cocogen_epartner_claim_property_uploads->type = "Building";
                        $cocogen_epartner_claim_property_uploads->status = "N";
                        $cocogen_epartner_claim_property_uploads->typename = $filebuiding->upload_file_name;
                        $cocogen_epartner_claim_property_uploads->TransID = $lastInsertedId;
                        $cocogen_epartner_claim_property_uploads->updated_at = $datenow;
                        $cocogen_epartner_claim_property_uploads->created_at = $datenow;
                        $cocogen_epartner_claim_property_uploads->save();
                        $lastInsertedIdfile = $cocogen_epartner_claim_property_uploads->id;
                        if($lastInsertedIdfile){
                            if(isset($request->file('file_upload_property_building')[$countbuilding])){
                                foreach($request->file('file_upload_property_building') as $key=>$filebuidingindvi){
                                        if($key === $lastInsertedId);
                                        $cocogen_epartner_claim_property_uploads = cocogen_epartner_claim_property_uploads::findorFail($lastInsertedIdfile);
                                        $cocogen_epartner_claim_property_uploads->filename = $filebuidingindvi->hashName();
                                        $cocogen_epartner_claim_property_uploads->original_name = $filebuidingindvi->getClientOriginalName();
                                        $cocogen_epartner_claim_property_uploads->status = "P";
                                        $cocogen_epartner_claim_property_uploads->extension = $filebuidingindvi->extension();
                                        $cocogen_epartner_claim_property_uploads->filesize = $filebuidingindvi->getSize();
                                        $cocogen_epartner_claim_property_uploads->location = $filebuidingindvi->store('epolicyquotationProperty/'.$lastInsertedId);
                                        $cocogen_epartner_claim_property_uploads->updated_at = $datenow;
                                        $cocogen_epartner_claim_property_uploads->created_at = $datenow;
                                        $cocogen_epartner_claim_property_uploads->save();
                                }
                            }
                        }
                        $countbuilding = $countbuilding + 1;
                    }
                }

                $cocogen_epartner_claim_property_uploads = cocogen_epartner_claim_property_uploads::where('type', '=',"Building")
                            ->where('TransID', '=',$lastInsertedId)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_property_uploads as $cocogen_epartner_claim_property_upload){
                    $fileSec = sha1($cocogen_epartner_claim_property_upload->id.":".$cocogen_epartner_claim_property_upload->typename.":".$cocogen_epartner_claim_property_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_property_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_property_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/property/claim/" .$fileSec ."/". $idbase;
                        $status = "N";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_property_upload->typename,
                        "ID" => $cocogen_epartner_claim_property_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_property_upload->original_name,
                        "line" => "FI",
                        "Link" => $status,
                        "Link" => $link
                    ));
                }
            }
        }

        $countstock = 0;
        if($request->get('cb_property_stocl_building')){
            if ($lastInsertedId) {
                foreach($cocogen_epartnerhub_claim_upload_file as $filestock){
                    if($filestock->category === "Stocks and Building Content"){
                        $lastInsertedIdfile = "";
                        $cocogen_epartner_claim_property_uploads = new cocogen_epartner_claim_property_uploads;
                        $cocogen_epartner_claim_property_uploads->type = "Stocks and Building Content";
                        $cocogen_epartner_claim_property_uploads->status = "N";
                        $cocogen_epartner_claim_property_uploads->typename = $filestock->upload_file_name;
                        $cocogen_epartner_claim_property_uploads->TransID = $lastInsertedId;
                        $cocogen_epartner_claim_property_uploads->updated_at = $datenow;
                        $cocogen_epartner_claim_property_uploads->created_at = $datenow;
                        $cocogen_epartner_claim_property_uploads->save();
                        $lastInsertedIdfile = $cocogen_epartner_claim_property_uploads->id;
                        if($lastInsertedIdfile){
                            if(isset($request->file('file_upload_property_cstocks')[$countstock])){
                                foreach($request->file('file_upload_property_cstocks') as $keystock=>$filestockindvi){
                                        if($keystock === $lastInsertedId);
                                        $cocogen_epartner_claim_property_uploads = cocogen_epartner_claim_property_uploads::findorFail($lastInsertedIdfile);
                                        $cocogen_epartner_claim_property_uploads->filename = $filestockindvi->hashName();
                                        $cocogen_epartner_claim_property_uploads->original_name = $filestockindvi->getClientOriginalName();
                                        $cocogen_epartner_claim_property_uploads->status = "P";
                                        $cocogen_epartner_claim_property_uploads->extension = $filestockindvi->extension();
                                        $cocogen_epartner_claim_property_uploads->filesize = $filestockindvi->getSize();
                                        $cocogen_epartner_claim_property_uploads->location = $filestockindvi->store('epolicyquotationProperty/'.$lastInsertedId);
                                        $cocogen_epartner_claim_property_uploads->updated_at = $datenow;
                                        $cocogen_epartner_claim_property_uploads->created_at = $datenow;
                                        $cocogen_epartner_claim_property_uploads->save();
                                }
                            }
                        }
                        $countstock = $countstock + 1;
                    }
                }

                $cocogen_epartner_claim_property_uploads = cocogen_epartner_claim_property_uploads::where('type', '=',"Stocks and Building Content")
                            ->where('TransID', '=',$lastInsertedId)
                            ->get(); 
                
                foreach($cocogen_epartner_claim_property_uploads as $cocogen_epartner_claim_property_upload){
                    $fileSec = sha1($cocogen_epartner_claim_property_upload->id.":".$cocogen_epartner_claim_property_upload->typename.":".$cocogen_epartner_claim_property_upload->created_at);
                    $idbase = base64_encode($cocogen_epartner_claim_property_upload->id);
                    $link = "";
                    $status = "N";
                    if($cocogen_epartner_claim_property_upload->original_name){
                        $link = "https://www.cocogen.com/view/external/file/property/claim/" .$fileSec ."/". $idbase;
                        $status = "N";
                    }
                    array_push($dataupload, 
                    array(
                        "requiredDocs" => $cocogen_epartner_claim_property_upload->typename,
                        "ID" => $cocogen_epartner_claim_property_upload->TransID,
                        "Filename" => $cocogen_epartner_claim_property_upload->original_name,
                        "line" => "FI",
                        "Link" => $status,
                        "Link" => $link
                    ));
                }
            }
        }
        if($lastInsertedId){
            $userID = "testAPI";
            $cocogen_api_users = cocogen_api_users::where('name', $userID)->get();
            
            $email = "claims_admin@cocogen.com";
            $line = "FI";
            $SecurityCode = sha1($cocogen_api_users[0]["name"].":".$cocogen_api_users[0]["password"] .":".$cocogen_api_users[0]["password_key"].":".$email.":".$cocogen_api_users[0]["id"]);
            
            
            $accident_happen = $request->get('pa_acc_happen');
            $created_by = $request->get('email_address_property');

            $TransID = $lastInsertedId;
            $policy = $request->get('policyNo_property');
            $claim_status = "FOR REVIEW";
            $date_of_loss = date('Y-m-d', strtotime($request->get('Loss_date_property')));
            $time_loss = $request->get('Loss_time_property');
            $location_of_loss = $request->get('location_loss_property');
            $province = $request->get('permanent_province_property');
            $municipality =  $request->get('permanent_municipality_property');
            $barangay = $request->get('permanent_barangay_property');
            $contact_no = $request->get('contact_no_property');
            $email_address = $request->get('email_address_property');
            $claimant_same_insured = $request->get('hd_claim_property_same_insured');
            $loss_within_term = $request->get('hd_claim_property_within_inception');
            $risk_same_as_inured_policy  =  $request->get('hd_claim_property_risk_insured');
            $premium_paid = $request->get('hd_claim_property_prem_paid');
            $document_complete  = $request->get('hd_claim_property_morgagee');
            $damage_ralated_accident = $request->get('relate_accident_property');
            $mortgagee  = $request->get('morgaged_to_property');
            $gross_amount = str_replace(",", "", $request->get('gross_estimate_property'));
            $claim_recovery = $request->get('hd_claim_motor_property_recovery');
            $first_name = $request->get('property_first_name_owner');
            $middle_name = $request->get('property_middle_name_owner');
            $last_name = $request->get('property_last_name_owner');
            $accident_happen = $request->get('property_acc_happen');

            $cat_loss_building = "";
            $cat_loss_stock_building ="";

            if($request->get('cb_property_building')){
                $cat_loss_building = "Yes";
            }
    
            if($request->get('cb_property_stocl_building')){
                $cat_loss_stock_building = "Yes";
            }

            $policybtanch = explode("-", $request->get('policyNo_property'));
            if(empty($policybtanch[2])){
                $policyBranch = "HO";
            }else{
                $policyBranch = $policybtanch[2];
            }
            
            $client = new Client();
              $res = $client->request('POST', 'http://claimsautomation.cocogen.com.ph/api/saveClaims', [
                'form_params' => [
                    'UID' => $userID,
                    'SecurityCode' => $SecurityCode,
                    'email' => $email,
                    'line' => $line,
                    'id' => $cocogen_api_users[0]["id"],
                    'TransID' =>$TransID,
                    'branch_code'=>$policyBranch ,
                    'policy' => $policy,
                    'status' => $claim_status,
                    'date_of_loss' => $date_of_loss,
                    'time_loss' => $time_loss ,
                    'location_of_loss' => $location_of_loss,
                    'province' => $province,
                    'municipality' => $municipality,
                    'barangay' => $barangay,
                    'contact_no' => $contact_no,
                    'email_address' => $email_address,
                    'claimant_same_insured' => $claimant_same_insured,
                    'loss_within_term' => $loss_within_term,
                    'risk_same_as_inured_policy' => $risk_same_as_inured_policy ,
                    'premium_paid' => $premium_paid,
                    'document_complete' => $document_complete ,
                    'damage_ralated_accident ' => $damage_ralated_accident ,
                    'mortgagee' => $mortgagee,
                    'gross_amount' => $gross_amount,
                    'claim_recovery' => $claim_recovery,
                    'cat_loss_building' => $cat_loss_building,
                    'cat_loss_stock_building' => $cat_loss_stock_building,
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'accident_happen' => $accident_happen,
                    'created_by' => $created_by,
                    'dataupload' => $dataupload 
                ]
            ]);
            $dataraw = $res->getBody()->getContents();
            $datadecoded = json_decode($dataraw, true);
        }
      

        $status_message = "Success!";
        return back()->withInput()->with('message', $status_message);
    }

    public function downloadfilemotorstandalone($sec,$id)
    {
        $decoded = base64_decode($id);
        
        $datastandalone = cocogen_epartner_claim_motor_uploads::where('id', '=',$decoded)->get();
        $SecStandAlone = sha1($datastandalone[0]['id'].":".$datastandalone[0]['typename'] .":".$datastandalone[0]['created_at']);
        $file_path = "";
        if($sec === $SecStandAlone){
            $tnxid = $id;
            $s = "/";
            $s2 = substr($s, 0, 1);
            $file_path = storage_path('app') . $s2 .$datastandalone['0']['location'];
        }
        //dd($datastandalone,$SecStandAlone,$sec,$id, $file_path );
        $file_path = "/var/www/html/cocogen/storage/app/" . $datastandalone['0']['location'];
        return response()->file($file_path);
    }

    public function downloadfilepropertystandalone($sec,$id)
    {
        $decoded = base64_decode($id);
        
        $datastandalone = cocogen_epartner_claim_property_uploads::where('id', '=',$decoded)->get();
        $SecStandAlone = sha1($datastandalone[0]['id'].":".$datastandalone[0]['typename'] .":".$datastandalone[0]['created_at']);
        $file_path = "";
        if($sec === $SecStandAlone){
            $tnxid = $id;
            $s = "/";
            $s2 = substr($s, 0, 1);
            $file_path = storage_path('app') . $s2 .$datastandalone['0']['location'];
        }
        //dd($datastandalone,$SecStandAlone,$sec,$id, $file_path );
        $file_path = "/var/www/html/cocogen/storage/app/" . $datastandalone['0']['location'];
        return response()->file($file_path);
    }

    public function downloadfilepastandalone($sec,$id)
    {
        $decoded = base64_decode($id);
        
        $datastandalone = cocogen_epartner_claim_pa_uploads::where('id', '=',$decoded)->get();
        $SecStandAlone = sha1($datastandalone[0]['id'].":".$datastandalone[0]['typename'] .":".$datastandalone[0]['created_at']);
        $file_path = "";
        if($sec === $SecStandAlone){
            $tnxid = $id;
            $s = "/";
            $s2 = substr($s, 0, 1);
            $file_path = storage_path('app') . $s2 .$datastandalone['0']['location'];
        }
        //dd($datastandalone,$SecStandAlone,$sec,$id, $file_path );
        $file_path = "/var/www/html/cocogen/storage/app/" . $datastandalone['0']['location'];
        return response()->file($file_path);
    }
}
