<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_meta;
use DB;

class searchcontroller extends Controller
{
    public function customsearch(Request $request){

       

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
        //$cocogen_search = cocogen_search::where('status', '=', "A")->get(); 
        $cocogen_search = DB::select('SELECT id,name,link,content,"Product" as category FROM `cocogen_admin_pages_products` WHERE `active` = "Y"
        union
        SELECT id,name,link,content,"News" as category FROM `cocogen_admin_pages_news` WHERE `active` = "Y" 
        union
        SELECT id,name,link,content,"Blog" as category FROM `cocogen_admin_pages_blogs` WHERE `active` = "Y" 
        union
        SELECT cocogen_admin_pages.id,cocogen_admin_pages.name,cocogen_admin_pages.link,cocogen_admin_pages.content,
        CASE
            WHEN cocogen_search.category is  NULL THEN "Others"
            ELSE cocogen_search.category
        END as category  FROM cocogen_admin_pages  left outer join cocogen_search on cocogen_search.link = cocogen_admin_pages.link WHERE cocogen_admin_pages.active = "Y" and cocogen_admin_pages.category = "Page"');
        return view('search', ['title' => $title,'search' => $search, 'cocogen_searchs' => $cocogen_search,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }
}
