<div class="col-md-12 form-group" >
    <div class="col-md-8 col-md-offset-4">
        <h6 style="font-size:75px !important;">File New Claims</h6>
    </div>
</div>
<div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Enter Your Policy No. </label>
            <input id="policyNo_pa" name="policyNo_pa" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo_pa') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4">
            <h6>Claim Information</h6>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Date of Loss  </label>
            <input id="Loss_date_pa_not" name="Loss_date_pa_not" type="text" class="form-control input-lg readonly " readonly maxlength="100" value="{{ old('Loss_date_pa_not') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time_pa" name="Loss_time_pa" type="text" class="form-control input-lg time-pickable readonly" readonly maxlength="100" value="{{ old('Loss_time_pa') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>Where the accident happened?</label>
            <textarea  id="location_loss_pa" name="location_loss_pa" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss_pa') }}</textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Contact No.</label>
            <input id="contact_no_pa" name="contact_no_pa" type="text" class="form-control input-lg" maxlength="100" value="{{ old('contact_no_pa') }}" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        </div>
        <div class="col-md-4 form-group">
            <label>Email Address</label>
            <input id="email_address_pa" name="email_address_pa" type="text" class="form-control input-lg" maxlength="100" value="{{ old('email_address_pa') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>

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
    $('#policyNo_pa').on('input', function() {

        



        var textPolicy = $('#policyNo_pa').val().length;
        if(textPolicy == 2){
            var textPolicyText = $('#policyNo_pa').val().toUpperCase();;
            if(textPolicyText == "PA"){
                $('#policyNo_pa').val(textPolicyText+ "-");
            }else{
                $('#policyNo_pa').val("");
            }
           
        }

        if(textPolicy == 6){
            var textPolicyText = $('#policyNo_pa').val().toUpperCase();
            $('#policyNo_pa').val(textPolicyText+ "-");
        }
        if(textPolicy == 9){
            var textPolicyText = $('#policyNo_pa').val().toUpperCase();
            $('#policyNo_pa').val(textPolicyText+ "-");
        }

        if(textPolicy == 12){
            var textPolicyText = $('#policyNo_pa').val().toUpperCase();
            $('#policyNo_pa').val(textPolicyText+ "-");
        }

        if(textPolicy == 20){
            var textPolicyText = $('#policyNo_pa').val().toUpperCase();
            $('#policyNo_pa').val(textPolicyText+ "-");
        }

      
        

        // if(textPolicy == 23){
        //     var textPolicyText = $('#policyNo_pa').val().toUpperCase();
        //     $('#policyNo_pa').val(textPolicyText);
        // }
        
        // do something
    });
    $("#policyNo_pa").change(function(){
            var textPolicyTextFull = $('#policyNo_pa').val().toUpperCase();;
            var str =textPolicyTextFull;
            var arr = str.split("-");
            var fullPolicfy = arr[0] + "-"+ arr[1] + "-"+ arr[2]+ "-"+ arr[3]+ "-"+ pad(arr[4], 7)+ "-"+ pad(arr[5], 2);
            $('#policyNo_pa').val(fullPolicfy);
            var textPolicyCount = $('#policyNo_pa').val().length;


            var textPolicyText = $('#policyNo_pa').val().toUpperCase();;
            var str =textPolicyText;
            var arr = str.split("-");
           
            
            $(".validation_policyNo_pa").remove();
            $('#policyNo_pa').fieldDefaultState();
            var errorCount = 0;
            var errorMessage = "";
            if(arr[0].length != 2){
                errorCount = 1;
            }else{
                if(arr[0] == "PA"){
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
                $("#policyNo_pa").after("<div class='validation_policyNo_pa v-error-msg'>Invalid Format!</div>");    
                $('#policyNo_pa').fieldErrorState();
            }
    }); 

    function pad (str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }

});
</script>