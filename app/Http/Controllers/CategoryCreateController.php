<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\CategoryService;

class CategoryCreateController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    public function create(Request $request){
        $validatedData = $request->validate([
           'name'=>'required|string|max:255',
            'image'=>'required|image|max:2048',
        ]);
//        dd($validatedData);

       $this->categoryService->create($validatedData);
//            if ($validatedData){
//                $fileName = $request->file('image');
//                $filePath = 'images/category';
//                $this->storeFilesService->storeFile($filePath, $fileName);
//               $file = $request->file('image')->getClientOriginalName();
//                Storage::disk('public')->putFileAs('images/category',$request->file('image'),$file);

//                Category::create([
//                    'name'=>$request->name,
//                    'image'=>'images/category/'.$file,
//                ]);

                return redirect()->back()->with('success','Category created successfully');
//            }
//            else{
//                return redirect()->back()->with('error','Something wrong');
//            }

    }
}
