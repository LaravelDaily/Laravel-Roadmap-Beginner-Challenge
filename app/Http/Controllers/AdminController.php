<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashnoard');
    }

    public function login(){
        return view('admin.login');
    }

    public function connextion(Request $request){

      $check = $request->all();

      if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return to_route('home');
      }

      return to_route('admin.login');

    }


    public function logout(){

        Auth::guard('admin')->logout();
        return to_route('home');

    }
}
