<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Lancement des migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilotes', function (Blueprint $table) {
            $table->id();
            $table->string('role_pilote');
            $table->string('nom_pilote');
            $table->string('nationalite');
            $table->integer('num_points');
            $table->string('drapeau');
            $table->string('img_ecurie');
            $table->integer('ecurie_id');
            $table->string('maj');
            $table->timestamps();
        });
    }

    /**
     * Annulation des migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilotes');
    }
};
