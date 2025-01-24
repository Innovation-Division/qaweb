@extends('layouts.app') @section('content') <span style="font-family: arial">

    <script type="text/javascript">
        // <![CDATA[
        window.onload = function() {
            var occ = document.createElement('script'); occ.type = 'text/javascript'; occ.async = true;
            occ.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.onlinechatcenters.com/code-31902-76901.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(occ, s);
        };
        // ]]>
    </script>

    <div class="top-container">
        <!-- config enabled always -->
        <div class="custom-banner custom-page-banner" data-uri-path="/products/excel-protect">
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 a-left">
                        <ul>
                            <li class="home"><a href="https://www.ucpbgen.com/" title="Go to Home Page" style="font-family: arial;font-weight: normal;">Home</a>
                                <span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
                            </li>
                            <li class="category5"><span style="font-family: arial;font-weight: normal;">Products</span> <span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true" ></i></span></li>
                            <li class="category55" style="font-family: arial;"><strong>Excel Protect</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="category-name container">
            <h1 style="font-family: arial;">
                Excel Protect
            </h1>
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
                    var data = "";
                    var active = false;
                    var next_page = "";
                    var loading = false;
                    var infinite_loaded_count = 0;
                    jQuery(function($) {
                        if ($('body').find('#resultLoading').attr('id') != 'resultLoading') {
                            $('.main').append('<div id="resultLoading" style="display:none"><div><i class="ajax-loader large animate-spin"></i><div></div></div><div class="bg"></div></div>');
                        }
                        var height = $('.main').outerHeight();
                        var width = $('.main').outerWidth();
                        $('.ui-slider-handle').css('cursor', 'pointer');

                        $('#resultLoading').css({
                            'width': '100%',
                            'height': '100%',
                            'position': 'fixed',
                            'z-index': '10000000',
                            'top': '0',
                            'left': '0'
                        });
                        $('#resultLoading .bg').css({
                            'background': '#fff',
                            'opacity': '0.5',
                            'width': '100%',
                            'height': '100%',
                            'position': 'absolute',
                            'top': '0'
                        });
                        $('#resultLoading>div:first').css({
                            'width': '100%',
                            'text-align': 'center',
                            'position': 'absolute',
                            'left': '0',
                            'top': '50%',
                            'font-size': '16px',
                            'z-index': '10',
                            'color': '#ffffff'

                        });


                        $('.block-layered-nav #narrow-by-list a').on('click', function(e) { if (!$(this).parent().hasClass('slider-range')) { sliderAjax($(this).attr('href')); } e.preventDefault(); });

                        next_page = "";
                        $(".pager li > a.next").each(function() {
                            next_page = $(this).attr("href");
                        });
                        $('.toolbar a').on('click', function(e) { if ($(this).attr('href')) { var url = $(this).attr('href'); sliderAjax(url); } e.preventDefault(); });

                        $('.toolbar select').removeAttr('onchange');
                        $('.toolbar select').on('change', function(e) { var url = $(this).val(); sliderAjax(url); e.preventDefault(); });


                    });

                    /*DONOT EDIT THIS CODE*/
                    var old_class;
                    function sliderAjax(url) {
                        if (!active) {
                            active = true;
                            jQuery(function($) {
                                if ($(".col-main .products-grid").attr("class"))
                                    old_class = $(".col-main .products-grid").attr("class");
                                oldUrl = url;
                                $('#resultLoading .bg').height('100%');
                                $('#resultLoading').fadeIn(300);
                                infinite_loaded_count = 0;
                                url = url.replace("&infinite=true", "");
                                url = url.replace("?infinite=true&", "?");
                                url = url.replace("?infinite=true", "");
                                var param = "";
                                if (url.indexOf("ajaxcatalog") == -1) {
                                    param = "ajaxcatalog=true";
                                    if (url.indexOf("?") == -1 && url.indexOf("&") > -1)
                                        url = url.replace("&", "?");
                                    if (url.indexOf("?") == -1)
                                        param = "?" + param;
                                    else
                                        param = "&" + param;
                                }

                                try {
                                    $('body').css('cursor', 'wait');
                                    $.ajax({
                                        url: url + param,
                                        dataType: 'json',
                                        type: 'post',
                                        data: data,
                                        success: function(data) {
                                            callback();
                                            if (data.viewpanel) {
                                                if ($('.block-layered-nav')) {
                                                    $('.block-layered-nav').empty();
                                                    $('.block-layered-nav').replaceWith(data.viewpanel)
                                                }
                                            }
                                            if (data.productlist) {
                                                $('.col-main .category-products').empty();
                                                $('.col-main .category-products').replaceWith(data.productlist)
                                            }
                                            if ($(".col-main").has(".category-products").length)
                                                $(".col-main .category-products").scrollToMe();

                                            $(".qty_inc").unbind('click').click(function() {
                                                if ($(this).parent().parent().children("input.qty").is(':enabled')) {
                                                    $(this).parent().parent().children("input.qty").val((+$(this).parent().parent().children("input.qty").val() + 1) || 0);
                                                    $(this).parent().parent().children("input.qty").focus();
                                                    $(this).focus();
                                                }
                                            });
                                            $(".qty_dec").unbind('click').click(function() {
                                                if ($(this).parent().parent().children("input.qty").is(':enabled')) {
                                                    $(this).parent().parent().children("input.qty").val(($(this).parent().parent().children("input.qty").val() - 1 > 0) ? ($(this).parent().parent().children("input.qty").val() - 1) : 0);
                                                    $(this).parent().parent().children("input.qty").focus();
                                                    $(this).focus();
                                                }
                                            });
                                            var hist = url;
                                            if (url.indexOf("p=") > -1) {
                                                var len = url.length - url.indexOf("p=");
                                                var str_temp = url.substr(url.indexOf("p="), len);
                                                var page_param = "";
                                                if (str_temp.indexOf("&") == -1) {
                                                    page_param = str_temp;
                                                } else {
                                                    page_param = str_temp.substr(0, str_temp.indexOf("&"));
                                                }
                                                hist = url.replace(page_param, "");
                                            }
                                            if (window.history && window.history.pushState) {
                                                window.history.pushState('GET', data.title, hist);
                                            }
                                            $('body').find('.toolbar select').removeAttr('onchange');
                                            $('#resultLoading .bg').height('100%');
                                            $('#resultLoading').fadeOut(300);
                                            $('body').css('cursor', 'default');

                                            $('.block-layered-nav #narrow-by-list a').on('click', function(e) { if (!$(this).parent().hasClass('slider-range')) { sliderAjax($(this).attr('href')); } e.preventDefault(); });

                                            next_page = "";
                                            $(".pager li > a.next").each(function() {
                                                next_page = $(this).attr("href");
                                            });

                                            $('.toolbar a').on('click', function(e) { if ($(this).attr('href')) { var url = $(this).attr('href'); sliderAjax(url); } e.preventDefault(); });

                                            $('.toolbar select').removeAttr('onchange');
                                            $('.toolbar select').on('change', function(e) { var url = $(this).val(); sliderAjax(url); e.preventDefault(); });
                                            $("a.product-image img.defaultImage").each(function() {
                                                var default_img = $(this).attr("src");
                                                if (!default_img)
                                                    default_img = $(this).attr("data-src");
                                                var thumbnail_img = $(this).parent().children("img.hoverImage").attr("src");
                                                if (!thumbnail_img)
                                                    thumbnail_img = $(this).parent().children("img.hoverImage").attr("data-src");
                                                if (default_img) {
                                                    if (default_img.replace("/small_image/", "/thumbnail/") == thumbnail_img) {
                                                        $(this).parent().children("img.hoverImage").remove();
                                                        $(this).removeClass("defaultImage");
                                                    }
                                                }
                                            });
                                            /* moving action links into product image area */
                                            $(".move-action .item .details-area .actions").each(function() {
                                                $(this).parent().parent().children(".product-image-area").append($(this));
                                            });
                                            if (old_class)
                                                $(".col-main .products-grid").attr("class", old_class);
                                        }
                                    })
                                } catch (e) { }
                            });
                            active = false
                        }
                        return false
                    }


                    function callback() {

                    }
                </script>

                <div class="modal fade bs-example-modal-lg" id="claim_motor" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog file-a-claim">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="modal-content">
                            <div class="modal-body">
                                <style type="text/css">
                                    <!
                                    -- .file-a-claim .fa
                                    {
                                        color: #53b947;
                                    }
                                    .file-a-claim .btn-green
                                    {
                                        background: #53b947;
                                        border-radius: 40px;
                                        color: #fff;
                                        font-size: 15px;
                                        font-weight: 400;
                                        padding: 12px 32px;
                                        text-decoration: none;
                                        text-transform: uppercase;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .file-a-claim .text-center
                                    {
                                        text-align: center;
                                    }
                                    .file-a-claim ul, ol
                                    {
                                        margin: 0 0 0 10px;
                                        padding: 10px 0 0 10px;
                                    }
                                    .file-a-claim .tbl
                                    {
                                        background-color: white;
                                        padding: 30px;
                                    }
                                    .file-a-claim .table-wrapper
                                    {
                                        overflow-x: auto;
                                        overflow-y: auto;
                                    }
                                    .file-a-claim table
                                    {
                                        color: #333;
                                        table-layout: fixed;
                                        word-break: break-word;
                                        width: 100%;
                                    }
                                    .file-a-claim table thead
                                    {
                                        background-color: #00539f;
                                        color: white;
                                    }
                                    .file-a-claim li
                                    {
                                        line-height: 1.7em;
                                    }
                                    .category-name h1
                                    {
                                        color: #00539e;
                                        font: 900 23px 'Muli';
                                        margin-bottom: 0px;
                                        text-transform: uppercase;
                                        word-break: break-word;
                                        word-wrap: break-word;
                                    }
                                    @media (max-width:768px)
                                    {
                                        .modal-dialog.file-a-claim
                                        {
                                            width: 100%;
                                        }
                                        .file-a-claim table
                                        {
                                            width: 850px;
                                        }
                                    }
                                    -- ></style>
                                <div class="row file-a-claim">
                                    <center>
                                        <div class="category-name">
                                            <h1>
                                                Motor Car</h1>
                                        </div>
                                    </center>
                                    <div class="category-banner">
                                        Gawa Agad is UCPB GEN's innovative concept in motor car insurance claims designed
                                        to improve claims processing time by authorizing selected repair shops to perform
                                        claims administration.</div>
                                    <br>
                                    <div class="col-xs-12 text-center">
                                        <a class="btn-green" href="/media/ucpb_pdfdocuments/ucpbpdf/Claims-Checklist_Motor.pdf"
                                            target="_blank">download now</a></div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                        <div class="table-wrapper">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="33%">
                                                            <strong>INSURED</strong>
                                                        </th>
                                                        <th class="text-center" width="34%">
                                                            <strong>THIRD PARTY (TP)</strong>
                                                        </th>
                                                        <th class="text-center" width="33%">
                                                            <strong>RECOVERY</strong>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong>A. PARTIAL LOSS/TOTAL LOSS</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Claimant’s Incident Report (UCPB GEN
                                                                    form to be accomplished by the Insured)</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Pictures of Damage</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Police Report and/or Driver’s</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Affidavit</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Stencils of Motor and Serial No.</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Copy of Insurance Policy</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Copy of OR or Proof of Premium Payment</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>A. VEHICLE</strong><br>
                                                            <span style="text-decoration: underline;">TP Claimant</span>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Repair Estimate</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Pictures of Damage</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Certificate of No Claim or CTPL Policy</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                            </ul>
                                                            <span style="text-decoration: underline;">Insured</span>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s Affidavit</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>A. FOR RECOVERY PURPOSES</strong><br>
                                                            <small><em>NOTE: If Insured was reportedly bumped by a third party, Insured has to provide
                                                                the following documents of party at fault:</em></small>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Copy of Insurance Policy</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Copy of TIN and SSS ID</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Contact Number</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>B. CARNAP</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Certificate of Non-Recovery</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Alarm Sheet</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Complaint Sheet</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Police Report</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Copy of Policy</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Copy of OR of Premium Payment</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>B. PROPERTY DAMAGE</strong><br>
                                                            <span style="text-decoration: underline;">TP Claimant</span>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Quotation of Repair Estimate</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Pictures of Damage</li>
                                                            </ul>
                                                            <span style="text-decoration: underline;">Insured</span>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s Affidavit</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>B. RECOVERY OF OTHER INSURANCE COMPANY</strong><br>
                                                            <small><em>NOTE: Insurance company has to submit their claim documents:</em></small>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Release of Claim</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Payment Voucher</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Policy of Adverse Party</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Pictures of Damage</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Repair Estimate / Computation of Liability</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Letter of Authority</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>C. BODILY INJURY</strong><br>
                                                            <small><em>Note: In addition to item A above</em></small>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Original Medical Receipts /OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Medical Certificate</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>C. BODILY INJURY</strong><br>
                                                            <span style="text-decoration: underline;">TP Claimant</span>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Original Medical Receipts /OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Medical Certificate</li>
                                                            </ul>
                                                            <span style="text-decoration: underline;">Insured</span>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and OR</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s Affidavit</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" id="claim_fire" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog file-a-claim">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="modal-content">
                            <div class="modal-body">
                                <style type="text/css">
                                    <!
                                    -- .file-a-claim .fa
                                    {
                                        color: #53b947;
                                    }
                                    .file-a-claim .btn-green
                                    {
                                        background: #53b947;
                                        border-radius: 40px;
                                        color: #fff;
                                        font-size: 15px;
                                        font-weight: 400;
                                        padding: 12px 32px;
                                        text-decoration: none;
                                        text-transform: uppercase;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .file-a-claim .text-center
                                    {
                                        text-align: center;
                                    }
                                    .file-a-claim ul, ol
                                    {
                                        margin: 0 0 0 10px;
                                        padding: 10px 0 0 10px;
                                    }
                                    .file-a-claim .tbl
                                    {
                                        background-color: white;
                                        padding: 30px;
                                    }
                                    /**/.file-a-claim .table-wrapper
                                    {
                                        overflow-x: auto;
                                        overflow-y: auto;
                                    }
                                    .file-a-claim table
                                    {
                                        color: #333;
                                        table-layout: fixed;
                                        word-break: break-word;
                                        width: 100%;
                                    }
                                    /**/.file-a-claim table thead
                                    {
                                        background-color: #00539f;
                                        color: white;
                                    }
                                    .file-a-claim li
                                    {
                                        line-height: 1.7em;
                                    }
                                    .category-name h1
                                    {
                                        color: #00539e;
                                        font: 900 23px 'Muli';
                                        margin-bottom: 0px;
                                        text-transform: uppercase;
                                        word-break: break-word;
                                        word-wrap: break-word;
                                    }
                                    /**/
                                    @media (max-width:768px)
                                    {
                                        .modal-dialog.file-a-claim
                                        {
                                            width: 100%;
                                        }
                                        .file-a-claim table
                                        {
                                            width: 850px;
                                        }
                                    }
                                    /**/
                                    -- ></style>
                                <div class="row file-a-claim">
                                    <center>
                                        <div class="category-name">
                                            <h1>
                                                Fire and Allied Perils</h1>
                                        </div>
                                    </center>
                                    <div class="category-banner">
                                        Need to process a claim for your fire insurance? Here are the following documents
                                        you'll need.</div>
                                    <br>
                                    <div class="col-xs-12 text-center">
                                        <a class="btn-green" href="/media/ucpb_pdfdocuments/ucpbpdf/Claims-Checklist_Fire-and-Allied-Perils.pdf"
                                            target="_blank">download now</a></div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                        <div class="table-wrapper">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="33%">
                                                            <strong>BASIC DOCUMENTS</strong>
                                                        </th>
                                                        <th class="text-center" width="34%">
                                                            <strong>ADDITIONAL DOCUMENTS</strong>
                                                        </th>
                                                        <th class="text-center" width="33%">
                                                            <strong>OPTIONAL DOCUMENTS</strong>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td rowspan="3" style="vertical-align: middle;">
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Fire Department Report / Affidavit of
                                                                    Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Photographs</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Detailed repair estimate(for building)</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Detailed inventory of all stocks and
                                                                    property risk whether damaged or undamaged (for stocks/FFF/contents)</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Adjuster’s Report, if assigned to adjuster</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>BUILDING</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Declaration of Real Property</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Floor Plan / Construction Plan</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>BUILDING</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Building Permit</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Lease Contract (if lot belongs to other
                                                                    than insured)</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Transfer Certificate of Title</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Appraisal Report (if any)</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>Stocks / FFF / Contents</strong>
                                                            <ul>
                                                                <ul>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Purchase / Sales Invoice</li>
                                                                </ul>
                                                            </ul>
                                                            <small><em>If assigned to adjuster</em></small>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Sworn Statement and Proof of Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Non-waiver Agreement</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>Stocks / FFF / Contents</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Income Tax Return / Financial Statements</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Business License</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration of Business</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <strong>Household Furniture, Fixture, Fittings and Personal Effects, Machinery, Equipment
                                                                andAccessories</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Appraisal Report</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" id="claim_marine" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog file-a-claim">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="modal-content">
                            <div class="modal-body">
                                <style type="text/css">
                                    <!
                                    -- .file-a-claim .fa
                                    {
                                        color: #53b947;
                                    }
                                    .file-a-claim .btn-green
                                    {
                                        background: #53b947;
                                        border-radius: 40px;
                                        color: #fff;
                                        font-size: 15px;
                                        font-weight: 400;
                                        padding: 12px 32px;
                                        text-decoration: none;
                                        text-transform: uppercase;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .file-a-claim .text-center
                                    {
                                        text-align: center;
                                    }
                                    .file-a-claim ul, ol
                                    {
                                        margin: 0 0 0 10px;
                                        padding: 10px 0 0 10px;
                                    }
                                    .file-a-claim .tbl
                                    {
                                        background-color: white;
                                        padding: 30px;
                                    }
                                    /**/.file-a-claim .table-wrapper
                                    {
                                        overflow-x: auto;
                                        overflow-y: auto;
                                    }
                                    .file-a-claim table
                                    {
                                        color: #333;
                                        table-layout: fixed;
                                        word-break: break-word;
                                        width: 100%;
                                    }
                                    /**/.file-a-claim table thead
                                    {
                                        background-color: #00539f;
                                        color: white;
                                    }
                                    .file-a-claim li
                                    {
                                        line-height: 1.7em;
                                    }
                                    .category-name h1
                                    {
                                        color: #00539e;
                                        font: 900 23px 'Muli';
                                        margin-bottom: 0px;
                                        text-transform: uppercase;
                                        word-break: break-word;
                                        word-wrap: break-word;
                                    }
                                    /**/
                                    @media (max-width:768px)
                                    {
                                        .modal-dialog.file-a-claim
                                        {
                                            width: 100%;
                                        }
                                        .file-a-claim table
                                        {
                                            width: 850px;
                                        }
                                    }
                                    /**/
                                    -- ></style>
                                <div class="row file-a-claim">
                                    <center>
                                        <div class="category-name">
                                            <h1>
                                                Marine</h1>
                                        </div>
                                    </center>
                                    <div class="category-banner">
                                        Speed up your marine insurance claims processing by having the following documents
                                        ready.</div>
                                    <br>
                                    <div class="col-xs-12 text-center">
                                        <a class="btn-green" href="/media/ucpb_pdfdocuments/ucpbpdf/Claims-Checklist_Marine,Fidelity,Engg.pdf"
                                            target="_blank">download now</a></div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                        <div class="table-wrapper">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="33%">
                                                            <strong>CARGO</strong>
                                                        </th>
                                                        <th class="text-center" width="34%">
                                                            <strong>IN LAND / TRUCK</strong>
                                                        </th>
                                                        <th class="text-center" width="33%">
                                                            <strong>HULL</strong>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong>BASIC DOCUMENTS</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Original &amp;/or duplicate copy of
                                                                    Bill of Lading</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Original &amp;/or duplicate copy of
                                                                    Invoice</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Formal claim against UCPB Gen</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Survey Report, if assigned to adjuster</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>BASIC DOCUMENTS</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Police Report / Affidavit of Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Invoice</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Registration Certificate and Official
                                                                    Receipt</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Driver’s License and Official Receipt</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Adjuster’s Report, if assigned to adjuster</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>BASIC DOCUMENTS</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Marine Note of Protest</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Repair estimates</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Photographs</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Survey Report</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>OPTIONAL DOCUMENTS</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Original copy of the Policy / Risk Note</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Original copy of Delivery Receipt</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Duly receipted formal claim against
                                                                    vessel, arrastre, and broker</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Original &amp;/or duplicate copy of
                                                                    Airway Bill</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Photographs</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>OPTIONAL DOCUMENTS</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Assured’s formal claim against UCPB
                                                                    Gen</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Photographs</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Waybill, Delivery Receipt</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>OPTIONAL DOCUMENTS</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Policy</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Gen. Ave. Adjuster’s Report</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Master Oath of Safe departure</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Coastwise License</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" id="claim_fidelity" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog file-a-claim">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="modal-content">
                            <div class="modal-body">
                                <style type="text/css">
                                    <!
                                    -- .file-a-claim .fa
                                    {
                                        color: #53b947;
                                    }
                                    .file-a-claim .btn-green
                                    {
                                        background: #53b947;
                                        border-radius: 40px;
                                        color: #fff;
                                        font-size: 15px;
                                        font-weight: 400;
                                        padding: 12px 32px;
                                        text-decoration: none;
                                        text-transform: uppercase;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .file-a-claim .text-center
                                    {
                                        text-align: center;
                                    }
                                    .file-a-claim ul, ol
                                    {
                                        margin: 0 0 0 10px;
                                        padding: 10px 0 0 10px;
                                    }
                                    .file-a-claim .tbl
                                    {
                                        background-color: white;
                                        padding: 30px;
                                    }
                                    /**/.file-a-claim .table-wrapper
                                    {
                                        overflow-x: auto;
                                        overflow-y: auto;
                                    }
                                    .file-a-claim table
                                    {
                                        color: #333;
                                        table-layout: fixed;
                                        word-break: break-word;
                                        width: 100%;
                                    }
                                    /**/.file-a-claim table
                                    {
                                        color: #333;
                                        table-layout: fixed;
                                        word-break: break-word;
                                    }
                                    .file-a-claim table thead
                                    {
                                        background-color: #00539f;
                                        color: white;
                                    }
                                    .file-a-claim li
                                    {
                                        line-height: 1.7em;
                                    }
                                    .category-name h1
                                    {
                                        color: #00539e;
                                        font: 900 23px 'Muli';
                                        margin-bottom: 0px;
                                        text-transform: uppercase;
                                        word-break: break-word;
                                        word-wrap: break-word;
                                    }
                                    /**/
                                    @media (max-width:768px)
                                    {
                                        .modal-dialog.file-a-claim
                                        {
                                            width: 100%;
                                        }
                                        .file-a-claim table
                                        {
                                            width: 850px;
                                        }
                                    }
                                    /**/
                                    -- ></style>
                                <div class="row file-a-claim">
                                    <center>
                                        <div class="category-name">
                                            <h1>
                                                Fidelity</h1>
                                        </div>
                                    </center>
                                    <div class="category-banner">
                                        About to make a fidelity claim? We've listed all the documents you have to prepare
                                        for a faster, easier process.</div>
                                    <div class="col-xs-12 text-center">
                                        <br>
                                        <a class="btn-green" href="/media/ucpb_pdfdocuments/ucpbpdf/Claims-Checklist_Marine,Fidelity,Engg.pdf"
                                            target="_blank">download now</a>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                            <div class="table-wrapper">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" width="50%">
                                                                <strong>BASIC DOCUMENTS</strong>
                                                            </th>
                                                            <th class="text-center" width="50%">
                                                                <strong>OPTIONAL DOCUMENTS</strong>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Audit Report showing discovery date
                                                                        &amp; breakdown of loss</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Documents in support of Audit Report
                                                                        such as official receipts, invoices, sales &amp; collection reports</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Adjuster’s Report, if assigned to adjuster</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>SSS / BIR / NBI / Personal Data Sheet
                                                                        (201 File) / Driver’s License No. of the Employee</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Company procedures as to duties of employees</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Action was taken to recover loss such
                                                                        as filing of criminal case</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Duties and responsibilities of the involved
                                                                        employee</li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" id="claim_engineering" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog file-a-claim">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="modal-content">
                            <div class="modal-body">
                                <style type="text/css">
                                    <!
                                    -- .file-a-claim .fa
                                    {
                                        color: #53b947;
                                    }
                                    .file-a-claim .btn-green
                                    {
                                        background: #53b947;
                                        border-radius: 40px;
                                        color: #fff;
                                        font-size: 15px;
                                        font-weight: 400;
                                        padding: 12px 32px;
                                        text-decoration: none;
                                        text-transform: uppercase;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .file-a-claim .text-center
                                    {
                                        text-align: center;
                                    }
                                    .file-a-claim ul, ol
                                    {
                                        margin: 0 0 0 10px;
                                        padding: 10px 0 0 10px;
                                    }
                                    .file-a-claim .tbl
                                    {
                                        background-color: white;
                                        padding: 30px;
                                    }
                                    /**/.file-a-claim .table-wrapper
                                    {
                                        overflow-x: auto;
                                        overflow-y: auto;
                                    }
                                    .file-a-claim table
                                    {
                                        color: #333;
                                        table-layout: fixed;
                                        word-break: break-word;
                                        width: 100%;
                                    }
                                    /**/.file-a-claim table thead
                                    {
                                        background-color: #00539f;
                                        color: white;
                                    }
                                    .file-a-claim li
                                    {
                                        line-height: 1.7em;
                                    }
                                    .category-name h1
                                    {
                                        color: #00539e;
                                        font: 900 23px 'Muli';
                                        margin-bottom: 0px;
                                        text-transform: uppercase;
                                        word-break: break-word;
                                        word-wrap: break-word;
                                    }
                                    /**/
                                    @media (max-width:768px)
                                    {
                                        .modal-dialog.file-a-claim
                                        {
                                            width: 100%;
                                        }
                                        .file-a-claim table
                                        {
                                            width: 850px;
                                        }
                                    }
                                    /**/
                                    -- ></style>
                                <div class="row file-a-claim">
                                    <center>
                                        <div class="category-name">
                                            <h1>
                                                Engineering</h1>
                                        </div>
                                    </center>
                                    <div class="category-banner">
                                        Process your engineering claim with ease by making sure you have the following documents
                                        ready.</div>
                                    <div class="col-xs-12 text-center">
                                        <br>
                                        <a class="btn-green" href="/media/ucpb_pdfdocuments/ucpbpdf/Claims-Checklist_Marine,Fidelity,Engg.pdf"
                                            target="_blank">download now</a>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                            <div class="table-wrapper">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" width="50%">
                                                                <strong>BASIC DOCUMENTS</strong>
                                                            </th>
                                                            <th class="text-center" width="50%">
                                                                <strong>OPTIONAL DOCUMENTS</strong>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Police Report / Affidavit of Loss</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Photographs</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Estimate &amp;/or Actual Repair Cost</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Adjuster’s Report, if assigned to adjuster</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Invoices &amp;/or receipts</li>
                                                                    <li><em class="fa fa-check-square-o fa-lg"></em>Technician’s Report</li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" id="claim_casualty" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog file-a-claim">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="modal-content">
                            <div class="modal-body">
                                <style type="text/css">
                                    <!
                                    -- .file-a-claim .fa
                                    {
                                        color: #53b947;
                                    }
                                    .file-a-claim .btn-green
                                    {
                                        background: #53b947;
                                        border-radius: 40px;
                                        color: #fff;
                                        font-size: 15px;
                                        font-weight: 400;
                                        padding: 12px 32px;
                                        text-decoration: none;
                                        text-transform: uppercase;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .file-a-claim .text-center
                                    {
                                        text-align: center;
                                    }
                                    .file-a-claim ul, ol
                                    {
                                        margin: 0 0 0 10px;
                                        padding: 10px 0 0 10px;
                                    }
                                    .file-a-claim .tbl
                                    {
                                        background-color: white;
                                        padding: 30px;
                                    }
                                    /**/.file-a-claim .table-wrapper
                                    {
                                        overflow-x: auto;
                                        overflow-y: auto;
                                    }
                                    .file-a-claim table
                                    {
                                        color: #333;
                                        table-layout: fixed;
                                        word-break: break-word;
                                        width: 100%;
                                    }
                                    /**/.file-a-claim table thead
                                    {
                                        background-color: #00539f;
                                        color: white;
                                    }
                                    .file-a-claim li
                                    {
                                        line-height: 1.7em;
                                    }
                                    .category-name h1
                                    {
                                        color: #00539e;
                                        font: 900 23px 'Muli';
                                        margin-bottom: 0px;
                                        text-transform: uppercase;
                                        word-break: break-word;
                                        word-wrap: break-word;
                                    }
                                    /**/
                                    @media (max-width:768px)
                                    {
                                        .modal-dialog.file-a-claim
                                        {
                                            width: 100%;
                                        }
                                        .file-a-claim table
                                        {
                                            width: 850px;
                                        }
                                    }
                                    /**/
                                    -- ></style>
                                <div class="row file-a-claim">
                                    <center>
                                        <div class="category-name">
                                            <h1>
                                                Miscellaneous Casualty</h1>
                                        </div>
                                    </center>
                                    <div class="category-banner">
                                        For other miscellaneous casualty claims processing, you can find all the required
                                        documents here.</div>
                                    <div class="col-xs-12 text-center">
                                        <br>
                                        <a class="btn-green" href="/media/ucpb_pdfdocuments/ucpbpdf/Claims-Checklist_Miscellaneous-Casualty.pdf"
                                            target="_blank">download now</a></div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                        <div class="table-wrapper">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" colspan="3" style="font-size: 14px;">
                                                            <strong>LIABILITY / PERSONAL ACCIDENT / HEALTH</strong>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" width="33%">
                                                            <strong>BASIC DOCUMENTS</strong>
                                                        </th>
                                                        <th class="text-center" width="34%">
                                                            <strong>ADDITIONAL DOCUMENTS</strong>
                                                        </th>
                                                        <th class="text-center" width="33%">
                                                            <strong>OPTIONAL DOCUMENTS</strong>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong>Property Damage</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Photographs</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Detailed Estimate</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Police Report / Affidavit of Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Adjuster’s Report, if assigned to adjuster</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>Property Damage</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Repair invoice (if damage is already
                                                                    repaired)</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Certificate of No Claim (for damaged
                                                                    vehicle</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>Bodily Injury / Illness or Health / Death Claim</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Official Receipt of medical expenses</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Death certificate (for Death Claim)</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Police Report / Affidavit of Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Birth Certificate (for Death Claim)</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>Bodily Injury / Illness or Health / Death Claim</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Medical Certificate</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Post Mortem Certificate</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <strong>Bodily Injury / Illness or Health / Death Claim</strong>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Statement of Account (if hospitalized)</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Doctor’s prescription</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Admitting history &amp; Physical Examination</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Vital signs chart</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Nurse’s daily progress notes</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-wrapper">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" colspan="2" style="font-size: 14px;">
                                                            <strong>BURGLARY / ROBBERY / HOLD-UP</strong>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" width="50%">
                                                            <strong>BASIC DOCUMENTS</strong>
                                                        </th>
                                                        <th class="text-center" width="50%">
                                                            <strong>OPTIONAL DOCUMENTS</strong>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Police Report / Affidavit of Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Audit Report &amp; Breakdown of Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Adjuster’s Report, if assigned to adjuster</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Sales Invoice / Purchase Invoice</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Photos of forcible entry</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Sales &amp; Collection Report</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Inventory Report / Book of Accounts</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-wrapper">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" colspan="2" style="font-size: 14px;">
                                                            <strong>ALL RISKS / EQUIPMENT FLOATER</strong>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" width="50%">
                                                            <strong>BASIC DOCUMENTS</strong>
                                                        </th>
                                                        <th class="text-center" width="50%">
                                                            <strong>OPTIONAL DOCUMENTS</strong>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Police Report / Affidavit of Loss</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Price Quotation / Repair Estimates</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Adjuster’s Report, if assigned to adjuster</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Certificate of Registration</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Photographs</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Disconnection Notice</li>
                                                                <li><em class="fa fa-check-square-o fa-lg"></em>Memorandum of Agreement</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        Excel Protect</h1>
                </div>

                <script type="text/javascript">
                    //<![CDATA[
                    var dailydealTimeCountersCategory = new Array();
                    var i = 0;
                    //]]>
                </script>

                <div class="category-products like-category-grid-block">
                    <ul class="products-grid  columns3">
                        <li class="item">
                            <div class="item-area box-shadow">
                                <div class="product-image-area">
                                    <div class="loader-container">
                                        <div class="loader">
                                            <i class="ajax-loader medium animate-spin"></i>
                                        </div>
                                    </div>
                                    <a href="https://www.ucpbgen.com/quickview/index/view/id/52" class="quickview-icon">
                                        <i class="icon-export"></i><span>Quick View </span></a><a href="https://www.ucpbgen.com/products/excel-protect/condo-excel-protect"
                                            title="Condo Excel Protect" class="product-image" style="height: 250px;">
                                            <img id="product-collection-image-52" class="landscape" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/m/a/main---excel---condo-excel-protect.jpg"
                                                alt="Condo Excel Protect" width="300">
                                        </a>
                                </div>
                                <div class="details-area" style="height: 120px;">
                                    <div class="product-name-wrapper abs">
                                        <div class="product-icon box-shadow">
                                            <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/images/catalog/product/placeholder/icon.jpg"
                                                alt="test product">
                                        </div>
                                        <h2 class="product-name">
                                            <a href="https://www.ucpbgen.com/products/excel-protect/condo-excel-protect" title="Condo Excel Protect" style="font-family: arial;">
                                                Condo Excel Protect </a>
                                        </h2>
                                        <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                            Make your urban living more comfortable
                                        </div>
                                    </div>
                                    <div class="actions abs">
                                        <a href="https://www.ucpbgen.com/inquiry/index/setproductinquiry?id=52" dataid="52"
                                            class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                            <!-- <i class="icon-cart"></i> -->
                                            <span>&nbsp;INQUIRY </span></a>
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="item-area box-shadow">
                                <div class="product-image-area">
                                    <div class="loader-container">
                                        <div class="loader">
                                            <i class="ajax-loader medium animate-spin"></i>
                                        </div>
                                    </div>
                                    <a href="https://www.ucpbgen.com/quickview/index/view/id/31" class="quickview-icon">
                                        <i class="icon-export"></i><span>Quick View </span></a><a href="https://www.ucpbgen.com/products/excel-protect/family-excel-protect"
                                            title="Family Excel Protect" class="product-image" style="height: 250px;">
                                            <img id="product-collection-image-31" class="landscape" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/_/f/_fep.jpg"
                                                alt="Family Excel Protect" width="300">
                                        </a>
                                </div>
                                <div class="details-area" style="height: 120px;">
                                    <div class="product-name-wrapper abs">
                                        <div class="product-icon box-shadow">
                                            <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/images/catalog/product/placeholder/icon.jpg"
                                                alt="test product">
                                        </div>
                                        <h2 class="product-name">
                                            <a href="https://www.ucpbgen.com/products/excel-protect/family-excel-protect" title="Family Excel Protect" style="font-family: arial;">
                                                Family Excel Protect </a>
                                        </h2>
                                        <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                            Financial security for you and your family.
                                        </div>
                                    </div>
                                    <div class="actions abs">
                                        <a href="https://www.ucpbgen.com/inquiry/index/setproductinquiry?id=31" dataid="31"
                                            class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                            <!-- <i class="icon-cart"></i> -->
                                            <span>&nbsp;INQUIRY </span></a>
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="item-area box-shadow">
                                <div class="product-image-area">
                                    <div class="loader-container">
                                        <div class="loader">
                                            <i class="ajax-loader medium animate-spin"></i>
                                        </div>
                                    </div>
                                    <a href="https://www.ucpbgen.com/quickview/index/view/id/32" class="quickview-icon">
                                        <i class="icon-export"></i><span>Quick View </span></a><a href="https://www.ucpbgen.com/products/excel-protect/golf-excel-protect"
                                            title="Golf Excel Protect" class="product-image" style="height: 250px;">
                                            <img id="product-collection-image-32" class="landscape" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/m/a/main---excel---golf-excel-plus-2.jpg"
                                                alt="Golf Excel Protect" width="300">
                                        </a>
                                </div>
                                <div class="details-area" style="height: 120px;">
                                    <div class="product-name-wrapper abs">
                                        <div class="product-icon box-shadow">
                                            <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/images/catalog/product/placeholder/icon.jpg"
                                                alt="test product">
                                        </div>
                                        <h2 class="product-name">
                                            <a href="https://www.ucpbgen.com/products/excel-protect/golf-excel-protect" title="Golf Excel Protect" style="font-family: arial;">
                                                Golf Excel Protect </a>
                                        </h2>
                                        <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                            The thrill on the greens begins with ease
                                        </div>
                                    </div>
                                    <div class="actions abs">
                                        <a href="https://www.ucpbgen.com/inquiry/index/setproductinquiry?id=32" dataid="32"
                                            class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                            <!-- <i class="icon-cart"></i> -->
                                            <span>&nbsp;INQUIRY </span></a>
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="item-area box-shadow">
                                <div class="product-image-area">
                                    <div class="loader-container">
                                        <div class="loader">
                                            <i class="ajax-loader medium animate-spin"></i>
                                        </div>
                                    </div>
                                    <a href="https://www.ucpbgen.com/quickview/index/view/id/19" class="quickview-icon">
                                        <i class="icon-export"></i><span>Quick View </span></a><a href="https://www.ucpbgen.com/products/excel-protect/home-excel-plus"
                                            title="Home Excel Plus" class="product-image" style="height: 250px;">
                                            <img id="product-collection-image-19" class="landscape" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/_/h/_hep.jpg"
                                                alt="Home Excel Plus" width="300">
                                        </a>
                                </div>
                                <div class="details-area" style="height: 120px;">
                                    <div class="product-name-wrapper abs">
                                        <div class="product-icon box-shadow">
                                            <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/images/catalog/product/placeholder/icon.jpg"
                                                alt="test product">
                                        </div>
                                        <h2 class="product-name">
                                            <a href="https://www.ucpbgen.com/products/excel-protect/home-excel-plus" title="Home Excel Plus" style="font-family: arial;">
                                                Home Excel Plus </a>
                                        </h2>
                                        <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                            Protect the home that protects you
                                        </div>
                                    </div>
                                    <div class="actions abs">
                                        <a href="https://www.ucpbgen.com/inquiry/index/setproductinquiry?id=19" dataid="19"
                                            class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                            <!-- <i class="icon-cart"></i> -->
                                            <span>&nbsp;INQUIRY </span></a>
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="item-area box-shadow">
                                <div class="product-image-area">
                                    <div class="loader-container">
                                        <div class="loader">
                                            <i class="ajax-loader medium animate-spin"></i>
                                        </div>
                                    </div>
                                    <a href="https://www.ucpbgen.com/quickview/index/view/id/18" class="quickview-icon">
                                        <i class="icon-export"></i><span>Quick View </span></a><a href="https://www.ucpbgen.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cudWNwYmdlbi5jb20vcHJvZHVjdHMvZXhjZWwtcHJvdGVjdA,,/product/18/form_key/TKI3WZj2dpp4RAJ7/"
                                            title="International Travel Protect" class="product-image" style="height: 250px;">
                                            <img id="product-collection-image-18" class="landscape" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/m/a/main_-_excel_-_international_travel_protect.jpg"
                                                alt="International Travel Protect" width="300">
                                        </a>
                                </div>
                                <div class="details-area" style="height: 120px;">
                                    <div class="product-name-wrapper abs">
                                        <div class="product-icon box-shadow">
                                            <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/i/c/icon_copy_5.jpg"
                                                alt="test product">
                                        </div>
                                        <h2 class="product-name">
                                            <a href="https://www.ucpbgen.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cudWNwYmdlbi5jb20vcHJvZHVjdHMvZXhjZWwtcHJvdGVjdA,,/product/18/form_key/TKI3WZj2dpp4RAJ7/"
                                                title="International Travel Protect" style="font-family: arial;">International Travel Protect </a>
                                        </h2>
                                        <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                            Go global confidently
                                        </div>
                                    </div>
                                    <div class="actions abs">
                                        <!-- Inquiry removed -->
                                        <!-- Coming soon -->
                                        <a href="https://www.ucpbgen.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cudWNwYmdlbi5jb20vcHJvZHVjdHMvZXhjZWwtcHJvdGVjdA,,/product/18/form_key/TKI3WZj2dpp4RAJ7/"
                                            class="addtocart col-md-6 col-sm-6 col-xs-6 itpmotor" title="Get A Quote" style="width: 100%;">
                                            <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                            <span>&nbsp;Get A Quote </span></a>
                                        <!-- Coming soon -->
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="item-area box-shadow">
                                <div class="product-image-area">
                                    <div class="loader-container">
                                        <div class="loader">
                                            <i class="ajax-loader medium animate-spin"></i>
                                        </div>
                                    </div>
                                    <a href="https://www.ucpbgen.com/quickview/index/view/id/34" class="quickview-icon">
                                        <i class="icon-export"></i><span>Quick View </span></a><a href="https://www.ucpbgen.com/products/excel-protect/pro-biz"
                                            title="ProBiz Excel Protect" class="product-image" style="height: 250px;">
                                            <img id="product-collection-image-34" class="landscape" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/p/r/probiz_excel_plus_tile_image_3.jpg"
                                                alt="ProBiz Excel Protect" width="300">
                                        </a>
                                </div>
                                <div class="details-area" style="height: 120px;">
                                    <div class="product-name-wrapper abs">
                                        <div class="product-icon box-shadow">
                                            <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/images/catalog/product/placeholder/icon.jpg"
                                                alt="test product">
                                        </div>
                                        <h2 class="product-name">
                                            <a href="https://www.ucpbgen.com/products/excel-protect/pro-biz" title="ProBiz Excel Protect" style="font-family: arial;">
                                                ProBiz Excel Protect </a>
                                        </h2>
                                        <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                            Essential protection for every entrepreneur
                                        </div>
                                    </div>
                                    <div class="actions abs">
                                        <a href="https://www.ucpbgen.com/inquiry/index/setproductinquiry?id=34" dataid="34"
                                            class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                            <!-- <i class="icon-cart"></i> -->
                                            <span>&nbsp;INQUIRY </span></a>
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="item-area box-shadow">
                                <div class="product-image-area">
                                    <div class="loader-container">
                                        <div class="loader">
                                            <i class="ajax-loader medium animate-spin"></i>
                                        </div>
                                    </div>
                                    <a href="https://www.ucpbgen.com/quickview/index/view/id/33" class="quickview-icon">
                                        <i class="icon-export"></i><span>Quick View </span></a><a href="https://www.ucpbgen.com/products/excel-protect/student-excel-protect"
                                            title="Student Excel Protect" class="product-image" style="height: 250px;">
                                            <img id="product-collection-image-33" class="landscape" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/m/a/main---excel---student-excel-protect-2.jpg"
                                                alt="Student Excel Protect" width="300">
                                        </a>
                                </div>
                                <div class="details-area" style="height: 120px;">
                                    <div class="product-name-wrapper abs">
                                        <div class="product-icon box-shadow">
                                            <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/images/catalog/product/placeholder/icon.jpg"
                                                alt="test product">
                                        </div>
                                        <h2 class="product-name">
                                            <a href="https://www.ucpbgen.com/products/excel-protect/student-excel-protect" title="Student Excel Protect" style="font-family: arial;">
                                                Student Excel Protect </a>
                                        </h2>
                                        <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                            Hit the books, don't let the books hit you
                                        </div>
                                    </div>
                                    <div class="actions abs">
                                        <a href="https://www.ucpbgen.com/inquiry/index/setproductinquiry?id=33" dataid="33"
                                            class="click-here inquiry col-md-12 col-sm-12 col-xs-12" title="INQUIRY">
                                            <!-- <i class="icon-cart"></i> -->
                                            <span>&nbsp;INQUIRY </span></a>
                                        <div class="clearer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!--script type="text/javascript">
                jQuery('.col-main .products-grid li:nth-child(2n)').addClass('nth-child-2n');
                jQuery('.col-main .products-grid li:nth-child(2n+1)').addClass('nth-child-2np1');
                jQuery('.col-main .products-grid li:nth-child(3n)').addClass('nth-child-3n');
                jQuery('.col-main .products-grid li:nth-child(3n+1)').addClass('nth-child-3np1');
                jQuery('.col-main .products-grid li:nth-child(4n)').addClass('nth-child-4n');
                jQuery('.col-main .products-grid li:nth-child(4n+1)').addClass('nth-child-4np1');
                jQuery('.col-main .products-grid li:nth-child(5n)').addClass('nth-child-5n');
                jQuery('.col-main .products-grid li:nth-child(5n+1)').addClass('nth-child-5np1');
                jQuery('.col-main .products-grid li:nth-child(6n)').addClass('nth-child-6n');
                jQuery('.col-main .products-grid li:nth-child(6n+1)').addClass('nth-child-6np1');
                jQuery('.col-main .products-grid li:nth-child(7n)').addClass('nth-child-7n');
                jQuery('.col-main .products-grid li:nth-child(7n+1)').addClass('nth-child-7np1');
                jQuery('.col-main .products-grid li:nth-child(8n)').addClass('nth-child-8n');
                jQuery('.col-main .products-grid li:nth-child(8n+1)').addClass('nth-child-8np1');
            </script-->
                    <div class="toolbar-bottom">
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="sort-by">
                                    <label for="name">
                                        Sort By:</label>
                                    <select id="name">
                                        <option value="https://www.ucpbgen.com/products/excel-protect?dir=asc&amp;order=position">
                                            Position </option>
                                        <option value="https://www.ucpbgen.com/products/excel-protect?dir=asc&amp;order=name"
                                            selected="selected">Name </option>
                                        <option value="https://www.ucpbgen.com/products/excel-protect?dir=asc&amp;order=viewproduct">
                                            Most Viewed </option>
                                    </select>
                                    <a href="https://www.ucpbgen.com/products/excel-protect?dir=desc&amp;order=name"
                                        title="Set Descending Direction">
                                        <img src="https://www.ucpbgen.com/skin/frontend/smartwave/porto/images/i_asc_arrow.gif"
                                            alt="Set Descending Direction" class="v-middle"></a>
                                </div>
                                <p class="view-mode">
                                </p>
                                <div class="pager">
                                    <p class="amount">
                                        <strong>7 Item(s)</strong>
                                    </p>
                                </div>
                                <div class="limiter">
                                    <label for="limit">
                                        Show:</label>
                                    <select id="limit">
                                        <option value="https://www.ucpbgen.com/products/excel-protect?limit=100" selected="selected">
                                            100 </option>
                                        <option value="https://www.ucpbgen.com/products/excel-protect?limit=all">All </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swatches-js">
                </div>

                <script type="text/javascript">
                    //<![CDATA[
                    jQuery('.category-products.like-category-grid-block .products-grid').onImagesComplete(function() {
                        equalHeight(jQuery('.product-image'));
                        if (jQuery(".details-area .short-description-wrapper").length) {
                            Ellipsis.setTarget(jQuery(".details-area .short-description-wrapper"));
                            Ellipsis.options.height = 50;
                            if (jQuery(".details-area .ratings").length) {
                                Ellipsis.options.height = 30;
                            }
                            Ellipsis.truncate();
                        }
                        resizeDetailWrapper();
                    });
                    //]]>
                </script>

                <style type="text/css">
                    #emarine-issue
                    {
                        display: inline-block;
                        border-radius: 0;
                        margin: 0;
                        border: 0;
                        padding: 15px 5px;
                        height: 100%;
                        background-color: #0058bf;
                        color: white;
                        line-height: 22px;
                        visibility: visible;
                        opacity: 1;
                        vertical-align: middle;
                        text-decoration: none;
                        width: 50%;
                    }
                    .emarine-popup ul li a
                    {
                        text-decoration: none;
                        text-transform: uppercase;
                        color: #62bb46;
                        font-size: 14px;
                        font-weight: 600;
                        margin: 0 15px;
                        padding-bottom: 1.9vw;
                    }
                    .emarine-popup ul
                    {
                        background: #00539f;
                        position: absolute;
                        top: 42px;
                        left: 50%;
                        min-width: 175px;
                        text-align: left;
                        -webkit-transform: translateX(-50%);
                        -moz-transform: translateX(-50%);
                        -ms-transform: translateX(-50%);
                        -o-transform: translateX(-50%);
                        transform: translateX(-50%);
                        padding: 5px;
                        display: none;
                        border-bottom: 5px solid #01396c;
                    }
                    .emarine-popup ul
                    {
                        display: block;
                        top: 0;
                    }
                    .emarine-popup:before
                    {
                        content: '';
                        width: 0;
                        height: 0;
                        display: block;
                        border-style: solid;
                        border-width: 0 12px 10px 12px;
                        border-color: transparent transparent rgb(0, 83, 159) transparent;
                        position: absolute;
                        margin: auto;
                        left: 0;
                        right: 0;
                        top: -10px;
                    }
                    .emarine-popup:before
                    {
                        left: auto;
                        right: 18px;
                    }
                    .emarine-popup ul li
                    {
                        display: block;
                        background-color: #00539f !important;
                    }
                    .emarine-popup ul li a
                    {
                        display: block;
                        padding: 7px 9px;
                        margin: 0;
                        color: #fff;
                        font-weight: 500;
                        border-top: 1px solid #035aa9;
                        border-bottom: 1px solid #024480;
                        text-transform: uppercase;
                    }
                    .emarine-popup
                    {
                        position: absolute;
                        top: 52px;
                        z-index: -25;
                        visibility: hidden;
                        -webkit-transition: all 500ms ease-in-out, z-index 550ms ease-in-out;
                        -moz-transition: all 500ms ease-in-out, z-index 550ms ease-in-out;
                        -ms-transition: all 500ms ease-in-out, z-index 550ms ease-in-out;
                        -o-transition: all 500ms ease-in-out, z-index 550ms ease-in-out;
                        transition: all 500ms ease-in-out, z-index 550ms ease-in-out;
                    }
                    .emarine-popup ul li a, .emarine-popup.show ul li a
                    {
                        background-color: #00539f !important;
                    }
                    .emarine-popup.show
                    {
                        visibility: visible;
                        z-index: 99;
                    }
                    .emarine-popup ul
                    {
                        background: #00539f;
                        position: relative;
                        display: inline-block;
                    }
                    .emarine-popup:before
                    {
                        display: none;
                    }
                    .emarine-popup
                    {
                        width: 100%;
                        bottom: -100vh;
                    }
                    .emarine-popup.show
                    {
                        bottom: 0;
                    }
                </style>

                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery("#emarine-issue").on('mouseover', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            jQuery(".emarine-popup").toggleClass("show");
                        })

                        jQuery(".emarine-popup").on('mouseover', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            jQuery(".emarine-popup").toggleClass("show");
                        })

                        jQuery("#emarine-popup-div").on('mouseout', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            jQuery(".emarine-popup").removeClass("show");
                        })
                    });

                </script>

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
    <a href="#" id="totop"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript">
        var windowScroll_t;
        jQuery(window).scroll(function() {
            clearTimeout(windowScroll_t);
            windowScroll_t = setTimeout(function() {
                if (jQuery(this).scrollTop() > 100) {
                    jQuery('#totop').fadeIn();
                } else {
                    jQuery('#totop').fadeOut();
                }
            }, 500);
        });
        jQuery('#totop').click(function() {
            jQuery('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });

        jQuery(window).on('load', function() {
            jQuery('#privacy-policy-popup').modal({ backdrop: 'static', keyboard: false });
        });

        jQuery('#cookiey').click(function() {
            var yes = "yes";

            jQuery.post('https://www.ucpbgen.com/cookie/cookie/setCookie/',
        {
            yes: yes
        },

        function(validate) {
            var dataobj = jQuery.parseJSON(validate);
            // alert(dataobj.message);
        });
        });

        /*==============================
        COOKIES
        ================================*/

        jQuery('.cookie-agree').click(function(e) {
            e.preventDefault();
            jQuery('#privacy-policy-popup').hide();
        });

        /*==============================
        MODIFY PRODUCT INQUIRY MENU
        ================================*/
        var newUrl = "https://www.ucpbgen.com/inquiry/index/unsetproductid"; //set href to unset session
        jQuery('a[data-id="42"]').attr("href", newUrl);

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaTZru272AD380Av3T4Tpm4Y2OVmtq-Bg&amp;libraries=places&amp;callback=initMap"> </script>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <div class="account-login">
                <div class="row">
                    <div class="col-sm-6 col-xs-11 login-wrap">
                        <!-- Nav tabs -->
                        <div class="login-btns">
                            <!-- <img src="../../../skin/frontend/smartwave/porto_child/images/ucpbgen_logo_colored.png" alt=""> -->
                            <ul role="tablist" id="loginPage">
                                <li><a href="#epolicy" aria-controls="epolicy" role="tab" data-toggle="tab"><i class="fa fa-fw"
                                    aria-hidden="true"></i> <span>E-Policy</span> </a></li>
                                <li><a href="#bancassurance" aria-controls="bancassurance" role="tab" data-toggle="tab">
                                    <i class="fa fa-fw" aria-hidden="true" title="Copy to use user"></i> <span>Bancassurance</span>
                                </a></li>
                                <li class="active"><a href="#ecommerce" aria-controls="ecommerce" role="tab" data-toggle="tab">
                                    <i class="fa fa-fw" aria-hidden="true"></i> <span>E-commerce</span> </a></li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in" id="epolicy" role="tabpanel">
                                <form action="https://www.ucpbgen.com/customer/account/loginPost/" method="post"
                                id="epolicy-login-form">
                                <input name="form_key" type="hidden" value="TKI3WZj2dpp4RAJ7">
                                <div class="registered-users mega-form-builds">
                                    <div class="content">
                                        <h1>
                                            welcome to <span>e-policy</span>
                                        </h1>
                                        <ul class="form-list">
                                            <li>
                                                <div class="input-box">
                                                    <input type="text" name="login[username]" placeholder="Email Address *" value=""
                                                        id="email_epolicy" class="form-control required-entry validate-email" title="Email Address">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-box">
                                                    <input type="password" name="login[password]" placeholder="Password *" id="pass_epolicy"
                                                        title="Password" class="form-control input-text required-entry validate-password">
                                                </div>
                                            </li>
                                            <li>
                                                <button type="submit" class="btn btn-default btn-login current" title="Login" name="send"
                                                    id="send2_epolicy">
                                                    SIGN IN</button>
                                            </li>
                                            <li class="forgot-password"><a href="https://www.ucpbgen.com/customer/account/forgotpassword/">
                                                Forgot Password?</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade in" id="bancassurance" role="tabpanel">
                                <form action="https://www.ucpbgen.com/customer/account/loginPost/" method="post"
                                id="bancassurance-login-form">
                                <input name="form_key" type="hidden" value="TKI3WZj2dpp4RAJ7">
                                <div class="registered-users mega-form-builds">
                                    <div class="content">
                                        <h1>
                                            welcome to <span>bancassurance</span>
                                        </h1>
                                        <ul class="form-list">
                                            <li>
                                                <div class="input-box">
                                                    <input type="text" name="login[username]" placeholder="Email Address *" value=""
                                                        id="email_banc" class="form-control required-entry validate-email" title="Email Address">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-box">
                                                    <input type="password" name="login[password]" placeholder="Password *" id="pass_banc"
                                                        title="Password" class="form-control input-text required-entry validate-password">
                                                </div>
                                            </li>
                                            <li>
                                                <button type="submit" class="btn btn-default btn-login current" title="Login" name="send"
                                                    id="send2_banc">
                                                    SIGN IN</button>
                                            </li>
                                            <li class="forgot-password"><a href="https://www.ucpbgen.com/customer/account/forgotpassword/">
                                                Forgot Password?</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade in active" id="ecommerce" role="tabpanel">
                                <form action="https://www.ucpbgen.com/loginmodal/customer/loginPost/" method="post"
                                id="ecommerce-login-form" data-form_key="">
                                <input name="form_key" type="hidden" value="TKI3WZj2dpp4RAJ7">
                                <div class="registered-users mega-form-builds">
                                    <div class="content">
                                        <h1>
                                            Access Your <span>UCPB GEN ePolicy Account</span>
                                        </h1>
                                        <ul class="form-list">
                                            <li>
                                                <div class="input-box">
                                                    <input type="text" name="login[username]" placeholder="Email Address *" value=""
                                                        id="email" class="form-control required-entry validate-email" title="Email Address">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-box">
                                                    <input type="password" name="login[password]" placeholder="Password *" id="pass"
                                                        title="Password" class="form-control input-text required-entry validate-password">
                                                </div>
                                            </li>
                                            <li>
                                                <button type="submit" class="btn btn-default btn-login current" title="Login" name="send"
                                                    id="send2">
                                                    SIGN IN</button>
                                            </li>
                                            <li class="forgot-password"><a href="https://www.ucpbgen.com/customer/account/forgotpassword/">
                                                Forgot Password?</a> </li>
                                            <li class="e-policy-link" style="display: none;"><span>For UCPB GEN policyholders who
                                                have been issued an ePolicy link via email, you may access your accounts through
                                                this <a href="https://www.ucpbgen.com/login/login_epolicy.aspx">link</a>.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    //<![CDATA[
                    var epolicy_login_form = new VarienForm('epolicy-login-form', true);
                    var bancassurance_login_form = new VarienForm('bancassurance-login-form', true);
                    var ecommerce_login_form = new VarienForm('ecommerce-login-form', true);
                    //]]>
                </script>

                <script type="text/javascript">
                    // convert password to base64 before submitting
                    jQuery('.btn-login').click(function() {
                        var password_epolicy = jQuery('#pass_epolicy').val();
                        var password_epolicy_64 = btoa(password_epolicy);
                        jQuery('#pass_epolicy').val(password_64);

                        var password_banc = jQuery('#pass_banc').val();
                        var password_banc_64 = btoa(password_banc);
                        jQuery('#pass_banc').val(password_64);

                        var password = jQuery('#pass').val();
                        var password_64 = btoa(password);
                        jQuery('#pass').val(password_64);
                    });
                </script>

            </div>
            <div class="progress-indicator" style="position: absolute; right: 5px; top: 50%;
                transform: translateY(-50%);">
                <span class="please-wait" id="login-please-wait" style="display: none;">
                    <img src="https://www.ucpbgen.com/skin/frontend/smartwave/porto/images/opc-ajax-loader.gif"
                        class="v-middle" alt="">
                </span>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script type="text/javascript">
    AjaxLogin = Class.create();
    AjaxLogin.prototype = {
        initialize: function(config)
        {
            this.config = Object.extend({
                triggers: null,
            }, config || {});

            this.login_form = {};
            this.login_form_send_btn = {};

            if(Object.size(config.login_form))
            {
                this.login_form = jQuery(config.login_form);

                if(!jQuery(this.login_form).length)
                {
                    console.log("Warning! Login Form is missing.");
                    return false;
                }
            }
            else
            {
                console.log("Warning! Login Form [login_form] selector is missing.");
                return false;
            }

            jQuery(this.login_form).attr("action", BASE_URL + "loginmodal/customer/loginPost/");
            this.login_form_send_btn = jQuery(this.login_form).find('#send2');
            this._addEventListeners();
        },
        _addEventListeners: function(config)
        { 
            var self = this;
            jQuery(this.login_form).on('submit', function(e){
                self._onFormLoginSubmit(e);
            }); 
        },
        _setStateLoading: function(state_loading = true)
        {
            if (state_loading)
            {
                var progress_indicator = jQuery('.progress-indicator').clone();
                progress_indicator.find('#login-please-wait').show();
                this.login_form_send_btn.css('position', 'relative');
                this.login_form_send_btn.html('SIGNING IN');
                this.login_form_send_btn.append(progress_indicator);
                this.login_form_send_btn.attr('disabled', 'disabled');
                this.login_form_send_btn.closest('form').find('button,[type="button"]').attr('disabled', 'disabled');
            }
            else
            {
                this.login_form_send_btn.find('.progress-indicator').remove();
                this.login_form_send_btn.css('position', 'relative');
                this.login_form_send_btn.removeAttr('disabled');
                this.login_form_send_btn.closest('form').find('button,[type="button"]').removeAttr('disabled');
                this.login_form_send_btn.html('SIGN IN');
            }
        },
        _onFormLoginSubmit: function(e)
        {
            var self = this;

            if (typeof event != 'undefined')
            { // ie9 fix
                event.preventDefault ? event.preventDefault() : event.returnValue = false;
            }
            Event.stop(e);

            if (!ecommerce_login_form.validator.validate())
            {
                return false;
            }

            this._setStateLoading();

            new Ajax.Request(jQuery(this.login_form).attr('action'),
            {
                xhrFields:
                {
                    withCredentials: true
                },
                method: "post",
                parameters: jQuery(this.login_form).serialize(),
                onCreate: function(response)
                {
                    var t = response.transport;
                    t.setRequestHeader = t.setRequestHeader.wrap(function(original, k, v)
                    {
                        if (/^(accept|accept-language|content-language|cookie|access-control-allow-origin|access-control-allow-headers|access-control-allow-credentials)$/i.test(k))
                            return original(k, v);
                        if (/^content-type$/i.test(k) &&
                            /^(application\/x-www-form-urlencoded|multipart\/form-data|text\/plain)(;.+)?$/i.test(v))
                            return original(k, v);
                        return;
                    });
                },
                onSuccess: function(transport)
                {
                    self._setStateLoading(false);
                    var section = jQuery(self.login_form).get(0);
                    if (!section)
                    {
                        return;
                    }
                    var ul = section.select('.messages')[0];
                    if (ul)
                    {
                        ul.remove();
                    }

                    var response = transport.responseText.evalJSON();
                    if (response.error)
                    {
                        var section = jQuery(self.login_form).get(0);
                        if (!section)
                        {
                            return;
                        }
                        var ul = section.select('.messages')[0];
                        if (!ul)
                        {
                            section.insert(
                            {
                                top: '<ul class="messages"></ul>'
                            });
                            ul = section.select('.messages')[0]
                        }
                        var li = $(ul).select('.error-msg')[0];
                        if (!li)
                        {
                            $(ul).insert(
                            {
                                top: '<li class="error-msg"><ul></ul></li>'
                            });
                            li = $(ul).select('.error-msg')[0];
                        }
                        $(li).select('ul')[0].insert(
                            '<li>' + response.error + '</li>'
                            );
                        // self.updateCaptcha('user_login');
                    }
                    if (response.redirect)
                    {
                        document.location = response.redirect;
                        return;
                    }
                }
            });
        }
    };
    var EcommerceLoginFormAjaxLogin = new AjaxLogin({
        login_form : "#ecommerce-login-form"
    });
    </script>

    <script type="text/javascript" src="https://www.ucpbgen.com/skin/frontend/smartwave/porto_child/js/ucpb_custom.js"></script>

    </div> </div><div id="overlay" style="display: none;" class="finished">
    </div>
    <div id="progstat" style="display: none;">
        100%</div>
    <iframe scrolling="no" allowtransparency="true" src="https://platform.twitter.com/widgets/widget_iframe.097c1f5038f9e8a0d62a39a892838d66.html?origin=https%3A%2F%2Fwww.ucpbgen.com"
        title="Twitter settings iframe" style="display: none;" frameborder="0"></iframe>
    <div id="at4-thankyou" class="at4-thankyou at4-thankyou-background at4-hide ats-transparent at4-thankyou-desktop addthis-smartlayers addthis-animated fadeIn at4-show"
        role="dialog" aria-labelledby="at-thankyou-label">
        <div class="at4lb-inner">
            <button class="at4x" title="Close">
                Close</button><a id="at4-palogo"><div>
                    <a class="at-branding-logo" href="https://www.addthis.com/website-tools/overview?utm_source=AddThis%20Tools&amp;utm_medium=image"
                        title="Powered by AddThis" target="_blank">
                        <div class="at-branding-icon">
                        </div>
                        <span class="at-branding-addthis">AddThis</span></a></div>
                </a>
            <div class="at4-thankyou-inner">
                <div id="at-thankyou-label" class="thankyou-title">
                </div>
                <div class="thankyou-description">
                </div>
                <div class="at4-thankyou-layer">
                </div>
            </div>
        </div>
    </div>
    <div class="at4-whatsnext-outer-container addthis-smartlayers-desktop">
    </div>
    <div class="at4-recommended-outer-container">
    </div>
    <iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true"
        style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px;
        padding: 0px; border: medium none;" title="Twitter analytics iframe" frameborder="0">
    </iframe>
</span>@endsection 