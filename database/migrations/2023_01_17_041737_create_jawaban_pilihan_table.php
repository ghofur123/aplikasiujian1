<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanPilihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_pilihan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('siswa_id');
            $table->bigInteger('ujian_id');
            $table->bigInteger('soal_id');
            $table->string('jawaban', 1);
            // $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            // $table->foreign('bank_soal_pilihan_id')->references('id')->on('bank_soal_pilihan')->onDelete('cascade');
            // $table->foreign('ujian_id')->references('id')->on('ujian')->onDelete('cascade');
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
        Schema::dropIfExists('jawaban_pilihan');
    }
}
