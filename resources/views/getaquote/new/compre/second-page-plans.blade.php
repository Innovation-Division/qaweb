@extends('getaquote.new.compre.index')
@section('compre-section')
<style>
    /* @media only screen and (min-width: 768px) and (max-width: 991.98px) {

        .custom-col {
            flex: 1 0 100% !important;
            margin-bottom: 20px;
        }

        .car-details {
            font-size: 16px !important;
        }

        .car-sub-details {
            font-size: 12px !important;
        }

        .card-price {
            margin-left: 10px !important;
        }

        .price-card {
            padding: 70px 350px 30px 350px !important;
        }
    }


    @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
        .price-card {
            padding: 70px 450px 30px 450px !important;
        }
    }


    @media only screen and (min-width: 1200px) and (max-width: 1399.98px) {
        .price-card {
            padding: 70px 450px 30px 450px !important;
        }
    } */

    .card-price {
        max-width: 95% !important;
        margin-left: 0px;
    }

    .active-aon {
        border: 1px solid #006666;
        background-color: #FBFAFA;
    }

    .card-price:hover {
        transform: none !important;
    }

    .table>thead>tr:first-child>th {
        border: none;
    }

    .table>thead>tr:first-child>th:last-child {
        border: none;
        color: #ffffff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background: #006666;
        text-align: center;
        padding: 10px 0px;
        font-weight: normal;
    }

    .table>thead>tr:last-child>th {
        border: none;
        padding: 25px 10px;
        font-size: 20px;
        color: #2D2727;
    }

    .table>tbody>tr {
        border: none;
    }

    .table>tbody>tr>td {
        border: none;
        padding: 25px 10px;
    }

    .table>tbody>tr>td>svg {
        width: 22px;
        height: 22px;
    }

    /* .table>tbody>tr:last-child>.select-coverage>:hover {
        border: 1px solid #008080 !important; */
    /* padding: 25px 10px; */
    /* } */
    /* .table>tbody>tr:last-child>td:last-child:hover {
        border: 1px solid #008080 !important;
        padding: 25px 10px;
    } */


    .table>thead>tr:last-child>th:nth-child(2) {
        background-color: #fff;
    }

    .table>tbody>tr>td:nth-child(2) {
        background-color: #fff;
    }

    .table>thead>tr:last-child>th:last-child {
        background-color: #fff;
    }

    .table>tbody>tr>td:last-child {
        background-color: #fff;
    }

    .table>tbody>tr:last-child>td {
        padding: 0px;
    }

    .table>tfoot>tr>td {
        border: none;
        padding: 25px 10px;
    }

    .table>tfoot>tr>td:nth-child(2) {
        border: none;
    }

    .selected-parent {
        border-bottom-left-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
        border: none;
    }

    .select-coverage {
        padding: 7px !important;
    }

    .select-coverage:hover {
        border: 1px solid #008080 !important;
        border-bottom-left-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
    }

    thead>tr>.with-aon-class-border {
        border-top: 1px solid #008080 !important;
        border-right: 1px solid #008080 !important;
        border-left: 1px solid #008080 !important;
    }

    tbody>tr>.with-aon-class-border {
        border-right: 1px solid #008080 !important;
        border-left: 1px solid #008080 !important;
    }

    thead>tr>.without-aon-class-border {
        border-top: 1px solid #008080 !important;
        border-right: 1px solid #008080 !important;
        border-left: 1px solid #008080 !important;
    }

    tbody>tr>.without-aon-class-border {
        border-right: 1px solid #008080 !important;
        border-left: 1px solid #008080 !important;
    }

    .table-div {
        background-color: #F7FCFF;
    }

    .sub-head-title {
        display: none;
    }

    .web {
        display: none;
    }

    @media (max-width: 991px) {
        .mob-cover {
            font-size: 14px;
        }

        .popular-mob {
            display: none;
        }

        .card-price-1 {
            margin-top: 0 !important;
        }

        .card-price>svg {
            width: 12px !important;
            height: auto !important;
        }

        .price-card {
            padding: 0px 10px 30px 10px !important;
        }

        .table>thead>tr:last-child>th {
            padding: 15px 10px !important;
            font-size: 14px !important;
        }

        .table>tbody>tr>td {
            border-bottom: 1px solid #EFF2F4 !important;
            padding: 15px 10px !important;
            font-size: 14px !important;
            color: #3B3939;
            font-weight: 500;
            font-family: 'Inter';
        }

        .table-div {
            background-color: #ffffff !important;

        }

        .personal-div {
            background-color: #ffffff !important;
            padding: 15px 20px 10px 20px !important;
        }

        .sub-head-title {
            display: block !important;
        }

        .div-title {
            font-size: 17px !important;
        }

        .table>tbody>tr>td>svg {
            width: 16px !important;
            height: 16px !important;
        }

        .web {
            display: block !important;
        }

        thead>tr>.with-aon-class-border {
            border: none !important;
        }

        tbody>tr>.with-aon-class-border {
            border: none !important;
        }

        thead>tr>.without-aon-class-border {
            border: none !important;
        }

        tbody>tr>.without-aon-class-border {
            border: none !important;
        }

        #backMobile {
            padding: 7px 120px !important;
        }

        #backMobile:focus {
            background: #C0E6E6 !important;
        }

        #backMobile:focus:not([disabled])::before {
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16' %3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8'/%3E%3C/svg%3E") !important;
            height: 28px;
            float: left;
        }

        #backMobile:hover:not([disabled])::before {
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='26' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16' %3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8'/%3E%3C/svg%3E") !important;
            height: 28px;
            float: left;
        }
    }
</style>
<form method="post" action="{{ url('/get-quote/auto-excel-plus/car-information') }}" enctype="multipart/form-data"
    id="compreFormStep2Plan">
    {{method_field('GET')}}
    <section class="col-12 auto-excel-plans-div">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">Auto Excel Plans</p>
                <p class="sub-head-title"
                    style="font-size: 12px; color: #585858; border-bottom: 1px solid #D7DEE3; padding-bottom: 20px;">
                    Comparison of With Turbo Shield versus Without Turbo Shield</p>
            </div>
            <div class="col-12 personal-div car-details-summary" style="background-color: #EFF2F4; margin-bottom: 0px;">
                <div class="row text-center">
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$carInfo->brand}}</p>
                        <p class="car-sub-details text-center">Car</p>
                    </div>
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$carInfo->model}}</p>
                        <p class="car-sub-details text-center">Model</p>
                    </div>
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$carInfo->year}}</p>
                        <p class="car-sub-details text-center">Year</p>
                    </div>
                    <div class="col custom-col">
                        <p class="car-details text-center" id="formatter">P890K</p>
                        <p class="car-sub-details text-center">Value</p>
                    </div>
                    @if($accessories->count() !== 0)
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$accessories->count()}}</p>
                        <p class="car-sub-details text-center">Additional Accessory(ies)</p>
                    </div>
                    @endif
                    <div class="col custom-col">
                        @if($carInfo->promoCode)
                        <p class="car-details text-center">Yes</p>
                        @else
                        <p class="car-details text-center">No</p>
                        @endif
                        <p class="car-sub-details text-center">Promo Code</p>
                    </div>
                </div>
            </div>
            <div class="col-12 table-div">
                <input type="hidden" name="aon" id="aon" value="{{$carInfo->isWithTotalGuard}}">
                <input type="hidden" name="firstAon" id="firstAon" value="{{$carInfo->isWithTotalGuard}}">
                <input type="hidden" name="transNo" id="transNo" value="{{$trans_no}}">
                <input type="hidden" name="page" id="page" value="plan">
                <input type="hidden" name="transaction" id="transaction" value="apply">
                <div class="row price-card">
                    <table class="table">
                        <thead>
                            <tr class="popular-mob">
                                <th scope="col"></th>
                                </th>
                                <th scope="col"></th>
                                <th scope="col">Popular</th>
                            </tr>
                            <tr>
                                <th scope="col"><span class="popular-mob">Coverage</span></th>
                                <th scope="col" style="text-align: center;" class="without-aon-class">Without Turbo Shield</th>
                                <th scope="col" style="text-align: center;" class="with-aon-class">With Turbo Shield</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Own Damage and Theft</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>Third Party Liability</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>Auto Passenger Personal Accident</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>Medical Expense Reimbursement</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>Extended RoadPal Rescue</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td> -->
                            </tr>
                            <!-- <tr>
                                <td>Gawa Agad</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr> -->
                            <tr>
                                <td>Acts of Nature</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>Turbo Shield</td>
                                <td style="text-align: center;" class="without-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#FB1A1A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                    </svg>
                                </td>
                                <td style="text-align: center;" class="with-aon-class">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>
                            <tr class="popular-mob">
                                <td></td>
                                <td style="text-align: center; padding-left: 0px; padding-right: 0px;"
                                    class="without-aon-class">
                                    <p style="background: #C0E6E6; font-weight: bold;padding: 3px 0px;">
                                    ₱{{number_format($carInfo->grossPrem, 2)}}</p>
                                </td>
                                <td style="text-align: center; padding-left: 0px; padding-right: 0px;"
                                    class="with-aon-class">
                                    <p style="background: #C0E6E6; font-weight: bold; padding: 3px 0px;">
                                    ₱{{number_format(($carInfo->grossPremWithAOM), 2)}}</p>
                                </td>
                            </tr>
                            <tr class="popular-mob">
                                <td></td>
                                <td style="text-align: center;" class="select-coverage">
                                    <p class="text-center d-none" id="buttonWithoutAON"
                                        style="background: #E4509A;padding: 10px;color: white;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                                        Selected
                                    </p>
                                    <a href="javascript:void(0)" id="withoutAON"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="32" height="32" fill="currentColor"
                                            class="bi bi-arrow-right-short d-none" viewBox="0 0 16 18">
                                            <path fill-rule="evenodd" fill="#008080"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                        </svg> Select</a>
                                </td>
                                <td style="text-align: center;" class="select-coverage">
                                    <p class="text-center" id="buttonWithAON"
                                        style="background: #E4509A;padding: 10px;color: white;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                                        Selected</p>
                                    <a href="javascript:void(0)" id="withAON"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="32" height="32" fill="currentColor"
                                            class="bi bi-arrow-right-short d-none" viewBox="0 0 16 18">
                                            <path fill-rule="evenodd" fill="#008080"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                        </svg> Select</a>
                                    <!-- <a href="javascript:void(0)" id="withAON"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="32" height="32" fill="currentColor"
                                            class="bi bi-arrow-right-short d-none" viewBox="0 0 16 18">
                                            <path fill-rule="evenodd" fill="#008080"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                        </svg> Select</a> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 price-card d-none" id="coveragePlanAlert"
                style="background-color: #F7FCFF; padding-top: 0; padding-bottom: 0;">
                <div class="row">
                    <div class="col-12 mb-5 popular-mob" style="background-color: #FFF4DA; padding: 20px 30px;">
                        <p style="color: #303030;">
                            <span style="padding: 10px;">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.0001 21.7504C17.0001 21.9494 16.9211 22.1401 16.7805 22.2808C16.6398 22.4214 16.449 22.5004 16.2501 22.5004H8.75012C8.55121 22.5004 8.36045 22.4214 8.21979 22.2808C8.07914 22.1401 8.00012 21.9494 8.00012 21.7504C8.00012 21.5515 8.07914 21.3608 8.21979 21.2201C8.36045 21.0795 8.55121 21.0004 8.75012 21.0004H16.2501C16.449 21.0004 16.6398 21.0795 16.7805 21.2201C16.9211 21.3608 17.0001 21.5515 17.0001 21.7504ZM20.7501 9.75044C20.7534 11.0007 20.4709 12.2352 19.9243 13.3597C19.3778 14.4842 18.5815 15.469 17.5964 16.2389C17.4122 16.3801 17.2627 16.5615 17.1593 16.7693C17.056 16.9772 17.0015 17.2059 17.0001 17.4379V18.0004C17.0001 18.3983 16.8421 18.7798 16.5608 19.0611C16.2795 19.3424 15.8979 19.5004 15.5001 19.5004H9.50012C9.1023 19.5004 8.72077 19.3424 8.43946 19.0611C8.15816 18.7798 8.00012 18.3983 8.00012 18.0004V17.4379C7.99997 17.2086 7.94724 16.9824 7.84599 16.7766C7.74474 16.5709 7.59766 16.3911 7.41606 16.2511C6.43337 15.4857 5.63767 14.5069 5.08916 13.3886C4.54066 12.2703 4.25374 11.0419 4.25012 9.79638C4.22575 5.32825 7.837 1.60732 12.3014 1.50044C13.4014 1.47393 14.4956 1.66774 15.5196 2.07046C16.5436 2.47317 17.4767 3.07666 18.2639 3.8454C19.0512 4.61414 19.6767 5.5326 20.1037 6.54671C20.5306 7.56083 20.7504 8.65011 20.7501 9.75044ZM17.7398 8.87482C17.5453 7.78853 17.0227 6.78791 16.2423 6.00766C15.4619 5.22741 14.4611 4.705 13.3748 4.51075C13.2777 4.49438 13.1783 4.4973 13.0823 4.51934C12.9862 4.54139 12.8955 4.58213 12.8153 4.63924C12.735 4.69634 12.6668 4.7687 12.6145 4.85218C12.5622 4.93566 12.5268 5.02862 12.5104 5.12575C12.4941 5.22289 12.497 5.3223 12.519 5.41831C12.5411 5.51432 12.5818 5.60505 12.6389 5.68531C12.696 5.76558 12.7684 5.83381 12.8519 5.88611C12.9353 5.93841 13.0283 5.97376 13.1254 5.99013C14.6789 6.25169 15.997 7.56982 16.2604 9.12607C16.2901 9.30074 16.3807 9.45927 16.5161 9.57356C16.6515 9.68785 16.8229 9.75051 17.0001 9.75044C17.0425 9.75019 17.0848 9.74674 17.1267 9.74013C17.3227 9.70666 17.4974 9.5967 17.6124 9.43443C17.7274 9.27216 17.7732 9.07087 17.7398 8.87482Z"
                                        fill="#F5BC16" />
                                </svg>
                            </span>
                            You have selected <span id="coveragePlan" style="font-weight: bold;">Auto Excel Plan Premium
                                with Turbo Shield</span> amounting to <span id="coveragePlanPrice"
                                style="font-weight: bold;">P500.00</span>
                        </p>
                    </div>
                    <div class="col-12 web" style="background-color: #F9F7F7; padding: 20px 20px;">
                        <div class="row">
                            <div class="col-6">
                                <p id="planSelectedMob" style="color: #2D2727; font-size:15px; font-weight:500;">With
                                Turbo Shield</p>
                                <p id="planSelectedMobText" style="color: #585858; font-size:12px; font-weight:500;">You
                                    have selected With Turbo Shield plan</p>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn-back" type="button" id="deselect"
                                    style="background-color: #F9F7F7;"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="32" height="32" fill="currentColor"
                                        class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" fill="#ffffff"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                    </svg> Deselect
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 web" style="text-align: center;">
                <div class="row">
                    <div class="col-12 mb-4">
                        <button class="btn-continue" id="withAONMobile" type="button" style="width: 330px;"><svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" fill="#ffffff"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg> Select With Turbo Shield
                        </button>
                    </div>
                    <div class="col-12 mb-4">
                        <button class="btn-back" type="button" id="withoutAONMobile"><svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" fill="#ffffff"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg> Select Without Turbo Shield
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <div class="row popular-mob">
                    <div class="col-lg-6 text-center text-lg-end">
                        <button class="btn-back popular-mob rotatable" id="back"> Back</button>
                    </div>
                    <div class="col-lg-6 text-center text-lg-start">
                        <button class="btn-continue popular-mob" id="apply"> Apply Plan</button>
                    </div>
                </div>
               
               
                <div class="row web bottom-buttons">

                <div class="col-lg-6 mb-3 text-center text-lg-start bottom-buttons-continue">  
                        <button class="btn-continue d-none" type="button" id="applyMobile"> Apply Plan
                        </button>
                    </div>

                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back">  
                        <button class="btn-back" id="backMobile" type="button"> Cancel
                        </button>
                    </div>
                 

                    <!-- <div class="col-12 mb-3">
                        <button class="btn-continue d-none" type="button" id="applyMobile"> Apply Plan
                        </button>
                    </div>
                    <div class="col-12">
                        <button class="btn-back" id="backMobile" type="button">Cancel
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</form>

<script>
    $(document).ready(function () {
        $('#apply').click(function (e) {
            e.preventDefault();
            $("#transaction").val('apply');

            if($("#firstAon").val() === 'default') { 
                $("#compreFormStep2Plan").attr('action',
                "{{ url('/get-quote/auto-excel-plus/car-information')}}");
            } else {
                $("#compreFormStep2Plan").attr('action',
                "{{ url('/get-quote/auto-excel-plus/additional-car-information')}}");
            }

            $("#compreFormStep2Plan").submit();
        });

        $('#formatter').html('₱' + '{{number_format($carInfo->default_value, 2)}}');


        $('#applyMobile').click(function (e) {
            $("#transaction").val('apply');

            if($("#firstAon").val() === 'default') { 
                $("#compreFormStep2Plan").attr('action',
                "{{ url('/get-quote/auto-excel-plus/car-information')}}");
            } else {
                $("#compreFormStep2Plan").attr('action',
                "{{ url('/get-quote/auto-excel-plus/additional-car-information')}}");
            }

            $("#compreFormStep2Plan").submit();
        });

        $('#back').click(function (e) {
            e.preventDefault();
            $("#transaction").val('back');

            $("#compreFormStep2Plan").submit();
        });

        $('#backMobile').click(function (e) {
            e.preventDefault();
            $("#transaction").val('back');

            $("#compreFormStep2Plan").submit();
        });

        if ($("#aon").val() === 'yes') {
            $('#withAON').addClass('d-none');
            $('#withAON').parent().addClass('selected-parent');
            $('#withAON').parent().removeClass('select-coverage');
            $('#withoutAON').parent().removeClass('selected-parent');
            $('#withoutAON').parent().addClass('select-coverage');
            $('#withoutAON').removeClass('d-none');
            $("#aon").val('yes');
            $("#coveragePlanAlert").removeClass('d-none');
            $("#coveragePlan").text('Auto Excel Plan Premium with Turbo Shield');
            $("#coveragePlanPrice").text('₱{{number_format(($carInfo->grossPremWithAOM), 2)}}');
            $("#buttonWithoutAON").addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $(".with-aon-class").addClass('with-aon-class-border');
            $(".without-aon-class").removeClass('without-aon-class-border');

            //mobile
            $("#planSelectedMob").text('With Turbo Shield');
            $("#planSelectedMobText").text('You have selected With Turbo Shield plan');
            $('#withAONMobile').addClass('d-none');
            $('#withoutAONMobile').addClass('d-none');
            $('.web').addClass('d-none');
            $('#applyMobile').removeClass('d-none');
        } else if ($("#aon").val() === 'default') {
            $("#aon").val('default');
            $("#coveragePlanAlert").addClass('d-none');
            $("#planSelectedMob").text('');
            $("#planSelectedMobText").text('');
            $('#withAONMobile').removeClass('d-none');
            $('#withoutAONMobile').removeClass('d-none');
            $('.web').removeClass('d-none');

            //web
            $("#cardWithAON").removeClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $("#coveragePlanAlert").addClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $('.select-coverage').removeClass('d-none');
            $(".without-aon-class").removeClass('without-aon-class-border');
            $(".with-aon-class").removeClass('with-aon-class-border');

        } else {
            $('#withoutAON').addClass('d-none');
            $('#withoutAON').parent().addClass('selected-parent');
            $('#withoutAON').parent().removeClass('select-coverage');
            $('#withAON').parent().removeClass('selected-parent');
            $('#withAON').parent().addClass('select-coverage');
            $('#withAON').removeClass('d-none');
            $("#aon").val('no');
            $("#coveragePlanAlert").removeClass('d-none');
            $("#coveragePlan").text('Auto Excel Plan Premium without Turbo Shield');
            $("#coveragePlanPrice").text('₱{{number_format($carInfo->grossPrem, 2)}}');
            $("#buttonWithoutAON").removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $(".without-aon-class").addClass('without-aon-class-border');
            $(".with-aon-class").removeClass('with-aon-class-border');

            //mobile
            $("#planSelectedMob").text('Without Turbo Shield');
            $("#planSelectedMobText").text('You have selected Without Turbo Shield plan');
            $('#withAONMobile').addClass('d-none');
            $('#withoutAONMobile').addClass('d-none');
            $('.web').addClass('d-none');
            $('#applyMobile').removeClass('d-none');
        }

        $('#withAON').click(function (e) {
            e.preventDefault();
            $(this).addClass('d-none');
            $(this).parent().addClass('selected-parent');
            $(this).parent().removeClass('select-coverage');
            $('#withoutAON').parent().removeClass('selected-parent');
            $('#withoutAON').parent().addClass('select-coverage');
            $('#withoutAON').removeClass('d-none');
            $("#aon").val('yes');
            $("#coveragePlanAlert").removeClass('d-none');
            $("#coveragePlan").text('Auto Excel Plan Premium with Turbo Shield');
            $("#coveragePlanPrice").text('₱{{number_format(($carInfo->grossPremWithAOM), 2)}}');
            $("#buttonWithoutAON").addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $(".with-aon-class").addClass('with-aon-class-border');
            $(".without-aon-class").removeClass('without-aon-class-border');

            //mobile
            $("#planSelectedMob").text('With Turbo Shield');
            $("#planSelectedMobText").text('You have selected With Turbo Shield plan');
            $('#withAONMobile').addClass('d-none');
            $('#withoutAONMobile').addClass('d-none');
            $('.web').addClass('d-none');
            $('#applyMobile').removeClass('d-none');
        });

        $('#withAONMobile').click(function (e) {
            e.preventDefault();
            $(this).addClass('d-none');
            $("#aon").val('yes');
            $("#coveragePlanAlert").removeClass('d-none');
            $("#planSelectedMob").text('With Turbo Shield');
            $("#planSelectedMobText").text('You have selected With Turbo Shield plan');
            $('#withoutAONMobile').addClass('d-none');
            $('.web').addClass('d-none');
            $('#applyMobile').removeClass('d-none');

            //web
            $("#coveragePlan").text('Auto Excel Plan Premium with Turbo Shield');
            $("#coveragePlanPrice").text('₱{{number_format(($carInfo->grossPremWithAOM), 2)}}');
            $('#withAON').addClass('d-none');
            $('#withAON').parent().addClass('selected-parent');
            $('#withAON').parent().removeClass('select-coverage');
            $(".with-aon-class").addClass('with-aon-class-border');
            $(".without-aon-class").removeClass('without-aon-class-border');
            $("#buttonWithoutAON").addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $('#withoutAON').parent().removeClass('selected-parent');
            $('#withoutAON').parent().addClass('select-coverage');
            $('#withoutAON').removeClass('d-none');
        });

        $('#withoutAON').click(function (e) {
            e.preventDefault();
            $(this).addClass('d-none');
            $(this).parent().addClass('selected-parent');
            $(this).parent().removeClass('select-coverage');
            $('#withAON').parent().removeClass('selected-parent');
            $('#withAON').parent().addClass('select-coverage');
            $('#withAON').removeClass('d-none');
            $("#aon").val('no');
            $("#coveragePlanAlert").removeClass('d-none');
            $("#coveragePlan").text('Auto Excel Plan Premium without Turbo Shield');
            $("#coveragePlanPrice").text('₱{{number_format($carInfo->grossPrem, 2)}}');
            $("#buttonWithoutAON").removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $(".without-aon-class").addClass('without-aon-class-border');
            $(".with-aon-class").removeClass('with-aon-class-border');

            //mobile
            $("#planSelectedMob").text('Without AON');
            $("#planSelectedMobText").text('You have selected Without Turbo Shield plan');
            $('#withAONMobile').addClass('d-none');
            $('#withoutAONMobile').addClass('d-none');
            $('.web').addClass('d-none');
            $('#applyMobile').removeClass('d-none');
        });

        $('#withoutAONMobile').click(function (e) {
            e.preventDefault();
            $(this).addClass('d-none');
            $("#aon").val('no');
            $("#coveragePlanAlert").removeClass('d-none');
            $("#planSelectedMob").text('Without AON');
            $("#planSelectedMobText").text('You have selected Without Turbo Shield plan');
            $('#withAONMobile').addClass('d-none');
            $('.web').addClass('d-none');
            $("#coveragePlan").text('Auto Excel Plan Premium without Turbo Shield');
            $("#coveragePlanPrice").text('₱{{number_format($carInfo->grossPrem, 2)}}');
            $('#applyMobile').removeClass('d-none');

            //web
            $('#withoutAON').addClass('d-none');
            $('#withoutAON').parent().addClass('selected-parent');
            $('#withoutAON').parent().removeClass('select-coverage');
            $('#withAON').parent().removeClass('selected-parent');
            $('#withAON').parent().addClass('select-coverage');
            $('#withAON').removeClass('d-none');
            $("#coveragePlan").text('Auto Excel Plan Premium without Turbo Shield');
            $("#coveragePlanPrice").text('P{{number_format($carInfo->grossPrem, 2)}}');
            $("#buttonWithoutAON").removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $(".without-aon-class").addClass('without-aon-class-border');
            $(".with-aon-class").removeClass('with-aon-class-border');
        });

        $('#deselect').click(function (e) {
            e.preventDefault();
            $("#aon").val('default');
            $("#coveragePlanAlert").addClass('d-none');
            $("#planSelectedMob").text('');
            $("#planSelectedMobText").text('');
            $('#withAONMobile').removeClass('d-none');
            $('#withoutAONMobile').removeClass('d-none');
            $('.web').removeClass('d-none');
            $('#applyMobile').addClass('d-none');

            //web
            $('#withAON').removeClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $("#cardWithAON").removeClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $("#coveragePlanAlert").addClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $('.select-coverage').removeClass('d-none');
            $(".without-aon-class").removeClass('without-aon-class-border');
            $(".with-aon-class").removeClass('with-aon-class-border');
        });
    });
</script>
@endsection