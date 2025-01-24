<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title }}</title>
    <meta name="description" content="{!! $metadescription !!}">
    <meta name="keywords" content="{!! $keyword !!}">
    <meta name="robots" content="NOINDEX,NOFOLLOW">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Muli" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="{{ URL::to('/') }}/images/favicon.ico" type="image/x-ico">

    <link href="{{ asset('fontawesome/css/font-awesome.css') }}" rel='stylesheet'>

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A300%2C300italic%2C400%2C400italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic&amp;subset=latin" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <script src="https://connect.facebook.net/signals/plugins/inferredEvents.js?v=2.9.4" async=""></script>
    <script src="https://connect.facebook.net/en_US/sdk.js?hash=02fbc8ab7dcddd126b6f07c38b8e9a1c" async="" crossorigin="anonymous"></script>
    <script src="https://connect.facebook.net/signals/config/2323382494573532?v=2.9.4&amp;r=stable" async=""></script>
    <script id="facebook-jssdk" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v3.0"></script>
    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/calendar-win2k-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/etalage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/owl.transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/selectbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/widgets.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/configurableswatches.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style-layout1.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/store-locator.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/jquery.fancybox.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/webjscss/catalogcategorysearch.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/dist/bootstrap-5.1.3/css/bootstrap-custom.min.css') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/style-fix/common.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/style-fix/button.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/style-fix/header.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/style-fix/footer.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/style-fix/form.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/global.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/header.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/footer.less') }}" />
    <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/datepick/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/old-css/styles.css') }}" media="all">

    <script type="text/javascript" src="{{ asset('/asset/webjscss/prototype.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/validation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/builder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/effects.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/dragdrop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/controls.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/js.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/translate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/cookies.js') }}"></script>
    <script src="{{ asset('/js/datepicket/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery-noconflict.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/ajaxaddto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/product.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/configurable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/calendar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/calendar-setup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.etalage.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.zoom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/product_options.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.ui.touch-punch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.mousewheel-3.0.6.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.selectbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.stellar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.parallax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.lazyload.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/jquery.dotdotdot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/imagesloaded.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss//megamenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/sw_quickview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/twitterfetcher.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/porto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/autoHeight.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/ucpb-global.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/ucpb-main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/asset/webjscss/masonry.pkgd.js') }}"></script>

    <script src="{{ asset('/js/moment.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        //<![CDATA[
        Mage.Cookies.path = '/';
        Mage.Cookies.domain = '.www.cocogen.com';
        //]]>
    </script>
    <style type="text/css">
        @-moz-document url-prefix() {
            select.form-control {
                -webkit-appearance: none;
                -moz-appearance: none;
                background: transparent;
                background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
                background-repeat: no-repeat;
                background-position-x: 100%;
                background-position-y: 5px;
                border: 1px solid #dfdfdf;
                border-radius: 2px;
                margin-right: 2rem;
                padding: 1rem;
                padding-right: 2rem;
            }

    </style>
    <script type="text/javascript">
        //<![CDATA[
        optionalZipCountries = ["HK", "IE", "MO", "PA"];
        //]]>
    </script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-936227039"></script>
    <!-- BEGIN GOOGLE ANALYTICS CODE -->
    <script type="text/javascript">
        //<![CDATA[
        var _gaq = _gaq || [];

        _gaq.push(['_setAccount', 'UA-44837625-4']);
        _gaq.push(['_gat._anonymizeIp']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        //]]>
    </script>

    <!-- END GOOGLE ANALYTICS CODE -->
    <script type="text/javascript">
        //<![CDATA[
        if (typeof EM == 'undefined') EM = {};
        EM.Quickview = {
            QS_FRM_WIDTH: "1000",
            QS_FRM_HEIGHT: "730"
        };
        //]]
    </script>
    <!-- Global site tag (gtag.js) - Google Ads: 936227039 -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-936227039');
    </script>
    <script>
        gtag('event', 'page_view', {
            'send_to': 'AW-936227039',
            'value': 'replace with value',
            'items': [{
                'id': '597775379',
                'google_business_vertical': 'retail'
            }]
        });
    </script>

    <style>
        div .mulifont {
            font-family: Muli !important;
            font-size: 40px;
            font-weight: bold;
        }

    </style>
    <script type="text/javascript">
        //<![CDATA[
        var Translator = new Translate([]);
        //]]>
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '242067756914371');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=242067756914371&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/38/1/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/38/1/util.js"></script>
    <style type="text/css">
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

    </style>
    <!-- DEV MODE -->
    <script data-env="development" src="{{ asset('/assets/dist/lessjs/less.min.js') }}"></script>
    {{-- <script>
        less.watch();
    </script> --}}
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="signup-updates">
        <div class="modal-dialog modal-sm">
            <button class="close" id="btn_close" type="button" data-dismiss="modal">
                <span>×</span></button>
            <div class="account-login">
                <div class="row">
                    <div class="col-sm-6 col-xs-11 login-wrap">
                        <div class="tab-content">
                            <div class="fade in" id="signupdates">
                                <div class="registered-users mega-form-builds">
                                    <div class="content">
                                        <form id="form-subscribes" method="post">
                                            <h1>
                                                <span>SIGN UP FOR UPDATES</span>
                                            </h1>
                                            <ul class="form-list">
                                                <li>
                                                    <p>
                                                        Get all the latest information on Events, Sales and Offers.</p>
                                                    <p>
                                                        Sign up for newsletter today.</p>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <label for="xEmail" class="hide">
                                                            Enter Email Address</label><input class="form-control required-entry validate-email" name="xEmail" id="xEmail" type="email" placeholder="Enter Email Address">
                                                    </div>
                                                </li>
                                                <li>
                                                    <button class="btn btn-default current" id="btn_submitNewslettersidebar" name="signup" title="Subscribe" type="submit">
                                                        SUBSCRIBE</button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    <div id="thanksidebarnewslettersubscriptions" style="font-weight: bold; font-size: 11px;
                                        color: rgb(98, 187, 70); display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="content-wrapper wrapper">
        <noscript>
            <div class="global-site-notice noscript">
                <div class="notice-inner">
                    <p>
                        <strong>JavaScript seems to be disabled in your browser.</strong><br />
                        You must have JavaScript enabled in your browser to utilize the functionality of
                        this website.
                    </p>
                </div>
            </div>
        </noscript>
        @include('partials.header')
        <div class="page">

            <!-- <div class="fixed-bottom sp-only" style="">
                <ul> 
                    <li><a href="#" class="search-btn"><span class="fa fa-search"></span><span class="txt">
                        search</span> </a></li>
                    <li><a href="#"><span class="occIcon-31902-76901">
                        <img class="occIconState" src="https://www.onlinechatcenters.com/status-31902-76901"
                            style="display: inline; position: fixed; z-index: 2147483645; right: 0px; bottom: 0px;
                            cursor: pointer;" alt="Live Chat Support Online" title="Live Chat Support Online"
                            data-relation="31902d76901" vspace="0" hspace="0" border="0"></span> <span class="fa fa-commenting-o">
                            </span><span class="txt">chat</span> </a></li>
                    <li>
                        <a href="{{ url('/epolicy') }}"  title="My Account">
                            <span class="fa fa-user-o"></span><span class="txt">My Account</span> </a>
                    </li>
                </ul>
            </div> -->
            
            <!-- Modal -->
            <div class="modal fade" id="let-us-help-you" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-md" role="document">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <div class="account-login">
                        <div class="row">
                            <div class="col-sm-6 col-xs-11 login-wrap">
                                <div class="tab-content">
                                    <div class="fade in">
                                        <div class="registered-users mega-form-builds">
                                            <div class="content">
                                                <h1>
                                                    <img src="/skin/frontend/smartwave/porto_child/images/protection.png" alt="let us help you">
                                                </h1>
                                                <ul class="form-list">
                                                    <li>
                                                        <div class="input-box">
                                                            <p class="modal-title">
                                                                I need protection for my:</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="input-box">
                                                            <span>Choose below:</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="input-box">
                                                            <div class="select-form-wrapper">
                                                                <label for="let-us-help-you" class="hide">
                                                                    Let Us Help You</label>
                                                                <select class="form-control" name="let-us-help-you" id="let-us-help-you">
                                                                    <option value="Home" selected="">Home</option>
                                                                    <option value="Vehicle">Vehicle</option>
                                                                    <option value="Business">Business</option>
                                                                    <option value="Loved Ones">Loved Ones</option>
                                                                    <option value="Self">Self</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <button class="btn btn-default current" name="btn-let-us-help-you" title="Submit" type="submit">
                                                            SUBMIT</button>
                                                    </li>
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
            <!-- /.modal -->


            <main>@yield('content')</main>
        </div>
    </div>

    <?php if (empty($cocogen_admin_footer[0]['content'])) {
        $cocogen_admin_footer[0]['content'] = '';
    }

    $date1 = new DateTime('1963-01-28');
    $date2 = new DateTime('now');
    $interval = $date1->diff($date2);
    $years = $interval->format('%y');
    $months = $interval->format('%m');
    $days = $interval->format('%d');
    if ($years != 0) {
        $ago = $years . ' year(s) ago';
    } else {
        $ago = $months == 0 ? $days . ' day(s) ago' : $months . ' month(s) ago';
    }
    $contentfooter = str_replace('templateyear', $years, $cocogen_admin_footer[0]['content']);
    ?>
    <!-- {!! $contentfooter !!} -->

    @include('partials.footer')

    <a href="#" id="totop"><i class="fa fa-chevron-up"></i></a>
    
    @include('partials/livechat')
    @include('partials/livechatfeedback')

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
            jQuery('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    </script>


    @include('popup', ['modalVersion' => 3])
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATNC3fsTKp2gpF038Qnj1RLRETced6BTk&amp;libraries=places&amp;callback=initMap"> </script>

    <!-- /.modal -->
    </div>
    <iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px;
        padding: 0px; border: medium none;" title="Twitter analytics iframe" frameborder="0">
    </iframe>
    <script type="text/javascript" async="" src="https://www.onlinechatcenters.com/visitor/?SESSID=grjljvcnkgn615mbb9aacps4h2&amp;action=state&amp;state_id_manager=31902&amp;state_departments=76901&amp;state_operators=&amp;4253715"></script>
    <script type="text/javascript" async="" src="https://www.onlinechatcenters.com/code-31902-76901.js"></script>
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/footer-layout1.js') }}"></script>
</body>

</html>
