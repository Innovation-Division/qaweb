@extends('layouts.app')

@section('content')
	
        <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/products/products-packages/specialty-lines-insurance/migrant-workers">
            </div>
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
                                 <li class="category6"><a href="{{ url('/personal-accident-lines') }}" title="">
                                     Personal Accident Lines </a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                <li class="product"><strong>OFW Insurance</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="product-view">
                        <div class="product-essential">
                            <form 
                            method="post" id="product_addtocart_form">
                            <input name="form_key" type="hidden" value="OUCpy2ti6oV0afZw">
                            <div class="no-display">
                                <input type="hidden" name="product" value="37">
                                <input type="hidden" name="related_product" id="related-products-field" value="">
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="short-description col-md-12">
                                    <div class="product-name col-md-12">
                                        <h1>
                                            OFW Insurance</h1>
                                    </div>
                                    <div class="std col-md-12 prod-desc">
                                        <p style="line-height: inherit;">
                                            COCOGEN's Compulsory Insurance for Migrant Workers, as mandated by the Migrant
                                            Workers and Overseas Filipino Act of 1995, is a non-life insurance aiming to provide
                                            general insurance support for Overseas Filipino Workers (OFW's) who are working
                                            abroad in the form of the following coverage:
                                        </p>
                                        <ul id="fire_coverage">
                                            <li><i class="fa fa-check-square-o text-success"></i> Accidental Death – limit of USD
                                                5,000.00</li>
                                            <li><i class="fa fa-check-square-o text-success"></i> Financial Assistance Benefits:
                                                <ul>
                                                    <li>Repatriation Costs – in case of death or termination of employment</li>
                                                    <li>Subsistence Allowance</li>
                                                    <li>Money Claims Benefit</li>
                                                    <li>Compassionate Visit</li>
                                                    <li>Medical Evacuation</li>
                                                    <li>Medical Repatriation</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row product_details_info">
                                <div class="col-md-12">
                                    <p style="text-align: center;">
                                        For Product Related Inquiries</p>
                                    <p style="text-align: center;">
                                        Want to know more? Allow us to help you find the best insurance cover for you based from your needs. <br> <br></p>
                                </div>
                                <div class="add-to-box col-md-12">
                                    <div class="click_here_pdp">
                                        <a href="{{ url('/product-inquiry/ofw-insurance') }}" dataid="37"
                                            class="produt_click_here">INQUIRE NOW</a>
                                    </div>
                                </div>
                                <!-- End Modified -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="block block-related product-related-products like-category-grid-block">
                                        <div class="block-title">
                                            <strong><span>Related Products</span></strong>
                                        </div>
                                        <hr>
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
                                                <!-- pa -->
                                                <li class="item">
                                                    <div class="item-area box-shadow">
                                                        <div class="product-image-area">
                                                            <div class="loader-container">
                                                                <div class="loader">
                                                                    <i class="ajax-loader medium animate-spin"></i>
                                                                </div>
                                                            </div>
                                                            <a href="{{ url('/personal-accident-insurance') }}" class="quickview-icon">
                                                                <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/personal-accident-insurance') }}"
                                                                    title=" Personal Accident" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-19" class="landscape" src="{{ url('/images/product_lines/personal_accident.jpg')  }}"
                                                                        alt=" Personal Accident" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 95px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{ url('/images/product_lines/personal_accident.jpg')  }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/personal-accident-insurance')}}" title=" Personal Accident" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                                        Personal Accident </a>
                                                                </h2>
                                                                <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                                   <!--  Protect the home that protects you -->
                                                                </div>
                                                            </div>
                                                            <div class="actions abs" style="text-align: center;">
                                                                <a href="{{ url('/product-inquiry/personal-accident-insurance') }}" dataid="19"
                                                                    class="click-here inquiry form-control" title="INQUIRY">
                                                                    <!-- <i class="icon-cart"></i> -->
                                                                    <span>&nbsp;INQUIRY </span></a>
                                                                <div class="clearer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
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
                                                                    title="Travel Excel Plus" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/Image Tile - Travel Excel Plus.jpg') }}"
                                                                        alt="Travel Excel Plus" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 95px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{ url('/images/Product Images/Image Tile - Travel Excel Plus.jpg') }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/travel-excel-plus-insurance')}}" title="Travel Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
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
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearer">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
