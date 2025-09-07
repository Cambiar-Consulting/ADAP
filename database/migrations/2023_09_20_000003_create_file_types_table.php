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
        Schema::create('file_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('file_types')->insert(['name' => 'Proof Of Residency']);
        DB::table('file_types')->insert(['name' => 'Proof Of Income']);
        DB::table('file_types')->insert(['name' => 'Proof Of Insurance']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_types');
    }
};
