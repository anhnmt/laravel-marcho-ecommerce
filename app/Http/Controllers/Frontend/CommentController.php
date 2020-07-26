<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $request['user_id'] = auth()->user()->id;
        $request['blog_id'] = $blog->id;

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'body' => 'required|string',
        ], [
            'body.required' => 'Vui lòng viết bình luận trước khi đăng',
        ]);

        if ($validator->fails()) {
            return redirect()->to(
                url()->previous() . '#comment_section'
            )->withInput()->withErrors($validator);
        }

        Comment::create($request->all());
        // Comment::create($request->only('user_id', 'post_id', 'body'));

        return redirect()->route('blog.show', $blog->slug)->withSuccess('Đăng bình luận thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
