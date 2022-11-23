<?php

namespace App\Http\Controllers;

use App\Models\LandProperty;
use App\Models\LandUnit;
use App\Models\User;
use Illuminate\Http\Request;

class LandUnitController extends Controller
{
    //Show land property units
    public function index(int $id)
    {
        $units = LandUnit::where('land_property_id', $id)->orderBy('total_area(ha)', 'desc')->get();

        $property = LandProperty::where('id', $id)->first();

        return view('properties/property-units', [
            'units' => $units,
            'property' => $property
        ]);
    }

    // Show land unit create form
    public function create(int $id)
    {
        return view('properties/property-unit-create', [
            'property' => LandProperty::where('id', $id)->first()
        ]);
    }

    // Store new land unit
    public function store(Request $request)
    {
        $property = LandProperty::where(['cadastral_nr' => $request->property_cadastral_nr])
            ->first();

        $unit = LandUnit::where('cadastral_nr', $request->cadastral_nr)->first();

        if (!$unit) {
            $data = $request->validate([
                'cadastral_nr' => ['digits:11', 'required', 'numeric'],
                'total_area(ha)' => 'required',
                'land_usage_id' => 'required',
                'measurement_date' => 'required',
                'property_cadastral_nr' => 'exists:land_properties,cadastral_nr'
            ]);

            $data['land_property_id'] = $property->id;

            LandUnit::create($data);

            return redirect()->action([LandUnitController::class, 'index'], [$property])
                ->with(['message' => 'Land unit created successfully!']);
        } else {
            return back()->with(['message' => 'Land unit already exists!']);
        }
    }

    // Show land unit edit form
    public function edit(LandProperty $property, int $id)
    {
        $unit = LandUnit::where('id', $id)->first();

        return view('properties/unit-edit', [
            'unit' => $unit,
            'property' => $property
        ]);
    }

    // Update land unit
    public function update(Request $request)
    {
        $property = LandProperty::where(['cadastral_nr' => $request->property_cadastral_nr])
            ->first();

        $unit = LandUnit::where('cadastral_nr', $request->cadastral_nr)->first();

        if ($unit) {
            $data = $request->validate([
                'cadastral_nr' => ['digits:11', 'required', 'numeric'],
                'total_area(ha)' => 'required',
                'land_usage_id' => 'required',
                'measurement_date' => 'required',
                'property_cadastral_nr' => 'exists:land_properties,cadastral_nr'
            ]);

            $data['land_property_id'] = $property->id;

            $unit->update($data);

            return redirect()->action([LandUnitController::class, 'index'], [$property])
                ->with(['message' => 'Land unit updated successfully!']);
        } else {
            return back()->with(['message' => 'Invalid land unit cadastral number!']);
        }
    }

    // Delete land unit
    public function destroy(Request $request)
    {
        $path = $request->path();

        $id = substr($path, strrpos($path, '/') + 1);

        $unit = LandUnit::find($id);

        $unit->delete();

        return back()->with('message', 'Land unit deleted successfully!');
    }

    // Show land units without usage
    public function showLandUnitsWithoutUsage(int $id)
    {
        $units = LandUnit::where('land_property_id', $id)->orderBy('total_area(ha)', 'desc')->get();

        $property = LandProperty::where('id', $id)->first();

        $unitsWithoutUsage = [];

        foreach ($units as $unit) {
            if ($unit->land_usage_id == 0) {
                $unitsWithoutUsage [] = $unit;
            }
        }

        return view('properties/units-without-usage', [
            'units' => $unitsWithoutUsage,
            'property' => $property
        ]);
    }
}
