@extends('layouts.app')

@section('content')

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token Meta Added -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="build.css">



       <div class="top-container">

             <div class="category-name container">
                <div class="row text-center">
                                
                                <a href="{{route('marinequote')}}"> <h1>MARINE QUOTATION</h1> </a>
                            
                </div>
            </div>
                      
         </div>

<div class="container-fluid edf-body-white" style="margin-top: 20px">

<div class="container" style="text-align: left;margin-top: 20px">

 @if(count($errors) > 0)
                  <br><br>
                        <div class="col-md-12 col-md-offset-0" style="text-align: left;font-family: muli;">
                            <div class="error-msg">
                              <i class="fa fa-times-circle"></i>
<?php 
                              $idname = "";

                              if($errors->first('incept_date') === "The name format is invalid."){
                                    $message = "The Incept Date must be a valid date.";
                                }elseif($errors->first('expiry_date') === "The name format is invalid."){
                                    $message = "The Expiry Date must be a valid date.";                                
                                }elseif($errors->first('Email') === "The name format is invalid."){
                                    $message = "The email must be a valid email address.";                                 
                                }else{
                                    if($errors->has('subline')){
                                      $idname = "Subline";
                                    }

                                    if($errors->has('incept_date')){
                                      if($idname){
                                        $idname = $idname .", Incept Date";
                                      }else{
                                        $idname = "Incept Date";
                                      }                
                                    }

                                    if($errors->has('expiry_date')){
                                      if($idname){
                                        $idname = $idname .", Expiry Date";
                                      }else{
                                        $idname = "Expiry Date";
                                      }                
                                    }

                                     if($errors->has('email')){
                                      if($idname){
                                        $idname = $idname .", Valid Email";
                                      }else{
                                        $idname = "Valid Email";
                                      }                
                                    }
                                    
                                    if($errors->has('email2')){
                                      if($idname){
                                        $idname = $idname .", Email";
                                      }else{
                                        $idname = "Email";
                                      }                
                                    }                                                                       

                                    if($errors->has('sum_insured')){
                                      if($idname){
                                        $idname = $idname .", Sum Insured";
                                      }else{
                                        $idname = "Sum Insured";
                                      }                
                                    }

                                    if($errors->has('acode')){
                                      if($idname){
                                        $idname = $idname .", Agent Code";
                                      }else{
                                        $idname = "Agent Code";
                                      }                
                                    }

                                    if($errors->has('acode2')){
                                      if($idname){
                                        $idname = $idname .", Agent Code";
                                      }else{
                                        $idname = "Agent Code";
                                      }                
                                    }

                                    if($errors->has('agent')){
                                      if($idname){
                                        $idname = $idname .", Name of Agent";
                                      }else{
                                        $idname = "Name of Agent";
                                      }                
                                    }

                                    if($errors->has('agent2')){
                                      if($idname){
                                        $idname = $idname .", Name of Agent";
                                      }else{
                                        $idname = "Name of Agent";
                                      }                
                                    }

                                    if($errors->has('assured')){
                                      if($idname){
                                        $idname = $idname .", Name of Applicant";
                                      }else{
                                        $idname = "Name of Applicant";
                                      }                
                                    }

                                    if($errors->has('assured2')){
                                      if($idname){
                                        $idname = $idname .", Name of Company";
                                      }else{
                                        $idname = "Name of Company";
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

    <div class="form-group">
    <div class="row">
    @if(session('message'))
        <br><br>
        <div class="col-md-12" style="text-align: left;font-family: muli">
            <div class='alert bg bg-success'>
                  <i class="fa fa-check-circle"></i> 
                {{session('message')}}
            </div>
        </div>
        <br>    <br> 
    @endif

    @if(session('message2'))
        <br><br>
        <div class="col-md-12" style="text-align: left;font-family: muli">
            <div class='alert bg bg-success'>
                  <i class="fa fa-check-circle"></i> 
                {{session('message2')}}
            </div>
        </div>
        <br>    <br> 
    @endif

 @if(session('messagefailed'))
    <br><br>
        <div class="col-md-12" style="text-align: left;font-family: muli;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{session('messagefailed')}}
            </div>
        </div>
        <br><br> 
       
@endif

</div>
</div>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="incept_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        var maxDate = new Date(minDate);
        var subline = $("input[name='subline']").val();
  
        if (subline == "MCI")
        {
        maxDate.setFullYear(maxDate.getFullYear() + 1);
        maxDate.setDate(maxDate.getDate());
        }else{
        maxDate.setDate(maxDate.getDate()+200);
        }

        $('#expiry_date').datepicker('setStartDate', minDate);
        $('#expiry_date').datepicker('setEndDate', maxDate);
    });

        var date_input=$('input[name="expiry_date2"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        }).datepicker("setDate", "0");  
        
        var date_input=$('input[name="expiry_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });

        var date_input=$('input[name="birth_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });
                var date_input=$('input[name="birth_date2"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });       

    })
</script>
<script type="text/javascript">

        function Comma(Num) { //function to add commas to textboxes
            Num += '';
            Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
            Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
            x = Num.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1))
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            return x1 + x2;
        }
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 </script>


<input id="transno1" name="transno1" type="text" value="{{session('transno')}}" class="hide">

<form id="form_savecontinue" name="form_savecontinue" method="post" enctype="multipart/form-data" class="form-horizontal">
   {{csrf_field()}}

<input id="transno" name="transno" type="hidden" value="{{session('transno')}}">
<input id="template" name="template" type="hidden" value="{{$template}}">

<div class="panel panel-primary">
  <div class="panel-heading">GET QUOTE</div>
  <div class="panel-body">

 <div class="form-group">
    <label class="control-label col-sm-2" for="subline">*Subline:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="subline" name="subline" placeholder="*Enter Subline" readonly="true" <?php  if($template=="MTR-I" || $template=="MTR-C")  {?> value="MTR" <?php } else {?> value="MCI" <?php }?>>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="incept_date">*Inception:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="incept_date" name="incept_date" placeholder="*Select Incept Date" value="{{old('incept_date')}}" >
    </div>
    <label class="control-label col-sm-2" for="expiry_date">*Expiry:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="*Select Expiry Date" value="{{old('expiry_date')}}">
    </div>    
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="no_days">Number of Days:</label>
    <div class="col-sm-8">

      <input type="text" class="form-control" id="no_days" name="no_days" placeholder="No. of Days" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('no_days')}}" readonly="true">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="rate">Rate:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('rate')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="sum_insured">*Sum Insured:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="sum_insured" name="sum_insured" placeholder="*Enter Sum Insured" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('sum_insured')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="basic_premium">Basic Premium:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="basic_premium" name="basic_premium" placeholder="Basic Premium" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('basic_premium')}}" readonly="true">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="doc_stamps">Doc. Stamps:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="doc_stamps" name="doc_stamps" placeholder="Doc. Stamps" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('doc_stamps')}}" readonly="true">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="vat">VAT:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="vat" name="vat" placeholder="VAT" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('vat')}}" readonly="true">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lgt">LGT:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="lgt" name="lgt" placeholder="LGT" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('lgt')}}" readonly="true">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gross_premium">Gross Premium:</label>
    <div class="col-sm-8">
      <div class="input-group">      
      <input type="text" class="form-control" id="gross_premium" name="gross_premium" placeholder="Gross Premium" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('gross_premium')}}" readonly="true">
      <span class="input-group-btn">
      <button type="submit" id="sendform_calc" name="sendform_calc" class="btn btn-primary" formaction="javascript:void(0)"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Compute</button>  
      </span>
    </div>

    </div>
  </div>              

        <div class="alert alert-danger d-none" id="alert_msg4" hidden>
              <span id="res_error4"></span>
         </div>

  </div>
  </div>
@if($template == 'MTR-I' || $template == 'MCI-I')
<div class="panel panel-primary">
  <div class="panel-heading">INFORMATION</div>
  <div class="panel-body">
  <div class="form-group">
    <label class="control-label col-sm-2" for="agent2">Bussiness Type:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="bussiness_type" name="bussiness_type" value="Indvidual" readonly="true">
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-2" for="acode">Agent Code:</label>    
    <div class="col-sm-3">
    <input type="text" class="form-control" id="acode" name="acode" placeholder="Agent Code*" onkeypress="return isNumber(event)" <?php  if(\Auth::user()->accountType == 'Agent')  {?> value="{{\Auth::user()->agentID}}"  <?php } else {?> value="{{old('acode')}}"  <?php } ?> <?php  if(\Auth::user()->accountType == 'Agent')  {?> readonly  <?php } ?>> 
    </div>   
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="agent">*Name of Agent:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="agent" name="agent" placeholder="*Enter Name of Agent" 

                    <?php  if(\Auth::user()->accountType == 'Agent')  {?> value="{{\Auth::user()->name}}"  <?php } else {?> value="{{old('agent')}}"  <?php } ?>  

                    <?php  if(\Auth::user()->accountType == 'Agent')  {?> readonly  <?php } ?> >
    </div>
  </div>    
  <div class="form-group">
    <label class="control-label col-sm-2" for="assured">*Name of Applicant:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="assured" name="assured" placeholder="*Enter Name of Applicant" value="{{old('assured')}}">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="birth_date">Date of Birth:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Select Date of Birth" value="{{old('birth_date')}}">
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{old('address')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="contact_no">Contact No.:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact No." value="{{old('contact_no')}}" onkeypress="return isNumber(event)">
    </div>
  </div>   
  <div class="form-group">
    <label class="control-label col-sm-2" for="employer">Employer:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="employer" name="employer" placeholder="Enter Employer" value="{{old('employer')}}">
    </div>
  </div>        
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">*Email Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{old('email')}}">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="office_address">Office Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="office_address" name="office_address" placeholder="Enter Office Address" value="{{old('office_address')}}">
    </div>
  </div> 
 
  <div class="form-group">
    <label class="control-label col-sm-2" for="tin">TIN:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="tin" name="tin" placeholder="Enter TIN" value="{{old('tin')}}">
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-2" for="occupation">Occupation:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation" value="{{old('occupation')}}">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="other_idno">Other ID No.:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="other_idno" name="other_idno" placeholder="Enter Other ID No." value="{{old('other_idno')}}">
    </div>
  </div>        
  </div>
  </div>
 @endif

 @if($template == 'MTR-C' || $template == 'MCI-C')
 <div class="panel panel-primary">
  <div class="panel-heading">INFORMATION</div>
  <div class="panel-body">
  <div class="form-group">
    <label class="control-label col-sm-2" for="agent2">Bussiness Type:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="bussiness_type" name="bussiness_type" value="Corporate" readonly="true">
    </div>
  </div> 
   <div class="form-group">
    <label class="control-label col-sm-2" for="acode2">Agent Code:</label>    
    <div class="col-sm-3">
    <input type="text" class="form-control" id="acode2" name="acode2" placeholder="Agent Code*" onkeypress="return isNumber(event)" <?php  if(\Auth::user()->accountType == 'Agent')  {?> value="{{\Auth::user()->agentID}}"  <?php } else {?> value="{{old('acode')}}"  <?php } ?> <?php  if(\Auth::user()->accountType == 'Agent')  {?> readonly  <?php } ?>> 
    </div>   
  </div>     
  <div class="form-group">
    <label class="control-label col-sm-2" for="agent2">*Name of Agent:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="agent2" name="agent2" placeholder="*Enter Name of Agent"   

      <?php  if(\Auth::user()->accountType == 'Agent')  {?> value="{{\Auth::user()->name}}"  <?php } else {?> value="{{old('agent')}}"  <?php } ?>  

      <?php  if(\Auth::user()->accountType == 'Agent')  {?> readonly  <?php } ?> >

    </div>
  </div>     
  <div class="form-group">
    <label class="control-label col-sm-2" for="assured2">*Name of Company:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="assured2" name="assured2" placeholder="*Enter Name of Company" value="{{old('assured2')}}">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="birth_date2">Date of Incorporation:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="birth_date2" name="birth_date2" placeholder="Select Date of Incorporation" value="{{old('birth_date2')}}">
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-2" for="address2">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address" value="{{old('address2')}}">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email2">*Email Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email2" name="email2" placeholder="Enter Email Address" value="{{old('email2')}}" >
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-2" for="employer2">Contact Person:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="employer2" name="employer2" placeholder="Enter Contact Person" value="{{old('employer2')}}">
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-2" for="contact_no2">Contact No.:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="contact_no2" name="contact_no2" placeholder="Enter Contact No." value="{{old('contact_no2')}}" onkeypress="return isNumber(event)">
    </div>
  </div>          
   <div class="form-group">
    <label class="control-label col-sm-2" for="office_address2">Office Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="office_address2" name="office_address2" placeholder="Enter Office Address" value="{{old('office_address2')}}">
    </div>
  </div> 
 
  <div class="form-group">
    <label class="control-label col-sm-2" for="tin2">TIN:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="tin2" name="tin2" placeholder="Enter TIN" value="{{old('tin2')}}">
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-2" for="occupation2">Main Product:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="occupation2" name="occupation2" placeholder="Enter Main Product" value="{{old('occupation2')}}">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="other_idno2">Other ID No.:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="other_idno2" name="other_idno2" placeholder="Enter Other ID No." value="{{old('other_idno2')}}">
    </div>
  </div>        
  </div>
  </div>
@endif

@if(session('transno'))
<div class="panel panel-primary">
  <div class="panel-heading">DETAILS</div>
  <div class="panel-body">

  <div class="form-group">
    <label class="control-label col-sm-2" for="interested_insured">*Interested Insured:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="interested_insured" name="interested_insured" placeholder="*Enter Interested Insured">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="aggregate_limit">Sum Insured:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="aggregate_limit" name="aggregate_limit" placeholder="Enter Aggregate Limit">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="warehouse">*Location of Warehouse:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="warehouse" name="warehouse" placeholder="*Enter Location of Warehouse">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="frequency">No. Of Days:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="frequency" name="frequency" placeholder="Enter Frequency" onkeypress="return isNumber(event)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="prev_insurer">Previous Insurer:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="prev_insurer" name="prev_insurer" placeholder="Enter Previous Insurer">
    </div>
  </div>
  <div class="form-group hide">
    <label class="control-label col-sm-2" for="limit_truck">Limit per Truck:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="limit_truck" name="limit_truck" placeholder="Enter Limit per Truck">
    </div>
  </div>
 @if($template == 'MTR-C' || $template == 'MTR-I')
  <div class="form-group">
    <label class="control-label col-sm-2" for="transit">Transit/Route:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="transit" name="transit" placeholder="Enter Transit/Route">
    </div>
  </div>
  @endif
   @if($template == 'MCI-C' || $template == 'MCI-I')
  <div class="form-group">
    <label class="control-label col-sm-2" for="point_origin">Point of Origin:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="point_origin" name="point_origin" placeholder="Enter Point of Origin">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="point_destination">Point of Destinatioin:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="point_destination" name="point_destination" placeholder="Enter Point of Destinatioin">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="packaging">Packaging:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="packaging" name="packaging" placeholder="Enter Packaging">
    </div>
  </div>    
  @endif
  <div class="form-group">
    <label class="control-label col-sm-2" for="loss_xp">Loss Experience:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="loss_xp" name="loss_xp" placeholder="Enter Loss Experience">
    </div>
  </div>

</div>
</div>

<!--Truck Soecification-->

<div class="panel panel-primary hide">
  <div class="panel-heading">TRUCK SPECIFICATION</div>
  <div class="panel-body">
    

         <div class="alert alert-success d-none" id="msg_div2" hidden>
              <span id="res_message2"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg2" hidden>
              <span id="res_error2"></span>
         </div>

    <div class="form-group">
 
                <div class="col-sm-3">

                <input type="text" name="type_truck" class="form-control" id="type_truck" placeholder="*Type of Truck">
                <span class="text-danger">{{ $errors->first('type_truck') }}</span>

                </div>
                <div class="col-sm-2">

                <input type="text" name="plate_no" class="form-control" id="plate_no" placeholder="*Plate No.">
                <span class="text-danger">{{ $errors->first('plate_no') }}</span>

                </div>

                <div class="col-sm-3">

                <input type="text" name="motor_no" class="form-control" id="motor_no" placeholder="*Motor No.">
                <span class="text-danger">{{ $errors->first('motor_no') }}</span>

                </div>

                <div class="col-sm-3">

                <input type="text" name="serial_no" class="form-control" id="serial_no" placeholder="*Serial No.">
                <span class="text-danger">{{ $errors->first('serial_no') }}</span>

                </div>

                 <div class="col-sm-1">

                <button type="submit" id="sendform_truck" name="sendform_truck" class="btn btn-primary" formaction="javascript:void(0)">Add</button>

                </div>            

    </div>


    <div class="form-group">
    <div class="col-sm-12">

    <table id="truck_table" name="truck_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Type of Truck</th>
                <th>Plate No.</th>
                 <th>Motor No.</th>
                <th>Serial No.</th>               
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>

  </div>

<div class="panel panel-primary hide">
  <div class="panel-heading">CREW DETAILS</div>
  <div class="panel-body">
  <div class="form-group">
    <label class="control-label col-sm-4" for="no_driver">Number of drivers employed:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="no_driver" name="no_driver" placeholder="Enter Number of drivers employed" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('no_driver')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="no_helper">Number of helpers employed:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="no_helper" name="no_helper" placeholder="Enter Number of helpers employed" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('no_helper')}}">
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-4" for="reg_employee">Are all driver and helpers regular employees?</label>
    <div class="col-sm-4">
      <label class="radio-inline"><input type="radio" name="reg_employee" value="Yes" checked>YES</label>
      <label class="radio-inline"><input type="radio" name="reg_employee" value="No">NO</label>
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-4" for="no_regular">How many are not?</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="no_regular" name="no_regular" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('no_regular')}}">
    </div>
  </div>  
  <div class="form-group">
   <label class="control-label col-sm-4" for="loss_xp">SPECIFY HIRING PROCESS:</label>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="hired_driver">Drivers</label>
    <div class="col-sm-4">
      <label class="radio-inline"><input type="radio" name="hired_driver" value="Direct" checked>Direct Hire </label>
      <label class="radio-inline"><input type="radio" name="hired_driver" value="Agency">Agency</label>
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="loss_xp">Helpers</label>
    <div class="col-sm-4">
      <label class="radio-inline"><input type="radio" name="hired_helper" value="Direct" checked>Direct Hire </label>
      <label class="radio-inline"><input type="radio" name="hired_helper" value="Agency">Agency</label>
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-4" for="loss_xp">Substitute</label>
    <div class="col-sm-4">
      <label class="radio-inline"><input type="radio" name="hired_substitute" value="Direct" checked>Direct Hire</label>
      <label class="radio-inline"><input type="radio" name="hired_substitute" value="Agency">Agency</label>
    </div>
  </div>     
  </div>
  </div>

<div class="panel panel-primary">
<div class="panel-heading">ATTACHMENT(S)</div>
<div class="panel-body">

    
         <div class="alert alert-success d-none" id="msg_div8" hidden>
              <span id="res_message8"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg8" hidden>
              <span id="res_error8"></span>
         </div>

    <div class="form-group" id="div_attachment" name="div_attachment">


                <div class="col-sm-10">

                <input type="file" class="required-entry" name="filename" id="filename" accept="application/msword, application/pdf">

                </div>
                <div class="col-sm-2">

                <button type="submit" id="sendform_attachment" name="sendform_attachment" class="btn btn-primary" formaction="javascript:void(0">Upload</button>

                </div>            
    </div>
 


    <div class="form-group">
    <div class="col-sm-12">

    <table id="attachment_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Filename</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>



</div>
</div>

  <!--Comments-->
<div class="panel panel-primary">
  <div class="panel-heading">COMMENT/S</div>
  <div class="panel-body">
 
  <div class="form-group">

    <div class="col-sm-12">
      <div id="marine_comment" class="marine_comment">
    
      </div>
    </div>  

   </div>

  </div> 
  <div class="panel-footer">

 
    <div class="form-group">
    <div class="col-sm-12">

        <textarea rows="5" name="txt_comment" id="txt_comment" class="form-control required-entry" placeholder="Comments*">{{old('remarks')}}</textarea>      
    </div>

    </div> 

      <div class="alert alert-success d-none" id="msg_div10" hidden>
              <span id="res_message10"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg10" hidden>
              <span id="res_error10"></span>
         </div>

    <div class="form-group">

    <div class="col-sm-12" align="center">

      <button type="submit" id="sendform_comment" name="sendform_comment" class="btn btn-primary" formaction="javascript:void(0)">Post Comment</button>

    </div>

    </div> 


  </div>  
</div>
  @endif

<div class="panel panel-primary">
  <div class="panel-body">
 
         <div class="alert alert-success d-none" id="msg_div12" hidden>
              <span id="res_message"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg12" hidden>
              <span id="res_error"></span>
         </div>
    <div class="form-group">
    <div class="row">

                <div class="col-sm-12" align="center">

                    <input type="submit" value="Save and Continue" formaction="{{route('savequotemarine')}}" 

                   <?php  if(session('message') || session('message2'))  {?> class="hide" <?php } else {?> class="btn btn-primary" <?php } ?>

                    />
                @if(session('quotestatus'))  

                <input type="submit" value="Save" id="sendform_save" name="sendform_save" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />

                <input type="submit" value="Submit" id="sendform_marine" name="sendform_marine" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />

                <input type="submit" value="Clear" class="btn btn-success" style="min-width: 100px; margin-top: 10px" formaction="{{route('refreshquotemarine')}}" />

                <a href="{{route('marinequote')}}" class="btn btn-success" style="min-width: 100px; margin-top: 10px">Back</a> @endif                  

                </div>

    </div>
    </div> 
     
  </div>
</div>
</form>

  <script>

 
   var trans_id = $("input[name='transno']").val();
  
  if (trans_id == "")
  {

    trans_id = "0";
    $("input[name='transno']").val("0");
    $("input[name='transno1']").val("0");
  }
  else

  {

    $("input[name='transno1']").val(trans_id);
    $("input[name='transno']").val(trans_id);

  }

  

   $(document).ready( function (){
 
   $("#incept_date").change(function(){

            $("input[name='expiry_date']").val("");

});
 
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

   $.fn.dataTable.ext.errMode = 'throw';

    $('#truck_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getmarine-truck') }}"+"/"+trans_id,
           type: "POST",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'type_truck', name: 'type_truck' },
                    { data: 'plate_no', name: 'plate_no' },
                    { data: 'motor_no', name: 'motor_no' },
                    { data: 'serial_no', name: 'serial_no' },
                    {data: 'action', name: 'action', orderable: false},
                 ],
           columnDefs: [{ "width": "40px", "targets": [5] }]        
        });

           $('#attachment_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getmarineattachment') }}"+"/"+trans_id,
           type: "POST",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'filename2', name: 'filename2', render:function(data, type, row){
    return "<a href='{{url('/get-quote/view/marine/')}}/" + row.filename2 +"/"+ row.id +"' target='_blank' >" + row.filename2 + "</a>"
} },
                    {data: 'action', name: 'action', orderable: false},
                 ],
            columnDefs: [{ "width": "40px", "targets": [2] }]      
        }); 

        $(document).on('click', '.delete_truck', function(){

        //var SITEURL = '{{URL::to('')}}';
        var truck_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/marinedeletetruck')}}"+"/"+truck_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#truck_table').dataTable(); 
              oTable.fnDraw(false);
              }
          });
        }

      });

        $(document).on('click', '.delete_truck', function(){

        //var SITEURL = '{{URL::to('')}}';
        var truck_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/marinedeletetruck')}}"+"/"+truck_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#truck_table').dataTable(); 
              oTable.fnDraw(false);
              }
          });
        }

      });

         $(document).on('click', '.delete_attachment', function(){

        //var SITEURL = '{{URL::to('')}}';
        var attach_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/marinedeleteattachment')}}"+"/"+attach_id+"/"+trans_id,
              success: function (data) {

            $('#msg_div8').show();
            $('#res_message8').show();
            $('#res_message8').html("Delete Completed!");
            $('#msg_div8').removeClass('d-none');

              var oTable = $('#attachment_table').dataTable(); 
              oTable.fnDraw(false);
 
            setTimeout(function(){
            $('#msg_div8').hide();        
            },10000);

              }



          });


        }

 });

           $(document).on('click', '.delete_comments', function(){

        //var SITEURL = '{{URL::to('')}}';
        var remarks_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/marinedeletecomments')}}"+"/"+remarks_id,
              success: function (data) {
                    getcomments(trans_id);
              }
          });
        }


 });         

    });

</script>

<script>
$(document).ready( function (){

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

$('#sendform_truck').click(function(e){
   
   e.preventDefault();

   $('#sendform_truck').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addmarine-truck')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg2').hide();
            $('#sendform_truck').html('Add');
            $('#msg_div2').show();
            $('#res_message2').show();
            $('#res_message2').html(response.success);
            $('#msg_div2').removeClass('d-none');
            $("input[name='type_truck']").val("");
            $("input[name='plate_no']").val("");
            $("input[name='motor_no']").val("");
            $("input[name='serial_no']").val("");

              var oTable = $('#truck_table').dataTable();
              oTable.fnDraw(false);
          }else{
                        $('#msg_div2').hide();
                        $('#alert_msg2').show();
                        $('#sendform_truck').html('Add');
                        $('#res_error2').html(response.error);
                    }

         //--------------------------
      }

    });  

   });

  $('#sendform_save').click(function(e){
   
   e.preventDefault();

   //var trans_id = $("input[name='transno']").val();

   $('#sendform_save').html('Updating...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/marine-quoteupdate')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#msg_div12').show();
            $('#res_message').show();
            $('#res_message').html(response.success);
            $('#msg_div12').removeClass('d-none');

            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_save').html('Save');
                        $('#res_error').html(response.error);
                        
            }

            setTimeout(function(){
            $('#msg_div12').hide();
            $('#alert_msg12').hide();            
            },10000);          
         //--------------------------
      }

    });  

   }); 

$('#sendform_marine').click(function(e){
   
   e.preventDefault();

   //var trans_id = $("input[name='transno']").val();

   $('#sendform_marine').html('Submitting...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/marine-quotesubmit')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#sendform_save').hide();
            $('#sendform_marine').hide();
            $('#msg_div12').show();
            $('#res_message').show();
            $('#res_message').html(response.success);
            $('#msg_div12').removeClass('d-none');

            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_marine').html('Submit');
                        $('#res_error').html(response.error);
                        
            }

            setTimeout(function(){
            $('#msg_div12').hide();
            $('#alert_msg12').hide();            
            },10000);          
         //--------------------------
      }

    });  

   });

$('#sendform_comment').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

      $('#sendform_comment').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addmarinecomments')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){

            $('#alert_msg10').hide();
            $('#sendform_comment').html('Post Comments');
            $('#msg_div10').show();
            $('#res_message10').show();
            $('#res_message10').html(response.success);
            $('#msg_div10').removeClass('d-none');
            $("input[name='txt_comment']").val("");

              $('#form_comment').trigger("reset");
              getcomments(trans_id);
            }else{
                        $('#msg_div10').hide();
                          $('#alert_msg10').show();
                        $('#sendform_comment').html('Post Comments');
                        $('#res_error10').html(response.error);  
                        
                    }
         //--------------------------
      }

    });  


 });

   $('#sendform_attachment').click(function(e){
   

   e.preventDefault();
   
   var form = document.getElementById('form_savecontinue');
   var trans_id = $("input[name='transno']").val();
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

   var formData = new FormData(form);
   formData.append('trans_id', trans_id);
   formData.append( '_token', CSRF_TOKEN  );

    //console.log(formData.get('_token'));
   $('#sendform_attachment').html('Uploading...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addmarineattachment')}}",
      method: "POST",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg8').hide();
            $('#sendform_attachment').html('Upload');
            $('#msg_div8').show();
            $('#res_message8').show();
            $('#res_message8').html(response.success);
            $('#msg_div8').removeClass('d-none');

              var oTable = $('#attachment_table').dataTable();
              oTable.fnDraw(false);

              //var oTable1 = $('#change_table').dataTable();
              //oTable1.fnDraw(false);              
            }else{
                        $('#msg_div8').hide();
                          $('#alert_msg8').show();
                          $('#res_error8').show();
                        $('#sendform_attachment').html('Upload');
                        $('#res_error8').html(response.error);
                        
                    }
            setTimeout(function(){
            $('#msg_div8').hide();
            $('#alert_msg8').hide();            
            },10000);

         //--------------------------
      }

    }); 

   });

   $('#sendform_calc').click(function(e){
   
   e.preventDefault();

    
$.ajax({
      url: "{{ url('/get-quote/marine-calcpremium')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){

            $("input[name='no_days']").val(response.nodays);
            $("input[name='rate']").val(response.rate);
            $("input[name='basic_premium']").val(response.basic_premium);
            $("input[name='doc_stamps']").val(response.doc_stamps);
            $("input[name='vat']").val(response.vat);
            $("input[name='lgt']").val(response.lgt);
            $("input[name='gross_premium']").val(response.gross_premium);

            }else{
                        $('#alert_msg4').show();
                        $('#res_error4').html(response.error);  
                        
                    }

            setTimeout(function(){
            $('#alert_msg4').hide();            
            },10000);
         //--------------------------
      }

    });  

 });

});

         function getcomments(id){

            $.ajax({
                type:'get',
                url: "{{ url('/get-quote/marinecomments')}}"+"/"+trans_id,
                success:function(data){
                 $('#marine_comment').html(data); 

                },
                error:function(){

                }
            });
        }

        function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            document.getElementById(emailField.id).focus();
            return false;
        }

        return true;

        } 

   </script>

@endsection
