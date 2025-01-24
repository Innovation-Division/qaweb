@extends('layouts.app')

@section('content')


</script>
	<style type="text/css">
    
    </style>

    @if(session('message') )
        <br><br>
        <div class="col-md-12" style="text-align: left;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{session('message')}}
            </div>
        </div> 
    @endif              <div class="top-container">
                        <div class="category-name container">
                            <div class="row text-center">
                             
                                <h1>
                                    CTPL INSURANCE QUOTE</h1>
                            </div>
                        </div>
                       <br>
                      
                    </div>

                

                    ﻿﻿<link rel="stylesheet" href="{{ asset('/css/bootstrapValidator.css') }}">
                    
                   
                   
                 
                </div>
            </div>
        </div>
<style type="text/css">
            :root {
              --primary: hsl(0, 0%, 90%);
              --accent: hsl(35, 100%, 63%);
              --text: hsl(0, 0%, 17%);
            }

            .checkbox {
              display: inline-flex;
              align-items: center;
              cursor: pointer;
              border-color: black;
            }

            .checkbox__native {
              display: none;
              border-color: black;
            }

            .checkbox__native:checked + .checkbox__custom {
              background-color:green;
              border-color:green;
            }

            .checkbox__custom {
              width: 1.3em;
              height: 1.3em;
              border: 3px solid var(--primary);
              border-radius: 3px;
              margin-right: 10px;
              display: flex;
              justify-content: center;
              align-items: center;
              flex-shrink: 0;
              transition: all 0.1s;
            }

            .checkbox__custom::after {
              content: '\2714';
              color: white;
              border-color: black;
            }
</style>
<?php 
 //dd($locations);
if($errors->has('mvFIleNo') 
  || $errors->has('plateNo') 
  || $errors->has('engineNO') 
  || $errors->has('make') 
  || $errors->has('chassisNo') 
  || $errors->has('bodyType')
  || $errors->has('year') ){
  session()->flash('tab', 'tab2');
}



if($errors->has('birthDate') 
  || $errors->has('tinNo') 
  || $errors->has('province')
  || $errors->has('city')
  || $errors->has('barangay')
  || $errors->has('Address')){
  session()->flash('tab', 'tab3');
}

if(session('tab')){

    if(session('tab') === "tab2"){ 

         $tab1 = "class=". strip_tags('"btn btn-success past"'); 
         $tab2 = "class=". strip_tags('"btn btn-default current"'); 
         $tab3 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane active"');
         $act3 = "class=". strip_tags('"tab-pane"');

         $tab1next = "btntab1update";
         $tab2next = "btntab3";
         
    }else if(session('tab') === "tab2back"){ 

         $tab1 = "class=". strip_tags('"btn btn-default current"'); 
         $tab2 = "class=". strip_tags('"btn btn-success"'); 
         $tab3 = "class=". strip_tags('"btn btn-success"'); 

         $act1 = "class=". strip_tags('"tab-pane active"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');

         $tab1next = "btntab1update"; 
         $tab2next = "btntab1update"; 

    }else if(session('tab') === "tab3back"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"'); 
         $tab2 = "class=". strip_tags('"btn btn-default current"'); 
         $tab3 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane active"');
         $act3 = "class=". strip_tags('"tab-pane "');

         $tab1next = "btntab1update";
         $tab2next = "btntab1update";
   
    }else if(session('tab') === "tab3"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"'); 
         $tab2 = "class=". strip_tags('"btn btn-success past"'); 
         $tab3 = "class=". strip_tags('"btn btn-default current"'); 

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane active"');

         $tab1next = "btntab1update";
         $tab2next = "btntab1update";

    }else if(session('tab') === "tab1back"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"'); 
         $tab2 = "class=". strip_tags('"btn btn-default current"'); 
         $tab3 = "class=". strip_tags('"btn btn-success" disabled');

         $act1 = "class=". strip_tags('"tab-pane active"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');

         $tab1next = "btntab1update";
         $tab2next = "btntab1update";

        
        
    }else{
         $tab1 = "class=". strip_tags('"btn btn-default current"'); 
         $tab2 = "class=". strip_tags('"btn btn-success" '); 
         $tab3 = "class=". strip_tags('"btn btn-success"'); 

         $act1 = "class=". strip_tags('"tab-pane active"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');

         $tab1next = "btntab1";
         $tab2next = "btntab1update";
    }
}else{
         $tab1 = "class=". strip_tags('"btn btn-default current"'); 
         $tab2 = "class=". strip_tags('"btn btn-success"'); 
         $tab3 = "class=". strip_tags('"btn btn-success"'); 

         $act1 = "class=". strip_tags('"tab-pane active"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');

         $tab1next = "btntab1";
         $tab2next = "btntab1update";
}

if(session('cocogen_ctpl_clientinfo')){
        $cocogen_ctpl_clientinfo = session('cocogen_ctpl_clientinfo'); 

        $firstName = $cocogen_ctpl_clientinfo[0]['firstName'];
        $middleName = $cocogen_ctpl_clientinfo[0]['middleName'];
        $lastName = $cocogen_ctpl_clientinfo[0]['lastName'];
        $contactNo = $cocogen_ctpl_clientinfo[0]['contactNo'];
        $emailAddress = $cocogen_ctpl_clientinfo[0]['emailAddress'];
}else{       
        $firstName = "";
        $middleName = "";
        $lastName = "";
        $contactNo = "";
        $emailAddress ="";
}

   
   
 ?>

  

<div id="exTab3" class="container quote-process1"> 
    <ul class="quote-process">
            
              <li <?php echo $tab1 ?>  name="getquote1" ><span>Quote Request</span>  </li> 
              <li  <?php echo $tab2 ?>  name="additional1"><span style="width: 170px;" >Car Infomation</span></li>
              <li <?php echo $tab3 ?>  name="personal1"><span >Personal Information</span></li>
            
          <!--   <li class="btn btn-success" name="checkout"><a href="#4b" data-toggle="tab"><span>Summary &amp; Confirmation</span>></a></li>  -->
    </ul>
    <form class="inline-form" role="form" method="post" action="{{ route('saveequotemotor') }}" enctype="multipart/form-data">
       {{ csrf_field() }} 

      <input type="hidden" name="hidURL" name="hidURL" value="{{url('/')}}">
      <input type="hidden" id="tnxid" name="tnxid" value="{{session('tnxid')}}">
      <input type="hidden" id="tabmax" name="tabmax" value="{{session('tabmax')}}">
      <input type="hidden" name="totalvalhid"     id="totalvalhid"  value="{{session('totalvalhid')}}" >
        <div class="tab-content clearfix"  style="text-align: left;font-family: muli;">
       
            <div id="quoteRequest" <?php echo $act1 ?> >
               <div class="form-group{{ $errors->has('purchaseDate') ? ' has-error' : '' }}">    
                        <style type="text/css">
                            input[type=checkbox] + label {
                              display: block;
                              margin: 0.2em;
                              cursor: pointer;
                              padding: 0.2em;
                               
                            }

                            input[type=checkbox] {
                              display: none;
                            }

                            input[type=checkbox] + label:before {
                              content: "\2714";
                              border: 0.1em solid #808080;
                              border-radius: 0.2em;
                              display: inline-block;
                              width: 1.5em;
                              height: 1.5em;
                              padding-left: 0.2em;
                              padding-bottom: 0.3em;
                              margin-right: 0.2em;
                              vertical-align: bottom;
                              color: transparent;
                              transition: .2s;

                            }

                            input[type=checkbox] + label:active:before {
                              transform: scale(0);
                            }

                            input[type=checkbox]:checked + label:before {
                              background-color: MediumSeaGreen;
                              border-color: MediumSeaGreen;
                              color: #fff;
                            }

                            input[type=checkbox]:disabled + label:before {
                              transform: scale(1);
                              border-color: #aaa;
                            }

                            input[type=checkbox]:checked:disabled + label:before {
                              transform: scale(1);
                              background-color: #bfb;
                              border-color: #bfb;
                            }
                        </style>  
                            <input type="checkbox" id="CBnEWcAR" name="CBnEWcAR" value="1"  <?php if(old('CBnEWcAR')){ echo "checked";} ?> >
                            <label for="CBnEWcAR"> My car is brand new</label>
                            <div class="col-md-12">
                                  <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-datetimepicker.min.css') }}" />
                                  <link rel="stylesheet" href="{{ asset('/css/datepick/font-awesome.min.css') }}" />
                                  <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-theme.min.css') }}" />
                                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
                                          <div class="col-md-4">
                                              <script type="text/javascript">
                                                var j = jQuery.noConflict();
                                                jQuery(function () {
                                                  jQuery('#purchaseDate').datetimepicker({
                                                    format: 'YYYY-M-D',
                                                    disabledHours: false,
                                                    pickTime: false, 
                                                    
                                                  });
                                                });
                                                var j = jQuery.noConflict();
                                                jQuery(function () {
                                                  j('#birthDate').datetimepicker({
                                                    format: 'YYYY-M-D',
                                                    disabledHours: true,
                                                    endDate: '-18y'
                                                  });
                                                });
                                          </script>
                                          <input id="purchaseDate" type="text" class="form-control date" maxlength="10" name="purchaseDate" value="{{ old('purchaseDate') }}" placeholder="Purchase Date">
                                              @if ($errors->has('purchaseDate'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('purchaseDate') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                              </div>
                    </div>
                <div class="col-md-12 break-two">
                      <br>    
                  </div>  
                 <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Personal Information</h4>
                            </div>
              <div class="col-md-12 break-two">
                      <br>    
                  </div>  
                  <div class="sp-only"><br></div>

              <div class="container">               
                        <div class="form-group  {{ $errors->has('firstName') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="firstName" type="text" class="form-control" name="firstName" maxlength="50" value="{{ old('firstName') }}" placeholder="First Name*">
                                    @if ($errors->has('firstName'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('lastName') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="lastName" type="text" class="form-control" name="lastName" maxlength="50" value="{{ old('lastName') }}" placeholder="Last Name*">
                                    @if ($errors->has('lastName'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('middleName') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="middleName" type="text" class="form-control" name="middleName" maxlength="50" value="{{ old('middleName') }}" placeholder="Middle Name*">
                                    @if ($errors->has('middleName'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('middleName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                </div>


                 
                <div class="col-md-12 break-two pc-only">
                            <br>    
                        </div> 
                <div class="container">               
                        <div class="form-group  {{ $errors->has('contactNo') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="contactNo" type="text" class="form-control" maxlength="100" name="contactNo" onkeypress="return isNumberKey(event)" value="{{ old('contactNo') }}" placeholder="Contact Number">
                                    @if ($errors->has('contactNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('contactNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('emailAddress') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="emailAddress" type="text" class="form-control" maxlength="50" name="emailAddress" value="{{ old('emailAddress') }}" placeholder="Email Address*">
                                    @if ($errors->has('emailAddress'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('emailAddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                       
                </div>
                <div class="col-md-12 break-two">
                    <br>    
                </div> 
                    <div class="" style="margin-top: 50px;opacity: 0.8">
                                <h4>CTPL Information</h4>
                            </div>
                <div class="container">
                    <div class="form-group  {{ $errors->has('policyType') ? ' has-error' : '' }} fieldset-group has-feedback">                            
                                <div class="col-md-4">
                                    <select  id="policyType" name="policyType" class="form-control dynamicpolicyType" style="font-family: muli">
                                        <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Policy Type * </option>
                                         @if (old('policyType'))
                                             <option value="{{ old('policyType') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected">{{ old('policyType') }}</option>                                             
                                        @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Vehicle Type *</option>
                                        @endif

                                        <option value="Car" >Car</option>
                                        <option value="Shuttle Bus">Shuttle Bus</option>
                                        <option value="Light Electric Vehicle">Light Electric Vehicle</option> 
                                        <option value="Motorcycle without Side Car">Motorcycle without Side Car</option>  
                                        <option value="Mopeds (0-49 cc)">Mopeds (0-49 cc)</option> 
                                        <option value="Motorcycle with side car">Motorcycle with side car</option>  
                                        <option value="Non-Conventional MC (Car)">Non-Conventional MC (Car)</option>
                                        <option value="Non-Conventional MV (UV)">Non-Conventional MV (UV)</option> 
                                        <option value="Tourist Bus">Tourist Bus</option> 
                                        <option value="School Bus">School Bus</option> 
                                        <option value="Sports Utility Vehicle">Sports Utility Vehicle</option>
                                        <option value="Truck Bus">Truck Bus</option>
                                        <option value="Tricycle">Tricycle</option> 
                                        <option value="Truck">Truck</option>  
                                        <option value="Trailer">Trailer</option> 
                                        <option value="Utility Vehicle">Utility Vehicle</option>     
                                            
                                    </select>
                                    @if ($errors->has('policyType'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('policyType') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="sp-only"><br></div>
                                <div class="col-md-4">
                                    <select  id="mvType" name="mvType" class="form-control dynamic" style="font-family: muli">
                                          @if (old('mvType'))
                                             <option value="{{ old('mvType') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('mvType') }}</option>                                             
                                            @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>MV Type *</option>
                                          @endif
                                             
                                    </select>
                                    @if ($errors->has('mvType'))
                                        <span class="help-block" style="color: #B22222;opacity: 0.9;">
                                                <strong>{{ $errors->first('mvType') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                 <div class="sp-only"><br></div>
                                  <div class="col-md-4">
                                   <input id="premAmount" name="premAmount" type="text" class="form-control" maxlength="100" min="1" max="10" value="{{ old('premAmount') }}" placeholder="Premium *" readonly="readonly">
                                  
                                </div>                          
                    </div>
                    <div class="col-md-12 break-two">
                            <br>    
                    </div> 

                    <div class="form-group  {{ $errors->has('mvType') ? ' has-error' : '' }} fieldset-group has-feedback" style="margin-top: 20px;">
                            <div class="col-md-12">
                                
                            </div>
                    </div>
                       <style type="text/css">
                          @-moz-document url-prefix() {
                          select.customselect {
                          padding-right: 25px;
                          background-image: url("");
                          background-repeat: no-repeat;
                          background-position: calc(100% - 7px) 50%;
                          -moz-appearance: none;
                          appearance: none;
                          }
                       </style>
                        <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                    

                     
                            
                       
                           
                  </div>
                    <div class="" style="margin-top: 20px;margin-bottom: -5px;opacity: 0.8">
                             <h4>Promo Code</h4>
                                  </div>
                            <div class="container" style="margin-top: 20px;">  
                            
                              <div class="form-group  {{ session('promoCodeError') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-4">
                                    <input id="promoCode" name="promoCode" type="text" class="form-control" maxlength="100"  value="{{ old('promoCode') }}" placeholder="Promo Code">
                                    @if (session('promoCodeError'))
                                        <span class="help-block">
                                               <strong>{{ session('promoCodeError') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>
                            </div>

                  <div class="form-group" style="margin-top: 40px;margin-bottom: 25px;">
                       <div class="col-md-8 col-md-offset-5">
                          <button id="firstTabBtutton"  name="firstTabBtutton" type="submit" class="btn btn-primary" style="width: 140px;"
                                    value="{{$tab1next}}">Next</button>                               
                                    
                        </div>
                  </div>
                  <div class="col-md-12 break-two">
                      <br>    
                  </div>  


                </div>

            <div id="vehicleInfo" <?php echo $act2 ?> >  
                  <div class="" style="margin-top: 20px;">
                                <h4>Certificate of Registration Details</h4>

                  </div> 
                        <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                    <div class="container">
                    <span style="margin-top: 100px;">  </span>    
                    <div class="form-group  {{ $errors->has('year') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="year" type="text" class="form-control" name="year" maxlength="4" value="{{ old('year') }}" placeholder="Year*" onkeypress="return isNumberKey(event)">
                                    @if ($errors->has('year'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                    <div class="form-group  {{ $errors->has('make') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="make" type="text" class="form-control" maxlength="50" name="make" value="{{ old('make') }}" placeholder="Make*">
                                    @if ($errors->has('make'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('make') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>                   
                        <div class="form-group  {{ $errors->has('mvFIleNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="mvFIleNo" type="text" class="form-control" maxlength="15" name="mvFIleNo" value="{{ old('mvFIleNo') }}" placeholder="MV File No*" onkeypress="return isNumberKey(event)">
                                    @if ($errors->has('mvFIleNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('mvFIleNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                      
                    </div>
                     <div class="col-md-12 break-two pc-only">
                            <br>    
                        </div> 
                    <div class="container">  
                      <div class="form-group  {{ $errors->has('chassisNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="chassisNo" type="text" class="form-control" maxlength="20" name="chassisNo" value="{{ old('chassisNo') }}" placeholder="Chassis No*">
                                    @if ($errors->has('chassisNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('chassisNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group  {{ $errors->has('plateNo') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="plateNo" type="text" class="form-control" maxlength="10" name="plateNo" value="{{ old('plateNo') }}" placeholder="Plate No*">
                                    @if ($errors->has('plateNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('plateNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('engineNO') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="engineNO" type="text" class="form-control" maxlength="20" name="engineNO" value="{{ old('engineNO') }}" placeholder="Engine No*">
                                    @if ($errors->has('engineNO'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('engineNO') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                   <!--    <div class="form-group  {{ $errors->has('bodyType') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="bodyType" type="text" class="form-control"  maxlength="100" name="bodyType" value="{{ old('bodyType') }}" placeholder="Body Type*">
                                    @if ($errors->has('bodyType'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('bodyType') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>  -->
                    </div>
                   <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                                     
                    <div class="form-group" style="margin-top: 50px;margin-bottom: 50px;">
                                <div class="col-md-8 col-md-offset-5">
                                   <!--  <button id="SecondTabButtonBack"  name="SecondTabButtonBack" type="submit" class="btn btn-primary" style="width: 140px;" value="tab2back">Back</button>  --> 
                                    <button id="SecondTabBtuttonNext"  name="SecondTabBtuttonNext" type="submit" class="btn btn-primary" style="width: 140px;" value="{{$tab2next}}">Next</button>                               
                                    
                                </div>
                    </div>
                        <div class="col-md-12 break-two">
                            <br>    
                        </div>      
            </div>
            <div id="clientInfo" <?php echo $act3 ?>>
                <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Owner's Information</h4>
                            </div>
               <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                 <div class="sp-only"><br></div>
                <div class="container">               
                        <div class="form-group  {{ $errors->has('firstNameOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="firstNameOld" type="text" class="form-control" name="firstNameOld" maxlength="50" value="{{$firstName}}" readonly="readonly">
                                    @if ($errors->has('firstNameOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('firstNameOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('lastNameOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="lastNameOld" type="text" class="form-control" name="lastNameOld" maxlength="50" value="{{$lastName}}" readonly="readonly">
                                    @if ($errors->has('lastNameOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('lastNameOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('middleNameOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="middleNameOld" type="text" class="form-control" name="middleNameOld" maxlength="50" value="{{$middleName}}"  readonly="readonly">
                                    @if ($errors->has('middleNameOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('middleNameOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                </div>
                <div class="col-md-12 break-two pc-only">
                    <br>    
                </div>                 
                <div class="container">               
                        <div class="form-group  {{ $errors->has('birthDate') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="birthDate" type="text" class="form-control" maxlength="10" name="birthDate" value="{{ old('birthDate') }}" placeholder="Birthdate*">
                                    @if ($errors->has('birthDate'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('birthDate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('tinNo') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="tinNo" type="text" class="form-control" maxlength="20" name="tinNo" value="{{ old('tinNo') }}" placeholder="Tin No*">
                                    @if ($errors->has('tinNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('tinNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                       
                </div>
                <div class="col-md-12 break-two">
                    <br>    
                </div> 
                <div class="" style="margin-top: 50px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Mailing Address *</h4>
                            </div>
               
                <div class="col-md-12 break-two">
                    <br>    
                </div> 
                 <div class="sp-only"><br></div>
                <div class="container">               
                        <div class="form-group  {{ $errors->has('Address') ? ' has-error' : '' }}">                           
                                <div class="col-md-12">
                                  <textarea class="form-control" name="Address" id="Address" cols="20" rows="2">{{ old('Address') }}</textarea>
                                    @if ($errors->has('Address'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('Address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>      
                </div>
                 <div class="col-md-12 break-two pc-only">
                            <br>    
                        </div> 
                <div class="container">               
                        <div class="form-group  {{ $errors->has('province') ? ' has-error' : '' }} fieldset-group has-feedback">
                           
                                <div class="col-md-4">
                                    <select  id="province" name="province" class="form-control dynamicprovince selectpicker" data-live-search="true" data-size="10" style="font-family: muli">
                                        <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Province * </option>
                                          @foreach($provinces as $province)
                                            <option value="{{$province->name}}">{{$province->name}}</option>
                                          @endforeach
                                          @if (old('province'))
                                             <option value="{{ old('province') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('province') }}</option>                                             
                                          @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Province * </option>
                                          @endif
                                    </select>
                                    @if ($errors->has('province'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('province') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group  {{ $errors->has('city') ? ' has-error' : '' }} fieldset-group has-feedback">
                           
                                <div class="col-md-4">
                                    <select  id="city" name="city" class="form-control selectpicker" data-size="10" data-live-search="true" style="font-family: muli">
                                        @if (old('city'))
                                             <option value="{{ old('city') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('city') }}</option>                                             
                                          @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>City * </option>
                                          @endif
                                        @foreach($locations as $location)
                                            <option value="{{$location->city}}" >{{$location->city}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                </div>
                
                <div class="col-md-12 break-two">
                    <br>    
                </div> 

                <div class="" style="margin-top: 50px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Contact Details</h4>
                            </div>
                <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                         <div class="sp-only"><br></div>
                <div class="container">               
                        <div class="form-group  {{ $errors->has('contactNoOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="contactNoOld" type="text" class="form-control" maxlength="100" name="contactNoOld" value="{{$contactNo}}" readonly="readonly">
                                    @if ($errors->has('contactNoOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('contactNoOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('emailAddressOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="emailAddressOld" type="text" class="form-control" maxlength="50" name="emailAddressOld" value="{{ $emailAddress }}" readonly="readonly">
                                    @if ($errors->has('emailAddressOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('emailAddressOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                       
                </div>
                <div class="col-md-12 break-two">
                    <br>    
                </div> 

               <br>  
   
                <input type="checkbox" id="CBPrivacy" name="CBPrivacy" value="1"  <?php if(old('CBPrivacy')){ echo "checked";} ?> >
                <label for="CBPrivacy"> I AGREE with the <a href="#" data-toggle="modal"  data-target="#privacyPolicy"> Privacy Policy</a></label>
              
                <input type="checkbox" id="CBTerms" name="CBTerms" value="1"  <?php if(old('CBTerms')){ echo "checked";} ?> >
                <label for="CBTerms"> I AGREE to the  <a href="#" data-toggle="modal" data-target="#termsConditions"> Terms & Conditions</a></label>
                
                <input type="checkbox" id="CBExclusion" name="CBExclusion" value="1"  <?php if(old('CBExclusion')){ echo "checked";} ?> >
                <label for="CBExclusion"> I AGREE with the <a href="#" data-toggle="modal" data-target="#exclusionslimitations" > Exclusion & Limitations</a></label>
                
                
                <div class="" style="margin-top: 20px;margin-left: 10px;opacity: 0.7">
                                <p>Before we take you to the payment page, please take time read and understand our Privacy Policy, Terms & Condition, and Exclusion & Limitations. To continue, just click on the "I AGREE" tick boxes above. Otherwise, you can exit this page at anytime through your browser window.</p>
                            </div>
                             <br>
                    <p>Help support our cause in saving the environment! Your donation will help protect Magilas, a critically endangered Philippine Eagle.  <a href="#" data-toggle="modal" data-target="#magilasInfo">Learn more</a>.</p>
                            <div class="col-md-12"> 
                        <div class="col-md-2" style="margin-left: -30px"> 
                            <input type="checkbox" id="CBMagilas" name="CBMagilas" value="1"   <?php if(old('CBMagilas')){ echo "checked";} ?> >
                            <label for="CBMagilas"> I want to donate </label>
                        </div>
                        <script>
                               jQuery(document).ready(function(){
                                        // Jquery Dependency
                                   jQuery("input[name='otherMagilas']").on({
                                        keyup: function() {
                                          formatCurrency(jQuery(this));
                                        },
                                        blur: function() { 
                                          formatCurrency(jQuery(this), "blur");
                                        }
                                    });


                                    function formatNumber(n) {
                                      // format number 1000000 to 1,234,567
                                      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                    }


                                    function formatCurrency(input, blur) {
                                      // appends $ to value, validates decimal side
                                      // and puts cursor back in right position.
                                      
                                      // get input value
                                      var input_val = input.val();
                                      
                                      // don't validate empty input
                                      if (input_val === "") { return; }
                                      
                                      // original length
                                      var original_len = input_val.length;

                                      // initial caret position 
                                      var caret_pos = input.prop("selectionStart");
                                        
                                      // check for decimal
                                      if (input_val.indexOf(".") >= 0) {

                                        // get position of first decimal
                                        // this prevents multiple decimals from
                                        // being entered
                                        var decimal_pos = input_val.indexOf(".");

                                        // split number by decimal point
                                        var left_side = input_val.substring(0, decimal_pos);
                                        var right_side = input_val.substring(decimal_pos);

                                        // add commas to left side of number
                                        left_side = formatNumber(left_side);

                                        // validate right side
                                        right_side = formatNumber(right_side);
                                        
                                        // On blur make sure 2 numbers after decimal
                                        if (blur === "blur") {
                                          right_side += "00";
                                        }
                                        
                                        // Limit decimal to only 2 digits
                                        right_side = right_side.substring(0, 2);

                                        // join number by .
                                        input_val = left_side + "." + right_side;

                                    } else {
                                        // no decimal entered
                                        // add commas to number
                                        // remove all non-digits
                                        input_val = formatNumber(input_val);
                                       // input_val = "$" + input_val;
                                        
                                        // final formatting
                                        if (blur === "blur") {
                                          input_val += ".00";
                                        }
                                      }
                                      
                                      // send updated string to input
                                      input.val(input_val);

                                      // put caret back in the right position
                                      var updated_len = input_val.length;
                                      caret_pos = updated_len - original_len + caret_pos;
                                      input[0].setSelectionRange(caret_pos, caret_pos);
                                    }

                                    var magilas1 = jQuery( ".selectmagilas" ).val();
                                        if(magilas1 === "Others"){
                                                jQuery(".otherdivMagilas").show();
                                            }else{
                                                jQuery(".otherdivMagilas").hide();
                                        }                                        
                                    jQuery('.selectmagilas').change(function(){                                        
                                        if(jQuery(this).val() != '')
                                        {                
                                             var magilas = jQuery(this).val();
                                             if(magilas === "Others"){
                                                jQuery(".otherdivMagilas").show();
                                             }else{
                                                jQuery(".otherdivMagilas").hide();
                                             }        
                                       
                                        }
                                       }); 
                                });
                        </script>

                        <div class="col-md-2 divmagilas" style="margin-left: -30px" > 
                            <select  id="drpMagilas" name="drpMagilas" class="form-control selectmagilas" style="font-family: muli;">
                                @if (old('drpMagilas'))
                                     <option value="{{ old('drpMagilas') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('drpMagilas') }}</option>                                             
                                @else
                                    <option value="10.00" selected="selected" style="display:none;" disabled="disabled" readonly>Php 10.00</option>
                                @endif
                                     <option value="10.00" >Php 10.00</option>
                                     <option value="50.00" >Php 50.00</option>
                                     <option value="100.00" >Php 100.00</option>
                                     <option value="Others" >Others</option>                                         
                            </select> 
                        </div>
                        <div class="col-md-2 otherdivMagilas" style="margin-left: -20px">  
                            <input id="otherMagilas" name="otherMagilas" type="text" class="form-control magilas btn-xs" maxlength="100" min="1" max="10" value="{{ old('otherMagilas') }}" placeholder="*minimum of Php 5.00">
                        </div>

                        <div class="col-md-2" style="margin-left: -20px;margin-top: 10px;"> 
                           to Magilas.
                        </div>
                    </div>

                          <style type="text/css">
                              div.magilas{
                             
                                width: 1px;
                              }
                          </style><br>
                <div class="form-group" style="margin-top: 50px;">
                                <div class="col-md-8 col-md-offset-5">
                                    <!-- <button id="ThirdTabButtonBack"  name="ThirdTabButtonBack" type="submit" class="btn btn-primary" style="width: 140px;" value="default">Back</button>   -->
                                    <button id="ThirdTabBtuttonBuy"  name="ThirdTabBtuttonBuy" type="submit" class="btn btn-primary" style="width: 140px;" value="BuyFinal">Buy</button>                               
                                    
                                </div>
                            </div>
                            <div class="col-md-12 break-two">
                            <br>    
                    </div>     

            </div>
           
        </div>
    </form>
    <div class="summary-and-confirmation-slider summary-and-confirmation-motor">
 
    <div class="modal fade bs-example-modal-lg" id="privacyPolicy" tabindex="-1" role="dialog" aria-labelledby="privacyPolicy" aria-hidden="true" >                                
      <div class="modal-dialog" >
                                    <div class="modal-content" >
                                        <div class="modal-header" >
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="privacyPolicy">
                                                Privacy Policy</h4>
                                        </div>

                                        <div class="modal-body" style="max-height: calc(105vh - 210px);overflow-y: auto;">
                                            <div class="page-title">
                                                <h1>
                                                    Privacy Policy</h1>
                                            </div>
                                            <div class="std">
                                               
                                                <p align="center">
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        &nbsp;</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">UCPB General
                                                        Insurance Company, Inc. ("COCOGEN") upholds an individual’s data privacy rights
                                                        and assures that all your </span><a href="#DefinitionOfTerms" style="font-family: arial, helvetica, sans-serif;
                                                            font-size: medium;">personal information, sensitive personal information and privileged
                                                            information (collectively, “Personal Data”)</a><span style="font-family: arial, helvetica, sans-serif;
                                                                font-size: medium;">, collected and to be collected, are processed in compliance
                                                                with the Data Privacy Act of 2012 (Republic Act No. 10173) and its Implementing
                                                                Rules and Regulations (IRR).</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">This Privacy
                                                        Statement explains how we gather, protect, use, manage, and disclose the Personal
                                                        Data that We obtain about the Company’s clients in the course of doing business,
                                                        communications in social media or as a user of this our website.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Data Gathering</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We collect
                                                        data about our existing and prospective clients when:</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        1. They register, apply for, avail of or inquire about any of our products and services;</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;&nbsp;2.
                                                        They renew their existing policies and/or they request to update personal data for
                                                        record purposes;</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We also
                                                        collect personal data&nbsp;when&nbsp;clients transact with our authorized agents,
                                                        brokers, employees, and representatives requiring the production of personal information.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">Upon application
                                                        or availing of our products, our authorized agents, employees, brokers and representatives
                                                        may&nbsp;use the data gathered&nbsp;to aid&nbsp;us in giving&nbsp;the best products
                                                        and services.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Data Collected</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">Personal&nbsp;Data
                                                        that will be collected includes, but are not limited to the following:</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;&nbsp;(1)
                                                        name, age, gender, birth date, home and/or business address, contact number, and
                                                        email address; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (2) educational background, financial background, and employment record and/or business
                                                        information; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (3) medical record and/ or information or fit to travel certificate for clients,
                                                        if necessary in availing our products.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (4) specimen signature, details and copy of government or company-issued ID, and
                                                    </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (5) other information necessary to give the needed products, and&nbsp;incidental
                                                        to the main transaction.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We collect
                                                        personal&nbsp;data that are essential and incidental to provide excellent and valuable
                                                        service that our existing and prospective clients truly deserve.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        &nbsp;</strong></span><span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>&nbsp;</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Data Protection</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">COCOGEN
                                                        adheres to the Data Privacy Act of 2012 (R.A. 10173) its Implementing Rules and
                                                        Regulations and other related issuances of the National Privacy Commission. In line
                                                        with this, We take responsibility in collecting, processing, holding or use of personal
                                                        data. We assure that all information that our clients and potential clients will
                                                        provide shall be used solely for processing their transactions with our Company,
                                                        they consented to, and for other legitimate purposes mandated by law. We shall implement
                                                        reasonable and appropriate organizational, physical, and technical security measures
                                                        for the protection of your personal data.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                        Rights as Data Subject: </span></strong>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We uphold
                                                        and recognize the rights of our clients, as data subjects, provided under the Data
                                                        Privacy Act of 2012, which are: </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        1. Right to be informed; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        2. Right to object; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        3. Right to access; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        4. Right to correct; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        5. Right to rectification, erasure or blocking; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        6. Right to damages; and </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        7. Right to data portability.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Use of information</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We use the
                                                        information provided by our clients and potential clients to:</span><strong><span
                                                            style="font-family: arial, helvetica, sans-serif; font-size: medium;"><br>
                                                        </span></strong>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        1.&nbsp;Process their application;</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        2.&nbsp;Answer their inquiries and other transactions that may be necessary or otherwise
                                                        incidental to the availment of our products and services.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        3.&nbsp;Offer other products and services of the Company that we believe to be useful
                                                        to the clients.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        4.&nbsp;Any other transactions which are normal in the course of business or as
                                                        mandated by law.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Disclosure of Information</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We may share
                                                        the Personal Data provided by our clients to our affiliates, subsidiaries and service
                                                        providers with the obligation to take care and keep all the information shared to
                                                        them confidential. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We may also
                                                        use or share your Personal Data to third-party service providers or government agencies,
                                                        to collect more information about our clients, if necessary, for&nbsp;business transactions.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                        Data Retention</span></strong></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We will
                                                        retain and/or preserve your Personal Data within the agreed period as stated in
                                                        the policy and/or contract and if it is necessary for keeping track of your records
                                                        and servicing your policy and contract. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">If required
                                                        or mandated by law, we will extend the retention of your Personal Data within the
                                                        period provided by law. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">Any correction
                                                        or erasures of the Personal Data shall be recorded. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">After the
                                                        expiration of the period as earlier mentioned, we will destroy, delete or dispose
                                                        of all the personal data and the materials, in our storage or server, in accordance
                                                        with the requirement of Data Privacy Act.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Changes in our Privacy Policy: </strong></span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">COCOGEN
                                                        may periodically update or amend Privacy Policy in order to adhere to new and existing
                                                        laws affecting the Data Privacy Act, including any change or improvement we establish
                                                        to secure our clients' personal data. If we amend our Privacy Policy, we will post
                                                        the updated and revised here in our website: www.ucpbgen.com and will take effect
                                                        immediately. Rest assured, however, that any updates or changes shall not alter
                                                        how we handle previously collected personal data without obtaining our clients’
                                                        consent unless required by law.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        For any concerns, requests, complaints or queries, you may Contact Us at</strong></span></p>
                                                <ul type="disc">
                                                    <ul type="disc">
                                                        <ul type="disc">
                                                            <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                                <span style="text-decoration: underline;">Data Protection Officer:</span> Mr. Edgardo
                                                                D. Rosario&nbsp;</span></strong></li>
                                                            <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                                <span style="text-decoration: underline;">Address:</span> UCPB General Insurance
                                                                Company, Inc. Office Address – 22F One Corporate Center Doña Julia Vargas corner
                                                                Meralco Ave., Ortigas, Pasig City</span></strong></li>
                                                            <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                                <span style="text-decoration: underline;">Email:</span> data_privacy@ucpbgen.com
                                                            </span></strong></li>
                                                        </ul>
                                                    </ul>
                                                </ul>
                                                <p>
                                                    <a name="DefinitionOfTerms"></a>
                                                </p>
                                                <ul type="disc">
                                                    <ul type="disc">
                                                        <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                            <span style="text-decoration: underline;">UCPB GEN Client Services:</span> 830-6000</span></strong></li>
                                                    </ul>
                                                </ul>
                                                <p>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                        ___________________________________________________________</span></strong></p>
                                                <p>
                                                </p>
                                                <p>
                                                </p>
                                                <p>
                                                    <strong style="font-size: medium;">Definition Of Terms according to&nbsp;<a href="https://www.privacy.gov.ph/data-privacy-act/">Republic
                                                        Act 10173 or Data Privacy Act</a>:</strong></p>
                                                <p>
                                                    *“Personal information” refers to any information, whether recorded in a material
                                                    form or not, from which the identity of an individual is apparent or can be reasonably
                                                    and directly ascertained by the entity holding the information, or when put together
                                                    with other information would directly and certainly identify an individual.</p>
                                                <p>
                                                    *<span lang="EN-PH">Sensitive personal information refers to personal information:</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 1. About an individual’s race, ethnic origin, marital
                                                        status, age, color, and religious, philosophical or political affiliations;</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 2. About an individual’s health, education, genetic
                                                        or sexual life of a person, or to any proceeding for any offense committed or alleged
                                                        to have been committed by such individual, the disposal of such proceedings, or
                                                        the sentence of any court in such proceedings;</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 3. Issued by government agencies peculiar to an individual
                                                        which includes, but is not limited to, social security numbers, previous or current
                                                        health records, licenses or its denials, suspension or revocation, and tax returns;
                                                        and</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 4. Specifically established by an executive order or
                                                        an act of Congress to be kept classified</span></p>
                                                <p>
                                                    <span lang="EN-PH">*“Privileged information” refers to any and all forms of data, which,
                                                        under the Rules of Court and other pertinent laws constitute privileged communication;</span></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-lg" id="termsConditions" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="termsConditions">
                                                Terms and Conditions</h4>
                                        </div>
                                        <div class="modal-body" style="max-height: calc(105vh - 210px);overflow-y: auto;">
                                            <p>
                                               </p>
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: small;">The UCPB
                                                    General Insurance Company, Inc. (UCPB GEN) website, e-mail newsletters, and mobile
                                                    services, and any and all materials contained therein, are information services
                                                    provided by UCPB GEN, the use of which shall be subject to the following terms and
                                                    conditions.</span></p>
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: small;">By accessing
                                                    the UCPB GEN information services and their content, you acknowledge and agree that
                                                    you have read and understood the following terms and conditions and agree to be
                                                    bound by them.</span></p>
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: small;">As used below,
                                                    the terms “we”, “us”, and “our” refer to UCPB GEN.</span></p>
                                            <ol>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    CONTENT</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">UCPB GEN
                                                            information services are available for information purposes only. The publication
                                                            and posting of any content and access to any of the UCPB GEN information services
                                                            do not constitute, either explicitly or implicitly, any provision of services or
                                                            products by us. Information concerning UCPB GEN products or services is only available
                                                            from the relevant UCPB GEN companies</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    NO OFFER</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">No information
                                                            contained in this website or in any of UCPB GEN information services should be construed
                                                            as an offer or a solicitation for an offer, as a statement of law, or as counsel
                                                            on investment, legal, tax, or other matters. In case of any ambiguity or doubts
                                                            in the information in UCPB GEN’s website, you are advised to verify or check with
                                                            us or seek appropriate professional or legal advice.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    NO DUTY TO UPDATE</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We reserve
                                                            the right to update, modify, revise and change all the contents of our website and
                                                            other UCPB GEN information services. We are not obliged to notify you of any changes
                                                            made on our Terms and Conditions. However, we will endeavor to regularly update
                                                            the contents of the website and other UCPB GEN information services.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Your continuous
                                                            access to website following any change in the website signifies that you agree to
                                                            be bound by the Terms and Conditions, as revised.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    COPYRIGHT AND TRADEMARKS</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">All information,
                                                            photographs, service marks, logos, artworks and all other contents of the website
                                                            and other UCPB GEN information services are owned, controlled or licensed by or
                                                            to UCPB or its third party licensors, and are protected by intellectual property
                                                            laws.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif` font-size: small;">The limited
                                                            use, copying and distribution without alteration of any of the materials and information
                                                            contained in the UCPB GEN website and other UCPB GEN information services and the
                                                            use of said materials and information shall be allowed for non-commercial purposes
                                                            only: provided that all copyright and other proprietary notices shall appear in
                                                            all copies of the materials and the information in the same manner as the original.
                                                            The use of the materials for all other purposes is prohibited.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">You shall
                                                            not use any portion of this website, or any other intellectual property of UCPB
                                                            GEN, including but not limited to its service marks, on any other website, in the
                                                            source code of any other website, or in any other printed or electronic materials
                                                            without the prior written consent of UCPB GEN. You shall not modify, publish, reproduce,
                                                            republish, create derivative works, copy, upload, post, transmit, distribute, or
                                                            otherwise use any of the UCPB GEN information services’ contents or frame the UCPB
                                                            GEN website within any other website without prior written consent of UCPB GEN.
                                                            Systematic retrieval of data from this website to create or compile, directly or
                                                            indirectly, a collection, compilation, database or directory, without prior written
                                                            consent from UCPB GEN, is prohibited. Linking from another website to any page in
                                                            this website is strictly prohibited without prior written consent of UCPB GEN.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    NO WARRANTY</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">All contents
                                                            on any and all UCPB GEN information services, including, but not limited to, graphics,
                                                            text, and hyperlinks or references to other sites, are subject to change without
                                                            prior notice and without warranty of any kind, express or implied, including, but
                                                            not limited to, sustainability for a particular purpose, non-infringement and freedom
                                                            of rights of third parties.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We do not
                                                            guarantee the adequacy, accuracy, reliability or completeness of any information
                                                            provided by the UCPB GEN information services and expressly disavow any liability
                                                            for errors or omissions therein. The user is responsible for the assessment of the
                                                            information’s adequacy, accuracy, reliability, and completeness.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We do not
                                                            guarantee that the functions of the UCPB GEN information services will be uninterrupted
                                                            and/or error-free, and that the defects and errors will be corrected or that the
                                                            UCPB GEN information services or the servers that make them available are free from
                                                            computer viruses or other harmful components.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Should your
                                                            machine which includes but is not limited to your desktop, laptop, or smartphone,
                                                            be infected by such viruses while using UCPB GEN information services, you shall
                                                            assume the entire cost of all necessary servicing, repairs, or corrections.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    HYPERLINKED AND REFERENCED WEBSITES</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Certain hyperlinks
                                                            or referenced websites in the UCPB GEN information services may take you to third-party
                                                            websites and we do not guarantee the adequacy, accuracy, reliability, or completeness
                                                            of any information on hyperlinked or referenced websites. We disclaim any liability
                                                            for any and all of the contents of said hyperlinked or reference websites.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">The hyperlinks
                                                            to other websites are offered for your convenience only. Their presence in our website
                                                            does not imply that we endorse such websites or that products or services that are
                                                            described therein are our own. We likewise do not guarantee the correctness and
                                                            accuracy of the information in said hyperlinked websites.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We remind
                                                            you that different terms and conditions will apply for your use of such websites
                                                            and that your access to third-party websites is entirely at your risk.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    CONFIDENTIALITY OF INFORMATION</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">By using
                                                            the UCPB GEN information services, you agree, understand, and confirm that the any
                                                            and all information, including your credit or debit card details, you provide to
                                                            access UCPB GEN information services or to availing of our any of the services in
                                                            said services are owned by you or that you have lawful authority to use said information.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We commit
                                                            that we will not disclose, utilize, and share the said information to any third
                                                            parties unless required by law, regulation or court order.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We, as a
                                                            merchant, shall be under no liability whatsoever in respect of any loss or damage
                                                            resulting directly or indirectly from the decline of authorization by the card issuer
                                                            for any transaction on account of the cardholder having exceeded the limit mutually
                                                            agreed by us with our acquiring bank from time to time.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    REFUND AND CANCELLATIONS</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">For concerns
                                                            regarding refunds and cancellation of policies, please free to contact our Customer
                                                            Service Center via phone at 811-8329 or via email at client_services@cocogen.com.
                                                            Please be informed that cancellations will be subject to the specific terms and
                                                            conditions of the policy sought to be canceled.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    LOCAL LEGAL RESTRICTIONS</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Any information
                                                            appearing on this website is provided in accordance with and subject to the laws
                                                            of the Republic of the Philippines.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">UCPB GEN
                                                            information services are not intended for any person in any jurisdiction where (by
                                                            virtue of that person’s nationality, residence or otherwise) the publication or
                                                            availability of UCPB GEN information services is prohibited. Persons to whom such
                                                            prohibition applies may not access the UCPB GEN information services.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: small;"></span></span>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: small;">RESERVATION
                                                        OF RIGHTS</span></strong>
                                                    <p>
                                                        <span style="font-size: small; font-family: arial, helvetica, sans-serif;">We reserve
                                                            the right to change, modify, add to, or remove sections of these terms of use at
                                                            any time.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <strong><span style="font-family: arial, helvetica, sans-serif; font-size: small;">GOVERNING
                                                            LAW AND DISPUTE RESOLUTION</span></strong></p>
                                                    <p>
                                                        <span style="font-size: small; font-family: arial, helvetica, sans-serif;">You agree
                                                            that all matters relating to your use and access of all UCPB GEN information services
                                                            shall be governed by the laws of the Republic of the Philippines. Any dispute, controversy
                                                            or claim arising out of or relating to this Terms and Conditions, or the breach,
                                                            termination or invalidity thereof shall be settled by arbitration in accordance
                                                            with the PDRCI Arbitration Rules as at present in force.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <strong><span style="font-size: small; font-family: arial, helvetica, sans-serif;">ENTIRE
                                                            AGREEMENT</span></strong></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">This Agreement
                                                            constitutes the entire agreement between you and UCPB GEN with respect to your access
                                                            and/or use of this website.</span></p>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default current" data-dismiss="modal" value="Close">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-lg" id="exclusionslimitations" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="exclusionslimitations">
                                                Exclusions and Limitations</h4>
                                        </div>
                                        <div class="modal-body" style="max-height: calc(105vh - 210px);overflow-y: auto;">
                                            <ul>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            Only the vehicle owner and/or his duly authorized representative can register.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle being insured has not been involved in any vehicular accident and has
                                                            not been flooded/damaged in any manner as of the time of the insurance of this policy.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            Any damages prior to the issuance of this policy shall not be compensable. This
                                                            declaration is under the penalty of perjury.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle for insurance cover is not used to carry fare-paying passengers (Grab
                                                            or Rent-a-car).</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            If the vehicle is under financing with assumed balance, it cannot be covered due
                                                            to no insurable interest.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            All undeclared accessories are not covered under this policy.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle being insured is not under auto-renewal of insurance with the financing
                                                            bank.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle being insured does not have an existing Direct Link or COCOGEN Imsurance policy.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    All Mortgaged vehicles are required to purchase AON coverage.</span></li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    Vehicle can only be used in the Republic of the Philippines.</span></li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    Only authorized drivers can drive the vehicle.</span></li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    There is no cover, whilst onboard a sea vessel on inter-island transit.</span></li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default current" data-dismiss="modal" value="Close">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-lg" id="magilasInfo" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            
                                           <img class="img-responsive" src="{{url('/images/MagilasLightbox.jpg')}}">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default current" data-dismiss="modal" value="Close">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
 <script type="text/javascript">
 jQuery(document).ready(function(e) {  
      jQuery("firstTabBtutton").click(function(){
        //alert("The paragraph was clicked.");
      }); 
   
    });
 
 </script>



<script type="text/javascript">
  jQuery(document).ready(function(e) {   
  var $select1 = jQuery( '#mvType' ),
    $select2 = jQuery( '#mvCode' ),
    $options = $select2.find( 'option' );
    
    $select1.on( 'change', function() {
      $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
    }).trigger( 'change' );
        });
</script>

<script type="text/javascript">
  jQuery(document).ready(function(e) {   
  var $select1 = jQuery( '#mvType' ),
    $select2 = jQuery( '#premium' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
  $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
} ).trigger( 'change' );
    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function(e) {   
  var $select1 = jQuery( '#mvType' ),
    $select2 = jQuery( '#premium3' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
  $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
} ).trigger( 'change' );
    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function(e) {   
  var $select1 = jQuery( '#mvType' ),
    $select2 = jQuery( '#premtype' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
  $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
} ).trigger( 'change' );
    });
</script>

<script type="text/javascript">
 jQuery(document).ready(function(e) {   
var $select1 = jQuery( '#mvType' ),
    $select2 = jQuery( '#premtype3' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
  $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
} ).trigger( 'change' );
    });
</script>

<script type="text/javascript">

jQuery(document).ready(function($) {
jQuery("#mvCodediv").hide();
jQuery("#premtypediv2").hide();
jQuery("#premtypediv1").hide();

  if (jQuery('#CBnEWcAR').is(":checked")) {
                jQuery("#prem1").hide();
                jQuery("#prem3").show();
                jQuery("#purchaseDate").show();
                var CBnEWcAR = "1";
                $hidURL = jQuery('input[name=hidURL]').val();
                var url = $hidURL+ '/dynamic_dependent/fetch/getprem';    
                var _token = jQuery('input[name="_token"]').val();
                var policyType = jQuery( "#policyType option:selected" ).text();
                var mvType = jQuery( "#mvType option:selected" ).text();  
                if(policyType != "Vehicle Type *"){
                    if(mvType != "MV Type *"){
                        jQuery.ajax({
                            url: url,
                            method:"POST",
                            data:{ _token:_token,CBnEWcAR:CBnEWcAR,mvType:mvType,policyType:policyType},
                               error: function(data){
                                                var errors = data.responseJSON;
                                                  //alert(policyType);
                                                 jQuery.each(data, function(key, value){
                                                  //alert(mvType);
                                                  });
                                                  // Render the errors with js ...
                                                }, 
                            success:function(result)
                            {
                              if(result != null){
                                
                                  jQuery('#premAmount').val(addCommas(result));
                                  jQuery('#premAmount').text(addCommas(result)); 
                              }     
                            }
                       })
                    }
                }
            } else {
                jQuery("#prem1").show();
                jQuery("#prem3").hide();
                jQuery("#purchaseDate").hide();
                var CBnEWcAR = "0";
                $hidURL = jQuery('input[name=hidURL]').val();
                var url = $hidURL+ '/dynamic_dependent/fetch/getprem';    
                var _token = jQuery('input[name="_token"]').val();
                var policyType = jQuery( "#policyType option:selected" ).text();
                var mvType = jQuery( "#mvType option:selected" ).text();  
                if(policyType != "Policy Type *"){
                    if(mvType != "MV Type *"){
                        jQuery.ajax({
                            url: url,
                            method:"POST",
                            data:{ _token:_token,CBnEWcAR:CBnEWcAR,mvType:mvType,policyType:policyType},
                               error: function(data){
                                                var errors = data.responseJSON;
                                                   //alert(policyType);
                                                 jQuery.each(data, function(key, value){
                                                  //alert(mvType);
                                                  });
                                                  // Render the errors with js ...
                                                }, 
                            success:function(result)
                            {

                              if(result != null){
                                  jQuery('#premAmount').val(addCommas(result));
                                  jQuery('#premAmount').text(addCommas(result)); 
                              }        
                            }
                       })
                    }
                }
            }


 jQuery(function () {
        jQuery("#CBnEWcAR").click(function () {
            if (jQuery(this).is(":checked")) {
                jQuery("#prem1").hide();
                jQuery("#prem3").show();
                jQuery("#purchaseDate").show();
                var CBnEWcAR = "1";
                $hidURL = jQuery('input[name=hidURL]').val();
                var url = $hidURL+ '/dynamic_dependent/fetch/getprem';    
                var _token = jQuery('input[name="_token"]').val();
                var policyType = jQuery( "#policyType option:selected" ).text();
                var mvType = jQuery( "#mvType option:selected" ).text(); 
                
                if(policyType != "Policy Type *"){
                    if(mvType != "MV Type *"){
                        jQuery.ajax({
                            url: url,
                            method:"POST",
                            data:{ _token:_token,CBnEWcAR:CBnEWcAR,mvType:mvType,policyType:policyType},
                               error: function(data){
                                                var errors = data.responseJSON;
                                                  //alert(errors);
                                                 jQuery.each(data, function(key, value){
                                                 // alert(value);
                                                  });
                                                  // Render the errors with js ...
                                                }, 
                            success:function(result)
                            {
                              if(result != null){
                             
                                  jQuery('#premAmount').val(addCommas(result));
                                  jQuery('#premAmount').text(addCommas(result)); 
                              }       
                            }
                       })
                    }
                }
            } else {
                jQuery("#prem1").show();
                jQuery("#prem3").hide();;
                jQuery("#purchaseDate").hide();
                var CBnEWcAR = "0";
                $hidURL = jQuery('input[name=hidURL]').val();
                var url = $hidURL+ '/dynamic_dependent/fetch/getprem';    
                var _token = jQuery('input[name="_token"]').val();
                var policyType = jQuery( "#policyType option:selected" ).text();
                var mvType = jQuery( "#mvType option:selected" ).text();  

                if(policyType != "Policy Type *"){
                    if(mvType != "MV Type *"){
                        jQuery.ajax({
                            url: url,
                            method:"POST",
                            data:{ _token:_token,CBnEWcAR:CBnEWcAR,mvType:mvType,policyType:policyType},
                               error: function(data){
                                                var errors = data.responseJSON;
                                                  //alert(errors);
                                                 jQuery.each(data, function(key, value){
                                                 // alert(value);
                                                  });
                                                  // Render the errors with js ...
                                                }, 
                            success:function(result)
                            { 
                              if(result != null){
                                  jQuery('#premAmount').val(addCommas(result));
                                  jQuery('#premAmount').text(addCommas(result)); 
                              }                                          
                            }
                       })
                    }
                }
                
            }
        });
    });
   
});
</script>
<!-- 
<script type="text/javascript">
  jQuery(document).ready(function(e) {   
  var $select1 = jQuery( '#province' ),
    $select2 = jQuery( '#city' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
  $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
} ).trigger( 'change' );
    });
</script> -->
<script>
  jQuery(document).ready(function(){

   jQuery('.dynamicprovince').change(function(){
    if(jQuery(this).val() != '')
    {         
          var province = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/city';    
          var _token = jQuery('input[name="_token"]').val();
          
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,province:province},
         error: function(data){
                          var errors = data.responseJSON;
                         //alert(errors);
                           jQuery.each(data, function(key, value){
                            //alert(value);
                            });
                            // Render the errors with js ...
                          }, 
      success:function(result)
      {        
        jQuery('#city').html(result);    
        jQuery('#city').selectpicker("refresh");   
      }

     })
    }
   }); 
  });
</script>

<script>
  jQuery(document).ready(function(){

   jQuery('.dynamicpolicyType').change(function(){
    if(jQuery(this).val() != '')
    {         
          var policyType = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/mvtype';    
          var _token = jQuery('input[name="_token"]').val();
          
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,policyType:policyType},
         error: function(data){
                          var errors = data.responseJSON;
                         //alert(errors);
                           jQuery.each(data, function(key, value){
                            //alert(value);
                            });
                            // Render the errors with js ...
                          }, 
      success:function(result)
      {        
        jQuery('#mvType').html(result);    
        jQuery('#mvType').selectpicker("refresh");   
      }

     })
    }
   }); 
  });
</script>
<script>
  jQuery(document).ready(function(){
  

   jQuery('.dynamic').change(function(){
    if(jQuery(this).val() != '')
    {
          var policyType = jQuery( "#policyType option:selected" ).text();
          var CBnEWcAR = 0;
         


          if (jQuery('#CBnEWcAR').is(":checked"))
          {
              CBnEWcAR = 1;
          }else{
              CBnEWcAR = 0;
          }         
          var mvType = jQuery(this).val();           
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/getprem';    
          var _token = jQuery('input[name="_token"]').val();
    
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,CBnEWcAR:CBnEWcAR,mvType:mvType,policyType:policyType},
         error: function(data){
                          var errors = data.responseJSON;
                            //alert(errors);
                           jQuery.each(data, function(key, value){
                            //alert(value);
                            });
                            // Render the errors with js ...
                          }, 
      success:function(result)
      {
            jQuery('#premAmount').val(addCommas(result));
            jQuery('#premAmount').text(addCommas(result));         
      }
     })
    }
   });


  });
</script>
<script type="text/javascript">
   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
  </script>


<script type="text/javascript">


  function addCommas(num) {
    var str = num.toString().split('.');
    if (str[0].length >= 4) {
        //add comma every 3 digits befor decimal
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    /* Optional formating for decimal places
    if (str[1] && str[1].length >= 4) {
        //add space every 3 digits after decimal
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }*/
    return str.join('.');
    }

</script>
@endsection
