<?php

namespace App\Http\Actions\PropertyManagement;

use App\Models\PropertyType;
use Illuminate\Support\Collection;

class PropertyTypeUpdateAction
{
    public function execute(array $data, PropertyType $propertyType)
    {
        try {
            $propertyType->update([
                'property_type' => $data['property_type'],
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
