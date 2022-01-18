<?php

namespace App\Http\Controllers;

use App\Models\FeeTarrif;
use App\Models\Level;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeTarrifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['fee_tarrifs']=FeeTarrif::all();
        return view('fee_tarrif.index',$data);
    }

    public function getFee(Request $request)
    {
        $data=Fee::all();
        return response()->json($data);

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
        return view('fee_tarrif.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeTarrif $fee_tarrif,Request $request)
    {
        $this->validate($request,['class_id' => 'required']);
        if(FeeTarrif::where('class_id', $request->class_id )->exists())
        return back()->withError('Record Already Exits');
        
        if($fee_tarrif->create(request()->except('_token')))
            return redirect()->route('fee_tarrifs.index')->withSuccess('Data Saved Successfully!');
        else
            return back()->withError('Data Not Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeTarrif  $feeTarrif
     * @return \Illuminate\Http\Response
     */
    public function show(FeeTarrif $feeTarrif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeeTarrif  $feeTarrif
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeTarrif $feeTarrif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeTarrif  $feeTarrif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeTarrif $feeTarrif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeTarrif  $feeTarrif
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeTarrif $feeTarrif)
    {
        //
    }
}
