<?php

namespace App\Http\Controllers;

use App\Models\FreeClass;
use Illuminate\Http\Request;

class FreeClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['freeClasses']=FreeClass::all();
        return view('pre_configuration.class-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pre_configuration.class-manage.create');
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
        if(FreeClass::where('name', $request->name )->exists())
        return back()->withError('Record Already Exits');
       // Fee::create($request->all());
        else
       FreeClass::create($request->all());
        return redirect()->route('free_classes.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FreeClass  $freeClass
     * @return \Illuminate\Http\Response
     */
    public function show(FreeClass $freeClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FreeClass  $freeClass
     * @return \Illuminate\Http\Response
     */
    public function edit(FreeClass $freeClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FreeClass  $freeClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreeClass $freeClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FreeClass  $freeClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeClass $freeClass)
    {
        //
    }
}
