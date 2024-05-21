<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return response()->json(['data' => $posts,
             'message' => 'Retrieved successfully',
              'status_code' => 200,
            'status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $post = new Post();
            $post->name = $request->name;
            $post->post_content = $request->post_content;
            $post->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, $id)
    {
        try {
            $post = Post::findOrFail($id); 
            
            return response()->json(['data'=>$post,
                'message' => 'Post retrieved successfully',
              'status_code' => 200,
            'status' => true]);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to retrieve post',
              'status_code' => 500,
            'status' => false]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, $id)
    {
        try {
            $post = Post::findOrFail($id); 
            $post->name = $request->name;
            $po->post_content = $request->post_content;
            $post->save();
            return response()->json(['message' => 'Post updated successfully',
              'status_code' => 200,
            'status' => true]);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to update post',
              'status_code' => 500,
            'status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully',
              'status_code' => 200,
            'status' => true]);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to delete post',
              'status_code' => 500,
            'status' => false]);
        }
    
    }
}
