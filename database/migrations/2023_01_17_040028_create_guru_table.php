<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->nullable()->unique();
            $table->string('nama')->nullable();
            $table->string('jkl')->nullable();
            $table->string('agama')->nullable();
            $table->string('tlp')->nullable();
            $table->unsignedBigInteger('lembaga_id')->nullable();
            $table->foreign('lembaga_id')->references('id')->on('lembaga')->onDelete('cascade');
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
        Schema::dropIfExists('guru');
    }
}
