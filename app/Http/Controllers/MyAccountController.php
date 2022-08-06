<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ChangePasswordRequest;
use App\Order;
use App\PaymentPlatform;
use App\Product;
use App\Qr;
use App\Setting;
use App\ShoppingCart;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('client_auth');
    }

    public function my_account(){
        
        $user = auth()->user();
        
        $data = Qr::where('user_id', $user->id);
        $qrcode = '';
        
        return view('web.my_account', compact('user', 'qrcode'));
    }

    public function seminars(){
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        foreach ($orders as $key => $order) {
            $id=$order->order_details->pluck('product_id');
            $product = Product::find($id)->pluck('slug');
        }
        
        
        return view('web.qr.seminars', compact('user', 'orders', 'product'));
    }

    public function checkout(){
        $paymentPlatforms = PaymentPlatform::all();
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $products = $shopping_cart->shopping_cart_details;   
        $subtotal = $shopping_cart->subtotal();
        $tax = Setting::find(1)->pluck('tax'); 
        return view('web.checkout', compact('paymentPlatforms', 'products', 'subtotal', 'tax'));
    }

    public function orders(){
        $user = auth()->user();
        $orders = auth()->user()->orders;
        $qrcode = ''; 
        return view('web.orders', compact('orders', 'user', 'qrcode'));
    }

    public function qrcode(){
        $orders = auth()->user()->orders;
        $user = auth()->user();
        $qrcode = QrCode::size(300)->margin(2)->generate(route('web.seminars', $user));
        return view('web.qr', compact('user', 'qrcode'));
    }

    public function account_info(){
        $user = auth()->user();
        $qrcode = ''; 
        return view('web.account_info', compact('user', 'qrcode'));
    }

    public function address_edit(){
        $profile = auth()->user()->profile;
        $user = auth()->user();
        $qrcode = ''; 
        return view('web.address_edit', compact('profile', 'user', 'qrcode'));
    }

    public function change_password(){
        $user = auth()->user();
        $qrcode = ''; 
        return view('web.change_password', compact('user', 'qrcode'));
    }

    public function order_details(Order $order)
    {
        $user = auth()->user();
        $details = $order->order_details;
        $qrcode = ''; 
        return view('web.order_details', compact('order', 'details','user', 'qrcode'));   

    }

    public function rate_product(Request $request, Product $product){
        $product->rate($request->rate, $request->comment);
        return back();
    }
    
}
