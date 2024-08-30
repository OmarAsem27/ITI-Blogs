<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Creator;
use Illuminate\Routing\ResourceRegistrar;
use App\Models\Post;

class PostController extends Controller
{
    protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'data'];



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $creators = Creator::all();
        return view("posts.create", compact('creators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $image_path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image_path = $image->store('', 'posts_images');
        }
        $request_data = request()->all();
        $request_data['image'] = $image_path;
        $post = Post::create($request_data);
        // return view('posts.show', ['post' => $post]); // SAME
        return to_route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $image_path = public_path('images/posts/' . $post->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $image_path = $post->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('images', 'posts_images');
        }
        $request_data = request()->all();
        $request_data['image'] = $image_path;
        $post->update($request_data);
        return to_route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // start SOFT delete
        // $post->delete();      ///////////////   This SOFT deletes the post 
        // end SOFT delete


        // start HARD delete
        // $post->forceDelete(); // This permanently deletes the post for ever!
        // end HARD delete


        $image_path = public_path('images/posts/' . $post->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // $post->delete();      ///////////////   This SOFT deletes the post 
        $post->forceDelete();   ///////////////    This permanently deletes the post for ever!
        return to_route('posts.index');
    }
    public function restoreSoftDeleted($id)
    {
        // $post = Post::withTrashed()->find($id);
        // $post->restore();       // This restores the soft-deleted post
        // return to_route('posts.index');

        return "DONEEEEEEEEEEEEEEEE";
    }

}
