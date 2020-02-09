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
            $table->string('kode_guru')->primary('kode_guru');
            $table->integer('user_id')->unsigned();
            $table->date('tanggal_lahir_guru');
            $table->enum('jenkel_guru', ['Pria', 'Wanita']);
            $table->string('agama_guru');
            $table->string('alamat_guru');
            $table->string('no_handphone_guru');
            $table->string('foto_guru')->nullable();
            $table->string('status_guru');
            $table->integer('id_category_kelas')->unsigned();
            $table->integer('id_mata_pelajaran')->unsigned();
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
        Schema::dropIfExists('guru');
    }
}
