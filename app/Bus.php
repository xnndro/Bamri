<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';
    protected $fillable = ['bus_pn','bus_brand','bus_seat','bus_price'];
}
