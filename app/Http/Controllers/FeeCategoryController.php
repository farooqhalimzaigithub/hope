<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fee_categories']=FeeCategory::all();
         return view('pre_configuration.fee-category-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pre_configuration.fee-category-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FeeCategory::create($request->all());
        return redirect()->route('fee_categories.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FeeCategory $feeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['fee_category']=FeeCategory::find($id);
        return view('pre_configuration.fee-category-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $fee_category =FeeCategory::find($id);
      $fee_category->name=$request->name;
      $fee_category->save();
       return redirect()->route('fee_categories.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FeeCategory::find($id)->delete();
           return redirect()->route('fee_categories.index')->with('error','Data Delete Successfully');
    }
}
