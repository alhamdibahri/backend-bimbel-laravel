<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('kode_admin')->primary('kode_admin');
            $table->integer('user_id')->unsigned();
            $table->date('tanggal_lahir_admin');
            $table->enum('jenkel_admin', ['Pria', 'Wanita']);
            $table->string('agama_admin');
            $table->string('alamat_admin');
            $table->string('foto_admin')->nullable();
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
        Schema::dropIfExists('admin');
    }
}
