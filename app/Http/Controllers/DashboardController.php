<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function officer(): View
    {
        return view('officer.dashboard');
    }
    public function encoder(): View
    {
        return view('encoder.dashboard');
    }
    public function admin(): View
    {
        return view('admin.dashboard');
    }
    public function superAdmin(): View
    {
        return view('super-admin.dashboard');
    }
}
