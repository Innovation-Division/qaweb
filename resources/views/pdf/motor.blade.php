
<?php
$issueDate = "";
$vehicleno = "";
$assured = "";
$address = "";
$fromdate = "";
$todate = "";
$renewingno = "";
$refno = "";
$dstnoComma = 0;
$lgtnoComma = 0;
$vatnoComma = 0;
$premnoComma = 0;
$total = 0;
$dst = 0;
$lgt = 0;
$vat = 0;
$prem = 0;
 
if($basicInfo){
  foreach ($basicInfo as $key) {
    $issueDate = date("F d, Y", strtotime($key->policyInceptionDate));
    $insurred = $key->firstName .' '.$key->middleName.' '. $key->lastName;

    // $address1 = $key->residenceAddress;
    // $max_length = 45;
    //   if (strlen($address1) > $max_length) {
    //       $truncated_address = substr($address1, 0, $max_length) . "...";
    //   } else {
    //       $truncated_address = $address1;
    //   }
    $address=$key->residenceAddress;;
    $refno = '';
    $renewingno ='1';
    $fromdate =  date("F d, Y", strtotime($key->policyInceptionDate));
    $todate = date('F j, Y', strtotime($key->policyInceptionDate . ' +1 year'));
    $mvFileNo = $key->mvFileNo;
    $egineNo = $key->engineNo;
    $chasisNo= $key->chasisNo;
    $color = $key->color;
    $plateNo= $key->plateNo;
    $dateIssued = date("F d, Y", strtotime($key->viewPdf));
  }
}

  //foreach ($premium as $keypremium) {
      // $prem =  '100' ;
      // $premnoComma = '200';

if($taxes){

  foreach ($taxes as $keytaxes) {

      $prem = $keytaxes->basePremium;

      $dst = $keytaxes->docStamps;
      $dstnoComma = $keytaxes->docStamps;



      $vat = $keytaxes->vat;
      $vatnoComma = $keytaxes->vat;



      $lgt = $keytaxes->localGovernmentTax;
      $lgtnoComma = $keytaxes->localGovernmentTax;

      $deduction = $keytaxes->deduction;



  }
}

$total = $taxes[0]['finalAmountDue'];
$total = $total;
$addtwo = $vehicleInfo[0]['totalAcceso'] + $vehicleInfo[0]['valueOfVehicle'];
$sumInsured = $addtwo;
// dd(count($warclau),$warclau);
// $accesoryCount = count($Accessories);


 ?>


             <style>
 table { border-collapse: collapse; }
 /*tr { border: solid thin; }*/

 /* Font Definitions */
 @font-face  {font-family:"Cambria Math";
 panose-1:2 4 5 3 5 4 6 3 2 4;
 mso-font-charset:1;
 mso-generic-font-family:roman;
 mso-font-format:other;
 mso-font-pitch:variable;
 mso-font-signature:0 0 0 0 0 0;}
 @font-face
 {font-family:Calibri;
  panose-1:2 15 5 2 2 2 4 3 2 4;
  mso-font-charset:0;
  mso-generic-font-family:swiss;
  mso-font-pitch:variable;
  mso-font-signature:-469750017 -1073732485 9 0 511 0;}
  /* Style Definitions */
  p.MsoNormal, li.MsoNormal, div.MsoNormal
  {mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-parent:"";
    margin-top:0cm;
    margin-right:0cm;
    margin-bottom:.4pt;
    margin-left:.5pt;
    text-indent:-.5pt;
    line-height:104%;
    mso-pagination:widow-orphan;
    font-size:10.0pt;
    mso-bidi-font-size:11.0pt;
    font-family:"Arial",sans-serif;
    mso-fareast-font-family:Arial;
    color:black;}
    h1
    {mso-style-priority:9;
      mso-style-qformat:yes;
      mso-style-parent:"";
      mso-style-link:"Heading 1 Char";
      mso-style-next:Normal;
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:0cm;
      margin-left:.5pt;
      margin-bottom:.0001pt;
      text-align:center;
      text-indent:-.5pt;
      line-height:107%;
      mso-pagination:widow-orphan lines-together;
      page-break-after:avoid;
      mso-outline-level:1;
      font-size:10.0pt;
      mso-bidi-font-size:11.0pt;
      font-family:"Arial",sans-serif;
      mso-fareast-font-family:Arial;
      color:black;
      mso-font-kerning:0pt;
      font-weight:normal;}
      span.Heading1Char
      {mso-style-name:"Heading 1 Char";
      mso-style-unhide:no;
      mso-style-locked:yes;
      mso-style-parent:"";
      mso-style-link:"Heading 1";
      mso-ansi-font-size:10.0pt;
      font-family:"Arial",sans-serif;
      mso-ascii-font-family:Arial;
      mso-fareast-font-family:Arial;
      mso-hansi-font-family:Arial;
      mso-bidi-font-family:Arial;
      color:black;}
      span.SpellE
      {mso-style-name:"";
      mso-spl-e:yes;}
      .MsoChpDefault
      {mso-style-type:export-only;
        mso-default-props:yes;
        mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;
        mso-fareast-font-family:"Times New Roman";
        mso-fareast-theme-font:minor-fareast;
        mso-hansi-font-family:Calibri;
        mso-hansi-theme-font:minor-latin;
        mso-bidi-font-family:"Times New Roman";
        mso-bidi-theme-font:minor-bidi;}
        .MsoPapDefault
        {mso-style-type:export-only;
          margin-bottom:8.0pt;
          line-height:107%;}
          /* Page Definitions */
          @page
          {mso-footnote-separator:url("Motor%20Sample%20Format%20-%20Multiple%20\(Revised\)_files/header.htm") fs;
          mso-footnote-continuation-separator:url("Motor%20Sample%20Format%20-%20Multiple%20\(Revised\)_files/header.htm") fcs;
          mso-endnote-separator:url("Motor%20Sample%20Format%20-%20Multiple%20\(Revised\)_files/header.htm") es;
          mso-endnote-continuation-separator:url("Motor%20Sample%20Format%20-%20Multiple%20\(Revised\)_files/header.htm") ecs;}
          @page WordSection1
          {size:612.0pt 792.0pt;
            margin:94.6pt 40.0pt 39.85pt 40.0pt;
            mso-header-margin:36.0pt;
            mso-footer-margin:36.0pt;
            mso-title-page:yes;
            mso-even-header:url("Motor%20Sample%20Format%20-%20Multiple%20\(Revised\)_files/header.htm") eh1;
            mso-header:url("Motor%20Sample%20Format%20-%20Multiple%20\(Revised\)_files/header.htm") h1;
            mso-first-header:url("Motor%20Sample%20Format%20-%20Multiple%20\(Revised\)_files/header.htm") fh1;
            mso-paper-source:0;}
            div.WordSection1
            {page:WordSection1;}
            .spaceTo{
              position: absolute;
              right: 150px;
            }
            #spaceValue{
              position: absolute;
              right: 50;
            }
            #subtitle{
              font-weight: bold;
            }
            -->

          </style>


          <html>
          <head>
            <style>
                     /* Container styles */
       

   
              /** Define the margins of your pdf page **/
              @page {
                margin: 100px 30px;
              }

              header {
                position: fixed;
                top: -100px;
                left: 0px;
                right: 0px;
                height: 100px;

                /** Extra personal styles **/
                /* background-color: #0b395b; */
                color: white;
                text-align: center;
                /*     line-height: 35px;*/
              }

              footer {
                position: fixed;
                bottom: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                /* background-color: #0b395b; */
                color: white;
                text-align: center;
                line-height: 35px;
              }
              body {
               font-family: "Arial", sans-serif !important;
                font-size: 9pt !important;
              }
            </style>
          </head>
          <body>
            <!-- Define dompdf header and footer blocks before your subject matter content -->
            <header>
        <img src="{{ $header }}" width="100%" height="100%"/>

      </header>

      <footer>

      <img src="{{ $footer }}" width="100%" height="100%"/>
     </footer>


           <!-- Wrap the subject matter content of your PDF inside a main tag -->
           <main>
            <div style="margin-top:100px!important">
            </div>
                 <caption>INVOICE</caption>
              <hr>

             <table style="width:100%;font-size:12px;margin-left:10px" border="0">

              <tr>
                  <td style="width: 160px"> VAT. Reg T.I.N</td>
                  <td>&nbsp;</td>
              </tr>
                <tr>
                  <td style="width: 160px"> BIR Permit No.</td>
                  <td>&nbsp;</td>
              </tr>
               <tr>
                  <td style="width: 160px"> Date Issued</td>
                  <td>{{ $dateIssued }}</td>
              </tr>
               <tr>
                  <td style="width: 160px"> Invoice Series</td>
                  <td>{{ $invoiceno }}</td>
              </tr>
                <tr>
                  <td style="width: 160px"></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
              </tr>
                <tr>
                  <td style="width: 160px"> Insured</td>
                  <td rowspan="2" style="font-size: {{ strlen($insurred) > 30 ? '8px' : 'inherit' }}">
                        <strong>{{ $insurred }}</strong>
                    </td>


              </tr>
                <tr>
                  <td style="width: 160px"></td>
                  <td>Invoice Reference No.</td>
                  <td>&nbsp;</td>
              </tr>

              <tr>
                  <td style="width: 160px"> Address</td>
                  <td rowspan="2" style="font-size: {{ strlen($address) > 30 ? '8px' : 'inherit' }}">
                   {{ $address }}
                  <td>Producer Name</td>
                  <td>{{$producerCode[0]['agentName']}}</td>
              </tr>
              <tr>
                  <td style="width: 160px"> &nbsp;</td>
                  <td>Producers Code</td>
                  <td>{{$producerCode[0]['agentCode']}}</td>
              </tr>
              <tr>
                  <td style="width: 160px; border-bottom: 1pt solid black;"> TIN</td>
                  <td style="border-bottom: 1pt solid black;">&nbsp;</td>
                  <td style="border-bottom: 1pt solid black;">&nbsp;</td>
                  <td style="border-bottom: 1pt solid black;">&nbsp;</td>

              </tr>
              <tr>
                  <td style="width: 160px">Class</td>
                  @if($vehicleInfo[0]['bodyType'] == 'truck' ||$vehicleInfo[0]['bodyType'] == 'bus' ) 
                  <td>:COMMERCIAL VEHICLE-NON FLEET</td>
                  @elseif($vehicleInfo[0]['bodyType'] == 'motorcycle')
                  <td>:MOTORCYCLE-NON FLEET</td>
                  @else
                  <td>:PRIVATE CARS-NON FLEET</td>
                  @endif
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
              </tr>
              <tr>
                  <td style="width: 160px">Policy No.</td>
                  <td>:<strong>{{$invoiceno}}</strong></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
              </tr>
              <tr>
                  <td style="width: 160px">Sum Insured</td>
                  <td>PHP {{ number_format($sumInsured,2, '.', ',') }}</td>
                  <td style="width: 160px">CURRENCY</td>
                  <td style="text-align: right;">PHILIPPINE PESO (PHP)</td>
              </tr>
              <tr>
                  <td style="width: 100px"> Period of Insurance</td>
                  <td>From: 12:00 NOON of {{$fromdate}} </td>
                  <td style="width: 150px">PREMIUM (VATABLE)</td>
                  <td style="text-align: right;">{{$prem}}</td>
              </tr>
               <tr>
                  <td style="width: 100px">&nbsp;</td>
                  <td>To: 12:00 NOON of {{ $todate }} </td>
                  <td style="width: 150px">DOCUMENTARY STAMPS</td>
                  <td style="text-align: right;">{{$dst}}</td>
              </tr>
               <tr>
                  <td style="width: 160px">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>VALUE ADDED TAX</td>
                  <td style="text-align: right;">{{$vat}}</td>
              </tr>
                <tr>
                  <td style="width: 160px">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>LOCAL GOVERNMENT TAX</td>
                  <td style="text-align: right;">{{ $lgt }}</td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2"><hr style="border: 1px solid black;"></td>
            </tr>
              <tr>
                  <td style="width: 160px">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>TOTAL AMOUNT DUE</td>
                  <td style="text-align: right;">{{$total}}</td>
              </tr>


           </table>

             <table style="width:100%;font-size:12px;padding-top: 300px!important" >
                <tr>

                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"THIS DOCUMENT IS NOT VALID FOR CLAIM OF INPUT TAX"</td>
                           <div class="col-md-12_ break-two"> <br> <br> </div>
                </tr>
                <tr>
                  <td style=" text-decoration: underline"><strong>IMPORTANT:</strong></td>
                </tr>
                  <tr>
                  <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                  <td>Should the policy be cancelled or endorsed to a lower value, the insured is still liable to pay the full amount of the documentary stamps as stipulated in the policy prior to cancellation/endorsement.</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                  <td>This is a system generated form and if issued without any alteration, this does not require signature</td>
                </tr>
               
              </table>
     <!--        <style>
              .page-break {
                page-break-after: always;
              }
            </style>
            <div class='page-break'></div> -->
              <div style='margin-top:1px !important'>
               <caption>MOTOR CAR POLICY SCHEDULE</caption>
             </div>
               <hr>
            <table style="width:100%;font-size:10px:margin-left:10px;padding-top: -10px; font-family: Arial" border="0" >
              <tr>
                <td style="width: 80px"><strong>Line</strong> </td>
                <td style="width: 300px">:<strong>MOTOR CAR</td>
                  <td  style="width: 220px">Policy Period</td>
                  <td></td>
                </tr>
                <tr>
                  <td><strong>Sub-Line</strong></td>
                  @if($vehicleInfo[0]['bodyType'] == 'truck' ||$vehicleInfo[0]['bodyType'] == 'bus' ) 
                  <td>:COMMERCIAL VEHICLE-NON FLEET</td>
                  @elseif($vehicleInfo[0]['bodyType'] == 'motorcycle')
                  <td>:MOTORCYCLE-NON FLEET</td>
                  @else
                  <td>:PRIVATE CARS-NON FLEET</td>
                  @endif
                  <td>From: {{$fromdate}} 12:00 NOON</td> 
                </tr>
                <tr>
                  <td><strong>Place Issued</strong></td>
                  <td>:MAKATI CITY</td>
                  <td>To: {{  $todate}} 12:00 NOON</td>
                  <td></td>
                  <td></td>
                </tr>
            </table>
                <table style="width:100%;font-size:10px:margin-left:10px;padding-top: -10px; font-family: Arial" border="0" >
                  <tr>
                    <td style="width: 80px"><strong>Issue Date.</strong></td>
                    <td style="width: 300px">:{{ date('F j, Y', strtotime($issuedate )) }}</td> 
                    <td  style="width: 220px !important">&nbsp;&nbsp;</td>
                    <td style="text-align: right; "></td>
                     <td ></td>
                  </tr>
                <tr>
                  <td><strong>Policy No.</strong></td>
                  <td>:<strong>{{$invoiceno}}</strong></td>
                  <td>PREMIUM</td>
                  <td style="text-align: right;"><span>PHP</span></td>
                  <td style="text-align: right;">{{$prem}}</td>
                </tr>
                <tr>
                  <td><strong>Insured</strong></td>
                  <td>:<strong>{{ $insurred }}</strong></td>

                  <td>DOCUMENTARY STAMPS</td>
                  <td style="text-align: right;"><span></span></td>
                  <td style="text-align: right;">{{$dst}}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td style="font-size:8px"> :{{$address}}</td>
                  <td>VAT </td>
                  <td style="text-align: right;"><span></span></td>
                  <td style="text-align: right;">{{$vat}}</td>
                </tr>
                <tr>
                  <td><strong>Producer </strong></td>
                  <td>:{{$producerCode[0]['agentCode']}}</td>
                  <td style="width: 100px">LOCAL GOVERNMENT TAX</td>
                  <td style="text-align: right;"><span></span></td>
                  <td style="text-align: right;">{{$lgt}}</td>
                </tr>
                <tr>
                  <td><strong>Mortgage</strong></td>
                  <td>:{{$basicInfo[0]['mortgageValue']}} </td>
                  <td>AMOUNT DUE</td>
                   <td style="text-align: right;">PHP</td>
                  <td style="text-align: right;">{{ $total}}</td>
                </tr>
              </table>
            

              <table style="width:100%;font-size:12px"  border="0">
              <colgroup>
                <col style="width: 120px">
                <col style="width: auto">
                <col style="width: auto">
                <col style="width: auto">
                <col style="width: auto">
              </colgroup>
                <tr>
                <td style="border-top: solid thin; border-bottom: solid thin; font-weight: bold; padding-top: 5px; padding-bottom: 5px;width:120px">INSURED DETAILS</td>
              <td style="border-top: solid thin; border-bottom: solid thin; font-weight: bold; padding-top: 5px; padding-bottom: 5px;width: 270px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td style="border-top: solid thin; border-bottom: solid thin; font-weight: bold; padding-top: 5px; padding-bottom: 5px;width: 140px">PERILS</td>
              <td style="border-top: solid thin; border-bottom: solid thin; font-weight: bold; padding-top: 5px; padding-bottom: 5px; width: 100px"> </td>
              <td style="border-top: solid thin; border-bottom: solid thin; font-weight: bold; padding-top: 5px; padding-bottom: 5px; text-align: right;">SUM INSURED</td>
                  
                </tr>
                <tr>
                  <td style="width: 100px">Vehicle Insured</td>
                  <td><span>: {{$vehicleInfo[0]['year']}}  {{$vehicleInfo[0]['brand']}} {{$vehicleInfo[0]['model']}}</span></td>
                  <td ><span>Own Damage</span></td>
                  <td style="text-align: right;">PHP</td>
                  <td style="text-align: right;"><span>{{ number_format($vehicleInfo[0]['valueOfVehicle'] + $comPute,2) }}</span></td>

                </tr>
                <tr>
                  <td style="width: 100px">Type of Body</td>
                  <td><span>: {{$vehicleInfo[0]['bodyType']}}</span></td>

             
                  @if($vehicleInfo[0]['actsOfNature'] == 0 || $vehicleInfo[0]['actsOfNature'] == null)
                  <td ><span>Act of Nature</span></td>
                  <td style="text-align: center;"></td>
                  <td style="text-align: right;"><span>Not Covered</span></td>
                  @else
                   <td ><span>Act of Nature</span></td>
                  <td style="text-align: right;">PHP</td>
                  <td style="text-align: right;"><span>{{ number_format($vehicleInfo[0]['valueOfVehicle'] + $comPute,2) }}</span></td>
                  @endif

                </tr>
                  <tr>
                  <td style="width: 100px">Plate/ CS No.</td>
                  <td><span>: {{!empty($plateNo) ? $plateNo : '' }} </span></td>
                  <td ><span>VTPL-Body Injury</span></td>
                  <td style="text-align: right;">PHP</td>
                  <td style="text-align: right;"><span> {{ number_format($vehicleInfo[0]['bodyInjury'],2) }}</span></td>

                </tr>
                <tr>
                  <td style="width: 100px">Motor / Engine No.</td>
                  <td><span>: {{ $egineNo }}</span></td>
                  <td ><span>VTPL-Property Damage</span></td>
                  <td style="text-align: right;">PHP</td>
                  <td style="text-align: right;"><span> {{ number_format($vehicleInfo[0]['propertyDamage'],2) }}</span></td>

                </tr>
                <tr>
                  <td style="width: 100px">Serial / Chassis No.</td>
                  <td><span>: {{ !empty($chasisNo) ? $chasisNo:""}} </span></td>
                  <td ><span>Auto Personal Accident</span></td>
                  <td style="text-align: right;">PHP</td>
                  <td style="text-align: right;"><span>{{ $vehicleInfo[0]['autoPersonalAccident'] }}</span></td>

                </tr>
                <tr>
                  <td style="width: 100px">MV File No.</td>
                  <td><span>: {{!empty ($mvFileNo) ? $mvFileNo :''}}</span></td>
                  @if($vehicleInfo[0]['bodyType'] != 'Truck' || $vehicleInfo[0]['bodyType'] != 'TRUCK')
                  <td ><span>RSCC</span></td>
                  <td style="text-align: right;">PHP</td>
                  <td style="text-align: right;"><span>{{ number_format($vehicleInfo[0]['valueOfVehicle'] + $comPute,2) }}</span></td>
                  @else
                  <td ><span>RSCC</span></td>
                  <td style="text-align: right;"></td>
                  <td style="text-align: right;"><span>Not Covered</span></td>
                  @endif
                </tr>
                <tr>
                  <td style="width: 100px">Seating Capacity</td>
                  <td><span>: {{ $vehicleInfo[0]['perSeat'] }}  </span></td>
                  <td ><span> </span></td>
                  <td style="text-align: center;"></td>
                  <td style="text-align: right;"><span></span></td>

                </tr>

                <tr>
                  <td style="width: 100px">Color</td>
                  <td><span>: {{ !empty($color) ? $color :""}} </span></td>
                  <td ><span> </span></td>
                  <td style="text-align: center;"></td>
                  <td style="text-align: right;"><span></span></td>

                </tr>
                     <tr>
                  <td style="width: 100px">Accessories</td>
                  <td colspan="4"><span>: </span>Standard Built-in ,{{ $accessories == 'None' ? '' : rtrim($accessories, ',') }}</td>
                </tr>
              </table>
              <hr></hr>
                  <table style="width:100%;font-size:12px"  border="0">
                    <tr>
                      <td style="width: 100px">Deductible</td>
                      <td><span>: {{ $deduction }} </span></td>
                    </tr>
                    <tr>
                      <td style="width: 200px">Autorized Repair Limit</td>
                      <td><span>: Deductible + Towing (PHP 100.00)</span></td>
                    </tr>
                  </table>
                  <table style="width:100%;font-size:12px"  border="0">
                   <tr>
                    <td style="width: 500px">
                      Compulsory TPL cover under Section I/II of this Policy is deemed deleted
                    </td>
                  </tr>
                  </table>

              <hr></hr>

                <table style="width:100%;font-size:12px"  border="0">
                       <tr>
                      <td style="width: 500px">
                       The following warranties, clauses and endorsements apply to this policy:
                      </td>
                    </tr>
                  </table>
                <table style="width:100%;font-size:12px"  border="0">
                     <tr>
                      <td>-AirBag Clause</td>
                       <td>- 30 Days Claims Notification</td>
                    </tr>
                    <tr>
                      <td>-Drunken Drivers Cause</td>
                       <td>- Road Side Asistance Program (Private Cars ONLY)</td>
                    </tr>
                    <tr>
                      <td>-Pro Rate Premium Clause</td>
                       <td>- Infectious Disease Exclusion Clause</td>
                    </tr>
                    <tr>
                      <td>-Motor Car Accessories Clause</td>
                       <td>- Acts of Nature Endoresement</td>
                    </tr>
                    <tr>
                      <td>-Importation Clause</td>
                       <td>- Mortgagee Clause (if applicable)</td>
                    </tr>
                    <tr>
                      <td>-Pairs & Sets Clause</td>
                       <td>- Warranted no Loss as of Issued Date </td>
                    </tr>
                    <tr>
                      <td>-Under Insurance Clause</td>
                       <td>- Casa Repair Clause </td>
                    </tr>
                    <tr>
                      <td>-Auto Passenger Personal Accident Endorsement</td>
                       <td>Ten (10) years for Regular Sedans, SUV, AUV, Pick-up & Vans</td>
                    </tr>
                    <!--  <tr>
                      <td>&nbsp;&nbsp;&nbsp;1.  AD&D  : Php 75,000.00 per seat</td>
                    
                      @if($vehicleInfo[0]['bodyType'] == 'Truck' || $vehicleInfo[0]['bodyType'] == 'truck')
                       <td>-Deletion of Limitation as to use No.3 </td>
                       @else
                       <td></td>
                       @endif
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;2.  MER  : Php 7,500.00 per seat </td>
                      <td>b. Three (3) years for Small Cars, defined as 1 to 3 years old and with </td> 
                    </tr> -->
                </table>

                  <hr></hr>
                  <p style="font-size: 13px"> This policy schedule shall be read together with all the issued endorsements, warranties, clauses and the Motorcar Insurance Policy. Cocogen reserves the right to inspect the insured risk at any time</p>
                  <hr></hr>
                  <table style="width:100%;font-size:12px;margin-top:-20px !important"  border="0">
                    <tr>
                      <td><p style="font-size: 13px">In witness whereof, the Company has caused this Policy to be signed by its duly authorized officer in Pasig City, Philippines</p>
                      <p style="font-size: 13px;width: 400px">Documentary Stamps to the value stated above have been affixed to the Policy.</p></td>
                    </tr>
                    <tr>
                     <td><p style="font-size: 13px;width: 400px; text-align: justify;">It is understood that upon the issuance of the Policy, no payment for the Documentary Stamp Tax will be refunded as a result of the cancellation or endorsement of the policy or a reduction in the premium due for whatever reason.</p></td>
                   </tr>
              <br>
                <img src='{{ $imagePath }}' style="margin-top:-110px;right:300px;position: absolute;height:100px">
                 </table>

                </body>
      </html>
      <style>
 