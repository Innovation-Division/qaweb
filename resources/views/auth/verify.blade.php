@extends('layouts.app')

@section('content')
<style type="text/css">
    .login-wrap .tab-content,
.forgotpassword-wrap .tab-content,
.resetpassword-wrap .tab-content,
.edit-modals .modal-content {
  background: #fff;
  border-radius: 8px;
  -webkit-border-radius: 8px;
  border: 2px solid #62bb46;
  margin-top: -50px;
  margin-left: 50%;
  width: 100%;
  height: 65vh;  
  width: 100%;
}

@media (min-width:0px) and (max-width: 800px) {
.login-wrap .tab-content,
.forgotpassword-wrap .tab-content,
.resetpassword-wrap .tab-content,
.edit-modals .modal-content {
 background: #fff;
  border-radius: 8px;
  -webkit-border-radius: 8px;
  border: 2px solid #62bb46;  
  height: 90vh;
  margin-top: -50px;
  margin-left: 0%;
  
}


</style>
       @if($errors->first('password') === "This field is required.")
         <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;font-family: muli;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
                The password is request!
            </div>
        </div> 
        <br><br>
    @elseif($errors->has('password'))
         <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;font-family: muli;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('password')}}
            </div>
        </div> 
        <br><br>
    @elseif ($errors->has('confirmation'))
        <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;font-family: muli;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('confirmation')}}
            </div>
        </div>
        <br><br> 
    @endif

@if(session('message'))
        <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;font-family: muli">
            <div class='alert bg bg-success'>
                  <i class="fa fa-check-circle"></i> 
                {{session('message')}} in  <span id="counter">10</span> second(s),<a href="https://www.cocogen.com/epolicy"> click here</a>.

                  <script type="text/javascript">
                  function countdown() {
                      var i = document.getElementById('counter');
                      if (parseInt(i.innerHTML)<=0) {
                          location.href = 'https://www.cocogen.com/epolicy';
                      }
                  if (parseInt(i.innerHTML)!=0) {
                      i.innerHTML = parseInt(i.innerHTML)-1;
                  }
                  }
                  setInterval(function(){ countdown(); },1000);
                  </script>
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

<div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">  
                    <div class="account-login">
                        <div class="row">
                            <div class="col-sm-6 col-xs-11 login-wrap" >
                                
                                   
                                <!-- Tab panes -->
                                <div class="tab-content ">
                                    
                                  
                                    <div class="tab-pane fade in active" id="ecommerce" role="tabpanel">
                                        <form method="POST" action="{{ route('resetpasswordsave') }}">
                                        @csrf
                                        <input name="form_key" type="hidden" value="Jw9Lv4O4rXKWO6fq">
                                        <div class="registered-users mega-form-builds">
                                            <div class="content">
                                                <h1>
                                                   <span class="span-modal">RESET YOUR PASSWORD</span>
                                                </h1>
                                                <!-- <p class="text-center">Don't worry! Enter your email address below and we will help you retrieve access to your account.</p> -->
                                                <ul class="form-list">
                                                    <li>
                                                        <div class="input-box">
                                                            <input type="password" class="input-text required-entry validate-admin-password" placeholder="New password" name="password" id="password" autocomplete="off"/>
                                                        </div>
                                                        <div class="input-box">
                                                            <input type="password" class="input-text required-entry validate-cpassword" name="confirmation" id="confirmation" placeholder="Confirm password"   autocomplete="off"/>
                                                        </div>

                                             
                                                    </li>
                                                    
                                                    <li>
                                                        <button type="submit" class="btn btn-default current" title="Login" name="send" id="send2">
                                                            Reset</button>
                                                    </li>
                                                     <div class="form-group row mb-0">
                            
                                                    <li class="forgot-password"><a href="{{ url('/epolicy')}}">
                                                        << Back to Login</a> </li>
                                                    <li class="e-policy-link" style="display: none;"><span>For UCPB GEN policyholders who
                                                        have been issued an ePolicy link via email, you may access your accounts through
                                                        this <a href="https://www.ucpbgen.com/login/login_epolicy.aspx">link</a>.</span>
                                                    </li>
                                                </ul>

                                             

                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="netsol-site-seal text-center">
                                   
                                    <p>
                                        Your security is our prime concern and we work hard to ensure the safety of online
                                        transactions done at our website. UCPB GEN implements best security practices to
                                        protect your account information. Your privacy is important to us and we do not
                                        solicit client information to other third parties.Click the security badge above
                                        to view site security information.</p>
                                    <ul>
                                        <!-- <li><a href="/inquiries/customer-service">contact us</a></li>
                                        <li><a href="/terms-and-conditions">terms and conditions</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
@endsection
