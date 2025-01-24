@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/motor">
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
                                <li class="category55"><a href="{{ url('/excel-plus-packages') }}" title="">
                                    Excel Plus Packages</a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                <li class="product"><strong>Motor Excel Plus</strong> </li>
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
                            <input name="form_key" type="hidden" value="fgENrKlpVDgznHxk">
                            <div class="no-display">
                                <input type="hidden" name="product" value="20">
                                <input type="hidden" name="related_product" id="related-products-field" value="">
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="short-description col-md-12">
                                    <div class="product-name col-md-12">
                                        <h1>
                                            MOTOR EXCEL PLUS</h1>
                                    </div>
                                    <div class="std col-md-12 prod-desc">
                                        <p style="line-height: inherit;">
                                           Driving conditions on the road grow more and more unpredictable these days it's no longer enough to practice responsible and defensive driving. Shift to broader protection with COCOGEN Motor Excel Plus. When facing unforgiving roads and uncontrollable traffic, protect your car - as well as the people in it - with comprehensive our comprehensive car insurance coverage:                        </p>
                                        <ul>
                                            <li><strong><span style="font-size: medium; color: #000000;">Loss or damage to insured vehicle and its accessories/spare parts due to:</span></strong>
                                                <ul>
                                                    <li>Accident collision or overturning</li>
                                                    <li>Fire, external explosion, self-ignition or lightning</li>
                                                    <li>Burglary or Theft (including carnapping)</li>
                                                    <li>Malicious act</li>
                                                    <li>Transit by road, rail, inland waterway, lift or elevator</li>
                                                   
                                                </ul>
                                            </li>
                                            <li><strong><span style="font-size: medium; color: #000000;">Compulsory Third Party
                                                Liability (CTPL)</span></strong>
                                                <ul>
                                                    <li>Required by law for car registration to protect the insured against liability in
                                                        respect of bodily injury and/or death to the third party</li>
                                                </ul>
                                            </li>
                                            <li><strong><span style="font-size: medium; color: #000000;">Voluntary Third Party Liability
                                                (TPL)</span></strong>
                                                <ul>
                                                    <li><span style="color: #000000;">Pays for legal liability on bodily injury in excess of the limit set forth under CTPL Coverage</span></li>
                                                    <li><span style="color: #000000;">Pays for property damage to third party arising from an accident caused by or arising out of the use of the vehicle</span></li>
                                                </ul>
                                            </li>
                                            <li><strong><span style="font-size: medium; color: #000000;">Auto Personal Accident
                                                for Unnamed Driver and Passenger</span></strong>
                                                <ul>
                                                    <li><span style="color: #000000;">Indemnity for accidental death & disablement (AD & D) per seat up to a maximum of the authorized seating capacity on any one occurrence.</span></li>
                                                </ul>
                                            </li>
                                            <li><strong><span style="font-size: medium; color: #000000;">Plus Medical Expense Reimbursement</span></strong>
                                                <ul>
                                                    <li><span style="color: #000000;">Pays up to 10% of the AD&amp;D Benefit for the driver
                                                        and passenger arising from an accident on any one occurrence.</span></li>
                                                     <li><span style="color: #000000;">Optional Benefits (for an additional premium)</span></li>
                                                </ul>
                                            </li>
                                            <li><strong><span style="font-size: medium; color: #000000;">Extended Service: <a
                                                href="{{ url('/kalakbay-road-assistance') }}">KaLAKBAY</a></span></strong>
                                                <ul>
                                                    <li><span style="color: #000000;">Our kaLAKBAY Road Assistance service assists even
                                                        during the unexpected critical moments on the road. A 24-hour road assistance to
                                                        COCOGEN motorcar policyholders that can definitely give you peace of mind anytime
                                                        of the day and any day of the week!</span></li>
                                                </ul>
                                            </li>
                                            <li><strong><span style="font-size: medium; color: #000000;">Extended Service: <a
                                                href="{{ url('/gawa-agad-program') }}">Gawa Agad</a></span></strong>
                                                <ul>
                                                    <li><span style="color: #000000;">COCOGEN's exclusive Gawa Agad offer to our motor
                                                        insurance policyholders allows selected repair shops to process their claims instead
                                                        of having them go to our branches. </span></li>
                                                </ul>
                                            </li>
                                            <li><strong><span style="font-size: medium; color: #000000;">Optional Benefit (Additional
                                                Premium): Acts of God</span></strong>
                                                <ul>
                                                    <li><span style="color: #000000;">    Acts of Nature Pays for loss of damage to the vehicle and its accessories due to flood, typhoon, hurricane, volcanic eruption, earthquake or other natural calamities</span></li>
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
                              
                                <div class="add-to-box product_detail_right col-md-6">
                                    <div class="click_here_pdp">
                                        <a href="{{ url('/product-inquiry/motor-excel-plus-insurance') }}" dataid="20"
                                            class="produt_click_here">INQUIRE NOW</a>
                                    </div>
                                </div>

                                <div class="add-to-box col-md-6">
                                   <div class="click_here_pdp">
                                        <a href="{{ url('/get-quote') }}" dataid="20"
                                            class="produt_click_here">GET QUOTE</a>
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
                                                <!-- blackbox -->
                                                <!-- <li class="item">
                                                    <div class="item-area box-shadow">
                                                        <div class="product-image-area">
                                                            <div class="loader-container">
                                                                <div class="loader">
                                                                    <i class="ajax-loader medium animate-spin"></i>
                                                                </div>
                                                            </div>
                                                            <a href="{{ url('/blackbox-insurance') }}" class="quickview-icon">
                                                                <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/blackbox-insurance') }}"
                                                                    title="Home Excel Plus" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-19" class="landscape" src="{{ url('/images/Product Images/blackboxmenu.jpg') }}"
                                                                        alt="Home Excel Plus" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 95px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{ url('/images/Product Images/blackboxmenu.jpg') }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/blackbox-insurance')}}" title="Home Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9">
                                                                        Blackbox Insurance </a>
                                                                </h2>
                                                                <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                                   <!--  Protect the home that protects you -->
                                                               <!--  </div>
                                                            </div>
                                                            <div class="actions abs" style="text-align: center;">
                                                                <a href="{{ url('/product-inquiry/blackbox-insurance') }}" dataid="19"
                                                                    class="click-here inquiry form-control" title="INQUIRY">
                                                                    <i class="icon-cart"></i>
                                                                    <span>&nbsp;INQUIRY </span></a>
                                                                <div class="clearer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>  -->
                                                <!-- autoPA -->
                                                <li class="item">
                                                    <div class="item-area box-shadow">
                                                        <div class="product-image-area">
                                                            <div class="loader-container">
                                                                <div class="loader">
                                                                    <i class="ajax-loader medium animate-spin"></i>
                                                                </div>
                                                            </div>
                                                            <a href="{{ url('/auto-passenger-personal-accident-protect') }}" class="quickview-icon">
                                                                <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/auto-passenger-personal-accident-protect') }}"
                                                                    title="Condo Excel Protect" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-52" class="landscape" src="{{ url('/images/Product Images/autopa.jpg') }}"
                                                                        alt="Condo Excel Protect" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 100px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{ url('/images/Product Images/autopa.jpg') }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/images/protectionhome/hep.jpg') }}" title="Condo Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9;">
                                                                        Auto PA</a>
                                                                </h2>
                                                                <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                                    <!-- Make your urban living more comfortable -->
                                                                </div>
                                                            </div>
                                                            <div class="actions abs" style="text-align: center;">
                                                                <a href="{{ url('/product-inquiry/auto-passenger-personal-accident-protect') }}" dataid="52"
                                                                    class="click-here inquiry form-control" title="INQUIRY">
                                                                    <!-- <i class="icon-cart"></i> -->
                                                                    <span>&nbsp;INQUIRY </span></a>
                                                                <div class="clearer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- autoPA -->
                                             
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
