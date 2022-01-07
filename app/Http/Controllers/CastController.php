<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['casts']=Cast::all();
        return view('pre_configuration.cast-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('pre_configuration.cast-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['title' => 'required']);
        if(Cast::where('title',$request->title)->exists())
        return back()->withError('Record Already Exits');
        else
         Cast::create($request->all());
        return redirect()->route('casts.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function show(Cast $cast)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['cast']=Cast::find($id);
        return view('pre_configuration.cast-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cast =Cast::find($id);
      $cast->title=$request->title;
      $cast->save();
       return redirect()->route('casts.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Cast::find($id)->delete();
           return redirect()->route('casts.index')->with('error','Data Delete Successfully');
    }
}
