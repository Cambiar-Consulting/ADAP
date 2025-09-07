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
        Schema::create('ethnicities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('ethnicities')->insert(['name' => 'Non-Hispanic']);
        DB::table('ethnicities')->insert(['name' => 'Mexican, Mexican American, Chicano(a)']);
        DB::table('ethnicities')->insert(['name' => 'Puerto Rican']);
        DB::table('ethnicities')->insert(['name' => 'Cuban']);
        DB::table('ethnicities')->insert(['name' => 'Other Hispanic/Latino(a) or Spanish Origin']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ethnicities');
    }
};
