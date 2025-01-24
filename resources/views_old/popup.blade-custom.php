 <?php $date = date('H:i:s'); ?>

 @if (Session::get('first_page_time'))
     {{ Session::put('first_page_time', Session::get('first_page_time')) }}
 @else
     {{ Session::put('first_page_time', $date) }}
 @endif

 <?php
 if (!empty(\Auth::user()->email)) {
     $id = \Auth::user()->email;
 } else {
     $id = '';
 }

 Session::save();

 $datetoday = $date;
 $first = Session::get('first_page_time');

 $t1 = strtotime($first);
 $t2 = strtotime($datetoday);

 $diff = gmdate('His', $t2 - $t1);
 $diff_hour = gmdate('H', $t2 - $t1) * 3600000;
 $dif_sec = gmdate('i', $t2 - $t1) * 60000;
 $diff_mills = gmdate('s', $t2 - $t1) * 1000;
 $time = $diff_hour + $dif_sec + $diff_mills;
 if ($time <= 120000) {
     $final = 120000 - (int) $time;
 } else {
     $final = 300;
 }

 ?>
 <style type="text/css">
     #ChckPrivacyPolicy+label {
         display: block;
         margin: 0.2em;
         cursor: pointer;
         padding: 0.2em;

     }

     #ChckPrivacyPolicy {
         display: none;
     }

     #ChckPrivacyPolicy+label:before {
         content: "\2714";
         border: 0.1em solid #808080;
         border-radius: 0.2em;
         display: inline-block;
         width: 1.5em;
         height: 1.5em;
         padding-left: 0.2em;
         padding-bottom: 0.3em;
         margin-right: 0.2em;
         vertical-align: bottom;
         color: transparent;
         transition: .2s;

     }

     #ChckPrivacyPolicy+label:active:before {
         transform: scale(0);
     }

     #ChckPrivacyPolicy:checked+label:before {
         background-color: MediumSeaGreen;
         border-color: MediumSeaGreen;
         color: #fff;
     }

     #ChckPrivacyPolicy:disabled+label:before {
         transform: scale(1);
         border-color: #aaa;
     }

     #ChckPrivacyPolicy:checked:disabled+label:before {
         transform: scale(1);
         background-color: #bfb;
         border-color: #bfb;
     }

     @media screen and (min-width:801px) {
         p.centertext {
             margin-right: 15px;
             margin-left: -15px;
         }
     }

     div.privacy_with_pop_footer {
         margin-top: 0px;
         margin-right: 25px;
     }

     div.privacy_with_pop {
         min-width: 1000px !important;
     }

     @media screen and (max-width:800px) {
         div.privacy_with_pop {
             min-width: 20px !important;
         }

         div.privacy_with_pop_footer {
             margin-top: -10px;
             margin-right: 25px;

         }

         div.data-policy-img {
             border-top-right-radius: 5% !important;

         }

         #privacy-policy-img1 {
             height: auto !important;
             border-top-right-radius: 5px !important;
             border-bottom-left-radius: 0 !important;
         }

         .privacyopotitle {
             font-size: 20px !important;
         }
     }

 </style>


 <?php /*
  <div class="modal fade in" id="privacy-policy" style="display: none;" aria-hidden="false">
      <div class="modal-backdrop fade in">
      </div>
      <div class="modal-dialog modal-lg privacy_with_pop">
          <div class="modal-content">
              <div class="row">
                  <div class="col-md-5 col-sm-5 data-policy-img">
                      <img id="privacy-policy-img1" class="imgpopup" alt="" src="{{ url('/images/dbpr/Omnibus Photo.jpg') }}">
                  </div>
                  <div class="col-md-7 col-sm-7">
                      <div class="containe col-md-12 col-sm-12">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="modal-header">
                                  </div>
                                  <h2 class="modal-title privacyopotitle">
                                      Your personal data
                                      <br>
                                      belongs to you
                                  </h2>
                                  <br>
                                  <div class="modal-body">
                                      <p class="centertext" style="text-align: justify;font-size: 17px;">We only collect the information you choose to give us, and we process it with your consent. For detailed information on how we use your personal data, we encourage you to exercise your rights
                                          and read through our <a href="{{ url('/') }}/data-privacy" target="_blank" style="font-size: 17px;">Privacy Policy</a>.</p>
                                      <p class="centertext" style="text-align: justify;font-size: 17px;">
                                          <input type="checkbox" id="ChckPrivacyPolicy" name="ChckPrivacyPolicy" value="1" <?php if (old('ChckPrivacyPolicy')) {
     echo 'checked';
 } ?>
 ?>>
 <label for="ChckPrivacyPolicy" style="text-align: justify;font-size: 16px;"> I hereby confirm that I am aware of Cocogen's Privacy Policy</label>
 </p>


 </div>
 <div class="modal-footer privacy_with_pop_footer" style="">
     <div class="agree_div_popup">
         <a class="cookie-agree" href="#" id="cookiey" style="font-family: muli;font-size: 17px">Agree </a>
     </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 */ ?>

 <div class="modal fade" id="privacy-policy" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">

             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-5 col-sm-5 data-policy-img">
                         <img id="privacy-policy-img1" class="imgpopup" alt="" src="{{ url('/images/dbpr/Omnibus Photo.jpg') }}">
                     </div>
                     <div class="col-md-7 col-sm-7">
                         <div class="containe col-md-12 col-sm-12">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="modal-header">
                                     </div>
                                     <h2 class="modal-title privacyopotitle">
                                         Your personal data
                                         <br>
                                         belongs to you
                                     </h2>
                                     <br>
                                     <div class="modal-body">
                                         <p class="centertext" style="text-align: justify;font-size: 17px;">We only collect the information you choose to give us, and we process it with your consent. For detailed information on how we use your personal data, we encourage you to exercise your
                                             rights
                                             and read through our <a href="{{ url('/') }}/data-privacy" target="_blank" style="font-size: 17px;">Privacy Policy</a>.</p>
                                         <p class="centertext" style="text-align: justify;font-size: 17px;">
                                             <input type="checkbox" id="ChckPrivacyPolicy" name="ChckPrivacyPolicy" value="1" <?php if (old('ChckPrivacyPolicy')) {
    echo 'checked';
} ?>>
                                             <label for="ChckPrivacyPolicy" style="text-align: justify;font-size: 16px;"> I hereby confirm that I am aware of Cocogen's Privacy Policy</label>
                                         </p>


                                     </div>
                                     <div class="modal-footer privacy_with_pop_footer" style="">
                                         <div class="agree_div_popup">
                                             <a class="cookie-agree" href="#" id="cookiey" style="font-family: muli;font-size: 17px" data-bs-dismiss="modal">Agree </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script type="text/javascript">
     $(document).ready(function() {
         jQuery('.agree_div_popup').hide();
         $("#ChckPrivacyPolicy").on('change', function() {
             if (jQuery(this).is(':checked') === true) {
                 jQuery('.agree_div_popup').show()
             } else {
                 jQuery('.agree_div_popup').hide()
             }
         });
     });
 </script>

 <div class="modal fade" id="survey_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-body">
                 <div class="row">
                     <div id="class-with-pic" class="col-md-6 col-sm-6" style="">
                         <img alt="Survey Image" src="{{ url('/images/survey/Assets_Asset.png') }}" width="300" style="margin-top: 25%">
                     </div>
                     <div id="class-with-parameter" class="col-md-6 col-sm-6">
                         <div class="container col-md-12 col-sm-12">
                             <div class="row">
                                 <div class="col-md-12" style="margin-top: 7%;">
                                     <img id="survey_close_" alt="close" src="{{ url('/images/survey/Assets_Close_Button.png') }}" width="12" data-bs-dismiss="modal" aria-label="Close">


                                     <div class="modal-body" style="font-family: muli;">
                                         <div id="warning_no_rating" name="warning_no_rating" class="alert alert-danger" style="display: none;text-align: left">
                                             <strong>*Please select rating!</strong>
                                         </div>
                                         {{ csrf_field() }}

                                         @if (!Auth::guest())
                                             <h4 id="question_login" name="question_login" style="font-weight: bold;"> How satiesfied are you with COCOGEN's service?</h4>
                                         @else
                                             <h4 id="question" name="question" style="font-weight: bold;"></h4>
                                         @endif


                                         <h5 id="question_exp" name="question_exp" style="font-weight: bold;">Rate your experience</h5>
                                         <div class="col-md-12" style="height: 60px;">
                                             <input type="hidden" id="rating" name="rating" value="">
                                             <div class="row">
                                                 <figure class="swap-on-hover_sad">
                                                     <img id="sad_face_gray" name="sad_face_gray" class="swap-on-hover__front-image" src="{{ url('/images/survey/Sad_Gray.png') }}" title="Sad" />
                                                     <img id="sad_face" name="sad_face" class="swap-on-hover__back-image" src="{{ url('/images/survey/Sad.png') }}" title="Sad" />
                                                 </figure>


                                                 <figure class="swap-on-hover_neutral">
                                                     <img id="neutral_face_gray" name="neutral_face_gray" class="swap-on-hover__front-image" src="{{ url('/images/survey/Neutral_Gray.png') }}" title="Neutral" />
                                                     <img id="neutral_face" name="neutral_face" class="swap-on-hover__back-image" src="{{ url('/images/survey/Neutral.png') }}" title="Neutral" />
                                                 </figure>

                                                 <figure class="swap-on-hover_happy">
                                                     <img id="happy_face_gray" name="happy_face_gray" class="swap-on-hover__front-image" src="{{ url('/images/survey/Happy_Gray.png') }}" title="Happy" />
                                                     <img d="happy_face" name="happy_face" class="swap-on-hover__back-image" src="{{ url('/images/survey/Happy.png') }}" title="Happy" />
                                                 </figure>
                                             </div>
                                         </div>

                                         <p>
                                             <textarea style="height: 150px;" id="survey_text" name="survey_text" class="form-control" rows="5" placeholder="Your Comments..."></textarea>
                                         </p>
                                         <div class="row">
                                             <div class="col-md-12 col-md-6">
                                                 <a class="button_survey_submit form-control" id="btnSubmit_survey" style="font-family: muli;">Submit </a>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>

 {{-- <div class="modal fade in" id="survey_form" style="display: none;" aria-hidden="false">
     <div class="modal-backdrop fade in"> </div>
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="row">
                 <div id="class-with-pic" class="col-md-6 col-sm-6" style="">
                     <img alt="Survey Image" src="{{ url('/images/survey/Assets_Asset.png') }}" width="300" style="margin-top: 25%">
                 </div>
                 <div id="class-with-parameter" class="col-md-6 col-sm-6">
                     <div class="container col-md-12 col-sm-12">
                         <div class="row">
                             <div class="col-md-12" style="margin-top: 7%;">
                                 <img id="survey_close_" alt="close" src="{{ url('/images/survey/Assets_Close_Button.png') }}" width="12">


                                 <div class="modal-body" style="font-family: muli;">
                                     <div id="warning_no_rating" name="warning_no_rating" class="alert alert-danger" style="display: none;text-align: left">
                                         <strong>*Please select rating!</strong>
                                     </div>
                                     {{ csrf_field() }}

                                     @if (!Auth::guest())
                                         <h4 id="question_login" name="question_login" style="font-weight: bold;"> How satiesfied are you with COCOGEN's service?</h4>
                                     @else
                                         <h4 id="question" name="question" style="font-weight: bold;"></h4>
                                     @endif


                                     <h5 id="question_exp" name="question_exp" style="font-weight: bold;">Rate your experience</h5>
                                     <div class="col-md-12" style="height: 60px;">
                                         <input type="hidden" id="rating" name="rating" value="">
                                         <div class="row">
                                             <figure class="swap-on-hover_sad">
                                                 <img id="sad_face_gray" name="sad_face_gray" class="swap-on-hover__front-image" src="{{ url('/images/survey/Sad_Gray.png') }}" title="Sad" />
                                                 <img id="sad_face" name="sad_face" class="swap-on-hover__back-image" src="{{ url('/images/survey/Sad.png') }}" title="Sad" />
                                             </figure>


                                             <figure class="swap-on-hover_neutral">
                                                 <img id="neutral_face_gray" name="neutral_face_gray" class="swap-on-hover__front-image" src="{{ url('/images/survey/Neutral_Gray.png') }}" title="Neutral" />
                                                 <img id="neutral_face" name="neutral_face" class="swap-on-hover__back-image" src="{{ url('/images/survey/Neutral.png') }}" title="Neutral" />
                                             </figure>

                                             <figure class="swap-on-hover_happy">
                                                 <img id="happy_face_gray" name="happy_face_gray" class="swap-on-hover__front-image" src="{{ url('/images/survey/Happy_Gray.png') }}" title="Happy" />
                                                 <img d="happy_face" name="happy_face" class="swap-on-hover__back-image" src="{{ url('/images/survey/Happy.png') }}" title="Happy" />
                                             </figure>
                                         </div>
                                     </div>

                                     <p>
                                         <textarea style="height: 150px;" id="survey_text" name="survey_text" class="form-control" rows="5" placeholder="Your Comments..."></textarea>
                                     </p>
                                     <div class="row">
                                         <div class="col-md-12 col-md-6">
                                             <a class="button_survey_submit form-control" id="btnSubmit_survey" style="font-family: muli;">Submit </a>
                                         </div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div> --}}
 <style type="text/css">
     /*Sad*/
     .swap-on-hover_happy {
         position: fixed;
         margin: 0 auto;
         max-width: 35px;
         height: 35px;
         margin-left: 60px;
         margin-top: 5px;

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

     .swap-on-hover_happy:hover>.swap-on-hover__front-image {
         opacity: 0;
     }

     /*Neutral*/
     .swap-on-hover_neutral {
         position: fixed;
         margin: 0 auto;
         max-width: 35px;
         height: 35px;
         margin-top: 5px;
         margin-left: 120px;

     }

     .swap-on-hover_neutral img {
         position: absolute;
         top: 0;
         left: 0;
         overflow: hidden;
         width: 35px;
         height: 35px;
     }

     .swap-on-hover_neutral .swap-on-hover__front-image {
         z-index: 9999;
         transition: opacity .1s linear;
         cursor: pointer;
     }

     .swap-on-hover_neutral:hover>.swap-on-hover__front-image {
         opacity: 0;
     }

     /*Happy*/
     .swap-on-hover_sad {
         position: fixed;
         margin: 0 auto;
         max-width: 35px;
         height: 35px;
         margin-top: 5px;
         margin-left: 180px;
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

     .swap-on-hover_sad:hover>.swap-on-hover__front-image {
         opacity: 0;
     }

     @media (max-width:800px) {

         /*Sad*/
         .swap-on-hover_happy {
             position: fixed;
             margin: 0 auto;
             max-width: 35px;
             height: 35px;
             margin-left: 35px;
             margin-top: 5px;

         }

         /*Neutral*/
         .swap-on-hover_neutral {
             position: fixed;
             margin: 0 auto;
             max-width: 35px;
             height: 35px;
             margin-top: 5px;
             margin-left: 95px;

         }

         /*Happy*/
         .swap-on-hover_sad {
             position: fixed;
             margin: 0 auto;
             max-width: 35px;
             height: 35px;
             margin-top: 5px;
             margin-left: 155px;
         }
     }
     }

 </style>
 <style type="text/css">
     #survey_form {
         top: 25%;
     }

     #survey_close_ {
         float: right;
         margin-top: -10px;
     }

     #class-with-pic {
         background-color: #006565;
         height: 400px;
         border-top-left-radius: 2%;
         border-bottom-left-radius: 2%;
     }

     .button_survey_submit:hover {
         text-decoration: none;
         color: white;
         cursor: pointer;
     }

     #privacy-policy-img {
         height: 420px !important;
     }

     @media (max-width: 991px) {
         #survey_form {
             top: 15% !important;
             margin-top: 20px;
             margin-right: 20px;
             margin-left: 20px;
         }

         #class-with-pic {
             height: 50%;
             display: none;
         }

         .button_survey_submit {
             margin-bottom: 7px;
         }

         #privacy-policy-img {

             border-top-left-radius: 2% !important;
             border-bottom-left-radius: 0% !important;
             border-top-right-radius: 2% !important;
         }

     }

     .button_survey_submit {
         display: block;
         height: 35px;
         background: #006565;
         padding: 10px;
         text-align: center;
         border-radius: 5px;
         color: white;
         font-weight: bold;
         line-height: 12px;
     }

     .button_survey_submit:hover {
         text-decoration: none;
         color: white;
         cursor: pointer;
     }

     .button_survey_cancel {
         display: block;
         height: 35px;
         background: #e4509a;
         padding: 10px;
         text-align: center;
         border-radius: 5px;
         color: white;
         font-weight: bold;
         line-height: 12px;
     }

     .button_survey_cancel:hover {
         text-decoration: none;
         color: white;
         cursor: pointer;
     }

 </style>

 <script type="text/javascript">
     jQuery('.cookie-agree').click(function(e) {
         e.preventDefault();
         jQuery('#privacy-policy').hide();
         handleCookieConsentGiven();
     });

     jQuery('#warning_no_rating').css("display", "none");
     jQuery('.button_survey_submit').click(function(e) {
         e.preventDefault();
         if (jQuery('input[name="rating"]').val() == "") {
             jQuery('#warning_no_rating').css("display", "block");
             return false;
         } else {
             jQuery('#warning_no_rating').css("display", "none");
             var starCount = jQuery('input[name="rating"]').val();;
             var survey = jQuery('#survey_text').val();
             var _token = jQuery('input[name="_token"]').val();
             var iduser = '<?php echo $id; ?>';
             jQuery.ajax({
                 url: '{{ url('/') }}' + '/api/survey/insert/data',
                 method: "GET",
                 data: {
                     _token: _token,
                     starCount: starCount,
                     survey: survey,
                     iduser: iduser
                 },
                 success: function(result) {

                 }
             })
             jQuery('#survey_form').hide();
             var surveyModal = new bootstrap.Modal(document.getElementById('survey_form'));
                surveyModal.hide();

             handleCookieConsentGiveSurvey();
         }

     });


     jQuery('.button_survey_cancel').click(function(e) {
         e.preventDefault();
         jQuery('#survey_form').hide();
         jQuery('#warning_no_rating').css("display", "none");
         handleCookieConsentGiveSurvey();
     });

     jQuery('#survey_close_').click(function(e) {
         e.preventDefault();
         jQuery('#warning_no_rating').css("display", "none");
         jQuery('#survey_form').hide();
         handleCookieConsentGiveSurvey();
     });

     function setCookie(key, value) {
         var expires = new Date();
         expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000 * 365));

         document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();

     }

     function setCookieSurvey(key, value) {
         var expires = new Date();
         expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000));

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


     $(document).ready(function() {

         // setTimeout(function(){ alert("Here your code"); }, 6000);
         jQuery('#warning_no_rating').css("display", "none");
         if (!getCookie("cocogen8830600367234019333R")) {
             jQuery('#privacy-policy').modal('show');
         } else {
             handleCookieConsentGiven();
         }

         var _token = jQuery('input[name="_token"]').val();
         jQuery.ajax({
             url: '{{ url('/') }}' + '/api/survey/get/set',
             method: "GET",
             data: {
                 _token: _token
             },
             success: function(result) {
                 jQuery.each(result, function(key, value) {
                     if (value.tag == "Yes") {
                         if (!getCookie("cocogen883060036723401933RSurvey")) {
                             jQuery('#question').text(value.question);
                             jQuery('#question_login').text(value.question_login);
                             jQuery('#question_exp').text(value.question_rate);
                             jQuery('#survey_text').val("");

                            setTimeout(function(){
                                var surveyModal = new bootstrap.Modal(document.getElementById('survey_form'));
                                surveyModal.show();
                             }, {{ $final}} );

                         } else {
                             handleCookieConsentGiveSurvey();
                         }
                     }

                 });
             }
         })
     });
 </script>

 <script type="text/javascript">
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
