@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/products/product-lines/marine">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/marine.jpg') }}');">
                    </div>
                    <div class="text-banner-wrapper">
                        <h3 class="short-description">
                            Keep your assets afloat
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
                                <li class="category6"><a href="{{ url('/products') }}" title="">
                                    Products</a> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                                    </i></span></li>
                                <li class="category6"><a href="{{ url('/product-lines') }}" title="">
                                    Product Lines</a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                     <li class="category6"><a href="{{ url('/marine-lines') }}" title="">
                                    Marine Lines</a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                <li class="product"><strong>Marine</strong> </li>
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
                            <form action="https://www.ucpbgen.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cudWNwYmdlbi5jb20vcHJvZHVjdHMvcHJvZHVjdC1saW5lcy9tYXJpbmU,/product/26/form_key/fgENrKlpVDgznHxk/"
                            method="post" id="product_addtocart_form">
                            <input name="form_key" type="hidden" value="fgENrKlpVDgznHxk">
                            <div class="no-display">
                                <input type="hidden" name="product" value="26">
                                <input type="hidden" name="related_product" id="related-products-field" value="">
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="short-description col-md-12">
                                    <div class="product-name col-md-12">
                                        <h1>
                                            Marine</h1>
                                    </div>
                                    <div class="std col-md-12 prod-desc">
                                        <p style="line-height: inherit;">
                                            In the business of manufacturing and trade, your goods are your investments. Should your shipments get delayed or lost, your best safety net is to have your transport and goods insured with COCOGEN’s Marine Insurance. Let us secure your freight and vessels against threats from land, sea, and air. Find confidence in knowing that with our marine cargo insurance, your assets will always reach their destination.</p>
                                        <p>
                                            Coverage:</p>
                                        <ul>
                                            <li><i class="fa fa-check-square-o text-success"></i>  Hull</li>
                                            <li><i class="fa fa-check-square-o text-success"></i>  Cargo</li>
                                            <li><i class="fa fa-check-square-o text-success"></i>  Inland Property Floater</li>
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
                                <!-- OLD -->
                                <!-- <div class="add-to-box product_detail_right col-md-6">
                    <div class="click_here_pdp">
                        <a href="#" class="produt_click_here">INQUIRE NOW</a>
                    </div>
                </div>
                <div class="add-to-box col-md-6">
                                    </div>
                <div class="add-to-box col-md-12">
                    <div class="click_here_pdp">
                        <a href="#" class="produt_click_here">INQUIRE NOW</a>
                    </div>
                </div> -->
                                <!-- END  OLD -->
                                <!-- Modified -->
                                <div class="add-to-box col-md-12">
                                    <div class="click_here_pdp">
                                        <a href="{{ url('/product-inquiry/marine-insurance') }}" dataid="26"
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
                                                                    title="Truckers' Liability Plus" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-19" class="landscape" src="{{  url('/images/Product Images/Truckers Liability.jpg')   }}"
                                                                        alt="Truckers' Liability Plus" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 95px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{  url('/images/Product Images/Truckers Liability.jpg')   }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/truckers-liability-plus')}}" title="Truckers' Liability Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
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
                                                <!-- trust-receipt -->
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
                                                                    title="Home Excel Plus" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/Trust Receipt.jpg')  }}"
                                                                        alt="Home Excel Plus" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 95px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{ url('/images/Product Images/Trust Receipt.jpg')  }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/images/trust-receipt')}}" title="Home Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
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
