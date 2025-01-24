<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper col-md-9_ col-offset-0 col-12 col-lg-offset-1 col-lg-10">
        <div class="card">
                <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;" id='naturalid'>Nature Request </h4> <br>
                <div class="card-body">
        <div class="row" >
        </div>
        <div class="col-md-4">
        </div>
        <input id="transno1" name="transno1" type="text" value="" class="hide">
        <input id="transno" name="transno" type="text" value="" class="hide">
        <div class="clearfix"></div>
        <div class="form-group" style="padding-left:10px !important">
            <input id="copytransno" name="copytransno" type="text" value="{{ !empty($transno) ? $transno : ""}}" class="hide">

            <label for="radioGroup1" id='clientlabel'>Client:</label>
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="client" id="newclient" value="New">
                <label class="form-check-label" for="newclient" id='newclientlabel'>New</label>
            </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="client" id="oldClient" value="Old">
                    <label class="form-check-label" for="oldClient" id='oldclientlabel'>Old</label>
                </div>


            <span id='display_old'>
                <label for="radioGroup2" style="padding-left:100px !important" id='updatelabel'>Update KYC:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="updateKYC" id="updateKYCyes" value="Yes">
                    <label class="form-check-label" for="option3" id='updateYes'>Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="updateKYC" id="updateKYCno" value="No">
                    <label class="form-check-label" for="option4" id='updateNo'>No</label>
                </div>
            </span>

            <span id='client_validate'> </span>
        </div>
                <div class="col-md-12_ break-two"> <br> </div>
                <div class="form-group">
                    <div class="row" style="padding-left:10px !important">
                        <div class="col-md-4">
                        <label for="qrequest" id='reqlabel'>Request:</label>
                        <div class="d-flex flex-wrap">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="qrequest" id="quoteNew" value="Quotation">
                            <label class="form-check-label" for="option5" id='reqquote'>Quotation</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="qrequest" id="issueNew" value="Issue Policy">
                            <label class="form-check-label" for="option6" id='reqissue'>Issue New Policy</label>
                            </div>
                        </div>
                        <span class='newmodule' id='newmodule'></span>
                        </div>
                        {{-- <div class="col-md-4" id='endoresePolNomodule'>
                            <label for="endorse" id='reqendo'>Endorse Policy No</label>
                            <input type="text" class="form-control" id='endoresePolNo' name="endoresePolNo" placeholder="">
                        </div> --}}
                    </div>
                    <span class='reqm' id='reqm'></span>

        <div class="col-md-4">
            <div class="form-group">
                    <label for="acode">Agent Code</label>
                        <select  id="acode" name="acode" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                            <option value="">- Select -</option>
                            @foreach ($agent_list as $item)
                            <option value="{{ $item->code }}"> {{ $item->code  }}-{{ $item->agentname }}</option>
                            @endforeach
                    </select>
                    </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
                    <div class="form-group">
                    <label for="agent">Agent/Broker</label>
                        <input name="agent" id="agent" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/.]+" class="form-control input-lg   personal_ifno_mobile" maxlength="100" readonly>
                    </div>
        </div>

        <div class="col-md-12">
            <div class="form-group principal_text_group">
                     <label for="principal">Principal</label>
                        <input name="principal" id="principal" type="text"  class="form-control input-lg   personal_ifno_mobile principal" maxlength="100">
                    </div>
        </div>
        <div class="col-md-12">
            <div class="form-group principal_dropdown_group">
                <label for="principal">Principal</label>
                <input type="text" id="principal_show_list" class="form-control"  name="principal2"  placeholder="Search..." autocomplete="off">
                <div id="dropdownMenu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- Dropdown items will be dynamically added here -->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="address">Address</label>
                <input name="address" id="address" type="text" pattern="[a-zA-Z/.]+"  class="form-control input-lg   personal_ifno_mobile" maxlength="100">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="date_incorp">Date of Incorporation</label>
                        <input name="date_incorp" id="date_incorp" type="text" class="form-control input-lg   personal_ifno_mobile" maxlength="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="company_tin">Company TIN</label>
                        <input name="company_tin" id="company_tin" type="text" class="form-control input-lg   personal_ifno_mobile" maxlength="100">
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                        <div class="form-group">
                        <label for="contact_person">Contact Person</label>
                        <input name="contact_person" id="contact_person" type="text" class="form-control input-lg   personal_ifno_mobile" maxlength="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="contact_no">Contact No</label>
                        <input name="contact_no" id="contact_no" type="text" class="form-control input-lg   personal_ifno_mobile" maxlength="100">
                    </div>
                </div>
                <div class="col-md-4">
                </div>
        </div>
        <div class="form-group">
        <label for="addres_info">Email Address</label>
            <input name="email" id="email" type="text"   pattern="[a-zA-Z/.]+"  class="form-control input-lg   personal_ifno_mobile" maxlength="100">
        </div>
        <table class='form-group'>
            <tr>
                <td colspan="2">
                    <label for="oblige" style="width: 100%">Obligee&nbsp;<span style='font-size: 10px;color:red'>*Note: If the Obligee name cannot be found, please manually type it in the next field.</span></label>
                </td>
            </tr>
            <tr>
                <td style='width:60%'>
                    <select id="obligee" name="obligee" class="form-control selectpicker obligee address_mobile input-lg selectb5 principal_dropdown" data-style="input-lg btn-white-status_4thpage" data-size="10" data-live-search="true" style=" width: 70%;">
                        <option value="">- Select -</option>

                    </select>
                </td>
                <td style="padding-left: 10px;"> <!-- Add space here -->
                    <input name="obligee2" id="obligee2" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-4">
		<div class="form-group">
        <label for="project">Project</label>
			<input name="project" id="project" type="text" class="form-control input-lg   personal_ifno_mobile" maxlength="100">
		</div>
	</div>
    <div class="col-md-4">
		<div class="form-group">
        <label for="contract_price">Contract Price</label>
			<input name="contract_price" id="contract_price" type="text" class="form-control input-lg   personal_ifno_mobile" maxlength="100" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
		</div>
	</div>
	<div class="col-md-4">
	</div>
    <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="undertaking">Undertaking</label>
                <textarea rows="5" name="undertaking" id="undertaking" class="form-control required-entry" placeholder="Undertaking*"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="company_background">Company Background</label>
                <textarea rows="5" name="company_bgd" id="company_bgd" class="form-control required-entry" placeholder="COMPANY BACKGROUND Brief description about the company (e.g. business address, nature of business)*"></textarea>
            </div>
        </div>
        <div class="col-md-12_ text-center mt-5">
            <div id="nextbutton_save" name="nextbutton">
                <button  id="next_save" name="next_save" type="submit"  class="action btn btn-secondary next_save">Save</button>
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

