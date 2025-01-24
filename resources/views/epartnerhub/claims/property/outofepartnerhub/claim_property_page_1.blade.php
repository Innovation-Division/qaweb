<script>
$( document ).ready(function() {
    $('#policyNo_property').on('input', function() {

        



        var textPolicy = $('#policyNo_property').val().length;
        if(textPolicy == 2){
            var textPolicyText = $('#policyNo_property').val().toUpperCase();;
            if( textPolicyText == "FI"){
                $('#policyNo_property').val(textPolicyText+ "-");
            }else{
                $('#policyNo_property').val("");
            }
           
        }

        if(textPolicy == 6){
            var textPolicyText = $('#policyNo_property').val().toUpperCase();
            $('#policyNo_property').val(textPolicyText+ "-");
        }
        if(textPolicy == 9){
            var textPolicyText = $('#policyNo_property').val().toUpperCase();
            $('#policyNo_property').val(textPolicyText+ "-");
        }

        if(textPolicy == 12){
            var textPolicyText = $('#policyNo_property').val().toUpperCase();
            $('#policyNo_property').val(textPolicyText+ "-");
        }

        if(textPolicy == 20){
            var textPolicyText = $('#policyNo_property').val().toUpperCase();
            $('#policyNo_property').val(textPolicyText+ "-");
        }

      
        

        // if(textPolicy == 23){
        //     var textPolicyText = $('#policyNo_property').val().toUpperCase();
        //     $('#policyNo_property').val(textPolicyText);
        // }
        
        // do something
    });
    $("#policyNo_property").change(function(){
            var textPolicyTextFull = $('#policyNo_property').val().toUpperCase();;
            var str =textPolicyTextFull;
            var arr = str.split("-");
            var fullPolicfy = arr[0] + "-"+ arr[1] + "-"+ arr[2]+ "-"+ arr[3]+ "-"+ pad(arr[4], 7)+ "-"+ pad(arr[5], 2);
            $('#policyNo_property').val(fullPolicfy);
            var textPolicyCount = $('#policyNo_property').val().length;


            var textPolicyText = $('#policyNo_property').val().toUpperCase();;
            var str =textPolicyText;
            var arr = str.split("-");
           
            
            $(".validation_policyNo_property").remove();
            $('#policyNo_property').fieldDefaultState();
            var errorCount = 0;
            var errorMessage = "";
            if(arr[0].length != 2){
                errorCount = 1;
            }else{
                if( arr[0] == "FI"){
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
                $("#policyNo_property").after("<div class='validation_policyNo_property v-error-msg'>Invalid Format!</div>");    
                $('#policyNo_property').fieldErrorState();
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
<div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Enter Your Policy No. </label>
            <input id="policyNo_property" name="policyNo_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo_property') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
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
            <input id="Loss_date_property" name="Loss_date_property" type="text" class="form-control input-lg readonly" readonly maxlength="100" value="{{ old('Loss_date_property') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time_property" name="Loss_time_property" type="text" class="form-control input-lg time-pickable readonly" readonly maxlength="100" value="{{ old('Loss_time_property') }}" >
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>Location of Loss</label>
            <textarea  id="location_loss_property" name="location_loss_property" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss_property') }}</textarea>
        </div>
    </div>
   
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Contact No.</label>
            <input id="contact_no_property" name="contact_no_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('contact_no_property') }}" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        </div>
        <div class="col-md-4 form-group">
            <label>Email Address</label>
            <input id="email_address_property" name="email_address_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('email_address_property') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>