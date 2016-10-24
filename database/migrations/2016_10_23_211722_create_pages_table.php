<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            // Page ID
            $table->increments('id');

            // Page Timestamps (Created At/Updated At)
            $table->timestamps();

            // Page Title
            $table->string('title');

            // Page Content
            $table->longText('content');

            // Page Active (True or False)
            $table->boolean('active');

            // Page Creator (User)
            $table->integer('creator_id')
                ->unsigned();

            // Page Handle
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
        Schema::dropIfExists('pages');
    }
}
