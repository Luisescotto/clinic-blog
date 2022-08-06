<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasRecursiveRelationships;
    
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'categorizable_type',
        'parent_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function has_subcategory(){
        if ($this->subcategories->count() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function categorizable_type(){
        switch ($this->categorizable_type) {
            case 'Product':
                return 'Productos';
                break;
            
            case 'Post':
                return 'Publicaciones';
                break;
            
            default:
                # code...
                break;
        }
    }

    public function products_count(){
        $total = self::descendantsAndSelf($this->id)->count();
        return $total;
    }

    public function item_numbers(){
        $total = 0;
        if ($this->categorizable_type() == 'Productos') {
             $total = $this->products_count();
        } else {
             $total = $this->posts()->count();
        }
        return $total;
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }


    public function my_store($request, $type){
        if ($type == 'Product') {
            self::create($request->all()+[
                'slug' => Str::slug($request->name, '_'),
                'categorizable_type' => $type
            ]);
        } else {
            self::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name, '_'),
                'categorizable_type' => $type,
            ]);
        }
    }

    public function my_update($request){
        $this->update($request->all()+[
            'slug' => Str::slug($request->name, '_')
        ]);
    }

    public function category_type(){
        switch ($this->categorizable_type) {
            case 'Product':
                return 'Producto';

            case 'Post':
                return 'Publicación';
            
            default:
                # code...
                break;
        }
    }

    
}
