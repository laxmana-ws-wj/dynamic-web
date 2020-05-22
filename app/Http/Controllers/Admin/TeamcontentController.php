<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teamcontent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class TeamcontentController extends Controller
{
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string',
            'position' => 'required|string',
            'description' => 'required|string|min:5|max:2000',
            'image' => 'required',
        ],[
            'name.required' => 'Enter name',
            'description.required' => 'Enter description.',
            'position.required' => 'Enter position Name.',
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
        $teamcontents = Teamcontent::all();
        return view('admin.contentTeam.team_list',compact('teamcontents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentTeam.add_team_content');
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
            $imagename =  time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/team/team_images');
            $image->move($destinationPath, $imagename);
            $image = $imagename;
        }

        Teamcontent::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $image,
        ]);
        return redirect('admin/teamcontent');
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
    public function edit(Teamcontent $teamcontent)
    {
        return view('admin.contentTeam.edit_team_content',compact('teamcontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teamcontent $teamcontent)
    {
        $image_name = $request->old_team_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'image|max:2048'
            ]);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('team/team_images'), $image_name);
        }
        else
        {
            $request->validate([
                'name' => 'required|string',
                'position' => 'required|string',
                'description' => 'required|string|min:5|max:2000',
            ],[
                'name.required' => 'Enter name',
                'description.required' => 'Enter description.',
                'position.required' => 'Enter company Name.',
            ]);
        }
        $form_data = array(
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $image_name,
        );
        Teamcontent::whereId($teamcontent->id)->update($form_data);
        // dd($form_data);

        return redirect('admin/teamcontent')->with('message', 'Team content Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teamcontent $teamcontent)
    {   
        $data = Teamcontent::findOrFail($teamcontent->id);
        $image_path = public_path('team/team_images/'.$teamcontent->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/teamcontent')->with('message', 'Team content is successfully deleted');
    }
}
