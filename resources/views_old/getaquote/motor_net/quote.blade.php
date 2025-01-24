@extends('layouts.layout1')
@section('content')



@if(session('firstload') ==="1" )
    <style type="text/css">
        .BlockUIConfirm {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 100vh;
          width: 100vw;
          z-index: 50;
        }

        .BlockUIConfirm2 {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 100vh;
          width: 100vw;
          z-index: 50;
        }

        .BlockCantFintCar {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 100vh;
          width: 100vw;
          z-index: 50;
        }

        .blockui-mask {
          position: absolute;
          top: 0;
          width: 100%;
          height: 100%;
          background-color: #333;
          opacity: 0.8;
        }

        .RowDialogBody {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 100%;
          max-width: 600px;
          opacity: 1;
          background-color: white;
          border-radius: 4px;
        }

        .RowDialogBody > div:not(.confirm-body) {
          padding: 8px 10px;
        }

        .confirm-header {
          width: 100%;
          border-radius: 4px 4px 0 0;
          font-size: 13pt;
          font-weight: bold;
          margin: 0;
        }

        .row-dialog-hdr-success {
          border-top: 4px solid #5cb85c;
          border-bottom: 1px solid transparent;
        }

        .row-dialog-hdr-info {
          border-top: 4px solid #5bc0de;
          border-bottom: 1px solid transparent;
        }

        .confirm-body {
          border-top: 1px solid #ccc;
          padding:20px 10px;
          border-bottom: 1px solid #ccc;
        }

        .confirm-btn-panel {
          width: 100%;
        }
        .row-dialog-btn {
          cursor: pointer;
        }

        .btn-naked {
          background-color: transparent;
        }
    </style>
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
    <div id="BlockUIConfirm" class="BlockUIConfirm" >
      <div class="blockui-mask"></div>
      <div class="RowDialogBody">
        <div class="confirm-header row-dialog-hdr-success">

        </div>
        <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
          <table  >
            <tr>
              <td style="width: 4%"></td>
              <td style="width: 80%"><label style="font-size: 11px;margin-bottom: -5px"> This website will only quote for Private Cars up to 10 years of age. Please contact our Client Services if your car is older than this requirement. </label> </td>
            </tr>
            <tr><td><br></td></tr>
             <tr >
              <td style="width: 4%;vertical-align: top"> <input type="checkbox" id="chckcConfirm" name="chckcConfirm" value="1"  style="margin-bottom: 100px;" <?php if(old('chckcConfirm')){ echo "checked";} ?> ><label style="font-size: 10px;" for="chckcConfirm"></label></td>
              <td style="width: 80%"> <label style="font-size: 11px;margin-bottom: 10px"  for="chckcConfirm">  I confirm that the unit is not used to carry fare paying passengers. (Rent-a-car and/or Public Utility Vehicles such as Taxi, UV Express, Bus, and Grab/TNVS)</label> </td>
            </tr>

          </table>
        </div>
        <div class="confirm-btn-panel pull-right">
          <div class="btn-holder pull-right">

            <input type="button" id="btnConfirm" name="btnConfirm" class="row-dialog-btn btn btn-success btn-xs" value="Confirm"  />

          </div>
          </div>
        </div>
      </div>
    <div id="BlockUIConfirm2" class="BlockUIConfirm2"  style="display: none">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody">
        <div class="confirm-header row-dialog-hdr-success">

        </div>
        <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
        <label style="font-size: 11px;" for="chckcConfirm">   Cars for rent or hire are not covered by our Motor Excel Plus Insurance. For more information, you may reach us at 8830-6000 or at client_services@cocogen.com.</label>
        </div>
        <div class="confirm-btn-panel pull-right">
          <div class="btn-holder pull-right">
            <input type="button" id="btnConfirm2" name="btnConfirm2" class="row-dialog-btn btn btn-success btn-xs" value="OK"  />
          </div>
          </div>
        </div>
    </div>
    <div id="BlockCantFintCar" class="BlockCantFintCar"  style="display: none">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody">
        <div class="confirm-header row-dialog-hdr-success">

        </div>
        <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
        <label style="font-size: 10px;" for="chckcConfirm">For further assistance, please contact our Client Services team at (02) 8-830-6000 to get your free quotation.</label>
        </div>
        <div class="confirm-btn-panel pull-right">
          <div class="btn-holder pull-right">
            <input type="button" id="btnCantFindCar" name="btnCantFindCar" class="row-dialog-btn btn btn-success btn-xs" value="OK"  />
          </div>
          </div>
        </div>
    </div>
 @endif

    @if(session('message') )

        <br><br>
        <div class="col-md-10 col-md-offset-1" style="text-align: left;">
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{session('message')}}
            </div>
        </div>
    @endif
       <div class="top-container">
                        <div class="category-name container">
                            <div class="row text-center">
                                <h1>
                                    MOTOR EXCEL PLUS QUOTE</h1>
                            </div>
                        </div>
                       <br>

                    </div>



                    ﻿﻿<link rel="stylesheet" href="{{ asset('/css/bootstrapValidator.css') }}">




                </div>
            </div>
        </div>


        <div class="summary-and-confirmation-slider summary-and-confirmation-motor" >
    <div class="modal fade bs-example-modal-lg" id="privacyPolicy" tabindex="-1" role="dialog" aria-labelledby="privacyPolicy" aria-hidden="true" >                                <div class="modal-dialog" >
                                    <div class="modal-content" >
                                        <div class="modal-header" >
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="privacyPolicy">
                                                Privacy Policy</h4>
                                        </div>
                                        <div class="modal-body" style="max-height: calc(105vh - 210px);overflow-y: auto;">
                                            <div class="page-title">
                                                <h1>
                                                    Privacy Policy</h1>
                                            </div>
                                            <div class="std">

                                                <p align="center">
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        &nbsp;</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">UCPB General
                                                        Insurance Company, Inc. ("COCOGEN") upholds an individual’s data privacy rights
                                                        and assures that all your </span><a href="#DefinitionOfTerms" style="font-family: arial, helvetica, sans-serif;
                                                            font-size: medium;">personal information, sensitive personal information and privileged
                                                            information (collectively, “Personal Data”)</a><span style="font-family: arial, helvetica, sans-serif;
                                                                font-size: medium;">, collected and to be collected, are processed in compliance
                                                                with the Data Privacy Act of 2012 (Republic Act No. 10173) and its Implementing
                                                                Rules and Regulations (IRR).</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">This Privacy
                                                        Statement explains how we gather, protect, use, manage, and disclose the Personal
                                                        Data that We obtain about the Company’s clients in the course of doing business,
                                                        communications in social media or as a user of this our website.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Data Gathering</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We collect
                                                        data about our existing and prospective clients when:</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        1. They register, apply for, avail of or inquire about any of our products and services;</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;&nbsp;2.
                                                        They renew their existing policies and/or they request to update personal data for
                                                        record purposes;</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We also
                                                        collect personal data&nbsp;when&nbsp;clients transact with our authorized agents,
                                                        brokers, employees, and representatives requiring the production of personal information.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">Upon application
                                                        or availing of our products, our authorized agents, employees, brokers and representatives
                                                        may&nbsp;use the data gathered&nbsp;to aid&nbsp;us in giving&nbsp;the best products
                                                        and services.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Data Collected</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">Personal&nbsp;Data
                                                        that will be collected includes, but are not limited to the following:</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;&nbsp;(1)
                                                        name, age, gender, birth date, home and/or business address, contact number, and
                                                        email address; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (2) educational background, financial background, and employment record and/or business
                                                        information; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (3) medical record and/ or information or fit to travel certificate for clients,
                                                        if necessary in availing our products.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (4) specimen signature, details and copy of government or company-issued ID, and
                                                    </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        (5) other information necessary to give the needed products, and&nbsp;incidental
                                                        to the main transaction.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We collect
                                                        personal&nbsp;data that are essential and incidental to provide excellent and valuable
                                                        service that our existing and prospective clients truly deserve.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        &nbsp;</strong></span><span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>&nbsp;</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Data Protection</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">COCOGEN
                                                        adheres to the Data Privacy Act of 2012 (R.A. 10173) its Implementing Rules and
                                                        Regulations and other related issuances of the National Privacy Commission. In line
                                                        with this, We take responsibility in collecting, processing, holding or use of personal
                                                        data. We assure that all information that our clients and potential clients will
                                                        provide shall be used solely for processing their transactions with our Company,
                                                        they consented to, and for other legitimate purposes mandated by law. We shall implement
                                                        reasonable and appropriate organizational, physical, and technical security measures
                                                        for the protection of your personal data.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                        Rights as Data Subject: </span></strong>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We uphold
                                                        and recognize the rights of our clients, as data subjects, provided under the Data
                                                        Privacy Act of 2012, which are: </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        1. Right to be informed; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        2. Right to object; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        3. Right to access; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        4. Right to correct; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        5. Right to rectification, erasure or blocking; </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        6. Right to damages; and </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        7. Right to data portability.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Use of information</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We use the
                                                        information provided by our clients and potential clients to:</span><strong><span
                                                            style="font-family: arial, helvetica, sans-serif; font-size: medium;"><br>
                                                        </span></strong>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        1.&nbsp;Process their application;</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        2.&nbsp;Answer their inquiries and other transactions that may be necessary or otherwise
                                                        incidental to the availment of our products and services.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        3.&nbsp;Offer other products and services of the Company that we believe to be useful
                                                        to the clients.</span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp; &nbsp;
                                                        4.&nbsp;Any other transactions which are normal in the course of business or as
                                                        mandated by law.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Disclosure of Information</strong></span></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We may share
                                                        the Personal Data provided by our clients to our affiliates, subsidiaries and service
                                                        providers with the obligation to take care and keep all the information shared to
                                                        them confidential. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We may also
                                                        use or share your Personal Data to third-party service providers or government agencies,
                                                        to collect more information about our clients, if necessary, for&nbsp;business transactions.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                        Data Retention</span></strong></p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">We will
                                                        retain and/or preserve your Personal Data within the agreed period as stated in
                                                        the policy and/or contract and if it is necessary for keeping track of your records
                                                        and servicing your policy and contract. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">If required
                                                        or mandated by law, we will extend the retention of your Personal Data within the
                                                        period provided by law. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">Any correction
                                                        or erasures of the Personal Data shall be recorded. </span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">After the
                                                        expiration of the period as earlier mentioned, we will destroy, delete or dispose
                                                        of all the personal data and the materials, in our storage or server, in accordance
                                                        with the requirement of Data Privacy Act.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        Changes in our Privacy Policy: </strong></span>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;">COCOGEN
                                                        may periodically update or amend Privacy Policy in order to adhere to new and existing
                                                        laws affecting the Data Privacy Act, including any change or improvement we establish
                                                        to secure our clients' personal data. If we amend our Privacy Policy, we will post
                                                        the updated and revised here in our website: www.ucpbgen.com and will take effect
                                                        immediately. Rest assured, however, that any updates or changes shall not alter
                                                        how we handle previously collected personal data without obtaining our clients’
                                                        consent unless required by law.</span></p>
                                                <p>
                                                </p>
                                                <p>
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><strong>
                                                        For any concerns, requests, complaints or queries, you may Contact Us at</strong></span></p>
                                                <ul type="disc">
                                                    <ul type="disc">
                                                        <ul type="disc">
                                                            <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                                <span style="text-decoration: underline;">Data Protection Officer:</span> Mr. Edgardo
                                                                D. Rosario&nbsp;</span></strong></li>
                                                            <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                                <span style="text-decoration: underline;">Address:</span> UCPB General Insurance
                                                                Company, Inc. Office Address – 22F One Corporate Center Doña Julia Vargas corner
                                                                Meralco Ave., Ortigas, Pasig City</span></strong></li>
                                                            <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                                <span style="text-decoration: underline;">Email:</span> data_privacy@ucpbgen.com
                                                            </span></strong></li>
                                                        </ul>
                                                    </ul>
                                                </ul>
                                                <p>
                                                    <a name="DefinitionOfTerms"></a>
                                                </p>
                                                <ul type="disc">
                                                    <ul type="disc">
                                                        <li><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                            <span style="text-decoration: underline;">UCPB GEN Client Services:</span> 830-6000</span></strong></li>
                                                    </ul>
                                                </ul>
                                                <p>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">
                                                        ___________________________________________________________</span></strong></p>
                                                <p>
                                                </p>
                                                <p>
                                                </p>
                                                <p>
                                                    <strong style="font-size: medium;">Definition Of Terms according to&nbsp;<a href="https://www.privacy.gov.ph/data-privacy-act/">Republic
                                                        Act 10173 or Data Privacy Act</a>:</strong></p>
                                                <p>
                                                    *“Personal information” refers to any information, whether recorded in a material
                                                    form or not, from which the identity of an individual is apparent or can be reasonably
                                                    and directly ascertained by the entity holding the information, or when put together
                                                    with other information would directly and certainly identify an individual.</p>
                                                <p>
                                                    *<span lang="EN-PH">Sensitive personal information refers to personal information:</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 1. About an individual’s race, ethnic origin, marital
                                                        status, age, color, and religious, philosophical or political affiliations;</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 2. About an individual’s health, education, genetic
                                                        or sexual life of a person, or to any proceeding for any offense committed or alleged
                                                        to have been committed by such individual, the disposal of such proceedings, or
                                                        the sentence of any court in such proceedings;</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 3. Issued by government agencies peculiar to an individual
                                                        which includes, but is not limited to, social security numbers, previous or current
                                                        health records, licenses or its denials, suspension or revocation, and tax returns;
                                                        and</span></p>
                                                <p>
                                                    <span lang="EN-PH">&nbsp; &nbsp; 4. Specifically established by an executive order or
                                                        an act of Congress to be kept classified</span></p>
                                                <p>
                                                    <span lang="EN-PH">*“Privileged information” refers to any and all forms of data, which,
                                                        under the Rules of Court and other pertinent laws constitute privileged communication;</span></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-lg" id="termsConditions" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="termsConditions">
                                                Terms and Conditions</h4>
                                        </div>
                                        <div class="modal-body" style="max-height: calc(105vh - 210px);overflow-y: auto;">

                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: small;">The UCPB
                                                    General Insurance Company, Inc. (UCPB GEN) website, e-mail newsletters, and mobile
                                                    services, and any and all materials contained therein, are information services
                                                    provided by UCPB GEN, the use of which shall be subject to the following terms and
                                                    conditions.</span></p>
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: small;">By accessing
                                                    the UCPB GEN information services and their content, you acknowledge and agree that
                                                    you have read and understood the following terms and conditions and agree to be
                                                    bound by them.</span></p>
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: small;">As used below,
                                                    the terms “we”, “us”, and “our” refer to UCPB GEN.</span></p>
                                            <ol>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    CONTENT</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">UCPB GEN
                                                            information services are available for information purposes only. The publication
                                                            and posting of any content and access to any of the UCPB GEN information services
                                                            do not constitute, either explicitly or implicitly, any provision of services or
                                                            products by us. Information concerning UCPB GEN products or services is only available
                                                            from the relevant UCPB GEN companies</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    NO OFFER</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">No information
                                                            contained in this website or in any of UCPB GEN information services should be construed
                                                            as an offer or a solicitation for an offer, as a statement of law, or as counsel
                                                            on investment, legal, tax, or other matters. In case of any ambiguity or doubts
                                                            in the information in UCPB GEN’s website, you are advised to verify or check with
                                                            us or seek appropriate professional or legal advice.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    NO DUTY TO UPDATE</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We reserve
                                                            the right to update, modify, revise and change all the contents of our website and
                                                            other UCPB GEN information services. We are not obliged to notify you of any changes
                                                            made on our Terms and Conditions. However, we will endeavor to regularly update
                                                            the contents of the website and other UCPB GEN information services.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Your continuous
                                                            access to website following any change in the website signifies that you agree to
                                                            be bound by the Terms and Conditions, as revised.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    COPYRIGHT AND TRADEMARKS</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">All information,
                                                            photographs, service marks, logos, artworks and all other contents of the website
                                                            and other UCPB GEN information services are owned, controlled or licensed by or
                                                            to UCPB or its third party licensors, and are protected by intellectual property
                                                            laws.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif` font-size: small;">The limited
                                                            use, copying and distribution without alteration of any of the materials and information
                                                            contained in the UCPB GEN website and other UCPB GEN information services and the
                                                            use of said materials and information shall be allowed for non-commercial purposes
                                                            only: provided that all copyright and other proprietary notices shall appear in
                                                            all copies of the materials and the information in the same manner as the original.
                                                            The use of the materials for all other purposes is prohibited.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">You shall
                                                            not use any portion of this website, or any other intellectual property of UCPB
                                                            GEN, including but not limited to its service marks, on any other website, in the
                                                            source code of any other website, or in any other printed or electronic materials
                                                            without the prior written consent of UCPB GEN. You shall not modify, publish, reproduce,
                                                            republish, create derivative works, copy, upload, post, transmit, distribute, or
                                                            otherwise use any of the UCPB GEN information services’ contents or frame the UCPB
                                                            GEN website within any other website without prior written consent of UCPB GEN.
                                                            Systematic retrieval of data from this website to create or compile, directly or
                                                            indirectly, a collection, compilation, database or directory, without prior written
                                                            consent from UCPB GEN, is prohibited. Linking from another website to any page in
                                                            this website is strictly prohibited without prior written consent of UCPB GEN.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    NO WARRANTY</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">All contents
                                                            on any and all UCPB GEN information services, including, but not limited to, graphics,
                                                            text, and hyperlinks or references to other sites, are subject to change without
                                                            prior notice and without warranty of any kind, express or implied, including, but
                                                            not limited to, sustainability for a particular purpose, non-infringement and freedom
                                                            of rights of third parties.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We do not
                                                            guarantee the adequacy, accuracy, reliability or completeness of any information
                                                            provided by the UCPB GEN information services and expressly disavow any liability
                                                            for errors or omissions therein. The user is responsible for the assessment of the
                                                            information’s adequacy, accuracy, reliability, and completeness.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We do not
                                                            guarantee that the functions of the UCPB GEN information services will be uninterrupted
                                                            and/or error-free, and that the defects and errors will be corrected or that the
                                                            UCPB GEN information services or the servers that make them available are free from
                                                            computer viruses or other harmful components.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Should your
                                                            machine which includes but is not limited to your desktop, laptop, or smartphone,
                                                            be infected by such viruses while using UCPB GEN information services, you shall
                                                            assume the entire cost of all necessary servicing, repairs, or corrections.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    HYPERLINKED AND REFERENCED WEBSITES</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Certain hyperlinks
                                                            or referenced websites in the UCPB GEN information services may take you to third-party
                                                            websites and we do not guarantee the adequacy, accuracy, reliability, or completeness
                                                            of any information on hyperlinked or referenced websites. We disclaim any liability
                                                            for any and all of the contents of said hyperlinked or reference websites.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">The hyperlinks
                                                            to other websites are offered for your convenience only. Their presence in our website
                                                            does not imply that we endorse such websites or that products or services that are
                                                            described therein are our own. We likewise do not guarantee the correctness and
                                                            accuracy of the information in said hyperlinked websites.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We remind
                                                            you that different terms and conditions will apply for your use of such websites
                                                            and that your access to third-party websites is entirely at your risk.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    CONFIDENTIALITY OF INFORMATION</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">By using
                                                            the UCPB GEN information services, you agree, understand, and confirm that the any
                                                            and all information, including your credit or debit card details, you provide to
                                                            access UCPB GEN information services or to availing of our any of the services in
                                                            said services are owned by you or that you have lawful authority to use said information.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We commit
                                                            that we will not disclose, utilize, and share the said information to any third
                                                            parties unless required by law, regulation or court order.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">We, as a
                                                            merchant, shall be under no liability whatsoever in respect of any loss or damage
                                                            resulting directly or indirectly from the decline of authorization by the card issuer
                                                            for any transaction on account of the cardholder having exceeded the limit mutually
                                                            agreed by us with our acquiring bank from time to time.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    REFUND AND CANCELLATIONS</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">For concerns
                                                            regarding refunds and cancellation of policies, please free to contact our Customer
                                                            Service Center via phone at 811-8329 or via email at client_services@cocogen.com.
                                                            Please be informed that cancellations will be subject to the specific terms and
                                                            conditions of the policy sought to be canceled.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>
                                                    LOCAL LEGAL RESTRICTIONS</strong></span>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">Any information
                                                            appearing on this website is provided in accordance with and subject to the laws
                                                            of the Republic of the Philippines.</span></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">UCPB GEN
                                                            information services are not intended for any person in any jurisdiction where (by
                                                            virtue of that person’s nationality, residence or otherwise) the publication or
                                                            availability of UCPB GEN information services is prohibited. Persons to whom such
                                                            prohibition applies may not access the UCPB GEN information services.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: small;"></span></span>
                                                    <strong><span style="font-family: arial, helvetica, sans-serif; font-size: small;">RESERVATION
                                                        OF RIGHTS</span></strong>
                                                    <p>
                                                        <span style="font-size: small; font-family: arial, helvetica, sans-serif;">We reserve
                                                            the right to change, modify, add to, or remove sections of these terms of use at
                                                            any time.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <strong><span style="font-family: arial, helvetica, sans-serif; font-size: small;">GOVERNING
                                                            LAW AND DISPUTE RESOLUTION</span></strong></p>
                                                    <p>
                                                        <span style="font-size: small; font-family: arial, helvetica, sans-serif;">You agree
                                                            that all matters relating to your use and access of all UCPB GEN information services
                                                            shall be governed by the laws of the Republic of the Philippines. Any dispute, controversy
                                                            or claim arising out of or relating to this Terms and Conditions, or the breach,
                                                            termination or invalidity thereof shall be settled by arbitration in accordance
                                                            with the PDRCI Arbitration Rules as at present in force.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <strong><span style="font-size: small; font-family: arial, helvetica, sans-serif;">ENTIRE
                                                            AGREEMENT</span></strong></p>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small;">This Agreement
                                                            constitutes the entire agreement between you and UCPB GEN with respect to your access
                                                            and/or use of this website.</span></p>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-lg" id="exclusionslimitations" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="exclusionslimitations">
                                                Exclusions and Limitations</h4>
                                        </div>
                                        <div class="modal-body" style="max-height: calc(105vh - 210px);overflow-y: auto;">
                                            <ul>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            Only the vehicle owner and/or his duly authorized representative can register.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle being insured has not been involved in any vehicular accident and has
                                                            not been flooded/damaged in any manner as of the time of the insurance of this policy.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            Any damages prior to the issuance of this policy shall not be compensable. This
                                                            declaration is under the penalty of perjury.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle for insurance cover is not used to carry fare-paying passengers ( ex. Grab
                                                            or Rent-a-car).</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            If the vehicle is under financing with assumed balance, it cannot be covered due
                                                            to no insurable interest.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            All undeclared accessories are not covered under this policy.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle being insured is not under auto-renewal of insurance with the financing
                                                            bank.</span></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                            The vehicle being insured does not have an existing Direct Link or UCPB General
                                                            Insurance policy.</span></p>
                                                </li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    All Mortgaged vehicles are required to purchase AON coverage.</span></li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    Vehicle can only be used in the Republic of the Philippines.</span></li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    Only authorized drivers can drive the vehicle.</span></li>
                                                <li><span style="font-family: arial, helvetica, sans-serif; font-size: small; color: #333333;">
                                                    There is no cover, whilst onboard a sea vessel on inter-island transit.</span></li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close">
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

</script>
@endsection
