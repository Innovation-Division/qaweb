<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/domestic.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/itpradio.css') }}" media="all">
<script src="{{ asset('/js/domestic.js') }}"></script>

<style type="text/css">
    .nav-pills .nav-link.active,
    .nav-pills .show .nav-link {
        color: #008080 !important;
        background-color: #ffffff !important;
    }

    .main-content>.inner {
        padding-top: 40px !important;
    }

    ul {
        padding-left: 0rem !important;
    }

    p {
        color: grey;
    }

    #heading {
        text-transform: uppercase;
        color: #008080;
        font-weight: normal;
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    .form-card {
        text-align: left;
    }

    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    /*Next Buttons*/
    #msform .action-button {
        width: 100px;
        background: #008080;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right;
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #008080;
    }

    /*Previous Buttons*/
    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right;
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000;
    }

    /*The background card*/
    .card {
        z-index: 0;
        border: none;
        position: relative;
    }

    /*FieldSet headings*/
    .fs-title {
        font-size: 25px;
        color: #008080;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left;
    }

    .purple-text {
        color: #008080;
        font-weight: normal;
    }

    /*Step Count*/
    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right;
    }

    /*Field names*/
    .fieldlabels {
        color: gray;
        text-align: left;
    }

    /*Icon progressbar*/
    #progressbar {
        margin-bottom: 25px;
        overflow: hidden;
        color: lightgrey;
    }

    #progressbar .active {
        color: #008080;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400;
    }

    /*Icons in the ProgressBar*/
    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e";
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007";
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f030";
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c";
    }

    /*Icon ProgressBar before any progress*/
    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px;
    }

    /*ProgressBar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1;
    }

    /*Color number of the step and the connector before it*/
    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #008080;
    }

    /*Animated Progress Bar*/
    .progress {
        height: 20px;
    }

    .progress-bar {
        background-color: #008080;
    }

    /*Fit image in bootstrap div*/
    .fit-image {
        width: 100%;
        object-fit: cover;
    }


    .viewQuote {
        border-radius: 5px !important;
        padding: 12px 100px 12px 100px;
        font-size: 22px;
    }


    .upload {
        border-radius: 5px !important;
        font-size: 22px;
        background: #008080;
        margin-top: 30px;
        width: 100%;
        padding-bottom: 15px;
        padding-top: 15px;
    }

    .via {
        border-radius: 5px !important;
        padding: 50px 140px 50px 140px;
        font-size: 25px;
        background-color: #e8e8e8;
        font-weight: bolder !important;
    }

    .via-non {
        border-radius: 5px !important;
        padding: 50px 120px 50px 120px;
        font-size: 25px;
        background-color: #e8e8e8;
        font-weight: bold !important;
    }



    .via-air {
        text-align: right;
    }




    /* .table-bordered th {
        border: 1px solid white;
        border: 1px 0px !important;
    /* } */

    .table-bordered>tbody>tr>td {
        border: 1px solid #008080;
    }

    .progress-bar.progress-bar-striped.progress-bar-animated {
        border-radius: 5px;
    }

    .corner {
        border-radius: 5px !important;
    }

    label.btn.via {
        color: black;
        font-weight: bold !important;
        font-size: 24px;
    }

    label.btn.via-non {
        color: black;
        font-weight: bold !important;
        font-size: 24px;
    }

    label.btn.via.active {
        color: white;
        font-weight: bold !important;
        font-size: 24px;
        background: #008080;
    }

    label.btn.via-non.active {
        color: white;
        font-weight: bold !important;
        font-size: 24px;
        background: #008080;
    }

    label.btn.via.btn-secondary:hover {
        background: powderblue;
        border: 0;
        border: 1px solid powderblue !important;
    }

    label.btn.via-non.btn-secondary:hover {
        background: powderblue;
        border: 1px solid powderblue !important;
    }

    table {
        border-collapse: separate !important;
        border-spacing: 0;
    }

    .table-bordered {
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 1px 1px #ccc;
        -moz-box-shadow: 0 1px 1px #ccc;
        box-shadow: 0 1px 1px #ccc;
    }

    .table-bordered th {
        font-size: 20px;
        padding: 25px 30px !important;
    }

    .table-bordered td {
        /* border-left: 1px solid #ccc;
    border-top: 1px solid #ccc; */
        padding: 25px 5px !important;
        text-align: center;
        font-size: 20px;
        font-weight: 700;
    }

    .table-bordered th:first-child {
        -moz-border-radius: 6px 0 0 0;
        -webkit-border-radius: 6px 0 0 0;
        border-radius: 6px 0 0 0;
    }

    .table-bordered th:last-child {
        -moz-border-radius: 0 6px 0 0;
        -webkit-border-radius: 0 6px 0 0;
        border-radius: 0 6px 0 0;
    }

    .table-bordered th:only-child {
        -moz-border-radius: 6px 6px 0 0;
        -webkit-border-radius: 6px 6px 0 0;
        border-radius: 6px 6px 0 0;
    }

    .table-bordered tr:last-child td:first-child {
        -moz-border-radius: 0 0 0 6px;
        -webkit-border-radius: 0 0 0 6px;
        border-radius: 0 0 0 6px;
    }

    .table-bordered tr:last-child td:last-child {
        -moz-border-radius: 0 0 6px 0;
        -webkit-border-radius: 0 0 6px 0;
        border-radius: 0 0 6px 0;
    }

    .checkbox-step2 {
        border-radius: 2px !important;
    }

    .step1-coverage .form-check .form-check-input {
        margin: 5px 5px 5px 5px;
        border-radius: 3px;
        /* margin-left: -40px; */
    }

    .step1-promo .form-check .form-check-input {
        margin: 5px 5px 5px 5px;
        border: 2px solid #008080;
        border-radius: 3px;
        /* margin-left: -40px; */
    }

    .step1-promo .form-check-input {
        width: 17px;
        height: 17px;
    }

    .agree .form-check .form-check-input {
        margin: 5px 5px 5px 5px;
        border: 2px solid #008080;
        border-radius: 3px;
        /* margin-left: -40px; */
    }

    .agree .form-check-input {
        width: 17px;
        height: 17px;
    }

    .form-check {
        margin-bottom: 0;
    }

    .form-check-input:checked {
        background-color: #008080;
    }

    .collapsible-link {
        width: 100%;
        position: relative;
        text-align: left;
    }

    .collapsible-link::before {
        content: '\f107';
        position: absolute;
        top: 50%;
        right: 0.8rem;
        transform: translateY(-50%);
        display: block;
        font-family: 'FontAwesome';
        font-size: 1.1rem;
    }

    .collapsible-link[aria-expanded='true']::before {
        content: '\f106';
    }

    .progress {
        height: 11px;
        background-color: #F1F1F1;
        box-shadow: none;
    }

    .progress-bar {
        background: #008080;
    }

    .total-prem {
        background-color: #db3e8d;
        color: white;
        border-radius: 5px;
        font-weight: 700;
        font-size: 21px;
        margin: 0px 10px 0 10px;
        padding: 16px;
        width: 98.5% !important;
    }

    .total-prem-step-2 {
        background-color: #db3e8d;
        color: white;
        border-radius: 5px;
        font-weight: 700;
        font-size: 21px;
        margin: 0px 10px 0 16px;
        padding: 16px;
        width: 97.5% !important;
    }

    .subjectivities>p {
        font-weight: 700 !important;
        color: black !important;
        font-size: 14px;
        font-style: italic;
        margin: 0px 0px 2px 0px !important;
    }

    .subjectivities>ul {
        font-weight: 400 !important;
        padding: 0px 15px !important;
        font-size: 14px;
        font-style: italic;
        color: black !important;
    }

    .subjectivities>ul>li {
        margin-bottom: 2px !important;
    }

    .agree {
        padding: 5px !important;
    }

    .agree>.form-check {
        padding: 1px !important;
        margin-bottom: 2px !important;
        font-size: 15px !important;
    }

    .step1-coverage>.card-header {
        background-color: white;
        padding: 0px;
    }

    .step1-coverage>.card-header a {
        color: #008080 !important;
        font-weight: 700;
        text-decoration: none;
        padding: 10px;
        font-size: 32px;
    }

    .step2 {
        padding: 0px 100px !important;
    }

    .step2-mid {
        padding: 15px 15px !important;
        margin-left: 31px;
    }

    #collapse:after {

        content: ' ';
        width: 17em;
        border: 2px solid #008080;
        position: absolute;
        top: 42%;
        left: 40%;
    }

    .collapsible-link::before {
        content: '\f107';
        position: absolute;
        top: 42%;
        right: 0.8rem;
        transform: translateY(-50%);
        display: block;
        font-family: 'FontAwesome';
        font-size: 2.5rem;
    }

    .step1-coverage .form-check {
        padding-left: 0px !important;

    }

    .step1-coverage .card-body {
        padding: 0 !important;
    }

    .step1-coverage .form-check-input {
        margin-top: 7px;
        padding: 15px;
        border: 4px solid #008080;
    }

    .step1-promo label {
        font-size: 20px;
        font-weight: 700;
    }

    .mode>p {
        font-weight: 700;
        font-size: 32px;
        color: #008080;
    }

    .promo>p {
        color: black;
        padding: 0px !important;
        margin: 0px !important;
        font-style: italic;
        font-size: 18px;
    }

    [type="radio"]:checked+label:before,
    [type="radio"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: -2px;
        top: -2px;
        width: 22px;
        height: 21px;
        /* border: 1px solid #008080; */
        border-radius: 20%;
        background: #fff;
    }

    [type="radio"]:checked+label:after {
        content: '\2713' !important;
        color: #008080;
    }

    [type="radio"]:checked+label:after,
    [type="radio"]:not(:checked)+label:after {

        background: white !important;
        top: 0px;
        left: 2px;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>thead>tr>td {
        border-bottom-width: 0px;
    }


    .add-button {
        background-color: #db3e8d !important;
        border-radius: 10px;
        padding: 8px 30px;
    }

    .col-btn {
        margin-top: 35px !important;
    }

    #hardware-body {
        padding: 10px !important;
        font-size: 20px !important;
        background-color: #008080 !important;
        padding: 35px 100px !important;
    }

    .delete-row {
        margin-top: 37px !important;
    }

    .delete-row-col {
        justify-content: center !important;
    }

    .selectb5.bootstrap-select .dropdown-toggle:after {
        color: #db3e8d !important;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" fill="%23db3e8d"><path fill="%23db3e8d" d="M180-80q-24 0-42-18t-18-42v-620q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600v-430H180v430Zm0-490h600v-130H180v130Zm0 0v-130 130Zm300 230q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/></svg>');
        height: 26px;
        width: 26px;
    }

    .previous {
        font-weight: 700;
        color: #008080;
        font-size: 17px;
    }

    .previous-div {
        margin-bottom: 15px !important;
    }

    .promo {
        margin-bottom: 50px !important;
    }

    .personal-info {
        margin-top: 45px;
        margin-bottom: 0px;
        color: black;
        font-size: 14px;
        font-style: italic;
    }

    .transpo-info {
        color: black;
        font-style: italic;
        font-size: 14px;
        margin-top: 7px;
    }

    .date-range-feed {
        font-size: 16px !important;
    }

    

    @media (min-width: 319px) and (max-width: 480px) {

        .table-responsive > .table > tbody > tr > td {
            white-space: unset;
        }

        .modeOfTransportation-feed {
            font-size: 12px;
        }

        .transpo-info {
            color: black;
            font-style: italic;
            font-size: 9px;
            margin-top: 7px;
        }

        .viewQuote {
            border-radius: 5px !important;
            padding: 12px 115px 12px 115px;
            font-size: 18px;
        }

        .delete-row-col {
            margin-top: -25px;
            margin-left: 25px;
            margin-bottom: 20px;
        }

        .add-row-col {
            margin-top: 10px !important;
        }

        .add-button {
            background-color: #db3e8d !important;
            border-radius: 10px;
            padding: 5px 20px;
        }

        .delete-row {
            height: 45px !important;
        }

        .delete-row-col svg {
            width: 18px !important;
        }

        [type="radio"]:checked+label:before,
        [type="radio"]:not(:checked)+label:before {
            content: '';
            position: absolute;
            left: -2px;
            top: -2px;
            width: 22px;
            height: 21px;
            /* border: 1px solid #008080; */
            border-radius: 20%;
            background: #fff;
        }

        [type="radio"]:checked+label:after,
        [type="radio"]:not(:checked)+label:after {

            background: white !important;
            top: 0px;
            left: 4px;
        }

        .mode>p {
            font-size: 20px !important;
        }

        #hardware-body {
            padding: 10px !important;
            font-size: 14px !important;
        }

        .total-prem-step-2 {
            background-color: #db3e8d;
            color: white;
            border-radius: 5px;
            font-weight: 700;
            font-size: 14px;
            margin: 0px 10px 0 10px;
            padding: 16px;
            width: 92.5% !important;
        }

        .total-prem {
            background-color: #db3e8d;
            color: white;
            border-radius: 5px;
            font-weight: 700;
            font-size: 14px;
            margin: 0px 10px 0 10px;
            padding: 16px;
            width: 92.5% !important;
        }

        input.form-control {
            height: 40px !important;
        }

        .via {
            border-radius: 5px !important;
            padding: 20px 35px 20px 35px;
            font-size: 17px !important;
        }

        .via-non {
            border-radius: 5px !important;
            padding: 20px 25px 20px 25px;
            font-size: 17px !important;
        }

        .via-air {
            text-align: left;
        }

        .step1 {
            width: 330px !important;
        }

        .step1>.table-responsive>table>thead>tr>th {
            font-size: 15px !important;
        }

        .step1>.table-responsive>table>tbody>tr>td {
            font-size: 10px !important;
        }

        .step1 .table-bordered td {
            padding: 10px !important;
        }

        .table-responsive>.table-bordered>thead>tr>td,
        .table-responsive>.table-bordered>tbody>tr>td {
            border: 1px solid #008080 !important;
        }

        .step1-coverage {
            width: 330px !important;
            margin-bottom: 5px !important;
        }

        .step1-coverage table>thead>tr>th {
            font-size: 15px !important;
        }

        .step1-coverage table>tbody>tr>td {
            font-size: 10px !important;
        }

        .step1-coverage td {
            padding: 10px !important;
        }

        .table-bordered th {
            padding: 20px 25px !important;
            border: 1px solid white;
        }

        .step1-coverage>.card-header>p>a {
            color: #008080 !important;
        }

        .step1-promo {
            width: 330px !important;
            font-size: 12px !important;
        }

        .step1-promo .form-check .form-check-input {
            margin: 1px 5px 5px 0px;
        }


        .step1-coverage .form-check {
            padding-left: 0px !important;

        }

        .step1-coverage .card-body {
            padding: 0 !important;
        }

        .step1-coverage .form-check-input {
            margin-top: 7px;
            padding: 8px;
            border: 2px solid #008080;
        }

        #collapse:after {
            border: 0px solid #008080;
        }


        .step1-coverage>.card-header a {
            color: #008080 !important;
            font-weight: 700;
            text-decoration: none;
            padding: 6px;
            font-size: 20px;
        }

        .collapsible-link::before {
            top: 45%;
            font-size: 2rem;
        }


        .step2 {
            padding: 0px 0px !important;
        }

        .step2 table>thead>tr>th {
            font-size: 13px !important;
        }

        .step2 table>tbody>tr>td {
            font-size: 12px !important;
        }

        .step2 table>tbody>tr>td>div {
            padding: 5px 5px !important;
        }

        #msform {
            margin-top: 0px !important;
        }

        #msform>#progressbar {
            margin-bottom: 10px !important;
        }

        #msform>.progress {
            margin-bottom: 5px !important;
        }

        #msform>#progressbar>li {
            font-size: 12px !important;
        }

        .step2-mid {
            margin-left: 0px;
        }

        .step4 table>thead>tr>th {
            font-size: 13px !important;
        }

        .step4 table>tbody>tr>td {
            font-size: 12px !important;
        }

        .step4 table>tbody>tr>td>div {
            padding: 5px 5px !important;
        }

        .agree>.form-check>label {
            font-size: 14px !important;
        }

        .container {
            padding-left: 0px;
            padding-right: 0px;
        }

        .step1-promo label {
            font-size: 12px;
            font-weight: 700;
        }

        .promo>p {
            font-size: 12px;
        }
    }



    @media (min-width: 481px) and (max-width: 650px) {

        .table-responsive > .table > tbody > tr > td {
            white-space: unset;
        }

        .viewQuote {
            border-radius: 5px !important;
            padding: 12px 115px 12px 115px;
            font-size: 18px;
        }

        #hardware-body {
            padding: 10px !important;
            font-size: 20px !important;
            background-color: #008080 !important;
            padding: 35px 35px !important;
            text-align: left;
        }

        .delete-row-col {
            margin-top: -26px !important;
            margin-left: 19px;
            margin-bottom: 40px;
        }

        .add-row-col {
            margin-top: 10px !important;
        }

        .add-button {
            padding: 8px 21px !important;
        }

        .delete-row {
            padding: 15px !important;
        }

        .table-responsive>.table-bordered>thead>tr>td,
        .table-responsive>.table-bordered>tbody>tr>td {
            border: 1px solid #008080 !important;
        }

        .step1>.table-responsive>table>thead>tr>th {
            font-size: 15px !important;
        }

        .step1>.table-responsive>table>tbody>tr>td {
            font-size: 12px !important;
        }

        .via {
            border-radius: 5px !important;
            padding: 20px 40px 20px 40px;
        }

        label.btn.via {
            color: black;
            font-weight: bold !important;
            font-size: 20px;
        }

        .via-non {
            border-radius: 5px !important;
            padding: 20px 35px 20px 35px;
        }

        label.btn.via-non {
            color: black;
            font-weight: bold !important;
            font-size: 20px;
        }

        .mode>p {
            font-size: 29px;
        }

        .step1 {
            width: 100% !important;
        }

        #msform>#progressbar {
            margin-bottom: 10px !important;
        }

        #msform>.progress {
            margin-bottom: 5px !important;
        }

        #msform>#progressbar>li {
            font-size: 18px !important;
            font-weight: 700 !important;
        }

        .total-prem-step-2 {
            background-color: #db3e8d;
            color: white;
            border-radius: 5px;
            font-weight: 700;
            font-size: 14px;
            margin: 0px 11px 0 13px;
            padding: 16px;
            width: 93.5% !important;
        }

        .total-prem {
            background-color: #db3e8d;
            color: white;
            border-radius: 5px;
            font-weight: 700;
            font-size: 14px;
            margin: 0px 10px 0 10px;
            padding: 16px;
            width: 92.5% !important;
        }

        .via-air {
            text-align: left;
        }

        .step1-coverage {
            width: 100% !important;
        }

        .step1-coverage table>thead>tr>th {
            font-size: 15px !important;
        }

        .step1-coverage table>tbody>tr>td {
            font-size: 10px !important;
        }

        .step1-coverage td {
            padding: 10px !important;
        }

        .step1-coverage>.card-header>p>a {
            color: #008080 !important;
        }

        .step1-coverage .form-check {
            padding-left: 0px !important;

        }

        .step1-coverage .card-body {
            padding: 0 !important;
        }

        .step1-coverage .form-check-input {
            margin-top: 7px;
            padding: 8px;
            border: 2px solid #008080;
        }

        #collapse:after {
            border: 0px solid #008080;
        }


        .step1-coverage>.card-header a {
            color: #008080 !important;
            font-weight: 700;
            text-decoration: none;
            padding: 6px;
            font-size: 20px;
        }

        .collapsible-link::before {
            top: 45%;
            font-size: 2rem;
        }

        .step1-promo {
            width: 100% !important;
        }

        .step1-promo label {
            font-size: 13px;
            font-weight: 700;
        }

        .step1 {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .step1-coverage {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .step1-promo {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .step2 {
            padding: 0px 0px !important;
        }

        .step2 table>thead>tr>th {
            font-size: 18px !important;
        }

        .step2 table>tbody>tr>td {
            font-size: 15px !important;
        }

        .step2 table>tbody>tr>td>div {
            padding: 5px 5px !important;
        }

        .step2-mid {
            margin-left: 0px;
        }

        .step4 table>thead>tr>th {
            font-size: 13px !important;
        }

        .step4 table>tbody>tr>td {
            font-size: 12px !important;
        }

        .step4 table>tbody>tr>td>div {
            padding: 5px 5px !important;
        }

        .agree>.form-check>label {
            font-size: 14px !important;
        }

        .promo>p {
            font-size: 15px !important;
        }
    }

    @media (min-width: 651px) and (max-width: 991px) {

        .step2 {
            padding: 0 !important;
        }

        .total-prem-step-2 {
            background-color: #db3e8d;
            color: white;
            border-radius: 5px;
            font-weight: 700;
            font-size: 19px;
            margin: 0px 11px 0 13px;
            padding: 16px;
            width: 95.5% !important;
        }

        #progressbar li {
            font-size: 23px !important;
            font-weight: 700 !important;
        }

        .promo>p {
            font-size: 18px !important;
        }
    }
</style>

<input type="hidden" name="url" name="url" value="{{url('/')}}">

<div class="container-fluid">
    <div class="row justify-content-center">

        <form id="msform" method="post" action="{{ route('domesticinsurancesave') }}" enctype="multipart/form-data">
            <input type="hidden" name="utm_source" id="utm_source" value="{{$utm_source}}">
			<input type="hidden" name="utm_medium" id='utm_medium' value="{{$utm_medium}}">

            {{ csrf_field() }}

            @include('getaquote.domestic.modal')
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active" style="font-weight: 700; font-size: 26px;">Trip Details</li>
                <li style="font-weight: 700; font-size: 26px;">Summary</li>
                <li style="font-weight: 700; font-size: 26px;">Personal Information</li>
                <li style="font-weight: 700; font-size: 26px;">Final Quotation</li>
            </ul>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <br>
            <!-- fieldsets -->
            <fieldset>

                <div class="form-card">
                    @include('getaquote.domestic.newstep1')
                </div>
                <button id="next_2ndpage" name="next_2ndpage" type="button"
                    class="action viewQuote next_2ndpage btn btn-secondary form-control_ next">View Quote</button>
            </fieldset>
            <fieldset>
                <div class="col-12 text-left previous-div">
                    <a href="javascript:void(0)" class="previous">
                        < Back</a> </div> <div class="form-card">
                            @include('getaquote.domestic.newstep2')
                </div>
                <button id="next_2ndpage" name="next_2ndpage" type="button"
                    class="action viewQuote next_2ndpage btn btn-secondary form-control_ next">Proceed</button>
            </fieldset>
            <fieldset>
                <div class="col-12 text-left previous-div">
                    <a href="javascript:void(0)" class="previous">
                        < Back</a> </div> <div class="form-card">
                            @include('getaquote.domestic.newstep3')
                </div>
                <button id="next_2ndpage" name="next_2ndpage" type="button"
                    class="action viewQuote next_2ndpage btn btn-secondary form-control_ next">Next</button>
            </fieldset>
            <fieldset>
                <div class="col-12 text-left previous-div">
                    <a href="javascript:void(0)" class="previous">
                        < Back</a> </div> <div class="form-card">
                            @include('getaquote.domestic.newstep4')
                </div>
                <button id="btnsubmit" name="next_2ndpage" type="button"
                    class="action viewQuote next_2ndpage btn btn-secondary form-control_ next btnsubmit">Pay
                    Now</button>
            </fieldset>
        </form>
    </div>
</div>
<script src="{{ asset('/js/domestic_step_other.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
@include('getaquote.domestic.otherline')
<script>
    $(document).ready(function () {

        function ReplaceNumberWithCommas(yourNumber) {
            var n= yourNumber.toString().split(".");
            n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return n.join(".");
        }

        function containsNumbers(str) {
            return /\d/.test(str);
        }

        $("#email").keyup(function(){
            $("input[name='email']").removeClass("is-invalid");
        });

        $("#fileinput").change(function(){
            $("input[name='upload']").removeClass("is-invalid");
            $("#upload_file").css({
                'border' : 'none'
            });
        });


        $("#destination_itinerary").change(function(){
            $(".validation_destination").remove();
            $('#destination_itinerary').closest('.form-group').removeClass('has-error');
            $('.destination-feed').remove();
            $(".destination-feed").addClass("d-none");
        });

        $("#departure_date_itinerary").change(function(){
            $("#departure_date_itinerary").removeClass("is-invalid");
        });

        $("#return_date_itinerary").change(function(){
            $("#return_date_itinerary").removeClass("is-invalid");
        });

        jQuery("input[name='privacy']").change(function () {

            var privacy = $("input[name='privacy']:checked").val();
            var terms = $("input[name='terms']:checked").val();
            var exclusions = $("input[name='exclusions']:checked").val();

            if (privacy === 'agree' && terms === 'agree' && exclusions === 'agree') {
                $("#terms").addClass("d-none");
            } 
           
        });

        jQuery("input[name='terms']").change(function () {

            var privacy = $("input[name='privacy']:checked").val();
            var terms = $("input[name='terms']:checked").val();
            var exclusions = $("input[name='exclusions']:checked").val();

            if (privacy === 'agree' && terms === 'agree' && exclusions === 'agree') {
                $("#terms").addClass("d-none");
            } 

        });

        jQuery("input[name='exclusions']").change(function () {

            var privacy = $("input[name='privacy']:checked").val();
            var terms = $("input[name='terms']:checked").val();
            var exclusions = $("input[name='exclusions']:checked").val();

            if (privacy === 'agree' && terms === 'agree' && exclusions === 'agree') {
                $("#terms").addClass("d-none");
            } 

        });

        jQuery("input[name='modeOfTransportation']").change(function () {
            $(".via").css({
                'border' : 'none'
            });

            $(".via-non").css({
                'border' : 'none'
            });

            $(".modeOfTransportation-feed").addClass("d-none");
        });

        jQuery("input[name='coverage']").change(function () {
            $("input[name='coverage']").removeClass("is-invalid");
        });


        $("#salutation").change(function(){
            $(".validation_salutation").remove();
            $('#salutation').closest('.form-group').removeClass('has-error');
            $('.salutation-feed').remove();
        });

        $("#first_name").keyup(function(){
            $("input[name='first_name']").removeClass("is-invalid");
        });

        $("#middle_name").keyup(function(){
            $("input[name='middle_name']").removeClass("is-invalid");
        });

        $("#last_name").keyup(function(){
            $("input[name='last_name']").removeClass("is-invalid");
        });

        $("#residence_address").keyup(function(){
            $("input[name='residence_address']").removeClass("is-invalid");
        });

        $("#residence_province").change(function(){
            $(".validation_residence_province").remove();
            $('#residence_province').closest('.form-group').removeClass('has-error');
            $('.province-feed').remove();
        });

        $("#residence_municipality").change(function(){
            $(".validation_residence_municipality").remove();
            $('#residence_municipality').closest('.form-group').removeClass('has-error');
            $('.municipality-feed').remove();
        });

        $("#residence_barangay").change(function(){
            $(".validation_residence_barangay").remove();
            $('#residence_barangay').closest('.form-group').removeClass('has-error');
            $('.barangay-feed').remove();
        });

        $("#sex").change(function(){
            $(".validation_sex").remove();
            $('#sex').closest('.form-group').removeClass('has-error');
            $('.sex-feed').remove();
        });

        $("#id_type").change(function(){
            $(".validation_id").remove();
            $('#id_type').closest('.form-group').removeClass('has-error');
            $('.id-feed').remove();
        });

        $("input[name='emergency_contact_name']").keyup(function(){
            $("input[name='emergency_contact_name']").removeClass("is-invalid");
        });

        $("input[name='emergency_contact_no']").keyup(function(){
            $("input[name='emergency_contact_no']").removeClass("is-invalid");
        });

        $("input[name='emergency_contact_relationship']").keyup(function(){
            $("input[name='emergency_contact_relationship']").removeClass("is-invalid");
        });

        $("input[name='birth_place']").keyup(function(){
            $("input[name='birth_place']").removeClass("is-invalid");
        });

        $("input[name='mobile']").keyup(function(){
            $("input[name='mobile']").removeClass("is-invalid");
        });

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('.date').attr('min', today);

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);
        $(".next").click(function () {

            if (current == 1) {

                if ($("#destination_itinerary").val() != '' && $(
                        "#departure_date_itinerary").val() !=
                    '' && $("#return_date_itinerary").val() != '' && $(
                        "input[name='modeOfTransportation']:checked").val() != undefined && $(
                        "input[name='coverage']:checked").val() != null && $("#email").val() != '') {

                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    var email = $(".email").val();
                    $(".email").html(email);

                    var covid = $("input[name='covid_checkbox']:checked").val();

                    if (covid === 'Yes') {
                        $(".covid-coverage").html('Included');
                        $(".covid-inclusion").removeClass('d-none');
                        $(".covid-subjectivities").removeClass('d-none');
                    } else {
                        $(".covid-coverage").html('Excluded');
                        $(".covid-inclusion").addClass('d-none');
                        $(".covid-subjectivities").addClass('d-none');
                    }

                    var dateofBirth_personal_info = $('#dateofBirth_personal_info').val();
                    dateofBirth_personal_info = moment(dateofBirth_personal_info).format('MMMM DD, YYYY');  
					$(".date_of_birth").html(dateofBirth_personal_info);

                    destinations ="";
                    $('select[name^="destination_itinerary"]').each(function(){
                        if( $(this).val() != ""){
                            if(destinations == ""){
                                destinations =  $(this).val();
                            } else {
                                destinations = destinations + ', ' + '<br>' +  $(this).val();
                            }
                        }
                    });
                    $(".destination").html(destinations);

                    departures ="";
                    dates = "";
                    noofday = 0;
                    start = "";
                    end = "";
                    diffDate = 0;
                    $('input[name^="departure_date_itinerary"]').each(function(){
                        if( $(this).val() != ""){
                            var return_date_id = "";
                           
                            if(dates == ""){
                                
                                var str = $(this).attr("id");
                                if(containsNumbers(str)) {
                                    return_date_id = str.slice(-8);
                                } else {
                                    return_date_id = "";
                                }
                                var return_date = $("#return_date_itinerary" + return_date_id).val();
                                
                                dates = moment($(this).val()).format('MMMM DD, YYYY') + ' - ' + moment(return_date).format('MMMM DD, YYYY');

                                start = new Date($(this).val());
                                end = new Date(return_date);

                                diffDate = (end - start) / (1000 * 60 * 60 * 24);

                                noofday = Math.round(diffDate) + 1;

                            } else {
                                
                                var str = $(this).attr("id");
                                if(containsNumbers(str)) {
                                    return_date_id = str.slice(-8);
                                } else {
                                    return_date_id = "";
                                }
                                var return_date = $("#return_date_itinerary" + return_date_id).val();
                                
                                dates = dates + ', ' + '<br>' + moment($(this).val()).format('MMMM DD, YYYY') + ' - ' + moment(return_date).format('MMMM DD, YYYY');

                                start = new Date($(this).val());
                                end = new Date(return_date);

                                diffDate = (end - start) / (1000 * 60 * 60 * 24); 

                                noofday = noofday + Math.round(diffDate) + 1;
                            }   
                        }
                    });

                    $(".travel_date").html(dates);

                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    var modeOfTransportation = $("input[name='modeOfTransportation']:checked").val();

                    var package = $("input[name='coverage']:checked").val();

                    var noofday = noofday;

                    var coverage = $("input[name='coverage']:checked").val();

                    var promo = $("input[name='promo_code']").val();

                    var si = 0;

                    if(coverage === 'Packet') {
                        si = 250000.00;
                    } else if (coverage === 'Pro') {
                        si = 500000.00;
                    } else if (coverage === 'Prime') {
                        si = 750000.00;
                    } else {
                        si = 1000000.00;
                    }
                    
                    if(noofday > 60) {
                        $(".date-range-input").addClass("is-invalid");
                        $(".date-range").addClass("d-none");
                        $(".date-range-feed").removeClass("d-none");
                        
                    } else {    
                        $(".date-range-input").removeClass("is-invalid");
                        $(".date-range").removeClass("d-none");
                        $(".date-range-feed").addClass("d-none");
                        if(promo != "") {
                            $.ajax({
                                url: "{{ url('/api/get-quote/domestic-insurance/promo') }}",
                                method:"GET",
                                data:{ _token:_token,promo:promo},  error: function(data){
                                        var errors = data.responseJSON;
                                        jQuery.each(data, function(key, value){
                                          alert(value);
                                          });
                                      }, 

                                success:function(data){
                                    // alert(data).length();
                                    if(!$.trim(data)){   
                                        alert(data);
                                        $("#promo_code").addClass("is-invalid");
                                    } else {

                                        $("#promo_code").removeClass("is-invalid");
                                        $.ajax({
                                            url: "{{ url('/api/get-quote/domestic-insurance/get-prem') }}",
                                            method: "GET",
                                            data: {
                                                '_token': '{{ csrf_token() }}',
                                                noofday: noofday,
                                                mode_transpo: modeOfTransportation,
                                                package: package
                                            },
                                            success: function (data) {
                                                var premium = data.prem;
                                                $('input[name="net_premium_all"]').val(data.prem);

                                                var premtax = (data.prem *2) / 100; 
                                                premtax_com = premtax.toFixed(2);

                                                $('input[name="premium_tax_all"]').val(premtax_com);
                                                $('input[name="final_premium_tax_all"]').val(premtax_com);

                                                var lgt = (parseFloat(data.prem) *0.2)/100;
                                                $('input[name="lgt_all"]').val(lgt);

                                                var dst = 0;
                                                if (si <= 100000) {
                                                    dst = 0.00;
                                                } else if (si > 100000 && si <= 300000) {
                                                    dst = 20.00;
                                                } else if (si > 300000 && si <= 500000) {
                                                    dst = 50.00;
                                                } else if (si > 500000 && si <= 750000) {
                                                    dst = 100.00;
                                                } else if (si > 750000 && si <= 1000000) {
                                                    dst = 150.00;
                                                } else {
                                                    dst = 200.00;
                                                }

                                                $('input[name="doc_stamp_all"]').val(dst);
                                                $(".total-premium").html('');
                                                var due = parseFloat(data.prem) + premtax + dst + lgt;

                                                $(".total-premium").html('Php ' + ReplaceNumberWithCommas(due.toFixed(2)));
                                                $('input[name="total_amount"]').val(due);
                                                if(covid == 'Yes') {

                                                                $.ajax({
                                                                url: "{{ url('/api/get-quote/domestic-insurance/get-prem-covid') }}",
                                                                method:"GET",
                                                                data:{ 
                                                                    '_token': '{{ csrf_token() }}',
                                                                    noofday: noofday,
                                                                    package:package,
                                                                },
                                                                success:function(data)
                                                                {
                                                                        premium = parseFloat(premium) + parseFloat(data.prem);

                                                                        $('input[name="covid_amount"]').val(data.prem);

                                                                        $('input[name="net_premium_all"]').val(premium);

                                                                        var premtax = (parseFloat(premium) *2)/100;
                                                                        var premtax_com = premtax.toFixed(2);

                                                                        $('input[name="premium_tax_all"]').val(premtax_com);
                                                                        $('input[name="final_premium_tax_all"]').val(premtax_com);

                                                                        var lgt = (parseInt(premium) *0.2)/100;
                                                                        var lgt_com = lgt.toFixed(2);

                                                                        $('input[name="lgt_all"]').val(lgt);

                                                                        $(".total-premium").html('');

                                                                        var due = parseFloat(premium) + premtax + dst + lgt;

                                                                        $('input[name="total_amount"]').val(due);

                                                                        $(".total-premium").html('Php ' + ReplaceNumberWithCommas(due.toFixed(2)));
                                                                            $.ajax({
                                                                                url:  "{{ url('/api/get-quote/domestic-insurance/promo') }}",
                                                                                method:"GET",
                                                                                data:{ _token:_token,promo:promo},
                                                                                success:function(datapromo)
                                                                                {
                                                                                    $.each(datapromo, function(key, valuepromowithcovid){
                                                                                            if(valuepromowithcovid.type == "A"){
                                                                                                var dueless = due - parseFloat(valuepromowithcovid.amount);
                                                                                                var less = parseFloat(valuepromowithcovid.amount);
                                                                                                $('input[name="less_all"]').val(less);

                                                                                                if(valuepromowithcovid.amount > due) {
                                                                                                    dueless = 0;
                                                                                                } else {
                                                                                                    dueless = dueless;
                                                                                                }
                                                                                                    
                                                                                                $(".total-premium").html('Php ' + ReplaceNumberWithCommas(dueless.toFixed(2)));
                                                                                                $('input[name="total_amount"]').val(dueless);
                                                                                            } else {

                                                                                                var rate = valuepromowithcovid.rate;
                                                                                                var promotoless =  (due * (parseFloat(rate)/100));
                                                                                                var dueless =  due - parseFloat(promotoless);
                                                                                                $('input[name="less_all"]').val(rate+"%");
                                                                                                $(".total-premium").html('Php ' + ReplaceNumberWithCommas(dueless.toFixed(2)));
                                                                                                $('input[name="total_amount"]').val(dueless);
                                                                                            }
                                                                                    })
                                                                        }
                                                                    });
                                                        }
                                                    });
                                                } else  {
                                                        $.ajax({
                                                                    url: "{{url('/api/get-quote/domestic-insurance/promo')}}",
                                                                        method:"GET",
                                                                        data:{ _token:_token,promo:promo},
                                                                    success:function(datapromo)
                                                                    {
                                                                        $.each(datapromo, function(key, valuepromo){
                                                                            if(valuepromo.type == "A"){
                                                                                        var dueless = due - parseFloat(valuepromo.amount);
                                                                                        var less = parseFloat(valuepromo.amount);
                                                                                        $('input[name="less_all"]').val(less);

                                                                                        if(valuepromo.amount > due) {
                                                                                            dueless = 0;
                                                                                        } else {
                                                                                            dueless = dueless;
                                                                                        }
                                                                                            
                                                                                        $(".total-premium").html('Php ' + ReplaceNumberWithCommas(dueless.toFixed(2)));
                                                                                        $('input[name="total_amount"]').val(dueless);
                                                                                    } else {

                                                                                        var rate = valuepromo.rate;
                                                                                        var promotoless =  (due * (parseFloat(rate)/100));
                                                                                        var dueless =  due - parseFloat(promotoless);
                                                                                        $('input[name="less_all"]').val(rate+"%");
                                                                                        $(".total-premium").html('Php ' + ReplaceNumberWithCommas(dueless.toFixed(2)));
                                                                                        $('input[name="total_amount"]').val(dueless);
                                                                                }
                                                                        })
                                                                                
                                                        }
                                                    });
                                                }
                                            }
                                        });

                                        
                                        next_fs.show();

                                        current_fs.animate({
                                            opacity: 0
                                        }, {
                                            step: function (now) {

                                                opacity = 1 - now;

                                                current_fs.css({
                                                    'display': 'none',
                                                    'position': 'relative'
                                                });
                                                next_fs.css({
                                                    'opacity': opacity
                                                });
                                            },
                                            duration: 500
                                        });
                                        setProgressBar(++current);
                                    }
                                }
                            });
                        } else {
                            $.ajax({
                                url: "{{ url('/api/get-quote/domestic-insurance/get-prem')}}",
                                method: "GET",
                                data: {
                                    '_token': '{{ csrf_token() }}',
                                    noofday: noofday,
                                    mode_transpo: modeOfTransportation,
                                    package: package
                                },
                                success: function (data) {
                                    
                                    var premium = data.prem;
                                    $('input[name="net_premium_all"]').val(data.prem);

                                    var premtax = (data.prem *2) / 100; 
                                    premtax_com = premtax.toFixed(2);

                                    $('input[name="premium_tax_all"]').val(premtax_com);
                                    $('input[name="final_premium_tax_all"]').val(premtax_com);

                                    var lgt = (parseFloat(data.prem) *0.2)/100;
                                    $('input[name="lgt_all"]').val(lgt);

                                    var dst = 0;
                                    if (si <= 100000) {
                                        dst = 0.00;
                                    } else if (si > 100000 && si <= 300000) {
                                        dst = 20.00;
                                    } else if (si > 300000 && si <= 500000) {
                                        dst = 50.00;
                                    } else if (si > 500000 && si <= 750000) {
                                        dst = 100.00;
                                    } else if (si > 750000 && si <= 1000000) {
                                        dst = 150.00;
                                    } else {
                                        dst = 200.00;
                                    }

                                    $('input[name="doc_stamp_all"]').val(dst);
                                    $(".total-premium").html('');
                                    var due = parseFloat(data.prem) + premtax + dst + lgt;

                                    $(".total-premium").html('Php ' + ReplaceNumberWithCommas(due.toFixed(2)));
                                    $('input[name="total_amount"]').val(due);

                                    if(covid === 'Yes') {
                                                    $.ajax({
                                                    url: "{{ url('/api/get-quote/domestic-insurance/get-prem-covid') }}",
                                                    method:"GET",
                                                    data:{ 
                                                        '_token': '{{ csrf_token() }}',
                                                        noofday: noofday,
                                                        package:package,
                                                    },
                                                    success:function(data)
                                                    {
                                                        premium = parseFloat(premium) + parseFloat(data.prem);

                                                        $('input[name="covid_amount"]').val(data.prem);

                                                        $('input[name="net_premium_all"]').val(premium);

                                                        var premtax = (parseFloat(premium) *2)/100;
                                                        var premtax_com = premtax.toFixed(2);

                                                        $('input[name="premium_tax_all"]').val(premtax_com);
                                                        $('input[name="final_premium_tax_all"]').val(premtax_com);

                                                        var lgt = (parseInt(premium) *0.2)/100;
                                                        var lgt_com = lgt.toFixed(2);

                                                        $('input[name="lgt_all"]').val(lgt);

                                                        $(".total-premium").html('');

                                                        var due = parseFloat(premium) + premtax + dst + lgt;

                                                        $('input[name="total_amount"]').val(due);

                                                        $(".total-premium").html('Php ' + ReplaceNumberWithCommas(due.toFixed(2)));

                                            }
                                        });
                                    } 

                    
                                }
                            });

                            next_fs.show();

                                                        current_fs.animate({
                                                            opacity: 0
                                                        }, {
                                                            step: function (now) {

                                                                $("html").scrollTop(0);

                                                                opacity = 1 - now;

                                                                current_fs.css({
                                                                    'display': 'none',
                                                                    'position': 'relative'
                                                                });
                                                                next_fs.css({
                                                                    'opacity': opacity
                                                                });
                                                            },
                                                            duration: 500
                                                        });
                                                        setProgressBar(++current);
                        }
                    }


                } else {

                    if ($("#destination_itinerary").val() === '') {
                        $('#destination_itinerary').closest('.form-group').addClass('has-error has-feedback');
                        $('#destination_itinerary').after('<span class="form-control-feedback destination-feed fa fa-times-circle" aria-hidden="true"></span>');
                        $(".destination-feed").removeClass("d-none");

                    } else {
                        $(".validation_destination").remove();
                        $('#destination_itinerary').closest('.form-group').removeClass('has-error');
                        $('.destination-feed').remove();
                        $(".destination-feed").addClass("d-none");
                    }

                    if ($("#departure_date_itinerary").val() === '') {
                        $("#departure_date_itinerary").addClass("is-invalid");
                    } else {
                        $("#departure_date_itinerary").removeClass("is-invalid");
                    }

                    if ($("#return_date_itinerary").val() === '') {
                        $("#return_date_itinerary").addClass("is-invalid");
                    } else {
                        $("#return_date_itinerary").removeClass("is-invalid");
                    }

                    if ($("input[name='email']").val() === '') {
                        $("input[name='email']").addClass("is-invalid");
                    } else {
                        $("input[name='email']").removeClass("is-invalid");
                    }

                    // if ($("#destination_itinerary").val() === '') {
                    //     $("#destination_itinerary").after("<div class='validation_destination v-error-msg'>Destination is empty</div>");    
                    //     $('#destination_itinerary').closest('.form-group').addClass('has-error has-feedback');
                    //     $('#destination_itinerary').after('<span class="form-control-feedback destination-feed fa fa-times-circle" aria-hidden="true"></span>');
                    // } else {
                    //     $(".validation_destination").remove();
                    //     $('#destination_itinerary').closest('.form-group').removeClass('has-error');
                    //     $('.destination-feed').remove();
                    // }

                    

                    if ($("input[name='modeOfTransportation']:checked").val() == undefined) {
                        $(".via").css({
                            'border' : '1px solid #b94a48'
                        });

                        $(".via-non").css({
                            'border' : '1px solid #b94a48'
                        });

                        $(".modeOfTransportation-feed").removeClass("d-none");

                    } else {
                        $(".via").css({
                            'border' : 'none'
                        });

                        $(".via-non").css({
                            'border' : 'none'
                        });

                        $(".modeOfTransportation-feed").addClass("d-none");
                    }

                    if ($("input[name='coverage']:checked").val() == undefined) {
                        $("input[name='coverage']").addClass("is-invalid");
                    } else {
                        $("input[name='coverage']").removeClass("is-invalid");
                    }
                }

            } else if (current == 3) {

                if ($("#first_name").val() != '' && $("#middle_name").val() != '' && $("#last_name")
                    .val() != '' && $("#salutation").val() != '' &&
                    $("#residence_address").val() != '' && $("#residence_province").val() != '' && $(
                        "#residence_municipality").val() != '' && $("#residence_barangay").val() !=
                    '' && $("#sex").val() != '' &&
                    $("#birth_place").val() != '' && $("#mobile").val() != '' && $("#id_type")
                    .val() != '' && $("#fileinput").val() != '' && $("#emergency_contact_name").val() != '' && $("#emergency_contact_no").val() != '' && $("#emergency_contact_relationship").val() != '') {


                    var first_name = $(".first_name").val();
                    var middle_name = $(".middle_name").val();
                    var last_name = $(".last_name").val();
                    $(".full_name").html(first_name + ' ' + middle_name + ' ' + last_name);

                    var mobile = $(".mobile").val();
                    $(".mobile").html(mobile);

                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                  


                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


                    next_fs.show();

                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function (now) {

                            $("html").scrollTop(0);

                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(++current);
                } else {

                    $(".validation_salutation").remove();

                    $(".validation_id").remove();

                    $(".validation_residence_province").remove();

                    $(".validation_residence_municipality").remove();

                    $(".validation_residence_barangay").remove();

                    $(".validation_sex").remove();

                    

                    if ($("input[name='first_name']").val() === '') {
                        $("input[name='first_name']").addClass("is-invalid");
                    } else {
                        $("input[name='first_name']").removeClass("is-invalid");
                    }

                    if ($("input[name='upload']").val() === '') {
                        $("input[name='upload']").addClass("is-invalid");
                        $("#upload_file").css({
                            'border' : '1px solid #b94a48'
                        });
                    } else {
                        $("input[name='upload']").removeClass("is-invalid");
                        $("#upload_file").css({
                            'border' : 'none'
                        });
                    }

                    if ($("input[name='middle_name']").val() === '') {
                        $("input[name='middle_name']").addClass("is-invalid");
                    } else {
                        $("input[name='middle_name']").removeClass("is-invalid");
                    }

                    if ($("input[name='last_name']").val() === '') {
                        $("input[name='last_name']").addClass("is-invalid");
                    } else {
                        $("input[name='last_name']").removeClass("is-invalid");
                    }

                    if ($("input[name='residence_address']").val() === '') {
                        $("input[name='residence_address']").addClass("is-invalid");
                    } else {
                        $("input[name='residence_address']").removeClass("is-invalid");
                    }

                    if ($("input[name='birth_place']").val() === '') {
                        $("input[name='birth_place']").addClass("is-invalid");
                    } else {
                        $("input[name='birth_place']").removeClass("is-invalid");
                    }

                   
                    if ($("input[name='mobile']").val() === '') {
                        $("input[name='mobile']").addClass("is-invalid");
                    } else {
                        $("input[name='mobile']").removeClass("is-invalid");
                    }

                   

                    if ($("input[name='emergency_contact_name']").val() === '') {
                        $("input[name='emergency_contact_name']").addClass("is-invalid");
                    } else {
                        $("input[name='emergency_contact_name']").removeClass("is-invalid");
                    }

                    if ($("input[name='emergency_contact_no']").val() === '') {
                        $("input[name='emergency_contact_no']").addClass("is-invalid");
                    } else {
                        $("input[name='emergency_contact_no']").removeClass("is-invalid");
                    }

                    if ($("input[name='emergency_contact_relationship']").val() === '') {
                        $("input[name='emergency_contact_relationship']").addClass("is-invalid");
                    } else {
                        $("input[name='emergency_contact_relationship']").removeClass("is-invalid");
                    }

                    if ($("#salutation").val() === '') {
                        $("#salutation").after("<div class='validation_salutation v-error-msg'>Salutation is empty</div>");    
                        $('#salutation').closest('.form-group').addClass('has-error has-feedback');
                        $('#salutation').after('<span class="form-control-feedback salutation-feed fa fa-times-circle" aria-hidden="true"></span>');
                    } else {
                        $(".validation_salutation").remove();
                        $('#salutation').closest('.form-group').removeClass('has-error');
                        $('.salutation-feed').remove();
                    }

                    if ($("#sex").val() === '') {
                        $("#sex").after("<div class='validation_sex v-error-msg'>Sex is empty</div>");    
                        $('#sex').closest('.form-group').addClass('has-error has-feedback');
                        $('#sex').after('<span class="form-control-feedback sex-feed fa fa-times-circle" aria-hidden="true"></span>');
                    } else {
                        $(".validation_sex").remove();
                        $('#sex').closest('.form-group').removeClass('has-error');
                        $('.sex-feed').remove();
                    }

                    if ($("#id_type").val() === '') {
                        $("#id_type").after("<div class='validation_id v-error-msg'>ID type is empty</div>");    
                        $('#id_type').closest('.form-group').addClass('has-error has-feedback');
                        $('#id_type').after('<span class="form-control-feedback id-feed fa fa-times-circle" aria-hidden="true"></span>');
                    } else {
                        $(".validation_id").remove();
                        $('#id_type').closest('.form-group').removeClass('has-error');
                        $('.id-feed').remove();
                    }

                    if($('#residence_province').val() === ""){
						$("#residence_province").after("<div class='validation_residence_province v-error-msg'>Province is empty</div>");    
                        $('#residence_province').closest('.form-group').addClass('has-error has-feedback');
                        $('#residence_province').after('<span class="form-control-feedback province-feed fa fa-times-circle" aria-hidden="true"></span>');
                    } else {   
                        $(".validation_residence_province").remove();
                        $('#residence_province').closest('.form-group').removeClass('has-error');
                        $('.province-feed').remove();
                    }

                    if($('#residence_municipality').val() === ""){
						$("#residence_municipality").after("<div class='validation_residence_municipality v-error-msg'>Municipality is empty</div>");    
                        $('#residence_municipality').closest('.form-group').addClass('has-error has-feedback');
                        $('#residence_municipality').after('<span class="form-control-feedback municipality-feed fa fa-times-circle" aria-hidden="true"></span>');         
		     		} else {
                        $(".validation_residence_municipality").remove();
                        $('#residence_municipality').closest('.form-group').removeClass('has-error');
                        $('.municipality-feed').remove();
                    }

                     if($('#residence_barangay').val() === ""){
						$("#residence_barangay").after("<div class='validation_residence_barangay v-error-msg'>Barangay is empty</div>");    
                        $('#residence_barangay').closest('.form-group').addClass('has-error has-feedback');
                        $('#residence_barangay').after('<span class="form-control-feedback barangay-feed fa fa-times-circle" aria-hidden="true"></span>');         
		     		} else {
                        $(".validation_residence_barangay").remove();
                        $('#residence_barangay').closest('.form-group').removeClass('has-error');
                        $('.barangay-feed').remove();
                    }


                }

            } else if (current == 4) {

                var privacy = $("input[name='privacy']:checked").val();
                var terms = $("input[name='terms']:checked").val();
                var exclusions = $("input[name='exclusions']:checked").val();

                if (privacy == "agree" && terms == "agree" && exclusions == "agree") {
                    $("#terms").addClass("d-none");

                    $("#msform").submit();
                } else {
                    $("#terms").removeClass("d-none");
                }

            } else {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();


                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


                next_fs.show();

                current_fs.animate({
                    opacity: 0
                }, {
                    step: function (now) {

                        $("html").scrollTop(0);

                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            }
        });

        $("#upload_file").click(function () {
            $('#fileinput').trigger('click');
        });

        $("#fileinput").on('change', function () {
            var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');

            // $("#inputGroupFile").on('change',function(){
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
            // })
            $(".upload-file-name").html(filename);
        })

        // jQuery("#destination_itinerary").change(function () {
        //     var destination = $("#destination_itinerary").val();
        //     
        // });

      

        jQuery("input[name='modeOfTransportation']").change(function () {
            $(".step1").removeClass("d-none");
            var modeOfTransportation = $("input[name='modeOfTransportation']:checked").val();
            $(".modeOfTransportation").html(modeOfTransportation);

            if(modeOfTransportation === "Non-Air Plan") {
                $(".delayed-departure").addClass("d-none");
                $(".baggage-delay").addClass("d-none");
                $(".in-flight").addClass("d-none");
            } else {
                $(".delayed-departure").removeClass("d-none");
                $(".baggage-delay").removeClass("d-none");
                $(".in-flight").removeClass("d-none");
            }
        });


        $("#coverage").change(function () {
            var coverage = $("#coverage").val();

            $(".package").html(coverage);
            $("input[name='coverage']").val([coverage]);


            if (coverage === 'Packet') {
                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 250,000.00');
                $("#accidental_death").html('Php 250,000.00');
                $("#accidental_medical").html('Php 25,000.00');
                $("#accidental_burial").html('Php 25,000.00');
                $("#unprovoked_murder").html('Php 250,000.00');
                $("#medical_expense").html('Php 250,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 12,500.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 250.00/day');
            } else if (coverage === 'Pro') { 
                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(4)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(5)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 500,000.00');
                $("#accidental_death").html('Php 500,000.00');
                $("#accidental_medical").html('Php 50,000.00');
                $("#accidental_burial").html('Php 50,000.00');
                $("#unprovoked_murder").html('Php 500,000.00');
                $("#medical_expense").html('Php 500,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 25,000.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 500.00/day');
            } else if (coverage === 'Prime') { 
                jQuery(".step1 > div > table td:nth-child(4)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(5)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 750,000.00');
                $("#accidental_death").html('Php 750,000.00');
                $("#accidental_medical").html('Php 75,000.00');
                $("#accidental_burial").html('Php 75,000.00');
                $("#unprovoked_murder").html('Php 750,000.00');
                $("#medical_expense").html('Php 750,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 37,500.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 750.00/day');
            } else {
                jQuery(".step1 > div > table td:nth-child(5)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(4)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 1,000,000.00');
                $("#accidental_death").html('Php 1,000,000.00');
                $("#accidental_medical").html('Php 100,000.00');
                $("#accidental_burial").html('Php 100,000.00');
                $("#unprovoked_murder").html('Php 1,000,000.00');
                $("#medical_expense").html('Php 1,000,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 50,000.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 1,000.00/day');
            }
        });


        $("input[name='coverage']").change(function () {

            var coverage = $("input[name='coverage']:checked").val();
            $(".package").html(coverage);
           
            jQuery("#coverage").val(coverage).change();


            if (coverage === 'Packet') {
                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 250,000.00');
                $("#accidental_death").html('Php 250,000.00');
                $("#accidental_medical").html('Php 25,000.00');
                $("#accidental_burial").html('Php 25,000.00');
                $("#unprovoked_murder").html('Php 250,000.00');
                $("#medical_expense").html('Php 250,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 12,500.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 250.00/day');
            } else if (coverage === 'Pro') { 
                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(4)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(5)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 500,000.00');
                $("#accidental_death").html('Php 500,000.00');
                $("#accidental_medical").html('Php 50,000.00');
                $("#accidental_burial").html('Php 50,000.00');
                $("#unprovoked_murder").html('Php 500,000.00');
                $("#medical_expense").html('Php 500,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 25,000.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 500.00/day');
            } else if (coverage === 'Prime') { 
                jQuery(".step1 > div > table td:nth-child(4)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(5)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 750,000.00');
                $("#accidental_death").html('Php 750,000.00');
                $("#accidental_medical").html('Php 75,000.00');
                $("#accidental_burial").html('Php 75,000.00');
                $("#unprovoked_murder").html('Php 750,000.00');
                $("#medical_expense").html('Php 750,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 37,500.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 750.00/day');
            } else {
                jQuery(".step1 > div > table td:nth-child(5)").css({
                    'background-color': '#d6ffff'
                });

                jQuery(".step1 > div > table td:nth-child(2)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(3)").css({
                    'background-color': '#ffffff'
                });

                jQuery(".step1 > div > table td:nth-child(4)").css({
                    'background-color': '#ffffff'
                });

                $(".sum-insured").html('Php 1,000,000.00');
                $("#accidental_death").html('Php 1,000,000.00');
                $("#accidental_medical").html('Php 100,000.00');
                $("#accidental_burial").html('Php 100,000.00');
                $("#unprovoked_murder").html('Php 1,000,000.00');
                $("#medical_expense").html('Php 1,000,000.00');
                $("#transport_repatriation").html('Actual Expense');
                $("#repatriation_mortal").html('Actual Expense');
                $("#pre-existing").html('Php 50,000.00');
                $("#trip_cancellation").html('Php 25,000.00');
                $("#trip_curtailment").html('Php 25,000.00');
                $("#long_distance").html('Actual Expense');
                $("#medical_referral").html('Actual Expense');
                $("#connection_services").html('Actual Expense');
                $("#trip_cancellation_coverage").html('Php 25,000.00');
                $("#daily_hospital_coverage").html('Php 1,000.00/day');
            }
        });


        $(".previous").click(function () {

            current_s = $(this).parent();
            current_fs = current_s.parent();
            previous_fs = current_s.parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function () {
            return false;
        })

        $(document).on("click", ".4thpage_add", function () {
            var destination_to = $(".return_date_number").last().val();
            var minNumber = 1;
            var maxNumber = 40000000;

            $(".delete-row-col").removeClass("d-none");

            var date = new Date();
            date.setFullYear(date.getFullYear() - 4);
            var year = date.getFullYear();
            var yearlist;
            for (i = new Date().getFullYear(); i > year; i--) {
                yearlist = yearlist + '<option value="' + i + '">' + i + '</option>';
            }
            var colCount = $("#customFields #hardware-body .row").length;
            if (colCount > 0) {
                jQuery('.delete-row-col').css('display', 'flex');
            } else {
                jQuery('.delete-row-col').hide();
            }
            var number = Math.floor(Math.random() * (maxNumber - minNumber + 1) + minNumber);
            var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')";
            var numformat1 = "vf_clean_number('destination_itinerary" + number +
                "');vf_commafy('destination_itinerary" + number + "', 2)";
            var $cloned = $('#divvv').clone().prop('id', 'divvv' + number);
            var new_row = '<div class="row">\
			<div class="col-lg-6">\
				<div class="form-group">\
					<label for="destination_itinerary" style="color: white;">Destination</label>\
					<select  id="destination_itinerary' + number + '"" name="destination_itinerary[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-destination_itinerary" data-size="10"  data-live-search="true" >\
															<option value="">- Select -</option>\
															@foreach($locations as $location)\
																<option value="{{$location->province}}">{{$location->province}}</option>\
															@endforeach\
					</select>\
                    <p class="destination-feed d-none" style="color: #b94a48; font-weight: 400; margin-top: 0.25rem;">Destination is empty.</p>\
				</div>\
			</div>\
			<div class="col-lg-2">\
				<div class="form-group">\
					<label for="departure_date_itinerary ' + number + '"" style="color: white;">From\
					</label>\
					<div class="form-group">\
						<input name="departure_date_itinerary[]" id="departure_date_itinerary' + number + '"" type="date"\
							class="form-control input-lg date date-range-input"\
							maxlength="100" placeholder="Select Departure Date">\
                            <div class="invalid-feedback departure date-range">Please provide a valid date.</div>\
							<p class="date-range-feed d-none" style="color: #dc3545; font-weight: 400; margin-top: 0.25rem;">Date range should not exceed to 60 days.</p>\
					</div>\
				</div>\
			</div>\
			<div class="col-lg-2">\
				<div class="form-group">\
					<label for="return_date_itinerary' + number + '"" style="color: white;">To\
					</label>\
					<div class="form-group">\
						<input name="return_date_itinerary[]" id="return_date_itinerary' + number + '"" type="date"\
							class="form-control input-lg date date-range-input return_date_number"\
							maxlength="100" placeholder="Select Return Date">\
                            <div class="invalid-feedback departure date-range">Please provide a valid date.</div>\
							<p class="date-range-feed d-none" style="color: #dc3545; font-weight: 400; margin-top: 0.25rem;">Date range should not exceed to 60 days.</p>\
					</div>\
				</div>\
			</div>\
			<div class="col-1 col-lg-1 delete-row-col d-flex">\
				<button type="button" class="delete-row btn">\
					<svg id="i-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 28"\
						width="32" height="32" stroke="currentcolor" stroke-linecap="round"\
						stroke-linejoin="round" stroke-width="2">\
						<path d="M2 30 L30 2 M30 30 L2 2" />\
					</svg>\
				</button>\
			</div>\
            <div class="col-1 col-lg-1 col-btn add-row-col d-none">\
				<button type="button" class="btn btn-primary add-button 4thpage_add">\
					<svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="36px" fill="#FFFFFF"><path d="M0 0h24v24H0z" fill="none"/><path fill="#fff" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>\
				</button>\
			</div>\
		</div>';

            $('#hardware-body').append(new_row);
            $cloned.find('#copy_select').prop('name', 'destination_itinerary[]');
            $cloned.find('#copy_select').prop('id', 'destination_itinerary' + number);
            $cloned.appendTo('#new_select' + number);
            jQuery('#destination_itinerary' + number).selectpicker();

            $('.date').attr('min', today);

    
                $('.date').attr('min', destination_to);
          

            $('.add-row-col').addClass("d-none");
            $('.add-row-col').last().removeClass("d-none");

        });

    });

    $(document).on("click", ".delete-row", function () {
        $(this).closest('.row').remove();
        var colCount = $("#customFields #hardware-body .row").length;

        if (colCount > 1) {
            $('.delete-row-col').css('display', 'flex');
            $('.add-row-col').last().removeClass("d-none");
        } else {
            $('.delete-row-col').addClass("d-none");
            $('.add-row-col').removeClass("d-none");
        }
        return false;
    });


    $("#collapse").click(function () {
        if ($("#collapseOne").hasClass("show")) {
            $("#collapseOne").removeClass("show");
        } else {
            $("#collapseOne").addClass("show");
        }
    });
</script>