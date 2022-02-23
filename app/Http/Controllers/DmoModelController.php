<?php

namespace App\Http\Controllers;

use App\Models\DmoModel;
use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;
use Hash;
class DmoModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users']=User::all();
        // dd('ookk');
        return view('pre_configuration.user-manage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['districts']=District::all();
        return view('pre_configuration.user-manage.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DmoModel  $dmoModel
     * @return \Illuminate\Http\Response
     */
    public function show(DmoModel $dmoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DmoModel  $dmoModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['user']=User::find($id);
       $data['districts']=District::all();
        return view('pre_configuration.user-manage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DmoModel  $dmoModel
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {

          $this->validate($request, [
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            // 'role_id' => ['required'],
        ]);
        $updatedmo= User::where('id',$id)->update([
                    'name' => $request->name,
                    'contact_number'=>$request->contact_number,
                    'email'=>$request->email,
                    // 'role_id'=> $request->role_id,
                    'district_id'=> $request->district_id,
                    'password'=>Hash::make('password'),

                ]);
        if($updatedmo)
         {

        return redirect()->route('dmos.index')->with('info','Data Updated successfully!');
        }
        else
        {
        return back()->with('error','DMO Updated successfully!'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DmoModel  $dmoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DmoModel $dmoModel)
    {
        //
    }
}
