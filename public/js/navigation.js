/* JS pour la barre de navigation */

( function() {

    /* Récupération de la nav avec son ID */

    var nav = document.getElementById('navbarToggler'), button, menu;

    if ( ! nav ){
        return;
    }

    /* Récupération du bouton et du menu */

    button = nav.getElementsByTagName( 'button' )[0];
    menu = nav.getElementsByTagName( 'ul' )[0];

    if ( ! button ){
        return;
    }

    if ( ! menu || ! menu.childNodes.length ){
        button.style.display = 'none';
        return;
    }

    /* Fonction effectuée sur le click de l'élément button, en l'occurence: Affichage du menu de navigation responsive */

    button.onclick = function() {

        /* On cible les éléments */

        if ( -1 === menu.className.indexOf( 'navbar-nav' ) ) {
            menu.className = 'navbar-nav';
            nav.className = 'navbar';
        }

        /* En fonction de l'état d'affichage, ajout ou suppresion de la classe 'toggled-on' */

        if ( -1 !== button.className.indexOf( 'toggled-on' ) ) {
            button.className = button.className.replace(' toggled-on', '' );
            menu.className = menu.className.replace(' toggled-on', '' );
            nav.className = nav.className.replace(' toggled-on', '' );
        } else {
            button.className += ' toggled-on';
            menu.className += ' toggled-on';
            nav.className += ' toggled-on';
        }
    };

} )(jQuery);