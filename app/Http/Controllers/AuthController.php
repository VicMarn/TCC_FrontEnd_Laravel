<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    
    

    public function login(Request $loginInfo){
        $loginCheck = Http::post('http://127.0.0.1:8000/api/login',[
           'email' => $loginInfo->email, 'password' => $loginInfo->password 
        ]);
        $user_id = $loginCheck->object()->user->id;
        $token = $loginCheck->object()->token;
        $role = $loginCheck->object()->user->role;
        session()->put('user_id',$user_id);
        session()->put('btoken',$token);
        session()->put('role',$role);
        return redirect('/');
    }

    public function logout(){
        $token = session()->get('btoken');
        $logoutResponse = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/logout');
        session()->flush();
        return redirect('/login');
    }
    /*
    public function setCookie(){
        $resp = new Response("resp");
        $resp->withCookie(cookie()->forever('btoken',$GLOBALS['token']));
        return $resp;

    }

    public function getCookie(Request $request){
        $value = $request->cookie('btoken');
        return $value;
    }
    */
}
