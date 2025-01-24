@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/inquiries.less') }}" />
@endsection

@section('content')
    <div class="inquiries content-wrapper bg-layout5">
        <section class="banner banner-inquiry">
            <div class="container-fluid breadcrumb-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb rfs-1-5">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Inquiries</a></li>
                        <li class="breadcrumb-item" aria-current="page">Send an Inquiry</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="content">
                    <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Send an Inquiry</h1>
                </div>
            </div>
        </section>
        <div class="main-content">
            <div class="inner">
                <section class="partnerContent">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <form class="inquiryForm mt-4" id="product-inquiry-form" method="post" action="{{ route('generalinquirysave') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="executed" type="hidden" value="0" class="executed">
                                    <input name="form_key" type="hidden" value="OUCpy2ti6oV0afZw">
                                    <div class="formRow">
                                        <div class="mb-2">
                                            <div @if ($errors->has('topic')) class="invalid invalid-required"@endif>
                                                <label for="topic" class="form-label">Topic *</label>
                                                <div>
                                                    <div class="select">
                                                        <select class="styled-select" name="topic" id="topic">
                                                            @if (isset($product))
                                                                <option value="Product Inquiry" selected="selected">Product Inquiry</option>
                                                            @else
                                                                <option value="Product Inquiry" <?php if(old('topic') === "Product Inquiry"){ ?> selected="selected" <?php }?>>Product Inquiry</option>
                                                                <option value="Claims" <?php if(old('topic') === "Claims"){ ?> selected="selected" <?php }?>>Claims</option>
                                                                <option value="Payments" <?php if(old('topic') === "Payments"){ ?> selected="selected" <?php }?>>Payments</option>
                                                                <option value="Feedback" <?php if(old('topic') === "Feedback"){ ?> selected="selected" <?php }?>>Feedback</option>
                                                                <option value="Others" <?php if(old('topic') === "Others"){  ?> selected="selected" <?php }?>>Others</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                @if ($errors->has('topic'))
                                                    <span class="feedback">
                                                        <strong>{{ $errors->first('topic') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-2">

                                            <div id="product_div" {{ $errors->has('product') ? ' has-error' : '' }}" style="display:none;">
                                                <label for="product" class="form-label">Product</label>
                                                <div>
                                                    <div class="select">
                                                        <select class="styled-select" id="product" name="product">
                                                            @if (isset($product))
                                                                <option value="{{ $product }}" data-value="{{ $product }}">{{ $product }}</option>
                                                            @else
                                                                @foreach ($cocogen_product_lines as $cocogen_product_line)
                                                                    <option value="{{ $cocogen_product_line->line }}" data-value="{{ $cocogen_product_line->line }}" <?php if(old('product') === $cocogen_product_line->line){  ?> selected="selected" <?php }?>>{{ $cocogen_product_line->line }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                @if ($errors->has('product'))
                                                    <span class="help-block" style="margin-top: -12px;">
                                                        <strong>{{ $errors->first('product') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow">
                                        <div class="mb-2 mb-lg-0">
                                            <div @if ($errors->has('first_name')) class="invalid invalid-required"@endif>
                                                <label for="first_name" class="form-label">First Name *</label>
                                                <input type="fname" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                                @if ($errors->has('first_name'))
                                                    <span class="feedback">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-2 mb-lg-0">
                                            <div @if ($errors->has('last_name')) class="invalid invalid-required"@endif>
                                                <label for="last_name" class="form-label">Last Name *</label>
                                                <input type="lname" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                                @if ($errors->has('last_name'))
                                                    <span class="feedback">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-2 mb-lg-0">
                                        <div @if ($errors->has('email_address')) class="invalid invalid-required"@endif>
                                            <label for="email_address" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" name="email_address" id="email_address" value="{{ old('email_address') }}">
                                            @if ($errors->has('email_address'))
                                                <span class="feedback">
                                                    <strong>{{ $errors->first('email_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="mb-2 mb-lg-0">
                                        <div @if ($errors->has('message')) class="invalid invalid-required"@endif>
                                            <label for="message" class="form-label">Message *</label>
                                            <textarea class="form-control" rows="3" name="message" id="message">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="feedback">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="captcha-container">
                                        <div id="recaptcha" class="g-recaptcha"></div>
                                    </div>

                                    <div class="submitButton text-center">
                                        <button type="submit" class="btn btn-secondary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <section class="divider pt-0">
            <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
        </section>
    </div>
@endsection

@section('before_body_end_scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

    <script type="text/javascript">

        var onloadCallback = function() {
            grecaptcha.render('recaptcha', {
                'sitekey': '{{ config('app.recaptchaKey') }}'
            });
        };

        $(document).ready(function() {

            $('#product-inquiry-form').on('submit', function(e){
                e.preventDefault();
                var response = grecaptcha.getResponse();
                if (response.length === 0) {
                    alert("Please confirm if you're not a robot.");
                    return false;
                } else {
                    this.submit();
                }
            });

            $('#topic').select2({
                minimumResultsForSearch: Infinity
            });

            $('#product').select2({
                minimumResultsForSearch: Infinity
            });

            if ($('#topic').val() == 'Product Inquiry') {
                $('#product_div').show();
            } else {
                $('#product_div').hide();
            }

            $('#topic').on('select2:select', function(e) {
                if ($(this).val() == 'Product Inquiry') {
                    $('#product_div').show();
                } else {
                    $('#product_div').hide();
                }
            });


        });
    </script>
@endsection
