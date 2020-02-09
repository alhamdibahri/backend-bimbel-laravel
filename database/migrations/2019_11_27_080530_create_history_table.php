<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->Increments('id_history');
            $table->date('tgl_transaksi');
            $table->string('status_history');
            $table->string('kode_guru');
            $table->string('kode_siswa');
            $table->timestamps();
        });

        Schema::table('history', function (Blueprint $table) {
            $table->foreign('kode_guru')
                    ->references('kode_guru')
                    ->on('guru')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('kode_siswa')
                    ->references('kode_siswa')
                    ->on('siswa')
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
        Schema::dropIfExists('history');
    }
}
