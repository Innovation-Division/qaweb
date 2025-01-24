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
                                <li class="category6"><a href="{{ url('/products') }}" title="">Products</a> <span class="breadcrumbs-split">
                                	<i class="fa fa-angle-right"></i></span></li>
                                <li class="category6"><a href="{{ url('/product-lines') }}" title="">Product Lines</a> <span class="breadcrumbs-split">
                                	<i class="icon-keyboard_arrow_right"></i></span></li>
                                <li class="product"><strong>Personal Accident Lines</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                            <!-- pa -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/personal-accident-insurance') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/personal-accident-insurance') }}"
                                            title="Personal Accident" class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-30" class="landscape" src="{{ url('/images/product_lines/personal_accident.jpg') }}"
                                                alt="Personal Accident" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/personal_accident.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/personal-accident-insurance') }}" title="Personal Accident" style="font-size: 15px;color: #00539e;opacity: 0.9">Personal
                                                    Accident </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Protection for the irreplaceable
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/personal-accident-insurance') }}" dataid="30" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- ofw-insurance -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/ofw-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/ofw-insurance') }}"
                                                title="OFW insurance" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/ofw.jpg') }}"
                                                    alt="OFW insurance" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/ofw.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/ofw-insurance')}}" title="OFW insurance" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    ofw insurance </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/ofw-insurance') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- All-in pa -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/all-in-pa-protect') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/all-in-pa-protect') }}"
                                                title="ALL-IN Pa protect" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ URL::to('/') }}/images/Tiles/COCOGEN All-In PA Protect.png"
                                                    alt="ALL-IN Pa protect" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ URL::to('/') }}/images/Tiles/COCOGEN All-In PA Protect.png"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/all-in-pa-protect')}}" title="ALL-IN Pa protect" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    ALL-IN Pa protect </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/all-in-pa-protect') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                               <!-- cancer assist -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/cancer-assist-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/cancer-assist-plus-insurance') }}"
                                                title="Cancer Assist Plus" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-34" class="landscape" src="{{ url('/images/Product Images/cancer_assist.jpg') }}"
                                                    alt="Cancer Assist Plus" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 100px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/cancer_assist.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/cancer-assist-plus-insurance') }}" title="Cancer Assist Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Cancer Assist Plus </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               Care for your future with COCOGEN Cancer Assist+
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/cancer-assist-plus-insurance') }}" dataid="34"
                                                class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Constituents PA Insurance -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/constituents-personal-accident-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/constituents-personal-accident-insurance') }}"
                                                title="Constituents PA Insurance" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-32" class="landscape" src="{{ url('/images/protectionbusiness/def_3.jpg') }}"
                                                    alt="Constituents PA Insurance" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 100px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/protectionbusiness/def_3.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/constituents-personal-accident-insurance') }}" title="Constituents PA Insurance" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Constituents PA Insurance </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/constituents-personal-accident-insurance') }}" dataid="32"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
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
                                        </i><span>Quick View </span></a><a href="{{  url('/auto-passenger-personal-accident-protect') }}" title="Auto Passenger PA Protect"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-20" class="landscape" src="{{ url('/images/protectionbusiness/autopa.jpg') }}"
                                                alt="Auto Passenger PA Protect" width="300" style="height: 105%">
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
                                                    title="Auto Passenger PA Protect" style="font-size: 15px;color: #00539e;opacity: 0.9">Auto Passenger PA Protect </a>
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
                            <!-- personal-accident-greeting-cards -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/personal-accident-greeting-cards') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/personal-accident-greeting-cards') }}"
                                                title="Personal Accident greeting Cards" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/PA Greeting Cards1.jpg') }}"
                                                    alt="Personal Accident greeting Cards" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/PA Greeting Cards1.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/personal-accident-greeting-cards')}}" title="Personal Accident greeting Cards" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Personal Accident greeting Cards </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/personal-accident-greeting-cards') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
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
