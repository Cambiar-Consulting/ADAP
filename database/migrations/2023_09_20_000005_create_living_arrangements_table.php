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
        Schema::create('living_arrangements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('living_arrangements')->insert(['name' => 'Live Alone']);
        DB::table('living_arrangements')->insert(['name' => 'Live with Others']);
        DB::table('living_arrangements')->insert(['name' => 'Homeless/Shelter']);
        DB::table('living_arrangements')->insert(['name' => 'Corrections Release']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('living_arrangements');
    }
};
