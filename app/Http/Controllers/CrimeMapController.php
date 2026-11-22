<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrimeMapController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // uses only one index, return different crime maps base on the role
        $view = match ($user->role) {
            'officer' => 'officer.crime-map',
            'sub_encoder', 'main_encoder' => 'encoder.crime-map',
            'admin' => 'admin.crime-map',
            default => abort(403),
        };

        return view($view);
        // return view('officer.crime-map');
    }
}
