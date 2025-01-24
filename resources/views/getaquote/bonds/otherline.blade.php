<script type="text/javascript">
    jQuery.noConflict();
    $(document).ready(function() {
    // Check if the data is already cached in localStorage
    var cachedData = localStorage.getItem('obligeeData');
    if (cachedData) {
        populateDropdown(JSON.parse(cachedData));
    } else {
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
                        var mergedData = data1.concat(data2);
                        mergedData = mergedData.filter(function(obligee) {
                            return obligee.obligee_name !== null;
                        }).sort(function(a, b) {
                            return a.obligee_name.localeCompare(b.obligee_name);
                        });

                        // Cache the merged data in localStorage
                        localStorage.setItem('obligeeData', JSON.stringify(mergedData));

                        populateDropdown(mergedData);
                    }
                });
            }
        });
    }

    function populateDropdown(data) {
        $('#obligee').empty();
        $('#obligee').append('<option value="">Select Obligee</option>');
        data.forEach(function (obligee) {
            var optionHtml = '<option value="' + obligee.obligee_name + '">' + ' ' + obligee.obligee_name + '</option>';
            $('#obligee').append(optionHtml);
        });
    }
});




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




    //LISTOF HIDETEXTFIELD
    $('#endoresePolNomodule').hide();
    $('#display_old').hide();

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
    //disable button
    $("#sendform_requirement").prop("disabled", true);


    $(document).ready(function() {
    $('#contract_price').on('blur', function() {
        var contractPrice = $(this).val();
        $('#bonds_contract').val(contractPrice);
    });
    });

    $(document).ready(function() {
  $('#contract_price, #bond_amount, #cosigner_amt').on('input', function() {
    var inputValue = $(this).val().trim();
    var newValue = inputValue.replace(/^(Php(\s+)?|Ph(\s+)?)/i, ''); // Remove existing "Php" or "Ph" at the beginning of the value
    if (inputValue !== '' && !newValue.includes('Php')) {
      $(this).val('Php ' + newValue);
    } else {
      $(this).val(newValue);
    }
  });
});


$(document).ready(function() {
  $('#proposed_retention').on('input', function() {
    clearTimeout($(this).data('timer'));
    $(this).data('timer', setTimeout(function() {
      var inputValue = $('#proposed_retention').val().trim();
      var suffix = ' %';
      var newValue = inputValue === null ? '' : inputValue.replace(/sqm(?!.*sqm)/g, '');
      $('#proposed_retention').val(newValue + suffix);
    }, 500));
  });
});


$(document).ready(function() {
  $('#cosigner_property_size').on('input', function() {
    clearTimeout($(this).data('timer'));
    $(this).data('timer', setTimeout(function() {
      var inputValue = $('#cosigner_property_size').val().trim();
      var suffix = ' sqm';
      var newValue = inputValue === null ? '' : inputValue.replace(/sqm(?!.*sqm)/g, '');
      $('#cosigner_property_size').val(newValue + (newValue !== '' ? suffix : ''));
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
    });

    // CONDTION   REQUESt
    //1st change
    $(document).ready(function() {
        $('.principal_dropdown_group').hide();
        $('input[name="client"]').change(function() {
            if ($(this).val() === "Old") {
                // $('#newmodule').parent().append(
                //     '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="qrequest" id="endorsement" value="endorsement"><label class="form-check-label" for="endorsement">Endorsement</label></div>'
                //     );
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




    var _token = jQuery('input[name="_token"]').val();
    //2nd changes // OBLIGEE API
//     $.ajax({
//     url: "{{ url('/get-quote/get_obligee_api') }}",
//     method: 'POST',
//     data: { _token: _token },
//     success: function (data1) {
//         $.ajax({
//             url: "{{ url('/get-quote/get_obligee2_api') }}",
//             method: 'POST',
//             data: { _token: _token },
//             success: function (data2) {
//                 // Merge the data from both tables
//                 var mergedData = data1.concat(data2);

//                 // Filter out null values and sort the merged data based on a specific property (e.g., 'obligee_name')
//                 mergedData = mergedData.filter(function(obligee) {
//                     return obligee.obligee_name !== null;
//                 }).sort(function(a, b) {
//                     return a.obligee_name.localeCompare(b.obligee_name);
//                 });

//                 // Process the sorted merged data and add it to the dropdown
//                 mergedData.forEach(function (obligee) {
//                     var optionHtml = '<option value="' + obligee.obligee_name + '">' + ' ' + obligee.obligee_name + '</option>';
//                     $('#obligee').append(optionHtml);
//                 });
//             }
//         });
//     }
// });




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
                            console.log(selectedAgent);
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
                            $('#id_type').val(selectedAgent.prin_id_type);
                            $('#id_no').val(selectedAgent.prin_id_no);
                            $('#principal_name').val(selectedAgent.principal_signatory);
                            $('#principal_post').val(selectedAgent.prin_position);
                            $('#cosigner_name').val(selectedAgent.co_signer);
                            $('#cosigner_position').val(selectedAgent.cosign_position);
                            $('#cosigner_id_type').val(selectedAgent.cosign_id_type);
                            $('#cosigner_id_no').val(selectedAgent.cosign_id_no);
                            $('#assured_no_owner, #assured_no_office').val(selectedAgent.assured_no);

                            $('#owner_name').val(selectedAgent.owner_name);
                            $('#owner_post').val(selectedAgent.owner_post);
                            $('#officer_name').val(selectedAgent.officer_name);
                            $('#officer_post').val(selectedAgent.officer_post);



                        }
                    }
                });

                dropdownMenu.hide();
            });
        });



        $(document).ready(function() {
        $('#acode').change(function() {
            var agentName = $(this).find(':selected').text();
             var cleanedAgentName =  agentName.slice(agentName.indexOf('-') + 1).trim();
             $('#agent').val(cleanedAgentName);


        });
    });
    //
    //-----------------------------------------------DELETE ---------------------------------//
    $(document).on('click', '.delete_requirement', function() {

        //var SITEURL = '{{ URL::to('') }}';
        var remarks_id = $(this).attr('id');
        var trans_id = $("input[name='transno']").val();
        var trans_id = $("input[name='transno']").val();

        if (confirm("Are You sure want to delete?")) {
            $.ajax({
                url: "{{ url('/get-quote/bondsdeletequoterequirement') }}" + "/" +
                    remarks_id + "/" + trans_id,
                success: function(data) {

                    var table = jQuery('#requirement_table').DataTable();
                    table.ajax.reload();

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



    $(document).on('click', '.delete_principal', function() {

        //var SITEURL = '{{ URL::to('') }}';
        var principal_id = $(this).attr('id');
        var trans_id = $("input[name='transno']").val();

        if (confirm("Are You sure want to delete?")) {
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

        if (confirm("Are You sure want to delete?")) {
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

        if (confirm("Are You sure want to delete?")) {
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
                console.log(data);
                $('#financial_remarks').html(data);

            },
            error: function() {

            }
        });
    }

    //-----------------------------------------END dELETE ------------------------------------//
</script>




<script type="text/javascript">
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

        var current = 1;
        $('.NoPaste').on("cut copy paste", function(e) {
            e.preventDefault();
        });

        $(".validation_date_of_Birth_personal_info").on('keypress', function(event) {
            var regex = new RegExp("^[]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $('input[name=coverage_complete]').val("");
        jQuery('#warning_coverage_package').css("display", "none");
        jQuery('#warning_coverage_no').css("display", "none");
        widget = $(".step");
        btnnext = $(".next");
        btnnextsave = $(".next_save");
        btnback = $(".back");
        btnsubmit = $(".submit");
        btnNew = $(".NewApplicant");
        btncheck = $(".CheckCoverage");
        btnAdd = $(".addApplicant");
        btnNextPage = $(".next_2ndpage");
        btncheck_occ = $("#btn_back_to_applicant_occupation");
        btncheck_pwd = $("#btn_back_to_applicant");
        btn4thpage_add = $(".4thpage_add");
        btn4thpage_add_cruise = $(".4thpage_add_cruise");
        btn5thpage_add = $(".5thpage_add");
        btnsubmit_lastpage = $(".btnsubmit");
        btn5thpage_add_bene = $(".5thpage_add_bene");

        // Init buttons and UI
        widget.not(':eq(0)').hide();
        hideButtons(current);
        setProgress(current);


        btnsubmit_lastpage.click(function() {
            if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {
                $("#warning_summary").show();
                return false;
            }
        });




        // Next button click action
            btnnextsave.click(function() {

            if (current < widget.length) {
                btnback.show();
                //coverage
                errornumber = 0;
                     if (current == 1) {

                    $(".validation_client_info").remove();
                    $(".validation_client_check_error").remove();
                    $(".validation_client_check_success").remove();

                    $(".validation_req_info").remove();
                    $(".validation_req_error").remove();
                    $(".validation_req_success").remove();


                    if ($('#newclient').is(':checked') || $('#oldClient').is(':checked')) {
                    // User has selected a radio button
                    $('#oldclientlabel, #newclientlabel,#clientlabel').css('color', '#373737');
                    } else {
                    // User has not selected a radio button
                    errornumber = 1;
                    $('#oldclientlabel, #newclientlabel,#clientlabel').css('color', '#b94a48');
                    $("#client_validate").after(
                            "<div class='validation_client_info v-error-msg'>Client is empty</div>"
                        );
                    }


                    if ($('#quoteNew').is(':checked') || $('#issueNew').is(':checked') || $('#endorsement').is(':checked')) {
                    // User has selected a radio button
                    $('#reqquote, #reqissue,#reqendo,#reqlabel').css('color', '#373737');
                    } else {
                    // User has not selected a radio button
                    errornumber = 1;
                    $('#reqquote, #reqissue,#reqendo,#reqlabel').css('color', '#b94a48');
                    $("#reqm").after(
                            "<div class='validation_req_info v-error-msg'>Request is empty</div>"
                        );
                    }

                    var clientValue = $('form input[name=client]:checked').val();
                    if (clientValue === "Old") {
                        if ($('#quoteNew').is(':checked')){

                            $(".validation_contact_person_info").remove();
                            $(".validation_contact_person_info_check_error").remove();
                            $(".validation_contact_person_info_check_success").remove();

                            $(".validation_contact_no_info").remove();
                            $(".validation_contact_no_info_check_error").remove();
                            $(".validation_contact_no_info_check_success").remove();

                            $(".validation_principal_show_list_info").remove();
                            $(".validation_principal_show_list_info_error").remove();
                            $(".validation_principal_show_list_info_check_success").remove();

                            $(".validation_obligee_info").remove();
                            $(".validation_obligee_check_error").remove();
                            $(".validation_obligee_check_success").remove();


                            $(".validation_project_info").remove();
                            $(".validation_project_check_error").remove();
                            $(".validation_project_check_success").remove();

                            $(".validation_contract_price_info").remove();
                            $(".validation_contract_price_check_error").remove();
                            $(".validation_contract_price_check_success").remove();


                            if ($('#contact_person').val() == "") {
                                $("#contact_person").after(
                                    "<div class='validation_contact_person_info v-error-msg'>Please update Contact Person in Geniisys</div>"
                                );
                                $('#contact_person').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contact_person').fieldSuccessState();
                            }

                            if ($('#contact_no').val() == "") {
                                $("#contact_no").after(
                                    "<div class='validation_contact_no_info v-error-msg'>Please update Contact Number in Geniisys</div>"
                                );
                                $('#contact_no').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contact_no').fieldSuccessState();
                            }

                            if ($('#principal_show_list').val() == "") {
                                $("#principal_show_list").after(
                                    "<div class='validation_principal_show_list_info v-error-msg'>Principal is empty</div>"
                                );
                                $('#principal_show_list').fieldErrorState();
                                errornumber = 1;
                                } else {
                                    $('#principal_show_list').fieldSuccessState();
                                }


                                if ($('#obligee').val() == "") {
                                            if ($('#obligee2').val() != "") {
                                                $('#obligee').val($('#obligee2').val()); // Use the value from obligee2
                                                $('#obligee').fieldSuccessState();
                                            } else {
                                                $("#obligee").after(
                                                    "<div class='validation_obligee_info v-error-msg'>Obligee is empty</div>"
                                                );
                                                $("#obligee2").after(
                                                    "<div class='validation_obligee_info v-error-msg'>&nbsp;&nbsp;&nbsp;</div>"
                                                );
                                                $('#obligee').fieldErrorState();
                                                errornumber = 1;
                                            }
                                        } else {
                                            $('#obligee').fieldSuccessState();
                                        }


                            if ($('#project').val() == "") {
                                $("#project").after(
                                    "<div class='validation_project_info v-error-msg'>Project is empty</div>"
                                );
                                $('#project').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#project').fieldSuccessState();
                            }

                            if ($('#contract_price').val() == "") {
                                $("#contract_price").after(
                                    "<div class='validation_contract_price_info v-error-msg'>Contract Price is empty</div>"
                                );
                                $('#contract_price').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contract_price').fieldSuccessState();
                            }

                            $(".validation_acode_info").remove();
                            $(".validation_acode_info_check_error").remove();
                            $(".validation_acode_info_check_success").remove();
                            $('#acode').fieldSuccessState();

                            $(".validation_agent_info").remove();
                            $(".validation_agent_info_check_error").remove();
                            $(".validation_agent_info_check_success").remove();
                            $('#agent').fieldSuccessState();

                            $(".validation_address_info").remove();
                            $(".validation_address_info_check_error").remove();
                            $(".validation_address_info_check_success").remove();
                            $('#address').fieldSuccessState();

                            $(".validation_date_incorp_info").remove();
                            $(".validation_date_incorp_info_check_error").remove();
                            $(".validation_date_incorp_info_check_success").remove();
                            $('#date_incorp').fieldSuccessState();

                            $(".validation_company_tin_info").remove();
                            $(".validation_company_tin_info_check_error").remove();
                            $(".validation_company_tin_info_check_success").remove();
                            $('#company_tin').fieldSuccessState();

                            $(".validation_email_info").remove();
                            $(".validation_email_info_check_error").remove();
                            $(".validation_email_info_check_success").remove();
                            $("#email").fieldSuccessState();


                            $(".validation_undertaking_info").remove();
                            $(".validation_undertaking_check_error").remove();
                            $(".validation_undertaking_check_success").remove();
                            $('#undertaking').fieldSuccessState();

                            $(".validation_company_bgd_info").remove();
                            $(".validation_company_bgd_check_error").remove();
                            $(".validation_company_bgd_check_success").remove();
                            $('#company_bgd').fieldSuccessState();

                        }else{
                            $(".validation_acode_info").remove();
                            $(".validation_acode_info_check_error").remove();
                            $(".validation_acode_info_check_success").remove();


                            $(".validation_agent_info").remove();
                            $(".validation_agent_info_check_error").remove();
                            $(".validation_agent_info_check_success").remove();

                            $(".validation_address_info").remove();
                            $(".validation_address_info_check_error").remove();
                            $(".validation_address_info_check_success").remove();

                            $(".validation_date_incorp_info").remove();
                            $(".validation_date_incorp_info_check_error").remove();
                            $(".validation_date_incorp_info_check_success").remove();

                            // $(".validation_contact_person_info").remove();
                            // $(".validation_contact_person_info_check_error").remove();
                            // $(".validation_contact_person_info_check_success").remove();

                            // $(".validation_contact_no_info").remove();
                            // $(".validation_contact_no_info_check_error").remove();
                            // $(".validation_contact_no_info_check_success").remove();

                            $(".validation_company_tin_info").remove();
                            $(".validation_company_tin_info_check_error").remove();
                            $(".validation_company_tin_info_check_success").remove();

                            $(".validation_email_info").remove();
                            $(".validation_email_info_check_error").remove();
                            $(".validation_email_info_check_success").remove();

                            $(".validation_obligee_info").remove();
                            $(".validation_obligee_check_error").remove();
                            $(".validation_obligee_check_success").remove();

                            $(".validation_project_info").remove();
                            $(".validation_project_check_error").remove();
                            $(".validation_project_check_success").remove();

                            $(".validation_contract_price_info").remove();
                            $(".validation_contract_price_check_error").remove();
                            $(".validation_contract_price_check_success").remove();

                            $(".validation_undertaking_info").remove();
                            $(".validation_undertaking_check_error").remove();
                            $(".validation_undertaking_check_success").remove();

                            $(".validation_company_bgd_info").remove();
                            $(".validation_company_bgd_check_error").remove();
                            $(".validation_company_bgd_check_success").remove();

                            $(".validation_principal_info").remove();
                            $(".validation_principal_check_error").remove();
                            $(".validation_principal_info_check_success").remove();

                            $(".validation_principal_show_list_info").remove();
                            $(".validation_principal_show_list_info_error").remove();
                            $(".validation_principal_show_list_info_check_success").remove();


                            if ($('#acode').val() == "") {
                                $("#acode").after(
                                    "<div class='validation_acode_info v-error-msg'>Agent Code is empty</div>"
                                );
                                $('#acode').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#acode').fieldSuccessState();
                            }

                            if ($('#agent').val() == "") {
                                $("#agent").after(
                                    "<div class='validation_agent_info v-error-msg'>Agent Name is empty</div>"
                                );
                                $('#agent').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#agent').fieldSuccessState();
                            }


                            if ($('#contact_person').val() == "") {
                                $("#contact_person").after(
                                    "<div class='validation_contact_person_info v-error-msg'>Please update Contact Person in Geniisys</div>"
                                );
                                $('#contact_person').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contact_person').fieldSuccessState();
                            }
                            if ($('#contact_no').val() == "") {
                                $("#contact_no").after(
                                    "<div class='validation_contact_no_info v-error-msg'>Please update Contact Number in Geniisys</div>"
                                );
                                $('#contact_no').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contact_no').fieldSuccessState();
                            }

                            if ($('#principal_show_list').val() == "") {
                                $("#principal_show_list").after(
                                    "<div class='validation_principal_show_list_info v-error-msg'>Principal is empty</div>"
                                );
                                $('#principal_show_list').fieldErrorState();
                                errornumber = 1;
                                } else {
                                    $('#principal_show_list').fieldSuccessState();
                                }


                                if ($('#obligee').val() == "") {
                                    if ($('#obligee2').val() != "") {
                                        $('#obligee').val($('#obligee2').val()); // Use the value from obligee2
                                        $('#obligee').fieldSuccessState();
                                    } else {
                                        $("#obligee").after(
                                            "<div class='validation_obligee_info v-error-msg'>Obligee is empty</div>"
                                        );
                                        $("#obligee2").after(
                                            "<div class='validation_obligee_info v-error-msg'>&nbsp;&nbsp;&nbsp;</div>"
                                        );
                                        $('#obligee').fieldErrorState();
                                        errornumber = 1;
                                    }
                                } else {
                                    $('#obligee').fieldSuccessState();
                                }

                                if ($('#address').val() == "") {
                                $("#address").after(
                                    "<div class='validation_address_info v-error-msg'>Please update address in Geniisys   </div>"
                                );
                                $('#address').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#address').fieldSuccessState();
                            }

                            if ($('#date_incorp').val() == "") {
                                $("#date_incorp").after(
                                    "<div class='validation_date_incorp_info v-error-msg'> Please update Date of Incorporation in Geniisys</div>"
                                );
                                $('#date_incorp').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#date_incorp').fieldSuccessState();
                            }

                            if ($('#company_tin').val() == "") {
                                $("#company_tin").after(
                                    "<div class='validation_company_tin_info v-error-msg'>Please update Company TIN in Geniisys</div>"
                                );
                                $('#company_tin').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#company_tin').fieldSuccessState();
                            }


                            if ($('#email').val() == "") {
                                $("#email").after(
                                    "<div class='validation_email_info v-error-msg'>Please update Email address in Geniisys</div>"
                                    );
                                $("#email").fieldErrorState();
                                errornumber = 1;
                            } else {
                                if (IsEmail($('#email').val()) == false) {
                                    $("#email").after(
                                        "<div class='validation_email_info v-error-msg'>Invalid format</div>"
                                        );
                                    $("#email").fieldErrorState();
                                    errornumber = 1;
                                } else {
                                    $("#email").fieldSuccessState();
                                }
                            }

                            if ($('#project').val() == "") {
                                            $("#project").after(
                                                "<div class='validation_project_info v-error-msg'>Project is empty</div>"
                                            );
                                            $('#project').fieldErrorState();
                                            errornumber = 1;
                                        } else {
                                            $('#project').fieldSuccessState();
                                        }
                                        if ($('#contract_price').val() == "") {
                                            $("#contract_price").after(
                                                "<div class='validation_contract_price_info v-error-msg'>Contract Price is empty</div>"
                                            );
                                            $('#contract_price').fieldErrorState();
                                            errornumber = 1;
                                        } else {
                                            $('#contract_price').fieldSuccessState();
                                        }

                            if ($('#undertaking').val() == "") {
                                $("#undertaking").after(
                                    "<div class='validation_undertaking_info v-error-msg'>Undertaking is empty</div>"
                                );
                                $('#undertaking').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#undertaking').fieldSuccessState();
                            }

                            if ($('#company_bgd').val() == "") {
                                $("#company_bgd").after(
                                    "<div class='validation_company_bgd_info v-error-msg'>Company is empty</div>"
                                );
                                $('#company_bgd').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#company_bgd').fieldSuccessState();
                            }






                        }// ENDOF CONDITON FOR QUOTE Or ISSUED
                    }else{ // CONDITIONF OR  NEW  OR OLD  xx
                        if ($('#quoteNew').is(':checked')){

                            $(".validation_contact_person_info").remove();
                            $(".validation_contact_person_info_check_error").remove();
                            $(".validation_contact_person_info_check_success").remove();

                            $(".validation_contact_no_info").remove();
                            $(".validation_contact_no_info_check_error").remove();
                            $(".validation_contact_no_info_check_success").remove();

                            $(".validation_principal_info").remove();
                            $(".validation_principal_check_error").remove();
                            $(".validation_principal_info_check_success").remove();


                            $(".validation_obligee_info").remove();
                            $(".validation_obligee_check_error").remove();
                            $(".validation_obligee_check_success").remove();


                            $(".validation_project_info").remove();
                            $(".validation_project_check_error").remove();
                            $(".validation_project_check_success").remove();

                            $(".validation_contract_price_info").remove();
                            $(".validation_contract_price_check_error").remove();
                            $(".validation_contract_price_check_success").remove();


                            // if ($('#contact_person').val() == "") {
                            //     $("#contact_person").after(
                            //         "<div class='validation_contact_person_info v-error-msg'>Contact Person is empty</div>"
                            //     );
                            //     $('#contact_person').fieldErrorState();
                            //     errornumber = 1;
                            // } else {
                            //     $('#contact_person').fieldSuccessState();
                            // }

                            // if ($('#contact_no').val() == "") {
                            //     $("#contact_no").after(
                            //         "<div class='validation_contact_no_info v-error-msg'>Contact Number is empty</div>"
                            //     );
                            //     $('#contact_no').fieldErrorState();
                            //     errornumber = 1;
                            // } else {
                            //     $('#contact_no').fieldSuccessState();
                            // }

                            if ($('#principal').val() == "") {
                                    $("#principal").after(
                                        "<div class='validation_principal_info v-error-msg'>Principal is empty</div>"
                                    );
                                    $('#principal').fieldErrorState();

                                    errornumber = 1;
                                } else {
                                    $('#principal').fieldSuccessState();
                                }


                                if ($('#obligee').val() == "") {
                                            if ($('#obligee2').val() != "") {
                                                $('#obligee').val($('#obligee2').val()); // Use the value from obligee2
                                                $('#obligee').fieldSuccessState();
                                            } else {
                                                $("#obligee").after(
                                                    "<div class='validation_obligee_info v-error-msg'>Obligee is empty</div>"
                                                );
                                                $("#obligee2").after(
                                                    "<div class='validation_obligee_info v-error-msg'>&nbsp;&nbsp;&nbsp;</div>"
                                                );
                                                $('#obligee').fieldErrorState();
                                                errornumber = 1;
                                            }
                                        } else {
                                            $('#obligee').fieldSuccessState();
                                        }


                            if ($('#project').val() == "") {
                                $("#project").after(
                                    "<div class='validation_project_info v-error-msg'>Project is empty</div>"
                                );
                                $('#project').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#project').fieldSuccessState();
                            }

                            if ($('#contract_price').val() == "") {
                                $("#contract_price").after(
                                    "<div class='validation_contract_price_info v-error-msg'>Contract Price is empty</div>"
                                );
                                $('#contract_price').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contract_price').fieldSuccessState();
                            }

                            $(".validation_acode_info").remove();
                            $(".validation_acode_info_check_error").remove();
                            $(".validation_acode_info_check_success").remove();
                            $('#acode').fieldSuccessState();

                            $(".validation_agent_info").remove();
                            $(".validation_agent_info_check_error").remove();
                            $(".validation_agent_info_check_success").remove();
                            $('#agent').fieldSuccessState();

                            $(".validation_address_info").remove();
                            $(".validation_address_info_check_error").remove();
                            $(".validation_address_info_check_success").remove();
                            $('#address').fieldSuccessState();

                            $(".validation_date_incorp_info").remove();
                            $(".validation_date_incorp_info_check_error").remove();
                            $(".validation_date_incorp_info_check_success").remove();
                            $('#date_incorp').fieldSuccessState();

                            $(".validation_company_tin_info").remove();
                            $(".validation_company_tin_info_check_error").remove();
                            $(".validation_company_tin_info_check_success").remove();
                            $('#company_tin').fieldSuccessState();

                            $(".validation_email_info").remove();
                            $(".validation_email_info_check_error").remove();
                            $(".validation_email_info_check_success").remove();
                            $("#email").fieldSuccessState();


                            $(".validation_undertaking_info").remove();
                            $(".validation_undertaking_check_error").remove();
                            $(".validation_undertaking_check_success").remove();
                            $('#undertaking').fieldSuccessState();

                            $(".validation_company_bgd_info").remove();
                            $(".validation_company_bgd_check_error").remove();
                            $(".validation_company_bgd_check_success").remove();
                            $('#company_bgd').fieldSuccessState();

                            }else{
                            $(".validation_acode_info").remove();
                            $(".validation_acode_info_check_error").remove();
                            $(".validation_acode_info_check_success").remove();


                            $(".validation_agent_info").remove();
                            $(".validation_agent_info_check_error").remove();
                            $(".validation_agent_info_check_success").remove();

                            $(".validation_address_info").remove();
                            $(".validation_address_info_check_error").remove();
                            $(".validation_address_info_check_success").remove();

                            $(".validation_date_incorp_info").remove();
                            $(".validation_date_incorp_info_check_error").remove();
                            $(".validation_date_incorp_info_check_success").remove();

                            $(".validation_contact_person_info").remove();
                            $(".validation_contact_person_info_check_error").remove();
                            $(".validation_contact_person_info_check_success").remove();

                            $(".validation_contact_no_info").remove();
                            $(".validation_contact_no_info_check_error").remove();
                            $(".validation_contact_no_info_check_success").remove();

                            $(".validation_company_tin_info").remove();
                            $(".validation_company_tin_info_check_error").remove();
                            $(".validation_company_tin_info_check_success").remove();

                            $(".validation_email_info").remove();
                            $(".validation_email_info_check_error").remove();
                            $(".validation_email_info_check_success").remove();

                            $(".validation_obligee_info").remove();
                            $(".validation_obligee_check_error").remove();
                            $(".validation_obligee_check_success").remove();

                            $(".validation_project_info").remove();
                            $(".validation_project_check_error").remove();
                            $(".validation_project_check_success").remove();

                            $(".validation_contract_price_info").remove();
                            $(".validation_contract_price_check_error").remove();
                            $(".validation_contract_price_check_success").remove();

                            $(".validation_undertaking_info").remove();
                            $(".validation_undertaking_check_error").remove();
                            $(".validation_undertaking_check_success").remove();

                            $(".validation_company_bgd_info").remove();
                            $(".validation_company_bgd_check_error").remove();
                            $(".validation_company_bgd_check_success").remove();

                            $(".validation_principal_info").remove();
                            $(".validation_principal_check_error").remove();
                            $(".validation_principal_info_check_success").remove();

                            $(".validation_principal_show_list_info").remove();
                            $(".validation_principal_show_list_info_error").remove();
                            $(".validation_principal_show_list_info_check_success").remove();


                            if ($('#acode').val() == "") {
                                $("#acode").after(
                                    "<div class='validation_acode_info v-error-msg'>Agent Code is empty</div>"
                                );
                                $('#acode').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#acode').fieldSuccessState();
                            }

                            if ($('#agent').val() == "") {
                                $("#agent").after(
                                    "<div class='validation_agent_info v-error-msg'>Agent Name is empty</div>"
                                );
                                $('#agent').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#agent').fieldSuccessState();
                            }


                            if ($('#contact_person').val() == "") {
                                $("#contact_person").after(
                                    "<div class='validation_contact_person_info v-error-msg'> Contact Person is empty</div>"
                                );
                                $('#contact_person').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contact_person').fieldSuccessState();
                            }
                            if ($('#contact_no').val() == "") {
                                $("#contact_no").after(
                                    "<div class='validation_contact_no_info v-error-msg'> Contact Number is empty</div>"
                                );
                                $('#contact_no').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#contact_no').fieldSuccessState();
                            }

                            if ($('#principal').val() == "") {
                                    $("#principal").after(
                                        "<div class='validation_principal_info v-error-msg'>Principal is empty</div>"
                                    );
                                    $('#principal').fieldErrorState();

                                    errornumber = 1;
                                } else {
                                    $('#principal').fieldSuccessState();
                                }

                                if ($('#obligee').val() == "") {
                                    if ($('#obligee2').val() != "") {
                                        $('#obligee').val($('#obligee2').val()); // Use the value from obligee2
                                        $('#obligee').fieldSuccessState();
                                    } else {
                                        $("#obligee").after(
                                            "<div class='validation_obligee_info v-error-msg'>Obligee is empty</div>"
                                        );
                                        $("#obligee2").after(
                                            "<div class='validation_obligee_info v-error-msg'>&nbsp;&nbsp;&nbsp;</div>"
                                        );
                                        $('#obligee').fieldErrorState();
                                        errornumber = 1;
                                    }
                                } else {
                                    $('#obligee').fieldSuccessState();
                                }

                                if ($('#address').val() == "") {
                                $("#address").after(
                                    "<div class='validation_address_info v-error-msg'>Address is empty </div>"
                                );
                                $('#address').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#address').fieldSuccessState();
                            }

                            if ($('#date_incorp').val() == "") {
                                $("#date_incorp").after(
                                    "<div class='validation_date_incorp_info v-error-msg'>Date of Incorporation is empty</div>"
                                );
                                $('#date_incorp').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#date_incorp').fieldSuccessState();
                            }

                            if ($('#company_tin').val() == "") {
                                $("#company_tin").after(
                                    "<div class='validation_company_tin_info v-error-msg'>Company TIN is empty</div>"
                                );
                                $('#company_tin').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#company_tin').fieldSuccessState();
                            }


                            if ($('#email').val() == "") {
                                $("#email").after(
                                    "<div class='validation_email_info v-error-msg'>Email address is empty</div>"
                                    );
                                $("#email").fieldErrorState();
                                errornumber = 1;
                            } else {
                                if (IsEmail($('#email').val()) == false) {
                                    $("#email").after(
                                        "<div class='validation_email_info v-error-msg'>Invalid format</div>"
                                        );
                                    $("#email").fieldErrorState();
                                    errornumber = 1;
                                } else {
                                    $("#email").fieldSuccessState();
                                }
                            }

                            if ($('#project').val() == "") {
                                            $("#project").after(
                                                "<div class='validation_project_info v-error-msg'>Project is empty</div>"
                                            );
                                            $('#project').fieldErrorState();
                                            errornumber = 1;
                                        } else {
                                            $('#project').fieldSuccessState();
                                        }
                                        if ($('#contract_price').val() == "") {
                                            $("#contract_price").after(
                                                "<div class='validation_contract_price_info v-error-msg'>Contract Price is empty</div>"
                                            );
                                            $('#contract_price').fieldErrorState();
                                            errornumber = 1;
                                        } else {
                                            $('#contract_price').fieldSuccessState();
                                        }

                            if ($('#undertaking').val() == "") {
                                $("#undertaking").after(
                                    "<div class='validation_undertaking_info v-error-msg'>Undertaking is empty</div>"
                                );
                                $('#undertaking').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#undertaking').fieldSuccessState();
                            }

                            if ($('#company_bgd').val() == "") {
                                $("#company_bgd").after(
                                    "<div class='validation_company_bgd_info v-error-msg'>Company is empty</div>"
                                );
                                $('#company_bgd').fieldErrorState();
                                errornumber = 1;
                            } else {
                                $('#company_bgd').fieldSuccessState();
                            }






                            }

                    }// end of else conditon  xx




                    if (errornumber == 1) {
                        // TO stop at the top natural request
                        var targetOffset = $('#naturalid').offset().top;
                        $('html, body').animate({ scrollTop: targetOffset }, 'slow');
                        return false;
                    } else {

                        jQuery('#nextbutton').hide();
                        jQuery('#submitForm').submit(function(e) {
                            e.preventDefault();
                            var trans_id = $("input[name='transno']").val();
                            $("#copytransno").val(trans_id);
                            if (trans_id == "") {
                                trans_id = "0";
                                $("input[name='transno']").val("0");
                                $("input[name='transno1']").val("0");
                            } else {
                                $("input[name='transno1']").val(trans_id);
                                $("input[name='transno']").val(trans_id);


                            }

                            let formData = new FormData(this);
                            formData.append('_token', $('meta[name="csrf-token"]').attr(
                                'content')); // ad
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('savequotebonds') }}",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: (response) => {
                                    console.log(response);


                                    var message = response.message;
                                    var transno = response.transno;
                                    $("#transno").text(transno);
                                    $("#transno1").text(transno);
                                    // Set the success message in the modal
                                    $("#firstPageMessagetext").text(message);
                                    // Show the modal
                                    $("#firstPageMessage").show();
                                    // Close the modal when the close button is clicked
                                    $(".close").click(function() {
                                    $("#firstPageMessage").hide();
                                    });
                                    $(".closebtn").click(function() {
                                        $("#firstPageMessage").hide();
                                    });
                                    $('#transno').val(response.transno);
                                    $("#copytransno").val(response.transno);
                                    widget.show();
                                    // widget.not(':eq('+(current++)+')').hide();
                                    current = 2;
                                    setProgress(current);

                                },
                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        });
                    }

                }



            }
            hideButtons(current);
        });



        $("#date_bterm1").change(function() {

            $("input[name='date_bterm2']").val("");
            $("input[name='multiplier']").val("");
            $("input[name='annual_rate']").val("");
            $("input[name='annual_premium']").val("");
            $("input[name='term_premium']").val("");

        });

        $("#date_bterm2").change(function() {

            setTimeout(function() {
                var trans_id = $("input[name='transno']").val();

                $.ajax({
                    url: "{{ url('/get-quote/bonds-calcpremium') }}",
                    method: "POST",
                    data: $('#form_requirement').serialize() + "&trans_id=" + trans_id,
                    dataType: 'json',
                    success: function(response) {
                        //------------------------
                        if ($.isEmptyObject(response.error)) {

                            $("input[name='multiplier']").val(response.multiplier);
                            $("input[name='annual_rate']").val(response
                                .annual_rate);
                            $("input[name='annual_premium']").val(response
                                .annual_premium);
                            $("input[name='term_premium']").val(response
                                .annual_premium);


                        }
                        //--------------------------
                    }

                });
            }, 1);

        });

        // --- BOND REQUIREMENTS BOND REQUIREMENTS  BOND REQUIREMENTS BOND REQUIREMENTS BOND REQUIREMENTS BOND REQUIREMENTS----//
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
        $('#sendform_calc').click(function(e) {
            e.preventDefault();
            jQuery.noConflict();
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
                $('#date_bterm2').fieldErrorState();
                errornumber = 1;
            } else {
                $('#date_bterm2').fieldSuccessState();
            }
            if ($('#bond_amount').val() == "") {
                $('#bond_amount').fieldErrorState();
                errornumber = 1;
            } else {
                $('#bond_amount').fieldSuccessState();
            }



            if (errornumber == 1) {
                return false;
            } else {

                var trans_id = $("input[name='transno']").val();
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ url('/get-quote/bonds-calcpremium') }}",
                    method: "POST",
                    data: $('#form_requirement').serialize() + "&trans_id=" + trans_id +
                        "&_token=" + csrf_token,
                    dataType: 'json',
                    success: function(response) {
                        $("#sendform_requirement").prop("disabled", false);
                        if ($.isEmptyObject(response.error)) {
                                if (response.annual_rate === '0.288') {
                                $("input[name='annual_rate_update_tarif']").val("Tarif");
                                }else{
                                    $("input[name='annual_rate_update_tarif']").val(response.annual_rate  + '%');
                                }
                                $("input[name='multiplier']").val(response.multiplier);
                                $("input[name='annual_rate']").val(response.annual_rate  + '%');
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
            }
        });
        jQuery(document).ready(function() {
            jQuery(".DataTables_length select").selectpicker({
                'width': '60px',
                'background-color': 'white'

            });

        });


            jQuery(document).on('click', '#sendform_requirement', function() {
            jQuery.noConflict();
            var trans_id = $("input[name='transno']").val();
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
            } else {
                $('#sendform_requirement').html('Saving...');

                /* Submit form data using ajax*/
                $.ajax({
                    url: "{{ url('/get-quote/addbondsquoterequirement') }}",
                    method: "POST",
                    data: $('#form_requirement').serialize() + "&trans_id=" + trans_id +
                        "&_token=" + csrf_token,
                    dataType: 'json',
                    success: function(response) {
                            $('#contract_price').prop('readonly', true);
                            $("#policy_type").prop("disabled", true);
                            $("#account_type").prop("disabled", true);
                            // $("#bond_req").prop("disabled", true);

                            jQuery('#date_bterm1').val('');
                            jQuery('#date_bterm2').val('');
                            jQuery('#bond_amount').val('');
                            jQuery('#bonds_requirement').val('');
                            jQuery('#proposed_retention').val('');
                            jQuery('#multiplier').val('');
                            jQuery('#annual_rate').val('');
                            jQuery('#annual_rate_update_tarif').val('');

                            jQuery('#annual_premium').val('');
                            jQuery('#term_premium').val('');


                            jQuery('#in_force_policies, #bonds_applied, #total, #expired_policies, ' +
                            '#in_force_policies1, #bonds_applied1, #total1, #expired_policies1, ' +
                            '#in_force_policies2, #bonds_applied2, #total2, #expired_policies2, ' +
                            '#total_1, #total_2, #total_3, #total_4').val('');

                        var checkVal = $('.addnew').val();
                        var trans_id = $("input[name='transno']").val();
                        $('#totalanualprem').val(response.totalanualprem);
                        if ($.isEmptyObject(response.error)) {


                            $('#alert_msg11').hide();
                            $('#sendform_requirement').html('Add');

                            $('#bonds_req01').show();
                            $('#req_bond').text(response.success);
                            $('#msg_div11').removeClass('d-none');
                            // $('#form_requirement').trigger("reset");

                            if (checkVal === '') {
                                var table = jQuery('#requirement_table').DataTable({
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
                                            console.log('cocogen.com');

                                        }
                                    },
                                    columns: [{
                                            data: 'id',
                                            name: 'id',
                                            visible: false
                                        },
                                        {
                                            data: 'bond_type',
                                            name: 'bond_type'
                                        },
                                        {
                                            data: 'bonds_requirement',
                                            name: 'bonds_requirement',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data) + '%';
                                            }
                                        },
                                        {
                                            data: 'proposed_retention',
                                            name: 'proposed_retention',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data) + '%';
                                            }
                                        },
                                        {
                                            data: 'bond_amt',
                                            name: 'bond_amt',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data)
                                                    .toFixed(2).replace(
                                                        /\d(?=(\d{3})+\.)/g,
                                                        '$&,');
                                            }
                                        },
                                        {
                                            data: 'annual_rate',
                                            name: 'annual_rate',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data) + '%';
                                            }
                                        },
                                        {
                                            data: 'annual_premium',
                                            name: 'annual_premium',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data)
                                                    .toFixed(2).replace(
                                                        /\d(?=(\d{3})+\.)/g,
                                                        '$&,');
                                            }
                                        },
                                        {
                                            data: 'bond_term',
                                            name: 'bond_term'
                                        },
                                        {
                                            data: 'term_premium',
                                            name: 'term_premium',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data)
                                                    .toFixed(2).replace(
                                                        /\d(?=(\d{3})+\.)/g,
                                                        '$&,');
                                            }
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            orderable: false
                                        },
                                    ],
                                    fnInfoCallback: function(settings, start, end,
                                        max, total, pre) {
                                        if (total == 0) {
                                            return "No data available";
                                        }
                                        return "Showing " + start + " to " +
                                            end + " of " + total + " entries";
                                    }

                                });
                                var checkVal = $('.addnew').val('1');


                            } else {

                                var table = jQuery('#requirement_table').DataTable();
                                table.ajax.reload();
                                var checkVal = $('.addnew').val('1');

                            }

                            $("#sendform_requirement").prop("disabled", true);

                        } else {
                            $("#sendform_requirement").prop("disabled", true);
                            $('#msg_div11').hide();
                            $('#sendform_requirement').html('Add');
                            $('#bonds_req02').show();
                            $('#req_bond_failed').text(response.error);


                        }

                        setTimeout(function() {
                            $('#bonds_req_first').hide();

                        }, 10000);

                    }
                });
            }

        });


       $('#sendform_bonds').click(function(e) {

            e.preventDefault();

            var trans_id = $("input[name='transno']").val();

            var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
                                        var successMessage = response.success;
                                        // Set the success message in the modal
                                        $("#successMessage").text(successMessage);
                                        // Show the modal
                                        $("#successModal").show();
                                        // Close the modal when the close button is clicked
                                        $(".close").click(function() {
                                        $("#successModal").hide();
                                        });
                                        $(".closebtn").click(function() {
                                        $("#successModal").hide();
                                        });

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


        jQuery(document).ready(function() {

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


        $('#sendform_financial3').click(function(e) {

            e.preventDefault();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var trans_id = $("input[name='transno']").val();
            var fin_remarks = $(".fin_remarks").val();
            var errornumber = 0;

            if ($('#fin_remarks').val() == "") {
                    // $("#policy_type").after(
                    //     "<div class='validation_policy_type_info v-error-msg'>Agent Code is empty</div>"
                    // );fin_remarks
                    $('#fin_remarks').fieldErrorState();
                    errornumber = 1;
                } else {
                    $('#fin_remarks').fieldSuccessState();
                }
                if (errornumber == 1) {
                    return false;
                }


            $('#sendform_financial3').html('Saving...');

            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ url('/get-quote/addbondsfinancialremarks') }}",
                method: "POST",
                data: $('#form_financial3').serialize() + "&trans_id=" + trans_id + "&_token=" +
                    csrf_token + "&fin_remarks=" + fin_remarks,
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
                        $('#fin_remarks').val('');

                        $('#form_financial3').trigger("reset");
                        getfinancialremarks(trans_id);
                    } else {
                        $('#msg_div9').hide();
                        $('#alert_msg9').show();
                        $('#sendform_financial3').html('Post Remarks');
                        $('#res_error9').html(response.error);
                        $('#fin_remarks').val('');

                    }
                    //--------------------------
                }

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
                        $('#sendform_owner').html('Add');
                        $('#msg_div2').show();
                        $('#bonds_list_owner01').show();
                        $('#req_listowner').html(response.success);
                        $('#msg_div2').removeClass('d-none');
                        $("input[name='owner_name']").val("");
                        $("input[name='owner_post']").val("");

                        $('#form_owner').trigger("reset");
                        if (checkValowner === '') {
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
                                    { data: 'action', name: 'action', orderable: false },
                                ],
                                columnDefs: [{ "width": "40px", "targets": [2] }]
                            });
                            jQuery('.list_owner').val('1');
                        } else {
                            var table = jQuery('#owner_table').DataTable();
                            table.ajax.reload();
                            jQuery('.list_owner').val('1');
                        }
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


        //--------BOND REQUIREMENTS END BOND REQUIREMENTS END BOND REQUIREMENTS END BOND REQUIREMENTS ENDBOND REQUIREMENTS END-----------//
        function ReplaceNumberWithCommas(yourNumber) {
            //Seperates the components of the number
            var n = yourNumber.toString().split(".");
            //Comma-fies the first part
            n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            //Combines the two sections
            return n.join(".");
        }


        function parseDate(str) {
            var mdy = str.split('/');
            return new Date(mdy[2], mdy[0] - 1, mdy[1]);
        }

        function datediff(first, second) {
            // Take the difference between the dates and divide by milliseconds per day.
            // Round to nearest whole number to deal with DST.
            return Math.round((second - first) / (1000 * 60 * 60 * 24));
        }






        // Back button click action
        btnback.click(function() {
            window.location.href = "{{ url('/get-quote/bonds-home') }}/";
            // if (current == 2) {
            //     $('#nextbutton').css('display', 'block');
            //     current = current - 2;
            // }
            // if (current > 1) {

            //     current = current - 1;
            //     btnnext.trigger('click');
            // }
            hideButtons(current);
        });
    });



    // Change progress bar action
    setProgress = function(currstep) {
        var percent = parseFloat(100 / widget.length) * currstep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%");
        // .html(percent+"%");
    }

    // Hide buttons according to the current step
    // Hide buttons according to the current step
    hideButtons = function(current) {
        var limit = parseInt(widget.length);

        $(".action").hide();

        if (current < limit)
            btnnextsave.show();
        // btnnext.show();

        if (current > 1) {
            btnnextsave.show();
            // btnnext.show();
            btnback.show();
        }

        if (current == 2) {
            btnnextsave.show();
            btnnext.hide();
            btnNextPage.hide();



        }



        if (current == limit) {
            btnnextsave.show();
            btnnext.hide();
            btnsubmit.show();
            btnAdd.show();
            btnback.show();

        }
    }


    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
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


    $("#company_tin,#contact_no,#fin_year").keypress(function(event) {
        if ((event.which < 48 || event.which > 57) && event.which !== 45) {
            event.preventDefault();
        }
    });

    $('#obligee').on('change', function() {
    if ($(this).val() !== '') {
      $('#obligee2').prop('disabled', true);
    } else {
      $('#obligee2').prop('disabled', false);
    }
  });

  // Disable obligee when text is typed in obligee2
  $('#obligee2').on('input', function() {
    if ($(this).val() !== '') {
      $('#obligee').prop('disabled', true);
    } else {
      $('#obligee').prop('disabled', false);
    }
  });

  $(document).ready(function() {
  $('#contract_price, #bond_amount, #asset, #gross_income, #liabilities, #net_income, #networth, #paid_up_capital, #retained, #asset_previous, #gross_income_previous, #liabilities_previous, #net_income_previous, #networth_previous, #paid_up_capital_previous, #retained_previous, #in_force_policies, #in_force_policies1, #in_force_policies2, #bonds_applied1, #bonds_applied2, #expired_policies, #expired_policies1, #expired_policies2, #cosigner_amt, #collateral_value').change(function() {
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
            $("#endoresePolNo,#loss_xp,#owner_name,#owner_post,#officer_name,#officer_post,#collateral_type,#principal_name,#principal_post,#cosigner_name,#cosigner_position,#cosigner_property,#cosigner_property_location,#guarantee_name,#guarantee_post").on("input", function() {
                var inputValue = $(this).val();
                var sanitizedValue = sanitizeInput(inputValue);
                $(this).val(sanitizedValue);
            });

            function sanitizeInput(input) {
                // Replace any characters that are not letters, spaces, hyphens, or periods with an empty string
                var sanitized = input.replace(/[^a-zA-Z \-.]/g, "");
                return sanitized;
            }


        $("#id_type2,#id_no2,#cosigner_id_type,#cosigner_id_no,#id_type,#id_no,#collateral_item,#cosigner_property_tct").on("input", function() {
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



<style type="text/css">
    .progress {
        height: 11px;
        background-color: #F1F1F1;
        box-shadow: none;
    }

    .progress-bar {
        background: #008080;
    }

    .table-data1 .table>thead:first-child>tr:first-child>th,
    .table-data1 .table>tbody>tr>td,
    .table-data1 .table>tfoot>tr>td {
        padding: 0.8rem 0.8rem;
        border-right: 1px solid #B8B8B8;
    }
</style>
