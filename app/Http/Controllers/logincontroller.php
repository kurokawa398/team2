<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
    public function login(Request $request){

        return view('auth/login');
    }

    public function logout(Request $request)
    {

        return 
        redirect('/');
    }
}
