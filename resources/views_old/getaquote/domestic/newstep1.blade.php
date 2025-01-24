<!-- <div class="row" >
	<h4 class="rfs-2-5 rfs-md-1-3" style="text-align: left;">Itinerary </h4> <br>
	<span style="position: float;margin-top: -10px;font: italic small-caps;opacity: 0.7;font-size: 13px;">Please specify the destination and duration of this trip.</span>
</div> -->
<div class="col-md-12_ break-two"> <br> </div>



<!-- <div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<input type="radio" id="single_trip" name="insurance_cover" value="Single Trip">
			<label for="single_trip">Single Trip</label>
			&nbsp;
			<input type="radio" id="multiple_trip" name="insurance_cover" value="Multiple Trip">
			<label for="multiple_trip">Multiple Trip</label>
		</div>
	</div>
</div>
 -->

<div id="customFields" class="devices-ins mb-5">
	<div id="hardware-body">
		<div class="row">
			<div class="col-lg-6 sample">
				<div class="form-group">
					<label for="destination_itinerary" style="color: white;">Destination</label>
					<select id="destination_itinerary" name="destination_itinerary[]"
						class="form-control selectpicker address_mobile input-lg selectb5"
						data-style="input-lg btn-white-destination_itinerary" data-size="10" data-live-search="true">
						<option value="">- Select -</option>
						@foreach($locations as $location)
						<option value="{{$location->province}}">{{$location->province}}</option>
						@endforeach
					</select>
					<p class="destination-feed d-none" style="color: #b94a48; font-weight: 400; margin-top: 0.25rem;">
						Destination is empty.
					</p>
					
				</div>
			</div>
			<div class="col-lg-2 sample">
				<div class="form-group">
					<label for="departure_date_itinerary" style="color: white;">From
					</label>
					<div class="form-group">
						<input name="departure_date_itinerary[]" id="departure_date_itinerary" type="date"
							class="form-control input-lg date date-range-input"
							maxlength="100" placeholder="Select Departure Date">
							<div class="invalid-feedback departure date-range">
								Please provide a valid date.
							</div>
							<p class="date-range-feed d-none" style="color: #dc3545; font-weight: 400; margin-top: 0.25rem;">
								Date range should not exceed to 60 days.
							</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 sample">
				<div class="form-group">
					<label for="return_date_itinerary" style="color: white;">To
					</label>
					<div class="form-group">
						<input name="return_date_itinerary[]" id="return_date_itinerary" type="date"
							class="form-control input-lg date date-range-input return_date_number"
							maxlength="100" placeholder="Select Return Date">
							<div class="invalid-feedback return date-range">
								Please provide a valid date.
							</div>
							<p class="date-range-feed d-none" style="color: #dc3545; font-weight: 400; margin-top: 0.25rem;">
								Date range should not exceed to 60 days.
							</p>
					</div>
				</div>
			</div>
			<div class="col-1 col-lg-1 delete-row-col d-none">
				<button type="button" class="action_ delete-row btn btn-danger form-control_">
					<svg id="i-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 28"
						width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round"
						stroke-linejoin="round" stroke-width="2">
						<path d="M2 30 L30 2 M30 30 L2 2" />
					</svg>
				</button>
			</div>
            <div class="col-1 col-lg-1 col-btn add-row-col">
				<button type="button" class="btn btn-primary add-button 4thpage_add">
					<svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="36px" fill="#FFFFFF"><path d="M0 0h24v24H0z" fill="none"/><path fill="#fff" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
				</button>
			</div>
		</div>
	</div>
</div>


<div class="row text-center mb-3 mode">
	<p>Mode of Transportation<p>
</div>

<div class="row mb-3">
	<div class="btn-group btn-group-toggle" data-toggle="buttons" id='radio-option'>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12 via-air">
			<!-- <button type="button" class="action via btn form-control_ border-0">Via Air</button>  -->
			<label class="btn via">
				<input type="radio" name="modeOfTransportation" id="option1" autocomplete="off" value='Air Plan'> Via Air
			</label>
			<p class="modeOfTransportation-feed d-none" style="color: #dc3545; font-weight: 400; margin-top: 0.25rem;">
				Please select a mode of transportation.
			</p>
			<!-- <div class="form-group">
			<input type="radio" id="air" name="mode_transpo" value="Air Plan">
			<label id="transpo_air_air" for="air">Via Air</label>
			&nbsp;
			<input type="radio" id="non_air" name="mode_transpo" value="Non-Air Plan">
			<label id="transpo_nonair_air" for="non_air">Via Non-Air </label> <span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(minimum 125km away from usual place of residence. Verify distance via Google Maps)</i></span>
		</div> -->
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <button type="button" class="action via-non btn form-control_ border-0">Via Non-Air</button>   -->
			<label class="btn via-non">
				<input type="radio" name="modeOfTransportation" id="option2" autocomplete="off" value='Non-Air Plan'> Via Non Air
			</label>
			<p class="modeOfTransportation-feed d-none" style="color: #dc3545; font-weight: 400; margin-top: 0.25rem;">
				Please select a mode of transportation.
			</p>
			<p class="transpo-info">Minimum of 125 km. away from usual place of residence. <br>Verify distance via Google Maps</p>
		</div>




	</div>
</div>

<div class="container mb-4 step1 d-none" id="step-1" style="width: 1100px">
<div class="form-group d-lg-none">
				<label for="coverage">Package<span class="text-danger">*</span></label>
					<select id="coverage" name="coverage" class="form-control corner selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
							<option value=""> </option>            
							<option value="Packet">Packet</option>            
							<option value="Pro">Pro</option> 
							<!-- <option value="Prime">Prime</option>            
							<option value="Platinum">Platinum</option>                       -->
					</select>
					</div>
<div class="table-responsive">
	<table class="table table-bordered justify-content-center">
		<thead>
			<tr class="text-center p-3" style="background-color: #008080; color: white; ">
				<th>Coverage</th>
				<th>
					<div class="form-check form-check-inline d-none d-lg-block">
						<input class="form-check-input radio" type="radio" name="coverage" id="inlineRadio1"
							value="Packet">
						<label class="form-check-label radio-label" for="inlineRadio1"
							style="color:white;">Packet</label>
							<div class="invalid-feedback">
							Please select a package.
						</div>
					</div>
					<span class="d-lg-none" style="color: white; ">Packet</span>
				</th>
				<th>
					<div class="form-check form-check-inline d-none d-lg-block">
						<input class="form-check-input radio" type="radio" name="coverage" id="inlineRadio2"
							value="Pro">
						<label class="form-check-label radio-label" for="inlineRadio2" style="color:white;">Pro</label>
						<div class="invalid-feedback">
							Please select a package.
						</div>
					</div>
					<span class="d-lg-none" style="color: white; ">Pro</span>
				</th>
				<!-- <th>
					<div class="form-check form-check-inline d-none d-lg-block">
						<input class="form-check-input radio" type="radio" name="coverage" id="inlineRadio3"
							value="Prime">
						<label class="form-check-label radio-label" for="inlineRadio3"
							style="color:white;">Prime</label>
							<div class="invalid-feedback">
							Please select a package.
						</div>
					</div>
					<span class="d-lg-none" style="color: white; ">Prime</span>
				</th>
				<th>
					<div class="form-check form-check-inline d-none d-lg-block">
						<input class="form-check-input radio" type="radio" name="coverage" id="inlineRadio4"
							value="Platinum">
						<label class="form-check-label radio-label" for="inlineRadio4" style="color:white;">Platinum</label>
						<div class="invalid-feedback">
							Please select a package.
						</div>
					</div>
					<span class="d-lg-none" style="color: white; ">Platinum</span>
				</th> -->
			</tr>
		</thead>
		<tbody class="text-center">
			<tr>
				<td>Accidental Death and Disablement</td>
				<td>Php 250,000.00</td>
				<td>Php 500,000.00</td>
				<!-- <td>Php 750,000.00</td>
				<td>Php 1,000,000.00</td> -->
			</tr>
			<tr>
				<td>Accidental Medical Reimbursement</td>
				<td>Php 25,000.00</td>
				<td>Php 50,000.00</td>
				<!-- <td>Php 75,000.00</td>
				<td>Php 100,000.00</td> -->
			</tr>
			<tr>
				<td>Accidental Burial Benefit</td>
				<td>Php 25,000.00</td>
				<td>Php 50,000.00</td>
				<!-- <td>Php 75,000.00</td>
				<td>Php 100,000.00</td> -->
			</tr>
			<tr>
				<td>Unprovoked Murder and Assault</td>
				<td>Php 250,000.00</td>
				<td>Php 500,000.00</td>
				<!-- <td>Php 750,000.00</td>
				<td>Php 1,000,000.00</td> -->
			</tr>
			<tr>
				<td class="text-start" style="color: #008080; ">Travel Assistance</td>
				<td></td>
				<td></td>
				<!-- <td></td>
				<td></td> -->
			</tr>
			<tr>
				<td>Medical Expenses (with Sabotage and Terrorism)<br> and hospitalization</td>
				<td>Php 250,000.00</td>
				<td>Php 500,000.00</td>
				<!-- <td>Php 750,000.00</td>
				<td>Php 1,000,000.00</td> -->
			</tr>
			<tr>
				<td>Transport of repatriation in case<br> of illness or accident</td>
				<td>Actual Expense</td>
				<td>Actual Expense</td>
				<!-- <td>Actual Expense</td>
				<td>Actual Expense</td> -->
			</tr>
			<tr>
				<td>Repatriation of mortal remains</td>
				<td>Actual Expense</td>
				<td>Actual Expense</td>
				<!-- <td>Actual Expense</td>
				<td>Actual Expense</td> -->
			</tr>
			<tr>
				<td>Pre-existing Condition within the<br> Look Back Period</td>
				<td>Php 12,500.00</td>
				<td>Php 25,000.00</td>
				<!-- <td>Php 37,500.00</td>
				<td>Php 50,000.00</td> -->
			</tr>
			<tr>
				<td>Trip cancellation</td>
				<td>Php 25,000.00</td>
				<td>Php 25,000.00</td>
				<!-- <td>Php 25,000.00</td>
				<td>Php 25,000.00</td> -->
			</tr>
			<tr>
				<td>Trip curtailment</td>
				<td>Php 25,000.00</td>
				<td>Php 25,000.00</td>
				<!-- <td>Php 25,000.00</td>
				<td>Php 25,000.00</td> -->
			</tr>
			<tr class="delayed-departure">
				<td>Delayed Departure</td>
				<td>up to Php 10,000.00</td>
				<td>up to Php 10,000.00</td>
				<!-- <td>up to Php 10,000.00</td>
				<td>up to Php 10,000.00</td> -->
			</tr>
			<tr class="baggage-delay">
				<td>Baggage Delay</td>
				<td>up to Php 5,000.00</td>
				<td>up to Php 5,000.00</td>
				<!-- <td>up to Php 5,000.00</td>
				<td>up to Php 5,000.00</td> -->
			</tr>
			<tr class="in-flight">
				<td>Compensation for in-flight loss and damage (checked-in baggage)</td>
				<td>up to Php 10,000.00<br>(subject to Php 1,000.00/item)</td>
				<td>up to Php 10,000.00<br>(subject to Php 1,000.00/item)</td>
				<!-- <td>up to Php 10,000.00<br>(subject to Php 1,000.00/item)</td>
				<td>up to Php 10,000.00<br>(subject to Php 1,000.00/item)</td> -->
			</tr>
			<tr>
				<td>Long distance medical information services</td>
				<td>Actual Expense</td>
				<td>Actual Expense</td>
				<!-- <td>Actual Expense</td>
				<td>Actual Expense</td> -->
			</tr>
			<tr>
				<td>Medical referral/appointment<br> of local medical specialists</td>
				<td>Actual Expense</td>
				<td>Actual Expense</td>
				<!-- <td>Actual Expense</td>
				<td>Actual Expense</td> -->
			</tr>
			<tr></tr>
				<td>Connection Services</td>
				<td>Actual Expense</td>
				<td>Actual Expense</td>
				<!-- <td>Actual Expense</td>
				<td>Actual Expense</td> -->
			</tr>
		</tbody>
	</table>
	</div>
</div>



<div class="container mb-4 step1-coverage" style="width: 1100px">

	<div id="headingOne" class="card-header border-0">
		<p class="mb-0">
			<div class="form-check d-flex">
				<input class="form-check-input" type="checkbox" id="covid_checkbox" name="covid_checkbox" value="Yes">
				<a type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
					aria-controls="collapseOne" id="collapse"
				class="btn btn-link text-dark font-weight-bold collapsible-link">Add COVID-19 Coverage</a>
			</div>
		</p>
	</div>
	<div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered justify-content-center">
				<thead>
					<tr class="text-center p-3" style="background-color: #008080; color: white; ">
						<th> COVID-19 Coverage<br>(Optional Cover)</th>
						<th>Packet</th>
						<th>Pro</th>
						<!-- <th>Prime</th>
						<th>Platinum</th> -->
					</tr>
				</thead>
				<tbody class="text-center">
					<tr>
						<td>Trip Cancellation due to COVID-19</td>
						<td>Php 25,000.00</td>
						<td>Php 25,000.00</td>
						<!-- <td>Php 25,000.00</td>
						<td>Php 25,000.00</td> -->
					</tr>
					<tr>
						<td>Daily Hostipal Benefits due to COVID-19<br> (maximum of 15 days)</td>
						<td>Php 250.00/day</td>
						<td>Php 500.00/day</td>
						<!-- <td>Php 750.00/day</td>
						<td>Php 1,000.00/day</td> -->
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>

<div class="container step1-promo" style="width: 1100px">
	<!-- <div class="col-md-12_"> -->
	<div class="row mb-3">
		<div class="col-xs-12 col-sm-12 col-md-4">
			<div class="form-group">
				<label for="promo_code">Promo Code</label>
				<input name="promo_code" id="promo_code" type="text"
					class="form-control corner input-lg NoPaste personal_ifno_mobile" maxlength="100">
				<div class="invalid-feedback first-feed">
					Invalid promo code.
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8">
			<div class="form-group">
				<div class="d-flex justify-content-between">
					<label for="contact_5thpage">Email Address <span class="text-danger">*</span></label>
					<!-- <div class="form-check">
						<input class="form-check-input checkbox-step2" type="checkbox" value="yes" name="send_quotation" id="send_quotation">
						<label class="form-check-label" for="send_quotation" style="color:black; overflow-wrap: break-word;">
							Send the quotation to my email
						</label>
					</div> -->
				</div>
				<input name="email" id="email" type="email"
					class="form-control corner input-lg email" maxlength="100">
				<div class="invalid-feedback first-feed">
					Email address is empty.
				</div>
			</div>
		</div>
	</div>
	<!-- </div> -->
</div>

