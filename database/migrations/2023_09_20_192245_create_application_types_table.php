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
        Schema::create('application_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        DB::table('application_types')->insert(['name' => 'New Application']);
        DB::table('application_types')->insert(['name' => 'Six Month Application']);
        DB::table('application_types')->insert(['name' => 'Annual Renewal Application']);
        DB::table('application_types')->insert(['name' => 'Application Updates']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_types');
    }
};
