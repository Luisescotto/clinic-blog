<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'body', 'business_id',
    ];

    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }

    public function my_store($request){
        
        $slider = self::create($request->all());
        $image = $request->file('file');
        $urlimage = self::upload_image($image);  
        $slider->image()->create(['url' => $urlimage]);
    }

    public function my_update($request){
        $this->update($request->all()); 

        if($request->hasFile('file')){
            $image = $request->file('file');  
            $urlimage = self::upload_image($image);
            $this->image()->update(['url' => $urlimage]);
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
