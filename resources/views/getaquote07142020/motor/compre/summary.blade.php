
<div class="summary-and-confirmation-slider summary-and-confirmation-motor">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="quote-details-summary">
                                            <table  border="0" style="border: 0;">
                                                <tbody>
                                                    <tr>
                                                        <td data-qds-title="1">
                                                            <strong>Personal Information</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Name: &nbsp; {{$full}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-qds-title="1">
                                                            <strong>Location of Vechicle </strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Address: &nbsp; <span style="text-transform: uppercase;">{{$Address}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-qds-title="1">
                                                            <strong>Contact Information </strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Contact Number: &nbsp; {{$contactNo}}
                                                        </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td>
                                                            Email: &nbsp; {{$emailAddress }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="quote-details-summary">
                                            <table >
                                                <tbody>
                                                    <tr>
                                                        <td data-qds-title="1" colspan="2">
                                                            <strong>Vehicle Information </strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            Type of insurance: &nbsp; Comprehensive
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            Year: &nbsp; {{$year}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Brand: &nbsp; {{$brand}}
                                                        </td>                                                       
                                                    </tr>
                                                    <tr>                                                        
                                                        <td>
                                                            Model: &nbsp; {{$model}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            Market Value: &nbsp; Php {{$fmvValue}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-qds-title="1" colspan="2">
                                                            <strong>Coverage</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            Policy Period: <span>{{$inceptDate}}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 quote-left">
                                        <div class="summary-and-confirmation">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">
                                                            Coverage
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            Limit of Liability
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            A. Own Damage and Theft
                                                        </td>
                                                        <td>
                                                            {{$ODTheft}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            B. Bodily Injury
                                                        </td>
                                                        <td>
                                                            {{$bodilyInjury}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            C. Property Damage
                                                        </td>
                                                        <td>
                                                            {{$propertyDamage}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            D. Auto Personal Accident
                                                        </td>
                                                        <td>
                                                            {{$autoPA}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            E. Acts of Nature
                                                        </td>
                                                        <td>
                                                             {{$actsOfNaturefinal}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="quote-other-details">
                                                                <p>
                                                                    <strong>Deductible</strong> {{$deductible}}
                                                                </p>
                                                                <p>
                                                                    Non-standard Accessories (Note all declared accessories not factory installed)</p>
                                                                <p>
                                                                    <strong>Disclaimer:</strong></p>
                                                                <p>
                                                                    The above quotation is applicable only for the unit describe and shall be valid
                                                                    up to 30 days from the date of quotation.</p>
                                                                <p>
                                                                    Undeclared non-standard accessories will not be covered. For your protection please
                                                                    declare all non-standard accessories, it's brand/model and purchase price which
                                                                    shall be subject to approval and additional premium shall be charged.</p>
                                                                <br>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="summary-and-confirmation">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            premium computation
                                                        </th>
                                                        <?php if($reqType === "1"){  ?> 
                                                        <th>
                                                            Option I w/ AON <span class="icon-info tooltip-icon"></span><span class="tooltip-woaon tooltip-text"><p>
                                                                <span style="font-size: medium;"><strong>Without Acts of Nature</strong></span></p>
                                                                <p>
                                                                    “Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                    unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                    either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                    car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                            </span>
                                                        </th>
                                                    <?php }else{ ?>
                                                         <th>
                                                            Option II w/o AON <span class="icon-info tooltip-icon"></span><span class="tooltip-woaon tooltip-text"><p>
                                                                <span style="font-size: medium;"><strong>Without Acts of Nature</strong></span></p>
                                                                <p>
                                                                    “Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                    unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                    either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                    car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                            </span>
                                                        </th>
                                                    <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="quote-main-highlight">
                                                        <td>
                                                            Net Premium
                                                        </td>
                                                        <td>
                                                            Php {{$finalNetPremium}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <strong>Plus:</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Doc Stamps
                                                        </td>
                                                        <td>
                                                            {{$finaldocstamp}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            VAT
                                                        </td>
                                                        <td>
                                                            {{$finalVat}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Local Government Tax
                                                        </td>
                                                        <td>
                                                            {{$finalLGT}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Gross Premium
                                                        </td>
                                                        <td>
                                                            Php {{$finalgross}}
                                                        </td>
                                                    </tr>
                                                    @if($promoRate)
                                                    <tr>
                                                        <td>
                                                            <span style="opacity: 0.8;"><i>Promo</i></span>
                                                        </td>
                                                        <td>
                                                         <span style="opacity: 0.8;"><i>  -  {{$promoRate}}% </i></span>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                    </tr>
                                                    <tr class="quote-main-highlight">
                                                        <td>
                                                            Final Amount Due
                                                        </td>
                                                        <td>
                                                            Php {{$finalTotalDue}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 quote-other-details pull-right">
                                        <p>
                                            <strong>Documentary Stamps Tax </strong>
                                        </p>
                                        <p>
                                            Due to BIR implementation of EDST(Electronic Documentary Stamp Tax) system effective
                                            July 1, 2010, policy holders are mandated to pay the DST portion of the premium
                                            once the policy is issued. Refund on DST for cancelled policies is not allowed.</p>
                                    </div>
                                </div>
                               
                            </div>
                           
                        </div>


 <div class="col-md-12 break-two">
                    <br>    
                </div> 

               <br>  
 
                <input type="checkbox" id="CBPrivacy" name="CBPrivacy" value="1"  <?php if(old('CBPrivacy')){ echo "checked";} ?> >
                <label for="CBPrivacy"> I AGREE with the <a href="#" data-toggle="modal"
                                                        data-target="#privacyPolicy"> Privacy Policy</a></label>
              
                <input type="checkbox" id="CBTerms" name="CBTerms" value="1"  <?php if(old('CBTerms')){ echo "checked";} ?> >
                <label for="CBTerms"> I AGREE to the  <a href="#" data-toggle="modal" data-target="#termsConditions"> Terms & Conditions</a></label>
                
                <input type="checkbox" id="CBExclusion" name="CBExclusion" value="1"  <?php if(old('CBExclusion')){ echo "checked";} ?> >
                <label for="CBExclusion"> I AGREE with the <a href="#" data-toggle="modal" data-target="#exclusionslimitations" > Exclusion & Limitations</a></label>
                
                <div class="" style="margin-top: 20px;margin-left: 10px;opacity: 0.7">
                    <p>Before we take you to the payment page, please take time read and understand the Terms & Condition of this website. To continue, just click on the "I AGREE" tick box. Otherwise, click Back Button to cancel the operation or just click your browser's back button</p>
                    <div class="small"><strong>NOTE:</strong> <u>Only the Insured and/or his duly authorized representative can register.</u></div></div>
                <br><br>
                   <p>Help support our cause in saving the environment! Your donation will help protect Magilas, a critically endangered Philippine Eagle.  <a href="#" data-toggle="modal" data-target="#magilasInfo">Learn more</a>.</p>
                    
                    <div class="col-md-12"> 
                        <div class="col-md-2" style="margin-left: -30px"> 
                            <input type="checkbox" id="CBMagilas" name="CBMagilas" value="1"   <?php if(old('CBMagilas')){ echo "checked";} ?> >
                            <label for="CBMagilas"> I want to donate </label>
                        </div>
                        <script>
                               jQuery(document).ready(function(){
                                        // Jquery Dependency
                                   jQuery("input[name='otherMagilas']").on({
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

                                    var magilas1 = jQuery( ".selectmagilas" ).val();
                                        if(magilas1 === "Others"){
                                                jQuery(".otherdivMagilas").show();
                                            }else{
                                                jQuery(".otherdivMagilas").hide();
                                        }                                        
                                    jQuery('.selectmagilas').change(function(){                                        
                                        if(jQuery(this).val() != '')
                                        {                
                                             var magilas = jQuery(this).val();
                                             if(magilas === "Others"){
                                                jQuery(".otherdivMagilas").show();
                                             }else{
                                                jQuery(".otherdivMagilas").hide();
                                             }        
                                       
                                        }
                                       }); 
                                });
                        </script>

                        <div class="col-md-2 divmagilas" style="margin-left: -30px" > 
                            <select  id="drpMagilas" name="drpMagilas" class="form-control selectmagilas" style="font-family: muli;">
                                @if (old('drpMagilas'))
                                     <option value="{{ old('drpMagilas') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('drpMagilas') }}</option>                                             
                                @else
                                    <option value="10.00" selected="selected" style="display:none;" disabled="disabled" readonly>Php 10.00</option>
                                @endif
                                     <option value="10.00" >Php 10.00</option>
                                     <option value="50.00" >Php 50.00</option>
                                     <option value="100.00" >Php 100.00</option>
                                     <option value="Others" >Others</option>                                         
                            </select> 
                        </div>
                        <div class="col-md-2 otherdivMagilas" style="margin-left: -20px">  
                            <input id="otherMagilas" name="otherMagilas" type="text" class="form-control magilas btn-xs" maxlength="100" min="1" max="10" value="{{ old('otherMagilas') }}" placeholder="*minimum of Php 5.00">
                        </div>

                        <div class="col-md-2" style="margin-left: -20px;margin-top: 10px;"> 
                            to Magilas.
                        </div>
                    </div>

                          <style type="text/css">
                              div.magilas{
                             
                                width: 1px;
                              }
                          </style>
                <div class="col-md-12 actions quote-btns">
                            <div class="row">
                                <div class="col-sm-12">
                                   <!--  <input type="submit" id="ComprefourthTabBack"  name="ComprefourthTabBack"  class="btn btn-primary btn-back" value="Back"> -->
                                    <input type="submit"  id="ComprefourthTabBuy"  name="ComprefourthTabBuy"  class="btn btn-primary a-btn-slide-text btn-buy" value="Buy">
                                </div>
                            </div>
                </div>
                            <div class="col-md-12 break-two">
                            <br>    
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