<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Homecontent;
class HomecontentController extends Controller
{


     protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:2000',
            'sub_title' => 'required|string|max:2000',
            'description' => 'required',
            'our_vision' => 'required',
            'our_mission' => 'required',
            'image' =>  'mimes:jpeg,jpg,png|required',
        ],[
            'title.required' => 'Enter Home Title',
            'sub_title.required' => 'Enter Sub Title',
            'description.required' => 'Enter Home Description',
            'our_vision.required' => 'Enter Home Description',
            'our_mission.required' => 'Enter Home Description',
            'image.required' => 'Upload Home Image',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $homecontents = Homecontent::all();
       return view('admin.contentHome.home_content')->with('homecontents',$homecontents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentHome.add_home_content');
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
        $homeImagepath = public_path('/home/home_images');
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($homeImagepath, $input['imagename']);
        $imagedbPath = $homeImagepath. '/'.$input['imagename'];
        $about_image = $input['imagename'];

        // $to_publish_on = str_replace('/', '-', $request->to_publish_on);

        Homecontent::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'our_vision' => $request->our_vision,
            'our_mission' => $request->our_mission,
            'image' => $about_image,
        ]);
        return redirect('admin/homecontent')->with('message', 'Home Content Inserted Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Homecontent $homecontent)
    {
        return view('admin.contentHome.edit_home_content',compact('homecontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Homecontent $homecontent)
    {
        $image_name = $request->old_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/home/home_images'), $image_name);
        }
        else
        {
            $request->validate([
                'title' => 'required|string|max:2000',
                'sub_title' => 'required|string|max:2000',
                'description' => 'required|string|min:1|max:3000',
                'our_vision' => 'required|string|min:1|max:3000',
                'our_mission' => 'required|string|min:1|max:3000',
            ],[
                'title.required' => 'Enter About Us title',
                'sub_title.required' => 'Enter sub title',
                'description.required' => 'Enter description for Home',
                'our_vision.required' => 'Enter description for vision',
                'our_mission.required' => 'Enter description for mission',
                'description.max' => 'Maximum 100 characters only',
                'description.min' => 'Enter minimum 1 characters.',
            ]);
        }

        $form_data = array(
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'our_vision' => $request->our_vision,
            'our_mission' => $request->our_mission,
            'image'    =>   $image_name,

        );

        Homecontent::whereId($homecontent->id)->update($form_data);
        return redirect('admin/homecontent')->with('message', 'Home Contents Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homecontent $homecontent)
    {
        $data = Homecontent::findOrFail($homecontent->id);
        $image_path = "home/home_images/$homecontent->image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/homecontent')->with('message', 'Content is successfully deleted');
    }
}
