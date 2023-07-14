<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class FrontendController extends Controller
{
    public function index(){
        $fruits = Products::all()->where('fr_status', '1');
        return view('frontend.index', compact('fruits'));
    }
}
