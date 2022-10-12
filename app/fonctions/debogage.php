<?php

/**
 * Fait un dump and die seulement si en mode débogage.
 * 
 * @param mixed
 * @return void
 */
function ddsafe($donnees) : void
{
    if (Config::get('app.debug')) {
        dd($donnees);
    }
}

?>