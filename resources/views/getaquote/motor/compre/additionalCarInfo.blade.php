            
<input type="hidden" id="with_agent" name="with_agent" value="{{old('with_agent')}}">

<div>
    <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Additional Car Information</h4>
</div>
<div class="col-md-12_ break-two"><br></div> 
<div class="container_ row">      
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('mvFIleNo') ? ' has-error' : '' }}" >                           
            <div class="col-md-4_">
                <label for="mvFIleNo">MV File No.</label>
                <input id="mvFIleNo" type="text" class="form-control input-lg" maxlength="15" onkeypress="return isNumberKey(event)" name="mvFIleNo" value="{{ old('mvFIleNo') }}" placeholder="">
                @if ($errors->has('mvFIleNo'))
                    <span class="help-block">
                            <strong>{{ $errors->first('mvFIleNo') }}</strong>
                    </span>
                @endif
            </div>
        </div>   
    </div>   
    <div class="col-12 col-md-4">
        <div class="form-group  {{ $errors->has('plateNo') ? ' has-error' : '' }}">                           
            <div class="col-md-4_">
                <label for="plateNo">Plate No*</label>
                <input id="plateNo" type="text" class="form-control input-lg" maxlength="10" name="plateNo" value="{{ old('plateNo') }}" placeholder="">
                @if ($errors->has('plateNo'))
                    <span class="help-block">
                            <strong>{{ $errors->first('plateNo') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="form-group  {{ $errors->has('engineNO') ? ' has-error' : '' }}">                           
            <div class="col-md-4_">
                <label for="engineNO">Engine No.*</label>
                <input id="engineNO" type="text" class="form-control input-lg" maxlength="20" name="engineNO" value="{{ old('engineNO') }}" placeholder="">
                @if ($errors->has('engineNO'))
                    <span class="help-block">
                            <strong>{{ $errors->first('engineNO') }}</strong>
                    </span>
                @endif
            </div>
        </div> 
    </div> 
</div>

                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    <div class="container_ row">
                        <div class="col-12 col-md-4">
                    		<div class="form-group  {{ $errors->has('bodyType') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="bodyType">Body Type*</label>
                                    <input id="bodyType" type="text" class="form-control input-lg" name="bodyType" maxlength="100" value="{{ old('bodyType') }}" placeholder="">
                                    @if ($errors->has('bodyType'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('bodyType') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                    		<div class="form-group  {{ $errors->has('Color') ? ' has-error' : '' }}">                           
                                <div class="col-md-4_">
                                    <label for="Color">Color</label>
                                    <input id="Color" type="text" class="form-control input-lg" maxlength="100" name="Color" value="{{ old('Color') }}" placeholder="">
                                    @if ($errors->has('Color'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('Color') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        	</div>                   
                        </div>                   
                        <div class="col-12 col-md-4">
                    		<div class="form-group {{ $errors->has('chassisNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="chassisNo">Chassis No*</label>
                                    <input id="chassisNo" type="text" class="form-control input-lg" maxlength="20" name="chassisNo" value="{{ old('chassisNo') }}" placeholder="">
                                    @if ($errors->has('chassisNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('chassisNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        	</div>
                        </div>
                    </div>
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    <div class="container_ row">
                        <div class="col-12 col-md-4">
                    		<div class="form-group  {{ $errors->has('seatNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="seatNo">Authorized Seating Capacity*</label>
                                    <input id="seatNo" type="text" class="form-control integer input-lg" name="seatNo" maxlength="11" value="{{ old('seatNo') }}" placeholder="">
                                    @if ($errors->has('seatNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('seatNo') }}</strong>
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
                    <div>
                        <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Period of Insurance</h4>
                    </div>
                    <div class="col-md-12_ break-two">
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
                    <div class="container_ row">
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('policyPeriod') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="policyPeriod">Policy Inception Date</label>
                                    <input id="policyPeriod" type="text" class="form-control input-lg" name="policyPeriod" maxlength="10" value="{{ old('policyPeriod') }}" placeholder="">
                                    @if ($errors->has('policyPeriod'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('policyPeriod') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('mortgagee') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="mortgagee">Mortgagee (if any)</label>
                                    <input id="mortgagee" type="text" class="form-control input-lg" name="mortgagee" maxlength="500" value="{{ old('mortgagee') }}" placeholder="">
                                    @if ($errors->has('mortgagee'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('mortgagee') }}</strong>
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
                
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    <div>
                        <h4 class="rfs-2-5 rfs-md-1-3 mb-1">Do you have an agent?</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="checkbox-inline"></label>                    
                            <div class="col-md-12_" id="pwd_div_1">
                                <button type="button" id="btn_pwd_yes" name="btn_pwd_yes" class="btn btn-secondary-light" >Yes</button>
                                <button type="button" id="btn_pwd_no" name="btn_pwd_no" class="btn btn-secondary-light" >No</button>
                            </div>
                        </div> 
                    </div> 
                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    <div id="divagent" class="container_ row">
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('agentName') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="agentName">Agent number</label>
                                    <input id="agentName" type="text" class="form-control input-lg" name="agentName" maxlength="100" value="{{ old('agentName') }}" placeholder="">
                                    @if ($errors->has('agentName'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('agentName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group  {{ $errors->has('agentNo') ? ' has-error' : '' }}" >                           
                                <div class="col-md-4_">
                                    <label for="agentNo">Agent Contact Number</label>
                                    <input id="agentNo" type="text" class="form-control input-lg" name="agentNo" maxlength="100" value="{{ old('agentNo') }}" placeholder="">
                                    @if ($errors->has('agentNo'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('agentNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12_ break-two">
                        <br>    
                    </div> 
                    <div class="actions quote-btns">
                        <div class="row">
                            <div class="col-12 text-center">
                                <!-- <input type="submit" id="CompreSecondTabBack"  name="CompreSecondTabBack"  class="btn btn-primary btn-back" value="Back"> -->
                                <input type="submit" id="CompreSecondTabNext"  name="CompreSecondTabNext" class="btn btn-secondary btn-lg" value="Next">
                            </div>
                        </div>
                    </div>

                <script type="text/javascript">
                $( document ).ready(function() {
                    $("#divagent").hide();
                    if($('input[name=with_agent]').val() == 'yes'){
                        $("#divagent").show();
                        $('#btn_pwd_yes').addClass('btn-secondary');
                        $('#btn_pwd_yes').removeClass('btn-secondary-light');
                        $('#btn_pwd_no').addClass('btn-secondary-light');
                        $('#btn_pwd_no').removeClass('btn-secondary');
                    } else if ($('input[name=with_agent]').val() == 'no'){
                        $("#divagent").hide();
                        $('#btn_pwd_no').addClass('btn-secondary');
                        $('#btn_pwd_no').removeClass('btn-secondary-light');
                        $('#btn_pwd_yes').addClass('btn-secondary-light');
                        $('#btn_pwd_yes').removeClass('btn-secondary');
                    }
                });

                
                $( "#btn_pwd_yes" ).click(function() { 
                    $("#divagent").show();
                    $('#btn_pwd_yes').addClass('btn-secondary');
                    $('#btn_pwd_yes').removeClass('btn-secondary-light');
                    $('#btn_pwd_no').addClass('btn-secondary-light');
                    $('#btn_pwd_no').removeClass('btn-secondary');  
                    $('input[name=with_agent]').val("yes"); 
                });

                $( "#btn_pwd_no" ).click(function() { 
                    $("#divagent").hide();
                    $('#btn_pwd_no').addClass('btn-secondary');
                    $('#btn_pwd_no').removeClass('btn-secondary-light');
                    $('#btn_pwd_yes').addClass('btn-secondary-light');
                    $('#btn_pwd_yes').removeClass('btn-secondary');
                    $('input[name=with_agent]').val("no");
                });
                </script>