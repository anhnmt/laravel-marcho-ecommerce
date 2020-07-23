<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $roles = auth()->user();
        return view('backend.profile', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        if ($request->password == null) {
            $user->update($request->only('name', 'email'));
        } else {
            $request['password'] = bcrypt($request->password);
            // dd($request->password);
            $user->update($request->only('name', 'email', 'password'));
        }
        return redirect()->route('admin.profile');
    }
}
