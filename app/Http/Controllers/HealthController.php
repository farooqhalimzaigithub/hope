<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $data['healths']=Health::all();
         return view('pre_configuration.health-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pre_configuration.health-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Health::create($request->all());
        return redirect()->route('healths.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function show(Health $health)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['health']=Health::find($id);
        return view('pre_configuration.health-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $health =Health::find($id);
      $health->name=$request->name;
      $health->save();
       return redirect()->route('healths.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Health::find($id)->delete();
           return redirect()->route('healths.index')->with('error','Data Delete Successfully');
    }
}
