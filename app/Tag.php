<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function taggables(){
        return $this->hasMany(Taggable::class);
    }

    public function products(){
        return $this->morphedByMany(Product::class, 'taggable');
    }

    public function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function my_store($request){
        self::create([
        'name' => $request->name, 
        'slug' => Str::slug($request->name, '_'), 
        'description' => $request->description,
        ]);
    }

    public function my_update($request){
        $this->update([
        'name' => $request->name, 
        'slug' => Str::slug($request->name, '_'), 
        'description' => $request->description,
        ]);
    }
}
