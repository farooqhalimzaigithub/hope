<?php

namespace App\Http\Controllers;

use App\Models\ClassSectionSession;
use Illuminate\Http\Request;
use App\Models\FreeClass;
use App\Models\Section;
use App\Models\Session;

class ClassSectionSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $data['class_section_sessions'] = ClassSectionSession::all();
          $data['class_section_sessions'] = ClassSectionSession::with('class','section','session')->get();
          // dd($class_section_sessions);
        return view('pre_configuration.css-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['free_classes'] = FreeClass::all();
        $data['sections'] = Section::all();
        $data['sessions']=Session::where('status',1)->get();
         return view('pre_configuration.css-manage.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->classSectionSessionValidation($request);
        if(request('section_id'))
        {

        if(ClassSectionSession::whereClassIdAndSectionIdAndSessionId(request('class_id'),request('section_id'),request('session_id'))->exists())
            return back()->withError('Sorry, this record is already exist. Try another one.');
        }
        else
        {
            if(ClassSectionSession::whereClassIdAndSessionId(request('class_id'),request('session_id'))->exists())
            return back()->withError('Sorry, this record is already exist. Try another one.');
        }
         $css=ClassSectionSession::create($request->except('_token'));
         // ClassSectionSession::create($request->all());
        return redirect()->route('class_section_session.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassSectionSession  $classSectionSession
     * @return \Illuminate\Http\Response
     */
    public function show(ClassSectionSession $classSectionSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassSectionSession  $classSectionSession
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSectionSession $classSectionSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassSectionSession  $classSectionSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassSectionSession $classSectionSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassSectionSession  $classSectionSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSectionSession $classSectionSession)
    {
        //
    }

     protected function classSectionSessionValidation(Request $request)
    {
        return $this->validate($request,[
            'class_id' => 'required',
            'session_id' => 'required'
        ]);
    }
}
