@extends('layouts.layout1')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
<style>
    p, input, div, button, a, span {
        font-family: 'Inter' !important;
    }

    a {
        color: #008080;

    }

    a:hover {
        color: #006666;
    }

    .page-title {
        font-size: 45px;
        font-weight: 600;
        line-height: 48.41px;
        color: #ffffff;
    }

    .div-title {
        font-weight: 700;
        font-size: 28px;
        line-height: 32.68px;
        color: #2D2727 !important;
    }

    .div-sub-title {
        font-weight: 600;
        font-size: 21px;
        line-height: 27.84px;
        color: #2D2727 !important;
    }

    .modal-open {
        overflow: hidden;
}

    /* .frame-108774,
    .frame-108774 * {
        box-sizing: border-box;
    } */

    .completed {
        color: var(--status-successful, #09a12a);
        text-align: center;
        font-family: var(--web-medium-footnote-font-family,
                "Inter-Medium",
                sans-serif);
        font-size: var(--web-medium-footnote-font-size, 10px);
        font-weight: var(--web-medium-footnote-font-weight, 500);
        position: relative;
        align-self: stretch;
    }

    .frame-108774 {
        background: var(--primary-white, #ffffff);
        border-style: solid;
        border-color: #e9e9e9;
        border-width: 0px 0px 1px 0px;
        padding: 50px 250px 50px 250px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
        position: sticky;
        background-color: #ffffff;
    }

    .itp-internatioal {
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
        align-self: center;
        flex-shrink: 0;
        position: relative;
        margin-left: -15%;
    }

    .group-108428 {
        flex-shrink: 0;
        width: 532px;
        height: 80px;
        position: static;
    }

    .line-5 {
        margin-top: -1px;
        border-style: solid;
        border-color: var(--surfaces-lvl-2, #eff2f4);
        border-width: 1px 0 0 0;
        width: 99px;
        height: 0px;
        position: absolute;
        left: 179.5px;
        top: 17px;
        transform-origin: 0 0;
        transform: rotate(0deg) scale(1, 1);
    }



    .line-6 {
        margin-top: -1px;
        border-style: solid;
        border-color: var(--surfaces-lvl-2, #eff2f4);
        border-width: 1px 0 0 0;
        width: 114px;
        height: 0px;
        position: absolute;
        left: 299.5px;
        top: 17px;
    }

    .line-7 {
        margin-top: -1px;
        border-style: solid;
        border-color: var(--surfaces-lvl-2, #eff2f4);
        border-width: 1px 0 0 0;
        width: 108px;
        height: 0px;
        position: absolute;
        left: 448.5px;
        top: 17px;
        transform-origin: 0 0;
        transform: rotate(0deg) scale(1, 1);
    }

    .done {
        border-color: var(--surfaces-lvl-2, #09A12A) !important;
    }

    .frame-108568 {
        display: flex;
        flex-direction: column;
        gap: 13px;
        align-items: center;
        justify-content: flex-start;
        width: 88px;
        position: absolute;
        left: 123.5px;
        top: 0px;
    }

    .frame-108563 {
        background: var(--teal-lvl-0, #f7ffff);
        border-radius: 35px;
        border-style: solid;
        border-color: var(--primary-teal, #008080);
        border-width: 1px;
        padding: 5px 15px 5px 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 35px;
        height: 34px;
        position: relative;
    }

    ._1 {
        color: var(--primary-teal, #008080);
        text-align: left;
        font-family: var(--web-bold-caption-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-caption-font-size, 14px);
        line-height: var(--web-bold-caption-line-height, 24px);
        font-weight: var(--web-bold-caption-font-weight, 700);
        position: relative;
    }

    .frame-108567 {
        display: flex;
        flex-direction: column;
        gap: 6px;
        align-items: center;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        position: relative;
    }

    .trip-details {
        color: var(--primary-light-black-text, #3B3939);
        text-align: center;
        font-family: var(--web-bold-tiny-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-tiny-font-size, 12px);
        font-weight: var(--web-bold-tiny-font-weight, 700);
        position: relative;
        align-self: stretch;
    }

    .in-progress {
        color: #3B3939;
        text-align: center;
        font-family: var(--web-medium-footnote-font-family,
                "Inter-Medium",
                sans-serif);
        font-size: 10px;
        font-weight: 500;
        position: relative;
        align-self: stretch;
    }

    .frame-108570 {
        display: flex;
        flex-direction: column;
        gap: 13px;
        align-items: center;
        justify-content: flex-start;
        width: 92px;
        position: absolute;
        left: 250.5px;
        top: 0px;
    }

    .frame-108564 {
        background: var(--surfaces-lvl-2, #eff2f4);
        border-radius: 35px;
        padding: 5px 15px 5px 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 35px;
        position: relative;
    }

    ._2 {
        color: var(--surfaces-lvl-5, #848a90);
        text-align: left;
        font-family: var(--web-bold-caption-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-caption-font-size, 14px);
        line-height: var(--web-bold-caption-line-height, 24px);
        font-weight: var(--web-bold-caption-font-weight, 700);
        position: relative;
    }

    .frame-108569 {
        display: flex;
        flex-direction: column;
        gap: 6px;
        align-items: center;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        position: relative;
    }

    .quotation {
        color: var(--surfaces-lvl-5, #848a90);
        text-align: center;
        font-family: var(--web-bold-tiny-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-tiny-font-size, 12px);
        font-weight: var(--web-bold-tiny-font-weight, 700);
        position: relative;
        align-self: stretch;
    }

    .pending {
        color: var(--surfaces-lvl-4, #848A90);
        text-align: center;
        font-family: var(--web-medium-footnote-font-family,
                "Inter-Medium",
                sans-serif);
        font-size: var(--web-medium-footnote-font-size, 10px);
        font-weight: var(--web-medium-footnote-font-weight, 500);
        position: relative;
        align-self: stretch;
    }

    .frame-108572 {
        display: flex;
        flex-direction: column;
        gap: 13px;
        align-items: center;
        justify-content: flex-start;
        width: 82px;
        position: absolute;
        left: 390.5px;
        top: 0px;
    }

    .frame-108565 {
        background: var(--surfaces-lvl-2, #eff2f4);
        border-radius: 35px;
        padding: 5px 15px 5px 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 35px;
        position: relative;
    }

    ._3 {
        color: var(--surfaces-lvl-5, #848a90);
        text-align: left;
        font-family: var(--web-bold-caption-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-caption-font-size, 14px);
        line-height: var(--web-bold-caption-line-height, 24px);
        font-weight: var(--web-bold-caption-font-weight, 700);
        position: relative;
    }

    .frame-108571 {
        display: flex;
        flex-direction: column;
        gap: 6px;
        align-items: center;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        position: relative;
    }

    .personal-data {
        color: var(--surfaces-lvl-5, #848a90);
        text-align: left;
        font-family: var(--web-bold-tiny-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-tiny-font-size, 12px);
        font-weight: var(--web-bold-tiny-font-weight, 700);
        position: relative;
        align-self: stretch;
    }

    .frame-108574 {
        display: flex;
        flex-direction: column;
        gap: 13px;
        align-items: center;
        justify-content: flex-start;
        width: 162px;
        position: absolute;
        left: 493.5px;
        top: 0px;
    }

    .frame-108566 {
        background: var(--surfaces-lvl-2, #eff2f4);
        border-radius: 35px;
        padding: 5px 15px 5px 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 35px;
        position: relative;
    }

    ._4 {
        color: var(--surfaces-lvl-5, #848a90);
        text-align: left;
        font-family: var(--web-bold-caption-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-caption-font-size, 14px);
        line-height: var(--web-bold-caption-line-height, 24px);
        font-weight: var(--web-bold-caption-font-weight, 700);
        position: relative;
    }

    .frame-108573 {
        display: flex;
        flex-direction: column;
        gap: 6px;
        align-items: center;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        position: relative;
    }

    .payment {
        color: var(--surfaces-lvl-5, #848a90);
        text-align: center;
        font-family: var(--web-bold-tiny-font-family, "Inter-Bold", sans-serif);
        font-size: var(--web-bold-tiny-font-size, 12px);
        font-weight: var(--web-bold-tiny-font-weight, 700);
        position: relative;
        align-self: stretch;
    }

    .p-label {
        margin: 0 !important;
        width: 300px;
        height: 12px;
        font-size: 10px;
        padding-left: 10px;
    }

    input {
        border: 0px !important;
        padding: 10px !important;
        border-bottom: 1px solid #006666 !important;
        border-radius: 1px !important;
        width: 300px;
        background: none !important;
    }

    select {
        appearance: none;
        -moz-appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708'/%3E%3C/svg%3E ") !important;
        background-repeat: no-repeat;
        background-position: right 1.5em top 50%, 0 0;
        background-size: 1em auto, 100%;
        margin-bottom: 1em;
        padding: .25em;
        border: 0;
        border-bottom: 1px solid #006666 !important;
        border-radius: 0;
        height: 45px;
        width: 300px;
    }

    textarea {
        border: 0px !important;
        border-bottom: 1px solid #848A90 !important;
        border-radius: 0px !important;
    }

    select>option>a:hover {
        background: #008080;
    }

    .dropdown-customize >button {
        border: 0px;
        border-radius: 0;
        color: #777;
        border-bottom: 1px solid #006666;
        width: 300px;
        font-size: inherit;
        text-align: left;
        padding-top: 15px;
        padding-left: 5px;
        padding-bottom: 10px;
        display: flex;
        justify-content: space-between;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .dropdown-customize > .dropdown-toggle::after {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708'/%3E%3C/svg%3E ") !important;
        border: 0 !important;
        vertical-align: 0 !important;
    }

    .open .dropdown-toggle::after {
        transform: rotate(180deg);
    }

    .dropdown-customize > .dropdown-menu {
        width: 300px !important;
        max-height: 305px;
        overflow-y: auto;
        overflow-x: hidden;
        margin-top: 5px !important;
        border-radius: 6px !important;
        z-index: 997 !important;
    }

    .dropdown-customize > .dropdown-menu > li > a {
        padding: 5px 20px !important;
        white-space: normal !important; 
    }

    .dropdown-customize > .dropdown-menu>li a:hover {
        background: #E0F5F5 !important;
    }

    .dropdown-select-active {
        background: #E0F5F5 !important;
    }

    .p-dropdown-select {
        width: 260px;
        overflow: hidden;
        white-space: nowrap;
        padding-left: 7px;
    }

    .addLinkAccessories {
        display: none;
    }


    .personal-div {
        background-color: #F7FCFF;
        padding: 30px 250px;
    }

    .car-information-div {
        background-color: #F7FCFF;
        height: 103px;
        padding: 35px 0px 0px 0px;
    }

    .car-information-input {
        padding: 50px 250px 0px 250px;
        background-color: #F7FCFF;
    }

    .personal-input-div {
        padding: 25px 250px 0px 250px;
        background-color: #F7FCFF;
    }

    .personal-input {
        width: 325px;
        height: 56px;
    }

    .car-input {
        width: 325px;
        height: 56px;
    }

    .car-cant {
        padding: 0px 250px 40px;
        background-color: #F7FCFF;
    }

    .value-div {
        height: 103px;
        padding: 35px 0px;
    }

    .value-input {
        height: 186px;
        padding: 0px 250px;
    }

    .standard-div {
        padding: 50px 0px 0px;
    }

    .standard-div-list {
        padding: 0px 500px;
    }

    .standard-alert {
        padding: 0px 480px;
    }

    .standard-alert-row {
        background: #E1F4E5;
        padding: 25px 0px;
    }

    .promo-alert-row {
        background: #EFF2F4;
        padding: 10px 0px;
    }

    .promo-alert-row-success {
        background: #f2f2f2;
        padding: 10px 0px;
    }

    .insurance-coverage {
        padding: 100px 0px 0px 0px;
    }

    .insurance-coverage-input {
        height: 156px;
        padding: 50px 250px;
        background-color: #F7FCFF;
    }

    .non-standard {
        padding: 100px 0px 0px 0px;
    }

    .non-standard-input {
        height: 156px;
        padding: 50px 250px;
        background-color: #F7FCFF;
    }

    .non-input {
        width: 325px;
        height: 56px;
    }

    .total-guard {
        background-color: #F7FCFF;
        height: 103px;
        padding: 35px 0px 0px 0px;
    }

    .total-guard-desc {
        height: 150px;
        padding: 0px 450px;
        background-color: #F7FCFF;
    }

    .total-guard-buttons {
        padding: 0px 250px 50px 250px;
        background-color: #F7FCFF;
    }

    .promo-code-buttons {
        padding: 0px 250px 50px 250px;
        background-color: #F7FCFF;
    }

    .btn-total-guard {
        border: none;
        padding: 15px 35px;
        border-radius: 50px;
    }

    .btn-total-guard:hover {
        background-color: #E4509A;
        color: #ffffff;
    }

    .btn-continue {
        padding: 10px 20px;
        background: #008080;
        color: white;
        border: none;
        border-radius: 4px;
        height: 48px;
    }

    .btn-continue:focus {
        background: #60B3B3;
    }

    /* 
    .btn-continue:hover:before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' viewBox='0 0 24 16'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;

    } */


    .btn-back {
        padding: 10px 20px;
        background: #F7FCFF;
        color: #008080;
        border: none;
        border-radius: 3px;
        text-decoration: none;
        height: 48px;
    }

    .btn-back:focus {
        background: #C0E6E6;
    }

    p {
        margin-bottom: 0;
    }

    .promo-code {
        width: 400px;
        height: 56px;
    }

    .promo-label {
        margin: 0 !important;
        width: 375px;
        height: 12px;
        font-size: 10px;
    }

    .promo-input {
        width: 375px;
    }

    .car-details {
        font-size: 20px;
        font-weight: 600;
        line-height: 30.26px;
        color: #2D2727;
    }

    .car-sub-details {
        font-size: 14px;
        font-weight: 500;
        line-height: 24px;
        text-align: left;
        color: #6A6F74;
    }

    .price-card {
        padding: 70px 450px 30px 450px;
    }

    #policyDate::-webkit-calendar-picker-indicator {
        color: rgba(0, 0, 0, 0);
        opacity: 1;
        display: block;
        background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar2-check-fill' viewBox='0 0 16 16'%3e%3cpath fill='%23309999' d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z'/%3e%3c/svg%3e") no-repeat;
        width: 15px;
        height: 15px;
        border-width: thin;
    }

    #policyDate::-webkit-calendar-picker-indicator {
        filter: invert(1) brightness(50%) sepia(100%) saturate(10000%) hue-rotate(180deg)
    }

    .itp-internatioal svg {
        fill: #ffffff !important;
    }

    .processing {
        border-color: var(--primary-teal, #008080);
    }

    .active-button-guard {
        background-color: #E4509A;
        color: #ffffff;
        margin: 0px 20px;
    }

    .inactive-button-guard {
        background-color: white;
        color: #E4509A;
        border: 1px solid #E4509A;
        margin: 0px 20px;
    }

    /* 
    #sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 99;
    } */

    .accessory-number {
        display: none;
    }

    .prev-add {
        display: none !important;
    }

    .modal .modal-content {
        margin: 0 auto;
        background-color: #FFFFFF;
        color: #000000;
    }

    .modal-dialog-centered {
        transform: translate(0, -50%);
        top: 10%;
        margin: 0 auto;
    }

    .form-check-input {
        width: 16px !important;
        height: 16px !important;
        border: 1.5px solid #B8B8B8 !important;
    }

    .form-check-input[type="checkbox"] {
        border-radius: 0.25em !important;
    }

    .disabled-button {
        background-color: #C0E6E6 !important;
    }

    #checkboxConfirmation:checked {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e") !important;
        background-color: #E4509A !important;
    }

    .header-div {
        background-image: url("{{asset('/images/compre-background.png')}}") !important;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        height: 175px;
    }

    .button-background {
        background: #F7FCFF !important;
        color: #1E1F21 !important;
    }

    textarea.form-control::placeholder {
        color: #848A90 !important;
    }

    a {
        text-decoration: none !important;
    }

    #sticky {
        top: 80px;
        position: sticky;
        height: 100%;
        z-index: 998;
    }

    .sticky {
        background-color: #008080 !important;
    }

    .scrolled {

        background: linear-gradient(90deg, rgba(205, 72, 139, 0.4) 0.4999999888241291%, rgba(205, 72, 139, 0) 44.49999928474426%), linear-gradient(90deg, rgba(0, 128, 128, 0.15) 54.00000214576721%, rgba(0, 128, 128, 0.3) 68.51787567138672%, rgba(0, 128, 128, 0.5) 87.1172308921814%), linear-gradient(to left, #008080, #008080) !important;
        transition: background-color 200ms linear;
    }

    .sticky-trip-details {
        color: #ffffff !important;
    }

    .sticky-trip-progress {
        color: #ffffff !important;
    }

    .sticky-trip-pending {
        color: #bbc1c7 !important;
    }

    .input-icons {
        width: 100%;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .input-icons i {
        position: absolute;
        color: #039855;
    }

    .input-field {
        width: 100%;
    }

    .input-field-padding {
        padding-left: 35px !important;
    }

    button[disabled] {
        background-color: #C0E6E6;
    }

    #continue[disabled] {
        background-color: #C0E6E6 !important;
    }

    .logo-modal {
        width: 350px;
    }

    .sub-text-confirmation {
        padding: 0px 50px;
    }

    .bottom-text-p {
        color: #585858; 
        font-size: 14px;
    }

    .btn:focus {
        box-shadow: none !important;
    }

    .dropdown-search {
        background-color: #F5F5F5 !important;
    }

    .dropdown-search:focus {
        background-color: #F7FFFF !important;
    }

    i:has(+ .dropdown-search:focus) {
        color: #008080 !important;
    }
    
    .dropdown-customize > .dropdown-toggle:has(+ ul.show)::after {
        transform: rotate(180deg);
        content: "";
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' fill='%23D7DEE3' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708'/%3E%3C/svg%3E ") !important;
    }

    .pending-mob {
        color: #848A90 !important;
    }

    .danger {
        background-color: #FFF7F7 !important;
        color: #DD0707 !important;
        border-bottom: 1px solid #DD0707 !important;
    }

    .danger::placeholder {
        color: #DD0707 !important;
        opacity: 1;
    }

    .danger-special {
        background-color: #FFF7F7 !important;
        color: #DD0707 !important;
        border-bottom: 1px solid #DD0707 !important;
    }

    .danger-special::placeholder {
        color: #DD0707 !important;
        opacity: 1;
    }

    .btn-continue:focus {
            background: #60B3B3 !important;
        }

    .btn-continue:focus:not([disabled])::before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16' %3E%3Cpath fill-rule='evenodd' fill='%23ffffff' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8'/%3E%3C/svg%3E") !important;
        height: 28px;
        float: left;
    }

    .btn-continue:hover:not([disabled])::before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16' %3E%3Cpath fill-rule='evenodd' fill='%23ffffff' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8'/%3E%3C/svg%3E") !important;
        height: 28px;
        float: left;
    }

    .btn-back:focus {
        background: #C0E6E6 !important;
    }

    .btn-back:focus:not([disabled])::before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-left-short' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5'/%3E%3C/svg%3E") !important;
        height: 28px;
        float: left;
    }

    .btn-back:hover:not([disabled])::before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-left-short' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5'/%3E%3C/svg%3E") !important;
        height: 28px;
        float: left;
    }

    .rotatable:hover:not([disabled])::before  {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-left-short' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5'/%3E%3C/svg%3E") !important;
        height: 28px;
        float: left;
    }

    .cancel-btn-hover:hover:not([disabled])::before {
        content: '' !important;
    }

    .turbo-shield-price {
        float: right;
        background: #C0E6E6;
        font-size: 12px;
        font-weight: 500;
        padding: 5px 15px;
        border-radius: 20px;
        color: #004D4D;
    }

    .turbo-shield-label {
        color: #E4509A; font-weight: 500;
    }

    .turbo-row {
        padding: 0px 30px;
    }

    @media (max-width: 991px) {

        #sticky {
            top: 65px !important;
        }

        .header-div {
            display: none;
        }

        .itp-internatioal {
            margin-left: 0 !important;
            position: static !important;
        }

        .frame-108774 {
            padding: 15px 0px !important;
            background-color: ;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .trip-details {
            font-size: 10px;
            color: #3B3939;
        }

        .in-progress {
            color: #3B3939;
        }

        .group-108428 {
            width: 0px;
            position: static;
        }

        .frame-108568 {
            width: 80px !important;
            left: 30px !important;
            top: 25px !important;
        }

        .frame-108570 {
            width: 80px !important;
            left: 125px !important;
            top: 25px !important;
        }

        .frame-108572 {
            width: 80px;
            left: 220px;
            top: 25px;
        }

        .frame-108574 {
            width: 80px;
            left: 310px;
            top: 25px;
        }

        .line-5 {
            width: 80px;
            left: 70px;
            top: 43px;
        }

        .line-6 {
            width: 80px;
            left: 165px;
            top: 43px;
        }

        .line-7 {
            width: 80px;
            left: 255px;
            top: 43px;
        }

        .row {
            --bs-gutter-x: 0 !important;
        }

        .page-title {
            font-size: 25px !important;
        }

        .div-title {
            font-size: 20px !important;
        }

        .div-sub-title {
            font-size: 18px !important;
        }

        .p-label {
            width: 325px !important;
        }

        input {
            width: 325px !important;
        }

        select {
            width: 325px !important;
        }

        .personal-div {
            padding: 35px 0px !important;
            margin-bottom: 0px !important;
        }

        .modal-pad {
            padding: 0 !important;
        }

        .car-information-div {
            background-color: #F7FCFF;
            height: 103px;
            padding: 35px 0px;
        }

        .car-information-input {
            padding: 10px 0 20px 0px !important;
        }

        .personal-input-div {
            padding: 0px 0px 20px 0px !important;
        }

        .identification-input-div {
            padding: 0px 0px 20px 0px !important;
        }

        .car-cant {
            padding: 0px !important;
        }

        .value-input {
            padding: 0px !important;
        }

        .standard-div {
            padding: 0px 0px 0px 0px !important;
        }

        .standard-div-list {
            padding: 0px 35px !important;
        }

        .standard-alert {
            padding: 0 !important;
        }

        .standard-alert-row {
            padding: 25px 25px !important;
        }

        .promo-alert-row {
            padding: 10px 25px !important;
        }

        .total-guard {
            background-color: #F7FCFF;
            height: 70px !important;
            padding: 35px 0px 0px 0px !important;
        }

        .total-guard-desc {
            padding: 50px 0px !important;
             height: 180px !important;
        }

        .total-guard-buttons {
            padding: 25px 0px !important;
        }

        .promo-code-buttons {
            padding: 25px 0px 50px 0px !important;
        }

        .btn-total-guard {
            padding: 12px 22px !important;
        }

        .insurance-coverage {
            padding: 80px 10px 0px 10px !important;
        }

        .insurance-coverage-input {
            padding: 50px 0px 160px 0px !important;
        }

        .non-standard {
            padding: 65px 10px 0px 10px !important;
        }

        .non-standard-input {
            padding: 50px 0px 200px 0px !important;
        }

        .non-input {
            width: 325px;
            height: 56px;
        }

        .promo-code {
            width: 325px !important;
        }

        .promo-label {
            width: 325px !important;
        }

        .price-card {
            padding: 0px 0px 50px 0px !important;
        }

        .customize-none {
            display: none;
        }

        .div-title>img {
            height: 24px !important;
        }

        .value-row {
            margin: 0 !important;
        }

        .total-guard-title {
            display: none;
        }

        .accessory-number {
            display: block !important;
        }

        .addButtonAccessories {
            display: none;
        }

        .addLinkAccessories {
            display: block !important;
        }

        .delete-lg {
            display: none !important;
        }

        .prem-price {
            text-align: center !important;
        }

        .dropdown-customize >button {
            width: 325px !important;
        }

        .car-details-summary {
            display: none !important;
        }

        .dropdown-customize > .dropdown-menu {
            width: 325px !important;
        }

        .dropdown.open > .dropdown-toggle:focus {
            background-color: #f0ffff;
        }

        .modal-dialog.modal-dialog-centered.modal-lg {
            width: 375px;
        }

        .modal-backdrop.in {
            opacity: .1;
        }

        .logo-modal {
            width: 200px !important;
        }

        .in-progress, .pending, .completed {
            display: none !important;
        }

        .dropdown-search {
            width: 285px !important;
        }

        .bottom-buttons > .bottom-buttons-continue {
            order: 1;
        }

        .bottom-buttons > .bottom-buttons-continue > button {
            padding: 10px 130px !important;
            font-weight: 500;
        }

        .bottom-buttons > .bottom-buttons-back {
            order: 2;
        }

        .bottom-buttons > .bottom-buttons-back > button {
            padding: 10px 145px !important;
            font-weight: 500;
        }

        #turboShieldModal > .modal-lg {
            width: 100% !important;
            top: 0;
        }

        .turbo-shield-label {
            font-size:15px !important;
        }

        .turbo-shield-price {
            font-size:11px !important;
        }

        #quotationRange {
            margin-left: 50px;
        }

        .turbo-row {
            padding: 0px !important;
        }
    }
</style>
<div class="container-fluid auto-excel-plus" style="margin: 0px; padding: 0px;">
    <!-- <div style="background-color: #008080; height: 146px; display: flex; justify-content: center; align-items: center;">
            <p>Get a Quote > Auto Excel Plus</p>
            <p class="auto-title">AUTO EXCEL PLUS</p>
        </div> -->

    <div class="col-12 text-center header-div">
        <div class="row">
            <div class="img-back">
                <div class="col-12 mt-5 mb-4">
                    <p class="mb-0" style="font-size: 15px; color:#ffffff;"><a href="{{url('/get-quote')}}"
                            style="color: #ffffff;">Get a
                            Quote</a>&nbsp;&nbsp; > &nbsp;&nbsp; Auto Excel Plus</p>
                </div>
                <div class="col-12">
                    <p class="page-title text-center">Auto Excel Plus</p>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky">

        <div class="col-12">
            <div class="frame-108774">
                <div class="itp-internatioal">
                    <div class="group-108428">
                        <div
                            class="line-5 {{request()->is('get-quote/auto-excel-plus/new') || request()->is('get-quote/auto-excel-plus/new/*') ? '' : 'done'}}">
                        </div>
                        <div
                            class="line-6 {{request()->is('get-quote/auto-excel-plus/personal-data') || request()->is('get-quote/auto-excel-plus/summary-auto-excel')  ? 'done' : ''}}">
                        </div>
                        <div
                            class="line-7 {{request()->is('get-quote/auto-excel-plus/summary-auto-excel') ? 'done' : ''}}">
                        </div>
                        <div id="progress_trip_details" class="frame-108568">
                            @if(request()->is('get-quote/auto-excel-plus/new') ||
                            request()->is('get-quote/auto-excel-plus/new/*'))
                            <div class="frame-108563">
                                <div class="_1">1</div>
                            </div>
                            <div class="frame-108567">
                                <div class="trip-details">Quote Request</div>
                                <div class="in-progress">In Progress</div>
                            </div>
                            @else
                            <div class="frame-108563" style="background-color: #09a12a;">
                                <div class="_1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                                        class="bi bi-check" viewBox="0 0 16 16">
                                        <path stroke="#ffffff"
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="frame-108567">
                                <div class="trip-details">Quote Request</div>
                                <div class="completed">Completed</div>
                            </div>
                            @endif

                        </div>
                        <div id="progress_quotation" class="frame-108570">
                            @if(request()->is('get-quote/auto-excel-plus/new') ||
                            request()->is('get-quote/auto-excel-plus/new/*'))
                            <div class="frame-108564">
                                <div class="_2">2</div>
                            </div>
                            <div class="frame-108569">
                                <div class="trip-details pending-mob">Car Information</div>
                                <div class="pending">Pending</div>
                            </div>
                            @elseif(request()->is('get-quote/auto-excel-plus/additional-car-information') ||
                            request()->is('get-quote/auto-excel-plus/car-information') ||
                            request()->is('get-quote/auto-excel-plus/plans'))
                            <div class="frame-108563">
                                <div class="_1">2</div>
                            </div>
                            <div class="frame-108569">
                                <div class="trip-details">Car Information</div>
                                <div class="in-progress">In Progress</div>
                            </div>
                            @else
                            <div class="frame-108563" style="background-color: #09a12a;">
                                <div class="_1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                                        class="bi bi-check" viewBox="0 0 16 16">
                                        <path stroke="#ffffff"
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="frame-108567">
                                <div class="trip-details">Car Information</div>
                                <div class="completed">Completed</div>
                            </div>
                            @endif
                        </div>
                        <div id="progress_personal" class="frame-108572">
                            @if(request()->is('get-quote/auto-excel-plus/new') ||
                            request()->is('get-quote/auto-excel-plus/new/*') ||
                            request()->is('get-quote/auto-excel-plus/additional-car-information') ||
                            request()->is('get-quote/auto-excel-plus/car-information') ||
                            request()->is('get-quote/auto-excel-plus/plans'))
                            <div class="frame-108565">
                                <div class="_3">3</div>
                            </div>
                            <div class="frame-108571">
                                <div class="trip-details pending-mob">Personal Data</div>
                                <div class="pending">Pending</div>
                            </div>
                            @elseif(request()->is('get-quote/auto-excel-plus/personal-data'))
                            <div class="frame-108563">
                                <div class="_1">3</div>
                            </div>
                            <div class="frame-108569">
                                <div class="trip-details">Personal Data</div>
                                <div class="in-progress">In Progress</div>
                            </div>
                            @else
                            <div class="frame-108563" style="background-color: #09a12a;">
                                <div class="_1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                                        class="bi bi-check" viewBox="0 0 16 16">
                                        <path stroke="#ffffff"
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="frame-108567">
                                <div class="trip-details">Personal Data</div>
                                <div class="completed">Completed</div>
                            </div>
                            @endif
                        </div>
                        <div id="progress_payment" class="frame-108574">
                            @if(request()->is('get-quote/auto-excel-plus/new') ||
                            request()->is('get-quote/auto-excel-plus/new/*') ||
                            request()->is('get-quote/auto-excel-plus/additional-car-information') ||
                            request()->is('get-quote/auto-excel-plus/car-information') ||
                            request()->is('get-quote/auto-excel-plus/plans') ||
                            request()->is('get-quote/auto-excel-plus/personal-data'))
                            <div class="frame-108566">
                                <div class="_4">4</div>
                            </div>
                            <div class="frame-108573">
                                <div class="trip-details pending-mob">Summary</div>
                                <div class="pending">Pending</div>
                            </div>
                            @else
                            <div class="frame-108563">
                                <div class="_1">4</div>
                            </div>
                            <div class="frame-108569">
                                <div class="trip-details">Summary</div>
                                <div class="in-progress">In Progress</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="privacyPolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <p class="mb-3" style="font-size: 27px; font-weight:700; color:#2D2727;">
                            Privacy Policy</p>
                    </div>
                    <div class="col-12">
                        <p class="mb-3" style="font-size: 18px; font-weight:600; color:#3B3939;"><b>Declaration and
                                Consent</b>
                        </p>
                        <p class="mb-2">I hereby apply for insurance as set out in the above application form and
                            declare, to the
                            best of my
                            knowledge and belief, that the foregoing statements and particulars are true and complete. I
                            hereby agree to
                            notify Cocogen of any material change in the information as stated above.</p>
                        <p class="mb-4">I hereby certify that I voluntarily and expressly consent to the collection,
                            processing,
                            sharing, storing
                            of my personal and/or sensitive information by Cocogen for the purpose/s necessary in
                            processing my
                            insurance policy and in any related transactions and/or in other purposes as stated in the
                            Data Privacy
                            Statement of Cocogen or in www.cocogen.com/data-privacy. I hereby certify that I carefully
                            understood the
                            terms above before giving my consent.</p>
                        <p class="mb-3" style="font-size: 18px; font-weight:600; color:#3B3939;"><b>Privacy Policy</b>
                        </p>
                        <p class="mb-2">We, Cocogen, upholds an individual’s data privacy rights and assures that all
                            your personal information,
                            sensitive personal information and privileged information (collectively, “Personal Data”),
                            collected and to
                            be collected, are processed in compliance to the Data Privacy Act of 2012 (RA No. 10173 and
                            its Implementing
                            Rules and Regulations (IRR).</p>
                        <p class="mb-4">This Privacy Policy provides information on how we collect, use, manage and
                            secure your personal
                            information necessary to serve you better. Any information you provide to us indicates your
                            express consent
                            to the content of our Privacy Policy.</p>
                        <p class="mb-3" style="font-size: 18px; font-weight:600; color:#3B3939;"><b>Collection of
                                Personal Data: We collect the
                                following personal data from you when you apply for our insurance products and services
                                such as your:</b>
                        </p>
                        <ul>
                            <li>Name, birth date, place of birth, sex, nationality;</li>
                            <li>Address (permanent and present addresses);</li>
                            <li>Contract number or information (email address, telephone number and mobile number);</li>
                            <li>PhilID or Government ID information (Passport, SSS or GSIS ID, driver’s license, postal
                                ID); and </li>
                            <li>Source of funds or property and occupation. </li>
                        </ul>
                        <p class="mb-2">When you provide information other than yours, you undertake that you properly
                            obtained their
                            consent. You
                            also certify that all personal data you submit is accurate, complete and up-to-date.</p>

                        <p class="mb-2">We may collect this information when you submit your application personally or
                            through our
                            distribution
                            partners, insurance agents and brokers or when you call us, visit our websites and social
                            media
                            advertisements, submit to us as part your application and claims requirements; and,
                            information that we
                            gather from third-parties such as but not limited to subsidiaries, reinsurers, business
                            partners.</p>

                        <p class="mb-2"><strong>Use</strong>: The collected personal data shall be used to process your
                            transactions
                            (e.g.
                            insurance quotations and applications, policy issuance, claims servicing, premium payments);
                            communicate and
                            respond to your request; send your statements billings and notices for your insurance
                            coverage; serve as a
                            reference for promotional information regarding our products; conduct surveys and inform
                            through phone,
                            mail, email, SMS or other communication facility in order to help us take better care of
                            your insurance
                            needs and allow us improve our products and services for you; comply with the directives
                            issued by
                            regulatory bodies; assist the Company in risk management, identity and claim verification
                            and prevent and
                            detect fraud; and, perform any other actions as may be necessary to implement the terms and
                            conditions of
                            our contract.</p>

                        <p class="mb-2">We may disclose and share your personal data to the following: </p>

                        <ul>
                            <li>Our employee handling your account and requests;</li>
                            <li>Our subsidiaries, affiliates and third-party service providers performing
                                financial,administrative
                                technical and other ancillary services;</li>
                            <li>Banks for bancassurance transactions, reinsurance partners and professional advisers
                                performing due
                                diligence checks;</li>
                            <li>Marketing intermediaries, agents, brokers and distributors;</li>
                            <li>Government institution and other competent authorities which by law, rules or
                                regulations requires us to
                                disclose.</li>
                            <li>Claim investigation companies, loss adjusters, assessors/claims investigators,
                                suppliers, repairers;
                            </li>
                            <li>Person or entity that we contractually entered with that ensures the confidentiality
                                standard we
                                implement and adhere to the DPA. </li>
                            <li>Any person that fall within matters of public concern, in order to carry out functions
                                of public
                                authority only to the extent of collection and further processing consistent with a
                                constitutionally or
                                statutorily mandated function pertaining to law enforcement, taxation and other
                                regulatory function.</li>
                        </ul>

                        <p class="mb-2">Thus, as a rule, Cocogen is not allowed to share your personal data to third
                            party. However,
                            by giving your
                            consent, you authorize Cocogen to disclose your personal data to the aforementioned
                            individuals and entities
                            that is necessary for the proper execution of processes related to the declared purposes in
                            this Privacy
                            Policy and Consent and may not use it for any other purpose.</p>

                        <p class="mb-2"><span class="text-color-primary"><strong>Protection Measures</strong> </span>:
                            To maintain
                            the integrity
                            and confidentiality of your personal data, we have implemented measures to secure and
                            protect it from theft,
                            loss, penetration or breach. We put in place organizational, physical and technical security
                            measures
                            necessary to protect your personal information. We will retain your personal data for as
                            long as necessary
                            to fulfill the purposes of your transactions with the Company, unless a longer period is
                            allowed or required
                            by law. After which physical records shall be disposed of through shredding while digital
                            files shall be
                            anonymized.</p>

                        <p class="mb-2"><span class="text-color-primary"><strong>Contact Us</strong> </span>: To
                            exercise your rights
                            under the DPA
                            which include right to erase, block, modify and object to processing your personal data or
                            should you have
                            any inquiries or concerns on this Privacy Policy and Consent and/or complaints, you may
                            contact our Data
                            Protection Officer at:</p>

                        <p class="mb-2">
                            <strong>Cocogen Data Protection Officer</strong><br>
                            <strong>Address</strong>: 22F One Corporate Center,<br>
                            Doña Julia Vargas Avenue corner <br>
                            Meralco Avenue, Ortigas Center, Pasig City <br>
                            <strong>E-mail</strong>: dpo@cocogen.com
                        </p>

                        <p class="mb-4">Kindly browse through our Privacy Policy at <a href="www.cocogen.com"
                                class="text-color-primary" target="_blank">www.cocogen.com</a> to know more on how we
                            protect your personal data.</p>

                        <p class="mb-3" style="font-size: 23px; color:#3B3939;"><b>Data Privacy Consent</b>

                            <p class="mb-2">I hereby certify that I explicitly and unambiguously consent to the
                                collection, processing,
                                sharing,
                                storing of my/our personal data by Cocogen for the purposes/s described in this Privacy
                                Policy. I hereby
                                certify that I carefully understood and comprehend the terms above before giving our
                                consent. I further
                                acknowledge that I have acquired the consent from all parties relevant to this consent
                                and
                                hold free and
                                harmless Cocogen from any complaint, suit or damages which any party may file or claim
                                in
                                relation to my
                                consent.</p>

                            <p class="mb-2"><strong>Important: Section 251 of the Insurance Code, as amended, imposes a
                                    fine not
                                    exceeding twice the
                                    amount claimed and/or imprisonment of 2 years, or both, at the discretion of the
                                    court,
                                    to any person who
                                    presents or causes to be presented any fraudulent claim for the payment of a loss
                                    under
                                    a contract of
                                    insurance, and who fraudulently prepares, makes or subscribes any writing with
                                    intent to
                                    present or use
                                    the same, or to allow it to be presented in support of any claim.</strong></p>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn-continue rotatable" data-dismiss="modal"> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <p class="mb-3" style="font-size: 27px; font-weight:700; color:#2D2727;">
                            Terms and Condition</p>
                    </div>
                    <div class="col-12">
                        <p>The Cocogen Insurance, Inc. website, e-mail newsletters, and mobile services, and any and all
                            materials
                            contained therein, are information services provided by Cocogen, the use of which shall be
                            subject to the
                            following terms and conditions.</p>
                        <p>By accessing the Cocogen information services and their content, you acknowledge and agree
                            that you have
                            read and understood the following terms and conditions and agree to be bound by them.</p>
                        <p class="mb-3">As used below, the terms “we”, “us”, and “our” refer to Cocogen.</p>
                        <ol>
                            <li class="mb-2"><strong>CONTENT</strong>
                                <p>Cocogen information services are available for information purposes only. The
                                    publication and posting
                                    of any content and access to any of the Cocogen information services do not
                                    constitute, either
                                    explicitly or implicitly, any provision of services or products by us. Information
                                    concerning Cocogen
                                    products or services is only available from the relevant Cocogen companies</p>
                            </li>
                            <li class="mb-2"><strong>NO OFFER</strong>
                                <p>No information contained in this website or in any of Cocogen information services
                                    should be construed
                                    as an offer or a solicitation for an offer, as a statement of law, or as counsel on
                                    investment, legal,
                                    tax, or other matters. In case of any ambiguity or doubts in the information in
                                    Cocogen’s website, you
                                    are advised to verify or check with us or seek appropriate professional or legal
                                    advice.</p>
                            </li>
                            <li class="mb-2"><strong>NO DUTY TO UPDATE</strong>
                                <p>We reserve the right to update, modify, revise and change all the contents of our
                                    website and other
                                    Cocogen information services. We are not obliged to notify you of any changes made
                                    on our Terms and
                                    Conditions. However, we will endeavor to regularly update the contents of the
                                    website and other Cocogen
                                    information services.</p>
                                <p>Your continuous access to website following any change in the website signifies that
                                    you agree to be
                                    bound by the Terms and Conditions, as revised.</p>
                            </li>
                            <li class="mb-2"><strong>COPYRIGHT AND TRADEMARKS</strong>
                                <p>All information, photographs, service marks, logos, artworks and all other contents
                                    of the website and
                                    other Cocogen information services are owned, controlled or licensed by or to
                                    Cocogen or its third party
                                    licensors, and are protected by intellectual property laws.</p>
                                <p>The limited use, copying and distribution without alteration of any of the materials
                                    and information
                                    contained in the Cocogen website and other Cocogen information services and the use
                                    of said materials
                                    and information shall be allowed for non-commercial purposes only: provided that all
                                    copyright and other
                                    proprietary notices shall appear in all copies of the materials and the information
                                    in the same manner
                                    as the original. The use of the materials for all other purposes is prohibited.</p>
                                <p>You shall not use any portion of this website, or any other intellectual property of
                                    Cocogen, including
                                    but not limited to its service marks, on any other website, in the source code of
                                    any other website, or
                                    in any other printed or electronic materials without the prior written consent of
                                    Cocogen. You shall not
                                    modify, publish, reproduce, republish, create derivative works, copy, upload, post,
                                    transmit,
                                    distribute, or otherwise use any of the Cocogen information services’ contents or
                                    frame the Cocogen
                                    website within any other website without prior written consent of Cocogen.
                                    Systematic retrieval of data
                                    from this website to create or compile, directly or indirectly, a collection,
                                    compilation, database or
                                    directory, without prior written consent from Cocogen, is prohibited. Linking from
                                    another website to
                                    any page in this website is strictly prohibited without prior written consent of
                                    Cocogen.</p>
                            </li>
                            <li class="mb-2"><strong>NO WARRANTY</strong>
                                <p>All contents on any and all Cocogen information services, including, but not limited
                                    to, graphics,
                                    text, and hyperlinks or references to other sites, are subject to change without
                                    prior notice and
                                    without warranty of any kind, express or implied, including, but not limited to,
                                    sustainability for a
                                    particular purpose, non-infringement and freedom of rights of third parties.</p>
                                <p>We do not guarantee the adequacy, accuracy, reliability or completeness of any
                                    information provided by
                                    the Cocogen information services and expressly disavow any liability for errors or
                                    omissions therein.
                                    The user is responsible for the assessment of the information’s adequacy, accuracy,
                                    reliability, and
                                    completeness.</p>
                                <p>We do not guarantee that the functions of the Cocogen information services will be
                                    uninterrupted and/or
                                    error-free, and that the defects and errors will be corrected or that the Cocogen
                                    information services
                                    or the servers that make them available are free from computer viruses or other
                                    harmful components.</p>
                                <p>Should your machine which includes but is not limited to your desktop, laptop, or
                                    smartphone, be
                                    infected by such viruses while using Cocogen information services, you shall assume
                                    the entire cost of
                                    all necessary servicing, repairs, or corrections.</p>
                            </li>
                            <li class="mb-2"><strong>HYPERLINKED AND REFERENCED WEBSITES</strong>
                                <p>Certain hyperlinks or referenced websites in the Cocogen information services may
                                    take you to
                                    third-party websites and we do not guarantee the adequacy, accuracy, reliability, or
                                    completeness of any
                                    information on hyperlinked or referenced websites. We disclaim any liability for any
                                    and all of the
                                    contents of said hyperlinked or reference websites.</p>
                                <p>The hyperlinks to other websites are offered for your convenience only. Their
                                    presence in our websit
                                    does not imply that we endorse such websites or that products or services that are
                                    described therein are
                                    our own. We likewise do not guarantee the correctness and accuracy of the
                                    information in said
                                    hyperlinked websites.</p>
                                <p>We remind you that different terms and conditions will apply for your use of such
                                    websites and that
                                    your access to third-party websites is entirely at your risk.</p>
                            </li>
                            <li class="mb-2"><strong>CONFIDENTIALITY OF INFORMATION</strong>
                                <p>By using the Cocogen information services, you agree, understand, and confirm that
                                    the any and all
                                    information, including your credit or debit card details, you provide to access
                                    Cocogen information
                                    services or to availing of our any of the services in said services are owned by you
                                    or that you have
                                    lawful authority to use said information.</p>
                                <p>We commit that we will not disclose, utilize, and share the said information to any
                                    third parties
                                    unless required by law, regulation or court order.</p>
                                <p>We, as a merchant, shall be under no liability whatsoever in respect of any loss or
                                    damage resulting
                                    directly or indirectly from the decline of authorization by the card issuer for any
                                    transaction on
                                    account of the cardholder having exceeded the limit mutually agreed by us with our
                                    acquiring bank from
                                    time to time.</p>
                            </li>
                            <li class="mb-2"><strong>REFUND AND CANCELLATIONS</strong>
                                <p>For concerns regarding refunds and cancellation of policies, please free to contact
                                    our Client Services
                                    Center via phone at 8830-6000 or via email at client_services@cocogen.com. Please be
                                    informed that
                                    cancellations will be subject to the specific terms and conditions of the policy
                                    sought to be canceled.
                                </p>
                            </li>
                            <li class="mb-2"><strong>LOCAL LEGAL RESTRICTIONS</strong>
                                <p>Any information appearing on this website is provided in accordance with and subject
                                    to the laws of the
                                    Republic of the Philippines.</p>
                                <p>Cocogen information services are not intended for any person in any jurisdiction
                                    where (by virtue of
                                    that person’s nationality, residence or otherwise) the publication or availability
                                    of Cocogen
                                    information services is prohibited. Persons to whom such prohibition applies may not
                                    access the Cocogen
                                    information services.</p>
                            </li>
                            <li class="mb-2"><strong>RESERVATION OF RIGHTS</strong>
                                <p>We reserve the right to change, modify, add to, or remove sections of these terms of
                                    use at any time.
                                </p>
                            </li>
                            <li class="mb-2">
                                <p><strong>GOVERNING LAW AND DISPUTE RESOLUTION</strong></p>
                                <p>You agree that all matters relating to your use and access of all Cocogen information
                                    services shall be
                                    governed by the laws of the Republic of the Philippines. Any dispute, controversy or
                                    claim arising out
                                    of or relating to this Terms and Conditions, or the breach, termination or
                                    invalidity thereof shall be
                                    settled by arbitration in accordance with the PDRCI Arbitration Rules as at present
                                    in force.</p>
                            </li>
                            <li class="mb-4">
                                <p><strong>ENTIRE AGREEMENT</strong></p>
                                <p>This Agreement constitutes the entire agreement between you and Cocogen with respect
                                    to your access
                                    and/or use of this website.</p>
                            </li>
                        </ol>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn-continue rotatable" data-dismiss="modal"> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exclusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <p class="mb-3" style="font-size: 27px; font-weight:700; color:#2D2727;">
                            Exclusions and Limitations</p>
                    </div>
                    <div class="col-12">
                        <ul>
                            <li class="mb-2">
                                <p>Only the vehicle owner and/or his duly authorized representative can
                                    register.</p>
                            </li>
                            <li class="mb-2">
                                <p>The vehicle being insured has not been involved in any vehicular accident and
                                    has not been
                                    flooded/damaged in any manner as of the time of the insurance of this
                                    policy.</p>
                            </li>
                            <li class="mb-2">
                                <p>Any damages prior to the issuance of this policy shall not be compensable. This
                                    declaration is
                                    under the penalty of perjury.</p>
                            </li>
                            <li class="mb-2">
                                <p>The vehicle for insurance cover is not used to carry fare-paying passengers
                                    (Grab or
                                    Rent-a-car).</p>
                            </li>
                            <li class="mb-2">
                                <p>If the vehicle is under financing with assumed balance, it cannot be covered
                                    due to no insurable
                                    interest.</p>
                            </li>
                            <li class="mb-2">
                                <p>All undeclared accessories are not covered under this policy.</p>
                            </li>
                            <li class="mb-2">
                                <p>The vehicle being insured is not under auto-renewal of insurance with the
                                    financing bank.
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>The vehicle being insured does not have an existing Direct Link or Cocogen
                                    Insurance
                                    policy.</p>
                            </li>
                            <li class="mb-2">
                                <p>All Mortgaged vehicles are required to purchase AON coverage.</p>
                            </li>
                            <li class="mb-2">
                                <p>Vehicle can only be used in the Republic of the Philippines.</p>
                            </li>
                            <li class="mb-2">
                                <p>Only authorized drivers can drive the vehicle.</p>
                            </li>
                            <li class="mb-2">
                                <p>There is no cover, whilst onboard a sea vessel on inter-island transit.
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn-continue rotatable" data-dismiss="modal"> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cantFind" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 modal-pad" style="padding: 30px 70px; font-family: 'Inter';">
                        <div class="row">
                            <div class="col-12 mb-4 text-center">
                                <img src="{{ URL::to('/') }}/images/COCOGEN LOGO.png" alt="" width="250">
                            </div>
                            <div class="col-12 mb-4 text-center">
                                <p class="cant-find-car-p">For
                                    further assistance, please fill up
                                    necessary information to get free Auto Excel Plus quotation.</p>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4"
                                            style="color: rgba(0, 51, 51, 1); font-weight: normal;font-size: 10px;background: #ffffff;width: 100%;height: 17px;margin-left: 0px;padding-left: 10px; margin: 0;">Full
                                            Name <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Full Name" id="nameCantFind" maxlength="50"
                                            style="background-color: #ffffff; width: 100%;">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputPassword4"
                                            style="color: rgba(0, 51, 51, 1); font-weight: normal;font-size: 10px;background: #ffffff;width: 100%;height: 17px;margin-left: 0px;padding-left: 10px; margin: 0;">Mobile/Email
                                            <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Your mobile or email" id="contactCantFind" maxlength="50"
                                            style="background-color: #ffffff; width: 100%;">
                                    </div>
                                    <div class="form-group col-lg-12 mb-4">
                                        <label for="inputAddress"
                                            style="color: rgba(0, 51, 51, 1); font-weight: normal;font-size: 10px;background: #ffffff;width: 100%;height: 17px;margin-left: 0px;padding-left: 10px; margin: 0;">Message
                                            <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="messageCantFind" rows="2" maxlength="100"
                                            placeholder="Type your message"
                                            style="background-color: #ffffff; box-shadow: none; resize: none;"></textarea>
                                        <p for="inputAddress"
                                            style="color: #BBC1C7; font-weight: normal;font-size: 10px;background: #ffffff;width: 100%;height: 17px;padding-left: 10px; padding-top: 10px;">
                                            <span id="charNum">0</span>/100 characters</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="row bottom-buttons">
                                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back">  
                                        <button class="btn-back cancel-btn-hover" href="javascript:void(0)" id="cancelFindMyCar" style="background-color: white;" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                    <div class="col-lg-6 mb-3 text-center text-lg-start bottom-buttons-continue">
                                        <button class="btn-continue" id="submitCantFind" disabled>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="turboShieldModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="width:65%;">
            <div class="modal-content" style="border-top: 5px solid #E4509A; border-radius: 15px;">
                <div class="modal-body">
                    <div class="col-12 modal-pad" style="padding: 30px 0px; font-family: 'Inter';">
                        <div class="row">
                            <div class="col-12 mb-4 text-center">
                                <p style="font-weight: 700; font-size: 23px; color: #2D2727;">Turbo Shield</p>
                                <p style="font-weight: 500; color: #585858;">Add protection for you and your car with TURBO SHIELD for as low as Php1,250</p>
                            </div>
                            <div class="col-12 mb-4 text-center">
                                <p style="font-weight: 700; font-size: 14px; color: #2D2727;">Benefits of getting Turbo Shield.</p>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-lg-6 turbo-row">
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px;">
                                            <div class="col-12">
                                                <p class="mb-2 turbo-shield-label">Road Rage Protection</p>
                                            </div>
                                            <div class="col-2">
                                                <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="65" height="69.6732" fill="url(#pattern0_7250_38841)"/>
                                                <defs>
                                                <pattern id="pattern0_7250_38841" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7250_38841" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7250_38841" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NDc6MDYrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NDc6MDYrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjY5YzRjOGM4LTE4NDItZTE0NS1iZmYxLTE3MDc4NDk5M2Q4NyIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjJjNzhjY2MwLTVlNmEtNzA0Yy04ZTFjLTcwNjc1YjUxNmUzMyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjI0NmY1OWM2LTU4YTEtZWY0My04YTM4LWU0NjM0NzIxOTYyZCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MjQ2ZjU5YzYtNThhMS1lZjQzLThhMzgtZTQ2MzQ3MjE5NjJkIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NjljNGM4YzgtMTg0Mi1lMTQ1LWJmZjEtMTcwNzg0OTkzZDg3IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ3OjA2KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+MDna9AAAVV1JREFUeJztnXeYXHd57z+zVatVLy6SXITljnvBNjYugG2K6ca+hAC5qaRCCBBSAIdcCCTcS0sgIXRCMRiDTTHBxsYUG2Nsy7g32ZIsS7IlraTV9t25f3zPm/M7Z8rOzM7OzJl9P88zz+7OzJ45M3PO97z9l8vn8ziO42SZjmbvgOM4zkxxIXMcJ/O4kDmOk3lc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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Upgrade your Auto Personal Accident protection to cover bodily 
                                                sustained from an unprovoked physical assault from unanticipated 
                                                road rage incidents.</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px; padding-top: 10px;">
                                            <div class="col-12">
                                                 <p class="mb-2 turbo-shield-label">Loss of Use <span class="turbo-shield-price">Maximum of 15 days</span> <span class="turbo-shield-price" style="margin-right: 10px;">₱500/day</span></p>
                                            </div>
                                            <div class="col-2">
                                                <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect y="0.163086" width="65" height="69.6732" fill="url(#pattern0_7250_38863)"/>
                                                    <defs>
                                                    <pattern id="pattern0_7250_38863" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                    <use xlink:href="#image0_7250_38863" transform="scale(0.00326797 0.00304878)"/>
                                                    </pattern>
                                                    <image id="image0_7250_38863" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NDc6MjYrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NDc6MjYrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOmQ3MTcyMzc1LTRmZTQtZWY0YS1iZDI0LTEwMjhkMTE0OTE2OCIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmY1OTMzMDU3LTU1MTgtYjg0OS1iODVjLWZmMDdiMmE3Yzg3ZiIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjA3MTIwZWIzLWFlY2UtODY0ZS1hYTZiLWY3ZWQ2M2VlNTI5MyI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MDcxMjBlYjMtYWVjZS04NjRlLWFhNmItZjdlZDYzZWU1MjkzIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZDcxNzIzNzUtNGZlNC1lZjRhLWJkMjQtMTAyOGQxMTQ5MTY4IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ3OjI2KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+m9YmQQAALVhJREFUeJztnXncpXP9/5/33LMvZsYwmGHsIQxCIsVYa8iSkEhIUVKkSPlmivJVhFLfUqJSpJJ9KcvY93Uk2zAMw2DMDGZf7t8fr3N+9+06n3Pu6zr755zX8/G4HjNznXNd53PPfc7rvD/vtYNJkzDGmJjp0+gFGGNMpVjIjDHRYyEzxkSPhcwYEz0WMmNM9FjI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"/>
                                                    </defs>
                                                    </svg>

                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Your transportation allowance while your vehicle is undergoing repairs
                                                at Gawa Agad, beginning the fourth day of repairs.</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px; padding-top: 10px;">
                                            <div class="col-12">
                                                 <p class="mb-2 turbo-shield-label">Lock Out Cover <span class="turbo-shield-price">₱10,000</span></p>
                                            </div>
                                            <div class="col-2">
                                            <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="65" height="69.6732" fill="url(#pattern0_7250_38882)"/>
                                                <defs>
                                                <pattern id="pattern0_7250_38882" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7250_38882" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7250_38882" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NDg6MDkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NDg6MDkrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjg5Y2NjYWRiLTUyNTEtMGU0Yi04YzJmLTBhNWJhMTE2ZjI1MyIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjU4OTRiYWU3LTFiZjctZjY0ZS1iYTI5LTE0MmY3MzZlZDQwYSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjA0ZWEzOGI2LTVhZGItNWE0MC05ZjQzLWY1YWM2ZjM5MzA5YiI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MDRlYTM4YjYtNWFkYi01YTQwLTlmNDMtZjVhYzZmMzkzMDliIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ODljY2NhZGItNTI1MS0wZTRiLThjMmYtMGE1YmExMTZmMjUzIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ4OjA5KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+hr60hgAAMPFJREFUeJztnXe4XFXZvu9QExEI0oKBECABA4iKiCKfEqQrIB3BxoefqCAS0IBSgwKiUgIqirSIFOlg+4l0FAKIkJCANDVUaUJCCyUJvz+eGXNymL3W2nv2lH3mua9rrpOcvWbvfc6ZeWatd73v8w5iwgSMMabKLNTpGzDGmGaxkBljKo+FzBhTeSxkxpjKYyEz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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Your coverage for necessary locksmith costs incurred to open your
                                                car in the event you were unintetionally locked out of your vehicle
                                                with the keys inside.</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px; padding-top: 10px;">
                                            <div class="col-12">
                                                <p class="mb-2 turbo-shield-label">Key Replacement Cover <span class="turbo-shield-price">₱10,000</span></p>
                                            </div>
                                            <div class="col-2">
                                               <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="65" height="69.6732" fill="url(#pattern0_7258_42522)"/>
                                                <defs>
                                                <pattern id="pattern0_7258_42522" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7258_42522" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7258_42522" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NDg6MjkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NDg6MjkrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOmMwMzlmZWE0LWQyOGUtMDc0NC05OTY4LTNlOGQyOTRlM2E1OSIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjMzNjAxOWUzLTRhMTMtOGU0NC1iNjVmLTY1YjllZWEwYjM2NyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOmYwMTY2MDMzLWQ5OTgtYjM0MC1hZGQwLWU5ZjE5ZmRiZTI1MCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZjAxNjYwMzMtZDk5OC1iMzQwLWFkZDAtZTlmMTlmZGJlMjUwIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6YzAzOWZlYTQtZDI4ZS0wNzQ0LTk5NjgtM2U4ZDI5NGUzYTU5IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ4OjI5KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+eKgZcwAAG8xJREFUeJzt3XeYJVWdh/F3GAYk7QIqOoI4GBEEQRQVJaokSWLWXQyoKIiiIMvqqmOWoCCjBNEFjBgAQYKCKKugIigmRAWRMJIEZAgyzDDT+8fv9tM9462qGyrcc+v9PM99Rm5VV51ub3/71IkzmDsXSUrZCk0XQJKGZZBJSp5BJil5Bpmk5BlkkpJnkElKnkEm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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Your coverage for the cost to replace the key or device used to access and lock your vehicle should it be lost, stolen from your vehicle or damaged in an accident.</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px; padding-top: 10px;">
                                            <div class="col-12">
                                                <p class="mb-2 turbo-shield-label">Online Shopping Protection <span class="turbo-shield-price">₱50,000</span></p>
                                            </div>
                                            <div class="col-2">
                                                <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="65" height="69.6732" fill="url(#pattern0_7250_38915)"/>
                                                <defs>
                                                <pattern id="pattern0_7250_38915" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7250_38915" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7250_38915" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NTE6NDArMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NTE6NDArMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOmQ5Njk5ZjNlLWUzZDYtMjA0ZS1iYmVhLWMzMTg4YmRkYzIwYSIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmJiZTY0ZjUyLTRkZjItNmM0ZS04MGExLTJhMmZjMjQ1OGJjYyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjY3NDI5Y2E0LWFhMzMtNDQ0YS1hODM3LTA2YzQ5YjFhYmUwYiI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6Njc0MjljYTQtYWEzMy00NDRhLWE4MzctMDZjNDliMWFiZTBiIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZDk2OTlmM2UtZTNkNi0yMDRlLWJiZWEtYzMxODhiZGRjMjBhIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjUxOjQwKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+8owa6QAAFgVJREFUeJzt3Xv8Z1O9x/HXYIxLk0sXzRgiNKpxKSopd7pJKLrS5XR6kEEnpYTOaXoQoRQpnNIj0eOEnFPSMTKEkUKSO6kz1DR0YgiNGXM5f6yvY+i31/e29157fffr+Xh8Hz36rf3d+/P7fuf3ttdee609jhkzkKScrZC6AEkalkEmKXsGmaTsGWSSsmeQScqe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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Your reimbursement for your financial loss from items bought online that have never been delivered, ensuring you can shop with confidence.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 turbo-row">
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px;">
                                            <div class="col-12">
                                                <p class="mb-2 turbo-shield-label">Misfuelling Cover <span class="turbo-shield-price">₱5,000</span></p>
                                            </div>
                                            <div class="col-2">
                                                <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="65" height="69.6732" fill="url(#pattern0_7250_38850)"/>
                                                <defs>
                                                <pattern id="pattern0_7250_38850" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7250_38850" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7250_38850" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NDk6MDQrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NDk6MDQrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOmRhZTYzYTJjLTRhMDktMmU0MS04MGJkLWZjNmRlNDI3ZGNlNiIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmVlNzM1Nzc1LTQ1ZjYtODY0Ny05ZTk3LTU5ZmI0M2M3YWNmNCIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjAzNDkwYzZkLWY5OTYtNjQ0Ny1hMzllLWE1OTQ1OWI3OGZiOCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MDM0OTBjNmQtZjk5Ni02NDQ3LWEzOWUtYTU5NDU5Yjc4ZmI4IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZGFlNjNhMmMtNGEwOS0yZTQxLTgwYmQtZmM2ZGU0MjdkY2U2IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ5OjA0KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+wSEw5wAAKDJJREFUeJzt3Xe8HUX5x/FPgISa0HsLhg6BEJCOEEJHimChd5QuiAULEoroT34I+rMACiJFivQivUpHIRAJYAgJvfeaQMLvj+dcb3LZmZ09W87Onu/79bov9MyePZPk3ufOzjzzTD9GjUJEJGYzdLoDIiJ5KZCJSPQUyEQkegpkIhI9BTIRiZ4CmYhET4FMRKKn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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Your reimbursement for expenses due to inadvertent loading 
                                                of incorrect fuel to your vehicle such as costs to drain and 
                                                clean the gas tank or costs to fix any subsequent damages 
                                                to your vehicle.</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px; padding-top: 10px;">
                                            <div class="col-12">
                                                <p class="mb-2 turbo-shield-label">Safe Driver Bonus <span class="turbo-shield-price">5% Rebate</span></p>
                                            </div>
                                            <div class="col-2">
                                                <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="65" height="69.6732" fill="url(#pattern0_7250_38872)"/>
                                                <defs>
                                                <pattern id="pattern0_7250_38872" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7250_38872" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7250_38872" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NDk6NTArMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NDk6NTArMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjViNjJjYmRhLTE5MjMtMjM0OS04M2FlLTQyMTNiOGNjOTJhNCIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmE5ZTFjM2RiLWVlMmEtNGM0OC05ZjQxLTQ5ZjZjMDZjNzlhNSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjcxOWJhODFkLWY5NDItNzA0Mi04ZWRiLThiNzM5MWJiOGFkMiI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NzE5YmE4MWQtZjk0Mi03MDQyLThlZGItOGI3MzkxYmI4YWQyIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NWI2MmNiZGEtMTkyMy0yMzQ5LTgzYWUtNDIxM2I4Y2M5MmE0IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ5OjUwKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+UP53mwAAH8pJREFUeJzt3XecXFXdx/HPbjrpJCEJAQklIFVqAEFABJEi2CgiNhC78qjYRQ2CID5iQQFFRX0eEVCwgAooVgzFGAFpoYVQQk8D0rY9f3xnniyTc2d37ty5c8/M9/16zQteM5vZm83ud88593d+p4M5czAzi1lnsy/AzKxeDjIzi56DzMyi5yAzs+g5yMwseg4y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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Enjoy a  premium rebate on your insurance policy if you make
                                                it through the policy period without a claim, as a thank you
                                                from us for your commitment to safety on the road.</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px; padding-top: 10px;">
                                             <div class="col-12">
                                                <p class="mb-2 turbo-shield-label">Waiver of Depreciation for Windshield and Window Glass</p>
                                            </div>
                                            <div class="col-2">
                                               <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="65" height="69.6732" fill="url(#pattern0_7250_38889)"/>
                                                <defs>
                                                <pattern id="pattern0_7250_38889" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7250_38889" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7250_38889" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NTA6MjArMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NTA6MjArMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjhkN2MxM2NiLTQwNjEtMTk0Yy04Y2JmLTE3NjI2YTdkMWVkYiIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjAwM2Q2NTQ2LWFiZjgtZDM0My1iNzZkLTZlNmY3YWNiNWM2MiIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjFkMTFkYmEwLTRkMTktNzM0NS05ODk5LWI0N2QyY2U5ZjE3NSI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MWQxMWRiYTAtNGQxOS03MzQ1LTk4OTktYjQ3ZDJjZTlmMTc1IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6OGQ3YzEzY2ItNDA2MS0xOTRjLThjYmYtMTc2MjZhN2QxZWRiIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjUwOjIwKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+q0kRPQAAPl9JREFUeJztnXeYXOV5t+/ZvqveK6AukCgSvSOawWAbjHuJE8d24nzuTnGSL58dYjt23B3HLXELjk3cDQFjwBSBQGDAVIEKAiSKUO/a1bb5/vidN+c9Z2Z2p5wtZ89zX9dciNnZOWdm5/zm6U+Oq6/GMAwjzdQN9QkYhmHUigmZYRipx4TMMIzUY0JmGEbqMSEz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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">Damages to the windshield. window glass, back glass,
                                                side view mirrors including sunroof shall not be subject
                                                to depreciation.</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="border-bottom: 1px solid #D7DEE3; padding-bottom: 10px; padding-top: 10px;">
                                             <div class="col-12">
                                                <p class="mb-2 turbo-shield-label">Extended Casa Repair Clause</p>
                                            </div>
                                            <div class="col-2">
                                                <svg width="65" height="70" viewBox="0 0 65 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect y="0.163086" width="65" height="69.6732" fill="url(#pattern0_7250_38906)"/>
                                                <defs>
                                                <pattern id="pattern0_7250_38906" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_7250_38906" transform="scale(0.00326797 0.00304878)"/>
                                                </pattern>
                                                <image id="image0_7250_38906" width="306" height="328" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATIAAAFICAYAAADTf3JiAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGMWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgOS4xLWMwMDIgNzkuYjdjNjRjYywgMjAyNC8wNy8xNi0wNzo1OTo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI2LjEgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyNC0xMi0wOVQxNTo0NDowNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjQtMTItMDlUMTU6NTA6NTMrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjQtMTItMDlUMTU6NTA6NTMrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjU1MjBkNTExLTU0YzEtMmI0Mi1iOTU2LTRkNDk1MmNhZjYwNyIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmE3NGZhNDU0LTA5MTMtM2U0OS05NDE2LWQxY2I1NGFmNzFkYiIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOmIxODJlZTVmLWQ1OGYtOWY0OC1hZGE0LTZiYjhhMmIwN2MzYSI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6YjE4MmVlNWYtZDU4Zi05ZjQ4LWFkYTQtNmJiOGEyYjA3YzNhIiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjQ0OjA1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NTUyMGQ1MTEtNTRjMS0yYjQyLWI5NTYtNGQ0OTUyY2FmNjA3IiBzdEV2dDp3aGVuPSIyMDI0LTEyLTA5VDE1OjUwOjUzKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjYuMSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+e5GpGAAAH6tJREFUeJzt3Xe8HFXdx/HPzYUQCBBIqCFA6Cj9CTxUQZrSQgnSpCgoHWmCgtQgqIg0kSYKoagU4UGaIkiTEGoA6Z0ECC0kAUIgCUmeP357Xzdc95yZ2Z12Zr7v12tfSXZmZ0727v3uzKkdDB+OiEjIehVdABGRdinIRCR4CjIRCZ6CTESCpyATkeApyEQkeAoy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"/>
                                                </defs>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <p style="color: #3B3939; font-size:14px; font-weight: 500;">In the event of a claim, Casa/Dealer repair will be allowed for vehicles below twelve (12) years old.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="row bottom-buttons">
                                    <div class="col-lg-12 mb-3 text-center bottom-buttons-back">  
                                        <button class="btn-back rotatable" href="javascript:void(0)" id="cancelFindMyCar" style="background-color: white;" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('compre-section')
</div>

<script>
    $(document).ready(function () {

        $(document).click(function(e) {
            let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
            if (!isMobile) {
                $('.dropdown').not($('.dropdown').has($(e.target))).children('.dropdown-menu').removeClass('show');
            }
        });

        $(document).on('keyup', '.dropdown-search', function(){
            var input, filter, ul, li, a, i;
            filter = $(this).val().toUpperCase();
            div = $(this).closest('.dropdown-menu');
            a = div.find("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        });

        $(document).on('click', '.dropdown-toggle', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass("open");
            $(this).siblings('.dropdown-menu').toggleClass("show");
            $(this).siblings('.dropdown-menu').find('.dropdown-search').val('').trigger('keyup');
        });

        $(document).on('click', '.dropdown-select', function(e) {
             e.preventDefault();
            $(this).closest('.dropdown-menu').removeClass('show');
            $(this).closest('.dropdown').find('a').removeClass('dropdown-select-active');
            $(this).closest('.dropdown').find('input').val($(this).text()).trigger('change');
            $(this).closest('.dropdown').find('button > p').text($(this).text());
            $(this).addClass('dropdown-select-active');
            $(this).closest('.dropdown').find('button').addClass('button-background');
        });

        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,3})?$/;
            return emailReg.test($email);
        }

        $("#turboShield").click(function (e) {
            e.preventDefault();
            jQuery('#turboShieldModal').modal('show');
        });

        $("#cantFindModal").click(function (e) {
            e.preventDefault();
            jQuery('#cantFind').modal('show');
            $('#nameCantFind').val('');
            $('#contactCantFind').val('');
            $('#messageCantFind').val('');
        });

        $(".btn-back").on({
            mouseenter: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'border': '1px solid #008080'
                });
            },
            mouseleave: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'border': 'none'
                });
            },
            mousedown: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'border': 'none',
                    'background': '#C0E6E6'
                });
            },
            mouseup: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'border': 'none',
                    'background': 'none'
                });
            },
        });

        $(".view").on({
            mouseenter: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'border': '1px solid #008080',
                    'padding': '10px 20px'
                });
            },
            mouseleave: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'border': 'none',
                    'padding': '0'
                });
            },
            mousedown: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'border': 'none',
                    'background': '#C0E6E6',
                    'padding': '10px 20px'
                });
            },
            mouseup: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'border': 'none',
                    'padding': '0',
                    'background': 'none'
                });
            },
        });

        $(".select-coverage").on({
            mouseenter: function () {
                $(this).children('a').children('svg').attr("class", "").removeClass('d-none');
            },
            mouseleave: function () {
                $(this).children('a').children('svg').attr("class", "d-none");
                $(this).css({
                    'border': 'none',
                });
            },
            mousedown: function () {
                $(this).children('a').children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'border': 'none',
                    'border-bottom-left-radius': '5px',
                    'border-bottom-right-radius': '5px'
                });
            }
        });

        $("input[type='number']").on('keypress', function (e) {
            return e.metaKey || // cmd/ctrl
                e.which <= 0 || // arrow keys
                e.which == 8 || // delete key
                /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        });

        $("#withAON, #withoutAON").on({
            mouseenter: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
            },
            mouseleave: function () {
                $(this).children('svg').attr("class", "d-none");
            }
        });

        $(".btn-continue").on({
            mouseenter: function () {
                if ($(this).is(':disabled')) {

                } else {
                    $(this).children('svg').attr("class", "").removeClass('d-none');
                }
            },
            mouseleave: function () {
                $('.btn-continue > svg').attr("class", "d-none");
            },
            mousedown: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'background': '#60B3B3'
                });
            },
            mouseup: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'background': '#008080'
                });
            },
        });

        $("#nameCantFind").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        $("#contactCantFind").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z0-9@_.\s]/gi, "");
        });

        $("#messageCantFind").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z0-9,.\s]/gi, "");
        });

        $("#messageCantFind").keyup(function () {
            var len = $(this).val();
            $('#charNum').text(len.length);
        });

        $("#submitCantFind").click(function (e) {
            e.preventDefault();
            var nameCantFind = $('#nameCantFind').val();
            var contactCantFind = $('#contactCantFind').val();
            var messageCantFind = $('#messageCantFind').val();
            $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "{{ url('/get-quote/auto-excel-plus/cant-find') }}",
                    data: {'_token': '{{ csrf_token() }}', 'nameCantFind': nameCantFind, 'contactCantFind': contactCantFind, 'messageCantFind': messageCantFind},
                    success: function (data) {
                        window.location.href = "{{ url('/get-quote/ecommerce/cant-find-car')}}"
                    }
                });
        });

        $("#firstName").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        $("#lastName").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        $("input").change(function () {
            $(this).removeClass('danger');
            $(this).css({
                'background': '#F7FCFF'
            });

            // $(this).prev().closest('p').css({
            //     'background': '#F7FCFF',
            //     'color': ''
            // });

            $(this).siblings('button').removeClass('danger');
            // $(this).closest('.dropdown').siblings('p').css({
            //     'background': '#F7FCFF',
            //     'color': '',
            // });

            $("#continue").attr("disabled", false);
        });

        $("select").change(function () {
            $(this).removeClass('danger');
            $(this).css({
                'background-color': '#F7FCFF'
            });

            $(this).prev().closest('p').css({
                'background': '#F7FCFF'
            });
        });

        $("#emailAddress").change(function () {
            var email = $("#emailAddress").val();
            if (!validateEmail(email)) {
                $("#emailAddress").addClass('danger');
            }
        });

        $("#cancelConfirmation").on({
            mouseenter: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'border': '1px solid #008080',
                    'background': '#ffffff'
                });
            },
            mouseleave: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'border': 'none',
                    'background': '#ffffff'
                });
            },
            mousedown: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'border': 'none',
                    'background': '#C0E6E6'
                });
            },
            mouseup: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'border': 'none',
                    'background': '#ffffff'
                });
            }
        });

        $("#nameCantFind").change(function () {
            var nameCantFind = $("#nameCantFind").val();
            var contactCantFind = $("#contactCantFind").val();
            var messageCantFind = $("#messageCantFind").val();

            if (nameCantFind !== '' && contactCantFind !== '' && messageCantFind !== '') {
                if(contactCantFind.substr(0, 2) === '09') {
                    $("#contactCantFind").attr('maxlength', '11');

                    if(contactCantFind.length === 11 ) {
                        $("#contactCantFind").removeClass('danger');
                        $("#submitCantFind").prop("disabled", false);
                    } else {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    }
                } else {
                    $("#contactCantFind").attr('maxlength', '50');
                    if (!validateEmail(contactCantFind)) {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    } else {
                        $("#submitCantFind").prop("disabled", false);
                    }
                }
            } else {
                $("#submitCantFind").prop("disabled", true);
            }
        });

        $("#messageCantFind").change(function () {
            var nameCantFind = $("#nameCantFind").val();
            var contactCantFind = $("#contactCantFind").val();
            var messageCantFind = $("#messageCantFind").val();

            if (nameCantFind !== '' && contactCantFind !== '' && messageCantFind !== '') {
                if(contactCantFind.substr(0, 2) === '09') {
                    $("#contactCantFind").attr('maxlength', '11');

                    if(contactCantFind.length === 11 ) {
                        $("#contactCantFind").removeClass('danger');
                        $("#submitCantFind").prop("disabled", false);
                    } else {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    }
                } else {
                    $("#contactCantFind").attr('maxlength', '50');
                    if (!validateEmail(contactCantFind)) {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    } else {
                        $("#submitCantFind").prop("disabled", false);
                    }
                }
            } else {
                $("#submitCantFind").prop("disabled", true);
            }
        });

        $("#contactCantFind").keyup(function () {
            var nameCantFind = $("#nameCantFind").val();
            var contactCantFind = $("#contactCantFind").val();
            var messageCantFind = $("#messageCantFind").val();

            if(contactCantFind.substr(0, 2) === '09') {
                    $("#contactCantFind").attr('maxlength', '11');

                    if(contactCantFind.length === 11 ) {
                        $("#contactCantFind").removeClass('danger');
                    } else {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    }
                } else {
                    $("#contactCantFind").attr('maxlength', '50');
                    if (!validateEmail(contactCantFind)) {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    } else {
                    }
                }

            if (nameCantFind !== '' && contactCantFind !== '' && messageCantFind !== '') {
                if(contactCantFind.substr(0, 2) === '09') {
                    $("#contactCantFind").attr('maxlength', '11');

                    if(contactCantFind.length === 11 ) {
                        $("#contactCantFind").removeClass('danger');
                        $("#submitCantFind").prop("disabled", false);
                    } else {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    }
                } else {
                    $("#contactCantFind").attr('maxlength', '50');
                    if (!validateEmail(contactCantFind)) {
                        $("#contactCantFind").addClass('danger');
                        $("#submitCantFind").prop("disabled", true);
                    } else {
                        $("#submitCantFind").prop("disabled", false);
                    }
                }
            } else {
                $("#submitCantFind").prop("disabled", true);
            }
        });

    });

    $(document).scroll(function () {
        var $nav = $(".frame-108774");
        $nav.toggleClass('sticky scrolled', $(this).scrollTop() > $nav.height());
        $nav.find('.trip-details').toggleClass('sticky-trip-details', $(this).scrollTop() > $nav.height());
        $nav.find('.in-progress').toggleClass('sticky-trip-progress', $(this).scrollTop() > $nav.height());
        $nav.find('.pending').toggleClass('sticky-trip-pending', $(this).scrollTop() > $nav.height());
    });
    
</script>
@endsection