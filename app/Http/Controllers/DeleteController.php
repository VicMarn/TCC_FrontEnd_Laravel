<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeleteController extends Controller
{
    public function deleteCustomer($id){
        $delCustomer = Http::delete('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/deleteCustomer/'.$id);
        return redirect()->back();
    }

    public function deleteUser($id){
        $delUser = Http::delete('http://tccfireinspectionapi-env.eba-rwbw4xg4.us-east-1.elasticbeanstalk.com/api/deleteUser/'.$id);
        return redirect()->back();
    }
}
