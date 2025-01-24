

     
                <div class="container">
                      
                                            
                            <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-datetimepicker.min.css') }}" />
                            <link rel="stylesheet" href="{{ asset('/css/datepick/font-awesome.min.css') }}" />
                            <link rel="stylesheet" href="{{ asset('/css/datepick/bootstrap-theme.min.css') }}" />
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
                           <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                         <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Personal Information</h4>
                            </div>
                <div class="col-md-12 break-two">
                            <br>    
                        </div> 
              <div class="container">               
                        <div class="form-group  {{ $errors->has('firstName') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="firstName" type="text" class="form-control accessoryValue3" name="firstName" maxlength="50" value="{{ old('firstName') }}" placeholder="First Name*" >
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
                                 <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                 <div class="container">               
                        <div class="form-group  {{ $errors->has('contactNo') ? ' has-error' : '' }}">                           
                                <div class="col-md-4">
                                    <input id="contactNo" type="text" class="form-control" maxlength="100" name="contactNo" value="{{ old('contactNo') }}" placeholder="Contact No*" onkeypress="return isNumberKey(event)">
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
                         <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                         <div class="" style="margin-top: 20px;margin-bottom: -20px;opacity: 0.8">
                                <h4>Car Information</h4>
                            </div>
                                               
                        <div class="col-md-12 break-two">
                            <br>    
                        </div> 
                        <div class="container">  
                              <div class="form-group  {{ $errors->has('drpYear') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-4">
                                    <select  id="drpYear" name="drpYear" class="form-control dynamicyear selectpicker" data-size="10" data-live-search="true" style="font-family: muli">
                                        
                                         @if (old('drpYear'))
                                             <option value="{{ old('drpYear') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('drpYear') }}</option>                                             
                                        @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Year * </option>
                                        @endif

                                          @foreach($cocogen_fmv_years as $cocogen_fmv_year)
                                          <option value="{{ $cocogen_fmv_year->year }}" >{{$cocogen_fmv_year->year}} </option>  
                                        @endforeach     
                                    </select>
                                    @if ($errors->has('drpYear'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('drpYear') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>
                              <div class="form-group  {{ $errors->has('brand') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-4">
                                    <select  id="brand" name="brand" class="form-control dynamicbrand selectpicker" data-size="10" data-live-search="true" style="font-family: muli" >
                                       @if (old('brand'))
                                             <option value="{{ old('brand') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('brand') }}</option>                                             
                                        @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Brand* </option>
                                        @endif
                                    </select>
                                    @if ($errors->has('brand'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('brand') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>
                               <div class="form-group  {{ $errors->has('model') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-4">
                                     <select  id="model" name="model" class="form-control dynamic selectpicker" data-size="10" data-live-search="true"  style="font-family: muli">
                                      @if (old('model'))
                                             <option value="{{ old('model') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('model') }}</option>                                             
                                        @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Model* </option>
                                        @endif 
                                    </select>
                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-4">
                                  <input type="checkbox" id="CBCantFind" name="CBCantFind" value="1">
                                  <label for="CBCantFind"> Can't find your car?</label>
                                </div>
                              </div>
                                
                            </div>
                          <div class="col-md-12 break-two">
                            <br>    
                          </div>
                          <div class="col-md-12 break-two">
                            <br>    
                          </div>
                        <div class="" style="margin-top: 20px;margin-bottom: -25px;opacity: 0.8">
                                    <h4>Value of Car</h4>
                                  </div>
                        <div class="col-md-12 break-two">
                            <br>    
                        </div>   
                            <div class="container">  
                              <div class="form-group">                                  
                                  <div class="col-md-4">
                                  <input type="range" id="fader">
                                  <label id="minValue" name="minValue" max="minValue" class="pull-left" for="minValue" > {{ old('minValue', 'XXXXXXX') }} </label> 
                                  <label id="maxValue" name="maxValue" max="maxValue" class="pull-right" for="maxValue" value="{{old('maxValue')}}" >  {{ old('maxValue', 'XXXXXXX') }} </label>
                                </div>
                              </div>
                              <div class="col-md-12 break-two">
                            <br>    
                          </div>
                              <div class="form-group  {{ $errors->has('totalValue') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-4">
                                    <label>Total Value: </label>
                                    <input id="totalValue" name="totalValue" type="text" class="form-control accessoryValue2" maxlength="100" min="1" max="10" value="{{ old('totalValue') }}" placeholder="Value*">
                                    @if ($errors->has('totalValue'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('totalValue') }}</strong>
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
                                <h4>Select Insurance Coverage</h4>
                            </div>
                       
                        <div class="col-md-12 break-two">
                            <br>    
                        </div>  
                        <style type="text/css"></style>
                       
 
                          <div class="container">  
                              <div class="form-group  {{ $errors->has('bodilyInjury') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-6">
                                    <label for="bodilyInjury">Bodily Injury</label>                                
                                     <select  id="bodilyInjury" name="bodilyInjury" class="form-control selectpicker" style="font-family: muli">                                        
                                        @if (old('bodilyInjury'))
                                             <option value="{{ old('bodilyInjury') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('bodilyInjury') }}</option>                                             
                                        @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Value * </option>
                                        @endif 
                                        @foreach($cocogen_compre_bipds as $cocogen_compre_bipd)
                                                <option value="{{ number_format( $cocogen_compre_bipd->amount, 2 ) }}" >{{number_format( $cocogen_compre_bipd->amount, 2 )}} </option>  
                                        @endforeach     
                                    </select>
                                     @if ($errors->has('bodilyInjury'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('bodilyInjury') }}</strong>
                                        </span>
                                    @endif 
                                </div>
                              </div>
                              <div class="form-group  {{ $errors->has('propertyDamage') ? ' has-error' : '' }} fieldset-group has-feedback">
                                <div class="col-md-6">
                                  <label for="propertyDamage">Property Damage</label>
                                    <select  id="propertyDamage" name="propertyDamage" class="form-control selectpicker"  style="font-family: muli">                                        
                                        @if (old('propertyDamage'))
                                             <option value="{{ old('propertyDamage') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('propertyDamage') }}</option>                                             
                                        @else
                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Value * </option>
                                        @endif 

                                          @foreach($cocogen_compre_bipds as $cocogen_compre_bipd)
                                                <option value="{{ number_format( $cocogen_compre_bipd->amount, 2 ) }}" >{{number_format( $cocogen_compre_bipd->amount, 2 )}} </option>  
                                        @endforeach     
                                    </select>
                                    @if ($errors->has('propertyDamage'))
                                        <span class="help-block">
                                               <strong>{{ $errors->first('propertyDamage') }}</strong>
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
                       
                            <div class="" style="margin-top: 20px;margin-bottom: -5px;opacity: 0.8">
                                <h4>Standard Accessories</h4>
                            </div>
                           <div class="container">  
                              <div class="form-group col-md-12">
                                <div class="col-md-4">
                                  <div class="col-md-7">1. Stereo (Built-In) </div>
                                  <div class="col-md-7">2. Aircon (Built-In) </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="col-md-7">3. Five (5) pcs. Magwheels  </div>
                                  <div class="col-md-7">4. Speakers 2 pcs. (Built-In)  </div>
                                </div>
                              </div>
                             
                            </div>
                            <div class="row fieldset-row" data-fieldset-row="accessories_non_standard">
                                <div class="col-md-12">
                                  <div class="" style="margin-top: 20px;margin-bottom: -5px;opacity: 0.8">
                                    <h4>Non-Standard Accessories</h4>
                                               
                                            
                                  </div>
                                  <span style="font-size: 11px;margin-top: -50px;opacity: 0.7"> *All non-standard or non-factory fitted accessories must be declared to be covered.</span>
                                    <div class="fieldset-group" data-fieldset-group="accessories_non_standard">
                                      <div class="form-group fieldset-group-set has-feedback">
                                      <div class="append-elements"></div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                              jQuery(document).ready(function(){
                                        // Jquery Dependency
                                   jQuery(".accessoryValue2").on({
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
                                     jQuery(".otherdivAccessory").show();
                                    var accessory1 = jQuery( ".selectaccessory" ).val();
                                        if(accessory1 === "Others"){
                                                jQuery(".otherdivAccessory").show();
                                            }else{
                                                //jQuery(".otherdivAccessory").hide();
                                        }                                        
                                    jQuery('.selectaccessory').change(function(){                                        
                                        if(jQuery(this).val() != '')                                        {                
                                             var accessory = jQuery(this).val();
                                             if(accessory === "Others"){
                                                jQuery(".otherdivAccessory").show();
                                             }else{
                                                //jQuery(".otherdivAccessory").hide();
                                             }        
                                       
                                        }
                                       }); 
                               
                                });
                        </script>




                            <div class="container">  
                            <div class="multi-field-wrapper">
                                <div class="multi-fields">
                                    <div class="multi-field" style="margin-bottom: 10px;">
                                        <div class="col-md-4">
                                            <div class="select-form-wrapper">
                                              <!-- selectaccessory -->
                                                <select id="accessory" name="accessory[]" class="form-control accesso" data-size="10" data-live-search="true" style="font-style: muli;" >
                                                         
                                                            <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Select Accessory</option>
                                                                                                  
                                                     @foreach($accessories as $accessory)
                                                            <option value="{{  $accessory->name }}" >{{ $accessory->name}} </option>  
                                                     @endforeach  
                                                </select>
                                             
                                            </div>

                                         </div>
                                           <!-- <div class="col-md-3 otherdivAccessory">
                                            <div class="select-form-wrapper  ">                                               
                                                 <input id="otherAccessory" name="otherAccessory[]" type="text" class="form-control otherAccessory2"  value=""  placeholder="Enter Other Accessory">
                                            </div>

                                         </div> -->
                                         <div class="col-md-2">
                                            <div class="select-form-wrapper ">
                              
                                                 <input id="accessoryValue" name="accessoryValue[]" type="text" class="form-control accessoryValue2"  value=""  placeholder="Value*">
                                            </div>

                                         </div>
                                        <div class="a btn btn-primary a-btn-slide-text add-field">
                                            <span class="glyphicon glyphicon-plus " aria-hidden="true"></span>
                                            <!-- <span><strong>Add</strong></span> -->
                                            <span><strong></strong></span>
                                        </div>
                                        <div class="btn btn-danger a-btn-slide-text remove-field">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            <!-- <span><strong>Delete</strong></span> -->
                                            <span><strong></strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>

                            <script type="text/javascript">
                              jQuery('.multi-field .remove-field').hide();
                              jQuery('.multi-field-wrapper').each(function() {
                                  var $wrapper = jQuery('.multi-fields', this);
                                  jQuery(".add-field", jQuery(this)).click(function(e) {
                                      jQuery('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus()
                                      jQuery('.multi-field .remove-field').show();
                                   });
                                  jQuery('.multi-field .accesso', $wrapper).click(function() {
                                  if (jQuery('.multi-field', $wrapper).length > 1)
                                        jQuery(this).selectpicker("refresh");
                                  });

                                jQuery('.multi-field .remove-field', $wrapper).click(function() {
                                  if (jQuery('.multi-field', $wrapper).length > 1)
                                    jQuery(this).parent('.multi-field').remove();
                                  });
                              });
                            </script>
                            <div class="col-md-12 break-two">
                            <br>    
                        </div>
                        <div class="col-md-12 break-two">
                            <br>    
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
                            <div class="col-md-12 break-two">
                            <br>    
                        </div><div class="col-md-12 break-two">
                            <br>    
                        </div>
                         
                            

                           <div class="col-md-12 actions quote-btns">
                            <div class="row">
                                <div class="col-sm-12">                                  
                                   <input type="submit" id="ViewQuote"  name="ViewQuote"  class="btn btn-primary a-btn-slide-text btn-buy"    value="View Quote">
                                    <!-- <input type="button" id="ViewQuote"  name="ViewQuote"  class="btn btn-primary a-btn-slide-text btn-buy" onclick="location.href='{{ url('/DragonPay') }}/{{session('tnxid')}}'" value="Buy"> -->
                                   <!--   <input type="submit" id="CompreFirstTab"  name="CompreFirstTab" class="btn btn-primary a-btn-slide-text btn-buy"    value="Next"> -->
                                   
                                </div>
                            </div>
                        </div>
                         
                            <div class="col-md-12 break-two">
                              <br>    
                            </div> 
                  </div>

   