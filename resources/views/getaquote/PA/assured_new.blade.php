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
                                
                                <a href="{{route('paquote')}}"> <h1>PERSONAL ACCIDENT QUOTATION</h1> </a>
                            
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

                              if($errors->first('birthdate') === "The name format is invalid."){
                                    $message = "The Date of Birth must be a valid date.";                               
                                }elseif($errors->first('email') === "The name format is invalid."){
                                    $message = "The email must be a valid email address.";                                 
                                }else{
                                    if($errors->has('fname')){
                                      $idname = "First Name";
                                    }

                                    if($errors->has('mi')){
                                      if($idname){
                                        $idname = $idname .", Middle Initial";
                                      }else{
                                        $idname = "Middle Initial";
                                      }                
                                    }

                                    if($errors->has('lname')){
                                      if($idname){
                                        $idname = $idname .", Last Name";
                                      }else{
                                        $idname = "Last Name";
                                      }                
                                    }

                                     if($errors->has('email')){
                                      if($idname){
                                        $idname = $idname .", Email";
                                      }else{
                                        $idname = "Email";
                                      }                
                                    }
                                                                                                           
                                     if($errors->has('address')){
                                      if($idname){
                                        $idname = $idname .", Address";
                                      }else{
                                        $idname = "Address";
                                      }                
                                    }

                                    if($errors->has('landline')){
                                      if($idname){
                                        $idname = $idname .", Landline No.";
                                      }else{
                                        $idname = "Landline No.";
                                      }                
                                    }


                                    if($errors->has('cellphone')){
                                      if($idname){
                                        $idname = $idname .", Mobile No.";
                                      }else{
                                        $idname = "Mobile No.";
                                      }                
                                    }

                                    if($errors->has('tin')){
                                      if($idname){
                                        $idname = $idname .", TIN";
                                      }else{
                                        $idname = "TIN";
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
        var date_input=$('input[name="birthdate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        var maxDate = new Date(minDate);
        maxDate.setDate(maxDate.getDate()+200);
        $('#expiry_date').datepicker('setStartDate', minDate);
        $('#expiry_date').datepicker('setEndDate', maxDate);
    });



        var date_input=$('input[name="birth_date"]'); //our date input has the name "date"
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


<form id="form_savecontinue" name="form_savecontinue" method="post" enctype="multipart/form-data" class="form-horizontal">
   {{csrf_field()}}

<input id="transno" name="transno" type="hidden" value="{{session('transno')}}">

<div class="panel panel-primary">
  <div class="panel-heading">ASSURED DETAILS</div>
  <div class="panel-body">
  <div class="form-group">
    <label class="control-label col-sm-2" for="fname">*First Name:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="fname" name="fname" placeholder="*Enter First Name" value="{{old('fname')}}">
    </div>
    <label class="control-label col-sm-2" for="mi">*Middle Initial:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="mi" name="mi" placeholder="*Enter Middle Initial" value="{{old('mi')}}">
    </div>    
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="lname">*Last Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="{{old('lname')}}">
    </div>
  </div> 
    <div class="form-group">
    <label class="control-label col-sm-2" for="birthdate">*Date of Birth:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Select Date of Birth" value="{{old('birthdate')}}">
    </div>
    <label class="control-label col-sm-2" for="gender">*Gender:</label>
    <div class="col-sm-3">
          <select id="gender" name="gender" class="form-control">
          <option value="Male" @if(old('gender') == 'Male') selected="selected"@endif >Male</option>
          <option value="Female" @if(old('gender') == 'Female') selected="selected"@endif>Female</option>
          </select>
  </div>    
  </div> 
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">*Email Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{old('email')}}" >
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">*Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{old('address')}}">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="landline">*Landline No.:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="landline" name="landline" placeholder="*Enter Landline" value="{{old('landline')}}"  onkeypress="return isNumber(event)">
    </div>
    <label class="control-label col-sm-2" for="cellphone">*Mobile No.:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="*Enter Mobile No." value="{{old('cellphone')}}"  onkeypress="return isNumber(event)">
  </div>    
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="tin">*TIN:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="tin" name="tin" placeholder="*Enter TIN" value="{{old('tin')}}" onkeypress="return isNumber(event)">
    </div>    
  </div>             

        <div class="alert alert-danger d-none" id="alert_msg4" hidden>
              <span id="res_error4"></span>
         </div>

  </div>
  </div>

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

                <input type="submit" value="Save" id="sendform_save" name="sendform_save" style="min-width: 100px; margin-top:10px" formaction="{{route('saveassured')}}"  

                <?php  if(session('message'))  {?> class="hide" <?php } else {?> class="btn btn-success" <?php } ?>

                />

                <a href="{{route('newassured')}}" style="min-width: 100px; margin-top: 10px"

                <?php  if(session('message'))  {?> class="hide" <?php } else {?> class="btn btn-success" <?php } ?>

                >Clear</a> 

                <a href="{{route('assuredmaintenance')}}" class="btn btn-success" style="min-width: 100px; margin-top: 10px">Back</a>                   

                </div>

    </div>
    </div> 
     
  </div>
</div>
</form>


@endsection
