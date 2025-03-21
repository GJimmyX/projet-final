<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Pilote;
use App\Models\Ecurie;
use App\Models\Biographie;
use App\Models\Photo;

class ViewController extends Controller
{

    /* Route pour la page d'accueil du site 'Passionné de Formule 1' */

    public function index()
    {
        $collection = Article::all();
        
        if (count($collection) >= 4){
            $articles = collect($collection)->random(4);
        }
        else{
            $articles = collect($collection);
        } 

        return view('index', compact('articles'));
    }

    /* Route pour la page classements du site 'Passionné de Formule 1' */

    public function classements()
    {

        /* Récupération des 10 premiers pilotes ayant le plus de points de la table 'Pilotes' */

        $pilotes = Pilote::all()->sortBy('maj')->sortByDesc('num_points')->take(10);

        /* Récupération de la table 'Ecuries' */

        $data_ecuries = Ecurie::all();

        /* Récupération de l'ID de chaque écurie */

        foreach ($data_ecuries as $cle_ecurie) {
            $cle_etrangere[] = $cle_ecurie->id;
        }

        /* Récupération des pilotes affilé à l'ID de l'écurie via une clé étrangère présente dans la table 'Pilotes' (ecurie_id) */

        foreach ($cle_etrangere as $cle) {
            $pilotes_ecurie[] = Ecurie::find($cle)->pilotes()->get();
        }

        /* Calcul du nombre de points pour chaque écurie */

        foreach ($pilotes_ecurie as $pilotes_ecurie) {

            // Si 3ème pilote

            if (count($pilotes_ecurie) > 2) {
                $points_ecurie[] = [
                    'points' => $pilotes_ecurie[0]->num_points + $pilotes_ecurie[1]->num_points + $pilotes_ecurie[2]->num_points,
                    'ecurie_id' => $pilotes_ecurie[0]->ecurie_id,
                ];
            }

            // Si que 2 pilotes

            else {
                $points_ecurie[] = [
                    'points' => $pilotes_ecurie[0]->num_points + $pilotes_ecurie[1]->num_points,
                    'ecurie_id' => $pilotes_ecurie[0]->ecurie_id,
                ];
            }

            // Tri par ordre décroissant

            rsort($points_ecurie);
        }

        /* Regroupement des données pour les écuries dans une seule variable */

        foreach ($points_ecurie as $points) {
            $tri_ecurie = $points['ecurie_id'];
            $collection = collect($data_ecuries[$tri_ecurie-1]);
            $ecuries[] = $collection->merge(['points_ecurie' => $points['points']]);
        }

        /* Envoi des variables pour les classements 'Pilotes' et 'Ecuries */

        return view('classements')->with(compact('pilotes', 'ecuries'));
    }

    /* Route pour la page de biographies du site 'Passionné de Formule 1' */

    public function biographies()
    {

        /* Récupération des données pour afficher 2 biographies par page */

        $biographies = Biographie::latest()->paginate(2);
        return view('biographies', compact('biographies'));
    }

    /* Route pour la page de posts biographies du site 'Passionné de Formule 1' */

    public function single_biographie(Biographie $biographie, $id)
    {
        /* Affichage de la vue 'Single d'une biographie' lorsque l'on clique sur 1 biographie */
        
        $biographie = Biographie::findOrFail($id);

        return view('single-post.single-biographie', compact('biographie'));
    }

    /* Route pour la page de photos du site 'Passionné de Formule 1' */

    public function photos()
    {

        /* Récupération des données pour afficher 6 photos par page */

        $photos = Photo::latest()->paginate(6);
        return view('photos', compact('photos'));
    }

    /* Route pour la page de posts photos du site 'Passionné de Formule 1' */

    public function single_photo(Photo $photo, $id)
    {
        /* Affichage de la vue 'Single d'une photo' lorsque l'on clique sur 1 photo */

        $photo = Photo::findOrFail($id);

        return view('single-post.single-photo', compact('photo'));
    }
}
