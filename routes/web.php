<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('frontend.bloghome');
// });

// Route::get('/singlepost', function () {
    //     return view('frontend.singlepost');
    // })->name('singlepost');

    // Route::get('/component', function () {
        //     return view('frontend.component');
        // })->name('component');

Route::get('/',[HomeController::class, 'index'])->name('blog.home');
Route::get('/post/details/{id}',[HomeController::class, 'details'])->name('blog.post.details');
Route::get('/post/all',[HomeController::class, 'allposts'])->name('blog.post.all');

Route::get('/accept_post/{id}',[HomeController::class, 'accept'])->name('blog.post.accept');
Route::get('/reject_post/{id}',[HomeController::class, 'reject'])->name('blog.post.reject');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin Auth
Route::get('/admin/dashboard', function () {
    return view('admin.master');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware(['auth:admin','verified'])->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('admin/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__.'/adminauth.php';

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('user.posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create.posts');
    Route::post('/posts', [PostController::class, 'store'])->name('store.posts');
    //Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('edit.posts');
    Route::post('/posts/{id}', [PostController::class, 'update'])->name('update.posts');
    Route::get('/posts/{id}', [PostController::class, 'destroy'])->name('delete.posts');
});


Route::middleware(['auth:admin','verified'])->group(function () {
    Route::get('admin/posts', [AdminController::class, 'index'])->name('admin.posts');
    Route::get('admin/posts/create', [AdminController::class, 'create'])->name('admin.create.posts');
    Route::post('admin/posts/store', [AdminController::class, 'store'])->name('admin.store.posts');
    // Route::get('admin/posts/{id}', [AdminController::class, 'show'])->name('admin.show.posts');
    Route::get('admin/posts/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit.posts');
    Route::post('admin/posts/{id}', [AdminController::class, 'update'])->name('admin.update.posts');
    Route::get('admin/posts/{id}', [AdminController::class, 'destroy'])->name('admin.delete.posts');

    Route::get('admin/view/posts/{id}', [AdminController::class, 'userposts'])->name('admin.view.posts');
});


