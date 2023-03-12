<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'silahkan isi email anda !',
                'password.required' => 'silahkan isi password anda !',
            ]
        );

        $credential_email = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        $credential_username = [
            'name' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credential_email) || Auth::attempt($credential_username)) {
            return redirect('/merek');
        } else {
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'username' => 'required|unique:users,name',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ],
            [
                'email.unique' => 'email telah terdaftar',
                'username.unique' => 'username telah terdaftar',
                'confirm_password.same' => 'konfirmasi password salah'
            ]
        );

        User::create([
            'email' => $request->email,
            'name' => $request->username,
            'password' => Hash::make($request->confirm_password)
        ]);

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
