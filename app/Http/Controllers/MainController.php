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
        $customers = Http::get('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/customers');
        $customers = $customers->json();
        return view('customers')->with('customers', $customers);
    }

    public function inspections(){
        $inspections = Http::get('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/inspections');
        $inspections = $inspections->json();
        return view('inspections')->with('inspections',$inspections);
    }

    public function newInspection(){
        return view('newInspection');
    }

    public function systemUsers(){
        $sysUsers = Http::get('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/users');
        $sysUsers= $sysUsers->json();
        return view('systemUsers')->with('sysUsers',$sysUsers);
    }

    public function aboutUs(){
        return view('aboutUs');
    }

}
