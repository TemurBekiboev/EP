<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $Categories = Category::all();
        $SubCategories = SubCategory::with('category')->get();
        $Attributes = Attribute::all();
        $Products = Product::all();
        return view('admin.dashboard',compact('SubCategories','Categories', 'Attributes','Products'));
    }
}
