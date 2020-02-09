<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_guru', function (Blueprint $table) {
            $table->Increments('id_materi_guru');
            $table->string("nama_materi");
            $table->string("file_materi");
            $table->string("kode_guru");
            $table->string("kode_siswa");
            $table->timestamps();
        });

        Schema::table('materi_guru', function (Blueprint $table) {
            $table->foreign("kode_guru")
                  ->references("kode_guru")
                  ->on("guru")
                  ->onUpdate("cascade")
                  ->onDelete("cascade");

            $table->foreign("kode_siswa")
                  ->references("kode_siswa")
                  ->on("siswa")
                  ->onUpdate("cascade")
                  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_guru');
    }
}
