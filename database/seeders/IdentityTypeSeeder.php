<?php

namespace Database\Seeders;

use App\Models\IdentityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IdentityType::insert([
            [
                'id' => 1,
                'identity_type' => 'Aadhaar',
            ],
            [
                'id' => 2,
                'identity_type' => 'PAN',
            ],
            [
                'id' => 3,
                'identity_type' => 'Driving License',
            ],
            [
                'id' => 4,
                'identity_type' => 'Voter\'s ID',
            ],
            [
                'id' => 5,
                'identity_type' => 'Passport',
            ],
        ]);
    }
}
