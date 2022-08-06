<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'email',
        'address',
        'phone',
        'contact_text',
        'hours_of_operation',
        'latitude',
        'length',
        'google_map_link',
    ];

    public function sliders(){
        return $this->hasMany(Slider::class);
    }

    public function social_media(){
        return $this->hasMany(SocialMedia::class);
    }

    public function my_update($request){
        $this->update($request->all());
        if ($request->hasFile('file')) {
            $image = $request->file('file'); 
            $ruta = self::upload_image($image);
            $this->update($request->all() + [
                'logo' => $ruta
            ]);
        }
        
    }

    public static function upload_image($image){
        $nombre = time().$image->getClientOriginalName();
        $ruta = public_path().'/image';
        $image->move($ruta,$nombre);
        $ruta='/image/'.$nombre;
        return $ruta;
    }
    
}
