<div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Gross Estimate Amount </label>
            <input id="gross_estimate_pa" name="gross_estimate_pa" type="text" class="form-control input-lg" maxlength="100" value="{{ old('gross_estimate_pa') }}" placeholder="0.00">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label id="lbl_par_total_loss_pa">Nature of claim</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_med_expense_reim" name="cb_med_expense_reim" value="1">
            <label id="lbl_med_expense_reim" for="cb_med_expense_reim">Medical Expense Reimbursement</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_dis_de" name="cb_dis_de" value="1">
            <label id="lbl_dis_de" for="cb_dis_de">Disability / Death</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_educ_asst_claim" name="cb_educ_asst_claim" value="1">
            <label id="lbl_educ_asst_claim" for="cb_educ_asst_claim">Educational Assistance Claim</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_fire_asst_bene_claim" name="cb_fire_asst_bene_claim" value="1">
            <label id="lbl_fire_asst_bene_claim" for="cb_fire_asst_bene_claim">Fire Assistance Benefit Claim</label>
        </div>
    </div>
   

    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Assured Name</label>
            <input id="pa_first_name_owner_out" name="pa_first_name_owner_out" type="text" class="form-control input-lg" maxlength="100" value="{{ old('pa_first_name_owner_out') }}" placeholder="First Name" >
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="pa_middle_name_owner_out" name="pa_middle_name_owner_out" type="text" class="form-control input-lg" maxlength="100" value="{{ old('pa_middle_name_owner_out') }}" placeholder="Middle Name" >
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="pa_last_name_owner_out" name="pa_last_name_owner_out" type="text" class="form-control input-lg" maxlength="100" value="{{ old('pa_last_name_owner_out') }}" placeholder="Last Name"  >
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>How did the accident happen?</label>
            <textarea class="form-control" rows="5" id="pa_acc_happen" name="pa_acc_happen"></textarea>
        </div>
    </div>

    <div class="col-md-12 break-two"><br></div>

    <div class="col-md-12">
            <div class="table-responsive">
                <table id="tbl_table_pa_upload" name="tabl_final_summary" class="table table-bordered_" style="">
                    <thead>
                        <th>
                            Required Documents
                        </th>
                        <th>
                            File/s 
                        </th>
                        <th>
                            Status
                        </th>
                    </thead>
                    <tfoot>
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Medical Reimbursement")
                                    <input type="hidden" id="hd_name_file_title_upload_pa_medreim" name="hd_name_file_title_upload_pa_medreim[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="pa_claim_reimbursenment" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_med_reim_lbl{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_pa_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_pa_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_reimbursment[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Disability / Death Claim")
                                    <input type="hidden" id="hd_name_file_title_upload_pa_dis_deat" name="hd_name_file_title_upload_pa_dis_deat[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="pa_claim_dis_dea_claim" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_dis_dea_claim_lbl{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_pa_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_pa_dis_dea_claim{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_dis_death_claim[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Educational Assistance Claim")
                                    <input type="hidden" id="hd_name_file_title_upload_pa_ed_assista" name="hd_name_file_title_upload_pa_ed_assista[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="pa_claim_edu_asstnce" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_edu_asstanc_claim_lbl{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_pa_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_pa_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_edu_asstnce[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Fire Assistance Benefit Claims")
                                    <input type="hidden" id="hd_name_file_title_upload_pa_fire_asstance" name="hd_name_file_title_upload_pa_fire_asstance[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="pa_claim_fire_asstance_bene" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_fire_asst_bene_lbl{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_pa_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_pa_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_fire_asstance_bene[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        <style type="text/css">
                           #tbl_table_pa_upload{
                                    border-right: 1px solid #fff !important;
                            }
                        </style>
                    </tfoot>
                </table> 
            </div>
    </div>


    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-sm-4">
                <button id="clm_pa_upload_not_new" name="clm_pa_upload_not_new" type="submit"  class="btn btn-secondary">Submit</button>
        </div>      
    </div>

