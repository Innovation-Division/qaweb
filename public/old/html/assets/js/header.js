(function ($) {
  
  $(document).ready(function() {
    $('header').adjustElementByScrollTop('header-dense');

    $(window).on('scroll resize', function() {
      $('header').adjustElementByScrollTop('header-dense');
    });

    $('.menu-burger').click(function(e) {
      e.preventDefault();
      var element = $(this);
      var parentEl = element.closest('.navrow');
      if (parentEl.length) {
        parentEl.toggleClass('nav-toggle');
      }
    });
    
    $('.navrow .nav-items-dropdown > li > .dropdown > a, .navrow .nav-items-dropdown > li > .dropdown > span').click(function() {
      var element = $(this);
      var parentEl = element.closest('.navrow');
      var parentLiEl = element.closest('li');
      if (parentEl.hasClass('nav-toggle')) {
        parentEl.toggleClass('subnav-toggle');
        parentLiEl.toggleClass('subnav-toggle');
      }
    });

    $('.nav-item-back a').click(function() {
      var element = $(this);
      var parentEl = element.closest('.navrow');
      parentEl.removeClass('subnav-toggle');
      parentEl.find('li').removeClass('subnav-toggle');
    });

    $('.nav-item.search').click(function() {
      var element = $(this);
      element.toggleClass('search-toggle');
    });

    $('.search-dropdown').click(function(e) {
      e.stopPropagation();
    });
  });

  $.fn.adjustElementByScrollTop = function(className) {
    var targetEl = $(this);
    if ($(window).scrollTop() > targetEl.outerHeight()) {
      $('body').addClass(className);
    } else {
      $('body').removeClass(className);
    }
  }

})(jQuery);