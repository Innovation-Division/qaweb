<style>
.summary-conf .table > thead:first-child > tr:first-child > th {
    border: none !important;
}
.summary-conf .tbl3 {
    border-radius: 10px;
    color: #fff;
}
.summary-conf .table > thead:first-child > tr:first-child > th {
    background-color: #008080;
}
.summary-conf .table > tbody > tr > td {
    border-top: none !important;
    border-bottom: none !important;
    padding: 1.3rem 1.5rem;
}
.summary-conf .table > thead {
    border-radius: 10px;
}
.summary-conf .table > thead > tr > th {
    border-radius: 10px;
    padding: 1rem 1.5rem;
}
.summary-conf .tbl4 .col1 {
    border-radius: 10px 0px 0px 10px;
}
.summary-conf .tbl4 .col2 {
    border-radius: 0px 10px 10px 0px;
}
.summary-conf .quote-main-highlight td {
    background-color: #F1F1F1;
}
.summary-conf .quote-main-highlight .col1 {
    border-radius: 10px 0px 0px 10px;
}
.summary-conf .quote-main-highlight .col2 {
    border-radius: 0px 10px 10px 0px;
}
@media only screen and (max-width: 991px) {
    .summary-conf .table > tbody > tr > td {
        border-top: none !important;
        border-bottom: none !important;
        padding: .6rem 1rem;
    }
}
</style>
<div class="summary-conf summary-and-confirmation-slider summary-and-confirmation-motor">
                            <div class="container_">
                                <div class="row mb-5">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="quote-details-summary">
                                            <table class="tbl1" style="border: 0px;">
                                                <tbody>
                                                    <tr>
                                                        <td data-qds-title="1">
                                                            <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Personal Information</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-5">
                                                            Name: &nbsp; {{$full}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-qds-title="1">
                                                            <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Location of Vechicle </h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-5">
                                                            Address: &nbsp; <span style="text-transform: uppercase;">{{$Address}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-qds-title="1">
                                                            <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Contact Information </h4>
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
                                            <table class="tbl2">
                                                <tbody>
                                                    <tr>
                                                        <td data-qds-title="1" colspan="2">
                                                            <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Vehicle Information</h4>
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
                                                        <td colspan="2" class="pb-5">
                                                            Market Value: &nbsp; Php {{$fmvValue}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-qds-title="1" colspan="2">
                                                            <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Coverage</h4>
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
                                    <div class="col-md-5 quote-left">
                                        <div class="summary-and-confirmation">
                                            <table class="table tbl3 bgcolor-primary">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">
                                                            <span class="heading-border text-color-light fs-1-8 rfs-md-1-3">Coverage</span>
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
                                                            <div class="quote-other-details rfs-1">
                                                                <p><span class="ff-semibold">DEDUCTIBLE - {{$deductible}}</span></p>
                                                                <p><em class="rfs-1">Non-standard Accessories (Note all declared accessories not factory installed)</em></p>
                                                                <p><span class="ff-semibold">DISCLAIMER:</span></p>
                                                                <p><em>The above quotation is applicable only for the unit describe and shall be valid
                                                                    up to 30 days from the date of quotation.</em></p>
                                                                <p><em>Undeclared non-standard accessories will not be covered. For your protection please
                                                                    declare all non-standard accessories, it's brand/model and purchase price which
                                                                    shall be subject to approval and additional premium shall be charged.</em></p>
                                                                <br>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-7 quote-left">
                                        <div class="summary-and-confirmation">
                                            <table class="table tbl4">
                                                <thead>
                                                    <tr>
                                                        <th class="col1">
                                                            <span class="heading-border text-color-light fs-1-8 rfs-md-1-3">Premium Computation</span>
                                                        </th>
                                                        <?php if($reqType === "1"){  ?>
                                                        <th class="col2 text-right">
                                                            <span class="heading-border">
                                                                <span class="text-color-light fs-1-8 rfs-md-1-3">Option I w/ AON</span> <span class="text-color-light fs-1-8 rfs-md-1-3 icon-info tooltip-icon"></span>
                                                                <span class="tooltip-woaon tooltip-text">
                                                                    <p><strong>Without Acts of Nature</strong></p>
                                                                    <p>“Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                        unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                        either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                        car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                                </span>
                                                            </span>
                                                        </th>
                                                    <?php }else{ ?>
                                                        <th class="col2 text-right">
                                                            <span class="heading-border">
                                                                <span>
                                                                    <span class="text-color-light fs-1-8 rfs-md-1-3">Option II w/o AON</span> <span class="text-color-light fs-1-8 rfs-md-1-3 icon-info tooltip-icon"></span>
                                                                    <span class="tooltip-woaon tooltip-text">
                                                                        <p><strong>Without Acts of Nature</strong></p>
                                                                        <p>“Acts of Nature” or “AON”, is a term used by car insurance companies to refer to
                                                                            unpredictable, natural catastrophes that can’t be prevented, avoided, or controlled
                                                                            either by preparation or caution. Act of Natuure coverage will help pay for your
                                                                            car’s repairs in case it gets damaged in the aftermath of a catastrophe.</p>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </th>
                                                    <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="quote-main-highlight_">
                                                        <td class="text-color-primary">
                                                            <strong>Net Premium
                                                        </td>
                                                        <td class="text-color-primary text-right">
                                                            <strong>Php {{$finalNetPremium}}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            Plus:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Doc Stamps
                                                        </td>
                                                        <td class="text-right">
                                                            {{$finaldocstamp}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            VAT
                                                        </td>
                                                        <td class="text-right">
                                                            {{$finalVat}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Local Government Tax
                                                        </td>
                                                        <td class="text-right">
                                                            {{$finalLGT}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Gross Premium
                                                        </td>
                                                        <td class="text-right">
                                                            Php {{$finalgross}}
                                                        </td>
                                                    </tr>
                                                    @if($promoType ==="A")
                                                        <tr>
                                                            <td>
                                                                <span>Promo</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <span>- Php {{$promoRate}}</span>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>
                                                                <span>Promo</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <span>-  {{$promoRate}}%</span>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    <tr>
                                                    </tr>
                                                    <tr class="quote-main-highlight">
                                                        <td class="text-color-primary col1">
                                                            <strong>Final Amount Due</strong>
                                                        </td>
                                                        <td class="text-color-primary text-right col2">
                                                            <strong>Php {{$finalTotalDue}}</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 quote-other-details text-color-verydarkgray rfs-1">
                                        <p>
                                            <span class="ff-semibold">Documentary Stamps Tax </span>
                                        </p>
                                        <p><em>Due to BIR implementation of EDST(Electronic Documentary Stamp Tax) system effective
                                            July 1, 2010, policy holders are mandated to pay the DST portion of the premium
                                            once the policy is issued. Refund on DST for cancelled policies is not allowed.</em></p>
                                    </div>
                                </div>

                            </div>

                        </div>


                <div class="col-md-12_ break-two"><br></div>

               <br>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="CBPrivacy" name="CBPrivacy" value="1"  <?php if(old('CBPrivacy')){ echo "checked";} ?> >
                    <label class="form-check-label" for="CBPrivacy"> I AGREE with the <a href="#" data-toggle="modal" data-target="#privacyPolicy" class="text-color-secondary text-decoration-underline"> Privacy Policy</a></label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="CBTerms" name="CBTerms" value="1"  <?php if(old('CBTerms')){ echo "checked";} ?> >
                    <label class="form-check-label" for="CBTerms"> I AGREE to the  <a href="#" data-toggle="modal" data-target="#termsConditions" class="text-color-secondary text-decoration-underline"> Terms & Conditions</a></label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="CBExclusion" name="CBExclusion" value="1"  <?php if(old('CBExclusion')){ echo "checked";} ?> >
                    <label class="form-check-label" for="CBExclusion"> I AGREE with the <a href="#" data-toggle="modal" data-target="#exclusionslimitations" class="text-color-secondary text-decoration-underline"> Exclusion & Limitations</a></label>
                </div>

                <div class="mt-4">
                    <p class="rfs-1-5 rfs-md-1 ff-bold">Before we take you to the payment page, please take time read and understand the Terms & Condition of this website. To continue, just click on the "I AGREE" tick box. Otherwise, click Back Button to cancel the operation or just click your browser's back button</p>
                    <div class="rfs-1 text-color-verydarkgray"><span class="ff-semibold">NOTE:</span> <em><u>Only the Insured and/or his duly authorized representative can register.</u></em></div>
                </div>
                <br><br>
                <!--    <p>Help support our cause in saving the environment! Your donation will help protect Magilas, a critically endangered Philippine Eagle.  <a href="#" data-toggle="modal" data-target="#magilasInfo">Learn more</a>.</p>

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
                    </div> -->

                          <style type="text/css">
                              div.magilas{

                                width: 1px;
                              }
                          </style>
                <div class="col-12 actions quote-btns">
                            <div class="row">
                                <div class="col-12 text-center">
                                   <!--  <input type="submit" id="ComprefourthTabBack"  name="ComprefourthTabBack"  class="btn btn-primary btn-back" value="Back"> -->
                                    <input type="submit"  id="ComprefourthTabBuy"  name="ComprefourthTabBuy"  class="form-control_ btn btn-secondary a-btn-slide-text_ btn-buy_ btn-lg" value="Buy">
                                </div>
                            </div>
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
