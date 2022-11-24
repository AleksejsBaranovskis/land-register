<?php

namespace App\Http\Controllers;

use App\Models\LandProperty;
use App\Models\LandUnit;
use App\Models\User;
use Illuminate\Http\Request;

class LandRegisterController extends Controller
{
    // Show summary
    public function index()
    {
        return view('land-register', [
            'users' => User::all()
        ]);
    }
}
