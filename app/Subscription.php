<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'email',  
    ];

    public function verification_status(){

    }

    public function getAvatarAttribute(){
        $email = $this->email;
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email)));
    }
}
