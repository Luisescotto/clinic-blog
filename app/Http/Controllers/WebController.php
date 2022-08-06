<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\Category;
use App\Guest;
use App\Http\Requests\SubscriptionEmailRequest;
use App\Subscription;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function about_us(){
        return view('web.about_us');
    }

    public function cart(){
        return view('web.cart');
    }

    public function contact_us(){
        return view('web.contact_us');
    }

    public function guest(Guest $guest){

        return view('web.guest', compact('guest'));
    }

    public function login_register(){
        return view('web.login_register');
    }

    public function login(){
        return view('web.login');
    }

    public function subscription_email(SubscriptionEmailRequest $request){
        Subscription::create([
            'email' => $request->subscription_email
        ]);
        session()->flash('exito', 'Se ha suscrito correctamente');
        return back()->with('mensaje', 'Se ha suscrito correctamente');
    }

    public function login_error(){
        return redirect()->route('web.login_register')->with('login_messages', 'Es necesario iniciar sesión antes de comentar.');
    }

    public function terms_conditions(){
        return view('web.terms_conditions');
    }
}