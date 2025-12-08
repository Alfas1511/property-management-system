<?php

namespace App\Http\Controllers\Admin\PropertyManagement;

use App\currentLoggedUserTrait;
use App\Http\Actions\PropertyManagement\OptionTypeStoreAction;
use App\Http\Actions\PropertyManagement\OptionTypeUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyManagement\OptionTypeStoreRequest;
use App\Http\Requests\Admin\PropertyManagement\OptionTypeUpdateRequest;
use App\Models\OptionType;

class OptionTypeController extends Controller
{
    use currentLoggedUserTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $optionTypes = OptionType::get();
        return view('admin.property_management.option_type.index', compact('optionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property_management.option_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionTypeStoreRequest $request, OptionTypeStoreAction $action)
    {
        try {
            $response = $action->execute($request->validated());

            if (!$response) {
                return redirect()->route('option-type.create')->with("error", "Something went wrong");
            }
            return redirect()->route('option-type.index')->with("success", "Option Type Created successfully");
        } catch (\Throwable $th) {
            return redirect()->route('option-type.create')->with("error", "Something went wrong");
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
    public function update(OptionTypeUpdateRequest $request, OptionTypeUpdateAction $action, OptionType $optionType)
    {
        try {
            $response = $action->execute($request->validated(), $optionType);

            if (!$response) {
                return redirect()->route('option-type.index')
                    ->with("error", "Something went wrong");
            }

            return redirect()->route('option-type.index')
                ->with("success", "Option Type Updated successfully");
        } catch (\Throwable $th) {
            return redirect()->route('option-type.index')
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
