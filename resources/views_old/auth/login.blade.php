@extends('layouts.cgen')

@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('assets/css/signin.css') }}" /> 
@endsection

@section('content')
    <div class="sign-in content-wrapper">
        <div class="inner">
            <div class="container-fluid breadcrumb-container pt-3 d-none d-lg-block">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb rfs-1-5">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Sign In</li>
                    </ol>
                </nav>
            </div>
            <section class="sign-in-content">
                <div class="container pt-4 pt-md-5">
                    <div class="row align-items-start align-items-lg-center">
                        <div class="col-12 col-md-6 pt-0 pt-md-5 pt-lg-0">
                            <div class="text-content text-center text-md-start" id="sign-in-partner">
                                <p class="mrfs-1-10 mrfs-md-2-12 mrfs-lg-3-12 ff-light">
                                    Power up your <br class="d-none d-lg-inline" />Cocogen <br class="d-inline d-md-none" />business with ePartner Hub
                                </p>
                                <p class="mrfs-1 mrfs-md-1-5 mrfs-lg-1-17 lh-sm">View production reports, manage policy renewals and send payment links to clients</p>
                            </div>
                            <div class="text-content text-center text-md-start" id="sign-in-policyholder" style="display:none;">
                                <p class="mrfs-1-10 mrfs-md-2-12 mrfs-lg-3-12 ff-light">
                                    Access your Cocogen <br class="d-none d-lg-inline" />Insurance policies with ePolicy
                                </p>
                                <p class="mrfs-1 mrfs-md-1-5 mrfs-lg-1-17 lh-sm">Manage your account information, view policies, and pay insurance premiums online.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                            <div class="sign-in-board">
                                <div class="sign-in-type">
                                    <a href="#" data-container="sign-in-policyholder">Sign in as Policyholder</a>
                                    <a href="#" data-container="sign-in-partner">Sign in as Partner</a>
                                </div>
                                <div class="sign-in-form">
                                    <div class="mt-0 mt-lg-3">
                                        <h2 class="mb-5 mrfs-1-2 mrfs-lg-1-12">Welcome</h2>

                                        @if ($errors->has('source'))
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <div>
                                                    <i class="fa fa-times-circle"></i>
                                                    {{ $errors->first('source') }}
                                                </div>
                                            </div>

                                        @elseif ( $message = session('errormessage') )
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <div>
                                                    <i class="fa fa-times-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @elseif($errors->has('email'))
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <div class="error-msg">
                                                    <i class="fa fa-times-circle"></i>
                                                    {{ $errors->first('email') }}
                                                </div>
                                            </div>
                                        @endif

                                        <form class="mb-3 form-default" method="POST" action="{{ url('/login') }}">
                                            <input type="hidden" id="source" name="source" value="{{ old('source') }}">
                                            @csrf
                                            <div class="mb-4">
                                                <div class="@if ($errors->has('email') && $errors->first('email') === 'This email field is required.') invalid invalid-required @endif">
                                                    <label for="email" class="form-label">Email*</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email*" value="{{ old('email') }}"/>
                                                    @if ($errors->has('email') && $errors->first('email') === 'This email field is required.')
                                                        <span class="feedback"> {{ $errors->first('email') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <div class="@if ($errors->has('password')) invalid invalid-required @endif">
                                                    <label for="password" class="form-label">Password*</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password*"/>
                                                    @if ($errors->has('password'))
                                                        <span class="feedback"> {{ $errors->first('password') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                          
                                            </div>
                                            <div>
                                                <div class="submitButton text-center my-4">
                                                    <button type="submit" class="btn btn-secondary">Get Started</button>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="links mt-0 mt-lg-5 text-center text-lg-start">
                                            <a href="{{ route('createaccount') }}">
                                                Create Account
                                            </a>
                                           
                                            <a href="{{ route('forgotpassword') }}">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="footnote">
                                <p class="mrfs-1 text-center">
                                    Your security is our prime concern and we work hard to ensure the safety of online
                                    transactions
                                    done at our website. <br />
                                    Cocogen implements best security practices to protect your account information.<br />
                                    Your privacy is important to us and we do not solicit client information to other third
                                    parties.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

@section('before_body_end_scripts')
    <script type="text/javascript">

        function toggleView(element) {
            let container = $(element).data('container');
            if (container == 'sign-in-partner') {
                $("a[data-container='sign-in-policyholder']").removeClass('active');
                $('.sign-in').removeClass('sign-in-policyholder');
                $('#sign-in-policyholder').hide();
            } else {
                $("a[data-container='sign-in-partner']").removeClass('active');
                $('.sign-in').removeClass('sign-in-partner');
                $('#sign-in-partner').hide();
            }
            $(element).addClass('active');
            $('.sign-in').addClass(container);
            $('#'+container).show();
            $('#source').val(container);
        }

        $(document).ready(function () {
            if ($('#source').val() == '') {
                $('#source').val('sign-in-partner');
            }

            $('.sign-in-type a').on('click', function(e){
                e.preventDefault();
                toggleView(this);
            });

            toggleView($("a[data-container='"+$('#source').val()+"']"));

        });
    </script>
@endsection
