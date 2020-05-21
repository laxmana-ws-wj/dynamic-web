<?php

namespace App\Http\Controllers\Admin;

use App\Aboutuscontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AboutuscontentController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:2000',
            'description' => 'required',
            'image' =>  'mimes:jpeg,jpg,png|required',
        ],[
            'title.required' => 'Enter About Title',
            'description.required' => 'Enter Aout Us Description',
            'image.required' => 'Upload About Us Image',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutuscontents = Aboutuscontent::all();
       return view('admin.contentAboutUs.aboutus_content')->with('aboutuscontents',$aboutuscontents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentAboutUs.add_aboutus_content');
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

        // Image Upload
        $aboutusImagepath = public_path('/aboutus/aboutus_images');
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($aboutusImagepath, $input['imagename']);
        $imagedbPath = $aboutusImagepath. '/'.$input['imagename'];
        $about_image = $input['imagename'];

        // $to_publish_on = str_replace('/', '-', $request->to_publish_on);

        Aboutuscontent::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $about_image,
        ]);
        return redirect('admin/aboutuscontent')->with('message', 'About Us Content Inserted Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aboutuscontent  $aboutuscontent
     * @return \Illuminate\Http\Response
     */
    public function show(Aboutuscontent $aboutuscontent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aboutuscontent  $aboutuscontent
     * @return \Illuminate\Http\Response
     */
    public function edit(Aboutuscontent $aboutuscontent)
    {
        return view('admin.contentAboutUs.edit_aboutus_content',compact('aboutuscontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aboutuscontent  $aboutuscontent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aboutuscontent $aboutuscontent)
    {
        $image_name = $request->old_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/aboutus/aboutus_images'), $image_name);
        }
        else
        {
            $request->validate([
                'title' => 'required|string|max:2000',
                'description' => 'required|string|min:1|max:3000',
            ],[
                'title.required' => 'Enter About Us title',
                'description.required' => 'Enter description for about us',
                'description.max' => 'Maximum 100 characters only',
                'description.min' => 'Enter minimum 1 characters.',
            ]);
        }

        $form_data = array(
            'title' => $request->title,
            'description' => $request->description,
            'image'    =>   $image_name,

        );

        Aboutuscontent::whereId($aboutuscontent->id)->update($form_data);
        return redirect('admin/aboutuscontent')->with('message', 'About Us Contents Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aboutuscontent  $aboutuscontent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aboutuscontent $aboutuscontent)
    {
        $data = Aboutuscontent::findOrFail($aboutuscontent->id);
        $image_path = "aboutus/aboutus_images/$aboutuscontent->image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/aboutuscontent')->with('message', 'Content is successfully deleted');
    }
}
