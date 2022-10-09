<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblRiwayatPekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tbl_riwayat_pekerjaan", function ($table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('posisi_terakhir');
            $table->string('pendapatan_terakhir');
            $table->string('tahun');
            $table->unsignedBigInteger('id_biodata');
            $table->foreign('id_biodata')->references('id')->on('tbl_biodata')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_riwayat_pekerjaan');
    }
}
