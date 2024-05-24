<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

//Front Routes
Route::get('/',[HomeController::class,'home'])->name('front.home');
Route::get('/postdetails/{id}',[HomeController::class,'postDetails'])->name('front.postdetails');
Route::get('/categoryPosts/{id}',[HomeController::class,'getCategoryPost'])->name('front.getCategoryPost');
Route::post('/postcommentpage',[HomeController::class,'postcomment'])->name('front.postcomment');



//Dashboard Routes
Route::group([
    'middleware'=>['auth','verified'],
    'prefix'=>'dashboard',
    'as'=>'dashboard.'
],function(){
Route::get('/dashboard',[DashboardController::class,'index'])->name('home');

Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/add',[CategoryController::class,'add'])->name('category.add');
Route::post('/category/add',[CategoryController::class,'insert'])->name('category.insert');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/edit/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/add',[PostController::class,'add'])->name('post.add');
Route::post('/post/add',[PostController::class,'insert'])->name('post.insert');
Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('/post/edit/{id}',[PostController::class,'update'])->name('post.update');
Route::get('/post/delete/{id}',[PostController::class,'delete'])->name('post.delete');


// dashboard/post ................................ dashboard.post.index › Dashboard\PostController@index  
//   GET|HEAD  dashboard/post/add .................dashboard.post.add › Dashboard\PostController@add  
//   POST      dashboard/post/add .................dashboard.post.insert › Dashboard\PostController@insert  
//   GET|HEAD  dashboard/post/delete/{id} .........dashboard.post.delete › Dashboard\PostController@delete  
//   GET|HEAD  dashboard/post/edit/{id} ...........dashboard.post.edit › Dashboard\PostController@edit  
//   POST      dashboard/post/edit/{id} ...........dashboard.post.update › Dashboard\PostController@update


Route::get('/media',[MediaController::class,'index'])->name('media.index');

Route::get('/tag',[TagController::class,'index'])->name('tag.home');

Route::get('/comment',[CommentController::class,'index'])->name('comment.index');

});

//Routes Name
//   GET|HEAD  dashboard/category ..........dashboard.category.index › Dashboard\CategoryController@index  
//   GET|HEAD  dashboard/comment ...........dashboard.comment.index › Dashboard\CommentController@index  
//   GET|HEAD  dashboard/dashboard .........dashboard.home › Dashboard\DashboardController@index  
//   GET|HEAD  dashboard/media .............dashboard.media.index › Dashboard\MediaController@index  
//   GET|HEAD  dashboard/post ..............dashboard.post.index › Dashboard\PostController@index  
//   GET|HEAD  dashboard/tag ...............dashboard.tag.home › Dashboard\TagController@index  

// GET|HEAD  dashboard/category ........... dashboard.category.index › Dashboard\CategoryController@index  
//   GET|HEAD  dashboard/category/add ........... dashboard.category.add › Dashboard\CategoryController@add  
//   POST      dashboard/category/add ..... dashboard.category.insert › Dashboard\CategoryController@insert  
//   GET|HEAD  dashboard/category/delete/{id} dashboard.category.delete › Dashboard\CategoryController@del…  
//   GET|HEAD  dashboard/category/edit/{id} ... dashboard.category.edit › Dashboard\CategoryController@edit  
//   POST      dashboard/category/edit/{id} dashboard.category.update › Dashboard\CategoryController@update


// Route::get('/dashboard', function () {
//     return view('dashboard.admindash');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
