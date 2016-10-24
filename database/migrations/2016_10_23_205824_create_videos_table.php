<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            // Video ID
            $table->increments('id')
                ->unsigned();

            // Timestamps (Created At/Updated At)
            $table->timestamps();

            // Hosted At (When hosted at original host)
            $table->timestamp('hosted_at')
                ->useCurrent();

            // Video Title
            $table->string('title');

            // Video Description
            $table->text('description')
                ->nullable();

            // Video Handel
            $table->string('handle');

            // Video Submitter ID (User)
            $table->integer('submitter_id')
                ->nullable()
                ->unsigned();

            // Video Owner ID (User)
            $table->integer('owner_id')
                ->nullable()
                ->unsigned();

            // Video Status (VideoStatus)
            $table->integer('status_id')
                ->unsigned();

            // Video Host ID (VideoHost)
            $table->integer('host_id')
                ->nullable()
                ->unsigned();

            // Video Host Unique ID
            $table->string('unique_host_id');

            // Video Image ID (Image)
            $table->integer('image_id')
                ->nullable()
                ->unsigned();
            
            // Video Game ID (Game)
            $table->integer('game_id')
                ->unsigned();
            
            // Video Length (Seconds)
            $table->integer('length')
                ->nullable()
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
        Schema::dropIfExists('videos');
    }
}
