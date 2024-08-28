<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/posts", [PostController::class, "index"])->name("posts.index");
// Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
// Route::get("/posts/{id}", [PostController::class, "show"])->name("posts.show")->where('id', '[0-9]+');
// Route::get("/posts/edit/{id}", [PostController::class, "edit"])->name("posts.edit");
// Route::get("/posts/delete/{id}", [PostController::class, "destroy"])->name("posts.destroy");
// Route::post("/posts", [PostController::class, "store"])->name("posts.store");
// Route::post("/posts/edit/{id}", [PostController::class, "afterEdit"])->name('posts.update');


Route::resource('posts', PostController::class);