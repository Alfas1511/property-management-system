<?php

namespace App\Http\Controllers\Admin\PropertyManagement;

use App\currentLoggedUserTrait;
use App\Http\Actions\PropertyManagement\PropertyTypeStoreAction;
use App\Http\Actions\PropertyManagement\PropertyTypeUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyManagement\PropertyTypeStoreRequest;
use App\Http\Requests\Admin\PropertyManagement\PropertyTypeUpdateRequest;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    use currentLoggedUserTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propertyTypes = PropertyType::get();
        return view('admin.property_management.property_type.index', compact('propertyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property_management.property_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyTypeStoreRequest $request, PropertyTypeStoreAction $action)
    {
        try {
            $response = $action->execute($request->validated());

            if (!$response) {
                return redirect()->route('property-type.create')->with("error", "Something went wrong");
            }
            return redirect()->route('property-type.index')->with("success", "Property Type Created successfully");
        } catch (\Throwable $th) {
            return redirect()->route('property-type.create')->with("error", "Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyTypeUpdateRequest $request, PropertyTypeUpdateAction $action, PropertyType $propertyType)
    {
        try {
            $response = $action->execute($request->validated(), $propertyType);

            if (!$response) {
                return redirect()->route('property-type.index')
                    ->with("error", "Something went wrong");
            }

            return redirect()->route('property-type.index')
                ->with("success", "Property Type Updated successfully");
        } catch (\Throwable $th) {
            return redirect()->route('property-type.index')
                ->with("error", "Something went wrong");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
