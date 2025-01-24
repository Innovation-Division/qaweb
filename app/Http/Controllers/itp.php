<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_meta;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_itp_countries;
use App\Models\cocogen_itp_premium_worldwide;
use App\Models\cocogen_itp_premium_schengen;
use App\Models\cocogen_itp_premium_asia;
use App\Models\cocogen_itp_cruise_premium_worldwide;
use App\Models\cocogen_itp_cruise_premium_schengen;
use App\Models\cocogen_itp_cruise_premium_asia;
use App\Models\cocogen_itp_premium_worldwide_travel;
use App\Models\cocogen_itp_premium_schengen_travel;
use App\Models\cocogen_itp_premium_asia_travel;
use App\Models\cocogen_itp_cruise_premium_worldwide_travel;
use App\Models\cocogen_itp_cruise_premium_schengen_travel;
use App\Models\cocogen_itp_cruise_premium_asia_travel;
use App\Models\cocogen_itp_premium_worldwide_liability;
use App\Models\cocogen_itp_premium_schengen_liability;
use App\Models\cocogen_itp_premium_asia_liability;
use App\Models\cocogen_itp_cruise_premium_worldwide_liability;
use App\Models\cocogen_itp_cruise_premium_schengen_liability;
use App\Models\cocogen_itp_cruise_premium_asia_liability;
use App\Models\cocogen_itp_premium_worldwide_burial_benefits;
use App\Models\cocogen_itp_premium_schengen_burial_benefits;
use App\Models\cocogen_itp_premium_asia_burial_benefits;
use App\Models\cocogen_itp_cruise_premium_worldwide_burial_benefits;
use App\Models\cocogen_itp_cruise_premium_schengen_burial_benefits;
use App\Models\cocogen_itp_cruise_premium_asia_burial_benefits;
use App\Models\cocogen_itp_premium_worldwide_add;
use App\Models\cocogen_itp_premium_schengen_add;
use App\Models\cocogen_itp_premium_asia_add;
use App\Models\cocogen_itp_cruise_premium_worldwide_add;
use App\Models\cocogen_itp_cruise_premium_schengen_add;
use App\Models\cocogen_itp_cruise_premium_asia_add;
use App\Models\cocogen_itp_covid_premium;
use App\Models\cocogen_itp_days_count;
use App\Models\cocogen_international_trans;
use App\Models\cocogen_international_trans_destination;
use App\Models\cocogen_international_trans_destination_cruise;
use App\Models\cocogen_international_trans_beneficiaries;
use App\Models\cocogen_international_trans_emergency_contact;
use App\Models\cocogen_international_trans_upload;
use App\Models\cocogen_international_package;

use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use DateTime;
use DB;
use Illuminate\Support\Arr;

class itp extends Controller
{
    public function newitp(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_itp_countries = cocogen_itp_countries::where('block', '=', "N")->orderBy('country', 'Asc')->get();
        // $cocogen_international_package = cocogen_international_package::select('package')->orderBy('id', 'Asc')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "itp")->get();
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

        return view('getaquote.itp.newhome', [
            'title' => $title,
            'cocogen_admin_footer' => $cocogen_admin_footer,
            'cocogen_itp_countries' => $cocogen_itp_countries,
            // 'cocogen_international_package' => $cocogen_international_package,
            'cocogen_admin_productlink' => $cocogen_admin_productlink,
            'metadescription' => $metadescription,
            'keyword' => $keyword,
            'cocogen_admin_main' => $cocogen_admin_main,
            'cocogen_admin_submain' => $cocogen_admin_submain,
            'cocogen_admin_subchild' => $cocogen_admin_subchild,
            'start' => $start,
            'end' => $end]);
    }

    public function get_prem(Request $request){
        $cruise = $request->get('include_cruise');
        $destinations = $request->get('destinations');
        $destinations2 = $request->get('destinations_cruise');
        //$destinations =  str_replace('"', '', $destinations);
        $noofday = $request->get('noofday');
        $covid = $request->get('covid');
        $package = $request->get('package');
        $package_table =strtolower( $package . "_individual");

        $destination = explode(',', $destinations);
        $destinations2 = explode(',', $destinations2);
        // DESTINATION FIRST
        $cocogen_itp_countries = cocogen_itp_countries::whereIn('country',$destination)->get();
        $cocogen_itp_days_count = cocogen_itp_days_count::where('id', '=', (int)$noofday)->get();

        $shengen = "";
        $worldwide = "";
        foreach($cocogen_itp_countries as $cocogen_itp_country){
            if($cocogen_itp_country->shengen === "Y"){
                $shengen = "Y";
            }else{
                if($cocogen_itp_country->continent != "Asia"){
                    $worldwide = "Y";
                }
            }

        }
         
        if($shengen === "Y" || $worldwide === "Y" ){
             
            if($cruise === "Yes"){
                $data_prem_shengen='0';
                $data_prem_world='0';
                if($shengen == "Y"){
                    $data_prem_shengen = cocogen_itp_cruise_premium_schengen::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_shengen_travel = cocogen_itp_cruise_premium_schengen_travel::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_shengen_liability = cocogen_itp_cruise_premium_schengen_liability::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_shengen_burial_benefits = cocogen_itp_cruise_premium_schengen_burial_benefits::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_shengen_add = cocogen_itp_cruise_premium_schengen_add::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                }
                if($worldwide == "Y"){
                    $data_prem_world = cocogen_itp_cruise_premium_worldwide::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_world_travel = cocogen_itp_cruise_premium_worldwide_travel::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_world_liability = cocogen_itp_cruise_premium_worldwide_liability::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_world_burial_benefits = cocogen_itp_cruise_premium_worldwide_burial_benefits::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    $data_prem_world_add = cocogen_itp_cruise_premium_worldwide_add::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                }
            
                $data_prem_shengen = !empty($data_prem_shengen) ? $data_prem_shengen :"0";
                $data_prem_world = !empty($data_prem_world) ? $data_prem_world : "0";

                $data_prem_shengen_travel = !empty($data_prem_shengen_travel) ? $data_prem_shengen_travel :"0";
                $data_prem_world_travel = !empty($data_prem_world_travel) ? $data_prem_world_travel : "0";

                $data_prem_shengen_liability = !empty($data_prem_shengen_liability) ? $data_prem_shengen_liability :"0";
                $data_prem_world_liability = !empty($data_prem_world_liability) ? $data_prem_world_liability : "0";

                $data_prem_shengen_burial_benefits = !empty($data_prem_shengen_burial_benefits) ? $data_prem_shengen_burial_benefits :"0";
                $data_prem_world_burial_benefits = !empty($data_prem_world_burial_benefits) ? $data_prem_world_burial_benefits : "0";

                $data_prem_shengen_add = !empty($data_prem_shengen_add) ? $data_prem_shengen_add :"0";
                $data_prem_world_add = !empty($data_prem_world_add) ? $data_prem_world_add : "0";


                if($data_prem_shengen >=  $data_prem_world){
                    $data_prem=$data_prem_shengen;

                }else{
                    $data_prem=$data_prem_world;
                }
                if($data_prem_shengen_travel >=  $data_prem_world_travel){
                    $data_prem_travel=$data_prem_shengen_travel;
                }else{
                    $data_prem_travel=$data_prem_world_travel;
                }

                if($data_prem_shengen_liability >=  $data_prem_world_liability){
                    $data_prem_liability=$data_prem_shengen_liability;
                }else{
                    $data_prem_liability=$data_prem_world_liability;
                }

                if($data_prem_shengen_burial_benefits >=  $data_prem_world_burial_benefits){
                    $data_prem_burial_benefits=$data_prem_shengen_burial_benefits;
                }else{
                    $data_prem_burial_benefits=$data_prem_world_burial_benefits;
                }

                if($data_prem_shengen_add >=  $data_prem_world_add){
                    $data_prem_add=$data_prem_shengen_add;
                }else{
                    $data_prem_add=$data_prem_world_add;
                }


            }else{

                $data_prem_shengen='0';
                 $data_prem_world='0';
                 $data_prem_shengen_travel='0';
                 $data_prem_world_travel='0';
                 $data_prem_shengen_liability='0';
                 $data_prem_world_liability='0';
                 $data_prem_shengen_burial_benefits='0';
                 $data_prem_world_burial_benefits='0';
                 $data_prem_shengen_add='0';
               
                    if($shengen == "Y"){
                         
                        $data_prem_shengen = cocogen_itp_premium_schengen::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_shengen_travel = cocogen_itp_premium_schengen_travel::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();

                        $data_prem_shengen_liability = cocogen_itp_premium_schengen_liability::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();

                        $data_prem_shengen_burial_benefits = cocogen_itp_premium_schengen_burial_benefits::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_shengen_add = cocogen_itp_premium_schengen_add::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();

                    }
                    if($worldwide == "Y"){

                        $data_prem_world = cocogen_itp_premium_worldwide::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_travel = cocogen_itp_premium_worldwide_travel::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_liability = cocogen_itp_premium_worldwide_liability::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_burial_benefits = cocogen_itp_premium_worldwide_burial_benefits::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                        $data_prem_world_add = cocogen_itp_premium_worldwide_add::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                    }

                    $data_prem_shengen_value = !empty($data_prem_shengen[0][$package_table]) ? $data_prem_shengen[0][$package_table] :0;
                    $data_prem_world_value = !empty($data_prem_world[0][$package_table]) ? $data_prem_world[0][$package_table] :0;

                    $data_prem_shengen_value_travel = !empty($data_prem_shengen_travel[0][$package_table]) ? $data_prem_shengen_travel[0][$package_table] :0;
                    $data_prem_world_value_travel = !empty($data_prem_world_travel[0][$package_table]) ? $data_prem_world_travel[0][$package_table] :0;

                    $data_prem_shengen_value_liability = !empty($data_prem_shengen_liability[0][$package_table]) ? $data_prem_shengen_liability[0][$package_table] :0;
                    $data_prem_world_value_liability = !empty($data_prem_world_liability[0][$package_table]) ? $data_prem_world_liability[0][$package_table] :0;

                    $data_prem_shengen_value_burial_benefits = !empty($data_prem_shengen_burial_benefits[0][$package_table]) ? $data_prem_shengen_burial_benefits[0][$package_table] :0;
                    $data_prem_world_value_burial_benefits = !empty($data_prem_world_burial_benefits[0][$package_table]) ? $data_prem_world_burial_benefits[0][$package_table] :0;

                    $data_prem_shengen_value_add = !empty($data_prem_shengen_add[0][$package_table]) ? $data_prem_shengen_add[0][$package_table] :0;
                    $data_prem_world_value_add = !empty($data_prem_world_add[0][$package_table]) ? $data_prem_world_add[0][$package_table] :0;

                    if($data_prem_shengen_value >=  $data_prem_world_value){
                        $data_prem=$data_prem_shengen;
                    }else{
                        $data_prem=$data_prem_world;
                    }

                    if($data_prem_shengen_value_travel >=  $data_prem_world_value_travel){
                        $data_prem_travel=$data_prem_shengen_travel;
                    }else{
                        $data_prem_travel=$data_prem_world_travel;
                    }

                    if($data_prem_shengen_value_liability>=  $data_prem_world_value_liability){
                        $data_prem_liability=$data_prem_shengen_liability;
                    }else{
                        $data_prem_liability=$data_prem_world_liability;
                    }

                    if($data_prem_shengen_value_burial_benefits>=  $data_prem_world_value_burial_benefits){
                        $data_prem_burial_benefits=$data_prem_shengen_burial_benefits;
                    }else{
                        $data_prem_burial_benefits=$data_prem_world_burial_benefits;
                    }

                    if($data_prem_shengen_value_add>=  $data_prem_world_value_add){
                        $data_prem_add=$data_prem_shengen_add;
                    }else{
                        $data_prem_add=$data_prem_world_add;
                    }


                }

        }else{
            if($cruise === "Yes"){
                $data_prem = cocogen_itp_cruise_premium_asia::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_travel = cocogen_itp_cruise_premium_asia_travel::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_liability = cocogen_itp_cruise_premium_asia_liability::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_burial_benefits = cocogen_itp_cruise_premium_asia_burial_benefits::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_add = cocogen_itp_cruise_premium_asia_add::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
            }else{
                $data_prem = cocogen_itp_premium_asia::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_travel = cocogen_itp_premium_asia_travel::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_liability = cocogen_itp_premium_asia_liability::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_burial_benefits = cocogen_itp_premium_asia_burial_benefits::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
                $data_prem_add = cocogen_itp_premium_asia_add::select($package_table)->where('no_of_days', '=', (int)$cocogen_itp_days_count[0]["days_original_count"])->get();
            }

        }

        // return response()->json($data_prem, 201);
        return response()->json([
            'data_prem' => $data_prem,
            'data_prem_travel' => $data_prem_travel,
            'data_prem_liability' => $data_prem_liability,
            'data_prem_burial_benefits' => $data_prem_burial_benefits,
            'data_prem_add' => $data_prem_add
            , 201]);
    }

    public function get_premwithcovid(Request $request){
        $noofdaysorig = $request->get('noofdaysorig');
        $data = cocogen_itp_covid_premium::where('no_of_days', '=', (int)$noofdaysorig)->get();

        return response()->json($data, 201);
    }

    public function get_promo(Request $request){
        $data = DB::table('cocogen_promo')
                   ->select('id','rate','amount','type', 'limit_usage')
                   ->where('effectiveDate', '<', \DB::raw('NOW()'))
                   ->where('expiryDate', '>', \DB::raw('NOW()'))
                   ->where('transType',  "INTERNATIONAL")
                   ->where('promo', $request->get('promo'))
                   ->where('limit_usage','>', 0)
                   ->get();
       return response()->json($data, 201);
   }

   public function get_prem_covid(Request $request){

    $noofday = $request->get('noofdaysorig');
    $package = strtolower($request->get('package'));
    $package_table = $package."_individual as prem";
    $cocogen_itp_days_count = cocogen_itp_days_count::where('id', '=', (int)$noofday)->get();
    $noofday_count = ($cocogen_itp_days_count[0]['days_original_count']);

    $data = cocogen_itp_covid_premium::select($package_table)
        ->where('no_of_days', '=', (int)$noofday_count)
        ->get();

    return response()->json($data, 201);
    }


    public function get_package(Request $request){

        $destinations = $request->get('destinations');

        $cocogen_itp_countries = cocogen_itp_countries::select('continent','shengen')->where('country', '=',$destinations)->get();

        if($cocogen_itp_countries[0]['shengen'] == 'Y'){
            $data = cocogen_international_package::select('package')->where('shengen', '=', 'Y')
            ->get();
            $continent ='Y';

        }else{
            $data = cocogen_international_package::select('package')->get();
            $continent ='N';

        }
        return response()->json(['data'=> $data,'continent' => $continent], 201);
        }


    public function get_package_delete(Request $request){
        $destinations = $request->get('destinations');
        $destinations = explode(',', $destinations);



        $check = 0;
        foreach ($destinations as $destinations) {
            $check =cocogen_itp_countries::where('country', $destinations)->where('shengen','=','Y')->count();
        }
        if ($check == 1) {
            $data = cocogen_international_package::select('package')->where('shengen', '=', 'Y')
            ->get();
            $continent ='1';
            return response()->json(['data'=> $data,'continent' => $continent], 201);

        }else{
            $data = cocogen_international_package::select('package')->get();
            $continent ='0';
            return response()->json(['data'=> $data,'continent' => $continent], 201);
        }


    }


    public function internationalinsurancesave(Request $request){
   
        $username = "cocogenAPI";

        $password = "cocogenAPI";

        $digest = sha1($username.":".$password);

         $unparsed_json = file_get_contents("http://webapi.cocogen.ph/api/".$digest."/get/get_currency/dollar");

         $geniisysdata = json_decode($unparsed_json, true);
         

        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        $birthday = $request->get('quote_bday_all');
        $dateofBirth = date("Y-m-d", strtotime($birthday));

        $departureDate = $request->get('departure_date_itinerary');
        $dateDeparture = date("Y-m-d", strtotime($departureDate));

        $returnDate = $request->get('return_date_itinerary');
        $dateReturn = date("Y-m-d", strtotime($returnDate));

        $departureCruiseDate = $request->get('departure_date_cruise_itinerary');
        $cruiseDepartureDate = date("Y-m-d", strtotime($departureCruiseDate));

        $returnDepartureCruise = $request->get('return_date_cruise_itinerary');
        $cruiseReturnDate = date("Y-m-d", strtotime($returnDepartureCruise));

        $covid_return = $request->get('covid_return');
        $covidReturn = date("Y-m-d", strtotime($covid_return));

        // $covid_period = $request->get('covid_period');
        // if($covid_period == 'Yes'){
        //     $startTimeStamp = strtotime($dateDeparture);
        //     $endTimeStamp = strtotime($dateReturn);
        //     $timeDiff = abs($endTimeStamp - $startTimeStamp);
        //     $numberDays = $timeDiff/86400;  // 86400 seconds in one day
        //     // and you might want to convert to integer
        //     $numberDays = intval($numberDays);

        //     if($numberDays <= 14){
        //         $from_date_covid_return = $dateReturn;
        //     }else{
        //         $from_date_covid_return = date('Y-m-d', strtotime($dateDeparture. ' + 15 days'));
        //     }

        //    }else{
        //     $from_date_covid_return = $dateReturn;
        //    }

        $cocogen_international_trans = new cocogen_international_trans;
        $cocogen_international_trans->salutation = $request->get('salutation_personal_info');
        $cocogen_international_trans->status = "SAVED";
        $cocogen_international_trans->fname = $request->get('firstName_personal_info');
        if($request->get('covid_amount')){
            $cocogen_international_trans->covid_amount = $request->get('covid_amount');
        }
        $cocogen_international_trans->mname = $request->get('middleName_personal_info');
        $cocogen_international_trans->lname = $request->get('lastName_personal_info');
        $cocogen_international_trans->suffix = $request->get('suffix_4thpage');
        $cocogen_international_trans->bday = $dateofBirth;
        $cocogen_international_trans->email_add = $request->get('email_personal_info');
        $cocogen_international_trans->telno = $request->get('tel_no_info');
        $cocogen_international_trans->mobile_no = $request->get('contactNo_personal_info');
        $cocogen_international_trans->from_date = $dateDeparture;
        $cocogen_international_trans->to_date = $dateReturn;
        $cocogen_international_trans->include_cruise = $request->get('include_cruise');
        $cocogen_international_trans->cruise_from = $cruiseDepartureDate;
        $cocogen_international_trans->cruise_to = $cruiseReturnDate;
        $cocogen_international_trans->package = !empty($request->get('package')) ? $request->get('package') : $request->get('package2');
        $cocogen_international_trans->covid = $request->get('include_covid');
        $cocogen_international_trans->covid_period = $request->get('covid_period');
        $cocogen_international_trans->covid_return =  $covidReturn;
        $cocogen_international_trans->net_prem = $request->get('net_premium_all');
        $cocogen_international_trans->travel_assistance = $request->get('travel_assistance');
        $cocogen_international_trans->doc_stamp = $request->get('doc_stamp_all');
        $cocogen_international_trans->prem_tax = $request->get('premium_tax_all');
        $cocogen_international_trans->lgt_tax = $request->get('lgt_all');
        $cocogen_international_trans->personal_liability = $request->get('liability_assistance');
        $cocogen_international_trans->burial_benefits = $request->get('burialbenefits_assistance');
        $cocogen_international_trans->accidental_death_disablement = $request->get('add');
        $cocogen_international_trans->amount_due = $request->get('total_amount_due_all');
        $cocogen_international_trans->final_due = $request->get('final_total_amount_all');
        $cocogen_international_trans->purpose_travel = "Leisure / Vacation";
        $cocogen_international_trans->coverage_type = "Individual";
        $cocogen_international_trans->marital_status = $request->get('status_4thpage');
        $cocogen_international_trans->nationality = $request->get('nationality_4thpage');
        $cocogen_international_trans->gender = $request->get('gender');
        $cocogen_international_trans->place_birth = $request->get('placeofbirth_4thpage');
        $cocogen_international_trans->source_funds = $request->get('sourceofFunds_4thpage');
        $cocogen_international_trans->occupation = $request->get('occupation_4thpage');
        $cocogen_international_trans->tin = $request->get('tin_4thpage');
        $cocogen_international_trans->employeer = $request->get('employeer_4thpage');
        $cocogen_international_trans->present_address = $request->get('residence_address');
        $cocogen_international_trans->present_province = $request->get('residence_province');
        $cocogen_international_trans->present_city = $request->get('residence_municipality');
        $cocogen_international_trans->present_barangay = $request->get('residence_barangay');
        $cocogen_international_trans->permanent_address = $request->get('mailing_address');
        $cocogen_international_trans->permanent_province = $request->get('mailing_province');
        $cocogen_international_trans->permanent_city = $request->get('mailing_municipality');
        $cocogen_international_trans->permanent_barangay = $request->get('mailing_barangay');
        $cocogen_international_trans->agent_name = $request->get('agent_name');
        
        if($request->utm_source) {
            $cocogen_international_trans->utm_source = $request->utm_source;
            $cocogen_international_trans->utm_medium = $request->utm_medium;
        }
        if($request->get('promo')){
            $cocogen_international_trans->promo = $request->get('promo');
            $cocogen_international_trans->promo_less = $request->get('less_all');
            $cocogen_international_trans->pwd_tag = $request->get('');
            $cocogen_international_trans->type_disability = $request->get('type_of_disability');
            $cocogen_international_trans->year_disability = $request->get('year_disablement');
            $cocogen_international_trans->cause_disability = $request->get('cause_of_disability');
        }

        if($request->get('pwd_no_option')){
            $cocogen_international_trans->pwd_tag = "Yes";
            $cocogen_international_trans->type_disability = $request->get('type_of_disability');
            $cocogen_international_trans->year_disability = $request->get('year_disablement');
            $cocogen_international_trans->cause_disability = $request->get('cause_of_disability');
        }else{
            $cocogen_international_trans->pwd_tag = "No";
        }
        $cocogen_international_trans->updated_at = $datenow;
        $cocogen_international_trans->created_at = $datenow;
        $cocogen_international_trans->save();
        $lastid = $cocogen_international_trans->id;

        $transnoNo = "";
        if($lastid){
            $transnoNo = "PA-ITP-EC-". sprintf('%08d', $lastid);
            $cocogen_international_trans_update_transno = cocogen_international_trans::findorFail($lastid);
            $cocogen_international_trans_update_transno->trans_id = $transnoNo;
            $cocogen_international_trans_update_transno->save();

            $destinationCount = count($request->get('destination_itinerary'));

         
            for ($i = 0; $i <= $destinationCount; $i++) {
                $des_itenerary = !empty($request->get('destination_itinerary')[$i]) ? $request->get('destination_itinerary')[$i] :'0';
                if($des_itenerary){
                        $cocogen_international_trans_destination = new cocogen_international_trans_destination;
                        $cocogen_international_trans_destination->trans_id = $transnoNo;
                        $cocogen_international_trans_destination->destination = $request->get('destination_itinerary')[$i];
                        $cocogen_international_trans_destination->updated_at = $datenow;
                        $cocogen_international_trans_destination->created_at = $datenow;
                        $cocogen_international_trans_destination->save();
                }
            }




            $destinationCount_cruise = count($request->get('destination_cruise')) - 1;


            for ($i = 0; $i <= $destinationCount_cruise; $i++) {
                if($request->get('destination_cruise')[$i]){
                        $cocogen_international_trans_destination_cruise = new cocogen_international_trans_destination_cruise;
                        $cocogen_international_trans_destination_cruise->trans_id = $transnoNo;
                        $cocogen_international_trans_destination_cruise->destination = $request->get('destination_cruise')[$i];
                        $cocogen_international_trans_destination_cruise->updated_at = $datenow;
                        $cocogen_international_trans_destination_cruise->created_at = $datenow;
                        $cocogen_international_trans_destination_cruise->save();
                }
            }



            $beneCount = count($request->get('name_bene_5thpage')) - 1;
            for ($i = 0; $i <= $beneCount; $i++) {
                if($request->get('name_bene_5thpage')[$i]){
                        $cocogen_international_trans_beneficiaries = new cocogen_international_trans_beneficiaries;
                        $cocogen_international_trans_beneficiaries->trans_id = $transnoNo;
                        $cocogen_international_trans_beneficiaries->name = $request->get('name_bene_5thpage')[$i];
                        $cocogen_international_trans_beneficiaries->relation = $request->get('relation_bene_5thpage')[$i];
                        $cocogen_international_trans_beneficiaries->updated_at = $datenow;
                        $cocogen_international_trans_beneficiaries->created_at = $datenow;
                        $cocogen_international_trans_beneficiaries->save();
                }
            }

            if($request->hasfile('file')){
                foreach($request->file('file') as $file){
                    $dateToday =date('Y-m-d');
                    $cocogen_international_upload = new cocogen_international_trans_upload;
                    $cocogen_international_upload->name =$file->getClientOriginalName();
                    $cocogen_international_upload->path = $dateToday.'/'.$file->getClientOriginalName();
                    $cocogen_international_upload->trans_id = $transnoNo;
                    $cocogen_international_upload->save();

                    $name=$file->getClientOriginalName();

                    $file->move(storage_path('app/public').'/itp/'.$dateToday.'/',$name);
                }

            }

            $emergencyContactCount = count($request->get('name_5thpage')) - 1;
            for ($i = 0; $i <= $emergencyContactCount; $i++) {
                if($request->get('name_5thpage')[$i]){
                        $b_date = "";
                        $b_date = date('Y-m-d', strtotime($request->get('bday_5thpage')[$i]));

                        $cocogen_international_trans_emergency_contact = new cocogen_international_trans_emergency_contact;
                        $cocogen_international_trans_emergency_contact->trans_id = $transnoNo;
                        $cocogen_international_trans_emergency_contact->name = $request->get('name_5thpage')[$i];
                        $cocogen_international_trans_emergency_contact->contact_no = $request->get('contact_5thpage')[$i];
                        $cocogen_international_trans_emergency_contact->relation = $request->get('relation_5thpage')[$i];
                        $cocogen_international_trans_emergency_contact->bday = $b_date;
                        $cocogen_international_trans_emergency_contact->status = $request->get('status_5thpage')[$i];
                        $cocogen_international_trans_emergency_contact->updated_at = $datenow;
                        $cocogen_international_trans_emergency_contact->created_at = $datenow;
                        $cocogen_international_trans_emergency_contact->save();
                }
            }
        }
        $full_name = $request->get('firstName_personal_info') . " ". $request->get('middleName_personal_info') . " ".  $request->get('lastName_personal_info');
        $dollar_value = $geniisysdata[0]['rate'];
        $totalPayment = $request->get('total_amount_due_all')  *  $dollar_value;
        $parameters = [
            'txnid' => $transnoNo, # Varchar(40) A unique id identifying this specific transaction from the merchant site
            'amount' => $totalPayment, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
            'ccy' => 'PHP', # Char(3) The currency of the amount
            'description' => $transnoNo, # Varchar(128) A brief description of what the payment is for
            'email' => $request->get('email_personal_info'), # Varchar(40) email address of customer
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
        // return redirect()->route('dragonpaypostback', ['txnid' => $transnoNo]);
        
    }

     public function success(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();


        $cocogen_meta = cocogen_meta::where('page', '=', "itp")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.itp.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function pending(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();


        $cocogen_meta = cocogen_meta::where('page', '=', "itp")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.itp.pending', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function failed(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();


        $cocogen_meta = cocogen_meta::where('page', '=', "itp")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.itp.failed', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }






    public function truncateitp(){
        cocogen_international_trans::truncate();
        cocogen_international_trans_destination::truncate();
        cocogen_international_trans_destination_cruise::truncate();
        cocogen_international_trans_beneficiaries::truncate();
        cocogen_international_trans_emergency_contact::truncate();
        cocogen_international_trans_upload::truncate();
    }


}
