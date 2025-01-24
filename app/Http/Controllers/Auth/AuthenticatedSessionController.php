<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_meta;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // return view('auth.login');

        $cocogen_admin_footer = cocogen_admin_footer::all();
        
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_meta = cocogen_meta::where('page', '=', "E-POLICY")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];
        // dd($keyword);
        return view('auth.login', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_footer' => $cocogen_admin_footer, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_subchild' => $cocogen_admin_subchild]);


    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
