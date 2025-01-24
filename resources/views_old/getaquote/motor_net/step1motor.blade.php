
<form id="motor_project" name="motor_project" method="post" enctype="multipart/form-data" action="javascript:void(0)">

        <div id='motor_proj_info'>
            <div class="alert alert-success" id="motor_proj01">
                <span id="motor_success"></span>
        </div>
        <div class="alert alert-danger d-none" id="motor_proj02">
                <span id="motor_failed"></span>
        </div>
    </div>
        <h1 style='color: #008080;'> Personal Data</h1>

            <input id="copytransno" name="copytransno" type="text" value="{{ !empty($transno) ? $transno : ""}}" class="hide">
        		<div class="col-md-4">
                    <div class="form-group">
                        <label for="firstName_personal_info">First Name</label>
                        <input name="firstName" id="firstName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z\/.]+" class="form-control input-lg  personal_ifno_mobile" maxlength="100">
                    </div>
                </div>
        		<div class="col-md-4">
                    <div class="form-group">
                        <label for="middleName_personal_info">Middle Name</label>
                        <input name="middleName" id="middleName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z\/.]+" class="form-control input-lg  personal_ifno_mobile" maxlength="100">
                    </div>
                </div>
        		<div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName_personal_info">Last Name</label>
                        <input name="lastName" id="lastName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z\/.]+"  class="form-control input-lg  personal_ifno_mobile" maxlength="100">
        		    </div>
                </div>
	        	<div class="col-md-12 break-two"><br></div>
	        	<div class="col-md-4">
                    <div class="form-group">
                        <label for="contactNo_personal_info">Mobile No.</label>
                        <input name="contactNo" id="contactNo_personal_info" type="text" class="form-control input-lg  personal_ifno_mobile" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
                    </div>
        		</div>
        		<div class="col-md-4">
                    <div class="form-group">
                        <label for="email_personal_info">Email Address</label>
                        <input name="emailAddress" id="email_personal_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value=''>

                    </div>
                </div>


        	<div class="col-md-12 break-two"> <br> </div>
			<div class="col-md-12">
                <div class="form-group">
                <label for="address"> Present Address</label> <input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street" maxlength="250">
            </div>
            </div>
        	<div class="col-md-12 break-two"> <br> </div>


            <div class="col-md-4 ">
                <div class="form-group">
                    <select  id="residence_province" name="residence_province" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                            <option value="">- Select Province -</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group">
                <select  id="residence_municipality" name="residence_municipality" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                		<option value="">- Select City/Municipality -</option>
                </select>
                </div>
             </div>
             <div class="col-md-4 ">
                <div class="form-group">
                    <select  id="residence_barangay" name="residence_barangay" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                            <option value="">- Select Barangay-</option>
                    </select>
                </div>
            </div>
            <input type='hidden' name='residence_province_hide' id='residence_province_hide'>
            <input type='hidden' name='residence_municipality_hide' id='residence_municipality_hide'>
            <input type='hidden' name='residence_barangay_hide' id='residence_barangay_hide'>
             <div class="col-md-12 break-two">
                    <br>
            </div>
            <div class="col-md-12 break-two">
                    <br>
            </div>

             <div class="col-md-12">

                <label for="mailing_address"> Permanent Address</label><br><br>
                <input type="checkbox" class="form-check-input" id="chckSameAddress" name="chckSameAddress" value="1">
                <label for="chckSameAddress">Same as Present Address </label>
             </div>
                <div class="col-md-12 break-two">
                    <br>
            </div>
             <div class="col-md-12 ">
                <div class="form-group">
                <input name="mailing_address" id="mailing_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street"></div>
            </div>

                <div class="col-md-12 break-two"> <br>
            </div>
            <div class="col-md-4 ">
                <div class="form-group">
                <select  id="mailing_province" name="mailing_province" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                    <option value="">- Select Province -</option>
                </select>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group">
                <select  id="mailing_municipality" name="mailing_municipality" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                		<option value="">- Select City/Municipality -</option>
                </select>
            </div>
             </div>

             <div class="col-md-4 ">
                <div class="form-group">
                    <select  id="mailing_barangay" name="mailing_barangay" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                    <option value="">- Select Barangay-</option>
                </select>
                </div>
             </div>

	        <div class="col-md-12 break-two"><br></div>
            <input type='hidden' name='mailing_province_hide' id='mailing_province_hide'>
            <input type='hidden' name='mailing_municipality_hide' id='mailing_municipality_hide'>
            <input type='hidden' name='mailing_barangay_hide' id='mailing_barangay_hide'>
            <input type='hidden' name='check_disable' id='check_disable1'>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="sourceOfFund">Source of Funds</label>
                    <input name="sourceOfFund" id="sourceOfFund" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z\/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
                </div>
            </div>

            <div class="col-md-12 break-two"><br></div>
            <div class="col-md-12 break-two"><br></div>
            <div class="col-md-4" style="text-align: left;">
                    <br>
                    {{-- <input name="submit" type="submit" id='test' class="btnSubmit btn btn-default form-control" style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;" value='Save'></input> --}}
                    <button type="submit" id="sav_motornet" name="save_motor" class="btn btn-primary">Save </button>
                </div>
            </form>
            {{-- <div class="col-md-4" style="text-align: left;">
                <br>
                <button id="next_1stpage" name="next_1stpage" type="button" class="action next btn btn-secondary a-btn-slide-text_ next_1stpage" style="display: inline-block;">Next</button>
            </div> --}}





