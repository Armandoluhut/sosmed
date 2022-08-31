<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function postCreate(Request $request)
    {

        $rules = $request->validate([
            'post' => 'required',
        ]);

        $rules['user_id'] = auth()->user()->id;

        Post::create($rules);

        return redirect('/');
    }

    public function post(Post $post)
    {
        return view('edit_post', ['post' => $post]);
    }

    public function postEdit(Request $request, Post $post)
    {
        Post::where('id', $post->id)->update([
            'post' => $request->post,
        ]);
        return redirect('/');
    }

    public function postDelete(Post $post)
    {
        // $post = Post::find($post);

        Post::destroy($post->id);

        return redirect('/');
    }
}
