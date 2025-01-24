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
    <meta name="robots" content="NOINDEX,NOFOLLOW">

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

  
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style-layout1.css') }}" media="all">
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/style-fix/header.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/style-fix/footer.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/global.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/header.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/footer.less') }}" />




    <link rel="stylesheet" href="{{  asset('/asset/ecommerce/css/toastr.min.css') }}" />
    <script src="{{ asset('/asset/ecommerce/js/toastr.min.js') }}"></script>
    
    <script src="{{ asset('/js/moment.min.js') }}"></script>

    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
    @mobile 
        <style>
            .toast {
                border: none !important;
                font-family: "Inter-Bold", sans-serif !important;
            }
        
            #toast-container>.toast-success {
                background: #ffffff !important;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'%3E%3Cpath fill='%231465B4' d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2'/%3E%3C/svg%3E") !important;
                background-repeat: no-repeat !important;
                background-position-x: 15px !important;
                background-position-y: 28px !important;
                background-size: 20px auto, 100% !important;
            }
        
            #toast-container>div {
                margin-left:3.125rem;
                width: 90%;
                opacity: 1;
                border-radius: 8px;
                box-shadow: none;
                padding: 25px 15px 15px 50px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            }
            
            .toast-top-right {
                top: 15px;
                right: 30px;
            }
        
            .toast-title {
                font-family: "Inter-Bold", sans-serif !important;
                color: #1D1F23;
                font-size: 14px;
                line-height: 24px;
                font-weight: 700;
            }
        
            .toast-message {
                -ms-word-wrap: break-word;
                word-wrap: break-word;
                font-family: "Inter-Bold", sans-serif !important;
                color: #2D2727;
                font-size: 12px;
                line-height: 18px;
                font-weight: 500;
            }
        
            .toast-progress {
                top: 0 !important;
                right: 0 !important;
                background-color: #003592 !important;
                opacity: 1;
                height: 5px;
            }
        
            .toast-close-button {
                color: #848A90;
                padding: 10px !important;
                font-size: 30px;
                font-weight: 300;
            }
        </style>
    @elsemobile
        <style>
            .toast {
                border: none !important;
                font-family: "Inter-Bold", sans-serif !important;
            }
        
            #toast-container>.toast-success {
                background: #ffffff !important;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'%3E%3Cpath fill='%231465B4' d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2'/%3E%3C/svg%3E") !important;
                background-repeat: no-repeat !important;
                background-position-x: 15px !important;
                background-position-y: 28px !important;
                background-size: 20px auto, 100% !important;
            }
        
            #toast-container>div {
                width: 560px;
                opacity: 1;
                border-radius: 8px;
                box-shadow: none;
                padding: 25px 15px 15px 50px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            }
            
            .toast-top-right {
                top: 15px;
                right: 30px;
            }
        
            .toast-title {
                font-family: "Inter-Bold", sans-serif !important;
                color: #1D1F23;
                font-size: 16px;
                line-height: 24px;
                font-weight: 700;
            }
        
            .toast-message {
                -ms-word-wrap: break-word;
                word-wrap: break-word;
                font-family: "Inter-Bold", sans-serif !important;
                line-height: 20px;
                color: #2D2727;
                font-size: 14px;
                line-height: 20px;
                font-weight: 500;
            }
        
            .toast-progress {
                top: 0 !important;
                right: 0 !important;
                background-color: #003592 !important;
                opacity: 1;
                height: 5px;
            }
        
            .toast-close-button {
                color: #848A90;
                padding: 10px !important;
                font-size: 30px;
                font-weight: 300;
            }
        </style>
    @endmobile
<!-- 
     <style>
        .align-items-center {
            align-items: center !important;
            }
            .justify-content-center {
            justify-content: center !important;
            }
            .flex-wrap {
            flex-wrap: wrap !important;
            }
            .d-flex {
            display: flex !important;
            }
            header {
            position: fixed;
            width: 100%;
            z-index: 999;
            min-height: 100px;
            background-color: #ffffff;
            box-shadow: 0px 0px 6px 3px rgba(104, 104, 104, 0.25);
            -webkit-box-shadow: 0px 0px 6px 3px rgba(104, 104, 104, 0.25);
            -moz-box-shadow: 0px 0px 6px 3px rgba(104, 104, 104, 0.25);
            }
            * {
            color: inherit;
            transition: 0.15s;
            font-family: "Muli";
            outline: none !important;
            }
            * {
            color: inherit;
            transition: 0.15s;
            font-family: "Muli";
            outline: none !important;
            }
            *, ::after, ::before {
            box-sizing: border-box;
            }
            header .container-fluid {
            max-width: 1720px;
            }
            .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            width: 100%;
            padding-right: var(--bs-gutter-x, 0.75rem);
            padding-left: var(--bs-gutter-x, 0.75rem);
            margin-right: auto;
            margin-left: auto;
            }
            * {
            color: inherit;
            transition: 0.15s;
            font-family: "Muli";
            outline: none !important;
            }
            * {
            color: inherit;
            transition: 0.15s;
            font-family: "Muli";
            outline: none !important;
            }
            *, ::after, ::before {
            box-sizing: border-box;
            }
            body {
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            -webkit-text-size-adjust: 100%;
            }

            body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            }
            * {
            color: inherit;
            transition: 0.15s;
            font-family: "Muli";
            outline: none !important;
            }
            * {
            color: inherit;
            transition: 0.15s;
            font-family: "Muli";
            outline: none !important;
            }
            *, ::after, ::before {
            box-sizing: border-box;
            }

            header .nav-item .label {
            font-family: "Muli";
            font-weight: 600;
            color: #2f313d;
            position: relative;
            font-size: 20px;
            padding-top: 7px;
            padding-bottom: 7px;
            margin-top: 12px;
            display: block;
            }
            a {
            color: inherit;
            font-weight: inherit;
            text-decoration: none;
            cursor: pointer;
            }
            a {
            color: inherit;
            font-weight: inherit;
            text-decoration: none;
            cursor: pointer;
            }
            a {
            color: #0d6efd;
            text-decoration: underline;
            }

            .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
            }
            .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
                border-top-color: transparent;
                border-right-color: transparent;
                border-bottom-color: transparent;
                border-left-color: transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            .btn-primary {
            background-image: -webkit-linear-gradient(top, #337ab7 0, #265a88 100%);
            background-image: -o-linear-gradient(top, #337ab7 0, #265a88 100%);
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #337ab7), to(#265a88));
            background-image: linear-gradient(to bottom, #337ab7 0, #265a88 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff337ab7', endColorstr='#ff265a88', GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
            background-repeat: repeat-x;
            border-color: #245580;
            }

            header .highlight .label {
            color: #ffffff !important;
            transition: 0.1s;
            flex-grow: 1;
            padding: 0px 20px;
                padding-top: 0px;
            padding-top: 12px;
            margin-top: 0px;
            }
            header .nav-item .label {
            font-family: "Muli";
            font-weight: 600;
            color: #2f313d;
            position: relative;
            font-size: 20px;
            padding-top: 7px;
            padding-bottom: 7px;
            margin-top: 12px;
            display: block;
            }
            .align-items-center {
            align-items: center !important;
            }
            .justify-content-center {
            justify-content: center !important;
            }
            .d-flex {
            display: flex !important;
            }

     </style> -->
    <script type="text/javascript">
        //<![CDATA[
        Mage.Cookies.path = '/';
        Mage.Cookies.domain = '.www.cocogen.com';
        //]]>
    </script>
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
        #survey_form .modal-content
        {
        background: url('/images/survey/Assets_Asset.png') left top no-repeat;
            background-color: rgba(0, 0, 0, 0);
            background-size: auto;
        background-size: 50%;
        background-color: #ffffff;
        width: 100%;
        height: auto;
        }

        #privacy-policy .modal-content
        {
            padding: 50px;
            height: 30rem;
            padding: 20px;
            max-width: 700px;
            padding: -10px;
            max-height: 700px;
        }

        #ChckPrivacyPolicy
        {
            border-radius: .25em;
            border-color: red;
            border: 1px solid #B8B8B8;
            width: 28px;
            height: 28px;
        }
        .chat-header
        {

        background: #db3e8d;
        -webkit-border-radius: 10px 10px 0 0;
        border-radius: 10px 10px 0 0;
        -webkit-box-shadow: inset 0 0 10px 0 rgba(254, 254, 254, 0.3);
        box-shadow: inset 0 0 10px 0 rgba(254, 254, 254, 0.3);
        padding: 10px;
        cursor: pointer;
        text-align: left;

        }
    </style>
    <!-- DEV MODE -->
    <script data-env="development" src="{{ asset('/assets/dist/lessjs/less.min.js') }}"></script>
    {{-- <script>
        less.watch();
    </script> --}}
</head>

<body>

   
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
            <main>@yield('content')</main>
        </div>
    </div>
    
    @mobile
    @elsemobile
        <style>
            footer{
                width:120%;
                margin-left:-20px
            }
        </style>
    @endmobile

    <div class="col-md-12">
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
    </div>
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


    @include('popup_modified', ['modalVersion' => 3])
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
    <script src="{{ asset('assets/js/footer-layout1.js') }}"></script>
</body>

</html>
