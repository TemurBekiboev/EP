<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){
        $product = Product::with('attributes')->findOrFail($id);
        return view('productDetail',compact('product'));
    }

    public function show($id){
        $category = Category::with('products')->findOrFail($id);
        $products = $category->product;
//        dd($category    );
        return view('products',compact('category'));
    }
}
