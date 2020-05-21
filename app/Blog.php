<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
       'desc_heading', 'short_desc', 'long_desc', 'blog_image',
    ];
}
