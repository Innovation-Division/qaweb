    <style type="text/css">
           

      #BlockUIConfirm {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);

      }
 
	#summaryfinalpage th, #summaryfinalpage2 th{
		  border-left: 0px;
		  padding: 10px 30px;
		  background-color: #008080;
		  color: #FFF; 
		  border-radius: 0px;
		  height: 65px;
		  border-bottom: 3px solid #ffffff;
		  text-align: center;

	}

	#summaryfinalpage tbody td, #summaryfinalpage2 tbody td{
		  border-left: 0px;
		  padding: 10px 30px;
		  background-color: #ffffff;
		  color: #000000; 
		  border-radius: 0px;
		  height: 65px;
		  border-bottom: 3px solid #ffffff;
		  text-align: center;

	}

	#summaryfinalpage tfoot td, #summaryfinalpage2 tfoot td{
		  border-left: 0px;
		  border-bottom: 3px solid #ffffff;
		  padding: 10px 30px;
		  background-color: #bfdfde;
		  color: #000000; 
		  border-radius: 0px;
		  height: 65px;
	}
	#labelColor{
		color: #188c8c;
			font-weight: normal !important;
	}
	.valueDisplay{
		font-weight: bold !important;
		font-size:20px !important;
	}
	
	.cv-spinner {
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;  
	}
	.spinner {
		width: 40px;
		height: 40px;
		border: 4px #ddd solid;
		border-top: 4px #2e93e6 solid;
		border-radius: 50%;
		animation: sp-anime 0.8s infinite linear;
	}
	@keyframes sp-anime {
		100% { 
			transform: rotate(360deg); 
		}
	}
	.is-hide{
		display:none;
	}
</style>
<button type='button' class="action back6 linkbutton"><< Back</button><br>

<div class="laptopDevice">
		<div class="col-md-12">
				<div class="col-md-12 break-two"> <br> </div> 	
				<h1  style="color: #000000"> Personal Data</h1>   
				<label for="firstName_personal_info" id='labelColor'>Name</label><br>
				<label id="firstandlast_final" name="firstandlast_final"  class='valueDisplay'></label>
			</div>
			<div class="col-md-12 break-two"><br></div>  
			<div class="col-md-4" style="width: 200px">
				<label for="contactNo_personal_info" id='labelColor'>Mobile No.</label><br>
				<label id="contactno_final" name="contactno_final"  class='valueDisplay'></label>
			</div>      
			<div class="col-md-4">
				<label for="email_personal_info" id='labelColor'>Email Address</label><br>
				<label id="email_final" name="email_final"  class='valueDisplay'></label>
			</div>
		<div class="col-md-12 break-two"> <br> </div> 	
		<div class="col-md-12 break-two"> <br> </div> 	
		<div class="col-md-12"><label for="address"  id='labelColor'> Present Address</label> <br>
		<label id="presentaddress_final" name="presentaddress_final"  class='valueDisplay'>  </label>
		</div>
		 	<div class="col-md-12 break-two"> <br> </div> 	 
		 	 	<div class="col-md-12 break-two"> <br> </div> 	
			<div class="col-md-4">
				<h1 style="color: #000000"> Device Information</h1>
				<label for="typeofdevice" id='labelColor'>Type of Device</label><br>
				<label id="typeofdevice" name="typeofdevice"  class='valueDisplay'></label>
			</div>
		<div class="col-md-12 break-two"> <br> </div> 	
		<div class="col-md-12 break-two"> <br> </div> 	 
		<div class="col-md-4">
				<label for="make" id='labelColor'>Make</label><br>
				<label id="make_final" name="make_final"  class='valueDisplay'></label>
			</div>
			<div class="col-md-4">
				<label for="model" id='labelColor'>Model</label><br>
				<label id="model_final" name="model_final"  class='valueDisplay'></label>
			</div>
			<div class="col-md-4">
				<label for="serial" id='labelColor'>Serial No</label><br>
				<label id="serial_final" name="serial_final"  class='valueDisplay'> </label>
			</div>
			<div class="col-md-12 break-two"> <br> </div> 
			<div class="col-md-12 break-two"> <br> </div> 
		<div class="col-md-4">
				<label for="year" id='labelColor'>Year Purchased</label><br>
				<label id="year_final" name="year_final"  class='valueDisplay'> </label>
			</div>
			<div class="col-md-4">
				<label for="value" id='labelColor' >Value</label><br>
				<label id="value_final" name="value_final"  class='valueDisplay'></label> 
			</div>
	 	<div class="col-md-12 break-two"> <br> </div> 	 
		<div class="col-md-12 break-two"> <br> </div> 	 
		<div class="col-md-12 break-two"> <br> </div> 	 
		<div class="col-md-12 break-two"> <br> </div> 	 
	<div class="col-md-4"><br></div>
	 <div class="col-md-4" style="text-align: center;">
	 	<input class="submit btn btn-default form-control"  type="submit" name="submit" value='Confirm' style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;"> 
	</div>
</div>


<div class='desktopDevice' id='desktopDevice'>
	<div class="col-md-12">
			<div class="col-md-12 break-two"> <br> </div> 	
			<h1  style="color: #000000;font-weight: bold"> Personal Data</h1>   
			<label for="firstName_personal_info" id='labelColor'>Name</label><br>
			<label id="firstandlast_final_desktop" name="firstandlast_final"  class='valueDisplay'></label>
		</div>
		<div class="col-md-12 break-two"><br></div>  
		<div class="col-md-4">
			<label for="contactNo_personal_info" id='labelColor'>Mobile No.</label><br>
			<label id="contactno_final_desktop" name="contactno_final"  class='valueDisplay'></label>
		</div>      
		<div class="col-md-4">
			<label for="email_personal_info" id='labelColor'>Email Address</label><br>
			<label id="email_final_desktop" name="email_final"  class='valueDisplay'></label>
		</div>
 	 
	<div class="col-md-12 break-two"> <br> </div> 	
		<div class="col-md-12 break-two"> <br> </div> 	
	<div class="col-md-12"><label for="address"  id='labelColor'> Present Address</label> <br>
	<label id="presentaddress_final_desktop" name="presentaddress_final"  class='valueDisplay'>  </label>
	</div>
	 	<div class="col-md-12 break-two"> <br> </div> 	 
	 	 	<div class="col-md-12 break-two"> <br> </div> 	

 
		<div class="col-md-4">
			 <h1  style="color: #000000;font-weight: bold">  Device Information</h1>  
			<label for="typeofdevice" id='labelColor'>Type of Device</label><br>
			<label id="typeofdevice_desktop" name="typeofdevice"  id='labelColor'  class='valueDisplay'>
		</div>
	<div class="col-md-12 break-two"> <br> </div> 	
	<div class="col-md-12 break-two"> <br> </div> 	 
	<div class="col-md-12">
		<label for="address" id='labelColor'> Location of Device</label><br>

		<label id="location_final_desktop" name="location_final"  id='labelColor'  class='valueDisplay'></label></div>

	<div class="col-md-12 break-two"> <br> </div> 
	 <div class="col-md-12 break-two"> <br> </div> 	
	 <div class="col-md-4">
	 	<label for="address " id='labelColor'> Device Specifications</label>
	 </div>
	<div class="col-md-12 break-two"> <br> </div> 
	<div class="col-md-12 break-two"> <br> </div> 
           <input type="hidden" name="psrt_access_year_list" id='psrt_access_year_list' class='psrt_access_year_list'>
	<div class="col-md-12" style="text-align: left;">
		<table id="summaryfinalpage" class="table-striped">

			<thead>
				<th>Hardware</th>
				<th>Make</th>
				<th>Model</th>
				<th>SerialNo.</th>
				<th>Year Purchased</th>
				<th>Value</th>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="col-md-12" style="text-align: left;">

		<table id="summaryfinalpage2" class="table-striped">
			<thead>
				<th>Parts</th>
				<th>Make</th>
				<th>Model</th>
				<th>SerialNo.</th>
				<th>Year Purchased</th>
				<th>Value</th>
			</thead>
			<tbody>
			</tbody style='text-align: center'>
		</table>
	</div>

	<div class="col-md-4" style="text-align: left;"><br></div>
	<div class="col-md-4" style="text-align: center;">
		<input class="submit btn btn-default form-control"  type="submit" name="submit" value='Confirm' style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;"> 
	</div>   
</div>

 
		<!--
      <div id="overlay" class="overlay">
        <div class="cv-spinner">
     				<span class="spinner"></span>
     			</div>
      </div>-->
 
 


 <div id="registersuccess" class="registersuccess">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody">
        <div class="confirm-header row-dialog-hdr" style="border-top: 7px solid #008080;">        
        </div>
        <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
          <table>
            <tbody><tr>
              <td></td>
              <td>
                <label style="margin-left:20px;margin-bottom:35px;margin-top:10px;margin-right:35px;line-height: 20px;">Registration Successful!</label>
                <p style="padding-left:20px">Your device is now insured. The Policy Schedule/Confirmation of Cover was sent to your registered email address.</p>
              </td>
            </tr>
          </tbody></table>
        </div>
        <div class="col-md-4"><br></div>
        <div class="col-md-4" style="text-align: center;">
          <button type="button" onclick="window.location='{{ url("/epolicy") }}'" class="btn btn-primary" data-dismiss="modal" style="background-color:#008080">Ok</button>

        </div>
      </div>
     </div>
 
</div>
</div>
 