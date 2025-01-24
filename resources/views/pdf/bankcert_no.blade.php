
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
        .table {
          border-top: 2;
          border-collapse: collapse;
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
          font-size: 14px;
        }

        h3{
          font-family: Helvetica;
          text-align: center;
        }
        <style>
            

              /* Image styles */
    
              /** Define the margins of your pdf page **/
              @page {
                margin: 100px 30px;
              }
                       /* Container styles */
              .signature-container {
                 position: relative;
                 top: 140px;
                left: 0px;
                right: 20px;
                height: 100px;

                /** Extra personal styles **/
                
                color: white;
                text-align: center;
              }

              header {
                position: fixed;
                top: -50px;
                left: 0px;
                right: 0px;
                height: 100px;

                /** Extra personal styles **/
                background-color: #0b395b;
                color: white;
                text-align: center;
                /*     line-height: 35px;*/

              }

              footer {
                position: fixed;
                bottom: -40px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: #0b395b;
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
      <!-- Define dompdf header and footer blocks before your subject matter content -->
     <!--  <header>
        <img src="https://www.cocogen.com/images/Fw%20_Renewal_Notice_Image/Letterhead%20Header.png" width="100%" height="100%"/>

      </header>

      <footer>

       <img src="https://www.cocogen.com/images/Fw%20_Renewal_Notice_Image/Letterhead%20-%20Footer.png" width="100%" height="100%"/>
     </footer> -->

  <body>
    <br><br><br>
    <h3 style='font-size:11pt !important; font-weight: bold;text-align:center !important'>CONFIRMATION OF INSURANCE</h3>

    <p>This is to confirm that the motor vehicle described below is coverd under Policy No. <strong> {{ $invoiceno }}</strong> is issued by <strong>COCOGEN INSURANCE, INC.</strong></p>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 14px;" border='0' >
      <tr>

        <td width="150">ISSUE DATE</td>
        <td width="25">:</td>
        <td>{{ date('F j, Y', strtotime($issuedate)) }}</td>
      </tr>
      <tr>
        <td width="50">ASSURED</td>
        <td width="25">:</td>
        <td>{{$assured}}</td>
      </tr>
      <tr>
        <td width="50">POLICY PERIOD</td>
        <td width="25">:</td>
        <td>From: 12:00 NOON of {{ date('F j, Y', strtotime($dtCreated)) }} </td>
      </tr>
      <tr>
        <td width="50"></td>
        <td width="25">:</td>
        <td>To: 12:00 NOON of {{ date('F j, Y', strtotime($dtCreated . ' +1 year')) }} </td>
      </tr>
      <tr>
        <td width="50">VEHICLE DETAIL</td>
        <td width="25">:</td>
        <td>{{ $model }}</td>
      </tr>
      <tr>
        <td width="50">PLATE NO. /CS NO.</td>
        <td width="25">:</td>
        <td>{{$plateNo}}</td>
      </tr>
      <tr>
        <td width="50">MOTOR / ENGINE NO.</td>
        <td width="25">:</td>
        <td>{{$engineNo}}</td>
      </tr>
      <tr>
        <td width="50">SERIAL / CHASSIS NO.</td>
        <td width="25">:</td>
        <td>{{$chassisNo}}</td>
      </tr>
      <tr>
        <td width="50">COLOR</td>
        <td width="25">:</td>
        <td>{{$color}}</td>
      </tr>
      <tr>
        <td width="50">COVERAGE.</td>
        <td width="25">:</td>
        <td></td>
      </tr>
    </table>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 14px;" border='0' >
      <tr>
        <td width="150">Own Damage</td>
        <td width="25">:</td>
       <td>Php</td>
       <td style='text-align:right'>{{ $ODTheft }}</td>
      </tr>
      @if($actsOfNature_check === '0.005')
      <tr>
        <td width="50">Acts of Nature</td>
        <td width="25">:</td>
        <td>Php</td>
        <td style='text-align:right'>{{ $actsOfNature }}</td>
      </tr>
      @else
      @endif
      @if($bodyType != 'TRUCK' || $bodyType != 'Truck')
      <tr>
        <td width="50">Riot,Strike and Civil Commotion</td>
        <td width="25">:</td>
        <td>Php</td>
        <td style='text-align:right'>{{ $RSCC }}</td>
        @else
      @endif
      </tr>

      <tr>
        <td width="50">VTPL - BI</td>
        <td width="25">:</td>
        <td>Php</td>
        <td style='text-align:right'>{{$bodilyInjury}}</td>
      </tr>
      <tr>
        <td width="50">VTPL - PD</td>
        <td width="25">:</td>
        <td>Php</td>
        <td style='text-align:right'>{{$propertyDamage}}</td>
      </tr>
      <tr>
        <td width="50">AUPA</td>
        <td width="25">:</td>
        <td>Php</td>
        <td style='text-align:right'>{{ $autoPA }}</td>
      </tr>
      <tr>
    </table>
    <p style='text-align:justify'>This further confirms that the aforesaid insurance policy is in full force and effect and loss or damage, if any, under
     this policy shall be payable to <span style="font-weight: bold;">{{ $mortgagee }}</span>. as specified in the Policy Schedule, as their interest may
    appear subject to the terms and conditions, warranties and clauses of this Policy in spite of non-presentation of COCOGEN’s Official Receipt.</p>
    <br>
    <p style='text-align:justify'> It is expressly understood that this Policy or any Renewal thereof shall not be cancelled without prior written
   notification to and conformity by <span style="font-weight: bold;">{{ $mortgagee }} </span>.</p>
    <div class="signature-container">
        <img src="{{ $imagePath }}" style="margin-top:-110px;right:300px;position: absolute;height:100px">
    </div>
  </body>
</html>
