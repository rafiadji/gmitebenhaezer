<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrJemaatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr_jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->bigInteger('id_jabatan')->unsigned()->nullable();
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->string('nomer_kk', 20)->nullable();
            $table->string('name', 50);
            $table->string('name_baptis', 50)->nullable();
            $table->string('jk', 10)->nullable();
            $table->string('no_tlp', 15)->nullable();
            $table->string('tempat_lahir', 30)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat', 200)->nullable();
            $table->date('tgl_baptis')->nullable();
            $table->date('tgl_sidi')->nullable();
            $table->date('tgl_nikah')->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('pendidikan', 50)->nullable();
            $table->string('status_keluarga', 10)->nullable();
            $table->string('status_aktif', 15)->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreign('id_jabatan')->references('id')->on('gr_jabatan')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gr_jemaat');
    }
}
