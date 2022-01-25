<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles']=Role::all();
        return view('role-managment.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules1=Module::where('parent_id',0)->get();
         // dd($modules);         
         foreach ($modules1 as $module) {

             $module->children = Module::where('parent_id',$module->id)->get();
         }

 // dd($modules);
        return view('role-managment.create',compact('modules1'));
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
        $name=$request->input('name');
        $createRole=Role::create([
            'name'=>$name
        ]);
        $role_id=$createRole->id;
        // dd($name);
        $module_ids =$request->input('module_id');
        foreach ($module_ids as $module_id)
               {
                 $permission=Permission::create([
                    'role_id' => $role_id,
                     'module_id' => $module_id
                     ]);
                }
        
       
         return redirect()->route('roles.index')->with('success','Data Saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data['role']=Role::find($id);

        $modules1=Module::where('parent_id',0)->get();
        // dd($modules);         
        foreach ($modules1 as $module) {

            $module->children = Module::where('parent_id',$module->id)->get();
        }

        $data['modules1'] = $modules1;
        $data['permissions']=Permission::where('role_id',$id)->pluck('module_id')->toArray();

        return view('role-managment.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request->all());
      
      $roleNew =Role::find($id);
      $roleNew->name=$request->name;
      $roleNew->save();
      $roleId=$roleNew->id;
      $module_ides=$request->input('module_id');
      $role_id=Permission::where('role_id',$id)->delete();
//       $role = Role::find($id);
// $role->permissions()->sync(array($module_ides));
      foreach ($module_ides as $module_id)
               {
                 $permission=Permission::create([
                    'role_id' => $roleId,
                     'module_id' => $module_id
                     ]);
                }
       return redirect()->route('roles.index')->with('info','Data Update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
           return redirect()->route('roles.index')->with('error','Role deleted successfully');
    }
}
