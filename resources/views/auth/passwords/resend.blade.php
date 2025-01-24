@extends('layouts.cgen')

@section('stylesheet')
<link rel="stylesheet/less" type="text/css" href="{{ asset('assets/css/sign-in.less') }}" />
@endsection

@section('content')
<div class="sign-in sign-in-partner content-wrapper">
    <div class="inner">
        <div class="container-fluid breadcrumb-container pt-3 d-none d-lg-block">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Activate Your Account</li>
                </ol>
            </nav>
        </div>
        <section class="sign-in-content">
            <div class="container pt-4 pt-md-5">

                <div class="sign-in-board mx-auto">
                    <div class="sign-in-form">
                        <div class="mt-0 mt-lg-3">
                            <div class="text-center">
                                <h2 class="mb-5 mrfs-1-2 mrfs-lg-1-12">Activate Your Account</h2>
                            </div>
                            <p class="text-center">If you have not activated your account yet, please enter your email address below. Note that the activation link sent to your inbox will expire within 24 hours.</p>

                            @if ($errors->first('email') ===  "This field is required." )
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                    <i class="fa fa-times-circle"></i>
                                    The email address is required!
                                </div>
                            </div>
                            @elseif ($errors->has('email'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                    <i class="fa fa-times-circle"></i>
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                            @endif

                            @if(session('message'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <div>
                                    <i class="fa fa-check-circle"></i>
                                    {{session('message')}}
                                </div>
                            </div>
                            @endif

                            @if(session('messagefailed'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                    <i class="fa fa-times-circle"></i>
                                    {{session('messagefailed')}}
                                </div>
                            </div>
                            @endif

                            <form class="mb-3 form-default" method="POST" action="{{ route('resendpasswordsave') }}">
                                @csrf
                                <input name="form_key" type="hidden" value="Jw9Lv4O4rXKWO6fq">
                                <div>
                                    <div class="@if ($errors->has('email') && $errors->first('email') === 'This email field is required.') invalid invalid-required @endif">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="text" name="email" placeholder="Email Address *" value="" id="email" class="form-control required-entry validate-email" title="Email Address">
                                    </div>
                                </div>
                                <div>
                                    <div class="submitButton text-center my-4">
                                        <button type="submit" class="btn btn-secondary" title="Click to resend activation link if you have not activated your account yet" name="send" id="send2">
                                                            Resend Activation Link</button>
                                    </div>
                                </div>
                            </form>
                            <div class="links mt-0 mt-lg-5 text-center text-lg-start">
                                <a href="{{ url('/epolicy')}}">
                                << Back to Login
                                </a>
                            </div>
                            <!-- <li class="forgot-password"><a href="{{ url('/epolicy')}}">
                                    << Back to Login</a>
                            </li>
                            <li class="e-policy-link" style="display: none;"><span>For UCPB GEN policyholders who
                                    have been issued an ePolicy link via email, you may access your accounts through
                                    this <a href="https://www.ucpbgen.com/login/login_epolicy.aspx">link</a>.</span>
                            </li> -->
                        </div>
                    </div>
                </div>


                <div class="footnote">
                    <p class="mrfs-1 text-center">
                    Your security is our prime concern and we work hard to ensure the safety of online transactions done at our website.<br />UCPB GEN implements best security practices to protect your account information. Your privacy is important to us and we do not solicit client information to other third parties.Click the security badge above to view site security information.
                    </p>
                </div>

            </div>
        </section>
    </div>
</div>       
@endsection
