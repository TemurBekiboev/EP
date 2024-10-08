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
    public $timestamps = false;

    protected $fillable =[
        'name',
        'image',
    ];
}
