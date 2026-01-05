<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Confirmation of Cover</title>
  <style>
  @page {
    margin: 0;
  }

  body {
    font-family: Arial, sans-serif;
    font-size: 11pt;
    margin: 130px 100px 100px 100px; 
  }

  h3 {
    text-align: center;
    font-weight: bold;
    font-size: 12pt;
  }

  p {
    text-align: justify;
    margin-bottom: 12px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
  }
.info-table {
  margin-bottom: 20px;
  margin-top: 20px;
}
.info-table td {
  padding: 4px 0 10px 0; 
  vertical-align: top;
}


  .info-table td:first-child {
    width: 160px;
    font-weight: bold;
  }

  .info-table td:nth-child(2) {
    width: 10px;
  }

  .claim-box {
    border: 1px solid #000;
    padding: 10px;
    font-size: 12pt;
  }

  .claim-box b {
    font-weight: bold;
  }

  .claim-box p {
    margin: 8px 0;
  }

  td {
    margin-top: 15px;
  }

  .footer-note {
    font-style: italic;
    font-size: 11pt;
    text-align: justify;
  }

  header, footer {
    position: fixed;
    width: 100%;
    height: 100px;
    left: 0;
  }

  header {
    top: 0;
  }

  header img {
    display: block;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    object-fit: cover;
  }

  footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  height: auto;
  left: 0;
  text-align: center;
}

footer img {
  display: inline-block;
  height: auto;
  width: auto;
  max-width: 100%;
  max-height: 100px;
}


</style>

</head>
<body>

  <header>
    <img src="{{ $header }}" width="100%" height="100%">
  </header>

  <h3 style="margin-bottom:0px;">CONFIRMATION OF COVER</h3>

  <p>
    Cocogen Insurance, Inc. hereby agrees, in consideration of payment of the premiums due, to indemnify the Insured declared up to the Sum Insured stated hereunder, subject to the terms & conditions of the policy.
  </p>
  <table class="info-table">
  <tr><td>REFERENCE NO.</td><td>:</td><td>{{ $reference_no }}</td></tr>
  <tr><td>INSURED</td><td>:</td><td>{{ $assured }}</td></tr>
  <tr><td>ADDRESS</td><td>:</td><td>{{ $houseNo }} {{ $street }}, {{ $barangay }}, {{ $city }}, {{ $province }}, {{ $region }}, {{ $country }}</td></tr>
  <tr><td>POLICY PERIOD</td><td>:</td><td>{{ date('F j, Y', strtotime($dtCreated)) }} to {{ date('F j, Y', strtotime($dtCreated . ' +1 year')) }}</td></tr>
  <tr><td>ISSUE DATE</td><td>:</td><td>{{ date('F j, Y', strtotime($issuedate)) }}</td></tr>
  <tr>
    <td>SUM INSURED<br>& COVERAGE</td> 
<td>:</td>
<td style="padding-top: 0; margin-top: 0;">
  <table style="width:100%; margin-bottom: 0; padding-bottom: 0;">
    <tr>
      <td style="padding-left: 3px; font-weight: normal;">Electronic Fund Transfer Fraud</td>
      <td style="padding-left: 10px;">Php {{ $premium_details }}</td>
    </tr>
    <tr>
      <td style="padding-left: 3px; font-weight: normal;">Online Retail Fraud</td>
      <td style="padding-left: 10px;">Php {{ $premium_details }}</td>
    </tr>
    <tr>
      <td style="padding-left: 3px; font-weight: normal;">Identity Theft</td>
      <td style="padding-left: 10px;">Php {{ $premium_details }}</td>
    </tr>
    @if($showCyberbullying)
    <tr>
      <td style="padding-left: 3px; font-weight: normal;">Cyber Bullying</td> 
      <td style="padding-left: 10px;">Php {{ $premium_details }}</td>
    </tr>
    @endif
  </table>
</td>


  </tr>
    <tr><td style="margin-bottom: 0; padding-bottom: 0;">TOTAL SUM INSURED</td><td>:</td><td>Php {{ $sum_insured }}</td></tr>
   <tr><td><b>TOTAL PREMIUM</b></td><td>:</td><td colspan="2">Php {{ $total_premium_amount }}</td></tr>
</table>
  <div class="claim-box">
    <p style="text-align: center; font-weight: bold; margin: 0;"><u>NOTICE OF CLAIM</u></p><br>
    <p style="margin: 5px 0;">
      You must contact <b>DynaRisk at (+632) 8231 2102</b> <b>within 72 hours</b> after discovering any circumstance that would likely result in a loss.
    </p>
    <p style="margin: 15px 0;">
      You must <b>report the incident to the police</b> and your bank/ financial institution/ card issuer (where applicable) <b>within 24 hours of discovery</b>.
    </p>
  </div>
<br>
  <p class="footer-note">
    The above described coverage is neither a complete description nor a complete list of all the terms, conditions and exclusions. Note that certain terms used above are defined in the policy. Please see the policy for a complete description of its scope and limitations of coverage.
  </p>
  <p class="footer-note" style="text-align: center;">This is a computer-generated document.</p>
<footer>
  <img src="{{ $footer }}" alt="Footer Image">
</footer>

</body>
</html>
