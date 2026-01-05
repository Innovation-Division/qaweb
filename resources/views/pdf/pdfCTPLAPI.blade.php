<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" type="text/css" href="./asset/webjscss/bootstrap.css">

    <style type="text/css">
        .table {
            border-top: 2;
            border-collapse: collapse;
        }

        .table td,
        table th {
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
    </style>
</head>

<body>

    <table class="table1"
        style="font-family: Helvetica;border: 0;text-align: center;border-bottom: 0px;margin-top: -35px;">
        <tr>
            <td width="430px">
                <img src="./images/ctplpdf1.jpg" style="width: 330px;height: 120px;">
            </td>
            <td>
                <span><strong>"ORIGINAL COPY"</strong></span><br>
                <span style="font-size: 12px">CONFIRMATION OF COVER</span><br>
                <span style="font-size: 12px">NON-LAND TRANSPORTATION OPERATORS</span><br>
                <span style="font-size: 12px">VEHICLE</span><br>
                <span style="font-size: 12px"><strong>AF No. {{ $authNo }} </strong></span><br>
            </td>
        </tr>
    </table>
    <br>
    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
        <tr>
            <td width="320px" style="border-top: 0;border-left: 0;border-right: 0;line-height: 0.8px;">
            </td>
            <td width="170px" style="border-top: 0;border-left: 0;border-right: 0;line-height: 0.8px;">
            </td>
            <td style="display: table-cell; border: 1px solid black;line-height: 0.8px;text-align: center;">
                <span style="text-align: left;font-size: 10px;float: left;line-height: 1px;margin-top:1px"><strong>POLICY
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $txnid }}</span>
            </td>
        </tr>
        <tr>
            <td width="315px" style="border: 1px solid black;text-align: left;" rowspan="4">
                <span style="text-align: left;font-size: 10px;float: left;line-height: 12px;"><strong>NAME AND ADDRESS
                        OF INSURED</strong><br>{{ $name }}<br>{{ $address }}</span>


            </td>
            <td width="170px" style="line-height: 0.8px;text-align: center;">
                <span
                    style="text-align: left;font-size: 10px;float: left;margin-top:2px"><strong>BUSINESS/PROFESSION</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;"></span>
            </td>
            <td style="display: table-cell; border: 1px solid black;line-height: 1px;text-align: center;">
                <span style="text-align: left;font-size: 9px;float: left;line-height: 1px;"><strong>CONFIRMATION OF
                        COVER NO.</strong><br></span>
                <br><br><br><br><br><br><br><br>
                <span
                    style="text-align: center;font-size: 10px;float: center;line-height: 1px;margin-left: 50px;margin-top:3px"><br><br>{{ $cocNO }}</span>

            </td>
        </tr>
        <tr>

            <td width="170px" style="line-height: 0.8px;text-align: center;">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>DATE
                        ISSUED</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: center;margin-top:3px">{{ $dtIssued }}</span>
            </td>
            <td style="display: table-cell; border: 1px solid black;line-height: 1px;">
                <span style="text-align: left;font-size: 10px;margin-top:2px;"><strong>OFFICIAL RECEIPT
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;"></span>
            </td>
        </tr>
        <tr>
            <td width="170px"
                style="line-height: 0.9px;text-align: center;vertical-align: bottom;border: 1px solid black;"
                colspan="2"> <br><br>
                <span style="font-size: 10px"><strong>PERIOD OF INSURANCE</strong></span>
                <br>

            </td>

        </tr>
        <tr>
            <td width="170px" style="line-height: 0.8px;text-align: center;border: 1px solid black;">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>From 12:00
                        Noon</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $dtCreated }}</span>
            </td>
            <td width="150px"
                style="display: table-cell; border: 1px solid black;line-height: 0.8px;text-align: center;">
                <span style="text-align: left;font-size: 10px; float: left;margin-top:1px;"><strong>To 12:00
                        Noon</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $futureDate }}</span>
            </td>
        </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
        <tr>
            <td style="display: table-cell; border-top: 0; border-right: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;line-height: 0.8px;text-align: left;vertical-align: bottom;"
                colspan="5">
                <span style="font-size: 10px;margin-top:1px;"><strong>SCHEDULED VEHICLE</strong></span>
                <br><br>
            </td>

        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="60px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MODEL</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px;">{{$year}}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="120px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MAKE</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $make }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>TYPE OF
                        BODY</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $bodyType }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>COLOR</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">TBA</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;border-right:  1px solid black;line-height: 0.8px;text-align: center;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>BLT FILE
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $mvFIleNo }}</span>
            </td>
        </tr>

        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="60px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>PLATE
                        NO</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $plateNo }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="120px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>SERIAL/CHASSIS
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $chassisNo }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MOTOR
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $engineNO }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>AUTHORIZED
                        CAPACITY</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">-</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;border-right:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>UNLADEN
                        WEIGHT</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">-kgs</span>
            </td>
        </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -20px;">
        <tr>
            <td style="display: table-cell;border-top: 0; border-left:  1px solid black; border-right:  1px solid black; border-bottom:  1px solid black;line-height: 0.8px;text-align: center;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:2px"><strong>SECTION
                        I/II</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;" width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px"><strong>LIMIT OF
                        LIABILITY</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: center;margin-top:1px"><strong>PREMIUMS
                        PAID</strong></span>
                <br><br><br><br>
            </td>
        </tr>
        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="200px" rowspan="2">
                <span style="text-align: left;font-size: 11px;float: left;margin-top:2px"><strong>THIRD PARTY
                        LIABILITY</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;" width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px"><strong>LIMIT OF
                        LIABILITY</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px"><strong>P</strong></span>
                <span
                    style="text-align: left;font-size: 10px;float: right;margin-top:4px"><strong>200,000.00</strong></span>
                <br><br><br><br>
            </td>
        </tr>
        <tr>

            <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;border-right:  1px solid black;border-bottom:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px;"><strong>PREMIUM
                        PAID</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;border-bottom:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px;"><strong>P</strong></span>
                <span
                    style="text-align: left;font-size: 10px;float: right;margin-top:4px;"><strong>{{ $premium }}</strong></span>
                <br><br><br><br>
            </td>
        </tr>
        </tr>
    </table>
    <table class="table"
        style="font-family: Helvetica;margin-top: -20px;border-right:  1px solid black;border-bottom:  1px solid black;">
        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-right:  0px;"
                width="320">
                <p style="line-height: 8px;font-size: 11px;float: left;width: 100%">SUBJECT TO THE SCHEDULE OF
                    INDEMNITIES AT THE BACK HEREOF:</p>
                <p style="line-height: 11px;font-size: 10px;">This Confirmation of Cover is evidence of the policy of
                    insurance required under Chapter VI - Compulsory Motor Vehicle Liability Insurance of the Insurance
                    Code as amended by President Decree No. 1814.</p>
            </td>
            <td style="text-align: center;border-left:  0px">
                <img src="./images/ctplpdf2.png"
                    style="width: 90px;height: 50px;vertical-align: center;float: center;margin-left: 70px;margin-top: -10px;">
                <p style="line-height: 9px;font-size: 10px;margin-top: 15px;">___________________________________</p>
                <p style="line-height: 9px;font-size: 10px;">Authorized Signature</p>
            </td>
        </tr>
    </table>

    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
        <tr>
            <td style="display: table-cell; border: 0px;line-height: 0.8px;text-align: center;" width="320">
                <p style="line-height: 8px;font-size: 11px;float: left;width: 100%">Cocogen Insurance, Inc. </p><br>
                <p style="line-height: 2px;font-size: 9px;">22F One Corporate Center, Doña Julia Vargas Ave., Corner
                    Meralco Ave Ortigas Center, Pasig City 1600 Philippines &#183; MCPO Box No. 1009 &#183; Tel, no:
                    (632) 8811-1788</p>
                <p style="line-height: 2px;font-size: 9px;"> &#183; VAT Reg. TIN 000-432-798-000</p>
                <p style="line-height: 3px;font-size: 10px;float: left;">POL 003-0812-3</p>
            </td>
             </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
        <tr>
            <td style="display: table-cell; border: 0px;line-height: 0.8px;text-align: center;" width="320"
                height="1">
                <p style="line-height: 2px;font-size: 9px;"> - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                </p>

            </td>
            < </tr>
    </table>
    <table class="table1"
        style="font-family: Helvetica;border: 0;text-align: center;border-bottom: 0px;margin-top: -40px;">
        <tr>
            <td width="430px">
                <img src="./images/ctplpdf1.jpg" style="width: 330px;height: 120px;">
            </td>
            <td>
                <span><strong>"ORIGINAL COPY"</strong></span><br>
                <span style="font-size: 12px">CONFIRMATION OF COVER</span><br>
                <span style="font-size: 12px">NON-LAND TRANSPORTATION OPERATORS</span><br>
                <span style="font-size: 12px">VEHICLE</span><br>
                <span style="font-size: 12px"><strong>AF No. {{ $authNo }}</strong></span><br>
            </td>
        </tr>
    </table>
    <br>
    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
        <tr>
            <td width="320px" style="border-top: 0;border-left: 0;border-right: 0;line-height: 0.8px;">
            </td>
            <td width="170px" style="border-top: 0;border-left: 0;border-right: 0;line-height: 0.8px;">
            </td>
            <td style="display: table-cell; border: 1px solid black;line-height: 0.8px;text-align: center;">
                <span style="text-align: left;font-size: 10px;float: left;line-height: 1px;margin-top:1px"><strong>POLICY
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $txnid }}</span>
            </td>
        </tr>
        <tr>
            <td width="315px" style="border: 1px solid black;text-align: left;" rowspan="4">
                <span style="text-align: left;font-size: 10px;float: left;line-height: 12px;"><strong>NAME AND ADDRESS
                        OF INSURED</strong><br>{{ $name }}<br>{{ $address }}</span>


            </td>
            <td width="170px" style="line-height: 0.8px;text-align: center;">
                <span
                    style="text-align: left;font-size: 10px;float: left;margin-top:2px"><strong>BUSINESS/PROFESSION</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;"></span>
            </td>
            <td style="display: table-cell; border: 1px solid black;line-height: 1px;text-align: center;">
                <span style="text-align: left;font-size: 9px;float: left;line-height: 1px;"><strong>CONFIRMATION OF
                        COVER NO.</strong><br></span>
                <br><br><br><br><br><br><br><br>
                <span
                    style="text-align: center;font-size: 10px;float: center;line-height: 1px;margin-left: 50px;margin-top:3px"><br><br>{{ $cocNO }}</span>

            </td>
        </tr>
        <tr>

            <td width="170px" style="line-height: 0.8px;text-align: center;">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>DATE
                        ISSUED</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: center;margin-top:3px">{{ $dtIssued }}</span>
            </td>
            <td style="display: table-cell; border: 1px solid black;line-height: 1px;">
                <span style="text-align: left;font-size: 10px;margin-top:2px;"><strong>OFFICIAL RECEIPT
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;"></span>
            </td>
        </tr>
        <tr>
            <td width="170px"
                style="line-height: 0.9px;text-align: center;vertical-align: bottom;border: 1px solid black;"
                colspan="2"> <br><br>
                <span style="font-size: 10px"><strong>PERIOD OF INSURANCE</strong></span>
                <br>

            </td>

        </tr>
        <tr>
            <td width="170px" style="line-height: 0.8px;text-align: center;border: 1px solid black;">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>From 12:00
                        Noon</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $dtCreated }}</span>
            </td>
            <td width="150px"
                style="display: table-cell; border: 1px solid black;line-height: 0.8px;text-align: center;">
                <span style="text-align: left;font-size: 10px; float: left;margin-top:1px;"><strong>To 12:00
                        Noon</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $futureDate }}</span>
            </td>
        </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
        <tr>
            <td style="display: table-cell; border-top: 0; border-right: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;line-height: 0.8px;text-align: left;vertical-align: bottom;"
                colspan="5">
                <span style="font-size: 10px;margin-top:1px;"><strong>SCHEDULED VEHICLE</strong></span>
                <br><br>
            </td>

        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="60px">
                <span
                    style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MODEL</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px;">{{$year}}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="120px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MAKE</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $make }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>TYPE OF
                        BODY</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $bodyType }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="100px">
                <span
                    style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>COLOR</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">TBA</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;border-right:  1px solid black;line-height: 0.8px;text-align: center;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>BLT FILE
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $mvFIleNo }}</span>
            </td>
        </tr>

        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="60px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>PLATE
                        NO</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $plateNo }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="120px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>SERIAL/CHASSIS
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $chassisNo }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MOTOR
                        NO.</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">{{ $engineNO }}</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>AUTHORIZED
                        CAPACITY</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">-</span>
            </td>
            <td style="display: table-cell; border-left:  1px solid black;border-right:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
                width="100px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>UNLADEN
                        WEIGHT</strong></span>
                <br><br><br><br><br><br><br><br><br><br> <br><br><br>
                <span style="font-size: 10px;margin-top:2px">-kgs</span>
            </td>
        </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -20px;">
        <tr>
            <td style="display: table-cell;border-top: 0; border-left:  1px solid black; border-right:  1px solid black; border-bottom:  1px solid black;line-height: 0.8px;text-align: center;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:2px"><strong>SECTION
                        I/II</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;" width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:1px"><strong>LIMIT OF
                        LIABILITY</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: center;margin-top:1px"><strong>PREMIUMS
                        PAID</strong></span>
                <br><br><br><br>
            </td>
        </tr>
        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
                width="200px" rowspan="2">
                <span style="text-align: left;font-size: 11px;float: left;margin-top:2px"><strong>THIRD PARTY
                        LIABILITY</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;" width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px"><strong>LIMIT OF
                        LIABILITY</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px"><strong>P</strong></span>
                <span
                    style="text-align: left;font-size: 10px;float: right;margin-top:4px"><strong>200,000.00</strong></span>
                <br><br><br><br>
            </td>
        </tr>
        <tr>

            <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;border-right:  1px solid black;border-bottom:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px;"><strong>PREMIUM
                        PAID</strong></span>
                <br><br><br><br>
            </td>
            <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;border-bottom:  1px solid black;"
                width="200px">
                <span style="text-align: left;font-size: 10px;float: left;margin-top:4px;"><strong>P</strong></span>
                <span
                    style="text-align: left;font-size: 10px;float: right;margin-top:4px;"><strong>{{ $premium }}</strong></span>
                <br><br><br><br>
            </td>
        </tr>
        </tr>
    </table>
    <table class="table"
        style="font-family: Helvetica;margin-top: -20px;border-right:  1px solid black;border-bottom:  1px solid black;">
        <tr>
            <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-right:  0px;"
                width="320">
                <p style="line-height: 8px;font-size: 11px;float: left;width: 100%">SUBJECT TO THE SCHEDULE OF
                    INDEMNITIES AT THE BACK HEREOF:</p><br>
                <p style="line-height: 11px;font-size: 10px;">This Confirmation of Cover is evidence of the policy of
                    insurance required under Chapter VI - Compulsory Motor Vehicle Liability Insurance of the Insurance
                    Code as amended by President Decree No. 1814.</p>
            </td>
            <td style="text-align: center;border-left:  0px">
                <img src="./images/ctplpdf2.png"
                    style="width: 90px;height: 50px;vertical-align: center;float: center;margin-left: 70px;margin-top: -10px;">
                <p style="line-height: 9px;font-size: 10px;margin-top: 15px;">___________________________________</p>
                <p style="line-height: 9px;font-size: 10px;">Authorized Signature</p>
            </td>
        </tr>
    </table>



    <table class="table" style="font-family: Helvetica;margin-top: -25px;margin-bottom: -20px;">
        <tr>
            <td style="display: table-cell; border: 0px;line-height: 0.8px;text-align: center;" width="320">
                <p style="line-height: 8px;font-size: 11px;float: left;width: 100%">Cocogen Insurance, Inc. </p>
                <p style="line-height: 2px;font-size: 9px;">22F One Corporate Center, Doña Julia Vargas Ave., Corner
                    Meralco Ave Ortigas Center, Pasig City 1600 Philippines &#183; MCPO Box No. 1009 &#183; Tel, no:
                    (632) 8811-1788</p>
                <p style="line-height: 2px;font-size: 9px;"> &#183; VAT Reg. TIN 000-432-798-000</p>
                <p style="line-height: 2px;font-size: 10px;float: left;">POL 003-0812-3</p>
            </td>
             </tr>
    </table>


    <table class="table1"
        style="font-family: Helvetica;border: 0;text-align: center;border-bottom: 0px;margin-top: -110px;">
        <tr>
            <td width="430px">
                <img src="./images/ctplpdf1.jpg" style="width: 330px;height: 120px;">
            </td>
            <td>
                <span><strong>"ORIGINAL COPY"</strong></span><br>
                <span style="font-size: 12px">CONFIRMATION OF COVER</span><br>
                <span style="font-size: 12px">NON-LAND TRANSPORTATION OPERATORS</span><br>
                <span style="font-size: 12px">VEHICLE</span><br>
                <span style="font-size: 12px"><strong>AF No. {{ $authNo }}</strong></span><br>
            </td>
        </tr>
    </table>
    <br>
    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
      <tr>
          <td width="320px" style="border-top: 0;border-left: 0;border-right: 0;line-height: 0.8px;">
          </td>
          <td width="170px" style="border-top: 0;border-left: 0;border-right: 0;line-height: 0.8px;">
          </td>
          <td style="display: table-cell; border: 1px solid black;line-height: 0.8px;text-align: center;">
              <span style="text-align: left;font-size: 10px;float: left;line-height: 1px;margin-top:1px"><strong>POLICY
                      NO.</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $txnid }}</span>
          </td>
      </tr>
      <tr>
          <td width="315px" style="border: 1px solid black;text-align: left;" rowspan="4">
              <span style="text-align: left;font-size: 10px;float: left;line-height: 12px;"><strong>NAME AND ADDRESS
                      OF INSURED</strong><br>{{ $name }}<br>{{ $address }}</span>


          </td>
          <td width="170px" style="line-height: 0.8px;text-align: center;">
              <span
                  style="text-align: left;font-size: 10px;float: left;margin-top:2px"><strong>BUSINESS/PROFESSION</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px; text-align: right;"></span>
          </td>
          <td style="display: table-cell; border: 1px solid black;line-height: 1px;text-align: center;">
              <span style="text-align: left;font-size: 9px;float: left;line-height: 1px;"><strong>CONFIRMATION OF
                      COVER NO.</strong><br></span>
              <br><br><br><br><br><br><br><br>
              <span
                  style="text-align: center;font-size: 10px;float: center;line-height: 1px;margin-left: 50px;margin-top:3px"><br><br>{{ $cocNO }}</span>

          </td>
      </tr>
      <tr>

          <td width="170px" style="line-height: 0.8px;text-align: center;">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>DATE
                      ISSUED</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px; text-align: center;margin-top:3px">{{ $dtIssued }}</span>
          </td>
          <td style="display: table-cell; border: 1px solid black;line-height: 1px;">
              <span style="text-align: left;font-size: 10px;margin-top:2px;"><strong>OFFICIAL RECEIPT
                      NO.</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px; text-align: right;"></span>
          </td>
      </tr>
      <tr>
          <td width="170px"
              style="line-height: 0.9px;text-align: center;vertical-align: bottom;border: 1px solid black;"
              colspan="2"> <br><br>
              <span style="font-size: 10px"><strong>PERIOD OF INSURANCE</strong></span>
              <br>

          </td>

      </tr>
      <tr>
          <td width="170px" style="line-height: 0.8px;text-align: center;border: 1px solid black;">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>From 12:00
                      Noon</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $dtCreated }}</span>
          </td>
          <td width="150px"
              style="display: table-cell; border: 1px solid black;line-height: 0.8px;text-align: center;">
              <span style="text-align: left;font-size: 10px; float: left;margin-top:1px;"><strong>To 12:00
                      Noon</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px; text-align: right;margin-top:2px">{{ $futureDate }}</span>
          </td>
      </tr>
  </table>
  <table class="table" style="font-family: Helvetica;margin-top: -19px;">
      <tr>
          <td style="display: table-cell; border-top: 0; border-right: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;line-height: 0.8px;text-align: left;vertical-align: bottom;"
              colspan="5">
              <span style="font-size: 10px;margin-top:1px;"><strong>SCHEDULED VEHICLE</strong></span>
              <br><br>
          </td>

      <tr>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
              width="60px">
              <span
                  style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MODEL</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px;">{{$year}}</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
              width="120px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MAKE</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">{{ $make }}</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
              width="100px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>TYPE OF
                      BODY</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">{{ $bodyType }}</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
              width="100px">
              <span
                  style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>COLOR</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">TBA</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;border-right:  1px solid black;line-height: 0.8px;text-align: center;"
              width="100px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>BLT FILE
                      NO.</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">{{ $mvFIleNo }}</span>
          </td>
      </tr>

      <tr>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
              width="60px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>PLATE
                      NO</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">{{ $plateNo }}</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
              width="120px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>SERIAL/CHASSIS
                      NO.</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">{{ $chassisNo }}</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
              width="100px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>MOTOR
                      NO.</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">{{ $engineNO }}</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
              width="100px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>AUTHORIZED
                      CAPACITY</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">-</span>
          </td>
          <td style="display: table-cell; border-left:  1px solid black;border-right:  1px solid black;line-height: 0.8px;text-align: center;border-bottom:  1px solid black;"
              width="100px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px;"><strong>UNLADEN
                      WEIGHT</strong></span>
              <br><br><br><br><br><br><br><br><br><br> <br><br><br>
              <span style="font-size: 10px;margin-top:2px">-kgs</span>
          </td>
      </tr>
  </table>
  <table class="table" style="font-family: Helvetica;margin-top: -20px;">
      <tr>
          <td style="display: table-cell;border-top: 0; border-left:  1px solid black; border-right:  1px solid black; border-bottom:  1px solid black;line-height: 0.8px;text-align: center;"
              width="200px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:2px"><strong>SECTION
                      I/II</strong></span>
              <br><br><br><br>
          </td>
          <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;" width="200px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:1px"><strong>LIMIT OF
                      LIABILITY</strong></span>
              <br><br><br><br>
          </td>
          <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;"
              width="200px">
              <span style="text-align: left;font-size: 10px;float: center;margin-top:1px"><strong>PREMIUMS
                      PAID</strong></span>
              <br><br><br><br>
          </td>
      </tr>
      <tr>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;"
              width="200px" rowspan="2">
              <span style="text-align: left;font-size: 11px;float: left;margin-top:2px"><strong>THIRD PARTY
                      LIABILITY</strong></span>
              <br><br><br><br>
          </td>
          <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;" width="200px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:4px"><strong>LIMIT OF
                      LIABILITY</strong></span>
              <br><br><br><br>
          </td>
          <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;"
              width="200px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:4px"><strong>P</strong></span>
              <span
                  style="text-align: left;font-size: 10px;float: right;margin-top:4px"><strong>200,000.00</strong></span>
              <br><br><br><br>
          </td>
      </tr>
      <tr>

          <td style="display: table-cell; border-right: 0px;line-height: 0.8px;text-align: center;border-right:  1px solid black;border-bottom:  1px solid black;"
              width="200px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:4px;"><strong>PREMIUM
                      PAID</strong></span>
              <br><br><br><br>
          </td>
          <td style="display: table-cell; border-left:  0;line-height: 0.8px;text-align: center;border-right:  1px solid black;border-bottom:  1px solid black;"
              width="200px">
              <span style="text-align: left;font-size: 10px;float: left;margin-top:4px;"><strong>P</strong></span>
              <span
                  style="text-align: left;font-size: 10px;float: right;margin-top:4px;"><strong>{{ $premium }}</strong></span>
              <br><br><br><br>
          </td>
      </tr>
      </tr>
  </table>
  <table class="table"
      style="font-family: Helvetica;margin-top: -20px;border-right:  1px solid black;border-bottom:  1px solid black;">
      <tr>
          <td style="display: table-cell; border-left:  1px solid black;line-height: 0.8px;text-align: center;border-right:  0px;"
              width="320">
              <p style="line-height: 8px;font-size: 11px;float: left;width: 100%">SUBJECT TO THE SCHEDULE OF
                  INDEMNITIES AT THE BACK HEREOF:</p><br>
              <p style="line-height: 11px;font-size: 10px;">This Confirmation of Cover is evidence of the policy of
                  insurance required under Chapter VI - Compulsory Motor Vehicle Liability Insurance of the Insurance
                  Code as amended by President Decree No. 1814.</p>
          </td>
          <td style="text-align: center;border-left:  0px">
              <img src="./images/ctplpdf2.png"
                  style="width: 90px;height: 50px;vertical-align: center;float: center;margin-left: 70px;margin-top: -10px;">
              <p style="line-height: 9px;font-size: 10px;margin-top: 15px;">___________________________________</p>
              <p style="line-height: 9px;font-size: 10px;">Authorized Signature</p>
          </td>
      </tr>
  </table>
    <table class="table" style="font-family: Helvetica;margin-top: -19px;">
        <tr>
            <td style="display: table-cell; border: 0px;line-height: 0.8px;text-align: center;" width="320">
                <p style="line-height: 8px;font-size: 11px;float: left;width: 100%">Cocogen Insurance, Inc. </p><br>
                <p style="line-height: 2px;font-size: 9px;">22F One Corporate Center, Doña Julia Vargas Ave., Corner
                    Meralco Ave Ortigas Center, Pasig City 1600 Philippines &#183; MCPO Box No. 1009 &#183; Tel, no:
                    (632) 8811-1788</p>
                <p style="line-height: 2px;font-size: 9px;"> &#183; VAT Reg. TIN 000-432-798-000</p>
                <p style="line-height: 3px;font-size: 10px;float: left;">POL 003-0812-3</p>
            </td>
             </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -20px;">
        <tr>
            <td style="display: table-cell; border: 0px;line-height: 0.8px;text-align: center;" width="320"
                height="1">
                <p style="line-height: 2px;font-size: 9px;"> - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                </p>

            </td>
             </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -40px;">
        <tr>
            <td style="display: table-cell; border: 0px;line-height: 0.8px;text-align: center;" width="320">
                <p style="line-height: 8px;font-size: 11px;float: left;width: 100%">SCHEDULE OF INDEMNITIES FOR BODILY
                    INJURY AND/OR DEATH</p><br>
                <p style="line-height: 9px;font-size: 9px;">The following of indemnities shall be observed in the
                    settlement of claims for death, bodily injuries, professional fees and hospital charges for services
                    rendered to traffic accident victims under the Compulsory Motor Vehicle Liability Insurance Policy
                </p>
            </td>
            </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -25px;font-size: 9px;line-height: 2px;border-left:  1px solid black !important;border-right:  1px solid black !important;border-bottom:  0px solid black !important;border-top:  1px solid black !important;">
        <tr>
            <td style="display: table-cell; line-height: 0.8px;text-align: left;border: 0px;margin-top:10px"
                width="80">
                <p style="line-height: 1px;font-size: 10px;margin-top:2px"></p></p>
            </td>
            <td style="text-align: center;border-left:  0px;border: 0px;margin-top:10px;"
                width="80">
            </td>
            <td style="text-align: right;border: 0px;margin-top:10px"
                width="50">
                <p style="line-height: 1px;font-size: 10px;margin-top:2px;"></p>
            </td>
            <td style="text-align: left;border: 0px;margin-top:10px;"
                width="80" colspan="2">
                <p style="line-height: 1px;font-size: 10px;margin-top:2px"></p>
                <p style="line-height: 2px;font-size: 10px;"></p>
            </td>
        </tr>
       
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -50px;font-size: 9px;line-height: 2px;border-left:  1px solid black !important;border-right:  1px solid black !important;border-bottom:  0px solid black !important;border-top:  0px solid black !important;">
        <tr>
            <td style="display: table-cell; line-height: 0.8px;text-align: left;border: 0px;margin-top:10px"
                width="80">
                <p style="line-height: 1px;font-size: 10px;margin-top:2px">A. DEATH INDEMNITY</p>
                <p style="line-height: 2px;font-size: 10px;margin-left: 13px;width:200px">Burial and funeral expenses</p>
            </td>
            <td style="text-align: center;border-left:  0px;border: 0px;margin-top:10px;"
                width="80">
            </td>
            <td style="text-align: right;border: 0px;margin-top:10px"
                width="50">
                <p style="line-height: 1px;font-size: 10px;margin-top:2px;">Ps 200,000.00</p>
            </td>
            <td style="text-align: left;border: 0px;margin-top:10px;"
                width="80" colspan="2">
                <p style="line-height: 1px;font-size: 10px;margin-top:2px">B. PERMANENT DISABLEMENT</p>
                <p style="line-height: 2px;font-size: 10px;">Loss of or Loss Use of:</p>
            </td>
        </tr>
       
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -38px;font-size: 9px;line-height: 2px;border-left:  1px solid black !important;border-right:  1px solid black !important;border-bottom:  0px solid black !important;border-top:  0px solid black !important;">
       
        <tr>
            <td style="display: table-cell; line-height: 0.8px;text-align: left;border: 0px;width:150px" colspan="2">
               <p style="line-height: 1;font-size: 10px;margin-left:0px;">B. BODILY INJURIES AND FRACTURES</p>
           </td>
           <td style="text-align: center;border: 0px;width:130px">
               <p style="line-height: 1;font-size: 10px;"></p>
           </td>
           <td style="text-align: left;border: 0px;line-height: 1;width:150px"  colspan="1">
               <p style="line-height: 1;font-size: 10px;margin-left:-5px;margin-top:-1px">Two Limbs</p>
           </td>
           <td style="text-align: left;border: 0px;line-height: 1;width:40px" colspan="1">
               <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-1px">50,000.00</p>
        </td>
       </tr>
    </table>
    
    <table class="table" style="font-family: Helvetica;margin-top: -45px;font-size: 9px;line-height: 2px;margin-bottom: -20px;border-left:  1px solid black !important;border-right:  1px solid black !important;border-bottom:  0px solid black !important;border-top:  0px solid black !important;">
        <tr>
             <td style="display: table-cell; line-height: 0.8px;text-align: left;border: 0px;width:150px">
                <p style="line-height: 1;font-size: 10px;margin-left:12px;">Type of Accommodation or Professional Attendance Extended</p>
            </td>
            <td style="text-align: center;border-left:  0px;border: 0px;width:130px" >
                <p style="line-height: 1;font-size: 10px;text-align: center;">Service Rendered</p>
            </td>
            <td style="text-align: center;border: 0px;width:130px">
                <p style="line-height: 1;font-size: 10px;">Maximum Reimbursable Fees and / or Charges</p>
            </td>
            <td style="text-align: left;border: 0px;line-height: 1;width:150px"  colspan="1">
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-1px">Both hands or all fingers and both</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px">Both Feet</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px">One hand and one foot</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px">Sight of both Eyes</p>

            </td>
            <td style="text-align: left;border: 0px;line-height: 1;width:40px" colspan="1">
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-1px">50,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">50,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">50,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">50,000.00</p>
         </td>
        </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -25px;font-size: 9px;line-height: 2px;margin-bottom: -20px;border-left:  1px solid black !important;border-right:  1px solid black !important;border-bottom:  0px solid black !important;border-top:  0px solid black !important;">
        <tr>
             <td style="display: table-cell; line-height: 0.8px;text-align: left;border: 0px;width:150px">
                <p style="line-height: 1;font-size: 10px;margin-left:12px;">1. Hospital Rooms</p>
            </td>
            <td style="text-align: center;border-left:  0px;border: 0px;width:130px" >
                <p style="line-height: 1;font-size: 10px;text-align: center;">Maximum if 45 days per
                    accident Laboratory</p>
            </td>
            <td style="text-align: center;border: 0px;width:120px">
                <p style="line-height: 1;font-size: 10px;">Ps 500.00/day</p>
            </td>
            <td style="text-align: left;border: 0px;line-height: 1;width:160px"  colspan="1">
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:0px">Injuries resulting in being</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px">Any other injury causing permanent</p>
            </td>
            <td style="text-align: left;border: 0px;line-height: 1;width:50px" colspan="1">
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:0px">50,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">50,000.00</p>
         </td>
        </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -25px;font-size: 9px;line-height: 2px;margin-bottom: -20px;border-left:  1px solid black !important;border-right:  1px solid black !important;border-bottom:  0px solid black !important;border-top:  0px solid black !important;">
        <tr>
             <td style="display: table-cell; line-height: 0.8px;text-align: left;border: 0px;width:150px">
                <p style="line-height: 1;font-size: 10px;margin-left:12px;"></p>
                <p style="line-height: 1;font-size: 10px;margin-left:12px;margin-top:-8px">2. Surgical Expenses</p>
                <p style="line-height: 1;font-size: 10px;margin-left:12px;margin-top:30px">3. Anaesthesiologist's Fee</p>
                <p style="line-height: 1;font-size: 10px;margin-left:12px;margin-top:25px">4. Operating Room</p>
                <p style="line-height: 1;font-size: 10px;margin-left:12px;margin-top:25px"> 5. Medical Expenses</p>
            </td>
            <td style="text-align: left;border-left:  0px;border: 0px;width:130px" >
                <p style="line-height: 1;font-size: 10px;text-align: left;padding-left:12px;margin-top:-8px">X-rays</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Major Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Medium Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Minor Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Major Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Medium Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Minor Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Major Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Medium Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Minor Operation</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">For daily visit of</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:22px">Practitioner or
                    Specialist</p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:22px">The
                    total amount of medical expenses must ( For a single period of confinement)</p>
                
      
            </td>
            <td style="text-align: center;border: 0px;width:120px">
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">2,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">7,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">5,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">1,500.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">2,500.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">2,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">500.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">1,500.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">1,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">500.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:18px">400.00/</p>
                <p style="line-height: 1;font-size: 10px;margin-top:-8px">5,000.00</p>
            </td>
            <td style="text-align: left;border: 0px;line-height: 1;width:160px"  colspan="1">
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top: 0px;">Arm at or above elbow</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px">Arm between elbow and wrist</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">Hand</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px">Four fingers and thumb of one hand</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">Four fingers</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">Leg at or above knee</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">Leg below knee</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">One foot</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">All toes of one foot</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">Thumb</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">Index Finger</p>
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top:-8px;">Sight of one eye</p>
                <p style="line-height: 1;font-size: 10px;margin-left:10px;margin-top:-8px;">Hearing - Both Ears</p>
                <p style="line-height: 1;font-size: 10px;margin-left:10px;margin-top:-8px;">Hearing - One Ear</p>


            </td>
            <td style="text-align: left;border: 0px;line-height: 1;width:40px" colspan="1">
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:0px">20,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">15,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">15,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">15,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">12,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">20,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">15,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">15,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">10,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">&nbsp;8,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">&nbsp;6,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">20,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">30,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-left:11px;margin-top:-8px">15,000.00</p>
         </td>
        </tr>
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: -25px;font-size: 9px;line-height: 2px;margin-bottom: -20px;border-left:  1px solid black !important;border-right:  1px solid black !important;border-bottom:  1px solid black !important;border-top:  0px solid black !important;">
        <tr>
             <td style="display: table-cell; line-height: 0.8px;text-align: left;border: 0px;width:150px">
                <p style="line-height: 1;font-size: 10px;margin-left:12px;margin-top:0px"> 6. Drugs and Medicine</p>
                <p style="line-height: 1;font-size: 10px;margin-left:12px;margin-top:13px"> 7. Ambulance</p>
            </td>
            <td style="text-align: left;border-left:  0px;border: 0px;width:130px" >
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:0px;padding-left:12px">Actual value of drugs and
                    medicine uses but not to </p>
                <p style="line-height: 1;font-size: 10px;text-align: left;margin-top:-8px;padding-left:12px">Actual amount charge for ambulance transport but not to exceed </p>
      
            </td>
            <td style="text-align: center;border: 0px;width:120px">
                <p style="line-height: 1;font-size: 10px;margin-top:0px">20,000.00</p>
                <p style="line-height: 1;font-size: 10px;margin-top:7px">1,500.00</p>



            </td>
            <td style="text-align: left;border: 0px;line-height: 1;width:160px"  colspan="2">
                <p style="line-height: 1;font-size: 10px;margin-left:0px;margin-top: 0px;">D. The Company will pay all pertinent and
                    reasonable expenses incurred in connection with the accident not provided under this Schedule of
                    Indemnities (A), (B) and (C) subject to a maximum amount of Php10,000.00 but in no case shall the
                    company’s aggregate payment exceed the overall Limits of Liability under Sections I and II</p>


            </td>
           
        </tr>
    </table>
    {{-- <table class="table" style="font-family: Helvetica;margin-top: -35px;font-size: 9px;line-height: 2px;margin-bottom: 10px;">
       
        <tr>
            <td style="border:  1px solid black; border-top:0px; border-bottom:0px;"
                width="80" colspan="5">
                <p style="line-height: 1px;font-size: 10px;border-top: 0px;">B. BODILY INJURIES AND FRACTURES</p>
            </td>
        </tr>
        <tr>
            <td style="border-left:  1px solid black;line-height: 0.8px;text-align: left;border-right:  0px;border-top: 0px;margin-top: -100px;border-bottom: 0px;"
                width="80">
                <p style="line-height: 11px;font-size: 10px;border-top: 0px;vertical-align: center;margin-left: 13px;">
                    Type of Accommodation or Professional Attendance Extended</p>
                <p
                    style="line-height: 12px;font-size: 10px;border-top: 0px;vertical-align: center;margin-left: 13px;margin-top: 12px;">
                    1. Hospital Rooms</p>
                <p
                    style="line-height: 25px;font-size: 10px;border-top: 0px;vertical-align: center;margin-left: 13px;margin-top: 13px;">
                    2. Surgical Expenses</p>
                <p
                    style="line-height: 20px;font-size: 10px;border-top: 0px;vertical-align: center;margin-left: 13px;margin-top: 13px;">
                    3. Anaesthesiologist's Fee</p>
                <p
                    style="line-height: 25px;font-size: 10px;border-top: 0px;vertical-align: center;margin-left: 13px;margin-top: 13px;">
                    4. Operating Room</p>
                <p
                    style="line-height: 20px;font-size: 10px;border-top: 0px;vertical-align: center;margin-left: 13px;margin-top: 13px;">
                    5. Medical Expenses</p>

            </td>
            <td style="text-align: left;border-left:  0px;border-right:  0px;border-top:  0px solid black;vertical-align: center;border-bottom: 0px;"
                width="80">
                <p style="line-height: 8px;font-size: 10px;border-top: 0px;margin-bottom: 25px">Service Rendered</p>
                <p style="line-height: 10px;font-size: 10px;border-top: 0px;"></p>
                <p style="line-height: 9px;font-size: 10px;border-top: 0px;margin-top: 10px;">Maximum if 45days per
                    accident Laboratory</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">X-rays</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Major Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Medium Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Minor Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Major Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Medium Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Minor Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Major Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Medium Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">Minor Operation</p>
                <p style="line-height: 2px;font-size: 10px;border-top: 0px;">For daily visit of</p>
                <p style="line-height: 9px;font-size: 10px;border-top: 0px;margin-left: 10px;">Practitioner or
                    Specialist</p>
                <p style="line-height: 9px;font-size: 10px;border-top: 0px;margin-left: 10px;margin-top: -8px;">The
                    total amount of medical expenses must ( For a single period of confinement)</p>

            </td>
            <td style="text-align: right;border-left:  0px;border-right:  0px;border-top: 0px;vertical-align: top;margin-top: -25px;border-bottom: 0px;"
                width="50">
                <p style="line-height: 9px;font-size: 10px;">Maximum Reimbursable Fees and / or Charges</p>
                <p style="line-height: 3px;font-size: 10px;">Ps 500.00/day</p>
                <p style="line-height: 12px;font-size: 10px;margin-top: 10px;">2,000.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px;">7,500.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">5,000.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">1,500.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">2,500.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">2,000.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">500.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">1,500.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">1,000.00</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">500.00</p>
                <p style="line-height: 10px;font-size: 10px;margin-top: 15px">400.00/</p>
                <p style="line-height: 1px;font-size: 10px;margin-top: 11px">5,000.00</p>

            </td>
            <td style="text-align: left;border-left:  0px;border-top: 0px;border-right: 0px;border-bottom: 0px;"
                width="80">
                <p style="line-height: 1px;font-size: 10px;">Two Limbs</p>
                <p style="line-height: 9px;font-size: 10px;">Both hands or all fingers and both</p>
                <p style="line-height: 1px;font-size: 10px;">Both Feet</p>
                <p style="line-height: 1px;font-size: 10px;">One hand and one foot</p>
                <p style="line-height: 1px;font-size: 10px;">Sight of both Eyes</p>
                <p style="line-height: 9px;font-size: 10px;">Injuries resulting in being</p>
                <p style="line-height: 9px;font-size: 10px;">Any other injury causing permanent</p>
                <p style="line-height: 1px;font-size: 10px;">Arm at or above elbow</p>
                <p style="line-height: 9px;font-size: 10px;">Arm between elbow and wrist</p>
                <p style="line-height: 1px;font-size: 10px;">Hand</p>
                <p style="line-height: 9px;font-size: 10px;margin-top: -10px;">Four fingers and thumb of one hand</p>
                <p style="line-height: 1px;font-size: 10px;">Four fingers</p>
                <p style="line-height: 1px;font-size: 10px;">Leg at or above knee</p>
                <p style="line-height: 1px;font-size: 10px;">Leg below knee</p>
                <p style="line-height: 1px;font-size: 10px;">One foot</p>
                <p style="line-height: 1px;font-size: 10px;">All toes of one foot</p>
                <p style="line-height: 1px;font-size: 10px;">Thumb</p>
                <p style="line-height: 1px;font-size: 10px;">Index Finger</p>
                <p style="line-height: 1px;font-size: 10px;">Sight of one eye</p>
                <p style="line-height: 1px;font-size: 10px;margin-left: 5px;">Hearing - Both Ears</p>
                <p style="line-height: 1px;font-size: 10px;margin-left: 5px;">Hearing - One Ear</p>

            </td>
            <td style="text-align: left;border-left:  0px;border-top: 0px;border-bottom: 0px;border-right:  1px solid black;">
                <p style="line-height: 1px;font-size: 10px;">50,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">50,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">50,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">50,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">50,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">50,000.00</p>

                <p style="line-height: 9px;font-size: 10px;">50,000.00</p>
                <p style="line-height: 9px;font-size: 10px;">20,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">15,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">15,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">15,000.00</p>
                <p style="line-height: 9px;font-size: 10px;">12,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">20,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">15,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">15,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">10,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">&nbsp;8,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">&nbsp;6,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">20,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">30,000.00</p>
                <p style="line-height: 1px;font-size: 10px;">15,000.00</p>
            </td>
        </tr>
        
    </table>
    <table class="table" style="font-family: Helvetica;margin-top: 20px;margin-bottom: -20px;">
      <tr >
          <td style="border-left:  1px solid black;border-bottom:  1px solid black;line-height: 0.8px;text-align: left;border-right:  0px;border-top: 0px;margin-top: -35px;"
              width="80">

              <p
                  style="line-height: 9px;font-size: 10px;border-top: 0px;vertical-align: center;margin-left: 13px;margin-top: -30px;">
                  6. Drugs and Medicine <br><br>7. Ambulance</p>

          </td>
          <td style="text-align: left;border-left:  0px;border-right:  0px;border-top:  0px solid black;border-bottom:  1px solid black;vertical-align: center;"
              width="80">

              <p style="line-height: 9px;font-size: 10px;border-top: 0px;margin-top: -40px">Actual value of drugs and
                  medicine uses but not to <br>Actual amount charge for ambulance transport but not to exceed </p>

          </td>
          <td style="text-align: right;border-left:  0px;border-right:  0px;border-top: 0px;vertical-align: top;margin-top: 0px;border-bottom:  1px solid black;"
              width="50">

              <p style="line-height: 8px;font-size: 10px;margin-top: -32px">20,000.00 <br><br>1,500.00</p>
          </td>
          <td style="text-align: left;display: table-cell;border-right:  1px solid black;border-top: 0px;border-left: 0px;border-bottom:  1px solid black;"
              width="80" colspan="2">
              <p style="line-height: 8px;font-size: 9px;margin-top: -20px">D. The Company will pay all pertinent and
                  reasonable expenses incurred in connection with the accident not provided under this Schedule of
                  Indemnities (A), (B) and (C) subject to a maximum amount of Php10,000.00 but in no case shall the
                  company’s aggregate payment exceed the overall Limits of Liability under Sections I and II</p>

          </td>

      </tr>
    </table> --}}
</body>

</html>
