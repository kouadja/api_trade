<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserDriver;
use Illuminate\Http\Request;

class driverUserController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $driver = UserDriver::create($data);
        return response("sucess");
    }
}
