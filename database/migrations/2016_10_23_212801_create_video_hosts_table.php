<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_hosts', function (Blueprint $table) {

            // Video Host ID (PK)
            $table->increments('id');

            // Video Host Timestamps (Updated At/Created At)
            $table->timestamps();

            // Video Host Title
            $table->string('title');

            // Video Host Handle
            $table->string('handle');

            // Video Host URL
            $table->string('url');

            // Video Host Font Awesome Icon
            $table->string('fa-icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_hosts');
    }
}
