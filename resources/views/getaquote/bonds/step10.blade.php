
<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">CORPORATE GUARANTOR</h4> <br>
            <div class="card-body">
                <div id='bond_corporate'>
                    <div class="alert alert-success" id="bond_corporate01">
                        <span id="req_corporate"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bond_corporate02">
                            <span id="req_corporate_failed"></span>
                    </div>
                </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">ID Type</label>
                <input type="text" name="id_type2" class="form-control" id="id_type2" placeholder="*ID Type">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">ID No.</label>
                <input type="text" name="id_no2" class="form-control" id="id_no2" placeholder="*ID No.">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="collateral_values">Name</label>
                <input type="text" name="guarantee_name" class="form-control" id="guarantee_name" placeholder="*Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="collateral_values">Designation</label>
                <input type="text" name="guarantee_post" class="form-control" id="guarantee_post" placeholder="*Designation">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
               <br>
                <button type="submit" id="sendform_guarantee" name="sendform_guarantee" class="btn btn-primary"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
    <input type='hidden' name='cosigpersonal' id='cosigpersonal' class='cosigpersonal'>
    <table id="guarantee_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>ID Type</th>
                <th>ID No.</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>

<script type="text/javascript">
$('#sendform_guarantee').click(function(e){
   e.preventDefault();
   jQuery.noConflict();
   var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');

   var errornumber = 0;

if ($('#id_type2').val() == "") {
     // $("#policy_type").after(
     //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
     // );fin_remarks
     $('#id_type2').fieldErrorState();
     errornumber = 1;
 } else {
     $('#id_type2').fieldSuccessState();
 }

 if ($('#id_no2').val() == "") {
     // $("#policy_type").after(
     //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
     // );fin_remarks
     $('#id_no2').fieldErrorState();
     errornumber = 1;
 } else {
     $('#id_no2').fieldSuccessState();
 }

 if ($('#guarantee_name').val() == "") {
     // $("#policy_type").after(
     //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
     // );fin_remarks
     $('#guarantee_name').fieldErrorState();
     errornumber = 1;
 } else {
     $('#guarantee_name').fieldSuccessState();
 }


 if ($('#guarantee_post').val() == "") {
     // $("#policy_type").after(
     //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
     // );fin_remarks
     $('#guarantee_post').fieldErrorState();
     errornumber = 1;
 } else {
     $('#guarantee_post').fieldSuccessState();
 }


 if (errornumber == 1) {
     return false;
 }

   $('#sendform_guarantee').html('Saving...');

   /* Submit form data using ajax*/

    $.ajax({
      url: "{{ url('/get-quote/addbondsguarantee')}}",
      method: "POST",
      data: $('#form_guarantee').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var checkValconsigpersonal= jQuery('.cosigpersonal').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg73').hide();
            $('#sendform_guarantee').html('Add');
            $('#bond_corporate01').show();
            $('#req_corporate').html(response.success);
            $('#msg_div73').removeClass('d-none');
            $("input[name='id_type2']").val("");
            $("input[name='id_no2']").val("");
            $("input[name='guarantee_name']").val("");
            $("input[name='guarantee_post']").val("");

              $('#form_cosigner').trigger("reset");
              if (checkValconsigpersonal === '') {
                    var table = jQuery('#guarantee_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondsguarantee') }}"+"/"+trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                                { data: 'id', name: 'id', visible: false},
                                { data: 'id_type2', name: 'id_type2' },
                                { data: 'id_no2', name: 'id_no2' },
                                { data: 'guarantee_name', name: 'guarantee_name' },
                                { data: 'guarantee_post', name: 'guarantee_post' },
                                {data: 'action', name: 'action', orderable: false},
                            ],
                    columnDefs: [{ "width": "40px", "targets": [5] }]
                    });
                    jQuery('.cosigpersonal').val('1');
                        } else {

                            var table = jQuery('#guarantee_table').DataTable();
                            table.ajax.reload();
                            jQuery('.cosigpersonal').val('1');
                        }
            }else{
                        $('#bond_corporate02').show();
                        $('#sendform_signer').html('Add');
                        $('#req_corporate_failed').html(response.error);

                    }
         //--------------------------
         setTimeout(function(){
            $('#bond_corporate').hide();
            },10000);

      }

    });

   });


        </script>
    <!-- END OF BOND-->

