
<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>
<style type="text/css">	
input[type="text"],
select.form-control {
	border-radius: 5px;
	border-color: #808080;
  /*background: transparent;
  border: none;
  border-color: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;*/
		}

		.firstform{
			margin-top: -20px;
		}

		#modal_covid19_summary_renewal {
		  text-align: center;
		  top:1% !important;
		}

		input[type="text"]:focus,
		select.form-control:focus {
		  -webkit-box-shadow: none;
		  box-shadow: none;
		}
		</style>
		<style type="text/css">

		.ui-datepicker {
		background-color: #fff;
		    font-size: 160%;
		}

		.ui-datepicker-header {
		background-color: #53b947;
		border-color: #53b947;

		}

		.ui-datepicker-title {
		color: white;
		}

		.ui-widget-content .ui-state-default {
		border: 0px;
		text-align: center;
		background: #fff;
		font-weight: normal;
		color: #53b947;
		}

		.ui-widget-content .ui-state-default:hover {
		border: 0px;
		text-align: center;
		background: #53b947;
		font-weight: normal;
		color: #fff;
		}
		#btn_back_to_applicant_occupation,
		#btn_back_to_home,
		#btn_back_to_applicant{
			min-width: 120px;
			min-height: 30px;
			background-color: #53b947;
			color: #ffffff;
			margin-right: 15px;
		}

		.ui-widget-content .ui-state-active {
		border: 0px;
		background: #53b947;
		color: #fff;
		}
		option:checked {
		  background: red linear-gradient(0deg, red 0%, red 100%);
		}
		.btn-white-residence_province {
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-residence_municipality {
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-residence_barangay{
			background-color: #ffffff;
			border-color: #808080;
		}

		.btn-white-mailing_province {
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-mailing_municipality {
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-mailing_barangay{
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-noofunit{			
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-occupation_personal_info,
		.btn-white-gender{			
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-status_other_personal_info{
			background-color: #ffffff;
			border-color: #808080;
		}
		.btn-white-type_of_id_personal_info,
		.btn-white-status_other_personal_info{
			background-color: #ffffff;
			border-color: #808080;
		}
		#basic_renewal{
			min-width: 250px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-right: 15px;
		}
		#btn_no_renewal,
		#btn_yes_renewal{
			min-width: 90px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-right: 15px;
		}
		#btn_pwd_no,
		#btn_pwd_yes{
			min-width: 120px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-right: 15px;
		}

		#prime_renewal{
			min-width: 250px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-right: 15px;
		}
		#basicprinme_renewal{
			min-width: 288px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
		}
		#btnnoofunit_renewal{
			min-width: 516px;
			height: 45px;
			background-color: #00BFFF;
			color: #ffffff;
			margin-left: -15px;
		}

		#basic_renewal:hover {
		  background-color: #4CAF50; /* Green */
		  color: white;
		}

		#prime_renewal:hover {
		  background-color: #4CAF50; /* Green */
		  color: white;
		}

		#basicprinme_renewal:hover {
		  background-color: #4CAF50; /* Green */
		  color: white;
		}

		
		#primbasicvaldiv_renewal{
			margin-left:-32px;
		}

		.validation_beneficiary_personal_info,
		.validation_relationship_personal_info,
		.validation_middleName_personal_info,
		.validation_firstName_personal_info,
		.validation_lastName_personal_info,
		.validation_gender_personal_info,
		.validation_contactNo_personal_info,
		.validation_gender_personal_info,
		.validation_occupation_personal_info,
		.validation_dateofBirth_personal_info,	
		.validation_email_personal_info{
			margin-top: 5px ;
		}

		.blue-btn:hover,
		.blue-btn:active,
		.blue-btn:focus,
		.blue-btn {
		  background: transparent;
		  border: solid 1px #27a9e0;
		  border-radius: 3px;
		  color: #27a9e0;
		  font-size: 16px;
		  margin-bottom: 20px;
		  outline: none !important;
		  padding: 10px 20px;
		}

	

		.fileUpload {
		  position: relative;
		  overflow: hidden;
		  height: 46px;
		  margin-top: 15px;
		  width: 100% !important;
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

		/*Chrome fix*/
		input::-webkit-file-upload-button {
		  cursor: pointer !important;
		  height: 46px;
		  width: 100%;
		}
		
		#upload_label_renewal{
			margin-top:-30px !important;
		}

		#upload_file_renewal{
			margin-top:-30px !important;
		}

		#f3_summary{
			margin-left: -16px;
		}
		#agent_name_div{
			margin-left: -90px;
			margin-right: 20px;
			margin-top: 25px;
		}

		#agent_name_summary{
			margin-right: 30px !important;
		}

		#f4_summary{
			margin-left: -90px ;
			margin-top: 25px;
		}

		#btnsubmit_renewal{
			min-height: 60px;
			min-width: 440px;
			margin-top: -17px;
		}

		#btnagree_renewal{
			min-height: 60px;
			min-width: 200px;
		}

		#addApplicant_renewal{
			min-width: 257px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-right: 18px;

		}
	

  }
		
</style>

<style>

	@media only screen and (max-width: 800px) {

	
		.firstform{
			margin-top: 0px;
		}
		.address_mobile{
		  	margin-bottom: 15px !important;
		}
		
		.personal_ifno_mobile{
		  	margin-bottom: 15px !important;
		}

	  	#basic_renewal{
			min-width: 258px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-bottom: 10px;
		}

		#prime_renewal{
			min-width: 258px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-bottom: 10px;
		}
		#basicprinme_renewal{
			min-width: 258px;
			min-height: 60px;
			background-color: #C0C0C0;
			color: #000000;
			margin-bottom: 10px;	
		}

		#btnnoofunit_renewal{
				min-width: 258px;
				background-color: #00BFFF;
				color: #ffffff;			
				height: 45px;
				margin-left: -15px;
		}

		#primbasicvaldiv_renewal{
				margin-left:-14px;
				margin-top: 15px;
				width: 285px;
		}




		.validation_beneficiary_personal_info_check_error,
		.validation_relationship_personal_info_check_error,
		.validation_coc_no_validation_info_check_error,
		.validation_coc_no_validation_info_check_success,
		.validation_contact_no_validation_check_error,
		.validation_contact_no_validation_check_success,
		.validation_birthdate_validation_check_error,
		.validation_birthdate_validation_check_success,
		.validation_idno_other_personal_info_check_error,
		.validation_place_of_birth_other_personal_info_check_error,
		.validation_nationality_other_personal_info_check_error,
		.validation_middleName_personal_info_check_error,
		.validation_lastName_personal_info_check_error,
	 	.validation_contactNo_personal_info_check_error,
	 	.validation_dateofBirth_personal_info_check_error,
	 	.validation_gender_personal_info_check_error,
	 	.validation_email_personal_info_check_error,
		.validation_firstName_personal_info_check_error{
			top:-50px !important;
		}

		.validation_beneficiary_personal_info_check_success,
		.validation_relationship_personal_info_check_success,
		.validation_idno_other_personal_info_check_success,
		.validation_place_of_birth_other_personal_info_check_success,
		.validation_nationality_other_personal_info_check_success,
		.validation_middleName_personal_info_check_success,
		.validation_lastName_personal_info_check_success,
	    .validation_contactNo_personal_info_check_success,
	    .validation_dateofBirth_personal_info_check_success,
	    .validation_gender_personal_info_check_success,
	    .validation_email_personal_info_check_success,
		.validation_firstName_personal_info_check_success{
			top:-50px !important;
		}

	 	.validation_occupation_personal_info_check_error,
		.validation_occupation_personal_info_check_success {
	       top:-35px !important;
		}

		.validation_dateofBirth_personal_info{
			margin-top: -12px !important;
			margin-bottom: 10px !important;
		}

		
		.validation_idno_other_personal_info,
		.validation_place_of_birth_other_personal_info,
		.validation_nationality_other_personal_info,
		.validation_email_personal_info,
		.validation_contactNo_personal_info,
		.validation_lastName_personal_info,
		.validation_middleName_personal_info,
		.validation_firstName_personal_info{
			margin-top: -12px !important;
			margin-bottom: 10px !important;
		}

		.validation_status_other_personal_info{
			margin-bottom: 10px !important;
		}

		.fileUpload {
			  position: relative;
			  overflow: hidden;
			  height: 46px;
			  margin-top: 15px;
			  width: 100% !important;
			}
		#agent_name_div_renewal{
			margin-left: -10px  !important;
			margin-right: 20px;
			margin-top: 25px;
		}

		#f4_summary_renewal{
			margin-left: -10px !important;
			margin-top: 25px;
		}

		#CheckCoverage_renewal{
			margin-top: 20px !important;
		}

		#addApplicant_renewal{
				margin-bottom: 10px;

			}
		#btnsubmit_renewal{
			margin-top: 40px !important;
			min-height: 60px;
			min-width: 257px;
		}

			
	}
</style>
<style type="text/css">
        			
					/* end only demo styles */

					.checkbox-custom, .radio-custom {
					    opacity: 0;
					    position: absolute;   
					}

					.checkbox-custom, .checkbox-custom-label, .radio-custom, .radio-custom-label {
					    display: inline-block;
					    vertical-align: middle;
					    margin: 5px;
					    cursor: pointer;
					}

					.checkbox-custom-label, .radio-custom-label {
					    position: relative;
					}

					.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
					    content: '';
					    background: #fff;
					    border: 2px solid #53b947;
					    display: inline-block;
					    vertical-align: middle;
					    width: 20px;
					    height: 20px;
					    padding: 2px;
					    margin-right: 10px;
					    text-align: center;
					}

					.checkbox-custom:checked + .checkbox-custom-label:before {
					    background: #53b947;
					    box-shadow: inset 0px 0px 0px 4px #fff;
					}

					.checkbox-custom:focus + .checkbox-custom-label, .radio-custom:focus + .radio-custom-label {
					  outline: 1px solid #ddd; /* focus style */
					}
</style>
<div class="container">
	<div class="row">
        <div class="col-md-12">
    	 <div class="modal fade" id="occupation_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
		    <div class="modal-dialog">
		     <div class="modal-content">
		     <div class="modal-header">
		     	<h1 style="color: #0275d8;font-weight: bold;margin-bottom: -10px;">Notice</h1>
		          <button type="button" class="close" data-dismiss="modal" style="color: green;margin-top: -5px;">&times;</button>
		         
	        </div>
		     
		      <div class="modal-body">
		      	<!--  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right">&times;</button> -->
		        <div class="form-group">
		          <div class="input-group">
			          <label for="chckcovid" style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;font-weight: bold;">COCOGEN COVID-19 Assist+ only covers certain occupations. For more information, you may reach us at (02) 8830-6000 or client_services@cocogen.com. </label>
		          </div>
		        </div>
		      </div>
		       <div class="modal-footer" style="text-align: center">					           
		            <div id="pop_warning1">&nbsp;&nbsp;
			       		<button type="button" id="btn_back_to_home" name="btn_back_to_home" onclick="window.location='{{ url("get-quote/covid-19-assist-plus-insurance") }}'" class="btn" >Back to Home &nbsp;&nbsp;</button>
			       	</div>
			       	<div id="pop_warning2">
			       			&nbsp;&nbsp;				           
			          <button type="button" id="btn_back_to_applicant_occupation" name="btn_back_to_applicant_occupation"  class="btn"  >Check Coverage &nbsp;&nbsp;</button>
	    			  <button type="button" id="btn_back_to_home" name="btn_back_to_home" onclick="window.location='{{ url("get-quote/covid-19-assist-plus-insurance") }}'" class="btn" >Back to Home &nbsp;&nbsp;</button>
			       	</div>
		        </div>
		     </div>
		    </div>
		  </div> 
       
        <input type="hidden" name="coverage_complete_renewal" name="coverage_complete_renewal" value="">
        <input type="hidden" name="validation_error_postback" name="validation_error_postback" value="">
        <input type="hidden" name="old_id" name="old_id" value="">
        <input type="hidden" name="old_tnxid" name="old_tnxid" value="">
        <input type="hidden" name="pwd_stat_save" name="pwd_stat_save" value="">
        <input type="hidden" name="personal_info_complete_renewal" name="personal_info_complete_renewal" value="">        
        <input type="hidden" name="pwd_stat" name="pwd_stat" value="">
	  	<div class="progress"  class="col-md-12">
	    	<div class="progress-bar" style="max-height: 4px !important;"></div>
	  	</div>
		<button class="action back_renewal linkbutton"><< Back</button>
  		<br><br>
  		 <div class="step_renewal" style="text-align: left;">
        		<div id="validation_warning" name="validation_warning" class="alert alert-danger" style="display: none">
				  Could not find Confirmation of Cover No., Date of Birth, and/or Contact No.
				</div>	
				<div id="date_warning" name="date_warning" class="alert alert-danger" style="display: none">
				  Your policy is beyond the renewal period. Please call (02) 8830 6000 or email us at client_services@cocogen.com for assistance.
				</div>
        		<div class="col-md-4">
        			<label for="coc_no">Confirmation of Cover No.</label>
        			<input name="coc_no_validation" id="coc_no_validation" type="text"   class="form-control input-lg personal_ifno_mobile" maxlength="100" placeholder="X-XXXXX-XXXXXXX-XX">
        		</div>
        		     	      		
        		<div class="col-md-4">
        			<label for="birthdate_validation">Date of Birth</label>
        			<input name="birthdate_validation" id="birthdate_validation"  type="text" class="form-control input-lg NoPaste validation_date_of_Birth_personal_info personal_ifno_mobile"  maxlength="100" placeholder="MM/DD/YYYY">
        				</div>
        		
        		<div class="col-md-4">
        			<label for="contact_no_validation">Mobile/Landline Number</label>
        			<input name="contact_no_validation" id="contact_no_validation" type="text" class="form-control input-lg personal_ifno_mobile" >
        		</div>      		        		     
        </div>
		<div class="step_renewal" style="background-color: #f5f5f5 !important;text-align: left;">
			<div id="warning_coverage_package_renewal" name="warning_coverage_package_renewal" class="alert alert-danger" style="display: none">
			 You must agree to our Terms and Conditions before the transaction may proceed.
			</div>			
			<h2>Type of Coverage</h2>
			
			<span>Select your preferred package by clicking on the options below. You can get up to two (2) insurance coverage of either the same package or combination of both packages.</span> <br><br>
			<div class="table-wrapper col-md-9" id="itp" style="overflow-x:auto !important;"> 
				<table class="table table-bordered " style="font-family: muli;text-align: left">
				<tbody>   
				  	<tr class="heading " style="height: 65px;" >  
				    	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;background-color: #53b947;min-width: 200px;"> 
				    		<span style="height: 15px !important;"><br></span>      
				      		<span style="font-size: medium;color: #ffffff;">Benefits</span> 
				      	</th>
				      	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;border-color: #f5f5f5"> </th>
				      	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;background-color: #1b96db;min-width: 100px;"> 
				    		<div style="height: 4px;"></div>    
				      		<span style="font-size: medium;color: #ffffff;">Basic <br> (PHP 50)</span> 
				      	</th>
				      	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;border-color: #f5f5f5"> </th>
				      	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;background-color: #1b96db; min-width: 100px;"> 
				    		<div style="height: 4px;"></div>       
				      		<span style="font-size: medium;color: #ffffff;">PRIME <br> (PHP 75)</span> 
				      	</th>
				    </tr>
				    <tr>
				    	<td style="text-align: left;"> <span style="font-size: medium;">Accidental Death and Disablement </span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">20,000</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">30,000</span></td>
				    </tr> 
				    <tr>
				    	<td style="text-align: left;"> <span style="font-size: medium;">Burial Benefit in case of Accidental Death</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">2,000</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">3,000</span></td>
				    </tr>
				    <tr>
				    	<td style="text-align: left;"> <span style="font-size: medium;">Cash Assistance in case of Death due to Other Causes</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">2,000</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">3,000</span></td>
				    </tr> 
				    <tr>
				    	<td style="text-align: left;"> <span style="font-size: medium;">Cash Assistance in case of Death due to COVID-19</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">2,000</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">3,000</span></td>
				    </tr> 	
				    <tr>
				    	<td style="text-align: left;"> <span style="font-size: medium;">Daily Hospital Benefit</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">200</span></td>
				    	<td style="text-align: left;border-color: #f5f5f5"></td>
				    	<td style="text-align: center;"> <span style="font-size: medium;">300</span></td>
				    </tr>  
				</tbody> 
			 </table> 
			</div>
		

			<div class="col-md-12" style="text-align: left;"> 
				<h2>Select Your Package</h2>       
	        	<button id="basic_renewal" name="basic_renewal" onclick="basicclick_renewal()" class="btn" >BASIC &nbsp;&nbsp;</button>
	        	<button id="prime_renewal" name="prime_renewal" onclick="primeclick_renewal()" class="btn" >PRIME &nbsp;&nbsp;</button>
	        	<button id="basicprinme_renewal" name="basicprinme_renewal" onclick="basicprinmeclick_renewal()" class="btn" >BASIC + PRIME &nbsp;&nbsp;</button>
	           <br><br>
        	</div>
        	<div id="basicprinmepanel_renewal" class="col-md-12" style="text-align: left;display: none">    
	        	<div class="col-md-6" style="text-align: left;">  
		        	<button  id="btnnoofunit_renewal" name="btnnoofunit_renewal" class="btn">Number or units &nbsp;&nbsp;</button>
		        	
		      	</div>
		      	<div id="primbasicvaldiv_renewal" class="col-md-3">  
		        	<select  id="primbasicval_renewal" name="primbasicval_renewal" class="form-control selectpicker input-lg" data-style="input-lg btn-white-noofunit" data-size="16"  >
					 <option value="" >--Select-- </option>
					 <option value="1">1</option>
					 <option value="2">2</option>
				 </select>
		      	</div>
	        	<br><br>
        	</div>
		</div>
        <div class="step_renewal" style="text-align: left;">
        	<h1> Personal Information</h1>   
        
        		<div class="col-md-4">
        			<label for="firstName_personal_info_renewal">First Name</label>
        			<input name="firstName_personal_info_renewal" id="firstName_personal_info_renewal" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
        		</div>
        		<div class="col-md-4">
        			<label for="middleName_personal_info_renewal">Middle Name</label>
        			<input name="middleName_personal_info_renewal" id="middleName_personal_info_renewal" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
        		</div>
        		<div class="col-md-4">
        			<label for="lastName_personal_info_renewal">Last Name</label>
        			<input name="lastName_personal_info_renewal" id="lastName_personal_info_renewal" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
        		</div>         	
	        	<div class="col-md-12 break-two"><br></div>        		
        		<div class="col-md-4">
        			<label for="dateofBirth_personal_info_renewal">Date of Birth</label>
        			<input name="dateofBirth_personal_info_renewal" id="dateofBirth_personal_info_renewal"  type="text" class="form-control input-lg NoPaste validation_date_of_Birth_personal_info personal_ifno_mobile"  maxlength="100" placeholder="MM/DD/YYYY">
        		</div>
        		<div class="col-md-4">
        			<label for="gender_personal_info_renewal">Gender</label> 
        			<select  id="gender_personal_info_renewal" name="gender_personal_info_renewal"  class="form-control selectpicker input-lg personal_ifno_mobile" data-style="input-lg  btn-white-gender" data-size="10">
                    		<option value="">- Select -</option>          
                    		<option value="Male">Male</option>          
                    		<option value="Female">Female</option>          
                    </select>
                </div>
        		<div class="col-md-4">
        			<label for="contactNo_personal_info_renewal">Mobile No.</label>
        			<input name="contactNo_personal_info_renewal" id="contactNo_personal_info_renewal" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        		</div> 
        		<div class="col-md-12 break-two"><br></div> 

        		<div class="col-md-4">
        			<label for="tel_no_info_renewal">Tel No.</label>
        			<input name="tel_no_info_renewal" id="tel_no_info_renewal" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
        		</div>
        		
        		<div class="col-md-4">
        			<label for="occupation_personal_info_renewal">Occupation</label> 
        			<select  id="occupation_personal_info_renewal" name="occupation_personal_info_renewal" data-live-search="true" class="form-control selectpicker input-lg personal_ifno_mobile" data-style="input-lg btn-white-occupation_personal_info" data-size="10">
                    		<option value="">- Select -</option>            
                    </select>
                </div>
        		<div class="col-md-4">
        			<label for="occupation_other_personal_info_renewal"></label>
        			<input name="occupation_other_personal_info_renewal" id="occupation_other_personal_info_renewal" disabled="disabled" type="text" class="form-control input-lg" maxlength="100" >
        		</div> 
        		<div class="col-md-12 break-two"><br></div>  
     			<div class="col-md-4">
        			<label for="email_personal_info_renewal">Email Address</label>
        			<input name="email_personal_info_renewal" id="email_personal_info_renewal" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
        		</div>  
        		<div class="col-md-4">
        			<label for="beneficiary_personal_info">Beneficiary</label>
        			<input name="beneficiary_personal_info" id="beneficiary_personal_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
        		</div>
        		<div class="col-md-4">
        			<label for="relationship_personal_info">Relationship to the Insured</label>
        			<input name="relationship_personal_info" id="relationship_personal_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
        		</div>
        		<div class="col-md-12 break-two"><br></div>   
        		<div  class="col-md-4 " id="pwd_div_1">
        			<h3>Are you a Person with Disability (PWD)?</h3>  					
		        	<button type="button" id="btn_pwd_yes" name="btn_pwd_yes" class="btn" >Yes &nbsp;&nbsp;</button>
		        	<button type="button" id="btn_pwd_no" name="btn_pwd_no" class="btn" >No &nbsp;&nbsp;</button>
		        	<div class='pwed_select' style='opacity:0.7;color:#F44336;'>Please select one</div>
	        	</div>
	        	<div class="col-md-4">
				</div>
				<div class="col-md-4" style="text-align: left;">
		        	<br><br>
		        	<div id="nextbutton" name="nextbutton">
		        		<button  id="next_2ndpage" name="next_2ndpage" type="submit"  class="action next_2ndpage btn btn-default form-control" style="min-width: 267px;min-height: 60px;color: #ffffff;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
		         	</div>      
		        </div>
        		<div class="col-md-12 break-two"><br></div> 

		        <div class="col-md-12" id="pwd_div">
        			<h3>Check all that apply</h3>
				    <div>
				        <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
				        <label for="checkbox-1" class="checkbox-custom-label">Blindness in the both eyes</label>
				    </div>
				    <div>
				        <input id="checkbox-2" class="checkbox-custom" name="checkbox-2" type="checkbox">
				        <label for="checkbox-2" class="checkbox-custom-label">Absence of any limb or loss of use of any limb</label>
				    </div>
				    <div>
				        <input id="checkbox-3" class="checkbox-custom" name="checkbox-3" type="checkbox">
				        <label for="checkbox-3"class="checkbox-custom-label">Deaf in both ears</label>    
				    </div>
				    <div>
				        <input id="checkbox-4" class="checkbox-custom" name="checkbox-4" type="checkbox">
				        <label for="checkbox-4"class="checkbox-custom-label">Loss of fingers or toes</label>    
				    </div>
				    <div>
				        <input id="checkbox-5" class="checkbox-custom" name="checkbox-5" type="checkbox">
				        <label for="checkbox-5"class="checkbox-custom-label">Others (Please indicate type of disability)</label>    
				    </div>	
				    <div>
				    	<div class='pwed_select_checkbox' style='opacity:0.7;color:#F44336;'>Please select one</div>
				    </div>
		        	<div class="col-md-12 break-two"><br></div> 

	        		<div class="col-md-4" id="pwd_div_others">
					    	<input name="others_pwd_personal_info" id="others_pwd_personal_info" type="text" class="form-control input-lg personal_ifno_mobile btn-white-others_pwd_personal_info" maxlength="100">
					</div>
		        	<div class="col-md-12 break-two"><br></div> 

					<div class="col-md-12">
						<label>Note that the cover premium options of this product are for non-PWDs. COCOGEN will contact you to provide alternative cover.</label>
					</div>
				    				     			
        		</div>
        		<div class="modal fade " id="modal_PWD" data-backdrop="static" data-keyboard="false" tabindex="-1">
					    <div class="modal-dialog ">
					     <div class="modal-content">
					     <!--  <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button> -->
					     <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal" style="color: #53b947;margin-top: -5px;size: 30px;">&times;</button>
				        </div>
					      <div class="modal-body">
					      	<!--  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right">&times;</button> -->
					        <div class="form-group">
					          <div class="input-group">
					          	<label style="margin-left:20px;margin-top:5px;margin-right:35px;line-height: 20px;font-size: 20px;"><strong>Thank you for your interest in COVID-19 Assist+ </strong></label>
					          	<label style="margin-left:20px;margin-top:25px;margin-right:35px;line-height: 20px;">A Client Services representative will get back to you regarding your application. Please monitor your email for updates. </label>	
					          </div>
					        </div>
					      </div>
					       <div class="modal-footer" style="text-align: center">					           
					          <div id="pop_warning1_PWD">&nbsp;&nbsp;
						       		<button type="button" id="btn_back_to_home" name="btn_back_to_home" onclick="window.location='{{ url("get-quote/covid-19-assist-plus-insurance") }}'" class="btn" >Back to Home &nbsp;&nbsp;</button>
						       	</div>
						       	<div id="pop_warning2_PWD">
						       			&nbsp;&nbsp;				           
						          <button type="button" id="btn_back_to_applicant" name="btn_back_to_applicant"  class="btn"  >Check Coverage &nbsp;&nbsp;</button>
				    			  <button type="button" id="btn_back_to_home" name="btn_back_to_home" onclick="window.location='{{ url("get-quote/covid-19-assist-plus-insurance") }}'" class="btn" >Back to Home &nbsp;&nbsp;</button>
						       	</div>
					        </div>
					     </div>
					    </div>
					  </div> 
        </div>
        <div class="step_renewal" style="text-align: left;">
        	 
			<div class="col-md-12"><label for="address"> Residence Address</label> <input name="residence_address_renewal" id="residence_address_renewal" type="text" class="form-control input-lg" maxlength="100"></div>        	
        	<div class="col-md-12 break-two"> <br> </div> 
        	
        	 
            <div class="col-md-4 ">
    			<select  id="residence_province_renewal" name="residence_province_renewal" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-residence_province" data-size="10"  data-live-search="true" >
                		<option value="">- Select Province -</option>            
                </select>
            </div>
            <div class="col-md-4 "> 
    			<select  id="residence_municipality_renewal" name="residence_municipality_renewal"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-residence_municipality" data-size="10"  data-live-search="true">
                		<option value="">- Select City/Municipality -</option>            
                </select>
             </div>
             <div class="col-md-4 ">
    			<select  id="residence_barangay_renewal" name="residence_barangay_renewal"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-residence_barangay" data-size="10"  data-live-search="true">
                		<option value="">- Select Barangay-</option>           
                </select>
             </div> 
             <div class="col-md-12 break-two">
                    <br>    
            </div> 
            <div class="col-md-12 break-two">
                    <br>    
            </div> 

             <div class="col-md-12"><laber for="mailing_address_renewal"> Mailing Address</laber><br><br><input type="checkbox" style="margin-top: -10px;" id="chckSameAddress_renewal" name="chckSameAddress_renewal" value="1"> <label for="chckSameAddress_renewal">Same as Residence Address </label><input name="mailing_address_renewal" id="mailing_address_renewal" type="text" class="form-control input-lg" maxlength="100"></div>        	
        	<div class="col-md-12 break-two"> <br> </div> 
        	
        	 
            <div class="col-md-4 ">
    			<select  id="mailing_province_renewal" name="mailing_province_renewal"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-mailing_province" data-size="10"  data-live-search="true">
                		<option value="">- Select Province -</option>            
                </select>
            </div>
            <div class="col-md-4 "> 
    			<select  id="mailing_municipality_renewal" name="mailing_municipality_renewal"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-mailing_municipality" data-size="10"  data-live-search="true">
                		<option value="">- Select City/Municipality -</option>            
                </select>
             </div>
             <div class="col-md-4 ">
    			<select  id="mailing_barangay_renewal" name="mailing_barangay_renewal"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white btn-white-mailing_barangay" data-size="10"  data-live-search="true">
                		<option value="">- Select Barangay-</option>           
                </select>
             </div> 
        </div>

        <div class="step_renewal" style="text-align: left;">
        	<h2>Other Personal Information</h2>
        	 <div class="col-md-4 ">
        	 	<label for="status_other_personal_info_renewal">Status</label>
    			<select  id="status_other_personal_info_renewal" name="status_other_personal_info_renewal" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-status_other_personal_info" data-size="10"  data-live-search="true" >
                		<option value="">- Select -</option>            
                		<option value="Single">Single</option>            
                		<option value="Married">Married</option>            
                		<option value="Widowed">Widowed</option>            
                		<option value="Seprated">Seprated</option>            
                		<option value="Divorced">Divorced</option>            
                </select>
            </div>
            <div class="col-md-4">
    			<label for="nationality_other_personal_info_renewal">Nationality</label>
    			<input name="nationality_other_personal_info_renewal" id="nationality_other_personal_info_renewal" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
    		</div>
    		<div class="col-md-4">
    			<label for="place_of_birth_other_personal_info_renewal">Place of Birth</label>
    			<input name="place_of_birth_other_personal_info_renewal" id="place_of_birth_other_personal_info_renewal" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
    		</div>
    		<div class="col-md-12 break-two">
                    <br>    
            </div>

    		<div class="col-md-4 ">
        	 	<label for="type_of_id_personal_info_renewal">Type of ID</label>
    			<select  id="type_of_id_personal_info_renewal" name="type_of_id_personal_info_renewal" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-type_of_id_personal_info" data-size="10"  data-live-search="true" >
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
            <div class="col-md-4">
    			<label for="idno_other_personal_info_renewal">ID No.</label>
    			<input name="idno_other_personal_info_renewal" id="idno_other_personal_info_renewal" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
    		</div>    		
    		
        </div>
        <div class="step_renewal"  style="text-align: left;">
        	
        	<div class="col-md-12" style="margin-bottom: 220px;">
        		<h2>Want to get coverage for your loved ones?</h2>
	        	<button  id="NewApplicant_renewal" type="submit"  class="btn btn-success NewApplicant_renewal" style="min-width: 267px;min-height: 60px;color: #ffffff;margin-right: 15px;">Yes, Add Applicant</button>
	        	<button  id="CheckCoverage_renewal" type="submit"  class="btn btn-default CheckCoverage_renewal" style="min-width: 267px;min-height: 60px;color: #ffffff;">Check Coverage</button>
        	</div>
        </div>
        <form method="post" action="{{ route('covidinsurancerenewalsave') }}" enctype="multipart/form-data">
        	{{ csrf_field() }}
	        <div class="step_renewal" style="text-align: left;">
	        	<div id="iAggre_warning_renewal" name="iAggre_warning_renewal" class="alert alert-danger" style="display: none">
			  Please check <strong>I Agree</strong> checkbox!
			</div>	
	        	<span>Period of Insurance: From:</span><span id="from_incept" name="from_incept"></span><span> To: </span><span id="to_incept" name="to_incept"></span><span> at 00:01 Hours Philippine Standard Time</span>  <br><br>
				<div class="table-wrapper col-md-9"  style="overflow-x:auto !important;"> 
					<table id="tabl_summary_renewal"  name="tabl_summary_renewal" class="table table-bordered " style="font-family: muli;text-align: left">
						<tbody>   
						  	<tr class="heading " style="height: 65px;" >  
						    	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;background-color: #53b947;min-width: 200px;"> 
						    		<span style="height: 15px !important;"><br></span>      
						      		<span style="font-size: medium;color: #ffffff;">Name</span> 
						      	</th>
						      	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;background-color: #53b947;min-width: 200px;"> 
						    		<span style="height: 15px !important;"><br></span>      
						      		<span style="font-size: medium;color: #ffffff;">Coverage</span> 
						      	</th>
						      	<th colspan="0" style="text-transform: uppercase; font-weight: bold; text-align: center;font-family: muli;background-color: #53b947;min-width: 200px;"> 
						    		<span style="height: 15px !important;"><br></span>      
						      		<span style="font-size: medium;color: #ffffff;">Premium</span> 
						      	</th>


						    </tr>				    
						</tbody> 
						<tfoot>
						    <tr style="background-color: #00BFFF;color: #ffffff">
						      <td colspan="2">TOTAL PREMIUM</td>
						      <td>Php <label id="total_premium_renewal"	style="color:#ffffff"></label>
						      	<input type="hidden" name="total_premium_all" name="total_premium_all" value="">
						      </td>
						    </tr>
						  </tfoot>
					</table> 
				</div>
				<div class="col-md-12" style="text-align: left;margin-top: 20px;">
	        		
	        	</div>
					
				<div  class="col-md-3 " style="margin-top: -22px;margin-bottom: 10px;">
        			<h2>Do you have an agent?</h2>  					
		        	<button type="button" id="btn_yes_renewal" name="btn_yes_renewal" class="btn" >Yes &nbsp;&nbsp;</button>
		        	<button type="button" id="btn_no_renewal" name="btn_no_renewal" class="btn" >No &nbsp;&nbsp;</button>
	        	</div>
	            <div class="col-md-6 " id="agentNameDiv_renewal">
        			<label for="agent_name_summary_renewal">Agent Code</label>
        			<input name="agent_name_summary_renewal" id="agent_name_summary_renewal" type="text" onkeydown="noonly()"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" style="height: 60px !important;">
        		</div>
        		
	        	
	        	
	        	<div class="modal fade " id="modal_covid19_summary_renewal" data-backdrop="static" data-keyboard="false" tabindex="-1">
					    <div class="modal-dialog " style="width:1250px;">
					     <div class="modal-content">
					     <!--  <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button> -->
					     <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal" style="color: green;margin-top: -5px;">&times;</button>
					         
				        </div>
					      <div class="modal-body">
					      	<!--  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right">&times;</button> -->
					        <div class="form-group">
					          <div class="input-group">
					          	<label style="margin-left:20px;margin-top:25px;margin-right:35px;line-height: 20px;text-align: justify;"><strong>Notice To You:</strong>This application does not bind You, or Us, COCOGEN. However, it is agreed that this application will be the basis of the contract, should a policy be issued, and will be attached to, and made part of the policy. You agree that if the information supplied on this application changes between the date of this application and the inception date of this policy. You will immediately notify Us of such changes. </label>

					          	<label style="margin-left:20px;margin-top:25px;margin-right:35px;line-height: 20px;text-align: justify;"><strong>Important Notice:</strong>The complete terms and conditions are contained in the policy schedule and policy wordings. COCOGEN is supervised by the Insurance Commission. The Insurance Commissioner, with offices in Manila, Cebu, and Davao, is the Government official in charge of the enforcement of all laws relating to Insurance and has supervision over insurance companies. He is ready at all times to render assistance in settling any controversy between an insurance company and a policyholder relating to insurance matters. </label>

					          	<h1 style="text-align: center;margin-top: 25px;color: green">Declaration and Concent</h1>
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">I hereby apply for insurance as set out in the above application form and declare, to the best of my knowledge and belief, that the foregoing statements and particulars are true and complete. I hereby agree to notify COCOGEN of any material change in the information as stated above.</label>
					            <label style="margin-left:20px;margin-top:15px;margin-right:35px;line-height: 20px;text-align: justify;">I hereby certify that I voluntarily and expressly consent to the collection, processing, sharing, storing of my personal and/or sensitive information by COCOGEN for the purpose/s necessary in processing my insurance policy and in processing my insurance policy and in any related transactions and/or in other purposes as stated in the Data Privacy Statement of COCOGEN or in wwww.cocogen.com/data-privacy. I hereby certify that I carefully understand the terms above before giving my consent.</label>

					            <h1 style="text-align: center;margin-top: 25px;color: green">Privacy Policy</h1>
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;"><strong>Data Privacy Statement</strong></label>
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">UCPB General
                                Insurance Company, Inc. ("COCOGEN") upholds an individual’s data privacy rights
                                and assures that all your personal information, sensitive
                                    personal information and privileged information (collectively, “Personal Data”),
                                collected and to be collected, are processed in compliance with the Data Privacy
                                Act of 2012 (Republic Act No. 10173) and its Implementing Rules and Regulations
                                (IRR).</label>
					            
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">This Privacy
                                Statement explains how we gather, protect, use, manage, and disclose the Personal
                                Data that We obtain about the Company’s clients in the course of doing business,
                                communications in social media or as a user of this our website.</label>

					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;"><strong>Data Gathering</strong></label><br>	
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">We collect data about our existing and prospective clients when:</label><br>	
					            <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp;1. They register, apply for, avail of or inquire about any of our products and services;</label><br>
					            <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp;2. They renew their existing policies and/or they request to update personal data for
                                record purposes;</label><br>	

					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">We also collect personal data when clients transact with our authorized agents,
                                brokers, employees, and representatives requiring the production of personal information.</label><br>	
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">Upon application or availing of our products, our authorized agents, employees, brokers and representatives may use the data gathered to aid us in giving the best products and services.</label><br>	
					            
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;"><strong>Data Collected </strong></label><br>	
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">Personal Data that will be collected includes, but are not limited to the following:</label><br>	
					           	
					            <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp;&nbsp;(1)
                                name, age, gender, birth date, home and/or business address, contact number, and
                                email address; </label><br>
					            <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp;
                                (2) educational background, financial background, and employment record and/or business
                                information; </label><br>
					            <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp;
                                (3) medical record and/ or information or fit to travel certificate for clients,
                                if necessary in availing our products.</label><br>
					            <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp;
                                (4) specimen signature, details and copy of government or company-issued ID, and </label><br>
                                 <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp; (5) other information necessary to give the needed products, and&nbsp;incidental
                                to the main transaction.</label><br>

					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">We collect
                                personal&nbsp;data that are essential and incidental to provide excellent and valuable
                                service that our existing and prospective clients truly deserve.</label><br>	


					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;"><strong>Data Protection</strong></label><br>	
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">COCOGEN
                                adheres to the Data Privacy Act of 2012 (R.A. 10173) its Implementing Rules and
                                Regulations and other related issuances of the National Privacy Commission. In line
                                with this, We take responsibility in collecting, processing, holding or use of personal
                                data. We assure that all information that our clients and potential clients will
                                provide shall be used solely for processing their transactions with our Company,
                                they consented to, and for other legitimate purposes mandated by law. We shall implement
                                reasonable and appropriate organizational, physical, and technical security measures
                                for the protection of your personal data.</label><br>	


                                <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;"><strong>Rights as Data Subject:</strong></label><br>	
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">We uphold
                                and recognize the rights of our clients, as data subjects, provided under the Data
                                Privacy Act of 2012, which are:</label><br>	

					            <label style="margin-left:20px;margin-top:1px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 1. Right to be informed;</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 2. Right to object;</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 3. Right to access;</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 4. Right to correct;</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 5. Right to rectification, ensure or blocking;</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 6. Right to damages; and</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 7. Right to data portability;</label><br>					

					            <label style="margin-left:20px;margin-top:35px;margin-right:35px;line-height: 20px;"><strong>Use of information</strong></label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">We use the information provided by our client and potentials client to;</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 1.&nbsp;Process their application;</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 2.&nbsp;Answer their inquiries and other transactions that may be necessary or otherwise
                                incidental to the availment of our products and services.</label><br>
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 3.&nbsp;Offer other products and services of the Company that we believe to be useful to the clients.
					            </label><br>
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">&nbsp; &nbsp; 4.&nbsp;Any other transactions which are normal in the course of business or as
                                mandated by law.</label><br>

                                <label style="margin-left:20px;margin-top:35px;margin-right:35px;line-height: 20px;"><strong>Disclosure of Information</strong></label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">We may share the Personal Data provided by our clients to our affiliates, subsidiaries and service providers with the obligation to take care and keep all the information shared to
                                them confidential. </label><br>	
                                <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">We may also use or share your Personal Data to third-party service providers or government agencies, to collect more information about our clients, if necessary, for&nbsp;business transactions.</label><br>	

                                <label style="margin-left:20px;margin-top:35px;margin-right:35px;line-height: 20px;"><strong>Data Retention</strong></label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">We will retain and/or preserve your Personal Data within the agreed period as stated in the policy and/or contract and if it is necessary for keeping track of your records and servicing your policy and contract.  </label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">If required or mandated by law, we will extend the retention of your Personal Data within the period provided by law. </label><br>
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">Any correction or erasures of the Personal Data shall be recorded.</label><br>
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">After the expiration of the period as earlier mentioned, we will destroy, delete or dispose of all the personal data and the materials, in our storage or server, in accordance with the requirement of Data Privacy Act.</label><br>

					            <label style="margin-left:20px;margin-top:35px;margin-right:35px;line-height: 20px;"><strong>Changes in our Privacy Policy: </strong></label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;">COCOGEN may periodically update or amend Privacy Policy in order to adhere to new and existing laws affecting the Data Privacy Act, including any change or improvement we establish to secure our clients' personal data. If we amend our Privacy Policy, we will post the updated and revised here in our website: www.ucpbgen.com and will take effect immediately. Rest assured, however, that any updates or changes shall not alter
                                how we handle previously collected personal data without obtaining our clients’
                                consent unless required by law. </label><br>
					           
					            <label style="margin-left:20px;margin-top:35px;margin-right:35px;line-height: 20px;text-align: center;">For any concerns, requests, complaints or queries, you may Contact Us at</label><br>
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: center;"><strong>Data Protection Officer:</strong>Mr. Edgardo
		                                        D. Rosario</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;text-align: center;"><strong>Address:</strong> UCPB General Insurance
		                                        Company, Inc. Office Address – 22F One Corporate Center Doña Julia Vargas corner
		                                        Meralco Ave., Ortigas, Pasig City</label><br>
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;text-align: center;"><strong>Email:</strong> data_privacy@cocogen.com</label><br>	
					            <label style="margin-left:20px;margin-top:0px;margin-right:35px;line-height: 20px;text-align: center;text-align: justify;"><strong>Cocogen Client Services:</strong> (632) 8-830-600</label><br>
								<label style="margin-left:20px;margin-top:35px;margin-right:35px;line-height: 20px;"><strong>Important: Section 251 of the Insurance Code, as amended, imposes a fine not exceeding twice the amount claimed and/or imprisonment of 2 years, or both, at the discretion of the court, to any person who presents or presented any fraudulent claim for the payment of a loss under a contract of insurance, and who fraudulently prepares, makes or subscribes any writing with intent to present or use the same, or to allow it to be presented in support of any claim.</strong></label><br>
					            <div class="devicer"></div>
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;"><strong>Definition Of Terms according to&nbsp;<a href="https://www.privacy.gov.ph/data-privacy-act/">Republic Act 10173 or Data Privacy Act</a>:</strong></label><br>	
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">*“Personal information” refers to any information, whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together  with other information would directly and certainly identify an individual.</label><br>	
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">Sensitive personal information refers to personal information:</label><br>
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp; 1. About an individual’s race, ethnic origin, marital status, age, color, and religious, philosophical or political affiliations;</label><br>
					            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp; 2. About an individual’s health, education, genetic or sexual life of a person, or to any proceeding for any offense committed or alleged to have been committed by such individual, the disposal of such proceedings, or
                                the sentence of any court in such proceedings;</label><br>
                                <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp; 3. Issued by government agencies peculiar to an individual  which includes, but is not limited to, social security numbers, previous or current health records, licenses or its denials, suspension or revocation, and tax returns; and</label><br>
                                <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">&nbsp; &nbsp; 4. Specifically established by an executive order or an act of Congress to be kept classified</label><br>

                                <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;text-align: justify;">*“Privileged information” refers to any and all forms of data, which, under the Rules of Court and other pertinent laws constitute privileged communication;</label><br>	


					            <style type="text/css">
					            	.devicer {
										  width: 97%;
										  display: block;
										  height: 2px;
										  background-color: #4b4b4d;
										  margin: 60px auto 0;
										}
					            </style>
					          </div>
					        </div>
					      </div>
					       <div class="modal-footer" style="text-align: center">	
					       		<div class="col-md-offset-5 col-md-12">			           
					           		<button type="submit" id="btnagree_renewal" class="btn btn-default" style="display: block;">I Agree</button>
					           </div>	
					        </div>
					     </div>
					    </div>
					  </div> 
	        	<div class="col-md-12" style="text-align: left;margin-top: 20px;">
	        		
	        	</div>
	        	<!-- <div class="col-md-3 firstform" style="text-align: left;">
		             <label></label>
		         	<button type="button" id="addApplicant_renewal" name="addApplicant_renewal" class="addApplicant_renewal  btn" >Add Applicant</button>
		        </div> -->
		        <div class="col-md-6 firstform" style="text-align: left;">
		        	
		        	<label for="email_summary_renewal"><strong>Send Dragon Pay receipt to:</strong> </label>
		         	<input name="email_summary_renewal" id="email_summary_renewal" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" style="height: 60px !important;" placeholder="Enter Email Address">
		        </div>
		         <div class="col-md-3 firstform">
        			<label for="promo_summary_renewal">Promo Code</label>
        			<input name="promo_summary_renewal" id="promo_summary_renewal" type="text"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" style="height: 60px !important;">
        		</div>
		        
		         <div class="col-md-9" style="text-align: left;margin-top: 14px;">
		         	<table>
		          		<tr >
		          			<td width="5%"><input type="checkbox" id="checksummary_renewal" name="checksummary_renewal"></td>
		          			<td width="95%">
		          				<label for="checksummary_renewal" style="margin-left: -5px;">I agree that the person to be insured can only be covered by a maximum of <strong> two (2) units</strong> of COVID-19 Assist+ and that he/she will be paid only <strong>up to the total amount of coverage of the two (2) units</strong> selected</label>
		          			</td>
		          		</tr>					          	
		         </table>
		         </div>

				<div class="col-md-12" style="text-align: left;margin-top: 20px;">
	        		
	        	</div>
	        	<div class="col-md-2">
	        	</div>
	        	<div class="col-md-2" style="text-align: left;">
		        	<label></label>
		            <button type="button" id="btnsubmit_renewal" class=" btn btn-default">Proceed to Payment</button> <br><br><br>
		        </div>
	        </div>
		</form>
        <div class="col-md-12" style="text-align: left;margin-bottom: 180px;">
        	<br><br>
        	<div id="nextbutton_renewal" name="nextbutton_renewal">
        		<button  id="next_renewal" name="next_renewal" type="submit"  class="action next_renewal btn btn-default" style="min-width: 267px;min-height: 60px;color: #ffffff;margin-bottom: 20px;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
         	</div>      
        </div>
           
        </div>
	</div>
</div>
<script type="text/javascript">
	function phoneMaskPHno() {
	  var key = window.event.key;
	  var element = window.event.target;
	  var isAllowed = /\d|Backspace|Tab/;
	  if(!isAllowed.test(key)) window.event.preventDefault();
	  if(element.value.length < 15){
		  var inputValue = element.value;
		  inputValue = inputValue.replace(/\D/g,'');
		  inputValue = inputValue.replace(/(^\d{4})(\d)/,'($1) $2');
		  inputValue = inputValue.replace(/(\d{1,5})(\d{3}$)/,'$1-$2');
		  
		  element.value = inputValue;
	  }
	  
	}
	function noonly() {
	  var key = window.event.key;
	  var element = window.event.target;
	  var isAllowed = /\d|Backspace|Tab/;
	  if(!isAllowed.test(key)) window.event.preventDefault();
		  var inputValue = element.value;		 
		  element.value = inputValue;  
	}
</script>
<script type="text/javascript">
    var j = jQuery.noConflict();
      
           jQuery('#dateofBirth_personal_info_renewal').datepicker({
			 changeMonth: true,
		     changeYear: true,
		     dateFormat: 'mm/dd/yy',
		     
		     maxDate:'-18y',
		     yearRange: '1910:9999'
			}).on('focus', function(){
			    if(!jQuery('select').parent().hasClass('fake-select')){
			    	jQuery('select').wrap('<span class="fake-select"></span>');
			    }
			});  

			jQuery('#birthdate_validation').datepicker({
			 changeMonth: true,
		     changeYear: true,
		     dateFormat: 'mm/dd/yy',
		     minDate: '-65y',
		     maxDate:'1y',
		     yearRange: '1910:2100'
			}).on('focus', function(){
			    if(jQuery('select').parent().hasClass('fake-select')){
			    	jQuery('select').wrap('<span class="fake-select"></span>');
			    }
			});   

	$('#occupation_personal_info_renewal').on('change', function() {
	  if(this.value == "Others"){
	  		$("#occupation_other_personal_info_renewal").removeAttr("disabled");
	  }else{
	  		$("#occupation_other_personal_info_renewal").val(""); 
	  		$("#occupation_other_personal_info_renewal").attr("disabled", "disabled"); 
	  		var occupation =  this.value;
	  		var _token = jQuery('input[name="_token"]').val();
			jQuery.ajax({
			      	url:'{{url('/')}}' + '/api/covid/occupation/getdata',
			      	method:"GET",
			      	data:{ _token:_token, occupation:occupation}, 
			      	success:function(result)
			      	{         
			            jQuery.each(result, function(key, value){
			            	if(value.covid_blacklist == "Y"){

			            		var check1;
					     		var check2;
					     		var check3;
					     		var check4;
					     		var check5;
					     		if ($('#checkbox-1').is(":checked")){
					     			check1 = "Y";
					     		}else{
					     			check1 = "N";			     			
					     		}if ($('#checkbox-2').is(":checked")){
					     			check2 = "Y";
					     		}else{
					     			check2 = "N";			     			
					     		}if ($('#checkbox-3').is(":checked")){
					     			check3 = "Y";
					     		}else{
					     			check3 = "N";			     			
					     		}if ($('#checkbox-4').is(":checked")){
					     			check4 = "Y";
					     		}else{
					     			check4 = "N";			     			
					     		}if ($('#checkbox-5').is(":checked")){
					     			check5 = "Y";
					     		}else{
					     			check5 = "N";			     			
					     		}

								var _token = jQuery('input[name="_token"]').val();
								var first = jQuery('input[name="firstName_personal_info_renewal"]').val();
								var middle = jQuery('input[name="middleName_personal_info_renewal"]').val();
								var last = jQuery('input[name="lastName_personal_info_renewal"]').val();
								var bday = jQuery('#dateofBirth_personal_info_renewal').val();
								var gender = jQuery('#gender_personal_info_renewal').val();
								var contact = jQuery('input[name="contactNo_personal_info_renewal"]').val();
								var tel = jQuery('input[name="tel_no_info_renewal"]').val();
								var occupation = jQuery('#occupation_personal_info_renewal').val();
								var occupationOther = jQuery('input[name="occupation_other_personal_info_renewal"]').val();
								var email = jQuery('input[name="email_personal_info_renewal"]').val();
								var beneficiary = jQuery('input[name="beneficiary_personal_info"]').val();
								var relationship = jQuery('input[name="relationship_personal_info"]').val();
								var coverage = jQuery('input[name="coverage_complete_renewal"]').val();
								var save_no = jQuery('input[name="pwd_stat_save"]').val();
								var count = jQuery('#primbasicval_renewal').val();
								var id= $('input[name=old_tnxid]').val();						
								var pwdother = jQuery('#others_pwd_personal_info').val();
									if(save_no == 1){	
					     			}else{
					     				jQuery.ajax({
									      	url:'{{url('/')}}' + '/api/covid/insert/data/renewalblocked',
									      	method:"GET",
									      	data:{ _token:_token, first:first, middle:middle, last:last, bday:bday, gender:gender, contact:contact, tel:tel, occupation:occupation, occupationOther:occupationOther, email:email, beneficiary:beneficiary, relationship:relationship, coverage:coverage, count:count,id:id, check1:check1, check2:check2, check3:check3, check4:check4, check5:check5, pwdother:pwdother}, 
									      	success:function(result)
									      	{         
									             jQuery('input[name="pwd_stat_save"]').val(1);
										    }
									    })
					     			}

			            		jQuery('#occupation_personal_info_renewal').val("");
			            		jQuery('#occupation_personal_info_renewal').selectpicker("refresh"); 			            		
			            		jQuery('#occupation_modal').modal('show');
			            	}
				        })       
				     }
		    })
	  }
	});        
                                    
	function basicclick_renewal() {
		$('input[name=coverage_complete_renewal]').val("a");
  		document.getElementById("basic_renewal").style.background='#53b947';
  		document.getElementById("basic_renewal").style.color ='#ffffff';
  		document.getElementById("prime_renewal").style.background='#C0C0C0';
  		document.getElementById("prime_renewal").style.color ='#000000';  		
  		document.getElementById("basicprinme_renewal").style.background='#C0C0C0';
  		document.getElementById("basicprinme_renewal").style.color ='#000000';
  		document.getElementById('basicprinmepanel_renewal').style.display = 'block';
	}

	function primeclick_renewal() {
		$('input[name=coverage_complete_renewal]').val("b");
  		document.getElementById("basic_renewal").style.background='#C0C0C0';
  		document.getElementById("basic_renewal").style.color ='#000000';
  		document.getElementById("prime_renewal").style.background='#53b947';
  		document.getElementById("prime_renewal").style.color ='#ffffff';  		
  		document.getElementById("basicprinme_renewal").style.background='#C0C0C0';
  		document.getElementById("basicprinme_renewal").style.color ='#000000';
  		document.getElementById('basicprinmepanel_renewal').style.display = 'block';
	}
	function basicprinmeclick_renewal() {
		$('input[name=coverage_complete_renewal]').val("c");
  		document.getElementById("basic_renewal").style.background='#C0C0C0';
  		document.getElementById("basic_renewal").style.color ='#000000';
  		document.getElementById("prime_renewal").style.background='#C0C0C0';
  		document.getElementById("prime_renewal").style.color ='#000000';  		
  		document.getElementById("basicprinme_renewal").style.background='#53b947';
  		document.getElementById("basicprinme_renewal").style.color ='#ffffff';
  		document.getElementById('basicprinmepanel_renewal').style.display = 'none';  		
	}

	$( "#btn_pwd_yes" ).click(function() { 
		document.getElementById("btn_pwd_yes").style.background='#53b947';
  		document.getElementById("btn_pwd_yes").style.color ='#ffffff';
  		document.getElementById("btn_pwd_no").style.background='#C0C0C0';
  		document.getElementById("btn_pwd_no").style.color ='#000000';  
  		$('#pwd_div').css('display','block');
		$('input[name=pwd_stat]').val("yes"); 	
	});

	$( "#checkbox-5" ).click(function() {
	if ($('#checkbox-5').is(':checked')) {
	  		$('#pwd_div_others').css('display','block');		
		}else{
	  		$('#pwd_div_others').css('display','none');	
		}
	});

	if ($('#checkbox-5').is(':checked')) {
  		$('#pwd_div_others').css('display','block');		
	}else{
  		$('#pwd_div_others').css('display','none');	
	}


	$( "#btn_pwd_no" ).click(function() { 
		document.getElementById("btn_pwd_no").style.background='#53b947';
  		document.getElementById("btn_pwd_no").style.color ='#ffffff';
  		document.getElementById("btn_pwd_yes").style.background='#C0C0C0';
  		document.getElementById("btn_pwd_yes").style.color ='#000000'; 
  		$('#pwd_div').css('display','none');
		$('input[name=pwd_stat]').val("no");
	});

	jQuery('#residence_province_renewal').change(function(){
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
		      		jQuery('#residence_municipality_renewal').empty();
		      		$('#residence_municipality_renewal').append($('<option>', { 
				        value: "",
				        text : "- Select City/Municipality -"
			    	}));
			        jQuery.each(result, function(key, value){
	            	$('#residence_municipality_renewal').append($('<option>', { 
				        value: value.city,
				        text : value.city 
			    	}));			    	
	            })  
			        jQuery('#residence_municipality_renewal').selectpicker("refresh"); 
		      	}
	    	})
	    }
    }); 

    jQuery('#mailing_province_renewal').change(function(){
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
		      		jQuery('#mailing_municipality_renewal').empty();
		      		$('#mailing_municipality_renewal').append($('<option>', { 
				        value: "",
				        text : "- Select City/Municipality -"
			    	}));
			        jQuery.each(result, function(key, value){
	            	$('#mailing_municipality_renewal').append($('<option>', { 
				        value: value.city,
				        text : value.city 
			    	}));			    	
	            })  
			        jQuery('#mailing_municipality_renewal').selectpicker("refresh"); 
		      	}
	    	})
	    }
    }); 

	jQuery('#residence_municipality_renewal').change(function(){
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
		      		jQuery('#residence_barangay_renewal').empty();
		      		$('#residence_barangay_renewal').append($('<option>', { 
				        value: "",
				        text : "- Select Barangay -"
			    	}));
			        jQuery.each(result, function(key, value){
	            	$('#residence_barangay_renewal').append($('<option>', { 
				        value: value.barangay,
				        text : value.barangay 
			    	}));			    	
	            })  
			        jQuery('#residence_barangay_renewal').selectpicker("refresh"); 
		      	}
	    	})
	    }
    });

    jQuery('#mailing_municipality_renewal').change(function(){
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
		      		jQuery('#mailing_barangay_renewal').empty();
		      		$('#mailing_barangay_renewal').append($('<option>', { 
				        value: "",
				        text : "- Select Barangay -"
			    	}));
			        jQuery.each(result, function(key, value){
	            	$('#mailing_barangay_renewal').append($('<option>', { 
				        value: value.barangay,
				        text : value.barangay 
			    	}));			    	
	            })  
			        jQuery('#mailing_barangay_renewal').selectpicker("refresh"); 
		      	}
	    	})
	    }
    }); 

    $( "#chckSameAddress_renewal" ).click(function() { 
	    if (jQuery(this).is(':checked') === true) {
	   		var residence_address = jQuery('#residence_address_renewal').val();
	   		var residence_province = jQuery('#residence_province_renewal').val();
	   		var residence_municipality = jQuery('#residence_municipality_renewal').val();
	   		var residence_barangay = jQuery('#residence_barangay_renewal').val();


            jQuery('#mailing_address_renewal').val(residence_address);   
            $('#mailing_province_renewal').append('<option selected value="' + residence_province + '">' + residence_province + '</option>');			
            $('#mailing_municipality_renewal').append('<option selected value="' + residence_municipality + '">' + residence_municipality + '</option>');			
            $('#mailing_barangay_renewal').append('<option selected value="' + residence_barangay + '">' + residence_barangay + '</option>');			
            jQuery('#mailing_province_renewal').selectpicker("refresh"); 
            jQuery('#mailing_municipality_renewal').selectpicker("refresh"); 
            jQuery('#mailing_barangay_renewal').selectpicker("refresh"); 

      	}else{
            jQuery('#mailing_address_renewal').val("");        
            jQuery('#mailing_province_renewal').val("");        
            jQuery('#mailing_municipality_renewal').val("");        
            jQuery('#mailing_barangay_renewal').val("");
                 jQuery('#mailing_province_renewal').selectpicker("refresh"); 
            jQuery('#mailing_municipality_renewal').selectpicker("refresh"); 
            jQuery('#mailing_barangay_renewal').selectpicker("refresh");    

      	}         
	});

	$('#file-upload_renewal').change(function() {
	  var i = $(this).prev('label').clone();
	  var file = $('#file-upload_renewal')[0].files[0].name;

	  if (this.files[0].size > 5000000) {
	  	$("#upload_Error_renewal").html("File size must not greater than 2MB.");	  
	  	$("#upload_Error_renewal").show();	  
	  	$("#upload_label_renewal").hide();
	  	$("#upload_file_renewal").hide();
	  }else{
	  	$("#upload_Error_renewal").hide();
	  	$("#upload_file_renewal").show();
	  	$("#upload_label_renewal").hide();
	    $("#upload_file_file_renewal").empty();
	    $("#upload_file_file_renewal").html(file);

	    
	  }
	
	});

	$( "#btn_yes_renewal" ).click(function() { 
		document.getElementById("btn_yes_renewal").style.background='#53b947';
  		document.getElementById("btn_yes_renewal").style.color ='#ffffff';
  		document.getElementById("btn_no_renewal").style.background='#C0C0C0';
  		document.getElementById("btn_no_renewal").style.color ='#000000';  
  		$('#agentNameDiv_renewal').css('display','block');
  		

  		
	});

	$( "#btn_no_renewal" ).click(function() { 
		document.getElementById("btn_no_renewal").style.background='#53b947';
  		document.getElementById("btn_no_renewal").style.color ='#ffffff';
  		document.getElementById("btn_yes_renewal").style.background='#C0C0C0';
  		document.getElementById("btn_yes_renewal").style.color ='#000000'; 
  		$('#agentNameDiv_renewal').css('display','none');

	});

	$( "#btnsubmit_renewal" ).click(function() { 
		// data-toggle="modal" data-target="#modal_covid19_summary_renewal"

		//validation email

		$(".validation_email_summary").remove(); 
 		$(".validation_email_summary_check_error").remove(); 
 		$(".validation_email_summary_check_success").remove();

		var errornumber = 0
 		if($('#email_summary_renewal').val() == ""){
 			$('#email_summary_renewal').css('border-color', '#F44336');	     			
            $("#email_summary_renewal").after("<div class='validation_email_summary' style='opacity:0.7;color:#F44336;margin-top:5px;'>Email is empty</div>");    
 			$('#email_summary_renewal').after('<i class="fa fa-times-circle validation_email_summary_check_error fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
 			errornumber = 1;           
 		}else{	  
 			if(IsEmail($('#email_summary_renewal').val())==false){
		        $('#email_summary_renewal').css('border-color', '#F44336');	     			
                $("#email_summary_renewal").after("<div class='validation_email_summary' style='opacity:0.7;color:#F44336;margin-top:5px;'>Invalid email address!</div>");    
     			$('#email_summary_renewal').after('<i class="fa fa-times-circle validation_email_summary_check_error fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
     			errornumber = 1;           
	        }else{
	        	$('#email_summary_renewal').after('<i class="fa fa-check-circle validation_email_summary_check_success fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
 				$('#email_summary_renewal').css('border-color', '#4BB543'); 
	        }                 
 		}

 		if (jQuery('#checksummary_renewal').is(':checked') === false) {
  			
 		}else{
 			
 		}

 		if($('input[name="checksummary_renewal"]').is(':checked'))		{
		  	$('#iAggre_warning_renewal').css('display','none');
		}else{
			$('#iAggre_warning_renewal').css('display','block');
		  	errornumber = 1; 
		}

 		if(errornumber !== 0){
 			return false;
 		} 

 		jQuery('#modal_covid19_summary_renewal').modal('show');
	});
	
  
</script>

<script type="text/javascript">
	$(document).ready(function(){
	$('#nextbutton_renewal').css('display','block');
  	$('#agentNameDiv_renewal').css('display','none');
	$(".pwed_select").hide(); 
	$(".pwed_select_checkbox").hide();  
    $('#checkbox-1').prop('checked', false);
    $('#checkbox-2').prop('checked', false);
    $('#checkbox-3').prop('checked', false);
    $('#checkbox-4').prop('checked', false);
    $('#checkbox-5').prop('checked', false);
	$('#nextbutton').css('display','block');
  	$('#pwd_div_others').css('display','none');
	$('#pop_warning1').css('display','block');
	$('#pop_warning2').css('display','none');	
	$('#pop_warning1_PWD').css('display','block');
	$('#pop_warning2_PWD').css('display','none');
	$('#pwd_div').css('display','none');
	$('input[name=pwd_stat]').val("");

	var _token = jQuery('input[name="_token"]').val();
    jQuery.ajax({
      	url:'{{url('/')}}' + '/api/covid/province/get',
      	method:"GET",
      	data:{ _token:_token}, 
      	success:function(result)
      	{         
            jQuery.each(result, function(key, value){
            	$('#residence_province_renewal').append($('<option>', { 
			        value: value.province,
			        text : value.province 
			    }));

			    $('#mailing_province_renewal').append($('<option>', { 
			        value: value.province,
			        text : value.province 
			    }));
	        })       
	      }
	    })

    jQuery.ajax({
      	url:'{{url('/')}}' + '/api/covid/getoccupation',
      	method:"GET",
      	data:{ _token:_token}, 
      	success:function(result)
      	{         
            jQuery.each(result, function(key, value){
            	$('#occupation_personal_info_renewal').append($('<option>', { 
			        value: value.occupation,
			        text : value.occupation 
			    }));	

	        })       
	      }
	    })

    

  	var current_renewal = 1;
    $('.NoPaste').on("cut copy paste",function(e) {
      e.preventDefault();
   	});

   	
	$('input[name=coverage_complete_renewal]').val("");
	jQuery('#warning_coverage_package_renewal').css("display", "none");
	widget      = $(".step_renewal");
	btnnext     = $(".next_renewal");
	btnback     = $(".back_renewal"); 
	btnsubmit   = $(".submit_renewal");
	btnNew      = $(".NewApplicant_renewal");
	btncheck    = $(".CheckCoverage_renewal");
	btnAdd      = $(".addApplicant_renewal");
    btnNextPage = $(".next_2ndpage");
	btncheck_occ = $("#btn_back_to_applicant_occupation");
	btncheck_pwd = $("#btn_back_to_applicant");

	// Init buttons and UI
	widget.not(':eq(0)').hide();
	hideButtons(current_renewal);
	setProgress(current_renewal);

	btncheck_pwd.click(function(){
		jQuery('#occupation_modal').modal('hide');
		jQuery('#modal_PWD').modal('hide');
		current = 6;
		if(current < widget.length) {
            widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current); 
        } 		
       hideButtons(current);
	});

	btncheck_occ.click(function(){
		jQuery('#occupation_modal').modal('hide');
		jQuery('#modal_PWD').modal('hide');
		current = 6;
		if(current < widget.length) {
            widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current); 
        } 		
       hideButtons(current);
	});

	// Next button click action
	btnNextPage.click(function(){
		
	    if(current_renewal < widget.length) {
	    	btnback.show();	
	    	
	     	//personal info
	     	if(current_renewal == 3){
	     		$(".validation_middleName_personal_info").remove();
	     		$(".validation_middleName_personal_info_check_error").remove(); 
	     		$(".validation_middleName_personal_info_check_success").remove(); 

	     		$(".validation_firstName_personal_info").remove(); 
	     		$(".validation_firstName_personal_info_check_error").remove(); 
	     		$(".validation_firstName_personal_info_check_success").remove();  

	     		$(".validation_lastName_personal_info").remove(); 
	     		$(".validation_lastName_personal_info_check_error").remove(); 
	     		$(".validation_lastName_personal_info_check_success").remove();

	     		$(".validation_contactNo_personal_info").remove(); 
	     		$(".validation_contactNo_personal_info_check_success").remove(); 
	     		$(".validation_contactNo_personal_info_check_error").remove();

	     		$(".validation_dateofBirth_personal_info").remove(); 
	     		$(".validation_dateofBirth_personal_info_check_error").remove(); 
	     		$(".validation_dateofBirth_personal_info_check_success").remove();

	     		$(".validation_gender_personal_info").remove(); 
	     		$(".validation_gender_personal_info_check_error").remove(); 
	     		$(".validation_gender_personal_info_check_success").remove();

	     		$(".validation_email_personal_info").remove(); 
	     		$(".validation_email_personal_info_check_error").remove(); 
	     		$(".validation_email_personal_info_check_success").remove();

	     		$(".validation_occupation_personal_info").remove(); 
	     		$(".validation_occupation_personal_info_check_error").remove(); 
	     		$(".validation_occupation_personal_info_check_success").remove();
	     		
	     		$(".validation_tel_no_info_renewal").remove(); 
	     		$(".validation_tel_no_info_check_error_renewal").remove(); 
	     		$(".validation_tel_no_info_check_success_renewal").remove();


	     		$(".validation_occupation_other_personal_info_renewal").remove(); 
	     		$(".validation_occupation_other_personal_info_renewal_check_error").remove(); 
	     		$(".validation_occupation_other_personal_info_renewal_check_success").remove();

	     		$(".validation_beneficiary_personal_info").remove(); 
	     		$(".validation_beneficiary_personal_info_check_error").remove(); 
	     		$(".validation_beneficiary_personal_info_check_success").remove();

	     		$(".validation_relationship_personal_info").remove(); 
	     		$(".validation_relationship_personal_info_check_error").remove(); 
	     		$(".validation_relationship_personal_info_check_success").remove();    

	     		var errornumber = 0;
	     		//validation middle
	     		if($('#middleName_personal_info_renewal').val() == ""){
	     			$('#middleName_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#middleName_personal_info_renewal").after("<div class='validation_middleName_personal_info' style='opacity:0.7;color:#F44336;'>Middle name is empty</div>");    
	     			$('#middleName_personal_info_renewal').after('<i class="fa fa-times-circle validation_middleName_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#middleName_personal_info_renewal').after('<i class="fa fa-check-circle validation_middleName_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#middleName_personal_info_renewal').css('border-color', '#4BB543');
                   
	     		}
	     		//validation first
	     		if($('#firstName_personal_info_renewal').val() == ""){
	     			$('#firstName_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#firstName_personal_info_renewal").after("<div class='validation_firstName_personal_info' style='opacity:0.7;color:#F44336;'>First name is empty</div>");    
	     			$('#firstName_personal_info_renewal').after('<i class="fa fa-times-circle validation_firstName_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#firstName_personal_info_renewal').after('<i class="fa fa-check-circle validation_firstName_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#firstName_personal_info_renewal').css('border-color', '#4BB543');                   
	     		}
	     		//validation last
	     		if($('#lastName_personal_info_renewal').val() == ""){
	     			$('#lastName_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#lastName_personal_info_renewal").after("<div class='validation_lastName_personal_info' style='opacity:0.7;color:#F44336;'>Last name is empty</div>");    
	     			$('#lastName_personal_info_renewal').after('<i class="fa fa-times-circle validation_lastName_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#lastName_personal_info_renewal').after('<i class="fa fa-check-circle validation_lastName_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#lastName_personal_info_renewal').css('border-color', '#4BB543');                   
	     		}
	     		//validation contact
	     		if($('#tel_no_info_renewal').val() == ""){
		     		if($('#contactNo_personal_info_renewal').val() == ""){
		     			$('#contactNo_personal_info_renewal').css('border-color', '#F44336');	     			
	                    $("#contactNo_personal_info_renewal").after("<div class='validation_contactNo_personal_info' style='opacity:0.7;color:#F44336;'>Contact no is empty</div>");    
		     			$('#contactNo_personal_info_renewal').after('<i class="fa fa-times-circle validation_contactNo_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
		     			errornumber = 1;           
		     		}else{	     				     			
		     			$('#contactNo_personal_info_renewal').after('<i class="fa fa-check-circle validation_contactNo_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
		     			$('#contactNo_personal_info_renewal').css('border-color', '#4BB543');                   
		     		}
		     	}else{
		     		$('#contactNo_personal_info_renewal').css('border-color', '');  
		     	}
	     		//validation birthday
	     		if($('#dateofBirth_personal_info_renewal').val() == ""){
	     			$('#dateofBirth_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#dateofBirth_personal_info_renewal").after("<div class='validation_dateofBirth_personal_info' style='opacity:0.7;color:#F44336;'>Birthday is empty</div>");    
	     			$('#dateofBirth_personal_info_renewal').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#dateofBirth_personal_info_renewal').after('<i class="fa fa-check-circle validation_dateofBirth_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#dateofBirth_personal_info_renewal').css('border-color', '#4BB543');                   
	     		}

	     		//validation gender
	     		if($('#gender_personal_info_renewal').val() == ""){
	     			$('.btn-white-gender').css('border-color', '#F44336');	     			
                    $("#gender_personal_info_renewal").after("<div class='validation_gender_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Gender is empty</div>");    
	     			$('#gender_personal_info_renewal').after('<i class="fa fa-times-circle validation_gender_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');       
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#gender_personal_info_renewal').after('<i class="fa fa-check-circle validation_gender_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-gender').css('border-color', '#4BB543');                   
	     		}

	     		//validation email
	     		if($('#email_personal_info_renewal').val() == ""){
	     			$('#email_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#email_personal_info_renewal").after("<div class='validation_email_personal_info' style='opacity:0.7;color:#F44336;'>Email is empty</div>");    
	     			$('#email_personal_info_renewal').after('<i class="fa fa-times-circle validation_email_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	  
	     			if(IsEmail($('#email_personal_info_renewal').val())==false){
				        $('#email_personal_info_renewal').css('border-color', '#F44336');	     			
	                    $("#email_personal_info_renewal").after("<div class='validation_email_personal_info' style='opacity:0.7;color:#F44336;'>Invalid email address!</div>");    
		     			$('#email_personal_info_renewal').after('<i class="fa fa-times-circle validation_email_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
		     			errornumber = 1;           
			        }else{
			        	$('#email_personal_info_renewal').after('<i class="fa fa-check-circle validation_email_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     				$('#email_personal_info_renewal').css('border-color', '#4BB543'); 
			        }                 
	     		}
	     		if($('#contactNo_personal_info_renewal').val() == ""){
		     		if($('#tel_no_info_renewal').val() == ""){
		     			$('#tel_no_info_renewal').css('border-color', '#F44336');	     			
	                    $("#tel_no_info_renewal").after("<div class='validation_tel_no_info_renewal' style='opacity:0.7;color:#F44336;'>Contact no is empty</div>");    
		     			$('#tel_no_info_renewal').after('<i class="fa fa-times-circle validation_tel_no_info_check_error_renewal fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
		     			errornumber = 1;           
		     		}else{	     				     			
		     			$('#tel_no_info_renewal').after('<i class="fa fa-check-circle validation_tel_no_info_check_success_renewal fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
		     			$('#tel_no_info_renewal').css('border-color', '#4BB543');                   
		     		}
				}else{
					$('#tel_no_info_renewal').css('border-color', '');
				}
	     		//validation occupation 
	     		if($('#occupation_personal_info_renewal').val() == ""){
	     			$('.btn-white-occupation_personal_info').css('border-color', '#F44336');	     			
                    $("#occupation_personal_info_renewal").after("<div class='validation_occupation_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Occupation is empty</div>");    
	     			$('#occupation_personal_info_renewal').after('<i class="fa fa-times-circle validation_occupation_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');       
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#occupation_personal_info_renewal').after('<i class="fa fa-check-circle validation_occupation_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;coccupation_personal_info;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-occupation_personal_info').css('border-color', '#4BB543');                   
	     		}

	     		if($('#occupation_personal_info_renewal').val() == "OTHERS"){
	     			if($('#occupation_other_personal_info_renewal').val() == ""){
		     			$('#occupation_other_personal_info_renewal').css('border-color', '#F44336');	     			
	                    $("#occupation_other_personal_info_renewal").after("<div class='validation_occupation_other_personal_info_renewal' style='opacity:0.7;color:#F44336;'>Other occupation is empty</div>");    
		     			$('#occupation_other_personal_info_renewal').after('<i class="fa fa-times-circle validation_occupation_other_personal_info_renewal_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
		     			errornumber = 1;           
		     		}else{	     				     			
		     			$('#occupation_other_personal_info_renewal').after('<i class="fa fa-check-circle validation_occupation_other_personal_info_renewal_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
		     			$('#occupation_other_personal_info_renewal').css('border-color', '#4BB543');                   
		     		}
	     		}

	     		if($('#beneficiary_personal_info').val() == ""){
	     			$('#beneficiary_personal_info').css('border-color', '#F44336');	     			
                    $("#beneficiary_personal_info").after("<div class='validation_beneficiary_personal_info' style='opacity:0.7;color:#F44336;'>Beneficiary is empty</div>");    
	     			$('#beneficiary_personal_info').after('<i class="fa fa-times-circle validation_beneficiary_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#beneficiary_personal_info').after('<i class="fa fa-check-circle validation_beneficiary_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#beneficiary_personal_info').css('border-color', '#4BB543');                   
	     		}

	     		if($('#relationship_personal_info').val() == ""){
	     			$('#relationship_personal_info').css('border-color', '#F44336');	     			
                    $("#relationship_personal_info").after("<div class='validation_relationship_personal_info' style='opacity:0.7;color:#F44336;'>Relationship to the Insured is empty</div>");    
	     			$('#relationship_personal_info').after('<i class="fa fa-times-circle validation_relationship_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#relationship_personal_info').after('<i class="fa fa-check-circle validation_relationship_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#relationship_personal_info').css('border-color', '#4BB543');                   
	     		}

	     		if($('input[name=pwd_stat]').val() == ""){
	     			$('#btn_pwd_yes').css('border-color', '#F44336');	
	     			$('#btn_pwd_no').css('border-color', '#F44336');
	     			$(".pwed_select").show(); 	
	     			errornumber = 1;

	     		}else{
	     			$('#btn_pwd_yes').css('border-color', '');	
	     			$('#btn_pwd_no').css('border-color', '');
	     			$(".pwed_select").hide();  
	     			if($('input[name=pwd_stat]').val() !== "no"){
	     				if ($('#checkbox-1').is(":checked") || $('#checkbox-2').is(":checked") || $('#checkbox-3').is(":checked") || $('#checkbox-4').is(":checked") || $('#checkbox-5').is(":checked"))
						{
							$(".pwed_select_checkbox").hide();  					
						}else{
							$(".pwed_select_checkbox").show();  
							errornumber = 1; 						 
						}	

						if ($('#checkbox-5').is(":checked"))
						{
							if($('#others_pwd_personal_info').val() == ""){
				     			$('.btn-white-others_pwd_personal_info').css('border-color', '#F44336');	     			
			                    $("#others_pwd_personal_info").after("<div class='validation_others_pwd_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Other description is empty</div>");    
				     			$('#others_pwd_personal_info').after('<i class="fa fa-times-circle validation_others_pwd_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');       
				     			errornumber = 1;           
				     		}else{	     				     			
				     			$('#others_pwd_personal_info').after('<i class="fa fa-check-circle validation_others_pwd_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;cothers_pwd_personal_info;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
				     			$('.btn-white-others_pwd_personal_info').css('border-color', '#4BB543');                   
				     		}
							
						}
						if(errornumber !== 0){
			     			return false;
			     		} 

			     		var check1;
			     		var check2;
			     		var check3;
			     		var check4;
			     		var check5;
			     		if ($('#checkbox-1').is(":checked")){
			     			check1 = "Y";
			     		}else{
			     			check1 = "N";			     			
			     		}if ($('#checkbox-2').is(":checked")){
			     			check2 = "Y";
			     		}else{
			     			check2 = "N";			     			
			     		}if ($('#checkbox-3').is(":checked")){
			     			check3 = "Y";
			     		}else{
			     			check3 = "N";			     			
			     		}if ($('#checkbox-4').is(":checked")){
			     			check4 = "Y";
			     		}else{
			     			check4 = "N";			     			
			     		}if ($('#checkbox-5').is(":checked")){
			     			check5 = "Y";
			     		}else{
			     			check5 = "N";			     			
			     		}

						jQuery('#modal_PWD').modal('show');
						var _token = jQuery('input[name="_token"]').val();
						var first = jQuery('input[name="firstName_personal_info_renewal"]').val();
						var middle = jQuery('input[name="middleName_personal_info_renewal"]').val();
						var last = jQuery('input[name="lastName_personal_info_renewal"]').val();
						var bday = jQuery('#dateofBirth_personal_info_renewal').val();
						var gender = jQuery('#gender_personal_info_renewal').val();
						var contact = jQuery('input[name="contactNo_personal_info_renewal"]').val();
						var tel = jQuery('input[name="tel_no_info_renewal"]').val();
						var occupation = jQuery('#occupation_personal_info_renewal').val();
						var occupationOther = jQuery('input[name="occupation_other_personal_info_renewal"]').val();
						var email = jQuery('input[name="email_personal_info_renewal"]').val();
						var beneficiary = jQuery('input[name="beneficiary_personal_info"]').val();
						var relationship = jQuery('input[name="relationship_personal_info"]').val();
						var coverage = jQuery('input[name="coverage_complete_renewal"]').val();
						var save_no = jQuery('input[name="pwd_stat_save"]').val();
						var count = jQuery('#primbasicval_renewal').val();
						var id= $('input[name=old_tnxid]').val();						
						var pwdother = jQuery('#others_pwd_personal_info').val();
							if(save_no == 1){	
			     			}else{
			     				jQuery.ajax({
							      	url:'{{url('/')}}' + '/api/covid/insert/data/renewal',
							      	method:"GET",
							      	data:{ _token:_token, first:first, middle:middle, last:last, bday:bday, gender:gender, contact:contact, tel:tel, occupation:occupation, occupationOther:occupationOther, email:email, beneficiary:beneficiary, relationship:relationship, coverage:coverage, count:count,id:id, check1:check1, check2:check2, check3:check3, check4:check4, check5:check5, pwdother:pwdother}, 
							      	success:function(result)
							      	{         
							             jQuery('input[name="pwd_stat_save"]').val(1);
								    }
							    })
			     			}
						    
						errornumber = 1; 
	     			}else{
	     				jQuery('#modal_PWD').modal('hide');
	     			}	     			
	     		}

	     		if($('#occupation_other_personal_info_renewal').val() == ""){

	     		}else{
	     			var _token = jQuery('input[name="_token"]').val();
					var other = jQuery('#occupation_other_personal_info_renewal').val();
	     			jQuery.ajax({
						      	url:'{{url('/')}}' + '/api/covid/occupation/other/check',
						      	method:"GET",
						      	data:{ _token:_token, other:other}, 
						      	success:function(result)
						      	{    		
							      	if(result.length > 0){

							      		var check1;
							     		var check2;
							     		var check3;
							     		var check4;
							     		var check5;
							     		if ($('#checkbox-1').is(":checked")){
							     			check1 = "Y";
							     		}else{
							     			check1 = "N";			     			
							     		}if ($('#checkbox-2').is(":checked")){
							     			check2 = "Y";
							     		}else{
							     			check2 = "N";			     			
							     		}if ($('#checkbox-3').is(":checked")){
							     			check3 = "Y";
							     		}else{
							     			check3 = "N";			     			
							     		}if ($('#checkbox-4').is(":checked")){
							     			check4 = "Y";
							     		}else{
							     			check4 = "N";			     			
							     		}if ($('#checkbox-5').is(":checked")){
							     			check5 = "Y";
							     		}else{
							     			check5 = "N";			     			
							     		}

										//jQuery('#modal_PWD').modal('show');
										var _token = jQuery('input[name="_token"]').val();
										var first = jQuery('input[name="firstName_personal_info_renewal"]').val();
										var middle = jQuery('input[name="middleName_personal_info_renewal"]').val();
										var last = jQuery('input[name="lastName_personal_info_renewal"]').val();
										var bday = jQuery('#dateofBirth_personal_info_renewal').val();
										var gender = jQuery('#gender_personal_info_renewal').val();
										var contact = jQuery('input[name="contactNo_personal_info_renewal"]').val();
										var tel = jQuery('input[name="tel_no_info_renewal"]').val();
										var occupation = jQuery('#occupation_personal_info_renewal').val();
										var occupationOther = jQuery('input[name="occupation_other_personal_info_renewal"]').val();
										var email = jQuery('input[name="email_personal_info_renewal"]').val();
										var beneficiary = jQuery('input[name="beneficiary_personal_info"]').val();
										var relationship = jQuery('input[name="relationship_personal_info"]').val();
										var coverage = jQuery('input[name="coverage_complete_renewal"]').val();
										var save_no = jQuery('input[name="pwd_stat_save"]').val();
										var count = jQuery('#primbasicval_renewal').val();
										var id= $('input[name=old_tnxid]').val();						
										var pwdother = jQuery('#others_pwd_personal_info').val();
											if(save_no == 1){	
							     			}else{
							     				jQuery.ajax({
											      	url:'{{url('/')}}' + '/api/covid/insert/data/renewalblocked',
											      	method:"GET",
											      	data:{ _token:_token, first:first, middle:middle, last:last, bday:bday, gender:gender, contact:contact, tel:tel, occupation:occupation, occupationOther:occupationOther, email:email, beneficiary:beneficiary, relationship:relationship, coverage:coverage, count:count,id:id, check1:check1, check2:check2, check3:check3, check4:check4, check5:check5, pwdother:pwdother}, 
											      	success:function(result)
											      	{         
											             jQuery('input[name="pwd_stat_save"]').val(1);
												    }
											    })
							     			}
						      			jQuery('#occupation_personal_info_renewal').val("");
							            jQuery('#occupation_other_personal_info_renewal').val("");
					            		jQuery('#occupation_personal_info_renewal').selectpicker("refresh"); 
					            		current = 2;			            		
					            		jQuery('#occupation_modal').modal('show');
					            		
					            		widget.show(); 			
							            widget.not(':eq('+(current++)+')').hide();						            	

							  	        setProgress(current); 
							  	        hideButtons(current);
							      	}	
							    }
						    })
	     		}	

	     		if(errornumber !== 0){
	     			return false;
	     		}         
	     	}
	     	
			if(current_renewal == 5){
			}
            widget.show(); 			
            widget.not(':eq('+(current_renewal++)+')').hide();


  	        setProgress(current_renewal); 
        } 		
       hideButtons(current_renewal); 	
   	});
	// Next button click action
	btnnext.click(function(){
		
	    if(current_renewal < widget.length) {
	    	btnback.show();	
	    	//coverage	
	    	if(current_renewal == 1){
	    		var errornumber = 0;
	    		$('input[name=validation_error_postback]').val("");
	    		$(".validation_coc_no_validation_info").remove();
	     		$(".validation_coc_no_validation_info_check_error").remove(); 
	     		$(".validation_coc_no_validation_info_check_success").remove(); 

	     		$(".validation_contact_no_validation_info").remove();
	     		$(".validation_contact_no_validation_check_error").remove(); 
	     		$(".validation_contact_no_validation_check_success").remove(); 

	     		$(".validation_birthdate_validation").remove();
	     		$(".validation_birthdate_validation_check_error").remove(); 
	     		$(".validation_birthdate_validation_check_success").remove(); 


				if($('#coc_no_validation').val() == ""){
	     			$('#coc_no_validation').css('border-color', '#F44336');	     			
                    $("#coc_no_validation").after("<div class='validation_coc_no_validation_info' style='opacity:0.7;color:#F44336;margin-top:5px;'>COC no is empty!</div>");    
	     			$('#coc_no_validation').after('<i class="fa fa-times-circle validation_coc_no_validation_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#coc_no_validation').after('<i class="fa fa-check-circle validation_coc_no_validation_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#coc_no_validation').css('border-color', '#4BB543');
                   
	     		} 

	     		if($('#contact_no_validation').val() == ""){
	     			$('#contact_no_validation').css('border-color', '#F44336');	     			
                    $("#contact_no_validation").after("<div class='validation_contact_no_validation_info' style='opacity:0.7;color:#F44336;margin-top:5px;'>Contact no/Tel NO is empty!</div>");    
	     			$('#contact_no_validation').after('<i class="fa fa-times-circle validation_contact_no_validation_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#contact_no_validation').after('<i class="fa fa-check-circle validation_contact_no_validation_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#contact_no_validation').css('border-color', '#4BB543');
                   
	     		} 

	     		if($('#birthdate_validation').val() == ""){
	     			$('#birthdate_validation').css('border-color', '#F44336');	     			
                    $("#birthdate_validation").after("<div class='validation_birthdate_validation' style='opacity:0.7;color:#F44336;margin-top:5px;'>Date of Birth no is empty!</div>");    
	     			$('#birthdate_validation').after('<i class="fa fa-times-circle validation_birthdate_validation_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber = 1;           
	     		}else{	     				     			
	     			$('#birthdate_validation').after('<i class="fa fa-check-circle validation_birthdate_validation_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#birthdate_validation').css('border-color', '#4BB543');
                   
	     		} 

	     		if(errornumber !== 0){
	     			return false;
	     		}   

	    		var _token = jQuery('input[name="_token"]').val();	  
	    		var cocno = jQuery('#coc_no_validation').val();	 	 	
	    		var contact = jQuery('#contact_no_validation').val(); 
	    		var d = new Date($('#birthdate_validation').val()),
			        month = '' + (d.getMonth() + 1),
			        day = '' + d.getDate(),
			        year = d.getFullYear();


				    if (month.length < 2){ month = '0' + month};
				    if (day.length < 2){day = '0' + day};
		 		var fulldate = year +'-'+month +'-'+day;
			    jQuery.ajax({
			      	url:'{{url('/')}}' + '/api/covid/getdatacovid',
			      	method:"GET",
			      	data:{ _token:_token, cocno:cocno, fulldate:fulldate, contact:contact},
			      	success:function(result)
			      	{    
					    var count = Object.keys(result).length;  
				      	if(count > 0){

				      	 var d = new Date();
						 d.setDate(d.getDate()-100);
						 			 
 	

				      		jQuery('#validation_warning').css("display", "none");
							jQuery.each(result, function(key, value){
								btnback.show();
					          	$('input[name=old_id]').val(value.id);
					          	$('input[name=old_tnxid]').val(value.tnxid);
					          	var DateCreated    = new Date(value.expiry_date)
					          			if(DateCreated < d){
											jQuery('#validation_warning').css("display", "none");
											jQuery('#date_warning').css("display", "block");

							           				
						            		widget.show(); 			
								            widget.not(':eq('+(current_renewal++)+')').hide();						            	
								            current_renewal = 0;
								  	        setProgress(current_renewal); 
								  	        hideButtons(current_renewal);



					          			}



								//1st page
					          	if(value.coverage == "Basic"){
					          		$('input[name=coverage_complete_renewal]').val("a");
									document.getElementById("basic_renewal").style.background='#53b947';
							  		document.getElementById("basic_renewal").style.color ='#ffffff';
							  		document.getElementById("prime_renewal").style.background='#C0C0C0';
							  		document.getElementById("prime_renewal").style.color ='#000000';  		
							  		document.getElementById("basicprinme_renewal").style.background='#C0C0C0';
							  		document.getElementById("basicprinme_renewal").style.color ='#000000';
							  		document.getElementById('basicprinmepanel_renewal').style.display = 'block';
						            $('#primbasicval_renewal').val(value.unit);		
						            jQuery('#primbasicval_renewal').selectpicker("refresh"); 
					          	}
					          	if(value.coverage == "Prime"){
					          		$('input[name=coverage_complete_renewal]').val("b");
							  		document.getElementById('basicprinmepanel_renewal').style.display = 'block';
									document.getElementById("basic_renewal").style.background='#C0C0C0';
							  		document.getElementById("basic_renewal").style.color ='#000000';
							  		document.getElementById("prime_renewal").style.background='#53b947';
							  		document.getElementById("prime_renewal").style.color ='#ffffff';  		
							  		document.getElementById("basicprinme_renewal").style.background='#C0C0C0';
							  		document.getElementById("basicprinme_renewal").style.color ='#000000';
							  		document.getElementById('basicprinmepanel_renewal').style.display = 'block';
							  		$('#primbasicval_renewal').val(value.unit);		
						            jQuery('#primbasicval_renewal').selectpicker("refresh"); 
					          	}

					          	//2nd page
					          	jQuery('#firstName_personal_info_renewal').val(value.firstname);
					          	jQuery('#middleName_personal_info_renewal').val(value.middlename);
					          	jQuery('#lastName_personal_info_renewal').val(value.lastname);
					          	jQuery('#dateofBirth_personal_info_renewal').val(value.birthdate);
					          	jQuery('#gender_personal_info_renewal').val(value.gender);
						        jQuery('#gender_personal_info_renewal').selectpicker("refresh"); 
					          	jQuery('#contactNo_personal_info_renewal').val(value.contractNo);
					          	jQuery('#email_personal_info_renewal').val(value.email);
					          	jQuery('#beneficiary_personal_info').val(value.beneficiary);
					          	jQuery('#relationship_personal_info').val(value.relationship);
					          	jQuery('#tel_no_info_renewal').val(value.telNo);
					          	jQuery('#others_pwd_personal_info').val(value.PWDOther);
						        jQuery('#occupation_personal_info_renewal').append('<option selected value="' + value.occupation + '">' + value.occupation + '</option>');	
						        jQuery('#occupation_personal_info_renewal').selectpicker("refresh"); 


						        if(value.pwd_tag == "Y"){
						        	document.getElementById("btn_pwd_yes").style.background='#53b947';
							  		document.getElementById("btn_pwd_yes").style.color ='#ffffff';
							  		document.getElementById("btn_pwd_no").style.background='#C0C0C0';
							  		document.getElementById("btn_pwd_no").style.color ='#000000';  
							  		$('#pwd_div').css('display','block');
									$('input[name=pwd_stat]').val("yes");
						        }else{
						        	document.getElementById("btn_pwd_no").style.background='#53b947';
							  		document.getElementById("btn_pwd_no").style.color ='#ffffff';
							  		document.getElementById("btn_pwd_yes").style.background='#C0C0C0';
							  		document.getElementById("btn_pwd_yes").style.color ='#000000'; 
							  		$('#pwd_div').css('display','none');
									$('input[name=pwd_stat]').val("no");
						        }

						        if(value.PWDcheckbox5 == "Y"){
						        	$( "#checkbox-5").prop('checked', true);
						        	$('#pwd_div_others').css('display','block');
						        }else{
						        	$( "#checkbox-5").prop('checked', false);
						        	$('#pwd_div_others').css('display','none');	
						        }

						        if(value.PWDcheckbox4 == "Y"){
						        	$( "#checkbox-4").prop('checked', true);
						        }else{
						        	$( "#checkbox-4").prop('checked', false);
						        }

						        if(value.PWDcheckbox3 == "Y"){
						        	$( "#checkbox-3").prop('checked', true);
						        }else{
						        	$( "#checkbox-3").prop('checked', false);
						        }

						        if(value.PWDcheckbox2 == "Y"){
						        	$( "#checkbox-2").prop('checked', true);
						        }else{
						        	$( "#checkbox-2").prop('checked', false);
						        }

						        if(value.PWDcheckbox1 == "Y"){
						        	$( "#checkbox-1").prop('checked', true);
						        }else{
						        	$( "#checkbox-1").prop('checked', false);
						        }


					          	//3rd page
					          	jQuery('#residence_address_renewal').val(value.residence_address);
					          	jQuery('#mailing_address_renewal').val(value.mailing_address);
					          	jQuery('#residence_province_renewal').val(value.residence_province);
						        jQuery('#residence_province_renewal').append('<option selected value="' + value.residence_province + '">' + value.residence_province + '</option>');		
						        jQuery('#residence_municipality_renewal').append('<option selected value="' + value.residence_municipality + '">' + value.residence_municipality + '</option>');		
						        jQuery('#residence_barangay_renewal').append('<option selected value="' + value.residence_barangay + '">' + value.residence_barangay + '</option>');
					          	jQuery('#mailing_province_renewal').val(value.mailing_province);
						        jQuery('#mailing_municipality_renewal').append('<option selected value="' + value.mailing_municipality + '">' + value.mailing_municipality + '</option>');		
						        jQuery('#mailing_barangay_renewal').append('<option selected value="' + value.mailing_barangay + '">' + value.mailing_barangay + '</option>');
						        jQuery('#residence_province_renewal').selectpicker("refresh"); 
						        jQuery('#residence_municipality_renewal').selectpicker("refresh"); 
						        jQuery('#residence_barangay_renewal').selectpicker("refresh"); 
						        jQuery('#mailing_province_renewal').selectpicker("refresh"); 
						        jQuery('#mailing_municipality_renewal').selectpicker("refresh"); 
						        jQuery('#mailing_barangay_renewal').selectpicker("refresh"); 	

								//4th page
					          	jQuery('#status_other_personal_info_renewal').val(value.maritalStatus);
					          	jQuery('#nationality_other_personal_info_renewal').val(value.nationality);
					          	jQuery('#place_of_birth_other_personal_info_renewal').val(value.placeOfBirth);
					          	jQuery('#type_of_id_personal_info_renewal').val(value.TypeOfdID);
					          	jQuery('#idno_other_personal_info_renewal').val(value.idno);
						        jQuery('#mailing_barangay_renewal').selectpicker("refresh");
						        jQuery('#status_other_personal_info_renewal').selectpicker("refresh"); 
						        jQuery('#type_of_id_personal_info_renewal').selectpicker("refresh"); 
 

								const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

								var d = new Date(value.expiry_date);
								d.setDate (d.getDate() + 1);
								var date_incept = monthNames[d.getMonth()]+ ' ' + d.getDate() + ', ' + d.getFullYear();

								var dt = new Date(d);
								dt.setMonth(dt.getMonth() + 3);								
								var date_expiry = monthNames[dt.getMonth()]+ ' ' + dt.getDate() + ', ' + dt.getFullYear();							


					          	jQuery('#to_incept').text(date_expiry);
					          	jQuery('#from_incept').text(date_incept);

						        //summary page
					          	jQuery('#email_summary_renewal').val(value.emailto);

					          	var agent =value.agentName;

					          	if(agent == null){
					          		document.getElementById("btn_no_renewal").style.background='#53b947';
							  		document.getElementById("btn_no_renewal").style.color ='#ffffff';
							  		document.getElementById("btn_yes_renewal").style.background='#C0C0C0';
							  		document.getElementById("btn_yes_renewal").style.color ='#000000'; 
							  		$('#agentNameDiv_renewal').css('display','none');
					          	}else{					          		
							  		jQuery('#agent_name_summary_renewal').val(value.agentName);
					          		document.getElementById("btn_yes_renewal").style.background='#53b947';
							  		document.getElementById("btn_yes_renewal").style.color ='#ffffff';
							  		document.getElementById("btn_no_renewal").style.background='#C0C0C0';
							  		document.getElementById("btn_no_renewal").style.color ='#000000'; 
							  		$('#agentNameDiv_renewal').css('display','block'); 
					          	}

					          	widget.show(); 			
			             		widget.not(':eq('+(current_renewal++)+')').hide();
				            	setProgress(current_renewal);            	
			        		})  
				      	}else{
				      		jQuery('#validation_warning').css("display", "block");
							jQuery('#date_warning').css("display", "none");
				      		cuurent=1;				      		
			           		setProgress(current_renewal); 
				      	}  
				    }
				 })

	    	}		
	     	if(current_renewal == 2){
	     		$(".validation_noofItem_check_error").remove(); 
	     		$(".validation_oofItem_check_success").remove(); 
	     		$(".validation_unit_personal_info").remove(); 

	     		if($('input[name=coverage_complete_renewal]').val() == ""){ 
					$('#primbasicval_renewal').css('border-color', '');
					jQuery('#warning_coverage_package_renewal').css("display", "block");
					return false;
		     	}else{	   
	     		   	if($('input[name=coverage_complete_renewal]').val() !== "c"){ 	     		   		
	 					if(jQuery('#primbasicval_renewal').val() == ""){ 	
	 						jQuery('#warning_coverage_package_renewal').css("display", "none");		
							$('.btn-white-noofunit').css('border-color', '#F44336');	     			
		                    $("#primbasicval_renewal").after("<div class='validation_unit_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Number of unit is empty</div>");    
			     			$('#primbasicval_renewal').after('<i class="fa fa-times-circle validation_noofItem_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>'); 
	 						return false;
	 					}else{
	 						$('#primbasicval_renewal').after('<i class="fa fa-check-circle validation_oofItem_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     					$('.btn-white-noofunit').css('border-color', '#4BB543');   
	 						jQuery('#warning_coverage_package_renewal').css("display", "none");
	 					}
	     			}else{
		     				$('#primbasicval_renewal').css('border-color', '')
	 						jQuery('#warning_coverage_package_renewal').css("display", "none");
	     			}
		     	}
	     	}
	     	
	     	//Address
	     	if(current_renewal == 4){
	     		$(".validation_residence_address").remove(); 
	     		$(".validation_residence_address_check_error").remove(); 
	     		$(".validation_residence_address_check_success").remove();

	     		$(".validation_residence_municipality").remove(); 
	     		$(".validation_residence_municipality_check_error").remove(); 
	     		$(".validation_residence_municipality_check_success").remove();

	     		$(".validation_residence_province").remove(); 
	     		$(".validation_residence_province_check_error").remove(); 
	     		$(".validation_residence_province_check_success").remove();

	     		$(".validation_residence_barangay").remove(); 
	     		$(".validation_residence_barangay_check_error").remove(); 
	     		$(".validation_residence_barangay_check_success").remove();

	     		$(".validation_mailing_address").remove(); 
	     		$(".validation_mailing_address_check_error").remove(); 
	     		$(".validation_mailing_address_check_success").remove();

	     		$(".validation_mailing_province").remove(); 
	     		$(".validation_mailing_province_check_error").remove(); 
	     		$(".validation_mailing_province_check_success").remove();

	     		$(".validation_mailing_municipality").remove(); 
	     		$(".validation_mailing_municipality_check_error").remove(); 
	     		$(".validation_mailing_municipality_check_success").remove();

	     		$(".validation_mailing_barangay").remove(); 
	     		$(".validation_mailing_barangay_check_error").remove(); 
	     		$(".validation_mailing_barangay_check_success").remove();

	     		var errornumber_address = 0;

	     		//validation residence address
	     		if($('#residence_address_renewal').val() == ""){
	     			$('#residence_address_renewal').css('border-color', '#F44336');	     			
                    $("#residence_address_renewal").after("<div class='validation_residence_address' style='opacity:0.7;color:#F44336;margin-top: 5px;'>Residence address is empty</div>");    
	     			$('#residence_address_renewal').after('<i class="fa fa-times-circle validation_residence_address_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#residence_address_renewal').after('<i class="fa fa-check-circle validation_residence_address_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#residence_address_renewal').css('border-color', '#4BB543');                   
	     		}

				//validation residence municipality
	     		if($('#residence_municipality_renewal').val() == ""){
	     			$('.btn-white-residence_municipality').css('border-color', '#F44336');	     			
                    $("#residence_municipality_renewal").after("<div class='validation_residence_municipality' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Municipality is empty</div>");    
	     			$('#residence_municipality_renewal').after('<i class="fa fa-times-circle validation_residence_municipality_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#residence_municipality_renewal').after('<i class="fa fa-check-circle validation_residence_municipality_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-residence_municipality').css('border-color', '#4BB543');                   
	     		}

	     		//validation residence province
	     		if($('#residence_province_renewal').val() == ""){
	     			$('.btn-white-residence_province').css('border-color', '#F44336');	     			
                    $("#residence_province_renewal").after("<div class='validation_residence_province' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Province is empty</div>");    
	     			$('#residence_province_renewal').after('<i class="fa fa-times-circle validation_residence_province_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#residence_province_renewal').after('<i class="fa fa-check-circle validation_residence_province_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-residence_province').css('border-color', '#4BB543');                   
	     		}

	     		//validation residence barangay
	     		if($('#residence_barangay_renewal').val() == ""){
	     			$('.btn-white-residence_barangay').css('border-color', '#F44336');	     			
                    $("#residence_barangay_renewal").after("<div class='validation_residence_barangay' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;font-size:13px;'>Barangay is empty</div>");    
	     			$('#residence_barangay_renewal').after('<i class="fa fa-times-circle validation_residence_barangay_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#residence_barangay_renewal').after('<i class="fa fa-check-circle validation_residence_barangay_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-10px !important;color: #4BB543;size:20px;z-index: 2 !important"></i>');
	     			$('.btn-white-residence_barangay').css('border-color', '#4BB543');                   
	     		}

	     		//validation mailing address
	     		if($('#mailing_address_renewal').val() == ""){
	     			$('#mailing_address_renewal').css('border-color', '#F44336');	     			
                    $("#mailing_address_renewal").after("<div class='validation_mailing_address' style='opacity:0.7;color:#F44336;margin-top: 5px'>Mailing address is empty</div>");    
	     			$('#mailing_address_renewal').after('<i class="fa fa-times-circle validation_mailing_address_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;z-index: 2 !important"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#mailing_address_renewal').after('<i class="fa fa-check-circle validation_residence_address_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#mailing_address_renewal').css('border-color', '#4BB543');                   
	     		}

	     		//validation mailing province
	     		if($('#mailing_province_renewal').val() == ""){
	     			$('.btn-white-mailing_province').css('border-color', '#F44336');	     			
                    $("#mailing_province_renewal").after("<div class='validation_mailing_province' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Province is empty</div>");    
	     			$('#mailing_province_renewal').after('<i class="fa fa-times-circle validation_mailing_province_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#mailing_province_renewal').after('<i class="fa fa-check-circle validation_mailing_province_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-mailing_province').css('border-color', '#4BB543');                   
	     		}

	     		//validation mailing municipality
	     		if($('#mailing_municipality_renewal').val() == ""){
	     			$('.btn-white-mailing_municipality').css('border-color', '#F44336');	     			
                    $("#mailing_municipality_renewal").after("<div class='validation_mailing_municipality' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Muicipality is empty</div>");    
	     			$('#mailing_municipality_renewal').after('<i class="fa fa-times-circle validation_mailing_municipality_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#mailing_municipality_renewal').after('<i class="fa fa-check-circle validation_mailing_municipality_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-mailing_municipality').css('border-color', '#4BB543');                   
	     		}

	     		//validation mailing municipality
	     		if($('#mailing_barangay_renewal').val() == ""){
	     			$('.btn-white-mailing_barangay').css('border-color', '#F44336');	     			
                    $("#mailing_barangay_renewal").after("<div class='validation_mailing_barangay' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Barangay is empty</div>");    
	     			$('#mailing_barangay_renewal').after('<i class="fa fa-times-circle validation_mailing_barangay_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
	     			errornumber_address = 1;           
	     		}else{	     				     			
	     			$('#mailing_barangay_renewal').after('<i class="fa fa-check-circle validation_mailing_barangay_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-mailing_barangay').css('border-color', '#4BB543');                   
	     		}



				if(errornumber_address !== 0){
	     			return false;
	     		}       
	     	}

	     	if(current_renewal == 5){

	     		$(".validation_status_other_personal_info").remove(); 
	     		$(".validation_status_other_personal_info_check_error").remove(); 
	     		$(".validation_status_other_personal_info_check_success").remove();

	     		$(".validation_nationality_other_personal_info").remove();
	     		$(".validation_nationality_other_personal_info_check_error").remove(); 
	     		$(".validation_nationality_other_personal_info_check_success").remove(); 

	     		$(".validation_place_of_birth_other_personal_info").remove();
	     		$(".validation_place_of_birth_other_personal_info_check_error").remove(); 
	     		$(".validation_place_of_birth_other_personal_info_check_success").remove(); 

	     		$(".validation_type_of_id_personal_info").remove(); 
	     		$(".validation_type_of_id_personal_info_check_error").remove(); 
	     		$(".validation_type_of_id_personal_info_check_success").remove();

	     		$(".validation_idno_other_personal_info").remove();
	     		$(".validation_idno_other_personal_info_check_error").remove(); 
	     		$(".validation_idno_other_personal_info_check_success").remove(); 	     		


	     		var errornumber_other_info = 0;
	     		//validation status
	     		if($('#status_other_personal_info_renewal').val() == ""){
	     			$('.btn-white-status_other_personal_info').css('border-color', '#F44336');	     			
                    $("#status_other_personal_info_renewal").after("<div class='validation_status_other_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Status empty</div>");    
	     			$('#status_other_personal_info_renewal').after('<i class="fa fa-times-circle validation_status_other_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
	     			errornumber_other_info = 1;           
	     		}else{	     				     			
	     			$('#status_other_personal_info_renewal').after('<i class="fa fa-check-circle validation_status_other_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-status_other_personal_info').css('border-color', '#4BB543');                   
	     		}


	     		//validation nationality
	     		if($('#nationality_other_personal_info_renewal').val() == ""){
	     			$('#nationality_other_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#nationality_other_personal_info_renewal").after("<div class='validation_nationality_other_personal_info' style='opacity:0.7;color:#F44336;'>Nationality is empty</div>");    
	     			$('#nationality_other_personal_info_renewal').after('<i class="fa fa-times-circle validation_nationality_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber_other_info = 1;           
	     		}else{	     				     			
	     			$('#nationality_other_personal_info_renewal').after('<i class="fa fa-check-circle validation_nationality_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#nationality_other_personal_info_renewal').css('border-color', '#4BB543');
                   
	     		}

	     		//validation place of birth
	     		if($('#place_of_birth_other_personal_info_renewal').val() == ""){
	     			$('#place_of_birth_other_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#place_of_birth_other_personal_info_renewal").after("<div class='validation_place_of_birth_other_personal_info' style='opacity:0.7;color:#F44336;'>Place of birth is empty</div>");    
	     			$('#place_of_birth_other_personal_info_renewal').after('<i class="fa fa-times-circle validation_place_of_birth_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber_other_info = 1;           
	     		}else{	     				     			
	     			$('#place_of_birth_other_personal_info_renewal').after('<i class="fa fa-check-circle validation_place_of_birth_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#place_of_birth_other_personal_info_renewal').css('border-color', '#4BB543');
                   
	     		}

	     		//validation type of ID
	     		if($('#type_of_id_personal_info_renewal').val() == ""){
	     			$('.btn-white-type_of_id_personal_info').css('border-color', '#F44336');	     			
                    $("#type_of_id_personal_info_renewal").after("<div class='validation_type_of_id_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;margin-bottom:30px !important;'>Type of ID empty</div>");    
	     			$('#type_of_id_personal_info_renewal').after('<i class="fa fa-times-circle validation_type_of_id_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
	     			errornumber_other_info = 1;           
	     		}else{	     				     			
	     			$('#type_of_id_personal_info_renewal').after('<i class="fa fa-check-circle validation_type_of_id_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			$('.btn-white-type_of_id_personal_info').css('border-color', '#4BB543');                   
	     		}

	     		//validation id no
	     		if($('#idno_other_personal_info_renewal').val() == ""){
	     			$('#idno_other_personal_info_renewal').css('border-color', '#F44336');	     			
                    $("#idno_other_personal_info_renewal").after("<div class='validation_idno_other_personal_info' style='opacity:0.7;color:#F44336;'>ID no is empty</div>");    
	     			$('#idno_other_personal_info_renewal').after('<i class="fa fa-times-circle validation_idno_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
	     			errornumber_other_info = 1;           
	     		}else{	     				     			
	     			$('#idno_other_personal_info_renewal').after('<i class="fa fa-check-circle validation_idno_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			$('#idno_other_personal_info_renewal').css('border-color', '#4BB543');
                   
	     		}


				if(errornumber_other_info !== 0){
	     			
	     			return false;
	     		} 
				$('#nextbutton_renewal').css('display','none');

			}
			if(current_renewal == 6){
			}

			if(current_renewal !== 1){
				 widget.show(); 			
	            widget.not(':eq('+(current_renewal++)+')').hide();


  	        setProgress(current_renewal); 
			}
           
        } 		
       hideButtons(current_renewal); 	
   	});
	//Check Coverarge button
	btncheck.click(function(){

		var fullname = $('#firstName_personal_info_renewal').val()  + ' '+ $('#middleName_personal_info_renewal').val()  + ' '+ $('#lastName_personal_info_renewal').val();
		var coverage;
		var coverage_count;
		var count_coverage;
		var coverage_label;
		var premium;

		var count= $('#primbasicval_renewal').val();
		var cov_value = $('input[name=coverage_complete_renewal]').val();
	
		if(cov_value !== "c"){
			if(cov_value == "a"){
				premium = count * 50;
				coverage = "Basic" + "(" +count+ ")";
				coverage_label = "Basic";
			}else{
				premium = count * 75;
				coverage = "Prime" + "(" +count+ ")";
				coverage_label = "Prime";

			}
		}else{
			premium = 125;
			coverage = "Basic+Prime";
			coverage_label = "Basic+Prime";
		}

		var total = $('#total_premium_renewal').text();
		var total_prem;
		if(total !== null){
			total_prem = (+total) +  (+premium);
		}else{
			total_prem =  premium;
		}
		var d = new Date($('#dateofBirth_personal_info_renewal').val()),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

	    if (month.length < 2){ month = '0' + month};
	    if (day.length < 2){day = '0' + day};
 		var fulldate = year +'-'+month +'-'+day;
		$('#total_premium_renewal').text(total_prem);
		$('input[name=total_premium_all]').val(total_prem);
		var occupation;
		if($('#occupation_personal_info_renewal').val() == "OTHERS"){
			occupation = $('#occupation_other_personal_info_renewal').val()
		}else{
			occupation = $('#occupation_personal_info_renewal').val();
		}
		$('#tabl_summary_renewal').append('<tr>\
									<input type="hidden" id="old_id_entry" name="old_id_entry[]" value="'+ $('input[name=old_id]').val() +'">\
									<input type="hidden" id="coverage_renewal" name="coverage_renewal[]" value="'+ coverage_label +'">\
									<input type="hidden" id="premium_renewal" name="premium_renewal[]" value="'+ premium +'">\
									<input type="hidden" id="total_prem_renewal" name="total_prem_renewal[]" value="'+ total_prem +'">\
									<input type="hidden" id="count_renewal" name="count_renewal[]" value="'+ count+'">\
									<input type="hidden" id="firstName_personal_info_renewal" name="firstName_personal_info_renewal[]" value="'+ $('#firstName_personal_info_renewal').val() +'">\
									<input type="hidden" id="middleName_personal_info_renewal" name="middleName_personal_info_renewal[]" value="'+ $('#middleName_personal_info_renewal').val() +'">\
									<input type="hidden" id="lastName_personal_info_renewal" name="lastName_personal_info_renewal[]" value="'+ $('#lastName_personal_info_renewal').val() +'">\
									<input type="hidden" id="dateofBirth_personal_info_renewal" name="dateofBirth_personal_info_renewal[]" value="'+ fulldate +'">\
									<input type="hidden" id="gender_personal_info_renewal" name="gender_personal_info_renewal[]" value="'+ $('#gender_personal_info_renewal').val() +'">\
									<input type="hidden" id="contactNo_personal_info_renewal" name="contactNo_personal_info_renewal[]" value="'+ $('#contactNo_personal_info_renewal').val() +'">\
									<input type="hidden" id="email_personal_info_renewal" name="email_personal_info_renewal[]" value="'+ $('#email_personal_info_renewal').val() +'">\
									<input type="hidden" id="tel_no_info" name="tel_no_info[]" value="'+ $('#tel_no_info').val() +'">\
									<input type="hidden" id="occupation_personal_info_renewal" name="occupation_personal_info_renewal[]" value="'+ occupation +'">\
									<input type="hidden" id="beneficiary_personal_info" name="beneficiary_personal_info[]" value="'+ $('#beneficiary_personal_info').val() +'">\
									<input type="hidden" id="relationship_personal_info" name="relationship_personal_info[]" value="'+ $('#relationship_personal_info').val() +'">\
									<input type="hidden" id="residence_address_renewal" name="residence_address_renewal[]" value="'+ $('#residence_address_renewal').val() +'">\
									<input type="hidden" id="residence_province_renewal" name="residence_province_renewal[]" value="'+ $('#residence_province_renewal').val() +'">\
									<input type="hidden" id="residence_municipality_renewal" name="residence_municipality_renewal[]" value="'+ $('#residence_municipality_renewal').val() +'">\
									<input type="hidden" id="residence_barangay_renewal" name="residence_barangay_renewal[]" value="'+ $('#residence_barangay_renewal').val() +'">\
									<input type="hidden" id="mailing_address_renewal" name="mailing_address_renewal[]" value="'+ $('#mailing_address_renewal').val() +'">\
									<input type="hidden" id="mailing_province_renewal" name="mailing_province_renewal[]" value="'+ $('#mailing_province_renewal').val() +'">\
									<input type="hidden" id="mailing_municipality_renewal" name="mailing_municipality_renewal[]" value="'+ $('#mailing_municipality_renewal').val() +'">\
									<input type="hidden" id="mailing_barangay_renewal" name="mailing_barangay_renewal[]" value="'+ $('#mailing_barangay_renewal').val() +'">\
									<input type="hidden" id="status_other_personal_info_renewal" name="status_other_personal_info_renewal[]" value="'+ $('#status_other_personal_info_renewal').val() +'">\
									<input type="hidden" id="nationality_other_personal_info_renewal" name="nationality_other_personal_info_renewal[]" value="'+ $('#nationality_other_personal_info_renewal').val() +'">\
									<input type="hidden" id="place_of_birth_other_personal_info_renewal" name="place_of_birth_other_personal_info_renewal[]" value="'+ $('#place_of_birth_other_personal_info_renewal').val() +'">\
									<input type="hidden" id="type_of_id_personal_info_renewal" name="type_of_id_personal_info_renewal[]" value="'+ $('#type_of_id_personal_info_renewal').val() +'">\
									<input type="hidden" id="idno_other_personal_info_renewal" name="idno_other_personal_info_renewal[]" value="'+ $('#idno_other_personal_info_renewal').val() +'">\
									<td>'+fullname+'<div id="toPaste_renewal" style="display:none"></div</td>\
									<td>'+coverage +'</td><td>'+premium +'</td>\
								</tr>');
	    if(current_renewal < widget.length) {
            widget.show(); 			
            widget.not(':eq('+(current_renewal++)+')').hide();
           
  	        setProgress(current_renewal); 
        } 		
       hideButtons(current_renewal); 	
   	});
	// New button click action  	
  	btnNew.click(function(){ 

  		$('#pop_warning1').css('display','none');
		$('#pop_warning2').css('display','block');
		$('#pop_warning1_PWD').css('display','none');
		$('#pop_warning2_PWD').css('display','block')
		var fullname = $('#firstName_personal_info_renewal').val()  + ' '+ $('#middleName_personal_info_renewal').val()  + ' '+ $('#lastName_personal_info_renewal').val();
		var coverage;
		var coverage_count;
		var count_coverage;
		var coverage_label;
		var premium;

		var count= $('#primbasicval_renewal').val();
		var cov_value = $('input[name=coverage_complete_renewal]').val();
	
		if(cov_value !== "c"){
			if(cov_value == "a"){
				premium = count * 50;
				coverage = "Basic" + "(" +count+ ")";
				coverage_label = "Basic";
			}else{
				premium = count * 75;
				coverage = "Prime" + "(" +count+ ")";
				coverage_label = "Prime";

			}
		}else{
			premium = 125;
			coverage = "Basic+Prime";
			coverage_label = "Basic+Prime";
		}

		var total = $('#total_premium_renewal').text();
		var total_prem;
		if(total !== null){
			total_prem = (+total) +  (+premium);
		}else{
			total_prem =  premium;
		}
		var d = new Date($('#dateofBirth_personal_info_renewal').val()),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

	    if (month.length < 2){ month = '0' + month};
	    if (day.length < 2){day = '0' + day};
 		var fulldate = year +'-'+month +'-'+day;
		$('#total_premium_renewal').text(total_prem);
		$('input[name=total_premium_all]').val(total_prem);
		var occupation;
		if($('#occupation_personal_info_renewal').val() == "OTHERS"){
			occupation = $('#occupation_other_personal_info_renewal').val()
		}else{
			occupation = $('#occupation_personal_info_renewal').val();
		}

		$('#tabl_summary_renewal').append('<tr>\
									<input type="hidden" id="old_id_entry" name="old_id_entry[]" value="'+ $('input[name=old_id]').val() +'">\
									<input type="hidden" id="coverage_renewal" name="coverage_renewal[]" value="'+ coverage_label +'">\
									<input type="hidden" id="premium_renewal" name="premium_renewal[]" value="'+ premium +'">\
									<input type="hidden" id="total_prem_renewal" name="total_prem_renewal[]" value="'+ total_prem +'">\
									<input type="hidden" id="count_renewal" name="count_renewal[]" value="'+ count+'">\
									<input type="hidden" id="firstName_personal_info_renewal" name="firstName_personal_info_renewal[]" value="'+ $('#firstName_personal_info_renewal').val() +'">\
									<input type="hidden" id="middleName_personal_info_renewal" name="middleName_personal_info_renewal[]" value="'+ $('#middleName_personal_info_renewal').val() +'">\
									<input type="hidden" id="lastName_personal_info_renewal" name="lastName_personal_info_renewal[]" value="'+ $('#lastName_personal_info_renewal').val() +'">\
									<input type="hidden" id="dateofBirth_personal_info_renewal" name="dateofBirth_personal_info_renewal[]" value="'+ fulldate +'">\
									<input type="hidden" id="gender_personal_info_renewal" name="gender_personal_info_renewal[]" value="'+ $('#gender_personal_info_renewal').val() +'">\
									<input type="hidden" id="contactNo_personal_info_renewal" name="contactNo_personal_info_renewal[]" value="'+ $('#contactNo_personal_info_renewal').val() +'">\
									<input type="hidden" id="email_personal_info_renewal" name="email_personal_info_renewal[]" value="'+ $('#email_personal_info_renewal').val() +'">\
									<input type="hidden" id="tel_no_info" name="tel_no_info[]" value="'+ $('#tel_no_info').val() +'">\
									<input type="hidden" id="occupation_personal_info_renewal" name="occupation_personal_info_renewal[]" value="'+ occupation +'">\
									<input type="hidden" id="beneficiary_personal_info" name="beneficiary_personal_info[]" value="'+ $('#beneficiary_personal_info').val() +'">\
									<input type="hidden" id="relationship_personal_info" name="relationship_personal_info[]" value="'+ $('#relationship_personal_info').val() +'">\
									<input type="hidden" id="residence_address_renewal" name="residence_address_renewal[]" value="'+ $('#residence_address_renewal').val() +'">\
									<input type="hidden" id="residence_province_renewal" name="residence_province_renewal[]" value="'+ $('#residence_province_renewal').val() +'">\
									<input type="hidden" id="residence_municipality_renewal" name="residence_municipality_renewal[]" value="'+ $('#residence_municipality_renewal').val() +'">\
									<input type="hidden" id="residence_barangay_renewal" name="residence_barangay_renewal[]" value="'+ $('#residence_barangay_renewal').val() +'">\
									<input type="hidden" id="mailing_address_renewal" name="mailing_address_renewal[]" value="'+ $('#mailing_address_renewal').val() +'">\
									<input type="hidden" id="mailing_province_renewal" name="mailing_province_renewal[]" value="'+ $('#mailing_province_renewal').val() +'">\
									<input type="hidden" id="mailing_municipality_renewal" name="mailing_municipality_renewal[]" value="'+ $('#mailing_municipality_renewal').val() +'">\
									<input type="hidden" id="mailing_barangay_renewal" name="mailing_barangay_renewal[]" value="'+ $('#mailing_barangay_renewal').val() +'">\
									<input type="hidden" id="status_other_personal_info_renewal" name="status_other_personal_info_renewal[]" value="'+ $('#status_other_personal_info_renewal').val() +'">\
									<input type="hidden" id="nationality_other_personal_info_renewal" name="nationality_other_personal_info_renewal[]" value="'+ $('#nationality_other_personal_info_renewal').val() +'">\
									<input type="hidden" id="place_of_birth_other_personal_info_renewal" name="place_of_birth_other_personal_info_renewal[]" value="'+ $('#place_of_birth_other_personal_info_renewal').val() +'">\
									<input type="hidden" id="type_of_id_personal_info_renewal" name="type_of_id_personal_info_renewal[]" value="'+ $('#type_of_id_personal_info_renewal').val() +'">\
									<input type="hidden" id="idno_other_personal_info_renewal" name="idno_other_personal_info_renewal[]" value="'+ $('#idno_other_personal_info_renewal').val() +'">\
									<td>'+fullname+'<div id="toPaste_renewal" style="display:none"></div</td>\
									<td>'+coverage +'</td><td>'+premium +'</td>\
								</tr>');

		$('#nextbutton_renewal').css('display','block');
		$("select option").prop("selected", false);

		//1st page
		$('input[name=old_id]').val("");
		$('input[name=validation_error_postback]').val("");
		$(".validation_coc_no_validation_info").remove();
 		$(".validation_coc_no_validation_info_check_error").remove(); 
 		$(".validation_coc_no_validation_info_check_success").remove();
 		$(".validation_contact_no_validation_info").remove();
 		$(".validation_contact_no_validation_check_error").remove(); 
 		$(".validation_contact_no_validation_check_success").remove(); 
 		$(".validation_birthdate_validation").remove();
 		$(".validation_birthdate_validation_check_error").remove(); 
 		$(".validation_birthdate_validation_check_success").remove(); 
		$('#coc_no_validation').val("");
		$('#contact_no_validation').val("");
		$('#birthdate_validation').val("");

		//1st page clear
		$(".validation_noofItem_check_error").remove(); 
 		$(".validation_oofItem_check_success").remove(); 
 		$(".validation_unit_personal_info").remove(); 
		$('.btn-white-noofunit').css('border-color', '');
		$('input[name=coverage_complete_renewal]').val("");
  		jQuery('#primbasicval').selectpicker("refresh"); 		
		document.getElementById("basic_renewal").style.background='#C0C0C0';
  		document.getElementById("basic_renewal").style.color ='#000000';
  		document.getElementById("prime_renewal").style.background='#C0C0C0';
  		document.getElementById("prime_renewal").style.color ='#000000'; 
  		document.getElementById("basicprinme_renewal").style.color ='#000000'; 	
  		document.getElementById("basicprinme_renewal").style.background='#C0C0C0';  		
  		document.getElementById('basicprinmepanel_renewal').style.display = 'none';
  		$(".validation_tel_no_info_renewal").remove(); 
 		$(".validation_tel_no_info_check_error_renewal").remove(); 
 		$(".validation_tel_no_info_check_success_renewal").remove();
 		$(".validation_occupation_other_personal_info_renewal").remove(); 
 		$(".validation_occupation_other_personal_info_renewal_check_error").remove(); 
 		$(".validation_occupation_other_personal_info_renewal_check_success").remove();
 		$(".validation_beneficiary_personal_info").remove(); 
 		$(".validation_beneficiary_personal_info_check_error").remove(); 
 		$(".validation_beneficiary_personal_info_check_success").remove();
 		$(".validation_relationship_personal_info").remove(); 
 		$(".validation_relationship_personal_info_check_error").remove(); 
 		$(".validation_relationship_personal_info_check_success").remove();   
		$('.btn-white-occupation_personal_info').css('border-color', '');   
		$('#occupation_other_personal_info_renewal').css('border-color', ''); 
		$('#beneficiary_personal_info').css('border-color', ''); 
		$('#relationship_personal_info').css('border-color', ''); 
		$('input[name=validation_error_postback]').val("");
		$(".validation_coc_no_validation_info").remove();
 		$(".validation_coc_no_validation_info_check_error").remove(); 
 		$(".validation_coc_no_validation_info_check_success").remove(); 
 		$(".validation_contact_no_validation_info").remove();
 		$(".validation_contact_no_validation_check_error").remove(); 
 		$(".validation_contact_no_validation_check_success").remove(); 
 		$(".validation_birthdate_validation").remove();
 		$(".validation_birthdate_validation_check_error").remove(); 
 		$(".validation_birthdate_validation_check_success").remove()
		$('#coc_no_validation').css('border-color', '');
		$('#contact_no_validation').css('border-color', '');
		$('#birthdate_validation').css('border-color', '');
  		//2nd page clear
  		$(".validation_middleName_personal_info").remove();
 		$(".validation_middleName_personal_info_check_error").remove(); 
 		$(".validation_middleName_personal_info_check_success").remove(); 
 		$(".validation_firstName_personal_info").remove(); 
 		$(".validation_firstName_personal_info_check_error").remove(); 
 		$(".validation_firstName_personal_info_check_success").remove();  
 		$(".validation_lastName_personal_info").remove(); 
 		$(".validation_lastName_personal_info_check_error").remove(); 
 		$(".validation_lastName_personal_info_check_success").remove();
 		$(".validation_contactNo_personal_info").remove(); 
 		$(".validation_contactNo_personal_info_check_success").remove(); 
 		$(".validation_contactNo_personal_info_check_error").remove();
 		$(".validation_dateofBirth_personal_info").remove(); 
 		$(".validation_dateofBirth_personal_info_check_error").remove(); 
 		$(".validation_dateofBirth_personal_info_check_success").remove();
 		$(".validation_gender_personal_info").remove(); 
 		$(".validation_gender_personal_info_check_error").remove(); 
 		$(".validation_gender_personal_info_check_success").remove();
 		$(".validation_email_personal_info").remove(); 
 		$(".validation_email_personal_info_check_error").remove(); 
 		$(".validation_email_personal_info_check_success").remove();
 		$(".validation_occupation_personal_info").remove(); 
 		$(".validation_occupation_personal_info_check_error").remove(); 
 		$(".validation_occupation_personal_info_check_success").remove();
 		$('#middleName_personal_info_renewal').css('border-color', '');	
		$('#firstName_personal_info_renewal').css('border-color', '');	    
		$('#lastName_personal_info_renewal').css('border-color', '');	  
		$('#contactNo_personal_info_renewal').css('border-color', '');	
		$('#dateofBirth_personal_info_renewal').css('border-color', '');	  
		$('.btn-white-gender').css('border-color', '');	   
		$('#email_personal_info_renewal').css('border-color', '');	
		$('#email_personal_info_renewal').css('border-color', '');	 
		$('#occupation_personal_info_renewal').css('border-color', '');	   
		$(".validation_beneficiary_personal_info").remove(); 
 		$(".validation_beneficiary_personal_info_check_error").remove(); 
 		$(".validation_beneficiary_personal_info_check_success").remove();
 		$(".validation_relationship_personal_info").remove(); 
 		$(".validation_relationship_personal_info_check_error").remove(); 
 		$(".validation_relationship_personal_info_check_success").remove();  
  		$('#firstName_personal_info_renewal').val("");
  		$('#middleName_personal_info_renewal').val("");
  		$('#lastName_personal_info_renewal').val("");
  		$('#dateofBirth_personal_info_renewal').val("");  		
  		$('#contactNo_personal_info_renewal').val("");
  		$('#email_personal_info_renewal').val("");
  		$('#occupation_personal_inf_renewalo').val("");
		$('#beneficiary_personal_info').val("");
		$('#relationship_personal_info').val("");
  		$("#occupation_other_personal_info_renewal").val(""); 

  		$(".validation_tel_no_info_renewal").remove(); 
	    $(".validation_tel_no_info_check_error_renewal").remove(); 
	    $(".validation_tel_no_info_check_success_renewal").remove();
 		$('#tel_no_info_renewal').css('border-color', '');
  		$('#tel_no_info_renewal').val("");
		$('#occupation_personal_info_renewal').val("");
		jQuery('#occupation_personal_info_renewal').selectpicker("refresh");
  		jQuery('#gender_personal_info_renewal').selectpicker("refresh"); 
  		////3rd page clear







		$(".validation_residence_address").remove(); 
 		$(".validation_residence_address_check_error").remove(); 
 		$(".validation_residence_address_check_success").remove();
 		$(".validation_residence_municipality").remove(); 
 		$(".validation_residence_municipality_check_error").remove(); 
 		$(".validation_residence_municipality_check_success").remove();
 		$(".validation_residence_province").remove(); 
 		$(".validation_residence_province_check_error").remove(); 
 		$(".validation_residence_province_check_success").remove();
 		$(".validation_residence_barangay").remove(); 
 		$(".validation_residence_barangay_check_error").remove(); 
 		$(".validation_residence_barangay_check_success").remove();
 		$(".validation_mailing_address").remove(); 
 		$(".validation_mailing_address_check_error").remove(); 
 		$(".validation_mailing_address_check_success").remove();
 		$(".validation_mailing_province").remove(); 
 		$(".validation_mailing_province_check_error").remove(); 
 		$(".validation_mailing_province_check_success").remove();
 		$(".validation_mailing_municipality").remove(); 
 		$(".validation_mailing_municipality_check_error").remove(); 
 		$(".validation_mailing_municipality_check_success").remove();
 		$(".validation_mailing_barangay").remove(); 
 		$(".validation_mailing_barangay_check_error").remove(); 
 		$(".validation_mailing_barangay_check_success").remove();
 		$('#residence_address_renewal').css('border-color', '');	
		$('.btn-white-residence_municipality').css('border-color', '');	
		$('.btn-white-residence_province').css('border-color', '');	
		$('.btn-white-residence_barangay').css('border-color', '');	
		$('#mailing_address_renewal').css('border-color', '');
		$('.btn-white-mailing_province').css('border-color', '');
		$('.btn-white-mailing_municipality').css('border-color', '');	
		$('.btn-white-mailing_barangay').css('border-color', '');	
  		$('#residence_address_renewal').val("");
  		$('#mailing_address_renewal').val("");  		
  		$("#chckSameAddress_renewal"). prop("checked", false);
  		jQuery('#residence_province_renewal').selectpicker("refresh"); 
  		jQuery('#residence_municipality_renewal').selectpicker("refresh"); 
  		jQuery('#residence_barangay_renewal').selectpicker("refresh"); 
  		jQuery('#mailing_province_renewal').selectpicker("refresh"); 
  		jQuery('#mailing_municipality_renewal').selectpicker("refresh"); 
  		jQuery('#mailing_barangay_renewal').selectpicker("refresh"); 

  		//4th page clear
		$(".validation_status_other_personal_info").remove(); 
 		$(".validation_status_other_personal_info_check_error").remove(); 
 		$(".validation_status_other_personal_info_check_success").remove();
 		$(".validation_nationality_other_personal_info").remove();
 		$(".validation_nationality_other_personal_info_check_error").remove(); 
 		$(".validation_nationality_other_personal_info_check_success").remove();
 		$(".validation_place_of_birth_other_personal_info").remove();
 		$(".validation_place_of_birth_other_personal_info_check_error").remove(); 
 		$(".validation_place_of_birth_other_personal_info_check_success").remove(); 
 		$(".validation_type_of_id_personal_info").remove(); 
 		$(".validation_type_of_id_personal_info_check_error").remove(); 
 		$(".validation_type_of_id_personal_info_check_success").remove();
 		$(".validation_idno_other_personal_info").remove();
 		$(".validation_idno_other_personal_info_check_error").remove(); 
 		$(".validation_idno_other_personal_info_check_success").remove(); 	
 		$('.btn-white-status_other_personal_info').css('border-color', '');	  
		$('#nationality_other_personal_info_renewal').css('border-color', '');	  
		$('#place_of_birth_other_personal_info_renewal').css('border-color', '');
		$('.btn-white-type_of_id_personal_info').css('border-color', '');
		$('#idno_other_personal_info_renewal').css('border-color', '');	 
  		$('#file-upload_renewal').val("");  		
		$('#upload_Error_renewal').hide();
		$('#upload_file_renewal').hide();
		$('#upload_label_renewal').show();
  		jQuery('#status_other_personal_info_renewal').selectpicker("refresh"); 
  		jQuery('#type_of_id_personal_info_renewal').selectpicker("refresh"); 
  		$('#nationality_other_personal_info_renewal').val("");  		
  		$('#place_of_birth_other_personal_info_renewal').val("");  		
  		$('#idno_other_personal_info_renewal').val("");  

      	if(current_renewal > 1){
		    current_renewal = current_renewal - 6;
		    btnnext.trigger('click');
	    }
        hideButtons(current_renewal);
    });	
    // Add button click action   
    btnAdd.click(function(){ 		
		$('#nextbutton_renewal').css('display','block');
		$("select option").prop("selected", false);

		$('#pop_warning1').css('display','none');
		$('#pop_warning2').css('display','block');
		$('#pop_warning1_PWD').css('display','none');
		$('#pop_warning2_PWD').css('display','block')

		//1st page
		$('input[name=old_id]').val("");
		$('input[name=validation_error_postback]').val("");
		$(".validation_coc_no_validation_info").remove();
 		$(".validation_coc_no_validation_info_check_error").remove(); 
 		$(".validation_coc_no_validation_info_check_success").remove();
 		$(".validation_contact_no_validation_info").remove();
 		$(".validation_contact_no_validation_check_error").remove(); 
 		$(".validation_contact_no_validation_check_success").remove(); 
 		$(".validation_birthdate_validation").remove();
 		$(".validation_birthdate_validation_check_error").remove(); 
 		$(".validation_birthdate_validation_check_success").remove(); 
		$('#coc_no_validation').val("");
		$('#contact_no_validation').val("");
		$('#birthdate_validation').val("");

		//2st page clear
		$(".validation_noofItem_check_error").remove(); 
 		$(".validation_oofItem_check_success").remove(); 
 		$(".validation_unit_personal_info").remove(); 
		$('.btn-white-noofunit').css('border-color', '');
		$('input[name=coverage_complete_renewal]').val("");
  		jQuery('#primbasicval').selectpicker("refresh"); 		
		document.getElementById("basic_renewal").style.background='#C0C0C0';
  		document.getElementById("basic_renewal").style.color ='#000000';
  		document.getElementById("prime_renewal").style.background='#C0C0C0';
  		document.getElementById("prime_renewal").style.color ='#000000'; 
  		document.getElementById("basicprinme_renewal").style.color ='#000000'; 	
  		document.getElementById("basicprinme_renewal").style.background='#C0C0C0';  		
  		document.getElementById('basicprinmepanel_renewal').style.display = 'none';

  		$(".validation_tel_no_info_renewal").remove(); 
 		$(".validation_tel_no_info_check_error_renewal").remove(); 
 		$(".validation_tel_no_info_check_success_renewal").remove();
 		$(".validation_occupation_other_personal_info_renewal").remove(); 
 		$(".validation_occupation_other_personal_info_renewal_check_error").remove(); 
 		$(".validation_occupation_other_personal_info_renewal_check_success").remove();
 		$(".validation_beneficiary_personal_info").remove(); 
 		$(".validation_beneficiary_personal_info_check_error").remove(); 
 		$(".validation_beneficiary_personal_info_check_success").remove();
 		$(".validation_relationship_personal_info").remove(); 
 		$(".validation_relationship_personal_info_check_error").remove(); 
 		$(".validation_relationship_personal_info_check_success").remove();   
		$('.btn-white-occupation_personal_info').css('border-color', '');   
		$('#occupation_other_personal_info_renewal').css('border-color', ''); 
		$('#beneficiary_personal_info').css('border-color', ''); 
		$('#relationship_personal_info').css('border-color', '');
	  	$("#occupation_other_personal_info_renewal").val(""); 
		$('input[name=validation_error_postback]').val("");
		$(".validation_coc_no_validation_info").remove();
 		$(".validation_coc_no_validation_info_check_error").remove(); 
 		$(".validation_coc_no_validation_info_check_success").remove(); 
 		$(".validation_contact_no_validation_info").remove();
 		$(".validation_contact_no_validation_check_error").remove(); 
 		$(".validation_contact_no_validation_check_success").remove(); 
 		$(".validation_birthdate_validation").remove();
 		$(".validation_birthdate_validation_check_error").remove(); 
 		$(".validation_birthdate_validation_check_success").remove()
		$('#coc_no_validation').css('border-color', '');
		$('#contact_no_validation').css('border-color', '');
		$('#birthdate_validation').css('border-color', ''); 
  		//3nd page clear
  		$(".validation_middleName_personal_info").remove();
 		$(".validation_middleName_personal_info_check_error").remove(); 
 		$(".validation_middleName_personal_info_check_success").remove(); 
 		$(".validation_firstName_personal_info").remove(); 
 		$(".validation_firstName_personal_info_check_error").remove(); 
 		$(".validation_firstName_personal_info_check_success").remove();  
 		$(".validation_lastName_personal_info").remove(); 
 		$(".validation_lastName_personal_info_check_error").remove(); 
 		$(".validation_lastName_personal_info_check_success").remove();
 		$(".validation_contactNo_personal_info").remove(); 
 		$(".validation_contactNo_personal_info_check_success").remove(); 
 		$(".validation_contactNo_personal_info_check_error").remove();
 		$(".validation_dateofBirth_personal_info").remove(); 
 		$(".validation_dateofBirth_personal_info_check_error").remove(); 
 		$(".validation_dateofBirth_personal_info_check_success").remove();
 		$(".validation_gender_personal_info").remove(); 
 		$(".validation_gender_personal_info_check_error").remove(); 
 		$(".validation_gender_personal_info_check_success").remove();
 		$(".validation_email_personal_info").remove(); 
 		$(".validation_email_personal_info_check_error").remove(); 
 		$(".validation_email_personal_info_check_success").remove();
 		$(".validation_occupation_personal_info").remove(); 
 		$(".validation_occupation_personal_info_check_error").remove(); 
 		$(".validation_occupation_personal_info_check_success").remove();
 		$('#middleName_personal_info_renewal').css('border-color', '');	
		$('#firstName_personal_info_renewal').css('border-color', '');	    
		$('#lastName_personal_info_renewal').css('border-color', '');	  
		$('#contactNo_personal_info_renewal').css('border-color', '');	
		$('#dateofBirth_personal_info_renewal').css('border-color', '');	  
		$('.btn-white-gender').css('border-color', '');	   
		$('#email_personal_info_renewal').css('border-color', '');	
		$('#email_personal_info_renewal').css('border-color', '');	 
		$('#occupation_personal_info_renewal').css('border-color', '');	   
  		$('#firstName_personal_info_renewal').val("");
  		$('#middleName_personal_info_renewal').val("");
  		$('#lastName_personal_info_renewal').val("");
  		$('#dateofBirth_personal_info_renewal').val("");  		
  		$('#contactNo_personal_info_renewal').val("");
  		$('#email_personal_info_renewal').val("");
  		$('#occupation_personal_inf_renewalo').val("");
  		$(".validation_tel_no_info_renewal").remove(); 
	    $(".validation_tel_no_info_check_error_renewal").remove(); 
	    $(".validation_tel_no_info_check_success_renewal").remove();
 		$('#tel_no_info_renewal').css('border-color', '');
  		$('#tel_no_info_renewal').val("");
		$('#occupation_personal_info_renewal').val("");
		jQuery('#occupation_personal_info_renewal').selectpicker("refresh");		
		$(".validation_beneficiary_personal_info").remove(); 
 		$(".validation_beneficiary_personal_info_check_error").remove(); 
 		$(".validation_beneficiary_personal_info_check_success").remove();
 		$(".validation_relationship_personal_info").remove(); 
 		$(".validation_relationship_personal_info_check_error").remove(); 
 		$(".validation_relationship_personal_info_check_success").remove(); 
		$('#beneficiary_personal_info').val("");
		$('#relationship_personal_info').val("");
  		jQuery('#gender_personal_info_renewal').selectpicker("refresh"); 

  		////4rd page clear
		$(".validation_residence_address").remove(); 
 		$(".validation_residence_address_check_error").remove(); 
 		$(".validation_residence_address_check_success").remove();
 		$(".validation_residence_municipality").remove(); 
 		$(".validation_residence_municipality_check_error").remove(); 
 		$(".validation_residence_municipality_check_success").remove();
 		$(".validation_residence_province").remove(); 
 		$(".validation_residence_province_check_error").remove(); 
 		$(".validation_residence_province_check_success").remove();
 		$(".validation_residence_barangay").remove(); 
 		$(".validation_residence_barangay_check_error").remove(); 
 		$(".validation_residence_barangay_check_success").remove();
 		$(".validation_mailing_address").remove(); 
 		$(".validation_mailing_address_check_error").remove(); 
 		$(".validation_mailing_address_check_success").remove();
 		$(".validation_mailing_province").remove(); 
 		$(".validation_mailing_province_check_error").remove(); 
 		$(".validation_mailing_province_check_success").remove();
 		$(".validation_mailing_municipality").remove(); 
 		$(".validation_mailing_municipality_check_error").remove(); 
 		$(".validation_mailing_municipality_check_success").remove();
 		$(".validation_mailing_barangay").remove(); 
 		$(".validation_mailing_barangay_check_error").remove(); 
 		$(".validation_mailing_barangay_check_success").remove();
 		$('#residence_address_renewal').css('border-color', '');	
		$('.btn-white-residence_municipality').css('border-color', '');	
		$('.btn-white-residence_province').css('border-color', '');	
		$('.btn-white-residence_barangay').css('border-color', '');	
		$('#mailing_address_renewal').css('border-color', '');
		$('.btn-white-mailing_province').css('border-color', '');
		$('.btn-white-mailing_municipality').css('border-color', '');	
		$('.btn-white-mailing_barangay').css('border-color', '');	
  		$('#residence_address_renewal').val("");
  		$('#mailing_address_renewal').val("");  		
  		$("#chckSameAddress_renewal"). prop("checked", false);
  		jQuery('#residence_province_renewal').selectpicker("refresh"); 
  		jQuery('#residence_municipality_renewal').selectpicker("refresh"); 
  		jQuery('#residence_barangay_renewal').selectpicker("refresh"); 
  		jQuery('#mailing_province_renewal').selectpicker("refresh"); 
  		jQuery('#mailing_municipality_renewal').selectpicker("refresh"); 
  		jQuery('#mailing_barangay_renewal').selectpicker("refresh"); 

  		//5th page clear
		$(".validation_status_other_personal_info").remove(); 
 		$(".validation_status_other_personal_info_check_error").remove(); 
 		$(".validation_status_other_personal_info_check_success").remove();
 		$(".validation_nationality_other_personal_info").remove();
 		$(".validation_nationality_other_personal_info_check_error").remove(); 
 		$(".validation_nationality_other_personal_info_check_success").remove();
 		$(".validation_place_of_birth_other_personal_info").remove();
 		$(".validation_place_of_birth_other_personal_info_check_error").remove(); 
 		$(".validation_place_of_birth_other_personal_info_check_success").remove(); 
 		$(".validation_type_of_id_personal_info").remove(); 
 		$(".validation_type_of_id_personal_info_check_error").remove(); 
 		$(".validation_type_of_id_personal_info_check_success").remove();
 		$(".validation_idno_other_personal_info").remove();
 		$(".validation_idno_other_personal_info_check_error").remove(); 
 		$(".validation_idno_other_personal_info_check_success").remove(); 	
 		$('.btn-white-status_other_personal_info').css('border-color', '');	  
		$('#nationality_other_personal_info_renewal').css('border-color', '');	  
		$('#place_of_birth_other_personal_info_renewal').css('border-color', '');
		$('.btn-white-type_of_id_personal_info').css('border-color', '');
		$('#idno_other_personal_info_renewal').css('border-color', '');	 
  		$('#file-upload_renewal').val("");  		
		$('#upload_Error_renewal').hide();
		$('#upload_file_renewal').hide();
		$('#upload_label_renewal').show();
  		jQuery('#status_other_personal_info_renewal').selectpicker("refresh"); 
  		jQuery('#type_of_id_personal_info_renewal').selectpicker("refresh"); 
  		$('#nationality_other_personal_info_renewal').val("");  		
  		$('#place_of_birth_other_personal_info_renewal').val("");  		
  		$('#idno_other_personal_info_renewal').val(""); 
		
      	if(current_renewal > 1){
		    current_renewal = current_renewal - 7;
		    btnnext.trigger('click');
	    }
        hideButtons(current_renewal);
    });	
   
  	// Back button click action 	
  	btnback.click(function(){ 	
		if(current_renewal == 5){
		  	$('#nextbutton_renewal').css('display','block');
		}	
      	if(current_renewal > 1){
		    current_renewal = current_renewal - 2;
		    btnnext.trigger('click');
	    }
        hideButtons(current_renewal);
    });		
});

// Change progress bar action
setProgress = function(currstep){
	var percent = parseFloat(100 / widget.length) * currstep;
	percent = percent.toFixed();
	$(".progress-bar")
        .css("width",percent+"%");
        // .html(percent+"%");		
}

// Hide buttons according to the current_renewal step
hideButtons = function(current_renewal){
	var limit = parseInt(widget.length); 

	$(".action").hide();

	if(current_renewal < limit) btnnext.show(); 	
  	if(current_renewal > 1) {btnback.show();
  		if(current_renewal == 3){
  			btnnext.hide();
  			btnNextPage.show();
  		}else if (current == 6){
  			btnnext.hide();
  		}else{
  			btnnext.show();
  		}
  	}
	if(current_renewal == limit) { btnnext.hide(); btnsubmit.show(); btnAdd.show(); btnback.hide(); }
}

 function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}
</script><style type="text/css">

.progress {
  height: 5px;
  
}
.progress-bar {
background: -webkit-linear-gradient(left, #53b947 0%,#53b947 100%); 
opacity: 0.8;

}
</style>
<script type="text/javascript">

</script>
<style type="text/css"> 
	
	.linkbutton {
	  background: none!important;
	  border: none;
	  padding: 0!important;
	  /*optional*/
	  font-family: arial, sans-serif;
	  /*input has OS specific font-family*/
	  color: #069;
	  text-decoration: underline;
	  cursor: pointer;
	  float: left;
	}



</style>
<style type="text/css">
	
</style>

