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
                    <li class="breadcrumb-item" aria-current="page">Activate Account</li>
                </ol>
            </nav>
        </div>
        <section class="sign-in-content">
            <div class="container pt-4 pt-md-5">

                <div class="sign-in-board mx-auto">
                    <div class="sign-in-form">
                        <div class="mt-0 mt-lg-3">
                            <div class="text-center">
                                <h2 class="mb-5 mrfs-1-2 mrfs-lg-1-12">Activate Account</h2>
                            </div>
                            <p class="text-center">To access your online account, please nominate a password below:</p>

                            @if($errors->has('password'))
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <div class="error-msg">
                                        <i class="fa fa-times-circle"></i>
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>
                            @elseif ($errors->has('confirmation'))
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                    <i class="fa fa-times-circle"></i>
                                    {{ $errors->first('confirmation') }}
                                </div>
                            </div>
                            @endif

                            @if(session('message'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                <i class="fa fa-check-circle"></i> 
                                    {{session('message')}} in  <span id="counter">10</span> second(s),<a href="https://www.cocogen.com/epolicy"> click here</a>.

                                    <script type="text/javascript">
                                    function countdown() {
                                        var i = document.getElementById('counter');
                                        if (parseInt(i.innerHTML)<=0) {
                                            location.href = 'https://www.cocogen.com/epolicy';
                                        }
                                    if (parseInt(i.innerHTML)!=0) {
                                        i.innerHTML = parseInt(i.innerHTML)-1;
                                    }
                                    }
                                    setInterval(function(){ countdown(); },1000);
                                    </script>
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

                            <form class="mb-3 form-default" method="POST" action="{{ route('reset_passwordsave') }}">
                                @csrf
                                <input name="form_key" type="hidden" value="Jw9Lv4O4rXKWO6fq">
                                <div class="mb-3">
                                    <div class="@if ($errors->has('email') && $errors->first('email') === 'This email field is required.') invalid invalid-required @endif">
                                        <label for="email" class="form-label">New Password*</label>
                                        <input type="password" name="password" placeholder="New Password *" value="" id="password" class="form-control required-entry validate-email" title="Password">
                                    </div>
                                </div>
                                <div >
                                    <div class="@if ($errors->has('email') && $errors->first('email') === 'This email field is required.') invalid invalid-required @endif ">
                                        <label for="confirmation" class="form-label">Confirm New Password*</label>
                                        <input type="password" name="confirmation" placeholder="Confirm New Password *" value="" id="confirmation" class="form-control required-entry validate-email" title="Confirm Password">
                                    </div>
                                </div>
                                <div>
                                    <div class="submitButton text-center my-4">
                                        <button type="submit" class="btn btn-secondary" title="Login" name="send" id="send2">
                                            Proceed</button>
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
