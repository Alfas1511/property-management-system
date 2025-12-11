<?php

namespace App\Http\Controllers\Admin\StateAndDistrict;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class StateAndDistrictController extends Controller
{
    public function getStates()
    {
        $states = State::get();
        return $states;
    }

    public function getDistricts(Request $request)
    {
        $districts = District::when('state_id', $request->state_id)->get();
        return $districts;
    }
}
