<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">List of Key Officers</h4> <br>
            <div class="card-body">

                <div id='bond_list_of_officer'>
                    <div class="alert alert-success" id="bonds_list_officer01">
                        <span id="req_listofficer"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bonds_list_officer02">
                            <span id="req_listofficer_failed"></span>
                    </div>
                </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Name</label>
                <input name="officer_name" id="officer_name" type="text" class="form-control input-lg" placeholder="*Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Position</label>
                <input name="officer_post" id="officer_post" type="text" class="form-control input-lg " maxlength="100" placeholder="*Position" autocomplete="off"> <span class="text-danger"></span>
            </div>
        </div>
        <input name="assured_no_office" id="assured_no_office" type="hidden" class="form-control input-lg " maxlength="100" autocomplete="off">

        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_officer" name="sendform_officer" class="btn btn-primary btn-block sendform_officer"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
    <input type='hidden' name='list_officer' id='list_officer' class='list_officer'>
    <table id="officer_table" class="table table-bordered owner_table" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                {{-- <th>id</th> --}}
                <th>Name</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {

$('#sendform_officer').click(function(e){
    e.preventDefault();
   jQuery.noConflict();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var trans_id = $("input[name='transno']").val();



   var errornumber = 0;
    if ($('#officer_name').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#officer_name').fieldErrorState();
        errornumber = 1;
    } else {
        $('#officer_name').fieldSuccessState();
    }

    if ($('#officer_post').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#officer_post').fieldErrorState();
        errornumber = 1;
    } else {
        $('#officer_post').fieldSuccessState();
    }



    if (errornumber == 1) {
        return false;
    }
    $('#sendform_officer').html('Saving...');
/* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsofficer')}}",
      method: "POST",
      data: $('#form_officer').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var checkValOfficer = jQuery('.list_officer').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg3').hide();
            $('#sendform_officer').html('Add');
            $('#msg_div3').show();
            $('#bonds_list_officer01').show();
            $('#req_listofficer').html(response.success);
            $('#msg_div3').removeClass('d-none');
            $("input[name='officer_name']").val("");
            $("input[name='officer_post']").val("");

              $('#form_officer').trigger("reset");
              if (checkValOfficer === '') {
                            var table = jQuery('#officer_table').DataTable({
                                searching: false,
                                paging: false,
                                info: false,
                                responsive: true,
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: "{{ url('/get-quote/getbondsofficer') }}"+"/"+trans_id,
                                    error: function(xhr, error, thrown) {
                                        console.log('cocogen.com');
                                    }
                                },
                                columns: [
                                // { data: 'id', name: 'id', visible: false},
                                { data: 'officer_name', name: 'officer_name' },
                                { data: 'officer_post', name: 'officer_post' },
                                {data: 'action', name: 'action', orderable: false},
                            ],
                            });
                            jQuery('.list_officer').val('1');


                        } else {

                            var table = jQuery('#officer_table').DataTable();
                            table.ajax.reload();
                          jQuery('.list_officer').val('1');
                        }
            }else{
                        $('#bonds_list_officer02').show();
                        $('#sendform_officer').html('Add');
                        $('#req_listofficer_failed').html(response.error);

                    }

            setTimeout(function(){
            $('#bond_list_of_officer').hide();
            },10000);

         //--------------------------
      }

    });


   });

} );
        </script>
    <!-- END OF BOND-->

