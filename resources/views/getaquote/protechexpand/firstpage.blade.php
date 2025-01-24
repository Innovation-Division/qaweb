  <input type="hidden" name="typeofdevicemain" id="typeofdevicemain" value="{{ $typeofdevice }}">
    <input type="hidden" name="linkurl" id="linkurl" value="{{ $link }}">
        <h1> Personal Data</h1>   
        	
        		<div class="col-md-4">
        			<label for="firstName_personal_info">First Name</label>
        			<input name="firstName_personal_info" id="firstName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
        		</div>
               
        		<div class="col-md-4">
        			<label for="middleName_personal_info">Middle Name</label>
        			<input name="middleName_personal_info" id="middleName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
        		</div>
        		<div class="col-md-4">
        			<label for="lastName_personal_info">Last Name</label>
        			<input name="lastName_personal_info" id="lastName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
        		</div>         	
	        	<div class="col-md-12 break-two"><br></div>  
	        	<div class="col-md-4">
        			<label for="contactNo_personal_info">Mobile No.</label>
        			<input name="contactNo_personal_info" id="contactNo_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        		</div>      
        		<div class="col-md-4">
        			<label for="email_personal_info">Email Address</label>
        			<input name="email_personal_info" id="email_personal_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
        		</div>

        	<div class="col-md-12 break-two"> <br> </div> 	 
			<div class="col-md-12"><label for="address"> Present Address</label> <input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street"></div>        	
        	<div class="col-md-12 break-two"> <br> </div> 
        	
        	 
            <div class="col-md-4 ">
    			<select  id="residence_province" name="residence_province" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-residence_province" data-size="10"  data-live-search="true"  >
                		<option value="">- Select Province -</option>            
                </select>
            </div>
            <div class="col-md-4 "> 
    			<select  id="residence_municipality" name="residence_municipality"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-residence_municipality" data-size="10"  data-live-search="true">
                		<option value="">- Select City/Municipality -</option>            
                </select>
             </div>
             <div class="col-md-4 ">
    			<select  id="residence_barangay" name="residence_barangay"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-residence_barangay" data-size="10"  data-live-search="true">
                		<option value="">- Select Barangay-</option>           
                </select>
             </div> 
             <div class="col-md-12 break-two">
                    <br>    
            </div> 
            <div class="col-md-12 break-two">
                    <br>    
            </div> 

             <div class="col-md-12"><laber for="mailing_address"> Permanent Address</laber><br><br><input type="checkbox" style="margin-top: -10px;" id="chckSameAddress" name="chckSameAddress" value="1"> <label for="chckSameAddress">Same as Present Address </label><input name="mailing_address" id="mailing_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street"></div>        	
        	<div class="col-md-12 break-two"> <br> </div> 
        	
        	 
            <div class="col-md-4 ">
    			<select  id="mailing_province" name="mailing_province"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-mailing_province" data-size="10"  data-live-search="true">
                		<option value="">- Select Province -</option>            
                </select>
            </div>
            <div class="col-md-4 "> 
    			<select  id="mailing_municipality" name="mailing_municipality"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-mailing_municipality" data-size="10"  data-live-search="true">
                		<option value="">- Select City/Municipality -</option>            
                </select>
             </div>
             <div class="col-md-4 ">
    			<select  id="mailing_barangay" name="mailing_barangay"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white btn-white-mailing_barangay" data-size="10"  data-live-search="true">
                		<option value="">- Select Barangay-</option>           
                </select>
             </div> 
             
	        <div class="col-md-12 break-two"><br></div> 

            <div class="col-md-4" style="text-align: left;"></div>
				<div class="col-md-4" style="text-align: left;">
		        	<br>
		        	<button  id="next_1stpage" name="next_1stpage" type="button"  class="action next_1stpage btn btn-default form-control" style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>		         	     
		        </div>


    