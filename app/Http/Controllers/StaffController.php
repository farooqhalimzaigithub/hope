<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\City;
use App\Models\Designation;
use App\Models\StaffCategory;
use App\Models\StaffSaleryInfo;
use App\Models\ProfessionalInfo;
use App\Models\School;
use App\Models\Campus;
use App\Models\StaffDetail;
use Illuminate\Http\Request;
use Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['staffs']=Staff::all();
         $data['staffs'] = Staff::with('staffDetail','staffSaleryInfo','professionalInfo')->get();
         // dd($data['staffs']);
         Session::flash('message','Data Updateed Successfully');

        return view('staff-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['staff_categories']=StaffCategory::all();
         $data['designations']=Designation::all();
         $data['schools']=School::all();
         $data['campuses']=Campus::all();
         $data['cities']=City::all();
        return view('staff-manage.create',$data);
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
      //   $this->validate($request,['registration_no' => 'required','cnic_no'=>'required']);

      //   if(Staff::where('registration_no',$request->registration_no)->where('cnic_no',$request->cnic_no)->exists()){
      //     return back()->withError('Record Already Exits');   
      // }else{

            if($request->hasFile('image')){
                    $file = $request->file('image');
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'public/images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                    $file->move($destinationPath,$file_name);
            }else{
                $file_name=null;
            }
        
         $staff=Staff::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sur_name'=>$request->sur_name,
            'registration_no'=>$request->registration_no,
            'staff_category_id'=>$request->staff_category_id,
            'designation_id'=>$request->designation_id,
            'cnic_no'=>$request->cnic_no,
            'gender'=>$request->gender,
            'marital_status'=>$request->marital_status,
            'city_id'=>$request->city_id,
            'school_id'=>$request->school_id,
            'campus_id'=>$request->campus_id,
            'address'=>$request->address,
            'phone_no'=>$request->phone_no,
            'mobile_no'=>$request->mobile_no,
            'dob'=>$request->dob,
            'appointment_date'=>$request->appointment_date,
            'image'=>$file_name
         ]);
         $staff_id=$staff->id;

         StaffSaleryInfo::create([
            'staff_id'=>$staff_id,
            'basic_salery'=>$request->basic_salery,
            'class_incharge'=>$request->class_incharge,
            'chief_proctor'=>$request->chief_proctor,
            'controller_of_examination'=>$request->controller_of_examination,
            'debate_incharge'=>$request->debate_incharge,
            'sport_incharge'=>$request->sport_incharge,
            'account_allowance'=>$request->account_allowance,
            'lab_incharge'=>$request->lab_incharge,
            'house_incharge'=>$request->house_incharge,
            'others'=>$request->others,
            'others2'=>$request->others2,
            'e_o_b_i'=>$request->e_o_b_i,
            'income_tax'=>$request->income_tax,
            'welfare_fund'=>$request->welfare_fund,
            'total_allowance'=>$request->total_allowance,
            'total_deduction'=>$request->total_deduction,
            'net_salery'=>$request->net_salery,
         ]);
         $e_rows=$request->input('edu_year');
        $p_rows=$request->input('prof_year');
        foreach($e_rows as $key=>$row) 
        {                   
                    $edu_description = $request->edu_description[$key];
                    $edu_roll_no = $request->edu_roll_no[$key];
                    $edu_year = $request->edu_year[$key];
                    $edu_total_mark = $request->edu_total_mark[$key];
                    $edu_obtain_mark = $request->edu_obtain_mark[$key];
                    $edu_percentage = $request->edu_percentage[$key];
                    $edu_board = $request->edu_board[$key];
                    StaffDetail::create([
                    'staff_id'=>$staff_id,
                    'edu_description'=>$edu_description,
                    'edu_roll_no'=>$edu_roll_no,
                    'edu_year'=>$edu_year,
                    'edu_total_mark'=>$edu_total_mark,
                    'edu_obtain_mark'=>$edu_obtain_mark,
                    'edu_percentage'=>$edu_percentage,
                    'edu_board'=>$edu_board,
            
            
                  ]);
           }
           foreach($p_rows as $key=>$row) 
        {

                   
                    $prof_description = $request->input('prof_description')[$key];
                    $prof_roll_no = $request->input('prof_roll_no')[$key];
                    $prof_year = $request->input('prof_year')[$key];
                    $prof_total_mark = $request->input('prof_total_mark')[$key];
                    $prof_obtain_mark = $request->input('prof_obtain_mark')[$key];
                    $prof_percentage = $request->input('prof_percentage')[$key];
                    $prof_board = $request->input('prof_board')[$key];
                    ProfessionalInfo::create([
                    'staff_id'=>$staff_id,
                    'prof_description'=>$prof_description,
                    'prof_roll_no'=>$prof_roll_no,
                    'prof_year'=>$prof_year,
                    'prof_total_mark'=>$prof_total_mark,
                    'prof_obtain_mark'=>$prof_obtain_mark,
                    'prof_percentage'=>$prof_percentage,
                    'prof_board'=>$prof_board,
            
            
                  ]);
           }

      // }
       
        
        return redirect()->route('staffs.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['schools']=School::all();
         $data['campuses']=Campus::all();
         $data['staff_categories']=StaffCategory::all();
         $data['designations']=Designation::all();
         $data['cities']=City::all();
         $data['staff']=Staff::find($id);
         $data['staffSaleryInfo']=StaffSaleryInfo::where('staff_id',$id)->first();
         $data['edu_info']=StaffDetail::where('staff_id',$id)->get();
         $data['prof_info']=ProfessionalInfo::where('staff_id',$id)->get();
        return view('staff-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       // dd($request->all());
        $Reg1=StaffDetail::where('staff_id',$id)->delete();
        $Reg2=ProfessionalInfo::where('staff_id',$id)->delete();
        $Reg3=StaffSaleryInfo::where('staff_id',$id)->delete();
        if($request->hasFile('image')){
                    $file = $request->file('image');
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'public/images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                    $file->move($destinationPath,$file_name);
            }else{
                $file_name=null;
            }
             $staff = Staff::find($id);

        
            $staff->first_name=$request->first_name;
            $staff->last_name=$request->last_name;
            $staff->sur_name=$request->sur_name;
            $staff->registration_no=$request->registration_no;
            $staff->staff_category_id=$request->staff_category_id;
            $staff->designation_id=$request->designation_id;
            $staff->school_id=$request->school_id;
            $staff->campus_id=$request->campus_id;
            $staff->cnic_no=$request->cnic_no;
            $staff->gender=$request->gender;
            $staff->marital_status=$request->marital_status;
            $staff->city_id=$request->city_id;
            $staff->address=$request->address;
            $staff->phone_no=$request->phone_no;
            $staff->mobile_no=$request->mobile_no;
            $staff->dob=$request->dob;
            $staff->appointment_date=$request->appointment_date;
            $staff->image=$file_name;
         $staff->save();
         // $staff_id=$staff->id;

         StaffSaleryInfo::create([
            'staff_id'=>$id,
            'basic_salery'=>$request->basic_salery,
            'class_incharge'=>$request->class_incharge,
            'chief_proctor'=>$request->chief_proctor,
            'controller_of_examination'=>$request->controller_of_examination,
            'debate_incharge'=>$request->debate_incharge,
            'sport_incharge'=>$request->sport_incharge,
            'account_allowance'=>$request->account_allowance,
            'lab_incharge'=>$request->lab_incharge,
            'house_incharge'=>$request->house_incharge,
            'others'=>$request->others,
            'others2'=>$request->others2,
            'e_o_b_i'=>$request->e_o_b_i,
            'income_tax'=>$request->income_tax,
            'welfare_fund'=>$request->welfare_fund,
            'total_allowance'=>$request->total_allowance,
            'total_deduction'=>$request->total_deduction,
            'net_salery'=>$request->net_salery,
         ]);
         $e_rows=$request->input('edu_year');
        $p_rows=$request->input('prof_year');
        foreach($e_rows as $key=>$row) 
        {                   
                    $edu_description = $request->edu_description[$key];
                    $edu_roll_no = $request->edu_roll_no[$key];
                    $edu_year = $request->edu_year[$key];
                    $edu_total_mark = $request->edu_total_mark[$key];
                    $edu_obtain_mark = $request->edu_obtain_mark[$key];
                    $edu_percentage = $request->edu_percentage[$key];
                    $edu_board = $request->edu_board[$key];
                    StaffDetail::create([
                    'staff_id'=>$id,
                    'edu_description'=>$edu_description,
                    'edu_roll_no'=>$edu_roll_no,
                    'edu_year'=>$edu_year,
                    'edu_total_mark'=>$edu_total_mark,
                    'edu_obtain_mark'=>$edu_obtain_mark,
                    'edu_percentage'=>$edu_percentage,
                    'edu_board'=>$edu_board,
            
            
                  ]);
           }
           foreach($p_rows as $key=>$row) 
        {

                   
                    $prof_description = $request->input('prof_description')[$key];
                    $prof_roll_no = $request->input('prof_roll_no')[$key];
                    $prof_year = $request->input('prof_year')[$key];
                    $prof_total_mark = $request->input('prof_total_mark')[$key];
                    $prof_obtain_mark = $request->input('prof_obtain_mark')[$key];
                    $prof_percentage = $request->input('prof_percentage')[$key];
                    $prof_board = $request->input('prof_board')[$key];
                    ProfessionalInfo::create([
                    'staff_id'=>$id,
                    'prof_description'=>$prof_description,
                    'prof_roll_no'=>$prof_roll_no,
                    'prof_year'=>$prof_year,
                    'prof_total_mark'=>$prof_total_mark,
                    'prof_obtain_mark'=>$prof_obtain_mark,
                    'prof_percentage'=>$prof_percentage,
                    'prof_board'=>$prof_board,
            
            
                  ]);
           }

      
       
        
        return redirect()->route('staffs.index')->with('success','Data Updateed Successfully!!!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Staff::find($id)->delete();
           return redirect()->route('staffs.index')->with('error','Data Delete Successfully');
    }
}
