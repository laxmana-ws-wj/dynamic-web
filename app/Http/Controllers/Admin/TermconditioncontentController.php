<?php

namespace App\Http\Controllers\Admin;

use App\Termconditioncontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TermconditioncontentController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'termsandconditions' => 'required|string',
        ],[
            'termsandconditions.required' => 'Enter Terms and Condition',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termconditioncontents = Termconditioncontent::all();
        return view('admin.contentTerms.termcondition_list', compact('termconditioncontents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentTerms.add_termcondition_content');
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

        Termconditioncontent::create([
            'termsandconditions' => $request->termsandconditions,
        ]);
        return redirect('admin/termconditioncontent')->with('message', 'Terms and Condition Content Inserted Successfully...');
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
    public function edit(Termconditioncontent $termconditioncontent)
    {
        return view('admin.contentTerms.edit_termcondition_content',compact('termconditioncontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Termconditioncontent $termconditioncontent)
    {
        $this->validator($request->all())->validate();
        $form_data=[
            'termsandconditions' => $request->termsandconditions,
        ];
        Termconditioncontent::whereId($termconditioncontent->id)->update($form_data);
        return redirect('admin/termconditioncontent')->with('message', 'Term & Condition content Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Termconditioncontent $termconditioncontent)
    {
        $data = Termconditioncontent::findOrFail($termconditioncontent->id);
        $data->delete();
        return redirect('admin/termconditioncontent')->with('message', 'Term & Condition content is successfully deleted');
    }
}
