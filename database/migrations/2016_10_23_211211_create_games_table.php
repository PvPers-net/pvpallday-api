<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {

            // Game ID
            $table->increments('id');

            // Game Timestamps (Updated At/Created At)
            $table->timestamps();

            // Game Title
            $table->string('title');

            // Game Handle
            $table->string('handle');

            // Game Hashtag
            $table->string('hashtag');

            // Game Icon ID (Image)
            $table->integer('icon_id')
                ->nullable()
                ->unsigned();

            // Game Logo ID (Image)
            $table->integer('logo_id')
                ->nullable()
                ->unsigned();

            // Game Active (True or False)
            $table->boolean('active');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
