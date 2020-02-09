<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->Increments('id_mata_pelajaran');
            $table->Integer('id_category_kelas')->unsigned()->index();
            $table->string('mata_pelajaran');
            $table->timestamps();

            $table->foreign('id_category_kelas')
                  ->references('id_category_kelas')
                  ->on('category_kelas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::table('guru', function (Blueprint $table){
            $table->foreign('id_mata_pelajaran')
                  ->references('id_mata_pelajaran')
                  ->on('mata_pelajaran')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table){
            $table->dropForeign('guru_id_mata_pelajaran_foreign');
        });

        Schema::dropIfExists('mata_pelajaran');
    }
}
