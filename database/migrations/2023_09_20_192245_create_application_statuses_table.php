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
        Schema::create('application_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        DB::table('application_statuses')->insert(['name' => 'In Progress']);
        DB::table('application_statuses')->insert(['name' => 'Submitted']);
        DB::table('application_statuses')->insert(['name' => 'Approved']);
        DB::table('application_statuses')->insert(['name' => 'Denied']);
        DB::table('application_statuses')->insert(['name' => 'Modification Required']);
        DB::table('application_statuses')->insert(['name' => 'Modification Submitted']);
        DB::table('application_statuses')->insert(['name' => 'Archived']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_statuses');
    }
};
