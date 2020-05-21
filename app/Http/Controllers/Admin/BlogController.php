<?php

namespace App\Http\Controllers\Admin;

use App\Blog;

use App\Workout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{


    protected function validator(array $data)
    {

        return Validator::make($data, [
            'desc_heading' => 'required|string|max:2000',
            'short_desc' => 'required|string|min:5|max:2000',
            'long_desc' => 'required|string|min:5|max:2000',
            'blog_image' => 'required',
        ],[
            'desc_heading.required' => 'Enter description heading tiitle',
            'desc_heading.max' => 'Maximum 100 characters only',
            'desc_heading.min' => 'Enter minimum 50 characters.',
            'short_desc.required' => 'Enter short description.',
            'short_desc.min' => 'Enter minimum 50 characters.',
            'short_desc.max' => 'Maximum 200 characters only',
            'long_desc.required' => 'Enter long description.',
            'long_desc.min' => 'Enter minimum 100 characters.',
            'long_desc.max' => 'Maximum 2000 characters only',
            'blog_image.required' => 'Please enter image',

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $blogs = Blog::all();
        return view('admin.blog.blog_list')->with('blogs',Blog::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.blog_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        if ($request->has('blog_image')) {
            $image = $request->file('blog_image');
            $imagename =  'blog_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/blogs/blog_images');
            $image->move($destinationPath, $imagename);
            $blog_image = $imagename;
        }

         Blog::create([
            'desc_heading' => $request->desc_heading,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'blog_image' => $blog_image,
        ]);
        return redirect('admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.blog_edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // dd($request);die;
        $image_name = $request->old_blog_image;
        $image = $request->file('blog_image');
        if($image != '')
        {
            $request->validate([
                'blog_image' =>  'image|max:2048'
            ]);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blogs/blog_images'), $image_name);
        }
        else
        {
            $request->validate([
                'desc_heading' => 'required|string|max:2000',
                'short_desc' => 'required|string|min:5|max:2000',
                'long_desc' => 'required|string|min:5|max:2000',
            ],[
                'desc_heading.required' => 'Enter description heading tiitle',
                'desc_heading.max' => 'Maximum 100 characters only',
                'desc_heading.min' => 'Enter minimum 50 characters.',
                'short_desc.required' => 'Enter short description.',
                'short_desc.min' => 'Enter minimum 50 characters.',
                'short_desc.max' => 'Maximum 200 characters only',
                'long_desc.required' => 'Enter long description.',
                'long_desc.min' => 'Enter minimum 100 characters.',
                'long_desc.max' => 'Maximum 2000 characters only',
            ]);
        }
        $form_data = array(
            'desc_heading' => $request->desc_heading,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'blog_image' => $image_name,
        );
        Blog::whereId($blog->id)->update($form_data);
        // dd($form_data);

        return redirect('admin/blog')->with('message', 'Blog Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $data = Blog::findOrFail($blog->id);
        $image_path = "asset/admin_assets/blog_images/$blog->blog_image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/blog')->with('message', 'Blog is successfully deleted');
    }

}
