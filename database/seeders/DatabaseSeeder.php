<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
