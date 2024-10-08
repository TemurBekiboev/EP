<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCreateController extends Controller
{
    public function create(Request $request){

        $validatedData = $request->validate([
           'name'=>'required|string|max:255',
        ]);

            $category = Category::create($validatedData);

        return redirect()->route('admin-dashboard');
    }
}
