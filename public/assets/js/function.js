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


$(document).ready(function(){
    // au clic sur un lien
    $('a[href^="#a"]').on('click', function(evt){
        evt.preventDefault();
        var target = $(this).attr('href');
        $('html, body')
            .stop()
            .animate({scrollTop: $(target).offset().top}, 1000 );
    });
});