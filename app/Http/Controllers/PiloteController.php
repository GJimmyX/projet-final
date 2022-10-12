<?php

namespace App\Http\Controllers;

use App\Models\Pilote;
use App\Models\Ecurie;
use Illuminate\Http\Request;

class PiloteController extends Controller
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
        /* Affichage des pilotes sur la page du gestionnaire */

        $pilotes = Pilote::orderBy('role_pilote')->paginate(10);

        return view('classement.pilotes.index', compact('pilotes'));
    }

    /**
     * Formulaire de création.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Lien vers la page de création d'un pilote */

        $ecuries = Ecurie::get(['id', 'nom_ecurie']);

        return view('classement.pilotes.edit', compact('ecuries'));
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
            'role_pilote' => 'required|string',
            'nom_pilote' => 'required|string',
            'nationalite' => 'required',
            'num_points' => 'required',
            'drapeau' => 'required|image|mimes:jpeg,jpg,png',
            'img_ecurie' => 'required|image|mimes:jpeg,jpg,png',
            'ecurie_id' => 'required',
        ]);

        /* Récupération des données de l'image du drapeau et de l'écusson de l'écurie à importer */

        $flagImg = $request->file('drapeau');
        $teamImg = $request->file('img_ecurie');

        $flagImg->move(public_path('/storage/pilote'), $flagImg->getClientOriginalName());
        $teamImg->move(public_path('/storage/pilote'), $teamImg->getClientOriginalName());

        /* Création d'un nouveau pilote en y intégrant les données de l'image du drapeau et de l'écusson à importer */
        
        $collection = collect($request);

        $mergeImg = $collection->merge(['drapeau' => $request->file('drapeau')->getClientOriginalName(), 'img_ecurie' => $request->file('img_ecurie')->getClientOriginalName()]);

        Pilote::create($mergeImg->all());

        return redirect()->route('classement.pilotes.index')
                        ->with('success', 'Pilote crée avec succès !');
    }

    /**
     * Affichage d'une ligne stockée dans la table.
     *
     * @param  \App\Models\Pilote  $pilote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Lien vers la page d'affichage d'un pilote */

        return view('classement.pilotes.show', ['pilote' => Pilote::findOrFail($id)]);
    }

    /**
     * Formulaire d'édition d'un ligne stockée dans la table.
     *
     * @param  \App\Models\Pilote  $pilote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Lien vers la page d'édition d'un pilote */

        $pilote = Pilote::findOrFail($id);

        $ecuries = Ecurie::get(['id', 'nom_ecurie']);

        return view('classement.pilotes.edit', compact('pilote', 'ecuries'));
    }

    /**
     * Mise à jour de la ligne de données éditée dans la table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pilote  $pilote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* Validation des données */
        
        $validData = $request->validate([
            'role_pilote' => 'required|string',
            'nom_pilote' => 'required|string',
            'nationalite' => 'required',
            'num_points' => 'required',
            'drapeau' => 'image|mimes:jpeg,jpg,png',
            'img_ecurie' => 'image|mimes:jpeg,jpg,png',
            'ecurie_id' => 'required',
        ]);

        /* Récupération des données de l'image du drapeau et de l'écusson de l'écurie à importer */

        $flagImg = $request->file('drapeau');
        $teamImg = $request->file('img_ecurie');

        /* Importation si nécessaire des données des images */

        if ($flagImg){
            $flagImg->move(public_path('/storage/pilote'), $flagImg->getClientOriginalName());            
        }
        if ($teamImg){
            $teamImg->move(public_path('/storage/pilote'), $teamImg->getClientOriginalName());
        }

        /* Mise à jour d'un article */
        
        $dataCollect = collect($validData);

        if ($flagImg){
            $dataMerged = $dataCollect->merge(['drapeau' => $request->file('drapeau')->getClientOriginalName()]);
        }
        else if ($teamImg){
            $dataMerged = $dataCollect->merge(['img_ecurie' => $request->file('img_ecurie')->getClientOriginalName()]);
        }
        else if ($flagImg && $teamImg){
            $dataMerged = $dataCollect->merge(['drapeau' => $request->file('drapeau')->getClientOriginalName(), 'img_ecurie' => $request->file('img_ecurie')->getClientOriginalName()]);
        }
        else{
            $dataMerged = $dataCollect;
        }

        Pilote::whereId($id)->update($dataMerged->all());

        return redirect()->route('classement.pilotes.index')
                        ->with('success', 'Pilote édité avec succès !');
    }

    /**
     * Suppression d'une ligne de données de la table.
     *
     * @param  \App\Models\Pilote  $pilote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Lien de suppression d'un pilote */

        $pilote = Pilote::findOrFail($id);
        
        $pilote->delete();

        return redirect()->route('classement.pilotes.index')
                        ->with('success', 'Pilote supprimé avec succès !');
    }
}
