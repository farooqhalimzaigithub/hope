<?php

namespace App\Http\Controllers;

use App\Models\StudentAttendance;
use App\Models\ClassSectionSession;
use App\Models\Session;
use App\Models\StudentClass;
use Illuminate\Http\Request;


class StudentAttendanceController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    public function attendanceList()
    {
        // dd('ok');
         $ssn=Session::where('status',1)->first();
        $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ssn->id)->get();
        // dd($data['classSectionSession']);
        return view('attendance-managment.list',$data);
    }
    public function sessionList(Request $request)
    {
        $data=ClassSectionSession::with('section')->where('section_id',$request->class_section_session_id)->get();
        return response()->json($data);
    }
    public function sectionList(Request $request)
    {
        $data=ClassSectionSession::with('section','students')->where('section_id',$request->section_id)->get();
        return response()->json($data);
    }
// =======================After that attt show exist record=====================/

public function attendanceListShow(Request $request)
    {
        $ssn=Session::where('status',1)->first();
        $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ssn->id)->get();
       return view('attendance-managment.show_list',$data);
    }
     public function sectionListShow(Request $request)
    {
        $data=StudentAttendance::with('student','css.class')->where('section_id',$request->section_id)->where('css_id',$request->class_section_session_id)->where('att_date',$request->att_date)->get();

        return response()->json($data);
    }

    
     public function submitAttendance(Request $request)
    {
        // echo "<pre/>";
        // print_r($request->all());
        // echo "<pre/>";
        // $data=StudentAttendance::where(['id', '=',$request->att_id,'att_date', '=',$request->att_date])->update(['attendance' =>$request->attendance]);


       $data= StudentAttendance::where('id', $request->att_id)->where('att_date', $request->att_date)
      ->update(['attendance' => $request->attendance]);

        // session()->flash('message',"Successfully edited");
      $message = "Successfully edited!";
return response()->json([ 'message' => $message], 200);

      // return response()->json(array('success' => true), 200);
        // return response()->json($data)->withSuccess('Attendance Added Successfully!');
        // return redirect()->back()->withSuccess('IT WORKS!');
         // oR
         // return redirect()->route('att_list')->withSuccess(['Attendance Added Successfully!']);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
           $ssn=Session::where('status',1)->first();
        $session_id=$ssn->id;
        $section_id=$request->section_id;
        $class_section_session_id=$request->class_section_session_id;


        // $student_ids = $request->input('student_ids');
        // $attendance_arr = $request->input('attendance');
 // $student_ids=$request->input('student_id');//this is use store sub array
 // $attendance_arr=$request->input('attendance');//this is use store sub array


        $att_date = $request->input('att_date');
        $css_id = $request->input('class_section_session_id');
          $rows=$request->input('raw_row');
          for ($i = 0; $i < count($rows); $i++) 
        {
             $student_id = $request->input('student_id')[$i];
             $attendance_arr = $request->input('attendance')[$i];

             $studentAttendance=StudentAttendance::create(['student_id' => $student_id, 'attendance' => $attendance_arr,'att_date' =>$att_date,'css_id' => $css_id,'session_id' =>$session_id,'section_id' => $section_id]);
          }

        // $array = [];
        //  for ($i=0; $i < count($rows); $i++) { 

        //     $data=array([
        //             'student_id' =>$student_ids[$i],
        //             'attendance' =>$attendance_arr[$i],
        //             'css_id'     =>$class_section_session_id,
        //             'session_id' =>$session_id,
        //             'section_id' =>$section_id,
        //             'att_date'   =>$att_date,
        //     ]);
        //  }

                // $student_att=StudentAttendance::create($data);
               // $student_att= StudentAttendance::insert($data);
         // batch insertion process

                if($studentAttendance){
                     return back()->withSuccess('data saved successfully');

                }else{
                     return back()->withSuccess('data Not saved !!!');
                }


      
          // $session_id = $request->input('session_id');
          // $attendance_rows=array_values($request->input('attendance'));//this is use store sub array
        // for ($i = 0; $i <$rows; $i++) 
        //    {
        //       $student_id= $request->student_id[$i];
        //       $attendance= $request->attendance[$i];

        // $studen_attendance=StudentAttendance::create([
        //      'attendance'=>$attendance,
        //      'att_date'=>$att_date,
        //      'session_id'=>$session_id,
        //      'section_id'=>$section_id,
        //      'student_id'=>$student_id,
        //      'css_id'=>$class_section_session_id
        //       ]);
        //     }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendance $studentAttendance)
    {
        //
    }
}
