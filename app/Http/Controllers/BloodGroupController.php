<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use Illuminate\Http\Request;

class BloodGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bloods']=BloodGroup::all();
        return view('pre_configuration.blood-group-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pre_configuration.blood-group-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name' => 'required']);
        if(BloodGroup::where('name',$request->name)->exists())
        return back()->withError('Record Already Exits');
        else
        BloodGroup::create($request->all());
        return redirect()->route('bloods.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function show(BloodGroup $bloodGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blood']=BloodGroup::find($id);
        return view('pre_configuration.blood-group-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blood =BloodGroup::find($id);
      $blood->name=$request->name;
      $blood->save();
       return redirect()->route('bloods.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         BloodGroup::find($id)->delete();
           return redirect()->route('bloods.index')->with('error','Data Delete Successfully');
    }
}
