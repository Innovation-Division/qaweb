<link rel="stylesheet" type="text/css" href="{{ asset('/css/feedbackpopup.css') }}" media="all">
<script src="{{ asset('/js/feedbackpopup.js') }}"></script>
 @if (!Auth::guest())
 @if(\Auth::user()->type == 'A')
 <div class="pop-up-chat2  d-none d-lg-block" style="bottom: -287px;">
    <div class="chat-header2">
        <div class="title">
            <span class="fa fa-commenting-o"></span><span style="font-family: muli">feedback</span>
        </div>
        <div class="icons">
            <i class="fa fa-plus" aria-hidden="true" style="color: white"></i>
        </div>
    </div>
    <div class="chat-body2">
        <span class="">

           <a href="#" class="image fit"><img src="http://www.onlinechatcenters.com/status-31902-76901"  data-toggle="modal" id='mdl_modalSurvey_feedback' data-target="#mdl_livechatmodal_feedback_2" alt="" /></a>

       </div>
   </div>
   @endif
   @endif
     <div class="modal fade in" id="mdl_livechatmodal_feedback_2" role="dialog" aria-hidden="true">
                <div class="modal-backdrop fade in " style="z-index: 0 !important">
                </div>
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="row">
                            <div id="class-with-pic" class="col-md-6 col-sm-6" style="">
                                <img alt="Survey Image" src='{{ url("/images/survey/Assets_Asset.png") }}' width="300" style="margin-top: 25%"></div>
                                <div id="class-with-parameter" class="col-md-6 col-sm-6">
                                    <div class="container col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 7%;text-align: right;background-color: white;">    
                                                <button type="button" class="mdl_modal_survey_close" id='mdl_modal_survey_close'data-dismiss="modal" aria-label="Close" style=" border-color: white;background-color: white;padding: 0;border: none;background: none;color:black" >
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                                <div class="modal-body" style="font-family: muli;">
                                                  <form class="submitFeedback" id="tag-form" method="post"  >

                                                        <h4 id="question" name="question" style="font-weight: bold;font-size:14px">How did you like our website?</h4>  
                                                        
                                                             
                                                       
                                                        <p>
                                                            <textarea style="height: 150px;" id="message-text" name="message-text" class="form-control" rows="5" placeholder="Your Comments..."></textarea>
                                                        </p>
                                                        <div class="row">                                        
                                                            <div class="col-md-12 col-md-6">
                                                                  <input id="submit_feedback" type="submit" class="btn btn-primary" value="Submit">
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
    $( document ).ready(function() 
    {
        $('#mdl_livechatmodal_feedback_2').hide();
        $('#mdl_modalSurvey_feedback').on('click', function(e) {
        $('#mdl_livechatmodal_feedback_2').modal('show');
        $('#mdl_livechatmodal_feedback_2').show();
      });

        jQuery('#feedbackMonthly').hide();
         $('#mdl_modalSurvey_feedback').hide();
             $('#mdl_modal_survey_close').on('click', function(e) {
             $('#mdl_livechatmodal_feedback_2').hide();
              location.reload();

          });

      $('#submit_feedback').on('click', function(e) {
        e.preventDefault();
        var _token = jQuery('input[name="_token"]').val();
        var email = jQuery('.emailAdd').val();
        var agentMessage = jQuery('#message-text').val();
        var fullname = jQuery('#fullname').val();


        $(".validation_message-text").remove();
        $(".validation_message-text_check_error").remove(); 
        $(".validation_message-textsuccess").remove();

        $(".validation_fullname").remove();
        $(".validation_fullname_check_error").remove(); 
        $(".validation_fullname_success").remove();

          errornumber = 0; 


          if($('#message-text').val() == ""){
            $('#message-text').css('border-color', '#F44336');            
                    $("#message-text").after("<div class='validation_message-text' style='opacity:0.7;color:#F44336;'>Comment is empty</div>");    
            $('#message-text').after('<i class="fa fa-times-circle validation_message-text_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#message-text').after('<i class="fa fa-check-circle validation_message-textsuccess fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#message-text').css('border-color', '#4BB543');                   
          } 


          if($('#fullname').val() == ""){
            $('#fullname').css('border-color', '#F44336');            
                    $("#fullname").after("<div class='validation_fullname' style='opacity:0.7;color:#F44336;'>Name is empty</div>");    
            $('#fullname').after('<i class="fa fa-times-circle validation_fullname_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#fullname').after('<i class="fa fa-check-circle validation_fullname_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#fullname').css('border-color', '#4BB543');                   
          } 

          if(errornumber == 1){
             
            return false;
          }else{


            $.ajax({
                type: "POST",
                url: "{{  route ('userfeedback') }}",
                data:{ _token:_token,email:email,agentMessage:agentMessage,fullname:fullname}, 
                success: function(response) {
                    jQuery('#message-text').val('');
                    jQuery('#fullname').val('');
                    $('#myModal').hide();
                      $('#mdl_livechatmodal_feedback_2').hide();
                      location.reload();

                },
                error: function() {
                    console.log('Error');
                }
            });
          }
        return false;
    });
});

    </script>

