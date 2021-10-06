<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->string('type');
            $table->text('value')->nullable();
            $table->text('options')->nullable();
            $table->boolean('required')->default(0);
            $table->timestamps();
        });

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('profile_id');
            $table->text('data')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');
        });

        Schema::create('profile_roles', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('profile_id');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_roles');
        Schema::dropIfExists('user_profiles');
        Schema::dropIfExists('profiles');
    }
}
