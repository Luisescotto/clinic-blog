<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use Rateable;

    protected $fillable = [
        'code',
        'name',
        'slug',
        'short_description',
        'long_description',
        'date',
        'stock',
        'sell_price',
        'status',
        'views',
        'category_id',
        'provider_id',
        'guest_id',
    ];

    protected $dates = [
        'date'
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function similar(){
        return $this->store_products()->where([
        ['category_id', $this->category_id],
        ['id', '!=', $this->id]
        ])->inRandomOrder()->take(6)->get();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }

    public function guest(){
        return $this->belongsTo(Guest::class);
    }

    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function promotions(){
        return $this->belongsToMany(Promotion::class);
    }

    public function my_store($request){
        $product = self::create([
            'code' =>$request->code,
            'name' =>$request->name,
            'slug' => Str::slug($request->name, '_'),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'date' =>$request->date,
            
            'sell_price' =>$request->sell_price,
            
            'subcategory_id' =>$request->subcategory_id,
            'provider_id' =>$request->provider_id,
            'guest_id' =>$request->guest_id,
        ]);
        $product->tags()->attach($request->get('tags'));
        
        $this->generar_codigo($product);
        $this->upload_files($request, $product);
        return $product;
    }

    public function my_update($request){
       $this->update([
            'code' =>$request->code,
            'name' =>$request->name,
            'slug' => Str::slug($request->name, '_'),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'date' =>$request->date,
            
            'sell_price' =>$request->sell_price,
            'status' =>$request->status,
            'category_id' =>$request->category_id,
            'provider_id' =>$request->provider_id,
            'guest_id' =>$request->guest_id,
        ]);
        $this->tags()->sync($request->get('tags'));        
        $this->generar_codigo($this);
    }

    public function addStock($quantity){
        $this->increment('stock', $quantity);
    }

    public function subtractStock($quantity){

        $this->decrement('stock', $quantity);
    }

    public function generar_codigo($product){
        $numero = $product->id;
        $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code'=>$numeroConCeros]);
    }

    public function upload_files($request, $product){
        $urlimages = [];
        if($request->hasFile('images')){
            $images = $request->file('images');
            
            foreach ($images as $image) {
                $nombre = time().$image->getClientOriginalName();
                $ruta = public_path().'/image';
                $image->move($ruta,$nombre);
                $urlimages[]['url']='/image/'.$nombre;
            }

        }
        $product->images()->createMany($urlimages);
    }

    public function status(){
        switch ($this->status) {
            case 'Shop':
                return 'Público';
                break;

            case 'Disabled':
                return 'Desactivado';
                break;

            case 'Draft':
                return 'Borrador';
                break;
            default:
                # code...
                break;
        }
    }

    static function get_active_products(){
        return self::where('status', 'Active');
    }

    static function store_products(){
       return self::where('status', 'Shop');
    }

    public function has_promotions(){

        if ($this->promotions->count() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function getDiscountedPriceAttribute(){
        
        $total_rate = 0;
        $total_fixed = 0;

        foreach ($this->promotions as $key => $promotion) {
            if ($promotion->promotion_type == 'percent') {
                $total_rate += $promotion->discount_rate;
            }elseif($promotion->promotion_type == 'fixed'){
                $total_fixed += $promotion->fixed_amount_discount;
            }  
        }
        $total = ($this->sell_price - ($this->sell_price * ($total_rate/100))) - $total_fixed;
        return $total;
    }

    public function getDisTotalDiscountPercentageAttribute(){
        $total_rate = 0;
        $total_fixed = 0;
        foreach ($this->promotions as $key => $promotion) {
            if ($promotion->promotion_type == 'percent') {
                $total_rate += $promotion->discount_rate;
            }elseif($promotion->promotion_type == 'fixed'){
                $total_fixed += $promotion->fixed_amount_discount;
            }  
        }
        if ($total_fixed < 1) {
            return round(($total_rate), 2);
        }
        return round(($total_rate) + (100/($this->sell_price / $total_fixed)), 2);
    }

}
