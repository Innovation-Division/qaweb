<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">

        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">LIST OF ONGOING PROJECT(S)</h4> <br>
            <div class="card-body">


        <div class="col-md-8">
            <div class="form-group">
                <label for="fin_year">Project Name</label>
                {{-- <input type="text" name="project_name" class="form-control" id="project_name" placeholder="*Project Name"> --}}
                <input type="text" name="project_name2" class="form-control" id="project_name2" placeholder="*Project Name">
            </div>
        </div>
        <div class="col-md-12_ break-two"> <br> </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_project2" name="sendform_project2" class="btn btn-primary"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
    <input type='hidden' name='proj2' id='proj2' class='proj2'>
    <table id="project2_table" class="table table-bordered" style="width:100%">
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
<Script>
    $('#sendform_project2').click(function(e){

   jQuery.noConflict();
   var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');

   if ($('#project_name2').val() == "") {
     // $("#policy_type").after(
     //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
     // );fin_remarks
     $('#project_name2').fieldErrorState();
     errornumber = 1;
 } else {
     $('#project_name2').fieldSuccessState();
 }


 if (errornumber == 1) {
     return false;
 }

   $('#sendform_project2').html('Saving...');
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondsproject2')}}",
      method: "POST",
      data: $('#form_project2').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var checkValproj2= jQuery('.proj2').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#sendform_project2').html('Add');
            $("input[name='project_name2']").val("");
            $('#form_project2').trigger("reset");
            if (checkValproj2 === '') {
                var table = jQuery('#project2_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                        url: "{{ url('/get-quote/getbondsprojects2') }}/"+trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                            { data: 'id', name: 'id', visible: false },
                            { data: 'project_name2', name: 'project_name2' },
                            { data: 'action', name: 'action', orderable: false },
                        ],
                        columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                    jQuery('.proj2').val('1');
            }else{
                var table = jQuery('#project2_table').DataTable();
                            table.ajax.reload();
                            jQuery('.proj2').val('1');
            }

            }
      }

    });

   });
    </script>



