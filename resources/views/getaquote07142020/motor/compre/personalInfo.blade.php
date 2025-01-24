   

    <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Personal Information</h4>
                            </div>
               <div class="col-md-12 break-two">
                            <br>    
                        </div> 
               <div class="container">               
                        <div class="form-group  {{ $errors->has('firstNameOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="firstNameOld" type="text" class="form-control" name="firstNameOld" maxlength="50" value="{{ $firstName  }}" readonly="readonly">
                                    @if ($errors->has('firstNameOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('firstNameOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('lastNameOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="lastNameOld" type="text" class="form-control" name="lastNameOld" maxlength="50" value="{{ $lastName }}" readonly="readonly">
                                    @if ($errors->has('lastNameOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('lastNameOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('middleNameOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="middleNameOld" type="text" class="form-control" name="middleNameOld" maxlength="50" value="{{ $middleName }}" readonly="readonly">
                                    @if ($errors->has('middleNameOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('middleNameOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                </div>
                <div class="col-md-12 break-two">
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
                                    
                </div>
                  <script type="text/javascript">
                                                var j = jQuery.noConflict();
                                                jQuery(function () {
                                                  jQuery('#birthDate').datetimepicker({
                                                    format: 'YYYY-M-D',
                                                    disabledHours: false,
                                                    pickTime: false, 
                                                    
                                                  });
                                                });
                                               
                                          </script>
                <div class="col-md-12 break-two">
                    <br>    
                </div> 
                <div class="" style="margin-top: 50px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Mailing Address</h4>
                            </div>
               
                <div class="col-md-12 break-two">
                    <br>    
                </div> 
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
                 <div class="col-md-12 break-two">
                            <br>    
                        </div> 
             
                    <div class="container">               
                        <div class="form-group  {{ $errors->has('province') ? ' has-error' : '' }} fieldset-group has-feedback" >
                           
                                <div class="col-md-4" >
                                    <select  id="province" name="province" data-size="10"  class="form-control dynamicprovince selectpicker" data-live-search="true" style="font-family: muli">
                                       
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
                           
                                <div class="col-md-4" >
                                    <select  id="city" name="city" class="form-control selectpicker" data-size="10" data-live-search="true" style="font-family: muli">
                                                                  
                                         
                                          @if (old('city'))
                                             <option value="{{ old('city') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('city') }}</option>                                             
                                          @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>City* </option>
                                          @endif
                                          

                                      
                                        
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
                          <div class="col-md-12 break-two">
                            <br>    
                        </div>
                          <div class="col-md-12 break-two">
                            <br>    
                        </div>
                  <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Contact information</h4>
                            </div>
                             <div class="col-md-12 break-two">
                            <br>    
                        </div> 
            <div class="container">               
                        <div class="form-group  {{ $errors->has('contactNoOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="contactNoOld" type="text" class="form-control" maxlength="100" name="contactNoOld" value="{{ $contactNo }}"  readonly="readonly">
                                    @if ($errors->has('contactNoOld'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('contactNoOld') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group  {{ $errors->has('emailAddressOld') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="emailAddressOld" type="text" class="form-control" maxlength="50" name="emailAddressOld" value="{{ $emailAddress }}"  readonly="readonly">
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
<!-- 
                <div class="" style="margin-top: 50px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Contact Details</h4>
                            </div>
                <div class="col-md-12 break-two">
                            <br>    
                        </div>  -->
               








                        <div class="col-md-12 actions quote-btns">
                            <div class="row">
                                <div class="col-sm-12">
                                   <!--  <input type="submit" id="CompreThirdTabBack"  name="CompreThirdTabBack"  class="btn btn-primary btn-back" value="Back"> -->
                                    <input type="submit"  id="CompreThirdTabNext"  name="CompreThirdTabNext"  class="btn btn-primary a-btn-slide-text btn-buy" value="Next">
                                </div>
                            </div>
                        </div>
                       <div class="col-md-12 break-two">
                    <br>    
                </div> 