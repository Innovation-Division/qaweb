<div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Gross Estimate Amount </label>
            <input id="gross_estimate_pa_view" name="gross_estimate_pa_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('gross_estimate_pa_view') }}" placeholder="0.00">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label id="lbl_par_total_loss_pa">Category of Loss</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_med_expense_reim_view" name="cb_med_expense_reim_view" value="1">
            <label id="lbl_med_expense_reim_view" for="cb_med_expense_reim_view">Medical Expense Reimbursement</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_dis_de_view" name="cb_dis_de_view" value="1">
            <label id="lbl_dis_de_view" for="cb_dis_de_view">Disability / Death</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_educ_asst_claim_view" name="cb_educ_asst_claim_view" value="1">
            <label id="lbl_educ_asst_claim_view" for="cb_educ_asst_claim_view">Educational Assistance Claim</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <input type="checkbox" id="cb_fire_asst_bene_claim_view" name="cb_fire_asst_bene_claim_view" value="1">
            <label id="lbl_fire_asst_bene_claim_view" for="cb_fire_asst_bene_claim_view">Fire Assistance Benefit Claim</label>
        </div>
    </div>
   

    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Assured Name</label>
            <input id="pa_first_name_owner_view" name="pa_first_name_owner_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('pa_first_name_owner_view') }}" placeholder="First Name" >
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="pa_middle_name_owner_view" name="pa_middle_name_owner_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('pa_middle_name_owner_view') }}" placeholder="Middle Name" >
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="pa_last_name_owner_view" name="pa_last_name_owner_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('pa_last_name_owner_view') }}" placeholder="Last Name"  >
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>How did the accident happen?</label>
            <textarea class="form-control" rows="5" id="pa_acc_happen_view" name="pa_acc_happen_view"></textarea>
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
                            
                        </th>
                        <th style="width:150px;">
                            Status
                        </th>
                    </thead>
                    <tfoot>
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Medical Reimbursement")
                                    <tr class="pa_claim_reimbursenment_view" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_med_reim_lbl_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_pa_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_hd_view[]">
                                            <input type="hidden" id="file_upload_pa_hd_type_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_hd_type_view[]">
                                            <a id="file_upload_pa_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_pa_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_pa_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_pa_reimbursment[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;width:15px !important;">
                                                <label id="file_upload_pa_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Disability / Death Claim")
                                    <tr class="pa_claim_dis_dea_claim_view" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_med_reim_lbl_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_pa_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_hd_view[]">
                                            <a id="file_upload_pa_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_pa_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_pa_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_pa_reimbursment[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;width:15px !important;">
                                                <label id="file_upload_pa_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Educational Assistance Claim")
                                    <tr class="pa_claim_edu_asstnce_view" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_med_reim_lbl_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_pa_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_hd_view[]">
                                            <a id="file_upload_pa_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_pa_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_pa_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_pa_reimbursment[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;width:15px !important;">
                                                <label id="file_upload_pa_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "PA")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Fire Assistance Benefit Claims")
                                    <tr class="pa_claim_fire_asstance_bene_view" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_pa_med_reim_lbl_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_pa_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_pa_hd_view[]">
                                            <a id="file_upload_pa_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_pa_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_pa_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_pa_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_pa_reimbursment[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_pa_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_pa_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;width:15px !important;">
                                                <label id="file_upload_pa_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
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
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <h2>Admin attachment</h2>
        </div>
        <div class="col-md-12 form-group">
            <table id="tbl_pa_generic_table"></table>
        </div>
    </div>

    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-sm-4">
                
        </div>      
    </div>

   