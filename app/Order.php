<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'numberOfperson','price','from','to','Company','accept','user_id','total','date' ,'hourNumber'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
