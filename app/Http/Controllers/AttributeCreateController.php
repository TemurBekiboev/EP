<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeCreateController extends Controller
{
    public function create(Request $request){
        $validatedData = $request->validate([
           'attributeNames' => 'required|array',
           'attributeNames.*' => 'string|min:3|max:255',
        ]);

        if ($validatedData){
            foreach ($request->attributeNames as $attr){
            Attribute::create([
               'name' =>  $attr,
            ]);
            }
            return redirect()->back()->with('success', 'Attribute created successfully');
        }
    }
}
