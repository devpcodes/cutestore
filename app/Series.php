<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public function categorys()
    {
        return $this->hasMany(\App\Category::class);
    }

    protected $fillable = ['name'];

    protected $table = 'series';
}
