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

  </head>
  <body>
    <!-- <header class='headerclass' style="width: 100%; margin-top: 0px; margin-bottom: 0px;">
      <img src="./asset/ecommerce/img/itp_cruise.jpg" style="width: 700px;z-index:1">
    </header> -->
    <div style="position: relative;">
    <img src="./asset/ecommerce/img/itp_cruise.jpg" 
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;" 
        alt="Cruise Image">
    <div style="position: relative; z-index: 1; color: #000; padding: 20px;font-size:11px !important;top:153px;left:370px;font-weight:700">
        <p>{{$policyno}}</p>
    </div>
    <div style="position: relative; z-index: 1; color: #000; padding: 20px;font-size:11px !important;top:120px;left:240px;font-weight:500">
        <p>{{$from_date}}</p>
    </div>

    <div style="position: relative; z-index: 1; color: #000; padding: 20px;font-size:11px !important;top:45px;left:400px;font-weight:500">
        <p>{{$to_date}}</p>
    </div>
    </div>

    <table class='center'  widht='100%'>
        <tr>
            <td >
                <span style='font-size:9px;height:10px;top:200px;position:absolute;z-index:999 !important'> </span>
            </td>
        </tr>
    </table>

  </body>
</html>
