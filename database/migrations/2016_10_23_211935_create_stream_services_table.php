<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreamServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_services', function (Blueprint $table) {

            // Stream Service ID (PK)
            $table->increments('id');

            // Stream Service Timestamps (Created At/Updated At)
            $table->timestamps();

            // Stream Service Title
            $table->string('title');

            // Stream Service Handle
            $table->string('handle');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stream_services');
    }
}
