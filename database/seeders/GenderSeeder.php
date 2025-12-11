<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::insert([
            [
                'id' => 1,
                'gender' => "Male",
            ],
            [
                'id' => 2,
                'gender' => "Female",
            ],
            [
                'id' => 3,
                'gender' => "Not Identified",
            ],
            [
                'id' => 4,
                'gender' => "Prefer Not to say",
            ],
            [
                'id' => 5,
                'gender' => "Others",
            ],
        ]);
    }
}
