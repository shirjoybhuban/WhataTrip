<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
        protected $fillable = [
        'HotelName', 'HotelAddress', 'City','Country','Room',
    ];
}
