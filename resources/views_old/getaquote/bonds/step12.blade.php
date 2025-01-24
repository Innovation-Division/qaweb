<style>
    .fileUpload input[type="file"] {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}
    </style>
<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">ATTACHMENT(S)</h4> <br>
            <div class="card-body">

                <div id='bond_attachment'>
                    <div class="alert alert-success" id="bond_attachment01">
                        <span id="req_attach"></span>
                    </div>
                    <div class="alert alert-danger" id="bond_attachment02">
                            <span id="req_attach_failed"></span>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <div class="fileUpload btn btn-secondary-light" style="width:110px !important">
                            <input type="file" class="required-entry" name="filename" id="filename"  accept=".pdf,.doc,.docx,.csv,.txt,.xlx,.xls,.rar,.zip,.ppt,.pptx,.jpg,.png,.gif,.tif"  onchange="showFileName()"><span class='fa fa-plus'></span>
                        </div>
                    </div>
                    <div id="fileInfo"></div>
                </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_attachment" name="sendform_attachment" class="btn btn-primary">Upload</button>

            </div>
        </div>
    </div>
    <input type='hidden' name='attchment' id='attchment' class='attchment'>
    <table id="attachment_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Filename</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>

<style>

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
<script type="text/javascript">
$('#sendform_attachment').click(function(e){
   e.preventDefault();
   var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var formData = new FormData($('#form_attachment')[0]);

   var errornumber = 0;
   if ($('#filename').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#filename').fieldErrorState();
        errornumber = 1;
    } else {
        $('#filename').fieldSuccessState();
    }

    if (errornumber == 1) {
        return false;
    }

    formData.append('trans_id', trans_id);
   formData.append('_token', csrf_token);

   /* Submit form data using ajax*/
    $.ajax({
      url: "{{ url('/get-quote/addbondsattachment')}}",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){
        var checkValproj= jQuery('.attchment').val();
         //------------------------

         if($.isEmptyObject(response.error)){
            $('#alert_msg8').hide();
            $('#sendform_attachment').html('Upload');
            $('#msg_div8').show();
            $('#bond_attachment01').show();
            $('#req_attach').html(response.success);
            // $('#msg_div8').removeClass('d-none');

              $('#form_attachment').trigger("reset");
              if (checkValproj === '') {
                    var table = jQuery('#attachment_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondsattachment') }}"+"/"+trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                            { data: 'id', name: 'id', visible: false},
                            { data: 'filename2', name: 'filename2', render:function(data, type, row){
                                return "<a href='{{url('/get-quote/view/bonds/')}}/" + row.filename2 +"/"+ row.id +"' target='_blank' >" + row.filename2 + "</a>"
                            } },
                            {data: 'action', name: 'action', orderable: false},
                        ],
                    columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                          jQuery('.attchment').val('1');
                        } else {

                            var table = jQuery('#attachment_table').DataTable();
                            table.ajax.reload();
                            jQuery('.attchment').val('1');
                        }
            }else{
              
                $('#bond_attachment').show();
                $('#bond_attachment02').show();
                $('#bond_attachment01').hide();
                
                $('#req_attach_failed').html(response.error);
                $('#sendform_attachment').html('Upload');

            }
         //--------------------------
         setTimeout(function(){
            $('#bond_attachment').hide();
            },10000);

      }

    });

   });

        </script>

<script>
    function showFileName() {
        var fileInput = document.getElementById('filename');
        var fileInfo = document.getElementById('fileInfo');

        if (fileInput.files.length > 0) {
            var fileName = fileInput.files[0].name;
            fileInfo.textContent = fileName;
        } else {
            fileInfo.textContent = '';
        }
    }
    </script>
    <!-- END OF BOND-->

