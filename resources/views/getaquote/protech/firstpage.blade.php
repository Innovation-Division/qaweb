
<h4 class="rfs-2-5 rfs-md-1-3">Personal Data</h4>   

<div class="row">
	<div class="col-md-12 break-two"><br></div> 
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="firstName_personal_info">First Name</label>
			<input name="firstName_personal_info" id="firstName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="middleName_personal_info">Middle Name</label>
			<input name="middleName_personal_info" id="middleName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="lastName_personal_info">Last Name</label>
			<input name="lastName_personal_info" id="lastName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
		</div>         	
	</div>         	
</div>   

<div class="col-md-12_ break-two"><br></div>  

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="contactNo_personal_info">Mobile No.</label>
			<input name="contactNo_personal_info" id="contactNo_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
		</div>      
	</div>      
	<div class="col-md-4">
		<div class="form-group">
			<label for="email_personal_info">Email Address</label>
			<input name="email_personal_info" id="email_personal_info" type="text" placeholder="Email Address" class="form-control input-lg personal_ifno_mobile" maxlength="100">
		</div>
	</div>
</div>

<div class="col-md-12_ break-two"><br></div>

<div class="col-md-12_ form-group">
	<label for="address">Present Address</label>
	<input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street">
</div>        	

<div class="col-md-12_ break-two"><br></div> 
        	 
<div class="row">
	<div class="col-md-4 ">
		<div class="form-group">
			<label for="residence_province">Select Province</label>
			<select id="residence_province" name="residence_province" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-residence_province" data-size="10"  data-live-search="true"  >
				<option value="">- Select Province -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 "> 
		<div class="form-group">
			<label for="residence_municipality">Select City/Municipality</label>
			<select id="residence_municipality" name="residence_municipality"  class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-residence_municipality" data-size="10"  data-live-search="true">
				<option value="">- Select City/Municipality -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 ">
		<div class="form-group">
			<label for="residence_barangay">Select Barangay</label>
			<select id="residence_barangay" name="residence_barangay"  class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-residence_barangay" data-size="10"  data-live-search="true">
				<option value="">- Select Barangay -</option>           
			</select>
		</div> 
	</div> 
</div>

<div class="col-md-12_ break-two"><br></div> 
<div class="col-md-12_ break-two"><br></div> 

<div class="col-md-12_ form-group">
	<h4 class="rfs-2-5 rfs-md-1-3">Permanent Address</h4>
	<div class="col-md-12_ break-two"> <br> </div> 
	<div class="form-group">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" id="chckSameAddress" name="chckSameAddress" value="1"> 
			<label class="form-check-label" for="chckSameAddress">Same as Present Address </label>
		</div>
	</div>
	<div class="col-md-12_ form-group">
		<label for="mailing_address">Permanent Address</label>
		<input name="mailing_address" id="mailing_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street">
	</div>        	
</div>        	

<div class="col-md-12_ break-two"><br></div> 
        	 
<div class="row">
	<div class="col-md-4 ">
		<div class="form-group">
			<label for="mailing_province">Select Province</label>
			<select id="mailing_province" name="mailing_province"  class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-mailing_province" data-size="10"  data-live-search="true">
					<option value="">- Select Province -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 "> 
		<div class="form-group">
			<label for="mailing_municipality">Select City/Municipality</label>
			<select id="mailing_municipality" name="mailing_municipality"  class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-mailing_municipality" data-size="10"  data-live-search="true">
					<option value="">- Select City/Municipality -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 ">
		<div class="form-group">
			<label for="mailing_barangay">Select Barangay</label>
			<select id="mailing_barangay" name="mailing_barangay"  class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white btn-white-mailing_barangay" data-size="10"  data-live-search="true">
					<option value="">- Select Barangay -</option>           
			</select>
		</div> 
	</div> 
</div> 
             
<div class="col-md-12_ break-two"><br></div> 

<div class="col-12_ text-center mt-5">
	<button  id="next_1stpage" name="next_1stpage" type="button"  class="action next_1stpage btn btn-secondary form-control_">Next</button>		         	     
</div>


		       