<div class="col-md-12" style="margin-bottom:-15px;">
    <h1>Personal Data</h1>   
</div> 
<div class="col-md-4">
    <label>First Name</label>
    <input id="fname" name="fname" type="text" class="form-control input-lg" maxlength="100" >
</div> 
<div class="col-md-4">
    <label>Middle Name</label>
    <input id="mname" name="mname" type="text" class="form-control input-lg" maxlength="100" >
</div> 
<div class="col-md-4">
    <label>Last Name</label>
    <input id="lname" name="lname" type="text" class="form-control input-lg" maxlength="100" >
</div> 
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-4">
    <label>Mobile No.</label>
    <input id="mobileno" name="mobileno" type="text" class="form-control input-lg" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
</div> 
<div class="col-md-4">
    <label>Email Address</label>
    <input id="email" name="email" type="text" class="form-control input-lg" maxlength="100">
</div> 
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div> 
<div class="col-md-3">
    <label>Gender</label>
    <select  id="gender" name="gender" class="form-control dynamicyear selectpicker select-input-border-gender" data-style="input-lg btn-white-status_other_personal_info" data-size="10" data-live-search="true" style="font-family: muli; ">
        <option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly value="">- select - </option>
        <option value="Male">Male</option>          
        <option value="Female">Female</option>  
    </select>       
</div>
<div class="col-md-3">
    <label>Date of Birth</label>
    <input id="dateofbirth" name="dateofbirth" type="text" class="form-control input-lg" maxlength="100"  >
</div> 
<div class="col-md-3">
    <label>Place of Birth</label>
    <input id="placeofbirth" name="placeofbirth" type="text" class="form-control input-lg" maxlength="100"  >
</div> 
<div class="col-md-3">
    <label>Civil Status</label>
    <select  id="civilstatus" name="civilstatus" class="form-control dynamicyear selectpicker btn-white-status_other_personal_info" data-style="input-lg select-input-border-civilstatus btn-white-status_other_personal_info" data-size="10" data-live-search="true" style="font-family: muli; ">
        <option value="" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly value="">- select - </option>
        <option value="Single">Single</option>            
        <option value="Married">Married</option>            
        <option value="Widowed">Widowed</option>            
        <option value="Seprated">Seprated</option>            
        <option value="Divorced">Divorced</option>       
    </select>       
</div>
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div> 
<div class="col-md-12">
    <label for="address"> Present Address</label> 
    <input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No./Floor No./Building/Street">
</div>     
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-4 ">
    <select  id="residence_province" name="residence_province" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-residence_province" data-size="10"  data-live-search="true" >
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

<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div> 
<div class="col-md-12">
    <laber for="mailing_address"> Permanent Address</laber><br><br>
    <input type="checkbox" style="margin-top: -10px;" id="chckSameAddress" name="chckSameAddress" value="1"> 
    <label for="chckSameAddress">Same as Present Address </label>
    <input name="mailing_address" id="mailing_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street"></div>
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-4 ">
    <select  id="mailing_province" name="mailing_province" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-mailing_province" data-size="10"  data-live-search="true" >
            <option value="">- Select Province -</option>            
    </select>
</div>
<div class="col-md-4 "> 
    <select  id="mailing_municipality" name="mailing_municipality"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-mailing_municipality" data-size="10"  data-live-search="true">
            <option value="">- Select City/Municipality -</option>            
    </select>
 </div>
<div class="col-md-4 ">
    <select  id="mailing_barangay" name="mailing_barangay"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-mailing_barangay" data-size="10"  data-live-search="true">
            <option value="">- Select Barangay-</option>           
    </select>
</div> 
<div class="col-md-12 break-two"> <br> </div> 
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div> 
<div class="col-md-4" style="text-align: left;">
	<br>
	<button  id="next_1stpage" name="next_1stpage" type="button"  class="action next_1stpage btn btn-default form-control" style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>		         	     
</div>
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div> 
    <div class="col-md-12 break-two"> <br> </div>    
        <div class="col-md-12 break-two"> <br> </div>    