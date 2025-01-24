
                       function IsEmail(email) {
                          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                          if(!regex.test(email)) {
                            return false;
                          }else{
                            return true;
                          }
                        }

                        btnPay = $("#Pay");
                        btnPay.click(function(){
                          errornumber = 0;
                          $(".validation_name").remove();
                          $(".validation_name_check_error").remove(); 
                          $(".validation_name_check_success").remove();

                          $(".validation_email").remove();
                          $(".validation_email_check_error").remove(); 
                          $(".validation_email_check_success").remove();

                          $(".validation_contact").remove();
                          $(".validation_contact_check_error").remove(); 
                          $(".validation_contact_check_success").remove();

                          $(".validation_policy").remove();
                          $(".validation_policyno_check_error").remove(); 
                          $(".validation_policyno_check_success").remove();

                          $(".validation_invoice").remove();
                          $(".validation_invoince_check_error").remove(); 
                          $(".validation_invoince_check_success").remove();

                          $(".validation_amount").remove();
                          $(".validation_amount_check_error").remove(); 
                          $(".validation_amount_check_success").remove();

                          if($('#name').val() == ""){
                            $('#name').css('border-color', '#F44336');            
                                    $("#name").after("<div class='validation_name' style='opacity:0.7;color:#F44336;'>Name is required.</div>");    
                            $('#name').after('<i class="fa fa-times-circle validation_name_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                            errornumber = 1;           
                          }else{                        
                            $('#name').after('<i class="fa fa-check-circle validation_name_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                            $('#name').css('border-color', '#4BB543');                   
                          } 

                          if($('#email').val() == ""){
                            $('#email').css('border-color', '#F44336');            
                                    $("#email").after("<div class='validation_email' style='opacity:0.7;color:#F44336;'>Email Address is required.</div>");    
                            $('#email').after('<i class="fa fa-times-circle validation_email_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                            errornumber = 1;           
                          }else{       
                            if(IsEmail($('#email').val())==false){
                              $('#email').css('border-color', '#F44336');            
                                    $("#email").after("<div class='validation_email' style='opacity:0.7;color:#F44336;'>Invalid Email Address.</div>");    
                              $('#email').after('<i class="fa fa-times-circle validation_email_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                                errornumber = 1; 
                            }else{
                              $('#email').after('<i class="fa fa-check-circle validation_email_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                              $('#email').css('border-color', '#4BB543');     
                            }    

                                         
                          } 

                          if($('#contact').val() == ""){
                            $('#contact').css('border-color', '#F44336');            
                                    $("#contact").after("<div class='validation_contact' style='opacity:0.7;color:#F44336;'>Contact Number: is required.</div>");    
                            $('#contact').after('<i class="fa fa-times-circle validation_contact_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                            errornumber = 1;           
                          }else{                        
                            $('#contact').after('<i class="fa fa-check-circle validation_contact_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                            $('#contact').css('border-color', '#4BB543');                   
                          } 



                          var inpspolicy = document.getElementsByName('policy_no[]');
                          var inpsInvoice = document.getElementsByName('invoice_no[]');
                          var policy_no_AI = 0
                          var Invoice_no_AI = 0
                          $('input[name^="policy_no"]').each(function(){
                            var inpInvoice=inpsInvoice[policy_no_AI];
                            if (inpInvoice.value.length == 0){
                                if($('#'+ this.id).val() == ""){
                                  $('#'+ this.id).css('border-color', '#F44336');            
                                  $('#'+ this.id).after("<div class='validation_policy' style='opacity:0.7;color:#F44336;'>Policy Number is required.</div>");    
                                  $('#'+ this.id).after('<i class="fa fa-times-circle validation_policyno_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:8px ;color: #F44336;size:20px;"></i>');     
                                    errornumber = 1;        
                              }else{                        
                                $('#'+ this.id).after('<i class="fa fa-check-circle validation_policyno_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:8px ;color: #4BB543;size:20px;"></i>');
                                $('#'+ this.id).css('border-color', '#4BB543');                   
                              } 
                            }else{
                              $('#'+ this.id).after('<i class="fa fa-check-circle validation_policyno_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:8px ;color: #4BB543;size:20px;"></i>');
                              $('#'+ this.id).css('border-color', '#4BB543');
                            }

                            if(policy_no_AI == 0){
                              policy_no_AI = 1;
                            }else{
                              policy_no_AI = policy_no_AI + 1;
                            }
                            
                          });

                          $('input[name^="invoice_no"]').each(function(){
                            var inpPolicyy=inpspolicy[Invoice_no_AI];
                            if (inpPolicyy.value.length == 0){
                                if($('#'+ this.id).val() == ""){
                                  $('#'+ this.id).css('border-color', '#F44336');            
                                  $('#'+ this.id).after("<div class='validation_invoice validation_contact_invoice_no' style='opacity:0.7;color:#F44336;margin-left:19px'>Invoice Number is required.</div>");    
                                  $('#'+ this.id).after('<i class="fa fa-times-circle validation_invoince_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #F44336;size:20px;"></i>');     
                                    errornumber = 1;        
                              }else{                        
                                $('#'+ this.id).after('<i class="fa fa-check-circle validation_invoince_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #4BB543;size:20px;"></i>');
                                $('#'+ this.id).css('border-color', '#4BB543');                   
                              } 
                            }else{
                              $('#'+ this.id).after('<i class="fa fa-check-circle validation_invoince_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #4BB543;size:20px;"></i>');
                              $('#'+ this.id).css('border-color', '#4BB543');
                            }

                            if(Invoice_no_AI == 0){
                              Invoice_no_AI = 1;
                            }else{
                              Invoice_no_AI = Invoice_no_AI + 1;
                            }
                            
                          });

                          $('input[name^="amount"]').each(function(){
                             if($('#'+ this.id).val() == ""){
                                  $('#'+ this.id).css('border-color', '#F44336');            
                                  $('#'+ this.id).after("<div class='validation_amount validation_amount_invoice_no' style='opacity:0.7;color:#F44336;margin-left:35px;white-space: nowrap;'>Amount is required.</div>");    
                                  $('#'+ this.id).after('<i class="fa fa-times-circle validation_amount_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #F44336;size:20px;"></i>');     
                                    errornumber = 1;        
                              }else{                        
                                $('#'+ this.id).after('<i class="fa fa-check-circle validation_amount_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #4BB543;size:20px;"></i>');
                                $('#'+ this.id).css('border-color', '#4BB543');                   
                              } 
                          });

                        if(errornumber == 1){
                          return false;
                        }
                      });
                        btnPayLater = $("#PaymentLater");

btnPayLater.click(function(){
                          errornumber = 0;
                          $(".validation_name").remove();
                          $(".validation_name_check_error").remove(); 
                          $(".validation_name_check_success").remove();

                          $(".validation_email").remove();
                          $(".validation_email_check_error").remove(); 
                          $(".validation_email_check_success").remove();

                          $(".validation_contact").remove();
                          $(".validation_contact_check_error").remove(); 
                          $(".validation_contact_check_success").remove();

                          $(".validation_policy").remove();
                          $(".validation_policyno_check_error").remove(); 
                          $(".validation_policyno_check_success").remove();

                          $(".validation_invoice").remove();
                          $(".validation_invoince_check_error").remove(); 
                          $(".validation_invoince_check_success").remove();

                          $(".validation_amount").remove();
                          $(".validation_amount_check_error").remove(); 
                          $(".validation_amount_check_success").remove();

                          if($('#name').val() == ""){
                            $('#name').css('border-color', '#F44336');            
                                    $("#name").after("<div class='validation_name' style='opacity:0.7;color:#F44336;'>Name is required.</div>");    
                            $('#name').after('<i class="fa fa-times-circle validation_name_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                            errornumber = 1;           
                          }else{                        
                            $('#name').after('<i class="fa fa-check-circle validation_name_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                            $('#name').css('border-color', '#4BB543');                   
                          } 

                          if($('#email').val() == ""){
                            $('#email').css('border-color', '#F44336');            
                                    $("#email").after("<div class='validation_email' style='opacity:0.7;color:#F44336;'>Email Address is required.</div>");    
                            $('#email').after('<i class="fa fa-times-circle validation_email_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                            errornumber = 1;           
                          }else{       
                            if(IsEmail($('#email').val())==false){
                              $('#email').css('border-color', '#F44336');            
                                    $("#email").after("<div class='validation_email' style='opacity:0.7;color:#F44336;'>Invalid Email Address.</div>");    
                              $('#email').after('<i class="fa fa-times-circle validation_email_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                                errornumber = 1; 
                            }else{
                              $('#email').after('<i class="fa fa-check-circle validation_email_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                              $('#email').css('border-color', '#4BB543');     
                            }    

                                         
                          } 

                          if($('#contact').val() == ""){
                            $('#contact').css('border-color', '#F44336');            
                                    $("#contact").after("<div class='validation_contact' style='opacity:0.7;color:#F44336;'>Contact Number: is required.</div>");    
                            $('#contact').after('<i class="fa fa-times-circle validation_contact_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                            errornumber = 1;           
                          }else{                        
                            $('#contact').after('<i class="fa fa-check-circle validation_contact_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                            $('#contact').css('border-color', '#4BB543');                   
                          } 



                          var inpspolicy = document.getElementsByName('policy_no[]');
                          var inpsInvoice = document.getElementsByName('invoice_no[]');
                          var policy_no_AI = 0
                          var Invoice_no_AI = 0
                          $('input[name^="policy_no"]').each(function(){
                            var inpInvoice=inpsInvoice[policy_no_AI];
                            if (inpInvoice.value.length == 0){
                                if($('#'+ this.id).val() == ""){
                                  $('#'+ this.id).css('border-color', '#F44336');            
                                  $('#'+ this.id).after("<div class='validation_policy' style='opacity:0.7;color:#F44336;'>Policy Number is required.</div>");    
                                  $('#'+ this.id).after('<i class="fa fa-times-circle validation_policyno_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:8px ;color: #F44336;size:20px;"></i>');     
                                    errornumber = 1;        
                              }else{                        
                                $('#'+ this.id).after('<i class="fa fa-check-circle validation_policyno_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:8px ;color: #4BB543;size:20px;"></i>');
                                $('#'+ this.id).css('border-color', '#4BB543');                   
                              } 
                            }else{
                              $('#'+ this.id).after('<i class="fa fa-check-circle validation_policyno_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:8px ;color: #4BB543;size:20px;"></i>');
                              $('#'+ this.id).css('border-color', '#4BB543');
                            }

                            if(policy_no_AI == 0){
                              policy_no_AI = 1;
                            }else{
                              policy_no_AI = policy_no_AI + 1;
                            }
                            
                          });

                          $('input[name^="invoice_no"]').each(function(){
                            var inpPolicyy=inpspolicy[Invoice_no_AI];
                            if (inpPolicyy.value.length == 0){
                                if($('#'+ this.id).val() == ""){
                                  $('#'+ this.id).css('border-color', '#F44336');            
                                  $('#'+ this.id).after("<div class='validation_invoice validation_contact_invoice_no' style='opacity:0.7;color:#F44336;margin-left:19px'>Invoice Number is required.</div>");    
                                  $('#'+ this.id).after('<i class="fa fa-times-circle validation_invoince_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #F44336;size:20px;"></i>');     
                                    errornumber = 1;        
                              }else{                        
                                $('#'+ this.id).after('<i class="fa fa-check-circle validation_invoince_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #4BB543;size:20px;"></i>');
                                $('#'+ this.id).css('border-color', '#4BB543');                   
                              } 
                            }else{
                              $('#'+ this.id).after('<i class="fa fa-check-circle validation_invoince_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #4BB543;size:20px;"></i>');
                              $('#'+ this.id).css('border-color', '#4BB543');
                            }

                            if(Invoice_no_AI == 0){
                              Invoice_no_AI = 1;
                            }else{
                              Invoice_no_AI = Invoice_no_AI + 1;
                            }
                            
                          });

                          $('input[name^="amount"]').each(function(){
                             if($('#'+ this.id).val() == ""){
                                  $('#'+ this.id).css('border-color', '#F44336');            
                                  $('#'+ this.id).after("<div class='validation_amount validation_amount_invoice_no' style='opacity:0.7;color:#F44336;margin-left:35px;white-space: nowrap;'>Amount is required.</div>");    
                                  $('#'+ this.id).after('<i class="fa fa-times-circle validation_amount_check_error fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #F44336;size:20px;"></i>');     
                                    errornumber = 1;        
                              }else{                        
                                $('#'+ this.id).after('<i class="fa fa-check-circle validation_amount_check_success fa-2x" aria-hidden="true" style=" float: right;top:-37px; position: relative;left:29px ;color: #4BB543;size:20px;"></i>');
                                $('#'+ this.id).css('border-color', '#4BB543');                   
                              } 
                          });

                        if(errornumber == 1){
                          return false;
                        }
                      });



 jQuery(document).ready(function(){
                                        // Jquery Dependency
                                   jQuery("#amount").on({
                                        keyup: function() {
                                          formatCurrency(jQuery(this));
                                        // },
                                        // blur: function() { 
                                        //   formatCurrency(jQuery(this), "blur");
                                         }
                                    });


                                    function formatNumber(n) {
                                      // format number 1000000 to 1,234,567
                                      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                    }


                                    function formatCurrency(input, blur) {
                                      // appends $ to value, validates decimal side
                                      // and puts cursor back in right position.
                                      
                                      // get input value
                                      var input_val = input.val();
                                      
                                      // don't validate empty input
                                      if (input_val === "") { return; }
                                      
                                      // original length
                                      var original_len = input_val.length;

                                      // initial caret position 
                                      var caret_pos = input.prop("selectionStart");
                                        
                                      // check for decimal
                                      if (input_val.indexOf(".") >= 0) {

                                        // get position of first decimal
                                        // this prevents multiple decimals from
                                        // being entered
                                        var decimal_pos = input_val.indexOf(".");

                                        // split number by decimal point
                                        var left_side = input_val.substring(0, decimal_pos);
                                        var right_side = input_val.substring(decimal_pos);

                                        // add commas to left side of number
                                        left_side = formatNumber(left_side);

                                        // validate right side
                                        right_side = formatNumber(right_side);
                                        
                                        // On blur make sure 2 numbers after decimal
                                        if (blur === "blur") {
                                          right_side += "00";
                                        }
                                        
                                        // Limit decimal to only 2 digits
                                        right_side = right_side.substring(0, 2);

                                        // join number by .
                                        input_val = left_side + "." + right_side;

                                    } else {
                                        // no decimal entered
                                        // add commas to number
                                        // remove all non-digits
                                        input_val = formatNumber(input_val);
                                       // input_val = "$" + input_val;
                                        
                                        // final formatting
                                        if (blur === "blur") {
                                          input_val += ".00";
                                        }
                                      }
                                      
                                      // send updated string to input
                                      input.val(input_val);

                                      // put caret back in the right position
                                      var updated_len = input_val.length;
                                      caret_pos = updated_len - original_len + caret_pos;
                                      input[0].setSelectionRange(caret_pos, caret_pos);
                                    }
                                     jQuery(".otherdivAccessory").show();
                                    var accessory1 = jQuery( ".selectaccessory" ).val();
                                        if(accessory1 === "Others"){
                                                jQuery(".otherdivAccessory").show();
                                            }else{
                                                //jQuery(".otherdivAccessory").hide();
                                        }                                        
                                    jQuery('.selectaccessory').change(function(){                                        
                                        if(jQuery(this).val() != '')                                        {                
                                             var accessory = jQuery(this).val();
                                             if(accessory === "Others"){
                                                jQuery(".otherdivAccessory").show();
                                             }else{
                                                //jQuery(".otherdivAccessory").hide();
                                             }        
                                       
                                        }
                                       }); 
                               
                                });


