<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeleteController extends Controller
{
    public function deleteCustomer($id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 2){
            $url = 'company';
        }
        $delCustomer = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->delete('http://apiblastoiz-env.eba-5xvdmybp.us-east-1.elasticbeanstalk.com/api/'.$url.'/customer/'.$id);
        return redirect()->back();
    }

    public function deleteUser($id){
        $token = session()->get('btoken');
        $delUser = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->delete('http://apiblastoiz-env.eba-5xvdmybp.us-east-1.elasticbeanstalk.com/api/company/user/'.$id);
        return redirect()->back();
    }

    public function deleteInspection($id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 3){
            $url = 'employee';
        }
        $delInspection = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->delete('http://apiblastoiz-env.eba-5xvdmybp.us-east-1.elasticbeanstalk.com/api/'.$url.'/inspection/'.$id);
        return redirect()->back();
    }

    public function deleteExtinguisher($id){
        $token = session()->get('btoken');
        $role = session()->get('role');
        if($role == 1){
            $url = 'inspector';
        }
        else if($role == 3){
            $url = 'employee';
        }
        $delExtinguisher = Http::withHeaders(['Authorization' => "Bearer ".$token])
        ->delete('http://apiblastoiz-env.eba-5xvdmybp.us-east-1.elasticbeanstalk.com/api/'.$url.'/extinguisher/'.$id);
        return redirect()->back();
    }
}
