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
        Schema::create('application_races', function (Blueprint $table) {
            $table->unsignedInteger('application_id');
            $table->unsignedInteger('application_type_id')->references('id')->on('application_types');
            $table->unsignedInteger('race_id')->references('id')->on('races');
            $table->primary(['application_id', 'application_type_id', 'race_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_races');
    }
};
