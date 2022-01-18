<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Fee;
use App\Models\ClassTarrif;
use Illuminate\Http\Request;

class ClassTarrifController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['class_tarrifs']=ClassTarrif::all();
        return view('class_tarrif.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fees']=Fee::all();
        $data['classes']=Level::all();
        return view('class_tarrif.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassTarrif $class_tarrif, Request $request)
    {
        $this->validate($request,['class_id' => 'required']);
        if(ClassTarrif::where('class_id', $request->class_id )->exists())
        return back()->withError('Record Already Exits');
        
        if($class_tarrif->create(request()->except('_token')))
            return redirect()->route('class_tarrifs.index')->withSuccess('Data saved successfully!');
        else
            return back()->withError('Data not saved!');


        // ClassTarrif::create($request->all());
        // return redirect()->route('class_tarrifs.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassTarrif  $classTarrif
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTarrif $classTarrif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassTarrif  $classTarrif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['fees']=Fee::all();
        $data['classes']=Level::all();
        $data['class_tarrif']=ClassTarrif::find($id);
        return view('class_tarrif.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassTarrif  $classTarrif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $class_tarrif =ClassTarrif::find($id);
      $class_tarrif->amount=$request->amount;
      $class_tarrif->class_id=$request->class_id;
      $class_tarrif->fee_id=$request->fee_id;
      $class_tarrif->save();
       return redirect()->route('class_tarrifs.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassTarrif  $classTarrif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('ook');
        ClassTarrif::find($id)->delete();
           return redirect()->route('class_tarrifs.index')->with('error','Data Delete Successfully');
    }
}
