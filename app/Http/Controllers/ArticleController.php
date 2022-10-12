<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        /* Affichage des articles sur la page du gestionnaire */

        $articles = Article::latest()->paginate(4);

        return view('article.index', compact('articles'));
    }

    /**
     * Formulaire de création.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Lien vers la page de création d'un article */

        return view('article.edit');
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
            'titre' => 'required|string',
            'date' => 'required|string',
            'contenu' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        /* Récupération des données de l'image de publication à importer */

        $imgName = $request->file('image');

        $imgName->move(public_path('/storage/article'), $imgName->getClientOriginalName());

        /* Création d'un article en y intégrant les données de l'image de publication à importer */

        $collection = collect($request);

        $mergeImg = $collection->merge(['image' => $request->file('image')->getClientOriginalName()]);

        Article::create($mergeImg->all());

        return redirect()->route('article.index')
                        ->with('success', 'Article crée avec succès !');
    }

    /**
     * Affichage d'une ligne stockée dans la table.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Lien vers la page d'affichage d'un article */

        return view('article.show', ['article' => Article::findOrFail($id)]);
    }

    /**
     * Formulaire d'édition d'un ligne stockée dans la table.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Lien vers la page d'édition d'un article */

        $article = Article::findOrFail($id);

        return view('article.edit', compact('article'));
    }

    /**
     * Mise à jour de la ligne de données éditée dans la table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* Validation des données */

        $validData = $request->validate([
            'titre' => 'required|string',
            'date' => 'required|string',
            'contenu' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
        ]);

        /* Récupération des données de l'image de publication à importer */

        $imgName = $request->file('image');

        /* Importation si nécessaire des données de l'image */

        if ($imgName){
            $imgName->move(public_path('/storage/article'), $imgName->getClientOriginalName());
        }

        /* Mise à jour d'un article */

        $dataCollect = collect($validData);

        if ($imgName){
            $dataMerged = $dataCollect->merge(['image' => $request->file('image')->getClientOriginalName()]);
        }
        else{
            $dataMerged = $dataCollect;
        }

        Article::whereId($id)->update($dataMerged->all());

        return redirect()->route('article.index')
                        ->with('success', 'Article édité avec succès !');
    }

    /**
     * Suppression d'une ligne de données de la table.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Lien de suppression d'un article */

        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route('article.index')
                        ->with('success', 'Article supprimé avec succès !');
    }
}
