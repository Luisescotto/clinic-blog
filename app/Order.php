<?php

namespace App;

use App\Events\OrderEvent;
use App\Events\OrderStatusEvent;
use App\Notifications\OrderNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'shipping_status',
        'payment_status',
        'order_date',
        'tax',
        'user_id',
    ];

    protected $dates = [
        'order_date'
    ];

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subtotal(){
        $total = 0;
        foreach ($this->order_details as $key => $order_detail) {
            $total += $order_detail->total();
        }
        return $total;
    }

    public function total_tax(){
        return $this->subtotal() * $this->tax;
    }

    public function total(){
        return $this->subtotal() + $this->total_tax();
    }

    public function total_text(){
        return Setting::first();
    }

    public static function my_store(){
        
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $tax = Setting::find(1)->pluck('tax'); 
        $order = self::create([
            'shipping_status' => 'Pending',
            'payment_status' => 'Paid',
            'order_date' => Carbon::now(),
            'tax' => $tax[0],
            'user_id' => auth()->user()->id,
        ]);
        $order->add_order_details($shopping_cart);        
        self::make_order_notification($order);
    }

    public function add_order_details($shopping_cart){
        foreach ($shopping_cart->shopping_cart_details as $key => $abc) {
            $this->update_stock($shopping_cart->shopping_cart_details[$key]->product_id, $shopping_cart->shopping_cart_details[$key]->quantity);
            
            $results[] = array("product_id"=>$shopping_cart->shopping_cart_details[$key]->product_id, "quantity"=>$shopping_cart->shopping_cart_details[$key]->quantity, "price"=>$abc->product->discountedPrice);
        }
        $this->order_details()->createMany($results);
    }

    static function make_order_notification($order){
        event(new OrderEvent($order));
        // User::role(['Admin', 'Cashier'])
        // ->each(function(User $user) use ($order){
        //     $user->notify(new OrderNotification($order));
        // });
    }

    public function shipping_status(){
        switch ($this->shipping_status) {
            case 'Pending':
                return 'Pendiente';
                break;

            case 'Approved':
                return 'Aprobado';
                break;

            case 'Delivered':
                return 'Entregado';
                break;

            case 'Cancelled':
                return 'Cancelado';
                break;
            
            default:
                # code...
                break;
        }
    }
    
    public function payment_status(){
        switch ($this->payment_status) {
            case 'Paid':
                return 'Pagado';
                break;

            case 'Pending':
                return 'Pendiente';
                break;

            case 'Defunded':
                return 'Devuelto';
                break;
            
            default:
                # code...
                break;
        }
    }
     
    public function status(){
        switch ($this->shipping_status) {
            case 'Pending':
                return [
                    'text'=> 'Pendiente',
                    'color'=> 'warning'
                ];
                break;

            case 'Approved':
                return [
                    'text'=> 'Aprobado',
                    'color'=> 'success'
                ];
                break;

            case 'Delivered':
                return [
                    'text'=> 'Entregado',
                    'color'=> 'primary'
                ];
                break;

            case 'Cancelled':
                return [
                    'text'=> 'Cancelado',
                    'color'=> 'secondary'
                ];
                break;
            
            default:
                # code...
                break;
        }
    }

    public function order_date(){
        return $this->order_date->format('d-M-Y H:i a');
    }

    public function update_status($request){
        $old_status= $this->shipping_status;
        $this->update([
            'shipping_status' => $request->value
        ]);
        $this->change_stock($old_status);
        self::make_order_status_notification($this);
    }

    public function change_stock($old_status){
        switch ($this->shipping_status) {
            case 'Pending':
                $this->loop_details($this->order_details, 'Pending', $old_status);
                break;
            case 'Approved':                
                $this->loop_details($this->order_details, 'Approved', $old_status);
                break;
            case 'Delivered':
                $this->loop_details($this->order_details, 'Delivered', $old_status);
                break;
            case 'Cancelled':
                $this->loop_details($this->order_details, 'Cancelled', $old_status);
                break;
            default:
                # code...
                break;
        }
    }

    public function loop_details($details, $status, $old_status){

        if($old_status != 'Cancelled' && $status != 'Cancelled'){

        }elseif ($old_status != 'Cancelled' && $status == 'Cancelled') {

            foreach ($details as $key => $detail) {            
                $this->restore_stock($detail->product_id, $detail->quantity);
            }

        }elseif ($old_status == 'Cancelled' && $status != 'Cancelled') {

            foreach ($details as $key => $detail) {            
                $this->update_stock($detail->product_id, $detail->quantity);
            }

        }
    }

    public function update_stock($id, $quantity){
        $product = Product::find($id);
        $product->subtractStock($quantity);
    }

    public function restore_stock($id, $quantity){
        $product = Product::find($id);
        $product->addStock($quantity);
    }
    
    static function make_order_status_notification($order){
        event(new OrderStatusEvent($order));
    }

}
