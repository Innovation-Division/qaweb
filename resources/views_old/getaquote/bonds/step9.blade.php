<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">CO-SIGNER(S)</h4> <br>
            <div class="card-body">
                <div id='bond_cosigner'>
                    <div class="alert alert-success" id="bond_cosigner01">
                        <span id="req_cosigner"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bond_cosigner02">
                            <span id="req_cosigner_failed"></span>
                    </div>
                </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">ID Type</label>
                <input type="text" name="cosigner_id_type" class="form-control" id="cosigner_id_type" placeholder="*ID Type">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">ID No</label>
                <input type="text" name="cosigner_id_no" class="form-control" id="cosigner_id_no" placeholder="*ID No.">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Name</label>
                <input type="text" name="cosigner_name" class="form-control" id="cosigner_name" placeholder="*Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="collateral_values">Position</label>
                <input type="text" name="cosigner_position" class="form-control" id="cosigner_position" placeholder="*Position">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Home Address</label>
                <input type="text" name="cosigner_property" class="form-control" id="cosigner_property" placeholder="*Home Address">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Property TCT No.</label>
                <input type="text" name="cosigner_property_tct" class="form-control" id="cosigner_property_tct" placeholder="*Property TCT No.">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Property Location</label>
                <input type="text" name="cosigner_property_location" class="form-control" id="cosigner_property_location" placeholder="*Property Location">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Property Size</label>
                <input type="text" name="cosigner_property_size" class="form-control" id="cosigner_property_size" placeholder="*Property Size" onkeypress="return isNumber(event)">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="collateral_values">Assessed Value/Market Value</label>
                <input type="text" name="cosigner_amt" class="form-control" id="cosigner_amt" placeholder="*Amount" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_signer" name="sendform_signer" class="btn btn-primary"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
    <input type='hidden' name='cosig' id='cosig' class='cosig'>
    <table id="cosigner_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>ID Type</th>
                <th>ID No</th>
                <th>Name</th>
                <th>Position</th>
                <th>Home Address</th>
                <th>Property TCT No.</th>
                <th>Property Location</th>
                <th>Property Size</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>
<script type="text/javascript">
$('#sendform_signer').click(function(e){

   e.preventDefault();
   jQuery.noConflict();
   var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var errornumber = 0;

   if ($('#cosigner_id_type').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#cosigner_id_type').fieldErrorState();
        errornumber = 1;
    } else {
        $('#cosigner_id_type').fieldSuccessState();
    }

    if ($('#cosigner_id_no').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#cosigner_id_no').fieldErrorState();
        errornumber = 1;
    } else {
        $('#cosigner_id_no').fieldSuccessState();
    }

    if ($('#cosigner_name').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#cosigner_name').fieldErrorState();
        errornumber = 1;
    } else {
        $('#cosigner_name').fieldSuccessState();
    }


    if ($('#cosigner_position').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#cosigner_position').fieldErrorState();
        errornumber = 1;
    } else {
        $('#cosigner_position').fieldSuccessState();
    }

    if ($('#cosigner_property').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#cosigner_property').fieldErrorState();
        errornumber = 1;
    } else {
        $('#cosigner_property').fieldSuccessState();
    }

    if ($('#cosigner_amt').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#cosigner_amt').fieldErrorState();
        errornumber = 1;
    } else {
        $('#cosigner_amt').fieldSuccessState();
    }




    if (errornumber == 1) {
        return false;
    }

   $('#sendform_signer').html('Saving...');

   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondssigner')}}",
      method: "POST",
      data: $('#form_cosigner').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var checkValconsig= jQuery('.cosig').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg5').hide();
            $('#sendform_signer').html('Add');
            $('#msg_div5').show();
            $('#req_cosigner').show();
            $('#req_cosigner_failed').html(response.success);
            $('#msg_div5').removeClass('d-none');
            $("input[name='cosigner_name']").val("");
            $("input[name='cosigner_property']").val("");
            $("input[name='cosigner_amt']").val("");

              $('#form_cosigner').trigger("reset");
              if (checkValconsig === '') {
                    var table = jQuery('#cosigner_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondssigner') }}"+"/"+trans_id,
                            error: function(xhr, error, thrown) {
                                alert("An error occurred while loading data: " +
                                    error);
                            }
                        },
                        columns: [
                            { data: 'id', name: 'id', visible: false},
                            { data: 'cosigner_id_type', name: 'cosigner_id_type' },
                            { data: 'cosigner_id_no', name: 'cosigner_id_no' },
                            { data: 'cosigner_name', name: 'cosigner_name' },
                            { data: 'cosigner_position', name: 'cosigner_position' },
                            { data: 'cosigner_property', name: 'cosigner_property' },
                            { data: 'cosigner_property_tct', name: 'cosigner_property_tct' },
                            { data: 'cosigner_property_location', name: 'cosigner_property_location' },
                            {data: 'cosigner_property_size',
                                name: 'cosigner_property_size',
                                render: function(data, type, row) {
                                    if (type === 'display') {
                                        return data + ' sqm';
                                    }
                                    return data;
                                }
                            },
                            { data: 'cosigner_amt',name: 'cosigner_amt',
                                render: function(data, type, row) {
                                    if (type === 'display') {
                                        // Format the amount with comma as thousands separator
                                        return parseFloat(data).toLocaleString('en');
                                    }
                                    return data;
                                }
                            },
                            {data: 'action', name: 'action', orderable: false},

                        ],
                        columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                    jQuery('.cosig').val('1');
                        } else {

                            var table = jQuery('#cosigner_table').DataTable();
                            table.ajax.reload();
                            jQuery('.cosig').val('1');
                        }
            }else{
                        $('#msg_div5').hide();
                        $('#bond_cosigner02').show();
                        $('#sendform_signer').html('Add');
                        $('#res_error5').html(response.error);

                    }

          setTimeout(function(){
            $('#bond_cosigner').hide();
            },10000);

      }

    });

   });


        </script>
    <!-- END OF BOND-->

