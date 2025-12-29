<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
 
    public function showLoginForm()
    {
        return view('pages.login');
    }
public function login(Request $request)
{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (!Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                return back()->withErrors([
                    'email' => 'Email ou mot de passe incorrect',
                ])->withInput();
            }

            $user = auth()->user();

            if (!$user->role) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Aucun rôle associé à ce compte',
                ]);
            }

            switch ($user->role->nom_role) {
    case 'admin':
        return redirect()->route('tab_bord_admin');
    case 'vendeur':
        return redirect()->route('tab_bord_vend');
    case 'acheteur':
        return redirect()->route('tab_bord_ach');
    default:
        Auth::logout();
        return redirect()->route('login')->withErrors(['email' => 'Rôle non reconnu']);
}


        }


}
