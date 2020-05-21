<?php

namespace App\Http\Controllers\Admin;

use App\Faqcontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FaqcontentController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'faq_question' => 'required|string|max:2000',
            'faq_answer' => 'required',
        ],[
            'faq_question.required' => 'Enter Faq Question',
            'faq_answer.required' => 'Enter Faq Answer'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqcontents = Faqcontent::all();
        return view('admin.contentFaq.faq_list',compact('faqcontents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentFaq.add_faq_content');
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

        Faqcontent::create([
            'faq_question' => $request->faq_question,
            'faq_answer' => $request->faq_answer,
        ]);
        return redirect('admin/faqcontent')->with('message', 'Faq Content Inserted Successfully...');
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
    public function edit(Faqcontent $faqcontent)
    {
        // dd($faq);
        return view('admin.contentFaq.edit_faq_content',compact('faqcontent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faqcontent $faqcontent)
    {
        $this->validator($request->all())->validate();
        $faq_data=[
            'faq_question' => $request->faq_question,
            'faq_answer' => $request->faq_answer,
        ];
        Faqcontent::whereId($faqcontent->id)->update($faq_data);
        return redirect('admin/faqcontent')->with('message', 'Faq Content Update Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqcontent $faqcontent)
    {
        $data = Faqcontent::findOrFail($faqcontent->id);
        $data->delete();
        return redirect('admin/faqcontent')->with('message', 'Faq content is successfully deleted');
    }
}
