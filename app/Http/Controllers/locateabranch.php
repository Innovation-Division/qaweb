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
use App\Models\cocogen_admin_branch;
use App\Models\cocogen_admin_shop;

class locateabranch extends Controller
{
    public function branchlocator($id = null)
    {
        if ($id) {
            $cocogen_admin_branch = cocogen_admin_branch::where('region', '=', $id)->orderBy('name', 'ASC')->get();
            $cocogen_admin_branchs = cocogen_admin_branch::select('id', 'lat', 'lng', 'name', 'address')->orderBy('name', 'ASC')->where('region', '=', $id)->get();
        } else {
            $cocogen_admin_branch = cocogen_admin_branch::orderBy('name', 'ASC')->get();
            $cocogen_admin_branchs = cocogen_admin_branch::select('id', 'lat', 'lng', 'name', 'address')->orderBy('name', 'ASC')->get();
        }

        $cocogen_admin_branch_json = json_encode($cocogen_admin_branchs);
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Locate a Branch")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('inquiries.branchlocator', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_branch' => $cocogen_admin_branch, 'cocogen_admin_branch_json' => $cocogen_admin_branch_json, 'id' => $id]);
    }

    public function locateashop($id = null)
    {
        if ($id) {
            $cocogen_admin_shop = cocogen_admin_shop::where('region', '=', $id)->orderBy('name', 'ASC')->get();
            $cocogen_admin_shops = cocogen_admin_shop::select('id', 'lat', 'lng', 'name', 'address')->orderBy('name', 'ASC')->where('region', '=', $id)->get();
        } else {
            $cocogen_admin_shop = cocogen_admin_shop::get();
            $cocogen_admin_shops = cocogen_admin_shop::select('id', 'lat', 'lng', 'name', 'address')->orderBy('name', 'ASC')->get();
        }

        $cocogen_admin_shop_json = json_encode($cocogen_admin_shops);

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "Locate a Branch")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('services.locateashop', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_shop' => $cocogen_admin_shop, 'cocogen_admin_shop_json' => $cocogen_admin_shop_json, 'id' => $id]);
    }
}
