<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function formLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->hasRole('Administrador')) {
                return redirect()->route('drivers.index');
            }elseif ($user->hasRole('Cliente')) {
                return redirect()->route('customers.profile');
            }
            
        }

        return redirect()->back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
