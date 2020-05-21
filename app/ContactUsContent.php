<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactuscontent extends Model
{
    protected $fillable = [
        'call_us_now_1', 'call_us_now_2', 'our_email', 'our_address', 'map_link'
    ];
}
