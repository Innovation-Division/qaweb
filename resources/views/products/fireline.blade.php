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
                                <li class="category6"><a href="{{ url('/products') }}" title="">
                                    Products</a> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                                    </i></span></li>
                                <li class="category6"><a href="{{ url('/product-lines') }}" title="">
                                    Product Lines</a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                <li class="product"><strong>Fire Lines </strong> </li>
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
                        <!-- fi -->
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
                                        <a href="{{ url('/product-inquiry/fire-insurance  ') }}" dataid="25" class="click-here inquiry col-md-12 col-sm-12 col-xs-12"
                                            title="INQUIRY">
                                            <!-- <i class="icon-cart"></i> -->
                                            <span>&nbsp;INQUIRY </span></a>
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> 
                        

                        <!-- home -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/home-excel-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/home-excel-plus-insurance') }}"
                                                title="Home Excel Plus" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/Image Tile - Home Excel Plus.jpg') }}"
                                                    alt="Home Excel Plus" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/Image Tile - Home Excel Plus.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/home-excel-plus-insurance') }}" title="Home Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Home Excel Plus </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Protect the home that protects you
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/home-excel-plus-insurance') }}" dataid="19"
                                                class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- condo excel -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/condo-excel-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/condo-excel-plus-insurance') }}"
                                                title="Condo Excel Protect" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-52" class="landscape" src="{{ url('/images/Product Images/Image Tile - Condo Excel Plus.jpg') }}"
                                                    alt="Condo Excel Protect" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 100px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/Image Tile - Condo Excel Plus.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/condo-excel-plus-insurance') }}" title="Condo Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9;">
                                                    Condo Excel Plus </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Make your urban living more comfortable
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/condo-excel-plus-insurance') }}" dataid="52"
                                                class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- probiz -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/probiz-excel-plus-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/probiz-excel-plus-insurance') }}"
                                                title="ProBiz Excel Protect" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-34" class="landscape" src="{{ url('/images/Product Images/Image Tile - ProBiz Excel Plus.jpg') }}"
                                                    alt="ProBiz Excel Protect" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 100px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/Image Tile - ProBiz Excel Plus.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/probiz-excel-plus-insurance') }}" title="ProBiz Excel Protect" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    ProBiz Excel Plus </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Essential protection for every entrepreneur
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/probiz-excel-plus-insurance') }}" dataid="34"
                                                class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
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
                                                    Petrol Excel Plus </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                The thrill on the greens begins with ease
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <a href="{{ url('/product-inquiry/petrol-excel-plus-insurance') }}" dataid="32"
                                                class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
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
