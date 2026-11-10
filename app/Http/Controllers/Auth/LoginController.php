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
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        $email = trim($credentials['email']);

        // Use the email + IP (the stuff I used during the web dev security feature) to limit repeated request login attempt
        $key = Str::lower($email).'|'.$request->ip();

        if(RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'email' => 'Too many login attempts, Please try again later.',
            ]);
        }

        $user = User::withTrashed()->where('email', $email)->first();

        if(
            ! $user ||
            ! $user->canAccess() ||
            
            ! Auth::attempt([
                'email' => $email,
                'password' => $credentials['password']
            ])
        ) {
            RateLimiter::hit($key, 60);
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect',
            ]);
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();
        return  redirect()->intended('/dashboard');
    }
}
