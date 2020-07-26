<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user['avatar'] = $user->avatar ? $user->avatar : 'assets/img/user2-160x160.jpg';
        $roles = $user->getRoles;

        return view('backend.profile', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $user = User::findOrFail($id);
        // dd($user);

        if ($request->password == null) {
            $user->update($request->only('name', 'email', 'avatar'));
        } else {
            $request['password'] = bcrypt($request->password);
            // dd($request->password);
            $user->update($request->only('name', 'email', 'password', 'avatar'));
        }

        return redirect()->route('admin.profile')->withSuccess('Cập nhật thông tin thành công');
    }
}
