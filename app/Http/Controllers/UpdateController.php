<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UpdateController extends Controller
{
    public function putCustomer(Request $putCustomer,$id){
        $responseCustomer = Http::put('http://127.0.0.1:8000/api/customer/'.$id,
        ['name'=> $putCustomer->name, 'email'=>$putCustomer->email,
        'phone'=> $putCustomer->phone, 'website'=>$putCustomer->website, 'user_id' => 10]);
        return redirect()->back();
        
    }

    public function putUser(Request $putUser,$id){
        $responseUser = Http::put('http://127.0.0.1:8000/api/user/'.$id,
        ['name'=> $putUser->name,'email'=>$putUser->email,
        'cpf_cnpj'=>$putUser->cpf_cnpj, 'role'=>$putUser->role]);
        return redirect()->back();
    }
}
