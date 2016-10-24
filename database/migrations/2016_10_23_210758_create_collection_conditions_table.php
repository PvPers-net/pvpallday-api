<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_conditions', function (Blueprint $table) {

            // Collection Condition ID (PK)
            $table->increments('id');

            // Collection Condition Timestamps
            $table->timestamps();

            // Collection Condition Field
            $table->string('field');

            // Collection Condition Comparison Operator
            $table->string('operator');

            // Collection Condition Compare To
            $table->string('comapre_to');

            // Collection ID (Collection)
            $table->integer('collection_id')
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
        Schema::dropIfExists('collection_conditions');
    }
}
