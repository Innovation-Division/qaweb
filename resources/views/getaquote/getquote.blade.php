@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

@section('content')

<link rel="stylesheet" href="{{  asset('/asset/ecommerce/css/toastr.min.css') }}" />
<script src="{{ asset('/asset/ecommerce/js/toastr.min.js') }}"></script>


<div class="product content-wrapper bg-layout5">
    <section class="banner banner-service">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Get a Quote</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Get a Quote</h1>
            </div>
        </div>
    </section>
    <div class="main-content">
        <div class="inner productSelection">
            <div class="container">
                <section>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12">
                            <div class="product-selection">
                                <div class="row justify-content-center">
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem">
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('/') }}/images/parentproduct/sib8ZfH1KImlndh5WHPq7gyAV1GHhl1L2APibuud.png" alt="Auto Excel Plus">
                                            </div>
                                            <div class="card-body productContent">
                                                <h5 class="card-title productName ff-regular">Auto Excel Plus</h5>
                                                <p class="card-text productDescription">Shift to a broader protection</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/get-quote/motor-insurance/compre') }}" class="btn btn-secondary-light productButton">{{ __('Get a Quote') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem">
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('/') }}/images/get-a-quote-ctpl.jpeg" alt="CTPL">
                                            </div>
                                            <div class="card-body productContent">
                                                <h5 class="card-title productName ff-regular">CTPL</h5>
                                                <p class="card-text productDescription">Compulsory Third Party Liability required for LTO Registration</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/get-quote/ctpl-insurance') }}" class="btn btn-secondary-light productButton">{{ __('Get a Quote') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem mb-0">
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('/') }}/images/parentproduct/yDGPNEecWGzejTaTDwWkkyfZrjnjbfoeHRQVgF2F.png" alt="COVID-19 Assist+">
                                            </div>
                                            <div class="card-body productContent">
                                                <h5 class="card-title productName ff-regular">COVID-19 Assist+</h5>
                                                <p class="card-text productDescription">Award-winning microinsurance</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/get-quote/covid-19-assist-plus') }}" class="btn btn-secondary-light productButton">{{ __('Get a Quote') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem">
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('/') }}/images/Domestic Travel Excel Plus.jpg" alt="Auto Excel Plus">
                                            </div>
                                            <div class="card-body productContent">
                                                <h5 class="card-title productName ff-regular">Domestic Travel Plus</h5>
                                                <p class="card-text productDescription">Peace of mind for local getaways</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/get-quote/domestic-travel-plus') }}" class="btn btn-secondary-light productButton">{{ __('Get a Quote') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem mb-0">
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('/') }}/images/getquote/international_travel_protect.jpg" alt="International Travel Protection">
                                            </div>
                                            <div class="card-body productContent">
                                                <h5 class="card-title productName ff-regular">International Travel Excel Plus</h5>
                                                <p class="card-text productDescription">Best buddy to a hassle-free journey</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/get-quote/international-travel-protect') }}" class="btn btn-secondary-light productButton">{{ __('Get a Quote') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem mb-0">
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('/') }}/images/subparentproduct/tPmIwXNWLKsIJOfTPNzNrhne9sOOag1E89p5Szlx.jpeg" alt="PRO-TECH">
                                            </div>
                                            <div class="card-body productContent">
                                                <h5 class="card-title productName ff-regular">Pro-Tech</h5>
                                                <p class="card-text productDescription">New essential for  desktops and laptops</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/get-quote/pro-tech-insurance') }}" class="btn btn-secondary-light productButton">{{ __('Get a Quote') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="divider">
        <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
<script>
     $(document).ready(function(){

        var urlParams = new URLSearchParams(window.location.search); // Get URL parameters
        var product = urlParams.get('product'); 
        var status = urlParams.get('status'); 

        if(status == "cancelled"){
            toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                var $toastContainer = $('.toast-warning');
                if ($toastContainer.length > 1) {
                    $toastContainer.last().remove();
                }
                toastr.warning('You have cancelled your <b>'+ product+'</b> application.',
                    '<b>'+ product+'</b> Cancelled', {
                        timeOut: 5000
                });
        }
        if(status == "pending"){
            toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                var $toastContainer = $('.toast-warning');
                if ($toastContainer.length > 1) {
                    $toastContainer.last().remove();
                }
                toastr.warning('Your <b>'+ product +'</b> policy is pending. Reference number has been sent to your email. Please complete payment to complete transaction.',
                    '<b>'+ product+'</b> Purchase Pending', {
                        timeOut: 5000
                });
        }
        if(status == "failed"){
            toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                var $toastContainer = $('.toast-warning');
                if ($toastContainer.length > 1) {
                    $toastContainer.last().remove();
                }
                toastr.warning('You have successfully cancelled payment for <b>'+ product+'</b> application.',
                    '<b>'+ product+'</b> Cancelled', {
                        timeOut: 5000
                });
        }
    });
</script>
 <style>
      

        /* Customize the background color of the warning toast */
        .toast-warning {
            background-color: white !important; 
            color: #333 !important;              /* Dark text color for readability */
        }

        /* Customize the progress bar (the timer) to be orange */
        .toast-warning .toast-progress {
            background-color: #f39c12 !important;  /* Orange color for the progress bar (timer) */
        }

        /* Customize the header text (title) to have a dark color */
        .toast-warning .toast-title {
            /* color: #f39c12 !important; Orange color for the title */
        }

        /* Optional: Customize the close button to have a dark color */
        .toast-warning .toast-close-button {
            color: #f39c12 !important; /* Orange close button */
        }

        /* error toast */
        /* Customize the background color of the warning toast */
        .toast-error {
            background-color: white !important;  /* White background for error toast */
            color: #333 !important;              /* Dark text color for readability */
        }

        /* Customize the progress bar (the timer) to be orange */
        .toast-error .toast-progress {
            background-color: #e74c3c  !important;  /* Orange color for the progress bar (timer) */
        }

        /* Customize the header text (title) to have a dark color */
        .toast-error .toast-title {
            /* color: #e74c3c  !important; Orange color for the title */
        }

        /* Optional: Customize the close button to have a dark color */
        .toast-error .toast-close-button {
            color: #e74c3c  !important; /* Orange close button */
        }
        
</style>
@if(session('package'))
    <script>
        $(document).ready(function(){
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                var $toastContainer = $('.toast-success');
                if ($toastContainer.length > 1) {
                    $toastContainer.last().remove();
                }
                toastr.success('Success! Your <b>'+ '{{session("package")}}'+'</b> policy will be sent to your e-mail address in a few minutes.',
                    '<b>'+ '{{session("product")}}'+'</b> Purchase', {
                        timeOut: 5000
                });
        });
    </script>
@else
    @if(session('product'))
        <script>
            $(document).ready(function(){
                    toastr.options.closeButton = true;
                    toastr.options.progressBar = true;
                    var $toastContainer = $('.toast-success');
                    if ($toastContainer.length > 1) {
                        $toastContainer.last().remove();
                    }
                    toastr.success('Success! Your <b>'+ '{{session("product")}}'+'</b> policy will be sent to your e-mail address in a few minutes.',
                        '<b>'+ '{{session("product")}}'+'</b> Purchase', {
                            timeOut: 5000
                    });
            });
        </script>
    @endif
@endif
@if(session('inquiry'))
    <script>
        $(document).ready(function(){
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                var $toastContainer = $('.toast-success');
                if ($toastContainer.length > 1) {
                    $toastContainer.last().remove();
                }
                toastr.success('Success! Your <b>Auto Excel Plus - Premium inquiry </b> is sent to Cocogen Customer Service. Expect a call from our representative.',
                    '<b>Auto Excel Plus Inquiry</b>', {
                        timeOut: 5000
                });
        });
    </script>
@endif
    @if (Agent::isMobile())
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

            #toast-container>.toast-warning {
                background: #ffffff !important;
                background-image: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20viewBox%3D%220%200%2024%2024%22%3E%0A%20%20%3Cpath%20fill%3D%22%23F5BC16%22%20d%3D%22M22.2%2017.634%2014.002%203.396a2.322%202.322%200%200%200-4.004%200L1.8%2017.634a2.204%202.204%200%200%200%200%202.223A2.282%202.282%200%200%200%203.802%2021h16.396a2.284%202.284%200%200%200%202-1.143%202.204%202.204%200%200%200%20.002-2.223ZM11.25%209.75a.75.75%200%201%201%201.5%200v3.75a.75.75%200%200%201-1.5%200V9.75ZM12%2018a1.125%201.125%200%201%201%200-2.25A1.125%201.125%200%200%201%2012%2018Z%22%2F%3E%0A%3C%2Fsvg%3E%0A") !important;
                background-repeat: no-repeat !important;
                background-position-x: 15px !important;
                background-position-y: 28px !important;
                background-size: 30px auto, 100% !important;
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
    @else
        <style>
            .toast {
                border: none !important;
                font-family: "Inter-Bold", sans-serif !important;
            }
        
            #toast-container>.toast-success {
                background: #ffffff !important;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'%3E%3Cpath fill='%2309a12a' d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm3.354-10.354a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.146 3.146-3.146a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E") !important;
                /* background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'%3E%3Cpath fill='%23039855' d='M12 2.25A9.75 9.75 0 1 0 21.75 12 9.76 9.76 0 0 0 12 2.25Zm4.28 8.03-5.25 5.25a.747.747 0 0 1-1.06 0l-2.25-2.25a.75.75 0 1 1 1.06-1.06l1.72 1.72 4.72-4.72a.751.751 0 0 1 1.06 1.06Z'/%3E%3C/svg%3E%0A"); */
                background-repeat: no-repeat !important;
                background-position-x: 15px !important;
                background-position-y: 28px !important;
                background-size: 20px auto, 100% !important;
            }
            #toast-container>.toast-warning {
                background: #ffffff !important;
                background-image: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20viewBox%3D%220%200%2024%2024%22%3E%0A%20%20%3Cpath%20fill%3D%22%23F5BC16%22%20d%3D%22M22.2%2017.634%2014.002%203.396a2.322%202.322%200%200%200-4.004%200L1.8%2017.634a2.204%202.204%200%200%200%200%202.223A2.282%202.282%200%200%200%203.802%2021h16.396a2.284%202.284%200%200%200%202-1.143%202.204%202.204%200%200%200%20.002-2.223ZM11.25%209.75a.75.75%200%201%201%201.5%200v3.75a.75.75%200%200%201-1.5%200V9.75ZM12%2018a1.125%201.125%200%201%201%200-2.25A1.125%201.125%200%200%201%2012%2018Z%22%2F%3E%0A%3C%2Fsvg%3E%0A") !important;
                background-repeat: no-repeat !important;
                background-position-x: 15px !important;
                background-position-y: 28px !important;
                background-size: 30px auto, 100% !important;
            }
            #toast-container>div {
                width: 560px;
                opacity: 1;
                border-radius: 8px;
                box-shadow: none;
                padding: 25px 15px 15px 60px;
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
                background-color: #09a12a !important;
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
    @endif
@endsection
