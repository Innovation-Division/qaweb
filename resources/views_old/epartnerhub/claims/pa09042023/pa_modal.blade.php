<div class="modal fade bs-example-modal-lg modal-light" id="claimsPAModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
        <div class="modal-content">
        <form method="post" action="{{ route('editpaClaimnewsave') }}"  enctype="multipart/form-data" style="background-color:#ffffff">
        {{ csrf_field() }}		
                <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="claimsPAModalView" style="color: white; font-size: 27px !important; font-weight: 700;">Personal Accident Claims Information</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hd_claim_motor_pa_line" name="hd_claim_motor_pa_line" value="FI">
                    <input type="hidden" id="hd_claim_motor_pa_id" name="hd_claim_motor_pa_id" value="">
                    <input type="hidden" id="hd_claim_pa_same_insured_view" name="hd_claim_pa_same_insured_view" value="no">
                    <input type="hidden" id="hd_claim_pa_within_inception_view" name="hd_claim_pa_within_inception_view" value="no">
                    <input type="hidden" id="hd_claim_pa_prem_paid_view" name="hd_claim_pa_prem_paid_view" value="no">
                    <input type="hidden" id="hd_claim_pa_required_doc_view" name="hd_claim_pa_required_doc_view" value="no">
                    <input type="hidden" id="hd_claim_pa_not_submitted_view" name="hd_claim_pa_not_submitted_view" value="no">
                    <input type="hidden" id="hd_claim_pa_checklist_accomplished_view" name="hd_claim_pa_checklist_accomplished_view" value="no">
                    <input type="hidden" id="hd_claim_motor_pa_recovery" name="hd_claim_motor_pa_recovery" value="no">
                        @include('epartnerhub.claims.pa.view.view_claim_pa_page_1')
                        @include('epartnerhub.claims.pa.view.view_claim_pa_page_2')
                        @include('epartnerhub.claims.pa.view.view_claim_pa_page_3')
                    <div class="container">
                        <div class="form-group">
                            <textarea id="status-box_pa_view" name="status-box_pa_view" class="form-control status-box_pa" rows="3" placeholder="Enter your comment here..."></textarea>
                        </div>
                        <div class="button-group pull-right">
                            <p class="counter_pa">250</p>
                            <a href="#" class="btn btn-pa-comment-add btn-primary">Post</a>
                        </div>
                        <div class="col-md-12"> <br>
                            <ul class="posts_pa" style="max-width 800px;">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                <button id="clm_pa_upload_view" name="clm_pa_upload_view" type="submit"  class="btn btn-secondary">Submit</button>
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    
    $('.paClaim').click(function() {
        var _token = $('input[name="_token"]').val();
        var url = $('input[name="url"]').val();
        var id =$(this).data("id");

        $.ajax({
            url: url + '/claims/pa/get/details',
            method:"GET",
            data:{ _token:_token,id:id},
            success:function(result)
            {
                $('.posts_pa').empty();
                $('.posts_pa li').remove();
                $(".pa_claim_reimbursenment_view").hide();
                $(".pa_claim_dis_dea_claim_view").hide();
                $(".pa_claim_edu_asstnce_view").hide();
                $(".pa_claim_fire_asstance_bene_view").hide();
                $.each(result, function(key, value){
                    var d = new Date(value.date_of_loss),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                    if (month.length < 2){ month = '0' + month};
                    if (day.length < 2){day = '0' + day};
                    var fulldate =  month+'/'+day +'/'+year;
                    if(value.status === "COMPLETED"){
                        $(".permanent_province_pa_view").prop('style',  'background-color:#e9ecef');
                        $(".permanent_municipality_pa_view").prop('style',  'background-color:#e9ecef');
                        $(".permanent_barangay_pa_view").prop('style',  'background-color:#e9ecef');
                        $('#Loss_date_pa_view').removeClass('readonly');
                        $('#Loss_time_pa_view').removeClass('readonly');

                        $("#policyNo_pa_view").prop('disabled', true);
                        $("#Loss_date_pa_view").prop('disabled', true);
                        $("#Loss_time_pa_view").prop('disabled', true);
                        $("#pa_acc_happen_view").prop('disabled', true);
                        $("#contact_no_pa_view").prop('disabled', true);
                        $("#email_address_pa_view").prop('disabled', true);
                        $("#location_loss_pa_view").prop('disabled', true);
                        $("#claim_pa_same_insured_yes_view").prop('disabled', true);
                        $("#claim_pa_same_insured_no_view").prop('disabled', true);
                        $("#claim_pa_within_inception_yes_view").prop('disabled', true);
                        $("#claim_pa_within_inception_no_view").prop('disabled', true);
                        $("#claim_pa_prem_paid_yes_view").prop('disabled', true);
                        $("#claim_pa_prem_paid_no_view").prop('disabled', true);
                        $("#claim_pa_required_doc_yes_view").prop('disabled', true);
                        $("#claim_pa_required_doc_no_view").prop('disabled', true);
                        $("#claim_pa_not_submitted_yes_view").prop('disabled', true);
                        $("#claim_pa_not_submitted_no_view").prop('disabled', true);
                        $("#claim_pa_checklist_accomplished_yes_view").prop('disabled', true);
                        $("#claim_pa_checklist_accomplished_no_view").prop('disabled', true);
                        $("#claim_motor_pa_recovery_yes_view").prop('disabled', true);
                        $("#claim_motor_pa_recovery_no_view").prop('disabled', true);
                        $("#gross_estimate_pa_view").prop('disabled', true);
                        $("#cb_med_expense_reim_view").prop('disabled', true);
                        $("#cb_dis_de_view").prop('disabled', true);
                        $("#cb_educ_asst_claim_view").prop('disabled', true);
                        $("#cb_fire_asst_bene_claim_view").prop('disabled', true);
                        $("#status-box_pa_view").prop('disabled', true);
                        $("#pa_last_name_owner_view").prop('disabled', true);
                        $("#pa_last_name_owner_view").prop('disabled', true);
                        $("#pa_middle_name_owner_view").prop('disabled', true);
                        
                    }else{
                        $(".permanent_province_pa_view").prop('style',  'background-color:#fff');
                        $(".permanent_municipality_pa_view").prop('style',  'background-color:#fff');
                        $(".permanent_barangay_pa_view").prop('style',  'background-color:#fff');
                        $('#Loss_date_pa_view').addClass('readonly');
                        $('#Loss_time_pa_view').addClass('readonly');

                        $("#policyNo_pa_view").prop('disabled', false);
                        $("#Loss_date_pa_view").prop('disabled', false);
                        $("#Loss_time_pa_view").prop('disabled', false);
                        $("#pa_acc_happen_view").prop('disabled', false);
                        $("#contact_no_pa_view").prop('disabled', false);
                        $("#email_address_pa_view").prop('disabled', false);
                        $("#location_loss_pa_view").prop('disabled', false);
                        $("#claim_pa_same_insured_yes_view").prop('disabled', false);
                        $("#claim_pa_same_insured_no_view").prop('disabled', false);
                        $("#claim_pa_within_inception_yes_view").prop('disabled', false);
                        $("#claim_pa_within_inception_no_view").prop('disabled', false);
                        $("#claim_pa_prem_paid_yes_view").prop('disabled', false);
                        $("#claim_pa_prem_paid_no_view").prop('disabled', false);
                        $("#claim_pa_required_doc_yes_view").prop('disabled', false);
                        $("#claim_pa_required_doc_no_view").prop('disabled', false);
                        $("#claim_pa_not_submitted_yes_view").prop('disabled', false);
                        $("#claim_pa_not_submitted_no_view").prop('disabled', false);
                        $("#claim_pa_checklist_accomplished_yes_view").prop('disabled', false);
                        $("#claim_pa_checklist_accomplished_no_view").prop('disabled', false);
                        $("#claim_motor_pa_recovery_yes_view").prop('disabled', false);
                        $("#claim_motor_pa_recovery_no_view").prop('disabled', false);
                        $("#gross_estimate_pa_view").prop('disabled', false);
                        $("#cb_med_expense_reim_view").prop('disabled', false);
                        $("#cb_dis_de_view").prop('disabled', false);
                        $("#cb_educ_asst_claim_view").prop('disabled', false);
                        $("#cb_fire_asst_bene_claim_view").prop('disabled', false);
                        $("#status-box_pa_view").prop('disabled', false);
                        $("#pa_last_name_owner_view").prop('disabled', false);
                        $("#pa_last_name_owner_view").prop('disabled', false);
                        $("#pa_middle_name_owner_view").prop('disabled', false);
                    }

                    $('#status_pa_view').val(value.status);
                    $('#created_by_pa_view').val(value.created_by);

                    $('#pa_first_name_owner_view').val(value.fName);
                    $('#pa_last_name_owner_view').val(value.lName);
                    $('#pa_middle_name_owner_view').val(value.mName);
                    $('#policyNo_pa_view').val(value.policy);
                    $('#Loss_time_pa_view').val(value.time_loss);
                    $('#Loss_date_pa_view').val(fulldate);
                    $('#location_loss_pa_view').val(value.location_of_loss);
                    $('#pa_acc_happen_view').val(value.accident_happen);
                    $('#pa_acc_happen_view').text(value.accident_happen);
                    $('input[name=hd_claim_motor_pa_id]').val(value.id);
                    jQuery('#permanent_province_pa_view').append('<option selected value="' + value.province + '">' + value.province + '</option>');    
                    jQuery('#permanent_province_pa_view').selectpicker("refresh");

                    jQuery('#permanent_municipality_pa_view').append('<option selected value="' + value.municipality + '">' + value.municipality + '</option>');    
                    jQuery('#permanent_municipality_pa_view').selectpicker("refresh");

                    jQuery('#permanent_barangay_pa_view').append('<option selected value="' + value.barangay + '">' + value.barangay + '</option>');    
                    jQuery('#permanent_barangay_pa_view').selectpicker("refresh");

                    $('#contact_no_pa_view').val(value.contact_no);
                    $('#email_address_pa_view').val(value.email_address);

                    if(value.claimant_same_insured == "no" || value.claimant_same_insured == "yes"){
                        $("#lbl_claim_pa_same_insured_view").attr('style',  'color:#373737');
                        $("#claim_pa_same_insured_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_pa_same_insured_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.claimant_same_insured == "yes"){
                            document.getElementById("claim_pa_same_insured_yes_view").style.background='#008080';
                            document.getElementById("claim_pa_same_insured_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_same_insured_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_same_insured_no_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_same_insured_view]').val("yes");  
                        }else{
                            document.getElementById("claim_pa_same_insured_no_view").style.background='#008080';
                            document.getElementById("claim_pa_same_insured_no_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_same_insured_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_same_insured_yes_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_same_insured_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_pa_same_insured_view").attr('style',  'color:#CF3C4B');
                        $("#claim_pa_same_insured_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_pa_same_insured_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_pa_same_insured_view]').val("no");           
                    }
                    
                    if(value.date_loss_within_terms == "no" || value.date_loss_within_terms == "yes"){
                        $("#lbl_claim_pa_within_inception_view").attr('style',  'color:#373737');
                        $("#claim_pa_within_inception_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_pa_within_inception_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.date_loss_within_terms == "yes"){
                            document.getElementById("claim_pa_within_inception_yes_view").style.background='#008080';
                            document.getElementById("claim_pa_within_inception_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_within_inception_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_within_inception_no_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_within_inception_view]').val("yes");  
                        }else{
                            document.getElementById("claim_pa_within_inception_no_view").style.background='#008080';
                            document.getElementById("claim_pa_within_inception_no_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_within_inception_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_within_inception_yes_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_within_inception_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_pa_within_inception_view").attr('style',  'color:#CF3C4B');
                        $("#claim_pa_within_inception_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_pa_within_inception_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_pa_within_inception_view]').val("no");           
                    }

                    if(value.premium_paid == "no" || value.premium_paid == "yes"){
                        $("#lbl_claim_pa_prem_paid_view").attr('style',  'color:#373737');
                        $("#claim_pa_prem_paid_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_pa_prem_paid_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.premium_paid == "yes"){
                            document.getElementById("claim_pa_prem_paid_yes_view").style.background='#008080';
                            document.getElementById("claim_pa_prem_paid_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_prem_paid_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_prem_paid_no_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_prem_paid_view]').val("yes");  
                        }else{
                            document.getElementById("claim_pa_prem_paid_no_view").style.background='#008080';
                            document.getElementById("claim_pa_prem_paid_no_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_prem_paid_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_prem_paid_yes_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_prem_paid_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_pa_prem_paid_view").attr('style',  'color:#CF3C4B');
                        $("#claim_pa_prem_paid_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_pa_prem_paid_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_pa_prem_paid_view]').val("no");           
                    }

                    if(value.document_complete == "no" || value.document_complete == "yes"){
                        $("#lbl_claim_pa_required_doc_view").attr('style',  'color:#373737');
                        $("#claim_pa_required_doc_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_pa_required_doc_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.document_complete == "yes"){
                            document.getElementById("claim_pa_required_doc_yes_view").style.background='#008080';
                            document.getElementById("claim_pa_required_doc_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_required_doc_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_required_doc_no_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_required_doc_view]').val("yes");  
                        }else{
                            document.getElementById("claim_pa_required_doc_no_view").style.background='#008080';
                            document.getElementById("claim_pa_required_doc_no_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_required_doc_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_required_doc_yes_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_required_doc_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_pa_required_doc_view").attr('style',  'color:#CF3C4B');
                        $("#claim_pa_required_doc_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_pa_required_doc_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_pa_required_doc_view]').val("no");           
                    }

                    if(value.process_send_followup == "no" || value.process_send_followup == "yes"){
                        $("#lbl_claim_pa_not_submitted_view").attr('style',  'color:#373737');
                        $("#claim_pa_not_submitted_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_pa_not_submitted_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.process_send_followup == "yes"){
                            document.getElementById("claim_pa_not_submitted_yes_view").style.background='#008080';
                            document.getElementById("claim_pa_not_submitted_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_not_submitted_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_not_submitted_no_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_not_submitted_view]').val("yes");  
                        }else{
                            document.getElementById("claim_pa_not_submitted_no_view").style.background='#008080';
                            document.getElementById("claim_pa_not_submitted_no_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_not_submitted_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_not_submitted_yes_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_not_submitted_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_pa_not_submitted_view").attr('style',  'color:#CF3C4B');
                        $("#claim_pa_not_submitted_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_pa_not_submitted_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_pa_not_submitted_view]').val("no");           
                    }

                    if(value.checlklist_accomplished == "no" || value.checlklist_accomplished == "yes"){
                        $("#lbl_claim_pa_checklist_accomplished_view").attr('style',  'color:#373737');
                        $("#claim_pa_checklist_accomplished_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_pa_checklist_accomplished_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.checlklist_accomplished == "yes"){
                            document.getElementById("claim_pa_checklist_accomplished_yes_view").style.background='#008080';
                            document.getElementById("claim_pa_checklist_accomplished_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_checklist_accomplished_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_checklist_accomplished_no_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_checklist_accomplished_view]').val("yes");  
                        }else{
                            document.getElementById("claim_pa_checklist_accomplished_no_view").style.background='#008080';
                            document.getElementById("claim_pa_checklist_accomplished_no_view").style.color ='#ffffff';
                            document.getElementById("claim_pa_checklist_accomplished_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_pa_checklist_accomplished_yes_view").style.color ='#000000'; 
                            $('input[name=hd_claim_pa_checklist_accomplished_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_pa_checklist_accomplished_view").attr('style',  'color:#CF3C4B');
                        $("#claim_pa_checklist_accomplished_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_pa_checklist_accomplished_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_pa_checklist_accomplished_view]').val("no");           
                    }

                    $('#gross_estimate_pa_view').val(ReplaceNumberWithCommas(value.gross_amount));

                    if(value.claim_recovery == "no" || value.claim_recovery == "yes"){
                        $("#lbl_claim_motor_pa_recovery_view").attr('style',  'color:#373737');
                        $("#claim_motor_pa_recovery_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_motor_pa_recovery_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.claim_recovery == "yes"){
                            document.getElementById("claim_motor_pa_recovery_yes_view").style.background='#008080';
                            document.getElementById("claim_motor_pa_recovery_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_motor_pa_recovery_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_motor_pa_recovery_no_view").style.color ='#000000'; 
                            $('input[name=hd_claim_motor_pa_recovery_view]').val("yes");  
                        }else{
                            document.getElementById("claim_motor_pa_recovery_no_view").style.background='#008080';
                            document.getElementById("claim_motor_pa_recovery_no_view").style.color ='#ffffff';
                            document.getElementById("claim_motor_pa_recovery_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_motor_pa_recovery_yes_view").style.color ='#000000'; 
                            $('input[name=hd_claim_motor_pa_recovery_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_claim_motor_pa_recovery_view").attr('style',  'color:#CF3C4B');
                        $("#claim_motor_pa_recovery_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_motor_pa_recovery_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_claim_motor_pa_recovery_view]').val("no");           
                    }

                    $( "#cb_med_expense_reim_view" ).prop( "checked", false );
                    $( "#cb_dis_de_view" ).prop( "checked", false );
                    $( "#cb_educ_asst_claim_view" ).prop( "checked", false );
                    $( "#cb_fire_asst_bene_claim_view" ).prop( "checked", false );

                    $(".motor_claim_loss_partial_view").hide();
                    $(".motor_claim_loss_bi_view").hide();
                    $(".motor_claim_loss_BITP_view").hide();
                    $(".motor_claim_loss_vehicleTP_view").hide();

                    if(value.cat_loss_med_reembsment == "Yes"){
                        $( "#cb_med_expense_reim_view" ).prop( "checked", true );
                        $(".pa_claim_reimbursenment_view").show();
                    }

                    if(value.cat_loss_death == "Yes"){
                        $( "#cb_dis_de_view" ).prop( "checked", true );
                        $(".pa_claim_dis_dea_claim_view").show();
                    }

                    if(value.cat_loss_education_asst_claim == "Yes"){
                        $( "#cb_educ_asst_claim_view" ).prop( "checked", true );
                        $(".pa_claim_edu_asstnce_view").show();
                    }

                    if(value.cat_loss_asstnce_bene_claim == "Yes"){
                        $( "#cb_fire_asst_bene_claim_view" ).prop( "checked", true );
                        $(".pa_claim_fire_asstance_bene_view").show();
                    }

                    var line = "PA";
                    var id = value.id;

                    $.ajax({
                        url: url + '/claims/pa/get/files',
                        method:"GET",
                        data:{ _token:_token,id:id},
                        success:function(result)
                        {
                            $.each(result, function(key, valuefiles){
                                   
                                    $( "#file_upload_pa_label_view"+valuefiles.idmaintained).attr("href", '{{url("/")}}'+"/claims/pa/view/files/"+'{{$fileSec}}'+"/"+ btoa("{{\Auth::user()->id}}")+"/"+valuefiles.id);
                                    $("#file_upload_pa_hd_view"+valuefiles.idmaintained).val(valuefiles.id);
                                    if(valuefiles.original_name == "" || valuefiles.original_name == null){
                                        $("#file_upload_pa_close_view"+valuefiles.idmaintained).hide();
                                    }else{
                                        $("#file_upload_pa_close_view"+valuefiles.idmaintained).show();
                                        $( "#file_upload_pa_label_view"+valuefiles.idmaintained ).val(valuefiles.original_name);
                                    $( "#file_upload_pa_label_view"+valuefiles.idmaintained ).text(valuefiles.original_name);
                                    }

                                    if(valuefiles.status == "" || valuefiles.status == null || valuefiles.status == "N"){
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).val("No Attachment");
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).text("No Attachment");
                                    }else if(valuefiles.status == "A"){
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).val("Approved");
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).text("Approved");
                                    }else if(valuefiles.status == "D"){
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).val("Denied");
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).text("Denied");
                                    }else if(valuefiles.status == "P"){
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).val("Pending");
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).text("Pending");
                                    }else{
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).val("No Attachment");
                                        $( "#file_upload_pa_status"+valuefiles.idmaintained ).text("No Attachment");
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
                            $('#tbl_pa_generic_table').empty();
                            $.each(result, function(key, valuefilesgeneric){
                                $('#tbl_pa_generic_table').append('<tr><td><a href="'+valuefilesgeneric.link+'" target="_blank">'+valuefilesgeneric.filename+'</a></td></tr>');
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

                                $('<li id="li_pa'+ numberpart +'">').text('').prependTo('.posts_pa');
                                $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(valueremarks.remarks).prependTo('#li_pa'+ numberpart +'');
                                $('<br>').prependTo('#li_pa'+ numberpart +'');
                                $('<label style="float:right;font-weight:normal;">').text(fulldate).prependTo('#li_pa'+ numberpart +'');
                                $('<label style="float:left;font-weight:bold;">').text(valueremarks.remarks_name+' ('+valueremarks.remarks_by +')' ).prependTo('#li_pa'+ numberpart +'');
                                $('.status-box_pa ').val('');
                                $('.counter_pa ').text('250');
                                $('.btn-pa -comment-add').addClass('disabled');
                            });
                        }
                    }); 

                    
                }); 
            }
        }); 
    }); 

    $('.input-img_pa_view').change(function() {
		var no = $(this).data("id");
		var filenamelabel = "file_upload_pa_label_view" + no;
		var filename = "file_upload_pa_view" + no;
		var filenameClose = "file_upload_pa_close_view" + no;
		var filenameError = "file_upload_pa_label_error_view" + no;
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
    $('.empty_fileupload_pa_view').click(function() {
            var no = $(this).data("id");
            
            if(confirm("Are you sure you want to delete this file?")){
                var id = "file_upload_pa_hd_view" + no;
                var idfile = $("#"+id).val();
                var _token = $('input[name="_token"]').val();
                var url = $('input[name="url"]').val();
                $.ajax({
                    url: url + '/claims/pa/delete/file',
                    method:"GET",
                    data:{ _token:_token,id:idfile},
                    success:function(result)
                    {
                        $.each(result, function(key, valueremarks){
                            var filename = "file_upload_pa_view" + no;
                            var filenamelabel = "file_upload_pa_label_view" + no;
                            var filenameClose = "file_upload_pa_close_view" + no;
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
<script>
    $("#claim_pa_same_insured_yes_view").click(function() { 
			document.getElementById("claim_pa_same_insured_yes_view").style.background='#008080';
			document.getElementById("claim_pa_same_insured_yes_view").style.color ='#ffffff';
			document.getElementById("claim_pa_same_insured_no_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_same_insured_no_view").style.color ='#000000';  
			$('input[name=hd_claim_pa_same_insured_view]').val("yes"); 
		});
		$("#claim_pa_same_insured_no_view").click(function() { 
			document.getElementById("claim_pa_same_insured_no_view").style.background='#008080';
			document.getElementById("claim_pa_same_insured_no_view").style.color ='#ffffff';
			document.getElementById("claim_pa_same_insured_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_same_insured_yes_view").style.color ='#000000'; 
			$('input[name=hd_claim_pa_same_insured_view]').val("no");
		});
		$("#claim_pa_within_inception_yes_view").click(function() { 
			document.getElementById("claim_pa_within_inception_yes_view").style.background='#008080';
			document.getElementById("claim_pa_within_inception_yes_view").style.color ='#ffffff';
			document.getElementById("claim_pa_within_inception_no_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_within_inception_no_view").style.color ='#000000';  
			$('input[name=hd_claim_pa_within_inception_view]').val("yes"); 
		});
		$("#claim_pa_within_inception_no_view").click(function() { 
			document.getElementById("claim_pa_within_inception_no_view").style.background='#008080';
			document.getElementById("claim_pa_within_inception_no_view").style.color ='#ffffff';
			document.getElementById("claim_pa_within_inception_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_within_inception_yes_view").style.color ='#000000'; 
			$('input[name=hd_claim_pa_within_inception_view]').val("no");
		});
		$("#claim_pa_prem_paid_yes_view").click(function() { 
			document.getElementById("claim_pa_prem_paid_yes_view").style.background='#008080';
			document.getElementById("claim_pa_prem_paid_yes_view").style.color ='#ffffff';
			document.getElementById("claim_pa_prem_paid_no_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_prem_paid_no_view").style.color ='#000000';  
			$('input[name=hd_claim_pa_prem_paid_view]').val("yes"); 
		});
		$("#claim_pa_prem_paid_no_view").click(function() { 
			document.getElementById("claim_pa_prem_paid_no_view").style.background='#008080';
			document.getElementById("claim_pa_prem_paid_no_view").style.color ='#ffffff';
			document.getElementById("claim_pa_prem_paid_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_prem_paid_yes_view").style.color ='#000000'; 
			$('input[name=hd_claim_pa_prem_paid_view]').val("no");
		});
		$("#claim_pa_required_doc_yes_view").click(function() { 
			document.getElementById("claim_pa_required_doc_yes_view").style.background='#008080';
			document.getElementById("claim_pa_required_doc_yes_view").style.color ='#ffffff';
			document.getElementById("claim_pa_required_doc_no_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_required_doc_no_view").style.color ='#000000';  
			$('input[name=hd_claim_pa_required_doc_view]').val("yes"); 
		});
		$("#claim_pa_required_doc_no_view").click(function() { 
			document.getElementById("claim_pa_required_doc_no_view").style.background='#008080';
			document.getElementById("claim_pa_required_doc_no_view").style.color ='#ffffff';
			document.getElementById("claim_pa_required_doc_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_required_doc_yes_view").style.color ='#000000'; 
			$('input[name=hd_claim_pa_required_doc_view]').val("no");
		});
		$("#claim_pa_not_submitted_yes_view").click(function() { 
			document.getElementById("claim_pa_not_submitted_yes_view").style.background='#008080';
			document.getElementById("claim_pa_not_submitted_yes_view").style.color ='#ffffff';
			document.getElementById("claim_pa_not_submitted_no_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_not_submitted_no_view").style.color ='#000000';  
			$('input[name=hd_claim_pa_not_submitted_view]').val("yes"); 
		});
		$("#claim_pa_not_submitted_no_view").click(function() { 
			document.getElementById("claim_pa_not_submitted_no_view").style.background='#008080';
			document.getElementById("claim_pa_not_submitted_no_view").style.color ='#ffffff';
			document.getElementById("claim_pa_not_submitted_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_not_submitted_yes_view").style.color ='#000000'; 
			$('input[name=hd_claim_pa_not_submitted_view]').val("no");
		});
		$("#claim_pa_checklist_accomplished_yes_view").click(function() { 
			document.getElementById("claim_pa_checklist_accomplished_yes_view").style.background='#008080';
			document.getElementById("claim_pa_checklist_accomplished_yes_view").style.color ='#ffffff';
			document.getElementById("claim_pa_checklist_accomplished_no_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_checklist_accomplished_no_view").style.color ='#000000';  
			$('input[name=hd_claim_pa_checklist_accomplished_view]').val("yes"); 
		});
		$("#claim_pa_checklist_accomplished_no_view").click(function() { 
			document.getElementById("claim_pa_checklist_accomplished_no_view").style.background='#008080';
			document.getElementById("claim_pa_checklist_accomplished_no_view").style.color ='#ffffff';
			document.getElementById("claim_pa_checklist_accomplished_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_pa_checklist_accomplished_yes_view").style.color ='#000000'; 
			$('input[name=hd_claim_pa_checklist_accomplished_view]').val("no");
		});
		$("#claim_motor_pa_recovery_yes_view").click(function() { 
			document.getElementById("claim_motor_pa_recovery_yes_view").style.background='#008080';
			document.getElementById("claim_motor_pa_recovery_yes_view").style.color ='#ffffff';
			document.getElementById("claim_motor_pa_recovery_no_view").style.background='#C0C0C0';
			document.getElementById("claim_motor_pa_recovery_no_view").style.color ='#000000';  
			$('input[name=hd_claim_motor_pa_recovery_view]').val("yes"); 
		});
		$("#claim_motor_pa_recovery_no_view").click(function() { 
			document.getElementById("claim_motor_pa_recovery_no_view").style.background='#008080';
			document.getElementById("claim_motor_pa_recovery_no_view").style.color ='#ffffff';
			document.getElementById("claim_motor_pa_recovery_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_motor_pa_recovery_yes_view").style.color ='#000000'; 
			$('input[name=hd_claim_motor_pa_recovery_view]').val("no");
		});
</script>
<style>
    .counter_pa {
    display: inline;
    margin-top: 0;
    margin-bottom: 0;
    margin-right: 10px;
    }
    .posts_pa {
    clear: both;
    list-style: none;
    padding-left: 0;
    width: 100%;
    text-align: left;
    }
    .posts_pa li {
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
    $('.btn-pa-comment-add').click(function() {
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
        var line_id = $('input[name=hd_claim_motor_pa_id]').val();
        var line = "PA";

        var post = $('.status-box_pa').val();
        $('<li id="test">').text('').prependTo('.posts_pa');
        
        $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(post).prependTo('#test');
        $('<br>').prependTo('#test');
        $('<label style="float:right;font-weight:normal;">').text(datetime).prependTo('#test');
        $('<label style="float:left;font-weight:bold;">').text('<?php echo \Auth::user()->name ?>'+' ('+'<?php echo \Auth::user()->email ?>' +')' ).prependTo('#test');
        $('.status-box_pa').val('');
        $('.counter_pa').text('250');
        $('.btn-pa-comment-add').addClass('disabled');

        $.ajax({
            url: url + '/claims/pa/insert/remarks',
            method:"GET",
            data:{ _token:_token,line_id:line_id,line:line,post:post},
            
            success:function(result)
            {
                $.each(result, function(key, valueremarks){
                    
                });
            }
        }); 

    });
    $('.status-box_pa').keyup(function() {
        var postLength = $(this).val().length;
        var charactersLeft = 250 - postLength;
        $('.counter_pa').text(charactersLeft);
        if (charactersLeft < 0) {
        $('.btn-pa-comment-add').addClass('disabled');
        } else if (charactersLeft === 250) {
        $('.btn-pa-comment-add').addClass('disabled');
        } else {
        $('.btn-pa-comment-add').removeClass('disabled');
        }
    });
    }
    $('.btn-pa-comment-add').addClass('disabled');
    $(document).ready(main)
</script>