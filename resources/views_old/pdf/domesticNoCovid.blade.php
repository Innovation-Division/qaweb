
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
         // line-height: 4px;
        }

        h3{
          font-family: Helvetica;
          text-align: center;
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

    <header style="width: 100%; margin-top: 0px; margin-bottom: 10px;">
        <img src="./images/Fw _Renewal_Notice_Image/Letterhead Header.png" style="width: 800px;height: 105px;">
    </header>
    <footer style="width: 100%;" id="footer">
         <img src="./images/Fw _Renewal_Notice_Image/Letterhead - Footer.png" style="width: 120%;height: 50px;">
    </footer>
    <br><br>
    <br><br>
    <br><br>
    <h3>ACCIDENT POLICY SCHEDULE</h3>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 59;">Line</td>
        <td style="width: 230;">: PERSONAL ACCIDENT</td>
        <td style="">Policy Period</td>
      </tr>
    </table>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 50;">Subline</td>
        <td style="width: 250;">: INDIVIDUAL DOMESTIC TRAVEL</td>
        <td style="width: 100;">From : {{$from_date}}</td>
        <td style="">12:00:00 NOON</td>
      </tr>
      <tr>
        <td style="width: 50;">Place Issued </td>
        <td style="width: 250;">: MAKATI CITY</td>
        <td style="width: 100;">To&nbsp;&nbsp;&nbsp;&nbsp; : {{$to_date}}</td>
        <td style="">12:00:00 NOON</td>
      </tr>
      <tr>
        <td style="width: 50;">Issue Date</td>
        <td colspan="3" style="width: 250;">: {{$created_at}}</td>
      </tr>
    </table>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 59;">Policy No. </td>
        <td style="width: 180;">: {{$trans_id}}</td>
        <td style="width: 150;">PREMIUM</td>
        <td style="width: 50;">: PHP</td>
        <td style="text-align: right;">{{$net_prem}}</td>
      </tr>
      <tr>
        <td style="width: 59;">Insured </td>
        <td style="width: 180;">: {{$full_name}}</td>
        <td style="width: 130;">LOCAL GOVERNMENT TAX</td>
        <td style="width: 50;">:  </td>
        <td style="text-align: right;">{{$lgt_tax}}</td>
      </tr>
      <tr>
        <td style="width: 59;">Address </td>
        <td style="width: 180;">: {{$address}}</td>
        <td style="width: 130;">PREMIUM TAXss</td>
        <td style="width: 50;">:  </td>
        <td style="text-align: right;">{{$prem_tax}}</td>
      </tr>
      <tr>
        <td style="width: 59;"> </td>
        <td style="width: 180;">&nbsp; {{$address2}}</td>
        <td style="width: 130;">DOCUMENTARY STAMPS</td>
        <td style="width: 50;">:  </td>
        <td style="text-align: right;">{{$doc_stamp}}</td>
      </tr>
      <tr>
        <td style="width: 59;"> </td>
        <td style="width: 180;">&nbsp; {{$address3}}</td>
        <td style="width: 130;">{{$amount_due_title}}</td>
        <td style="width: 50;">{{$promo_mid}}  </td>
        <td style="text-align: right;">{{$amount_due}}</td>
      </tr>
      <tr>
        <td style="width: 59;"> </td>
        <td style="width: 180;"></td>
        <td style="width: 130;"><i>{{$promo_title}}</i></td>
        <td style="width: 50;">{{$promo_mid}}  </td>
        <td style="text-align: right;"><i>{{$promo_less}}</i></td>
      </tr>
      <tr>
        <td style="width: 59;"> </td>
        <td style="width: 180;"></td>
        <td style="width: 130;border-top: 2px solid #000000;"><strong>Final Amount Due </strong></td>
        <td style="width: 50;border-top: 2px solid #000000">: <strong>PHP </strong> </td>
        <td style="text-align: right;border-top: 2px solid #000000"><strong>{{$final_due}}</strong></td>
      </tr>
    </table>
    <p style="line-height: 4px;">Period of Travel:  {{$from_date}} to  {{$to_date}} (Both dates inclusive)</p>
    <p style="line-height: 4px;" >Travel Destination: {{$destinations}}</p>
    <p style="line-height: 4px;">Birth date: {{$bday}}</p>
    <p style="line-height: 4px;">Age: {{$age}}</p>

    <h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;">CLIENT'S INFORMATION</h5>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 70;">Name</td>
        <td style="">: &nbsp;&nbsp; {{$full_name}}</td>
      </tr>
       <tr>
        <td style="width: 70;">No. of Persons</td>
        <td style="">: &nbsp;&nbsp; 1</td>
      </tr>
    </table>
    <h6>BENEFICIARY INFORMATION</h6>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 300;text-align: center;border-bottom: 2px solid #000000"><strong>Beneficiary</strong></td>
        <td style="width: 200;text-align: center;border-bottom: 2px solid #000000"><strong>Relation</strong></td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">{{$name1}}</td>
        <td style="width: 200;text-align: left;">{{$relation1}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">{{$name2}}</td>
        <td style="width: 200;text-align: left;">{{$relation2}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">{{$name3}}</td>
        <td style="width: 200;text-align: left;">{{$relation3}}</td>
      </tr>
    </table>

     <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 200;text-align: center;border-bottom: 2px solid #000000">Beneficiary</td>
        <td colspan="2" style="width: 100;text-align: center;border-bottom: 2px solid #000000">Relation</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">ACCIDENTAL DEATH/DISABLEMENT</td>
        <td style="width: 20;text-align: left;">PHP</td>
        <td style="width: 80;text-align: right;">{{$bene_item1}}</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">ACCIDENTAL BURIAL BENEFIT </td>
        <td style="width: 20;text-align: left;">PHP</td>
        <td style="width: 80;text-align: right;">{{$bene_item2}}</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">MEDICAL REIMBURSEMENT</td>
        <td style="width: 20;text-align: left;">PHP</td>
        <td style="width: 80;text-align: right;">{{$bene_item3}}</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">UNPROVOKED MURDER & ASSAULT</td>
        <td style="width: 20;text-align: left;">PHP</td>
        <td style="width: 80;text-align: right;">{{$bene_item4}}</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">{{$covid_bene_title}}</td>
        <td style="width: 20;text-align: left;">{{$covid_php}}</td>
        <td style="width: 80;text-align: right;">{{$bene_item5}}</td>
      </tr>

      
    </table>
    <h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;">WARRANTIES AND CLAUSES</h5>
    <h6>INFECTIOUS DISEASE EXCLUSIONS CLAUSE</h6>
    <p>Notwithstanding any provision to the contrary, this policy is not liable for and excludes any loss, damage, liability, expense, fines, penalties or any other amount directly or indirectly caused by, in connection with, or in any way involving or arising out of any of the following - including any fear or threat thereof, whether actual or perceived:</p><br><br>
    <div class="page_break"></div>
    <br><br><br><br><br><br><br><br>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 10px;">-</td>
        <td>Any infectious disease, virus, bacterium or other microorganism (whether asymptomatic or not); or</td>
      </tr>
      <tr>
        <td style="width: 10px;">-</td>
        <td>severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2) or coronavirus disease (COVID-19), including any mutation or variation thereof; or</td>
      </tr>
      <tr>
        <td style="width: 10px;">-</td>
        <td>Pandemic or epidemic, as declared as such by the World Health Organization or any governmental authority.</td>
      </tr>
    </table>

    
    <p>If the Insurer alleges that, by reason of this exclusion, any amount is not covered by this agreement, the burden of proving the contrary shall rest on the Insured.</p>
    <h6>BENEFICIARY ENDORSEMENT</h6>
    <p>IT IS HEREBY DECLARED AND AGREED that the beneficiary of an Insured shall be the first surviving class of the following classes of beneficiaries, otherwise the estate of the Insured: 1. Spouse; 2. Children; 3. Parents; 4. Brothers and/or Sisters.</p>
    <p>Nothing herein contained shall be held to vary, alter, waive or change any of the terms, limits or condition of the Policy except as herein above set forth.</p>

    <h6>SABOTAGE AND TERRORISM INCLUSION ENDORSEMENT</h6>
    <p>Subject to the exclusions, limits and conditions hereinafter contained, this Insurance insures bodily injury sustained by the Insured occurring during the period of this Policy caused by an Act of Terrorism or Sabotage, as herein defined.</p>
    <p>For the purpose of this Insurance:</p>

    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 10px;">-</td>
        <td>an Act of Terrorism means an act or series of acts, including the use of force or violence, of any person or group(s) of persons, whether acting alone or on behalf of or in connection with any organization(s), committed for political, religious or ideological purposes including the intention to influence any government and/or to put the public in fear for such purposes.</td>
      </tr>
       <tr>
        <td style="width: 10px;">-</td>
        <td>an act of sabotage means a subversive act or series of such acts committed for political, religious or ideological purposes including the intention to influence any government and/or to put the public in fear for such purposes. </td>
      </tr>
    </table>
    <p>This insurance excludes any bodily injury sustained by the Insured:</p>
    <p>a) acts of terrorism or sabotage occurring in the Provinces of Basilan, Lanao del Sur, Maguindanao, Sulu, Tawi-tawi and/or Marawi;</p>
    <p>b) caused by measures taken to prevent, suppress or control actual or potential terrorism or sabotage unless agreed by the Company in writing prior to such measures being taken; </p>
    <p>c) arising directly or indirectly from nuclear detonation, nuclear reaction, nuclear radiation or radioactive contamination, however such nuclear detonation, nuclear reaction, nuclear radiation or radioactive contamination may have been caused. directly or indirectly by war, invasion or warlike operations (whether war be declared or not), hostile acts of sovereign or local government entities, civil war, rebellion, revolution, insurrection, martial law, usurpation of power, or civil commotion assuming the proportions of or amounting to an uprising; </p>
    <p>d) arising directly or indirectly from or in consequence of chemical or biological emission, release, discharge, dispersal or escape or chemical or biological exposure of any kind.</p>

   <div class="page_break"></div>
    <br><br><br><br><br><br><br>
    <br>
    <h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;">GENERAL INFORMATION</h5>
     

    <p>DOMESTIC - {{$package}} TRAVEL ASSISTANCE ({{$mode_trasno}})</p>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 300;text-align: center;border-bottom: 2px solid #000000"><strong>Coverage</strong></td>
        <td style="width: 200;text-align: center;border-bottom: 2px solid #000000"><strong>Limits</strong></td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">Medical expenses (with Sabotage and Terrorism)and hospitalization </td>
        <td style="width: 200;text-align: right;">Php {{$cover_item1}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">Transport of repatriation in case of illness or accident </td>
        <td style="width: 200;text-align: right;">Actual Expense</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">Repatriation of mortal remains </td>
        <td style="width: 200;text-align: right;">Actual Expense</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">Pre-existing Condition within the Look Back Period </td>
        <td style="width: 200;text-align: right;">Php {{$cover_item4}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">Trip Cancellation </td>
        <td style="width: 200;text-align: right;">Php {{$cover_item5}}</td>
      </tr>
       <tr>
        <td style="width: 300;text-align: left;">Trip Curtailment </td>
        <td style="width: 200;text-align: right;">Php {{$cover_item6}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">{{$cover_title_item7}}</td>
        <td style="width: 200;text-align: right;">{{$cover_content_item7}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">{{$cover_title_item8}}</td>
        <td style="width: 200;text-align: right;">{{$cover_content_item8}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">{{$cover_title_item9}}</td>
        <td style="width: 200;text-align: right;">{{$cover_content_item9}}</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">Long distance medical information services  </td>
        <td style="width: 200;text-align: right;">Actual Expense</td>
      </tr>
      <tr>
        <td style="width: 300;text-align: left;">Medical referral/appointment of local medical specialists </td>
        <td style="width: 200;text-align: right;">Actual Expense</td>
      </tr>
        <tr>
        <td style="width: 300;text-align: left;">Connection Services </td>
        <td style="width: 200;text-align: right;"> Actual Expense</td>
      </tr>
    </table>
     <h6>FOR CASHLESS SETTLEMENT OF TRAVEL ASSISTANCE SERVICES:</h6>

    <p ><strong> Call Cocogen Insurance 24/7 Hotline Number - (+632) 8459-4736 for every occurrence</strong></p>

    <p>For In-Patient and Out-Patient Cases, the Insured must notify the Insurer PRIOR to being discharged from the  hospital. Non advice to the Insurer prior to Insured being discharged is a ground for denial of the claim.</p>

    <p>PURPOSE: LEISURE</p>
    <p>IN WITNESS WHEREOF, the company has caused this policy to be signed by its duly authorized officer / representative as of the date of issue at .</p>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 300;text-align: center;">&nbsp;</td>
        <td style="width: 200;text-align: center;"><strong>COCOGEN INSURANCE, INC.</strong></td>
      </tr>
      <tr>
        <td style="width: 300;text-align:">&nbsp;</td>
        <td style="width: 200;text-align: center;">   <img src="./images/DCP.png" style="width: 200px;height: 100px;"></td>
      </tr>
      <tr>
        <td style="width: 300;text-align:">&nbsp;</td>
        <td style="width: 200;text-align: center;border-bottom: 2px solid #000000"><strong>ATTY. DAVID C. PADIN</strong></td>
      </tr>
      <tr>
        <td style="width: 300;text-align:">&nbsp;</td>
        <td style="width: 200;text-align: center;">President</td>
      </tr>
    </table>
  </body>
</html>