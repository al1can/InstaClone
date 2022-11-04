<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user', 'likes')->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required',
            //'image' => 'required|image',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        //\App\Models\Post::create($data);

        //return view()
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains(auth()->user()->id) : false;

        return view('posts.show', compact('post', 'follows'));
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/');
    }
}
