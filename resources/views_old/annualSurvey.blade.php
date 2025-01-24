@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/customer-charter">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="cms_page"><strong>Annual CS Survey</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <form onsubmit="return validateRecaptcha();" class="form-horizontal" id="career-form" method="post" action="{{route('annualcssurveysave')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <input type="hidden" id="hidden_id" name="hidden_id" value="{{$id}}">

                <div class="col-main">
                    <div class="page-title">
                        <h1>
                            Annual CS Survey</h1>
                    </div>
                    <div class="std" style="font-size: 11.5px;">
                        
                        <p>
                            Please help us serve you better by taking a couple of minutes to tell us about our service that you have received so far.  Kindly tick the appropriate boxes. Skip questions that are not applicable. </p>
                        <div class="col-sm-12">   
                            <div class="col-sm-6"><strong style="color: #08c;"> QUESTION </strong></div>
                            <div class="col-sm-1"><strong>  </strong> </div>
                            <div class="col-sm-1"><strong style="color: #08c;"> RATING </strong> </div>
                            <div class="col-sm-1"><strong>  </strong> </div>
                        </div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6"></div>                                
                            <div class="col-sm-1"><strong>Agree </strong> </div>                                
                            <div class="col-sm-1"><strong> Disagree </strong> </div>                                
                            <div class="col-sm-1"><strong> NA </strong> </div>                                
                        </div>
                        
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">I received QUOTATIONS AND POLICIES promptly within the specified time period. <span id="firsterrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-6">I receive the RENEWAL NOTICE at least 45 days before expiration of the account.  <span id="seconderrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-6">REPORTS are received within specified time (e.g. Production, Collection).  <span id="thirderrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                        <div class="col-sm-12">
                            <div class="col-sm-6">COMMISSIONS are readily available within specified time.  <span id="fourtherrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-6">COCOGEN SALES PROMOTIONS are exciting and attractive. <span id="fiftherrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-6">The COCOGEN COMPENSATION/COMMISSION rates I receive remain competitive. <span id="sixtherrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-6">COCOGEN insurance rates remain competitive. <span id="sevenerrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-6">COCOGEN HEAD OFFICE CUSTOMER SERVICE STAFF handled my concerns well and courteously. <span id="nintherrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-3">I am happy with my ACCOUNT ASSOCIATE.  <span id="tentherrormessage" style="color: red;display: none;"> *Required</span></div>                                
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
                            <div class="col-sm-9">
                                <label for="textremarks">
                                    What else would you like to share with us to help improve your experience with COCOGEN?
                    
                                  </label> 
                                <textarea id="Remarks_others" name="Remarks_others" class="form-control" ></textarea>
                            </div>
                        </div>

                         <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-3">
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
                                    <button id="btnsubmitannualsurvey" name="btnsubmitannualsurvey" type="submit" class="btn-success form-control">Submit</button>
                    
                                  </label> 
                            </div>
                        </div>

                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12">
                            <div class="col-sm-9" style="text-align: center">
                                <label for="textremarks">
                                    <strong>Thank you for taking our survey! </strong><br>
                                    <strong>We appreciate your business and want to make sure we meet your expectations.</strong><br>
                    
                                  </label> 
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
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

        // if(firstRowRemarks == ""){
        //     $('#firstRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#firstRowRemarks').css('border-color', '');                   
        // }

        // if(SecondRowRemarks == ""){
        //     $('#SecondRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#SecondRowRemarks').css('border-color', '');                   
        // }

        // if(ThirdRowRemarks == ""){
        //     $('#ThirdRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#ThirdRowRemarks').css('border-color', '');                   
        // }

        // if(FourthRowRemarks == ""){
        //     $('#FourthRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#FourthRowRemarks').css('border-color', '');                   
        // }

        // if(FifthRowRemarks == ""){
        //     $('#FifthRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#FifthRowRemarks').css('border-color', '');                   
        // }

        // if(SixthRowRemarks == ""){
        //     $('#SixthRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#SixthRowRemarks').css('border-color', '');                   
        // }

        // if(SevenRowRemarks == ""){
        //     $('#SevenRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#SevenRowRemarks').css('border-color', '');                   
        // }

        // if(NinthRowRemarks == ""){
        //     $('#NinthRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#NinthRowRemarks').css('border-color', '');                   
        // }

        // if(TenthRowRemarks == ""){
        //     $('#TenthRowRemarks').css('border-color', '#F44336');            
        //     error = 1;           
        // }else{ 
        //     $('#TenthRowRemarks').css('border-color', '');                   
        // }

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
@endsection
