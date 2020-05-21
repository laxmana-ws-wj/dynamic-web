<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonialcontent extends Model
{
    protected $fillable = [
        'name', 'company_name', 'image', 'description',
    ];

}
