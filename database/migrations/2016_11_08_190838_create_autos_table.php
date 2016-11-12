<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('modelo')->nullable();
            $table->string('color')->nullable();
            $table->integer('precio');
            $table->integer('existencia')->default(0);
            $table->string('imagen')->nullable()->default(url('img/logo.png'));
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
        Schema::drop('autos');
    }
}
