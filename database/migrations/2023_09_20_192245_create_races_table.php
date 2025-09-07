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
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('races')->insert(['name' => 'White']);
        DB::table('races')->insert(['name' => 'Black/African America']);
        DB::table('races')->insert(['name' => 'NativeAmerican/Alaskan']);
        DB::table('races')->insert(['name' => 'Asian Indian']);
        DB::table('races')->insert(['name' => 'Chinese']);
        DB::table('races')->insert(['name' => 'Filipino']);
        DB::table('races')->insert(['name' => 'Japanese']);
        DB::table('races')->insert(['name' => 'Korean']);
        DB::table('races')->insert(['name' => 'Vietnamese']);
        DB::table('races')->insert(['name' => 'Other Asian']);
        DB::table('races')->insert(['name' => 'Native Hawaiian']);
        DB::table('races')->insert(['name' => 'Guamanian or Chamorro']);
        DB::table('races')->insert(['name' => 'Samoan']);
        DB::table('races')->insert(['name' => 'Other Pacific Islander']);
        DB::table('races')->insert(['name' => 'More Than One Race']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
};
