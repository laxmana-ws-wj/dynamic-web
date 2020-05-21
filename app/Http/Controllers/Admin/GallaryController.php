<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallary;
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


        if($request->hasfile('image'))
         {
            foreach($request->file('image') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/gallary/gallary_images/', $name);  
                $data = array(
                    'image'  => $name,
                ); 

                $insert_data[] = $data;
            }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
