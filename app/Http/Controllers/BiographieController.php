<?php

namespace App\Http\Controllers;

use App\Models\Biographie;
use Illuminate\Http\Request;

class BiographieController extends Controller
{

    public function __construct()
    {
        /* Construction des routes Admin */

        $this->middleware('auth');
    }

    /**
     * Affichage des données sur l'index admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Affichage des biographies sur la page du gestionnaire */

        $biographies = Biographie::latest()->paginate(2);

        return view('biographie.index', compact('biographies'));
    }

    /**
     * Formulaire de création.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Lien vers la page de création d'une biographie */

        return view('biographie.edit');
    }

    /**
     * Stockage des données dans la table associée au controller.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validation des données */

        $request->validate([
            'nom_prenom_pilote' => 'required|string',
            'background_image' => 'required|image|mimes:jpeg,jpg,png',
            'image_biographie' => 'required|image|mimes:jpeg,jpg,png',
            'texte_biographie' => 'required',
            'date_naissance' => 'required|string',
            'date_deces',
            'carriere' => 'required|string',
            'reseaux' => 'required|string',
        ]);

        /* Récupération des données de l'image en arrière-plan et de l'image de la biographie à importer */

        $backImg = $request->file('background_image');
        $biographieImg = $request->file('image_biographie');

        $backImg->move(public_path('/storage/biographie'), $backImg->getClientOriginalName());
        $biographieImg->move(public_path('/storage/biographie'), $biographieImg->getClientOriginalName());

        /* Création d'une nouvelle biographie en y intégrant les données de l'image en arrière-plan et de l'image de la biographie à importer */
        
        $collection = collect($request);

        $mergeImg = $collection->merge(['background_image' => $request->file('background_image')->getClientOriginalName(), 'image_biographie' => $request->file('image_biographie')->getClientOriginalName()]);

        Biographie::create($mergeImg->all());

        return redirect()->route('biographie.index')
                        ->with('success', 'Biographie créee avec succès !');
    }

    /**
     * Affichage d'une ligne stockée dans la table.
     *
     * @param  \App\Models\Biographie  $biographie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Lien vers la page d'affichage d'une biographie */

        return view('biographie.show', ['biographie' => Biographie::findOrFail($id)]);
    }

    /**
     * Formulaire d'édition d'un ligne stockée dans la table.
     *
     * @param  \App\Models\Biographie  $biographie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Lien vers la page d'édition d'une biographie */

        $biographie = Biographie::findOrFail($id);

        return view('biographie.edit', compact('biographie'));
    }

    /**
     * Mise à jour de la ligne de données éditée dans la table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biographie  $biographie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* Validation des données */
        
        $validData = $request->validate([
            'nom_prenom_pilote' => 'required|string',
            'background_image' => 'image|mimes:jpeg,jpg,png',
            'image_biographie' => 'image|mimes:jpeg,jpg,png',
            'texte_biographie' => 'required',
            'date_naissance' => 'required|string',
            'date_deces',
            'carriere' => 'required|string',
            'reseaux' => 'required|string',            
        ]);

        /* Récupération des données de l'image du background_image et de l'écusson de l'écurie à importer */

        $backImg = $request->file('background_image');
        $biographieImg = $request->file('image_biographie');

        /* Importation si nécessaire des données des images */

        if ($backImg){
            $backImg->move(public_path('/storage/biographie'), $backImg->getClientOriginalName());            
        }
        if ($biographieImg){
            $biographieImg->move(public_path('/storage/biographie'), $biographieImg->getClientOriginalName());
        }

        /* Mise à jour d'un article */
        
        $dataCollect = collect($validData);

        if ($backImg){
            $dataMerged = $dataCollect->merge(['background_image' => $request->file('background_image')->getClientOriginalName(), 'date_deces' => $request->date('date_deces')]);
        }
        else if ($biographieImg){
            $dataMerged = $dataCollect->merge(['image_biographie' => $request->file('image_biographie')->getClientOriginalName(), 'date_deces' => $request->date('date_deces')]);
        }
        else if ($backImg && $biographieImg){
            $dataMerged = $dataCollect->merge(['background_image' => $request->file('background_image')->getClientOriginalName(), 'image_biographie' => $request->file('image_biographie')->getClientOriginalName(), 'date_deces' => $request->date('date_deces')]);
        }
        else{
            $dataMerged = $dataCollect->merge(['date_deces' => $request->date('date_deces')]);
        }

        Biographie::whereId($id)->update($dataMerged->all());

        return redirect()->route('biographie.index')
                        ->with('success', 'Biographie éditée avec succès !');
    }

    /**
     * Suppression d'une ligne de données de la table.
     *
     * @param  \App\Models\Biographie  $biographie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Lien de suppression d'une biographie */

        $biographie = Biographie::findOrFail($id);
        
        $biographie->delete();

        return redirect()->route('biographie.index')
                        ->with('success', 'Biographie supprimée avec succès !');
    }
}
