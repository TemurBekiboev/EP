<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryUpdateController extends Controller
{

    public function update(Request $request,$id){
//        dd($request->category_image);
        $validateData = $request->validate([
            'category_name'=> 'required|string|max:255',
            'category_image'=> 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);
//        dd($validateData);

        $category = Category::find($id);

        if ($category && $validateData){
            Storage::disk('public')->delete($category->image);
            $file = $request->file('category_image')->getClientOriginalName();
            Storage::disk('public')->putFileAs('images',$request->file('category_image'),$file);

            $category->image = 'images/'.$file;
            $category->name = $request->category_name;
            $category->save();

            return redirect()->back()->with('success','Category updated successfully');
        }
        else{
            return redirect()->back()->with('error','Category can not be updated');
        }
    }
    public function delete($id){
            $category = Category::find($id);
        $category->delete();
        if ($category){
        return redirect()->back()->with('success','Successfully deleted');
        }
        else{
            return redirect()->back()->withErrors('error','Category can not be deleted');
        }
    }
}
