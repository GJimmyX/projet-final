<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pilote;

class CreatePilotesSeeder extends Seeder
{
    /**
     * Lancement des seeds à la database.
     *
     * @return void
     */
    public function run()
    {
        
        /* Seeder important les infos des pilotes concourant pour le championnat du monde de Formule 1 */

        $pilotes = [
            [
                'role_pilote' => 'alfa01',
                'nom_pilote' => 'Valtteri BOTTAS',
                'nationalite' => 'Finlandais',
                'num_points' => 46,
                'drapeau' => 'logo_finlande.png',
                'img_ecurie' => 'logo_alfaromeo.png',
                'ecurie_id' => 1,
            ],
            [
                'role_pilote' => 'alfa02',
                'nom_pilote' => 'Guanyu ZHOU',
                'nationalite' => 'Chinois',
                'num_points' => 6,
                'drapeau' => 'logo_chine.png',
                'img_ecurie' => 'logo_alfaromeo.png',
                'ecurie_id' => 1,
            ],
            [
                'role_pilote' => 'alpha01',
                'nom_pilote' => 'Pierre GASLY',
                'nationalite' => 'Français',
                'num_points' => 22,
                'drapeau' => 'logo_france.png',
                'img_ecurie' => 'logo_alphatauri.png',
                'ecurie_id' => 2,
            ],
            [
                'role_pilote' => 'alpha02',
                'nom_pilote' => 'Yuki TSUNODA',
                'nationalite' => 'Japonais',
                'num_points' => 11,
                'drapeau' => 'logo_japon.png',
                'img_ecurie' => 'logo_alphatauri.png',
                'ecurie_id' => 2,
            ],
            [
                'role_pilote' => 'alpine01',
                'nom_pilote' => 'Esteban OCON',
                'nationalite' => 'Français',
                'num_points' => 66,
                'drapeau' => 'logo_france.png',
                'img_ecurie' => 'logo_alpine.png',
                'ecurie_id' => 3,
            ],
            [
                'role_pilote' => 'alpine02',
                'nom_pilote' => 'Fernando ALONSO',
                'nationalite' => 'Espagnol',
                'num_points' => 59,
                'drapeau' => 'logo_espagne.png',
                'img_ecurie' => 'logo_alpine.png',
                'ecurie_id' => 3,
            ],
            [
                'role_pilote' => 'aston01',
                'nom_pilote' => 'Sebastian VETTEL',
                'nationalite' => 'Allemand',
                'num_points' => 20,
                'drapeau' => 'logo_allemagne.png',
                'img_ecurie' => 'logo_astonmartin.png',
                'ecurie_id' => 4,
            ],
            [
                'role_pilote' => 'aston02',
                'nom_pilote' => 'Lance STROLL',
                'nationalite' => 'Canadien',
                'num_points' => 5,
                'drapeau' => 'logo_canada.png',
                'img_ecurie' => 'logo_astonmartin.png',
                'ecurie_id' => 4,
            ],
            [
                'role_pilote' => 'ferrari01',
                'nom_pilote' => 'Charles LECLERC',
                'nationalite' => 'Monégasque',
                'num_points' => 219,
                'drapeau' => 'logo_monaco.png',
                'img_ecurie' => 'logo_ferrari.png',
                'ecurie_id' => 5,
            ],
            [
                'role_pilote' => 'ferrari02',
                'nom_pilote' => 'Carlos SAINZ',
                'nationalite' => 'Espagnol',
                'num_points' => 187,
                'drapeau' => 'logo_espagne.png',
                'img_ecurie' => 'logo_ferrari.png',
                'ecurie_id' => 5,
            ],
            [
                'role_pilote' => 'haas01',
                'nom_pilote' => 'Kevin MAGNUSSEN',
                'nationalite' => 'Danois',
                'num_points' => 22,
                'drapeau' => 'logo_danemark.png',
                'img_ecurie' => 'logo_haas.png',
                'ecurie_id' => 6,
            ],
            [
                'role_pilote' => 'haas02',
                'nom_pilote' => 'Mick SCHUMACHER',
                'nationalite' => 'Allemand',
                'num_points' => 12,
                'drapeau' => 'logo_allemagne.png',
                'img_ecurie' => 'logo_haas.png',
                'ecurie_id' => 6,
            ],
            [
                'role_pilote' => 'mclaren01',
                'nom_pilote' => 'Lando NORRIS',
                'nationalite' => 'Anglais',
                'num_points' => 88,
                'drapeau' => 'logo_royaumeuni.png',
                'img_ecurie' => 'logo_mclaren.png',
                'ecurie_id' => 7,
            ],
            [
                'role_pilote' => 'mclaren02',
                'nom_pilote' => 'Daniel RICCIARDO',
                'nationalite' => 'Australien',
                'num_points' => 19,
                'drapeau' => 'logo_australie.png',
                'img_ecurie' => 'logo_mclaren.png',
                'ecurie_id' => 7,
            ],
            [
                'role_pilote' => 'mercedes01',
                'nom_pilote' => 'Georges RUSSELL',
                'nationalite' => 'Anglais',
                'num_points' => 203,
                'drapeau' => 'logo_royaumeuni.png',
                'img_ecurie' => 'logo_mercedes.png',
                'ecurie_id' => 8,
            ],
            [
                'role_pilote' => 'mercedes02',
                'nom_pilote' => 'Lewis HAMILTON',
                'nationalite' => 'Anglais',
                'num_points' => 168,
                'drapeau' => 'logo_royaumeuni.png',
                'img_ecurie' => 'logo_mercedes.png',
                'ecurie_id' => 8,
            ],
            [
                'role_pilote' => 'redbull01',
                'nom_pilote' => 'Max VERSTAPPEN',
                'nationalite' => 'Hollandais',
                'num_points' => 335,
                'drapeau' => 'logo_paysbas.png',
                'img_ecurie' => 'logo_redbull.png',
                'ecurie_id' => 9,
            ],
            [
                'role_pilote' => 'redbull02',
                'nom_pilote' => 'Sergio PÉREZ',
                'nationalite' => 'Mexicain',
                'num_points' => 210,
                'drapeau' => 'logo_mexique.png',
                'img_ecurie' => 'logo_redbull.png',
                'ecurie_id' => 9,
            ],
            [
                'role_pilote' => 'williams01',
                'nom_pilote' => 'Alexander ALBON',
                'nationalite' => 'Thaïlandais',
                'num_points' => 4,
                'drapeau' => 'logo_thailande.png',
                'img_ecurie' => 'logo_williams.png',
                'ecurie_id' => 10,
            ],
            [
                'role_pilote' => 'williams02',
                'nom_pilote' => 'Nicholas LATIFI',
                'nationalite' => 'Canadien',
                'num_points' => 0,
                'drapeau' => 'logo_canada.png',
                'img_ecurie' => 'logo_williams.png',
                'ecurie_id' => 10,
            ],
        ];

        // Pour chaque pilote rensigné, implantation dans une ligne de la table 'Pilotes' dans la base de données

        foreach ($pilotes as $key => $pilote) {
            Pilote::create($pilote);
        }
    }
}
