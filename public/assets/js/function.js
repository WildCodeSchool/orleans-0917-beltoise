$(document).ready(function () {

// début partie navbar
    // Rend la navbar sticky top
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        var navbar = $('#navbar');

        // if win >= navbar and not already a sticky
        if (windowpos >= navbar.position().top && !navbar.hasClass("navbar-fixed-top") ) {
            navbar.addClass("navbar-fixed-top");

            // if win <= navbar and is a sticky
        } else if( windowpos <= navbar.position().top && navbar.hasClass("navbar-fixed-top")  ) {
            navbar.removeClass("navbar-fixed-top");
        }
    });
// fin partie navbar

// début partie menu burger
    //navbar closes when clicking outside
    $(document).click(function (e) {
        if (!$(e.target).is('a')) {
            $('.navbar-collapse').collapse('hide');
        }
    });
// fin partie menu burger
});