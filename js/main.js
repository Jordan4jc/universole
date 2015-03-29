(function() {
  (function($) {
    $('.fa-shopping-cart').click(function(e) {
      e.preventDefault();
      return $('#page').addClass('open');
    });
    $('#overlay').click(function() {
      return $('#page').removeClass('open');
    });
    return $('.menu-trigger').click(function(e) {
      e.preventDefault();
      return $('.menu-main-navigation-container').slideToggle();
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=main.js.map
