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

    <form id="car_vehicle_pay" name="car_vehicle_pay" method="POST" action="{{ route('motorController.posttoDragonPay') }}" enctype="multipart/form-data">
                @csrf
            <input type='hidden' name='encrpyttransno' id='encrpyttransno' >
            <input type='hidden' name='transno_last' id='transno_last' >
                        <div class="summary-conf summary-and-confirmation-slider summary-and-confirmation-motor">
                            <div class="col-md-12">
                                <div id='check_payment'>
                                    <div class="alert alert-success" id="monitoring_payment">
                                        <span id="good_payment"></span>
                                    </div>
                                    <div class="alert alert-danger d-none" id="monitoring_failed">
                                            <span id="bad_payment"></span>
                                    </div>
                                </div>
                        </div>
                                <div class="container_">
                                    <div class="row mb-5">
                                        <div class="col-md-6 col-sm-12">

                                            <div class="quote-details-summary">
                                                <table class="tbl1" style="border: 0px;">
                                                    <tbody>
                                                        <tr>
                                                            <td data-qds-title="1">
                                                                <span>Quote Number : <span id="quotenumber5"></span><br>
                                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Personal Information</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pb-5">
                                                                Name: &nbsp; <span id='fullname_personal'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-qds-title="1">
                                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Location of Vechicle </h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pb-5">
                                                                Address: &nbsp; <span style="text-transform: uppercase;" id='address_personal_check'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-qds-title="1">
                                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Contact Information </h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Contact Number: &nbsp;  <span id='contactNo_personal'></span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Email: &nbsp;  <span id='emailadd_personal_check'></span>
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
                                                                Year: &nbsp;  <span id='year_info_vehicle'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Brand: &nbsp; <span id='brand_info_vehicle'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Model: &nbsp; <span id='model_info_vehicle'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="pb-5">
                                                                Market Value: &nbsp; Php  <span id='marketval_info_vehicle'></span>
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
                                                                    MV File No: <span id='mvfileno_final'></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    Plate No: &nbsp;  <span id='plateno_final'></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Engine No: &nbsp; <span id='engineno_final'></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Color: &nbsp; <span id='color_final'></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Chassis No.: &nbsp; <span id='chassis_final'></span>
                                                                </td>
                                                            </tr>
                                                            <tr id='mortgage_label_final'>
                                                                <td>
                                                                    Mortgage: &nbsp; <span id='mortgage_final'></span>
                                                                </td>
                                                            </tr>
                                                            <br>
                                                            <tr>
                                                            <td data-qds-title="1" colspan="2">
                                                                <h4 class="rfs-2-5 rfs-md-1-3 mb-3">Coverage</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                Policy Period: <span id='policyincept_coverage_check'></span>
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
                                                                <span id='ODTheft_coverage'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                B. Bodily Injury
                                                            </td>
                                                            <td>
                                                                <span id='bodilyinjury_property_coverage'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                C. Property Damage
                                                            </td>
                                                            <td>
                                                                <span id='bodilyinjury_property_coverage2'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                D. Auto Personal Accident
                                                            </td>
                                                            <td>
                                                                <span id='personal_accident_coverage'></span>
                                                            </td>
                                                        </tr>
                                                        <tr id='aon_hide_summary_last1'>
                                                            <td>
                                                                E. Acts of Nature
                                                            </td>
                                                            <td>
                                                                <span id='aon_coverage_check'></span>
                                                            </td>
                                                        </tr>
                                                        <tr id='car_body_type_last1'>
                                                            <td>
                                                                   F. Riot, Strike and Civil Commotion
                                                            </td>
                                                            <td>
                                                                <span id='aon_coverage_check'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="quote-other-details rfs-1">
                                                                    <p><span class="ff-semibold">DEDUCTIBLE - <span id='deductible_coverage'></span></span></p>
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
                                                                <strong><span id='netprem_computation'></span></strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Doc Stamps
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='doc_computation'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                VAT
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='vat_computation'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Local Government Tax
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='local_computation'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Gross Premium
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='gross_computation'></span>
                                                            </td>
                                                        </tr>
                                                        {{-- @if($promoType ==="A")
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
                                                        @endif --}}

                                                        <tr>
                                                        </tr>
                                                        <tr class="quote-main-highlight">
                                                            <td class="text-color-primary col1">
                                                                <strong>Final Amount Due</strong>
                                                            </td>
                                                            <td class="text-color-primary text-right col2">
                                                                <strong> <span id='finalamount_computation'></span></strong>
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

                    <div class="col-12 actions quote-btns">
                                <div class="row">
                                <div class="col-12 text-center">
                                        <input type="button" id="postpolicy"  name="postpolicy"  class="btn btn-primary btn-save" value="Post Policy">
                                        <input type='button' class='btn btn-primary' id='pdfview' onclick="generatePDF()" value='View PDF'></input>
                                        <input type="button" id="save_last"  name="save_last"  class="btn btn-primary btn-save" value="Send Policy">
                                        <input type='button' class='btn btn-primary' id='pdfviewbank' onclick="generatePDFBank()" value='View Bank Certificate'></input>
                                        <input type="submit"  id="ComprefourthTabBuy"  name="ComprefourthTabBuy"  class="form-control_ btn btn-secondary a-btn-slide-text_ btn-buy_ btn-lg" value="Buy">
                                    </div>
                                </div>
                    </div>

    </form>


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

  <!-- Premium Computation -->
  <input type="hidden" id="base_format_last" name="base_format_last" value="">
  <input type="hidden" id="final_format_last" name="final_format_last" value="">
  <input type="hidden" id="gross_format_last" name="gross_format_last" value="">
  <input type="hidden" id="transnolast" name="transnolast" value="">
  <input type="hidden" id="encrypt_last_trans" name="encrypt_last_trans"  class='encrypt_last_trans'value="">

  <input type="hidden" id='autoPersonalAccident' name="autoPersonalAccident"  value="">
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

