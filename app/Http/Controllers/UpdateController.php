<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UpdateController extends Controller
{
    public function putCustomer(Request $putCustomer,$id){
        $response = Http::put('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/updateCustomer/'.$id,
        ['name'=> $putCustomer->name, 'email'=>$putCustomer->email,
        'phone'=> $putCustomer->phone, 'website'=>$putCustomer->website, 'user_id' => 10]);
        return redirect()->back();
        
    }
}
