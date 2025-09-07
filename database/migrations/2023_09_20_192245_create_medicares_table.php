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
        Schema::create('medicares', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        DB::table('medicares')->insert(['name' => 'A: Hospitalization']);
        DB::table('medicares')->insert(['name' => 'B: Primary Care']);
        DB::table('medicares')->insert(['name' => 'C: Medicare Advantage Plan']);
        DB::table('medicares')->insert(['name' => 'D: Prescription Drug']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicares');
    }
};
