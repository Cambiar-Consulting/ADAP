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
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('genders')->insert(['name' => 'Woman']);
        DB::table('genders')->insert(['name' => 'Man']);
        DB::table('genders')->insert(['name' => 'Transgender']);
        DB::table('genders')->insert(['name' => 'Non-binary']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genders');
    }
};
