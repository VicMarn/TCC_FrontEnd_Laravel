<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeleteController extends Controller
{
    public function deleteCustomer($id){
        $delCustomer = Http::delete('http://127.0.0.1:8000/api/customer/'.$id);
        return redirect()->back();
    }

    public function deleteUser($id){
        $delUser = Http::delete('http://127.0.0.1:8000/api/user/'.$id);
        return redirect()->back();
    }

    public function deleteInspection($id){
        $delInspection = Http::delete('http://127.0.0.1:8000/api/inspection/'.$id);
        return redirect()->back();
    }

    public function deleteExtinguisher($id){
        $delExtinguisher = Http::delete('http://127.0.0.1:8000/api/extinguisher/'.$id);
        return redirect()->back();
    }
}
