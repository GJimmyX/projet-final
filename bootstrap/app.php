<?php

/*
|--------------------------------------------------------------------------
| Création de l'application
|--------------------------------------------------------------------------
|
| La première chose à faire et de créer une nouvelle instance d'application Laravel
| qui va servir de base à tout les composants laravel, et c'est
| le container IoC qui va s'occuper de retouver les différents composants.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Retouver les interfaces les plus importantes
|--------------------------------------------------------------------------
|
| Ensuite, nous devons retrouver les interfaces importantes et les importer dans le container IoC
| qui sera capable des les appeler lorsque l'on en a besoin. Les kernels servent au traitement des
| requêtes entrantes dans l'application, que ce soit du web ou du serveur local.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Afficher l'application
|--------------------------------------------------------------------------
|
| Le script retourne l'instance d'application. L'instance est donnée au script
| qui est appelé, ce qui nous permet de dissocier l'instance d'application
| de celle qui est en fonctionnement et cela nous permet de renvoyer une réponse.
|
*/

return $app;
