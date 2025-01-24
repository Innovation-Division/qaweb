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
     <form id="car_vehicle_summary" name="car_vehicle_summary" method="post" enctype="multipart/form-data">
    <div class="quote-results rfs-1-5 rfs-md-1">
        <div class="container_">
            <div class="row">
                <div class="col-md-12 summary-table-wrapper">
                    <span>Quote Number : <span id="quotenumber3"></span><br>
                    <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Quote Summary</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 quote-right">
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
                                                Year: &nbsp;<span id='yearinfo'></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Brand: &nbsp;<span id='brandinfo'></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Model: &nbsp;<span id='displayModel'></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Market Value: &nbsp; Php <span id='marketval'></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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

                                            <tr class="quote-main-highlight" >
                                                <td class="text-color-primary">
                                                    <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Base Premium</strong>
                                                </td>
                                                <td class="text-right text-color-primary">
                                                </td>
                                                <td class="text-right text-color-primary">
                                                    <strong class="rfs-1-8 rfs-md-1-1 ff-semibold"> <span id='base_format_label'></span> </strong>
                                                </td>
                                            </tr>
                                            <tr class="quote-main-highlight">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Doc Stamps
                                                </td>
                                                <td class="text-right">
                                                </td>
                                                <td class="text-right">
                                                   <span id='doc_format_label'></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    VAT
                                                </td>
                                                <td class="text-right">
                                                </td>
                                                <td class="text-right">
                                                    <span id='vat_format_label'></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-hl">
                                                    Local Government Tax
                                                </td>
                                                <td class="border-hl text-right">
                                                </td>
                                                <td class="border-hl text-right">
                                                    <span id='local_format_label'></span>
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
                                                </td>
                                                <td class="text-color-primary text-right border-hl">
                                                <strong class="rfs-1-8 rfs-md-1-1 ff-semibold"> <span id='gross_format_label'></span></strong>
                                                </td>
                                            </tr>
                                            {{-- @if($promoRate)

                                            @if($promoType ==="A")
                                                    <tr >
                                                        <td><span>Promo</span>
                                                        </td>
                                                        <td class="text-right">- Php
                                                        </td>
                                                        <td class="text-right">- Php
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
                                                @endif --}}



                                            <tr class="quote-main-highlight">
                                                <td class="border-hl text-color-primary">
                                                    <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Final Amount Due</strong>
                                                </td>
                                                <td class="border-hl text-right text-color-primary">

                                                </td>
                                                <td class="border-hl text-right text-color-primary">
                                                    <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">  <span id='final_format_label'></span></strong>
                                                </td>
                                            </tr>
                                            {{-- @endif --}}
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

                                                <td data-qds-title="2" style="min-width: 350px;" class="text-right">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Own Damage and Theft
                                                </td>
                                                <td class="text-right">
                                                </td>
                                                <td class="text-right">
                                                    <span id='owndamage_coverage_label'></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bodily Injury
                                                </td>
                                                <td class="text-right">
                                                </td>
                                                <td class="text-right">
                                                    <span id='bodyInjury_PropertyDamage_coverage_label_first'></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Property Damage
                                                </td>
                                                <td class="text-right">
                                                </td>
                                                <td class="text-right">
                                                    <span id='bodyInjury_PropertyDamage_coverage_label_second'></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Auto Personal Accident
                                                </td>
                                                <td class="text-right">

                                                </td>
                                                <td class="text-right">
                                                    <span id='perseat_coverage_label1'></span>
                                                </td>
                                            </tr>
                                            <tr id ='aon_hide_summary'>
                                                <td>
                                                    Acts of Nature
                                                </td>
                                                <td class="text-right">
                                                </td>
                                                <td class="text-right">
                                                    <span id='aon_coverage_label1'></span>
                                                </td>
                                            </tr>

                                            <tr id='car_body_type'>
                                                <td>
                                                Riot, Strike and Civil Commotion
                                                </td>
                                                <td class="text-right">
                                                </td>
                                                <td class="text-right">
                                                <span id='aon_coverage_label_riot1'></span>
                                                </td>
                                            </tr>

                                      
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="quote-deduct-summary">
                                <div class="quote-other-details text-color-verydarkgray rfs-1">
                                    <p class="mb-3"><strong>Deductible <span id='deduct_coverage_label'></span></strong></p>
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

                        </div>
                    </div>
                </div>
            </div>

                <input type="hidden" id="aon_coverage" name="aon_coverage" value=" ">
                <input type="hidden" id="owndamage_coverage" name="owndamage_coverage" value="">
                <input type="hidden" id="perseat_coverage" name="perseat_coverage" value="">
                <input type="hidden" id="deduct_coverage" name="deduct_coverage" value="">

                <!-- Premium Computation -->
                <input type="hidden" id="base_format" name="base_format" value="">
                <input type="hidden" id="doc_format" name="doc_format" value="">
                <input type="hidden" id="final_format" name="final_format" value="">
                <input type="hidden" id="fire_format" name="fire_format" value="">
                <input type="hidden" id="gross_format" name="gross_format" value="">
                <input type="hidden" id="local_format" name="local_format" value="">
                <input type="hidden" id="vat_format" name="vat_format" value="">
                <input type="hidden" id='autoPersonalAccident' name="autoPersonalAccident"  value="">
                <input type='hidden' name='check_disable' id='check_disable3'>
                <input type='hidden' name='checkvalidate' id='checkvalidate'>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12 actions quote-btns">
                        <div class="form-check">
                            <input type="checkbox" id="chckquote_agree" name="chckquote_agree" value="1" class="form-check-input"  >
                            <label for="chckquote_agree" class="form-check-label"> I have read and understand the above information/coverages</label>
                        </div>
                        <span id='acceptSummarycheck'></span>
                    </div>
                    <div class="col-md-12 actions quote-btns mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" id="send_mail"  name="send_mail"  class="btn btn-primary btn-back" value="Send Email Quote">
                                <input type="submit" id="save_summary" name="save_summary" class="form-control_ btn btn-secondary btn-lg" value="Save">
                                <input type="button" id="proceed" name="proceed" class="form-control_ btn btn-secondary btn-lg" value="Proceed to Issuance"  >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
 