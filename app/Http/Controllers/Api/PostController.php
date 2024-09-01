<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $post_validation = Validator::make($request->all(), [
            'title' => 'required|string|min:3|unique:posts',
            'description' => 'required|string|min:10',
            // 'posted_by' => ['required', 'string', new ValidatePostCreator()],
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($post_validation->fails()) {
            return response()->json(
                [
                    'message' => 'errors with request params',
                    'errors' => $post_validation->errors()
                ]
                ,
                422
            );
        }

        $image_path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image_path = $image->store('', 'posts_images');
        }
        $request_data = request()->all();
        $request_data['image'] = $image_path;
        // $request_data['creator_id'] = Auth::id();
        $post = Post::create($request_data);
        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $post = $post->findOrFail($post->id);
        
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post_validation = Validator::make($request->all(), [
            'title' => ['required', 'string', 'min:3', Rule::unique("posts", 'title')->ignore($post)],
            // 'title' => ['required|string|min:3', Rule::unique("posts", 'title')->ignore($post)],
            'description' => 'required|string|min:10',
            // 'posted_by' => ['required', 'string', new ValidatePostCreator()],
            "image" => "nullable|image|mimes:jpeg,jpg,png|max:2048",
        ]);

        if ($post_validation->fails()) {
            return response()->json(
                [
                    'message' => 'errors with request params',
                    'errors' => $post_validation->errors()
                ]
                ,
                422
            );
        }

        $image_path = $post->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            Storage::disk('posts_images')->delete($image_path);
            $image = $request->file('image');
            $image_path = $image->store("images", 'posts_images');
        }
        $request_data = request()->all();
        $request_data['image'] = $image_path;
        $post->update($request_data);
        return $post;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('posts_images')->delete($post->image);
        }
        $post->delete();
        return response()->json([
            'deleted' => 'success'
        ], 204);
    }
}
