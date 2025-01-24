<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tracking_codes;
use App\Models\cocogen_getquote_mvtypes;
use App\Models\cocogen_quote_request;
use App\Models\cocogen_ctpl_vehicleinfo;
use App\Models\cocogen_ctpl_clientinfo;
use App\Models\cocogen_getquote_premium;
use App\Models\cocogen_quote_request_changeprimary;
use App\Models\cocogen_ctpl_vehicleinfochangeprimary;
use App\Models\cocogen_ctpl_clientinfo_changeprimary;
use App\Models\cocogen_compre_personalinfo_changeprimary;
use App\Models\cocogen_ctpl_coc_series;
use App\Models\cocogen_product_trans;
use App\Models\location;
use App\Models\occupation;
use App\Models\cocogen_product_link;
use App\Models\city;
use App\Models\province;
use App\Models\cocogen_fmv;
use App\Models\cocogen_fmv_year;
use App\Models\cocogen_brand_year;
use App\Models\cocogen_compre_bipd;
use App\Models\cocogen_compre_carinfo;
use App\Models\cocogen_compre_personalinfo;
use App\Models\cocogen_compre_addtlcarinfo;
use App\Models\cocogen_compre_carinfo_changeprimary;
use App\Models\cocogen_compre_accessory_trans;
use App\Models\cocogen_onlinepayments;
use App\Models\cocogen_onlinepayments_changeprimary;
use App\Models\cocogen_compre_accessory;
use App\Models\cocogen_ctpl_file;
use App\Models\cocogen_compre_file;
use App\Models\cocogen_careers;
use App\Models\cocogen_careers_trans;
use App\Models\cocogen_careers_uploads;
use App\Models\cocogen_careers_job_description;
use App\Models\cocogen_careers_qualification;
use App\Models\cocogen_feedback_trans;
use App\Models\cocogen_product_line;
use App\Models\cocogen_search;
use App\Models\location_compre;
use App\Models\cocogen_meta;
use App\Models\location_ctpl;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_onlinepayments_dtl;
use App\Models\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use user_uploads;
use App\Models\cocogen_admin_pages;
use App\Models\cocogen_property_images;
use App\Models\cocogen_admin_pages_news;
use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_breadcrumbs;
use App\Models\cocogen_admin_main;
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
use App\Models\cocogen_admin_property_uploads;
use App\Models\cocogen_property_contact;
use App\Models\cocogen_property_inquiry;
use App\Models\cocogen_admin_faq_category;
use App\Models\cocogen_admin_faq;
use App\Models\cocogen_admin_emailtemplate;
use App\Models\cocogen_property;
use DB;
use Session;
use SoapClient;
use DateTime;
use Mail;
use PDF;
use Auth;
use URL;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Crazymeeks\Foundation\PaymentGateway\Options\Processor;
use Storage;
use App\Models\cocogen_covid_trans;
use App\Models\cocogen_covid_trans_uploads;
use App\Models\cocogen_covid_file;
use App\Models\cocogen_promo;
use App\Models\cocogen_epolicy_dtl;
use App\Models\cocogen_admin_branch;

class PropertyController extends Controller
{


    public function test(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();

        $cocogen_property = cocogen_property::get();

        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Properties for Sale")->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('property.test2', ['title' => $title,
                                                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                                                'cocogen_admin_footer'=>$cocogen_admin_footer,
                                                'metadescription' => $metadescription,
                                                'cocogen_admin_main' => $cocogen_admin_main,
                                                'cocogen_admin_submain' => $cocogen_admin_submain,
                                                'cocogen_admin_subchild' => $cocogen_admin_subchild,
                                                // 'cocogen_admin_productlink' => $cocogen_admin_productlink,
                                                'keyword' => $keyword,
                                                // 'cocogen_admin_parentproduct' => $cocogen_admin_parentproduct
                                                'cocogen_property' => $cocogen_property

                                                ]);
    }




    public function propertysale(){
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_property = cocogen_property::where('sold', '=', "No")->orderBy('id', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Properties for Sale")->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('property.propertysale', ['title' => $title,
                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                'cocogen_admin_footer'=>$cocogen_admin_footer,
                'metadescription' => $metadescription,
                'cocogen_admin_main' => $cocogen_admin_main,
                'cocogen_admin_submain' => $cocogen_admin_submain,
                'cocogen_admin_subchild' => $cocogen_admin_subchild,
                'keyword' => $keyword,
                'cocogen_property' => $cocogen_property
        ]);
    }




    public function propertydetails($id){
        $id = base64_decode($id);
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_property_id = cocogen_property::where('id', '=', $id)->get();
        $cocogen_property_images = cocogen_property_images::where('parentID', '=', $id)
                                                    ->orderBy('toOrder', 'ASC')->get();
        if(count($cocogen_property_id)=== 0){
            return redirect('/property');
        }
        if($cocogen_property_id[0]["sold"]==="Yes"){
            return redirect('/property');
        }
        $cocogen_property_contact = cocogen_property_contact::get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Properties for Sale")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];

        return view('property.propertydetails', ['title' => $title,
        								'cocogen_admin_footer' => $cocogen_admin_footer,
        								'cocogen_admin_productlink' => $cocogen_admin_productlink,
                                        'cocogen_property_id' => $cocogen_property_id,
                                        'cocogen_property_images' => $cocogen_property_images,
        								'metadescription' => $metadescription,
        								'keyword' => $keyword,
        								'cocogen_admin_main' => $cocogen_admin_main,
        								'cocogen_admin_submain' => $cocogen_admin_submain,
        								'cocogen_admin_subchild' => $cocogen_admin_subchild,
                                        'cocogen_property_contact' => $cocogen_property_contact
                                        ]);
    }


    public function propertyinquire(Request $request){

        $rules = [
                    'fName'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'lName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'mobileNumber' => 'required',
                    'email' => 'required|email',
                    'message' => 'required',
        ];
        $niceNames = [
                    'fName'=>'first name',
                    'lName' => 'last name',
                    'mobileNumber' => 'contact number',
                    'email' => 'email',
        ];
        $this->validate($request, $rules, [], $niceNames);



        $cocogen_property_inquiry = new cocogen_property_inquiry;
        $cocogen_property_inquiry->fName  = $request->get('fName');
        $cocogen_property_inquiry->lName  = $request->get('lName');
        $cocogen_property_inquiry->mobileNumber  = $request->get('mobileNumber');

        $cocogen_property_inquiry->email  = $request->get('email');
        $cocogen_property_inquiry->message  = $request->get('message');



        $curTime = new \DateTime();
        $created_at = $curTime->format("Y-m-d H:i:s");
        $new_time = date("Y-m-d H:i:s", strtotime('+8 hours'));
        $cocogen_property_inquiry->created_at =  $new_time;
        $cocogen_property_inquiry->updated_at =  $new_time;

        $cocogen_property_inquiry->save();


        // window.location.href = "{{ route('propertysold')}}";
        $status_message = "Success! Your inquiry is on its way to our team.";
        return back()->with('message',$status_message);
    }


}
