<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function addCustomer(Request $newCustomer){
        $response2 = Http::post('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/addCustomer',
        ['name'=> $newCustomer->name, 'email'=> $newCustomer->email,
         'phone'=> $newCustomer->phone, 'website'=> $newCustomer->website, 'user_id'=> 10]);
        return redirect()->action([MainController::class,'customers']);
    }
}
