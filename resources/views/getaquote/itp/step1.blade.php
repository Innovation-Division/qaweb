<div class="row" >
	<h4 class="rfs-2-5 rfs-md-1-3" style="text-align: left;">Personal Information </h4> <br>
	<span style="position: float;margin-top: -10px;font: italic small-caps;opacity: 0.7;font-size: 13px;">Please provide the personal information of the person who will travel.</span>
</div>

<div class="col-md-12_ break-two"> <br> </div>
<!-- <div class="row">
	<div class="col-md-2">
		<div class="form-group">
			<input type="radio" id="Individual" name="insurance_cover" value="Individual">
			<label for="Individual">Individual</label>
			&nbsp;
			<input type="radio" id="Group" name="insurance_cover" value="Group">
			<label for="Group">Group</label>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">

		</div>
	</div>
</div> -->

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
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="salutation_personal_info">Salutation</label>
            <div class="form-group">
                <select  id="salutation_personal_info" name="salutation_personal_info" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                        <option value="">- Select -</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Mr.">Mr.</option>
                </select>
            </div>
		</div>
	</div>
    <div class="col-md-4">
		<div class="form-group">
			<label for="suffix_4thpage">Suffix</label>
			<input name="suffix_4thpage" id="suffix_4thpage" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
		</div>
	</div>
	<div class="col-md-4">
	</div>
</div>


<div class="col-md-12_ break-two"> <br> </div>

<div class="row">
	<label for="Individual">Contact Information</label>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="email_personal_info">Email Address</label>
			<input name="email_personal_info" id="email_personal_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="tel_no_info">Telephone Number</label>
			<input name="tel_no_info" id="tel_no_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  onkeypress="CheckNumeric(event);">
		</div>
	</div>
    <div class="col-md-4">
		<div class="form-group">
			<label for="contactNo_personal_info">Mobile Number</label>
			<input name="contactNo_personal_info" id="contactNo_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
		</div>
	</div>
</div>
