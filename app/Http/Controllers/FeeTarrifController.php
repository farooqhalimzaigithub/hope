<?php

namespace App\Http\Controllers;

use App\Models\FeeTarrif;
use App\Models\Level;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;

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

        $checker = FeeTarrif::where('class_id', $request->class_id)->where('fee_id', $request->fee_id)->get();
        // dd($checker);
       if ($checker->isEmpty()) {
            $record=FeeTarrif::create($request->all());
            return redirect()->route('fee_tarrifs.index')->withSuccess('Data Saved Successfully!');
        }else{
            return back()->withError('Data All ready 2 Exist!');
            
        }
         
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
    public function edit($id)
    {
       // dd($id);
        $data['fees']=Fee::all();
     $data['classes']=Level::all();
       $data['fee_tarrif']=FeeTarrif::find($id);
       return view('fee_tarrif.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeTarrif  $feeTarrif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record=FeeTarrif::find($id);
        $record=FeeTarrif::where('id',$id)->delete();
         $checker = FeeTarrif::where('class_id', $request->class_id)->where('fee_id', $request->fee_id)->get();
        // dd($checker);
       if ($checker->isEmpty()) {
            $record=FeeTarrif::create($request->all());
            return redirect()->route('fee_tarrifs.index')->withSuccess('Data Saved Successfully!');
        }else{
            return back()->withError('Data All ready 2 Exist!');
            
        }


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
