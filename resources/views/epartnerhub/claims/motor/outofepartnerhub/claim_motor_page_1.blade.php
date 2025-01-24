
<script>
$.fn.removeFormControlFeedback = function() {
		if ($(this).closest('.form-group').find('.form-control-feedback').length) {
			$(this).closest('.form-group').find('.form-control-feedback').remove();
		}
	};
	$.fn.fieldDefaultState = function() {
		$(this).closest('.form-group').removeClass('has-success has-error has-feedback');
		$(this).removeFormControlFeedback();
	};
	$.fn.fieldErrorState = function() {
		$(this).closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
		$(this).removeFormControlFeedback();
		$(this).after('<span class="form-control-feedback fa fa-times-circle" aria-hidden="true" style="margin-top:12px;margin-right:10px;z-index:0;"></span>');
	};
	$.fn.fieldSuccessState = function() {
		$(this).closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
		$(this).removeFormControlFeedback();
		$(this).after('<span class="form-control-feedback fa fa-check-circle" aria-hidden="true" style="margin-top:12px;margin-right:10px;z-index:0;"></span>');
	};
$( document ).ready(function() {
    $('#policyNo').on('input', function() {

        



        var textPolicy = $('#policyNo').val().length;
        if(textPolicy == 2){
            var textPolicyText = $('#policyNo').val().toUpperCase();;
            if(textPolicyText == "MC"){
                $('#policyNo').val(textPolicyText+ "-");
            }else{
                $('#policyNo').val("");
            }
           
        }

        if(textPolicy == 6){
            var textPolicyText = $('#policyNo').val().toUpperCase();
            $('#policyNo').val(textPolicyText+ "-");
        }
        if(textPolicy == 9){
            var textPolicyText = $('#policyNo').val().toUpperCase();
            $('#policyNo').val(textPolicyText+ "-");
        }

        if(textPolicy == 12){
            var textPolicyText = $('#policyNo').val().toUpperCase();
            $('#policyNo').val(textPolicyText+ "-");
        }

        if(textPolicy == 20){
            var textPolicyText = $('#policyNo').val().toUpperCase();
            $('#policyNo').val(textPolicyText+ "-");
        }

      
        

        // if(textPolicy == 23){
        //     var textPolicyText = $('#policyNo').val().toUpperCase();
        //     $('#policyNo').val(textPolicyText);
        // }
        
        // do something
    });
    $("#policyNo").change(function(){
            var textPolicyTextFull = $('#policyNo').val().toUpperCase();;
            var str =textPolicyTextFull;
            var arr = str.split("-");
            var fullPolicfy = arr[0] + "-"+ arr[1] + "-"+ arr[2]+ "-"+ arr[3]+ "-"+ pad(arr[4], 7)+ "-"+ pad(arr[5], 2);
            $('#policyNo').val(fullPolicfy);
            var textPolicyCount = $('#policyNo').val().length;


            var textPolicyText = $('#policyNo').val().toUpperCase();;
            var str =textPolicyText;
            var arr = str.split("-");
           
            
            $(".validation_policyNo").remove();
            $('#policyNo').fieldDefaultState();
            var errorCount = 0;
            var errorMessage = "";
            if(arr[0].length != 2){
                errorCount = 1;
            }else{
                if(arr[0] == "MC"){
                }else{
                    errorCount = 1;
                }
            }

            if(arr[1].length != 3){
                errorCount = 1;
            }

            if(arr[2].length != 2){
                errorCount = 1;
            }
            var gfg = $.isNumeric(arr[3]);
            if(gfg){
            }else{
                errorCount = 1;
            }
            if(arr[3].length != 2){
                errorCount = 1;
            }

            if(arr[4].length != 7){
                errorCount = 1;
            }

            if(arr[5].length != 2){
                errorCount = 1;
            }
            var gfg5 = $.isNumeric(arr[5]);
            if(gfg5){
            }else{
               errorCount = 1;
            }

            
            if(textPolicyCount == 23){
               
            }else{
               errorCount = 1;
            }
            if(errorCount == 1){
                $("#policyNo").after("<div class='validation_policyNo v-error-msg'>Invalid Format!</div>");    
                $('#policyNo').fieldErrorState();
            }
    }); 

    function pad (str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }

});
</script>
<div class="col-md-12 form-group" >
    <div class="col-md-8 col-md-offset-4">
        <h6 style="font-size:75px !important;">File New Claims</h6>
    </div>
</div>
<div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4">
            <label>Enter Your Policy No. </label>
            <input id="policyNo" name="policyNo" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4">
            <h6>Claim Information</h6>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <div class="col-md-4 form-group">
            <label>Driver </label>
            <input id="driver" name="driver" type="text" class="form-control input-lg" maxlength="100" value="{{ old('driver') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Relationship to the insured </label>
            <input id="relationship_motor" name="relationship_motor" type="text" class="form-control input-lg" maxlength="100" value="{{ old('relationship_motor') }}">
        </div>
        <div class="col-md-4"></div>        
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4 form-group">
            <label>Date of Loss  </label>
            <input id="Loss_date" name="Loss_date" type="text" class="form-control input-lg readonly" readonly maxlength="100" value="{{ old('Loss_date') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time" name="Loss_time" type="text" class="form-control input-lg time-pickable readonly" readonly maxlength="100" value="{{ old('Loss_time') }}">
            
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-12">
            <label>Location of Loss</label>
            <textarea  id="location_loss" name="location_loss" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss') }}</textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>

