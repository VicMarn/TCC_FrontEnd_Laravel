<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function addCustomer(Request $newCustomer){
        $responseCustomer = Http::post('http://127.0.0.1:8000/api/customer',
        ['name'=> $newCustomer->name, 'email'=> $newCustomer->email,
         'phone'=> $newCustomer->phone, 'website'=> $newCustomer->website, 'user_id'=> 10]);
        return redirect()->back()->with('msg','Cliente adicionado com sucesso');
    }

    public function addUser(Request $newUser){
        $responseUser = Http::post('http://127.0.0.1:8000/api/user',
        ['name'=> $newUser->name,'email'=>$newUser->email,
        'cpf_cnpj'=>$newUser->cpf_cnpj,'role'=>$newUser->role,'password'=>$newUser->password]);
        return redirect()->back()->with('msg','Usuário adicionado com sucesso');
    }

    public function addInspection(Request $newInspection){
        $responseInspection = Http::post('http://127.0.0.1:8000/api/inspection',
        ['title'=>$newInspection->title,'description'=>$newInspection->description,
        'start_date'=>date("y-m-d"),'end_date'=>date("y-m-d"), 
        'is_finished'=>0,'customer_id'=>$newInspection->customer,'user_id'=>12]);
        return redirect()->back();
    }
    /*Tirar o end_date depois, o end_date será nullable e será preenchido no backend
     no final da inspeção. O user_id também será removido posteriormente, pois será preenchido
     automaticamente*/

     public function addExtinguisher(Request $newExtinguisher,$id){
        $responseExtinguisher = Http::post('http://127.0.0.1:8000/api/extinguisher',[
        'name'=>$newExtinguisher->name,'type'=>$newExtinguisher->type,'weight'=>$newExtinguisher->weight,
        'inspection_seal_url_photo'=>$newExtinguisher->inspection_seal_url_photo,
        'extinguisher_url_photo'=>$newExtinguisher->extinguisher_url_photo,
        'description'=>$newExtinguisher->description,'is_approved'=>$newExtinguisher->is_approved,'inspection_id'=>$id]);
        return redirect()->back();
     }
}
