<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fees']=Fee::all();
        return view('pre_configuration.fee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['fee_categories']=FeeCategory::all();
         return view('pre_configuration.fee.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Fee::create($request->all());
        return redirect()->route('fees.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data['fee_categories']=FeeCategory::all();
        $data['fee']=Fee::find($id);
        return view('pre_configuration.fee.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $fee =Fee::find($id);
      $fee->name=$request->name;
      $fee->fee_category_id=$request->fee_category_id;
      $fee->save();
       return redirect()->route('fees.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fee::find($id)->delete();
           return redirect()->route('fees.index')->with('error','Data Delete Successfully');
    }
}
