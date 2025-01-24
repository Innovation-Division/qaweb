<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Loss Experience </h4> <br>
            <div class="card-body">

            <div id='bond_loss_exp'>
                <div class="alert alert-success" id="bonds_loss_exp01">
                    <span id="req_lossexp"></span>
                </div>
                <div class="alert alert-danger d-none" id="bonds_loss_exp02">
                        <span id="req_lossexp_failed"></span>
                </div>
            </div>
        <div class="col-md-8" style='padding:0px !important'>
            <div class="form-group">
                <label for="losssexperience">Loss Experience</label>
                <input type="text" name="loss_xp" class="form-control col-md-8" id="loss_xp" placeholder="*Loss Expercience">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_lossxp" name="sendform_lossxp" class="btn btn-primary btn-block"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
<input type='hidden' name='lossxp_check' id='lossxp_check' class='lossxp_check'>
<table id="lossxp_table" class="table table-bordered lossxp_table" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Loss Expercience</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
</div>
</div>
</div>



<script type="text/javascript">

$('#sendform_lossxp').click(function(e){

   e.preventDefault();
   jQuery.noConflict();
    var trans_id = $("input[name='transno']").val();
    var csrf_token = $('meta[name="csrf-token"]').attr('content');



    $(".validation_loss_xp_info").remove();
    $(".validation_loss_xp_info_error").remove();
    $(".validation_loss_xp_info_check_success").remove();


    if ($('#loss_xp').val() == "") {
        $("#loss_xp").after(
            "<div class='validation_loss_xp_info v-error-msg'>Loss Eperience is empty</div>"
        );
        $('#loss_xp').fieldErrorState();
        errornumber = 1;
    } else {
        $('#loss_xp').fieldSuccessState();
    }

   $('#sendform_lossxp').html('Saving...');
   /* Submit form data using ajax*/

   $.ajax({
      url: "{{ url('/get-quote/addbondslossxp')}}",
      method: "POST",
      data: $('#form_lossxp').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){

        var checkValLoss = jQuery('.lossxp_check').val();
         //------------------------
         if($.isEmptyObject(response.error)){
            $('#alert_msg1').hide();
            $('#sendform_lossxp').html('Add');
            $('#msg_div').show();
            $('#bonds_loss_exp01').show();
            $('#req_lossexp').html(response.success);
            $('#msg_div').removeClass('d-none');
            $("input[name='loss_xp']").val("");

            $('#form_lossxp').trigger("reset");


        if (checkValLoss === '') {
                    var table = jQuery('#lossxp_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondslossxp') }}"+"/"+trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                        { data: 'id', name: 'id', visible: false},
                        { data: 'loss_xp', name: 'loss_xp' },
                        {data: 'action', name: 'action', orderable: false},
                        ],
                        columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                    jQuery('.lossxp_check').val('1');
                    } else {

                        var table = jQuery('#lossxp_table').DataTable();
                        table.ajax.reload();
                        jQuery('.lossxp_check').val('1');
                    }

          }else{
                        $('#msg_div').hide();
                        $('#bonds_loss_exp02').show();
                        $('#req_lossexp').html(response.error);
                        $('#sendform_lossxp').html('Add');



                    }

         setTimeout(function(){
            $('#bond_loss_exp').hide();
            },10000);

         //--------------------------
      }

    });

   });

</script>
