<?php

namespace App\Http\Controllers;

use App\Models\FeeTarrif;
use App\Models\Level;
use App\Models\Fee;
use App\Models\FeeCollect;
use App\Models\FeeHistory;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\ClassSectionSession;
use App\Models\Session;
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

       $data['fee_tarrifs']=FeeTarrif::with('css')->get();
       
      // dd($data['fee_tarrifs']);
       return view('fee_tarrif.index',$data);
   }
   public function feeDetail()
    {
        // dd('okk');
        $ssn=Session::where('status',1)->first();
        $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ssn->id)->get();
        // dd($data['classSectionSession']);
        return view('fee_tarrif.fee_detail',$data);
    }
    public function getCSS(Request $request)
    {

// $data=StudentClass::with('student','feeTarrif','css.class','feeCollect')->where('class_section_session_id',$request->class_section_session_id)->whereMonth('received_date', date('m'))
// ->whereYear('received_date', date('Y'))->get();

 $data = StudentClass::where('class_section_session_id', $request->class_section_session_id)->with(['feeCollect' => function ($q) {
            $q->orderBy("id", "DESC")->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'));
        },'student','feeTarrif','css.class'])->get();
// StudentClass::whereIn('id', function($query){
//     $query->select('paper_type_id')
//     ->from(with(new ProductCategory)->getTable())
//     ->whereIn('category_id', ['223', '15'])
//     ->where('active', 1);
// })->get();



return response()->json($data);
    }



   public function getFee(Request $request)
   {
    $data=Fee::all();
    return response()->json($data);

}
public function dataSubmit(Request $request)
   {

         $data = $request->all();
         // $student=new Student();
// ============just update Student balance =============
         $st_id=$request->student_id;
         $student=Student::find($st_id);
         $student->balance=$request->balance;
         $student->save();
// =================just update fee collect============
         $feeCollect=FeeCollect::where('student_id',$st_id)->first();
         if($feeCollect === null){
$feeCollect1=FeeCollect::create($request->all());
// dd($feeCollect1);

          $fee_collect_id=$feeCollect1->id;
          $feeHistory =FeeHistory::create($request->except(['fee_collect_id']) +[
                        'fee_collect_id'=>$fee_collect_id
              ]);


            
         }else{
            $feeCollect->received_amount=$request->received_amount;
         $feeCollect->balance=$request->balance;
         $feeCollect->total=$request->total;
         $feeCollect->discount=$request->discount;
         $feeCollect->save();
         $fee_collect_id=$feeCollect->id;
         $feeHistory =FeeHistory::create($request->except(['fee_collect_id']) +[
                        'fee_collect_id'=>$fee_collect_id
              ]);
          
         }
        //  $data1 = $data->except('fee_collect_id');
        if($data){ 
            $arr = array('msg' => 'Data Added Successfully!', 'status' => true);
        }
        return response()->json($arr);
   }
public function dataGet(Request $request)
   {
        // $data['all_data']=FeeCollect::with('feeTarrif')->get();
        // dd($all_data);
    $ssn=Session::where('status',1)->first();
     $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ssn->id)->get();
        return view('fee_tarrif.fee_data',$data);
   } 
   public function classWiseRecord(Request $request)
   {
    $data=FeeCollect::with('student','feeTarrif','css.class')->where('class_section_session_id',$request->class_section_session_id)->get();
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
     $ss= Session::where('status',1)->first();
        // dd($ss);
        $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ss->id)->get();
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
        // dd($request->all());

        $checker = FeeTarrif::where('class_section_session_id', $request->class_section_session_id)->where('fee_id', $request->fee_id)->get();
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
