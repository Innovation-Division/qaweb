@extends('layouts.layout1')
@section('content')
@include('getaquote.motor_net.update.motor_header')

<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">
                <input type="hidden" name="url" name="url" value="{{url('/')}}">
                <div class="container_ b5form">
                <div>
        <button type='button' class="btn btn-secondary-light back_2" id='back_2' style="min-width: auto;">< Back</button>
    </div>
    <div class="col-md-12_ break-two"><br></div>
    <div class="col-md-12_ break-two"><br></div>

    <div class="row_">
        <input type="hidden" name="hidURL" id="hidURL" value="{{url('/')}}">
        <form id="car_vehicle_summary" name="car_vehicle_summary" method="post" enctype="multipart/form-data">
            <div class="quote-results rfs-1-5 rfs-md-1">
                <div class="container_">
                    <span>Quote Number : <span>{{ $getDetail[0]->quotationNo }}</span><br>
                    <div class="row">
                        <div class="col-md-12 summary-table-wrapper">
                            <h4 class="rfs-2-5 rfs-md-1-3 mb-4">Quote Summary</h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 quote-right">
                                    @foreach($getDetail as $item)
                                    <input id="transno" name="transno" type="hidden" value="" class='hide'>
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
                                                        Year: &nbsp;  {{ $item->year }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Brand: &nbsp; {{ $item->brand }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Model: &nbsp;{{ $item->model }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Market Value: &nbsp; Php {{ $item->finalAmountDue }}
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
                                                            <strong class="rfs-1-8 rfs-md-1-1 ff-semibold"> {{ $item->basePremium }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="quote-main-highlight">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td colspan="3">
                                                            Plus:
                                                        </td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>
                                                            Doc Stamps
                                                        </td>
                                                        <td class="text-right">
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $item->docStamps }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            VAT
                                                        </td>
                                                        <td class="text-right">
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $item->vat }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-hl">
                                                            Local Government Tax
                                                        </td>
                                                        <td class="border-hl text-right">
                                                        </td>
                                                        <td class="border-hl text-right">
                                                            {{ $item->localGovernmentTax }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        {{-- <td class="border-hl">
                                                             Fire Service Tax
                                                        </td>
                                                        <td class="border-hl text-right">
                                                        </td>
                                                        <td class="border-hl text-right">
                                                            {{ $item->fireServiceGovernment }}
                                                        </td> --}}
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
                                                        <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">{{ $item->grossPremium }}</strong>
                                                        </td>
                                                    </tr>

                                                    <tr class="quote-main-highlight">
                                                        <td class="border-hl text-color-primary">
                                                            <strong class="rfs-1-8 rfs-md-1-1 ff-semibold">Final Amount Due</strong>
                                                        </td>
                                                        <td class="border-hl text-right text-color-primary">

                                                        </td>
                                                        <td class="border-hl text-right text-color-primary">
                                                            <strong class="rfs-1-8 rfs-md-1-1 ff-semibold"> {{ $item->finalAmountDue }}</strong>
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
                                <input type="hidden" id="aon_coverage" name="aon_coverage" value="{{ $item->actOfNatureCompute }}">
                                <input type="hidden" id="owndamage_coverage" name="owndamage_coverage" value="{{ is_numeric($item->ownDamageCompute) ? number_format($item->ownDamageCompute, 2) : (is_numeric($item->ownDamage) ? number_format($item->ownDamage, 2) : '') }}">
                                <input type="hidden" id="perseat_coverage" name="perseat_coverage" value="{{ is_numeric($item->autoPersonalAccident) ? number_format($item->autoPersonalAccident, 2) :  '' }}">
                                <input type="hidden" id="deduct_coverage" name="deduct_coverage" value="{{ $item->deduction }}">

                                <!-- Premium Computation -->
                                <input type="hidden" id="base_format" name="base_format" value="{{ $item->basePremium }}">
                                <input type="hidden" id="doc_format" name="doc_format" value="{{ $item->docStamps }}">
                                <input type="hidden" id="vat_format" name="vat_format" value="{{ $item->vat }}">
                                <input type="hidden" id="local_format" name="local_format" value=" {{ $item->localGovernmentTax }}">
                                <input type="hidden" id="final_format" name="final_format" value="{{ $item->finalAmountDue }}">
                                <input type="hidden" id="gross_format" name="gross_format" value="{{ $item->grossPremium }}">
                                <input type="hidden" id='autoPersonalAccident' name="autoPersonalAccident"  value="{{ $item->autoPersonalAccident }}">

                                <div class="col-xs-12 col-sm-12 col-md-12 quote-left">
                                    <div class="quote-deduct-summary">
                                        <div style="display: none;">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="p-0 border-0">
                                                                <div class="bgcolor-primary brd-10 p-4 rfs-1-8 rfs-md-1-3 brd-10"><span class="heading-border text-color-light">Coverage</span></div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <strong>Limit of Liability</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Own Damage and Theft
                                                            </td>
                                                            <td class="text-right">
                                                               <span id='test1'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Bodily Injury
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='bodyInjury_PropertyDamage_coverage_label'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Property Damage
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='bodyInjury_PropertyDamage_coverage_label'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Auto Personal Accident
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='perseat_coverage_label'></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Acts of Nature
                                                            </td>
                                                            <td class="text-right">
                                                                <span id='aon_coverage_label'></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

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
                                                            {{ is_numeric($item->ownDamageCompute) ? number_format($item->ownDamageCompute, 2) : (is_numeric($item->ownDamage) ? number_format($item->ownDamage, 2) : '') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Bodily Injury
                                                        </td>
                                                        <td class="text-right">
                                                        </td>
                                                        <td class="text-right">
                                                            {{ is_numeric($item->bodyInjury) ? number_format($item->bodyInjury, 2) : $item->bodyInjury }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Property Damage
                                                        </td>
                                                        <td class="text-right">
                                                        </td>
                                                        <td class="text-right">
                                                            {{ is_numeric($item->bodyInjury) ? number_format($item->bodyInjury, 2) : $item->bodyInjury }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Auto Personal Accident
                                                        </td>
                                                        <td class="text-right">

                                                        </td>
                                                        <td class="text-right">
                                                            {{ is_numeric($item->autoPersonalAccident) ? number_format($item->autoPersonalAccident, 2) :  '' }}
                                                        </td>
                                                    </tr>
                                                    @if($item->actsOfNature == '0.005')
                                                    <tr>
                                                        <td>
                                                            Acts of Nature
                                                        </td>
                                                        <td class="text-right">
                                                        </td>
                                                        <td class="text-right">
                                                            {{ is_numeric($item->actOfNatureCompute) ? number_format($item->actOfNatureCompute, 2) : $item->actOfNatureCompute }}
                                                        </td>
                                                    </tr>
                                                    @else
                                                    @endif
                                                     @if($item->bodyType !='Truck' || $item->bodyType !='TRUCK')
                                                    <tr>
                                                        <td>
                                                        Riot, Strike and Civil Commotion
                                                        </td>
                                                        <td class="text-right">
                                                        </td>
                                                        <td class="text-right">
                                                            {{ is_numeric($item->ownDamageCompute) ? number_format($item->ownDamageCompute, 2) : (is_numeric($item->ownDamage) ? number_format($item->ownDamage, 2) : '') }}
                                                        </td>
                                                    </tr>
                                                    @else
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="quote-deduct-summary">
                                        <div class="quote-other-details text-color-verydarkgray rfs-1">
                                            <p class="mb-3"><strong>Deductible {{ $item->deduction }}</strong></p>
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



                        @endforeach
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
                                        <input type="button" id="send_mail"  name="send_mail"  class="btn btn-primary btn-back" value="Send Email Quote">
                                        <input type="button" id="save_summary" name="save_summary" class="form-control_ btn btn-secondary btn-lg" value="Save">
                                        <input type="button" id="proceed" name="proceed" class="form-control_ btn btn-secondary btn-lg" value="Proceed to Issuance"  >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>


        <div class="progress mt-5 p-0">
            <div class="progress-bar" style="width: 40%;"></div>
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

    @include('getaquote.motor_net.update.otherline_motor')

</div>
</div>
</div>
</div>
</div>


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
            // Perform actions based on the response
            // if (response.status == 1) {

            //     // Value contains "disabled all"
            //     // Perform corresponding actions
            //     // $('#chckquote_agree').prop('disabled', true);
            //     // $('#chckquote_agree').prop('checked', true);

            // } else {
            //     // Value does not contain "disabled all"
            //     // Perform other actions if needed
            // }
        }
    });
});


  $('#proceed').on('click', function(e) {
    e.preventDefault();
        jQuery.noConflict();
        $(".validation_check").remove();
        $(".validation_check_error").remove();
        $(".validation_check_success").remove();
        var errornumber = 0;
        if (!$('#chckquote_agree').is(':checked')) {
        $('#acceptSummarycheck').css('border-color', '#F44336');
        $("#acceptSummarycheck").after("<div class='validation_check' style='opacity:0.7;color:#F44336;'>Please confirm</div>");
        errornumber = 1;
        } else {
        $('#acceptSummarycheck').css('border-color', '#4BB543');
        }

        if (errornumber === 1) {
        return false;
        }


        var transno = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');


        // Iterate over the accessory dropdowns and text fields
            $('.accesso').each(function(index) {
            var accessory = $(this).val();
            formData.append('accessory[]', accessory);
            });

            $('.accessoryValue2').each(function(index) {
            var accessoryValue = $(this).val();
            formData.append('accessoryValue[]', accessoryValue);
            });

        $.ajax({
        url: "{{ url('/get-policy-quote/check_motor/others/') }}" +"/"+ transno,
        method: "GET",
        data: $('#car_vehicle_summary').serialize() + "&transno=" + transno + "&_token=" + csrf_token,
        dataType: 'json',
        success: function(response){


            // Assuming the transno value is retrieved from an input field with the id "transno"
            if(response.cocogen_redirect != 1){
                var id = $('#transno').val();
                var url = "{{ route('record_motor_other', ':id') }}";
                url = url.replace(':id', id);
                window.location.href = url;
            }else{
                var id = $('#transno').val();
                var url = "{{ route('record_motor_other_new', ':id') }}";
                url = url.replace(':id', id);
                window.location.href = url;
            }
         }

        });

    // var id = $('#transno').val(); // Assuming the transno value is retrieved from an input field with the id "transno"
    // var url = "{{ route('record_motor_other', ':id') }}";
    // url = url.replace(':id', id);
    // window.location.href = url;
  });

  $('#send_mail').click(function(e){
        e.preventDefault();
        jQuery.noConflict();
        $(".validation_check").remove();
        $(".validation_check_error").remove();
        $(".validation_check_success").remove();
        var errornumber = 0;
        if (!$('#chckquote_agree').is(':checked')) {
        $('#acceptSummarycheck').css('border-color', '#F44336');
        $("#acceptSummarycheck").after("<div class='validation_check' style='opacity:0.7;color:#F44336;'>Please confirm</div>");
        errornumber = 1;
        } else {
        $('#acceptSummarycheck').css('border-color', '#4BB543');
        }
        if (errornumber === 1) {
        return false;
        }
        var transno = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
          type:'POST',
            url: "{{ url('/get-policy-quote/vehicle/saveSummaryMail')}}",
            data: $('#car_vehicle_summary').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
            dataType: 'json',
           success: (response) => {

            $('#showSendMail').trigger('click');
            // Get the type of car
            // $('#responseMessage').text(response.success);
            // $('#responseModal').modal('show');


           },
           error: function(response){
            console.log(response);

          }
       });

  });

  $('#proceed').hide();
        $('#save_summary').click(function(e){
            e.preventDefault();
            jQuery.noConflict();

            $(".validation_check").remove();
            $(".validation_check_error").remove();
            $(".validation_check_success").remove();

            var errornumber = 0;
            if (!$('#chckquote_agree').is(':checked')) {
            $('#acceptSummarycheck').css('border-color', '#F44336');
            $("#acceptSummarycheck").after("<div class='validation_check' style='opacity:0.7;color:#F44336;'>Please confirm</div>");
            errornumber = 1;
            } else {
            $('#acceptSummarycheck').css('border-color', '#4BB543');
            }

            if (errornumber === 1) {
            return false;
            }

            var transno = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type:'POST',
                url: "{{ url('/get-policy-quote/vehicle/saveSummaryInfo')}}",
                data: $('#car_vehicle_summary').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
                dataType: 'json',
            success: (response) => {
                // Get the type of car
                $('#proceed').show();
            },
            error: function(response){
                console.log(www.cocogen.com);

            }
        });

    });
$(document).ready(function() {
  $('#back_2').on('click', function() {
  var transno = window.location.pathname.split('/').pop();

     // Assuming the transno value is retrieved from an input field with the id "transno"
    var url = "{{ route('record_motor', ':transno') }}";
    url = url.replace(':transno', transno);

    window.location.href = url;
  });
});
    </script>
<section class="divider">
<img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
@endsection
