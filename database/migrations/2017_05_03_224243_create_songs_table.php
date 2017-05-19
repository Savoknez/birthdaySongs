<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unsigned();
            $table->string('month', 20);
            $table->integer('week')->unsigned();
            $table->text('first_artist');
            $table->text('first_song');
            $table->text('second_artist');
            $table->text('second_song');
            $table->text('third_artist');
            $table->text('third_song');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
