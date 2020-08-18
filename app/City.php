<?php

namespace App;

use App\Ticket;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','passengerCount'];

    public function ticketsTo()
    {
        return $this->hasMany(Ticket::class ,['to','from']);
    }

    // public function ticketsfrom()
    // {
    //     return $this->hasMany(Ticket::class , );
    // }
}
