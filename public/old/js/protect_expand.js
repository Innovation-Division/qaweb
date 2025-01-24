
$('#registersuccess').hide();
  $('#file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file-upload')[0].files[0].name;

    if (this.files[0].size > 5000000) {
      $("#upload_Error").html("File size must not be greater than 5MB.");   
      $("#upload_Error").show();    
      $("#upload_label").hide();    
      $("#upload_file").hide();
    }else{
      $("#upload_Error").hide();
      $("#upload_file").show();
      $("#upload_label").hide();
      $("#upload_file_file").empty();
      $("#upload_file_file").html(file);

      
    }
  
  });

  $(document).ready(function(){

  $(".pwed_select").hide(); 
  $(".pwed_select_checkbox").hide();  
  $('#checkbox-1').prop('checked', false);
  $('#checkbox-2').prop('checked', false);
  $('#checkbox-3').prop('checked', false);
  $('#checkbox-4').prop('checked', false);
  $('#checkbox-5').prop('checked', false);
  $('#nextbutton').css('display','block');
  $('#pwd_div_others').css('display','none');
  $('#agentNameDiv').css('display','none');
  $('#pwd_div').css('display','none');
  $('#pop_warning1').css('display','block');
  $('#pop_warning2').css('display','none'); 
  $('#pop_warning1_PWD').css('display','block');
  $('#pop_warning2_PWD').css('display','none');
  $('input[name=pwd_stat]').val("");
  $('input[name=check_agent]').val("");
  $("#occupation_other_personal_info").val("");
  
  var _token = jQuery('input[name="_token"]').val();
  var url = jQuery('input[name="url"]').val();

    jQuery.ajax({
        url:url + '/api/covid/province/get',
        method:"GET",
        data:{ _token:_token}, 
        success:function(result)
        {         
            jQuery.each(result, function(key, value){
              $('#residence_province').append($('<option>', { 
              value: value.province,
              text : value.province 
          }));

          $('#mailing_province').append($('<option>', { 
              value: value.province,
              text : value.province 
          }));

          $('#device_province').append($('<option>', { 
              value: value.province,
              text : value.province 
          }));

          })       
        }
      })

    var current = 1;
    $('.NoPaste').on("cut copy paste",function(e) {
      e.preventDefault();
    });
  
  $(".validation_date_of_Birth_personal_info").on('keypress', function (event) {
      var regex = new RegExp("^[]+$");
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
         event.preventDefault();
         return false;
      }
  });
  // FOURTH PAGE 
  //   jQuery(document).on("click", ".delete-row_part", function () {
  //   var colCount = $("#customFieldsfifth tr").length;
  //   if(colCount >= '10'){
  //     jQuery('.delete-row_part').show();
  //      $(this).closest('tr').remove();
  //         return false;
  //    }else{
  //     jQuery('.delete-row_part').hide();
  //    }    
   
  // });
    // END 

    jQuery(document).on("click", ".delete-row", function () {
    var colCounts = $("#customFields tr").length;
    if(colCounts >= 4){
      jQuery('.delete-row').show();
     }else{
      jQuery('.delete-row').hide();
     }    

      $(this).closest('tr').remove();
      return false;
  });
  // CONTROL CENTER 
     jQuery('#registersuccess').hide(); //checked.
  $('input[name=coverage_complete]').val("");
  jQuery('#warning_coverage_package').css("display", "none");
  jQuery('#warning_coverage_no').css("display", "none");
  widget      = $(".step");
  btnnext     = $(".next");
  btnnextyes     = $(".next_yes");
  btnnextno     = $(".next_no");
  btnnextlipat = $(".next_lipat");
  btnback     = $(".back"); 
  btnback2     = $(".back2"); 
  btnback4    = $(".back4"); 
  btnback5    = $(".back5"); 
  btnback6    = $(".back6"); 

  back6th     = $(".back6th"); 
  btnsubmit   = $(".submit");
  btnNew      = $(".NewApplicant");
  btncheck    = $(".CheckCoverage");
  btnAdd      = $(".addApplicant");
  btnNextPage = $(".next_1stpage");
  btn4thNextPage = $(".next_4thpage");
  view_4thpage = $(".view_4thpage");
  btn5thpage_add = $(".5thpage_add");
  next_2ndpage = $(".next_2ndpage");
  btn5thNextPage = $(".next_5thpage");
  buy_insurance = $(".buy_insurance");
  btn4thpage_add = $(".4thpage_add");
  btncheck_occ = $("#btn_back_to_applicant_occupation");
  btncheck_pwd = $("#btn_back_to_applicant");
  buy_insurance = $("#buy_insurance");
  // Init buttons and UI
  widget.not(':eq(0)').hide();
  hideButtons(current);
  setProgress(current);

  next_2ndpage.click(function(){
        
          $(".validation_status_other_personal_info").remove();
          $(".validation_status_other_personal_info_check_error").remove(); 
          $(".validation_status_other_personal_info_check_success").remove();

          $(".validation_gender_other_personal_info").remove();
          $(".validation_gender_other_personal_info_check_error").remove(); 
          $(".validation_gender_other_personal_info_check_success").remove();

          $(".validation_type_of_id_personal_info").remove();
          $(".validation_type_of_id_personal_info_check_error").remove(); 
          $(".validation_type_of_id_personal_info_check_success").remove();

          $(".validation_place_of_birth_other_personal_info").remove();
          $(".validation_place_of_birth_other_personal_info_check_error").remove(); 
          $(".validation_place_of_birth_other_personal_info_check_success").remove();

          $(".validation_nationality_other_personal_info").remove();
          $(".validation_nationality_other_personal_info_check_error").remove(); 
          $(".validation_nationality_other_personal_info_check_success").remove();

          $(".validation_occupation_other_personal_info").remove();
          $(".validation_occupation_other_personal_info_check_error").remove(); 
          $(".validation_occupation_other_personal_info_check_success").remove();

          $(".validation_tel_no_other_personal_info").remove();
          $(".validation_tel_no_other_personal_info_check_error").remove(); 
          $(".validation_tel_no_other_personal_info_check_success").remove();

          $(".validation_idno_other_personal_info").remove();
          $(".validation_idno_other_personal_info_check_error").remove(); 
          $(".validation_idno_other_personal_info_check_success").remove();

          $(".validation_sourceofIncome_personal_info").remove();
          $(".validation_sourceofIncome_personal_info_check_error").remove(); 
          $(".validation_sourceofIncome_personal_info_check_success").remove();

          errornumber = 0; 

          if($('#sourceofIncome_personal_info').val() == ""){
            $('#sourceofIncome_personal_info').css('border-color', '#F44336');            
                    $("#sourceofIncome_personal_info").after("<div class='validation_sourceofIncome_personal_info' style='opacity:0.7;color:#F44336;'>Source of funds is empty</div>");    
            $('#sourceofIncome_personal_info').after('<i class="fa fa-times-circle validation_sourceofIncome_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#sourceofIncome_personal_info').after('<i class="fa fa-check-circle validation_sourceofIncome_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#sourceofIncome_personal_info').css('border-color', '#4BB543');                   
          } 

          if($('#gender_other_personal_info').val() == ""){
            $('.btn-white-gender_other_personal_info').css('border-color', '#F44336');            
                    $("#gender_other_personal_info").after("<div class='validation_gender_other_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Gender is empty</div>");    
            $('#gender_other_personal_info').after('<i class="fa fa-times-circle validation_gender_other_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#gender_other_personal_info').after('<i class="fa fa-check-circle validation_gender_other_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-gender_other_personal_info').css('border-color', '#4BB543');                   
          }

          if($('#status_other_personal_info').val() == ""){
            $('.btn-white-status_other_personal_info').css('border-color', '#F44336');            
                    $("#status_other_personal_info").after("<div class='validation_status_other_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Civil status is empty</div>");    
            $('#status_other_personal_info').after('<i class="fa fa-times-circle validation_status_other_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#status_other_personal_info').after('<i class="fa fa-check-circle validation_status_other_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-status_other_personal_info').css('border-color', '#4BB543');                   
          }

          if($('#type_of_id_personal_info').val() == ""){
            $('.btn-white-type_of_id_personal_info').css('border-color', '#F44336');            
                    $("#type_of_id_personal_info").after("<div class='validation_type_of_id_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Type of ID is empty</div>");    
            $('#type_of_id_personal_info').after('<i class="fa fa-times-circle validation_type_of_id_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#type_of_id_personal_info').after('<i class="fa fa-check-circle validation_type_of_id_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-type_of_id_personal_info').css('border-color', '#4BB543');                   
          }

          if($('#place_of_birth_other_personal_info').val() == ""){
            $('#place_of_birth_other_personal_info').css('border-color', '#F44336');            
                    $("#place_of_birth_other_personal_info").after("<div class='validation_place_of_birth_other_personal_info' style='opacity:0.7;color:#F44336;'>Place of birth is empty</div>");    
            $('#place_of_birth_other_personal_info').after('<i class="fa fa-times-circle validation_place_of_birth_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#place_of_birth_other_personal_info').after('<i class="fa fa-check-circle validation_place_of_birth_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#place_of_birth_other_personal_info').css('border-color', '#4BB543');                   
          } 

          if($('#nationality_other_personal_info').val() == ""){
            $('#nationality_other_personal_info').css('border-color', '#F44336');           
                    $("#nationality_other_personal_info").after("<div class='validation_nationality_other_personal_info' style='opacity:0.7;color:#F44336;'>Nationality is empty</div>");    
            $('#nationality_other_personal_info').after('<i class="fa fa-times-circle validation_nationality_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#nationality_other_personal_info').after('<i class="fa fa-check-circle validation_nationality_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#nationality_other_personal_info').css('border-color', '#4BB543');                   
          } 

          if($('#occupation_other_personal_info').val() == ""){
            $('#occupation_other_personal_info').css('border-color', '#F44336');            
                    $("#occupation_other_personal_info").after("<div class='validation_occupation_other_personal_info' style='opacity:0.7;color:#F44336;'>Occupation is empty</div>");    
            $('#occupation_other_personal_info').after('<i class="fa fa-times-circle validation_occupation_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#occupation_other_personal_info').after('<i class="fa fa-check-circle validation_occupation_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#occupation_other_personal_info').css('border-color', '#4BB543');                   
          } 

          if($('#tel_no_other_personal_info').val() == ""){
            $('#tel_no_other_personal_info').css('border-color', '#F44336');            
                    $("#tel_no_other_personal_info").after("<div class='validation_tel_no_other_personal_info' style='opacity:0.7;color:#F44336;'>Telephone number is empty</div>");    
            $('#tel_no_other_personal_info').after('<i class="fa fa-times-circle validation_tel_no_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#tel_no_other_personal_info').after('<i class="fa fa-check-circle validation_tel_no_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#tel_no_other_personal_info').css('border-color', '#4BB543');                   
          } 

          if($('#idno_other_personal_info').val() == ""){
            $('#idno_other_personal_info').css('border-color', '#F44336');            
                    $("#idno_other_personal_info").after("<div class='validation_idno_other_personal_info' style='opacity:0.7;color:#F44336;'>ID number is empty</div>");    
            $('#idno_other_personal_info').after('<i class="fa fa-times-circle validation_idno_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#idno_other_personal_info').after('<i class="fa fa-check-circle validation_idno_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#idno_other_personal_info').css('border-color', '#4BB543');                   
          }

          if ($('#file-upload')[0].files.length == 0) {
            $("#upload_Error").html("Please upload your ID.");    
            $("#upload_Error").show();    
            $("#upload_label").hide();
            $("#upload_file").hide();           
              errornumber = 1;
          }

          if ($('#file-upload')[0].files[0].size > 5000000) {
            $("#upload_Error").html("File size must not be greater than 5MB.");   
            $("#upload_Error").show();    
            $("#upload_label").hide();
            $("#upload_file").hide();
            $('#file-upload').val("");
            errornumber = 1;
          }else{
            $("#upload_Error").hide();
            $("#upload_file").show();
            $("#upload_label").hide();
            $("#upload_file_file").empty();     
          }


          if(errornumber == 1){
             
            return false;
          }else{

            var typeofdevicemain = jQuery('#typeofdevicemain').val();
            if(typeofdevicemain == 'EX01'){
              jQuery('.laptopDevice').remove();
              jQuery('.desktopDevice').show();
                  // jQuery('#typeofdeviceDefault').hide();
                  widget.show();      
                  widget.not(':eq('+(current++)+')').hide();
                  setProgress(current); 
                  hideButtons(current);   
                }else{
                  jQuery('.desktopDevice').remove();
                  jQuery('.laptopDevice').show();
              // jQuery('#typeofdeviceDefault').show();
              
              widget.show();      
              widget.not(':eq('+(current++)+')').hide();
              
              setProgress(current); 
              hideButtons(current);   
            }
        }
        
  });

view_4thpage.click(function(){
    current = 4;
      btnback.hide(); 
    
          var typeofdevicemain = jQuery('#typeofdevicemain').val();
            if(typeofdevicemain == 'EX01'){
              jQuery('.laptopDevice').hide();
              jQuery('.desktopDevice').show();
              
            }else{
        
          $(".validation_make_device_info").remove();
          $(".validation_make_device_check_error").remove(); 
          $(".validation_make_device_check_success").remove();

          $(".validation_model_device_info").remove();
          $(".validation_model_device_info_check_error").remove(); 
          $(".validation_model_device_info_check_success").remove();

          $(".validation_serial_device_info").remove();
          $(".validation_serial_device_info_check_error").remove(); 
          $(".validation_serial_device_info_check_success").remove();

          $(".validation_value_device_info").remove();
          $(".validation_value_device_info_check_error").remove(); 
          $(".validation_value_device_info_check_success").remove();


          errornumber = 0; 

          if($('#make_device').val() == ""){
            $('#make_device').css('border-color', '#F44336');            
            $("#make_device").after("<div class='validation_make_device_info' style='opacity:0.7;color:#F44336;'>Make is empty</div>");    
            $('#make_device').after('<i class="fa fa-times-circle validation_make_device_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#make_device').after('<i class="fa fa-check-circle validation_make_device_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#make_device').css('border-color', '#4BB543');                   
          } 

           if($('#model_device').val() == ""){
            $('#model_device').css('border-color', '#F44336');            
            $("#model_device").after("<div class='validation_model_device_info' style='opacity:0.7;color:#F44336;'>Model is empty</div>");    
            $('#model_device').after('<i class="fa fa-times-circle validation_model_device_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#model_device').after('<i class="fa fa-check-circle validation_model_device_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#model_device').css('border-color', '#4BB543');                   
          } 

         
           if($('#serial_device').val() == ""){
            $('#serial_device').css('border-color', '#F44336');            
            $("#serial_device").after("<div class='validation_serial_device_info' style='opacity:0.7;color:#F44336;'>Serial is empty</div>");    
            $('#serial_device').after('<i class="fa fa-times-circle validation_serial_device_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#serial_device').after('<i class="fa fa-check-circle validation_serial_device_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#serial_device').css('border-color', '#4BB543');                   
          } 

          // if($('#value_device').val() == ""){
          //   $('#value_device').css('border-color', '#F44336');            
          //   $("#value_device").after("<div class='validation_value_device_info' style='opacity:0.7;color:#F44336;'>Value is empty</div>");    
          //   $('#value_device').after('<i class="fa fa-times-circle validation_value_device_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
          //   errornumber = 1;           
          // }else{                        
          //   $('#value_device').after('<i class="fa fa-check-circle validation_value_device_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
          //   $('#value_device').css('border-color', '#4BB543');                   
          // } 
        
          if($('#value_device').val() == 0 ){

            $('#value_device').css('border-color', '#F44336');   
                jQuery('#laptopMaxAmount').modal('show');        
            errornumber = 1;            
          }else{
            $('#value_device').css('border-color', '#4BB543');                   
          }    
          var typeofdevicemain = jQuery('#typeofdevicemain').val();
          var laptopAmount = $('#value_device').val();
          switch(typeofdevicemain) {

            case 'LP01':
            if(laptopAmount >= 50000){
              jQuery('#max_amount_modal').modal('show');
              // errornumber = 1
            }
            break;
            case 'PL03':
            if(laptopAmount >= 1000000){
              jQuery('#max_amount_modal').modal('show');
              // errornumber = 1
            }
            break;
            case 'MX04':
            if(laptopAmount >= 150000){
              jQuery('#max_amount_modal').modal('show');
              // errornumber = 1
            }
            break;
            default:
                        // code block
                      }

         

          if(errornumber == 1){
             
            // return false;
          }else{
            
              var fname = $('#firstName_personal_info').val();
              var lname =  $('#lastName_personal_info').val(); 
              var mname = $('#middleName_personal_info').val();
              var contactNo = $('#contactNo_personal_info').val();
              var emailNo = $('#email_personal_info').val();
              var present_address = $('#residence_address').val();
              var make_device = $('#make_device').val();
              var model_device =  $('.model_device').val(); 
              var serial_device = $('.serial_device').val();
              var year_device = $('#year_device').val();
              var value_device = $('.value_device').val();

              var fullname  = fname +' '+ lname ;
              jQuery('.desktopDevice').hide();
              jQuery('.laptopDevice').show();

              $("#firstandlast_final").text(fullname);
              $("#contactno_final").text(contactNo);
              $("#email_final").text(emailNo);
              $('#typeofdevice').text('LAPTOP');
              $('#make_final').text(make_device);
              $('#model_final').text(model_device);
              $('#serial_final').text(serial_device);
              $('#year_final').text(year_device);
              $('#value_final').text(value_device);
              $('#presentaddress_final').text(present_address);
              // jQuery('#typeofdeviceDefault').show();
               current = 5;
              widget.show();      
              widget.not(':eq('+(current++)+')').hide();
              
              setProgress(current); 
              hideButtons(current);   
            }
        }
        
  });
 
  
  back6th.click(function(){
          $("#summaryfinalpage > tbody").empty();
          $("#summaryfinalpage2 > tbody").empty();
           current = 4;       
              
            widget.show();      
            widget.not(':eq('+(current++)+')').hide();

         
            setProgress(current);
            hideButtons(current); 
  });


  buy_insurance.click(function(){
    var errornumber = 0;
    if($('#CBPrivacy').is(':checked')){
    }else{
      errornumber = 1;
    }
    if($('#CBTerms').is(':checked')){
    }else{
      errornumber = 1;
    }
    if($('#CBExclusion').is(':checked')){
    }else{
      errornumber = 1;
    }
    if(errornumber == 1){
      $("#warning_summary").show();
      return false
    }
      
  });
  //
  btn4thNextPage.click(function(){
       
    if(current < widget.length) {
 
        btnback.hide(); 
         $('#warning_minimum_device_zero').hide();            
         $('#warning_max_laptop').hide();           
          var errornumber = 0;
        if($('#promo').val() == ""){
    
          $('input[name^="device_access_hardware"]').each(function(){
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('input[name^="device_access_make"]').each(function(){
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('input[name^="device_access_model"]').each(function(){
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('input[name^="device_access_serial"]').each(function(){
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('select[name^="device_access_year"]').each(function(){
            if($('#'+ this.id).val() == ""){
              $('.'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('.'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('input[name^="device_access_value"]').each(function(){
          
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;    
                 
            }else{   
          
                if($('#'+ this.id).val() == 0 ){
                  $('#'+ this.id).css('border-color', '#F44336');           
                  $('#warning_minimum_device_zero').show();
                  $('#warning_max_laptop').hide();  
                  errornumber = 1;            
                }else{
                  $('#'+ this.id).css('border-color', '#4BB543');                   
                }  

               
              
                                
            } 
          }); 
            $(".validation_promo").remove();
            $(".validation_promo_check_error").remove(); 
            $(".validation_promo_check_success").remove();
            $('.promo_div').show();
            $('#promo').css('border-color', ''); 

          var deviceName = [];
          var totalSI = 0;
          deviceName = $("input[name='device_access_hardware[]']").map(function(){return $(this).val();}).get();
          deviceValue = $("input[name='device_access_value[]']").map(function(){return $(this).val();}).get();


          for (let i = 0; i < deviceName.length; i++) {
            var deviceValue_plain = deviceValue[i].replace(/,/g , '');
            totalSI =  totalSI + parseInt(deviceValue_plain);
            if($('input[name=type_of_device]').val() == "desktop"){
                devicePremium = (parseInt(deviceValue_plain) *0.15)/100;
                
            }else{
              if($('input[name=device_loc_type]:checked').val() == "Yes"){
                  devicePremium = (parseInt(deviceValue_plain) *0.75)/100;              
                }else{
                  devicePremium = (parseInt(deviceValue_plain) *3.5)/100; 
                }
            }
          }

  
      
          if(errornumber == 1){
            return false;
          }else{
            widget.show();      
            widget.not(':eq('+(current++)+')').hide();
            setProgress(current);
            hideButtons(current); 
          }   
        }else{
        console.log('b');
          var errornumber = 0;
            var _token = $('input[name="_token"]').val(); 
                  errornumber = 0;

                      $('input[name^="device_access_hardware"]').each(function(){
                        if($('#'+ this.id).val() == ""){
                          $('#'+ this.id).css('border-color', '#F44336');           
                          errornumber = 1;           
                        }else{                        
                          $('#'+ this.id).css('border-color', '#4BB543');                   
                        } 
                      });
                      $('input[name^="device_access_make"]').each(function(){
                        if($('#'+ this.id).val() == ""){
                          $('#'+ this.id).css('border-color', '#F44336');           
                          errornumber = 1;           
                        }else{                        
                          $('#'+ this.id).css('border-color', '#4BB543');                   
                        } 
                      });
                      $('input[name^="device_access_model"]').each(function(){
                        if($('#'+ this.id).val() == ""){
                          $('#'+ this.id).css('border-color', '#F44336');           
                          errornumber = 1;           
                        }else{                        
                          $('#'+ this.id).css('border-color', '#4BB543');                   
                        } 
                      });
                      $('input[name^="device_access_serial"]').each(function(){
                        if($('#'+ this.id).val() == ""){
                          $('#'+ this.id).css('border-color', '#F44336');           
                          errornumber = 1;           
                        }else{                        
                          $('#'+ this.id).css('border-color', '#4BB543');                   
                        } 
                      });
                      $('select[name^="device_access_year"]').each(function(){
                        if($('#'+ this.id).val() == ""){
                          $('.'+ this.id).css('border-color', '#F44336');           
                          errornumber = 1;           
                        }else{      
                          $('.'+ this.id).css('border-color', '#4BB543');                   
                        } 
                      });

                               
                       var totalDevice = 0;
                      $('input[name^="device_access_value"]').each(function(){
                        if($('#'+ this.id).val() == ""){

                          $('#'+ this.id).css('border-color', '#F44336');           
                          errornumber = 1;           
                        }else{   
                          if($('#'+ this.id).val() == 0 ){

                            $('#'+ this.id).css('border-color', '#F44336');           
                            $('#warning_minimum_device_zero').show();
                            errornumber = 1;            
                          }else{
                            $('#'+ this.id).css('border-color', '#4BB543');                   
                          }    

                          var cleanTotalDevice = $(this).val().replace(/[,]/gi, '');
                          totalDevice += parseInt(cleanTotalDevice);                    
                        } 

                      }); 
 
                      var typeofdevicemain = jQuery('#typeofdevicemain').val();
                       jQuery('#deviceTotalAmount').val(totalDevice);
                        // code block
                            var parts = $('#totalPartsAmount').val();
                            var device =  jQuery('#deviceTotalAmount').val();
                            var checkSelected = $(".device_modified_value").val();
                            if(checkSelected == 'No'){
                                var parts = $('#totalPartsAmount').val(0);
                            }
                              var totalAmount = parseInt(parts) + parseInt(device);
                              if(totalDevice >= 60000){
                                    jQuery('#max_amount_modal').modal('show');
                                     // errornumber = 1;
                                 }
                        

                      
                    $('#deviceTotalAmount').val(totalDevice);
                  if(errornumber == 1){
                 
                    return false;
                  }else{
                     
                var fname = $('#firstName_personal_info').val();
                var lname =  $('#lastName_personal_info').val(); 
                var mname = $('#middleName_personal_info').val();
                var contactNo = $('#contactNo_personal_info').val();
                var emailNo = $('#email_personal_info').val();
                  var present_address = $('#residence_address').val();
                var device_address = $('#device_address').val();

                var fullname  = fname +' '+ lname ;
                $("#firstandlast_final_desktop").text(fullname);
                $("#contactno_final_desktop").text(contactNo);
                $("#email_final_desktop").text(emailNo);
                $('#typeofdevice_desktop').text('DESKTOP');
                $('#presentaddress_final_desktop').text(present_address);
                $('#location_final_desktop').text(device_address);

                var deviceName = [];
                var deviceMake = [];
                var deviceModel = [];
                var deviceSerial = [];
                var deviceYear = [];
                var deviceValue = [];

                deviceName = $("input[name='device_access_hardware[]']").map(function(){return $(this).val();}).get();
                deviceMake = $("input[name='device_access_make[]']").map(function(){return $(this).val();}).get();
                deviceModel = $("input[name='device_access_model[]']").map(function(){return $(this).val();}).get();
                deviceSerial = $("input[name='device_access_serial[]']").map(function(){return $(this).val();}).get();
                deviceYear = $("select[name='device_access_year[]']").map(function() {return $(this).val();}).get();
                deviceValue = $("input[name='device_access_value[]']").map(function(){return $(this).val();}).get();

                for (let i = 0; i < deviceName.length; i++) {
                  // var partValue_plain = partValues[i].replace(/,/g , '');
                   
                   $("#summaryfinalpage").append('<tr>\
                        <td>'+deviceName[i]+'</td>\
                        <td>'+deviceMake[i]+'</td>\
                        <td>'+deviceModel[i]+' </td>\
                        <td>'+deviceSerial[i]+' </td>\
                        <td>'+deviceYear[i]+' </td>\
                        <td>'+deviceValue[i]+'</td>\
                      </tr>');
                
                   }
                var partName = [];
                var partMake = [];
                var partModel = [];
                var partSerial = [];
                var partYear = [];
                var partValues = [];
                var partPremium = 0;

                partName = $("input[name='psrt_access_hardware[]']").map(function(){return $(this).val();}).get();
                partMake = $("input[name='psrt_access_make[]']").map(function(){return $(this).val();}).get();
                partModel = $("input[name='psrt_access_model[]']").map(function(){return $(this).val();}).get();
                partModel = $("input[name='psrt_access_model[]']").map(function(){return $(this).val();}).get();
                partSerial = $("input[name='psrt_access_serial[]']").map(function(){return $(this).val();}).get();
                partYear = $("select[name='psrt_access_year[]']").map(function(){return $(this).val();}).get();
                partValues = $("input[name='psrt_access_value[]']").map(function(){return $(this).val();}).get();
                
                for (let i = 0; i < partName.length; i++) {
                  var partValue_plain = partValues[i].replace(/,/g , '');
                  totalSI =  totalSI + parseInt(partValue_plain);

                  if($('input[name=type_of_device]').val() == "desktop"){
                    partPremium = (parseInt(partValue_plain) *0.15)/100;
                  }else{
                    if($('input[name=device_loc_type]:checked').val() == "Yes"){
                      partPremium = (parseInt(partValue_plain) *0.75)/100;              
                    }else{
                      partPremium = (parseInt(partValue_plain) *3.5)/100; 
                    }
                  }
                  var deviceValueWithComman = partPremium.toFixed(2);

                  deviceValueWithComman = ReplaceNumberWithCommas(deviceValueWithComman);
                  // netPremium = netPremium + partPremium;
                    $("#summaryfinalpage2").append('<tr>\
                      <td>'+partName[i]+'</td>\
                      <td>'+partMake[i]+'</td>\
                      <td>'+partModel[i]+'</td>\
                      <td>'+partSerial[i]+'</td>\
                      <td>'+partYear[i]+'</td>\
                      <td style="text-align: right;">'+partValues[i]+'</td>\
                      </tr>');
                 } 

                
                    current = 5;
                    widget.show();      
                    widget.not(':eq('+(current++)+')').hide();
                    setProgress(current);
                    hideButtons(current); 
                  }
               
        
        }    
                    

        }
          
  });
//NEW 
  btn5thNextPage.click(function(){
   
      $('#warning_minimum_part_zero').hide();            
      $("#summaryfinalpage > tbody").empty();
      $("#summaryfinalpage2 > tbody").empty();
 
          var _token = $('input[name="_token"]').val(); 
          var url = $('input[name="url"]').val(); 
          var promo = $('#promo').val();
          var errornumber = 0;  

          $('input[name^="psrt_access_hardware"]').each(function(){
            
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('input[name^="psrt_access_make"]').each(function(){
            
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('input[name^="psrt_access_model"]').each(function(){
            
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('input[name^="psrt_access_serial"]').each(function(){
            
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('#'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
          $('select[name^="psrt_access_year"]').each(function(){
            
            if($('#'+ this.id).val() == ""){
              $('.'+ this.id).css('border-color', '#F44336');           
              errornumber = 1;           
            }else{                        
              $('.'+ this.id).css('border-color', '#4BB543');                   
            } 
          });
           var total = 0;
          $('input[name^="psrt_access_value"]').each(function(){
            if($('#'+ this.id).val() == ""){
              $('#'+ this.id).css('border-color', '#F44336'); 
              errornumber = 1;           
            }else{   
              
              if($('#'+ this.id).val() == 0 ){
                $('#'+ this.id).css('border-color', '#F44336');       
                  $('#warning_minimum_part_zero').show();           
                  errornumber = 1;   
                }else{
                  $('#'+ this.id).css('border-color', '#4BB543');  
                 
                 var cleanTotal = $(this).val().replace(/[,]/gi, '');
                  total += parseInt(cleanTotal);    
                }   
            } 
          
          }); 
              
            var device_mode = $(".device_modified_value").val();
                  if(device_mode == 'Yes'){
                   $('#totalPartsAmount').val(total);
                    if(total >= 60000){
                      jQuery('#max_amount_modal').modal('show');
                      // errornumber = 1
                        } 
                  }else{
                    $('#totalPartsAmount').val(0);
                  }
          
             
          if(errornumber == 1){
            return false;
          }
          //url = url  + '/api/get-quote/pro-tech-insurance/promo';
         
            widget.show();      
            widget.not(':eq('+(current++)+')').hide();
            setProgress(current); 
            // }     
             hideButtons(current); 
      
    
    
  });


  //next button first page
  btnNextPage.click(function(){
   
      if(current < widget.length) {
          
        //personal info
        if(current == 1 ||  current == -1){
          $(".validation_middleName_personal_info").remove();
          $(".validation_middleName_personal_info_check_error").remove(); 
          $(".validation_middleName_personal_info_check_success").remove(); 

          $(".validation_firstName_personal_info").remove();
          $(".validation_firstName_personal_info_check_error").remove(); 
          $(".validation_firstName_personal_info_check_success").remove();

          $(".validation_lastName_personal_info").remove();
          $(".validation_lastName_personal_info_check_error").remove(); 
          $(".validation_lastName_personal_info_check_success").remove();

          $(".validation_contactNo_personal_info").remove();
          $(".validation_contactNo_personal_info_check_error").remove(); 
          $(".validation_contactNo_personal_info_check_success").remove();

          $(".validation_email_personal_info").remove();
          $(".validation_email_personal_info_check_error").remove(); 
          $(".validation_email_personal_info_check_success").remove();

          $(".validation_mailing_address").remove();
          $(".validation_mailing_address_check_error").remove(); 
          $(".validation_mailing_address_check_success").remove();

          $(".validation_residence_address").remove();
          $(".validation_residence_address_check_error").remove(); 
          $(".validation_residence_address_check_success").remove();

          $(".validation_residence_province").remove();
          $(".validation_residence_province_check_error").remove(); 
          $(".validation_residence_province_check_success").remove();

          $(".validation_residence_municipality").remove();
          $(".validation_residence_municipality_check_error").remove(); 
          $(".validation_residence_municipality_check_success").remove();

          $(".validation_residence_barangay").remove();
          $(".validation_residence_barangay_check_error").remove(); 
          $(".validation_residence_barangay_check_success").remove();

          $(".validation_mailing_province").remove();
          $(".validation_mailing_province_check_error").remove(); 
          $(".validation_mailing_province_check_success").remove();

          $(".validation_mailing_municipality").remove();
          $(".validation_mailing_municipality_check_error").remove(); 
          $(".validation_mailing_municipality_check_success").remove();

          $(".validation_mailing_barangay").remove();
          $(".validation_mailing_barangay_check_error").remove(); 
          $(".validation_mailing_barangay_check_success").remove();

          

          var errornumber = 0;
          //validation middle
          if($('#middleName_personal_info').val() == ""){
            $('#middleName_personal_info').css('border-color', '#F44336');            
                    $("#middleName_personal_info").after("<div class='validation_middleName_personal_info' style='opacity:0.7;color:#F44336;'>Middle name is empty</div>");    
            $('#middleName_personal_info').after('<i class="fa fa-times-circle validation_middleName_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#middleName_personal_info').after('<i class="fa fa-check-circle validation_middleName_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#middleName_personal_info').css('border-color', '#4BB543');                   
          }  

          if($('#firstName_personal_info').val() == ""){
            $('#firstName_personal_info').css('border-color', '#F44336');           
                    $("#firstName_personal_info").after("<div class='validation_firstName_personal_info' style='opacity:0.7;color:#F44336;'>First name is empty</div>");    
            $('#firstName_personal_info').after('<i class="fa fa-times-circle validation_firstName_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#firstName_personal_info').after('<i class="fa fa-check-circle validation_firstName_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#firstName_personal_info').css('border-color', '#4BB543');                   
          }   

          if($('#lastName_personal_info').val() == ""){
            $('#lastName_personal_info').css('border-color', '#F44336');            
                    $("#lastName_personal_info").after("<div class='validation_lastName_personal_info' style='opacity:0.7;color:#F44336;'>Last name is empty</div>");    
            $('#lastName_personal_info').after('<i class="fa fa-times-circle validation_lastName_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#lastName_personal_info').after('<i class="fa fa-check-circle validation_lastName_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#lastName_personal_info').css('border-color', '#4BB543');                   
          }  

          if($('#contactNo_personal_info').val() == ""){
            $('#contactNo_personal_info').css('border-color', '#F44336');           
                    $("#contactNo_personal_info").after("<div class='validation_contactNo_personal_info' style='opacity:0.7;color:#F44336;'>Mobile no. is empty</div>");    
            $('#contactNo_personal_info').after('<i class="fa fa-times-circle validation_contactNo_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#contactNo_personal_info').after('<i class="fa fa-check-circle validation_contactNo_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#contactNo_personal_info').css('border-color', '#4BB543');                   
          }     

          if($('#email_personal_info').val() == ""){
            $('#email_personal_info').css('border-color', '#F44336');           
                    $("#email_personal_info").after("<div class='validation_email_personal_info' style='opacity:0.7;color:#F44336;'>Email address is empty</div>");    
            $('#email_personal_info').after('<i class="fa fa-times-circle validation_email_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{   
            if(IsEmail($('#email_personal_info').val())==false){
              $('#email_personal_info').css('border-color', '#F44336');           
                      $("#email_personal_info").after("<div class='validation_email_personal_info' style='opacity:0.7;color:#F44336;'>Invalid format</div>");    
              $('#email_personal_info').after('<i class="fa fa-times-circle validation_email_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
              errornumber = 1;  
          }else{
            $('#email_personal_info').after('<i class="fa fa-check-circle validation_email_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
              $('#email_personal_info').css('border-color', '#4BB543');  
          }                       
                            
          }   

          if($('#mailing_address').val() == ""){
            $('#mailing_address').css('border-color', '#F44336');           
                    $("#mailing_address").after("<div class='validation_mailing_address' style='opacity:0.7;color:#F44336;'>Permanent address is empty</div>");    
            $('#mailing_address').after('<i class="fa fa-times-circle validation_mailing_address_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#mailing_address').after('<i class="fa fa-check-circle validation_mailing_address_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#mailing_address').css('border-color', '#4BB543');                   
          } 

          if($('#residence_address').val() == ""){
            $('#residence_address').css('border-color', '#F44336');           
                    $("#residence_address").after("<div class='validation_residence_address' style='opacity:0.7;color:#F44336;'>Present address is empty</div>");    
            $('#residence_address').after('<i class="fa fa-times-circle validation_residence_address_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#residence_address').after('<i class="fa fa-check-circle validation_residence_address_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#residence_address').css('border-color', '#4BB543');                   
          }         

          if($('#residence_province').val() == ""){
            $('.btn-white-residence_province').css('border-color', '#F44336');            
                    $("#residence_province").after("<div class='validation_residence_province' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Province is empty</div>");    
            $('#residence_province').after('<i class="fa fa-times-circle validation_residence_province_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#residence_province').after('<i class="fa fa-check-circle validation_residence_province_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-residence_province').css('border-color', '#4BB543');                   
          }

          if($('#residence_municipality').val() == ""){
            $('.btn-white-residence_municipality').css('border-color', '#F44336');            
                    $("#residence_municipality").after("<div class='validation_residence_municipality' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>City/Municipality is empty</div>");    
            $('#residence_municipality').after('<i class="fa fa-times-circle validation_residence_municipality_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#residence_municipality').after('<i class="fa fa-check-circle validation_residence_municipality_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-residence_municipality').css('border-color', '#4BB543');                   
          }

          if($('#residence_barangay').val() == ""){
            $('.btn-white-residence_barangay').css('border-color', '#F44336');            
                    $("#residence_barangay").after("<div class='validation_residence_barangay' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Barangay is empty</div>");    
            $('#residence_barangay').after('<i class="fa fa-times-circle validation_residence_barangay_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#residence_barangay').after('<i class="fa fa-check-circle validation_residence_barangay_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-residence_barangay').css('border-color', '#4BB543');                   
          }

        
          if($('#mailing_province').val() == ""){
            $('.btn-white-mailing_province').css('border-color', '#F44336');            
                    $("#mailing_province").after("<div class='validation_mailing_province' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Province is empty</div>");    
            $('#mailing_province').after('<i class="fa fa-times-circle validation_mailing_province_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#mailing_province').after('<i class="fa fa-check-circle validation_mailing_province_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-mailing_province').css('border-color', '#4BB543');                   
          }

          if($('#mailing_municipality').val() == ""){
            $('.btn-white-mailing_municipality').css('border-color', '#F44336');            
                    $("#mailing_municipality").after("<div class='validation_mailing_municipality' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>City/Municipality is empty</div>");    
            $('#mailing_municipality').after('<i class="fa fa-times-circle validation_mailing_municipality_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#mailing_municipality').after('<i class="fa fa-check-circle validation_mailing_municipality_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-mailing_municipality').css('border-color', '#4BB543');                   
          }

          if($('#mailing_barangay').val() == ""){
            $('.btn-white-mailing_barangay').css('border-color', '#F44336');            
                    $("#mailing_barangay").after("<div class='validation_mailing_barangay' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Barangay is empty</div>");    
            $('#mailing_barangay').after('<i class="fa fa-times-circle validation_mailing_barangay_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#mailing_barangay').after('<i class="fa fa-check-circle validation_mailing_barangay_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
            $('.btn-white-mailing_barangay').css('border-color', '#4BB543');                   
          }

        
              
                 
        }       
      if(errornumber == 1){
        btnback.hide();
        current = 0;
          return false;
        }
        if(current == -1){
          current = 1;
        }

            widget.show();      
            widget.not(':eq('+(current++)+')').hide();

     
            setProgress(current); 
        }     
       hideButtons(current);  
    });


  // Next button click action
  btnnextyes.click(function(){
    $(".device_modified_value").val('Yes');
    $('#typeofdeviceDefault').hide();
    $('#typeofdeviceDefaultyes').show();
      // $(".next_no").prop('disabled', true);
        
      if(current < widget.length) {
        btnback.hide(); 
         
        current = 4;
        if(current == 4){
          var type_of_device = jQuery('input[name="type_of_device"]').val();
          var device_loc_type = $("input:radio[name='device_loc_type']:checked").val();       
          var device_loc_type_modified = $(".device_modified_value").val();       
          errornumber = 0; 
          $( "#warning_location_device" ).hide();
          $( "#warning_no_select_device" ).hide();        
          $( "#warning_modified_device" ).hide();           
         
             
                $( "#warning_modified_device" ).hide();       
                $( "#div_view_4thpage" ).hide();            
                $( "#div_next_4thpage" ).show();
                $('.hardwar-body-yes').show();
                $('.hardwar-body-no').hide();   
                  
      
          $(".validation_device_address").remove();
            $(".validation_device_address_check_error").remove(); 
            $(".validation_device_address_check_success").remove();

          $(".validation_device_barangay").remove();
            $(".validation_device_barangay_check_error").remove(); 
            $(".validation_device_barangay_check_success").remove();

            $(".validation_device_province").remove();
            $(".validation_device_province_check_error").remove(); 
            $(".validation_device_province_check_success").remove();

            $(".validation_device_municipality").remove();
            $(".validation_device_municipality_check_error").remove(); 
            $(".validation_device_municipality_check_success").remove();

            if($('#device_address').val() == ""){
              $('#device_address').css('border-color', '#F44336');            
                      $("#device_address").after("<div class='validation_device_address' style='opacity:0.7;color:#F44336;'>Location of device is empty</div>");    
              $('#device_address').after('<i class="fa fa-times-circle validation_device_address_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_address').after('<i class="fa fa-check-circle validation_device_address_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
              $('#device_address').css('border-color', '#4BB543');                   
            } 

          if($('#device_province').val() == ""){
              $('.btn-white-device_province').css('border-color', '#F44336');           
                      $("#device_province").after("<div class='validation_device_province' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Province is empty</div>");    
              $('#device_province').after('<i class="fa fa-times-circle validation_device_province_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_province').after('<i class="fa fa-check-circle validation_device_province_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_province').css('border-color', '#4BB543');                   
            }

            if($('#device_municipality').val() == ""){
              $('.btn-white-device_municipality').css('border-color', '#F44336');           
                      $("#device_municipality").after("<div class='validation_device_municipality' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>City/Municipality is empty</div>");    
              $('#device_municipality').after('<i class="fa fa-times-circle validation_device_municipality_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_municipality').after('<i class="fa fa-check-circle validation_device_municipality_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_municipality').css('border-color', '#4BB543');                   
            }

            if($('#device_barangay').val() == ""){
              $('.btn-white-device_barangay').css('border-color', '#F44336');           
                      $("#device_barangay").after("<div class='validation_device_barangay' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Barangay is empty</div>");    
              $('#device_barangay').after('<i class="fa fa-times-circle validation_device_barangay_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_barangay').after('<i class="fa fa-check-circle validation_device_barangay_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_barangay').css('border-color', '#4BB543');                   
            }

        if(errornumber == 1){
            return false;
          }else{
          }

      }
          jQuery('#summaryfinalpage2').show();
             current = 3;
            widget.show();      
            widget.not(':eq('+(current++)+')').hide();
            
            
            setProgress(current); 
        }     
       hideButtons(current);  
    });
  

  btnnextlipat.click(function(){
    
    // $(".device_modified_value").val('No');
      $('#typeofdeviceDefault').show();
    $('#typeofdeviceDefaultyes').hide();
  
      if(current < widget.length) {
        btnback.hide(); 

        if(current == 3){
          var type_of_device = jQuery('input[name="type_of_device"]').val();
          var device_loc_type = $("input:radio[name='device_loc_type']:checked").val();       
          var device_loc_type_modified = $(".device_modified_value").val();       
          errornumber = 0; 
          $( "#warning_location_device" ).hide();
          $( "#warning_no_select_device" ).hide();        
          $( "#warning_modified_device" ).hide();           
          if(device_loc_type_modified == "No"){
                $( "#warning_modified_device" ).hide();           
                $( "#div_view_4thpage" ).hide();            
                $( "#div_next_4thpage" ).show();
                $('.hardwar-body-yes').hide();          
              }else{
                $( "#warning_modified_device" ).hide();       
                $( "#div_view_4thpage" ).hide();            
                $( "#div_next_4thpage" ).show();
                $('.hardwar-body-yes').show();
              }   
      
          $(".validation_device_address").remove();
            $(".validation_device_address_check_error").remove(); 
            $(".validation_device_address_check_success").remove();

          $(".validation_device_barangay").remove();
            $(".validation_device_barangay_check_error").remove(); 
            $(".validation_device_barangay_check_success").remove();

            $(".validation_device_province").remove();
            $(".validation_device_province_check_error").remove(); 
            $(".validation_device_province_check_success").remove();

            $(".validation_device_municipality").remove();
            $(".validation_device_municipality_check_error").remove(); 
            $(".validation_device_municipality_check_success").remove();

            if($('#device_address').val() == ""){
              $('#device_address').css('border-color', '#F44336');            
                      $("#device_address").after("<div class='validation_device_address' style='opacity:0.7;color:#F44336;'>Location of device is empty</div>");    
              $('#device_address').after('<i class="fa fa-times-circle validation_device_address_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_address').after('<i class="fa fa-check-circle validation_device_address_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
              $('#device_address').css('border-color', '#4BB543');                   
            } 

          if($('#device_province').val() == ""){
              $('.btn-white-device_province').css('border-color', '#F44336');           
                      $("#device_province").after("<div class='validation_device_province' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Province is empty</div>");    
              $('#device_province').after('<i class="fa fa-times-circle validation_device_province_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_province').after('<i class="fa fa-check-circle validation_device_province_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_province').css('border-color', '#4BB543');                   
            }

            if($('#device_municipality').val() == ""){
              $('.btn-white-device_municipality').css('border-color', '#F44336');           
                      $("#device_municipality").after("<div class='validation_device_municipality' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>City/Municipality is empty</div>");    
              $('#device_municipality').after('<i class="fa fa-times-circle validation_device_municipality_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_municipality').after('<i class="fa fa-check-circle validation_device_municipality_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_municipality').css('border-color', '#4BB543');                   
            }

            if($('#device_barangay').val() == ""){
              $('.btn-white-device_barangay').css('border-color', '#F44336');           
                      $("#device_barangay").after("<div class='validation_device_barangay' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Barangay is empty</div>");    
              $('#device_barangay').after('<i class="fa fa-times-circle validation_device_barangay_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_barangay').after('<i class="fa fa-check-circle validation_device_barangay_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_barangay').css('border-color', '#4BB543');                   
            }

        if(errornumber == 1){
            return false;
          }

      }
      current = 4;
            widget.show();      
            widget.not(':eq('+(current++)+')').hide();


            setProgress(current); 
        }     
       hideButtons(current);  
    });



  btnnextno.click(function(){
    
    $(".device_modified_value").val('No');
    $('#typeofdeviceDefault').show();
    $('#typeofdeviceDefaultyes').hide();
    // $(".next_yes").prop('disabled', true);
    if(current < widget.length) {
      btnback.hide(); 

        if(current == 3){
          var type_of_device = jQuery('input[name="type_of_device"]').val();
          var device_loc_type = $("input:radio[name='device_loc_type']:checked").val();       
          var device_loc_type_modified = $(".device_modified_value").val();       
          errornumber = 0; 
          $( "#warning_location_device" ).hide();
          $( "#warning_no_select_device" ).hide();        
          $( "#warning_modified_device" ).hide();           
          if(device_loc_type_modified == "No"){
                $( "#warning_modified_device" ).hide();           
                $( "#div_view_4thpage" ).hide();            
                $( "#div_next_4thpage" ).show();
                $('.hardwar-body-yes').hide();          
              }else{
                $( "#warning_modified_device" ).hide();       
                $( "#div_view_4thpage" ).hide();            
                $( "#div_next_4thpage" ).show();
                $('.hardwar-body-yes').show();
              }   
      
          $(".validation_device_address").remove();
            $(".validation_device_address_check_error").remove(); 
            $(".validation_device_address_check_success").remove();

          $(".validation_device_barangay").remove();
            $(".validation_device_barangay_check_error").remove(); 
            $(".validation_device_barangay_check_success").remove();

            $(".validation_device_province").remove();
            $(".validation_device_province_check_error").remove(); 
            $(".validation_device_province_check_success").remove();

            $(".validation_device_municipality").remove();
            $(".validation_device_municipality_check_error").remove(); 
            $(".validation_device_municipality_check_success").remove();

            if($('#device_address').val() == ""){
              $('#device_address').css('border-color', '#F44336');            
                      $("#device_address").after("<div class='validation_device_address' style='opacity:0.7;color:#F44336;'>Location of device is empty</div>");    
              $('#device_address').after('<i class="fa fa-times-circle validation_device_address_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_address').after('<i class="fa fa-check-circle validation_device_address_check_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
              $('#device_address').css('border-color', '#4BB543');                   
            } 

          if($('#device_province').val() == ""){
              $('.btn-white-device_province').css('border-color', '#F44336');           
                      $("#device_province").after("<div class='validation_device_province' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Province is empty</div>");    
              $('#device_province').after('<i class="fa fa-times-circle validation_device_province_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_province').after('<i class="fa fa-check-circle validation_device_province_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_province').css('border-color', '#4BB543');                   
            }

            if($('#device_municipality').val() == ""){
              $('.btn-white-device_municipality').css('border-color', '#F44336');           
                      $("#device_municipality").after("<div class='validation_device_municipality' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>City/Municipality is empty</div>");    
              $('#device_municipality').after('<i class="fa fa-times-circle validation_device_municipality_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_municipality').after('<i class="fa fa-check-circle validation_device_municipality_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_municipality').css('border-color', '#4BB543');                   
            }

            if($('#device_barangay').val() == ""){
              $('.btn-white-device_barangay').css('border-color', '#F44336');           
                      $("#device_barangay").after("<div class='validation_device_barangay' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Barangay is empty</div>");    
              $('#device_barangay').after('<i class="fa fa-times-circle validation_device_barangay_check_error fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
              errornumber = 1;           
            }else{                        
              $('#device_barangay').after('<i class="fa fa-check-circle validation_device_barangay_check_success fa-lg" aria-hidden="true" style=" float: right;top:-42px !important; position: relative;left:-25px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
              $('.btn-white-device_barangay').css('border-color', '#4BB543');                   
            }

        if(errornumber == 1){
            return false;
          }

      }
      jQuery('#summaryfinalpage2').hide();
      current = 4;
            widget.show();      
            widget.not(':eq('+(current++)+')').hide();


            setProgress(current); 
        }     
       hideButtons(current);  
    });

  // LAST END 
  btn5thpage_add.click(function(){
    var minNumberfifth = 40000000;
    var maxNumberfifth = 100000000;

    var date = new Date();
    date.setFullYear( date.getFullYear() - 4 );
    var year = date.getFullYear();
    var yearlist;

    for (i = new Date().getFullYear(); i > year; i--)
      {
        yearlist = yearlist +  '<option value="'+i+'">' + i + '</option>';
      }
     var colCount = $("#customFieldsfifth tr").length;
     if(colCount >= 2){
      jQuery('.delete-row_part').show();
     }else{
      jQuery('.delete-row_part').hide();
     } 
    var numberpart = Math.floor(Math.random()*(maxNumberfifth-minNumberfifth+1)+minNumberfifth);
    var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')"; 
    var numformat1 = "vf_clean_number('psrt_access_value"+numberpart+"');vf_commafy('psrt_access_value"+numberpart+"', 2)";
    var $cloned = $('#divvv').clone().prop('id', 'divvv_part'+numberpart); 
    var new_row_part = '<tr>\
        <td><div><input name="psrt_access_hardware[]" id="psrt_access_hardware'+numberpart+'" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div></td>\
        <td><div><input name="psrt_access_make[]" id="psrt_access_make'+numberpart+'" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div></td>\
        <td><div><input name="psrt_access_model[]" id="psrt_access_model'+numberpart+'" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div></td>\
        <td><div><input name="psrt_access_serial[]" id="psrt_access_serial'+numberpart+'" type="text" class="form-control input-lg personal_ifno_mobile " maxlength="100"></div></td>\
        <td><div id="new_select_part'+numberpart+'"></div></td>\
        <td><div><input name="psrt_access_value[]" id="psrt_access_value'+ numberpart +'" type="text" class="form-control input-lg personal_ifno_mobile" onchange="'+ numformat1 +'" oninput="'+ noonly +'" maxlength="100" value="0.00" ></div></td>\
        <td><div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div></td></tr>\
        <script type="text/javascript">\
                $("#psrt_access_value'+ numberpart +'").change(function() {\
                  var tal = $(this).val();\
                  if(tal== "NaN.00"){\
                    $("#psrt_access_value'+ numberpart +'").val("0.00");\
                  }\
                });\
        </script>';
    $('#part-body').append(new_row_part);  

    $cloned.find('#copy_select').prop('name', 'psrt_access_year[]');
    $cloned.find('#copy_select').prop('display', 'block');
    $cloned.find('#copy_select').data( "style", 'psrt_access_year'+numberpart );
    $cloned.find('#copy_select').attr( "data-style", "input-lg btn-white-device_access_year psrt_access_year"+numberpart);
    $cloned.find('#copy_select').prop('id', 'psrt_access_year'+numberpart);
    $cloned.appendTo('#new_select_part'+numberpart);
    
    jQuery('#psrt_access_year'+numberpart).selectpicker();
    jQuery('#divvv_part'+numberpart).show();

    return false;

  });

  btn4thpage_add.click(function(){
    
    var minNumber = 1;
    var maxNumber = 40000000;

    var date = new Date();
    date.setFullYear( date.getFullYear() - 4 );
    var year = date.getFullYear();
    var yearlist;

    for (i = new Date().getFullYear(); i > year; i--)
      {
        yearlist = yearlist +  '<option value="'+i+'">' + i + '</option>';
      }
     var colCount = $("#customFields tr").length;
     if(colCount >= 2){
      jQuery('.delete-row').show();
     }else{
      jQuery('.delete-row').hide();
     }    
    var number = Math.floor(Math.random()*(maxNumber-minNumber+1)+minNumber);
    var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')"; 
    var numformat1 = "vf_clean_number('device_access_value"+number+"');vf_commafy('device_access_value"+number+"', 2)";
    var $cloned = $('#divvv').clone().prop('id', 'divvv'+number); 
    var new_row = '<tr>\
      <td><div><input name="device_access_hardware[]" id="device_access_hardware'+number+'" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div></td>\
        <td><div><input name="device_access_make[]" id="device_access_make'+number+'" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div></td>\
        <td><div><input name="device_access_model[]" id="device_access_model'+number+'" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div></td>\
        <td><div><input name="device_access_serial[]" id="device_access_serial'+number+'" type="text" class="form-control input-lg personal_ifno_mobile " maxlength="100"></div></td>\
        <td><div id="new_select'+number+'"></div></td>\
        <td><div><input name="device_access_value[]" id="device_access_value'+ number +'" type="text" class="form-control input-lg personal_ifno_mobile device_access_value" onchange="'+ numformat1 +'" oninput="'+ noonly +'" maxlength="100" value="0.00" ></div></td>\
        <td><div><i class="fa fa-times delete-row btn btn-danger" aria-hidden="true" ></i></div></td></tr>\
        <script type="text/javascript">\
                $("#device_access_value'+ number +'").change(function() {\
                  var tal = $(this).val();\
                  if(tal== "NaN.00"){\
                    $("#device_access_value'+ number +'").val("0.00");\
                  }\
                });\
        </script>';

    $('#hardware-body').append(new_row);  
    $cloned.find('#copy_select').prop('name', 'device_access_year[]');
    $cloned.find('#copy_select').prop('display', 'block');
    $cloned.find('#copy_select').data( "style", 'device_access_year'+number );
    $cloned.find('#copy_select').attr( "data-style", "input-lg btn-white-device_access_year device_access_year"+number);
    $cloned.find('#copy_select').prop('id', 'device_access_year'+number);
    $cloned.appendTo('#new_select'+number);
    jQuery('#device_access_year'+number).selectpicker();
    jQuery('#divvv'+number).show();

    return false;
  });

  //Check Coverarge button
  btncheck.click(function(){
    
    $('#pop_warning1').css('display','none');
    $('#pop_warning2').css('display','block');
    $('#pop_warning1_PWD').css('display','none');
    $('#pop_warning2_PWD').css('display','block');
    var fullname = $('#firstName_personal_info').val()  + ' '+ $('#middleName_personal_info').val()  + ' '+ $('#lastName_personal_info').val();
    var coverage;
    var coverage_count;
    var count_coverage;
    var coverage_label;
    var premium;

    var count= $('#primbasicval').val();
    var cov_value = $('input[name=coverage_complete]').val();
  
    if(cov_value !== "c"){
      if(cov_value == "a"){
        premium = count * 50;
        coverage = "Basic" + "(" +count+ ")";
        coverage_label = "Basic";
      }else{
        premium = count * 75;
        coverage = "Prime" + "(" +count+ ")";
        coverage_label = "Prime";

      }
    }else{
      premium = 125;
      coverage = "Basic+Prime";
      coverage_label = "Basic+Prime";
    }
    
    
    var total = $('#total_premium').text();
    var total_prem;
    if(total !== null){
      total_prem = (+total) +  (+premium);
    }else{
      total_prem =  premium;
    }
    $('#total_premium').text(total_prem);
    $('input[name=total_premium_all]').val(total_prem);
    var d = new Date($('#dateofBirth_personal_info').val()),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2){ month = '0' + month};
      if (day.length < 2){day = '0' + day};
    var fulldate = year +'-'+month +'-'+day;

    
    var occupation;
    if($('#occupation_personal_info').val() == "Others"){
      occupation = $('#occupation_other_personal_info').val()
    }else{
      occupation = $('#occupation_personal_info').val();
    }
    $('#tabl_summary').append('<tr>\
                  <input type="hidden" id="coverage" name="coverage[]" value="'+ coverage_label +'">\
                  <input type="hidden" id="premium" name="premium[]" value="'+ premium +'">\
                  <input type="hidden" id="total_prem" name="total_prem[]" value="'+ total_prem +'">\
                  <input type="hidden" id="count" name="count[]" value="'+ count+'">\
                  <input type="hidden" id="firstName_personal_info" name="firstName_personal_info[]" value="'+ $('#firstName_personal_info').val() +'">\
                  <input type="hidden" id="middleName_personal_info" name="middleName_personal_info[]" value="'+ $('#middleName_personal_info').val() +'">\
                  <input type="hidden" id="lastName_personal_info" name="lastName_personal_info[]" value="'+ $('#lastName_personal_info').val() +'">\
                  <input type="hidden" id="dateofBirth_personal_info" name="dateofBirth_personal_info[]" value="'+ fulldate +'">\
                  <input type="hidden" id="gender_personal_info" name="gender_personal_info[]" value="'+ $('#gender_personal_info').val() +'">\
                  <input type="hidden" id="contactNo_personal_info" name="contactNo_personal_info[]" value="'+ $('#contactNo_personal_info').val() +'">\
                  <input type="hidden" id="tel_no_info" name="tel_no_info[]" value="'+ $('#tel_no_info').val() +'">\
                  <input type="hidden" id="email_personal_info" name="email_personal_info[]" value="'+ $('#email_personal_info').val() +'">\
                  <input type="hidden" id="occupation_personal_info" name="occupation_personal_info[]" value="'+ occupation +'">\
                  <input type="hidden" id="beneficiary_personal_info" name="beneficiary_personal_info[]" value="'+ $('#beneficiary_personal_info').val() +'">\
                  <input type="hidden" id="relationship_personal_info" name="relationship_personal_info[]" value="'+ $('#relationship_personal_info').val() +'">\
                  <input type="hidden" id="residence_address" name="residence_address[]" value="'+ $('#residence_address').val() +'">\
                  <input type="hidden" id="residence_province" name="residence_province[]" value="'+ $('#residence_province').val() +'">\
                  <input type="hidden" id="residence_municipality" name="residence_municipality[]" value="'+ $('#residence_municipality').val() +'">\
                  <input type="hidden" id="residence_barangay" name="residence_barangay[]" value="'+ $('#residence_barangay').val() +'">\
                  <input type="hidden" id="mailing_address" name="mailing_address[]" value="'+ $('#mailing_address').val() +'">\
                  <input type="hidden" id="mailing_province" name="mailing_province[]" value="'+ $('#mailing_province').val() +'">\
                  <input type="hidden" id="mailing_municipality" name="mailing_municipality[]" value="'+ $('#mailing_municipality').val() +'">\
                  <input type="hidden" id="mailing_barangay" name="mailing_barangay[]" value="'+ $('#mailing_barangay').val() +'">\
                  <input type="hidden" id="status_other_personal_info" name="status_other_personal_info[]" value="'+ $('#status_other_personal_info').val() +'">\
                  <input type="hidden" id="nationality_other_personal_info" name="nationality_other_personal_info[]" value="'+ $('#nationality_other_personal_info').val() +'">\
                  <input type="hidden" id="place_of_birth_other_personal_info" name="place_of_birth_other_personal_info[]" value="'+ $('#place_of_birth_other_personal_info').val() +'">\
                  <input type="hidden" id="type_of_id_personal_info" name="type_of_id_personal_info[]" value="'+ $('#type_of_id_personal_info').val() +'">\
                  <input type="hidden" id="idno_other_personal_info" name="idno_other_personal_info[]" value="'+ $('#idno_other_personal_info').val() +'">\
                  <td>'+fullname+'<div id="toPaste" style="display:none"></div</td>\
                  <td>'+coverage +'</td><td>Php '+premium +'</td>\
                </tr>');
    $('#fromCopy').clone().appendTo('#toPaste');
      if(current < widget.length) {
            widget.show();      
            widget.not(':eq('+(current++)+')').hide();
            setProgress(current); 
        }     
       hideButtons(current);  
    });
  // New button click action    
  btnNew.click(function(){ 
      $('#pop_warning1').css('display','none');
    $('#pop_warning2').css('display','block');
    $('#pop_warning1_PWD').css('display','none');
    $('#pop_warning2_PWD').css('display','block');
    var fullname = $('#firstName_personal_info').val()  + ' '+ $('#middleName_personal_info').val()  + ' '+ $('#lastName_personal_info').val();
    var coverage;
    var coverage_count;
    var count_coverage;
    var coverage_label;
    var premium;

    var count= $('#primbasicval').val();
    var cov_value = $('input[name=coverage_complete]').val();
  
    if(cov_value !== "c"){
      if(cov_value == "a"){
        premium = count * 50;
        coverage = "Basic" + "(" +count+ ")";
        coverage_label = "Basic";
      }else{
        premium = count * 75;
        coverage = "Prime" + "(" +count+ ")";
        coverage_label = "Prime";

      }
    }else{
      premium = 125;
      coverage = "Basic+Prime";
      coverage_label = "Basic+Prime";
    }
    var total = $('#total_premium').text();
    var total_prem;
    if(total !== null){
      total_prem = (+total) +  (+premium);
    }else{
      total_prem =  premium;
    }
    var d = new Date($('#dateofBirth_personal_info').val()),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2){ month = '0' + month};
      if (day.length < 2){day = '0' + day};
    var fulldate = year +'-'+month +'-'+day;
    $('#total_premium').text(total_prem);
    $('input[name=total_premium_all]').val(total_prem);
    var occupation;
    if($('#occupation_personal_info').val() == "Others"){
      occupation = $('#occupation_other_personal_info').val()
    }else{
      occupation = $('#occupation_personal_info').val();
    }

    $('#tabl_summary').append('<tr>\
                  <input type="hidden" id="coverage" name="coverage[]" value="'+ coverage_label +'">\
                  <input type="hidden" id="premium" name="premium[]" value="'+ premium +'">\
                  <input type="hidden" id="total_prem" name="total_prem[]" value="'+ total_prem +'">\
                  <input type="hidden" id="count" name="count[]" value="'+ count+'">\
                  <input type="hidden" id="firstName_personal_info" name="firstName_personal_info[]" value="'+ $('#firstName_personal_info').val() +'">\
                  <input type="hidden" id="middleName_personal_info" name="middleName_personal_info[]" value="'+ $('#middleName_personal_info').val() +'">\
                  <input type="hidden" id="lastName_personal_info" name="lastName_personal_info[]" value="'+ $('#lastName_personal_info').val() +'">\
                  <input type="hidden" id="dateofBirth_personal_info" name="dateofBirth_personal_info[]" value="'+ fulldate +'">\
                  <input type="hidden" id="gender_personal_info" name="gender_personal_info[]" value="'+ $('#gender_personal_info').val() +'">\
                  <input type="hidden" id="contactNo_personal_info" name="contactNo_personal_info[]" value="'+ $('#contactNo_personal_info').val() +'">\
                  <input type="hidden" id="tel_no_info" name="tel_no_info[]" value="'+ $('#tel_no_info').val() +'">\
                  <input type="hidden" id="email_personal_info" name="email_personal_info[]" value="'+ $('#email_personal_info').val() +'">\
                  <input type="hidden" id="occupation_personal_info" name="occupation_personal_info[]" value="'+ occupation +'">\
                  <input type="hidden" id="beneficiary_personal_info" name="beneficiary_personal_info[]" value="'+ $('#beneficiary_personal_info').val() +'">\
                  <input type="hidden" id="relationship_personal_info" name="relationship_personal_info[]" value="'+ $('#relationship_personal_info').val() +'">\
                  <input type="hidden" id="residence_address" name="residence_address[]" value="'+ $('#residence_address').val() +'">\
                  <input type="hidden" id="residence_province" name="residence_province[]" value="'+ $('#residence_province').val() +'">\
                  <input type="hidden" id="residence_municipality" name="residence_municipality[]" value="'+ $('#residence_municipality').val() +'">\
                  <input type="hidden" id="residence_barangay" name="residence_barangay[]" value="'+ $('#residence_barangay').val() +'">\
                  <input type="hidden" id="mailing_address" name="mailing_address[]" value="'+ $('#mailing_address').val() +'">\
                  <input type="hidden" id="mailing_province" name="mailing_province[]" value="'+ $('#mailing_province').val() +'">\
                  <input type="hidden" id="mailing_municipality" name="mailing_municipality[]" value="'+ $('#mailing_municipality').val() +'">\
                  <input type="hidden" id="mailing_barangay" name="mailing_barangay[]" value="'+ $('#mailing_barangay').val() +'">\
                  <input type="hidden" id="status_other_personal_info" name="status_other_personal_info[]" value="'+ $('#status_other_personal_info').val() +'">\
                  <input type="hidden" id="nationality_other_personal_info" name="nationality_other_personal_info[]" value="'+ $('#nationality_other_personal_info').val() +'">\
                  <input type="hidden" id="place_of_birth_other_personal_info" name="place_of_birth_other_personal_info[]" value="'+ $('#place_of_birth_other_personal_info').val() +'">\
                  <input type="hidden" id="type_of_id_personal_info" name="type_of_id_personal_info[]" value="'+ $('#type_of_id_personal_info').val() +'">\
                  <input type="hidden" id="idno_other_personal_info" name="idno_other_personal_info[]" value="'+ $('#idno_other_personal_info').val() +'">\
                  <td>'+fullname+'<div id="toPaste" style="display:none"></div</td>\
                  <td>'+coverage +'</td><td>Php '+premium +'</td>\
                </tr>');
    $('#fromCopy').clone().appendTo('#toPaste');

    $('#nextbutton').css('display','block');
    $("select option").prop("selected", false);

    //1st page clear
    $(".validation_noofItem_check_error").remove(); 
    $(".validation_oofItem_check_success").remove(); 
    $(".validation_unit_personal_info").remove(); 
    $('.btn-white-noofunit').css('border-color', '');
    $('input[name=coverage_complete]').val("");
      jQuery('#primbasicval').selectpicker("refresh");    
    document.getElementById("basic").style.background='#C0C0C0';
      document.getElementById("basic").style.color ='#000000';
      document.getElementById("prime").style.background='#C0C0C0';
      document.getElementById("prime").style.color ='#000000'; 
      document.getElementById("basicprinme").style.color ='#000000';  
      document.getElementById("basicprinme").style.background='#C0C0C0';      
      document.getElementById('basicprinmepanel').style.display = 'none';

      //2nd page clear
      $(".validation_middleName_personal_info").remove();
    $(".validation_middleName_personal_info_check_error").remove(); 
    $(".validation_middleName_personal_info_check_success").remove(); 
    $(".validation_firstName_personal_info").remove(); 
    $(".validation_firstName_personal_info_check_error").remove(); 
    $(".validation_firstName_personal_info_check_success").remove();  
    $(".validation_lastName_personal_info").remove(); 
    $(".validation_lastName_personal_info_check_error").remove(); 
    $(".validation_lastName_personal_info_check_success").remove();
    $(".validation_contactNo_personal_info").remove(); 
    $(".validation_contactNo_personal_info_check_success").remove(); 
    $(".validation_contactNo_personal_info_check_error").remove();
    $(".validation_dateofBirth_personal_info").remove(); 
    $(".validation_dateofBirth_personal_info_check_error").remove(); 
    $(".validation_dateofBirth_personal_info_check_success").remove();
    $(".validation_gender_personal_info").remove(); 
    $(".validation_gender_personal_info_check_error").remove(); 
    $(".validation_gender_personal_info_check_success").remove();
    $(".validation_email_personal_info").remove(); 
    $(".validation_email_personal_info_check_error").remove(); 
    $(".validation_email_personal_info_check_success").remove();
    $(".validation_occupation_personal_info").remove(); 
    $(".validation_occupation_personal_info_check_error").remove(); 
    $(".validation_occupation_personal_info_check_success").remove();

    $(".validation_tel_no_info").remove(); 
      $(".validation_tel_no_info_check_error").remove(); 
      $(".validation_tel_no_info_check_success").remove();
    $('#tel_no_info').css('border-color', '');
      $('#tel_no_info').val("");

    $('#middleName_personal_info').css('border-color', ''); 
    $('#firstName_personal_info').css('border-color', '');      
    $('#lastName_personal_info').css('border-color', '');   
    $('#contactNo_personal_info').css('border-color', '');  
    $('#occupation_other_personal_info').css('border-color', ''); 
    $('#dateofBirth_personal_info').css('border-color', '');    
    $('.btn-white-gender').css('border-color', '');    
    $('.btn-white-type_of_id_personal_info').css('border-color', '');    


    $('#email_personal_info').css('border-color', '');  
    $('#email_personal_info').css('border-color', '');   
    $('#occupation_personal_info').css('border-color', '');    
      $('#firstName_personal_info').val("");
      $('#middleName_personal_info').val("");
      $('#lastName_personal_info').val("");
      $('#dateofBirth_personal_info').val("");      
      $('#contactNo_personal_info').val("");
      $('#email_personal_info').val("");
      $('#occupation_personal_info').val("");
      jQuery('#gender_personal_info').selectpicker("refresh");      
      jQuery('#occupation_personal_info').selectpicker("refresh");

      $('.btn-white-occupation_personal_info').css('border-color', '');  
    $('#occupation_other_personal_info').css('border-color', ''); 
    $('#beneficiary_personal_info').css('border-color', '');    
    $('#relationship_personal_info').css('border-color', '');     
    $(".validation_occupation_personal_info").remove(); 
    $(".validation_occupation_personal_info_check_error").remove(); 
    $(".validation_occupation_personal_info_check_success").remove();     
    $(".validation_tel_no_info").remove(); 
    $(".validation_tel_no_info_check_error").remove(); 
    $(".validation_tel_no_info_check_success").remove();
    $(".validation_occupation_other_personal_info").remove(); 
    $(".validation_occupation_other_personal_info_check_error").remove(); 
    $(".validation_occupation_other_personal_info_check_success").remove(); 
    $(".validation_beneficiary_personal_info").remove(); 
    $(".validation_beneficiary_personal_info_check_error").remove(); 
    $(".validation_beneficiary_personal_info_check_success").remove();
    $(".validation_relationship_personal_info").remove(); 
    $(".validation_relationship_personal_info_check_error").remove(); 
    $(".validation_relationship_personal_info_check_success").remove();
    $(".validation_others_pwd_personal_info").remove(); 
    $(".validation_others_pwd_personal_info_check_error").remove(); 
    $(".validation_others_pwd_personal_info_check_success").remove(); 
        $("#occupation_other_personal_info").val("");

      $("#beneficiary_personal_info").val("");
      $("#relationship_personal_info").val("");
      ////3rd page clear







    $(".validation_residence_address").remove(); 
    $(".validation_residence_address_check_error").remove(); 
    $(".validation_residence_address_check_success").remove();
    $(".validation_residence_municipality").remove(); 
    $(".validation_residence_municipality_check_error").remove(); 
    $(".validation_residence_municipality_check_success").remove();
    $(".validation_residence_province").remove(); 
    $(".validation_residence_province_check_error").remove(); 
    $(".validation_residence_province_check_success").remove();
    $(".validation_residence_barangay").remove(); 
    $(".validation_residence_barangay_check_error").remove(); 
    $(".validation_residence_barangay_check_success").remove();
    $(".validation_mailing_address").remove(); 
    $(".validation_mailing_address_check_error").remove(); 
    $(".validation_mailing_address_check_success").remove();
    $(".validation_mailing_province").remove(); 
    $(".validation_mailing_province_check_error").remove(); 
    $(".validation_mailing_province_check_success").remove();
    $(".validation_mailing_municipality").remove(); 
    $(".validation_mailing_municipality_check_error").remove(); 
    $(".validation_mailing_municipality_check_success").remove();
    $(".validation_mailing_barangay").remove(); 
    $(".validation_mailing_barangay_check_error").remove(); 
    $(".validation_mailing_barangay_check_success").remove();
    $('#residence_address').css('border-color', '');  
    $('.btn-white-residence_municipality').css('border-color', ''); 
    $('.btn-white-residence_province').css('border-color', ''); 
    $('.btn-white-residence_barangay').css('border-color', ''); 
    $('#mailing_address').css('border-color', '');
    $('.btn-white-mailing_province').css('border-color', '');
    $('.btn-white-mailing_municipality').css('border-color', ''); 
    $('.btn-white-mailing_barangay').css('border-color', ''); 
      $('#residence_address').val("");
      $('#mailing_address').val("");      
      $("#chckSameAddress"). prop("checked", false);
      jQuery('#residence_province').selectpicker("refresh"); 
      jQuery('#residence_municipality').selectpicker("refresh"); 
      jQuery('#residence_barangay').selectpicker("refresh"); 
      jQuery('#mailing_province').selectpicker("refresh"); 
      jQuery('#mailing_municipality').selectpicker("refresh"); 
      jQuery('#mailing_barangay').selectpicker("refresh"); 

      //4th page clear
    $(".validation_status_other_personal_info").remove(); 
    $(".validation_status_other_personal_info_check_error").remove(); 
    $(".validation_status_other_personal_info_check_success").remove();
    $(".validation_nationality_other_personal_info").remove();
    $(".validation_nationality_other_personal_info_check_error").remove(); 
    $(".validation_nationality_other_personal_info_check_success").remove();
    $(".validation_place_of_birth_other_personal_info").remove();
    $(".validation_place_of_birth_other_personal_info_check_error").remove(); 
    $(".validation_place_of_birth_other_personal_info_check_success").remove(); 
    $(".validation_type_of_id_personal_info").remove(); 
    $(".validation_type_of_id_personal_info_check_error").remove(); 
    $(".validation_type_of_id_personal_info_check_success").remove();
    $(".validation_idno_other_personal_info").remove();
    $(".validation_idno_other_personal_info_check_error").remove(); 
    $(".validation_idno_other_personal_info_check_success").remove();   
    $('.btn-white-status_other_personal_info').css('border-color', '');   
    $('#nationality_other_personal_info').css('border-color', '');    
    $('#place_of_birth_other_personal_info').css('border-color', '');
    $('.btn-white-type_of_id_personal_info').css('border-color', '');
    $('#idno_other_personal_info').css('border-color', '');  
      $('#file-upload').val("");      
    $('#upload_Error').hide();
    $('#upload_file').hide();
    $('#upload_label').show();
      jQuery('#status_other_personal_info').selectpicker("refresh"); 
      jQuery('#type_of_id_personal_info').selectpicker("refresh"); 
      $('#nationality_other_personal_info').val("");      
      $('#place_of_birth_other_personal_info').val("");     
      $('#idno_other_personal_info').val("");  

        if(current > 1){
        current = current - 5;
        btnnext.trigger('click');
      }
        hideButtons(current);
    }); 
    // Add button click action   
   btnAdd.click(function(){ 

      $('#pop_warning1').css('display','none');
    $('#pop_warning2').css('display','block');
    $('#pop_warning1_PWD').css('display','none');
    $('#pop_warning2_PWD').css('display','block');
    $('#nextbutton').css('display','block');

    $('#nextbutton').css('display','block');
    $("select option").prop("selected", false);

    //1st page clear
    $(".validation_noofItem_check_error").remove(); 
    $(".validation_oofItem_check_success").remove(); 
    $(".validation_unit_personal_info").remove(); 
    $('.btn-white-noofunit').css('border-color', '');
    $('input[name=coverage_complete]').val("");
      jQuery('#primbasicval').selectpicker("refresh");    
    document.getElementById("basic").style.background='#C0C0C0';
      document.getElementById("basic").style.color ='#000000';
      document.getElementById("prime").style.background='#C0C0C0';
      document.getElementById("prime").style.color ='#000000'; 
      document.getElementById("basicprinme").style.color ='#000000';  
      document.getElementById("basicprinme").style.background='#C0C0C0';      
      document.getElementById('basicprinmepanel').style.display = 'none';

      //2nd page clear

      $(".validation_tel_no_info").remove(); 
      $(".validation_tel_no_info_check_error").remove(); 
      $(".validation_tel_no_info_check_success").remove();
    $('#tel_no_info').css('border-color', '');
      $('#tel_no_info').val("");

      $(".validation_middleName_personal_info").remove();
    $(".validation_middleName_personal_info_check_error").remove(); 
    $(".validation_middleName_personal_info_check_success").remove(); 
    $(".validation_firstName_personal_info").remove(); 
    $(".validation_firstName_personal_info_check_error").remove(); 
    $(".validation_firstName_personal_info_check_success").remove();  
    $(".validation_lastName_personal_info").remove(); 
    $(".validation_lastName_personal_info_check_error").remove(); 
    $(".validation_lastName_personal_info_check_success").remove();
    $(".validation_contactNo_personal_info").remove(); 
    $(".validation_contactNo_personal_info_check_success").remove(); 
    $(".validation_contactNo_personal_info_check_error").remove();
    $(".validation_dateofBirth_personal_info").remove(); 
    $(".validation_dateofBirth_personal_info_check_error").remove(); 
    $(".validation_dateofBirth_personal_info_check_success").remove();
    $(".validation_gender_personal_info").remove(); 
    $(".validation_gender_personal_info_check_error").remove(); 
    $(".validation_gender_personal_info_check_success").remove();
    $(".validation_email_personal_info").remove(); 
    $(".validation_email_personal_info_check_error").remove(); 
    $(".validation_email_personal_info_check_success").remove();
    $(".validation_occupation_personal_info").remove(); 
    $(".validation_occupation_personal_info_check_error").remove(); 
    $(".validation_occupation_personal_info_check_success").remove();
    $('#middleName_personal_info').css('border-color', ''); 
    $('#firstName_personal_info').css('border-color', '');      
    $('#lastName_personal_info').css('border-color', '');   
    $('#contactNo_personal_info').css('border-color', '');  
    $('#dateofBirth_personal_info').css('border-color', '');    
    $('.btn-white-gender').css('border-color', '');  
    $('#occupation_other_personal_info').css('border-color', '');
    $('.btn-white-type_of_id_personal0_info').css('border-color', '');    
    $('#email_personal_info').css('border-color', '');  
    $('#email_personal_info').css('border-color', '');   
    $('#occupation_personal_info').css('border-color', '');    
      $('#firstName_personal_info').val("");
      $('#middleName_personal_info').val("");
      $('#lastName_personal_info').val("");
      $('#dateofBirth_personal_info').val("");      
      $('#contactNo_personal_info').val("");
      $('#email_personal_info').val("");
      $('#occupation_personal_info').val("");
      jQuery('#gender_personal_info').selectpicker("refresh");
      jQuery('#occupation_personal_info').selectpicker("refresh");
      $("#occupation_other_personal_info").val("");
      $("#beneficiary_personal_info").val("");
      $("#relationship_personal_info").val("");



      $('.btn-white-occupation_personal_info').css('border-color', '');  
    $('#occupation_other_personal_info').css('border-color', ''); 
    $('#beneficiary_personal_info').css('border-color', '');    
    $('#relationship_personal_info').css('border-color', '');     
    $(".validation_occupation_personal_info").remove(); 
    $(".validation_occupation_personal_info_check_error").remove(); 
    $(".validation_occupation_personal_info_check_success").remove();     
    $(".validation_tel_no_info").remove(); 
    $(".validation_tel_no_info_check_error").remove(); 
    $(".validation_tel_no_info_check_success").remove();
    $(".validation_occupation_other_personal_info").remove(); 
    $(".validation_occupation_other_personal_info_check_error").remove(); 
    $(".validation_occupation_other_personal_info_check_success").remove(); 
    $(".validation_beneficiary_personal_info").remove(); 
    $(".validation_beneficiary_personal_info_check_error").remove(); 
    $(".validation_beneficiary_personal_info_check_success").remove();
    $(".validation_relationship_personal_info").remove(); 
    $(".validation_relationship_personal_info_check_error").remove(); 
    $(".validation_relationship_personal_info_check_success").remove();
    $(".validation_others_pwd_personal_info").remove(); 
    $(".validation_others_pwd_personal_info_check_error").remove(); 
    $(".validation_others_pwd_personal_info_check_success").remove();  
      ////3rd page clear







    $(".validation_residence_address").remove(); 
    $(".validation_residence_address_check_error").remove(); 
    $(".validation_residence_address_check_success").remove();
    $(".validation_residence_municipality").remove(); 
    $(".validation_residence_municipality_check_error").remove(); 
    $(".validation_residence_municipality_check_success").remove();
    $(".validation_residence_province").remove(); 
    $(".validation_residence_province_check_error").remove(); 
    $(".validation_residence_province_check_success").remove();
    $(".validation_residence_barangay").remove(); 
    $(".validation_residence_barangay_check_error").remove(); 
    $(".validation_residence_barangay_check_success").remove();
    $(".validation_mailing_address").remove(); 
    $(".validation_mailing_address_check_error").remove(); 
    $(".validation_mailing_address_check_success").remove();
    $(".validation_mailing_province").remove(); 
    $(".validation_mailing_province_check_error").remove(); 
    $(".validation_mailing_province_check_success").remove();
    $(".validation_mailing_municipality").remove(); 
    $(".validation_mailing_municipality_check_error").remove(); 
    $(".validation_mailing_municipality_check_success").remove();
    $(".validation_mailing_barangay").remove(); 
    $(".validation_mailing_barangay_check_error").remove(); 
    $(".validation_mailing_barangay_check_success").remove();
    $('#residence_address').css('border-color', '');  
    $('.btn-white-residence_municipality').css('border-color', ''); 
    $('.btn-white-residence_province').css('border-color', ''); 
    $('.btn-white-residence_barangay').css('border-color', ''); 
    $('#mailing_address').css('border-color', '');
    $('.btn-white-mailing_province').css('border-color', '');
    $('.btn-white-mailing_municipality').css('border-color', ''); 
    $('.btn-white-mailing_barangay').css('border-color', ''); 
      $('#residence_address').val("");
      $('#mailing_address').val("");      
      $("#chckSameAddress"). prop("checked", false);
      jQuery('#residence_province').selectpicker("refresh"); 
      jQuery('#residence_municipality').selectpicker("refresh"); 
      jQuery('#residence_barangay').selectpicker("refresh"); 
      jQuery('#mailing_province').selectpicker("refresh"); 
      jQuery('#mailing_municipality').selectpicker("refresh"); 
      jQuery('#mailing_barangay').selectpicker("refresh"); 

      //4th page clear
    $(".validation_status_other_personal_info").remove(); 
    $(".validation_status_other_personal_info_check_error").remove(); 
    $(".validation_status_other_personal_info_check_success").remove();
    $(".validation_nationality_other_personal_info").remove();
    $(".validation_nationality_other_personal_info_check_error").remove(); 
    $(".validation_nationality_other_personal_info_check_success").remove();
    $(".validation_place_of_birth_other_personal_info").remove();
    $(".validation_place_of_birth_other_personal_info_check_error").remove(); 
    $(".validation_place_of_birth_other_personal_info_check_success").remove(); 
    $(".validation_type_of_id_personal_info").remove(); 
    $(".validation_type_of_id_personal_info_check_error").remove(); 
    $(".validation_type_of_id_personal_info_check_success").remove();
    $(".validation_idno_other_personal_info").remove();
    $(".validation_idno_other_personal_info_check_error").remove(); 
    $(".validation_idno_other_personal_info_check_success").remove();   
    $('.btn-white-status_other_personal_info').css('border-color', '');   
    $('#nationality_other_personal_info').css('border-color', '');    
    $('#place_of_birth_other_personal_info').css('border-color', '');
    $('.btn-white-type_of_id_personal_info').css('border-color', '');
    $('#idno_other_personal_info').css('border-color', '');  
      $('#file-upload').val("");      
    $('#upload_Error').hide();
    $('#upload_file').hide();
    $('#upload_label').show();
      jQuery('#status_other_personal_info').selectpicker("refresh"); 
      jQuery('#type_of_id_personal_info').selectpicker("refresh"); 
      $('#nationality_other_personal_info').val("");      
      $('#place_of_birth_other_personal_info').val("");     
      $('#idno_other_personal_info').val(""); 
    
        if(current > 1){
        current = current - 6;
        btnnext.trigger('click');
      }
        hideButtons(current);
    }); 
   
    // Back button click action   
    btnback.click(function(){   
      $('#registersuccess').hide();
    if(current == 6){
        $('#nextbutton').css('display','block');
    } 
        if(current > 1){
          
        current = current - 2;
             widget.show();       
            widget.not(':eq('+(current--)+')').hide();
            
        // btnnext.trigger('click');
      }
        hideButtons(current);
    }); 

    btnback2.click(function(){  


       var typeofdevicemain = jQuery('#typeofdevicemain').val();
            if(typeofdevicemain == 'EX01'){
         
              var checkstatus = jQuery('#device_modified_value').val();
              if(checkstatus == 'No'){
                current = current - 2;
                widget.show();       
                widget.not(':eq('+(current++)+')').hide();
                
              }else{
                    // current = current -;
              current = 1;
              widget.show();      
              widget.not(':eq('+(current++)+')').hide();
                    
                   
              }

            }else{
              $('#registersuccess').hide();
              current = current - 2;
              widget.show();      
              widget.not(':eq('+(current++)+')').hide();
            }
 
        // btnnext.trigger('click');
      
        hideButtons(current);
    }); 

 btnback4.click(function(){   
      //2 laptop
           $('#registersuccess').hide();
        current = current - 3;
             widget.show();       
            widget.not(':eq('+(current++)+')').hide();
           
        // btnnext.trigger('click');
    
        hideButtons(current);
    }); 
    

    btnback5.click(function(){  
      //2 laptop
      $('#registersuccess').hide();
        var typeofdevicemain = jQuery('#typeofdevicemain').val();
            if(typeofdevicemain == 'EX01'){
              var checkstatus = jQuery('#device_modified_value').val();
              if(checkstatus == 'No'){
                current = current - 3;
                widget.show();       
                widget.not(':eq('+(current++)+')').hide();
                
              }else{
                
                    // current = current -;
                    current = 3;
                    widget.show();       
                    widget.not(':eq('+(current++)+')').hide();
                    
                    $('#typeofdeviceDefaultyes').show();
                  }
            }else{
                current = 2;
                  
                    widget.show();       
                    widget.not(':eq('+(current++)+')').hide();
                    
                    $('#typeofdeviceDefaultyes').show();
              // jQuery('#typeofdeviceDefault').show();
            
            }

     
        // btnnext.trigger('click');
    
        hideButtons(current);
    }); 
    

    // btnback6.click(function(){  
    //  var checkstatus = jQuery('#device_modified_value').val();
    // if(checkstatus == 'No'){

    //     current = current - 4;
    //          widget.show();       
    //         widget.not(':eq('+(current++)+')').hide();
    //      }else{
  
    //     current = current - 3;
    //          widget.show();       
    //         widget.not(':eq('+(current++)+')').hide();
       
    //      }
    //     // btnnext.trigger('click');
   
    //     hideButtons(current);
    // });

        btnback6.click(function(){  
    $("#summaryfinalpage2 > tbody").empty();
    $('#registersuccess').hide();
      var typeofdevicemain = jQuery('#typeofdevicemain').val();
      if(typeofdevicemain == 'EX01'){
         var checkstatus = jQuery('#device_modified_value').val();
        if(checkstatus == 'No'){

            current = current - 4;
                 widget.show();       
                widget.not(':eq('+(current++)+')').hide();
             }else{
      
            current = current - 3;
                 widget.show();       
                widget.not(':eq('+(current++)+')').hide();
           
             }
      }else{
        
        current = current - 4;
                 widget.show();       
                widget.not(':eq('+(current++)+')').hide();
      }

    
        // btnnext.trigger('click');
   
        hideButtons(current);
    }); 


 


});

// Change progress bar action
setProgress = function(currstep){
  var percent = parseFloat(100 / widget.length) * currstep;
  percent = percent.toFixed();
  $(".progress-bar")
        .css("width",percent+"%");
        // .html(percent+"%");    
}

// Hide buttons according to the current step
hideButtons = function(current){
  var limit = parseInt(widget.length); 
  $(".action").hide();

  if(current < limit)
    btnnext.show(); 

  
    if(current > 2){
      btnback.hide();
      
      if (current == 5){
        btnnext.hide();
      }else{
        btnnext.show();
      }
    }

    
      if(current == 1 || current == -1){
       $('#registersuccess').hide();
        btnnext.hide();
        btnNextPage.show();
      }
  
      if(current == 2){
        $('#registersuccess').hide();
        btnback.show();
        btnnext.hide();
        next_2ndpage.show();
      }
      if(current == 3){
        $('#registersuccess').hide();
        btnback.hide();
        btnnext.hide();
      }
      if(current == 4){
        $('#registersuccess').hide();
        btnback.show();
        btn5thNextPage.show();
        btn5thpage_add.show();
        btnnext.hide();
      }

      if(current == 5){
       $('#registersuccess').hide();
        btnnext.hide();
        btn4thNextPage.show();
        view_4thpage.show();
        btn4thpage_add.show();
        btn5thNextPage.hide();
        btn5thpage_add.hide();
        btnback.hide();
      }

      if(current == 6){
        $('#registersuccess').hide();
        btnback.hide();
        btnnext.hide();
        btn5thNextPage.show();
        btn5thpage_add.show();
        
        var typeofdevicemain = jQuery('#typeofdevicemain').val();
            if(typeofdevicemain == 'EX01'){
              jQuery('.laptopDevice').hide();
              jQuery('.desktopDevice').show();
                  // jQuery('#typeofdeviceDefault').hide();
              btnback6.hide();
               back6th.show();  

            }else{
              jQuery('.desktopDevice').hide();
              jQuery('.laptopDevice').show();
               btnback6.show();
               back6th.hide();
              // jQuery('#typeofdeviceDefault').show();
            
            }

      }
  if(current == limit) {
   btnnext.hide();
    btnsubmit.show(); 
    btnAdd.show(); 
    btnback.hide(); 
    var typeofdevicemain = jQuery('#typeofdevicemain').val();
    if(typeofdevicemain == 'EX01'){
        back6th.show();
    }else{
      $('#registersuccess').hide();
      btnback6.show(); 
    }
   
   
  }
}



 function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}

// function desktopclick() {
//    $('input[name=type_of_device]').val("desktop");
//      document.getElementById("desktop").style.background='#53b947';
//      document.getElementById("desktop").style.color ='#ffffff';
//      document.getElementById("laptop").style.background='#C0C0C0';
//      document.getElementById("laptop").style.color ='#000000'; 
//     $('#laptopdiv').hide();

//  }

// function laptopclick() {
//    $('input[name=type_of_device]').val("laptop");
//    document.getElementById("desktop").style.background='#C0C0C0';
//    document.getElementById("desktop").style.color ='#000000';
//    document.getElementById("laptop").style.background='#53b947';
//    document.getElementById("laptop").style.color ='#ffffff';   
//    $('#laptopdiv').show();
// }

function vf_commafy(elementid, decimalplaces, roundupinteger) {
  var strNumber = document.getElementById(elementid).value;
  if(strNumber != '') {
    var intValue = '';
    var decimalValue = '';
    var cparts = new Array();
    if(strNumber.indexOf('.') >= 0) {
        cparts = strNumber.split('.');
    } else {
        cparts[0] = strNumber;
    }
    if(cparts[0].length > 3) {
      var comma_iterator = 0;
      for (var i = cparts[0].length-1; i>=0; i--) {
        intValue = cparts[0].charAt(i) + intValue;
        comma_iterator++;
        if(comma_iterator == 3) {
          comma_iterator = 0;
          if(i != 0) {
            intValue = ',' + intValue;
          }
        }
      }
    } else {
      intValue = cparts[0];
    }
    
    if(cparts[1] > 0) {
      decimalValue = cparts[1];
    }
    if(decimalplaces > 0) {
      if(decimalValue.length > decimalplaces) {
        var remainder = decimalValue.substr(decimalplaces)
        if( remainder >= ( 10**remainder.length / 2)) {
          decimalValue = decimalValue.substr(0, decimalplaces);
          decimalValue = parseInt(decimalValue) + 1;
        } else {
          decimalValue = decimalValue.substr(0, decimalplaces);
        }
      }
      else if(decimalValue.length < decimalplaces) {
        for( var i = decimalValue.length; i < decimalplaces; i++) {
          decimalValue = decimalValue + '0';
        }
      }
    }
    if(roundupinteger) {
        var roundingFactor = 5;
        if(decimalValue.length > 1) {
          roundingFactor = roundingFactor * (10 * (decimalValue.length - 1));
        }
        if(decimalValue >= roundingFactor) {
          intValue = parseInt(intValue) + 1;
        }
        decimalValue = '';
    } else {
      intValue = intValue + '.' + decimalValue;
    }
    document.getElementById(elementid).value = intValue;
  }
}

function vf_clean_number(elementid) {
  if(document.getElementById(elementid).value != '') {
    var ival = new String(document.getElementById(elementid).value);
    var oval = '';
    var oi = 0;
    for(oi=0;oi<ival.length;oi++) {
      if( !isNaN(ival.charAt(oi)) ) {
        if(ival.charAt(oi) != ' ') {
          oval += ival.substr(oi, 1);
        }
      } else {
        if(ival.charAt(oi)=='.') {
          oval += '.';
        }
      }
    }
  }
  document.getElementById(elementid).value = parseFloat(oval);
  return true;
}


function ReplaceNumberWithCommas(yourNumber) {
    //Seperates the components of the number
    var n= yourNumber.toString().split(".");
    //Comma-fies the first part
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //Combines the two sections
    return n.join(".");
}


var daysInMonth = [31,28,31,30,31,30,31,31,30,31,30,31],
    today = new Date(),
    // default targetDate is christmas
    targetDate = new Date(today.getFullYear(), 11, 25); 

setDate(targetDate);
setYears(3) // set the next five years in dropdown

$("#select-month").change(function() {
  var monthIndex = $("#select-month").val();
  setDays(monthIndex);
});

function setDate(date) {
  setDays(date.getMonth());
  $("#select-day").val(date.getDate());
  $("#select-month").val(date.getMonth());
  $(".select-year").val(date.getFullYear()); 
}

// make sure the number of days correspond with the selected month
function setDays(monthIndex) {
  var optionCount = $('#select-day option').length,
      daysCount = daysInMonth[monthIndex];
  
  if (optionCount < daysCount) {
    for (var i = optionCount; i < daysCount; i++) {
      $('#select-day')
        .append($("<option></option>")
        .attr("value", i + 1)
        .text(i + 1)); 
    }
  }
  else {
    for (var i = daysCount; i < optionCount; i++) {
      var optionItem = '#select-day option[value=' + (i+1) + ']';
      $(optionItem).remove();
    } 
  } 
}

function setYears(val) {
  var year = today.getFullYear();
  for (var i = 0; i < val; i++) {
      $('.select-year')
        .append($("<option></option>")
        .attr("value", year - i)
        .text(year - i)); 
    }
}

