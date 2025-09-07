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
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('application_id');
            $table->unsignedInteger('application_type_id')->references('id')->on('application_types');
            $table->string('name')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('relationship')->nullable();
            $table->string('income_source')->nullable();
            $table->string('gross_amount')->nullable();
            $table->unsignedInteger('payment_frequency_id')->nullable()->references('id')->on('payment_frequency');
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
        Schema::dropIfExists('households');
    }
};
