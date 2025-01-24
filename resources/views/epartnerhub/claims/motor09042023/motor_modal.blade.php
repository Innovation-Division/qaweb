
<div class="modal fade bs-example-modal-lg modal-light" id="claimsMotorModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
        <div class="modal-content">
            <form method="post" action="{{ route('editmotornewsave') }}"  enctype="multipart/form-data" style="background: #ffffff !important;">
            {{ csrf_field() }}		
                <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="claimsMotorModalView" style="color: white; font-size: 27px !important; font-weight: 700;">Motor Claims Information</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hd_third_party_view" name="hd_third_party_view" value="1">
                    <input type="hidden" id="hd_recovery_claim_view" name="hd_recovery_claim_view" value="1">
                    <input type="hidden" id="hd_claim_motor_line" name="hd_claim_motor_line" value="FI">
                    <input type="hidden" id="hd_claim_motor_id" name="hd_claim_motor_id" value="">
                    @include('epartnerhub.claims.motor.view.view_claim_motor_page_1')
                    @include('epartnerhub.claims.motor.view.view_claim_motor_page_2')
                    @include('epartnerhub.claims.motor.view.view_claim_motor_page_3')

                    <div class="container">
                        <div class="form-group">
                            <textarea id="status-box_motor_view" name="status-box_motor_view" class="form-control status-box_motor" rows="3" placeholder="Enter your comment here..."></textarea>
                        </div>
                        <div class="button-group pull-right">
                            <p class="counter_motor">250</p>
                            <a href="#" class="btn btn-motor-comment-add btn-primary">Post</a>
                        </div>
                        <div class="col-md-12"> <br>
                            <ul id="props_id" name="props_name" class="posts_motor" style="max-width 800px;">
                               
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="modal-footer text-center">
                    <button type="submit" id="clm_motor_submit_view" name="clm_motor_submit_view"   class="btn btn-secondary clm_motor_submit_view">Submit</button>
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function ReplaceNumberWithCommas(yourNumber) {
        //Seperates the components of the number
        var n= yourNumber.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
    }
    jQuery('.drpYear_claim_view').change(function(){
		if(jQuery(this).val() != '')
		{         
			var yearval = jQuery(this).val();
			$hidURL = jQuery('input[name="hidURL"]').val();
			var url = $hidURL+ '/dynamic_dependent/fetch/brand';    
			var _token = jQuery('input[name="_token"]').val();
			
		jQuery.ajax({
		url: url,
		method:"POST",
		data:{ _token:_token,yearval:yearval},
		success:function(result)
		{        
			jQuery('#brand_claim_view').html(result);    
			jQuery('#brand_claim_view').selectpicker("refresh");   
		}

		})
		}
	}); 
	jQuery('.dynamicbrand_claim_view').change(function(){
		if(jQuery(this).val() != '')
		{
			var yearval = jQuery( "#drpYear_claim_view option:selected" ).text();        
			var brandval = jQuery(this).val();
			$hidURL =jQuery('input[name="hidURL"]').val();
			var url = $hidURL+ '/dynamic_dependent/fetch/model';    
			var _token = jQuery('input[name="_token"]').val();
			
		jQuery.ajax({
		url: url,
		method:"POST",
		data:{ _token:_token,yearval:yearval,brandval:brandval},
		success:function(result)
		{        
			jQuery('#model_claim_view').html(result); 
			jQuery('#model_claim_view').selectpicker("refresh");        
		}

		})
		}
	}); 

    $('.motorClaim').click(function() {
        var _token = $('input[name="_token"]').val();
        var url = $('input[name="url"]').val();
        var id =$(this).data("id");
        $.ajax({
            url: url + '/claims/motor/get/details',
            method:"GET",
            data:{ _token:_token,id:id}, 
            success:function(result)
            {
                $('.posts_motor').empty();
                $('.posts_motor li').remove();
                $(".motor_claim_loss_recovery_other_insurance_view").hide();
                $(".motor_claim_loss_recovery_view").hide();
                $(".motor_claim_loss_PDTP_view").hide();
                $(".motor_claim_loss_vehicleTP_view").hide();
                $(".motor_claim_loss_carnap_view").hide();
                $(".motor_claim_loss_partial_view").hide();
                $(".motor_claim_loss_bi_view").hide();

                $.each(result, function(key, value){
                    $('#policyNo_view').val(value.policy);
                    $('#driver_view').val(value.driver);
                    $('#relationship_motor_view').val(value.relationship_to_driver);

                    var d = new Date(value.date_of_loss),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                    if (month.length < 2){ month = '0' + month};
                    if (day.length < 2){day = '0' + day};
                    var fulldate =  month+'/'+day +'/'+year;
                    if(value.status === "COMPLETED"){
                        $(".btn-claim_motor_permanent_province_view").prop('style',  'background-color:#e9ecef');
                        $(".permanent_municipality_motor_view").prop('style',  'background-color:#e9ecef');
                        $(".permanent_barangay_motor_view").prop('style',  'background-color:#e9ecef');
                        $(".drpYear_claim_view").prop('style',  'background-color:#e9ecef');
                        $(".brand_claim_view").prop('style',  'background-color:#e9ecef');
                        $(".model_claim_view").prop('style',  'background-color:#e9ecef');
                        
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
                        $("#cb_par_total_loss_view").prop("disabled", true );
                        $("#cb_bi_view").prop("disabled", true );
                        $("#cb_theft_accessory_view").prop("disabled", true );
                        $("#cb_carnap_view").prop("disabled", true );
                        $("#cb_vec_tp_view").prop("disabled", true );
                        $("#cb_pd_tp_view").prop("disabled", true );
                        $("#cb_recovery_view").prop("disabled", true );
                        $("#cb_bi_tp_view").prop("disabled", true );
                        $("#cb_recovery_other_insurance_view").prop("disabled", true );
                        $("#clm_motor_submit_view").hide();
                    }else{
                        $(".btn-claim_motor_permanent_province_view").prop('style',  'background-color:#fff');
                        $(".permanent_municipality_motor_view").prop('style',  'background-color:#fff');
                        $(".permanent_barangay_motor_view").prop('style',  'background-color:#fff');
                        $(".drpYear_claim_view").prop('style',  'background-color:#fff');
                        $(".brand_claim_view").prop('style',  'background-color:#fff');
                        $(".model_claim_view").prop('style',  'background-color:#fff');

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
                        $("#cb_par_total_loss_view").prop("disabled", false );
                        $("#cb_bi_view").prop("disabled", false );
                        $("#cb_theft_accessory_view").prop("disabled", false );
                        $("#cb_carnap_view").prop("disabled", false );
                        $("#cb_vec_tp_view").prop("disabled", false );
                        $("#cb_pd_tp_view").prop("disabled", false );
                        $("#cb_recovery_view").prop("disabled", false );
                        $("#cb_bi_tp_view").prop("disabled", false );
                        $("#cb_recovery_other_insurance_view").prop("disabled", false );
                        $("#clm_motor_submit_view").show();
                    }
                    $('#Loss_date_view').val(fulldate);
                    $('#Loss_time_view').val(value.time_loss);
                    $('#location_loss_view').val(value.location_of_loss);
                    $('#status_motor_view').val(value.status);
                    $('#created_by_view').val(value.created_by);
                    $('input[name=hd_claim_motor_id]').val(value.id);
                    jQuery('#claim_motor_permanent_province_view').append('<option selected value="' + value.province + '">' + value.province + '</option>');    
                    jQuery('#claim_motor_permanent_province_view').selectpicker("refresh");

                    jQuery('#permanent_municipality_motor_view').append('<option selected value="' + value.municipality + '">' + value.municipality + '</option>');    
                    jQuery('#permanent_municipality_motor_view').selectpicker("refresh");

                    jQuery('#permanent_barangay_motor_view').append('<option selected value="' + value.barangay + '">' + value.barangay + '</option>');    
                    jQuery('#permanent_barangay_motor_view').selectpicker("refresh");

                    jQuery('#drpYear_claim_view').append('<option selected value="' + value.year + '">' + value.year + '</option>');    
                    jQuery('#drpYear_claim_view').selectpicker("refresh");

                    jQuery('#brand_claim_view').append('<option selected value="' + value.brand + '">' + value.brand + '</option>');    
                    jQuery('#brand_claim_view').selectpicker("refresh");

                    jQuery('#model_claim_view').append('<option selected value="' + value.model + '">' + value.model + '</option>');    
                    jQuery('#model_claim_view').selectpicker("refresh");

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
                    
                    $('#mv_file_no_claim_view').val(value.mv_file_no);
                    $('#palte_no_claim_view').val(value.plate_no);
                    $('#engine_no_claim_view').val(value.engine_no);
                    $('#color_claim_view').val(value.color);
                    $('#chassis_no_claim_view').val(value.chassis_no);
                    $('#conduction_sticker_no_claim_view').val(value.conduction_stcker_no);

                    if(value.third_party_involve == "no" || value.third_party_involve  == "yes"){
                        $("#lbl_third_party_motor_view").attr('style',  'color:#373737');
                        $("#claim_motor_aget_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_motor_aget_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.third_party_involve == "yes"){
                            document.getElementById("claim_motor_aget_yes_view").style.background='#008080';
                            document.getElementById("claim_motor_aget_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_motor_aget_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_motor_aget_no_view").style.color ='#000000';  
                            $('input[name=hd_recovery_claim_view]').val("yes"); 
                        }else{
                            document.getElementById("claim_motor_aget_no_view").style.background='#008080';
                            document.getElementById("claim_motor_aget_no_view").style.color ='#ffffff';
                            document.getElementById("claim_motor_aget_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_motor_aget_yes_view").style.color ='#000000'; 
                            $('input[name=hd_recovery_claim_view]').val("no"); 
                        }
                    }else{	 
                        $("#lbl_third_party_motor_view").attr('style',  'color:#CF3C4B');
                        $("#claim_motor_aget_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_motor_aget_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $('input[name=hd_recovery_claim_view]').val("no"); 
                    } 

                    $('#gross_estimate_view').val(ReplaceNumberWithCommas(value.gross_amount));


                    if(value.claim_with_recovery == "no" || value.claim_with_recovery == "yes"){
                        $("#lbl_claim_recovery_view").attr('style',  'color:#373737');
                        $("#claim_motor_recovery_yes_view").attr('style',  'border: 1px solid #C0C0C0;');
                        $("#claim_motor_recovery_no_view").attr('style',  'border: 1px solid #C0C0C0;');
                        if(value.claim_with_recovery == "yes"){
                            document.getElementById("claim_motor_recovery_yes_view").style.background='#008080';
                            document.getElementById("claim_motor_recovery_yes_view").style.color ='#ffffff';
                            document.getElementById("claim_motor_recovery_no_view").style.background='#C0C0C0';
                            document.getElementById("claim_motor_recovery_no_view").style.color ='#000000';  
                            $('input[name=hd_recovery_claim]').val("yes"); 
                        }else{
                            document.getElementById("claim_motor_recovery_no_view").style.background='#008080';
                            document.getElementById("claim_motor_recovery_no_view").style.color ='#ffffff';
                            document.getElementById("claim_motor_recovery_yes_view").style.background='#C0C0C0';
                            document.getElementById("claim_motor_recovery_yes_view").style.color ='#000000'; 
                            $('input[name=hd_recovery_claim]').val("no"); 
                        }
                    }else{	 
                        $('input[name=hd_recovery_claim]').val("no"); 
                        $("#lbl_claim_recovery_view").attr('style',  'color:#CF3C4B');
                        $("#claim_motor_recovery_yes_view").attr('style',  'border: 1px solid #CF3C4B;');
                        $("#claim_motor_recovery_no_view").attr('style',  'border: 1px solid #CF3C4B;');
                    } 

                    $( "#cb_par_total_loss_view" ).prop( "checked", false );
                    $( "#cb_bi_view" ).prop( "checked", false );
                    $( "#cb_theft_accessory_view" ).prop( "checked", false );
                    $( "#cb_carnap_view" ).prop( "checked", false );
                    $( "#cb_vec_tp_view" ).prop( "checked", false );
                    $( "#cb_pd_tp_view" ).prop( "checked", false );
                    $( "#cb_recovery_view" ).prop( "checked", false );
                    $( "#cb_recovery_other_insurance_view" ).prop( "checked", false );

                    $(".motor_claim_loss_partial_view").hide();
                    $(".motor_claim_loss_bi_view").hide();
                    $(".motor_claim_loss_BITP_view").hide();
                    $(".motor_claim_loss_vehicleTP_view").hide();
                    $(".motor_claim_loss_recovery_view").hide();
                    $(".motor_claim_loss_carnap_view").hide();
                    $(".motor_claim_loss_PDTP_view").hide();
                    $(".motor_claim_loss_recovery_other_insurance_view").hide();

                    $(".motor_claim_other_view").show();

                    if(value.cat_loss_partial == "yes"){
                        $( "#cb_par_total_loss_view" ).prop( "checked", true );
                        $(".motor_claim_loss_partial_view").show();
                    }
                    if(value.cat_loss_bodily_injury == "yes"){
                        $( "#cb_bi_view" ).prop( "checked", true );
                        $(".motor_claim_loss_bi_view").show();
                    }
                    if(value.cat_loss_theft_access == "yes"){
                        $( "#cb_theft_accessory_view" ).prop( "checked", true );
                        $(".motor_claim_loss_partial_view").show();
                    }

                    if(value.cat_loss_carnap == "yes"){
                        $( "#cb_carnap_view" ).prop( "checked", true );
                        $(".motor_claim_loss_carnap_view").show();
                    }

                    if(value.cat_loss_vehicle == "yes"){
                        $( "#cb_vec_tp_view" ).prop( "checked", true );
                        $(".motor_claim_loss_vehicleTP_view").show();
                    }

                    if(value.cat_loss_pd_tp == "yes"){
                        $( "#cb_pd_tp_view" ).prop( "checked", true );
                        $(".motor_claim_loss_PDTP_view").show();
                    }

                    if(value.cat_loss_bi_tp == "yes"){
                        $( "#cb_bi_tp_view" ).prop( "checked", true );
                        $(".motor_claim_loss_BITP_view").show();
                    }

                    if(value.cat_loss_recovery == "yes"){
                        $( "#cb_recovery_view" ).prop( "checked", true );
                        $(".motor_claim_loss_recovery_view").show();
                    }

                    if(value.cat_loss_rec_other_ins == "yes"){
                        $( "#cb_recovery_other_insurance_view" ).prop( "checked", true );
                        $(".motor_claim_loss_recovery_other_insurance_view").show();
                    }

                    var line = "MC";
                    var id = value.id;
                    $.ajax({
                        url: url + '/claims/motor/get/files',
                        method:"GET",
                        data:{ _token:_token,id:id},
                        success:function(result)
                        {
                            $.each(result, function(key, valuefiles){
                                    
                                    $( "#file_upload_motor_label_view"+valuefiles.idmaintained).attr("href", '{{url("/")}}'+"/claims/motor/view/files/"+'{{$fileSec}}'+"/"+ btoa("{{\Auth::user()->id}}")+"/"+valuefiles.id);
                                    $("#file_upload_motor_hd_view"+valuefiles.idmaintained).val(valuefiles.id)
                                    if(valuefiles.original_name == "" || valuefiles.original_name == null){
                                        $("#file_upload_motor_close_view"+valuefiles.idmaintained).hide();
                                        
                                    }else{
                                        $("#file_upload_motor_close_view"+valuefiles.idmaintained).show();
                                        $( "#file_upload_motor_label_view"+valuefiles.idmaintained ).val(valuefiles.original_name);
                                        $( "#file_upload_motor_label_view"+valuefiles.idmaintained ).text(valuefiles.original_name);
                                    }
                                    if(valuefiles.status == "" || valuefiles.status == null || valuefiles.status == "N"){
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).val("No Attachment");
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).text("No Attachment");
                                    }else if(valuefiles.status == "A"){
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).val("Approved");
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).text("Approved");
                                    }else if(valuefiles.status == "D"){
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).val("Denied");
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).text("Denied");
                                    }else if(valuefiles.status == "P"){
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).val("Pending");
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).text("Pending");
                                    }else{
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).val("No Attachment");
                                        $( "#file_upload_motor_status"+valuefiles.idmaintained ).text("No Attachment");
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
                            $('#tbl_motor_generic_table').empty();
                            $.each(result, function(key, valuefilesgeneric){
                                $('#tbl_motor_generic_table').append('<tr><td><a href="'+valuefilesgeneric.link+'" target="_blank">'+valuefilesgeneric.filename+'</a></td></tr>');
                            });
                        }
                    }); 
                    $.ajax({
                        url: url + '/claims/motor/get/remarks',
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

                                $('<li id="li_motor'+ numberpart +'">').text('').prependTo('.posts_motor');
                                $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(valueremarks.remarks).prependTo('#li_motor'+ numberpart +'');
                                $('<br>').prependTo('#li_motor'+ numberpart +'');
                                $('<label style="float:right;font-weight:normal;">').text(fulldate).prependTo('#li_motor'+ numberpart +'');
                                $('<label style="float:left;font-weight:bold;">').text(valueremarks.remarks_name+' ('+valueremarks.remarks_by +')' ).prependTo('#li_motor'+ numberpart +'');
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
    $('.input-img_view').change(function() {
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
    $('.empty_fileupload_view').click(function() {
            var no = $(this).data("id");
        
            if(confirm("Are you sure you want to delete this file?")){
                var id = "file_upload_motor_hd_view" + no;
                var idfile = $("#"+id).val();
                var _token = $('input[name="_token"]').val();
                var url = $('input[name="url"]').val();
                $.ajax({
                    url: url + '/claims/motor/delete/file',
                    method:"GET",
                    data:{ _token:_token,id:idfile},
                    success:function(result)
                    {
                        $.each(result, function(key, valueremarks){
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
            else{
                return false;
            }
    });


</script>
<style>
    .counter_motor {
    display: inline;
    margin-top: 0;
    margin-bottom: 0;
    margin-right: 10px;
    }
    .posts_motor {
    clear: both;
    list-style: none;
    padding-left: 0;
    width: 100%;
    text-align: left;
    }
    .posts_motor li {
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
    $('.btn-motor-comment-add').click(function() {
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
        var line_id = $('input[name=hd_claim_motor_id]').val();
        var line = "MC";
        var post = $('.status-box_motor').val();

        var minNumberfifth = 40000000;
        var maxNumberfifth = 100000000;
        var numberpart = Math.floor(Math.random()*(maxNumberfifth-minNumberfifth+1)+minNumberfifth);

        $('<li id="li_motor'+ numberpart +'">').text('').prependTo('.posts_motor');
        $('<span style="font-weight:normal;float:left;margin-bottom: 0px !important;margin-left: -28%;">').text(post).prependTo('#li_motor'+ numberpart +'');
        $('<br>').prependTo('#li_motor'+ numberpart +'');
        $('<label style="float:right;font-weight:normal;">').text(datetime).prependTo('#li_motor'+ numberpart +'');
        $('<label style="float:left;font-weight:bold;">').text('<?php echo \Auth::user()->name ?>'+' ('+'<?php echo \Auth::user()->email ?>' +')' ).prependTo('#li_motor'+ numberpart +'');
        $('.status-box_motor').val('');
        $('.counter_motor').text('250');
        $('.btn-motor-comment-add').addClass('disabled');


        $.ajax({
            url: url + '/claims/motor/insert/remarks',
            method:"GET",
            data:{ _token:_token,line_id:line_id,line:line,post:post},
            success:function(result)
            {
                $.each(result, function(key, valueremarks){
                });
            }
        }); 
    
  });
  $('.status-box_motor').keyup(function() {
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
</script>