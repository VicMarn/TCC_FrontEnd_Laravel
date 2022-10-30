<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function addCustomer(Request $newCustomer){
        $responseCustomer = Http::post('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/addCustomer',
        ['name'=> $newCustomer->name, 'email'=> $newCustomer->email,
         'phone'=> $newCustomer->phone, 'website'=> $newCustomer->website, 'user_id'=> 10]);
        return redirect()->back()->with('msg','Cliente adicionado com sucesso');
    }

    public function addUser(Request $newUser){
        $responseUser = Http::post('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/addUser',
        ['name'=> $newUser->name,'email'=>$newUser->email,
        'cpf_cpnj'=>$newUser->cpf_cnpj,'role'=>$newUser->role,'password'=>$newUser->password]);
        return redirect()->back()->with('msg','Usuário adicionado com sucesso');
    }
}
