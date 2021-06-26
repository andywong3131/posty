<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with('user', 'likes')->latest()->paginate(5);

        return view('user.posts', [
            'posts' => $posts,
            'user' => $user
        ]);
    }
}
