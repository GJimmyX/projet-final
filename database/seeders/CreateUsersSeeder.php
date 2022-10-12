<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Lancement des seeds à la database.
     *
     * @return void
     */
    public function run()
    {

        /* Seeder important les infos de connexion pour l'admin du site */

        $users = [
             [
                'name'=>'Admin',
                'email'=>'gilbertg.jimmy@gmail.com',
                'type'=>1,
                'password'=> bcrypt('Ld402,Mg8'),
             ],
             [
                'name'=>'TeamDev',
                'email'=>'teamdevarinfo@gmail.com',
                'type'=>1,
                'password'=> bcrypt('Am345,Io7'),
             ],
             [
                'name'=>'Jury',
                'email'=>'gilbertg.jimmy@gmail.com',
                'type'=>1,
                'password'=> bcrypt('Jy201,Pe8'),
             ],
        ];

        // Pour chaque user renseigné, implantation dans une ligne de la table 'Users' dans la base de données

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
