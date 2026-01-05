
@extends('layouts.ecommerce ')

@section('content')


<script type="text/javascript" src="{{ asset('/asset/ecommerce/hackguard/style.css') }}"></script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/hackguard/vars.css') }}"></script>
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
     @include('ecommerce.hackguard.title-page')
     @include('ecommerce.hackguard.process')
  </div>
  <form method="post" action="{{ route('hackguardsave') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" id="url" name="url" value="{{url('/')}}">

         <input type="hidden" name="hdn_package" id="hdn_package" value="">
    <input type="hidden" name="hdn_package_cyberbullying" id="hdn_package_cyberbullying" value="">

        <div class="content" style="z-index:1;">
        <div class="step">
                  @include('ecommerce.hackguard.hackguard_step_1')       
              </div>
              <div class="step">
                  @include('ecommerce.hackguard.hackguard_step_2')
              </div>
              <div class="step">
              @include('ecommerce.hackguard.packages.comparison_of_benefits')
              </div>
              <div class="step">
              
              @include('ecommerce.hackguard.hackguard_step_2_premium_breakdown')
              </div>
              <div class="step">
                @include('ecommerce.hackguard.hackguard_step_3')
              </div>
              <div class="step">
              @include('ecommerce.hackguard.hackguard_step_4')
              </div>
        </div>
        @include('ecommerce.hackguard.modal')
        @include('ecommerce.hackguard.hackguard-css')
        <input type="hidden" id="hdn_promo_type" name="hdn_promo_type" value="" autocomplete="off">
        <input type="hidden" id="hdn_promo_amount" name="hdn_promo_amount" value="" autocomplete="off">
        <input type="hidden" id="hdn_promo_tag" name="hdn_promo_tag" value="" autocomplete="off">
      
        <!-- <input type="hidden" id="hdn_agent_tag" name="hdn_agent_tag" value="" autocomplete="off">
        <input type="hidden" name="utm_source" id="utm_source" value="{{$utm_source}}">
        <input type="hidden" name="utm_medium" id='utm_medium' value="{{$utm_medium}}">  -->
  @php
    $type = 'cyber_ultra';
@endphp

<input type="hidden" name="hdn_original_premium_{{ $type }}" id="hdn_original_premium_{{ $type }}">
<input type="hidden" name="hdn_dst_{{ $type }}" id="hdn_dst_{{ $type }}">
<input type="hidden" name="hdn_premtax_{{ $type }}" id="hdn_premtax_{{ $type }}">
<input type="hidden" name="hdn_lgt_{{ $type }}" id="hdn_lgt_{{ $type }}">
<input type="hidden" name="hdn_due_premium_{{ $type }}" id="hdn_due_premium_{{ $type }}">

</form>
  
  @if (Agent::isMobile())
    <style>
      .select-one-title{
        font-size:12px;
      }
        #trip-quotation {
    padding-left: 0px !important;
}
      .date-picker-bday {
            z-index: 1080 !important;
        }
      #piso-cyber-ultra-premium,
      #dollar-cyber-ultra-premium,
      #piso-cyber-prime-premium,
      #dollar-cyber-prime-premium,
      #piso-cyber-pro-premium,
      #dollar-cyber-pro-premium,
      #piso-cyber-max-premium,
      #dollar-cyber-max-premium{
        font-size: 24px;
        font-family: 'Inter', sans-serif !important;
      }
    .browse-upload-button,
    .browse-upload-button-delete {
        font-size:10px ;
    }
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
      z-index: 1060 !important; 
       overflow-y: auto !important;
  -webkit-overflow-scrolling: touch;
}
      
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
      .subamount-quote-font,
      .amount-quote-font{
        color: #2d2727 !important;
        text-align: left !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        position: relative !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
         font-family: 'Inter', sans-serif !important;
      }

      .summary-computation-list{
        color: #2d2727 !important;
        text-align: left !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        position: relative !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
         font-family: 'Inter', sans-serif !important;
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
          font-size: 15px;
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
          .accordion {
        cursor: pointer;
        padding: 15px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: background-color 0.3s;
    }

    .panel {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .accordion.active {
        background-color: #F7FFFF !important;
    }
    </style>
  @else
   <style>
      #piso-cyber-ultra-premium,
      #dollar-cyber-ultra-premium,
      #piso-cyber-prime-premium,
      #dollar-cyber-prime-premium,
      #piso-cyber-pro-premium,
      #dollar-cyber-pro-premium,
      #piso-cyber-max-premium,
      #dollar-cyber-max-premium{
        font-size: 30px;
        font-family: 'Inter', sans-serif !important;
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
     .browse-upload-button,
    .browse-upload-button-delete {
        margin-bottom: 10px;
        font-size:16px;
    }
        .select-one-title{
        font-size:14px;
      }
     .accordion {
        cursor: pointer;
        padding: 15px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: background-color 0.3s;
    }

    .panel {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .accordion.active {
        background-color: #F7FFFF !important;
    }
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
.subamount-quote-font {
  color: #2d2727 !important;
  font-weight: 700 !important;
  font-size: 14px !important;
  text-align: right !important;
  display: block;
}

.summary-computation-list {
  color: #2d2727 !important;
  font-size: 14px !important;
  font-weight: 400 !important;
}

        .summary_title_header{
          color:  #2d2727;
          text-align: center;
          font-size: 26px;
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
      font-family: "Inter", sans-serif !important;
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
    z-index:98 !important
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
  .promo-code-package-view {
  font-size: 14px;
  margin-top: 5px;
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

.bootstrap-select .dropdown-menu {
    width: 100% !important;
    min-width: 100% !important;
    overflow-x: hidden;
}
.bootstrap-select .dropdown-menu.inner {
    max-height: 400px !important; 
    overflow-y: auto !important;
}

.bootstrap-select .bs-searchbox input {
    width: 100% !important;
    box-sizing: border-box;
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
      font-family: 'Inter', sans-serif !important;
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
  select.selectpicker {
    opacity: 0 !important;
    position: absolute !important;
    left: -9999px !important;
    pointer-events: none;
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


.toast-error {
    background-color: white !important;
    border: 2px solid #008080 !important;
    color: #008080 !important;
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
  
  $(document).ready(function() {
    $('#agent-div-no, #agent-div-yes').on('click', function() {
      const selectedId = $(this).data('id');

      if (selectedId === "agent_no") {
        $("#agent_id_div").hide();
        $("#agent-svg").show();
        $('input[name="hdn_agent_tag"]').val("No");
        $('#agent-name').val("");
        $("#agent-div-no").css("background-color", "#e4509a");
        $(".agent_no_text").css("color", "#fff");
        $("#agent-div-yes").css("background-color", "#fff");
        $(".agent_yes_text").css("color", "#edcadc");
        $("#agent_no_check_svg").show();
        $("#agent_yes_check_svg").hide();
        $("#agent-svg-error").hide();
        $("#agent-div-yes").css("border-color", "#edcadc");
        $("#agent-div-no").removeClass("option-tab-a-hover");
        $("#agent-div-yes").addClass("option-tab-a-selected-hover");
        $("#agent-div-no").removeClass("option-tab-a-selected-hover");
      }

      if (selectedId === "agent_yes") {
        $("#agent_id_div").show();
        $("#agent-svg").hide();
        $('input[name="hdn_agent_tag"]').val("Yes");
        $("#agent-div-no").css("background-color", "#fff");
        $(".agent_no_text").css("color", "#e4509a");
        $("#agent-div-yes").css("background-color", "#e4509a");
        $(".agent_yes_text").css("color", "#fff");
        $("#agent_no_check_svg").hide();
        $("#agent_yes_check_svg").show();
        $("#agent-div-no").css("border-color", "#edcadc");
        $("#agent-div-yes").removeClass("option-tab-a-hover");
        $("#agent-div-no").addClass("option-tab-a-selected-hover");
        $("#agent-div-yes").removeClass("option-tab-a-selected-hover");
      }
    });
  });

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
                clearInterval(interval); 
                setTimeout(() => {
                    $loadingBar.hide(); 
                    $fileInput.show(); 
                }, 500); 
            } else {
                progress += 10; 
                $loadingProgress.width(progress + '%'); 
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
      var birthdatetag = 0;
      var gendertag = 0;

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
        // Date of Birth Validation
$('#date-of-birth').on('input', function () {
    let val = $(this).val();
    if (val) {
        $(this).removeClass("invalid").addClass("valid");
        if (birthdatetag === 0) {
            birthdatetag++;
            sectionOne++;
        }
    } else {
        $(this).removeClass("valid").addClass("invalid");
        if (birthdatetag > 0) {
            birthdatetag = 0;
            sectionOne--;
        }
    }
    checkCOuntGOSection(sectionOne);
});

// Gender Validation
$('#gender').on('change input', function () {
    let val = $(this).val();
    if (val) {
        $(this).removeClass("invalid").addClass("valid");
        if (gendertag === 0) {
            gendertag++;
            sectionOne++;
        }
    } else {
        $(this).removeClass("valid").addClass("invalid");
        if (gendertag > 0) {
            gendertag = 0;
            sectionOne--;
        }
    }
    checkCOuntGOSection(sectionOne);
});

        function checkCOuntGOSection(count) {
          if(count>7){
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

      var sectionThree = 0;
      var destinationtag = 0;
      var destination_from_tag = 0;
      var destination_to_tag = 0;

      function checkCOuntFourSection(count) {
        if(count>2){
          sectionThreeTag = 1;
          // $('html, body').animate({
          //     // scrollTop: $("#part1-covid-cruise").offset().top
          //     scrollTop: 1950
          // }, 1000);
        }
      }

      // Premium Calculation
      function applyPromoToCyberPackages() {
    const promoCode = $('#promo').val();
    const promoType = $('input[name="hdn_promo_type"]').val(); // "P" or "F"
    const promoAmount = parseFloat($('input[name="hdn_promo_amount"]').val());
    const dollarRate = parseFloat($('input[name="hdn_dollar_rate"]').val());

    const isPromoDisabled = !promoCode || isNaN(promoAmount);

    const packages = [
        { id: 'basic_cyber_ultra', premium: 1062.39 },
        { id: 'cyber_ultra', premium: 1643.94 },
        { id: 'basic_cyber_prime', premium: 901.96 },
        { id: 'cyber_prime', premium: 1343.13 },
        { id: 'basic_cyberpro', premium: 601.16 },
        { id: 'cyberpro', premium: 781.64 },
        { id: 'basic_cybermax', premium: 701.43 },
        { id: 'cybermax', premium: 982.18 },
    ];

    packages.forEach(pkg => {
        const taxes = taxRates[pkg.id.startsWith('basic_') ? 'basic' : 'cyberbullying'][pkg.id];
        if (!taxes) {
            console.error("Missing tax config for", pkg.id);
            return;
        }

        const baseTotal = pkg.premium + taxes.dst + taxes.vat + taxes.lgt;
        let discount = 0;

        if (!isPromoDisabled) {
            if (promoType === "P") {
                discount = (baseTotal * promoAmount) / 100;
            } else {
                discount = promoAmount;
            }
        }

        const finalTotal = Math.max(0, baseTotal - discount);

        $(`#hdn_original_premium_${pkg.id}`).val(pkg.premium.toFixed(2));
        $(`#hdn_dst_${pkg.id}`).val(taxes.dst.toFixed(2));
        $(`#hdn_premtax_${pkg.id}`).val(taxes.vat.toFixed(2));
        $(`#hdn_lgt_${pkg.id}`).val(taxes.lgt.toFixed(2));
        $(`#hdn_due_premium_${pkg.id}`).val(finalTotal.toFixed(2));

        // Update display
       const formattedFinal = "₱ " + ReplaceNumberWithCommas(finalTotal.toFixed(2));

switch (pkg.id) {
    case 'basic_cyber_ultra':
        $('#dollar-cyber-ultra-premium').text(formattedFinal);
        $('.dollar-cyber-ultra-premium').text(formattedFinal); 
        break;
    case 'cyber_ultra':
        $('#piso-cyber-ultra-premium').text(formattedFinal);
        $('.piso-cyber-ultra-premium').text(formattedFinal);
        break;
    case 'basic_cyber_prime':
        $('#dollar-cyber-prime-premium').text(formattedFinal);
        $('.dollar-cyber-prime-premium').text(formattedFinal);
        break;
    case 'cyber_prime':
        $('#piso-cyber-prime-premium').text(formattedFinal);
        $('.piso-cyber-prime-premium').text(formattedFinal);
        break;
    case 'basic_cyberpro':
        $('#dollar-cyber-pro-premium').text(formattedFinal);
        $('.dollar-cyber-pro-premium').text(formattedFinal);
        break;
    case 'cyberpro':
        $('#piso-cyber-pro-premium').text(formattedFinal);
        $('.piso-cyber-pro-premium').text(formattedFinal);
        break;
    case 'basic_cybermax':
        $('#dollar-cyber-max-premium').text(formattedFinal);
        $('.dollar-cyber-max-premium').text(formattedFinal);
        break;
    case 'cybermax':
        $('#piso-cyber-max-premium').text(formattedFinal);
        $('.piso-cyber-max-premium').text(formattedFinal);
        break;
}


       console.log("Original Premium:", $('#hdn_original_premium_cybermax').val());
console.log("DST:", $('#hdn_dst_cybermax').val());
console.log("VAT:", $('#hdn_premtax_cybermax').val());
console.log("LGT:", $('#hdn_lgt_cybermax').val());
console.log("Total Due:", $('#hdn_due_premium_cybermax').val());

    });
}


const taxRates = {
    basic: {
        basic_cyberpro:     { dst: 75.50, vat: 72.14, lgt: 1.20 },
        basic_cybermax:     { dst: 88.00, vat: 84.17, lgt: 1.40 },
        basic_cyber_prime: { dst: 113.00, vat: 108.24, lgt: 1.80 },
        basic_cyber_ultra: { dst: 133.00, vat: 127.49, lgt: 2.12 }
    },
    cyberbullying: {
        cyberpro:     { dst: 98.00, vat: 93.80, lgt: 1.56 },
        cybermax:     { dst: 123.00, vat: 117.86, lgt: 1.96 },
        cyber_prime:  { dst: 168.00, vat: 161.18, lgt: 2.69 },
        cyber_ultra:  { dst: 205.50, vat: 197.27, lgt: 3.29 }
    }
};

  function calculateTaxesAndSetFields(premium, type, promoType, promoAmount, promoCode) {
      const taxType = type.startsWith('basic') ? 'basic' : 'cyberbullying';
      const taxes = taxRates[taxType][type];

      if (!taxes) {
          console.error("Tax configuration missing for type:", type);
          return;
      }

      const baseTotal = parseFloat(premium) + taxes.dst + taxes.vat + taxes.lgt;

      let discount = 0;
      if (promoType && !isNaN(promoAmount)) {
          if (promoType === "P") {
              discount = (baseTotal * promoAmount) / 100;
          } else {
              discount = promoAmount;
          }
      }

      const finalTotal = Math.max(0, baseTotal - discount);

      $(`#hdn_original_premium_${type}`).val(parseFloat(premium).toFixed(2));
      $(`#hdn_dst_${type}`).val(taxes.dst.toFixed(2));
      $(`#hdn_premtax_${type}`).val(taxes.vat.toFixed(2));
      $(`#hdn_lgt_${type}`).val(taxes.lgt.toFixed(2));
      $(`#hdn_due_premium_${type}`).val(finalTotal.toFixed(2));

    $('.quote_netprem_dollar').text("₱ " + ReplaceNumberWithCommas(parseFloat(premium).toFixed(2)));
    $('.quote_dst_dollar').text("₱ " + ReplaceNumberWithCommas(taxes.dst.toFixed(2)));
    $('.quote_prem_tax_dollar').text("₱ " + ReplaceNumberWithCommas(taxes.vat.toFixed(2)));
    $('.quote_lgt_dollar').text("₱ " + ReplaceNumberWithCommas(taxes.lgt.toFixed(2)));
    $('.quote_prem_dollar').text("₱ " + ReplaceNumberWithCommas(finalTotal.toFixed(2)));
    $('.quotation-promo-details').text("- ₱ " + ReplaceNumberWithCommas(discount.toFixed(2)));

      console.log(`========== ${type.toUpperCase()} PREMIUM ==========`);  
      console.log("Base Premium:", parseFloat(premium).toFixed(2));
      console.log("DST:", taxes.dst.toFixed(2));
      console.log("VAT:", taxes.vat.toFixed(2));
      console.log("LGT:", taxes.lgt.toFixed(2));
      console.log("Promo Discount Applied:", discount.toFixed(2));
      console.log("Total Due Premium (after promo):", finalTotal.toFixed(2));
      
  }
    const planMapping = {
        'cyber-ultra': {
            'Premium (Taxes Included)': { premium: 1062.39, field: 'basic_cyber_ultra' },
            'Premium with Cyberbullying (Taxes Included)': { premium: 1643.94, field: 'cyber_ultra' }
        },
        'cyber-prime': {
            'Premium (Taxes Included)': { premium: 901.96, field: 'basic_cyber_prime' },
            'Premium with Cyberbullying (Taxes Included)': { premium: 1343.13, field: 'cyber_prime' }
        },
        'cyber-pro': {
            'Premium (Taxes Included)': { premium: 601.16, field: 'basic_cyberpro' },
            'Premium with Cyberbullying (Taxes Included)': { premium: 781.64, field: 'cyberpro' }
        },
        'cyber-max': {
            'Premium (Taxes Included)': { premium: 701.43, field: 'basic_cybermax' },
            'Premium with Cyberbullying (Taxes Included)': { premium: 982.18, field: 'cybermax' }
        }
    };

    $('.selectable-option').on('click', function () {
    const premiumId = $(this).find('.value, .price').attr('id') || '';
    const cyberbullying = $(this).data('cyberbullying'); // "yes" or "no"
    const selectedId = $(this).data('id'); // "CyberMax", etc.

    let keyMatch = Object.keys(planMapping).find(key => premiumId.toLowerCase().includes(key));

    if (!keyMatch) {
        console.log('No matching plan key found from ID:', premiumId);
        return;
    }

    const labelText = cyberbullying === "yes"
        ? "Premium with Cyberbullying (Taxes Included)"
        : "Premium (Taxes Included)";

    if (!planMapping[keyMatch][labelText]) {
        console.log('No matching plan label found for:', keyMatch, labelText);
        return;
    }

    const selected = planMapping[keyMatch][labelText];

    $('#hdn_package').val(keyMatch);
    $('#hdn_package_cyberbullying').val(cyberbullying);
    $('.promo-code-package-view').hide(); 

const selectedPromoDiv = $(`#promo-div-${selected.field}`);
const promoAmount = parseFloat($('input[name="hdn_promo_amount"]').val());
const promoType = $('input[name="hdn_promo_type"]').val(); 
const promoCode = $('#promo').val();

if (!isNaN(promoAmount) && promoCode) {
    const taxes = taxRates[selected.field.startsWith('basic') ? 'basic' : 'cyberbullying'][selected.field];
    const premium = parseFloat(selected.premium);
    const baseTotal = premium + taxes.dst + taxes.vat + taxes.lgt;

    let discount = 0;
    if (promoType === "P") {
        discount = (baseTotal * promoAmount) / 100;
    } else {
        discount = promoAmount;
    }

    if (discount > 0) {
        selectedPromoDiv.show().html(`
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <div><strong>Promo code: ${promoCode}</strong></div>&nbsp;&nbsp;
                <div style="color: red; font-weight: 700;">- ₱${ReplaceNumberWithCommas(discount.toFixed(2))}</div>
            </div>`);
    }
  }

calculateTaxesAndSetFields(selected.premium, selected.field, promoType, promoAmount, promoCode);

    if (selected.field === 'cyber_ultra') {
        $.ajax({
            url: $('input[name="url"]').val() + '/get-quote/hackguard/calculate-premium-breakdown',
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                premium: selected.premium
            },
            success: function (response) {
                $(`#hdn_original_premium_${selected.field}`).val(response.original_premium);
                $(`#hdn_dst_${selected.field}`).val(response.dst);
                $(`#hdn_premtax_${selected.field}`).val(response.premtax);
                $(`#hdn_lgt_${selected.field}`).val(response.lgt);
                $(`#hdn_due_premium_${selected.field}`).val(response.due_premium);

                
                let idPart = selected.field.replace('basic_', '').replace('_', '-');
                const isBasic = selected.field.startsWith('basic');
                const targetId = (isBasic ? '#dollar-' : '#piso-') + idPart + '-premium';
                $(targetId).text("₱ " + ReplaceNumberWithCommas(parseFloat(response.due_premium).toFixed(2)));

                console.log("AJAX update complete for:", selected.field);
            }
        });
    }
});

    $('#promo').on('input', function () {
    applyPromoToCyberPackages();
});
function ReplaceNumberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

      $('#promo').on('input', function() {
              var input=$(this);
              var is_promo=input.val();
              if(is_promo){
                console.log($('input[name="url"]').val());
                  $.ajax({
                    url:  $('input[name="url"]').val() + '/get-quote/hackguard/get-promo',
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
                                    applyPromoToCyberPackages();
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
      $("#promo-div-no").on("click", function () {
    $("#part1-promo").css("display", "none");
    $("#promo-div-no").css("background-color", "#e4509a");
    $(".no_promo_text").css("color", "#fff");
    $("#promo-div-yes").css("background-color", "#fff");
    $(".yes_promo_text").css("color", "#edcadc");
    $("#promo_no_check_svg").show();
    $("#promo_yes_check_svg").hide();
    $('input[name="hdn_promo_tag"]').val("No");
    $("#first_next").prop("disabled", false);

    $("#promo-div-yes").css("border-color", "#edcadc");
    $("#promo-div-no").removeClass("option-tab-a-hover");
    $("#promo-div-yes").addClass("option-tab-a-selected-hover");
    $("#promo-div-no").removeClass("option-tab-a-selected-hover");

    $("#part1-promo-svg-error").css("display", "none");
    $("#part1-promo-svg-success").css("display", "");

    // Clear promo code  
    $("#promo").val("");
    $('input[name="hdn_promo_type"]').val("");
    $('input[name="hdn_promo_amount"]').val("");
    applyPromoToCyberPackages();

    [
        'basic_cyber_ultra', 'cyber_ultra',
        'basic_cyber_prime', 'cyber_prime',
        'basic_cyberpro', 'cyberpro',
        'basic_cybermax', 'cybermax'
    ].forEach(pkgId => {
        $(`#promo-div-${pkgId}`).hide().html("");
    });

    Object.keys(planMapping).forEach(groupKey => {
        const group = planMapping[groupKey];
        Object.values(group).forEach(option => {
            const { premium, field } = option;
            calculateTaxesAndSetFields(premium, field, "", 0, ""); // No promo
        });
    });

    if ($('input[name="hdn_covid_tag"]').val()) {
        checkCOuntGOFourthSection();
    }
    const defaultSelectedId = "CyberUltra";
    const $defaultPackage = $(`.package-option[data-id='${defaultSelectedId}']`);

    if ($defaultPackage.length) {
      $defaultPackage.trigger("click");
    }
    });


  $("#promo-div-yes").on("click", function () {
    $("#part1-promo").css("display", "");
    $("#promo-div-no").css("background-color", "#fff");
    $(".no_promo_text").css("color", "#edcadc");
    $("#promo-div-yes").css("background-color", "#e4509a");
    $(".yes_promo_text").css("color", "#fff");
    $("#promo_no_check_svg").hide();
    $("#promo_yes_check_svg").show();
    $("#part1-promo-svg").css("display", "");
    $('input[name="hdn_promo_tag"]').val("Yes");

    $("#promo").val("");
    $("#promo").removeClass("invalid valid");
    $("#error-promo-code").hide();
    $("#success-promo-code").hide();
    $("#first_next").prop("disabled", true);

    $("#promo-div-no").css("border-color", "#edcadc");
    $("#promo-div-yes").removeClass("option-tab-a-hover");
    $("#promo-div-no").addClass("option-tab-a-selected-hover");
    $("#promo-div-yes").removeClass("option-tab-a-selected-hover");

    $("#part1-promo-svg-error").css("display", "none");
    $("#part1-promo-svg-success").css("display", "none");

    if ($('input[name="hdn_covid_tag"]').val()) {
      checkCOuntGOFourthSection();
    }
        const defaultSelectedId = "CyberUltra";
    const $defaultPackage = $(`.package-option[data-id='${defaultSelectedId}']`);

    if ($defaultPackage.length) {
      $defaultPackage.trigger("click");
    }
  });
     $("#promo").on("input", function () {
  const isPromoYes = $('input[name="hdn_promo_tag"]').val() === "Yes";

  if (isPromoYes) {
    const defaultSelectedId = "CyberUltra";
    const $defaultPackage = $(`.package-option[data-id='${defaultSelectedId}']`);

    if ($defaultPackage.length) {
      $defaultPackage.trigger("click");
    }
  }
});

      var idselect = "";
      $(".package-option").click(function(e) {
         var selectedId = $(this).data("id");

        $('.quote-page-selected-promo').text(selectedId);

        let amount = '';
        if (selectedId === "CyberUltra") {
            amount = "₱150,000.00";
        } else if (selectedId === "CyberPrime") {
            amount = "₱100,000.00";
        } else if (selectedId === "CyberPro") {
            amount = "₱25,000.00";
        } else if (selectedId === "CyberMax") {
            amount = "₱50,000.00";
        }

        $('.summary-electronic').text(amount);   // Electronic Fund Transfer
        $('.summary-fraud').text(amount);    // Online Retail Fraud
        $('.summary-theft').text(amount);      // Identity Theft
        $("#selected-confirmation-container").hide();

    $(".package-selected-button-get-plan").addClass("btn-arrow-icon form-control").css("border", "1px solid #008080");
    $(".card-package").removeClass("package-selected");
    $(".package-selected-button-get-plan").removeClass("package-selected-button-get-plan-selected").html("Get Plan");
    $(".svg_check_package").hide();
    $("#div-choose-package-mobile").show();
    $("#selected-premium-details").hide(); 

    // Set selected package
    const selected = $(this);
    selected.find(".card-package").addClass("package-selected");
    selected.find(".svg_check_package").show();
    selected.find(".package-selected-button-get-plan")
        .addClass("package-selected-button-get-plan-selected")
        .removeClass("btn-arrow-icon form-control")
        .css("border", "1px solid #e4509a")
        .html("Plan selected");

   
      $(".selected-premium-details").hide();

      selected.find(".selected-premium-details").show();


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
        $('#hdn_package_cyberbullying').val('');
        $(".selectable-option").removeClass("selected-option active").find("label").hide(); 

        checkPackageContinueEligibility();
        var netprem = $(this).find('input[class="prem"]').val();
        var dst = $(this).find('input[class="dst"]').val();
        $(".quote_prem_piso").text($(this).find( ".package-piso-premium").html());
        $(".quote_success_display").text($(this).find( ".package-dollar-premium").html()+" / "+$(this).find( ".package-piso-premium").html());
        if($("#promo").val()){
          $(".div-promo-quotation-tab").css("display", "");
          $(".quotation-promo-div").css("display", "");
          var promo_amount_less = $(this).find('input[class="promo_less"]').val();
          var due_premium = $(this).find('input[class="due_premium"]').val();
          var total = $(this).find('input[class="total"]').val();
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
       
        function checkPackageContinueEligibility() {
        const selectedId = $("#hdn_package").val()?.trim();
        const cyberbullying = $("#hdn_package_cyberbullying").val()?.trim();

        if (selectedId && cyberbullying) {
            $('#package_continue').prop('disabled', false).removeAttr('disabled');
            console.log("Continue enabled");
        } else {
            $('#package_continue').prop('disabled', true);
            console.log(" Continue disabled");
        }
    }

    let idselect = null;

    $(document).off("click", ".selectable-option").on("click", ".selectable-option", function () {

      if ($(this).hasClass("more-package-column")) {
        return;
    }

    $(".svg_check_type1, .svg_check_type2").hide();
    $(".selectable-option").removeClass("selected-option active");

    $(this).find("label").show();
    $(this).addClass("selected-option active");

    $("#selected-product-details").show();
    $("#div-choose-package-mobile").show();
    $(".selected-premium-details").hide();

    const selectedId = $(this).data("id");
    const cyberbullying = $(this).data("cyberbullying");
    const amountText = $(this).find(".value").text().trim();
    const amount = parseFloat(amountText.replace(/[^\d.]/g, ''));

    $("#hdn_package").val(selectedId);
    $("#hdn_package_cyberbullying").val(cyberbullying);
    console.log("hdn_package:", $("#hdn_package").val());
    console.log("hdn_package_cyberbullying:", $("#hdn_package_cyberbullying").val());
    checkPackageContinueEligibility();

    $(".quote_success_display").text("₱ " + ReplaceNumberWithCommas(amount.toFixed(2)));
    $(".summary-cyberbullying").text(cyberbullying === 'yes' ? 'Yes' : 'No');

    if (idselect !== selectedId + cyberbullying) {
        idselect = selectedId + cyberbullying;

        toastr.options = {
            timeOut: 5000,
            preventDuplicates: true,
            closeButton: true,
            progressBar: true,
            newestOnTop: true,
            allowHtml: true
        };
        toastr.clear();
        $("#selected-confirmation-container").show();
        toastr.success(
            `You have selected <b>${selectedId}</b> Premium with amount of <b>${amountText}</b>.`,
            `${selectedId} Premium Selected!`
        );
    }
});
function checkApplyContinue() {
    const selectedId = $("#hdn_package").val()?.trim();
    const cyberbullying = $("#hdn_package_cyberbullying").val()?.trim();

    console.log("checkApplyContinue:");
    console.log("selectedId:", selectedId);
    console.log("cyberbullying:", cyberbullying);

    if (selectedId && (cyberbullying === "yes" || cyberbullying === "no")) {
        $('#apply_plan_next').prop('disabled', false);
        // console.log("Continue enabled");
    } else {
        $('#apply_plan_next').prop('disabled', true);
        // console.log("Continue disabled");
    }
}

const taxRates = {
    basic: {
        basic_cyberpro:     { dst: 75.50, vat: 72.14, lgt: 1.20 },
        basic_cybermax:     { dst: 88.00, vat: 84.17, lgt: 1.40 },
        basic_cyber_prime: { dst: 113.00, vat: 108.24, lgt: 1.80 },
        basic_cyber_ultra: { dst: 133.00, vat: 127.49, lgt: 2.12 }
    },
    cyberbullying: {
        cyberpro:     { dst: 98.00, vat: 93.80, lgt: 1.56 },
        cybermax:     { dst: 123.00, vat: 117.86, lgt: 1.96 },
        cyber_prime:  { dst: 168.00, vat: 161.18, lgt: 2.69 },
        cyber_ultra:  { dst: 205.50, vat: 197.27, lgt: 3.29 }
    }
};
const idMap = {
    CyberUltra: "cyber_ultra",
    CyberPrime: "cyber_prime",
    CyberPro: "cyberpro",
    CyberMax: "cybermax"
};
const packages = [
    { id: 'basic_cyber_ultra', premium: 1062.39 },
    { id: 'cyber_ultra', premium: 1643.94 },
    { id: 'basic_cyber_prime', premium: 901.96 },
    { id: 'cyber_prime', premium: 1343.13 },
    { id: 'basic_cyberpro', premium: 601.16 },
    { id: 'cyberpro', premium: 781.64 },
    { id: 'basic_cybermax', premium: 701.43 },
    { id: 'cybermax', premium: 982.18 },
];


function calculateTaxesAndSetFields(type, promoType, promoAmount, promoCode) {
    const pkg = packages.find(p => p.id === type);
    if (!pkg) {
        console.error("Package not found for:", type);
        return;
    }

    const premium = pkg.premium;
    const taxType = type.startsWith('basic') ? 'basic' : 'cyberbullying';
    const taxes = taxRates[taxType][type];

    const baseTotal = parseFloat(premium) + taxes.dst + taxes.vat + taxes.lgt;

     let discount = 0;
    if (promoType && !isNaN(promoAmount)) {
        if (promoType === "P") {
            discount = (baseTotal * promoAmount) / 100;
        } else {
            discount = promoAmount;
        }
    }

      const finalTotal = Math.max(0, baseTotal - discount);

      $(`#hdn_original_premium_${type}`).val(parseFloat(premium).toFixed(2));
      $(`#hdn_dst_${type}`).val(taxes.dst.toFixed(2));
      $(`#hdn_premtax_${type}`).val(taxes.vat.toFixed(2));
      $(`#hdn_lgt_${type}`).val(taxes.lgt.toFixed(2));
      $(`#hdn_due_premium_${type}`).val(finalTotal.toFixed(2));

    $('.quote_netprem_dollar').text("₱ " + ReplaceNumberWithCommas(parseFloat(premium).toFixed(2)));
    $('.quote_dst_dollar').text("₱ " + ReplaceNumberWithCommas(taxes.dst.toFixed(2)));
    $('.quote_prem_tax_dollar').text("₱ " + ReplaceNumberWithCommas(taxes.vat.toFixed(2)));
    $('.quote_lgt_dollar').text("₱ " + ReplaceNumberWithCommas(taxes.lgt.toFixed(2)));
    $('.quote_prem_dollar').text("₱ " + ReplaceNumberWithCommas(finalTotal.toFixed(2)));
    $('.quotation-promo-details').text("- ₱ " + ReplaceNumberWithCommas(discount.toFixed(2)));

        if (discount > 0) {
        $('.quotation-promo-div').show();
    } else {
        $('.quotation-promo-div').hide();
    }
      console.log(`========== ${type.toUpperCase()} PREMIUM ==========`);  
      console.log("Base Premium:", parseFloat(premium).toFixed(2));
      console.log("DST:", taxes.dst.toFixed(2));
      console.log("VAT:", taxes.vat.toFixed(2));
      console.log("LGT:", taxes.lgt.toFixed(2));
      console.log("Promo Discount Applied:", discount.toFixed(2));
      console.log("Total Due Premium (after promo):", finalTotal.toFixed(2));
      
  }
let idselectmore = "";

$(document).off("click", ".more-package-column.selectable-option").on("click", ".more-package-column.selectable-option", function () {
  $("#selected-product-more-details").show();
    const selectedId = $(this).data("id"); // Cyber packages
    const cyberbullying = $(this).data("cyberbullying"); // yes / no
    const amountText = $(this).find(".price").text().trim();
    const promoType = $('input[name="hdn_promo_type"]').val();
const promoAmount = parseFloat($('input[name="hdn_promo_amount"]').val()) || 0;
const promoCode = $('#promo').val();

    const premium = parseFloat(amountText.replace(/[^\d.]/g, ''));
   const snakeCaseId = idMap[selectedId];
if (!snakeCaseId) {
    console.error("Missing ID mapping for selected package:", selectedId);
    return;
}

const lookupKey = cyberbullying === "yes" ? snakeCaseId : `basic_${snakeCaseId}`;

    $(".more-package-column.selectable-option").removeClass("selected-option active");
    $(".svg_check_type1, .svg_check_type2").hide();

    $(this).addClass("selected-option active");
    $(this).find(cyberbullying === "yes" ? ".svg_check_type2" : ".svg_check_type1").first().show();

    $("#hdn_package").val(selectedId);
    $("#hdn_package_cyberbullying").val(cyberbullying);
    checkApplyContinue();

    $(".quote_success_display").text("₱ " + ReplaceNumberWithCommas(premium.toFixed(2)));
    $(".summary-cyberbullying").text(cyberbullying === 'yes' ? 'Yes' : 'No');

    if (idselectmore !== selectedId + cyberbullying) {
        idselectmore = selectedId + cyberbullying;
        toastr.clear();
        $("#selected-confirmation-container").show();
        toastr.success(
            `You have selected <b>${selectedId}</b> Premium with amount of <b>${amountText}</b>.`,
            `${selectedId} Premium Selected!`
        );
    }
    calculateTaxesAndSetFields( lookupKey, promoType, promoAmount, promoCode);
});


        $('.quote-page-selected-promo').text($(this).data("id"));
        if ($(this).data("id") == "CyberUltra"){
            $(".more-package-option-cyber-ultra" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-cyber-ultra" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-cyber-ultra" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-cyber-ultra" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

        }else if ($(this).data("id") == "CyberPro"){
            $(".more-package-option-cyberpro" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-cyberpro" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-cyberpro" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-cyberpro" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

        }else if ($(this).data("id") == "CyberMax"){

            $(".more-package-option-cybermax" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-cybermax" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-cybermax" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-cybermax" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

        }else{
            $(".more-package-option-cyber-prime" ).find( ".pt__item").addClass("package-selected");
            $(".more-package-option-cyber-prime" ).find( ".svg_check_more_package").css("display", "");
            $(".more-package-option-cyber-prime" ).find( ".more-package-select").html("Selected");
            $(".more-package-option-cyber-prime" ).find( ".more-package-select").addClass("package-selected-button-get-plan-selected");

        }
      }); 
      var idselectmore = "";
      
      $(".more-package-option").click(function(e) {
      $("#selected-product-more-details").hide();
      $('#apply_plan_next').prop('disabled', true);
      $(".svg_check_more_package").css("display", "none");

    $(".more-package-option .pt__item").removeClass("package-selected");
    $(".more-package-option .more-package-select")
        .removeClass("package-selected-button-get-plan-selected btn-arrow-icon")
        .addClass("btn-arrow-icon")
        .html("Select");

    $(".selectable-option").removeClass("selected-option active").find("label").hide();
    $("#hdn_package_cyberbullying").val("");

    //Set selected package
    $(this).find(".pt__item").addClass("package-selected");
    $(this).find(".svg_check_more_package").css("display", "");
    $(this).find(".more-package-select")
        .removeClass("btn-arrow-icon")
        .addClass("package-selected-button-get-plan-selected")
        .html("Selected")
        .css("width", "100%");

    $('input[name="hdn_package"]').val($(this).data("id"));
    $('.quote-page-selected-promo').text($(this).data("id"));
    $('#package_continue').prop('disabled', false);

    $(".package-option").find(".card-package").removeClass("package-selected");
    $(".package-option").find(".package-selected-button-get-plan").removeClass("package-selected-button-get-plan-selected").html("Get Plan");
    $(".svg_check_package").css("display", "none");

    const id = $(this).data("id").toLowerCase();
    $('#div-package-' + id).find(".card-package").addClass("package-selected");
    $('#div-package-' + id).find(".svg_check_package").css("display", "");
    $('#div-package-' + id).find(".package-selected-button-get-plan").addClass("package-selected-button-get-plan-selected").html("Plan selected");

    // Premium value updates
    var netprem = $('#div-package-' + id).find('input[class="prem"]').val();
    var dst = $('#div-package-' + id).find('input[class="dst"]').val();
    $(".quote_prem_piso").text($('#div-package-' + id).find(".package-piso-premium").html());

    // Promo logic
    if ($("#promo").val()) {
        $(".div-promo-quotation-tab").css("display", "");
        $("#quotation-promo-div").css("display", "");
        var promo_amount_less = $('#div-package-' + id).find('input[class="promo_less"]').val();
        var due_premium = $('#div-package-' + id).find('input[class="due_premium"]').val();
        var total = $('#div-package-' + id).find('input[class="total"]').val();
        $(".premium-original-price").text("$" + parseFloat(due_premium).toFixed(2));
        $(".premium-discounted-price").text("$" + parseFloat(total).toFixed(2));
    } else {
        $(".div-promo-quotation-tab").css("display", "none");
        $("#quotation-promo-div").css("display", "none");
    }
});

      function ReplaceNumberWithCommasPage1(yourNumber) {
        var n= yourNumber.toString().split(".");
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return n.join(".");
      }

      //third page validation
      var sectionFiveTag = 0;
      var sectionFive = 0;
      var sectionSixTag = 0;
      var sectionSix = 0;
      var sectionSix_section1 = 0;
      var sectionSix_section2 = 0;
      var id_type_tag = 0;
      var id_no_tag = 0;
      
    jQuery('#country').change(function () {
    const selectedCountry = jQuery(this).val();

    if (selectedCountry === 'PH') {
        jQuery('#region').html(jQuery('#region').data('options'));
    } else {
        jQuery('#region').html('<option selected value="">Select</option>');
    }
    jQuery('#region').selectpicker('refresh');

    const $btnGroup = jQuery(this).closest('.btn-group');
    const $button = $btnGroup.find('button');

    if (selectedCountry) {
        $button.removeClass('invalid-select').addClass('valid-select');
        $btnGroup.removeClass('invalid-select').addClass('valid-select');
        jQuery(this).removeClass('invalid').addClass('valid');
        jQuery(this).find('option').css('color', '#212529');
    } else {
        $button.addClass('invalid-select').removeClass('valid-select');
        $btnGroup.addClass('invalid-select').removeClass('valid-select');
        errorPage2 = 1;
    }
});

jQuery(document).ready(function () {
    jQuery('#region').data('options', jQuery('#region').html());

    if (jQuery('#country').val() !== 'PH') {
        jQuery('#region').html('<option selected value="">Select</option>');
        jQuery('#region').selectpicker('refresh');
    }
});


      jQuery('#region').change(function(){
          if(jQuery(this).val() != '')
          {
            jQuery.ajax({
                  url:$('input[name="url"]').val() + '/hackguard/province/get',
                    method:"GET",
                    data:{ _token:jQuery('input[name="_token"]').val(),region:jQuery(this).val()},
                    success:function(result)
                    {
                      jQuery('#province').empty();
                        $('#province').append($('<option>', {
                          value: "",
                          text : "Select"
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
      $('#province').change(function() {
      let selectedProvince = $(this).val();
      if (selectedProvince) {
          $.ajax({
              url: $('input[name="url"]').val() + '/hackguard/city/get',
              method: 'GET',
              data: {
                  _token: $('input[name="_token"]').val(),
                  province: selectedProvince
              },
              success: function(result) {
                  let $city = $('#city');
                  $city.empty(); 
                  $city.append('<option selected value="">Select</option>');

                  if (result.length > 0) {
                      $.each(result, function(index, item) {
                          $city.append('<option value="' + item.city + '">' + item.city + '</option>');
                      });
                  } else {
                      $city.append('<option value="">No cities found</option>');
                  }

                  $city.selectpicker('refresh'); 
              },
          });
      }
  });

      jQuery('#city').change(function(){
          if(jQuery(this).val() != '')
          {
              jQuery.ajax({
                  url:$('input[name="url"]').val() + '/hackguard/barangay/get',
                    method:"GET",
                    data:{ _token:jQuery('input[name="_token"]').val(),city:jQuery(this).val()},
                    success:function(result)
                    {
                        jQuery('#barangay').empty();
                        $('#barangay').append($('<option>', {
                          value: "",
                          text : "Select"
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

      var idsection = 0;

      $("#modal-fileupload-close").click(function(e){
        $("#modal-fileupload").hide();
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

$('#file-upload-id').change(function(event) {
    const file = event.target.files[0];

    if (!file) return;

    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    if (!allowedTypes.includes(file.type)) {
        toastr.error("Please upload a valid image file (JPG, JPEG, PNG, WEBP).", "Invalid File Type", {
            positionClass: "toast-top-right",
            timeOut: 3000
        });
        $('#file-upload-id').val('');
        $('.filename-id').text('');
        $('.upload-file-name').val('');
        $('.upload-file-name').text('');
        return;
    }

    const fileSize = file.size;
    const sizeInMB = (fileSize / (1024 * 1024)).toFixed(2);

    if (fileSize > 5 * 1024 * 1024) {
        toastr.error("The file size exceeds the 5MB limit.", "File Size Exceeded", {
            positionClass: "toast-top-right",
            timeOut: 3000
        });
        $('#file-upload-id').val('');
        $('.filename-id').text('');
        $('.upload-file-name').val('');
        $('.upload-file-name').text('');
        return;
    }

    const sizeInKB = (fileSize / 1024).toFixed(2); 
    var filename = $('#file-upload-id').val().split('\\').pop();
    $('.filename-id').text(sizeInKB + "KB");
    $('.upload-file-name').val(filename);
    $('.upload-file-name').text(filename);

    readURL(this);

    $('#id-view-image').prop('display', 'none');
    $('#btn-upload-id-delete').prop('disabled', false);
    $('#browse-with-file').css('display', "");
    $('#browse-button').css('display', "none");

    if (uploadcount == 0) {
        uploadcount++;
        sectionSix_section2++;
        idsection++;
    }

    checkUploadFileSection(idsection);
});


var clickid = 0;
$(".browse-upload-button").click(function(e){
    $("#modal-fileupload").show();
    $('#id-view-image').css("display", "");
});

function checkUploadFileSection(count) {
    if($('#id_no').val() == "" || $('#id_type').val() == "" || $('#file-upload-id').get(0).files.length == 0){
        $("#identification_svg").css("display", "none");
        //$("#identification_svg_error").css("display", "");
    } else {
        $("#identification_svg").css("display", "");
        $("#identification_svg_error").css("display", "none");
    }
}


      sectionSSeven = 0;
      sectionSSeven_tag = 0;
      sectionSSevenbene_tag = 0;
      sectionSSevenEmer_tag = 0;
      var count = 1;
      var countarray = 0;

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
      $("#exlimitaions").hide();
      $("#privacyPolicy").hide();
      $("#terms-and-condition").hide();
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
            $(".hackguard-details").css({ 'color' : '#fff' }); 
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
            $(".hackguard-details").css({ 'color' : '' }); 
            $(".quotation").css({ 'color' : '' }); 
            $(".personal-data").css({ 'color' : '' }); 
            $(".payment").css({ 'color' : '' }); 
            $(".in-progress").css({ 'color' : '' }); 
            $(".pending").css({ 'color' : '' }); 
            $(".completed").css({ 'color' : '' }); 

        }
      });

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
        var n= yourNumber.toString().split(".");
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return n.join(".");
      }
      swiperCard();
      window.addEventListener("resize", swiperCard);


      $("#promo-div-yes").css("background-color","transparent");
      $(".yes_promo_text").css("color","#e4509a");
      $("#promo-div-no").css("background-color","transparent");
      $(".no_promo_text").css("color","#e4509a");
      $("#promo_no_check_svg").hide();
      $("#promo_yes_check_svg").hide();


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
                      <div class="hackguard-details">Trip Details</div>\
                      <div class="completed">Completed</div>\
                    </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(completed);

                  var inprogress = ' <div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="hackguard-details">Quotation</div>\
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
                        <div class="hackguard-details">Quotation</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_quotation').empty();
                    $('#progress_quotation').append(completed);

                    var inprogress = ' <div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="hackguard-details">Personal Data</div>\
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
                        <div class="hackguard-details">Personal Data</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_personal').empty();
                    $('#progress_personal').append(completed);

                    var inprogress = '<div class="frame-108563">\
                      <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="hackguard-details">Quotation</div>\
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
                        <div class="hackguard-details">      Quotation</div>\
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
          
          if($("#gender").val()){
            $("#gender").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#gender").closest('.btn-group').removeClass('invalid-select');
            $("#gender").removeClass("invalid").addClass("valid"); 
            $("#gender").find('option').css('color', '#212529');}
          else{
            $("#gender").closest('.btn-group').find('button').addClass('invalid-select');
            $("#gender").closest('.btn-group').addClass('invalid-select');
            errorPage1 = 1;
          }
          
          if($("#date-of-birth").val()){$("#date-of-birth").removeClass("invalid").addClass("valid"); $("#date-of-birth").find('option').css('color', '#212529');}
          else{$("#date-of-birth").removeClass("valid").addClass("invalid");errorPage1 = 1;}

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
          if ($("#country").val()) {
          $("#country").closest('.btn-group').find('button').removeClass('invalid-select').addClass('valid-select');
          $("#country").closest('.btn-group').removeClass('invalid-select').addClass('valid-select');
          $("#country").removeClass("invalid").addClass("valid");
          $("#country").find('option').css('color', '#212529');
        } else {
          $("#country").closest('.btn-group').find('button').addClass('invalid-select').removeClass('valid-select');
          $("#country").closest('.btn-group').addClass('invalid-select').removeClass('valid-select');
            errorPage2 = 1;
          }
          if($("#address-house-unit").val()){
          var houseVal = $("#address-house-unit").val().trim();
          var regex = /^[A-Za-z0-9\s\-\/#]{1,20}$/;

          if(regex.test(houseVal)){
            $("#address-house-unit").removeClass("invalid").addClass("valid");
            $("#address-house-unit").find('option').css('color', '#212529');
          } else {
            $("#address-house-unit").removeClass("valid").addClass("invalid");
            errorPage2 = 1;
          }
        } else {
          $("#address-house-unit").removeClass("valid").addClass("invalid");
          errorPage2 = 1;
        }

         if($("#street").val()) {
        var streetVal = $("#street").val().trim();
        var regex = /^[A-Za-z0-9\s\.\'\-]{1,100}$/;

        if(regex.test(streetVal)) {
          $("#street").removeClass("invalid").addClass("valid");
          $("#street").find('option').css('color', '#212529');
        } else {
          $("#street").removeClass("valid").addClass("invalid");
          errorPage2 = 1;
        }
      } else {
        $("#street").removeClass("valid").addClass("invalid");
        errorPage2 = 1;
      }
         
          if($("#barangay").val()){
            $("#barangay").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#barangay").closest('.btn-group').removeClass('invalid-select');
            $("#barangay").removeClass("invalid").addClass("valid"); 
            $("#barangay").find('option').css('color', '#212529');}
          else{
            $("#barangay").closest('.btn-group').find('button').addClass('invalid-select');
            $("#barangay").closest('.btn-group').addClass('invalid-select');
            errorPage2 = 1;
          }

          if($("#city").val()){
            $("#city").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#city").closest('.btn-group').removeClass('invalid-select');
            $("#city").removeClass("invalid").addClass("valid"); 
            $("#city").find('option').css('color', '#212529');}
          else{
            $("#city").closest('.btn-group').find('button').addClass('invalid-select');
            $("#city").closest('.btn-group').addClass('invalid-select');
            errorPage2 = 1;
          }

          if($("#province").val()){
            $("#province").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#province").closest('.btn-group').removeClass('invalid-select');
            $("#province").removeClass("invalid").addClass("valid"); 
            $("#province").find('option').css('color', '#212529');}
          else{
            $("#province").closest('.btn-group').find('button').addClass('invalid-select');
            $("#province").closest('.btn-group').addClass('invalid-select');
            errorPage2 = 1;
          }

          if($("#region").val()){
            $("#region").closest('.btn-group').find('button').removeClass('invalid-select');
            $("#region").closest('.btn-group').removeClass('invalid-select');
            $("#region").removeClass("invalid").addClass("valid"); 
            $("#region").find('option').css('color', '#212529');}
          else{
            $("#region").closest('.btn-group').find('button').addClass('invalid-select');
            $("#region").closest('.btn-group').addClass('invalid-select');
            errorPage2 = 1;
          }
if (/^\d{4}$/.test($("#zip").val())) {
  $("#zip").removeClass("invalid").addClass("valid");
  $("#zip").find('option').css('color', '#212529');
} else {
  $("#zip").removeClass("valid").addClass("invalid");errorPage2 = 1;}
          
          if (errorPage2 === 0) {
          $("#present_address_svg").css("display", "");
          $("#present_address_svg_error").css("display", "none");
        } else {
          $("#present_address_svg").css("display", "none");
          $("#present_address_svg_error").css("display", "");
        }

          if((errorPage1 == 0)  &&  (errorPage2 > 0)){
            $('html, body').animate({
              scrollTop: 450
            }, 1000);
          }
          //end section 2 validation
         
          //section3
          var errorPage3 = 0;
            $("#part1-promo-svg-error").css("display", "none");
            $("#part1-promo-svg-success").css("display", "none");

            if($('input[name="hdn_promo_tag"]').val() == ""){
              $("#part1-promo-svg-error").css("display", "");
              errorPage3 = 1;
            }else{
              if($('input[name="hdn_promo_tag"]').val() == "No"){
                $("#part1-promo-svg-success").css("display", "");
              }else{
                if($('input[name="hdn_promo_amount"]').val() == ""){
                  errorPage3 = 1;
                }
              }
            }
            if(errorPage3 > 0){
              $("#part1-promo-svg-error").css("display", "");
            }else{
              $("#part1-promo-svg-success").css("display", "");
            }
            console.log("Errors → Page1:", errorPage1, "| Page2:", errorPage2, "| Page3:", errorPage3);
            if((errorPage1 > 0)  || (errorPage2 > 0)  || (errorPage3 > 0)){
            return false;
          }
          widget.show();
          widget.not(':eq('+(1)+')').hide();
          setProgress(1);
          hideButtons(1);
          $('html, body').animate({
              scrollTop: 100
          }, 100);
        //end of validation
       
        $('.summary-firstname').text($('#first_name').val());
        $('.summary-lastname').text($('#last_name').val());
        $('.summary-suffix').text($('#suffix').val());
        $('.summary-mobile').text($('#mobile').val());
        $('.summary-email').text($('#email').val());
        $('#id_type').on('change', function () {
            $('.summary-idtype').text($(this).val());
        });

        $('#id_no').on('input', function () {
            $('.summary-idno').text($(this).val());
        });

        $('.summary-birthday').text("-");

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

        var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
        <div class="frame-108567">\
          <div class="hackguard-details">Personal Data</div>\
          <div class="completed">Completed</div>\
        </div>';
      $('#progress_trip_details').empty();
      $('#progress_trip_details').append(completed);

      var inprogress = '<div class="frame-108563">\
          <div class="_2">2</div>\
        </div>\
        <div class="frame-108567">\
          <div class="hackguard-details">Packages</div>\
          <div class="in-progress">In Progress</div>\
        </div>';
      $('#progress_quotation').empty();
      $('#progress_quotation').append(inprogress);

      $('.line-5').css({ 'border-color': '#09a12a' });
      $('.line-6').css({ 'border-color': '#eff2f4' });
      $('.line-7').css({ 'border-color': '#eff2f4' });

   const currentSelectedId = $("#hdn_package").val();  

if (!currentSelectedId) {
  const defaultSelectedId = "CyberUltra"; 

  const $defaultPackage = $(`.package-option[data-id='${defaultSelectedId}']`);

  if ($defaultPackage.length) {
    $defaultPackage.trigger("click");
  }
}
   
      });

        $(".view-all-coverage").click(function (e) { 
        e.stopPropagation();
        $("#selected-product-more-details").hide();
        const selectedId = $("#hdn_package").val();
        const cyberbullying = $("#hdn_package_cyberbullying").val();

        $(".more-package-column.selectable-option").removeClass("selected-option active");
        $(".svg_check_type1, .svg_check_type2").hide();

        const $selectedOption = $(`.more-package-column.selectable-option[data-id="${selectedId}"][data-cyberbullying="${cyberbullying}"]`);

        if ($selectedOption.length > 0) {
        $selectedOption.addClass("selected-option active");

        let $label;

        if (cyberbullying === "yes") {
            $label = $selectedOption.find(".svg_check_type2");
        } else {
            $label = $selectedOption.find(".svg_check_type1");
        }

        $label.css("display", "block"); 

        const defaultSvg = $selectedOption.find('.default-svg');
        if (defaultSvg.length && $label.css('display') !== 'none') {
            defaultSvg.hide();
        }
    }
        if (selectedId && cyberbullying) {
        $("#selected-product-more-details").show();
        $('#apply_plan_next').prop('disabled', false);
    } else {
        $("#selected-product-more-details").hide();
        $('#apply_plan_next').prop('disabled', true);
    }

        widget.show();
        widget.not(':eq(2)').hide();
        setProgress(2);
        hideButtons(2);

        $('html, body').animate({
            scrollTop: 100
        }, 100);


        });


      // Page 2 Progress
      $('#package_continue').click(function () {
      const selectedId = $("#hdn_package").val()?.trim();
      const cyberbullying = $("#hdn_package_cyberbullying").val()?.trim();

      if (!selectedId || !cyberbullying) {
          $('#package_continue').prop('disabled', true);

          return;
      }

    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
\
      <div class="frame-108567">\
        <div class="hackguard-details">Personal Data</div>\
        <div class="completed">Completed</div>\
      </div>';
    $('#progress_trip_details').empty().append(completed);

    var inprogress = ' <div class="frame-108563">\
        <div class="_2">2</div>\
        </div>\
        <div class="frame-108567">\
          <div class="hackguard-details">Packages</div>\
          <div class="in-progress">In Progress</div>\
        </div>';
    $('#progress_quotation').empty().append(inprogress);
    $('.line-5').css({ 'border-color': '#09a12a' });
    $('.line-6, .line-7').css({ 'border-color': '#eff2f4' });

    widget.show();
    widget.not(':eq(' + 3 + ')').hide();
    setProgress(3);
    hideButtons(3);
    $('html, body').animate({ scrollTop: 100 }, 100);
});


      //1st page (more package view buttons)
      $("#apply_plan_next").click(function(e){
                  var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                    <div class="frame-108567">\
                      <div class="hackguard-details">Personal Data</div>\
                      <div class="completed">Completed</div>\
                    </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(completed);

                  var inprogress = ' <div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="hackguard-details">Packages</div>\
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
    $("#more_package_back").click(function (e) {
    e.stopPropagation();

    widget.show();
    widget.not(':eq(1)').hide();
    setProgress(1);
    hideButtons(1);

    $('html, body').animate({ scrollTop: 100 }, 100);

    const selectedId = $("#hdn_package").val()?.trim();
    const cyberbullying = $("#hdn_package_cyberbullying").val()?.trim();

    $(".selectable-option").removeClass("selected-option active")
        .find(".svg_check_type1, .svg_check_type2").hide();

    $(".more-package-option .pt__item").removeClass("package-selected");
    $(".more-package-option .svg_check_more_package").hide();
    $(".more-package-option .more-package-select")
        .removeClass("package-selected-button-get-plan-selected")
        .addClass("btn-arrow-icon")
        .html("Select");

    $(".more-package-option .selected-premium-details").hide();

    if (selectedId) {
        if (cyberbullying) {
            $(".selectable-option").each(function () {
                const optionId = $(this).data("id");
                const optionCyber = $(this).data("cyberbullying");

                if (optionId === selectedId && optionCyber === cyberbullying) {
                    $(this).addClass("selected-option active");
                    if (cyberbullying === "yes") {
                        $(this).find(".svg_check_type2").show();
                    } else {
                        $(this).find(".svg_check_type1").show();
                    }
                }
            });
        }

        const $selectedContainer = $(`.more-package-option[data-id="${selectedId}"]`);
        $selectedContainer.find(".pt__item").addClass("package-selected");
        $selectedContainer.find(".svg_check_more_package").show();
        $selectedContainer.find(".more-package-select")
            .removeClass("btn-arrow-icon")
            .addClass("package-selected-button-get-plan-selected")
            .html("Selected");
        
        $(".package-option").each(function () {
            const optionId = $(this).data("id");

            if (optionId === selectedId) {
    $(this).find(".card-package").addClass("package-selected");
    $(this).find(".svg_check_package").show();

      if (!cyberbullying) {
            $(this).find(".selected-premium-details").show();
        } else {
            $(this).find(".selected-premium-details").hide();
        }

        $(this).find(".package-selected-button-get-plan")
            .addClass("package-selected-button-get-plan-selected")
            .removeClass("btn-arrow-icon form-control")
            .css("border", "1px solid #e4509a")
            .html("Plan selected");
    } else {
        $(this).find(".card-package").removeClass("package-selected");
        $(this).find(".svg_check_package").hide();

        $(this).find(".selected-premium-details").hide();
                $(this).find(".package-selected-button-get-plan")
                    .removeClass("package-selected-button-get-plan-selected")
                    .addClass("btn-arrow-icon form-control")
                    .css("border", "1px solid #008080")
                    .html("Get Plan");
            }
        });
    }

    checkPackageContinueEligibility();
});

      //2nd page buttons
      $("#quotation_next").click(function(e){
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="hackguard-details">Packages</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_quotation').empty();
                    $('#progress_quotation').append(completed);

                    var inprogress = ' <div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="hackguard-details">More Information</div>\
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

        $("#package_back").click(function(e){
        var inprogress = '<div class="frame-108563">\
            <div class="_1">1</div>\
          </div>\
          <div class="frame-108567">\
            <div class="hackguard-details">Personal Data</div>\
            <div class="in-progress">In Progress</div>\
          </div>';
        $('#progress_trip_details').empty().append(inprogress);

        var pending1 = '<div class="frame-108564">\
            <div class="_2">2</div>\
          </div>\
          <div class="frame-108569">\
            <div class="quotation">Packages</div>\
            <div class="pending">Pending</div>\
          </div>';
        $('#progress_quotation').empty().append(pending1);

        var pending2 = '<div class="frame-108565">\
            <div class="_3">3</div>\
          </div>\
          <div class="frame-108571">\
            <div class="personal-data">More Information</div>\
            <div class="pending">Pending</div>\
          </div>';
        $('#progress_personal').empty().append(pending2);

        var pending3 = '<div class="frame-108566">\
            <div class="_4">4</div>\
          </div>\
          <div class="frame-108573">\
            <div class="payment">Quotation</div>\
            <div class="pending">Pending</div>\
          </div>';
        $('#progress_payment').empty().append(pending3);

        $('.line-5').css({ 'border-color': '#eff2f4' });
        $('.line-6').css({ 'border-color': '#eff2f4' });
        $('.line-7').css({ 'border-color': '#eff2f4' });

        widget.show();
        widget.not(':eq(0)').hide();
        setProgress(0);
        hideButtons(0);

        $('html, body').animate({
            scrollTop: 100
        }, 100);
    });
    function checkPackageContinueEligibility() {
    const selectedId = $("#hdn_package").val()?.trim();
    const cyberbullying = $("#hdn_package_cyberbullying").val()?.trim();

    if (selectedId && cyberbullying) {
        $('#package_continue').prop('disabled', false).removeAttr('disabled');
        // console.log(" Continue enabled");
    } else {
        $('#package_continue').prop('disabled', true);
        // console.log("Continue disabled");
    }
}

    $("#quotation_back").click(function () {
    const inprogress = `
        <div class="frame-108563"><div class="_2">2</div></div>
        <div class="frame-108567">
            <div class="hackguard-details">Packages</div>
            <div class="in-progress">In Progress</div>
        </div>`;
    $('#progress_quotation').html(inprogress);

    const pending = `
        <div class="frame-108565"><div class="_3">3</div></div>
        <div class="frame-108571">
            <div class="personal-data">More Information</div>
            <div class="pending">Pending</div>
        </div>`;
    $('#progress_personal').html(pending);

    $('.line-5').css({ 'border-color': '#09a12a' });
    $('.line-6, .line-7').css({ 'border-color': '#eff2f4' });

    widget.show();

    const selectedId = $("#hdn_package").val();
    const selectedCyberbullying = $("#hdn_package_cyberbullying").val();

    let matchFound = false;

    $(".selectable-option").each(function () {
        const optionId = $(this).data("id");
        const optionCyber = $(this).data("cyberbullying");

        if (optionId === selectedId && optionCyber === selectedCyberbullying) {
            $(this).addClass("selected-option active");
            $(this).find("label").show();
            matchFound = true;
        } else {
            $(this).removeClass("selected-option active");
            $(this).find("label").hide();
        }
    });

    $(".package-option").each(function () {
        const packageId = $(this).data("id");

        if (packageId == selectedId) {
            $(this).find(".card-package").addClass("package-selected");
            $(this).find(".svg_check_package").show();

            const button = $(this).find(".package-selected-button-get-plan");
            button.addClass("package-selected-button-get-plan-selected");
            button.removeClass("btn-arrow-icon form-control");
            button.css("border", "1px solid #e4509a");
            button.html("Plan selected");
        } else {
            $(this).find(".card-package").removeClass("package-selected");
            $(this).find(".svg_check_package").hide();

            const button = $(this).find(".package-selected-button-get-plan");
            button.removeClass("package-selected-button-get-plan-selected");
            button.addClass("btn-arrow-icon form-control");
            button.css("border", "1px solid #008080");
            button.html("Get Plan");
        }
    });
    // console.log("Package ID:", selectedId);
    // console.log("Cyberbullying:", selectedCyberbullying);

    const selectedOption = $(".selectable-option.selected-option.active");
    if (selectedOption.length > 0) {
        $("#hdn_package").val(selectedOption.data("id"));
        $("#hdn_package_cyberbullying").val(selectedOption.data("cyberbullying"));
    }
    checkPackageContinueEligibility();
    $('#package_continue').prop('disabled', false).removeAttr('disabled');
    $('#view-all-coverage').prop('disabled', false).removeAttr('disabled');

    widget.not(':eq(1)').hide();
    setProgress(1);
    hideButtons(31);
    $('html, body').animate({ scrollTop: 100 }, 100);
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

      // 3rd page buttons
$("#id_type").change(function () {
    if ($(this).val()) {
        $(this).closest('.btn-group').find('button').removeClass('invalid-select');
        $(this).closest('.btn-group').removeClass('invalid-select');
        $(this).removeClass("invalid").addClass("valid");
        $(this).find('option').css('color', '#212529');
    } else {
        $(this).closest('.btn-group').find('button').addClass('invalid-select');
        $(this).closest('.btn-group').addClass('invalid-select');
        $(this).removeClass("valid").addClass("invalid");
    }
    toggleIdentificationError();
});

// validation for ID Number
$("#id_no").on('input', function () {
    if ($(this).val()) {
        $(this).removeClass("invalid").addClass("valid");
    } else {
        $(this).removeClass("valid").addClass("invalid");
    }
    toggleIdentificationError();
});

// validation for File Upload
$("#file-upload-id").change(function () {
    var fileUpload = $(this).get(0).files;
    if (fileUpload.length === 0) {
        $(this).removeClass("valid").addClass("invalid");
        $(this).parent().find("p").removeClass("valid-text").addClass("invalid-text");
    } else {
        var file = fileUpload[0];
        // Only check file size (no type restriction)
        if (file.size > 5000000) {
            $(this).removeClass("valid").addClass("invalid");
            $(this).parent().find("p").removeClass("valid-text").addClass("invalid-text");
        } else {
            $(this).removeClass("invalid").addClass("valid");
            $(this).parent().find("p").removeClass("invalid-text").addClass("valid-text");
        }
    }
    toggleIdentificationError();
});

// validation for Agent Name 
$("#agent-name").on('input', function () {
    if ($('input[name="hdn_agent_tag"]').val() === "Yes") {
        if ($(this).val()) {
            $(this).removeClass("invalid").addClass("valid");
            $(this).parent().find("p").removeClass("invalid-text").addClass("valid-text");
        } else {
            $(this).removeClass("valid").addClass("invalid");
            $(this).parent().find("p").removeClass("valid-text").addClass("invalid-text");
        }
    }
    toggleAgentError();
});

function toggleIdentificationError() {
    var errorPage3_id = 0;

    // Validate ID Type
    if ($("#id_type").val() === "") {
        errorPage3_id = 1;
    }

    // Validate ID Number
    if ($("#id_no").val() === "") {
        errorPage3_id = 1;
    }

    var fileUpload = $("#file-upload-id").get(0).files;
    if (fileUpload.length === 0 || fileUpload[0].size > 5000000) {
        errorPage3_id = 1;
    }

    if (errorPage3_id > 0) {
        $("#identification_svg_error").css("display", "");
        $("#identification_svg").css("display", "none");
    } else {
        $("#identification_svg_error").css("display", "none");
        $("#identification_svg").css("display", "");
    }
}

    function toggleAgentError() {
        var errorPage3_Section4 = 0;

        if ($('input[name="hdn_agent_tag"]').val() === "Yes") {
            if ($("#agent-name").val()) {
                $("#agent-name").removeClass("invalid").addClass("valid");
                $("#agent-name").parent().find("p").removeClass("invalid-text").addClass("valid-text");
            } else {
                $("#agent-name").removeClass("valid").addClass("invalid");
                $("#agent-name").parent().find("p").removeClass("valid-text").addClass("invalid-text");
                errorPage3_Section4 = 1;
            }
        }

        if (errorPage3_Section4 > 0) {
            $("#agent-svg-error").css("display", "");
            $("#agent-svg").css("display", "none");
        } else {
            $("#agent-svg-error").css("display", "none");
            $("#agent-svg").css("display", "");
        }
    }
      $("#personal_info_next").click(function(e){
      $("#pay_now").prop("disabled", true);
          //Page 3 section 1 ID validation
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

        if ($("#id_no").val()) {
          const idNoPattern = /^[A-Za-z0-9\-]+$/;

          if (!idNoPattern.test($("#id_no").val())) {
            $("#id_no").removeClass("valid").addClass("invalid");
            errorPage3 = 1;
          } else {
            $("#id_no").removeClass("invalid").addClass("valid");
            $("#id_no").css('color', '#212529');
          }
        } else {
          $("#id_no").removeClass("valid").addClass("invalid");
          errorPage3_id = 1;}
         
          if($("#file-upload-id").val()){$("#file-upload-id").removeClass("invalid").addClass("valid"); $("#file-upload-id").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#file-upload-id").find('option').css('color', '#212529');}
          else{$("#file-upload-id").removeClass("valid").addClass("invalid");$("#file-upload-id").parent().find( "p").removeClass("valid-text").addClass("invalid-text");errorPage3_id = 1;}
       
          $("#identification_svg_error").css("display", "none");
          $("#identification_svg").css("display", "none");
          if(errorPage3_id > 0){
            $("#identification_svg_error").css("display", "");
          }else{
            $("#identification_svg").css("display", "");
          }
          
          if(errorPage3_id > 0){
            $('html, body').animate({
              scrollTop: 100
            }, 1000);
          }
          //end section 1 ID validation
          // section 2 validation
          var errorPage3_Section4 = 0;
          var errorPage3_Section4a = 0;
          if($('input[name="hdn_agent_tag"]').val() == ""){
            errorPage3_Section4 = 1;
          }
          if($('input[name="hdn_agent_tag"]').val() == "Yes"){
            if($("#agent-name").val()){$("#agent-name").removeClass("invalid").addClass("valid"); $("#agent-name").parent().find( "p").removeClass("invalid-text").addClass("valid-text"); $("#agent-name").find('option').css('color', '#212529');}
            else{$("#agent-name").removeClass("valid").addClass("invalid");$("#agent-name").parent().find( "p").removeClass("valid-text").addClass("invalid-text");errorPage3_Section4 = 1;}
          }

          if(errorPage3_Section4 > 0){
            $("#agent-svg-error").css("display", "");
            $("#agent-svg").css("display", "none");
          }else{
            $("#agent-svg-error").css("display", "none");
          }
          if((errorPage3_id == 0)  && (errorPage3_Section4 == 0)){
            $('html, body').animate({
              scrollTop: 450
            }, 1000);
          }
          if((errorPage3_id > 0)  || (errorPage3_Section4 > 0)){
            return false;
          }
          // end section 2 validation

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
                        <div class="hackguard-details">More Information</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_personal').empty();
                    $('#progress_personal').append(completed);

                    var inprogress = '<div class="frame-108563">\
                      <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108567">\
                    <div id="trip-quotation" class="hackguard-details">Quotation</div>\
                    <div class="in-progress">In Progress</div>\
                  </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(inprogress);
                  $('#trip-quotation').html('&nbsp;&nbsp;&nbsp;Quotation');

                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#09a12a'});

                 function togglePayNowButton() {
                    if ($("#agreementCheck").is(":checked")) {
                        $("#pay_now").prop("disabled", false);
                    } else {
                        $("#pay_now").prop("disabled", true);
                    }
                }

                $("#agreementCheck").on("change", togglePayNowButton);

                togglePayNowButton();

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
                        <div class="hackguard-details">More Information</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_personal').empty();
                    $('#progress_personal').append(completed);

                    var inprogress = '<div class="frame-108563">\
                      <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="hackguard-details">     Quotation</div>\
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
                        <div class="hackguard-details">Packages</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);

                  var pending = '<div class="frame-108565">\
                        <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108571">\
                        <div class="personal-data">More Information</div>\
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
                        <div class="hackguard-details">More Information</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);

                  var pending = '<div class="frame-108566">\
                        <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108573">\
                        <div class="payment">    Quotation</div>\
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
                        <div class="hackguard-details">aaa</div>\
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
                        <div class="hackguard-details">Packages</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);

                  var pending = '<div class="frame-108565">\
                        <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108571">\
                        <div class="personal-data">More Information</div>\
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
                        <div class="hackguard-details">More Information</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);

                  var pending = '<div class="frame-108566">\
                        <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108573">\
                        <div class="payment">    Quotation</div>\
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
  #trip-quotation {
    padding-left: 45px;
}
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
      background-color: #008080; 
      color: white;
      padding: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
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
        var correctInputID = ""; // On input ID
        let totalSections = 6;
        let countdown; // Variable for countdown timer
        const countdownDuration = 2; // Countdown in seconds

        // page 1
        // section  1
        $('.section-1-validation, .selectbox-1-validation').on('input change', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitch(correctInputID,1);
        });
        // end section 1

        //section 2
        $('.page-1-selectbox-2-validation, .page-1-section-2-validation').on('input change', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitch(correctInputID,2);
        });
        // end of section 2

        // section 3
        $(document).on('change', '.selectpicker-destinations', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitch(correctInputID,3);
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
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitch(correctInputID,4);
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
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(correctInputID,1);
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
        $('.page-1-section-2-validation, .page-1-selectbox-2-validation').on('input change', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitch(correctInputID,2);
        });

        $('.page-3-section-2-validation, .page-3-selectbox-2-validation').on('input change', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(correctInputID,2);
        });
        $(document).on('input change', '.page-3-section-4-validation, .page-3-selectbox-4-validation', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(correctInputID,4);
        });

        $(document).on('input change', '.page-3-section-5-validation, .page-3-selectbox-5-validation', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(correctInputID,5);
        });

        $(document).on('input change', '.page-3-section-6-validation, .page-3-selectbox-6-validation', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(correctInputID,6);
        });

        $(document).on('input change', '.page-3-section-8-validation, .page-3-selectbox-8-validation', function() {
            var correctInputID = $(this).attr("id");
            checkInputsAndSwitchPage3(correctInputID,8);
        });


        //End of Page 3
        // Page 1 section validation
        function validateInputs(correctInputID,currentSection) {
            let allValid = true;


            // Validation rules
            if (currentSection === 1) {
                allValid = true; 
                // First name
                if (!$('#first_name').val()) {
                    allValid = false;
                    if (correctInputID === 'first_name') {
                        $("#first_name").removeClass("valid").addClass("invalid");
                    }
                } else {
                    $("#first_name").removeClass("invalid").addClass("valid");
                }

                // Last name
                if (!$('#last_name').val()) {
                    allValid = false;
                    if (correctInputID === 'last_name') {
                        $("#last_name").removeClass("valid").addClass("invalid");
                    }
                } else {
                    $("#last_name").removeClass("invalid").addClass("valid");
                }

                // Suffix
                if (!$('#suffix').val()) {
                    allValid = false;
                    if (correctInputID === 'suffix') {
                        $('#suffix').closest('.btn-group').find('button').addClass('invalid-select');
                        $('#suffix').closest('.btn-group').addClass('invalid-select');
                    }
                } else {
                    $('#suffix').closest('.btn-group').find('button').removeClass('invalid-select');
                    $('#suffix').closest('.btn-group').removeClass('invalid-select');
                }

                // Mobile
                const mobileVal = $('#mobile').val();
                if (!mobileVal || mobileVal.length < 15 || mobileVal.charAt(1) != 0 || mobileVal.charAt(2) != 9) {
                    allValid = false;
                    if (correctInputID === 'mobile') {
                        $("#mobile").removeClass("valid").addClass("invalid");
                    }
                } else {
                    $("#mobile").removeClass("invalid").addClass("valid");
                }

                // Email
                const emailVal = $('#email').val();
                if (!emailVal || !validateEmail(emailVal)) {
                    allValid = false;
                    if (correctInputID === 'email') {
                        $("#email").removeClass("valid").addClass("invalid");
                    }
                } else {
                    $("#email").removeClass("invalid").addClass("valid");
                }

                // Gender
                if (!$('#gender').val()) {
                  allValid = false;
                  if(correctInputID == $('#gender').attr("id")){
                    $('#gender').closest('.btn-group').find('button').addClass('invalid-select'); 
                    $('#gender').closest('.btn-group').addClass('invalid-select');
                  }
                }else{
                  $('#gender').closest('.btn-group').find('button').removeClass('invalid-select');
                  $('#gender').closest('.btn-group').removeClass('invalid-select');
                }

                // Birthdate
                if (!$('#date-of-birth').val()) {
                    allValid = false;
                    if(correctInputID == $('#date-of-birth').attr("id")){
                      $("#date-of-birth").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#date-of-birth").removeClass("invalid").addClass("valid")
                }
            console.log("Gender:", $('#gender').val());
            console.log("DOB:", $('#date-of-birth').val());
            console.log("allValid:", allValid);

                if (allValid) {
                    $("#part1-personal-info-svg").css("display", "");      
                    $("#part1-personal-info-svg-error").css("display", "none"); 
                } else {
                    $("#part1-personal-info-svg").css("display", "none");      
                    $("#part1-personal-info-svg-error").css("display", "");    
                }
            }
          else if (currentSection === 2) { // Section 2
                $("#present_address_svg").css("display", "none");

                if (!$('#region').val()) {
                  allValid = false;
                  if(correctInputID == $('#region').attr("id")){
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
                  if(correctInputID == $('#province').attr("id")){
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
                  if(correctInputID == $('#city').attr("id")){
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
                  if(correctInputID == $('#barangay').attr("id")){
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
                    if(correctInputID == $('#address-house-unit').attr("id")){
                      $("#address-house-unit").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#address-house-unit").removeClass("invalid").addClass("valid")
                }
                if (!$('#street').val()) {
                    allValid = false;
                    if(correctInputID == $('#street').attr("id")){
                      $("#street").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#street").removeClass("invalid").addClass("valid")
                }
                if (!/^\d{4}$/.test($('#zip').val())) {
                    allValid = false;
                    if(correctInputID == $('#zip').attr("id")){
                      $("#zip").removeClass("valid").addClass("invalid")
                    }
                }else{
                  $("#zip").removeClass("invalid").addClass("valid")
                }
        console.log("Country:", $('#country').val());
        console.log("Region:", $('#region').val());
        console.log("Province:", $('#province').val());
        console.log("City:", $('#city').val());
        console.log("Barangay:", $('#barangay').val());
        console.log("house-unit:", $('#address-house-unit').val());
        console.log("street:", $('#street').val());
        console.log("Zip:", $('#zip').val());
                 console.log("Address Section allValid:", allValid);
                 if(allValid){
                  $("#present_address_svg").css("display", "");
                  $("#present_address_svg_error").css("display", "none");
                }
    } else if (currentSection === 3) {// Section 3

              if(correctInputID =="destination_both"){
              }else{
                $("#"+correctInputID).closest('.btn-group').find('button').removeClass('invalid-select');
                $("#"+correctInputID).closest('.btn-group').removeClass('invalid-select');
               
                if (!$('#'+correctInputID).val()) {
                      $("#"+correctInputID).closest('.btn-group').find('button').addClass('invalid-select');
                      $("#"+correctInputID).closest('.btn-group').addClass('invalid-select');
                      $("#"+correctInputID).closest('.btn-group').find('button').removeClass('valid');
                      $("#"+correctInputID).closest('.btn-group').removeClass('valid');
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

              if(correctInputID =="destination_both"){
              }else{
                $("#"+correctInputID).closest('.btn-group').find('button').removeClass('invalid-select');
                $("#"+correctInputID).closest('.btn-group').removeClass('invalid-select');
               
                if (!$('#'+correctInputID).val()) {
                      $("#"+correctInputID).closest('.btn-group').find('button').addClass('invalid-select');
                      $("#"+correctInputID).closest('.btn-group').addClass('invalid-select');
                      $("#"+correctInputID).closest('.btn-group').find('button').removeClass('valid');
                      $("#"+correctInputID).closest('.btn-group').removeClass('valid');
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
        
        function validateInputsPage3(correctInputID, currentSection) {
        let allValid = true;

    // Section 1 Validation 
    if (currentSection === 1) {
        console.log("Inside Section 1 Validation");

        $("#identification_svg").css("display", "none");

        // Validate ID Number 
        const idNoValue = $('#id_no').val();
        console.log("ID No value: ", idNoValue);

        if (!idNoValue) {
            allValid = false;
            if (correctInputID == $('#id_no').attr("id")) {
                $("#id_no").removeClass("valid").addClass("invalid");
            }
        } else {
            $("#id_no").removeClass("invalid").addClass("valid");
        }

        // Validate ID Type 
        const idTypeValue = $('#id_type').val();
        console.log("ID Type value: ", idTypeValue);

        if (!idTypeValue) {
            allValid = false;
            if (correctInputID == $('#id_type').attr("id")) {
                $('#id_type').closest('.btn-group').find('button').addClass('invalid-select');
                $('#id_type').closest('.btn-group').addClass('invalid-select');
            }
        } else {
            $('#id_type').closest('.btn-group').find('button').removeClass('invalid-select');
            $('#id_type').closest('.btn-group').removeClass('invalid-select');
        }

        // Validate File Upload 
        const fileUpload = $('#file-upload-id').get(0).files;
        console.log("File upload length: ", fileUpload.length);
        if (fileUpload.length === 0 || fileUpload[0].size > 5000000) {
            allValid = false;
        }

        
        if (allValid) {
            $("#identification_svg").css("display", "");
            $("#identification_svg_error").css("display", "none");
        }
    }

    // Section 2 Validation (Agent Name)
    else if (currentSection === 2) {
        console.log("Inside Section 2 Validation");

        const agentNameValue = $('#agent-name').val();
        console.log("Agent Name value: ", agentNameValue);

        if (!agentNameValue) {
            allValid = false;
            $("#agent-name").removeClass("valid").addClass("invalid");
        } else {
            $("#agent-name").removeClass("invalid").addClass("valid");
        }

        
        if (allValid) {
            $("#agent-svg").css("display", "");
            $("#agent-svg-error").css("display", "none");
        } else {
            $("#agent-svg").css("display", "none");
            $("#agent-svg-error").css("display", "none");
        }
    }

    console.log("All Valid: ", allValid);
    return allValid;
}

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email regex
            return re.test(email);
        }
        

        function checkInputsAndSwitch(correctInputID,sectID) {
            if (validateInputs(correctInputID,sectID)) {
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

        function checkInputsAndSwitchPage3(correctInputID,sectID) {
            if (validateInputsPage3(correctInputID,sectID)) {
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
    document.addEventListener("DOMContentLoaded", function () {
        var accordions = document.querySelectorAll(".accordion");

        accordions.forEach(function (accordion) {
            accordion.addEventListener("click", function () {
                accordions.forEach(function (acc) {
                    if (acc !== accordion) {
                        acc.classList.remove("active");
                        var otherPanel = acc.nextElementSibling;
                        otherPanel.style.maxHeight = null;
                    }
                });

                this.classList.toggle("active");

                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        });
    });

        $(".option_tab").click(function(e){
            $("#single-destination_text").css("text-align","center");

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
@endsection
