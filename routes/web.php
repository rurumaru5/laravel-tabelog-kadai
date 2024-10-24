<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ShopController;
use App\Models\Favorite;

use function Ramsey\Uuid\v1;

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
//     return view('home.index');
// });


Route::get('/home', [AdminController::class, 'index'])->middleware('auth');


//Route::get('/redirect', [HomeController::class, 'redirect']);
// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {

//Dashboard
// Route::group(['prefix' => '', 'as' => 'dashboard.'], function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('index');
// });

//Categories
//     Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
//         Route::get('/', [CategoryController::class, 'index'])->name('index');
//         Route::get('create', [CategoryController::class, 'create'])->name('create');
//         Route::post('/', [CategoryController::class, 'shop'])->name('shop');
//         Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit');
//         Route::put('{category:slug}', [CategoryController::class, 'update'])->name('update');
//         Route::delete('{category:slug/delete}', [CategoryController::class, 'destroy'])->name('delete');
//     });
// });
Route::get('/shop', [AdminController::class, 'shop']);

Route::get('/category', [AdminController::class, 'category']);

Route::get('/favorite', [HomeController::class, 'favorite']);

Route::post('/uploadshop', [AdminController::class, 'uploadshop']);

Route::post('/uploadcategory', [AdminController::class, 'uploadcategory']);

Route::get('/showshop', [AdminController::class, 'showshop']);

Route::get('/deleteshop/{id}', [AdminController::class, 'deleteshop']);

Route::get('/updateview/{id}', [AdminController::class, 'updateview']);

Route::post('/updateshop/{id}', [AdminController::class, 'updateshop']);

Route::get('/updatebookview/{id}', [AdminController::class, 'updatebookview']);

Route::get('/deletebookview/{id}', [AdminController::class, 'deletebookview']);

Route::post('/updatebook/{id}', [AdminController::class, 'updatebook']);


Route::get('/showcategory', [AdminController::class, 'showcategory']);



Route::get('/deletecategory/{id}', [AdminController::class, 'deletecategory']);

Route::get('/updatecategoryview/{id}', [AdminController::class, 'updatecategoryview']);

Route::post('/updatecategory/{id}', [AdminController::class, 'updatecategory']);

Route::get('/shop_details/{id}', [HomeController::class, 'shop_details']);

Route::post('/add_booking/{id}', [HomeController::class, 'add_booking'])->middleware('auth');

Route::get('/search', [SearchController::class, 'search']);

Route::get('/search_category', [SearchController::class, 'search_category']);

Route::get('/search_shop', [SearchController::class, 'search_shop']);

Route::get('/search_book', [SearchController::class, 'search_book']);

Route::get('/search_user', [SearchController::class, 'search_user']);


Route::post('review', [ReviewController::class, 'review'])->middleware('auth');

Route::get('edit_review/{id}', [ReviewController::class, 'edit_review'])->middleware('auth');

Route::get('delete_review/{id}', [ReviewController::class, 'delete_review'])->middleware('auth');

Route::post('update_review', [ReviewController::class, 'update_review'])->middleware('auth');


Route::get('/mypage', [UserController::class, 'mypage']);

Route::get('/edit', [UserController::class, 'edit']);

Route::put('/update_mypage',  [UserController::class, 'update_mypage']);

Route::get('/booking_list', [BookController::class, 'booking_list']);

Route::get('/user_booking_list', [BookController::class, 'user_booking_list']);

Route::get('/user_update_book/{id}', [BookController::class, 'user_update_book']);

Route::get('/delete_book/{id}', [BookController::class, 'delete_book']);


Route::get('/user_list', [UserController::class, 'user_list']);

Route::get('/register_card', [UserController::class, 'register_card'])->name('user.register_card');

Route::post('token',  [UserController::class, 'token'])->name('token');

Route::get('/member', [UserController::class, 'member'])->middleware('auth');
Route::get('/info',  [UserController::class, 'info']);
Route::post('/paid',  [UserController::class, 'paid']);
Route::post('/cancel',  [UserController::class, 'cancel']);

Route::post('/delete_card', [UserController::class, 'delete_card']);



Route::get('/edit_password', [UserController::class, 'edit_password'])->name('mypage.edit_password');
Route::put('/update_password', [UserController::class, 'update_password'])->name('mypage.update_password');

Route::middleware(['auth', 'verified'])->group(function () {
  Route::resource('shops', HomeController::class);
});
//お気に入りのルート
Route::post('/favorite/{shop_id}', [FavoriteController::class, 'store'])->middleware('auth');
Route::post('/unfavorite/{shop_id}', [FavoriteController::class, 'destroy'])->middleware('auth');

Route::get('/user_favorite_shop', [FavoriteController::class, 'index'])->middleware('auth');;


//Route::resource('users', UserController::class)->middleware(['auth', 'verified']);
//Auth::routes(['verify' => true]);




//         Route::get('/', [CategoryController::class, 'index'])->name('index');
//         Route::get('create', [CategoryController::class, 'create'])->name('create');
//         Route::post('/', [CategoryController::class, 'shop'])->name('shop');
// 