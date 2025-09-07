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
        Schema::create('payment_frequencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('payment_frequencies')->insert(['name' => 'Weekly']);
        DB::table('payment_frequencies')->insert(['name' => 'Bi-weekly']);
        DB::table('payment_frequencies')->insert(['name' => 'Monthly']);
        DB::table('payment_frequencies')->insert(['name' => 'Annually']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_frequencies');
    }
};
