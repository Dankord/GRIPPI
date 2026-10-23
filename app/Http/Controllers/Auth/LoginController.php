<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\User;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $$credentials = $request->validate([
            'personnel_number' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string']
        ]);

        $personnelNumber = trim('personnel_number');

        // Use the personel number + IP (the stuff I used during the web dev security feature) to limit repeated request login attempt
        $key = Str::lower($personnelNumber).'|'.$request->id();

        if(RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'personnel_number' => 'Too many login attempts, Please try again later.',
            ]);
        }

        $user = User::withTrashed()->where('personnel_number', $personnelNumber)->first();

        if(
            ! $user ||
            ! $user->canAccess() ||
            ! Auth::atempt([
                'personnel_number' => $personnelNumber,
                'password' => $credentials['password']
            ])
        ) {
            RateLimiter::hit($key, 60);
            throw ValidationException::withMessages([
                'personnel_number' => 'The provided credentials are incorrect',
            ]);
        }

        RateLimiter::clear($key);
        $requestsession()->regenerate();
        return  redirect()->intended('/dashboard');
    }
}
