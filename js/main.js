(function() {
  (function($) {
    $('.fa-shopping-cart, .wc-forward:not(.checkout)').click(function(e) {
      e.preventDefault();
      return $('#page').addClass('open');
    });
    return $('#overlay').click(function() {
      return $('#page').removeClass('open');
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=main.js.map
