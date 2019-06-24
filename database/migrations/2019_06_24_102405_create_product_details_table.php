<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('detail_key_id');
            $table->unsignedInteger('detail_value_id')->nullable();
            $table->boolean('highlighted')->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('detail_key_id')->references('id')->on('detail_keys');
            $table->foreign('detail_value_id')->references('id')->on('detail_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
