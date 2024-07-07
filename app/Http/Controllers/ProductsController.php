<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
  
    function index()
    {
        $userProducts = Auth::user()->products;
        return view('landing', ['userProducts' => $userProducts]);
    }

    function store(Request $request){

        $validatedProduct = $request->validate([
            'name' => 'required',
            'description' => 'required|',
            'price' => 'required|min:1|max:10',
        ],[
            'name.required' => 'The name field is required',
            'description.required' => 'The description field is required',
            'price.required' => 'The price field is required',
            'price.numeric' => 'The price field must be a number',

        ]);

        $newProduct = new Product();
        $newProduct->name = $request->input('name');
        $newProduct->description = $request->input('description');
        $newProduct->price = $request->input('price');
        $newProduct->user_id = Auth::id();
        $newProduct->save();
        

        return redirect()->route('products.index');
    }


    function destroy(Request $request){

        $productToDestroy = $request->input('id');
        Product::destroy($productToDestroy);

        return redirect()->route('products.index');
    }

    function update(Request $request){

        $productToUpdate = $request->input('id');
        $product = Product::find($productToUpdate);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index');
    }

   
}
