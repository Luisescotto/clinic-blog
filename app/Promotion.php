<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'ending_date',
        'discount_rate',
        'fixed_amount_discount',
        'promotion_type',
    ];

    protected $dates = [
        'start_date',
        'ending_date',
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function my_store($request){
        $promotion = self::create($request->all()+[
            'start_date' => date('d-m-Y H:i:s', strtotime($request->start_date)),
            'ending_date' => date('d-m-Y H:i:s', strtotime($request->ending_date)),
            'discount_rate' => $request->discount_rate / 100
        ]);
        $promotion->products()->attach($request->products);
    }

    public function my_update($request){
        $this->update($request->all() + [
            'start_date' => date('d-m-Y H:i:s', strtotime($request->start_date)),
            'ending_date' => date('d-m-Y H:i:s', strtotime($request->ending_date)),
            'discount_rate' => $request->discount_rate / 100
        ]);

        $this->products()->sync($request->products);
    }

    public function promotion_status()
    {
        if ($this->ending_date < Carbon::now()) {
            return [ 
            'text'=>'Expirado',
            'color' => 'danger'
        ];
        }else{
            return [ 
                'text'=>'Activo',
                'color' => 'success'
            ];
        }
    }

    public function promotion_active()
    {
        if ($this->promotion_type == 'percent') {

            $icon_1 = 'fa-check';
            $icon_2 = '';

        }elseif($this->promotion_type == 'fixed'){
            $icon_1 = '';
            $icon_2 = 'fa-check';
        }

        return [
            'icon_1' => $icon_1,
            'icon_2' => $icon_2,

        ];
         
    }
     
}
