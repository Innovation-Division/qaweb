@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

<?php
    $policyNo = Request::old('policy_no');
    $amount = Request::old('amount');
?>

@section('content')
    <div class="product content-wrapper bg-layout5">
        <section class="banner banner-product">
            <div class="container-fluid breadcrumb-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb rfs-1-5">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Services</a></li>
                        <li class="breadcrumb-item" aria-current="page">Online Payments</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="content">
                    <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Online Payments</h1>
                </div>
            </div>
        </section>
        <div class="main-content">
            <div class="inner">
                <section class="intro-text">
                    <div class="container">
                        <p class="ff-bold mrfs-1-3 mrfs-lg-1-18 text-center">Avoid the hassle of leaving the house and long lines. Pay for your insurance here by filling in the details below:</p>
                    </div>
                </section>

                <section class="payment-form">
                    <div class="container">

                        <div class="form-name">
                            <p class="ff-bold mrfs-1-3 mrfs-lg-1-10">Create Payment Information</p>
                        </div>
                        <div class="form">
                            <form id="online-payment-form" class="form-default inline-form" role="form" method="post" action="{{ route('onlinepaymentspays') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <div class="formRow">
                                            <div class="d-block mb-2 mb-lg-0">
                                                <div @if ($errors->has('name')) class="invalid invalid-required" @endif>
                                                    <label for="name" class="form-label">Name *</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                                                    @if ($errors->has('name'))
                                                        <span class="feedback">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="policy-information">
                                    <div class="dynamic-row">
                                        @if (!empty($policyNo))
                                            @foreach ($policyNo as $policyItem)
                                                @include('services.online-payments.policy-item', ['policy' => $policyItem, 'amount' => $amount[$loop->index], 'index' => $loop->index])
                                            @endforeach
                                        @else
                                            @include('services.online-payments.policy-item', ['policy' => '', 'amount' => 0.00, 'index' => 0])
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <div class="formRow">
                                            <div class="d-block mb-2 mb-lg-0">
                                                <div @if ($errors->has('email')) class="invalid invalid-required" @endif>
                                                    <label for="email" class="form-label">Email Address *</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                                                    @if ($errors->has('email'))
                                                        <span class="feedback">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="formRow">
                                            <div class="d-block mb-2 mb-lg-0">
                                                <div @if ($errors->has('contact')) class="invalid invalid-required" @endif>
                                                    <label for="mobile" class="form-label">Contact Number *</label>
                                                    <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}" />
                                                    @if ($errors->has('email'))
                                                        <span class="feedback">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="captcha-container">
                                    <div id="recaptcha" class="g-recaptcha"></div>
                                </div>
                                <div class="submitButton text-center mt-3 mt-lg-4 mb-4 mb-lg-5">
                                    <button type="submit" class="btn btn-secondary px-4">Pay Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

                <section class="foot-text mrfs-0-17 mrfs-lg-1-5">
                    <div class="container">
                        <p>*Submitting your details will redirect you to our payment partner page. All details submitted will be subject to secure data protection measures. You will receive a confirmation e-mail once your payment has pushed through.</p>
                        <p>*Some payment channels may charge additional processing fees.</p>
                        {{--  <!-- <p class="mb-0">*UCPB General Insurance Company, Inc. has changed its brand name from UCPB GEN to COCOGEN. However, UCPB General Insurance Company, Inc. remains to be the corporate name. Thus, all legitimate policies, documents, and payments bearing the name of UCPB General
                            Insurance Company, Inc. remains to be valid.</p> --> --}}
                    </div>
                </section>
            </div>
        </div>

        <section class="divider">
            <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
        </section>
    </div>
@endsection

@section('before_body_end_scripts')
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script type="text/javascript">

        var onloadCallback = function() {
            grecaptcha.render('recaptcha', {
                'sitekey': '{{ config('app.recaptchaKey') }}'
            });
        };

        $(document).ready(function(){

            var formatNumber = function(n) {
                return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }

            var formatCurrency = function(input, blur) {
                var input_val = input.val();

                // don't validate empty input
                if (input_val === "") { return; }

                // original length
                var original_len = input_val.length;

                // initial caret position
                var caret_pos = input.prop("selectionStart");

                // check for decimal
                if (input_val.indexOf(".") >= 0) {

                    var decimal_pos = input_val.indexOf(".");

                    // split number by decimal point
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos);

                    // add commas to left side of number
                    left_side = formatNumber(left_side);

                    // validate right side
                    right_side = formatNumber(right_side);

                    // On blur make sure 2 numbers after decimal
                    if (blur === "blur") {
                        right_side += "00";
                    }

                    // Limit decimal to only 2 digits
                    right_side = right_side.substring(0, 2);

                    // join number by .
                    input_val = left_side + "." + right_side;

                } else {
                    input_val = formatNumber(input_val);
                    if (blur === "blur") {
                        input_val += ".00";
                    }
                }

                // send updated string to input
                input.val(input_val);

                // put caret back in the right position
                var updated_len = input_val.length;
                caret_pos = updated_len - original_len + caret_pos;
                input[0].setSelectionRange(caret_pos, caret_pos);
            }

            $("#amount").on({
                keyup: function() {
                    formatCurrency($(this));
                }
            });

            $('#online-payment-form').on('submit', function(e){
                e.preventDefault();
                //alert("test"); 
               /// this.submit();//local only

                var response = grecaptcha.getResponse();
                if (response.length === 0) {
                    alert("Please confirm if you're not a robot.");
                    return false;
                } else {
                    this.submit();
                }
            });

            $('.policy-information').each(function(){
                var $wrapper = $('.dynamic-row', this);

                $(".add-button", $(this)).click(function(e) {
                    e.preventDefault();
                    rowContainer = $('.policy-group:first-child', $wrapper).clone(true);
                    rowContainer.find('#amount').val('0.00').focus();
                    rowContainer.find('#amount').parent().removeClass('invalid invalid-required');
                    rowContainer.find('#amount').parent().find('.feedback').remove();

                    rowContainer.find('#policy_no').val('');
                    rowContainer.find('#policy_no').parent().removeClass('invalid invalid-required');
                    rowContainer.find('#policy_no').parent().find('.feedback').remove();

                    rowContainer.appendTo($wrapper);

                    $('.policy-group .delete-button').show();

                    if ($('.policy-group', $wrapper).length > 9){
                        alert("You can add max of 10 policy.");
                    }
                });

                $('.policy-group .delete-button', $wrapper).click(function(e) {
                    e.preventDefault();
                    if ($('.policy-group', $wrapper).length > 1) {
                        $(this).parent().parent().closest('.policy-group').remove();
                    }
                });
            });

            $('.multi-field-wrapper').each(function() {
                var $wrapper = $('.multi-fields', this);

                $(".add-field", $(this)).click(function(e) {
                    $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('#amount1').val('0.00').focus()
                    $('.multi-field .remove-field').show();

                    if ($('.multi-field', $wrapper).length > 9){
                        alert("You can add max of 10 policy.");
                    }
                });

                $('.multi-field .accesso', $wrapper).click(function() {
                    if ($('.multi-field', $wrapper).length > 1) {
                        $(this).selectpicker("refresh");
                    }
                });

                $('.multi-field .remove-field', $wrapper).click(function() {
                    if ($('.multi-field', $wrapper).length > 1) {
                        $(this).parent('.multi-field').remove();
                    }
                });
            });
        });

    </script>
@endsection
