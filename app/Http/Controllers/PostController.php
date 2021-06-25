<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        $posts = Post::with(['user', 'likes'])->latest()->paginate(5);
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        
        auth()->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    
    public function destroy(Post $post)
    {
        if (!$post->createdBy(auth()->user(), $post)) {
            return abort(404);
        }

        $post->delete();
        
        return back();
    }
}
