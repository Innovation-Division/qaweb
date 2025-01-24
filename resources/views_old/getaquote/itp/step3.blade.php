<style type="text/css">
	#tabl_summary{
		border-color: #ffffff !important;
	}



	#tabl_summary td {
    padding: 0.8rem 0.8rem;
    border-right: 1px solid #ffffff;
}
</style>
<div class="row" >
	<h4 class="rfs-2-5 rfs-md-1-3" style="text-align: left;">Quote Summary </h4> <br>
</div>
<div class="row">
	<div class="table-data_ table-wrapper col-md-9_ col-offset-0 col-12 col-lg-offset-0 col-lg-10">
		<div class="table-responsive">
			<table id="tabl_summary" name="tabl_summary" class="table "  style="line-height: 1px !important;"  border="0">
				<thead>
					<tr class="heading">
						<th colspan="0" class="bgcolor-primary">
							<span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Premium Computation</span>
						</th>
						<th colspan="0" class="bgcolor-primary text-center">
							<span class="heading-border text-color-light rfs-1-13 rfs-md-1-3"></span>
						</th>
						<th colspan="0" class="bgcolor-primary text-center">
							<span class="heading-border text-color-light rfs-1-13 rfs-md-1-3"></span>
						</th>
					</tr>
				</thead>
				<tbody></tbody>
				<tfoot>
					<tr >

                            <td colspan="2" class="text-color-dark" style="color: #008080  !important;"><strong>Net Premium </strong><span id="withcovid_first" style="font-size: 10px;display: none;"><i>(with COVID-19 coverage*)</i></span><span id="withcruise_first" style="font-size: 10px;display: none;"><i>(with Cruise coverage*)</i></span><span id="withcovidcruise_first" style="font-size: 10px;display: none;"><i>(with COVID-19 coverage and Cruise coverage)</i></span></td>
                            <td class="text-color-dark" style="color: #008080  !important;text-align: right;">
							<strong>US$ <span id="net_premium" name="net_premium"></span></strong>
							<input type="hidden" name="net_premium_all" name="net_premium_all" value="">
							<input type="hidden" class='travel_assistance' id="travel_assistance" name="travel_assistance" value="">
                            <input type="hidden" class='liability_assistance' id="liability_assistance" name="liability_assistance" value="">
                            <input type="hidden" class='burialbenefits_assistance' id="burialbenefits_assistance" name="burialbenefits_assistance" value="">
                            <input type="hidden" class='add' id="add" name="add" value="">
                            <input type="hidden" class='witcovidcompute' id="witcovidcompute" name="witcovidcompute" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Plus</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="plus" name="plus"></span></strong>
							<input type="hidden" name="plus_all" name="plus_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Documentary Stamps</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="doc_stamp" name="doc_stamp"></span></strong>
							<input type="hidden" name="doc_stamp_all" name="doc_stamp_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Premium Tax</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="premium_tax" name="premium_tax"></span></strong>
							<input type="hidden" name="premium_tax_all" name="premium_tax_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Local Government Tax</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="lgt" name="lgt"></span></strong>
							<input type="hidden"  name="lgt_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="color: #008080  !important;"><strong>Total Amount Due</strong></td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="total_amount_due" name="total_amount_due"></span></strong>
							<input type="hidden" name="final_total_amount_all" name="final_total_amount_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="color: #008080  !important;">Less %</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="less" name="less"></span></strong>
							<input type="hidden" name="final_less_all" name="final_less_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="bgcolor-secondary text-color-light" ><strong>Final Amount Due</strong></td>
                        <td class="bgcolor-secondary text-color-light" style="text-align: right;">
							<strong>US$ <span id="total_amount_due_final" name="total_amount_due_final"></span></strong>
							<input type="hidden" name="total_amount_due_all" name="total_amount_due_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style=""><strong></strong></td>
					</tr>
                    <tr style="font-size:15px">
						<td colspan="3" class="text-color-dark" style="">
							<strong>Promo</strong><br>
							Please note the percent discount from the promo code is applied against the Net Premium US dollar amount. Only one promo code is allowed per transaction.
						</td>
					</tr>
					<tr style="font-size:15px">
						<td colspan="3" class="text-color-dark" style="">
							<strong>Documentary Stamps Tax</strong><br>
							Due to BIR implementation of EDST (Electronic Documentary Stamp Tax) system effective July 1, 2010, policyholders are mandated to pay the DST portion of the premium once the policy is issued. Refund on DST for cancelled policies is not allowed.
						</td>
					</tr>
					<tr>
						<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Coverage</span> </td>
					</tr>

                    <tr>
						<td colspan="3" class="text-color-dark" style="">
							<strong>Package: </strong>
                            <strong><span id="package_quote_summny" name="package_quote_summny"></span></strong>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">I. Accidental Death / Disablement</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="ac_dis" name="ac_dis"></span></strong>
							<input type="hidden" name="ac_dis_all" name="ac_dis_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">II. Accidental Burial Benefit</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="ac_bur_benefits" name="ac_bur_benefits"></span></strong>
							<input type="hidden" name="ac_bur_benefits_all" name="ac_bur_benefits_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">III. Personal Liability</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span id="travel_1_1" name="travel_1_1"></span></strong>
							<input type="hidden" id="travel_1_1_all" name="ac_per" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">IV. Medical Expenses and Hospitalization Abroad ***</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span id="travel_1_2" name="travel_1_2"></span></strong>
							<input type="hidden" id="travel_1_2_all" name="ac_med" value="">
						</td>
					</tr>



                    {{-- <tr>
						<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Travel Assistance</span> </td>
					</tr> --}}
					<tr>
						<td colspan="3" class="text-color-dark" style=""><strong>Travel Assistance</strong></td>

					</tr>
                    {{-- <tr>
						<td colspan="2" class="text-color-dark" style="">Medical expenses and hospitalization abroad</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span id="travel_0_" name="travel_0_"></span></strong>
							<input type="hidden" name="travel_0_all" name="travel_0_all" value="">
						</td>
					</tr> --}}
					<tr>
						<td colspan="2" class="text-color-dark" style="">Transport or repatriation in case of illness or accident</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Emergency dental care</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_1_" name="travel_1_"></span></strong>
							<input type="hidden" name="travel_1_all" name="travel_1_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Hospital Cash Income</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span>20 US$ per day max of 10 days</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Repatriation of a family member travelling with the insured</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Repatriation of mortal remains</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>

					<tr>
						<td colspan="2" class="text-color-dark" style="">Escort of dependent child</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>


					<tr id="del_tr">
						<td colspan="2" class="text-color-dark" style="">Travel of one immediate family member</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_2_" name="travel_2_"></span></strong>
							<input type="hidden" name="travel_2_all" name="travel_2_all" value="">
						</td>
					</tr>
					<tr id="bag_tr">
						<td colspan="2" class="text-color-dark" style="">Emergency return home following death of a close family member</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
					<tr id="com_tr">
						<td colspan="2" class="text-color-dark" style="">Delivery of medicines</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Relay of urgent messages</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Long distance medical information  service</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Medical referral/appointment of local medical specialist</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-color-dark" style="">Connection services</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Advance of bail bond</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span id="travel_3_" name="travel_3_"></span></strong>
                            <input type="hidden" name="travel_3_all" name="travel_3_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Trip Cancellation</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_4_" name="travel_4_"></span></strong>
                            <input type="hidden" name="travel_4_all" name="travel_4_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Trip Curtailment</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_5_" name="travel_5_"></span></strong>
                            <input type="hidden" name="travel_5_all" name="travel_5_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Delayed Departure</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_6_" name="travel_6_"></span></strong>
                            <input type="hidden" name="travel_6_all" name="travel_6_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Flight Misconnection</td>
						<td class="text-color-dark" style="text-align: right;">
                            <strong><span id="travel_7_" name="travel_7_"></span></strong>
                            <input type="hidden" name="travel_7_all" name="travel_7_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Flight Diversion</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_8_" name="travel_8_"></span></strong>
                            <input type="hidden" name="travel_8_all" name="travel_8_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Baggage Delay</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_9_" name="travel_9_"></span></strong>
                            <input type="hidden" name="travel_9_all" name="travel_9_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Compensation for in-flight loss of checked-in baggage</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_10_" name="travel_10_"></span></strong>
                            <input type="hidden" name="travel_10_all" name="travel_10_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Lost Or Stolen Baggage/Personal Belongings Not Checked-In</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_11_" name="travel_11_"></span></strong>
                            <input type="hidden" name="travel_11_all" name="travel_11_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Location and forwarding of baggage and personal effects</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span>Actual Expense</span></strong>
							<input type="hidden" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Loss of Personal Money</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_12_" name="travel_12_"></span></strong>
                            <input type="hidden" name="travel_12_all" name="travel_12_all" value="">
						</td>
					</tr>
                    <tr>
						<td colspan="2" class="text-color-dark" style="">Loss of Passport, Driving License, National Identity Card Abroad</td>
						<td class="text-color-dark" style="text-align: right;">
							<strong><span id="travel_13_" name="travel_13_"></span></strong>
                            <input type="hidden" name="travel_13_all" name="travel_13_all" value="">
						</td>
					</tr>

                    <tr id="cruise_quote_div_1" style="display: table-row;">
						<td colspan="3" class="bgcolor-primary text-color-light "><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Cruise Coverage</span> </td>
					</tr>

                     <tr id="cruise_quote_div_final">
                        <td colspan="3" class="text-color-dark" style="">
                            <table id="tbl_summary_cruise_3rdpage" style="width: 100%;border-top: 1px solid #008080">
                                <tbody >
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Accidental Death and Disablement</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_a'><span></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Personal Liability</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_b'><span></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Accidental Burial Assistance</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_c'><span></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Emergency Medical Repatriation</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong>Actual Expense</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Repatriation of Mortal Remains</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong>Actual Expense</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong>Medical Expenses</strong></td>
                                        <td id="cruise_head" style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Emergency Medical Expenses including Cabin Confinement</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_first'><span></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong>Travel Inconvinience</strong></td>
                                        <td id="cruise_head" style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong><span id='cruise_first'><span></strong></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Cruise Cancellations (cancelling the Cruise before start of the Cruise)</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_second'></strong></span></td>

                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Cruise Curtailment (Cutting your cruise trip/short))</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_third'></span></strong></td>

                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Baggage Loss/Damage of Personal Baggage/Property - cabin checked-in items only (minimum 21 consecutive days to be considered lost)</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_fourth'></span></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Cruise Delays (Excluding Technical Failure, Poor Weather Conditions and Acts of Nature)</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_fifth'></span></strong></td>

                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr id="covid_quote_div_1" style="display: table-row;">
						<td colspan="3" class="bgcolor-primary text-color-light "><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">COVID-19 Coverage</span> </td>
					</tr>

                    <tr id="covid_quote_div_final">
                        <td colspan="3" class="text-color-dark" style="">
                            <table id="tbl_summary_covid_3rdpage" style="border: 1px solid #008080;width: 100%;border-top: 1px solid #008080">
                                <tbody >
                                    <tr>
                                        <td style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong>COVID-19 COVERAGE </strong></td>
                                        <td id="final_quote_packet_head" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong><span id='covid_head'><span></strong></td>

                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Medical expenses and hospitalization abroad ***</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;text-align:left"><strong><span id='covid_first'></span></strong></td>

                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Transport or repatriation in case of COVID-19 illness</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;text-align:left"><strong><span id='covid_second'></span></strong></td>

                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Repatriation of mortal remains</td>
                                        <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;text-align:left"><strong><span id='covid_third'></span></strong></td>

                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>


						<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Travel Information</span> </td>
					</tr>
                    <tr>
                        <td colspan="3" class="text-color-dark" style="">Country:
							<strong><span id="quoteprovince" name="quoteprovince"></span></strong>
							<input type="hidden" name="quoteprovince_all" name="quote_purpose_of_travel_all" value="">

						</td>
                    </tr>
					<tr >
						<td colspan="3" class="text-color-dark" style="">Purpose of Travel:
							<strong><span id="quote_purpose_of_travel" name="quote_purpose_of_travel">Leisure / Vacation</span></strong>
							<input type="hidden" id="quote_purpose_of_travel_all" name="quote_purpose_of_travel_all" value="">
						</td>

					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style="">Type of Coverage:
							<strong><span id="quote_type_of_coverate" name="quote_type_of_coverate">Individual-</span><span id="package_quote_summny_final_travel_info" name="package_quote_summny_final_travel_info"></span></strong>

						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style="">Start Date:
							<strong><span id="quote_start_date" name="quote_start_date"></span></strong>
							<input type="hidden" id="quote_start_date_all" name="quote_start_date_all" value="">
						</td>
					</tr>
					<tr >
						<td colspan="3" class="text-color-dark" style="">End Date:
							<strong><span id="quote_end_date" name="quote_end_date"> </span></strong>
							<input type="hidden" id="quote_end_date_all" name="quote_end_date_all" value="">
                            <span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(both dates inclusive)</i></span>
						</td>
					</tr>
                    <tr id='cruise_destination_header'>
                        <td colspan="3" class="text-color-dark" style="">Cruise Coverage
						</td>
                    </tr>
                    <tr id='cruise_destination_first'>
                        <td colspan="3" class="text-color-dark" style="">Cruise Destination:
							<strong><span id="quoteprovincecruise" name="quoteprovincecruise"></span></strong>
							<input type="hidden" name="quotecruise_all_first" name="quotecruise_all_first" value="">
                            <input type="hidden" id="quotecruise_final_province" name="quotecruise_final_province">
						</td>
                    </tr>
                    <tr id='cruise_destination_start_first'>
						<td colspan="3" class="text-color-dark" style="">Start Date:
							<strong><span id="quotecruise_start_date" name="quotecruise_start_date"></span></strong>
							<input type="hidden" id="quotecruise_start_date_all" name="quotecruise_start_date_all" value="">
						</td>
					</tr>
					<tr id='cruise_destination_end_first'>
						<td colspan="3" class="text-color-dark" style="">End Date:
							<strong><span id="quotecruise_end_date" name="quotecruise_end_date"> </span></strong>
							<input type="hidden" id="quotecruise_end_date_all" name="quotecruise_end_date_all" value="">
                            <span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(both dates inclusive)</i></span>
						</td>
					</tr>

                    <tr id='covid_travel_info_header'>
                        <td colspan="3" class="text-color-dark" style="">COVID-19 Coverage
						</td>
                    </tr>
                    <tr id='covid_travel_info_start'>
						<td colspan="3" class="text-color-dark" style="">Start Date:
							<strong><span id="covid_start_date" name="covid_start_date"></span></strong>
						</td>
					</tr>
					<tr id='covid_travel_info_end'>
						<td colspan="3" class="text-color-dark" style="">End Date:
							<strong><span id="covid_end_date" name="covid_end_date"> </span></strong>
                            <span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(both dates inclusive)</i></span>
						</td>
					</tr>


                    <tr>
						<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Insured Information</span> </td>
					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style="">Name:
							<strong><span id="quote_name" name="quote_name"></span></strong>
							<input type="hidden" id="quote_name_all" name="quote_name_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style="">Birthday:
							<strong><span id="quote_bday" name="quote_bday"></span></strong>
							<input type="hidden" id="quote_bday_all" name="quote_bday_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style="">Telephone No.:
							<strong><span id="quote_telno" name="quote_telno"></span></strong>
							<input type="hidden" id="quote_telno_all" name="quote_telno_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style="">Mobile No.:
							<strong><span id="quote_mobile_no" name="quote_mobile_no"></span></strong>
							<input type="hidden" id="quote_mobile_no_all" name="quote_mobile_no_all" value="">
						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-color-dark" style="">Email Address:
							<strong><span id="quote_email" name="quote_email"></span></strong>
							<input type="hidden" id="quote_email_all" name="quote_email_all" value="">
						</td>
					</tr>
                    <tr>
						<td style="border-bottom: none">
							<span></span>
						</td>
					</tr>
				</tfoot>

			</table>
		</div>
	</div>
</div>
<style type="text/css">
	.table-data1 .table > thead:first-child > tr:first-child > th, .table-data1 .table > tbody > tr > td, .table-data1 .table > tfoot > tr > td {
		  padding: 0.8rem 0.8rem;
		  border-right: 1px solid #B8B8B8;
</style>
