<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->references('id')->on('users');
            $table->unsignedInteger('backup_user_id')->nullable()->references('id')->on('users');
            $table->dateTime('unavailable_start');
            $table->dateTime('unavailable_end');
            $table->unsignedInteger('created_by_id')->nullable()->references('id')->on('users');
            $table->unsignedInteger('updated_by_id')->nullable()->references('id')->on('users');
            $table->unsignedInteger('deleted_by_id')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availability');
    }
};
