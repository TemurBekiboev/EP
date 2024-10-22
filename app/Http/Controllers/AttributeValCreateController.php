<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValCreateController extends Controller
{
    public function create(Request $request){
        $validatedData = $request->validate([
           'attrValProduct' => 'required|exists:products,id',
           'attributeValues' => 'required|array',
           'attributeValues.*' => 'required|max:255',
           'attributeNames' => 'required|array',
            'attributeNames.*' => 'required|exists:attributes,id',
        ]);

        if ($validatedData){
            $attributeVal = $request->attributeValues;
            $idAttribute = $request->attributeNames;
           for ($i = 0;$i < count($attributeVal);$i++){
            AttributeValue::create([
                'value' => $attributeVal[$i],
                'attribute_id' => $idAttribute[$i],
                'product_id' => $request->attrValProduct,
            ]);
            };
           return redirect()->back()->with('success','Attribute Values Created Successfully');
        }
    }
}
