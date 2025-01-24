@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/services/payment-facilities">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/onlinepayment/payment-facilities-ucpb-general-insurance-innerpage3.jpg') }}');"> 
                    </div>
                    <div class="text-banner-wrapper">
                        <h3 class="short-description">
                            Pay your premiums anytime,<br>
                            anywhere
                        </h3>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="https://www.ucpbgen.com/" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category16"><span>Services</span> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                </i></span></li>
                                <li class="category27"><strong>Payment Facilities</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    Payment Facilities
                </h1>
            </div>
            <div class="category-banner container">
                Pay your insurance policy premiums anytime and anywhere with convenient options
                such as over the counter, online and mobile banking or via credit card.
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="page-title category-title">
                        <h1>
                            Payment Facilities</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="box-padded" style="padding: 20px;">
                                <p>
                                    <img alt="over the counter" class="img-responsive" src="{{ url('/images/onlinepayment/over-the-counter.png') }}"></p>
                                <div>
                                    <h2>
                                        <strong>OVER THE COUNTER</strong></h2>
                                    <p>
                                        Pay your insurance premiums at any UCPB or BDO branch nationwide.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="box-padded" style="padding: 20px;">
                                <p>
                                    <img alt="online banking" class="img-responsive" src="{{ url('/images/onlinepayment/online-banking.png') }}"></p>
                                <div>
                                    <h2>
                                        <strong>ONLINE BANKING</strong></h2>
                                    <p>
                                        1. Visit <a href="https://www.ucpb.com/" target="_blank" title="United Coconut Planters Bank">
                                            www.ucpb.com</a> or <a target="_blank" href="https://www.bdo.com.ph/" title="BDO Unibank Inc.">
                                                www.bdo.com.ph</a><br>
                                        2. Register or login to your online banking account.<br>
                                        3. Manage your transaction online.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="box-padded" style="padding: 20px;">
                                <p>
                                    <img alt="mobile banking" class="img-responsive" src="{{ url('/images/onlinepayment/mobile-banking.jpg') }} "></p>
                                <div>
                                    <h2>
                                        <strong>MOBILE BANKING</strong></h2>
                                    <p>
                                        1. Download and install UCPB or BDO mobile banking applications on your smartphone.<br>
                                        2. Register or login to access your account.<br>
                                        3. Facilitate your mobile transaction.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="category-name">
                                <h2>
                                    UCPB GEN Offices now accept credit card payments.</h2>
                            </div>
                            <div class="category-banner">
                                <p>
                                    Accepted credit cards:</p>
                                <div class="card-icons">
                                    <ul style="padding-left: 0;">
                                      
                                        <li ><img class="img-responsive" src="{{ URL::to('/') }}/images/acceptedcredit.PNG"></li>
                                       
                                    </ul>
                                </div>
                                <p>
                                    Automated Teller Machine Cards</p>
                                <div class="card-icons">
                                    <ul style="padding-left: 0;">
                                        <li><img class="img-responsive" src="{{ URL::to('/') }}/images/autoteller.PNG" ></li>
                                      
                                    </ul>
                                </div>
                            </div>
                            <p>
                                <br>
                                Have other inquiries regarding our payment facilities? Check out our <a href="{{url('/faqs')}}"
                                    title="Frequently Asked Questions">FAQs</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
