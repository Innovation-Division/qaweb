@extends('layouts.app')

@section('content')
	       <div class="top-container">
            <!-- config enabled always -->
            <!-- <div class="custom-banner custom-page-banner" data-uri-path="/protection-for-my-business/">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/protectionbusiness/protection-business_1.jpg') }}');">
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
                                <li class="cms_page"><strong>Protection for my Business</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    Protection for my Business
                </h1>
            </div>
            <div class="category-banner container">
                <p>
                   All businesses come with risks, and an entrepreneur’s best weapon is insurance. The testament of your business’ success doesn’t only lie on revenue but also on how you manage unforeseen events. Get your business covered with COCOGEN’s insurance products designed to reduce risks and secure success.</p>
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
                            <!--  Pro-Biz  -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/probiz-excel-plus-insurance') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/probiz-excel-plus-insurance') }}" title="Fire"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-25" class="landscape" src="{{ url('/images/product_lines/probiz.jpg') }}"
                                                alt="Fire" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/probiz.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/probiz-excel-plus-insurance') }}" title="Fire" style="font-size: 15px;color: #00539e;opacity: 0.9"> Pro-Biz  </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/probiz-excel-plus-insurance') }}" dataid="25" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
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
                            <!-- Student Excel Protect -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/student-excel-plus-insurance') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/student-excel-plus-insurance') }}" title="Fire"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-25" class="landscape" src="{{ url('/images/product_lines/student.jpg') }}"
                                                alt="Fire" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/student.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/student-excel-plus-insurance') }}" title="Fire" style="font-size: 15px;color: #00539e;opacity: 0.9">Student Excel Protect  </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Hit the books, don't let the books hit you
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/student-excel-plus-insurance') }}" dataid="25" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- fire -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/fire-insurance') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/fire-insurance') }}" title="Fire"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-25" class="landscape" src="{{ url('/images/product_lines/fire.jpg') }}"
                                                alt="Fire" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/fire.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/fire-insurance') }}" title="Fire" style="font-size: 15px;color: #00539e;opacity: 0.9">Fire </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Don't let your investments go down in flames
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/fire-insurance') }}" dataid="25" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
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
                                        <a href="{{ url('/bonds-and-suretyship') }}" class="quickview-icon">
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
                                            <h2 class="product-name">
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
                            <!-- en -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/engineering-insurance  ') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/engineering-insurance') }}" title="Engineering"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-22" class="landscape" src="{{ url('/images/product_lines/engineering.jpg') }}"
                                                alt="Engineering" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/inquiries/product-inquiry/engineering-insurance  ') }}" title="Engineering" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Engineering </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;" >
                                                Construct with complete confidence.
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/engineering-insurance  ') }}" dataid="22" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                             <!-- mr -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/marine') }}" class="quickview-icon"><i class="icon-export">
                                        </i><span>Quick View </span></a><a href="{{ url('/marine') }}" title="Marine"
                                            class="product-image" style="height: 180px;">
                                            <img id="product-collection-image-26" class="landscape" src="{{ url('/images/product_lines/marine.jpg') }}"
                                                alt="Marine" width="300" style="height: 105%">
                                        </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/marine.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name" >
                                                <a href="{{ url('/marine') }}" title="Marine" style="font-size: 15px;color: #00539e;opacity: 0.9">Marine </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Keep your assets afloat
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/marine-insurance') }}" dataid="26" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                                title="INQUIRY">
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
                                                title="Golf Excel Protect" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-32" class="landscape" src="{{ url('/images/protectionbusiness/def_3.jpg') }}"
                                                    alt="Golf Excel Protect" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 100px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/protectionbusiness/def_3.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/constituents-personal-accident-insurance') }}" title="Golf Excel Protect" style="font-size: 15px;color: #00539e;opacity: 0.9">
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
                            <!-- petrol -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/petrol-excel-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/petrol-excel-plus-insurance') }}"
                                                title="Golf Excel Protect" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-32" class="landscape" src="{{ url('/images/Product Images/petroleum.jpg') }}"
                                                    alt="Golf Excel Protect" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 100px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/petroleum.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/petrol-excel-plus-insurance') }}" title="Golf Excel Protect" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Petrol Excel Protect </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/petrol-excel-plus-insurance') }}" dataid="32"
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
