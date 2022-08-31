<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function commentCreate(Request $request, Post $post)
    {
        $rules = $request->validate([
            'comment' => 'required',
        ]);

        $rules['post_id'] = $post->id;
        $rules['user_id'] = auth()->user()->id;

        Comment::create($rules);

        return redirect('/');
    }

    public function comment(Comment $comment)
    {
        return view('edit_comment', ['comment' => $comment]);
    }

    public function commentEdit(Request $request, Comment $comment)
    {
        Comment::where('id', $comment->id)->update([
            'comment' => $request->comment,
        ]);

        return redirect('/');
    }

    public function commentDelete(Comment $comment)
    {
        Comment::destroy($comment->id);

        return redirect('/');
    }
}
