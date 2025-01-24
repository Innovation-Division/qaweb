@extends('layouts.app')

@section('content')
<div class="top-container">
                <!-- config enabled always -->
                <div class="custom-banner custom-page-banner" data-uri-path="/updates/magilas">
                    <div class="page-banner-wrapper">
                        <div class="image-banner-wrapper" style="background-image: url(./images/magilas_banner_image_1.jpg);">
                        </div>
                        <div class="text-banner-wrapper">
                            <h3 class="short-description">
                                <p class="hide">
                                    hide</p>
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
                                        <span class="breadcrumbs-split"><i class="fa fa-angle-right"></i></span>
                                    </li>
                                    <li class="category29"><a href="{{ url('/updates') }}" title="">Updates</a>
                                        <span class="breadcrumbs-split"><i class="fa fa-angle-right"></i></span>
                                    </li>
                                    <li class="category78"><strong>Magilas</strong> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
<div class="category-name container">
                    <h1>
                        Magilas
                    </h1>
                </div>
                <div class="category-banner container">
                    COCOGEN-Adopted Philippine Eagle
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
                            jQuery(document).ready(function() {
                                //set href for 6 file claims
                                var voidurl = "javascript:void(0)";
                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(1) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(1) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_motor");

                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(2) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(2) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_fire");

                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(3) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(3) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_marine");

                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(4) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(4) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_fidelity");

                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(5) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(5) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_engineering");

                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(6) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                                jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(6) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_casualty");

                                jQuery('.col-md-4.col-sm-6.col-xs-12 > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').click(function() {
                                    var modalid = jQuery(this).attr("modal-name");
                                    jQuery("#" + modalid).modal({ show: true });
                                });


                            });

                        </script>

                        <div class="page-title category-title">
                            <h1>
                                Magilas</h1>
                        </div>
                        <style type="text/css">
                            <!
                            -- .magilas p
                            {
                                font-size: 16px;
                            }
                            .magilas p.desc
                            {
                                font-size: 12px;
                                color:  #000000;
                                opacity: 1;
                            }
                            -- ></style>
                        <div class="magilas row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 text-center">
                                <img alt="Magilas" class="img-responsive" style="max-width: 50%;max-height: 50%;margin-left: 25%;" src="{{ url('/images/Magilas_Logo_PNG.png') }}">
                                <p class="desc">
                                    <br>
                                    COCOGEN introduces an emblem featuring an artistic representation of Magilas signifying
                                    the company’s commitment to environmental advocacy.</p>
                            </div>
                            <div class="col-xs-12">
                                <br>
                                <br>
                                <div class="col-sm-4">
                                    <img alt="Magilas" class="img-responsive" src="{{ url('/images/Magilas_Side_Image-min.jpg') }}">
                                    <br>
                                    <br>
                                </div>
                                <div class="col-sm-8" style="margin-top: 67px;">
                                    <p>
                                        The Philippine Eagle is one of the most critically endangered species in the Philippines.
                                        Reports show that only 400 of this kind exist in the world, and sadly, the numbers
                                        are diminishing.</p>
                                    <br>
                                    <p>
                                        This is very reason why the Philippine Eagle Foundation exists. PEF is a non-profit
                                        organization committed to promote the survival of the Philippine Eagle and the biodiversity
                                        it represents.</p>
                                    <br>
                                    <p>
                                        As part of its commitment to environmental preservation, UCPB General Insurance
                                        Company, Inc. (COCOGEN) partnered with PEF to adopt a Philippine Eagle.</p>
                                    <br>
                                    <p>
                                        COCOGEN picked a 15-year old male Philippine Eagle and named it “Magilas” which
                                        represents agility.</p>
                                    <br>
                                    <p>
                                        The company aims to create awareness to the general public especially its stakeholders
                                        to take action to save the world we live in, to make it a better place, not just
                                        for humans, but for also for the animals that existed way before we did.</p>
                                    <br>
                                    <p>
                                        To know more about Magilas, PEF and its other environmental initiatives, you may
                                        visit the <a href="http://www.philippineeaglefoundation.org" title="Philippine Eagle Foundation">
                                            Philippine Eagle Foundation</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="resultLoading" style="display: none; width: 100%; height: 100%; position: fixed;
                        z-index: 10000000; top: 0px; left: 0px;">
                        <div style="width: 100%; text-align: center; position: absolute; left: 0px; top: 50%;
                            font-size: 16px; z-index: 10; color: rgb(255, 255, 255);">
                            <i class="ajax-loader large animate-spin"></i>
                            <div>
                            </div>
                        </div>
                        <div class="bg" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.5;
                            width: 100%; height: 100%; position: absolute; top: 0px;">
                        </div>
                    </div>
                </div>
            </div>
@endsection
