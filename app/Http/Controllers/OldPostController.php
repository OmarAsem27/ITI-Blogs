<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

// class PostController extends Controller
// {

//     public function index()
//     {
//         $posts = Post::paginate(3);
//         // Carbon::parse($posts->created_at)->format('F j, Y'); // not working
//         return view("posts.index", ["posts" => $posts]);
//     }

//     public function create()
//     {
//         return view("posts.create");
//     }

//     public function store()
//     {
//         $fields = request()->validate([
//             'title' => "required",
//             'description' => "required",
//             'posted_by' => 'required'
//         ]);
//         $postData = request()->all();
//         $post = new Post();
//         $post->title = $postData['title'];
//         $post->description = $postData['description'];
//         $post->posted_by = $postData['posted_by'];
//         $post->save();
//         return to_route('posts.index');
//     }

//     public function edit($id)
//     {
//         $post = Post::find($id);
//         if ($post) {
//             return view('posts.edit', ['post' => $post]);
//         }
//         abort(404);
//     }

//     public function afterEdit($id)
//     {
//         $fields = request()->validate([
//             'title' => "required",
//             'description' => "required",
//             'posted_by' => 'required'
//         ]);
//         $post = Post::find($id);
//         $post->title = $fields['title'];
//         $post->description = $fields['description'];
//         $post->posted_by = $fields['posted_by'];
//         $post->update();
//         return to_route('posts.index');
//     }
//     public function show($id)
//     {
//         $post = Post::find($id);
//         if ($post) {
//             return view("posts.show", ["post" => $post]);
//         }
//         abort(404);
//     }

//     public function destroy($id)
//     {
//         $post = Post::findOrFail($id);
//         $post->delete();
//         return to_route('posts.index');
//     }
// }

