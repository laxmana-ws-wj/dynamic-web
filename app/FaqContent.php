<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faqcontent extends Model
{
    protected $fillable = [
        'faq_question', 'faq_answer'
    ];
}
