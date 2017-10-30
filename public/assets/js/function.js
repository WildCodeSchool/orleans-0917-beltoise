$(document).ready(function () {

// début partie navbar

// début partie menu burger
    //navbar closes when clicking outside
    $(document).click(function (e) {
        if (!$(e.target).is('a')) {
            $('.navbar-collapse').collapse('hide');
        }
    });
// fin partie menu burger

// fin partie navbar
});