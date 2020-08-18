<?php

namespace App;

use App\Ticket;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','passengerCount' , 'busNumber'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
