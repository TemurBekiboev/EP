<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryUpdateController extends Controller
{

    public function update(Request $request,$id){
        $validateData = $request->validate([
            'category_name'=> 'required|string|max:255',
        ]);

        $category = Category::find($id);

        if ($category){
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
