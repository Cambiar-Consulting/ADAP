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
        Schema::create('application_status_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('application_id');
            $table->unsignedInteger('application_status_id')->references('id')->on('application_statuses');
            $table->unsignedInteger('application_type_id')->references('id')->on('application_types');
            $table->unsignedInteger('assigned_to_user_id')->nullable()->references('id')->on('users');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('application_status_histories');
    }
};
