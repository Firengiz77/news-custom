<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NovaNewAuthController extends \Laravel\Nova\Http\Controllers\LoginController
{
    public function authLogin(Request $request)
    {
//        dd($request);
        $a = User::where('email', $request->email)->where('admin_active', 1)->first();
        if (!$a) {
            return redirect()->back()->withErrors(['auth_fail' => "Email is incorrect"]);
        }
        return $this->login($request);
    }
}
