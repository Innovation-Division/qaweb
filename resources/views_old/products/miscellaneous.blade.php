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
                                
                                <li class="product"><strong>Miscellaneous Casualty Lines</strong> </li>
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
                            <!-- directors-and-officers-liability-insurance -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/directors-and-officers-liability-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/directors-and-officers-liability-insurance') }}"
                                                title="Directors and Officers Liability" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/protectionhome/hep.jpg')  }}"
                                                    alt="Directors and Officers Liability" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/protectionhome/hep.jpg')  }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/directors-and-officers-liability-insurance')}}" title="Directors and Officers Liability" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Directors and Officers Liability </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/directors-and-officers-liability-insurance') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Professional Indemnity -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/professional-indemnity-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/professional-indemnity-insurance') }}"
                                                title="Professional Indemnity" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/professional.jpg') }}"
                                                    alt="Professional Indemnity" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/professional.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/professional-indemnity-insurance')}}" title="Professional Indemnity" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Professional Indemnity </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/professional-indemnity-insurance') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                             <!-- Trade Credit -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/trade-credit') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/trade-credit') }}"
                                                title="Trade Credit" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{url('/images/Product Images/trade.jpg') }}"
                                                    alt="Trade Credit" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{url('/images/Product Images/trade.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/trade-credit')}}" title="Trade Credit" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Trade Credit </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/trade-credit') }}" dataid="19"
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
