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
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        DB::table('marital_statuses')->insert(['name' => 'Single']);
        DB::table('marital_statuses')->insert(['name' => 'Married, Living Together with Spouse']);
        DB::table('marital_statuses')->insert(['name' => 'Married, Living Apart with Spouse']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marital_statuses');
    }
};
