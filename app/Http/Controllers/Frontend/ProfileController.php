<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
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

    public function address()
    {
        $user = User::find(auth()->user()->id);
        $cities = City::all();
        $districts = District::where('parent_code', $user->city_id)->get();
        $wards = Ward::where('parent_code', $user->district_id)->get();
        if (isset($user->address) && isset($user->ward->path_with_type)) {
            $user->fullAddress = $user->address . ', ' . $user->ward->path_with_type;
        }

        return view('frontend.profile.address', compact('user', 'cities', 'districts', 'wards'));
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
        // dd($user);

        if ($request->exists('password') == true) {
            $request['password'] = bcrypt($request->password);

            if ($user->update($request->all()))
                return redirect()->route('user.profile')->withSuccess('Cập nhật mật khẩu thành công');

            return redirect()->route('user.profile')->withErrors('Cập nhật mật khẩu thất bại');
        } elseif ($request->exists('address') == true) {
            // dd($request->all());
            if ($user->update($request->all()))
                return redirect()->route('user.address')->withSuccess('Cập nhật địa chỉ thành công');

            return redirect()->route('user.address')->withErrors('Cập nhật địa chỉ thất bại');
        } else {
            if ($user->update($request->all()))
                return redirect()->route('user.profile')->withSuccess('Cập nhật hồ sơ thành công');

            return redirect()->route('user.profile')->withErrors('Cập nhật hồ sơ thất bại');
        }
    }
}
