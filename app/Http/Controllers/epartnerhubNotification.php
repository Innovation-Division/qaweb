<?php

namespace App\Http\Controllers;
use App\Models\cocogen_epartnerhub_notificatons;
use Illuminate\Http\Request;

class epartnerhubNotification extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function get_notification(Request $request)
    {       
        $cocogen_epartnerhub_notificatons = cocogen_epartnerhub_notificatons::where('email', \Auth::user()->email)->take(5)->orderBy('status', 'desc')->orderBy('id', 'desc')->get();     
        return response()->json($cocogen_epartnerhub_notificatons, 201);        
    }

    public function update_notification(Request $request)
    {       
        // $cocogen_epartnerhub_notificatons = cocogen_epartnerhub_notificatons::where('email', \Auth::user()->email)->take(5)->orderBy('status', 'desc')->orderBy('id', 'desc')->get();     
        // return response()->json($cocogen_epartnerhub_notificatons, 201);   
        
        cocogen_epartnerhub_notificatons::where('email', '=', \Auth::user()->email)->where('status', '=', 'Unread')->update(['status' => 'Read']);

    }
}
