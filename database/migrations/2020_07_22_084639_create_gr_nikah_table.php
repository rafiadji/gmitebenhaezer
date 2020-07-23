<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrNikahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr_nikah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat_pria')->unsigned()->nullable();
            $table->bigInteger('id_jemaat_wanita')->unsigned()->nullable();
            $table->bigInteger('id_jemaat_pendeta')->unsigned()->nullable();
            $table->date('tgl_nikah')->nullable();
            $table->string('name_saksi_p_1', 50)->nullable();
            $table->string('name_saksi_p_2', 50)->nullable();
            $table->string('name_saksi_w_1', 50)->nullable();
            $table->string('name_saksi_w_2', 50)->nullable();
            $table->timestamps();
            $table->foreign('id_jemaat_pria')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
            $table->foreign('id_jemaat_wanita')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('gr_nikah');
    }
}
