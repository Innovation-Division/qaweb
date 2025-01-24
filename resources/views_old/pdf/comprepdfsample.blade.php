
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

    </style>
  </head>
  <body>
    <h3>CONFIRMATION OF INSURANCE</h3>
    <p>This is to confirm that the motor vehicle described hereunder is insured with <strong> Cocogen Insurance, Inc. </strong> through our e-commerce.</p>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 14px;">
      <tr>

        <td width="50">Assured</td>
        <td width="25">:</td>
        <td>{{$assured}}</td>
      </tr>
      <tr>
        <td width="50">Address</td>
        <td width="25">:</td>
        <td>{{$address}}</td>
      </tr>
      <tr>
        <td width="50">Model</td>
        <td width="25">:</td>
        <td>{{$model}}</td>
      </tr>
      <tr>
        <td width="50">Make</td>
        <td width="25">:</td>
        <td>-</td>
      </tr>
      <tr>
        <td width="50">Type Of Body</td>
        <td width="25">:</td>
        <td>{{$bodyType}}</td>
      </tr>
      <tr>
        <td width="50">Color</td>
        <td width="25">:</td>
        <td>{{$color}}M</td>
      </tr>
      <tr>
        <td width="50">Serial No.</td>
        <td width="25">:</td>
        <td>{{$chassisNo}}</td>
      </tr>
      <tr>
        <td width="50">Motor No.</td>
        <td width="25">:</td>
        <td>{{$engineNo}}</td>
      </tr>
      <tr>
        <td width="50">Plate No.</td>
        <td width="25">:</td>
        <td>{{$plateNo}}</td>
      </tr>
      <tr>
        <td width="50">Accesories</td>
        <td width="25">:</td>
        <td>BUILT-IN AIRCON, BUILT-IN STEREO</td>
      </tr>
      <tr>
        <td width="50">Policy Period </td>
        <td width="25">:</td>
        <td>{{$inceptDate}}</td>
      </tr>
      <tr>
        <td width="50">CTPL</td>
        <td width="25">:</td>
        <td>Php 0.00</td>
      </tr>
      <tr>
        <td width="50">Own Damage/Theft</td>
        <td width="25">:</td>
        <td>Php {{$ODTheft}}</td>
      </tr>
      <tr>
        <td width="50">Bodily Injury</td>
        <td width="25">:</td>
        <td>Php {{$bodilyInjury}}</td>
      </tr>
      <tr>
        <td width="50">Property Damage</td>
        <td width="25">:</td>
        <td>Php {{$propertyDamage}}</td>
      </tr>
      <tr>
        <td width="50">Auto PA</td>
        <td width="25">:</td>
        <td>Php 412,000.00</td>
      </tr>
      <tr>
        <td width="50">Acts of God</td>
        <td width="25">:</td>
        <td>Php {{$autoPA}}</td>
      </tr>
      <tr>
        <td width="50">RSCC</td>
        <td width="25">:</td>
        <td>Php {{$RSCC}}</td>
      </tr>
      <tr>
        <td width="50">Deductible</td>
        <td width="25">:</td>
        <td>Php {{$deductible}}</td>
      </tr>
      <tr>
        <td width="50">With Ref No.</td>
        <td width="25">:</td>
        <td>{{$txnid}}</td>
      </tr>
      <tr>
        <td width="50">Authentication fee</td>
        <td width="25">:</td>
        <td>Php 0.00</td>
      </tr>
      <tr>
        <td width="50">Gross Premium</td>
        <td width="25">:</td>
        <td>Php {{$finalDue}}</td>
      </tr>
      <tr>
        <td width="50">Promo Code</td>
        <td width="25">:</td>
        <td>{{$promoCode}}</td>
      </tr>
      <tr>
        <td width="50">Mortgagee</td>
        <td width="25">:</td>
        <td>{{$mortgagee}}</td>
      </tr> 
    </table>
    <p>IT IS HEREBY DECLARED AND AGREED tht LOSSS &/OR DAMAGE, if any, under this policy is payable to BANK OF COMMERNCE as their interest may appear subject to the terms and conditions of the policy.</p>
    <p>IT IS HEREBY DECLARED AND AGREED that this policy or any renewals thereif shall not be cancelled without any prior written notification and conformity of the mortgagee stated herein.</p>
    <p>The company shall honor all legitimate claims arising out of this policy while the insurance is in full force and effect even without the presentation of the official receipt.</p>
    <p>This confirmation is being issued upon the request of the Assured for whatever purpose it may serve.</p>
    <p style="font-style: italic;opacity: 0.9">---------------------------------------------------This is a computer generated document --------------------------------------------</p>
  </body>
</html>