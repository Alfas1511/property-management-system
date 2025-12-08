<?php

namespace App\Http\Actions\PropertyManagement;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;

class PropertyStoreAction
{
    public function execute(array $data)
    {   dd(13);
        try {
            DB::beginTransaction();
            $property = new Property();
            $property->property_title = $data['property_title'] ?? "";
            $property->property_description = $data['property_description'] ?? "";
            $property->property_address = $data['property_address'] ?? "";
            $property->property_area = $data['property_area'] ?? "";
            $property->rate = $data['property_rate'] ?? "";
            $property->property_type_id = $data['property_type'] ?? "";
            $property->option_type_id = $data['option_type'] ?? "";
            $property->save();

            if ($data['property_images']) {

                foreach ($data['property_images'] as $image) {

                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalName();
                    $imagePath = $image->storeAs('property_images', $imageName, 'public');

                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image_name' => $imageName,
                        'image_path' => 'storage/' . $imagePath,
                    ]);
                }
            }

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            info($th);
            DB::rollBack();
            return false;
        }
    }
}
