<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merged_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('applicant_id')->references('id')->on('users');
            $table->unsignedInteger('application_type_id')->references('id')->on('application_types');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('alias')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('ssn')->nullable();
            $table->string('email')->nullable();
            $table->string('race_other')->nullable();
            $table->string('language_other')->nullable();
            $table->boolean('language_services')->nullable();
            $table->boolean('other_health_coverage')->nullable();
            $table->boolean('health_insurance_premiums')->nullable();
            $table->string('medicaid_spenddown')->nullable();
            $table->string('medicaid_denial')->nullable();
            $table->unsignedInteger('living_arrangement_id')->nullable()->references('id')->on('living_arrangements');
            $table->dateTime('signed_at')->nullable();
            $table->unsignedInteger('signed_by_id')->nullable()->references('id')->on('users');
            $table->unsignedInteger('created_by_id')->nullable()->references('id')->on('users');
            $table->unsignedInteger('updated_by_id')->nullable()->references('id')->on('users');
            $table->unsignedInteger('deleted_by_id')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merged_applications');
    }
};
