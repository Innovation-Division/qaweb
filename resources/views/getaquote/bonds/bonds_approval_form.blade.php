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
                                
                                <a href="{{route('bondsquote')}}"> <h1>BONDS QUOTATION</h1> </a>
                            
                </div>
            </div>
                      
         </div>

 
<div class="container-fluid edf-body-white" style="margin-top: 20px">

<div class="container" style="text-align: left;margin-top: 20px">
<div class="form-group">
<div class="row">

<div class="col-sm-12"> 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{url('/home')}}"><span class="glyphicon glyphicon-user"></span> Hi {{ auth()->user()->name }} </a></li>
      <li><a  href="{{route('checkbondslogout')}}"><span class="glyphicon glyphicon-log-out"></span>  Log Out</a></li>
    </ul>
  </div>
</nav>
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

                              if($errors->first('agent') === "The name format is invalid."){
                                    $message = "The email must be a valid email address.";
                                }elseif($errors->first('principal') === "The name format is invalid."){
                                    $message = "The email must be a valid email address.";                                
                                }elseif($errors->first('email') === "The email must be a valid email address."){
                                    $message = "The name format is invalid.";
                                }else{
                                    if($errors->has('agent')){
                                      $idname = "agent";
                                    }

                                    if($errors->has('principal')){
                                      if($idname){
                                        $idname = $idname .", principal";
                                      }else{
                                        $idname = "principal";
                                      }                
                                    }

                                    if($errors->has('address')){
                                      if($idname){
                                        $idname = $idname .", address";
                                      }else{
                                        $idname = "address";
                                      }                
                                    }

                                    if($errors->has('date_incorp')){
                                      if($idname){
                                        $idname = $idname .", date of incorporation";
                                      }else{
                                        $idname = "address";
                                      }                
                                    }

                                     if($errors->has('company_tin')){
                                      if($idname){
                                        $idname = $idname .", company TIN";
                                      }else{
                                        $idname = "company TIN";
                                      }                
                                    }

                                     if($errors->has('contact_person')){
                                      if($idname){
                                        $idname = $idname .", contact person";
                                      }else{
                                        $idname = "contact person";
                                      }                
                                    }

                                      if($errors->has('contact_no')){
                                      if($idname){
                                        $idname = $idname .", contact no.";
                                      }else{
                                        $idname = "contact no.";
                                      }                
                                    }
                                                                       
                                    if($errors->has('email')){
                                      
                                      if($idname){
                                        $idname = $idname .", email";
                                      }else{
                                        $idname = "email";
                                      }            
                                    }                                  


                                    if($errors->has('undertaking')){
                                      
                                      if($idname){
                                        $idname = $idname .", undertaking";
                                      }else{
                                        $idname = "undertaking";
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
        var date_input=$('input[name="date_incorp"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });
        var date_input=$('input[name="qdate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });  
        date_input.datepicker().prop('disabled', true);  
                var date_input=$('input[name="date_bterm1"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });
                var date_input=$('input[name="date_bterm2"]'); //our date input has the name "date"
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

@foreach($cocogen_bonds_quote as $cocogen_bonds)
<input id="transno1" name="transno1" type="text" value="{{$cocogen_bonds->id}}" class="hide">

<form id="form_nature" name="form_nature" method="post" enctype="multipart/form-data">
   {{csrf_field()}}

<input id="transno" name="transno" type="hidden" value="{{$cocogen_bonds->id}}">
<input id="strstatus" name="strstatus" type="hidden" value="{{$cocogen_bonds->status}}">
<input id="strtype" name="strtype" type="hidden" value="{{\Auth::user()->accountType}}">

<div class="row text-left">

    <div class="form-group">
    <div class="row">

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="qdate" name="qdate" value="{{$cocogen_bonds->quote_date}}" placeholder="Date*" >
                </div>
                <div class="col-sm-6" align="center">


                    <label class="radio-inline control-label" >
                    <input type="radio" name="client" id="newClient" value="New" <?php  if($cocogen_bonds->client_type=="New")  {?> checked="checked" <?php }?>>
                    New Client
                    </label>
                    <label class="radio-inline control-label">
                    <input type="radio" name="client" id="oldClient" value="Old"  <?php  if($cocogen_bonds->client_type=="Old")  {?> checked="checked" <?php }?>>
                    Old Client
                    </label>

                </div>


                      <div class="checkbox checkbox-primary">
                        <input class="styled" type="checkbox" name="updateKYC" id="updateKYC" value="Yes" <?php  if($cocogen_bonds->update_kyc=="Yes")  {?> checked="checked" <?php }?>>
                        <label for="updateKYC">
                            Update KYC
                        </label>
                    </div>


                </div>
    </div>
    </div>

<div class="form-group">
<div class="row text-left">

<div class="panel panel-primary">
  <div class="panel-heading">NATURE REQUEST</div>
  <div class="panel-body">


    <div class="form-group">
    <div class="row">

                <div class="col-sm-3">
                     <label class="radio-inline"><input type="radio" name="qrequest" id="quoteNew" value="Quotation"

                    <?php  if($cocogen_bonds->request_type=="Quotation")  {?> checked="checked" <?php }?>>Quotation</label>

                     <label class="radio-inline"><input type="radio" name="qrequest" id="issueNew" value="Issue Policy"

                     <?php  if($cocogen_bonds->request_type=="Issue Policy")  {?> checked="checked" <?php }?>>Issue New Policy</label>

                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control required-entry validate-alpha-only" id="endoresePolNo" name="endoresePolNo" placeholder="Endorse Policy No." value="{{$cocogen_bonds->endorese_no}}">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control required-entry validate-alpha-only" id="others" name="others" placeholder="Others" value="{{$cocogen_bonds->others}}">
                </div>
    </div>
    </div>

    <div class="form-group">
    <div class="row">

                <div class="col-sm-12 {{ $errors->has('agent') ? ' has-error' : '' }}">
                    <input type="text" class="form-control required-entry validate-alpha-only" id="agent" name="agent" placeholder="Agent/Broker*" value="{{$cocogen_bonds->agent}}">
                </div>
    </div>
    </div>   
    <div class="form-group" style="margin-top: 30px;">
    <div class="row">
                <div class="col-sm-12 {{ $errors->has('principal') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="principal" name="principal" placeholder="Principal*" value="{{$cocogen_bonds->principal}}">
                </div>
    </div>
    </div>
    <div class="form-group">
    <div class="row">
                <div class="col-sm-12 {{ $errors->has('address') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address*" value="{{$cocogen_bonds->address}}">
                </div>
    </div>
    </div>
    <div class="form-group">
    <div class="row">
                <div class="col-sm-3 {{ $errors->has('date_incorp') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="date_incorp" name="date_incorp" placeholder="Date of Incorporation*" value="{{$cocogen_bonds->date_incorp}}">
                </div>
                <div class="col-sm-3">
                </div>
                 <div class="col-sm-6 {{ $errors->has('company_tin') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="company_tin" name="company_tin" placeholder="Company TIN*" value="{{$cocogen_bonds->company_tin}}" onkeypress="return isNumber(event)">
                </div>                               
    </div>
    </div>    
    <div class="form-group">
    <div class="row">
                <div class="col-sm-6 {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person*" value="{{$cocogen_bonds->contact_person}}">
                </div>
                 <div class="col-sm-6 {{ $errors->has('contact_no') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact No.*" value="{{$cocogen_bonds->contact_no}}" onkeypress="return isNumber(event)">
                </div>  
    </div>
    </div> 
    <div class="form-group">
    <div class="row">
                <div class="col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Address*" value="{{$cocogen_bonds->email}}">
                </div>
    </div>
    </div> 
    <div class="form-group" style="margin-top: 30px;">
    <div class="row">
                <div class="col-sm-12 {{ $errors->has('obligee') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="obligee" name="obligee" placeholder="Obligee*" value="{{$cocogen_bonds->obligee}}">
                </div>
    </div>
    </div>   
      <div class="form-group">
    <div class="row">
                <div class="col-sm-6 {{ $errors->has('project') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="project" name="project" placeholder="Project*" value="{{$cocogen_bonds->project}}">
                </div>
                 <div class="col-sm-6 {{ $errors->has('contract_price') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="contract_price" name="contract_price" placeholder="Contract Price*" value="{{$cocogen_bonds->contract_price}}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                </div>  
                </div>
            </div>
    <div class="form-group">
    <div class="row">
                <div class="col-sm-12 {{ $errors->has('undertaking') ? ' has-error' : '' }}">
                   <textarea rows="5" name="undertaking" id="undertaking" class="form-control required-entry" placeholder="Undertaking*">{{$cocogen_bonds->undertaking}}</textarea>
                </div>
    </div>
    </div>  
    <div class="form-group">
    <div class="row">
                <div class="col-sm-12 {{ $errors->has('company_bgd') ? ' has-error' : '' }}">
                   <textarea rows="7" name="company_bgd" id="company_bgd" class="form-control required-entry" placeholder="COMPANY BACKGROUND Brief description about the company (e.g. business address, nature of business)*">{{$cocogen_bonds->company_bgd}}</textarea>
                </div>
    </div>
    </div>  

        <div class="alert alert-success d-none" id="msg_div13" hidden>
              <span id="res_message13"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg13" hidden>
              <span id="res_error13"></span>
         </div>

    <div class="form-group">
    <div class="row">

                <div class="col-sm-12" align="center">

                    <input type="submit" value="Save and Continue" formaction="{{route('savequotebonds')}}" class="hide" />

                    @if(($cocogen_bonds->status == 'Save' || $cocogen_bonds->status == 'Submitted' || $cocogen_bonds->status == 'For Sales Review') && \Auth::user()->accountType == 'Sales')
                    <input type="submit" value="Save Changes" class="btn btn-primary" formaction="javascript:void(0)" id="sendform_update" name="sendform_update" />
                    @endif
                    

                </div>

    </div>
    </div> 
</div>
</div>
</div>
</div> 

</form>



<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">BOND REQUIREMENT</div>
  <div class="panel-body">

    <form id="form_requirement" name="form_requirement" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div11" hidden>
              <span id="res_message11"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg11" hidden>
              <span id="res_error11"></span>
         </div>

    <div class="form-group" id="div_requirement1" name="div_requirement1">
    <div class="row">

                <div class="col-sm-3">

                            <select class="form-control validate-select" name="bond_req" id="bond_req" style="text-transform: capitalize;padding: 8px;">
                                @if(old('bond_req'))
                                    <option value="{{old('bond_req')}}">{{old('bond_req')}}</option>
                                @else
                                    <option value="">Bonds Requirement *</option>
                                @endif
                                @foreach($cocogen_bonds_requirement  as $cocogen_bonds_req)
                                <option value="{{$cocogen_bonds_req->bond_req}}" data-value="{{$cocogen_bonds_req->bond_req}}">{{$cocogen_bonds_req->bond_req}}</option>
                                @endforeach
                            </select>
                </div>
                 <div class="col-sm-3">

                    <input type="text" class="form-control" id="bond_amount" name="bond_amount" placeholder="Bond Amount*" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">

                </div>
                 <div class="col-sm-3">
                 <input type="text" class="form-control" id="date_bterm1" name="date_bterm1" placeholder="Effectivity Date*"/>
                </div>
                                 <div class="col-sm-3">
                 <input type="text" class="form-control" id="date_bterm2" name="date_bterm2" placeholder="Expiry Date*"/>
                </div>
    </div>
    </div>

    <div class="form-group" id="div_requirement2" name="div_requirement2">
    <div class="row">

                <div class="col-sm-3">

                <input type="text" class="form-control" id="annual_rate" name="annual_rate" placeholder="*Annual Rate" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">{{ $errors->first('annual_rate') }}</span>    

                </div>
                <div class="col-sm-3">

                <input type="text" class="form-control" id="annual_premium" name="annual_premium" placeholder="*Annual Premium" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">{{ $errors->first('annual_premium') }}</span>

                </div>
                <div class="col-sm-3"> 

                <input type="text" class="form-control" id="term_premium" name="term_premium" placeholder="*Premium for the Term" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">{{ $errors->first('term_premium') }}</span>


                 </div>                       
                 <div class="col-sm-3">

                <button type="submit" id="sendform_requirement" name="sendform_requirement" class="btn btn-primary">Add</button>
                

                </div>            
    </div>
    </div>
    </form>
    

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="requirement_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Bond Type</th>
                <th>Bond Amount</th>
                <th>Annual Rate</th>
                <th>Annual Premium</th>
                <th>Bond Term</th>
                <th>Term Premium</th>             
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>

  </div>
</div>
</div>
</div>

<!--List of Financial-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">FINANCIAL HIGHLIGHTS</div>
  <div class="panel-body">
    
    <form id="form_financial" name="form_financial" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div9" hidden>
              <span id="res_message9"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg9" hidden>
              <span id="res_error9"></span>
         </div>

    <div class="form-group" id="div_financial" name="div_financial">
    <div class="row">

                <div class="col-sm-4">


                <select class="form-control validate-select" name="fin_type" id="fin_type" style="text-transform: capitalize;padding: 8px;">
                  @if(old('fin_type'))
                    <option value="{{old('fin_type')}}">{{old('fin_type')}}</option>
                  @else
                     <option value="">Financial*</option>
                  @endif
                  @foreach($cocogen_bonds_financial_type  as $cocogen_bonds_fintype)
                     <option value="{{$cocogen_bonds_fintype->fin_type}}" data-value="{{$cocogen_bonds_fintype->fin_type}}">{{$cocogen_bonds_fintype->fin_type}}</option>
                  @endforeach
                  </select>

                </div>
                <div class="col-sm-2">

                <input type="text" name="fin_year" class="form-control" id="fin_year" placeholder="*Year" onkeypress="return isNumber(event)">
                <span class="text-danger">{{ $errors->first('fin_year') }}</span>

                </div>
                <div class="col-sm-3"> 

                <input type="text" class="form-control" id="fin_amt" name="fin_amt" placeholder="*Amount" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">{{ $errors->first('fin_amt') }}</span>


                 </div>                       
                 <div class="col-sm-3">

                <button type="submit" id="sendform_financial" name="sendform_financial" class="btn btn-primary">Add</button>
                

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="financial_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Type</th>
                <th>Year</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>

    <form id="form_financial3" name="form_financial3" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}} 
    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">
    <div class="panel panel-success">
    <div class="panel-heading">REMARKS</div>
    <div class="panel-body">  
    <div id="financial_remarks" class="financial_remarks">
    
     </div> 
     </div> 
     <div class="panel-footer">

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

        <textarea rows="5" name="fin_remarks" id="fin_remarks" class="form-control required-entry" placeholder="Remarks*">{{old('fin_remarks')}}</textarea>      
    </div>
    </div>
    </div> 

    <div class="form-group">
    <div class="row">
    <div class="col-sm-12" align="center">

      <button type="submit" id="sendform_financial3" name="sendform_financial3" class="btn btn-primary">Post Remarks</button>

    </div>
    </div>
    </div>       

     </div>
     </div>
     </div>

    </div>
    </div>                
    </form>

  </div>
  </div>
</div>
</div>

 <!--Loss Experience-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">LOSS EXPERIENCE</div>
  <div class="panel-body">
    
    <form id="form_lossxp" name="form_lossxp" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}} 
         <div class="alert alert-success d-none" id="msg_div" hidden>
              <span id="res_message"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg1" hidden>
              <span id="res_error1"></span>
         </div>

    <div class="form-group" id="div_lossxp" name="div_lossxp">
    <div class="row">

                <div class="col-sm-10">

                <input type="text" name="loss_xp" class="form-control" id="loss_xp" placeholder="*Loss Expercience">
                <span class="text-danger">{{ $errors->first('loss_xp') }}</span>

                </div>
                 <div class="col-sm-2">

                <button type="submit" id="sendform_lossxp" name="sendform_lossxp" class="btn btn-primary">Add</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="lossxp_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Loss Expercience</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>



  </div>
  </div>
</div>
</div>
    
<!--List of Owners-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">LIST OF OWNER(S)</div>
  <div class="panel-body">
    
    <form id="form_owner" name="form_owner" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div2" hidden>
              <span id="res_message2"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg2" hidden>
              <span id="res_error2"></span>
         </div>

    <div class="form-group" id="div_owner" name="div_owner">
    <div class="row">

                <div class="col-sm-6">

                <input type="text" name="owner_name" class="form-control" id="owner_name" placeholder="*Name">
                <span class="text-danger">{{ $errors->first('owner_name') }}</span>

                </div>
                <div class="col-sm-4">

                <input type="text" name="owner_post" class="form-control" id="owner_post" placeholder="*Position">
                <span class="text-danger">{{ $errors->first('owner_post') }}</span>

                </div>
                 <div class="col-sm-2">

                <button type="submit" id="sendform_owner" name="sendform_owner" class="btn btn-primary">Add</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="owner_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>



  </div>
  </div>
</div>
</div>


<!--List of Officer-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">LIST OF OFFICER(S)</div>
  <div class="panel-body">
    
    <form id="form_officer" name="form_officer" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div3" hidden>
              <span id="res_message3"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg3" hidden>
              <span id="res_error3"></span>
         </div>

    <div class="form-group" id="div_officer" name="div_officer">
    <div class="row">

                <div class="col-sm-6">

                <input type="text" name="officer_name" class="form-control" id="officer_name" placeholder="*Name">
                <span class="text-danger">{{ $errors->first('officer_name') }}</span>

                </div>
                <div class="col-sm-4">

                <input type="text" name="officer_post" class="form-control" id="officer_post" placeholder="*Position">
                <span class="text-danger">{{ $errors->first('officer_post') }}</span>

                </div>
                 <div class="col-sm-2">

                <button type="submit" id="sendform_officer" name="sendform_officer" class="btn btn-primary">Add</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="officer_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>



  </div>
  </div>
</div>
</div>

<!--List of Collateral-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">COLLATERAL(S)</div>
  <div class="panel-body">
    
    <form id="form_collateral" name="form_collateral" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div4" hidden>
              <span id="res_message4"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg4" hidden>
              <span id="res_error4"></span>
         </div>

    <div class="form-group" id="div_collateral" name="div_collateral">
    <div class="row">

                <div class="col-sm-4">

                <input type="text" name="collateral_type" class="form-control" id="collateral_type" placeholder="*Type">
                <span class="text-danger">{{ $errors->first('collateral_type') }}</span>

                </div>
                <div class="col-sm-4">

                <input type="text" name="collateral_item" class="form-control" id="collateral_item" placeholder="*Item">
                <span class="text-danger">{{ $errors->first('collateral_item') }}</span>

                </div>
                <div class="col-sm-2"> 

                <input type="text" class="form-control" id="collateral_value" name="collateral_value" placeholder="*Value*" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">{{ $errors->first('collateral_value') }}</span>


                 </div>                       
                 <div class="col-sm-2">

                <button type="submit" id="sendform_collateral" name="sendform_collateral" class="btn btn-primary">Add</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="collateral_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Type</th>
                <th>Item</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>



  </div>
  </div>
</div>
</div>

<!--List of Co-Signer-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">CO-SIGNER(S)</div>
  <div class="panel-body">
    
    <form id="form_cosigner" name="form_cosigner" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div5" hidden>
              <span id="res_message5"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg5" hidden>
              <span id="res_error5"></span>
         </div>

    <div class="form-group" id="div_cosigner" name="div_cosigner">
    <div class="row">

                <div class="col-sm-4">

                <input type="text" name="cosigner_name" class="form-control" id="cosigner_name" placeholder="*Name">
                <span class="text-danger">{{ $errors->first('cosigner_name') }}</span>

                </div>
                <div class="col-sm-4">

                <input type="text" name="cosigner_property" class="form-control" id="cosigner_property" placeholder="*Property">
                <span class="text-danger">{{ $errors->first('cosigner_property') }}</span>

                </div>
                <div class="col-sm-2"> 

                <input type="text" class="form-control" id="cosigner_amt" name="cosigner_amt" placeholder="*Amount*" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">{{ $errors->first('cosigner_amt') }}</span>


                 </div> 
                 <div class="col-sm-2">

                <button type="submit" id="sendform_signer" name="sendform_signer" class="btn btn-primary">Add</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="cosigner_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Property</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>



  </div>
  </div>
</div>
</div>

<!--List of Completed Projects-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">LIST OF COMPLETED PROJECT(S)</div>
  <div class="panel-body">
    
    <form id="form_project1" name="form_project1" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div6" hidden>
              <span id="res_message6"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg6" hidden>
              <span id="res_error6"></span>
         </div>

    <div class="form-group" id="div_project1" name="div_project1">
    <div class="row">

                <div class="col-sm-10">

                <input type="text" name="project_name" class="form-control" id="project_name" placeholder="*Project Name">
                <span class="text-danger">{{ $errors->first('project_name') }}</span>

                </div>

                <div class="col-sm-2">

                <button type="submit" id="sendform_project1" name="sendform_project1" class="btn btn-primary">Add</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="project1_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Project</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>



  </div>
  </div>
</div>
</div>

<!--List of On-Going Projects-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">LIST OF ON-GOING PROJECT(S)</div>
<div class="panel-body">
    
    <form id="form_project2" name="form_project2" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div7" hidden>
              <span id="res_message7"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg7" hidden>
              <span id="res_error7"></span>
         </div>

    <div class="form-group" id="div_project2" name="div_project2">
    <div class="row">

                <div class="col-sm-10">

                <input type="text" name="project_name2" class="form-control" id="project_name2" placeholder="*Project Name">
                <span class="text-danger">{{ $errors->first('project_name2') }}</span>

                </div>
                <div class="col-sm-2">

                <button type="submit" id="sendform_project2" name="sendform_project2" class="btn btn-primary">Add</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="project2_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Project</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>



</div>
</div>
</div>
</div>


<!--List of On-Going Projects-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">ATTACHMENT(S)</div>
<div class="panel-body">
    
    <form id="form_attachment" name="form_attachment" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div8" hidden>
              <span id="res_message8"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg8" hidden>
              <span id="res_error8"></span>
         </div>

    <div class="form-group" id="div_attachment" name="div_attachment">
    <div class="row">

                <div class="col-sm-10">

                <input type="file" class="required-entry" name="filename" id="filename" accept="application/msword, application/pdf">

                </div>
                <div class="col-sm-2">

                <button type="submit" id="sendform_attachment" name="sendform_attachment" class="btn btn-primary">Upload</button>

                </div>            
    </div>
    </div>
    </form>

    <div class="form-group">
    <div class="row">

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
</div>
</div>
</div>


<!--History Logs-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">Change Log/s</div>
<div class="panel-body">

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

    <table id="change_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
                <th>User</th>
                <th>Date</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>

</div>
</div>
</div>
</div>

<!--Comments-->
<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">COMMENT/S</div>
  <div class="panel-body">
 

      <div id="bond_comment" class="bond_comment">
    
     </div> 
  </div> 
  <div class="panel-footer">

    <form id="form_comment" name="form_comment" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}} 
    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">

        <textarea rows="5" name="txt_comment" id="txt_comment" class="form-control required-entry" placeholder="Comments*">{{old('remarks')}}</textarea>      
    </div>
    </div>
    </div> 

      <div class="alert alert-success d-none" id="msg_div10" hidden>
              <span id="res_message10"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg10" hidden>
              <span id="res_error10"></span>
         </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-12" align="center">

      <button type="submit" id="sendform_comment" name="sendform_comment" class="btn btn-primary">Post Comment</button>

    </div>
    </div>
    </div> 
  </form>

  </div>  

</div>  
</div>
</div>

<div class="form-group">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-body">
    <form id="form_sendbomd" name="form_sendbomd" method="post" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  
         <div class="alert alert-success d-none" id="msg_div12" hidden>
              <span id="res_message12"></span>
         </div>
        <div class="alert alert-danger d-none" id="alert_msg12" hidden>
              <span id="res_error12"></span>
         </div>
    <div class="form-group">
    <div class="row">

                <div class="col-sm-12" align="center">

                @if(($cocogen_bonds->status == 'Save' || $cocogen_bonds->status == 'For Sales Review') && \Auth::user()->accountType == 'Sales')            
                <input type="submit" value="Submit" id="sendform_bonds" name="sendform_bonds" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                @endif

                @if($cocogen_bonds->status != 'Approved' && \Auth::user()->accountType == 'Sales')            
                <input type="submit" value="Cancel" id="sendform_cancel" name="sendform_cancel" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                @endif    

                @if(($cocogen_bonds->status == 'Submitted' ||  $cocogen_bonds->status == 'UW Reviewed') && \Auth::user()->accountType == 'Underwriter')            
                <input type="submit" value="For Sales Review" id="sendform_sales" name="sendform_sales" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                @endif                  

                @if($cocogen_bonds->status == 'Submitted' && \Auth::user()->accountType == 'Underwriter')            
                <input type="submit" value="Underwriter Committee Review" id="sendform_review" name="sendform_review" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                @endif            


                @if($cocogen_bonds->status == 'UW Reviewed' && \Auth::user()->accountType == 'Approver')            
                <input type="submit" value="Approve" id="sendform_approve" name="sendform_approve" class="btn btn-success" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                @endif 

                <a href="{{route('bondsquote')}}" class="btn btn-success" style="min-width: 100px; margin-top: 10px">Back</a>

                </div>

     </div>
     </div>
     </form>
  </div>
</div>
</div>
</div>
@endforeach

</div>
</div>
</div>



<script type="text/javascript">



 $(document).ready(function(){

var trans_id = $("input[name='transno']").val();
getfinancialremarks(trans_id);
getcomments(trans_id);

 jQuery("#bond_req222").change(function() {
            var id=$(this).val();

            var a=$(this).parent();
            console.log(id);
            var op="";
            $.ajax({
                type:'get',
                url:'{{route('annualratebonds')}}',
                data:{'id':id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("id");
                    console.log(data.id);

                    // here price is coloumn name in products table data.coln name
                    jQuery('#bond_amount').val(data.id);
                    //a.find('.bond_amount').val(data.id);

                },
                error:function(){

                }
            });


        });


   $('#sendform_financial3').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

      $('#sendform_financial3').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsfinancialremarks')}}",
      method: "POST",
      data: $('#form_financial3').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){

            $('#alert_msg9').hide();
            $('#sendform_financial3').html('Post Remarks');
            $('#msg_div9').show();
            $('#res_message9').show();
            $('#res_message9').html(response.success);
            $('#msg_div9').removeClass('d-none');

              $('#form_financial3').trigger("reset");
              getfinancialremarks(trans_id);
            }else{
                        $('#msg_div9').hide();
                          $('#alert_msg9').show();
                        $('#sendform_financial3').html('Post Remarks');
                        $('#res_error9').html(response.error);  
                        
                    }
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
      url: "{{ url('/get-quote/addbondscomments')}}",
      method: "POST",
      data: $('#form_comment').serialize()+ "&trans_id=" + trans_id,
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


    });

         function getfinancialremarks(id){

            $.ajax({
                type:'get',
                url: "{{ url('/get-quote/bondsfinancialremraks')}}"+"/"+trans_id,
                success:function(data){
                 $('#financial_remarks').html(data); 

                },
                error:function(){

                }
            });
        }

         function getcomments(id){

            $.ajax({
                type:'get',
                url: "{{ url('/get-quote/bondscomments')}}"+"/"+trans_id,
                success:function(data){
                 $('#bond_comment').html(data); 

                },
                error:function(){

                }
            });
        }        

</script>

  <script>

 
  var trans_id = $("input[name='transno']").val();
  var str_status = $("input[name='strstatus']").val();
  var str_type = $("input[name='strtype']").val();
  var str_view = true;

  if (str_status == "Approved" || str_status == "Cancelled" || str_status == "UW Reviewed" || str_type != "Sales")
  {
    str_view = false;
    $('#div_requirement1').hide(); 
    $('#div_requirement2').hide(); 
    $('#div_lossxp').hide(); 
    $('#div_owner').hide(); 
    $('#div_officer').hide(); 
    $('#div_collateral').hide(); 
    $('#div_cosigner').hide(); 
    $('#div_project1').hide(); 
    $('#div_project2').hide(); 
    $('#div_attachment').hide(); 
    $('#div_financial').hide(); 

  }  
  else
  {
    if (str_type == "Sales")
    { str_view = true;}   else {str_view = false;}
  }

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
  
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

    $('#lossxp_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondslossxp') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'loss_xp', name: 'loss_xp' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [2] }]        
        });

       $('#owner_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsowner') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'owner_name', name: 'owner_name' },
                    { data: 'owner_post', name: 'owner_post' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [3] }]      
        });

       $('#officer_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsofficer') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'officer_name', name: 'officer_name' },
                    { data: 'officer_post', name: 'officer_post' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [3] }]       
        });

    
       $('#collateral_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondscollateral') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'collateral_type', name: 'collateral_type' },
                    { data: 'collateral_item', name: 'collateral_item' },
                    { data: 'collateral_value', name: 'collateral_value' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [4] }]       
        });

        $('#cosigner_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondssigner') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'cosigner_name', name: 'cosigner_name' },
                    { data: 'cosigner_property', name: 'cosigner_property' },
                    { data: 'cosigner_amt', name: 'cosigner_amt' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [4] }]       
        });

        $('#project1_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsprojects1') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'project_name', name: 'project_name' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [2] }]       
        });

        $('#project2_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsprojects2') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'project_name2', name: 'project_name2' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [2] }]       
        });


        $('#attachment_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsattachment') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'filename2', name: 'filename2', render:function(data, type, row){
    return "<a href='../../storage/app/" + row.location +"' target='_blank' >" + row.filename2 + "</a>"
} },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
            columnDefs: [{ "width": "40px", "targets": [2] }]      
        });

       $('#financial_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsfinancial') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'fin_type', name: 'fin_type' },
                    { data: 'fin_year', name: 'fin_year' },
                    { data: 'fin_amt', name: 'fin_amt' },
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [4] }]       
        });  

         $('#requirement_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsquoterequirement') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'bond_type', name: 'bond_type' },
                    { data: 'bond_amt', name: 'bond_amt' },
                    { data: 'annual_rate', name: 'annual_rate' },
                    { data: 'annual_premium', name: 'annual_premium' },
                    { data: 'bond_term', name: 'bond_term' },
                    { data: 'term_premium', name: 'term_premium' },                 
                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                 ],
           columnDefs: [{ "width": "40px", "targets": [7] }]       
        });              

         $('#change_table').DataTable({searching: false, paging: false, info: false,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getbondsquotehistorylogs') }}"+"/"+trans_id,
           type: "post",
           columns: [
                    { data: 'id', name: 'id', visible: false},
                    { data: 'category', name: 'category' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action' },
                    { data: 'user', name: 'user' },
                    { data: 'created_at', name: 'created_at' },                
                 ],       
        }); 

      });


   $(document).on('click', '.delete_lossxp', function(){

        //var SITEURL = '{{URL::to('')}}';
        var lossxp_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeletelossxp')}}"+"/"+lossxp_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#lossxp_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 });

      $(document).on('click', '.delete_owner', function(){

        //var SITEURL = '{{URL::to('')}}';
        var owner_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeleteowner')}}"+"/"+owner_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#owner_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 });

      $(document).on('click', '.delete_officer', function(){

        //var SITEURL = '{{URL::to('')}}';
        var officer_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeleteofficer')}}"+"/"+officer_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#officer_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 });

      $(document).on('click', '.delete_collateral', function(){

        //var SITEURL = '{{URL::to('')}}';
        var collateral_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeletecollateral')}}"+"/"+collateral_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#collateral_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 });  

       $(document).on('click', '.delete_signer', function(){

        //var SITEURL = '{{URL::to('')}}';
        var cosigner_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeletesigner')}}"+"/"+cosigner_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#cosigner_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 });  

        $(document).on('click', '.delete_project1', function(){

        //var SITEURL = '{{URL::to('')}}';
        var project1_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeleteproject1')}}"+"/"+project1_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#project1_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 }); 


        $(document).on('click', '.delete_project2', function(){

        //var SITEURL = '{{URL::to('')}}';
        var project2_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeleteproject2')}}"+"/"+project2_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#project2_table').dataTable(); 
              oTable.fnDraw(false);

             var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);             
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
              url: "{{ url('/get-quote/bondsdeleteattachment')}}"+"/"+attach_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#attachment_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 }); 

         $(document).on('click', '.delete_financial', function(){

        //var SITEURL = '{{URL::to('')}}';
        var attach_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeletefinancial')}}"+"/"+attach_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#financial_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
              }
          });
        }

 });  


         $(document).on('click', '.delete_remarks', function(){

        //var SITEURL = '{{URL::to('')}}';
        var remarks_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeletefinancialremarks')}}"+"/"+remarks_id,
              success: function (data) {
                    getfinancialremarks(trans_id);
              }
          });
        }

 });    

          $(document).on('click', '.delete_requirement', function(){

        //var SITEURL = '{{URL::to('')}}';
        var remarks_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeletequoterequirement')}}"+"/"+remarks_id+"/"+trans_id,
              success: function (data) {
              var oTable = $('#requirement_table').dataTable(); 
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);
              }
          });
        }


 });   
 


          $(document).on('click', '.delete_commnets', function(){

        //var SITEURL = '{{URL::to('')}}';
        var remarks_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are You sure want to delete?")){
          $.ajax({
              url: "{{ url('/get-quote/bondsdeletecomments')}}"+"/"+remarks_id,
              success: function (data) {
                    getcomments(trans_id);
              }
          });
        }


 });     
        
  </script>


<script>
$(document).ready( function (){

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

$('#sendform_project2').click(function(e){
   
   e.preventDefault();

    var trans_id = $("input[name='transno']").val();

   $('#sendform_project2').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsproject2')}}",
      method: "POST",
      data: $('#form_project2').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg7').hide();
            $('#sendform_project2').html('Add');
            $('#msg_div7').show();
            $('#res_message7').show();
            $('#res_message7').html(response.success);
            $('#msg_div7').removeClass('d-none');
            $("input[name='project_name2']").val("");

              $('#form_project2').trigger("reset");
              var oTable = $('#project2_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
          }else{
                        $('#msg_div7').hide();
                        $('#alert_msg7').show();
                        $('#sendform_project2').html('Add');
                        $('#res_error7').html(response.error);
                    }

         //--------------------------
      }

    });  

   });

$('#sendform_project1').click(function(e){
   
   e.preventDefault();

    var trans_id = $("input[name='transno']").val();

   $('#sendform_project1').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsproject1')}}",
      method: "POST",
      data: $('#form_project1').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg6').hide();
            $('#sendform_project1').html('Add');
            $('#msg_div6').show();
            $('#res_message6').show();
            $('#res_message6').html(response.success);
            $('#msg_div6').removeClass('d-none');
            $("input[name='project_name']").val("");

              $('#form_project1').trigger("reset");
              var oTable = $('#project1_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);

          }else{
                        $('#msg_div6').hide();
                        $('#alert_msg6').show();
                        $('#sendform_project1').html('Add');
                        $('#res_error6').html(response.error);
                    }

         //--------------------------
      }

    });  

   });

$('#sendform_signer').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_signer').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondssigner')}}",
      method: "POST",
      data: $('#form_cosigner').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg5').hide();
            $('#sendform_signer').html('Add');
            $('#msg_div5').show();
            $('#res_message5').show();
            $('#res_message5').html(response.success);
            $('#msg_div5').removeClass('d-none');
            $("input[name='cosigner_name']").val("");
            $("input[name='cosigner_property']").val("");
            $("input[name='cosigner_amt']").val("");

              $('#form_cosigner').trigger("reset");
              var oTable = $('#cosigner_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
            }else{
                        $('#msg_div5').hide();
                        $('#alert_msg5').show();
                        $('#sendform_signer').html('Add');
                        $('#res_error5').html(response.error);
                        
                    }
         //--------------------------
      }

    });  

   });

$('#sendform_lossxp').click(function(e){
   
   e.preventDefault();

    var loss_xp = $("input[name='loss_xp']").val();
    var trans_id = $("input[name='transno']").val();

   $('#sendform_lossxp').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondslossxp')}}",
      method: "POST",
      data: $('#form_lossxp').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg1').hide();
            $('#sendform_lossxp').html('Add');
            $('#msg_div').show();
            $('#res_message').show();
            $('#res_message').html(response.success);
            $('#msg_div').removeClass('d-none');
            $("input[name='loss_xp']").val("");

              $('#form_lossxp').trigger("reset");
              var oTable = $('#lossxp_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);

          }else{
                        $('#msg_div').hide();
                        $('#alert_msg1').show();
                        $('#sendform_lossxp').html('Add');
                        $('#res_error1').html(response.error);
                    }

         setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            $('#res_error1').hide();
            $('#alert_msg1').hide();            
            },10000);

         //--------------------------
      }

    });  

   });

$('#sendform_owner').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_owner').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsowner')}}",
      method: "POST",
      data: $('#form_owner').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg2').hide();
            $('#sendform_owner').html('Add');
            $('#msg_div2').show();
            $('#res_message2').show();
            $('#res_message2').html(response.success);
            $('#msg_div2').removeClass('d-none');
            $("input[name='owner_name']").val("");
            $("input[name='owner_post']").val("");

              $('#form_owner').trigger("reset");
              var oTable = $('#owner_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);

            }else{
                        $('#msg_div2').hide();
                          $('#alert_msg2').show();
                        $('#sendform_owner').html('Add');
                        $('#res_error2').html(response.error);
                        
                    }
        
        setTimeout(function(){
            $('#res_message2').hide();
            $('#msg_div2').hide();
            $('#res_error2').hide();
            $('#alert_msg2').hide();            
            },10000);

         //--------------------------
      }

    });  

   });

$('#sendform_officer').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_officer').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsofficer')}}",
      method: "POST",
      data: $('#form_officer').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg3').hide();
            $('#sendform_officer').html('Add');
            $('#msg_div3').show();
            $('#res_message3').show();
            $('#res_message3').html(response.success);
            $('#msg_div3').removeClass('d-none');
            $("input[name='officer_name']").val("");
            $("input[name='officer_post']").val("");

              $('#form_officer').trigger("reset");
              var oTable = $('#officer_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
            }else{
                        $('#msg_div3').hide();
                          $('#alert_msg3').show();
                        $('#sendform_officer').html('Add');
                        $('#res_error3').html(response.error);
                        
                    }
        
        setTimeout(function(){
            $('#res_message3').hide();
            $('#msg_div3').hide();
            $('#res_error3').hide();
            $('#alert_msg3').hide();            
            },10000);
                          
         //--------------------------
      }

    });  

   });

$('#sendform_collateral').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_collateral').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondscollateral')}}",
      method: "POST",
      data: $('#form_collateral').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg4').hide();
            $('#sendform_collateral').html('Add');
            $('#msg_div4').show();
            $('#res_message4').show();
            $('#res_message4').html(response.success);
            $('#msg_div4').removeClass('d-none');
            $("input[name='collateral_type']").val("");
            $("input[name='collateral_item']").val("");
            $("input[name='collateral_value']").val("");

              $('#form_officer').trigger("reset");
              var oTable = $('#collateral_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
            }else{
                        $('#msg_div4').hide();
                          $('#alert_msg4').show();
                        $('#sendform_officer').html('Add');
                        $('#res_error4').html(response.error);
                        
                    }

            setTimeout(function(){
            $('#res_message4').hide();
            $('#msg_div4').hide();
            $('#res_error4').hide();
            $('#alert_msg4').hide();            
            },10000);

         //--------------------------
      }

    });  

   });


  $('#form_attachment').submit(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

   var formData = new FormData(this);
   formData.append('trans_id', trans_id);
   formData.append( '_token', CSRF_TOKEN  );

    console.log(formData.get('_token'));
   $('#sendform_attachment').html('Uploading...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsattachment')}}",
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

              $('#form_attachment').trigger("reset");
              var oTable = $('#attachment_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
            }else{
                        $('#msg_div8').hide();
                          $('#alert_msg8').show();
                        $('#sendform_attachment').html('Upload');
                        $('#res_error8').html(response.error);
                        
                    }
            setTimeout(function(){
            $('#res_message8').hide();
            $('#msg_div8').hide();
            $('#res_error8').hide();
            $('#alert_msg8').hide();            
            },10000);

         //--------------------------
      }

    });  

   });

 $('#sendform_financial').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_financial').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsfinancial')}}",
      method: "POST",
      data: $('#form_financial').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg9').hide();
            $('#sendform_financial').html('Add');
            $('#msg_div9').show();
            $('#res_message9').show();
            $('#res_message9').html(response.success);
            $('#msg_div9').removeClass('d-none');
            //$("input[name='fin_type']").val("");
            //$("input[name='finl_year']").val("");
            //$("input[name='fin_amt']").val("");

              $('#form_financial').trigger("reset");
              var oTable = $('#financial_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
            }else{
                        $('#msg_div9').hide();
                          $('#alert_msg9').show();
                        $('#sendform_financial').html('Add');
                        $('#res_error9').html(response.error);
                        
                    }


            setTimeout(function(){
            $('#res_message9').hide();
            $('#msg_div9').hide();
            $('#res_error9').hide();
            $('#alert_msg9').hide();            
            },10000);

         //--------------------------
      }

    });  

   }); 

  $('#sendform_requirement').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_requirement').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsquoterequirement')}}",
      method: "POST",
      data: $('#form_requirement').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg11').hide();
            $('#sendform_requirement').html('Add');
            $('#msg_div11').show();
            $('#res_message11').show();
            $('#res_message11').html(response.success);
            $('#msg_div11').removeClass('d-none');
            //$("input[name='fin_type']").val("");
            //$("input[name='finl_year']").val("");
            //$("input[name='fin_amt']").val("");

              $('#form_requirement').trigger("reset");
              var oTable = $('#requirement_table').dataTable();
              oTable.fnDraw(false);

              var oTable1 = $('#change_table').dataTable();
              oTable1.fnDraw(false);              
            }else{
                        $('#msg_div11').hide();
                          $('#alert_msg11').show();
                        $('#sendform_requirement').html('Add');
                        $('#res_error11').html(response.error);
                        
                    }

            setTimeout(function(){
            $('#res_message11').hide();
            $('#msg_div11').hide();
            $('#res_error11').hide();
            $('#alert_msg11').hide();            
            },10000);                     
         //--------------------------
      }

    });  

   }); 

  $('#sendform_bonds').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_bonds').html('Submitting...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/bonds-quotesubmit')}}",
      method: "POST",
      data: $('#form_sendbond').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#sendform_bonds').hide();
            $('#msg_div12').show();
            $('#res_message12').show();
            $('#res_message12').html(response.success);
            $('#msg_div12').removeClass('d-none');

            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('Submit');
                        $('#res_error12').html(response.error);
                        
            }

            setTimeout(function(){
            $('#res_message12').hide();
            $('#msg_div12').hide();
            $('#res_error12').hide();
            $('#alert_msg12').hide();            
            },10000);          
         //--------------------------
      }

    });  

   }); 

 $('#sendform_sales').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_sales').html('Submitting...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/bonds-quotesales')}}",
      method: "POST",
      data: $('#form_sendbond').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#sendform_sales').hide();
            $('#sendform_review').hide();
            $('#msg_div12').show();
            $('#res_message12').show();
            $('#res_message12').html(response.success);
            $('#msg_div12').removeClass('d-none');

            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('For Sales Review');
                        $('#res_error12').html(response.error);
                        
            }

            setTimeout(function(){
            $('#res_message12').hide();
            $('#msg_div12').hide();
            $('#res_error12').hide();
            $('#alert_msg12').hide();            
            },10000);          
         //--------------------------
      }

    });  

   }); 

  $('#sendform_review').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_review').html('Reviewing...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/bonds-quotereview')}}",
      method: "POST",
      data: $('#form_sendbond').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
            if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#sendform_bonds').hide();
            $('#msg_div12').show();
            $('#res_message12').show();
            $('#res_message12').html(response.success);
            $('#msg_div12').removeClass('d-none');
            $('#div_requirement1').hide(); 
            $('#div_requirement2').hide(); 
            $('#div_lossxp').hide(); 
            $('#div_owner').hide(); 
                $('#div_officer').hide(); 
                $('#div_collateral').hide(); 
                $('#div_cosigner').hide(); 
                $('#div_project1').hide(); 
                $('#div_project2').hide(); 
                $('#div_attachment').hide(); 
                $('#div_financial').hide();
                $('#sendform_review').hide();

           $('#collateral_table').DataTable().columns(4).visible(false);
           $('#lossxp_table').DataTable().columns(2).visible(false);
           $('#owner_table').DataTable().columns(3).visible(false);
           $('#officer_table').DataTable().columns(3).visible(false);
           $('#cosigner_table').DataTable().columns(4).visible(false);
           $('#project1_table').DataTable().columns(2).visible(false);
           $('#project2_table').DataTable().columns(2).visible(false);
           $('#attachment_table').DataTable().columns(4).visible(false);
           $('#financial_table').DataTable().columns(4).visible(false);
           $('#requirement_table').DataTable().columns(7).visible(false);


            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('Underwriter Committee Review');
                        $('#res_error12').html(response.error);
                        
            }

            setTimeout(function(){
            $('#res_message12').hide();
            $('#msg_div12').hide();
            $('#res_error12').hide();
            $('#alert_msg12').hide();            
            },10000);          
         //--------------------------
      }

    });  

   }); 


    $('#sendform_approve').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_approve').html('Approving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/bonds-quoteapprove')}}",
      method: "POST",
      data: $('#form_sendbond').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
            if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#sendform_bonds').hide();
            $('#msg_div12').show();
            $('#res_message12').show();
            $('#res_message12').html(response.success);
            $('#msg_div12').removeClass('d-none');
            $('#div_requirement1').hide(); 
            $('#div_requirement2').hide(); 
            $('#div_lossxp').hide(); 
            $('#div_owner').hide(); 
                $('#div_officer').hide(); 
                $('#div_collateral').hide(); 
                $('#div_cosigner').hide(); 
                $('#div_project1').hide(); 
                $('#div_project2').hide(); 
                $('#div_attachment').hide(); 
                $('#div_financial').hide();
                $('#sendform_approve').hide();

           $('#collateral_table').DataTable().columns(4).visible(false);
           $('#lossxp_table').DataTable().columns(2).visible(false);
           $('#owner_table').DataTable().columns(3).visible(false);
           $('#officer_table').DataTable().columns(3).visible(false);
           $('#cosigner_table').DataTable().columns(4).visible(false);
           $('#project1_table').DataTable().columns(2).visible(false);
           $('#project2_table').DataTable().columns(2).visible(false);
           $('#attachment_table').DataTable().columns(4).visible(false);
           $('#financial_table').DataTable().columns(4).visible(false);
           $('#requirement_table').DataTable().columns(7).visible(false);


            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('Approve');
                        $('#res_error12').html(response.error);
                        
            }

            setTimeout(function(){
            $('#res_message12').hide();
            $('#msg_div12').hide();
            $('#res_error12').hide();
            $('#alert_msg12').hide();            
            },10000);          
         //--------------------------
      }

    });  

   });

    $('#sendform_cancel').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_cancel').html('Cancelling...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/bonds-quotecancel')}}",
      method: "POST",
      data: $('#form_sendbond').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg12').hide();
            $('#sendform_bonds').hide();
            $('#msg_div12').show();
            $('#res_message12').show();
            $('#res_message12').html(response.success);
            $('#msg_div12').removeClass('d-none');
            $('#div_requirement1').hide(); 
            $('#div_requirement2').hide(); 
            $('#div_lossxp').hide(); 
            $('#div_owner').hide(); 
                $('#div_officer').hide(); 
                $('#div_collateral').hide(); 
                $('#div_cosigner').hide(); 
                $('#div_project1').hide(); 
                $('#div_project2').hide(); 
                $('#div_attachment').hide(); 
                $('#div_financial').hide();
                $('#sendform_cancel').hide();

           $('#collateral_table').DataTable().columns(4).visible(false);
           $('#lossxp_table').DataTable().columns(2).visible(false);
           $('#owner_table').DataTable().columns(3).visible(false);
           $('#officer_table').DataTable().columns(3).visible(false);
           $('#cosigner_table').DataTable().columns(4).visible(false);
           $('#project1_table').DataTable().columns(2).visible(false);
           $('#project2_table').DataTable().columns(2).visible(false);
           $('#attachment_table').DataTable().columns(4).visible(false);
           $('#financial_table').DataTable().columns(4).visible(false);
           $('#requirement_table').DataTable().columns(7).visible(false);


            }else{
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('Submit');
                        $('#res_error12').html(response.error);
                        
            }

            setTimeout(function(){
            $('#res_message12').hide();
            $('#msg_div12').hide();
            $('#res_error12').hide();
            $('#alert_msg12').hide();            
            },10000);          
         //--------------------------
      }

    });  

   }); 


    $('#sendform_update').click(function(e){
   
   e.preventDefault();

   var trans_id = $("input[name='transno']").val();

   $('#sendform_update').html('Saving...');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/bonds-quoteupdate')}}",
      method: "POST",
      data: $('#form_nature').serialize()+ "&trans_id=" + trans_id,
      dataType: 'json', 
      success: function(response){
         //------------------------
         if($.isEmptyObject(response.error)){
          
            $('#alert_msg13').hide();
            $('#msg_div13').show();
            $('#res_message13').show();
            $('#res_message13').html(response.success);
            $('#msg_div13').removeClass('d-none');

            setTimeout(function(){
            $('#res_message13').hide();
            $('#msg_div13').hide();
            },10000);

           
            }else{

                        $('#msg_div13').hide();
                        $('#alert_msg13').show();
                        $('#sendform_update').html('Save Changes');
                        $('#res_error13').html(response.error);

            setTimeout(function(){
            $('#res_error13').hide();
            $('#alert_msg13').hide();
            },10000);

                        
                    }
         //--------------------------
      }

    });  

   });



});


  </script>  

@endsection

