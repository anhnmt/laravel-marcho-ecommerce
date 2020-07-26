<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::select(['id', 'name', 'slug', 'image', 'status'])->orderBy('id', 'desc');

        return datatables($categories)
            ->addColumn('image', function ($category) {
                $thumb_url = $category->image ? $category->image : 'assets/img/placeholder.png';
                return '<img height="70px" width="70px" src="' . $thumb_url . '"/>';
            })
            ->addColumn('status', function ($category) {
                return $category->status === 1 ? '<span class="badge badge-success">Kích hoạt</span>' : '<span class="badge badge-warning">Bản nháp</span>';
            })
            ->addColumn('action', function ($category) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.category.destroy', $category->id) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';
                
                if(auth()->user()->can('admin.category.edit'))
                $action .= '<a href="' . route('admin.category.edit', $category->id) . '" class="btn btn-sm btn-warning">Sửa</a> ';

                if(auth()->user()->can('admin.category.destroy'))
                $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';

                if(!auth()->user()->hasRole(['admin.category.edit', 'admin.category.destroy'])) 
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
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'name' => 'required|string|unique:categories',
            'slug' => 'nullable|unique:categories',
            'image' => 'nullable',
            'description' => 'nullable',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'slug.unique' => 'Slug đã tồn tại',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        Category::create($request->all());

        return redirect()->route('admin.category.index')->withSuccess('Thêm danh mục thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category->preview = $category->image ? $category->image : 'assets/img/placeholder.png';

        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'nullable|string',
            'image' => 'nullable',
            'description' => 'nullable',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $category->update($request->all());

        return redirect()->route('admin.category.index')->withSuccess('Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index')->withSuccess('Xoá danh mục thành công');
    }
}
