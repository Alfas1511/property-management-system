<?php

namespace App\Http\Actions\PropertyManagement;

use App\ActivityLogTrait;
use App\currentLoggedUserTrait;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PropertyStoreAction
{
    use ActivityLogTrait, currentLoggedUserTrait;

    public function execute(array $data)
    {
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
            $property->created_by = "";
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

            $this->createActivityLog('Property Created', "Property '" . $property->property_title . "' is created by ");

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            info($th);
            DB::rollBack();
            return false;
        }
    }
}
