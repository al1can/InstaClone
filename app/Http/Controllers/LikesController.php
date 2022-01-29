<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function index(Post $post)
    {
        return $post->likes;
    }

    public function store(Post $post)
    {
        return auth()->user()->liking()->toggle($post);
    }
}
