<?php

namespace App\Http\Controllers\Admin;

use App\Contactuscontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class ContactuscontentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_us_content = Contactuscontent::all();

        // print_r($contact_us_content);
        if ($contact_us_content == "[]"){
            // echo "Empty"; 
            return view('admin.contentContactUs.add_contctus_content');
        }else{
            
            // echo "DATA Present";
            // return view('admin.contentContactUs.edit_contctus_content', compact('$contact_us_content'));
            return view('admin.contentContactUs.contactus_content', compact('contact_us_content'));
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [        
            'contact_us_1' => 'required|numeric|digits:10',
            'contact_us_2' => 'required|numeric|digits:10',
            'our_email' => 'required|string|email|max:255',
            'our_address' => 'required|string|max:2000',
            'map_link' => 'required|string|max:2000',
        ],[
            'contact_us_1.required' => 'Enter Contact Number',
            'contact_us_1.numeric' => 'Enter only numeric value.',
            'contact_us_1.max' => 'Enter only 10 digits',

            'contact_us_2.required' => 'Enter Contact Number',
            'contact_us_2.numeric' => 'Enter only numeric value.',
            'contact_us_2.max' => 'Enter only 10 digits',

            'our_email.email' => 'Please Enter Valid Email Address ',
            'our_address.required' => 'Enter Our address',
            'map_link.required' => 'Enter Map Link',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request);
         $this->validator($request->all())->validate(); 
         Contactuscontent::create([
             'call_us_now_1' => $request->contact_us_1,
             'call_us_now_2' => $request->contact_us_2,
             'our_email' => $request->our_email,
             'our_address' => $request->our_address,
             'map_link' => $request->map_link,
         ]);
        $contact_us_content = Contactuscontent::all();
        return view('admin.contentContactUs.contactus_content', compact('contact_us_content'));
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contactuscontent  $contactuscontent
     * @return \Illuminate\Http\Response
     */
    public function show(Contactuscontent $contactuscontent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contactuscontent  $contactuscontent
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactuscontent $contactuscontent)
    {
        // dd($contactuscontent);
        return view('admin.contentContactUs.edit_contctus_content', compact('contactuscontent'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contactuscontent  $contactuscontent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactuscontent $contactuscontent)
    {        
        $this->validator($request->all())->validate();
        $image_name = $request->old_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image' =>  'image|max:2048'
            ]);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('logo/logo_images'), $image_name);
        }
        $form_data = array(
            'call_us_now_1' => $request->contact_us_1,
            'call_us_now_2' => $request->contact_us_2,
            'our_email' => $request->our_email,
            'our_address' => $request->our_address,
            'map_link' => $request->map_link,
            'image' => $image_name,
            'fb_link' => $request->fb_link,
            'tw_link' => $request->tw_link,
            'li_link' => $request->li_link,
            'description' => $request->description,
        );
        Contactuscontent::whereId($contactuscontent->id)->update($form_data);
        // dd($form_data);
        return redirect('admin/contactuscontent')->with('message', 'Contact Us details Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactuscontent  $contactuscontent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactuscontent $contactuscontent)
    {
        $data = Contactuscontent::findOrFail($contactuscontent->id);
        $data->delete();
        return redirect('admin/contactuscontent')->with('message', 'Contact Us details successfully deleted');
    }
}
