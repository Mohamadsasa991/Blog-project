    <?php

// use App\Http\Controllers\AjaxTagController;
use App\Http\Controllers\PostsController;
    use App\Http\Controllers\TagController;
    use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    // Route::get('/', function () {
        //     return view('home');
        // });
        Route::get('/',[PostsController::class,'home']);
        Route::get('posts/search',[PostsController::class,'search']);

        Route::middleware('auth')->group(function(){
            Route::get('posts',[PostsController::class,'index']);
    Route::get('posts/create',[PostsController::class,'create']);
    Route::get('posts/{id}',[PostsController::class,'show']);
    Route::post('posts',[PostsController::class,'store']);
    Route::get('posts/{id}/edit',[PostsController::class,'edit']);
    Route::put('posts/{id}',[PostsController::class,'update']);
    Route::delete('posts/{id}',[PostsController::class,'destroy']);

    Route::resource('users',UserController::class);

    Route::get('user/{id}/posts',[UserController::class,'posts'])->name('user.posts');


        Route::resource('tags',TagController::class);
        });


    Auth::routes();

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
