<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth')->group(function () {
});
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

Auth::routes();
// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [PostController::class, 'index'])->name('home');

Route::get('/createpost', function () {
    return view('posts/createpost');
})->name('createpost');
Route::get('/updatepost/{id}', [PostController::class, 'edit'])->name('updatepost');
Route::post('create', [PostController::class, 'save']);
Route::post('confirm', [PostController::class, 'confirm']);
Route::get('/search', [PostController::class, 'search']);
Route::post('/updateblade/{id}', [PostController::class, 'updateblade'])->name('updateblade');
Route::post('/update/{id}', [PostController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [PostController::class, 'delete']);
Route::post('/download', [PostController::class, 'download'])->name('download');
Route::post('/uploadpost', [PostController::class, 'upload']);
Route::get('/upload', function () {
    return view('posts/upload');
});


Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/createuser', function () {
    return view('users/createuser');
})->name('createuser');
Route::post('/confirmuser', [UserController::class, 'createuser'])->name('confirmuser');
Route::post('/saveuser', [UserController::class, 'saveuser']);
Route::delete('/deleteuser/{id}', [UserController::class, 'deleteuser']);
Route::post('/searchuser', [UserController::class, 'search']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{id}', [UserController::class, 'profile']);
Route::get('/edit_profile/{id}', [UserController::class, 'editProfile']);
Route::post('/confirm_profile', [UserController::class, 'confirmProfile']);
Route::post('/updateuser/{id}', [UserController::class, 'updateUser']);

Route::get('/changepassword/{id}', [UserController::class, 'findUserById'])->name('changepasswordscreen');
Route::post('/updatepassword/{id}', [UserController::class, 'updatepassword']);
Route::get('forgotpassword', [UserController::class, 'forgotpassword']);
