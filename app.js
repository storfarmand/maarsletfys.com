(function($) {
  $(function() {

    var openingHours = [
      {
        day: "mandag",
        hours: "8:00 - 17:30"
      },
      {
        day: "mandag",
        hours: "8:00 - 17:30"
      },
      {
        day: "tirsdag",
        hours: "8:00 - 18:00"
      },
      {
        day: "onsdag",
        hours: "8:00 - 17:00"
      },
      {
        day: "torsdag",
        hours: "8:00 - 17:30"
      },
      {
        day: "fredag",
        hours: "8:00 - 15:00"
      },
      {
        day: "mandag",
        hours: "8:00 - 17:30"
      },
    ];

    var today = new Date();
    var d = today.getDay();
    $('.quick-info .today').html('Åbningstid ' + openingHours[d].day + ': ' + openingHours[d].hours);

    var navActiveClass = 'nav-active';
    var navWrapper = $('.nav-wrapper');
    var ham = navWrapper. find('.hamburger');
    ham.bind('click', function () {
      navWrapper.toggleClass(navActiveClass);
    });

    var navItems = navWrapper.find('.nav a');
    navItems.bind('click', function(e) {
        e.preventDefault();
        navItems.removeClass('active');
        $(this).addClass('active');
        var pageLocation = '.' + e.target.href.split('#')[1];
        var fixedNavHeight = $('.header').height();
        $('html, body').animate({scrollTop: $(pageLocation).offset().top - fixedNavHeight});
        navWrapper.removeClass(navActiveClass);
      });
    });
})(jQuery);
