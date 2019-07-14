<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon;
class LoginController extends Controller
{
    
    public function login(Request $request){
    
         $this->validate($request, [
          'username'=>'required|max:16',
          'password'=>'required',],
          $messages = [
          'username.required' => 'Username Tidak Boleh Kosong!',       
          'password.required' => 'Password Tidak Boleh Kosong!',
          ]);
        $username = $request->username;
        $password = $request->password;
         if($update = User::where('username',  $username)->where('password',  $password)->where('aktif',  1)->exists()){
          $update = User::where('username',  $username)->where('password',  $password)->where('aktif',  1)->firstOrFail();
           session(['username_login' => $username,'password_login' => $password ]);
           $update->lastlogin =  Carbon::now();
           $update->save();

           return redirect('/home');
         }else{
           return redirect('/')->with(['failed' => 'Username dan Password Salah!']);
         }
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
    }

    
}
