<?php

namespace App\Http\Controllers;

use App\Models\Http\Controllers\downloadExcelMotor;
use App\Models\Http\Controllers\emailsendCompreAttached;
use App\Models\Http\Controllers\emailsendcompre;
use App\Models\Http\Controllers\home;
use App\Models\Rules\MatchOldPassword;
use App\Models\barangay;
use App\Models\city;
use App\Models\cocogen_admin_breadcrumbs;
use App\Models\cocogen_admin_emailtemplate;
use App\Models\cocogen_admin_faq;
use App\Models\cocogen_admin_faq_category;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_homepage_slider;
use App\Models\cocogen_admin_homepage_video;
use App\Models\cocogen_admin_ineedprotection;
use App\Models\cocogen_admin_ineedprotection_trans;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_pages;
use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_pages_news;
use App\Models\cocogen_admin_pages_products;
use App\Models\cocogen_admin_parentproduct;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_relatedproducts;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subparentproduct;

use App\Models\cocogen_brand_year;
use App\Models\cocogen_estimate_accesories;
use App\Models\cocogen_estimate_act_of_nature_rate;
use App\Models\cocogen_estimate_motor_add_car_info;
use App\Models\cocogen_estimate_motor_add_other_personal_info;
use App\Models\cocogen_estimate_motor_info;
use App\Models\cocogen_estimate_motor_personal_info;
use App\Models\cocogen_estimate_motor_series;
use App\Models\cocogen_estimate_motorplus_historylogs;
use App\Models\cocogen_estimate_owndamage_rate;
use App\Models\cocogen_estimate_summary;
use App\Models\cocogen_estimate_property_damage;
use App\Models\cocogen_estimate_body_injury;
use App\Models\cocogen_estimate_motor_rate_detail;
use App\Models\cocogen_fmv;
use App\Models\cocogen_fmv_year;
use App\Models\cocogen_motor_net_rating_serial;
use App\Models\cocogen_set_agent_code;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_compre_accessory;
use App\Models\cocogen_estimate_compre_file;
use App\Models\cocogen_estimate_compre_file_mortgage;

use App\Models\cocogen_meta;
use App\Models\location;
use App\Models\location_compre;
use App\Models\location_ctpl;
use App\Models\nationality;
use App\Models\occupation;
use App\Models\province;
use App\Models\users;
use Auth;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Crazymeeks\Foundation\PaymentGateway\Options\Processor;
use DB;
use DateTime;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Mail;
use PDF;
use Response;
use Session;
use SoapClient;
use Storage;
use URL;
use Carbon\Carbon;

class motorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){

            $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
            $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
            $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
            $cocogen_admin_footer = cocogen_admin_footer::all();
            $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();


            $cocogen_fmv = cocogen_fmv::get();
            $cocogen_brand_year = cocogen_brand_year::get();
            $cocogen_compre_bipds= cocogen_estimate_body_injury::get();
            $accessory = cocogen_compre_accessory::get();
            $cocogen_fmv_year = DB::table('cocogen_fmv_year')->distinct()->select('year')->groupBy('year')->get();
            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            $rateofaon = cocogen_estimate_act_of_nature_rate::get();
            $AONrate =$rateofaon[0]['rateForAON'];


            return view('getaquote.motor_net.newhome', ['title' => $title,
            'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,
            'metadescription' => $metadescription,
            'keyword' => $keyword,
            'cocogen_admin_main' => $cocogen_admin_main,
            'cocogen_admin_submain' => $cocogen_admin_submain,
            'cocogen_admin_subchild' => $cocogen_admin_subchild,
            'cocogen_admin_productlink' => $cocogen_admin_productlink,
            'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,
            'cocogen_admin_ineedprotection' => $cocogen_admin_ineedprotection,
            'cocogen_admin_footer' => $cocogen_admin_footer,
            'cocogen_fmv'=>$cocogen_fmv,
            'cocogen_brand_year'=>$cocogen_brand_year,
            'cocogen_fmv_years'=>$cocogen_fmv_year,
            'cocogen_compre_bipds'=>$cocogen_compre_bipds,
            'accessories' => $accessory,
            'AONrate'=>$AONrate]);
    }

    // Save the Details of the User
    public function saveInfo(Request $request){

        if($request->check_disable != 1){
        $userId = !empty(Auth::id()) ? Auth::id() :'';
            $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'middleName'=>'required',
            'contactNo'=>'required',
            'emailAddress'=> 'required|email|max:255',
            ];

            $niceNames = [
            'firstName'=>'First Name',
            'lastName'=>' Last Name',
            'middleName'=>'Middle Name',
            'contactNo'=>'Mobile Number',
            'emailAddress'=> 'Email Addres',
            ];
        $this->validate($request, $rules, [], $niceNames);

        $cocogen_get_user_check = cocogen_set_agent_code::where('ownerId',\Auth::user()->id)->get();
        $email = Auth::user()->email;
        $agentName =  Auth::user()->name;
        $cocogen_get_user=cocogen_users_agent_code::where('email',$email)->get();

        if($cocogen_get_user_check->isEmpty()){
            $insertagent = new cocogen_set_agent_code;
            $insertagent->ownerId = Auth::id();
            $insertagent->agentName = $agentName;
            $insertagent->agentCode =!empty($cocogen_get_user[0]->code) ? $cocogen_get_user[0]->code :'';
            $insertagent->save();
                if($cocogen_get_user->isEmpty()){
                    $cocogen_user_agent[0]['email'] = 'noagentregister';
                    $cocogen_user_agent[0]['id'] = '0';
                }
        }
        $codeAgent = !empty($cocogen_get_user[0]->code) ? $cocogen_get_user[0]->code :'';
        $cocogen_user_agent = cocogen_users_agent_code::select('users.name', 'cocogen_users_agent_code.id', 'cocogen_users_agent_code.email', 'cocogen_users_agent_code.code')
        ->join('users', 'users.email', '=', 'cocogen_users_agent_code.email')
        ->where('cocogen_users_agent_code.email', $email)
        ->where('cocogen_users_agent_code.code', $codeAgent)
        ->distinct()
        ->orderBy('users.name', 'ASC')
        ->get();


        $transnum = $request->transno;

        if (!empty($transnum)) {
            // $transnum is not empty

            if (strlen($transnum) <= 50) {
                        abort(404);
            } else {
                $transno = Crypt::decrypt($transnum);
            }
        } else {
            // $transnum is empty
            $transno = $transnum;
        }



        // Create or update motor record
        $motorPlus = cocogen_estimate_motor_personal_info::updateOrCreate(
            ['transno' => $transno],
            [
                'firstName' => htmlspecialchars($request->firstName),
                'lastName' => htmlspecialchars($request->lastName),
                'middleName' => htmlspecialchars($request->middleName),
                'contactNo' => htmlspecialchars($request->contactNo),
                'emailAddress' => $request->emailAddress,
                'residenceAddress' => htmlspecialchars($request->residence_address),
                'residence_province' => !empty($request->residence_province) ? $request->residence_province : $request->residence_province_hide,
                'residence_municipality' => !empty($request->residence_municipality) ? $request->residence_municipality : $request->residence_municipality_hide,
                'residence_barangay' => !empty($request->residence_barangay) ? $request->residence_barangay : $request->residence_barangay_hide,
                'copyMailing' => $request->chckSameAddress,
                'mailing_address' => htmlspecialchars($request->mailing_address),
                'mailing_province' => !empty($request->mailing_province) ? $request->mailing_province : $request->mailing_province_hide,
                'mailing_municipality' => !empty($request->mailing_municipality) ? $request->mailing_municipality : $request->mailing_municipality_hide,
                'mailing_barangay' => !empty($request->mailing_barangay) ? $request->mailing_barangay: $request->mailing_barangay_hide,
                'status' => 'Save',
                'userLogin' => $userId,
                'sourceOfFund' => htmlspecialchars($request->sourceOfFund),
                'agent' => $email,
                'agentId' => $codeAgent,
                'productName' => 'MOTORPLUS',
                'saveCondition' => '1'
            ]
        );

        // Set the transno and save the motor record
        $motorPlus->transno = $motorPlus->id;
        $motorPlus->save();
        $transno = $motorPlus->transno;

        $status =array('status'=>'Save',
        'saveCondition'=>'1');
        cocogen_estimate_motor_personal_info::where('transno',$transno)->update($status);

        // Get agent information
        $getAgent = cocogen_estimate_motor_personal_info::select('agentId', 'agent')->where('transno', $transno)->first();
        $cocogen_users_agent_code = cocogen_users_agent_code::select('id', 'email', 'code')
            ->where('code', $getAgent->agentId)
            ->where('email', $getAgent->agent)
            ->first();
         $agentCode = !empty($cocogen_users_agent_code->code) ? $cocogen_users_agent_code->code :0;

        // Update quotation number
        $updateQuote = ['quotationNo' => 'MC-' . $agentCode . $transno];
        cocogen_estimate_motor_personal_info::where('transno', $transno)->update($updateQuote);
        $quotetrans = 'MC-' . $agentCode . $transno;
        $check_motor = cocogen_estimate_motor_info::where('gid',$transno)->get();

        if ($check_motor->isEmpty()) {
            //empty
            $cocogen_redirect = '1';
        } else {
            //notempty
            $cocogen_redirect = '2';
        }
        $status_message = 'Personal Information was successfully saved.';
         $transno=Crypt::encrypt($transno);
        return response()->json(['success'=>$status_message, 'transno'=>$transno,'cocogen_redirect'=>$cocogen_redirect,'quotetrans'=>$quotetrans]);
        }else{
            $status_message = 'Personal Information was successfully saved.';
            return response()->json(['success'=>$status_message]);
        }
    }


     function fetchyear(){
        $states = DB::table("cocogen_fmv")->distinct()->pluck("brand");
        return response()->json($states);
    }


    function fetchmodel(Request $request){

        $yearval = $request->get('yearval');
        $brandval = $request->get('brandval');

        $data = DB::table('cocogen_fmv')
           ->select('model')
           ->where('year', $yearval)
           ->where('brand', $brandval)
           ->where('amount','<', 5000000)
          ->groupBy('model')
          ->get();
        $dependent = "model";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>'.ucfirst($dependent).'*</option>';
         foreach($data as $row)
         {
          $output .= '<option value="'.$row->model.'">'.$row->model.'</option>';
         }

        echo $output;
       }

       function fetchbrand(Request $request){

        $yearval = $request->get('yearval');
        $data = DB::table('cocogen_fmv')
           ->select('brand')
           ->where('year', $yearval)
           ->where('amount','<', 5000000)
          ->groupBy('brand')

          ->get();
        $dependent = "brand";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>'.ucfirst($dependent).'*</option>';
         foreach($data as $row)
         {
          $output .= '<option value="'.$row->brand.'">'.$row->brand.'</option>';
         }

        echo $output;
       }

       function fetchcity(Request $request){

        $province = $request->get('province');


        $data = DB::table('location')
           ->select('city')
           ->where('province', $province)
          ->groupBy('city')
          ->get();
        $dependent = "city";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>'.ucfirst($dependent).'*</option>';
         foreach($data as $row)
         {
          $output .= '<option value="'.$row->city.'">'.$row->city.'</option>';
         }

        echo $output;
       }

       function fetchtest(Request $request)
       {
           $yearval = $request->get('yearName');
           $brandval = $request->get('brandName');
           $modelval = $request->get('modelName');

           $dependent = "amount";

             $data = DB::table('cocogen_fmv')
                    ->where('year', $yearval)
                    ->where('brand', $brandval)
                    ->where('model', 'LIKE', '%' . $modelval . '%')
                    ->get();

                if ($data->isNotEmpty()) {
                    // Check if the query result is not empty
                    $amount = $data->first()->amount;

                } else {
                    $amount='';
                    // Handle the case where the query result is empty

                }


        //    foreach ($data as $row) {
        //        $output[] = [
        //            'amount' => $row->amount,
        //         //    'type' => $row->type,
        //        ];
        //    }

           echo json_encode($amount);
       }




       // MOTOR NET RATING

       public function saveVehicleInfo(Request $request){
           $id =  $request->trans_id;
            if(strlen($id) <= 50) {


            }else{
                  $id=(Crypt::decrypt($id));
            }

        if($request->check_disable != 1 ){
          $rules = [
            'drpYear' => 'required_without:hiddenYear',
            'hiddenYear' => 'required_without:drpYear',
            'brand' => 'required_without:hiddenBrand',
            'hiddenBrand' => 'required_without:brand',
            'model' => 'required_without:hiddenModel',
            'hiddenModel' => 'required_without:model',
            'seatNo' => 'required',
            'totalValue' => 'required',
            'bodilyInjuryVal' => 'required',
            // 'propertyDamage' => 'required',
            'grossPrem' => 'required',
            // 'ownDamage' => 'required'
        ];

        $niceNames = [
            'drpYear'=>'Year is required',
            'brand'=>'Brand is required',
            'model'=>'Model is required',
            'seatNo' => 'Seat No is required',
            'totalValue' => 'Total is required',
            'bodilyInjuryVal'=>'Body Injury is required',
            // 'propertyDamage'=> 'Property Damage is required',
            'grossPrem' =>'Gross Premium is required',
            // 'ownDamage'=>' Own Damage/Thef is required',

        ];
        $this->validate($request, $rules, [], $niceNames);

        $perSeatType = cocogen_fmv::where('year',!empty($request->drpYear) ? $request->drpYear : $request->hiddenYear)
        ->where('brand',!empty($request->brand) ? $request->brand : $request->hiddenBrand)
        ->where('model', 'LIKE', '%' . (!empty($request->model) ? $request->model : $request->hiddenModel) . '%')
        ->get();


        $cleanStringprice = str_replace(',', '', $request->bodilyInjuryVal);
        $cleanValue = str_replace('.00', '', strval($cleanStringprice));

        $vtpl = cocogen_estimate_body_injury::select('pc')
        ->where('amount',$cleanValue)
        ->get();
          $vtpl2 = cocogen_estimate_property_damage::select('pc')
        ->where('amount',$cleanValue)
        ->get();

        $seattypevalue = strtolower($perSeatType[0]->model);

        if (strpos($seattypevalue, 'suv') !== false ) {
            $seattype = "suv";
        } elseif (strpos($seattypevalue, 'van') !== false ) {
            $seattype = "suv";
        } elseif (strpos($seattypevalue, 'pick-up') !== false ) {
            $seattype = "suv";
        } elseif (strpos($seattypevalue, 'auv') !== false ) {
            $seattype = "suv";
        } elseif (strpos($seattypevalue, 'truck') !== false || strpos($seattypevalue, 'bus') !== false ) {
            $seattype = "truck";
        // } elseif (strpos($seattypevalue, 'seater') === false) {
        //     $seattype = "motorcycle";
        }else{
            $seattype = "sedan";
        }

        $seatcount = $request->seatNo;
        $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
        $existingRecords = cocogen_estimate_accesories::where('gid', $id)->get();
        // Update the 'gid' value for the existing records and delete the unmatched records
        foreach ($existingRecords as $record) {
            $record->update(['gid' => $record->gid . '-change']);
        }


        $deviceAccessYears = array_filter($request->device_access_year);
        $deviceAccessValues = $request->device_access_value;

        if (is_array($request->device_access_value)) {
            $deviceAccessValues = array_filter($request->device_access_value, function ($value) {
                return $value !== '0.00';
            });

        } else {
            $deviceAccessValues = $request->device_access_value;
        }

        $accessoryValues = $request->accessoryValue;

        if (!empty($accessoryValues)) {
            // $accessoryValues is not empty
        $combine_values = array_merge($deviceAccessValues,$accessoryValues);
        $acceTotal = 0;
        foreach ($combine_values as $accessoryadd) {
            $acceTotal += (float) $accessoryadd;
        }

        } else {
            $combine_values = $deviceAccessValues;
            $acceTotal = 0;

            foreach ($deviceAccessValues as $accessoryadd) {
                $acceTotal += (float) $accessoryadd;
            }
        }



// Combine the arrays and filter null values
$combinedData = array_map(function ($accessory, $value) {
    return [
        'accessories' => $accessory,
        'amount' => str_replace(",", "", $value),
    ];
}, $deviceAccessYears, $combine_values);

// For additional accessory values without years, include them separately
if (count($accessoryValues) > count($combinedData)) {
    $extraAccessoryValues = array_slice($accessoryValues, count($combinedData));
    foreach ($extraAccessoryValues as $value) {
        $combinedData[] = [
            'accessories' => null,
            'amount' => str_replace(",", "", $value),
        ];
    }
}

// Insert data into the database without updating existing records
foreach ($combinedData as $data) {
    $record = [
        'gid' => $request->trans_id,
        'accessories' => $data['accessories'],
        'amount' => $data['amount'],
    ];

    cocogen_estimate_accesories::create($record);
}


    $status =array('status'=>'Save',
                'saveCondition'=>'2',
                'updated_at' =>$gdate);
    cocogen_estimate_motor_personal_info::where('transno',$id)->update($status);
    // session()->put('personalInfo', $request->globalid);
    $data = cocogen_estimate_motor_info::SELECT('*')
                                        ->join('cocogen_estimate_accesories','cocogen_estimate_accesories.gid','cocogen_estimate_motor_info.gid')
                                        ->where('cocogen_estimate_motor_info.gid',$id)
                                        ->get();
    //GET THE TABLE COMPUTATION //

    $vehicleSave = cocogen_estimate_motor_info::updateOrCreate(
        ['gid' => $id],
        [
            'year' => !empty($request->drpYear) ? $request->drpYear : $request->hiddenYear,
            'brand' => !empty($request->brand) ? $request->brand : $request->hiddenBrand,
            'model' =>!empty($request->model) ? $request->model : $request->hiddenModel,
            'valueOfVehicle' => str_replace(",", "", $request->totalValue),
            'originalValueOfVehicle' => str_replace(",", "", $request->totalValuehid),
            'bodyInjury' => str_replace(",", "", $request->bodilyInjuryVal),
            'propertyDamage' => str_replace(",", "", $request->bodilyInjuryVal),
            'totalAccessory' => str_replace(",", "", $acceTotal),
            'grossPrem' => str_replace(",", "", $request->grossPrem),
            'vtplBodyInjury' =>  str_replace(",", "", $vtpl[0]['pc']) ,
            'vtplPropertyDamage' => str_replace(",", "",$vtpl2[0]['pc']) ,
            'actsOfNature' => !empty($request->actOfNature) ? $request->actOfNature : 0,
            'promoCode' => htmlspecialchars($request->promocode),
            'bodyType' => $seattype,
            'perSeat' => $seatcount,

        ]
    );

    $cocogen_estimate_summary_status = cocogen_estimate_summary::select('action')->where('gid',$id)->get();
    $cocogen_estimate_owndamage_rate = cocogen_estimate_owndamage_rate::get();
    $cocogen_estimate_act_of_nature_rate= cocogen_estimate_act_of_nature_rate::get();
    $cocogen_get_summary_value = cocogen_estimate_motor_info::where('gid',$id)->get();

    $validateButton = !empty($validateButtonGet[0]['action']) ? $validateButtonGet[0]['action'] :"";
    $validateButtonAccept = !empty($validateButtonGet[0]['accept']) ? $validateButtonGet[0]['accept'] :"";
    if($validateButtonAccept == 1){
        $validateButtonAccept= 'checked';
    }else{
        $validateButtonAccept= '';
    }



    foreach ($cocogen_get_summary_value as $summary_details) {

        $valueOfVehicle = $summary_details->valueOfVehicle;
        $owndDamagePremium = $summary_details->ownDamage; //thief
        $actsOfNaturePremium = $summary_details->actsOfNature;//actofnature
        $totalaccessory = $summary_details->totalAccessory;

        // $bodyInjuryPremium =$summary_details->bodyInjury;
        // $propertyDamagePremium =$summary_details->propertyDamage;

        $year = $summary_details->year;
        $brand = $summary_details->brand;
        $model = $summary_details->model;
        $bodyInjuryPrem = $summary_details->vtplBodyInjury;
        $propertyDamagePrem = $summary_details->vtplPropertyDamage;

    }

        $cocogen_reviced_motor_rate = cocogen_estimate_motor_rate_detail::where('vehicleBody',$seattype)->get();

        foreach ($cocogen_reviced_motor_rate as $key =>$ratemotor) {
              $vehicle=$ratemotor->vehicleBody;
              $coverage[$key]=$ratemotor->coverage;
         }



        // if (strpos($vehicle, 'SUV') !== false || strpos($vehicle, 'suv') !== false) {
        //         if($valueOfVehicle >= 1000000 && $valueOfVehicle <= 2000000){
        //             $deduct= 2000;

        //         }elseif($valueOfVehicle >= 2000000 && $valueOfVehicle <=3000000 ){
        //             $deduct = 5000;
        //         }else{
        //             $deduct = $valueOfVehicle * (0.50)/100;
        //         }
        //         } elseif (strpos($vehicle, 'TRUCK') !== false || strpos($vehicle, 'Truck') !== false || strpos($vehicle, 'Bus') !== false) {
        //             $coverage =$valueOfVehicle *(1/100);
        //             $deduct = $coverage;
        //         } else {//else sedan
        //             if($valueOfVehicle >= 1000000 && $valueOfVehicle <= 2000000){
        //                 $deduct= 2000;
        //             }elseif($valueOfVehicle >= 2000000 && $valueOfVehicle <=3000000 ){
        //                 $deduct = 5000;
        //             }else{
        //                 $deduct = $valueOfVehicle * (0.50)/100;
        //             }
        //         }



                $seattype = strtolower($vehicle);

                if (strpos($seattype, 'suv') !== false || strpos($seattype, 'van') !== false || strpos($seattype, 'pick-up') !== false || strpos($seattype, 'auv') !== false || strpos($seattype, 'sedan') !== false) {
                    $deduct = 'Fixed Php 2,000.00 each and every loss for Own Damage/Theft and Acts of Nature';
                    // if ($valueOfVehicle >= 1000000 && $valueOfVehicle <= 2000000) {
                    //     $deduct = 'Fixed Php 2,000.00 each and every loss for Own Damage/Theft and Acts of Nature';
                    // } elseif ($valueOfVehicle > 2000000 && $valueOfVehicle <= 3000000) {
                    //     $deduct = 'Fixed Php 2,000.00 each and every loss for Own Damage/Theft and Acts of Nature';
                    // } else {
                    //     $deduct = 'Fixed Php 2,000.00 each and every loss for Own Damage/Theft and Acts of Nature';
                    // }
                    } elseif (strpos($seattype, 'truck') !== false || strpos($seattype, 'bus') !== false) {
                        $deduct = '1.0% of the sum insured, minimum of Php 3,000.00 each and every loss';
                    } elseif (strpos($seattype, 'seater') === false) {
                        $deduct = '0.50% of the FMV, Minimum of Php 2,000';
                    } else {
                        $deduct = 'Theft - 80/20 Co-Insurance clause and 1.00% of the sum insured, minimum of Php 500';
                    }



        $getSum  = cocogen_estimate_motor_info::where('gid',$id)->get();
        $basepremium =$getSum[0]['grossPrem'] /1.247 ;
        $base_format = number_format($basepremium,2);
        $check_aonature = !empty($getSum[0]['actsOfNature']) ? $getSum[0]['actsOfNature'] : 0;
        $aonature = !empty($getSum[0]['actOfNatureCompute']) ? $getSum[0]['actOfNatureCompute'] : 0;
        $aonature = str_replace(',', '', $aonature);
        $computeOTD = $basepremium -  $getSum[0]['vtplPropertyDamage'] - $getSum[0]['vtplBodyInjury'] - $aonature;
        $rate_od_thief = number_format($computeOTD,2);
        $cocogen_compute_body_price = cocogen_estimate_body_injury::where('pc','=',$getSum[0]['vtplBodyInjury'])->get();
        // $cocogen_compute_property_price = cocogen_estimate_property_damage::where('pc','=',$getSum[0]['vtplPropertyDamage'])->get();

        $bodyInjuryPrem_Property = !empty($cocogen_compute_body_price[0]['amount']) ? $cocogen_compute_body_price[0]['amount'] :"";
        // $propertyDamagePrem= !empty($cocogen_compute_property_price[0]['amount']) ? $cocogen_compute_property_price[0]['amount'] :"";

        // if($seatcount <= 7){
            $perseat=(75000 * $seatcount);
        // }else{
        //      $perseat= ($seatcount - 7)  * 100;
        // }

        //coverage start
        $own_compute = $valueOfVehicle + $totalaccessory;
        $owndamage_coverage=  number_format($own_compute,2);

        $bodyInjury_PropertyDamage_coverage =  number_format($bodyInjuryPrem_Property,2);
        $perseat_coverage = number_format($perseat,2);

        $deduct_coverage =$deduct;
        $aon_compute = $valueOfVehicle + $totalaccessory;
        $aon_coverage= number_format($aon_compute,2);
        //Coverage end
        $docstomp = ceil($basepremium/4)/2;
        $doc_format = number_format($docstomp,2);

        $vat = $basepremium * 0.12;
        $vat_format = number_format($vat,2);

        $localgovernment = $basepremium  * 0.002;
        $local_format = number_format($localgovernment,2);

        $grosspremium = $basepremium + $docstomp + $vat + $localgovernment;
        $gross_format = number_format($grosspremium,2);

        // $fireservicegovernment=$grosspremium * 0.002 ;
        // $fire_format = number_format($fireservicegovernment,2);

        $finalamount= $grosspremium ;
        $final_format = number_format($finalamount,2);
    // END COMPUTATION
        $transno=$id;
        $status_message='Save Succesfully';
        $vehicleSave = cocogen_estimate_motor_info::updateOrCreate(
            ['gid' => $id],
            [
                'ownDamage' => str_replace(",", "", $owndamage_coverage),
                'ownDamageCompute' => str_replace(",", "", $owndamage_coverage),
                'autoPersonalAccident' => $perseat_coverage
            ]
        );


        $summaryInfo = [
            'gid' => $transno,
            'basePremium' => $base_format,
            'docStamps' => $doc_format,
            'localGovernmentTax' => $local_format,
            'grossPremium' => $gross_format,
            // 'fireServiceGovernment' => $fire_format,
            'finalAmountDue' => $final_format,
            'promo' => !empty($request->promo) ? $request->promo : 0,
            'vat' => $vat_format,
            'deduction' => $deduct_coverage,
            'perSeat' => !empty($seatcount) ? $seatcount : 0

        ];

        DB::table('cocogen_estimate_summary')->updateOrInsert(
            ['gid' => $id],
            $summaryInfo
        );

        $check_motor = cocogen_estimate_motor_add_other_personal_info::where('gid',$id)->get();

        if ($check_motor->isEmpty()) {
            //empty
            $cocogen_redirect = '1';
        } else {
            //notempty
            $cocogen_redirect = '2';
        }

            return response()->json(['success'=>$status_message,
            'transno'=>$transno,
            'base_format'=>$base_format,
            'doc_format'=>$doc_format,
            'vat_format'=>$vat_format,
            'local_format'=>$local_format,
            'gross_format'=>$gross_format,
            'seattype'=>$seattype,
            'check_aon'=>$check_aonature,
            'final_format'=>$final_format,
            'owndamage_coverage'=>$owndamage_coverage,
            'bodyInjury_PropertyDamage_coverage'=>$bodyInjury_PropertyDamage_coverage,
            'perseat_coverage'=>$perseat_coverage,
            'deduct_coverage'=>$deduct_coverage,
            'aon_coverage'=>$aon_coverage]);
        }else{
            $status_message='Save Succesfully';
            return response()->json(['success'=>$status_message]);
        }
    }

    public function emailsendcompre($fname, $email, $content) {

        $data = array('fname'=>$fname, 'email'=>$email,'content'=>$content);

        Mail::send('emailtemplate.compreexternal', $data, function($message) use ($fname, $email,$content)
          {
            $message->to($email, 'COCOGEN')->subject($fname.', here is your Motor Excel Plus Insurance Policy')->from('client_services@cocogen.com', 'COCOGEN');
          });
    }


        public function sendSummaryMail(Request $request){

            if($request->checkvalidate != 1){
            $rules = [
                            'chckquote_agree' => 'required',

                ];
                $niceNames = [
                            'chckquote_agree' => '',

                ];
                $this->validate($request, $rules, [], $niceNames);
            }
            $id =  $request->trans_id;
            if(strlen($id) <= 50) {


            }else{
                  $request->trans_id=(Crypt::decrypt($id));
            }
            $motorPayment =cocogen_estimate_motor_info::where('gid',$request->trans_id)->first();
            $motorPayment->exists = true;
            $motorPayment->ownDamageCompute= $request['ownDamage'];
            $motorPayment->autoPersonalAccident= $request['autoPersonalAccident'];
            $motorPayment->actOfNatureCompute=  $request['aon_coverage'];
            $motorPayment->save();

           $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
            $status =array('action'=>'Sent',
                            'updated_at' =>$gdate);

            cocogen_estimate_summary::where('gid',$request->trans_id)->update($status);
            $status =array('status'=>'Send Quote',
                            'saveCondition'=>'3',
                                'updated_at' =>$gdate);
            cocogen_estimate_motor_personal_info::where('transno',$request->trans_id)->update($status);
            $logs =array('category'=>'MOTORPLUS',
                    'description'=>'Send Email Summary Information ',
                    'action'=>'Quote Send',
                    'transno'=>$request->trans_id,
                    'created_at'=>$gdate);
            cocogen_estimate_motorplus_historylogs::insert($logs);


        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 24)->get();// uncomment when live
            // $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 24)->get();
            // ON HOLD
        $getDetails = cocogen_estimate_motor_personal_info::select('firstName','lastName','emailAddress')->where('transno',$request->trans_id)->get();
        $firstName = !empty($getDetails[0]['firstName']) ? $getDetails[0]['firstName'] :'';
        $lastName = !empty($getDetails[0]['lastName']) ? $getDetails[0]['lastName'] :"";
        $emailAddress = !empty($getDetails[0]['emailAddress']) ? $getDetails[0]['emailAddress'] : "";
        $fullname = $firstName.' '.$lastName;

        $get_encrypt =  Crypt::encrypt($request->trans_id);
        $coclink = url('/get-policy-quote/edit/register/other/new').'/'.$get_encrypt;
         $get_value = cocogen_estimate_motor_personal_info::where('transno',$request->trans_id)->get();
            foreach ($get_value as $key => $value) {
                $get_values = $value;
            }
        $getMotorDetail = cocogen_estimate_motor_info::where('gid',$request->trans_id)->get();


        $ownerId = !empty (\Auth::user()->id) ? \Auth::user()->id : '';
        if($ownerId == ''){
           $ownerId = $get_value[0]['userLogin'];
        }else{
           $ownerId = \Auth::user()->id;
        }

        $producerCode  = cocogen_set_agent_code::WHERE('ownerId',$ownerId)->get();
        $getagentInfo = users::where('id',$producerCode[0]['ownerId'])->get();
          foreach ($getagentInfo as $key => $getAgent) {
                $agentName = $getAgent['name'];
                $agentEmail = $getAgent['email'];
                $agentNo = $getAgent['mobileNo'];
            }
        $agentName = $getAgent->getOriginal('name');
        $agentEmail = $getAgent->getOriginal('email');
        $agentNo = $getAgent->getOriginal('mobileNo');

        $year = $getMotorDetail[0]['year'];
        $brand = $getMotorDetail[0]['brand'];
        $model = $getMotorDetail[0]['model'];

        $bodyInjury = number_format($getMotorDetail[0]['bodyInjury'],2);
        $ownDamage = $request->owndamage_coverage;
        if($getMotorDetail[0]['actsOfNature'] == '0'){
            $actsOfNature = 'Not Covered';
        }else{
            $actsOfNature = $request->aon_coverage;
        }

        $propertyDamage = number_format($getMotorDetail[0]['propertyDamage']);
        $seatcount = $getMotorDetail[0]['perSeat'];
        $marketValue = number_format($getMotorDetail[0]['valueOfVehicle']);
        $autoPersonalAccident = $request->autoPersonalAccident;
        $rscc = $getMotorDetail[0]['bodyType'];
        if($rscc != 'Truck' || $rscc != 'TRUCK'){
            $rscc=$ownDamage;
        }else{
            $rscc= 'Not Covered';
        }
        $docstamps = $request->doc_format;
        $vats = $request->vat_format;
        $localGov = $request->local_format;
        $grossPremium = $request->gross_format;
        $finalAmount =$request->final_format;
        $baseprem=$request->base_format;
        $deduct=$request->deduct_coverage;

        $external = str_replace( "templatefname", $fullname, $cocogen_admin_emailtemplate[0]['content']);

        $external = str_replace( "templatelink", $coclink, $external);
        $external = str_replace( "baseprem", $baseprem, $external);
        $external = str_replace( "docstamps", $docstamps, $external);
        $external = str_replace( "vats", $vats, $external);
        $external = str_replace( "localGov", $localGov, $external);
        $external = str_replace( "grossPremium", $grossPremium,$external);
        $external = str_replace( "finalAmount", $finalAmount, $external);

        $external = str_replace( "geYear", $year, $external);
        $external = str_replace( "getBrand", $brand, $external);
        $external = str_replace( "getModel", $model, $external);
        $external = str_replace( "marketValue", $marketValue, $external);

        $external = str_replace( "bodyInjury", $bodyInjury, $external);
        $external = str_replace( "ownDamage", $ownDamage, $external);
        $external = str_replace( "actOfNature", $actsOfNature, $external);
        $external = str_replace( "rscc", $rscc, $external);
        $external = str_replace( "autoPersonalAccident", $autoPersonalAccident, $external);
        $external = str_replace( "propertyDamage", $bodyInjury, $external);
        $external = str_replace( "deductible", $deduct, $external);
        $external = str_replace( "agentname", $agentName, $external);
        $external = str_replace( "agentemail", $agentEmail, $external);
        $external = str_replace( "contactnumber", $agentNo, $external);
        $this->emailsendcompre($fullname, $emailAddress, $external);
                $summaryInfo = [
                    'gid' => $request->trans_id,
                    'basePremium' => $request->base_format,
                    'docStamps' => $request->doc_format,
                    'localGovernmentTax' => $request->local_format,
                    'grossPremium' => $request->gross_format,
                    'finalAmountDue' => $request->final_format,
                    'promo' => !empty($request->promo) ? $request->promo : 0,
                    'vat' => $request->vat_format,
                    'accept' => $request->chckquote_agree,
                    'deduction' => $request->deduct_coverage,
                    'perSeat' => !empty($request->perseat_coverage) ? $request->perseat_coverage : 0,
                    'validate_link'=>'0',
                    'action' => !empty($request->action) ? $request->action : 0
                ];

                DB::table('cocogen_estimate_summary')->updateOrInsert(
                    ['gid' => $request->trans_id],
                    $summaryInfo
                );

            $transno=$request->trans_id;
            $status_message='Successfuly Sent';
            return response()->json(['success'=>$status_message, 'transno'=>$transno]);

        }

        public function saveSummaryInfo(Request $request){
            if($request->checkvalidate != 1){
                $rules = [
                    'chckquote_agree' => 'required',

                ];
                $niceNames = [
                    'chckquote_agree' => '',

                ];
                $this->validate($request, $rules, [], $niceNames);

            }

            $id =  $request->trans_id;
            if(strlen($id) <= 50) {


            }else{
                  $request->trans_id=(Crypt::decrypt($id));
            }
           $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
           $status =array('status'=>'Save',
                        'disableAll'=>'0',
                            'updated_at' =>$gdate);
                cocogen_estimate_motor_personal_info::where('transno',$request->trans_id)->update($status);

            $motorPayment =cocogen_estimate_motor_info::where('gid',$request->trans_id)->first();
            $motorPayment->exists = true;
            $motorPayment->ownDamageCompute= $request['owndamage_coverage'];
            $motorPayment->autoPersonalAccident= $request['autoPersonalAccident'];
            $motorPayment->actOfNatureCompute= $request['aon_coverage'];
            $motorPayment->save();



            cocogen_estimate_motor_personal_info::where('transno',$request->trans_id)->update($status);
            $summaryInfo = [
                'gid' => $request->trans_id,
                'basePremium' => $request->base_format,
                'docStamps' => $request->doc_format,
                'localGovernmentTax' => $request->local_format,
                'grossPremium' => $request->gross_format,
                // 'fireServiceGovernment' => $request->fire_format,
                'finalAmountDue' => $request->final_format,
                'promo' => !empty($request->promo) ? $request->promo : 0,
                'vat' => $request->vat_format,
                'accept' => $request->chckquote_agree,
                'deduction' => $request->deduct_coverage,
                'perSeat' => !empty($request->perseat_coverage) ? $request->perseat_coverage : 0,
                'action' => !empty($request->action) ? $request->action : 0
            ];

            DB::table('cocogen_estimate_summary')->updateOrInsert(
                ['gid' => $request->trans_id],
                $summaryInfo
            );

            // session()->put('summaryInfo',$summaryInfo);
            $logs =array('category'=>'MOTORPLUS',
                       'description'=>'Save Summary Information ',
                       'action'=>'Save',
                       'transno'=>$request->trans_id,
                       'created_at'=>$gdate);
            cocogen_estimate_motorplus_historylogs::insert($logs);
            //response already save
            $transno=$request->trans_id;
            $status_message='Successfuly Sent';
            return response()->json(['success'=>$status_message, 'transno'=>$transno]);

        }


        public function saveOtherPersonalInfo(Request $request){


            if($request->check_disable != 1){
            $fileBag = $request->files;
            $file = $fileBag->get('file');
               $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
                if($request->hiddenUploadname !=null || $request->hiddenUploadname !='' ){
                    $hashfilename= $request->hiddenUploadname;
                    // displaynone retain the file
                }else{
                    if ($file !=null) {
                        $hashfilename = sha1(uniqid('', true)).'.'.$file->getClientOriginalExtension();

                        $file->move(storage_path('app/public/motorplus'), $hashfilename);
                        // Save the file path to the database or perform any other necessary actions
                        $filePath = 'public/motorplus/' . $hashfilename;

                    }
                }
            $id =  $request->trans_id;
            if(strlen($id) <= 50) {


            }else{
                  $id=(Crypt::decrypt($id));
            }



            // Update or create cocogen_estimate_motor_add_other_personal_info record
            $saveOtherInfo = array(
                'gender' => $request->gender_personal_info,
                'placeOfBirth' => $request->place_of_birth_other_personal_info,
                'birthDate' => date('Y-m-d',strtotime($request->birthDate)),
                'civilStatus' => $request->status_other_personal_info,
                'nationality' => $request->nationality_other_personal_info,
                'occupation' => $request->occupation,
                'telNo' => !empty($request->telNo) ? $request->telNo :0,
                'typeOfId' => $request->type_of_id_personal_info,
                'idNo' => $hashfilename,
                'idNum' => $request->idno_other_personal_info,
                'gid' => $id,
                'action' => 'Save',
                'checkSave' => $request->checkSave,
                'updated_at' => $gdate
            );

            cocogen_estimate_motor_add_other_personal_info::updateOrCreate(['gid' => $id], $saveOtherInfo);

            // Update or create cocogen_estimate_motor_add_car_info record
            $additionalInfo = cocogen_estimate_motor_add_car_info::updateOrCreate(['gid' => $id], [
                'mvFileNo' => !empty($request->mvfileno) ? $request->mvfileno : '',
                'plateNo' => $request->plateno,
                'engineNo' => $request->engineno,
                'color' => $request->color,
                'chasisNo' => !empty($request->chasis) ? $request->chasis :0,
                'conductionStickerNo' => !empty($request->conduction) ? $request->conduction : 0,
                'policyInceptionDate' => date('Y-m-d',strtotime($request->policyincept)),
                'mortgageValue' => !empty($request->morgagee) ? $request->morgagee:'',
                'checkSave' => '1',
                'created_at' => $gdate
            ]);


            $logs =array('category'=>'MOTORPLUS',
                        'description'=>'Update Other Personal Information  ',
                        'action'=>'Save',
                        'transno'=>$id,
                        'created_at'=>$gdate);
            cocogen_estimate_motorplus_historylogs::insert($logs);
            cocogen_estimate_motor_add_other_personal_info::where('gid',$id)->update($saveOtherInfo);
             $status =array('status'=>'Save',
                            'saveCondition'=>'5',
                                'updated_at' =>$gdate);
            cocogen_estimate_motor_personal_info::where('id',$id)->update($status);

            $display_info = cocogen_estimate_motor_add_other_personal_info::SELECT('*')
                            ->where('gid',$id)
                            ->get();
            $transno =   Crypt::encrypt($id);

            $status_message = 'Save Successfully';
            return response()->json(['success'=>$status_message,'transno'=>$transno]);
            }else{
                $status_message = 'Save Successfully';
                return response()->json(['success'=>$status_message, ]);
            }

          } //end saveOtherPersonalInfo


          public function summaryProceed(Request $request){
            $gid = $request->trans_id;
            $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
            $status = array('status'=>'Save',
                             'disableAll'=>'0',
                                 'updated_at' =>$gdate);

            cocogen_estimate_motor_personal_info::where('transno',$gid)->update($status);

                $transno=$gid;
                $status_message ='Success';
                return response()->json(['success'=>$status_message, 'transno'=>$transno]);
        }

        public function postpolicy(Request $request){
            $gid = $request->trans_id;
            if(strlen($gid) <= 50) {

            }else{
                $gid=(Crypt::decrypt($gid));
            }
            $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
            $status =array('status'=>'Issued',
                             'disableAll'=>'0',
                                 'updated_at' =>$gdate);
            cocogen_estimate_motor_personal_info::where('id',$gid)->update($status);

            if (cocogen_estimate_motor_series::where('year', '=', date('y'))->count() > 0) {

                $cocogen_motor_net_rating_serial = new cocogen_motor_net_rating_serial;
                $cocogen_estimate_motor_series = new cocogen_estimate_motor_series;
                $cocogen_estimate_motor_series_year = cocogen_estimate_motor_series::select('year')->orderBy('year','desc')->first()->year;
                $cocogen_estimate_motor_seriesVal = cocogen_estimate_motor_series::select('policyNumber')->orderBy('policyNumber','desc')->first()->policyNumber;



                    // Split the string into numeric and non-numeric parts
                    $combine_two = $cocogen_estimate_motor_seriesVal.'-'.'00';

                  if (strpos($combine_two, '-') !== false) {
                        list($numericPart, $nonNumericPart) = explode('-', $combine_two);

                        // Increment the numeric part and format it back to the original length
                        $incrementedNumericPart = str_pad((intval($numericPart) + 1), strlen($numericPart), '0', STR_PAD_LEFT);

                        // Combine the parts back together
                        $cocogen_estimate_motor_seriesValadd = $incrementedNumericPart . '-' . $nonNumericPart;
                    } else {
                        // Handle the case when the delimiter is not present in the input string
                        // For example, you might set a default value or display an error message.
                    }

                        //  $cocogen_estimate_motor_seriesValnew = intval($cocogen_estimate_motor_seriesVal);

                        // $cocogen_estimate_motor_seriesValadd = $cocogen_estimate_motor_seriesVal + 1;

                        $motorSeries = sprintf("%07d", $cocogen_estimate_motor_seriesValadd);
                        $check_series_validate = cocogen_estimate_motor_series::where('gid', $gid)->get();

                        if ($check_series_validate->isEmpty()) {


                            if($cocogen_estimate_motor_series_year == date('Y')) {

                                $cocogen_estimate_motor_series->gid = $gid;
                                $cocogen_estimate_motor_series->policyNumber = $motorSeries;
                                $cocogen_estimate_motor_series->year = date('y');
                                $cocogen_estimate_motor_series->policyNo = 'MC-MNR-TP-'.date('y').'-'.$motorSeries.'-00';
                                $cocogen_estimate_motor_series->save();
                                $pNo =array('policyNo'=>'MC-MNR-TP-'.date('y').'-'.$motorSeries.'-00');
                                cocogen_estimate_motor_personal_info::where('transno',$gid)->update($pNo);
                                $cocogen_motor_net_rating_serial->gid = $gid;
                                $cocogen_motor_net_rating_serial->policyNumber = $motorSeries;
                                $cocogen_motor_net_rating_serial->year = date('y');
                                $cocogen_motor_net_rating_serial->policyNo = 'Invoice No-'.date('y').'-'.$motorSeries.'-00';
                                $cocogen_motor_net_rating_serial->save();
                            }else{

                                $cocogen_estimate_motor_series->gid = $gid;
                                $cocogen_estimate_motor_series->policyNumber = '0000000';
                                $cocogen_estimate_motor_series->year = date('y');
                                $cocogen_estimate_motor_series->policyNo = 'MC-MNR-TP-'.date('y').'-0000000-00';
                                $cocogen_estimate_motor_series->save();

                                $cocogen_motor_net_rating_serial->gid = $gid;
                                $cocogen_motor_net_rating_serial->policyNumber = '0000000';
                                $cocogen_motor_net_rating_serial->year = date('y');
                                $cocogen_motor_net_rating_serial->policyNo = 'Invoice No-'.date('y').'-'.'0000000'.'-00';
                                $cocogen_motor_net_rating_serial->save();
                                $pNo =array('policyNo'=>'MC-MNR-TP-'.date('y').'-000000');
                                cocogen_estimate_motor_personal_info::where('transno',$gid)->update($pNo);


                            }
                        } else {

                            //empty
                        }

                        // if($cocogen_estimate_motor_series_year == date('Y')) {
                        //     $cocogen_estimate_motor_series->gid = $gid;
                        //     $cocogen_estimate_motor_series->policyNumber = $motorSeries;
                        //     $cocogen_estimate_motor_series->year = date('y');
                        //     $cocogen_estimate_motor_series->policyNo = 'MC-MNR-TP-'.date('y').'-'.$motorSeries.'-00';
                        //     $cocogen_estimate_motor_series->save();
                        //     $pNo =array('policyNo'=>'MC-MNR-TP-'.date('y').'-'.$motorSeries.'-00');
                        //     cocogen_estimate_motor_personal_info::where('transno',$gid)->update($pNo);
                        //     $cocogen_motor_net_rating_serial->gid = $gid;
                        //     $cocogen_motor_net_rating_serial->policyNumber = $motorSeries;
                        //     $cocogen_motor_net_rating_serial->year = date('y');
                        //     $cocogen_motor_net_rating_serial->policyNo = 'Invoice No-'.date('y').'-'.$motorSeries.'-00';
                        //     $cocogen_motor_net_rating_serial->save();
                        // }else{
                        //     $cocogen_estimate_motor_series->gid = 0;
                        //     $cocogen_estimate_motor_series->policyNumber = '0000000';
                        //     $cocogen_estimate_motor_series->year = date('y');
                        //     $cocogen_estimate_motor_series->policyNo = 'MC-MNR-TP-'.date('y').'-0000000-00';
                        //     $cocogen_estimate_motor_series->save();
                        //     $pNo =array('policyNo'=>'MC-MNR-TP-'.date('y').'-000000');
                        //     cocogen_estimate_motor_personal_info::where('transno',$gid)->update($pNo);
                        //     $cocogen_motor_net_rating_serial->gid = $gid;
                        //     $cocogen_motor_net_rating_serial->policyNumber = $motorSeries;
                        //     $cocogen_motor_net_rating_serial->year = date('y');
                        //     $cocogen_motor_net_rating_serial->policyNo = 'Invoice No-'.date('y').'-'.$motorSeries.'-00';
                        //     $cocogen_motor_net_rating_serial->save();

                        // }
                }else{
                    $cocogen_estimate_motor_series = new cocogen_estimate_motor_series;
                    $cocogen_estimate_motor_series->gid = $gid;
                    $cocogen_estimate_motor_series->policyNumber = '0000000';
                    $cocogen_estimate_motor_series->year = date('y');
                    $cocogen_estimate_motor_series->policyNo = 'MC-MNR-TP-'.date('y').'-0000000-00';
                    $cocogen_estimate_motor_series->save();
                    $pNo =array('policyNo'=>'MC-MNR-TP-'.date('y').'-0000000-00');
                    cocogen_estimate_motor_personal_info::where('transno',$gid)->update($pNo);

                    $cocogen_motor_net_rating_serial = new cocogen_motor_net_rating_serial;
                    $cocogen_motor_net_rating_serial->gid = $gid;
                    $cocogen_motor_net_rating_serial->policyNumber = '0000000';
                    $cocogen_motor_net_rating_serial->year = date('y');
                    $cocogen_motor_net_rating_serial->policyNo = 'Invoice No-'.date('y').'-'.'0000000'.'-00';
                    $cocogen_motor_net_rating_serial->save();
                }
                $this->viewpdf($gid);
                $updatelink =array('validate_link'=>'1',
                'updated_at' =>$gdate);
                cocogen_estimate_summary::where('gid',$gid)->update($updatelink);

            $cocogen_compre_addtlcarinfo = cocogen_estimate_motor_add_car_info::where('gid', '=', $gid)->get();
            $mortgagee = $cocogen_compre_addtlcarinfo[0]['mortgageValue'];

            if(!empty($mortgagee)){
                $mortgagee = 1;
                $this->downloadPDFCOMPRE($gid);
            }else{
                $mortgagee=0;
            }
                $transno=$gid;
                $status_message ='Success';
                return response()->json(['success'=>$status_message, 'transno'=>$transno,'mortgage'=>$mortgagee]);
        }


        public function update_record_personal(Request $request){
            $id = $request->route('id');
            $id2 = $request->route('id');
            if(strlen($id) <= 50) {
                $back_url =  $id;

            }else{
                $id=(Crypt::decrypt($id));
                $back_url =  $id2;
            }

            $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
            $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
            $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
            $cocogen_admin_footer = cocogen_admin_footer::all();
            $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
            $alllink = "";
            if(Auth::user() === null){
                    return redirect()->route('login');
            }else{
            $user = auth()->user()->email;
            }


                if($cocogen_admin_productlinkthumbnail){
                    foreach ($cocogen_admin_productlinkthumbnail as $val) {
                        if(!$alllink){
                            $alllink = "'".$val->link."'";
                        }else{
                            $alllink = $alllink . "," . "'".$val->link."'" ;
                        }
                    }
                }
                if(count($cocogen_admin_productlinkthumbnail) > 0){
                    $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                        left outer join cocogen_admin_productlink as b on b.link = a.link
                        order by 1 desc
                            ');
                }else{
                    $results = "";
                }
            $getDetail = cocogen_estimate_motor_personal_info::where('transno',$id)->get();

            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            return view('getaquote.motor_net.update.edit_record_1st', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'getDetail'=>$getDetail,'idencrpyt'=>$id2]);
        }

                public function update_record_motor(Request $request){
                        $id = $request->route('id');
                        $id2 = $request->route('id');
                        if(strlen($id) <= 50) {
                            $back_url =  $id;

                        }else{
                            $id=(Crypt::decrypt($id));
                            $back_url =  $id2;
                        }

                        $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
                        $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
                        $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
                        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
                        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
                        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
                        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
                        $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
                        $cocogen_admin_footer = cocogen_admin_footer::all();
                        $rateForAONVal = cocogen_estimate_act_of_nature_rate::get();
                        $rateForAON = $rateForAONVal[0]['rateForAON'];
                        $rateForODVal = cocogen_estimate_owndamage_rate::get();
                        $rateForOD = $rateForODVal[0]['rateForOD'];
                        $cocogen_fmv_year = DB::table('cocogen_fmv_year')->distinct()->select('year')->groupBy('year')->get();

                        $cocogen_estimate_motor_info = cocogen_estimate_motor_info::select(
                            'cocogen_estimate_motor_info.*',
                            'cocogen_estimate_motor_info.perSeat as seatCount',
                            'cocogen_estimate_summary.*'
                        )
                        ->leftJoin('cocogen_estimate_summary', 'cocogen_estimate_motor_info.gid', '=', 'cocogen_estimate_summary.gid')
                        ->where('cocogen_estimate_motor_info.gid', $id)
                        ->get();


                     $actsOfNature = !empty($actsOfNature) ? $actsOfNature :'';
                     $promoCode = !empty($personalInfo['promoCode']) ? $personalInfo['promoCode'] :'';
                       if($actsOfNature == '0.50'){
                                     $aon = 'checked';
                                 }else{
                                     $aon = '';
                                 }
                    $personalInfoAccesory= array('accessories'=>'');
                    $cocogen_compre_bipds = cocogen_estimate_body_injury::select('amount')->get();
                    $accessories = cocogen_compre_accessory::get();
                    $accessories_with_value = cocogen_estimate_accesories::where('gid',$id)->get();
                    $cocogen_fmv_year = cocogen_fmv_year::groupBy('year')->orderBy('year','DESC')->get();
                    $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
                    $alllink = "";
                    if($cocogen_admin_productlinkthumbnail){
                        foreach ($cocogen_admin_productlinkthumbnail as $val) {
                            if(!$alllink){
                                $alllink = "'".$val->link."'";
                            }else{
                                $alllink = $alllink . "," . "'".$val->link."'" ;
                            }
                        }
                    }
                    if(count($cocogen_admin_productlinkthumbnail) > 0){
                        $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                            left outer join cocogen_admin_productlink as b on b.link = a.link
                            order by 1 desc
                             ');
                    }else{
                        $results = "";
                    }
                $metadescription = $cocogen_meta[0]["description"];
                $keyword = $cocogen_meta[0]["keyword"];
                $title = $cocogen_meta[0]["title"];

                    return view('getaquote.motor_net.update.edit_record_2nd', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'cocogen_admin_ineedprotection' => $cocogen_admin_ineedprotection,'cocogen_admin_footer' => $cocogen_admin_footer,'actsOfNature'=>$actsOfNature,'promoCode'=>$promoCode,'rateForOD'=>$rateForOD,'rateForAON'=>$rateForAON,'cocogen_estimate_motor_info'=>$cocogen_estimate_motor_info,'cocogen_fmv_years'=>$cocogen_fmv_year,'accessories'=>$accessories,'cocogen_compre_bipds'=>$cocogen_compre_bipds,'accessories_with_value'=>$accessories_with_value,'cocogen_admin_productlinkthumbnail'=>$cocogen_admin_productlinkthumbnail,'back_url'=>$back_url]);
                 }


                 public function update_record_summary(Request $request){
                    $id = $request->route('id');

                    $id2 = $request->route('id');
                    if(strlen($id) <= 50) {
                        // $back_url =  $id;
                        abort(404);

                    }else{
                        $id=(Crypt::decrypt($id));
                        $back_url =  $id2;
                    }

                    $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
                    $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
                    $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
                    $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
                    $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
                    $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
                    $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
                    $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
                    $cocogen_admin_footer = cocogen_admin_footer::all();
                    $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
                    $alllink = "";
                    if(Auth::user() === null){
                         return redirect()->route('login');
                    }else{
                    $user = auth()->user()->email;
                    }


                        if($cocogen_admin_productlinkthumbnail){
                            foreach ($cocogen_admin_productlinkthumbnail as $val) {
                                if(!$alllink){
                                    $alllink = "'".$val->link."'";
                                }else{
                                    $alllink = $alllink . "," . "'".$val->link."'" ;
                                }
                            }
                        }
                        if(count($cocogen_admin_productlinkthumbnail) > 0){
                            $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                                left outer join cocogen_admin_productlink as b on b.link = a.link
                                order by 1 desc
                                 ');
                        }else{
                            $results = "";
                        }

                    $getDetail= cocogen_estimate_motor_personal_info::select(DB::raw("CONCAT(firstName, ' ', middleName, ' ', lastName) AS fullName"),'transno',
                    'contactNo','emailAddress','residenceAddress','residence_province','residence_municipality','residence_barangay',
                    'mailing_address','mailing_province','mailing_municipality','mailing_barangay','quotationNo',
                    'agent','cocogen_estimate_motor_info.perseat','cocogen_estimate_motor_info.year','cocogen_estimate_motor_info.brand','cocogen_estimate_motor_info.model',
                    'cocogen_estimate_motor_info.valueOfVehicle','cocogen_estimate_motor_info.bodyInjury','cocogen_estimate_motor_info.propertyDamage','cocogen_estimate_motor_info.ownDamage',
                    'cocogen_estimate_motor_info.actOfNatureCompute','cocogen_estimate_motor_info.bodyType','cocogen_estimate_motor_info.actsOfNature','cocogen_estimate_motor_info.autoPersonalAccident','cocogen_estimate_motor_info.promoCode','cocogen_estimate_summary.grossPremium',
                    'cocogen_estimate_summary.vat','cocogen_estimate_summary.docStamps','cocogen_estimate_summary.localGovernmentTax','cocogen_estimate_summary.grossPremium',
                    'cocogen_estimate_summary.finalAmountDue','cocogen_estimate_summary.deduction','cocogen_estimate_summary.basePremium')
                    ->join('cocogen_estimate_motor_info','cocogen_estimate_motor_info.gid','cocogen_estimate_motor_personal_info.id','cocogen_estimate_motor_personal_info.transno')
                    ->join('cocogen_estimate_summary','cocogen_estimate_summary.gid','cocogen_estimate_motor_personal_info.transno')
                    ->where('cocogen_estimate_motor_personal_info.transno',$id)
                    ->get();


                    $metadescription = $cocogen_meta[0]["description"];
                    $keyword = $cocogen_meta[0]["keyword"];
                    $title = $cocogen_meta[0]["title"];
                    return view('getaquote.motor_net.update.edit_record_3rd',
                    ['title' => $title,
                    'cocogen_admin_homepage_slider' =>
                     $cocogen_admin_homepage_slider,
                     'metadescription' => $metadescription,
                     'keyword' => $keyword,
                     'cocogen_admin_main' => $cocogen_admin_main,
                     'cocogen_admin_submain' => $cocogen_admin_submain,
                     'cocogen_admin_subchild' => $cocogen_admin_subchild,
                     'cocogen_admin_productlink' => $cocogen_admin_productlink,
                     'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,
                     'getDetail'=>$getDetail,
                     ]);
                }

        public function update_record_other(Request $request){
            $id = $request->route('id');

            $id2 = $request->route('id');
            if(strlen($id) <= 50) {
                // $back_url =  $id;
                abort(404);
            }else{
                  $id=(Crypt::decrypt($id));
                  $back_url =  $id2;
            }

            $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
            $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
            $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
            $cocogen_admin_footer = cocogen_admin_footer::all();
            $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
            $alllink = "";
            if($cocogen_admin_productlinkthumbnail){
                foreach ($cocogen_admin_productlinkthumbnail as $val) {
                    if(!$alllink){
                        $alllink = "'".$val->link."'";
                    }else{
                        $alllink = $alllink . "," . "'".$val->link."'" ;
                    }
                }
            }
            if(count($cocogen_admin_productlinkthumbnail) > 0){
                $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                    left outer join cocogen_admin_productlink as b on b.link = a.link
                    order by 1 desc
                     ');
            }else{
                $results = "";
            }
            //**Create a Query here */
            $data = DB::table('cocogen_estimate_motor_add_car_info')
            ->join('cocogen_estimate_motor_add_other_personal_info', 'cocogen_estimate_motor_add_car_info.gid', '=', 'cocogen_estimate_motor_add_other_personal_info.gid')
            ->where('cocogen_estimate_motor_add_car_info.gid', $id)
            ->select('cocogen_estimate_motor_add_car_info.*', 'cocogen_estimate_motor_add_other_personal_info.*')
            ->get();
            //**Query End */

            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            return view('getaquote.motor_net.update.edit_record_4th', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'cocogen_additional_other_info'=>$data,'back_url'=>$back_url]);
        }

        public function update_record_payment(Request $request){
            $id = $request->route('id');
            $id2 = $request->route('id');

            if(strlen($id) <= 50) {
                // $back_url=$id;
                 abort(404);
            }else{
                  $id=(Crypt::decrypt($id));
                  $back_url=$id2;
            }


            $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
            $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
            $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
            $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
            $cocogen_admin_footer = cocogen_admin_footer::all();
            $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
            $alllink = "";
            if($cocogen_admin_productlinkthumbnail){
                foreach ($cocogen_admin_productlinkthumbnail as $val) {
                    if(!$alllink){
                        $alllink = "'".$val->link."'";
                    }else{
                        $alllink = $alllink . "," . "'".$val->link."'" ;
                    }
                }
            }
            if(count($cocogen_admin_productlinkthumbnail) > 0){
                $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                    left outer join cocogen_admin_productlink as b on b.link = a.link
                    order by 1 desc
                     ');
            }else{
                $results = "";
            }
            //**Create a Query here */

        $cocogen_general_info= cocogen_estimate_motor_personal_info::select(DB::raw("CONCAT(firstName, ' ', middleName, ' ', lastName) AS fullName"),'transno','contactNo','emailAddress','residenceAddress','residence_province','residence_municipality','residence_barangay','mailing_address','mailing_province','mailing_municipality','mailing_barangay','quotationNo','status','cocogen_estimate_motor_info.actOfNatureCompute','cocogen_estimate_motor_add_car_info.mortgage','agent','cocogen_estimate_motor_add_other_personal_info.gender','cocogen_estimate_motor_add_other_personal_info.placeOfBirth','cocogen_estimate_motor_add_other_personal_info.civilStatus','cocogen_estimate_motor_add_other_personal_info.nationality','cocogen_estimate_motor_add_other_personal_info.occupation','cocogen_estimate_motor_add_other_personal_info.typeOfId','cocogen_estimate_motor_add_other_personal_info.idNo','cocogen_estimate_motor_info.perseat','cocogen_estimate_motor_info.year','cocogen_estimate_motor_info.brand','cocogen_estimate_motor_info.model','cocogen_estimate_motor_info.valueOfVehicle','cocogen_estimate_motor_info.bodyInjury','cocogen_estimate_motor_info.propertyDamage','cocogen_estimate_motor_info.ownDamage','cocogen_estimate_motor_info.actsOfNature','cocogen_estimate_motor_info.bodyType','cocogen_estimate_motor_info.promoCode','cocogen_estimate_motor_add_other_personal_info.idNo','cocogen_estimate_motor_add_other_personal_info.occupation','cocogen_estimate_motor_add_car_info.policyInceptionDate','cocogen_estimate_motor_add_car_info.mvFileNo','cocogen_estimate_motor_add_car_info.chasisNo','cocogen_estimate_motor_add_car_info.plateNo','cocogen_estimate_motor_add_car_info.engineNo','cocogen_estimate_motor_add_car_info.color','cocogen_estimate_motor_add_car_info.conductionStickerNo','cocogen_estimate_motor_add_car_info.mortgageValue','cocogen_estimate_summary.vat','cocogen_estimate_summary.docStamps','cocogen_estimate_summary.localGovernmentTax','cocogen_estimate_summary.grossPremium','cocogen_estimate_summary.finalAmountDue','cocogen_estimate_summary.deduction','cocogen_estimate_summary.basePremium')
        ->join('cocogen_estimate_motor_info','cocogen_estimate_motor_info.gid','cocogen_estimate_motor_personal_info.id','cocogen_estimate_motor_personal_info.transno')
        ->join('cocogen_estimate_motor_add_other_personal_info','cocogen_estimate_motor_add_other_personal_info.gid','cocogen_estimate_motor_personal_info.transno')
        ->join('cocogen_estimate_motor_add_car_info','cocogen_estimate_motor_add_car_info.gid','cocogen_estimate_motor_personal_info.transno')
        ->join('cocogen_estimate_summary','cocogen_estimate_summary.gid','cocogen_estimate_motor_personal_info.transno')
        ->where('cocogen_estimate_motor_personal_info.transno',$id)
        ->get();


            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            return view('getaquote.motor_net.update.edit_record_5th', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'cocogen_general_info'=>$cocogen_general_info,'back_url'=>$back_url]);
        }

        public function posttoDragonPay(Request $request){

            $id= !empty($request->encrpyttransno) ? $request->encrpyttransno : $request->transno;
            if(strlen($id) <= 50) {

            }else{
                $id=(Crypt::decrypt($id));
            }


           $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
            $tnxid='MotorPaymentsMethodsTestPage-'.$id;
            $cocogen_estimate_motor_personal_info = cocogen_estimate_motor_personal_info::where('transno', '=', $id)->get();

            $logs =array('category'=>'MOTORPLUS',
                    'description'=>'Pay Now Personal Information  ',
                    'action'=>'Pay Now',
                    'transno'=>$id,
                    'created_at'=>$gdate);
            cocogen_estimate_motorplus_historylogs::insert($logs);
            $cocogen_estimate_summary = cocogen_estimate_summary::where('gid','=',$id)->get();

            $fullname =  $cocogen_estimate_motor_personal_info[0]['firstName']."".$cocogen_estimate_motor_personal_info[0]['lastName'] ."". $cocogen_estimate_motor_personal_info[0]['middleName'];
            $amount = $cleanStringprice = str_replace(',', '', $cocogen_estimate_summary[0]['finalAmountDue']);


                                $parameters = [
                                'txnid' => $tnxid, # Varchar(40) A unique id identifying this specific transaction from the merchant site
                                'amount' => $amount, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                                'ccy' => 'PHP', # Char(3) The currency of the amount
                                'description' => $id, # Varchar(128) A brief description of what the payment is for
                                'email' => $cocogen_estimate_motor_personal_info[0]['emailAddress'], # Varchar(40) email address of customer
                                'param1' => $fullname, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                                'param2' => "", # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                            ];
                            $merchant_account = [
                                'merchantid' => env('MERCHANT_ID'),
                                'password'   => env('MERCHANT_PASSWORD')
                            ];


                            // Initialize Dragonpay
                            $dragonpay = new Dragonpay($merchant_account);
                            // Filter payment channel
                            // $dragonpay->filterPaymentChannel( Dragonpay::CREDIT_CARD );
                            // Set parameters, then redirect to dragonpay
                            $dragonpay->setParameters($parameters)->away();
        }

        public function savepaymentonly(Request $request){
            $transno= $request->trans_id;
            $motorPlus = cocogen_estimate_motor_personal_info::updateOrCreate (
                ['transno' => $transno],
                [
                    'productName' => 'MOTORPLUS',
                    'saveCondition' => '5'
                ]
            );

            $status_message = 'Save Successfully';
            return response()->json(['success'=>$status_message]);


        }

        function isNumber($str) {
            return preg_match('/^[0-9]+$/', $str) === 1;
        }

        public function pdfview(Request $request){
            $id = $request->route('id');
            $encryptid = $request->encrpyttransno;
             if(strlen($id) <= 50) {
                }else{
                    $id=(Crypt::decrypt($id));
                }

            $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
             $status =array('status'=>'Issued',
                             'disableAll'=>'1',
                                 'updated_at' =>$gdate);
             cocogen_estimate_motor_personal_info::where('transno',$id)->update($status);
             $status =array('action'=>'Issued',
                                 'updated_at' =>$gdate);
             cocogen_estimate_summary::where('gid',$id)->update($status);
             $logs =array('category'=>'MOTORPLUS',
                             'description'=>'View Other Personal Information  ',
                             'action'=>'View PDF',
                             'transno'=>$id,
                             'created_at'=>$gdate);
                 cocogen_estimate_motorplus_historylogs::insert($logs);
                 $getPath = cocogen_estimate_compre_file::where('transid',$id)->orderBy('id','DESC')->get();

                 $filename = $getPath[0]['filename'];
                 $getpathloc = $getPath[0]['fileLocation'];
                 return response()->file(storage_path('app/'.$getpathloc));
             }


             public function bankcertPdf(Request $request){

                $id = $request->route('id');

                $encryptid = $request->encrpyttransno;
                 if(strlen($id) <= 50) {
                    }else{
                        $id=(Crypt::decrypt($id));
                    }

                $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
                 $status =array('status'=>'Issued',
                                 'disableAll'=>'1',
                                     'updated_at' =>$gdate);
                 cocogen_estimate_motor_personal_info::where('transno',$id)->update($status);

                 $logs =array('category'=>'MOTORPLUS',
                                 'description'=>'Bank Certificate Generate ',
                                 'action'=>'View PDF',
                                 'transno'=>$id,
                                 'created_at'=>$gdate);
                     cocogen_estimate_motorplus_historylogs::insert($logs);
                     $getPath_mortgage = cocogen_estimate_compre_file_mortgage::where('transid',$id)->orderBy('id','DESC')->get();
                    if (!empty($getPath_mortgage)) {
                        $filename = $getPath_mortgage[0]['filename'];
                        $getpathloc_mortgage = $getPath_mortgage[0]['fileLocation'];
                        return response()->file(storage_path('app/'.$getpathloc_mortgage));
                    }else{

                        $status_message = 'Save Successfully';
                        return response()->json(['success'=>$status_message]);
                    }




                 }
        public function viewpdf($id){

            $getDateView = cocogen_estimate_motor_personal_info::select('viewPdf')->where('transno',$id)->get();
            $gdate = date('Y-m-d H:i:s');
             if($getDateView[0]['viewPdf']==null || $getDateView[0]['viewPdf']=='0000-00-00 00:00:00'){

                  $insertDate =cocogen_estimate_motor_personal_info::where('transno',$id)->first();
                  $insertDate->exists = true;
                  $insertDate->viewPdf = $gdate;
                  $insertDate->save();
             }
            $status =array('status'=>'Issued',
                            'disableAll'=>'1',
                            'updated_at' =>$gdate);
            cocogen_estimate_motor_personal_info::where('id',$id)->update($status);
          $policy =cocogen_estimate_motor_series::select('policyNo')->where('gid',$id)->get();

          $policy_id = $policy[0]->policyNo;
          $basicInfo =  cocogen_estimate_motor_add_car_info::join('cocogen_estimate_motor_personal_info','cocogen_estimate_motor_personal_info.transno','cocogen_estimate_motor_add_car_info.gid')
                                                                ->where('cocogen_estimate_motor_add_car_info.gid',$id)->get();

          $Accessories =cocogen_estimate_accesories::where('gid',$id)->get();
             $accessories = '';
             foreach( $Accessories as $value){
                 $accessories .= $value['accessories'].',';
             }

            $perilitem = cocogen_estimate_motor_personal_info::where('transno',$id)->get();

            $ownerId = !empty (\Auth::user()->id) ? \Auth::user()->id : '';
             if($ownerId == ''){
                $ownerId = $perilitem[0]['userLogin'];
             }else{
                $ownerId = \Auth::user()->id;
             }
            $producerCode  = cocogen_set_agent_code::where('ownerId',$ownerId)->get();
            $taxes =  cocogen_estimate_summary::where('gid',$id)->get();
            $vehicleInfo=cocogen_estimate_motor_info::where('gid',$id)->get();
            $cocogen_estimate_accesories= cocogen_estimate_accesories::groupBy('gid')
                                                                ->selectRaw('*, sum(amount) as sum')
                                                                ->where('gid',$id)
                                                                ->get();
             $imagePath = public_path('images').'/motor_net/padinsig.png';
             $comPute = !empty($cocogen_estimate_accesories[0]['sum']) ? $cocogen_estimate_accesories[0]['sum'] : 0 ;
             $getInvoice = cocogen_motor_net_rating_serial::select('policyNo','created_at')->where('gid',$id)->get();

             $agentemail = $perilitem[0]['agent'];
             $issuedate =date('Y-m-d', strtotime($getInvoice[0]['created_at']));
             $issuefname =date('ymd', strtotime($getInvoice[0]['created_at']));
             $get_agent_name = users::select('name')->where('email',$agentemail)->get();

             $agentissue=$get_agent_name[0]['name'].'/'.$issuedate;
             $actofnature_check = $vehicleInfo[0]['actsOfNature'];
             $actsOfNature = $vehicleInfo[0]['actOfNatureCompute'];
             $header= public_path('images').'/motor_net/cocogen_header.png';
             $footer= public_path('images').'/motor_net/cocogen_footer.png';
             $data = array(
                   'comPute'=>$comPute,
                   'policyno'=>$policy_id,
                   'perilitem'=>$perilitem,
                   'taxes'=>$taxes,
                   'accessories'=> rtrim($accessories, ',') == 'None' ? rtrim($accessories, ',') : '' ,
                   'vehicleInfo'=>$vehicleInfo,
                   'imagePath'=>$imagePath,
                   'producerCode'=>$producerCode,
                   'agentissue'=>$agentissue,
                   'issuedate'=>$issuedate,
                   'actofnature_check' =>$actofnature_check,
                   'actsOfNature'=>$actsOfNature,
                   'invoiceno'=>$getInvoice[0]['policyNo'],
                   'header'=>$header,
                   'footer'=>$footer,
                   'basicInfo'=>$basicInfo);


                   $namedatepolicy = $issuefname.'_'.$policy_id;
                   $hasht =$namedatepolicy;

                    $checkPdf = cocogen_estimate_compre_file::where('transid',$id)->get();

                    if(count($checkPdf) != 1 ){

                        $cocogen_estimate_compre_file = new cocogen_estimate_compre_file;
                        $cocogen_estimate_compre_file->tnxid = "MC-MNCN-COMPRE-". date('y') . "-". $id . "-00";
                        $cocogen_estimate_compre_file->filename =  $hasht.'-COCCOMPRE';
                        $cocogen_estimate_compre_file->transid = $id;
                        $cocogen_estimate_compre_file->fileLocation = 'public/pdf/compre_no_header/'.$hasht.'-COCCOMPRE.pdf';
                        $cocogen_estimate_compre_file->save();
                    }else{

                        $cocogen_estimate_compre_file = new cocogen_estimate_compre_file;
                        $cocogen_estimate_compre_file->tnxid = "MC-MNCN-COMPRE-". date('y') . "-". $id . "-00";
                        $cocogen_estimate_compre_file->transid = $id;
                        $cocogen_estimate_compre_file->filename =  $hasht.'-COCCOMPRE';
                        $cocogen_estimate_compre_file->fileLocation = 'public/pdf/compre_no_header/'.$hasht.'-COCCOMPRE.pdf';
                        $cocogen_estimate_compre_file->update();

                    }

                $pdf = PDF::loadView('pdf.motor_no', $data);
                $pdf->setPaper('A4', 'portrait');
                Storage::put('public/pdf/compre_no_header/'.$hasht.'-COCCOMPRE.pdf', $pdf->output());

                 $pdf = PDF::loadView('pdf.motor', $data);
                 $pdf->setPaper('A4', 'portrait');
                 Storage::put('public/pdf/compre/'.$hasht.'-COCCOMPRE.pdf', $pdf->output());

                 return $pdf->download('COCCTPL.pdf');
     }

     public function downloadPDFCOMPRE($id){

        $cocogen_compre_carinfo = cocogen_estimate_motor_info::where('gid', '=', $id)->get();
        $cocogen_compre_personalinfo = cocogen_estimate_motor_personal_info::where('transno', '=', $id)->get();
        $cocogen_compre_addtlcarinfo = cocogen_estimate_motor_add_car_info::where('gid', '=', $id)->get();
        $cocogen_estimate_motor_series = cocogen_estimate_motor_series::where('gid', '=', $id)->get();

        $dtCreated = date('Y-m-d', strtotime($cocogen_compre_addtlcarinfo[0]['policyInceptionDate']));
        $futureDate =date('Y-m-d', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['policyInceptionDate'])) );
        $cocogen_summary = cocogen_estimate_summary::where('gid',$id)->get();
        $issuedate = date('Y-m-d',strtotime($cocogen_estimate_motor_series[0]['created_at']));
        $assured = $cocogen_compre_personalinfo[0]['firstName'] ." ".$cocogen_compre_personalinfo[0]['lastName'];
        $address = $cocogen_compre_personalinfo[0]['residenceAddress'];
        $policyNo = $cocogen_compre_personalinfo[0]['policyNo'];
        $model = $cocogen_compre_carinfo[0]['year']." ".$cocogen_compre_carinfo[0]['brand']." ".$cocogen_compre_carinfo[0]['model'];
        $promoCode = $cocogen_compre_carinfo[0]['promoCode'];
        $bodyType = $cocogen_compre_carinfo[0]['bodyType'];
        $color = $cocogen_compre_addtlcarinfo[0]['color'];
        $chassisNo = $cocogen_compre_addtlcarinfo[0]['chasisNo'];

        $engineNo = $cocogen_compre_addtlcarinfo[0]['engineNo'];
        $plateNo = $cocogen_compre_addtlcarinfo[0]['plateNo'];
        $inceptDate = $dtCreated .' - '. $futureDate;
        $ODTheft = !empty($cocogen_compre_carinfo[0]['ownDamageCompute']) ? $cocogen_compre_carinfo[0]['ownDamageCompute'] : $cocogen_compre_carinfo[0]['ownDamage'];
        $mortgagee = $cocogen_compre_addtlcarinfo[0]['mortgageValue'];
        $deductible = $cocogen_summary[0]['deductible'];
        $bodilyInjury = number_format($cocogen_compre_carinfo[0]['bodyInjury'], 2, '.', ',');
        $propertyDamage =  number_format($cocogen_compre_carinfo[0]['propertyDamage'], 2, '.', ',');
        $autoPA =  $cocogen_compre_carinfo[0]['autoPersonalAccident'];
        $actsOfNature =  $cocogen_compre_carinfo[0]['actOfNatureCompute'];
        $actsOfNature_check =  !empty($cocogen_compre_carinfo[0]['actOfNature']) ? $cocogen_compre_carinfo[0]['actOfNature'] :0;
        $RSCC =  $cocogen_compre_carinfo[0]['ownDamageCompute'];
        $imagePath = public_path('images').'/motor_net/padinsig.png';
        $header= public_path('images').'/motor_net/cocogen_header.png';
        $footer= public_path('images').'/motor_net/cocogen_footer.png';
        $finalDue = $cocogen_summary[0]['finalAmountDue'];
        $issuedateattach = date('Ymd',strtotime($cocogen_estimate_motor_series[0]['created_at']));

        $data = array('issuedate'=>$issuedate,
                    'assured'=>$assured,
                    'address'=>$address,
                    'model'=>$model,
                    'txnid'=>$id,
                    'bodyType'=>$bodyType,
                    'dtCreated'=>$dtCreated,
                    'futureDate'=>$futureDate,
                    'color'=>$color,
                    'chassisNo'=>$chassisNo,
                    'engineNo'=>$engineNo,
                    'plateNo'=>$plateNo,
                    'inceptDate'=>$inceptDate,
                    'ODTheft'=>$ODTheft,
                    'mortgagee'=>$mortgagee,
                    'deductible'=>$deductible,
                    'bodilyInjury'=>$bodilyInjury,
                    'propertyDamage'=>$propertyDamage,
                    'autoPA'=>$autoPA,
                    'actsOfNature'=>$actsOfNature,
                    'actsOfNature_check'=>$actsOfNature_check,
                    'promoCode'=>$promoCode,
                    'policyNo'=>$policyNo,
                    'imagePath'=>$imagePath,
                    'finalDue'=>$finalDue,
                    'header'=>$header,
                    'footer'=>$footer,
                    'RSCC'=>$RSCC);


        // $hasht = Hash::make($id.'-COCCOMPRE');
        // $timestamp = Carbon::now(); // Replace with your timestamp
        // $formattedDate = $timestamp->format('Ymd');
        $hasht = 'Cert'.'_'.$id.'_'.$issuedateattach;

        $checkPdfmortgage = cocogen_estimate_compre_file_mortgage::where('transid',$id)->get();
        if(count($checkPdfmortgage) != 1 ){
            $cocogen_compre_file = new cocogen_estimate_compre_file_mortgage;
            $cocogen_compre_file->tnxid = $id;
            $cocogen_compre_file->transid = $id;
            $cocogen_compre_file->filename =  $hasht.'-COCCOMPRE';
            $cocogen_compre_file->fileLocation = 'public/pdf/mortgage_no_header/'. $hasht.'-COCCOMPRE.pdf';
            $cocogen_compre_file->save();
        }else{

            $cocogen_compre_file = new cocogen_estimate_compre_file_mortgage;
            $cocogen_compre_file->tnxid = $id;
            $cocogen_compre_file->transid = $id;
            $cocogen_compre_file->filename =  $hasht.'-COCCOMPRE';
            $cocogen_compre_file->fileLocation = 'public/pdf/mortgage_no_header/'.$hasht.'-COCCOMPRE.pdf';
            $cocogen_compre_file->update();

        }

        $pdf = PDF::loadView('pdf.bankcert_no', $data);
        Storage::put('public/pdf/mortgage_no_header/'. $hasht.'-COCCOMPRE.pdf', $pdf->output());
        $pdf = PDF::loadView('pdf.bankcert_motor', $data);
        Storage::put('public/pdf/mortgage/'. $hasht.'-COCCOMPRE.pdf', $pdf->output());
         return $pdf->download('COMPRECTPL.pdf');

    }

     public function viewSendMail(Request $request){

        $conditionid = !empty($request->trans_id) ? $request->trans_id : $request->encrpyttransno;
        $id = !empty($request->route('id')) ? $request->route('id') : $conditionid ;

        if(strlen($id) <= 50) {

        }else{
              $id=(Crypt::decrypt($id));
        }

            $getDetails = cocogen_estimate_motor_personal_info::select('firstName','lastName','emailAddress')->where('transno',$id)->get();

            foreach ($getDetails as $details) {
                $fullName = $details->firstName . ' ' . $details->lastName;
                $emailAddress = $details->emailAddress;
            }

           $gdate = date("Y-m-d H:i:s", strtotime("+8 hours"));
            $status =array('action'=>'Issued',
                                'updated_at' =>$gdate);
            cocogen_estimate_summary::where('id',$id)->update($status);
             $status =array('status'=>'Issued',
                            'disableAll'=>'1',
                                'updated_at' =>$gdate);
            cocogen_estimate_motor_personal_info::where('id',$id)->update($status);
            $logs =array('category'=>'MOTORPLUS',
                        'description'=>'Send Email Personal Summary Information ',
                        'action'=>'Policy Send',
                        'transno'=>$id,
                        'created_at'=>$gdate);
                cocogen_estimate_motorplus_historylogs::insert($logs);
            $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 25)->get(); // uncoment pag ililve
            // $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 25)->get();

            $external = str_replace( "fullname", $fullName, $cocogen_admin_emailtemplate[0]['content']);

            // $this->viewpdf($id);

            $getFile = cocogen_estimate_compre_file::where('transid',$id)->get();

            $path = storage_path('app/' . $getFile[0]['fileLocation']);

            $filename = $getFile[0]['filename'];

            $getFileNameMortgage = cocogen_estimate_compre_file_mortgage::where('transid',$id)->get();
            $morgage_check = cocogen_estimate_motor_add_car_info::select('mortgageValue')->where('gid', $id)->get();

            if (!empty($morgage_check[0]['mortgageValue']) && ($morgage_check[0]['mortgageValue']) !== '0') {

                // If there is a value for 'mortgageValue', display 1
                $mortgagee = '1';

                $mortgage_filename = $getFileNameMortgage[0]->filename.'.pdf';

                $mortgage_file_location = $getFileNameMortgage[0]->fileLocation;
            } else {

                // If 'mortgageValue' is empty or just whitespace, display 0
                $mortgagee = '0';
                $mortgage_filename = "";
                $mortgage_file_location = "";
            }



        $this->emailsendCompreAttached($fullName, $emailAddress, $external,$path,$id,$filename,$mortgagee,$mortgage_filename,$mortgage_file_location);

        // echo "Email Sent Check your";
        //  // check for failures
        // if (Mail::failures()) {
        //     $message = 'Email Not Sent';
        // }else{
        //     $message = 'Email Sent';
        // }
        $message = 'Email Sent';
          return response()->json($message);

    }


   public function emailsendCompreAttached($fname, $email, $content,$path,$id,$filename,$mortgagee,$mortgage_filename,$mortgage_file_location) {
            $path = str_replace("_no_header", "", $path);
            $path2= public_path('images').'/motor_net/Motorcarlast.pdf';
            $cleanedFilename = str_replace("_no_header", "", $mortgage_file_location);
            $path3 = storage_path('app/'. $cleanedFilename);
            $data = array('fname'=>$fname, 'email'=>$email,'content'=>$content);

            Mail::send('emailtemplate.compreexternal', $data, function($message) use ($fname, $email,$content,$path,$id,$filename,$mortgagee,$mortgage_filename,$path2,$path3)
              {
                $message->to($email, 'COCOGEN')->subject($fname.', here is your Motor Excel Plus Insurance Policy')->from('client_services@cocogen.com', 'COCOGEN');
                  $message->attach($path, array(
                                'as'    => $filename.".pdf",
                                'mime'  => 'application/pdf'));

                    $message->attach($path2, array(
                        'as'    => "Motor Vehicle Insurance Policy.pdf",
                        'mime'  => 'application/pdf'
                    ));
                    if($mortgagee === '1'){
                        $message->attach($path3, array(
                            'as'    => $mortgage_filename,
                            'mime'  => 'application/pdf'
                        ));
                    }




              });

    }

    public function setAgentCode(Request $request){
        $ownerId = \Auth::user()->id;
        $checkifUpdate = cocogen_set_agent_code::where('ownerId',$ownerId)->get();

        if($checkifUpdate->isEmpty()){

           $cocogen_save_agent = new cocogen_set_agent_code;
           $cocogen_save_agent->ownerId = $ownerId;
           $cocogen_save_agent->agentName = $request->agentName;
           $cocogen_save_agent->agentCode = $request->agentCode;
           $cocogen_save_agent->save();
           return Redirect::back();
        }else{


            $cocogen_save_agent =cocogen_set_agent_code::where('ownerId',$ownerId)->first();
            $cocogen_save_agent->exists = true;
           $cocogen_save_agent->ownerId = $ownerId;
           $cocogen_save_agent->agentName = $request->agentName;
           $cocogen_save_agent->agentCode = $request->agentCode;
           $cocogen_save_agent->save();
           return Redirect::back();
        }


    }

    public function check_redirect_2nd_page(Request $request){

        $id = $request->route('id');
        if(strlen($id) <= 50) {

        }else{
              $id=(Crypt::decrypt($id));
        }
        $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
        $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
        $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
        $alllink = "";
        if(Auth::user() === null){
             return redirect()->route('login');
        }else{
        $user = auth()->user()->email;
        }


            if($cocogen_admin_productlinkthumbnail){
                foreach ($cocogen_admin_productlinkthumbnail as $val) {
                    if(!$alllink){
                        $alllink = "'".$val->link."'";
                    }else{
                        $alllink = $alllink . "," . "'".$val->link."'" ;
                    }
                }
            }
            if(count($cocogen_admin_productlinkthumbnail) > 0){
                $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                    left outer join cocogen_admin_productlink as b on b.link = a.link
                    order by 1 desc
                     ');
            }else{
                $results = "";
            }
        // $getDetail = cocogen_estimate_motor_personal_info::where('transno',$id)->get();

        $cocogen_fmv = cocogen_fmv::get();
        $cocogen_brand_year = cocogen_brand_year::get();
        $cocogen_compre_bipds= cocogen_estimate_body_injury::get();
        $accessory = cocogen_compre_accessory::get();
        $cocogen_fmv_years = DB::table('cocogen_fmv_year')->distinct()->select('year')->groupBy('year')->get();
        $accessories = cocogen_compre_accessory::get();
        $rateForAONVal = cocogen_estimate_act_of_nature_rate::get();
        $rateForAON = $rateForAONVal[0]['rateForAON'];
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.motor_net.update.edit_record_new_2nd', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'cocogen_fmv_years'=>$cocogen_fmv_years,'accessories'=>$accessories,'cocogen_compre_bipds'=>$cocogen_compre_bipds,'rateForAON'=>$rateForAON]);
    }

    public function check_redirect_4nd_page(Request $request){

        $id = $request->route('id');
        if(strlen($id) <= 50) {

        }else{
              $id=(Crypt::decrypt($id));
        }
        $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
        $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
        $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
        $alllink = "";
        if(Auth::user() === null){
             return redirect()->route('login');
        }else{
        $user = auth()->user()->email;
        }


            if($cocogen_admin_productlinkthumbnail){
                foreach ($cocogen_admin_productlinkthumbnail as $val) {
                    if(!$alllink){
                        $alllink = "'".$val->link."'";
                    }else{
                        $alllink = $alllink . "," . "'".$val->link."'" ;
                    }
                }
            }
            if(count($cocogen_admin_productlinkthumbnail) > 0){
                $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                    left outer join cocogen_admin_productlink as b on b.link = a.link
                    order by 1 desc
                     ');
            }else{
                $results = "";
            }

        $check_motor = cocogen_estimate_motor_add_other_personal_info::where('gid',$id)->get();

        if ($check_motor->isEmpty()) {
            //empty
             $cocogen_redirect = '1';
        } else {
            //notempty
             $cocogen_redirect = '2';
        }

        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];

        return response()->json(['cocogen_redirect'=>$cocogen_redirect]);
        // return view('getaquote.motor_net.update.edit_record_new_4th', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'cocogen_redirect'=>$cocogen_redirect]);
    }

    public function update_record_other_record(Request $request){
        $id = $request->route('id');


        if(strlen($id) <= 50) {
            abort(404);
        }else{
              $id=(Crypt::decrypt($id));
        }

        $check_motor_link = cocogen_estimate_summary::select('validate_link')->where('gid',$id)->get();
        if ($check_motor_link[0]['validate_link'] == 1) {
            //empty
            return redirect()->route('login');
        } else {
            //notempty

        }


        $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
        $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
        $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get();
        $alllink = "";
        if($cocogen_admin_productlinkthumbnail){
            foreach ($cocogen_admin_productlinkthumbnail as $val) {
                if(!$alllink){
                    $alllink = "'".$val->link."'";
                }else{
                    $alllink = $alllink . "," . "'".$val->link."'" ;
                }
            }
        }
        if(count($cocogen_admin_productlinkthumbnail) > 0){
            $results = DB::select('select b.thumbnailOrder,b.product, a.link, a.imageLink from (select DISTINCT(x.link),x.name, x.imagelink,x.description from (select * from cocogen_admin_parentproduct union select * from cocogen_admin_subparentproduct)x where x.link in (' . $alllink . ') group by x.link)a
                left outer join cocogen_admin_productlink as b on b.link = a.link
                order by 1 desc
                 ');
        }else{
            $results = "";
        }


        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.motor_net.update.edit_record_new_4th', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video]);
    }

    public function fetchBodyInjury(Request $request){

      $bodilyInjury = $request->get('bodilyInjury');
      $bodilyInjuryClean = str_replace(',', '', $bodilyInjury);
         $data = cocogen_estimate_body_injury::where('amount','=',$bodilyInjuryClean)
                     ->get();
         $dataProperty = cocogen_estimate_property_damage::where('amount','=',$bodilyInjuryClean)
                     ->get();

         $arr  = array();
         $arr [0] =  $data[0]['pc'];
         $arr [1] = $dataProperty[0]['pc'];

    echo json_encode($arr);

}

public function check_disable(Request $request){
    $id = $request->route('id');
    if(strlen($id) <= 50) {

    }else{
        $id=(Crypt::decrypt($id));
    }

    $cocogen_check = cocogen_estimate_motor_personal_info::select('*')->where('transno', $id)->get();
    $disableAll = $cocogen_check->pluck('disableAll')->first();
    $stat = $cocogen_check->pluck('status')->first();
    if ($disableAll === null) {
        // The value of `disableAll` is null
        $status = '0';
    } else {
        // The value of `disableAll` is not null or the record was not found
        // Perform other actions if needed
        $status = '1';
    }
    return response()->json(['status'=>$status,'stat'=>$stat]);


}


public function truncatemotor(){
    cocogen_estimate_accesories::truncate();
    cocogen_estimate_motor_add_car_info::truncate();
    cocogen_estimate_motor_add_other_personal_info::truncate();
    cocogen_estimate_motor_info::truncate();
    cocogen_estimate_motor_personal_info::truncate();
    cocogen_estimate_motor_series::truncate();
    cocogen_estimate_motorplus_historylogs::truncate();
    cocogen_estimate_summary::truncate();
    cocogen_motor_net_rating_serial::truncate();
    cocogen_estimate_compre_file_mortgage::truncate();
    cocogen_estimate_compre_file::truncate();
}

}

