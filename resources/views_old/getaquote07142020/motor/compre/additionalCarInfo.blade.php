     		  <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Additional Car Information</h4>
                            </div>

            	<div class="col-md-12 break-two">
                            <br>    
                        </div> 
     			<div class="container">
            				<span style="margin-top: 100px;">  </span> 
              		<div class="form-group  {{ $errors->has('mvFIleNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="mvFIleNo" type="text" class="form-control" maxlength="15" onkeypress="return isNumberKey(event)" name="mvFIleNo" value="{{ old('mvFIleNo') }}" placeholder="MV File No">
                                    @if ($errors->has('mvFIleNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('mvFIleNo') }}</strong>
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
                      
                </div>

                     <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                    <div class="container">
                    		<div class="form-group  {{ $errors->has('bodyType') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="bodyType" type="text" class="form-control" name="bodyType" maxlength="100" value="{{ old('bodyType') }}" placeholder="Body Type*">
                                    @if ($errors->has('bodyType'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('bodyType') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                    		<div class="form-group  {{ $errors->has('Color') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="Color" type="text" class="form-control" maxlength="100" name="Color" value="{{ old('Color') }}" placeholder="Color">
                                    @if ($errors->has('Color'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('Color') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        	</div>                   
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
      
                    </div>
                    <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                    <div class="container">
                    		<div class="form-group  {{ $errors->has('seatNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="seatNo" type="text" class="form-control integer" name="seatNo" maxlength="11" value="{{ old('seatNo') }}" placeholder="Authorized Seating Capacity*">
                                    @if ($errors->has('seatNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('SeatNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                        <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                         <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Period of Insurance</h4>
                            </div>
                      <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                           <script type="text/javascript">
                                                var j = jQuery.noConflict();
                                                jQuery(function () {
                                                  jQuery('#policyPeriod').datetimepicker({
                                                    format: 'YYYY-M-D',
                                                    disabledHours: false,
                                                    pickTime: false, 
                                                    
                                                  });
                                                });
                                            
                                          </script>
                    <div class="container">
                            <div class="form-group  {{ $errors->has('policyPeriod') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="policyPeriod" type="text" class="form-control" name="policyPeriod" maxlength="10" value="{{ old('policyPeriod') }}" placeholder="Policy Inception Date">
                                    @if ($errors->has('policyPeriod'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('policyPeriod') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('mortgagee') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="mortgagee" type="text" class="form-control" name="mortgagee" maxlength="500" value="{{ old('mortgagee') }}" placeholder="Mortgagee (if any)">
                                    @if ($errors->has('mortgagee'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('mortgagee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                        <div class="col-md-12 break-two">
                            <br>    
                        </div>   
                    <label class="checkbox-inline">Do you have an agent?
                           <input type="radio" name="rdbAgent" value="Yes"> Yes
                          
                        </label>
                        <label class="checkbox-inline">
                           <input type="radio" name="rdbAgent" value="No"> No

                        </label>
                      <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                    <div class="container">
                            <div class="form-group  {{ $errors->has('agentName') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="agentName" type="text" class="form-control" name="agentName" maxlength="100" value="{{ old('agentName') }}" placeholder="Agent Name">
                                    @if ($errors->has('agentName'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('agentName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('agentNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4">
                                    <input id="agentNo" type="text" class="form-control" name="agentNo" maxlength="100" value="{{ old('agentNo') }}" placeholder="Agent Contact Number">
                                    @if ($errors->has('agentNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('agentNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>

                   <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                     <div class="col-md-12 actions quote-btns">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <input type="submit" id="CompreSecondTabBack"  name="CompreSecondTabBack"  class="btn btn-primary btn-back" value="Back"> -->
                                    <input type="submit" id="CompreSecondTabNext"  name="CompreSecondTabNext" class="btn btn-primary a-btn-slide-text btn-buy" value="Next">
                                </div>
                            </div>
                        </div>

                         <div class="col-md-12 break-two">
                    <br>    
                </div> 