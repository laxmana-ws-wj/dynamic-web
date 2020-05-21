<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slidercontent extends Model
{
    protected $fillable = [
        'slider_title','slider_desc','bg_image'
    ];
}
