<?php

namespace App\Http\Controllers\Admin;

use App\Testimonialcontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class TestimonialcontentController extends Controller
{
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string',
            'company_name' => 'required|string',
            'description' => 'required|string|min:5|max:2000',
            'image' => 'required',
        ],[
            'name.required' => 'Enter name',
            'description.required' => 'Enter description.',
            'company_name.required' => 'Enter company Name.',
            'image.required' => 'Please enter image',

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonialcontents = Testimonialcontent::all();
        return view('admin.contentTestimonial.testimonial_list',compact('testimonialcontents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentTestimonial.add_testimonial_content');

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

        if ($request->has('image')) {
            $image = $request->file('image');
            $imagename =  'testimonial_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/testimonials/testimonial_image');
            $image->move($destinationPath, $imagename);
            $image = $imagename;
        }

        Testimonialcontent::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'image' => $image,
        ]);
        return redirect('admin/testimonialcontent');
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
    public function edit(Testimonialcontent $testimonialcontent)
    {
        return view('admin.contentTestimonial.edit_testimonial_content',compact('testimonialcontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonialcontent $testimonialcontent)
    {
        $image_name = $request->old_testimonial_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'image|max:2048'
            ]);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('testimonials/testimonial_image'), $image_name);
        }
        else
        {
            $request->validate([
                'name' => 'required|string',
                'company_name' => 'required|string',
                'description' => 'required|string|min:5|max:2000',
            ],[
                'name.required' => 'Enter name',
                'description.required' => 'Enter description.',
                'company_name.required' => 'Enter company Name.',
            ]);
        }
        $form_data = array(
            'name' => $request->name,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'image' => $image_name,
        );
        Testimonialcontent::whereId($testimonialcontent->id)->update($form_data);
        // dd($form_data);

        return redirect('admin/testimonialcontent')->with('message', 'Testimonial content Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonialcontent $testimonialcontent)
    {   
        $data = Testimonialcontent::findOrFail($testimonialcontent->id);
        $image_path = public_path('testimonials/testimonial_image/'.$testimonialcontent->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/testimonialcontent')->with('message', 'Testimonial content is successfully deleted');
    }
}
