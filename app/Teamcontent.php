<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamcontent extends Model
{
    protected $fillable = [
        'name', 'position', 'image', 'description',
    ];
}
