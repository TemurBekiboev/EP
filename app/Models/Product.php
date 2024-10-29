<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function attributeVal(){
        return $this->hasMany(AttributeValue::class);
    }
    public function attributes(){
        return $this->belongsToMany(Attribute::class,'attribute_values','product_id','attribute_id')->withPivot('value');
    }

    protected $fillable = [
        'name',
        'subCategory_id',
        'price',
        'description',
        'brand',
        'availability',
        'quantity',
        'images',
        'manufacturer',
        'created_at',
        'updated_at',
    ];
}
