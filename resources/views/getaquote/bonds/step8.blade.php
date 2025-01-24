
<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">PRINCIPAL SIGNATORY</h4> <br>
            <div class="card-body">

                <div id='bond_principal'>
                    <div class="alert alert-success" id="bond_principal01">
                        <span id="req_principal"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bond_principal02">
                            <span id="req_principal_failed"></span>
                    </div>
                </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="fin_year">ID Type</label>
                    <input type="text" name="id_type" class="form-control id_type" id="id_type" placeholder="*ID Type">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fin_year">ID No</label>
                    <input type="text" name="id_no" class="form-control id_no" id="id_no" placeholder="*ID No.">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="collateral_values">Name</label>
                    <input type="text" name="principal_name" class="form-control principal_name" id="principal_name" placeholder="*Name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="collateral_values">Position</label>
                    <input type="text" name="principal_post" class="form-control principal_post" id="principal_post" placeholder="*Position">
                </div>
            </div>
        </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>&nbsp;</label>
            <button type="submit" id="sendform_principal" name="sendform_principal" class="btn btn-primary"><span class='fa fa-plus'></span></button>
        </div>
    </div>
    <input type='hidden' name='principal_sig' id='principal_sig' class='principal_sig'>
    <table id="principal_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>ID Type</th>
                <th>ID No.</th>
                <th>Name</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>

<script type="text/javascript">

$('#sendform_principal').click(function(e){
   e.preventDefault();
   jQuery.noConflict();
   var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var errornumber= 0;


   if ($('#id_type').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#id_type').fieldErrorState();
        errornumber = 1;
    } else {
        $('#id_type').fieldSuccessState();
    }

    if ($('#id_no').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#id_no').fieldErrorState();
        errornumber = 1;
    } else {
        $('#id_no').fieldSuccessState();
    }
    if ($('#principal_name').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#principal_name').fieldErrorState();
        errornumber = 1;
    } else {
        $('#principal_name').fieldSuccessState();
    }
    if ($('#principal_post').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#principal_post').fieldErrorState();
        errornumber = 1;
    } else {
        $('#principal_post').fieldSuccessState();
    }



    if (errornumber == 1) {
        return false;
    }

   $('#sendform_collateral').html('Saving...');

   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsprincipal')}}",
      method: "POST",
      data: $('#form_principal').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var checkValprincipalsig= jQuery('.principal_sig').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg71').hide();
            $('#sendform_principal').html('Add');
            $('#bond_principal01').show();
            $('#req_principal').html(response.success);
            $('#msg_div71').removeClass('d-none');
            $("input[name='id_type']").val("");
            $("input[name='id_no']").val("");
            $("input[name='principal_name']").val("");
            $("input[name='principal_post']").val("");

              $('#form_principal').trigger("reset");
              if (checkValprincipalsig === '') {
                    var table = jQuery('#principal_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondsprincipal') }}"+"/"+trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                            { data: 'id', name: 'id', visible: false},
                            { data: 'id_type', name: 'id_type' },
                            { data: 'id_no', name: 'id_no' },
                            { data: 'principal_name', name: 'principal_name' },
                            { data: 'principal_post', name: 'principal_post' },
                            {data: 'action', name: 'action', orderable: false},
                            ],
                        columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                    jQuery('.principal_sig').val('1');
                        } else {

                            var table = jQuery('#principal_table').DataTable();
                            table.ajax.reload();
                            jQuery('.principal_sig').val('1');
                        }

            }else{
                        $('#msg_div71').hide();
                          $('#bond_principal02').show();
                        $('#sendform_principal').html('Add');
                        $('#req_principal_failed').html(response.error);

                    }

        setTimeout(function(){
            $('#bond_principal').hide();
            },10000);

         //--------------------------
      }

    });

   });

        </script>
    <!-- END OF BOND-->

