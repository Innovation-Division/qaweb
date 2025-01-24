@extends('layouts.app')

@section('content')
 	<!-- <script type="text/javascript">
    // <![CDATA[
    window.onload = function() {
        var occ = document.createElement('script'); occ.type = 'text/javascript'; occ.async = true;
        occ.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.onlinechatcenters.com/code-31902-76901.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(occ, s);
    };
    // ]]>
</script> -->

<div class="top-container">
    <!-- config enabled always -->
    <div class="custom-banner custom-page-banner" data-uri-path="{{ url('/about/our-team') }}">
        <div class="page-banner-wrapper">
            <div class="image-banner-wrapper" style="background-image: url(./images/banner-bod.jpg);">
            </div>
            <div class="text-banner-wrapper">
                <h3 class="short-description">
                    Committed to Excellence<br>
                    <br>
                    <a class="btn-banner" title="Our Team" href="{{ url('/updates') }}">Get more updates about us and
                        the industry</a>
                </h3>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 a-left">
                    <ul>
                        <li class="home"><a href="{{ url('/') }}" title="Go to Home Page" > Home </a>
                            <span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
                        </li>
                        <li class="category4"><span > About Us </span> <span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true" ></i></span></li>
                        <li class="category13" ><strong>Our Team</strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="category-name container">
        <h1>
            Our Team
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

        
          
         

            <div class="page-title category-title">
                <h1 style="font-family: arial">
                    Our Team</h1>
            </div>
            <style type="text/css">
                <!
                -- .team-directory .box-title h2 a
                {
                    color: #00539f;
                    font-size: 13px;
                }
                -- ></style>
            <div class="text-center">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="team-desc">
                            <h2>
                                board of directors</h2>
                            <p >
                                The Board of Directors is responsible for reinforcing the strategic objectives of the Company, fostering its long-term success and competitiveness. Our leaders consist of exceptional individuals who are highly regarded in their respective fields for their skill and extensive experience.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="team-directory">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Emerson B. Aquende</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Chairman</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-4 col-md-4 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Andres Y. Narvasa, Jr.</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    PRESIDENT</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Golda Margareth D. Argel</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Alloysius R. Yebra</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Justice Arturo D. Brion (Ret.)</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Ms. Carolina G. Diangco</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Julio P.G. Bucoy</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Jose Martin A. Loon</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Mr. Higinio O. Macadaeg, Jr</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Dennis G. Dagohoy</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Mr. Johnny Y. Uy</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Bernard Benjamin T. Aniag</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    CORPORATE SECRETARY</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="team-desc">
                                    <h2>
                                        Management Directory</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="team-directory">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Emerson B. Aquende 
                                                </h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Chairman</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-3 col-md-6 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Andres Y. Narvasa, Jr.</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    PRESIDENT</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Edgardo D. Rosario</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Senior Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Relationship Managment</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Joel G. Libo-on</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Senior Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Insurance Management</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-3 col-md-6 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Marinella B. Gregorio</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Senior Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Resource Management</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-3 col-md-6 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Ma. Pacita C. Dobles</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    First Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Strategy and Customer Experience Management</p>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    
                                    
                                   
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Magdalena A. Parreñas</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    First Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Financial Management</p>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Arlene S. Garcia</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Underwriting</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Francisco M. Nob</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Claims</p>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Justino C. Macapagal</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    BRANCH OPERATION</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Anna Marie D. De Jesus</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Asst. Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Strategic Planning and Development</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Karen P. De Veyra</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    BANCASSURANCE</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Atty. Theodore Joseph A. Campañano</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Legal Services</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="box">
                                            <div class="box-body">
                                            </div>
                                            <div class="box-title">
                                                <h2>
                                                    Michelle G. Guce</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Vice President</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Human Resource and Administrative Services</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-offset-3 col-md-6 col-sm-6 col-sm-offset-3 col-xs-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h2>
                                                    Madeleine Sophie L. Adriano</h2>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    SENIOR  Manager</p>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    Sales sERVICES</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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




</div> </div>

<iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true"
    style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px;
    padding: 0px; border: medium none;" title="Twitter analytics iframe" frameborder="0">
</iframe>


 
@endsection
