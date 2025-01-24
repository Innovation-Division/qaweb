<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>


<link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>





<style type="text/css">
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
    .bonds_label{
        font-size:20px !important;
    }
</style>
<!-- <style type="text/css">
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
</style> -->
<input type="hidden" name="url" name="url" value="{{url('/')}}">
<div class="container_ b5form">
    <div class="row_">
        <div>
            <button type='button' class="mb-5 action back linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button>
        </div>
        <input type="hidden" name="hidURL" id="hidURL" value="{{url('/')}}">
        <input id="transno" name="transno" type="text" value=" {{ session('session-id ') }}" class="hide">
        <input id="quoteno" name="quoteno" type="text" value="" class="hide">


        <div class="step">
            <!-- <form id="motor_project" name="motor_project" method="post" enctype="multipart/form-data" action="javascript:void(0)"> -->
            @include('getaquote.motor_net.step1motor')
            <!-- </form> -->
        </div>
        <div class="step">
            @include('getaquote.motor_net.step2motor')
        </div>
        <div class="step">
            @include('getaquote.motor_net.step3motor')
        </div>
        <div class="step">
            @include('getaquote.motor_net.step4motor')
        </div>
        <div class="step">
            @include('getaquote.motor_net.step5motor')


        </div>
        <div class="col-md-12_ break-two"> <br> </div>
        <div  class="col-md-12">
        <div class="col-md-12_ text-center mt-5">
            <div id="nextbutton" name="nextbutton">
                <button  id="next" name="next" type="button"  class="action next btn btn-secondary a-btn-slide-text_">Next</button>
            </div>
        </div>
        <div class="progress mt-5 p-0">
            <div class="progress-bar"></div>
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
        </div>

<div id="BlockUIConfirm" class="BlockUIConfirm confirm-modal">
    <div class="blockui-mask"></div>
    <div class="RowDialogBody px-5">
      <div class="confirm-body row-dialog-hdr-success text-center">
        <br>
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

  <div id="policyDate" class="policyDate confirm-modal" style="display: none">
    <div class="blockui-mask"></div>
    <div class="RowDialogBody px-5">
      <div class="confirm-body row-dialog-hdr-success text-center">
        <br>
        <div class="mb-5"><img class="logo" src="{{ asset('assets/img/logo.svg') }}" alt="cocogen logo" /></div>
        <table>
          <tr>
            <td><label class="rfs-1-5 rfs-md-1 fw-normal">You've entered a retroactive date. Please confirm if your vehicle has no loss as of this date</label></td>
          </tr>
          <tr><td><br></td></tr>
           <tr>
            <td>
              <div class="form-check d-flex_ text-left">
                <input class="form-check-input" type="checkbox" id="chckcConfirm" name="chckcConfirm" value="1" <?php if(old('chckcConfirm')){ echo "checked";} ?>>
                <label class="rfs-1-5 rfs-md-1 fw-normal form-check-label ml-1" for="chckcConfirm">I confirm that the Policy period is correct and warranted no losses as of this date</label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="confirm-btn-panel mt-4">
        <div class="btn-holder text-center">
          <input type="button" id="btnConfirmPolicy" name="btnConfirmPolicy" class="row-dialog-btn btn btn-secondary btn-md_" value="Confirm" />
        </div>
        </div>
      </div>
    </div>
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
    @include('getaquote.motor_net.otherline_motor')

