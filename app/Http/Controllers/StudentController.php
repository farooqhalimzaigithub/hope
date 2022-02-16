<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassSectionSession;
use App\Models\School;
use App\Models\EnrollmentRegister;
use App\Models\Campus;
use App\Models\Health;
use App\Models\Occupation;
use App\Models\Section;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\Level;
use App\Models\Religion;
use App\Models\Cast;
use App\Models\StudentDetail;
use App\Models\Session;
use App\Models\BloodGroup;
use App\Models\FeeStructure;
use App\Models\StudentFee;
use Illuminate\Http\Request;
use DB;
use DateTime;
use DatePeriod;
use DateInterval;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $data['students']=Student::with('studentDetail')->get();
         $data['students'] = Student::with('studentDetail')->get();
         // / dd($profiles);
         // Session::flash('message','Data Updateed Successfully');
       return view('student-managment.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $ss= Session::where('status',1)->first();
        // dd($ss);
        $data['classSectionSession'] = ClassSectionSession::with('class','section','session')->where('session_id',$ss->id)->get();
             // dd($classSectionSession);
           $data['healths']=Health::all();
           $data['campuses']=Campus::all();
           $data['enrollments']=EnrollmentRegister::all();
           $data['occupations']=Occupation::all();
           $data['sections']=Section::all();
           $data['levels']=Level::all();

           // $data['schools']=School::all();
           $data['countries']=Country::all();
           $data['provinces']=Province::all();
           $data['cities']=City::all();
           $data['religions']=Religion::all();
           $data['casts']=Cast::all();
           $data['bloods']=BloodGroup::all();
         return view('student-managment.create',$data);
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
        if($request->hasFile('image')){
                    $file = $request->file('image');
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                    $file->move($destinationPath,$file_name);
            }else{
                $file_name=null;
            }


       $student =new Student();
       $student->first_name=$request->first_name;
       $student->last_name=$request->last_name;
       $student->sur_name=$request->surname;
       $student->dob=$request->dob;
       $student->cnic_no=$request->student_cnic;
       $student->father_name=$request->father_name;
       $student->father_cnic_no=$request->father_cnic_no;
       $student->father_occupation=$request->father_occupation;
       $student->registration_no=$request->registration_no;
       $student->admission_no=$request->admission_no;
       $student->enrollment_registration=$request->enrollment_registration;
       $student->religion_id=$request->religion_id;//i.e islaam
       $student->cast_id=$request->cast_id;//i.e nation
       $student->campus_id=$request->campus_id;
       $student->province_id=$request->province_id;
       $student->country_id=$request->country_id;
       $student->image=$file_name;
       $student->save();
       $student_id=$student->id;

       DB::table('student_classes')->insert(['student_id'=>$student_id,'class_section_session_id'=>$request->current_class_id,'status'=>1]);
                 DB::commit();
       // dd($student_id);
       $studentDetail=StudentDetail::create([
        'student_id'            =>$student_id,
        'postal_address'        =>$request->postal_address,
        'permanent_address'     =>$request->permanent_address,
        'contact_no'            =>$request->contact_no,
        'cellular_no'           =>$request->cellular_no,
        'guardian_cnic'         =>$request->guardian_cnic,
        'gender'                =>$request->gender,
        'blood_id'              =>$request->blood_id,
        'health_name'           =>$request->health_name,
        'waight'                =>$request->waight,
        'height'                =>$request->height,
        'house_name'            =>$request->house_name,
        'current_class_id'      =>$request->current_class_id,
        'admission_class_id'    =>$request->admission_class_id,
        'section_id'            =>$request->section_id,
        'city_id'               =>$request->city_id,
        'guardian_mobile_number'=>$request->guardian_mobile_number,
        'guardian_name'         =>$request->guardian_name,
        'clc_no'                =>$request->clc_no,
        'remark'                =>$request->remark,
        'school_id'             =>auth()->user()->school_id,
       ]);


     $fee_structure=FeeStructure::where('class_section_session_id',$request->current_class_id)->first();
     $fee_amount=$fee_structure->amount;

       // $fee_amount = DB::table('fee_structures')->where('class_section_session_id',$request->current_class_id)->pluck('amount');
       // dd($fee_amount);
 $css_id=$request->current_class_id;
//  // after this add fee info for the futur
   $css= Session::where('status',1)->first();
   // $session_id = DB::table('sessions')->where('status',1)->pluck('id');
    $session_id=$css->id;
//   // Get year and month of initial date (From)
 $yearIni = date("Y", strtotime($css->start_date));
// $monthIni = date("m", strtotime($css->end_date));
// // Get year an month of finish date (To)
// $yearFin = date("Y", strtotime($dateFin));
// $monthFin = date("m", strtotime($dateFin));
// // Checking if both dates are some year
//    $numberOfMonths = ((($yearFin - $yearIni) * 12) - $monthIni) + 1 + $monthFin;
//   dd($numberOfMonths);
 // OR

// $current_week = Session::whereBetween('start_date', [$css->end_date, $css->end_date])->get();
$begin1 = $css->start_date;
$end1   = $css->end_date;
$begin = new DateTime($begin1);
 $interval = new DateInterval('P1M');
$end = new DateTime($end1);
$period = new DatePeriod($begin, $interval, $end);
 foreach($period as $d){
  $start_date = $d->format("Y-m-d");

StudentFee::create([
    'session_id'=>$session_id,
    'class_section_session_id'=>$request->current_class_id,
    'month'=>$start_date,
    'student_id'=>$student_id,
    'amount'=>$fee_amount,
    'received_amount'=>0
]);

// echo "<pre>";
//  print_r($start_date);
// echo "<pre>";
}

// die();

// $employees = Session::whereMonth('start_date', '>', $end)->get();
// $end = $end->modify( '+1 day' );
// $daterange = new DatePeriod($begin, $interval ,$end);
// $interval = new DateInterval('P1M');
// $daterange = new DatePeriod($begin, $interval, $end);

// $interval = new DateInterval('P1D');
// $daterange = new DatePeriod($begin, $interval ,$end);

// foreach($daterange as $date){
//     echo '<pre/>';
//   print_r($date->format("Ymd"));
//     echo '<pre/>';
// }


// for($i = $begin; $i <= $end; $i->modify('+1 day')){
//     echo $i;
    
// }
 // dd($employees);



 return redirect()->route('students.index')->with('success','Data Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $data['sections']=Section::all();
           $data['levels']=Level::all();
           $data['schools']=School::all();
           $data['countries']=Country::all();
           $data['provinces']=Province::all();
           $data['cities']=City::all();
           $data['religions']=Religion::all();
           $data['casts']=Cast::all();
           $data['bloods']=BloodGroup::all();
           $data['student']=Student::with('studentDetail')->find($id);
           // $data['students'] = Student::with('studentDetail')->get();
       return view('student-managment.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

      if($request->hasFile('image')){
                    $file = $request->file('image');
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                    $file->move($destinationPath,$file_name);
            }else{
                $file_name=null;
            }
       $student=Student::find($id);
       $student->first_name=$request->first_name;
       $student->last_name=$request->last_name;
       $student->sur_name=$request->surname;
       $student->dob=$request->dob;
       $student->cnic_no=$request->student_cnic;
       $student->father_name=$request->father_name;
       $student->father_cnic_no=$request->father_cnic_no;
       $student->father_occupation=$request->father_occupation;
       $student->registration_no=$request->registration_no;
       $student->admission_no=$request->admission_no;
       $student->enrollment_registration=$request->enrollment_registration;
       $student->religion_id=$request->religion_id;//i.e islaam
       $student->cast_id=$request->cast_id;//i.e nation
       $student->school_id=$request->campus_id;
       $student->province_id=$request->province_id;
       $student->country_id=$request->country_id;
       $student->image=$file_name;
       $student->save();
       StudentDetail::where('student_id',$id)->first()
         ->update([
        'student_id'            =>$id,
        'postal_address'        =>$request->postal_address,
        'permanent_address'     =>$request->permanent_address,
        'contact_no'            =>$request->contact_no,
        'cellular_no'           =>$request->cellular_no,
        'guardian_cnic'         =>$request->guardian_cnic,
        'gender'                =>$request->gender,
        'blood_id'              =>$request->blood_id,
        'health_name'           =>$request->health_name,
        'waight'                =>$request->waight,
        'height'                =>$request->height,
        'house_name'            =>$request->house_name,
        'current_class_id'      =>$request->current_class_id,
        'admission_class_id'    =>$request->admission_class_id,
        'section_id'            =>$request->section_id,
        'city_id'               =>$request->city_id,
        'guardian_mobile_number'=>$request->guardian_mobile_number,
        'guardian_name'         =>$request->guardian_name,
        'clc_no'                =>$request->clc_no,
        'remark'                =>$request->remark,
        'school_id'             =>$request->school_id
       ]);
         return redirect()->route('students.index')->with('success','Data Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
           return redirect()->route('students.index')->with('error','Data Delete Successfully');
    }
}
