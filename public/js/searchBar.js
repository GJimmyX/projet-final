/* JS pour la barre de recherche */

( function() {

    /* Récupération des éléments cibles */

    var button = document.getElementById( 'searchBtn' );
    var search = document.getElementById( 'searchBar-input' );

    /* Fonction effectuée sur le click de l'élément button, en l'occurence: Affichage de la barre de recherche */

    button.onclick = function()
    {
        button.toggleAttribute( 'toggle-search' );
        search.classList.toggle( 'toggle-search' );
    }

} )(jQuery);