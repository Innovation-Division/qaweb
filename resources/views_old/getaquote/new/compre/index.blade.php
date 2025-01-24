@extends('layouts.layout1')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
<style>
    p, input, div, button, a {
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
        z-index: 998 !important;
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
        padding: 35px 0px;
    }

    .car-information-input {
        padding: 50px 250px;
        background-color: #F7FCFF;
    }

    .personal-input-div {
        padding: 50px 250px;
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
        padding: 35px 0px;
    }

    .total-guard-desc {
        height: 156px;
        padding: 50px 250px;
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
        padding: 7px 20px;
        background: #008080;
        color: white;
        border: none;
        border-radius: 3px;
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
        padding: 7px 20px;
        background: #F7FCFF;
        color: #008080;
        border: none;
        border-radius: 3px;
        text-decoration: none;
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
        top: 20%;
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
        z-index: 999;
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
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16' %3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8'/%3E%3C/svg%3E") !important;
        height: 28px;
        float: left;
    }

    .btn-back:hover:not([disabled])::before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16' %3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8'/%3E%3C/svg%3E") !important;
        height: 28px;
        float: left;
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
            padding: 160px 10px 0px 10px !important;
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
                        <button type="button" class="btn-continue" data-dismiss="modal"> Close</button>
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
                        <button type="button" class="btn-continue" data-dismiss="modal"> Close</button>
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
                        <button type="button" class="btn-continue" data-dismiss="modal"> Close</button>
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
                                    <button class="btn-back" href="javascript:void(0)" id="cancelFindMyCar" style="background-color: white;" data-dismiss="modal">
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

        $(".view, .getPlan").on({
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

        $("#withAON").on({
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

        // $(".dropdown-toggle").click(function (e) {
        //     e.preventDefault();
        //     $(this).parent().toggleClass("open");
        //     $(this).siblings('.dropdown-menu').toggleClass("show");
        //     $(this).siblings('.dropdown-menu').find('.dropdown-search').val('').trigger('keyup');
        // });

        // $(".dropdown-search").on( "keyup", function() {
        //     var input, filter, ul, li, a, i;
        //     filter = $(this).val().toUpperCase();
        //     div = $(this).closest('.dropdown-menu');
        //     a = div.find("a");
        //     for (i = 0; i < a.length; i++) {
        //         txtValue = a[i].textContent || a[i].innerText;
        //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //             a[i].style.display = "";
        //         } else {
        //             a[i].style.display = "none";
        //         }
        //     }
       
        // });

        // $(".dropdown-search").keyup(function () {
        //     var input, filter, ul, li, a, i;
        //     filter = $(this).val().toUpperCase();
        //     div = $(this).closest('.dropdown-menu');
        //     a = div.find("a");
        //     for (i = 0; i < a.length; i++) {
        //         txtValue = a[i].textContent || a[i].innerText;
        //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //             a[i].style.display = "";
        //         } else {
        //             a[i].style.display = "none";
        //         }
        //     }
        // });

        // $('.dropdown-select').click(function (e) {
        //     e.preventDefault();
        //     $(this).closest('.dropdown-menu').removeClass('show');
        //     $(this).closest('.dropdown').find('a').removeClass('dropdown-select-active');
        //     $(this).closest('.dropdown').find('input').val($(this).text()).trigger('change');
        //     $(this).closest('.dropdown').find('button > p').text($(this).text());
        //     $(this).addClass('dropdown-select-active');
        //     $(this).closest('.dropdown').find('button').addClass('button-background');
        //     $(this).closest('.dropdown').siblings('.p-label').css({
        //         'background': '#F7FCFF'
        //     });
        // });

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