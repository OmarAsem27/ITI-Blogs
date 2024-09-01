<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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



use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    // return "GITHUBBBBBBBBBBBBBBBB";
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/auth/callback', function () {
    // return "redirectedddddddd";
    $githubUser = Socialite::driver('github')->user();
    // dd($githubUser);
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'password' => $githubUser->token,
        'image' => $githubUser->getAvatar(),
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);
    return redirect('/home');



    // $user->token
});