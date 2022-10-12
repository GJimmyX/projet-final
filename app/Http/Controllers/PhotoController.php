<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
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
        /* Affichage des photos sur la page du gestionnaire */

        $photos = Photo::latest()->paginate(6);

        return view('photo.index', compact('photos'));
    }

    /**
     * Formulaire de création.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Lien vers la page de mise en ligne d'une photo */

        return view('photo.edit');
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
            'image_photo' => 'required|image|mimes:jpeg,jpg,png',
            'titre_photo' => 'required|string',
            'desc_photo' => 'required',
        ]);

        /* Récupération des données de la photo à importer */

        $imgName = $request->file('image_photo');

        $imgName->move(public_path('/storage/photo'), $imgName->getClientOriginalName());

        /* Création d'un élément photo en y intégrant les données de la photo à importer */

        $collection = collect($request);

        $mergeImg = $collection->merge(['image_photo' => $request->file('image_photo')->getClientOriginalName()]);

        Photo::create($mergeImg->all());

        return redirect()->route('photo.index')
                        ->with('success', 'Photo importée avec succès !');
    }

    /**
     * Affichage d'une ligne stockée dans la table.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Lien vers la page d'affichage d'une photo */

        return view('photo.show', ['photo' => Photo::findOrFail($id)]);
    }

    /**
     * Formulaire d'édition d'un ligne stockée dans la table.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Lien vers la page d'édition d'une photo */

        $photo = Photo::findOrFail($id);

        return view('photo.edit', compact('photo'));
    }

    /**
     * Mise à jour de la ligne de données éditée dans la table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* Validation des données */

        $validData = $request->validate([
            'image_photo' => 'image|mimes:jpeg,jpg,png',
            'titre_photo' => 'required|string',
            'desc_photo' => 'required',
        ]);

        /* Récupération des données de la photo à importer */

        $imgName = $request->file('image_photo');

        /* Importation si nécessaire des données de la photo */

        if ($imgName){
            $imgName->move(public_path('/storage/photo'), $imgName->getClientOriginalName());
        }

        /* Mise à jour d'un élément photo */

        $dataCollect = collect($validData);

        if ($imgName){
            $dataMerged = $dataCollect->merge(['image_photo' => $request->file('image_photo')->getClientOriginalName()]);
        }
        else{
            $dataMerged = $dataCollect;
        }

        Photo::whereId($id)->update($dataMerged->all());

        return redirect()->route('photo.index')
                        ->with('success', 'Photo éditée avec succès !');
    }

    /**
     * Suppression d'une ligne de données de la table.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Lien de suppression d'une photo */

        $photo = Photo::findOrFail($id);
        
        $photo->delete();

        return redirect()->route('photo.index')
                        ->with('success', 'Photo supprimée avec succès !');
    }
}
