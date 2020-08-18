<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['price','emptySeating','date','from','to','company_id' , 'hourNumber'];

    public function fromCity()
    {
        return $this->belongsTo(City::class , 'from');
    }

    public function toCity()
    {
        return $this->belongsTo(City::class , 'to');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
