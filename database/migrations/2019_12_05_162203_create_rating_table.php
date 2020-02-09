<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->Increments('id');
            $table->double('nilai_rating');
            $table->string('kode_guru');
            $table->string('kode_siswa');
            $table->timestamps();
        });

        Schema::table('rating', function (Blueprint $table) {
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
        Schema::dropIfExists('ratings');
    }
}
