<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pilotes extends Component
{
    /**
     * Création d'une nouvelle instance de composant.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Prise de la vue / des contenus qui représentent le composant.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pilotes');
    }
}
