@extends('layouts.app')

@section('content')
	<!-- Modal -->
<!-- /.modal -->

        <!-- Modal -->
        <!-- /.modal -->
        <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/products/product-lines/bonds-and-suretyship">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="fa fa-angle-right"></i></span>
                                </li>
                                <li class="category6"><a href="{{ url('/products') }}" title="">
                                    Products</a> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                                    </i></span></li>
                                <li class="category6"><a href="{{ url('/product-lines') }}" title="">
                                    Product Lines</a> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                                    </i></span></li>
                                <li class="product"><strong>Bonds and Surety Insurance</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div id="loading-mask">
                        <div class="background-overlay">
                        </div>
                        <p id="loading_mask_loader" class="loader">
                            <i class="ajax-loader large animate-spin"></i>
                        </p>
                    </div>
                    <div id="after-loading-success-message">
                        <div class="background-overlay">
                        </div>
                        <div id="success-message-container" class="loader">
                            <div class="msg-box">
                                Product was successfully added to your shopping cart.</div>
                            <button type="button" name="finish_and_checkout" id="finish_and_checkout" class="button btn-cart">
                                <span><span>Go to cart page </span></span>
                            </button>
                            <button type="button" name="continue_shopping" id="continue_shopping" class="button btn-cart">
                                <span><span>Continue </span></span>
                            </button>
                        </div>
                    </div>

                   

                    <script type="text/javascript">
                        var optionsPrice = new Product.OptionsPrice([]);
</script>

                    <div id="messages_product_view">
                    </div>
                    <div class="product-view">
                        <div class="product-essential">
                            <form
                            method="post" id="product_addtocart_form">
                            <input name="form_key" type="hidden" value="fgENrKlpVDgznHxk">
                            <div class="no-display">
                                <input type="hidden" name="product" value="28">
                                <input type="hidden" name="related_product" id="related-products-field" value="">
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="short-description col-md-12">
                                    <div class="product-name col-md-12">
                                        <h1>
                                            Bonds and Surety Insurance</h1>
                                    </div>
                                    <div class="std col-md-12 prod-desc">
                                        <p style="line-height: inherit;">
                                            As contractors, guarantee the success of your projects by securing COCOGEN Bonds and Suretyship requirements. Whether its construction, judicial, customs or real-estate brokers' requirements, make it a point to ensure compliance with COCOGEN.                                              </p>
                                        <p>
                                            <ul id="fire_coverage"> <li><strong>Types of bonds offered:</strong></li></ul></p>
                                        <ul id="fire_coverage">
                                            <li><strong>Construction</strong>
                                                <ul>
                                                    <li>Bidder’s Bond</li>
                                                    <li>Surety Bond</li>
                                                    <li>Performance Bond</li>
                                                    <li>Guaranty Workmanship Bond</li>
                                                </ul>
                                            </li>
                                            <li><strong>Judicial</strong>
                                                <ul>
                                                    <li>Attachment Bond</li>
                                                    <li>Replevin Bond</li>
                                                    <li>Heir’s Bond</li>
                                                    <li>Supersedeas Bond</li>
                                                </ul>
                                            </li>
                                            <li><strong>Customs</strong>
                                                <ul>
                                                    <li>Surety Bond</li>
                                                </ul>
                                            </li>
                                            <li><strong>Real Estate Broker’s Bond</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row product_details_info">
                                <div class="col-md-12">
                                    <p style="text-align: center;">
                                        For Product Related Inquiries</p>
                                    <p style="text-align: center;">
                                        Want to know more? Allow us to help you find the best insurance cover for you based from your needs. <br> <br>  </p>
                                </div>
                               
                                <div class="add-to-box col-md-12">
                                    <div class="click_here_pdp">
                                        <a href="{{ url('/product-inquiry/bonds-and-suretyship-insurance') }}" dataid="28"
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
                                                                    <h2 class="product-name" style="margin-top: -20px;">
                                                                        <a href="{{ url('/inquiries/product-inquiry/engineering-insurance  ') }}" title="Engineering" style="font-size: 18px;color: #00539e;opacity: 0.9">
                                                                            Engineering </a>
                                                                    </h2>
                                                                    <div class="short-description-wrapper" style="overflow-wrap: break-word;" >
                                                                        Construct with complete confidence.
                                                                    </div>
                                                                </div>
                                                                <div class="actions abs" style="text-align: center;">
                                                                    <a href="{{ url('/product-inquiry/engineering-insurance  ') }}" dataid="22" class="click-here inquiry form-control"
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
        <!-- /.modal -->

@endsection
