<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PiloteController;
use App\Http\Controllers\BiographieController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Routes du site
|--------------------------------------------------------------------------
|
| Ici, vous pouvez définir les routes pour votre site. Ces routes
| sont chargées à partir du RouteServiceProvider via un groupe qui
| contient le groupe middleware 'web'. Créer quelque chose de beau !
|
*/

/* Route pour la page 'Index' Visiteur */

Route::get('/', [App\Http\Controllers\ViewController::class, 'index'])->name('index');

/* Route pour la page 'Classements' Visiteur */

Route::get('/classements', [App\Http\Controllers\ViewController::class, 'classements'])->name('classements');

/* Routes pour la page 'Biographie de Pilotes' Visiteur */

Route::get('/biographies', [App\Http\Controllers\ViewController::class, 'biographies'])->name('biographies');

Route::get('/biographies/{id}', [App\Http\Controllers\ViewController::class, 'single_biographie'])->name('single-post.single-biographie');

/* Routes pour la page 'Photos' Visiteur */

Route::get('/photos', [App\Http\Controllers\ViewController::class, 'photos'])->name('photos');

Route::get('/photos/{id}', [App\Http\Controllers\ViewController::class, 'single_photo'])->name('single-post.single-photo');

/* Routes pour la page 'Contact' Visiteur */

Route::get('/contact', [App\Http\Controllers\ContactFormController::class, 'createForm'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactFormController::class, 'storeForm'])->name('contact.store');

/* Route pour la page 'Recherche' Visiteur */

Route::get('recherche', [App\Http\Controllers\SearchController::class, 'index'])->name('recherche');

/* Recherche de type Complétion automatique Visiteur */

Route::get('autorecherche', [App\Http\Controllers\SearchController::class, 'autorecherche'])->name('autorecherche');

/* Route pour la page 'Mentions légales' Visiteur */

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
Liste des routes pour un admin
--------------------------------------------
--------------------------------------------*/

/* Routes pour le contrôleur d'articles */

Route::resource('admin/articles', ArticleController::class)->names('article');

/* Routes pour le contrôleur de pilotes */

Route::resource('admin/pilotes', PiloteController::class)->names('classement.pilotes');

/* Routes pour le contrôleur de biographies */

Route::resource('admin/biographies', BiographieController::class)->names('biographie');

/* Routes pour le contrôleur de photos */

Route::resource('admin/photos', PhotoController::class)->names('photo');