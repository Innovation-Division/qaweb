<div class="row" >
	<h4 class="rfs-md-1-3" style="text-align: left;">Personal Information </h4> <br>
	<span style="position: float;margin-top: -10px;font: italic small-caps;opacity: 0.7;font-size: 13px;">Please provide the personal information of the person who will travel.</span>
</div>
	
<div class="col-md-12_ break-two"> <br> </div> 
				
<div class="row">
	<div class="col-md-1">
		<div class="form-group">
					<label for="salutation">Salutation <span class="text-danger">*</span></label>
					<select  id="salutation" name="salutation" class="form-control corner selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-btn-white-residence_province" data-size="10"  data-live-search="true" >
							<option value=""  style="color: darkgray;">- Select -</option>            
							<option value="Ms.">Ms.</option>            
							<option value="Mrs.">Mrs.</option>            
							<option value="Mr.">Mr.</option>             
					</select>
					<input type="hidden" name="covid_amount">
					<input type="hidden" name="net_premium_all">
					<input type="hidden" name="premium_tax_all">
					<input type="hidden" name="final_premium_tax_all">
					<input type="hidden" name="lgt_all">
					<input type="hidden" name="doc_stamp_all">
					<input type="hidden" name="total_amount">
		</div>
	</div>
	<div class="col-md-3">
				<div class="form-group">
					<label for="first_name">First Name <span class="text-danger">*</span></label>
					<input name="first_name" id="first_name" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control corner input-lg NoPaste personal_ifno_mobile first_name" maxlength="100">
					<div class="invalid-feedback first-feed">
						First Name is empty.
					</div>
				</div>
	</div>
	<div class="col-md-3">
				<div class="form-group">
					<label for="middle_name">Middle Name <span class="text-danger">*</span></label>
					<input name="middle_name" id="middle_name" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control corner input-lg NoPaste personal_ifno_mobile middle_name" maxlength="100">
					<div class="invalid-feedback middle-feed">
						Middle Name is empty.
					</div>
				</div>
	</div>
	<div class="col-md-3">
				<div class="form-group">
					<label for="last_name">Last Name <span class="text-danger">*</span></label>
					<input name="last_name" id="last_name" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+"  class="form-control input-lg corner NoPaste personal_ifno_mobile last_name" maxlength="100">
					<div class="invalid-feedback last-feed">
						Last Name is empty.
					</div>
				</div>         	
	</div>   
	
	<div class="col-md-2">
		<div class="form-group">
			<label for="suffix">Suffix <span style="color: darkgrey">(optional)</span></label>
			<input name="suffix" id="suffix" type="text" class="form-control input-lg NoPaste corner personal_ifno_mobile" maxlength="100">
		</div>
	</div>  
	
	<div class="col-md-12_ form-group">
		<label for="address">Address <span class="text-danger">*</span></label>
		<input name="residence_address" id="residence_address" type="text" class="form-control corner input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street">
		<div class="invalid-feedback address-feed">
						Address is empty.
					</div>
	</div>        	
        	 
	<div class="col-md-4 ">
		<div class="form-group">
			<select id="residence_province" name="residence_province" class="form-control selectpicker corner address_mobile input-lg selectb5" data-style="input-lg  btn-white-residence_province" data-size="10"  data-live-search="true"  >
				<option value="">- Select Province -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 "> 
		<div class="form-group">
			<select id="residence_municipality" name="residence_municipality"  class="form-control corner selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-residence_municipality" data-size="10"  data-live-search="true">
				<option value="">- Select City/Municipality -</option>            
			</select>
		</div>
	</div>
	<div class="col-md-4 ">
		<div class="form-group">
			<select id="residence_barangay" name="residence_barangay"  class="form-control selectpicker corner address_mobile input-lg selectb5" data-style="input-lg btn-white-residence_barangay" data-size="10"  data-live-search="true">
				<option value="">- Select Barangay -</option>           
			</select>
		</div> 
	</div> 
	<div class="col-md-1">
		<div class="form-group">
					<label for="sex">Gender <span class="text-danger">*</span></label>
					<select id="sex" name="sex" class="form-control corner selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
							<option value="">- Select -</option>            
							<option value="Male">Male</option>            
							<option value="Female">Female</option>            
							<option value="Other">Other</option>             
					</select>
					<div class="invalid-feedback gender-feed">
						Please select a gender.
					</div>
		</div>
	</div>
	<div class="col-md-3">
				<div class="form-group">
					<label for="birth_place">Birth Place <span class="text-danger">*</span></label>
					<input name="birth_place" id="birth_place" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control corner input-lg NoPaste personal_ifno_mobile" maxlength="100">
					<div class="invalid-feedback birth-feed">
						Birth place is empty.
					</div>
				</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="mobile">Mobile Number <span class="text-danger">*</span></label>
			<input name="mobile" id="mobile" type="text" class="form-control corner input-lg NoPaste personal_ifno_mobile mobile" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
			<div class="invalid-feedback mobile-feed">
						Mobile number is empty.
					</div>
		</div> 
	</div>
</div>    

<div class="row">
    <div class="col-md-2">
	<div class="form-group">
				<label for="id_type">ID Type <span class="text-danger">*</span></label>
					<select id="id_type" name="id_type" class="form-control corner selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
							<option value=""> - Select - </option>            
							<option value="Passport">Passport</option>            
							<option value="Driver's License">Driver's License</option>            
							<option value="National ID">National ID</option>             
					</select>
					</div>
	</div>
	<div class="col-md-2">
				<input name="upload" type="file" id="fileinput" class="d-none" accept="image/jpeg,image/png"/>
				<a type="button" class="btn btn-success upload" id="upload_file">Upload ID</a>
				<div class="invalid-feedback mobile-feed">
						ID is empty.
				</div>
				<!-- <img src="" alt="" id="preview"> -->
				<p class="upload-file-name"></p>
	</div>
	<div class="col-md-4">
		<p class="personal-info">Please upload an ID with your signature. <br>File must be in JPEG or PNG format not exceeding XX mb.</p>
	</div>
</div>


<div class="col-md-12_ break-two"> <br> </div> 

<div class="row" >
	<h4 class="rfs-md-1-3" style="text-align: left;">Emergency Contact/Beneficiary </h4> <br>
</div>
	
<div class="col-md-12_ break-two"> <br> </div> 

<div class="row">
<div class="col-md-4">
				<div class="form-group">
					<label for="emergency_contact_name">Name <span class="text-danger">*</span></label>
					<input name="emergency_contact_name" id="emergency_contact_name" type="text"  class="form-control corner input-lg NoPaste personal_ifno_mobile" maxlength="100" autocomplete="off">
					<div class="invalid-feedback contact-name-feed">
						Contact person name is empty.
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="emergency_contact_no">Contact No. <span class="text-danger">*</span></label>
					<input name="emergency_contact_no" id="emergency_contact_no" type="text"  class="form-control corner input-lg NoPaste personal_ifno_mobile" maxlength="100" autocomplete="off">
					<div class="invalid-feedback contact-no-feed">
						Contact person contact no. is empty.
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="emergency_contact_relationship">Relationship <span class="text-danger">*</span></label>
					<input name="emergency_contact_relationship" id="emergency_contact_relationship" type="text"  class="form-control corner input-lg NoPaste personal_ifno_mobile" maxlength="100" autocomplete="off">
					<div class="invalid-feedback contact-no-feed">
						Contact person relationship is empty.
					</div>
				</div>
			</div>	
</div>