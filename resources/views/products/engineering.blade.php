@extends('layouts.app')

@section('content')
	<div class="top-container">
    <!-- config enabled always -->
    <div class="custom-banner custom-page-banner" data-uri-path="/products/product-lines/engineering">
        <div class="page-banner-wrapper">
            <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/banner_engineering_2.jpg') }}');">
            </div>
            <div class="text-banner-wrapper">
                <h3 class="short-description">
                    Construct with complete<br>
                    confidence
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
                        <li class="product"><strong>Engineering</strong> </li>
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
                jQuery('#finish_and_checkout').click(function() {
                    try {
                        parent.location.href = 'https://www.ucpbgen.com/checkout/cart/';
                    } catch (err) {
                        location.href = 'https://www.ucpbgen.com/checkout/cart/';
                    }
                });
                jQuery('#continue_shopping').click(function() {
                    jQuery('#after-loading-success-message').fadeOut(200);
                    clearTimeout(ajaxcart_timer);
                    setTimeout(function() {
                        jQuery('#after-loading-success-message .timer').text(ajaxcart_sec);
                    }, 1000);
                });
</script>

            <script type="text/javascript">
                var optionsPrice = new Product.OptionsPrice([]);
</script>

            <div id="messages_product_view">
            </div>
            <div class="product-view">
                <div class="product-essential">
                    <form action="https://www.ucpbgen.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cudWNwYmdlbi5jb20vcHJvZHVjdHMvcHJvZHVjdC1saW5lcy9lbmdpbmVlcmluZw,,/product/22/form_key/fgENrKlpVDgznHxk/"
                    method="post" id="product_addtocart_form">
                    <input name="form_key" type="hidden" value="fgENrKlpVDgznHxk">
                    <div class="no-display">
                        <input type="hidden" name="product" value="22">
                        <input type="hidden" name="related_product" id="related-products-field" value="">
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="short-description col-md-12">
                            <div class="product-name col-md-12">
                                <h1>
                                    Engineering</h1>
                            </div>
                            <div class="std col-md-12 prod-desc">
                                <p style="line-height: inherit;">
                                   Developed to ensure the economic safeguard of any ongoing construction development projects, COCOGEN offers the following Engineering Insurance coverages to all contractors and business owners, protecting the most common on-field risks:

                                </p>
                                <ul id="fire_coverage">
                                    <li><i class="fa fa-check-square-o text-success"></i> Contractor’s All Risks</li>
                                    <li><i class="fa fa-check-square-o text-success"></i> Erection All Risks</li>
                                    <li><i class="fa fa-check-square-o text-success"></i> Machinery Breakdown</li>
                                    <li><i class="fa fa-check-square-o text-success"></i> Deterioration of Stocks</li>
                                    <li><i class="fa fa-check-square-o text-success"></i> Electronic Equipment Insurance</li>
                                    <li><i class="fa fa-check-square-o text-success"></i> Machinery Loss of Profits</li>
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
                                <a href="{{ url('/product-inquiry/engineering-insurance') }}" dataid="22"
                                    class="produt_click_here">INQUIRE NOW</a>
                            </div>
                        </div>
                        
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
                                                                <h2 class="product-name" style="margin-top: -20px;">
                                                                    <a href="{{ url('/bonds-and-suretyship-insurance') }}" title="Bonds and Surety" style="font-size: 18px;color: #00539e;opacity: 0.9">Bonds and Surety
                                                                    </a>
                                                                </h2>
                                                                <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                                    Keeping your contracts in check
                                                                </div>
                                                            </div>
                                                            <div class="actions abs" style="text-align: center;">
                                                                <a href="{{ url('/product-inquiry/bonds-and-suretyship-insurance') }}" dataid="28" class="click-here inquiry form-control"
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
@endsection
