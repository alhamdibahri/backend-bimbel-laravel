<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_kelas', function (Blueprint $table) {
            $table->Increments('id_category_kelas');
            $table->string('nama_category_kelas');
            $table->timestamps();
        });

        Schema::table('guru', function (Blueprint $table){
            $table->foreign('id_category_kelas')
                  ->references('id_category_kelas')
                  ->on('category_kelas')
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
            $table->dropForeign('guru_id_category_kelas_foreign');
        });

        Schema::dropIfExists('category_kelas');
    }
}
