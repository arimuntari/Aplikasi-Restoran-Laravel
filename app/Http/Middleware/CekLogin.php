<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\User;
class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if(Session::has('username_login')){
            $data = Session::all();
            //var_dump($data);
            if(User::where('username',  $data['username_login'])->where('password',  $data['password_login'])->where('aktif',  1)->exists()){
                return $next($request);
            }else{
              return redirect('/')->with(['failed' => 'Silahkan Login Terlebih dahulu!']);
            }       
        }
        return redirect('/')->with(['failed' => 'Silahkan Login Terlebih dahulu!']);
       // return $next($request);
    }
}