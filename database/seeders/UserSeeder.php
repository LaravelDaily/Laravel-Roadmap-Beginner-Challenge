<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => env('DEFAULT_USER_NAME'),
            'email' => env('DEFAULT_USER_EMAIL'),
            'password' => Hash::make(env('DEFAULT_USER_PASSWORD'))
        ]);
    }
}