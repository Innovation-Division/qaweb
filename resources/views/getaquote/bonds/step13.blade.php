
<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Comments</h4> <br>
            <div class="card-body">
        <div id="bond_comment" class="bond_comment">
        </div>
        <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <textarea rows="5" name="txt_comment" id="txt_comment" class="form-control required-entry" placeholder="Comments*"></textarea>
                    </div>
                </div>
            </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_comment" name="sendform_comment" class="btn btn-primary">Post Comment</button>
            </div>
        </div>
    </div>
    <div class="col-md-12_ break-two"> <br> </div>
    <div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
    <form id="form_sendbomd" name="form_sendbomd" method="post" enctype="multipart/form-data" action="javascript:void(0)">
        {{csrf_field()}}
            <div class="alert alert-success d-none" id="msg_div12" hidden>
                 <span id="res_message12"></span>
            </div>
           <div class="alert alert-danger d-none" id="alert_msg12" hidden>
                 <span id="res_error12"></span>
            </div>

    </div>
</div>
        <div class="container col-md-12_ text-center mt-5">
            <div class="row justify-content-center">
              <div class="col-auto">

                <input type="submit" value="Submit" id="sendform_bonds" name="sendform_bonds" class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
              </div>
              <div class="col-auto">
                <input type="submit" value="Clear" class="btn btn-secondary" style="min-width: 100px; margin-top: 10px" formaction="{{route('refreshquotebonds')}}" />
              </div>
              <div class="col-auto">
                <a href="{{route('bondsquote')}}" class="btn btn-success" style="min-width: 100px; margin-top: 10px">Back</a>
              </div>
            </div>
          </div>
    </form>
</div>

{{-- <div id="successModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h3>Success!</h3>
      <p id="successMessage"></p>
    </div>
  </div> --}}


  <div class="modal" id="successModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style='background-color:white'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style='background-color:white'>
            <h3>Success!</h3>
            <p id="successMessage" style='color:#008080'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
$('#sendform_comment').click(function(e){
   e.preventDefault();
   jQuery.noConflict();
    var trans_id = $("input[name='transno']").val();
   var csrf_token = $('meta[name="csrf-token"]').attr('content');

   var errornumber = 0;
    if ($('#txt_comment').val() == "") {
        // $("#policy_type").after(
        //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
        // );fin_remarks
        $('#txt_comment').fieldErrorState();
        errornumber = 1;
    } else {
        $('#txt_comment').fieldSuccessState();
    }
    if (errornumber == 1) {
        return false;
    }

   $('#sendform_comment').html('Saving...');


   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('/get-quote/addbondscomments')}}",
      method: "POST",
      data: $('#form_comment').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
      dataType: 'json',
      success: function(response){
        var trans_id = $("input[name='transno']").val();
         //------------------------
         if($.isEmptyObject(response.error)){

            $('#alert_msg10').hide();
            $('#sendform_comment').html('Post Comments');
            $('#msg_div10').show();
            $('#res_message10').show();
            $('#res_message10').html(response.success);
            $('#msg_div10').removeClass('d-none');

              $('#form_comment').trigger("reset");
              getcomments(trans_id);
            }else{
                        $('#msg_div10').hide();
                          $('#alert_msg10').show();
                        $('#sendform_comment').html('Post Comments');
                        $('#res_error10').html(response.error);

                    }
         //--------------------------
      }

    });


 });



        </script>
    <!-- END OF BOND-->

