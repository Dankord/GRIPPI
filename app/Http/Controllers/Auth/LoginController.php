<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        $email = Str::lower(trim($credentials['email']));

        // Use the email + IP (the stuff I used during the web dev security feature) to limit repeated request login attempt
        $key = $email . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'email' => 'Too many login attempts, please try again later.',
            ]);
        }
        // find user, including soft-deleted ones
        $user = User::withTrashed()->where('email', $email)->first();

        if (
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
        // clear failed attempts after successful login
        RateLimiter::clear($key);

        $request->session()->regenerate();

        return  $this->redirectByRole($user);
    }

    private function redirectByRole(User $user): RedirectResponse
    {
        return match ($user->role) {
            'officer' => redirect()->route('officer.dashboard'),
            'sub_encoder', 'main_encoder' => redirect()->route('encoder.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'super_admin' => redirect()->route('super_admin.dashboard'),

            default => abort(403)
        };
    }
}
