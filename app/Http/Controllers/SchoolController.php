<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['schools']=School::all();
         // dd($data['schools']);
        return view('pre_configuration.school-manage.index',$data);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('pre_configuration.school-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School();
        $school->name=$request->name;
        $school->user_id=Auth::user()->id;
        $school->save();
        // School::create($request->all());

        return redirect()->route('schools.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['school']=School::find($id);

        return view('pre_configuration.school-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school =School::find($id);
      $school->name=$request->name;
      // $school->user_id=$request->user_id;
      $school->save();
       return redirect()->route('schools.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        School::find($id)->delete();
           return redirect()->route('schools.index')->with('error','Data Delete Successfully');
    }
}
