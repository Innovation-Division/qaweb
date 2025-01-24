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
use App\Models\cocogen_admin_faq_category;
use App\Models\cocogen_admin_faq;
use App\Models\cocogen_admin_emailtemplate;
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
use App\Models\cocogen_protech_trans;
use App\Models\cocogen_protech_device_part;
use App\Models\cocogen_protect_deductible;
use App\Models\cocogen_domestic_trans;
use App\Models\cocogen_domestic_trans_destination;
use App\Models\cocogen_domestic_trans_beneficiaries;
use App\Models\cocogen_domestic_file;
use App\Models\cocogen_international_trans;
use App\Models\cocogen_international_trans_destination;
use App\Models\cocogen_international_trans_destination_cruise;
use App\Models\cocogen_international_trans_beneficiaries;
use App\Models\cocogen_international_file;
use App\Models\cocogen_itp_countries;
use App\Models\cocogen_international_file_shengen;
use App\Models\cocogen_international_file_cruise;
use App\Models\cocogen_domestic_trans_emergency_contact;
use App\Models\User;
use App\Models\cocogen_api_ctpl_mvtype_format;
use App\Models\cocogen_api_ctpl_plate_format;

class home extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getquote_notif($product,$package)
    {
        $link = '/get-quote';
        if($product === "cant-find-car" ){
            return redirect($link)->with('inquiry', $product);
        }else{
            return redirect($link)->with('product', $product)->with('package', $package);
        }
        
    }

    //about us
    public function defaultPages($link)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_pages = cocogen_admin_pages::where('link', '=', $link)->get();

        if (count($cocogen_admin_pages) == 0) {
            abort(404);
        }

        $cocogen_admin_breadcrumbs = cocogen_admin_breadcrumbs::where('pageID', '=', $cocogen_admin_pages[0]['id'])->get();
        $cocogen_meta = cocogen_meta::where('pageID', '=',  $cocogen_admin_pages[0]['id'])->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];

        if ($cocogen_admin_pages[0]['category'] === "News") {

            $cocogen_admin_pages_news = cocogen_admin_pages_news::where('pageID', '=', $cocogen_admin_pages[0]['id'])->get();
            if ($cocogen_admin_pages_news[0]['active']  === "N") {
                return redirect('/news');
            }
            return view('news', [
                'title' => $title,
                'metadescription' => $metadescription,
                'keyword' => $keyword,
                'cocogen_admin_footer' => $cocogen_admin_footer,
                'cocogen_admin_main' => $cocogen_admin_main,
                'cocogen_admin_submain' => $cocogen_admin_submain,
                'cocogen_admin_pages' => $cocogen_admin_pages,
                'cocogen_admin_breadcrumbs' => $cocogen_admin_breadcrumbs,
                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                'cocogen_admin_subchild' => $cocogen_admin_subchild,
                'cocogen_admin_pages_news' => $cocogen_admin_pages_news
            ]);
        } elseif ($cocogen_admin_pages[0]['category'] === "Blogs") {

            $cocogen_admin_pages_blogs = cocogen_admin_pages_blogs::where('pageID', '=', $cocogen_admin_pages[0]['id'])->get();
            if ($cocogen_admin_pages_blogs[0]['active']  === "N") {
                return redirect('/blogs');
            }
            return view('blogs.blogs', [
                'title' => $title,
                'metadescription' => $metadescription,
                'keyword' => $keyword,
                'cocogen_admin_main' => $cocogen_admin_main,
                'cocogen_admin_submain' => $cocogen_admin_submain,
                'cocogen_admin_pages' => $cocogen_admin_pages,
                'cocogen_admin_footer' => $cocogen_admin_footer,
                'cocogen_admin_breadcrumbs' => $cocogen_admin_breadcrumbs,
                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                'cocogen_admin_subchild' => $cocogen_admin_subchild,
                'cocogen_admin_pages_blogs' => $cocogen_admin_pages_blogs
            ]);
        } elseif ($cocogen_admin_pages[0]['category'] === "SubParent") {

            $cocogen_admin_parentproduct = cocogen_admin_parentproduct::where('link', '=', $link)->get();
            $cocogen_admin_subparentproduct = cocogen_admin_subparentproduct::where('parentID', '=', $cocogen_admin_parentproduct[0]['id'])
                ->where('status', '=', "A")
                ->orderBy('parentOrder', 'DESC')
                ->get();
            return view('SubParent', [
                'title' => $title,
                'metadescription' => $metadescription,
                'keyword' => $keyword,
                'cocogen_admin_main' => $cocogen_admin_main,
                'cocogen_admin_submain' => $cocogen_admin_submain,
                'cocogen_admin_footer' => $cocogen_admin_footer,
                'cocogen_admin_pages' => $cocogen_admin_pages,
                'cocogen_admin_subchild' => $cocogen_admin_subchild,
                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                'cocogen_admin_subparentproduct' => $cocogen_admin_subparentproduct,
                'cocogen_admin_parentproduct' => $cocogen_admin_parentproduct
            ]);
        } elseif ($cocogen_admin_pages[0]['category'] === "Product") {

            $check_old_link = cocogen_admin_productlink::where('old_link', '=', $link)->get();
            if (count($check_old_link) > 0) {
                return redirect('/' . $check_old_link[0]['link']);
            } else {
                $cocogen_admin_productlinkss = cocogen_admin_productlink::where('link', '=', $link)->get();
                $cocogen_admin_relatedproducts = cocogen_admin_relatedproducts::select('relatedID')->where('prodID', '=', $cocogen_admin_productlinkss[0]['id'])->get();
                $cocogen_admin_productlinkalllink = cocogen_admin_productlink::select('link')->whereIn('id', $cocogen_admin_relatedproducts)->get();
                $product_type = cocogen_admin_productlink::where('link', '=', $link)->get();
                $cocogen_admin_pages_products = cocogen_admin_pages_products::where('link', '=', $link)->get();
            }


            if ($cocogen_admin_pages_products[0]['active']  === "N") {
                return abort(404);
            }
            $myaccountagentcode = "";
            if ($cocogen_admin_productlinkalllink) {
                foreach ($cocogen_admin_productlinkalllink as $val) {
                    if (!$myaccountagentcode) {
                        $myaccountagentcode = "'" . $val->link . "'";
                    } else {
                        $myaccountagentcode = $myaccountagentcode . "," . "'" . $val->link . "'";
                    }
                }
            }
            if (count($cocogen_admin_productlinkalllink) > 0) {
                $results = DB::select('select DISTINCT(x.link),x.name, x.imagelink,x.description,x.smallIcon from
                    (select * from cocogen_admin_parentproduct
                    union
                    select * from cocogen_admin_subparentproduct)x
                    where x.link in (' . $myaccountagentcode . ')
                    group by x.link
                    order by x.parentOrder asc
                    ');
            } else {
                $results = "";
            }
            return view('product', [
                'title' => $title,
                'metadescription' => $metadescription,
                'results' => $results,
                'link' => $link,
                'keyword' => $keyword,
                'cocogen_admin_main' => $cocogen_admin_main,
                'cocogen_admin_submain' => $cocogen_admin_submain,
                'cocogen_admin_pages' => $cocogen_admin_pages,
                'cocogen_admin_footer' => $cocogen_admin_footer,
                'cocogen_admin_breadcrumbs' => $cocogen_admin_breadcrumbs,
                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                'product_type' => $product_type,
                'cocogen_admin_subchild' => $cocogen_admin_subchild
            ]);
        } elseif ($cocogen_admin_pages[0]['category'] === "Page Protection") {

            $cocogen_admin_ineedprotection = cocogen_admin_ineedprotection::where('link', '=', $link)->where('status', '=', "A")->get();
            $cocogen_admin_ineedprotection_trans = cocogen_admin_ineedprotection_trans::select('productID')->where('protectionID', '=', $cocogen_admin_ineedprotection[0]['id'])->get();
            $cocogen_admin_productlinkalllink = cocogen_admin_productlink::select('link')->whereIn('id', $cocogen_admin_ineedprotection_trans)->get();

            $mylinks = "";
            if ($cocogen_admin_productlinkalllink) {
                foreach ($cocogen_admin_productlinkalllink as $val) {
                    if (!$mylinks) {
                        $mylinks = "'" . $val->link . "'";
                    } else {
                        $mylinks = $mylinks . "," . "'" . $val->link . "'";
                    }
                }
            }

            $results = DB::select('select DISTINCT(x.link),x.name, x.imagelink,x.description,x.smallIcon from
                    (select * from cocogen_admin_parentproduct
                    union
                    select * from cocogen_admin_subparentproduct)x
                    where x.link in (' . $mylinks . ')
                    group by x.link
                    order by x.parentOrder asc
                    ');
            return view('home.protection', [
                'title' => $title,
                'metadescription' => $metadescription,
                'results' => $results,
                'link' => $link,
                'keyword' => $keyword,
                'cocogen_admin_ineedprotection' => $cocogen_admin_ineedprotection,
                'cocogen_admin_main' => $cocogen_admin_main,
                'cocogen_admin_submain' => $cocogen_admin_submain,
                'cocogen_admin_pages' => $cocogen_admin_pages,
                'cocogen_admin_footer' => $cocogen_admin_footer,
                'cocogen_admin_breadcrumbs' => $cocogen_admin_breadcrumbs,
                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                'cocogen_admin_subchild' => $cocogen_admin_subchild
            ]);
        } else {
            $cocogen_admin_pages = "";
            $cocogen_admin_pages = cocogen_admin_pages::where('link', '=', $link)->where('active', '=', "Y")->get();
            return view('aboutus.ourcompany', [
                'title' => $title,
                'metadescription' => $metadescription,
                'keyword' => $keyword,
                'cocogen_meta' => $cocogen_meta,
                'cocogen_admin_main' => $cocogen_admin_main,
                'cocogen_admin_submain' => $cocogen_admin_submain,
                'cocogen_admin_pages' => $cocogen_admin_pages,
                'cocogen_admin_footer' => $cocogen_admin_footer,
                'cocogen_admin_breadcrumbs' => $cocogen_admin_breadcrumbs,
                'cocogen_admin_productlink' => $cocogen_admin_productlink,
                'cocogen_admin_subchild' => $cocogen_admin_subchild
            ]);
        }
    }

    /**
     * pagehome
     *
     * @return void
     */
    public function pagehome()
    {
        // dd(User::get());
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
      
        $results  = null;
        $allLinks = [];
        if ($cocogen_admin_productlinkthumbnail) {
            foreach ($cocogen_admin_productlinkthumbnail as $val) {
                $allLinks[$val->link] = $val->link;
            }

            if (!empty($allLinks)) {
                $sSQL = "
                    SELECT
                        b.thumbnailOrder,
                        b.product,
                        a.link,
                        a.imageLink,
                        a.description,
                        b.featuredIcon,
                        b.smallIcon
                    FROM (
                        SELECT DISTINCT(x.link),x.name, x.imagelink,x.description
                        FROM (
                            SELECT * FROM cocogen_admin_parentproduct
                            UNION
                            SELECT * FROM cocogen_admin_subparentproduct) x
                            WHERE x.link IN ('" . implode("','", $allLinks) . "')
                            GROUP BY x.link,x.name, x.imagelink,x.description) a
                    LEFT OUTER JOIN cocogen_admin_productlink AS b on b.link = a.link
                    ORDER BY 1 DESC
                ";

                $results = DB::select($sSQL);
            }
        }

        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
//    dd(['title' => $title,
//          'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,
//          'metadescription' => $metadescription,
//          'keyword' => $keyword,
//          'cocogen_admin_main' => $cocogen_admin_main,
//          'cocogen_admin_submain' => $cocogen_admin_submain,
//          'cocogen_admin_subchild' => $cocogen_admin_subchild,
//          'cocogen_admin_productlink' => $cocogen_admin_productlink,
//          'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,
//          'results' => $results,
//          'cocogen_admin_ineedprotection' => $cocogen_admin_ineedprotection,
//          'cocogen_admin_footer' => $cocogen_admin_footer]);
        return view('home.pagehome', compact(
            'title', 'cocogen_admin_homepage_slider', 'metadescription', 'keyword',
            'cocogen_admin_main', 'cocogen_admin_submain', 'cocogen_admin_subchild',
            'cocogen_admin_productlink', 'cocogen_admin_homepage_video', 'results',
            'cocogen_admin_ineedprotection', 'cocogen_admin_footer'
        ));


    
    //     return view('home.pagehome', ['title' => $title,
    //      'cocogen_admin_homepage_slider' => $cocogen_admin_homepage_slider,
    //      'metadescription' => $metadescription,
    //      'keyword' => $keyword,
    //      'cocogen_admin_main' => $cocogen_admin_main,
    //      'cocogen_admin_submain' => $cocogen_admin_submain,
    //      'cocogen_admin_subchild' => $cocogen_admin_subchild,
    //      'cocogen_admin_productlink' => $cocogen_admin_productlink,
    //      'cocogen_admin_homepage_video' => $cocogen_admin_homepage_video,
    //      'results' => $results,
    //      'cocogen_admin_ineedprotection' => $cocogen_admin_ineedprotection,
    //      'cocogen_admin_footer' => $cocogen_admin_footer]);
        
    }

     public function createaccount()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Sign Up")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('auth.createaccount', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        $user_id = DB::table('users')->orderBy('id', 'DESC')->first();

        $user = new users();
        $user->id = $user_id->id + 1;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->active = 'N';
        $user->type = 'C';
        $user->status = 'PENDING';
        $user->save();

        $content = DB::table('cocogen_admin_emailtemplate')->where('name', 'Sign Up')->first();
        $content = str_replace("user_name",  $request->name, $content->content);
        $content = str_replace("user_email",  $request->email, $content);


        $this->emailSignUp($content);

       

        return redirect()->route('createaccount')->with('success', 'Sign up successfully. Thank you for signing up to our website. We will check it and get back to you soon.');
    }

    public function emailSignUp($content) {

        $data = array('content' => $content);

        Mail::send('emailtemplate.signup_email', $data, function($message){
            $message->to('client_services@cocogen.com')->subject('New Sign Up');
        });
    

    }

    public function homeredirect(Request $request)
    {

        $protection = $request->input('assignedRole');
        if ($protection) {
            return redirect('/' . $protection);
        }
    }

    public function products()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Products | COCOGEN";

        $metadescription = "";
        $keyword = "";
        return view('products.products', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'metadescription' => $metadescription, 'keyword' => $keyword0,]);
    }


    //about us
    public function careers()
    {

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_careers = cocogen_careers::where('active', '=', "Yes")
            ->orderBy('job', 'asc')
            ->get();
        $cocogen_careers_job_description = cocogen_careers_job_description::where('active', '=', "Yes")
            ->select('cocogen_careers_job_description.*')
            ->leftJoin('cocogen_careers', 'cocogen_careers_job_description.careerID', '=', 'cocogen_careers.id')
            ->where('cocogen_careers.active', '=', "Yes")
            ->get();
        $cocogen_careers_qualification = cocogen_careers_qualification::where('active', '=', "Yes")
            ->select('cocogen_careers_qualification.*')
            ->leftJoin('cocogen_careers', 'cocogen_careers_qualification.careerID', '=', 'cocogen_careers.id')
            ->where('cocogen_careers.active', '=', "Yes")
            ->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "Career Opportunities")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('aboutus.careers', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_careers' => $cocogen_careers, 'cocogen_careers_job_descriptions' => $cocogen_careers_job_description, 'cocogen_careers_qualifications' => $cocogen_careers_qualification, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }



    public function careerssave(Request $request)
    {

        $rules = [
            'fName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'lName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'mobileNumber' => 'required',
            'positionApplied' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required',
            'filename' => 'required'
        ];
        $niceNames = [
            'fName' => 'first name',
            'lName' => 'last name',
            'mobileNumber' => 'contact number',
            'positionApplied' => 'position applied',
            'email' => 'email',
            'g-recaptcha-response' => 'Recaptcha',
            'fName' => ''
        ];
        $this->validate($request, $rules, [], $niceNames);


        if ($request->file('filename')) {
            request()->validate([
                'filename' => 'required|file|mimes:pdf,PDF,doc,docx|max:2048',
            ]);
        }

        $getRealPath = $request->file('filename')->getRealPath();
        $getClientOriginalName = $request->file('filename')->getClientOriginalName();
        $getMimeType = $request->file('filename')->getMimeType();
        $cocogen_careers_trans = new cocogen_careers_trans;
        $cocogen_careers_trans->fName  = $request->get('fName');
        $cocogen_careers_trans->lName  = $request->get('lName');
        $cocogen_careers_trans->mobileNumber  = $request->get('mobileNumber');
        $cocogen_careers_trans->positionApplied  = $request->get('positionApplied');
        $cocogen_careers_trans->email  = $request->get('email');
        $cocogen_careers_trans->message  = $request->get('message');
        $cocogen_careers_trans->recaptcha  = $request->get('g-recaptcha-response');
        $cocogen_careers_trans->save();
        $inserted_id = $cocogen_careers_trans->id;

        if ($inserted_id) {
            if ($request->file('filename')) {
                if ($request->file('filename')->isValid()) {
                    $cocogen_careers_uploads = new cocogen_careers_uploads;
                    $cocogen_careers_uploads->filename = $request->file('filename')->hashName();
                    $cocogen_careers_uploads->extension = $request->file('filename')->extension();
                    $cocogen_careers_uploads->filesize = $request->file('filename')->getSize();
                    $cocogen_careers_uploads->location = $request->file('filename')->store('careersfiles', ['disk' => 'public']);
                    $cocogen_careers_uploads->careerTransID = $inserted_id;
                    $cocogen_careers_uploads->save();
                }
            }
        }

        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 1)->get();
        $fullName = $request->get('fName') . " " . $request->get('lName');
        $bodytaginternatl = str_replace("templatecareerName", $fullName, $cocogen_admin_emailtemplate[0]['content']);
        $bodytaginternatl = str_replace("teamplatepositionApplied", $request->get('positionApplied'), $bodytaginternatl);
        $bodytaginternatl = str_replace("templatepositionApplied", $request->get('positionApplied'), $bodytaginternatl);
        $bodytaginternatl = str_replace("templatefname", $request->get('fName'), $bodytaginternatl);
        $bodytaginternatl = str_replace("templatemail", $request->get('email'), $bodytaginternatl);
        $bodytaginternatl = str_replace("templatemobileNumber", $request->get('mobileNumber'), $bodytaginternatl);
        $bodytaginternatl = str_replace("templatemessage1", $request->get('message'), $bodytaginternatl);

        $cocogen_admin_emailtemplateexternal = cocogen_admin_emailtemplate::where('id', '=', 2)->get();
        $bodytagexternal = str_replace("templatefname", $request->get('fName'), $cocogen_admin_emailtemplateexternal[0]['content']);


        $careerName = env('CAREER_NAMETO');
        $fullName = $request->get('fName'). " " .$request->get('lName');
        $this->emailsendcareers($bodytagexternal, $request->get('email'),$request->get('positionApplied'));
        $this->emailsendcareersint($bodytaginternatl,$request->get('positionApplied'),$getRealPath, $getClientOriginalName, $getMimeType);
        $status_message = "Success! Your job application is on its way to our recruitment team.";
        return back()->withInput()->with('message', $status_message);
    }



    public function emailsendcareers($content, $email, $subject)
    {
        $data = array('content' => $content, 'email' => $email, 'subject' => $subject);
        Mail::send('emailtemplate.careers', $data, function ($message) use ($content, $subject, $email) {
            $message->to($email, 'COCOGEN')->subject('Job Application for ' . $subject)->from('no_reply@cocogen.com', 'COCOGEN');
        });
    }

    public function emailsendcareersint($content, $positionApplied, $getRealPath, $getClientOriginalName, $getMimeType)
    {
        $data = array('content' => $content, 'positionApplied' => $positionApplied);
        Mail::send('emailtemplate.careersInternal', $data, function ($message) use ($content, $positionApplied, $getRealPath, $getClientOriginalName, $getMimeType) {
            $message->to(env('CAREER_EMAILTO'), 'COCOGEN')->subject('New Application: ' . $positionApplied)->from('no_reply@cocogen.com', 'COCOGEN');
            $message->attach($getRealPath, array(
                'as'    => $getClientOriginalName,
                'mime'  => $getMimeType
            ));
        });
    }

    //services

    public function onlinepayments()
    {

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Online Payments")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('services.online-payments', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function onlinepaymentsWithParameters($id)
    {
        $id = base64_decode($id);

        $cocogen_epolicy_dtl = cocogen_epolicy_dtl::where('id', '=', $id)
            ->select('cocogen_epolicy_dtl.*', 'cocogen_view_paid_policies.gross as gross', 'cocogen_view_paid_policies.paid as paid')
            ->leftJoin('cocogen_view_paid_policies', 'cocogen_view_paid_policies.policy', '=', 'cocogen_epolicy_dtl.policyNo')
            ->get();
        dd($cocogen_epolicy_dtl);
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Online Payments")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('services.online-payments-with-parameter', ['cocogen_epolicy_dtl' => $cocogen_epolicy_dtl, 'title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function onlinepaymentspay(Request $request)
    {
        //dd($request);
        $rules = [
            'name' => 'required|regex:/^[\pL\s\-.,]+$/u|max:255',
            'email' => 'required|email',
            'policy_no.*' => 'required',
            'amount.*' => 'required',
            'contact' => 'required'
        ];
        $niceNames = [
            'name' => 'name',
            'policy_no' => 'policy no',
            'amount' => 'amount',
            'name.*' => 'name',
            'policy_no.*' => 'policy no',
            'amount.*' => 'amount',
            'email' => 'email',
            'contact' => 'contact'
        ];


        $this->validate($request, $rules, [], $niceNames);

        $cocogen_onlinepayments = new cocogen_onlinepayments;
        $cocogen_onlinepayments->name = $request->get('name');
        $cocogen_onlinepayments->emailAddress  = $request->get('email');
        $cocogen_onlinepayments->contactNo  = $request->get('contact');
        $cocogen_onlinepayments->save();
        $inserted_id = $cocogen_onlinepayments->id;

        $policy_no = $request->get('policy_no');
        $amountT = $request->get('amount');

        $totalAmount = 0;
        $invoiceall = "";
        $policyall = "";
        for ($i = 0; $i < count($policy_no); $i++) {
            $amountTol = str_replace(',', '',   $amountT[$i]);
            $totalAmount += $amountTol;

            $cocogen_onlinepayments_dtl = new cocogen_onlinepayments_dtl;
            $cocogen_onlinepayments_dtl->pay_id = $inserted_id;
            $cocogen_onlinepayments_dtl->policyNo =  $policy_no[$i];
            $cocogen_onlinepayments_dtl->amount  =  $amountTol;
            $cocogen_onlinepayments_dtl->save();

            if ($policyall) {
                $policyall = $policyall . '' . $policy_no[$i] . "<br>";
            } else {
                $policyall = $policy_no[$i] . '' . "<br>";
            }
        }
        //dd($invoiceall);
        $cocogen_onlinepayment = cocogen_onlinepayments::findorFail($inserted_id);
        $cocogen_onlinepayment->tnxid = "ONPAYMNTS-" . date('y') . "-" . $inserted_id . "-00";
        $cocogen_onlinepayment->amount = $totalAmount; // $totalAmount;
        if ($request->get('PaymentLater') === "Send Payment Link") {
            $cocogen_onlinepayment->status = "PENDING"; // $totalAmount;
        } else {
            $cocogen_onlinepayment->status = "SENT"; // $totalAmount;
        }

        $cocogen_onlinepayment->save();
        $transno = "ONPAYMNTS-" . date('y') . "-" . $inserted_id . "-00";
        $parameters = [ ////////////////
            'txnid' => $transno, # Varchar(40) A unique id identifying this specific transaction from the merchant site
            'amount' => $totalAmount, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
            'ccy' => 'PHP', # Char(3) The currency of the amount
            'description' => $transno, # Varchar(128) A brief description of what the payment is for
            'email' => $request->get('email'), # Varchar(40) email address of customer
            'param1' => $totalAmount, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
            'param2' => $request->get('email'), # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
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


        //PaymentLater
        if ($request->get('PaymentLater') === "Send Payment Link") {
            $amountT = number_format((float)$totalAmount, 2, '.', '');
            $amountComma = number_format($totalAmount, 2);
            $digest1 = env('MERCHANT_ID') . ':' . $transno . ':' . $amountT . ':' . 'PHP' . ':' . $transno . ':' . $request->get('email') . ':' . env('MERCHANT_PASSWORD');
            $digest = sha1(env('MERCHANT_ID') . ':' . $transno . ':' . $amountT . ':' . 'PHP' . ':' . $transno . ':' . $request->get('email') . ':' . env('MERCHANT_PASSWORD'));
            $limk = env('DRAGONPAY_LINK') . '?merchantid=' . env('MERCHANT_ID') . '&txnid=' . $transno . '&amount=' . $amountT . '&ccy=' . 'PHP' . '&description=' . $transno . '&email=' . $request->get('email') . '&digest=' . $digest . '&param1=' . $amountT . '&param2=' . $request->get('email') . '&mode=1';
            //dd($digest,$digest1,$limk);
            $this->emailsendonlinepaymentpaylater($request->get('name'), $request->get('email'), $limk, $transno, \Auth::user()->name, $amountComma, $policyall);
            $status_message = "Payment request was successfully sent to client!";
            return back()->withInput()->with('message', $status_message);
        } else {
            $dragonpay->setParameters($parameters)->away();
        }
    }

    public function locateashop()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Locate a Branch")->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "Locate a shop")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('services.locateashop', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function emailsendonlinepaymentpaylater($fname, $email, $link, $txnid, $cname, $amount, $policy)
    {
        $data = array('fname' => $fname, 'email' => $email, 'link' => $link, 'txnid' => $txnid, 'cname' => $cname, 'amount' => $amount, 'policy' => $policy);
        Mail::send('emailtemplate.onlinepaymentpaylater', $data, function ($message) use ($fname, $link, $email, $txnid, $cname, $amount, $policy) {
            $message->to($email, 'COCOGEN')->subject('Payment link for payment no.' . $txnid)->from('no_reply@cocogen.com', 'COCOGEN');;
        });
    }


    //inquiries

    public function branchlocator()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Locate a Branch")->get();

        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('inquiries.branchlocator', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function faqs()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();

        $cocogen_admin_faq = cocogen_admin_faq::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();
        $cocogen_admin_faq_category = cocogen_admin_faq_category::where('status', '=', "A")->orderBy('nameOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "FAQs")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('inquiries.faq', ['title' => $title, 'cocogen_admin_faq' => $cocogen_admin_faq, 'cocogen_admin_faq_category' => $cocogen_admin_faq_category, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }



    public function feedback()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Feedback")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('inquiries.feedback', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function feedbacksave(Request $request)
    {
        //dd($request);
        $rules = [
            'fName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'lName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email',
            'mobileNumber' => 'required',
            'homeAddress' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required'
        ];
        $niceNames = [
            'fName' => 'first name',
            'lName' => 'last name',
            'email' => 'email',
            'mobileNumber' => 'contact number',
            'homeAddress' => 'home address',
            'message' => 'message',

            'g-recaptcha-response' => 'Recaptcha'
        ];
        $this->validate($request, $rules, [], $niceNames);

        if ($request->file('filename')) {
            request()->validate([
                'filename' => 'required|file|mimes:pdf,PDF,doc,docx|max:2048',
            ]);
        }
        $cocogen_feedback_trans = new cocogen_feedback_trans;
        $cocogen_feedback_trans->fName  = $request->get('fName');
        $cocogen_feedback_trans->lName  = $request->get('lName');
        $cocogen_feedback_trans->mobileNumber  = $request->get('mobileNumber');
        $cocogen_feedback_trans->homeAddress  = $request->get('homeAddress');
        $cocogen_feedback_trans->message  = $request->get('message');
        $cocogen_feedback_trans->email  = $request->get('email');
        $cocogen_feedback_trans->recaptcha  = $request->get('g-recaptcha-response');
        $cocogen_feedback_trans->save();
        $inserted_id = $cocogen_feedback_trans->id;
        $fullName = $request->get('fName') . ' ' . $request->get('lName');
        $emailTO = env('FEEDBACK_NAMETO');
        //$this->emailsendfeedbackinternal($emailTO, $fullName, $request->get('email'),$request->get('mobileNumber'),$request->get('message'));
        //$this->emailsendfeedback( $request->get('fName'), $request->get('email'),$request->get('positionApplied'));
        $status_message = "SUCCESS! Request was successfully sent!";
        return back()->withInput()->with('message', $status_message);
    }

    public function emailsendfeedback($fname, $email, $subject)
    {
        $data = array('fname' => $fname, 'email' => $email, 'subject' => $subject);
        Mail::send('emailtemplate.feedback', $data, function ($message) use ($fname, $subject, $email) {
            $message->to($email, 'COCOGEN')->subject($fname . ', your feedback is important to us ')->from('no_reply@cocogen.com', 'COCOGEN');;
        });
    }

    public function emailsendfeedbackinternal($emailTO, $fname, $email, $contactNo, $message1)
    {
        $data = array('emailTO' => $emailTO, 'fname' => $fname, 'email' => $email, 'contactNo' => $contactNo, 'message1' => $message1);
        Mail::send('emailtemplate.feedbackInternal', $data, function ($message) use ($fname, $email, $contactNo, $message1, $emailTO) {
            $message->to(env('FEEDBACK_EMAILTO'), 'COCOGEN')->subject('Feedback Recieved: ' . $fname)->from('no_reply@cocogen.com', 'COCOGEN');;
        });
    }
    public function emailresendactivationfailed($name, $link, $email)
    {
        $data = array('name' => $name, 'email' => $email, 'link' => $link);
        Mail::send('emailtemplate.resendfailed', $data, function ($message) use ($name, $link, $email) {
            $message->to($email, 'COCOGEN')->subject('Request for Activation Link : ' . $name);
        });
    }

    public function productinquiry()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "Product Inquiry")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $cocogen_product_line = cocogen_product_line::where('status', '=', "Yes")
            ->orderBy('line', 'asc')
            ->get();
        $occupation = occupation::where('id', '!=', "")
            ->orderBy('occupation', 'asc')
            ->get();
        return view('inquiries.productinquiry', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_product_lines' => $cocogen_product_line, 'occupations' => $occupation, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function productinquiryproducts($product)
    {

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "Product Inquiry")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $cocogen_product_link = cocogen_product_link::where('link', '=', $product)->get();
        if (count($cocogen_product_link) === 0) {
            $product = "Others";
        } else {
            $product = $cocogen_product_link[0]['product'];
        }
        $cocogen_product_line = cocogen_product_line::where('status', '=', "Yes")
            ->orderBy('line', 'asc')
            ->get();
        $occupation = occupation::where('id', '!=', "")
            ->orderBy('occupation', 'asc')
            ->get();
        return view('inquiries.productinquirywithproductvariable', ['title' => $title, 'cocogen_product_lines' => $cocogen_product_line, 'occupations' => $occupation, 'product' => $product, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function productinquirysave(Request $request)
    {
        $rules = [
            'product' => 'required',
            'fName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'lName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email',
            'mobileNumber' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required'
        ];
        $niceNames = [
            'product' => 'product',
            'lName' => 'last name',
            'email' => 'email',
            'mobileNumber' => 'mobile number',
            'message' => 'message',
            'g-recaptcha-response' => 'Recaptcha'
        ];
        $this->validate($request, $rules, [], $niceNames);

        $cocogen_product_trans = new cocogen_product_trans;
        $cocogen_product_trans->fName  = $request->get('fName');
        $cocogen_product_trans->lName  = $request->get('lName');
        $cocogen_product_trans->email  = $request->get('email');
        $cocogen_product_trans->contactNumber  = $request->get('mobileNumber');
        $cocogen_product_trans->product  = $request->get('product');
        $cocogen_product_trans->inquiry  = $request->get('message');
        $cocogen_product_trans->recaptcha  = $request->get('g-recaptcha-response');
        if ($request->get('home')) {
            $cocogen_product_trans->callHomeTag  = 1;
        }
        if ($request->get('office')) {
            $cocogen_product_trans->callOfficeTag  = 1;
        }
        if ($request->get('mobile')) {
            $cocogen_product_trans->callMobileTag  = 1;
        }
        $cocogen_product_trans->save();
        $inserted_id = $cocogen_product_trans->id;
        $fullName = $request->get('fName') . ' ' . $request->get('lName');
        $emailTO = env('FEEDBACK_NAMETO');
        $this->emailsendproductinquiryinternal($fullName, $emailTO, $request->get('email'), $request->get('mobileNumber'), $request->get('product'), $request->get('message'));
        //$this->emailsendproducinquiry($request->get('fName'), $request->get('email'),$request->get('product'));
        $status_message = "SUCCESS! Request was successfully sent!";
        return back()->withInput()->with('message', $status_message);
    }

    public function emailsendproducinquiry($fname, $email, $product)
    {
        $data = array('fname' => $fname, 'email' => $email, 'product' => $product);
        Mail::send('emailtemplate.productinquiry', $data, function ($message) use ($fname, $product, $email) {
            $message->to($email, 'COCOGEN')->subject($fname . ', we have received your product inquiry')->from('no_reply@cocogen.com', 'COCOGEN');;
        });
    }

    public function emailsendproductinquiryinternal($fname, $emailTO, $email, $mobileNumber, $product, $message1)
    {
        $data = array('fname' => $fname, 'emailTO' => $emailTO, 'email' => $email, 'mobileNumber' => $mobileNumber, 'product' => $product, 'message1' => $message1);
        Mail::send('emailtemplate.productinquiryinternal', $data, function ($message) use ($fname, $emailTO, $email, $mobileNumber, $product, $message1) {
            $message->to(env('PRODUCTINQURY_EMAILTO'), 'COCOGEN')->subject('Product Inquiry: ' . $product)->from('no_reply@cocogen.com', 'COCOGEN');;
        });
    }



    //updates

    public function updates()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Updates")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('updates.updates', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function newsandevents()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_pages_news = cocogen_admin_pages_news::where('active', '=', "Y")->orderBy('id', 'desc')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "News and Events")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('updates.news', ['title' => $title, 'metadescription' => $metadescription, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_pages_news' => $cocogen_admin_pages_news]);
    }

    public function blogs()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_pages_blogs = cocogen_admin_pages_blogs::where('active', '=', "Y")->orderBy('id', 'desc')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "Blogs")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('updates.blogs', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_pages_blogs' => $cocogen_admin_pages_blogs]);
    }

    public function dataprivacy()
    {

        $cocogen_meta = cocogen_meta::where('page', '=', "Data Privacy")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('data-privacy-statement', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword]);
    }

    public function forgotpassword()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Forgot Your Password")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('auth.passwords.reset', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }


    public function resetpassword(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $parsedUrl = parse_url(url()->full());

        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);
        $email = users::where('email', '=', $pieces[0])->get();
        $result = filter_var($pieces[0], FILTER_VALIDATE_EMAIL);
        if ($result === false) {
            $status_message = "Invalid Email!";
            return back()->withInput()->with('messagefailed', $status_message);
        }
        $result2 = date("Y-m-d H:i:s", $pieces[1]);
        //24 hrs = 172800
        $now = time();
        //convert $then into a timestamp.
        $thenTimestamp = strtotime($result2);

        //Get the difference in seconds.
        $difference = $now - $thenTimestamp;
        if ($difference === false) {
            $status_message = "Transaction should not later than 48hrs!";
            return back()->withInput()->with('messagefailed', $status_message);
        } elseif ($difference >= 172800) {
            return redirect('/request_time_out');
        }
        $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('auth.verify', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function reset_password(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $parsedUrl = parse_url(url()->full());
        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);


        $email = users::where('email', '=', $pieces[0])->get();
        $digest = sha1($email[0]['created_at'] . $email[0]['id']);
        $digesthash = base64_encode($digest);

        if (base64_decode($pieces[3]) === $digest) {

            $result2 = date("Y-m-d H:i:s", $pieces[1]);
            $now = time();
            $thenTimestamp = strtotime($result2);
            $difference = $now - $thenTimestamp;
            if ($difference === false) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            } elseif ($difference >= 172800) {
                return redirect('/request_time_out');
            }
            $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            return view('auth.verify_reset', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
        } else {
            return redirect('/activateYourAccountFailed');
        }
    }

    public function ActivateAccount(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $parsedUrl = parse_url(url()->full());

        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);
        $email = users::where('email', '=', $pieces[0])->get();
        $result = filter_var($pieces[0], FILTER_VALIDATE_EMAIL);
        if ($result === false) {
            $status_message = "Invalid Email!";
            return back()->withInput()->with('messagefailed', $status_message);
        }
        $result2 = date("Y-m-d H:i:s", $pieces[1]);
        //24 hrs = 172800
        $now = time();
        //convert $then into a timestamp.
        $thenTimestamp = strtotime($result2);

        //Get the difference in seconds.
        $difference = $now - $thenTimestamp;
        if ($difference === false) {
            $status_message = "Transaction should not later than 48hrs!";
            return back()->withInput()->with('messagefailed', $status_message);
        } elseif ($difference >= 172800) {
            return redirect('/request_time_out');
        }
        $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('auth.verifyepolicynew', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function forgotpasswordsave(Request $request)
    {

        $rules = [
            'email' => 'required|email'
        ];
        $niceNames = [
            'email' => 'email'
        ];
        $this->validate($request, $rules, [], $niceNames);
        $email = users::where('email', '=', $request->get('email'))->get();
        if (count($email) === 0) {
            $status_message = "Invalid Email Address!";
            return back()->withInput()->with('messagefailed', $status_message);
        } else {
            if ($email[0]['active'] === "Y") {
                $date = date_create();
                $datehash = date_timestamp_get($date);
                $transID =  $request->get('email') . ":" . $datehash;
                $digest = sha1($email[0]['created_at'] . $email[0]['id']);
                $digesthash = base64_encode($digest);
                $transID2 = sha1($transID);
                $transID3 = $transID . ":" . $transID2 . ":" . $digesthash;
                $transID4 = base64_encode($transID3);
                $contactName = env('FEEDBACK_NAMETO');
                $libnk = URL::to('/reset_password') . '?' . $transID4;

                $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 4)->get();
                $bodytagexternal = str_replace("templatename", $email[0]['name'], $cocogen_admin_emailtemplate[0]['content']);
                $bodytagexternal = str_replace("templatelink", $libnk, $bodytagexternal);

                $this->emailsendforgotpasswordinternal($contactName, $email[0]['name'], $transID4, $request->get('email'));
                $this->emailsendforgotpassword($email[0]['name'], $bodytagexternal, $request->get('email'));

                $message = "SUCCESS! A fresh verification link has been sent to your email address.";
                return back()->withInput()->with('message', $message);
            } else {
                $link = URL::to('/resendpassword');
                $this->emailsendfailed($email[0]['name'], $link, $request->get('email'));
                $message = "SUCCESS! A fresh verification link has been sent to your email address.";
                return back()->withInput()->with('message', $message);
            }
        }
    }
    public function emailsendfailed($name, $link, $email)
    {
        $data = array('name' => $name, 'email' => $email, 'link' => $link);
        Mail::send('emailtemplate.resetfailed', $data, function ($message) use ($name, $link, $email) {
            $message->to($email, 'COCOGEN')->subject('Inactive Email Address : ' . $name);
        });
    }

    public function emailsendforgotpassword($name, $content, $email)
    {
        $data = array('name' => $name, 'email' => $email, 'content' => $content);
        Mail::send('emailtemplate.forgotpassword', $data, function ($message) use ($name, $content, $email) {
            $message->to($email, 'COCOGEN')->subject('Password Reset Request : ' . $name);
        });
    }

    public function emailsendforgotpasswordinternal($contactName, $name, $link, $email)
    {
        $data = array('contactName' => $contactName, 'name' => $name, 'email' => $email, 'link' => $link);
        Mail::send('emailtemplate.forgotpasswordinternal', $data, function ($message) use ($contactName, $name, $link, $email) {
            $message->to(env('PRODUCTINQURY_EMAILTO'), 'COCOGEN')->subject('Password Reset Request');
        });
    }


    public function resetpasswordsave(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'confirmation' => ['same:password']
        ]);


        $parsedUrl = parse_url(url()->previous());

        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);
        $email = users::where('email', '=', $pieces[0])->get();
        $digest = sha1($email[0]['id'] . ":" . date_format($email[0]['created_at'], 'm/d/Y g:i:s A'));

        //dd($email,$parsedUrl,$transID,$pieces[2], $digest,$email[0]['id'],$email[0]['created_at'],date_format($email[0]['created_at'], 'm/d/Y g:i:s A'));
        if ($pieces[2] === $digest) {
            $result = filter_var($pieces[0], FILTER_VALIDATE_EMAIL);
            if ($result === false) {
                $status_message = "Invalid Email!";
                return back()->withInput()->with('messagefailed', $status_message);
            }
            $result2 = date("Y-m-d H:i:s", $pieces[1]);
            //24 hrs = 172800
            $now = time();
            //convert $then into a timestamp.
            $thenTimestamp = strtotime($result2);

            //Get the difference in seconds.
            $difference = $now - $thenTimestamp;
            if ($difference === false) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            } elseif ($difference >= 172800) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            }


            $users = users::findorFail($result);
            $users->password  = Hash::make($request->get('password'));
            $users->active = "Y"; //\DB::raw('NOW()')
            $users->activated_at = \DB::raw('NOW()');
            $users->save();
            Auth::loginUsingId($email[0]['id']);
            $status_message = "Your password has been reset! You will be redirected to our sign-in page shortly. If you are not redirected ";
            return back()->withInput()->with('message', $status_message);
        } else {
            return redirect('/activateYourAccountFailed');
        }
    }

    public function reset_passwordsave(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'confirmation' => ['same:password']
        ]);
        $parsedUrl = parse_url(url()->previous());
        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);
        $email = users::where('email', '=', $pieces[0])->get();
        $digest = sha1($email[0]['created_at'] . $email[0]['id']);
        $digesthash = base64_encode($digest);

        if (base64_decode($pieces[3]) === $digest) {
            $result = filter_var($pieces[0], FILTER_VALIDATE_EMAIL);
            if ($result === false) {
                $status_message = "Invalid Email!";
                return back()->withInput()->with('messagefailed', $status_message);
            }

            $result2 = date("Y-m-d H:i:s", $pieces[1]);
            //48 hrs = 172800
            $now = time();
            //convert $then into a timestamp.
            $thenTimestamp = strtotime($result2);
            //Get the difference in seconds.
            $difference = $now - $thenTimestamp;


            if ($difference === false) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            } elseif ($difference >= 172800) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            }


            $users = users::findorFail($result);
            $users->password  = Hash::make($request->get('password'));
            $users->active = "Y";
            $users->activated_at = \DB::raw('NOW()');
            $users->save();

            $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            Auth::loginUsingId($email[0]['id']);
            $status_message = "Your password has been reset! You will be redirected to our sign-in page shortly. If you are not redirected ";
            return back()->withInput()->with('message', $status_message);
        } else {
            return redirect('/activateYourAccountFailed');
        }
    }

    public function activate_account(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $parsedUrl = parse_url(url()->full());
        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);


        $email = users::where('email', '=', $pieces[0])->get();
        $digest = sha1($email[0]['created_at'] . $email[0]['id']);
        $digesthash = base64_encode($digest);

        if($email[0]['password'] === null || $email[0]['password'] === "") {
            if (base64_decode($pieces[3]) === $digest) {

                $result2 = date("Y-m-d H:i:s", $pieces[1]);
                $now = time();
                $thenTimestamp = strtotime($result2);
                $difference = $now - $thenTimestamp;
                if ($difference === false) {
                    $status_message = "Transaction should not later than 48hrs!";
                    return back()->withInput()->with('messagefailed', $status_message);
                } elseif ($difference >= 172800) {
                    return redirect('/request_time_out');
                }
                $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
                $metadescription = $cocogen_meta[0]["description"];
                $keyword = $cocogen_meta[0]["keyword"];
                $title = $cocogen_meta[0]["title"];
                return view('auth.passwordreset', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
            } else {
                return redirect('/activateYourAccountFailed');
            }
        } else {

            $message = $request->session()->get('message');
            
            if($message) {
                $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
                $metadescription = $cocogen_meta[0]["description"];
                $keyword = $cocogen_meta[0]["keyword"];
                $title = $cocogen_meta[0]["title"];
                return view('auth.passwordreset', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
            } else {
                return redirect('/accountAlreadyActivated');
            }
        }
    }


    public function accountAlreadyActivated()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('auth.alreadyactivated', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    
    public function resendpassword()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Activate your Account")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('auth.passwords.resend', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function resendpasswordsave(Request $request)
    {

        $rules = [
            'email' => 'required|email'
        ];
        $niceNames = [
            'email' => 'email'
        ];
        $this->validate($request, $rules, [], $niceNames);

        $email = users::where('email', '=', $request->get('email'))->get();


        if (count($email) === 0) {
            $status_message = "Invalid Email Address!";
            return back()->withInput()->with('messagefailed', $status_message);
        } else {
            if ($email[0]['active'] === "Y") {
                $date = date_create();
                $datehash = date_timestamp_get($date);
                $transID =  $request->get('email') . ":" . $datehash;
                $digest = sha1($email[0]['created_at'] . $email[0]['id']);
                $digesthash = base64_encode($digest);
                $transID2 = sha1($transID);
                $transID3 = $transID . ":" . $transID2 . ":" . $digesthash;
                $transID4 = base64_encode($transID3);
                $contactName = env('FEEDBACK_NAMETO');
                $link = URL::to('/reset_password') . '?' . $transID4;
                $this->emailresendactivationfailed($email[0]['name'], $link, $request->get('email'));
            } else {
                $date = date_create();
                $datehash = date_timestamp_get($date);
                $transID =  $request->get('email') . ":" . $datehash;
                $digest = sha1($email[0]['created_at'] . $email[0]['id']);
                $digesthash = base64_encode($digest);
                $transID2 = sha1($transID);
                $transID3 = $transID . ":" . $transID2 . ":" . $digesthash;
                $transID4 = base64_encode($transID3);

                $libnk = URL::to('/activateYourAccount') . '?' . $transID4;

                $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 4)->get();
                $bodytagexternal = str_replace("templatename", $email[0]['name'], $cocogen_admin_emailtemplate[0]['content']);
                $bodytagexternal = str_replace("templatelink", $libnk, $bodytagexternal);

                $this->emailsendresendpassword($email[0]['name'], $bodytagexternal, $request->get('email'));
            }
        }
        $message = "SUCCESS! A fresh activation link has been sent to your email address.";
        return back()->withInput()->with('message', $message);
    }

    public function emailsendresendpassword($name, $content, $email)
    {
        $data = array('name' => $name, 'email' => $email, 'content' => $content);
        Mail::send('emailtemplate.resendpassword', $data, function ($message) use ($name, $content, $email) {
            $message->to($email, 'COCOGEN')->subject('Account Activation : ' . $name);
        });
    }

    public function resendpasswordfailed()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $metadescription = "";
        $keyword = "";
        $title = "Invalid Request";
        return view('auth.failed', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }
    public function reserfailedpass()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $metadescription = "";
        $keyword = "";
        $title = "Request Time Out";
        return view('auth.failedpass', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function activateYourAccount(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $parsedUrl = parse_url(url()->full());
        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);


        $email = users::where('email', '=', $pieces[0])->get();
        $digest = sha1($email[0]['created_at'] . $email[0]['id']);
        $digesthash = base64_encode($digest);

        if (base64_decode($pieces[3]) === $digest) {

            $users = users::findorFail($pieces[0]);
            $users->active = "Y";
            $users->activated_at = \DB::raw('NOW()');
            $users->save();

            $result = filter_var($pieces[0], FILTER_VALIDATE_EMAIL);
            if ($result === false) {
                $status_message = "Invalid Email!";
                return back()->withInput()->with('messagefailed', $status_message);
            }
            $result2 = date("Y-m-d H:i:s", $pieces[1]);
            //48 hrs = 172800
            $now = time();
            //convert $then into a timestamp.
            $thenTimestamp = strtotime($result2);
            //Get the difference in seconds.
            $difference = $now - $thenTimestamp;
            if ($difference === false) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            } elseif ($difference >= 172800) {
                return redirect('/request_time_out');
            }
            $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            //session()->flash('message',"Your account was successfully activated. Please reset your password!");
            return view('auth.verify_resend', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
        } else {
            return redirect('/activateYourAccountFailed');
        }
    }

    //Home
    public function customsearch(Request $request)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Homepage")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $search = $request->get('srchterm');
        $cocogen_search = cocogen_search::where('status', '=', "A")->get();
        return view('search', ['title' => $title, 'search' => $search, 'cocogen_searchs' => $cocogen_search, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function resend_passwordsave(Request $request)
    {

        $request->validate([
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'confirmation' => ['same:password']
        ]);

        $parsedUrl = parse_url(url()->previous());
        $transID = base64_decode($parsedUrl['query']);
        $pieces = explode(":", $transID);
        $email = users::where('email', '=', $pieces[0])->get();
        $digest = sha1($email[0]['created_at'] . $email[0]['id']);
        $digesthash = base64_encode($digest);



        if (base64_decode($pieces[3]) === $digest) {
            $result = filter_var($pieces[0], FILTER_VALIDATE_EMAIL);
            if ($result === false) {
                $status_message = "Invalid Email!";
                return back()->withInput()->with('messagefailed', $status_message);
            }
            $result2 = date("Y-m-d H:i:s", $pieces[1]);
            //72 hrs = 172800
            $now = time();
            //convert $then into a timestamp.
            $thenTimestamp = strtotime($result2);
            //Get the difference in seconds.
            $difference = $now - $thenTimestamp;
            if ($difference === false) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            } elseif ($difference >= 172800) {
                $status_message = "Transaction should not later than 48hrs!";
                return back()->withInput()->with('messagefailed', $status_message);
            }


            $users = users::findorFail($result);
            $users->password  = Hash::make($request->get('password'));
            $users->active = "Y";
            $users->activated_at = \DB::raw('NOW()');
            $users->save();

            $cocogen_meta = cocogen_meta::where('page', '=', "Reset Your Password")->get();
            $metadescription = $cocogen_meta[0]["description"];
            $keyword = $cocogen_meta[0]["keyword"];
            $title = $cocogen_meta[0]["title"];
            Auth::loginUsingId($email[0]['id']);
            $status_message = "Your password has been reset! You will be redirected to our sign-in page shortly. If you are not redirected ";
            return back()->withInput()->with('message', $status_message);
        } else {
            return redirect('/activateYourAccountFailed');
        }
    }



    public function internetsecurity()
    {
        $title = "Internet Security | COCOGEN | General Insurance";
        $cocogen_meta = cocogen_meta::where('page', '=', "Internet Security Arrangement and Policy")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        return view('internet-security', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword]);
    }

    public function productlines()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();

        $cocogen_admin_parentproduct = cocogen_admin_parentproduct::where('status', '=', "A")
            ->where('parentName', '=', "Product Lines")
            ->orderBy('parentOrder', 'DESC')
            ->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Product Lines")->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('products.productlines', ['title' => $title, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'metadescription' => $metadescription, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'keyword' => $keyword, 'cocogen_admin_parentproduct' => $cocogen_admin_parentproduct]);
    }

    public function excelpackages()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();

        $cocogen_admin_parentproduct = cocogen_admin_parentproduct::where('status', '=', "A")
            ->where('parentName', '=', "Excel Plus Package")
            ->orderBy('parentOrder', 'DESC')
            ->get();

        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Excel Plus Packages")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('products.excelpackages', ['title' => $title, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_parentproduct' => $cocogen_admin_parentproduct]);
    }

    public function microinsurance()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_parentproduct = cocogen_admin_parentproduct::where('status', '=', "A")
            ->where('parentName', '=', "Microinsurance")
            ->orderBy('parentOrder', 'DESC')
            ->get();

        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "Microinsurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('products.microinsurancemain', ['title' => $title, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_parentproduct' => $cocogen_admin_parentproduct]);
    }


    //Inquiries

    public function inquiries()
    {
        $title = "Inquiries | COCOGEN | General Insurance";
        return view('inquiries.inquiries', ['title' => $title]);
    }

    public function properties()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Properties for Sale")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('updates.properties', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }
    //general

    public function termsandconditions()
    {
        $cocogen_meta = cocogen_meta::where('page', '=', "Terms and Conditions")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('terms-and-conditions', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword]);
    }

    public function customercharter()
    {
        $cocogen_meta = cocogen_meta::where('page', '=', "Customer Charter")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('customer-charter', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword]);
    }

    public function sitemap()
    {
        $title = "Internet Security Arrangement | COCOGEN | General Insurance";
        return view('internet-security', ['title' => $title]);
    }

    public function sitemaps()
    {
        $cocogen_meta = cocogen_meta::where('page', '=', "Sitemap")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('sitemap', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword]);
    }

    //get A Quote
    public function getquote()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Get a Quote")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('getaquote.getquote', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function getquotemotor()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "CTPL Insurance")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $mvtypes = cocogen_getquote_mvtypes::get();
        $province = province::get();
        $location = location::get();
        $premiums = cocogen_getquote_premium::get();
        return view('getaquote.motor.quote', ['title' => $title, 'mvtypes' => $mvtypes, 'provinces' => $province, 'locations' => $location, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }


    public function getquotemotorsave(Request $request)
    {

        if (session('cocogen_ctpl_clientinfo')) {
            session()->flash('cocogen_ctpl_clientinfo', session('cocogen_ctpl_clientinfo'));
        }

        if ($request->get('tabmax')) {
            session()->flash('tabmax', $request->get('tabmax'));
        }

        if ($request->get('tnxid')) {
            $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_ctpl_clientinfo', $cocogen_ctpl_clientinfo);
        }

        if ($request->get('firstTabBtutton') === "btntab1") {
            if (!session('tabmax') || session('tabmax') === null) {
                if ($request->get('CBnEWcAR')) {
                    $rules = [
                        'policyType' => 'required',
                        'mvType' => 'required',
                        'purchaseDate' => 'required|date_format:Y-n-j',
                        'firstName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'lastName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'middleName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'contactNo' => 'required',
                        'emailAddress' => 'required|email|max:255',
                        'premAmount' => 'required'
                    ];
                    $niceNames = [
                        'policyType' => 'policy type',
                        'mvType' => 'MV type',
                        'firstName' => 'first name',
                        'purchaseDate' => 'purchase date',
                        'lastName' => 'last name',
                        'middleName' => 'middle name',
                        'contactNo' => 'contact no',
                        'emailAddress' => 'email address',
                        'premAmount' => 'premium'
                    ];
                } else {
                    $rules = [
                        'policyType' => 'required',
                        'mvType' => 'required',
                        'firstName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'lastName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'middleName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                        'contactNo' => 'required',
                        'emailAddress' => 'required|email|max:255',
                        'premAmount' => 'required'
                    ];
                    $niceNames = [
                        'policyType' => 'policy type',
                        'mvType' => 'MV type',
                        'firstName' => 'first name',
                        'lastName' => 'last name',
                        'middleName' => 'middle name',
                        'contactNo' => 'contact no',
                        'emailAddress' => 'email address',
                        'premAmount' => 'premium'

                    ];
                }
                $this->validate($request, $rules, [], $niceNames);

                $promo = 0;
                if ($request->get('promoCode')) {
                    $data = DB::table('cocogen_promo')
                        ->select('rate')
                        ->where('effectiveDate', '<', \DB::raw('NOW()'))
                        ->where('expiryDate', '>', \DB::raw('NOW()'))
                        ->where('transType',  "CTPL")
                        ->where('promo', $request->get('promoCode'))
                        ->get();
                    if (count($data) === 0) {
                        //session()->flash('promoCodeError',"Error");
                        return back()->withInput()->with('promoCodeError', "Incorrect promo code");
                    } else {
                        foreach ($data as $val) {
                            $promo = $val->rate;
                        }
                    }
                }

                $premtype = 0;;
                $mvCode = "";
                if ($request->get('CBnEWcAR')) {
                    $data = DB::table('cocogen_getquote_mvtypes')
                        ->select('premtype3', 'mvCode')
                        ->where('policy_id', $request->get('policyType'))
                        ->where('premType', $request->get('mvType'))
                        ->get();
                    foreach ($data as $val) {
                        $premtype = $val->premtype3;
                        $mvCode = $val->mvCode;
                    }
                } else {
                    $data = DB::table('cocogen_getquote_mvtypes')
                        ->select('premtype1', 'mvCode')
                        ->where('policy_id', $request->get('policyType'))
                        ->where('premType', $request->get('mvType'))
                        ->get();
                    foreach ($data as $val) {
                        $premtype = $val->premtype1;
                        $mvCode = $val->mvCode;
                    }
                }
                $grossprem = str_replace(',', '', $request->get('premAmount'));
                if ($request->get('promoCode')) {
                    $finalgrossprem =  $grossprem - ($grossprem * ($promo / 100));
                } else {
                    $finalgrossprem =  $grossprem;
                }


                //save quote reques
                $cocogen_quote_request = new cocogen_quote_request;
                $cocogen_quote_request->tnxid = 1;
                $cocogen_quote_request->policyType = $request->get('policyType');
                $cocogen_quote_request->mvType = $request->get('mvType');
                $cocogen_quote_request->status = "Sent";
                $cocogen_quote_request->mvCode = $mvCode;
                if ($request->get('promoCode')) {
                    $cocogen_quote_request->promoCode = $request->get('promoCode');
                    $cocogen_quote_request->promoRate = $promo;
                }
                $cocogen_quote_request->premium = $finalgrossprem;
                $cocogen_quote_request->premCode  = $premtype;
                if ($request->get('CBnEWcAR')) {
                    $cocogen_quote_request->purchaseDate = $request->get('purchaseDate');
                    $cocogen_quote_request->brand_new = "Y";
                } else {
                    $cocogen_quote_request->brand_new = "N";
                }
                $cocogen_quote_request->save();
                $inserted_id = $cocogen_quote_request->id;

                //update txnid
                $cocogen_quote_tnxid = cocogen_quote_request::findorFail($inserted_id);
                $cocogen_quote_tnxid->tnxid = "MC-MNC-CTPL-" . date('y') . "-" . $inserted_id . "-00";
                $cocogen_quote_tnxid->save();

                $cocogen_ctpl_clientinfo = new cocogen_ctpl_clientinfo;
                $cocogen_ctpl_clientinfo->firstName = $request->get('firstName');
                $cocogen_ctpl_clientinfo->lastName = $request->get('lastName');
                $cocogen_ctpl_clientinfo->tnxid = "MC-MNC-CTPL-" . date('y') . "-" . $inserted_id . "-00";
                $cocogen_ctpl_clientinfo->middleName = $request->get('middleName');
                $cocogen_ctpl_clientinfo->barangay = $request->get('barangay');
                $cocogen_ctpl_clientinfo->Address = $request->get('Address');
                $cocogen_ctpl_clientinfo->contactNo = $request->get('contactNo');
                $cocogen_ctpl_clientinfo->emailAddress = $request->get('emailAddress');
                $cocogen_ctpl_clientinfo->save();

                session()->flash('tnxid', "MC-MNC-CTPL-" . date('y') . "-" . $inserted_id . "-00");
                session()->flash('tabmax', 2);
            }

            $tab = "tab2";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('firstTabBtutton') === "btntab1update") {
            session()->flash('tnxid', $request->get('tnxid'));
            $tab = "tab2";
            return back()->withInput()->with('tab', $tab);
        }
        if ($request->get('SecondTabButtonBack') === "tab2back") {
            session()->flash('tnxid', $request->get('tnxid'));
            $tab = "tab2back";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('ThirdTabButtonBack') === "default") {
            session()->flash('tnxid', $request->get('tnxid'));
            $tab = "tab3back";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('SecondTabBtuttonNext') === "btntab3") {

            session()->flash('tnxid', $request->get('tnxid'));
            if (session('tabmax') <= 2) {

                $cocogen_quote_request = cocogen_quote_request::where('tnxid', '=', $request->get('tnxid'))->get();
                if ($cocogen_quote_request[0]["brand_new"] === "Y") {
                    $rules = [
                        'engineNO' => 'required',
                        'make' => 'required',
                        'chassisNo' => 'required',
                        'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 5)
                    ];
                    $niceNames = [
                        'mvFIleNo' => 'MV file number',
                        'plateNo' => 'plate number',
                        'engineNO' => 'engine number',
                        'chassisNo' => 'chassis number',
                        'make' => 'make',
                        'year' => 'year'
                    ];
                } else {
                    $rules = [
                        'mvFIleNo' => 'required|digits:15',
                        'plateNo' => 'required',
                        'engineNO' => 'required',
                        'make' => 'required',
                        'chassisNo' => 'required',
                        'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 5)
                    ];
                    $niceNames = [
                        'mvFIleNo' => 'MV file number',
                        'plateNo' => 'plate number',
                        'engineNO' => 'engine number',
                        'chassisNo' => 'chassis number',
                        'make' => 'make',
                        'year' => 'year'
                    ];
                }
                $this->validate($request, $rules, [], $niceNames);


                $cocogen_ctpl_vehicleinfo = new cocogen_ctpl_vehicleinfo;
                $cocogen_ctpl_vehicleinfo->mvFIleNo = $request->get('mvFIleNo');
                $cocogen_ctpl_vehicleinfo->plateNo = $request->get('plateNo');
                $cocogen_ctpl_vehicleinfo->tnxid = $request->get('tnxid');
                $cocogen_ctpl_vehicleinfo->engineNO = $request->get('engineNO');
                $cocogen_ctpl_vehicleinfo->make = $request->get('make');
                $cocogen_ctpl_vehicleinfo->chassisNo = $request->get('chassisNo');
                $cocogen_ctpl_vehicleinfo->year = $request->get('year');
                $cocogen_ctpl_vehicleinfo->save();

                $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $request->get('tnxid'))->get();
                session()->flash('cocogen_ctpl_clientinfo', $cocogen_ctpl_clientinfo);
                session()->flash('tabmax', 3);
            }
            $tab = "tab3";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('SecondTabBtuttonNext') === "btntab1update") {
            session()->flash('tnxid', $request->get('tnxid'));
            $tab = "tab3";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('ThirdTabBtuttonBuy') === "BuyFinal") {

            session()->flash('tnxid', $request->get('tnxid'));
            //validation
            $rules = [
                'birthDate' => 'required|date_format:Y-n-j|before:-18 years',
                'tinNo' => 'required',
                'province' => 'required',
                'city' => 'required',
                'Address' => 'required'
            ];
            $niceNames = [

                'birthDate' => 'birthdate',
                'tinNo' => 'tin no',
                'province' => 'province',
                'city' => 'city',
                'Address' => 'address'
            ];
            $this->validate($request, $rules, [], $niceNames);

            if ($request->get('CBPrivacy') != 1) {
                session()->flash('tab', "tab3");
                $message = "Please accept our Privacy Policy before proceeding to payment.";
                return back()->withInput()->with('message', $message);
            }

            if ($request->get('CBTerms') != 1) {
                session()->flash('tab', "tab3");
                $message = "Please accept our Terms & Conditions before proceeding to payment.";
                return back()->withInput()->with('message', $message);
            }

            if ($request->get('CBExclusion') != 1) {
                session()->flash('tab', "tab3");
                $message = "Please accept our Exclusion & Limitations before proceeding to payment.";
                return back()->withInput()->with('message', $message);
            }

            $data = DB::table('cocogen_quote_request')
                ->select('premium')
                ->where('tnxid', $request->get('tnxid'))
                ->get();
            $premium = 0;
            if ($data) {
                foreach ($data as $value) {
                    $premium = $value->premium;
                }
            }

            $magilasdonation = 0;
            if ($request->get('CBMagilas')) {
                if ($request->get('drpMagilas') === "Others") {
                    if ($request->get('otherMagilas')) {
                        $magilasdonation = str_replace(',', '', $request->get('otherMagilas'));
                    }
                } else {
                    $magilasdonation = $request->get('drpMagilas');
                }
            }
            $premium = $premium + $magilasdonation;
            $cocogen_quote_request_changeprimary = cocogen_quote_request_changeprimary::findorFail($request->get('tnxid'));
            $cocogen_quote_request_changeprimary->premium  = $premium;
            $cocogen_quote_request_changeprimary->magilasDonation  = $magilasdonation;
            $cocogen_quote_request_changeprimary->save();

            $cocogen_ctpl_clientinfo_changeprimary = cocogen_ctpl_clientinfo_changeprimary::findorFail($request->get('tnxid'));
            $cocogen_ctpl_clientinfo_changeprimary->birthDate = $request->get('birthDate');
            $cocogen_ctpl_clientinfo_changeprimary->tinNo = $request->get('tinNo');
            $cocogen_ctpl_clientinfo_changeprimary->province = $request->get('province');
            $cocogen_ctpl_clientinfo_changeprimary->city = $request->get('city');
            $cocogen_ctpl_clientinfo_changeprimary->Address = $request->get('Address');
            $cocogen_ctpl_clientinfo_changeprimary->save();

            $tab = "tab3";

            $full_name = $request->get('firstNameOld') . ' ' . $request->get('middleNameOld') . ' ' . $request->get('lastNameOld');
            $tinNo = $request->get('tinNo');
            $parameters = [
                'txnid' => $request->get('tnxid'), # Varchar(40) A unique id identifying this specific transaction from the merchant site
                'amount' => $premium, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                'ccy' => 'PHP', # Char(3) The currency of the amount
                'description' => $request->get('tnxid'), # Varchar(128) A brief description of what the payment is for
                'email' => $request->get('emailAddressOld'), # Varchar(40) email address of customer
                'param1' => $full_name, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                'param2' => $tinNo, # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
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
            $dragonpay->setParameters($parameters)->withProcid(Processor::CREDIT_CARD)->away();
            //$dragonpay->setParameters($parameters)->away();
        }
    }

    public function emailsendctpl($fname, $email, $content)
    {
        $data = array('fname' => $fname, 'email' => $email, 'content' => $content);
        Mail::send('emailtemplate.ctplexternal', $data, function ($message) use ($fname, $email, $content) {
            $message->to($email, 'COCOGEN')->subject($fname . ', here are your CTPL insurance policies')->from('no_reply@cocogen.com', 'COCOGEN');
        });
    }

    public function emailsendctplinternal($fname, $email, $contactNo, $dtnow, $coclink)
    {
        $data = array('fname' => $fname, 'email' => $email, 'contactNo' => $contactNo, 'dtnow' => $dtnow, 'coclink' => $coclink);
        Mail::send('emailtemplate.ctplinternal', $data, function ($message) use ($fname, $email, $contactNo, $dtnow, $coclink) {
            $message->to(env('PRODUCTINQURY_EMAILTO'), 'COCOGEN')->subject('Successful CTPL E-Commrce transaction: ' . $fname)->from('no_reply@cocogen.com', 'COCOGEN');
        });
    }

    public function emailsendcompre($fname, $email, $content)
    {
        $data = array('fname' => $fname, 'email' => $email, 'content' => $content);
        Mail::send('emailtemplate.compreexternal', $data, function ($message) use ($fname, $email, $content) {
            $message->to($email, 'COCOGEN')->subject($fname . ', here is your Motor Excel Plus Insurance Policy')->from('no_reply@cocogen.com', 'COCOGEN');
        });
    }

    public function emailsendcompreinternal($fname, $email, $contactNo, $dtnow, $URllink)
    {
        $data = array('fname' => $fname, 'email' => $email, 'contactNo' => $contactNo, 'dtnow' => $dtnow, 'URllink' => $URllink);
        Mail::send('emailtemplate.compreinternal', $data, function ($message) use ($fname, $email, $contactNo, $dtnow, $URllink) {
            $message->to('client_services@cocogen.com', 'COCOGEN')->subject('Successful Motor Excel Plus transaction: ' . $fname);
        });
    }

    public function emailsendCovidExternal($name, $email, $location, $filename, $tnxid, $unit)
    {
        $data = array('name' => $name, 'email' => $email, 'location' => $location, 'filename' => $filename, 'tnxid' => $tnxid);
        if ($unit === 2) {
            Mail::send('emailtemplate.covidExternal', $data, function ($message) use ($name, $email, $location, $filename, $tnxid) {
                $message->to($email)->subject($name . ' you are now covered by Cocogen COVID-19 Assist+');
                $message->attach($location, array(
                    'as'    => "COC-" . $tnxid . "-" . $name . ".pdf",
                    'mime'  => 'application/pdf'
                ))
                    ->attach($location, array(
                        'as'    => "COC1-" . $tnxid . "-" . $name . ".pdf",
                        'mime'  => 'application/pdf'
                    ));
            });
        } else {
            Mail::send('emailtemplate.covidExternal', $data, function ($message) use ($name, $email, $location, $filename, $tnxid) {
                $message->to($email)->subject($name . ' you are now covered by Cocogen COVID-19 Assist+');
                $message->attach($location, array(
                    'as'    => "COC-" . $tnxid . "-" . $name . ".pdf",
                    'mime'  => 'application/pdf'
                ));
            });
        }
    }

    public function emailsendonlinepayment($fname, $email, $txnid, $amount, $content)
    {
        $data = array('fname' => $fname, 'email' => $email, 'txnid' => $txnid, 'amount' => $amount, 'content' => $content);
        Mail::send('emailtemplate.onlinepayment', $data, function ($message) use ($fname, $email, $txnid, $amount, $content) {
            $message->to($email, 'COCOGEN')->subject('Transaction: ' . $txnid . ' Payment Successful')->from('no_reply@cocogen.com', 'COCOGEN');;
        });
    }
    public function emailsendonlinepaymentinternal($fname, $email, $txnid, $amount, $datenoww, $invoiceall)
    {
        $data = array('fname' => $fname, 'email' => $email, 'txnid' => $txnid, 'amount' => $amount, 'datenoww' => $datenoww, 'invoiceall' => $invoiceall);
        Mail::send('emailtemplate.onlinepaymentexternal', $data, function ($message) use ($fname, $email, $txnid, $amount, $datenoww, $invoiceall) {
            $message->to(env('ONLINEPAYMENT_EMAILTO'), 'COCOGEN')->subject('Online Payment for: ' . $txnid)->from('no_reply@cocogen.com', 'COCOGEN');;
        });
    }
    public function downloadPDFCTPL($txnid,$authno)
    {
        //$txnid = "MC-MNC-CTPL-25-835-00";
        ///$authno ="1215fds2132d";
        $cocogen_ctpl_vehicleinfos = cocogen_ctpl_vehicleinfo::where('tnxid', '=', $txnid)->get();
        $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $txnid)->get();
        $cocogen_quote_requests = cocogen_quote_request::where('tnxid', '=', $txnid)->get();
        $full = $cocogen_ctpl_clientinfo[0]['firstName'] . " " . $cocogen_ctpl_clientinfo[0]['middleName'] . " " . $cocogen_ctpl_clientinfo[0]['lastName'];
        $address = $cocogen_ctpl_clientinfo[0]['Address'];
        $authNo = $authno;
        $cocNO = $cocogen_ctpl_vehicleinfos[0]['cocNO'];
        $make = $cocogen_ctpl_vehicleinfos[0]['make'];
        $bodyType = $cocogen_ctpl_vehicleinfos[0]['bodyType'];
        $chassisNo = $cocogen_ctpl_vehicleinfos[0]['chassisNo'];
        $engineNO = $cocogen_ctpl_vehicleinfos[0]['engineNO'];
        $premium = $cocogen_quote_requests[0]['premium'];
        $english_format_number = number_format($premium, 2, '.', ',');


        if ($cocogen_quote_requests[0]['brand_new'] == "Y") {
            $dtCreated = date('m/d/Y', strtotime($cocogen_quote_requests[0]['purchaseDate']));
            $futureDate = date("m/d/Y", strtotime(date("m/d/Y", strtotime($dtCreated)) . " + 3 year"));
            $mvFIleNo = "";
            $plateNo = "";
        } else {
            $mvFIleNo = $cocogen_ctpl_vehicleinfos[0]['mvFIleNo'];
            $plateNo = $cocogen_ctpl_vehicleinfos[0]['plateNo'];
            $plate = $cocogen_ctpl_vehicleinfos[0]['plateNo'];

            if(strlen($plateNo) > 0){
                $dateINEX = substr($plate, -1);
                $cocogen_api_ctpl_mvtype_format = cocogen_api_ctpl_mvtype_format::where('mvtype', '=', $cocogen_quote_requests[0]['mvCode'])->get();
                if(count($cocogen_api_ctpl_mvtype_format) > 0){
                    $first = substr($plateNo, 0, 1);
                    $second = substr($plateNo, 1, 1);
                    $third = substr($plateNo, 2, 1);
                    $fourth = substr($plateNo, 3, 1);
                    $fifith = substr($plateNo, 4, 1);
                    $six = substr($plateNo, 5, 1);

                    $barfirst = "";
                    $barsecond = "";
                    $barthird = "";
                    $barfourth = "";
                    $barfifth = "";
                    $barsix = "";

                    if(is_numeric($first)){
                            $barfirst = "N";
                    }else{
                            $barfirst = "X";
                    }

                    if(is_numeric($second)){
                            $barsecond = "N";
                    }else{
                            $barsecond = "X";
                    }

                    if(is_numeric($third)){
                            $barthird = "N";
                    }else{
                            $barthird = "X";
                    }

                    if(is_numeric($fourth)){
                            $barfourth = "N";
                    }else{
                            $barfourth = "X";
                    }

                    if(is_numeric($fifith)){
                            $barfifth = "N";
                    }else{
                            $barfifth = "X";
                    }

                    if(is_numeric($six)){
                            $barsix = "N";
                    }else{
                            $barsix = "X";
                    }

                    $finalformat = $barfirst . $barsecond . $barthird . $barfourth . $barfifth . $barsix;
                    $cocogen_api_ctpl_plate_format = cocogen_api_ctpl_plate_format::where('format', '=',$finalformat)->get();  
                    $numberformat = 0;
                    // $dateINEX = "";
                    if(count($cocogen_api_ctpl_plate_format) > 0){
                        $numberformat = $cocogen_api_ctpl_plate_format[0]['index_no'];
                        if ((int)$numberformat === 1) {
                            $dateINEX = substr($plateNo, 0, 1);
                        }elseif ((int)$numberformat === 2) {
                            $dateINEX = substr($plateNo, 1, 1); 
                        }elseif ((int)$numberformat === 3) {
                            $dateINEX = substr($plateNo, 2, 1); 
                        }elseif ((int)$numberformat === 4) {
                            $dateINEX = substr($plateNo, 3, 1); 
                        }elseif ((int)$numberformat === 5) {
                            $dateINEX = substr($plateNo, 4, 1); 
                        }else{
                            $dateINEX = substr($plateNo, 5, 1); 
                        }
                    }

                }

            }

            if ($dateINEX == 1) {
                $dtCreated = "02/01/" . date('Y');
                $futureDate = "02/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 2) {
                $dtCreated = "03/01/" . date('Y');
                $futureDate = "03/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 3) {
                $dtCreated = "04/01/" . date('Y');
                $futureDate = "04/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 4) {
                $dtCreated = "05/01/" . date('Y');
                $futureDate = "05/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 5) {
                $dtCreated = "06/01/" . date('Y');
                $futureDate = "06/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 6) {
                $dtCreated = "07/01/" . date('Y');
                $futureDate = "07/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 7) {
                $dtCreated = "08/01/" . date('Y');
                $futureDate = "08/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 8) {
                $dtCreated = "09/01/" . date('Y');
                $futureDate = "09/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 9) {
                $dtCreated = "10/01/" . date('Y');
                $futureDate = "10/01/" . date('Y', strtotime('+1 years'));
            } elseif ($dateINEX == 0) {
                $dtCreated = "01/01/" . date('Y');
                $futureDate = "01/01/" . date('Y', strtotime('+1 years'));
            } else {
                $dtCreated = "01/01/" . date('Y');
                $futureDate = "01/01/" . date('Y', strtotime('+1 years'));
            }
        }
        // dd($numberformat,$dateINEX,$plateNo,$finalformat,  $barfirst,  $barsecond,  $barthird,  $barfourth,  $barfifth,  $barsix,$dtCreated,$futureDate);

        $data = array(
            'name' => $full,
            'address' => $address,
            'authNo' => $authNo,
            'txnid' => $txnid,
            'cocNO' => $cocNO,
            'dtCreated' => $dtCreated,
            'futureDate' => $futureDate,
            'make' => $make,
            'bodyType' => $bodyType,
            'mvFIleNo' => $mvFIleNo,
            'plateNo' => $plateNo,
            'chassisNo' => $chassisNo,
            'engineNO' => $engineNO,
            'premium' => $english_format_number
        );

        $hasht = Hash::make($txnid . '-COCCTPL');
        $cocogen_ctpl_file = new cocogen_ctpl_file;
        $cocogen_ctpl_file->tnxid = $txnid;
        $cocogen_ctpl_file->filename =  md5($hasht) . '-COCCTPL.pdf';
        $cocogen_ctpl_file->fileLocation = 'public/pdf/ctpl/' .  md5($hasht) . '-COCCTPL.pdf';
        $cocogen_ctpl_file->save();

        $pdf = PDF::loadView('pdf.pdfsample', $data);
        Storage::put('public/pdf/ctpl/' . md5($hasht) . '-COCCTPL.pdf', $pdf->output());
        return $pdf->download('COCCTPL.pdf');
    }
    public function downloadPDFCOMPRE()
    {
        $txnid = "MC-MNCN-COMPRE-24-4028-00";
        $cocogen_compre_carinfo = cocogen_compre_carinfo::where('tnxid', '=', $txnid)->get();
        $cocogen_compre_personalinfo = cocogen_compre_personalinfo::where('tnxid', '=', $txnid)->get();
        $cocogen_compre_addtlcarinfo = cocogen_compre_addtlcarinfo::where('tnxid', '=', $txnid)->get();

        if ($cocogen_compre_addtlcarinfo[0]['inceptDate']) {
            $dtCreated = date('m/d/Y', strtotime($cocogen_compre_addtlcarinfo[0]['inceptDate']));
            $futureDate = date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['inceptDate'])));
        } else {
            $dtCreated = date('m/d/Y', strtotime($cocogen_compre_addtlcarinfo[0]['created_at']));
            $futureDate = date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['created_at'])));
        }


        $assured = $cocogen_compre_personalinfo[0]['firstName'] . " " . $cocogen_compre_personalinfo[0]['lastName'];
        $address = $cocogen_compre_personalinfo[0]['residence_address'] . ' '. $cocogen_compre_personalinfo[0]['residence_barangay'] . ' ' . $cocogen_compre_personalinfo[0]['residence_municipality'] . ' ' . $cocogen_compre_personalinfo[0]['residence_province'];
        $model = $cocogen_compre_carinfo[0]['model'];
        $brand = $cocogen_compre_carinfo[0]['brand'];
        $promoCode = $cocogen_compre_carinfo[0]['promoCode'];
        $bodyType = $cocogen_compre_addtlcarinfo[0]['bodyType'];
        $color = $cocogen_compre_addtlcarinfo[0]['color'];
        $chassisNo = $cocogen_compre_addtlcarinfo[0]['chassisNo'];
        $engineNo = $cocogen_compre_addtlcarinfo[0]['engineNo'];
        $plateNo = $cocogen_compre_addtlcarinfo[0]['plateNo'];
        $inceptDate = $dtCreated . ' - ' . $futureDate;
        $ODTheft = number_format($cocogen_compre_carinfo[0]['ODTheft'], 2, '.', ',');
        $mortgagee = $cocogen_compre_addtlcarinfo[0]['mortgagee'];
        $deductible = number_format($cocogen_compre_carinfo[0]['deductible'], 2, '.', ',');
        $bodilyInjury = number_format($cocogen_compre_carinfo[0]['bodilyInjury'], 2, '.', ',');
        $propertyDamage =  number_format($cocogen_compre_carinfo[0]['propertyDamage'], 2, '.', ',');
        $autoPA =  number_format($cocogen_compre_carinfo[0]['autoPA'], 2, '.', ',');

        if ($cocogen_compre_carinfo[0]['reqType'] === "1") {
            $actsOfNature =  number_format($cocogen_compre_carinfo[0]['actsOfNature'], 2, '.', ',');
            $finalDue = number_format($cocogen_compre_carinfo[0]['finalDueWithAOM'], 2, '.', ',');
            $RSCC =  number_format($cocogen_compre_carinfo[0]['actsOfNature'], 2, '.', ',');
        } else {
            $RSCC =  "0.00";
            $actsOfNature =  "0.00";
            $finalDue = number_format($cocogen_compre_carinfo[0]['finalDue'], 2, '.', ',');
        }


        $data = array(
            'assured' => $assured,
            'address' => $address,
            'brand' => $brand,
            'model' => $model,
            'txnid' => $txnid,
            'bodyType' => $bodyType,
            'color' => $color,
            'chassisNo' => $chassisNo,
            'engineNo' => $engineNo,
            'plateNo' => $plateNo,
            'inceptDate' => $inceptDate,
            'ODTheft' => $ODTheft,
            'mortgagee' => $mortgagee,
            'deductible' => $deductible,
            'bodilyInjury' => $bodilyInjury,
            'propertyDamage' => $propertyDamage,
            'autoPA' => $autoPA,
            'actsOfNature' => $actsOfNature,
            'promoCode' => $promoCode,
            'RSCC' => $RSCC,
            'finalDue' => $finalDue
        );
        $hasht = Hash::make($txnid . '-COCCOMPRE');

        $cocogen_compre_file = new cocogen_compre_file;
        $cocogen_compre_file->tnxid = $txnid;
        $cocogen_compre_file->filename =  md5($hasht) . '-COCCOMPRE';
        $cocogen_compre_file->fileLocation = 'public/pdf/compre/' . md5($hasht) . '-COCCOMPRE.pdf';
        $cocogen_compre_file->save();

        $pdf = PDF::loadView('pdf.comprepdfsample', $data);
        Storage::put('public/pdf/compre/' . md5($hasht) . '-COCCOMPRE.pdf', $pdf->output());
        return $pdf->download('COMPRECTPL.pdf');
    }

    public function onlinepaymentonsuccess()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Success | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('services.success', ['title' => $title, 'txnid' => '', 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function onlinepaymentonfailed()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Failed | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('services.failed', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function onlinepaymentonpending()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Pending | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('services.pending', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function compreonsuccess()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Success | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('getaquote.motor.compre.success', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function compreonfailed()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Failed | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        return view('services.failed', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function ctplonsuccess()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Success | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        if (!empty(Session::get('authNo'))) {
            $authNo = Session::get('authNo');
        } else {
            $authNo = "";
        }

        return view('getaquote.motor.ctpl.success', ['title' => $title, 'authNo' => $authNo, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function ctplonfailed()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $metadescription = "";
        $keyword = "";
        $title = "Failed | COCOGEN | General Insurance";
        return view('services.failed', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function downloadcoc($filename, $txnid)
    {
        $tnxid = base64_decode($txnid);
        $s = "/";
        $s2 = substr($s, 0, 1);
        //$slash = substr($s2,0, -1);
        $files = cocogen_compre_file::where('tnxid', '=', $tnxid)->get();
        // $file_path = storage_path('app') . $s2 .$files['0']['fileLocation'];
        $file_path = "/var/www/html/cocogen/storage/app/" . $files['0']['fileLocation'];
        return response()->file($file_path);
    }

    public function downloadcocctpl($filename, $txnid)
    {
        $tnxid = base64_decode($txnid);
        $s = "\'";
        $s2 = substr($s, 0, 1);
        //$slash = substr($s2,0, -1);
        $files = cocogen_ctpl_file::where('tnxid', '=', $tnxid)->get();
        $file_path = "/var/www/html/cocogen/storage/app/" . $files['0']['fileLocation'];
        return response()->file($file_path);
    }

    public function downloadPDFCOVID($txnid)
    {

        $cocogen_covid_trans = cocogen_covid_trans::where('tnxid', '=', $txnid)->get();
        $birthdate = date('m/d/Y', strtotime($cocogen_covid_trans[0]['birthdate']));
        $incept_date = date('m/d/Y', strtotime($cocogen_covid_trans[0]['incept_date']));
        $expiry_date = date('m/d/Y', strtotime($cocogen_covid_trans[0]['expiry_date']));

        $name = $cocogen_covid_trans[0]['firstname'] . " " . $cocogen_covid_trans[0]['middlename'] . " " . $cocogen_covid_trans[0]['lastname'];

        $data = array(
            'cocno' => $cocogen_covid_trans[0]['tnxid'],
            'name' => $name,
            'birthdate' => $birthdate,
            'beneficiary' => $cocogen_covid_trans[0]['beneficiary'],
            'relationship' => $cocogen_covid_trans[0]['relationship'],
            'address' => $cocogen_covid_trans[0]['residence_address'],
            'from' => $incept_date,
            'to' => $expiry_date
        );
        $hasht = Hash::make($txnid . '-COVIDCOC');

        $cocogen_covid_file = new cocogen_covid_file;
        $cocogen_covid_file->tnxid = $txnid;
        $cocogen_covid_file->filename =  md5($hasht) . '-COVIDCOC';
        $cocogen_covid_file->fileLocation = 'public/pdf/covid/' . md5($hasht) . '-COVIDCOC.pdf';
        $cocogen_covid_file->save();
        if ($cocogen_covid_trans[0]['coverage'] === "Basic") {
            $pdf = PDF::loadView('pdf.cocpdf', $data);
        } else {
            $pdf = PDF::loadView('pdf.cocpdfprime', $data);
        }


        Storage::put('public/pdf/covid/' . md5($hasht) . '-COVIDCOC.pdf', $pdf->output());
        return $pdf->download('COVIDCOC.pdf');
    }

    public function dragonpaypostbacksave(Request $request)
    {
        $data =  $request->all();
        $dtnow = date('Y-m-d H:i:s');

        $onpaymnt   = "ONPAYMNT";
        $flagonpaymnt = strstr($request->get('txnid'), $onpaymnt);
        if ($flagonpaymnt) {
            if ($request->get('status') === "S") {

                $cocogen_onlinepayments_changeprimary = cocogen_onlinepayments_changeprimary::where('tnxid', '=', $request->get('txnid'))->get();
                $cocogen_onlinepayments_dtl = cocogen_onlinepayments_dtl::where('pay_id', '=', $cocogen_onlinepayments_changeprimary[0]['id'])->get();
                $invoiceall = "";
                foreach ($cocogen_onlinepayments_dtl as $key) {
                    if ($invoiceall) {
                            if($key->policyNo){
                                $invoiceall = $invoiceall .''.$key->policyNo .'/'.$key->invoiceNo .' '.number_format($key->amount, 2, '.', ','). "<br>";
                            }else{
                                $invoiceall = $invoiceall .''.$key->invoiceNo .' '.number_format($key->amount, 2, '.', ','). "<br>";
                            }
                        }else{
                            $invoiceall = 'Policy No / Invoice No'.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            '.'Amount'."<br>";
                            if($key->policyNo){
                                $invoiceall = $invoiceall .''.$key->policyNo .'/'.$key->invoiceNo .' &nbsp;&nbsp;&nbsp;'.number_format($key->amount, 2, '.', ','). "<br>";
                            }else{
                                $invoiceall = $invoiceall .''.$key->invoiceNo .'&nbsp;&nbsp;&nbsp;'.number_format($key->amount, 2, '.', ','). "<br>";
                            }
                    }
                }

                $statuss = $cocogen_onlinepayments_changeprimary[0]['status'];
                $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));
                if ($statuss != "Paid") {
                    if ($sc === $request->get('digest')) {
                        $full_name = $cocogen_onlinepayments_changeprimary[0]['name'];
                        $english_format_number = number_format($request->get('param1'), 2, '.', ',');
                        $cocogen_onlinepayments_changeprimary = cocogen_onlinepayments_changeprimary::findorFail($request->get('txnid'));
                        $cocogen_onlinepayments_changeprimary->status = "PAID";
                        $cocogen_onlinepayments_changeprimary->save();

                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 3)->get();
                        $external = str_replace("templatefname",  $full_name, $cocogen_admin_emailtemplate[0]['content']);
                        $external = str_replace("teplateamount ", $english_format_number, $external);
                        $external = str_replace("templatetxnid", $request->get('txnid'), $external);


                        $this->emailsendonlinepayment($full_name, $request->get('param2'), $request->get('txnid'), $english_format_number, $external);
                        $this->emailsendonlinepaymentinternal($full_name, $request->get('param2'), $request->get('txnid'), $english_format_number, $dtnow, $invoiceall);
                        return redirect('/get-quote/online-payments/success/');
                    } else {
                        return redirect('/get-quote/online-payments/failed/');
                    }
                } else {
                    return redirect('/get-quote/online-payments/failed/');
                }
            }
        }

        $covid   = "COVID";
        $flagcovid = strstr($request->get('txnid'), $covid);
        if ($flagcovid) {
            if ($request->get('status') === "S") {
                $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));
                if ($sc === $request->get('digest')) {
                    $cocogen_covid_tranids = cocogen_covid_trans::where('group_tnxid', '=', $request->get('txnid'))->get();
                    foreach ($cocogen_covid_tranids as $val) {
                        $cocogen_covid_trans = cocogen_covid_trans::findorFail($val->id);
                        $cocogen_covid_trans->status = "Paid";
                        $cocogen_covid_trans->save();

                        $fullname = $val->firstname . " " . $val->middlename . " " . $val->lastname;
                        $this->downloadPDFCOVID($val->tnxid);
                        $cocogen_covid_file = cocogen_covid_file::where('tnxid', '=', $val->tnxid)->get();
                        $location = storage_path('app') . "/" . $cocogen_covid_file[0]["fileLocation"];
                        // $location = storage_path('app')."\public\pdf\covid/";
                        $filename = $cocogen_covid_file[0]["filename"];

                        $this->emailsendCovidExternal($fullname, $val->email, $location, $filename, $val->tnxid, $val->unit);
                    }
                    return redirect('/get-quote/covid-19-assist-plus/success/');
                } else {
                    return redirect('/get-quote/covid-19-assist-plus/failed/');
                }
            } elseif ($request->get('status') === "P") {

                return redirect('/get-quote/covid-19-assist-plus/pending');
            } else {

                $cocogen_covid_tranids = cocogen_covid_trans::where('group_tnxid', '=', $request->get('txnid'))->get();
                if (count($cocogen_covid_tranids) > 0) {
                    foreach ($cocogen_covid_tranids as $val) {
                        $cocogen_covid_trans = cocogen_covid_trans::findorFail($val->id);
                        $cocogen_covid_trans->paymentType = $request->get('status');
                        $cocogen_covid_trans->save();
                    }
                }

                return redirect('/get-quote/covid-19-assist-plus/failed/');
            }
        }

        $compre   = "COMPRE";
        $flagCompre = strstr($request->get('txnid'), $compre);
        if ($flagCompre) {
            if ($request->get('status') === "S") {

                $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));

                //  dd($request,$sc , $request->get('digest'));
                if ($sc === $request->get('digest')) {
                    $cocogen_covid_tranids = cocogen_covid_trans::where('group_tnxid', '=', $request->get('txnid'))->get();

                    $this->downloadPDFCOMPRE($request->get('txnid'));
                    $cocogen_compre_carinfo_changeprimary = cocogen_compre_carinfo_changeprimary::findorFail($request->get('txnid'));
                    $cocogen_compre_carinfo_changeprimary->status = "PAID";
                    $cocogen_compre_carinfo_changeprimary->save();
                    $cocogen_compre_personalinfo = cocogen_compre_personalinfo::where('tnxid', '=', $request->get('txnid'))->get();
                    $cocogen_compre_carinfo = cocogen_compre_carinfo::where('tnxid', '=', $request->get('txnid'))->get();
                    $cocogen_compre_file = cocogen_compre_file::where('tnxid', '=', $request->get('txnid'))->get();
                    $emailAddress = $cocogen_compre_personalinfo[0]['emailAddress'];
                    $contactNo = $cocogen_compre_personalinfo[0]['contactNo'];
                    $fullname = $cocogen_compre_personalinfo[0]['firstName'] . " " . $cocogen_compre_personalinfo[0]['lastName'];
                    $statuss = $cocogen_compre_carinfo[0]['status'];
                    $coclink = URL::to('/get-quote/view_coc') . '/' . sha1($emailAddress) . '/' . base64_encode($request->get('txnid'));

                    if (count($cocogen_compre_carinfo[0]['promoCode']) > 0) {
                        $cocogen_promo = cocogen_promo::where('promo', '=', $cocogen_compre_carinfo[0]['promoCode'])->get();

                        if (count($cocogen_promo) > 0) {
                            $limit = $cocogen_promo[0]['limit_usage'] - 1;
                            $cocogen_promo = cocogen_promo::findorFail($cocogen_compre_carinfo[0]['promoCode']);
                            $cocogen_promo->limit_usage = $limit;
                            $cocogen_promo->save();
                        }
                    }
                    $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 6)->get();
                    $external = str_replace("teamplatefname", $fullname, $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace("templatelink", $coclink, $external);
                    $this->emailsendcompre($fullname, $emailAddress, $external);
                    $this->emailsendcompreinternal($fullname, $emailAddress, $contactNo, $dtnow, $coclink);
                    return redirect('/get-quote/motor-insurance/compre/success/');
                } else {
                    return redirect('/get-quote/motor-insurance/compre/failed/');
                }
            } elseif ($request->get('status') === "P") {
                return redirect('/get-quote/motor-insurance/compre/pending');
            } else {
                return redirect('/get-quote/motor-insurance/compre/failed/');
            }
        }

        $domestic   = "Domestic";
        $flagdomestic = strstr($request->get('txnid'), $domestic);
        if ($flagdomestic) {
            $cocogen_domestic_trans = cocogen_domestic_trans::where('trans_id', '=', $request->get('txnid'))->get();
            if($request->get('status') === "S"){
                if(count($cocogen_domestic_trans) > 0){
                    $cocogen_domestic_trans_update_stat = cocogen_domestic_trans::findorFail($cocogen_domestic_trans[0]['id']);
                    $cocogen_domestic_trans_update_stat->status = "PAID";
                    $cocogen_domestic_trans_update_stat->save();

                    $full_name = $cocogen_domestic_trans[0]['fname']  ." ".
                                    $cocogen_domestic_trans[0]['mname'] ." ".
                                    $cocogen_domestic_trans[0]['lname'];
                    $net_prem = number_format($cocogen_domestic_trans[0]['net_prem'], 2);
                    $doc_stamp = number_format($cocogen_domestic_trans[0]['doc_stamp'], 2);
                    $prem_tax = number_format($cocogen_domestic_trans[0]['prem_tax'], 2);
                    $lgt_tax = number_format($cocogen_domestic_trans[0]['lgt_tax'], 2);
                    $amount_due = number_format($cocogen_domestic_trans[0]['amount_due'], 2);
                    $final_due = number_format($cocogen_domestic_trans[0]['final_due'], 2);

                    $promo = $cocogen_domestic_trans[0]['promo'];
                    $promo_less = $cocogen_domestic_trans[0]['promo_less'];

                    if($promo){
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 16)->get();
                    }else{
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 15)->get();
                    }

                    $this->downloadPDFDomestic($cocogen_domestic_trans[0]['trans_id']);
                    $cocogen_domestic_file = cocogen_domestic_file::where('tnxid', '=', $cocogen_domestic_trans[0]['trans_id'])->get();
                    $cocogen_domestic_trans_destination = cocogen_domestic_trans_destination::where('trans_id', '=', $cocogen_domestic_trans[0]['trans_id'])->get();
                    if(count($cocogen_domestic_trans_destination) > 0){
                        $destination = "";
                        foreach ($cocogen_domestic_trans_destination as $cocogen_domestic_trans_destinations) {
                            if($destination){
                                $destination = $destination ." - ".$cocogen_domestic_trans_destinations->destination;
                            }else{
                                $destination = $cocogen_domestic_trans_destinations->destination;
                            }
                        }
                    }
                    $location = storage_path('app') . "/" . $cocogen_domestic_file[0]["fileLocation"];
                    $location2 = storage_path('app') . "/" . "public/pdf/domesticjacket/Travel Excel Plus Domestic Policy - Basic Coverage Final 05172022.pdf";
                    $filename = $cocogen_domestic_file[0]["filename"];

                    $cocogen_domestic_trans_destination = cocogen_domestic_trans_destination::where('trans_id', '=', $cocogen_domestic_trans[0]['trans_id'])->get();

                    $dateFromDomestic = $cocogen_domestic_trans_destination->min('date_from');
                    $dateToDomestic = $cocogen_domestic_trans_destination->max('date_to');

                    $dtnow = date("Y-m-d H:i:s", strtotime("+8 hours"));
                    $external = str_replace( "templatefname", $full_name, $cocogen_admin_emailtemplate[0]['content']);
                    $from_date = date('F d, Y', strtotime($dateFromDomestic));
                    $to_date = date('F d, Y', strtotime($dateToDomestic));
                    $created_at = date('F d, Y', strtotime($cocogen_domestic_trans[0]['created_at']));
                    $bday = date('F d, Y', strtotime($cocogen_domestic_trans[0]['bday']));
                    $agentname = $cocogen_domestic_trans[0]['agent_name'];

                    $occupation = $cocogen_domestic_trans[0]['occupation'];
                    $package = strtoupper($cocogen_domestic_trans[0]['package']);
                    //$mode_transpo = strtoupper($cocogen_domestic_trans[0]['mode_transpo']);
                    $datetime1 = strtotime($cocogen_domestic_trans[0]['from_date']);
                    $datetime2 = strtotime($cocogen_domestic_trans[0]['to_date']);

                    $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                    $days = ($secs / 86400) + 1;

                    $birthDate = explode("-", $cocogen_domestic_trans[0]['bday']);
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));

                    $glcode = "";
                    $mode_transpo ="";
                    if($cocogen_domestic_trans[0]['mode_transpo'] === "Air Plan"){
                            $mode_transpo = "VIA AIR";
                            if($cocogen_domestic_trans[0]['package'] === "Packet"){
                                $glcode = "APACK";
                            }elseif ($cocogen_domestic_trans[0]['package'] === "Pro") {
                                $glcode = "APRO";
                            }elseif ($cocogen_domestic_trans[0]['package'] === "Prime") {
                                $glcode = "APRIM";
                            }else{
                                $glcode = "APLAT";
                            }
                    }else{
                            $mode_transpo = "VIA NON-AIR";
                            if($cocogen_domestic_trans[0]['package'] === "Packet"){
                                $glcode = "NAPAC";
                            }elseif ($cocogen_domestic_trans[0]['package'] === "Pro") {
                                $glcode = "NAPRO";
                            }elseif ($cocogen_domestic_trans[0]['package'] === "Prime") {
                                $glcode = "NAPRI";
                            }else{
                                $glcode = "NAPLA";
                            }
                    }
                    $covidglcode = "";
                    $covidcode = "";
                    $covid_tag = "none";
                    $covid_amount = 0;
                    $net_prem = number_format($cocogen_domestic_trans[0]['net_prem'], 2, '.', ',');
                    $netwithcovid = 0;

                    if($cocogen_domestic_trans[0]['covid'] === "Yes"){
                        $covid_tag = "";
                        if($cocogen_domestic_trans[0]['package'] === "Packet"){
                            $covidglcode = "PA54";
                        }elseif ($cocogen_domestic_trans[0]['package'] === "Pro") {
                            $covidglcode = "PA55";
                        }elseif ($cocogen_domestic_trans[0]['package'] === "Prime") {
                            $covidglcode = "PA56";
                        }else{
                            $covidglcode = "PA57";
                        }
                        $covid_amount = number_format($cocogen_domestic_trans[0]['covid_amount'], 2, '.', ',');
                        $covidcode = "Covid-19 Coverage Endorsement (Clause code): Code ". $covidglcode;
                        $netwithcovid = 0;
                        $netwithcovid = number_format(($cocogen_domestic_trans[0]['net_prem']), 2, '.', ',');
                        $net_prem = 0;
                        $net_prem = number_format(($cocogen_domestic_trans[0]['net_prem'] - $cocogen_domestic_trans[0]['covid_amount']), 2, '.', ',');

                    }else{
                        $netwithcovid = 0;
                        $netwithcovid = number_format(($cocogen_domestic_trans[0]['net_prem'] + $cocogen_domestic_trans[0]['covid_amount']), 2, '.', ',');
                    }


                    $prem_one = "";
                    $prem_two = "";
                    if($cocogen_domestic_trans[0]['package'] === "Packet"){
                        $prem_one = "250,000.00";
                        $prem_two = "25,000.00";
                    }elseif ($cocogen_domestic_trans[0]['package'] === "Pro") {
                        $prem_one = "500,000.00";
                        $prem_two = "50,000.00";
                    }elseif ($cocogen_domestic_trans[0]['package'] === "Prime") {
                        $prem_one = "750,000.00";
                        $prem_two = "75,000.00";
                    }else{
                        $prem_one = "1,000,000.00";
                        $prem_two = "100,000.00";
                    }

                    $this->emailsendDomesticExternal($full_name,$cocogen_domestic_trans[0]['email_add'],$external,$location,$location2);
                    $this->emailsendDomesticinternal($full_name,$dtnow,$destination, $from_date, $to_date, $days,$age,$occupation,$package,$glcode,$mode_transpo,$covidcode,$covid_tag,$net_prem, $covid_amount, $netwithcovid, $prem_one,$prem_two,$location,$agentname, $bday);

                }
                return redirect('/get-quote/domestic-travel-plus/success');
            }elseif($request->get('status') === "P"){
                if(count($cocogen_domestic_trans) > 0){
                    $cocogen_domestic_trans_update_stat = cocogen_domestic_trans::findorFail($cocogen_domestic_trans[0]['id']);
                    $cocogen_domestic_trans_update_stat->status = "PENDING";
                    $cocogen_domestic_trans_update_stat->save();
                }
                return redirect('/get-quote/domestic-travel-plus/pending');
            }else{
                return redirect('/get-quote/domestic-travel-plus/failed');
            }
        }

        $protech   = "ProTech";
        $flagprotech = strstr($request->get('txnid'), $protech);
        if ($flagprotech) {
            $cocogen_protech_trans = cocogen_protech_trans::where('protect_trans_no', '=', $request->get('txnid'))->get();
            $cocogen_protech_device_part = cocogen_protech_device_part::where('protech_trans_no', '=', $request->get('txnid'))->get();
            $cocogen_protect_deductible = cocogen_protect_deductible::where('protech_trans_no', '=', $request->get('txnid'))->get();
            if($request->get('status') === "S"){
                if(count($cocogen_protech_trans) > 0){
                    $cocogen_protech_trans_update_stat = cocogen_protech_trans::findorFail($cocogen_protech_trans[0]['id']);
                    $cocogen_protech_trans_update_stat->protect_status = "PAID";
                    $cocogen_protech_trans_update_stat->save();

                    $full_name = $cocogen_protech_trans[0]['protech_firstname']  ." ".
                                    $cocogen_protech_trans[0]['protech_middlename'] ." ".
                                    $cocogen_protech_trans[0]['protech_lastname'];

                    $locationRisk = $cocogen_protech_trans[0]['protech_device_location']  ." ".
                                ucwords($cocogen_protech_trans[0]['protech_device_brgy']) ." ".
                                ucwords($cocogen_protech_trans[0]['protech_device_city'])." ".
                                ucwords($cocogen_protech_trans[0]['protech_device_province']);
                    $term0fInsurance = date('m/d/Y', strtotime($cocogen_protech_trans[0]['protect_incept'])) ." - ".
                                date('m/d/Y', strtotime($cocogen_protech_trans[0]['protect_expiry']));
                    $netprem = number_format($cocogen_protech_trans[0]['protech_netpremium'], 2);
                    $dst = number_format($cocogen_protech_trans[0]['protech_dst'], 2);
                    $lgt = number_format($cocogen_protech_trans[0]['protech_lgt'], 2);
                    $vat = number_format($cocogen_protech_trans[0]['protech_vat'], 2);
                    $si = number_format($cocogen_protech_trans[0]['protect_si'], 2);
                    $totalprem = number_format($cocogen_protech_trans[0]['protech_total_premium'], 2);
                    $promotemplalte = "";
                    if(!empty($cocogen_protech_trans[0]['protech_promo_amount'])){
                        if($cocogen_protech_trans[0]['protech_promo_amount'] > 0){
                            $promo = number_format($cocogen_protech_trans[0]['protech_promo_amount'], 2);
                            $promotemplalte = '<tr>
                                    <td align="left" colspan="4"  class="padding-copy" style="  border-left: 0px;
                                            border-bottom: 1px solid #ffffff;
                                            padding: 10px 10px 10px;
                                            background-color: #bfdfde;
                                            color: #000000;
                                            border-radius: 0px;
                                            font-weight: italic;
                                            font-family: Helvetica, Arial, sans-serif;
                                            line-height: 20px">Promo
                                    </td>

                                    <td align="right" class="padding-copy" style="  border-left: 0px;
                                            border-bottom: 1px solid #ffffff;
                                            padding: 10px 10px 10px;
                                            background-color: #bfdfde;
                                            color: #000000;
                                            border-radius: 0px;
                                            font-weight: italic;
                                            font-family: Helvetica, Arial, sans-serif;
                                            line-height: 20px">- '.$promo.'
                                    </td>
                                </tr>';
                        }
                    }
                    $promo = number_format($cocogen_protech_trans[0]['protech_promo_amount'], 2);
                    $deduc = 0;
                    $rbt_deduc = 0;
                    $ad_deduc = 0;
                    //dd($cocogen_protect_deductible);
                    if($cocogen_protect_deductible){
                        foreach ($cocogen_protect_deductible as $cocogen_protect_deductible ) {
                                if($cocogen_protect_deductible->protech_deductible_name ==="Deductible"){
                                        $deduc = number_format($cocogen_protect_deductible->protech_deductible_amount, 2);
                                }

                                if($cocogen_protect_deductible->protech_deductible_name ==="Robbery/Burglary/Theft"){
                                        $rbt_deduc = number_format($cocogen_protect_deductible->protech_deductible_amount, 2);
                                }

                                if($cocogen_protect_deductible->protech_deductible_name ==="Accidental Dropping"){
                                        $ad_deduc = number_format($cocogen_protect_deductible->protech_deductible_amount, 2);
                                }
                        }
                    }

                    $partdevice ="";
                    if($cocogen_protech_device_part){
                        foreach ($cocogen_protech_device_part as $key ) {

                            if($key->protech_value >  0){
                                $partdevice = $partdevice . '<tr>
                                    <td align="left" class="padding-copy" style="padding: 10px 10px 10px;font-size: 16px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);min-width: 150px;padding-bottom: 10px;border:1px solid #ffffff">'.$key->protech_device_part.'
                                    </td>
                                    <td align="left" class="padding-copy" style="padding: 10px 10px 10px;font-size: 16px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68); min-width: 200px;padding-bottom: 10px;border:1px solid #ffffff" > '.$key->protect_make.' '.$key->protect_model.'
                                    </td>
                                    <td align="left" class="padding-copy" style="padding: 10px 10px 10px;font-size: 16px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);min-width: 150px;padding-bottom: 10px;border:1px solid #ffffff">'.$key->area.'
                                    </td>
                                    <td align="right" class="padding-copy" style="padding: 10px 10px 10px;font-size: 16px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: rgb(68, 68, 68);min-width: 150px;padding-bottom: 10px;border:1px solid #ffffff">'.number_format($key->protech_value, 2).'
                                    </td>
                                </tr>';
                            }
                        }

                    }

                    if($cocogen_protech_trans[0]['protech_type_of_device'] === "Desktop"){
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 9)->get();
                    }else{
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 8)->get();
                    }


                    $external = str_replace( "templatefname", $full_name, $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace( "templateSI", $si , $external);
                    $external = str_replace( "templateLocation", $locationRisk , $external);
                    $external = str_replace( "templateTermofInsurance", $term0fInsurance , $external);
                    $external = str_replace( "templateNet", $netprem , $external);
                    $external = str_replace( "templatedst", $dst , $external);
                    $external = str_replace( "templatelgt", $lgt , $external);
                    $external = str_replace( "templatevat", $vat , $external);
                    $external = str_replace( "templatetotal", $totalprem , $external);
                    $external = str_replace( "templatepart", $partdevice , $external);
                    $external = str_replace( "templatpromo", $promotemplalte , $external);
                    $external = str_replace( "templateDeductible", $deduc , $external);
                    $external = str_replace( "templaterbtdeduc", $rbt_deduc , $external);
                    $external = str_replace( "templateaddeduc", $ad_deduc , $external);
                    $this->emailsendProTechExternal($full_name,$cocogen_protech_trans[0]['protech_email'],$external);
                }
                return redirect('/get-quote/pro-tech-insurance/success');
            }elseif($request->get('status') === "P"){
                if(count($cocogen_protech_trans) > 0){
                    $cocogen_protech_trans_update_stat = cocogen_protech_trans::findorFail($cocogen_protech_trans[0]['id']);
                    $cocogen_protech_trans_update_stat->protect_status = "PENDING";
                    $cocogen_protech_trans_update_stat->save();
                }
                return redirect('/get-quote/pro-tech-insurance/pending');
            }else{
                return redirect('/get-quote/pro-tech-insurance/failed');
            }
        }
        $itp   = "PA-ITP-EC";
        $flagitp = strstr($request->get('txnid'), $itp);
        if ($flagitp) {
            $cocogen_international_trans = cocogen_international_trans::where('trans_id', '=', $request->get('txnid'))->get();
            // $temp ='S';
            if($request->get('status')=== "S"){
            // if($temp=== "S"){// FOR TESTIINGG

                if(count($cocogen_international_trans) > 0){
                    $cocogen_international_trans_update_stat = cocogen_international_trans::findorFail($cocogen_international_trans[0]['id']);
                    $cocogen_international_trans_update_stat->status = "PAID";
                    $cocogen_international_trans_update_stat->save();


                    $full_name = $cocogen_international_trans[0]['fname']  ." ".
                                    $cocogen_international_trans[0]['mname'] ." ".
                                    $cocogen_international_trans[0]['lname'];
                    $net_prem = number_format($cocogen_international_trans[0]['net_prem'], 2);
                    $travel_assistance = number_format($cocogen_international_trans[0]['travel_assistance'], 2);
                    $burial_assistance = number_format($cocogen_international_trans[0]['burial_benefits'], 2);
                    $personal_liability_assistance = number_format($cocogen_international_trans[0]['personal_liability'], 2);
                     $add = number_format($cocogen_international_trans[0]['accidental_death_disablement'], 2);
                    $doc_stamp = number_format($cocogen_international_trans[0]['doc_stamp'], 2);
                    $prem_tax = number_format($cocogen_international_trans[0]['prem_tax'], 2);
                    $lgt_tax = number_format($cocogen_international_trans[0]['lgt_tax'], 2);
                    $amount_due = number_format($cocogen_international_trans[0]['amount_due'], 2);
                    $final_due = number_format($cocogen_international_trans[0]['final_due'], 2);

                    $promo = $cocogen_international_trans[0]['promo'];
                    $promo_less = $cocogen_international_trans[0]['promo_less'];

                    if($promo){
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 26)->get();
                    }else{
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 27)->get();
                    }
                    //dd($cocogen_international_trans);
                    $this->downloadPDFInternational($cocogen_international_trans[0]['trans_id']);

                    $this->downloadPDFInternationalShengen($cocogen_international_trans[0]['trans_id']);
                //    dd('xxxx');
                   // $this->downloadInternationalCruise($cocogen_international_trans[0]['trans_id']);

                    // dd('test');
                    // dd('ONGOING TESTING');
                    $cocogen_international_file = cocogen_international_file::where('tnxid', '=', $cocogen_international_trans[0]['trans_id'])->orderBy('id', 'DESC')->get();
                    $cocogen_international_file_shengen = cocogen_international_file_shengen::where('tnxid', '=', $cocogen_international_trans[0]['trans_id'])->get();
                    $cocogen_international_file_cruise = cocogen_international_file_cruise::where('tnxid', '=', $cocogen_international_trans[0]['trans_id'])->get();
                    $cocogen_international_trans_destination = cocogen_international_trans_destination::where('trans_id', '=', $cocogen_international_trans[0]['trans_id'])->get();
                    if(count($cocogen_international_trans_destination) > 0){
                        $destination = "";
                        foreach ($cocogen_international_trans_destination as $cocogen_international_trans_destination) {
                            if($destination){
                                $destination = $destination.",".$cocogen_international_trans_destination->destination;
                            }else{
                                $destination = $cocogen_international_trans_destination->destination;
                            }
                        }
                    }
                    $destinations = explode(',', $destination);

                    $cocogen_itp_countries = cocogen_itp_countries::whereIn('country',$destinations)->get();
                    $shengen = "";
                    $worldwide = "";

                    foreach($cocogen_itp_countries as $cocogen_itp_country){
                        if($cocogen_itp_country->shengen === "Y"){
                            $shengen = "Y";
                        }

                        if($cocogen_itp_country->continent != "Asia"){
                            $worldwide = "Y";
                        }

                    }


                    $location = storage_path('app') . "/" . $cocogen_international_file[0]["fileLocation"];
                    $location2 = storage_path('app') . "/" . "public/pdf/internationaljacket/Travel Excel Plus International - Basic Coverage.pdf";
                    $location4 ='';
                    if($shengen ==="Y"){
                        $destination_classification ='shengen';
                        $location4 = storage_path('app') . "/" .$cocogen_international_file_shengen[0]['fileLocation'];
                    }elseif($worldwide == "Y"){
                        $destination_classification ='world';

                    }else{
                        $destination_classification ='asia';
                    }


                    $filename = $cocogen_international_file[0]["filename"];

                    $dtnow = date("Y-m-d H:i:s", strtotime("+8 hours"));
                    $external = str_replace( "templatefname", $full_name, $cocogen_admin_emailtemplate[0]['content']);
                    $from_date = date('F d, Y', strtotime($cocogen_international_trans[0]['from_date']));
                    $to_date = date('F d, Y', strtotime($cocogen_international_trans[0]['to_date']));


                    $created_at = date('F d, Y', strtotime($cocogen_international_trans[0]['created_at']));
                    $bday = date('F d, Y', strtotime($cocogen_international_trans[0]['bday']));
                    $covid_check = $cocogen_international_trans[0]["covid"];
                    $agentname = $cocogen_international_trans[0]['agent_name'];
                    $occupation = $cocogen_international_trans[0]['occupation'];
                    $package = strtoupper($cocogen_international_trans[0]['package']);
                    //$mode_transpo = strtoupper($cocogen_domestic_trans[0]['mode_transpo']);
                    $datetime1 = strtotime($cocogen_international_trans[0]['from_date']);
                    $datetime2 = strtotime($cocogen_international_trans[0]['to_date']);


                    $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                    $days = ($secs / 86400) + 1;

                    $birthDate = explode("-", $cocogen_international_trans[0]['bday']);
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));

                    $glcode = "";

                    $include_cruise = $cocogen_international_trans[0]['include_cruise'];

                    if($cocogen_international_trans[0]['include_cruise'] === "No"){
                            if($cocogen_international_trans[0]['package'] === "Economy"){
                                $glcode = "ECONO";
                            }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                                $glcode = "ESTEE";
                            }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                                $glcode = "EXEC";

                            }else{
                                $glcode = "ELITE";

                            }
                    }else{
                            if($cocogen_international_trans[0]['package'] === "Economy"){
                                $glcode = "CR-EC";
                            }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                                $glcode = "CR-ES";
                            }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                                $glcode = "CR-EX";

                            }else{
                                $glcode = "CR-EL";
                            }
                    }
                    $location3="";
                    if($include_cruise == "Yes"){


                        $location3 = $location;//storage_path('app')."/".$cocogen_international_file_cruise[0]['fileLocation'];

                    }



                    $covidglcode = "";
                    $covidcode = "";
                    $covid_tag = "none";
                    $covid_amount = 0;
                    $net_prem = number_format($cocogen_international_trans[0]['net_prem'], 2, '.', ',');
                    $netwithcovid = 0;

                    if($cocogen_international_trans[0]['covid'] === "Yes"){
                        $covid_tag = "";
                        if($cocogen_international_trans[0]['package'] === "Economy"){
                            $covidglcode = "PA63";
                        }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                            $covidglcode = "PA64";
                        }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                            $covidglcode = "PA65";
                        }else{
                            $covidglcode = "PA65";
                        }
                        $covid_amount = number_format($cocogen_international_trans[0]['covid_amount'], 2, '.', ',');
                        $covidcode = "COVID-19 Coverage Endorsement (Clause code): Code ". $covidglcode;
                        $netwithcovid = 0;
                        $netwithcovid = number_format(($cocogen_international_trans[0]['net_prem']), 2, '.', ',');
                        $net_prem = 0;
                        $net_prem = number_format(($cocogen_international_trans[0]['net_prem'] - $cocogen_international_trans[0]['covid_amount']), 2, '.', ',');

                    }else{
                        $netwithcovid = 0;
                        $netwithcovid = number_format(($cocogen_international_trans[0]['net_prem'] + $cocogen_international_trans[0]['covid_amount']), 2, '.', ',');
                    }


                    $prem_one = "";
                    $prem_two = "";
                    if($cocogen_international_trans[0]['package'] === "Economy"){
                        $prem_one = "10000.00";
                        $prem_two = "250.00";
                    }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                        $prem_one = "25000.00";
                        $prem_two = "500.00";
                    }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                        $prem_one = "50000.00";
                        $prem_two = "1000.00";
                    }else{
                        $prem_one = "100000.00";
                        $prem_two = "2000.00";
                    }
                    $to_date_covid = date('F d, Y', strtotime($cocogen_international_trans[0]['covid_return']));
                    $travel_assistance = number_format($cocogen_international_trans[0]['travel_assistance'], 2, '.', ',');
                    $burial_assistance = number_format($cocogen_international_trans[0]['burial_benefits'], 2);
                    $personal_liability_assistance = number_format($cocogen_international_trans[0]['personal_liability'], 2);
                    $accident_death_disable = number_format($cocogen_international_trans[0]['accidental_death_disablement'], 2);
                    $this->emailsendInternationalExternal($full_name,$cocogen_international_trans[0]['email_add'],$external,$location,$location2,$destination_classification,$include_cruise,$package,$covid_check,$agentname,$location3,$location4,$travel_assistance,$burial_assistance,$personal_liability_assistance,$accident_death_disable);
                    $this->emailsendInternationalinternal($full_name,$dtnow,$destination, $from_date, $to_date, $days,$age,$occupation,$package,$glcode,$include_cruise,$covidcode,$covid_tag,$net_prem, $covid_amount, $netwithcovid, $prem_one,$prem_two,$location,$location2, $bday,$covid_check,$agentname,$location3,$location4,$to_date_covid,$travel_assistance,$burial_assistance,$personal_liability_assistance,$accident_death_disable);

                }
                return redirect('/get-quote/international-travel-excel-plus/success');
            }elseif($request->get('status') === "P"){

                if(count($cocogen_international_trans) > 0){
                    $cocogen_international_trans_update_stat = cocogen_international_trans::findorFail($cocogen_international_trans[0]['id']);
                    $cocogen_international_trans_update_stat->status = "PENDING";
                    $cocogen_international_trans_update_stat->save();
                }

                return redirect('/get-quote/international-travel-excel-plus/pending');
            }else{

                return redirect('/get-quote/international-travel-excel-plus/failed');
            }
        }
    }
    public function dragonpaypostback(Request $request)
    {
        $data =  $request->all();
        $dtnow = date('Y-m-d H:i:s');

        $link = '/get-quote';

        $onpaymnt   = "ONPAYMNT";
        $flagonpaymnt = strstr($request->get('txnid'), $onpaymnt);
        if ($flagonpaymnt) {
            if ($request->get('status') === "S") {
                return redirect('/get-quote/online-payments/success/');
            } elseif ($request->get('status') === "P") {
                return redirect('/get-quote/online-payments/pending');
            } else {
                return redirect('/get-quote/online-payments/failed/');
            }
        }

        $domestic   = "Domestic";
        $flagdomestic = strstr($request->get('txnid'), $domestic);
        if ($flagdomestic) {
            if($request->get('status') === "S"){
                return redirect($link);
            }elseif($request->get('status') === "P"){
                return redirect($link);
            }else{
                return redirect($link);
            }
        }
        $covid   = "COVID";
        $flagcovid = strstr($request->get('txnid'), $covid);

        if ($flagcovid) {
            if ($request->get('status') === "S") {
                $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));
                if ($sc === $request->get('digest')) {
                    //return redirect('/get-quote/covid-19-assist-plus/success/');
                    return redirect($link)->with('con_no', $request->get('txnid'));
                } else {
                    return redirect($link);
                }
            } elseif ($request->get('status') === "P") {
                return redirect($link);
            } else {

                $cocogen_covid_tranids = cocogen_covid_trans::where('group_tnxid', '=', $request->get('txnid'))->get();
                if (count($cocogen_covid_tranids) > 0) {
                    foreach ($cocogen_covid_tranids as $val) {
                        $cocogen_covid_trans = cocogen_covid_trans::findorFail($val->id);
                        $cocogen_covid_trans->paymentType = $request->get('status');
                        $cocogen_covid_trans->save();
                    }
                }

                return redirect($link);
            }
        }



        // $compre   = "COMPRE";
        // $flagCompre = strstr($request->get('txnid'), $compre);

        // if ($flagCompre) {

        //     if ($request->get('status') === "S") {
        //         $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));
        //         if ($sc === $request->get('digest')) {

        //             //return redirect('/get-quote/motor-insurance/compre/success/');
        //             return redirect($link)->with('con_no', $request->get('txnid'));
        //         } else {
        //             return redirect($link);
        //         }
        //     } elseif ($request->get('status') === "P") {
        //         return redirect($link);
        //     } else {
        //         return redirect($link);
        //     }
        // }

        $compre   = "COMPRE";
        $flagCompre = strstr($request->get('txnid'), $compre);
        if ($flagCompre) {
            if ($request->get('status') === "S") {

                $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));

                //  dd($request,$sc , $request->get('digest'));
                if ($sc === $request->get('digest')) {
                    $cocogen_covid_tranids = cocogen_covid_trans::where('group_tnxid', '=', $request->get('txnid'))->get();

                    $this->downloadPDFCOMPRE($request->get('txnid'));
                    $cocogen_compre_carinfo_changeprimary = cocogen_compre_carinfo_changeprimary::findorFail($request->get('txnid'));
                    $cocogen_compre_carinfo_changeprimary->status = "PAID";
                    $cocogen_compre_carinfo_changeprimary->save();
                    $cocogen_compre_personalinfo = cocogen_compre_personalinfo::where('tnxid', '=', $request->get('txnid'))->get();
                    $cocogen_compre_carinfo = cocogen_compre_carinfo::where('tnxid', '=', $request->get('txnid'))->get();
                    $cocogen_compre_file = cocogen_compre_file::where('tnxid', '=', $request->get('txnid'))->get();
                    $emailAddress = $cocogen_compre_personalinfo[0]['emailAddress'];
                    $contactNo = $cocogen_compre_personalinfo[0]['contactNo'];
                    $fullname = $cocogen_compre_personalinfo[0]['firstName'] . " " . $cocogen_compre_personalinfo[0]['lastName'];
                    $statuss = $cocogen_compre_carinfo[0]['status'];
                    $coclink = URL::to('/get-quote/view_coc') . '/' . sha1($emailAddress) . '/' . base64_encode($request->get('txnid'));

                    if (count($cocogen_compre_carinfo[0]['promoCode']) > 0) {
                        $cocogen_promo = cocogen_promo::where('promo', '=', $cocogen_compre_carinfo[0]['promoCode'])->get();

                        if (count($cocogen_promo) > 0) {
                            $limit = $cocogen_promo[0]['limit_usage'] - 1;
                            $cocogen_promo = cocogen_promo::findorFail($cocogen_compre_carinfo[0]['promoCode']);
                            $cocogen_promo->limit_usage = $limit;
                            $cocogen_promo->save();
                        }
                    }
                    $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 6)->get();
                    $external = str_replace("teamplatefname", $fullname, $cocogen_admin_emailtemplate[0]['content']);
                    $external = str_replace("templatelink", $coclink, $external);
                    $this->emailsendcompre($fullname, $emailAddress, $external);
                    $this->emailsendcompreinternal($fullname, $emailAddress, $contactNo, $dtnow, $coclink);
                    return redirect('/get-quote/motor-insurance/compre/success/')->with('tnxid', $request->get('txnid'));
                } else {
                    return redirect('/get-quote/motor-insurance/compre/failed/');
                }
            } elseif ($request->get('status') === "P") {
                return redirect('/get-quote/motor-insurance/compre/pending');
            } else {
                return redirect('/get-quote/motor-insurance/compre/failed/');
            }
        }


                    $protech   = "ProTech";
                    $flagprotech = strstr($request->get('txnid'), $protech);
                    if ($flagprotech){
                        if($request->get('status') === "S"){
                            return redirect($link);
                        }elseif($request->get('status') === "P"){
                            return redirect($link);
                        }else{
                            return redirect($link);
                        }
                    }

        $compreCTPL   = "CTPL";
        $flagCTPL = strstr($request->get('txnid'), $compreCTPL);
        if ($flagCTPL) {
            if ($request->get('status') === "S") {
                $sc = sha1($request->get('txnid') . ':' . $request->get('refno') . ':' . $request->get('status') . ':' . $request->get('message') . ':' . env('MERCHANT_PASSWORD'));
                if ($sc === $request->get('digest')) {

                    $cocogen_ctpl_vehicleinfos = cocogen_ctpl_vehicleinfo::where('tnxid', '=', $request->get('txnid'))->get();
                    $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $request->get('txnid'))->get();
                    $cocogen_quote_requests = cocogen_quote_request::where('tnxid', '=', $request->get('txnid'))->get();
                    $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::where('id', '=', "1")->get();
                    $lastc0c = $cocogen_ctpl_coc_series[0]['coc_no'];
                    $lastc0c = $lastc0c + 1;
                    $lastc0c = "0" . $lastc0c;
                    $tnxid = $request->get('txnid');
                    $statuss = $cocogen_quote_requests[0]['status'];

                    $coclink = URL::to('/get-quote/view_coc_ctpl') . '/' . sha1($lastc0c) . '/' . base64_encode($request->get('txnid'));

                    $oldStatus = 0;
                    if ($statuss = !"Paid") {
                        $oldStatus = 0;
                    } else {
                        $oldStatus = 1;
                    }

                    $cocogen_quote_tnxid = cocogen_quote_request_changeprimary::findorFail($request->get('txnid'));
                    $cocogen_quote_tnxid->status = "Paid";
                    $cocogen_quote_tnxid->save();
                    $plateNo = $cocogen_ctpl_vehicleinfos[0]['plateNo'];
                    $plate = $cocogen_ctpl_vehicleinfos[0]['plateNo'];
                    $emailAddress = $cocogen_ctpl_clientinfo[0]['emailAddress'];
                    $contactNo = $cocogen_ctpl_clientinfo[0]['contactNo'];
                    $fullname = $cocogen_ctpl_clientinfo[0]['firstName'] . " " . $cocogen_ctpl_clientinfo[0]['lastName'];
                    

                    if ($cocogen_quote_requests[0]['brand_new'] == "Y") {
                        $brand_new = "Y";
                        $start = date('m/d/Y', strtotime($cocogen_quote_requests[0]['purchaseDate']));
                        $end = date("m/d/Y", strtotime(date("m/d/Y", strtotime($start)) . " + 3 year"));
                        $params = array(
                            "arg0" => array(
                                "username" => env('COC_API_USERNAME'),
                                "password" => env('COC_API_PASSWORD'),
                                "regType" => "N",
                                "cocNo" => $cocogen_ctpl_coc_series[0]['coc_no'],
                                "plateNo" => $cocogen_ctpl_vehicleinfos[0]['plateNo'],
                                "mvFileNo" => $cocogen_ctpl_vehicleinfos[0]['mvFIleNo'],
                                "engineNo" => $cocogen_ctpl_vehicleinfos[0]['engineNO'],
                                "chassisNo" => $cocogen_ctpl_vehicleinfos[0]['chassisNo'],
                                "inceptionDate" => $start,
                                "expiryDate" => $end,
                                "mvType" => $cocogen_quote_requests[0]['mvCode'],
                                "mvPremType" => $cocogen_quote_requests[0]['premCode'],
                                "taxType" => "1",
                                "assuredName" => $request->get('param1'),
                                "assuredTin" => "999-999-999-999"
                            )
                        );
                    } else {
                        $brand_new = "";
                        if(strlen($plateNo) > 0){
                            $dateINEX = substr($plate, -1);
                            $cocogen_api_ctpl_mvtype_format = cocogen_api_ctpl_mvtype_format::where('mvtype', '=', $cocogen_quote_requests[0]['mvCode'])->get();
                            if(count($cocogen_api_ctpl_mvtype_format) > 0){
                                $first = substr($plateNo, 0, 1);
                                $second = substr($plateNo, 1, 1);
                                $third = substr($plateNo, 2, 1);
                                $fourth = substr($plateNo, 3, 1);
                                $fifith = substr($plateNo, 4, 1);
                                $six = substr($plateNo, 5, 1);
            
                                $barfirst = "";
                                $barsecond = "";
                                $barthird = "";
                                $barfourth = "";
                                $barfifth = "";
                                $barsix = "";
            
                                if(is_numeric($first)){
                                        $barfirst = "N";
                                }else{
                                        $barfirst = "X";
                                }
            
                                if(is_numeric($second)){
                                        $barsecond = "N";
                                }else{
                                        $barsecond = "X";
                                }
            
                                if(is_numeric($third)){
                                        $barthird = "N";
                                }else{
                                        $barthird = "X";
                                }
            
                                if(is_numeric($fourth)){
                                        $barfourth = "N";
                                }else{
                                        $barfourth = "X";
                                }
            
                                if(is_numeric($fifith)){
                                        $barfifth = "N";
                                }else{
                                        $barfifth = "X";
                                }
            
                                if(is_numeric($six)){
                                        $barsix = "N";
                                }else{
                                        $barsix = "X";
                                }
            
                                $finalformat = $barfirst . $barsecond . $barthird . $barfourth . $barfifth . $barsix;
                                $cocogen_api_ctpl_plate_format = cocogen_api_ctpl_plate_format::where('format', '=',$finalformat)->get();  
                                $numberformat = 0;
                                // $dateINEX = "";
                                if(count($cocogen_api_ctpl_plate_format) > 0){
                                    $numberformat = $cocogen_api_ctpl_plate_format[0]['index_no'];
                                    if ((int)$numberformat === 1) {
                                        $dateINEX = substr($plateNo, 0, 1);
                                    }elseif ((int)$numberformat === 2) {
                                        $dateINEX = substr($plateNo, 1, 1); 
                                    }elseif ((int)$numberformat === 3) {
                                        $dateINEX = substr($plateNo, 2, 1); 
                                    }elseif ((int)$numberformat === 4) {
                                        $dateINEX = substr($plateNo, 3, 1); 
                                    }elseif ((int)$numberformat === 5) {
                                        $dateINEX = substr($plateNo, 4, 1); 
                                    }else{
                                        $dateINEX = substr($plateNo, 5, 1); 
                                    }
                                }
            
                            }
            
                        }
            
                        if ($dateINEX == 1) {
                            $dtCreated = "02/01/" . date('Y');
                            $futureDate = "02/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 2) {
                            $dtCreated = "03/01/" . date('Y');
                            $futureDate = "03/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 3) {
                            $dtCreated = "04/01/" . date('Y');
                            $futureDate = "04/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 4) {
                            $dtCreated = "05/01/" . date('Y');
                            $futureDate = "05/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 5) {
                            $dtCreated = "06/01/" . date('Y');
                            $futureDate = "06/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 6) {
                            $dtCreated = "07/01/" . date('Y');
                            $futureDate = "07/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 7) {
                            $dtCreated = "08/01/" . date('Y');
                            $futureDate = "08/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 8) {
                            $dtCreated = "09/01/" . date('Y');
                            $futureDate = "09/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 9) {
                            $dtCreated = "10/01/" . date('Y');
                            $futureDate = "10/01/" . date('Y', strtotime('+1 years'));
                        } elseif ($dateINEX == 0) {
                            $dtCreated = "01/01/" . date('Y');
                            $futureDate = "01/01/" . date('Y', strtotime('+1 years'));
                        } else {
                            $dtCreated = "01/01/" . date('Y');
                            $futureDate = "01/01/" . date('Y', strtotime('+1 years'));
                        }
                        $params = array(
                            "arg0" => array(
                                "username" => env('COC_API_USERNAME'),
                                "password" => env('COC_API_PASSWORD'),
                                "regType" => "R",
                                "cocNo" => $cocogen_ctpl_coc_series[0]['coc_no'],
                                "plateNo" => $cocogen_ctpl_vehicleinfos[0]['plateNo'],
                                "mvFileNo" => $cocogen_ctpl_vehicleinfos[0]['mvFIleNo'],
                                "engineNo" => $cocogen_ctpl_vehicleinfos[0]['engineNO'],
                                "chassisNo" => $cocogen_ctpl_vehicleinfos[0]['chassisNo'],
                                "inceptionDate" => $dtCreated,
                                "expiryDate" => $futureDate,
                                "mvType" => $cocogen_quote_requests[0]['mvCode'],
                                "mvPremType" => $cocogen_quote_requests[0]['premCode'],
                                "taxType" => "1",
                                "assuredName" => $request->get('param1'),
                                "assuredTin" => "999-999-999-999"
                            )
                        );
                    }

                    $opts = array(
                        "ssl" => array(
                            // 'ciphers'=>'RC4-SHA',
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                            "allow_self_signed" => true
                        )
                    );
                    $context = stream_context_create($opts);
                    // *** END ***
                    $client = new SoapClient(env('COC_API_LINK'), array("trace" => true, "stream_context" => $context));

                    $response = $client->__soapCall("register", array($params));

                    info($response);
                    foreach ($response as $responses) {
                        if (!empty($responses->authNo)) {
                            $cocogen_quote_tnxid = cocogen_quote_request_changeprimary::findorFail($request->get('txnid'));
                            $cocogen_quote_tnxid->status = "Autheticated";
                            $cocogen_quote_tnxid->save();

                            $cocogen_ctpl_vehicleinfochangeprimary = cocogen_ctpl_vehicleinfochangeprimary::findorFail($request->get('txnid'));
                            $cocogen_ctpl_vehicleinfochangeprimary->authNo =  $responses->authNo;
                            $cocogen_ctpl_vehicleinfochangeprimary->cocNO =  $lastc0c;
                            $cocogen_ctpl_vehicleinfochangeprimary->save();



                            $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::findorFail("1");
                            $cocogen_ctpl_coc_series->coc_no = $lastc0c;
                            $cocogen_ctpl_coc_series->save();

                            $authNo = $responses->authNo;



                            $title = "Success | COCOGEN | General Insurance";
                            if ($oldStatus === 1) {

                                $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 7)->get();
                                $external = str_replace("templatefname", $fullname, $cocogen_admin_emailtemplate[0]['content']);
                                $external = str_replace("templatelink", $coclink, $external);


                                $this->downloadPDFCTPL($request->get('txnid'), $authNo);
                                $this->emailsendctpl($fullname, $emailAddress, $external);
                                $this->emailsendctplinternal($fullname, $emailAddress, $contactNo, $dtnow, $coclink);
                            }



                            session()->flash('authNo', $authNo);
                            //return redirect('/get-quote/ctpl-insurance/ctpl/success/');
                            return redirect($link)->with('con_no', $request->get('txnid'));
                        } else {

                            $errorMessage = $responses->errorMessage;
                            Session::put('message1', $errorMessage);
                            Session::put('txnid', $tnxid);
                            return redirect($link);
                        }
                    }
                } else {
                    return redirect($link);
                }
            } else {
                return redirect($link);
            }
        }

        // $itp   = "PA-ITP-EC";
        // $flagitp = strstr($request->get('txnid'), $itp);
        // if ($flagitp) {
        //     $cocogen_international_trans = cocogen_international_trans::where('trans_id', '=', $request->get('txnid'))->get();
        //     if($request->get('status')=== "S"){
        //         return redirect($link);
        //     }elseif($request->get('status') === "P"){
        //         return redirect($link);
        //     }else{
        //         return redirect($link);
        //     }
        // }

        $itp   = "PA-ITP-EC";
        $flagitp = strstr($request->get('txnid'), $itp);
        if ($flagitp) {
            $cocogen_international_trans = cocogen_international_trans::where('trans_id', '=', $request->get('txnid'))->get();
            // $temp ='S';
            if($request->get('status')=== "S"){
            // if($temp=== "S"){// FOR TESTIINGG

                if(count($cocogen_international_trans) > 0){
                    $cocogen_international_trans_update_stat = cocogen_international_trans::findorFail($cocogen_international_trans[0]['id']);
                    $cocogen_international_trans_update_stat->status = "PAID";
                    $cocogen_international_trans_update_stat->save();


                    $full_name = $cocogen_international_trans[0]['fname']  ." ".
                                    $cocogen_international_trans[0]['mname'] ." ".
                                    $cocogen_international_trans[0]['lname'];
                    $net_prem = number_format($cocogen_international_trans[0]['net_prem'], 2);
                    $travel_assistance = number_format($cocogen_international_trans[0]['travel_assistance'], 2);
                    $burial_assistance = number_format($cocogen_international_trans[0]['burial_benefits'], 2);
                    $personal_liability_assistance = number_format($cocogen_international_trans[0]['personal_liability'], 2);
                     $add = number_format($cocogen_international_trans[0]['accidental_death_disablement'], 2);
                    $doc_stamp = number_format($cocogen_international_trans[0]['doc_stamp'], 2);
                    $prem_tax = number_format($cocogen_international_trans[0]['prem_tax'], 2);
                    $lgt_tax = number_format($cocogen_international_trans[0]['lgt_tax'], 2);
                    $amount_due = number_format($cocogen_international_trans[0]['amount_due'], 2);
                    $final_due = number_format($cocogen_international_trans[0]['final_due'], 2);

                    $promo = $cocogen_international_trans[0]['promo'];
                    $promo_less = $cocogen_international_trans[0]['promo_less'];

                    if($promo){
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 26)->get();
                    }else{
                        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 27)->get();
                    }
                    //dd($cocogen_international_trans);
                    $this->downloadPDFInternational($cocogen_international_trans[0]['trans_id']);

                    $this->downloadPDFInternationalShengen($cocogen_international_trans[0]['trans_id']);
                //    dd('xxxx');
                    $this->downloadInternationalCruise($cocogen_international_trans[0]['trans_id']);

                    // dd('test');
                    // dd('ONGOING TESTING');
                    $cocogen_international_file = cocogen_international_file::where('tnxid', '=', $cocogen_international_trans[0]['trans_id'])->get();
                    $cocogen_international_file_shengen = cocogen_international_file_shengen::where('tnxid', '=', $cocogen_international_trans[0]['trans_id'])->get();
                    $cocogen_international_file_cruise = cocogen_international_file_cruise::where('tnxid', '=', $cocogen_international_trans[0]['trans_id'])->get();
                    $cocogen_international_trans_destination = cocogen_international_trans_destination::where('trans_id', '=', $cocogen_international_trans[0]['trans_id'])->get();
                    if(count($cocogen_international_trans_destination) > 0){
                        $destination = "";
                        foreach ($cocogen_international_trans_destination as $cocogen_international_trans_destination) {
                            if($destination){
                                $destination = $destination.",".$cocogen_international_trans_destination->destination;
                            }else{
                                $destination = $cocogen_international_trans_destination->destination;
                            }
                        }
                    }
                    $destinations = explode(',', $destination);

                    $cocogen_itp_countries = cocogen_itp_countries::whereIn('country',$destinations)->get();
                    $shengen = "";
                    $worldwide = "";

                    foreach($cocogen_itp_countries as $cocogen_itp_country){
                        if($cocogen_itp_country->shengen === "Y"){
                            $shengen = "Y";
                        }

                        if($cocogen_itp_country->continent != "Asia"){
                            $worldwide = "Y";
                        }

                    }


                    $location = storage_path('app') . "/" . $cocogen_international_file[0]["fileLocation"];
                    $location2 = storage_path('app') . "/" . "public/pdf/internationaljacket/Travel Excel Plus International - Basic Coverage.pdf";
                    $location4 ='';
                    if($shengen ==="Y"){
                        $destination_classification ='shengen';
                        $location4 = storage_path('app') . "/" .$cocogen_international_file_shengen[0]['fileLocation'];
                    }elseif($worldwide == "Y"){
                        $destination_classification ='world';

                    }else{
                        $destination_classification ='asia';
                    }


                    $filename = $cocogen_international_file[0]["filename"];

                    $dtnow = date("Y-m-d H:i:s", strtotime("+8 hours"));
                    $external = str_replace( "templatefname", $full_name, $cocogen_admin_emailtemplate[0]['content']);
                    $from_date = date('F d, Y', strtotime($cocogen_international_trans[0]['from_date']));
                    $to_date = date('F d, Y', strtotime($cocogen_international_trans[0]['to_date']));


                    $created_at = date('F d, Y', strtotime($cocogen_international_trans[0]['created_at']));
                    $bday = date('F d, Y', strtotime($cocogen_international_trans[0]['bday']));
                    $covid_check = $cocogen_international_trans[0]["covid"];
                    $agentname = $cocogen_international_trans[0]['agent_name'];
                    $occupation = $cocogen_international_trans[0]['occupation'];
                    $package = strtoupper($cocogen_international_trans[0]['package']);
                    //$mode_transpo = strtoupper($cocogen_domestic_trans[0]['mode_transpo']);
                    $datetime1 = strtotime($cocogen_international_trans[0]['from_date']);
                    $datetime2 = strtotime($cocogen_international_trans[0]['to_date']);


                    $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                    $days = ($secs / 86400) + 1;

                    $birthDate = explode("-", $cocogen_international_trans[0]['bday']);
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));

                    $glcode = "";

                    $include_cruise = $cocogen_international_trans[0]['include_cruise'];

                    if($cocogen_international_trans[0]['include_cruise'] === "No"){
                            if($cocogen_international_trans[0]['package'] === "Economy"){
                                $glcode = "ECONO";
                            }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                                $glcode = "ESTEE";
                            }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                                $glcode = "EXEC";

                            }else{
                                $glcode = "ELITE";

                            }
                    }else{
                            if($cocogen_international_trans[0]['package'] === "Economy"){
                                $glcode = "CR-EC";
                            }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                                $glcode = "CR-ES";
                            }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                                $glcode = "CR-EX";

                            }else{
                                $glcode = "CR-EL";
                            }
                    }
                    $location3="";
                    if($include_cruise == "Yes"){


                        $location3 = $storage_path('app')."/".$cocogen_international_file_cruise[0]['fileLocation'];

                    }



                    $covidglcode = "";
                    $covidcode = "";
                    $covid_tag = "none";
                    $covid_amount = 0;
                    $net_prem = number_format($cocogen_international_trans[0]['net_prem'], 2, '.', ',');
                    $netwithcovid = 0;

                    if($cocogen_international_trans[0]['covid'] === "Yes"){
                        $covid_tag = "";
                        if($cocogen_international_trans[0]['package'] === "Economy"){
                            $covidglcode = "PA63";
                        }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                            $covidglcode = "PA64";
                        }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                            $covidglcode = "PA65";
                        }else{
                            $covidglcode = "PA65";
                        }
                        $covid_amount = number_format($cocogen_international_trans[0]['covid_amount'], 2, '.', ',');
                        $covidcode = "COVID-19 Coverage Endorsement (Clause code): Code ". $covidglcode;
                        $netwithcovid = 0;
                        $netwithcovid = number_format(($cocogen_international_trans[0]['net_prem']), 2, '.', ',');
                        $net_prem = 0;
                        $net_prem = number_format(($cocogen_international_trans[0]['net_prem'] - $cocogen_international_trans[0]['covid_amount']), 2, '.', ',');

                    }else{
                        $netwithcovid = 0;
                        $netwithcovid = number_format(($cocogen_international_trans[0]['net_prem'] + $cocogen_international_trans[0]['covid_amount']), 2, '.', ',');
                    }


                    $prem_one = "";
                    $prem_two = "";
                    if($cocogen_international_trans[0]['package'] === "Economy"){
                        $prem_one = "10000.00";
                        $prem_two = "250.00";
                    }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                        $prem_one = "25000.00";
                        $prem_two = "500.00";
                    }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                        $prem_one = "50000.00";
                        $prem_two = "1000.00";
                    }else{
                        $prem_one = "100000.00";
                        $prem_two = "2000.00";
                    }
                    $to_date_covid = date('F d, Y', strtotime($cocogen_international_trans[0]['covid_return']));
                    $travel_assistance = number_format($cocogen_international_trans[0]['travel_assistance'], 2, '.', ',');
                    $burial_assistance = number_format($cocogen_international_trans[0]['burial_benefits'], 2);
                    $personal_liability_assistance = number_format($cocogen_international_trans[0]['personal_liability'], 2);
                    $accident_death_disable = number_format($cocogen_international_trans[0]['accidental_death_disablement'], 2);
                    $this->emailsendInternationalExternal($full_name,$cocogen_international_trans[0]['email_add'],$external,$location,$location2,$destination_classification,$include_cruise,$package,$covid_check,$agentname,$location3,$location4,$travel_assistance,$burial_assistance,$personal_liability_assistance,$accident_death_disable);
                    $this->emailsendInternationalinternal($full_name,$dtnow,$destination, $from_date, $to_date, $days,$age,$occupation,$package,$glcode,$include_cruise,$covidcode,$covid_tag,$net_prem, $covid_amount, $netwithcovid, $prem_one,$prem_two,$location,$location2, $bday,$covid_check,$agentname,$location3,$location4,$to_date_covid,$travel_assistance,$burial_assistance,$personal_liability_assistance,$accident_death_disable);

                }
                //return redirect('/get-quote/international-travel-excel-plus/success');
          	  return redirect('/get-quote/international-travel-excel-plus/success')->with('amount', number_format($cocogen_international_trans[0]['final_amount_piso'], 2, '.', ','));  
	}elseif($request->get('status') === "P"){

                if(count($cocogen_international_trans) > 0){
                    $cocogen_international_trans_update_stat = cocogen_international_trans::findorFail($cocogen_international_trans[0]['id']);
                    $cocogen_international_trans_update_stat->status = "PENDING";
                    $cocogen_international_trans_update_stat->save();
                }

                return redirect('/get-quote/international-travel-excel-plus/pending');
            }else{

                return redirect('/get-quote/international-travel-excel-plus/failed');
            }
        }
        
    }

    
public function emailsendInternationalExternal($fname, $email,$content,$location,$location2,$destination_classification,$include_cruise,$package,$covid_check,$agentname,$location3,$location4)
{
    $data = array('fname'=>$fname, 'email'=>$email,'content'=>$content,'location' => $location,'location2' => $location2,'location3' => $location3,'location4' => $location4,'destination_classification'=>$destination_classification,'include_cruise'=>$include_cruise,'agentname'=>$agentname);
    Mail::send('emailtemplate.internationalexternal', $data, function($message) use ($fname, $email,$content,$location,$location2,$destination_classification,$include_cruise,$package,$covid_check,$agentname,$location3,$location4)
    {
	$message->to("val_mangoba@cocogen.com")
        //$message->to($email)
        ->cc(['pa.micro_underwriting@cocogen.com','sheila_liwanag@cocogen.com'])
        ->subject($fname.', you are now covered by Cocogen International Travel Plus Insurance')->from('no_reply@cocogen.com', 'COCOGEN');
            if($destination_classification == 'shengen'){ // Shengen
                if($package == 'EXECUTIVE'){
                    if($include_cruise === 'Yes' && $covid_check === 'Yes'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'
                            ))->attach($location3, array(
                                'as'    => "Travel Excel Plus - International Cruise Endorsement.pdf",
                                'mime'  => 'application/pdf'
                            ))->attach($location4, array(
                                'as'    => "EXECUTIVE SCHENGEN COC WITH COVID-19.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }

                    if($include_cruise === 'Yes' && $covid_check === 'No'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'
                            ))->attach($location3, array(
                                'as'    => "Travel Excel Plus - International Cruise Endorsement.pdf",
                                'mime'  => 'application/pdf'
                                ))->attach($location4, array(
                                'as'    => "EXECUTIVE SCHENGEN REGULAR.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }


                    if($include_cruise === 'No' && $covid_check === 'Yes'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'

                                ))->attach($location4, array(
                                'as'    => "EXECUTIVE SCHENGEN COC WITH COVID-19.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }

                    if($include_cruise === 'No' && $covid_check === 'No'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'
                                ))->attach($location4, array(
                                'as'    => "EXECUTIVE SCHENGEN REGULAR.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }



                }else{ // ELITE
                    if($include_cruise === 'Yes' && $covid_check === 'Yes'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'
                            ))->attach($location3, array(
                                'as'    => "Travel Excel Plus - International Cruise Endorsement.pdf",
                                'mime'  => 'application/pdf'
                                ))->attach($location4, array(
                                'as'    => "ELITE SCHENGEN COC WITH COVID-19.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }

                    if($include_cruise === 'Yes' && $covid_check === 'No'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'
                            ))->attach($location3, array(
                                'as'    => "Travel Excel Plus - International Cruise Endorsement.pdf",
                                'mime'  => 'application/pdf'
                                ))->attach($location4, array(
                                'as'    => "ELITE SCHENGEN COC REGULAR.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }


                    if($include_cruise === 'No' && $covid_check === 'Yes'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'

                            ))->attach($location4, array(
                                'as'    => "ELITE SCHENGEN COC WITH COVID-19.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }

                    if($include_cruise === 'No' && $covid_check ==='No'){
                        $message->attach($location, array(
                            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                            'mime'  => 'application/pdf'
                            ))->attach($location2, array(
                                'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                                'mime'  => 'application/pdf'
                                ))->attach($location4, array(
                                'as'    => "ELITE SCHENGEN COC REGULAR.pdf",
                                'mime'  => 'application/pdf'
                            ));
                    }


                }


            }else{ // WORLD ASIA
                if($include_cruise === 'Yes' && $covid_check === 'Yes'){
                    $message->attach($location, array(
                        'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                        'mime'  => 'application/pdf'
                        ))->attach($location2, array(
                            'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                            'mime'  => 'application/pdf'
                        ))->attach($location3, array(
                            'as'    => "Travel Excel Plus - International Cruise Endorsement.pdf",
                            'mime'  => 'application/pdf'
                        ));
                }

                if($include_cruise === 'No' && $covid_check === 'Yes'){
                    $message->attach($location, array(
                        'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                        'mime'  => 'application/pdf'
                        ))->attach($location2, array(
                            'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                            'mime'  => 'application/pdf'
                        // ))->attach($location3, array(
                        //     'as'    => "Travel Excel Plus - International Cruise Endorsement.pdf",
                        //     'mime'  => 'application/pdf'
                        ));
                }

                if($include_cruise === 'Yes' && $covid_check === 'No'){
                    $message->attach($location, array(
                        'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                        'mime'  => 'application/pdf'
                        ))->attach($location2, array(
                            'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                            'mime'  => 'application/pdf'
                         ))->attach($location3, array(
                            'as'    => "Travel Excel Plus - International Cruise Endorsement.pdf",
                            'mime'  => 'application/pdf'
                        ));
                }

                if($include_cruise === 'No' && $covid_check === 'No'){
                    $message->attach($location, array(
                        'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                        'mime'  => 'application/pdf'
                        ))->attach($location2, array(
                            'as'    => "Travel Excel Plus International - Basic Coverage.pdf",
                            'mime'  => 'application/pdf'
                        ));
                }
            }
        });
}


public function emailsendInternationalinternal($fname, $dtnow, $destination, $from_date, $to_date, $days, $age, $occupation, $package, $glcode, $include_cruise,$covidcode,$covid_tag,$net_prem, $covid_amount, $netwithcovid, $prem_one,$prem_two,$location,$location2, $birthDate,$covid_check,$agentname,$location3,$location4,$to_date_covid,$travel_assistance,$burial_assistance,$personal_liability_assistance,$accident_death_disable)
{
    $username = "cocogenAPI";
    $password = "cocogenAPI";
    $digest = sha1($username.":".$password);
    $unparsed_json = file_get_contents("http://webapi.cocogen.ph/api/".$digest."/get/get_currency/dollar");
    $geniisysdata = json_decode($unparsed_json, true);
    $exchange_rate=$geniisysdata[0]['rate'];
    
    $data = array('fname' => $fname,  'dtnow' => $dtnow,  'destination' => $destination,  'from_date' => $from_date,  'to_date' => $to_date,  'days' => $days,  'age' => $age,  'occupation' => $occupation,  'package' => $package,  'glcode' => $glcode,  'include_cruise' => $include_cruise,  'covidcode' => $covidcode,  'covid_tag' => $covid_tag,  'net_prem' => $net_prem,  'covid_amount' => $covid_amount,  'netwithcovid' => $netwithcovid,  'prem_one' => $prem_one,  'prem_two' => $prem_two,  'location' => $location, 'birthDate' => $birthDate,'covid_check' =>$covid_check,'agentname'=>$agentname,'location2'=>$location2,'location3'=>$location3,'exchange_rate'=>$exchange_rate,'to_date_covid'=>$to_date_covid,'travel_assistance'=>$travel_assistance,'burial_assistance'=>$burial_assistance,'personal_liability_assistance'=>$personal_liability_assistance,'accident_death_disable'=>$accident_death_disable);

    Mail::send('emailtemplate.internationalinternal', $data, function ($message) use ($fname,  $dtnow, $destination,  $from_date, $to_date, $days,$age,$occupation,$package,$glcode,$covidcode,$covid_tag,$net_prem, $covid_amount, $netwithcovid, $prem_one,$prem_two,$location,$location2, $birthDate,$location3,$travel_assistance,$burial_assistance,$personal_liability_assistance,$accident_death_disable) {
        $message->to('val_mangoba@cocogen.com')
	//$message->to('client_services@cocogen.com')
        ->cc(['pa.micro_underwriting@cocogen.com','sheila_liwanag@cocogen.com'])
	->from('no_reply@cocogen.com', 'COCOGEN')
	->subject('Successful International Travel Plus transaction: ' . $fname);
        $message->attach($location, array(
            'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
            'mime'  => 'application/pdf'
        ));
    });
}

public function downloadPDFInternational()
{
   
    $txnid = "PA-ITP-EC-00000216";
    $cocogen_international_trans = cocogen_international_trans::where('trans_id', '=', $txnid)->get();
    $cocogen_international_trans_destination_cruise = cocogen_international_trans_destination_cruise::where('trans_id', '=', $txnid)->get();
    $cocogen_international_trans_destination = cocogen_international_trans_destination::where('trans_id', '=', $txnid)->get();
    $cocogen_international_trans_beneficiaries = cocogen_international_trans_beneficiaries::where('trans_id', '=', $txnid)->get();
        // $futureDate = date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['created_at'])));
        if(count($cocogen_international_trans) > 0){
                $destinations = "";
                if(count($cocogen_international_trans_destination)){
                        foreach ($cocogen_international_trans_destination as $cocogen_international_trans_destination ) {
                            if($destinations){
                                $destinations = $destinations ." - ". $cocogen_international_trans_destination->destination;
                            }else{
                                $destinations = $cocogen_international_trans_destination->destination;
                            }
                        }
                }
                $destinations_cruise = "";
                if(count($cocogen_international_trans_destination_cruise)){
                        foreach ($cocogen_international_trans_destination_cruise as $cocogen_international_trans_destination_cruise ) {
                            if($destinations_cruise){
                                $destinations_cruise = $destinations_cruise ." - ". $cocogen_international_trans_destination_cruise->destination;
                            }else{
                                $destinations_cruise = $cocogen_international_trans_destination_cruise->destination;
                            }

                        }
                }

                $mo1 = "";
                $mo2 = "";
                $mo3 = "";
                $name1 = "";
                $name2 = "";
                $name3 = "";
                $relation1 = "";
                $relation2 = "";
                $relation3 = "";
                if(count($cocogen_international_trans_beneficiaries)){
                        foreach ($cocogen_international_trans_beneficiaries as $cocogen_international_trans_beneficiary ) {
                            if(!$name1){
                                $mo1 = 1;
                                $name1 = $cocogen_international_trans_beneficiary->name;
                                $relation1 = $cocogen_international_trans_beneficiary->relation;
                            }elseif(!$name2){
                                $mo2 = 2;
                                $name2 = $cocogen_international_trans_beneficiary->name;
                                $relation2 = $cocogen_international_trans_beneficiary->relation;
                            }else{
                                $mo1 = 3;
                                $name3 = $cocogen_international_trans_beneficiary->name;
                                $relation3 = $cocogen_international_trans_beneficiary->relation;
                            }

                        }
                }

                $prem_one =0;
                $prem_two = 0;
                $covid_a = 0;
                if($cocogen_international_trans[0]['include_cruise'] == 'Yes'){
                    if($cocogen_international_trans[0]['package'] === "Economy"){
                        $prem_one = "10,000";
                        $prem_two = "250";
                        $prem_three='1,000';
                        $prem_four='20,000';
                        $covid_a = "250/day";
                        $limit_1 = "LIMIT - US$ 20,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 15,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US$ 15,000 for COVID-19 Cases ";
                       
                        // Travel Assistance
                        $medical_expense = '20,000 US$';
                        $emergency_dental = '200 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 100 US$/ day maximum 1,000 US$';
                        $advance_of_bail = '1,000 US$';
                        $trip_cancel = '3,000 US$';
                        $trip_curtail = '3,000 US$';
                        $delay_departure = '200 US$ (Lump Sum Cash benefit per occurrence, Non Receipted up to 100 US$)';
                        $flight_misconnection = '200 US$';
                        $flight_diversion = '200 US$';
                        $baggage_delay = '40 US$ (Lump Sum Cash benefit per occurrence)/Non Receipted up to 40 US$';
                        $compensation = 'Up to 1,200 US$ subject to limit 150 US$	for any item ';
                        $lost_stolen = 'Up to  1,200 US$ subject to limit 150 US$ for any item';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';
                        //cruise Optional Cover
                        $cruise_1='10,000 US$';
                        $cruise_2='1,000 US$  (ded. 100 US$)';
                        $cruise_3='250 US$';
                        $cruise_4='20,000 US$';
                        $cruise_5='3,000 US$';
                        $cruise_6='3,000 US$';
                        $cruise_7='Up to 1,200 US$ subject to limit 150 US$ for any item';
                        $cruise_8='200 US$ (Lump Sum Cash benefit per occurrence; Non Receipted up to 100 US$';
                        $bene_item6 ='20,000';
                    }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                        $prem_one = "25,000";
                        $prem_two = "500";
                        $prem_three='10,000';
                        $prem_four='45,000';
                        $limit_1 = "LIMIT - US$ 45,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 25,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US$ 25,000 for COVID-19 Cases ";
                      

                        $covid_a = "500/day";
                        //Travel Assistance
                        $medical_expense = '45,000 US$';
                        $emergency_dental = '200 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 100 US$/ day maximum 1,000 US$';
                        $advance_of_bail = '1,000 US$';
                        $trip_cancel = '3,000 US$';
                        $trip_curtail = '3,000 US$';
                        $delay_departure = '200 US$ (Lump Sum Cash benefit per occurrence, Non Receipted up to 100 US$)';
                        $flight_misconnection = '200 US$';
                        $flight_diversion = '200 US$';
                        $baggage_delay = '90 US$ (Lump Sum Cash benefit per occurrence)/Non Receipted up to 90 US$';
                        $compensation = 'Up to 1,200 US$ subject to limit 150 US$ for any item';
                        $lost_stolen = 'Up to  1,200 US$ subject to limit 150 US$ for any item';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';
                         //cruise Optional Cover
                         $cruise_1='25,000 US$';
                         $cruise_2='10,000 US$  (ded. 1,000 US$)';
                         $cruise_3='500 US$';
                         $cruise_4='45,000 US$';
                         $cruise_5='3,000 US$';
                         $cruise_6='3,000 US$';
                         $cruise_7='Up to 1,200 US$ subject to limit 150 US$ for any item';
                         $cruise_8='200 US$ (Lump Sum Cash benefit per occurrence; Non Receipted up to 100 US$';
                          $bene_item6 ='45,000';
                    }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                        $prem_one = "50,000";
                        $prem_two = "1,000";
                        $prem_three='20,000';
                        $prem_four='45,000';
                        $covid_a = "750/day";
                        $limit_1 = "LIMIT - US$ 45,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 25,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US $25,000 for COVID-19 Cases ";
                        
                        //Travel Assistance
                        $medical_expense = '50,000 US$';
                        $emergency_dental = '200 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 100 US$/ day maximum 1,000 US$';
                        $advance_of_bail = '1,000 US$';
                        $trip_cancel = '3,000 US$';
                        $trip_curtail = '3,000 US$';
                        $delay_departure = '200 US$ (Lump Sum Cash benefit per occurrence, Non Receipted up to 100 US$';
                        $flight_misconnection = '200 US$';
                        $flight_diversion = '200 US$';
                        $baggage_delay = '100 US$ (Lump Sum Cash benefit per occurrence)/Non Receipted up to 100US$';
                        $compensation = 'Up to 1,200 US$ subject to limit 150 US$ for any item';
                        $lost_stolen = 'Up to  1,200 US$ subject to limit 150 US$ for any item';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';
                        //cruise Optional Cover
                         $cruise_1='50,000 US$';
                         $cruise_2='20,000 US$  (ded. 2,000 US$)';
                         $cruise_3='1,000 US$';
                         $cruise_4='50,000 US$';
                         $cruise_5='3,000 US$';
                         $cruise_6='3,000 US$';
                         $cruise_7='Up to 1,200 US$ subject to limit 150 US$ for any item';
                         $cruise_8='200 US$ (Lump Sum Cash benefit per occurrence; Non Receipted up to 100 US$';
                         $bene_item6 ='50,000';
                    }else{
                        $prem_one = "100,000";
                        $prem_two = "2,000";
                        $prem_three='25,000 ';
                        $prem_four='45,000.00';
                        $covid_a = "1,000.00/day";
                        $limit_1 = "LIMIT - US$ 45,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 25,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US $25,000 for COVID-19 Cases ";
                        
                        //Travel Assistance
                        $medical_expense = '100,000 US$';
                        $emergency_dental = '400 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 200 US$/ day maximum 2,000 US$;                            ';
                        $advance_of_bail = '2,000 US$';
                        $trip_cancel = '5,000 US$';
                        $trip_curtail = '5,000 US$';
                        $delay_departure = '500 US$ (Lump Sum Cash benefit per occurrence, Non Receipted up to';
                        $flight_misconnection = '400 US$';
                        $flight_diversion = '400 US$';
                        $baggage_delay = '250 US$ (Lump Sum Cash benefit per occurrence)/Non Receipted up to 100US$';
                        $compensation = 'Up to 2,400 US$ subject to limit 300 US$ for any item';
                        $lost_stolen = 'Up to  2,400 US$ subject to limit 3,000 US$ for any item';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';

                         //cruise Optional Cover
                         $cruise_1='100,000 US$';
                         $cruise_2='20,000 US$  (ded. 2,000 US$)';
                         $cruise_3='2,000 US$';
                         $cruise_4='100,000 US$';
                         $cruise_5='5,000 US$';
                         $cruise_6='5,000 US$';
                         $cruise_7='Up to 2,400 US$ subject to limit 300 US$ for any item';
                         $cruise_8='500 US$ (Lump Sum Cash benefit per occurrence; Non Receipted up to 100 US$';
                         $bene_item6 ='100,000';
                    }

                }else{// NO CRUISE
                    if($cocogen_international_trans[0]['package'] === "Economy"){
                        $prem_one = "10,000";
                        $prem_two = "250";
                        $prem_three='1,000';
                        $prem_four='20,000';
                        $covid_a = "250/day";
                        $limit_1 = "LIMIT - US$ 20,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 15,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US$ 15,000 for COVID-19 Cases ";
                        $package_code = 'PA63';
                        // Travel Assistance
                        $medical_expense = '20,000 US$';
                        $emergency_dental = '200 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 100 US$/ day maximum 1,000 US$';
                        $advance_of_bail = '1,000 US$';
                        $trip_cancel = '3,000 US$';
                        $trip_curtail = '3,000 US$';
                        $delay_departure = '200 US$ (Lump Sum Cash benefit per occurrence, Non Receipted up to 100 US$)';
                        $flight_misconnection = '200 US$';
                        $flight_diversion = '200 US$';
                        $baggage_delay = '40 US$ (Lump Sum Cash benefit per occurrence)/Non Receipted up to 40 US$';
                        $compensation = 'Up to 1,200 US$ subject to limit 150 US$	for any item ';
                        $lost_stolen = 'Up to  1,200 US$ subject to limit 150 US$ for any item';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';
                         $bene_item6 ='20,000';
                    }elseif ($cocogen_international_trans[0]['package'] === "Esteem") {
                        $prem_one = "25,000";
                        $prem_two = "500";
                        $prem_three='10,000';
                        $prem_four='45,000';
                        $limit_1 = "LIMIT - US$ 45,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 25,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US$ 25,000 for COVID-19 Cases ";
                        $package_code = 'PA64';

                        $covid_a = "500/day";
                        //Travel Assistance
                        $medical_expense = '45,000 US$';
                        $emergency_dental = '200 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 100 US$/ day maximum 1,000 US$';
                        $advance_of_bail = '1,000 US$';
                        $trip_cancel = '3,000 US$';
                        $trip_curtail = '3,000 US$';
                        $delay_departure = '200 US$ (Lump Sum Cash benefit per occurrence, Non Receipted up to 100 US$)';
                        $flight_misconnection = '200 US$';
                        $flight_diversion = '200 US$';
                        $baggage_delay = '90 US$ (Lump Sum Cash benefit per occurrence)/Non Receipted up to 90 US$';
                        $compensation = 'Up to 1,200 US$ subject to limit 150 US$ for any item';
                        $lost_stolen = 'Up to  1,200 US$ subject to limit 150 US$ for any item';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';
                        $bene_item6 ='45,000';
                    }elseif ($cocogen_international_trans[0]['package'] === "Executive") {
                        $prem_one = "50,000";
                        $prem_two = "1,000";
                        $prem_three='20,000';
                        $prem_four='45,000';
                        $covid_a = "750/day";
                        $limit_1 = "LIMIT - US$ 45,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 25,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US $25,000 for COVID-19 Cases ";
                        $package_code = 'PA65';
                        //Travel Assistance
                        $medical_expense = '50,000 US$';
                        $emergency_dental = '200 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 100 US$/ day maximum 1,000 US$';
                        $advance_of_bail = '1,000 US$';
                        $trip_cancel = '3,000 US$';
                        $trip_curtail = '3,000 US$';
                        $delay_departure = '200 US$ (Lump Sum Cash benefit per occurrence, Non Receipted up to 100 US$';
                        $flight_misconnection = '200 US$';
                        $flight_diversion = '200 US$';
                        $baggage_delay = '100 US$ (Lump Sum Cash benefit per occurrence)/Non Receipted up to 100US$';
                        $compensation = 'Up to 1,200 US$ subject to limit 150 US$ for any item';
                        $lost_stolen = 'Up to  1,200 US$ subject to limit 150 US$ for any item';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';
                         $bene_item6 ='50,000';
                    }else{
                        $prem_one = "100,000";
                        $prem_two = "2,000";
                        $prem_three='25,000';
                        $prem_four='45,000';
                        $covid_a = "1,000.00/day";
                        $limit_1 = "LIMIT - US$ 45,000 for COVID-19 Cases ";
                        $limit_2 = "LIMIT - up to US$ 25,000 for COVID-19 Cases  ";
                        $limit_3 = "LIMIT - up to US $25,000 for COVID-19 Cases ";
                        $package_code = 'PA65';
                        //Travel Assistance
                        $medical_expense = '100,000 US$';
                        $emergency_dental = '400 US$';
                        $hospital_cash = '20 US$ per day max of 10 days';
                        $travel_of_one_family = 'Travel cost plus up to 200 US$/ day maximum 2,000 US$';
                        $advance_of_bail = '2,000 US$';
                        $trip_cancel = '5,000 US$';
                        $trip_curtail = '5,000 US$';
                        $delay_departure = '500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
                        $flight_misconnection = '400 US$';
                        $flight_diversion = '400 US$';
                        $baggage_delay = '250 US$ (Lump Sum cash benefit per occurrence)/ Non-Receipted up to 100US$)';
                        $compensation = 'Up to 2,400 US$ subject to limit 300 US$ for any item';
                        $lost_stolen = 'Up to 2,400 US$ subject to limit 300 US$ for any';
                        $lost_personal_money = '250 US$';
                        $loss_passport = '250 US$';
                        $bene_item6 ='100,000';
                    }
                }

                $bene_item1 = $prem_one;
                $bene_item2 = $prem_two;
                $bene_item3 = $prem_three;
                $bene_item4 = $prem_four;
                $bene_item5 = "25,000";

                $cover_item1 = $prem_one;


                //get age
                $birthDate = explode("-", $cocogen_international_trans[0]['bday']);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));

                $from_date = date('F d, Y', strtotime($cocogen_international_trans[0]['from_date']));
                $to_date = date('F d, Y', strtotime($cocogen_international_trans[0]['to_date']));

                $cruise_from = date('F d, Y', strtotime($cocogen_international_trans[0]['cruise_from']));
                $cruise_to = date('F d, Y', strtotime($cocogen_international_trans[0]['cruise_to']));

                $created_at = date('F d, Y', strtotime($cocogen_international_trans[0]['created_at']));
                $bday = date('F d, Y', strtotime($cocogen_international_trans[0]['bday']));
                $trans_id = $cocogen_international_trans[0]['trans_id'];
                $full_name  = $cocogen_international_trans[0]['lname'] . ", " . $cocogen_international_trans[0]['fname'] . " ". substr($cocogen_international_trans[0]['mname'], 0, 1) . ".";
                $address  = $cocogen_international_trans[0]['house_no'] ." ".$cocogen_international_trans[0]['present_address'];
                $address2  = $cocogen_international_trans[0]['permanent_barangay'] . ", ". $cocogen_international_trans[0]['permanent_city'];
                $address3  = $cocogen_international_trans[0]['permanent_province']. ", PHILIPPINES";

                $net_prem = number_format($cocogen_international_trans[0]['net_prem'], 2, '.', ',');
                $travel_assistance = number_format($cocogen_international_trans[0]['travel_assistance'], 2, '.', ',');
                $doc_stamp = number_format($cocogen_international_trans[0]['doc_stamp'], 2, '.', ',');
                $prem_tax = number_format($cocogen_international_trans[0]['prem_tax'], 2, '.', ',');
                $lgt_tax = number_format($cocogen_international_trans[0]['lgt_tax'], 2, '.', ',');
                $final_due = number_format($cocogen_international_trans[0]['final_due'], 2, '.', ',');

                $promo_title = "";
                $promo_mid =  "";
                $promo_less =  "";
                $amount_due =  "";
                $amount_due_title =  "";
                if($cocogen_international_trans[0]['promo_less']){
                    $amount_due_title = "Total Amount Due";
                    $amount_due = number_format($cocogen_international_trans[0]['amount_due'], 2, '.', ',');
                    $promo_less = $cocogen_international_trans[0]['promo_less'];
                    $promo_title = "Less";
                    $promo_mid = ":";
                }

                if($cocogen_international_trans[0]['covid'] === "Yes"){
                    $covid_bene_title = "INTERNATIONAL COVID-19 COVERAGE";
                    $covid_php = "USD";
                }else{
                    $bene_item5 = "";
                    $covid_bene_title = "";
                    $covid_php = "";
                }
                $covid_check = $cocogen_international_trans[0]["covid"];
                $covid_period = $cocogen_international_trans[0]['covid_period'];
                $package = strtoupper ($cocogen_international_trans[0]['package']);
                $include_cruise = $cocogen_international_trans[0]['include_cruise'];
                $cover_title_item7 = "";
                $cover_content_item7 = "";
                $cover_title_item8 = "";
                $cover_content_item8 = "";
                $cover_title_item9 = "";
                $cover_content_item9 = "";
                if($cocogen_international_trans[0]['include_cruise'] === "Yes"){
                    
                    $cover_title_item7 = "Date from";
                    $cover_content_item7 = "aaaaa";
                    $cover_title_item8 = "date to ";
                    $cover_content_item8 = "nnnnnnnnnnn";

                } 
                // if($covid_period == 'Yes'){
                //     $startTimeStamp = strtotime($from_date);
                //     $endTimeStamp = strtotime($to_date);
                //     $timeDiff = abs($endTimeStamp - $startTimeStamp);
                //     $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                //     // and you might want to convert to integer
                //     $numberDays = intval($numberDays);

                //     if($numberDays <= 14){
                //         $from_date_covid_return = $to_date;
                //     }else{
                //         $from_date_covid_return = date('F d, Y', strtotime($from_date. ' + 15 days'));
                //     }

                //    }else{
                //     $from_date_covid_return = $to_date;
                //    }

                   $to_date_covid = date('F d, Y', strtotime($cocogen_international_trans[0]['covid_return'])); 
                $data = array(
                    'package' => $package,
                    'covid_a' => $covid_a,
                    'covid_check' =>$covid_check,
                    'include_cruise' => $include_cruise,
                    'covid_period' => $covid_period,
                    'from_date' => $from_date,
                    'to_date' => $to_date,
                    'cruise_from' => $cruise_from,
                    'cruise_to' =>$cruise_to,
                    'to_date_covid' =>$to_date_covid,
                    'created_at' => $created_at,
                    'limit_1' =>$limit_1,
                    'limit_2' =>$limit_2,
                    'limit_3' =>$limit_3,
                    'package_code' =>!empty($package_code) ? $package_code :'0',
                    'bday' => $bday,
                    'trans_id' => $trans_id,
                    'age' => $age,
                    'full_name' => $full_name,
                    'address' => $address,
                    'address2' => $address2,
                    'address3' => $address3,
                    'net_prem' => $net_prem,
                    'travel_assistance'=>$travel_assistance,
                    'doc_stamp' => $doc_stamp,
                    'prem_tax' => $prem_tax,
                    'lgt_tax' => $lgt_tax,
                    'amount_due' => $amount_due,
                    'amount_due_title' => $amount_due_title,
                    'promo_mid' => $promo_mid,
                    'promo_less' => $promo_less,
                    'promo_title' => $promo_title,
                    'final_due' => $final_due,
                    'destinations' => $destinations,
                    'destinations_cruise'=>$destinations_cruise,
                    'mo1' => $mo1,
                    'mo2' => $mo2,
                    'mo3' => $mo3,
                    'name1' => $name1,
                    'name2' => $name2,
                    'name3' => $name3,
                    'relation1' => $relation1,
                    'relation2' => $relation2,
                    'relation3' => $relation3,
                    'bene_item1' => $bene_item1,
                    'bene_item2' => $bene_item2,
                    'bene_item3' => $bene_item3,
                    'bene_item4' => $bene_item4,
                    'bene_item6' => $bene_item6,
                    'covid_bene_title' => $covid_bene_title,
                    'covid_php' => $covid_php,
                    'cover_item1' => $cover_item1,
                    // 'cover_item4' => $cover_item4,
                    // 'cover_item5' => $cover_item5,
                    // 'cover_item6' => $cover_item6,
                    'cover_title_item7' => $cover_title_item7,
                    'cover_content_item7' => $cover_content_item7,
                    'medical_expense' => $medical_expense,
                    'emergency_dental' => $emergency_dental,
                    'hospital_cash' => $hospital_cash,
                    'travel_of_one_family' => $travel_of_one_family,
                    'advance_of_bail' => $advance_of_bail,
                    'trip_cancel' => $trip_cancel,
                    'trip_curtail' => $trip_curtail,
                    'delay_departure' => $delay_departure,
                    'flight_misconnection' => $flight_misconnection,
                    'flight_diversion' => $flight_diversion,
                    'baggage_delay' => $baggage_delay,
                    'compensation' => $compensation,
                    'lost_stolen' => $lost_stolen,
                    'lost_personal_money' => $lost_personal_money,
                    'loss_passport' => $loss_passport,
                    'cruise_1'=>!empty($cruise_1) ? $cruise_1:0,
                    'cruise_2'=>!empty($cruise_2) ? $cruise_2:0,
                    'cruise_3'=>!empty($cruise_3) ? $cruise_3:0,
                    'cruise_4'=>!empty($cruise_4) ? $cruise_4:0,
                    'cruise_5'=>!empty($cruise_5) ? $cruise_5:0,
                    'cruise_6'=>!empty($cruise_6) ? $cruise_6:0,
                    'cruise_7'=>!empty($cruise_7) ? $cruise_7:0,
                    'cruise_8'=>!empty($cruise_8) ? $cruise_8:0
                );

                $hasht = Hash::make($trans_id . '-International');

                $cocogen_international_file = new cocogen_international_file;
                $cocogen_international_file->tnxid = $trans_id;
                $cocogen_international_file->filename =  md5($hasht) . '-International';
                $cocogen_international_file->fileLocation = 'public/pdf/international/' . md5($hasht) . '-International.pdf';
                $cocogen_international_file->save();

                $pdf = PDF::loadView('pdf.international', $data);
                Storage::put('public/pdf/international/' . md5($hasht) . '-International.pdf', $pdf->output());

                if($cocogen_international_trans[0]['covid'] === "Yes"){
                    $pdf = PDF::loadView('pdf.international', $data);
                }else{
                    // $pdf = PDF::loadView('pdf.internationalNoCovid', $data);
                    $pdf = PDF::loadView('pdf.international', $data);
                }
                Storage::put('public/pdf/international/' . md5($hasht) . '-International.pdf', $pdf->output());
                return $pdf->download('International.pdf');
            //dd($cover_item1,$cover_item4,$cover_item5,$cover_item6,$relation1, $relation2, $relation3,$name1, $name2, $name3,$age,$bday, $destinations, count($cocogen_international_trans_destination), $address,$full_name, $trans_id, $created_at, $from_date, $to_date);

    }
}

public function downloadPDFInternationalShengen()
{

    $txnid = "PA-ITP-EC-00000202";
    $cocogen_international_trans = cocogen_international_trans::where('trans_id', '=', $txnid)->get();
    $cocogen_international_trans_destination_cruise = cocogen_international_trans_destination_cruise::where('trans_id', '=', $txnid)->get();
    $cocogen_international_trans_destination = cocogen_international_trans_destination::where('trans_id', '=', $txnid)->get();
    $cocogen_international_trans_beneficiaries = cocogen_international_trans_beneficiaries::where('trans_id', '=', $txnid)->get();
        // $futureDate = date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['created_at'])));
    if(count($cocogen_international_trans) > 0){
                $destinations = "";
                if(count($cocogen_international_trans_destination)){
                        foreach ($cocogen_international_trans_destination as $cocogen_international_trans_destination ) {
                            if($destinations){
                                $destinations = $destinations ." ,". $cocogen_international_trans_destination->destination;
                                // $destinations = substr($destinations, 0, -1);
                            }else{
                                $destinations = $cocogen_international_trans_destination->destination;
                            }

                        }
                }
                //Insured Name
                $full_name  = $cocogen_international_trans[0]['lname'] . ", " . $cocogen_international_trans[0]['fname'] . " ". substr($cocogen_international_trans[0]['mname'], 0, 1) . ".";
                //PolicyNo
                $cocogen_policy_no = $cocogen_international_trans[0]['trans_id'];
                //Issue Date
                $created_at = date('F d, Y', strtotime($cocogen_international_trans[0]['created_at']));
                //Birthdate
                $birthDate = date("F d, Y", strtotime($cocogen_international_trans[0]['bday']));
                //Period Travel =
                $from_date = date('F d, Y', strtotime($cocogen_international_trans[0]['from_date']));
                $to_date = date('F d, Y', strtotime($cocogen_international_trans[0]['to_date']));
                //covid_period To date
                $to_date_covid = date('F d, Y', strtotime($cocogen_international_trans[0]['covid_return']));
                //package
                $package = $cocogen_international_trans[0]['package'];
                // Purpose travel
                $purpose_travel = $cocogen_international_trans[0]['purpose_travel'];

                $trans_id = $cocogen_international_trans[0]['trans_id'];

                    if($package == 'Elite'){
                        $afirst ='100,000 US$';
                        $bsecond ='25,000 US$';
                        $bsecond2 = '(ded. 2,000US$)';
                        $cthird='2,000 US$';
                        $dfourth='100,000 US$';
                        $dfourth2='(ded. 2,000US$)';
                        $two = '400US$';
                        $three='20 US$ per day max of 10 days';
                        $seven = 'Travel cost plus up 200 US$/day maximum 2,000US$';
                        $fourteen = '2,000 US$';
                        $fifteen ='5,000 US$';
                        $sixteen = '5,000 US$';
                        $seventeen = '500 US$ (Lump Sum cash benefit per occurence/Non-Receipted up to 100US$)';
                        $eighteen ='400 US$';
                        $nineteen='400 US$';
                        $twenty='250 US$ (Lump Sum cash benefit per occurence/ Non-Receipted up to 100US$)';
                        $twentyone = 'Up to 2,400  US$ subject to limit 300 US$ for any item';
                        $twentytwo = 'Up to 2,400  US$ subject to limit 300 US$ for any item';
                        $twentyfour = '250 US$';
                        $twentyfive = '250 US$';
                    }else{
                        $afirst ='50,000 US$';
                        $bsecond ='20,000 US$';
                        $bsecond2 = '(ded. 2,000US$)';
                        $cthird='1,000 US$';
                        $dfourth='50,000 US$';
                        $dfourth2='(ded. 2,000US$)';
                        $two = '200US$';
                        $three='20 US$ per day max of 10 days';
                        $seven = 'Travel cost plus up 100 US$/day maximum 1,000US$';
                        $fourteen = '1,000 US$';
                        $fifteen ='3,000 US$';
                        $sixteen = '3,000 US$';
                        $seventeen = '200 US$ (Lump Sum cash benefit per occurence/Non-Receipted up to 100US$)';
                        $eighteen ='200 US$';
                        $nineteen='200 US$';
                        $twenty='100 US$ (Lump Sum cash benefit per occurence/ Non-Receipted up to 100 US$)';
                        $twentyone = 'Up to 1,200  US$ subject to limit 150 US$ for any item';
                        $twentytwo = 'Up to 1,200  US$ subject to limit 150 US$ for any item';
                        $twentyfour = '250 US$';
                        $twentyfive = '250 US$';
                    }

                    // $from_date = "September 30 2023";
                    // $to_date= "September 30 2023";
                    // $to_date_covid="September 30 2023";
                    // $birthDate="September 30 2023";
          
                 
                $data = array(
                    'package' => $package,
                    'insured' => $full_name,
                    'policyno' => $cocogen_policy_no,
                    'birthdate' =>$birthDate,
                    'covidfrom' => $from_date,
                    'covidto' => $to_date_covid,
                    'purposetravel' => $purpose_travel,
                    'issuancedate' => $created_at,
                    'from_date' => $from_date,
                    'to_date' => $to_date,
                    'destination' =>$destinations,
                    'afirst'=>$afirst,
                    'bsecond'=>$bsecond,
                    'bsecond2'=>$bsecond2,
                    'cthird'=>$cthird,
                    'dfourth'=>$dfourth,
                    'dfourth2'=>$dfourth2,
                    'two'=>$two,
                    'three'=>$three,
                    'seven'=>$seven,
                    'fourteen'=>$fourteen,
                    'fifteen'=>$fifteen,
                    'sixteen'=>$sixteen,
                    'seventeen'=>$seventeen,
                    'eighteen'=>$eighteen,
                    'nineteen'=>$nineteen,
                    'twenty'=>$twenty,
                    'twentyone'=>$twentyone,
                    'twentytwo'=>$twentytwo,
                    'twentyfour'=>$twentyfour,
                    'twentyfive'=>$twentyfive

                );

                $hasht = Hash::make($trans_id . '-International');

                $cocogen_international_file = new cocogen_international_file_shengen;
                $cocogen_international_file->tnxid = $trans_id;
                $cocogen_international_file->filename =  md5($hasht) . '-International';
                $cocogen_international_file->fileLocation = '/internationalShengen/' . md5($hasht) . '-International.pdf';
                $cocogen_international_file->save();
                 
             
                     
                        if($cocogen_international_trans[0]['covid'] === "Yes"){
                            $pdf = PDF::loadView('pdf.internationalShengenCovid', $data);
                            $pdf->setPaper('A4', 'portrait');
                        }else{
                            $pdf = PDF::loadView('pdf.internationalShengen', $data);
                            $pdf->setPaper('legal', 'portrait');
                        }
                


                Storage::put('internationalShengen/' . md5($hasht) . '-International.pdf', $pdf->output());
                return $pdf->download('International.pdf');
            //dd($cover_item1,$cover_item4,$cover_item5,$cover_item6,$relation1, $relation2, $relation3,$name1, $name2, $name3,$age,$bday, $destinations, count($cocogen_international_trans_destination), $address,$full_name, $trans_id, $created_at, $from_date, $to_date);

    }
}


public function downloadInternationalCruise()
{

    $txnid = "PA-ITP-EC-00000167";
 

    $cocogen_international_trans = cocogen_international_trans::where('trans_id', '=', $txnid)->get();
             if($cocogen_international_trans[0]['include_cruise'] === "Yes"){
                //PolicyNo
                $cocogen_policy_no = $cocogen_international_trans[0]['trans_id'];
                //Period Travel =
                $from_date = date('F d, Y', strtotime($cocogen_international_trans[0]['from_date']));
                $to_date = date('F d, Y', strtotime($cocogen_international_trans[0]['to_date']));

                $data = array(
                    'policyno' => $cocogen_policy_no,
                    'from_date' => $from_date,
                    'to_date' => $to_date,

                );

                $hasht = Hash::make($cocogen_policy_no . '-International');

                $cocogen_international_file = new cocogen_international_file_cruise;
                $cocogen_international_file->tnxid = $cocogen_policy_no;
                $cocogen_international_file->filename =  md5($hasht) . '-International';
                $cocogen_international_file->fileLocation = '/internationalCruise/' . md5($hasht) . '-International.pdf';
                $cocogen_international_file->save();

            
                            $pdf = PDF::loadView('pdf.internationalCruise', $data);
                            Storage::put('internationalCruise/' . md5($hasht) . '-International.pdf', $pdf->output());
                            return $pdf->download('International.pdf');
                }

                
            // dd($cover_item1,$cover_item4,$cover_item5,$cover_item6,$relation1, $relation2, $relation3,$name1, $name2, $name3,$age,$bday, $destinations, count($cocogen_international_trans_destination), $address,$full_name, $trans_id, $created_at, $from_date, $to_date);


}


public function downloadPDFDomestic($txnid)
    {
       // $txnid = "Domestic-testdev00000053";
        $cocogen_domestic_trans = cocogen_domestic_trans::where('trans_id', '=', $txnid)->get();
        $cocogen_domestic_trans_destination = cocogen_domestic_trans_destination::where('trans_id', '=', $txnid)->get();
        $cocogen_domestic_trans_emergency_contact = cocogen_domestic_trans_emergency_contact::where('trans_id', '=', $txnid)->first();
            // $futureDate = date('m/d/Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['created_at'])));
        if(count($cocogen_domestic_trans) > 0){
                    $destinations = "";
                    if(count($cocogen_domestic_trans_destination)){
                            foreach ($cocogen_domestic_trans_destination as $cocogen_domestic_trans_destinations ) {
                                if($destinations){
                                    $destinations = $destinations ." - ". $cocogen_domestic_trans_destinations->destination;
                                }else{
                                    $destinations = $cocogen_domestic_trans_destinations->destination;
                                }

                            }
                    }

                    $mo1 = "";
                    $mo2 = "";
                    $mo3 = "";
                    $name1 = "";
                    $name2 = "";
                    $name3 = "";
                    $relation1 = "";
                    $relation2 = "";
                    $relation3 = "";

                    $name1 = $cocogen_domestic_trans_emergency_contact->name;
                    $relation1 = $cocogen_domestic_trans_emergency_contact->relation;

                    $prem_one =0;
                    $prem_two = 0;
                    $prem_three = 0;
                    $prem_four = 0;
                    $covid_a = 0;
                    if($cocogen_domestic_trans[0]['package'] === "Packet"){
                        $prem_one = "250,000.00";
                        $prem_two = "25,000.00";
                        $prem_three = "12,500.00";
                        $prem_four = "25,000.00";
                        $covid_a = "250.00/day";
                    }elseif($cocogen_domestic_trans[0]['package'] === "Pro"){
                        $prem_one = "500,000.00";
                        $prem_two = "50,000.00";
                        $prem_three = "25,000.00";
                        $prem_four = "25,000.00";
                        $covid_a = "500.00/day";
                    }elseif($cocogen_domestic_trans[0]['package'] === "Prime"){
                        $prem_one = "750,000.00";
                        $prem_two = "75,000.00";
                        $prem_three ="37,500.00";
                        $prem_four = "25,000.00";
                         $covid_a = "750.00/day";
                    }else{
                        $prem_one = "1,000,000.00";
                        $prem_two = "100,000.00";
                        $prem_three = "50,000.00";
                        $prem_four = "25,000.00";
                        $covid_a = "1,000.00/day";
                    }

                    $bene_item1 = $prem_one;
                    $bene_item2 = $prem_two;
                    $bene_item3 = $prem_two;
                    $bene_item4 = $prem_one;
                    $bene_item5 = "25,000.00";

                    $cover_item1 = $prem_one;
                    $cover_item4 = $prem_three;
                    $cover_item5 = $prem_four;
                    $cover_item6 = $prem_four;

                    //get age
                    $birthDate = explode("-", $cocogen_domestic_trans[0]['bday']);
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));

                    $dateFrom = $cocogen_domestic_trans_destination->min('date_from');
                    $dateTo = $cocogen_domestic_trans_destination->max('date_to');

                    $from_date = date('F d, Y', strtotime($dateFrom));
                    $to_date = date('F d, Y', strtotime($dateTo));
                    $created_at = date('F d, Y', strtotime($cocogen_domestic_trans[0]['created_at']));
                    $bday = date('F d, Y', strtotime($cocogen_domestic_trans[0]['bday']));
                    $trans_id = $cocogen_domestic_trans[0]['trans_id'];
                    $full_name  = $cocogen_domestic_trans[0]['lname'] . ", " . $cocogen_domestic_trans[0]['fname'] . " ". substr($cocogen_domestic_trans[0]['mname'], 0, 1) . ".";
                    $address  = $cocogen_domestic_trans[0]['permanent_address'];
                    $address2  = $cocogen_domestic_trans[0]['permanent_barangay'] . ", ". $cocogen_domestic_trans[0]['permanent_city'];
                    $address3  = $cocogen_domestic_trans[0]['permanent_province']. ", PHILIPPINES";

                    $net_prem = number_format($cocogen_domestic_trans[0]['net_prem'], 2, '.', ',');
                    $doc_stamp = number_format($cocogen_domestic_trans[0]['doc_stamp'], 2, '.', ',');
                    $prem_tax = number_format($cocogen_domestic_trans[0]['prem_tax'], 2, '.', ',');
                    $lgt_tax = number_format($cocogen_domestic_trans[0]['lgt_tax'], 2, '.', ',');
                    $final_due = number_format($cocogen_domestic_trans[0]['final_due'], 2, '.', ',');

                    $promo_title = "";
                    $promo_mid =  "";
                    $promo_less =  "";
                    $amount_due =  "";
                    $amount_due_title =  "";
                    if($cocogen_domestic_trans[0]['promo_less']){
                        $amount_due_title = "Total Amount Due";
                        $amount_due = number_format($cocogen_domestic_trans[0]['amount_due'], 2, '.', ',');
                        $promo_less = $cocogen_domestic_trans[0]['promo_less'];
                        $promo_title = "Less";
                        $promo_mid = ":";
                    }

                    if($cocogen_domestic_trans[0]['covid'] === "Yes"){
                        $covid_bene_title = "DOMESTIC COVID-19 COVERAGE";
                        $covid_php = "PHP";
                    }else{
                        $bene_item5 = "";
                        $covid_bene_title = "";
                        $covid_php = "";
                    }
                    $package = strtoupper ($cocogen_domestic_trans[0]['package']);
                    $mode_trasno = "";
                    $cover_title_item7 = "";
                    $cover_content_item7 = "";
                    $cover_title_item8 = "";
                    $cover_content_item8 = "";
                    $cover_title_item9 = "";
                    $cover_content_item9 = "";
                    if($cocogen_domestic_trans[0]['mode_transpo'] === "Air Plan"){
                        $mode_trasno = "VIA AIR";
                        $cover_title_item7 = "Delayed departure";
                        $cover_content_item7 = "up to Php 10,000.00";
                        $cover_title_item8 = "Baggage Delay ";
                        $cover_content_item8 = "up to Php 5,000.00";
                        $cover_title_item9 = "Compensation for in-flight loss and damage (checked-in baggage)  ";
                        $cover_content_item9 = "up to Php 10,000.00  (subject to Php 1,000.00/item)";
                    }else{
                        $mode_trasno = "VIA NON-AIR";
                    }
                    $data = array(
                        'package' => $package,
                        'covid_a' => $covid_a,
                        'mode_trasno' => $mode_trasno,
                        'from_date' => $from_date,
                        'to_date' => $to_date,
                        'created_at' => $created_at,
                        'bday' => $bday,
                        'trans_id' => $trans_id,
                        'age' => $age,
                        'full_name' => $full_name,
                        'address' => $address,
                        'address2' => $address2,
                        'address3' => $address3,
                        'net_prem' => $net_prem,
                        'doc_stamp' => $doc_stamp,
                        'prem_tax' => $prem_tax,
                        'lgt_tax' => $lgt_tax,
                        'amount_due' => $amount_due,
                        'amount_due_title' => $amount_due_title,
                        'promo_mid' => $promo_mid,
                        'promo_less' => $promo_less,
                        'promo_title' => $promo_title,
                        'final_due' => $final_due,
                        'destinations' => $destinations,
                        'mo1' => $mo1,
                        'mo2' => $mo2,
                        'mo3' => $mo3,
                        'name1' => $name1,
                        'name2' => $name2,
                        'name3' => $name3,
                        'relation1' => $relation1,
                        'relation2' => $relation2,
                        'relation3' => $relation3,
                        'bene_item1' => $bene_item1,
                        'bene_item2' => $bene_item2,
                        'bene_item3' => $bene_item3,
                        'bene_item4' => $bene_item4,
                        'bene_item5' => $bene_item5,
                        'covid_bene_title' => $covid_bene_title,
                        'covid_php' => $covid_php,
                        'cover_item1' => $cover_item1,
                        'cover_item4' => $cover_item4,
                        'cover_item5' => $cover_item5,
                        'cover_item6' => $cover_item6,
                        'cover_title_item7' => $cover_title_item7,
                        'cover_content_item7' => $cover_content_item7,
                        'cover_title_item8' => $cover_title_item8,
                        'cover_content_item8' => $cover_content_item8,
                        'cover_title_item9' => $cover_title_item9,
                        'cover_content_item9' => $cover_content_item9
                    );

                    $hasht = Hash::make($trans_id . '-Domestic');

                    $cocogen_domestic_file = new cocogen_domestic_file;
                    $cocogen_domestic_file->tnxid = $trans_id;
                    $cocogen_domestic_file->filename =  md5($hasht) . '-Domestic';
                    $cocogen_domestic_file->fileLocation = 'public/pdf/domestic/' . md5($hasht) . '-Domestic.pdf';
                    $cocogen_domestic_file->save();

                    $pdf = PDF::loadView('pdf.domestic', $data);
                    Storage::put('public/pdf/domestic/' . md5($hasht) . '-Domestic.pdf', $pdf->output());

                    if($cocogen_domestic_trans[0]['covid'] === "Yes"){
                        $pdf = PDF::loadView('pdf.domestic', $data);
                    }else{
                        $pdf = PDF::loadView('pdf.domesticNoCovid', $data);
                    }
                    Storage::put('public/pdf/domestic/' . md5($hasht) . '-Domestic.pdf', $pdf->output());
                    return $pdf->download('Domestic.pdf');

        }
    }
    public function emailsendDomesticinternal($fname, $dtnow, $destination, $from_date, $to_date, $days, $age, $occupation, $package, $glcode, $mode_transpo,$covidcode,$covid_tag,$net_prem, $covid_amount, $netwithcovid, $prem_one,$prem_two,$location,$agentname, $birthDate)
    {
        $data = array('fname' => $fname,  'dtnow' => $dtnow,  'destination' => $destination,  'from_date' => $from_date,  'to_date' => $to_date,  'days' => $days,  'age' => $age,  'occupation' => $occupation,  'package' => $package,  'glcode' => $glcode,  'mode_transpo' => $mode_transpo,  'covidcode' => $covidcode,  'covid_tag' => $covid_tag,  'net_prem' => $net_prem,  'covid_amount' => $covid_amount,  'netwithcovid' => $netwithcovid,  'prem_one' => $prem_one,  'prem_two' => $prem_two,  'location' => $location,  'agentname' => $agentname,  'birthDate' => $birthDate);
        Mail::send('emailtemplate.domesticinternal', $data, function ($message) use ($fname,  $dtnow, $destination,  $from_date, $to_date, $days,$age,$occupation,$package,$glcode,$mode_transpo,$covidcode,$covid_tag,$net_prem, $covid_amount, $netwithcovid, $prem_one,$prem_two,$location,$agentname, $birthDate) {
            $message->to('client_services@cocogen.com', 'COCOGEN')->cc(['pa.micro_underwriting@cocogen.com','sheila_liwanag@cocogen.com'])->subject('Successful Domestic Travel Plus transaction: ' . $fname);
            $message->attach($location, array(
                    'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                    'mime'  => 'application/pdf'
                ));
           
        });
    }


    public function emailsendDomesticExternal($fname, $email,$content,$location,$location2)
    {
        $data = array('fname'=>$fname, 'email'=>$email,'content'=>$content,'location' => $location,'location2' => $location2);
        Mail::send('emailtemplate.domesticexternal', $data, function($message) use ($fname, $email, $content,$location,$location2)
        {
            $message->to($email, 'COCOGEN')->subject($fname.', you are now covered by Cocogen Domestic Travel Plus Insurance')->from('no_reply@cocogen.com', 'COCOGEN');
            $message->attach($location, array(
                    'as'    => "PolicyDocs-". "-" . $fname . ".pdf",
                    'mime'  => 'application/pdf'
                ))->attach($location2, array(
                        'as'    => "Travel Excel Plus Domestic Policy - Basic Coverage Final 05172022.pdf",
                        'mime'  => 'application/pdf'
                    ));
        });
    }

    public function emailsendProTechExternal($fname, $email,$content)
    {
        $data = array('fname'=>$fname, 'email'=>$email,'content'=>$content);
        Mail::send('emailtemplate.protechexternal', $data, function($message) use ($fname, $email, $content)
        {
            $message->to($email, 'COCOGEN')->subject($fname.', you are now covered by Cocogen Pro-Tech Computer Insurance')->from('no_reply@cocogen.com', 'COCOGEN');
        });
    }

    public function reauthctplcon()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Failed | COCOGEN | General Insurance";
        $metadescription = "";
        $keyword = "";
        $message1 = session::get('message1');
        $txnid = session::get('txnid');
        session()->flash('message2', $message1);
        Session::forget('message1');
        if (empty($txnid)) {
            return redirect('/');
        }
        $cocogen_ctpl_vehicleinfos = cocogen_ctpl_vehicleinfo::where('tnxid', '=', $txnid)->get();

        return view('getaquote.motor.ctpl.failed', ['title' => $title, 'cocogen_ctpl_vehicleinfo' => $cocogen_ctpl_vehicleinfos, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function reauthctplconsave(Request $request)
    {

        $dtnow = date('Y-m-d H:i:s');
        $cocogen_ctpl_vehicleinfos = cocogen_ctpl_vehicleinfo::where('tnxid', '=', $request->get('txnid'))->get();
        $cocogen_ctpl_clientinfo = cocogen_ctpl_clientinfo::where('tnxid', '=', $request->get('txnid'))->get();
        $cocogen_quote_requests = cocogen_quote_request::where('tnxid', '=', $request->get('txnid'))->get();

        $full_name = $cocogen_ctpl_clientinfo[0]['firstName'] . ' ' . $cocogen_ctpl_clientinfo[0]['middleName'] . ' ' . $cocogen_ctpl_clientinfo[0]['lastName'];
        $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::where('id', '=', "1")->get();
        $lastc0c = $cocogen_ctpl_coc_series[0]['coc_no'];
        $lastc0c = $lastc0c + 1;
        $lastc0c = "0" . $lastc0c;

        $plate = $request->get('plateNo');
        $emailAddress = $cocogen_ctpl_clientinfo[0]['emailAddress'];
        $contactNo = $cocogen_ctpl_clientinfo[0]['contactNo'];
        $fullname = $cocogen_ctpl_clientinfo[0]['firstName'] . " " . $cocogen_ctpl_clientinfo[0]['lastName'];
        $coclink = URL::to('/get-quote/view_coc_ctpl') . '/' . sha1($emailAddress) . '/' . base64_encode($request->get('txnid'));

        $dateINEX = substr($plate, -1);
        if ($dateINEX == 1) {
            $inceptionDate = "02/01/" . date('Y');
            $expiryDate = "02/28/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 2) {
            $inceptionDate = "03/01/" . date('Y');
            $expiryDate = "03/31/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 3) {
            $inceptionDate = "04/01/" . date('Y');
            $expiryDate = "04/30/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 4) {
            $inceptionDate = "05/01/" . date('Y');
            $expiryDate = "05/31/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 5) {
            $inceptionDate = "06/01/" . date('Y');
            $expiryDate = "06/30/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 6) {
            $inceptionDate = "07/01/" . date('Y');
            $expiryDate = "07/31/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 7) {
            $inceptionDate = "08/01/" . date('Y');
            $expiryDate = "08/31/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 8) {
            $inceptionDate = "09/01/" . date('Y');
            $expiryDate = "09/30/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 9) {
            $inceptionDate = "10/01/" . date('Y');
            $expiryDate = "10/31/" . date('Y', strtotime('+1 years'));
        } elseif ($dateINEX == 0) {
            $inceptionDate = "01/01/" . date('Y');
            $expiryDate = "01/31/" . date('Y', strtotime('+1 years'));
        } else {
            $inceptionDate = "01/01/" . date('Y');
            $expiryDate = "01/31/" . date('Y', strtotime('+1 years'));
        }

        if (empty($cocogen_quote_requests[0]['brand_new'])) {
            $regType = "N";
            $brand_new = "N";
        } else {
            $regType = "R";
            $brand_new = "R";
        }

        if ($cocogen_quote_requests[0]['brand_new'] == "Y") {
            $brand_new = "Y";
            $start = date('m/d/Y', strtotime($cocogen_quote_requests[0]['purchaseDate']));
            $end = date("m/d/Y", strtotime(date("m/d/Y", strtotime($start)) . " + 3 year"));
            $params = array(
                "arg0" => array(
                    "username" => env('COC_API_USERNAME'),
                    "password" => env('COC_API_PASSWORD'),
                    "regType" => "N",
                    "cocNo" => $cocogen_ctpl_coc_series[0]['coc_no'],
                    "engineNo" => $request->get('engineNO'),
                    "chassisNo" => $request->get('chassisNo'),
                    "inceptionDate" => $start,
                    "expiryDate" => $end,
                    "mvType" => $cocogen_quote_requests[0]['mvCode'], //$cocogen_quote_requests[0]['mvType'],
                    "mvPremType" => $cocogen_quote_requests[0]['premCode'],
                    "taxType" => "1",
                    "assuredName" => $full_name,
                    "assuredTin" => "999-999-999-999"
                )

            );
        } else {
            $brand_new = "";
            $params = array(
                "arg0" => array(
                    "username" => env('COC_API_USERNAME'),
                    "password" => env('COC_API_PASSWORD'),
                    "regType" => "R",
                    "cocNo" => $cocogen_ctpl_coc_series[0]['coc_no'],
                    "plateNo" => $request->get('plateNo'),
                    "mvFileNo" => $request->get('mvFIleNo'),
                    "engineNo" => $request->get('engineNO'),
                    "chassisNo" => $request->get('chassisNo'),
                    "inceptionDate" => $inceptionDate,
                    "expiryDate" => $expiryDate,
                    "mvType" => $cocogen_quote_requests[0]['mvCode'], //$cocogen_quote_requests[0]['mvType'],
                    "mvPremType" => $cocogen_quote_requests[0]['premCode'],
                    "taxType" => "1",
                    "assuredName" => $full_name,
                    "assuredTin" => "999-999-999-999"
                )
            );
        }

        $opts = array(
            "ssl" => array(
                // 'ciphers'=>'RC4-SHA',
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        );
        $context = stream_context_create($opts);
        // *** END ***
        $client = new SoapClient(env('COC_API_LINK'), array("trace" => true, "stream_context" => $context));

        $response = $client->__soapCall("register", array($params));

        foreach ($response as $responses) {
            //$responses->errorMessage
            //$responses->authNo

            if (!empty($responses->authNo)) {

                $cocogen_quote_tnxid = cocogen_quote_request_changeprimary::findorFail($request->get('txnid'));
                $cocogen_quote_tnxid->status = "Autheticated";
                $cocogen_quote_tnxid->save();

                $cocogen_ctpl_vehicleinfochangeprimary = cocogen_ctpl_vehicleinfochangeprimary::findorFail($request->get('txnid'));
                $cocogen_ctpl_vehicleinfochangeprimary->authNo =  $responses->authNo;
                $cocogen_ctpl_vehicleinfochangeprimary->cocNO =  $cocogen_ctpl_coc_series[0]['coc_no'];
                $cocogen_ctpl_vehicleinfochangeprimary->save();

                Session::forget('txnid');
                Session::forget('message1');

                $cocogen_ctpl_coc_series = cocogen_ctpl_coc_series::findorFail("1");
                $cocogen_ctpl_coc_series->coc_no = $lastc0c;
                $cocogen_ctpl_coc_series->save();

                $authNo = $responses->authNo;
                $this->downloadPDFCTPL($request->get('txnid'), $authNo);

                $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 7)->get();
                $external = str_replace("templatefname", $full_name, $cocogen_admin_emailtemplate[0]['content']);
                $external = str_replace("templatelink", $coclink, $external);
                // $this->emailsendctpl($fullname, $emailAddress, $external);
                //$this->emailsendctpl($fullname, $emailAddress, $coclink);
                // $this->emailsendctplinternal($fullname, $emailAddress, $contactNo, $dtnow, $coclink);
                session()->flash('authNo', $authNo);
                return redirect('/get-quote/ctpl-insurance/ctpl/success/');
            } else {
                $errorMessage = $responses->errorMessage;
                session()->flash('message1', $errorMessage);
                return back()->withInput();
            }
        }
    }

    //get A Quote
    public function getquotecompre()
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
        if (session('firstload')) {
        } else {
            session()->flash('firstload', "1");
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
        return view('getaquote.motor.compre.quote', ['title' => $title, 'mvtypes' => $mvtypes, 'provinces' => $province, 'cocogen_fmv_years' => $cocogen_fmv_year, 'cocogen_fmvs' => $cocogen_fmv, 'locations' => $location, 'cocogen_compre_bipds' => $cocogen_compre_bipd, 'accessories' => $accessory, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    function fetch($id)
    {

        $states = DB::table("cocogen_fmv")->where("year", $id)->distinct()->pluck("brand");
        //return json_encode($states);
        return response()->json($states);
    }

    function modelfetch($id)
    {

        $models = DB::table("cocogen_fmv")->where("brand", $id)->distinct()->pluck("model");
        return json_encode($models);
    }
    function fetchtest(Request $request)
    {
        $yearval = $request->get('yearval');
        $brandval = $request->get('brandval');
        $modelval = $request->get('modelval');

        $dependent = "amount";
        $data = DB::table('cocogen_fmv')
            ->where('year', $yearval)
            ->where('brand', $brandval)
            ->where('model', $modelval)
            // ->groupBy($dependent)
            ->get();

        foreach ($data as $row) {
            $output = $row->amount;
        }
        echo $output;
    }

    function fetchmodel(Request $request)
    {

        $yearval = $request->get('yearval');
        $brandval = $request->get('brandval');

        $data = DB::table('cocogen_fmv')
            ->select('model')
            ->where('year', $yearval)
            ->where('brand', $brandval)
            ->where('amount', '<', 5000000)
            ->groupBy('model')
            ->get();
        $dependent = "model";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>' . ucfirst($dependent) . '*</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->model . '">' . $row->model . '</option>';
        }

        echo $output;
    }

    function fetchbrand(Request $request)
    {

        $yearval = $request->get('yearval');


        $data = DB::table('cocogen_fmv')
            ->select('brand')
            ->where('year', $yearval)
            ->where('amount', '<', 5000000)
            ->groupBy('brand')

            ->get();
        $dependent = "brand";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>' . ucfirst($dependent) . '*</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->brand . '">' . $row->brand . '</option>';
        }

        echo $output;
    }

    function fetchcity(Request $request)
    {

        $province = $request->get('province');


        $data = DB::table('location')
            ->select('city')
            ->where('province', $province)
            ->groupBy('city')
            ->get();
        $dependent = "city";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>' . ucfirst($dependent) . '*</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->city . '">' . $row->city . '</option>';
        }

        echo $output;
    }

    function fetchcomprecity(Request $request)
    {

        $province = $request->get('province');

        $data = DB::table('location_compre')
            ->select('city')
            ->where('province', $province)
            ->groupBy('city')
            ->get();
        $dependent = "city";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>' . ucfirst($dependent) . '*</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->city . '">' . $row->city . '</option>';
        }

        echo $output;
    }

    function fetchbarangay(Request $request)
    {

        $city = $request->get('city');


        $data = DB::table('barangay')
            ->select('name')
            ->where('city_id', $city)
            ->groupBy('name')
            ->get();
        $dependent = "barangay";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>' . ucfirst($dependent) . '*</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->name . '">' . $row->name . '</option>';
        }

        echo $output;
    }

    function fetchmvtype(Request $request)
    {
        $policyType = $request->get('policyType');
        $data = DB::table('cocogen_getquote_mvtypes')
            ->select('premType')
            ->where('policy_id', $policyType)
            ->groupBy('premType')
            ->get();
        $dependent = "MV Type";
        $output = '<option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>MV Type *</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->premType . '">' . $row->premType . '</option>';
        }
        echo $output;
    }

    function getprem(Request $request)
    {

        $policyType = $request->get('policyType');
        $CBnEWcAR = $request->get('CBnEWcAR');
        $mvType = $request->get('mvType');

        if ($CBnEWcAR === "1") {
            $select = "YearPrem3";
        } else {
            $select = "YearPrem1";
        }

        $data = DB::table('cocogen_getquote_mvtypes')
            ->select($select)
            ->where('policy_id', $policyType)
            ->where('premType', $mvType)
            ->get();

        foreach ($data as $row) {
            if ($CBnEWcAR === "1") {
                $output = $row->YearPrem3 + 65.40;
            } else {
                $output = $row->YearPrem1 + 65.40;
            }
        }

        echo $output;
    }

    function getpremCd(Request $request)
    {

        $policyType = $request->get('policyType');
        $CBnEWcAR = $request->get('CBnEWcAR');
        $mvType = $request->get('mvType');

        if ($CBnEWcAR === "1") {
            $select = "premtype3";
        } else {
            $select = "premtype1";
        }

        $data = DB::table('cocogen_getquote_mvtypes')
            ->select($select)
            ->where('policy_id', $policyType)
            ->where('premType', $mvType)
            ->get();

        foreach ($data as $row) {
            if ($CBnEWcAR === "1") {
                $output = $row->premtype3;
            } else {
                $output = $row->premtype1;
            }
        }

        echo $output;
    }


    function premfetch(Request $request)
    {
    }

    public function posttoDragonPay($id)
    {

        $compre   = "COMPRE";

        $flagCompre = strstr($id, $compre);
        if ($flagCompre) {
            $cocogen_compre_personalinfo = cocogen_compre_personalinfo::where('tnxid', '=', $id)->get();
            $cocogen_compre_carinfos = cocogen_compre_carinfo::where('tnxid', '=', $id)->get();
            if ($cocogen_compre_carinfos[0]['reqType'] === "1") {
                $totalamount = $cocogen_compre_carinfos[0]['grossPremWithAOM'];
            } else {
                $totalamount = $cocogen_compre_carinfos[0]['grossPrem'];
            }
            //dd($cocogen_compre_personalinfo[0]['emailAddress']);
            $parameters = [
                'txnid' => $id, # Varchar(40) A unique id identifying this specific transaction from the merchant site
                'amount' => $totalamount, # Numeric(12,2) The amount to get from the end-user (XXXX.XX)
                'ccy' => 'PHP', # Char(3) The currency of the amount
                'description' => 11, # Varchar(128) A brief description of what the payment is for
                'email' => $cocogen_compre_personalinfo[0]['emailAddress'], # Varchar(40) email address of customer
                'param1' => "", # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
                'param2' => "", # Varchar(80) [OPTIONAL] value that will be posted back to the merchant url when completed
            ];
            $merchant_account = [
                'merchantid' => env('MERCHANT_ID'),
                'password'   => env('MERCHANT_PASSWORD')
            ];


            // Initialize Dragonpay
            $dragonpay = new Dragonpay($merchant_account);
            // Filter payment channel
            $dragonpay->filterPaymentChannel(Dragonpay::ONLINE_BANK);
            // Set parameters, then redirect to dragonpay
            $dragonpay->setParameters($parameters)->away();
        }
    }
    public function compreonsave(Request $request)
    {

        session()->flash('firstload', "2");
        if (session('grosspremwithAOM')) {
            session()->flash('grosspremwithAOM', session('grosspremwithAOM'));
        }

        if (session('grossprem')) {
            session()->flash('grossprem', session('grossprem'));
        }

        if ($request->get('tabmax')) {
            session()->flash('tabmax', $request->get('tabmax'));
        }

        if ($request->get('totalvalhid')) {
            session()->flash('totalvalhid', $request->get('totalvalhid'));
        }

        if (session('fullname')) {
            session()->flash('fullname', $request->get('fullname'));
        }

        if (session('Address')) {
            session()->flash('Address', $request->get('Address'));
        }

        if (session('contactNo')) {
            session()->flash('contactNo', $request->get('contactNo'));
        }

        if (session('email')) {
            session()->flash('email', $request->get('email'));
        }


        if ($request->get('tnxid')) {
            session()->flash('tnxid', $request->get('tnxid'));
            session()->flash('grosspremwithAOM', str_replace(',', '', $request->get('premWithAOM')));
            session()->flash('grossprem', str_replace(',', '', $request->get('totalValue')));

            $cocogen_compre_carinfos = cocogen_compre_carinfo::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_compre_carinfo', $cocogen_compre_carinfos);

            $cocogen_compre_addtlcarinfo = cocogen_compre_addtlcarinfo::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_compre_addtlcarinfo', $cocogen_compre_addtlcarinfo);

            $cocogen_compre_personalinfo_changeprimary = cocogen_compre_personalinfo_changeprimary::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_compre_personalinfo', $cocogen_compre_personalinfo_changeprimary);
        } else {
        }


        if ($request->get('ViewQuote') === "View Quote") {
            if (!session('tabmax') || session('tabmax') === null) {
                $rules = [
                    'bodilyInjury' => 'required',
                    'propertyDamage' => 'required',
                    'drpYear' => 'required',
                    'brand' => 'required',
                    'model' => 'required',
                    'firstName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'lastName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'middleName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'contactNo' => 'required',
                    'emailAddress' => 'required|email|max:255'

                ];
                $niceNames = [
                    'bodilyInjury' => 'bodily injury',
                    'propertyDamage' => 'property damage',
                    'drpYear' => 'year',
                    'brand' => 'year',
                    'model' => 'model',
                    'firstName' => 'first name',
                    'lastName' => 'last name',
                    'middleName' => 'middle name',
                    'contactNo' => 'contact no',
                    'emailAddress' => 'email address',

                ];
                $this->validate($request, $rules, [], $niceNames);

                $promo = 0;
                $promo_type = "";
                if ($request->get('promoCode')) {
                    $data = DB::table('cocogen_promo')
                        ->select('rate', 'amount', 'type')
                        ->where('effectiveDate', '<', \DB::raw('NOW()'))
                        ->where('expiryDate', '>', \DB::raw('NOW()'))
                        ->where('transType',  "COMPRE")
                        ->where('promo', $request->get('promoCode'))
                        ->where('limit_usage', '>', 0)
                        ->get();
                    if (count($data) === 0) {
                        //session()->flash('promoCodeError',"Error");
                        return back()->withInput()->with('promoCodeError', "Incorrect promo code");
                    } else {
                        foreach ($data as $val) {
                            $promo_type = $val->type;
                            if ($promo_type === "A") {
                                $promo = $val->amount;
                            } else {
                                $promo = $val->rate;
                            }
                        }
                    }
                }

                $amountAcct = 0;
                if ($request->accessory) {
                    $countsaccessory = $request->accessory;
                    $count = count($countsaccessory);
                    for ($i = 0; $i < $count; $i++) {
                        if (!$request->accessoryValue[$i]) {
                            $accamounts = 0;
                        } else {
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
                $deductible =  $defaultValue * 0.005;
                if ($deductible < 2000) {
                    $deductible = 2000;
                }
                $ODTheftPrem =  $defaultValue * 0.0125;
                $actsOfNaturePrem =  $defaultValue * 0.005;
                $netPrem = $propertyDamagePrem[0]['pd'] + $bodilyInjuryPrem[0]['bi'] + $ODTheftPrem;


                $dst = (ceil($netPrem / 4) * 0.5);
                $vat = $netPrem * 0.12;
                $lgt = $netPrem * 0.002;
                $totaltax = $dst + $vat + $lgt;
                $grossprem = $netPrem + $totaltax;
                if ($request->get('promoCode')) {

                    if ($promo_type === "A") {
                        $finalgrossprem =  $grossprem - $promo;
                    } else {
                        $finalgrossprem =  $grossprem - ($grossprem * ($promo / 100));
                    }
                } else {
                    $finalgrossprem =  $grossprem;
                }
                $netPremwithAOM = $propertyDamagePrem[0]['pd'] + $bodilyInjuryPrem[0]['bi'] + $ODTheftPrem + $actsOfNaturePrem;

                //with AOM
                $deductible =  $defaultValue * 0.005;
                if ($deductible < 2000) {
                    $deductible = 2000;
                }
                $dstwithAOM =  (ceil($netPremwithAOM / 4) * 0.5);
                $vatwithAOM = $netPremwithAOM * 0.12;
                $lgtwithAOM = $netPremwithAOM * 0.002;
                $totaltaxwithAOM = $dstwithAOM + $vatwithAOM + $lgtwithAOM;
                $grosspremwithAOM = $netPremwithAOM + $totaltaxwithAOM;
                if ($request->get('promoCode')) {
                    if ($promo_type === "A") {
                        $finalgrosspremwithAOM =  $grosspremwithAOM - $promo;
                    } else {
                        $finalgrosspremwithAOM =  $grosspremwithAOM - ($grosspremwithAOM * ($promo / 100));
                    }
                } else {
                    $finalgrosspremwithAOM =  $grosspremwithAOM;
                }

                session()->flash('grosspremwithAOM', str_replace(',', '', $grosspremwithAOM));
                session()->flash('grossprem', str_replace(',', '', $grossprem));

                $cocogen_compre_carinfo = new cocogen_compre_carinfo;
                $cocogen_compre_carinfo->year = $request->get('drpYear');
                $cocogen_compre_carinfo->brand = $request->get('brand');
                $cocogen_compre_carinfo->model = $request->get('model');
                $cocogen_compre_carinfo->default_value =  $defaultValue;
                $cocogen_compre_carinfo->propertyDamage = str_replace(',', '', $request->get('propertyDamage'));
                $cocogen_compre_carinfo->propertyDamagePrem = $propertyDamagePrem[0]['pd'];
                $cocogen_compre_carinfo->bodilyInjury = str_replace(',', '', $request->get('bodilyInjury'));
                $cocogen_compre_carinfo->bodilyInjuryPrem = $bodilyInjuryPrem[0]['bi'];
                if ($request->get('promoCode')) {
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
                $cocogen_compre_carinfo_tnxid->tnxid = "MC-MNCN-COMPRE-" . date('y') . "-" . $inserted_id . "-00";
                $cocogen_compre_carinfo_tnxid->save();


                $cocogen_compre_personalinfo = new cocogen_compre_personalinfo;
                $cocogen_compre_personalinfo->firstName = $request->get('firstName');
                $cocogen_compre_personalinfo->lastName = $request->get('lastName');
                $cocogen_compre_personalinfo->tnxid = "MC-MNCN-COMPRE-" . date('y') . "-" . $inserted_id . "-00";
                $cocogen_compre_personalinfo->middleName = $request->get('middleName');
                $cocogen_compre_personalinfo->contactNo = $request->get('contactNo');
                $cocogen_compre_personalinfo->emailAddress = $request->get('emailAddress');
                $cocogen_compre_personalinfo->save();

                if ($request->accessory) {
                    $countsaccessory = $request->accessory;
                    $count = count($countsaccessory);
                    $amountAcct = 0;
                    $accamounts = 0;
                    for ($i = 0; $i < $count; $i++) {

                        if (!$request->accessoryValue[$i]) {
                            $accamounts = 0;
                        } else {
                            $accamounts += str_replace(',', '', $request->accessoryValue[$i]);
                        }
                        if ($request->accessory[$i]) {
                            // if($request->accessory[$i] === "Others"){
                            //     $accessoryfinal = $request->otherAccessory[$i];
                            // }else{
                            $accessoryfinal = $request->accessory[$i];
                            //}
                        }
                        $cocogen_compre_accessory_trans = new cocogen_compre_accessory_trans;
                        $cocogen_compre_accessory_trans->tnxid = "MC-MNCN-COMPRE-" . date('y') . "-" . $inserted_id . "-00";
                        $cocogen_compre_accessory_trans->accessory = $accessoryfinal;
                        $cocogen_compre_accessory_trans->amount = $accamounts;
                        $cocogen_compre_accessory_trans->save();
                        //$amountAcct += $accamounts;
                    }
                }

                session()->flash('tnxid', "MC-MNCN-COMPRE-" . date('y') . "-" . $inserted_id . "-00");
                $cocogen_compre_carinfos = cocogen_compre_carinfo::where('id', '=', $inserted_id)->get();
                session()->flash('cocogen_compre_carinfo', $cocogen_compre_carinfos);
                session()->flash('tabmax', 2);
            }


            $tab = "tab2viewquote";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('ViewQuoteBack') === "Back") {

            $tab = "tab2viewQuoteBack";
            return back()->withInput()->with('tab', $tab);
        }
        if ($request->get('ViewQUoteNext') === "Next") {

            session()->flash('tabmax', 3);
            if ($request->get('premWithAOM') != 1 && $request->get('premWithOutAOM') != 1) {
                session()->flash('tab', "tab2viewquote");
                $message = "Please select Plan";
                return back()->withInput()->with('message', $message);
            }
            if ($request->get('premWithAOM')) {
                $reqtype = "1";
            } else {
                $reqtype = "0";
            }
            $cocogen_compre_carinfo_changeprimary = cocogen_compre_carinfo_changeprimary::findorFail($request->get('tnxid'));
            $cocogen_compre_carinfo_changeprimary->reqType =   $reqtype;
            $cocogen_compre_carinfo_changeprimary->save();

            $cocogen_compre_personalinfo_changeprimary = cocogen_compre_personalinfo_changeprimary::where('tnxid', '=', $request->get('tnxid'))->get();
            session()->flash('cocogen_compre_personalinfo', $cocogen_compre_personalinfo_changeprimary);
            $tab = "tab2additinalInfo";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('CompreSecondTabBack') === "Back") {

            $tab = "tab2viewquote";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('CompreSecondTabNext') === "Next") {

            session()->flash('tnxid', $request->get('tnxid'));

            if (session('tabmax') <= 3) {

                $rules = [
                    'plateNo' => 'required',
                    'engineNO' => 'required',
                    'bodyType' => 'required',
                    'Color' => 'required',
                    'chassisNo' => 'required',
                    'seatNo' => 'required'
                ];

                $niceNames = [
                    'plateNo' => 'plate no',
                    'engineNO' => 'engine no',
                    'bodyType' => 'body type',
                    'Color' => 'color',
                    'chassisNo' => 'chassis no',
                    'seatNo' => 'Authorized seating capacity'
                ];
                $this->validate($request, $rules, [], $niceNames);
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
                if ($request->get('policyPeriod')) {
                    $cocogen_compre_addtlcarinfo->inceptDate = $request->get('policyPeriod');
                }
                $cocogen_compre_addtlcarinfo->save();
                $inserted_id = $cocogen_compre_addtlcarinfo->id;

                $autoPA = (55000 * $request->get('seatNo'));
                $cocogen_compre_carinfo_changeprimary = cocogen_compre_carinfo_changeprimary::findorFail($request->get('tnxid'));
                $cocogen_compre_carinfo_changeprimary->autoPA  = $autoPA;
                $cocogen_compre_carinfo_changeprimary->save();


                $cocogen_compre_addtlcarinfos = cocogen_compre_addtlcarinfo::where('id', '=', $inserted_id)->get();
                session()->flash('cocogen_compre_carinfo', $cocogen_compre_addtlcarinfos);
                session()->flash('tabmax', 4);
            }



            $tab = "tab3PersonalInfo";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('CompreThirdTabBack') === "Back") {
            $tab = "CompreThirdTabBack";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('CompreThirdTabNext') === "Next") {
            if (session('tabmax') <= 4) {
                $rules = [
                    'birthDate' => 'required|date_format:Y-n-j|before:-18 years',
                    'province' => 'required',
                    'city' => 'required',
                    'Address' => 'required',

                ];
                $niceNames = [

                    'birthDate' => 'birthdate',
                    'province' => 'province',
                    'city' => 'city',
                    'Address' => 'address',

                ];
                $this->validate($request, $rules, [], $niceNames);
                $cocogen_compre_personalinfo_changeprimary = cocogen_compre_personalinfo_changeprimary::findorFail($request->get('tnxid'));
                $cocogen_compre_personalinfo_changeprimary->birthDate = $request->get('birthDate');
                $cocogen_compre_personalinfo_changeprimary->province = $request->get('province');
                $cocogen_compre_personalinfo_changeprimary->city = $request->get('city');
                $cocogen_compre_personalinfo_changeprimary->Address = $request->get('Address');
                $cocogen_compre_personalinfo_changeprimary->save();
                $fullname = $request->get('firstName') . " " .  $request->get('middleName') . " " .  $request->get('lastName');
                session()->flash('Address', $request->get('Address'));
                session()->flash('tabmax', 5);
            }

            $tab = "CompreThirdTabNext";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('ComprefourthTabBack') === "Back") {
            $tab = "ComprefourthTabBack";
            return back()->withInput()->with('tab', $tab);
        }

        if ($request->get('ComprefourthTabBuy') === "Buy") {

            if ($request->get('CBPrivacy') != 1) {
                session()->flash('tab', "CompreThirdTabNext");
                $message = "Please accept our Privacy Policy before proceeding to payment.";
                return back()->withInput()->with('message', $message);
            }

            if ($request->get('CBTerms') != 1) {
                session()->flash('tab', "CompreThirdTabNext");
                $message = "Please accept our Terms & Conditions before proceeding to payment.";
                return back()->withInput()->with('message', $message);
            }

            if ($request->get('CBExclusion') != 1) {
                session()->flash('tab', "CompreThirdTabNext");
                $message = "Please accept our Exclusion & Limitations before proceeding to payment.";
                return back()->withInput()->with('message', $message);
            }

            if ($cocogen_compre_carinfos[0]['reqType'] === "1") {
                $totamount = $cocogen_compre_carinfos[0]['finalDueWithAOM'];
            } else {
                $totamount = $cocogen_compre_carinfos[0]['finalDue'];
            }

            $magilasdonation = 0;
            if ($request->get('CBMagilas')) {
                if ($request->get('drpMagilas') === "Others") {
                    if ($request->get('otherMagilas')) {
                        $magilasdonation = str_replace(',', '', $request->get('otherMagilas'));
                    }
                } else {
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


    public function register()
    {
        $title = "COCOGEN Insurance";

        return view('auth.register', ['title' => $title]);
    }
}
