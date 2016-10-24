<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_statuses', function (Blueprint $table) {

            // Video Status ID (PK)
            $table->increments('id');

            // Video Status Timestamps (Created At/Updated At)
            $table->timestamps();

            // Video Status Title
            $table->string('title');

            // Video Status Description
            $table->text('description');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_statuses');
    }
}
