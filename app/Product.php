<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description1', 'description2', 'price', 'images', 'items', 'content', 'view', 'category_id'];
    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }
    protected $table = 'products';
}
