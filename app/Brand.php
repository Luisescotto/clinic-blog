<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }

    public function my_store($request){
        $brand = $this->create($request->all());
        $image = $request->file('files');
        $urlimage = self::upload_image($image);         
        $brand->image()->create(['url' => $urlimage]);
    }

    public function my_update($request){ 
        
        $this->update($request->all());  
        if($request->hasFile('files')){
        $image = $request->file('files');  
        $urlimage = self::upload_image($image);

        
        $this->image()->update([
            'url' => $urlimage,
        ]);
        }
         
    }

    public static function upload_image($image){
        $nombre = time().$image->getClientOriginalName();
        $ruta = public_path().'/image';
        $image->move($ruta,$nombre);
        $urlimage='/image/'.$nombre;
        return $urlimage;
    }
    
}
