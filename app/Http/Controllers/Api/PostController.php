<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
       $posts = Post::all();
       return PostResource::collection($posts->paginate(5));
    }

    public function findById($id)
    {
        return new PostResource(Post::findOrFail($id));
    }

    public function create(PostRequest $request)
    {

        $post = Post::create($request->validated() + ['user_id' => Auth::id()]);
        return new PostResource($post);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        if($post->user_id !== Auth::id()){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $post->update($request->validated());
        return new PostResource($post);
    }
    public function delete($id)
    {
        $post = Post::find($id);
        if($post->user_id != Auth::id()){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
