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
                                <h2 class="mb-5 mrfs-1-2 mrfs-lg-1-12">Invalid Request!</h2>
                            </div>

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
                                    {{session('message')}} in  <span id="counter">10</span> second(s),<a href="http://cocogentest.cocogen.com.ph/epolicy"> click here</a>.

                                    <script type="text/javascript">
                                    function countdown() {
                                        var i = document.getElementById('counter');
                                        if (parseInt(i.innerHTML)<=0) {
                                            location.href = 'http://cocogentest.cocogen.com.ph/epolicy';
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
