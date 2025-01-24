@if(\Auth::user()->type == 'A')

         <!-- Modal -->
<div class="modal fade"  id="feedbackMonthlyNew" >
<div class="modal-dialog modal-xl" style="width: 50%;">
    <div class="modal-content" style="width:100%;background-color:white !important;color:#0f0f0f !important">
        <div class="modal-header" style="padding:40px !important" >
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="modal-title">Survey</h2>
        </div>
         <form  class="form-horizontal" id="career-form" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
        <div class="modal-body">
        
                        <div class="col-sm-12">   

                            <div class="col-sm-6"><strong style="color: #08c;font-size: 20px;" > QUESTION </strong></div>
                            <div class="col-sm-1"><strong>  </strong> </div>
                            <div class="col-sm-1"><strong style="color: #08c;font-size: 20px;" > RATING </strong> </div>
                            <div class="col-sm-1"><strong>  </strong> </div>
                        </div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6"></div>                                
                            <div class="col-sm-1"><strong style="font-size:12px">Agree </strong> </div>                                
                            <div class="col-sm-1"><strong style="font-size:12px"> Disagree </strong> </div>                                
                            <div class="col-sm-1"><strong style="font-size:12px"> NA </strong> </div>                                
                        </div>
                         <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'>I received QUOTATIONS AND POLICIES promptly within the specified time period. <span id="firsterrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck" for="firstRowFirst">
                                    <input id="firstRowFirst" name="firstRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" for="firstRowSecond" style="margin-right: -12px !important;">
                                    <input id="firstRowSecond" name="firstRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" for="firstRowthird" style="margin-right: 15px !important;">
                                    <input id="firstRowthird" name="firstRowthird" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                             <label for="textremarks">  </label>   
                            <textarea  id="firstRowRemarks" name="firstRowRemarks" class="form-control" placeholder="Remarks"></textarea>

                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'>I receive the RENEWAL NOTICE at least 45 days before expiration of the account.  <span id="seconderrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label  class="labelcheck">
                                    <input id="SecondRowFirst" name="SecondRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="SecondRowSecond" name="SecondRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="SecondRowthird" name="SecondRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                             <label for="textremarks">  </label> 
                            <textarea id="SecondRowRemarks" name="SecondRowRemarks" class="form-control" placeholder="Remarks"></textarea>

                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'>REPORTS are received within specified time (e.g. Production, Collection).  <span id="thirderrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck">
                                    <input id="ThirdRowFirst" name="ThirdRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="ThirdRowSecond" name="ThirdRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="ThirdRowthird" name="ThirdRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                             <label for="textremarks">  </label> 
                            <textarea id="ThirdRowRemarks" name="ThirdRowRemarks" class="form-control" placeholder="Remarks"></textarea>

                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'>COMMISSIONS are readily available within specified time.  <span id="fourtherrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck">
                                    <input id="FourthRowFirst" name="FourthRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="FourthRowSecond" name="FourthRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="FourthRowthird" name="FourthRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                             <label for="textremarks">  </label> 
                            <textarea id="FourthRowRemarks" name="FourthRowRemarks" class="form-control" placeholder="Remarks"></textarea>

                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'>COCOGEN SALES PROMOTIONS are exciting and attractive. <span id="fiftherrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck">
                                    <input id="FifthRowFirst" name="FifthRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="FifthRowSecond" name="FifthRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="FifthRowthird" name="FifthRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <label for="textremarks">  </label> 
                                <textarea id="FifthRowRemarks" name="FifthRowRemarks" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'> The COCOGEN COMPENSATION/COMMISSION rates I receive remain competitive. <span id="sixtherrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck">
                                    <input id="SixthRowFirst" name="SixthRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="SixthRowSecond" name="SixthRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="SixthRowthird" name="SixthRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <label for="textremarks">  </label> 
                                <textarea id="SixthRowRemarks" name="SixthRowRemarks" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'>COCOGEN insurance rates remain competitive. <span id="sevenerrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck">
                                    <input id="SevenRowFirst" name="SevenRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="SevenRowSecond" name="SevenRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                               <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="SevenRowthird" name="SevenRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <label for="textremarks">  </label> 
                                <textarea id="SevenRowRemarks" name="SevenRowRemarks" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id='questionFont'>COCOGEN HEAD OFFICE CUSTOMER SERVICE STAFF handled my concerns well and courteously. <span id="nintherrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck">
                                    <input id="NinthRowFirst" name="NinthRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="NinthRowSecond" name="NinthRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="NinthRowthird" name="NinthRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <label for="textremarks">  </label> 
                                <textarea id="NinthRowRemarks" name="NinthRowRemarks" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-3" id='questionFont'>I am happy with my ACCOUNT ASSOCIATE.  <span id="tentherrormessage" style="color: red;display: none;"> *Required</span></div>                                
                            <div class="col-sm-3"><input type="text" name="account_associate_name" id="account_associate_name"  class="form-control" placeholder="Name" style="margin-top: -5px;"></div>                                
                            <div class="col-sm-1">
                                <div class="items-container">
                                  <label class="labelcheck">
                                    <input id="TenthRowFirst" name="TenthRowFirst" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container" >
                                  <label class="labelcheck" style="margin-right: -12px !important;">
                                    <input id="TenthRowSecond" name="TenthRowSecond" type="checkbox" class="inputcheck">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                            <div class="col-sm-1"> 
                                <div class="items-container">
                                  <label class="labelcheck" style="margin-right: 15px !important;">
                                    <input id="TenthRowthird" name="TenthRowthird" type="checkbox" class="inputcheck" value="active">
                                    <span class="checkmark"></span>
                                  </label>          
                                </div>
                            </div>                                
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <label for="textremarks">  </label> 
                                <textarea id="TenthRowRemarks" name="TenthRowRemarks" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-9" id='questionFont'>
                                <label for="textremarks">
                                    What else would you like to share with us to help improve your experience with COCOGEN?
                    
                                  </label> 
                                <textarea id="Remarks_others" name="Remarks_others" class="form-control" ></textarea>
                            </div>
                        </div>

                         <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-3" id='questionFont'>
                                <label for="textremarks">
                                    Producer's mobile no:
                    
                                  </label> 
                                <input type="text" name="Agetno" id="Agetno" class="form-control" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-9" style="text-align: center">
                                <label for="textremarks">
                                    <button id="btnsubmitannualsurvey" name="btnsubmitannualsurvey" type="submit" class="btn-primary form-control" style="padding:0">Submit</button>
                                     <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                                  </label> 
                            </div>
                        </div>
        </div>
    </form>
</div>
</div>
</div>
@endif
<script type="text/javascript">
   
     $('#career-form').submit(function(e) {
         
       e.preventDefault();
       let formData = new FormData(this);
  
        
       $.ajax({
        type:'POST',
          url: "{{ route('agentfeedback') }}",
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            $('#feedbackMonthly').hide();
            $('#firstRowRemarks').val(''); 
            $('#SecondRowRemarks').val(''); 
            $('#ThirdRowRemarks').val(''); 
            $('#FourthRowRemarks').val(''); 
            $('#FifthRowRemarks').val(''); 
            $('#SixthRowRemarks').val(''); 
            $('#SevenRowRemarks').val(''); 
            $('#NinthRowRemarks').val(''); 
            $('#TenthRowRemarks').val(''); 
            $('#Remarks_others').val(''); 
            $('#account_associate_name').val(''); 
            $('#Agetno').val(''); 
            $('#firstRowSecond').removeAttr('checked');
            $('#firstRowFirst').removeAttr('checked');
            $('#firstRowthird').removeAttr('checked');
            $('#firstRowFirst').removeAttr('checked');
            $('#firstRowSecond').removeAttr('checked');
            $('#firstRowthird').removeAttr('checked');
            $('#SecondRowSecond').removeAttr('checked');
            $('#SecondRowFirst').removeAttr('checked');
            $('#SecondRowthird').removeAttr('checked');
            $('#SecondRowFirst').removeAttr('checked');
            $('#SecondRowSecond').removeAttr('checked');
            $('#SecondRowthird').removeAttr('checked');
            $('#ThirdRowSecond').removeAttr('checked');
            $('#ThirdRowFirst').removeAttr('checked');
            $('#ThirdRowthird').removeAttr('checked');
            $('#ThirdRowFirst').removeAttr('checked');
            $('#ThirdRowSecond').removeAttr('checked');
            $('#ThirdRowthird').removeAttr('checked');
            $('#FourthRowSecond').removeAttr('checked');
            $('#FourthRowFirst').removeAttr('checked');
            $('#FourthRowthird').removeAttr('checked');
            $('#FourthRowFirst').removeAttr('checked');
            $('#FourthRowSecond').removeAttr('checked');
            $('#FourthRowthird').removeAttr('checked');
            $('#FifthRowSecond').removeAttr('checked');
            $('#FifthRowFirst').removeAttr('checked');
            $('#FifthRowthird').removeAttr('checked');
            $('#FifthRowFirst').removeAttr('checked');
            $('#FifthRowSecond').removeAttr('checked');
            $('#FifthRowthird').removeAttr('checked');
            $('#SixthRowSecond').removeAttr('checked');
            $('#SixthRowFirst').removeAttr('checked');
            $('#SixthRowthird').removeAttr('checked');
            $('#SixthRowFirst').removeAttr('checked');
            $('#SixthRowSecond').removeAttr('checked');
            $('#SixthRowthird').removeAttr('checked');
            $('#SevenRowSecond').removeAttr('checked');
            $('#SevenRowFirst').removeAttr('checked');
            $('#SevenRowthird').removeAttr('checked');
            $('#SevenRowFirst').removeAttr('checked');
            $('#SevenRowSecond').removeAttr('checked');
            $('#SevenRowthird').removeAttr('checked');
            $('#NinthRowSecond').removeAttr('checked');
            $('#NinthRowFirst').removeAttr('checked');
            $('#NinthRowthird').removeAttr('checked');
            $('#NinthRowFirst').removeAttr('checked');
            $('#NinthRowSecond').removeAttr('checked');
            $('#NinthRowthird').removeAttr('checked');
            $('#TenthRowSecond').removeAttr('checked');
            $('#TenthRowFirst').removeAttr('checked');
            $('#TenthRowthird').removeAttr('checked');
            $('#TenthRowFirst').removeAttr('checked');
            $('#TenthRowSecond').removeAttr('checked');
            $('#TenthRowthird').removeAttr('checked');
            jQuery('#feedbackMonthlyNew').hide();
        },
        error: function(response){
          console.log('cocogen.com.ph');

        }
      });

     });

</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
 
var d = new Date();
var n = d.getTimezoneOffset();
var ans = new Date(d);
var year = ans.getFullYear();
var month = '0' + ans.getMonth();
var day = ans.getDate() + 1;
var date=  year + "-" + month + "-" + day;

var sixtMonthDate = $('#feedbackUserDate').val();
var validateSixtMonth = $('#feedbackUserNotif').val(); 
 
// var sixtMonthDate = date; // For test purpose only 

    if(sixtMonthDate == date){

        if(validateSixtMonth <= 0){
             jQuery.noConflict(); 
             jQuery('#feedbackMonthlyNew').modal('show'); 
         }else{
             jQuery('#feedbackMonthlyNew').hide();
         }

    } 

});

</script>
<script type="text/javascript">
    $("#phone").mask("(999) 999-9999");
    function phoneMaskPHno() {
      var key = window.event.key;
      var element = window.event.target;
      var isAllowed = /\d|Backspace|Tab/;
      if(!isAllowed.test(key)) window.event.preventDefault();
      if(element.value.length < 15){
          var inputValue = element.value;
          inputValue = inputValue.replace(/\D/g,'');
          inputValue = inputValue.replace(/(^\d{4})(\d)/,'($1) $2');
          inputValue = inputValue.replace(/(\d{1,5})(\d{3}$)/,'$1-$2');
         
          element.value = inputValue;
      }
      
    }

    function noonly() {
      var key = window.event.key;
      var element = window.event.target;
      var isAllowed = /\d|Backspace|Tab/;
      if(!isAllowed.test(key)) window.event.preventDefault();
          var inputValue = element.value;        
          element.value = inputValue;  
    }
</script>
<script type="text/javascript">
    $( "#btnsubmitannualsurvey" ).click(function() {
        var error = 0;
        if($('input[name="firstRowFirst"]').is(':checked') == false  && $('input[name="firstRowSecond"]').is(':checked') == false  && $('input[name="firstRowthird"]').is(':checked') == false){
                var error = 1;
                $('#firsterrormessage').show();
        }else{
                $('#firsterrormessage').hide();
        }

        if($('input[name="SecondRowFirst"]').is(':checked') == false  && $('input[name="SecondRowSecond"]').is(':checked') == false  && $('input[name="SecondRowthird"]').is(':checked') == false){
                var error = 1;
                $('#seconderrormessage').show();
        }else{
                $('#seconderrormessage').hide();
        }

        if($('input[name="ThirdRowFirst"]').is(':checked') == false  && $('input[name="ThirdRowSecond"]').is(':checked') == false  && $('input[name="ThirdRowthird"]').is(':checked') == false){
                var error = 1;
                $('#thirderrormessage').show();
        }else{
                $('#thirderrormessage').hide();
        }

        if($('input[name="FourthRowFirst"]').is(':checked') == false  && $('input[name="FourthRowSecond"]').is(':checked') == false  && $('input[name="FourthRowthird"]').is(':checked') == false){
                var error = 1;
                $('#fourtherrormessage').show();
        }else{
                $('#fourtherrormessage').hide();
        }

        if($('input[name="FifthRowFirst"]').is(':checked') == false  && $('input[name="FifthRowSecond"]').is(':checked') == false  && $('input[name="FifthRowthird"]').is(':checked') == false){
                var error = 1;
                $('#fiftherrormessage').show();
        }else{
                $('#fiftherrormessage').hide();
        }

        if($('input[name="SixthRowFirst"]').is(':checked') == false  && $('input[name="SixthRowSecond"]').is(':checked') == false  && $('input[name="SixthRowthird"]').is(':checked') == false){
                var error = 1;
                $('#sixtherrormessage').show();
        }else{
                $('#sixtherrormessage').hide();
        }

        if($('input[name="SevenRowFirst"]').is(':checked') == false  && $('input[name="SevenRowSecond"]').is(':checked') == false  && $('input[name="SevenRowthird"]').is(':checked') == false){
                var error = 1;
                $('#sevenerrormessage').show();
        }else{
                $('#sevenerrormessage').hide();
        }

        if($('input[name="NinthRowFirst"]').is(':checked') == false  && $('input[name="NinthRowSecond"]').is(':checked') == false  && $('input[name="NinthRowthird"]').is(':checked') == false){
                var error = 1;
                $('#nintherrormessage').show();
        }else{
                $('#nintherrormessage').hide();
        }

        

        if($('input[name="TenthRowFirst"]').is(':checked') == false  && $('input[name="TenthRowSecond"]').is(':checked') == false  && $('input[name="TenthRowthird"]').is(':checked') == false){
                var error = 1;
                $('#tentherrormessage').show();
        }else{
                $('#tentherrormessage').hide();
        }

        var firstRowRemarks = $('#firstRowRemarks').val(); 
        var SecondRowRemarks = $('#SecondRowRemarks').val(); 
        var ThirdRowRemarks = $('#ThirdRowRemarks').val(); 
        var FourthRowRemarks = $('#FourthRowRemarks').val(); 
        var FifthRowRemarks = $('#FifthRowRemarks').val(); 
        var SixthRowRemarks = $('#SixthRowRemarks').val(); 
        var SevenRowRemarks = $('#SevenRowRemarks').val(); 
        var NinthRowRemarks = $('#NinthRowRemarks').val(); 
        var TenthRowRemarks = $('#TenthRowRemarks').val(); 
        var Remarks_others = $('#Remarks_others').val(); 
        var Agetno = $('#Agetno').val(); 
        var account_associate_name = $('#account_associate_name').val(); 

    
        if(Remarks_others == ""){
            $('#Remarks_others').css('border-color', '#F44336');            
            error = 1;           
        }else{ 
            $('#Remarks_others').css('border-color', '');                   
        }

        if(Agetno == ""){
            $('#Agetno').css('border-color', '#F44336');            
            error = 1;           
        }else{ 
            $('#Agetno').css('border-color', '');                   
        }

        if(account_associate_name == ""){
            $('#account_associate_name').css('border-color', '#F44336');            
            error = 1;           
        }else{ 
            $('#account_associate_name').css('border-color', '');                   
        }


        if(error > 0){
            return false;
        }

    });
</script>
<script type="text/javascript">    

    $("#firstRowthird").change(function() {
        if(this.checked) {
            $('#firstRowSecond').removeAttr('checked');
            $('#firstRowFirst').removeAttr('checked');
        }
    });
    $("#firstRowSecond").change(function() {
        if(this.checked) {
            $('#firstRowthird').removeAttr('checked');
            $('#firstRowFirst').removeAttr('checked');
        }
    });
    $("#firstRowFirst").change(function() {
        if(this.checked) {
            $('#firstRowSecond').removeAttr('checked');
            $('#firstRowthird').removeAttr('checked');
        }
    });

    $("#SecondRowthird").change(function() {
        if(this.checked) {
            $('#SecondRowSecond').removeAttr('checked');
            $('#SecondRowFirst').removeAttr('checked');
        }
    });
    $("#SecondRowSecond").change(function() {
        if(this.checked) {
            $('#SecondRowthird').removeAttr('checked');
            $('#SecondRowFirst').removeAttr('checked');
        }
    });
    $("#SecondRowFirst").change(function() {
        if(this.checked) {
            $('#SecondRowSecond').removeAttr('checked');
            $('#SecondRowthird').removeAttr('checked');
        }
    });

    $("#ThirdRowthird").change(function() {
        if(this.checked) {
            $('#ThirdRowSecond').removeAttr('checked');
            $('#ThirdRowFirst').removeAttr('checked');
        }
    });
    $("#ThirdRowSecond").change(function() {
        if(this.checked) {
            $('#ThirdRowthird').removeAttr('checked');
            $('#ThirdRowFirst').removeAttr('checked');
        }
    });
    $("#ThirdRowFirst").change(function() {
        if(this.checked) {
            $('#ThirdRowSecond').removeAttr('checked');
            $('#ThirdRowthird').removeAttr('checked');
        }
    });

    $("#FourthRowthird").change(function() {
        if(this.checked) {
            $('#FourthRowSecond').removeAttr('checked');
            $('#FourthRowFirst').removeAttr('checked');
        }
    });
    $("#FourthRowSecond").change(function() {
        if(this.checked) {
            $('#FourthRowthird').removeAttr('checked');
            $('#FourthRowFirst').removeAttr('checked');
        }
    });
    $("#FourthRowFirst").change(function() {
        if(this.checked) {
            $('#FourthRowSecond').removeAttr('checked');
            $('#FourthRowthird').removeAttr('checked');
        }
    });

    $("#FifthRowthird").change(function() {
        if(this.checked) {
            $('#FifthRowSecond').removeAttr('checked');
            $('#FifthRowFirst').removeAttr('checked');
        }
    });
    $("#FifthRowSecond").change(function() {
        if(this.checked) {
            $('#FifthRowthird').removeAttr('checked');
            $('#FifthRowFirst').removeAttr('checked');
        }
    });
    $("#FifthRowFirst").change(function() {
        if(this.checked) {
            $('#FifthRowSecond').removeAttr('checked');
            $('#FifthRowthird').removeAttr('checked');
        }
    });

    $("#SixthRowthird").change(function() {
        if(this.checked) {
            $('#SixthRowSecond').removeAttr('checked');
            $('#SixthRowFirst').removeAttr('checked');
        }
    });
    $("#SixthRowSecond").change(function() {
        if(this.checked) {
            $('#SixthRowthird').removeAttr('checked');
            $('#SixthRowFirst').removeAttr('checked');
        }
    });
    $("#SixthRowFirst").change(function() {
        if(this.checked) {
            $('#SixthRowSecond').removeAttr('checked');
            $('#SixthRowthird').removeAttr('checked');
        }
    });

    $("#SevenRowthird").change(function() {
        if(this.checked) {
            $('#SevenRowSecond').removeAttr('checked');
            $('#SevenRowFirst').removeAttr('checked');
        }
    });
    $("#SevenRowSecond").change(function() {
        if(this.checked) {
            $('#SevenRowthird').removeAttr('checked');
            $('#SevenRowFirst').removeAttr('checked');
        }
    });
    $("#SevenRowFirst").change(function() {
        if(this.checked) {
            $('#SevenRowSecond').removeAttr('checked');
            $('#SevenRowthird').removeAttr('checked');
        }
    });

    $("#NinthRowthird").change(function() {
        if(this.checked) {
            $('#NinthRowSecond').removeAttr('checked');
            $('#NinthRowFirst').removeAttr('checked');
        }
    });
    $("#NinthRowSecond").change(function() {
        if(this.checked) {
            $('#NinthRowthird').removeAttr('checked');
            $('#NinthRowFirst').removeAttr('checked');
        }
    });
    $("#NinthRowFirst").change(function() {
        if(this.checked) {
            $('#NinthRowSecond').removeAttr('checked');
            $('#NinthRowthird').removeAttr('checked');
        }
    });

    $("#TenthRowthird").change(function() {
        if(this.checked) {
            $('#TenthRowSecond').removeAttr('checked');
            $('#TenthRowFirst').removeAttr('checked');
        }
    });
    $("#TenthRowSecond").change(function() {
        if(this.checked) {
            $('#TenthRowthird').removeAttr('checked');
            $('#TenthRowFirst').removeAttr('checked');
        }
    });
    $("#TenthRowFirst").change(function() {
        if(this.checked) {
            $('#TenthRowSecond').removeAttr('checked');
            $('#TenthRowthird').removeAttr('checked');
        }
    });

</script>
<style type="text/css">
#questionFont{
    font-size: 15px !important;
}   

.labelcheck {
  border: 3px solid #53b947;
  position: relative;
  width: 1.2vw;
  height: 1.2vw;
  border-radius:50%;
  cursor: pointer;
}

.inputcheck {
  position: absolute;
  height: 0;
  width: 0;
  opacity: 0;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  transition: 0.2s;
}

.checkmark::after {
  content: "";
  position: absolute;
  top: 45%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(45deg);
  height: 60%;
  width: 25%;
  border: solid white;
  border-width: 0 3px 3px 0;
  opacity: 0;
  transition: 0.2s;
}

input:checked ~ .checkmark {
  background: #53b947;
}

input:checked ~ .checkmark::after {
  opacity: 1;
}

</style>
<style type="text/css">
        .button-three {
            position: relative;
            background-color: #53b947;
            border: none;
            padding: 20px;
            width: 200px;
            text-align: center;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            color:white;
            margin-bottom: 10px;
        }

        .button-three:hover{
           background:#fff;
           box-shadow:0px 2px 10px 5px #97B1BF;
           color:#000;
        }

        .button-three:after {
            content: "";
            background: #53b947;
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 0;
            transition: all 0.8s
        }

        .button-three:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }
    .avatar-wrapper{
    position: relative;
    height: 200px;
    width: 200px;
    margin: 50px auto;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 1px 1px 15px -5px black;
    transition: all .3s ease
    }
    .avatar-wrapper:hover{
        transform: scale(1.05);
        cursor: pointer;
    }
    .avatar-wrapper:hover .profile-pic{
        opacity: .5;
    }

    .profile-pic {
    height: 100%;
        width: 100%;
        transition: all .3s ease;
        
    }
    .profile-pic:after{
            font-family: FontAwesome;
            content: "";
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            font-size: 190px;
            background: #ecf0f1;
            color: #34495e;
            text-align: center;
        }

    .upload-button {
        position: absolute;
        top: 0; left: 0;
        height: 100%;
        width: 100%;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .upfa{
        position: absolute;
        font-size: 60px;
        opacity: 0;
        transition: all .3s ease;
       
    }
    .upload-button:hover .fa{
        opacity: .9;
    }

    .profile-pic1 {
        border-radius: 50%;
        height: 150px;
        width: 150px;
        background-size: cover;
        background-position: center;
        background-blend-mode: multiply;
        vertical-align: middle;
        text-align: center;
        color: transparent;
        transition: all .3s ease;
        text-decoration: none;
        text-align: center;
    }
        .profile-pic1:hover {
            background-color: rgba(0,0,0,.5);
            z-index: 10000;
            color: #fff;
            transition: all .3s ease;
            text-decoration: none;
        }

        .profile-pic1 span {
            display: inline-block;
            padding-top: 4.5em;
            padding-bottom: 4.5em;

        }

      .tabs-left, .tabs-right {
                  border-bottom: none;
                  padding-top: 2px;
                }
                .tabs-left {
                  border-right: 1px solid #ddd;
                }
                .tabs-right {
                  border-left: 1px solid #ddd;
                }
                .tabs-left>li, .tabs-right>li {
                  float: none;
                  margin-bottom: 2px;
                }
                .tabs-left>li {
                  margin-right: -1px;
                }
                .tabs-right>li {
                  margin-left: -1px;
                }
                .tabs-left>li.active>a,
                .tabs-left>li.active>a:hover,
                .tabs-left>li.active>a:focus {
                  border-bottom-color: #ddd;
                  border-right-color: transparent;
                }

                .tabs-right>li.active>a,
                .tabs-right>li.active>a:hover,
                .tabs-right>li.active>a:focus {
                  border-bottom: 1px solid #ddd;
                  border-left-color: transparent;
                }
                .tabs-left>li>a {
                  border-radius: 4px 0 0 4px;
                  margin-right: 0;
                  display:block;
                }
                .tabs-right>li>a {
                  border-radius: 0 4px 4px 0;
                  margin-right: 0;
                }
                /*  bhoechie tab */
                div.bhoechie-tab-container{
                  z-index: 10;
                  background-color: #ffffff;
                  padding: 0 !important;
                  border-radius: 4px;
                  -moz-border-radius: 4px;
                  border:1px solid #ddd;
                  margin-top: 20px;
                  margin-left: 50px;
                  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
                  box-shadow: 0 6px 12px rgba(0,0,0,.175);
                  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
                  background-clip: padding-box;
                  opacity: 0.97;
                  filter: alpha(opacity=97);
                }
                div.bhoechie-tab-menu{
                  padding-right: 0;
                  padding-left: 0;
                  padding-bottom: 0;
                }
                div.bhoechie-tab-menu div.list-group{
                  margin-bottom: 0;
                }
                div.bhoechie-tab-menu div.list-group>a{
                  margin-bottom: 0;
                }
                div.bhoechie-tab-menu div.list-group>a .glyphicon,
                div.bhoechie-tab-menu div.list-group>a .fa {
                  color: #5A55A3;
                }
                div.bhoechie-tab-menu div.list-group>a:first-child{
                  border-top-right-radius: 0;
                  -moz-border-top-right-radius: 0;
                }
                div.bhoechie-tab-menu div.list-group>a:last-child{
                  border-bottom-right-radius: 0;
                  -moz-border-bottom-right-radius: 0;
                }
                div.bhoechie-tab-menu div.list-group>a.active,
                div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
                div.bhoechie-tab-menu div.list-group>a.active .fa{
                  background-color: #5A55A3;
                  background-image: #5A55A3;
                  color: #ffffff;
                }
                div.bhoechie-tab-menu div.list-group>a.active:after{
                  content: '';
                  position: absolute;
                  left: 100%;
                  top: 50%;
                  margin-top: -13px;
                  border-left: 0;
                  border-bottom: 13px solid transparent;
                  border-top: 13px solid transparent;
                  border-left: 10px solid #5A55A3;
                }

                div.bhoechie-tab-content{
                  background-color: #ffffff;
                  /* border: 1px solid #eeeeee; */
                  padding-left: 20px;
                  padding-top: 10px;
                }

                div.bhoechie-tab div.bhoechie-tab-content:not(.active){
                  display: none;
                }
  </style>


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
