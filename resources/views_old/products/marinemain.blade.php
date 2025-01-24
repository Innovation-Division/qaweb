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
                                <li class="product"><strong>Marine Lines</strong> </li>
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
                            <!-- marine-insurance -->
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/marine-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/marine-insurance') }}"
                                                title="Marine Insurance" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/Marine Insurance.jpg')  }}"
                                                    alt="Marine Insurance" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/Marine Insurance.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/marine-insurance')}}" title="Marine Insurance" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Marine Insurance</a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/marine-insurance') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- truckers-cargo-liability-insurance -->
                           <!--  <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/truckers-cargo-liability-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/truckers-cargo-liability-insurance') }}"
                                                title="Truckers' Cargo Liability Insurance (TruCargo)" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/TruCargo.jpg')  }}"
                                                    alt="Truckers' Cargo Liability Insurance (TruCargo)" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/TruCargo.jpg')  }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/truckers-cargo-liability-insurance')}}" title="Truckers' Cargo Liability Insurance (TruCargo)" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Truckers' Cargo Liability Insurance (TruCargo) </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                             
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/truckers-cargo-liability-insurance') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                              
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                             <!-- Trust Receipt --> 
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/trust-receipt') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/trust-receipt') }}"
                                                title="Trust Receipt" class="product-image" style="height: 180px;">
                                                <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/Trust Receipt.jpg')  }}"
                                                    alt="Trust Receipt" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 95px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/Product Images/Trust Receipt.jpg')  }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{  url('/trust-receipt')}}" title="Trust Receipt" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                    Trust Receipt </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                               <!--  Protect the home that protects you -->
                                            </div>
                                        </div>
                                        <div class="actions abs" style="text-align: center;">
                                            <a href="{{ url('/product-inquiry/trust-receipt') }}" dataid="19"
                                                class="click-here inquiry form-control" title="INQUIRY">
                                                <!-- <i class="icon-cart"></i> -->
                                                <span>&nbsp;INQUIRY </span></a>
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Truckers' Liability Plus -->
                                                 <li class="item">
                                                    <div class="item-area box-shadow">
                                                        <div class="product-image-area">
                                                            <div class="loader-container">
                                                                <div class="loader">
                                                                    <i class="ajax-loader medium animate-spin"></i>
                                                                </div>
                                                            </div>
                                                            <a href="{{ url('/truckers-liability-plus') }}" class="quickview-icon">
                                                                <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/truckers-liability-plus') }}"
                                                                    title=" Truckers' Liability Plus" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-19" class="landscape" src="{{  url('/images/Product Images/Truckers Liability.jpg')   }}"
                                                                        alt=" Truckers' Liability Plus" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 95px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{  url('/images/Product Images/Truckers Liability.jpg')   }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/truckers-liability-plus')}}" title=" Truckers' Liability Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                                        Truckers' Liability Plus </a>
                                                                </h2>
                                                                <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                               
                                                                </div>
                                                            </div>
                                                            <div class="actions abs" style="text-align: center;">
                                                                <a href="{{ url('/product-inquiry/truckers-liability-plus') }}" dataid="19"
                                                                    class="click-here inquiry form-control" title="INQUIRY">
                                                                  <i class="icon-cart"></i>
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
