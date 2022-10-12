<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ecurie;

class CreateEcuriesSeeder extends Seeder
{
    /**
     * Lancement des seeds à la database.
     *
     * @return void
     */
    public function run()
    {

        /* Seeder important les infos des écuries concourant pour le championnat du monde de Formule 1 */

        $ecuries = [
            [
                'nom_ecurie' => 'Alfa Roméo',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'AlphaTauri',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'Alpine',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'Aston Martin',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'Ferrari',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'Haas',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'Mclaren',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'Mercedes',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'RedBull',
                'points_ecurie' => 0,
            ],
            [
                'nom_ecurie' => 'Williams',
                'points_ecurie' => 0,
            ],
        ];

        // Pour chaque ecurie rensignée, implantation dans une ligne de la table 'Ecuries' dans la base de données

        foreach ($ecuries as $key => $ecurie) {
            Ecurie::create($ecurie);
        }
    }
}
