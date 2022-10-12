<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes de l'API
|--------------------------------------------------------------------------
|
| Ici vous pouvez enregistrer les routes API pour votre application.
| Ces routes sont chargées via le 'RouteServiceProvider' avec un groupe où
| le groupe middleware 'api' est défini. Amusez vous à construire votre API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Middleware pour la recherhce dynamique */

Route::middleware('api')->get('/recherche/{query?}', [App\Http\Controllers\SearchController::class, 'index']);
