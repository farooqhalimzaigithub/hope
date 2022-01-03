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
        $permited_functions =
        DB::table('modules')
        ->join('permissions', 'modules.id', '=', 'permissions.module_id')//perm instad of module_right
        ->where('role_id', '=', $role_id)
        ->pluck('route_name')->toArray();

        $current_route_name =  $request->route()->getName();
        // if(in_array($current_route_name, $permited_functions)){
            return $next($request);
        // }
        // return redirect()->back()->with('error','You are not allowed to access the funtion.');
    }
}
