<?php

namespace App\Http\Actions\PropertyManagement;

use App\Models\PropertyType;

class PropertyTypeStoreAction
{
    public function execute(array $data)
    {
        try {
            PropertyType::create([
                'property_type' => $data['property_type'],
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
