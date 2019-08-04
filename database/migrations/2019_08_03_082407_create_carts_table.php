<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $status = [
                'cart',
                'profile',
                'factor',
                'pay',
                'fail',
                'success',
                'checking',
                'ready',
                'sending',
                'received'
            ];

            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id');
            $table->string('traceno')->nullable();
            $table->enum('status', $status)->nullable();
            $table->smallInteger('status_code')->nullable();
            $table->decimal('total', 12, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('seller_id');
            $table->unsignedInteger('currency_id')->nullable();
            $table->unsignedTinyInteger('quantity')->default(1);
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('prev_price', 12, 2)->nullable();
            $table->timestamps();

            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');

            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers')
                ->onDelete('cascade');

            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('carts');
    }
}
