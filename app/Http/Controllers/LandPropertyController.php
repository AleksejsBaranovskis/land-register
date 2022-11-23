<?php

namespace App\Http\Controllers;

use App\Models\LandProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class LandPropertyController extends Controller
{
    // Show all land properties
    public function index()
    {
        return view('properties/index', [
            'properties' => LandProperty::latest()->get()
        ]);
    }

    // Show create form
    public function create()
    {
        return view('properties/create');
    }

    // Store a new land property
    public function store(Request $request)
    {
        $user = User::where(['identification_nr/registration_nr' => $request['identification_nr/registration_nr']])
            ->first();

        $property = LandProperty::where('cadastral_nr', $request->cadastral_nr)->first();

        if(!$property) {
            $data = $request->validate([
                'name' => 'required',
                'cadastral_nr' => ['digits:11', 'required', 'numeric'],
                'status' => 'required',
                'identification_nr/registration_nr' => 'exists:users,identification_nr/registration_nr'
            ]);

            $data['user_id'] = $user->id;

            LandProperty::create($data);

            return redirect('/properties')->with(['message' => 'Land property created successfully!']);
        } else {
            return back()->with(['message' => 'Land property already exists!']);
        }
    }

    // Show land property edit form
    public function edit(LandProperty $property)
    {
        return view('properties/edit', [
            'property' => $property
        ]);
    }

    // Update land property
    public function update(Request $request, LandProperty $property)
    {
        $data = $request->validate([
            'name' => 'required',
            'cadastral_nr' => ['digits:11', 'required', 'numeric'],
            'status' => 'required',
            'identification_nr/registration_nr' => 'exists:users,identification_nr/registration_nr'
        ]);

        $property->update($data);

        return redirect('/properties')->with('message', 'Land property updated successfully!');
    }

    // Delete land property
    public function destroy(LandProperty $property)
    {
        $property->delete();

        return back()->with('message', 'Land property deleted successfully!');
    }

    // Show user's properties
    public function showUserProperties(int $id)
    {
        $properties = LandProperty::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();

        return view('properties/user-properties', [
            'properties' => $properties,
            'user' => $user
        ]);
    }

    // Show properties without land units
    public function showPropertiesWithoutUnits()
    {
        $properties = LandProperty::all();
        $propertiesWithoutUnits = [];
        foreach ($properties as $property) {
            if (count($property->landUnit) == 0) {
                $propertiesWithoutUnits [] = $property;
            }
        }

        return view('properties/properties-without-units', [
            'properties' => $propertiesWithoutUnits
        ]);
    }

    // Show user's property without units
    public function showUserPropertiesWithoutUnits(int $id)
    {
        $properties = LandProperty::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();
        $propertiesWithoutUnits = [];
        foreach ($properties as $property)
        {
            if (count($property->landUnit) == 0)
            {
                $propertiesWithoutUnits [] = $property;
            }
        }

        return view('properties/user-properties-without-units', [
            'properties' => $propertiesWithoutUnits,
            'user' => $user
        ]);
    }
}
