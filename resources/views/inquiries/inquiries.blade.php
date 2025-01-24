@extends('layouts.app')

@section('content')
	
        <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/inquiries">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category40"><strong>Inquiries</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    Inquiries
                </h1>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="category-grid-block category-grid-block-layered-nav">
                        <div class="category-grid-block-title hide">
                            <h2>
                                <span>Inquiries</span></h2>
                        </div>
                        <div class="category-grid-block-content">
                            <div class="category-row row row-margin-bottom">
                                <!-- <div class="row-wrapper"> -->
                                <div class="col-md-4 col-sm-6 lib-item" data-category="view">
                                    <div class="lib-panel">
                                        <div class="row box-shadow image-box">
                                            <a href="{{ url('/faqs') }}">
                                                <div class="thumbnail-wrapper">
                                                    <img class="category-image lib-img-show landscape" src="{{ url('/images/inquiries/ucpb-general-insurance-faq.png') }}"
                                                        alt="FAQs" title="FAQs">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row box-shadow caption-box detail-box" style="min-height: 89px;">
                                            <div class="col-md-12">
                                                <div class="lib-row lib-header">
                                                    <!-- <a href="https://www.ucpbgen.com/inquiries/faqs">FAQs</a> (0) -->
                                                    <h3>
                                                        <a href="{{ url('/faqs') }}">FAQs </a>
                                                    </h3>
                                                    <!-- <div class="lib-header-seperator"></div> -->
                                                </div>
                                                <div class="lib-row lib-desc" style="overflow-wrap: break-word;font-family: muli">
                                                    Your most commonly asked questions answered
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row box-shadow caption-box action-box">
                                            <a href="{{ url('/faqs') }}" class="btn view-details col-md-12 col-sm-12 col-xs-12">
                                                VIEW DETAILS</a>
                                            <div class="btn get-quote col-md-6 hide">
                                                GET QUOTE</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-1 col-sm-1 column-divider"></div> -->
                                <!-- </div> -->
                                <!-- <div class="row-wrapper"> -->
                                <div class="col-md-4 col-sm-6 lib-item" data-category="view">
                                    <div class="lib-panel">
                                        <div class="row box-shadow image-box">
                                            <a href="{{ url('/product-inquiry') }}">
                                                <div class="thumbnail-wrapper">
                                                    <img class="category-image lib-img-show landscape" src="{{ url('/images/inquiries/product-inquiry2.jpg') }}"
                                                        alt="Product Inquiry" title="Product Inquiry">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row box-shadow caption-box detail-box" style="min-height: 89px;">
                                            <div class="col-md-12">
                                                <div class="lib-row lib-header">
                                                    <!-- <a href="https://www.ucpbgen.com/inquiries/product-inquiry">Product Inquiry</a> (0) -->
                                                    <h3>
                                                        <a href="{{ url('/product-inquiry') }}">Product Inquiry </a>
                                                    </h3>
                                                    <!-- <div class="lib-header-seperator"></div> -->
                                                </div>
                                                <div class="lib-row lib-desc is-truncated" style="overflow-wrap: break-word;font-family: muli">
                                                    Do you have any questions about our products? We’d be happy to tell you...
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row box-shadow caption-box action-box">
                                            <a href="{{ url('/product-inquiry') }}" class="btn view-details col-md-12 col-sm-12 col-xs-12">
                                                VIEW DETAILS</a>
                                            <div class="btn get-quote col-md-6 hide">
                                                GET QUOTE</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-1 col-sm-1 column-divider"></div> -->
                                <div class="col-5-clearfix">
                                </div>
                                <!-- </div> -->
                                <!-- <div class="row-wrapper"> -->
                                <div class="col-md-4 col-sm-6 lib-item" data-category="view">
                                    <div class="lib-panel">
                                        <div class="row box-shadow image-box">
                                            <a href="{{ url('/locate-a-branch') }}">
                                                <div class="thumbnail-wrapper">
                                                    <img class="category-image lib-img-show landscape" src="{{ url('/images/inquiries/locate-a-branch.jpg') }}"
                                                        alt="Locate a Branch" title="Locate a Branch">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row box-shadow caption-box detail-box" style="min-height: 89px;">
                                            <div class="col-md-12">
                                                <div class="lib-row lib-header">
                                                    <!-- <a href="https://www.ucpbgen.com/catalog/category/view/s/locate-a-branch/id/43/">Locate a Branch</a> (0) -->
                                                    <h3>
                                                        <a href="{{ url('/locate-a-branch') }}">Locate
                                                            a Branch </a>
                                                    </h3>
                                                    <!-- <div class="lib-header-seperator"></div> -->
                                                </div>
                                                <div class="lib-row lib-desc" style="overflow-wrap: break-word;font-family: muli;">
                                                    Find the nearest UCPB GEN branch office in your area!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row box-shadow caption-box action-box">
                                            <a href="{{ url('/locate-a-branch') }}""
                                                class="btn view-details col-md-12 col-sm-12 col-xs-12">VIEW DETAILS</a>
                                            <div class="btn get-quote col-md-6 hide">
                                                GET QUOTE</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-1 col-sm-1 column-divider"></div> -->
                                <div class="col-3-clearfix">
                                </div>
                                <!-- </div> -->
                                <!-- <div class="row-wrapper"> -->
                                <div class="col-md-4 col-sm-6 lib-item" data-category="view">
                                    <div class="lib-panel">
                                        <div class="row box-shadow image-box">
                                            <a href="{{ url('/client-services') }}">
                                                <div class="thumbnail-wrapper">
                                                    <img class="category-image lib-img-show landscape" src="{{ url('/images/inquiries/customer-service2.jpg') }}"
                                                        alt="Customer Service" title="Customer Service">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row box-shadow caption-box detail-box" style="min-height: 89px;">
                                            <div class="col-md-12">
                                                <div class="lib-row lib-header">
                                                    <!-- <a href="{{ url('/client-services') }}">Customer Service</a> (0) -->
                                                    <h3>
                                                        <a href="{{ url('/client-services') }}">Client Services </a>
                                                    </h3>
                                                    <!-- <div class="lib-header-seperator"></div> -->
                                                </div>
                                                <div class="lib-row lib-desc is-truncated" style="overflow-wrap: break-word;font-family: muli;">
                                                    Our Customer Service Center is just one phone call away. Dial 830-6000 and...
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row box-shadow caption-box action-box">
                                            <a href="{{ url('/client-services') }}" class="btn view-details col-md-12 col-sm-12 col-xs-12">
                                                VIEW DETAILS</a>
                                            <div class="btn get-quote col-md-6 hide">
                                                GET QUOTE</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-1 col-sm-1 column-divider"></div> -->
                                <div class="col-5-clearfix">
                                </div>
                                <!-- </div> -->
                                <!-- <div class="row-wrapper"> -->
                                <div class="col-md-4 col-sm-6 lib-item" data-category="view">
                                    <div class="lib-panel">
                                        <div class="row box-shadow image-box">
                                            <a href="{{ url('/feedback') }}">
                                                <div class="thumbnail-wrapper">
                                                    <img class="category-image lib-img-show landscape" src="{{ url('/images/inquiries/abc.jpg') }}"
                                                        alt="Feedback" title="Feedback">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row box-shadow caption-box detail-box" style="min-height: 89px;">
                                            <div class="col-md-12">
                                                <div class="lib-row lib-header">
                                                    <!-- <a href="{{ url('/feedback') }}">Feedback</a> (0) -->
                                                    <h3>
                                                        <a href="{{ url('/feedback') }}">Feedback </a>
                                                    </h3>
                                                    <!-- <div class="lib-header-seperator"></div> -->
                                                </div>
                                                <div class="lib-row lib-desc is-truncated" style="overflow-wrap: break-word;font-family: muli;">
                                                    At UCPB GEN, we understand your value and your investments. But more...
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row box-shadow caption-box action-box">
                                            <a href="{{ url('/feedback') }}" class="btn view-details col-md-12 col-sm-12 col-xs-12">
                                                VIEW DETAILS</a>
                                            <div class="btn get-quote col-md-6 hide">
                                                GET QUOTE</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-1 col-sm-1 column-divider"></div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="page-title category-title">
                        <h1>
                            Inquiries</h1>
                    </div>
                </div>
            </div>
        </div>
@endsection
