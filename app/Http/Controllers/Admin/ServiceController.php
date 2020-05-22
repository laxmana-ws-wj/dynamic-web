<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class ServiceController extends Controller
{
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:2000',
            'description' => 'required',
            'icon' => 'required',
            'image' =>  'mimes:jpeg,jpg,png|required',
        ],[
            'title.required' => 'Enter Title',
            'icon.required' => 'Enter Icon',
            'description.required' => 'Enter Description',
            'image.required' => 'Upload Why us Image',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicecontents = Service::all();
        return view('admin.contentService.service_content')->with('servicecontents',$servicecontents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentservice.add_service_content');
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

        $serviceImagepath = public_path('/service/service_images');
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($serviceImagepath, $input['imagename']);
        $imagedbPath = $serviceImagepath. '/'.$input['imagename'];
        $service_image = $input['imagename'];
        Service::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
            'image' => $service_image,
        ]);
        return redirect('admin/service')->with('message', 'Services Inserted Successfully...');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

        $image_name = $request->old_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/service/service_images'), $image_name);
        }else{
            $request->validate([
                'title' => 'required|string|max:1000',
                'icon' => 'required',
                'description' => 'required|string|min:1|max:1000',
            ],[
                'title.required' => 'Enter Section title',
                'icon.required' => 'Enter Icon',
                'description.required' => 'Enter description for We are here',
                'description.max' => 'Maximum 1000 characters only',
                'description.min' => 'Enter minimum 1 characters.',
            ]);
        }
            
        $form_data = array(
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
            'image' => $image_name,

        );

        Service::whereId($service->id)->update($form_data);
        return redirect('admin/service')->with('message', 'Service Update Successfully...');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy(Service $weareherecontent)
    {
        $data = Weareherecontent::findOrFail($weareherecontent->id);

        $data->delete();
        return redirect('admin/service')->with('message', 'Service is successfully deleted');
    }
}
