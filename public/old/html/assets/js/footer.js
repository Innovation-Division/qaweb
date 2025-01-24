(function ($) {
  
  $(document).ready(function() {
    $('.link-list h5').click(function() {
      var element = $(this);
      var parentEl = element.closest('.link-list');
      $('.link-list').not(parentEl).removeClass('list-toggle');
      parentEl.toggleClass('list-toggle');
    });
  });

})(jQuery);