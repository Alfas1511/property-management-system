<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BloodGroup::insert([
            ['id' => 1, 'blood_group' => 'A+'],
            ['id' => 2, 'blood_group' => 'A-'],
            ['id' => 3, 'blood_group' => 'B+'],
            ['id' => 4, 'blood_group' => 'B-'],
            ['id' => 5, 'blood_group' => 'O+'],
            ['id' => 6, 'blood_group' => 'O-'],
            ['id' => 7, 'blood_group' => 'AB+'],
            ['id' => 8, 'blood_group' => 'AB-'],
            ['id' => 9, 'blood_group' => 'Others'],
        ]);
    }
}
