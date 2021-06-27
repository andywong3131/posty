<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        if ($post->alreadyLikedBy(auth()->user())) {
            abort(401);
        }

        auth()->user()->likes()->create([
            'post_id' => $post->id
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        if (! $post->alreadyLikedBy(auth()->user())) {
            abort(404);
        }

        auth()->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
