<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPendidikanTerakhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tbl_pendidikan_terakhir", function ($table) {
            $table->id();
            $table->string('jenjang');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->string('ipk');
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
        Schema::dropIfExists('tbl_pendidikan_terakhir');
    }
}
