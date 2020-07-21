<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_cn','order_cp','order_start','order_total','bus_id','driver_id'];
}
