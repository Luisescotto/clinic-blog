<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Qr extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'url',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
