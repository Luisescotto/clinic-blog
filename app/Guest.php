<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name', 'description', 'image',
    ];

    public function getRouteKeyName(){
        return 'name';
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
