<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_values', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('detail_key_id');
            $table->timestamps();

            $table->foreign('detail_key_id')
                ->references('id')
                ->on('detail_keys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_values');
    }
}
