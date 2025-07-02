<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;  // Make sure your User model namespace is correct

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => 'Inspector',
            'email' => 'inspector@windfarm.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
