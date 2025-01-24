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

                              if($errors->first('incept_date') === "The name format is invalid."){
                                    $message = "The Incept Date must be a valid date.";                               
                                }elseif($errors->first('expiry_date') === "The name format is invalid."){
                                    $message = "The Expiryt Date must be a valid date.";                                 
                                }else{
                                    if($errors->has('subline')){
                                      $idname = "Subline";
                                    }

                                    if($errors->has('item_no')){
                                      if($idname){
                                        $idname = $idname .", Item No.";
                                      }else{
                                        $idname = "Item No.";
                                      }                
                                    }

                                    if($errors->has('item_title')){
                                      if($idname){
                                        $idname = $idname .", Item Title";
                                      }else{
                                        $idname = "Item Title";
                                      }                
                                    }


                                    if($errors->has('item_no')){
                                      if($idname){
                                        $idname = $idname .", Intermediary No.";
                                      }else{
                                        $idname = "Intermediary No.";
                                      }                
                                    }


                                    if($errors->has('beneficiary')){
                                      if($idname){
                                        $idname = $idname .", Beneficiary Name";
                                      }else{
                                        $idname = "Beneficiary Name";
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
        
        var date_input=$('input[name="incept_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });

        var date_input=$('input[name="expiry_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        }); 

        var date_input=$('input[name="ebirthdate"]'); //our date input has the name "date"
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

@foreach($cocogen_assured_maintenance as $cocogen_assured)
<form id="form_savecontinue" name="form_savecontinue" method="post" enctype="multipart/form-data" class="form-horizontal">
   {{csrf_field()}}

<input id="assuredno" name="assuredno" type="hidden" value="{{$cocogen_assured->id}}">
<input id="transno" name="transno" type="hidden" value="{{session('transno')}}">

<div class="panel panel-primary">
  <div class="panel-heading">ASSURED DETAILS</div>
  <div class="panel-body">
   <div class="form-group">
    <label class="control-label col-sm-2" for="assured">Assured Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="assured" name="assured" value="{{$cocogen_assured->fullname}}" readonly="true">
    </div>
  </div> 
    <div class="form-group">
    <label class="control-label col-sm-2" for="birthdate">Date of Birth:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Select Date of Birth" value="{{$cocogen_assured->birthdate}}" readonly="true">
    </div>
    <label class="control-label col-sm-2" for="gender">Gender:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="gender" name="gender" value="{{$cocogen_assured->gender}}" readonly="true">
  </div>    
  </div> 
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$cocogen_assured->email}}" readonly="true">
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{$cocogen_assured->address}}" readonly="true">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="landline">Landline No.:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="landline" name="landline" placeholder="*Enter Landline" value="{{$cocogen_assured->landline}}"  onkeypress="return isNumber(event)" readonly="true">
    </div>
    <label class="control-label col-sm-2" for="cellphone">Mobile No.:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="*Enter Mobile No." value="{{$cocogen_assured->cellphone}}"  onkeypress="return isNumber(event)" readonly="true">
  </div>    
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="tin">TIN:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="tin" name="tin" placeholder="*Enter TIN" value="{{$cocogen_assured->tin}}" onkeypress="return isNumber(event)" readonly="true">
    </div>    
  </div>             

        <div class="alert alert-danger d-none" id="alert_msg4" hidden>
              <span id="res_error4"></span>
         </div>

  </div>
  </div>

<div class="panel panel-primary">
  <div class="panel-heading">QUOTATION DETAILS</div>
  <div class="panel-body">
   <div class="form-group">
    <label class="control-label col-sm-2" for="subline">*Subline:</label>
    <div class="col-sm-8">
                            <select class="form-control validate-select" name="subline" id="subline" style="text-transform: capitalize;padding: 8px;">
                                @foreach($cocogen_pa_subline  as $cocogen_subline)
                                <option value="{{$cocogen_subline->scode}}" data-value="{{$cocogen_subline->scode}}" @if(old('subline') == $cocogen_subline->scode) selected="selected"@endif>{{$cocogen_subline->sdesc}}</option>
                                @endforeach
                            </select>
    </div>
  </div>     
  <div class="form-group">
    <label class="control-label col-sm-2" for="incept_date">*Inception Date:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="incept_date" name="incept_date" placeholder="*Select Incept Date" value="{{old('incept_date')}}" >
    </div>
    <label class="control-label col-sm-2" for="expiry_date">*Expiry Date:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="*Select Expiry Date" value="{{old('expiry_date')}}">
    </div>    
  </div>  
    <div class="form-group">
    <label class="control-label col-sm-2" for="item_no">*Item No.:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="item_no" name="item_no" placeholder="Enter Item No." value="{{old('item_no')}}">
    </div>   
    </div>   

   <div class="form-group">
    <label class="control-label col-sm-2" for="item_title">*Item Title:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="item_title" name="item_title" value="{{old('item_title')}}" placeholder="Enter Item Title" >
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="currency">*Currency:</label>
    <div class="col-sm-3">
          <select id="currency" name="currency" class="form-control">
          <option value="Peso" @if(old('currency') == 'Peso') selected="selected"@endif >Peso</option>
          <option value="Dollar" @if(old('currency') == 'Dollar') selected="selected"@endif>Dollar</option>
          </select>
  </div>    
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="currency_rate">Currency Rate:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="currency_rate" name="currency_rate" placeholder="Enter Currency Rate" value="{{old('currency_rate')}}">
    </div>   
    </div> 
    <div class="form-group">
    <label class="control-label col-sm-2" for="itm_no">*Intermediary No.:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="itm_no" name="itm_no" placeholder="Enter Intermediary No." 
      <?php  if(\Auth::user()->accountType == 'Agent')  {?> value="{{\Auth::user()->agentID}}"  <?php } else {?> value="{{old('agent')}}"  <?php } ?>  <?php  if(\Auth::user()->accountType == 'Agent')  {?> readonly  <?php } ?>>
    </div>   
    </div>   

   <div class="form-group">
    <label class="control-label col-sm-2" for="beneficiary">*Beneficiary Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="beneficiary" name="beneficiary" value="{{old('beneficiary')}}" placeholder="Enter Beneficiary" >
    </div>
    </div>

  </div>
</div>  

@if(session('transno'))
<div class="panel panel-primary">
  <div class="panel-heading">ENROLLEES</div>
  <div class="panel-body">
    

         <div class="alert alert-success d-none" id="msg_div2" hidden>
              <span id="res_message2"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg2" hidden>
              <span id="res_error2"></span>
         </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="enrollee_name">*Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="enrollee_name" name="enrollee_name" placeholder="Enter Enrollee Name" value="{{old('enrollee_name')}}">
    </div>
  </div> 
    <div class="form-group">
    <label class="control-label col-sm-2" for="egender">*Gender:</label>
    <div class="col-sm-3">
          <select id="egender" name="egender" class="form-control">
          <option value="Male" @if(old('egender') == 'Male') selected="selected"@endif >Male</option>
          <option value="Female" @if(old('egender') == 'Female') selected="selected"@endif>Female</option>
          </select>
    </div>  
    <label class="control-label col-sm-2" for="civil_status">*Civil Status:</label>
    <div class="col-sm-3">
          <select id="civil_status" name="civil_status" class="form-control">
          <option value="Single" @if(old('civil_status') == 'Single') selected="selected"@endif >Single</option>
          <option value="Married" @if(old('civil_status') == 'Married') selected="selected"@endif>Married</option>
          <option value="Divorced" @if(old('civil_status') == 'Divorced') selected="selected"@endif >Divorced</option>
          <option value="Widowed" @if(old('civil_status') == 'Widowed') selected="selected"@endif>Widowed</option>          </select>
    </div>       
  </div>   
    <div class="form-group">
    <label class="control-label col-sm-2" for="ebirthdate">*Date of Birth:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="ebirthdate" name="ebirthdate" placeholder="Select Date of Birth" value="{{old('ebirthdate')}}">
    </div>
    <label class="control-label col-sm-2" for="age">*Age:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="age" name="age" placeholder="*Enter Age" value="{{old('age')}}"  onkeypress="return isNumber(event)">
    </div>   
  </div> 
   <div class="form-group">
    <label class="control-label col-sm-2" for="eremarks">Remarks:</label>
    <div class="col-sm-8">
      <div class="input-group"> 
      <input type="text" class="form-control" id="eremarks" name="eremarks" placeholder="Enter Remarks" value="{{old('remarks')}}" >
      <span class="input-group-btn">
      <button type="submit" id="sendform_enrollee" name="sendform_enrollee" class="btn btn-primary" formaction="javascript:void(0)">Add</button> 
      </span>      
      </div>   
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-12">

    <table id="enrollee_table" name="enrollee_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>Date of Birth</th>   
                <th>Age</th>   
                <th>Remarks</th>           
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>

  </div>

<div class="panel panel-primary">
  <div class="panel-heading">COVERAGE</div>
  <div class="panel-body">

   <div class="form-group">
    <label class="control-label col-sm-2" for="peril_name">*Peril Name:</label>
    <div class="col-sm-8">
                            <select class="form-control validate-select" name="peril_name" id="peril_name" style="text-transform: capitalize;padding: 8px;">
                                @foreach($cocogen_pa_peril  as $cocogen_peril)
                                <option value="{{$cocogen_peril->peril_name}}" data-value="{{$cocogen_peril->peril_name}}" @if(old('peril_name') == $cocogen_peril->peril_name) selected="selected"@endif>{{$cocogen_peril->peril_name}}</option>
                                @endforeach
                            </select>
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-2" for="rate">Rate:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="peril_rate" name="peril_rate" placeholder="Rate" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('peril_rate')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="sum_insured">*Sum Insured:</label>
    <div class="col-sm-8">
      <div class="input-group">
      <input type="text" class="form-control" id="sum_insured" name="sum_insured" placeholder="*Enter Sum Insured" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" value="{{old('sum_insured')}}">
      <span class="input-group-btn">
      <button type="submit" id="sendform_coverage" name="sendform_coverage" class="btn btn-primary" formaction="javascript:void(0)">Add</button> 
      </span> 
      </div>      
    </div>
  </div> 

  <div class="form-group">
    <div class="col-sm-12">
    <table id="coverage_table" name="coverage_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Peril</th>
                <th>Rate</th>
                <th>Sum Insured</th>
                <th>Premium</th>            
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div> 

    <div class="form-group">
    <label class="control-label col-sm-2" for="ttl_sum_insured">Total Sum Insured:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="ttl_sum_insured" name="ttl_sum_insured" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true">
    </div>
    <label class="control-label col-sm-2" for="ttl_premium">Total Premium:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="ttl_premium" name="ttl_premium" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true">
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

                <input type="file" class="required-entry" name="filename" id="filename" accept="application/msexcel, application/msword, application/pdf">

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
      <div id="pa_comment" class="pa_comment">
    
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
                    
                    <input type="submit" value="Save and Continue" formaction="{{route('savequotepa')}}" style="min-width: 100px; margin-top:10px"  

                   <?php  if(session('message') || session('message2'))  {?> class="hide" <?php } else {?> class="btn btn-success" <?php } ?>

                    />
                @if(session('quotestatus'))       
                <input type="submit" value="Update" id="sendform_save" name="sendform_save" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />

                <input type="submit" value="Submit" id="sendform_pa" name="sendform_pa" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                @endif

                <a href="{{route('paquote')}}" class="btn btn-success" style="min-width: 100px; margin-top: 10px">Back</a>                   

                </div>

    </div>
    </div> 
      
  </div>
</div>
</form>
@endforeach

<script>

 
  var trans_id = $("input[name='transno']").val();
  
  if (trans_id == "")
  {

    trans_id = "0";
    $("input[name='transno']").val("0");
  }
  else

  {

    $("input[name='transno']").val(trans_id);

  }

  $(document).ready( function (){

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

   $.fn.dataTable.ext.errMode = 'throw';

    $('#enrollee_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getpa-enrollee') }}"+"/"+trans_id,
           type: "POST",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'enrollee_name', name: 'enrollee_name' },
                    { data: 'gender', name: 'gender' },
                    { data: 'civil_status', name: 'civil_status' },
                    { data: 'birthdate', name: 'birthdate' },
                    { data: 'age', name: 'age' },
                    { data: 'remarks', name: 'remarks' },
                    {data: 'action', name: 'action', orderable: false},
                 ],
           columnDefs: [{ "width": "40px", "targets": [7] }]        
        });

    $('#coverage_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getpa-coverage') }}"+"/"+trans_id,
           type: "POST",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'peril_name', name: 'peril_name' },
                    { data: 'peril_rate', name: 'peril_rate' },
                    { data: 'sum_insured', name: 'sum_insured', render: $.fn.dataTable.render.number( ',', '.', 2 ) },
                    { data: 'premium', name: 'premium', render: $.fn.dataTable.render.number( ',', '.', 2 ) },
                    {data: 'action', name: 'action', orderable: false},
                 ],
           columnDefs: [{ "width": "40px", "targets": [5] }]        
        });

           $('#attachment_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getpaattachment') }}"+"/"+trans_id,
           type: "POST",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'filename2', name: 'filename2', render:function(data, type, row){
    return "<a href='{{url('/get-quote/view/pa/')}}/" + row.filename2 +"/"+ row.id +"' target='_blank' >" + row.filename2 + "</a>"

} },
                    {data: 'action', name: 'action', orderable: false},
                 ],
            columnDefs: [{ "width": "40px", "targets": [2] }]      
        });             

        $(document).on('click', '.delete_enrollee', function(){

        //var SITEURL = '{{URL::to('')}}';
        var enrollee_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/padeleteenrollee')}}"+"/"+enrollee_id,
              success: function (data) {
              var oTable = $('#enrollee_table').dataTable(); 
              oTable.fnDraw(false);
              }
          });
        }

      });

        $(document).on('click', '.delete_coverage', function(){

        //var SITEURL = '{{URL::to('')}}';
        var peril_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/padeletecoverage')}}"+"/"+peril_id,
              success: function (data) {
              var oTable = $('#coverage_table').dataTable(); 
              oTable.fnDraw(false);
              }
          });
        }

      });

         $(document).on('click', '.delete_attachment', function(){

        //var SITEURL = '{{URL::to('')}}';
        var attach_id =  $(this).attr('id');

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/padeleteattachment')}}"+"/"+attach_id,
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
              url: "{{ url('/get-quote/padeletecomments')}}"+"/"+remarks_id,
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

$('#sendform_enrollee').click(function(e){
   
   e.preventDefault();

   $('#sendform_enrollee').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addpa-enrollee')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg2').hide();
            $('#sendform_enrollee').html('Add');
            $('#msg_div2').show();
            $('#res_message2').show();
            $('#res_message2').html(response.success);
            $('#msg_div2').removeClass('d-none');
            $("input[name='enrollee_name']").val("");
            $("input[name='egender']").val("Male");
            $("input[name='civil_status']").val("Single");
            $("input[name='ebirthdate']").val("");
            $("input[name='age']").val("");
            $("input[name='eremarks']").val("");

              var oTable = $('#enrollee_table').dataTable();
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

$('#sendform_coverage').click(function(e){
   
   e.preventDefault();

   $('#sendform_coverage').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addpa-coverage')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg2').hide();
            $('#sendform_coverage').html('Add');
            $('#msg_div2').show();
            $('#res_message2').show();
            $('#res_message2').html(response.success);
            $("input[name='ttl_sum_insured']").val(response.ttlsum_insured);
            $("input[name='ttl_premium']").val(response.ttlpremium);           
            $('#msg_div2').removeClass('d-none');
            $("input[name='sum_insured']").val("");
            $("input[name='peril_rate']").val("");

              var oTable = $('#coverage_table').dataTable();
              oTable.fnDraw(false);
          }else{
                        $('#msg_div2').hide();
                        $('#alert_msg2').show();
                        $('#sendform_coverage').html('Add');
                        $('#res_error2').html(response.error);
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
      url: "{{ url('/get-quote/addpaattachment')}}",
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

$('#sendform_comment').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

      $('#sendform_comment').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addpacomments')}}",
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

  $('#sendform_save').click(function(e){
   
   e.preventDefault();

   //var trans_id = $("input[name='transno']").val();

   $('#sendform_save').html('Updating...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/pa-quoteupdate')}}",
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

$('#sendform_pa').click(function(e){
   
   e.preventDefault();

   //var trans_id = $("input[name='transno']").val();

   $('#sendform_pa').html('Submitting...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/pa-quotesubmit')}}",
      method: "POST",
      data: $('#form_savecontinue').serialize(),
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#sendform_save').hide();
            $('#sendform_pa').hide();
            $('#msg_div12').show();
            $('#res_message').show();
            $('#res_message').html(response.success);
            $('#msg_div12').removeClass('d-none');

            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_pa').html('Submit');
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

});

         function getcomments(id){

            $.ajax({
                type:'get',
                url: "{{ url('/get-quote/pacomments')}}"+"/"+trans_id,
                success:function(data){
                 $('#pa_comment').html(data); 

                },
                error:function(){

                }
            });
        }

</script>

@endsection
