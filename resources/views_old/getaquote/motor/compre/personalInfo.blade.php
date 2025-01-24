<style type="text/css">
    /* .select-input-border-color-gender,
    .select-input-border-color-IDtype,
    .select-input-border-color-status,
    .select-input-border-color-r-province,
    .select-input-border-color-r-municipality,
    .select-input-border-color-r-brgy,
    .select-input-border-color-m-province,
    .select-input-border-color-m-municipality,
    .select-input-border-color-m-brgy{            
        background-color: #ffffff !important;
        border-color: #ccc !important;
    } */
    .ui-datepicker {
    background-color: #fff;
        font-size: 160%;
    }
    .ui-datepicker-header {
    background-color: #008080;
    border-color: #008080;

    }
    .ui-datepicker-title {
    color: #008080;
    font-size: 15px;
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
</style>

<style type="text/css">
/* #btn_pwd_no,
#btn_pwd_yes{
    min-width: 120px;
    min-height: 60px;
    background-color: #C0C0C0;
    color: #000000;
    margin-right: 15px;
}

#btn_no,
#btn_yes{
    min-width: 90px;
    min-height: 60px;
    background-color: #C0C0C0;
    color: #000000;
    margin-right: 15px;
} */
#btn_back_to_applicant_occupation,
#btn_back_to_home,
#btn_back_to_applicant{
    min-width: 120px;
    min-height: 30px;
    background-color: #008080;
    color: #ffffff;
    margin-right: 15px;
}

.blue-btn:hover,
.blue-btn:active,
.blue-btn:focus,
.blue-btn {
    background: transparent;
    /* border: solid 1px #27a9e0;*/
    border-radius: 3px;
    color: #ffffff;
    background-color: #e4509a;
    font-size: 16px;
    margin-bottom: 20px;
    outline: none !important;
    padding: 10px 20px;
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
    height: 57px;
}

/*Chrome fix*/
input::-webkit-file-upload-button {
    cursor: pointer !important;
    height: 46px;
    width: 100%;
}

#upload_label {
    text-align: left;
    display: block;
}

@media only screen and (max-width: 1439px) {
    .fileUpload {
        height: 42px;
        font-size: 18px;
        padding-top: 7px;
    }
}

/* #upload_file{
    margin-top:-30px !important;
} */
</style>


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
                    
                    <div class="col-md-12_ break-two"> <br> </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  {{ $errors->has('residence_address') ? ' has-error' : '' }}">
                                <div class="col-md-12_">
                                    <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Present Address</h4> 
                                    <input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="500" placeholder="House No./Unit No./Floor No./Building/Street" value="{{old('residence_address')}}">
                                        @if ($errors->has('residence_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('residence_address') }}</strong>
                                            </span>
                                        @endif
                                </div> 
                            </div>
                        </div>
                    </div>
                             
                    <div class="col-md-12_ break-two"> <br> </div> 
            
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group {{ $errors->has('residence_province') ? ' has-error' : '' }}">
                                <div class="col-md-4_">
                                    <label for="residence_province">Select Province</label>
                                    <select  id="residence_province" name="residence_province" class="form-control selectpicker address_mobile select-input-border-color-r-province selectb5" data-style="input-lg select-input-border-color-r-province" data-size="10"  data-live-search="true" >
                                            <option value="">- Select Province -</option> 
                                            @if(old('residence_province'))
                                                <option value="{{old('residence_province')}}" selected="selected">{{old('residence_province')}}</option> 
                                            @endif           
                                    </select>
                                    @if ($errors->has('residence_province'))
                                        <style type="text/css">
                                            .select-input-border-color-r-province{
                                                border-color: darkred !important;
                                            }
                                        </style>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('residence_province') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('residence_municipality') ? ' has-error' : '' }}">
                                <div class="col-md-4_"> 
                                    <label for="residence_municipality">Select City/Municipality</label>
                                    <select  id="residence_municipality" name="residence_municipality"  class="form-control selectpicker address_mobile select-input-border-color-r-municipality selectb5" data-style="input-lg select-input-border-color-r-municipality" data-size="10"  data-live-search="true">
                                            <option value="">- Select City/Municipality -</option>  
                                            @if(old('residence_municipality'))
                                                <option value="{{old('residence_municipality')}}" selected="selected">{{old('residence_municipality')}}</option> 
                                            @endif          
                                    </select>
                                    @if ($errors->has('residence_municipality'))
                                        <style type="text/css">
                                            .select-input-border-color-r-municipality{
                                                border-color: darkred !important;
                                            }
                                        </style>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('residence_municipality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('residence_barangay') ? ' has-error' : '' }}">
                                <div class="col-md-4_">
                                    <label for="residence_barangay">Select Barangay</label>
                                    <select  id="residence_barangay" name="residence_barangay"  class="form-control selectpicker address_mobile select-input-border-color-r-brgy selectb5" data-style="input-lg select-input-border-color-r-brgy" data-size="10"  data-live-search="true">
                                            <option value="">- Select Barangay-</option>   
                                            @if(old('residence_barangay'))
                                                <option value="{{old('residence_barangay')}}" selected="selected">{{old('residence_barangay')}}</option> 
                                            @endif         
                                    </select>
                                    @if ($errors->has('residence_barangay'))
                                        <style type="text/css">
                                            .select-input-border-color-r-brgy{
                                                border-color: darkred !important;
                                            }
                                        </style>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('residence_barangay') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12_ break-two"><br></div> 
                    <div class="col-md-12_ break-two"><br></div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  {{ $errors->has('mailing_address') ? ' has-error' : '' }}">
                                <div class="col-md-12_">
                                    <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Permanent Address</h4>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox"id="chckSameAddress" name="chckSameAddress" value="1"> 
                                        <label class="form-check-label" for="chckSameAddress">Same as Present Address </label>
                                    </div>
                                    <input name="mailing_address" id="mailing_address" type="text" class="form-control input-lg" maxlength="500" placeholder="House No./Unit No./Floor No./Building/Street" value="{{old('mailing_address')}}">
                                    @if ($errors->has('mailing_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mailing_address') }}</strong>
                                        </span>
                                    @endif
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12_ break-two"> <br> </div> 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('mailing_province') ? ' has-error' : '' }}">
                                <div class="col-md-4_">
                                    <label for="mailing_province">Select Province</label>
                                    <select  id="mailing_province" name="mailing_province"  class="form-control selectpicker address_mobile select-input-border-color-m-province selectb5" data-style="input-lg select-input-border-color-m-province" data-size="10"  data-live-search="true">
                                            <option value="">- Select Province -</option> 
                                            @if(old('mailing_province'))
                                                <option value="{{old('mailing_province')}}" selected="selected">{{old('mailing_province')}}</option> 
                                            @endif            
                                    </select>
                                    @if ($errors->has('mailing_province'))
                                        <style type="text/css">
                                            .select-input-border-color-m-province{
                                                border-color: darkred !important;
                                            }
                                        </style>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mailing_province') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('mailing_municipality') ? ' has-error' : '' }}">
                                <div class="col-md-4_"> 
                                    <label for="mailing_municipality">Select City/Municipality</label>
                                    <select  id="mailing_municipality" name="mailing_municipality"  class="form-control selectpicker address_mobile select-input-border-color-m-municipality selectb5" data-style="input-lg select-input-border-color-m-municipality" data-size="10"  data-live-search="true">
                                            <option value="">- Select City/Municipality -</option>  
                                            @if(old('mailing_municipality'))
                                                    <option value="{{old('mailing_municipality')}}" selected="selected">{{old('mailing_municipality')}}</option> 
                                            @endif            
                                    </select>
                                    @if ($errors->has('mailing_municipality'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mailing_municipality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('residence_barangay') ? ' has-error' : '' }}">
                                <div class="col-md-4_">
                                    <label for="mailing_barangay">Select Barangay</label>
                                    <select  id="mailing_barangay" name="mailing_barangay"  class="form-control selectpicker address_mobile select-input-border-color-m-brgy selectb5" data-style="input-lg select-input-border-color-m-brgy" data-size="10"  data-live-search="true">
                                            <option value="">- Select Barangay-</option>  
                                            @if(old('mailing_barangay'))
                                                <option value="{{old('mailing_barangay')}}" selected="selected">{{old('mailing_barangay')}}</option> 
                                            @endif          
                                    </select>
                                    @if ($errors->has('mailing_barangay'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mailing_barangay') }}</strong>
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
                                    <input name="nationality_other_personal_info" id="nationality_other_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{old('nationality_other_personal_info')}}">
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
                        
                        <div class="col-12 col-md-6 col-lg-3">
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
                        </div>
                        
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('SouceOfFunds') ? ' has-error' : '' }}">
                                <div class="col-md-3_">
                                    <label for="SouceOfFunds">Souce of Funds</label>
                                    <input name="SouceOfFunds" id="SouceOfFunds" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100"  value="{{old('SouceOfFunds')}}">
                                    @if ($errors->has('SouceOfFunds'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('SouceOfFunds') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12_ break-two"> <br> </div> 

                    <div class="row">
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

<script type="text/javascript">
    jQuery('#residence_province').change(function(){
        if(jQuery(this).val() != '')
        {         
            var province = jQuery(this).val();   
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/city/get',
                method:"GET",
                data:{ _token:_token,province:province}, 
                success:function(result)
                {        
                    jQuery('#residence_municipality').empty();
                    $('#residence_municipality').append($('<option>', { 
                        value: "",
                        text : "- Select City/Municipality -"
                    }));
                    jQuery.each(result, function(key, value){
                    $('#residence_municipality').append($('<option>', { 
                        value: value.city,
                        text : value.city 
                    }));                    
                })  
                    jQuery('#residence_municipality').selectpicker("refresh"); 
                }
            })
        }
    }); 

    jQuery('#mailing_province').change(function(){
        if(jQuery(this).val() != '')
        {         
            var province = jQuery(this).val();   
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/city/get',
                method:"GET",
                data:{ _token:_token,province:province}, 
                success:function(result)
                {        
                    jQuery('#mailing_municipality').empty();
                    $('#mailing_municipality').append($('<option>', { 
                        value: "",
                        text : "- Select City/Municipality -"
                    }));
                    jQuery.each(result, function(key, value){
                    $('#mailing_municipality').append($('<option>', { 
                        value: value.city,
                        text : value.city 
                    }));                    
                })  
                    jQuery('#mailing_municipality').selectpicker("refresh"); 
                }
            })
        }
    }); 

    jQuery('#residence_municipality').change(function(){
        if(jQuery(this).val() != '')
        {         
            var city = jQuery(this).val();   
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/barangay/get',
                method:"GET",
                data:{ _token:_token,city:city}, 
                success:function(result)
                {        
                    jQuery('#residence_barangay').empty();
                    $('#residence_barangay').append($('<option>', { 
                        value: "",
                        text : "- Select Barangay -"
                    }));
                    jQuery.each(result, function(key, value){
                    $('#residence_barangay').append($('<option>', { 
                        value: value.barangay,
                        text : value.barangay 
                    }));                    
                })  
                    jQuery('#residence_barangay').selectpicker("refresh"); 
                }
            })
        }
    });

    jQuery('#mailing_municipality').change(function(){
        if(jQuery(this).val() != '')
        {         
            var city = jQuery(this).val();   
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/barangay/get',
                method:"GET",
                data:{ _token:_token,city:city}, 
                success:function(result)
                {        
                    jQuery('#mailing_barangay').empty();
                    $('#mailing_barangay').append($('<option>', { 
                        value: "",
                        text : "- Select Barangay -"
                    }));
                    jQuery.each(result, function(key, value){
                    $('#mailing_barangay').append($('<option>', { 
                        value: value.barangay,
                        text : value.barangay 
                    }));                    
                })  
                    jQuery('#mailing_barangay').selectpicker("refresh"); 
                }
            })
        }
    }); 

    $( "#chckSameAddress" ).click(function() { 
        if (jQuery(this).is(':checked') === true) {
            var residence_address = jQuery('#residence_address').val();
            var residence_province = jQuery('#residence_province').val();
            var residence_municipality = jQuery('#residence_municipality').val();
            var residence_barangay = jQuery('#residence_barangay').val();


            jQuery('#mailing_address').val(residence_address);   
            $('#mailing_province').append('<option selected value="' + residence_province + '">' + residence_province + '</option>');           
            $('#mailing_municipality').append('<option selected value="' + residence_municipality + '">' + residence_municipality + '</option>');           
            $('#mailing_barangay').append('<option selected value="' + residence_barangay + '">' + residence_barangay + '</option>');           
            jQuery('#mailing_province').selectpicker("refresh"); 
            jQuery('#mailing_municipality').selectpicker("refresh"); 
            jQuery('#mailing_barangay').selectpicker("refresh"); 

        }else{
            jQuery('#mailing_address').val("");        
            jQuery('#mailing_province').val("");        
            jQuery('#mailing_municipality').val("");        
            jQuery('#mailing_barangay').val("");
                 jQuery('#mailing_province').selectpicker("refresh"); 
            jQuery('#mailing_municipality').selectpicker("refresh"); 
            jQuery('#mailing_barangay').selectpicker("refresh");    

        }         
    });

    $('#file-upload').change(function() {
      var i = $(this).prev('label').clone();
      var file = $('#file-upload')[0].files[0].name;

      if (this.files[0].size > 5000000) {
        $("#upload_Error").html("File size must not be greater than 5MB.");   
        $("#upload_Error").show();    
        $("#upload_label").hide();
        $("#upload_file").hide();

        $('#file-upload').val("");
      }else{
        $("#upload_Error").hide();
        $("#upload_file").show();
        $("#upload_label").hide();
        $("#upload_file_file").empty();
        $("#upload_file_file").html(file);

        
      }
    
    });


    jQuery("#CompreThirdTabNext").click(function(){
        if ($('#file-upload')[0].files.length == 0) {
            $("#upload_Error").html("Please upload your ID.");    
            $("#upload_Error").show();    
            $("#upload_label").hide();
            $("#upload_file").hide();                   
                return false;
        } 
    
    });

</script>

<script type="text/javascript">
    jQuery(document).ready(function(e) {   
         var j = jQuery.noConflict();
      
           jQuery('#birthDate').datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: 'mm/dd/yy',
             minDate: '-60y',
             maxDate:'-18y',
             yearRange: '1910:9999'
            }).on('focus', function(){
                if(!jQuery('select').parent().hasClass('fake-select')){
                    jQuery('select').wrap('<span class="fake-select"></span>');
                }
            });   
          var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/province/get',
                method:"GET",
                data:{ _token:_token}, 
                success:function(result)
                {         
                    jQuery.each(result, function(key, value){
                        $('#residence_province').append($('<option>', { 
                            value: value.province,
                            text : value.province 
                        }));

                        $('#mailing_province').append($('<option>', { 
                            value: value.province,
                            text : value.province 
                        }));

                    })       
                  }
                })
    });  
</script>
<script type="text/javascript">
    function CheckNumeric(e) {
        if (window.event) // IE
        {
            if ((e.keyCode < 48 || e.keyCode > 57) & e.keyCode != 8 && e.keyCode != 44) {
                event.returnValue = false;
                return false;
            }
        }
        else { // Fire Fox
            if ((e.which < 48 || e.which > 57) & e.which != 8 && e.which != 44) {
                e.preventDefault();
                return false;
            }
        }
    }     
</script>