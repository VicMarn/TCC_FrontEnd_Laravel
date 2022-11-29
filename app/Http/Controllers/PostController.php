<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function addCustomer(Request $newCustomer){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 2){
            $url = 'company';
        }
        $responseCustomer = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/'.$url.'/customer',
        ['name'=> $newCustomer->name, 'email'=> $newCustomer->email,
         'phone'=> $newCustomer->phone, 'website'=> $newCustomer->website, 'user_id'=> session()->get('user_id')]);
        return redirect()->back()->with('msg','Cliente adicionado com sucesso');
    }

    public function addUser(Request $newUser){
        $token = session()->get('btoken');
        $responseUser = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/company/user',
        ['name'=> $newUser->name,'email'=>$newUser->email,
        'cpf_cnpj'=>$newUser->cpf_cnpj,'role'=>$newUser->role,'password'=>bcrypt($newUser->password),'created_by'=> session()->get('user_id')]);
        return redirect()->back()->with('msg','Usuário adicionado com sucesso');
    }

    public function addInspection(Request $newInspection){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 3){
            $url = 'employee';
        }
        $responseInspection = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/'.$url.'/inspection',
        ['title'=>$newInspection->title,'description'=>$newInspection->description,
        'start_date'=>date("y-m-d"), 'is_finished'=>0,
        'customer_id'=>$newInspection->customer,'user_id'=>session()->get('user_id')]);
        return redirect()->back();
    }
    /*Tirar o end_date depois, o end_date será nullable e será preenchido no backend
     no final da inspeção. O user_id também será removido posteriormente, pois será preenchido
     automaticamente*/

     public function addExtinguisher(Request $newExtinguisher,$id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 3){
            $url = 'employee';
        }
        $responseExtinguisher = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/'.$url.'/extinguisher',[
        'name'=>$newExtinguisher->name,'type'=>$newExtinguisher->type,'weight'=>$newExtinguisher->weight,
        'inspection_seal_url_photo'=>$newExtinguisher->inspection_seal_url_photo,
        'extinguisher_url_photo'=>$newExtinguisher->extinguisher_url_photo,
        'description'=>$newExtinguisher->description,'is_approved'=>$newExtinguisher->is_approved,'inspection_id'=>$id]);
        return redirect()->back();
     }


     public function finish($id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 2){
            $url = 'company';
        }
        else if($role == 3){
            $url = 'employee';
        }
        $responseFinish = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/'.$url.'/inspection/'.$id.'/finish');
        return redirect()->back();
     }

     public function unfinish($id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 2){
            $url = 'company';
        }
        else if($role == 3){
            $url = 'employee';
        }
        $responseUnfinish = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->post('http://127.0.0.1:8000/api/'.$url.'/inspection/'.$id.'/unfinished');
        return redirect()->back();
     }
}
