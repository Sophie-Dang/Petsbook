var app = {
    init: function() {
      console.log('init');

    // fonction pour le bouton qui permettra d'aller en haut de la page à tout moment
    $('.arrow-top-edit-timeline').append('<div id="returnOnTop" title="Revenir en haut">&nbsp;</div>');
    
    // au click on revient en haut en mode 'slow'
    $('#returnOnTop').click( function() {
        $('html,body').animate({scrollTop: 0}, 'slow');
    });

    $(window).scroll(function() {
        // si on est en haut de la page le bouton disparait, sinon elle apparait
        if ( $(window).scrollTop() == 0 )
            $('#returnOnTop').fadeOut();
        else
            $('#returnOnTop').fadeIn();
    });
 
  }

};

$(app.init);