<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Biographie;
use App\Models\Pilote;
use App\Models\Ecurie;
use App\Models\Photo;

class SearchController extends Controller
{

    /* Route pour la page de recherche du site 'Passionné de Fomrule 1' */

    public function index(Request $request)
    {

        /* Récupération des données de recherche */

        $query = trim($request->get('searchBar-input'));

        // Récupération des résultats de chaque model de controller ( 5 models en tout donc 5 variables )

        /* Variable pour les Articles */

        $articles = Article::query()
            ->where('titre', 'like', "%{$query}%")
            ->orWhere('date', 'like', "%{$query}%")
            ->orWhere('contenu', 'like', "%{$query}%")
        ->get();

        /* Variable pour les Biographies */

        $biographies = Biographie::query()
            ->where('nom_prenom_pilote', 'like', "%{$query}%")
            ->orWhere('texte_biographie', 'like', "%{$query}%")
            ->orWhere('date_naissance', 'like', "%{$query}%")
            ->orWhere('date_deces', 'like', "%{$query}%")
            ->orWhere('carriere', 'like', "%{$query}%")
            ->orWhere('reseaux', 'like', "%{$query}%")
        ->get();

        /* Variable pour les pilotes */

        $pilotes = Pilote::query()
            ->where('nom_pilote', 'like', "%{$query}%")
            ->orWhere('nationalite', 'like', "%{$query}%")
        ->get();

        /* Variable pour les écuries */

        $ecuries = Ecurie::query()
            ->where('nom_ecurie', 'like', "%{$query}%")
        ->get();

        /* Variable pour les photos */

        $photos = Photo::query()
            ->where('titre_photo', 'like', "%{$query}%")
            ->orWhere('desc_photo', 'like', "%{$query}%")
        ->get();

        /* Affichage de la vue 'Recherche' */

        return view('recherche', compact('query', 'articles', 'biographies', 'pilotes', 'ecuries', 'photos'));

    }

    /* Route pour la recherche dynamique */

    public function autorecherche(Request $request)
    {

        /* Récupération des données de recherche */

        $query = trim($request->get('searchBar-input'));

        // Récupération des résultats de chaque model de controller ( 5 models en tout donc 5 variables )

        /* Variable pour les Articles */

        $articles = Article::query()
            ->where('titre', 'like', "%{$request->term}%")
            ->orWhere('date', 'like', "%{$request->term}%")
            ->orWhere('contenu', 'like', "%{$request->term}%")
        ->get();

        /* Variable pour les Biographies */

        $biographies = Biographie::query()
            ->where('nom_prenom_pilote', 'like', "%{$request->term}%")
            ->orWhere('texte_biographie', 'like', "%{$request->term}%")
            ->orWhere('date_naissance', 'like', "%{$request->term}%")
            ->orWhere('date_deces', 'like', "%{$request->term}%")
            ->orWhere('carriere', 'like', "%{$request->term}%")
            ->orWhere('reseaux', 'like', "%{$request->term}%")
        ->get();

        /* Variable pour les pilotes */

        $pilotes = Pilote::query()
            ->where('nom_pilote', 'like', "%{$request->term}%")
            ->orWhere('nationalite', 'like', "%{$request->term}%")
        ->get();

        /* Variable pour les écuries */

        $ecuries = Ecurie::query()
            ->where('nom_ecurie', 'like', "%{$request->term}%")
        ->get();

        /* Variable pour les photos */

        $photos = Photo::query()
            ->where('titre_photo', 'like', "%{$request->term}%")
            ->orWhere('desc_photo', 'like', "%{$request->term}%")
        ->get();

        /* Regroupement des résultats dans une variable tableau $data */

        $data = [
            $articles, // Variable Articles
            $biographies,  // Variable Biographies
            $pilotes,  // Variable Pilotes
            $ecuries, // Variable Ecuries
            $photos, // Variable Photos
        ];

        /* Affichage de la vue 'Recherche' */

        return response()->json($pilotes);

    }
}
