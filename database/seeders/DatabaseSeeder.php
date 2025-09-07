<?php

namespace Database\Seeders;

use Database\Seeders\Development\AgenciesSeeder;
use Database\Seeders\Development\DevUsersTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // development seeds
        if (App::environment(['testing', 'local', 'dev'])) {
            $this->call(DevUsersTableSeeder::class);
            $this->call(AgenciesSeeder::class);
        }
    }
}
