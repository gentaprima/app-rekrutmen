<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_biodata', function (Blueprint $table) {
            $table->id();
            $table->string('posisi')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jk')->nullable();
            $table->string('agama')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('status')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_tinggal')->nullable();
            $table->string('telp')->nullable();
            $table->string('kontak_darurat')->nullable();
            $table->unsignedBigInteger('id_users')->nullable();
            $table->foreign('id_users')->references('id')->on('tbl_users')->onDelete('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_biodata');
    }
}
