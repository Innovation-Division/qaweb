<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_getquote_mvtypes;
use App\Models\cocogen_getquote_premium;
use App\Models\cocogen_compre_personalinfo_changeprimary;
use App\Models\province;
use App\Models\cocogen_fmv;
use App\Models\cocogen_brand_year;
use App\Models\cocogen_compre_bipd;
use App\Models\cocogen_compre_carinfo;
use App\Models\cocogen_compre_personalinfo;
use App\Models\cocogen_compre_addtlcarinfo;
use App\Models\cocogen_compre_carinfo_changeprimary;
use App\Models\cocogen_compre_accessory_trans;
use App\Models\cocogen_compre_accessory;
use App\Models\location_compre;
use App\Models\cocogen_meta;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_footer; 
use DB;
use Mail;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use App\Models\cocogen_compre_trans_uploads;
use App\Models\cocogen_itp_countries;
use App\Models\location;
use Carbon\Carbon;

class compre extends Controller
{
    public function compreonsave(Request $request){

        session()->flash('firstload',"2");
        if(session('grosspremwithAOM')){
            session()->flash('grosspremwithAOM',session('grosspremwithAOM'));
        }

        if(session('grossprem')){
            session()->flash('grossprem',session('grossprem'));
        }

        if($request->get('tabmax')){
                session()->flash('tabmax',$request->get('tabmax')); 
        }
          
        if($request->get('totalvalhid')){
                session()->flash('totalvalhid',$request->get('totalvalhid')); 
        }

        if(session('fullname')){
                session()->flash('fullname',$request->get('fullname')); 
        }

        if(session('Address')){
                session()->flash('Address',$request->get('Address')); 
        }

        if(session('contactNo')){
                session()->flash('contactNo',$request->get('contactNo')); 
        }

        if(session('email')){
                session()->flash('email',$request->get('email')); 
        }   
       
         
        if($request->get('tnxid')){
            session()->flash('tnxid',$request->get('tnxid'));
            session()->flash('grosspremwithAOM',str_replace(',', '', $request->get('premWithAOM'))); 
            session()->flash('grossprem',str_replace(',', '', $request->get('totalValue')));
            
            $cocogen_compre_carinfos = cocogen_compre_carinfo::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_compre_carinfo',$cocogen_compre_carinfos );

            $cocogen_compre_addtlcarinfo = cocogen_compre_addtlcarinfo::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_compre_addtlcarinfo',$cocogen_compre_addtlcarinfo );

            $cocogen_compre_personalinfo_changeprimary = cocogen_compre_personalinfo_changeprimary::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_compre_personalinfo',$cocogen_compre_personalinfo_changeprimary );
        }else{
           
        }
       

        if($request->get('ViewQuote') === "View Quote"){
            if(!session('tabmax') || session('tabmax') === null){               
                $rules = [
                        'bodilyInjury'=>'required', 
                        'propertyDamage' =>'required',  
                        'drpYear' =>'required', 
                        'brand' =>'required', 
                        'model' =>'required',
                        'firstName' => 'required|regex:/^[\pL\s\-]+$/u|max:255', 
                        'lastName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'middleName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'contactNo' => 'required',
                        'emailAddress' =>'required|email|max:255'

                    ];
                    $niceNames = [
                        'bodilyInjury'=>'bodily injury',
                        'propertyDamage'=>'property damage',   
                        'drpYear'=>'year', 
                        'brand'=>'brand',   
                        'model'=>'model',
                        'firstName' => 'first name',   
                        'lastName' => 'last name', 
                        'middleName' => 'middle name', 
                        'contactNo' => 'contact no.', 
                        'emailAddress' => 'email address' ,

                    ];              
                    $this->validate($request, $rules, [], $niceNames);

                    $promo = 0;
                    $promo_type = "";
                        if($request->get('promoCode')){
                            $data = DB::table('cocogen_promo')
                                    ->select('rate','amount','type')
                                    ->where('effectiveDate', '<', \DB::raw('NOW()'))
                                    ->where('expiryDate', '>', \DB::raw('NOW()'))
                                    ->where('transType',  "COMPRE")
                                    ->where('promo', $request->get('promoCode'))
                                    ->where('limit_usage','>', 0)
                                    ->get();                                    
                                    if(count($data) === 0){
                                        //session()->flash('promoCodeError',"Error");        
                                        return back()->withInput()->with('promoCodeError',"Incorrect promo code");
                                    }else{
                                        foreach ($data as $val) {
                                           $promo_type = $val->type;
                                           if($promo_type === "A"){
                                               $promo = $val->amount;                                                
                                           }else{                                            
                                               $promo = $val->rate;
                                           }
                                        }                                            
                                    }
                        }

                        $amountAcct = 0;
                        if($request->accessory){
                                $countsaccessory = $request->accessory;
                                $count = count($countsaccessory);                    
                                for($i = 0; $i < $count; $i++){
                                    if(!$request->accessoryValue[$i]){
                                        $accamounts = 0;
                                    }else{
                                        $accamounts = str_replace(',', '', $request->accessoryValue[$i]);
                                    }
                                        $amountAcct += $accamounts;
                                    }                           
                            }

                        $defaultValue = str_replace(',', '', $request->get('totalValue'));
                        $defaultValue = $defaultValue + $amountAcct;

                        $bodilyInjury = str_replace(',', '', $request->get('bodilyInjury'));
                        $bodilyInjuryPrem = cocogen_compre_bipd::where('amount', '=', $bodilyInjury)->get();

                        $propertyDamage = str_replace(',', '', $request->get('propertyDamage'));
                        $propertyDamagePrem = cocogen_compre_bipd::where('amount', '=', $propertyDamage)->get();
                        $deductible =  $defaultValue*0.005;
                        if($deductible < 2000){
                            $deductible = 2000;
                        }
                        $ODTheftPrem =  $defaultValue*0.0125;
                        $actsOfNaturePrem =  $defaultValue*0.005;
                        $netPrem = $propertyDamagePrem[0]['pd'] + $bodilyInjuryPrem[0]['bi'] + $ODTheftPrem;           


                        $dst = (ceil($netPrem/4)*0.5);
                        $vat = $netPrem*0.12;
                        $lgt = $netPrem*0.002;
                        $totaltax = $dst + $vat + $lgt;
                        $grossprem = $netPrem + $totaltax;
                        if($request->get('promoCode')){

                            if($promo_type === "A"){
                                $finalgrossprem =  $grossprem - $promo;                                             
                            }else{                    
                                $finalgrossprem =  $grossprem - ($grossprem * ($promo/100));
                            }


                        }else{
                            $finalgrossprem =  $grossprem;
                        }
                        $netPremwithAOM = $propertyDamagePrem[0]['pd'] + $bodilyInjuryPrem[0]['bi'] + $ODTheftPrem + $actsOfNaturePrem;

                        //with AOM
                        $deductible =  $defaultValue*0.005;
                        if($deductible < 2000){
                            $deductible = 2000;
                        }
                        $dstwithAOM =  (ceil($netPremwithAOM/4)*0.5);
                        $vatwithAOM = $netPremwithAOM*0.12;
                        $lgtwithAOM = $netPremwithAOM*0.002;
                        $totaltaxwithAOM = $dstwithAOM + $vatwithAOM + $lgtwithAOM;
                        $grosspremwithAOM = $netPremwithAOM + $totaltaxwithAOM;
                        if($request->get('promoCode')){
                            if($promo_type === "A"){
                                $finalgrosspremwithAOM =  $grosspremwithAOM - $promo;                                          
                            }else{                    
                                $finalgrosspremwithAOM =  $grosspremwithAOM - ($grosspremwithAOM * ($promo/100));
                            }
                        }else{
                            $finalgrosspremwithAOM =  $grosspremwithAOM;
                        }                       

                        session()->flash('grosspremwithAOM',str_replace(',', '', $grosspremwithAOM) );
                        session()->flash('grossprem',str_replace(',', '', $grossprem) );

                        $cocogen_compre_carinfo = new cocogen_compre_carinfo;
                        $cocogen_compre_carinfo->year = $request->get('drpYear');
                        $cocogen_compre_carinfo->brand = $request->get('brand');
                        $cocogen_compre_carinfo->model = $request->get('model');
                        $cocogen_compre_carinfo->default_value =  $defaultValue;
                        $cocogen_compre_carinfo->propertyDamage = str_replace(',', '', $request->get('propertyDamage'));
                        $cocogen_compre_carinfo->propertyDamagePrem = $propertyDamagePrem[0]['pd'];
                        $cocogen_compre_carinfo->bodilyInjury = str_replace(',', '', $request->get('bodilyInjury'));
                        $cocogen_compre_carinfo->bodilyInjuryPrem = $bodilyInjuryPrem[0]['bi'];
                        if($request->get('promoCode')){
                            $cocogen_compre_carinfo->promoCode  = $request->get('promoCode'); 
                            $cocogen_compre_carinfo->promoRate  = $promo;
                            $cocogen_compre_carinfo->promoType  = $promo_type;
                        }  
                        $cocogen_compre_carinfo->ODTheft  = $defaultValue;  
                        $cocogen_compre_carinfo->ODTheftPrem  = $ODTheftPrem;       
                        $cocogen_compre_carinfo->actsOfNature = $defaultValue;
                        $cocogen_compre_carinfo->actsOfNaturePrem  = $actsOfNaturePrem;
                        $cocogen_compre_carinfo->netPrem  = $netPrem;
                        $cocogen_compre_carinfo->netPremwithAOM  = $netPremwithAOM;
                        $cocogen_compre_carinfo->dst = $dst;
                        $cocogen_compre_carinfo->deductible = $deductible;
                        $cocogen_compre_carinfo->dstWithAOM  = $dstwithAOM;
                        $cocogen_compre_carinfo->vat = $vat;
                        $cocogen_compre_carinfo->vatWithAOM = $vatwithAOM;
                        $cocogen_compre_carinfo->lgt = $lgt;
                        $cocogen_compre_carinfo->lgtWithAOM  = $lgtwithAOM;
                        $cocogen_compre_carinfo->totalTax  = $totaltax;
                        $cocogen_compre_carinfo->totaltaxwithAOM  = $totaltaxwithAOM;
                        $cocogen_compre_carinfo->grossPrem  = $grossprem;  
                        $cocogen_compre_carinfo->grossPremWithAOM  = $grosspremwithAOM;
                        $cocogen_compre_carinfo->finalDue  = $finalgrossprem;  
                        $cocogen_compre_carinfo->finalDueWithAOM  = $finalgrosspremwithAOM;
                        $cocogen_compre_carinfo->fmvValue  = $request->get('totalvalhid');
                        $cocogen_compre_carinfo->save();

                        $inserted_id = $cocogen_compre_carinfo->id;

                                //update txnid
                            $cocogen_compre_carinfo_tnxid = cocogen_compre_carinfo::findorFail($inserted_id);
                            $cocogen_compre_carinfo_tnxid->tnxid = "MC-MNCN-COMPRE-". date('y') . "-". $inserted_id . "-00" ;
                            $cocogen_compre_carinfo_tnxid->save();


                            $cocogen_compre_personalinfo = new cocogen_compre_personalinfo;
                            $cocogen_compre_personalinfo->firstName = $request->get('firstName');
                            $cocogen_compre_personalinfo->lastName = $request->get('lastName');
                            $cocogen_compre_personalinfo->tnxid = "MC-MNCN-COMPRE-". date('y') . "-". $inserted_id . "-00" ;
                            $cocogen_compre_personalinfo->middleName = $request->get('middleName');
                            $cocogen_compre_personalinfo->contactNo = $request->get('contactNo');
                            $cocogen_compre_personalinfo->emailAddress = $request->get('emailAddress');
                            $cocogen_compre_personalinfo->save();  

                            if($request->accessory){
                                $countsaccessory = $request->accessory;
                                $count = count($countsaccessory);
                                $amountAcct = 0;
                                $accamounts = 0;
                                for($i = 0; $i < $count; $i++){

                                    if(!$request->accessoryValue[$i]){
                                        $accamounts = 0;
                                    }else{
                                        $accamounts += str_replace(',', '', $request->accessoryValue[$i]);
                                    }
                                    if($request->accessory[$i]){
                                        // if($request->accessory[$i] === "Others"){
                                        //     $accessoryfinal = $request->otherAccessory[$i];
                                        // }else{
                                             $accessoryfinal = $request->accessory[$i];
                                        //}
                                    }
                                    $cocogen_compre_accessory_trans = new cocogen_compre_accessory_trans;
                                    $cocogen_compre_accessory_trans->tnxid = "MC-MNCN-COMPRE-". date('y') . "-". $inserted_id . "-00";
                                    $cocogen_compre_accessory_trans->accessory =$accessoryfinal;
                                    $cocogen_compre_accessory_trans->amount = $accamounts;
                                    $cocogen_compre_accessory_trans->save();
                                    //$amountAcct += $accamounts;
                                    }                           
                            }
                         
                        session()->flash('tnxid', "MC-MNCN-COMPRE-". date('y') . "-". $inserted_id . "-00");
                        $cocogen_compre_carinfos = cocogen_compre_carinfo::where('id', '=', $inserted_id)->get();
                        session()->flash('cocogen_compre_carinfo',$cocogen_compre_carinfos );   
                        session()->flash('tabmax',2);   
           
            }
                     
            
            $tab = "tab2viewquote";             
            return back()->withInput()->with('tab',$tab);  
        }

        if($request->get('ViewQuoteBack') === "Back"){            
            
            $tab = "tab2viewQuoteBack";             
            return back()->withInput()->with('tab',$tab);  
        }
        if($request->get('ViewQUoteNext') === "Next"){
           
            session()->flash('tabmax',3); 
            if($request->get('premWithAOM') != 1 && $request->get('premWithOutAOM') != 1){  
                session()->flash('tab',"tab2viewquote");  
                $message = "Please select your Insurance Plan";
                return back()->withInput()->with('message',$message);
            }

            if($request->get('chckquote_agree') != 1){  
                session()->flash('tab',"tab2viewquote");  
                $message = "Please acknowledge that you have read and understood your coverages.";
                return back()->withInput()->with('message',$message);
            }
            if($request->get('premWithAOM')){
                $reqtype = "1";
            }else{
                $reqtype = "0";
            }
                $cocogen_compre_carinfo_changeprimary = cocogen_compre_carinfo_changeprimary::findorFail($request->get('tnxid'));
                $cocogen_compre_carinfo_changeprimary->reqType =   $reqtype;
                $cocogen_compre_carinfo_changeprimary->save();

                $cocogen_compre_personalinfo_changeprimary = cocogen_compre_personalinfo_changeprimary::where('tnxid', '=', $request->get('tnxid'))->get();
                session()->flash('cocogen_compre_personalinfo',$cocogen_compre_personalinfo_changeprimary );
            $tab = "tab2additinalInfo";             
            return back()->withInput()->with('tab',$tab);  
        }

        if($request->get('CompreSecondTabBack') === "Back"){

            $tab = "tab2viewquote";             
            return back()->withInput()->with('tab',$tab);  
        }

        if($request->get('CompreSecondTabNext') === "Next"){

            session()->flash('tnxid',$request->get('tnxid'));
          
            if(session('tabmax') <= 3){
            
             if(empty($request->get('with_agent'))){
                 $rules = [
                    'plateNo'=>'required', 
                    'engineNO' =>'required',  
                    'bodyType' =>'required', 
                    'Color' =>'required', 
                    'chassisNo' =>'required',  
                    'seatNo' =>'required'                            
                    ];
                
                $niceNames = [
                    'plateNo'=>'plate no',
                    'engineNO'=>'engine no',   
                    'bodyType'=>'body type', 
                    'Color'=>'color',   
                    'chassisNo'=>'chassis no', 
                    'seatNo'=>'authorized seating capacity'                     
                    ]; 
             }
                         

            if($request->get('with_agent') === 'yes'){
                $rules = [
                    'plateNo'=>'required', 
                    'engineNO' =>'required',  
                    'bodyType' =>'required', 
                    'Color' =>'required', 
                    'chassisNo' =>'required',  
                    'seatNo' =>'required',
                    'agentName'=>'required', 
                    'agentNo' =>'required'                            
                    ];
                
                $niceNames = [
                    'plateNo'=>'plate no.',
                    'engineNO'=>'engine no.',   
                    'bodyType'=>'body type', 
                    'Color'=>'color',   
                    'chassisNo'=>'chassis no.', 
                    'seatNo'=>'authorized seating capacity',
                    'agentName'=>'Agent Name',
                    'agentNo'=>'Agent no'                       
                    ];                 
            }else{
                $rules = [
                    'plateNo'=>'required', 
                    'engineNO' =>'required',  
                    'bodyType' =>'required', 
                    'Color' =>'required', 
                    'chassisNo' =>'required',  
                    'seatNo' =>'required'                            
                    ];
                
                $niceNames = [
                    'plateNo'=>'plate no.',
                    'engineNO'=>'engine no.',   
                    'bodyType'=>'body type', 
                    'Color'=>'color',   
                    'chassisNo'=>'chassis no.', 
                    'seatNo'=>'authorized seating capacity'                     
                    ];     
            }

           

            $this->validate($request, $rules, [], $niceNames);
            if(empty($request->get('with_agent'))){  
                    session()->flash('tab',"tab2additinalInfo");  
                    $message = "Please select agent option";
                    return back()->withInput()->with('message',$message);
            } 
                $cocogen_compre_addtlcarinfo = new cocogen_compre_addtlcarinfo;
                $cocogen_compre_addtlcarinfo->tnxid = $request->get('tnxid');
                $cocogen_compre_addtlcarinfo->mvFileNo = $request->get('mvFIleNo');
                $cocogen_compre_addtlcarinfo->plateNo = $request->get('plateNo');
                $cocogen_compre_addtlcarinfo->engineNo = $request->get('engineNO');
                $cocogen_compre_addtlcarinfo->bodyType = $request->get('bodyType');
                $cocogen_compre_addtlcarinfo->color = $request->get('Color');
                $cocogen_compre_addtlcarinfo->chassisNo = $request->get('chassisNo');
                $cocogen_compre_addtlcarinfo->seatingNo = $request->get('seatNo');
                $cocogen_compre_addtlcarinfo->mortgagee = $request->get('mortgagee');
                $cocogen_compre_addtlcarinfo->agentName = $request->get('agentName');
                $cocogen_compre_addtlcarinfo->agentNo = $request->get('agentNo');
                if($request->get('policyPeriod')){
                    $cocogen_compre_addtlcarinfo->inceptDate = $request->get('policyPeriod');
                }                
                $cocogen_compre_addtlcarinfo->save();
                $inserted_id = $cocogen_compre_addtlcarinfo->id;

                $autoPA = (55000 * $request->get('seatNo'));
                $cocogen_compre_carinfo_changeprimary = cocogen_compre_carinfo_changeprimary::findorFail($request->get('tnxid'));
                $cocogen_compre_carinfo_changeprimary->autoPA  = $autoPA;
                $cocogen_compre_carinfo_changeprimary->save();

               
                $cocogen_compre_addtlcarinfos = cocogen_compre_addtlcarinfo::where('id', '=', $inserted_id)->get();
                session()->flash('cocogen_compre_carinfo',$cocogen_compre_addtlcarinfos );
                session()->flash('tabmax',4); 
            }
             


            $tab = "tab3PersonalInfo";             
            return back()->withInput()->with('tab',$tab);  
        }        

        if($request->get('CompreThirdTabBack') === "Back"){
            $tab = "CompreThirdTabBack";             
            return back()->withInput()->with('tab',$tab);  
        }

        if($request->get('CompreThirdTabNext') === "Next"){
            if(session('tabmax') <= 4){
                $rules = [                      
                        'gender_personal_info' => 'required',  
                        'status_other_personal_info' => 'required',  
                        'place_of_birth_other_personal_info' => 'required',  
                        'SouceOfFunds' => 'required',  
                        'residence_address' => 'required', 
                        'residence_province' => 'required',
                        'residence_municipality' => 'required',
                        'residence_barangay' => 'required',
                        'mailing_address' => 'required',
                        'mailing_province' => 'required',
                        'mailing_municipality' => 'required',
                        'mailing_barangay' => 'required',
                        'nationality_other_personal_info' => 'required',
                        'occupation' => 'required',
                        'telNo' => 'required',
                        'type_of_id_personal_info' => 'required',
                        'idno_other_personal_info' => 'required',   
                        'birthDate' => 'required|date_format:m/d/Y|before:-18 years',  
                ];
                $niceNames = [                      
                        'gender_personal_info' => 'gender',  
                        'birthDate' => 'date of birth',  
                        'place_of_birth_other_personal_info' => 'place of birth',  
                        'status_other_personal_info' => 'status',  
                        'residence_address' => 'present address', 
                        'residence_province' => 'present province',
                        'residence_municipality' => 'present municipality',
                        'residence_barangay' => 'present barangay',
                        'mailing_address' => 'permanent address',
                        'mailing_province' => 'permanent province',
                        'mailing_municipality' => 'permanent municipality',
                        'mailing_barangay' => 'permanent barangay',
                        'nationality_other_personal_info' => 'nationality',
                        'occupation' => 'occupation',
                        'SouceOfFunds' => 'source of funds',
                        'telNo' => 'telephone number',
                        'type_of_id_personal_info' => 'type of ID',
                        'idno_other_personal_info' => 'ID number',                                 
                ];                 

                $bdatenewformat = date('Y-m-d', strtotime($request->get('birthDate')));


                $this->validate($request, $rules, [], $niceNames);

                $cocogen_compre_personalinfo_changeprimary = cocogen_compre_personalinfo_changeprimary::findorFail($request->get('tnxid'));
                $cocogen_compre_personalinfo_changeprimary->birthDate = $bdatenewformat;// "2003-09-09";
                $cocogen_compre_personalinfo_changeprimary->gender = $request->get('gender_personal_info');
                $cocogen_compre_personalinfo_changeprimary->palceofbirth = $request->get('place_of_birth_other_personal_info');
                $cocogen_compre_personalinfo_changeprimary->sourceoffunds = $request->get('SouceOfFunds');
                $cocogen_compre_personalinfo_changeprimary->status = $request->get('status_other_personal_info');
                $cocogen_compre_personalinfo_changeprimary->residence_address = $request->get('residence_address');
                $cocogen_compre_personalinfo_changeprimary->residence_province = $request->get('residence_province');
                $cocogen_compre_personalinfo_changeprimary->residence_municipality = $request->get('residence_municipality');
                $cocogen_compre_personalinfo_changeprimary->residence_barangay = $request->get('residence_barangay');
                $cocogen_compre_personalinfo_changeprimary->mailing_address = $request->get('mailing_address');
                $cocogen_compre_personalinfo_changeprimary->mailing_province = $request->get('mailing_province');
                $cocogen_compre_personalinfo_changeprimary->mailing_municipality = $request->get('mailing_municipality');
                $cocogen_compre_personalinfo_changeprimary->mailing_barangay = $request->get('mailing_barangay');
                $cocogen_compre_personalinfo_changeprimary->nationality = $request->get('nationality_other_personal_info');
                $cocogen_compre_personalinfo_changeprimary->occupation = $request->get('occupation');
                $cocogen_compre_personalinfo_changeprimary->telno = $request->get('telNo');
                $cocogen_compre_personalinfo_changeprimary->typeofid = $request->get('type_of_id_personal_info');
                $cocogen_compre_personalinfo_changeprimary->idno = $request->get('idno_other_personal_info');
                $cocogen_compre_personalinfo_changeprimary->save();  


                
                        if($request->file('file')){
                            if ($request->file('file')->isValid()) { 
                                $cocogen_compre_trans_uploads = new cocogen_compre_trans_uploads;
                                $cocogen_compre_trans_uploads->filename = $request->file('file')->hashName();
                                $cocogen_compre_trans_uploads->extension = $request->file('file')->extension();
                                $cocogen_compre_trans_uploads->filesize = $request->file('file')->getSize();
                                $cocogen_compre_trans_uploads->location = $request->file('file')->store('compreID');
                                $cocogen_compre_trans_uploads->TransID = $request->get('tnxid');
                                $cocogen_compre_trans_uploads->save();              
                            }
                        }
                $fullname = $request->get('firstName') . " " .  $request->get('middleName') . " " .  $request->get('lastName');
                session()->flash('Address',$request->get('residence_address'));
                session()->flash('tabmax',5); 
            }

            $tab = "CompreThirdTabNext";             
            return back()->withInput()->with('tab',$tab);  
        }

        if($request->get('ComprefourthTabBack') === "Back"){
            $tab = "ComprefourthTabBack";             
            return back()->withInput()->with('tab',$tab);  
        }

        if($request->get('ComprefourthTabBuy') === "Buy"){
                     
                    if($request->get('CBPrivacy') != 1){  
                        session()->flash('tab',"CompreThirdTabNext");
                        $message = "Please accept our Privacy Policy before proceeding to payment.";
                        return back()->withInput()->with('message',$message);
                    }

                    if($request->get('CBTerms') != 1){
                        session()->flash('tab',"CompreThirdTabNext");
                        $message = "Please accept our Terms & Conditions before proceeding to payment.";
                        return back()->withInput()->with('message',$message);
                    }

                    if($request->get('CBExclusion') != 1){
                        session()->flash('tab',"CompreThirdTabNext");
                        $message = "Please accept our Exclusion & Limitations before proceeding to payment.";
                        return back()->withInput()->with('message',$message);
                    }

                    if($cocogen_compre_carinfos[0]['reqType'] === "1"){
                        $totamount = $cocogen_compre_carinfos[0]['finalDueWithAOM'];
                    }else{
                        $totamount = $cocogen_compre_carinfos[0]['finalDue'];
                    }
                    
                    $magilasdonation = 0;
                    if($request->get('CBMagilas')){
                        if($request->get('drpMagilas') === "Others"){
                            if($request->get('otherMagilas')){
                                $magilasdonation = str_replace(',', '', $request->get('otherMagilas'));
                            }
                        }else{
                                $magilasdonation = $request->get('drpMagilas');
                        }
                    }

                    $cocogen_compre_carinfo_changeprimary = cocogen_compre_carinfo_changeprimary::findorFail($request->get('tnxid'));
                    $cocogen_compre_carinfo_changeprimary->finalDue  = $cocogen_compre_carinfos[0]['finalDue'] + $magilasdonation;
                    $cocogen_compre_carinfo_changeprimary->finalDueWithAOM  = $cocogen_compre_carinfos[0]['finalDueWithAOM'] + $magilasdonation;
                    $cocogen_compre_carinfo_changeprimary->magilasDonation  = $magilasdonation;
                    $cocogen_compre_carinfo_changeprimary->save();


                    $full_name = $request->get('firstName') . " " . $request->get('middleName')  . " " . $request->get('lastName');
                    $parameters = [
                                    'txnid' => $request->get('tnxid'), # Varchar(40) A unique id identifying this specific transaction from the merchant site
                                    'amount' => $totamount + $magilasdonation, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                                    'ccy' => 'PHP', # Char(3) The currency of the amount
                                    'description' => $request->get('tnxid'), # Varchar(128) A brief description of what the payment is for
                                    'email' => $request->get('emailAddress'), # Varchar(40) email address of customer
                                    'param1' => $full_name, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                                    'param2' => "", # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
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
    }

    public function getquotecompre(){

        // $digest = sha1("petnet:d46f87fe1sds4513a:renepaciente@gmail.com:Tr-1620017521");//.$cocogen_api_users[0]['password'] .":".$request->get('CEmail').":".$request->get('TTransNum'));
        // dd($digest);
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Motor Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   
        if(session('firstload')){
            
        }else{
            session()->flash('firstload',"1");
        }        
        $mvtypes = cocogen_getquote_mvtypes::get();
        $accessory = cocogen_compre_accessory::get();
        $province = province::get();
        $location = location_compre::get();
        $cocogen_fmv = cocogen_fmv::get();
        $cocogen_brand_year = cocogen_brand_year::get();
        $cocogen_fmv_year = DB::table('cocogen_fmv')->distinct()->select('year')->groupBy('year')->get();
        $premiums = cocogen_getquote_premium::get();
        $cocogen_compre_bipd = cocogen_compre_bipd::get(); 
        return view('getaquote.motor.compre.quote', ['title' => $title,'mvtypes' => $mvtypes,'provinces' => $province,'cocogen_fmv_years' => $cocogen_fmv_year,'cocogen_fmvs' => $cocogen_fmv,'locations' => $location,'cocogen_compre_bipds' => $cocogen_compre_bipd,'accessories' => $accessory,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function compreonsuccess(Request $request){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Success | COCOGEN | General Insurance"; 
        $metadescription = "";
        $keyword = "";

        $carInfo = DB::table('cocogen_compre_carinfo')->where('tnxid', session('tnxid'))->first();

        if(session('tnxid')) {

            return view('getaquote.new.compre.success', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'carInfo' => $carInfo]);
        } else {
            return redirect('/get-quote');
        }
    }

    public function compreonfailed(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Failed | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('getaquote.motor.compre.failed', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function onlinepaymentonpending(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $title = "Pending | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('services.pending', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function emailsendcompre($fname, $email, $content) {
            $data = array('fname'=>$fname, 'email'=>$email,'content'=>$content);
            Mail::send('emailtemplate.compreexternal', $data, function($message) use ($fname, $email,$content)
              {
                $message->to($email, 'COCOGEN')->subject($fname.', here is your Motor Excel Plus Insurance Policy')->from('client_services@cocogen.com', 'COCOGEN');
              });
    }

    public function emailsendcompreinternal($fname, $email,$contactNo,$dtnow,$URllink) {
            $data = array('fname'=>$fname, 'email'=>$email, 'contactNo'=>$contactNo,'dtnow'=>$dtnow,'URllink'=>$URllink);
            Mail::send('emailtemplate.compreinternal', $data, function($message) use ($fname, $email,$contactNo,$dtnow,$URllink)
              {
                $message->to('client_services@cocogen.com', 'COCOGEN')->subject('Successful Motor Excel Plus transaction: '. $fname);
              });
    }

    public function getquotecomprenew($id = null)
    {

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Motor Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   

        $mvtypes = cocogen_getquote_mvtypes::get();
        $accessory = cocogen_compre_accessory::get();
        $province = province::get();
        $location = location_compre::get();
        $brands = DB::table('cocogen_fmv')->distinct()->select('brand')->groupBy('brand')->get();
        $cocogen_compre_bipd = cocogen_compre_bipd::get(); 

        if($id) {
            $personalInfo = DB::table('cocogen_compre_personalinfo')->where('transNo', $id)->first();
            $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $id)->first();
            $accessories_trans = DB::table('cocogen_compre_accessory_trans')->where('transNo', $id)->get();
            $trans_no = $id;
            return view('getaquote.new.compre.edit-first-page', ['title' => $title,'mvtypes' => $mvtypes,'provinces' => $province,'brands' => $brands,'locations' => $location,'cocogen_compre_bipds' => $cocogen_compre_bipd,'accessories' => $accessory,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'trans_no' =>$trans_no, 'personalInfo' => $personalInfo, 'carInfo' => $carInfo, 'accessories_trans' => $accessories_trans]);
        } else {
            $trans_no = date('YmdHis');
            return view('getaquote.new.compre.first-page', ['title' => $title,'mvtypes' => $mvtypes,'provinces' => $province,'brands' => $brands,'locations' => $location,'cocogen_compre_bipds' => $cocogen_compre_bipd,'accessories' => $accessory,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'trans_no' =>$trans_no]);
        }
    }

    public function carInformation(Request $request){

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Motor Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   

        // dd($request->transNo);
        // dd($request->page);

        if($request->page === 'firstPage') {
            $transaction = 'save';
            $promo = 0;
            $promo_type = "";
            if($request->promoCode) {
                $data = DB::table('cocogen_promo')
                ->where('promo', $request->promoCode)
                ->where('transType', 'COMPRE')
                ->where('effectiveDate', '<', Carbon::now())
                ->where('expiryDate', '>', Carbon::now())
                ->where('limit_usage', '>', 0)
                ->first();

                $promo_type = $data->type;

                if ($promo_type === "A") {
                    $promo = $data->amount;
                } else {
                    $promo = $data->rate;
                }
            }

            $amountAcct = 0;
            if ($request->accessory) {
                $countsaccessory = $request->accessory;
                $count = count($countsaccessory);
                for ($i = 0; $i < $count; $i++) {
                    if (!$request->accessory_value[$i]) {
                        $accamounts = 0;
                    } else {
                        $accamounts = str_replace(',', '', $request->accessory_value[$i]);
                        $accamounts = substr($accamounts, 1);
                    }
                    $amountAcct += $accamounts;
                }
            }

            $defaultValue = str_replace(',', '', $request->total_value);
            $defaultValue = $defaultValue + $amountAcct;

       
            $bodilyInjuryPrem = cocogen_compre_bipd::where('amount', '=', str_replace(',', '', $request->bi))->first();

            $propertyDamagePrem = cocogen_compre_bipd::where('amount', '=', str_replace(',', '', $request->pd))->first();

            $deductible =  $defaultValue * 0.005;
            if ($deductible < 2000) {
                $deductible = 2000;
            }
            $ODTheftPrem =  $defaultValue * 0.0125;
            $actsOfNaturePrem =  $defaultValue * 0.005;
            if($request->buttonGuardValue === 'no') {
                $netPrem = $propertyDamagePrem->pd + $bodilyInjuryPrem->bi + $ODTheftPrem;
            } else {
                $netPrem = $propertyDamagePrem->pd + $bodilyInjuryPrem->bi + $ODTheftPrem + 1250;
            }

            $dst = (ceil($netPrem / 4) * 0.5);
            $vat = $netPrem * 0.12;
            $lgt = $netPrem * 0.002;
            $totaltax = $dst + $vat + $lgt;
            $grossprem = $netPrem + $totaltax;

            if ($request->promoCode) {

                if ($promo_type === "A") {
                    $finalgrossprem =  $grossprem - $promo;
                } else {
                    $finalgrossprem =  $grossprem - ($grossprem * ($promo / 100));
                }
            } else {
                $finalgrossprem =  $grossprem;
            }

            if($request->buttonGuardValue === 'no') {
                $netPremwithAOM = $propertyDamagePrem->pd + $bodilyInjuryPrem->bi + $ODTheftPrem + $actsOfNaturePrem;
            } else {
                $netPremwithAOM = $propertyDamagePrem->pd + $bodilyInjuryPrem->bi + $ODTheftPrem + $actsOfNaturePrem + 1250;
            }

            $deductible =  $defaultValue * 0.005;
            if ($deductible < 2000) {
                $deductible = 2000;
            }
            $dstwithAOM =  (ceil($netPremwithAOM / 4) * 0.5);
            $vatwithAOM = $netPremwithAOM * 0.12;
            $lgtwithAOM = $netPremwithAOM * 0.002;
            $totaltaxwithAOM = $dstwithAOM + $vatwithAOM + $lgtwithAOM;
            $grosspremwithAOM = $netPremwithAOM + $totaltaxwithAOM;

            if ($request->promoCode) {
                if ($promo_type === "A") {
                    $finalgrosspremwithAOM =  $grosspremwithAOM - $promo;
                } else {
                    $finalgrosspremwithAOM =  $grosspremwithAOM - ($grosspremwithAOM * ($promo / 100));
                }
            } else {
                $finalgrosspremwithAOM =  $grosspremwithAOM;
            }
            
            $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();

            if(!$carInfo) {
                $cocogen_compre_carinfo = new cocogen_compre_carinfo;
                $cocogen_compre_carinfo->transNo = $request->transNo;
                $cocogen_compre_carinfo->brand = $request->brand;
                $cocogen_compre_carinfo->model = $request->model;
                $cocogen_compre_carinfo->year = $request->year;
                $cocogen_compre_carinfo->default_value =  $defaultValue;
                $cocogen_compre_carinfo->propertyDamage = str_replace(',', '', $request->pd);
                $cocogen_compre_carinfo->propertyDamagePrem = $propertyDamagePrem->pd;
                $cocogen_compre_carinfo->bodilyInjury = str_replace(',', '', $request->bi);
                $cocogen_compre_carinfo->bodilyInjuryPrem = $bodilyInjuryPrem->bi;
                        
                if ($request->promoCode) {
                    $cocogen_compre_carinfo->promoCode  = $request->promoCode;
                    $cocogen_compre_carinfo->promoRate  = $promo;
                    $cocogen_compre_carinfo->promoType  = $promo_type;
                }
                $cocogen_compre_carinfo->ODTheft  = $defaultValue;
                $cocogen_compre_carinfo->ODTheftPrem  = $ODTheftPrem;
                $cocogen_compre_carinfo->actsOfNature = $defaultValue;
                $cocogen_compre_carinfo->actsOfNaturePrem  = $actsOfNaturePrem;
                $cocogen_compre_carinfo->netPrem  = $netPrem;
                $cocogen_compre_carinfo->netPremwithAOM  = $netPremwithAOM;
                $cocogen_compre_carinfo->dst = $dst;
                $cocogen_compre_carinfo->deductible = $deductible;
                $cocogen_compre_carinfo->dstWithAOM  = $dstwithAOM;
                $cocogen_compre_carinfo->vat = $vat;
                $cocogen_compre_carinfo->vatWithAOM = $vatwithAOM;
                $cocogen_compre_carinfo->lgt = $lgt;
                $cocogen_compre_carinfo->lgtWithAOM  = $lgtwithAOM;
                $cocogen_compre_carinfo->totalTax  = $totaltax;
                $cocogen_compre_carinfo->totaltaxwithAOM  = $totaltaxwithAOM;
                $cocogen_compre_carinfo->grossPrem  = $grossprem;
                $cocogen_compre_carinfo->grossPremWithAOM  = $grosspremwithAOM;
                $cocogen_compre_carinfo->finalDue  = $finalgrossprem;
                $cocogen_compre_carinfo->finalDueWithAOM  = $finalgrosspremwithAOM;
                $cocogen_compre_carinfo->fmvValue  = $request->default_value;
                $cocogen_compre_carinfo->isWithTotalGuard = $request->buttonGuardValue;
                $cocogen_compre_carinfo->save();


                $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();

                $tnxid = "MC-MNCN-COMPRE-" . date('y') . "-" . $carInfo->id . "-00";

                $cocogen_compre_carinfo = cocogen_compre_carinfo::findorFail($carInfo->id);
                $cocogen_compre_carinfo->tnxid = $tnxid;
                $cocogen_compre_carinfo->save();
            } else {
                $cocogen_compre_carinfo = cocogen_compre_carinfo::findorFail($carInfo->id);
                $cocogen_compre_carinfo->transNo = $request->transNo;
                $cocogen_compre_carinfo->brand = $request->brand;
                $cocogen_compre_carinfo->model = $request->model;
                $cocogen_compre_carinfo->year = $request->year;
                $cocogen_compre_carinfo->default_value =  $defaultValue;
                $cocogen_compre_carinfo->propertyDamage = str_replace(',', '', $request->pd);
                $cocogen_compre_carinfo->propertyDamagePrem = $propertyDamagePrem->pd;
                $cocogen_compre_carinfo->bodilyInjury = str_replace(',', '', $request->bi);
                $cocogen_compre_carinfo->bodilyInjuryPrem = $bodilyInjuryPrem->bi;
                        
                if ($request->promoCode) {
                    $cocogen_compre_carinfo->promoCode  = $request->promoCode;
                    $cocogen_compre_carinfo->promoRate  = $promo;
                    $cocogen_compre_carinfo->promoType  = $promo_type;
                }
                $cocogen_compre_carinfo->ODTheft  = $defaultValue;
                $cocogen_compre_carinfo->ODTheftPrem  = $ODTheftPrem;
                $cocogen_compre_carinfo->actsOfNature = $defaultValue;
                $cocogen_compre_carinfo->actsOfNaturePrem  = $actsOfNaturePrem;
                $cocogen_compre_carinfo->netPrem  = $netPrem;
                $cocogen_compre_carinfo->netPremwithAOM  = $netPremwithAOM;
                $cocogen_compre_carinfo->dst = $dst;
                $cocogen_compre_carinfo->deductible = $deductible;
                $cocogen_compre_carinfo->dstWithAOM  = $dstwithAOM;
                $cocogen_compre_carinfo->vat = $vat;
                $cocogen_compre_carinfo->vatWithAOM = $vatwithAOM;
                $cocogen_compre_carinfo->lgt = $lgt;
                $cocogen_compre_carinfo->lgtWithAOM  = $lgtwithAOM;
                $cocogen_compre_carinfo->totalTax  = $totaltax;
                $cocogen_compre_carinfo->totaltaxwithAOM  = $totaltaxwithAOM;
                $cocogen_compre_carinfo->grossPrem  = $grossprem;
                $cocogen_compre_carinfo->grossPremWithAOM  = $grosspremwithAOM;
                $cocogen_compre_carinfo->finalDue  = $finalgrossprem;
                $cocogen_compre_carinfo->finalDueWithAOM  = $finalgrosspremwithAOM;
                $cocogen_compre_carinfo->fmvValue  = $request->default_value;
                $cocogen_compre_carinfo->isWithTotalGuard = $request->buttonGuardValue;
                $cocogen_compre_carinfo->save();

                $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();

                $tnxid = $carInfo->tnxid;
            }

            $personalInfo = DB::table('cocogen_compre_personalinfo')->where('transNo', $request->transNo)->first();

            if($personalInfo) {
                $cocogen_compre_personalinfo = cocogen_compre_personalinfo::findorFail($personalInfo->id);
                $cocogen_compre_personalinfo->firstName = $request->firstName;
                $cocogen_compre_personalinfo->lastName = $request->lastName;
                $cocogen_compre_personalinfo->middleName = null;
                $cocogen_compre_personalinfo->suffix = $request->suffix;
                $cocogen_compre_personalinfo->save();
            } else {
                $cocogen_compre_personalinfo = new cocogen_compre_personalinfo;
                $cocogen_compre_personalinfo->transNo = $request->transNo;
                $cocogen_compre_personalinfo->tnxid = $tnxid;
                $cocogen_compre_personalinfo->firstName = $request->firstName;
                $cocogen_compre_personalinfo->lastName = $request->lastName;
                $cocogen_compre_personalinfo->middleName = null;
                $cocogen_compre_personalinfo->suffix = $request->suffix;
                $cocogen_compre_personalinfo->save();
            }

            DB::table('cocogen_compre_accessory_trans')->where('transNo', $request->transNo)->delete();

            if(!empty($request->accessory)) {
                $accessories = $request->accessory;
                $accessories_value = $request->accessory_value;

                foreach($accessories as $key => $accessor) {
                    if($accessories[$key] != null && $accessories_value[$key] != null) {
                        $accessories_value_substr = substr($accessories_value[$key], 1);
                        $accessories_value_final = str_replace(',', '', $accessories_value_substr);

                        $cocogen_compre_accessory_trans = new cocogen_compre_accessory_trans;
                        $cocogen_compre_accessory_trans->transNo = $request->transNo;
                        $cocogen_compre_accessory_trans->tnxid = $tnxid;
                        $cocogen_compre_accessory_trans->accessory = $accessories[$key];
                        $cocogen_compre_accessory_trans->amount = $accessories_value_final;
                        $cocogen_compre_accessory_trans->save();
                    }
                }
            }

            $additionalInfo = DB::table('cocogen_compre_addtlcarinfo')->where('transNo', $request->transNo)->first();

            if(!$additionalInfo) {
                $fmv = DB::table('cocogen_fmv')->where('brand', $request->brand)->where('model', $request->model)->where('year', $request->year)->first();
                $cocogen_compre_addtlcarinfo = new cocogen_compre_addtlcarinfo;
                $cocogen_compre_addtlcarinfo->transNo = $request->transNo;
                $cocogen_compre_addtlcarinfo->tnxid = $tnxid;
                if($fmv) {
                    $cocogen_compre_addtlcarinfo->seatingNo = 5;
                } else {
                    $cocogen_compre_addtlcarinfo->seatingNo = 5;
                }
                $cocogen_compre_addtlcarinfo->save();
            }

        } else if($request->page === 'plan') {
            $transaction = 'save';
            if($request->transaction === 'apply') {
                $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();

                $cocogen_compre_carinfo = cocogen_compre_carinfo::findorFail($carInfo->id);
                $cocogen_compre_carinfo->isWithAon = $request->aon;
                $cocogen_compre_carinfo->save();

                $transaction = 'apply';
            }
        } else {
            $transaction = 'save';
        }

        $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first(); 
        $accessories = DB::table('cocogen_compre_accessory_trans')->where('transNo', $request->transNo)->get();
        
        return view('getaquote.new.compre.second-page', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'carInfo' => $carInfo, 'accessories' => $accessories, 'transaction' => $transaction]);
    }


    public function plans(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Motor Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];  
        
        $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();

        $cocogen_compre_carinfo = cocogen_compre_carinfo::findorFail($carInfo->id);
        $cocogen_compre_carinfo->isWithAon = $request->aon;
        $cocogen_compre_carinfo->save();

        $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();
        $accessories = DB::table('cocogen_compre_accessory_trans')->where('transNo', $request->transNo)->get();
        
        return view('getaquote.new.compre.second-page-plans', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'carInfo' => $carInfo, 'trans_no' => $request->transNo, 'accessories' => $accessories]);
    }

    public function additionalCarInformation(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Motor Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   
        
        if($request->page === 'quotation' || $request->page === 'plan') {
            $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();

            $cocogen_compre_carinfo = cocogen_compre_carinfo::findorFail($carInfo->id);
            $cocogen_compre_carinfo->isWithAon = $request->aon;
            $cocogen_compre_carinfo->save();
        }

        $addtlcarinfo = DB::table('cocogen_compre_addtlcarinfo')->where('transNo', $request->transNo)->first();
        
        return view('getaquote.new.compre.second-page-additional', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'addtlcarinfo' => $addtlcarinfo, 'trans_no' => $request->transNo]);
    }

    public function personalData(Request $request)
    {

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Motor Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   
        
        if($request->page === 'additionalCar') {
            $addtlcarinfo = DB::table('cocogen_compre_addtlcarinfo')->where('transNo', $request->transNo)->first();

            $cocogen_compre_addtlcarinfo = cocogen_compre_addtlcarinfo::findorFail($addtlcarinfo->id);
            $cocogen_compre_addtlcarinfo->mvFileNo = $request->mvFileNo;
            $cocogen_compre_addtlcarinfo->plateNo = $request->plateNo;
            $cocogen_compre_addtlcarinfo->engineNo = $request->engineNo;
            $cocogen_compre_addtlcarinfo->bodyType = $request->bodyType;
            $cocogen_compre_addtlcarinfo->color = $request->color;
            $cocogen_compre_addtlcarinfo->chassisNo = $request->chasisNo;
            $cocogen_compre_addtlcarinfo->mortgagee = $request->btnMortgagee;
            $cocogen_compre_addtlcarinfo->mortgagee_name = $request->mortgagee;
            $cocogen_compre_addtlcarinfo->inceptDate = $request->policyDate;
            $cocogen_compre_addtlcarinfo->save();
        } 

        $countries = cocogen_itp_countries::get();

        $personalInfo = DB::table('cocogen_compre_personalinfo')->where('transNo', $request->transNo)->first();

        $regions = location::select('region')->distinct('region')->orderBy('region', 'asc')->get();

        return view('getaquote.new.compre.third-page', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'personalInfo' => $personalInfo, 'trans_no' => $request->transNo, 'countries' => $countries, 'regions' => $regions]);
    }
    public function summaryCompre(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Motor Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];   
        
        $personalInfo = DB::table('cocogen_compre_personalinfo')->where('transNo', $request->transNo)->first();

        $cocogen_compre_personalinfo = cocogen_compre_personalinfo::findorFail($personalInfo->id);
        $cocogen_compre_personalinfo->firstName = $request->firstName;
        $cocogen_compre_personalinfo->lastName = $request->lastName;
        $cocogen_compre_personalinfo->middleName = '';
        $cocogen_compre_personalinfo->suffix = $request->suffix;
        $cocogen_compre_personalinfo->contactNo = $request->contactNumber;
        $cocogen_compre_personalinfo->emailAddress = $request->emailAddress;
        $cocogen_compre_personalinfo->birthDate = $request->dateOfBirth;
        $cocogen_compre_personalinfo->gender = $request->gender;
        $cocogen_compre_personalinfo->nationality = $request->nationality;
        $cocogen_compre_personalinfo->palceofbirth = $request->placeOfBirth;
        $cocogen_compre_personalinfo->residence_address = $request->address;
        $cocogen_compre_personalinfo->street = $request->street;
        $cocogen_compre_personalinfo->residence_province = $request->province;
        $cocogen_compre_personalinfo->residence_municipality = $request->city;
        $cocogen_compre_personalinfo->residence_barangay = $request->brgy;
        $cocogen_compre_personalinfo->mailing_address = $request->address;
        $cocogen_compre_personalinfo->mailing_province = $request->province;
        $cocogen_compre_personalinfo->mailing_municipality = $request->city;
        $cocogen_compre_personalinfo->mailing_barangay = $request->brgy;
        $cocogen_compre_personalinfo->zipNo = $request->zipNo;
        $cocogen_compre_personalinfo->typeofid = $request->idType;
        $cocogen_compre_personalinfo->idno = $request->idNo;
        $cocogen_compre_personalinfo->region = $request->region;
        $cocogen_compre_personalinfo->country = $request->country;

        if($request->uploadTrans === 'create') {
            if($request->hasFile('upload')) {
                if(is_file(storage_path('app/public/compre/'.$personalInfo->idFile)))  {
                    unlink(storage_path('app/public/compre/'.$personalInfo->idFile));
                }
               
                $file = $request->file('upload');
                $extensionFile = $file->getClientOriginalExtension();
                $file_name = $request->transNo.'.'.$extensionFile;
                $filePath = $request->file('upload')->storeAs('compre', $file_name, 'public');
                $cocogen_compre_personalinfo->idFile = $file_name;
                $cocogen_compre_personalinfo->idOriginalName = $file->getClientOriginalName();
                $cocogen_compre_personalinfo->idOriginalSize = $file->getSize();
            }
        }

        $cocogen_compre_personalinfo->emergencyFullName = $request->emergencyFullName;
        $cocogen_compre_personalinfo->emergencyMobile = $request->emergencyMobile;
        $cocogen_compre_personalinfo->emergencyRelation = $request->emergencyRelation;
        $cocogen_compre_personalinfo->save();

        if(!$request->uploadTrans === 'create') {
            if($request->file('upload')){
                if ($request->file('upload')->isValid()) { 
                    $cocogen_compre_trans_uploads = new cocogen_compre_trans_uploads;
                    $cocogen_compre_trans_uploads->transNo = $request->transNo;
                    $cocogen_compre_trans_uploads->filename = $request->file('upload')->hashName();
                    $cocogen_compre_trans_uploads->extension = $request->file('upload')->extension();
                    $cocogen_compre_trans_uploads->filesize = $request->file('upload')->getSize();
                    $cocogen_compre_trans_uploads->location = $request->file('upload')->store('compreID');
                    $cocogen_compre_trans_uploads->TransID = $personalInfo->tnxid;
                    $cocogen_compre_trans_uploads->save();              
                }
            }
        }

        $personalInfo = DB::table('cocogen_compre_personalinfo')->where('transNo', $request->transNo)->first();
        $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();
        $additionalInfo = DB::table('cocogen_compre_addtlcarinfo')->where('transNo', $request->transNo)->first();
        $accessories = DB::table('cocogen_compre_accessory_trans')->where('transNo', $request->transNo)->get();

        return view('getaquote.new.compre.last-page', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer, 'personalInfo' => $personalInfo, 'trans_no', $personalInfo->transNo, 'carInfo' => $carInfo, 'additionalInfo' => $additionalInfo, 'accessories' => $accessories]);
    }

    public function getModel(Request $request) 
    {
        $models = cocogen_fmv::where('brand', $request->brand)->groupBy('model')->get();

        return response()->json($models);
    }

    public function getYear(Request $request) 
    {
        $years = cocogen_fmv::where('brand', $request->brand)->where('model', $request->model)->groupBy('year')->get();

        return response()->json($years);
    }

    public function getCarValue(Request $request) 
    {
        $value = cocogen_fmv::where('brand', $request->brand)->where('year', $request->year)->where('model', $request->model)->max('amount');

        return response()->json($value);
    }

    public function checkPromo(Request $request) 
    {  
        
        $promo = DB::table('cocogen_promo')
        ->where('promo', $request->promo)
        ->where('transType', 'COMPRE')
        ->where('effectiveDate', '<', Carbon::now())
        ->where('expiryDate', '>', Carbon::now())
        ->where('limit_usage', '>', 0)
        ->first();

        return response()->json($promo);
    }

    public function payment(Request $request) 
    {
        $personalInfo = DB::table('cocogen_compre_personalinfo')->where('transNo', $request->transNo)->first();
        $carInfo = DB::table('cocogen_compre_carinfo')->where('transNo', $request->transNo)->first();

        if($carInfo->isWithAon === 'yes') {
            $totalmount = $carInfo->finalDueWithAOM;
        } else {
            $totalmount = $carInfo->finalDue;
        }

        if($personalInfo->suffix) {
            $full_name = $personalInfo->firstName. " " .$personalInfo->lastName. " " .$personalInfo->suffix;
        } else {
            $full_name = $personalInfo->firstName. " " .$personalInfo->lastName;
        }

        $parameters = [
            'txnid' => $carInfo->tnxid, 
            'amount' => $totalmount,
            'ccy' => 'PHP',
            'description' => $carInfo->tnxid,
            'email' => $personalInfo->emailAddress, 
            'param1' => $full_name, 
            'param2' => "", 
        ];

        $merchant_account = [
            'merchantid' => env('MERCHANT_ID'),
            'password'   => env('MERCHANT_PASSWORD')
        ];

        $dragonpay = new Dragonpay($merchant_account);
                           
        $dragonpay->setParameters($parameters)->away();
    }

    public function getRegion(Request $request)
    {       
        $location = location::select('region')->distinct('region')->orderBy('region', 'asc')->get();     
        return response()->json($location, 201);        
    }
    
    public function getProvince(Request $request)
    {       
        $location = location::where('region', $request->region)->select('province')->distinct('province')->orderBy('province', 'asc')->get();     
        return response()->json($location, 201);        
    }

    public function sendEmail(Request $request) 
    {
        $data = [
            'name' => $request->nameCantFind,
            'contactCantFind' => $request->contactCantFind,
            'messageCantFind' => $request->messageCantFind,
        ];

        Mail::send('getaquote.new.compre.email', $data, function($message) {
            $message->to('val_mangoba@cocogen.com', 'val_mangoba@cocogen.com')->subject('Auto Excel Plus Inquiry');
        });

        return response()->json(['success']); 
    }
}
