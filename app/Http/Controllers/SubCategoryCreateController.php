<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryCreateController extends Controller
{
    public function create(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|max:256',
            'category_id'=> 'required|exists:categories,id',
            'image'=> 'required|image|max:2048',
        ]);


        if($validatedData){
            $file = $request->file('image')->getClientOriginalName();
            Storage::disk('public')->putFileAs('images/sbc',$request->file('image'),$file);
            SubCategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'image' => 'images/sbc/'.$file,
                ]);
            return redirect()->back()->with('success', 'Successfully subcategory created');

        }
    }
}
