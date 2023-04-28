<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => "Username tidak boleh kosong!",
            'password.required' => "Password tidak boleh kosong!",
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];


        if (Auth::attempt($data)) {
            return redirect('dashboard');
        }
        else{
            Session::flash('error', 'Username atau Password salah!');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
