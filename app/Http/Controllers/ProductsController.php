<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    function index(){
        
        $products =Product::all();
        return view('landing', ['products' => $products]);
    }

    function store(Request $request){

        $validatedProduct = $request->validate([
            'name' => 'required',
            'description' => 'required|',
            'price' => 'required|numeric',
        ]);

        Product::create($validatedProduct);

        return redirect()->route('products.index');
    }


    function destroy(Request $request){

        $productToDestroy = $request->input('id');
        Product::destroy($productToDestroy);
        return redirect()->route('products.index');
    }
}
