<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
    ];

    public function product(){
        return $this->belongsToMany(Product::class,'attribute_values','attribute_id','product_id');
    }
}
