
<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">COLLATERAL(S)</h4> <br>
            <div class="card-body">

                <div id='bond_collateral'>
                    <div class="alert alert-success" id="bond_collateral01">
                        <span id="req_collateral"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bond_collateral02">
                            <span id="req_collateral_failed"></span>
                    </div>
                </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Type</label>
                <input type="text" name="collateral_type" class="form-control collateral_type" id="collateral_type" placeholder="*Type">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Item</label>
                <input name="collateral_item" id="collateral_item" type="text" class="form-control input-lg collateral_item" maxlength="100" placeholder="*Item" autocomplete="off"> <span class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="collateral_values">Value</label>
                <input type="text" class="form-control collateral_value" id="collateral_value" name="collateral_value" placeholder="*Value*" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_collateral" name="sendform_collateral" class="btn btn-primary"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
    <input type='hidden' name='collation' id='collation' class='collation'>
    <table id="collateral_table" class="table table-bordered collateral_table" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Type</th>
                <th>Item</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>

<script type="text/javascript">

$('#sendform_collateral').click(function(e){
    e.preventDefault();
   jQuery.noConflict();
   var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');


   var errornumber = 0;
    if ($('#collateral_type').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#collateral_type').fieldErrorState();
        errornumber = 1;
    } else {
        $('#collateral_type').fieldSuccessState();
    }

    if ($('#collateral_item').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#collateral_item').fieldErrorState();
        errornumber = 1;
    } else {
        $('#collateral_item').fieldSuccessState();
    }


    if ($('#collateral_value').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#collateral_value').fieldErrorState();
        errornumber = 1;
    } else {
        $('#collateral_value').fieldSuccessState();
    }

    if (errornumber == 1) {
        return false;
    }
    $('#sendform_collateral').html('Saving...');

   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondscollateral')}}",
      method: "POST",
      data: $('#form_collateral').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var checkValcollation= jQuery('.collation').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg4').hide();
            $('#sendform_collateral').html('Add');
            $('#bond_collateral01').show();
            $('#req_collateral').html(response.success);
            $('#msg_div4').removeClass('d-none');
            $("input[name='collateral_type']").val("");
            $("input[name='collateral_item']").val("");
            $("input[name='collateral_value']").val("");

              $('#form_officer').trigger("reset");
              if (checkValcollation === '') {
                    var table = jQuery('#collateral_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondscollateral') }}"+"/"+trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                            { data: 'id', name: 'id', visible: false},
                            { data: 'collateral_type', name: 'collateral_type' },
                            { data: 'collateral_item', name: 'collateral_item' },
                            { data: 'collateral_value', name: 'collateral_value',},
                            {data: 'action', name: 'action', orderable: false},
                        ],
                        columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                    jQuery('.collation').val('1');
                        } else {

                            var table = jQuery('#collateral_table').DataTable();
                            table.ajax.reload();
                            jQuery('.collation').val('1');
                        }
                }else{
                        $('#msg_div4').hide();
                          $('#bond_collateral02').show();
                        $('#sendform_officer').html('Add');
                        $('#req_collateral_failed').html(response.error);

                    }


            setTimeout(function(){
            $('#bond_collateral').hide();
            },10000);

         //--------------------------
      }

    });

   });


        </script>
    <!-- END OF BOND-->

