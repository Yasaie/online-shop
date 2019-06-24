<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_keys', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('detail_category_id')->nullable();
            $table->timestamps();

            $table->foreign('detail_category_id')->references('id')->on('detail_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_keys');
    }
}
