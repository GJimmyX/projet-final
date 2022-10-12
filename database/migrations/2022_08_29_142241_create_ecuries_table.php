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
        Schema::create('ecuries', function (Blueprint $table) {
            $table->id();
            $table->string('nom_ecurie');
            $table->integer('points_ecurie');
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
        Schema::dropIfExists('ecuries');
    }
};
