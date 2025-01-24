       <style type="text/css">
                            input[type=checkbox] + label {
                              display: block;
                              margin: 0.2em;
                              cursor: pointer;
                              padding: 0.2em;                               
                            }
                            input[type=checkbox] {
                              display: none;
                            }

                            input[type=checkbox] + label:before {
                              content: "\2714";
                              border: 0.1em solid #808080;
                              border-radius: 0.2em;
                              display: inline-block;
                              width: 1.5em;
                              height: 1.5em;
                              padding-left: 0.2em;
                              padding-bottom: 0.3em;
                              margin-right: 0.2em;
                              vertical-align: bottom;
                              color: transparent;
                              transition: .2s;
                            }

                            input[type=checkbox] + label:active:before {
                              transform: scale(0);
                            }

                            input[type=checkbox]:checked + label:before {
                              background-color: MediumSeaGreen;
                              border-color: MediumSeaGreen;
                              color: #fff;
                            }

                            input[type=checkbox]:disabled + label:before {
                              transform: scale(1);
                              border-color: #aaa;
                            }

                            input[type=checkbox]:checked:disabled + label:before {
                              transform: scale(1);
                              background-color: #bfb;
                              border-color: #bfb;
                            }
                         </style>
                                
                       
<div class="quote-results">
                <div class="container" style="margin-left: -15px !important;">
                    <div class="row">
                        <div class="col-md-12 summary-table-wrapper" >
                            <h2>
                                Quote Summary</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 quote-right">
                                    <div class="quote-main-summary">
                                        <br>
                                        &nbsp;&nbsp; &nbsp; &nbsp;
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">
                                                        Premium Computation
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        &nbsp;
                                                    </td>
                                                    <td data-qds-title="2">
                                                        <strong>Plan with AON <span class="icon-info tooltip-icon"></span><span class="tooltip-waon tooltip-text">
                                                            <p>
                                                                <span style="font-size: medium;"><strong>With Acts of Nature</strong></span></p>
                                                            <p>
                                                                “Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                        </span></strong>
                                                    </td>
                                                    <td data-qds-title="2">
                                                        <strong>Plan without AON <span class="icon-info tooltip-icon"></span><span class="tooltip-woaon tooltip-text">
                                                            <p>
                                                                <span style="font-size: medium;"><strong>Without Acts of Nature</strong></span></p>
                                                            <p>
                                                                “Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                        </span></strong>
                                                    </td>
                                                </tr>
                                                <tr class="quote-main-highlight">
                                                    <td>
                                                        Net Premium
                                                    </td>
                                                    <td>
                                                        Php&nbsp;{{$netPremwithAOM}}
                                                    </td>
                                                    <td>
                                                        Php {{$netPrem}}
                                                    </td>
                                                </tr>
                                                <tr class="quote-main-highlight">
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Plus:</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Doc Stamps
                                                    </td>
                                                    <td>
                                                        {{$dstwithAOM}}
                                                    </td>
                                                    <td>
                                                        {{$dst}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        VAT
                                                    </td>
                                                    <td>
                                                        {{$vatwithAOM}}
                                                    </td>
                                                    <td>
                                                        {{$vat}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Local Government Tax
                                                    </td>
                                                    <td>
                                                        {{$lgtwithAOM}}
                                                    </td>
                                                    <td>
                                                        {{$lgt}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr class="quote-main-highlight emphasized">
                                                    <td>
                                                        Gross Premium
                                                    </td>
                                                    <td>
                                                        Php {{$grossPremwithAOM}}
                                                    </td>
                                                    <td>
                                                        Php {{$grossPrem}}
                                                    </td>
                                                </tr>
                                                @if($promoRate)
                                                <tr >
                                                    <td ><span style="font-style: italic;opacity: 0.8">Promo</span>
                                                    </td>
                                                    <td>- {{$promoRate}}%
                                                    </td>
                                                    <td>- {{$promoRate}}%
                                                    </td>
                                                </tr>

                                                <tr class="quote-main-highlight">
                                                    <td >
                                                        Final Amount Due
                                                    </td>
                                                    <td>
                                                        Php {{$finalDueWithAOM}} 
                                                    </td>
                                                    <td>
                                                        Php {{$finalDue}}
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="quote-other-details">
                                            <p>
                                            </p>
                                            <br>
                                            <p>
                                                <strong>Documentary Stamps Tax </strong>
                                            </p>
                                            <p>
                                                Due to BIR implementation of EDST system (Electronic Documentary Stamp Tax) effective
                                                July 1, 2010, policy holders are mandated to pay the DST of their policy premium once issued. Refund on DST for cancelled policies are not allowed.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 quote-left">
                                    <div class="quote-deduct-summary">
                                        <div style="display: none;">
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
                                                            Own Damage and Theft
                                                        </td>
                                                        <td>
                                                            {{$ODTheft}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Bodily Injury
                                                        </td>
                                                        <td>
                                                            {{$bodilyInjury}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Property Damage
                                                        </td>
                                                        <td>
                                                            {{$propertyDamage}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Auto Personal Accident
                                                        </td>
                                                        <td>
                                                            275,000.00
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Acts of Nature
                                                        </td>
                                                        <td>
                                                            {{$actsOfNature}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">
                                                        Coverage
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="" data-qds-title="2">
                                                        Limit of Liability
                                                    </td>
                                                    <td data-qds-title="2">
                                                        Plan with AON <span class="icon-info tooltip-icon"></span><span class="tooltip-waon tooltip-text">
                                                            <p>
                                                                <span style="font-size: medium;"><strong>With Acts of Nature</strong></span></p>
                                                            <p>
                                                                “Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                        </span>
                                                    </td>
                                                    <td data-qds-title="2">
                                                        Plan without AON <span class="icon-info tooltip-icon"></span><span class="tooltip-woaon tooltip-text">
                                                            <p>
                                                                <span style="font-size: medium;"><strong>Without Acts of Nature</strong></span></p>
                                                            <p>
                                                                “Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Own Damage and Theft
                                                    </td>
                                                    <td>
                                                        {{$ODTheft}}
                                                    </td>
                                                    <td>
                                                        {{$ODTheft}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Bodily Injury
                                                    </td>
                                                    <td>
                                                        {{$bodilyInjury}}
                                                    </td>
                                                    <td>
                                                        {{$bodilyInjury}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Property Damage
                                                    </td>
                                                    <td>
                                                        {{$propertyDamage}}
                                                    </td>
                                                    <td>
                                                        {{$propertyDamage}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Auto Personal Accident
                                                    </td>
                                                    <td>
                                                        275,000.00
                                                    </td>
                                                    <td>
                                                        275,000.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Acts of Nature
                                                    </td>
                                                    <td>
                                                        {{$actsOfNature}}
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="quote-deduct-summary">
                                        <div class="quote-other-details">
                                            <p>
                                                <strong>Deductible </strong>Php {{$deductible}}</p>
                                            <p>
                                                Non-standard Accessories (Note all declared accessories not factory installed)</p>
                                            <p>
                                            </p>
                                            <p>
                                                <strong>Disclaimer:</strong></p>
                                            <p>
                                                The above quotation is applicable only for the unit described and shall be valid
                                                up to 30 days from the date of quotation.</p>
                                            <p>
                                                Undeclared non-standard accessories will not be covered. For your protection please
                                                declare all non-standard accessories, it's brand/model and purchase price which
                                                shall be subject to approval, and additional premium shall be charged.</p>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="quote-details-summary">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Insured and Car Information
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                    <td>
                                                        Type of insurance: &nbsp; Motor Excel Plus (Comprehensive Motor Issuance)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Comprehensive Period of Insurance: 1 year
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
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
                                                        <span>Model: &nbsp; {{$model}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Market Value: &nbsp; Php {{$fmvValue}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                         </div> <div class="" style="margin-top: 20px;margin-bottom: -10px;opacity: 0.8">
                              <h4>Select your insurance plan</h4>
                                  </div>
                            <div class="container">  
                              <div class="form-group">
                                <div class="col-md-3">                                   
                                   <input type="checkbox" id="premWithAOM" name="premWithAOM" value="1"  <?php if(old('premWithAOM')){ echo "checked";} ?> >
                                  <label for="premWithAOM"> Premium with Acts of Nature</label>
                                </div>
                               
                              </div>                              
                            </div>
                             
                            <div class="container">  
                              <div class="form-group">
                                <div class="col-md-3">                                   
                                   <input type="checkbox" id="premWithOutAOM" name="premWithOutAOM" value="1"  <?php if(old('premWithOutAOM')){ echo "checked";} ?> >
                                  <label for="premWithOutAOM"> Premium without Acts of Nature</label>
                                </div>
                                
                                
                              
                              </div>  
                            </div>
                        <div class="col-md-12 actions quote-btns">
                            <div class="row">
                                <div class="col-sm-12">
                                  <!--   <input type="submit" id="ViewQuoteBack"  name="ViewQuoteBack"  class="btn btn-primary btn-back" value="Back"> -->
                                    <input type="submit" id="ViewQUoteNext"  name="ViewQUoteNext" class="btn btn-primary a-btn-slide-text btn-buy" value="Next">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     