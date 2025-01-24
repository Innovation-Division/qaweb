@extends('layouts.layout1')

@section('content')
<style type="text/css">
.devicer {
  width: 97%;
  display: block;
  height: 2px;
  background-color: #4b4b4d;
  margin: 60px auto 0;
}
</style>
@if(session('firstload') ==="1" )
<style type="text/css">
.row-dialog-hdr-info {
  border-top: 4px solid #5bc0de;
  border-bottom: 1px solid transparent;
}
.btn-naked {
  background-color: transparent;
}
#privacyPolicy .modal-body,
#termsConditions .modal-body, 
#exclusionslimitations .modal-body  {
  font-size: 20px;
}
#privacyPolicy .modal-body,
#termsConditions .modal-body {
	padding: 15px 50px;
}
#exclusionslimitations .modal-body {
	padding: 15px 30px;
}
#privacyPolicy .modal-body h4,
#termsConditions .modal-body h4,
#exclusionslimitations .modal-body h4 {
	display: block;
	margin-bottom: 15px;
}
@media only screen and (max-width: 1439px) {
  #privacyPolicy .modal-body, 
  #termsConditions .modal-body, 
  #exclusionslimitations .modal-body {
    font-size: 16px;
	  padding: 15px 30px;
  }
}
</style>
    <script type="text/javascript">  
        jQuery(document).ready(function($) {
          jQuery('#BlockUIConfirm2').hide();
           jQuery(function () {
            jQuery("#btnConfirm").click(function () {
              if (jQuery('#chckcConfirm').is(':checked') === true) {
                     jQuery('#BlockUIConfirm').hide();               
                  }else{
                    jQuery('#BlockUIConfirm').hide();
                    jQuery('#BlockUIConfirm2').show();             
                  }         
            });

          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/get-quote';   
          jQuery("#btnConfirm2").click(function () {
            window.location = url; 
          });
        });
        });
    </script>
    <script type="text/javascript">  
      jQuery(document).ready(function($) {
        jQuery("#CBCantFind").prop("checked", false);
        jQuery(function () {
                 jQuery("#btnCantFindCar").click(function () {
                       jQuery('#BlockCantFintCar').hide();
                       jQuery("#CBCantFind").prop("checked", false);
                  });
                 });
        jQuery(function () {
            jQuery("#CBCantFind").click(function () {
                if (jQuery(this).is(":checked")) {
                      jQuery('#BlockCantFintCar').show();
                } else {
                     jQuery('#BlockCantFintCar').hide();
                }
            });
        });
      });
    </script>
    <div id="BlockUIConfirm" class="BlockUIConfirm confirm-modal">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody p-4 px-5">
        <div class="confirm-header row-dialog-hdr-success"></div>
        <div class="confirm-body row-dialog-hdr-success text-center">
          <div class="mb-5"><img class="logo" src="{{ asset('assets/img/logo.svg') }}" alt="cocogen logo" /></div>
          <table>
            <tr>
              <td><label class="rfs-1-5 rfs-md-1 fw-normal">This website will only quote for Private Cars up to 10 years of age. Please contact our Client Services if your car is older than this requirement.</label></td>
            </tr>
            <tr><td><br></td></tr>
             <tr>
              <td>
                <div class="form-check d-flex_ text-left">
                  <input class="form-check-input" type="checkbox" id="chckcConfirm" name="chckcConfirm" value="1" <?php if(old('chckcConfirm')){ echo "checked";} ?>>
                  <label class="rfs-1-5 rfs-md-1 fw-normal form-check-label ml-1" for="chckcConfirm">I confirm that the unit is not used to carry fare paying passengers. (Rent-a-car and/or Public Utility Vehicles such as Taxi, UV Express, Bus, and Grab/TNVS)</label> 
                </div>
              </td>
            </tr>
          </table>  
        </div>
        <div class="confirm-btn-panel mt-4">
          <div class="btn-holder text-center">
            <input type="button" id="btnConfirm" name="btnConfirm" class="row-dialog-btn btn btn-secondary btn-md_" value="Confirm" />
          </div>
          </div>
        </div>
      </div>
    <div id="BlockUIConfirm2" class="BlockUIConfirm2 confirm-modal" style="display: none">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody p-4 px-5">
        <div class="confirm-header row-dialog-hdr-success"></div>
        <div class="confirm-body row-dialog-hdr-success text-center">
          <div class="mb-5"><img class="logo" src="{{ asset('assets/img/logo.svg') }}" alt="cocogen logo" /></div>
          <label class="rfs-1-5 rfs-md-1 fw-normal" for="chckcConfirm">Cars for rent or hire are not covered by our Auto Excel Plus Insurance. For more information, you may reach us at 8830-6000 or at client_services@cocogen.com.</label> 
        </div>
        <div class="confirm-btn-panel mt-4">
          <div class="btn-holder text-center">        
            <input type="button" id="btnConfirm2" name="btnConfirm2" class="row-dialog-btn btn btn-secondary btn-md_" value="Ok"  />       
          </div>
          </div>
        </div>
    </div>
    <div id="BlockCantFintCar" class="BlockCantFintCar confirm-modal" style="display: none">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody p-4 px-5">
        <div class="confirm-header row-dialog-hdr-success"></div>
        <div class="confirm-body row-dialog-hdr-success text-center">
        <label class="rfs-1-5 rfs-md-1 fw-normal" for="chckcConfirm">For further assistance, please contact our Client Services team at (02) 8-830-6000 to get your free quotation.</label> 
        </div>
        <div class="confirm-btn-panel mt-4">
          <div class="btn-holder text-center">        
            <input type="button" id="btnCantFindCar" name="btnCantFindCar" class="row-dialog-btn btn btn-secondary btn-md_ pl-3 pr-3" value="Ok" />       
          </div>
          </div>
        </div>
    </div>
 @endif 

<section class="banner banner-inquiry">
  <div class="container-fluid breadcrumb-container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb rfs-1-5">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item" aria-current="page">Get a Quote</li>
          <li class="breadcrumb-item active" aria-current="page">Auto Excel Plus Insurance Quote</li>
      </ol>
    </nav>
  </div>
  <div class="container">
    <div class="content">
      <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Auto Excel Plus Insurance Quote</h1>
    </div>
  </div>
</section>
          
       <!-- <div class="top-container">
          <div class="category-name container">
              <div class="row text-center">
                  <h1 style="color: #008080;font-size: 35px;">
                      AUTO EXCEL PLUS INSURANCE QUOTE</h1>
              </div>
          </div>
          <br>
      </div> -->
                

      <link rel="stylesheet" href="{{ asset('/css/bootstrapValidator.css') }}">
                    
                   
                   
<!--                  
                </div>
            </div>
        </div> -->

<!-- <style type="text/css">
/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 80vh;
    overflow-y: auto;
}
</style> -->

<div class="summary-and-confirmation-slider summary-and-confirmation-motor" >
  <div class="modal fade modal-light" id="privacyPolicy" tabindex="-1" role="dialog" aria-labelledby="privacyPolicy">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1250px; width: 100%;">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="privacyPolicyLabel">Privacy Policy</h4>
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
            <li>Person or entity that we contractually entered with that ensures the confidentiality standard we implement and adhere to the DPA. </li>
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg modal-light" id="termsConditions" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
          <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="termsConditions">Terms and Conditions</h4>
              </div>
              <div class="modal-body">
                <p>The Cocogen Insurance, Inc. website, e-mail newsletters, and mobile services, and any and all materials contained therein, are information services provided by Cocogen, the use of which shall be subject to the following terms and conditions.</p>
                <p>By accessing the Cocogen information services and their content, you acknowledge and agree that you have read and understood the following terms and conditions and agree to be bound by them.</p>
                <p>As used below, the terms “we”, “us”, and “our” refer to Cocogen.</p>
                <ol>
                    <li><strong>CONTENT</strong>
                        <p>Cocogen information services are available for information purposes only. The publication and posting of any content and access to any of the Cocogen information services do not constitute, either explicitly or implicitly, any provision of services or products by us. Information concerning Cocogen products or services is only available from the relevant Cocogen companies</p>
                    </li>
                    <li><strong>NO OFFER</strong>
                        <p>No information contained in this website or in any of Cocogen information services should be construed as an offer or a solicitation for an offer, as a statement of law, or as counsel on investment, legal, tax, or other matters. In case of any ambiguity or doubts in the information in Cocogen’s website, you are advised to verify or check with us or seek appropriate professional or legal advice.</p>
                    </li>
                    <li><strong>NO DUTY TO UPDATE</strong>
                        <p>We reserve the right to update, modify, revise and change all the contents of our website and other Cocogen information services. We are not obliged to notify you of any changes made on our Terms and Conditions. However, we will endeavor to regularly update the contents of the website and other Cocogen information services.</p>
                        <p>Your continuous access to website following any change in the website signifies that you agree to be bound by the Terms and Conditions, as revised.</p>
                    </li>
                    <li><strong>COPYRIGHT AND TRADEMARKS</strong>
                        <p>All information, photographs, service marks, logos, artworks and all other contents of the website and other Cocogen information services are owned, controlled or licensed by or to Cocogen or its third party licensors, and are protected by intellectual property laws.</p>
                        <p>The limited use, copying and distribution without alteration of any of the materials and information contained in the Cocogen website and other Cocogen information services and the use of said materials and information shall be allowed for non-commercial purposes only: provided that all copyright and other proprietary notices shall appear in all copies of the materials and the information in the same manner as the original. The use of the materials for all other purposes is prohibited.</p>
                        <p>You shall not use any portion of this website, or any other intellectual property of Cocogen, including but not limited to its service marks, on any other website, in the source code of any other website, or in any other printed or electronic materials without the prior written consent of Cocogen. You shall not modify, publish, reproduce, republish, create derivative works, copy, upload, post, transmit, distribute, or otherwise use any of the Cocogen information services’ contents or frame the Cocogen website within any other website without prior written consent of Cocogen. Systematic retrieval of data from this website to create or compile, directly or indirectly, a collection, compilation, database or directory, without prior written consent from Cocogen, is prohibited. Linking from another website to any page in this website is strictly prohibited without prior written consent of Cocogen.</p>
                    </li>
                    <li><strong>NO WARRANTY</strong>
                        <p>All contents on any and all Cocogen information services, including, but not limited to, graphics, text, and hyperlinks or references to other sites, are subject to change without prior notice and without warranty of any kind, express or implied, including, but not limited to, sustainability for a particular purpose, non-infringement and freedom of rights of third parties.</p>
                        <p>We do not guarantee the adequacy, accuracy, reliability or completeness of any information provided by the Cocogen information services and expressly disavow any liability for errors or omissions therein. The user is responsible for the assessment of the information’s adequacy, accuracy, reliability, and completeness.</p>
                        <p>We do not guarantee that the functions of the Cocogen information services will be uninterrupted and/or error-free, and that the defects and errors will be corrected or that the Cocogen information services or the servers that make them available are free from computer viruses or other harmful components.</p>
                        <p>Should your machine which includes but is not limited to your desktop, laptop, or smartphone, be infected by such viruses while using Cocogen information services, you shall assume the entire cost of all necessary servicing, repairs, or corrections.</p>
                    </li>
                    <li><strong>HYPERLINKED AND REFERENCED WEBSITES</strong>
                        <p>Certain hyperlinks or referenced websites in the Cocogen information services may take you to third-party websites and we do not guarantee the adequacy, accuracy, reliability, or completeness of any information on hyperlinked or referenced websites. We disclaim any liability for any and all of the contents of said hyperlinked or reference websites.</p>
                        <p>The hyperlinks to other websites are offered for your convenience only. Their presence in our websit does not imply that we endorse such websites or that products or services that are described therein are our own. We likewise do not guarantee the correctness and accuracy of the information in said hyperlinked websites.</p>
                        <p>We remind you that different terms and conditions will apply for your use of such websites and that your access to third-party websites is entirely at your risk.</p>
                    </li>
                    <li><strong>CONFIDENTIALITY OF INFORMATION</strong>
                        <p>By using the Cocogen information services, you agree, understand, and confirm that the any and all information, including your credit or debit card details, you provide to access Cocogen information services or to availing of our any of the services in said services are owned by you or that you have lawful authority to use said information.</p>
                        <p>We commit that we will not disclose, utilize, and share the said information to any third parties unless required by law, regulation or court order.</p>
                        <p>We, as a merchant, shall be under no liability whatsoever in respect of any loss or damage resulting directly or indirectly from the decline of authorization by the card issuer for any transaction on account of the cardholder having exceeded the limit mutually agreed by us with our acquiring bank from time to time.</p>
                    </li>
                    <li><strong>REFUND AND CANCELLATIONS</strong>
                        <p>For concerns regarding refunds and cancellation of policies, please free to contact our Client Services Center via phone at 8830-6000 or via email at client_services@cocogen.com. Please be informed that cancellations will be subject to the specific terms and conditions of the policy sought to be canceled.</p>
                    </li>
                    <li><strong>LOCAL LEGAL RESTRICTIONS</strong>
                        <p>Any information appearing on this website is provided in accordance with and subject to the laws of the Republic of the Philippines.</p>
                        <p>Cocogen information services are not intended for any person in any jurisdiction where (by virtue of that person’s nationality, residence or otherwise) the publication or availability of Cocogen information services is prohibited. Persons to whom such prohibition applies may not access the Cocogen information services.</p>
                    </li>
                    <li><strong>RESERVATION OF RIGHTS</strong>
                        <p>We reserve the right to change, modify, add to, or remove sections of these terms of use at any time.</p>
                    </li>
                    <li>
                        <p><strong>GOVERNING LAW AND DISPUTE RESOLUTION</strong></p>
                        <p>You agree that all matters relating to your use and access of all Cocogen information services shall be governed by the laws of the Republic of the Philippines. Any dispute, controversy or claim arising out of or relating to this Terms and Conditions, or the breach, termination or invalidity thereof shall be settled by arbitration in accordance with the PDRCI Arbitration Rules as at present in force.</p>
                    </li>
                    <li>
                        <p><strong>ENTIRE AGREEMENT</strong></p>
                        <p>This Agreement constitutes the entire agreement between you and Cocogen with respect to your access and/or use of this website.</p>
                    </li>
                </ol>
              </div>
              <div class="modal-footer text-center">
                  <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
              </div>
          </div>
      </div>
  </div>

  <div class="modal modal-light fade bs-example-modal-lg" id="exclusionslimitations" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

  <div class="modal fade bs-example-modal-lg" id="magilasInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<style type="text/css">
  .a-btn-slide-text:hover{
      color: #349B9B !important;
      border-color: #349B9B !important;
  }
</style>
<style type="text/css">
:root {
  --primary: hsl(0, 0%, 90%);
  --accent: hsl(35, 100%, 63%);
  --text: hsl(0, 0%, 17%);
}

.checkbox {
  display: inline-flex;
  align-items: center;
  cursor: pointer;
  border-color: black;
}

.checkbox__native {
  display: none;
  border-color: black;
}

.checkbox__native:checked + .checkbox__custom {
  background-color:green;
  border-color:green;
}

.checkbox__custom {
  width: 1.3em;
  height: 1.3em;
  border: 3px solid var(--primary);
  border-radius: 3px;
  margin-right: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-shrink: 0;
  transition: all 0.1s;
}

.checkbox__custom::after {
  content: '\2714';
  color: white;
  border-color: black;
}
</style>
<?php 

if($errors->has('plateNo') 
  || $errors->has('engineNO') 
  || $errors->has('bodyType') 
  || $errors->has('Color') 
  || $errors->has('chassisNo') 
  || $errors->has('seatNo')
  || $errors->has('year') 
  || $errors->has('agentName') 
  || $errors->has('agentNo') ){
  session()->flash('tab', 'tab2additinalInfo');
}

if($errors->has('birthDate') 
  || $errors->has('gender_personal_info')
  || $errors->has('status_other_personal_info')
  || $errors->has('place_of_birth_other_personal_info')
  || $errors->has('SouceOfFunds')
  || $errors->has('residence_address')
  || $errors->has('residence_province')
  || $errors->has('residence_municipality')
  || $errors->has('residence_barangay')
  || $errors->has('mailing_address')
  || $errors->has('mailing_province')
  || $errors->has('mailing_municipality')
  || $errors->has('mailing_barangay')
  || $errors->has('nationality_other_personal_info')
  || $errors->has('occupation')
  || $errors->has('telNo')
  || $errors->has('type_of_id_personal_info')
  || $errors->has('idno_other_personal_info')
  || $errors->has('birthDate')
  || $errors->has('idno_other_personal_info')){
  session()->flash('tab', 'ComprefourthTabBack');
}

if(session('cocogen_compre_personalinfo')){
  //dd(session('cocogen_compre_personalinfo'));
  $cocogen_compre_personalinfo = session('cocogen_compre_personalinfo');
  $firstName = $cocogen_compre_personalinfo[0]['firstName']; 
  $lastName = $cocogen_compre_personalinfo[0]['lastName']; 
  $middleName = $cocogen_compre_personalinfo[0]['middleName']; 
  $contactNo = $cocogen_compre_personalinfo[0]['contactNo']; 
  $emailAddress = $cocogen_compre_personalinfo[0]['emailAddress']; 

  $full = $firstName . " " . $middleName . " " . $lastName;
}else{
  $firstName = "";
  $lastName = ""; 
  $middleName = "";
  $contactNo = "";
  $emailAddress = "";
  $full = "";
}



if(session('cocogen_compre_carinfo')){
  $cocogen_compre_carinfo = session('cocogen_compre_carinfo'); 
  $year = $cocogen_compre_carinfo[0]['year'];
  $brand = $cocogen_compre_carinfo[0]['brand'];
  $model = $cocogen_compre_carinfo[0]['model'];
  $default_value  =  number_format( $cocogen_compre_carinfo[0]['default_value'], 2 );
  $propertyDamage  = number_format( $cocogen_compre_carinfo[0]['propertyDamage'], 2 );
  $propertyDamagePrem = number_format( $cocogen_compre_carinfo[0]['propertyDamagePrem'], 2 );
  $bodilyInjury  =  number_format( $cocogen_compre_carinfo[0]['bodilyInjury'], 2 );
  $bodilyInjuryPrem = number_format( $cocogen_compre_carinfo[0]['bodilyInjuryPrem'], 2 );
  $actsOfNature =  number_format( $cocogen_compre_carinfo[0]['actsOfNature'], 2 );
  $actsOfNaturePrem =  number_format( $cocogen_compre_carinfo[0]['actsOfNaturePrem'], 2 );
  $ODTheft =  number_format( $cocogen_compre_carinfo[0]['ODTheft'], 2 );
  $ODTheftPrem = number_format( $cocogen_compre_carinfo[0]['ODTheftPrem'], 2 );
  $netPrem = number_format( $cocogen_compre_carinfo[0]['netPrem'], 2 );
  $totalTax  = number_format( $cocogen_compre_carinfo[0]['totalTax'], 2 );
  $grossPrem =  number_format( $cocogen_compre_carinfo[0]['grossPrem'], 2 );
  $finalDue =  number_format( $cocogen_compre_carinfo[0]['finalDue'], 2 );
  $dst =  number_format( $cocogen_compre_carinfo[0]['dst'], 2 );
  $lgt =  number_format( $cocogen_compre_carinfo[0]['lgt'], 2 );
  $vat =  number_format( $cocogen_compre_carinfo[0]['vat'], 2 );
  $netPremwithAOM = number_format( $cocogen_compre_carinfo[0]['netPremwithAOM'], 2 );
  $totalTaxwithAOM  = number_format( $cocogen_compre_carinfo[0]['totalTaxWithAOM'], 2 );
  $grossPremwithAOM = number_format( $cocogen_compre_carinfo[0]['grossPremWithAOM'], 2 );
  $finalDueWithAOM = number_format( $cocogen_compre_carinfo[0]['finalDueWithAOM'], 2 );
  $dstwithAOM = number_format( $cocogen_compre_carinfo[0]['dstWithAOM'], 2 );
  $lgtwithAOM = number_format( $cocogen_compre_carinfo[0]['lgtWithAOM'], 2 );
  $vatwithAOM = number_format( $cocogen_compre_carinfo[0]['vatWithAOM'], 2 );
  $fmvValue = number_format( $cocogen_compre_carinfo[0]['fmvValue'], 2 );
  $autoPA = number_format( $cocogen_compre_carinfo[0]['autoPA'], 2 );
  $deductible = number_format( $cocogen_compre_carinfo[0]['deductible'], 2 );
  $promoRate  = number_format( $cocogen_compre_carinfo[0]['promoRate'], 2 );
  $promoType  = $cocogen_compre_carinfo[0]['promoType'];

  $reqType = $cocogen_compre_carinfo[0]['reqType'];
  if($reqType === "1"){
      $finalNetPremium = $netPremwithAOM;
      $finaldocstamp = $dstwithAOM;
      $finalVat = $vatwithAOM;
      $finalLGT = $lgtwithAOM;
      $finalTotalDue = $finalDueWithAOM;
      $actsOfNaturefinal =  number_format( $cocogen_compre_carinfo[0]['actsOfNature'], 2 );
      $finalgross = $grossPremwithAOM;
  }else{
      $finalNetPremium = $netPrem;
      $finaldocstamp = $dst;
      $finalVat = $vat;
      $finalLGT = $lgt;
      $finalTotalDue = $finalDue;
      $actsOfNaturefinal =  "-";
      $finalgross = $grossPrem;
  }

}else{
  $promoType  = "";  
  $year ="";  
  $brand = "";
  $model = "";
  $default_value  = "";
  $propertyDamage  = "";
  $propertyDamagePrem = "";
  $bodilyInjury  = "";
  $bodilyInjuryPrem = "";
  $actsOfNature = "";
  $actsOfNaturePrem = "";
  $ODTheft = "";
  $ODTheftPrem = "";
  $netPrem = "";
  $totalTax  = "";
  $grossPrem = "";
  $dst = "";
  $lgt ="";
  $vat = "";
  $netPremwithAOM = "";
  $totalTaxwithAOM  = "";
  $grossPremwithAOM = "";
  $dstwithAOM = "";
  $lgtwithAOM = "";
  $vatwithAOM = "";
  $fmvValue = "";
  $autoPA = "";
  $finalNetPremium = "";
  $finaldocstamp = "";
  $finalVat = "";
  $finalLGT = "";
  $finalTotalDue = "";
  $reqType = "";
  $deductible  = "";
  $actsOfNaturefinal =  "";
  $promoRate  = "";
  $finalDue = "";
  $finalDueWithAOM = "";
  $finalgross = "";
}

if(session('Address')){
  $Address = session('Address'); 
}else{
  $Address = ""; 
}


if(session('grosspremwithAOM')){
  if (session('grosspremwithAOM') > 0) {
    $grosspremwithAOM = number_format( session('grosspremwithAOM'), 2 );
  }else{
    $grosspremwithAOM = 0; 
  }
  
}else{
  $grosspremwithAOM = 0; 
}

if(session('grossprem')){
 
   if (session('grossprem') > 0) {
    $grossprem = number_format( session('grossprem'), 2 ); 
    }else{
    $grossprem = 0; 
  }
}else{
  $grossprem = 0; 
}




if(Session::has('cocogen_compre_addtlcarinfo')){
  $cocogen_compre_addtlcarinfo = session('cocogen_compre_addtlcarinfo'); 
 
  if(count($cocogen_compre_addtlcarinfo) > 0){    
     $inceptDate= date('M. d, Y', strtotime($cocogen_compre_addtlcarinfo[0]['inceptDate']))
                  . " - " . 
                  date('M. d, Y', strtotime('+1 year', strtotime($cocogen_compre_addtlcarinfo[0]['inceptDate'])));
  }else{
    $inceptDate = "";
  }
 
}else{
  $inceptDate = "";
}



if(session('tab')){

    if(session('tab') === "tab2additinalInfo"){ 

         $tab1 = "class=". strip_tags('"btn btn-success past"'); 
         $tab3 = "class=". strip_tags('"btn btn-default current"');
         $tab4 = "class=". strip_tags('"btn btn-success"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane active"');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane"');
    }else if(session('tab') === "tab2viewquote"){ 

         $tab1 = "class=". strip_tags('"btn btn-default current"'); 
         $tab3 = "class=". strip_tags('"btn btn-success"');
         $tab4 = "class=". strip_tags('"btn btn-success"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane active"');
         $act3 = "class=". strip_tags('"tab-pane "');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane"');

     }else if(session('tab') === "tab2viewQuoteBack"){ 
         $tab1 = "class=". strip_tags('"btn btn-default current"');         
         $tab3 = "class=". strip_tags('"btn btn-success"'); 
         $tab4 = "class=". strip_tags('"btn btn-success"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane active"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane"');

      }else if(session('tab') === "tab3PersonalInfo"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"');         
         $tab3 = "class=". strip_tags('"btn btn-success past"'); 
         $tab4 = "class=". strip_tags('"btn btn-default current"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');
         $act4 = "class=". strip_tags('"tab-pane active"');
         $act5 = "class=". strip_tags('"tab-pane"');

      }else if(session('tab') === "CompreThirdTabNext"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"');         
         $tab3 = "class=". strip_tags('"btn btn-success past"'); 
         $tab4 = "class=". strip_tags('"btn btn-success past"');
         $tab5 = "class=". strip_tags('"btn btn-default currents"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane active"');

      }else if(session('tab') === "CompreThirdTabBack"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"');         
         $tab3 = "class=". strip_tags('"btn btn-default currents"'); 
         $tab4 = "class=". strip_tags('"btn btn-success"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane "');
         $act3 = "class=". strip_tags('"tab-pane active"');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane"');
     
      }else if(session('tab') === "ComprefourthTabBack"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"');         
         $tab3 = "class=". strip_tags('"btn btn-success past"'); 
         $tab4 = "class=". strip_tags('"btn btn-default current"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');
         $act4 = "class=". strip_tags('"tab-pane active"');
         $act5 = "class=". strip_tags('"tab-pane"');

      }else if(session('tab') === "ComprefourthTabNext"){ 
         $tab1 = "class=". strip_tags('"btn btn-success past"');         
         $tab3 = "class=". strip_tags('"btn btn-success past"'); 
         $tab4 = "class=". strip_tags('"btn btn-success past"');
         $tab5 = "class=". strip_tags('"btn btn-default currents"');

         $act1 = "class=". strip_tags('"tab-pane"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane active"');

    }else{
         $tab1 = "class=". strip_tags('"btn btn-default current"');        
         $tab3 = "class=". strip_tags('"btn btn-success"'); 
         $tab4 = "class=". strip_tags('"btn btn-success"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane active"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane"');
    }
}else{
         $tab1 = "class=". strip_tags('"btn btn-default current"');         
         $tab3 = "class=". strip_tags('"btn btn-success"'); 
         $tab4 = "class=". strip_tags('"btn btn-success"');
         $tab5 = "class=". strip_tags('"btn btn-success"');

         $act1 = "class=". strip_tags('"tab-pane active"');
         $act2 = "class=". strip_tags('"tab-pane"');
         $act3 = "class=". strip_tags('"tab-pane"');
         $act4 = "class=". strip_tags('"tab-pane"');
         $act5 = "class=". strip_tags('"tab-pane"');

}  
   
?>
<style type="text/css">
    /* .quote-process li.btn-default span::before, .quote-process li.btn-default, .quote-process li.btn-default:first-child::after, .quote-process li.btn-default:last-child::after{
        background-color: #e4509a !important;
    }


    .quote-process li.past span::before, .quote-process li.past, .quote-process li.past:first-child::after, .quote-process li.past:last-child::after{
        background-color: #008080 !important;
    }

    .quote-process li:not(.hidden):before {
      counter-increment: item;
      content: counter(item);
      font: 900 12px 'Muli';
      color: #fff;
      position: absolute;
      left: 10px;
      z-index: 2;
      top: 50%;
      -webkit-transform: translateY(-50%);
      -moz-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      -o-transform: translateY(-50%);
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      line-height: 1.9;
      background: #C22C7D;
      box-shadow: inset 0 0 10px 0 rgba(0, 0, 0, 0.4);
      -webkit-box-shadow: inset 0 0 10px 0 rgba(0, 0, 0, 0.4);
    }


.quote-process li.btn-success::before {
    background: #A9A9A9;
}

.quote-process li.btn-success.current::before {
    background: #C22C7D;
}

.quote-process li.btn-success.past::before {
    background: #349B9B;
} */
</style>

<div id="exTab3" class="main-content container quote-process1"> 
  <div class="inner">
    <ul class="quote-process mb-2 mb-lg-5">
            
              <li  <?php echo $tab1 ?> name="vehicleInfoTab">
                <span class="bubble"><span class="d-none d-lg-flex rfs-12">Quote Request</span></span>
                <span class="d-flex d-lg-none step-label rfs-0-12">Quote<br />Request</span>
              </li>          
              <li <?php echo $tab3 ?>  name="addVehInfoTab">
                <span class="bubble"><span class="d-none d-lg-flex rfs-12">Additional Car Info</span></span>
                <span class="d-flex d-lg-none step-label rfs-0-12">Additional<br />Car Info</span>
              </li>
              <li <?php echo $tab4 ?>  name="personalInfoTab">
                <span class="bubble"><span class="d-none d-lg-flex rfs-12">Personal Data</span></span>
                <span class="d-flex d-lg-none step-label rfs-0-12">Personal<br />Data</span>
              </li>
              <li <?php echo $tab5 ?>  name="summaryConfirTab">
                <span class="bubble"><span class="d-none d-lg-flex rfs-12">Summary and confirmation</span></span>
                <span class="d-flex d-lg-none step-label rfs-0-12">Summary and<br />confirmation</span>
              </li>
            
          <!--   <li class="btn btn-success" name="checkout"><a href="#4b" data-toggle="tab"><span>Summary &amp; Confirmation</span>></a></li>  -->
    </ul>
    @if(session('message') )
    <div class="error-msg">
      <i class="fa fa-times-circle"></i>
      {{session('message')}}
    </div>
    @endif 
    <br />
    <form class="inline-form get-a-quote b5form" role="form" method="post" action="{{ route('compreonsave') }}" enctype="multipart/form-data">
       {{ csrf_field() }}
      <input type="hidden" name="hidURL" name="hidURL" value="{{url('/')}}">
      <input type="hidden" id="tnxid" name="tnxid" value="{{session('tnxid')}}">
      <input type="hidden" id="tabmax" name="tabmax" value="{{session('tabmax')}}">
      <input type="hidden" name="totalvalhid" id="totalvalhid"  value="{{session('totalvalhid')}}" >
        <div class="tab-content clearfix">
            <div id="vehicleInfo" <?php echo $act1 ?> >
                  @include('getaquote.motor.compre.vehicleInfo')
            </div>
            <div id="quotation" <?php echo $act2 ?> >  
                    @include('getaquote.motor.compre.quotation') 
            </div>
            <div id="addVehInfo" <?php echo $act3 ?>> 
                  @include('getaquote.motor.compre.additionalCarInfo')         
            </div>
            <div id="personalInfo" <?php echo $act4 ?>>
                  @include('getaquote.motor.compre.personalInfo')   
            </div>
            <div id="summaryConfir" <?php echo $act5 ?>>
                 @include('getaquote.motor.compre.summary')   
            </div>
        </div>
    </form>
  </div>
</div>
<section class="divider">
  <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>

<script type="text/javascript">
 jQuery(document).ready(function(e) {   
  var $select1 = jQuery( '#mvType' ),
    $select2 = jQuery( '#premium3' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
  $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
} ).trigger( 'change' );
    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
function ConfirmForm() {
  jQuery("#BlockUIConfirm").show();
}

function Submit() {
  alert("Form would be submitted.");
  jQuery('#BlockUIConfirm').hide();
}
   jQuery(function () {
          jQuery("#premWithOutAOM").click(function () {
              if (jQuery(this).is(":checked")) {
                 jQuery("#premWithAOM"). prop("checked", false);                
              } else {
                  jQuery("#premWithAOM"). prop("checked", true);                
              }
          });
      });
     
  });
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
    // if (jQuery('#premWithAOM').is(":checked")) {
    //                 jQuery("#premWithOutAOM"). prop("checked", false);                
    //             } else {
    //                 jQuery("#premWithOutAOM"). prop("checked", true);                
    //             }


     jQuery(function () {
            jQuery("#premWithAOM").click(function () {
                if (jQuery(this).is(":checked")) {
                   jQuery("#premWithOutAOM"). prop("checked", false);                
                } else {
                    jQuery("#premWithOutAOM"). prop("checked", true);                
                }
            });
        });
       
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        var origval = jQuery('input[name=totalvalhid]').val();
        var totalValue = jQuery('input[name=totalValue]').val();
        if(origval){        
            var minval = (origval*0.9);
            var maxval = (origval*1.1); 
            minval = minval.toFixed(2);
            maxval= maxval.toFixed(2);
            jQuery('#fader').attr('min', minval);
            jQuery('#fader').attr('max', maxval);
            jQuery('#fader').val(totalValue);
            jQuery('#minValue').html("Php " +addCommas( minval));
            jQuery('#maxValue').html("Php " +addCommas(maxval));
            jQuery('input[name=totalvalhid]').val(origval);
        }
      });
</script>

<script type="text/javascript">
    jQuery("#totalValue").change(function() {
      var origvalue = jQuery('input[name=totalvalhid]').val();

      if(origvalue){
        var onwvalue =jQuery(this).val();
        onwvalue = onwvalue.replace(/,/g, '')
        if(jQuery.isNumeric(onwvalue)){
            var getmin = (origvalue*0.9);
            var getmax = (origvalue*1.1);
            minval = getmin.toFixed(2);
            maxval= getmax.toFixed(2);  
            if(getmin > onwvalue){
             alert("Value should be greater than Php " + addCommas(minval));
             jQuery("#totalValue").val(addCommas(origvalue));
            }else if(getmax < onwvalue){
             alert("Value should be less than Php " + addCommas(maxval));
             jQuery("#totalValue").val(addCommas(origvalue));            
            }else{
              jQuery('#fader').val(onwvalue);
            }
        }else{
             alert("Incorrect Number format");
             jQuery("#totalValue").val(addCommas(origvalue));
        }

        
      }else{
        alert("Please select brand and model first");
      }

    });
</script>

<script>
  jQuery(document).ready(function(){
    var origval = jQuery('input[name=totalvalhid]').val();
    var minval = (origval*0.9);
    var maxval = (origval*1.1); 
        

   jQuery('.dynamic').change(function(){
    if(jQuery(this).val() != '')
    {
          var yearval = jQuery( "#drpYear option:selected" ).text();
          var brandval = jQuery( "#brand option:selected" ).text(); 
          var modelval = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch';    
          var _token = jQuery('input[name="_token"]').val();
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,yearval:yearval,brandval:brandval,modelval:modelval},
         error: function(data){
                          var errors = data.responseJSON;
                         //alert(errors);
                           jQuery.each(data, function(key, value){
                            alert(value);
                            });
                            // Render the errors with js ...
                          }, 
      success:function(result)
      {
            jQuery('input[name=totalValue]').val(addCommas(result));
            var minval = (result*0.9);
            var maxval = (result*1.1); 
            minval = minval.toFixed(2);
            maxval= maxval.toFixed(2);
            jQuery('#fader').attr('min', minval);
            jQuery('#fader').attr('max', maxval);
            jQuery('#fader').val(result);
            jQuery('#minValue').html("Php " +addCommas( minval));
            jQuery('#maxValue').html("Php " +addCommas(maxval));
            jQuery('input[name=totalvalhid]').val(result);
      }

     })
    }
   });


  });
</script>
<script type="text/javascript">
   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
  </script>
<script>
jQuery(document).on('input', '#fader', function() {
    jQuery('#slider_value').html( jQuery(this).val() );
    jQuery("#totalValue").val(addCommas((jQuery(this).val()).toString(2)));
});
</script>
<script>
  jQuery(document).ready(function(){

   jQuery('.dynamicbrand').change(function(){
    if(jQuery(this).val() != '')
    {
          var yearval = jQuery( "#drpYear option:selected" ).text();        
          var brandval = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/model';    
          var _token = jQuery('input[name="_token"]').val();
          
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,yearval:yearval,brandval:brandval},
         error: function(data){
                          var errors = data.responseJSON;
                         //alert(errors);
                           jQuery.each(data, function(key, value){
                            alert(value);
                            });
                            // Render the errors with js ...
                          }, 
      success:function(result)
      {        
        jQuery('#model').html(result); 
        jQuery('#model').selectpicker("refresh");        
      }

     })
    }
   }); 
  });
</script>
<script>
  jQuery(document).ready(function(){

   jQuery('.dynamicyear').change(function(){
    if(jQuery(this).val() != '')
    {         
          var yearval = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/brand';    
          var _token = jQuery('input[name="_token"]').val();
          
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,yearval:yearval},
         error: function(data){
                          var errors = data.responseJSON;
                         //alert(errors);
                           jQuery.each(data, function(key, value){
                            alert(value);
                            });
                            // Render the errors with js ...
                          }, 
      success:function(result)
      {        
        jQuery('#brand').html(result);    
        jQuery('#brand').selectpicker("refresh");   
      }

     })
    }
   }); 
  });
</script>
<script type="text/javascript">


  function addCommas(num) {
    var str = num.toString().split('.');
    if (str[0].length >= 4) {
        //add comma every 3 digits befor decimal
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    /* Optional formating for decimal places
    if (str[1] && str[1].length >= 4) {
        //add space every 3 digits after decimal
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }*/
    return str.join('.');
    }

</script>

<!-- <script type="text/javascript">
  jQuery(document).ready(function(e) {  
 
  var $select1 = jQuery( '#province' ),
    $select2 = jQuery( '#city' ),
    $options = $select2.find( 'option' );
     
$select1.on( 'change', function() {

  $select2.html( $options.filter( '[text="' + this.value + '"]' ) );
  $select2.selectpicker('refresh');
} ).trigger( 'change' );
    });
</script> -->

<script>
  jQuery(document).ready(function(){

   jQuery('.dynamicprovince').change(function(){
    if(jQuery(this).val() != '')
    {         
          var province = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/compre/city';    
          var _token = jQuery('input[name="_token"]').val();
          
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,province:province},
         error: function(data){
                          var errors = data.responseJSON;
                         //alert(errors);
                           jQuery.each(data, function(key, value){
                            alert(value);
                            });
                            // Render the errors with js ...
                          }, 
      success:function(result)
      {        
        jQuery('#city').html(result);    
        jQuery('#city').selectpicker("refresh");   
      }

     })
    }
   }); 
  });
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
   jQuery("#city").val("test");
jQuery("#mvCodediv").hide();
jQuery("#premtypediv2").hide();
jQuery("#premtypediv1").hide();

  if (jQuery('#CBnEWcAR').is(":checked")) {
                jQuery("#prem1").hide();
                jQuery("#prem3").show();
                jQuery("#purchaseDate").show();
            } else {
                jQuery("#prem1").show();
                jQuery("#prem3").hide();
                jQuery("#purchaseDate").hide();
            }


 jQuery(function () {
        jQuery("#CBnEWcAR").click(function () {
            if (jQuery(this).is(":checked")) {
                jQuery("#prem1").hide();
                jQuery("#prem3").show();
                jQuery("#purchaseDate").show();
            } else {
                jQuery("#prem1").show();
                jQuery("#prem3").hide();;
                 jQuery("#purchaseDate").hide();
            }
        });
    });
   
});
</script>



<script type="text/javascript">
  jQuery(document).ready(function(e) { 
    jQuery(function() {
  jQuery("input.decimal").bind("change keyup input", function() {
    var position = this.selectionStart - 1;
    //remove all but number and .
    var fixed = this.value.replace(/[^0-9\.]/g, "");
    if (fixed.charAt(0) === ".")
      //can't start with .
      fixed = fixed.slice(1);

    var pos = fixed.indexOf(".") + 1;
    if (pos >= 0)
      //avoid more than one .
      fixed = fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");

    if (this.value !== fixed) {
      this.value = fixed;
      this.selectionStart = position;
      this.selectionEnd = position;
    }
  });

  jQuery("input.integer").bind("change keyup input", function() {
    var position = this.selectionStart - 1;
    //remove all but number and .
    var fixed = this.value.replace(/[^0-9]/g, "");

    if (this.value !== fixed) {
      this.value = fixed;
      this.selectionStart = position;
      this.selectionEnd = position;
    }
  });
});

      });
</script> 
@endsection
