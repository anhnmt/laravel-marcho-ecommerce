<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function list(Blog $blog)
    {
        $this->blog = $blog;
        $comments = Comment::where('blog_id', $blog->id)->get();
        // dd($comments);

        return datatables($comments)
            ->addColumn('user', function ($comment) {
                return $comment->user->name;
            })
            ->addColumn('action', function ($comment) {
                $user = auth()->user();

                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.blog.comment.destroy', [$this->blog->id, $comment->id]) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';

                if ($user->can('admin.blog.comment.edit')) {
                    $action .= '<a href="' . route('admin.blog.comment.edit', [$this->blog->id, $comment->id]) . '" class="btn btn-sm btn-warning">Sửa</a> ';
                }

                if ($user->can('admin.blog.comment.destroy')) {
                    $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';
                }

                if ($user->cannot(['admin.blog.comment.edit', 'admin.blog.comment.destroy'])) {
                    $action .= "<span>Không có hành động nào</span>";
                }

                $action .= '</div></form>';

                return $action;
                dd($action);
            })
            ->rawColumns(['id', 'user', 'body', 'action'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog)
    {
        return view('backend.comment.index', compact('blog'));
    }

    public function edit(Blog $blog, Comment $comment)
    {
        return view('backend.comment.edit', compact('blog', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Blog $blog, Request $request, Comment $comment)
    {
        $request->validate(
            [
                'body' => 'required',
            ],
            [
                'body.required' => 'Đánh giá không được để trống',
            ]
        );

        if ($comment->update($request->all())) {
            return redirect()->route('admin.blog.comment.index', $blog->id)->withSuccess('Cập nhật đánh giá thành công!');
        }
        return redirect()->back()->withErrors('Cập nhật đánh giá thất bại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, Comment $comment)
    {
        if ($comment->delete()) {
            return redirect()->route('admin.blog.comment.index', $blog->id)->withSuccess('Xoá đánh giá thành công!');
        }
        return redirect()->back()->withErrors('Xoá đánh giá thất bại!');
    }
}
