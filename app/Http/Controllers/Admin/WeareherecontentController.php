<?php

namespace App\Http\Controllers\Admin;

use App\Weareherecontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WeareherecontentController extends Controller
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
        $weareherecontents = Weareherecontent::all();
        return view('admin.contentWearehere.wearehere_content')->with('weareherecontents',$weareherecontents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentWearehere.add_wearehere_content');
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

        $whyusImagepath = public_path('/whyus/whyus_images');
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($whyusImagepath, $input['imagename']);
        $imagedbPath = $whyusImagepath. '/'.$input['imagename'];
        $whyus_image = $input['imagename'];
        Weareherecontent::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $whyus_image,
        ]);
        return redirect('admin/weareherecontent')->with('message', 'Content Inserted Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weareherecontent  $weareherecontent
     * @return \Illuminate\Http\Response
     */
    public function show(Weareherecontent $weareherecontent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weareherecontent  $weareherecontent
     * @return \Illuminate\Http\Response
     */
    public function edit(Weareherecontent $weareherecontent)
    {
        return view('admin.contentWearehere.edit_wearehere_content',compact('weareherecontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weareherecontent  $weareherecontent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weareherecontent $weareherecontent)
    {

        $image_name = $request->old_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/whyus/whyus_images'), $image_name);
        }else{
            $request->validate([
                'title' => 'required|string|max:1000',
                'description' => 'required|string|min:1|max:1000',
            ],[
                'title.required' => 'Enter Section title',
                'description.required' => 'Enter description for We are here',
                'description.max' => 'Maximum 1000 characters only',
                'description.min' => 'Enter minimum 1 characters.',
            ]);
        }
            
        $form_data = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name,

        );

        Weareherecontent::whereId($weareherecontent->id)->update($form_data);
        return redirect('admin/weareherecontent')->with('message', 'Contents Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weareherecontent  $weareherecontent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weareherecontent $weareherecontent)
    {
        $data = Weareherecontent::findOrFail($weareherecontent->id);

        $data->delete();
        return redirect('admin/weareherecontent')->with('message', 'Content is successfully deleted');
    }
}
