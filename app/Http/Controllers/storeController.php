<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class storeController extends Controller
{
    public function index()
    {
        //$products=Product::all();
        $products=Product::query()->orderBy('created_at','desc')->limit(3)->get();

        return view('store.index',compact('products'));
    }
}
