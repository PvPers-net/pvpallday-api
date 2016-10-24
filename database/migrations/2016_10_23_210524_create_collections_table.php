<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {

            // Collection ID
            $table->increments('id');

            // Timestamps (Created At/Updated At)
            $table->timestamps();

            // Collection Title
            $table->string('title');

            // Collection Description
            $table->text('description')
                ->nullable();

            // Collection Icon (Image)
            $table->integer('icon_id')
                ->nullable();

            // Collection Banner (Image)
            $table->integer('banner_id')
                ->nullable();

            // Collection Handle
            $table->string('handle');

            // Collection Game ID (Game)
            $table->integer('game_id')
                ->unsigned();

            // Collection Active (True or False)
            $table->boolean('active');

            // Collection Is Featured (True or False)
            $table->boolean('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
