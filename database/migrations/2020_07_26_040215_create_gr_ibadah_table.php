<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrIbadahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr_ibadah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->bigInteger('id_kategori')->unsigned()->nullable();
            $table->date('tgl_ibadah')->nullable();
            $table->time('waktu_ibadah')->nullable();
            $table->string('tempat_ibadah', 50)->nullable();
            $table->string('pelayan', 50)->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreign('id_kategori')->references('id')->on('gr_kategori_ibadah')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gr_ibadah');
    }
}
