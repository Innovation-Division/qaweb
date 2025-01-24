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
        .page_break {
        page-break-after: always;
        }
        p{
          font-family: Helvetica;
          font-size: 11px;
        }

        h3{
          font-family: Helvetica;
          text-align: center;
          font-size:13px !important;
            font-weight: bold;
        }

        h5{
          margin-bottom: 0px;
          font-family: Helvetica;
          font-size:13px !important;
             font-weight: bold;
        }
        h6{
          margin-bottom: 0px;
          font-family: Helvetica;
          font-size:13px !important;
             font-weight: bold;
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
        span{
            font-family: Helvetica;
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
        #subheader{
        font-size:13px !important;
        font-weight: bold;
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
        <td style="width: 250;">: INDIVIDUAL INTERNATIONAL TRAVEL</td>
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
        <td style="width: 50;">: US$</td>
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
        <td style="width: 130;">PREMIUM TAX</td>
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
        <td style="width: 50;border-top: 2px solid #000000">: <strong>US$ </strong> </td>
        <td style="text-align: right;border-top: 2px solid #000000"><strong>{{$final_due}}</strong></td>
      </tr>
    </table>
    <p style="line-height: 4px;">Period of Travel:  {{$from_date}} to  {{$to_date}} (Both dates inclusive)</p>
    @if($covid_check =='Yes')
    <p style="line-height: 4px;">COVID-19 Period of Travel:  {{$from_date}} to  {{$to_date_covid}} (Both dates inclusive)</p>
    @endif

    <h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;">CLIENT'S INFORMATION</h5>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 70;">Name</td>
        <td style="">: &nbsp;&nbsp; {{$full_name}}</td>
      </tr>
      <tr>
        <td style="width: 70;">Age</td>
        <td style="">: &nbsp;&nbsp; {{$age}}</td>
      </tr>
      <tr>
        <td style="width: 70;">Birth date</td>
        <td style="">: &nbsp;&nbsp; {{$bday}}</td>
      </tr>
       <tr>
        <td style="width: 70;">Travel Destination:</td>
        <td style="">: &nbsp;&nbsp;{{$destinations}}</td>
      </tr>

    </table>
    <!-- <h6>BENEFICIARY INFORMATION</h6>
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
    </table> -->

     <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 200;text-align: center;border-bottom: 2px solid #000000">Beneficiary</td>
        <td colspan="2" style="width: 100;text-align: center;border-bottom: 2px solid #000000">Sum Insured</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">ACCIDENTAL DEATH/DISABLEMENT</td>
        <td style="width: 20;text-align: left;">US$</td>
        <td style="width: 80;text-align: right;">{{$bene_item1}}</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">BURIAL BENEFIT </td>
        <td style="width: 20;text-align: left;">US$</td>
        <td style="width: 80;text-align: right;">{{$bene_item2}}</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">PERSONAL LIABILITY</td>
        <td style="width: 20;text-align: left;">US$</td>
        <td style="width: 80;text-align: right;">{{$bene_item3}}</td>
      </tr>
      <tr>
        <td style="width: 200;text-align: left;">TRAVEL ASSISTANCE SERVICE</td>
        <td style="width: 20;text-align: left;">US$</td>
        <td style="width: 80;text-align: right;">{{$bene_item6}}</td>
      </tr>

      @if($covid_check =='Yes')
      <tr>
        <td style="width: 200;text-align: left;">COVID-19 Coverage Endorsement </td>
        <td style="width: 20;text-align: left;">US$</td>
        <td style="width: 80;text-align: right;">{{$bene_item4}}</td>
      </tr>
      @endif
    </table>

    <h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;font-size:13px">WARRANTIES AND CLAUSES</h5>

    <span style="font-size:13px"> <strong>INFECTIOUS DISEASE EXCLUSIONS CLAUSE</strong></span>

    <p style="font-size:11px !important">Notwithstanding any provision to the contrary, this policy is not liable for and excludes any loss, damage, liability, expense, fines, penalties or any other amount directly or indirectly caused by, in connection with, or in any way involving or arising out of any of the following - including any fear or threat thereof, whether actual or perceived:</p>

    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 11px;">
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


    <p style="font-size:11px !important">If the Insurer alleges that, by reason of this exclusion, any amount is not covered by this agreement, the burden of proving the contrary shall rest on the Insured.</p>

    <div class="page_break"></div>
    <br><br><br>
    @if($covid_check =='Yes')
        <p>Attached to  and forming part of {{$trans_id}}</p>
    <span style='font-size:13px'><strong>{{$package}} COVID-19 ENDORSEMENT</span></p>
       <br>
         <span style="font-size:11px"> <strong>INSURING CONDITIONS:</strong></span>
			<p style="font-size:11px !important">This policy includes COVID-19 Coverage for Insured Traveller to respect of the following Benefits:</p>
			<table class="table1" style="font-family: Helvetica;border: 1;text-align: left;border: 1px;font-size: 11px;">
        <tr>
          <td style="width: 10px;">&nbsp;</td>
                <td><p style="font-size:11px !important">a. Medical Expense and Hospitalization while abroad:**</p>
              <p style="font-size:11px !important">-This policy extends to cover Medical Expense and Hospitalization directly due to COVID-19 while travelling outside of the Philippines subject to the limit below:</p>
           </td>
        </tr>
        <tr>
        <td style="width: 10px;"> </td>
        <td style="font-size:11px !important">{{ $limit_1}}</td>
        </tr>
        <tr>
        <td style="width: 10px;">&nbsp;</td>
                <td><p style="font-size:11px !important">b. Transport and repatriation in case of COVID-19 illness:**</p>
		            <p style="font-size:11px !important">-This policy extends to cover transport and repatriation in case of COVID-19 illness up to the limit stated below:</p>
           </td>
        </tr>
        <tr>
        <td style="width: 10px;"> </td>
        <td>{{ $limit_2}}</td>
        </tr>
      </table>

        <table class="table1" style="font-family: Helvetica;border: 1;text-align: left;border: 1px;font-size: 11px !important;">

        <tr>
        <td style="width: 10px;">&nbsp;</td>
                <td><p style="font-size:11px !important">c. Repatriation of Mortal Remains: </p>
		        <p style="font-size:11px !important">- This policy extends to cover repatriation of mortal remains in case of death due to COVID-19 subject to the limit stated below. </p>
           </td>
        </tr>
        <tr>
        <td style="width: 10px;"> </td>
        <td style="font-size:11px !important">{{ $limit_3 }} </td>
        </tr>
      </table>
      <p style="font-size:11px !important">** Wordings based on Cocogen Travel Excel Plus -International Travel Personal Accident Insurance Policy.</p>

     <span style="font-size:11px"> <strong>GEOGRAPHICAL LIMIT</strong></span>
      <p style="font-size:11px"><strong>Worldwide <strong></p>
      <span style="font-size:11px !important"><strong>PERIOD OF INSURANCE  </strong></span>
      <p style="font-size:11px !important">Notwithstanding what is stated elsewhere in the policy, this endorsement shall be effective from the date of the Insured's departure from the Philippines up to the date of the Insured's arrival at the Philippines as stated in the Policy Schedule:</p>
      <p style="font-size:11px !important">a. For Single Trip Policy - up to travel period maximum of one hundred-eighty (180) days consecutive</p>
      <p style="font-size:11px !important">b. For Multiple Trip Annual Policy - travel period maximum of sixty (60) days consecutive per trip</p>

      <h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;font-size:13px">WARRANTY</h5>
      <p style="font-size:11px !important">Depending on travel protocols of the country of destination, it is warranted that:</p>
      <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 11px !important;">
      <tr>
        <td style="width: 10px;"></td>
        <td>1. Insurer will no longer require submission of COVID-19 negative result of the Insured traveling to countries that no longer requiring submission of COVID-19 negative results upon arrival;</td>
      </tr>
      <tr>
        <td style="width: 10px;"></td>
        <td>2. Insured Traveller must have a negative test result of a valid RT-PCR COVID-19 test administered within seventy-two hours (72) or any COVID-19 testing protocols required by the country of destination before the actual departure from the Philippines;</td>
      </tr>
      <tr>
        <td style="width: 10px;"></td>
        <td>3. COVID-19 RT-PCR or any COVID-19 testing protocols must have been administered by any of the Department of Health (DOH) authorized and licensed laboratory, clinics, hospitals and medical facilities</td>
      </tr>
    </table>
    <div class="page_break"></div>
    <br><br><br><br>
    <p>Attached to  and forming part of {{$trans_id}}</p>
    <span style="font-size:13px"> <strong>EXCLUSIONS</strong></span>
    <p>This policy does not cover costs, expenses, liability and any consequential loss due to:  </p>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 11px;">
      <tr>
        <td style="width: 10px;"></td>
        <td>1.Denial of entry at final destination if the Insured is diagnosed positive of COVID-19; </td>
      </tr>
      <tr>
        <td style="width: 10px;"></td>
        <td>2.COVID-19 RT-PCR testing and quarantine bed due to mandatory requirement of country of destination prior to departure; </td>
      </tr>
      <tr>
        <td style="width: 10px;"></td>
        <td>3.Change of travel decision due to fear of COVID-19 infection; </td>
      </tr>
      <tr>
        <td style="width: 10px;"></td>
        <td>4.Vaccinations and other complications; and </td>
      </tr>
      <tr>
        <td style="width: 10px;"></td>
        <td>5.Any Pandemic and Epidemic Disease other than Covid-19. </td>
      </tr>
    </table>
    <p style="font-size:11px !important">Except as varied in this endorsement, all other terms and conditions in the COCOGEN Travel Excel Protect policy remain unaltered.</p>
      @endif
      @if($covid_check =='No')

    <br><br>
    <p>Attached to  and forming part of {{$trans_id}}</p>
      @endif

    <span style="font-size:13px !important"><strong>BENEFICIARY ENDORSEMENT</strong></span>
    <p style="font-size:11px !important">IT IS HEREBY DECLARED AND AGREED that the beneficiary of an Insured shall be the first surviving class of the following classes of beneficiaries, otherwise the estate of the Insured: 1. Spouse; 2. Children; 3. Parents; 4. Brothers and/or Sisters.</p>
    <p style="font-size:11px !important">Nothing herein contained shall be held to vary, alter, waive or change any of the terms, limits or condition of the Policy except as herein above set forth.</p>

    <span style="font-size:13px !important"><strong>SABOTAGE AND TERRORISM INCLUSION ENDORSEMENT</strong></span>
    <p style="font-size:11px !important">Subject to the exclusions, limits and conditions hereinafter contained, this Insurance insures bodily injury sustained by the Insured occurring during the period of this Policy caused by an Act of Terrorism or Sabotage, as herein defined.</p>
    <p style="font-size:11px !important">For the purpose of this Insurance:</p>

    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 11px !important">
      <tr>
        <td style="width: 10px;">-</td>
        <td>an Act of Terrorism means an act or series of acts, including the use of force or violence, of any person or group(s) of persons, whether acting alone or on behalf of or in connection with any organization(s), committed for political, religious or ideological purposes including the intention to influence any government and/or to put the public in fear for such purposes.</td>
      </tr>
       <tr>
        <td style="width: 10px;">-</td>
        <td>an act of sabotage means a subversive act or series of such acts committed for political, religious or ideological purposes including the intention to influence any government and/or to put the public in fear for such purposes. </td>
      </tr>
    </table>
    <p style="font-size:11px !important">This insurance excludes any bodily injury sustained by the Insured:</p>
    <p style="font-size:11px !important">a) acts of terrorism or sabotage occurring in the Provinces of Basilan, Lanao del Sur, Maguindanao, Sulu, Tawi-tawi and/or Marawi;</p>
    <p style="font-size:11px !important">b) caused by measures taken to prevent, suppress or control actual or potential terrorism or sabotage unless agreed by the Company in writing prior to such measures being taken; </p>

    <p>c) arising directly or indirectly from nuclear detonation, nuclear reaction, nuclear radiation or radioactive contamination, however such nuclear detonation, nuclear reaction, nuclear radiation or radioactive contamination may have been caused. directly or indirectly by war, invasion or warlike operations (whether war be declared or not), hostile acts of sovereign or local government entities, civil war, rebellion, revolution, insurrection, martial law, usurpation of power, or civil commotion assuming the proportions of or amounting to an uprising; </p>
    <p>d) arising directly or indirectly from or in consequence of chemical or biological emission, release, discharge, dispersal or escape or chemical or biological exposure of any kind.</p>

    <div class="page_break"></div>
    <br><br><br>
    <p>Attached to  and forming part of {{$trans_id}}</p>
    <h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;font-size:13px" >GENERAL INFORMATION</h5>
<table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 11px;">
  <tr>
    <td style="width: 300;text-align: center;border-bottom: 2px solid #000000"><strong>Coverage</strong></td>
    <td style="width: 200;text-align: center;border-bottom: 2px solid #000000"><strong>Limits of Liability</strong></td>
  </tr>


  <tr>

    <td style="width: 300;text-align: left;">1.Medical expense and hospitalization abroad</td>
    <td style="width: 200;text-align: right;">{{$medical_expense}}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">2.Transport or repatriation in case of illness or accident </td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>

    <td style="width: 300;text-align: left;">3.Emergency dental care</td>
     <td style="width: 200;text-align: right;">{{$emergency_dental}}</td>
  </tr>
  <tr>

    <td style="width: 300;text-align: left;">4.Hospital Cash Income</td>
       <td style="width: 200;text-align: right;">{{$hospital_cash}}</td>
  </tr>
  <tr>

    <td style="width: 300;text-align: left;">5.Repatriation of family member traveling with the Insured          </td>
     <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
   <tr>
    <td style="width: 300;text-align: left;">6.Repatriation of mortal remains</td>
     <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">7.Escort of dependent child</td>
     <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">8.Travel of one immediate family member</td>
    <td style="width: 200;text-align: right;">{{$travel_of_one_family}}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">9.Emergency return home following death of a close family Member</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">10.Delivery of medicines</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">11.Relay of urgent messages</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
   <tr>
    <td style="width: 300;text-align: left;">12.Long distance medicinal information service</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
    <tr>
    <td style="width: 300;text-align: left;">13.Medical referral/appointment of local medical specialist</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">14.Connection Services</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
    <tr>
    <td style="width: 300;text-align: left;">15.Advance of Bail Bond</td>
    <td style="width: 200;text-align: right;">{{$advance_of_bail}}</td>
  </tr>
    <tr>
    <td style="width: 300;text-align: left;">16.Trip Cancellation</td>
      <td style="width: 200;text-align: right;">{{$trip_cancel}}</td>
  </tr>
     <tr>
    <td style="width: 300;text-align: left;">17.Trip Curtailment</td>
       <td style="width: 200;text-align: right;">{{$trip_curtail}}</td>
  </tr>
     <tr>
    <td style="width: 300;text-align: left;">18.Delayed Departure</td>
           <td style="width: 200;text-align: right;">{{$delay_departure}}</td>
  </tr>
    <tr>
    <td style="width: 300;text-align: left;">19.Flight Misconnection</td>
     <td style="width: 200;text-align: right;">{{$flight_misconnection}}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">20.Flight Diversion</td>
    <td style="width: 200;text-align: right;">{{$flight_diversion}}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">21.Baggage Delay</td>
    <td style="width: 200;text-align: right;">{{$baggage_delay}}</td>
  </tr>
    <tr>
    <td style="width: 300;text-align: left;">22.Compensation for in-flight loss and/or damage of checked- In baggage
</td>
     <td style="width: 200;text-align: right;">{{$compensation}}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">23.Lost or Stolen Baggage/Personal Belongings Not checked-in  </td>
     <td style="width: 200;text-align: right;">{{$lost_stolen}}</td>
  </tr>
   <tr>
    <td style="width: 300;text-align: left;">24.Location and forwarding of baggage and personal effects</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
   <tr>
    <td style="width: 300;text-align: left;">25.Loss of Personal Money</td>
      <td style="width: 200;text-align: right;">{{$lost_personal_money}}</td>
  </tr>
    <tr>
    <td style="width: 300;text-align: left;">26.Loss of Passport, Driving License, National Identity Card Abroad</td>
      <td style="width: 200;text-align: right;">{{$loss_passport}}</td>
  </tr>
</table>
@if($include_cruise=='Yes')
<h5 style="border-bottom: 1px dotted #000000;border-top: 1px dotted #000000;padding: 5px;margin-left: -6px;font-size:13px" >OPTIONAL COVERAGE <br> INTERNATIONAL CRUISE COVERAGE</h5>
<table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 11px;">
  <tr>
    <td style="width: 300;text-align: center;border-bottom: 2px solid #000000"><strong>Coverage</strong></td>
    <td style="width: 200;text-align: center;border-bottom: 2px solid #000000"><strong>Limits of Liability</strong></td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;"></td>
    <td style="width: 200;text-align: right;">(United States Dollar)</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Accidental Death & Disablement</td>
    <td style="width: 200;text-align: right;">{{ $cruise_1 }}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Personal Liability</td>
    <td style="width: 200;text-align: right;">{{ $cruise_2}}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Accident Burial Assistance</td>
    <td style="width: 200;text-align: right;">{{ $cruise_3 }}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Emergency Medical Repatriation</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Repatriation of Mortal Remains</td>
    <td style="width: 200;text-align: right;">Actual Expense</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;"><strong>MEDICAL EXPENSES</strong></td>
    <td style="width: 200;text-align: center;"></td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Emergency Medical Expenses including Cabin Confinement</td>
    <td style="width: 200;text-align: right;">{{ $cruise_4 }}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;"><strong>TRAVEL INCONVINIENCE</strong></td>
    <td style="width: 200;text-align: center;"></td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Cruise Cancellation (cancelling the Cruise before start of the Cruise)</td>
    <td style="width: 200;text-align: right;">{{ $cruise_5 }}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Cruise Curtailment (Cutting your cruise/trip short)</td>
    <td style="width: 200;text-align: right;">{{ $cruise_6 }}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Baggage Loss/Damage of Personal Baggage/Property - cabin checked-in items only (minimum 21 consecutive days to be considered lost)</td>
    <td style="width: 200;text-align: right;">{{ $cruise_7 }}</td>
  </tr>
  <tr>
    <td style="width: 300;text-align: left;">Cruise Delays (Excluding Technical Failure, Poor Weather Conditions and Acts of Nature) </td>
    <td style="width: 200;text-align: right;">{{ $cruise_8 }}</td>
  </tr>
      </table>
      @endif

<div class="page_break"></div>
<br><br><br><br>
<p>Attached to  and forming part of {{$trans_id}}</p>

<p style="font-size:13px !important"> <strong>CASHLESS SETTLEMENTS OF CLAIM:</strong></p>

     <p style="font-size:11px !important">Assistance Hotline:</p>
    <p style="font-size:11px !important">MAPFRE ASISTENCIA, S.A. COMPANIA INTERNACIONAL DE SEGUROS Y REASEGUROS<p>
    <p style="font-size:11px !important">C/Sor Angela de la Cruz 6, 28020 Madrid Spain or PACIFICO ASSISTANCE (Administrative Arm in the Philippines) </p>
    <p><strong> Call (24/7) for assistance : HOTLINE: +632 8 4594736/ Fax No.: +632 8 8922465</strong></p>
    <p style="font-size:11px !important">E-mail: operationsph@pacifico-assistance.com.ph</p>
  <br>
    <p style="font-size:11px !important">PURPOSE: LEISURE / VACATION</p>
    @if($include_cruise=='Yes')
    <p style="font-size:11px !important">Cruise Destination : {{$destinations_cruise}}</p>
    <p style="line-height: 4px;font-size:11px">Cruise Coverage:  {{$cruise_from}} to  {{$cruise_to}} (Both dates inclusive)</p>
    @endif
    <p style="font-size:11px !important">IN WITNESS WHEREOF, the company has caused this policy to be signed by its duly authorized officer / representative as of the date of issue at .</p>
    <table class="table1" style="font-family: Helvetica;border: 0;text-align: left;border: 0px;font-size: 13px;">
      <tr>
        <td style="width: 300;text-align: center;">&nbsp;</td>
        <!-- <td style="width: 200;text-align: center;"><strong>COCOGEN INSURANCE, INC.</strong></td> -->
      </tr>
       <tr>
        <td style="width: 300;text-align:">&nbsp;</td>
        <td style="width: 200;text-align: center;">   <img src="./images/DRP E-Signature 700x262px.png" style="width: 200px;height: 100px;"></td>
      </tr>
      <tr>
        <td style="width: 300;text-align:">&nbsp;</td>
        <!-- <td style="width: 200;text-align: center;border-bottom: 2px solid #000000"><strong>ATTY. DAVID ROY C. PADIN</strong></td> -->
      </tr>
      <tr>
        <td style="width: 300;text-align:">&nbsp;</td>
        <td style="width: 200;text-align: center;">President</td>
      </tr>
    </table>
  </body>
</html>
