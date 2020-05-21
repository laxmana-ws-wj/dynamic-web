<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workoutcontent extends Model
{
    protected $fillable = ['top_description','fitness_image','fitness_description','mindset_image','mindset_description','mobility_image','mobility_description','nutrition_image','nutrition_description'];
}
