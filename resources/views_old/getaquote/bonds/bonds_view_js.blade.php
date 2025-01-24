<script type="text/javascript">
    // DATE


    jQuery.noConflict();

    jQuery('#qdate').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        minDate: '1d',
        maxDate: '20y',
        yearRange: '1910:9999'
    }).on('change', function() {

        if (!jQuery('select').parent().hasClass('fake-select')) {
            jQuery('select').wrap('<span class="fake-select"></span>');
        }
    });



    jQuery('#date_incorp').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        // minDate: '1d',
        maxDate: '20y',
        yearRange: '1910:9999'
    }).on('change', function() {

        if (!jQuery('select').parent().hasClass('fake-select')) {
            jQuery('select').wrap('<span class="fake-select"></span>');
        }
    });



    jQuery('#date_bterm1').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        // minDate: '1d',
        maxDate: '20y',
        yearRange: '1910:9999'
    }).on('change', function() {

        if (!jQuery('select').parent().hasClass('fake-select')) {
            jQuery('select').wrap('<span class="fake-select"></span>');
        }
    });


    jQuery('#date_bterm2').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        // minDate: '1d',
        maxDate: '20y',
        yearRange: '1910:9999'
    }).on('change', function() {

        if (!jQuery('select').parent().hasClass('fake-select')) {
            jQuery('select').wrap('<span class="fake-select"></span>');
        }
    });

    // END OF date

    //-----------------------------------------------DELETE ---------------------------------//
    $(document).on('click', '.delete_remarks', function(){

        //var SITEURL = '{{URL::to('')}}';
        var remarks_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if(confirm("Are you sure want to delete?")){
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletefinancialremarks')}}"+"/"+remarks_id,
            success: function (data) {
                    getfinancialremarks(trans_id);
            }
        });
        }

        });

        $(document).on('click', '.delete_comments', function(){

        //var SITEURL = '{{URL::to('')}}';
        var remarks_id =  $(this).attr('id');
        var trans_id = $("input[name='transno']").val();
            alert(remarks_id);
        if(confirm("Are you sure want to delete?")){
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletecomments')}}"+"/"+remarks_id,
            success: function (data) {
                    getfinancialremarks(trans_id);
            }
        });
        }

        });



    $(document).on('click', '.delete_lossxp', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var lossxp_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletelossxp') }}" + "/" + lossxp_id + "/" + trans_id,
            success: function(data) {
                var table = jQuery('#lossxp_table').DataTable();
                table.ajax.reload();
            }
        });
    }

    });

    $(document).on('click', '.delete_owner', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var owner_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeleteowner') }}" + "/" + owner_id + "/" + trans_id,
            success: function(data) {
                var table = jQuery('#owner_table').DataTable();
                table.ajax.reload();
            }
        });
    }

    });

    $(document).on('click', '.delete_officer', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var officer_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeleteofficer') }}" + "/" + officer_id + "/" + trans_id,
            success: function(data) {
                var table = jQuery('#officer_table').DataTable();
                table.ajax.reload();
            }
        });
    }

    });


    $(document).on('click', '.delete_collateral', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var collateral_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletecollateral') }}" + "/" + collateral_id + "/" +
                trans_id,
            success: function(data) {
                var table = jQuery('#collateral_table').DataTable();
                table.ajax.reload();
            }
        });
    }

    });

    $(document).on('click', '.delete_signer', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var cosigner_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletesigner') }}" + "/" + cosigner_id + "/" + trans_id,
            success: function(data) {
                var table = jQuery('#cosigner_table').DataTable();
                table.ajax.reload();
            }
        });
    }

    });

    $(document).on('click', '.delete_project1', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var project1_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeleteproject1') }}" + "/" + project1_id + "/" +
                trans_id,
            success: function(data) {
                var table = jQuery('#project1_table').DataTable();
                table.ajax.reload();
            }
        });
    }

    });

    $(document).on('click', '.delete_project2', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var project2_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeleteproject2') }}" + "/" + project2_id + "/" +
                trans_id,
            success: function(data) {
                var table = jQuery('#project2_table').DataTable();
                table.ajax.reload();
            }
        });
    }

    });

    $(document).on('click', '.delete_attachment', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var attach_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeleteattachment') }}" + "/" + attach_id + "/" +
                trans_id,
            success: function(data) {
                $('#msg_div8').show();
                $('#res_message8').show();
                $('#res_message8').html("Delete Completed!");
                $('#msg_div8').removeClass('d-none');

                var table = jQuery('#attachment_table').DataTable();
                table.ajax.reload();

                setTimeout(function() {
                    $('#msg_div8').hide();
                }, 10000);
            }
        });
    }

    })

    $(document).on('click', '.delete_financial', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var attach_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletefinancial') }}" + "/" + attach_id + "/" + trans_id,
            success: function(data) {
                // var table = jQuery('#financial_table').DataTable();
                // table.ajax.reload();
            }
        });
    }

    });
    $(document).on('click', '.update_requirement', function() {
    var remarks_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    $.ajax({
        url: "{{ url('/get-quote/bondsgetquoterequirement') }}" + "/" + remarks_id + "/" + trans_id,
        success: function(data) {


            // Make sure the data is an array and not empty
            if (Array.isArray(data) && data.length > 0) {
                var responseData = data[0]; // Assuming you want the first object in the array

                var bondsRequirement = parseFloat(responseData.bonds_requirement);

                // Populate the modal field with the desired property from responseData
                $('#field1').val(responseData.id);
                $('#field2').val(responseData.bond_type);
                $('#field3').val(bondsRequirement.toFixed(2));
                $('#field4').val(responseData.proposed_retention);
                $('#field5').val(responseData.bond_amt);
                $('#field6').val(responseData.annual_rate);
                $('#field7').val(responseData.annual_premium);
                var dateParts = responseData.bond_term.split(' - ');
                var startDate = dateParts[0]; // "08/01/2023"
                var endDate = dateParts[1];   // "08/25/2023"
                $('#field8').val(startDate);
                $('#field10').val(endDate);
                $('#field9').val(responseData.term_premium);


                $('#contract_field').val($('#contract_price').val());
                $('#account_type_field').val(responseData.account_type);
                $('#policy_field').val(responseData.policy_type);

                // Show the modal
                $('#updateranual').modal('show');


            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
});


    $(document).on('click', '.delete_requirement', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var remarks_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are you sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletequoterequirement') }}" + "/" + remarks_id + "/" +
                trans_id,
            success: function(data) {
                var oTable = jQuery('#requirement_table').DataTable();
                oTable.ajax.reload();
            }
        });
    }


    });


    $(document).on('click', '.delete_principal', function() {
    //var SITEURL = '{{ URL::to('') }}';
    var principal_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are you sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeleteprincipal') }}" + "/" + principal_id + "/" +
                trans_id,
            success: function(data) {
                var oTable = jQuery('#principal_table').DataTable();
                oTable.ajax.reload();

                var oTable1 = jQuery('#change_table').DataTable();
                oTable1.ajax.reload();
            }
        });
    }


    });

    $(document).on('click', '.delete_guarantee', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var guarantee_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are you sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeleteguarantee') }}" + "/" + guarantee_id + "/" +
                trans_id,
            success: function(data) {
                var oTable = jQuery('#guarantee_table').DataTable();
                oTable.ajax.reload();

                var oTable1 = jQuery('#change_table').DataTable();
                oTable1.ajax.reload();
            }
        });
    }


    });


    $(document).on('click', '.delete_commnets', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var remarks_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are you sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletecomments') }}" + "/" + remarks_id,
            success: function(data) {
                getcomments(trans_id);
            }
        });
    }


    });

    $(document).on('click', '.delete_remarks', function() {

    //var SITEURL = '{{ URL::to('') }}';
    var remarks_id = $(this).attr('id');
    var trans_id = $("input[name='transno']").val();

    if (confirm("Are You sure want to delete?")) {
        $.ajax({
            url: "{{ url('/get-quote/bondsdeletefinancialremarks') }}" + "/" + remarks_id,
            success: function(data) {
                getfinancialremarks(trans_id);
            }
        });
    }

    });

    function getcomments(id) {
    var trans_id = $("input[name='transno']").val();
    $.ajax({
        type: 'get',
        url: "{{ url('/get-quote/bondscomments') }}" + "/" + trans_id,
        success: function(data) {
            console.log(data);
            $('#bond_comment').html(data);

        },
        error: function() {

        }
    });
    }


    function getfinancialremarks(id) {
    var trans_id = $("input[name='transno']").val();
    $.ajax({
        type: 'get',
        url: "{{ url('/get-quote/bondsfinancialremraks') }}" + "/" + trans_id,
        success: function(data) {

            $('#financial_remarks').html(data);

        },
        error: function() {

        }
    });
    }

    //-----------------------------------------END dELETE ------------------------------------//

    //  FOR ADDITION JS ACTION
$(document).ready(function() {
    $('#acode').change(function() {
        var agentName = $(this).find(':selected').text();
        var firstDashIndex = agentName.indexOf('-');
        if (firstDashIndex !== -1) {
            agentName = agentName.slice(firstDashIndex + 1).trim();
        }
        $('#agent').val(agentName);
    });
});



    // END of action
    // HIDDE TEXTFILED

    $('#bonds_01').hide()
    $('#bonds_02').hide()



    //HIDE TEXTFILED END

        // FOR BONDS
        $('#bonds_req01').hide();
        $('#bonds_req02').hide();

        $('#bonds_financial_highlight01').hide();
        $('#bonds_financial_highlight02').hide();

        $('#bonds_list_owner01').hide();
        $('#bonds_list_owner02').hide();

        $('#bonds_loss_exp01').hide();
        $('#bonds_loss_exp02').hide();

        $('#bond_collateral01').hide();
        $('#bond_collateral02').hide();



        $('#response_result').hide();

        $('#bonds_list_officer01').hide();
        $('#bonds_list_officer02').hide();

        $('#bond_principal01').hide();
        $('#bond_principal02').hide();

        $('#bond_cosigner01').hide();
        $('#bond_cosigner02').hide();

        $('#bond_corporate01').hide();
        $('#bond_corporate02').hide();

        $('#bond_completeproject01').hide();
        $('#bond_completeproject02').hide();

        $('#bond_attachment01').hide();
        $('#bond_attachment02').hide();



    /// START OF aJAX

    // jQuery(document).ready(function() {
    //             var table = jQuery('#project2_table').DataTable({
    //                 responsive: true,
    //                 searching: false,
    //                 paging: false,
    //                 dom: '<"pull-left col1"f><"pull-right col2"l>tip'

    //             });

    //         });



    jQuery(document).ready(function() {
    var trans_id = jQuery("input[name='transno']").val();
    var csrf_token = jQuery('meta[name="csrf-token"]').attr('content');
    var table = jQuery('#owner_table').DataTable({
                        searching: false,
                        paging: false,
                        info: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/get-quote/getbondsowner') }}/" + trans_id,
                            error: function(xhr, error, thrown) {
                                console.log('cocogen.com');
                            }
                        },
                        columns: [
                            // { data: 'id', name: 'id', visible: false },
                            { data: 'owner_name', name: 'owner_name' },
                            { data: 'owner_post', name: 'owner_post' },
                            {data: 'action', name: 'action', orderable: false, visible: str_view},
                        ],
                        columnDefs: [{ "width": "40px", "targets": [2] }]
                    });
                });


        jQuery(document).ready(function() {
            $('#sendform_owner').click(function(e) {
                e.preventDefault();
                var trans_id = $("input[name='transno']").val();
                var csrf_token = $('meta[name="csrf-token"]').attr('content');

                var errornumber = 0;
                if ($('#owner_name').val() === "") {
                    $('#owner_name').fieldErrorState();
                    errornumber = 1;
                } else {
                    $('#owner_name').fieldSuccessState();
                }

                if ($('#owner_post').val() === "") {
                    $('#owner_post').fieldErrorState();
                    errornumber = 1;
                } else {
                    $('#owner_post').fieldSuccessState();
                }

                if (errornumber === 1) {
                    return false;
                }

                $('#sendform_owner').html('Saving...');

                /* Submit form data using ajax */
                $.ajax({
                    url: "{{ url('/get-quote/addbondsowner')}}",
                    method: "POST",
                    data: $('#form_owner').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                    dataType: 'json',
                    success: function(response) {
                        var checkValowner = jQuery('.list_owner').val();

                        if ($.isEmptyObject(response.error)) {
                            $('#alert_msg2').hide();
                            // $('#sendform_owner').html('Add');
                            $('#msg_div2').show();
                            $('#bonds_list_owner01').show();
                            $('#req_listowner').html(response.success);
                            $('#msg_div2').removeClass('d-none');
                            $("input[name='owner_name']").val("");
                            $("input[name='owner_post']").val("");

                            $('#form_owner').trigger("reset");
                                var table = jQuery('#owner_table').DataTable();
                                table.ajax.reload();
                                jQuery('.list_owner').val('1');
                        } else {
                            $('#msg_div2').hide();
                            $('#bonds_list_owner02').show();
                            $('#sendform_owner').html('Add');
                            $('#req_listowner_failed').html(response.error);

                        }

                        setTimeout(function() {

                            $('#bond_list_of_owner').hide();
                        }, 10000);
                    }
                });
            });
        });


    jQuery(document).ready(function() {
        var table = jQuery('#lossxp_table').DataTable({
        searching: false,
        paging: false,
        info: false,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('/get-quote/getbondslossxp') }}"+"/"+trans_id,
            error: function(xhr, error, thrown) {
                console.log('cocogen.com');
            }
        },
        columns: [
        { data: 'id', name: 'id', visible: false},
        { data: 'loss_xp', name: 'loss_xp' },
        {data: 'action', name: 'action', orderable: false, visible: str_view},
        ],
        columnDefs: [{ "width": "40px", "targets": [2] }]
        });
    });


    $('#sendform_lossxp').click(function(e){

    e.preventDefault();
    jQuery.noConflict();
     var trans_id = $("input[name='transno']").val();
     var csrf_token = $('meta[name="csrf-token"]').attr('content');



     $(".validation_loss_xp_info").remove();
     $(".validation_loss_xp_info_error").remove();
     $(".validation_loss_xp_info_check_success").remove();


     if ($('#loss_xp').val() == "") {
         $("#loss_xp").after(
             "<div class='validation_loss_xp_info v-error-msg'>Loss Eperience is empty</div>"
         );
         $('#loss_xp').fieldErrorState();
         errornumber = 1;
     } else {
         $('#loss_xp').fieldSuccessState();
     }

    $('#sendform_lossxp').html('Saving...');
    /* Submit form data using ajax*/

    $.ajax({
       url: "{{ url('/get-quote/addbondslossxp')}}",
       method: "POST",
       data: $('#form_lossxp').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
       dataType: 'json',
       success: function(response){

         var checkValLoss = jQuery('.lossxp_check').val();
          //------------------------
          if($.isEmptyObject(response.error)){
             $('#alert_msg1').hide();
             $('#sendform_lossxp').html('Add');
             $('#msg_div').show();
             $('#bonds_loss_exp01').show();
             $('#req_lossexp').html(response.success);
             $('#msg_div').removeClass('d-none');
             $("input[name='loss_xp']").val("");

             $('#form_lossxp').trigger("reset");

                var table = jQuery('#lossxp_table').DataTable();
                table.ajax.reload();

           }else{
                $('#msg_div').hide();
                $('#bonds_loss_exp02').show();
                $('#req_lossexp').html(response.error);
                $('#sendform_lossxp').html('Add');

            }

          setTimeout(function(){
             $('#bond_loss_exp').hide();
             },10000);

          //--------------------------
       }

     });

    });

    $(document).ready(function() {

    var table = jQuery('#collateral_table').DataTable({
        searching: false,
        paging: false,
        info: false,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('/get-quote/getbondscollateral') }}"+"/"+trans_id,
            error: function(xhr, error, thrown) {
                console.log('cocogen.com');
            }
        },
        columns: [
            { data: 'id', name: 'id', visible: false},
            { data: 'collateral_type', name: 'collateral_type' },
            { data: 'collateral_item', name: 'collateral_item' },
            { data: 'collateral_value', name: 'collateral_value',},
            {data: 'action', name: 'action', orderable: false, visible: str_view},
        ],
        columnDefs: [{ "width": "40px", "targets": [2] }]
    });

    });




    $('#sendform_collateral').click(function(e){
        e.preventDefault();
       jQuery.noConflict();
       var trans_id = $("input[name='transno']").val();
       var csrf_token = $('meta[name="csrf-token"]').attr('content');


       var errornumber = 0;
        if ($('#collateral_type').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );fin_remarks
            $('#collateral_type').fieldErrorState();
            errornumber = 1;
        } else {
            $('#collateral_type').fieldSuccessState();
        }

        if ($('#collateral_item').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );fin_remarks
            $('#collateral_item').fieldErrorState();
            errornumber = 1;
        } else {
            $('#collateral_item').fieldSuccessState();
        }


        if ($('#collateral_value').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );fin_remarks
            $('#collateral_value').fieldErrorState();
            errornumber = 1;
        } else {
            $('#collateral_value').fieldSuccessState();
        }

        if (errornumber == 1) {
            return false;
        }
        $('#sendform_collateral').html('Saving...');

       /* Submit form data using ajax*/
       $.ajax({
          url: "{{ url('/get-quote/addbondscollateral')}}",
          method: "POST",
          data: $('#form_collateral').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
          dataType: 'json',
          success: function(response){
            var checkValcollation= jQuery('.collation').val();
             //------------------------
             if($.isEmptyObject(response.error)){
                $('#alert_msg4').hide();
                $('#sendform_collateral').html('Add');
                $('#bond_collateral01').show();
                $('#req_collateral').html(response.req_collateral);
                $('#msg_div4').removeClass('d-none');
                $("input[name='collateral_type']").val("");
                $("input[name='collateral_item']").val("");
                $("input[name='collateral_value']").val("");

                  $('#form_officer').trigger("reset");
                  var table = jQuery('#collateral_table').DataTable();
                        table.ajax.reload();
                    }else{
                            $('#msg_div4').hide();
                            $('#bond_collateral02').show();
                            $('#sendform_officer').html('Add');
                            $('#req_collateral_failed').html(response.error);

                        }


                setTimeout(function(){
                $('#bond_collateral').hide();
                },10000);

             //--------------------------
          }

        });

       });



       jQuery(document).ready(function() {
        var table = jQuery('#principal_table').DataTable({
            searching: false,
            paging: false,
            info: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/get-quote/getbondsprincipal') }}"+"/"+trans_id,
                error: function(xhr, error, thrown) {
                    console.log('cocogen.com');
                }
            },
            columns: [
                { data: 'id', name: 'id', visible: false},
                { data: 'id_type', name: 'id_type' },
                { data: 'id_no', name: 'id_no' },
                { data: 'principal_name', name: 'principal_name' },
                { data: 'principal_post', name: 'principal_post' },
                {data: 'action', name: 'action', orderable: false, visible: str_view},
                ],
            columnDefs: [{ "width": "40px", "targets": [2] }]
        });
        });


    $('#sendform_principal').click(function(e){
       e.preventDefault();
       jQuery.noConflict();
       var trans_id = $("input[name='transno']").val();
       var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var errornumber= 0;


       if ($('#id_type').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );fin_remarks
            $('#id_type').fieldErrorState();
            errornumber = 1;
        } else {
            $('#id_type').fieldSuccessState();
        }

        if ($('#id_no').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );fin_remarks
            $('#id_no').fieldErrorState();
            errornumber = 1;
        } else {
            $('#id_no').fieldSuccessState();
        }
        if ($('#principal_name').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );fin_remarks
            $('#principal_name').fieldErrorState();
            errornumber = 1;
        } else {
            $('#principal_name').fieldSuccessState();
        }
        if ($('#principal_post').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );fin_remarks
            $('#principal_post').fieldErrorState();
            errornumber = 1;
        } else {
            $('#principal_post').fieldSuccessState();
        }



        if (errornumber == 1) {
            return false;
        }

       $('#sendform_collateral').html('Saving...');

       /* Submit form data using ajax*/
       $.ajax({
          url: "{{ url('/get-quote/addbondsprincipal')}}",
          method: "POST",
          data: $('#form_principal').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
          dataType: 'json',
          success: function(response){
            var checkValprincipalsig= jQuery('.principal_sig').val();
             //------------------------
             if($.isEmptyObject(response.error)){
                $('#alert_msg71').hide();
                // $('#sendform_principal').html('Add');
                $('#bond_principal01').show();
                $('#req_principal').html(response.success);
                $('#msg_div71').removeClass('d-none');
                $("input[name='id_type']").val("");
                $("input[name='id_no']").val("");
                $("input[name='principal_name']").val("");
                $("input[name='principal_post']").val("");

                  $('#form_principal').trigger("reset");

                  var table = jQuery('#principal_table').DataTable();
                                table.ajax.reload();

                }else{
                            $('#msg_div71').hide();
                              $('#bond_principal02').show();
                            $('#sendform_principal').html('Add');
                            $('#req_principal_failed').html(response.error);

                        }

            setTimeout(function(){
                $('#bond_principal').hide();
                },10000);

             //--------------------------
          }

        });

       });



        jQuery(document).ready(function() {
    var trans_id = $("input[name='transno']").val();
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var table = jQuery('#cosigner_table').DataTable({
            searching: false,
            paging: false,
            info: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/get-quote/getbondssigner') }}"+"/"+trans_id,
                error: function(xhr, error, thrown) {
                    console.log('cocogen.com');
                }
            },
            columns: [
                { data: 'id', name: 'id', visible: false},
                { data: 'cosigner_id_type', name: 'cosigner_id_no' },
                { data: 'cosigner_id_no', name: 'cosigner_id_no' },
                { data: 'cosigner_name', name: 'cosigner_name' },
                { data: 'cosigner_position', name: 'cosigner_position' },
                { data: 'cosigner_property', name: 'cosigner_property' },
                { data: 'cosigner_property_tct', name: 'cosigner_property_tct' },
                { data: 'cosigner_property_location', name: 'cosigner_property_location' },
                {
                    data: 'cosigner_property_size',
                    name: 'cosigner_property_size',
                    render: function(data, type, full, meta) {
                        return data + ' sqm';
                    }
                },
                { data: 'cosigner_amt', name: 'cosigner_amt', },
                {data: 'action', name: 'action', orderable: false, visible: str_view},
            ],
            columnDefs: [{ "width": "40px", "targets": [2] }]
        });
    });

            $('#sendform_signer').click(function(e){

            e.preventDefault();
            jQuery.noConflict();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var errornumber = 0;

            if ($('#cosigner_id_type').val() == "") {
                // $("#policy_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );fin_remarks
                $('#cosigner_id_type').fieldErrorState();
                errornumber = 1;
            } else {
                $('#cosigner_id_type').fieldSuccessState();
            }

            if ($('#cosigner_id_no').val() == "") {
                // $("#policy_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );fin_remarks
                $('#cosigner_id_no').fieldErrorState();
                errornumber = 1;
            } else {
                $('#cosigner_id_no').fieldSuccessState();
            }

            if ($('#cosigner_name').val() == "") {
                // $("#policy_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );fin_remarks
                $('#cosigner_name').fieldErrorState();
                errornumber = 1;
            } else {
                $('#cosigner_name').fieldSuccessState();
            }


            if ($('#cosigner_position').val() == "") {
                // $("#policy_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );fin_remarks
                $('#cosigner_position').fieldErrorState();
                errornumber = 1;
            } else {
                $('#cosigner_position').fieldSuccessState();
            }

            if ($('#cosigner_property').val() == "") {
                // $("#policy_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );fin_remarks
                $('#cosigner_property').fieldErrorState();
                errornumber = 1;
            } else {
                $('#cosigner_property').fieldSuccessState();
            }

            if ($('#cosigner_amt').val() == "") {
                // $("#policy_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );fin_remarks
                $('#cosigner_amt').fieldErrorState();
                errornumber = 1;
            } else {
                $('#cosigner_amt').fieldSuccessState();
            }




            if (errornumber == 1) {
                return false;
            }

            $('#sendform_signer').html('Saving...');

            /* Submit form data using ajax*/
            $.ajax({
            url: "{{ url('/get-quote/addbondssigner')}}",
            method: "POST",
            data: $('#form_cosigner').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
            dataType: 'json',
            success: function(response){
                var checkValconsig= jQuery('.cosig').val();
                //------------------------
                if($.isEmptyObject(response.error)){
                    $('#alert_msg5').hide();
                    $('#sendform_signer').html('Add');
                    $('#msg_div5').show();
                    $('#req_cosigner').show();
                    $('#req_cosigner_failed').html(response.success);
                    $('#msg_div5').removeClass('d-none');
                    $("input[name='cosigner_name']").val("");
                    $("input[name='cosigner_property']").val("");
                    $("input[name='cosigner_amt']").val("");

                    $('#form_cosigner').trigger("reset");
                    var table = jQuery('#cosigner_table').DataTable();
                    table.ajax.reload();
                    }else{
                                $('#msg_div5').hide();
                                $('#bond_cosigner02').show();
                                $('#sendform_signer').html('Add');
                                $('#res_error5').html(response.error);

                            }
                setTimeout(function(){
                    $('#bond_cosigner').hide();
                    },10000);
                 }

            });

        });
    jQuery(document).ready(function() {
        var trans_id = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var table = jQuery('#guarantee_table').DataTable({
                            searching: false,
                            paging: false,
                            info: false,
                            responsive: true,
                            processing: true,
                            serverSide: true,
                            ajax: {
                                url: "{{ url('/get-quote/getbondsguarantee') }}"+"/"+trans_id,
                                error: function(xhr, error, thrown) {
                                    console.log('cocogen.com - guarantee');
                                }
                            },
                            columns: [
                                    { data: 'id', name: 'id', visible: false},
                                    { data: 'id_type2', name: 'id_type2' },
                                    { data: 'id_no2', name: 'id_no2' },
                                    { data: 'guarantee_name', name: 'guarantee_name' },
                                    { data: 'guarantee_post', name: 'guarantee_post' },
                                    {data: 'action', name: 'action', orderable: false, visible: str_view},
                                ],
                        columnDefs: [{ "width": "40px", "targets": [5] }]
                        });
                    });


    $('#sendform_guarantee').click(function(e){
       e.preventDefault();
       jQuery.noConflict();
       var trans_id = $("input[name='transno']").val();
       var csrf_token = $('meta[name="csrf-token"]').attr('content');

       var errornumber = 0;

    if ($('#id_type2').val() == "") {
         // $("#policy_type").after(
         //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
         // );fin_remarks
         $('#id_type2').fieldErrorState();
         errornumber = 1;
     } else {
         $('#id_type2').fieldSuccessState();
     }

     if ($('#id_no2').val() == "") {
         // $("#policy_type").after(
         //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
         // );fin_remarks
         $('#id_no2').fieldErrorState();
         errornumber = 1;
     } else {
         $('#id_no2').fieldSuccessState();
     }

     if ($('#guarantee_name').val() == "") {
         // $("#policy_type").after(
         //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
         // );fin_remarks
         $('#guarantee_name').fieldErrorState();
         errornumber = 1;
     } else {
         $('#guarantee_name').fieldSuccessState();
     }


     if ($('#guarantee_post').val() == "") {
         // $("#policy_type").after(
         //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
         // );fin_remarks
         $('#guarantee_post').fieldErrorState();
         errornumber = 1;
     } else {
         $('#guarantee_post').fieldSuccessState();
     }


     if (errornumber == 1) {
         return false;
     }

       $('#sendform_guarantee').html('Saving...');

       /* Submit form data using ajax*/

        $.ajax({
                url: "{{ url('/get-quote/addbondsguarantee')}}",
                method: "POST",
                data: $('#form_guarantee').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response){
                    var checkValconsigpersonal= jQuery('.cosigpersonal').val();
                    //------------------------
                    if($.isEmptyObject(response.error)){
                        $('#alert_msg73').hide();
                        $('#sendform_guarantee').html('Add');
                        $('#bond_corporate01').show();
                        $('#req_corporate').html(response.success);
                        $('#msg_div73').removeClass('d-none');
                        $("input[name='id_type2']").val("");
                        $("input[name='id_no2']").val("");
                        $("input[name='guarantee_name']").val("");
                        $("input[name='guarantee_post']").val("");

                        $('#form_cosigner').trigger("reset");
                        if (checkValconsigpersonal === '') {
                                var table = jQuery('#guarantee_table').DataTable({
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    responsive: true,
                                    processing: true,
                                    serverSide: true,
                                    ajax: {
                                        url: "{{ url('/get-quote/getbondsguarantee') }}"+"/"+trans_id,
                                        error: function(xhr, error, thrown) {
                                            alert("An error occurred while loading data: " +
                                                error);
                                        }
                                    },
                                    columns: [
                                            { data: 'id', name: 'id', visible: false},
                                            { data: 'id_type2', name: 'id_type2' },
                                            { data: 'id_no2', name: 'id_no2' },
                                            { data: 'guarantee_name', name: 'guarantee_name' },
                                            { data: 'guarantee_post', name: 'guarantee_post' },
                                            {data: 'action', name: 'action', orderable: false, visible: str_view},
                                        ],
                                columnDefs: [{ "width": "40px", "targets": [5] }]
                                });
                                jQuery('.cosigpersonal').val('1');
                                    } else {

                                        var table = jQuery('#guarantee_table').DataTable();
                                        table.ajax.reload();
                                        jQuery('.cosigpersonal').val('1');
                                    }
                        }else{
                                    $('#bond_corporate02').show();
                                    $('#sendform_signer').html('Add');
                                    $('#req_corporate_failed').html(response.error);

                                }
                    //--------------------------
                    setTimeout(function(){
                        $('#bond_corporate').hide();
                        },10000);

                }

                });
       });




    // SAVING OF NATURE REQUEST
        $('#sendform_update').click(function(e) {

        e.preventDefault();
        var trans_id = $("input[name='transno']").val();
        $('#sendform_update').html('Saving...');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        /* Submit form data using ajax*/
        $.ajax({
            url: "{{ url('/get-quote/bonds-quoteupdate') }}",
            method: "POST",
            data: $('#form_nature').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
            dataType: 'json',
            success: function(response) {

                //------------------------
                if ($.isEmptyObject(response.error)) {
                    $('#bonds_02').hide();
                    $('#nature_req').show();
                    $('#bonds_01').show();
                    $('#bonds_mesage01').text(response.success);

                    $("#firstPageMessagetext").text(response.success);
                                    // Show the modal
                                    $("#firstPageMessage").show();
                                    // Close the modal when the close button is clicked
                                    $(".close").click(function() {
                                    $("#firstPageMessage").hide();
                                    });
                                    $(".closebtn").click(function() {
                                        $("#firstPageMessage").hide();
                                    });

                    setTimeout(function() {
                        $('#nature_req').hide();
                    }, 10000);

                } else {
                    $('#bonds_01').hide();
                    $('#nature_req').show();
                    $('#bonds_02').show();
                    $('#sendform_update').html('Save Changes');
                    $('#bonds_mesage02').text(response.error);

                    setTimeout(function() {
                        $('#nature_req').hide();
                    }, 10000);


                }
                //--------------------------
            }

        });

    });



    jQuery(document).ready(function() {
        var trans_id = jQuery("input[name='transno']").val();
            var table = jQuery('#attachment_table').DataTable({
                    searching: false,
                    paging: false,
                    info: false,
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ url('/get-quote/getbondsattachment') }}"+"/"+trans_id,
                        error: function(xhr, error, thrown) {
                            alert("An error occurred while loading data: " +
                                error);
                        }
                    },
                    columns: [
                        { data: 'id', name: 'id', visible: false},
                        { data: 'filename2', name: 'filename2', render:function(data, type, row){
                            return "<a href='{{url('/get-quote/view/bonds/')}}/" + row.filename2 +"/"+ row.id +"' target='_blank' >" + row.filename2 + "</a>"
                        } },
                        {data: 'action', name: 'action', orderable: false, visible: str_view},
                    ],
                columnDefs: [{ "width": "40px", "targets": [2] }]
                });

            });

            $('#sendform_attachment').click(function(e){
             e.preventDefault();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var formData = new FormData($('#form_attachment')[0]);

            var errornumber = 0;
            if ($('#filename').val() == "") {
                    // $("#policy_type").after(
                    //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                    // );fin_remarks
                    $('#filename').fieldErrorState();
                    errornumber = 1;
                } else {
                    $('#filename').fieldSuccessState();
                }

                if (errornumber == 1) {
                    return false;
                }

            formData.append('trans_id', trans_id);
            formData.append('_token', csrf_token);

            /* Submit form data using ajax*/
                $.ajax({
                url: "{{ url('/get-quote/addbondsattachment')}}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response){
                    var checkValproj= jQuery('.attchment').val();
                    //------------------------
                    if($.isEmptyObject(response.error)){
                        $('#alert_msg8').hide();
                        $('#sendform_attachment').html('Upload');
                        $('#msg_div8').show();
                        $('#bond_attachment01').show();
                        $('#req_attach').html(response.success);
                        $('#msg_div8').removeClass('d-none');

                        $('#form_attachment').trigger("reset");
                        if (checkValproj === '') {
                                var table = jQuery('#attachment_table').DataTable({
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    responsive: true,
                                    processing: true,
                                    serverSide: true,
                                    ajax: {
                                        url: "{{ url('/get-quote/getbondsattachment') }}"+"/"+trans_id,
                                        error: function(xhr, error, thrown) {
                                            console.log('cocogen.com - attacment');
                                        }
                                    },
                                    columns: [
                                        { data: 'id', name: 'id', visible: false},
                                        { data: 'filename2', name: 'filename2', render:function(data, type, row){
                                            return "<a href='{{url('/get-quote/view/bonds/')}}/" + row.filename2 +"/"+ row.id +"' target='_blank' >" + row.filename2 + "</a>"
                                        } },
                                        {data: 'action', name: 'action', orderable: false, visible: str_view},
                                    ],
                                columnDefs: [{ "width": "40px", "targets": [2] }]
                                });
                                    jQuery('.attchment').val('1');
                                    } else {

                                        var table = jQuery('#attachment_table').DataTable();
                                        table.ajax.reload();
                                        jQuery('.attchment').val('1');
                                    }
                        }else{
                                    $('#msg_div5').hide();
                                    $('#bond_attachment01').show();
                                    $('#sendform_signer').html('Add');
                                    $('#req_attach_failed').html(response.error);

                                }
                    //--------------------------
                    setTimeout(function(){
                        $('#bond_attachment').hide();
                        },10000);

                }

                });

            });


       jQuery(document).ready(function() {
        var trans_id = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var table = jQuery('#project1_table').DataTable({
            searching: false,
            paging: false,
            info: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/get-quote/getbondsprojects1') }}"+"/"+trans_id,
                error: function(xhr, error, thrown) {
                    console.log('cocogen.com - Bonds Project');
                }
            },
            columns: [
                        { data: 'id', name: 'id', visible: false},
                        { data: 'project_name', name: 'project_name' },
                        {data: 'action', name: 'action', orderable: false, visible: str_view},
                    ],
            columnDefs: [{ "width": "40px", "targets": [2] }]
        });
    });

       jQuery(document).ready(function() {
        var trans_id = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var table = jQuery('#project2_table').DataTable({
            searching: false,
            paging: false,
            info: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/get-quote/getbondsprojects2') }}"+"/"+trans_id,
                error: function(xhr, error, thrown) {
                    console.log('cocogen.com - Bonds Project2');
                }
            },
            columns: [
                        { data: 'id', name: 'id', visible: false},
                        { data: 'project_name2', name: 'project_name2' },
                        {data: 'action', name: 'action', orderable: false, visible: str_view},
                    ],
            columnDefs: [{ "width": "40px", "targets": [2] }]
        });
    });





        $('#sendform_project1').click(function(e){
            e.preventDefault();
            jQuery.noConflict();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var errornumber=0;
        if ($('#project_name').val() == "") {

            $('#project_name').fieldErrorState();
            errornumber = 1;
        } else {
            $('#project_name').fieldSuccessState();
        }

        if (errornumber == 1) {
            return false;
        }

        $('#sendform_project1').html('Saving...');
        /* Submit form data using ajax*/
            $.ajax({
            url: "{{ url('/get-quote/addbondsproject1')}}",
            method: "POST",
            data: $('#form_project1').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
            dataType: 'json',
            success: function(response){
                var checkValproj= jQuery('.proj').val();
                //------------------------
                if($.isEmptyObject(response.error)){
                    $('#sendform_project1').html('Add');
                    $('#msg_div6').show();
                    $('#bond_completeproject01').show();
                    $('#req_complete_proj').html(response.success);
                    $('#msg_div6').removeClass('d-none');
                    $("input[name='project_name']").val("");

                    $('#form_project1').trigger("reset");
                    if (checkValproj === '') {
                        var table = jQuery('#project1_table').DataTable({
                                searching: false,
                                paging: false,
                                info: false,
                                responsive: true,
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: "{{ url('/get-quote/getbondsprojects1') }}"+"/"+trans_id,
                                    error: function(xhr, error, thrown) {
                                        console.log('cocogen.com - project 1');
                                    }
                                },
                                columns: [
                                            { data: 'id', name: 'id', visible: false},
                                            {
                                            data: 'project_name',
                                            name: 'project_name',
                                            render: function(data, type, row) {
                                                if (type === 'display' && data.length > 95) {
                                                return data.replace(/(.{95})/g, '$1<br>');
                                                }
                                                return data;
                                            }
                                            },
                                            {data: 'action', name: 'action', orderable: false, visible: str_view},
                                        ],
                                columnDefs: [{ "width": "40px", "targets": [2] }]
                            });
                                jQuery('.proj').val('1');
                                } else {

                                    var table = jQuery('#project1_table').DataTable();
                                    table.ajax.reload();
                                    jQuery('.proj').val('1');
                                }
                    }else{
                                $('#msg_div5').hide();
                                $('#bond_completeproject02').show();
                                $('#sendform_signer').html('Add');
                                $('#req_complete_proj_failed').html(response.error);

                            }
                //--------------------------
                setTimeout(function(){
                    $('#bond_completeproject').hide();
                    },10000);

            }

            });

        });

        $('#sendform_project2').click(function(e){
            e.preventDefault();
            jQuery.noConflict();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var errornumber=0;
        if ($('#project_name2').val() == "") {

            $('#project_name2').fieldErrorState();
            errornumber = 1;
        } else {
            $('#project_name2').fieldSuccessState();
        }

        if (errornumber == 1) {
            return false;
        }

        $('#sendform_project2').html('Saving...');
        /* Submit form data using ajax*/
            $.ajax({
            url: "{{ url('/get-quote/addbondsproject1')}}",
            method: "POST",
            data: $('#form_project1').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
            dataType: 'json',
            success: function(response){
                var checkValproj2= jQuery('.proj').val();
                //------------------------
                if($.isEmptyObject(response.error)){
                    $('#sendform_project2').html('Add');
                    $('#msg_div6').show();
                    $('#bond_completeproject02').show();
                    $('#req_complete_proj2').html(response.success);
                    $('#msg_div6').removeClass('d-none');
                    $("input[name='project_name2']").val("");

                    $('#form_project2').trigger("reset");
                    if (checkValproj2 === '') {
                        var table = jQuery('#project2_table').DataTable({
                                searching: false,
                                paging: false,
                                info: false,
                                responsive: true,
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: "{{ url('/get-quote/getbondsprojects2') }}"+"/"+trans_id,
                                    error: function(xhr, error, thrown) {
                                        console.log('cocogen.com - project 1');
                                    }
                                },
                                columns: [
                                            { data: 'id', name: 'id', visible: false},
                                            {
                                            data: 'project_name2',
                                            name: 'project_name2',
                                            render: function(data, type, row) {
                                                if (type === 'display' && data.length > 95) {
                                                return data.replace(/(.{95})/g, '$1<br>');
                                                }
                                                return data;
                                            }
                                            },
                                            {data: 'action', name: 'action', orderable: false, visible: str_view},
                                        ],
                                columnDefs: [{ "width": "40px", "targets": [2] }]
                            });
                                jQuery('.proj2').val('1');
                                } else {

                                    var table = jQuery('#project2_table').DataTable();
                                    table.ajax.reload();
                                    jQuery('.proj2').val('1');
                                }
                    }else{
                                $('#msg_div5').hide();
                                $('#bond_completeproject02').show();
                                $('#sendform_project2').html('Add');
                                $('#req_complete_proj_failed2').html(response.error);

                            }
                //--------------------------
                setTimeout(function(){
                    $('#bond_completeproject2').hide();
                    },10000);

            }

            });

        });


            $(document).ready(function() {
                $("#endoresePolNomodule").hide();
            $('.principal_dropdown_group').hide();
            $('input[name="client"]').change(function() {
                if ($(this).val() === "Old") {
                    $('#newmodule').parent().append(
                        '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="qrequest" id="endorsement" value="endorsement"><label class="form-check-label" for="endorsement">Endorsement</label></div>'
                        );
                    $('.principal_dropdown_group').show();
                    $('.principal_text_group').hide();
                    $('.dropdown-menu.inner').attr('id', 'change_width');

                    $('#display_old').show();
                    var previousValue = $("input[name='qrequest']:checked").val();

                    $("input[name='qrequest']").click(function() {
                        var currentValue = $(this).val();
                        if (currentValue !== previousValue) {
                        if ($("#endorsement").is(":checked")) {
                            $("#endoresePolNomodule").show();
                        } else {
                            $("#endoresePolNomodule").hide();
                        }
                        previousValue = currentValue;
                        }
                    });
                } else {
                    $('#endorsement').parent().remove();
                    $('.principal_dropdown_group').hide();
                    $('.principal_text_group').show();
                    $('.dropdown-menu.inner').removeAttr('id');
                    $('#display_old').hide();
                    $("#endoresePolNomodule").hide();
                }
            });
        });

        // NATURAL REQUIEST
     $(document).ready(function() {
            $('.principal_dropdown_group').hide();
            $('input[name="client"]').change(function() {
                if ($(this).val() === "Old") {
                    $('#endorsement_show').show();
                    $('.principal_dropdown_group').show();
                    $('.principal_text_group').hide();
                    $('.dropdown-menu.inner').attr('id', 'change_width');
                    $('#display_old').show();
                    var previousValue = $("input[name='qrequest']:checked").val();
                    $("input[name='qrequest']").click(function() {
                        var currentValue = $(this).val();
                        if (currentValue !== previousValue) {
                            if ($("#endorsement").is(":checked")) {
                                $("#endoresePolNomodule").show();
                            } else {
                                $("#endoresePolNomodule").hide();
                            }
                            previousValue = currentValue;
                        }
                    });
                } else {
                    $('input[name="qrequest"]').prop('checked', false);
                    $('#endorsement_show').hide();
                    $('#endorsement_show_text').hide();
                    $('#endorsement_show_text').val('');
                    // $('#endorsement').parent().remove();
                    $('.principal_dropdown_group').hide();
                    $('.principal_text_group').show();
                    $('.dropdown-menu.inner').removeAttr('id');
                    $('#display_old').hide();
                    $("#endoresePolNomodule").hide();
                }
            });
        });
        // END


        var _token = jQuery('input[name="_token"]').val();
        var existingValue =jQuery('#obligeehidden').val();
        //2nd changes // OBLIGEE API
        $.ajax({
            url: "{{ url('/get-quote/get_obligee_api') }}",
            method: 'POST',
            data: { _token: _token },
            success: function (data1) {

                $.ajax({
                  url: "{{ url('/get-quote/get_obligee2_api') }}",
                  method: 'POST',
                  data: { _token: _token },
                  success: function (data2) {

                    // Merge the data from both tables
                    var mergedData = data1.concat(data2);

                    // Filter out null values and sort the merged data based on a specific property (e.g., 'obligee_name')
                    mergedData = mergedData.filter(function(obligee) {
                      return obligee.obligee_name !== null;
                    }).sort(function(a, b) {
                      return a.obligee_name.localeCompare(b.obligee_name);
                    });

                    // Get the select element by its id
                    var selectElement = $('#obligee');

                    // Clear the existing options (if any)
                    selectElement.empty();

                    // Add the default option
                    selectElement.append('<option value="">- Select -</option>');

                    // Process the sorted merged data and add it to the dropdown
                    mergedData.forEach(function (obligee) {
                      var optionHtml = '<option value="' + obligee.obligee_name + '"';

                      // Check if the current option matches the existing value
                      if (obligee.obligee_name === existingValue) {
                        optionHtml += ' selected';
                      }

                      optionHtml += '>' + obligee.obligee_name + '</option>';
                      selectElement.append(optionHtml);
                    });
                  }
                });
            }
    });




    jQuery(document).ready(function() {
                var table = jQuery('#financial_table').DataTable({
                    responsive: true,
                    searching: false,
                    paging: false,
                    dom: '<"pull-left col1"f><"pull-right col2"l>tip'

                });

            });


    jQuery(document).ready(function() {
        $('#financial_label').keyup(function() {
          $('#fist_label').text($('#financial_label').val());
        });
        $('#financial_label2').keyup(function() {
          $('#second_label').text($('#financial_label2').val());
        });


    $('#sendform_financial').click(function(e) {
        e.preventDefault();
        jQuery.noConflict();

        var errornumber = 0;

        $(".validation_financial_label_info").remove();
        $(".validation_financial_label_check_error").remove();
        $(".validation_financial_label_check_success").remove();

        $(".validation_financial_label2_info").remove();
        $(".validation_financial_label2_check_error").remove();
        $(".validation_financial_label2_check_success").remove();


        $(".validation_gross_income_info").remove();
        $(".validation_gross_income_check_error").remove();
        $(".validation_financial_label2_check_success").remove();


        if ($('#financial_label').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#financial_label').fieldErrorState();
            errornumber = 1;
        } else {
            $('#financial_label').fieldSuccessState();
        }

        if ($('#financial_label2').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#financial_label2').fieldErrorState();
            errornumber = 1;
        } else {
            $('#financial_label2').fieldSuccessState();
        }

        if ($('#asset').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#asset').fieldErrorState();
            errornumber = 1;
        } else {
            $('#asset').fieldSuccessState();
        }

        if ($('#asset_previous').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#asset_previous').fieldErrorState();
            errornumber = 1;
        } else {
            $('#asset_previous').fieldSuccessState();
        }

        if ($('#gross_income').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#gross_income').fieldErrorState();
            errornumber = 1;
        } else {
            $('#gross_income').fieldSuccessState();
        }

        if ($('#gross_income_previous').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#gross_income_previous').fieldErrorState();
            errornumber = 1;
        } else {
            $('#gross_income_previous').fieldSuccessState();
        }

        if ($('#liabilities').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#liabilities').fieldErrorState();
            errornumber = 1;
        } else {
            $('#liabilities').fieldSuccessState();
        }

        if ($('#liabilities_previous').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#liabilities_previous').fieldErrorState();
            errornumber = 1;
        } else {
            $('#liabilities_previous').fieldSuccessState();
        }

        if ($('#net_income').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#net_income').fieldErrorState();
            errornumber = 1;
        } else {
            $('#net_income').fieldSuccessState();
        }

        if ($('#net_income_previous').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#net_income_previous').fieldErrorState();
            errornumber = 1;
        } else {
            $('#net_income_previous').fieldSuccessState();
        }

        if ($('#networth').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#networth').fieldErrorState();
            errornumber = 1;
        } else {
            $('#networth').fieldSuccessState();
        }

        if ($('#networth_previous').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#networth_previous').fieldErrorState();
            errornumber = 1;
        } else {
            $('#networth_previous').fieldSuccessState();
        }

        if ($('#paid_up_capital').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#paid_up_capital').fieldErrorState();
            errornumber = 1;
        } else {
            $('#paid_up_capital').fieldSuccessState();
        }

        if ($('#paid_up_capital_previous').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#paid_up_capital_previous').fieldErrorState();
            errornumber = 1;
        } else {
            $('#paid_up_capital_previous').fieldSuccessState();
        }


        if ($('#retained').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#retained').fieldErrorState();
            errornumber = 1;
        } else {
            $('#retained').fieldSuccessState();
        }
        if ($('#retained_previous').val() == "") {
            // $("#policy_type").after(
            //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
            // );
            $('#retained_previous').fieldErrorState();
            errornumber = 1;
        } else {
            $('#retained_previous').fieldSuccessState();
        }
        if (errornumber == 1) {
            return false;
        }

        $('#sendform_financial').html('Saving...');
        // $('#financial_table').on('click', 'tbody td:not(:first-child)', function(e) {
        //     editor.inline(this);
        // });
        /* Submit form data using ajax*/
        var trans_id = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ url('/get-quote/addbondsfinancial') }}",
            method: "POST",
            data: $('#financial_higlight').serialize() + "&trans_id=" +
                trans_id + "&_token=" + csrf_token,
            dataType: 'json',
            success: function(response) {

                var checkValFinan = jQuery('.addnewfinance').val();
                //------------------------
                if ($.isEmptyObject(response.error)) {
                    $('#alert_msg9').hide();
                    $('#sendform_financial').html('Update');
                    $('#msg_div9').show();

                    $('#bond_financial_highlight').show();
                    $('#bonds_financial_highlight01').show();
                    $('#req_finance').html(response.success);
                    $('#msg_div9').removeClass('d-none');
                    //$("input[name='fin_type']").val("");
                    //$("input[name='finl_year']").val("");
                    //$("input[name='fin_amt']").val("");

                    $('#form_financial').trigger("reset");

                } else {
                    $('#msg_div9').hide();
                    $('#sendform_financial').html('Update');
                    $('#bonds_financial_highlight02').show();
                    $('#req_finance_failed').html(response.error);

                }


                setTimeout(function() {
                    $('#bond_financial_highlight').hide();
                }, 10000);

                //--------------------------
            }

        });

    });
    });

        $(document).ready(function() {
              $('#sendform_distribution').click(function(e){
                  e.preventDefault();
                  jQuery.noConflict();

              var trans_id = $("input[name='transno']").val();
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              // $('#sendform_officer').html('Update...');
              var errornumber = 0;

                  if ($('#in_force_policies').val() == "") {
                      $('#in_force_policies').fieldErrorState();
                      errornumber = 1;
                  } else {

                      $('#in_force_policies').fieldSuccessState();
                  }
                  if ($('#in_force_policies1').val() == "") {
                      $('#in_force_policies1').fieldErrorState();
                      errornumber = 1;
                  } else {

                      $('#in_force_policies1').fieldSuccessState();
                  }
                  if ($('#in_force_policies2').val() == "") {
                      $('#in_force_policies2').fieldErrorState();
                      errornumber = 1;
                  } else {

                      $('#in_force_policies2').fieldSuccessState();
                  }

                  if ($('#bonds_applied').val() == "") {
                      $('#bonds_applied').fieldErrorState();
                      errornumber = 1;
                  } else {

                      $('#bonds_applied').fieldSuccessState();
                  }

                  if ($('#bonds_applied1').val() == "") {
                      $('#bonds_applied1').fieldErrorState();
                      errornumber = 1;
                  } else {

                      $('#bonds_applied1').fieldSuccessState();
                  }

                  if ($('#bonds_applied2').val() == "") {
                      $('#bonds_applied2').fieldErrorState();
                      errornumber = 1;
                  } else {

                      $('#bonds_applied2').fieldSuccessState();
                  }

                      if (errornumber == 1) {
                          $('#total_3').val('');
                          return false;
                      }
                      $('#sendform_distribution').html('Saving...');
                      jQuery.ajax({
                          url: "{{ url('/get-quote/adddistribution')}}",
                          method: "POST",
                          data: $('#form_tsi').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
                          //   dataType: 'json',
                          success: function(response){
                              $('#response_result').show();
                              $('#sendform_distribution').html('Add');
                              $('response_result').show();
                              $('#response').text(response.message);
                              //------------------------
                              setTimeout(function(){
                              $('#response_result').hide();
                              },10000);
                          }

                      });
              })
          });


        $(document).ready(function() {


        // GET THE TOTAL OF TSI RETENTION SHARE
        $('input[name="in_force_policies"], input[name="bonds_applied"]').keyup(function() {
            var inForcePolicies = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
            var bondsApplied = parseFloat($('input[name="totalanualprem"]').val().replace(/,/g, '')) || 0;
            var total = inForcePolicies + bondsApplied;
            $('input[name="total"]').val(total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        });


      $('input[name="in_force_policies1"], input[name="bonds_applied1"]').keyup(function() {

        var inForcePolicies = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
        var bondsApplied = parseFloat($('input[name="bonds_applied"]').val().replace(/,/g, '')) || 0;
        var total2 = inForcePolicies + bondsApplied;
        $('input[name="total"]').val(total2.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var inForcePolicies1 = parseFloat($('input[name="in_force_policies1"]').val().replace(/,/g, '')) || 0;
        var bondsApplied1 = parseFloat($('input[name="bonds_applied1"]').val().replace(/,/g, '')) || 0;
        var total1 = inForcePolicies1 + bondsApplied1;
        $('input[name="total1"]').val(total1.toFixed(2));
      });

      $('input[name="in_force_policies2"], input[name="bonds_applied2"]').keyup(function() {

        var inForcePolicies = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
        var bondsApplied = parseFloat($('input[name="bonds_applied"]').val().replace(/,/g, '')) || 0;
        var total3 = inForcePolicies + bondsApplied;
        $('input[name="total"]').val(total3.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));


            var inForcePolicies2 = parseFloat($('input[name="in_force_policies2"]').val().replace(/,/g, '')) || 0;
            var bondsApplied2 = parseFloat($('input[name="bonds_applied2"]').val().replace(/,/g, '')) || 0;
            var total2 = inForcePolicies2 + bondsApplied2;
            $('input[name="total2"]').val(total2.toFixed(2));
        });
    });

            $('input[name="in_force_policies"], input[name="in_force_policies1"], input[name="in_force_policies2"]').keyup(function() {
                var inForcePolicies1 = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
                var inForcePolicies2 = parseFloat($('input[name="in_force_policies1"]').val().replace(/,/g, '')) || 0;
                var inForcePolicies3 = parseFloat($('input[name="in_force_policies2"]').val().replace(/,/g, '')) || 0;
                var total_1 = inForcePolicies1 + inForcePolicies2 + inForcePolicies3;
                $('input[name="total_1"]').val(total_1.toFixed(2));
            });


            $('input[name="expired_policies"], input[name="expired_policies1"], input[name="expired_policies2"]').change(function() {
                var expired_policies1 = parseFloat($('input[name="expired_policies"]').val().replace(/,/g, '')) || 0;
                var expired_policies2 = parseFloat($('input[name="expired_policies1"]').val().replace(/,/g, '')) || 0;
                var expired_policies3 = parseFloat($('input[name="expired_policies2"]').val().replace(/,/g, '')) || 0;
                var total_4 = expired_policies1 + expired_policies2 + expired_policies3;
                $('input[name="total_4"]').val(total_4.toFixed(2));
            });

            $('input[name="bonds_applied1"], input[name="bonds_applied2"]').change(function() {
                var total1 = parseFloat($('input[name="total"]').val().replace(/,/g, '')) || 0;
                var total2 = parseFloat($('input[name="total1"]').val().replace(/,/g, '')) || 0;
                var total3 = parseFloat($('input[name="total2"]').val().replace(/,/g, '')) || 0;
                var total_all = total1 + total2 + total3;
                var formattedValue = total_all.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('input[name="total_3"]').val(formattedValue);

                var bondsApplied = parseFloat($('input[name="bonds_applied"]').val().replace(/,/g, '')) || 0;
                var bondsApplied1 = parseFloat($('input[name="bonds_applied1"]').val().replace(/,/g, '')) || 0;
                var bondsApplied2 = parseFloat($('input[name="bonds_applied2"]').val().replace(/,/g, '')) || 0;
                var total_bond_applied = bondsApplied + bondsApplied1 + bondsApplied2;
                var total_bond_app = total_bond_applied.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('input[name="total_2"]').val(total_bond_app);
            });

            $('input[name="in_force_policies1"], input[name="in_force_policies2"]').keyup(function() {
                var get_amount = $('#totalanualprem').val();
                var clean_amt =  get_amount.replace(',', '');
                var bond_amount_total = parseFloat(clean_amt) || 0;
                var in_force_policies1 = parseFloat($('input[name="in_force_policies1"]').val().replace(/,/g, '')) || 0;
                var in_force_policies2 = parseFloat($('input[name="in_force_policies2"]').val().replace(/,/g, '')) || 0;
                var total_compute = bond_amount_total - in_force_policies1 - in_force_policies2;

                $('input[name="bonds_applied"]').val(total_compute.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });






        // PRINCIPAL API
        jQuery('input[name="client"]').change(function() {
                if ($(this).val() == "New") {
                    $('#principal').val('');
                    $('#address').val('');
                    $('#company_tin').val('');
                    $('#contact_person').val('');
                    $('#email').val('');
                    $('#contact_no').val('');
                    $('#date_incorp').val('');

                }
            });

            // FOR PRINCIPAL API DROPDOWN PAGINATE
            $(document).ready(function() {
                var searchInput = $('#principal_show_list');
                var dropdownMenu = $('#dropdownMenu');
                var currentPage = 1;

                searchInput.on('input', function() {
                    var query = $(this).val();

                    if (query.length === 0) {
                        dropdownMenu.empty();
                        dropdownMenu.hide(); // Hide the dropdown menu
                        return;
                    }

                    $.ajax({
                        url: "{{ url('/get-quote/get_principal_api') }}",
                        method: "GET",
                        data: { query: query, page: currentPage },
                        success: function(response) {
                            dropdownMenu.empty();

                            if (response.data.length > 0) {
                                $.each(response.data, function(index, item) {

                                    dropdownMenu.append('<a class="dropdown-item" href="#" data-assured="' + item.assured + '">' + item.assured + '</a>');
                                });

                                // Add pagination links
                                dropdownMenu.append(response.links);
                                dropdownMenu.show(); // Show the dropdown menu
                            } else {
                                dropdownMenu.html('<a class="dropdown-item" href="#">No results found</a>');
                                dropdownMenu.show(); // Show the "No results found" message
                            }
                        }
                    });
                });

                // Hide dropdown menu when clicking outside
                $(document).on('click', function (e) {
                    if (!searchInput.is(e.target) && !dropdownMenu.is(e.target) && dropdownMenu.has(e.target).length === 0) {
                        dropdownMenu.hide();
                    }
                });

                // Handle selection from dropdown
                $(document).on('click', '#dropdownMenu .dropdown-item', function(e) {
                    e.preventDefault();
                    var selectedValue = $(this).data('assured');

                    searchInput.val(selectedValue);

                    // Send AJAX request to retrieve the selected user's details
                    $.ajax({
                        url: "{{ url('/get-quote/get_principal_api') }}",
                        method: "GET",
                        data: { assured: selectedValue },
                        success: function(response) {

                            if (response.data) {
                                var selectedAgent = response.data[0];
                                // Convert the birthdate to mm/dd/yyyy
                                var birthdate = new Date(selectedAgent.birthday);
                                var formattedBirthdate = birthdate.toLocaleDateString("en-US");

                                $('#principal').val(selectedAgent.assured);
                                $('#address').val(selectedAgent.address);
                                $('#date_incorp').val(formattedBirthdate);
                                $('#company_tin').val(selectedAgent.tin_no);
                                $('#contact_person').val(selectedAgent.contact_person);
                                $('#email').val(selectedAgent.email_address);
                                $('#contact_no').val(selectedAgent.contact_no);
                            }
                        }
                    });

                    dropdownMenu.hide();
                });
            });

            $(document).ready(function() {
            $('#policy_type').on('change', function() {
                var policyVal = $(this).val();
                $('#policy_val').val(policyVal);
            });
        });

        $(document).ready(function() {
            $('#account_type').on('change', function() {
                var account_typeval = $(this).val();
                $('#account_type_val').val(account_typeval);
            });
        });

        //    $.fn.dataTable.ext.errMode = 'throw';
        var trans_id = $("input[name='transno']").val();
        var str_status = $("input[name='strstatus']").val();
        var str_type = $("input[name='strtype']").val();
        var str_view = true;

        if (str_status == "Approved" ||  str_status == "For BM Review" ||str_status == "Cancelled" || str_status == "UW Reviewed" || str_status ==
            "Issued" || str_status == "DNM" || (str_type != "Sales HO" && str_type != "Agent" && str_type != "Sales")) {

            str_view = false;
            $('#div_requirement1').hide();
            $('#div_requirement2').hide();
            $('#div_lossxp').hide();
            $('#div_owner').hide();
            $('#div_officer').hide();
            $('#div_collateral').hide();
            $('#div_cosigner').hide();
            $('#div_corporate').hide();
            $('#div_complete_project').hide();
            $('#div_complete_project2').hide();
            $('#div_project1').hide();
            $('#div_project2').hide();
            $('#div_attachment').hide();
            $('#div_financial').hide();
            $('#div_guarantee').hide();
            $('#div_principal').hide();
            $('#sendform_requirement').hide();

            $('#sendform_financial').hide();
            $('#sendform_distribution').hide();


            // $('#financial_label').prop('readonly', true);
            // $('#financial_label2').prop('readonly', true);

            // $('#asset').prop('readonly', true);
            // $('#asset_previous').prop('readonly', true);
            // $('#gross_income').prop('readonly', true);
            // $('#gross_income_previous').prop('readonly', true);
            // $('#liabilities').prop('readonly', true);
            // $('#liabilities_previous').prop('readonly', true);
            // $('#net_income').prop('readonly', true);
            // $('#net_income_previous').prop('readonly', true);
            // $('#networth').prop('readonly', true);
            // $('#networth_previous').prop('readonly', true);
            // $('#paid_up_capital').prop('readonly', true);
            // $('#paid_up_capital_previous').prop('readonly', true);
            // $('#retained').prop('readonly', true);
            // $('#retained_previous').prop('readonly', true);

            // $('#in_force_policies').prop('readonly', true);
            // $('#in_force_policies1').prop('readonly', true);
            // $('#in_force_policies2').prop('readonly', true);

            // $('#bonds_applied1').prop('readonly', true);
            // $('#bonds_applied2').prop('readonly', true);

            // $('#expired_policies').prop('readonly', true);
            // $('#expired_policies1').prop('readonly', true);
            // $('#expired_policies2').prop('readonly', true);


        } else {
            if (str_type == "Sales HO" || str_type == "Agent") {

                str_view = true;

            } else {
                str_view = false;
            }
        }



        function Comma(Num) { //function to add commas to textboxes
            Num += '';
            Num = Num.replace(',', '');
            Num = Num.replace(',', '');
            Num = Num.replace(',', '');
            Num = Num.replace(',', '');
            Num = Num.replace(',', '');
            Num = Num.replace(',', '');
            x = Num.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1))
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            return x1 + x2;
        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        // BONDS COMPUTATION
        $('#sendform_calc').click(function(e) {
            e.preventDefault();
            jQuery.noConflict();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            var errornumber = 0;

            $(".validation_policy_type_info").remove();
            $(".validation_policy_type_check_error").remove();
            $(".validation_policy_type_check_success").remove();

            $(".validation_account_type_info").remove();
            $(".validation_account_type_check_error").remove();
            $(".validation_account_type_check_success").remove();


            $(".validation_bond_req_info").remove();
            $(".validation_bond_req_check_error").remove();
            $(".validation_bond_req_check_success").remove();

            $(".validation_date_bterm1_info").remove();
            $(".validation_date_bterm1_check_error").remove();
            $(".validation_date_bterm1_check_success").remove();

            $(".validation_date_bterm2_info").remove();
            $(".validation_date_bterm2_check_error").remove();
            $(".validation_date_bterm2_check_success").remove();


            if ($('#policy_type').val() == "") {
                // $("#policy_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );
                $('#policy_type').fieldErrorState();
                errornumber = 1;
            } else {
                $('#policy_type').fieldSuccessState();
            }

            if ($('#account_type').val() == "") {
                // $("#account_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );
                $('#account_type').fieldErrorState();
                errornumber = 1;
            } else {
                $('#account_type').fieldSuccessState();
            }
            if ($('#bond_req').val() == "") {
                // $("#account_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );
                $('#bond_req').fieldErrorState();
                errornumber = 1;
            } else {
                $('#bond_req').fieldSuccessState();
            }

            if ($('#date_bterm1').val() == "") {
                // $("#account_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );
                $('#date_bterm1').fieldErrorState();
                errornumber = 1;
            } else {
                $('#date_bterm1').fieldSuccessState();
            }

            if ($('#date_bterm2').val() == "") {
                // $("#account_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );
                $('#date_bterm2').fieldErrorState();
                errornumber = 1;
            } else {
                $('#date_bterm2').fieldSuccessState();
            }
            if ($('#bond_amount').val() == "") {
                // $("#account_type").after(
                //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                // );

                $('#bond_amount').fieldErrorState();
                errornumber = 1;
            } else {
                $('#bond_amount').fieldSuccessState();
            }



            if (errornumber == 1) {
                return false;
            }

            $.ajax({
                url: "{{ url('/get-quote/bonds-calcpremium') }}",
                method: "POST",
                data: $('#form_requirement').serialize() + "&trans_id=" + trans_id +
                    "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                  console.log(response);
                    if ($.isEmptyObject(response.error)) {

                        $("input[name='multiplier']").val(response.multiplier);
                        $("input[name='annual_rate']").val(response.annual_rate);
                        $("input[name='annual_rate_update_tarif']").val(response.annual_rate);

                        $("input[name='annual_premium']").val(response.annual_premium);
                        $("input[name='term_premium']").val(response.annual_premium_term);
                        $("input[name='bonds_requirement']").val(response.bond_required);

                    } else {
                        $('#msg_div11').hide();
                        $('#alert_msg11').show();
                        $('#res_error11').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div11').hide();
                        $('#alert_msg11').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });



        jQuery(document).ready(function() {
            var trans_id = $("input[name='transno']").val();
            var userAccountType = '{{ Auth::user()->accountType }}';
            if(userAccountType =='Underwriter' ){
                str_view =true;
                $('#agent, #address, #date_incorp, #company_tin, #contact_person, #contact_no, #email').prop('readonly', true);
                $('#contract_price').prop('readonly', false);
            }
            jQuery("#requirement_table").dataTable({
                searching: false,
                paging: false,
                info: false,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/get-quote/getbondsquoterequirement') }}" +
                        "/" + trans_id,
                    error: function(xhr, error, thrown) {
                        console.log(error);
                    }
                },
                columns: [{ data: 'id', name: 'id', visible: false},
                    { data: 'bond_type', name: 'bond_type'},
                    { data: 'bonds_requirement',name: 'bonds_requirement',
                        render: function(data, type, row) {
                            return '' + parseFloat(data)
                                .toFixed(2).replace(
                                    /\d(?=(\d{3})+\.)/g,
                                    '$&,');
                        }
                    },
                    { data: 'proposed_retention',name: 'proposed_retention',
                        render: function(data, type, row) {
                            return '' + parseFloat(data)
                                .toFixed(2).replace(
                                    /\d(?=(\d{3})+\.)/g,
                                    '$&,');
                        }
                    },
                    {
                        data: 'bond_amt',name: 'bond_amt',
                        render: function(data, type, row) {
                            return '' + parseFloat(data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g,
                                '$&,');
                        }
                    },
                    {data: 'annual_rate',name: 'annual_rate'
                    },
                    {data: 'annual_premium',name: 'annual_premium',
                        render: function(data, type, row) {
                            return '' + parseFloat(data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g,
                                '$&,');
                        }
                    },
                    {data: 'bond_term',name: 'bond_term'},
                    {data: 'term_premium',name: 'term_premium',
                        render: function(data, type, row) {
                            return '' + parseFloat(data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g,
                                '$&,');
                        }
                    },
                    {data: 'action',name: 'action',orderable: false,visible: true},
                ],
            });
        });

        jQuery(document).ready(function() {
            $("#update_anual").click(function() {
                $("#annual_rate_update_tarif").removeAttr("readonly");
            });
        });

        jQuery(document).on('click', '#sendform_requirement', function() {
            var trans_id = $("input[name='transno']").val();

            var errornumber = 0;
            if ($('#bonds_requirement').val() == "") {
                $('#bonds_requirement').fieldErrorState();
                errornumber = 1;
            } else {
                $('#bonds_requirement').fieldSuccessState();
            }

            if ($('#proposed_retention').val() == "") {

                $('#proposed_retention').fieldErrorState();
                errornumber = 1;
            } else {
                $('#proposed_retention').fieldSuccessState();
            }
            if (errornumber == 1) {
                return false;
            }

            $('#sendform_requirement').html('Saving...');
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/addbondsquoterequirement') }}",
                method: "POST",
                data: $('#form_requirement').serialize() + "&trans_id=" + trans_id  + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    var checkVal = $('.addnew').val();
                    var trans_id = $("input[name='transno']").val();

                    $('#totalanualprem').val(response.totalanualprem);
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg11').hide();
                        $('#sendform_requirement').html('Add');
                        $('#msg_div11').show();
                        $('#res_message11').show();
                        $('#res_message11').html(response.success);
                        $('#msg_div11').removeClass('d-none');
                        $('#form_requirement').trigger("reset");

                        var table = jQuery('#requirement_table').DataTable();
                        table.ajax.reload();
                    } else {
                        $('#msg_div11').hide();
                        $('#alert_msg11').show();
                        $('#sendform_requirement').html('Add');
                        $('#res_error11').html(response.error);

                    }
                    jQuery('#in_force_policies, #bonds_applied, #total, #expired_policies, ' +
                            '#in_force_policies1, #bonds_applied1, #total1, #expired_policies1, ' +
                            '#in_force_policies2, #bonds_applied2, #total2, #expired_policies2, ' +
                            '#total_1, #total_2, #total_3, #total_4').val('');

                    setTimeout(function() {
                        $('#msg_div11').hide();
                        $('#alert_msg11').hide();
                    }, 10000);

                }
            });
        });



        $('#sendform_comment').click(function(e) {
            e.preventDefault();
            jQuery.noConflict();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $('#sendform_comment').html('Saving...');

            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/addbondscomments') }}",
                method: "POST",
                data: $('#form_comment').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {

                        $('#alert_msg10').hide();
                        $('#sendform_comment').html('Post Comments');
                        $('#msg_div10').show();
                        $('#res_message10').show();
                        $('#res_message10').html(response.success);
                        $('#msg_div10').removeClass('d-none');

                        $('#form_comment').trigger("reset");
                        getcomments(trans_id);
                    } else {
                        $('#msg_div10').hide();
                        $('#alert_msg10').show();
                        $('#sendform_comment').html('Post Comments');
                        $('#res_error10').html(response.error);

                    }
                    //--------------------------
                }

            });


        });

          $('#sendform_bonds').click(function(e) {
            e.preventDefault();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
              $('#sendform_approve').hide();
            $('#sendform_bonds').html('Submitting...');
            $.ajax({
                url: "{{ url('/get-quote/get_tsi') }}",
                method: "POST",
                data: $('#form_tsi').serialize() + "&trans_id=" + trans_id + "&_token=" +
                    csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                   if ($('#issueNew').is(':checked')){
                        var errornumber = 0;

                        if ($('#in_force_policies').val() == "") {
                            $('#in_force_policies').fieldErrorState();
                            errornumber = 1;
                        } else {

                            $('#in_force_policies').fieldSuccessState();
                        }
                        if ($('#in_force_policies1').val() == "") {
                            $('#in_force_policies1').fieldErrorState();
                            errornumber = 1;
                        } else {

                            $('#in_force_policies1').fieldSuccessState();
                        }
                        if ($('#in_force_policies2').val() == "") {
                            $('#in_force_policies2').fieldErrorState();
                            errornumber = 1;
                        } else {

                            $('#in_force_policies2').fieldSuccessState();
                        }

                        if ($('#bonds_applied').val() == "") {
                            $('#bonds_applied').fieldErrorState();
                            errornumber = 1;
                        } else {

                            $('#bonds_applied').fieldSuccessState();
                        }

                        if ($('#bonds_applied1').val() == "") {
                            $('#bonds_applied1').fieldErrorState();
                            errornumber = 1;
                        } else {

                            $('#bonds_applied1').fieldSuccessState();
                        }

                        if ($('#bonds_applied2').val() == "") {
                            $('#bonds_applied2').fieldErrorState();
                            errornumber = 1;
                        } else {

                            $('#bonds_applied2').fieldSuccessState();
                        }
                   }else{

                    errornumber = 0;
                   }
                        if (errornumber == 1) {
                            var targetOffset = $('#form_tsi').offset().top;
                        $('html, #body').animate({ scrollTop: targetOffset }, 'slow');
                            return false;
                        }else{
                                        /* Submit form data using ajax*/
                            $.ajax({
                                url: "{{ url('/get-quote/bonds-quotesubmit') }}",
                                method: "POST",
                                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" +
                                    csrf_token,
                                dataType: 'json',
                                success: function(response) {
                                    //------------------------
                                    if ($.isEmptyObject(response.error)) {
                                            $('#alert_msg12').hide();
                                            $('#sendform_bonds').hide();
                                            $('#msg_div12').show();
                                            $('#res_message12').show();
                                            $('#res_message12').html(response.success);
                                            $('#msg_div12').removeClass('d-none');

                                        } else {
                                            $('#msg_div12').hide();
                                            $('#alert_msg12').show();
                                            $('#sendform_bonds').html('Submit');
                                            $('#res_error12').html(response.error);

                                        }

                                        setTimeout(function() {
                                            $('#msg_div12').hide();
                                            $('#alert_msg12').hide();
                                        }, 10000);
                                    //--------------------------
                                }

                            });
                        }//end
                    // }


                }

            });

        });



        // $('#sendform_bonds').click(function(e) {

        //     e.preventDefault();
        //     var trans_id = $("input[name='transno']").val();
        //     $('#sendform_approve').hide();

        //     $('#sendform_bonds').html('Submitting...');
        //     var csrf_token = $('meta[name="csrf-token"]').attr('content');
        //     /* Submit form data using ajax*/
        //     $.ajax({
        //         url: "{{ url('/get-quote/bonds-quotesubmit') }}",
        //         method: "POST",
        //         data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
        //         dataType: 'json',
        //         success: function(response) {
        //             //------------------------
        //             if ($.isEmptyObject(response.error)) {
        //                 $('#alert_msg12').hide();
        //                 $('#sendform_bonds').hide();
        //                 $('#msg_div12').show();
        //                 $('#res_message12').show();
        //                 $('#res_message12').html(response.success);
        //                 $('#msg_div12').removeClass('d-none');

        //             } else {
        //                 $('#msg_div12').hide();
        //                 $('#alert_msg12').show();
        //                 $('#sendform_bonds').html('Submit');
        //                 $('#res_error12').html(response.error);

        //             }

        //             setTimeout(function() {
        //                 $('#msg_div12').hide();
        //                 $('#alert_msg12').hide();
        //             }, 10000);
        //             //--------------------------
        //         }

        //     });

        // });

        $('#sendform_manager').click(function(e) {

            e.preventDefault();

            var trans_id = $("input[name='transno']").val();

            $('#sendform_manager').html('Submitting...');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/bonds-quotemanager') }}",
                method: "POST",
                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg12').hide();
                        $('#sendform_manager').hide();
                        $('#msg_div12').show();
                        $('#res_message12').show();
                        $('#res_message12').html(response.success);
                        $('#msg_div12').removeClass('d-none');

                    } else {
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_manager').html('Verify');
                        $('#res_error12').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div12').hide();
                        $('#alert_msg12').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });

        $('#sendform_cancel').click(function(e) {

            e.preventDefault();

            var trans_id = $("input[name='transno']").val();

            $('#sendform_cancel').html('Cancelling...');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/bonds-quotecancel') }}",
                method: "POST",
                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg12').hide();
                        $('#sendform_bonds').hide();
                        $('#msg_div12').show();
                        $('#res_message12').show();
                        $('#res_message12').html(response.success);
                        $('#msg_div12').removeClass('d-none');
                        $('#div_requirement1').hide();
                        $('#div_requirement2').hide();
                        $('#div_lossxp').hide();
                        $('#div_owner').hide();
                        $('#div_officer').hide();
                        $('#div_collateral').hide();
                        $('#div_cosigner').hide();
                        $('#div_project1').hide();
                        $('#div_project2').hide();
                        $('#div_attachment').hide();
                        $('#div_financial').hide();
                        $('#sendform_cancel').hide();

                        $('#collateral_table').DataTable().columns(4).visible(false);
                        $('#lossxp_table').DataTable().columns(2).visible(false);
                        $('#owner_table').DataTable().columns(3).visible(false);
                        $('#officer_table').DataTable().columns(3).visible(false);
                        $('#cosigner_table').DataTable().columns(4).visible(false);
                        $('#project1_table').DataTable().columns(2).visible(false);
                        $('#project2_table').DataTable().columns(2).visible(false);
                        $('#attachment_table').DataTable().columns(4).visible(false);
                        $('#financial_table').DataTable().columns(4).visible(false);
                        $('#requirement_table').DataTable().columns(7).visible(false);


                    } else {
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('Submit');
                        $('#res_error12').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div12').hide();
                        $('#alert_msg12').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });

        $('#sendform_sales').click(function(e) {

            e.preventDefault();

            var trans_id = $("input[name='transno']").val();
            $('#sendform_review').hide();
            $('#sendform_approve').hide();

            $('#sendform_sales').html('Submitting...');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/bonds-quotesales') }}",
                method: "POST",
                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {


                    //------------------------
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg12').hide();
                        $('#sendform_sales').hide();
                        $('#sendform_review').hide();
                        $('#sendform_download').hide();
                        $('#msg_div12').show();
                        $('#res_message12').show();
                        $('#res_message12').html(response.success);
                        $('#msg_div12').removeClass('d-none');

                    } else {
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('For Sales Review');
                        $('#res_error12').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div12').hide();
                        $('#alert_msg12').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });

        $('#sendform_review').click(function(e) {

            e.preventDefault();

            var trans_id = $("input[name='transno']").val();

            $('#sendform_review').html('Reviewing...');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            /* Submit form data using ajax*/
             $('#sendform_sales').hide();
            $('#sendform_approve').hide();
            $.ajax({
                url: "{{ url('/get-quote/bonds-quotereview') }}",
                method: "POST",
                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg12').hide();
                        $('#sendform_bonds').hide();
                        $('#msg_div12').show();
                        $('#res_message12').show();
                        $('#res_message12').html(response.success);
                        $('#msg_div12').removeClass('d-none');
                        $('#div_requirement1').hide();
                        $('#div_requirement2').hide();
                        $('#div_lossxp').hide();
                        $('#div_owner').hide();
                        $('#div_officer').hide();
                        $('#div_collateral').hide();
                        $('#div_cosigner').hide();
                        $('#div_project1').hide();
                        $('#div_project2').hide();
                        $('#div_attachment').hide();
                        $('#div_financial').hide();
                        $('#sendform_review').hide();

                        $('#collateral_table').DataTable().columns(4).visible(false);
                        $('#lossxp_table').DataTable().columns(2).visible(false);
                        $('#owner_table').DataTable().columns(3).visible(false);
                        $('#officer_table').DataTable().columns(3).visible(false);
                        $('#cosigner_table').DataTable().columns(4).visible(false);
                        $('#project1_table').DataTable().columns(2).visible(false);
                        $('#project2_table').DataTable().columns(2).visible(false);
                        $('#attachment_table').DataTable().columns(4).visible(false);
                        $('#financial_table').DataTable().columns(4).visible(false);
                        $('#requirement_table').DataTable().columns(7).visible(false);


                    } else {
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('Underwriter Committee Review');
                        $('#res_error12').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div12').hide();
                        $('#alert_msg12').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });

        $('#sendform_issue').click(function(e) {

            e.preventDefault();

            var trans_id = $("input[name='transno']").val();

            $('#sendform_dnm').hide();
            $('#sendform_issue').html('Updating...');

            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/bonds-quoteissue') }}",
                method: "POST",
                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg12').hide();
                        $('#sendform_bonds').hide();
                        $('#sendform_issue').hide();

                        $('#msg_div12').show();
                        $('#res_message12').show();
                        $('#res_message12').html(response.success);
                        $('#msg_div12').removeClass('d-none');
                        $('#div_requirement1').hide();
                        $('#div_requirement2').hide();
                        $('#div_lossxp').hide();
                        $('#div_owner').hide();
                        $('#div_officer').hide();
                        $('#div_collateral').hide();
                        $('#div_cosigner').hide();
                        $('#div_project1').hide();
                        $('#div_project2').hide();
                        $('#div_attachment').hide();
                        $('#div_financial').hide();
                        $('#sendform_cancel').hide();

                        $('#collateral_table').DataTable().columns(4).visible(false);
                        $('#lossxp_table').DataTable().columns(2).visible(false);
                        $('#owner_table').DataTable().columns(3).visible(false);
                        $('#officer_table').DataTable().columns(3).visible(false);
                        $('#cosigner_table').DataTable().columns(4).visible(false);
                        $('#project1_table').DataTable().columns(2).visible(false);
                        $('#project2_table').DataTable().columns(2).visible(false);
                        $('#attachment_table').DataTable().columns(4).visible(false);
                        $('#financial_table').DataTable().columns(4).visible(false);
                        $('#requirement_table').DataTable().columns(7).visible(false);


                    } else {
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_issue').html('Issued');
                        $('#res_error12').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div12').hide();
                        $('#alert_msg12').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });

        $('#sendform_dnm').click(function(e) {

            e.preventDefault();
                $('#sendform_issue').hide();
            var trans_id = $("input[name='transno']").val();

            $('#sendform_dnm').html('Updating...');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/bonds-quotednm') }}",
                method: "POST",
                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg12').hide();
                        $('#sendform_bonds').hide();
                        $('#sendform_dnm').hide();
                        $('#sendform_issue').hide();
                        $('#msg_div12').show();
                        $('#res_message12').show();
                        $('#res_message12').html(response.success);
                        $('#msg_div12').removeClass('d-none');
                        $('#div_requirement1').hide();
                        $('#div_requirement2').hide();
                        $('#div_lossxp').hide();
                        $('#div_owner').hide();
                        $('#div_officer').hide();
                        $('#div_collateral').hide();
                        $('#div_cosigner').hide();
                        $('#div_project1').hide();
                        $('#div_project2').hide();
                        $('#div_attachment').hide();
                        $('#div_financial').hide();
                        $('#sendform_cancel').hide();

                        $('#collateral_table').DataTable().columns(4).visible(false);
                        $('#lossxp_table').DataTable().columns(2).visible(false);
                        $('#owner_table').DataTable().columns(3).visible(false);
                        $('#officer_table').DataTable().columns(3).visible(false);
                        $('#cosigner_table').DataTable().columns(4).visible(false);
                        $('#project1_table').DataTable().columns(2).visible(false);
                        $('#project2_table').DataTable().columns(2).visible(false);
                        $('#attachment_table').DataTable().columns(4).visible(false);
                        $('#financial_table').DataTable().columns(4).visible(false);
                        $('#requirement_table').DataTable().columns(7).visible(false);


                    } else {
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_issue').html('DNM');
                        $('#res_error12').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div12').hide();
                        $('#alert_msg12').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });

        $('#sendform_approve').click(function(e) {
            e.preventDefault();

            var trans_id = $("input[name='transno']").val();
             $('#sendform_bonds').hide();
            $('#sendform_sales').hide();
            $('#sendform_review').hide();
            $('#sendform_approve').html('Approving...');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/bonds-quoteapprove') }}",
                method: "POST",
                data: $('#form_sendbond').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {
                        $('#alert_msg12').hide();
                        $('#sendform_bonds').hide();
                        $('#sendform_manager').hide();
                        $('#sendform_review').hide();
                        $('#sendform_download').show();
                        $('#msg_div12').show();
                        $('#res_message12').show();
                        $('#res_message12').html(response.success);
                        $('#msg_div12').removeClass('d-none');
                        $('#div_requirement1').hide();
                        $('#div_requirement2').hide();
                        $('#div_lossxp').hide();
                        $('#div_owner').hide();
                        $('#div_officer').hide();
                        $('#div_collateral').hide();
                        $('#div_cosigner').hide();
                        $('#div_project1').hide();
                        $('#div_project2').hide();
                        $('#div_attachment').hide();
                        $('#div_financial').hide();
                        $('#sendform_approve').hide();

                        $('#collateral_table').DataTable().columns(4).visible(false);
                        $('#lossxp_table').DataTable().columns(2).visible(false);
                        $('#owner_table').DataTable().columns(3).visible(false);
                        $('#officer_table').DataTable().columns(3).visible(false);
                        $('#cosigner_table').DataTable().columns(4).visible(false);
                        $('#project1_table').DataTable().columns(2).visible(false);
                        $('#project2_table').DataTable().columns(2).visible(false);
                        $('#attachment_table').DataTable().columns(4).visible(false);
                        $('#financial_table').DataTable().columns(4).visible(false);
                        $('#requirement_table').DataTable().columns(7).visible(false);


                    } else {
                        $('#msg_div12').hide();
                        $('#alert_msg12').show();
                        $('#sendform_bonds').html('Approve');
                        $('#res_error12').html(response.error);

                    }

                    setTimeout(function() {
                        $('#msg_div12').hide();
                        $('#alert_msg12').hide();
                    }, 10000);
                    //--------------------------
                }

            });

        });

        //REMARKS

        $('#sendform_financial3').click(function(e) {

            e.preventDefault();

            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            $('#sendform_financial3').html('Saving...');

            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/addbondsfinancialremarks') }}",
                method: "POST",
                data: $('#form_financial3').serialize() + "&trans_id=" + trans_id + "&_token=" + csrf_token,
                dataType: 'json',
                success: function(response) {
                    //------------------------
                    if ($.isEmptyObject(response.error)) {

                        $('#alert_msg9').hide();
                        $('#sendform_financial3').html('Post Remarks');
                        $('#msg_div9').show();
                        $('#res_message9').show();
                        $('#res_message9').html(response.success);
                        $('#msg_div9').removeClass('d-none');

                        $('#form_financial3').trigger("reset");
                        getfinancialremarks(trans_id);
                    } else {
                        $('#msg_div9').hide();
                        $('#alert_msg9').show();
                        $('#sendform_financial3').html('Post Remarks');
                        $('#res_error9').html(response.error);

                    }
                    //--------------------------
                }

            });


        });
        $(".closebtn").click(function() {
                        $("#copyissue").hide();
                        });
        $('#form_for_issueonce').click(function(e) {

        e.preventDefault();

        var trans_id = $("input[name='transno']").val();

        $('#form_for_issueonce').html('Updating...');

        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        /* Submit form data using ajax*/
        $.ajax({
            url: "{{ url('/get-quote/get_issued') }}",
            method: "POST",
            data: "&trans_id=" + trans_id + "&_token=" + csrf_token,
            dataType: 'json',
            success: function(response) {
                //------------------------
                if ($.isEmptyObject(response.error)) {
                    $('#copyissue').show();

                      $('#form_for_issueonce').hide();

                } else {
                    $('#msg_div12').hide();

                    $('#sendform_issue').html('Issued');
                    $('#res_error12').html(response.error);

                }

                setTimeout(function() {
                    $('#msg_div12').hide();
                    $('#alert_msg12').hide();
                }, 10000);
                //--------------------------
            }

        });

});




        $(document).ready(function() {
    $('#contract_price').on('blur', function() {
        var contractPrice = $(this).val();
        $('#bonds_contract').val(contractPrice);
    });
    });
    $(document).ready(function() {
        $('#field5').change(function() {
            var value = $(this).val();
            if (value === '') {
            $(this).val('0.00'); // Add default decimal if empty
            } else if (value === 'Php .00') {
            $(this).val('Php'); // Remove "Php .00"
            } else if (value.indexOf('.') === -1) {
            $(this).val(value + '.00'); // Add decimal if not present
            }
        });
    });

  $(document).ready(function() {
  $('#contract_price,#bond_amount,#cosigner_amt').on('input', function() {
    var inputValue = $(this).val();
    if (!inputValue.includes('Php')) {
      $(this).val('Php '+inputValue);
    }
  });
});


$(document).ready(function() {
  $('#cosigner_property_size').on('input', function() {
    clearTimeout($(this).data('timer'));
    $(this).data('timer', setTimeout(function() {
      var inputValue = $('#cosigner_property_size').val().trim();
      var suffix = ' sqm';
      var newValue = inputValue.replace(/sqm(?!.*sqm)/g, '');
      $('#cosigner_property_size').val(newValue + suffix);
    }, 500));
  });
});


    $(document).ready(function() {
        $('#bond_amount').keyup(function() {
            var bond_amount = $(this).val();
            $('#total_2_extra').val(bond_amount);
        });
    });

    $(document).ready(function() {
    $('input').attr('autocomplete', 'off');
    })

    $(document).ready(function() {
        $('#contract_price,#bond_amount,#asset,#gross_income,#liabilities,#net_income,#networth,#paid_up_capital,#retained,#asset_previous,#gross_income_previous,#liabilities_previous,#net_income_previous,#networth_previous,#paid_up_capital_previous,#retained_previous,#in_force_policies,#total_4').change(function() {
        var value = $(this).val();

            // Check if the value is empty or already has a decimal
            if (value === '') {
            $(this).val('0.00'); // Add default decimal if empty
            } else if (value.indexOf('.') === -1) {
            $(this).val(value + '.00'); // Add decimal if not present
            }
        });
    });

        function getfinancialremarks(id) {

            $.ajax({
                type: 'get',
                url: "{{ url('/get-quote/bondsfinancialremraks') }}" + "/" + trans_id,
                success: function(data) {
                    $('#financial_remarks').html(data);
                    console.log(data + 'remarks');

                },
                error: function() {

                }
            });
        }

        function getcomments(id) {

            $.ajax({
                type: 'get',
                url: "{{ url('/get-quote/bondscomments') }}" + "/" + trans_id,
                success: function(data) {
                    $('#bond_comment').html(data);

                },
                error: function() {

                }
            });
        }

        $(document).ready(function() {
            jQuery.noConflict();
            $("#bond_req").prop("disabled", true);
            // Event listener for when the first dropdown menu selection changes
            $('#account_type').change(function() {

                // Get the selected value from the first dropdown menu
                var selectedValue = $(this).val();
                var csrf_token = $('meta[name="csrf-token"]').attr('content');

                // Make an AJAX request to the server to get the options for the second dropdown menu
                $.ajax({

                    url: "{{ url('/get-quote/accountbroker') }}",
                    method: 'POST',
                    data: {
                        value: selectedValue,
                        _token: csrf_token
                    },
                    success: function(data) {
                        $("#bond_req").prop("disabled", false);
                        // Update the options of the second dropdown menu with the data returned from the server
                        $('#bond_req').empty();
                        $('#bond_req').append($('<option>', {
                            value: '',
                            text: '*Bonds Type'
                        }));
                        jQuery('#bond_req').selectpicker('refresh');
                        $.each(data, function(key, value) {

                            $('#bond_req').append($('<option>', {
                                value: value.bond_req,
                                text: value.bond_req
                            }));
                            jQuery('#bond_req').selectpicker('refresh');
                        });


                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });



        $.fn.removeFormControlFeedback = function() {
            if ($(this).closest('.form-group').find('.form-control-feedback').length) {
                $(this).closest('.form-group').find('.form-control-feedback').remove();
            }
        };
        $.fn.fieldDefaultState = function() {
            $(this).closest('.form-group').removeClass('has-success has-error has-feedback');
            $(this).removeFormControlFeedback();
        };
        $.fn.fieldErrorState = function() {
            $(this).closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
            $(this).removeFormControlFeedback();
            $(this).after('<span class="form-control-feedback fa fa-times-circle" aria-hidden="true"></span>');
        };
        $.fn.fieldSuccessState = function() {
            $(this).closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
            $(this).removeFormControlFeedback();
            $(this).after('<span class="form-control-feedback fa fa-check-circle" aria-hidden="true"></span>');
        };

        $(document).ready(function() {
            $("#endoresePolNo,#loss_xp,#owner_name,#owner_post,#officer_name,#officer_post,#collateral_type,#principal_name,#principal_post,#cosigner_name,#cosigner_position,#cosigner_property,#cosigner_property_tct,#cosigner_property_location,#guarantee_name,#guarantee_post").on("input", function() {
                var inputValue = $(this).val();
                var sanitizedValue = sanitizeInput(inputValue);
                $(this).val(sanitizedValue);
            });

            function sanitizeInput(input) {
                // Replace any characters that are not letters, spaces, hyphens, or periods with an empty string
                var sanitized = input.replace(/[^a-zA-Z \-.]/g, "");
                return sanitized;
            }


        $("#id_type2,#id_no2,#cosigner_id_type,#cosigner_id_no,#id_type,#id_no,#collateral_item").on("input", function() {
                var inputValue = $(this).val();
                var sanitizedValue = sanitizeInputwithno(inputValue);
                $(this).val(sanitizedValue);
            });

            function sanitizeInputwithno(input) {
                // Replace any characters that are not letters, numbers, spaces, hyphens, or periods with an empty string
                var sanitizedwithno = input.replace(/[^a-zA-Z0-9 \-.]/g, "");
                return sanitizedwithno;
            }
        });

    </script>

