<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with('category')->get();

        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isUpdate=false;
        $product = new Product();

        $categories = Category::all();

        $product->quantity=0;
        $product->price=0;

        return view('/product.form',compact('product','categories','isUpdate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFields=$request->validated();

        if($request->hasFile('image')){
            $formFields['image']= $request->file('image')->store('product','public');
        }

        Product::create($formFields);

        return to_route('products.index')-> with('success','Product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $isUpdate=true;

        $categories = Category::all();

        return view('/product.form',compact('product','categories','isUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        $formFields=$request->validated();

        $image= $request -> file('image');

        if($request->hasFile('image')){
            $formFields['image']= $image ->store('product','public');
        }

        $product->fill($formFields)->save();

        return to_route('products.index')-> with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index')-> with('success','Product deleted successfully');
    }
}
