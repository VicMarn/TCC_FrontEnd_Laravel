<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function menu(){
        return view('menu');
    }

    public function login(){
        return view('login');
    }

    public function signup(){
        return view('signup');
    }

    public function customers(){
        $customers = Http::get('http://127.0.0.1:8000/api/customers');
        $customers = $customers->json();
        return view('customers')->with('customers', $customers);
    }

    public function inspections(){
        $inspections = Http::get('http://127.0.0.1:8000/api/inspections');
        $inspectionsCustomers=Http::get('http://127.0.0.1:8000/api/customers');
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
        $editInspection = Http::get('http://127.0.0.1:8000/api/inspection/'.$id);
        $editInspection = $editInspection->json();
        return view('newInspection')->with('inspection',$editInspection);
    }

    public function systemUsers(){
        $sysUsers = Http::get('http://127.0.0.1:8000/api/users');
        $sysUsers= $sysUsers->json();
        return view('systemUsers')->with('sysUsers',$sysUsers);
    }

    public function aboutUs(){
        return view('aboutUs');
    }

}
