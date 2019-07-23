<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('language_id')->nullable();
            $table->string('key', 4);
            $table->string('symbol', 10)->nullable();
            # name fetch from dictionary
            $table->decimal('ratio', 18, 9);
            $table->unsignedTinyInteger('places')->default(0);
            $table->timestamps();

            $table->unique('key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
