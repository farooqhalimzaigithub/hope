<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use Illuminate\Http\Request;
use App\Models\FeeTarrif;
use App\Models\Level;
use App\Models\Fee;
use App\Models\FeeCategory;
use App\Models\FeeCollect;
use App\Models\FeeHistory;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\StudentFee;
use App\Models\ClassSectionSession;
use App\Models\FeeInstallment;
use App\Models\Session;
use App\Models\FreeClass;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Response;

class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['fee_structures']=FeeStructure::with('css.class')->get();
       
      // dd($data['fee_structures']);
       return view('fee_structure.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['fee_types']=FeeCategory::all();
         $data['sessions']=Session::all();
     $data['classes']=Level::all();
     $ss= Session::where('status',1)->first();
        // dd($ss);
        $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ss->id)->get();
     return view('fee_structure.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checker = FeeStructure::where('class_section_session_id', $request->class_section_session_id)->where('fee_type_id', $request->fee_type_id)->get();
        // dd($checker);
       if ($checker->isEmpty()) {
            $record=FeeStructure::create($request->all());
            return redirect()->route('fee_structures.index')->withSuccess('Data Saved Successfully!');
        }else{
            return back()->withError('Data All ready 2 Exist!');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function show(FeeStructure $feeStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['fee_category']=FeeCategory::all();
         $data['classes']=FreeClass::all();
         $data['sessions']=Session::all();
         // dd($data['classes']);
         $data['fee_structure']=FeeStructure::find($id);
       return view('fee_structure.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record=FeeStructure::find($id);
        $record=FeeStructure::where('id',$id)->delete();
         $checker = FeeStructure::where('class_section_session_id', $request->class_section_session_id)->where('fee_type_id', $request->fee_type_id)->get();
        // dd($checker);
       if ($checker->isEmpty()) {
            $record=FeeStructure::create($request->all());
            return redirect()->route('fee_structures.index')->withSuccess('Data Saved Successfully!');
        }else{
            return back()->withError('Data All ready  Exist!');
            
        }
    }


    // =========================payment work=====================
public function paymentFee(Request $request)
    {
     // dd('okk');
        $ssn=Session::where('status',1)->first();
        $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ssn->id)->get();
        // dd($data['classSectionSession']);
        return view('fee_payment.index',$data);

    }
   public function feeDetailGet(Request $request)
    {

        $data=StudentClass::with('student',)->where('class_section_session_id',$request->class_section_session_id)->get();
        // dd($data);
     return response()->json($data);
    }
    public function getStudentRecord(Request $request)
    {
        $now = Carbon::now();
        $monthCurrent = $now->startOfMonth();
        $stdRecords=StudentFee::where('student_id',$request->student_id)->whereMonth('month', '<=', $monthCurrent)->get();
        // dd($stdRecords);
        return response()->json($stdRecords);


    }
    public function getfeePayment(Request $request,$id)
    {
        // dd($id);
       $now = Carbon::now();
        $monthCurrent = $now->startOfMonth();
        $data['stdRecords']=StudentFee::with('student','css.class','session')->where('student_id',$id)->whereMonth('month', '<=', $monthCurrent)->get();
         // dd($data['stdRecords']);
        return view('fee_structure.student_fee_detail',$data);

    }

    public function paidPayment(Request $request)
   {
     $student_fee=StudentFee::where('id',$request->id)->first();
     $student_fee->received_amount = $request->paid;
     if($student_fee->amount==$request->paid)
        {
          $student_fee->clear=1;
        }
          $student_fee->save();
           $student_fee_id=$student_fee->id;

           $array = ['student_fee_id' =>$student_fee_id, 'session_id'=>$request->session_id,'class_section_session_id'=>$request->class_section_session_id,'month'=>$request->month,'student_id'=>$request->student_id,'amount'=>$request->amount,'received_amount'=>$request->received_amount];
             $create_fee =FeeInstallment::create($array);
         
          return response()->json(['data'=>$student_fee]);

          

   }
    
    // =========================payment work=====================
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeStructure $feeStructure)
    {
        //
    }
}
