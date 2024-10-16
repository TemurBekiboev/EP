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
