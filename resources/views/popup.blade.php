<?php $date = date('H:i:s');  ?>

@if(Session::get('first_page_time'))
{{ Session::put('first_page_time', Session::get('first_page_time')) }}
@else
{{ Session::put('first_page_time', $date) }}
@endif

 <?php    
    if(!empty(\Auth::user()->email)){
        $id = \Auth::user()->email;
    }else{
        $id = "";       
    }

    Session::save();

    $datetoday = $date;
    $first = Session::get('first_page_time');

    $t1 = strtotime($first);
    $t2 = strtotime($datetoday);

    $diff = gmdate('His', $t2 - $t1);
    $diff_hour = gmdate('H', $t2 - $t1)*3600000;
    $dif_sec = gmdate('i', $t2 - $t1)*60000;
    $diff_mills = gmdate('s', $t2 - $t1)*1000;
    $time =  $diff_hour + $dif_sec + $diff_mills;
    if($time <=420000){
        $final = 420000 - (int)$time;
    }else{
        $final = 300;
    }

?>
<style type="text/css">
#privacy-policy .modal-backdrop {
    z-index: -1;
}
#privacy-policy.modalv3 .modal-dialog {
    display: flex;
    align-items: center;
    min-height: calc(100% - 1rem);
}
#privacy-policy .modal-dialog {
    max-width: 700px;
}
#privacy-policy .modal-content {
    background: url('/images/dbpr/Omnibus Photo.jpg') right center no-repeat;
    background-size: contain;
    background-color: #ffffff;
    width: 100%;
    border-radius: 6px;
}
#privacy-policy .modal-body {
    height: 400px;
    padding: 20px;
    border-radius: 6px;
}
#privacy-policy .bg-effect {
    background-color: #ffffffd6;
    border-radius: 6px;
    position: absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    z-index: 0;
}
#survey_form .close {
    filter: alpha(opacity=20);
    opacity: .2;
}
#survey_form .close span {
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
}
#survey_form .modal-backdrop {
    z-index: -1;
}
#survey_form.modalv3 .modal-dialog {
    display: flex;
    align-items: center;
    min-height: calc(100% - 1rem);
}
#survey_form .modal-dialog {
    max-width: 600px;
}
#survey_form .modal-content {
    background: url('/images/survey/Assets_Asset.png') left top no-repeat;
    background-size: 50%;
    background-color: #ffffff;
    width: 100%;
}
#survey_form .modal-header{
    min-height: 0px;
}
#survey_form .modal-body {
    padding: 15px 20px 20px 20px;
    border-radius: 6px;
}
#survey_form .bg-effect {
    background-color: #ffffffd6;
    border-radius: 6px;
    position: absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    z-index: 0;
}
.swap-on-hover_happy {
    width: 35px;
    height: 35px;
    position: relative;
    margin: 0px 10px;
}
.swap-on-hover_happy img {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    width: 35px;
    height: 35px;
}
.swap-on-hover_happy .swap-on-hover__front-image {
    z-index: 9999;
    transition: opacity .1s linear;
    cursor: pointer;
}
.swap-on-hover_happy:hover > .swap-on-hover__front-image{
    opacity: 0;
}
.swap-on-hover_neutral {
    width: 35px;
    height: 35px;
    position: relative;
    margin: 0px 10px;
}
.swap-on-hover_neutral img {
    position: absolute;
    top:0;
    left:0;
    overflow: hidden;
    width: 35px;
    height: 35px;
}
.swap-on-hover_neutral .swap-on-hover__front-image {
    z-index: 9999;
    transition: opacity .1s linear;
    cursor: pointer;
}
.swap-on-hover_neutral:hover > .swap-on-hover__front-image{
    opacity: 0;
}
.swap-on-hover_sad {
    width: 35px;
    height: 35px;
    position: relative;
    margin: 0px 10px;
}
.swap-on-hover_sad img {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    width: 35px;
    height: 35px;
}
.swap-on-hover_sad .swap-on-hover__front-image {
    z-index: 9999;
    transition: opacity .1s linear;
    cursor: pointer;
}
.swap-on-hover_sad:hover > .swap-on-hover__front-image{
    opacity: 0;
}
@media screen and (max-width: 767px) {
    #privacy-policy .modal-content {
        background-size: cover;
        background-position: center center;
    }
    #survey_form .modal-content {
        background-size: contain;
        background-position: center top;
    }
    #privacy-policy .modal-body {
        height: auto;
    }
}
</style> 

@include('partials/modal/privacy-policy', ['modalVersion' => $modalVersion ?? null])
@include('partials/modal/survey', ['modalVersion' => $modalVersion ?? null])

<script type="text/javascript">
function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000 * 365));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function setCookieSurvey(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (30 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');            
    return keyValue ? keyValue[2] : null;
}

function handleCookieConsentGiven(key) {
    setCookie("cocogen8830600367234019333R", true);            
}

function handleCookieConsentGiveSurvey(key) {
    setCookieSurvey("cocogen883060036723401933RSurvey", true);            
}

(function ($) {

    $(document).ready(function(){
        $('#privacy-policy').modal({
            keyboard: false,
            backdrop: false,
            show: false
        });
        $('#survey_form').modal({
            keyboard: false,
            backdrop: false,
            show: false
        });

        $('#privacy-policy').on('hidden.bs.modal', function(e){
            if ($('#survey_form').hasClass('show')) {
                $('body').css('overflow', 'auto');
            }
        });
        $('#survey_form').on('hidden.bs.modal', function(e){
            if ($('#privacy-policy').hasClass('show')) {
                $('body').css('overflow', 'auto');
            }
        });

        $('.agree_div_popup').addClass('d-none');               
        $("#ChckPrivacyPolicy").on('change', function () { 
            if ($(this).is(':checked') === true) {
                $('.agree_div_popup').removeClass('d-none');
            } else {
                $('.agree_div_popup').addClass('d-none');
            }                    
        });

        /*==============================
        COOKIES
        ================================*/
        $('#cookiey').click(function(e) {
            e.preventDefault();
            $('#privacy-policy').hide();
            handleCookieConsentGiven();
        });

        $('#warning_no_rating').css("display", "none");   
        $('.button_survey_submit').click(function(e) {
            e.preventDefault();
            if ($('input[name="rating"]').val() == "") {              
                $('#warning_no_rating').css("display", "block");
                return false;
            } else {  
                $('#warning_no_rating').css("display", "none");
                var starCount = $('input[name="rating"]').val();;
                var survey = $('#survey_text').val();
                var _token = $('input[name="_token"]').val();
                var iduser = '<?php echo $id; ?>';
                $.ajax({
                    url:'{{url('/')}}' + '/api/survey/insert/data',
                    method:"GET",
                    data:{ _token:_token, starCount:starCount, survey:survey, iduser:iduser},  
                    success: function(result) {}
                });          
                $('#survey_form').modal('hide');  
                handleCookieConsentGiveSurvey();
            }
        });

        $('.button_survey_cancel').click(function(e) {
            e.preventDefault();
            $('#survey_form').modal('hide');  
            $('#warning_no_rating').css("display", "none");
            handleCookieConsentGiveSurvey();
        });

        $('#survey_close_').click(function(e) {
            e.preventDefault();
            $('#warning_no_rating').css("display", "none");
            $('#survey_form').modal('hide');  
            handleCookieConsentGiveSurvey();
        });

        $('#warning_no_rating').css("display", "none");
        if (!getCookie("cocogen8830600367234019333R")) { 
            $('#privacy-policy').modal('show');                
        } else {
            handleCookieConsentGiven();                
        }   

        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/')}}' + '/api/survey/get/set',
            method: "GET",
            data: { _token:_token},  
            success: function(result) {    
                $.each(result, function(key, value) {
                    if (value.tag == "Yes") {
                        if (!getCookie("cocogen883060036723401933RSurvey")) {    
                                                         
                            $('#question').text(value.question);
                            $('#question_login').text(value.question_login);
                            $('#question_exp').text(value.question_rate);
                            $('#survey_text').val("");

                            var final = '<?php echo $final; ?>';
                            setTimeout(function(){ 
                                 $('#survey_form').delay(300).modal('show'); // 120000 = 2mins
                             }, final);

                        } else {
                            handleCookieConsentGiveSurvey();                
                        }
                    }
                });
            }
        });   
    });

})(jQuery);
     
jQuery('.swap-on-hover_sad').click(function() {
    jQuery('#sad_face_gray').css('opacity', '0');
    jQuery('#neutral_face_gray').css('opacity', '9');
    jQuery('#happy_face_gray').css('opacity', '9');                                                    
    jQuery('#warning_no_rating').css("display", "none");
    jQuery('input[name="rating"]').val("Sad");
});
jQuery('.swap-on-hover_neutral').click(function() {
    jQuery('#sad_face_gray').css('opacity', '9');
    jQuery('#neutral_face_gray').css('opacity', '0');
    jQuery('#happy_face_gray').css('opacity', '9');
    jQuery('#warning_no_rating').css("display", "none");
    jQuery('input[name="rating"]').val("Neutral");
});
jQuery('.swap-on-hover_happy').click(function() {
    jQuery('#sad_face_gray').css('opacity', '9');
    jQuery('#neutral_face_gray').css('opacity', '9');
    jQuery('#happy_face_gray').css('opacity', '0');
    jQuery('#warning_no_rating').css("display", "none");
    jQuery('input[name="rating"]').val("Happy");
});

</script> 
