<?php

namespace Database\Seeders\Development;

use App\Models\Agency;
use App\Models\Lookups\UsersLookup;
use Illuminate\Database\Seeder;

class AgenciesSeeder extends Seeder
{
    public function run()
    {
        collect()->times(10, function ($index) {
            Agency::create([
                'name' => 'Agency'.$index,
                'created_by_id' => UsersLookup::SYSTEMACCOUNT,
            ]);
        });
    }
}
