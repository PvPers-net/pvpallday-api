<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameStreamCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_stream_categories', function (Blueprint $table) {

            // Game Stream Category ID
            $table->increments('id');

            // Game Stream Category Timestamps (Created At/Updated At)
            $table->timestamps();

            // Game Stream Category Service (StreamService)
            $table->integer('service_id')
                ->unsigned();

            // Game Stream Category Title
            $table->string('title');

            // Game Stream Category Game (Game)
            $table->integer('game_id')
                ->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_stream_categories');
    }
}
