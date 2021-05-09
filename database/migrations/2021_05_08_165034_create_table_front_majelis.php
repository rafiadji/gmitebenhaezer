<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFrontMajelis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_majelis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat_majelis')->unsigned()->nullable();
            $table->string('jabatan_majelis', 50);
            $table->integer('urutan');
            $table->string('animasi', 20);
            $table->timestamps();
            $table->foreign('id_jemaat_majelis')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('front_majelis');
    }
}
