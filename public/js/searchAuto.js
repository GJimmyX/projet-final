/* JS pour l'autocompletion de la barre de recherche */

$(document).ready(function() {
    
    // Récupération de l'input de recherche

    $( "#searchBar-input" ).autocomplete({

        // Définition de la fonction pour l'autocompletion

        source: function(request, response) {
            $.ajax({
                url: siteUrl + '/' +"autorecherche",
                data: {
                    term : request.term
                },
                dataType: "json",
                success: function(data){
                    /* var resp = $.map(data,function(obj){
                        return obj.nom_pilote;
                    }); */

                    let resp = Object.values(data).flatMap(function(entry) {
                        return entry.map(x => {
                            return Object.values(x)[0];
                        });
                    });
                    
                    response(resp);
                }
            });
        },
        minLength: 2
    });
});