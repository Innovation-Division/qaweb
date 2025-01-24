<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
         .table {
        border-top: 0;
        border-collapse: collapse;
      }

      .table td,
      table th {
        border: 0px solid black;
        
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

      .page_break {
        page-break-after: always;
      }

      p {
        font-family: Helvetica;
        font-size: 8px;

      }

      h3 {
        font-family: Helvetica;
        text-align: center;
      }

      h5 {
        margin-bottom: 0px;
        font-family: Helvetica;
      }

      h6 {
        margin-bottom: 0px;
        font-family: Helvetica;
      }

      footer {
        position: fixed;
        bottom: 10px;
        left: 0;
        right: 0px;
        height: 50px;
        /** Extra personal styles **/
        background-color: #03a9f4;
        color: white;
        text-align: center;
        line-height: 35px;
      }

      #headerColor {
        background-color: #018080;
        color: white;
      }

      .curvedge {        
        border-radius: 10px;
        height: 30px !important;
        background-color: #9fd1d1;
        margin-right:3px;
        margin-bottom:3px;
        display:inline-block;
        
      }
   

      table.center {
        margin-left: auto;
        margin-right: auto;
      }


      #sizefont {
        font-family: Helvetica !important;
        font-size: 10px !important;
        text-align: left !important;
      }
      .tableFontSize{
        font-size: 11px !important;
        font-family: Helvetica !important;
        border: 0;
        text-align: left;
        border: 0px;
        width: 100%;
        
      }
      td:nth-child(2) {
        padding-right: 4px;
    }
    .longstring {
    font-size: 13px;
    }
    .shortstring {
    font-size: 8px !important;
    }



    </style>
    <?php
     $count = strlen($destination);
    
    if($count > 30){
   
        $font_class = 'shortstring';
    }else{
     
        $font_class = 'longstring';
    }?>

  </head>
  <body>
    <header class='headerclass' style="width: 100%; margin-top: 0px; margin-bottom: 10px;">
      <img src="./images/getquote/headertest.png" style="width: 700px;">
    </header>
    <p style="text-align:center;margin-top:5px;font-size:13px">
      <strong>TRAVEL EXCEL PLUS <br>INTERNATIONAL TRAVEL PERSONAL ACCIDENT </strong>
      <br>CONFIRMATION OF COVER <br>
      <strong>Valid for all the 26 Shengen Member States</strong>
    </p>
    <table class="tableFontSize" style="font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;border: 0px;width: 100%;">
        <tr>
          <td style="width: 88px;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">Insured Name:</td>
          <td style="border-bottom: 1px solid #000;">{{ $insured }}</td>
        </tr>
      </table>
      <table class="tableFontSize">
        <tr>
          <td style="width: 68px;"><span style='font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;'>Policy No.: </span></td>
          <td style="width: 220px;border-bottom: 1px solid #000;"><span style='font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;'>{{ $policyno }}</span></td>
          <td style="width: 90px;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">Issuance Date:</td>
          <td style="border-bottom: 1px solid #000 !important;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">{{ $issuancedate }}</td>
        </tr>
      </table>

   <table class="tableFontSize" style="font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;border: 0px;width: 100%;">
        <tr>
          <td style="width: 5px;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">Birthdate: </td>
          <td style="width: 178px;border-bottom: 1px solid #000 !important;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">{{ $birthdate }}</td>
          <td style="width: 88px;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">Period Travel:</td>
          <td style="width: 118px;font-size: 13px;border-bottom: 1px solid #000  !important;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">{{ $from_date }}</td>
          <td style="width: 18px;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">to:</td>
          <td style="width: 128px;border-bottom: 1px solid #000  !important;font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;">{{ $to_date }} </td>
         <td><span style='width: 100px;font-size: 10px !important;font-family: Helvetica;border: 0;text-align: left;'>   (Both date inclusive)</span></td>
        </tr>
      </table>
      <table  class="tableFontSize" style="font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;border: 0px;width: 100%;">
          <tr>
              <td style="width: 170px;">COVID-19 Coverage Period: </td>
              <td style="width: 250px;border-bottom: 1px solid #000;">{{ $covidfrom }} to {{ $covidto }}</td>
              <td style="width: 70px;">Destination:</td>
              <td style="width: 180px;border-bottom: 1px solid #000;font-family: Helvetica;"  class="<?php echo $font_class; ?>">{{ $destination }} </td>
            </tr>

        </table>
        <table  class="tableFontSize" style="font-size: 13px !important;font-family: Helvetica;border: 0;text-align: left;border: 0px;width: 100%;">
          <tr>
              <td style="width: 120px">Purpose of Travel:</td>
              <td style="border-bottom: 1px solid #000;">{{ $purposetravel }}</td>
            </tr>
        </table>
     
    <table class='center' style="font-family: Helvetica;border: 0;text-align: left;font-size: 10px;" widht='100%'>
      <tr style=" border-radius: 10px; height: 35px !important;  background-color: #9fd1d1;line-height: 1.3em;">
        <td style="text-align:center;display:inline-block;border-spacing: 3px;margin-right:3px !important" class='curvedge' id='headerColor'>
        
          @if($package == 'Elite')
          <span style='font-size:9px;height:10px;'>{{ strtoupper($package) }} <br> &nbsp;&nbsp;&nbsp;(60 years old below) &nbsp;&nbsp;&nbsp; </span>
          @else
          <span style='font-size:9px;height:10px;'> <br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ strtoupper($package) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
          @endif

        </td>
        <td  class='curvedge' id='headerColor' style="display:inline-block;margin-right:3px !important">
          <span style='font-size:10px;height:10px;'> <br>&nbsp;&nbsp;&nbsp;TRAVEL EXCEL PLUS STANDARD COVERAGE&nbsp;&nbsp;&nbsp;</span>
        </td>
        <td style="text-align:center;display:inline-block;margin-right:3px !important" class='curvedge' id='headerColor'>
        @if($package == 'Elite')
          <span style='font-size:9px;height:10px;'>{{ strtoupper($package) }} <br> &nbsp;&nbsp;&nbsp;(60 years old below) &nbsp;&nbsp;&nbsp; </span>
          @else
          <span style='font-size:9px;height:10px;'> <br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ strtoupper($package) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
          @endif
        </td>
        <td style="text-align:center;display:inline-block;margin-right:3px !important" class='curvedge' id='headerColor' >
          <span style='font-size:10px;height:10px'> <br>&nbsp;&nbsp;&nbsp;TRAVEL EXCEL PLUS STANDARD COVERAGE&nbsp;&nbsp;&nbsp;</span>
        </td>
      </tr>
    </table>
    <table class='center' style="font-family: Helvetica;border: 0;text-align: left;font-size: 13px;border: 0px solid black;">

    <tr  style="line-height: 2em;"> <!-- START-->
    <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-95px">
            <span id='sizefont'>Actual Expense</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-95px">
          <span id='sizefont' style='padding-left:5px'>Connection of Services</span>
        </td>
   
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-95px">
            <span id='sizefont'>13</span>
          </td>
    <br>
    <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important;">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $twentyfive }}&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;line-height:1em">
          <span id='sizefont' style='padding-left:5px'>Loss of Passport, Driving License,National  </span><br><span  id='sizefont' style='padding-left:6px'>Identity Card Abroad</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
            <span id='sizefont'>25</span>
          </td>
   
          <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-105px;height:30px!important;height:40px!important">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
          </td>
          <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-105px;height:40px!important">
            <span id='sizefont' style='padding-left:5px;line-height:1em;'>Medical referral/appointment of local</span> 
          <span  id='sizefont' style='padding-left:6px;line-height:1em;'>  medical specialist</span>

          </td>
          <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-105px;height:40px!important">
            <span id='sizefont'>12</span>
          </td>
          <br>
    <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $twentyfour }}&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
          <span id='sizefont' style='padding-left:5px'>Loss of Personal Money</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
            <span id='sizefont'>24</span>
          </td>
          <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-110px">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-110px">
          <span id='sizefont' style='padding-left:5px'>Long distance medical information service</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-110px">
            <span id='sizefont'>11</span>
          </td>
          <br>
   
          <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important;height:50px!important">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
          </td>
          <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;height:50px!important">
          <span id='sizefont' style='padding-left:5px'>Location and forwarding of baggage and</span><br>
          <span  id='sizefont' style='padding-left:6px;line-height:1em;'> personal effects</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;height:50px!important">
            <span id='sizefont'>23</span>
          </td>
          <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-100px">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-100px">
          <span id='sizefont' style='padding-left:5px'>Relay of urgent messages</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-100px">
            <span id='sizefont'>10</span>
          </td>
          <br>
    <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important;line-height:1 em;height:50px!important;margin-top:3px">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $twentytwo }}&nbsp;&nbsp;&nbsp;</span>
          </td>
          
          <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;height:50px!important;line-height:2.5em;margin-top:2px">
          <span id='sizefont' style='padding-left:5px'>Lost Or Stolen Baggage/Personal</span><br>
          <span  id='sizefont' style='padding-left:6px;line-height:1em'>Belogings Not Checked-In</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;height:50px!important;margin-top:3px;line-height:2.5em">
            <span id='sizefont'>22</span>
          </td>
          <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-78px">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-78px">
          <span id='sizefont' style='padding-left:5px'>Delivery of medicines</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-78px">
            <span id='sizefont'>9</span>
          </td>
          <br>
    <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important;height:50px!important;line-height:1em;margin-top:3px">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $twentyone }}&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;height:50px!important;line-height:2.5em;margin-top:3px;">
          <span id='sizefont' style='padding-left:5px'>Compensation for in-flight loss of checked-in</span><br>
          <span  id='sizefont' style='padding-left:6px;line-height:1em;'>baggage</span>
          
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;height:50px!important;margin-top:3px;line-height:2.5em">
            <span id='sizefont'>21</span>
          </td>

    <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-55px">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;line-height:1em;margin-top:-55px">
          <span id='sizefont' style='padding-left:5px'>Emergency return home following death of</span><br><span  id='sizefont' style='padding-left:6px'>a close family member</span>
        </td>
      
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-55px">
            <span id='sizefont'>8</span>
          </td>
      <br>
        <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important;height:65px!important;line-height:1em;margin-top:3px">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $twenty }}&nbsp;&nbsp;&nbsp;</span>
          </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;height:65px!important;margin-top:3px;line-height:3.5em">
            <span id='sizefont' style='padding-left:5px'>Baggage Delay</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;height:65px!important;margin-top:3px;line-height:3.5em">
          <span id='sizefont'>20</span>
        </td>

       <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-35px;line-height:1em;height:50px!important;margin-bottom:3px">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $seven }}&nbsp;&nbsp;&nbsp;</span>
        </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-35px;height:50px!important;margin-bottom:3px;line-height:2.5em">
            <span id='sizefont' style='padding-left:5px'>Travel of one immediate family member</span>
          </td>
          <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-35px;height:50px!important;margin-bottom:3px;line-height:2.5em">
            <span id='sizefont'>7</span>
        </td>
    
      <br>    
      <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important">
        <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $nineteen }}&nbsp;&nbsp;&nbsp;</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
        <span id='sizefont' style='padding-left:5px'>Flight Diversion</span>
      </td>

      <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
        <span id='sizefont'>19</span>
      </td>

      <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-33px">
        <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-33px">
       <span id='sizefont' style='padding-left:5px'>Escort of dependent child</span>
      </td>
      <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-33px">
        <span id='sizefont'>6</span>
      </td>
     <br>
      <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important">
        <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $eighteen }}&nbsp;&nbsp;&nbsp;</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
        <span id='sizefont' style='padding-left:5px'>Flight Misconnection</span>
      </td>
      
      <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
          <span id='sizefont'>18</span>
        </td>
        
      <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-37px">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;margin-top:-37px">
          <span id='sizefont' style='padding-left:5px'>Repatriation of mortal remains</span>
      </td>
      <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-37px">
          <span id='sizefont'>5</span>
      </td>
      <br>
      <td class='curvedge' style="text-align:center;width:101px;background-color:#d1e8ed !important;line-height:1em;height:65px!important;margin-top:2px">
        <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $seventeen }}&nbsp;&nbsp;&nbsp;</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;height:65px!important;line-height:3em;margin-top:2px">
        <span id='sizefont' style='padding-left:5px'>Delayed Departure</span>
      </td>
      <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;height:65px!important;line-height:3em;margin-top:2px">
        <span id='sizefont'>17</span>
      </td>
      <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important;margin-top:-15px">
        <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important;line-height:1em;margin-top:-15px">
        <span id='sizefont' style='padding-left:5px;' >Repatriation of a family member travelling  </span><br><span  id='sizefont' style='padding-left:6px'>with the insured</span>
      </td>
      <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important;margin-top:-15px">
        <span id='sizefont'>4</span>
      </td>
      <br>
      <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important">
        <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $sixteen }}&nbsp;&nbsp;&nbsp;</span>
      </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
          <span id='sizefont' style='padding-left:5px'>Trip Curtailment</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
          <span id='sizefont'>16</span>
        </td>
       <td class='curvedge' style="text-align:center;width:105px !important;;background-color:#d1e8ed !important;line-height: 1em">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $three }}&nbsp;&nbsp;&nbsp;</span>
        </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
          <span id='sizefont' style='padding-left:5px'>Hospital Cash Income</span>
        </td>     
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
          <span id='sizefont'>3</span>
        </td>
        <br>
          <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $fifteen }}&nbsp;&nbsp;&nbsp;</span>
          </td>
          <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
            <span id='sizefont' style='padding-left:5px'>Trip Cancellation</span>
          </td>      
           <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
            <span id='sizefont'>15</span>
          </td>      

          <td class='curvedge' style="text-align:center;width:105px !important;background-color:#d1e8ed !important">
            <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $two }}&nbsp;&nbsp;&nbsp;</span>
          </td>

          <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
            <span id='sizefont' style='padding-left:5px'>Emergency dental care</span>
          </td>
          <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
            <span id='sizefont'>2</span>
          </td>

        <br>
        <td class='curvedge' style="text-align:center;width: 101px;background-color:#d1e8ed !important">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $fourteen }}&nbsp;&nbsp;&nbsp;</span>
        </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
          <span id='sizefont' style='padding-left:5px'>Advance of bail bond</span>
        </td>
             <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
          <span id='sizefont'>14</span>
        </td>

      <td class='curvedge' style="text-align:center;width:105px !important;;background-color:#d1e8ed !important">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;Actual Expense&nbsp;&nbsp;&nbsp;</span>
        </td>
        <td class='curvedge' style="text-align:left;width: 202px;background-color:#d1e8ed !important">
          <span id='sizefont' style='padding-left:5px'>Transport or repatriation in case of illness or accident</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;background-color:#d1e8ed !important">
          <span id='sizefont'>1</span>
        </td>

     <br>
      <td class='curvedge' style="text-align:left;width: 658px;display:inline-block">
        <span id='sizefont' style='padding-left:6px !important'>   <strong>Travel Assistance Services</strong></span>
      </td>
      <td class='curvedge' style="text-align:center;width:30px;display:inline-block">
        <span id='sizefont'>E</span>
      </td>
      <br>
      <td class='curvedge' style="text-align:center;width: 101px;display:inline-block">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $dfourth }}&nbsp;&nbsp;&nbsp;</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 202px;display:inline-block">
        <span id='sizefont' style='padding-left:5px'>Medical Expenses and hospitalization abroad***</span>
      </td>
      <td class='curvedge' style="text-align:center;width:30px;display:inline-block">
        <span id='sizefont'>D</span>
      </td>
  
      <td class='curvedge' style="text-align:center;width:105px !important;display:inline-block;line-height: 1em !important;">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $bsecond }} <br> {{ $bsecond2 }} </span>
      </td>

      <td class='curvedge' style="text-align:left;width: 202px;display:inline-block">
        <span id='sizefont' style='padding-left:5px'>Personal Liability</span>
      </td>
      <td class='curvedge' style="text-align:center;width:30px;display:inline-block">
        <span id='sizefont'>B</span>
      </td>
      <br>
        <td class='curvedge' style="text-align:center;width: 101px;display:inline-block">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $cthird }}&nbsp;&nbsp;&nbsp;</span>
        </td>
        <td class='curvedge' style="text-align:left;width: 202px;display:inline-block">
          <span id='sizefont' style='padding-left:5px'>Accidental Burial Assistance</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;display:inline-block">
          <span id='sizefont'>C</span>
        </td>
        <td class='curvedge' style="text-align:center;width:105px !important;display:inline-block">
          <span id='sizefont'>&nbsp;&nbsp;&nbsp;{{ $afirst }}&nbsp;&nbsp;&nbsp;</span>
        </td>
        <td class='curvedge' style="text-align:left;width: 202px;display:inline-block;">
          <span id='sizefont' style='padding-left:5px'>Accidental Death Disablement</span>
        </td>
        <td class='curvedge' style="text-align:center;width:30px;display:inline-block">
          <span id='sizefont'>A</span>
        </td>
      </tr>
    </table > 
    <br>
    <p style="font-family: Helvetica;border: 0;text-align: left;font-size: 10px;margin-top:-20px !important;padding-left:0px">
      <strong>IMPORTANT:</strong>
  </p>
    <span id='sizefont' style="margin-top:-10px !important">·Terms and Conditions based on Standard Travel Excel Plus International Travel PA Insurance Wordings</span>
  </table>
    <br>
     <table class='center' style="font-family: Helvetica;border: 0;text-align: left;font-size: 13px;border: 0px solid black;">
    <tr  style="line-height: 2em;"> <!-- START-->

     <td class='curvedge' style="text-align:center;width: 180px;background-color:#d1e8ed !important;height:50px !important">
          <span id='sizefont'>up to US$ 25,000 for COVID-19 Cases</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 500px;text-align;justify;background-color:#d1e8ed !important;line-height:1em;height:50px !important">
        
        <span id='sizefont' style='padding-left:10px'> <strong>Repatriation of mortal remains</strong></span><br>
        <span id='sizefont' style='padding-left:10px'>This policy extends to cover repatriation of mortal remains in case of death due to COVID-19 subject to the  </span><br>
        <span id='sizefont' style='padding-left:10px'>limit stated in  the schedule. </span>
      </td>
      <br>
     <td class='curvedge' style="text-align:center;width: 180px;background-color:#d1e8ed !important;height:50px !important">
        <span id='sizefont'>up to US$ 25,000 for COVID-19 Cases</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 500px;text-align;justify;background-color:#d1e8ed !important;line-height:1em;height:50px !important">
        <span id='sizefont' style='padding-left:10px'> <strong>Transport or repatriation in case of COVID-19 illness </strong></span><br>
        <span id='sizefont' style='padding-left:10px'>This policy extends to cover transport and repatriation in case of COVID-19 illness up to the limit stated in the  </span>
        <span id='sizefont' style='padding-left:10px'>Schedule</span>
      </td>
      <br>
      <td class='curvedge' style="text-align:center;width: 180px;background-color:#d1e8ed !important;height:50px !important">
        <span id='sizefont'>US$ 45,000 for COVID-19 Cases</span>
      </td>
      <td class='curvedge' style="text-align:left;width: 500px;text-align;justify;background-color:#d1e8ed !important;line-height:1em;height:50px !important">
        <span id='sizefont' style='padding-left:10px'> <strong><b>Medical expenses and hospitalization abroad ***</b></strong></span><br>
        <span id='sizefont' style='padding-left:10px'>This policy extends to cover Medical Expense and Hospitalization directly due to COVID-19 whilst travelling </span><br>
        <span id='sizefont' style='padding-left:10px'>outside of the  Philippines subject to the limit stated in the Schedule</span>
      </td>
      <br>

      <td style="text-align:center;display:inline-block;margin-right:3px !important;line-height:1em;width:180px;margin-bottom:5px" class='curvedge' id='headerColor'>
           @if($package == 'Elite')
          <span style='font-size:9px;height:10px;'>{{ strtoupper($package) }} <br> &nbsp;&nbsp;&nbsp;(60 years old below) &nbsp;&nbsp;&nbsp; </span>
          @else
          <span style='font-size:9px;height:10px;'> <br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ strtoupper($package) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
          @endif

        </td>
      <td class='curvedge'style="text-align:center;width: 500px;margin-bottom:5px" id='headerColor'>
        <strong><b>COVID-19 COVERAGE</b></strong>
      </td>
          
          <br>
  </table>

    <br>
    <span  id='sizefont'><strong>IMPORTANT:</strong><br></span>
    <span  id='sizefont'>· Terms and Conditions based on COVID-19 Coverage Endorsement Wordings.</span>
    <br>
    <span  id='sizefont'>· Excluded inidividuals are those who are confirmed positive (asymptomatic or symptomatic), suspected, or probably cases of COVID-19 at the time of the application.</span>
    <br>
    <br>
    <span  id='sizefont' style='font-style:italic;font-size:10px;font-family: Calibri;'>
      <strong>The 26 Schengen member States:</strong>
      <br><br>

      <span  id='sizefont'>
        Austria, Belgium, Czech Republic, Denmark, Estonia, Finland, France, Germany, Greece, Hungary, Iceland, Italy, Latvia, Liechtenstein, Lithuania, Luxembourg, Malta, Netherlands, Norway, Poland,
            Portugal, Slovakia, Slovenia, Spain, Sweden, and Switzerland.</span><br>


    </span><br>
    <span  id='sizefont'><strong>CASHLESS SETTLEMENTS OF CLAIM:</strong></span><br>
    <span  id='sizefont'>
        <strong>Assistance Hotline:</strong><br>MAPFRE ASISTENCIA, S.A. COMPANIA INTERNACIONAL DE SEGUROS Y REASEGUROS <br> <span  id='sizefont'>
        C/Sor Angela de la Cruz 6, 28020 Madrid Spain or PACIFICO ASSISTANCE (Administrative Arm in the Philippines) </span><br> <span  id='sizefont'>
         Call (24/7) for assistance : HOTLINE: +632 8 4594736/ Fax No.: +632 8 8922465 | E-mail: operationsph@pacifico-assistance.com.ph
        </span>

<table style="width:100%;text-align:center !important">
  <tr>
    <th>&nbsp;</th>
    <th>&nbsp;</th> 
    <!-- <th><strong>COCOGEN INSURANCE, INC.</strong></th> -->
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>  <img src="./images/DRP E-Signature 700x262px.png"style="width: 200px;height: 100px;"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <!-- <td style="width: 200;text-align: center;border-bottom: 2px solid #000000"><strong>ATTY. DAVID ROY C. PADIN</strong></td> -->
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>President</td>
  </tr>
</table>

        <!-- <table style="width:100%;text-align:center !important; border: 1px solid black;">
   <tr>
    <td></td>
    <td></td>
    <td style="width: 20px; text-align:center"><strong>COCOGEN INSURANCE, INC.</strong></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td> <img src="./images/DRP E-Signature 700x262px.png"  style="width: 100px;height: 100px;"></td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td style="width: 200;text-align: center !important;border-bottom: 2px solid #000000"><strong>ATTY. DARREN M. DE JESUS</strong></td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td style="width: 200;text-align: center !important;">President</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table> -->

    <footer style="width: 100%;" id="footer">
      <img src="./images/getquote/footerITP2.png" style="width: 705px;">
    </footer> 
  </body>
</html>
