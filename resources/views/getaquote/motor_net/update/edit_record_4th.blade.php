@extends('layouts.layout1')
@section('content')
@include('getaquote.motor_net.update.motor_header')
<style type="text/css">
    /* .modal {
text-align: center;
top:30%;
} */
    .hide {
        display: none;
    }

    #homepagediv {
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
    #btnRenewal {
        min-width: 267px;
        margin-left: 20px;
        min-height: 60px;
        background-color: #C0C0C0;
        color: #000000;
        margin-top: 20px;
    }


    #btnnewApplication:hover {
        background-color: #4CAF50;
        /* Green */
        color: white;
    }

    #btnRenewal:hover {
        background-color: #4CAF50;
        /* Green */
        color: white;
    }


    @media only screen and (max-width: 800px) {
        #homepagediv {
            margin-top: 10px;
            margin-bottom: 30px;
        }

    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0px;
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

    .bonds_label {
        font-size: 20px !important;
    }
    .fileUpload {
    position: relative;
    overflow: hidden;
    height: 46px;
    font-size: 20px;
}
.fileUpload input.uploadlogo {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 100%;
    height: 46px;
}
</style>
    <div class="main-content container">
        <div class="inner">
            <div>
                <button type='button' class="btn btn-secondary-light back_3" id='back_3' style="min-width: auto;">< Back</button>
            </div>
            <div class="col-md-12_ break-two"><br></div>
            <div class="col-md-12_ break-two"><br></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="top-container">
                        <input type="hidden" name="url" name="url" value="{{ url('/') }}">
                        <form id="car_vehicle_others" name="car_vehicle_others" method="post"  enctype="multipart/form-data">

                            <div class="col-md-12" style="margin-bottom:10px;">
                                <h1 style='color: #008080;'> Additional Car Information </h1>
                            </div>
                            <input type='hidden' name='check_disable' id='check_disable' class='check_disable'>
                            @foreach ($cocogen_additional_other_info as $motor_add_info )
                            <input id="transno" name="transno" type="text" value="{{ $motor_add_info->gid }}" class="hide">

                            <div class="row">
                                <div class="col-md-4">
                                    <label>MV File No.</label>
                                    <input id="mvfileno" name="mvfileno" type="text" class="form-control input-lg" maxlength="100"  value="{{ $motor_add_info->mvFileNo }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Plate No.</label>
                                    <input id="plateno" name="plateno" type="text" class="form-control input-lg" maxlength="100"  value="{{ $motor_add_info->plateNo }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Engine No.</label>
                                    <input id="engineno" name="engineno" type="text" class="form-control input-lg" maxlength="100"  value="{{ $motor_add_info->engineNo }}">
                                </div>
                            </div>
                            <div class="col-md-12 break-two"><br></div>
                            <div class="col-md-12 break-two"><br></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Color</label>
                                    <input id="color" name="color" type="text" class="form-control input-lg" maxlength="100"  value='{{ $motor_add_info->color }}'>
                                </div>
                                <div class="col-md-4">
                                    <label>Conduction Sticker No.</label>
                                    <input id="conduction" name="conduction" type="text" class="form-control input-lg" maxlength="100" value='{{ $motor_add_info->conductionStickerNo }}'>
                                </div>
                                <div class="col-md-4">
                                    <label>Chasis No.</label>
                                    <input id="chasis" name="chasis" type="text" class="form-control input-lg" maxlength="100" value='{{ $motor_add_info->chasisNo }}'>
                                </div>
                            </div>

                            <div class="col-md-12 break-two"><br></div>
                            <div class="col-md-12 break-two"><br></div>

                            <div>
                                <h4 class=" rfs-2-5 rfs-md-1-3">Period of Insurance</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Policy Incept Date</label>
                                    <input id="policyincept" name="policyincept" type="text" class="form-control input-lg" maxlength="100" value='{{ $motor_add_info->policyInceptionDate }}'>
                                </div>
                                <div class="col-md-4">
                                    <label>Mortgagee</label>
                                    <input id="morgagee" name="morgagee" type="text" class="form-control input-lg" maxlength="100" value='{{ $motor_add_info->mortgageValue }}'>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="col-md-12 break-two"><br></div>
                            <div class="col-md-12 break-two"><br></div>
                            <div>
                                <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Other Personal Data</h4>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('gender_personal_info') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="gender_personal_info">Gender</label>
                                            <select id="gender_personal_info" name="gender_personal_info"  class="form-control selectpicker select-input-border-color-gender selectb5" data-style="input-lg select-input-border-color-gender" data-size="10">
                                                    <option value="">- Select -</option>
                                                    <option value="Male" <?php if($motor_add_info->gender === 'Male'){ ?>  selected="selected" <?php } ?>>Male</option>
                                                    <option value="Female"  <?php if($motor_add_info->gender === 'Female'){ ?>  selected="selected" <?php } ?>>Female</option>
                                            </select>
                                            @if ($errors->has('gender_personal_info'))
                                                <style type="text/css">
                                                    .select-input-border-color-gender{
                                                        border-color: darkred !important;
                                                    }
                                                </style>
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('gender_personal_info') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('birthDate') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="birthDate">Date of Birth</label>
                                            <input name="birthDate" id="birthDate"  type="text" class="form-control input-lg NoPaste personal_ifno_mobile"  maxlength="100" placeholder="MM/DD/YYYY"  value='{{ $motor_add_info->birthDate }}'>
                                                @if ($errors->has('birthDate'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('place_of_birth_other_personal_info') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="place_of_birth_other_personal_info">Place of Birth</label>
                                            <input name="place_of_birth_other_personal_info" id="place_of_birth_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{ $motor_add_info->placeOfBirth }}">
                                                @if ($errors->has('place_of_birth_other_personal_info'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('place_of_birth_other_personal_info') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('status_other_personal_info') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="status_other_personal_info">Civil Status</label>
                                            <select  id="status_other_personal_info" name="status_other_personal_info" class="form-control selectpicker select-input-border-color-status selectb5" data-style="input-lg select-input-border-color-status" data-size="10"  data-live-search="true" >
                                                    <option value="">- Select -</option>
                                                    <option value="Single" <?php if($motor_add_info->civilStatus === 'Single'){ ?>  selected="selected" <?php } ?>>Single</option>
                                                    <option value="Married" <?php if($motor_add_info->civilStatus === 'Married'){ ?>  selected="selected" <?php } ?>>Married</option>
                                                    <option value="Widowed" <?php if($motor_add_info->civilStatus === 'Widowed'){ ?>  selected="selected" <?php } ?>>Widowed</option>
                                                    <option value="Seprated" <?php if($motor_add_info->civilStatus === 'Seprated'){ ?>  selected="selected" <?php } ?>>Seprated</option>
                                                    <option value="Divorced" <?php if($motor_add_info->civilStatus === 'Divorced'){ ?>  selected="selected" <?php } ?>>Divorced</option>
                                            </select>
                                            @if ($errors->has('status_other_personal_info'))
                                                <style type="text/css">
                                                    .select-input-border-color-status{
                                                        border-color: darkred !important;
                                                    }
                                                </style>
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('status_other_personal_info') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12_ break-two"> <br> <br> </div>

                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('nationality_other_personal_info') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="nationality_other_personal_info">Nationality</label>
                                            <input name="nationality_other_personal_info" id="nationality_other_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="/[a-zA-Z.]+/" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{ $motor_add_info->nationality }}">
                                            @if ($errors->has('nationality_other_personal_info'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nationality_other_personal_info') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('occupation') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="occupation">Occupation</label>
                                            <input name="occupation" id="occupation" type="text" onkeypress="return /[a-z. ]/i.test(event.key)"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{ $motor_add_info->occupation }}">
                                                @if ($errors->has('occupation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('occupation') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('telNo') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="telNo">Telephone Number</label>
                                            <input name="telNo" id="telNo" type="text"  onkeypress="CheckNumeric(event);" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{ $motor_add_info->telNo }}">
                                            @if ($errors->has('telNo'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telNo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group{{ $errors->has('type_of_id_personal_info') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="type_of_id_personal_info">Type of ID</label>
                                            <select id="type_of_id_personal_info" name="type_of_id_personal_info" class="form-control selectpicker select-input-border-color-IDtype selectb5" data-style="input-lg select-input-border-color-IDtype" data-size="10" data-live-search="true">
                                                <option value="">- Select -</option>
                                                <option value="Philippine Passport" {{ $motor_add_info->typeOfId === 'Philippine Passport' ? 'selected' : '' }}>Philippine Passport</option>
                                                <option value="Driver's License" {{ $motor_add_info->typeOfId === "Driver's License" ? 'selected' : '' }}>Driver's License</option>
                                                <option value="SSS/GSIS UNID Card" {{ $motor_add_info->typeOfId === 'SSS/GSIS UNID Card' ? 'selected' : '' }}>SSS/GSIS UNID Card</option>
                                                <option value="Philhealth ID" {{ $motor_add_info->typeOfId === 'Philhealth ID' ? 'selected' : '' }}>Philhealth ID</option>
                                                <option value="Postal ID" {{ $motor_add_info->typeOfId === 'Postal ID' ? 'selected' : '' }}>Postal ID</option>
                                                <option value="TIN Card" {{ $motor_add_info->typeOfId === 'TIN Card' ? 'selected' : '' }}>TIN Card</option>
                                                <option value="Voter's ID" {{ $motor_add_info->typeOfId === "Voter's ID" ? 'selected' : '' }}>Voter's ID</option>
                                                <option value="PRC ID" {{ $motor_add_info->typeOfId === 'PRC ID' ? 'selected' : '' }}>PRC ID</option>
                                                <option value="Senior Citizen ID" {{ $motor_add_info->typeOfId === 'Senior Citizen ID' ? 'selected' : '' }}>Senior Citizen ID</option>
                                                <option value="OFW ID" {{ $motor_add_info->typeOfId === 'OFW ID' ? 'selected' : '' }}>OFW ID</option>
                                            </select>
                                            @if ($errors->has('type_of_id_personal_info'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('type_of_id_personal_info') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            <div class="col-md-12_ break-two"> <br> </div>

                            <div class="row">


                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group  {{ $errors->has('idno_other_personal_info') ? ' has-error' : '' }}">
                                        <div class="col-md-3_">
                                            <label for="idno_other_personal_info">ID Number</label>
                                            <input name="idno_other_personal_info" id="idno_other_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value="{{ $motor_add_info->idNum }}">
                                            @if ($errors->has('idno_other_personal_info'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('idno_other_personal_info') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6">
                                    <div id="fromCopy" class="col-md-3_ form-group">
                                        <div><label for="file-upload" class="invisible">Upload</label></div>
                                        <div class="fileUpload btn btn-secondary-light">
                                            <span>Upload your ID</span>
                                            <input id="file-upload" name='file' type="file" class="uploadlogo" accept="image/x-png,image/jpeg"  value='{{ $motor_add_info->idNo }}' />
                                            <input type="hidden" id="file-upload-value" value="{{ $motor_add_info->idNo }}" />
                                        </div>
                                        <div>
                                            <label id="upload_Error" class="help-block" style="display: none; color: #CF3C4B; font-size: 15px;"></label>
                                            <label id="upload_file" style="display: none">File: <span id="upload_file_file" class="text-color-secondary"></span> <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i></label>
                                            <label id="upload_label" class="rfs-0-15">File must be in .jpeg or .png format not exceeding 5MB</label>
                                            <input type='hidden' name='hiddenUploadname' id='idNo' value='{{ $motor_add_info->idNo }}'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <br />

                            <div class="row">
                                <div class="col-12">
                                    <div class="col-md-3_ text-center">
                                        <input type="submit"  id="CompreThirdTabNext"  name="CompreThirdTabNext" class="form-control_ btn btn-secondary" value="Next" />
                                    </div>
                                </div>
                            </div>

                            </form>
                        <div class="container_ b5form">
                            <div class="row_">
                                <div>
                                    <button type='button' class="mb-5 action back linkbutton btn btn-secondary-light"
                                        style="min-width: auto;">
                                        < Back</button>
                                </div>
                                <input type="hidden" name="hidURL" id="hidURL" value="{{ url('/') }}">

                                <div class="progress mt-5 p-0">
                                    <div class="progress-bar" style="width: 20%;"></div>
                                </div>
                            </div>
                        </div>
                        @include('getaquote.motor_net.update.otherline_motor')

                    </div>
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



    <section class="divider">
        <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
    </section>

<script>

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
            console.log(response);
            $('#check_disable').val(response.status);
            // Perform actions based on the response
            if (response.status == 1) {

                // Value contains "disabled all"
                // Perform corresponding actions
                $(' #mvfileno, #plateno, #engineno, #color, #conduction, #chasis, #policyincept, #morgagee, #gender_personal_info, #birthDate, #place_of_birth_other_personal_info, #nationality_other_personal_info, #occupation, #telNo, #type_of_id_personal_info, #idno_other_personal_info').prop('readonly', true);
                $('#gender_personal_info,#status_other_personal_info,#type_of_id_personal_info,.uploadlogo').prop('disabled', true);

            } else {
                // Value does not contain "disabled all"
                // Perform other actions if needed
            }
        }
    });
});


        $('#CompreThirdTabNext').click(function(e){
        e.preventDefault();

          $(".validation_plateno").remove();
                $(".validation_plateno_check_error").remove();
                $(".validation_plateno_check_success").remove();

                $(".validation_engineno").remove();
                $(".validation_engineno_check_error").remove();
                $(".validation_engineno_check_success").remove();

                $(".validation_color").remove();
                $(".validation_color_check_error").remove();
                $(".validation_color_check_success").remove();

                // $(".validation_conduction").remove();
                // $(".validation_conduction_check_error").remove();
                // $(".validation_conduction_check_success").remove();

                // $(".validation_mvfileno").remove();
                // $(".validation_mvfileno_check_error").remove();
                // $(".validation_mvfileno_check_success").remove();

                $(".validation_policyincept").remove();
                $(".validation_policyincept_check_error").remove();
                $(".validation_policyincept_check_success").remove();

                $(".validation_chasis").remove();
                $(".validation_chasis_check_error").remove();
                $(".validation_chasis_check_success").remove();

                $(".validation_gender_personal_info").remove();
	     		$(".validation_gender_personal_info_check_error").remove();
	     		$(".validation_gender_personal_info_check_success").remove();

	     		$(".validation_status_other_personal_info").remove();
	     		$(".validation_status_other_personal_info_check_error").remove();
	     		$(".validation_status_other_personal_info_check_success").remove();

                $(".validation_birthDate_validation").remove();
	     		$(".validation_birthDate_check_error").remove();
	     		$(".validation_birthDate_check_success").remove();

                 $(".validation_status_other_personal_info").remove();
	     		$(".validation_status_other_personal_info_check_error").remove();
	     		$(".validation_status_other_personal_info_check_success").remove();

	     		$(".validation_nationality_other_personal_info").remove();
	     		$(".validation_nationality_other_personal_info_check_error").remove();
	     		$(".validation_nationality_other_personal_info_check_success").remove();

	     		$(".validation_place_of_birth_other_personal_info").remove();
	     		$(".validation_place_of_birth_other_personal_info_check_error").remove();
	     		$(".validation_place_of_birth_other_personal_info_check_success").remove();

	     		$(".validation_type_of_id_personal_info").remove();
	     		$(".validation_type_of_id_personal_info_check_error").remove();
	     		$(".validation_type_of_id_personal_info_check_success").remove();

	     		$(".validation_idno_other_personal_info").remove();
	     		$(".validation_idno_other_personal_info_check_error").remove();
	     		$(".validation_idno_other_personal_info_check_success").remove();


                 $(".validation_occupation_personal_info").remove();
	     		$(".validation_occupation_personal_info_check_error").remove();
	     		$(".validation_occupation_personal_info_check_success").remove();

 				$(".validation_tel_no_info").remove();
	     		$(".validation_tel_no_info_check_error").remove();
	     		$(".validation_tel_no_info_check_success").remove();

                 errornumber= 0;
                // if($('#mvfileno').val() == "" || $('#mvfileno').val() == null){
                //     $('#mvfileno').css('border-color', '#F44336');
                //     $("#mvfileno").after("<div class='validation_mvfileno v-error-msg'>MV File no is empty</div>");
                //     $('#mvfileno').after('<i class="fa fa-times-circle validation_mvfileno_check_error fa-1x " aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                //     errornumber = 1;
                // }else{
                //     $('#mvfileno').after('<i class="fa fa-check-circle validation_mvfileno_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                //     $('#mvfileno').css('border-color', '#4BB543');
                // }


                if($('#plateno').val() == "" || $('#plateno').val() == null){
                    $('#plateno').css('border-color', '#F44336');
                    $("#plateno").after("<div class='validation_plateno v-error-msg''>Plate no is empty</div>");
                    $('#plateno').after('<i class="fa fa-times-circle validation_plateno_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                    errornumber = 1;
                }else{
                    $('#plateno').after('<i class="fa fa-check-circle validation_plateno_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                    $('#plateno').css('border-color', '#4BB543');
                }

                if($('#engineno').val() == "" || $('#engineno').val() == null){
                    $('#engineno').css('border-color', '#F44336');
                    $("#engineno").after("<div class='validation_engineno v-error-msg'>Engine no is empty</div>");
                    $('#engineno').after('<i class="fa fa-times-circle validation_engineno_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                    errornumber = 1;
                }else{
                    $('#engineno').after('<i class="fa fa-check-circle validation_engineno_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                    $('#engineno').css('border-color', '#4BB543');
                }

                if($('#color').val() == "" || $('#color').val() == null){
                    $('#color').css('border-color', '#F44336');
                    $("#color").after("<div class='validation_color v-error-msg''>Color is empty</div>");
                    $('#color').after('<i class="fa fa-times-circle validation_color_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                    errornumber = 1;
                }else{
                    $('#color').after('<i class="fa fa-check-circle validation_color_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                    $('#color').css('border-color', '#4BB543');
                }

                // if($('#conduction').val() == "" || $('#conduction').val() == null){
                //     $('#conduction').css('border-color', '#F44336');
                //     $("#conduction").after("<div class='validation_conduction v-error-msg''>Conduction Sticker No is empty</div>");
                //     $('#conduction').after('<i class="fa fa-times-circle validation_conduction_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                //     errornumber = 1;
                // }else{
                //     $('#conduction').after('<i class="fa fa-check-circle validation_conduction_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                //     $('#conduction').css('border-color', '#4BB543');
                // }
                if($('#plateno').val() == "" || $('#plateno').val() == null){
                    if($('#chasis').val() == "" || $('#chasis').val() == null){
                        $('#chasis').css('border-color', '#F44336');
                        $("#chasis").after("<div class='validation_chasis v-error-msg''>Chasis is empty</div>");
                        $('#chasis').after('<i class="fa fa-times-circle validation_chasis_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                        errornumber = 1;
                    }else{
                        $('#chasis').after('<i class="fa fa-check-circle validation_chasis_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                        $('#chasis').css('border-color', '#4BB543');
                    }

                }

                if($('#policyincept').val() == "" || $('#policyincept').val() == null){
                    $('#policyincept').css('border-color', '#F44336');
                    $("#policyincept").after("<div class='validation_policyincept v-error-msg''>Policy Incept is empty</div>");
                    $('#policyincept').after('<i class="fa fa-times-circle validation_policyincept_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                    errornumber = 1;
                }else{
                    $('#policyincept').after('<i class="fa fa-check-circle validation_policyincept_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                    $('#policyincept').css('border-color', '#4BB543');
                }



	     		//validation gender
	     		if($('#gender_personal_info').val() == ""){
						$("#gender_personal_info").after("<div class='validation_gender_personal_info v-error-msg'>Gender is empty</div>");
						$('#gender_personal_info').fieldErrorState();
	     			errornumber = 1;
	     		}else{
						$('#gender_personal_info').fieldSuccessState();
	     		}

                 if($('#birthDate').val() == "" || $('#birthDate').val() == null){
                    $('#birthDate').css('border-color', '#F44336');
                    $("#birthDate").after("<div class='validation_birthDate_validation v-error-msg'>Birth Date is empty</div>");
                    $('#birthDate').after('<i class="fa fa-times-circle validation_birthDate_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                    errornumber = 1;
                }else{
                    $('#birthDate').after('<i class="fa fa-check-circle validation_birthDate_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                    $('#birthDate').css('border-color', '#4BB543');
                }

                     		//validation place of birth
	     		if($('#place_of_birth_other_personal_info').val() == ""){
                    $("#place_of_birth_other_personal_info").after("<div class='validation_place_of_birth_other_personal_info v-error-msg'>Place of birth is empty</div>");
	     			$('#place_of_birth_other_personal_info').fieldErrorState();
	     			errornumber = 1;
	     		}else{
	     		// $('#place_of_birth_other_personal_info').css('border-color', '#4BB543');
	     			$('#place_of_birth_other_personal_info').fieldSuccessState();
	     		}


                 if($('#status_other_personal_info').val() == ""){
						$("#status_other_personal_info").after("<div class='validation_status_other_personal_info v-error-msg'>Status is empty</div>");
	     			$('#status_other_personal_info').fieldErrorState();
                     errornumber = 1;
	     		}else{
	     			$('#status_other_personal_info').fieldSuccessState();
	     		}

	     		//validation nationality
	     		if($('#nationality_other_personal_info').val() == ""){
						$("#nationality_other_personal_info").after("<div class='validation_nationality_other_personal_info v-error-msg'>Nationality is empty</div>");
	     			$('#nationality_other_personal_info').fieldErrorState();
	     			errornumber = 1;
	     		}else{
	     			$('#nationality_other_personal_info').fieldSuccessState();
	     		}

                	//validation occupation
	     		if($('#occupation').val() == ""){
	     			// $('.btn-white-occupation_personal_info').css('border-color', '#CF3C4B');
						$("#occupation").after("<div class='validation_occupation_personal_info v-error-msg'>Occupation is empty</div>");
	     			// $('#occupation_personal_info').after('<i class="fa fa-times-circle validation_occupation_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-40px !important;color: #CF3C4B;size:20px;z-index: 2 !important;"></i>');
						$('#occupation').fieldErrorState();
	     			errornumber = 1;
	     		}else{
	     			// $('#occupation_personal_info').after('<i class="fa fa-check-circle validation_occupation_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-25px !important;coccupation_personal_info;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     			// $('.btn-white-occupation_personal_info').css('border-color', '#4BB543');
						$('#occupation').fieldSuccessState();
	     		}

                	//validation occupation
	     		// if($('#telNo').val() == ""){
	     		// 	// $('.btn-white-occupation_personal_info').css('border-color', '#CF3C4B');
				// 		$("#telNo").after("<div class='validation_occupation_personal_info v-error-msg'>Telephone Number is empty</div>");
	     		// 	// $('#occupation_personal_info').after('<i class="fa fa-times-circle validation_occupation_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-40px !important;color: #CF3C4B;size:20px;z-index: 2 !important;"></i>');
				// 		$('#telNo').fieldErrorState();
	     		// 	errornumber = 1;
	     		// }else{
	     		// 	// $('#occupation_personal_info').after('<i class="fa fa-check-circle validation_occupation_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-25px !important;coccupation_personal_info;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
	     		// 	// $('.btn-white-occupation_personal_info').css('border-color', '#4BB543');
				// 		$('#telNo').fieldSuccessState();
	     		// }



	     		//validation type of ID
	     		if($('#type_of_id_personal_info').val() == ""){
	     			// $('.btn-white-type_of_id_personal_info').css('border-color', '#CF3C4B');
						$("#type_of_id_personal_info").after("<div class='validation_type_of_id_personal_info v-error-msg'>Type of ID is empty</div>");
	     			// $('#type_of_id_personal_info').after('<i class="fa fa-times-circle validation_type_of_id_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-25px !important;color: #CF3C4B;z-index: 2 !important;"></i>');
	     			$('#type_of_id_personal_info').fieldErrorState();
	     			errornumber = 1;
	     		}else{
	     			// $('#type_of_id_personal_info').after('<i class="fa fa-check-circle validation_type_of_id_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-25px !important;color: #4BB543;z-index: 2 !important;"></i>');
	     			// $('.btn-white-type_of_id_personal_info').css('border-color', '#4BB543');
	     			$('#type_of_id_personal_info').fieldSuccessState();
	     		}

	     		//validation id no
	     		if($('#idno_other_personal_info').val() == ""){
	     			// $('#idno_other_personal_info').css('border-color', '#CF3C4B');
						$("#idno_other_personal_info").after("<div class='validation_idno_other_personal_info v-error-msg'>ID No is empty</div>");
	     			// $('#idno_other_personal_info').after('<i class="fa fa-times-circle validation_idno_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #CF3C4B;size:20px;"></i>');
	     			$('#idno_other_personal_info').fieldErrorState();
	     			errornumber = 1;
	     		}else{
	     			// $('#idno_other_personal_info').after('<i class="fa fa-check-circle validation_idno_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
	     			// $('#idno_other_personal_info').css('border-color', '#4BB543');
	     			$('#idno_other_personal_info').fieldSuccessState();
	     		}


                if($('#check_disable').val() != 1){

                    if ($('#file-upload')[0].files.length == 0) {
                        console.log('A');
                        $("#upload_Error").html("Please upload your ID.");
                        $("#upload_Error").show();
                        $("#upload_label").hide();
                        $("#upload_file").hide();
                        errornumber = 1;
                    }
                }




                if(errornumber == 1){
                     return false;
                 }


        var transno = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var form = $('#car_vehicle_others')[0]; // Get the underlying DOM form element
        var formData = new FormData(form);
        formData.append('trans_id', transno);
        formData.append('_token', csrf_token);


       $.ajax({
          type:'POST',
            url: "{{ url('/get-policy-quote/vehicle/additionalInfo')}}",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
           success: (response) => {

            var url = "{{ route('record_motor_payment', ':transno') }}";
                url = url.replace(':transno', transno);
                window.location.href = url;
           },
           error: function(response){
            console.log(response);

          }
       });

  });

  $(document).ready(function() {
  $('#back_3').on('click', function() {
    var transno = $('#transno').val(); // Assuming the transno value is retrieved from an input field with the id "transno"
    var url = "{{ route('record_motor_detail', ':transno') }}";
    url = url.replace(':transno', transno);
    window.location.href = url;
  });
});

        function CheckNumeric(e) {
        if (window.event) // IE
        {
            if ((e.keyCode < 48 || e.keyCode > 57) & e.keyCode != 8 && e.keyCode != 44) {
                event.returnValue = false;
                return false;
            }
        }
        else { // Fire Fox
            if ((e.which < 48 || e.which > 57) & e.which != 8 && e.which != 44) {
                e.preventDefault();
                return false;
            }
        }
    }
   </script>
@endsection
