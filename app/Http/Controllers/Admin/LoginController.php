<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password', 'type_user', 'work_location');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            switch (Auth::user()->type_user) {
                case 'Administrador':
                    return redirect()->route('admin.dashboard');
                case 'Farmaceutico':
                    return redirect()->route('farmaceutico.dashboard');
                default:
                    return redirect()->route('medico.dashboard');
            }
        }
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem com nossos registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
