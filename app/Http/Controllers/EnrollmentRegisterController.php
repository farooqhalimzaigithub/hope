<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentRegister;
use Illuminate\Http\Request;

class EnrollmentRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['enrollments']=EnrollmentRegister::all();
         return view('pre_configuration.enrollment-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pre_configuration.enrollment-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EnrollmentRegister::create($request->all());
        return redirect()->route('enrollments.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnrollmentRegister  $enrollmentRegister
     * @return \Illuminate\Http\Response
     */
    public function show(EnrollmentRegister $enrollmentRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnrollmentRegister  $enrollmentRegister
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['enrollment']=EnrollmentRegister::find($id);
        return view('pre_configuration.enrollment-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnrollmentRegister  $enrollmentRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $enrollment =EnrollmentRegister::find($id);
      $enrollment->name=$request->name;
      $enrollment->save();
       return redirect()->route('enrollments.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnrollmentRegister  $enrollmentRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EnrollmentRegister::find($id)->delete();
           return redirect()->route('enrollments.index')->with('error','Data Delete Successfully');
    }
}
