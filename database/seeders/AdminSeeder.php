<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'id' => 1,
            'name' => "Administrator",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 1,
        ]);
    }
}
