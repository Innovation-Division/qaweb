    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Gross Estimate Amount </label>
            <input id="gross_estimate_property" name="gross_estimate_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('gross_estimate_property') }}" placeholder="0.00">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label id="lbl_cat_loss_property">Category of Loss</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <input type="checkbox" id="cb_property_building" name="cb_property_building" value="1">
            <label  id="lbl_cat_loss_property_building" for="cb_property_building">Building</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-5">
            <input type="checkbox" id="cb_property_stocl_building" name="cb_property_stocl_building" value="1">
            <label  id="lbl_cat_loss_property_stock"  for="cb_property_stocl_building">Stock and Building Contents</label>
        </div>
    </div>
   

    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Property Owner</label>
            <input id="property_first_name_owner" name="property_first_name_owner" type="text" class="form-control input-lg" maxlength="100" value="{{ old('property_first_name_owner') }}" placeholder="First Name" >
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="property_middle_name_owner" name="property_middle_name_owner" type="text" class="form-control input-lg" maxlength="100" value="{{ old('property_middle_name_owner') }}" placeholder="Middle Name" >
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="property_last_name_owner" name="property_last_name_owner" type="text" class="form-control input-lg" maxlength="100" value="{{ old('property_last_name_owner') }}" placeholder="Last Name"  >
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>

    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>How did the accident happen?</label>
            <textarea class="form-control" rows="5" id="property_acc_happen" name="property_acc_happen"></textarea>
        </div>
    </div>

    <div class="col-md-12 break-two"><br></div>

    <div class="col-md-12">
            <div class="table-responsive">
                <table id="tbl_table_property_upload" name="tabl_final_summary" class="table table-bordered_" style="">
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
                            @if($cocogen_epartnerhub_claim_upload_files->line == "FI")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Building")
                                <input type="hidden" id="hd_name_file_title_upload_property_building" name="hd_name_file_title_upload_property_building[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="property_claim_building" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_property_building_lbl{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_property_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_property_building{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_property_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_property_building[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_property" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_property_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        @foreach($cocogen_epartnerhub_claim_upload_file as $cocogen_epartnerhub_claim_upload_files)
                            @if($cocogen_epartnerhub_claim_upload_files->line == "FI")
                                @if($cocogen_epartnerhub_claim_upload_files->category == "Stocks and Building Content")
                                <input type="hidden" id="hd_name_file_title_upload_property_csstocks" name="hd_name_file_title_upload_property_csstocks[]" value="{{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}">
                                    <tr class="property_claim_cstocks" style="display:none" >
                                        <td colspan="1" class="text-color-dark" style=""><label id="file_upload_property_stock_lbl{{$cocogen_epartnerhub_claim_upload_files->id}}"> {{$cocogen_epartnerhub_claim_upload_files->upload_file_name}}</label></td>
                                        <td colspan="" class="text-color-dark" style="">
                                            <label id="file_upload_property_label{{$cocogen_epartnerhub_claim_upload_files->id}}"></label> &nbsp<i id="file_upload_property_stock{{$cocogen_epartnerhub_claim_upload_files->id}}" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" class="fa fa-times empty_fileupload" aria-hidden="true" style="color:red;cursor:pointer;display:none;"></i>

                                        </td>
                                        <td class="text-color-dark" style="text-align: left;">
                                                <div class="yes">
                                                    <span class="btn_upload">
                                                        <input type="file" id="file_upload_property_{{$cocogen_epartnerhub_claim_upload_files->id}}" name="file_upload_property_cstocks[]" data-id="{{$cocogen_epartnerhub_claim_upload_files->id}}" title="" class="input-img_property" multiple/>
                                                        Select File
                                                    </span>
                                                </div>
                                                <label id="file_upload_property_label_error{{$cocogen_epartnerhub_claim_upload_files->id}}" style="color:red;display:none;font-size:10px;text-align:left;line-height:1px;"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        <style type="text/css">
                           #tbl_table_property_upload{
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
                <button id="clm_property_upload" name="clm_property_upload" type="submit"  class="btn btn-secondary">Submit</button>
        </div>      
    </div>

