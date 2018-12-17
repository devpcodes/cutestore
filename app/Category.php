<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Series()
    {
        return $this->belongsTo(\App\Series::class);
    }
    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }
    protected $table = 'categorys';

    protected $fillable = ['name','series_id'];
}
