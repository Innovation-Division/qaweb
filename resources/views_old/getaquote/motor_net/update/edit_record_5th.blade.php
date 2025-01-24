@extends('layouts.layout1')
@section('content')
@include('getaquote.motor_net.update.motor_header')
<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">

<style type="text/css">
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
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding : 0px;
        margin-left: 0px;
        display: inline;
        border: 0px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        border: 0px;
    }
    .v-error-msg {
        color: #CF3C4B;
        font-size: 15px;
    }
    .has-error .form-control
    {
    border-color: #CF3C4B;
    }
    .bonds_label{
        font-size:20px !important;
    }
</style>

<input type="hidden" name="url" name="url" value="{{url('/')}}">
<div class="container_ b5form">
    <div class="row_">

        <input type="hidden" name="hidURL" id="hidURL" value="{{url('/')}}">

        <form id="car_vehicle_pay" name="car_vehicle_pay" method="POST" action="{{ route('motorController.posttoDragonPay') }}" enctype="multipart/form-data">
            @csrf
        <div class="summary-conf summary-and-confirmation-slider summary-and-confirmation-motor">
        @foreach ( $cocogen_general_info as $motor_pay )
        <input id="transno" name="transno" type="text" value="{{ $motor_pay->transno }}" class="hide">
                <div class="container_">
                    <div class="row mb-5">
                        <div>
                            <button  id='back_4' type='button' class="btn btn-secondary-light back_4" style="min-width: auto;">< Back</button>
                        </div>
                        <div class="col-md-12_ break-two"><br></div>
                        <div class="col-md-12_ break-two"><br></div>

                        <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="quote-details-summary">
                                <table class="tbl1" style="border: 0px;">
                                    <tbody>
                                        <tr>
                                            <td data-qds-title="1">
                                                <span>Quote Number : <span>{{ $cocogen_general_info[0]->quotationNo }}</span><br>
                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Personal Information</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pb-5">
                                                Name: &nbsp; {{ $motor_pay->fullName }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-qds-title="1">
                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Location of Vechicle </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pb-5">
                                                Address: &nbsp; {{ $motor_pay->residenceAddress }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-qds-title="1">
                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Contact Information </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Contact Number: &nbsp;   {{ $motor_pay->contactNo }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Email: &nbsp;  {{ $motor_pay->emailAddress }}
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
                                                Year: &nbsp;    {{ $motor_pay->year }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Brand: &nbsp;  {{ $motor_pay->brand }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Model: &nbsp; {{ $motor_pay->model }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pb-5">
                                                Market Value: &nbsp; Php   {{ $motor_pay->finalAmountDue }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <tr>
                                                <td data-qds-title="1" colspan="2">
                                                    <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Additional Car Information</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    MV File No: {{ $motor_pay->mvFileNo }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    Plate No: &nbsp;  {{ $motor_pay->plateNo }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Engine No: &nbsp; {{ $motor_pay->engineNo }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Color: &nbsp; {{ $motor_pay->color }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Chassis No: &nbsp; {{ $motor_pay->chasisNo }}
                                                </td>
                                            </tr>
                                            @if( $motor_pay->mortgageValue !='')
                                            <tr>
                                                <td>
                                                    Mortgage: &nbsp; {{ $motor_pay->mortgageValue }}
                                                    <input type='hidden' id='check_mortgage' name='checkmortgage' value=' {{ $motor_pay->mortgageValue }}'>
                                                </td>
                                            </tr>
                                            @else
                                            @endif
                                            <br>

                                        <tr>
                                            <td data-qds-title="1" colspan="2">
                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Coverage</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Policy Period: {{ date('F d, Y', strtotime($motor_pay->policyInceptionDate)).'-'. date('F d, Y', strtotime($motor_pay->policyInceptionDate . ' +1 year')) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
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
                                                {{ is_numeric($motor_pay->ownDamage) ? number_format($motor_pay->ownDamage, 2) : $motor_pay->ownDamage }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                B. Bodily Injury
                                            </td>
                                            <td>
                                                {{ is_numeric($motor_pay->bodyInjury) ? number_format($motor_pay->bodyInjury, 2) : $motor_pay->bodyInjury }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                C. Property Damage
                                            </td>
                                            <td>
                                                {{ is_numeric($motor_pay->bodyInjury) ? number_format($motor_pay->bodyInjury, 2) : $motor_pay->bodyInjury }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                D. Auto Personal Accident
                                            </td>
                                            <td>
                                                {{ is_numeric($motor_pay->actOfNatureCompute) ? number_format($motor_pay->actOfNatureCompute, 2) : $motor_pay->actOfNatureCompute }}
                                            </td>
                                        </tr>
                                        @if($motor_pay->actsOfNature='0.005')
                                        <tr>
                                            <td>
                                                E. Acts of Nature
                                            </td>
                                            <td>
                                                {{ is_numeric($motor_pay->valueOfVehicle) ? number_format($motor_pay->valueOfVehicle, 2) : $motor_pay->valueOfVehicle }}
                                            </td>
                                        </tr>
                                        @else
                                        @endif
                                        @if($motor_pay->bodyType !='Truck' || $motor_pay->bodyType !='TRUCK')
                                        <tr>
                                            <td>
                                               F. Riot, Strike and Civil Commotion
                                            </td>
                                            <td>
                                                {{ is_numeric($motor_pay->valueOfVehicle) ? number_format($motor_pay->valueOfVehicle, 2) : $motor_pay->valueOfVehicle }}
                                            </td>
                                        </tr>
                                        @else
                                        @endif
                                        <tr>
                                            <td colspan="2">
                                                <div class="quote-other-details rfs-1">
                                                    <p><span class="ff-semibold">DEDUCTIBLE -  {{$motor_pay->deduction}}
                                                    </span></p>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="quote-main-highlight_">
                                            <td class="text-color-primary">
                                                <strong>Net Premium
                                            </td>
                                            <td class="text-color-primary text-right">
                                                {{-- <strong> {{ number_format($motor_pay->basePremium),2 }}</strong> --}}
                                                <strong>  {{ is_numeric($motor_pay->basePremium) ? number_format($motor_pay->basePremium, 2) : $motor_pay->basePremium }} </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Doc Stamps
                                            </td>
                                            <td class="text-right">
                                                {{ is_numeric($motor_pay->docStamps) ? number_format($motor_pay->docStamps, 2) : $motor_pay->docStamps }}
                                                <strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                VAT
                                            </td>
                                            <td class="text-right">
                                                {{ is_numeric($motor_pay->vat) ? number_format($motor_pay->vat, 2) : $motor_pay->vat }}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Local Government Tax
                                            </td>
                                            <td class="text-right">
                                                {{ is_numeric($motor_pay->localGovernmentTax) ? number_format($motor_pay->localGovernmentTax, 2) : $motor_pay->localGovernmentTax }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Gross Premium
                                            </td>
                                            <td class="text-right">
                                                {{-- {{ number_format($motor_pay->grossPremium),2 }} --}}
                                                {{ is_numeric($motor_pay->grossPremium) ? number_format($motor_pay->grossPremium, 2) : $motor_pay->grossPremium }}
                                            </td>
                                        </tr>

                                        <tr>
                                        </tr>
                                        <tr class="quote-main-highlight">
                                            <td class="text-color-primary col1">
                                                <strong>Final Amount Due</strong>
                                            </td>
                                            <td class="text-color-primary text-right col2">
                                                {{-- <strong>  {{ number_format($motor_pay->finalAmountDue),2 }}</strong> --}}
                                                {{ is_numeric($motor_pay->finalAmountDue) ? number_format($motor_pay->finalAmountDue, 2) : $motor_pay->finalAmountDue }}
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
    <span id='checkfirst'></span>
    <div class="mt-4">
        <p class="rfs-1-5 rfs-md-1 ff-bold">Before we take you to the payment page, please take time read and understand the Terms & Condition of this website. To continue, just click on the "I AGREE" tick box. Otherwise, click Back Button to cancel the operation or just click your browser's back button</p>
        <div class="rfs-1 text-color-verydarkgray"><span class="ff-semibold">NOTE:</span> <em><u>Only the Insured and/or his duly authorized representative can register.</u></em></div>
    </div>
    <br><br>



    </div>
        <div class="col-md-12_ break-two"> <br> </div>
        <div  class="col-md-12">

        <div class="text-center mt-4">
            <input type="button" id="postpolicy"  name="postpolicy"  class="btn btn-primary btn-save" value="Post Policy">
            <input type='button' class='btn btn-primary' id='pdfview' onclick="generatePDF()" value='View PDF'></input>
            <input type="button" id="save_last"  name="save_last"  class="btn btn-primary btn-save" value="Send Policy">
            <input type='button' class='btn btn-primary' id='pdfviewbank' onclick="generatePDFBank()" value='View Bank Certificate'></input>

            <!-- <input type="submit" id="proceed" name="paynow" class="form-control_ btn btn-lg_ btn-secondary a-btn-slide-text_ btn-buy" value="Pay Now"> -->
            <!-- <input type="button" id="ViewQuote"  name="ViewQuote"  class="btn btn-primary a-btn-slide-text btn-buy" onclick="location.href='http://cocogentest.cocogen.com.ph/DragonPay/'" value="Buy"> -->
            <!--   <input type="submit" id="CompreFirstTab"  name="CompreFirstTab" class="btn btn-primary a-btn-slide-text btn-buy"    value="Next"> -->
          </div>
          @endforeach
        </form>
        <div class="progress mt-5 p-0">
            <div class="progress-bar" style="width: 100%;"></div>
        </div>
    </div>
</div>
    @include('getaquote.motor_net.update.otherline_motor')

</div>
</div>
</div>
</div>
</div>



<style type="text/css">
/* .modal {
text-align: center;
top:30%;
} */
.hide {
display: none;
}
#homepagediv{
margin-top: 150px;
margin-bottom: 220px;
}


@media screen and (min-width: 768px) {
/* .modal:before {
display: inline-block;
vertical-align: middle;
content: " ";
height: 100%;
} */
}

/* .modal-dialog {
display: inline-block;
text-align: left;
vertical-align: middle;
} */

#btnnewApplication,
#btnRenewal{
min-width: 267px;
margin-left: 20px;
min-height: 60px;
background-color: #C0C0C0;
color: #000000;
margin-top: 20px;
}


#btnnewApplication:hover {
background-color: #4CAF50; /* Green */
color: white;
}

#btnRenewal:hover {
background-color: #4CAF50; /* Green */
color: white;
}


@media only screen and (max-width: 800px) {
#homepagediv{
margin-top: 10px;
margin-bottom: 30px;
}

}
</style>

<div class="summary-and-confirmation-slider summary-and-confirmation-motor">
    <div class="modal fade bs-example-modal-lg modal-light" id="privacyPolicy" tabindex="-1" role="dialog" aria-labelledby="privacyPolicy" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="privacyPolicy">Privacy Policy</h4>
                </div>
                <div class="modal-body">
                    <h4 class="rfs-2-5 rfs-md-1-3">Declaration and Consent</h4>
                    <p>I hereby apply for insurance as set out in the above application form and declare, to the best of my knowledge and belief, that the foregoing statements and particulars are true and complete. I hereby agree to notify Cocogen of any material change in the information as stated above. </p>

                    <p>I hereby certify that I voluntarily and expressly consent to the collection, processing, sharing, storing of my personal and/or sensitive information by Cocogen for the purpose/s necessary in processing my insurance policy and in any related transactions and/or in other purposes as stated in the Data Privacy Statement of Cocogen or in www.cocogen.com/data-privacy. I hereby certify that I carefully understood the terms above before giving my consent. </p>

                    <h4 class="rfs-2-5 rfs-md-1-3">Privacy Policy</h4>
                    <p>We, Cocogen, upholds an individual’s data privacy rights and assures that all your personal information, sensitive personal information and privileged information (collectively, “Personal Data”), collected and to be collected, are processed in compliance to the Data Privacy Act of 2012 (RA No. 10173 and its Implementing Rules and Regulations (IRR). </p>

                    <p>This Privacy Policy provides information on how we collect, use, manage and secure your personal information necessary to serve you better. Any information you provide to us indicates your express consent to the content of our Privacy Policy. </p>

                    <p><span class="text-color-primary"><strong>Collection of Personal Data</strong> </span>: We collect the following personal data from you when you apply for our insurance products and services such as your: </p>

                    <ul>
                    <li>Name, birth date, place of birth, sex, nationality;</li>
                    <li>Address (permanent and present addresses);</li>
                    <li>Contract number or information (email address, telephone number and mobile number);</li>
                    <li>PhilID or Government ID information (Passport, SSS or GSIS ID, driver’s license, postal ID); and </li>
                    <li>Source of funds or property and occupation. </li>
                    </ul>

                    <p>When you provide information other than yours, you undertake that you properly obtained their consent. You also certify that all personal data you submit is accurate, complete and up-to-date.</p>

                    <p>We may collect this information when you submit your application personally or through our distribution partners, insurance agents and brokers or when you call us, visit our websites and social media advertisements, submit to us as part your application and claims requirements; and, information that we gather from third-parties such as but not limited to subsidiaries, reinsurers, business partners.</p>

                    <p><strong>Use</strong>: The collected personal data shall be used to process your transactions (e.g. insurance quotations and applications, policy issuance, claims servicing, premium payments); communicate and respond to your request; send your statements billings and notices for your insurance coverage; serve as a reference for promotional information regarding our products; conduct surveys and inform through phone, mail, email, SMS or other communication facility in order to help us take better care of your insurance needs and allow us improve our products and services for you; comply with the directives issued by regulatory bodies; assist the Company in risk management, identity and claim verification and prevent and detect fraud; and, perform any other actions as may be necessary to implement the terms and conditions of our contract.</p>

                    <p>We may disclose and share your personal data to the following: </p>

                    <ul>
                    <li>Our employee handling your account and requests;</li>
                    <li>Our subsidiaries, affiliates and third-party service providers performing financial,administrative technical and other ancillary services;</li>
                    <li>Banks for bancassurance transactions, reinsurance partners and professional advisers performing due diligence checks;</li>
                    <li>Marketing intermediaries, agents, brokers and distributors;</li>
                    <li>Government institution and other competent authorities which by law, rules or regulations requires us to disclose.</li>
                    <li>Claim investigation companies, loss adjusters, assessors/claims investigators, suppliers, repairers;</li>
                    <li>Person or entity that we contractually entered with that ensures the confidentiality standard we implement and adhere to the DPA.</li>
                    <li>Any person that fall within matters of public concern, in order to carry out functions of public authority only to the extent of collection andfurther processing consistent with a constitutionally or statutorily mandated function pertaining to law enforcement, taxation and other regulatory function.</li>
                    </ul>

                    <p>Thus, as a rule, Cocogen is not allowed to share your personal data to third party. However, by giving your consent, you authorize Cocogen to disclose your personal data to the aforementioned individuals and entities that is necessary for the proper execution of processes related to the declared purposes in this Privacy Policy and Consent and may not use it for any other purpose.</p>

                    <p><span class="text-color-primary"><strong>Protection Measures</strong> </span>: To maintain the integrity and confidentiality of your personal data, we have implemented measures to secure and protect it from theft, loss, penetration or breach. We put in place organizational, physical and technical security measures necessary to protect your personal information. We will retain your personal data for as long as necessary to fulfill the purposes of your transactions with the Company, unless a longer period is allowed or required by law. After which physical records shall be disposed of through shredding while digital files shall be anonymized.</p>

                    <p><span class="text-color-primary"><strong>Contact Us</strong> </span>: To exercise your rights under the DPA which include right to erase, block, modify and object to processing your personal data or should you have any inquiries or concerns on this Privacy Policy and Consent and/or complaints, you may contact our Data Protection Officer at:</p>

                    <p>
                    <strong>Cocogen Data Protection Officer</strong><br>
                    <strong>Address</strong>: 22F One Corporate Center,<br>
                    Doña Julia Vargas Avenue corner <br>
                    Meralco Avenue, Ortigas Center, Pasig City <br>
                    <strong>E-mail</strong>: dpo@cocogen.com
                    </p>

                    <p>Kindly browse through our Privacy Policy at <a href="www.cocogen.com" class="text-color-primary" target="_blank">www.cocogen.com</a>  to know more on how we protect your personal data.</p>

                    <h4 class="rfs-2-5 rfs-md-1-3">Data Privacy Consent</h4>

                    <p>I hereby certify that I explicitly and unambiguously consent to the collection, processing, sharing, storing of my/our personal data by Cocogen for the purposes/s described in this Privacy Policy. I hereby certify that I carefully understood and comprehend the terms above before giving our consent. I further acknowledge that I have acquired the consent from all parties relevant to this consent and hold free and harmless Cocogen from any complaint, suit or damages which any party may file or claim in relation to my consent.</p>

                    <p><strong>Important: Section 251 of the Insurance Code, as amended, imposes a fine not exceeding twice the amount claimed and/or imprisonment of 2 years, or both, at the discretion of the court, to any person who presents or causes to be presented any fraudulent claim for the payment of a loss under a contract of insurance, and who fraudulently prepares, makes or subscribes any writing with intent to present or use the same, or to allow it to be presented in support of any claim.</strong></p>
                </div>
                <div class="modal-footer text-center">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg modal-light" id="termsConditions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="termsConditions">Terms and Conditions</h4>
                </div>
                <div class="modal-body">
                    <p><span>The Cocogen Insurance, Inc. website, e-mail newsletters, and mobile services, and any and all materials contained therein, are information services provided by Cocogen, the use of which shall be subject to the following terms and conditions.</span></p>
                    <p><span>By accessing the Cocogen information services and their content, you acknowledge and agree that you have read and understood the following terms and conditions and agree to be bound by them.</span></p>
                    <p><span>As used below, the terms “we”, “us”, and “our” refer to Cocogen.</span></p>
                    <ol>
                        <li><span><strong>CONTENT</strong></span>
                            <p><span>Cocogen information services are available for information purposes only. The publication and posting of any content and access to any of the Cocogen information services do not constitute, either explicitly or implicitly, any provision of services or products by us. Information concerning Cocogen products or services is only available from the relevant Cocogen companies</span></p>
                        </li>
                        <li><span><strong>NO OFFER</strong></span>
                            <p><span>No information contained in this website or in any of Cocogen information services should be construed as an offer or a solicitation for an offer, as a statement of law, or as counsel on investment, legal, tax, or other matters. In case of any ambiguity or doubts in the information in Cocogen’s website, you are advised to verify or check with us or seek appropriate professional or legal advice.</span></p>
                        </li>
                        <li><span><strong>NO DUTY TO UPDATE</strong></span>
                            <p><span>We reserve the right to update, modify, revise and change all the contents of our website and other Cocogen information services. We are not obliged to notify you of any changes made on our Terms and Conditions. However, we will endeavor to regularly update the contents of the website and other Cocogen information services.</span></p>
                            <p><span>Your continuous access to website following any change in the website signifies that you agree to be bound by the Terms and Conditions, as revised.</span></p>
                        </li>
                        <li><span><strong>COPYRIGHT AND TRADEMARKS</strong></span>
                            <p><span>All information, photographs, service marks, logos, artworks and all other contents of the website and other Cocogen information services are owned, controlled or licensed by or to Cocogen or its third party licensors, and are protected by intellectual property laws.</span></p>
                            <p><span>The limited use, copying and distribution without alteration of any of the materials and information contained in the Cocogen website and other Cocogen information services and the use of said materials and information shall be allowed for non-commercial purposes only: provided that all copyright and other proprietary notices shall appear in all copies of the materials and the information in the same manner as the original. The use of the materials for all other purposes is prohibited.</span></p>
                            <p><span>You shall not use any portion of this website, or any other intellectual property of Cocogen, including but not limited to its service marks, on any other website, in the source code of any other website, or in any other printed or electronic materials without the prior written consent of Cocogen. You shall not modify, publish, reproduce, republish, create derivative works, copy, upload, post, transmit, distribute, or otherwise use any of the Cocogen information services’ contents or frame the Cocogen website within any other website without prior written consent of Cocogen. Systematic retrieval of data from this website to create or compile, directly or indirectly, a collection, compilation, database or directory, without prior written consent from Cocogen, is prohibited. Linking from another website to any page in this website is strictly prohibited without prior written consent of Cocogen.</span></p>
                        </li>
                        <li><span><strong>NO WARRANTY</strong></span>
                            <p><span>All contents on any and all Cocogen information services, including, but not limited to, graphics, text, and hyperlinks or references to other sites, are subject to change without prior notice and without warranty of any kind, express or implied, including, but not limited to, sustainability for a particular purpose, non-infringement and freedom of rights of third parties.</span></p>
                            <p><span>We do not guarantee the adequacy, accuracy, reliability or completeness of any information provided by the Cocogen information services and expressly disavow any liability for errors or omissions therein. The user is responsible for the assessment of the information’s adequacy, accuracy, reliability, and completeness.</span></p>
                            <p><span>We do not guarantee that the functions of the Cocogen information services will be uninterrupted and/or error-free, and that the defects and errors will be corrected or that the Cocogen information services or the servers that make them available are free from computer viruses or other harmful components.</span></p>
                            <p><span>Should your machine which includes but is not limited to your desktop, laptop, or smartphone, be infected by such viruses while using Cocogen information services, you shall assume the entire cost of all necessary servicing, repairs, or corrections.</span></p>
                        </li>
                        <li><span><strong>HYPERLINKED AND REFERENCED WEBSITES</strong></span>
                            <p><span>Certain hyperlinks or referenced websites in the Cocogen information services may take you to third-party websites and we do not guarantee the adequacy, accuracy, reliability, or completeness of any information on hyperlinked or referenced websites. We disclaim any liability for any and all of the contents of said hyperlinked or reference websites.</span></p>
                            <p><span>The hyperlinks to other websites are offered for your convenience only. Their presence in our website does not imply that we endorse such websites or that products or services that are described therein are our own. We likewise do not guarantee the correctness and accuracy of the information in said hyperlinked websites.</span></p>
                            <p><span>We remind you that different terms and conditions will apply for your use of such websites and that your access to third-party websites is entirely at your risk.</span></p>
                        </li>
                        <li><span><strong>CONFIDENTIALITY OF INFORMATION</strong></span>
                            <p><span>By using the Cocogen information services, you agree, understand, and confirm that the any and all information, including your credit or debit card details, you provide to access Cocogen information services or to availing of our any of the services in said services are owned by you or that you have lawful authority to use said information.</span></p>
                            <p><span>We commit that we will not disclose, utilize, and share the said information to any third parties unless required by law, regulation or court order.</span></p>
                            <p><span>We, as a merchant, shall be under no liability whatsoever in respect of any loss or damage resulting directly or indirectly from the decline of authorization by the card issuer for any transaction on account of the cardholder having exceeded the limit mutually agreed by us with our acquiring bank from time to time.</span></p>
                        </li>
                        <li><span><strong>REFUND AND CANCELLATIONS</strong></span>
                            <p><span>For concerns regarding refunds and cancellation of policies, please free to contact our Client Services Center via phone at 8830-6000 or via email at client_services@cocogen.com. Please be informed that cancellations will be subject to the specific terms and conditions of the policy sought to be canceled.</span></p>
                        </li>
                        <li><span><strong>LOCAL LEGAL RESTRICTIONS</strong></span>
                            <p><span>Any information appearing on this website is provided in accordance with and subject to the laws of the Republic of the Philippines.</span></p>
                            <p><span>Cocogen information services are not intended for any person in any jurisdiction where (by virtue of that person’s nationality, residence or otherwise) the publication or availability of Cocogen information services is prohibited. Persons to whom such prohibition applies may not access the Cocogen information services.</span></p>
                        </li>
                        <li>
                            <strong><span>RESERVATION OF RIGHTS</span></strong>
                            <p><span>We reserve the right to change, modify, add to, or remove sections of these terms of use at any time.</span></p>
                        </li>
                        <li>
                            <p><strong><span>GOVERNING LAW AND DISPUTE RESOLUTION</span></strong></p>
                            <p><span>You agree that all matters relating to your use and access of all Cocogen information services shall be governed by the laws of the Republic of the Philippines. Any dispute, controversy or claim arising out of or relating to this Terms and Conditions, or the breach, termination or invalidity thereof shall be settled by arbitration in accordance with the PDRCI Arbitration Rules as at present in force.</span></p>
                        </li>
                        <li>
                            <p><strong><span>ENTIRE AGREEMENT</span></strong></p>
                            <p><span>This Agreement constitutes the entire agreement between you and Cocogen with respect to your access and/or use of this website.</span></p>
                        </li>
                    </ol>
                </div>
                <div class="modal-footer text-center">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg modal-light" id="exclusionslimitations" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="exclusionslimitations">Exclusions and Limitations</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <p><span>Only the vehicle owner and/or his duly authorized representative can register.</span></p>
                        </li>
                        <li>
                            <p><span>The vehicle being insured has not been involved in any vehicular accident and has not been flooded/damaged in any manner as of the time of the insurance of this policy.</span></p>
                        </li>
                        <li>
                            <p><span>Any damages prior to the issuance of this policy shall not be compensable. This declaration is under the penalty of perjury.</span></p>
                        </li>
                        <li>
                            <p><span>The vehicle for insurance cover is not used to carry fare-paying passengers (Grab or Rent-a-car).</span></p>
                        </li>
                        <li>
                            <p><span>If the vehicle is under financing with assumed balance, it cannot be covered due to no insurable interest.</span></p>
                        </li>
                        <li>
                            <p><span>All undeclared accessories are not covered under this policy.</span></p>
                        </li>
                        <li>
                            <p><span>The vehicle being insured is not under auto-renewal of insurance with the financing bank.</span></p>
                        </li>
                        <li>
                            <p><span>The vehicle being insured does not have an existing Direct Link or Cocogen Insurance policy.</span></p>
                        </li>
                        <li><p><span>All Mortgaged vehicles are required to purchase AON coverage.</span></p></li>
                        <li><p><span>Vehicle can only be used in the Republic of the Philippines.</span></p></li>
                        <li><p><span>Only authorized drivers can drive the vehicle.</span></p></li>
                        <li><p><span>There is no cover, whilst onboard a sea vessel on inter-island transit.</span></p></li>
                    </ul>
                </div>
                <div class="modal-footer text-center">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                </div>
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
</div>

<!-- Small modal -->
<button type="button" data-toggle="modal" data-target=".bd-example-modal-sm" id='showSendMail' style="display: none;"></button>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #008080;color: white;">
            <p class="modal-title" style='color:white"'>Notification</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="background-color:white;color:black">
            <p>Email Already Sent</p>
          </div>
          <div class="modal-footer" style="background-color:white;color:black">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
<section class="divider">
<img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
<script>
$(window).on('load', function() {
 jQuery('#save_last').hide();
jQuery('#pdfview').hide();
jQuery('#pdfviewbank').hide();
jQuery('#ComprefourthTabBuy').hide();
    // Retrieve the URI ID from the window location
    var transno = window.location.pathname.split('/').pop();
    $('#transno').val(transno);
    // Send an AJAX request to the controller
    $.ajax({
        url: "{{ route('motorController.check_disable', ['id' => ':id']) }}".replace(':id', transno),
        method: 'GET',
        success: function(response) {
            // Handle the response from the controller
            // Perform actions based on the response
            // if (response.status == 1) {
            //     // Value contains "disabled all"
            //     // Perform corresponding actions
            //     $('#CBPrivacy,#CBTerms,#CBExclusion').prop('disabled', true);
            //     $('#CBPrivacy,#CBTerms,#CBExclusion').prop('checked', true);
            // } else {
            //     // Value does not contain "disabled all"
            //     // Perform other actions if needed
            // }

            if (response.stat == 'Paid' && response.stat == 'Pending' ) {
                $('#proceed').hide();
            }else{

                $('#proceed').show();
            }
        }
    });
});



function generatePDF() {
if ($("#CBPrivacy").prop('checked') != true) {
    message = "Please accept our Privacy Policy before proceeding to payment.";
}

if ($("#CBTerms").prop('checked') != true) {
    message = "Please accept our Terms & Conditions before proceeding to payment.";
}

if ($("#CBExclusion").prop('checked') != true) {
    message = "Please accept our Exclusion & Limitations before proceeding to payment.";
}

if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

    $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

    return false;
}
// Disable all
$('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #chckquote_agree, #mvfileno, #plateno, #engineno, #color, #conduction, #chasis, #policyincept, #morgagee, #gender_personal_info, #birthDate, #place_of_birth_other_personal_info, #nationality_other_personal_info, #occupation, #telNo, #type_of_id_personal_info, #idno_other_personal_info, #residence_address, #mailing_province').prop('readonly', true);
  $('#file-upload').prop('readonly', true);
    var transno =$("input[name='transno']").val();
    var url = "{{ url('get-policy-quote/viewpdf', 'transno') }}".replace('transno', transno);
    // Open the URL in a new window or tab
    window.open(url);
}

$(document).ready(function() {
  $('#back_4').on('click', function() {
    var transno = $('#transno').val(); // Assuming the transno value is retrieved from an input field with the id "transno"
    var url = "{{ route('record_motor_other', ['id' => ':transno']) }}";
    url = url.replace(':transno', transno);
    window.location.href = url;
  });
});

function generatePDFBank() {

if ($("#CBPrivacy").prop('checked') != true) {
    message = "Please accept our Privacy Policy before proceeding to payment.";
}

if ($("#CBTerms").prop('checked') != true) {
    message = "Please accept our Terms & Conditions before proceeding to payment.";
}

if ($("#CBExclusion").prop('checked') != true) {
    message = "Please accept our Exclusion & Limitations before proceeding to payment.";
}

if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

    $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

    return false;
}
// Disable all
$('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #chckquote_agree, #mvfileno, #plateno, #engineno, #color, #conduction, #chasis, #policyincept, #morgagee, #gender_personal_info, #birthDate, #place_of_birth_other_personal_info, #nationality_other_personal_info, #occupation, #telNo, #type_of_id_personal_info, #idno_other_personal_info, #residence_address, #mailing_province').prop('readonly', true);
  $('#file-upload').prop('readonly', true);


    var transno =$("input[name='transno']").val();

    var url = "{{ url('get-policy-quote/viewpdf/bankcert', 'transno') }}".replace('transno', transno);

    // Open the URL in a new window or tab
    window.open(url);
}

$(document).ready(function() {
  $('#back_4').on('click', function() {
    var transno = $('#transno').val(); // Assuming the transno value is retrieved from an input field with the id "transno"
    var url = "{{ route('record_motor_other', ['id' => ':transno']) }}";
    url = url.replace(':transno', transno);
    window.location.href = url;
  });
});


  $(document).ready(function() {
    $('#car_vehicle_pay').submit(function(event) {
      var message = "";

      if (!$('#CBPrivacy').prop('checked')) {
        message += "Please accept our Privacy Policy before proceeding to payment. ";
      }

      if (!$('#CBTerms').prop('checked')) {
        message += "Please accept our Terms & Conditions before proceeding to payment. ";
      }

      if (!$('#CBExclusion').prop('checked')) {
        message += "Please accept our Exclusion & Limitations before proceeding to payment.";
      }

      if (message !== "") {
        event.preventDefault(); // Prevent form submission if any checkbox is not checked
        $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>" + message + "</div>");
      }
    });
  });


$('#check_payment').hide();

$('#save_last').click(function(e){
      e.preventDefault();
      jQuery.noConflict();
      jQuery('#check_payment').hide();
      var transno = $("input[name='transno']").val();
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      var message = "";


  if ($("#CBPrivacy").prop('checked') != true) {
      message = "Please accept our Privacy Policy before proceeding to payment.";
  }

  if ($("#CBTerms").prop('checked') != true) {
      message = "Please accept our Terms & Conditions before proceeding to payment.";
  }

  if ($("#CBExclusion").prop('checked') != true) {
      message = "Please accept our Exclusion & Limitations before proceeding to payment.";
  }

  if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

      $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

      return false;
  }
     $.ajax({
        type:'GET',
          url: "{{ url('/get-policy-quote/viewpdf/sendmailwithattachement') }}/" + transno,
          data: $('#car_vehicle_pay').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
          dataType: 'json',
         success: (response) => {

                  $('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #chckquote_agree, #mvfileno, #plateno, #engineno, #color, #conduction, #chasis, #policyincept, #morgagee, #gender_personal_info, #birthDate, #place_of_birth_other_personal_info, #nationality_other_personal_info, #occupation, #telNo, #type_of_id_personal_info, #idno_other_personal_info, #residence_address, #mailing_province').prop('readonly', true);
                    $('#file-upload').prop('readonly', true);
                  $("select, input[type='checkbox'],#fader").prop("disabled", true);
                  $(".a-btn-slide-text").css("pointer-events", "none");
                  $("#file-upload").css("display", "none");
                  // $('#check_disable').val('1');
                  $('#check_disable').val('1');

                  $('#showSendMail').trigger('click');
                  console.log('cocogen.com send email');

          },
          error: function(response){

          console.log('cocogen.com');

        }
     });

});


$('#postpolicy').click(function(e){
        e.preventDefault();
        jQuery.noConflict();
        jQuery('#check_payment').hide();
        var transno;
        if ($("input[name='transno']").val() !== "") {
            transno = $("input[name='transno']").val();
        } else {
            transno = $("input[name='encrpyttransno']").val();
        }

        var csrf_token = $('meta[name="csrf-token"]').attr('content');
    	var message = "";


    if ($("#CBPrivacy").prop('checked') != true) {
        message = "Please accept our Privacy Policy before proceeding to payment.";
    }

    if ($("#CBTerms").prop('checked') != true) {
        message = "Please accept our Terms & Conditions before proceeding to payment.";
    }

    if ($("#CBExclusion").prop('checked') != true) {
        message = "Please accept our Exclusion & Limitations before proceeding to payment.";
    }

    if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

        $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

        return false;
    }
       $.ajax({
          type:'POST',
            url: "{{ url('/get-policy-quote/vehicle/postpolicy') }}/" + transno,
            data: $('#car_vehicle_pay').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
            dataType: 'json',
           success: (response) => {

                jQuery('#save_last').show();
                jQuery('#pdfview').show();

                if (typeof $('#check_mortgage').val() !== 'undefined' && $('#check_mortgage').val() !== '') {
                    jQuery('#pdfviewbank').show();
                } else {
                    jQuery('#pdfviewbank').hide();
                }


                jQuery('#ComprefourthTabBuy').hide();
                jQuery('#postpolicy').hide();
                console.log('cocogen.com post');

            },
            error: function(response){

            console.log('cocogen.com');

          }
       });

  });
</script>
</script>
@endsection
