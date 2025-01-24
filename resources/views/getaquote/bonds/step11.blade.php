<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">

        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">LIST OF COMPLETED PROJECT(S)</h4> <br>
            <div class="card-body">

                <div id='bond_completeproject'>
                    <div class="alert alert-success" id="bond_completeproject01">
                        <span id="req_complete_proj"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bond_completeproject02">
                            <span id="req_complete_proj_failed"></span>
                    </div>
                </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="fin_year">Project Name</label>
                {{-- <input type="text" name="project_name" class="form-control" id="project_name" placeholder="*Project Name"> --}}
                <textarea class="form-control project_name" name="project_name" id="project_name" rows="3"  placeholder="*Project Name"></textarea>
            </div>
        </div>
        <div class="col-md-12_ break-two"> <br> </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_project1" name="sendform_project1" class="btn btn-primary"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
    <input type='hidden' name='proj' id='proj' class='proj'>
    <table id="project1_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Project</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>


<script type="text/javascript">

$('#sendform_project1').click(function(e){
   e.preventDefault();
   jQuery.noConflict();
   var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');

   if ($('#project_name').val() == "") {
     // $("#policy_type").after(
     //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
     // );fin_remarks
     $('#project_name').fieldErrorState();
     errornumber = 1;
 } else {
     $('#project_name').fieldSuccessState();
 }


 if (errornumber == 1) {
     return false;
 }


   $('#sendform_project1').html('Saving...');

   /* Submit form data using ajax*/
    $.ajax({
      url: "{{ url('/get-quote/addbondsproject1')}}",
      method: "POST",
      data: $('#form_project1').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var checkValproj= jQuery('.proj').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#sendform_project1').html('Add');
            $('#msg_div6').show();
            $('#bond_completeproject01').show();
            $('#req_complete_proj').html(response.success);
            $('#msg_div6').removeClass('d-none');
            $("input[name='project_name']").val("");

              $('#form_project1').trigger("reset");
              if (checkValproj === '') {
                    var table = jQuery('#project1_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondsprojects1') }}"+"/"+trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                                    { data: 'id', name: 'id', visible: false},
                                    {
                                        data: 'project_name',
                                        name: 'project_name',
                                        render: function(data, type, row) {
                                            if (type === 'display' && data.length > 95) {
                                            return data.replace(/(.{95})/g, '$1<br>');
                                            }
                                            return data;
                                        }
                                        },
                                    {data: 'action', name: 'action', orderable: false},
                                ],
                        columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                          jQuery('.proj').val('1');
                        } else {

                            var table = jQuery('#project1_table').DataTable();
                            table.ajax.reload();
                            jQuery('.proj').val('1');
                        }
            }else{
                        $('#msg_div5').hide();
                        $('#bond_completeproject02').show();
                        $('#sendform_signer').html('Add');
                        $('#req_complete_proj_failed').html(response.error);

                    }
         //--------------------------
         setTimeout(function(){
            $('#bond_completeproject').hide();
            },10000);

      }

    });

   });


        </script>
    <!-- END OF BOND-->

