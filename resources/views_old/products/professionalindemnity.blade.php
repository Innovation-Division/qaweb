@extends('layouts.app')

@section('content')
	
        <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/products/products-packages/specialty-lines-insurance/professional-indemnity">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page"> Home </a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                 <li class="category6"><a href="{{ url('/products') }}" title="">
                                     Products </a> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                                    </i></span></li>
                                <li class="category6"><a href="{{ url('/product-lines') }}" title="">
                                     Product Lines </a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                             <li class="category6"><a href="{{ url('/miscellaneous-casualty-lines') }}" title="">
                                    Miscellaneous Casualty Lines</a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                <li class="product"><strong>Professional Indemnity</strong> </li>
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
                            <form method="post" id="product_addtocart_form">
                            <input name="form_key" type="hidden" value="OUCpy2ti6oV0afZw">
                            <div class="no-display">
                                <input type="hidden" name="product" value="39">
                                <input type="hidden" name="related_product" id="related-products-field" value="">
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="short-description col-md-12">
                                    <div class="product-name col-md-12">
                                        <h1>
                                            Professional Indemnity</h1>
                                    </div>
                                    <div class="std col-md-12 prod-desc">
                                        <p style="line-height: inherit;">
                                            COCOGEN's Professional Indemnity Insurance is designed to protect companies and individuals providing professional service from claims made by clients of negligent acts, negligent errors or negligent omissions in the conduct of profession. Professional Liability Insurance will cover the costs and expenses in the defense and settlement of claim.
                                        </p>
                                        <br>
                                        <p>
                                            <strong>Who are covered?</strong></p>
                                        <ul id="fire_coverage">
                                            <li><i class="fa fa-check-square-o text-success"></i> Engineers and Architects</li>
                                            <li><i class="fa fa-check-square-o text-success"></i> Accountants and Auditors</li>
                                            <li><i class="fa fa-check-square-o text-success"></i> Media/Advertising Consultants</li>
                                            <li><i class="fa fa-check-square-o text-success"></i> Property Managers/Surveyors</li>
                                            <li><i class="fa fa-check-square-o text-success"></i> IT Professionals</li>
                                            <li><i class="fa fa-check-square-o text-success"></i> Lawyers</li>
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
                                        <a href="{{ url('/product-inquiry/professional-indemnity-insurance') }}" dataid="39"
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
                                                <!-- miscellaneous-casualty-insurance -->
                                                <li class="item">
                                                    <div class="item-area box-shadow">
                                                        <div class="product-image-area">
                                                            <div class="loader-container">
                                                                <div class="loader">
                                                                    <i class="ajax-loader medium animate-spin"></i>
                                                                </div>
                                                            </div>
                                                            <a href="{{ url('/miscellaneous-casualty-insurance') }}" class="quickview-icon">
                                                                <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/images/product_lines/liability_casualty.jpg') }}"
                                                                    title="Miscellaneous Casualty" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Tiles/final/COCOGEN Miscellaneous Casualty Insurance.jpg')  }}"
                                                                        alt="Miscellaneous Casualty" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 95px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{ url('/images/Tiles/final/COCOGEN Miscellaneous Casualty Insurance.jpg')  }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/images/product_lines/liability_casualty.jpg')}}" title="Miscellaneous Casualty" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                                        Miscellaneous Casualty </a>
                                                                </h2>
                                                                <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                                   <!--  Protect the home that protects you -->
                                                                </div>
                                                            </div>
                                                            <div class="actions abs" style="text-align: center;">
                                                                <a href="{{ url('/product-inquiry/miscellaneous-casualty-insurance') }}" dataid="19"
                                                                    class="click-here inquiry form-control" title="INQUIRY">
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
                                                                        travel excel plus </a>
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
