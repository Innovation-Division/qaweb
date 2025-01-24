@extends('layouts.app')

@section('content')


        <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="{{ url('/about/our-financial-performance') }}">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url(./images/ucpb-gen-non-life-insurance-our-milestones-final.jpg);">
                    </div>
                    <div class="text-banner-wrapper">
                        <h3 class="short-description"  >
                            Our Financial Performance
                            <br>
                            <br>
                            <a class="btn-banner" title="Our Team" href="{{ url('/about/our-team') }}" >Meet the People behind
                                our Success</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page"> Home </a>
                                    <span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
                                </li>
                                <li class="category4"><span> About Us </span> <span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                                <li class="category12"><strong>Our Financial Performance</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
         <div class="category-name container">
                <h1>
                    Our Financial Performance
                </h1>
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


                    <div class="page-title category-title">
                        <h1>
                            Our Financial Performance</h1>
                    </div>
                    <style type="text/css">
                        <!
                        -- .table-wrapper
                        {
                            margin-top: 0;
                            width: 100%;
                             overflow: auto;
                        }
                        table{
                            overflow:scroll;
                        }
                        table thead
                        {
                            background: #00539f;
                            color: #fff;
                            text-transform: capitalize;
                            font: 600 15px 'Muli';
                        }
                        table thead th
                        {
                            font-weight: 600;
                            padding: 8px;
                            border: 0;
                        }
                        table thead tr
                        {
                            font-weight: 600;
                            padding: 2px;
                            border: 0;
                        }
                        table p
                        {
                            margin: 0;
                        }
                        -- ></style>
                    <div class="text-center">
                        <div class="category-banner">
                            <p >
                                *Pesos in Millions</p>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="box">
                            <style type="text/css">
                                .table-wrapper{
                                    overflow-x: auto;
                                }
                            </style>
                            <div class="box-content table-wrapper ">
                                <table >
                                    <thead>
                                        <tr >
                                            <th>
                                                PARTICULARS
                                            </th>
                                            <th style="text-align: center;">
                                                2013
                                            </th>
                                            <th style="text-align: center;">
                                                2014
                                            </th>
                                            <th style="text-align: center;">
                                                2015
                                            </th>
                                            <th style="text-align: center;">
                                                2016
                                            </th>
                                            <th style="text-align: center;">
                                                2017
                                            </th>
                                            <th style="text-align: center;">
                                                2018
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding-top: 15px;">
                                                <p>
                                                    GROSS PREMIUMS WRITTEN</p>
                                            </td>
                                            <td style="text-align: right; padding-top: 15px;">
                                                2,566
                                            </td>
                                            <td style="text-align: right; padding-top: 15px;">
                                                2,589
                                            </td>
                                            <td style="text-align: right; padding-top: 15px;">
                                                2,388
                                            </td>
                                            <td style="text-align: right; padding-top: 15px;">
                                                2,511
                                            </td>
                                            <td style="text-align: right; padding-top: 15px;">
                                                2,741
                                            </td>
                                            <td style="text-align: right; padding-top: 15px;">
                                                2,917
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>
                                                    NET INCOME AFTER TAX</p>
                                            </td>
                                            <td style="text-align: right;">
                                                8
                                            </td>
                                            <td style="text-align: right;">
                                                76
                                            </td>
                                            <td style="text-align: right;">
                                                94
                                            </td>
                                            <td style="text-align: right;">
                                                111
                                            </td>
                                            <td style="text-align: right;">
                                                115
                                            </td>
                                            <td style="text-align: right;">
                                                84
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>
                                                    TOTAL ASSETS</p>
                                            </td>
                                            <td style="text-align: right;">
                                                8,313
                                            </td>
                                            <td style="text-align: right;">
                                                5,932
                                            </td>
                                            <td style="text-align: right;">
                                                4,748
                                            </td>
                                            <td style="text-align: right;">
                                                4,419
                                            </td>
                                            <td style="text-align: right;">
                                                4,500
                                            </td>
                                            <td style="text-align: right;">
                                                4,770
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>
                                                    STOCKHOLDER'S EQUITY</p>
                                            </td>
                                            <td style="text-align: right;">
                                                922
                                            </td>
                                            <td style="text-align: right;">
                                                963
                                            </td>
                                            <td style="text-align: right;">
                                                1,020
                                            </td>
                                            <td style="text-align: right;">
                                                1,138
                                            </td>
                                            <td style="text-align: right;">
                                                1,292
                                            </td>
                                            <td style="text-align: right;">
                                                1,290
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom: 15px;">
                                                <p>
                                                    PAID-UP CAPITAL</p>
                                            </td>
                                            <td style="text-align: right; padding-bottom: 15px;">
                                                500
                                            </td>
                                            <td style="text-align: right; padding-bottom: 15px;">
                                                500
                                            </td>
                                            <td style="text-align: right; padding-bottom: 15px;">
                                                500
                                            </td>
                                            <td style="text-align: right; padding-bottom: 15px;">
                                                500
                                            </td>
                                            <td style="text-align: right; padding-bottom: 15px;">
                                                500
                                            </td>
                                            <td style="text-align: right; padding-bottom: 15px;">
                                                500
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
        
        <a href="#" id="totop" style="display: inline;"><i class="fa fa-chevron-up"></i>
        </a>

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

            

</script>

       

    </div>
</div>

<iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true"
    style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px;
    padding: 0px; border: medium none;" title="Twitter analytics iframe" frameborder="0">
</iframe>
 </span>
@endsection
