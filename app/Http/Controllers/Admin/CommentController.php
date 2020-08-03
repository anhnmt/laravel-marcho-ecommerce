<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function list()
    {
        $comments = Comment::select('id', 'parent_id', 'blog_id', 'user_id', 'body');

        return datatables($comments)
            ->addColumn('action', function ($comment) {
                return '<button data-delete="' . $comment->id . '" class="btn btn-sm btn-danger"><i class="far fa-trash"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comment.index')->withSuccess('Xoá bình luận thành công');
    }
}
