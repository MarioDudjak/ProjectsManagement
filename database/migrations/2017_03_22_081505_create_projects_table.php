<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv_projekta');
            $table->string('opis_projekta');
            $table->string('cijena_projekta');
            $table->string('obavljeni_poslovi');
            $table->date('datum_pocetka');
            $table->date('datum_zavrsetka');
            $table->string('voditelj');
            $table->array('ukljuceni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
