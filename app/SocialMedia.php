<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'name',
        'url',
        'icon',
        'business_id',
    ];

    public function my_store($request){
        $this->create([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request->icon,
            'business_id' => 1, 
        ]);
    }

    public function my_update($request){
        $this->update([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request->icon,
            'business_id' => 1, 
        ]);
    }

    
}
