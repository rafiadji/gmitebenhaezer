<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrBaptisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr_baptis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat_baptis')->unsigned()->nullable();
            $table->bigInteger('id_jemaat_ayah')->unsigned()->nullable();
            $table->bigInteger('id_jemaat_ibu')->unsigned()->nullable();
            $table->bigInteger('id_jemaat_pendeta')->unsigned()->nullable();
            $table->date('tgl_baptis')->nullable();
            $table->string('name_saksi_1', 50)->nullable();
            $table->string('name_saksi_2', 50)->nullable();
            $table->timestamps();
            $table->foreign('id_jemaat_baptis')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
            $table->foreign('id_jemaat_ayah')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
            $table->foreign('id_jemaat_ibu')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
            $table->foreign('id_jemaat_pendeta')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gr_baptis');
    }
}
