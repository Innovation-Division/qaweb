<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\occupation;
use App\Models\cocogen_product_link;
use App\Models\cocogen_product_line;
use App\Models\cocogen_meta;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_footer;
use Mail;
use App\Models\cocogen_general_inquiries;

class inquiry extends Controller
{
    public function generalinquiry()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "General Inquiry")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $cocogen_product_line = cocogen_product_line::where('status', '=', "Yes")
            ->orderBy('line', 'asc')
            ->get();
        return view('inquiries.productinquiry', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_product_lines' => $cocogen_product_line, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function success()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "General Inquiry")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $cocogen_product_line = cocogen_product_line::where('status', '=', "Yes")
            ->orderBy('line', 'asc')
            ->get();
        return view('inquiries.success', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_product_lines' => $cocogen_product_line, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function successproduct()
    {
        if (empty(session('message'))) {
            $id = 0;
        } else {
            $id = session('message');
        }

        if (empty(session('product'))) {
            $product = 0;
        } else {
            $product = session('product');
        }
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "General Inquiry")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        $cocogen_product_line = cocogen_product_line::where('status', '=', "Yes")
            ->orderBy('line', 'asc')
            ->get();
        return view('inquiries.success_product', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_product_lines' => $cocogen_product_line, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'id' => $id, 'product' => $product]);
    }

    public function productinquirysave(Request $request)
    {

        $rules = [
            'topic' => 'required'
        ];
        $niceNames = [
            'topic' => 'Topic',
        ];
        $this->validate($request, $rules, [], $niceNames);

        if ($request->get('topic') === "Product Inquiry") {
            $rules = [
                'product' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'message' => 'required'
            ];
            $niceNames = [
                'product' => 'product',
                'first_name' => 'first name',
                'last_name' => 'last name',
                'email_address' => 'email',
                'message' => 'message'
            ];
        } else {
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'message' => 'required'
            ];
            $niceNames = [
                'first_name' => 'first name',
                'last_name' => 'last name',
                'email_address' => 'email',
                'message' => 'message'
            ];
        }
        $this->validate($request, $rules, [], $niceNames);
        $fullName = $request->get('first_name') . ' ' . $request->get('last_name');
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));


        $cocogen_general_inquiries = new cocogen_general_inquiries;
        $cocogen_general_inquiries->topic  = $request->get('topic');
        if ($request->get('topic') === "Product Inquiry") {
            $cocogen_general_inquiries->product  = $request->get('product');
        }
        $cocogen_general_inquiries->name  = $fullName;
        $cocogen_general_inquiries->email  = $request->get('email_address');
        $cocogen_general_inquiries->type  = "External";
        $cocogen_general_inquiries->message  = $request->get('message');
        $cocogen_general_inquiries->created_at  = $datenow;
        $cocogen_general_inquiries->updated_at  = $datenow;
        $cocogen_general_inquiries->save();

        if ($request->get('topic') === "Product Inquiry") {
            $cocogen_product_line = cocogen_product_line::where('line', '=', $request->get('product'))->get();
            $con_no = "";
            if (count($cocogen_product_line) > 0) {
                $con_no = ($cocogen_product_line[0]['con_no']);
            }
            $product  = $request->get('product');
            $message = $cocogen_general_inquiries->id;
            $this->emailsendproductinquireies($fullName, $request->get('email_address'), $request->get('topic'), $product, $request->get('message'));
            return redirect('/send-inquiry/product/success/' . $product)->with('message', $message)->with('product', $product)->with('con_no', $con_no);
        } else {
            $product  = "";
            $message = $cocogen_general_inquiries->id;
            $this->emailsendproductinquireies($fullName, $request->get('email_address'), $request->get('topic'), $product, $request->get('message'));
            return redirect('/send-inquiry/success/')->with('message', $message);
        }
    }

    public function productinquiryproducts($product)
    {

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();

        $cocogen_meta = cocogen_meta::where('page', '=', "General Inquiry")->get();
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
        // return view('inquiries.productinquirywithproductvariable', ['title' => $title, 'cocogen_product_lines' => $cocogen_product_line, 'occupations' => $occupation, 'product' => $product, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
        return view('inquiries.productinquiry', ['title' => $title, 'cocogen_product_lines' => $cocogen_product_line, 'occupations' => $occupation, 'product' => $product, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer]);
    }

    public function productinquirysavewithviar(Request $request)
    {

        $rules = [
            'topic' => 'required'
        ];
        $niceNames = [
            'topic' => 'Topic',
        ];
        $this->validate($request, $rules, [], $niceNames);

        if ($request->get('topic') === "Product Inquiry") {
            $rules = [
                'product' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'message' => 'required'
            ];
            $niceNames = [
                'product' => 'product',
                'first_name' => 'first name',
                'last_name' => 'last name',
                'email_address' => 'email',
                'message' => 'message'
            ];
        } else {
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'message' => 'required'
            ];
            $niceNames = [
                'first_name' => 'first name',
                'last_name' => 'last name',
                'email_address' => 'email',
                'message' => 'message'
            ];
        }
        $this->validate($request, $rules, [], $niceNames);

        if ($request->get('topic') === "Product Inquiry") {
            $product  = $request->get('product');
        } else {
            $product  = "";
        }

        $fullName = $request->get('first_name') . ' ' . $request->get('last_name');
        $datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        $cocogen_general_inquiries = new cocogen_general_inquiries;
        $cocogen_general_inquiries->topic  = $request->get('topic');
        if ($request->get('topic') === "Product Inquiry") {
            $cocogen_general_inquiries->product  = $request->get('product');
        }
        $cocogen_general_inquiries->name  = $fullName;
        $cocogen_general_inquiries->email  = $request->get('email_address');
        $cocogen_general_inquiries->message  = $request->get('message');
        $cocogen_general_inquiries->type  = "External";
        $cocogen_general_inquiries->created_at  = $datenow;
        $cocogen_general_inquiries->updated_at  = $datenow;
        $cocogen_general_inquiries->save();

        if ($request->get('topic') === "Product Inquiry") {
            $product  = $request->get('product');
        } else {
            $product  = "";
        }

        $cocogen_product_line = cocogen_product_line::where('line', '=', $request->get('product'))->get();
        $con_no = "";
        if (count($cocogen_product_line) > 0) {
            $con_no = ($cocogen_product_line[0]['con_no']);
        }
        $message = $cocogen_general_inquiries->id;

        $this->emailsendproductinquireies($fullName, $request->get('email_address'), $request->get('topic'), $product, $request->get('message'));
        // return redirect('/send-inquiry/success/');
        return redirect('/send-inquiry/product/success/' . $product)->with('message', $message)->with('product', $product)->with('con_no', $con_no);
    }

    public function emailsendproductinquireies($fname, $email, $topic, $product, $message1)
    {
        $data = array('fname' => $fname, 'email' => $email, 'topic' => $topic, 'product' => $product, 'message1' => $message1);
        Mail::send('emailtemplate.generalinquiryinternal', $data, function ($message) use ($fname, $email, $topic, $product, $message1) {
            $message->to("client_services@cocogen.com", 'COCOGEN')->subject('General Inquiry: ' . $topic);
        });
        // Mail::send('emailtemplate.generalinquiryinternal', $data, function ($message) use ($fname, $email, $topic, $product, $message1) {
        //     $message->to("xmancovid@gmail.com", 'COCOGEN')->subject('General Inquiry: ' . $topic);
        // });
    }

    public function redirectToSendInquiry()
    {
        return redirect('/send-inquiry');
    }

    public function sendToSendInquirywParam($product)
    {

        return redirect('/send-inquiry/' . $product);
    }
}
