<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblLowongan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tbl_lowongan", function ($table) {
            $table->id();
            $table->text('skill');
            $table->string('gaji');
            $table->string('bersedia_ditempatkan');
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
        Schema::dropIfExists('tbl_lowongan');
    }
}
