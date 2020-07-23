<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrSidiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr_sidi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat_sidi')->unsigned()->nullable();
            $table->date('tgl_sidi')->nullable();
            $table->string('status_sidi', 15)->nullable();
            $table->timestamps();
            $table->foreign('id_jemaat_sidi')->references('id')->on('gr_jemaat')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gr_sidi');
    }
}
