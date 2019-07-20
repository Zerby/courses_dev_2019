<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpruntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('livres_id')->unsigned();
            $table->foreign('livres_id')->references('id')->on('livres')->onDelete('cascade');

            // les foreign keys fonctionnent bien

            $table->integer('abonnes_id')->unsigned();
            $table->foreign('abonnes_id')->references('id')->on('abonnes')->onDelete('cascade');

            $table->date('date_sortie');
            $table->date('date_rendu');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprunts');
    }
}
