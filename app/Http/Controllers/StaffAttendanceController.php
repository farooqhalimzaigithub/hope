<?php

namespace App\Http\Controllers;

use App\Models\StaffAttendance;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }public function addStaffAttendance()
    {
        // dd('ok');
         $data['staffs'] =Staff::all();
        // dd($data['classSectionSession']);
        return view('staff-attendance.add_attendance',$data);
    } 


    public function staffAttendanceList()
    {
        // dd('okk');
        return view('staff-attendance.staff_attendance_list');
       
    }


    public function staffListShow(Request $request)
    {
        $data=StaffAttendance::with('staff')->where('att_date',$request->att_date)->get();
        return response()->json($data);
    }

    public function submitStaffAttendance(Request $request)
    {
        // echo "<pre/>";
        // print_r($request->all());
        // echo "<pre/>";
        // $data=StudentAttendance::where(['id', '=',$request->att_id,'att_date', '=',$request->att_date])->update(['attendance' =>$request->attendance]);


       $data= StaffAttendance::where('id', $request->att_id)->where('att_date', $request->att_date)
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

    // staffListShow

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

        $att_date = $request->input('att_date');
          $rows=$request->input('staff_id');
          for ($i = 0; $i < count($rows); $i++) 
        {
             $staff_id = $request->input('staff_id')[$i];
             $attendance_arr = $request->input('attendance')[$i];

             $studentAttendance=StaffAttendance::create(['staff_id' => $staff_id, 'attendance' => $attendance_arr,'att_date' =>$att_date,'branch_id' => 1]);

             if($studentAttendance){
                     return back()->withSuccess('data saved successfully');

                }else{
                     return back()->withSuccess('data Not saved !!!');
                }
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffAttendance  $staffAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(StaffAttendance $staffAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffAttendance  $staffAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffAttendance $staffAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffAttendance  $staffAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffAttendance $staffAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffAttendance  $staffAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffAttendance $staffAttendance)
    {
        //
    }
}
