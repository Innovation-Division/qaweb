<div class="row" >
	<h4 class="rfs-2-5 rfs-md-1-3" style="text-align: left;">Itinerary </h4> <br>
	<span style="position: float;margin-top: -10px;font: italic small-caps;opacity: 0.7;font-size: 13px;">Please specify the destination and duration of this trip.</span>
</div>
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

 <div id="customFields" class="devices-ins">
	<div id="hardware-body">
			<div class="row"> 
				<div class="col-md-4">
					<div class="form-group">
						<label for="destination_itinerary">Destination</label> 
						<select  id="destination_itinerary" name="destination_itinerary[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-destination_itinerary" data-size="10"  data-live-search="true" >
								<option value="">- Select -</option>  
								@foreach($locations as $location)  
									<option value="{{$location->province}}">{{$location->province}}</option>    
								@endforeach      
						</select>
					</div>
				</div>
				<div class="col-4 col-lg-1 delete-row-col justify-content-left" >
					<button type="button" class="action_ delete-row btn btn-danger form-control_">
					  <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
					    <path d="M2 30 L30 2 M30 30 L2 2" />
					  </svg>
					  <span class="d-inline d-lg-none">Remove</span>
					</button>	
				</div>
			</div>
	</div>
</div>
<div id="divvv" style="display: none;">
	<select  id="copy_select" name="copy_select" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-destination_itinerary" data-size="10"  data-live-search="true" >
			<option value="">- Select -</option>  
			@foreach($locations as $location)  
				<option value="{{$location->province}}">{{$location->province}}</option>    
			@endforeach      
	</select>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="text-end mb-5 mt-3">
			<button id="4thpage_add" name="4thpage_add" type="button" class="4thpage_add btn btn-secondary form-control_">
	      		Add More
	    	</button>	
		</div>
	</div>
</div>

 <div class="row" style="margin-bottom:-10px;"> 
	<div class="col-md-4">
		<div class="form-group">
			<label for="return_date_itinerary" style="line-height: 15px;">Departure Date<br>
				<span style="font: italic small-caps;opacity: 0.7;font-size: 13px;">Departure from Place of Residence</span>
			</label>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="return_date_itinerary" style="line-height: 15px;">Return Date <br>
				<span style="font: italic small-caps;opacity: 0.7;font-size: 13px;">Arrival to Place of Residence</span>
			</label>

		</div>
	</div>
</div>
 <div class="row"> 
	<div class="col-md-4">
		<div class="form-group">
			<input name="departure_date_itinerary" id="departure_date_itinerary"  type="text" class="form-control input-lg NoPaste validation_date_of_Birth_personal_info personal_ifno_mobile"  maxlength="100" placeholder="MM/DD/YYYY">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<input name="return_date_itinerary" id="return_date_itinerary"  type="text" class="form-control input-lg NoPaste validation_date_of_Birth_personal_info personal_ifno_mobile"  maxlength="100" placeholder="MM/DD/YYYY">
		</div>
	</div>
</div>


<div class="row" >
	<label id="mode_of_transspo" for="Individual">Mode of Transportation</label><br>
	<span id="mode_of_transspo_span" style="position: float;margin-top: -10px;font: italic small-caps;opacity: 0.7;font-size: 13px;">For more information about our packages.  <a href="#" data-toggle="modal" data-target="#packges_modal" class="text-color-secondary text-decoration-underline">Click here.</a></span>
</div>

<div class="row" >
	<div class="col-md-12">
		<div class="form-group">
			<input type="radio" id="air" name="mode_transpo" value="Air Plan">
			<label id="transpo_air_air" for="air">Via Air</label>
			&nbsp;
			<input type="radio" id="non_air" name="mode_transpo" value="Non-Air Plan">
			<label id="transpo_nonair_air" for="non_air">Via Non-Air </label> <span style="font: italic small-caps;opacity: 0.7;font-size: 14px;"><i>(minimum 125km away from usual place of residence. Verify distance via Google Maps)</i></span>
		</div>
	</div>
</div>



<div class="row" >
	<label for="package">Package</label><br>
</div>
<div class="row"> 
	<div class="col-md-4">
		<div class="form-group">
			<select  id="package" name="package" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-package" data-size="10"  data-live-search="true" >
					<option value="">- Select -</option>            
					<option value="Packet">Packet</option>            
					<option value="Pro">Pro</option>                
					<option value="Prime">Prime</option>                
					<option value="Platinum">Platinum</option>                
			</select>
		</div>
	</div>
</div>
<div class="col-md-12_ break-two"> <br> </div> 



<div class="row" >
	<label id="covid_label_title" for="Individual">COVID-19 Coverage</label><br>
	<span id="covid_label_title_span" style="position: float;margin-top: -10px;font: italic small-caps;opacity: 0.7;font-size: 13px;">For more information about our COVID-19 Coverage.  <a href="#" data-toggle="modal" data-target="#covid_modal" class="text-color-secondary text-decoration-underline">Click here.</a></span>
</div>

<div class="row" >
	<div class="col-md-12">
		<div class="form-group">
			<input type="radio" id="covid_yes" name="include_covid" value="Yes">
			<label id="covid_yes_label" for="covid_yes">Yes</label>
			&nbsp;
			<input type="radio" id="covid_no" name="include_covid" value="No">
			<label  id="covid_no_label" for="covid_no">No</label>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="promo">Promo Code</label>
			<input name="promo" id="promo" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
		</div>
	</div>
</div>  

<div class="col-md-12_ text-center mt-5">
	<div id="nextbutton" name="nextbutton">
		<button  id="next_2ndpage" name="next_2ndpage" type="button"  class="action next_2ndpage btn btn-secondary form-control_">View Quote</button>  
 	</div>      
</div>
