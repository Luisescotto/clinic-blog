<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Model
{

    // protected $fillable = [
    //     'status', 'user_id', 'order_date',
    // ];

    public function shopping_cart_details(){
        return $this->hasMany(ShoppingCartDetail::class);
    }

    public function has_products(){
        if ($this->shopping_cart_details()->count() > 0) {
            return true;
        } else {
            return false;
        }   
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public static function findOrCreateBySessionId($shopping_cart_id){
        if ($shopping_cart_id) {
            return ShoppingCart::find($shopping_cart_id);
        } else {
            return ShoppingCart::create();
        }
    }

    // public static function findOrCreateByUserId($user){
    //     $active = $user->shoppingCarts->where('status', 'Active')->first();
    //     if ($active) {
    //         return $user->shoppingCarts->where('status', 'Active')->first();
    //     } else {
    //         return self::create([
    //             'user_id' => auth()->user()->id,
    //         ]);
    //     }
    // }

    public function quantity_of_products(){
         return $total = $this->shopping_cart_details->sum('quantity');
    }

    public function subtotal(){
        $total = 0;
        foreach ($this->shopping_cart_details as $key => $shopping_cart_detail) {
            $total += $shopping_cart_detail->total();
        }
        return $total;
    }

    public function total_price(){
        $tax = Setting::find(1)->pluck('tax');
        return ($this->subtotal() * $tax[0]) + $this->subtotal();
    }

    public function total_tax(){
        $tax = Setting::find(1)->pluck('tax');
        return $this->subtotal() * $tax[0];
    }

    public static function get_the_session_shopping_cart(){
        $session_name = 'shopping_cart_id';
        $shopping_cart_id = Session::get($session_name);
        $shopping_cart = self::findOrCreateBySessionId($shopping_cart_id);
        return $shopping_cart;
    }

    // public static function get_the_user_shopping_cart(){
    //     $shopping_cart = self::findOrCreateByUserId(Auth::user());
    //     return $shopping_cart;
    // }

    public function my_store($product, $request){
        $this->shopping_cart_details()->updateOrCreate(
            ['product_id' => $product->id],
            [
             'quantity' => DB::raw("quantity + $request->quantity"),
             //'price' => $product->sell_price,
            ]
        );
    }

    public function store_a_product($product){
        $this->shopping_cart_details()->updateOrCreate(
            ['product_id' => $product->id],
            ['quantity' => DB::raw('quantity+1'),
            // 'price' => $product->sell_price,
            ]
        );
    }

    public function my_update($request){
        foreach ($this->shopping_cart_details as $key => $detail) {
            $result[] = array("quantity" => $request->quantity[$key]);
            $detail->update($result[$key]);
        }
    }

   

    // public function subtotal(){
    //     $total = 0;
    //     foreach ($this->order_details as $key => $order_detail) {
    //         $total += $order_detail->total();
    //     }
    //     return $total;
    // }
}
