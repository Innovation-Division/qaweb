
<style>
    #ui-datepicker-div {
        position: relative;
        z-index: 9999 !important;
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-12_ break-two"> <br> </div>
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Bond Requirements </h4> <br>
            <div class="card-body">


    <div class="clearfix"></div>
    <div id='bonds_req_first'>
            <div class="alert alert-success" id="bonds_req01">
                <span id="req_bond"></span>
        </div>
        <div class="alert alert-danger d-none" id="bonds_req02">
                <span id="req_bond_failed"></span>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="policy_type">Policy</label>
            <select  id="policy_type" name="policy_type" class="form-control  policy_type selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                    <option value="">- Select -</option>
                    <option value="main">Main</option>
                    <option value="extension">Exension</option>
                    <option value="others">Others</option>
            </select>
        </div>
    </div>
    <input name="policy_val" id="policy_val" type="hidden" class="form-control  policy_val">
     <div class="col-md-8">
            <div class="form-group">
                <label for="account_type">Account/Broker:</label>
                <select  id="account_type" name="account_type" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                        <option value="">- Select -</option>
                            <option value="regular">Regular</option>
                            <option value="anchor_nonsmc">Anchor Non-SMC</option>
                            <option value="anchor_smc">Anchor SMC</option>
                            <option value="bdoi">BDOI</option>
                            <option value="security_services">Security Services</option>
                            <option value="ra_9184">RA 9184</option>
                            <option value="marsh_cola">Marsh Coca Cola</option>
                            <option value="marsh_regular">Marsh Regular</option>
                            <option value="megaworld">Megaworld</option>
                    </select>
            </div>
        </div>
        <input name="account_type_val" id="account_type_val" type="hidden" class="form-control  account_type_val">
        <div class="clearfix"></div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="inceptdate">Bond Type</label>
                <select  id="bond_req" name="bond_req" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                    <option value="">Bond Type *</option>

            </select>
            <input name="bond_req2" id="bond_req2" type="hidden" class="form-control input-lg NoPaste personal_ifno_mobile">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inceptdate">Inception Date</label>
                    <input name="date_bterm1" id="date_bterm1" type="text" class="date_bterm1 form-control input-lg NoPaste personal_ifno_mobile" style="z-index: 0 !important">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="annual_rate">Expiry Date</label>
                    <input name="date_bterm2" id="date_bterm2" type="text" class="date_bterm2 form-control input-lg NoPaste personal_ifno_mobile" style="z-index: 0 !important">
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>

        <div class="clearfix"></div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="agent">Bond Amount:</label>

                <div class="input-group">
                    <input name="bond_amount" id="bond_amount" type="text" class="form-control input-lg personal_ifno_mobile"  placeholder="Bond Amount*" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" >
                    <input name="bonds_contract" id="bonds_contract" type="hidden" class="form-control input-lg NoPaste personal_ifno_mobile">
                    <span class="input-group-btn">
                        <button type="submit" id="sendform_calc" name="sendform_calc" class="btn btn-primary" formaction="javascript:void(0)" style="height: 100%;"><span class="fa fa-calculator" aria-hidden="true"></span> Compute</button>Compute</button>
                    </span>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact_person">Bond Required</label>
                        <input name="bonds_requirement" id="bonds_requirement" type="text" class="form-control input-lg NoPaste personal_ifno_mobile"  onkeypress="return isNumber(event)" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="annual_rate">Proposed Retention </label>
                        <input name="proposed_retention" id="proposed_retention" placeholder="" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="" onkeypress="return isNumber(event)">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="multiplier">Multiplier</label>
                    <input name="multiplier" id="multiplier" type="multiplier" class="form-control input-lg NoPaste personal_ifno_mobile" readonly='true'>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="annual_rate">Annual Rate (%)</label>
                    <input name="annual_rate_update_tarif" id="annual_rate_update_tarif" placeholder="*Annual Rate" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="*Annual Rate" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true">
                    <input name="annual_rate" id="annual_rate" placeholder="*Annual Rate" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="*Annual Rate" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true" hidden>
                    <span class="text-danger">{{ $errors->first('annual_rate') }}</span>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        </div>
        <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contact_person">Annual Premium</label>
                            <input name="annual_premium" id="annual_premium" type="annual_premium" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="Annual Premium"  readonly="true">
                            {{-- <span class="input-group-btn">
                                <button type="submit" id="sendform_requirement" name="sendform_requirement" class="btn btn-primary">Add</button>
                            </span> --}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-sm-8" for="term_premium">Premium for the Term:</label>
                            <div class="input-group">
                                <input name="term_premium" id="term_premium" placeholder="Premium for the Term" type="text" class="form-control input-lg NoPaste personal_ifno_mobile"  onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true">
                                <span class="input-group-btn">
                                    <button type="submit" id="sendform_requirement" name="sendform_requirement" class="btn btn-primary" style="height: 100%;">Add</button>
                                </span>
                            </div>
                            <span class="text-danger">{{ $errors->first('term_premium') }}</span>
                        </div>
                    </div>
                    <input type="hidden" name='addnew' class='addnew '>
                    <input type="hidden" name='totalanualprem' id='totalanualprem' class='totalanualprem'>
                <div class="col-md-4">
                </div>
            </div>
        </div>


    <table id="requirement_table" class="table table-bordered requirement_table" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bond Type</th>
                <th>Bond Required</th>
                <th>Proposed retention</th>
                <th>Bond Amount</th>
                <th>Annual Rate</th>
                <th>Annual Premium</th>
                <th>Bond Term</th>
                <th>Term Premium</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>



<script>
$(document).ready(function() {
        jQuery.noConflict();
        $("#bond_req").on("change", function() {
        $("#bond_req2").val($(this).val());
        });



        $("#bond_req").prop("disabled", true);
        // Event listener for when the first dropdown menu selection changes
        $(document).ready(function() {
  // Get the initial value from the first dropdown menu when the page loads
  var selectedValue = $('#account_type').val();
  var csrf_token = $('meta[name="csrf-token"]').attr('content');

  // Make an AJAX request to the server to get the options for the second dropdown menu
  $.ajax({
    url: "{{ url('/get-quote/accountbroker') }}",
    method: 'POST',
    data: {
      value: selectedValue,
      _token: csrf_token
    },
    success: function(data) {
      $("#bond_req").prop("disabled", false);

      // Update the options of the second dropdown menu with the data returned from the server
      $('#bond_req').empty();
      $('#bond_req').append($('<option>', {
        value: '',
        text: '*Bonds Type'
      }));
      jQuery('#bond_req').selectpicker('refresh');
      $.each(data, function(key, value) {
        $('#bond_req').append($('<option>', {
          value: value.bond_req,
          text: value.bond_req
        }));
        jQuery('#bond_req').selectpicker('refresh');
      });
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });

  // Attach the change event handler to the first dropdown menu
        $('#account_type').change(function() {
            var selectedValue = $(this).val();

            $.ajax({
            url: "{{ url('/get-quote/accountbroker') }}",
            method: 'POST',
            data: {
                value: selectedValue,
                _token: csrf_token
            },
            success: function(data) {
                $("#bond_req").prop("disabled", false);
                $('#bond_req').empty();
                $('#bond_req').append($('<option>', {
                value: '',
                text: '*Bonds Type'
                }));
                jQuery('#bond_req').selectpicker('refresh');
                $.each(data, function(key, value) {
                $('#bond_req').append($('<option>', {
                    value: value.bond_req,
                    text: value.bond_req
                }));
                jQuery('#bond_req').selectpicker('refresh');
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
            });
        });
        });
    });


    </script>
