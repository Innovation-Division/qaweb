    btnclm_pa_upload = $("#clm_pa_upload_not_new");
    btnclm_pa_upload.click(function(){
        errornumber = 0;

        $(".validation_gross_estimate_pa").remove();
        $(".validation_gross_estimate_pa_check_error").remove(); 
        $(".validation_gross_estimate_pa_check_success").remove();

        if($('#gross_estimate_pa').val() == ""){
            $("#gross_estimate_pa").after("<div class='validation_gross_estimate_pa v-error-msg'>Gross estimate is empty</div>");    
            $('#gross_estimate_pa').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#gross_estimate_pa').fieldSuccessState();
        } 

        $(".validation_pa_acc_happen").remove();
        $(".validation_pa_acc_happen_check_error").remove(); 
        $(".validation_pa_acc_happen_check_success").remove();

        $(".validation_pa_first_name_owner_out").remove();
        $(".validation_pa_first_name_owner_out_check_error").remove(); 
        $(".validation_pa_first_name_owner_out_check_success").remove();


        if($('#pa_first_name_owner_out').val() == ""){
            $("#pa_first_name_owner_out").after("<div class='validation_pa_first_name_owner_out v-error-msg'>Firts name is empty</div>");    
            $('#pa_first_name_owner_out').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_first_name_owner_out').fieldSuccessState();
        } 


        $(".validation_pa_middle_name_owner_out").remove();
        $(".validation_pa_middle_name_owner_out_check_error").remove(); 
        $(".validation_pa_middle_name_owner_out_check_success").remove();

        if($('#pa_middle_name_owner_out').val() == ""){
            $("#pa_middle_name_owner_out").after("<div class='validation_pa_middle_name_owner_out v-error-msg'>Middle name is empty</div>");    
            $('#pa_middle_name_owner_out').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_middle_name_owner_out').fieldSuccessState();
        } 

        $(".validation_pa_last_name_owner_out").remove();
        $(".validation_pa_last_name_owner_out_check_error").remove(); 
        $(".validation_pa_last_name_owner_out_check_success").remove();

        if($('#pa_last_name_owner_out').val() == ""){
            $("#pa_last_name_owner_out").after("<div class='validation_pa_last_name_owner_out v-error-msg'>Last name is empty</div>");    
            $('#pa_last_name_owner_out').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_last_name_owner_out').fieldSuccessState();
        } 

        if($('#pa_acc_happen').val() == ""){
            $("#pa_acc_happen").after("<div class='validation_pa_acc_happen v-error-msg'>How did the accident happen is empty</div>");    
            $('#pa_acc_happen').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_acc_happen').fieldSuccessState();
        } 

        if($("#cb_med_expense_reim").prop("checked") == false &&
            $("#cb_dis_de").prop("checked") == false &&
            $("#cb_educ_asst_claim").prop("checked") == false &&
            $("#cb_fire_asst_bene_claim").prop("checked") == false){
            $("#lbl_par_total_loss_pa").attr('style',  'color:#CF3C4B');
            $("#lbl_med_expense_reim").attr('style',  'color:#CF3C4B');
            $("#lbl_dis_de").attr('style',  'color:#CF3C4B');
            $("#lbl_educ_asst_claim").attr('style',  'color:#CF3C4B');
            $("#lbl_fire_asst_bene_claim").attr('style',  'color:#CF3C4B');
            errornumber = 1; 
        }else{
            $("#lbl_par_total_loss_pa").attr('style',  'color:#373737');
            $("#lbl_par_total_loss").attr('style',  'color:#373737');
            $("#lbl_med_expense_reim").attr('style',  'color:#373737');
            $("#lbl_dis_de").attr('style',  'color:#373737');
            $("#lbl_educ_asst_claim").attr('style',  'color:#373737');
            $("#lbl_fire_asst_bene_claim").attr('style',  'color:#373737');
        }
        if($("#cb_med_expense_reim").prop("checked") == true){
            $('input[name^="file_upload_pa_reimbursment"]').each(function(){
                var pareimburse = "file_upload_pa_med_reim_lbl" + $(this).data("id");
                if($('#'+ this.id).val() == ""){
                    errornumber = 1;    
                    $("#"+ pareimburse).attr('style',  'color:#CF3C4B');
                }else{
                    $("#"+ pareimburse).attr('style',  'color:#373737');
                }
            });
        }

       

        // if($("#cb_dis_de").prop("checked") == true){
        //     $('input[name^="file_upload_pa_dis_death_claim"]').each(function(){
        //         var paDisDeaClaim = "file_upload_pa_dis_dea_claim_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ paDisDeaClaim).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ paDisDeaClaim).attr('style',  'color:#373737');
        //         }
        //     });
        // }

        // if($("#cb_educ_asst_claim").prop("checked") == true){
        //     $('input[name^="file_upload_pa_edu_asstnce"]').each(function(){
        //         var propertyStocknew = "file_upload_pa_edu_asstanc_claim_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ propertyStocknew).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ propertyStocknew).attr('style',  'color:#373737');
        //         }
        //     });
        // }
        

        // if($("#cb_fire_asst_bene_claim").prop("checked") == true){
        //     $('input[name^="file_upload_pa_fire_asstance_bene"]').each(function(){
        //         var paFireBene_laim = "file_upload_pa_fire_asst_bene_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ paFireBene_laim).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ paFireBene_laim).attr('style',  'color:#373737');
        //         }
        //     });
        // }
        if(errornumber == 1){				
            return false;
        }
    });

    $("#claim_pa_same_insured_yes").click(function() { 
        document.getElementById("claim_pa_same_insured_yes").style.background='#008080';
        document.getElementById("claim_pa_same_insured_yes").style.color ='#ffffff';
        document.getElementById("claim_pa_same_insured_no").style.background='#C0C0C0';
        document.getElementById("claim_pa_same_insured_no").style.color ='#000000';  
        $('input[name=hd_claim_pa_same_insured]').val("yes"); 
    });
    $("#claim_pa_same_insured_no").click(function() { 
        document.getElementById("claim_pa_same_insured_no").style.background='#008080';
        document.getElementById("claim_pa_same_insured_no").style.color ='#ffffff';
        document.getElementById("claim_pa_same_insured_yes").style.background='#C0C0C0';
        document.getElementById("claim_pa_same_insured_yes").style.color ='#000000'; 
        $('input[name=hd_claim_pa_same_insured]').val("no");
    });
    $("#claim_pa_within_inception_yes").click(function() { 
        document.getElementById("claim_pa_within_inception_yes").style.background='#008080';
        document.getElementById("claim_pa_within_inception_yes").style.color ='#ffffff';
        document.getElementById("claim_pa_within_inception_no").style.background='#C0C0C0';
        document.getElementById("claim_pa_within_inception_no").style.color ='#000000';  
        $('input[name=hd_claim_pa_within_inception]').val("yes"); 
    });
    $("#claim_pa_within_inception_no").click(function() { 
        document.getElementById("claim_pa_within_inception_no").style.background='#008080';
        document.getElementById("claim_pa_within_inception_no").style.color ='#ffffff';
        document.getElementById("claim_pa_within_inception_yes").style.background='#C0C0C0';
        document.getElementById("claim_pa_within_inception_yes").style.color ='#000000'; 
        $('input[name=hd_claim_pa_within_inception]').val("no");
    });
    $("#claim_pa_prem_paid_yes").click(function() { 
        document.getElementById("claim_pa_prem_paid_yes").style.background='#008080';
        document.getElementById("claim_pa_prem_paid_yes").style.color ='#ffffff';
        document.getElementById("claim_pa_prem_paid_no").style.background='#C0C0C0';
        document.getElementById("claim_pa_prem_paid_no").style.color ='#000000';  
        $('input[name=hd_claim_pa_prem_paid]').val("yes"); 
    });
    $("#claim_pa_prem_paid_no").click(function() { 
        document.getElementById("claim_pa_prem_paid_no").style.background='#008080';
        document.getElementById("claim_pa_prem_paid_no").style.color ='#ffffff';
        document.getElementById("claim_pa_prem_paid_yes").style.background='#C0C0C0';
        document.getElementById("claim_pa_prem_paid_yes").style.color ='#000000'; 
        $('input[name=hd_claim_pa_prem_paid]').val("no");
    });
    $("#claim_pa_required_doc_yes").click(function() { 
        document.getElementById("claim_pa_required_doc_yes").style.background='#008080';
        document.getElementById("claim_pa_required_doc_yes").style.color ='#ffffff';
        document.getElementById("claim_pa_required_doc_no").style.background='#C0C0C0';
        document.getElementById("claim_pa_required_doc_no").style.color ='#000000';  
        $('input[name=hd_claim_pa_required_doc]').val("yes"); 
    });
    $("#claim_pa_required_doc_no").click(function() { 
        document.getElementById("claim_pa_required_doc_no").style.background='#008080';
        document.getElementById("claim_pa_required_doc_no").style.color ='#ffffff';
        document.getElementById("claim_pa_required_doc_yes").style.background='#C0C0C0';
        document.getElementById("claim_pa_required_doc_yes").style.color ='#000000'; 
        $('input[name=hd_claim_pa_required_doc]').val("no");
    });
    $("#claim_pa_not_submitted_yes").click(function() { 
        document.getElementById("claim_pa_not_submitted_yes").style.background='#008080';
        document.getElementById("claim_pa_not_submitted_yes").style.color ='#ffffff';
        document.getElementById("claim_pa_not_submitted_no").style.background='#C0C0C0';
        document.getElementById("claim_pa_not_submitted_no").style.color ='#000000';  
        $('input[name=hd_claim_pa_not_submitted]').val("yes"); 
    });
    $("#claim_pa_not_submitted_no").click(function() { 
        document.getElementById("claim_pa_not_submitted_no").style.background='#008080';
        document.getElementById("claim_pa_not_submitted_no").style.color ='#ffffff';
        document.getElementById("claim_pa_not_submitted_yes").style.background='#C0C0C0';
        document.getElementById("claim_pa_not_submitted_yes").style.color ='#000000'; 
        $('input[name=hd_claim_pa_not_submitted]').val("no");
    });
    $("#claim_pa_checklist_accomplished_yes").click(function() { 
        document.getElementById("claim_pa_checklist_accomplished_yes").style.background='#008080';
        document.getElementById("claim_pa_checklist_accomplished_yes").style.color ='#ffffff';
        document.getElementById("claim_pa_checklist_accomplished_no").style.background='#C0C0C0';
        document.getElementById("claim_pa_checklist_accomplished_no").style.color ='#000000';  
        $('input[name=hd_claim_pa_checklist_accomplished]').val("yes"); 
    });
    $("#claim_pa_checklist_accomplished_no").click(function() { 
        document.getElementById("claim_pa_checklist_accomplished_no").style.background='#008080';
        document.getElementById("claim_pa_checklist_accomplished_no").style.color ='#ffffff';
        document.getElementById("claim_pa_checklist_accomplished_yes").style.background='#C0C0C0';
        document.getElementById("claim_pa_checklist_accomplished_yes").style.color ='#000000'; 
        $('input[name=hd_claim_pa_checklist_accomplished]').val("no");
    });
    $("#claim_motor_pa_recovery_yes").click(function() { 
        document.getElementById("claim_motor_pa_recovery_yes").style.background='#008080';
        document.getElementById("claim_motor_pa_recovery_yes").style.color ='#ffffff';
        document.getElementById("claim_motor_pa_recovery_no").style.background='#C0C0C0';
        document.getElementById("claim_motor_pa_recovery_no").style.color ='#000000';  
        $('input[name=hd_claim_motor_pa_recovery]').val("yes"); 
    });
    $("#claim_motor_pa_recovery_no").click(function() { 
        document.getElementById("claim_motor_pa_recovery_no").style.background='#008080';
        document.getElementById("claim_motor_pa_recovery_no").style.color ='#ffffff';
        document.getElementById("claim_motor_pa_recovery_yes").style.background='#C0C0C0';
        document.getElementById("claim_motor_pa_recovery_yes").style.color ='#000000'; 
        $('input[name=hd_claim_motor_pa_recovery]').val("no");
    });

    
    $("#cb_med_expense_reim").change(function(){
    if(this.checked){
        $(".pa_claim_reimbursenment").show();
    }else{
        $(".pa_claim_reimbursenment").hide();
    }
    });

    $("#cb_dis_de").change(function(){
    if(this.checked){
        $(".pa_claim_dis_dea_claim").show();
    }else{
        $(".pa_claim_dis_dea_claim").hide();
    }
    });

    $("#cb_fire_asst_bene_claim").change(function(){
    if(this.checked){
        $(".pa_claim_fire_asstance_bene").show();
    }else{
        $(".pa_claim_fire_asstance_bene").hide();
    }
    });

    $("#cb_educ_asst_claim").change(function(){
    if(this.checked){
        $(".pa_claim_edu_asstnce").show();
    }else{
        $(".pa_claim_edu_asstnce").hide();
    }
    });

    jQuery('#Loss_date_pa_not').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        maxDate:'0d',
        yearRange: '1910:9999'
    }).on('focus', function(){
        if(!jQuery('select').parent().hasClass('fake-select')){
            jQuery('select').wrap('<span class="fake-select"></span>');
        }
    }); 
