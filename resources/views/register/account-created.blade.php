@extends('layouts.account-management')

<style>
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: row;
        background: #F7FCFF;
    }

    .content-registered {
        display: flex;
        flex-direction: row;
        width: 100%;
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
        width: 524px;
        padding: 25px;
        margin: auto;
        box-sizing: border-box;
        background-color: #fff;
    }

    .checked-icon {
        display: flex;
        justify-content: center;
    }

    .content-text {
        display: flex;
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    /* ✅ Responsive Styles */
    @media (max-width: 768px) {
        html, body {
            flex-direction: column;
        }

        .content-registered {
            flex-direction: column;
            align-items: center;
        }

        .registered-contents {
            width: 90%;
            padding: 20px;
            margin-top: 30%
        }

        .content-text h2 {
            font-size: 20px;
        }

        .content-text p {
            font-size: 14px;
        }
    }
</style>

<div class="col-md-12" style="background-color:#f7fcff">
    <div class="content-registered">
        <x-stepper :currentStep="session('currentStep', 3)" />

        <div class="registered-contents">
            <div class="checked-icon">
                <img class="icon" src="{{ asset('assets/icons/registered-check.svg') }}">
            </div>

            <div class="content-text">
                <div class="content-title">
                    <h2>Account Created</h2>
                </div>
                <div class="content-p">
                    <p>Your account has been created.<br>Please set up a password to login into your Cocogen account. A link has been sent to the email address you have provided.</p>
                </div>
            </div>

            <x-buttons.primary-button id="idbacktoLogin">Go to Login</x-buttons.primary-button>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $("#idbacktoLogin").on("click", function () {
        window.location.href = $('meta[name="url"]').attr("content") + "/login";
    });
</script>
