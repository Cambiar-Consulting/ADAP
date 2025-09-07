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
        Schema::create('insurance_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('insurance_types')->insert(['name' => 'Private Policy']);
        DB::table('insurance_types')->insert(['name' => 'Private Individual']);
        DB::table('insurance_types')->insert(['name' => 'Medicare Part A (Hospital)']);
        DB::table('insurance_types')->insert(['name' => 'Medicare Part B (Medical)']);
        DB::table('insurance_types')->insert(['name' => 'Medicare Part C (Advantage)']);
        DB::table('insurance_types')->insert(['name' => 'Medicare Part D (Perscription)']);
        DB::table('insurance_types')->insert(['name' => "Medicaid', 'Veteran's Administration (VA)"]);
        DB::table('insurance_types')->insert(['name' => 'Indian Health Services (IHS)']);
        DB::table('insurance_types')->insert(['name' => 'Qualified Health Plan (Marketplace)']);
        DB::table('insurance_types')->insert(['name' => 'COBRA']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_types');
    }
};
