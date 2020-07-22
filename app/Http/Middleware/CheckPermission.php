<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $permission = Auth::user()->getAllPermissions();
        
        // dd($permission);

        if(!empty($permission) || Auth::user()->hasRole('super-admin')){
            $permissions = [];
            $current_route = $request->route()->getName();

            foreach($permission as $value) array_push($permissions, $value->name);

            if(!in_array('admin.dashboard', $permissions) ) array_push($permissions, 'admin.dashboard');

            if(Auth::user()->hasRole('super-admin') || in_array($current_route, $permissions)){
                return $next($request);
            }
        }
        
        abort(403);
    }
}
