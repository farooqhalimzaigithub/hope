<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['examtypes']=ExamType::all();
         return view('pre_configuration.exam-type-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pre_configuration.exam-type-manage.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         ExamType::create($request->all());
        return redirect()->route('examtypes.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function show(ExamType $examType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['examtype']=ExamType::find($id);
        return view('pre_configuration.exam-type-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $examtype =ExamType::find($id);
      $examtype->exam_type=$request->exam_type;
      $examtype->save();
       return redirect()->route('examtypes.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         ExamType::find($id)->delete();
           return redirect()->route('examtypes.index')->with('error','Data Delete Successfully');
    }
}
