$('.propertyClaim').click(function () {
    var _token = $('input[name="_token"]').val();
    var url = $('input[name="url"]').val();
    var id = $(this).data("id");
    $("#cb_property_view_building").prop("checked", false);
    $("#cb_property_view_stocl_building").prop("checked", false);
    $.ajax({
        url: url + '/claims/property/get/details',
        method: "GET",
        data: { _token: _token, id: id },
        success: function (result) {



            $('.posts_property').empty();
            $('.posts_property li').remove();
            $(".property_view_claim_cstocks").hide();
            $(".property_view_claim_building").hide();
            $.each(result, function (key, value) {
                var d = new Date(value.date_of_loss),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                if (month.length < 2) { month = '0' + month };
                if (day.length < 2) { day = '0' + day };
                var fulldate = month + '/' + day + '/' + year;

                if (value.status === "COMPLETED") {
                    $(".permanent_province_property_view").prop('style', 'background-color:#e9ecef');
                    $(".permanent_municipality_property_view").prop('style', 'background-color:#e9ecef');
                    $(".permanent_barangay_property_view").prop('style', 'background-color:#e9ecef');
                    $('#Loss_date_property_view').removeClass('readonly');
                    $('#Loss_time_property_view').removeClass('readonly');

                    $("#policyNo_property_view_view").prop('disabled', true);
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
                } else {
                    $(".permanent_province_property_view").prop('style', 'background-color:#fff');
                    $(".permanent_municipality_property_view").prop('style', 'background-color:#fff');
                    $(".permanent_barangay_property_view").prop('style', 'background-color:#fff');
                    $('#Loss_date_property_view').addClass('readonly');
                    $('#Loss_time_property_view').addClass('readonly');

                    $("#policyNo_property_view_view").prop('disabled', false);
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
                $('#policyNo_property_view_view').val(value.policy);
                $('#Loss_time_property_view').val(value.time_loss);
                $('#Loss_date_property_view').val(fulldate);
                $('input[name=hd_claim_motor_property_id]').val(value.id);
                $('#location_loss_property_view').val(value.location_of_loss);
                $('#status_property_view').val(value.status);
                $('#created_by_property_view').val(value.created_by);

                $('#contact_no_property_view').val(value.contact_no);
                $('#email_address_property_view').val(value.email_address);

                $('#relate_accident_property_view').val(value.damage_ralated_accident);
                $('#morgaged_to_property_view').val(value.mortgagee);
                $('#gross_estimate_property_view').val(ReplaceNumberWithCommas(value.gross_amount));

                $('#property_view_first_name_owner').val(value.first_name);
                $('#property_view_middle_name_owner').val(value.middle_name);
                $('#property_view_last_name_owner').val(value.last_name);
                $('#property_view_acc_happen').val(value.accident_happen);
                $('#property_view_acc_happen').text(value.accident_happen);





                if (value.cat_loss_building == "Yes") {
                    $("#cb_property_view_building").prop("checked", true);
                    $(".property_view_claim_building").show();
                }

                if (value.cat_loss_stock_building == "Yes") {
                    $("#cb_property_view_stocl_building").prop("checked", true);
                    $(".property_view_claim_cstocks").show();
                }
                var line = "FI";
                var id = value.id;
                $.ajax({
                    url: url + '/claims/property/get/files',
                    method: "GET",
                    data: { _token: _token, id: id },
                    success: function (result) {
                        $.each(result, function (key, valuefiles) {

                            $("#file_upload_property_view_label" + valuefiles.idmaintained).attr("href", '{{url("/")}}' + "/claims/property/view/files/" + '{{$fileSec}}' + "/" + btoa("{{\Auth::user()->id}}") + "/" + valuefiles.id);
                            $("#file_upload_property_hd_view" + valuefiles.idmaintained).val(valuefiles.id);
                            if (valuefiles.original_name == "" || valuefiles.original_name == null) {
                                $("#file_upload_property_close_view" + valuefiles.idmaintained).hide();
                            } else {
                                $("#file_upload_property_close_view" + valuefiles.idmaintained).show();
                                $("#file_upload_property_view_label" + valuefiles.idmaintained).val(valuefiles.original_name);
                                $("#file_upload_property_view_label" + valuefiles.idmaintained).text(valuefiles.original_name);
                            }

                            if (valuefiles.status == "" || valuefiles.status == null || valuefiles.status == "N") {
                                $("#file_upload_property_status" + valuefiles.idmaintained).val("No Attachment");
                                $("#file_upload_property_status" + valuefiles.idmaintained).text("No Attachment");
                            } else if (valuefiles.status == "A") {
                                $("#file_upload_property_status" + valuefiles.idmaintained).val("Approved");
                                $("#file_upload_property_status" + valuefiles.idmaintained).text("Approved");
                            } else if (valuefiles.status == "D") {
                                $("#file_upload_property_status" + valuefiles.idmaintained).val("Denied");
                                $("#file_upload_property_status" + valuefiles.idmaintained).text("Denied");
                            } else if (valuefiles.status == "P") {
                                $("#file_upload_property_status" + valuefiles.idmaintained).val("Pending");
                                $("#file_upload_property_status" + valuefiles.idmaintained).text("Pending");
                            } else {
                                $("#file_upload_property_status" + valuefiles.idmaintained).val("No Attachment");
                                $("#file_upload_property_status" + valuefiles.idmaintained).text("No Attachment");
                            }
                        });
                    }
                });
                $.ajax({
                    url: url + '/claims/get/generic/files',
                    method: "GET",
                    data: { _token: _token, id: id, line: line },
                    success: function (result) {
                        $('#tbl_property_generic_table').empty();
                        $.each(result, function (key, valuefilesgeneric) {
                            $('#tbl_property_generic_table').append('<tr><td><a href="' + valuefilesgeneric.link + '" target="_blank">' + valuefilesgeneric.filename + '</a></td></tr>');
                        });
                    }
                });

                $.ajax({
                    url: url + '/claims/property/get/remarks',
                    method: "GET",
                    data: { _token: _token, line: line, id: id },
                    success: function (result) {
                        $.each(result, function (key, valueremarks) {

                            var date_z = new Date(valueremarks.created_at),
                                date_month = '' + (date_z.getMonth() + 1),
                                date_day = '' + date_z.getDate(),
                                date_year = date_z.getFullYear();
                            if (date_month.length < 2) { date_month = '0' + date_month };
                            if (date_day.length < 2) { date_day = '0' + date_day };
                            var fulldate = date_month + '/' + date_day + '/' + date_year;

                            var currentHour = date_z.getHours();
                            if (currentHour < 10) {
                                hour_cur = '0' + currentHour;
                            } else {
                                hour_cur = currentHour;
                            }

                            var currentgetMinutes = date_z.getMinutes();
                            if (currentgetMinutes < 10) {
                                getMinutes_cur = '0' + currentgetMinutes;
                            } else {
                                getMinutes_cur = currentgetMinutes;
                            }

                            var currentgetSeconds = date_z.getSeconds();
                            if (currentgetSeconds < 10) {
                                getSeconds_cur = '0' + currentgetSeconds;
                            } else {
                                getSeconds_cur = currentgetSeconds;
                            }

                            fulldate = fulldate + " " + hour_cur + ":" + getMinutes_cur + ":" + getSeconds_cur;

                            var minNumberfifth = 40000000;
                            var maxNumberfifth = 100000000;
                            var numberpart = Math.floor(Math.random() * (maxNumberfifth - minNumberfifth + 1) + minNumberfifth);

                            $('<li id="li_property' + numberpart + '">').text('').prependTo('.posts_property');
                            $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(valueremarks.remarks).prependTo('#li_property' + numberpart + '');
                            $('<br>').prependTo('#li_property' + numberpart + '');
                            $('<label style="float:right;font-weight:normal;">').text(fulldate).prependTo('#li_property' + numberpart + '');
                            $('<label style="float:left;font-weight:bold;">').text(valueremarks.remarks_name + ' (' + valueremarks.remarks_by + ')').prependTo('#li_property' + numberpart + '');
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

$('.input-img_property_view').change(function () {
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
        if (file == "") {
            file = $('#' + filename)[0].files[i].name;
        } else {
            file = file + ", " + $('#' + filename)[0].files[i].name;
        }
        if (this.files[i].size > 5000000) {
            $("#" + filenameError).html("File size must not be greater than 5MB.");
            $("#" + filenameError).show();
            $("#" + filenameClose).hide();
            $("#" + filenamelabel).empty();
            $("#" + filename).val("");
            return false;
        } else {

        }
    }

    $("#" + filenamelabel).show();
    $("#" + filenamelabel).empty();
    $("#" + filenamelabel).html(file);
});
$('.empty_fileupload_propertty_view').click(function () {
    var no = $(this).data("id");

    if (confirm("Are you sure you want to delete this file?")) {
        var id = "file_upload_property_hd_view" + no;
        var idfile = $("#" + id).val();
        var _token = $('input[name="_token"]').val();
        var url = $('input[name="url"]').val();
        $.ajax({
            url: url + '/claims/property/delete/file',
            method: "GET",
            data: { _token: _token, id: idfile },
            success: function (result) {
                $.each(result, function (key, valueremarks) {

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
    else {
        return false;
    }
});

var main = function () {
    $('.btn-property-comment-add').click(function () {
        var currentdate = new Date();
        var date_cur = "";
        var month_cur = "";
        var getSeconds_cur = "";
        var getMinutes_cur = "";
        var hour_cur = "";
        if (currentdate.getDate() < 10) {
            date_cur = '0' + currentdate.getDate();
        } else {
            date_cur = currentdate.getDate();
        }

        var currentmonth = currentdate.getMonth() + 1;
        if (currentmonth < 10) {
            month_cur = '0' + currentmonth;
        } else {
            month_cur = currentmonth;
        }

        var currentHour = currentdate.getHours();
        if (currentHour < 10) {
            hour_cur = '0' + currentHour;
        } else {
            hour_cur = currentHour;
        }

        var currentgetMinutes = currentdate.getMinutes();
        if (currentgetMinutes < 10) {
            getMinutes_cur = '0' + currentgetMinutes;
        } else {
            getMinutes_cur = currentgetMinutes;
        }

        var currentgetSeconds = currentdate.getSeconds();
        if (currentgetSeconds < 10) {
            getSeconds_cur = '0' + currentgetSeconds;
        } else {
            getSeconds_cur = currentgetSeconds;
        }

        var datetime = month_cur + "/"
            + date_cur + "/"
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
        var numberpart = Math.floor(Math.random() * (maxNumberfifth - minNumberfifth + 1) + minNumberfifth);

        $('<li id="li_property' + numberpart + '">').text('').prependTo('.posts_property');
        $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(post).prependTo('#li_property' + numberpart + '');
        $('<br>').prependTo('#li_property' + numberpart + '');
        $('<label style="float:right;font-weight:normal;">').text(datetime).prependTo('#li_property' + numberpart + '');
        $('<label style="float:left;font-weight:bold;">').text('<?php echo \Auth::user()->name ?>' + ' (' + '<?php echo \Auth::user()->email ?>' + ')').prependTo('#li_property' + numberpart + '');
        $('.status-box_property').val('');
        $('.counter_property').text('250');
        $('.btn-property-comment-add').addClass('disabled');


        $.ajax({
            url: url + '/claims/property/insert/remarks',
            method: "GET",
            data: { _token: _token, line_id: line_id, line: line, post: post },
            error: function (data) {
                var errors = data.responseJSON;
                //alert(errors);
                jQuery.each(data, function (key, value) {
                    alert(value);
                });
                // Render the errors with js ...
            },
            success: function (result) {
                $.each(result, function (key, valueremarks) {

                });
            }
        });

    });
    $('.status-box_property').keyup(function () {
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

$(document).ready(main)

jQuery(document).ready(function () {
    jQuery("#gross_estimate_property_view").on({
        keyup: function () {
            formatCurrency(jQuery(this));
        },
        blur: function () {
            formatCurrency(jQuery(this), "blur");
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
});


$.fn.removeFormControlFeedback = function () {
    if ($(this).closest('.form-group').find('.form-control-feedback').length) {
        $(this).closest('.form-group').find('.form-control-feedback').remove();
    }
};
$.fn.fieldDefaultState = function () {
    $(this).closest('.form-group').removeClass('has-success has-error has-feedback');
    $(this).removeFormControlFeedback();
};
$.fn.fieldErrorState = function () {
    $(this).closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
    $(this).removeFormControlFeedback();
    $(this).after('<span class="form-control-feedback fa fa-times-circle" aria-hidden="true" style="margin-top:12px;margin-right:10px;z-index:0;"></span>');
};
$.fn.fieldSuccessState = function () {
    $(this).closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
    $(this).removeFormControlFeedback();
    $(this).after('<span class="form-control-feedback fa fa-check-circle" aria-hidden="true" style="margin-top:12px;margin-right:10px;z-index:0;"></span>');
};
$(document).ready(function () {
    $('#policyNo_property_view').on('input', function () {
        var textPolicy = $('#policyNo_property_view').val().length;
        if (textPolicy == 2) {
            var textPolicyText = $('#policyNo_property_view').val().toUpperCase();;
            if (textPolicyText == "FI") {
                $('#policyNo_property_view').val(textPolicyText + "-");
            } else {
                $('#policyNo_property_view').val("");
            }

        }

        if (textPolicy == 6) {
            var textPolicyText = $('#policyNo_property_view').val().toUpperCase();
            $('#policyNo_property_view').val(textPolicyText + "-");
        }
        if (textPolicy == 9) {
            var textPolicyText = $('#policyNo_property_view').val().toUpperCase();
            $('#policyNo_property_view').val(textPolicyText + "-");
        }

        if (textPolicy == 12) {
            var textPolicyText = $('#policyNo_property_view').val().toUpperCase();
            $('#policyNo_property_view').val(textPolicyText + "-");
        }

        if (textPolicy == 20) {
            var textPolicyText = $('#policyNo_property_view').val().toUpperCase();
            $('#policyNo_property_view').val(textPolicyText + "-");
        }




        // if(textPolicy == 23){
        //     var textPolicyText = $('#policyNo_property_view').val().toUpperCase();
        //     $('#policyNo_property_view').val(textPolicyText);
        // }

        // do something
    });
    $("#policyNo_property_view").change(function () {
        var textPolicyTextFull = $('#policyNo_property_view').val().toUpperCase();;
        var str = textPolicyTextFull;
        var arr = str.split("-");
        var fullPolicfy = arr[0] + "-" + arr[1] + "-" + arr[2] + "-" + arr[3] + "-" + pad(arr[4], 7) + "-" + pad(arr[5], 2);
        $('#policyNo_property_view').val(fullPolicfy);
        var textPolicyCount = $('#policyNo_property_view').val().length;


        var textPolicyText = $('#policyNo_property_view').val().toUpperCase();;
        var str = textPolicyText;
        var arr = str.split("-");


        $(".validation_policyNo_property_view").remove();
        $('#policyNo_property_view').fieldDefaultState();
        var errorCount = 0;
        var errorMessage = "";
        if (arr[0].length != 2) {
            errorCount = 1;
        } else {
            if (arr[0] == "FI") {
            } else {
                errorCount = 1;
            }
        }

        if (arr[1].length != 3) {
            errorCount = 1;
        }

        if (arr[2].length != 2) {
            errorCount = 1;
        }
        var gfg = $.isNumeric(arr[3]);
        if (gfg) {
        } else {
            errorCount = 1;
        }
        if (arr[3].length != 2) {
            errorCount = 1;
        }

        if (arr[4].length != 7) {
            errorCount = 1;
        }

        if (arr[5].length != 2) {
            errorCount = 1;
        }
        var gfg5 = $.isNumeric(arr[5]);
        if (gfg5) {
        } else {
            errorCount = 1;
        }


        if (textPolicyCount == 23) {

        } else {
            errorCount = 1;
        }
        if (errorCount == 1) {
            $("#policyNo_property_view").after("<div class='validation_policyNo_property_view v-error-msg'>Invalid Format!</div>");
            $('#policyNo_property_view').fieldErrorState();
        }
    });

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }

});