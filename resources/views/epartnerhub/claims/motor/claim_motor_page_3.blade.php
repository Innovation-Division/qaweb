<div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Gross Estimate Amount </label>
            <input id="gross_estimate" name="gross_estimate" type="text" class="form-control input-lg" maxlength="100" value="{{ old('gross_estimate') }}" placeholder="0.00">
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
            <input type="checkbox" id="cb_par_total_loss" name="cb_par_total_loss" value="yes">
            <label id="lbl_par_total_loss" for="cb_par_total_loss">Partial or Total Loss</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_bi" name="cb_bi" value="yes">
            <label id="lbl_cb_bi" for="cb_bi">Bodily Injury</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_bi_tp" name="cb_bi_tp" value="yes">
            <label id="lbl_cb_bi_tp" for="cb_bi_tp">Bodily Injury (Third party)</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <input type="checkbox" id="cb_theft_accessory" name="cb_theft_accessory" value="yes">
            <label id="lbl_cb_theft_accessory" for="cb_theft_accessory">Theft of Accessory</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_vec_tp" name="cb_vec_tp" value="yes">
            <label id="lbl_cb_vec_tp" for="cb_vec_tp">Vehicle (Third Party)</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_recovery" name="cb_recovery" value="yes">
            <label id="lbl_cb_recovery" for="cb_recovery">Recovery</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <input type="checkbox" id="cb_carnap" name="cb_carnap" value="yes">
            <label id="lbl_cb_carnap" for="cb_carnap">Carnap</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" id="cb_pd_tp" name="cb_pd_tp" value="yes">
            <label id="lbl_cb_pd_tp" for="cb_pd_tp">Property Damage (Third Party)</label>
        </div>
        <div class="col-md-5">
            <input type="checkbox" id="cb_recovery_other_insurance" name="cb_recovery_other_insurance" value="1">
            <label id="lbl_cb_recovery_other_insurance" for="cb_recovery_other_insurance">Recovery of Other Insurance Company</label>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label for="cb_par_total_loss">Vehicle Information</label>
        </div>
    </div>

    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Year</label>
            <input id="drpYear_claim" name="drpYear_claim" type="text" class="form-control input-lg" maxlength="100" value="{{ old('drpYear_claim') }}" >
        </div>
        
        <div class="col-md-4 form-group">
            <label>Brand</label>
            <input id="brand_claim" name="brand_claim" type="text" class="form-control input-lg" maxlength="100" value="{{ old('brand_claim') }}" >
        </div>
        <div class="col-md-4 form-group">
            <label>Plate No. / Conduction Sticker No.</label>
            <input id="palte_no_claim" name="palte_no_claim" type="text" class="form-control input-lg" maxlength="100" value="{{ old('palte_no_claim') }}" >
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
                            Status
                        </th>
                    </thead>
                    <tfoot>
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Partial Loss/Total Loss/Theft of Accessory")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_parloss" name="hd_name_file_title_uploa_motor_parloss[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_partial" style="display:none">
                                        <td  colspan="1" class="text-color-dark" style="color:red"><label id="file_upload_motor_td_name_partial{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_partial_loss[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Carnap")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_carnap" name="hd_name_file_title_uploa_motor_carnap[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_carnap" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_carnap{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_carnap[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Bodily Injury")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_bi" name="hd_name_file_title_uploa_motor_bi[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_bi" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_bi{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_bi[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Vehicle (Third Party)")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_vecTP" name="hd_name_file_title_uploa_motor_vecTP[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_vehicleTP" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_vec_TP{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_vehicleTP[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Property Damage (Third Party)")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_pdTP" name="hd_name_file_title_uploa_motor_pdTP[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_PDTP" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_pdTP{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_PDTP[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Bodily Injury (Third Party)")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_biTP" name="hd_name_file_title_uploa_motor_biTP[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_BITP" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_bitp{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_BITP[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Recovery")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_rec" name="hd_name_file_title_uploa_motor_rec[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_recovery" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_rec{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_recovery[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Recovery of Other Insurance company")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_rec_other" name="hd_name_file_title_uploa_motor_rec_other[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_loss_recovery_other_insurance" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_rec_other{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_recovery_other_insurance[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "MC")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Other")
                                    <input type="hidden" id="hd_name_file_title_uploa_motor_rec_other" name="hd_name_file_title_uploa_motor_rec_other[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="motor_claim_other" style="display:none">
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_motor_td_name_rec_other{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_motor_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_motor_close{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_motor_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_motor_other[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_motor_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
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
    <div class="col-md-12 break-two"><br></div>


    <div class="col-md-12">
        <div class="col-sm-4">
                <button type="submit" id="clm_motor_submit" name="clm_motor_submit"   class="btn btn-secondary clm_motor_submit">Submit</button>
        </div>      
    </div>
