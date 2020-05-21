<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Mail\Contactemail;
use App\Contactuscontent;
use Mail;
use App\Enquiry;
class ContactController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'uname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject'=> 'required|string|max:2000',

        ],[
            'uname.required' => 'Enter your name.',
            'email.required' => 'Enter your email.',
            'email.email' => 'Enter valid email id.',
            'subject.required' => 'Enter your subject.',
            'subject.max' => 'Enter only 2000 Character.',
        ]);
    }
    
    public function index()
    {
        $contactuscontent = Contactuscontent::all();
        // dd($contactuscontent);
        return view('user.contact_us', compact('contactuscontent'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = array(
            'uname' => $request->uname,
            'email' => $request->email,
            'subject' => $request->subject,
        );
        Enquiry::create([
            'uname' => $request->uname,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        Mail::to('laxmana.walstartechnologies@gmail.com')->send(new Contactemail($user));
        return redirect('contact')->with('message','Your inquiry is sent...');
    }
    
    
    public function show($id)
    {
     //
    }
}