
@extends('layouts.ecommerce ')

@section('content')


<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/style.css') }}"></script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/vars.css') }}"></script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/itp-mobile.css') }}"></script>
@if (Agent::isMobile()) 
  <style>
    .sticky-div{
      z-index:2;
      position: sticky !important;
       top:-0.813rem !important;
    }
  </style>
@endif
  <div id="sticky-div" class="sticky-div" style="z-index:99;position: sticky !important; top:-0.1rem;">
     @include('ecommerce.itp.title')
     @include('ecommerce.itp.progress')
  </div>
  <form method="post" action="{{ route('internationalinsurancesave') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" id="url" name="url" value="{{url('/')}}">
        <input type="hidden" id="hdn_dollar_rate" name="hdn_dollar_rate" value="{{$dollarrate}}">
        <div class="content" style="z-index:1;">
        <div class="step">
                  @include('ecommerce.itp.step1')
              </div>
              <div class="step">
                  @include('ecommerce.itp.step1_package')
              </div>
              <div class="step">
                  @include('ecommerce.itp.step1_seemorepackage')
              </div>
              <div class="step">
                  @include('ecommerce.itp.step2')
              </div>
              <div class="step">
                  @include('ecommerce.itp.step3')
              </div>
              <div class="step">
                  @include('ecommerce.itp.step4')
              </div>
        </div>
        @include('ecommerce.itp.modal')
        @include('ecommerce.itp.itp-css')
        <input type="hidden" id="hdn_destination_type" name="hdn_destination_type" value="" autocomplete="off">
        <input type="hidden" id="hdn_travelling" name="hdn_travelling" value="" autocomplete="off">
        <input type="hidden" id="hdn_covid_tag" name="hdn_covid_tag" value="" autocomplete="off">
        <input type="hidden" id="hdn_covid" name="hdn_covid" value="" autocomplete="off">
        <input type="hidden" id="hdn_covid_yes_type" name="hdn_covid_yes_type" value="" autocomplete="off">
        <input type="hidden" id="hdn_covid_return" name="hdn_covid_return" value="" autocomplete="off">
        <input type="hidden" id="hdn_cruise_tag" name="hdn_cruise_tag" value="" autocomplete="off">
        <input type="hidden" id="hdn_promo_type" name="hdn_promo_type" value="" autocomplete="off">
        <input type="hidden" id="hdn_promo_amount" name="hdn_promo_amount" value="" autocomplete="off">
        <input type="hidden" id="hdn_promo_tag" name="hdn_promo_tag" value="" autocomplete="off">
        <input type="hidden" id="hdn_package" name="hdn_package" value="" autocomplete="off">
        <input type="hidden" id="hdn_pwd_tag" name="hdn_pwd_tag" value="" autocomplete="off">
        <input type="hidden" id="hdn_rtpcr_tag" name="hdn_rtpcr_tag" value="" autocomplete="off">
        <input type="hidden" id="hdn_agent_tag" name="hdn_agent_tag" value="" autocomplete="off">
        <input type="hidden" name="utm_source" id="utm_source" value="{{$utm_source}}">
        <input type="hidden" name="utm_medium" id='utm_medium' value="{{$utm_medium}}">
  </form>
  
  @if (Agent::isMobile())
    <style>

       .date-picker_cruise, .date-picker {
        margin-top: 35px !important;
      }

      .tooltip{
        left: 50% !important;
        width: 100% !important;
      }
      #h2-warranty,
      dl, ol, ul {
        font-size: 14px !important;
      }
      .option-design{
        white-space: normal !important;
        word-wrap: break-word;
      }
      .bootstrap-select.btn-group .dropdown-menu {
        z-index: 1000;
      }

      #date-picker-bday{
        z-index: 1001;
      }
      #pwd-modal-delete-upload-confirm,
      #modal-delete-upload-confirm{
        margin-bottom: 19px;
      }
      .entire_duration_covid {
        width: 5rem !important;
      }
      .destination-mobile-first{
        width: 80%;
      }
      #modal-covid .pt__title{
        max-width: 51% !important;
      }
     
      
      .tooltip-container-last,
      .mobile-present-location{
        position: absolute ;
        left: 89%;
        top: 1.1rem;
      }
      .text-set-as-defalt{
        position: absolute;
        top: 13.4rem;
        left: 32%;
      }
      #delete-svg-beneficiary{
        width: 23px !important;
        top: -19.1rem;
        position: absolute;
        left: 21.5rem;
      }

      .default-text0{
        margin-left:20px !important;
      }
      #pwd-btn-upload-id-delete,
        #btn-upload-id-delete{
        width: 100% !important;
      }
      .btn-arrow-icon{
        height: 48px;
        border-radius: 4px !important;
        background: #008080;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color: #ffffff;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index:1 !important;
      }


      .btn-arrow-icon-secondary{
        height: 48px;
        border-radius: 4px !important;
        border:0;
        background-color:transparent;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color:#008080;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index:1 !important;
      }
       .btn-arrow-icon-red{
        height: 48px;
        border-radius: 4px !important;
        border:1px solid #dd0707;
        background-color:transparent;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color:#dd0707;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index: 1 !important;
       }
      .multiple-option-field{
        margin-left: -32px;
        margin-top: 5px;
      }
      #removeDestination_cruise,
      #addDestination_cruise,
      #addDestination,
      #removeDestination{
        height: 30px !important;
        width: 30px !important;
      }
      .svg_check_package svg{
        height: 18px;
        width: 18px;
        margin-top: -1.1rem;
      }
      .option-adjusted{
        padding-right: 0;
        padding-left: 12%;
      }
      .btn-continue{
        width:100% !important;
      }
      .quote-request-destination-details-sub,
      .quote-request-travel-type-sub,
      .quote-request-choose-destination-sub{
        color: #2d2727 !important;
        text-align: center !important;
        font-size: 16px !important;
        font-weight: 500 !important;
        position: relative !important;
      }
      .personal-data-pwd-title,
      .personal-data-emergency-title,
      .personal-data-beneficiary-title,
      .personal-data-indentification-title,
      .personal-data-present-address-info-title,
      .personal-data-additional-info-title,
      .personal-data-perssonal-info-title,
      .quote-request-promo-title,
      .quote-request-cruise-coverage-title,
      .quote-request-covid-coverage-title,
      .quote-request-travel-info-title,
      .quote-request-personal-info-title{
          color: #2d2727 !important;
          text-align: center !important;
          font-size:  18px !important;
          font-weight:  500 !important;
          position: relative !important;
          text-align:center !important;
      }
      .personal-data-pwd-title svg,
      .personal-data-emergency-title svg,
      .personal-data-beneficiary-title svg,
      .personal-data-indentification-title svg,
      .personal-data-present-address-info-title svg,
      .personal-data-additional-info-title svg,
      .personal-data-perssonal-info-title svg,
      .quote-request-cruise-coverage-title svg,
      .quote-request-covid-coverage-title svg,
      .quote-request-promo-title svg,
      .quote-request-travel-info-title svg,
      .quote-request-personal-info-title svg {
        height: 15px;
        width: 15px;
        margin-bottom: 3px;
      }

      
      .cp-only-piso{
        padding-right:0px;
      }
      .d-inline-block-align{
        float:right;
      }

      .d-inline-block-align-piso{
        padding-left:0px;
      }
      .amount-quote-font,
      .subamount-quote-font,
      .summary-computation-list{
        color: #2d2727 !important;
        text-align: left !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        position: relative !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
      }
      .accordion{
        color: #2d2727 !important;
        text-align: left !important;
        font-size: 14px !important;
        font-weight: 500 !important;
      }
      .summary_check_icon{
        margin-left: 5.6rem;
      }
      .card-no-padding{
        padding: 1rem 0px 1rem 0px !important;
      }
       .summary_title_header{
          color:  #2d2727;
          text-align: center;
          font-size: 16px;
          font-weight: 500;
          position: relative;
          align-self: stretch;
        }
        .title_page_itp_style23{
            color:#2d2727 !important;
            text-align: left !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            position: relative !important;
        }

      .pt__row_header_exective{
        margin-top:10px !important;
      }
      .svg_icon_check_more_package{
        height: 18px;
        width: 18px;
        margin-left: -10px;
        margin-top: 3px;
      }

      .svg_icon_check_more_package_executive{
        height: 18px;
        width: 18px;
        margin-left: -16px;
        margin-top: -7px;
      }
      .table-package-mobile{
        width: 120% !important;
        margin-left:-35px !important;
      }

      .pt__row_header{
          color: #2d2727 !important;
        text-align: center !important;
        font-size: 16px !important;
        font-weight:  500 !important;
        position: relative !important;
        align-self: stretch !important;
      }
      .pricing__table .pt__title .pt__title__wrap .pt__row {
          color:  #2d2727 !important;
          text-align: left !important;
          font-size:  14px !important;
          font-weight: 500 !important;
          position: relative !important;
          align-self: stretch !important;
          line-height:1;
          min-height: 60px;
      }

      .pricing__table .pt__title .pt__title__wrap .pt__row:first-child {
        color:  #2d2727 !important;
        text-align: left !important;
        font-size:17px !important;
        font-weight: 500 !important;
        position: relative !important;
        align-self: stretch !important;
      }
      .pricing__table .pt__option .pt__option__item .pt__item .pt__row {
        margin-top: 15px !important;
        margin-bottom: 15px !important;
        min-height: 105px !important;
      }
      .pricing__table .pt__option .pt__option__item .pt__item .pt__row{
        color: #2d2727 !important;
        text-align: center !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        position: relative !important;
        align-self: stretch !important;
        line-height:1;
        min-height: 60px;
      }

      .pricing__table .pt__option .pt__option__item .pt__item .pt__row:first-child{
        color: #2d2727 !important;
        text-align: center !important;
        font-size: 16px !important;
        font-weight: 500 !important;
        position: relative !important;
        align-self: stretch !important;
      }

      .pricing__table .pt__option .pt__option__item .pt__item .pt__row:first-child {
        min-height: 134px !important;
      }
      .p_air_non_air{
        margin-bottom: 9px;
      }
      .icon_air_or_nonair{
        margin-bottom: -15px;
      }
      .summary-destination{
        top: -60px;
        max-width: 100px;
      }

      .summary-destination-airnonair{
      }
      .package_summary_text_2nd{
        height: 68px !important;
        line-height: 1px
      }
      .air_travel_792_18613,
      .destination_792_18609,
      .package-destination-date,
      .package-destination-list,
      .package-air-or-non-air-count{
        color: #6a6f74;
        text-align: left;
        font-size:14px;
        line-height: 24px;
        font-weight:500;
        position: relative;
      }
      .btn-arrow-icon {
        height: 40px !important;
      }

      .btn-arrow-icon-secondary {
        height: 40px !important;
      }
      .btn-arrow-icon-red {
        height: 40px !important;
      }
      .package-title svg{
        height: 22px;
        width: 22px;
      }
      .package-coverage{
        width:85%;
      }

      .package-coverage-icon{
        width: 20px;
      }

      /* .package-coverage-content{
        color: #585858;
        text-align: left;
        font-size: 12px;
        font-weight: 400;
        position: relative;
        align-self: stretch;
        display: flex;
        align-items: center;
        justify-content: flex-start;
      } */
      /* .package-coverage-title{
          color: #2d2727;
          text-align: left;
          font-size: 14px;
          font-weight:  400;
          position: relative;
          flex: 1;
          display: flex;
          align-items: center;
          justify-content: flex-start;
      } */
    

      .package-dollar-premium-label{
          color: #585858;
          text-align: center;
          font-size: 12px;
          font-weight: 500;
          position: relative;
          align-self: stretch;
          display: flex;
          align-items: center;
          justify-content: center;
      }
      .package-piso-premium,
      .package-dollar-premium{
        color: #2d2727;
        text-align: center;
        font-size: 24px;
        font-weight: 700;
        position: relative;
        align-self: stretch;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .package-title label{
        color: #303030;
        text-align: left;
        font-size:  18px;
        font-weight: 700;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
      }
      .div-card-package-alignment{
        margin-top: -30px;
      }
      .you_have_selected_auto_excel_plus_compre_I627_14853_577_17400{
          color:  #303030;
          text-align: left;
          font-family:  "Inter-Regular", sans-serif;
          font-size:  12px;
          font-weight: 400;
          position: relative;
      }
      .div-dollar-content{
        padding-top: 5px !important;
        padding-bottom: 5px !important;
      }
      .dollar-description-details-icon{
        width:20px;
      }
      .dollar-description-details-cp{
        width: 90%;
      }
      .icon-calculator_I392_14745_627_4493{
        margin-top: -24px !important;
        margin-left: 0px !important;
      }
        .select_one_insurance_plan{
          font-size: 16px;
          font-weight: 500;
          color: #2d2727;
          text-align: center;
          font-family: "Inter-Medium",sans-serif;
          position: relative;
          align-self: stretch;
        }
        .insurance_plans_available_for_you{
          font-size: 12px;
          font-weight: 400;
        }
        .web-only{
          display: none;
        }
        .div-bottom-page{
          display:none;
        }
          .mobile-air-label-tag{
            margin-top:-15px;
          }
          .col-md-12_space{
            display:block;
            line-height: 13px;
          }
          
          .option-tab-a {
              padding-left: 30px !important;
              padding-right: 30px !important;
          }
          .col-md-12_cp_only {
              display: block;
              line-height: 5;
          }
          .input {
            padding:0px !important;
          }

          .cp-spacing-input{
            margin-bottom:25px !important;
          }

          .break-two{
            display:none !important
          }
          .title_page_itp_center,
          .title_page_itp{
            margin-top:32px;
            text-align: center !important;
            font-size:  18px !important;
            font-weight: 500 !important;
          }

          .title_page_itp svg{
            height: 15px;
            width: 15px;
            margin-bottom: 3px;
          }

          .form-group .text-start{
            font-size:12px !important;
          }

          .form-group input{
            font-size:14px !important;
          }
          .title_page_itp_sub_left,
          .title_page_itp_sub{
            font-size: 16px !important;
            text-align: center !important;

          }

          .destination-option-yes{
            width: 135px ;
            height: 35px ;
          }

          .destination-option-yes p{
            font-size:14px;
            font-weight: 400;
          }

          .destination-option-yes svg{
            width: 12px !important;
            height: 12px !important;
          }

          .destination-option-no{
            width: 135px;
            height: 35px;
          }

          .destination-option-no p{
            font-size:14px;
            font-weight: 400;
          }

          .destination-option-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          /* .destination-option-yes{
            width: 135px !important;
            height: 35px !important;
            margin-left: 30px;
          } */
          .air-destination{
            width: 135px;
            height: 35px;
            /* margin-left: 40px; */
          }
          
          .non-air-destination{
            width: 135px ;
            height: 35px ;
            /* margin-left: -20px; */
          }

          .non-air-destination svg,
          .air-destination svg{
            width: 12px !important;
            height: 12px !important;
          }

          .non-air-destination p,
          .air-destination p{
            font-size:14px;
            font-weight: 400;
          }

          
          .covid-div-no{
            width: 135px ;
            height: 35px ;
          }
          
          .covid-div-yes{
            width: 135px ;
            height: 35px ;
          } 


          .covid-btn-15days{
            width: 135px;
            height: 35px;
          }

          .covid-btn-entire_trip{
            width: 135px;
            height: 35px;
            margin-top: -29px;
            position: absolute;
          }

          .covid-div-yes svg,
          .covid-btn-15days svg,
          .covid-btn-entire_trip svg,
          .covid-div-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          .covid-btn-entire_trip svg {
            width: 25px !important;
            height: 25px !important;
          }

          .covid-div-yes p,
          .covid-div-no p{
            font-size:14px;
            font-weight: 400;
          }
          .covid-btn-entire_trip p,
          .covid-btn-15days p{
            font-size:13px;
            font-weight: 400;
          }

          .cruise-div-no{
            width: 135px;
            height: 35px;
          }
          
          .cruise-div-yes{
            width: 135px;
            height: 35px;
          }

          .cruise-div-yes svg,
          .cruise-div-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          .cruise-div-yes p,
          .cruise-div-no p{
            font-size:14px;
            font-weight: 400;
          }

          .pwd-div-no{
            width: 135px;
            height: 35px;
          }
          
          .pwd-div-yes{
            width: 135px;
            height: 35px;
          }

          .pwd-div-yes svg,
          .pwd-div-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          .pwd-div-yes p,
          .pwd-div-no p{
            font-size:14px;
            font-weight: 400;
          }

          .pwd-div-no{
            width: 135px;
            height: 35px;
          }
          
          .pwd-div-yes{
            width: 135px;
            height: 35px;
          }

          .pwd-div-yes svg,
          .pwd-div-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          .pwd-div-yes p,
          .pwd-div-no p{
            font-size:14px;
            font-weight: 400;
          }

          .rtpcr-div-no{
            width: 135px;
            height: 35px;
          }
          
          .rtpcr-div-yes{
            width: 135px;
            height: 35px;
          }

          .rtpcr-div-yes svg,
          .rtpcr-div-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          .rtpcr-div-yes p,
          .rtpcr-div-no p{
            font-size:14px;
            font-weight: 400;
          }

          .agent-div-no{
            width: 135px;
            height: 35px;
          }
          
          .agent-div-yes{
            width: 135px;
            height: 35px;
          }

          .agent-div-yes svg,
          .agent-div-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          .agent-div-yes p,
          .agent-div-no p{
            font-size:14px;
            font-weight: 400;
          }

          .promo-div-no{
            width: 135px;
            height: 35px;
          }
          
          .promo-div-yes{
            width: 135px;
            height: 35px;
          }

          .promo-div-yes svg,
          .promo-div-no svg{
            width: 12px !important;
            height: 12px !important;
          }

          .promo-div-yes p,
          .promo-div-no p{
            font-size:14px;
            font-weight: 400;
          }

          .date{
            width: 100% !important;
          }

          .div-success-promo {
            height: 100px;
          }

          .covid-19_assistance_coverage_label {
            font-size: 12px !important;
          }
          .text-covid-cruise-details {
            width:90%;
          }
          .covid-19_assist_provides_coverage_for_me_543_19034 svg{
            margin-bottom: 60px;
          }
          .consent-box-style-head{
            padding:20px 20px 20px 20px !important;
            display:none;
          }
    </style>
  @else
   <style>
     .modal-covid-title{
        color:  #2d2727;
        text-align: left !important;
        font-size:  14px !important;
        line-height:  24px !important;
        font-weight:  700 !important;
      }

      #modal-popup-first-page-no-covid{
        margin-left:25px;
      }
      #modal-citizenship{
        margin:0px 0px 0px  20px !important;
      }
      .summary-adjust-margin{
        margin-left:0px !important;
      }
      .add-beneficiary{
        background: #008080;
        border-radius: 3px;
        padding: 10px 20px 10px 20px;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color:  #ffffff;
        text-align: left;
        font-size: 12px;
        line-height: 20px;
        font-weight: 500;
        position: relative;
      }
      .quote-request-destination-details-sub,
      .quote-request-travel-type-sub,
       .quote-request-choose-destination-sub{
          color: #2d2727;
          text-align: center;
          font-size: 23px;
          font-weight:500;
          position: relative;
      }
      .personal-data-pwd-title,
      .personal-data-emergency-title,
      .personal-data-beneficiary-title,
      .personal-data-indentification-title,
      .personal-data-present-address-info-title,
      .personal-data-additional-info-title,
      .personal-data-perssonal-info-title,
      .quote-request-promo-title,
      .quote-request-cruise-coverage-title,
      .quote-request-covid-coverage-title,
      .quote-request-travel-info-title,
      .quote-request-personal-info-title{
        color: #2d2727;
        text-align: center;
        font-family: "Inter-Bold", sans-serif;
        font-size: 27px;
        font-weight: 700;
        position: relative;
        text-align:center !important;
      }

      .personal-data-pwd-title svg,
      .personal-data-emergency-title svg,
      .personal-data-beneficiary-title svg,
      .personal-data-indentification-title svg,
      .personal-data-present-address-info-title svg,
      .personal-data-additional-info-title svg,
      .personal-data-perssonal-info-title svg,
      .quote-request-cruise-coverage-title svg,
      .quote-request-covid-coverage-title svg,
      .quote-request-travel-info-title svg,
      .quote-request-personal-info-title svg {
        margin-top: -5px;
      }
      .summary-success-svg{
        margin-left: 0px !important;
      }
      .amount-quote-font{
        color: #2d2727 !important;
        text-align: right !important;
        font-size: 23px !important;
        font-weight: 700 !important;
        position: relative !important;
        width: 152px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
      }
      .subamount-quote-font{
        color: #2d2727 !important;
        text-align: right !important;
        font-size: 16px !important;
        line-height:  24px !important;
        font-weight:  700 !important;
        position: relative !important;
        width: 152px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
      }
      .summary-computation-list{
        color:#2d2727 !important;
        text-align: left !important;
        font-size: 14px !important;
        line-height: 24px !important;
        font-weight: 500 !important;
        position: relative !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
      }
        .summary_title_header{
          color:  #2d2727;
          text-align: center;
          font-size: 27px;
          font-weight: 700;
          position: relative;
          align-self: stretch;
        }
        .title_page_itp_style23{
            color:#2d2727 !important;
            text-align: left !important;
            font-size: 23px !important;
            font-weight: 700 !important;
            position: relative !important;
        }
        .pricing__table .pt__option .pt__option__item .pt__item .pt__row{
          color: #2d2727 !important;
          text-align: center !important;
          position: relative !important;
          align-self: stretch !important;
          line-height:1 !important;
          min-height: 75px;
          font-size: 14px !important;
          line-height: 24px !important;
          font-weight: 500 !important;
        }
        .pricing__table .pt__option .pt__option__item .pt__item .pt__row:first-child{
          color: #2d2727 !important;
          text-align: center !important;
          font-size: 23px !important;
          font-weight:  700 !important;
          position: relative !important;
          align-self: stretch !important;
        }
        .pricing__table .pt__title .pt__title__wrap .pt__row:first-child {
          color: #2d2727 !important;
          text-align: center !important;
          font-size: 16px !important;
          font-weight:  700 !important;
          position: relative !important;
          align-self: stretch !important;
        }
        .pricing__table .pt__title .pt__title__wrap .pt__row {
            color:  #2d2727 !important;
            text-align: left !important;
            position: relative !important;
            align-self: stretch !important;
            line-height:1 !important;
            min-height: 75px !important;
            font-size: 14px !important;
            line-height: 24px !important;
            font-weight: 500 !important;
        }

        .svg_icon_check_more_package{
          height: 18px;
          width: 18px;
          margin-left: -10px;
          margin-top: 3px;
        }

        .svg_icon_check_more_package_executive{
          height: 18px;
          width: 18px;
          margin-left: -16px;
          margin-top: -7px;
        }
      .div-dollar-content-package{
        padding-left:10px !important;
        padding-right:10px !important;
      }
      .dollar-conten-more-package-p-web{
        margin-left: -80px !important;
      }
      .dollar-conten-more-package-p{
        margin-left: 0px !important;
      }

      
      .div-dollar-conten-more-package{
        padding-left:10px !important;
        padding-right:10px !important;
      }
      .dollar-description-details-cp-package,
      .dollar-rate-more-package {
        margin-left: 0px !important;
      }
      .dollar-description-details-icon-more-package svg {
        margin-left:-1px !important;
      }
      .dollar-rate-more-package-div {
        width:80%
      }
      .pricing__table .pt__option .pt__option__item .pt__item .pt__row {
      font-size: 14px;
      font-weight: 400;
      line-height: 35px;
    }
    .table-row-adjusted{
      line-height: 92px;
    }
    .you_have_selected_auto_excel_plus_compre_I627_14853_577_17400{
      margin-left: -20px;
    }
    .progress_scrolled{
      background: linear-gradient(
      90deg,
      rgba(205, 72, 139, 0.4) 0.4999999888241291%,
      rgba(205, 72, 139, 0) 44.49999928474426%
    ),
    linear-gradient(
      90deg,
      rgba(0, 128, 128, 0.15) 54.00000214576721%,
      rgba(0, 128, 128, 0.3) 68.51787567138672%,
      rgba(0, 128, 128, 0.5) 87.1172308921814%
    ),
    linear-gradient(to left, #008080, #008080);
    }
    .form-control:focus {
      color: #fff  !important;
      background-color: #008080  !important;
      border-color: #008080;
    }
   
    @media screen and (min-width: 799px) {
          .date{
            width: 95% !important;
          }

          .date-until{
            margin-left:14px;
          }
          .col-md-12_space{
            display:block;
          }
          .destination-option-yes{
            /* margin-left:37px; */
          }
          .destination-option-no{
            /* margin-left:-19px; */
          }
          .air-destination{
            width: 175px !important;
            height: 74px !important;
            /* margin-right:30px; */
            /* margin-left:-50px; */
          }
          
          .non-air-destination{
            width: 175px !important;
            height: 74px !important;
          }

          .non-air-destination svg,
          .air-destination svg{
            width: 20px !important;
            height: 20px !important;
          }

          .non-air-destination p,
          .air-destination p{
            font-size:16px;
            line-height: 24px;
            font-weight: 500;
          }

          .covid-div-no{
            width: 175px !important;
            height: 74px !important;
          }
          
          .covid-btn-15days{
            width: 10.938rem !important;
            height: 4.625rem !important;
          }

          .covid-btn-entire_trip{
            width: 18.5rem !important;
            height: 4.625rem !important;
          }

          .covid-div-yes{
            width: 175px !important;
            height: 74px !important;
          }

          .covid-btn-15days svg,
          .covid-btn-entire_trip svg,
          .covid-div-yes svg,
          .covid-div-no svg{
            width: 20px !important;
            height: 20px !important;
          }

          .covid_15_days,
          .entire_duration_covid,
          .covid-div-yes p,
          .covid-div-no p{
            font-size:16px;
            line-height: 24px;
            font-weight: 500;
          }

          .cruise-div-no{
            width: 175px !important;
            height: 74px !important;
          }
          
          .cruise-div-yes{
            width: 175px !important;
            height: 74px !important;
          }

          .cruise-div-yes svg,
          .cruise-div-no svg{
            width: 20px !important;
            height: 20px !important;
          }

          .cruise-div-yes p,
          .cruise-div-no p{
            font-size:16px;
            line-height: 24px;
            font-weight: 500;
          }

          .pwd-div-no{
            width: 175px !important;
            height: 74px !important;
          }
          
          .pwd-div-yes{
            width: 175px !important;
            height: 74px !important;
          }

          .pwd-div-yes svg,
          .pwd-div-no svg{
            width: 20px !important;
            height: 20px !important;
          }

          .pwd-div-yes p,
          .pwd-div-no p{
            font-size:16px;
            line-height: 24px;
            font-weight: 500;
          }

          .rtpcr-div-no{
            width: 175px !important;
            height: 74px !important;
          }
          
          .rtpcr-div-yes{
            width: 175px !important;
            height: 74px !important;
          }

          .rtpcr-div-yes svg,
          .rtpcr-div-no svg{
            width: 20px !important;
            height: 20px !important;
          }

          .rtpcr-div-yes p,
          .rtpcr-div-no p{
            font-size:16px;
            line-height: 24px;
            font-weight: 500;
          }

            .agent-div-no{
            width: 175px !important;
            height: 74px !important;
          }
          
          .agent-div-yes{
            width: 175px !important;
            height: 74px !important;
          }

          .agent-div-yes svg,
          .agent-div-no svg{
            width: 20px !important;
            height: 20px !important;
          }

          .agent-div-yes p,
          .agent-div-no p{
            font-size:16px;
            line-height: 24px;
            font-weight: 500;
          }
          .promo-div-no{
            width: 175px !important;
            height: 74px !important;
          }
          
          .promo-div-yes{
            width: 175px !important;
            height: 74px !important;
          }

          .promo-div-yes svg,
          .promo-div-no svg{
            width: 20px !important;
            height: 20px !important;
          }

          .promo-div-yes p,
          .promo-div-no p{
            font-size:16px;
            line-height: 24px;
            font-weight: 500;
          }
      .col-md-12_ {
          display: block;
          line-height: 5;
          z-index: -1;
      }

      .col-md-12_2 {
          display: block;
          line-height: 2;
      }

      .cp-spacing-input{
          margin-bottom:25px !important;
      }
    }
    
    /* end red */
    .upload:focus,
    .upload:active{
        background-color:#edcadc !important;
        color:#fff !important;
    }

    .upload:hover{
      box-shadow: 0px 4px 4px 0px rgba(237, 180, 209, 0.5);
    }


    </style>
  @endif
<style>
  .subjectivity-non-active{
    max-height:0px !important;
  }
  .subjectivity-active{
    max-height:138px !important;
  }
    /* General styling for div list */
    .div-list {
            padding-left: 20px; /* Indentation for the list */
        }

        .div-list-item {
            position: relative;
            padding-left: 15px; /* Space for the number */
            font-family: "Inter-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
        }

        .div-list-item::before {
            content: counter(item) ". "; /* Automatically adds a number followed by a period */
            position: absolute;
            left: 0;
            top: 0;
            font-family: "Inter-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
        }

        /* Initialize the counter for the div-list */
        .div-list {
            counter-reset: item; /* Resets the counter for the list */
        }

        .div-list-item {
            counter-increment: item; /* Increments the counter for each list item */
        }

        .sublist {
            margin-left:15px; /* Indentation for sublist */
        }

        .sublist-item {
            font-family: "Inter-Regular", sans-serif;
            position: relative;
            padding-left: 15px; /* Space for the dash */
            font-size: 12px; /* Smaller font size for sublist */
        }

        .sublist-item::before {
            content: "- "; /* Dash before each sublist item */
            position: absolute;
            left: 0;
            top: 0;
            font-family: "Inter-Regular", sans-serif;
            font-size: 12px; /* Dash font size */
        }

        @media (max-width: 600px) {
            .div-list-item {
                font-size: 15px; /* Smaller font size for mobile */
                padding-left: 15px; /* Adjust padding for mobile view */
            }

            .div-list-item::before {
                font-size: 12px; /* Adjust number size for mobile */
            }

            .sublist-item {
                font-size: 12px; /* Smaller font size for sublist on mobile */
            }
        }

        /* Tablet responsiveness */
        @media (max-width: 900px) {
            .div-list-item {
                font-size: 12px; /* Adjust font size for tablets */
            }

            .div-list-item::before {
                font-size: 12px; /* Adjust number size for tablets */
            }
        }

    .summary-title-travel-price-breakdown{
      
      border-radius: 5px 5px 0px 0px;
      padding: 10px;
      display: flex;
      flex-direction: row;
      gap: 10px;
      align-items: center;
      justify-content: center;
      align-self: stretch;
      flex-shrink: 0;
      position: relative;
    }

    .summary-title-travel-price-breakdown-text{
      color: #ffffff;
      font-size: 14px;
      line-height: 24px;
      font-weight: 500;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }
    dl, ol, ul {
      font-family: "Inter-Bold", sans-serif !important;
    }

  /* Custom list style with hyphen */
  .custom-list {
    list-style-type: none; /* Remove default markers */
    padding-left: 0; /* Remove default padding */
  }

  .custom-list li {
    position: relative; /* Ensure that the custom marker can be positioned correctly */
    padding-left: 20px; /* Add some space on the left for the marker */
  }

  .custom-list li::before {
    content: "-"; /* Custom marker */
    position: absolute; /* Position the marker on the left */
    left: 0; /* Align it to the left of the li */
    top: 0; /* Align it to the top of the li */
  }

    /* Disable the ::before pseudo-element for the h2 with id 'h2-warranty' */
    #h2-warranty::before {
      content: none !important;  /* This removes any content generated by the ::before pseudo-element */
    }
  .btn-arrow-icon-secondary-back:visited::before, .btn-arrow-icon-secondary-back:focus::before, .btn-arrow-icon-secondary-back:hover::before {
    margin-right:-10px;
    content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23008080' d='M-2.707 15.293l9-9a1 1 0 0 1 1.415 1.415L-0.587 15H19a1 1 0 0 1 0 2H-0.586l7.293 7.293a1 1 0 0 1-1.415 1.415l-9-9a1.001 1.001 0 0 1 0-1.415Z'/%3E%3C/svg%3E") !important;
  }
  /* .form-select{
    background-image:none !important;
  } */
  .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
  width: 100%;
  padding-right: 34px !important;
 }
  .bs-searchbox .form-control {
    background-color: #fafafa !important;
    border-radius: 5px !important;
    border-style: solid !important;
    border-color: #f7f7f7 !important;
    border-width: 1px !important;
    color: #585858 !important;
    padding: 5px 12px 5px 12px;
    display: flex !important;
    flex-direction: column !important;
    gap: 0px !important;
    align-items: flex-start !important;
    justify-content: center !important;
    flex: 1 !important;
    min-height: 24px !important;
    position: relative !important;
  }

 
  .bs-searchbox .form-control {
      padding-left: 2.1rem !important; /* Space for the icon */
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23999"><path d="M10.5 2a8.5 8.5 0 1 0 5.17 15.17l5.25 5.25 1.41-1.41-5.25-5.25A8.5 8.5 0 0 0 10.5 2zm0 15A6.5 6.5 0 1 1 17 10.5 6.5 6.5 0 0 1 10.5 17z"/></svg>'); /* Change color as needed */
      background-size: 20px 20px; /* Adjust size */
      background-repeat: no-repeat;
      background-position: 10px center; /* Adjust position */
      border: 1px solid #ccc; /* Optional: border */
  }



  .bs-searchbox .form-control:focus {
    background-color: #f7ffff !important;
    border-radius: 5px !important;
    border-style: solid !important;
    border-color: #f7f7f7 !important;
    border-width: 1px !important;
    color: #585858 !important;
    padding: 5px 12px 5px 12px;
    display: flex !important;
    flex-direction: column !important;
    gap: 0px !important;
    align-items: flex-start !important;
    justify-content: center !important;
    flex: 1 !important;
    min-height: 24px !important;
    position: relative !important;
  }

  /* Optional: Change placeholder text color */
  .bs-searchbox .form-control::placeholder {
      color: #888; /* Change placeholder color */
  }
  .dropdown-menu{
    z-index:0px !important
  }

  .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover {
    background-color: #e0f5f5 !important;
    background-repeat: repeat-x !important;
    background-image: none !important;
    color: #000 !important;
  }

  .rotate {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' transform='rotate(180)'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e")  !important;
  }
  .form-select {
    display: block;
    width: 100%;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1.2rem;
    background-size: 2rem 1rem;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
  }


</style>
<style>
  
  .form-control:disabled{
      background-color: #c0e6e6 !important; /* Change to your desired color */
      border-color: #c0e6e6 !important; /* Change to your desired color */
    }
  .tooltip-container {
      cursor: pointer;
  }

  .tooltip {
      visibility: hidden; /* Hidden by default */
      width: 20rem;
      background-color: white; /* White background */
      color: black; /* Text color */
      text-align: center;
      border: 1px solid #ccc; /* Optional border */
      border-radius: 5px; /* Rounded corners */
      padding: 10px;
      position: absolute;
      z-index: 1;
      bottom: 111%;
      left: 66%;
      transform: translateX(-50%); /* Center the tooltip */
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Shadow for depth */
      transition: visibility 0s, opacity 0.5s linear; /* Smooth transition */
      opacity: 0; /* Start as invisible */
  }

  .tooltip-container:hover .tooltip {
      visibility: visible; /* Show on hover */
      opacity: 1; /* Fade in */
  }

  .tooltip::after {
      content: '';
      position: absolute;
      top: 100%; /* Position at the bottom of the tooltip */
      left: 50%;
      margin-left: -5px; /* Center the arrow */
      border-width: 5px;
      border-style: solid;
      border-color: white transparent transparent transparent; /* Arrow color */
  }
    .btn-arrow-icon{
        height: 48px;
        border-radius: 4px !important;
        background: #008080;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color: #ffffff;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index:1 !important;
    }

    .btn-arrow-icon:hover{
        background-color:#008080 !important;
        border:1px solid #008080 !important;
        color:#fff !important;
    }
    .btn-arrow-icon:focus,
    .btn-arrow-icon:active{
        background-color:#60b3b3 !important;
        border:1px solid #60b3b3 !important;
        color:#fff !important;
    }

    .btn-arrow-icon:focus:before,
    .btn-arrow-icon:active:before{
        background-color:transparent !important;
        color:#fff !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    }

    .btn-arrow-icon:visited:before,
    .btn-arrow-icon:target:before,
    .btn-arrow-icon:hover:before {
        background-color: transparent !important;
        color:#fff !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    } 



    /* secondary */
    .btn-arrow-icon-secondary{
        height: 48px;
        border-radius: 4px !important;
        border:0;
        background-color:transparent;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color:#008080;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index:1 !important;
    }

    .btn-arrow-icon-secondary:hover{
        background-color:transparent !important;
        color:#008080 !important;
        border: 1px solid #008080 !important;
    }

    .btn-arrow-icon-secondary:focus,
    .btn-arrow-icon-secondary:active{
        background-color:#c0e6e6 !important;
        border:1px solid #c0e6e6 !important;
        color:#008080 !important;
    }

    .btn-arrow-icon-secondary:focus:before,
    .btn-arrow-icon-secondary:active:before{
        background-color:transparent !important;
        color:#008080 !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23008080' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    }

    .btn-arrow-icon-secondary:visited:before,
    .btn-arrow-icon-secondary:target:before,
    .btn-arrow-icon-secondary:hover:before {
        background-color: transparent !important;
        color:#008080 !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23008080' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    } 
    /* end secondary */

      /* red */
      .btn-arrow-icon-red{
        height: 48px;
        border-radius: 4px !important;
        border:1px solid #dd0707;
        background-color:transparent;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color:#dd0707;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        z-index: 1 !important;
    }

    .btn-arrow-icon-red:hover{
        background-color:transparent !important;
        color:#dd0707 !important;
        border: 1px solid #dd0707 !important;
    }

    .btn-arrow-icon-red:focus,
    .btn-arrow-icon-red:active{
        background-color:#ffe2e2 !important;
        border:1px solid #ffe2e2 !important;
        color:#dd0707 !important;
    }

    .btn-arrow-icon-red:focus:before,
    .btn-arrow-icon-red:active:before{
        background-color:transparent !important;
        color:#dd0707 !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23dd0707' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    }

    .btn-arrow-icon-red:visited:before,
    .btn-arrow-icon-red:target:before,
    .btn-arrow-icon-red:hover:before {
        background-color: transparent !important;
        color:#dd0707 !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23dd0707' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    } 
  .bootstrap-select > .dropdown-toggle {
    width: 100%;
    padding-right: 25px;
    z-index: 1;
    top: -10px;
    padding: 0px 0px 0px 0px !important;
  }

  .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
    width: 100%;
    border-bottom: 1px solid #008080;
  }
  .upload-file-text{
    color: #585858;
    text-align: left;
    font-family: "Inter-Regular", sans-serif;
    font-size:16px;
    line-height: 24px;
    font-weight: 400;
    position: relative;
    opacity:0.6;
  }
  .more-package-option,
  .package-option,
  .text-set-as-default,
  #covid-details,
  #cruise-details{
    cursor:pointer;
  }
   .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: 100%;
      }
      .btn-select{
        border-bottom: 1px solid #008080 !important;
      }
    .invalid-select {
      border-bottom: 2px solid #dd0707 !important;
      color: #dd0707 !important;

    }
    .btn-default {
      color: #484747 !important;
      border-radius: 0px !important;
      height: 45px !important;
      font-size: 16px !important;
    }
      form .form-select {
      background-color: transparent !important;
    }
    .btn-check:focus + .btn, .btn:focus {
      outline: 0;
      box-shadow: none !important;
    }
    .bootstrap-select .dropdown-toggle:focus {
      outline: none !important;
      outline: none!important;
      outline-offset: 0px;
    }

    form .form-select {
      background-color: transparent;
    }

    .btn-group.open .dropdown-toggle {
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
    }
    .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover {
      background-color: #e8e8e8;
      background-image: -webkit-linear-gradient(top,#e0f5f5,#e0f5f5 100%);
    }

    .agent_no_text,
    .agent_yes_text,
    .rtpcr_no_text,
    .rtpcr_yes_text,
    .pwd_yes_text,
    .pwd_no_text,
    .no_promo_text,
    .yes_promo_text {
      z-index: 1;
      text-align: center;
      vertical-align: center;
      color: rgb(228, 80, 154);
      letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
      line-height: calc(var(--web_medium_body_line-height) * 1px);
      text-decoration-line: var(--web_medium_body_text-decoration-line);
      margin-top: 15px;
    }
    .form-control-disabled:active,
    .form-control-disabled:focus {
      outline: none !important;
      background-color: rgb(228, 80, 154) !important;
      border-color: rgb(228, 80, 154) !important;
      color: #fff !important;
        p{
          color:#fff !important;
        }
    }  
    .active-option{
        cursor:pointer !important;
        background-color: rgb(228, 80, 154) !important;
        color:#fff !important;
        border-color: rgb(228, 80, 154) !important;
    }
    .option-tab-a-hover:hover{
        display: absolute;
        color: #fff !important;
        background-color: rgb(228, 80, 154) !important;
    }

    .option-tab-a-hover:hover:before{
      /* content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A"); */
        p{
          color:#fff !important;
        }
    }
    .option-tab-a-hover:hover p{
          color:#fff !important;
    }

    
    .option-tab-a-selected-hover:hover{
        display: absolute;
        color: rgb(228, 80, 154) !important;
        border: 1px solid rgb(228, 80, 154) !important;
        background-color: transparent !important;
    }

    .option-tab-a-selected-hover:hover:before{
      /* content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A"); */
        p{
          color: rgb(228, 80, 154) !important;
        }
    }
    .option-tab-a-selected-hover:hover p{
          color:rgb(228, 80, 154) !important;
    }

    .form-control:disabled, .form-control[readonly] {
      background-color: #008080;
    }
    .break-line{
            line-height: 5px !important;
    }

    .option_tab{
      cursor:pointer;
    }
    .active-option:active,
    .active-option:focus-visible,
    .active-option:focus-within,
    .active-option:visited,
    .active-option:target,
    .active-option:active,
    .active-option:focus{
        cursor:pointer !important;
        background-color: rgb(228, 80, 154) !important;
        color:#fff !important;
        border-color: rgb(228, 80, 154) !important;
    }
      .upload-file-name{
        color: #2d2727;
        text-align: left;
        font-size:  23px;
        font-weight:  400;
        position: relative;
        align-self: stretch;
      }
    .upload:visited,
    .upload:active,
    .upload:hover,
    .upload:link,
    .upload {
      background:  #e4509a;
      border-radius: 5px;
      padding: 15px;
      flex-direction: row;
      gap: 15px;
      align-items: center;
      flex-shrink: 0;
      color:#fff;
      font-size: 16px;
      line-height: 24px;
      font-weight:  400;
    }

    
    .more-package-column{
      background-color:#dbedea;
      font-weight:700;
    }
    .panel{
      color:#2d2727;
      text-align: left;
      font-family: "Inter-Regular", sans-serif;
      font-size: 12px;
      font-weight: 400;
      flex: 1;
      border-top: 0 !important;
      max-height: auto !important;
    }
    .panel .col-md-12{
        background-color:#fff !important;
    }
  input[type="date"]::-webkit-calendar-picker-indicator {
    cursor: pointer;
    border-radius: 4px;
    margin-right: 2px;
    opacity: 0.6;
    filter: invert(0.8);
  }

  input[type="date"]::-webkit-calendar-picker-indicator:hover {
    opacity: 1
  }


     .btn-continue{
        border-radius:4px !important;
    }
  .button-icon-background-2{
    width: 25px;
    background: #e3f5f9;
    text-align: right;
    border-radius: 50px;
    margin-left: 62px;
    position: inherit;
    margin-top: 10px;
    cursor: pointer;
  }
  input[type=file]::file-selector-button {
      display: none;
  }

  input[type=file]::-webkit-file-upload-button {
      display: block;
      width: 0;
      height: 0;
      margin-left: -100%;
  }

  input[type=file]::-ms-browse {
      display: none;
  }

  .btn-continue {
      background-color: #008080;
      color: #fff;
      border-radius: 0px;
      font-size: 18px;
      padding: 15px 25px 15px 25px;
  }

  .btn-back-button {
      color: #008080;
      padding-top: 20px !important;
  }

  .btn-continue:hover {
      color: #fff;
  }

  .button {
      color: var(--primary-teal, #008080);
      text-align: left;
      font-family: var(--web-medium-header-5-font-family,
              "Inter-Medium",
              sans-serif);
      font-size: 18px;
      font-weight: var(--web-medium-header-5-font-weight, 500);
      position: relative;
  }

  .button2 {
      color: #fff;
      text-align: left;
      font-family: var(--web-medium-header-5-font-family, "Inter-Medium", sans-serif);
      font-size: 18px;
      /* font-weight: var(--web-medium-header-5-font-weight, 500); */
      position: relative;
      background-color: #008080;
      border-radius: 5px;


  }

  .button2:hover {
      color: #008080;
      background-color: #fff;
      border-style: solid;
      border-color: #008080;

  }

  .button2:active {
      color: #008080;
      background-color: #fff;
      border-style: solid;
      border-color: #008080;

  }

  .button2::selection {
      color: red;
      background: yellow;
  }

  .button-text-align-center {
      text-align: center;
  }

  .option-tab-a {
      background-color: transparent;
      border: 1px solid rgb(228, 80, 154);
      z-index: 1;
      padding-top: 25px;
      padding-right: 35px;
      padding-bottom: 25px;
      padding-left: 35px;
      border-top-left-radius: 50px;
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
      border-bottom-left-radius: 50px;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      box-sizing: border-box;
      flex-wrap: nowrap;
      row-gap: 12px;
      column-gap: 12px;
      height: 74px;
      width: 151px;
      font-size: 1rem !important;
      font-weight: 400;
      line-height: 1.5;
  }

  .option-tab-text {
      z-index: 2;
      text-align: left;
      vertical-align: top;
      color: var(--primary_white);
      font-size: calc(var(--web_medium_body_font-size) * 1px);
      font-family: var(--web_medium_body_font-family);
      font-weight: var(--web_medium_body_font-weight);
      text-transform: var(--web_medium_body_text-transform);
      letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
      line-height: calc(var(--web_medium_body_line-height) * 1px);
      text-decoration-line: var(--web_medium_body_text-decoration-line);
      padding-top: 15px;
  }

  .upload-file-width {
      z-index: 1 !important;
      width: 80% !important;
      border-bottom: 1px solid #B8B8B8 !important;

  }
  /* .browse-updload-buton:active,
  .browse-updload-buton:hover,
  .browse-updload-buton-pwd:hover,
  .browse-updload-buton-pwd:active,
  .browse-updload-buton-pwd,
  .browse-updload-buton {
      background: #008080;
      border-radius: 3px;
      display: flex;
      flex-direction: row;
      gap: 10px;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      position: relative;
      color:#fff;
      font-size:  16px;
      line-height:  24px;
      font-weight: 500;
      z-index: 1 !important;
  }

  .browse-updload-buton-delete:active,
  .browse-updload-buton-delete,
  .browse-updload-buton-delete-pwd,
  .browse-updload-buton-delete-pwd:hover,
  .browse-updload-buton-delete:hover {
    margin-left: 1rem !important;
    border-radius: 3px;
    border-style: solid;
    border: 1px solid #dd0707 !important;
    border-width: 1px;
    display: flex;
    flex-direction: row;
    gap: 10px;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
    color: #dd0707;
    font-family: "Inter-Medium", sans-serif;
    font-size: 16px;
    line-height: 24px;
    font-weight:  500;
    position: relative;
    background-color:#fff;
    z-index: 1 !important;
  } */


  form .form-select {
      height: 45px !important;
  }

  input {
      height: 45px !important;
  }

  .col-md-12_ {
      display: none;
  }

  .col-md-12_2 {
      display: none;
  }

  .col-md-12_cp_only {
      display: none;
  }

 .text-label-default{
    margin: 0 !important; 
    background-color: transparent; 
    height: 12px; 
    font-size: 10px;
    color:#848a90;
    padding-left: 11px !important;
  }
  .text-label-default-disabled{
    margin: 0 !important; 
    background-color: #F5F5F5; 
    height: 12px; 
    font-size: 10px;
    color:#848a90;
    line-height: 1rem;
    padding-left: 11px !important;
  }
  


  .title_page_itp {
      z-index: 1;
      text-align: left;
      font-size: 27px;
      font-weight: 700;
      text-transform: none;
  }

  .title_page_itp_center {
      z-index: 1;
      text-align: center;
      font-size: 27px;
      font-weight: 700;
      text-transform: none;
  }

  .title_page_itp_sub {
      z-index: 1;
      text-align: center;
      font-size: 20px;
      text-transform: none;
  }

  .title_page_itp_sub_left {
      z-index: 1;
      text-align: left;
      font-size: 20px;
      text-transform: none;
  }

  .promo_error_tag {
      z-index: 1;
      width: 26px;
      height: 26px;
      padding-top: 3px;
      padding-right: 3px;
      padding-bottom: 3px;
      padding-left: 3px;
      background-color: rgb(221, 7, 7, 1);
      border-top-left-radius: 50px;
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
      border-bottom-left-radius: 50px;
      display: inline-block;
      /* display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center; */
      box-sizing: border-box;
      /* flex-wrap: nowrap; */
  }

  .warning-prokmo-icon {
      margin-bottom: 10px;
  }

  .limitation-exclusion-privacy-box {
      background-color: rgb(255, 244, 218, 1);
  }

  .third-page-yellow-box {
      padding: 20px;
      text-align: center;
  }

  .div-12-no-background {
      background-color: #fff;
  }

  /* .card-body {
        flex: 1 1 auto;
        padding-top: 1rem;
        padding-right: 0rem;
        padding-bottom: 1rem;
        padding-left: 0rem;
    } */

  .accordion {
      background-color: #fff;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
      border: 1px solid rgb(192, 230, 230);
      border-bottom: 0 !important;
  }

  /* .accordion:active,
  .accordion:hover {
      border-top: 2px solid rgb(192, 230, 230) !important;
      border-left: 2px solid rgb(192, 230, 230) !important;
      border-right: 2px solid rgb(192, 230, 230) !important;
      
  } */
  .accordion:before {
      /* content: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20viewBox%3D%220%200%2024%2024%22%3E%0A%20%20%3Crect%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22%23E0F5F5%22%20rx%3D%2212%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22teal%22%20d%3D%22M20.03%2015.531a.75.75%200%200%201-1.06%200L12%208.561l-6.97%206.97a.75.75%200%200%201-1.06-1.061l7.5-7.5a.75.75%200%200%201%201.06%200l7.5%207.5a.748.748%200%200%201%200%201.061Z%22%2F%3E%0A%3C%2Fsvg%3E%0A"); */
  }
  .accordion:after {
      content: url("data:image/svg+xml, %3Csvg width='24' height='24' viewBox='0 -7 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' class='icon-caretdown_I392_14474_221_13249'%3E%3Cpath d='M16.281 1.28104 L8.78104 8.78104 C8.71139 8.85077 8.62867 8.90609 8.53762 8.94384 C8.44657 8.98158 8.34898 9.00101 8.25042 9.00101 C8.15186 9.00101 8.05426 8.98158 7.96321 8.94384 C7.87216 8.90609 7.78945 8.85077 7.71979 8.78104 L0.219792 1.28104 C0.0790615 1.14031 0 0.94944 0 0.750417 C0 0.551394 0.0790615 0.360522 0.219792 0.219792 C0.360523 0.0790612 0.551394 1.33227e-15 0.750417 0 C0.94944 0 1.14031 0.0790612 1.28104 0.219792 L8.25042 7.1901 L15.2198 0.219792 C15.2895 0.150109 15.3722 0.0948337 15.4632 0.0571218 C15.5543 0.0194098 15.6519 0 15.7504 0 C15.849 0 15.9465 0.0194098 16.0376 0.0571218 C16.1286 0.0948337 16.2114 0.150109 16.281 0.219792 C16.3507 0.289474 16.406 0.3722 16.4437 0.463245 C16.4814 0.554289 16.5008 0.651871 16.5008 0.750417 C16.5008 0.848963 16.4814 0.946545 16.4437 1.03759 C16.406 1.12863 16.3507 1.21136 16.281 1.28104 Z' fill-rule='nonzero' clip-rule='nonzero' fill='rgba(0, 128, 128, 1)' id='i63h5p'%3E%3C/path%3E%3C/svg%3E");
      /* content: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20viewBox%3D%220%200%2024%2024%22%3E%0A%20%20%3Crect%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22%23E0F5F5%22%20rx%3D%2212%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22teal%22%20d%3D%22M20.03%2015.531a.75.75%200%200%201-1.06%200L12%208.561l-6.97%206.97a.75.75%200%200%201-1.06-1.061l7.5-7.5a.75.75%200%200%201%201.06%200l7.5%207.5a.748.748%200%200%201%200%201.061Z%22%2F%3E%0A%3C%2Fsvg%3E%0A"); */
      color: #777;
      font-weight: bold;
      float: right;
      margin-left: 5px;
      border:0px !important;
  }

  .active:after {
      /* content: "\2212"; */
      border-top:0px !important;
      content: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20viewBox%3D%220%200%2024%2024%22%3E%0A%20%20%3Crect%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22%23E0F5F5%22%20rx%3D%2212%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22teal%22%20d%3D%22M20.03%2015.531a.75.75%200%200%201-1.06%200L12%208.561l-6.97%206.97a.75.75%200%200%201-1.06-1.061l7.5-7.5a.75.75%200%200%201%201.06%200l7.5%207.5a.748.748%200%200%201%200%201.061Z%22%2F%3E%0A%3C%2Fsvg%3E%0A");
      /* content: url("data:image/svg+xml, %3Csvg width='24' height='24' viewBox='0 -7 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' class='icon-caretup_I392_14475_224_1893'%3E%3Cpath d='M16.281 8.78122 C16.2114 8.85095 16.1287 8.90627 16.0376 8.94401 C15.9466 8.98175 15.849 9.00118 15.7504 9.00118 C15.6519 9.00118 15.5543 8.98175 15.4632 8.94401 C15.3722 8.90627 15.2894 8.85095 15.2198 8.78122 L8.25042 1.8109 L1.28104 8.78122 C1.14031 8.92195 0.94944 9.00101 0.750417 9.00101 C0.551394 9.00101 0.360523 8.92195 0.219792 8.78122 C0.0790615 8.64048 3.92322e-09 8.44961 0 8.25059 C-3.92322e-09 8.05157 0.0790615 7.8607 0.219792 7.71996 L7.71979 0.219965 C7.78945 0.150232 7.87216 0.0949136 7.96321 0.0571704 C8.05426 0.0194272 8.15186 0 8.25042 0 C8.34898 0 8.44657 0.0194272 8.53762 0.0571704 C8.62867 0.0949136 8.71139 0.150232 8.78104 0.219965 L16.281 7.71996 C16.3508 7.78962 16.4061 7.87234 16.4438 7.96338 C16.4816 8.05443 16.501 8.15203 16.501 8.25059 C16.501 8.34915 16.4816 8.44675 16.4438 8.5378 C16.4061 8.62884 16.3508 8.71156 16.281 8.78122 Z' fill-rule='nonzero' clip-rule='nonzero' fill='rgba(0, 128, 128, 1)' id='ilt4e3'%3E%3C/path%3E%3C/svg%3E"); */
  }

  .panel {
      padding: 0 18px;
      background-color: white;
      max-height: 0;
      /* overflow: hidden; */
      transition: max-height 0.2s ease-out;
      background-color: rgb(247, 255, 255, 1);
      border: 1px solid rgb(192, 230, 230);
  }

  body,
  .step {
      background: #f7fcff !important;
  }

  input {
      padding: 10px 10px 10px 10px !important;
      border-top: 0px;
      border-left: 0px;
      border-right: 0px;
      border-radius: 1px !important;
      width: 100% !important;
      background-color: #F5F5F5;
      border-bottom: 1px solid #008080 !important;
  }

  form .form-select {
      max-width: 100% !important;
  }


  select {
      padding: 10px 10px 10px 10px !important;
      border-top: 0px;
      border-left: 0px;
      border-right: 0px;
      border-radius: 1px !important;
      width: 100% !important;
      border-bottom: 1px solid #008080 !important;
  }

  /* input:hover{
    border-bottom: 2px solid #008080 !important;
  }  */
  input:focus {
    border-style: solid  !important;
    border-bottom-width: 2px !important;
    
  }

  select:focus {
    border-style: solid  !important;
    border-bottom-width: 2px  !important;
  }

  element {}

  form .form-select {
      max-width: 330px;
      padding: 10px 30px 10px 10px !important;
      font-size: 16px;
      border-radius: 0px;
      border: 0px;
      height: 45px;
      color: #484747;
  }

  .air-label-tag {
      z-index: 1;
      text-align: center;
      vertical-align: top;
      color: rgb(132, 138, 144, 1);
      font-size: 12px;
      font-weight: 400;
      letter-spacing: 0;
      margin-bottom: 0px;
  }

  .covid-19_assistance_coverage_label {
      text-align: left;
      vertical-align: top;
      font-size: 16px;
      font-weight: 400;
      color: rgb(132, 138, 144, 1);
  }

  .pwd_yes_543_19049,
  .pwd_no_543_19047 {
      margin-top: 15px;
  }

  .yellow-box-div {
      background-color: rgb(255, 250, 220);
      padding: 20px 0px 20px 0px;
      text-align: center;
      font-size: 16;
      font-weight: 400;
  }
 
  .form-select:focus {
    outline: none !important;
    box-shadow: none !important;
  }
</style>
<script src="{{ asset('/asset/ecommerce/js/jquery-3.6.0.min.js') }}"></script>
<script>
  
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
  }
</script>
<style>
  .modal-upload-title{
    color: #2d2727;
    text-align: left;
    font-size: 23px;
    font-weight: 500;
    position: relative;
  }
  input{
    background-color: transparent;
  }
  form .form-select {
    background-color: #f7fcff;
  }

  select option {
    background-color:  transparent  !important;
    font-family: "Inter-Bold", sans-serif !important;
  }
  select option:hover {
    background-color: #198754 !important;
    color: #fff !important;
  }

  select option:focus{
    background-color: #198754 !important;
    color: #fff !important;
  }

  select option:active{
    background-color: #198754 !important;
    color: #fff !important;
  }
  .invalid{
    border-bottom: 2px solid #dd0707 !important;
    color: #dd0707  !important;
  }

  .invalid-text{
    color: #dd0707  !important;
  }

  .valid{
    border-bottom: 1px solid darkgreen !important;
  }

  .valid-text{
    color:#848a90 !important;
  }

</style>
<script>
    $(document).ready(function(){

  
        $(document).on('click', '.bootstrap-select', function() {
            if ($(this).hasClass('rotate')) {
                $(this).removeClass('rotate');
            } else {
                $(this).addClass('rotate');
                $(this).addClass('open');
            }
        });

        $(window).keydown(function(event){
          if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
        });
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        

        var $toastContainer = $('.toast-success');
        if ($toastContainer.length > 1) {
            $toastContainer.last().remove();
        }
        var dtTodaybday = new Date();
        var monthbday = dtTodaybday.getMonth() + 1;// jan=0; feb=1 .......
        var daymbday = dtTodaybday.getDate();
        var yearmin = dtTodaybday.getFullYear() - 18;
        var yearmax = dtTodaybday.getFullYear() - 60;
        

        if(monthbday < 10)
            monthbday = '0' + monthbday.toString();
        if(daymbday < 10)
            daymbday = '0' + daymbday.toString();
    	  var minDate = yearmin + '-' + monthbday + '-' + daymbday;
        var maxDate = yearmax + '-' + monthbday + '-' + daymbday;
    	  $('#date-of-birth').attr('max', minDate);
    	  $('#date-of-birth').attr('min', maxDate);
        

      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      $('#destination_from').attr('min', maxDate);

      $("#destination_from" ).on( "change", function() {
        var dtToday = new Date($(this).val());
        var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
          month = '0' + month.toString();
        if(day < 10)
          day = '0' + day.toString();
          var maxDate = year + '-' + month + '-' + day;
        $('#destination_to').attr('min', maxDate);

      });
      
      $("#btn-subjectivies").click(function(e){
          $('#pnl-subjectivies').removeClass('subjectivity-active');
          $('#pnl-subjectivies').removeClass('subjectivity-non-active');
          if ($('#btn-subjectivies').hasClass("active")) {
            $('#pnl-subjectivies').addClass('subjectivity-active');
          }else{
            $('#pnl-subjectivies').addClass('subjectivity-non-active');

        }
      });
        $("#btn-subjectivies-mobile").click(function(e){
          $('#pnl-subjectivies-mobile').removeClass('subjectivity-active');
          $('#pnl-subjectivies-mobile').removeClass('subjectivity-non-active');
          if ($('#btn-subjectivies-mobile').hasClass("active")) {
            $('#pnl-subjectivies-mobile').addClass('subjectivity-active');
          }else{
            $('#pnl-subjectivies-mobile').addClass('subjectivity-non-active');

        }
      });

      $("#btn-subjectivies-final-page").click(function(e){
          $('#pnl-subjectivies-final-page').removeClass('subjectivity-active');
          $('#pnl-subjectivies-final-page').removeClass('subjectivity-non-active');
          if ($('#btn-subjectivies-final-page').hasClass("active")) {
            $('#pnl-subjectivies-final-page').addClass('subjectivity-active');
          }else{
            $('#pnl-subjectivies-final-page').addClass('subjectivity-non-active');

        }
      });
      $("#btn-subjectivies-final-page-mobile").click(function(e){
          $('#pnl-subjectivies-final-page-mobile').removeClass('subjectivity-active');
          $('#pnl-subjectivies-final-page-mobile').removeClass('subjectivity-non-active');
          if ($('#btn-subjectivies-final-page-mobile').hasClass("active")) {
            $('#pnl-subjectivies-final-page-mobile').addClass('subjectivity-active');
          }else{
            $('#pnl-subjectivies-final-page-mobile').addClass('subjectivity-non-active');

        }
      });
   

      $(".subjectivities-active-final-page").click(function(e){
          $('.subjectivities-panel-final-page').removeClass('subjectivity-active');
      });

      jQuery('#modal-citizenship').change(function(){
            $(this).closest('.btn-group').find('button').removeClass('invalid-select');
            $(this).closest('.btn-group').removeClass('invalid-select');
          if($(this).val()==""){
            $('#modal-popup-first-page-confirm').prop('disabled', true);
            $(this).closest('.btn-group').find('button').addClass('invalid-select');
            $(this).closest('.btn-group').addClass('invalid-select');
          }else{
            if($('#chckIAGREE').is(":checked") == true){
                $('#modal-popup-first-page-confirm').prop('disabled', false);
              }else{
                $('#modal-popup-first-page-confirm').prop('disabled', true);
              }
           
           
          }
      });
      $("#chckIAGREE").change(function() {
            $(this).closest('.btn-group').find('button').removeClass('invalid-select');
            $(this).closest('.btn-group').removeClass('invalid-select');
          if(this.checked) {
            if($('#modal-citizenship').val() == ""){
              $(this).closest('.btn-group').find('button').addClass('invalid-select');
              $(this).closest('.btn-group').addClass('invalid-select');
              $('#modal-popup-first-page-confirm').prop('disabled', true);
            }else{

              
              $('#modal-popup-first-page-confirm').prop('disabled', false);
            }
          }else{
            $('#modal-popup-first-page-confirm').prop('disabled', true);

          }
      });

      $('#file-upload-id').on('change', function() {
          startUpload();
      });
      
      $('#pwd-file-upload-id').on('change', function() {
          startUploadPWD();
      });
      function startUpload() {
        const $loadingBar = $('#loading-bar');
        const $loadingProgress = $('#loading-progress');
        const $fileInput = $('#upload-id');

        $loadingBar.show(); // Show the loading bar
        $loadingProgress.width('0%'); // Reset width
        $fileInput.hide(); // Hide the file input

        let progress = 0;

        // Simulate file upload progress
        const interval = setInterval(() => {
            if (progress >= 100) {
                clearInterval(interval); // Stop when 100% is reached
                setTimeout(() => {
                    $loadingBar.hide(); // Hide the loading bar after a short delay
                    $fileInput.show(); // Show the file input again
                }, 500); // Adjust delay before hiding (in milliseconds)
            } else {
                progress += 10; // Increment progress
                $loadingProgress.width(progress + '%'); // Update loading bar width
            }
        }, 200); // Update every 200ms
      }

      function startUploadPWD() {
        const $loadingBar = $('#pwd-loading-bar');
        const $loadingProgress = $('#pwd-loading-progress');
        // const $fileInput = $('#pwd-file-upload-id');

        $loadingBar.show(); // Show the loading bar
        $loadingProgress.width('0%'); // Reset width
        // $fileInput.hide(); // Hide the file input

        let progress = 0;

        // Simulate file upload progress
        const interval = setInterval(() => {
            if (progress >= 100) {
                clearInterval(interval); // Stop when 100% is reached
                setTimeout(() => {
                    $loadingBar.hide(); // Hide the loading bar after a short delay
                    // $fileInput.show(); // Show the file input again
                }, 500); // Adjust delay before hiding (in milliseconds)
            } else {
                progress += 10; // Increment progress
                $loadingProgress.width(progress + '%'); // Update loading bar width
            }
        }, 200); // Update every 200ms
      }

     //page1 validation
      var sectionOneTag = 0;
      var sectionTwoTag = 0;
      var sectionThreeTag = 0;
      var sectionThreeTag = 0;
      var sectionFourTag = 0;
      var sectionOne = 0;
      var fnametag = 0;
      var lnametag = 0;
      var citizenshiptag = 0;
      var suffixtag = 0;
      var mobiletag = 0;
      var emailtag = 0;
      var locationtag = 0;
      

        $('#location').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(locationtag==0){locationtag++;sectionOne++;}}
            else{input.removeClass("valid").addClass("invalid");if(locationtag>0){locationtag=0;sectionOne--;}}
            checkCOuntGOSection(sectionOne);
        });

        $('#citizenship').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(citizenshiptag==0){citizenshiptag++;sectionOne++;}}
            else{input.removeClass("valid").addClass("invalid");if(citizenshiptag>0){citizenshiptag=0;sectionOne--;}}
            checkCOuntGOSection(sectionOne);
        });
        
        function checkCOuntGOSection(count) {
          if(count>4){
            sectionOneTag = 1;
            $("#part1-personal-info-svg").css("display", "");
            $("#part1-personal-info-svg-error").css("display", "none");
                // $('html, body').animate({
                //     // scrollTop: $("#part1-personnal-info").offset().top
                //     scrollTop: 650
                // }, 1000);
          }else{
            $("#part1-personal-info-svg").css("display", "none");
            // $("#part1-personal-info-svg-error").css("display", "");
          }
        }
        $(document).on('click', '.add-new-js', function() {
            var form = $(this).closest('form');
            var section = form.find('.section-group-js:last-child');
            
            var index = section.data('index');
            var newIndex = index + 1;
            var newSection = section.clone();
            console.log(index, typeof index);

            newSection.find('input').val('');
            newSection.data('index', newIndex);
            newSection.attr('data-index', newIndex);
            newSection.find('.sn-js').text(newIndex + 1);

            if ( newSection.find('.remove-js').length === 0 ) {
                newSection.find('.action-js').append(`
                <button type="button" class="btn btn-danger remove-js"> <i class="fa fa-trash"></i> </button>
                `);
            }
            
            updateAttributes(newSection, 'name', index);
            updateAttributes(newSection, 'email', index);
            
            newSection.insertAfter(section);
           
        })

        $(document).on('click', '.remove-js', function() { 
            var section = $(this).closest('.section-group-js');
            section.remove();
        });

        function updateAttributes( newSection, key, index ) {
            var section = newSection.find(`[name="details[${index}][${key}]"]`);
            section.attr('name', `details[${index+1}][${key}]`);
            section.attr('id', `${key}_${index+1}`);
        }
          objAdd = $('#addDestination')    
          objRemove = $('#removeDestination')  
              var count_desc = 0;
          objAdd.click(function() {
              clone = $( "#Destination" ).clone(true);
              clone.find('.destination-action-add').show();
              var $selectPicker = clone.find('select');
            
              clone.find('.bootstrap-select').remove().end();
              clone.find('.form-group').append($selectPicker).end();
              clone.find('#destinations').prop('id', 'destinations'+count_desc);
              
              clone.find('select').selectpicker();
              if($('select[name^="destinations"]').length ==1){
              }else{
                clone.find('.removeDestination').show();
                clone.find('.removeDestination').css('display','inline');
              }
              clone.insertBefore( "#DestinationTo").html();
              count_desc++;
          });
          
        objRemove.click(function(event) {
            if(count_desc>0){
              count_desc--;
              $(this).parent().parent().remove()
            }
        });  

        bjAdd_cruise = $('#addDestination_cruise');    
        objRemove_cruise = $('#removeDestination_cruise'); 
         
        var count_desc_cruise = 0;

        bjAdd_cruise.click(function() {
              clone = $( "#Destination_Cruise" ).clone(true);
              clone.find('.destination-action-add_cruise').show();
              var $selectPicker = clone.find('select');
            
              clone.find('.bootstrap-select').remove().end();
              clone.find('.form-group').append($selectPicker).end();
              clone.find('#cruise_destinations').prop('id', 'cruise_destinations'+count_desc_cruise);
              
              clone.find('select').selectpicker();
              if($('select[name^="cruise_destinations"]').length ==0){
              }else{
                clone.find('.removeDestination_cruise').show();
                clone.find('.removeDestination_cruise').css('display','inline');
              }
              clone.insertBefore( "#DestinationTo_Cruise").html();
              count_desc_cruise++;
        });

        objRemove_cruise.click(function(event) {
            if(count_desc_cruise>0){
              count_desc_cruise--;
              $(this).parent().parent().remove()
            }
        });  
    //  $('#modal-covid-table').
    $(".more-package-option").click(function(e){
        $('input[name="hdn_covid"]').val("");
        if($(this).data("id") == "Packet"){
          $("#apply-changes-covid-modal").css("display","");
          $("#apply-changes-covid-modal-cancel").css("display","");
          $("#modal-popup-first-page-no-covid").css("display","none");
          $('input[name="hdn_covid"]').val("Packet");
          $(".modal-covid-title-packet").css("color","rgb(228, 80, 154)");
          $(".modal-covid-title-pro").css("color","#2d2727 ");
          
        }

        if($(this).data("id") == "Pro"){
          $("#apply-changes-covid-modal").css("display","");
          $("#apply-changes-covid-modal-cancel").css("display","");
          $("#modal-popup-first-page-no-covid").css("display","none");
          $('input[name="hdn_covid"]').val("Pro");
          $(".modal-covid-title-pro").css("color","rgb(228, 80, 154)");
          $(".modal-covid-title-packet").css("color","#2d2727 ");
        }
    });  
    

      var sectionThree = 0;
      var destinationtag = 0;
      var destination_from_tag = 0;
      var destination_to_tag = 0;
      // $(document).on('change', '.selectpicker-destinations', function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //       $(this).closest('.btn-group').find('button').removeClass('invalid-select');
      //       $(this).closest('.btn-group').removeClass('invalid-select');
      //       if(is_name){
      //         if(destinationtag==0){destinationtag++;sectionThree++;}
      //       }else{
      //         $(this).closest('.btn-group').find('button').addClass('invalid-select'); 
      //         $(this).closest('.btn-group').addClass('invalid-select');
      //         if(destinationtag>0){destinationtag=0;sectionThree--;}
      //       }
      //       checkCOuntFourSection(sectionThree);
      // });

      // $('select[name^="destinations"]').change(function(){
          
      // });


      // $('#destination_from').on('input', function() {
      //       $('#destination_to').val("");
      //       var input=$(this);
      //       var is_name=input.val();
      //       if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(destination_from_tag==0){destination_from_tag++;sectionThree++;}}
      //       else{input.removeClass("valid").addClass("invalid");if(destination_from_tag>0){destination_from_tag=0;sectionThree--;}}
      //       checkCOuntFourSection(sectionThree);
      // });
      // $('#destination_to').on('input', function() {
      //       var input=$(this);
      //       var is_name=input.val();
      //       if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(destination_to_tag==0){destination_to_tag++;sectionThree++;}}
      //       else{input.removeClass("valid").addClass("invalid");if(destination_to_tag>0){destination_to_tag=0;sectionThree--;}}
      //       checkCOuntFourSection(sectionThree);
      // });
      function checkCOuntFourSection(count) {
        if(count>2){
          sectionThreeTag = 1;
          // $('html, body').animate({
          //     // scrollTop: $("#part1-covid-cruise").offset().top
          //     scrollTop: 1950
          // }, 1000);
        }
      }
      $('#promo').on('input', function() {
              var input=$(this);
              var is_promo=input.val();
              if(is_promo){
                  $.ajax({
                    url:  $('input[name="url"]').val() + '/get-quote/itp-insurance/promo',
                    method:"GET",
                    data:{ _token:$('input[name="_token"]').val(),promo:is_promo},
                    success:function(result){
                                  if ($.trim(result)){ 
                                    $("#error-promo-code").css("display", "none");
                                    $("#success-promo-code").css("display", "");
                                    input.removeClass("invalid").addClass("valid"); 
                                    $("#first_next").prop('disabled', false);
                                    
                                    $("#part1-promo-svg-success").css("display", "");
                                    $("#part1-promo-svg-error").css("display", "none");

                                    // input.parent().find( "p").removeClass("invalid-text").addClass("valid-text");   
                                    jQuery.each(result, function(key, value){

                                        $('input[name="hdn_promo_type"]').val(value.type);
                                        if(value.type == "P"){
                                          $('input[name="hdn_promo_amount"]').val(value.rate);
                                          $('.promo-text').html( parseInt(value.rate) + "%");
                                        }else{
                                          var amount_promo_fix = value.amount;
                                          $('input[name="hdn_promo_amount"]').val(value.amount);
                                          $('.promo-text').html("&#8369;"+ ReplaceNumberWithCommasPage1(parseFloat(amount_promo_fix).toFixed(2)));
                                        }
                                    });
                                  }else{
                                    $("#part1-promo-svg-success").css("display", "none");
                                    $("#part1-promo-svg-error").css("display", "");
                                    $("#error-promo-code").css("display", "");
                                    $("#success-promo-code").css("display", "none");
                                    $("#first_next").prop('disabled', true);
                                    $('input[name="hdn_promo_type"]').empty();
                                    $('input[name="hdn_promo_amount"]').empty();
                                    $('input[name="hdn_promo_amount"]').empty();
                                    input.removeClass("valid").addClass("invalid");
                                    // input.parent().find( "p").removeClass("valid-text").addClass("invalid-text");
                                  }
                              
                              }
                        }); 
              }else{
                $("#success-promo-code").css("display", "none");
                $("#error-promo-code").css("display", "none");
                input.removeClass("invalid").addClass("valid"); 
                input.parent().find( "p").removeClass("invalid-text").addClass("valid-text"); 
              }
      }); 
      
      //page1 package validation
      var idselect = "";
      $(".package-option").click(function(e){
        $( ".package-selected-button-get-plan").addClass("btn-arrow-icon");
        $( ".package-selected-button-get-plan").addClass("form-control");
        $( ".package-selected-button-get-plan").css("border", "1px solid #008080");;
        $("#selected-product-details").css("display", "");

        $(".package-option" ).find( ".card-package").removeClass("package-selected");
        $(".package-option" ).find( ".package-selected-button-get-plan").removeClass("package-selected-button-get-plan-selected");
        $(".package-option" ).find( ".package-selected-button-get-plan").html("Get Plan");
        $(".svg_check_package").css("display", "none");
        $("#div-choose-package-mobile").css("display", "");
        $( this ).find( ".card-package").addClass("package-selected");
        $( this ).find( ".svg_check_package").css("display", "");
        $( this ).find( ".package-selected-button-get-plan").addClass("package-selected-button-get-plan-selected");

        $( this ).find( ".package-selected-button-get-plan").html("Plan selected");
        $( this ).find( ".package-selected-button-get-plan").removeClass("btn-arrow-icon");
        $( this ).find( ".package-selected-button-get-plan").removeClass("form-control");
        $( this ).find( ".package-selected-button-get-plan").css("border", "1px solid #e4509a");;

        $('input[name="hdn_package"]').val($(this).data("id"));
        $('#package_continue').prop('disabled', false);
        // $(".quote_prem_dollar").text("$"+$(this).find('input[class="prem"]').val());
        // $(".quote_prem_dollar").text("$"+$(this).find('input[class="prem"]').val());
        var netprem = $(this).find('input[class="prem"]').val();
        $(".quote_netprem_dollar").text("$"+parseFloat(netprem).toFixed(2));
        var dst = $(this).find('input[class="dst"]').val();
        $(".quote_dst_dollar").text("$"+parseFloat(dst).toFixed(2));
        $(".quote_prem_tax_dollar").text("$"+$(this).find('input[class="premtax"]').val());
        $(".quote_lgt_dollar").text("$"+$(this).find('input[class="lgt"]').val());
        $(".quote_prem_dollar").text($(this).find( ".package-dollar-premium").html());
        $(".quote_prem_piso").text($(this).find( ".package-piso-premium").html());
        $(".quote_success_display").text($(this).find( ".package-dollar-premium").html()+" / "+$(this).find( ".package-piso-premium").html());
        if($("#promo").val()){
          $(".div-promo-quotation-tab").css("display", "");
          $(".quotation-promo-div").css("display", "");
          var promo_amount_less = $(this).find('input[class="promo_less"]').val();
          var due_premium = $(this).find('input[class="due_premium"]').val();
          var total = $(this).find('input[class="total"]').val();
          $(".quotation-promo-details").text("- $"+parseFloat(promo_amount_less).toFixed(2));
          $(".premium-original-price").text("$"+parseFloat(due_premium).toFixed(2));
          $(".premium-discounted-price").text("$"+parseFloat(total).toFixed(2));
        }else{
          $(".div-promo-quotation-tab").css("display", "none");
          $("#quotation-promo-div").css("display", "none");
        }

        $(".svg_check_more_package").css("display", "none");
        $(".more-package-option").find( ".pt__item").removeClass("package-selected");
        $(".more-package-option" ).find( ".more-package-select").removeClass("package-selected-button-get-plan-selected");
        $(".more-package-option" ).find( ".more-package-select").html("Select");
       
        if(idselect != $(this).data("id")){
          idselect = $(this).data("id");
          toastr.success('You have selected <b>'+$(this).data("id")+' Plan</b> with a Total Premium of <b>'+$(this).find( ".package-dollar-premium").html()+'</b> with an indicative peso equivalent of <b>'+$(this).find( ".package-piso-premium").html()+'</b>. Latest USD to PHP conversion will be applied at payment step.',
          $(this).data("id")+' Plan Selected!', {
              timeOut: 5000
        });
        }
        
        $('.quote-page-selected-promo').text($(this).data("id"));
        if ($(this).data("id") == "Economy"){
            $(".more-package-option-economy" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-economy" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-economy" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-economy" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");


            $(".accidental-death-disablement-amount").text('10,000 US$');
            $(".travel-of-one-immediate-2").text('1,000');
            $(".travel-of-one-immediate-1").text('100');
            $(".hdn-accidental-death-disablement-amount").val('10,000 US$');
            $(".accidental-burial-benefit-amount").text('250 US$');
            $(".hdn-accidental-burial-benefit-amount").val('250 US$');
            $(".personal-liability-amount").text('1,000 US$ (ded. 100US$)');
            $(".hdn-personal-liability-amount").val('1,000 US$ (ded. 100US$)');
            $(".medical-expense-amount").text('20,000 US$');
            $(".hdn-medical-expense-amount").val('20,000 US$');
            $(".emergency-dental-amount").text('200 US$');
            $(".hdn-emergency-dental-amount").val('200 US$');
            $(".advance-bail-bond-amount").text('1,000 US$');
            $(".hdn-advance-bail-bond-amount").val('1,000 US$');
            $(".trip-cancellation-amount").text('3,000 US$');
            $(".hdn-trip-cancellation-amount").val('3,000 US$');
            $(".trip-curtailment-amount").text('3,000 US$');
            $(".hdn-trip-curtailment-amount").val('3,000 US$');
            $(".delayed-departure-amount").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('200 US$');
            $(".hdn-flight-misconnection-amount").val('200 US$');
            $(".flight-diversion-amount").text('200 US$');
            $(".hdn-flight-diversion-amount").val('200 US$');
            $(".baggage-delay-amount").text('40 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 40US$)');
            $(".hdn-baggage-delay-amount").val('40 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 40US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('10,000 US$');
            $(".hdn-cruise-accidental-death").val('10,000 US$');
            $(".cruise-personal-liability-amount").text('1,000 US$ (ded. 100US$)');
            $(".hdn-cruise-personal-liability-amount").val('1,000 US$ (ded. 100US$)');
            $(".cruise-accidental-burial-amount").text('250 US$');
            $(".hdn-cruise-accidental-burial-amount").val('250 US$');
            $(".cruise-emergency-medical-expenses").text('20,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('20,000 US$');
            $(".cruise-cancellations").text('3,000 US$');
            $(".hdn-cruise-cancellations").val('3,000 US$');
            $(".cruise-curtailment").text('3,000 US$');
            $(".hdn-cruise-curtailment").val('3,000 US$');
            $(".cruise-baggage-loss").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".cruise-delay-loss").text('200 US$ Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('200 US$ Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 20,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 20,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 15,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 15,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 15,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 15,000 for COVID-19 Cases');
        }else if ($(this).data("id") == "Esteem"){
            $(".more-package-option-esteem" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-esteem" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-esteem" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-esteem" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

            $(".travel-of-one-immediate-2").text('1,000');
            $(".travel-of-one-immediate-1").text('100');
            $(".accidental-death-disablement-amount").text('25,000 US$');
            $(".hdn-accidental-death-disablement-amount").val('25,000 US$');
            $(".accidental-burial-benefit-amount").text('500 US$');
            $(".hdn-accidental-burial-benefit-amount").val('500 US$');
            $(".personal-liability-amount").text('10,000 US$ (ded. 1,000US$)');
            $(".hdn-personal-liability-amount").val('10,000 US$ (ded. 1,000US$)');
            $(".medical-expense-amount").text('45,000 US$');
            $(".hdn-medical-expense-amount").val('45,000 US$');
            $(".emergency-dental-amount").text('200 US$');
            $(".hdn-emergency-dental-amount").val('200 US$');
            $(".advance-bail-bond-amount").text('1,000 US$');
            $(".hdn-advance-bail-bond-amount").val('1,000 US$');
            $(".trip-cancellation-amount").text('3,000 US$');
            $(".hdn-trip-cancellation-amount").val('3,000 US$');            
            $(".trip-curtailment-amount").text('3,000 US$');
            $(".hdn-trip-curtailment-amount").val('3,000 US$');
            $(".delayed-departure-amount").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('200 US$');
            $(".hdn-flight-misconnection-amount").val('200 US$');
            $(".flight-diversion-amount").text('200 US$');
            $(".hdn-flight-diversion-amount").val('200 US$');
            $(".baggage-delay-amount").text('90 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 90US$)');
            $(".hdn-baggage-delay-amount").val('90 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 90US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('25,000 US$');
            $(".hdn-cruise-accidental-death").val('25,000 US$');
            $(".cruise-personal-liability-amount").text('10,000 US$ (ded. 1,000US$)');
            $(".hdn-cruise-personal-liability-amount").val('10,000 US$ (ded. 1,000US$)');
            $(".cruise-accidental-burial-amount").text('500 US$');
            $(".hdn-cruise-accidental-burial-amount").val('500 US$');
            $(".cruise-emergency-medical-expenses").text('45,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('45,000 US$');
            $(".cruise-cancellations").text('3,000 US$');
            $(".hdn-cruise-cancellations").val('3,000 US$');
            $(".cruise-curtailment").text('3,000 US$');
            $(".hdn-cruise-curtailment").val('3,000 US$');
            $(".cruise-baggage-loss").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".cruise-delay-loss").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 45,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 45,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 25,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 25,000 for COVID-19 Cases');
        }else if ($(this).data("id") == "Executive"){

            $(".more-package-option-executive" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-executive" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-executive" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-executive" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

            $(".travel-of-one-immediate-2").text('1,000');
            $(".travel-of-one-immediate-1").text('100');
            $(".accidental-death-disablement-amount").text('50,000 US$');
            $(".hdn-accidental-death-disablement-amount").val('50,000 US$');
            $(".accidental-burial-benefit-amount").text('1,000 US$');
            $(".hdn-accidental-burial-benefit-amount").val('1,000 US$');
            $(".personal-liability-amount").text('20,000 US$ (ded. 2,000US$)');
            $(".hdn-personal-liability-amount").val('20,000 US$ (ded. 2,000US$)');
            $(".medical-expense-amount").text('50,000 US$');
            $(".hdn-medical-expense-amount").val('50,000 US$');
            $(".advance-bail-bond-amount").text('1,000 US$');
            $(".hdn-advance-bail-bond-amount").val('1,000 US$');
            $(".trip-cancellation-amount").text('3,000 US$');
            $(".hdn-trip-cancellation-amount").val('3,000 US$');            
            $(".trip-curtailment-amount").text('3,000 US$');
            $(".hdn-trip-curtailment-amount").val('3,000 US$');
            $(".delayed-departure-amount").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('200 US$');
            $(".hdn-flight-misconnection-amount").val('200 US$');
            $(".flight-diversion-amount").text('200 US$');
            $(".hdn-flight-diversion-amount").val('200 US$');
            $(".baggage-delay-amount").text('100 US$  (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-baggage-delay-amount").val('100 US$  (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('50,000 US$');
            $(".hdn-cruise-accidental-death").val('50,000 US$');
            $(".cruise-personal-liability-amount").text('20,000 US$ (ded. 2,000US$)');
            $(".hdn-cruise-personal-liability-amount").val('20,000 US$ (ded. 2,000US$)');
            $(".cruise-accidental-burial-amount").text('1,000 US$');
            $(".hdn-cruise-accidental-burial-amount").val('1,000 US$');
            $(".cruise-emergency-medical-expenses").text('50,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('50,000 US$');
            $(".cruise-cancellations").text('3,000 US$');
            $(".emergency-dental-amount").text('200 US$');
            $(".hdn-emergency-dental-amount").val('200 US$');
            $(".hdn-cruise-cancellations").val('3,000 US$');
            $(".cruise-curtailment").text('3,000 US$');
            $(".hdn-cruise-curtailment").val('3,000 US$');
            $(".cruise-baggage-loss").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".cruise-delay-loss").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 45,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 45,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 25,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 25,000 for COVID-19 Cases');
        }else{
            $(".more-package-option-elite" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-elite" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-elite" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-elite" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

            $(".travel-of-one-immediate-2").text('2,000');
            $(".travel-of-one-immediate-1").text('200');
            $(".accidental-death-disablement-amount").text('100,000 US$');
            $(".hdn-accidental-death-disablement-amount").val('100,000 US$');
            $(".accidental-burial-benefit-amount").text('2,000 US$');
            $(".hdn-accidental-burial-benefit-amount").val('2,000 US$');
            $(".personal-liability-amount").text('25,000 US$ (ded. 2,000US$)');
            $(".hdn-personal-liability-amount").val('25,000 US$ (ded. 2,000US$)');
            $(".medical-expense-amount").text('100,000 US$');
            $(".hdn-medical-expense-amount").val('100,000 US$');
            $(".emergency-dental-amount").text('400 US$');
            $(".hdn-emergency-dental-amount").val('400 US$');
            $(".advance-bail-bond-amount").text('2,000 US$');
            $(".hdn-advance-bail-bond-amount").val('2,000 US$');
            $(".trip-cancellation-amount").text('5,000 US$');
            $(".hdn-trip-cancellation-amount").val('5,000 US$');
            $(".trip-curtailment-amount").text('5,000 US$');
            $(".hdn-trip-curtailment-amount").val('5,000 US$');
            $(".delayed-departure-amount").text('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('400 US$');
            $(".hdn-flight-misconnection-amount").val('400 US$');
            $(".flight-diversion-amount").text('400 US$');
            $(".hdn-flight-diversion-amount").val('400 US$');
            $(".baggage-delay-amount").text('250 US $(Lump Sum cash benefit per occurrence)/ Non-Receipted up to 100US$)');
            $(".hdn-baggage-delay-amount").val('250 US $(Lump Sum cash benefit per occurrence)/ Non-Receipted up to 100US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('100,000 US$');
            $(".hdn-cruise-accidental-death").val('100,000 US$');
            $(".cruise-personal-liability-amount").text('25,000 US$ (ded. 2,000US$)');
            $(".hdn-cruise-personal-liability-amount").val('25,000 US$ (ded. 2,000US$)');
            $(".cruise-accidental-burial-amount").text('2,000 US$');
            $(".hdn-cruise-accidental-burial-amount").val('2,000 US$');
            $(".cruise-emergency-medical-expenses").text('100,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('100,000 US$');
            $(".cruise-cancellations").text('5,000 US$');
            $(".hdn-cruise-cancellations").val('5,000 US$');
            $(".cruise-curtailment").text('5,000 US$');
            $(".hdn-cruise-curtailment").val('5,000 US$');
            $(".cruise-baggage-loss").text('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".cruise-delay-loss").text('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 45,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 45,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 25,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 25,000 for COVID-19 Cases');
        }
      }); 
      var idselectmore = "";
      $(".more-package-option").click(function(e){
          $('#apply_plan_next').prop('disabled', false);
          $("#selected-product-more-details").css("display", "");
          $(".svg_check_more_package").css("display", "none");
          $(".more-package-option").find( ".pt__item").removeClass("package-selected");
          $(".more-package-option" ).find( ".more-package-select").removeClass("package-selected-button-get-plan-selected");
          $(".more-package-option" ).find( ".more-package-select").html("Select");
          $(".more-package-option" ).find( ".more-package-select").addClass("btn-arrow-icon");

          $(this).find( ".pt__item").addClass("package-selected");
          $(this).find( ".svg_check_more_package").css("display", "");
          $(this).find( ".more-package-select").html("Selected");
          $(this).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");
          $(this).find( ".more-package-select").removeClass("btn-arrow-icon");
          $(this).find( ".more-package-select").css("width", "100%");
          $('input[name="hdn_package"]').val($(this).data("id"));
          $('.quote-page-selected-promo').text($(this).data("id"));
          $('#package_continue').prop('disabled', false);
          $(".package-option" ).find( ".card-package").removeClass("package-selected");
          $(".package-option" ).find( ".package-selected-button-get-plan").removeClass("package-selected-button-get-plan-selected");
          $(".package-option" ).find( ".package-selected-button-get-plan").html("Get Plan");
          $(".svg_check_package").css("display", "none");

          $('#div-package-'+$(this).data("id").toLowerCase()).find( ".card-package").addClass("package-selected");
          $('#div-package-'+$(this).data("id").toLowerCase()).find( ".svg_check_package").css("display", "");
          $('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-selected-button-get-plan").addClass("package-selected-button-get-plan-selected");
          $('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-selected-button-get-plan").html("Plan selected");
          var netprem = $('#div-package-'+$(this).data("id").toLowerCase()).find('input[class="prem"]').val();
          var dst = $('#div-package-'+$(this).data("id").toLowerCase()).find('input[class="dst"]').val();
          $(".quote_netprem_dollar").text("$"+parseFloat(netprem).toFixed(2));
          $(".quote_dst_dollar").text("$"+parseFloat(dst).toFixed(2));
          $(".quote_prem_tax_dollar").text($('#div-package-'+$(this).data("id").toLowerCase()).find('input[class="premtax"]').val());
          $(".quote_lgt_dollar").text($('#div-package-'+$(this).data("id").toLowerCase()).find('input[class="lgt"]').val());
          $(".quote_prem_dollar").text($('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-dollar-premium").html());
          $(".quote_prem_piso").text($('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-piso-premium").html());
          if($("#promo").val()){
            $(".div-promo-quotation-tab").css("display", "");
            $("#quotation-promo-div").css("display", "");
            var promo_amount_less = $('#div-package-'+$(this).data("id").toLowerCase()).find('input[class="promo_less"]').val();
            var due_premium = $('#div-package-'+$(this).data("id").toLowerCase()).find('input[class="due_premium"]').val();
            var total = $('#div-package-'+$(this).data("id").toLowerCase()).find('input[class="total"]').val();
            $(".quotation-promo-details").text("- $"+parseFloat(promo_amount_less).toFixed(2));
            $(".premium-original-price").text("$"+parseFloat(due_premium).toFixed(2));
            $(".premium-discounted-price").text("$"+parseFloat(total).toFixed(2));
          }else{
            $(".div-promo-quotation-tab").css("display", "none");
            $("#quotation-promo-div").css("display", "none");
          }


        if ($(this).data("id") == "Economy"){
            $(".more-package-option-economy" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-economy" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-economy" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-economy" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");


            $(".accidental-death-disablement-amount").text('10,000 US$');
            $(".travel-of-one-immediate-2").text('1,000');
            $(".travel-of-one-immediate-1").text('100');
            $(".hdn-accidental-death-disablement-amount").val('10,000 US$');
            $(".accidental-burial-benefit-amount").text('250 US$');
            $(".hdn-accidental-burial-benefit-amount").val('250 US$');
            $(".personal-liability-amount").text('1,000 US$ (ded. 100US$)');
            $(".hdn-personal-liability-amount").val('1,000 US$ (ded. 100US$)');
            $(".medical-expense-amount").text('20,000 US$');
            $(".hdn-medical-expense-amount").val('20,000 US$');
            $(".emergency-dental-amount").text('200 US$');
            $(".hdn-emergency-dental-amount").val('200 US$');
            $(".advance-bail-bond-amount").text('1,000 US$');
            $(".hdn-advance-bail-bond-amount").val('1,000 US$');
            $(".trip-cancellation-amount").text('3,000 US$');
            $(".hdn-trip-cancellation-amount").val('3,000 US$');
            $(".trip-curtailment-amount").text('3,000 US$');
            $(".hdn-trip-curtailment-amount").val('3,000 US$');
            $(".delayed-departure-amount").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('200 US$');
            $(".hdn-flight-misconnection-amount").val('200 US$');
            $(".flight-diversion-amount").text('200 US$');
            $(".hdn-flight-diversion-amount").val('200 US$');
            $(".baggage-delay-amount").text('40 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 40US$)');
            $(".hdn-baggage-delay-amount").val('40 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 40US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('10,000 US$');
            $(".hdn-cruise-accidental-death").val('10,000 US$');
            $(".cruise-personal-liability-amount").text('1,000 US$ (ded. 100US$)');
            $(".hdn-cruise-personal-liability-amount").val('1,000 US$ (ded. 100US$)');
            $(".cruise-accidental-burial-amount").text('250 US$');
            $(".hdn-cruise-accidental-burial-amount").val('250 US$');
            $(".cruise-emergency-medical-expenses").text('20,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('20,000 US$');
            $(".cruise-cancellations").text('3,000 US$');
            $(".hdn-cruise-cancellations").val('3,000 US$');
            $(".cruise-curtailment").text('3,000 US$');
            $(".hdn-cruise-curtailment").val('3,000 US$');
            $(".cruise-baggage-loss").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".cruise-delay-loss").text('200 US$ Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('200 US$ Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 20,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 20,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 15,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 15,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 15,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 15,000 for COVID-19 Cases');
        }else if ($(this).data("id") == "Esteem"){
            $(".more-package-option-esteem" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-esteem" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-esteem" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-esteem" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

            $(".travel-of-one-immediate-2").text('1,000');
            $(".travel-of-one-immediate-1").text('100');
            $(".accidental-death-disablement-amount").text('25,000 US$');
            $(".hdn-accidental-death-disablement-amount").val('25,000 US$');
            $(".accidental-burial-benefit-amount").text('500 US$');
            $(".hdn-accidental-burial-benefit-amount").val('500 US$');
            $(".personal-liability-amount").text('10,000 US$ (ded. 1,000US$)');
            $(".hdn-personal-liability-amount").val('10,000 US$ (ded. 1,000US$)');
            $(".medical-expense-amount").text('45,000 US$');
            $(".hdn-medical-expense-amount").val('45,000 US$');
            $(".emergency-dental-amount").text('200 US$');
            $(".hdn-emergency-dental-amount").val('200 US$');
            $(".advance-bail-bond-amount").text('1,000 US$');
            $(".hdn-advance-bail-bond-amount").val('1,000 US$');
            $(".trip-cancellation-amount").text('3,000 US$');
            $(".hdn-trip-cancellation-amount").val('3,000 US$');            
            $(".trip-curtailment-amount").text('3,000 US$');
            $(".hdn-trip-curtailment-amount").val('3,000 US$');
            $(".delayed-departure-amount").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('200 US$');
            $(".hdn-flight-misconnection-amount").val('200 US$');
            $(".flight-diversion-amount").text('200 US$');
            $(".hdn-flight-diversion-amount").val('200 US$');
            $(".baggage-delay-amount").text('90 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 90US$)');
            $(".hdn-baggage-delay-amount").val('90 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 90US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('25,000 US$');
            $(".hdn-cruise-accidental-death").val('25,000 US$');
            $(".cruise-personal-liability-amount").text('10,000 US$ (ded. 1,000US$)');
            $(".hdn-cruise-personal-liability-amount").val('10,000 US$ (ded. 1,000US$)');
            $(".cruise-accidental-burial-amount").text('500 US$');
            $(".hdn-cruise-accidental-burial-amount").val('500 US$');
            $(".cruise-emergency-medical-expenses").text('45,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('45,000 US$');
            $(".cruise-cancellations").text('3,000 US$');
            $(".hdn-cruise-cancellations").val('3,000 US$');
            $(".cruise-curtailment").text('3,000 US$');
            $(".hdn-cruise-curtailment").val('3,000 US$');
            $(".cruise-baggage-loss").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".cruise-delay-loss").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 45,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 45,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 25,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 25,000 for COVID-19 Cases');
        }else if ($(this).data("id") == "Executive"){

            $(".more-package-option-executive" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-executive" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-executive" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-executive" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

            $(".travel-of-one-immediate-2").text('1,000');
            $(".travel-of-one-immediate-1").text('100');
            $(".accidental-death-disablement-amount").text('50,000 US$');
            $(".hdn-accidental-death-disablement-amount").val('50,000 US$');
            $(".accidental-burial-benefit-amount").text('1,000 US$');
            $(".hdn-accidental-burial-benefit-amount").val('1,000 US$');
            $(".personal-liability-amount").text('20,000 US$ (ded. 2,000US$)');
            $(".hdn-personal-liability-amount").val('20,000 US$ (ded. 2,000US$)');
            $(".medical-expense-amount").text('50,000 US$');
            $(".hdn-medical-expense-amount").val('50,000 US$');
            $(".advance-bail-bond-amount").text('1,000 US$');
            $(".hdn-advance-bail-bond-amount").val('1,000 US$');
            $(".trip-cancellation-amount").text('3,000 US$');
            $(".hdn-trip-cancellation-amount").val('3,000 US$');   
            
            $(".emergency-dental-amount").text('200 US$');
            $(".hdn-emergency-dental-amount").val('200 US$');         
            $(".trip-curtailment-amount").text('3,000 US$');
            $(".hdn-trip-curtailment-amount").val('3,000 US$');
            $(".delayed-departure-amount").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('200 US$');
            $(".hdn-flight-misconnection-amount").val('200 US$');
            $(".flight-diversion-amount").text('200 US$');
            $(".hdn-flight-diversion-amount").val('200 US$');
            $(".baggage-delay-amount").text('100 US$  (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-baggage-delay-amount").val('100 US$  (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('50,000 US$');
            $(".hdn-cruise-accidental-death").val('50,000 US$');
            $(".cruise-personal-liability-amount").text('20,000 US$ (ded. 2,000US$)');
            $(".hdn-cruise-personal-liability-amount").val('20,000 US$ (ded. 2,000US$)');
            $(".cruise-accidental-burial-amount").text('1,000 US$');
            $(".hdn-cruise-accidental-burial-amount").val('1,000 US$');
            $(".cruise-emergency-medical-expenses").text('50,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('50,000 US$');
            $(".cruise-cancellations").text('3,000 US$');
            $(".hdn-cruise-cancellations").val('3,000 US$');
            $(".cruise-curtailment").text('3,000 US$');
            $(".hdn-cruise-curtailment").val('3,000 US$');
            $(".cruise-baggage-loss").text('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 1,200 US$ subject to limit 150 US$ for any item');
            $(".cruise-delay-loss").text('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 45,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 45,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 25,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 25,000 for COVID-19 Cases');
        }else{
            $(".more-package-option-elite" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-elite" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-elite" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-elite" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

            $(".travel-of-one-immediate-2").text('2,000');
            $(".travel-of-one-immediate-1").text('200');
            $(".accidental-death-disablement-amount").text('100,000 US$');
            $(".hdn-accidental-death-disablement-amount").val('100,000 US$');
            $(".accidental-burial-benefit-amount").text('2,000 US$');
            $(".hdn-accidental-burial-benefit-amount").val('2,000 US$');
            $(".personal-liability-amount").text('25,000 US$ (ded. 2,000US$)');
            $(".hdn-personal-liability-amount").val('25,000 US$ (ded. 2,000US$)');
            $(".medical-expense-amount").text('100,000 US$');
            $(".hdn-medical-expense-amount").val('100,000 US$');
            $(".emergency-dental-amount").text('400 US$');
            $(".hdn-emergency-dental-amount").val('400 US$');
            $(".advance-bail-bond-amount").text('2,000 US$');
            $(".hdn-advance-bail-bond-amount").val('2,000 US$');
            $(".trip-cancellation-amount").text('5,000 US$');
            $(".hdn-trip-cancellation-amount").val('5,000 US$');
            $(".trip-curtailment-amount").text('5,000 US$');
            $(".hdn-trip-curtailment-amount").val('5,000 US$');
            $(".delayed-departure-amount").text('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-delayed-departure-amount").val('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".flight-misconnection-amount").text('400 US$');
            $(".hdn-flight-misconnection-amount").val('400 US$');
            $(".flight-diversion-amount").text('400 US$');
            $(".hdn-flight-diversion-amount").val('400 US$');
            $(".baggage-delay-amount").text('250 US $(Lump Sum cash benefit per occurrence)/ Non-Receipted up to 100US$)');
            $(".hdn-baggage-delay-amount").val('250 US $(Lump Sum cash benefit per occurrence)/ Non-Receipted up to 100US$)');
            $(".compenxation-inflight-loss-amount").text('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".hdn-compenxation-inflight-loss-amount").val('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".lost-stolen-baggage-amount").text('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".hdn-lost-stolen-baggage-amount").val('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".loss-personal-money-amount").text('250 US$');
            $(".hdn-loss-personal-money-amount").val('250 US$');
            $(".loss-passport-amount").text('250 US$');
            $(".hdn-loss-passport-amount").val('250 US$');
            $(".cruise-accidental-death").text('100,000 US$');
            $(".hdn-cruise-accidental-death").val('100,000 US$');
            $(".cruise-personal-liability-amount").text('25,000 US$ (ded. 2,000US$)');
            $(".hdn-cruise-personal-liability-amount").val('25,000 US$ (ded. 2,000US$)');
            $(".cruise-accidental-burial-amount").text('2,000 US$');
            $(".hdn-cruise-accidental-burial-amount").val('2,000 US$');
            $(".cruise-emergency-medical-expenses").text('100,000 US$');
            $(".hdn-cruise-emergency-medical-expenses").val('100,000 US$');
            $(".cruise-cancellations").text('5,000 US$');
            $(".hdn-cruise-cancellations").val('5,000 US$');
            $(".cruise-curtailment").text('5,000 US$');
            $(".hdn-cruise-curtailment").val('5,000 US$');
            $(".cruise-baggage-loss").text('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".hdn-cruise-baggage-loss").val('Up to 2,400 US$ subject to limit 300 US$ for any item');
            $(".cruise-delay-loss").text('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".hdn-cruise-delay-loss").val('500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)');
            $(".covid-medical-expenses").text('US$ 45,000 for COVID-19 Cases');
            $(".hdn-covid-medical-expenses").val('US$ 45,000 for COVID-19 Cases');
            $(".covid-transport-repatriation").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-transport-repatriation").val('Up to US$ 25,000 for COVID-19 Cases');
            $(".covid-repatriation-mortal-remains").text('Up to US$ 25,000 for COVID-19 Cases');
            $(".hdn-covid-repatriation-mortal-remains").val('Up to US$ 25,000 for COVID-19 Cases');
        }
          $(".quote_success_display").text($('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-dollar-premium").html()+" / "+$('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-piso-premium").html());
          if(idselectmore != $(this).data("id")){
              idselectmore = $(this).data("id");
              if($(this).data("id") == "Pro" || $(this).data("id") == "Packet"){
                 
              }else{
                toastr.success('You have selected <b>'+$(this).data("id")+' Plan</b> with a Total Premium of <b>'+$('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-dollar-premium").html()+'</b> with an indicative peso equivalent of <b>'+$('#div-package-'+$(this).data("id").toLowerCase()).find( ".package-piso-premium").html()+'</b>. Latest USD to PHP conversion will be applied at payment step.',
                  $(this).data("id")+' Plan Selected!', {
                      timeOut: 5000
                });
              }
             
          }
      }); 

      function ReplaceNumberWithCommasPage1(yourNumber) {
        //Seperates the components of the number
        var n= yourNumber.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
      }

      //third page validation
      var sectionFiveTag = 0;
      var sectionFive = 0;
      var gender_tag = 0;
      var dateofbirth_tag = 0;
      var placeofbirth_tag = 0;
      var country_additional_tag = 0;
 
      // jQuery('#gender').change(function(){
      //     var input=$(this);
      //     var is_name=input.val();
      //     $(this).closest('.btn-group').find('button').removeClass('invalid-select');
      //     $(this).closest('.btn-group').removeClass('invalid-select');
      //     if(is_name){
      //       if(gender_tag==0){gender_tag=1;sectionFive++;}
      //     }else{
      //       // $("#additional-info-svg-error").css("display", "");
      //       $(this).closest('.btn-group').find('button').addClass('invalid-select'); 
      //       $(this).closest('.btn-group').addClass('invalid-select');
      //       if(gender_tag>0){sectionFive--;}
      //       // if(gender_tag==0){$("#additional-info-svg-error").css("display", "");}
      //     }
      //     checkCOuntFiveSection(sectionFive);
      // });
      // $('#date-of-birth').on('input', function() {
      //       var input=$(this);
      //       var is_name=input.val();
      //       if(is_name){
      //           input.removeClass("invalid").addClass("valid");
      //           $(this).find('option').css('color', '#212529');
      //           if(dateofbirth_tag==0){
      //             dateofbirth_tag++;
      //             sectionFive++;
      //           }
      //       }else{
      //         input.removeClass("valid").addClass("invalid");
      //         if(dateofbirth_tag>0){sectionFive--;}
      //       }
      //       checkCOuntFiveSection(sectionFive);
      // });
      // $('#place-of-birth').on('input', function() {
      //       var input=$(this);
      //       var is_name=input.val();
      //       if(is_name){
      //         input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(placeofbirth_tag==0){placeofbirth_tag++;sectionFive++;}}
      //       else{
      //         input.removeClass("valid").addClass("invalid");if(placeofbirth_tag>0){sectionFive--;}}
      //         checkCOuntFiveSection(sectionFive);
      // });


      // jQuery('#country-additional-info').change(function(){
      //     var input=$(this);
      //     var is_name=input.val();
      //     $(this).closest('.btn-group').find('button').removeClass('invalid-select');
      //     $(this).closest('.btn-group').removeClass('invalid-select');
      //     if(is_name){
      //       if(country_additional_tag==0){country_additional_tag=1;sectionFive++;}
      //     }else{
      //       // $("#additional-info-svg-error").css("display", "");
      //       $(this).closest('.btn-group').find('button').addClass('invalid-select'); 
      //       $(this).closest('.btn-group').addClass('invalid-select');
      //       if(country_additional_tag>0){sectionFive--;}
      //       // if(country_additional_tag==0){$("#additional-info-svg-error").css("display", "");}
      //     }
      //     checkCOuntFiveSection(sectionFive);
      // });

      // function checkCOuntFiveSection(count) {
      //   if($('#gender').val() == "" || $('#date-of-birth').val() == "" || $('#place-of-birth').val() == "" || $('#country-additional-info').val() == "" ){
      //       $("#additional-info-svg").css("display", "none");
      //       // $("#additional-info-svg-error").css("display", "");
      //     }else{
      //       sectionFiveTag = 1;
      //       $("#additional-info-svg").css("display", "");
      //       $("#additional-info-svg-error").css("display", "none");
      //       // $('html, body').animate({
      //       //     scrollTop: $("#address-section-3rdpage").offset().top
      //       // }, 1000);
      //     }
      //   if(dateofbirth_tag == 0 || gender_tag==0 || placeofbirth_tag==0 ){
      //   }else{
         
      //   }
       
      // }

      var sectionSixTag = 0;
      var sectionSix = 0;
      var sectionSix_section1 = 0;
      var sectionSix_section2 = 0;

      var address_house_tag = 0;
      var city_tag = 0;
      var street_tag = 0;
      var barangay_tag = 0;
      var region_tag = 0;
      var zip_tag = 0;
      var id_type_tag = 0;
      var id_no_tag = 0;
      var province_tag = 0;
      
      // $('#address-house-unit').on('input', function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(address_house_tag==0){address_house_tag++;sectionSix++;sectionSix_section1++;}}
      //     else{
      //       input.removeClass("valid").addClass("invalid");
      //       if(address_house_tag>0){address_house_tag=0;sectionSix--;sectionSix_section1--;}}
      //     checkCOuntSixSection(sectionSix);
      //     checkPresentAddress(sectionSix_section1);
      // });

      // $('#street').on('input', function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(street_tag==0){street_tag++;sectionSix++;sectionSix_section1++;}}
      //     else{input.removeClass("valid").addClass("invalid");if(street_tag>0){street_tag=0;sectionSix--;sectionSix_section1--;}}
      //     checkCOuntSixSection(sectionSix);
      //     checkPresentAddress(sectionSix_section1);
      // });
      jQuery('#region').change(function(){
          if(jQuery(this).val() != '')
          {
            jQuery.ajax({
                  url:$('input[name="url"]').val() + '/province/get',
                    method:"GET",
                    data:{ _token:jQuery('input[name="_token"]').val(),region:jQuery(this).val()},
                    success:function(result)
                    {
                      jQuery('#province').empty();
                        $('#province').append($('<option>', {
                          value: "",
                          text : "Province*"
                      }));
                      jQuery.each(result, function(key, value){
                          $('#province').append($('<option>', {
                              value: value.province,
                              text : value.province
                          }));
                      })
                      jQuery('#province').selectpicker("refresh");
                      jQuery('#region').selectpicker("refresh");

                    }
              })
          }
      });
      jQuery('#province').change(function(){
          if(jQuery(this).val() != '')
          {
              jQuery.ajax({
                  url:$('input[name="url"]').val() + '/city/get',
                    method:"GET",
                    data:{ _token:jQuery('input[name="_token"]').val(),province:jQuery(this).val()},
                    success:function(result)
                    {
                        jQuery('#city').empty();
                        $('#city').append($('<option>', {
                          value: "",
                          text : "City*"
                      }));
                      jQuery.each(result, function(key, value){
                          $('#city').append($('<option>', {
                              value: value.city,
                              text : value.city
                          }));
                      })
                      if(province_tag==0){province_tag++;sectionSix++;sectionSix_section1++;}
                        jQuery('#city').selectpicker("refresh");
                    }
              })
          }
      });
      jQuery('#city').change(function(){
          if(jQuery(this).val() != '')
          {
              jQuery.ajax({
                  url:$('input[name="url"]').val() + '/barangay/get',
                    method:"GET",
                    data:{ _token:jQuery('input[name="_token"]').val(),city:jQuery(this).val()},
                    success:function(result)
                    {
                        jQuery('#barangay').empty();
                        $('#barangay').append($('<option>', {
                          value: "",
                          text : "Barangay*"
                      }));
                      jQuery.each(result, function(key, value){
                          $('#barangay').append($('<option>', {
                              value: value.barangay,
                              text : value.barangay
                          }));
                      })
                      jQuery('#barangay').selectpicker("refresh");
                    }
              })
          }
      });

      // jQuery('#barangay').change(function(){
      //     if(jQuery(this).val() != '')
      //     {
      //       if(barangay_tag==0){barangay_tag++;sectionSix++;sectionSix_section1++;}
      //       checkCOuntSixSection(sectionSix);
      //       checkPresentAddress(sectionSix_section1);
      //       $("#barangay").closest('.btn-group').find('button').removeClass('invalid-select');
      //       $("#barangay").closest('.btn-group').removeClass('invalid-select');
      //       $("#barangay").removeClass("invalid").addClass("valid"); 
      //       $("#barangay").find('option').css('color', '#212529');
      //       $("#barangay").removeClass("invalid").addClass("valid"); $("#barangay").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#barangay").find('option').css('color', '#212529');
      //       $("#barangay").removeClass("invalid").addClass("valid"); $("#barangay").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#barangay").find('option').css('color', '#212529');
      //     }else{
      //       checkCOuntSixSection(sectionSix);
      //       checkPresentAddress(sectionSix_section1);
      //       $("#barangay").removeClass("valid").addClass("invalid");$("#barangay").parent().find( "p").removeClass("valid-text").addClass("invalid-text");
      //       $("#barangay").closest('.btn-group').find('button').addClass('invalid-select');
      //       $("#barangay").closest('.btn-group').addClass('invalid-select');
      //       if(barangay_tag>0){barangay_tag=0;sectionSix--;sectionSix_section1--;}
      //       $("#barangay").removeClass("valid").addClass("invalid");$("#barangay").parent().find( "p").removeClass("valid-text").addClass("invalid-text");
      //     }
      // });

      // $('#zip').on('input', function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(zip_tag==0){zip_tag==1;sectionSix++;sectionSix_section1++;}}
      //     else{input.removeClass("valid").addClass("invalid");$("#present_address_svg_error").css("display", "none");if(zip_tag>0){sectionSix--;sectionSix_section1--;}}
      //     checkCOuntSixSection(sectionSix);
      //     checkPresentAddress(sectionSix_section1);
      // });
      var idsection = 0;
      // jQuery('#id_type').change(function(){
      //     var input=$(this);
      //     var is_name=input.val();
      //     $(this).closest('.btn-group').find('button').removeClass('invalid-select');
      //     $(this).closest('.btn-group').removeClass('invalid-select');
      //     if(is_name){
      //       if(id_type_tag==0){id_type_tag=1;idsection++;}
      //     }else{
      //       // $("#additional-info-svg-error").css("display", "");
      //       $(this).closest('.btn-group').find('button').addClass('invalid-select'); 
      //       $(this).closest('.btn-group').addClass('invalid-select');
      //       if(id_type_tag>0){idsection--;}
      //       // if(id_type_tag==0){$("#additional-info-svg-error").css("display", "");}
      //     }
      //     checkUploadFileSection(idsection);
      // });

      // $('#id_no').on('input', function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find('option').css('color', '#212529');if(id_no_tag==0){id_no_tag==1;sectionSix++;sectionSix_section2++;}}
      //     else{input.removeClass("valid").addClass("invalid");if(id_no_tag>0){sectionSix--;sectionSix_section2--;}}
      //     checkCOuntSixSection(sectionSix);
      //     checkUploadFileSection(sectionSix);
      // });
      
      $("#modal-fileupload-close").click(function(e){
        $("#modal-fileupload").hide();
      }); 
      $("#modal-fileupload-close-pwd").click(function(e){
        $("#modal-fileupload-pwd").hide();
      }); 
      var clickidpwd = 0;
      $(".browse-updload-buton-pwd").click(function(e){
        $('#id-view-image-pwd').css("display", "");
        $("#modal-fileupload-pwd").show();
        // if(clickidpwd == 0){
        //   $(".browse-updload-buton-pwd").text('Hide');
        //   clickidpwd = 1;
        // }else{
        //   $('#id-view-image-pwd').css("display", "none");
        //   $(".browse-updload-buton-pwd").text('View');
        //   clickidpwd = 0;
        // }
      });

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      function readURLpwd(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-preview-pwd').attr('src', e.target.result);
            $('#image-preview-pwd').hide();
            $('#image-preview-pwd').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      var uploadcount = 0;
      $('#file-upload-pwd-id').change(function() { 
        $('#btn-upload-pwd-id-delete').prop('disabled', false);
      });
      $('#file-upload-id').change(function(event) { 
        const file = event.target.files[0];
        const fileSize = file.size; // File size in bytes
        const sizeInKB = (fileSize / 1024).toFixed(2);
        var filename = $('#file-upload-id').val().split('\\').pop();
        var lastIndex = filename.lastIndexOf("\\"); 
        $('.filename-id').text(sizeInKB+"KB");
        $('.upload-file-name').val(filename);
        $('.upload-file-name').text(filename);
        readURL(this);
        $('#id-view-image').prop('display', 'none');
        $('#btn-upload-id-delete').prop('disabled', false);
        $('#browse-with-file').css('display', "");
        $('#browse-button').css('display', "none");
        if(uploadcount == 0){
          uploadcount++;
          sectionSix_section2++;
          idsection++;
        }
        checkUploadFileSection(idsection);        
      });
      $('#pwd-file-upload-id').change(function(event) {
        const file = event.target.files[0];
        const fileSize = file.size; // File size in bytes
        const sizeInKB = (fileSize / 1024).toFixed(2); 
        
          readURLpwd(this);
          var filename = $('#pwd-file-upload-id').val().split('\\').pop();
          var lastIndex = filename.lastIndexOf("\\"); 
          $('.filename-id-pwd').text(sizeInKB+"KB");
          $('.pwd-upload-file-name').val(filename);
          $('.pwd-upload-file-name').text(filename);
          $("#identification_svg").css("display", "");
          $('#pwd-btn-upload-id-delete').prop('disabled', false);
          $('#browse-with-file-pwd').css('display', "");
          $('#browse-button-pwd').css('display', "none");
          $("#pwd-svg").css("display", "none");
          $("#pwd-svg-error").css("display", "none");
          $('#id-view-image-pwd').prop('display', 'none');
          checkUploadFileSectionPWD();
      });
      var clickid = 0;
      $(".browse-updload-buton").click(function(e){
        $("#modal-fileupload").show();
        $('#id-view-image').css("display", "");
        // if(clickid == 0){
        //   $(".browse-updload-buton").text('Hide');
        //   clickid = 1;
        // }else{
        //   $('#id-view-image').css("display", "none");
        //   $(".browse-updload-buton").text('View');
        //   clickid = 0;
        // }
      });
     
      function checkUploadFileSectionPWD() {
        if($('#id_no_pwd').val() == "" || $('#id_type_pwd').val() == "" || $('#pwd-file-upload-id').get(0).files.length== 0 ){
          $("#pwd-svg").css("display", "none");
          //$("#pwd-svg-error").css("display", "");
        }else{
          $("#pwd-svg").css("display", "");
          $("#pwd-svg-error").css("display", "none");
        }
      }
      function checkUploadFileSection(count) {
        if($('#id_no').val() == "" || $('#id_type').val() == "" || $('#file-upload-id').get(0).files.length== 0 ){
          $("#identification_svg").css("display", "none");
          //$("#identification_svg_error").css("display", "");
        }else{
          $("#identification_svg").css("display", "");
          $("#identification_svg_error").css("display", "none");
        }
      }
      // function checkPresentAddress(count) {
      //   if($('#address-house-unit').val() == "" || $('#street').val() == "" || $('#region').val() == "" || $('#province').val() == "" || $('#city').val() == "" || $('#barangay').val() == "" || $('#zip').val() == "" ){
      //       $("#present_address_svg").css("display", "none");
      //     }else{
      //       sectionFiveTag = 1;
      //       $("#present_address_svg").css("display", "");
      //       $("#present_address_svg_error").css("display", "none");
      //       // $('html, body').animate({
      //       //     scrollTop: $("#address-section-3rdpage").offset().top
      //       // }, 1000);
      //     }
      //   if(address_house_tag == 0 || city_tag==0 || street_tag==0 || barangay_tag==0 || region_tag==0 || zip_tag==0|| province_tag==0 ){
      //   }else{
          
      //   }
      // }
      // function checkCOuntSixSection(count) {
      //   if(count>9){
      //     sectionFiveTag = 1;
      //     // $('html, body').animate({
      //     //     scrollTop: $("#beneficiary-section-3rdpage").offset().top
      //     // }, 1000);
      //   }
      // }
      sectionSSeven = 0;
      sectionSSeven_tag = 0;
      sectionSSevenbene_tag = 0;
      sectionSSevenEmer_tag = 0;
      var bene_fullname_tag = 0;
      var bene_relationship_tag = 0;
      var bene_mobile_tag = 0;
      var emer_fullname_tag = 0;
      var emer_relationship_tag = 0;
      var emer_mobile_tag = 0;

      var bene = 0;
      var count = 1;
      var countarray = 0;

      


      $("#add_beneficiary").click(function(e){
        if(countarray<3){
          countarray++;
        }
        if(bene < 2){
          if(bene == 0){
            count =2;
          }
          if(bene == 1){
            count = 3;
            $('#add_beneficiary').css('display', "none");
            $('#add-beneficiary-div').css('display', "");
          }


          var row = '<div id="beneficiary-section'+bene+'" class="col-md-12">\
                <div class="beneficiary-header" style="display:none">\
                    <div class="col-md-3 offset-md-3">\
                        <div class="form-group">\
                            <p class="text-start beneficiary-number" style="margin: 0 !important;font-size: 11px; font-weight: 700;"> Beneficiary '+count +'</p>\
                        </div>\
                    </div>\
                    <div class="col-md-3 text-end">\
                        <div class="form-group">\
                            <p id="" class="text-end text-set-as-default default-text'+bene+'" style="margin: 0 !important;color:#008080; font-size: 11px;margin-right: 20px !important;" data-id="'+bene+'"> Set as emergency contact&nbsp;\
                                <svg class="default-emer-svg" display="none" width="12" height="12" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"\
                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>\
                                </svg>\
                            </p>\
                        </div>\
                    </div>\
                </div>\
                <div class="col-md-2 offset-md-3">\
                    <div class="form-group">\
                        <p class="text-start text-label-default"> Fullname<span class="text-danger">*</span></p>\
                        <input id="beneficiary-fullname'+bene+'" name="beneficiary-fullname[]" class="beneficiary-fullname"  type="text" placeholder="Fullname" onkeydown="return /[a-z -]/i.test(event.key)">\
                    </div>\
                </div>\
                <div class="col-md-2">\
                    <div class="form-group">\
                        <p class="text-start text-label-default"> Relationship  <span class="text-danger">*</span></p>\
                            <select id="beneficiary-relationship'+bene+'" style="display:block !important;" name="beneficiary-relationship[]" class="form-select  " placeholder="Relationship " data-style="btn-select" data-size="10"  data-live-search="false">\
                              <option selected value="">Relationship *</option>\
                              <option value="Father">Father</option>\
                              <option value="Mother">Mother</option>\
                              <option value="Brother">Brother</option>\
                              <option value="Sister">Sister</option>\
                              <option value="Son">Son</option>\
                              <option value="Daughter">Daughter</option>\
                              <option value="Nephew">Nephew</option>\
                              <option value="Niece">Niece</option>\
                              <option value="Siblings">Siblings</option>\
                              <option value="Husband">Husband</option>\
                              <option value="Wife">Wife</option>\
                            </select>\
                    </div>\
                </div>\
                <div class="col-md-2">\
                    <div class="form-group">\
                        <p class="text-start text-label-default"> Mobile<span class="text-danger">*</span></p>\
                      <input id="beneficiary-mobile'+bene+'" name="beneficiary-mobile[]" class="beneficiary-mobile cp-spacing-input" type="text" placeholder="(09XX) XXX-XXXX" oninput="phoneMaskPHno()" maxlength="15">\
                     \
                    </div>\
                </div>\
                <div class="col-md-2">\
                    <div class="form-group delete-div-beneficiary" >\
                        <svg id="delete-svg-beneficiary" data-id="'+bene+'" style="display:none" class="delete-svg-beneficiary" xmlns="http://www.w3.org/2000/svg" width="39" height="39" fill="none" viewBox="0 0 39 39"><path fill="#DD0707" d="M31.688 4.875H7.313a2.437 2.437 0 0 0-2.438 2.438v24.375a2.437 2.437 0 0 0 2.438 2.437h24.375a2.438 2.438 0 0 0 2.437-2.438V7.313a2.438 2.438 0 0 0-2.438-2.437Zm0 26.813H7.313V7.313h24.375v24.375Zm-6.45-16.2L21.222 19.5l4.014 4.013a1.221 1.221 0 0 1-.395 1.989 1.22 1.22 0 0 1-1.33-.265L19.5 21.223l-4.013 4.014a1.221 1.221 0 0 1-1.989-.395 1.22 1.22 0 0 1 .265-1.33l4.014-4.012-4.014-4.013a1.22 1.22 0 0 1 1.724-1.724l4.013 4.014 4.013-4.014a1.221 1.221 0 0 1 1.989.395 1.22 1.22 0 0 1-.265 1.33Z"/></svg>\
                    </div>\
                </div>\
            </div>';
            $('.beneficiary-div').append(row);
            $("#beneficiary-relationship"+ bene ).addClass("selectpicker");
            $(".default-text" ).addClass("text-set-as-default"+ bene);
            $("#beneficiary-relationship"+ bene ).addClass("beneficiary-relationship");
            $("#beneficiary-relationship"+ bene ).data('style', 'btn-select');
            
            $("#beneficiary-relationship"+ bene ).addClass("page-3-selectbox-4-validation");
            $("#beneficiary-fullname"+ bene ).addClass("page-3-section-4-validation");
            $("#beneficiary-mobile"+ bene ).addClass("page-3-section-4-validation");



            $("#beneficiary-relationship"+ bene ).selectpicker('refresh');
            bene++;
          $(".beneficiary-header").css("display","");
          $(".delete-svg-beneficiary").css("display","");
        }
      });
      $(document).delegate(".delete-svg-beneficiary", 'click', function () {
        bene--;
        countarray--;
        $('#add_beneficiary').css('display', "");
        $('#add-beneficiary-div').css('display', "none");

        $('#beneficiary-section' + $(this).data("id")).remove();
      });

      $("#btn-upload-pwd-id-delete").click(function(){
        $('#file-upload-pwd-id').val('');
        $('#btn-upload-pwd-id-delete').prop('disabled', true);

      });

      // $("#btn-upload-id-delete").click(function(){
      //   $("#modal-delete-upload").show();
      // });

      $("#btn-upload-id-delete").click(function(){
        $('#modal-delete-upload').show();
      });

      $("#modal-delete-upload-cancel").click(function(){
        $("#modal-delete-upload").hide();
      });

      $("#modal-delete-upload-confirm").click(function(){
        $("#identification_svg").css('display', 'none');
        $("#identification_svg_error").css('display', 'none');
        $('#image-preview').attr('src', "");
        $('#file-upload-id').val("");
        $('#id_no').val("");
        $('#id_type').val("refresh");
        $("#id_type" ).selectpicker('refresh');
        $("#browse-with-file").hide();
        $("#browse-button").show();
        $("#modal-delete-upload").hide();
      });


      $("#pwd-modal-delete-upload-confirm").click(function(){
        $("#pwd_svg").css('display', 'none');
        $("#pwd_svg_error").css('display', 'none');
        $('#image-preview-pwd').attr('src', "");
        $('#pwd-file-upload-id').val("");
        $("#browse-with-file-pwd").hide();
        $("#browse-button-pwd").show();
        $("#pwd-modal-delete-upload").hide();
        $('#id_no_pwd').val("");
        $('#id_type_pwd').val("refresh");
        $("#id_type_pwd" ).selectpicker('refresh');
      });

      $("#pwd-btn-upload-id-delete").click(function(){
        $('#pwd-modal-delete-upload').show();
      });


     $("#pwd-modal-delete-upload-cancel").click(function(){
        $("#pwd-modal-delete-upload").hide();
      });
      

      // $("#pwd-btn-upload-id-delete").click(function(){
      //     $('#pwd-btn-upload-id-delete').prop('disabled', true);
      //     $('.pwd-upload-file-name').text("");

      //     $('#file-upload-id').val('');
      //     $("#identification_svg").css("display", "none");
          
      //     $('#browse-with-file-pwd').css('display', "none");
      //     $('#browse-button-pwd').css('display', "");
      //     $("#pwd-svg-error").css("display", "");

      // });

      // $("#beneficiary-fullname").on("input", function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find("option").css("color", "#212529");if(bene_fullname_tag==0){bene_fullname_tag++;sectionSSeven++;sectionSSevenbene_tag++;}}
      //     else{input.removeClass("valid").addClass("invalid");if(bene_fullname_tag>0){bene_fullname_tag=0;sectionSSeven--;sectionSSevenbene_tag--;}}
      //     checkBeneficiary(sectionSSevenbene_tag);
      // });


      // $("#beneficiary-relationship").on("input", function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find("option").css("color", "#212529");if(bene_relationship_tag==0){bene_relationship_tag++;sectionSSeven++;sectionSSevenbene_tag++;}}
      //     else{input.removeClass("valid").addClass("invalid");if(bene_relationship_tag>0){bene_relationship_tag=0;sectionSSeven--;sectionSSevenbene_tag--;}}
      //     checkBeneficiary(sectionSSevenbene_tag);
      // });

      // jQuery('#beneficiary-relationship').change(function(){
      //     var input=$(this);
      //     var is_name=input.val();
      //     $(this).closest('.btn-group').find('button').removeClass('invalid-select');
      //     $(this).closest('.btn-group').removeClass('invalid-select');
      //     if(is_name){
      //       if(bene_relationship_tag==0){bene_relationship_tag=1;sectionFive++;}
      //     }else{
      //       // $("#additional-info-svg-error").css("display", "");
      //       $(this).closest('.btn-group').find('button').addClass('invalid-select'); 
      //       $(this).closest('.btn-group').addClass('invalid-select');
      //       if(bene_relationship_tag>0){sectionFive--;}
      //       // if(bene_relationship_tag==0){$("#additional-info-svg-error").css("display", "");}
      //     }
      //     checkBeneficiary(sectionSSevenbene_tag);
      // });
     
      // $("#beneficiary-mobile").on("input", function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find("option").css("color", "#212529");if(bene_mobile_tag==0){bene_mobile_tag++;sectionSSeven++;sectionSSevenbene_tag++;}}
      //     else{input.removeClass("valid").addClass("invalid");if(bene_mobile_tag>0){bene_mobile_tag=0;sectionSSeven--;sectionSSevenbene_tag--;}}
      //     checkBeneficiary(sectionSSevenbene_tag);
      // });

      

      // $("#emergency-fullname").on("input", function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find("option").css("color", "#212529");if(emer_fullname_tag==0){emer_fullname_tag++;sectionSSeven++;sectionSSevenEmer_tag++;}}
      //     else{input.removeClass("valid").addClass("invalid");if(emer_fullname_tag>0){emer_fullname_tag=0;sectionSSeven--;sectionSSevenEmer_tag--;}}
      //     checkEmergency(sectionSSevenEmer_tag);
      // });

      // jQuery('#emergency-relationship').change(function(){
      //     var input=$(this);
      //     var is_name=input.val();
      //     $(this).closest('.btn-group').find('button').removeClass('invalid-select');
      //     $(this).closest('.btn-group').removeClass('invalid-select');
      //     if(is_name){
      //       if(emer_relationship_tag==0){emer_relationship_tag=1;sectionSSeven++;}
      //     }else{
      //       $(this).closest('.btn-group').find('button').addClass('invalid-select'); 
      //       $(this).closest('.btn-group').addClass('invalid-select');
      //       if(emer_relationship_tag>0){sectionSSeven--;}
      //     }
      //     checkEmergency(sectionSSevenEmer_tag);

      // });


      // $("#emergency-mobile").on("input", function() {
      //     var input=$(this);
      //     var is_name=input.val();
      //     if(is_name){input.removeClass("invalid").addClass("valid");  $(this).find("option").css("color", "#212529");if(emer_mobile_tag==0){emer_mobile_tag++;sectionSSeven++;sectionSSevenEmer_tag++;}}
      //     else{input.removeClass("valid").addClass("invalid");if(emer_mobile_tag>0){emer_mobile_tag=0;sectionSSeven--;sectionSSevenEmer_tag--;}}
      //     checkEmergency(sectionSSevenEmer_tag);
      // });
      // function checkEmergency(count) {
      //   if($("#emergency-mobile").val() == "" ||$("#emergency-relationship").val()  == "" || $("#emergency-fullname").val()  == "" ){
      //     $("#emergency-svg").css("display", "none");
      //     $("#emergency-svg-error").css("display", "");
      //   }else{
      //     $("#emergency-svg").css("display", "");
      //     $("#emergency-svg-error").css("display", "none");
      //   }
      //   if(sectionSSeven >5){
      //     checkGoto8Section();
      //   }
      // }

      // function checkBeneficiary(count) {
      //   if(count>2){
      //     $("#beneficiary-svg").css("display", "initial");
      //     $("#beneficiary-svg-error").css("display", "");
      //   }
      //   if(sectionSSeven >5){
      //     checkGoto8Section();
      //   }
      // }

      function checkGoto8Section() {
        sectionSSeven_tag = 1;
          // $('html, body').animate({
          //     scrollTop: $("#pwd-section-3rdpage").offset().top
          // }, 1000);
      }
    });
</script>
<script>
    $(document).ready(function(){
      $('#btn-upload-id-delete').prop('disabled', true);
      $('#btn-upload-pwd-id-delete').prop('disabled', true);
      $("#exlimitaions").hide();
      $("#privacyPolicy").hide();
      $("#terms-and-condition").hide();
      $("#pwd_id_div").css("display","none");
      $(".delete-row-col-destiney").css("display","none");
      window.addEventListener("scroll", () => {
        if(window.scrollY > 0){
            $(".itp-title").hide();
            $(".frame-108774").css({ 
                'background-color' : '#008080', 
                'margin-top' : '80px', 
                'color' : '#fff' 
            });
            $(".frame-108774").addClass("progress_scrolled");
            $(".trip-details").css({ 'color' : '#fff' }); 
            $(".quotation").css({ 'color' : '#fff' }); 
            $(".personal-data").css({ 'color' : '#fff' }); 
            $(".payment").css({ 'color' : '#fff' }); 
            $(".in-progress").css({ 'color' : '#fff' }); 
            $(".pending").css({ 'color' : '#bbc1c7' }); 
            $(".completed").css({ 'color' : '#ffffff' }); 
        }else{
            $(".frame-108774").removeClass("progress_scrolled");
            $(".itp-title").show();
            $(".frame-108774").css({ 
                'background-color' : '', 
                'margin-top' : '0px', 
                'color' : '' 
            });
            $(".trip-details").css({ 'color' : '' }); 
            $(".quotation").css({ 'color' : '' }); 
            $(".personal-data").css({ 'color' : '' }); 
            $(".payment").css({ 'color' : '' }); 
            $(".in-progress").css({ 'color' : '' }); 
            $(".pending").css({ 'color' : '' }); 
            $(".completed").css({ 'color' : '' }); 

        }
      });
      $("#modal-covid-include-confirm-modal").hide();
      $("#modal-payment-method").hide();
      var init = false;
      var pricingCardSwiper;
      var pricingLoanSwiper;
      function swiperCard() {
          if (window.innerWidth <= 991) {
              if (!init) {
                  init = true;
                  pricingCardSwiper = new Swiper("#pricingTableSlider", {
                      slidesPerView: "auto",
                      spaceBetween: 5,
                          grabCursor: true,
                              keyboard: true,
                                  autoHeight: false,
                                      navigation: {
                          nextEl: "#navBtnRight",
                          prevEl: "#navBtnLeft"
                      }
                  });
              }
          } else if (init) {
              pricingCardSwiper.destroy();
              init = false;
          }
      }

      function ReplaceNumberWithCommas(yourNumber) {
        //Seperates the components of the number
        var n= yourNumber.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
      }
      swiperCard();
      window.addEventListener("resize", swiperCard);

      $("#non_air_check_svg").hide();
      $("#cruise_yes_check_svg").hide();
      $("#covid_yes_check_svg").hide();
      $("#covid_15_days_svg").hide();
      $("#covid_entire_duration_svg").hide();
      $("#multiple-destination").css("background-color","transparent");
      $("#multiple-destination_text").css("color","#e4509a");
      $("#single-destination").css("background-color","transparent");
      $("#single-destination_text").css("color","#e4509a");
      $("#single-destination_text").css("width","170px");
      $("#single-destination_text").css("text-align","center");
      $("#single_check_svg").hide();
      $("#multiple_check_svg").hide();

      $("#air-destination").css("background-color","transparent");
      $("#air-destination_text").css("color","#fff");
      $("#non-air-destination").css("background-color","transparent");
      $(".air_I391_13219_260_4228").css("color","#fff");
      $(".non-air_I391_13219_260_4230").css("color","#e4509a");
      $("#non-air-destination_text").css("color","#e4509a");
      $("#air-destination").css("background-color","transparent");
      $("#air-destination_text").css("color","#e4509a");
      $(".air_I391_13219_260_4228").css("color","#e4509a");
      $("#air_check_svg").hide();
      $("#non_air_check_svg").hide();
          
      $("#covid-div-no").css("background-color","#e4509a");
      $("#covid-div-yes").css("background-color","transparent");
      $(".yes_543_19031").css("color","#e4509a");
      $("#covid-div-no").css("background-color","transparent");
      $(".no_543_19029").css("color","#e4509a");
      $("#covid_no_check_svg").hide();
      $("#covid_yes_check_svg").hide();

      $("#cruise-div-yes").css("background-color","transparent");
      $(".yes_543_19049").css("color","#e4509a");
      $("#cruise-div-no").css("background-color","transparent");
      $(".no_543_19047").css("color","#e4509a");
      $("#cruise_no_check_svg").hide();
      $("#cruise_yes_check_svg").hide();


      $(".covid_15_days ").css("color","#e4509a");
      $(".entire_duration_covid").css("color","#e4509a");


      $("#promo-div-yes").css("background-color","transparent");
      $(".yes_promo_text").css("color","#e4509a");
      $("#promo-div-no").css("background-color","transparent");
      $(".no_promo_text").css("color","#e4509a");
      $("#promo_no_check_svg").hide();
      $("#promo_yes_check_svg").hide();


      $("#pwd-div-yes").css("background-color","transparent");
      $(".pwd_yes_543_19049").css("color","#e4509a");
      $("#pwd-div-no").css("background-color","transparent");
      $(".pwd_no_543_19047").css("color","#e4509a");
      $("#pwd_no_check_svg").hide();
      $("#pwd_yes_check_svg").hide();

      $("#rtpcr-div-yes").css("background-color","transparent");
      $(".rtpcr_yes_text").css("color","#e4509a");
      $("#rtpcr-div-no").css("background-color","transparent");
      $(".rtpcr_no_text").css("color","#e4509a");
      $("#rtpcr_no_check_svg").hide();
      $("#rtpcr_yes_check_svg").hide();

      $("#agent-div-yes").css("background-color","transparent");
      $(".agent_yes_text").css("color","#e4509a");
      $("#agent-div-no").css("background-color","transparent");
      $(".agent_no_text").css("color","#e4509a");
      $("#agent_no_check_svg").hide();
      $("#agent_yes_check_svg").hide();


      
      widget      = $(".step");
      btnnext     = $(".next");
      btnnextQuotation     = $("#quotation_next");

      btnback     = $(".back");
      current = 1;
      widget.not(':eq(0)').hide();
      btnback.show();
      
  
      $("#next").click(function(e){
             if(current < widget.length) {
                if(current == 1){
                 
                }

                if(current == 10){
                  var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                    <div class="frame-108567">\
                      <div class="trip-details">Trip Details</div>\
                      <div class="completed">Completed</div>\
                    </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(completed);

                  var inprogress = ' <div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
                }

                if(current == 2){
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_quotation').empty();
                    $('#progress_quotation').append(completed);

                    var inprogress = ' <div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);                  
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
                }

                if(current == 3){
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_personal').empty();
                    $('#progress_personal').append(completed);

                    var inprogress = '<div class="frame-108563">\
                      <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Payment</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#09a12a'});
                }

                if(current == 4){
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Payment</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_payment').empty();
                    $('#progress_payment').append(completed);
                }
                widget.show();
                widget.not(':eq('+(current++)+')').hide();
                setProgress(current);
                hideButtons(current);
             }
      });

      //1st page buttons
      $("#first_next").click(function(e){
          var errorCount = 0;
          var errorPage1 = 0;
          var errorPage2 = 0;
          var errorPage3 = 0;
          var errorPage4 = 0;
          var errorPage5 = 0;
          //validation
          //section1
          if($("#first_name").val()){$("#first_name").removeClass("invalid").addClass("valid"); $("#first_name").find('option').css('color', '#212529');}
          else{$("#first_name").removeClass("valid").addClass("invalid");errorPage1 = 1;}
         
          if($("#last_name").val()){$("#last_name").removeClass("invalid").addClass("valid");  $("#last_name").find('option').css('color', '#212529');}
          else{$("#last_name").removeClass("valid").addClass("invalid");errorPage1 = 1;}
         
          

          if($("#suffix").val()){
            $("#suffix").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#suffix").closest('.btn-group').removeClass('invalid-select');
            $("#suffix").removeClass("invalid").addClass("valid"); 
            $("#suffix").find('option').css('color', '#212529');}
          else{
            $("#suffix").closest('.btn-group').find('button').addClass('invalid-select');
            $("#suffix").closest('.btn-group').addClass('invalid-select');
            errorPage1 = 1;
          }
          
          if($("#mobile").val()){
            if($("#mobile").val().length < 15){
              $("#mobile").removeClass("valid").addClass("invalid");
              errorPage1 = 1;
            }else{
              if($("#mobile").val().charAt(1) != 0 || $("#mobile").val().charAt(1) != "0"){
                $("#mobile").removeClass("valid").addClass("invalid");
                errorPage1 = 1;
              }else if($("#mobile").val().charAt(2) != 9 || $("#mobile").val().charAt(2) != "9"){
                $("#mobile").removeClass("valid").addClass("invalid");
              errorPage1 = 1;
              }else{
                $("#mobile").removeClass("invalid").addClass("valid"); 
                $("#mobile").find('option').css('color', '#212529');
              }
              
            }
          }else{
            $("#mobile").removeClass("valid").addClass("invalid");
            errorPage1 = 1;
          }
          
          if($("#email").val()){$("#email").removeClass("invalid").addClass("valid"); $("#email").find('option').css('color', '#212529');}
          else{$("#email").removeClass("valid").addClass("invalid");errorPage1 = 1;}
          
          var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
          var is_email=re.test($("#email").val());
          if(is_email){$("#email").removeClass("invalid").addClass("valid");}
          else{$("#email").removeClass("valid").addClass("invalid");errorPage1 = 1;}
            
          if(errorPage1 > 0){
            $('html, body').animate({
              scrollTop: 100
            }, 1000);
          }


          $("#part1-personal-info-svg-error").css("display", "none");
          $("#part1-personal-info-svg").css("display", "none");
          if(errorPage1 > 0){
            $("#part1-personal-info-svg-error").css("display", "");
          }else{
            $("#part1-personal-info-svg").css("display", "");
          }

          //section 2
          if($('input[name="hdn_destination_type"]').val() == ""){
            $(".pwd_no_543_19047").css("color","#e4509a");
            errorPage2 = 1;
          }

          // if($('input[name="hdn_travelling"]').val() == ""){
          //   errorPage2 = 1;
          // }
          
          $("#part1-travel-details-svg-error").css("display", "none");
          $("#part1-travel-details-svg").css("display", "none");
         

          if((errorPage1 == 0)  &&  (errorPage2 > 0)){
            $('html, body').animate({
              scrollTop: 450
            }, 1000);
          }
     

          //section3

          var fromvalidation = $('#destination_from').val();
          var tovalidation = $('#destination_to').val();
          var startvalidation = new Date(fromvalidation);
          var endvalidation = new Date(tovalidation);
          var diffDatevalidation = (endvalidation - startvalidation) / (1000 * 60 * 60 * 24);

          $('select[name^="destinations"]').each(function(){
            var id = $(this).attr("id");
            $(this).closest('.btn-group').find('button').removeClass('invalid-select');
            $(this).closest('.btn-group').removeClass('invalid-select');
            $('#'+ id ).removeClass("invalid").addClass("valid");
              if($(this).val() == ""){
                $(this).closest('.btn-group').find('button').addClass('invalid-select');
                $(this).closest('.btn-group').addClass('invalid-select');
                $(this).closest('.btn-group').removeClass('valid');
                  errorPage3 = 1;
              }
          });

          if($('#destination_from').val() == ""){
            $("#destination_from").removeClass("valid").addClass("invalid");
            errorPage3 = 1;
          }else{
            $("#destination_from").removeClass("invalid").addClass("valid");$("#destination_from").find('option').css('color', '#212529');
          }
          if($('#destination_to').val() == ""){
            $("#destination_to").removeClass("valid").addClass("invalid");
            errorPage3 = 1;
          }else{
            $("#destination_to").removeClass("invalid").addClass("valid");  $("#destination_to").find('option').css('color', '#212529');
          }
          
          if(diffDatevalidation < 0 ){
            $("#destination_from").removeClass("valid").addClass("invalid");
            $("#destination_to").removeClass("valid").addClass("invalid");;
            errorPage3 = 1;
          }
            var Datevalidation = Math.round(diffDatevalidation);
            var Datevalidation = Datevalidation + 1;
            if(Datevalidation > 180){
              $('#error-message-calendar-until').css('display', '');
              errorPage3 = 1;
            }

          $("#part1-travel-details-svg-error").css("display", "none");
          $("#part1-travel-details-svg").css("display", "none");
       
          if(errorPage2 > 0 || errorPage3 > 0){
            $("#part1-travel-details-svg-error").css("display", "");
          }else{
            $("#part1-travel-details-svg").css("display", "");
          }
          
          if((errorPage1 == 0)  && (errorPage2 == 0)  &&  (errorPage3 > 0)){
            $('html, body').animate({
              scrollTop: 650
            }, 1000);
          }

       

          //section 4
          if($('input[name="hdn_covid_tag"]').val() == ""){
            errorPage4 = 1;
          }

          if($('input[name="hdn_covid_tag"]').val() == "Yes"){
            if($('input[name="hdn_covid_yes_type"]').val() == ""){

              var from = $('#destination_from').val();
              var to = $('#destination_to').val();
              var start = new Date(from);
              var end = new Date(to);
              var diffDate = (end - start) / (1000 * 60 * 60 * 24);
              var days = Math.round(diffDate);
              var days = days + 1;
              
              if(days > 16){
                errorPage4 = 1;
              }else{
                $('input[name="hdn_covid_yes_type"]').val("entire");
              }
            
            }
          }


          var errorPage41 = 0;
          if($('input[name="hdn_cruise_tag"]').val() == ""){
            errorPage41 = 1;
          }
          
          
          if($('input[name="hdn_cruise_tag"]').val() == "Yes"){
              $('select[name^="cruise_destinations"]').each(function(){
                var id = $(this).attr("id");
                $(this).closest('.btn-group').find('button').removeClass('invalid-select');
                $(this).closest('.btn-group').removeClass('invalid-select');
                $('#'+ id ).removeClass("invalid").addClass("valid");
                  if($(this).val() == ""){
                    $(this).closest('.btn-group').find('button').addClass('invalid-select');
                    $(this).closest('.btn-group').addClass('invalid-select');
                    $(this).closest('.btn-group').removeClass('valid');
                    errorPage41 = 1;
                  }
              });

              if($('#destination_from_cruise').val() == ""){
                $("#destination_from_cruise").removeClass("valid").addClass("invalid");
                errorPage41 = 1;
              }else{
                $("#destination_from_cruise").removeClass("invalid").addClass("valid");$("#destination_from").find('option').css('color', '#212529');
              }
              if($('#destination_to_cruise').val() == ""){
                $("#destination_to_cruise").removeClass("valid").addClass("invalid");
                errorPage41 = 1;
              }else{
                $("#destination_to_cruise").removeClass("invalid").addClass("valid");  $("#destination_to_cruise").find('option').css('color', '#212529');
              }
            
              if(diffDatevalidation < 0 ){
                $("#destination_from_cruise").removeClass("valid").addClass("invalid");
                $("#destination_to_cruise").removeClass("valid").addClass("invalid");;
                errorPage41 = 1;
              }
          }

          $("#part1-covid-svg-error").css("display", "none");
          $("#part1-covid-svg").css("display", "none");
          if(errorPage4 > 0){
            $("#part1-covid-svg-error").css("display", "");
          }else{
            $("#part1-covid-svg").css("display", "");
          }

          $("#part1-cruise-svg-error").css("display", "none");
          $("#part1-cruise-svg").css("display", "none");
          if(errorPage41 > 0){
            $("#part1-cruise-svg-error").css("display", "");
          }else{
            $("#part1-cruise-svg").css("display", "");
          }

          if((errorPage1 == 0)  && (errorPage2 == 0)  && (errorPage3 == 0)  &&  (errorPage4 > 0)){
            $('html, body').animate({
              scrollTop: 1050
            }, 1000);
          }

          if((errorPage1 == 0)  && (errorPage2 == 0)  && (errorPage3 == 0)  &&  (errorPage41 > 0)){
            $('html, body').animate({
              scrollTop: 1050
            }, 1000);
          }

          //section 5
          var errorPage5 = 0;
            $("#part1-promo-svg-error").css("display", "none");
            $("#part1-promo-svg-success").css("display", "none");

            if($('input[name="hdn_promo_tag"]').val() == ""){
              $("#part1-promo-svg-error").css("display", "");
              errorPage5 = 1;
            }else{
              if($('input[name="hdn_promo_tag"]').val() == "No"){
                $("#part1-promo-svg-success").css("display", "");
              }else{
                if($('input[name="hdn_promo_amount"]').val() == ""){
                  errorPage5 = 1;
                }
              }
            }
            if(errorPage5 > 0){
              $("#part1-promo-svg-error").css("display", "");
            }else{
              $("#part1-promo-svg-success").css("display", "");
            }

          if((errorPage1 > 0)  || (errorPage2 > 0)  || (errorPage3 > 0)  ||  (errorPage4 > 0)  ||  (errorPage41 > 0) || (errorPage5 > 0)){
            return false;
          }
        //end validation


        destinations_list ="";
        destinations_list_for_package ="";
        var dest_count = 0;
        $('select[name^="destinations"]').each(function(){
          if( $(this).val() != ""){
              dest_count++;
              if(destinations_list == ""){
                  destinations_list =  $(this).val();
                  destinations_list_for_package =  $(this).val();
              }else{
                  destinations_list = destinations_list + ',' + $(this).val();
                  destinations_list_for_package = destinations_list_for_package + ', ' + $(this).val();
              }
          }
        });
        
        var from = $('#destination_from').val();
        var to = $('#destination_to').val();
        var start = new Date(from);
        var end = new Date(to);
        var diffDate = (end - start) / (1000 * 60 * 60 * 24);
        var days = Math.round(diffDate);
        var days = days + 1;

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "JuL", "Aug", "Sep", "Oct", "Nov", "Dec" ];
        const monthNamesFull = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var datefrom = new Date(from);
        var dayfrom = datefrom.getDate();
        var monthfrom = datefrom.getMonth() + 1;
        var yearfrom = datefrom.getFullYear();
        if (dayfrom < 10) {
            dayfrom = "0" + dayfrom;
        }

        var dateto = new Date(to);
        var dayto = dateto.getDate();
        var monthto = dateto.getMonth() + 1;
        var yearto = dateto.getFullYear();
        if (dayto < 10) {
            dayto = "0" + dayto;
        }
        var traveldates = "";
        if(yearfrom == yearto){
          traveldates =  dayfrom+ " " + monthNamesFull[datefrom.getMonth()]  + " - " + dayto  + " " +  monthNamesFull[dateto.getMonth()];

          if(monthNames[dateto.getMonth()] == monthNames[datefrom.getMonth()]){
          var fulldate =  monthNames[dateto.getMonth()] + ". " + dayfrom + "-" + dayto + ", " + yearto; 
          }else{
            var fulldate =  monthNames[datefrom.getMonth()] + ". " + dayfrom+ " - " + monthNames[dateto.getMonth()] + ". " + dayto + ", " + yearfrom; ; 
          }
        }else{
            var fulldate =  monthNames[datefrom.getMonth()] + ". " + dayfrom+ ", " + yearfrom + " - " + monthNames[dateto.getMonth()] + ". " + dayto + ", " + yearto; ; 
            traveldates =  dayfrom+ " " + monthNamesFull[datefrom.getMonth()] + ", " + yearfrom + " - " + dayto  + " " +  monthNamesFull[dateto.getMonth()]+ ", " + yearto;
        
        }

        var from_fulldate =  monthNamesFull[datefrom.getMonth()] + " " + dayfrom + ", " + yearfrom; 
        var to_fulldate =  monthNamesFull[dateto.getMonth()] + " " + dayto + ", " + yearto; 
       

        if($('input[name="hdn_covid_tag"]').val() == "Yes"){
          if(days < 16){
            $('.package-coverate-covid-from').text(from_fulldate);
            $('.package-coverate-covid-to').text(to_fulldate);
            $('input[name="hdn_covid_return"]').val($('#destination_to').val());
          }else{
            if($('input[name="hdn_covid_yes_type"]').val() == "entire"){
              $('input[name="hdn_covid_return"]').val($('#destination_to').val());
              $('.package-coverate-covid-from').text(from_fulldate);
              $('.package-coverate-covid-to').text(to_fulldate);
            }else{
              var date_return = new Date( $('#destination_from').val());
              date_return.setDate(date_return.getDate() + 14);
              var newDatereturn = date_return.toISOString().split('T')[0];
              $('input[name="hdn_covid_return"]').val(newDatereturn);
              $('.package-coverate-covid-from').text(from_fulldate);
              var datefromreturn = new Date(newDatereturn);
              var dayfromreturn = datefromreturn.getDate();
              var monthfromreturn = datefromreturn.getMonth() + 1;
              var yearfromreturn = datefromreturn.getFullYear();
              if (dayfromreturn < 10) {
                  dayfromreturn = "0" + dayfromreturn;
              }
              var fulldatereturn =  monthNamesFull[datefromreturn.getMonth()] + " " + dayfromreturn + ", " + yearfromreturn; 
              $('.package-coverate-covid-to').text(fulldatereturn);
            }
          }
        }

        destinations_list_cruise ="";
        if($('input[name="hdn_cruise_tag"]').val() == "Yes"){
          $('select[name^="cruise_destinations"]').each(function(){
            if( $(this).val() != ""){
                if(destinations_list_cruise == ""){
                    destinations_list_cruise =  $(this).val();
                }else{
                    destinations_list_cruise = destinations_list_cruise + ',' + $(this).val();
                }
            }
          });

          var from_cruise = $('#destination_from_cruise').val();
          var to_cruise = $('#destination_to_cruise').val();
          
          var datefrom_cruise = new Date(from_cruise);
          var dayfrom_cruise = datefrom_cruise.getDate();
          var monthfrom_cruise = datefrom_cruise.getMonth() + 1;
          var yearfrom_cruise = datefrom_cruise.getFullYear();
          if (dayfrom_cruise < 10) {
              dayfrom_cruise = "0" + dayfrom_cruise;
          }

          var dateto_cruise = new Date(to_cruise);
          var dayto_cruise = dateto_cruise.getDate();
          var monthto_cruise = dateto_cruise.getMonth() + 1;
          var yearto_cruise = dateto_cruise.getFullYear();
          if (dayto_cruise < 10) {
              dayto_cruise = "0" + dayto_cruise;
          }

          var from_fulldate_cruise =  monthNamesFull[datefrom_cruise.getMonth()] + " " + dayfrom_cruise + ", " + yearfrom_cruise; 
          var to_fulldate_cruise =  monthNamesFull[dateto_cruise.getMonth()] + " " + dayto_cruise + ", " + yearto_cruise; 
       
          $('.package-coverate-cruise-destination').text(destinations_list_cruise);
          $('.package-coverate-cruise-from').text(from_fulldate_cruise);
          $('.package-coverate-cruise-to').text(to_fulldate_cruise);
        }
       
        $('.summary-full-name').text($('#first_name').val() + " " + $('#last_name').val());
        $('.summary-mobile').text($('#mobile').val());
        $('.summary-email').text($('#email').val());
        $('.summary-telephone').text("-");
        $('.summary-birthday').text("-");
        $('.summary-travel-dates').text(traveldates);


        $('#first_name_3rd_page').val($('#first_name').val());
        $('#last_name_3rd_page').val($('#last_name').val());
        $('#suffix_3rd_page').val($('#suffix').val());
        $('#mobile_3rd_page').val($('#mobile').val());
        $('#email_3rd_page').val($('#email').val());
        $('#citizenship_3rd_page').val($('#citizenship').val());

        $('.accordion.active').click();
        $('#pnl-subjectivies').removeClass('subjectivity-active');
        $('#pnl-subjectivies').removeClass('subjectivity-non-active');
        $('#pnl-subjectivies-mobile').removeClass('subjectivity-active');
        $('#pnl-subjectivies-mobile').removeClass('subjectivity-non-active');
        
        $('#pnl-subjectivies-final-page').removeClass('subjectivity-active');
        $('#pnl-subjectivies-final-page').removeClass('subjectivity-non-active');
        $('#pnl-subjectivies-final-page-mobile').removeClass('subjectivity-active');
        $('#pnl-subjectivies-final-page-mobile').removeClass('subjectivity-non-active');


        if ($('#btn-subjectivies').hasClass("active")) {
            $('#pnl-subjectivies').addClass('subjectivity-active');
        }else{
            $('#btn-subjectivies').addClass('active');
            $('#pnl-subjectivies').addClass('subjectivity-active');
        }

        if ($('#btn-subjectivies-mobile').hasClass("active")) {
            $('#pnl-subjectivies-mobile').addClass('subjectivity-active');
        }else{
            $('#btn-subjectivies-mobile').addClass('active');
            $('#pnl-subjectivies-mobile').addClass('subjectivity-active');
        }

        if ($('#btn-subjectivies-final-page').hasClass("active")) {
            $('#pnl-subjectivies-final-page').addClass('subjectivity-active');
        }else{
            $('#btn-subjectivies-final-page').addClass('active');
            $('#pnl-subjectivies-final-page').addClass('subjectivity-active');
        }

        if ($('#btn-subjectivies-final-page-mobile').hasClass("active")) {
            $('#pnl-subjectivies-final-page-mobile').addClass('subjectivity-active');
        }else{
            $('#btn-subjectivies-final-page-mobile').addClass('active');
            $('#pnl-subjectivies-final-page-mobile').addClass('subjectivity-active');
        }

        if ($('.subjectivities-active-final-page').hasClass("active")) {
          $('.subjectivities-panel-final-page').addClass('subjectivity-active');
        }else{
          $('.subjectivities-active').click();
          $('.subjectivities-panel-final-page').addClass('subjectivity-active');
        }


        // $('.package-coverate-covid').text($('input[name="hdn_covid_tag"]').val());
        $('.package-coverate-cruise').text($('input[name="hdn_cruise_tag"]').val());
        $('.summary-from-date').text(from_fulldate);
        $('.summary-to-date').text(to_fulldate);
        $('.package-destination-date').text(fulldate);
        $('.package-destination-count').text(dest_count);
        $('.package-destination-list').text(destinations_list_for_package);
        $('.package-air-or-non-air-count').text($('input[name="hdn_travelling"]').val());
        $('.summary-via-air-or-non-air-type').text($('input[name="hdn_travelling"]').val());
        $('.summary-destination-type').text($('input[name="hdn_destination_type"]').val());
        $('.summary-via-air-or-non-air-type').css("text-transform","capitalize");
        $('.summary-destination-type').css("text-transform","capitalize");

        $('#promo-div-economy').css("display","none");
        $('#promo-div-esteem').css("display","none");
        $('#promo-div-elite').css("display","none");
        $('#promo-div-executive').css("display","none");

        $.ajax({
          url:  $('input[name="url"]').val() + '/get-quote/itp-insurance/get-premium-all',
          method:"GET",
          data:{ _token:$('input[name="_token"]').val(),
                  cruise_tag:$('input[name="hdn_cruise_tag"]').val(),
                  covid_tag:$('input[name="hdn_covid_tag"]').val(),
                  noofday:days,
                  covidtype:$('input[name="hdn_covid_yes_type"]').val(),
                  destinations:destinations_list,
                  destinations_cruise:$('#destinations').val()
              },   error: function(data){
                                        var errors = data.responseJSON;
                                        jQuery.each(data, function(key, value){
                                          });
                                      }, 

              success:function(result){
                    if ($.trim(result)){ 
                      jQuery.each(result, function(key, value){
                          if(value[0] == 'economy_individual'){
                            if(value[7] == "Y"){
                              $('#div-package-economy').hide();
                              $('#div-more-package-economy').hide();
                            }else{
                              $('#div-package-economy').show();
                              var prem_economy = value[1];
                              var lgt_economy = (parseFloat(prem_economy) *0.2)/100;
                              var dst_economy = 4.00;
                              if( $('input[name="hdn_covid_tag"]').val()== "No"){
                                  dst_economy = 2.00;
                              }
                              
                              var premtax_economy = (prem_economy *2)/100;
                              $('input[name="hdn_original_premium_economy"]').val(prem_economy.toFixed(2));
                              $('input[name="hdn_dst_economy"]').val(dst_economy);
                              $('input[name="hdn_premtax_economy"]').val(premtax_economy.toFixed(2));
                              $('input[name="hdn_lgt_economy"]').val(lgt_economy.toFixed(2));
                              prem_economy = parseFloat(prem_economy)+ premtax_economy+ dst_economy + lgt_economy;
                              $('input[name="hdn_due_premium_economy"]').val(prem_economy.toFixed(2));

                              $('input[name="hdn_prem_travel_economy"]').val(value[6]);
                              $('input[name="hdn_prem_liability_economy"]').val(value[2]);
                              $('input[name="hdn_prem_burial_economy"]').val(value[3]);
                              $('input[name="hdn_prem_add_economy"]').val(value[4]);
                              $('input[name="hdn_covid_economy"]').val(value[5]);


                              $('input[name="hdn_promo_less_economy"]').empty();

                              if($('#promo').val()){
                                $('#promo-div-economy').css("display","");
                                $('.promo_code').text($('#promo').val());
                                if($('input[name="hdn_promo_type"]').val() == "P"){
                                    var promo_less = (prem_economy*$('input[name="hdn_promo_amount"]').val())/100;
                                    var promo_less_piso = promo_less*$('input[name="hdn_dollar_rate"]').val();
                                    prem_economy = prem_economy - promo_less;
                                    var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less_piso).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2));
                                    $('input[name="hdn_promo_less_economy"]').val(promo_less);
                                    $('#promo_amount_economy').text(promo_amount);
                                
                                }else{
                                    var promo_less = $('input[name="hdn_promo_amount"]').val();
                                    var promo_less_dollar = promo_less / ($('input[name="hdn_dollar_rate"]').val());
                                    prem_economy = prem_economy - promo_less_dollar;
                                    var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less_dollar).toFixed(2));
                                    $('input[name="hdn_promo_less_economy"]').val(promo_less_dollar);
                                    $('#promo_amount_economy').text(promo_amount);
                                }
                              }
                              $('input[name="hdn_total_economy"]').val(prem_economy);
                              var economy_piso = prem_economy*$('input[name="hdn_dollar_rate"]').val();
                              $('#dollar-economy-premium').html("$"+prem_economy.toFixed(2));
                              $('#piso-economy-premium').html("&#8369;"+ReplaceNumberWithCommas(economy_piso.toFixed(2)));
                              $('.piso-economy-premium').html("&#8369;"+ReplaceNumberWithCommas(economy_piso.toFixed(2)));
                              $('.dollar-economy-premium').html("$"+prem_economy.toFixed(2));

                            }
                          }
                          if(value[0] == 'esteem_individual'){
                            if(value[7] == "Y"){
                              $('#div-package-esteem').hide();
                              $('#div-more-package-esteem').hide();
                            }else{
                              $('#div-package-esteem').show();
                              var prem_esteem = value[1];
                              var lgt_esteem = (parseFloat(prem_esteem) *0.2)/100;
                              var dst_esteem = 4.00;
                              var premtax_esteem = (prem_esteem *2)/100;
                              $('input[name="hdn_original_premium_esteem"]').val(prem_esteem.toFixed(2));
                              $('input[name="hdn_dst_esteem"]').val(dst_esteem.toFixed(2));
                              $('input[name="hdn_premtax_esteem"]').val(premtax_esteem.toFixed(2));
                              $('input[name="hdn_lgt_esteem"]').val(lgt_esteem.toFixed(2));
                              prem_esteem = parseFloat(prem_esteem) + premtax_esteem + dst_esteem + lgt_esteem;
                              $('input[name="hdn_due_premium_esteem"]').val(prem_esteem.toFixed(2));

                              $('input[name="hdn_prem_travel_esteem"]').val(value[6]);
                              $('input[name="hdn_prem_liability_esteem"]').val(value[2]);
                              $('input[name="hdn_prem_burial_esteem"]').val(value[3]);
                              $('input[name="hdn_prem_add_esteem"]').val(value[4]);
                              $('input[name="hdn_covid_esteem"]').val(value[5]);

                              $('input[name="hdn_promo_less_esteem"]').empty();
                              
                              if($('#promo').val()){        
                                $('#promo-div-esteem').css("display","");
                                $('.promo_code').text($('#promo').val());
                                if($('input[name="hdn_promo_type"]').val() == "P"){
                                    var promo_less = (prem_esteem*$('input[name="hdn_promo_amount"]').val())/100;
                                    var promo_less_piso = promo_less*$('input[name="hdn_dollar_rate"]').val();
                                    prem_esteem = prem_esteem - promo_less;
                                    var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less_piso).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2));
                                    $('#promo_amount_esteem').text(promo_amount);
                                    $('input[name="hdn_promo_less_elite"]').val(promo_less);
                                
                                }else{
                                    var promo_less = $('input[name="hdn_promo_amount"]').val();
                                    var promo_less_dollar = promo_less / ($('input[name="hdn_dollar_rate"]').val());
                                    prem_esteem = prem_esteem - promo_less_dollar;
                                    var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less_dollar).toFixed(2));
                                    $('#promo_amount_esteem').text(promo_amount);
                                }
                              }
                              $('input[name="hdn_total_esteem"]').val(prem_esteem.toFixed(2));
                              var esteem_piso = prem_esteem*$('input[name="hdn_dollar_rate"]').val();
                              $('#dollar-esteem-premium').html("$"+prem_esteem.toFixed(2));
                              $('#piso-esteem-premium').html("&#8369;"+ReplaceNumberWithCommas(esteem_piso.toFixed(2)));
                              $('.piso-esteem-premium').html("&#8369;"+ReplaceNumberWithCommas(esteem_piso.toFixed(2)));
                              $('.dollar-esteem-premium').html("$"+prem_esteem.toFixed(2));
                            }
                          }
                          if(value[0] == 'executive_individual'){
                            var prem_executive = value[1];
                            var lgt_executive = (parseFloat(prem_executive) *0.2)/100;
                            var dst_executive = 4.00;
                            var premtax_executive = (prem_executive *2)/100;
                            $('input[name="hdn_original_premium_executive"]').val(prem_executive.toFixed(2));
                            $('input[name="hdn_dst_executive"]').val(dst_executive.toFixed(2));
                            $('input[name="hdn_premtax_executive"]').val(premtax_executive.toFixed(2));
                            $('input[name="hdn_lgt_executive"]').val(lgt_executive.toFixed(2));
                            prem_executive = parseFloat(prem_executive) + premtax_executive + dst_executive + lgt_executive;
                            $('input[name="hdn_due_premium_executive"]').val(prem_executive.toFixed(2));
                           
                            $('input[name="hdn_prem_travel_executive"]').val(value[6]);
                            $('input[name="hdn_prem_liability_executive"]').val(value[2]);
                            $('input[name="hdn_prem_burial_executive"]').val(value[3]);
                            $('input[name="hdn_prem_add_executive"]').val(value[4]);
                            $('input[name="hdn_covid_executive"]').val(value[5]);

                            if($('#promo').val()){
                              $('#promo-div-executive').css("display","");
                              $('.promo_code').text($('#promo').val());
                              if($('input[name="hdn_promo_type"]').val() == "P"){
                                  var promo_less = (prem_executive*$('input[name="hdn_promo_amount"]').val())/100;
                                  var promo_less_piso = promo_less*$('input[name="hdn_dollar_rate"]').val();
                                  prem_executive = prem_executive - promo_less;
                                  $('input[name="hdn_promo_less_executive"]').val(promo_less);
                                  var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less_piso).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2));
                                  $('#promo_amount_executive').text(promo_amount);
                              
                              }else{
                                  var promo_less = $('input[name="hdn_promo_amount"]').val();
                                  var promo_less_dollar = promo_less / ($('input[name="hdn_dollar_rate"]').val());
                                  prem_executive = prem_executive - promo_less_dollar;
                                  $('input[name="hdn_promo_less_executive"]').val(promo_less_dollar);
                                  var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less_dollar).toFixed(2));
                                  $('#promo_amount_executive').text(promo_amount);
                              }
                            }
                            $('input[name="hdn_total_executive"]').val(prem_executive);
                            var execute_piso = prem_executive*$('input[name="hdn_dollar_rate"]').val();
                            $('#dollar-executive-premium').html("$"+prem_executive.toFixed(2));
                            $('#piso-executive-premium').html("&#8369;"+ReplaceNumberWithCommas(execute_piso.toFixed(2)));
                            $('.piso-executive-premium').html("&#8369;"+ReplaceNumberWithCommas(execute_piso.toFixed(2)));
                            $('.dollar-executive-premium').html("$"+prem_executive.toFixed(2));
                          }
                          if(value[0] == 'elite_individual'){
                            var prem_elite = value[1];
                            var lgt_elite = (parseFloat(prem_elite) *0.2)/100;
                            var dst_elite = 4.00;
                            var premtax_elite = (prem_elite *2)/100;
                            $('input[name="hdn_original_premium_elite"]').val(prem_elite.toFixed(2));
                            $('input[name="hdn_dst_elite"]').val(dst_elite.toFixed(2));
                            $('input[name="hdn_premtax_elite"]').val(premtax_elite.toFixed(2));
                            $('input[name="hdn_lgt_elite"]').val(lgt_elite.toFixed(2));
                            prem_elite = parseFloat(prem_elite) + premtax_elite + dst_elite + lgt_elite;
                            $('input[name="hdn_due_premium_elite"]').val(prem_elite.toFixed(2));
                            $('input[name="hdn_prem_travel_elite"]').val(value[6]);
                            $('input[name="hdn_prem_liability_elite"]').val(value[2]);
                            $('input[name="hdn_prem_burial_elite"]').val(value[3]);
                            $('input[name="hdn_prem_add_elite"]').val(value[4]);
                            $('input[name="hdn_covid_elite"]').val(value[5]);
                              
                            $('input[name="hdn_promo_less_elite"]').empty();
                            if($('#promo').val()){
                              $('#promo-div-elite').css("display","");
                              $('.promo_code').text($('#promo').val());
                              if($('input[name="hdn_promo_type"]').val() == "P"){
                                  var promo_less = (prem_elite*$('input[name="hdn_promo_amount"]').val())/100;
                                  var promo_less_piso = promo_less*$('input[name="hdn_dollar_rate"]').val();
                                  prem_elite = prem_elite - promo_less;
                                  var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less_piso).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2));
                                  $('#promo_amount_elite').text(promo_amount);
                                  $('input[name="hdn_promo_less_elite"]').val(promo_less);
                              }else{
                                  var promo_less = $('input[name="hdn_promo_amount"]').val();
                                  var promo_less_dollar = promo_less / ($('input[name="hdn_dollar_rate"]').val());
                                  prem_elite = prem_elite - promo_less_dollar;
                                  var promo_amount = "- P"+ReplaceNumberWithCommas(parseFloat(promo_less).toFixed(2))+ "/$"+ReplaceNumberWithCommas(parseFloat(promo_less_dollar).toFixed(2));
                                  $('#promo_amount_elite').text(promo_amount);
                                  $('input[name="hdn_promo_less_elite"]').val(promo_less_dollar);
                              }
                            }
                            $('input[name="hdn_total_elite"]').val(prem_elite);
                            var elite_piso = prem_elite*$('input[name="hdn_dollar_rate"]').val();

                            $('#dollar-elite-premium').html("$"+prem_elite.toFixed(2));
                            $('#piso-elite-premium').html("&#8369;"+ReplaceNumberWithCommas(elite_piso.toFixed(2)));
                            $('.piso-elite-premium').html("&#8369;"+ReplaceNumberWithCommas(elite_piso.toFixed(2)));
                            $('.dollar-elite-premium').html("$"+prem_elite.toFixed(2));
                          }
                      });

                      $( ".package-selected-button-get-plan").addClass("btn-arrow-icon");
                      $( ".package-selected-button-get-plan").addClass("form-control");
                      $( ".package-selected-button-get-plan").css("border", "1px solid #008080");;
                      $("#selected-product-details").css("display", "");
                      $(".package-option" ).find( ".card-package").removeClass("package-selected");
                      $(".package-option" ).find( ".package-selected-button-get-plan").removeClass("package-selected-button-get-plan-selected");
                      $(".package-option" ).find( ".package-selected-button-get-plan").html("Get Plan");
                      $(".svg_check_package").css("display", "none");
                      $("#div-choose-package-mobile").css("display", "none");
                      $("#selected-product-details").css("display", "none");
                      $('#package_continue').prop('disabled', true);

                      $('#apply_plan_next').prop('disabled', false);
                      $("#selected-product-more-details").css("display", "none");
                      $(".svg_check_more_package").css("display", "none");
                      $(".more-package-option").find( ".pt__item").removeClass("package-selected");
                      $(".more-package-option" ).find( ".more-package-select").removeClass("package-selected-button-get-plan-selected");
                      $(".more-package-option" ).find( ".more-package-select").html("Select");
                      $(".more-package-option" ).find( ".more-package-select").addClass("btn-arrow-icon");
                      $('input[name="hdn_package"]').val("");
                    }else{
                      
                    }
                }
              });
          widget.show();
          widget.not(':eq('+(1)+')').hide();
          setProgress(1);
          hideButtons(1);
          $('html, body').animate({
              scrollTop: 100
          }, 100);
      });

      //1st page (package view buttons)
      $("#package_back").click(function(e){
          widget.show();
          widget.not(':eq('+(0)+')').hide();
          setProgress(0);
          hideButtons(0);
          $('html, body').animate({
              scrollTop: 100
          }, 100);
      });
      $("#cruise-details").click(function(){
        $("#cruise-modal-details").show();
      });

      $("#covid-details").click(function(){
        $("#covid-modal-details").show();
      });
      
      $("#covid-button").click(function(){
        $("#covid-modal-details").hide();
      });
      $(document).on('click', '.text-set-as-default', function() {
            $(".default-emer-svg").hide();
            $(this).parent().parent().parent().parent().find(".default-emer-svg").show();
            const relationshipValue = $(this).closest('.beneficiary-header').parent().find('#beneficiary-relationship'+ $(this).data("id") ).val();
            var emername =  $(this).parent().parent().parent().parent().find(".beneficiary-fullname").val();
            var emermobile =  $(this).parent().parent().parent().parent().find(".beneficiary-mobile").val();
            if(emername && emermobile && relationshipValue && emermobile.length == 15 && emermobile.charAt(2) == 9 && emermobile.charAt(1) == 0){
              $("#emergency-svg").css("display", "");
              $("#emergency-svg-error").css("display", "none");
            }else{
              $("#emergency-svg").css("display", "none");
              $("#emergency-svg-error").css("display", "");
            }

            $("#emergency-fullname").val(emername);
            $("#emergency-mobile").val(emermobile);
            $("#emergency-relationship").val(relationshipValue);
            $('#emergency-relationship').selectpicker("refresh");

            if(emername != ""){
              $("#emergency-fullname").removeClass("invalid").addClass("valid");
            }else{
              $("#emergency-fullname").removeClass("valid").addClass("invalid");
            }
    
            if(emermobile == "" || 
              emermobile.length < 15 || 
              emermobile.charAt(2) != 9 ||  
              emermobile.charAt(1) != 0){
              $("#emergency-mobile").removeClass("valid").addClass("invalid");
            }else{
              ("#emergency-mobile").removeClass("invalid").addClass("valid"); 
            }

            if(relationshipValue){
              $("#emergency-relationship").closest('.btn-group').find('button').removeClass('invalid-select');
              $("#emergency-relationship").closest('.btn-group').removeClass('invalid-select');
              $("#emergency-relationship").removeClass("invalid").addClass("valid"); 
              $("#emergency-relationship").find('option').css('color', '#212529');
            }else{
              $("#emergency-relationship").closest('.btn-group').find('button').addClass('invalid-select');
              $("#emergency-relationship").closest('.btn-group').addClass('invalid-select');
            }

      });

      $("#cruise-button").click(function(){
        $("#cruise-modal-details").hide();
      });
      $(".view-all-coverage").click(function(e){
        $("#selected-product-more-details").css("display", "none");
        $('#apply_plan_next').prop('disabled', true);
        if($('input[name="hdn_package"]').val()){
          $("#selected-product-more-details").css("display", "");
          $('#apply_plan_next').prop('disabled', false);
        }

                event.stopPropagation(); 
                widget.show();
                widget.not(':eq('+(2)+')').hide();
                setProgress(2);
                hideButtons(2);
                $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });
      $("#modal-popup-first-page-no-covid").click(function(e){

          $('#apply_plan_next').prop('disabled', false);
          $("#selected-product-more-details").css("display", "none");
          $(".svg_check_more_package").css("display", "none");
          $(".more-package-option").find( ".pt__item").removeClass("package-selected");
          $(".more-package-option" ).find( ".more-package-select").removeClass("package-selected-button-get-plan-selected");
          $(".more-package-option" ).find( ".more-package-select").html("Select");
          $(".more-package-option" ).find( ".more-package-select").addClass("btn-arrow-icon");


          $('input[name="hdn_covid"]').val("");
          $('input[name="hdn_covid_tag"]').val("No");
          $("#covid-div-no").css("background-color","#e4509a");
          $(".no_543_19029").css("color","#fff");
          $("#covid-div-yes").css("background-color","#fff");
          $(".yes_543_19031").css("color","#edcadc");
          $("#covid-div- no").css("border-color","#edcadc");
          $("#covid-div-yes").removeClass("option-tab-a-hover");
          $("#covid-div-no").addClass("option-tab-a-hover");

          $("#covid_no_check_svg").show();
          $("#covid_yes_check_svg").hide();
         $("#modal-covid-include-confirm-modal").hide();
      });

      $("#modal-popup-first-page-apply-change-cancel").click(function(e){
          $('#apply_plan_next').prop('disabled', false);
          $("#selected-product-more-details").css("display", "none");
          $(".svg_check_more_package").css("display", "none");
          $(".more-package-option").find( ".pt__item").removeClass("package-selected");
          $(".more-package-option" ).find( ".more-package-select").removeClass("package-selected-button-get-plan-selected");
          $(".more-package-option" ).find( ".more-package-select").html("Select");
          $(".more-package-option" ).find( ".more-package-select").addClass("btn-arrow-icon");

          $('input[name="hdn_covid"]').val("");
          $('input[name="hdn_covid_tag"]').val("");
          
          $("#covid-div-yes").addClass("option-tab-a-hover");
          $("#covid-div-no").addClass("option-tab-a-hover");
          $("#covid-div-no").removeClass("option-tab-a-selected-hover");
          $("#covid-div-yes").removeClass("option-tab-a-selected-hover");
          $(".no_543_19029").css("color","rgb(228, 80, 154)");
          $(".yes_543_19031").css("color","rgb(228, 80, 154)");
          $("#covid-div-no").css("border-color","rgb(228, 80, 154)");
          $("#covid-div-yes").css("border-color","rgb(228, 80, 154)");
          $("#covid-div-yes").css("background-color","#fff");

          $("#covid_no_check_svg").hide();
          $("#covid_yes_check_svg").hide();
          $("#modal-covid-include-confirm-modal").hide();
        });
      $("#modal-popup-first-page-apply-change").click(function(e){
          $("#modal-covid-include-confirm-modal").hide();
          if($('input[name="hdn_covid_tag"]').val() == "Yes"){
            $("#part1-covid-svg-error").css("display", "none");
            $("#part1-covid-svg").css("display", "");
            $("#confirmation-covid-div").css("display", "");
            $('.covid-plan').text($('input[name="hdn_covid"]').val());
          }
      });
      // $("#covid-div-yes").click(function(e){
      //     $("#modal-covid-include-confirm-modal").show();
      // });
      $("#package_continue").click(function(e){

        if($('input[name="hdn_package"]').val() == ""){
          return false;
        }
        // $("#modal-covid-include-confirm-modal").show();
                $("#modal-covid-include-confirm-modal").hide();
                  var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                    <div class="frame-108567">\
                      <div class="trip-details">Trip Details</div>\
                      <div class="completed">Completed</div>\
                    </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(completed);

                  var inprogress = ' <div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});    
                widget.show();
                widget.not(':eq('+(3)+')').hide();
                setProgress(3);
                hideButtons(3);
                $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });
      
      //1st page (more package view buttons)
      $("#apply_plan_next").click(function(e){
                  var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                    <div class="frame-108567">\
                      <div class="trip-details">Trip Details</div>\
                      <div class="completed">Completed</div>\
                    </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(completed);

                  var inprogress = ' <div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});

                widget.show();
                widget.not(':eq('+(3)+')').hide();
                setProgress(3);
                hideButtons(3);
                $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });
      $("#more_package_back").click(function(e){
          widget.show();
          widget.not(':eq('+(1)+')').hide();
          setProgress(1);
          hideButtons(1);
          $('html, body').animate({
              scrollTop: 100
          }, 100);
      });

      //2nd page buttons
      $("#quotation_next").click(function(e){
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_quotation').empty();
                    $('#progress_quotation').append(completed);

                    var inprogress = ' <div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);                  
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
                widget.show();
                widget.not(':eq('+(4)+')').hide();
                setProgress(4);
                hideButtons(4);
                $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });
      $("#quotation_back").click(function(){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_1">1</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Trip Details</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(inprogress);

                  var pending = '<div class="frame-108564">\
                      <div class="_2">2</div>\
                    </div>\
                    <div class="frame-108569">\
                      <div class="quotation">Quotation</div>\
                      <div class="pending">Pending</div>\
                    </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(pending);
                  $('.line-5').css({ 'border-color': '#eff2f4'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
              
                widget.show();
                widget.not(':eq('+(1)+')').hide();
                setProgress(1);
                hideButtons(1);
                $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });
      


      
      $(".exclusion-and-limitation").click(function(){
        $("#exlimitaions").show();
      });
      $(".privacy-policy").click(function(){
        $("#privacyPolicy").show();
      });
      $("#limitation-button").click(function(){
        $("#exlimitaions").hide();
      });
      $("#privacy-button").click(function(){
        $("#privacyPolicy").hide();
      });
      $(".terms-and-contidition").click(function(){
        $("#terms-and-condition").show();
      });
      $("#terms-button").click(function(){
        $("#terms-and-condition").hide();
      });
       //3rd page buttons

      $("#personal_info_next").click(function(e){
          var errorPage3_Section1 = 0;
          //section 1 validation
          if($("#gender").val()){
            $("#gender").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#gender").closest('.btn-group').removeClass('invalid-select');
            $("#gender").removeClass("invalid").addClass("valid"); 
            $("#gender").find('option').css('color', '#212529');}
          else{
            $("#gender").closest('.btn-group').find('button').addClass('invalid-select');
            $("#gender").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section1 = 1;
          }

          
          if($("#date-of-birth").val()){$("#date-of-birth").removeClass("invalid").addClass("valid"); $("#date-of-birth").find('option').css('color', '#212529');}
          else{$("#date-of-birth").removeClass("valid").addClass("invalid");errorPage3_Section1 = 1;}
          
          if($("#place-of-birth").val()){$("#place-of-birth").removeClass("invalid").addClass("valid");  $("#place-of-birth").find('option').css('color', '#212529');}
          else{$("#place-of-birth").removeClass("valid").addClass("invalid");errorPage3_Section1 = 1;}
         
          // if($("#country-additional-info").val()){
          //   $("#country-additional-info").closest('.btn-group').find('button').removeClass('invalid-select');
          //   $("#country-additional-info").closest('.btn-group').removeClass('invalid-select');
          //   $("#country-additional-info").removeClass("invalid").addClass("valid"); 
          //   $("#country-additional-info").find('option').css('color', '#212529');}
          // else{
          //   $("#country-additional-info").closest('.btn-group').find('button').addClass('invalid-select');
          //   $("#country-additional-info").closest('.btn-group').addClass('invalid-select');
          //   errorPage3_Section1 = 1;
          // }

          if(errorPage3_Section1 > 0){
            $("#additional-info-svg-error").css("display", "");
          }else{
            $("#additional-info-svg").css("display", "");
          } 

          if(errorPage3_Section1 > 0){
            $('html, body').animate({
              scrollTop: 100
            }, 1000);
          }
          //end section 1 validation
          //section 2 validation
          var errorPage3_Section2 = 0;
          if($("#address-house-unit").val()){$("#address-house-unit").removeClass("invalid").addClass("valid");$("#address-house-unit").find('option').css('color', '#212529');}
          else{$("#address-house-unit").removeClass("valid").addClass("invalid");errorPage3_Section2 = 1;}
          
          if($("#street").val()){$("#street").removeClass("invalid").addClass("valid");  $("#street").find('option').css('color', '#212529');}
          else{$("#street").removeClass("valid").addClass("invalid");errorPage3_Section2 = 1;}
         
          if($("#barangay").val()){
            $("#barangay").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#barangay").closest('.btn-group').removeClass('invalid-select');
            $("#barangay").removeClass("invalid").addClass("valid"); 
            $("#barangay").find('option').css('color', '#212529');}
          else{
            $("#barangay").closest('.btn-group').find('button').addClass('invalid-select');
            $("#barangay").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }

          if($("#city").val()){
            $("#city").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#city").closest('.btn-group').removeClass('invalid-select');
            $("#city").removeClass("invalid").addClass("valid"); 
            $("#city").find('option').css('color', '#212529');}
          else{
            $("#city").closest('.btn-group').find('button').addClass('invalid-select');
            $("#city").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }

          if($("#province").val()){
            $("#province").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#province").closest('.btn-group').removeClass('invalid-select');
            $("#province").removeClass("invalid").addClass("valid"); 
            $("#province").find('option').css('color', '#212529');}
          else{
            $("#province").closest('.btn-group').find('button').addClass('invalid-select');
            $("#province").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }

          if($("#region").val()){
            $("#region").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#region").closest('.btn-group').removeClass('invalid-select');
            $("#region").removeClass("invalid").addClass("valid"); 
            $("#region").find('option').css('color', '#212529');}
          else{
            $("#region").closest('.btn-group').find('button').addClass('invalid-select');
            $("#region").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }
          if($("#zip").val()){$("#zip").removeClass("invalid").addClass("valid");  $("#zip").find('option').css('color', '#212529');}
          else{$("#zip").removeClass("valid").addClass("invalid");errorPage3_Section2 = 1;}
          
          if(errorPage3_Section2 > 0){
            $("#present_address_svg_error").css("display", "");
          }else{
            $("#present_address_svg").css("display", "");
          }

          if((errorPage3_Section1 == 0)  &&  (errorPage3_Section2 > 0)){
            $('html, body').animate({
              scrollTop: 875
            }, 1000);
          }
          //end section 2 validation

          //section 2 ID validation
          var errorPage3_id = 0;
          
          if($("#id_type").val()){
            $("#id_type").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#id_type").closest('.btn-group').removeClass('invalid-select');
            $("#id_type").removeClass("invalid").addClass("valid"); 
            $("#id_type").find('option').css('color', '#212529');
          }else{
            $("#id_type").closest('.btn-group').find('button').addClass('invalid-select');
            $("#id_type").closest('.btn-group').addClass('invalid-select');
            errorPage3_id = 1;
          }
          if($('#file-upload-id').get(0).files.length== 0){
            errorPage3_id = 1;
          }else{
            if($('#file-upload-id').get(0).files[0].size > 5000000){
              errorPage3_id = 1;
            }
          }

          if($("#id_no").val()){$("#id_no").removeClass("invalid").addClass("valid"); $("#id_no").find('option').css('color', '#212529');}
          else{$("#id_no").removeClass("valid").addClass("invalid");errorPage3_id = 1;}
         
          if($("#file-upload-id").val()){$("#file-upload-id").removeClass("invalid").addClass("valid"); $("#file-upload-id").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#file-upload-id").find('option').css('color', '#212529');}
          else{$("#file-upload-id").removeClass("valid").addClass("invalid");$("#file-upload-id").parent().find( "p").removeClass("valid-text").addClass("invalid-text");errorPage3_id = 1;}
       
          if(errorPage3_id > 0){
            $("#identification_svg_error").css("display", "");
          }else{
            $("#identification_svg").css("display", "");
          }

          if((errorPage3_Section1 == 0)  &&  (errorPage3_Section2 == 0) &&  (errorPage3_id > 0)){
            $('html, body').animate({
              scrollTop: 1075
            }, 1000);
          }
          //end section 2 ID validation

          //section 3 validation
            //benefeciary
            var errorPage3_Section3 = 0;
            var errorPage3_bene = 0;

            $('input[name^="beneficiary-mobile"]').each(function(){
              var id = $(this).attr("id");
              if($(this).val() == "" || $(this).val().length < 15 || $(this).val().charAt(2) != 9 ||  $(this).val().charAt(1) != 0){
                $(this).removeClass("valid").addClass("invalid");
                errorPage3_Section3 = 1;errorPage3_bene = 1;
              }else{
                $(this).removeClass("invalid").addClass("valid"); 
              }
            });

            $('input[name^="beneficiary-fullname"]').each(function(){
              var id = $(this).attr("id");
              if($(this).val() == ""){
                $(this).removeClass("valid").addClass("invalid");
                errorPage3_Section3 = 1;errorPage3_bene = 1;
              }else{
                $(this).removeClass("invalid").addClass("valid"); 
              }
            });

            $('select[name^="beneficiary-relationship"]').each(function(){
              var id = $(this).attr("id");
              $(this).closest('.btn-group').find('button').removeClass('invalid-select');
              $(this).closest('.btn-group').removeClass('invalid-select');
              $('#'+ id ).removeClass("invalid");
                if($('#'+ id).val() == ""){
                  $(this).closest('.btn-group').find('button').addClass('invalid-select');
                  $(this).closest('.btn-group').addClass('invalid-select');
                  $('#'+ id ).addClass('invalid-select');
                  errorPage3_Section3 = 1;
                  errorPage3_bene = 1;
                }
            });



            if(errorPage3_bene > 0){
              $("#beneficiary-svg-error").css("display", "");
            }else{
              $("#beneficiary-svg").css("display", "initial");
            }

            
            //end of benefeciary
            //emergency
            var errorPage3_emergency = 0;
            if($("#emergency-relationship").val()){
            $("#emergency-relationship").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#emergency-relationship").closest('.btn-group').removeClass('invalid-select');
            $("#emergency-relationship").removeClass("invalid").addClass("valid"); 
            $("#emergency-relationship").find('option').css('color', '#212529');}
          else{
            $("#emergency-relationship").closest('.btn-group').find('button').addClass('invalid-select');
            $("#emergency-relationship").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section3 = 1;
            errorPage3_emergency = 1;
          }
            if($("#emergency-fullname").val()){
              $("#emergency-fullname").removeClass("invalid").addClass("valid"); 
            }else{
              $("#emergency-fullname").removeClass("valid").addClass("invalid");
              errorPage3_Section3 = 1;
              errorPage3_emergency = 1;
            }
            if($("#emergency-mobile").val()){
              $("#emergency-mobile").removeClass("invalid").addClass("valid"); 
            }else{
              $("#emergency-mobile").removeClass("valid").addClass("invalid");
              errorPage3_emergency = 1;
              errorPage3_Section3 = 1;
            }
       
            if(errorPage3_emergency > 0){
              $("#emergency-svg-error").css("display", "");
            }else{
              $("#emergency-svg").css("display", "");
            }

            if((errorPage3_Section1 == 0)  && (errorPage3_Section2 == 0)  && (errorPage3_id == 0)  &&  (errorPage3_Section3 > 0)){
              $('html, body').animate({
                scrollTop: 1575
              }, 1000);
            }

          //end section 3 validation

           //section 5 validation

           var errorPage3_Section5 = 0;

            if($('input[name="hdn_pwd_tag"]').val() == ""){
              errorPage3_Section5 = 1;
            }
            if($('input[name="hdn_pwd_tag"]').val() == "Yes"){
              if($("#pwd-file-upload-id").val()){$("#pwd-file-upload-id").removeClass("invalid").addClass("valid"); $("#pwd-file-upload-id").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#pwd-file-upload-id").find('option').css('color', '#212529');}
              else{$("#pwd-file-upload-id").removeClass("valid").addClass("invalid");$("#pwd-file-upload-id").parent().find( "p").removeClass("valid-text").addClass("invalid-text");errorPage3_Section4 = 1;}

              // if($("#id_no_pwd").val()){$("#id_no_pwd").removeClass("invalid").addClass("valid"); $("#id_no_pwd").find('option').css('color', '#212529');}
              // else{$("#id_no_pwd").removeClass("valid").addClass("invalid");errorPage3_Section5 = 1;}

              //   if($("#id_type_pwd").val()){
              //     $("#id_type_pwd").closest('.btn-group').find('button').removeClass('invalid-select');
              //     $("#id_type_pwd").closest('.btn-group').removeClass('invalid-select');
              //     $("#id_type_pwd").removeClass("invalid").addClass("valid"); 
              //     $("#id_type_pwd").find('option').css('color', '#212529');}
              //   else{
              //     $("#id_type_pwd").closest('.btn-group').find('button').addClass('invalid-select');
              //     $("#id_type_pwd").closest('.btn-group').addClass('invalid-select');
              //     errorPage3_Section5 = 1;
              //   }
            }

            if(errorPage3_Section5 > 0){
            $("#pwd-svg-error").css("display", "");
            $("#pwd-svg").css("display", "none");
            }else{
              $("#pwd-svg-error").css("display", "none");
            }

            if((errorPage3_Section1 == 0)  && (errorPage3_Section2 == 0)  && (errorPage3_id == 0)  &&  (errorPage3_Section3 == 0) &&  (errorPage3_Section5 > 0)){
            $('html, body').animate({
              scrollTop: 2175
            }, 1000);
          }
            //end section 5 validation


          // section 4 validation
          var errorPage3_Section4 = 0;
          var errorPage3_Section4a = 0;
          if($('input[name="hdn_agent_tag"]').val() == ""){
            errorPage3_Section4 = 1;
          }
          if($('input[name="hdn_agent_tag"]').val() == "Yes"){
            if($("#agent-name").val()){$("#agent-name").removeClass("invalid").addClass("valid"); $("#agent-name").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#agent-name").find('option').css('color', '#212529');}
            else{$("#agent-name").removeClass("valid").addClass("invalid");$("#agent-name").parent().find( "p").removeClass("valid-text").addClass("invalid-text");errorPage3_Section4 = 1;}
          }
          // if($('input[name="hdn_rtpcr_tag"]').val() == ""){
          //   errorPage3_Section4a = 1;
          // }
          if(errorPage3_Section4 > 0){
            $("#agent-svg-error").css("display", "");
            $("#agent-svg").css("display", "none");
          }else{
            $("#agent-svg-error").css("display", "none");
          }

          // if(errorPage3_Section4a > 0){
          //   $("#rt-pcr-svg-error").css("display", "");
          //   $("#rt-pcr-svg").css("display", "none");
          // }else{
          //   $("#rt-pcr-svg-error").css("display", "none");
          // }
          if((errorPage3_Section1 == 0)  && (errorPage3_Section2 == 0)  && (errorPage3_id == 0)  &&  (errorPage3_Section3 == 0) &&  (errorPage3_Section5 == 0) && (errorPage3_Section4 > 0)){
            $('html, body').animate({
              scrollTop: 2275
            }, 1000);
          }
          if((errorPage3_Section1 == 0)  && (errorPage3_Section2 == 0)  && (errorPage3_id == 0)  &&  (errorPage3_Section3 == 0) &&  (errorPage3_Section5 == 0) && (errorPage3_Section4 == 0) && (errorPage3_Section4a > 0)){
            $('html, body').animate({
              scrollTop: 2275
            }, 1000);
          }
          // end section 4 validation

         

          
          
          if((errorPage3_Section1 > 0)  || (errorPage3_Section2 > 0)  || (errorPage3_id > 0)  || (errorPage3_Section3 > 0)  ||  (errorPage3_Section4 > 0)  ||  (errorPage3_Section4a > 0)  ||  (errorPage3_Section5 > 0)){
            return false;
          }
          //end section 4 validation
          const monthNamesFull = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dathbdaysummary = new Date($('#date-of-birth').val());
        var dahbdaysummary = dathbdaysummary.getDate();
        var monthbdaysummary = dathbdaysummary.getMonth() + 1;
        var yeahbdaysummary = dathbdaysummary.getFullYear();
        if (dahbdaysummary < 10) {
            dahbdaysummary = "0" + dahbdaysummary;
        }
        var fullbdate =  monthNamesFull[dathbdaysummary.getMonth()] + " " + dahbdaysummary + ", " + yeahbdaysummary; 
                    $('.summary-telephone').text("-");
                    $('.summary-birthday').text(fullbdate);
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_personal').empty();
                    $('#progress_personal').append(completed);

                    var inprogress = '<div class="frame-108563">\
                      <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Payment</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#09a12a'});

                  widget.show();
                  widget.not(':eq('+(5)+')').hide();
                  setProgress(5);
                  hideButtons(5);
                  $('html, body').animate({
                    scrollTop: 100
                }, 100);
          
      });



      $("#personal_info_next1").click(function(e){
          var errorPage3_Section1 = 0;
          var errorPage3_Section2 = 0;
          var errorPage3_Section3 = 0;
          var errorPage3_Section4 = 0;
          var errorPage3_emergency = 0;
          var errorPage3_bene = 0;
          var errorPage3_id = 0;

          

          //section 2 validation
          if($("#address-house-unit").val()){$("#address-house-unit").removeClass("invalid").addClass("valid");$("#address-house-unit").find('option').css('color', '#212529');}
          else{$("#address-house-unit").removeClass("valid").addClass("invalid");errorPage3_Section2 = 1;}
          
          if($("#street").val()){$("#street").removeClass("invalid").addClass("valid");  $("#street").find('option').css('color', '#212529');}
          else{$("#street").removeClass("valid").addClass("invalid");errorPage3_Section2 = 1;}
         
          if($("#barangay").val()){
            $("#barangay").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#barangay").closest('.btn-group').removeClass('invalid-select');
            $("#barangay").removeClass("invalid").addClass("valid"); 
            $("#barangay").find('option').css('color', '#212529');}
          else{
            $("#barangay").closest('.btn-group').find('button').addClass('invalid-select');
            $("#barangay").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }

          if($("#city").val()){
            $("#city").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#city").closest('.btn-group').removeClass('invalid-select');
            $("#city").removeClass("invalid").addClass("valid"); 
            $("#city").find('option').css('color', '#212529');}
          else{
            $("#city").closest('.btn-group').find('button').addClass('invalid-select');
            $("#city").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }

          if($("#province").val()){
            $("#province").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#province").closest('.btn-group').removeClass('invalid-select');
            $("#province").removeClass("invalid").addClass("valid"); 
            $("#province").find('option').css('color', '#212529');}
          else{
            $("#province").closest('.btn-group').find('button').addClass('invalid-select');
            $("#province").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }

          if($("#region").val()){
            $("#region").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#region").closest('.btn-group').removeClass('invalid-select');
            $("#region").removeClass("invalid").addClass("valid"); 
            $("#region").find('option').css('color', '#212529');}
          else{
            $("#region").closest('.btn-group').find('button').addClass('invalid-select');
            $("#region").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section2 = 1;
          }
          if($("#zip").val()){$("#zip").removeClass("invalid").addClass("valid");  $("#zip").find('option').css('color', '#212529');}
          else{$("#zip").removeClass("valid").addClass("invalid");errorPage3_Section2 = 1;}
       
          //identification
          if($("#id_type").val()){
            $("#id_type").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#id_type").closest('.btn-group').removeClass('invalid-select');
            $("#id_type").removeClass("invalid").addClass("valid"); 
            $("#id_type").find('option').css('color', '#212529');}
          else{
            $("#id_type").closest('.btn-group').find('button').addClass('invalid-select');
            $("#id_type").closest('.btn-group').addClass('invalid-select');
            errorPage3_id = 1;
          }
          if($('#file-upload-id').get(0).files.length== 0){
            errorPage3_id = 1;
          }else{
            if($('#file-upload-id').get(0).files[0].size > 5000000){
              errorPage3_id = 1;
            }
          }

          if($("#id_no").val()){$("#id_no").removeClass("invalid").addClass("valid"); $("#id_no").find('option').css('color', '#212529');}
          else{$("#id_no").removeClass("valid").addClass("invalid");errorPage3_id = 1;}
         
          if($("#file-upload-id").val()){$("#file-upload-id").removeClass("invalid").addClass("valid"); $("#file-upload-id").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#file-upload-id").find('option').css('color', '#212529');}
          else{$("#file-upload-id").removeClass("valid").addClass("invalid");$("#file-upload-id").parent().find( "p").removeClass("valid-text").addClass("invalid-text");errorPage3_id = 1;}
         
          // $('select[name^="beneficiary-relationship"]').each(function(){
          //   var id = $(this).attr("id");
          //   $(this).closest('.btn-group').find('button').removeClass('invalid-select');
          //   $(this).closest('.btn-group').removeClass('invalid-select');
          //   $('#'+ id ).removeClass("invalid");
          //     if($('#'+ id).val() == ""){
          //       $(this).closest('.btn-group').find('button').addClass('invalid-select');
          //       $(this).closest('.btn-group').addClass('invalid-select');
          //       $('#'+ id ).addClass('invalid-select');
          //       // errorPage3_Section2 = 1;
          //       errorPage3_bene = 1;
          //     }
          // });

          // $('input[name^="beneficiary-fullname"]').each(function(){
          //     var id = $(this).attr("id");
          //     var ids = '#'+$(this).attr("id");
          //     $('#'+ id ).removeClass("invalid");
          //     if($(ids).val() == ""){
          //       $(ids).removeClass("invalid").addClass("valid"); 
          //       $(ids).find('option').css('color', '#212529');
          //     }else{
          //       $(ids).removeClass("valid").addClass("invalid");
          //       errorPage3_Section3 = 1;
          //       errorPage3_bene = 1;
          //     }
          // });


          // if($("#beneficiary-fullname").val()){$("#beneficiary-fullname").removeClass("invalid").addClass("valid"); $("#beneficiary-fullname").find('option').css('color', '#212529');}
          // else{$("#beneficiary-fullname").removeClass("valid").addClass("invalid");errorPage3_Section3 = 1;errorPage3_bene = 1;}
         
          // if(typeof $("#beneficiary-fullname0").val() != "undefined"){
          //   if($("#beneficiary-fullname0").val()){$("#beneficiary-fullname0").removeClass("invalid").addClass("valid"); $("#beneficiary-fullname0").find('option').css('color', '#212529');}
          //   else{$("#beneficiary-fullname0").removeClass("valid").addClass("invalid");errorPage3_Section3 = 1;errorPage3_bene = 1;}
          // }
          
          // if(typeof $("#beneficiary-fullname1").val() !='undefined'){
          //   if($("#beneficiary-fullname1").val()){$("#beneficiary-fullname1").removeClass("invalid").addClass("valid");  $("#beneficiary-fullname1").find('option').css('color', '#212529');}
          //   else{$("#beneficiary-fullname1").removeClass("valid").addClass("invalid");errorPage3_Section3 = 1;errorPage3_bene = 1;}
          // }

          //  $('input[name^="beneficiary-mobile"]').each(function(){
          //   var id = $(this).attr("id");
          //   if($(this).val() == "" || $(this).val().length < 15 || $(this).val().charAt(2) != 9 ||  $(this).val().charAt(1) != 0){
          //     $(this).removeClass("valid").addClass("invalid");
          //     errorPage3_Section3 = 1;errorPage3_bene = 1;
          //   }else{
          //     $(this).removeClass("invalid").addClass("valid"); 
          //   }
          // });

          // if($("#beneficiary-mobile").val()){
          //   if($("#beneficiary-mobile").val().length < 15){
          //     $("#beneficiary-mobile").removeClass("valid").addClass("invalid");
          //     errorPage3_bene = 1;
          //     errorPage3_Section3 = 1
          //   }else{
          //     if($("#beneficiary-mobile").val().charAt(1) != 0 || $("#beneficiary-mobile").val().charAt(1) != "0"){
          //       $("#beneficiary-mobile").removeClass("valid").addClass("invalid");
          //       errorPage3_bene = 1;
          //       errorPage3_Section3 = 1
          //     }else if($("#beneficiary-mobile").val().charAt(2) != 9 || $("#beneficiary-mobile").val().charAt(2) != "9"){
          //       $("#beneficiary-mobile").removeClass("valid").addClass("invalid");
          //     errorPage3_bene = 1;
          //     errorPage3_Section3 = 1
          //     }else{
          //       $("#beneficiary-mobile").removeClass("invalid").addClass("valid"); 
          //       $("#beneficiary-mobile").find('option').css('color', '#212529');
          //     }
              
          //   }
          // }else{
          //   $("#beneficiary-mobile").removeClass("valid").addClass("invalid");
          //   errorPage3_bene = 1;
          //   errorPage3_Section3 = 1
          // }

          // if(typeof $("#beneficiary-mobile0").val() !='undefined'){
          //   if($("#beneficiary-mobile0").val()){$("#beneficiary-mobile0").removeClass("invalid").addClass("valid");  $("#beneficiary-mobile0").find('option').css('color', '#212529');}
          //   else{$("#beneficiary-mobile0").removeClass("valid").addClass("invalid");errorPage3_Section3 = 1;errorPage3_bene = 1;}
          // }

          // if(typeof $("#beneficiary-mobile1").val() !='undefined'){
          //   if($("#beneficiary-mobile1").val()){$("#beneficiary-mobile1").removeClass("invalid").addClass("valid");  $("#beneficiary-mobile1").find('option').css('color', '#212529');}
          //   else{$("#beneficiary-mobile1").removeClass("valid").addClass("invalid");errorPage3_Section3 = 1;errorPage3_bene = 1;}
          // }

          //emergency
          if($("#emergency-fullname").val()){$("#emergency-fullname").removeClass("invalid").addClass("valid"); $("#emergency-fullname").find('option').css('color', '#212529');}
          else{$("#emergency-fullname").removeClass("valid").addClass("invalid");errorPage3_Section3 = 1;errorPage3_emergency = 1;}
         
          if($("#emergency-relationship").val()){
            $("#emergency-relationship").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#emergency-relationship").closest('.btn-group').removeClass('invalid-select');
            $("#emergency-relationship").removeClass("invalid").addClass("valid"); 
            $("#emergency-relationship").find('option').css('color', '#212529');}
          else{
            $("#emergency-relationship").closest('.btn-group').find('button').addClass('invalid-select');
            $("#emergency-relationship").closest('.btn-group').addClass('invalid-select');
            errorPage3_Section3 = 1
            errorPage3_emergency = 1;
          }

            if($("#emergency-mobile").val() == "" || $("#emergency-mobile").val().length < 15 || $("#emergency-mobile").val().charAt(2) != 9 ||  $("#emergency-mobile").val().charAt(1) != 0){
              $("#emergency-mobile").removeClass("valid").addClass("invalid");
              errorPage3_emergency = 1;
              errorPage3_Section3 = 1
            }else{
              ("#emergency-mobile").removeClass("invalid").addClass("valid"); 
            }


         
          // $('select[name^="destinations"]').each(function(){
          //   var id = $(this).attr("id");
          //   $(this).closest('.btn-group').find('button').removeClass('invalid-select');
          //   $(this).closest('.btn-group').removeClass('invalid-select');
          //   $('#'+ id ).removeClass("invalid").addClass("valid");
          //     if($(this).val() == ""){
          //       $(this).closest('.btn-group').find('button').addClass('invalid-select');
          //       $(this).closest('.btn-group').addClass('invalid-select');
          //       $(this).closest('.btn-group').removeClass('valid');
          //         errorPage3 = 1;
          //     }
          // });

          // if($('input[name="hdn_pwd_tag"]').val() == "Yes"){
          //   if($("#pwd-file-upload-id").val()){$("#pwd-file-upload-id").removeClass("invalid").addClass("valid"); $("#pwd-file-upload-id").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#pwd-file-upload-id").find('option').css('color', '#212529');}
          //   else{$("#pwd-file-upload-id").removeClass("valid").addClass("invalid");$("#pwd-file-upload-id").parent().find( "p").removeClass("valid-text").addClass("invalid-text");errorPage3_Section4 = 1;}
          
          //   if($("#id_no_pwd").val()){$("#id_no_pwd").removeClass("invalid").addClass("valid"); $("#id_no_pwd").find('option').css('color', '#212529');}
          //   else{$("#id_no_pwd").removeClass("valid").addClass("invalid");errorPage3_Section4 = 1;}

          //     if($("#id_type_pwd").val()){
          //       $("#id_type_pwd").closest('.btn-group').find('button').removeClass('invalid-select');
          //       $("#id_type_pwd").closest('.btn-group').removeClass('invalid-select');
          //       $("#id_type_pwd").removeClass("invalid").addClass("valid"); 
          //       $("#id_type_pwd").find('option').css('color', '#212529');}
          //     else{
          //       $("#id_type_pwd").closest('.btn-group').find('button').addClass('invalid-select');
          //       $("#id_type_pwd").closest('.btn-group').addClass('invalid-select');
          //       errorPage3_Section1 = 1;
          //     }
          // }


          $("#additional-info-svg-error").css("display", "none");
          $("#additional-info-svg").css("display", "none");
          $("#present_address_svg_error").css("display", "none");
          $("#present_address_svg").css("display", "none");
          $("#identification_svg_error").css("display", "none");
          $("#identification_svg").css("display", "none");
          $("#emergency-svg").css("display", "none");
          $("#emergency-svg-error").css("display", "none");
          $("#beneficiary-svg-error").css("display", "none");
          $("#beneficiary-svg").css("display", "none");
        
          $("#pwd-svg-error").css("display", "none");
          if(errorPage3_Section1 > 0){
            $("#additional-info-svg-error").css("display", "");
          }else{
            $("#additional-info-svg").css("display", "");
          } 
          if(errorPage3_Section2 > 0){
            $("#present_address_svg_error").css("display", "");
          }else{
            $("#present_address_svg").css("display", "");
          }
          if(errorPage3_id > 0){
            $("#identification_svg_error").css("display", "");
          }else{
            $("#identification_svg").css("display", "");
          }
          if(errorPage3_emergency > 0){
            $("#emergency-svg-error").css("display", "");
          }else{
            $("#emergency-svg").css("display", "");
          }
          if(errorPage3_bene > 0){
            $("#beneficiary-svg-error").css("display", "");
          }else{
            $("#beneficiary-svg").css("display", "initial");
          }

          
          if(errorPage3_Section3 > 0){
            $("#beneficiary-svg-error").css("display", "");
          }
          if(errorPage3_Section4 > 0){
          $("#pwd-svg-error").css("display", "");
          }else{
            $("#pwd-svg-error").css("display", "none");
          }
          
          if(errorPage3_Section1 > 0){
            $('html, body').animate({
              scrollTop: 100
            }, 1000);
          }

          if((errorPage3_Section1 == 0)  &&  (errorPage3_Section2 > 0)){
            $('html, body').animate({
              scrollTop: 875
            }, 1000);
          }
          if((errorPage3_Section1 == 0)  &&  (errorPage3_Section2 == 0) &&  (errorPage3_id > 0)){
            $('html, body').animate({
              scrollTop: 1075
            }, 1000);
          }

          
          // errorPage3_bene
          // errorPage3_emergency

          alert(errorPage3_Section3);

          if((errorPage3_Section1 == 0)  && (errorPage3_Section2 == 0)  && (errorPage3_id == 0)  &&  (errorPage3_Section3 > 0)){
            alert("enter");
            $('html, body').animate({
              scrollTop: 1575
            }, 1000);
          }

          if((errorPage3_Section1 > 0)  || (errorPage3_Section2 > 0)  || (errorPage3_id > 0)  || (errorPage3_Section3 > 0)  ||  (errorPage3_Section4 > 0)){
            return false;
          }
          
        const monthNamesFull = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dathbdaysummary = new Date($('#date-of-birth').val());
        var dahbdaysummary = dathbdaysummary.getDate();
        var monthbdaysummary = dathbdaysummary.getMonth() + 1;
        var yeahbdaysummary = dathbdaysummary.getFullYear();
        if (dahbdaysummary < 10) {
            dahbdaysummary = "0" + dahbdaysummary;
        }
        var fullbdate =  monthNamesFull[dathbdaysummary.getMonth()] + " " + dahbdaysummary + ", " + yeahbdaysummary; 
                    $('.summary-telephone').text("-");
                    $('.summary-birthday').text(fullbdate);
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_personal').empty();
                    $('#progress_personal').append(completed);

                    var inprogress = '<div class="frame-108563">\
                      <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Payment</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#09a12a'});

                  widget.show();
                  widget.not(':eq('+(5)+')').hide();
                  setProgress(5);
                  hideButtons(5);
                  $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });

      $("#personal_info_back").click(function(){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);

                  var pending = '<div class="frame-108565">\
                        <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108571">\
                        <div class="personal-data">Personal Data</div>\
                        <div class="pending">Pending</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(pending);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
                  widget.show();
                  widget.not(':eq('+(3)+')').hide();
                  setProgress(3);
                  hideButtons(3);
                  $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });

      //4th page buttons
      $("#payb_back").click(function(){
                    var inprogress = '<div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);

                  var pending = '<div class="frame-108566">\
                        <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108573">\
                        <div class="payment">Payment</div>\
                        <div class="pending">Pending</div>\
                      </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(pending);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});

                  widget.show();
                  widget.not(':eq('+(4)+')').hide();
                  setProgress(4);
                  hideButtons(4);
                  $('html, body').animate({
                    scrollTop: 100
                }, 100);
      });
      $("#pay_now").click(function(e){
          $("#modal-payment-method").show();
      });
     

      $("#payment-review-quote-button").click(function(e){
          $("#modal-payment-method").hide();
      });

      btnback.click(function(){
            if(current > 1){
              current = current - 2;
              if(current==0){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_1">1</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Trip Details</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(inprogress);

                  var pending = '<div class="frame-108564">\
                      <div class="_2">2</div>\
                    </div>\
                    <div class="frame-108569">\
                      <div class="quotation">Quotation</div>\
                      <div class="pending">Pending</div>\
                    </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(pending);
                  $('.line-5').css({ 'border-color': '#eff2f4'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
              }

              if(current==1){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);

                  var pending = '<div class="frame-108565">\
                        <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108571">\
                        <div class="personal-data">Personal Data</div>\
                        <div class="pending">Pending</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(pending);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
              }

              if(current==2){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);

                  var pending = '<div class="frame-108566">\
                        <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108573">\
                        <div class="payment">Payment</div>\
                        <div class="pending">Pending</div>\
                      </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(pending);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});

              }
              btnnext.trigger('click');
            }
            hideButtons(current);
      });


        //modal agree
      $("#modal-popup-first-page-confirm").click(function(e){
        var errorCode = 0;
          if($("#modal-citizenship").val() == ""){
            errorCode = 1;
            $("#modal-citizenship").removeClass("valid").addClass("invalid");
            $("#modal-citizenship").find('option').css('color', '#212529');
            $("#modal-citizenship").parent().find( "p").removeClass("valid-text").addClass("invalid-text");
          }else{
            $("#citizenship").val($("#modal-citizenship").val());
            $("#citizenship_3rd_page").val($("#modal-citizenship").val());
            $("#modal-citizenship").removeClass("invalid").addClass("valid");
            $("#modal-citizenship").parent().find( "p").removeClass("invalid-text").addClass("valid-text");
          }
          if ($("#chckIAGREE").prop('checked')==true){ 
          }else{
            errorCode = 1;
            $("#chckIAGREE").addClass("checkbox-invalid");
            $("#chckIAGREE").css('border', '2px solid red !important;')
          }
          if($("#modal-citizenship").val()=="Others" && $("#chckIAGREE").prop('checked')==true){
              $("#BlockUIConfirm").hide();
              $("#modal-others").show();
              return false;
          }
          if(errorCode == 1){
            return false;
          }
          $("#BlockUIConfirm").hide();
      });

      $("#modal-popup-first-page-confirm2").click(function(e){
        window.location.href = "{{url('/')}}"+ "/get-quote";
      });
      
      $("#modal-popup-first-page-cancel").click(function(e){
        window.location.href = "{{url('/')}}"+ "/get-quote";
      });

      $("#page1-back").click(function(e){
        window.location.href = "{{url('/')}}"+ "/get-quote";
      });

      $("#btn-upload-id").click(function(e){
        $('#file-upload-id').trigger('click'); 
      });
      $("#btn-upload-id-pwd-id").click(function(e){
        $('#file-upload-pwd-id').trigger('click'); 
      });

      // // Change progress bar action
      setProgress = function(currstep){
      var percent = parseFloat(100 / widget.length) * currstep;
      percent = percent.toFixed();
      $(".progress-bar")
          .css("width",percent+"%");
      }

      // // Hide buttons according to the current step
      hideButtons = function(current){
        var limit = parseInt(widget.length);
        // $(".action").hide();
        // if(current <= 1){
        //   btnback.hide();
        // }else{
        //   btnback.show();
        // }
        // btnnext.show();
      }
    });
</script>
<script>
  $(document).ready(function() {
    var fixmeTop = $('.fixme').offset().top;
      $(window).scroll(function() {
        // $( "#sticky-div" ).addClass( "test" );
          var currentScroll = $(window).scrollTop();
          if (currentScroll >= fixmeTop) {
              $('#sticky-div').css({
                  position: 'sticky ',
                  top: '0',
                  left: '0'
              });
          } else {

              $('#sticky-div').css({
                  position: 'static'
              });
          }
      });


    window.onscroll = () => {
      // $( "#sticky-div" ).addClass( "test" );
      }
        // Smooth scrolling for anchor links
        $('a.scroll-link').click(function(event) {
            event.preventDefault(); // Prevent default action
            var target = $(this).attr('href'); // Get the target section
            $('html, body').animate({
                scrollTop: $(target).offset().top // Scroll to the target section
            }, 2000); // Duration of the animation in milliseconds
        });
    });
</script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/itp_page.css') }}"></script>
<style>
   .checkbox-invalid{
      border:1px solid #dd0707  !important;
      border-radius: 0.25em !important;
      width: 30px !important;
      height: 30px !important;
   }
   .package-selected-button-get-plan-selected{
    color:#fff !important;
    background-color:#e4509a !important;
    }
       
      .package-selected{
        border:2px solid #008080 !important;
    }
  nav {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: #008080; /* Teal background for the navbar */
      color: white;
      padding: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Optional shadow for a slight 3D effect */
  }
  .content {
    padding: 0px;
    margin-bottom: 0px;
    /* margin-top: 20%; */
  }
  nav a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
    padding: 5px;
    border-radius: 5px;
  }
  .sticky-div {
      position: sticky;
      top: 0;
      width: 100%;
      padding: 0px;
      background-color: #f4f4f4;
      border: 1px solid #ddd;
      padding-top: 0px;
  }
</style>

<script>
    $(document).ready(function(){
        let currentSection = 0; // Start with the first section
        var currectInputID = ""; // Oninput ID
        let totalSections = 6;
        let countdown; // Variable for countdown timer
        const countdownDuration = 2; // Countdown in seconds

        // page 1
        // section  1
        $('.section-1-validation, .selectbox-1-validation').on('input change', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitch(currectInputID,1);
        });
        // end section 1
        // section 3
        $(document).on('change', '.selectpicker-destinations', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitch(currectInputID,3);
        });

        document.getElementById('apply').onclick = () => {
            if(activeCalendar ==1){
                date1Input.value = dateselected1;
                date1InputOldVale=date1Selected;
                date2Input.value = ''; // Clear Date 2 when Date 1 is selected
                date2Selected = ''; // Clear Date 2 when Date 1 is selected
                date2Selected = ''; // Clear Date 2 when Date 1 is selected
                $('.icon-to-default_cruise').css('display', '');
                $('.icon-to-checked_cruise').css('display', 'none');
                $('.icon-from-default_cruise').css('display', '');
                $('.icon-from-checked_cruise').css('display', 'none');
                $('#destination_from_cruise').val("");
                $('#destination_to_cruise').val("");
           }else{
                date2InputOldVale=date2Selected;
                date2Input.value  = dateselected2;
            }
            if($('#destination_from').val() != ""){
                $('.icon-from-default').css('display', 'none');
                $('.icon-from-checked').css('display', '');
                $('#destination_from').removeClass("invalid").addClass("valid");
               
            }else{
              dateDestinationValid = "invalid";
            }

            if($('#destination_to').val() != ""){
                $('.icon-to-default').css('display', 'none');
                $('.icon-to-checked').css('display', '');
                $('#destination_to').removeClass("invalid").addClass("valid");
            }else{
              dateDestinationValid = "invalid";
            }
              var from = $('#destination_from').val();
              var to = $('#destination_to').val();
              var start = new Date(from);
              var end = new Date(to);
              var diffDate = (end - start) / (1000 * 60 * 60 * 24);
              var days = Math.round(diffDate);
              var days = days + 1;
            if($('input[name="hdn_covid_tag"]').val() == "Yes"){
              
              $("#covid_yes_option").css("display", "none");
              if(days > 15){
                $('#covid-btn-15days').trigger('click');
                $("#covid_yes_option").css("display", "");
              }else{
                $('input[name="hdn_covid_yes_type"]').val("entire");
              }
            }
            $('#error-message-calendar-until').css('display', 'none');
            if(days > 180){
              $('#error-message-calendar-until').css('display', '');
              date2Input.value  = "";
            }
              datePicker.style.display = 'none';
            // if(dateDestinationValid = "valid"){
              checkInputsAndSwitch("destination_both",3);
            // }

        };

        
        // end section 3
        $(document).on('change', '.selectpicker-cruise_destinations', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitch(currectInputID,4);
        });

        document.getElementById('apply_cruise').onclick = () => {
            if(activeCalendar_cruise ==1){
              date1Input_cruise.value = dateselected1_cruise;
              date1InputOldVale_cruise=date1Selected_cruise;
              date2Input_cruise.value = ''; // Clear Date 2 when Date 1 is selected
            }else{
              date2InputOldVale_cruise=date2Selected_cruise;
              date2Input_cruise.value  = dateselected2_cruise;
            }
            if($('#destination_from_cruise').val() != ""){
                $('.icon-from-default_cruise').css('display', 'none');
                $('.icon-from-checked_cruise').css('display', '');
                $('#destination_from_cruise').removeClass("invalid").addClass("valid");
               
            }else{
              dateDestinationValid = "invalid";
            }

            if($('#destination_to_cruise').val() != ""){
                $('.icon-to-default_cruise').css('display', 'none');
                $('.icon-to-checked_cruise').css('display', '');
                $('#destination_to_cruise').removeClass("invalid").addClass("valid");
            }else{
              dateDestinationValid = "invalid";
            }
            datePicker_cruise.style.display = 'none';
            // if(dateDestinationValid = "valid"){
              checkInputsAndSwitch("destination_both",4);
            // }

        };
        // section 4
        // End section 4
        // End Page 1
        //Page 3
        $('.page-3-section-1-validation, .page-3-selectbox-1-validation').on('input change', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(currectInputID,1);
        });
        document.getElementById('applybday').onclick = () => {
            if(dateselectedbday != ""){
                $('.icon-bday-default').css('display', 'none');
                $('.icon-bday-checked').css('display', '');
                $('#date-of-birth').removeClass("invalid").addClass("valid");
            }
            activeInputbday.value = dateselectedbday;
            dateOldBday=dateselectedbday;
            datePickerbday.style.display = 'none';
            checkInputsAndSwitchPage3("date-of-birth",1);

        };
        $('.page-3-section-2-validation, .page-3-selectbox-2-validation').on('input change', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(currectInputID,2);
        });

        $('.page-3-section-3-validation, .page-3-selectbox-3-validation').on('input change', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(currectInputID,3);
        });

        $(document).on('input change', '.page-3-section-4-validation, .page-3-selectbox-4-validation', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(currectInputID,4);
        });

        $(document).on('input change', '.page-3-section-5-validation, .page-3-selectbox-5-validation', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(currectInputID,5);
        });

        $(document).on('input change', '.page-3-section-6-validation, .page-3-selectbox-6-validation', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(currectInputID,6);
        });

        $(document).on('input change', '.page-3-section-8-validation, .page-3-selectbox-8-validation', function() {
            var currectInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(currectInputID,8);
        });


        //End of Page 3
        function validateInputs(currectInputID,currentSection) {
            let allValid = true;


            // Validation rules
            if (currentSection === 1) { // Section 1
                $("#part1-personal-info-svg").css("display", "none");
                if (!$('#first_name').val()) {
                    allValid = false;
                    if(currectInputID == $('#first_name').attr("id")){
                      $("#first_name").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#first_name").removeClass("invalid").addClass("valid")
                }

                if (!$('#last_name').val()) {
                    allValid = false;
                    if(currectInputID == $('#last_name').attr("id")){
                      $("#last_name").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#last_name").removeClass("invalid").addClass("valid")
                }

                if (!$('#suffix').val()) {
                  allValid = false;
                  if(currectInputID == $('#suffix').attr("id")){
                    $('#suffix').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#suffix').closest('.btn-group').addClass('invalid-select');
                  }
                }else{
                  $('#suffix').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#suffix').closest('.btn-group').removeClass('invalid-select');
                }

                if (!$('#mobile').val() || $('#mobile').val().length < 15 || $("#mobile").val().charAt(1) != 0 || $("#mobile").val().charAt(2) != 9 ) {
                      allValid = false;
                      if(currectInputID == $('#mobile').attr("id")){
                        $("#mobile").removeClass("valid").addClass("invalid")
                      }
                }else{
                   $("#mobile").removeClass("invalid").addClass("valid")
                }
               
                if (!$('#email').val() || !validateEmail($('#email').val())) {
                      allValid = false;
                      if(currectInputID == $('#email').attr("id")){
                        $("#email").removeClass("valid").addClass("invalid");
                      }
                }else{
                    $("#email").removeClass("invalid").addClass("valid");
                }
                if(allValid){
                  $("#part1-personal-info-svg").css("display", "");
                  $("#part1-personal-info-svg-error").css("display", "none");
                }
            } else if (currentSection === 2) { // Section 2

              //check  all if errors
              if (!$('#destination_from').val()) {
                      allValid = false;
              }
              if (!$('#destination_to').val()) {
                      allValid = false;
              }

              $('select[name^="destinations"]').each(function(){
                var id = $(this).attr("id");
                  if($(this).val() == ""){
                      allValid = false;
                  }
              });
              
              if(allValid){
                  $("#part1-travel-details-svg").css("display", "");
                  $("#part1-travel-details-svg-error").css("display", "none");
              }
            } else if (currentSection === 3) {// Section 3
              if(currectInputID =="destination_both"){
              }else{
                $("#"+currectInputID).closest('.btn-group').find('button').removeClass('invalid-select');
                $("#"+currectInputID).closest('.btn-group').removeClass('invalid-select');
               
                if (!$('#'+currectInputID).val()) {
                      $("#"+currectInputID).closest('.btn-group').find('button').addClass('invalid-select');
                      $("#"+currectInputID).closest('.btn-group').addClass('invalid-select');
                      $("#"+currectInputID).closest('.btn-group').find('button').removeClass('valid');
                      $("#"+currectInputID).closest('.btn-group').removeClass('valid');
                }
              }

              //check  all if errors
              if (!$('#destination_from').val()) {
                      allValid = false;
              }
              if (!$('#destination_to').val()) {
                      allValid = false;
              }

              $('select[name^="destinations"]').each(function(){
                var id = $(this).attr("id");
                  if($(this).val() == ""){
                      allValid = false;
                  }
              });
              
              if(allValid){
                  $("#part1-travel-details-svg").css("display", "");
                  $("#part1-travel-details-svg-error").css("display", "none");
              }

            } else if (currentSection === 4) {
              
              //check  all if errors

              if( $('input[name="hdn_cruise_tag"]').val() == "Yes"){

              if(currectInputID =="destination_both"){
              }else{
                $("#"+currectInputID).closest('.btn-group').find('button').removeClass('invalid-select');
                $("#"+currectInputID).closest('.btn-group').removeClass('invalid-select');
               
                if (!$('#'+currectInputID).val()) {
                      $("#"+currectInputID).closest('.btn-group').find('button').addClass('invalid-select');
                      $("#"+currectInputID).closest('.btn-group').addClass('invalid-select');
                      $("#"+currectInputID).closest('.btn-group').find('button').removeClass('valid');
                      $("#"+currectInputID).closest('.btn-group').removeClass('valid');
                }
              }

                if (!$('#destination_from_cruise').val()) {
                        allValid = false;
                }
                if (!$('#destination_to_cruise').val()) {
                        allValid = false;
                }

                $('select[name^="cruise_destinations"]').each(function(){
                  var id = $(this).attr("id");
                    if($(this).val() == ""){
                        allValid = false;
                    }
                });
              }
             
              if(allValid){
                  $("#part1-cruise-svg").css("display", "");
                  $("#part1-cruise-svg-error").css("display", "none");
              }
            }
            return allValid;
        }
        
        function validateInputsPage3(currectInputID,currentSection) {
            let allValid = true;
            // Validation rules
            if (currentSection === 1) { // Section 1
                $("#additional-info-svg").css("display", "none");
                if (!$('#place-of-birth').val()) {
                    allValid = false;
                    if(currectInputID == $('#place-of-birth').attr("id")){
                      $("#place-of-birth").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#place-of-birth").removeClass("invalid").addClass("valid")
                }

                if (!$('#date-of-birth').val()) {
                    allValid = false;
                    if(currectInputID == $('#date-of-birth').attr("id")){
                      $("#date-of-birth").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#date-of-birth").removeClass("invalid").addClass("valid")
                }

                if (!$('#gender').val()) {
                  allValid = false;
                  if(currectInputID == $('#gender').attr("id")){
                    $('#gender').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#gender').closest('.btn-group').addClass('invalid-select');
                  }
                }else{
                  $('#gender').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#gender').closest('.btn-group').removeClass('invalid-select');
                }

                // if (!$('#country-additional-info').val()) {
                //   allValid = false;
                //   if(currectInputID == $('#country-additional-info').attr("id")){
                //     $('#country-additional-info').closest('.btn-group').find('button').addClass('invalid-select'); 
                //     $('#country-additional-info').closest('.btn-group').addClass('invalid-select');
                //   }
                // }else{
                //   $('#country-additional-info').closest('.btn-group').find('button').removeClass('invalid-select');
                //   $('#country-additional-info').closest('.btn-group').removeClass('invalid-select');
                // }
                
                if(allValid){
                  $("#additional-info-svg").css("display", "");
                  $("#additional-info-svg-error").css("display", "none");
                }
            } else if (currentSection === 2) { // Section 2
                $("#present_address_svg").css("display", "none");
                if (!$('#region').val()) {
                  allValid = false;
                  if(currectInputID == $('#region').attr("id")){
                    $('#region').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#region').closest('.btn-group').addClass('invalid-select');
                    $('#region').closest('.btn-group').find('button').removeClass('valid'); 
                    $('#region').closest('.btn-group').removeClass('valid');
                  }
                }else{
                  $('#region').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#region').closest('.btn-group').removeClass('invalid-select');
                }
                if (!$('#province').val()) {
                  allValid = false;
                  if(currectInputID == $('#province').attr("id")){
                    $('#province').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#province').closest('.btn-group').addClass('invalid-select');
                    $('#province').closest('.btn-group').find('button').removeClass('valid'); 
                    $('#province').closest('.btn-group').removeClass('valid');
                  }
                }else{
                  $('#province').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#province').closest('.btn-group').removeClass('invalid-select');
                }
                if (!$('#city').val()) {
                  allValid = false;
                  if(currectInputID == $('#city').attr("id")){
                    $('#city').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#city').closest('.btn-group').addClass('invalid-select');
                    $('#city').closest('.btn-group').find('button').removeClass('valid'); 
                    $('#city').closest('.btn-group').removeClass('valid');
                  }
                }else{
                  $('#city').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#city').closest('.btn-group').removeClass('invalid-select');
                }
                if (!$('#barangay').val()) {
                  allValid = false;
                  if(currectInputID == $('#barangay').attr("id")){
                    $('#barangay').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#barangay').closest('.btn-group').addClass('invalid-select');
                    $('#barangay').closest('.btn-group').find('button').removeClass('valid'); 
                    $('#barangay').closest('.btn-group').removeClass('valid');
                  }
                }else{
                  $('#barangay').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#barangay').closest('.btn-group').removeClass('invalid-select');
                }

                if (!$('#address-house-unit').val()) {
                    allValid = false;
                    if(currectInputID == $('#address-house-unit').attr("id")){
                      $("#address-house-unit").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#address-house-unit").removeClass("invalid").addClass("valid")
                }
                if (!$('#street').val()) {
                    allValid = false;
                    if(currectInputID == $('#street').attr("id")){
                      $("#street").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#street").removeClass("invalid").addClass("valid")
                }
                if (!$('#zip').val()) {
                    allValid = false;
                    if(currectInputID == $('#zip').attr("id")){
                      $("#zip").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#zip").removeClass("invalid").addClass("valid")
                }
                if(allValid){
                  $("#present_address_svg").css("display", "");
                  $("#present_address_svg_error").css("display", "none");
                }
            } else if (currentSection === 3) {// Section 3
                $("#identification_svg").css("display", "none");
                if (!$('#id_no').val()) {
                    allValid = false;
                    if(currectInputID == $('#id_no').attr("id")){
                      $("#id_no").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#id_no").removeClass("invalid").addClass("valid")
                }
                if (!$('#id_type').val()) {
                  allValid = false;
                  if(currectInputID == $('#id_type').attr("id")){
                    $('#id_type').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#id_type').closest('.btn-group').addClass('invalid-select');
                  }
                }else{
                  $('#id_type').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#id_type').closest('.btn-group').removeClass('invalid-select');
                }
                if($('#file-upload-id').get(0).files.length== 0){
                  allValid = false;
                }else{
                  if($('#file-upload-id').get(0).files[0].size > 5000000){
                    allValid = false;
                  }
                }
                if(allValid){
                  $("#identification_svg").css("display", "");
                  $("#identification_svg_error").css("display", "none");
                }
            } else if (currentSection === 4) {
              $("#beneficiary-svg").css("display", "none");
              if(currectInputID =="beneficiary-relationship" || currectInputID =="beneficiary-relationship0" || currectInputID =="beneficiary-relationship1"){
                $("#"+currectInputID).closest('.btn-group').find('button').removeClass('invalid-select');
                $("#"+currectInputID).closest('.btn-group').removeClass('invalid-select');
                if (!$('#'+currectInputID).val()) {
                      allValid = false;
                      $("#"+currectInputID).closest('.btn-group').find('button').addClass('invalid-select');
                      $("#"+currectInputID).closest('.btn-group').addClass('invalid-select');
                      $("#"+currectInputID).closest('.btn-group').find('button').removeClass('valid');
                      $("#"+currectInputID).closest('.btn-group').removeClass('valid');
                }
              }else if(currectInputID =="beneficiary-mobile" || currectInputID =="beneficiary-mobile0" || currectInputID =="beneficiary-mobile1"){
                if (!$("#"+currectInputID).val() ||  $("#"+currectInputID).val().length < 15 || $("#"+currectInputID).val().charAt(1) != 0 || $("#"+currectInputID).val().charAt(2) != 9 ) {
                      if(currectInputID ==  $("#"+currectInputID).attr("id")){
                        allValid = false;
                        $("#"+currectInputID).removeClass("valid").addClass("invalid");
                      }
                }else{
                   $("#"+currectInputID).removeClass("invalid").addClass("valid");
                }
              }else if(currectInputID =="beneficiary-fullname" || currectInputID =="beneficiary-fullname0" || currectInputID =="beneficiary-fullname1"){
                if (!$("#"+currectInputID).val()) {
                    if(currectInputID == $("#"+currectInputID).attr("id")){
                      allValid = false;
                      $("#"+currectInputID).removeClass("valid").addClass("invalid");
                    }
                }else{
                  $("#"+currectInputID).removeClass("invalid").addClass("valid");
                }
              }

              $('select[name^="beneficiary-relationship"]').each(function(){
                var idrelationship = $(this).attr("id");
                  if($("#"+idrelationship).val() == ""){
                      allValid = false;
                  }
              });
              $('input[name^="beneficiary-fullname"]').each(function(){
                var idfullname = $(this).attr("id");
                  if($("#"+idfullname).val() == ""){
                      allValid = false;
                  }
              });
              $('input[name^="beneficiary-mobile"]').each(function(){
                var idmobile = $(this).attr("id");
                  if ($("#"+idmobile).val() == "" ||  $("#"+idmobile).val().length < 15 || $("#"+idmobile).val().charAt(1) != 0 || $("#"+idmobile).val().charAt(2) != 9 ) {
                      allValid = false;
                  }
              });
              if(allValid){
                $("#beneficiary-svg").css("display", "inline");
                $("#beneficiary-svg-error").css("display", "none");
              }
            } else if (currentSection === 5) {
                $("#emergency-svg").css("display", "none");
                if (!$('#emergency-fullname').val()) {
                    allValid = false;
                    if(currectInputID == $('#emergency-fullname').attr("id")){
                      $("#emergency-fullname").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#emergency-fullname").removeClass("invalid").addClass("valid")
                }
               
                if (!$('#emergency-mobile').val() || $('#emergency-mobile').val().length < 15 || $("#emergency-mobile").val().charAt(1) != 0 || $("#emergency-mobile").val().charAt(2) != 9 ) {
                      allValid = false;
                      if(currectInputID == $('#emergency-mobile').attr("id")){
                        $("#emergency-mobile").removeClass("valid").addClass("invalid")
                      }
                }else{
                   $("#emergency-mobile").removeClass("invalid").addClass("valid")
                }

                if (!$('#emergency-relationship').val()) {
                  allValid = false;
                  if(currectInputID == $('#emergency-relationship').attr("id")){
                    $('#emergency-relationship').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#emergency-relationship').closest('.btn-group').addClass('invalid-select');
                  }
                }else{
                  $('#emergency-relationship').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#emergency-relationship').closest('.btn-group').removeClass('invalid-select');
                }

                if(allValid){
                  $("#emergency-svg").css("display", "");
                  $("#emergency-svg-error").css("display", "none");
                }
            } else if (currentSection === 6) {
                $("#pwd-svg").css("display", "none");
                if (!$('#id_no_pwd').val()) {
                    allValid = false;
                    if(currectInputID == $('#id_no_pwd').attr("id")){
                      $("#id_no_pwd").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#id_no_pwd").removeClass("invalid").addClass("valid")
                }
                if (!$('#id_type_pwd').val()) {
                  allValid = false;
                  if(currectInputID == $('#id_type_pwd').attr("id")){
                    $('#id_type_pwd').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#id_type_pwd').closest('.btn-group').addClass('invalid-select');
                  }
                }else{
                  $('#id_type_pwd').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#id_type_pwd').closest('.btn-group').removeClass('invalid-select');
                }
                if($('#pwd-file-upload-id').get(0).files.length== 0){
                  allValid = false;
                }else{
                  if($('#pwd-file-upload-id').get(0).files[0].size > 5000000){
                    allValid = false;
                  }
                }
                if(allValid){
                  $("#pwd-svg").css("display", "");
                  $("#pwd-svg-error").css("display", "none");
                }
            } else if (currentSection === 7) {
            } else if (currentSection === 8) {
                if (!$('#agent-name').val()) {
                    allValid = false;
                      $("#agent-name").removeClass("valid").addClass("invalid")
                }else{
                  $("#agent-name").removeClass("invalid").addClass("valid")
                }

                if(allValid){
                  $("#agent-svg").css("display", "");
                  $("#agent-svg-error").css("display", "none");
                }else{
                  $("#agent-svg").css("display", "none");
                  $("#agent-svg-error").css("display", "none");
                }
            }
            return allValid;
        }
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email regex
            return re.test(email);
        }
        

        function checkInputsAndSwitch(currectInputID,sectID) {
            if (validateInputs(currectInputID,sectID)) {
                resetTimer(); // Reset any existing timer
                if(sectID == 1 || sectID == 3 || sectID == 4){
                  startCountdown(countdownDuration,sectID); // Start the countdown only if inputs are valid
                }else{
                  startCountdown(1,sectID); // Start the countdown only if inputs are valid
                }
              } else {
                resetTimer();
            }
        }

        function checkInputsAndSwitchPage3(currectInputID,sectID) {
            if (validateInputsPage3(currectInputID,sectID)) {
                resetTimer(); // Reset any existing timer
                startCountdownPage3(countdownDuration,sectID); // Start the countdown only if inputs are valid
                // if(sectID == 1 || sectID == 3){
                //   startCountdown(countdownDuration,sectID); // Start the countdown only if inputs are valid
                // }else{
                //   startCountdown(1,sectID); // Start the countdown only if inputs are valid
                // }
              } else {
                resetTimer();
            }
        }

        function startCountdown(seconds,sectID) {
            let timeLeft = seconds;
            // $(`#timer1`).text(`Next section in: ${timeLeft} seconds`);
          
            countdown = setInterval(function() {
                timeLeft--;
                // $(`#timer1`).text(`Next section in: ${timeLeft} seconds`);
                
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    if(sectID == 1){
                      FirstPageValidationPassNextSection();
                    }else if(sectID == 2){
                      SecondPageValidationPassNextSection();
                    }else if(sectID == 3){
                      ThirdPageValidationPassNextSection();
                    }else if(sectID == 4){
                      FourthPageValidationPassNextSection();
                    }
                }
            }, 1000);

            // Stop the countdown on scroll
            $(window).on('scroll', function() {
                clearInterval(countdown);
                // $(`#timer1`).text('Countdown stopped due to scrolling.');
            });
        }

        function startCountdownPage3(seconds,sectID) {
            let timeLeft = seconds;
            // $(`#timer1`).text(`Next section in: ${timeLeft} seconds`);

            countdown = setInterval(function() {
                timeLeft--;
                // $(`#timer1`).text(`Next section in: ${timeLeft} seconds`);
                
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    if(sectID == 1){
                      ThirdPageFirstPageValidationPassNextSection();
                    }else if(sectID == 2){
                      ThirdPageSecondPageValidationPassNextSection();
                    }else if(sectID == 3){
                      ThirdPageThirdPageValidationPassNextSection();
                    }else if(sectID == 4){
                      ThirdPageFourthPageValidationPassNextSection();
                    }else if(sectID == 5){
                      ThirdPageFifthPageValidationPassNextSection();
                    }else if(sectID == 6){
                      ThirdPageSixPageValidationPassNextSection();
                    }
                }
            }, 1000);

            // Stop the countdown on scroll
            $(window).on('scroll', function() {
                clearInterval(countdown);
                // $(`#timer1`).text('Countdown stopped due to scrolling.');
            });
        }
        
        function FirstPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 450
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }
        function SecondPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 500
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }
        function ThirdPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 1050
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }
        function FourthPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 1550
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }
        function resetTimer() {
            clearInterval(countdown);
            $(`#timer${currentSection + 1}`).text(''); // Clear the timer display
        }
        
        function ThirdPageFirstPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 875
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }

        function ThirdPageSecondPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 1275
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }

        function ThirdPageThirdPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 1575
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }

        function ThirdPageFourthPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 1950
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }   
        function ThirdPageFifthPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 2175
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }

        function ThirdPageSixPageValidationPassNextSection() {
              resetTimer();
              if (currentSection < totalSections) {
                  $('html, body').animate({
                    scrollTop: 2275
                  }, 1000);
                  resetTimer(); // Reset the timer for the new section
              }
        }

        $(".option_tab").click(function(e){
            $("#single-destination_text").css("text-align","center");
            if($(this).data("id") == "single"){
              $('.Destination:not(:first)').remove();
              $('.Destination_Cruise:not(:first)').remove();
              $(".single-option-field").removeClass("destination-mobile-first");
              $(".single-option-field").removeClass("d-inline-block");
              $(".multiple-option-field").removeClass("d-inline-block");
              $("#single-option-field").removeClass("d-inline-block");
              $("#multiple-option-field").removeClass("d-inline-block");
              $(".delete-row-col-destiney").css("display","none");
              $("#single-destination").css("background-color","#e4509a");
              $("#single-destination_text").css("color","#fff");
              $("#multiple-destination").css("background-color","#fff");
              $("#multiple-destination").css("border-color","#edcadc");
              $("#multiple-destination_text").css("color","#edcadc");
              $("#single_check_svg").show();
              $("#multiple_check_svg").hide();
              $("#single-destination_text").css("width","");
              $("#single-destination_text").css("text-align","center");
              $('input[name="hdn_destination_type"]').val("single");

              $("#single-destination").removeClass("option-tab-a-hover");
              $("#single-destination").removeClass("option-tab-a-selected-hover");
              $("#multiple-destination").addClass("option-tab-a-selected-hover");
      
              checkInputsAndSwitch("",2);
              // if($('input[name="hdn_travelling"]').val()){
              //   checkInputsAndSwitch("",2);
              // }
            }
            if($(this).data("id") == "multiple"){
              // alert($('select[name^="destinations"]').length);
              // alert($('select[name^="destinations"]').val());
              // alert($('select[name^="destinations_cruise"]').length);
              if($('select[name^="destinations"]').length ==1){
                $('#addDestination').trigger('click');
              }
              $("#multiple-destination").removeClass("option-tab-a-hover");
              $("#single-destination").addClass("option-tab-a-selected-hover");
              $("#multiple-destination").removeClass("option-tab-a-selected-hover");

              if($(this).data("device") =="mobile"){
                    $(".single-option-field").addClass("d-inline-block");
                    $(".single-option-field").addClass("destination-mobile-first");
                    $(".multiple-option-field").addClass("d-inline-block");
                  }else{
                    $(".single-option-field").removeClass("destination-mobile-first");
                    $(".single-option-field").removeClass("d-inline-block");
                    $(".multiple-option-field").removeClass("d-inline-block");
              }
              $(".delete-row-col-destiney").css("display","");
              $("#single-destination").css("background-color","#fff");
              $("#single-destination_text").css("color","#e4509a");
              $("#multiple-destination").css("background-color","#e4509a");
              $("#single-destination_text").css("color","#edcadc");
              $("#single-destination").css("border-color","#edcadc");
              $("#single-destination_text").css("width","170px");
              $("#single-destination_text").css("text-align","center");
              $("#multiple-destination_text").css("color","#fff");

              $("#single_check_svg").hide();
              $("#multiple_check_svg").show();
              $('input[name="hdn_destination_type"]').val("multiple");
              checkInputsAndSwitch("",2);
              // if($('input[name="hdn_travelling"]').val()){
               
              // }
            }

            if($(this).data("id") == "air"){
              $("#air-destination").css("background-color","#e4509a");
              $("#air-destination_text").css("color","#fff");
              $("#non-air-destination").css("background-color","#fff");
              $(".air_I391_13219_260_4228").css("color","#fff");
              $(".non-air_I391_13219_260_4230").css("color","#edcadc");
              $("#non-air-destination").css("border-color","#edcadc");
              $("#air_check_svg").show();
              $("#non_air_check_svg").hide();
              $('input[name="hdn_travelling"]').val("air");
              $("#air-destination").removeClass("option-tab-a-hover");
              $("#non-air-destination").addClass("option-tab-a-selected-hover");
              $("#air-destination").removeClass("option-tab-a-selected-hover");

              if($('input[name="hdn_destination_type"]').val()){
                checkInputsAndSwitch("",2);
              }
            }
            if($(this).data("id") == "non-air"){
              $("#air-destination").css("background-color","#fff");
              $(".air_I391_13219_260_4228").css("color","#edcadc");
              $(".non-air_I391_13219_260_4230").css("color","#fff");
              $("#non-air-destination").css("background-color","#e4509a");
              $("#non-air-destination_text").css("color","#fff");
              $("#air-destination_text").css("color","#edcadc");
              $("#air-destination").css("border-color","#edcadc");
              $("#non-air-destination").removeClass("option-tab-a-hover");
              $("#air-destination").addClass("option-tab-a-selected-hover");
              $("#non-air-destination").removeClass("option-tab-a-selected-hover");

              $("#air_check_svg").hide();
              $("#non_air_check_svg").show();
              $('input[name="hdn_travelling"]').val("non-air");
              if($('input[name="hdn_destination_type"]').val()){
                checkInputsAndSwitch("",2);
              }
            }

            if($(this).data("id") == "covid_no"){
              $("#warranty-coverage-covid").css("display", "none");
              $("#covid_yes_option").css("display", "none");
              $("#confirmation-covid-div").css("display", "none");
              $(".quotation-covid-section").css("display", "none");
              $(".quotation-non-covid-section").css("display", "");

              $("#part1-covid-svg").css("display", "");
              $("#part1-covid-svg-error").css("display", "none");
              $("#covid-div-no").css("background-color","#e4509a");
              $(".no_543_19029").css("color","#fff");
              $("#covid-div-yes").css("background-color","#fff");
              $(".yes_543_19031").css("color","#edcadc");
              $("#covid_no_check_svg").show();
              $("#covid_yes_check_svg").hide();
              $('input[name="hdn_covid_tag"]').val("No");
              $('input[name="hdn_covid_yes_type"]').val("");
              $("#covid-div-yes").css("border-color","#edcadc");
              $("#covid-div-no").removeClass("option-tab-a-hover");
              $("#covid-div-yes").addClass("option-tab-a-selected-hover");
              $("#covid-div-no").removeClass("option-tab-a-selected-hover");

              $("#covid-btn-15days").css("background-color","transparent");
              $("#covid-btn-15days").css("color","rgb(228, 80, 154)");
              $("#covid-btn-15days").css("border-color","rgb(228, 80, 154)");
              $(".covid_15_days").css("color","rgb(228, 80, 154)");
              $("#covid-btn-entire_trip").css("background-color","transparent");
              $("#covid-btn-entire_trip").css("color","rgb(228, 80, 154)");
              $("#covid-btn-entire_trip").css("border-color","rgb(228, 80, 154)");
              $(".entire_duration_covid").css("color","rgb(228, 80, 154)");

              $("#covid_15_days_svg").hide();
              $("#covid_entire_duration_svg").hide();
              $("#covid-btn-15days").addClass("option-tab-a-hover");
              $("#covid-btn-entire_trip").addClass("option-tab-a-hover");
              $("#covid-btn-15days").removeClass("option-tab-a-selected-hover");
              $("#covid-btn-entire_trip").removeClass("option-tab-a-selected-hover");

              
              if($('input[name="hdn_cruise_tag"]').val()){
                checkInputsAndSwitch("",4);
              }
            }
            if($(this).data("id") == "covid_yes"){
              var from_click_yes = $('#destination_from').val();
              var to_click_yes = $('#destination_to').val();
              var start_click_yes = new Date(from_click_yes);
              var end_click_yes = new Date(to_click_yes);
              var diffDate_click_yes = (end_click_yes - start_click_yes) / (1000 * 60 * 60 * 24);
              var days_click_yes = Math.round(diffDate_click_yes);
              var days_click_yes = days_click_yes + 1;            

              $("#warranty-coverage-covid").css("display", "");
              $(".quotation-covid-section").css("display", "");
              $(".quotation-non-covid-section").css("display", "none");
              $("#part1-covid-svg-error").css("display", "none");
              $("#part1-covid-svg").css("display", "none");
              $("#covid-div-no").css("background-color","#fff");
              $(".no_543_19029").css("color","#edcadc");
              $("#covid-div-yes").css("background-color","#e4509a");
              $(".yes_543_19031").css("color","#fff");
              $("#covid_no_check_svg").hide();
              $("#covid_yes_check_svg").show();
              $('input[name="hdn_covid_tag"]').val("Yes");
              $("#covid-div-no").css("border-color","#edcadc");
              $("#covid-div-yes").removeClass("option-tab-a-hover");
              $("#covid-div-no").addClass("option-tab-a-selected-hover");
              $("#covid-div-yes").removeClass("option-tab-a-selected-hover");
              $("#covid_yes_option").css("display", "none");

              if(parseInt(days_click_yes) > 15){
                $("#covid_yes_option").css("display", "block");
              }else{
                $('input[name="hdn_covid_yes_type"]').val("entire");
                if($('input[name="hdn_cruise_tag"]').val()){
                  checkInputsAndSwitch("",4);
                }
              }
              $('#covid-btn-15days').trigger('click');
            }


            if($(this).data("id") == "covid_15"){
              $("#part1-covid-svg").css("display", "");
              $("#part1-covid-svg-error").css("display", "none");
              $("#covid-btn-15days").css("background-color","#e4509a");
              $(".covid_15_days").css("color","#fff");
              $("#covid-btn-entire_trip").css("background-color","#fff");
              $(".entire_duration_covid").css("color","#edcadc");
              $("#covid_15_days_svg").show();
              $("#covid_entire_duration_svg").hide();
              $('input[name="hdn_covid_tag"]').val("Yes");
              $('input[name="hdn_covid_yes_type"]').val("15");
              $("#covid-btn-entire_trip").css("border-color","#edcadc");
              $("#covid-btn-15days").removeClass("option-tab-a-hover");
              $("#covid-btn-entire_trip").addClass("option-tab-a-selected-hover");
              $("#covid-btn-15days").removeClass("option-tab-a-selected-hover");
              if($('input[name="hdn_cruise_tag"]').val()){
                checkInputsAndSwitch("",4);
              }
            }

            if($(this).data("id") == "covid_entire"){
              $("#part1-covid-svg").css("display", "");
              $("#part1-covid-svg-error").css("display", "none");
              $("#covid-btn-entire_trip").css("background-color","#e4509a");
              $("#covid-btn-15days").css("background-color","#fff");
              $(".entire_duration_covid").css("color","#fff");
              $(".covid_15_days").css("color","#edcadc");
              $("#covid_15_days_svg").hide();
              $("#covid_entire_duration_svg").show();
              $('input[name="hdn_covid_tag"]').val("Yes");
              $('input[name="hdn_covid_yes_type"]').val("entire");
              $("#covid-btn-15days").css("border-color","#edcadc");
              $("#covid-btn-entire_trip").removeClass("option-tab-a-hover");
              $("#covid-btn-15days").addClass("option-tab-a-selected-hover");
              $("#covid-btn-entire_trip").removeClass("option-tab-a-selected-hover");
              if($('input[name="hdn_cruise_tag"]').val()){
                checkInputsAndSwitch("",4);
              }
            }


            if($(this).data("id") == "cruise_no"){
              $('.Destination_Cruise:not(:first)').remove();
             
              jQuery('#cruise_destinations').val("");
              jQuery('#cruise_destinations').selectpicker("refresh");
              $(".quotation-cruise-section").css("display", "none");
              $("#destination-cruise-div").css("display", "none");
              $("#part1-cruise-svg").css("display", "");
              $("#cruise-div-no").css("background-color","#e4509a");
              $(".no_543_19047").css("color","#fff");
              $("#cruise-div-yes").css("background-color","#fff");
              $(".yes_543_19049").css("color","#edcadc");
              $("#cruise_no_check_svg").show();
              $("#cruise_yes_check_svg").hide();
              $('input[name="hdn_cruise_tag"]').val("No");

              $("#cruise-div-yes").css("border-color","#edcadc");
              $("#cruise-div-no").removeClass("option-tab-a-hover");
              $("#cruise-div-yes").addClass("option-tab-a-selected-hover");
              $("#cruise-div-no").removeClass("option-tab-a-selected-hover");
              
              $("#part1-cruise-svg-error").css("display", "none");
              $("#part1-cruise-svg").css("display", "");

              $("#destination_from_cruise").val("");
              $("#destination_to_cruise").val("");

              $("#destination_from_cruise").removeClass("valid");
              $("#destination_to_cruise").removeClass("valid");
              $("#destination_from_cruise").removeClass("invalid");
              $("#destination_to_cruise").removeClass("invalid");
              $(".icon-from_cruise").css("display", "");
              $(".icon-from-checked_cruise").css("display", "none");
              $(".icon-to_cruise").css("display", "");
              $(".icon-to-checked_cruise").css("display", "none");
              if($('input[name="hdn_covid_tag"]').val()){
                checkInputsAndSwitch("",4);
              }
            }

            if($(this).data("id") == "cruise_yes"){
              $(".quotation-cruise-section").css("display", "");
              $("#destination-cruise-div").css("display", "");
              $("#cruise-div-no").css("background-color","#fff");
              $(".no_543_19047").css("color","#edcadc");
              $("#cruise-div-yes").css("background-color","#e4509a");
              $(".yes_543_19049").css("color","#fff");
              $("#cruise_no_check_svg").hide();
              $("#cruise_yes_check_svg").show();
              $('input[name="hdn_cruise_tag"]').val("Yes");
              
              $("#part1-cruise-svg-error").css("display", "none");
              $("#part1-cruise-svg").css("display", "none");
              $("#cruise-div-no").css("border-color","#edcadc");
              $("#cruise-div-yes").removeClass("option-tab-a-hover");
              $("#cruise-div-no").addClass("option-tab-a-selected-hover");
              $("#cruise-div-yes").removeClass("option-tab-a-selected-hover");

              // if($('input[name="hdn_covid_tag"]').val()){
              //       checkInputsAndSwitch("",4);
              // }
            }



            if($(this).data("id") == "promo_no"){
              $("#part1-promo").css("display", "none");
              $("#promo-div-no").css("background-color","#e4509a");
              $(".no_promo_text").css("color","#fff");
              $("#promo-div-yes").css("background-color","#fff");
              $(".yes_promo_text").css("color","#edcadc");
              $("#promo_no_check_svg").show();
              $("#promo_yes_check_svg").hide();
              $('input[name="hdn_promo_tag"]').val("No");
              $("#first_next").prop('disabled', false);

              $("#promo-div-yes").css("border-color","#edcadc");
              $("#promo-div-no").removeClass("option-tab-a-hover");
              $("#promo-div-yes").addClass("option-tab-a-selected-hover");
              $("#promo-div-no").removeClass("option-tab-a-selected-hover");

              $("#part1-promo-svg-error").css("display", "none");
              $("#part1-promo-svg-success").css("display", "");
              $("#promo").val("");
              if($('input[name="hdn_covid_tag"]').val()){
                checkCOuntGOFourthSection();
              }
            }

            if($(this).data("id") == "promo_yes"){
              $("#part1-promo").css("display", "");
              $("#promo-div-no").css("background-color","#fff");
              $(".no_promo_text").css("color","#edcadc");
              $("#promo-div-yes").css("background-color","#e4509a");
              $(".yes_promo_text").css("color","#fff");
              $("#promo_no_check_svg").hide();
              $("#promo_yes_check_svg").show();
              $("#part1-promo-svg").css("display", "");
              $('input[name="hdn_promo_tag"]').val("Yes");
              $("#promo").val("");
              $("#promo").removeClass("invalid");
              $("#promo").removeClass("valid");
              $("#error-promo-code").hide();
              $("#success-promo-code").hide();
              $("#first_next").prop('disabled', true);

              $("#promo-div-no").css("border-color","#edcadc");
              $("#promo-div-yes").removeClass("option-tab-a-hover");
              $("#promo-div-no").addClass("option-tab-a-selected-hover");
              $("#promo-div-yes").removeClass("option-tab-a-selected-hover");

              $("#part1-promo-svg-error").css("display", "none");
              $("#part1-promo-svg-success").css("display", "none");

              if($('input[name="hdn_covid_tag"]').val()){
                checkCOuntGOFourthSection();
              }
            }

            if($(this).data("id") == "pwd_no"){
              $("#pwd_id_div").css("display","none");
              $("#pwd-svg").css("display","");
              $('input[name="hdn_pwd_tag"]').val("No");
              $("#pwd-div-no").css("background-color","#e4509a");
              $(".pwd_no_text").css("color","#fff");
              $("#pwd-div-yes").css("background-color","#fff");
              $(".pwd_yes_text").css("color","#edcadc");
              $("#pwd_no_check_svg").show();
              $("#pwd_yes_check_svg").hide();
              $("#pwd-svg-error").css("display", "none");
              $("#pwd-div-yes").css("border-color","#edcadc");
              $("#pwd-div-no").removeClass("option-tab-a-hover");
              $("#pwd-div-yes").addClass("option-tab-a-selected-hover");
              $("#pwd-div-no").removeClass("option-tab-a-selected-hover");

            }
            if($(this).data("id") == "pwd_yes"){
              $("#pwd_id_div").css("display","");
              $("#pwd-svg").css("display","none");
              $('input[name="hdn_pwd_tag"]').val("Yes");
              $("#pwd-div-no").css("background-color","#fff");
              $(".pwd_no_text").css("color","#e4509a");
              $("#pwd-div-yes").css("background-color","#e4509a");
              $(".pwd_yes_text").css("color","#fff");
              $("#pwd_no_check_svg").hide();
              $("#pwd_yes_check_svg").show();
              
              $("#pwd-div-no").css("border-color","#edcadc");
              $("#pwd-div-yes").removeClass("option-tab-a-hover");
              $("#pwd-div-no").addClass("option-tab-a-selected-hover");
              $("#pwd-div-yes").removeClass("option-tab-a-selected-hover");

            }

            if($(this).data("id") == "rtpcr_no"){
              $("#rtpcr_id_div").css("display","none");
              $("#rt-pcr-svg").css("display","");
              $('input[name="hdn_rtpcr_tag"]').val("No");
              $("#rtpcr-div-no").css("background-color","#e4509a");
              $(".rtpcr_no_text").css("color","#fff");
              $("#rtpcr-div-yes").css("background-color","#fff");
              $(".rtpcr_yes_text").css("color","#edcadc");
              $("#rtpcr_no_check_svg").show();
              $("#rtpcr_yes_check_svg").hide();
              $("#rt-pcr-svg-error").css("display", "none");
              $("#rtpcr-div-yes").css("border-color","#edcadc");
              $("#rtpcr-div-no").removeClass("option-tab-a-hover");
              $("#rtpcr-div-yes").addClass("option-tab-a-selected-hover");
              $("#rtpcr-div-no").removeClass("option-tab-a-selected-hover");

            }

            if($(this).data("id") == "rtpcr_yes"){
              $("#rtpcr_id_div").css("display","");
              $("#rt-pcr-svg").css("display","");
              $("#rt-pcr-svg-error").css("display","none");
              $('input[name="hdn_rtpcr_tag"]').val("Yes");
              $("#rtpcr-div-no").css("background-color","#fff");
              $(".rtpcr_no_text").css("color","#e4509a");
              $("#rtpcr-div-yes").css("background-color","#e4509a");
              $(".rtpcr_yes_text").css("color","#fff");
              $("#rtpcr_no_check_svg").hide();
              $("#rtpcr_yes_check_svg").show();
              
              $("#rtpcr-div-no").css("border-color","#edcadc");
              $("#rtpcr-div-yes").removeClass("option-tab-a-hover");
              $("#rtpcr-div-no").addClass("option-tab-a-selected-hover");
              $("#rtpcr-div-yes").removeClass("option-tab-a-selected-hover");

            }

            if($(this).data("id") == "agent_no"){
              $("#agent_id_div").css("display","none");
              $("#agent-svg").css("display","");
              $('input[name="hdn_agent_tag"]').val("No");
              $('#agent-name').val("");
              $("#agent-div-no").css("background-color","#e4509a");
              $(".agent_no_text").css("color","#fff");
              $("#agent-div-yes").css("background-color","#fff");
              $(".agent_yes_text").css("color","#edcadc");
              $("#agent_no_check_svg").show();
              $("#agent_yes_check_svg").hide();
              $("#agent-svg-error").css("display", "none");
              $("#agent-div-yes").css("border-color","#edcadc");
              $("#agent-div-no").removeClass("option-tab-a-hover");
              $("#agent-div-yes").addClass("option-tab-a-selected-hover");
              $("#agent-div-no").removeClass("option-tab-a-selected-hover");

            }

            if($(this).data("id") == "agent_yes"){
              $("#agent_id_div").css("display","");
              $("#agent-svg").css("display","none");
              $('input[name="hdn_agent_tag"]').val("Yes");
              $("#agent-div-no").css("background-color","#fff");
              $(".agent_no_text").css("color","#e4509a");
              $("#agent-div-yes").css("background-color","#e4509a");
              $(".agent_yes_text").css("color","#fff");
              $("#agent_no_check_svg").hide();
              $("#agent_yes_check_svg").show();
              
              $("#agent-div-no").css("border-color","#edcadc");
              $("#agent-div-yes").removeClass("option-tab-a-hover");
              $("#agent-div-no").addClass("option-tab-a-selected-hover");
              $("#agent-div-yes").removeClass("option-tab-a-selected-hover");

            }


            function checkCOuntGOThirdSection() {
                sectionTwoTag = 1;
                $("#part1-travel-details-svg").css("display", "");
                $("#part1-travel-details-svg-error").css("display", "none");
            }

            function checkCOuntGOFourthSection(count) {
                sectionFourTag = 1;
                // $('html, body').animate({
                //     // scrollTop: $("#part1-promo").offset().top
                //     scrollTop: 2900
                // }, 1000);
            }
      });
    });
</script>
@include('ecommerce.itp.validation')
@endsection
