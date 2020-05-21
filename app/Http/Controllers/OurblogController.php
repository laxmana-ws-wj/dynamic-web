<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
class OurblogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        return view('user.blogs', compact('blogs'));
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        // dd($blog);
        return view('user.blogsdetails',compact('blog'));
    }
}
