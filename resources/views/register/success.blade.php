
@extends('layouts.ecommerce ')

@section('content')
<x-stepper :currentStep="session('currentStep', 2)" />
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/style.css') }}"></script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/vars.css') }}"></script>


   <!-- Card Section -->

   <div class="container vh90 vh-100 d-flex justify-content-center align-items-center">
    <div class="card" style="height: auto;padding:0px 5px 35px 5px;margin-top: -40px;" >
        <div class="card-body">
                    <div class="col-md-12 d-flex justify-content-center  align-items-center">
                      
                    </div>
                    <div class="col-md-12" style="line-height: 2rem;top: 1rem;"><br> </div>
                    <div class="col-md-12 d-flex justify-content-center  align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="66" height="65" fill="none" viewBox="0 0 66 65">
                            <path fill="teal" d="M44.593 24.97a2.034 2.034 0 0 1 0 2.873l-14.218 14.22a2.03 2.03 0 0 1-2.875 0l-6.093-6.095a2.033 2.033 0 0 1 2.874-2.874l4.657 4.66 12.781-12.785a2.034 2.034 0 0 1 2.874 0Zm14.813 7.53A26.406 26.406 0 1 1 33 6.094 26.434 26.434 0 0 1 59.406 32.5Zm-4.062 0A22.344 22.344 0 1 0 33 54.844 22.369 22.369 0 0 0 55.344 32.5Z"/>
                          </svg>
                          
                    </div>
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                    <div class="col-md-12 d-flex justify-content-center  align-items-center">
                        <label class="payment_successful_label">Account Created</label>
                    </div>
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                    <div class="col-md-12 text-center" style="line-height: 0.1rem;">
                        <label class="thank-you-for-choosing-cocogen-insurance">Your account has been successfully created. Please check your email for instructions to reset your password.</label>
                    </div>
                    
                    <div class="col-md-12" style="line-height: 1rem;"><br> </div>
                    <div class="col-md-12 ">
                        <button id="success_page_ok" onclick="window.location.href='{{ url('/login') }}'" type="button" class="btn-arrow-icon btn form-control">Go to login page</button>
                    </div>
                  
        </div>
    </div>
</div>
<script src="{{ asset('/asset/ecommerce/js/jquery-3.6.0.min.js') }}"></script>

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
            color: #3b3939;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 14px;
            line-height: 24px;
            font-weight: 400;
            position: relative;
            align-self: stretch;
        }
        .payment_successful_label{
            /* color: #54b947; */
            font-family: "Inter-Bold", sans-serif;
            font-size: 23px;
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
    @if (Agent::isMobile()) 
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
    @endif
@endsection