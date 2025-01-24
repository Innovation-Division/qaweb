@extends('layouts.layout1')

@section('content')        
    <!-- <div class="top-container">
        <div class="category-name container">
            <div class="row text-center">
                <h1 style="color:#008080">CTPL INSURANCE QUOTE</h1>
            </div>
        </div>
       <br>
    </div> -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrapValidator.css') }}">       
 <style type="text/css">
  

/* Important part */
/* .modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 80vh;
    overflow-y: auto;
} */
</style>          
<style type="text/css">
    /* :root {
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
    .select-input-border-color-vt,
    .select-input-border-color-mt,
    .select-input-border-color-p,
    .select-input-border-color-gender,
    .select-input-border-color-status,
    .select-input-border-color-IDtype,
    .select-input-border-color-r-province,
    .select-input-border-color-r-municipality,
    .select-input-border-color-r-brgy{            
        background-color: #ffffff !important;
        border-color: #ccc !important;
    } */

     .ui-datepicker {
    background-color: #fff;
        font-size: 160%;
    }

    .ui-datepicker-header {
    background-color: #008080;
    border-color: #008080;

    }

    .ui-datepicker-title {
    color: #008080;
    font-size: 15px;
    }
    .ui-datepicker .ui-datepicker-title select {
        font-size: 14px;
    }

    .ui-widget-content .ui-state-default {
    border: 0px;
    text-align: center;
    background: #fff;
    font-weight: normal;
    color: #008080;
    }

    .ui-widget-content .ui-state-default:hover {
    border: 0px;
    text-align: center;
    background: #008080;
    font-weight: normal;
    color: #fff;
    }

    .ui-widget-content .ui-state-active {
    border: 0px;
    background: #008080;
    color: #fff;
    }
    option:checked {
      background: red linear-gradient(0deg, red 0%, red 100%);
    }
</style>
<style type="text/css">
    /* .quote-process li.btn-default span::before, .quote-process li.btn-default, .quote-process li.btn-default:first-child::after, .quote-process li.btn-default:last-child::after{
        background-color: #e4509a !important;
    }


    .quote-process li.past span::before, .quote-process li.past, .quote-process li.past:first-child::after, .quote-process li.past:last-child::after{
        background-color: #008080 !important;
    }

    .quote-process li:not(.hidden):before {
      counter-increment: item;
      content: counter(item);
      font: 900 12px 'Muli';
      color: #fff;
      position: absolute;
      left: 10px;
      z-index: 2;
      top: 50%;
      -webkit-transform: translateY(-50%);
      -moz-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      -o-transform: translateY(-50%);
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      line-height: 1.9;
      background: #C22C7D;
      box-shadow: inset 0 0 10px 0 rgba(0, 0, 0, 0.4);
      -webkit-box-shadow: inset 0 0 10px 0 rgba(0, 0, 0, 0.4);
    }


.quote-process li.btn-success::before {
    background: #A9A9A9;
}

.quote-process li.btn-success.current::before {
    background: #C22C7D;
}

.quote-process li.btn-success.past::before {
    background: #349B9B;
} */
.blue-btn{
    background: transparent;
    /* border: solid 1px #27a9e0;*/
    border-radius: 3px;
    color: #ffffff;
    background-color: #e4509a;
    font-size: 20px;
    margin-bottom: 14px;
    outline: none !important;
    padding: 10px 20px;
}

.blue-btn {
    background: transparent;
    /* border: solid 1px #27a9e0;*/
    border-radius: 3px;
    color: #ffffff;
    background-color: #e4509a;
    font-size: 20px;
    margin-bottom: 20px;
    outline: none !important;
    padding: 10px 20px;
}



.fileUpload {
    position: relative;
    overflow: hidden;
    height: 46px;
    font-size: 20px;
}

.fileUpload input.uploadlogo {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 100%;
    height: 46px;

}

/*Chrome fix*/
input::-webkit-file-upload-button {
    cursor: pointer !important;
    height: 46px;
    width: 100%;
}

/* #upload_label{
    margin-top:-30px !important;
} */

/* #upload_file{
    margin-top:-30px !important;
} */
#privacyPolicy .modal-body,
#termsConditions .modal-body, 
#exclusionslimitations .modal-body  {
  font-size: 20px;
}
#privacyPolicy .modal-body,
#termsConditions .modal-body {
	padding: 15px 50px;
}
#exclusionslimitations .modal-body {
	padding: 15px 30px;
}
#privacyPolicy .modal-body h4,
#termsConditions .modal-body h4,
#exclusionslimitations .modal-body h4 {
	display: block;
	margin-bottom: 15px;
}
@media only screen and (max-width: 1439px) {
  #privacyPolicy .modal-body, 
  #termsConditions .modal-body, 
  #exclusionslimitations .modal-body {
    font-size: 16px;
	  padding: 15px 30px;
  }
}

@media only screen and (max-width: 1439px) {
    .fileUpload {
        height: 42px;
        font-size: 18px;
        padding-top: 7px;
    }
}
</style>

</script>  
<?php 
if($errors->has('mvFIleNo') 
  || $errors->has('plateNo') 
  || $errors->has('engineNO') 
  || $errors->has('make') 
  || $errors->has('chassisNo') 
  || $errors->has('bodyType')
  || $errors->has('year') ){
  session()->flash('tab', 'tab2');
}

if($errors->has('gender_personal_info') 
  || $errors->has('birthDate') 
  || $errors->has('placeofBirth')
  || $errors->has('civilStatus')
  || $errors->has('occupation')
  || $errors->has('telno')
  || $errors->has('sourceoffunds')
  || $errors->has('type_of_id_personal_info')
  || $errors->has('idno_other_personal_info')
  || $errors->has('residence_province')
  || $errors->has('residence_municipality')
  || $errors->has('residence_barangay')){
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
<style type="text/css">
                            .a-btn-slide-text:hover{
                                color: #349B9B !important;
                                border-color: #349B9B !important;
                            }
                        </style>
  
<section class="banner banner-inquiry">
    <div class="container-fluid breadcrumb-container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb rfs-1-5">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Get a Quote</li>
                <li class="breadcrumb-item active" aria-current="page">CTPL Insurance Quote</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="content">
            <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">CTPL Insurance Quote</h1>
        </div>
    </div>
</section>

<div id="exTab3" class="main-content container quote-process1"> 
    <div class="inner">
        <ul class="quote-process mb-2 mb-lg-5">
            <li  <?php echo $tab1 ?> name="getquote1">
                <span class="bubble"><span class="d-none d-lg-flex rfs-12">Quote Request</span></span>
                <span class="d-flex d-lg-none step-label rfs-0-12">Quote<br />Request</span>
            </li>          
            <li <?php echo $tab2 ?>  name="additional1">
                <span class="bubble"><span class="d-none d-lg-flex rfs-12">Car Infomation</span></span>
                <span class="d-flex d-lg-none step-label rfs-0-12">Car<br />Infomation</span>
            </li>
            <li <?php echo $tab3 ?>  name="personal1">
                <span class="bubble"><span class="d-none d-lg-flex rfs-12">Personal Data</span></span>
                <span class="d-flex d-lg-none step-label rfs-0-12">Personal<br />Data</span>
            </li>
            <!--   <li class="btn btn-success" name="checkout"><a href="#4b" data-toggle="tab"><span>Summary &amp; Confirmation</span>></a></li>  -->
        </ul>
        @if(session('message') )
        <div class="error-msg">
            <i class="fa fa-times-circle"></i>
            {{session('message')}}
        </div>
        @endif  
        <br />
        <form class="inline-form b5form" role="form" method="post" action="{{ route('saveequotemotor') }}" enctype="multipart/form-data">
        {{ csrf_field() }} 

        <input type="hidden" name="hidURL" name="hidURL" value="{{url('/')}}">
        <input type="hidden" id="tnxid" name="tnxid" value="{{session('tnxid')}}">
        <input type="hidden" id="tabmax" name="tabmax" value="{{session('tabmax')}}">
        <input type="hidden" name="totalvalhid"     id="totalvalhid"  value="{{session('totalvalhid')}}" >
            <div class="tab-content clearfix"  style="text-align: left;font-family: muli;">
        
                <div id="quoteRequest" <?php echo $act1 ?> >
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group{{ $errors->has('purchaseDate') ? ' has-error' : '' }}">    
                                <style type="text/css">
                                    /* input[type=checkbox] + label {
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
                                    } */
                                </style>  
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="CBnEWcAR" name="CBnEWcAR" value="1"  <?php if(old('CBnEWcAR')){ echo "checked";} ?> >
                                    <label class="form-check-label" for="CBnEWcAR"> My car is brand new</label>
                                </div>
                                <div class="col-md-12_ row mt-3">
                                    <!-- <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-datetimepicker.min.css') }}" />
                                    <link rel="stylesheet" href="{{ asset('/css/datepick/font-awesome.min.css') }}" />
                                    <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-theme.min.css') }}" /> -->
                                    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" /> -->
                                    <div class="col-12 col-md-4">
                                        <input id="purchaseDate" type="text" class="form-control input-lg" maxlength="10" name="purchaseDate" value="{{ old('purchaseDate') }}" placeholder="Purchase Date">
                                        @if ($errors->has('purchaseDate'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('purchaseDate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div>  
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div>  
                    <div class="col-md-12_">
                        <h4 class="rfs-2-5 rfs-md-1-3">Personal Data</h4>
                    </div>
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div>  
                    <div class="sp-only"><br></div>

                    <div class="container_ row">               
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('firstName') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="firstName">First Name</label>
                                    <input id="firstName" type="text" class="form-control input-lg" name="firstName" maxlength="50" value="{{ old('firstName') }}" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+">
                                    @if ($errors->has('firstName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('lastName') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="lastName">Last Name</label>
                                    <input id="lastName" type="text" class="form-control input-lg" name="lastName" maxlength="50" value="{{ old('lastName') }}" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+">
                                    @if ($errors->has('lastName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('middleName') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="middleName">Middle Name</label>
                                    <input id="middleName" type="text" class="form-control input-lg" name="middleName" maxlength="50" value="{{ old('middleName') }}" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+">
                                    @if ($errors->has('middleName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('middleName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12_ break-two pc-only">
                        <br>    
                    </div> 

                    <div class="container_ row">               
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('contactNo') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="contactNo">Contact Number</label>
                                    <input id="contactNo" type="text" class="form-control input-lg " maxlength="100" name="contactNo" onkeypress="return isNumberKey(event)" value="{{ old('contactNo') }}">
                                    @if ($errors->has('contactNo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contactNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('emailAddress') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="emailAddress">Email Address</label>
                                    <input id="emailAddress" type="text" class="form-control input-lg" maxlength="50" name="emailAddress" value="{{ old('emailAddress') }}" >
                                    @if ($errors->has('emailAddress'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('emailAddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                       
                        </div>                       
                    </div>
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    <div>
                        <h4 class="rfs-2-5 rfs-md-1-3">CTPL Information</h4>
                    </div>
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div>  
                    <div class="container_">
                        <div class="form-group row {{ $errors->has('policyType') ? ' has-error' : '' }} fieldset-group has-feedback">                            
                                <div class="col-12 col-md-4">
                                    <label for="policyType">Vehicle Type</label>
                                    <select  id="policyType" name="policyType" class="form-control selectpicker selectb5 dynamicpolicyType input-lg select-input-border-color-vt"  data-style="input-lg  select-input-border-color-vt" style="font-family: muli">
                                        <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>-  Select -</option>
                                        @if (old('policyType'))
                                            <option value="{{ old('policyType') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected">{{ old('policyType') }}</option>                                             
                                        @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>- Select -</option>
                                        @endif
					<option value="Car" >Car</option>
                                        <option value="Shuttle Bus" >Shuttle Bus</option>
                                        <option value="Light Electric Vehicle" >Light Electric Vehicle</option>
                                        <option value="Motorcycle without Side Car" >Motorcycle without Side Car</option>
                                        <option value="Mopeds (0-49 cc)" >Mopeds (0-49 cc)</option>
                                        <option value="Motorcycle with side car" >Motorcycle with side car</option>
                                        <option value="Non-Conventional MV (UV)" >Non-Conventional MV (UV)</option>
                                        <option value="School Bus" >School Bus</option>
                                        <option value="Sports Utility Vehicle" >Sports Utility Vehicle</option>
                                        <option value="Truck Bus" >Truck Bus</option>
                                        <option value="Tricycle" >Tricycle</option>
                                        <option value="Truck" >Truck</option>
                                        <option value="Trailer" >Trailer</option>
					 <option value="Tourist Bus" >Tourist Bus</option> 
                                        <option value="Utility Vehicle" >Utility Vehicle</option>     
                                    </select>
                                    @if ($errors->has('policyType'))
                                        <style type="text/css">
                                            .select-input-border-color-vt{
                                                border-color: #a94442 !important;
                                            }
                                        </style>
                                        <span class="help-block" style="color: #B22222;opacity: 0.9;margin-top: 5px;">
                                            <strong>{{ $errors->first('policyType') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="sp-only"><br></div>

                                <div class="col-12 col-md-4">
                                    <label for="mvType">MV Type</label>
                                    <select  id="mvType" name="mvType" class="form-control dynamic selectpicker selectb5 input-lg select-input-border-color-mt" data-style="input-lg  select-input-border-color-mt" style="font-family: muli">
                                        @if (old('mvType'))
                                        
                                            <option value="{{ old('mvType') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('mvType') }}</option>                                             
                                            @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>- Select -</option>
                                        @endif
                                            
                                    </select>
                                    @if ($errors->has('mvType'))
                                        <style type="text/css">
                                                .select-input-border-color-mt{
                                                border-color: #a94442 !important;
                                                }
                                            </style>
                                        <span class="help-block" style="color: #B22222;opacity: 0.9;">
                                                <strong>{{ $errors->first('mvType') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="sp-only"><br></div>
                                <div class="col-12 col-md-4">
                                    <label for="premAmount">Premium</label>
                                <input id="premAmount" name="premAmount" type="text" class="form-control input-lg" maxlength="100" min="1" max="10" value="{{ old('premAmount') }}" readonly="readonly">
                                    
                            </div>                          
                        </div>
                        <div class="col-md-12_ break-two">
                            <br>    
                        </div> 

                        <div class="form-group  {{ $errors->has('mvType') ? ' has-error' : '' }} fieldset-group has-feedback">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                        <style type="text/css">
                            /* @-moz-document url-prefix() {
                            select.customselect {
                            padding-right: 25px;
                            background-image: url("");
                            background-repeat: no-repeat;
                            background-position: calc(100% - 7px) 50%;
                            -moz-appearance: none;
                            appearance: none;
                            } */
                        </style>
                        <div class="col-md-12_ break-two">
                            <br>    
                        </div>  
                    </div>
                    <div>
                        <h4 class="rfs-2-5 rfs-md-1-3">Promo Code</h4>
                    </div>
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div>  
                    <div class="row">  
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ session('promoCodeError') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-4_">
                                    <label for="mvType">Promo Code</label>
                                    <input id="promoCode" name="promoCode" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('promoCode') }}" >
                                    @if (session('promoCodeError'))
                                        <span class="help-block">
                                            <strong>{{ session('promoCodeError') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12_ break-two"><br></div>
                    <div class="form-group">
                        <div class="col-md-12_">
                            <div class="col-md-4_ text-center">
                                <button id="firstTabBtutton" name="firstTabBtutton" type="submit" class="form-control_ btn btn-secondary a-btn-slide-text_" value="{{$tab1next}}">Next</button>     
                            </div>  
                        </div>
                    </div>
                </div>

                <div id="vehicleInfo" <?php echo $act2 ?> >  
                    <div>
                        <h4 class="rfs-2-5 rfs-md-1-3">Certificate of Registration Details</h4>
                    </div> 
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    <div class="container_ row">
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('year') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="year">Year</label>
                                    <input id="year" type="text" class="form-control input-lg" name="year" maxlength="4" value="{{ old('year') }}"  onkeypress="return isNumberKey(event)">
                                    @if ($errors->has('year'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('make') ? ' has-error' : '' }}">                           
                                    <div class="col-md-4_">
                                        <label for="make">Make</label>
                                        <input id="make" type="text" class="form-control input-lg" maxlength="50" name="make" value="{{ old('make') }}" >
                                        @if ($errors->has('make'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('make') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>                   
                        </div>                   
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('mvFIleNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="mvFIleNo">MV File No</label>
                                    <input id="mvFIleNo" type="text" class="form-control input-lg" maxlength="15" name="mvFIleNo" value="{{ old('mvFIleNo') }}"  onkeypress="return isNumberKey(event)">
                                    @if ($errors->has('mvFIleNo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mvFIleNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12_ break-two pc-only">
                        <br>    
                    </div> 

                    <div class="container_ row">  
                        <div class="col-md-4">
                            <div class="form-group  {{ $errors->has('chassisNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="chassisNo">Chassis No</label>
                                    <input id="chassisNo" type="text" class="form-control input-lg" maxlength="20" name="chassisNo" value="{{ old('chassisNo') }}" >
                                    @if ($errors->has('chassisNo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('chassisNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  {{ $errors->has('plateNo') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="plateNo">Plate No</label>
                                    <input id="plateNo" type="text" class="form-control input-lg" maxlength="10" name="plateNo" value="{{ old('plateNo') }}">
                                    @if ($errors->has('plateNo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('plateNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  {{ $errors->has('engineNO') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="engineNO">Engine No</label>
                                    <input id="engineNO" type="text" class="form-control input-lg" maxlength="20" name="engineNO" value="{{ old('engineNO') }}">
                                    @if ($errors->has('engineNO'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('engineNO') }}</strong>
                                        </span>
                                    @endif
                                </div>
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
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                                
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <div class="col-md-12_">
                                    <div class="col-md-4_ text-center">
                                    <!--  <button id="SecondTabButtonBack"  name="SecondTabButtonBack" type="submit" class="btn btn-primary" style="width: 140px;" value="tab2back">Back</button>  --> 
                                        <button id="SecondTabBtuttonNext"  name="SecondTabBtuttonNext" type="submit" class="form-control_ btn btn-secondary" value="{{$tab2next}}">Next</button>                               
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>  
                </div>

                <div id="clientInfo" <?php echo $act3 ?>>
                    <div>
                        <h4 class="rfs-2-5 rfs-md-1-3">Other Personal Data</h4>
                    </div>
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 

                    <div class="container_ row">               
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('gender') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                    <label for="gender_personal_info">Gender</label> 
                                    <select id="gender_personal_info" name="gender_personal_info"  class="form-control selectpicker selectb5 select-input-border-color-gender" data-style="input-lg  select-input-border-color-gender" data-size="10">      
                                            <option value="">- Select -</option>  
                                            <option value="Male" <?php if(old('gender_personal_info') === 'Male'){ ?>  selected="selected" <?php } ?>>Male</option>          
                                            <option value="Female"  <?php if(old('gender_personal_info') === 'Female'){ ?>  selected="selected" <?php } ?>>Female</option>          
                                    </select>
                                    @if ($errors->has('gender_personal_info'))
                                        <style type="text/css">
                                            .select-input-border-color-gender{
                                                border-color: #a94442 !important;
                                            }
                                        </style>
                                        <span class="help-block" style="margin-top: 15px;color: #a94442;;">
                                            <strong>{{ $errors->first('gender_personal_info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('birthDate') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                    <label for="birthDate">Date of Birth</label>
                                    <input id="birthDate" type="text" class="form-control input-lg" name="birthDate" maxlength="50" value="{{ old('birthDate') }}" placeholder="MM/DD/YYYY*" style="z-index">
                                    @if ($errors->has('birthDate'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthDate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('placeofBirth') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                    <label for="placeofBirth">Place of Birth</label>                                
                                    <input id="placeofBirth" type="text" class="form-control input-lg" name="placeofBirth" maxlength="50" value="{{ old('placeofBirth') }}">
                                    @if ($errors->has('placeofBirth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('placeofBirth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('civilStatus') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                    <label for="status_other_personal_info">Civil Status</label>
                                    <select  id="status_other_personal_info" name="status_other_personal_info" class="form-control selectpicker selectb5 select-input-border-color-status" data-style="input-lg  select-input-border-color-status" data-size="10"  data-live-search="true" >
                                            <option value="">- Select -</option>            
                                            <option value="Single" <?php if(old('status_other_personal_info') === 'Single'){ ?>  selected="selected" <?php } ?>>Single</option>            
                                            <option value="Married" <?php if(old('status_other_personal_info') === 'Married'){ ?>  selected="selected" <?php } ?>>Married</option>            
                                            <option value="Widowed" <?php if(old('status_other_personal_info') === 'Widowed'){ ?>  selected="selected" <?php } ?>>Widowed</option>            
                                            <option value="Seprated" <?php if(old('status_other_personal_info') === 'Seprated'){ ?>  selected="selected" <?php } ?>>Seprated</option>            
                                            <option value="Divorced" <?php if(old('status_other_personal_info') === 'Divorced'){ ?>  selected="selected" <?php } ?>>Divorced</option>            
                                    </select>
                                    @if ($errors->has('status_other_personal_info'))
                                        <style type="text/css">
                                            .select-input-border-color-status{
                                                border-color: #a94442 !important;
                                            }
                                        </style>
                                        <span class="help-block" style="margin-top: 15px;color: #a94442;;">
                                            <strong>{{ $errors->first('status_other_personal_info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12_ break-two pc-only"> <br></div> 

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('nationality') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                <label for="nationality">Nationality</label> 
                                    <input id="nationality" type="text" class="form-control input-lg" name="nationality" maxlength="50" value="{{ old('nationality') }}" >
                                    @if ($errors->has('nationality'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('occupation') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                    <label for="occupation">Occupation</label>
                                    <input id="occupation" type="text" class="form-control input-lg" name="occupation" maxlength="50" value="{{ old('occupation') }}">
                                    @if ($errors->has('occupation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('occupation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('telno') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                    <label for="telno">Telephone Number</label>
                                    <input id="telno" type="text" class="form-control input-lg" name="telno" maxlength="50" value="{{ old('telno') }}"  onkeypress="CheckNumeric(event);">
                                    @if ($errors->has('telno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telno') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('sourceoffunds') ? ' has-error' : '' }}">                           
                                <div class="col-md-3_">
                                    <label for="sourceoffunds">Source of Funds</label>
                                    <input id="sourceoffunds" type="text" class="form-control input-lg" name="sourceoffunds" maxlength="50" value="{{ old('sourceoffunds') }}">
                                    @if ($errors->has('sourceoffunds'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sourceoffunds') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12_ break-two"> <br> </div> 

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('type_of_id_personal_info') ? ' has-error' : '' }}">
                                <div class="col-md-3_">
                                    <label for="type_of_id_personal_info">Type of ID</label>
                                    <select  id="type_of_id_personal_info" name="type_of_id_personal_info" class="form-control selectpicker selectb5 select-input-border-color-IDtype" data-style="input-lg  select-input-border-color-IDtype" data-size="10"  data-live-search="true" >
                                            <option value="">- Select -</option>            
                                            <option value="Philippine Passport" <?php if(old('type_of_id_personal_info') === 'Philippine Passport'){ ?>  selected="selected" <?php } ?>>Philippine Passport</option>            
                                            <option value="Driver's License" <?php if(old('type_of_id_personal_info') === "Driver's License"){ ?>  selected="selected" <?php } ?>>Driver's License</option>            
                                            <option value="SSS/GSIS UNID Card" <?php if(old('type_of_id_personal_info') === 'SSS/GSIS UNID Card'){ ?>  selected="selected" <?php } ?>>SSS/GSIS UNID Card</option>            
                                            <option value="Philhealth ID" <?php if(old('type_of_id_personal_info') === 'Philhealth ID'){ ?>  selected="selected" <?php } ?>>Philhealth ID</option>            
                                            <option value="Postal ID" <?php if(old('type_of_id_personal_info') === 'Postal ID'){ ?>  selected="selected" <?php } ?>>Postal ID</option>            
                                            <option value="TIN Card" <?php if(old('type_of_id_personal_info') === 'TIN Card'){ ?>  selected="selected" <?php } ?>>TIN Card</option>            
                                            <option value="Voter's ID" <?php if(old('type_of_id_personal_info') === "Voter's ID"){ ?>  selected="selected" <?php } ?>>Voter's ID</option>            
                                            <option value="PRC ID" <?php if(old('type_of_id_personal_info') === 'PRC ID'){ ?>  selected="selected" <?php } ?>>PRC ID</option>            
                                            <option value="Senior Citizen ID" <?php if(old('type_of_id_personal_info') === 'Senior Citizen ID'){ ?>  selected="selected" <?php } ?>>Senior Citizen ID</option>            
                                            <option value="OFW ID" <?php if(old('type_of_id_personal_info') === 'OFW ID'){ ?>  selected="selected" <?php } ?>>OFW ID</option>            
                                    </select>
                                        @if ($errors->has('type_of_id_personal_info'))
                                            <style type="text/css">
                                                .select-input-border-color-IDtype{
                                                    border-color: #a94442 !important;
                                                }
                                            </style>
                                            <span class="help-block" style="margin-top: 15px;">
                                                <strong>{{ $errors->first('type_of_id_personal_info') }}</strong>
                                            </span>
                                        @endif
                                </div> 
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group  {{ $errors->has('idno_other_personal_info') ? ' has-error' : '' }}">
                                <div class="col-md-3_">
                                    <label for="idno_other_personal_info">ID Number</label>
                                    <input name="idno_other_personal_info" id="idno_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{old('idno_other_personal_info')}}">
                                    @if ($errors->has('idno_other_personal_info'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('idno_other_personal_info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-6">
                            <div><label for="file-upload" class="invisible">Upload</label></div>
                            <div class="fileUpload btn btn-secondary-light">
                                <span>Upload your ID</span>
                                <input id="file-upload" name='file' type="file" class="uploadlogo" accept="image/x-png,image/jpeg"  />
                            </div>
                            <div>
                                <label id="upload_Error" class="help-block" style="display: none; color: #CF3C4B; font-size: 15px;"></label>
                                <label id="upload_file" style="display: none;">File: <span id="upload_file_file" class="text-color-secondary"></span> <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i></label>
                                <label id="upload_label" class="rfs-0-15">File must be in .jpeg or .png format not exceeding 5MB</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12_ break-two"> <br> </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  {{ $errors->has('residence_address') ? ' has-error' : '' }}">
                                <div class="col-md-12_">
                                    <label for="address">Residence Address</label> 
                                    <input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="500" placeholder="House No./Unit No./Floor No./Building/Street" value="{{old('residence_address')}}">
                                        @if ($errors->has('residence_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('residence_address') }}</strong>
                                            </span>
                                        @endif
                                </div> 
                            </div>
                        </div>
                    </div>
                                
                    <div class="col-md-12_ break-two"> <br> </div> 

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group {{ $errors->has('residence_province') ? ' has-error' : '' }}">
                                <div class="col-md-4_">
                                    <label for="residence_province">Select Province</label> 
                                    <select id="residence_province" name="residence_province" class="form-control selectpicker selectb5 address_mobile select-input-border-color-r-province" data-style="input-lg  select-input-border-color-r-province" data-size="10"  data-live-search="true" >
                                        <option value="">- Select Province -</option> 
                                        @if(old('residence_province'))
                                            <option value="{{old('residence_province')}}" selected="selected">{{old('residence_province')}}</option> 
                                        @endif           
                                    </select>
                                    @if ($errors->has('residence_province'))
                                        <style type="text/css">
                                            .select-input-border-color-r-province{
                                                border-color: #a94442 !important;
                                            }
                                        </style>
                                        <span class="help-block" style="margin-top: 15px;">
                                            <strong>{{ $errors->first('residence_province') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('residence_municipality') ? ' has-error' : '' }}">
                                <div class="col-md-4_"> 
                                    <label for="residence_municipality">Select City/Municipality</label> 
                                    <select  id="residence_municipality" name="residence_municipality"  class="form-control selectpicker selectb5 address_mobile select-input-border-color-r-municipality" data-style="input-lg select-input-border-color-r-municipality" data-size="10"  data-live-search="true">
                                        <option value="">- Select City/Municipality -</option>  
                                        @if(old('residence_municipality')) 
                                            <option value="{{old('residence_municipality')}}" selected="selected">{{old('residence_municipality')}}</option> 
                                        @endif          
                                    </select>
                                    @if ($errors->has('residence_municipality'))
                                        <style type="text/css">
                                            .select-input-border-color-r-municipality{
                                                border-color: #a94442 !important;
                                            }
                                        </style>
                                        <span class="help-block" style="margin-top: 15px;">
                                            <strong>{{ $errors->first('residence_municipality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('residence_barangay') ? ' has-error' : '' }}">
                                <div class="col-md-4_">
                                    <label for="residence_barangay">Select Barangay</label> 
                                    <select  id="residence_barangay" name="residence_barangay"  class="form-control selectpicker selectb5 address_mobile select-input-border-color-r-brgy" data-style="input-lg select-input-border-color-r-brgy" data-size="10"  data-live-search="true">
                                        <option value="">- Select Barangay-</option>   
                                        @if(old('residence_barangay'))
                                            <option value="{{old('residence_barangay')}}" selected="selected">{{old('residence_barangay')}}</option> 
                                        @endif         
                                    </select>
                                    @if ($errors->has('residence_barangay'))
                                        <style type="text/css">
                                            .select-input-border-color-r-brgy{
                                                border-color: #a94442 !important;
                                            }
                                        </style>
                                        <span class="help-block" style="margin-top: 15px;">
                                            <strong>{{ $errors->first('residence_barangay') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 

                    <div class="col-md-12_">
                        <div class="col-md-12_">
                            <div class="form-check"> 
                                <input class="form-check-input" type="checkbox" id="CBPrivacy" name="CBPrivacy" value="1"  <?php if(old('CBPrivacy')){ echo "checked";} ?> >
                                <label class="form-check-label" for="CBPrivacy"> I AGREE with the <a href="#" class="text-color-secondary text-decoration-underline" data-toggle="modal"  data-target="#privacyPolicy"> Privacy Policy</a></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="CBTerms" name="CBTerms" value="1"  <?php if(old('CBTerms')){ echo "checked";} ?> >
                                <label class="form-check-label" for="CBTerms"> I AGREE to the  <a href="#" class="text-color-secondary text-decoration-underline" data-toggle="modal" data-target="#termsConditions"> Terms & Conditions</a></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="CBExclusion" name="CBExclusion" value="1"  <?php if(old('CBExclusion')){ echo "checked";} ?> >
                                <label class="form-check-label" for="CBExclusion"> I AGREE with the <a href="#" class="text-color-secondary text-decoration-underline" data-toggle="modal" data-target="#exclusionslimitations" > Exclusion & Limitations</a></label>  
                            </div>
                        </div>
                    </div> 

                    <div class="col-md-12_ mt-4">
                        <div class="col-md-12_">
                            <div >
                                <p>Before we take you to the payment page, please take time read and understand our Privacy Policy, Terms & Condition, and Exclusion & Limitations. To continue, just click on the "I AGREE" tick boxes above. Otherwise, you can exit this page at anytime through your browser window.</p>
                            </div>
                            <br>
                            <style type="text/css">
                                div.magilas{
                                
                                    width: 1px;
                                }
                            </style><br>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-4_ text-center">
                            <button id="ThirdTabBtuttonBuy" name="ThirdTabBtuttonBuy" type="submit" class="form-control_ btn btn-secondary a-btn-slide-text_" value="BuyFinal">Buy</button>                               
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="summary-and-confirmation-slider summary-and-confirmation-motor">
            <div class="modal fade bs-example-modal-lg modal-light" id="privacyPolicy" tabindex="-1" role="dialog" aria-labelledby="privacyPolicy" aria-hidden="true">                            
                <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="privacyPolicy">Privacy Policy</h4>
                        </div>
                        <div class="modal-body">
                            <h4 class="rfs-2-5 rfs-md-1-3">Declaration and Consent</h4>
                            <p>I hereby apply for insurance as set out in the above application form and declare, to the best of my knowledge and belief, that the foregoing statements and particulars are true and complete. I hereby agree to notify Cocogen of any material change in the information as stated above. </p>

                            <p>I hereby certify that I voluntarily and expressly consent to the collection, processing, sharing, storing of my personal and/or sensitive information by Cocogen for the purpose/s necessary in processing my insurance policy and in any related transactions and/or in other purposes as stated in the Data Privacy Statement of Cocogen or in www.cocogen.com/data-privacy. I hereby certify that I carefully understood the terms above before giving my consent. </p>

                            <h4 class="rfs-2-5 rfs-md-1-3">Privacy Policy</h4>
                            <p>We, Cocogen, upholds an individual’s data privacy rights and assures that all your personal information, sensitive personal information and privileged information (collectively, “Personal Data”), collected and to be collected, are processed in compliance to the Data Privacy Act of 2012 (RA No. 10173 and its Implementing Rules and Regulations (IRR). </p>

                            <p>This Privacy Policy provides information on how we collect, use, manage and secure your personal information necessary to serve you better. Any information you provide to us indicates your express consent to the content of our Privacy Policy. </p>

                            <p><span class="text-color-primary"><strong>Collection of Personal Data</strong> </span>: We collect the following personal data from you when you apply for our insurance products and services such as your: </p>

                            <ul>
                            <li>Name, birth date, place of birth, sex, nationality;</li>
                            <li>Address (permanent and present addresses);</li>
                            <li>Contract number or information (email address, telephone number and mobile number);</li>
                            <li>PhilID or Government ID information (Passport, SSS or GSIS ID, driver’s license, postal ID); and </li>
                            <li>Source of funds or property and occupation. </li>
                            </ul>

                            <p>When you provide information other than yours, you undertake that you properly obtained their consent. You also certify that all personal data you submit is accurate, complete and up-to-date.</p>

                            <p>We may collect this information when you submit your application personally or through our distribution partners, insurance agents and brokers or when you call us, visit our websites and social media advertisements, submit to us as part your application and claims requirements; and, information that we gather from third-parties such as but not limited to subsidiaries, reinsurers, business partners.</p>

                            <p><strong>Use</strong>: The collected personal data shall be used to process your transactions (e.g. insurance quotations and applications, policy issuance, claims servicing, premium payments); communicate and respond to your request; send your statements billings and notices for your insurance coverage; serve as a reference for promotional information regarding our products; conduct surveys and inform through phone, mail, email, SMS or other communication facility in order to help us take better care of your insurance needs and allow us improve our products and services for you; comply with the directives issued by regulatory bodies; assist the Company in risk management, identity and claim verification and prevent and detect fraud; and, perform any other actions as may be necessary to implement the terms and conditions of our contract.</p>

                            <p>We may disclose and share your personal data to the following: </p>

                            <ul>
                            <li>Our employee handling your account and requests;</li>
                            <li>Our subsidiaries, affiliates and third-party service providers performing financial,administrative technical and other ancillary services;</li>
                            <li>Banks for bancassurance transactions, reinsurance partners and professional advisers performing due diligence checks;</li>
                            <li>Marketing intermediaries, agents, brokers and distributors;</li>
                            <li>Government institution and other competent authorities which by law, rules or regulations requires us to disclose.</li>
                            <li>Claim investigation companies, loss adjusters, assessors/claims investigators, suppliers, repairers;</li>
                            <li>Person or entity that we contractually entered with that ensures the confidentiality standard we implement and adhere to the DPA.</li>
                            <li>Any person that fall within matters of public concern, in order to carry out functions of public authority only to the extent of collection andfurther processing consistent with a constitutionally or statutorily mandated function pertaining to law enforcement, taxation and other regulatory function.</li>
                            </ul>

                            <p>Thus, as a rule, Cocogen is not allowed to share your personal data to third party. However, by giving your consent, you authorize Cocogen to disclose your personal data to the aforementioned individuals and entities that is necessary for the proper execution of processes related to the declared purposes in this Privacy Policy and Consent and may not use it for any other purpose.</p>

                            <p><span class="text-color-primary"><strong>Protection Measures</strong> </span>: To maintain the integrity and confidentiality of your personal data, we have implemented measures to secure and protect it from theft, loss, penetration or breach. We put in place organizational, physical and technical security measures necessary to protect your personal information. We will retain your personal data for as long as necessary to fulfill the purposes of your transactions with the Company, unless a longer period is allowed or required by law. After which physical records shall be disposed of through shredding while digital files shall be anonymized.</p>

                            <p><span class="text-color-primary"><strong>Contact Us</strong> </span>: To exercise your rights under the DPA which include right to erase, block, modify and object to processing your personal data or should you have any inquiries or concerns on this Privacy Policy and Consent and/or complaints, you may contact our Data Protection Officer at:</p>

                            <p>
                            <strong>Cocogen Data Protection Officer</strong><br>
                            <strong>Address</strong>: 22F One Corporate Center,<br>
                            Doña Julia Vargas Avenue corner <br>
                            Meralco Avenue, Ortigas Center, Pasig City <br> 
                            <strong>E-mail</strong>: dpo@cocogen.com    
                            </p>

                            <p>Kindly browse through our Privacy Policy at <a href="www.cocogen.com" class="text-color-primary" target="_blank">www.cocogen.com</a>  to know more on how we protect your personal data.</p>

                            <h4 class="rfs-2-5 rfs-md-1-3">Data Privacy Consent</h4>

                            <p>I hereby certify that I explicitly and unambiguously consent to the collection, processing, sharing, storing of my/our personal data by Cocogen for the purposes/s described in this Privacy Policy. I hereby certify that I carefully understood and comprehend the terms above before giving our consent. I further acknowledge that I have acquired the consent from all parties relevant to this consent and hold free and harmless Cocogen from any complaint, suit or damages which any party may file or claim in relation to my consent.</p>

                            <p><strong>Important: Section 251 of the Insurance Code, as amended, imposes a fine not exceeding twice the amount claimed and/or imprisonment of 2 years, or both, at the discretion of the court, to any person who presents or causes to be presented any fraudulent claim for the payment of a loss under a contract of insurance, and who fraudulently prepares, makes or subscribes any writing with intent to present or use the same, or to allow it to be presented in support of any claim.</strong></p>
                        </div>
                        <div class="modal-footer text-center">
                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade bs-example-modal-lg modal-light" id="termsConditions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="termsConditions">Terms and Conditions</h4>
                        </div>
                        <div class="modal-body">
                            <p><span>The Cocogen Insurance, Inc. website, e-mail newsletters, and mobile services, and any and all materials contained therein, are information services provided by Cocogen, the use of which shall be subject to the following terms and conditions.</span></p>
                            <p><span>By accessing the Cocogen information services and their content, you acknowledge and agree that you have read and understood the following terms and conditions and agree to be bound by them.</span></p>
                            <p><span>As used below, the terms “we”, “us”, and “our” refer to Cocogen.</span></p>
                            <ol>
                                <li><span><strong>CONTENT</strong></span>
                                    <p><span>Cocogen information services are available for information purposes only. The publication and posting of any content and access to any of the Cocogen information services do not constitute, either explicitly or implicitly, any provision of services or products by us. Information concerning Cocogen products or services is only available from the relevant Cocogen companies</span></p>
                                </li>
                                <li><span><strong>NO OFFER</strong></span>
                                    <p><span>No information contained in this website or in any of Cocogen information services should be construed as an offer or a solicitation for an offer, as a statement of law, or as counsel on investment, legal, tax, or other matters. In case of any ambiguity or doubts in the information in Cocogen’s website, you are advised to verify or check with us or seek appropriate professional or legal advice.</span></p>
                                </li>
                                <li><span><strong>NO DUTY TO UPDATE</strong></span>
                                    <p><span>We reserve the right to update, modify, revise and change all the contents of our website and other Cocogen information services. We are not obliged to notify you of any changes made on our Terms and Conditions. However, we will endeavor to regularly update the contents of the website and other Cocogen information services.</span></p>
                                    <p><span>Your continuous access to website following any change in the website signifies that you agree to be bound by the Terms and Conditions, as revised.</span></p>
                                </li>
                                <li><span><strong>COPYRIGHT AND TRADEMARKS</strong></span>
                                    <p><span>All information, photographs, service marks, logos, artworks and all other contents of the website and other Cocogen information services are owned, controlled or licensed by or to Cocogen or its third party licensors, and are protected by intellectual property laws.</span></p>
                                    <p><span>The limited use, copying and distribution without alteration of any of the materials and information contained in the Cocogen website and other Cocogen information services and the use of said materials and information shall be allowed for non-commercial purposes only: provided that all copyright and other proprietary notices shall appear in all copies of the materials and the information in the same manner as the original. The use of the materials for all other purposes is prohibited.</span></p>
                                    <p><span>You shall not use any portion of this website, or any other intellectual property of Cocogen, including but not limited to its service marks, on any other website, in the source code of any other website, or in any other printed or electronic materials without the prior written consent of Cocogen. You shall not modify, publish, reproduce, republish, create derivative works, copy, upload, post, transmit, distribute, or otherwise use any of the Cocogen information services’ contents or frame the Cocogen website within any other website without prior written consent of Cocogen. Systematic retrieval of data from this website to create or compile, directly or indirectly, a collection, compilation, database or directory, without prior written consent from Cocogen, is prohibited. Linking from another website to any page in this website is strictly prohibited without prior written consent of Cocogen.</span></p>
                                </li>
                                <li><span><strong>NO WARRANTY</strong></span>
                                    <p><span>All contents on any and all Cocogen information services, including, but not limited to, graphics, text, and hyperlinks or references to other sites, are subject to change without prior notice and without warranty of any kind, express or implied, including, but not limited to, sustainability for a particular purpose, non-infringement and freedom of rights of third parties.</span></p>
                                    <p><span>We do not guarantee the adequacy, accuracy, reliability or completeness of any information provided by the Cocogen information services and expressly disavow any liability for errors or omissions therein. The user is responsible for the assessment of the information’s adequacy, accuracy, reliability, and completeness.</span></p>
                                    <p><span>We do not guarantee that the functions of the Cocogen information services will be uninterrupted and/or error-free, and that the defects and errors will be corrected or that the Cocogen information services or the servers that make them available are free from computer viruses or other harmful components.</span></p>
                                    <p><span>Should your machine which includes but is not limited to your desktop, laptop, or smartphone, be infected by such viruses while using Cocogen information services, you shall assume the entire cost of all necessary servicing, repairs, or corrections.</span></p>
                                </li>
                                <li><span><strong>HYPERLINKED AND REFERENCED WEBSITES</strong></span>
                                    <p><span>Certain hyperlinks or referenced websites in the Cocogen information services may take you to third-party websites and we do not guarantee the adequacy, accuracy, reliability, or completeness of any information on hyperlinked or referenced websites. We disclaim any liability for any and all of the contents of said hyperlinked or reference websites.</span></p>
                                    <p><span>The hyperlinks to other websites are offered for your convenience only. Their presence in our website does not imply that we endorse such websites or that products or services that are described therein are our own. We likewise do not guarantee the correctness and accuracy of the information in said hyperlinked websites.</span></p>
                                    <p><span>We remind you that different terms and conditions will apply for your use of such websites and that your access to third-party websites is entirely at your risk.</span></p>
                                </li>
                                <li><span><strong>CONFIDENTIALITY OF INFORMATION</strong></span>
                                    <p><span>By using the Cocogen information services, you agree, understand, and confirm that the any and all information, including your credit or debit card details, you provide to access Cocogen information services or to availing of our any of the services in said services are owned by you or that you have lawful authority to use said information.</span></p>
                                    <p><span>We commit that we will not disclose, utilize, and share the said information to any third parties unless required by law, regulation or court order.</span></p>
                                    <p><span>We, as a merchant, shall be under no liability whatsoever in respect of any loss or damage resulting directly or indirectly from the decline of authorization by the card issuer for any transaction on account of the cardholder having exceeded the limit mutually agreed by us with our acquiring bank from time to time.</span></p>
                                </li>
                                <li><span><strong>REFUND AND CANCELLATIONS</strong></span>
                                    <p><span>For concerns regarding refunds and cancellation of policies, please free to contact our Client Services Center via phone at 8830-6000 or via email at client_services@cocogen.com. Please be informed that cancellations will be subject to the specific terms and conditions of the policy sought to be canceled.</span></p>
                                </li>
                                <li><span><strong>LOCAL LEGAL RESTRICTIONS</strong></span>
                                    <p><span>Any information appearing on this website is provided in accordance with and subject to the laws of the Republic of the Philippines.</span></p>
                                    <p><span>Cocogen information services are not intended for any person in any jurisdiction where (by virtue of that person’s nationality, residence or otherwise) the publication or availability of Cocogen information services is prohibited. Persons to whom such prohibition applies may not access the Cocogen information services.</span></p>
                                </li>
                                <li>
                                    <strong><span>RESERVATION OF RIGHTS</span></strong>
                                    <p><span>We reserve the right to change, modify, add to, or remove sections of these terms of use at any time.</span></p>
                                </li>
                                <li>
                                    <p><strong><span>GOVERNING LAW AND DISPUTE RESOLUTION</span></strong></p>
                                    <p><span>You agree that all matters relating to your use and access of all Cocogen information services shall be governed by the laws of the Republic of the Philippines. Any dispute, controversy or claim arising out of or relating to this Terms and Conditions, or the breach, termination or invalidity thereof shall be settled by arbitration in accordance with the PDRCI Arbitration Rules as at present in force.</span></p>
                                </li>
                                <li>
                                    <p><strong><span>ENTIRE AGREEMENT</span></strong></p>
                                    <p><span>This Agreement constitutes the entire agreement between you and Cocogen with respect to your access and/or use of this website.</span></p>
                                </li>
                            </ol>
                        </div>
                        <div class="modal-footer text-center">
                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade bs-example-modal-lg modal-light" id="exclusionslimitations" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="exclusionslimitations">Exclusions and Limitations</h4>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>
                                    <p><span>Only the vehicle owner and/or his duly authorized representative can register.</span></p>
                                </li>
                                <li>
                                    <p><span>The vehicle being insured has not been involved in any vehicular accident and has not been flooded/damaged in any manner as of the time of the insurance of this policy.</span></p>
                                </li>
                                <li>
                                    <p><span>Any damages prior to the issuance of this policy shall not be compensable. This declaration is under the penalty of perjury.</span></p>
                                </li>
                                <li>
                                    <p><span>The vehicle for insurance cover is not used to carry fare-paying passengers (Grab or Rent-a-car).</span></p>
                                </li>
                                <li>
                                    <p><span>If the vehicle is under financing with assumed balance, it cannot be covered due to no insurable interest.</span></p>
                                </li>
                                <li>
                                    <p><span>All undeclared accessories are not covered under this policy.</span></p>
                                </li>
                                <li>
                                    <p><span>The vehicle being insured is not under auto-renewal of insurance with the financing bank.</span></p>
                                </li>
                                <li>
                                    <p><span>The vehicle being insured does not have an existing Direct Link or Cocogen Insurance policy.</span></p>
                                </li>
                                <li><p><span>All Mortgaged vehicles are required to purchase AON coverage.</span></p></li>
                                <li><p><span>Vehicle can only be used in the Republic of the Philippines.</span></p></li>
                                <li><p><span>Only authorized drivers can drive the vehicle.</span></p></li>
                                <li><p><span>There is no cover, whilst onboard a sea vessel on inter-island transit.</span></p></li>
                            </ul>
                        </div>
                        <div class="modal-footer text-center">
                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
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
    </div>
</div>

<section class="divider">
    <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>

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
 <script type="text/javascript">
                  $(document).ready(function(){
                          //apply on typing and focus
                          $('input.currency').on('blur',function(){
                             $(this).manageCommas();
                          });
                          //then sanatize on leave
                        // if sanitizing needed on form submission time, 
                        //then comment beloc function here and call in in form submit function.
                          $('input.currency').on('focus',function(){
                              $(this).santizeCommas();
                          });
                      });

                      String.prototype.addComma = function() {
                        return this.replace(/(.)(?=(.{3})+$)/g,"$1-").replace(',.', '.');
                      }
                      //Jquery global extension method
                      $.fn.manageCommas = function () {
                          return this.each(function () {
                              $(this).val($(this).val().replace(/(-|)/g,'').addComma());
                          });
                      }

                      $.fn.santizeCommas = function() {
                        return $(this).val($(this).val().replace(/(-| )/g,''));
                      }
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
<script type="text/javascript">
    jQuery("#ThirdTabBtuttonBuy").click(function(){
        if ($('#file-upload')[0].files.length == 0) {
            $("#upload_Error").html("Please upload your ID.");    
            $("#upload_Error").show();    
            $("#upload_label").hide();
            $("#upload_file").hide();                   
                return false;
        } 
    
    });
    
    jQuery('#residence_province').change(function(){
        if(jQuery(this).val() != '')
        {         
            var province = jQuery(this).val();   
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/city/get',
                method:"GET",
                data:{ _token:_token,province:province}, 
                success:function(result)
                {        
                    jQuery('#residence_municipality').empty();
                    $('#residence_municipality').append($('<option>', { 
                        value: "",
                        text : "- Select City/Municipality -"
                    }));
                    jQuery.each(result, function(key, value){
                    $('#residence_municipality').append($('<option>', { 
                        value: value.city,
                        text : value.city 
                    }));                    
                })  
                    jQuery('#residence_municipality').selectpicker("refresh"); 
                }
            })
        }
    }); 

  
    jQuery('#residence_municipality').change(function(){
        if(jQuery(this).val() != '')
        {         
            var city = jQuery(this).val();   
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/barangay/get',
                method:"GET",
                data:{ _token:_token,city:city}, 
                success:function(result)
                {        
                    jQuery('#residence_barangay').empty();
                    $('#residence_barangay').append($('<option>', { 
                        value: "",
                        text : "- Select Barangay -"
                    }));
                    jQuery.each(result, function(key, value){
                    $('#residence_barangay').append($('<option>', { 
                        value: value.barangay,
                        text : value.barangay 
                    }));                    
                })  
                    jQuery('#residence_barangay').selectpicker("refresh"); 
                }
            })
        }
    });
  

    jQuery('#file-upload').change(function() {
      var i = jQuery(this).prev('label').clone();
      var file = jQuery('#file-upload')[0].files[0].name;
      if (this.files[0].size > 5000000) {
        jQuery("#upload_Error").html("File size must be greater than 5MB.");   
        jQuery("#upload_Error").show();    
        jQuery("#upload_label").hide();
        jQuery("#upload_file").hide();
        $('#file-upload').val("");
      }else{
        jQuery("#upload_Error").hide();
        jQuery("#upload_file").show();
        jQuery("#upload_label").hide();
        jQuery("#upload_file_file").empty();
        jQuery("#upload_file_file").html(file);

        
      }
    
    });



</script>
<script type="text/javascript">
    jQuery(document).ready(function(e) {   
         var j = jQuery.noConflict();
      
           jQuery('#birthDate').datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: 'mm/dd/yy',
             minDate: '-60y',
             maxDate:'-18y',
             yearRange: '1910:9999'
            }).on('focus', function(){
                if(!jQuery('select').parent().hasClass('fake-select')){
                    jQuery('select').wrap('<span class="fake-select"></span>');
                }
            });   

            

            jQuery('#purchaseDate').datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: 'mm/dd/yy',
             yearRange: '1910:9999'
            }).on('focus', function(){
                if(!jQuery('select').parent().hasClass('fake-select')){
                    jQuery('select').wrap('<span class="fake-select"></span>');
                }
            });   


          var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/covid/province/get',
                method:"GET",
                data:{ _token:_token}, 
                success:function(result)
                {         
                    jQuery.each(result, function(key, value){
                        $('#residence_province').append($('<option>', { 
                            value: value.province,
                            text : value.province 
                        }));

                        $('#mailing_province').append($('<option>', { 
                            value: value.province,
                            text : value.province 
                        }));

                    })       
                  }
                })
    });  
</script>
<script type="text/javascript">
    function CheckNumeric(e) {
        if (window.event) // IE
        {
            if ((e.keyCode < 48 || e.keyCode > 57) & e.keyCode != 8 && e.keyCode != 44) {
                event.returnValue = false;
                return false;
            }
        }
        else { // Fire Fox
            if ((e.which < 48 || e.which > 57) & e.which != 8 && e.which != 44) {
                e.preventDefault();
                return false;
            }
        }
    }     
</script>

@endsection
