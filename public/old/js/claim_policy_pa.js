
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