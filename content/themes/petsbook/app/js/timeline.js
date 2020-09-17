

var app = {
    init: function() {
      console.log('init');

    // fonction pour les illustrations qui tombent du ciel
    $('.scroll_fallen_objects').scrollex({
        mode: "top",//on dit à scrollex de prendre comme base le top de l'écran
        top: "-70vh", //la détection du enter de scrollex se fait à 70vh 
        enter: function() {
            // quand la div est à 70vh du top, on lui ajoute la classe pour animer son apparition (voir l'animation dans le css)
            $(this).addClass('scroll_fallen_objects_animate');     
        },
        leave: function() {
            //quand la div quitte l'écran on lui enlève la classe qui anime son apparition
            $(this).removeClass('scroll_fallen_objects_animate');  
        }
    }); 

    // fonction pour les illustrations qui arrivent de la droite
    $('.scroll_right_side_objects').scrollex({
        scroll: function(progress) {
        //console.log(progress);
        //DOC SCROLLEX: Triggered as the viewport scrolls through an element. The handler associated with this event is called with a normalized value representing how far the viewport has scrolled through the element.
        //on applique un transform et translate3d à l'élément ciblé $(this) : on modifie la première valeur (donc horizontalement puisque le premier param de translate3d c'est l'horizontal), proportionnellement à la valeur progress (qui représente où en est l'élement dans le viewport). Donc quand on scroll ça déplace l'élément, et ensuite on applique un coefficient data-speed (qui est précisé dans le html) pour définir son déplacement + ou - vite, on concatène avec px, et on laisse 0,0 sur les deux derniers params de translated3d car on ne les modifie pas.
        //Le "-"  dans progress*-$(this) sert à ce que les éléments arrivent de la droite et se déplacent vers la gauche.  
        $(this).css('transform', 'translate3d('+progress*-$(this).data('speed')+'px,0,0)');
        }
    });

    // fonction pour les illustrations qui arrivent de la gauche
    $('.scroll_link_side_objects').scrollex({
        scroll: function(progress) {
        // c'est exactement pareil qu'au dessus, sauf qu'ici je n'ai pas mis le "-" dans progress*$(this), car les éléments doivent venir de la gauche et se déplacer vers la droite. 
        $(this).css('transform', 'translate3d('+progress*$(this).data('speed')+'px,0,0)');
        }
    });

    // fonction pour les illustrations de type "mare" uniquement
    $('.scroll_expand_objects').scrollex({
        mode: "top",
        top: "-70vh",
        enter: function() {
            $(this).addClass('scroll_expand_objects_animate');     
        },
        leave: function() {
            $(this).removeClass('scroll_expand_objects_animate');  
        }
    }); 

    // fonction pour la fermeture du portail après le passage du raccoon
    $('.scroll_door_open').scrollex({
        mode: "top",
        top: "-40vh",
        enter: function() {
            $(this).addClass('scroll_door_open_animate');     
        },
        leave: function() {
            $(this).removeClass('scroll_door_open_animate');  
        }
    }); 
    
    // fonction pour l'apparition des photos 
    $('.timeline-glimpse__section__pic').scrollex({
        mode: "top",
        top: "-60vh",
        enter: function() {
            $(this).addClass('timeline-glimpse__section__pic_animate');     
        },
        leave: function() {
            $(this).removeClass('timeline-glimpse__section__pic_animate');  
        }
    }); 

    //marche du raccoon
    $(window).on('scroll', onScroll);
    
    function onScroll() {
        //Ici ce qu'on veut c'est que le bgPositionY du raccoon se place une fois en 0 (première étape) et une fois moins la hauteur du raccoon en fonction du scroll. 
        //on veut que le raccoon fasse un pas tous les 100px de scroll, donc vu qu'il a deux étapes, une boucle de marche fait 200px de scroll. Il faut qu'on récupère tous les 200px 0 ou 1 (0 pendant 100px, 1 pendant 100px ,ainsi de suite..)
        //scrollTop()%200 retourne des valeurs entre 0 et 199 en fonction du scroll et en boucle. Vu qu'on veut une valeur entre 0 et 1, on divise ce résultat par 100 ce qui donne des valeurs entre 0 et 1,99 en boucle. Math.floor permet d'arrondir à l'entier inférieur. On a donc une valeur entre 0 et 1. On multiplie cette valeur par " - la hauteur du raccon" . On a donc en boucle un bgPositionY qui vaut soit 0 soit "- la hauteur du raccoon".
        bgPositionY = Math.floor(($(window).scrollTop()%(200))/100)*-$('#timeline__raccoon').height();
        //on applique ensuite cette variable bgPositionY en css au raccoon à chaque scroll.
        $("#timeline__raccoon").css('background-position-y',bgPositionY+'px');
    }

    // animation des séquences en boucles(abeilles, cerf, renard)
    // pour chaque animation on récupère les valeurs propres à chacune (height = hauteur d'une étape, step= nombre d'étapes, animation_speed=vitesse à laquelle on veut que ça s'anime).
    $('.sequence_png').each(function( index ) {
        height = parseInt($(this).data('height'));
        step = parseInt($(this).data('step'));
        animation_speed = parseInt($(this).data('animation_speed'));
        backgroundPositionY = 0;
        animateSequencePNG($(this), height, step, animation_speed, backgroundPositionY);
    });
    // ensuite on ajoute à backgroundPosition, la hauteur de l'élément, et on fait une condition : SI  backgroundPosition est > à step-1 x height c'est qu'on a passé la dernière étape. ça boucle. 
    function animateSequencePNG(sequence, height, step, animation_speed, backgroundPositionY){
        //setInterval est une fonction javascript qui exécute tout ce qui est premier paramètre à chaque interval précisé en second paramètre
        setInterval(function() {
            backgroundPositionY += height;
            if(backgroundPositionY > (step-1)*height){
                backgroundPositionY = 0;
            }
            // on soustrait la hauteur de l'élément à background-position-y pour que notre élément se place au bon endroit
            sequence.css('background-position-y','-'+backgroundPositionY+'px');
        }, animation_speed);
    }
         
    
    // fonction pour le bouton qui permettra d'aller en haut de la page à tout moment
    $('#timeline-glimpse__container').append('<div id="returnOnTop" title="Revenir en haut">&nbsp;</div>');
    
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