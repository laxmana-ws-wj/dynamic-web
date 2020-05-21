<?php

namespace App\Http\Controllers\Admin;

use App\Workoutcontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class WorkoutcontentController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'top_description' => 'required|string|max:2000',
            'fitness_description' => 'required',
            'fitness_image' =>  'mimes:jpeg,jpg,png|required',
            'mindset_description' => 'required',
            'mindset_image' =>  'mimes:jpeg,jpg,png|required',
            'mobility_description' => 'required',
            'mobility_image' =>  'mimes:jpeg,jpg,png|required',
            'nutrition_description' => 'required',
            'nutrition_image' =>  'mimes:jpeg,jpg,png|required',
        ],[
            'top_description.required' => 'Enter About Title',
            'fitness_description.required' => 'Enter Description',
            'mindset_description.required' => 'Enter Description',
            'mobility_description.required' => 'Enter Description',
            'nutrition_description.required' => 'Enter Description',
            'fitness_image.required' => 'Upload Image',
            'mindset_image.required' => 'Upload Image',
            'mobility_image.required' => 'Upload Image',
            'nutrition_image.required' => 'Upload Image',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workoutcontents = Workoutcontent::all();
        return view('admin.contentWorkout.workout_content')->with('workoutcontents',$workoutcontents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentWorkout.add_workout_content');
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
        $fitnessImagepath = public_path('/aboutus/aboutus_images');
        $image = $request->file('fitness_image');
        $input1['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($fitnessImagepath, $input1['imagename']);
        $imagedbPath = $fitnessImagepath. '/'.$input1['imagename'];
        $fitness_image = $input1['imagename'];

        $mindsetImagepath = public_path('/aboutus/aboutus_images');
        $image = $request->file('mindset_image');
        $input2['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($mindsetImagepath, $input2['imagename']);
        $imagedbPath = $mindsetImagepath. '/'.$input2['imagename'];
        $mindset_image = $input2['imagename'];

        $mobilityImagepath = public_path('/aboutus/aboutus_images');
        $image = $request->file('mobility_image');
        $input3['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($mobilityImagepath, $input3['imagename']);
        $imagedbPath = $mobilityImagepath. '/'.$input3['imagename'];
        $mobility_image = $input3['imagename'];

        $nutritionImagepath = public_path('/aboutus/aboutus_images');
        $image = $request->file('nutrition_image');
        $input4['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($nutritionImagepath, $input4['imagename']);
        $imagedbPath = $nutritionImagepath. '/'.$input4['imagename'];
        $nutrition_image = $input4['imagename'];

        // $to_publish_on = str_replace('/', '-', $request->to_publish_on);

        Workoutcontent::create([
            'top_description' => $request->top_description,
            'fitness_description' => $request->fitness_description,
            'fitness_image' => $fitness_image,
            'mindset_description' => $request->mindset_description,
            'mindset_image' => $mindset_image,
            'mobility_description' => $request->mobility_description,
            'mobility_image' => $mobility_image,
            'nutrition_description' => $request->nutrition_description,
            'nutrition_image' => $nutrition_image,

        ]);
        return redirect('admin/workoutcontent')->with('message', 'Content Inserted Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workoutcontent  $workoutcontent
     * @return \Illuminate\Http\Response
     */
    public function show(Workoutcontent $workoutcontent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workoutcontent  $workoutcontent
     * @return \Illuminate\Http\Response
     */
    public function edit(Workoutcontent $workoutcontent)
    {
        return view('admin.contentWorkout.edit_workout_content',compact('workoutcontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workoutcontent  $workoutcontent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workoutcontent $workoutcontent)
    {
        $fitness_image_name = $request->old_fitness_image;
        $fitness_image = $request->file('fitness_image');
        $mindset_image_name = $request->old_mindset_image;
        $mindset_image = $request->file('mindset_image');
        $mobility_image_name = $request->old_mobility_image;
        $mobility_image = $request->file('mobility_image');
        $nutrition_image_name = $request->old_nutrition_image;
        $nutrition_image = $request->file('nutrition_image');
        if($fitness_image != '')
        {
            $request->validate([
                'fitness_image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $fitness_image_name = time() . '.' . $fitness_image->getClientOriginalExtension();
            $fitness_image->move(public_path('/aboutus/aboutus_images'), $fitness_image_name);
        }
        if($mindset_image != '')
        {
            $request->validate([
                'mindset_image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $mindset_image_name = time() . '.' . $mindset_image->getClientOriginalExtension();
            $mindset_image->move(public_path('/aboutus/aboutus_images'), $mindset_image_name);
        }
        if($mobility_image != '')
        {
            $request->validate([
                'mobility_image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $mobility_image_name = time() . '.' . $mobility_image->getClientOriginalExtension();
            $mobility_image->move(public_path('/aboutus/aboutus_images'), $mobility_image_name);
        }
        if($nutrition_image != '')
        {
            $request->validate([
                'nutrition_image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $nutrition_image_name = time() . '.' . $nutrition_image->getClientOriginalExtension();
            $nutrition_image->move(public_path('/aboutus/aboutus_images'), $nutrition_image_name);
        }


            $request->validate([
                'top_description' => 'required|string|max:2000',
                'fitness_description' => 'required',
                'mindset_description' => 'required',
                'mobility_description' => 'required',
                'nutrition_description' => 'required',
            ],[
                'top_description.required' => 'Enter Description',
                'fitness_description.required' => 'Enter Description',
                'mindset_description.required' => 'Enter Description',
                'mobility_description.required' => 'Enter Description',
                'nutrition_description.required' => 'Enter Description',
            ]);


        $form_data = array(
            'top_description' => $request->top_description,
            'fitness_description' => $request->fitness_description,
            'fitness_image'    =>   $fitness_image_name,
            'mindset_description' => $request->mindset_description,
            'mindset_image'    =>   $mindset_image_name,
            'mobility_description' => $request->mobility_description,
            'mobility_image'    =>   $mobility_image_name,
            'nutrition_description' => $request->nutrition_description,
            'nutrition_image'    =>   $nutrition_image_name,
        );

        Workoutcontent::whereId($workoutcontent->id)->update($form_data);
        return redirect('admin/workoutcontent')->with('message', 'Contents Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workoutcontent  $workoutcontent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workoutcontent $workoutcontent)
    {
        $data = Workoutcontent::findOrFail($workoutcontent->id);
        $fitness_image_path = "aboutus/aboutus_images/$workoutcontent->fitness_image";
        $mindset_image_path = "aboutus/aboutus_images/$workoutcontent->mindset_image";
        $mobility_image_path = "aboutus/aboutus_images/$workoutcontent->mobiltiy_image";
        $nutrition_image_path = "aboutus/aboutus_images/$workoutcontent->nutrition_image";
        if(File::exists($fitness_image_path)&&File::exists($mindset_image_path)&&File::exists($mobility_image_path)&&File::exists($nutrition_image_path)) {
            File::delete($fitness_image_path);
            File::delete($mindset_image_path);
            File::delete($mobility_image_path);
            File::delete($nutrition_image_path);
        }
        $data->delete();
        return redirect('admin/workoutcontents')->with('message', 'Content is successfully deleted');
    }
}
