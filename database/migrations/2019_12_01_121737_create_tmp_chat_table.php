<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmpChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_chat', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('isi_chat');
            $table->string('id_chat');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('tmp_chat', function (Blueprint $table) {
            $table->foreign('id_chat')
                ->references("id_chat")
                ->on("chat")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            
            $table->foreign('user_id')
                ->references("id")
                ->on("user")
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
        Schema::dropIfExists('tmp_chat');
    }
}
