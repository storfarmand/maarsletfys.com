(function($) {
  $(function() {

    var navActiveClass = 'nav-active';
    var navWrapper = $('.nav-wrapper');
    var ham = navWrapper. find('.hamburger');
    ham.bind('click', function () {
      navWrapper.toggleClass(navActiveClass);
    });

    var fixedNavHeight = 92;
    var navItems = navWrapper.find('.nav a');
    navItems.bind('click', function(e) {
        e.preventDefault();
        navItems.removeClass('active');
        $(this).addClass('active');
        var pageLocation = '.' + e.target.href.split('#')[1];
        $('html').animate({scrollTop: $(pageLocation).offset().top - fixedNavHeight});
      });
    });
})(jQuery);
