<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductCreateController extends Controller
{
    public function create(Request $request){

        $validatedData = $request->validate([
            'product_name' => [
                'required',
                'min:3',
                'max:255',
//                'regex:/^[a-zA-Zа-яА-ЯёЁ0-9\s\-]+$/u',
                'unique:products,name',
                Rule::notIn(['undefined', 'null', 'admin']),
            ],
            'product_sbc'=>'required|exists:sub_categories,id',
            'product_price'=> [
                'required',               // Price must be provided
                'numeric',                // Must be a valid number
                'min:0.01',               // Must be greater than 0
                'max:999999.99',          // Maximum value for the price
                'regex:/^\d+(\.\d{1,2})?$/' // Must be formatted with at most 2 decimal places
            ],
            'description' => [
                'nullable',               // Optional description
                'min:10',                 // Minimum length of 10 characters
                'max:1000',               // Maximum length of 1000 characters
//                'regex:/^[a-zA-Zа-яА-ЯёЁ0-9\s\-]+$/u', // Allow only alphanumeric and punctuation
                function ($attribute, $value, $fail) { // Custom rule to block HTML tags
                    if ($value !== strip_tags($value)) {
                        $fail($attribute.' must not contain HTML tags.');
                    }
                }
            ],
            'product_brand'=>'nullable|string|max:255',
            'product_availability'=> 'boolean',
            'product_quantity'=>[
                'required',               // Price must be provided
                'numeric',                // Must be a valid number
                'min:1',               // Must be greater than 0
                'max:999999',          // Maximum value for the price
                'regex:/^\d+(\.\d{1,2})?$/' // Must be formatted with at most 2 decimal places
            ],
                'images' => 'required|array|max:5',  // Array of images, max 5
//                'images.*' => 'image|mimes:jpeg,png,jpg,gif,bmp|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/bmp|max:2048', // Validate each file with stricter MIME checking and max 2MB
            'product_mnf'=>'nullable|string|max:255',
        ]);

        if ($validatedData){
            $images = array();
            foreach ($request->file('images') as $key=>$image){
                $file = $image->getClientOriginalName();
                $images[$key] = 'images/product'.$file;
                Storage::disk('public')->putFileAs('images/product',$image,$file);
            }
            $imagesJson = json_encode($images);
            $product = new Product;
               $product->name = $request->product_name;
               $product->subCategory_id = $request->product_sbc;
                $product->price = $request->product_price;
                $product->description = $request->description;
                $product->brand = $request->product_brand;
                $product->availability = $request->product_availability;
                $product->quantity = $request->product_quantity;
                $product->images = $imagesJson;
                $product->manufacturer = $request->product_mnf;
                $product->save();
            return redirect()->back()->with('success','Product created successfully');
        }



    }
}
