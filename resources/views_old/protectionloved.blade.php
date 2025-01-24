@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/protection-for-my-loved-ones">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="cms_page"><strong>Protection for my Loved Ones</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    Protection for my Loved Ones
                </h1>
            </div>
            <div class="category-banner container">
                <p>
                    When a person is close to your heart, you go to great lengths to make sure they
                    are protected. Insure your loved ones and have the peace of mind knowing they are
                    always ready for any unforeseen events whenever, wherever.</p>
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
                                                title="Home Excel Plus" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ URL::to('/') }}/images/Tiles/COCOGEN All-In PA Protect.png"
                                                    alt="Home Excel Plus" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ URL::to('/') }}/images/Tiles/COCOGEN All-In PA Protect.png"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/all-in-pa-protect')}}" title="Home Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
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
                             <!-- family -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/family-excel-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/family-excel-plus-insurance') }}"
                                                title="Home Excel Plus" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/Image Tile - Family Excel Plus.jpg') }}"
                                                    alt="Home Excel Plus" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/Image Tile - Family Excel Plus.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/family-excel-plus-insurance') }}" title="Home Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Family Excel Protect </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/family-excel-plus-insurance') }}" dataid="19"
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
                                        <a href="{{  url('/personal-accident-insurance') }}" class="quickview-icon"><i class="icon-export">
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
                                            <h2 class="product-name" >
                                                <a href="{{  url('/personal-accident-insurance') }}" title="Personal Accident" style="font-size: 15px;color: #00539e;opacity: 0.9">Personal
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
                              
                                   
                        </ul>
                       
                      
                    </div>
                    <div class="swatches-js">
                    </div>
                </div>
            </div>
        </div>
       
@endsection
