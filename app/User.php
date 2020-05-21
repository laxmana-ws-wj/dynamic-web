<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname','gender','age','height','weight','dob','username','profile_pic','contact_no','address','email', 'password','role','todays_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function reply()
    {
        return $this->hasMany('App\Reply');
    }

    public function pricingstatuses()
    {
        return $this->hasMany('App\Pricingstatus');
    }
    public function subscriptions()
    {
        return $this->hasOne('App\Subscription');
    }

    public function plans()
    {
    	return $this->belongsTo('App\Plan');
    }
}
