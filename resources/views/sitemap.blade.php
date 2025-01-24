@extends('layouts.app')

@section('content')
	 <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/site-map">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="https://www.ucpbgen.com/" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="cms_page"><strong>Site Map</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="std">
                        <style type="text/css">
                            <!
                            -- .sm-row small
                            {
                                font-size: 85%;
                            }
                            -- ></style>
                        <div class="row sm-row">
                            <div class="col-xs-12 text-center">
                                <div class="category-name">
                                    <h1>
                                        Sitemap</h1>
                                </div>
                                <div class="category-banner">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="content col-md-6 col-xs-12">
                                <ul class="site-map">
                                    <li><a href="{{url('/')}}"><strong>HOME</strong></a></li>
                                    <li><strong>ABOUT US</strong></li>
                                    <ul>
                                        <li><a href="{{url('/our-company')}}">Our Company</a></li>
                                        <li><a href="{{url('/our-milestone')}}">Our Milestones</a></li>
                                        <li><a href="{{url('/our-financial-performance')}}/">Our Financial Performance</a></li>
                                        <li><a href="{{url('/our-team')}}">Our Team</a></li>
                                        <li><a href="{{url('/corporate-governance')}}">Corporate Governance</a></li>
                                        <li><a href="{{url('/careers')}}">Careers</a></li>
                                    </ul>
                                    <li><strong><a href="#}">OUR PRODUCTS</a></strong></li>
                                    <ul>                                       
                                       
                                        
                                            <li><a href="#">Product Lines</a></li>
                                            <ul>
                                                <li><a href="{{url('/fire-insurance')}}"><em><small>Fire</small></em></a></li>
                                                <li><a href="{{url('/engineering-insurance')}}"><em><small>Engineering</small></em></a></li>
                                                <li><a href="{{url('/motor-excel-plus-insurance')}}"><em><small>Motor Insurance</small></em></a></li>
                                                  
                                                <li><a href="{{url('/personal-accident')}}"><em><small>Personal Accident</small></em></a></li>
                                                    <ul>
                                                        <li><a href="{{url('/personal-accident-insurance')}}"><em><small>Personal Accident Insurance</small></em></a></li>
                                                        <li><a href="{{url('/ofw-insurance')}}"><em><small>OFW Insurance</small></em></a></li>
                                                        <li><a href="{{url('/all-in-pa-protect')}}"><em><small>All-In PA Protect</small></em></a></li> 
                                                        <li><a href="{{url('/cancer-assist-plus-insurance')}}"><em><small>Cancer Assist Plus</small></em></a></li>
                                                        <li><a href="{{url('/constituents-personal-accident-insurance')}}"><em><small>Constituents Personal Accident Insurance</small></em></a></li> 
                                                        <li><a href="{{url('/auto-passenger-personal-accident-protect')}}"><em><small>Auto Passenger Personal Accident Protect</small></em></a></li> 
                                                        <li><a href="{{url('/personal-accident-greeting-cards')}}"><em><small>Personal Accident Cards</small></em></a></li>
                                                    </ul>
                                                <li><a href="{{url('/miscellaneous-casualty')}}"><em><small>Miscellaeous Casualty</small></em></a></li>
                                                    <ul>
                                                        <li><a href="{{url('/miscellaneous-casualty-insurance')}}"><em><small>Miscellaneous Casualty</small></em></a></li>
                                                        <li><a href="{{url('/directors-and-officers-liability-insurance')}}"><em><small>Directors and Officers Liability</small></em></a></li>
                                                        <li><a href="{{url('/professional-indemnity-insurance')}}"><em><small>Professional Indemnity</small></em></a></li>
                                                        <li><a href="{{url('/trade-credit')}}"><em><small>Trade Credit</small></em></a></li>                                                                                            
                                                    </ul>
                                                <li><a href="{{url('/marine')}}"><em><small>Marine</small></em></a></li>
                                                    <ul>
                                                        <li><a href="{{url('/marine-insurance')}}"><em><small>Marine Insurance</small></em></a></li>
                                                        <li><a href="{{url('/truckers-liability-plus')}}"><em><small>Truckers' Liability Plus</small></em></a></li>
                                                        <li><a href="{{url('/trust-receipt')}}"><em><small>Trust Receipt</small></em></a></li>                                                                                            
                                                    </ul>
                                                <li><a href="{{url('/bonds-and-suretyship-insurance')}}"><em><small>Bonds and Surety</small></em></a></li>                                               
                                            </ul>
                                            
                                            <li><a href="{{url('/excel-plus-packages')}}">Excel Plus Packges</a></li>
                                            <ul>
                                                <li><a href="{{url('/home-excel-plus-insurance')}}"><em><small>Home Excel Plus</small></em></a></li>
                                                <li><a href="{{url('/travel-excel-plus-insurance')}}"><em><small>Travel Excel Plus</small></em></a></li>
                                                <li><a href="{{url('/condo-excel-plus-insurance')}}"><em><small>Condo Excel Plus</small></em></a></li>
                                                <li><a href="{{url('/probiz-excel-plus-insurance')}}"><em><small>ProBiz Excel Plus</small></em></a></li>
                                                <li><a href="{{url('/family-excel-plus-insurance')}}"><em><small>Family Excel Plus</small></em></a></li>
                                                <li><a href="{{url('/student-excel-plus-insurance')}}"><em><small>Student Excel Plus</small></em></a></li>
                                                <li><a href="{{url('/petrol-excel-plus-insurance')}}"><em><small>Petrol Excel Plus</small></em></a></li>
                                                <li><a href="{{url('golf-excel-plus-insurance')}}"><em><small>Golf Excel Plus</small></em></a></li>
                                            </ul>
                                            <li><a href="{{url('/microinsurance')}}">Microinsurance</a></li>
                                            <ul>
                                                <li><a href="{{url('/kasambahay-protect')}}"><em><small>Kasambahay Protect</small></em></a></li>
                                            </ul>
                                        </ul>
                                    
                                </ul>
                            </div>
                            <div class="content col-md-6 col-xs-12">
                                <ul class="site-map">
                                    <ul class="site-map">
                                        <li><strong>OUR SERVICES</strong></li>
                                            <ul>
                                                <li><a href="{{url('/file-a-claim')}}">File a Claim</a></li>
                                                <li><a href="{{url('/kalakbay-road-assistance')}}">kaLAKBAY Road Assistance </a></li>
                                                <li><a href="{{url('/gawa-agad-program')}}">Gawa Agad Progra</a></li>
                                                <li><a href="{{url('/online-payments')}}">Online Payments</a></li>
                                                <li><a href="{{url('/payment-facilities')}}">Payment Facilities </a></li>
                                               
                                            </ul>
                                        <li><a href="{{url('/get-quote')}}"><strong>GET A QUOTE</strong></a></li>
                                       
                                        <li><a href="#"><strong>INQUIRIES</strong></a></li>
                                        <ul>
                                            <li><a href="{{url('/faqs')}}">FAQs</a></li>
                                            <li><a href="{{url('/product-inquiry')}}">Product Inquiry</a></li>
                                            <li><a href="{{url('/locate-a-branch')}}">Locate a Branch</a></li>
                                            <li><a href="{{url('/client-services')}}">Client Services</a></li>
                                            <li><a href="{{url('/feedback')}}">Feedback</a></li>
                                        </ul>
                                    </ul>
                                </ul>
                                <br>
                                <ul class="site-map">
                                    <li><a href="{{url('/sitemap')}}"><strong>SITEMAP</strong></a></li>
                                    <li><a href="{{url('/internet-security')}}"><strong>INTERNET SECURITY</strong></a></li>
                                    <li><a href="{{url('/customer-charter')}}"><strong>CUSTOMER CHARTER</strong></a></li>
                                    <li><a href="{{url('/terms-and-conditions')}}"><strong>TERMS AND CONDITIONS</strong></a></li>
                                    <li><a href="{{url('/epolicy')}}"><strong>EPOLICY</strong></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
