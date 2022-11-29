<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function menu(){
        if(session()->has('btoken')){
            return view('/menu');
        }
        else{
            return redirect('/');
        }
    }

    public function login(){
        return view('login');
    }

    public function signup(){
        return view('signup');
    }

    public function signupPJ(){
        return view('signupPJ');
    }

    /*
    public function customers(){
        $customers = Http::get('http://127.0.0.1:8000/api/customers');
        $customers = $customers->json();
        return view('customers')->with('customers', $customers);
    }
    */

    public function customers(){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 2){
            $url = 'company';
        }
        else{
            $url = 'employee';
        }
        $customers = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->get('http://127.0.0.1:8000/api/'.$url.'/customers');
        $customers = $customers->json();
        return view('customers')->with('customers', $customers);
    }

    public function inspections(){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 2){
            $url = 'company';
        }
        else{
            $url = 'employee';
        }
        $inspections = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->get('http://127.0.0.1:8000/api/'.$url.'/inspections');
        $inspectionsCustomers=Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->get('http://127.0.0.1:8000/api/'.$url.'/customers');
        $inspections = $inspections->json();
        $inspectionsCustomers = $inspectionsCustomers->json();
        return view('inspections')
            ->with('inspections',$inspections)
            ->with('inspCustomers', $inspectionsCustomers);
    }   

    public function newInspection(){
        return view('newInspection');
    }

    public function editInspection($id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 2){
            $url = 'company';
        }
        else if($role == 3){
            $url = 'employee';
        }
        $editInspection = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->get('http://127.0.0.1:8000/api/'.$url.'/inspection/'.$id);
        $editInspection = $editInspection->json();
        return view('newInspection')->with('inspection',$editInspection);
    }

    /*
    public function systemUsers(){
        $sysUsers = Http::get('http://127.0.0.1:8000/api/users');
        $sysUsers= $sysUsers->json();
        return view('systemUsers')->with('sysUsers',$sysUsers);
    }
    */

    public function systemUsers(){
        $token = session()->get('btoken');
        $sysUsers = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->get('http://127.0.0.1:8000/api/company/users');
        $sysUsers= $sysUsers->json();
        return view('systemUsers')->with('sysUsers',$sysUsers);
    }

    public function aboutUs(){
        if(session()->has('btoken')){
            return view('aboutUs');
        }
        else{
            return redirect('/');
        }
    }

}
