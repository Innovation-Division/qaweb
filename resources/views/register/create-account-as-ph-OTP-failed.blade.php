@extends('layouts.account-management')

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Inter', sans-serif;
        background: #F7FCFF;
    }
    .otp-main-container {
        display: flex;
        flex-direction: row;
        height: 100vh;
        width: 100vw;
    }
    .otp-stepper-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        min-width: 120px;
        width: 120px;
        margin: 0;
        padding-left: 0;
        background: transparent;
    }
    .otp-content-center {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .content-registered {
        width: 474px;
        min-height: 315px;
        display: flex;
        flex-direction: column;
        padding: 35px;
        position: relative;
        text-align: center;
        gap: 31px;
        background: white;
        box-shadow: 0 2px 16px rgba(0,0,0,0.04);
        border-radius: 12px;
    }
    .icon {
        width: 65px;
        height: 65px;
        align-items: center;
        text-align: center;
        margin: 0 auto;
    }
    .registered-contents {
        gap: 33px;
        display: flex;
        flex-direction: column;
    }
    .checked-icon {
        gap: 35px;
    }
    .content-text {
        display: flex;
        flex-direction: column;
        gap: 15px;
   }
   @media (max-width: 728px){
        .otp-stepper-container{
            display:none;
        }
        .content-registered{
            width:100% !important;
        }
    }
</style>

<div class="otp-main-container">
    <div class="otp-stepper-container">
        <x-stepper :currentStep="session('currentStep', 2)" />
    </div>
    <div class="otp-content-center">
        <div class="content-registered">
            <div class="checked-icon">
                <img class="icon" src="{{ asset('assets/icons/Icon-WarningCircle.svg') }}">
            </div>
            <div class="registered-contents">
                <div class="content-text">
                    <div class="content-title">
                        <h2>Contact Cocogen Customer Service</h2>
                    </div>
                    <div class="content-p">
                        <p>You have failed to input correct OTP. Please contact Cocogen Customer Service to complete transaction.</p>
                    </div>
                </div>
                <x-buttons.primary-button id="failedOTP">
                    Proceed
                </x-buttons.primary-button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $("#failedOTP").on("click", function () {
        window.location.href = $('meta[name="url"]').attr("content") + "/client-services";
    });
</script>
