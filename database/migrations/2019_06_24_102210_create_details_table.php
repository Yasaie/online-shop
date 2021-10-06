<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_categories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('weight')->nullable();
            $table->timestamps();
        });

        Schema::create('detail_keys', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('detail_category_id')->nullable();
            $table->boolean('highlighted')->default(0);
            $table->timestamps();

            $table->foreign('detail_category_id')
                ->references('id')
                ->on('detail_categories')
                ->onDelete('set null');
        });

        Schema::create('detail_values', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('detail_key_id');
            $table->timestamps();

            $table->foreign('detail_key_id')
                ->references('id')
                ->on('detail_keys');
        });

        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('detail_value_id');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('detail_value_id')
                ->references('id')
                ->on('detail_values');
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
        Schema::dropIfExists('detail_values');
        Schema::dropIfExists('detail_keys');
        Schema::dropIfExists('detail_categories');
    }
}
