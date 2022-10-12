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
        Schema::create('biographies', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom_pilote');
            $table->string('background_image');
            $table->string('image_biographie');
            $table->text('texte_biographie');
            $table->date('date_naissance');
            $table->date('date_deces')->nullable();
            $table->string('carriere');
            $table->string('reseaux');
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
        Schema::dropIfExists('biographies');
    }
};
