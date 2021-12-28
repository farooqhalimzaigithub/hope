<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use DB;
class CheckUrlAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role_id = Auth::user()->role_id;
        // dd($role_id);

        $permited_functions =
            DB::table('modules')
            ->join('permissions', 'modules.id', '=', 'permissions.module_id')//perm instad of module_right
            ->where('role_id', '=', $role_id)
            ->pluck('route_name')->toArray();
        // converted from object to array for match...
 // dd($permited_functions);
        $segment_arr =  request()->segments();//explode('/api/', url()->current());this is actualy url

        if(in_array($segment_arr[1], $permited_functions)){
             // dd('okk');
            return $next($request);
        }else{
            // dd($segment_arr);
            // return $next($request);
            $toReturn = [
                'error' => true,
                'message' => 'You are not allowed to access this method.',
                "data" => '',
                "directory_path" => '',
            ];
            // return response()->json($toReturn, 200);
            return back();
        }
    }
}
