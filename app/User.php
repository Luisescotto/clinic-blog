<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    
    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    public function getRouteKeyName(){
        return 'name';
    }
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function qr(){
        return $this->hasOne(Qr::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

    // public function shoppingCarts(){
    //     return $this->hasMany(ShoppingCart::class);
    // }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function update_client($request){
        $this->update($request->all());
        $this->profile()->update([
            'rnc' => $request->rnc
        ]);
    }

    public function getAvatarAttribute(){
        $email = md5($this->email);
        return "https://i.pravatar.cc/150?u=/$email";
    }

    
}
