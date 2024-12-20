<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subCategory(){
        return $this->hasMany(Product::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class,SubCategory::class,'category_id','subCategory_id','id','id');
    }

    public $timestamps = false;

    protected $fillable =[
        'name',
        'image',
    ];
}
