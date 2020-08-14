<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Role;
use App\Models\Permission;

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
        $user = Auth::user();
        $permission = $user->getAllPermissions();

        // dd($permission);

        if ($user->hasAnyRole(Role::all()) || $user->hasAnyDirectPermission(Permission::all())) {
            $permissions = [];
            $current_route = $request->route()->getName();

            foreach ($permission as $value) array_push($permissions, $value->name);

            if (!in_array('admin.dashboard', $permissions)) array_push($permissions, 'admin.dashboard');
            if (!in_array('admin.profile', $permissions)) array_push($permissions, 'admin.profile');
            if (!in_array('admin.profile.update', $permissions)) array_push($permissions, 'admin.profile.update');

            if ($user->hasRole('super-admin') || in_array($current_route, $permissions)) {
                return $next($request);
            }
        }

        return abort(403);
    }
}
