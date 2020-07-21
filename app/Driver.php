<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';
    protected $fillable = ['driver_name','driver_age','driver_idn'];
}
