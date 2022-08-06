<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Qr;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\ShoppingCart;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        if(auth()->user()->hasRole('Client')){
            return route('web.my_account');
        }else{
            return route('home');
        }
    }
    
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);
    }

    
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])->assignRole('Client');

        $user->profile()->create();

        $data = Qr::create([
            'name' => $user->name,
            'url' => 'google.com',
            'user_id' => $user->id,
        ]);
        // $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        // $shopping_cart->update([
        //     'user_id'=> $user->id,
        // ]);

        return $user;
    }
}
