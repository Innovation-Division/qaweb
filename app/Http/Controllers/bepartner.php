<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_meta;
use App\Models\cocogen_beapartner_trans;
use App\Models\cocogen_beapartner_upload;
use App\Models\cocogen_admin_emailtemplate;
use Mail;


class bepartner extends Controller
{
    public function bepartner()
    {

        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
      
        $cocogen_meta = cocogen_meta::where('page', '=', "Be a Partner")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        return view('aboutus.bepartner', ['title' => $title, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_productlink' => $cocogen_admin_productlink,  'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);
    }

    public function epartnersave(Request $request)
    {
    
        $rules = [
            'fName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'lName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'mobileNumber' => 'required',
            'email' => 'required|email',
            'filename' => 'required'
        ];
        $niceNames = [
            'fName' => 'first name',
            'lName' => 'last name',
            'mobileNumber' => 'contact number',
            'email' => 'email',
            'fName' => ''
        ];
        $this->validate($request, $rules, [], $niceNames);

        if ($request->file('filename')) {
            request()->validate([
                'filename' => 'required|file|mimes:pdf,PDF,doc,docx|max:2048',
            ]);
        }
        //licensed
        $tag = "No";
        if($request->get('licensed')){
            $tag = $request->get('licensed');
        }
        $getRealPath = $request->file('filename')->getRealPath();
        $getClientOriginalName = $request->file('filename')->getClientOriginalName();
        $getMimeType = $request->file('filename')->getMimeType();
        $cocogen_beapartner_trans = new cocogen_beapartner_trans;
        $cocogen_beapartner_trans->firstName  = $request->get('fName');
        $cocogen_beapartner_trans->lastName  = $request->get('lName');
        $cocogen_beapartner_trans->contactNo  = $request->get('mobileNumber');
        $cocogen_beapartner_trans->email  = $request->get('email');
        $cocogen_beapartner_trans->licensedAgent  = $tag;
        $cocogen_beapartner_trans->save();
        $inserted_id = $cocogen_beapartner_trans->id;

        if ($inserted_id) {
            if ($request->file('filename')) {
                if ($request->file('filename')->isValid()) {
                    $cocogen_beapartner_upload = new cocogen_beapartner_upload;
                    $cocogen_beapartner_upload->filename = $request->file('filename')->hashName();
                    $cocogen_beapartner_upload->extension = $request->file('filename')->extension();
                    $cocogen_beapartner_upload->filesize = $request->file('filename')->getSize();
                    $cocogen_beapartner_upload->location = $request->file('filename')->store('bepartnerfiles', ['disk' => 'public']);
                    $cocogen_beapartner_upload->careerTransID = $inserted_id;
                    $cocogen_beapartner_upload->save();
                }
            }
        }

        $cocogen_admin_emailtemplate = cocogen_admin_emailtemplate::where('id', '=', 11)->get();
        $fullName = $request->get('fName') . " " . $request->get('lName');
        $bodytaginternatl = str_replace("templatefname", $fullName, $cocogen_admin_emailtemplate[0]['content']);
        $bodytaginternatl = str_replace("templatemail", $request->get('email'), $bodytaginternatl);
        $bodytaginternatl = str_replace("templattag", $tag, $bodytaginternatl);
        $bodytaginternatl = str_replace("templatemobileNumber", $request->get('mobileNumber'), $bodytaginternatl);

        //$this->emailsendcareers($bodytagexternal, $request->get('email'),$request->get('positionApplied'));
        // $this->emailsendcareersint($bodytaginternatl,$getRealPath, $getClientOriginalName, $getMimeType,$fullName);

        $status_message = "Thank you for your application! Our team will review your qualifications and get in touch with you.";
        return back()->withInput()->with('message', $status_message);
    }

    public function emailsendcareersint($content, $getRealPath, $getClientOriginalName, $getMimeType,$fullName)
    {
        $data = array('content' => $content,'fullName' => $fullName);
        Mail::send('emailtemplate.careersInternal', $data, function ($message) use ($content,  $getRealPath, $getClientOriginalName, $getMimeType, $fullName) {
            $message->to("kristine_tiu@cocogen.com", 'COCOGEN')->subject('New Application: ' . $fullName)->from('cocogen@cocogen.com', 'COCOGEN');
            $message->attach($getRealPath, array(
                'as'    => $getClientOriginalName,
                'mime'  => $getMimeType
            ));
        });
    }


}
