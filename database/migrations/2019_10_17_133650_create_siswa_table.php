<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('kode_siswa')->primary('kode_siswa');
            $table->integer('user_id')->unsigned();
            $table->date('tanggal_lahir_siswa');
            $table->enum('jenkel_siswa', ['Pria', 'Wanita']);
            $table->string('agama_siswa');
            $table->string('alamat_siswa');
            $table->string('no_handphone_siswa');
            $table->string('foto_siswa')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('user')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
