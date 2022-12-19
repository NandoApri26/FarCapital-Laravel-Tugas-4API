<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthpenggunaController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Models\Product;
use App\Models\Article;

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\AuthorCollectionIterator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Level Admin
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_admin', [AuthController::class, 'login_admin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_admin', [AuthController::class, 'register_admin']);
Route::get('/logout', [AuthController::class, 'logout']);


// Level Pengguna
Route::get('/login_pengguna', [AuthpenggunaController::class, 'login'])->name('login_pengguna');
Route::post('/login_pengguna', [AuthpenggunaController::class, 'login_pengguna']);
Route::get('/register_pengguna', [AuthpenggunaController::class, 'register'])->name('register_pengguna');
Route::post('/register_pengguna', [AuthpenggunaController::class, 'register_pengguna']);
Route::get('/logout_pengguna', [AuthpenggunaController::class, 'logout']);
Route::get('/Product/{product}/detail', [ProductController::class, 'show']);
Route::get('/Article/{article}/detail', [ArticleController::class, 'show']);

// Admin
Route::group(['middleware' => ['auth', 'admin']], function(){
        // Route::get('/', [HomeController::class, 'index']);
        Route::get('/Home', [HomeController::class, 'index']);
        Route::get('/Home/article', [HomeController::class, 'article']);


        // Route Product
        Route::get('/Product', [ProductController::class, 'index']);
        Route::get('/Product/create', [ProductController::class, 'create']);
        Route::post('/Product', [ProductController::class, 'store']);
        Route::delete('/Product/{product}', [ProductController::class, 'destroy']); //Fungsi Delete
        Route::get('/Product/{product}/edit', [ProductController::class, 'edit']);
        Route::patch('/Product/{product}', [ProductController::class, 'update']);

        // Route Article
        Route::get('/Article', [ArticleController::class, 'index']);
        Route::get('/Article/create', [ArticleController::class, 'create']);
        Route::post('/Article', [ArticleController::class, 'store']);
        Route::delete('/Article/{article}', [ArticleController::class, 'destroy']);
        Route::get('/Article/{article}/edit', [ArticleController::class, 'edit']);
        Route::get('/Article/{article}', [ArticleController::class, 'update']);
});

// Pengguna
Route::group(['middleware' => ['authpengguna', 'pengguna']], function(){
    Route::get('/_pengguna', [HomeController::class, 'index']);
    Route::get('/Home_pengguna', [HomeController::class, 'index']);
    Route::get('/Home/article_pengguna', [HomeController::class, 'article']);
});
