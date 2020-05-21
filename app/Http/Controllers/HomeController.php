<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slidercontent;
use App\Workoutcontent;
use App\Aboutuscontent;
use App\Blog;
use App\Testimonialcontent;
use App\Homecontent;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slidercontents = Slidercontent::all();
        $aboutuscontents = Aboutuscontent::all();
        $homecontents = Homecontent::all();
        $testimonialcontents = Testimonialcontent::all();
        $workoutcontent = Workoutcontent::all();
        $blogs = Blog::orderBy('id','desc')->limit(3)->get();
        return view('user.home',compact('blogs','testimonialcontents','slidercontents','aboutuscontents','workoutcontent','homecontents'));
    }
}
