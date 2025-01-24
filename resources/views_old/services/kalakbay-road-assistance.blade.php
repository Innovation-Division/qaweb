@extends('layouts.app')

@section('content')
    <div class="top-container">
    <!-- config enabled always -->
    <div class="custom-banner custom-page-banner" data-uri-path="/services/kalakbay-road-assistance">
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 a-left">
                    <ul>
                        <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                            <span class="breadcrumbs-split"><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category16"><span>Services</span> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                        </i></span></li>
                        <li class="category66"><span>Motor Services</span> <span class="breadcrumbs-split"><i
                            class="fa fa-angle-right"></i></span></li>
                        <li class="category111" ><strong>kaLAKBAY Road Assistance</strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="category-name container" >
        <h1 >
            kaLAKBAY Road Assistance
        </h1>
    </div>
</div>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
               <div class="page-title category-title">
                <h1 >
                    kaLAKBAY Road Assistance</h1>
            </div>
            <style type="text/css">
                <!
                -- .services-box .services-box-list ul li
                {
                    line-height: 1.5em;
                }
                -- ></style>
            <div class="text-center">
                <br>
                <br>
                <div class="category-banner">
                    <p >
                        kaLAKBAY is our 24-hour road assistance to COCOGEN Motor Insurance Policyholders. If you need anything while on the road, we’re just a phone call away! Just dial (02) 8-830-6000 and tell us which of the following kaLAKBAY services stated below you require and we’ll get to you as soon as possible.</p>
                    <br>
                   <!--  <p >
                        Call us right away and rely on the following kaLAKBAY services:</p> -->
                </div>
            </div>
            <div class="service-box-wrapper">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="services-box">
                            <div class="services-box-inner">
                                <div class="widget widget-static-block">
                                    <div class="services-box-icon">
                                        <div class="services-box-icon-inner">
                                            <span class="fa fa-car"></span></div>
                                    </div>
                                    <div class="services-box-content">
                                        <h2 >
                                            Vehicle Assistance</h2>
                                        <div class="services-box-list">
                                            <ul style="line-height: 150%;">
                                                <li>Emergency Towing</li>
                                                <li>Vehicle Removal</li>
                                                <li>Motor Shop Referral</li>
                                                <li>Minor on Site Servicing – jump starting vehicle, battery boosting, tire changing,
                                                    delivery of gasoline (cost of gasoline not included) and car lock-out at Php1,200
                                                    per event</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="services-box">
                            <div class="services-box-inner">
                                <div class="widget widget-static-block">
                                    <div class="services-box-icon">
                                        <div class="services-box-icon-inner">
                                            <span class=" fa fa-user"></span></div>
                                    </div>
                                    <div class="services-box-content">
                                        <h2 >
                                            Personal Assistance</h2>
                                        <div class="services-box-list">
                                            <ul style="line-height: 150%;">
                                                <li>Hotel Accommodations</li>
                                                <li>Alternative Travel Assistance</li>
                                                <li>Emergency Message</li>
                                                <li>Mediphone Assistance</li>
                                                <li>Traffic Update</li>
                                                <li>Road Directions</li>
                                                <li>Return of Mortal Remains</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="services-box">
                            <div class="services-box-inner">
                                <div class="widget widget-static-block">
                                    <div class="services-box-icon">
                                        <div class="services-box-icon-inner">
                                            <span class="fa fa-shield"></span></div>
                                    </div>
                                    <div class="services-box-content">
                                        <h2 style="line-height: 150%;">
                                            Protection Assistance</h2>
                                        <div class="services-box-list">
                                            <ul >
                                                <li>Security Assistance</li>
                                                <li>Anti-Carnapping Assistance</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="services-box">
                            <div class="services-box-inner">
                                <div class="widget widget-static-block">
                                    <div class="services-box-icon">
                                        <div class="services-box-icon-inner">
                                        <img  alt="" style="max-height: 45px;margin-top: 8px;margin-left: 8px;" src="{{ url('/images/Paper Icon - Green.png') }}"
                                                        draggable="false"></div>
                                    </div>
                                    <div class="services-box-content">
                                        <h2 >
                                            Claims</h2>
                                        <div class="services-box-list">
                                            <ul style="line-height: 150%;">
                                                <li>24/7 Accident Assistance Hotline</li>
                                                <li>Referral to Authority Assistance</li>
                                                <li>Claims Report Service</li>
                                                <li>Claims Requirements</li>
                                                <li>Legal Assistance</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center" style="text-align: center; font-style: italic;">
                    NOTE: Please refer to the policy contract for the complete terms and conditions
                    of coverage.</p>
                <br>
                <div class="product-essential">
                    <div class="row product_details_info">
                        <div class="col-md-12 col-sm-12">
                            <p >
                                About to process your motor claims?</p>
                            <p >
                                Do it with ease through our Gawa Agad Claims Processing.</p>
                            <div class="product_details_info_btns">
                                <a href="{{ url('/gawa-agad-program') }}" >click here to learn more</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
