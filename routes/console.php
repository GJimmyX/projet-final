<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Routes pour la console
|--------------------------------------------------------------------------
|
| Ce fichier permet de définir toutes les fermetures de requêtes pour le terminal
| de commande. Chaque fermeture est instance de commande autorisant une approche
| simple d'interaction pour chaque methode d'entrée / sortie de commande.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
