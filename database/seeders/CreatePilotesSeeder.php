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
                'role_pilote' => 'alpine01',
                'nom_pilote' => 'Pierre GASLY',
                'nationalite' => 'Français',
                'num_points' => 0,
                'drapeau' => 'logo_france.png',
                'img_ecurie' => 'logo_alpine.png',
                'ecurie_id' => 1,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'alpine02',
                'nom_pilote' => 'Jack DOOHAN',
                'nationalite' => 'Australien',
                'num_points' => 0,
                'drapeau' => 'logo_australie.png',
                'img_ecurie' => 'logo_alpine.png',
                'ecurie_id' => 1,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'aston01',
                'nom_pilote' => 'Fernando ALONSO',
                'nationalite' => 'Espagnol',
                'num_points' => 0,
                'drapeau' => 'logo_espagne.png',
                'img_ecurie' => 'logo_astonmartin.png',
                'ecurie_id' => 2,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'aston02',
                'nom_pilote' => 'Lance STROLL',
                'nationalite' => 'Canadien',
                'num_points' => 0,
                'drapeau' => 'logo_canada.png',
                'img_ecurie' => 'logo_astonmartin.png',
                'ecurie_id' => 2,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'ferrari01',
                'nom_pilote' => 'Charles LECLERC',
                'nationalite' => 'Monégasque',
                'num_points' => 0,
                'drapeau' => 'logo_monaco.png',
                'img_ecurie' => 'logo_ferrari.png',
                'ecurie_id' => 3,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'ferrari02',
                'nom_pilote' => 'Lewis HAMILTON',
                'nationalite' => 'Anglais',
                'num_points' => 0,
                'drapeau' => 'logo_royaumeuni.png',
                'img_ecurie' => 'logo_ferrari.png',
                'ecurie_id' => 3,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'haas01',
                'nom_pilote' => 'Esteban OCON',
                'nationalite' => 'Français',
                'num_points' => 0,
                'drapeau' => 'logo_france.png',
                'img_ecurie' => 'logo_haas.png',
                'ecurie_id' => 4,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'haas02',
                'nom_pilote' => 'Oliver BEARMAN',
                'nationalite' => 'Anglais',
                'num_points' => 0,
                'drapeau' => 'logo_royaumeuni.png',
                'img_ecurie' => 'logo_haas.png',
                'ecurie_id' => 4,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'mclaren01',
                'nom_pilote' => 'Lando NORRIS',
                'nationalite' => 'Anglais',
                'num_points' => 0,
                'drapeau' => 'logo_royaumeuni.png',
                'img_ecurie' => 'logo_mclaren.png',
                'ecurie_id' => 5,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'mclaren02',
                'nom_pilote' => 'Oscar PIASTRI',
                'nationalite' => 'Australien',
                'num_points' => 0,
                'drapeau' => 'logo_australie.png',
                'img_ecurie' => 'logo_mclaren.png',
                'ecurie_id' => 5,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'mercedes01',
                'nom_pilote' => 'Georges RUSSELL',
                'nationalite' => 'Anglais',
                'num_points' => 0,
                'drapeau' => 'logo_royaumeuni.png',
                'img_ecurie' => 'logo_mercedes.png',
                'ecurie_id' => 6,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'mercedes02',
                'nom_pilote' => 'Andrea Kimi ANTONELLI',
                'nationalite' => 'Italien',
                'num_points' => 0,
                'drapeau' => 'logo_italie.png',
                'img_ecurie' => 'logo_mercedes.png',
                'ecurie_id' => 6,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'racingbulls01',
                'nom_pilote' => 'Yuki TSUNODA',
                'nationalite' => 'Japonais',
                'num_points' => 0,
                'drapeau' => 'logo_japon.png',
                'img_ecurie' => 'logo_racing_bulls.png',
                'ecurie_id' => 7,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'racingbulls02',
                'nom_pilote' => 'Isack HADJAR',
                'nationalite' => 'Français',
                'num_points' => 0,
                'drapeau' => 'logo_france.png',
                'img_ecurie' => 'logo_racing_bulls.png',
                'ecurie_id' => 7,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'redbull01',
                'nom_pilote' => 'Max VERSTAPPEN',
                'nationalite' => 'Hollandais',
                'num_points' => 0,
                'drapeau' => 'logo_paysbas.png',
                'img_ecurie' => 'logo_redbull.png',
                'ecurie_id' => 8,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'redbull02',
                'nom_pilote' => 'Liam LAWSON',
                'nationalite' => 'Néo-Zélandais',
                'num_points' => 0,
                'drapeau' => 'logo_nvl_zelande.png',
                'img_ecurie' => 'logo_redbull.png',
                'ecurie_id' => 8,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'sauber01',
                'nom_pilote' => 'Nico HULKENBERG',
                'nationalite' => 'Allemand',
                'num_points' => 0,
                'drapeau' => 'logo_allemagne.png',
                'img_ecurie' => 'logo_stakef1.png',
                'ecurie_id' => 9,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'sauber02',
                'nom_pilote' => 'Gabriel BORTOLETO',
                'nationalite' => 'Brésilien',
                'num_points' => 0,
                'drapeau' => 'logo_bresil.png',
                'img_ecurie' => 'logo_stakef1.png',
                'ecurie_id' => 9,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'williams01',
                'nom_pilote' => 'Alexander ALBON',
                'nationalite' => 'Thaïlandais',
                'num_points' => 0,
                'drapeau' => 'logo_thailande.png',
                'img_ecurie' => 'logo_williams.png',
                'ecurie_id' => 10,
                'maj' => '0',
            ],
            [
                'role_pilote' => 'williams02',
                'nom_pilote' => 'Carlos SAINZ',
                'nationalite' => 'Espagnol',
                'num_points' => 0,
                'drapeau' => 'logo_espagne.png',
                'img_ecurie' => 'logo_williams.png',
                'ecurie_id' => 10,
                'maj' => '0',
            ],
        ];

        // Pour chaque pilote renseigné, implantation dans une ligne de la table 'Pilotes' dans la base de données

        foreach ($pilotes as $key => $pilote) {
            Pilote::create($pilote);
        }
    }
}
