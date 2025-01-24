@extends('layouts.app')

@section('content')

	 <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/inquiries/feedback">
                <div class="page-banner-wrapper">
                    <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/feedback_1.png') }}');"> 
                    </div>
                    <div class="text-banner-wrapper">
                        <h3 class="short-description">
                            <p class="hide">
                                hide</p>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category40"><a href="{{ url('/inquiries') }}" title="">Inquiries</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category45"><strong>Feedback</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($errors) > 0)
                  <br><br>
                        <div class="col-md-12 col-md-offset-0" style="text-align: left;font-family: muli;">
                            <div class="error-msg">
                              <i class="fa fa-times-circle"></i>
                            
                           <?php 
                              $idname = "";

                              if($errors->first('fName') === "The name format is invalid."){
                                    $message = "The email must be a valid email address.";
                                }elseif($errors->first('lName') === "The name format is invalid."){
                                    $message = "The email must be a valid email address.";                                
                                }elseif($errors->first('email') === "The email must be a valid email address."){
                                    $message = "The name format is invalid.";
                                }else{
                                    if($errors->has('fName')){
                                      $idname = "first name";
                                    }

                                    if($errors->has('lName')){
                                      if($idname){
                                        $idname = $idname .", last name";
                                      }else{
                                        $idname = "last name";
                                      }                
                                    }

                                    if($errors->has('mobileNumber')){
                                      if($idname){
                                        $idname = $idname .", mobile no.";
                                      }else{
                                        $idname = "mobile no.";
                                      }                
                                    }

                                    if($errors->has('homeAddress')){
                                      if($idname){
                                        $idname = $idname .", home no.";
                                      }else{
                                        $idname = "home no.";
                                      }                
                                    }

                                    if($errors->has('email')){
                                      
                                      if($idname){
                                        $idname = $idname .", email";
                                      }else{
                                        $idname = "email";
                                      }            
                                    }

                                    if($errors->has('g-recaptcha-response')){
                                      
                                      if($idname){
                                        $idname = $idname .", g-recaptcha-response";
                                      }else{
                                        $idname = "g-recaptcha-response";
                                      }            
                                    }

                                    if($errors->has('message')){
                                      
                                      if($idname){
                                        $idname = $idname .", message";
                                      }else{
                                        $idname = "message";
                                      }            
                                    }


                                   $message  = "The ".$idname." field is required.";
                                }

                              
                            
                            ?> 
                              {{$message}}
                            </div>
                        </div> 
                        <br><br>  
                @endif



@if(session('message'))
        <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;font-family: muli">
            <div class='alert bg bg-success'>
                  <i class="fa fa-check-circle"></i> 
                {{session('message')}}
            </div>
        </div>
        <br>    <br> 
    @endif
 @if(session('messagefailed'))
    <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;font-family: muli;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{session('messagefailed')}}
            </div>
        </div>
        <br><br> 
       
@endif

            <div class="category-name container">
                <h1>
                    Feedback
                </h1>
            </div>
           <!--  <div class="category-banner container">
               Your feedback is valuable to us as we are constantly looking for ways to continue to improve our products and services for your customer satisfaction.
            </div> -->
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="page-title category-title">
                        <h1>
                            Feedback</h1>
                    </div>
                    <div class="text-center">
                        <p>
                            Your feedback is valuable to us as we are constantly looking for ways to continue
                            to improve our products and services for your customer satisfaction.</p>
                    </div>
                    <p>
                    </p>
                    <div class="feedback-form mega-form-builds" style="font-family: muli;">
                        <form onsubmit="return validateRecaptcha();" class="form-horizontal" id="feedback-form"
                        method="post" action="{{route('feedbacksave')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-6 {{ $errors->has('fName') ? ' has-error' : '' }}">
                            <label for="fName" class="hide">
                                First Name</label>
                            <input type="text" class="form-control required-entry validate-alpha-only" placeholder="First Name *" maxlength="200" 
                                name="fName" id="fName" value="{{old('fName')}}">
                        </div>
                        <div class="col-md-12 sp-only">
                            <br>
                        </div>
                        <div class="col-md-6  {{ $errors->has('lName') ? ' has-error' : '' }}">
                            <label for="lName" class="hide">
                                Last Name</label>
                            <input type="text" class="form-control required-entry validate-alpha-only" placeholder="Last Name *" maxlength="200"
                                name="lName" id="lName" value="{{old('lName')}}">
                        </div>
                      
                        <div class="col-md-12">
                        	<br>
                        </div>
                        <div class="col-md-6  {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="hide">
                                Email</label>
                            <input type="text" class="form-control required-entry validate-email" placeholder="Email Address *" maxlength="200"
                                name="email" id="email" value="{{old('email')}}">
                        </div>
                         <div class="col-md-12 sp-only">
                            <br>
                        </div>
                        <div class="col-md-6 {{ $errors->has('mobileNumber') ? ' has-error' : '' }}">
                            <input type="text" class="form-control required-entry validate-customContact" placeholder="Contact Number *"
                                name="mobileNumber" id="mobileNumber" value="{{old('mobileNumber')}}" maxlength="100">
                            <label for="mobileNumber" class="field-item-note">
                                Sample Format: 02-1234567 or 63-1234567890</label>
                        </div>
                       <div class="col-md-12">
                        	<br>
                        </div>
                        <div class="col-md-12 {{ $errors->has('homeAddress') ? ' has-error' : '' }}">
                            <label for="homeAddress" class="hide">
                                Home Address</label>
                            <input type="text" class="form-control validate-alphanum-only" placeholder="Home Address"
                                name="homeAddress" id="homeAddress" value="{{old('homeAddress')}}">
                        </div>
                        <div class="col-md-12">
                        	<br>
                        </div>
                        <div class="col-md-12 {{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="hide">
                                Message</label>
                            <textarea rows="5" name="message" id="message" class="form-control required-entry"
                                placeholder="Message *">{{old('message')}}</textarea>
                        </div>
                        <div class="col-md-12">
                            <br>
                        </div>
                        <div class="col-md-12">
                            <div class="g-recaptcha" data-sitekey="6Lfl1cMUAAAAANJEoCM5_TMjiuVVcyDkw279Kb_z">
                            </div>
                        </div>
                        
                      <div class="col-md-12">
                        	<br>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-left">
                                <input name="executed" type="hidden" value="0" class="executed">
                                <input name="form_key" type="hidden" value="ZY7EpHbnCOWHmM5g">
                                <input type="submit" class="btn btn-primary" value="SEND">
                            </div>
                        </div>
                        </form>

                        <script type="text/javascript">
                            //<![CDATA[
                            var dataForm = new VarienForm('feedback-form', true);
                            //]]>
                            var onloadCallback = function() {
                                grecaptcha.render('html_element', {
                                    'sitekey': '6Lfl1cMUAAAAANJEoCM5_TMjiuVVcyDkw279Kb_z'
                                });
                            };
                            function validateRecaptcha() {
                                var response = grecaptcha.getResponse();
                                if (response.length === 0) {
                                    alert("Please confirm if you're not a robot.");
                                    return false;
                                } else {
                                    //alert("validated");
                                    return true;
                                }
                            }
	</script>

                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"   async defer>
                        </script>

                    </div>
                    <p>
                    </p>
                </div>
            </div>
        </div>
@endsection
