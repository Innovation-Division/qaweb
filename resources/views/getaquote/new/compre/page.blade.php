
@extends('layouts.ecommerce ')

@section('content')
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/style.css') }}"></script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/step1/vars.css') }}"></script>

  <div id="sticky-div" class="fixme sticky-div " style="z-index:2;">
        @include('ecommerce.itp.title')
        @include('ecommerce.itp.progress')
  </div>
  <form method="post" action="{{ route('internationalinsurancesave') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="step">
            @include('ecommerce.itp.step1')
        </div>
        <div class="step">
            @include('ecommerce.itp.step2')
        </div>
        <div class="step">
            @include('ecommerce.itp.step3')
        </div>
        <div class="step">
            @include('ecommerce.itp.step4')
        </div>

  </form>
  @include('ecommerce.itp.button')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
      widget      = $(".step");
      btnnext     = $(".next");
      btnback     = $(".back");
      current = 1;
      widget.not(':eq(0)').hide();
      btnback.hide();
      

      $("#next").click(function(e){
             if(current < widget.length) {
                if(current == 1){
                  var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                    <div class="frame-108567">\
                      <div class="trip-details">Trip Details</div>\
                      <div class="completed">Completed</div>\
                    </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(completed);

                  var inprogress = ' <div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
                }

                if(current == 2){
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_quotation').empty();
                    $('#progress_quotation').append(completed);

                    var inprogress = ' <div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);                  
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
                }

                if(current == 3){
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_personal').empty();
                    $('#progress_personal').append(completed);

                    var inprogress = '<div class="frame-108563">\
                      <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Payment</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(inprogress);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#09a12a'});
                }

                if(current == 4){
                 
                    var completed = '<img class="vector" src="{{ asset("/asset/ecommerce/itp/vector0.svg") }}"/>\
                      <div class="frame-108567">\
                        <div class="trip-details">Payment</div>\
                        <div class="completed">Completed</div>\
                      </div>';
                    $('#progress_payment').empty();
                    $('#progress_payment').append(completed);

                }
                widget.show();
                widget.not(':eq('+(current++)+')').hide();
                setProgress(current);
                hideButtons(current);
             }
      });

      btnback.click(function(){
            if(current > 1){
              current = current - 2;
              if(current==0){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_1">1</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Trip Details</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_trip_details').empty();
                  $('#progress_trip_details').append(inprogress);

                  var pending = '<div class="frame-108564">\
                      <div class="_2">2</div>\
                    </div>\
                    <div class="frame-108569">\
                      <div class="quotation">Quotation</div>\
                      <div class="pending">Pending</div>\
                    </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(pending);
                  $('.line-5').css({ 'border-color': '#eff2f4'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
              }

              if(current==1){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_2">2</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Quotation</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_quotation').empty();
                  $('#progress_quotation').append(inprogress);

                  var pending = '<div class="frame-108565">\
                        <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108571">\
                        <div class="personal-data">Personal Data</div>\
                        <div class="pending">Pending</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(pending);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#eff2f4'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});
              }

              if(current==2){
                  var inprogress = '<div class="frame-108563">\
                      <div class="_3">3</div>\
                      </div>\
                      <div class="frame-108567">\
                        <div class="trip-details">Personal Data</div>\
                        <div class="in-progress">In Progress</div>\
                      </div>';
                  $('#progress_personal').empty();
                  $('#progress_personal').append(inprogress);

                  var pending = '<div class="frame-108566">\
                        <div class="_4">4</div>\
                      </div>\
                      <div class="frame-108573">\
                        <div class="payment">Payment</div>\
                        <div class="pending">Pending</div>\
                      </div>';
                  $('#progress_payment').empty();
                  $('#progress_payment').append(pending);
                  $('.line-5').css({ 'border-color': '#09a12a'});
                  $('.line-6').css({ 'border-color': '#09a12a'});
                  $('.line-7').css({ 'border-color': '#eff2f4'});

              }
              btnnext.trigger('click');
            }
            hideButtons(current);
      });
      // // Change progress bar action
      setProgress = function(currstep){
      var percent = parseFloat(100 / widget.length) * currstep;
      percent = percent.toFixed();
      $(".progress-bar")
          .css("width",percent+"%");
      }

      // // Hide buttons according to the current step
      hideButtons = function(current){
        var limit = parseInt(widget.length);
        // $(".action").hide();
        // alert(current);
        if(current <= 1){
          btnback.hide();
        }else{
          btnback.show();
        }
        btnnext.show();
      }
    });
</script>
<script>
  $(document).ready(function() {
    var fixmeTop = $('.fixme').offset().top;
      $(window).scroll(function() {
        // $( "#sticky-div" ).addClass( "test" );
          var currentScroll = $(window).scrollTop();
          // alert(currentScroll);
          if (currentScroll >= fixmeTop) {
            // alert("1");
              $('#sticky-div').css({
                  position: 'fixed',
                  top: '0',
                  left: '0'
              });
          } else {
            // alert("2");

              $('#sticky-div').css({
                  position: 'static'
              });
          }
      });


    window.onscroll = () => {
      // $( "#sticky-div" ).addClass( "test" );
        // alert(1);
      }
        // Smooth scrolling for anchor links
        $('a.scroll-link').click(function(event) {
            event.preventDefault(); // Prevent default action
          //alert(1);
            var target = $(this).attr('href'); // Get the target section
            $('html, body').animate({
                scrollTop: $(target).offset().top // Scroll to the target section
            }, 2000); // Duration of the animation in milliseconds
        });
    });
</script>
<script type="text/javascript" src="{{ asset('/asset/ecommerce/itp/itp_page.css') }}"></script>
<style>
  nav {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: #008080; /* Teal background for the navbar */
      color: white;
      padding: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Optional shadow for a slight 3D effect */
  }
  .content {
    padding: 0px;
    margin-bottom: 0px;
    margin-top: 20%;
  }
  nav a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
    padding: 5px;
    border-radius: 5px;
  }
  .sticky-div {
      position: sticky;
      top: 0;
      width: 100%;
      padding: 0px;
      background-color: #f4f4f4;
      border: 1px solid #ddd;
      padding-top: 0px;
  }
</style>

@endsection
