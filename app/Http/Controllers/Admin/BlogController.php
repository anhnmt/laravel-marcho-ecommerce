<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $blogs = Blog::select(['id', 'name', 'slug', 'image', 'status']);

        return datatables($blogs)
            ->addColumn('image', function ($blog) {
                $thumb_url = $blog->image ? $blog->image : 'assets/img/placeholder.png';
                return '<img height="70px" width="70px" src="' . $thumb_url . '"/>';
            })
            ->addColumn('status', function ($blog) {
                return $blog->status === 1 ? '<span class="badge badge-success">Kích hoạt</span>' : '<span class="badge badge-warning">Bản nháp</span>';
            })
            ->addColumn('action', function ($blog) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.blog.destroy', $blog->id) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';

                if(auth()->user()->can('admin.blog.edit'))
                $action .= '<a href="' . route('admin.blog.edit', $blog->id) . '" class="btn btn-sm btn-warning">Sửa</a> ';

                if(auth()->user()->can('admin.blog.destroy'))
                $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';
                
                if(!auth()->user()->hasRole(['admin.blog.edit', 'admin.blog.destroy'])) 
                $action .= "<span>Không có hành động nào</span>"; 
                
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
        return view('backend.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
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
            'name' => 'required|string|unique:blogs,name',
            'slug' => 'nullable|unique:blogs,slug',
            'image' => 'nullable',
            'description' => 'nullable',
            'body' => 'required',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên bài viết',
            'name.unique' => 'Tên bài viết đã tồn tại',
            'slug.unique' => 'Đường dẫn đã tồn tại',
            'body.required' => 'Vui lòng nhập nội dung',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $request['user_id'] = auth()->user()->id;

        Blog::create($request->all());

        return redirect()->route('admin.blog.index')->withSuccess('Thêm bài viết thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'nullable|string',
            'image' => 'nullable',
            'description' => 'nullable',
            'body' => 'required',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên bài viết',
            'body.required' => 'Vui lòng nhập nội dung',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $blog->update($request->all());

        return redirect()->route('admin.blog.index')->withSuccess('Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')->withSuccess('Xoá bài viết thành công');
    }
}
