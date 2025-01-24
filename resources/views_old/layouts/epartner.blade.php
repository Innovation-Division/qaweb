<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta >
    <title>{{ $title }}</title>
    <!-- CSS files -->
    <link href="{{asset('dist/css/tabler.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/demo.min.css?1684106062')}}" rel="stylesheet" />
    <link rel="icon" href="{{ URL::to('/') }}/images/favicon.ico" type="image/x-ico">

    <meta name="robots" content="NOINDEX,NOFOLLOW">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Libre+Baskerville&family=Neucha&display=swap"
        rel="stylesheet">
  
        <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">

    <style>
        body {
            font-family: Inter, Arial, sans-serif;
        }

        header.navbar.navbar-expand-md.d-none.d-lg-flex.d-print-none {
            padding: 15px;
        }

        @media (min-width: 992px) {
            .navbar-vertical.navbar-expand-lg {
                width: 15rem;
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 1030;
                align-items: flex-start;
                transition: transform .3s;
                overflow-y: hidden;
                padding: 0;
            }

            h1.navbar-brand.navbar-brand-autodark {
                background: white;
                padding: 4px !important;
            }

            header.navbar.navbar-expand-md.d-none.d-lg-flex.d-print-none {
                margin-left: 0px !important;
                padding: 0px !important;
            }

            aside.navbar.navbar-vertical.navbar-expand-lg.navbar-transparent {
                top: 83px !important;
            }
        }

        .nav-link-title-active {
            color: #E4509A !important;
            font-weight: bold !important;
        }

        .icon-stroke {
            stroke: #E4509A;
        }

        span.nav-link-title:hover {
            color: #E4509A !important;
        }

        .outer-loading-page{
        background-color: black !important;
        opacity: 0.6;
        width: 100%;
        height: 100%;
        z-index: 20;
        position: fixed;
        display:none;
    }
    .loading-spinner {
        position: fixed;
        display:none; 
        left: 50%;
        transform: translate(-50%,-50%) translateZ(0);
        background-color: rgba(0, 0, 0, 0.3);
        top: 50%;
        width: 60px;
        height: 60px;
        z-index: 999;
        background: url(https://www.cocogen.com/images/favicon.ico) center no-repeat;
        background-size: contain;
        animation: spinning 1.5s infinite ease-in-out;
    }

    .loading-spinner:after {
        content:"";
        position:absolute;
        width:70px;
        height:70px;
        background-color:rgba(0,0,0,0);
        border-radius:100%;
        margin:-4px;
        box-shadow: 0 4px 0 0 #008080;
        transition: all 1s linear;
        animation: lds-eclipse 1s linear infinite;
        
    }

    @media (min-width: 1400px) {
        .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            max-width: 82%;
        }
    }

    @keyframes spinning {
        0% { transform: translate(-50%,-50%) scale(1) translateZ(0);}
        50% { transform: translate(-50%,-50%) scale(1.1) translateZ(0);}
        100% { transform: translate(-50%,-50%) scale(1) translateZ(0);}
    }

    @keyframes lds-eclipse {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    50% {
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
<input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">

<div class="outer-loading-page">
    </div>
    <div class="loading-spinner"></div>
    <script src="{{asset('dist/js/demo-theme.min.js?1684106062')}}"></script>
    <input type="hidden" id="hdnname" name="hdnname" value="{{\Auth::user()->name}}">
    <input type="hidden" id="url" name="url" value="{{url('/')}}">
    <div class="page">

        <aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent" id="navbar">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-lg-none">
                    <a  href="{{ url('/epolicy') }}">
                        <img src="{{ URL::to('/') }}/images/COCOGEN LOGO.png" width="110" height="32" alt="Cocogen"
                            class="navbar-brand-image" style="width: 210px; height: 100%">
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                  
                    <div class="d-none d-lg-flex">
                      
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                          
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Last updates</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Change deprecated html tags to text decoration classes (#29604)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 2</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        justify-content:between ⇒ justify-content:space-between (#29734)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 3</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Update change-version.js (#29736)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 4</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Regenerate package-lock.json (#29730)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Sidebar -->
                @include('layouts.epartner-sidebar')
                <!-- Sidebar -->



            </div>
        </aside>
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
            <div style="border-bottom: 1px solid #dadfe5;">
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="{{ url('/epolicy') }}">
                        <img src="{{ URL::to('/') }}/images/COCOGEN LOGO.png" width="110" height="32" alt="Cocogen"
                            class="navbar-brand-image" style="width: 210px; height: 100%">
                    </a>
                </h1>
            </div>
            <div class="container-xl d-print-none">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex">
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path
                                    d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a id="btn-notification" href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications">
                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon_notification" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                                <div id="divnotifyicon"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Last updates</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div id="divNotification"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle " href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="true">
                        <span class="d-md-none d-lg-inline-block" ><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                        <span id="profileImage" class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)" > <div id="profileImagetext"></div></span>
                        </span>
                        <div class="d-none d-xl-block ps-2" style="line-height: 1;">
                                <div>{{\Auth::user()->name}} 
                                </div>
                                <div class="mt-1 small text-muted">
                                    @if(\Auth::user()->type == 'A')
                                        Agent
                                    @endif
                                    @if(\Auth::user()->type == 'C')
                                        Client
                                    @endif

                                    @if(\Auth::user()->type == 'B')
                                        Agent
                                    @endif
                                </div>
                            </div>
                      </a>
                      <div class="dropdown-menu" data-bs-popper="static">
                        <a class="dropdown-item" href="{{ url('/settings') }}" target="_blank" rel="noopener">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-settings-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('settings')) ? '#E4509A' : '' }}"
                                d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" />
                            <path stroke="{{ (request()->is('settings')) ? '#E4509A' : '' }}"
                                d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        </svg> &nbsp;&nbsp;
                             Settings
                        </a>
                        <a class="dropdown-item" href="{{ url('/logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                            <path d="M15 12h-12l3 -3" />
                            <path d="M6 15l-3 -3" />
                        </svg> &nbsp;&nbsp;  
                        Logout
                        </a>
                      </div>
                    </li>
                </div>


                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <form action="./" method="get" autocomplete="off" novalidate>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" /></svg>
                                </span>
                                <input type="text" value="" class="form-control" placeholder="Search…"
                                    aria-label="Search in website">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <!-- Page header -->
            <!-- Page body -->


            <div class="page-body">
                @yield('main-content')
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; {{ now()->year }}
                                    <a href="." class="link-secondary">Cocogen</a>.
                                    All rights reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        var x = window.matchMedia("(min-width: 992px)");

        window.onscroll = function () {
            scrollFunction(x)
        };

        function scrollFunction(x) {
            if (x.matches) {
                if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
                    document.getElementById("navbar").style.cssText = 'top: 0 !important';
                } else {
                    document.getElementById("navbar").style.cssText = 'top: 83px !important ';
                }
            } else {
                document.getElementById("navbar").style.cssText = 'top: 0 !important';
            }
        }
    </script>
    <!-- Libs JS -->
    <script src="{{asset('dist/libs/apexcharts/dist/apexcharts.min.js?1684106062')}}" defer></script>
    <script src="{{asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062')}}" defer></script>
    <script src="{{asset('dist/libs/jsvectormap/dist/maps/world.js?1684106062')}}" defer></script>
    <script src="{{asset('dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062')}}" defer></script>
    

    <script src="{{asset('dist/libs/nouislider/dist/nouislider.min.js?1695847769')}}" defer></script>
    <script src="{{asset('dist/libs/litepicker/dist/litepicker.js?1695847769')}}" defer></script>
    <script src="{{asset('dist/libs/tom-select/dist/js/tom-select.base.min.js?1695847769')}}" defer></script>
    <!-- Tabler Core -->
    <script src="{{asset('dist/js/tabler.min.js?1684106062')}}" defer></script>
    <script src="{{asset('dist/js/demo.min.js?1684106062')}}" defer></script>

      <!-- SweetAlert2 -->
      <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('js/notification.js')}}"></script>
    <?php 
        if(!empty(session("randomicomcolor"))){
            $random = session("randomicomcolor");
        }else{
            $random = "#" . dechex(rand(0, 16777215));
        }
        session()->put('randomicomcolor',$random);
    ?>
    <script>
  $(document).ready(function(){
    if ('{{ session("randomicomcolor") }}' == null && '{{ session("randomicomcolor") }}' == undefined) {
         var random = "#" + Math.floor(Math.random()*16777215).toString(16);
    }else{
        var random = '{{ session("randomicomcolor") }}';
    }
    var names =  $('#hdnname').val();
    var namesI = names.slice(0, 2);
    var randomdarker = adjust(random, -70);
    $("#profileImage").css("background-color", random);
    $('#profileImagetext').text(namesI);
    $("#profileImagetext").css("color", randomdarker);

    function adjust(color, amount) {
        return '#' + color.replace(/^#/, '').replace(/../g, color => ('0'+Math.min(255, Math.max(0, parseInt(color, 16) + amount)).toString(16)).substr(-2));
    }
 });
</script>
<style>
    #profileImage {
        border-radius: 50%;
        font-size: 35px;
        text-align: center;
        line-height: 150px;
        margin: 20px 0;
    }
    #profileImagetext{
        font-size: 14px;
        font-weight:bold;
        margin: 0px -1px 0px 0px;
    }
</style>
<style>
    .icon_notification {
  --tblr-icon-size: 2rem;
  font-size: var(--tblr-icon-size);
  stroke-width: 1.5;
}
</style>
</body>
</html>