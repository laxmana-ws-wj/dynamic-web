<?php

namespace App\Http\Controllers\Admin;

use App\Slidercontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SlidercontentController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'slider_title' => 'required|string|max:2000',
            'slider_desc' => 'required',
            'bg_image' =>  'mimes:jpeg,jpg,png|required',
        ],[
            'slider_title.required' => 'Enter Slider Title',
            'slider_desc.required' => 'Enter Slider Description',
            'bg_image.required' => 'Upload Slider Image',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider_contents = Slidercontent::all();
       return view('admin.contentSlider.slider_list')->with('slider_contents',$slider_contents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentSlider.add_slider_content');
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
        $sliderImagepath = public_path('/slider/slider_images');
        $image = $request->file('bg_image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($sliderImagepath, $input['imagename']);
        $imagedbPath = $sliderImagepath. '/'.$input['imagename'];
        $slider_image = $input['imagename'];

        // $to_publish_on = str_replace('/', '-', $request->to_publish_on);

        Slidercontent::create([
            'slider_title' => $request->slider_title,
            'slider_desc' => $request->slider_desc,
            'bg_image' => $slider_image,
        ]);
        return redirect('admin/slidercontent')->with('message', 'Slider Content Inserted Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slidercontent  $slidercontent
     * @return \Illuminate\Http\Response
     */
    public function show(Slidercontent $slidercontent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slidercontent  $slidercontent
     * @return \Illuminate\Http\Response
     */
    public function edit(Slidercontent $slidercontent)
    {
        return view('admin.contentSlider.edit_slider_content',compact('slidercontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slidercontent  $slidercontent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slidercontent $slidercontent)
    {
        $image_name = $request->old_bg_image;
        $image = $request->file('bg_image');
        if($image != '')
        {
            $request->validate([
                'bg_image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/slider/slider_images'), $image_name);
        }
        else
        {
            $request->validate([
                'slider_title' => 'required|string|max:2000',
                'slider_desc' => 'required|string|min:5|max:2000',
            ],[
                'slider_title.required' => 'Enter workout title',
                'slider_desc.required' => 'Enter description heading tiitle',
                'slider_desc.max' => 'Maximum 100 characters only',
                'slider_desc.min' => 'Enter minimum 5 characters.',
            ]);
        }

        $form_data = array(
            'slider_title' => $request->slider_title,
            'slider_desc' => $request->slider_desc,
            'bg_image'    =>   $image_name,

        );

        Slidercontent::whereId($slidercontent->id)->update($form_data);
        return redirect('admin/slidercontent')->with('message', 'Slider Contents Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slidercontent  $slidercontent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slidercontent $slidercontent)
    {
        $data = Slidercontent::findOrFail($slidercontent->id);
        $image_path = "slider/slider_images/$slidercontent->bg_image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/slidercontent')->with('message', 'Slider Content is successfully deleted');
    }
}
