<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionConditionSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_condition_sets', function (Blueprint $table) {

            // Collection Condition Set ID
            $table->integer('set_id')
                ->unsigned();

            // Collection Condition Condition ID
            $table->integer('condition_id')
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
        Schema::dropIfExists('collection_condition_sets');
    }
}
