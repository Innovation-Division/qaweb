
<style type="text/css">
	#tabl_final_summary{
		border-color: #ffffff !important;
	}

	#tabl_final_summary td {
	    padding: 0.8rem 0.8rem;
	    border-right: 1px solid #ffffff;
	}

	#tabl_summary_bene{
		/*border-color: #ffffff !important;*/
		width: 100%;
		border: 1px solid #008080;
	}

	#tabl_summary_bene td {
	    padding: 0.8rem 0.8rem;
	    border-top: 1px solid #008080;
	    border: 1px solid #008080;
	}

	#tabl_summary_emargency{
		/*border-color: #ffffff !important;*/
		width: 100%;
		border: 1px solid #008080;
	}


	#tabl_summary_emargency td {
	    padding: 0.8rem 0.8rem;
	    border-top: 1px solid #008080;
	    border: 1px solid #008080;
	}

	.table-data1 .table > tbody > tr > td {
	  border-bottom: 1px solid #fff;
	}
</style>
						<div class="row">
							<div class="table-data_ table-data1 table-wrapper col-md-9_ col-offset-0 col-12 col-lg-offset-1 col-lg-10">
								<div class="table-responsive">
									<table id="tabl_final_summary" name="tabl_final_summary" class="table table-bordered_" style="">
										<thead>
											<tr>
												<td colspan="3" class="text-color-dark " ><h4 class="rfs-2-5 rfs-md-1-3" style="text-align: left;">Final Quote</h4> <br> </td>
											</tr>
										</thead>
										<tfoot>

											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Premium Computation</span> </td>
											</tr>

											<tr >
												<td colspan="2" class="text-color-dark" style="color: #008080  !important;"><strong>Net Premium </strong>
                                                    <span id="withcovid_final_coverage" style="font-size: 10px;display: none;"><i>(with COVID-19 coverage*)</i></span>
                                                    <span id="withcruise_final_coverage" style="font-size: 10px;display: none;"><i>(with Cruise coverage*)</i></span>
                                                    <span id="withcovidcruises_final_coverage" style="font-size: 10px;display: none;"><i>(with COVID-19 coverage and Cruise coverage)</i></span>
                                                </td>
												<td class="text-color-dark" style="color: #008080  !important;text-align: right;">
													<strong>US$ <span id="final_net_premium" name="final_net_premium"></span></strong>
													<input type="hidden" id="final_net_premium_all" name="final_net_premium_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Plus</td>
												<td class="text-color-dark">
													<strong><span id="plus" name="plus"></span></strong>
													<input type="hidden" name="plus_all" name="plus_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Documentary Stamps</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="final_doc_stamp" name="final_doc_stamp"></span></strong>
													<input type="hidden" name="final_doc_stamp_all" name="final_doc_stamp_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Premium Tax</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="final_premium_tax" name="final_premium_tax"></span></strong>
													<input type="hidden" name="final_premium_tax_all" name="final_premium_tax_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Local Government Tax</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="final_lgt" name="final_lgt"></span></strong>
													<input type="hidden" name="final_lgt_all" name="final_lgt_all" value="">
												</td>
											</tr>
											<tr id="amountdue_tr">
												<td colspan="2" class="text-color-dark" style="color: #008080  !important;"><strong>Total Amount Due</strong></td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="final_total_amount" name="final_total_amount"></span></strong>
													<input type="hidden" name="final_total_amount_all" name="final_total_amount_all" value="">
												</td>
											</tr>
											<tr id="promo_tr">
												<td colspan="2" class="text-color-dark" style="color: #008080  !important;font-style: italic;">Less %</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong>-<span id="final_less" name="final_less" style="font-style: italic;"></span></strong>
													<input type="hidden" name="final_less_all" name="final_less_all" value="">
												</td>
											</tr>

											<tr>
												<td colspan="2" class="bgcolor-secondary text-color-light" style=" border-right: 1px solid #db3e8d ;"><strong>Total Premium</td>
												<td class="bgcolor-secondary text-color-light" style="text-align: right;">
													<strong>US$ <span id="final_total_amount_due" name="final_total_amount_due"></span></strong>
													<input type="hidden" name="final_total_amount_due_all_all" name="final_total_amount_due_all_all" value="">
												</td>
											</tr>
											<tr><td></td></tr>
											<tr>
												<td colspan="2" class="bgcolor-secondary text-color-light" ><strong>Indicative Peso Equivalent	</strong></td>
												<td class="bgcolor-secondary text-color-light" style="text-align: right;">
													<strong>PHP <span id="convert_to_php2" name="convert_to_php2"></span></strong>
													<input type="hidden" name="convert_to_php_update2" id='convert_to_php_update2' value="">
												</td>
											</tr>
												<td colspan="3" class="" >*Latest USD to PHP conversion will be applied at payment step.  <i>1 USD to <span id='exchangerate2'></span> PHP</i></td>
											<tr>
											<tr>
												<td colspan="3" class="text-color-dark" style=""><br></td>

											</tr>
											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Personal Information</span> </td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">Name:
													<strong><span id="quote_final_name" name="quote_final_name"></span></strong>
													<input type="hidden" id="quote_final_name_all" name="quote_final_name_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">Birthday:
													<strong><span id="quote_final_bday" name="quote_final_bday"></span></strong>
													<input type="hidden" id="quote_final_bday_all" name="quote_final_bday_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">Telephone No.:
													<strong><span id="quote_final_telno" name="quote_final_telno"></span></strong>
													<input type="hidden" id="quote_final_telno_all" name="quote_final_telno_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">Mobile No.:
													<strong><span id="quote_mobile_final_no" name="quote_mobile_final_no"></span></strong>
													<input type="hidden" id="quote_mobile_final_no_all" name="quote_mobile_final_no_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">Email Address:
													<strong><span id="quote_final_email" name="quote_final_email"></span></strong>
													<input type="hidden" id="quote_final_email_all" name="quote_final_email_all" value="">
												</td>
											</tr>

											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Travel Information</span> </td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">City:
													<strong><span id="quote_final_province" name="quote_final_province"></span></strong>
													<input type="hidden" name="quote_final_province_all" name="quote_final_province_all" value="">
												</td>
											</tr>
											<tr >
												<td colspan="2" class="text-color-dark" style="">Purpose of Travel:
													<strong><span id="quote_purpose_of_travel_final" name="quote_purpose_of_travel_final">Leisure / Vacation</span></strong>
													<input type="hidden" name="quote_purpose_of_travel_final_all" name="quote_purpose_of_travel_final_all" value="">
												</td>
												<td class="text-color-dark">
													<strong><span id="quote_purpose_of_travel" name="quote_purpose_of_travel"></span></strong>
													<input type="hidden" name="quote_purpose_of_travel_all" name="quote_purpose_of_travel_all" value="">
												</td>
											</tr >
											<tr>
												<td colspan="3" class="text-color-dark" style="">Type of Coverage:
                                                    <strong><span id="quote_type_of_coverate" name="quote_type_of_coverate">Individual-</span><span id="package_quote_summny_final_travel_info_all" name="package_quote_summny_final_travel_info_all"></span></strong>
													<input type="hidden" name="quote_type_of_coverate_final_all" name="quote_type_of_coverate_final_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">Start Date:
													<strong><span id="quote_start_date_final" name="quote_start_date_final"></span></strong>
													<input type="hidden" name="quote_start_date_final_all" name="quote_start_date_final_all" value="">
												</td>
											</tr>
											<tr >
												<td colspan="3" class="text-color-dark" style="">End Date:
													<strong><span id="quote_end_date_final" name="quote_end_date_final"></span></strong>
													<input type="hidden" name="quote_end_date_final_all" name="quote_end_date_final_all" value=""><span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(both dates inclusive)</i></span>
												</td>
											</tr>
                                            <tr id='cruise_destination_final_label'>
                                                <td colspan="3" class="text-color-dark" style="">Cruise Coverage
                                                </td>
                                            </tr>
                                            <tr id='cruise_destination_final'>
                                                <td colspan="3" class="text-color-dark" style="">Cruise Destination:
                                                    <strong><span id="quotecruise_final_provincecruise" name="quotecruise_final_provincecruise"></span></strong>
                                                </td>
                                            </tr>
                                            <tr id='cruise_destination_final_start'>
                                                <td colspan="3" class="text-color-dark" style="">Start Date:
                                                    <strong><span id="quotecruise_start_date_final" name="quotecruise_start_date_final"></span></strong>

                                                </td>
                                            </tr>
                                            <tr id='cruise_destination_final_end'>
                                                <td colspan="3" class="text-color-dark" style="">End Date:
                                                    <strong><span id="quotecruise_end_date_final" name="quotecruise_end_date_final"> </span></strong>
                                                    <span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(both dates inclusive)</i></span>
                                                </td>
                                            </tr>

                                            <tr id='covid_travel_info_header_final'>
                                                <td colspan="3" class="text-color-dark" style="">COVID-19 Coverage
                                                </td>
                                            </tr>
                                            <tr id='covid_travel_info_start_final'>
                                                <td colspan="3" class="text-color-dark" style="">Start Date:
                                                    <strong><span id="covid_start_date_final" name="covid_start_date_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr id='covid_travel_info_end_final'>
                                                <td colspan="3" class="text-color-dark" style="">End Date:
                                                    <strong><span id="covid_end_date_final" name="covid_end_date_final"> </span></strong>
                                                    <span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(both dates inclusive)</i></span>
                                                </td>
                                            </tr>






											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Emergency Contacts</span> </td>
											</tr>
											<style type="text/css">
												#emergency_contact_final_quote table :not(:first-child) {
												  border-top: 1px solid #008080 !important;
												}
											</style>
											<tr>
												<td colspan="3" class="text-color-dark" >
													<div id="emergency_contact_final_quote">
														<table id="tabl_summary_emargency" name="tabl_summary_bene" class="table table-bordered_" >
															<thead>
																<tr>
																	<td style="border-bottom: 2px solid #000000"><strong> No. </strong></td>
																	<td style="border-bottom: 2px solid #000000"><strong> Name </strong></td>
																	<td style="border-bottom: 2px solid #000000"><strong> Contact No. </strong></td>
																	<td style="border-bottom: 2px solid #000000"><strong> Relation </strong></td>
																	<td style="border-bottom: 2px solid #000000"><strong> Bday </strong></td>
																	<td style="border-bottom: 2px solid #000000"><strong> Status </strong></td>
																</tr>
															</thead>
															<tfoot>

															</tfoot>
														</table>
													</div>
												</td>
											</tr>

											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Beneficiaries</span> </td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" >
													<div id="emergency_contact_final_quote">
														<table id="tabl_summary_bene" name="tabl_summary_bene" class="table table-bordered_" >
															<thead >
																<tr>
																	<td style="border-bottom: 2px solid #000000"><strong> No. </strong></td>
																	<td style="border-bottom: 2px solid #000000"><strong> Name </strong></td>
																	<td style="border-bottom: 2px solid #000000"><strong> Relation </strong></td>
																</tr>
															</thead>
															<tfoot>

															</tfoot>
														</table>
													</div>
												</td>
											</tr>

											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Coverage</span> </td>
											</tr>

											<tr>
												<td colspan="3" class="text-color-dark" style="">
													<strong>Package:</strong>
													<strong><span id="package_quote_summny_final" name="package_quote_summny_final"></span></strong>
												</td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">I. Accidental Death / Disablement</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong> <span id="ac_dis_final" name="ac_dis_final"></span></strong>
													<input type="hidden" name="ac_dis_final_all" name="ac_dis_final_all" value="">
												</td>
											</tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">II. Accidental Burial Benefit</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong> <span id="ac_bur_benefits_final" name="ac_bur_benefits_final"></span></strong>
                                                    <input type="hidden" name="ac_bur_benefits_final_all" name="ac_bur_benefits_final_all" value="">
                                                </td>
                                            </tr>
                                            <td colspan="2" class="text-color-dark" style="">III. Personal Liability</td>
                                            <td class="text-color-dark" style="text-align: right;">
                                                <strong><span id="travel_1_1_final" name="travel_1_1_final"></span></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-color-dark" style="">IV. Medical Expenses and Hospitalization Abroad ***</td>
                                            <td class="text-color-dark" style="text-align: right;">
                                                <strong><span id="travel_1_2_final" name="travel_1_2_final"></span></strong>

                                            </td>
                                        </tr>

											{{-- <tr>
												<td colspan="3" class="text-color-dark" style=""><br>
                                                </td>
                                            </tr> --}}

											{{-- </tr> <tr>
                                                <td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Travel Assistance</span> </td>
                                            </tr> --}}
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style=""><strong>Travel Assistance</strong></td>
                                            </tr>
                                            {{-- <tr>
                                                <td colspan="2" class="text-color-dark" style="">Medical expenses and hospitalization abroad</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_0_final" name="travel_0_final"></span></strong>
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
                                                    <strong><span id="travel_1_final" name="travel_1_final"></span></strong>
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
                                                    <strong><span id="travel_2_final" name="travel_2_final"></span></strong>
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
                                                    <strong><span id="travel_3_final" name="travel_3_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Trip Cancellation</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_4_final" name="travel_4_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Trip Curtailment</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_5_final" name="travel_5_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Delayed Departure</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_6_final" name="travel_6_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Flight Misconnection</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_7_final" name="travel_7_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Flight Diversion</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_8_final" name="travel_8_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Baggage Delay</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_9_final" name="travel_9_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Compensation for in-flight loss of checked-in baggage</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_10_final" name="travel_10_final"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Lost Or Stolen Baggage/Personal Belongings Not Checked-In</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_11_final" name="travel_11_final"></span></strong>
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
                                                    <strong><span id="travel_12_final" name="travel_12_final"></span></strong>
                                                    <input type="hidden" name="travel_12_all" name="travel_12_all" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-color-dark" style="">Loss of Passport, Driving License, National Identity Card Abroad</td>
                                                <td class="text-color-dark" style="text-align: right;">
                                                    <strong><span id="travel_13_final" name="travel_13_final"></span></strong>
                                                </td>
                                            </tr>
                                            <style type="text/css">
												table :not(:first-child) {
												  border-top:border: 1px solid #008080;
												}
											</style>

                                            <tr id="cruise_quote_div_1_page" style="display: table-row;">
                                                <td colspan="3" class="bgcolor-primary text-color-light "><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Cruise Coverage</span> </td>
                                            </tr>

                                            <tr id="cruise_quote_div_final_page">
                                                <td colspan="3" class="text-color-dark" style="">
                                                    <table id="tbl_summary_cruise_3rdpage" style="width: 100%;border-top: 1px solid #008080">
                                                        <tbody >
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Accidental Death and Disablement</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_a_final'><span></strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Personal Liability</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_b_final'><span></strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Accidental Burial Assistance</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_c_final'><span></strong></td>
                                                            </tr>
                                                            <tr>

                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Emergency Medical Repatriation</td>
                                                                <td id="cruise_emergency" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong>Actual Expense</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Repatriation of Mortal Remains</td>
                                                                <td id="cruise_repartriation" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong>Actual Expense</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong>Medical Expenses</strong></td>
                                                                <td id="cruise_head" style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong></strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Emergency Medical Expenses including Cabin Confinement</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border: 1px solid #008080;width: 20%;padding: 10px;border-right:0px;text-align: right;"><strong><span id='cruise_first_final'><span></strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong>Travel Inconvinience</strong></td>
                                                                <td id="cruise_head" style="width: 20%;padding: 10px;border-bottom: 1px solid #000000"><strong></strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Cruise Cancellations (cancelling the Cruise before start of the Cruise)</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_second_final'></strong></span></td>

                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Cruise Curtailment (Cutting your cruise trip/short))</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_third_final'></strong></span></td>

                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Baggage Loss/Damage of Personal Baggage/Property - cabin checked-in items only (minimum 21 consecutive days to be considered lost)</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_fourth_final'></strong></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 20%;padding: 10px;border-bottom: 1px solid #000000">Cruise Delays (Excluding Technical Failure, Poor Weather Conditions and Acts of Nature)</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 1px solid #000000;border-right:0px;text-align: right;"><strong><span id='cruise_fifth_final'></span></strong></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

											<style type="text/css">
												table :not(:first-child) {
												  border-top:border: 1px solid #008080;
												}
											</style>

											<tr id="covid_quote_div_final_1">
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">COVID-19 COVERAGE</span> </td>
											</tr>
											<tr id="covid_quote_div_final_2">
												<td colspan="3" class="text-color-dark" style="">
													<table id="tbl_summary_covid_6thpage" style="border: 1px solid #008080;width: 100%;border-top: 1px solid #008080">
								                        <tbody >
								                            <tr>
								                                <td style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong>COVID-19 COVERAGE</strong></td>
								                                <td id="final_quote_packet_head" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align: center;"><strong><span id='covid_head_final'><span></strong></td>

								                            </tr>
								                            <tr>
								                                <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Medical expenses and hospitalization abroad ***</td>
								                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;text-align: left;"><strong><span id='covid_first_final'></span></strong></td>

								                            </tr>
								                            <tr>
								                                <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Transport or repatriation in case of COVID-19 illness</td>
								                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;text-align: left;"><strong><span id='covid_second_final'></span></strong></td>

								                            </tr>
                                                            <tr>
								                                <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Repatriation of mortal remains</td>
                                                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;text-align: left;"><strong><span id='covid_third_final'></span></strong></td>

								                            </tr>
								                        </tbody>
								                    </table>
												</td>
											</tr>
                                            <tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Subjectivities:</span> </td>
											</tr>

											<tr>
												<td colspan="3" class="text-color-dark" style="">
												</td>
											</tr>
											<tr>
												<td colspan="12" class="text-color-dark" style="">Pre-existing Condition is not covered</td>

											</tr>
                                            <tr id='covid_subjectivity'>
                                                <td colspan="3" class="text-color-dark" style="">COVID-19 Coverage Endorsement Terms and Conditions</td>

                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-color-dark" style="">Standard Travel Excel Plus International PA Policy Terms and Condition</td>

                                            </tr>
											<tr>  <hr></hr></tr>



														</thead>
													</table>
												</td>

											</tr>
											<tr>

											</tr>
											</tfoot>
									</table>
								</div>
							</div>
						</div>
	        	<div class="col-md-12_ break-two"> <br> </div>

				<div class="col-lg-offset-1 col-lg-10">
					<div class="col-md-12_">
						<div id="warning_summary" name="warning_summary" class="error-msg" style="display: none">
						  Please check Privacy Policy, Terms & Conditions and Exclusion & Limitations
						</div>
					</div>

					<div class="form-check">
							<input class="form-check-input" type="checkbox" id="CBPrivacy" name="CBPrivacy" value="1"  <?php if(old('CBPrivacy')){ echo "checked";} ?> >
							<label class="form-check-label" for="CBPrivacy"> I AGREE with the <a href="#" data-toggle="modal" data-target="#privacyPolicy" class="text-color-secondary text-decoration-underline">Privacy Policy</a></label>
					</div>

					<div class="form-check">
							<input class="form-check-input" type="checkbox" id="CBTerms" name="CBTerms" value="1"  <?php if(old('CBTerms')){ echo "checked";} ?> >
							<label class="form-check-label" for="CBTerms"> I AGREE to the  <a href="#" data-toggle="modal" data-target="#termsConditions" class="text-color-secondary text-decoration-underline">Terms & Conditions</a></label>
					</div>

					<div class="form-check">
							<input class="form-check-input" type="checkbox" id="CBExclusion" name="CBExclusion" value="1"  <?php if(old('CBExclusion')){ echo "checked";} ?> >
							<label class="form-check-label" for="CBExclusion"> I AGREE with the <a href="#" data-toggle="modal" data-target="#exlimitaions" class="text-color-secondary text-decoration-underline">Exclusion & Limitations</a></label>
					</div>
				</div>
		        <div class="col-md-3_ text-center mt-5">
							<button type="submit" id="btnsubmit" class="action submit btn btn-secondary btnsubmit">Proceed to Payment</button>
		        </div>
