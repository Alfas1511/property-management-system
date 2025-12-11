<?php

namespace Database\Seeders;

use App\Models\AddressType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AddressType::insert([
            ['id' => 1, 'address_type' => 'Residential Address'],
            ['id' => 2, 'address_type' => 'Permanent Address'],
            ['id' => 3, 'address_type' => 'Office Address'],
        ]);
    }
}
