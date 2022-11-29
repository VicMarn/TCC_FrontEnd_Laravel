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
        if($loginCheck->status() == 401){
            return redirect()->back()->with('authErrorMsg','Credenciais incorretas');
        }
        $user_id = $loginCheck->object()->user->id;
        $token = $loginCheck->object()->token;
        $role = $loginCheck->object()->user->role;
        $user_name = $loginCheck->object()->user->name;
        session()->put('user_id',$user_id);
        session()->put('btoken',$token);
        session()->put('role',$role);
        session()->put('user_name',$user_name);
        return redirect('/menu');
    }

    public function logout(){
        $token = session()->get('btoken');
        $logoutResponse = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/logout');
        session()->flush();
        return redirect('/');
    }

    public function register(Request $registerInfo){
        $registerResponse = Http::post('http://127.0.0.1:8000/api/register',['name'=>$registerInfo->name,
        'email'=>$registerInfo->email,'password'=>$registerInfo->password,'cpf_cnpj'=> $registerInfo->cpf_cnpj,
        'email_confirmation'=>$registerInfo->email_confirmation,'password_confirmation'=>$registerInfo->password_confirmation]);
        if($registerResponse->status() == 201){
            $user_id = $registerResponse->object()->user->id;
            $token = $registerResponse->object()->token;
            //$role = $registerResponse->object()->user->role;
            $user_name = $registerResponse->object()->user->name;
            session()->put('user_id',$user_id);
            session()->put('btoken',$token);
            //session()->put('role',$role);
            session()->put('user_name',$user_name);
            return redirect('/menu');

        }
        else{
            return redirect()->back()->with('registerErrorMsg','Erro de preenchimento de formulário');
        }
        
    }
   
}
