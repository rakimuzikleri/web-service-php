<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function($table)
        {
            $table->increments('id');
            $table->string('song_name', 60);
            $table->string('singer', 60);
            $table->string('image_url', 100);
            $table->string('song_url', 100);
            $table->integer('listen_count');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('songs');
    }
}
