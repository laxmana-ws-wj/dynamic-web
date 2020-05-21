<?php

namespace App\Http\Controllers\User;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Aboutuscontent;
use App\Weareherecontent;
use App\Testimonialcontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function about_us(){
        $testimonialcontents = Testimonialcontent::all();
        $weareherecontents = Weareherecontent::all();
        $aboutuscontents = Aboutuscontent::all();
        return view('user.about_us',compact('aboutuscontents','weareherecontents','pricings','testimonialcontents'));
    }

}
