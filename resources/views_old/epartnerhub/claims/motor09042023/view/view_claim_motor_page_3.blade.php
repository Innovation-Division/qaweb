<div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Gross Estimate Amount </label>
            <input id="gross_estimate_view" name="gross_estimate_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('gross_estimate_view') }}" placeholder="0.00">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12" style="margin-bottom:-15px;">
            <label id="lbl_claim_recovery_view">Is the with claim recovery?</label> 
        </div> 
        <div class="col-md-12 break-two"><br></div> 
        <div  class="col-md-12" >
            <button type="button" id="claim_motor_recovery_yes_view" name="claim_motor_recovery_yes_view" class="btn" >Yes &nbsp;&nbsp;</button>
            <button type="button" id="claim_motor_recovery_no_view" name="claim_motor_recovery_no_view" class="btn" >No &nbsp;&nbsp;</button>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label id="lbl_cat_loss" for="cb_par_total_loss">Category of Loss</label>
        </div>
    </div>
    <div class="col-md-12">
        
        <div class="col-md-3">
            <input type="checkbox" id="cb_par_total_loss_view" name="cb_par_total_loss_view" value="yes">
            <label id="lbl_par_total_loss_view" for="cb_par_total_loss_view">Partial or Total Loss</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_bi_view" name="cb_bi_view" value="yes">
            <label id="lbl_cb_bi_view" for="cb_bi_view">Bodily Injury</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_bi_tp_view" name="cb_bi_tp_view" value="yes">
            <label id="lbl_cb_bi_tp_view" for="cb_bi_tp_view">Bodily Injury (Third party)</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <input type="checkbox" id="cb_theft_accessory_view" name="cb_theft_accessory_view" value="yes">
            <label id="lbl_cb_theft_accessory_view" for="cb_theft_accessory_view">Theft of Accessory</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_vec_tp_view" name="cb_vec_tp_view" value="yes">
            <label id="lbl_cb_vec_tp_view" for="cb_vec_tp_view">Vehicle (Third Party)</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_recovery_view" name="cb_recovery_view" value="yes">
            <label id="lbl_cb_recovery_view" for="cb_recovery_view">Recovery</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <input type="checkbox" id="cb_carnap_view" name="cb_carnap_view" value="yes">
            <label id="lbl_cb_carnap_view" for="cb_carnap_view">Carnap</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_pd_tp_view" name="cb_pd_tp_view" value="yes">
            <label id="lbl_cb_pd_tp_view" for="cb_pd_tp_view">Property Damage (Third Party)</label>
        </div>
        <div class="col-md-5">
            <input type="checkbox" id="cb_recovery_other_insurance_view" name="cb_recovery_other_insurance_view" value="1">
            <label id="lbl_cb_recovery_other_insurance_view" for="cb_recovery_other_insurance_view">Recovery of Other Insurance Company</label>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label for="cb_par_total_loss">Vehicle Information</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-4">
            <label>Year</label>
            <select  id="drpYear_claim_view" name="drpYear_claim_view" class="form-control dynamicyearclaim selectpicker drpYear_claim_view selectb5" data-style="input-lg drpYear_claim_view dynamicyear selectb5" data-size="10" data-live-search="true" style="font-family: muli; ">
                @if (old('drpYear_claim_view'))
                    <option value="{{ old('drpYear_claim_view') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly value="">{{ old('drpYear_claim_view') }}</option>                                             
                @else
                    <option value="" selected="selected" style="display:none;" disabled="disabled" readonly value="">Year * </option>
                @endif
                @foreach($cocogen_fmv_years as $cocogen_fmv_year)
                <option value="{{ $cocogen_fmv_year->year }}" >{{$cocogen_fmv_year->year}} </option>  
                @endforeach     
            </select>   
        </div>
        <div class="col-md-4">
            <label>Brand</label>
            <select  id="brand_claim_view" name="brand_claim_view" class="form-control dynamicbrand_claim_view selectpicker brand_claim_view selectb5" data-style="input-lg brand_claim_view" data-size="10" data-live-search="true" style="font-family: muli" >
                @if (old('brand_claim_view'))
                    <option value="{{ old('brand_claim_view') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('brand_claim_view') }}</option>                                             
                @else
                    <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Brand* </option>
                @endif
            </select>
        </div>
        <div class="col-md-4">
            <label>Model</label>
            <select  id="model_claim_view" name="model_claim_view" class="form-control dynamic selectpicker model_claim_view selectb5" data-style=" input-lg model_claim_view" data-size="10" data-live-search="true"  style="font-family: muli">
                @if (old('model_claim_view'))
                    <option value="{{ old('model_claim_view') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('model_claim_view') }}</option>                                             
                @else
                    <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Model* </option>
                @endif 
            </select>
        </div>
    </div>

    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>MV File No.</label>
            <input id="mv_file_no_claim_view" name="mv_file_no_claim_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('mv_file_no_claim_view') }}" >
        </div>
        <div class="col-md-4 form-group">
            <label>Plate No.</label>
            <input id="palte_no_claim_view" name="palte_no_claim_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('palte_no_claim_view') }}" >
        </div>
        <div class="col-md-4 form-group">
            <label>Engine No.</label>
            <input id="engine_no_claim_view" name="engine_no_claim_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('engine_no_claim_view') }}" >
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Color</label>
            <input id="color_claim_view" name="color_claim_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('color_claim_view') }}" >
        </div>
        <div class="col-md-4 form-group">
            <label>Chassis No.</label>
            <input id="chassis_no_claim_view" name="chassis_no_claim_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('chassis_no_claim_view') }}" >
        </div>
        <div class="col-md-4 form-group">
            <label>Conduction Sticker No.</label>
            <input id="conduction_sticker_no_claim_view" name="conduction_sticker_no_claim_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('conduction_sticker_no_claim_view') }}" >
        </div>
    </div>

    <div class="col-md-12 break-two"><br></div>

    <div class="col-md-12">
            <div class="table-responsive">
                <table id="tbl_table_motor_upload" name="tabl_final_summary" class="table table-bordered_" style="">
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
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Partial Loss/Total Loss/Theft of Accessory")
                                    <tr class="motor_claim_loss_partial_view" style="display:none">
                                        <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                            <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="'file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Carnap")
                                    <tr class="motor_claim_loss_carnap_view" style="display:none">
                                        <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                            <td colspan="" class="text-color-dark" style="">
                                                <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                                <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                            </td>
                                            <td class="text-color-dark" style="text-align: left;">
                                                    <div class="yes">
                                                        <span class="btn_upload">
                                                            <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                            Select File
                                                        </span>
                                                    </div>
                                                    <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                            </td>
                                            <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                            </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Bodily Injury")
                                    <tr class="motor_claim_loss_bi_view" style="display:none">
                                        <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                            <td colspan="" class="text-color-dark" style="">
                                                <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                                <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                            </td>
                                            <td class="text-color-dark" style="text-align: left;">
                                                    <div class="yes">
                                                        <span class="btn_upload">
                                                            <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                            Select File
                                                        </span>
                                                    </div>
                                                    <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                            </td>
                                            <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                            </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Vehicle (Third Party)")
                                    <tr class="motor_claim_loss_vehicleTP_view" style="display:none">
                                    <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                            <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Property Damage (Third Party)")
                                    <tr class="motor_claim_loss_PDTP_view" style="display:none">
                                    <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                            <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Bodily Injury (Third Party)")
                                    <tr class="motor_claim_loss_BITP_view" style="display:none">
                                    <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                            <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Recovery")
                                    <tr class="motor_claim_loss_recovery_view" style="display:none">
                                    <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                            <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Recovery of Other Insurance company")
                                    <tr class="motor_claim_loss_recovery_other_insurance_view" style="display:none">
                                    <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                            <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Other")
                                    <tr class="motor_claim_other_view" style="display:none">
                                    <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial_view{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <input type="hidden" id="file_upload_motor_hd_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_hd_view[]">
                                            <a id="file_upload_motor_label_view{{$cocogen_epartnerhub_claim_upload_files->id}}"  href="#" target="_blank"></a> &nbsp<i id="file_upload_motor_close_view{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload_view" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_view{{$cocogen_epartnerhub_claim_upload_files->id}}" name="view_file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_view" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error_view{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <label id="file_upload_motor_status{{$cocogen_epartnerhub_claim_upload_files->id}}" style="font-size:12px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        
                        <style type="text/css">
                           #tbl_table_motor_upload{
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
            <table id="tbl_motor_generic_table">

            </table>
        </div>
        
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
