@extends('layouts.cgen')
@php $recaptcha_site_key = config('app.recaptchaKey'); @endphp
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
                    <li class="breadcrumb-item" aria-current="page">Create Account</li>
                </ol>
            </nav>
        </div>
        <section class="sign-in-content">
            <div class="container pt-4 pt-md-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <div class="error-msg">
                                        <i class="fa fa-check-circle"></i>
                                        {{$message}}
                                    </div>
                            </div>
                @endif
                <div class="sign-in-board mx-auto">
                    <div class="sign-in-form">
                        <div class="mt-0 mt-lg-3">
                            <div class="text-center">
                                <h2 class="mb-5 mrfs-1-2 mrfs-lg-1-12">Create Account</h2>
                            </div>

                            @if ($errors->has('email'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                    <i class="fa fa-times-circle"></i>
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('name'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                    <i class="fa fa-times-circle"></i>
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('password'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="error-msg">
                                    <i class="fa fa-times-circle"></i>
                                    {{ $errors->first('password') }}
                                </div>
                            </div>
                            @endif

                            <form onsubmit="return validateRecaptcha();" class="mb-3 form-default" method="POST" action="{{ route('signup') }}">
                                @csrf
                                <input name="form_key" type="hidden" value="Jw9Lv4O4rXKWO6fq">
                                <div class="mb-3">
                                    <div class="@if ($errors->has('name') && $errors->first('name') === 'This name field is required..') invalid invalid-required @endif">
                                        <label for="email" class="form-label">Name*</label>
                                        <input type="text" name="name" placeholder="Name" value="" id="email" class="form-control required-entry validate-email" title="Name">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="@if ($errors->has('email') && $errors->first('email') === 'This email field is required.') invalid invalid-required @endif">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" name="email" placeholder="Email Address *" value="" id="email" class="form-control required-entry validate-email" title="Email Address">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="@if ($errors->has('password') && $errors->first('password') === 'This password field is required.') invalid invalid-required @endif">
                                        <label for="email" class="form-label">Password*</label>
                                        <input type="password" name="password" placeholder="Password" value="" id="email" class="form-control required-entry validate-email" title="Password">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="@if ($errors->has('password_confirmation') && $errors->first('password_confirmation') === 'The password confirmation does not match.') invalid invalid-required @endif">
                                        <label for="email" class="form-label">Confirm Password*</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" value="" id="email" class="form-control required-entry validate-email" title="Confirm Password">
                                    </div>
                                </div>
                                <div class="mb-2 mb-lg-0">
                                    <div class="g-recaptcha" data-sitekey="{{ $recaptcha_site_key }}"></div>
                                </div>
                                <div>
                                    <div class="submitButton text-center my-4">
                                        <button type="submit" class="btn btn-secondary" title="Login" name="send" id="send2">
                                            Submit</button>
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

@section('before_body_end_scripts')
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('html_element', {
                'sitekey': '{{ $recaptcha_site_key }}'
            });
        };
        function validateRecaptcha() {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please confirm if you're not a robot.");
                return false;
            } else {
                //alert("validated");
                return true;
            }
        }

        function resetForm() {
            let modalForm = $('#partnerModal .modal-body .modal-form');
            modalForm.find('.invalid').removeClass('invalid').removeClass('invalid-required');
            modalForm.find('.feedback').remove();
            modalForm.find("input[type=text], input[type=email], textarea").val("");
        }

        $(document).ready(function() {
            $(document).on('show.bs.modal', '#partnerModal', function(e){
                let target  = $(e.relatedTarget);
                let modalContent = $(e.currentTarget).find('.modal-body');
                let _job = target.data('job');
                let _department = target.data('department');
                let _type = target.data('type');
                let _jobDescription = target.parent().siblings('.jobDescHidden').html();
                let _jobQualification = target.parent().siblings('.jobQualiHidden').html();

                modalContent.find('.modal-heading div > h2').html(_job);
                modalContent.find('.modal-text .content:eq(0) > .text p').html(_department);
                modalContent.find('.modal-text .content:eq(1) > .text p').html(_type);
                modalContent.find('.modal-text .content:eq(2) > .text').html(_jobDescription);
                modalContent.find('.modal-text .content:eq(3) > .text').html(_jobQualification);

                modalContent.find('select[name="positionApplied"] option[data-value="' + _job + '"]')
                    .prop('selected', true)
                    .attr('selected', 'selected');

                modalContent.find('select[name="positionApplied"] option:not([data-value="' + _job + '"])')
                    .prop('selected', false)
                    .removeAttr('selected');

            });

            $('#partnerModal .modal-body .modal-heading .btn').click(function(){
                $(this).parents('.modal-heading').siblings('.modal-form').find('button[type="submit"]:first').focus();
            });

            $(document).on('hidden.bs.modal', '#partnerModal', function (e) {
                let target  = $(e.relatedTarget);
                let modalContent = $(e.currentTarget).find('.modal-body');
                modalContent.find('.alert').remove();
                resetForm();
            });

            @if(!empty($hasError) || session('message') || session('messagefailed'))
                $('#partnerModal').removeClass('fade');
                $('#partnerModal').modal('show', function(){
                    $('#partnerModal .modal-form button[type="submit"]:first').focus();
                });
                $('#partnerModal').addClass('fade');
                @if(session('message') || session('messagefailed'))
                    resetForm();
                @endif
            @endif
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"   async defer>
@endsection
