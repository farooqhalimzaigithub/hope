<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Session;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['modules'] = Module::all();
        return view('module-managment.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['modules']= Module::all();
        // dd($data['modules']);
         return view('module-managment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $creatmodule=Module::create($request->all());
        return redirect()->route('modules.index')->with('success','Data added Successfully');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $data['module']=Module::find($id);
        // $data['modules']=Module::all();
    // dd($data);
        return view('module-managment.edit',$data);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $module=Module::find($id);
        $module->name=$request->input('name');
        $module->route_name=$request->input('route_name');
        $module->route_url=$request->input('route_url');
        $module->visibility=$request->input('visibility');
        $module->parent_id=$request->input('parent_id');
        $module->save();
        return redirect()->route('modules.index')->with('info','Data Updateed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Module::find($id)->delete();
           return redirect()->route('modules.index')->with('error','Module deleted successfully');
    }
}
