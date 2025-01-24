<button type="button" class="back2 linkbutton"><< Back</button><br>
<div class="col-md-12 break-two">
	  <br>
	</div>
<div class='laptopDevice'>

		<div class="col-md-12 break-two">
	  <br>
	</div>
	<div class="col-md-2" style="text-align: left;">
	  <h2>Type of Device</h2>
	  <input type="text" name="type_of_device" id='type_of_device' class='form-control col-md-4 selectpicker address_mobile input-lg' value="LAPTOP" readonly style="background-color: white;">
	</div>
	<div class="col-md-12 break-two">
	  <br>
	</div>
	<div class="col-md-3">
	  <label for="mailing_address"> Make</label><br><br>
	  <input type="text" name="make_device" id='make_device' class='form-control selectpicker address_mobile input-lg personal_ifno_mobile'>
	  </div>  
	  <div class="col-md-3">
	  <label for="mailing_address"> Model</label><br><br>
	    <input type="text" name="model_device" id='model_device' class="form-control selectpicker address_mobile input-lg personal_ifno_mobile model_device">
	  </div>
	  <div class="col-md-3">
	  <label for="mailing_address"> Serial No.</label><br><br>
	    <input type="text" name="serial_device"  id='serial_device' class="form-control  selectpicker address_mobile input-lg serial_device">
	  </div>
	<div class="col-md-12 break-two"> <br></div>
		<div class="col-md-12 break-two"> <br></div>
		  <div class="col-md-3">
	  <label for="mailing_address"> Year Purchased</label><br><br>
	   
	     <select id="year_device" name="year_device" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year year_device" data-size="10"  data-live-search="true" >
                @foreach($years as $year)
                  <option value="{{$year}}">{{$year}}</option>            
                @endforeach
             </select>
	  </div>
	    <div class="col-md-3">
	  <label for="mailing_address"> Value</label><br><br>
	    <input type="text" name="value_device" id='value_device' class="form-control selectpicker address_mobile input-lg value_device"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0.00" > 
	  </div>
	   <div id="div_view_4thpage" class="col-md-4" style="padding-top: 19px;">
      <button  id="view_4thpage" name="view_4thpage" type="button"  class="col-md-4 view_4thpage btn btn-default form-control" style="min-width: 150px;min-height: 60px; margin-top: 0ssspx;margin-left: 8px;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>   
    </div>
    	<div class="col-md-12 break-two"> <br> </div> 	 
    		<div class="col-md-12 break-two"> <br> </div> 	 

</div>


<div class='desktopDevice'>
	<div class="col-md-2" style="text-align: left;">
			<div class="col-md-12 break-two">
	  <br>
	</div>
	  <h2>Type of Device</h2>
	   <input type="text" name="type_of_device"  id='type_of_device' class='form-control col-md-4 selectpicker address_mobile input-lg' value="DESKTOP" readonly style="background-color: white;">
	</div>
	<div class="col-md-12 break-two">
	  <br>
	</div>
	<div class="col-md-12">
	  <label for="mailing_address"> Location of Device</label>
	  <br>
	  <br>
	  <input type="checkbox" style="margin-top: -10px;" id="chckSameAddressLocation" name="chckSameAddressLocation" value="1">
	  <label for="chckSameAddressLocation">Same as Present Address </label>
	  <input name="device_address" id="device_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street">
	</div>
	<div class="col-md-12 break-two">
	  <br>
	</div>
	<div class="col-md-4 ">
	  <select id="device_province" name="device_province" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_province" data-size="10" data-live-search="true">
	    <option value="">- Select Province -</option>
	  </select>
	</div>
	<div class="col-md-4 ">
	  <select id="device_municipality" name="device_municipality" class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-device_municipality" data-size="10" data-live-search="true">
	    <option value="">- Select City/Municipality -</option>
	  </select>
	</div>
	<div class="col-md-4 ">
	  <select id="device_barangay" name="device_barangay" class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-device_barangay" data-size="10" data-live-search="true">
	    <option value="">- Select Barangay-</option>
	  </select>
	</div>
	<div class="col-md-12 break-two">
	  <br>
	</div>
	<input type="hidden" name="device_modified_value" id='device_modified_value' class='device_modified_value'>
	<div class="col-md-12">
	  <h2>Is your device custom or modified?</h2>
			<table class='responsive col-md-2'>
			  <tr>
			    <td>
			    	 <button id="next_yes" name="next" type="button" class="next_yes btn btn-default device_loc_type_modified device_modified_yes" style="min-height: 60px;min-width: 80px;color: #ffffff;background-color: #008080;">Yes &nbsp;&nbsp; 
				    </button>
				</td>
			    <td>
			     <button id="next_no" name="next" type="button" class="next_no btn btn-default device_loc_type_modified device_modified_no" style="min-height: 60px;min-width: 80px;color: #ffffff;background-color: #008080">No &nbsp;&nbsp;
				    </button>
				</td>
			  </tr>
			</table>
	</div>
	<div class="col-md-12 break-two">
	  <br>
	</div>
</div>
   <div class="modal fade laptopMaxAmount" id="laptopMaxAmount" data-backdrop="static" data-keyboard="false" tabindex="-1" style="margin-top: 10%">
                    <div class="modal-dialog">
                     <div class="modal-content">
                     <div class="modal-header">
                        <h1 style="color: #006969;font-weight: bold;margin-bottom: -10px;text-align: left;">Notice</h1>
                          <button type="button" class="close" data-dismiss="modal" style="color: green;margin-top: -5px;">&times;</button>
                         
                    </div>
                     
                        <div class="modal-body">
                        <div class="form-group">
                          <div class="input-group">
                            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;font-weight: bold;">Amount must not be 0</label>
                          </div>
                        </div>
                      </div>
                       <div class="modal-footer" style="text-align: center">    
                        <div id="pop_warning1">&nbsp;&nbsp;
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                        </div>
                      
                     </div>
                    </div>
                  </div> 