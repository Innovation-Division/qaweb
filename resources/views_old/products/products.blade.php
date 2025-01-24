@extends('layouts.app')

@section('content')
	 <div class="top-container">          
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="cms_page"><strong>Our Products</strong> </li>
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
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="col-md-4" >
                                    <div class="effect-ruby">
                                        <div class="widget widget-static-block">
                                            <p>
                                                <img alt="file a claim" class="img-responsive" src="{{ url('/images/protectionhome/2.jpg') }}"></p>
                                            <div class="effect-ruby-caption">
                                                <h2>
                                                    Product Lines</h2>
                                               <!--  <p>
                                                    We understand the hard work and dedication it takes to turn your dream into reality,
                                                    and that’s why we designed this product specifically to help you protect your home
                                                    against loss or damage.</p> -->
                                                <a href="{{ url('/product-lines') }}">Learn more</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="effect-ruby">
                                        <div class="widget widget-static-block">
                                            <p>
                                                <img alt="file a claim" src="{{ url('/images/protectionhome/hep.jpg') }}"></p>
                                            <div class="effect-ruby-caption">
                                                <h2>
                                                    Excel Plus Packages</h2>
                                              <!--   <p>
                                                    Home Excel Protect aims to provide you and your home extensive coverage.<br>
                                                    <br>
                                                    We offer 2 plans: <strong>PRIME COVER</strong> and <strong>ADVANCE COVER</strong>
                                                    with <strong>Insurable Properties</strong>.</p> -->
                                                <a href="{{ url('/excel-plus-packages') }}">Learn more</a></div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-md-4">
                                    <div class="effect-ruby">
                                        <div class="widget widget-static-block">
                                            <p>
                                                <img alt="file a claim" src="{{ url('/images/protectionhome/hep.jpg') }}"></p>
                                            <div class="effect-ruby-caption">
                                                <h2>
                                                    Microinsurance</h2>
                                              <!--   <p>
                                                    Home Excel Protect aims to provide you and your home extensive coverage.<br>
                                                    <br>
                                                    We offer 2 plans: <strong>PRIME COVER</strong> and <strong>ADVANCE COVER</strong>
                                                    with <strong>Insurable Properties</strong>.</p> -->
                                                <a href="{{ url('/microinsurance') }}">Learn more</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
