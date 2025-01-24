<?php
if(empty($agentID)){
  $agentID = "";
}

if(empty($agentName)){
  $agentName = "";
}
?>
<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>

@include('getaquote.protech.modal_protech')
<div class="modal fade modal-light" id="max_amount_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  text-center">
        <h4 class="modal-title heading-border rfs-1-12 rfs-md-1-3" id="exclusionslimitations">Notice</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <!--  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right">&times;</button> -->
        <div class="form-group text-center">
          <label for="chckcovid">Premium exceed allowable amount. For more information, you may reach us at (02) 8830-6000 or client_services@cocogen.com.</label>
        </div>
      </div>
      <div class="modal-footer text-center">    
        <div id="pop_warning1">
          <button type="button" id="btn_back_to_home" name="btn_back_to_home" onclick="window.location='{{ url("get-quote/pro-tech-insurance") }}'" class="btn btn-secondary" >Back to Home</button>
        </div>
      </div>
    </div>
  </div>
</div> 

<div id="BlockUIConfirm" class="BlockUIConfirm confirm-modal">
  <div class="blockui-mask"></div>
  <div class="RowDialogBody p-4 px-5">
    <div class="confirm-header row-dialog-hdr"></div>
    <div class="confirm-body row-dialog-hdr-success">
      <table>
        <tr>
          <td>
              <p class="rfs-1-5 rfs-md-1 fw-normal text-center">This website will only quote for computer devices up to 3 years of age. Please contact our Client Services if your device is older than this requirement.</p>
          </td>
        </tr>
      </table>
    </div>
    <div class="confirm-btn-panel mt-4">
      <div class="btn-holder text-center">
        <button type="button" id="btnConfirmpro" name="btnConfirmpro" class="btn btn-secondary">Proceed</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">  
$("#btnConfirmpro").click(function () {
  jQuery('#BlockUIConfirm').hide();
});
</script>

<div class="container_">
	<div class="row_ b5form">
    <div class="col-md-12_">
      <input type="hidden" name="url" name="url" value="{{url('/')}}">       
      <input type="hidden" name="coverage_complete" name="coverage_complete" value="">
      <input type="hidden" name="check_agent" name="check_agent" value="">
      <input type="hidden" name="personal_info_complete" name="personal_info_complete" value="">
      <input type="hidden" name="pwd_stat" name="pwd_stat" value="">
      <input type="hidden" name="pwd_stat_save" name="pwd_stat_save" value="">
	  	
      <div><button class="mb-5 action back linkbutton btn btn-secondary-light" style="display: none; min-width: auto;">< Back</button></div>
      <div><button class="mb-5 action back6th linkbutton btn btn-secondary-light" style="display: none; min-width: auto;">< Back</button></div>
  		
      <form method="post" action="{{ route('protechsave') }}" enctype="multipart/form-data">
      <input type="hidden" id="agentID" name="agentID" value="{{$agentID}}">       
      <input type="hidden" id="agentName" name="agentName" value="{{$agentName}}">   
      <div class="step">
          @include('getaquote.protech.firstpage')
        </div>
        <div class="step">
        @include('getaquote.protech.secondpage')  
        </div>
        <div class="step">
        	@include('getaquote.protech.thirdpage')
        </div>

        <div class="step">
        	@include('getaquote.protech.fourthpage')
        </div>
        <div class="step">
        	@include('getaquote.protech.fifthpage')
        </div>
       
        {{ csrf_field() }}
        <div class="step">
          @include('getaquote.protech.sixthpage')
        </div>
		  </form>
      <div class="col-md-12_">
        <div id="nextbutton" name="nextbutton" class="text-center mt-5">
          <button  id="next" name="next" type="button" class="action next btn btn-secondary">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
        </div>      
      </div>
      <div class="progress mt-5 p-0">
        <div class="progress-bar"></div>
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
</style>
<script>
  if('{{$agentID}}' != null){
    $('#agent_id').val('{{$agentID}}');
    $("#agent_id").prop("disabled", true); 
  }
</script>

