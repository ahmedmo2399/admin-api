<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum'); 
    }

    // Create a new post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    

        $post = $request->user()->posts()->create($validated);

        return response()->json(new PostResource($post), 201);
    }

    // Retrieve all posts
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    // Retrieve a single post by id
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return new PostResource($post);
    }

    // Update a post (only the owner can update)
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Check if the logged-in user is the owner
        if ($post->user_id !== $request->user()->id) {
            return response()->json(['message' => 'You are not authorized to update this post.'], 403);
        }

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return new PostResource($post);
    }

    // Delete a post (only the owner can delete)
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Check if the logged-in user is the owner
        if ($post->user_id !== $request->user()->id) {
            return response()->json(['message' => 'You are not authorized to delete this post.'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully.']);
    }
}

