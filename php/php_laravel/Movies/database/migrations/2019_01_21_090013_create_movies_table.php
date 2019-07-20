<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id'); // id en autp-incremente
            $table->timestamps();// created_at & updated_at. Ces 2 champs sont absolument nécessaires par convention. Ils indiquent les dates de création et modification de la ligne

            $table->string('title', 60);
            $table->text('synopsis')->nullable();
            $table->string('director', 60)->comment("C'est le réalisateur !");
            $table->string('producer', 60)->nullable();
            $table->enum('genre', ['action', 'aventure', 'drama', 'comic']);
            $table->date('release_date');
            $table->boolean('active')->default(1); // 1 = true
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
