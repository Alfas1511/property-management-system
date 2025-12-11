<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Symfony\Component\Clock\now;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert(
            [
                [
                    'id' => 1,
                    'name' => 'Admin',
                    'created_at' => now()
                ],
                [
                    'id' => 2,
                    'name' => 'Vendor',
                    'created_at' => now()
                ],
                [
                    'id' => 3,
                    'name' => 'User',
                    'created_at' => now()
                ]
            ]
        );
    }
}
