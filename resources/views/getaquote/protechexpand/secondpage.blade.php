 
        	<h2>Other Personal Data</h2>
          
        	 <div class="col-md-3">
        	 	<label for="gender_other_personal_info">Gender</label>
    			<select  id="gender_other_personal_info" name="gender_other_personal_info" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-gender_other_personal_info" data-size="10"  data-live-search="true" >
                		<option value="">- Select -</option>            
                		<option value="Male">Male</option>            
                		<option value="Female">Female</option>            
                </select>
            </div>
            <div class="col-md-3">
                <label for="place_of_birth_other_personal_info">Place of Birth</label>
                <input name="place_of_birth_other_personal_info" id="place_of_birth_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
            </div>
            <div class="col-md-3">
                <label for="status_other_personal_info">Civil Status</label>
                <select  id="status_other_personal_info" name="status_other_personal_info" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-status_other_personal_info" data-size="10"  data-live-search="true" >
                        <option value="">- Select -</option>            
                        <option value="Single">Single</option>            
                        <option value="Married">Married</option>            
                        <option value="Widowed">Widowed</option>            
                        <option value="Seprated">Seprated</option>            
                        <option value="Divorced">Divorced</option>            
                </select>
            </div>
            <div class="col-md-3">
    			<label for="nationality_other_personal_info">Nationality</label>
    			<input name="nationality_other_personal_info" id="nationality_other_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
    		</div>
    		<div class="col-md-12 break-two"><br></div>
             <div class="col-md-3">
                <label for="occupation_other_personal_info">Occupation</label>
                <input name="occupation_other_personal_info" id="occupation_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
            </div>
              <div class="col-md-3">
                <label for="tel_no_other_personal_info">Telephone Number</label>
                <input name="tel_no_other_personal_info" id="tel_no_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="15"  onkeypress="CheckNumeric(event);">
            </div>
    		
            <div class="col-md-3">
                <label for="sourceofIncome_personal_info">Source of Funds</label>
                <input name="sourceofIncome_personal_info" id="sourceofIncome_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
            </div> 
            <div class="col-md-12 break-two"><br></div>
    		<div class="col-md-3">
                <label for="type_of_id_personal_info">Type of ID</label>
                <select  id="type_of_id_personal_info" name="type_of_id_personal_info" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-type_of_id_personal_info" data-size="10"  data-live-search="true" >
                        <option value="">- Select -</option>            
                        <option value="Philippine Passport">Philippine Passport</option>            
                        <option value="Driver's License">Driver's License</option>            
                        <option value="SSS/GSIS UNID Card">SSS/GSIS UNID Card</option>            
                        <option value="Philhealth ID">Philhealth ID</option>            
                        <option value="Postal ID">Postal ID</option>            
                        <option value="TIN Card">TIN Card</option>            
                        <option value="Voter's ID">Voter's ID</option>            
                        <option value="PRC ID">PRC ID</option>            
                        <option value="Senior Citizen ID">Senior Citizen ID</option>            
                        <option value="OFW ID">OFW ID</option>            
                </select>
            </div>   
            <div class="col-md-3">
                <label for="idno_other_personal_info">ID Number</label>
                <input name="idno_other_personal_info" id="idno_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
            </div>
    		<div id="fromCopy" class="col-md-3">
                 <div class="fileUpload blue-btn btn width100" style="height: 60px !important;background-color: #e4509a;color: #ffffff;border: 0px;padding-top: 20px;">
                    <span><i class="fa fa-upload" aria-hidden="true" ></i> UPLOAD ID</span>
                    <input id="file-upload" name='file' type="file" class="uploadlogo" accept="image/x-png,image/jpeg"  />
                  </div>
                  <label id="upload_Error" style="display: none;color: #F44336;margin-top: -40px;"></label>

                  <label id="upload_file" style="display: none">File: <span id="upload_file_file" style="color: #0275d8 "></span> <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;size: 20px;"></i></label>

                  <label id="upload_label">File must be in .jpeg or .png format not exceeding 5MB</label>
            </div>
            <div class="col-md-3" style="text-align: left;">
                    <br>
                    <button  id="next_2ndpage" name="next_2ndpage" type="button"  class="action next_2ndpage btn btn-default form-control" style="min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>                        
                </div>
     
    	
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