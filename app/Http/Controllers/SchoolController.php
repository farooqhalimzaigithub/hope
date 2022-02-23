<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['schools']=School::all();
        return view('pre_configuration.school-manage.index',$data);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('pre_configuration.school-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = request()->validate([
            'responsible_person' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'password' => 'required| min:3| max:7 |confirmed',
            'password_confirmation' => 'required| min:3',
            'district_id' => 'required'
        ]);
        $inputs['password'] = Hash::make($request->input('password'));
        $inputs['name'] = $request->input('responsible_person');
        $user = User::create($inputs);
        
        // "name" => "Muhammad Kamran"
        // "lat" => "102.54654"
        // "lng" => "36.554545"
        // "address" => "No address"
        // "land_mark" => "i dont know what to enter here"
        // "school_type" => "CFS"
        // "status" => "non-functional"
        // "building_ownership" => "VEC"
        // "gender" => "Girls"
        // "building_structure" => "Kacha"
        // "email" => "mkamran@codeforpakistan.org"
        // "contact_number" => "66699878"
        // "password" => "123"
        // "confirm_password" => "123"
        
        
        $school = new School();
        $school->name = $request->input('name');
        $school->lat = $request->input('lat');
        $school->lng = $request->input('lng');
        $school->address = $request->input('address');
        $school->land_mark = $request->input('land_mark');
        $school->school_type = $request->input('school_type');
        $school->status = $request->input('status');
        $school->building_ownership = $request->input('building_ownership');
        $school->gender = $request->input('gender');
        $school->building_structure = $request->input('building_structure');
        $school->district_id = $request->input('district_id');
        $school->user_id = Auth::user()->id;
        $school->save();
        
        $school_id = $school->id;
        $user->school_id = $school_id;
        $user->update();
        
        return redirect()->route('schools.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['school']=School::find($id);
        $data['user']=User::where('id',$id)->first();
          // dd($data['user']);

        return view('pre_configuration.school-manage.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['school']=School::find($id);
        $data['user']=User::where('id',$id)->first();
          // dd($data['user']);

        return view('pre_configuration.school-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        //  $inputs = request()->validate([
        //     'responsible_person' => 'required',
        //     'email' => 'required',
        //     'contact_number' => 'required',
        //     'password' => 'required| min:3| max:7 |confirmed',
        //     'password_confirmation' => 'required| min:3',
        //     'district_id' => 'required'
        // ]);
       



        $school =School::find($id);
        $school->name = $request->input('name');
        $school->lat = $request->input('lat');
        $school->lng = $request->input('lng');
        $school->address = $request->input('address');
        $school->land_mark = $request->input('land_mark');
        $school->school_type = $request->input('school_type');
        $school->status = $request->input('status');
        $school->building_ownership = $request->input('building_ownership');
        $school->gender = $request->input('gender');
        $school->building_structure = $request->input('building_structure');
        $school->district_id = $request->input('district_id');
        $school->user_id = Auth::user()->id;
        $school->save();
      $school_id=$school->id;
      // $school->save();
         $password = Hash::make($request->input('password'));
        $name= $request->input('responsible_person');
        $email = $request->input('email');
        $contact_number= $request->input('contact_number');

        User::where('email', $email)->update([ 'name'=>$name,'password'=>$password,'email'=>$email,'contact_number'=>$contact_number
            ]);
       return redirect()->route('schools.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        School::find($id)->delete();
           return redirect()->route('schools.index')->with('error','Data Delete Successfully');
    }
}
