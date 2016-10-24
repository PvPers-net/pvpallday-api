<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_votes', function (Blueprint $table) {

            // Video Vote ID (PK)
            $table->increments('id');

            // Video Vote Timestamps (Created At/Updated At)
            $table->timestamps();

            // Video ID (Video)
            $table->integer('video_id')
                ->unsigned();

            // Voter ID (User)
            $table->integer('voter_id')
                ->unsigned();

            // Vote
            $table->integer('vote');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_votes');
    }
}
