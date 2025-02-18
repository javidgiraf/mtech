<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'mtech@admin.com',
            'remember_token' => Str::random(10),
            'password' => Hash::make('mtech@123#')
        ]);

        $user->assignRole('Super Admin');
    }
}
