<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Canaux de diffusion
|--------------------------------------------------------------------------
|
| Ici peut être enregistrer tout canaux de diffusion que votre
| application supporte. L'autorisation donnée aux rappels de canaux de diffusion sont
| utilisés pour vérifier si un utilisateur authentifié peut avoir accès à un URL.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
