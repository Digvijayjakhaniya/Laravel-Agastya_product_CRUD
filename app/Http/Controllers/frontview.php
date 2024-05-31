<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class frontview extends Controller
{
    public function index()
{
    $products = product::all();
    return view('frontend.index', compact('products'));
}

}
