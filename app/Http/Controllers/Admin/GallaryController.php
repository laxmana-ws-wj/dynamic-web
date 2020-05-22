<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallary;
use Illuminate\Support\Facades\File;
class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallarycontents = Gallary::all();
        return view('admin.contentGallary.gallary_content')->with('gallarycontents',$gallarycontents);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentGallary.add_gallary_content');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'image' => 'required',
                'image.*' => 'mimes:jpeg,jpg,png|required'
        ]);

          if(!empty($request->file('image'))){
                foreach($request->file('image') as $img)
                {
                    $name=rand().$img->getClientOriginalExtension();
                    $img->move(public_path().'/gallary/gallary_images', $name);
                    $gallary_image[] = $name;
                }
            }

            for($count = 0; $count < count($request->file('image')); $count++)
                {
                    if(!empty($gallary_image[$count])){
                        $image = $gallary_image[$count];
                    }else{
                        $image = "";
                    }
                $data = array(
                    
                    'image'  => $image,
                );
                $insert_data[] = $data;
            }
        Gallary::insert($insert_data);
        
        return redirect('admin/gallarycontent')->with('message', 'Gallary Images Inserted Successfully...');
      
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
  public function edit(Gallary $gallarycontent)
    {
        return view('admin.contentGallary.edit_gallary_content',compact('gallarycontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallary $gallarycontent)
    {
        $image_name = $request->old_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'mimes:jpeg,jpg,png|max:2084',
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/gallary/gallary_images'), $image_name);
        }

        $form_data = array(
            'image'    =>   $image_name,

        );

        Gallary::whereId($gallarycontent->id)->update($form_data);
        return redirect('admin/gallarycontent')->with('message', 'Gallary Image Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy(Gallary $gallarycontent)
    {
        $data = Gallary::findOrFail($gallarycontent->id);
        $image_path = "gallary/gallary_images/$gallarycontent->image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/gallarycontent')->with('message', 'Slider Content is successfully deleted');
    }
}
