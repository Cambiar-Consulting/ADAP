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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('states')->insert(['abbreviation' => 'OK', 'name' => 'Oklahoma']);
        DB::table('states')->insert(['abbreviation' => 'OH', 'name' => 'Ohio']);
        DB::table('states')->insert(['abbreviation' => 'MP', 'name' => 'Northern Mariana Islands']);
        DB::table('states')->insert(['abbreviation' => 'ND', 'name' => 'North Dakota']);
        DB::table('states')->insert(['abbreviation' => 'NC', 'name' => 'North Carolina']);
        DB::table('states')->insert(['abbreviation' => 'NV', 'name' => 'Nevada']);
        DB::table('states')->insert(['abbreviation' => 'NM', 'name' => 'New Mexico']);
        DB::table('states')->insert(['abbreviation' => 'NJ', 'name' => 'New Jersey']);
        DB::table('states')->insert(['abbreviation' => 'NH', 'name' => 'New Hampshire']);
        DB::table('states')->insert(['abbreviation' => 'OR', 'name' => 'Oregon']);
        DB::table('states')->insert(['abbreviation' => 'NE', 'name' => 'Nebraska']);
        DB::table('states')->insert(['abbreviation' => 'NY', 'name' => 'New York']);
        DB::table('states')->insert(['abbreviation' => 'PW', 'name' => 'Palau']);
        DB::table('states')->insert(['abbreviation' => 'SC', 'name' => 'South Carolina']);
        DB::table('states')->insert(['abbreviation' => 'PR', 'name' => 'Puerto Rico']);
        DB::table('states')->insert(['abbreviation' => 'RI', 'name' => 'Rhode Island']);
        DB::table('states')->insert(['abbreviation' => 'MT', 'name' => 'Montana']);
        DB::table('states')->insert(['abbreviation' => 'SD', 'name' => 'South Dakota']);
        DB::table('states')->insert(['abbreviation' => 'TN', 'name' => 'Tennessee']);
        DB::table('states')->insert(['abbreviation' => 'TX', 'name' => 'Texas']);
        DB::table('states')->insert(['abbreviation' => 'UT', 'name' => 'Utah']);
        DB::table('states')->insert(['abbreviation' => 'VT', 'name' => 'Vermont']);
        DB::table('states')->insert(['abbreviation' => 'VI', 'name' => 'Virgin Islands']);
        DB::table('states')->insert(['abbreviation' => 'VA', 'name' => 'Virginia']);
        DB::table('states')->insert(['abbreviation' => 'WA', 'name' => 'Washington']);
        DB::table('states')->insert(['abbreviation' => 'WV', 'name' => 'West Virginia']);
        DB::table('states')->insert(['abbreviation' => 'PA', 'name' => 'Pennsylvania']);
        DB::table('states')->insert(['abbreviation' => 'MO', 'name' => 'Missouri']);
        DB::table('states')->insert(['abbreviation' => 'MD', 'name' => 'Maryland']);
        DB::table('states')->insert(['abbreviation' => 'MN', 'name' => 'Minnesota']);
        DB::table('states')->insert(['abbreviation' => 'AL', 'name' => 'Alabama']);
        DB::table('states')->insert(['abbreviation' => 'AK', 'name' => 'Alaska']);
        DB::table('states')->insert(['abbreviation' => 'AS', 'name' => 'American Samoa']);
        DB::table('states')->insert(['abbreviation' => 'AZ', 'name' => 'Arizona']);
        DB::table('states')->insert(['abbreviation' => 'AR', 'name' => 'Arkansas']);
        DB::table('states')->insert(['abbreviation' => 'CA', 'name' => 'California']);
        DB::table('states')->insert(['abbreviation' => 'CO', 'name' => 'Colorado']);
        DB::table('states')->insert(['abbreviation' => 'CT', 'name' => 'Connecticut']);
        DB::table('states')->insert(['abbreviation' => 'DE', 'name' => 'Delaware']);
        DB::table('states')->insert(['abbreviation' => 'DC', 'name' => 'District Of Columbia']);
        DB::table('states')->insert(['abbreviation' => 'FM', 'name' => 'Federated States Of Micronesia']);
        DB::table('states')->insert(['abbreviation' => 'FL', 'name' => 'Florida']);
        DB::table('states')->insert(['abbreviation' => 'GA', 'name' => 'Georgia']);
        DB::table('states')->insert(['abbreviation' => 'GU', 'name' => 'Guam']);
        DB::table('states')->insert(['abbreviation' => 'HI', 'name' => 'Hawaii']);
        DB::table('states')->insert(['abbreviation' => 'ID', 'name' => 'Idaho']);
        DB::table('states')->insert(['abbreviation' => 'IL', 'name' => 'Illinois']);
        DB::table('states')->insert(['abbreviation' => 'IN', 'name' => 'Indiana']);
        DB::table('states')->insert(['abbreviation' => 'IA', 'name' => 'Iowa']);
        DB::table('states')->insert(['abbreviation' => 'KS', 'name' => 'Kansas']);
        DB::table('states')->insert(['abbreviation' => 'KY', 'name' => 'Kentucky']);
        DB::table('states')->insert(['abbreviation' => 'LA', 'name' => 'Louisiana']);
        DB::table('states')->insert(['abbreviation' => 'ME', 'name' => 'Maine']);
        DB::table('states')->insert(['abbreviation' => 'MH', 'name' => 'Marshall Islands']);
        DB::table('states')->insert(['abbreviation' => 'WI', 'name' => 'Wisconsin']);
        DB::table('states')->insert(['abbreviation' => 'MA', 'name' => 'Massachusetts']);
        DB::table('states')->insert(['abbreviation' => 'MI', 'name' => 'Michigan']);
        DB::table('states')->insert(['abbreviation' => 'MS', 'name' => 'Mississippi']);
        DB::table('states')->insert(['abbreviation' => 'WY', 'name' => 'Wyoming']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};
