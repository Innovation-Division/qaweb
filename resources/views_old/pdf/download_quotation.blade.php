<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
        .table {
          border-top: 0;
          border-collapse: collapse;
          font-family: Helvetica;
        }
        .table td, table th {
          border: 1px solid black;
        }
        .table tr:first-child th {
          border-top: 1;
        }
        .table tr:last-child td {
          border-bottom: 1;
        }
        .table tr td:first-child,
        .table tr th:first-child {
          border-left: 1;
        }
        .table tr td:last-child,
        .table tr th:last-child {
          border-right: 1;
        }
        p{
          font-family: Helvetica;
          font-size: 13px;
        }

        h3{
          font-family: Helvetica;
          text-align: center;
        }

        h2{
          font-family: Helvetica;
        }

        h5{
          margin-bottom: 0px;
          font-family: Helvetica;
        }
        h6{
          margin-bottom: 0px;
          font-family: Helvetica;
        }
        header {
          position: fixed;
          top: -45px;
          left: 0px;
          right: 0px;
          /** Extra personal styles **/
          background-color: #03a9f4;
          color: white;
          text-align: center;
          line-height: auto;
        }

        footer {
          position: fixed; 
          bottom: -45px; 
          left: 0; 
          right: 0px;
          height: 50px; 

          /** Extra personal styles **/
          background-color: #03a9f4;
          color: white;
          text-align: center;
          line-height: 35px;
        }
    </style>
  </head>
  <body>
<style>
    @media (min-width: 992px) {

        aside {
            display: none !important;
        }

        .navbar-expand-lg.navbar-vertical~.navbar,
        .navbar-expand-lg.navbar-vertical~.page-wrapper {
            margin-left: 0 !important;
        }

        .batch-container {
            padding-left: 100px;
            padding-right: 100px;
        }

        .containerView {
            width: 850px;
        }
    }

    @media (max-width: 991px) {
        p {
            font-size: 12px !important;
        }
    }

    p {
        font-weight: 500 !important;
    }

    .batch-button {
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        color: white;
    }

    .batch-secondary {
        background: grey;
        color: #ffffff;
    }

    .batch-button-success {
        background: #008080 !important;
    }

    .batch-button-secondary {
        background: #60B3B3 !important;
    }

    .batch-button>svg>path {
        stroke: #ffffff;
        stroke-width: 1px;
    }

    @page {
        size: auto;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    @media print {
        .pagebreak {
            page-break-before: always;
        }

        .print-div {
            margin-top: -25px;
        }

        /* page-break-after works, as well */
    }
</style>
<div class="container-xl containerView">
    <div class="col-lg-12 mt-4 mb-4 d-print-none">
        <a href="{{url('/quotation')}}"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                viewBox="0 0 24 24" fill="#000000" stroke="#000000" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" fill="#000000" />
                <path d="M6 6l12 12" fill="#000000" />
            </svg></a>
    </div>
    <div class="card card-lg" style="border-radius: 8px; " id="print-div">
        <div class="card-body" style="padding: 2rem !important;">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <img src="./images/COCOGEN LOGO.png" width="110" height="32" alt="Cocogen"
                        class="navbar-brand-image" style="width: 210px; height: 100%">
                </div>
                <div class="col-12 my-2" style="background: #FFF4F9; padding:15px 15px 10px 15px; border-radius: 8px;">
                    <table >
                        <tr>
                             <td style="color: #888888;width: 166"><p style="color: #888888;">Life insured</p></td>
                             <td style="color: #888888;width: 166"> <p style="color: #888888;">Employment</p></td>
                             <td style="color: #888888;width: 166"> <p style="color: #888888;">Employment</p></td>
                        </tr>
                        <tr>
                            <td style="color: #888888;width: 166">
                                <p style="font-weight: bold !important;">{{$first_name}}
                                {{$middle_name}}
                                {{$last_name}}</p>
                            </td>
                            <td style="color: #888888;width: 166">
                                <p style="font-weight: bold !important;">{{$occupation}}</p>
                            </td>
                            <td style="color: #888888;width: 166">
                                <p style="font-weight: bold !important;" class="mb-2">{{$phone_number}}</p>
                                <p style="font-weight: bold !important;">{{$email_address}}</p>
                            </td>
                        </tr>
                    </table>

                    
                   

                </div>
                <div class="col-12 my-3">
                    <h2 style="font-weight: bold;">Vehicle Information</h2>
                </div>
                <table>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Type of Insurance</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Comprehensive</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Location of Vehicle</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">{{$address}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Year</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">{{$year}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Brand</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">{{$brand}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Model</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">{{$model}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Market Value</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($market_value)}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Coverage</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">{{ date("d / m / Y", strtotime($created_at))}} -
                        {{ date("d / m / Y", strtotime('+1 year', strtotime($created_at)))}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                </table>
            
                <hr style="margin-bottom: 10px;border-top: 0px solid;opacity:0.2" >
                <div class="col-12 my-0">
                    <h2 style="font-weight: bold;">Premium Computation</h2>
                </div>
                <hr style="border-top: 0px solid;opacity:0.2">
                <table>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Net Premium</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($net_premium, 2)}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Plus</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Doc Stamps</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($doc_stamps, 2)}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">VAT</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($vat, 2)}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Local Goverment Tax</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($lgt, 2)}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Gross Premium</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($gross_premium, 2)}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                   
                </table>

                <table>
                    <tr>
                        <td colspan="3">
                            <hr style="border-top: 0px solid;opacity:0.2">
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #888888;width: 250"><p style="color: #888888;">Total amount due</p></td>
                        <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($total_amount_due, 2)}}</p></td>
                        <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                    </tr>
                </table>

                <div class="col-12 my-1 pagebreak">
                    <h2 style="font-weight: bold;">Coverage</h2>
                </div>

                <div class="col-12" style="background: #F8F8F8; padding:20px; border-radius: 8px;">
                    <table>
                        <tr>
                            <td style="color: #888888;width: 250"><p style="color: #888888;">Own Damage and theft</p></td>
                            <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($od, 2)}}</p></td>
                            <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                        </tr>
                        <tr>
                            <td style="color: #888888;width: 250"><p style="color: #888888;">Bodily Injury</p></td>
                            <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($bodily_injury, 2)}}</p></td>
                            <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                        </tr>
                        <tr>
                            <td style="color: #888888;width: 250"><p style="color: #888888;">Property Damage</p></td>
                            <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($property_damage, 2)}}</p></td>
                            <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                        </tr>
                        <tr>
                            <td style="color: #888888;width: 250"><p style="color: #888888;">Auto Personal Accident</p></td>
                            <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($pa, 2)}}</p></td>
                            <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                        </tr>
                        <tr>
                            <td style="color: #888888;width: 250"><p style="color: #888888;">Acts of Nature</p></td>
                            <td style="color: #888888;width: 200;text-align:right;"><p style="font-weight: bold !important;" class="mb-2">Php {{number_format($aon_amount, 2)}}</p></td>
                            <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="color: #888888;width: 250"><p style="color: #888888;">Deductible</p></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color: #888888;width: 200;text-align:left;">
                            <p style="font-weight: bold !important;" class="mb-2">Non-standard Accessories (Note all declared accessories not factory installed)</p></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="color: #888888;width: 250"><p style="color: #888888;">Disclaimer</p></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color: #888888;width: 200;text-align:left;">
                            <p style="font-weight: bold !important;">The above quotation is applicable only for the unit describe and shall be valid up to 30
                                days from the date of quotation.</p>
                            <p style="font-weight: bold !important;">Undeclared non-standard accessories will not be covered. For your protection please
                                declare all non-standard accessories, it’s brand/model and purchase price which shall be
                                subject to approval and additional premium shall be changed.</p>    
                            </td>
                            <td style="color: #888888;width: 50;text-align:right;"><p style="font-weight: bold !important;" class="mb-2"></p></td>

                        </tr>
                    </table>

                </div>
                
            </div>
        </div>
    </div>
</div>


</body>
</html>