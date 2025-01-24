
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
												<td colspan="2" class="text-color-dark" style="color: #008080  !important;"><strong>Net Premium </strong><span id="withcovid_final" style="font-size: 10px;display: none;"><i>(with COVID-19 coverage*)</i></span></td>
												<td class="text-color-dark" style="color: #008080  !important;text-align: right;">
													<strong>Php <span id="final_net_premium" name="final_net_premium"></span></strong>
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
												<td colspan="2" class="text-color-dark" style="color: #008080  !important;">Less %</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong>-<span id="final_less" name="final_less"></span></strong>
													<input type="hidden" name="final_less_all" name="final_less_all" value="">
												</td>
											</tr>

											<tr>
												<td colspan="2" class="bgcolor-secondary text-color-light" style=" border-right: 1px solid #db3e8d ;"><strong>Total Premium</td>
												<td class="bgcolor-secondary text-color-light" style="text-align: right;">
													<strong>Php <span id="final_total_amount_due" name="final_total_amount_due"></span></strong>
													<input type="hidden" name="final_total_amount_due_all_all" name="final_total_amount_due_all_all" value="">
												</td>
											</tr>
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
												<td colspan="2" class="text-color-dark" style="">Province:
													<strong><span id="quote_final_province" name="quote_final_province"></span></strong>
													<input type="hidden" name="quote_final_province_all" name="quote_final_province_all" value="">
												</td>
											</tr>
											<tr >
												<td colspan="2" class="text-color-dark" style="">Purpose of Travel Leisure:
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
													<strong><span id="quote_type_of_coverate_final" name="quote_type_of_coverate_final">Individual</span></strong>
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
													<strong>Mode of Transpo:</strong>
													<strong><span id="modeoftranspo_quote_summny_final" name="modeoftranspo_quote_summny_final"></span></strong>
												</td>
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
													<strong>Php <span id="ac_dis_final" name="ac_dis_final"></span></strong>
													<input type="hidden" name="ac_dis_final_all" name="ac_dis_final_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">II. Accidental Medical Reimbursement</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="ac_med_reim_final" name="ac_med_reim_final"></span></strong>
													<input type="hidden" name="ac_med_reim_final_all" name="ac_med_reim_final_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">III. Accidental Burial Benefit</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="ac_bur_benefits_final" name="ac_bur_benefits_final"></span></strong>
													<input type="hidden" name="ac_bur_benefits_final_all" name="ac_bur_benefits_final_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">IV. Unprovoked Murder and Assault</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="umprov_mur_final" name="umprov_mur_final"></span></strong>
													<input type="hidden" name="umprov_mur_final_all" name="umprov_mur_final_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style=""><br></td>
												
											</tr>
											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Travel Assistance</span> </td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Medical expenses (with Sabotage and Terrorism) and hospitalization</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong>Php <span id="travel_1_final" name="travel_1_final"></span></strong>
													<input type="hidden" name="travel_1_final_all" name="travel_1_final_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Transport of repatriation in case of illness or accident</td>
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
												<td colspan="2" class="text-color-dark" style="">Pre-existing Condition within the Look Back Period </td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="travel_2_final" name="travel_2_final"></span></strong>
													<input type="hidden" name="travel_2_final_all" name="travel_2_final_all" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Trip Cancellation</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="travel_3_final" name="travel_3_final"></span></strong>
													<input type="hidden" name="travel_3_final_all" name="travel_3_final_all" value="">
												</td>
											</tr>

											<tr>
												<td colspan="2" class="text-color-dark" style="">Trip Curtailment</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span id="travel_7_final" name="travel_7_final"></span></strong>
													<input type="hidden" name="travel_7_final_all" name="travel_7_final_all" value="">
												</td>
											</tr>


											<tr id="del_tr_final">
												<td colspan="2" class="text-color-dark" style="">Delayed departure</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span >up to Php 10,000.00 </span></strong>
													<input type="hidden" value="">
												</td>
											</tr>
											<tr id="bag_tr_final">
												<td colspan="2" class="text-color-dark" style="">Baggage Delay</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span >up to Php 5,000.00 </span></strong>
													<input type="hidden" value="">
												</td>
											</tr>
											<tr id="com_tr_final">
												<td colspan="2" class="text-color-dark" style="">Compensation for in-flight loss and damage (checked-in baggage)</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span >up to Php 10,000.00 (subject to Php 1,000.00/item)</span></strong>
													<input type="hidden" value="">
												</td>
											</tr>

											<tr>
												<td colspan="2" class="text-color-dark" style="">Long distance medical information services</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span>Actual Expense</span></strong>
													<input type="hidden" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Medical referral/appointment of local medical specialists</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span>Actual Expense</span></strong>
													<input type="hidden" value="">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="text-color-dark" style="">Connection Services</td>
												<td class="text-color-dark" style="text-align: right;">
													<strong><span>Actual Expense</span></strong>
													<input type="hidden" value="">
												</td>
											</tr>
											
											<style type="text/css">
												table :not(:first-child) {
												  border-top:border: 1px solid #008080;
												}
											</style>
											<tr id="covid_quote_div_final_1">
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">COVID-19 Coverage</span> </td>
											</tr>
											<tr id="covid_quote_div_final">
												<td colspan="3" class="text-color-dark" style="">
													<table id="tbl_summary_covid_3rdpage" style="border: 1px solid #008080;width: 100%;border-top: 1px solid #008080">
								                        <tbody >
								                            <tr>
								                                <td style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong>OPTIONAL COVER-COVID-19 COVERAGE <br>(Via Air or Via Non-Air)</strong></td>
								                                <td id="final_quote_packet_head" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong>Packet</strong></td>
								                                <td id="final_quote_pro_head" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong>Pro</strong></td>
								                                <td id="final_quote_prime_head" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong>Prime</strong></td>
								                                <td id="final_quote_platinum_head" style="border: 1px solid #008080;width: 20%;padding: 10px;border-bottom: 2px solid #000000;text-align:center"><strong>Platinum</strong></td>
								                            </tr>
								                            <tr>
								                                <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Trip Cancellation due to COVID-19</td>
								                                <td id="final_quote_packet_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 25,000.00</td>
								                                <td id="final_quote_pro_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 25,000.00</td>
								                                <td id="final_quote_prime_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 25,000.00</td>
								                                <td id="final_quote_platinum_content_1" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 25,000.00</td>
								                            </tr>
								                            <tr>
								                                <td style="border: 1px solid #008080;width: 20%;padding: 10px;">Daily Hospital Benefits due to COVID-19 (maximum of 15 days)</td>
								                                <td id="final_quote_packet_content_2" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 250.00/day</td>
								                                <td id="final_quote_pro_content_2" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 500.00/day</td>
								                                <td id="final_quote_prime_content_2" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 750.00/day</td>
								                                <td id="final_quote_platinum_content_2" style="border: 1px solid #008080;width: 20%;padding: 10px;">Php 1,000.00/day</td>
								                            </tr>
								                        </tbody>
								                    </table>
												</td>
											</tr>
											
											<tr>
												<td colspan="3" class="bgcolor-primary text-color-light " ><span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Subjectivities</span> </td>
											</tr>
											<tr>
												<td colspan="3" class="text-color-dark" style="">
													<table width="100%">
														<thead>
															<tr id="sub_final_1">
																<td  class="text-color-dark" style="width: 1%;">&#8226;</td>
																<td class="text-color-dark" style="width: 99%;">
																	Warranted that the covered person/s should have two (2) shots of COVID-19 vaccine (one for J&J shots) at inception of policy  
																</td>
															</tr>
															<tr  id="sub_final_2">
																<td  class="text-color-dark" style="width: 1%;">&#8226;</td>
																<td class="text-color-dark" style="width: 99%;">
																	Insured is not confirmed positive (asymptomatic or symptomatic), suspected, or probable cases of COVID-19 at the time of the application
																</td>
															</tr>
															<tr>
																<td  class="text-color-dark" style="width: 1%;">&#8226;</td>
																<td class="text-color-dark" style="width: 99%;">
																	Infectious Disease Exclusion Clause
																</td>
															</tr>
															<tr>
																<td  class="text-color-dark" style="width: 1%;">&#8226;</td>
																<td class="text-color-dark" style="width: 99%;">
																	Sabotage and Terrorism Inclusion
																</td>
															</tr>
															<tr>
																<td  class="text-color-dark" style="width: 1%;">&#8226;</td>
																<td class="text-color-dark" style="width: 99%;">
																	Beneficiary Endorsement
																</td>
															</tr>
															<tr>
																<td  class="text-color-dark" style="width: 1%;">&#8226;</td>
																<td class="text-color-dark" style="width: 99%;">
																	Standard Cocogen Domestic Travel Policy Wordings
																</td>
															</tr>
															<tr  id="sub_final_3">
																<td  class="text-color-dark" style="width: 1%;">&#8226;</td>
																<td class="text-color-dark" style="width: 99%;">
																	Domestic COVID-19 Coverage Endorsement Wordings 
																</td>
															</tr>
															
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