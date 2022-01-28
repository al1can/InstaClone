<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post, Request $request)
    {
        $data = $request->validate([
            'comment' => ['required','string'],
        ]);
        
        //auth()->user()->comments()->create($data);

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => request('comment'),
        ]);

        return back();
    }
}
