<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


    // typical routes for typical Controller 
// Route::get("/posts", [PostController::class, "index"])->name("posts.index");
// Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
// Route::get("/posts/{id}", [PostController::class, "show"])->name("posts.show")->where('id', '[0-9]+');
// Route::get("/posts/edit/{id}", [PostController::class, "edit"])->name("posts.edit");
// Route::get("/posts/delete/{id}", [PostController::class, "destroy"])->name("posts.destroy");
// Route::post("/posts", [PostController::class, "store"])->name("posts.store");
// Route::post("/posts/edit/{id}", [PostController::class, "afterEdit"])->name('posts.update');



// Route::get('posts/restore', PostController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);



// Route::get('posts/restore', function (Post $post) {
//     // $post = Post::withTrashed()->get();
//     // $post->restore();       // This restores the soft-deleted post
//     // return to_route('posts.index');
//     dd(request());
//     return "RESTOREDDDDDDDDDDDDDDDDDDDD";
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
