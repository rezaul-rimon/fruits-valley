<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class BackendController extends Controller
{
    public function admin(){
        $fruits = Products::all();
        return view('backend.admin', compact('fruits'));
        // return view('backend.admin');
    }
}
