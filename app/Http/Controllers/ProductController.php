<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function addProduct(Request $request)
    {
        Product::create($request->all());

        return response()->json(['status' => 'success', 'message' => 'Product added successfully']);
    }

    public function fetchProducts()
    {
        $products = Product::all();
        return response()->json(['status' => 'success', 'data' => $products]);
    }

    public function getProduct(Request $request)
    {
        $products = Product::find($request->id);
        return response()->json(['status' => 'success', 'data' => $products]);
    }

    public function editProduct(Request $request)
    {
        Product::find($request->product_id)->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Product Added successfully']);
    }

    public function deleteProduct(Request $request)
    {
        Product::find($request->id)->delete();
        
        return response()->json(['status' => 'success', 'message' => 'Product Deleted successfully']);
    }
    

    public function todo()
    {
        return view('todo');
    }
}
