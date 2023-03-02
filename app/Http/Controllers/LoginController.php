<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function Register(Request $request)
    {
        $user = new User;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =Hash::make($request->password) ;
        $user->save();
        return redirect();
    }
    public function login(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // $password = Hash::make( $request->password);
        if (Auth::attempt($credentials)) {
            // dd('yay authed!');
            $request->session()->regenerate();

            return redirect('home');
        }
        else{
            dd('something wrong again!');
        }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }
}
