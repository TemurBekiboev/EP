<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryCreateController extends Controller
{
    public function create(Request $request){

        $validatedData = $request->validate([
           'name'=>'required|string|max:255',
            'image'=>'required|mimes:jpg,jpeg,png|max:2048',
        ]);

            $category = Category::create($validatedData);

            if ($category){
                return redirect()->back()->with('success','Category created successfully');
            }
            else{
                return redirect()->back()->withErrors($validatedData);
            }

    }
}
