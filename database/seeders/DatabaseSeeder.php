<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Note we need the Roles created first
        // so when the Users are created we can assign Roles to them
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
