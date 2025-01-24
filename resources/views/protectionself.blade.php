@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/protection-for-my-self/">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/protectionself/protection-self_1.jpg') }}');">
                    </div>
                    <div class="text-banner-wrapper">
                        <h3 class="short-description">
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
                                <li class="cms_page"><strong>Protection for myself</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                     Protection for myself
                </h1>
            </div>
            <div class="category-banner container">
                <p>
                    Our lineup of flexible insurance products offers maximum coverage allowing you to have the confidence to go about your day-to-day be it at work, at home, or out and about doing the things that you love</p>
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
                            <!-- travel-excel-plus-insurance -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/travel-excel-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/travel-excel-plus-insurance') }}"
                                                title="Home Excel Plus" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/Image Tile - Travel Excel Plus.jpg') }}"
                                                    alt="Home Excel Plus" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/Image Tile - Travel Excel Plus.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/travel-excel-plus-insurance')}}" title="Home Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Travel Excel Plus </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/travel-excel-plus-insurance') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--  ALL-IN Pa protect  -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/all-in-pa-protect') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/all-in-pa-protect') }}" title="Fire"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-25" class="landscape" src="{{ URL::to('/') }}/images/Tiles/COCOGEN All-In PA Protect.png"
                                                alt="Fire" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ URL::to('/') }}/images/Tiles/COCOGEN All-In PA Protect.png"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/all-in-pa-protect') }}" title="Fire" style="font-size: 15px;color: #00539e;opacity: 0.9"> ALL-IN Pa protect  </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/all-in-pa-protect') }}" dataid="25" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- golf -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/golf-excel-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/golf-excel-plus-insurance') }}"
                                                title="Home Excel Plus" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('images/protectionself/golf.jpg') }}"
                                                    alt="Home Excel Plus" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('images/protectionself/golf.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/golf-excel-plus-insurance') }}" title="Home Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                   Golf Excel </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/golf-excel-plus-insurance') }}" dataid="19"
                                                class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
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
                           <!-- li -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/miscellaneous-casualty-insurance') }}" class="quickview-icon"><i
                                            class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/miscellaneous-casualty-insurance') }}"
                                                title="Miscellaneous Casualty" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-27" class="landscape" src="{{ url('/images/Tiles/final/COCOGEN Miscellaneous Casualty Insurance.jpg') }}"
                                                    alt="Liability and Casualty" width="300" style="height: 105%">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Tiles/final/COCOGEN Miscellaneous Casualty Insurance.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/miscellaneous-casualty-insurance') }}" title="Miscellaneous Casualty" style="font-size: 15px;color: #00539e;opacity: 0.9;">
                                                    Miscellaneous Casualty </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Your business' best weapon for risk management
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/miscellaneous-casualty-insurance') }}" dataid="27" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> 
                            <!-- bonds -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/bonds-and-suretyship-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/bonds-and-suretyship-insurance') }}"
                                                title="Bonds and Surety" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-28" class="landscape" src="{{ url('/images/product_lines/main_bonds_surety.jpg') }}"
                                                    alt="Bonds and Surety" width="300" style="height: 105%">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/bonds-and-suretyship-insurance') }}" title="Bonds and Surety" style="font-size: 15px;color: #00539e;opacity: 0.9">Bonds and Surety
                                                </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Keeping your contracts in check
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/bonds-and-suretyship-insurance') }}" dataid="28" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
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
