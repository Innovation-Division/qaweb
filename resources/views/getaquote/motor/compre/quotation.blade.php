<style type="text/css">
.quote-results .table > tbody > tr > td {
    border-top: 0px !important;
    border-bottom: 1px solid #B8B8B8 !important;
    padding: 1.3rem 1.5rem;
}
.quote-results .quote-main-summary span.tooltip-icon {
    color: #008080;
}
.quote-results .table > tbody > tr > td.border-hl {
    border-bottom-width: 3px !important;
    border-bottom-color: #707070 !important;
}
.quote-results .ins-plan-option {
    margin-left: 60px;
}
.quote-results .ins-plan-option .form-check-input[type="checkbox"] {
    border-radius: 50%;
}
.quote-results .ins-plan-option .form-check-input:checked[type="checkbox"] {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
}
.quote-results input[type="submit"] {
    min-width: 200px;
}
</style>              
                       
<div class="quote-results rfs-1-5 rfs-md-1">
    <div class="container_">
        <div class="row">
            <div class="col-md-12 summary-table-wrapper">
                <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Quote Summary</h4>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 quote-right">
                        <div class="quote-main-summary">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="p-0 border-0">
                                                <div class="bgcolor-primary brd-10 p-4 rfs-1-8 rfs-md-1-3 brd-10"><span class="heading-border text-color-light">Premium Computation</span></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-0" style="width: 100%;">&nbsp;</td>
                                            <td data-qds-title="2" style="min-width: 350px;" class="text-right">
                                                <strong>Plan with AON <span class="icon-info tooltip-icon"></span><span class="tooltip-waon tooltip-text" >
                                                    <p>
                                                        <span style="font-size: medium;"><strong>With Acts of Nature</strong></span></p>
                                                    <p>
                                                        “Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                        unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                        either by preparation or caution. Act of Natuure coverage will help pay for your
                                                        car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                </span></strong>
                                            </td>
                                            <td data-qds-title="2" style="min-width: 350px;" class="text-right">
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
                                        <tr class="quote-main-highlight" >
                                            <td class="text-color-primary">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Base Premium</strong>
                                            </td>
                                            <td class="text-right text-color-primary">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Php&nbsp;{{$netPremwithAOM}}</strong>
                                            </td>
                                            <td class="text-right text-color-primary">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Php {{$netPrem}}</strong>
                                            </td>
                                        </tr>
                                        <tr class="quote-main-highlight">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Plus:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Doc Stamps
                                            </td>
                                            <td class="text-right">
                                                {{$dstwithAOM}}
                                            </td>
                                            <td class="text-right">
                                                {{$dst}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                VAT
                                            </td>
                                            <td class="text-right">
                                                {{$vatwithAOM}}
                                            </td>
                                            <td class="text-right">
                                                {{$vat}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-hl">
                                                Local Government Tax
                                            </td>
                                            <td class="border-hl text-right">
                                                {{$lgtwithAOM}}
                                            </td>
                                            <td class="border-hl text-right">
                                                {{$lgt}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="quote-main-highlight emphasized">
                                            <td class="text-color-primary border-hl">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Gross Premium</strong>
                                            </td>
                                            <td class="text-color-primary text-right border-hl">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Php {{$grossPremwithAOM}}</strong>
                                            </td>
                                            <td class="text-color-primary text-right border-hl">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Php {{$grossPrem}}</strong>
                                            </td>
                                        </tr>
                                        @if($promoRate)

                                        @if($promoType ==="A")
                                                <tr >
                                                    <td><span>Promo</span>
                                                    </td>
                                                    <td class="text-right">- Php {{$promoRate}}
                                                    </td>
                                                    <td class="text-right">- Php {{$promoRate}}
                                                    </td>
                                                </tr>
                                            @else
                                                <tr >
                                                    <td><span>Promo</span>
                                                    </td>
                                                    <td class="text-right">- {{$promoRate}}%
                                                    </td>
                                                    <td class="text-right">- {{$promoRate}}%
                                                    </td>
                                                </tr>
                                            @endif

                                        

                                        <tr class="quote-main-highlight">
                                            <td class="border-hl text-color-primary">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Final Amount Due</strong>
                                            </td>
                                            <td class="border-hl text-right text-color-primary">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Php {{$finalDueWithAOM}}</strong>
                                            </td>
                                            <td class="border-hl text-right text-color-primary">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Php {{$finalDue}}</strong>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="quote-other-details mb-5 text-color-verydarkgray rfs-1">
                                <p class="mb-3"><strong>Documentary Stamps Tax</strong></p>
                                <p><em>Due to BIR implementation of EDST system (Electronic Documentary Stamp Tax) effective
                                    July 1, 2010, policy holders are mandated to pay the DST of their policy premium once issued. Refund on DST for cancelled policies are not allowed.</em></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 quote-left">
                        <div class="quote-deduct-summary">
                            <div style="display: none;">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="p-0 border-0">
                                                    <div class="bgcolor-primary brd-10 p-4 rfs-1-8 rfs-md-1-3 brd-10"><span class="heading-border text-color-light">Coverage</span></div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <strong>Limit of Liability</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Own Damage and Theft
                                                </td>
                                                <td class="text-right">
                                                    {{$ODTheft}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bodily Injury
                                                </td>
                                                <td class="text-right">
                                                    {{$bodilyInjury}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Property Damage
                                                </td>
                                                <td class="text-right">
                                                    {{$propertyDamage}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Auto Personal Accident
                                                </td>
                                                <td class="text-right">
                                                    275,000.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Acts of Nature
                                                </td>
                                                <td class="text-right">
                                                    {{$actsOfNature}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="p-0 border-0">
                                                <div class="bgcolor-primary brd-10 p-4 rfs-1-8 rfs-md-1-3 brd-10"><span class="heading-border text-color-light">Coverage</span></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="" data-qds-title="2" style="width: 100%;">
                                                <strong>Limit of Liability</strong>
                                            </td>
                                            <td data-qds-title="2" style="min-width: 350px;" class="text-right">
                                                <strong>Plan with AON 
                                                    <span class="icon-info tooltip-icon"></span>
                                                    <span class="tooltip-waon tooltip-text">
                                                        <p><span style="font-size: medium;"><strong>With Acts of Nature</strong></span></p>
                                                        <p>“Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                            unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                            either by preparation or caution. Act of Natuure coverage will help pay for your
                                                            car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                    </span>
                                                </strong>
                                            </td>
                                            <td data-qds-title="2" style="min-width: 350px;" class="text-right">
                                                <strong>Plan without AON 
                                                    <span class="icon-info tooltip-icon"></span>
                                                    <span class="tooltip-woaon tooltip-text">
                                                        <p><span style="font-size: medium;"><strong>Without Acts of Nature</strong></span></p>
                                                        <p>“Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                            unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                            either by preparation or caution. Act of Natuure coverage will help pay for your
                                                            car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                    </span>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Own Damage and Theft
                                            </td>
                                            <td class="text-right">
                                                {{$ODTheft}}
                                            </td>
                                            <td class="text-right">
                                                {{$ODTheft}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Bodily Injury
                                            </td>
                                            <td class="text-right">
                                                {{$bodilyInjury}}
                                            </td>
                                            <td class="text-right">
                                                {{$bodilyInjury}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Property Damage
                                            </td>
                                            <td class="text-right">
                                                {{$propertyDamage}}
                                            </td>
                                            <td class="text-right">
                                                {{$propertyDamage}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Auto Personal Accident
                                            </td>
                                            <td class="text-right">
                                                275,000.00
                                            </td>
                                            <td class="text-right">
                                                275,000.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Acts of Nature
                                            </td>
                                            <td class="text-right">
                                                {{$actsOfNature}}
                                            </td>
                                            <td class="text-right">
                                                -
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="quote-deduct-summary">
                            <div class="quote-other-details text-color-verydarkgray rfs-1">
                                <p class="mb-3"><strong>Deductible Php {{$deductible}}</strong></p>
                                <p><em>Non-standard Accessories (Note all declared accessories not factory installed)</em></p>
                                <p></p>
                                <p class="mb-3"><strong>Disclaimer:</strong></p>
                                <p><em>The above quotation is applicable only for the unit described and shall be valid
                                    up to 30 days from the date of quotation.</em></p>
                                <p><em>Undeclared non-standard accessories will not be covered. For your protection please
                                    declare all non-standard accessories, it's brand/model and purchase price which
                                    shall be subject to approval, and additional premium shall be charged.</em></p>
                                <br>
                            </div>
                        </div>
                        <div class="quote-details-summary">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="p-0 border-0">
                                            <div class="bgcolor-primary brd-10 p-4 rfs-1-8 rfs-md-1-3 brd-10"><span class="heading-border text-color-light">Insured and Car Information</span></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Type of insurance: &nbsp; Auto Excel Plus (Comprehensive Motor Issuance)
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
        </div> 
        <div class="mt-5">
            <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Select your insurance plan</h4>
        </div>
        <div class="container">  
            <div class="form-group">
                <div class="row">
                    <div class="col-12">   
                        <div class="form-check ins-plan-option">                                
                            <input type="checkbox" id="premWithAOM" name="premWithAOM" value="1" class="form-check-input" <?php if(old('premWithAOM')){ echo "checked";} ?> >
                            <label for="premWithAOM" class="form-check-label"> Premium with Acts of Nature</label>
                        </div>
                    </div>
                </div>
            </div>                              
        </div>
        <div class="container">  
            <div class="form-group">
                <div class="row">
                    <div class="col-12">                                   
                        <div class="form-check ins-plan-option">                                
                            <input type="checkbox" id="premWithOutAOM" name="premWithOutAOM" value="1" class="form-check-input" <?php if(old('premWithOutAOM')){ echo "checked";} ?> >
                            <label for="premWithOutAOM" class="form-check-label"> Premium without Acts of Nature</label>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="container mt-4">  
            <div class="row">
                <div class="col-md-12 actions quote-btns">  
                    <div class="form-check">                                 
                        <input type="checkbox" id="chckquote_agree" name="chckquote_agree" value="1" class="form-check-input" <?php if(old('chckquote_agree')){ echo "checked";} ?> >
                        <label for="chckquote_agree" class="form-check-label"> I have read and understand the above information/coverages</label>
                    </div>
                </div>      
                <div class="col-md-12 actions quote-btns mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <!--   <input type="submit" id="ViewQuoteBack"  name="ViewQuoteBack"  class="btn btn-primary btn-back" value="Back"> -->
                            <input type="submit" id="ViewQUoteNext" name="ViewQUoteNext" class="form-control_ btn btn-secondary btn-lg" value="Next">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>