@extends('layouts.layout1')
@section('content')
@include('getaquote.motor_net.update.motor_header')
<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">

<input type="hidden" name="hidURL" id="hidURL" value="{{url('/')}}">

<style type="text/css">
    form.b5form {
      font-size: 20px;
    }
    form.b5form label {
      font-family: Muli;
      font-weight: normal;
      color: #373737;
    }
    .selectb5 {
      /* padding: 10px 5px; */
      height: auto !important;
    }
    .selectb5 button {
      box-shadow: none !important;
      outline: none !important;
      border: 1px solid #B8B8B8;
      border-radius: 5px;
      height: 52px !important;
      padding: 10px;
      line-height: 1.2;
    }
    .selectb5 button:hover {
      box-shadow: 0px 0px 6px #00000029 !important;
    }
    .selectb5 button:focus {
      box-shadow: 0px 0px 6px #00000029 !important;
      border-color: #008080;
    }
    .selectb5.bootstrap-select .dropdown-toggle:focus {
      outline: none !important;
    }
    .selectb5.bootstrap-select .dropdown-toggle:after {
      position: absolute;
      top: 50%;
      margin-top: -4px;
      right: 15px;
    }
    .selectb5.bootstrap-select.btn-group .dropdown-toggle .filter-option {
      font-size: 20px;
      font-weight: normal;
      line-height: 1.4;
    }
    .selectb5.bootstrap-select>.dropdown-toggle {
      padding-right: 40px;
    }
    .selectb5.dropup .dropdown-toggle::after {
      border-top: 0.3em solid;
      border-right: 0.3em solid transparent;
      border-bottom: 0;
      border-left: 0.3em solid transparent;
    }
    .selectb5 .bs-caret {
      display: none;
    }
    input.form-control {
      box-shadow: none !important;
      outline: none !important;
      border: 1px solid #B8B8B8;
      height: 52px !important;
    }
    input.form-control:hover {
      box-shadow: 0px 0px 6px #00000029 !important;
    }
    input.form-control:focus {
      box-shadow: 0px 0px 6px #00000029 !important;
      border-color: #008080;
    }
    .bs-searchbox .form-control {
      height: 40px !important;
      font-size: 17px;
    }
    .form-check-input {
      width: 28px;
      height: 28px;
      border: 1px solid #B8B8B8;
      margin: 0px;
    }
    .form-check-input:checked {
      background-color: #DB3E8D;
      border-color: #DB3E8D;
    }
    .form-check label {
      margin-left: 10px;
    }
    .add-field {
      height: 52px;
      width: 52px;
      min-width: 52px;
      border-radius: 5px;
      background: #ffffff !important;
      border: 2px solid #DB3E8D !important;
      color: #DB3E8D !important;
      padding: 4px;
      margin-left: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0px !important;
    }

    .add-field svg {
      color: #DB3E8D !important;
      height: 20px;
      width: 20px;
      stroke-width: 4px;
    }
    .add-field.a-btn-slide-text:hover {
      background: #DB3E8D !important;
      border-color: #DB3E8D !important;
      color: #ffffff !important;
    }
    .add-field.a-btn-slide-text:hover svg {
      color: #ffffff !important;
    }
    .remove-field {
      height: 52px;
      width: 52px;
      min-width: 52px;
      border-radius: 5px;
      background: #ffffff !important;
      border: 2px solid #707070 !important;
      color: #707070 !important;
      padding: 4px;
      margin-left: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0px !important;
    }
    .remove-field svg {
      color: #707070 !important;
      height: 20px;
      width: 20px;
      stroke-width: 4px;
    }
    .remove-field.a-btn-slide-text:hover {
      background: #707070 !important;
      border-color: #707070 !important;
      color: #ffffff !important;
    }
    .remove-field.a-btn-slide-text:hover svg {
      color: #ffffff !important;
    }
    .accessories-help-text {
      color: #707070;
      font-size: 16px;
      font-style: italic;
    }
    .multi-field-wrapper .multi-field {
      margin-bottom: 10px;
    }
    .has-error .form-control {
      border-color: #CF3C4B;
    }
    .has-error .form-control:focus {
      border-color: #CF3C4B;
    }
    .has-error .help-block {
      color: #CF3C4B;
      font-size: 15px;
    }
    .has-error .help-block strong {
      font-weight: normal;
      font-family: Muli;
    }
    .has-error label {
      color: #CF3C4B;
    }
    .custom-range::-webkit-slider-thumb {
      background: #008080;
    }

    .custom-range::-moz-range-thumb {
      background: #008080;
    }

    .custom-range::-ms-thumb {
      background: #008080;
    }

    .has-error .form-control
    {
    border-color: #CF3C4B;
    }
    .v-error-msg {
        color: #CF3C4B;
      font-size: 15px;
    }
    @media only screen and (max-width: 1439px) {
      .form-check-input {
        width: 25px;
        height: 25px;
      }
    }
    @media only screen and (max-width: 1439px) {
      form.b5form {
        font-size: 16px;
      }

      form.b5form input.form-control {
        height: 42px !important;
      }
      .selectb5 button {
        height: 42px !important;
      }
      form.b5form .form-control {
        font-size: 16px;
      }
      .selectb5.bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 16px;
      }
      .bs-searchbox .form-control {
        height: 40px !important;
        font-size: 16px;
      }
      .add-field {
        height: 42px;
        width: 42px;
        min-width: 42px;
      }
      .remove-field {
        height: 42px;
        width: 42px;
        min-width: 42px;
      }
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

    </style>

<div class="container_">
    <div>
        <button type='button' class="btn btn-secondary-light back_1" id='back_1' style="min-width: auto;">< Back</button>
    </div>
    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>

    <div class="">
      <h1 style='color: #008080;'> Car Information</h1>
    </div>
    <input type="hidden" name="hidURL" id="hidURL" value="{{url('/')}}">
    <div class="col-md-12_ break-two"><br></div>
      <form id="car_vehicle" name="car_vehicle" method="post"  enctype="multipart/form-data">
        @foreach($cocogen_estimate_motor_info as $motor_info)
        <input type='hidden' name='check_disable' id='check_disable2' class='check_disable2'>
        <input id="transno" name="transno" type="text" value="{{ $motor_info->gid }}" class="hide">
    <div class="container_ row">
      <div class="col-12 col-md-4">
        <div class="form-group  {{ $errors->has('drpYear') ? ' has-error' : '' }} fieldset-group has-feedback">
          <div class="col-md-4_">
              <label class="b5-field-label" for="drpYear">Year *</label>
              <select id="drpYear" name="drpYear" class="form-control dynamicyear selectpicker select-input-border-color-year selectb5" data-style="input-lg select-input-border-color-year" data-size="10" data-live-search="true" style="font-family: muli;">
                @if (old('drpYear') || isset($motor_info))
                    <option value="{{ old('drpYear', $motor_info->year) }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('drpYear', $motor_info->year) }}</option>
                @else
                    <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Year *</option>
                @endif

                @foreach($cocogen_fmv_years as $cocogen_fmv_year)
                    <option value="{{ $cocogen_fmv_year->year }}">{{$cocogen_fmv_year->year}}</option>
                @endforeach
                </select>

                @if ($errors->has('drpYear'))
                <style type="text/css">
                .select-input-border-color-year {
                    border-color: #CF3C4B !important;
                }
                </style>
                <span class="help-block">
                  <strong>{{ $errors->first('drpYear') }}</strong>
                </span>
                @endif
          </div>
        </div>


               <!-- Hidden field to store the selected brand value -->
               <input type="hidden" id="hiddenYear" name="hiddenYear" value="{{ $motor_info->year }}">
      </div>
      <input type="hidden" name="drpYear_default" id='drpYear_default' class='drpYear_default' value='{{ $motor_info->year }}'>
      <input type="hidden" name="brand_default" id='brand_default' class='brand_default' value='{{ $motor_info->brand }}'>
      <input type="hidden" name="model_default" id='model_default' class='model_default' value='{{ $motor_info->model }}'>
      <div class="col-12 col-md-4">
          <div class="form-group {{ $errors->has('brand') ? ' has-error' : '' }} fieldset-group has-feedback">
            <div class="col-md-4_">
              <label class="b5-field-label" for="brand">Brand *</label>
              <select id="brand" name="brand" class="form-control dynamicbrand selectpicker select-input-border-color-brand selectb5" data-style="input-lg select-input-border-color-brand" data-size="10" data-live-search="true" style="font-family: muli">
                @if (old('brand') || isset($motor_info))
                <option value="{{ old('brand', $motor_info->brand) }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('brand', $motor_info->brand) }}</option>
              @else
                <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Brand*</option>
              @endif
            </select>

          @if ($errors->has('brand'))
          <style type="text/css">
          .select-input-border-color-brand{
            border-color: #CF3C4B !important;
          }
          </style>
          <span class="help-block">
            <strong>{{ $errors->first('brand') }}</strong>
          </span>
          @endif
              <!-- Hidden field to store the selected brand value -->
              <input type="hidden" id="hiddenBrand" name="hiddenBrand" value="{{ $motor_info->brand }}">

            </div>
          </div>
        </div>

      <div class="col-12 col-md-4">
        <div class="form-group  {{ $errors->has('model') ? ' has-error' : '' }} fieldset-group has-feedback">
          <div class="col-md-4_">
            <label class="b5-field-label" for="model">Modal *</label>
            <select  id="model" name="model" class="form-control dynamic selectpicker select-input-border-color-model selectb5 model" data-style=" input-lg select-input-border-color-model" data-size="10" data-live-search="true"  style="font-family: muli">
                @if (old('model') || isset($motor_info))
                <option value="{{ old('model', $motor_info->model) }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('model', $motor_info->model) }}</option>
              @else
                <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Model*</option>
              @endif
            </select>
            @if ($errors->has('model'))
            <span class="help-block">
              <strong>{{ $errors->first('model') }}</strong>
            </span>
            @endif
               <!-- Hidden field to store the selected brand value -->
               <input type="hidden" id="hiddenModel" name="hiddenModel" value="{{ $motor_info->model }}">
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <label for="seatNo">Authorized Seating Capacity*</label>
        <input id="seatNo" type="text" class="form-control integer input-lg" name="seatNo" maxlength="11" value="{{ $motor_info->seatCount }}" placeholder="">
        <input type='hidden' id='aonratenature' name='aonratenature' class='aonratenature' value="{{ $rateForAON }}">
    </div>
    <div class="col-md-12_ break-two"><br></div>
        <div class="col-md-12_ break-two"><br></div>
      <div class="col-12 col-md-4">
        <div class="form-group">
          <div class="col-md-4_">
            <br>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="CBCantFind" name="CBCantFind" value="1">
              <label class="form-check-label" for="CBCantFind"> Can't find your car?</label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>

    <div class="">
      <h4 class="rfs-2-5 rfs-md-1-3">Value of Car</h4>
    </div>
    <div class="col-md-12_ break-two"><br></div>
    <div class="container_ row">
      <div class="col-12 col-md-4">
        <div class="form-group">
          <div class="col-md-4_">
            <input type="range" id="fader" class="form-range custom-range">
            <label id="minValue" name="minValue" max="minValue" class="pull-left" for="minValue" > {{ old('minValue', 'XXXXXXX') }} </label>
            <label id="maxValue" name="maxValue" max="maxValue" class="pull-right" for="maxValue" value="{{old('maxValue')}}" >  {{ old('maxValue', 'XXXXXXX') }} </label>
          </div>
        </div>
      </div>
      <div class="col-md-12_ break-two"><br></div>
      <div class="col-12 col-md-4 ">
        <div class="form-group  fieldset-group has-feedback">
          <div class="col-md-4_">
            <label for="totalValue">Total Value: </label>
            <input id="totalValue" name="totalValue" type="text" class="form-control  input-lg" maxlength="100" min="1" max="10" placeholder="" value='{{ $motor_info->valueOfVehicle }}'>
            <input type="hidden" name="totalValuehid" class="form-control totalValuehid" id="totalValuehid" value='{{ $motor_info->valueOfVehicle }}'>
          </div>
          <span id='totalvalminmax'></span>
        </div>
      </div>
    </div>

    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>


    </div>
    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>

    <div class="">
        <h4 class="rfs-2-5 rfs-md-1-3">Standard Accessories</h4>
    </div>

    <div class="col-md-12_ break-two"><br></div>

    <div class="container_">
      <div class="row">
        <div class="col-12 col-md-2">
          <div class="col-md-7_">1. Stereo (Built-In) </div>
          <div class="col-md-7_">2. Aircon (Built-In) </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="col-md-7_">3. Five (5) pcs. Magwheels  </div>
          <div class="col-md-7_">4. Speakers 2 pcs. (Built-In)  </div>
        </div>
      </div>
    </div>

    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>

    <div class="row fieldset-row" data-fieldset-row="accessories_non_standard">
      <div class="col-md-12">
          <div class="">
            <h4 class="rfs-2-5 rfs-md-1-3">Non-Standard Accessories</h4>
          </div>
          <div class="accessories-help-text">*All non-standard or non-factory fitted accessories must be declared to be covered.</div>
          <div class="fieldset-group" data-fieldset-group="accessories_non_standard">
            <div class="form-group fieldset-group-set has-feedback">
              <div class="append-elements"></div>
            </div>
          </div>
      </div>
    </div>


    <div id="customFields" class="devices-ins">
        <div class="row d-none d-lg-flex row-labels">
          <div class="col-md-2"><label>Select Accessory *</label></div>
          <div class="col-md-2 last"><label>Value *</label></div>
          <div class="col-md-1 delete-row-col" style="display: none;"></div>
        </div>

        <div id="hardware-body">
            {{-- @if($accessories_with_value->count() > 0) --}}

            <div class="row">
                <div class="col-12 col-lg-2">
                  <div class="form-group">
                    <label class="d-block d-lg-none">Select Accessory *</label>
                    <div id="divvv_year">
                      <select id="device_access_year" name="device_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5 device_access_year" data-style="input-lg btn-white-device_access_year device_access_year" data-size="10" data-live-search="true">
                        <option value="">-Select Accesory-</option>
                        @foreach($accessories as $accessory)
                        <option value="{{  $accessory->name }}">{{ $accessory->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-2 last">
                  <div class="form-group layout1">
                    <label class="d-block d-lg-none">Value *</label>
                    <input name="device_access_value[]" id="device_access_value" type="text" class="form-control input-lg personal_ifno_mobile device_access_value" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('device_access_value');vf_commafy('device_access_value', 2)" value="0.00">
                  </div>
                </div>
                <div class="a btn btn-primary a-btn-slide-text add-field 4thpage_add">
                  <svg id="4thpage_add" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M16 2 L16 30 M2 16 L30 16" />
                  </svg>
                </div>
              </div>
            @foreach($accessories_with_value as $accesory_val)
          <div class="row">
            <div class="col-12 col-lg-2">
              <div class="form-group">
                <label class="d-block d-lg-none">Select Accessory *</label>
                <div id="divvv_year">
                  <select id="device_access_year" name="device_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5 device_access_year" data-style="input-lg btn-white-device_access_year device_access_year" data-size="10" data-live-search="true">
                    @foreach($accessories as $accessory)
                    <option value="{{ $accessory->name }}" {{ $accesory_val->accessories == $accessory->name ? 'selected' : '' }}>{{ $accessory->name }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-2 last">
              <div class="form-group layout1">
                <label class="d-block d-lg-none">Value *</label>
                <input id="accessoryValue" name="accessoryValue[]" type="text" class="form-control accessoryValue2 select-input-border-colo" data-style="input-lg select-input-border-color" value="{{ $accesory_val->amount }}" placeholder="">
              </div>
            </div>
            <div class="btn btn-danger a-btn-slide-text remove-field  delete-row">
                <svg id="delete-row" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                  <path d="M2 30 L30 2 M30 30 L2 2" />
                  </svg>
              </div>

          </div>
        </div>
        @endforeach

        <div id="divvv" style="display: none;">
          <select id="copy_select" name="copy_select" class="form-control address_mobile input-lg selectb5" data-style="input-lg btn-white-device_access_year" data-size="10" data-live-search="true">

            @foreach($accessories as $accessory)
            <option value="{{  $accessory->name }}">{{ $accessory->name}}</option>
            @endforeach
          </select>
        </div>
      </div>



      <input type="hidden" name="totalAcceso" id='totalAcceso' value="">
      <script type="text/javascript">
        // Remove criterion
        jQuery(document).on("click", ".delete-row", function () {
          $(this).closest('.row').remove();
          var colCount = $("#customFields #hardware-body .row").length;
          if (colCount > 1) {
            jQuery('.delete-row-col').css('display', 'flex');
          } else {
            jQuery('.delete-row-col').hide();
          }
          return false;
        });

      $('#4thpage_add').click(function(){

        var minNumber = 1;
        var maxNumber = 40000000;

        var date = new Date();
        date.setFullYear( date.getFullYear() - 4 );
        var year = date.getFullYear();
        var yearlist;

        for (i = new Date().getFullYear(); i > year; i--)
        {
          yearlist = yearlist +  '<option value="'+i+'">' + i + '</option>';
        }
        var colCount = $("#customFields #hardware-body .row").length;
        if(colCount > 0){
          jQuery('.delete-row-col').css('display', 'flex');
        }else{
          jQuery('.delete-row-col').hide();
        }
        var number = Math.floor(Math.random()*(maxNumber-minNumber+1)+minNumber);
        var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')";
        var numformat1 = "vf_clean_number('device_access_value"+number+"');vf_commafy('device_access_value"+number+"', 2)";
        var $cloned = $('#divvv').clone().prop('id', 'divvv'+number);
            var new_row = '\
            <div class="row">\
              <div class="col-12 col-lg-2">\
                <div class="form-group">\
                  <label class="d-block d-lg-none">Accesory</label>\
                  <div id="divvv_year">\
                    <div id="new_select' + number + '"></div>\
                  </div>\
                </div>\
              </div>\
              <div class="col-12 col-lg-2 last">\
                <div class="form-group layout1">\
                  <label class="d-block d-lg-none">Value</label>\
                  <input name="device_access_value[]" id="device_access_value'+number+'" type="text" class="form-control input-lg personal_ifno_mobile device_access_value" maxlength="100" oninput="' + noonly + '" onchange="' + numformat1 + '" value="0.00">\
                </div>\
              </div>\
              <div class="btn btn-danger a-btn-slide-text remove-field  delete-row">\
                <svg id="delete-row" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">\
                  <path d="M2 30 L30 2 M30 30 L2 2" />\
                  </svg>\
              </div>\
            </div>\
        ';

        $('#hardware-body').append(new_row);
        $cloned.find('#copy_select').prop('name', 'device_access_year[]');
        $cloned.find('#copy_select').prop('display', 'block');
        $cloned.find('#copy_select').data( "style", 'device_access_year'+number );
        $cloned.find('#copy_select').attr( "data-style", "input-lg btn-white-device_access_year device_access_year"+number);
        $cloned.find('#copy_select').prop('id', 'device_access_year'+number);
        $cloned.appendTo('#new_select'+number);
        jQuery('#device_access_year'+number).selectpicker();
        jQuery('#divvv'+number).show();

        return false;
      });
            </script>
    <div class="">
      <h4 class="rfs-2-5 rfs-md-1-3">Select Insurance Coverage</h4>
    </div>
    <input type="hidden" name="bodyInjuryPc" id='bodyInjuryPc' value="">
    <input type="hidden" name="propertyDamagePc" id='propertyDamagePc' value="">
    <div class="col-md-12_ break-two"><br></div>

    <div class="container_ row">
      <div class="col-12 col-md-4">
        <div class="form-group  {{ $errors->has('bodilyInjury') ? ' has-error' : '' }} fieldset-group has-feedback">
          <div class="col-md-6_">
              <label for="bodilyInjury">Body Injury / Property Damage</label>
              <select id="bodilyInjury" name="bodilyInjury" class="form-control selectpicker selectb5 select-input-border-color-bi" data-style="input-lg select-input-border-color-bi" style="font-family: muli">
                @if (old('bodilyInjury') || isset($motor_info))
                  <option value="{{ old('bodilyInjury', $motor_info->bodyInjury) }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('bodilyInjury',  number_format($motor_info->bodyInjury, 2) ) }}</option>
                @else
                  <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Value *</option>
                @endif
                @foreach($cocogen_compre_bipds as $cocogen_compre_bipd)
                  <option value="{{ number_format($cocogen_compre_bipd->amount, 2) }}">{{ number_format($cocogen_compre_bipd->amount, 2) }}</option>
                @endforeach
              </select>

            @if ($errors->has('bodilyInjury'))
            <style type="text/css">
            .select-input-border-color-bi{
                border-color: #CF3C4B !important;
            }
            </style>
            <span class="help-block">
              <strong>{{ $errors->first('bodilyInjury') }}</strong>
            </span>
            @endif
        </div>
          </div>
        </div>
      </div>

      <input type="hidden" name="bodyDropdown" id='bodyDropdown' class='bodyDropdown'>
      <input type="hidden" name="propertyDropdown" id='propertyDropdown' class='propertyDropdown'>
      <input type="hidden" name="bodilyInjuryVal" id='bodilyInjuryVal' class='bodilyInjuryVal' value='{{ $motor_info->bodyInjury }}'>
      <input type="hidden" name="bodyType" id='bodyType' class='bodyType'>

      <div class="col-md-12_ break-two"><br></div>
      <div class="col-md-4" style="padding-left:0px !important">
          <div class="form-group">
            <label for="firstName_personal_info">Desire Gross Premium</label>
            <div class="input-group">
                <input name="grossPrem" id="grossPrem" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value='{{ $motor_info->finalAmountDue }}'>
                <input name="grossPrem1" id="grossPrem1" type="hidden" value='{{ $motor_info->finalAmountDue }}'>
            </div>
              <span id='displayrange'></span>
          </div>
      </div>
      <div class="form-group col-xs-8 col-md-8">
          <input type="checkbox" id="aon" name="aon" class='aon'>
          <label for="actOfNature" style='margin-top:12px'> Acts of Nature</label>
          <input type="hidden" id="actOfNature" name="actOfNature" class='actOfNature form-check-input' value="">
        </div>

        <div class="col-md-12_ break-two"><br></div>
        <div class="col-md-12_ break-two"><br></div>

    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>
    <div class="">
      <h4 class="rfs-2-5 rfs-md-1-3">Promo Code</h4>
    </div>
    <div class="col-md-12_ break-two"><br></div>
    <div class="container_ row">
      <div class="col-md-4">
        <div class="form-group {{ session('promoCodeError') ? ' has-error' : '' }} fieldset-group has-feedback">
          <div class="col-md-4_">
            <input id="promoCode" name="promoCode" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('promoCode') }}" placeholder="Promo Code">
            @if (session('promoCodeError'))
            <span class="help-block">
              <strong>{{ session('promoCodeError') }}</strong>
            </span>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <input type="submit" id="vehiclesave" name="ViewQuote" class="form-control_ btn btn-lg_ btn-secondary a-btn-slide-text_ btn-buy" value="View Quote">
    </div>
    <br>
  </div>
 <br>
</form>

@endforeach

<div id="BlockCantFindCar" class="BlockCantFindCar" style="display: none">
    <div class="RowDialogBody">
      <div class="confirm-header row-dialog-hdr-success" style="border-top: 7px solid #008080;"></div>
      <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
        <label style="font-size: 14px;" for="chckcConfirm">For further assistance, please contact our Client Services team at (02) 8-830-6000 to get your free quotation.</label>
      </div>
      <div class="confirm-btn-panel pull-right">
        <div class="btn-holder pull-right">
          <input type="button" id="btnCantFindCar" name="btnCantFindCar" class="row-dialog-btn btn btn-success btn-md" value="OK" style="background-color: #008080;" />
        </div>
      </div>
    </div>
  </div>


  <div id="BlockCantFintCar" class="BlockCantFintCar confirm-modal" style="display: none">
    <div class="blockui-mask"></div>
    <div class="RowDialogBody p-4 px-5">
      <div class="confirm-body row-dialog-hdr-success text-center">
      <label class="rfs-1-5 rfs-md-1 fw-normal" for="chckcConfirm">For further assistance, please contact our Client Services team at (02) 8-830-6000 to get your free quotation.</label>
      </div>
      <div class="confirm-btn-panel mt-4">
        <div class="btn-holder text-center">
          <input type="button" id="btnCantFindCar_ok" name="btnCantFindCar" class="row-dialog-btn btn btn-secondary btn-md_ pl-3 pr-3" value="Ok" />
        </div>
        </div>
      </div>
  </div>

<script type="text/javascript">
jQuery(document).ready(function($) {
  jQuery("#CBCantFind").prop("checked", false);

  jQuery("#btnCantFindCar_ok").click(function () {
    jQuery('#BlockCantFintCar').hide();
    jQuery("#CBCantFind").prop("checked", false);
  });

  jQuery('#CBCantFind').click(function() {
    if (jQuery(this).is(":checked")) {
      jQuery('#BlockCantFintCar').show();
    } else {
      jQuery('#BlockCantFintCar').hide();
    }
  });
});


</script>

<script type="text/javascript">


$(window).on('load', function() {
    // Retrieve the URI ID from the window location
    var transno = window.location.pathname.split('/').pop();
    $('#transno').val(transno);
    // Send an AJAX request to the controller
    $.ajax({
        url: "{{ route('motorController.check_disable', ['id' => ':id']) }}".replace(':id', transno),
        method: 'GET',
        success: function(response) {
            // Handle the response from the controller
            $('#check_disable2').val(response.status);
            var bodilyInjury = jQuery('#bodilyInjury').val(); //This will fetch the value  store to select variavle
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            jQuery.ajax({
                url: "{{ route('motorController.fetchBodyInjury') }}",
                method: "POST",
                data: $('#car_vehicle').serialize()+ "&bodilyInjury=" + bodilyInjury + "&_token=" + csrf_token,
                success: function(result) {
                var parsedResult = JSON.parse(result);
                jQuery('#bodyInjuryPc').val(parsedResult[0]);
                jQuery('#propertyDamagePc').val(parsedResult[1]);
                }
            })


            // Perform actions based on the response
            if (response.status == 1) {
                // Value contains "disabled all"
                // Perform corresponding actions
                $('#totalValue, #accessoryValue, #device_access_value,#seatNo').prop('readonly', true);
                $('#drpYear, #brand, #model,#device_access_year,#fader,#aon').prop('disabled', true);
            } else {
                // Value does not contain "disabled all"
                // Perform other actions if needed
            }
        }
    });
});

  $(document).ready(function() {
  $('#back_1').on('click', function() {
    var transno = $('#transno').val(); // Assuming the transno value is retrieved from an input field with the id "transno"
    var url = "{{ route('record_personal', ':transno') }}";
    url = url.replace(':transno', transno);
    window.location.href = url;
  });
});

$(document).ready(function() {
        $('#bodilyInjury').change(function() {
            var selectedValue = $(this).val();
            $('input[name="bodilyInjuryVal"]').val(selectedValue);
        });
    });
    $(document).ready(function() {
            // Event listener to update hidden field value when dropdown changes
            $('#drpYear').on('change', function() {
                var selectedValueyear = $(this).val();
            $('input[name="hiddenYear"]').val(selectedValueyear);

            });
        });
    $(document).ready(function() {
            // Event listener to update hidden field value when dropdown changes
            $('#brand').on('change', function() {
                var selectedValuebrand = $(this).val();
            $('input[name="hiddenBrand"]').val(selectedValuebrand);

            });
        });
        $(document).ready(function() {
            // Event listener to update hidden field value when dropdown changes
            $('#model').on('change', function() {
                var selectedValuemodel = $(this).val();
            $('input[name="hiddenModel"]').val(selectedValuemodel);

            });
        });


        jQuery("#totalValue").change(function() {
        var origval = jQuery('input[name=totalValuehid]').val();

        if(origval){
            var origvalue =  origval.replace(/[^a-z0-9\s.]/gi, '');
        var onwvalue =jQuery(this).val();
        onwvalue = onwvalue.replace(/,/g, '')
        if(jQuery.isNumeric(onwvalue)){
            var getmin = (origvalue*0.9);
            var getmax = (origvalue*1.1);
            minval = getmin.toFixed(2);
            maxval= getmax.toFixed(2);
                if(getmin > onwvalue){
                    // alert("Value should be greater than Php " + addCommas(minval));
                    var totalvalminmax = $('#totalvalminmax');
                    totalvalminmax.html("Value should be greater than Php" + Number(minval).toLocaleString('en')).css('color', 'red');
                    $('#totalvalminmax').css('border-color', '#F44336');

                    jQuery("#totalValue").val(addCommas(origvalue));
                }else if(getmax < onwvalue){
                    var totalvalminmax = $('#totalvalminmax');
                    totalvalminmax.html("Value should be less than Php " + Number(maxval).toLocaleString('en')).css('color', 'red');
                    $('#totalvalminmax').css('border-color', '#F44336');
                    jQuery("#totalValue").val(addCommas(origvalue));
                }else{
                    jQuery('#fader').val(onwvalue);
                    $('#totalvalminmax').hide();
                }
            }else{
                totalvalminmax.html("Incorrect Format").css('color', 'red');
                    $('#totalvalminmax').css('border-color', '#F44336');
                    jQuery("#totalValue").val(addCommas(origvalue));
            }
        }else{
        alert("Please select brand and model first");
        }
        });
        /// Compute
        $(".aon").change(function() {
        if(this.checked) {
            jQuery('#grossPrem').val('');
            jQuery(".aon").val('1');
             var aonratefromdb=  jQuery('#aonratenature').val();
            jQuery('#actOfNature').val(aonratefromdb);
        }else{
            jQuery('#grossPrem').val('');
            jQuery(".aon").val('0');
            jQuery('#actOfNature').val('0');
        }
    });


    var j = jQuery.noConflict();
    jQuery('#bodilyInjury').change(function() {
    jQuery('.bodyDropdown').val('1');
        if (jQuery(this).val() != "") { //Check if the dropdown has a value
            var bodilyInjury = jQuery('#bodilyInjury').val(); //This will fetch the value  store to select variavle

            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            jQuery.ajax({
                url: "{{ route('motorController.fetchBodyInjury') }}",
                method: "POST",
                data: $('#car_vehicle').serialize()+ "&bodilyInjury=" + bodilyInjury + "&_token=" + csrf_token,
                success: function(result) {
                    var parsedResult = JSON.parse(result);

                jQuery('#bodyInjuryPc').val(parsedResult[0]);
                jQuery('#propertyDamagePc').val(parsedResult[1]);
                }
            })
        }

    });


    $('#vehiclesave').click(function(e){
        e.preventDefault();
        jQuery.noConflict();


        var errornumber = 0;
             $(".validate_year").remove();
             $(".validate_brand").remove();
             $(".validate_model").remove();
             $(".validation_bodilyInjury").remove();
             $(".validation_grossPrem").remove();
             $(".validation_accessory").remove();
             $(".validation_accessoryValue").remove();
             $(".validate_seatno").remove();


             if($('#hiddenYear').val() === null || $('#hiddenYear').val() == ""){
                $('#drpYear').css('border-color', '#F44336');
                $("#drpYear").after("<div class='validate_year v-error-msg'>Year is Empty</div>");
                errornumber = 1;
              }else{
                $('#drpYear').css('border-color', '#4BB543');
              }


              if($('#hiddenBrand').val() === null || $('#hiddenBrand').val() == ""){
                $('#brand').css('border-color', '#F44336');
                $("#brand").after("<div class='validate_brand v-error-msg'  >Brand is Empty</div>");
                errornumber = 1;
              }else{
                $('#brand').css('border-color', '#4BB543');
              }

              if($('#hiddenModel').val() === null || $('#hiddenModel').val() == ""){
                $('#model').css('border-color', '#F44336');
                $("#model").after("<div class='validate_model v-error-msg'  >Model is Empty</div>");
                errornumber = 1;
              }else{
                $('#model').css('border-color', '#4BB543');
              }

              if($('#seatNo').val() === null || $('#seatNo').val() == ""){
                $('#seatNo').css('border-color', '#F44336');
                $("#seatNo").after("<div class='validate_seatno v-error-msg'  >Seat No is Empty</div>");
                errornumber = 1;
              }else{
                $('#seatNo').css('border-color', '#4BB543');
              }



            if($('#bodilyInjury').val() === null || $('#bodilyInjury').val() == ""){
                $('#bodilyInjury').css('border-color', '#F44336');
                $("#bodilyInjury").after("<div class='validation_bodilyInjury v-error-msg'  > Body Injury and Property Damage  is Empty</div>");
                errornumber = 1;
              }else{
                $('#bodilyInjury').css('border-color', '#4BB543');
              }


        if($('#grossPrem').val() === null || $('#grossPrem').val() == ""){
                $('#grossPrem').css('border-color', '#F44336');
                $("#displayrange").after("<div class='validation_grossPrem v-error-msg' >Desire Gross Premium is Empty</div>");
            errornumber = 1;
          }else{
            $('#displayrange').css('border-color', '#4BB543');
            $('#grossPrem').css('border-color', '#4BB543');
          }

          var hasValue = false;

            $('select[name="device_access_year[]"]').each(function(index) {
                var accessory = $(this).val();
                // console.log(accessory);

                if (accessory !== null && accessory !== "") {
                    hasValue = true;
                    return false; // exit the loop if any value is found
                }
            });

            // if (!hasValue) {
            //     $('#device_access_year').css('border-color', '#F44336');
            //     $("#device_access_year").after("<div class='validation_accessory v-error-msg'>Accessory is Empty</div>");
            //     errornumber = 1;
            // } else {
            //     $('#device_access_year').css('border-color', '#4BB543');
            // }
          if($('#device_access_value').val() === null || $('#device_access_value').val() == ""){
                $('#device_access_value').css('border-color', '#F44336');
                $("#device_access_value").after("<div class='validation_accessoryValue v-error-msg' >Accessory Value is Empty</div>");
            errornumber = 1;
          }else{
            $('#device_access_value').css('border-color', '#4BB543');
          }



        if(errornumber == 1){
          return false;
        }

        var transno = $("input[name='transno']").val();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var form = $('#car_vehicle')[0]; // Get the underlying DOM form element
        var formData = new FormData(form);
        formData.append('trans_id', transno);
        formData.append('_token', _token);


        // Iterate over the accessory dropdowns and text fields
        $('select[name="device_access_year[]"]').each(function(index) {
        var accessory = $(this).val();
        formData.append('device_access_year[]', accessory);
        });

        var isFirstValue = true;
        $('input[name="device_access_value[]"]').each(function(index, element) {
        if (isFirstValue) {
            isFirstValue = false;
            return; // Skip adding the first value to the formData
        }
        var accessoryValue = $(element).val();
        formData.append('device_access_value[]', accessoryValue);
        });


       $.ajax({
          type:'POST',
            url: "{{ url('/get-policy-quote/vehicle/save')}}",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
           success: (response) => {
            // Get the type of car

            var id = $('#transno').val();

            var url = "{{ route('record_motor_detail', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;


           },
           error: function(response){
            // console.log(response);

          }
       });
  });

        jQuery(document).on('input', '#fader', function() {
            jQuery('#slider_value').html( jQuery(this).val() );
            jQuery("#totalValue").val(addCommas((jQuery(this).val()).toString(2)));
        });

        jQuery("#grossPrem,#totalValue,#accessoryValue").on({
            keyup: function() {
            formatCurrency(jQuery(this));
            },
            blur: function() {
            formatCurrency(jQuery(this), "blur");
            }

        });
        $(document).ready(function() {
            $('#grossPrem').change(function(e) {
                var txtVal = $(this).val();
                $('#grossPrem1').val(txtVal );

                var accessoryValues = $("input[name='accessoryValue[]']").map(function(){
                return $(this).val().replace(/[^a-z0-9\s.]/gi, '');
            }).get();

            var deviceAccessValues = $("input[name='device_access_value[]']").map(function(){
                return $(this).val().replace(/[^a-z0-9\s.]/gi, '');
            }).get();

            var mergedArray = accessoryValues.concat(deviceAccessValues);

                    var AccesoryTotal = 0;
                    $.each( mergedArray, function( index, value ){
                    AccesoryTotal +=parseFloat(value);
                    });

                    jQuery('#totalAcceso').val(AccesoryTotal);
                    var eVal = (isNaN(AccesoryTotal)) ? 0 : AccesoryTotal;

                   // Body INJURY
                   var bodyInjury = jQuery('#bodyInjuryPc').val();
                    var propertyDamage = jQuery('#propertyDamagePc').val();

                    // TOTAL VALUE FAIR MARKET VALUE
                    var totalValue =  jQuery('#totalValue').val();

                    var totalval = totalValue.replace(/[^a-z0-9\s.]/gi, '');

                    var totalValCompute =  parseFloat(totalval)   + parseFloat(eVal) ;
                    //AOD AOD
                    var aod = jQuery('#actOfNature').val();
                    if( typeof aod === 'undefined' || aod === null  || aod === '' ){
                    // myVar is undefined or null
                    var aod = '0.00';
                    }else{
                        var aod = jQuery('#actOfNature').val();
                    }


                    // OWND DAMAGE THEF

                    var seattypevalue = $('#model').val().toLowerCase();
                    var owdRate;

                    if (seattypevalue.indexOf('truck') !== -1 || seattypevalue.indexOf('bus') !== -1) {
                        owdRate = 0.00;
                    } else if (seattypevalue.indexOf('suv') !== -1 || seattypevalue.indexOf('van') !== -1 ||
                            seattypevalue.indexOf('pick-up') !== -1 || seattypevalue.indexOf('auv') !== -1) {
                        owdRate = 0.009;
                    } else {
                        //sedan
                        owdRate = 0.007;
                    }


                    var minODT = owdRate *  parseFloat(totalValCompute)
                    var maxODT = 0.03 *  parseFloat(totalValCompute)

                    // COMPUTATION WILL UNDERGO HERE  MINIMUM DESIRE GROSS PREMIUM




                    var getMinOdt = parseFloat(minODT);
                    var getAOD =  parseFloat(totalValCompute) * parseFloat(aod);
                    var basepremium = parseFloat(getMinOdt) + parseFloat(bodyInjury) + parseFloat(propertyDamage) + parseFloat(getAOD);


                    var docstomp = Math.ceil(basepremium/4)/2;
                    var vat = basepremium * 0.12;
                    var localgovernment = basepremium  * 0.002;
                    var minGross = basepremium + docstomp + vat + localgovernment;

                    // var validateMinGross  = Number(minGross.toFixed(2)).toLocaleString('en');
                    var validateMinGross = parseFloat(minGross.toFixed(2).replace(/,/g, ''));
                    /// END OF MINIMUM COMPUTATION

                      // COMPUTATION WILL UNDERGO HERE  MAXIMUM DESIRE GROSS PREMIUM

                    // var getMaxOdt =parseFloat(maxODT);
                    // var getAOD =  parseFloat(totalValCompute) * parseFloat(aod);
                    // var basepremium = parseFloat(getMaxOdt) + parseFloat(bodyInjury) + parseFloat(propertyDamage) + parseFloat(getAOD);

                    // var docstomp = Math.ceil(basepremium/4)/2;
                    // var vat = basepremium * 0.12;
                    // var localgovernment = basepremium  * 0.002;
                    // var maxGross = basepremium + docstomp + vat + localgovernment;
                    // var validateMaxGross = parseFloat(maxGross.toFixed(2).replace(/,/g, ''));

                    /// END OF MAXIMUM COMPUTATION
                    var grossPrem =  parseFloat($('#grossPrem1').val().replace(/,/g, ''));


                if (parseFloat(grossPrem) >= parseFloat(validateMinGross) ) {
                    // console.log('good');
                    $('#displayrange').hide();
                } else {
                    // console.log('error');
                        var min = minGross.toFixed(2);
                        jQuery('#minVal').html(Number(min).toLocaleString('en'));
                        // var max = maxGross.toFixed(2);
                        // jQuery('#maxVal').html(Number(max).toLocaleString('en'));
                        var displayRange = $('#displayrange');
                        displayRange.html("Min: " + Number(min).toLocaleString('en')).css('color', 'red');

                        $('#displayrange').css('border-color', '#F44336');
                        jQuery('#grossPrem').val('');
                     // Update the appended value when an error occurs
                        displayRange.html("Min: " + Number(minGross).toLocaleString('en') ).css('color', 'red');
                    $('#displayrange').show();
                    }

            });
        });




        jQuery(document).ready(function(){
                  // Jquery Dependency
              jQuery(".accessoryValue2").on({
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
                jQuery(".otherdivAccessory").show();
              var accessory1 = jQuery( ".selectaccessory" ).val();
                  if(accessory1 === "Others"){
                          jQuery(".otherdivAccessory").show();
                      }else{
                          //jQuery(".otherdivAccessory").hide();
                  }
              jQuery('.selectaccessory').change(function(){
                  if(jQuery(this).val() != '')                                        {
                        var accessory = jQuery(this).val();
                        if(accessory === "Others"){
                          jQuery(".otherdivAccessory").show();
                        }else{
                          //jQuery(".otherdivAccessory").hide();
                        }

                  }
                  });

          });


    </script>

@include('getaquote.motor_net.update.otherline_motor')
@endsection
