
@extends('layouts.nomenuecommerce ')

@section('content')

<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/style.css') }}"></script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/vars.css') }}"></script>


   <!-- Card Section -->

   <div class="container vh90 vh-100 d-flex justify-content-center align-items-center">
    <div class="card" >
        <div class="card-body">
                    <div class="col-md-12" style="line-height: 2rem;top: 1rem;"><br> </div>
                    <div class="col-md-12 d-flex justify-content-center  align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="66" height="65" fill="none" viewBox="0 0 66 65">
                        <path fill="#BB251A" d="M33 6.094A26.406 26.406 0 1 0 59.406 32.5 26.435 26.435 0 0 0 33 6.094Zm0 48.75A22.343 22.343 0 1 1 55.344 32.5 22.37 22.37 0 0 1 33 54.844ZM30.969 34.53V20.313a2.031 2.031 0 1 1 4.062 0V34.53a2.031 2.031 0 1 1-4.062 0Zm5.078 9.14a3.047 3.047 0 1 1-6.093.001 3.047 3.047 0 0 1 6.093 0Z"/>
                    </svg>


                    </div>
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                    <div class="col-md-12 d-flex justify-content-center  align-items-center">
                        <label class="payment_pending_label">Payment Failed</label>
                    </div>
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                    <div class="col-md-12 text-center" style="line-height: 0.1rem;">
                        <label class="thank-you-for-choosing-cocogen-insurance">Your attempt to pay <b>P {{number_format($amount, 2, '.', ',')}}</b> via <b>{{$payment}}</b>  is unsuccessful.</label>
                    </div>
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                    <div class="col-md-12 text-center" style="line-height: 0.1rem;">
                        <label class="thank-you-for-choosing-cocogen-insurance"><b>{{$reason}}</b> </label>
                    </div>
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                    <div class="col-md-12 text-center" style="line-height: 0.1rem;">
                        <label  id="countdown" class="thank-you-for-choosing-cocogen-insurance">Redirecting in 15 seconds..</label>
                    </div>
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                 
        </div>
    </div>
</div>
<script src="{{ asset('/asset/ecommerce/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var countdown = 15; // Set countdown time in seconds
            var interval = setInterval(function() {
                // Update the countdown in the <p> tag with ID "countdown"
                $('#countdown').text('Redirecting in ' + countdown + ' seconds...');
                countdown--; // Decrease countdown by 1
                if (countdown < 0) {
                    clearInterval(interval); // Stop the countdown
                    var urlParams = new URLSearchParams(window.location.search); // Get URL parameters
                    var targetUrl = "{{ url('/get-quote/ecommerce/failed') }}" + "/" + "{{$product}}";
                    window.location.href = targetUrl;
                   
                }
            }, 1000); // 1000 ms = 1 second
        });
    </script>
<style>
    .form-control{
        box-shadow: none;
    }
        .vh90{
            height: 90vh !important;
        }
        .success-svg-check{
            top: -41px;
            position: absolute;
        }
        .card{
            height: 33rem;
            width: 31.688rem;
        }
        .col-md-12{
            background: #ffffff;
        }
        .thank-you-for-choosing-cocogen-insurance{
            color: #585858;
            text-align: center;
            font-family: "Inter-Medium", sans-serif;
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            position: relative;
            align-self: stretch;
        }
        .payment_pending_label{
            color: #2d2727;
            text-align: center;
            font-family: "Inter-Bold", sans-serif;
            font-size: 27px;
            font-weight: 700;
            position: relative;
            align-self: stretch;
        }

        .full-height {
            height: 80vh; /* Full viewport height */
        }
        .centered-div {
            width: 31%; /* Set a specific width */
           /* heght: 200px;  Set a specific height */
            text-align: center; /* Center text inside the div */
            line-height: 3; /* Center text vertically */
        }
        .btn-arrow-icon{
            height: 44px;
            border-radius: 4px !important;
            background: #008080;
            padding: 10px 20px 10px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            color: #ffffff;
            text-align: left;
            font-family: "Inter-Medium", sans-serif;
            font-size: 16px !important;
            line-height: 20px;
            font-weight: 500;
            position: relative;
            z-index:1 !important;
        }

        .btn-arrow-icon:hover{
            background-color:#008080 !important;
            border:1px solid #008080 !important;
            color:#fff !important;
        }
        .btn-arrow-icon:focus,
        .btn-arrow-icon:active{
            background-color:#60b3b3 !important;
            border:1px solid #60b3b3 !important;
            color:#fff !important;
        }

        .btn-arrow-icon:focus:before,
        .btn-arrow-icon:active:before{
            background-color:transparent !important;
            color:#fff !important;
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
            display: absolute;
            width: 24px !important;
            height: 24px !important;
        }

        .btn-arrow-icon:visited:before,
        .btn-arrow-icon:target:before,
        .btn-arrow-icon:hover:before {
            background-color: transparent !important;
            color:#fff !important;
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
            display: absolute;
            width: 24px !important;
            height: 24px !important;
        } 

         /* secondary */
    .btn-arrow-icon-secondary{
        height: 44px;
        border-radius: 4px !important;
        border:0;
        background-color:transparent;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color:#008080;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index:1 !important;
    }

    .btn-arrow-icon-secondary:hover{
        background-color:transparent !important;
        color:#008080 !important;
        border: 1px solid #008080 !important;
    }

    .btn-arrow-icon-secondary:focus,
    .btn-arrow-icon-secondary:active{
        background-color:#c0e6e6 !important;
        border:1px solid #c0e6e6 !important;
        color:#008080 !important;
    }

    .btn-arrow-icon-secondary:focus:before,
    .btn-arrow-icon-secondary:active:before{
        background-color:transparent !important;
        color:#008080 !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23008080' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    }

    .btn-arrow-icon-secondary:visited:before,
    .btn-arrow-icon-secondary:target:before,
    .btn-arrow-icon-secondary:hover:before {
        background-color: transparent !important;
        color:#008080 !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23008080' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    } 
    /* end secondary */
</style>
    @mobile 
    <style>
        .btn-arrow-icon {
            height: 40px !important;
        }

        .btn-arrow-icon-secondary {
            height: 40px !important;
        }
        .btn-arrow-icon{
        height: 48px;
        border-radius: 4px !important;
        background: #008080;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color: #ffffff;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index:1 !important;
      }


      .btn-arrow-icon-secondary{
        height: 48px;
        border-radius: 4px !important;
        border:0;
        background-color:transparent;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color:#008080;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index:1 !important;
      }
         .centered-div {
            width: 100% !important; /* Set a specific width */
        }
    </style>
    @endmobile
@endsection