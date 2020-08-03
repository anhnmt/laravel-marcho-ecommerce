<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\FrontendProfileRequest as ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }

    public function password()
    {
        return view('frontend.profile.password');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        // dd($request->all());

        $user = User::find($id);

        if ($request->exists('password') == false) {
            if ($user->update($request->all()))
                return redirect()->route('profile.index')->withSuccess('Cập nhật hồ sơ thành công');

            return redirect()->route('profile.index')->withErrors('Cập nhật hồ sơ thất bại');
        } else {
            $request['password'] = bcrypt($request->password);

            if ($user->update($request->all()))
                return redirect()->route('profile.index')->withSuccess('Cập nhật mật khẩu thành công');

            return redirect()->route('profile.index')->withErrors('Cập nhật mật khẩu thất bại');
        }
    }
}
