<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => $request->user_id,
            'content' => $request->content,
        ]);

        return response()->json(['message' => 'Post created successfully', 'data' => $post], 201);
    }

    public function index()
    {
        $posts = Post::with('user')->get();

        return response()->json(['data' => $posts], 200);
    }
}
