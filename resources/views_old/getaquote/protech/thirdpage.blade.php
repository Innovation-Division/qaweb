<div id="warning_no_select_device" name="warning_no_select_device" class="error-msg" style="display: none">
  Please select type of device!
</div>	
<div id="warning_location_device" name="warning_location_device" class="error-msg" style="display: none">
  For Laptop, select coverage area!
</div>	
<div id="warning_modified_device" name="warning_modified_device" class="error-msg" style="display: none">
  Please select if your device is custom or modified!
</div>	

<div class="col-md-12_"> 
	<h4 class="rfs-2-5 rfs-md-1-3">Type of Device</h4>       
	<div class="break-two"><br></div> 	
	<input  type="hidden" name="type_of_device" name="type_of_device" value="">
	<div>
		<button type="button" id="desktop" name="desktop" onclick="desktopclick()" class="btn btn-secondary-light">Desktop</button>
		<button type="button" id="laptop" name="laptop" onclick="laptopclick()" class="btn btn-secondary-light" >Laptop</button>
	</div> 	
</div> 	

<div class="col-md-12_ break-two"><br></div> 

<div class="col-md-12_">
	<h4 class="rfs-2-5 rfs-md-1-3">Location of Device</h4>
	<div class="break-two"><br></div> 	
	<div class="form-group">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" id="chckSameAddressLocation" name="chckSameAddressLocation" value="1">
			<label class="form-check-label" for="chckSameAddressLocation">Same as Present Address</label>
		</div>
	</div>
	<div class="form-group">
		<!-- <label for="device_address"></label> -->
		<input name="device_address" id="device_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street">
	</div>
</div>   

<div class="col-md-12_ break-two"><br></div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="device_province">Select Province</label>
			<select  id="device_province" name="device_province" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_province" data-size="10"  data-live-search="true"  >
				<option value="">- Select Province -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 "> 
		<div class="form-group">
			<label for="device_municipality">Select City/Municipality</label>
			<select  id="device_municipality" name="device_municipality"  class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-device_municipality" data-size="10"  data-live-search="true">
				<option value="">- Select City/Municipality -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 ">
		<div class="form-group">
			<label for="device_barangay">Select Barangay</label>
			<select  id="device_barangay" name="device_barangay"  class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-device_barangay" data-size="10"  data-live-search="true">
				<option value="">- Select Barangay-</option>           
			</select>
		</div> 
	</div> 
</div> 

<div class="col-md-12_ break-two"><br></div> 	 

<div class="row">
	<div class="col-md-12">
		<h4 class="rfs-2-5 rfs-md-1-3">Is your device custom or modified?</h4>
		<div class="col-md-12_ break-two"><br></div> 	
			
		<div class="form-group">
			<div class="form-check form-check-inline device-cusmod">
				<input class="form-check-input" type="radio" id="device_modified_yes" name="device_loc_type_modified" value="Yes" >
				<label class="form-check-label" for="device_modified_yes">Yes</label>
			</div>
			<div class="form-check form-check-inline device-cusmod">
				<input class="form-check-input" type="radio" id="device_modified_no" name="device_loc_type_modified" value="No">
				<label class="form-check-label" for="device_modified_no">No</label>
			</div>
		</div>     
	</div>
</div>

<div class="col-md-12_ break-two"><br></div> 	

<div id="laptopdiv" style="display:none">
	<div class="col-md-12_">
		<h4 class="rfs-2-5 rfs-md-1-3">For laptops, select coverage area.</h4>
		<div class="col-md-12_ break-two"><br></div> 	
		<div class="form-group">
			<div class="form-check device-loctype">
				<input class="form-check-input" type="radio" id="device_yes" name="device_loc_type" value="Yes" >
				<label class="form-check-label" for="device_yes">Within Premises</label>
			</div>
			<div class="form-check device-loctype">
				<input class="form-check-input" type="radio" id="device_no" name="device_loc_type" value="No">
				<label class="form-check-label" for="device_no">Anywhere in the Philippines</label>
			</div>      
		</div>
	</div>
</div>