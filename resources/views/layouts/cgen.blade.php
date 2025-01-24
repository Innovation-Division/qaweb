<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}" crossorigin="use-credentials">
    <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#008080">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="description" content="{!! $metadescription !!}">
    <meta name="keywords" content="{!! $keyword !!}">

    <link href="{{ asset('/assets/dist/bootstrap-5.1.3/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/global.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/header.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/footer.less') }}" />

    {{-- grab from old template styles/js here --}}
    <link href="{{ asset('fontawesome/css/font-awesome.css') }}" rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/old-css/styles.css') }}" media="all">

    @yield('stylesheet')

    <script src="{{ asset('assets/dist/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    {{--  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    @section('javascripts')
        <!-- DEV MODE -->
        <script data-env="development" src="{{ asset('/assets/dist/lessjs/less.min.js') }}"></script>
        {{-- <script>
            less.watch();
        </script> --}}
    @show

    {{--  <script src="https://connect.facebook.net/en_US/sdk.js?hash=02fbc8ab7dcddd126b6f07c38b8e9a1c" async="" crossorigin="anonymous"></script>
    <script src="https://connect.facebook.net/signals/config/2323382494573532?v=2.9.4&amp;r=stable" async=""></script>
    <script id="facebook-jssdk" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v3.0"></script>  --}}
    {{--  <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>  --}}

    {{-- <script src="https://connect.facebook.net/signals/plugins/inferredEvents.js?v=2.9.4" async=""></script>
    <script src="https://connect.facebook.net/en_US/sdk.js?hash=02fbc8ab7dcddd126b6f07c38b8e9a1c" async="" crossorigin="anonymous"></script>
    <script src="https://connect.facebook.net/signals/config/2323382494573532?v=2.9.4&amp;r=stable" async=""></script>
    <script id="facebook-jssdk" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v3.0"></script>
    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>

    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/38/1/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/38/1/util.js"></script> --}}

    {{-- <script type="text/javascript">
        //<![CDATA[
        Mage.Cookies.path = '/';
        Mage.Cookies.domain = '.www.cocogen.com';
        optionalZipCountries = ["HK", "IE", "MO", "PA"];
        //]]>
    </script> --}}

    {{-- <script type="text/javascript">
        //<![CDATA[
        optionalZipCountries = ["HK", "IE", "MO", "PA"];
        //]]>
    </script> --}}

    @include('partials.google')
    @include('partials.facebook')

</head>
    <style type="text/css">
        .modal-backdrop {
            z-index: 0 !important
        }

        .modal-open {
            overflow: auto !important;
        }
    </style>
<body>
    @yield('after_body_start_scripts')
    @include('partials.header')
    @yield('content')
    @include('partials.footer')

    {{--  <div class="fixed-bottom sp-only" style="">
        <ul>
            <li>
                <a href="#">
                    <span class="occIcon-31902-76901">
                    <img class="occIconState" src="https://www.onlinechatcenters.com/status-31902-76901" style="display: inline; position: fixed; z-index: 2147483645; right: 0px; bottom: 0px;
                        cursor: pointer;" alt="Live Chat Support Online" title="Live Chat Support Online" data-relation="31902d76901" vspace="0" hspace="0" border="0"></span>
                        <span class="fa fa-commenting-o">
                    </span>
                    <span class="txt">chat</span>
                </a>
            </li>
        </ul>
    </div>  --}}
    @include('partials/livechat')
@if (!Auth::guest())
 @if(\Auth::user()->type == 'A')

   @endif
   @endif   
    
    @include('popup')

    @yield('before_body_end_templates')

    <script type="text/javascript" async="" src="https://www.onlinechatcenters.com/visitor/?SESSID=grjljvcnkgn615mbb9aacps4h2&amp;action=state&amp;state_id_manager=31902&amp;state_departments=76901&amp;state_operators=&amp;4253715"></script>
    <script type="text/javascript" async="" src="https://www.onlinechatcenters.com/code-31902-76901.js"></script>
    <script src="{{ asset('assets/dist/jquery.responsiveImage/jquery.responsiveImage.min.js') }}"></script>

    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>

    {{-- grab from old template js (ucpb-main.js) --}}

 <script type="text/javascript">
    $( document ).ready(function() 
    {
        $('#modalSurveyShow').hide();
        $('#modalSurvey').on('click', function(e) {
        $('#modalSurveyShow').modal('show');
        $('#modalSurveyShow').show();
      });

        jQuery('#feedbackMonthly').hide();
         $('#modalSurvey').hide();
             $('#closeModal').on('click', function(e) {
             $('#modalSurveyShow').hide();
              location.reload();

          });

      $('#submit_feedback').on('click', function(e) {
        e.preventDefault();
        var _token = jQuery('input[name="_token"]').val();
        var email = jQuery('.emailAdd').val();
        var agentMessage = jQuery('#message-text').val();
        var fullname = jQuery('#fullname').val();


        $(".validation_message-text").remove();
        $(".validation_message-text_check_error").remove(); 
        $(".validation_message-textsuccess").remove();

        $(".validation_fullname").remove();
        $(".validation_fullname_check_error").remove(); 
        $(".validation_fullname_success").remove();

          errornumber = 0; 


          if($('#message-text').val() == ""){
            $('#message-text').css('border-color', '#F44336');            
                    $("#message-text").after("<div class='validation_message-text' style='opacity:0.7;color:#F44336;'>Comment is empty</div>");    
            $('#message-text').after('<i class="fa fa-times-circle validation_message-text_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#message-text').after('<i class="fa fa-check-circle validation_message-textsuccess fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#message-text').css('border-color', '#4BB543');                   
          } 


          if($('#fullname').val() == ""){
            $('#fullname').css('border-color', '#F44336');            
                    $("#fullname").after("<div class='validation_fullname' style='opacity:0.7;color:#F44336;'>Name is empty</div>");    
            $('#fullname').after('<i class="fa fa-times-circle validation_fullname_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
            errornumber = 1;           
          }else{                        
            $('#fullname').after('<i class="fa fa-check-circle validation_fullname_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
            $('#fullname').css('border-color', '#4BB543');                   
          } 

          if(errornumber == 1){
             
            return false;
          }else{


            $.ajax({
                type: "POST",
                url: "{{  route ('userfeedback') }}",
                data:{ _token:_token,email:email,agentMessage:agentMessage,fullname:fullname}, 
                success: function(response) {
                    jQuery('#message-text').val('');
                    jQuery('#fullname').val('');
                    $('#myModal').hide();
                      $('#modalSurveyShow').hide();
                      location.reload();

                },
                error: function() {
                    alert('Error');
                }
            });
          }
        return false;
    });
});

    </script>
         
    <script type="text/javascript">
        // CHAT EVENTS
        function showChat() {
            $(".pop-up-chat").addClass("show");
            $(".chat-header .icons span").stop(true, true).attr("class", "icon-error2");
        }

        function hideChat() {
            $(".pop-up-chat").removeClass("show");
            var chat_height = jQuery(".pop-up-chat").outerHeight(true),
                chat_header = jQuery(".chat-header").outerHeight(true),
                a = chat_height - chat_header,
                b = '-' + a,
                t = parseInt(b);
            $(".pop-up-chat").css('bottom', t);
            $(".chat-header .icons span").stop(true, true).attr("class", "icon-add2");
        }

        $(document).ready(function() {
            $('.chat-header').click(function() {
                if ($(this).closest('.pop-up-chat').hasClass('show')) {
                    hideChat();
                } else {
                    showChat();
                }
            });
            $('li.search .dropdown .search-dropdown form').submit(function(e) {
                if (!$('input[name="srchterm"]').val()) {
                    e.preventDefault();
                }
            });

            $('.responsive-img').responsiveImage();
        });
    </script>
    

    @yield('before_body_end_scripts')
</body>

</html>
