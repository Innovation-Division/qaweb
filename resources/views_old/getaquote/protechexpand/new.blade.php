
<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>

@include('getaquote.protechexpand.modal_protech')

      <input type="hidden" name="url" name="url" value="{{url('/')}}">       
      <input type="hidden" name="typeofdevicemain" id="typeofdevicemain" value="{{ $typeofdevice }}">
      <input type="hidden" name="linkurl" id="linkurl" value="{{ $link }}">
      <input type="hidden" name="coverage_complete" name="coverage_complete" value="">
      <input type="hidden" name="check_agent" name="check_agent" value="">
      <input type="hidden" name="personal_info_complete" name="personal_info_complete" value="">
      <input type="hidden" name="pwd_stat" name="pwd_stat" value="">
      <input type="hidden" name="pwd_stat_save" name="pwd_stat_save" value="">
      
        <div class="modal fade" id="max_amount_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" style="margin-top: 10%">
                    <div class="modal-dialog">
                     <div class="modal-content">
                     <div class="modal-header">
                        <h1 style="color: #006969;font-weight: bold;margin-bottom: -10px;text-align: left;">Notice</h1>
                          <button type="button" class="close" data-dismiss="modal" style="color: green;margin-top: -5px;">&times;</button>
                         
                    </div>
                     
                        <div class="modal-body">
                        <div class="form-group">
                          <div class="input-group">
                            <label style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;font-weight: bold;">Disclaimer: Please note that our limit of liability is based on the maximum coverage of the package you purchased subject to the standard terms and conditions of the policy..</label>
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


      </div>




<div class="container">
	<div class="row">
        <div class="col-md-12">
    	 <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" name="coverage_complete" name="coverage_complete" value="">
        <input type="hidden" name="check_agent" name="check_agent" value="">
        <input type="hidden" name="personal_info_complete" name="personal_info_complete" value="">
        <input type="hidden" name="pwd_stat" name="pwd_stat" value="">
        <input type="hidden" name="pwd_stat_save" name="pwd_stat_save" value="">
	  	<div class="progress"  class="col-md-12">
	    	<div class="progress-bar" style="max-height: 4px !important;"></div>
	  	</div>
        <button class="action back linkbutton"><< Back</button>
		<button class="action back6th  linkbutton"><< Back</button>
  		<br><br>
 

  	<form method="post"  enctype="multipart/form-data" id='submitForm' novalidate>
		<div class="step" style="background-color: #f5f5f5 !important;text-align: left;">
			@include('getaquote.protechexpand.firstpage')
		</div>
        <div class="step" style="text-align: left;">
        	@include('getaquote.protechexpand.secondpage')
        </div>
        <div class="step" style="text-align: left;">
        	@include('getaquote.protechexpand.thirdpage')
        </div>

        <div class="step" style="text-align: left;">
        	@include('getaquote.protechexpand.fourthpage')    		
        </div>
        <div class="step"  style="text-align: left;">
        	@include('getaquote.protechexpand.additional')
        </div>
 
       
        	{{ csrf_field() }}
	        <div class="step" style="text-align: left;">
	        	@include('getaquote.protechexpand.sixthpage')
	        </div>
		</form>
        <div class="col-md-12" style="text-align: left;">
        	<br><br>
        	<div id="nextbutton" name="nextbutton">
        		<button  id="next" name="next" type="button"  class="action next btn btn-default" style="min-width: 267px;min-height: 60px;color: #ffffff;margin-bottom: 180px;background-color: #008080">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
         	</div>      
        </div>
           
        </div>
	</div>
</div>

<style>
.palceholdermod::placeholder {
  opacity: 0.7; /* Firefox */
   font-style: italic;
   font-size: 15px;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  opacity: 0.7;
   font-style: italic;
   font-size: 15px;
}

::-ms-input-placeholder { /* Microsoft Edge */
  opacity: 0.7;
   font-style: italic;
   font-size: 15px;
}
.current{
  background-color:#188c8c !important;
}
</style>

<script type="text/javascript">
  $('#registersuccess').hide();
  $("#overlay").hide();　
  jQuery('#submitForm').submit(function(e) {
    e.preventDefault();
    $("#overlay").hide();　
    $(".back6").hide();
    $(this).find("button[type='submit']").prop('disabled',true);
    let formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ route('protechExpand.saveprotech') }}",
      data: formData,
      contentType: false,
      processData: false,
      success: (response) => {
        current = 0;
        jQuery(".back6").hide();　
        jQuery(".back6th").hide();　
        jQuery("#overlay").show();
        setTimeout(function() {
          $("#overlay").hide();　
      jQuery('#registersuccess').modal("show"); //checked
    }, 2000);

      },
      error: function(response){
        console.log('wwww.cocogen.com');
      }
    });
  });
</script>