<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;

class AuthService
{
    public function login(string $guard = 'web', array $credentials = [], bool $remeber = false): RedirectResponse
    {
        if (auth()->guard($guard)->attempt($credentials, $remeber)) {
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('danger', 'Email or Password incorrect');
    }
}
