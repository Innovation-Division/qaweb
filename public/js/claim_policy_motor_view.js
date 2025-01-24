
function ReplaceNumberWithCommas(yourNumber) {
    //Seperates the components of the number
    var n = yourNumber.toString().split(".");
    //Comma-fies the first part
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //Combines the two sections
    return n.join(".");
}
jQuery('.drpYear_claim_view').change(function () {
    if (jQuery(this).val() != '') {
        var yearval = jQuery(this).val();
        $hidURL = jQuery('input[name="hidURL"]').val();
        var url = $hidURL + '/dynamic_dependent/fetch/brand';
        var _token = jQuery('input[name="_token"]').val();

        jQuery.ajax({
            url: url,
            method: "POST",
            data: { _token: _token, yearval: yearval },
            success: function (result) {
                jQuery('#brand_claim_view').html(result);
                jQuery('#brand_claim_view').selectpicker("refresh");
            }

        })
    }
});
jQuery('.dynamicbrand_claim_view').change(function () {
    if (jQuery(this).val() != '') {
        var yearval = jQuery("#drpYear_claim_view option:selected").text();
        var brandval = jQuery(this).val();
        $hidURL = jQuery('input[name="hidURL"]').val();
        var url = $hidURL + '/dynamic_dependent/fetch/model';
        var _token = jQuery('input[name="_token"]').val();

        jQuery.ajax({
            url: url,
            method: "POST",
            data: { _token: _token, yearval: yearval, brandval: brandval },
            success: function (result) {
                jQuery('#model_claim_view').html(result);
                jQuery('#model_claim_view').selectpicker("refresh");
            }

        })
    }
});

$('.motorClaim').click(function () {
    var _token = $('input[name="_token"]').val();
    var url = $('input[name="url"]').val();
    var id = $(this).data("id");
    $.ajax({
        url: url + '/claims/motor/get/details',
        method: "GET",
        data: { _token: _token, id: id },
        success: function (result) {
            $('.posts_motor').empty();
            $('.posts_motor li').remove();
            $(".motor_claim_loss_recovery_other_insurance_view").hide();
            $(".motor_claim_loss_recovery_view").hide();
            $(".motor_claim_loss_PDTP_view").hide();
            $(".motor_claim_loss_vehicleTP_view").hide();
            $(".motor_claim_loss_carnap_view").hide();
            $(".motor_claim_loss_partial_view").hide();
            $(".motor_claim_loss_bi_view").hide();

            $.each(result, function (key, value) {
                $('#policyNo_view').val(value.policy);
                $('#driver_view').val(value.driver);
                $('#relationship_motor_view').val(value.relationship_to_driver);

                var d = new Date(value.date_of_loss),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) { month = '0' + month };
                if (day.length < 2) { day = '0' + day };
                var fulldate = month + '/' + day + '/' + year;
                if (value.status === "COMPLETED") {
                    $(".btn-claim_motor_permanent_province_view").prop('style', 'background-color:#e9ecef');
                    $(".permanent_municipality_motor_view").prop('style', 'background-color:#e9ecef');
                    $(".permanent_barangay_motor_view").prop('style', 'background-color:#e9ecef');
                    $(".drpYear_claim_view").prop('style', 'background-color:#e9ecef');
                    $(".brand_claim_view").prop('style', 'background-color:#e9ecef');
                    $(".model_claim_view").prop('style', 'background-color:#e9ecef');

                    $('#Loss_date_view').removeClass('readonly');
                    $('#Loss_time_view').removeClass('readonly');

                    $("#Loss_date_view").prop('disabled', true);
                    $("#Loss_time_view").prop('disabled', true);
                    $("#location_loss_view").prop('disabled', true);
                    $("#status_motor_view").prop('disabled', true);
                    $("#policyNo_view").prop('disabled', true);
                    $("#driver_view").prop('disabled', true);
                    $("#relationship_motor_view").prop('disabled', true);
                    $("#fname_motor_view").prop('disabled', true);
                    $("#mname_motor_view").prop('disabled', true);
                    $("#lname_motor_view").prop('disabled', true);
                    $("#acc_happen_motor_view").prop('disabled', true);
                    $("#edamage_motor_view").prop('disabled', true);
                    $("#driving_vec_motor_view").prop('disabled', true);
                    $("#purpose_vec_motor_view").prop('disabled', true);
                    $("#tel_no_motor_view").prop('disabled', true);
                    $("#mobile_no_motor_view").prop('disabled', true);
                    $("#email_address_motor_view").prop('disabled', true);
                    $("#no_passenger_motor_view").prop('disabled', true);
                    $("#name_reportee_motor_view").prop('disabled', true);
                    $("#mv_file_no_claim_view").prop('disabled', true);
                    $("#palte_no_claim_view").prop('disabled', true);
                    $("#engine_no_claim_view").prop('disabled', true);
                    $("#color_claim_view").prop('disabled', true);
                    $("#chassis_no_claim_view").prop('disabled', true);
                    $("#conduction_sticker_no_claim_view").prop('disabled', true);
                    $("#status-box_motor_view").prop('disabled', true);
                    $("#gross_estimate_view").prop('disabled', true);
                    $("#claim_motor_aget_yes_view").prop('disabled', true);
                    $("#claim_motor_aget_no_view").prop('disabled', true);
                    $("#claim_motor_recovery_yes_view").prop('disabled', true);
                    $("#claim_motor_recovery_no_view").prop('disabled', true);
                    $("#cb_par_total_loss_view").prop("disabled", true);
                    $("#cb_bi_view").prop("disabled", true);
                    $("#cb_theft_accessory_view").prop("disabled", true);
                    $("#cb_carnap_view").prop("disabled", true);
                    $("#cb_vec_tp_view").prop("disabled", true);
                    $("#cb_pd_tp_view").prop("disabled", true);
                    $("#cb_recovery_view").prop("disabled", true);
                    $("#cb_bi_tp_view").prop("disabled", true);
                    $("#mortgaged_view").prop("disabled", true);
                    $("#cb_recovery_other_insurance_view").prop("disabled", true);
                    $("#clm_motor_submit_view").hide();
                } else {
                    $(".btn-claim_motor_permanent_province_view").prop('style', 'background-color:#fff');
                    $(".permanent_municipality_motor_view").prop('style', 'background-color:#fff');
                    $(".permanent_barangay_motor_view").prop('style', 'background-color:#fff');
                    $(".drpYear_claim_view").prop('style', 'background-color:#fff');
                    $(".brand_claim_view").prop('style', 'background-color:#fff');
                    $(".model_claim_view").prop('style', 'background-color:#fff');

                    $('#Loss_date_view').addClass('readonly');
                    $('#Loss_time_view').addClass('readonly');
                    $("#Loss_date_view").prop('disabled', false);
                    $("#Loss_time_view").prop('disabled', false);
                    $("#location_loss_view").prop('disabled', false);
                    $("#status_motor_view").prop('disabled', false);
                    $("#policyNo_view").prop('disabled', false);
                    $("#driver_view").prop('disabled', false);
                    $("#relationship_motor_view").prop('disabled', false);
                    $("#fname_motor_view").prop('disabled', false);
                    $("#mname_motor_view").prop('disabled', false);
                    $("#lname_motor_view").prop('disabled', false);
                    $("#acc_happen_motor_view").prop('disabled', false);
                    $("#edamage_motor_view").prop('disabled', false);
                    $("#driving_vec_motor_view").prop('disabled', false);
                    $("#purpose_vec_motor_view").prop('disabled', false);
                    $("#tel_no_motor_view").prop('disabled', false);
                    $("#mobile_no_motor_view").prop('disabled', false);
                    $("#email_address_motor_view").prop('disabled', false);
                    $("#no_passenger_motor_view").prop('disabled', false);
                    $("#name_reportee_motor_view").prop('disabled', false);
                    $("#mv_file_no_claim_view").prop('disabled', false);
                    $("#palte_no_claim_view").prop('disabled', false);
                    $("#engine_no_claim_view").prop('disabled', false);
                    $("#color_claim_view").prop('disabled', false);
                    $("#chassis_no_claim_view").prop('disabled', false);
                    $("#conduction_sticker_no_claim_view").prop('disabled', false);
                    $("#status-box_motor_view").prop('disabled', false);
                    $("#gross_estimate_view").prop('disabled', false);
                    $("#claim_motor_aget_yes_view").prop('disabled', false);
                    $("#claim_motor_aget_no_view").prop('disabled', false);
                    $("#claim_motor_recovery_yes_view").prop('disabled', false);
                    $("#claim_motor_recovery_no_view").prop('disabled', false);
                    $("#cb_par_total_loss_view").prop("disabled", false);
                    $("#cb_bi_view").prop("disabled", false);
                    $("#cb_theft_accessory_view").prop("disabled", false);
                    $("#cb_carnap_view").prop("disabled", false);
                    $("#cb_vec_tp_view").prop("disabled", false);
                    $("#cb_pd_tp_view").prop("disabled", false);
                    $("#cb_recovery_view").prop("disabled", false);
                    $("#cb_bi_tp_view").prop("disabled", false);
                    $("#cb_recovery_other_insurance_view").prop("disabled", false);
                    $("#clm_motor_submit_view").show();
                }
                $('#Loss_date_view').val(fulldate);
                $('#Loss_time_view').val(value.time_loss);
                $('#location_loss_view').val(value.location_of_loss);
                $('#status_motor_view').val(value.status);
                $('#created_by_view').val(value.created_by);
                $('input[name=hd_claim_motor_id]').val(value.id);
                $('input[name=drpYear_claim_view]').val(value.year);
                $('input[name=brand_claim_view]').val(value.brand);

                $('#fname_motor_view').val(value.first_name);
                $('#mname_motor_view').val(value.middle_name);
                $('#lname_motor_view').val(value.last_name);
                $('#acc_happen_motor_view').text(value.accident_happen);
                $('#acc_happen_motor_view').val(value.accident_happen);
                $('#edamage_motor_view').val(value.extend_damage);
                $('#driving_vec_motor_view').val(value.driving_vehicle);
                $('#purpose_vec_motor_view').val(value.purpose_trip);
                $('#tel_no_motor_view').val(value.tel_no);
                $('#mobile_no_motor_view').val(value.mobile_no);
                $('#email_address_motor_view').val(value.email_address);
                $('#no_passenger_motor_view').val(value.no_of_passenger);
                $('#name_reportee_motor_view').val(value.name_reportee);
                $('#name_reportee_motor_view').val(value.name_reportee);

                $('#mv_file_no_claim_view').val(value.mv_file_no);
                $('#palte_no_claim_view').val(value.plate_no);
                $('#engine_no_claim_view').val(value.engine_no);
                $('#color_claim_view').val(value.color);
                $('#chassis_no_claim_view').val(value.chassis_no);
                $('#mortgaged_view').val(value.mortgaged);
                $('input[name=hd_third_party_view]').val(value.third_party_involve);
                if (value.third_party_involve == "no" || value.third_party_involve == "yes") {
                    $("#lbl_third_party_motor_view").attr('style', 'color:#373737');
                    $("#claim_motor_aget_yes_view").attr('style', 'border: 1px solid #C0C0C0;');
                    $("#claim_motor_aget_no_view").attr('style', 'border: 1px solid #C0C0C0;');
                    if (value.third_party_involve == "yes") {
                        document.getElementById("claim_motor_aget_yes_view").style.background = '#008080';
                        document.getElementById("claim_motor_aget_yes_view").style.color = '#ffffff';
                        document.getElementById("claim_motor_aget_no_view").style.background = '#C0C0C0';
                        document.getElementById("claim_motor_aget_no_view").style.color = '#000000';
                        $('input[name=hd_recovery_claim_view]').val("yes");
                    } else {
                        document.getElementById("claim_motor_aget_no_view").style.background = '#008080';
                        document.getElementById("claim_motor_aget_no_view").style.color = '#ffffff';
                        document.getElementById("claim_motor_aget_yes_view").style.background = '#C0C0C0';
                        document.getElementById("claim_motor_aget_yes_view").style.color = '#000000';
                        $('input[name=hd_recovery_claim_view]').val("no");
                    }
                } else {
                    $("#lbl_third_party_motor_view").attr('style', 'color:#CF3C4B');
                    $("#claim_motor_aget_yes_view").attr('style', 'border: 1px solid #CF3C4B;');
                    $("#claim_motor_aget_no_view").attr('style', 'border: 1px solid #CF3C4B;');
                    $('input[name=hd_recovery_claim_view]').val("no");
                }

                $('#gross_estimate_view').val(ReplaceNumberWithCommas(value.gross_amount));


                $("#cb_par_total_loss_view").prop("checked", false);
                $("#cb_bi_view").prop("checked", false);
                $("#cb_theft_accessory_view").prop("checked", false);
                $("#cb_carnap_view").prop("checked", false);
                $("#cb_vec_tp_view").prop("checked", false);
                $("#cb_pd_tp_view").prop("checked", false);
                $("#cb_recovery_view").prop("checked", false);
                $("#cb_recovery_other_insurance_view").prop("checked", false);

                $(".motor_claim_loss_partial_view").hide();
                $(".motor_claim_loss_bi_view").hide();
                $(".motor_claim_loss_BITP_view").hide();
                $(".motor_claim_loss_vehicleTP_view").hide();
                $(".motor_claim_loss_recovery_view").hide();
                $(".motor_claim_loss_carnap_view").hide();
                $(".motor_claim_loss_PDTP_view").hide();
                $(".motor_claim_loss_recovery_other_insurance_view").hide();

                $(".motor_claim_other_view").show();

                if (value.cat_loss_partial == "yes") {
                    $("#cb_par_total_loss_view").prop("checked", true);
                    $(".motor_claim_loss_partial_view").show();
                }
                if (value.cat_loss_bodily_injury == "yes") {
                    $("#cb_bi_view").prop("checked", true);
                    $(".motor_claim_loss_bi_view").show();
                }
                if (value.cat_loss_theft_access == "yes") {
                    $("#cb_theft_accessory_view").prop("checked", true);
                    $(".motor_claim_loss_partial_view").show();
                }

                if (value.cat_loss_carnap == "yes") {
                    $("#cb_carnap_view").prop("checked", true);
                    $(".motor_claim_loss_carnap_view").show();
                }

                if (value.cat_loss_vehicle == "yes") {
                    $("#cb_vec_tp_view").prop("checked", true);
                    $(".motor_claim_loss_vehicleTP_view").show();
                }

                if (value.cat_loss_pd_tp == "yes") {
                    $("#cb_pd_tp_view").prop("checked", true);
                    $(".motor_claim_loss_PDTP_view").show();
                }

                if (value.cat_loss_bi_tp == "yes") {
                    $("#cb_bi_tp_view").prop("checked", true);
                    $(".motor_claim_loss_BITP_view").show();
                }

                if (value.cat_loss_recovery == "yes") {
                    $("#cb_recovery_view").prop("checked", true);
                    $(".motor_claim_loss_recovery_view").show();
                }

                if (value.cat_loss_rec_other_ins == "yes") {
                    $("#cb_recovery_other_insurance_view").prop("checked", true);
                    $(".motor_claim_loss_recovery_other_insurance_view").show();
                }

                var line = "MC";
                var id = value.id;
                $.ajax({
                    url: url + '/claims/motor/get/files',
                    method: "GET",
                    data: { _token: _token, id: id },
                    success: function (result) {
                        $.each(result, function (key, valuefiles) {

                            $("#file_upload_motor_label_view" + valuefiles.idmaintained).attr("href", '{{url("/")}}' + "/claims/motor/view/files/" + '{{$fileSec}}' + "/" + btoa("{{\Auth::user()->id}}") + "/" + valuefiles.id);
                            $("#file_upload_motor_hd_view" + valuefiles.idmaintained).val(valuefiles.id)
                            if (valuefiles.original_name == "" || valuefiles.original_name == null) {
                                $("#file_upload_motor_close_view" + valuefiles.idmaintained).hide();

                            } else {
                                $("#file_upload_motor_close_view" + valuefiles.idmaintained).show();
                                $("#file_upload_motor_label_view" + valuefiles.idmaintained).val(valuefiles.original_name);
                                $("#file_upload_motor_label_view" + valuefiles.idmaintained).text(valuefiles.original_name);
                            }
                            if (valuefiles.status == "" || valuefiles.status == null || valuefiles.status == "N") {
                                $("#file_upload_motor_status" + valuefiles.idmaintained).val("No Attachment");
                                $("#file_upload_motor_status" + valuefiles.idmaintained).text("No Attachment");
                            } else if (valuefiles.status == "A") {
                                $("#file_upload_motor_status" + valuefiles.idmaintained).val("Approved");
                                $("#file_upload_motor_status" + valuefiles.idmaintained).text("Approved");
                            } else if (valuefiles.status == "D") {
                                $("#file_upload_motor_status" + valuefiles.idmaintained).val("Denied");
                                $("#file_upload_motor_status" + valuefiles.idmaintained).text("Denied");
                            } else if (valuefiles.status == "P") {
                                $("#file_upload_motor_status" + valuefiles.idmaintained).val("Pending");
                                $("#file_upload_motor_status" + valuefiles.idmaintained).text("Pending");
                            } else {
                                $("#file_upload_motor_status" + valuefiles.idmaintained).val("No Attachment");
                                $("#file_upload_motor_status" + valuefiles.idmaintained).text("No Attachment");
                            }

                        });
                    }
                });
                $.ajax({
                    url: url + '/claims/get/generic/files',
                    method: "GET",
                    data: { _token: _token, id: id, line: line },
                    success: function (result) {
                        $('#tbl_motor_generic_table').empty();
                        $.each(result, function (key, valuefilesgeneric) {
                            $('#tbl_motor_generic_table').append('<tr><td><a href="' + valuefilesgeneric.link + '" target="_blank">' + valuefilesgeneric.filename + '</a></td></tr>');
                        });
                    }
                });
                $.ajax({
                    url: url + '/claims/motor/get/remarks',
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

                            $('<li id="li_motor' + numberpart + '">').text('').prependTo('.posts_motor');
                            $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(valueremarks.remarks).prependTo('#li_motor' + numberpart + '');
                            $('<br>').prependTo('#li_motor' + numberpart + '');
                            $('<label style="float:right;font-weight:normal;">').text(fulldate).prependTo('#li_motor' + numberpart + '');
                            $('<label style="float:left;font-weight:bold;">').text(valueremarks.remarks_name + ' (' + valueremarks.remarks_by + ')').prependTo('#li_motor' + numberpart + '');
                            $('.status-box_motor').val('');
                            $('.counter_motor').text('250');
                            $('.btn-motor-comment-add').addClass('disabled');
                        });
                    }
                });
            });
        }
    });
});
$('.input-img_view').change(function () {
    var no = $(this).data("id");
    var filenamelabel = "file_upload_motor_label_view" + no;
    var filename = "file_upload_motor_view" + no;
    var filenameClose = "file_upload_motor_close_view" + no;
    var filenameError = "file_upload_motor_label_error_view" + no;
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
$('.empty_fileupload_view').click(function () {
    var no = $(this).data("id");

    if (confirm("Are you sure you want to delete this file?")) {
        var id = "file_upload_motor_hd_view" + no;
        var idfile = $("#" + id).val();
        var _token = $('input[name="_token"]').val();
        var url = $('input[name="url"]').val();
        $.ajax({
            url: url + '/claims/motor/delete/file',
            method: "GET",
            data: { _token: _token, id: idfile },
            success: function (result) {
                $.each(result, function (key, valueremarks) {
                    var filename = "file_upload_motor_view" + no;
                    var filenamelabel = "file_upload_motor_label_view" + no;
                    var filenameClose = "file_upload_motor_close_view" + no;
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
    $('.btn-motor-comment-add').click(function () {
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
        var line_id = $('input[name=hd_claim_motor_id]').val();
        var line = "MC";
        var post = $('.status-box_motor').val();

        var minNumberfifth = 40000000;
        var maxNumberfifth = 100000000;
        var numberpart = Math.floor(Math.random() * (maxNumberfifth - minNumberfifth + 1) + minNumberfifth);

        $('<li id="li_motor' + numberpart + '">').text('').prependTo('.posts_motor');
        $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(post).prependTo('#li_motor' + numberpart + '');
        $('<br>').prependTo('#li_motor' + numberpart + '');
        $('<label style="float:right;font-weight:normal;">').text(datetime).prependTo('#li_motor' + numberpart + '');
        $('<label style="float:left;font-weight:bold;">').text('<?php echo \Auth::user()->name ?>' + ' (' + '<?php echo \Auth::user()->email ?>' + ')').prependTo('#li_motor' + numberpart + '');
        $('.status-box_motor').val('');
        $('.counter_motor').text('250');
        $('.btn-motor-comment-add').addClass('disabled');


        $.ajax({
            url: url + '/claims/motor/insert/remarks',
            method: "GET",
            data: { _token: _token, line_id: line_id, line: line, post: post },
            success: function (result) {
                $.each(result, function (key, valueremarks) {
                });
            }
        });

    });
    $('.status-box_motor').keyup(function () {
        var postLength = $(this).val().length;
        var charactersLeft = 250 - postLength;
        $('.counter_motor').text(charactersLeft);
        if (charactersLeft < 0) {
            $('.btn-motor-comment-add').addClass('disabled');
        } else if (charactersLeft === 250) {
            $('.btn-motor-comment-add').addClass('disabled');
        } else {
            $('.btn-motor-comment-add').removeClass('disabled');
        }
    });
}
$('.btn-motor-comment-add').addClass('disabled');
$(document).ready(main)


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
    $('#policyNo_view').on('input', function () {
        var textPolicy = $('#policyNo_view').val().length;
        if (textPolicy == 2) {
            var textPolicyText = $('#policyNo_view').val().toUpperCase();;
            if (textPolicyText == "MC") {
                $('#policyNo_view').val(textPolicyText + "-");
            } else {
                $('#policyNo_view').val("");
            }

        }

        if (textPolicy == 6) {
            var textPolicyText = $('#policyNo_view').val().toUpperCase();
            $('#policyNo_view').val(textPolicyText + "-");
        }
        if (textPolicy == 9) {
            var textPolicyText = $('#policyNo_view').val().toUpperCase();
            $('#policyNo_view').val(textPolicyText + "-");
        }

        if (textPolicy == 12) {
            var textPolicyText = $('#policyNo_view').val().toUpperCase();
            $('#policyNo_view').val(textPolicyText + "-");
        }

        if (textPolicy == 20) {
            var textPolicyText = $('#policyNo_view').val().toUpperCase();
            $('#policyNo_view').val(textPolicyText + "-");
        }




        // if(textPolicy == 23){
        //     var textPolicyText = $('#policyNo_view').val().toUpperCase();
        //     $('#policyNo_view').val(textPolicyText);
        // }

        // do something
    });
    $("#policyNo_view").change(function () {
        var textPolicyTextFull = $('#policyNo_view').val().toUpperCase();;
        var str = textPolicyTextFull;
        var arr = str.split("-");
        var fullPolicfy = arr[0] + "-" + arr[1] + "-" + arr[2] + "-" + arr[3] + "-" + pad(arr[4], 7) + "-" + pad(arr[5], 2);
        $('#policyNo_view').val(fullPolicfy);
        var textPolicyCount = $('#policyNo_view').val().length;


        var textPolicyText = $('#policyNo_view').val().toUpperCase();;
        var str = textPolicyText;
        var arr = str.split("-");


        $(".validation_policyNo_view").remove();
        $('#policyNo_view').fieldDefaultState();
        var errorCount = 0;
        var errorMessage = "";
        if (arr[0].length != 2) {
            errorCount = 1;
        } else {
            if (arr[0] == "MC") {
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
            $("#policyNo_view").after("<div class='validation_policyNo_view v-error-msg'>Invalid Format!</div>");
            $('#policyNo_view').fieldErrorState();
        }
    });

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }

});

jQuery(document).ready(function () {
    jQuery("#gross_estimate_view").on({
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
