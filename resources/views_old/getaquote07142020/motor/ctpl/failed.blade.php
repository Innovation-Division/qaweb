@extends('layouts.app')

@section('content')
<?php 
if(!empty($cocogen_ctpl_vehicleinfo)){
	$mvFIleNo = $cocogen_ctpl_vehicleinfo[0]['mvFIleNo'];  
	$plateNo = $cocogen_ctpl_vehicleinfo[0]['plateNo']; 
	$engineNO = $cocogen_ctpl_vehicleinfo[0]['engineNO']; 
	$make = $cocogen_ctpl_vehicleinfo[0]['make']; 
	$chassisNo = $cocogen_ctpl_vehicleinfo[0]['chassisNo']; 
	$bodyType = $cocogen_ctpl_vehicleinfo[0]['bodyType'];  
	$year = $cocogen_ctpl_vehicleinfo[0]['year']; 
	$tnxid = $cocogen_ctpl_vehicleinfo[0]['tnxid']; 
}else{
	$mvFIleNo = "";  
	$plateNo = ""; 
	$engineNO = ""; 
	$make = ""; 
	$chassisNo = ""; 
	$bodyType = "";  
	$year = ""; 
	$tnxid = "";
}
	

?>
<div class="top-container">
            <!-- config enabled always -->
          
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="cms_page"><strong>COCAF INSURANCE QUOTE</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 <form class="inline-form" role="form" method="post" action="{{ route('reauthctplconsave') }}" enctype="multipart/form-data">
 	{{ csrf_field() }} 
 	 	<input type="hidden" id="txnid" name="txnid" value="{{$tnxid}}">
  		<div class="tab-content clearfix"  style="text-align: left;font-family: muli;">

@if(session('message2') )
        <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{session('message2')}}
            </div>
        </div> 
        <br><br>
    @endif    
    <div class="container">
				<div class="" style="margin-top: 20px;">
                                <h3>Certificate of Registration Details</h3>
                                <h6>Please correct the item/s below and authenticate your request to proceed or you may call us at (02) 8-830-6000</h6>

                  </div> 
                        <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                    <div class="container">
                    <span style="margin-top: 100px;">  </span>               
                        <div class="form-group  {{ $errors->has('mvFIleNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <label for="mvFIleNo">MV File No</label>
                                    <input id="mvFIleNo" type="text" class="form-control" maxlength="15" name="mvFIleNo" value="{{ old('mvFIleNo',$mvFIleNo) }}" placeholder="Value*">
                                    @if ($errors->has('mvFIleNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('mvFIleNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('plateNo') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <label for="plateNo">Plate No</label>
                                    <input id="plateNo" type="text" class="form-control" maxlength="10" name="plateNo" value="{{ old('plateNo',$plateNo ) }}" placeholder="Value*">
                                    @if ($errors->has('plateNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('plateNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('engineNO') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <label for="engineNO">Engine No</label>
                                    <input id="engineNO" type="text" class="form-control" maxlength="20" name="engineNO" value="{{ old('engineNO',$engineNO ) }}" placeholder="Value*">
                                    @if ($errors->has('engineNO'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('engineNO') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>
                     <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                    <div class="container">  
                      <div class="form-group  {{ $errors->has('chassisNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <label for="chassisNo">Chassis No</label>
                                    <input id="chassisNo" type="text" class="form-control" maxlength="20" name="chassisNo" value="{{ old('chassisNo',$chassisNo ) }}" placeholder="Value">
                                    @if ($errors->has('chassisNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('chassisNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                      <div class="form-group  {{ $errors->has('make') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <label for="make">Make</label>
                                    <input id="make" type="text" class="form-control" maxlength="50" name="make" value="{{ old('make',$make ) }}" placeholder="Value*">
                                    @if ($errors->has('make'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('make') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                         <div class="form-group  {{ $errors->has('year') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <label for="year">Year</label>
                                    <input id="year" type="text" class="form-control" name="year" maxlength="4" value="{{ old('year',$year ) }}" placeholder="Year">
                                    @if ($errors->has('year'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> 
                  <!--     <div class="form-group  {{ $errors->has('bodyType') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <label for="bodyType">Body Type</label>
                                    <input id="bodyType" type="text" class="form-control"  maxlength="100" name="bodyType" value="{{ old('bodyType',$bodyType ) }}" placeholder="Value*">
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
                   <!--  <div class="container">  
                       
                    </div>     -->               
                    <div class="form-group" style="margin-top: 50px;margin-bottom: 50px;">
                                <div class="col-md-8 col-md-offset-5">
                                   <button id="SecondTabButtonBack"  name="SecondTabButtonBack" type="submit" class="btn btn-primary" style="width: 140px;" value="default">Authenticate</button>                                 
                                    
                                </div>
                    </div>
                        <div class="col-md-12 break-two">
                            <br>    
                        </div>  
             </div> 
     </div>
 </form>
@endsection
