(function ($) {
  
  $(document).ready(function() {
    $('.selectpickerb5').each(function() {
      $(this).selectpicker();
    });

    $('.togglearrow').click(function(e) {
      e.preventDefault();
      $('body').toggleClass('toggleepolicynav');
    });
  });

})(jQuery);