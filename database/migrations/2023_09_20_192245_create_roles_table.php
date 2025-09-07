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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('roles')->insert(['name' => 'Super User']);
        DB::table('roles')->insert(['name' => 'Administrator']);
        DB::table('roles')->insert(['name' => 'Applicant']);
        DB::table('roles')->insert(['name' => 'Reviewer']);
        DB::table('roles')->insert(['name' => 'Case Manager']);
        DB::table('roles')->insert(['name' => 'Legal Representative']);
        DB::table('roles')->insert(['name' => 'Read Only']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
