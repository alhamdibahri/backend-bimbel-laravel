<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->string('id_chat')->primary('id_chat');
            $table->date('tgl_chat');
            $table->string('kode_siswa');
            $table->string('kode_guru');
            $table->timestamps();
        });

        Schema::table('chat', function (Blueprint $table) {
            $table->foreign("kode_siswa")
                  ->references("kode_siswa")
                  ->on("siswa")
                  ->onUpdate("cascade")
                  ->onDelete("cascade");

            $table->foreign("kode_guru")
                  ->references("kode_guru")
                  ->on("guru")
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
        Schema::dropIfExists('chat');
    }
}
