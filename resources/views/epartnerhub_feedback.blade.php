
<input type="hidden" name="feedbackUserDate" id='feedbackUserDate' class='feedbackUserDate' value="{{ $feedbackUserDate }}">
<input type="hidden" name="feedbackUserNotif" id='feedbackUserNotif' class='feedbackUserNotif' value="{{ $feedbackUserNotif }}">
         <!-- Modal -->
<div class="modal fade in" id="feedbackMonthly"  class="modal" role="dialog" aria-hidden="true" 
    style="display:none">
                <div class="modal-backdrop fade in">
                </div>
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="row">
                            <div id="class-with-pic" class="col-md-6 col-sm-6" style="">
                                <img alt="Survey Image" src="images/survey/Assets_Asset.png" width="300" style="margin-top: 25%"></div>
                                <div id="class-with-parameter" class="col-md-6 col-sm-6">
                                    <div class="container col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 7%;text-align: right;">    
                                                <button type="button" class="closeModal" id='closeModal'data-dismiss="modal" aria-label="Close" style=" border-color: white;  background-color: white;">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                                <div class="modal-body" style="font-family: muli;">
                                                 <form class="tagForm" id="tag-form" method="post" >
                                                        <h4 id="question" name="question" style="font-weight: bold;">How did you like our website?</h4>  
                                                            <textarea style="height: 150px;" id="agentMessage" name="message-text" class="form-control" rows="5" placeholder="Your Comments..."></textarea>
                                                        </p>
                                                        <div class="row">                                        
                                                            <div class="col-md-12 col-md-6">
                                                                  <input id="tag-form-submit" type="submit" class="btn btn-primary" value="Submit">
                                                            </div>                                  
                                                        </div>  
                                                     </form>                                      
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<script type="text/javascript">
 jQuery(document).ready(function(){
 
var d = new Date();
var n = d.getTimezoneOffset();
var ans = new Date(d);
var year = ans.getFullYear();
var month = '0' + ans.getMonth();
var day = ans.getDate();
var date=  year + "-" + month + "-" + day;

var sixtMonthDate = $('#feedbackUserDate').val();
var validateSixtMonth = $('#feedbackUserNotif').val(); 
    if(date == sixtMonthDate){

        if(validateSixtMonth <= 0){
             jQuery.noConflict(); 
             jQuery('#feedbackModal').modal('show');     
         }else{
             jQuery('#feedbackMonthly').hide();
         }
    }

});

</script>
<script type="text/javascript">
   $('#closeModal').on('click', function(e) {
           jQuery('#feedbackMonthly').hide();
          });
  $('#tag-form-submit').on('click', function(e) {
    e.preventDefault();
     var _token = jQuery('input[name="_token"]').val();
        var email = jQuery('input[name="email"]').val();
        var agentMessage = $('#agentMessage').val();


    $(".validation_message-text").remove();
    $(".validation_message-text_check_error").remove(); 
    $(".validation_message-textsuccess").remove();
      errornumber = 0; 


                  if($('#agentMessage').val() == ""){
                    $('#agentMessage').css('border-color', '#F44336');            
                            $("#agentMessage").after("<div class='validation_message-text' style='opacity:0.7;color:#F44336;'>Comment is empty</div>");    
                    $('#agentMessage').after('<i class="fa fa-times-circle validation_message-text_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                    errornumber = 1;           
                  }else{                        
                    $('#agentMessage').after('<i class="fa fa-check-circle validation_message-textsuccess fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                    $('#agentMessage').css('border-color', '#4BB543');                   
                  } 

     if(errornumber == 1){
                     
                    return false;
                  }else{
    $.ajax({
        type: "POST",
        url: "{{  route ('agentfeedback') }}",
       data:{ _token:_token,email:email,agentMessage:agentMessage}, 
        success: function(response) {
            console.log('www.cocogen.com');
             jQuery('#feedbackMonthly').hide();
        },
        error: function() {
           console.log('www.cocogen.com');
        }
    });
         }
    return false;
});
</script>
