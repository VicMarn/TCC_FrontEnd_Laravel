<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UpdateController extends Controller
{
    public function putCustomer(Request $putCustomer,$id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 2){
            $url = 'company';
        }
        $responseCustomer = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->put('http://127.0.0.1:8000/api/'.$url.'/customer/'.$id,
        ['name'=> $putCustomer->name, 'email'=>$putCustomer->email,
        'phone'=> $putCustomer->phone, 'website'=>$putCustomer->website, 'user_id' => session()->get('user_id')]);
        return redirect()->back();
        
    }

    public function putUser(Request $putUser,$id){
        $token = session()->get('btoken');
        $responseUser = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->put('http://127.0.0.1:8000/api/company/user/'.$id,
        ['name'=> $putUser->name,'email'=>$putUser->email,
        'cpf_cnpj'=>$putUser->cpf_cnpj, 'role'=>$putUser->role]);
        return redirect()->back();
    }
}
