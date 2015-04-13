(function() {
  (function($) {
    $('.fa-shopping-cart').click(function(e) {
      e.preventDefault();
      return $('#page').addClass('open');
    });
    $('#overlay').click(function() {
      return $('#page').removeClass('open');
    });
    $('.menu-trigger').click(function(e) {
      e.preventDefault();
      return $('.menu-main-navigation-container').slideToggle();
    });
    return $(window).resize(function() {
      if ($(window).outerWidth() >= 1140) {
        return $('.menu-main-navigation-container').removeAttr('style');
      }
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=main.js.map
