<?php

namespace App\Http\Controllers\Admin\PropertyManagement;

use App\currentLoggedUserTrait;
use App\Http\Actions\PropertyManagement\PropertyStoreAction;
use App\Http\Actions\PropertyManagement\PropertyUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyManagement\PropertyStoreRequest;
use App\Http\Requests\Admin\PropertyManagement\PropertyUpdateRequest;
use App\Models\OptionType;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    use currentLoggedUserTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::get();
        return view('admin.property_management.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propertyTypes = PropertyType::where('status', 'Active')->get();
        $optionTypes = OptionType::where('status', 'Active')->get();
        return view('admin.property_management.property.create', compact('propertyTypes', 'optionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyStoreRequest $request, PropertyStoreAction $action)
    {
        try {
            $response = $action->execute($request->validated());

            if (!$response) {
                return redirect()->route('property.create')->with("error", "Something went wrong");
            }
            return redirect()->route('property.index')->with("success", "Property Created successfully");
        } catch (\Throwable $th) {
            return redirect()->route('property.create')->with("error", "Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $property->load(['propertyType', 'optionType', 'propertyImages']);
        return view('admin.property_management.property.view', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $property->load(['propertyType', 'optionType', 'propertyImages']);
        $propertyTypes = PropertyType::where('status', 'Active')->get();
        $optionTypes = OptionType::where('status', 'Active')->get();
        return view('admin.property_management.property.edit', compact('property', 'propertyTypes', 'optionTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyUpdateRequest $request, PropertyUpdateAction $action, Property $property)
    {
        try {
            $response = $action->execute($request->validated(), $property);

            if (!$response) {
                return redirect()->route('property.edit', $property->id)->with("error", "Something went wrong");
            }
            return redirect()->route('property.index')->with("success", "Property Updated successfully");
        } catch (\Throwable $th) {
            return redirect()->route('property.edit', $property->id)->with("error", "Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deleteImage($id)
    {
        $image = PropertyImage::find($id);

        if (!$image) {
            return response()->json(['status' => false, 'message' => 'Image not found'], 404);
        }

        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->delete();

        return response()->json(['status' => true, 'message' => 'Image deleted successfully']);
    }
}
