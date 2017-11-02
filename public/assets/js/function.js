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
// deactivate Modal in XS
    $('modal').find('a').removeAttr('data-toggle');

// fin partie navbar
});