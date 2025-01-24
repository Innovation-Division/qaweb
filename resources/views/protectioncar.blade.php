@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
            <!-- <div class="custom-banner custom-page-banner" data-uri-path="/protection-for-my-vehicle/">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/protectioncar/protection-vehicle_1.jpg') }}');">
                    </div>
                    <div class="text-banner-wrapper">
                        <h3 class="short-description">
                        </h3>
                    </div>
                </div>
            </div> -->
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="cms_page"><strong>Protection for my Car</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    Protection for my Car
                </h1>
            </div>
            <div class="category-banner container">
                <p>
                   Sometimes it’s not enough to just drive safely and obey traffic rules and regulations. These days, protecting your vehicle means making smart decisions. From extensive to customized motor insurance packages, to 24/7 road assistance, to fast and efficient motor repairs, COCOGEN has got your wheels covered.</p>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="page-title category-title">
                        <h1>
                            Product Lines</h1>
                    </div>
                    <div class="category-products like-category-grid-block">
                        <ul class="products-grid columns3">
                            <!-- mc -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/motor-excel-plus-insurance') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/motor-excel-plus-insurance') }}" title="Motor"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-20" class="landscape" src="{{ url('/images/product_lines/COCOGEN Motor Excel Plus.jpg') }}"
                                                alt="Motor" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/COCOGEN Motor Excel Plus.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/motor-excel-plus-insurance') }}"
                                                    title="Motor" style="font-size: 15px;color: #00539e;opacity: 0.9">Motor Excel Plus</a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Shift to a broader protection
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <!-- Inquiry removed -->
                                            <!-- Coming soon -->
                                            <a href="{{ url('/get-quote') }}" class="addtocart col-md-6 col-sm-6 col-xs-6 itpmotor"
                                                title="Get A Quote" style="width: 100%;">
                                                <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                <span>&nbsp;Get A Quote </span></a>
                                            <!-- Coming soon -->
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- kalakbay -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/kalakbay-road-assistance') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/kalakbay-road-assistance') }}" title="Motor"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-20" class="landscape" src="{{ url('/images/protectioncar/klakabay.jpg') }}"
                                                alt="Motor" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/protectioncar/klakabay.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/kalakbay-road-assistance') }}"
                                                    title="Motor" style="font-size: 15px;color: #00539e;opacity: 0.9">24/7 kaLAKBAY Road Assistance</a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <!-- Inquiry removed -->
                                            <!-- Coming soon -->
                                            <a href="{{ url('/get-quote') }}" class="addtocart col-md-6 col-sm-6 col-xs-6 itpmotor"
                                                title="Get A Quote" style="width: 100%;">
                                                <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <!-- Coming soon -->
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- gawa agad -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{  url('/gawa-agad-program') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{  url('/gawa-agad-program') }}" title="Motor"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-20" class="landscape" src="{{ url('/images/protectioncar/1.jpg') }}"
                                                alt="Motor" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/protectioncar/1.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{  url('/gawa-agad-program') }}"
                                                    title="Motor" style="font-size: 15px;color: #00539e;opacity: 0.9">Gawa Agad Program </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                              
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <!-- Inquiry removed -->
                                            <!-- Coming soon -->
                                            <a href="{{ url('/product-inquiry/gawa-agad-program') }}" class="addtocart col-md-6 col-sm-6 col-xs-6 itpmotor"
                                                title="Get A Quote" style="width: 100%;">
                                                <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <!-- Coming soon -->
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- auto pa protect -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{  url('/auto-passenger-personal-accident-protect') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{  url('/auto-passenger-personal-accident-protect') }}" title="Motor"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-20" class="landscape" src="{{ url('/images/protectionbusiness/autopa.jpg') }}"
                                                alt="Motor" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/protectionbusiness/autopa.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{  url('/auto-passenger-personal-accident-protect') }}"
                                                    title="Motor" style="font-size: 15px;color: #00539e;opacity: 0.9">Auto Passenger PA Protect </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                              
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <!-- Inquiry removed -->
                                            <!-- Coming soon -->
                                            <a href="{{ url('/product-inquiry/auto-passenger-personal-accident-protect') }}" class="addtocart col-md-6 col-sm-6 col-xs-6 itpmotor"
                                                title="Get A Quote" style="width: 100%;">
                                                <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <!-- Coming soon -->
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                       
                      
                    </div>
                    <div class="swatches-js">
                    </div>
                </div>
            </div>
        </div>
       
@endsection
