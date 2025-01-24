
<div class="modal fade in" id="updateranual" tabindex="-1" role="dialog" aria-labelledby="updateranual" aria-hidden="false">
    <div class="modal-backdrop fade in"></div>
    <div class="modal-dialog modal-lg" role="document">
        <div style='background-color:white;color:black'>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color:black">Update Rate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="passtocontroller" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-rows" style="display: flex;">
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field3">Bond Required</label>
                            <input type="hidden" id="field1" name='id' class="form-control" readonly>
                            <input type="text" id="field3" name='req_bond' class="form-control"readonly>
                        </div>
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field2">Bond Type</label>
                            <input type="text" id="field2" name='bond_type' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="input-rows" style="display: flex;">
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field5">Bond Amount</label>
                            <input type="text" id="field5" name='bond_amt_req' class="form-control" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" >
                        </div>
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field4">Proposed Retention</label>
                            <input type="text" id="field4" name='prop_ret' class="form-control">
                        </div>
                    </div>
                    <div class="input-rows" style="display: flex;">
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field7">Annual Premium</label>
                            <input type="text" id="field7" name='bonds_annual_prem_req' class="form-control" readonly>
                        </div>
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field6">Annual Rate</label>
                            <input type="text" id="field6" name='bonds_annual_rate' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="input-rows" style="display: flex;">

                        <div class="input-column" style="width: 33.33%; padding: 10px;">
                            <label for="field8">Date From:</label>
                            <input type="text" id="field8"  name='bonds_term_req_a' class="form-control" readonly>
                        </div>
                        <div class="input-column" style="width: 33.33%; padding: 10px;">
                            <label for="field10">Date To:</label>
                            <input type="text" id="field10"  name='bonds_term_req_b' class="form-control" readonly>
                        </div>
                        <div class="input-column" style="width: 33.33%; padding: 10px;">
                            <label for="field9">Term Premium</label>
                            <input type="text" id="field9" name='bonds_prem_req' class="form-control field9"   onkeypress="return isNumber(event)">
                        </div>
                        <input type="hidden" id="account_type_field" name='account_type_field' class="form-control ">
                        <input type="hidden" id="policy_field" name='policy_field' class="form-control ">
                        <input type="hidden" id="contract_field" name='contract_field' class="form-control ">
                    </div>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"  id='get_value_controller' class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>



<div class="modal" id="copyissue" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style='background-color:white'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style='color:#008080'></p>
            <p> Successfully created  copy of Issue Policy </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal" id="firstPageMessage" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style='background-color:white'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style='background-color:white'>
            <p id="firstPageMessagetext" style='color:#008080'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

