<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'email', 'subject', 'message');
        // dd($data);

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'email.required' => 'Địa chỉ email không được để trống',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'subject.required' => 'Tiêu đề không được để trống',
            'message.required' => 'Nội dung không được để trống',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        Contact::create($data);

        return redirect()->route('contact.index')->withSuccess('Bạn đã gửi tin nhắn thành công');
    }
}
