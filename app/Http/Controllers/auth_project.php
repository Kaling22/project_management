<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use \Auth;
use App\Models\User;
use Session;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Hash;

class auth_project extends Controller
{
    public function actionlogin(Request $request)
    {
        $data = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('dataProject');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function daftar()
    {
        return view('register.register');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request['password']),
        ]);

        Session::flash('message', 'Register Berhasil');
        return redirect('/');
    }
}
