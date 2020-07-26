<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $sliders = Slider::select(['id', 'name', 'body', 'link', 'image', 'status'])->orderBy('id', 'desc');

        return datatables($sliders)
            ->addColumn('image', function ($slider) {
                $thumb_url = $slider->image ? $slider->image : 'assets/img/placeholder.png';
                return '<img height="70px" width="70px" src="' . asset($thumb_url) . '"/>';
            })
            ->addColumn('status', function ($slider) {
                return $slider->status === 1 ? '<span class="badge badge-success">Kích hoạt</span>' : '<span class="badge badge-warning">Bản nháp</span>';
            })
            ->addColumn('action', function ($slider) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.slider.destroy', $slider->id) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';

                $action .= '<a href="' . route('admin.slider.edit', $slider->id) . '" class="btn btn-sm btn-warning">Sửa</a> ';
                $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';

                $action .= '</div></form>';

                return $action;
            })
            ->rawColumns(['image', 'status', 'action'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:sliders',
            'link' => 'nullable',
            'image' => 'required',
            'body' => 'nullable',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'image.required' => 'Vui lòng thêm ảnh',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        Slider::create($request->all());

        return redirect()->route('admin.slider.index')->withSuccess('Thêm slider thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $slider->image = $slider->image ? $slider->image : 'assets/img/placeholder.png';

        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'link' => 'nullable',
            'image' => 'required',
            'body' => 'nullable',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'image.required' => 'Vui lòng thêm ảnh',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $slider->update($request->all());

        return redirect()->route('admin.slider.index')->withSuccess('Cập nhật slider thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('admin.slider.index')->withSuccess('Xoá slider thành công');
    }
}
