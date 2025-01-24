<?php

namespace App\Http\Controllers;
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
use App\Models\cocogen_meta;
use App\Models\cocogen_promo;
use App\Models\cocogen_promo_id;
use App\Models\cocogen_protech_desktop_series;
use App\Models\cocogen_protech_device_part_expand;
use App\Models\cocogen_protech_laptop_max_series;
use App\Models\cocogen_protech_laptop_plus_series;
use App\Models\cocogen_protech_laptop_series;
use App\Models\cocogen_protech_part_expand;
use App\Models\cocogen_protech_partner;
use App\Models\cocogen_protech_trans_expand;
use App\Models\cocogen_protech_trans_uploads_expand;
use App\Models\cocogen_protect_deductible;
use App\Models\cocogen_set_agent_code;
use Auth;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Mail;
use PDF;
use Session;
use SoapClient;
use URL;
use Yajra\DataTables\DataTables;
class protechExpand extends Controller
{

    public function index(){

            $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get(); 
            $cocogen_admin_homepage_video = cocogen_admin_homepage_video::get();
            $cocogen_admin_homepage_slider = cocogen_admin_homepage_slider::where('status', '=', "A")->orderBy('imageOrder', 'DESC')->get();
            $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();  
            $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
            $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
            $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
            $cocogen_meta = cocogen_meta::where('page', '=', "Pro-Tech")->get();      
            $cocogen_admin_footer = cocogen_admin_footer::all(); 
            $cocogen_admin_productlinkthumbnail = cocogen_admin_productlink::select('link')->where('thumbnailStatus', '=', "A")->orderBy('thumbnailOrder', 'DESC')->get(); 
            $user = auth()->user()->email;
          
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
             return view('getaquote.protechexpand.protech_main', ['title' => $title,'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink,'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,'results' => $results,'cocogen_admin_ineedprotection' => $cocogen_admin_ineedprotection,'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function protechSendMail(Request $request){
        $date = date("Y");
        $email = $request['email_personal_info'];
        $typeselected = $request['typeselected'];;
        $type = $request['typeselected'];
        $showOwner = auth()->user()->id;
        $protech = new cocogen_protech_partner;
        $protech->emailAddress =$email;
        $protech->typeOfPackage = $typeselected;
        $protech->save();
        $protech->gid=  $protech->id;
        $protech->status=  '0'; // Status  = 0 'Sent' status 1 'Resent' //
        $protech->save();
        $gid =  $protech->id;
        switch ($type) {
            case '0':
                    /* FOR DESKTOP ONLY */
                     if (cocogen_protech_desktop_series::where('year', '=', date('y'))->count() > 0) {
           
                     $cocogen_protech_desktop_series_desktop = new cocogen_protech_desktop_series;
                     $cocogen_protech_desktop_series_year = cocogen_protech_desktop_series::select('year')->orderBy('year','desc')->first()->year;
                     $cocogen_protech_desktop_series_seriesVal = cocogen_protech_desktop_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                        $motorSeries =  sprintf("%04d", $cocogen_protech_desktop_series_seriesVal);
                        $motorVal = intval($motorSeries);
                        $checkifAlpaNumeric = preg_match("/[a-z]/i", $cocogen_protech_desktop_series_seriesVal);
                 
                          if( $motorVal >= 9999 || $checkifAlpaNumeric > 0 ){
                            
                              $letter=0;
                               $checkLetter = preg_match("/[a-z]/i", $cocogen_protech_desktop_series_seriesVal);
                               
                                if($checkLetter == '1'){
                                    $letter = mb_substr($cocogen_protech_desktop_series_seriesVal, 0, 1);
                                }

                                $cocogen_protech_desktop_series_seriesVal =  substr($cocogen_protech_desktop_series_seriesVal, -3);

                               
                                $cocogen_protech_desktop_series_seriesVal = $cocogen_protech_desktop_series_seriesVal + 1;
                                    
                                     
                               $cocogen_protech_desktop_series_seriesVal = sprintf('%04d',$cocogen_protech_desktop_series_seriesVal);

                                $motorSeries = $cocogen_protech_desktop_series_seriesVal;  
                                $checkSeries =  substr($motorSeries, -3);
                                $checkseriesValidate = $checkSeries;
                                 $checkifAlpaNumericNum = preg_match("/[a-z]/i", $cocogen_protech_desktop_series_seriesVal);
                          
                            if($checkseriesValidate == '000'){
                                $checkSeries =  sprintf('%03d',$checkSeries);;
                                $motorSeries = ++$letter . $checkSeries;
                                }else{
                                 $checkLetter= !empty($letter) ? $letter :'A';
                                 $motorSeries = $checkLetter . substr($motorSeries, -3);
                                }
                          
                             }else{
                                $cocogen_protech_desktop_series_seriesVal = $cocogen_protech_desktop_series_seriesVal + 1;
                                $motorSeries = sprintf("%04d", $cocogen_protech_desktop_series_seriesVal);    
                            }
                            
                    
                             if($cocogen_protech_desktop_series_year == date('Y')) {
                                $cocogen_protech_desktop_series_desktop->gid = $gid;
                                $cocogen_protech_desktop_series_desktop->protechNumber = $motorSeries;
                                $cocogen_protech_desktop_series_desktop->year = date('Y');
                                $cocogen_protech_desktop_series_desktop->protechNo = 'EX01-'.date('Y').'-'.$motorSeries;
                                $cocogen_protech_desktop_series_desktop->save();
                                $policyNum = array('code'=>'EX01-'.date('Y').'-'.$motorSeries);
                                $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no='EX01-'.date('Y').'-'.$motorSeries;
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'DESKTOP';
                                $getClientDetail->save();

                             }else{
                               $cocogen_protech_desktop_series_desktop->gid = $gid;
                               $cocogen_protech_desktop_series_desktop->protechNumber = '0000';
                               $cocogen_protech_desktop_series_desktop->year = date('Y');
                               $cocogen_protech_desktop_series_desktop->protechNo = 'EX01-'.date('Y').'-0000';
                               $cocogen_protech_desktop_series_desktop->save();
                               $policyNum = array('code'=>'EX01-'.date('Y').'-'.$motorSeries);
                               $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_trans_no= 'EX01-'.date('Y').'-0000';
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'DESKTOP';
                                $getClientDetail->save();

                             }
                             // return $gid;
                    }else{
                        
                            $cocogen_protech_desktop_series_desktop = new cocogen_protech_desktop_series;


                            if (cocogen_protech_desktop_series::exists()) {
                              $cocogen_protech_desktop_series_year = cocogen_protech_desktop_series::select('year')->orderBy('year','desc')->first()->year;
                              $cocogen_protech_desktop_series_seriesVal = cocogen_protech_desktop_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                              $validateValue = !empty($cocogen_protech_desktop_series_seriesVal) ? $cocogen_protech_desktop_series_seriesVal : 0;

                              $cocogen_protech_desktop_series_seriesVal = $validateValue + 1;
                              $motorSeries = sprintf("%04d", $cocogen_protech_desktop_series_seriesVal);

                              $cocogen_protech_desktop_series = new cocogen_protech_desktop_series;
                              $cocogen_protech_desktop_series->gid = $gid;
                              $cocogen_protech_desktop_series->protechNumber = '0000';
                              $cocogen_protech_desktop_series->year = date('Y');
                              $cocogen_protech_desktop_series->protechNo = 'EX01-'.date('Y').'-0000';
                              $cocogen_protech_desktop_series->save();
                              $policyNum = array('code'=>'EX01-'.date('Y').'-'.$motorSeries);
                              $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                              $getClientDetail = new cocogen_protech_trans_expand;
                              $getClientDetail->id= $gid;
                              $getClientDetail->protect_status= 'PENDING';
                              $getClientDetail->protect_trans_no='EX01-'.date('Y').'-0000';
                              $getClientDetail->protech_email = $email;
                              $getClientDetail->protech_agent_id= $showOwner;
                              $getClientDetail->protech_type_of_device= 'DESKTOP';
                              $getClientDetail->save();
                            } else {
                                $cocogen_protech_desktop_series = new cocogen_protech_desktop_series;
                                $cocogen_protech_desktop_series->gid = $gid;
                                $cocogen_protech_desktop_series->protechNumber = '0000';
                                $cocogen_protech_desktop_series->year = date('Y');
                                $cocogen_protech_desktop_series->protechNo = 'EX01-'.date('Y').'-0000';
                                $cocogen_protech_desktop_series->save();
                                $cocogen_protech_desktop_series_seriesVal = cocogen_protech_desktop_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                                $validateValue = !empty($cocogen_protech_desktop_series_seriesVal) ? $cocogen_protech_desktop_series_seriesVal : 0;
                                $cocogen_protech_desktop_series_seriesVal = $validateValue;
                                $motorSeries = sprintf("%04d", $cocogen_protech_desktop_series_seriesVal);

                                $policyNum = array('code'=>'EX01-'.date('Y').'-'.$motorSeries);
                                $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no='EX01-'.date('Y').'-0000';
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'DESKTOP';
                                $getClientDetail->save();
                            }

                        
                    }
                    $encrpytId = Crypt::encrypt($gid);
                    $subject=  'Pro-Tech Computer Insurance Registration';
                    $url = url('/get-quote/pro-tech-expand/').'/EX01/'.$encrpytId;    
                    $updateLink = array('emailLink'=>$url,'status'=>'2');
                    $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($updateLink);
                    $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 13)->get();

                    $external = str_replace( "templatefname", 'Applicant', $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace( "templatelink", $url, $external);
                    $this->emailsendcareers($external,$email,$subject);

                    /* END OF DESKTOP */
                break;
             case '1':
                    //*-------------------LAPTOP LITE-------------------------*/
                    if (cocogen_protech_laptop_series::where('year', '=', date('y'))->count() > 0) {
           
                     $cocogen_protech_laptop_series_laptop = new cocogen_protech_laptop_series;
                     $cocogen_protech_laptop_series_year = cocogen_protech_laptop_series::select('year')->orderBy('year','desc')->first()->year;
                     $cocogen_protech_laptop_series_seriesVal = cocogen_protech_laptop_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                        $motorSeries =  sprintf("%04d", $cocogen_protech_laptop_series_seriesVal);
                        $motorVal = intval($motorSeries);
                        $checkifAlpaNumeric = preg_match("/[a-z]/i", $cocogen_protech_laptop_series_seriesVal);
                 
                          if( $motorVal >= 9999 || $checkifAlpaNumeric > 0 ){
                            
                              $letter=0;
                               $checkLetter = preg_match("/[a-z]/i", $cocogen_protech_laptop_series_seriesVal);
                               
                                if($checkLetter == '1'){
                                    $letter = mb_substr($cocogen_protech_laptop_series_seriesVal, 0, 1);
                                }

                                $cocogen_protech_laptop_series_seriesVal =  substr($cocogen_protech_laptop_series_seriesVal, -3);
                                $cocogen_protech_laptop_series_seriesVal = $cocogen_protech_laptop_series_seriesVal + 1;
                                $cocogen_protech_laptop_series_seriesVal = sprintf('%04d',$cocogen_protech_laptop_series_seriesVal);

                                $motorSeries = $cocogen_protech_laptop_series_seriesVal;  
                                $checkSeries =  substr($motorSeries, -3);
                                $checkseriesValidate = $checkSeries;
                               $checkifAlpaNumericNum = preg_match("/[a-z]/i", $cocogen_protech_laptop_series_seriesVal);
                          
                            if($checkseriesValidate == '000'){
                                $checkSeries =  sprintf('%03d',$checkSeries);;
                                $motorSeries = ++$letter . $checkSeries;
                                }else{
                                 $checkLetter= !empty($letter) ? $letter :'A';
                                 $motorSeries = $checkLetter . substr($motorSeries, -3);
                                }
                          
                             }else{
                                $cocogen_protech_laptop_series_seriesVal = $cocogen_protech_laptop_series_seriesVal + 1;
                                $motorSeries = sprintf("%04d", $cocogen_protech_laptop_series_seriesVal);    
                            }
                            
                    
                             if($cocogen_protech_laptop_series_year == date('Y')) {
                                $cocogen_protech_laptop_series_laptop->gid = $gid;
                                $cocogen_protech_laptop_series_laptop->protechNumber = $motorSeries;
                                $cocogen_protech_laptop_series_laptop->year = date('Y');
                                $cocogen_protech_laptop_series_laptop->protechNo = 'LT01-'.date('Y').'-'.$motorSeries;
                                $cocogen_protech_laptop_series_laptop->save();
                                $policyNum = array('code'=>'LT01-'.date('Y').'-'.$motorSeries);
                                $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no='LT01-'.date('Y').'-'.$motorSeries;
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'LAPTOP';
                                $getClientDetail->save();

                             }else{
                                 $cocogen_protech_laptop_series_laptop->gid = $gid;
                                 $cocogen_protech_laptop_series_laptop->protechNumber = '0000';
                                 $cocogen_protech_laptop_series_laptop->year = date('Y');
                                 $cocogen_protech_laptop_series_laptop->protechNo = 'LT01-'.date('Y').'-0000';
                                 $cocogen_protech_laptop_series_laptop->save();
                                 $policyNum = array('code'=>'LT01-'.date('Y').'-'.$motorSeries);
                                 $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no= 'LT01-'.date('Y').'-0000';
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'LAPTOP';
                                $getClientDetail->save();
                             }
                    }else{

    

                            $cocogen_protech_laptop_series_laptop = new cocogen_protech_laptop_series;


                            if (cocogen_protech_laptop_series::exists()) {
                              $cocogen_protech_laptop_series_year = cocogen_protech_laptop_series::select('year')->orderBy('year','desc')->first()->year;
                              $cocogen_protech_laptop_series_seriesVal = cocogen_protech_laptop_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                              $validateValue = !empty($cocogen_protech_laptop_series_seriesVal) ? $cocogen_protech_laptop_series_seriesVal : 0;

                              $cocogen_protech_laptop_series_seriesVal = $validateValue + 1;
                              $motorSeries = sprintf("%04d", $cocogen_protech_laptop_series_seriesVal);

                              $cocogen_protech_laptop_series_laptop = new cocogen_protech_laptop_series;
                              $cocogen_protech_laptop_series_laptop->gid = $gid;
                              $cocogen_protech_laptop_series_laptop->protechNumber = '0000';
                              $cocogen_protech_laptop_series_laptop->year = date('Y');
                              $cocogen_protech_laptop_series_laptop->protechNo = 'LT01-'.date('Y').'-0000';
                              $cocogen_protech_laptop_series_laptop->save();
                              $policyNum = array('code'=>'LT01-'.date('Y').'-'.$motorSeries);
                              $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                              $getClientDetail = new cocogen_protech_trans_expand;
                              $getClientDetail->id= $gid;
                              $getClientDetail->protect_status= 'PENDING';
                              $getClientDetail->protect_trans_no= 'LT01-'.date('Y').'-0000';
                              $getClientDetail->protech_email = $email;
                              $getClientDetail->protech_agent_id= $showOwner;
                              $getClientDetail->protech_type_of_device= 'LAPTOP';
                              $getClientDetail->save();

                          } else {
                            $cocogen_protech_laptop_series_laptop = new cocogen_protech_laptop_series;
                            $cocogen_protech_laptop_series_laptop->gid = $gid;
                            $cocogen_protech_laptop_series_laptop->protechNumber = '0000';
                            $cocogen_protech_laptop_series_laptop->year = date('Y');
                            $cocogen_protech_laptop_series_laptop->protechNo = 'LT01-'.date('Y').'-0000';
                            $cocogen_protech_laptop_series_laptop->save();

                            $cocogen_protech_laptop_series_seriesVal = cocogen_protech_laptop_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;
                            $validateValue = !empty($cocogen_protech_laptop_series_seriesVal) ? $cocogen_protech_laptop_series_seriesVal : 0;
                            $cocogen_protech_laptop_series_seriesVal = $validateValue;
                            $motorSeries = sprintf("%04d", $cocogen_protech_laptop_series_seriesVal);
                            $policyNum = array('code'=>'LT01-'.date('Y').'-'.$motorSeries);
                            $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);
                            $getClientDetail = new cocogen_protech_trans_expand;
                            $getClientDetail->id= $gid;
                            $getClientDetail->protect_status= 'PENDING';
                            $getClientDetail->protect_trans_no= 'LT01-'.date('Y').'-0000';
                            $getClientDetail->protech_email = $email;
                            $getClientDetail->protech_agent_id= $showOwner;
                            $getClientDetail->protech_type_of_device= 'LAPTOP';
                            $getClientDetail->save();

                        }

                    }

                 
                    $subject=  'Pro-Tech Computer Insurance Registration';
                    
                    $encrpytId = Crypt::encrypt($gid);
                    $url = url('/get-quote/pro-tech-expand/').'/LP01/'.$encrpytId;
                    $updateLink = array('emailLink'=>$url,'status'=>'2');
                    $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($updateLink);
                    
                   $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 13)->get();
                    $external = str_replace( "templatefname", 'Applicant', $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace( "templatelink", $url, $external);
       

                    $this->emailsendcareers($external,$email,$subject);


                    /*END OF FIRST LAPTOP CHOICE LITE*/
                break;
             case '2':
             //*-------------------LAPTOP PLUS-------------------------*/
                 if (cocogen_protech_laptop_plus_series::where('year', '=', date('y'))->count() > 0) {
           
                     $cocogen_protech_laptop03_series_laptop = new cocogen_protech_laptop_plus_series;
                     $cocogen_protech_laptop03_series_year = cocogen_protech_laptop_plus_series::select('year')->orderBy('year','desc')->first()->year;
                     $cocogen_protech_laptop03_series_seriesVal = cocogen_protech_laptop_plus_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                        $motorSeries =  sprintf("%04d", $cocogen_protech_laptop03_series_seriesVal);
                        $motorVal = intval($motorSeries);
                        $checkifAlpaNumeric = preg_match("/[a-z]/i", $cocogen_protech_laptop03_series_seriesVal);
                 
                          if( $motorVal >= 9999 || $checkifAlpaNumeric > 0 ){
                            
                              $letter=0;
                               $checkLetter = preg_match("/[a-z]/i", $cocogen_protech_laptop03_series_seriesVal);
                               
                                if($checkLetter == '1'){
                                    $letter = mb_substr($cocogen_protech_laptop03_series_seriesVal, 0, 1);
                                }

                                $cocogen_protech_laptop03_series_seriesVal =  substr($cocogen_protech_laptop03_series_seriesVal, -3);
                                $cocogen_protech_laptop03_series_seriesVal = $cocogen_protech_laptop03_series_seriesVal + 1;
                                $cocogen_protech_laptop03_series_seriesVal = sprintf('%04d',$cocogen_protech_laptop03_series_seriesVal);

                                $motorSeries = $cocogen_protech_laptop03_series_seriesVal;  
                                $checkSeries =  substr($motorSeries, -3);
                                $checkseriesValidate = $checkSeries;
                               $checkifAlpaNumericNum = preg_match("/[a-z]/i", $cocogen_protech_laptop03_series_seriesVal);
                          
                            if($checkseriesValidate == '000'){
                                $checkSeries =  sprintf('%03d',$checkSeries);;
                                $motorSeries = ++$letter . $checkSeries;
                                }else{
                                 $checkLetter= !empty($letter) ? $letter :'A';
                                 $motorSeries = $checkLetter . substr($motorSeries, -3);
                                }
                          
                             }else{
                                $cocogen_protech_laptop03_series_seriesVal = $cocogen_protech_laptop03_series_seriesVal + 1;
                                $motorSeries = sprintf("%04d", $cocogen_protech_laptop03_series_seriesVal);    
                            }
                            
                    
                             if($cocogen_protech_laptop03_series_year == date('Y')) {
                                $cocogen_protech_laptop03_series_laptop->gid = $gid;
                                $cocogen_protech_laptop03_series_laptop->protechNumber = $motorSeries;
                                $cocogen_protech_laptop03_series_laptop->year = date('Y');
                                $cocogen_protech_laptop03_series_laptop->protechNo = 'PL03-'.date('Y').'-'.$motorSeries;
                                $cocogen_protech_laptop03_series_laptop->save();
                                $policyNum = array('code'=>'PL03-'.date('Y').'-'.$motorSeries);
                                $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);


                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no='PL03-'.date('Y').'-'.$motorSeries;
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'LAPTOP';
                                $getClientDetail->save();
                             }else{
                                 $cocogen_protech_laptop03_series_laptop->gid = $gid;
                                 $cocogen_protech_laptop03_series_laptop->protechNumber = '0000';
                                 $cocogen_protech_laptop03_series_laptop->year = date('Y');
                                 $cocogen_protech_laptop03_series_laptop->protechNo = 'PL03-'.date('Y').'-0000';
                                 $cocogen_protech_laptop03_series_laptop->save();
                                 $policyNum = array('code'=>'PL03-'.date('Y').'-'.$motorSeries);
                                $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);


                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no= 'PL03-'.date('Y').'-0000';
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'LAPTOP';
                                $getClientDetail->save();
                             }
                    }else{
                        


                            $cocogen_protech_laptop03_series_laptop = new cocogen_protech_laptop_plus_series;


                            if (cocogen_protech_laptop_plus_series::exists()) {
                              $cocogen_protech_laptop03_series_year = cocogen_protech_laptop_plus_series::select('year')->orderBy('year','desc')->first()->year;
                              $cocogen_protech_laptop03_series_seriesVal = cocogen_protech_laptop_plus_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                              $validateValue = !empty($cocogen_protech_laptop03_series_seriesVal) ? $cocogen_protech_laptop03_series_seriesVal : 0;

                              $cocogen_protech_laptop03_series_seriesVal = $validateValue + 1;
                              $motorSeries = sprintf("%04d", $cocogen_protech_laptop03_series_seriesVal);

                              $cocogen_protech_laptop03_series_laptop = new cocogen_protech_laptop_plus_series;
                              $cocogen_protech_laptop03_series_laptop->gid = $gid;
                              $cocogen_protech_laptop03_series_laptop->protechNumber = '0000';
                              $cocogen_protech_laptop03_series_laptop->year = date('Y');
                              $cocogen_protech_laptop03_series_laptop->protechNo = 'PL03-'.date('Y').'-0000';
                              $cocogen_protech_laptop03_series_laptop->save();
                              $policyNum = array('code'=>'PL03-'.date('Y').'-'.$motorSeries);
                              $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                              $getClientDetail = new cocogen_protech_trans_expand;
                              $getClientDetail->id= $gid;
                              $getClientDetail->protect_status= 'PENDING';
                              $getClientDetail->protect_trans_no= 'PL03-'.date('Y').'-0000';
                              $getClientDetail->protech_email = $email;
                              $getClientDetail->protech_agent_id= $showOwner;
                              $getClientDetail->protech_type_of_device= 'LAPTOP';
                              $getClientDetail->save();

                          } else {
                            $cocogen_protech_laptop_series_laptop = new cocogen_protech_laptop_plus_series;
                            $cocogen_protech_laptop_series_laptop->gid = $gid;
                            $cocogen_protech_laptop_series_laptop->protechNumber = '0000';
                            $cocogen_protech_laptop_series_laptop->year = date('Y');
                            $cocogen_protech_laptop_series_laptop->protechNo = 'PL03-'.date('Y').'-0000';
                            $cocogen_protech_laptop_series_laptop->save();

                            $cocogen_protech_laptop_series_seriesVal = cocogen_protech_laptop_plus_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;
                            $validateValue = !empty($cocogen_protech_laptop_series_seriesVal) ? $cocogen_protech_laptop_series_seriesVal : 0;
                            $cocogen_protech_laptop_series_seriesVal = $validateValue;
                            $motorSeries = sprintf("%04d", $cocogen_protech_laptop_series_seriesVal);
                            $policyNum = array('code'=>'PL03-'.date('Y').'-'.$motorSeries);
                            $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                            $getClientDetail = new cocogen_protech_trans_expand;
                            $getClientDetail->id= $gid;
                            $getClientDetail->protect_status= 'PENDING';
                            $getClientDetail->protect_trans_no= 'PL03-'.date('Y').'-0000';
                            $getClientDetail->protech_email = $email;
                            $getClientDetail->protech_agent_id= $showOwner;
                            $getClientDetail->protech_type_of_device= 'LAPTOP';
                            $getClientDetail->save();

                        }

                    }
                    $email=$email;
                    $subject=  'Pro-Tech Computer Insurance Registration';
                    
                    $encrpytId = Crypt::encrypt($gid);
                    $url = url('/get-quote/pro-tech-expand/').'/PL03/'.$encrpytId;
                    $updateLink = array('emailLink'=>$url,'status'=>'2');
                    $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($updateLink);
                    
                     $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 13)->get();
                    $external = str_replace( "templatefname", 'Applicant', $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace( "templatelink", $url, $external);
       

       

                    $this->emailsendcareers($external,$email,$subject);

                    //*-------------------LAPTOP PLUS-------------------------*/
                break;
             case '3':

              //*-------------------LAPTOP MAX-------------------------*/
                 if (cocogen_protech_laptop_max_series::where('year', '=', date('y'))->count() > 0) {
                     $cocogen_protech_laptop_max_series_laptop = new cocogen_protech_laptop_max_series;
                     $cocogen_protech_laptop_max_series_year = cocogen_protech_laptop_max_series::select('year')->orderBy('year','desc')->first()->year;
                     $cocogen_protech_laptop_max_series_seriesVal = cocogen_protech_laptop_max_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                        $motorSeries =  sprintf("%04d", $cocogen_protech_laptop_max_series_seriesVal);
                        $motorVal = intval($motorSeries);
                        $checkifAlpaNumeric = preg_match("/[a-z]/i", $cocogen_protech_laptop_max_series_seriesVal);
                 
                          if( $motorVal >= 9999 || $checkifAlpaNumeric > 0 ){
                            
                              $letter=0;
                               $checkLetter = preg_match("/[a-z]/i", $cocogen_protech_laptop_max_series_seriesVal);
                               
                                if($checkLetter == '1'){
                                    $letter = mb_substr($cocogen_protech_laptop_max_series_seriesVal, 0, 1);
                                }

                                $cocogen_protech_laptop_max_series_seriesVal =  substr($cocogen_protech_laptop_max_series_seriesVal, -3);
                                $cocogen_protech_laptop_max_series_seriesVal = $cocogen_protech_laptop_max_series_seriesVal + 1;
                                $cocogen_protech_laptop_max_series_seriesVal = sprintf('%04d',$cocogen_protech_laptop_max_series_seriesVal);

                                $motorSeries = $cocogen_protech_laptop_max_series_seriesVal;  
                                $checkSeries =  substr($motorSeries, -3);
                                $checkseriesValidate = $checkSeries;
                               $checkifAlpaNumericNum = preg_match("/[a-z]/i", $cocogen_protech_laptop_max_series_seriesVal);
                          
                            if($checkseriesValidate == '000'){
                                $checkSeries =  sprintf('%03d',$checkSeries);;
                                $motorSeries = ++$letter . $checkSeries;
                                }else{
                                 $checkLetter= !empty($letter) ? $letter :'A';
                                 $motorSeries = $checkLetter . substr($motorSeries, -3);
                                }
                          
                             }else{
                                $cocogen_protech_laptop_max_series_seriesVal = $cocogen_protech_laptop_max_series_seriesVal + 1;
                                $motorSeries = sprintf("%04d", $cocogen_protech_laptop_max_series_seriesVal);    
                            }
                            
                    
                             if($cocogen_protech_laptop_max_series_year == date('Y')) {
                                $cocogen_protech_laptop_max_series_laptop->gid = $gid;
                                $cocogen_protech_laptop_max_series_laptop->protechNumber = $motorSeries;
                                $cocogen_protech_laptop_max_series_laptop->year = date('Y');
                                $cocogen_protech_laptop_max_series_laptop->protechNo = 'MX04-'.date('Y').'-'.$motorSeries;
                                $cocogen_protech_laptop_max_series_laptop->save();
                                $policyNum = array('code'=>'MX04-'.date('Y').'-'.$motorSeries);
                                $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no='MX04-'.date('Y').'-'.$motorSeries;
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'LAPTOP';
                                $getClientDetail->save();

                             }else{
                                 $cocogen_protech_laptop_max_series_laptop->gid = $gid;
                                 $cocogen_protech_laptop_max_series_laptop->protechNumber = '0000';
                                 $cocogen_protech_laptop_max_series_laptop->year = date('Y');
                                 $cocogen_protech_laptop_max_series_laptop->protechNo = 'MX04-'.date('Y').'-0000';
                                 $cocogen_protech_laptop_max_series_laptop->save();
                                 $policyNum = array('code'=>'MX04-'.date('Y').'-'.$motorSeries);
                                $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                                $getClientDetail = new cocogen_protech_trans_expand;
                                $getClientDetail->id= $gid;
                                $getClientDetail->protect_status= 'PENDING';
                                $getClientDetail->protect_trans_no= 'MX04-'.date('Y').'-0000';
                                $getClientDetail->protech_email = $email;
                                $getClientDetail->protech_agent_id= $showOwner;
                                $getClientDetail->protech_type_of_device= 'LAPTOP';
                                $getClientDetail->save();
                             }
                    }else{
                 
                            $cocogen_protech_laptop_max_series_laptop = new cocogen_protech_laptop_max_series;
                            if (cocogen_protech_laptop_max_series::exists()) {
                              $cocogen_protech_laptop_max_series_year = cocogen_protech_laptop_max_series::select('year')->orderBy('year','desc')->first()->year;
                              $cocogen_protech_laptop_max_series_seriesVal = cocogen_protech_laptop_max_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;

                              $validateValue = !empty($cocogen_protech_laptop_max_series_seriesVal) ? $cocogen_protech_laptop_max_series_seriesVal : 0;

                              $cocogen_protech_laptop_max_series_seriesVal = $validateValue + 1;
                              $motorSeries = sprintf("%04d", $cocogen_protech_laptop_max_series_seriesVal);

                              $cocogen_protech_laptop03_series_laptop = new cocogen_protech_laptop_max_series;
                              $cocogen_protech_laptop03_series_laptop->gid = $gid;
                              $cocogen_protech_laptop03_series_laptop->protechNumber = '0000';
                              $cocogen_protech_laptop03_series_laptop->year = date('Y');
                              $cocogen_protech_laptop03_series_laptop->protechNo = 'MX04-'.date('Y').'-0000';
                              $cocogen_protech_laptop03_series_laptop->save();
                              $policyNum = array('code'=>'MX04-'.date('Y').'-'.$motorSeries);
                              $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);

                              $getClientDetail = new cocogen_protech_trans_expand;
                              $getClientDetail->id= $gid;
                              $getClientDetail->protect_status= 'PENDING';
                              $getClientDetail->protect_trans_no= 'MX04-'.date('Y').'-0000';
                              $getClientDetail->protech_email = $email;
                              $getClientDetail->protech_agent_id= $showOwner;
                              $getClientDetail->protech_type_of_device= 'LAPTOP';
                              $getClientDetail->save();

                          } else {
                            $cocogen_protech_laptop_series_laptop = new cocogen_protech_laptop_max_series;
                            $cocogen_protech_laptop_series_laptop->gid = $gid;
                            $cocogen_protech_laptop_series_laptop->protechNumber = '0000';
                            $cocogen_protech_laptop_series_laptop->year = date('Y');
                            $cocogen_protech_laptop_series_laptop->protechNo = 'MX04-'.date('Y').'-0000';
                            $cocogen_protech_laptop_series_laptop->save();

                            $cocogen_protech_laptop_series_seriesVal = cocogen_protech_laptop_max_series::select('protechNumber')->orderBy('protechNumber','desc')->first()->protechNumber;
                            $validateValue = !empty($cocogen_protech_laptop_series_seriesVal) ? $cocogen_protech_laptop_series_seriesVal : 0;
                            $cocogen_protech_laptop_series_seriesVal = $validateValue;
                            $motorSeries = sprintf("%04d", $cocogen_protech_laptop_series_seriesVal);
                            $policyNum = array('code'=>'MX04-'.date('Y').'-'.$motorSeries);
                            $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($policyNum);
                            
                            $getClientDetail = new cocogen_protech_trans_expand;
                            $getClientDetail->id= $gid;
                            $getClientDetail->protect_status= 'PENDING';
                            $getClientDetail->protect_trans_no= 'MX04-'.date('Y').'-0000';
                            $getClientDetail->protech_email = $email;
                            $getClientDetail->protech_agent_id= $showOwner;
                            $getClientDetail->protech_type_of_device= 'LAPTOP';
                            $getClientDetail->save();

                        }

                    }

                    $email=$email;
                    $subject=  'Pro-Tech Computer Insurance Registration';
                    
                    $encrpytId = Crypt::encrypt($gid);
                    $url = url('/get-quote/pro-tech-expand/').'/MX04/'.$encrpytId;
                    $updateLink = array('emailLink'=>$url,'status'=>'2');
                    $cocogen_protech_partner = cocogen_protech_partner::where('id',$gid)->update($updateLink);
                    
                    $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 13)->get();
                    $external = str_replace( "templatefname", 'Applicant', $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace( "templatelink", $url, $external);
       

                    $this->emailsendcareers($external,$email,$subject);

                    /*  LAPTOP MAX */
                break;
            
            default:
                # code...
                break;
        }
        return $gid;
       
 
    } 


   public function emailsendcareers($content, $email, $subject) {
            
            $data = array('content'=>$content, 'email'=>$email, 'subject'=>$subject);
            Mail::send('emailtemplate.protech', $data, function($message) use ($content,$subject, $email)
              {
                $message->to($email, 'COCOGEN')->subject('Pro-Tech Computer Insurance Registration')->from('client_services@cocogen.com', 'COCOGEN');
              });
            // echo "Email Sent";
            
    }

    public function openProtect(Request $request){

        $currentURL = request()->segments(2);

        $typeofdevice = $currentURL[2];
        $link = $currentURL[3];
       
        $protech_id_dec = crypt::decrypt($link);
             
       $check = cocogen_protech_partner::select('checkLink')->where('id',$protech_id_dec)->get();
       // Check link = 3 cancel
        if($check[0]['checkLink'] == '3'){
         
             // return response(redirect(url('/')), 404);
            return \Redirect::route('protechExpand.failed');
        }

        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        

        $cocogen_meta = cocogen_meta::where('page', '=', "Pro-Tech")->get();

        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
   
        $now = date('Y-m-d');
        $start = date('Y-m-d', strtotime($now. ' + 1 days'));
        $end = date('Y-m-d', strtotime($start. ' + 3 months'));

        $yeartoday = date('Y');
        $year3minus = date('Y', strtotime($start. ' - 3 years'));

        $years = array_combine(range(date("Y"), $year3minus), range(date("Y"), $year3minus));

        $myDateTime = DateTime::createFromFormat('Y-m-d', $start);
        $start = $myDateTime->format('F d, Y');

        $myDateTimeend = DateTime::createFromFormat('Y-m-d', $end);
        $end = $myDateTimeend->format('F d, Y');

         return view('getaquote.protechexpand.newhome', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'start' => $start,'end' => $end,'yeartoday' => $yeartoday,'year3minus' => $year3minus, 'years' => $years,'typeofdevice'=>$typeofdevice,'link'=>$link]);
    }

    public function saveprotech(Request $request){
        
    
        $protech_id_dec = crypt::decrypt($request['linkurl']);
        $checkSent = cocogen_protech_partner::select('checkLink')->where('gid','=',$protech_id_dec)->get();;
        $checkLinkSave = $checkSent[0]['checkLink'];
        if($checkLinkSave == 3){
               return \Redirect::route('protechExpand.failed');
        }else{

        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));
        // $totalprem = $request->get('hidden_totalPremium');

        $now = date('Y-m-d');
        $start = date('Y-m-d', strtotime($now. ' + 8 hours'));
        $start = date('Y-m-d', strtotime($start. ' + 1 days')); 
        $end = date('Y-m-d', strtotime($start. ' + 1 year'));
      
        $type_of_device = $request->get('type_of_device');
        $protech_id_dec = crypt::decrypt($request->get('linkurl'));
        $getCode = cocogen_protech_partner::select('code')->where('id',$protech_id_dec)->get();
        $codeExtracted = $getCode[0]['code'];
        $cocogen_protech_trans=array(
        "protech_firstname" => $request->get('firstName_personal_info'),
        "protech_middlename" => $request->get('middleName_personal_info'),
        "protech_lastname" => $request->get('lastName_personal_info'),
        "protech_mobile_no" => $request->get('contactNo_personal_info'),
        "protech_email" => $request->get('email_personal_info'),
        "protech_residence_address" => $request->get('residence_address'),
        "protech_residence_province" => $request->get('residence_province'),
        "protech_residence_city" => $request->get('residence_municipality'),
        "protech_residence_brgy" => !empty($request->get('residence_barangay')) ? $request->get('residence_barangay') :"",
        "protech_mailing_address" => $request->get('mailing_address'),
        "protech_mailing_province" => $request->get('mailing_province'),
        "protech_mailing_city" => !empty($request->get('mailing_municipality')) ? $request->get('mailing_municipality') :'',
        "protech_mailing_brgy" => !empty($request->get('mailing_barangay')) ? $request->get('mailing_barangay') : "",
        "protech_source_fund" => $request->get('sourceofIncome_personal_info'),
        "protech_gender" => $request->get('gender_other_personal_info'),
        "protech_place_of_birth" => $request->get('place_of_birth_other_personal_info'),
        "protech_civil_status" => $request->get('status_other_personal_info'),
        "protech_nationality" => $request->get('nationality_other_personal_info'),
        "protech_occupation" => $request->get('occupation_other_personal_info'),
        "protech_tel_no" => $request->get('tel_no_other_personal_info'),
        "protech_type_of_id" => $request->get('type_of_id_personal_info'),
        "protech_id_no" => $request->get('idno_other_personal_info'),
        "protech_device_location" => !empty($request->get('device_address')) ? $request->get('device_address') : '',
        "protech_device_province" => !empty($request->get('device_province')) ? $request->get('device_province') : '', 
        "protech_device_city" => !empty($request->get('device_municipality')) ? $request->get('device_municipality') : '', 
        "protech_device_brgy" => !empty($request->get('device_barangay')) ? $request->get('device_barangay') : '',  
        "protech_type_of_device" => $type_of_device,
        "protech_device_location_type" => !empty($request->get('device_modified_value')) ? $request->get('device_modified_value') : '', 
        "protect_status" => "SAVED",
        "protect_incept" => $start,
        "protect_expiry" => $end,
        "updated_at" => $datenow,
        "created_at" => $datenow);
        
        $cocogen_protech_trans = cocogen_protech_trans_expand::where('id',$protech_id_dec)->update($cocogen_protech_trans);

        $updateLink = array('checkLink'=>'3','status'=>'0' );
        $cocogen_protech_partner = cocogen_protech_partner::where('id',$protech_id_dec)->update($updateLink);
        // $full_name = $request->get('firstName_personal_info') . $request->get('middleName_personal_info') . $request->get('lastName_personal_info');
        $transnoNo =$protech_id_dec;
            if($request->file('file')){
                if ($request->file('file')->isValid()) { 
                    $cocogen_protech_trans_uploads = new cocogen_protech_trans_uploads_expand;
                    $cocogen_protech_trans_uploads->filename = $request->file('file')->hashName();
                    $cocogen_protech_trans_uploads->extension = $request->file('file')->extension();
                    $cocogen_protech_trans_uploads->filesize = $request->file('file')->getSize();
                    $cocogen_protech_trans_uploads->location = $request->file('file')->store('protech');
                    $cocogen_protech_trans_uploads->TransID = $transnoNo;
                    $cocogen_protech_trans_uploads->save();              
                }
            }
    
        
            $cocogen_protech_trans_update_transno = cocogen_protech_trans_expand::findorFail($transnoNo);
            $cocogen_protech_trans_update_transno->protect_trans_no = $codeExtracted;
            $cocogen_protech_trans_update_transno->save();


        $devicecount = count($request->get('device_access_hardware')) - 1;

        $devicepartArea = "";
        for ($i = 0; $i <= $devicecount; $i++) {
            if(!empty($request->get('device_access_hardware')[$i])){
                $deviceValue_plain = str_replace(',', '',   $request->get('device_access_value')[$i]);
                if($type_of_device == "DESKTOP"){
                // $limit_usage = (int)$limit_usage - 1;
                    $devicepartArea ="Desktop - Within Premises";
                    $devicePremium = ((int)$deviceValue_plain *0.15)/100;
                }else{
                    if($request->get('device_loc_type') === "1"){
                        $devicepartArea ="Laptop - Within Premises";
                        $devicePremium = ((int)$deviceValue_plain *0.75)/100;
                    }else{
                        $devicepartArea ="Laptop - Philippines";
                        $devicePremium = ((int)$deviceValue_plain *3.5)/100;
                    }
                }
             
              $cocogen_protech_device_part = new cocogen_protech_device_part_expand;
              $cocogen_protech_device_part->protech_trans_no = $transnoNo;
              $cocogen_protech_device_part->protech_device_part = $request->get('device_access_hardware')[$i];
              $cocogen_protech_device_part->protect_make = $request->get('device_access_make')[$i];
              $cocogen_protech_device_part->protect_model = $request->get('device_access_model')[$i];
              $cocogen_protech_device_part->protech_serial_no = $request->get('device_access_serial')[$i];
              $cocogen_protech_device_part->protech_year_purchased = $request->get('device_access_year')[$i];
              $cocogen_protech_device_part->protech_value = $deviceValue_plain;
              $cocogen_protech_device_part->protech_premium = $devicePremium;
              $cocogen_protech_device_part->area = $devicepartArea;
              $cocogen_protech_device_part->updated_at = $datenow;
              $cocogen_protech_device_part->created_at = $datenow;
              $cocogen_protech_device_part->save();
            }
           
        } 

        if($type_of_device === 'DESKTOP'){
            $partcount = count($request->get('psrt_access_hardware')) - 1;
            for ($x = 0; $x <= $partcount; $x++) {
                if(!empty($request->get('psrt_access_hardware')[$x])){
                    $partValue_plain = str_replace(',', '',   $request->get('psrt_access_value')[$x]);
                    if($type_of_device== "DESKTOP"){
                        $devicepartArea ="Desktop - Within Premises";
                        $partPremium = ((int)$partValue_plain *0.15)/100;
                    }else{
                        if($type_of_device === "LAPTOP"){
                            $devicepartArea ="Laptop - Within Premises";
                            $partPremium = ((int)$partValue_plain *0.75)/100;
                        }else{
                            $devicepartArea ="Laptop - Philippines";
                            $partPremium = ((int)$partValue_plain *3.5)/100;
                        }
                    }
       
                  $cocogen_protech_device_part = new cocogen_protech_part_expand;
                  $cocogen_protech_device_part->protech_trans_no = $transnoNo;
                  $cocogen_protech_device_part->protech_device_part = $request->get('psrt_access_hardware')[$x];
                  $cocogen_protech_device_part->protect_make = $request->get('psrt_access_make')[$x];
                  $cocogen_protech_device_part->protect_model = $request->get('psrt_access_model')[$x];
                  $cocogen_protech_device_part->protech_serial_no = $request->get('psrt_access_serial')[$x];
                  $cocogen_protech_device_part->protech_year_purchased = $request->get('psrt_access_year')[$x];
                  $cocogen_protech_device_part->protech_value = $partValue_plain;
                  $cocogen_protech_device_part->protech_premium = $partPremium;
                  $cocogen_protech_device_part->area = $devicepartArea;          
                  $cocogen_protech_device_part->updated_at = $datenow;
                  $cocogen_protech_device_part->created_at = $datenow;
                  $cocogen_protech_device_part->save();
                          
                  
                }
                
            } 
        }
                 if($type_of_device == "LAPTOP"){
                  $cocogen_protech_device_part = new cocogen_protech_device_part_expand;
                  $cocogen_protech_device_part->protech_trans_no = $transnoNo;
                  // $cocogen_protech_device_part->protech_device_part = $type_of_device;
                  $cocogen_protech_device_part->protect_make = $request->get('make_device');
                  $cocogen_protech_device_part->protect_model = $request->get('model_device');
                  $cocogen_protech_device_part->protech_serial_no = $request->get('serial_device');
                  $cocogen_protech_device_part->protech_year_purchased = $request->get('year_device');
                  $cocogen_protech_device_part->protech_value =  $request->get('value_device');
                  $cocogen_protech_device_part->updated_at = $datenow;
                  $cocogen_protech_device_part->created_at = $datenow;
                  $cocogen_protech_device_part->save();
            } 
            $this->emailCOC($request);
      }

    }

    public function success(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Pro-Tech")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
         return view('getaquote.protechexpand.success', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function pending(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Pro-Tech")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
         return view('getaquote.protechexpand.pending', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function failed(){ 
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       
        $cocogen_meta = cocogen_meta::where('page', '=', "Pro-Tech")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
         return view('getaquote.protechexpand.failed', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function protechReport(){
         $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
       

        $cocogen_meta = cocogen_meta::where('page', '=', "Pro-Tech")->get();
        $metadescription = $cocogen_meta[0]["description"]; 
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];       
        return view('protechexpandreport', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild]);

    }

       public function transaction(Request $request){
                $data = cocogen_protech_partner::select((DB::raw("CONCAT(cocogen_protech_trans_expand.protech_firstname,' ', cocogen_protech_trans_expand.protech_lastname) AS fullName")),'cocogen_protech_partner.code','cocogen_protech_partner.emailAddress','cocogen_protech_partner.typeOfPackage','cocogen_protech_partner.created_at','cocogen_protech_partner.id as gid','cocogen_protech_partner.status')
                    ->join('cocogen_protech_trans_expand','cocogen_protech_trans_expand.protect_trans_no','cocogen_protech_partner.code')
                    ->get();
                return Datatables::of($data)
                        ->addIndexColumn() ->addColumn('checkbox', '<input type="checkbox" name="pdr_checkbox[]" class="pdr_checkbox" value="" />')
                        ->rawColumns(['checkbox','action'])
                        ->addColumn('action', function($row){
                                    if($row->status=='0' || $row->status=='3'){
                                        $btn='';
                                    }else{
                                   // $btn ='<button type="button" name="cancelButton" id="cancelButton" data-id="'.$row->gid.'"class="edit btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal">Cancel</button>';
                                        $btn = '<a href="#my_modal2" data-toggle="modal" data-book-id="'.$row->gid.'">Cancel</a>';
                                    }
                                return $btn;
                        })
                        ->make(true);
                         // return view('getquote.ajax_index');
                }

        public function clientreport(Request $request){
              $data = cocogen_protech_partner::select('cocogen_protech_partner.typeOfPackage','cocogen_protech_partner.code','cocogen_protech_partner.emailAddress','cocogen_protech_partner.created_at','cocogen_protech_partner.id as gid','cocogen_protech_partner.status','cocogen_protech_partner.status as status2','cocogen_protech_partner.checkLink')
                    ->where('cocogen_protech_partner.code', '!=', '')
                  
                    ->get();

                return Datatables::of($data)
                  
                        ->addIndexColumn() ->addColumn('checkbox', '<input type="checkbox" name="pdr_checkbox[]" class="pdr_checkbox" value="" />')
                        ->rawColumns(['checkbox','status'])
                        ->addColumn('status', function($row){
                            switch($row->status) {
                              case '0':
                                        $btn = "<span style='font-weight: bold;color:#108888;text-decoration:none'>Registered</span>";
                              break;
                              case '1':
                                    $btn = "<span style='font-weight: bold;color:#108888;text-decoration:none'>Registered</span>";
                              break;
                              case '2':
                                   // $btn ='<button type="button" name="resendMail" id="resendMail" data-id="'.$row->gid.'"class="edit btn btn-primary btn-sm resendMail" data-toggle="modal" data-target="#exampleModal2">Resend Email</button>';
                                   // $btn = '<a  data-toggle="modal" data-target="#myModal"  name="resendMail"  id="resendMail'.$row->gid.'" class="resendMail" data-id="'.$row->gid.'">Resend Email'.$row->gid.'</a>';
                              $btn = '<a href="#my_modal" data-toggle="modal" data-book-id="'.$row->gid.'">Resend Email</a>';
                              break;
                              case '3':
                                     $btn = "<span style='font-weight: bold;color:#ff0000;text-decoration:none'>Cancelled</span>";
                                    
                              break;
                                default:
                            }
                            return $btn;
                        })
                        ->make(true);
                         // return view('getquote.ajax_index');
                }

           

            public function protechExpandDetail(Request $request){

             $get_id = $request->id;
              $cocogen_admin_footer = cocogen_admin_footer::all(); 
              $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
              $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
              $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
              $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 

                $data = cocogen_protech_partner::select((DB::raw("CONCAT(cocogen_protech_trans_expand.protech_firstname,' ', cocogen_protech_trans_expand.protech_lastname) AS fullName")),'cocogen_protech_partner.code','cocogen_protech_partner.emailAddress','cocogen_protech_partner.typeOfPackage','cocogen_protech_partner.created_at','cocogen_protech_partner.id as gid','cocogen_protech_trans_expand.protech_mobile_no','cocogen_protech_trans_expand.protech_residence_address','cocogen_protech_trans_expand.protech_device_location_type','cocogen_protech_trans_expand.protech_device_location')
                    ->join('cocogen_protech_trans_expand','cocogen_protech_trans_expand.id','cocogen_protech_partner.gid','cocogen_protech_trans_expand.protech_device_location')
                    ->where('cocogen_protech_partner.id',$get_id)
                    ->get();
                  
                foreach ($data as $key => $protechdetails) {
                    $fullName=$protechdetails['fullName'];
                    $mobileNo=$protechdetails['protech_mobile_no'];
                    $emailAddress=$protechdetails['emailAddress'];
                    $presentAddress=$protechdetails['protech_residence_address'];
                    $typeOfDevice = $protechdetails['typeOfPackage'];
                    $locationAddress = $protechdetails['protech_device_location'];
                    $protech_device_type = $protechdetails['protech_device_location_type'];
                    
                }

            if($typeOfDevice == 0){
                $typeOfDevice ='DESKTOP';
            }else{
                $typeOfDevice ='LAPTOP';
            }

                
                $parts_hardware = cocogen_protech_device_part_expand::where('protech_trans_no',$get_id)->get();

                $protect_make = !empty($parts_hardware[0]['protect_make']) ? $parts_hardware[0]['protect_make'] :"";
                $protect_model = !empty($parts_hardware[0]['protect_model']) ? $parts_hardware[0]['protect_model'] :"";
                $protech_serial = !empty($parts_hardware[0]['protech_serial_no']) ? $parts_hardware[0]['protech_serial_no'] :"";
                $protech_year =!empty($parts_hardware[0]['protech_year_purchased']) ? $parts_hardware[0]['protech_year_purchased'] :"";
                $protech_value =!empty($parts_hardware[0]['protech_value']) ? $parts_hardware[0]['protech_value'] :"";
                $device_hardware = cocogen_protech_part_expand::where('protech_trans_no',$get_id)->get();

                $device_make = !empty($parts_hardware[0]['protect_make']) ? $parts_hardware[0]['protect_make'] :"";
                $device_model = !empty($parts_hardware[0]['protect_model']) ? $parts_hardware[0]['protect_model'] :"";
                $device_serial = !empty($parts_hardware[0]['protech_serial_no']) ? $parts_hardware[0]['protech_serial_no'] :"";
                $device_year =!empty($parts_hardware[0]['protech_year_purchased']) ? $parts_hardware[0]['protech_year_purchased'] :"";
                $device_value =!empty($parts_hardware[0]['protech_value']) ? $parts_hardware[0]['protech_value'] :"";


              $cocogen_meta = cocogen_meta::where('page', '=', "Pro-Tech")->get();
              $metadescription = $cocogen_meta[0]["description"]; 
              $keyword = $cocogen_meta[0]["keyword"];
              $title = $cocogen_meta[0]["title"];       
               return view('getaquote.protechexpand.protechinfo', ['title' => $title,'cocogen_admin_footer' => $cocogen_admin_footer,'cocogen_admin_productlink' => $cocogen_admin_productlink,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'fullName'=>$fullName,'mobileNo'=>$mobileNo,'emailAddress'=>$emailAddress,'presentAddress'=>$presentAddress,'typeOfDevice'=>$typeOfDevice,'locationAddress'=>$locationAddress,'parts_hardware'=>$parts_hardware,'protect_make'=>$protect_make,'protect_model'=>$protect_model,'protech_serial'=>$protech_serial,'protech_year'=>$protech_year,'protech_value'=>$protech_value,'device_hardware'=>$device_hardware,'protech_device_type'=>$protech_device_type]);
          }

          public function cancelItem(Request $request){
          
            $gid= $request->cancelId;
            $cancelItemValue = array('checkLink'=> '3','status'=>'3');
            $calcelItem = cocogen_protech_partner::where('id',$gid)->update($cancelItemValue);
            return Redirect::back()->withErrors(['msg' => 'The item has been cancelled']);
          }

          public function resendEmail(Request $request){
        
            $resend = $request->resendemail;
            $resendemail = cocogen_protech_partner::where('id',$resend)->get();
            $email=$resendemail[0]['emailAddress'];
            $subject=  'Pro-Tech Computer Insurance Registration';
            $url = $resendemail[0]['emailLink'];    


            $updateStatus = array('status'=>2);
            $cocogen_protech_partner = cocogen_protech_partner::where('id',$resend)->update($updateStatus);
            $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 13)->get();

            $external = str_replace( "templatefname", 'Applicant', $cocogen_admin_emailtemplate[0]['content']);
            $external = str_replace( "templatelink", $url, $external);
            $this->emailsendcareers($external,$email,$subject);

            return Redirect::back()->withErrors(['msg' => 'The Message']);
          }

          public function emailCOC(Request $request){
            $protech_id_dec = crypt::decrypt($request['linkurl']);
            // $resend = $request->email_personal_info;
            // $resendemail = cocogen_protech_partner::where('id',$resend)->get();
            
            $email=$request->email_personal_info;
            $subject=  'PRO TECH EXPANDER CONFIRMATION OF COVER';
            $url ='';
            $fullName = $request['firstName_personal_info'].' '.$request['lastName_personal_info'];
            
            if($request['typeofdevicemain'] == 'EX01'){
            $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 14)->get();
            $getdevice = cocogen_protech_device_part_expand::where('protech_trans_no','=',$protech_id_dec)->get();
            $getdevice2 = cocogen_protech_part_expand::where('protech_trans_no','=',$protech_id_dec)->get();
            if($request['device_modified_value']=='Yes'){
            $message = '<table border="0" cellspacing="0" cellpadding="0">
                                                                   <tbody style="text-align: center">
                                                                        <tr>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-widtr: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Hardware
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-width: 200px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                               Make
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-width: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Model
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-width: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                               Serial No.
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-widtr: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Year Purchase
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-widtr: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Value
                                                                            </td>
                                                                            
                                                                             
                                                                        </tr>
                                                                        </tbody>
                                                                       <tbody style="text-align: center">';
                                                                    
                                                                        foreach ($getdevice as $item) {

                                                                         $message .="<tr>
                                                                            <td>".$item['protech_device_part']."</td>
                                                                            <td>".$item['protect_make']."</td>
                                                                            <td>".$item['protect_model']."</td>
                                                                            <td>".$item['protech_serial_no']."</td>
                                                                            <td>".$item['protech_year_purchased']."</td>
                                                                            <td>".$item['protech_value']."</td>
                                                                             </tr>";

                                                                        }
                                                                        foreach ($getdevice2 as $item2) {

                                                                         $message .="<tr>
                                                                            <td>".$item2['protech_device_part']."</td>
                                                                            <td>".$item2['protect_make']."</td>
                                                                            <td>".$item2['protect_model']."</td>
                                                                            <td>".$item2['protech_serial_no']."</td>
                                                                            <td>".$item2['protech_year_purchased']."</td>
                                                                            <td>".$item2['protech_value']."</td>
                                                                             </tr>";

                                                                        }
                                                                             $message .= '</tbody>
                                                                        
                                                                        
                                                                                 
                                                                        </tr>

                                                                    </tbody>
                                                                
                                                                </table>';
                    
                      
                            $external = str_replace( "templatefname", $fullName, $cocogen_admin_emailtemplate[0]['content']);
                            }else{

                              $message = '<table border="0" cellspacing="0" cellpadding="0">
                                                                   <tbody style="text-align: center">
                                                                        <tr>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-widtr: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Hardware
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-width: 200px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                               Make
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-width: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Model
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-width: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                               Serial No.
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-widtr: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Year Purchase
                                                                            </td>
                                                                            <td align="center" class="padding-copy" style="padding: 10px 10px 10px; font-size: 16px;
                                                                                line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);
                                                                                min-widtr: 150px; background-color: #008080; color: #ffffff; padding-bottom: 10px;
                                                                                border: 1px solid #ffffff">
                                                                                Value
                                                                            </td>
                                                                            
                                                                             
                                                                        </tr>
                                                                        </tbody
                                                                        <tbody style="text-align: center">';
                                                                    
                                                                        foreach ($getdevice as $item) {

                                                                         $message .="<tr>
                                                                            <td>".$item['protech_device_part']."</td>
                                                                            <td>".$item['protect_make']."</td>
                                                                            <td>".$item['protect_model']."</td>
                                                                            <td>".$item['protech_serial_no']."</td>
                                                                            <td>".$item['protech_year_purchased']."</td>
                                                                            <td>".$item['protech_value']."</td>
                                                                             </tr>";

                                                                        }
                                                                             $message .= '</tbody>
                                                                            
                                                                        </tr>
                                                                    </tbody>
                                                                </table>';
                          
                          $external = str_replace( "templatefname", $fullName, $cocogen_admin_emailtemplate[0]['content']);                                                                
                            }
                        }else{
                          $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 14)->get();
                          $getdevice = cocogen_protech_device_part_expand::where('protech_trans_no','=',$protech_id_dec)->get();
                          
                          $message='
                                  <table width="30%" border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                    
                                            <th colspan="2"  style="font-size:15px;text-align: left;" >Device Information</th> 
                                            
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td  style="font-size:16px;width: 110px;">LAPTOP</td>
                                            <td  style="font-size:16px">'.$getdevice[0]['protect_make'].'</td>
                                        </tr>
                                          <tr>
                                            <td  style="font-size:16px">Make</td>
                                             <td  style="font-size:16px">'.$getdevice[0]['protect_make'].'</td>
                                        </tr>
                                           <tr>
                                            <td  style="font-size:16px">Model</td>
                                             <td  style="font-size:16px">'.$getdevice[0]['protect_model'].'</td>
                                        </tr>
                                           <tr>
                                            <td style="font-size:16px">Serial No.</td>
                                           <td style="font-size:16px">'.$getdevice[0]['protech_serial_no'].'</td>
                                        </tr>
                                           <tr>
                                            <td style="font-size:16px">Year Purchase</td>
                                            <td style="font-size:16px">'.$getdevice[0]['protech_year_purchased'].'</td>
                                        </tr>
                                         <tr>
                                            <td style="font-size:16px">Value</td>
                                             <td  style="font-size:16px">'.$getdevice[0]['protech_value'].'</td>
                                        </tr>
                                    </tbody>
                                </table>
                                ';
                        $external = str_replace( "templatefname", $fullName, $cocogen_admin_emailtemplate[0]['content']);
                        }
                        $external = str_replace( "templatelink", $url, $external);
                        $external = str_replace( "templatetable", $message, $external);
       
            $this->emailsendtest($external,$email,$subject);
            return Redirect::back()->withErrors(['msg' => 'The Message']);
          }

           public function emailsendtest($content, $email, $subject) {
            
            $data = array('content'=>$content, 'email'=>$email, 'subject'=>$subject);
            Mail::send(['html' =>'emailtemplate.protech'], $data, function($message) use ($content,$subject, $email)
              {
                $message->to($email, 'COCOGEN')->subject('Pro-Tech Computer Insurance Registration')->from('client_services@cocogen.com', 'COCOGEN');
              });
            // echo "Email Sent";
            }

                  public function truncateDb(){
            cocogen_protech_desktop_series::truncate();
            cocogen_protech_device_part_expand::truncate();
            cocogen_protech_laptop_max_series::truncate();
            cocogen_protech_laptop_plus_series::truncate();
            cocogen_protech_laptop_series::truncate();
            cocogen_protech_partner::truncate();
            cocogen_protech_trans_expand::truncate();
            cocogen_protech_trans_uploads_expand::truncate();
            }

        // Set Agent Code settings
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

      }