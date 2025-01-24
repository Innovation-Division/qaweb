@extends('layouts.app')

@section('content')
	   <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/clienty-services">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/inner-ucpb-gen-non-life-insurance-customer-service_1.jpg') }}');"> 
                    </div>
                    <div class="text-banner-wrapper">
                        <h3 class="short-description">
                            COCOGEN Client Services Hotline<br>
                            (02) 8830-6000<br>
                            <br>
                            <a class="btn-banner" href="/faqs">visit our faq page</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category40"><a href="{{ url('/inquiries') }}" title="">Inquiries</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category44"><strong>CLIENT SERVICES</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    CLIENT SERVICES
                </h1>
            </div>
            <div class="category-banner container">
                Our Client Services Center is just one phone call away. Dial (02) 8830-6000 and our client service representatives will be more than glad to assist you!
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                   

                    <div class="page-title category-title">
                        <h1>
                            Client Services</h1>
                    </div>
                    <div class="cust-serv">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                   Insurance doesn’t have to be complicated. That’s why we’re more than happy to help you understand and appreciate the different insurance products and services available to give you the peace of mind you’ve been longing for.</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>
                                    Services Offered:</h2>
                                <ul class="cust-serv-services">
                                    <li><em class="fa fa-check-square-o text-success"></em>Inquiries on insurance cover
                                        and premium quotation</li>
                                    <li><em class="fa fa-check-square-o text-success"></em>Policy documentation request</li>
                                    <li><em class="fa fa-check-square-o text-success"></em>Premium payment inquiry</li>
                                    <li><em class="fa fa-check-square-o text-success"></em>Claims requirements, status inquiry,
                                        and Gawa Agad accredited shops</li>
                                    <li><em class="fa fa-check-square-o text-success"></em>Feedback, suggestions, or concerns</li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    If you need a list of requirements you can visit our <a href="{{ url('/file-a-claim') }}">
                                        File a Claim</a> page to find what you are looking for.</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    You can also email us at <a href="mailto:client_services@cocogen.com">client_services@cocogen.com</a>
                                    or chat with us anytime at our website. Please note our website chat is available
                                    Mondays to Sundays, 8:00AM to 5:00PM except on holidays.</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Comments or suggestions? We want to hear from you! Send us <a href="{{ url('/feedback') }}">
                                        Feedback</a> today.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection
