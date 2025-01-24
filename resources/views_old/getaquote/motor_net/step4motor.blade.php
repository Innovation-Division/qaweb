<style type="text/css">
	#btn_pwd_no,
	#btn_pwd_yes{
		min-width: 120px;
		min-height: 60px;
		background-color: #C0C0C0;
		color: #000000;
		margin-right: 15px;
	}
	.ui-datepicker {
background-color: #fff;
		font-size: 160%;
}

.ui-datepicker-header {
background-color: #008080;
border-color: #008080;

}

.ui-datepicker-title {
color: white;
}

.ui-widget-content .ui-state-default {
border: 0px;
text-align: center;
background: #fff;
font-weight: normal;
color: #008080;
}

.ui-widget-content .ui-state-default:hover {
border: 0px;
text-align: center;
background: #008080;
font-weight: normal;
color: #fff;
}

.ui-widget-content .ui-state-active {
border: 0px;
background: #008080;
color: #fff;
}
option:checked {
	background: red linear-gradient(0deg, red 0%, red 100%);
}

.fileUpload {
    position: relative;
    overflow: hidden;
    height: 46px;
    font-size: 20px;
}
.fileUpload input.uploadlogo {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 100%;
    height: 46px;
}
</style>
<form id="car_vehicle_others" name="car_vehicle_others" method="post"  enctype="multipart/form-data">

<div class="col-md-12" style="margin-bottom:10px;">
    <h4 class=" rfs-2-5 rfs-md-1-3">Additional Car Information</h4>
</div>
<div class="row">
    <div class="col-md-4">
        <label>MV File No.</label>
        <input id="mvfileno" name="mvfileno" type="text" class="form-control input-lg" maxlength="100"  value="" >
    </div>
    <div class="col-md-4">
        <label>Plate No.</label>
        <input id="plateno" name="plateno" type="text" class="form-control input-lg" maxlength="100"  value="" >
    </div>
    <div class="col-md-4">
        <label>Engine No.</label>
        <input id="engineno" name="engineno" type="text" class="form-control input-lg" maxlength="100"  value="" >
    </div>
</div>
<div class="col-md-12 break-two"><br></div>
<div class="col-md-12 break-two"><br></div>
<div class="row">
    <div class="col-md-4">
        <label>Color</label>
        <input id="color" name="color" type="text" class="form-control input-lg" maxlength="100"  >
    </div>
    <div class="col-md-4">
        <label>Conduction Sticker No.</label>
        <input id="conduction" name="conduction" type="text" class="form-control input-lg" maxlength="100" >
    </div>
    <div class="col-md-4">
        <label>Chasis No.</label>
        <input id="chasis" name="chasis" type="text" class="form-control input-lg" maxlength="100" >
    </div>
</div>

<div class="col-md-12 break-two"><br></div>
<div class="col-md-12 break-two"><br></div>

<div>
    <h4 class=" rfs-2-5 rfs-md-1-3">Period of Insurance</h4>
</div>
<div class="row">
    <div class="col-md-4">
        <label>Policy Incept Date</label>
        <input id="policyincept" name="policyincept" type="text" class="form-control input-lg" maxlength="100" >
    </div>
    <div class="col-md-4">
        <label>Mortgagee</label>
        <input id="mortgagee" name="morgagee" type="text" class="form-control input-lg" maxlength="100">
    </div>
    <div class="col-md-4">
    </div>
</div>
<div class="col-md-12 break-two"><br></div>
<div class="col-md-12 break-two"><br></div>
<div>
    <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Other Personal Data</h4>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('gender_personal_info') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="gender_personal_info">Gender</label>
                <select id="gender_personal_info" name="gender_personal_info"  class="form-control selectpicker select-input-border-color-gender selectb5" data-style="input-lg select-input-border-color-gender" data-size="10">
                        <option value="">- Select -</option>
                        <option value="Male" <?php if(old('gender_personal_info') === 'Male'){ ?>  selected="selected" <?php } ?>>Male</option>
                        <option value="Female"  <?php if(old('gender_personal_info') === 'Female'){ ?>  selected="selected" <?php } ?>>Female</option>
                </select>
                @if ($errors->has('gender_personal_info'))
                    <style type="text/css">
                        .select-input-border-color-gender{
                            border-color: darkred !important;
                        }
                    </style>
                    <span class="help-block">
                        <strong>{{ $errors->first('gender_personal_info') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('birthDate') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="birthDate">Date of Birth</label>
                <input name="birthDate" id="birthDate"  type="text" class="form-control input-lg NoPaste personal_ifno_mobile"  maxlength="100" placeholder="MM/DD/YYYY" value="{{ old('birthDate') }}">
                    @if ($errors->has('birthDate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birthDate') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('place_of_birth_other_personal_info') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="place_of_birth_other_personal_info">Place of Birth</label>
                <input name="place_of_birth_other_personal_info" id="place_of_birth_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{old('place_of_birth_other_personal_info')}}">
                    @if ($errors->has('place_of_birth_other_personal_info'))
                        <span class="help-block">
                            <strong>{{ $errors->first('place_of_birth_other_personal_info') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('status_other_personal_info') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="status_other_personal_info">Civil Status</label>
                <select  id="status_other_personal_info" name="status_other_personal_info" class="form-control selectpicker select-input-border-color-status selectb5" data-style="input-lg select-input-border-color-status" data-size="10"  data-live-search="true" >
                        <option value="">- Select -</option>
                        <option value="Single" <?php if(old('status_other_personal_info') === 'Single'){ ?>  selected="selected" <?php } ?>>Single</option>
                        <option value="Married" <?php if(old('status_other_personal_info') === 'Married'){ ?>  selected="selected" <?php } ?>>Married</option>
                        <option value="Widowed" <?php if(old('status_other_personal_info') === 'Widowed'){ ?>  selected="selected" <?php } ?>>Widowed</option>
                        <option value="Seprated" <?php if(old('status_other_personal_info') === 'Seprated'){ ?>  selected="selected" <?php } ?>>Seprated</option>
                        <option value="Divorced" <?php if(old('status_other_personal_info') === 'Divorced'){ ?>  selected="selected" <?php } ?>>Divorced</option>
                </select>
                @if ($errors->has('status_other_personal_info'))
                    <style type="text/css">
                        .select-input-border-color-status{
                            border-color: darkred !important;
                        }
                    </style>
                    <span class="help-block">
                        <strong>{{ $errors->first('status_other_personal_info') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="col-md-12_ break-two"> <br> <br> </div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('nationality_other_personal_info') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="nationality_other_personal_info">Nationality</label>
                <input name="nationality_other_personal_info" id="nationality_other_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="/[a-zA-Z.]+/" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{old('nationality_other_personal_info')}}">
                @if ($errors->has('nationality_other_personal_info'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nationality_other_personal_info') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('occupation') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="occupation">Occupation</label>
                <input name="occupation" id="occupation" type="text" onkeypress="return /[a-z. ]/i.test(event.key)"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{old('occupation')}}">
                    @if ($errors->has('occupation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('occupation') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
    </div>

    {{-- <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('telNo') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="telNo">Telephone Number</label>
                <input name="telNo" id="telNo" type="text"  onkeypress="CheckNumeric(event);" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{old('telNo')}}">
                @if ($errors->has('telNo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telNo') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div> --}}

    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group {{ $errors->has('type_of_id_personal_info') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="type_of_id_personal_info">Type of ID</label>
                <select  id="type_of_id_personal_info" name="type_of_id_personal_info" class="form-control selectpicker select-input-border-color-IDtype selectb5" data-style="input-lg select-input-border-color-IDtype" data-size="10"  data-live-search="true" >
                        <option value="">- Select -</option>
                        <option value="Philippine Passport" <?php if(old('type_of_id_personal_info') === 'Philippine Passport'){ ?>  selected="selected" <?php } ?>>Philippine Passport</option>
                        <option value="Driver's License" <?php if(old('type_of_id_personal_info') === "Driver's License"){ ?>  selected="selected" <?php } ?>>Driver's License</option>
                        <option value="SSS/GSIS UNID Card" <?php if(old('type_of_id_personal_info') === 'SSS/GSIS UNID Card'){ ?>  selected="selected" <?php } ?>>SSS/GSIS UNID Card</option>
                        <option value="Philhealth ID" <?php if(old('type_of_id_personal_info') === 'Philhealth ID'){ ?>  selected="selected" <?php } ?>>Philhealth ID</option>
                        <option value="Postal ID" <?php if(old('type_of_id_personal_info') === 'Postal ID'){ ?>  selected="selected" <?php } ?>>Postal ID</option>
                        <option value="TIN Card" <?php if(old('type_of_id_personal_info') === 'TIN Card'){ ?>  selected="selected" <?php } ?>>TIN Card</option>
                        <option value="Voter's ID" <?php if(old('type_of_id_personal_info') === "Voter's ID"){ ?>  selected="selected" <?php } ?>>Voter's ID</option>
                        <option value="PRC ID" <?php if(old('type_of_id_personal_info') === 'PRC ID'){ ?>  selected="selected" <?php } ?>>PRC ID</option>
                        <option value="Senior Citizen ID" <?php if(old('type_of_id_personal_info') === 'Senior Citizen ID'){ ?>  selected="selected" <?php } ?>>Senior Citizen ID</option>
                        <option value="OFW ID" <?php if(old('type_of_id_personal_info') === 'OFW ID'){ ?>  selected="selected" <?php } ?>>OFW ID</option>
                </select>
                    @if ($errors->has('type_of_id_personal_info'))
                        <span class="help-block">
                            <strong>{{ $errors->first('type_of_id_personal_info') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
    </div>
</div>

<div class="col-md-12_ break-two"> <br> </div>

<div class="row">


    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group  {{ $errors->has('idno_other_personal_info') ? ' has-error' : '' }}">
            <div class="col-md-3_">
                <label for="idno_other_personal_info">ID Number</label>
                <input name="idno_other_personal_info" id="idno_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{old('idno_other_personal_info')}}">
                @if ($errors->has('idno_other_personal_info'))
                    <span class="help-block">
                        <strong>{{ $errors->first('idno_other_personal_info') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <input type='hidden' name='check_disable' id='check_disable4'>
    <div class="col-12 col-md-6 col-lg-6">
        <div id="fromCopy" class="col-md-3_ form-group">
            <div><label for="file-upload" class="invisible">Upload</label></div>
            <div class="fileUpload btn btn-secondary-light">
                <span>Upload your ID</span>
                <input id="file-upload" name='file' type="file" class="uploadlogo" accept="image/x-png,image/jpeg"  />

            </div>
            <div>
                <label id="upload_Error" class="help-block" style="display: none; color: #CF3C4B; font-size: 15px;"></label>
                <label id="upload_file" style="display: none">File: <span id="upload_file_file" class="text-color-secondary"></span> <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i></label>
                <label id="upload_label" class="rfs-0-15">File must be in .jpeg or .png format not exceeding 5MB</label>
            </div>
        </div>
    </div>
</div>

<br />

<div class="row">
    <div class="col-12">
        <div class="col-md-3_ text-center">
            <input type="submit"  id="CompreThirdTabNext"  name="CompreThirdTabNext" class="form-control_ btn btn-secondary" value="Next" />
        </div>
    </div>
</div>

</form>
