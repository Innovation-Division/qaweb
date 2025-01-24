<div class="modal fade bs-example-modal-lg modal-light" id="claimsPropertyModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
        <div class="modal-content">
            <form method="post" action="{{ route('editpropertynewsave') }}"  enctype="multipart/form-data" style="background-color:#ffffff">
            {{ csrf_field() }}		
                <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="claimsPropertyModalView" style="color: white; font-size: 27px !important; font-weight: 700;">Property Claims Information</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hd_claim_motor_property_line" name="hd_claim_motor_property_line" value="FI">
                    <input type="hidden" id="hd_claim_motor_property_id" name="hd_claim_motor_property_id" value="">
                  
                    <input type="hidden" id="hd_claim_property_same_insured_view_" name="hd_claim_property_same_insured_view_" value="no">
                    <input type="hidden" id="hd_claim_property_view_same_insured" name="hd_claim_property_view_same_insured" value="no">
				    <input type="hidden" id="hd_claim_property_view_prem_paid" name="hd_claim_property_view_prem_paid" value="no">
				    <input type="hidden" id="hd_claim_property_view_within_inception" name="hd_claim_property_view_within_inception" value="no">
				    <input type="hidden" id="hd_claim_property_view_risk_insured" name="hd_claim_property_view_risk_insured" value="no">
				    <input type="hidden" id="hd_claim_property_view_morgagee" name="hd_claim_property_view_morgagee" value="no">
				    <input type="hidden" id="hd_claim_motor_property_view_recovery" name="hd_claim_motor_property_view_recovery" value="no">


                    @include('epartnerhub.claims.property.view.view_claim_property_page_1')
                    @include('epartnerhub.claims.property.view.view_claim_property_page_2')
                    @include('epartnerhub.claims.property.view.view_claim_property_page_3')

                    <div class="container">
                        <div class="form-group">
                            <textarea id="status-box_property_view" name="status-box_property_view" class="form-control status-box_property" rows="3" placeholder="Enter your comment here..."></textarea>
                        </div>
                        <div class="button-group pull-right">
                            <p class="counter_property">250</p>
                            <a href="#" class="btn btn-property-comment-add btn-primary">Post</a>
                        </div>
                        <div class="col-md-12"> <br>
                            <ul id="props_id" name="props_name" class="posts_property" style="max-width 800px;">
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button id="clm_property_view_upload" name="clm_property_view_upload" type="submit"  class="btn btn-secondary">Submit</button>
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.propertyClaim').click(function() {
        var _token = $('input[name="_token"]').val();
        var url = $('input[name="url"]').val();
        var id =$(this).data("id");
        $.ajax({
            url: url + '/claims/property/get/details',
            method:"GET",
            data:{ _token:_token,id:id},
            success:function(result)
            {

                    

                $('.posts_property').empty();
                $('.posts_property li').remove();
                $(".property_view_claim_cstocks").hide();
                $(".property_view_claim_building").hide();
                $.each(result, function(key, value){
                    var d = new Date(value.date_of_loss),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                    if (month.length < 2){ month = '0' + month};
                    if (day.length < 2){day = '0' + day};
                    var fulldate =  month+'/'+day +'/'+year;

                    if(value.status === "COMPLETED"){
                        $(".permanent_province_property_view").prop('style',  'background-color:#e9ecef');
                        $(".permanent_municipality_property_view").prop('style',  'background-color:#e9ecef');
                        $(".permanent_barangay_property_view").prop('style',  'background-color:#e9ecef');
                        $('#Loss_date_property_view').removeClass('readonly');
                        $('#Loss_time_property_view').removeClass('readonly');

                        $("#policyNo_property_view").prop('disabled', true);
                        $("#Loss_time_property_view").prop('disabled', true);
                        $("#Loss_date_property_view").prop('disabled', true);
                        $("#Loss_date_property_view").prop('disabled', true);
                        $("#location_loss_property_view").prop('disabled', true);
                        $("#email_address_property_view").prop('disabled', true);
                        $("#contact_no_property_view").prop('disabled', true);
                        $("#claim_property_view_same_insured_yes").prop('disabled', true);
                        $("#claim_property_view_same_insured_no").prop('disabled', true);
                        $("#claim_property_view_prem_paid_yes").prop('disabled', true);
                        $("#claim_property_view_prem_paid_no").prop('disabled', true);
                        $("#claim_property_view_within_inception_yes").prop('disabled', true);
                        $("#claim_property_view_within_inception_no").prop('disabled', true);
                        $("#claim_property_view_risk_insured_yes").prop('disabled', true);
                        $("#claim_property_view_risk_insured_no").prop('disabled', true);
                        $("#relate_accident_property_view").prop('disabled', true);
                        $("#morgaged_to_property_view").prop('disabled', true);
                        $("#claim_property_view_morgagee_yes").prop('disabled', true);
                        $("#claim_property_view_morgagee_no").prop('disabled', true);
                        $("#gross_estimate_property_view").prop('disabled', true);
                        $("#claim_motor_property_view_recovery_yes").prop('disabled', true);
                        $("#claim_motor_property_view_recovery_no").prop('disabled', true);
                        $("#cb_property_view_building").prop('disabled', true);
                        $("#cb_property_view_stocl_building").prop('disabled', true);
                        $("#property_view_first_name_owner").prop('disabled', true);
                        $("#property_view_middle_name_owner").prop('disabled', true);
                        $("#property_view_last_name_owner").prop('disabled', true);
                        $("#property_view_acc_happen").prop('disabled', true);
                        $("#status-box_property_view").prop('disabled', true);
                    }else{
                        $(".permanent_province_property_view").prop('style',  'background-color:#fff');
                        $(".permanent_municipality_property_view").prop('style',  'background-color:#fff');
                        $(".permanent_barangay_property_view").prop('style',  'background-color:#fff');
                        $('#Loss_date_property_view').addClass('readonly');
                        $('#Loss_time_property_view').addClass('readonly');

                        $("#policyNo_property_view").prop('disabled', false);
                        $("#Loss_time_property_view").prop('disabled', false);
                        $("#Loss_date_property_view").prop('disabled', false);
                        $("#Loss_date_property_view").prop('disabled', false);
                        $("#location_loss_property_view").prop('disabled', false);
                        $("#email_address_property_view").prop('disabled', false);
                        $("#contact_no_property_view").prop('disabled', false);
                        $("#claim_property_view_same_insured_yes").prop('disabled', false);
                        $("#claim_property_view_same_insured_no").prop('disabled', false);
                        $("#claim_property_view_prem_paid_yes").prop('disabled', false);
                        $("#claim_property_view_prem_paid_no").prop('disabled', false);
                        $("#claim_property_view_within_inception_yes").prop('disabled', false);
                        $("#claim_property_view_within_inception_no").prop('disabled', false);
                        $("#claim_property_view_risk_insured_yes").prop('disabled', false);
                        $("#claim_property_view_risk_insured_no").prop('disabled', false);
                        $("#relate_accident_property_view").prop('disabled', false);
                        $("#morgaged_to_property_view").prop('disabled', false);
                        $("#claim_property_view_morgagee_yes").prop('disabled', false);
                        $("#claim_property_view_morgagee_no").prop('disabled', false);
                        $("#gross_estimate_property_view").prop('disabled', false);
                        $("#claim_motor_property_view_recovery_yes").prop('disabled', false);
                        $("#claim_motor_property_view_recovery_no").prop('disabled', false);
                        $("#cb_property_view_building").prop('disabled', false);
                        $("#cb_property_view_stocl_building").prop('disabled', false);
                        $("#property_view_first_name_owner").prop('disabled', false);
                        $("#property_view_middle_name_owner").prop('disabled', false);
                        $("#property_view_last_name_owner").prop('disabled', false);
                        $("#property_view_acc_happen").prop('disabled', false);
                        $("#status-box_property_view").prop('disabled', false);
                    }
                    $('#policyNo_property_view').val(value.policy);
                    $('#Loss_time_property_view').val(value.time_loss);
                    $('#Loss_date_property_view').val(fulldate);
                    $('input[name=hd_claim_motor_property_id]').val(value.id);
                    $('#location_loss_property_view').val(value.location_of_loss);
                    $('#status_property_view').val(value.status);
                    $('#created_by_property_view').val(value.created_by);
                    jQuery('#permanent_province_property_view').append('<option selected value="' + value.province + '">' + value.province + '</option>');    
                    jQuery('#permanent_province_property_view').selectpicker("refresh");

                    jQuery('#permanent_municipality_property_view').append('<option selected value="' + value.municipality + '">' + value.municipality + '</option>');    
                    jQuery('#permanent_municipality_property_view').selectpicker("refresh");

                    jQuery('#permanent_barangay_property_view').append('<option selected value="' + value.barangay + '">' + value.barangay + '</option>');    
                    jQuery('#permanent_barangay_property_view').selectpicker("refresh");

                    $('#contact_no_property_view').val(value.contact_no);
                    $('#email_address_property_view').val(value.email_address);

                    if(value.claimant_same_insured == "no" || value.claimant_same_insured == "yes"){
                        $("#lbl_claim_property_view_same_insured").attr('style',  'color:#373737');
                        $("#claim_property_view_same_insured_yes").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_property_view_same_insured_no").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.claimant_same_insured == "yes"){
                            document.getElementById("claim_property_view_same_insured_yes").style.background='#008080';
                            document.getElementById("claim_property_view_same_insured_yes").style.color ='#ffffff';
                            document.getElementById("claim_property_view_same_insured_no").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_same_insured_no").style.color ='#000000'; 
                            $('input[name=hd_claim_property_same_insured_view_]').val("yes");  
                        }else{
                            document.getElementById("claim_property_view_same_insured_no").style.background='#008080';
                            document.getElementById("claim_property_view_same_insured_no").style.color ='#ffffff';
                            document.getElementById("claim_property_view_same_insured_yes").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_same_insured_yes").style.color ='#000000'; 
                            $('input[name=hd_claim_property_same_insured_view_]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_property_view_same_insured").attr('style',  'color:#CF3C4B');
                        $("#claim_property_view_same_insured_yes").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_property_view_same_insured_no").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_property_same_insured_view_]').val("no");           
                    }

                    if(value.premium_paid == "no" || value.premium_paid == "yes"){
                        $("#lbl_claim_property_view_prem_paid").attr('style',  'color:#373737');
                        $("#claim_property_view_prem_paid_yes").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_property_view_prem_paid_no").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.loss_within_term == "yes"){
                            document.getElementById("claim_property_view_prem_paid_yes").style.background='#008080';
                            document.getElementById("claim_property_view_prem_paid_yes").style.color ='#ffffff';
                            document.getElementById("claim_property_view_prem_paid_no").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_prem_paid_no").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_prem_paid]').val("yes");  
                        }else{
                            document.getElementById("claim_property_view_prem_paid_no").style.background='#008080';
                            document.getElementById("claim_property_view_prem_paid_no").style.color ='#ffffff';
                            document.getElementById("claim_property_view_prem_paid_yes").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_prem_paid_yes").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_prem_paid]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_property_view_prem_paid").attr('style',  'color:#CF3C4B');
                        $("#claim_property_view_prem_paid_yes").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_property_view_prem_paid_no").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_property_view_prem_paid]').val("no");           
                    }

                    if(value.risk_same_as_inured_policy == "no" || value.risk_same_as_inured_policy == "yes"){
                        $("#lbl_claim_property_view_risk_insured").attr('style',  'color:#373737');
                        $("#claim_property_view_risk_insured_yes").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_property_view_risk_insured_no").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.risk_same_as_inured_policy == "yes"){
                            document.getElementById("claim_property_view_risk_insured_yes").style.background='#008080';
                            document.getElementById("claim_property_view_risk_insured_yes").style.color ='#ffffff';
                            document.getElementById("claim_property_view_risk_insured_no").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_risk_insured_no").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_risk_insured]').val("yes");  
                        }else{
                            document.getElementById("claim_property_view_risk_insured_no").style.background='#008080';
                            document.getElementById("claim_property_view_risk_insured_no").style.color ='#ffffff';
                            document.getElementById("claim_property_view_risk_insured_yes").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_risk_insured_yes").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_risk_insured]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_property_view_risk_insured").attr('style',  'color:#CF3C4B');
                        $("#claim_property_view_risk_insured_yes").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_property_view_risk_insured_no").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_property_view_risk_insured]').val("no");           
                    }

                    if(value.loss_within_term == "no" || value.loss_within_term == "yes"){
                        $("#lbl_claim_property_view_within_inception").attr('style',  'color:#373737');
                        $("#claim_property_view_within_inception_yes").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_property_view_within_inception_no").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.loss_within_term == "yes"){
                            document.getElementById("claim_property_view_within_inception_yes").style.background='#008080';
                            document.getElementById("claim_property_view_within_inception_yes").style.color ='#ffffff';
                            document.getElementById("claim_property_view_within_inception_no").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_within_inception_no").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_within_inception]').val("yes");  
                        }else{
                            document.getElementById("claim_property_view_within_inception_no").style.background='#008080';
                            document.getElementById("claim_property_view_within_inception_no").style.color ='#ffffff';
                            document.getElementById("claim_property_view_within_inception_yes").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_within_inception_yes").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_within_inception]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_property_view_within_inception").attr('style',  'color:#CF3C4B');
                        $("#claim_property_view_within_inception_yes").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_property_view_within_inception_no").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_property_view_within_inception]').val("no");           
                    }

                    if(value.document_complete == "no" || value.document_complete == "yes"){
                        $("#lbl_claim_property_view_morgagee").attr('style',  'color:#373737');
                        $("#claim_property_view_morgagee_yes").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_property_view_morgagee_no").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.document_complete == "yes"){
                            document.getElementById("claim_property_view_morgagee_yes").style.background='#008080';
                            document.getElementById("claim_property_view_morgagee_yes").style.color ='#ffffff';
                            document.getElementById("claim_property_view_morgagee_no").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_morgagee_no").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_within_inception]').val("yes");  
                        }else{
                            document.getElementById("claim_property_view_morgagee_no").style.background='#008080';
                            document.getElementById("claim_property_view_morgagee_no").style.color ='#ffffff';
                            document.getElementById("claim_property_view_morgagee_yes").style.background='#C0C0C0';
                            document.getElementById("claim_property_view_morgagee_yes").style.color ='#000000'; 
                            $('input[name=hd_claim_property_view_within_inception]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_property_view_morgagee").attr('style',  'color:#CF3C4B');
                        $("#claim_property_view_morgagee_yes").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_property_view_morgagee_no").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_property_view_within_inception]').val("no");           
                    }

                    $('#relate_accident_property_view').val(value.damage_ralated_accident);
                    $('#morgaged_to_property_view').val(value.mortgagee);
                    $('#gross_estimate_property_view').val(ReplaceNumberWithCommas(value.gross_amount));

                    $('#property_view_first_name_owner').val(value.first_name);
                    $('#property_view_middle_name_owner').val(value.middle_name);
                    $('#property_view_last_name_owner').val(value.last_name);
                    $('#property_view_acc_happen').val(value.accident_happen);
                    $('#property_view_acc_happen').text(value.accident_happen);

                    

                    if(value.claim_recovery == "no" || value.claim_recovery == "yes"){
                        $("#lbl_claim_motor_property_view_recovery").attr('style',  'color:#373737');
                        $("#claim_motor_property_view_recovery_yes").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_motor_property_view_recovery_no").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.claim_recovery == "yes"){
                            document.getElementById("claim_motor_property_view_recovery_yes").style.background='#008080';
                            document.getElementById("claim_motor_property_view_recovery_yes").style.color ='#ffffff';
                            document.getElementById("claim_motor_property_view_recovery_no").style.background='#C0C0C0';
                            document.getElementById("claim_motor_property_view_recovery_no").style.color ='#000000'; 
                            $('input[name=hd_claim_motor_property_view_recovery]').val("yes");  
                        }else{
                            document.getElementById("claim_motor_property_view_recovery_no").style.background='#008080';
                            document.getElementById("claim_motor_property_view_recovery_no").style.color ='#ffffff';
                            document.getElementById("claim_motor_property_view_recovery_yes").style.background='#C0C0C0';
                            document.getElementById("claim_motor_property_view_recovery_yes").style.color ='#000000'; 
                            $('input[name=hd_claim_motor_property_view_recovery]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_motor_property_view_recovery").attr('style',  'color:#CF3C4B');
                        $("#claim_motor_property_view_recovery_yes").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_motor_property_view_recovery_no").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_motor_property_view_recovery]').val("no");           
                    }


                    if(value.cat_loss_building == "Yes"){
                        $( "#cb_property_view_building" ).prop( "checked", true );
                        $(".property_view_claim_building").show();
                    }

                    if(value.cat_loss_stock_building == "Yes"){
                        $( "#cb_property_view_stocl_building" ).prop( "checked", true );
                        $(".property_view_claim_cstocks").show();
                    }
                    var line = "FI";
                    var id = value.id;
                    $.ajax({
                        url: url + '/claims/property/get/files',
                        method:"GET",
                        data:{ _token:_token,id:id},
                        success:function(result)
                        {
                            $.each(result, function(key, valuefiles){
                                    
                                    $( "#file_upload_property_view_label"+valuefiles.idmaintained).attr("href", '{{url("/")}}'+"/claims/property/view/files/"+'{{$fileSec}}'+"/"+ btoa("{{\Auth::user()->id}}")+"/"+valuefiles.id);
                                    $("#file_upload_property_hd_view"+valuefiles.idmaintained).val(valuefiles.id);
                                    if(valuefiles.original_name == "" || valuefiles.original_name == null){
                                        $("#file_upload_property_close_view"+valuefiles.idmaintained).hide();
                                    }else{
                                        $("#file_upload_property_close_view"+valuefiles.idmaintained).show();
                                        $( "#file_upload_property_view_label"+valuefiles.idmaintained ).val(valuefiles.original_name);
                                    $( "#file_upload_property_view_label"+valuefiles.idmaintained ).text(valuefiles.original_name);
                                    }

                                    if(valuefiles.status == "" || valuefiles.status == null || valuefiles.status == "N"){
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).val("No Attachment");
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).text("No Attachment");
                                    }else if(valuefiles.status == "A"){
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).val("Approved");
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).text("Approved");
                                    }else if(valuefiles.status == "D"){
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).val("Denied");
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).text("Denied");
                                    }else if(valuefiles.status == "P"){
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).val("Pending");
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).text("Pending");
                                    }else{
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).val("No Attachment");
                                        $( "#file_upload_property_status"+valuefiles.idmaintained ).text("No Attachment");
                                    }
                            });
                        }
                    }); 
                    $.ajax({
                        url: url + '/claims/get/generic/files',
                        method:"GET",
                        data:{ _token:_token,id:id,line:line},
                        success:function(result)
                        {
                            $('#tbl_property_generic_table').empty();
                            $.each(result, function(key, valuefilesgeneric){
                                $('#tbl_property_generic_table').append('<tr><td><a href="'+valuefilesgeneric.link+'" target="_blank">'+valuefilesgeneric.filename+'</a></td></tr>');
                            });
                        }
                    }); 

                    $.ajax({
                        url: url + '/claims/property/get/remarks',
                        method:"GET",
                        data:{ _token:_token,line:line,id:id},
                        success:function(result)
                        {
                            $.each(result, function(key, valueremarks){

                                var date_z = new Date(valueremarks.created_at),
                                date_month = '' + (date_z.getMonth() + 1),
                                date_day = '' + date_z.getDate(),
                                date_year = date_z.getFullYear();
                                if (date_month.length < 2){ date_month = '0' + date_month};
                                if (date_day.length < 2){date_day = '0' + date_day};
                                var fulldate =  date_month+'/'+date_day +'/'+date_year;

                                var currentHour = date_z.getHours();
                                if(currentHour<10){
                                    hour_cur = '0' + currentHour; 
                                }else{
                                    hour_cur =  currentHour; 
                                }

                                var currentgetMinutes = date_z.getMinutes();
                                if(currentgetMinutes<10){
                                    getMinutes_cur = '0' + currentgetMinutes; 
                                }else{
                                    getMinutes_cur =  currentgetMinutes; 
                                }

                                var currentgetSeconds = date_z.getSeconds();
                                if(currentgetSeconds<10){
                                    getSeconds_cur = '0' + currentgetSeconds; 
                                }else{
                                    getSeconds_cur =  currentgetSeconds; 
                                }

                                fulldate = fulldate  +" "+  hour_cur +":"+ getMinutes_cur +":"+getSeconds_cur;

                                var minNumberfifth = 40000000;
                                var maxNumberfifth = 100000000;
                                var numberpart = Math.floor(Math.random()*(maxNumberfifth-minNumberfifth+1)+minNumberfifth);

                                $('<li id="li_property'+ numberpart +'">').text('').prependTo('.posts_property');
                                $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(valueremarks.remarks).prependTo('#li_property'+ numberpart +'');
                                $('<br>').prependTo('#li_property'+ numberpart +'');
                                $('<label style="float:right;font-weight:normal;">').text(fulldate).prependTo('#li_property'+ numberpart +'');
                                $('<label style="float:left;font-weight:bold;">').text(valueremarks.remarks_name+' ('+valueremarks.remarks_by +')' ).prependTo('#li_property'+ numberpart +'');
                                $('.status-box_property').val('');
                                $('.counter_property').text('250');
                                $('.btn-property-comment-add').addClass('disabled');
                            });
                        }
                    }); 

                }); 
            }
        }); 
    }); 

    $('.input-img_property_view').change(function() {
		var no = $(this).data("id");
		var filenamelabel = "file_upload_property_view_label" + no;
		var filename = "file_upload_property_view_" + no;
		var filenameClose = "file_upload_property_close_view" + no;
		var filenameError = "file_upload_property_view_label_error" + no;
		var file = "";
		$("#" + filenameError).hide();
		$("#" + filenameClose).hide();
            for (let i = 0; i < this.files.length; i++) {
                $("#" + filenameClose).show();
                if(file == ""){
                    file = $('#'+ filename)[0].files[i].name;
                }else{
                    file = file + ", " +$('#'+ filename)[0].files[i].name;
                }
                if (this.files[i].size > 5000000) {
                    $("#" + filenameError).html("File size must not be greater than 5MB.");   
                    $("#"+ filenameError).show();    
                    $("#" + filenameClose).hide();
                    $("#" + filenamelabel).empty();
                    $("#" + filename).val("");
                    return false;
                }else{
                
                }
            } 
        
            $("#" + filenamelabel).show();
            $("#" + filenamelabel).empty();
            $("#" + filenamelabel).html(file);
    });
    $('.empty_fileupload_propertty_view').click(function() {
            var no = $(this).data("id");
            
            if(confirm("Are you sure you want to delete this file?")){
                var id = "file_upload_property_hd_view" + no;
                var idfile = $("#"+id).val();
                var _token = $('input[name="_token"]').val();
                var url = $('input[name="url"]').val();
                $.ajax({
                    url: url + '/claims/property/delete/file',
                    method:"GET",
                    data:{ _token:_token,id:idfile},
                    success:function(result)
                    {
                        $.each(result, function(key, valueremarks){

                            var filename = "file_upload_property_view_" + no;
                            var filenamelabel = "file_upload_property_view_label" + no;
                            var filenameClose = "file_upload_property_close_view" + no;
                            $("#" + filenamelabel).empty();
                            $("#" + filename).val("");
                            $("#" + filenameClose).hide();
                        });
                    }
                }); 


               
            }
            else{
                return false;
            }
    });
</script>
<style>


.counter_property {
  display: inline;
  margin-top: 0;
  margin-bottom: 0;
  margin-right: 10px;
}
.posts_property {
  clear: both;
  list-style: none;
  padding-left: 0;
  width: 100%;
  text-align: left;
}
.posts_property li {
  background-color: #fff;
  border: 1.5px solid #d8d8d8;
  border-radius: 10px;
  padding-top: 10px;
  padding-left: 20px;
  padding-right: 20px;
  padding-bottom: 10px;
  margin-bottom: 10px;
  word-wrap: break-word;
  min-height: 130px;
  box-shadow:1px 1px 4px #888888;
}


</style>

<script>
    var main = function() {
  $('.btn-property-comment-add').click(function() {
    var currentdate = new Date(); 
    var date_cur = "";
    var month_cur = "";
    var getSeconds_cur = "";
    var getMinutes_cur = "";
    var hour_cur = "";
    if(currentdate.getDate()<10){
        date_cur = '0' + currentdate.getDate(); 
    }else{
        date_cur =  currentdate.getDate(); 
    }

    var currentmonth = currentdate.getMonth()+1;
    if(currentmonth<10){
        month_cur = '0' + currentmonth; 
    }else{
        month_cur =  currentmonth; 
    }

    var currentHour = currentdate.getHours();
    if(currentHour<10){
        hour_cur = '0' + currentHour; 
    }else{
        hour_cur =  currentHour; 
    }

    var currentgetMinutes = currentdate.getMinutes();
    if(currentgetMinutes<10){
        getMinutes_cur = '0' + currentgetMinutes; 
    }else{
        getMinutes_cur =  currentgetMinutes; 
    }

    var currentgetSeconds = currentdate.getSeconds();
    if(currentgetSeconds<10){
        getSeconds_cur = '0' + currentgetSeconds; 
    }else{
        getSeconds_cur =  currentgetSeconds; 
    }

    var datetime = month_cur + "/"
    + date_cur  + "/" 
    + currentdate.getFullYear() + " " 
    + hour_cur + ":"  
    + getMinutes_cur + ":" 
    + getSeconds_cur;

    var _token = $('input[name="_token"]').val();
    var url = $('input[name="url"]').val();
    var line_id = $('input[name=hd_claim_motor_property_id]').val();
    var line = "FI";
    var post = $('.status-box_property').val();

    var minNumberfifth = 40000000;
    var maxNumberfifth = 100000000;
    var numberpart = Math.floor(Math.random()*(maxNumberfifth-minNumberfifth+1)+minNumberfifth);

    $('<li id="li_property'+ numberpart +'">').text('').prependTo('.posts_property');
    $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(post).prependTo('#li_property'+ numberpart +'');
    $('<br>').prependTo('#li_property'+ numberpart +'');
    $('<label style="float:right;font-weight:normal;">').text(datetime).prependTo('#li_property'+ numberpart +'');
    $('<label style="float:left;font-weight:bold;">').text('<?php echo \Auth::user()->name ?>'+' ('+'<?php echo \Auth::user()->email ?>' +')' ).prependTo('#li_property'+ numberpart +'');
    $('.status-box_property').val('');
    $('.counter_property').text('250');
    $('.btn-property-comment-add').addClass('disabled');


    $.ajax({
        url: url + '/claims/property/insert/remarks',
        method:"GET",
        data:{ _token:_token,line_id:line_id,line:line,post:post},
        error: function(data){
            var errors = data.responseJSON;
            //alert(errors);
            jQuery.each(data, function(key, value){
            alert(value);
            });
            // Render the errors with js ...
            }, 
        success:function(result)
        {
            $.each(result, function(key, valueremarks){
                
            });
        }
    }); 
    
  });
  $('.status-box_property').keyup(function() {
    var postLength = $(this).val().length;
    var charactersLeft = 250 - postLength;
    $('.counter_property').text(charactersLeft);
    if (charactersLeft < 0) {
      $('.btn-property-comment-add').addClass('disabled');
    } else if (charactersLeft === 250) {
      $('.btn-property-comment-add').addClass('disabled');
    } else {
      $('.btn-property-comment-add').removeClass('disabled');
    }
  });
}
$('.btn-property-comment-add').addClass('disabled');
$(document).ready(main)
</script>
<script>
    
		$("#claim_property_view_same_insured_yes").click(function() { 
			document.getElementById("claim_property_view_same_insured_yes").style.background='#008080';
			document.getElementById("claim_property_view_same_insured_yes").style.color ='#ffffff';
			document.getElementById("claim_property_view_same_insured_no").style.background='#C0C0C0';
			document.getElementById("claim_property_view_same_insured_no").style.color ='#000000';  
			$('input[name=hd_claim_property_same_insured_view_]').val("yes"); 
		});
		$("#claim_property_view_same_insured_no").click(function() { 
			document.getElementById("claim_property_view_same_insured_no").style.background='#008080';
			document.getElementById("claim_property_view_same_insured_no").style.color ='#ffffff';
			document.getElementById("claim_property_view_same_insured_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_view_same_insured_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_same_insured_view_]').val("no");
		});


		$("#claim_property_view_prem_paid_yes").click(function() { 
			document.getElementById("claim_property_view_prem_paid_yes").style.background='#008080';
			document.getElementById("claim_property_view_prem_paid_yes").style.color ='#ffffff';
			document.getElementById("claim_property_view_prem_paid_no").style.background='#C0C0C0';
			document.getElementById("claim_property_view_prem_paid_no").style.color ='#000000';  
			$('input[name=hd_claim_property_view_prem_paid]').val("yes"); 
		});
		$("#claim_property_view_prem_paid_no").click(function() { 
			document.getElementById("claim_property_view_prem_paid_no").style.background='#008080';
			document.getElementById("claim_property_view_prem_paid_no").style.color ='#ffffff';
			document.getElementById("claim_property_view_prem_paid_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_view_prem_paid_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_view_prem_paid]').val("no");
		});

		$("#claim_property_view_within_inception_yes").click(function() { 
			document.getElementById("claim_property_view_within_inception_yes").style.background='#008080';
			document.getElementById("claim_property_view_within_inception_yes").style.color ='#ffffff';
			document.getElementById("claim_property_view_within_inception_no").style.background='#C0C0C0';
			document.getElementById("claim_property_view_within_inception_no").style.color ='#000000';  
			$('input[name=hd_claim_property_view_within_inception]').val("yes"); 
		});
		$("#claim_property_view_within_inception_no").click(function() { 
			document.getElementById("claim_property_view_within_inception_no").style.background='#008080';
			document.getElementById("claim_property_view_within_inception_no").style.color ='#ffffff';
			document.getElementById("claim_property_view_within_inception_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_view_within_inception_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_view_within_inception]').val("no");
		});

		$("#claim_property_view_risk_insured_yes").click(function() { 
			document.getElementById("claim_property_view_risk_insured_yes").style.background='#008080';
			document.getElementById("claim_property_view_risk_insured_yes").style.color ='#ffffff';
			document.getElementById("claim_property_view_risk_insured_no").style.background='#C0C0C0';
			document.getElementById("claim_property_view_risk_insured_no").style.color ='#000000';  
			$('input[name=hd_claim_property_view_risk_insured]').val("yes"); 
		});
		$("#claim_property_view_risk_insured_no").click(function() { 
			document.getElementById("claim_property_view_risk_insured_no").style.background='#008080';
			document.getElementById("claim_property_view_risk_insured_no").style.color ='#ffffff';
			document.getElementById("claim_property_view_risk_insured_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_view_risk_insured_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_view_risk_insured]').val("no");
		});

		$("#claim_property_view_morgagee_yes").click(function() { 
			document.getElementById("claim_property_view_morgagee_yes").style.background='#008080';
			document.getElementById("claim_property_view_morgagee_yes").style.color ='#ffffff';
			document.getElementById("claim_property_view_morgagee_no").style.background='#C0C0C0';
			document.getElementById("claim_property_view_morgagee_no").style.color ='#000000';  
			$('input[name=hd_claim_property_view_morgagee]').val("yes"); 
		});
		$("#claim_property_view_morgagee_no").click(function() { 
			document.getElementById("claim_property_view_morgagee_no").style.background='#008080';
			document.getElementById("claim_property_view_morgagee_no").style.color ='#ffffff';
			document.getElementById("claim_property_view_morgagee_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_view_morgagee_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_view_morgagee]').val("no");
		});

		$("#claim_motor_property_view_recovery_yes").click(function() { 
			document.getElementById("claim_motor_property_view_recovery_yes").style.background='#008080';
			document.getElementById("claim_motor_property_view_recovery_yes").style.color ='#ffffff';
			document.getElementById("claim_motor_property_view_recovery_no").style.background='#C0C0C0';
			document.getElementById("claim_motor_property_view_recovery_no").style.color ='#000000';  
			$('input[name=hd_claim_motor_property_view_recovery]').val("yes"); 
		});
		$("#claim_motor_property_view_recovery_no").click(function() { 
			document.getElementById("claim_motor_property_view_recovery_no").style.background='#008080';
			document.getElementById("claim_motor_property_view_recovery_no").style.color ='#ffffff';
			document.getElementById("claim_motor_property_view_recovery_yes").style.background='#C0C0C0';
			document.getElementById("claim_motor_property_view_recovery_yes").style.color ='#000000'; 
			$('input[name=hd_claim_motor_property_view_recovery]').val("no");
		});



</script>

