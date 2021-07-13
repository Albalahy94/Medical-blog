<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Models\User;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    // $id = Auth::user('id')[0]->id;
    // $pending = User::select('pending')->where('pending', $id)->get();

    // if ($pending == 1) {
    //     return view('pending');
    // } elseif ($pending == 0) {

    Route::get('/', [App\Http\Controllers\PostController::class, 'show'])->name('show');

    Auth::routes();
    Route::view('pending', 'pending');

    // Route::get('/home', )->name('home');
    // Route::get('/{id}', [App\Http\Controllers\PostController::class, 'index'])->name('home');
    Route::get('/show', [App\Http\Controllers\PostController::class, 'show'])->name('show');
    // Route::get('/show', 'PostController@show')->name('show');
    Route::get('/showpost/{postid}', [App\Http\Controllers\PostController::class, 'showPost'])->name('showpost');
    Route::get('/newpost', [App\Http\Controllers\PostController::class, 'create'])->name('newpost');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');

    Route::get('/editpost/{postid}', [App\Http\Controllers\PostController::class, 'edit'])->name('editpost');
    Route::post('/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('destroy');


    // Route::get('admin/dash', [App\Http\Controllers\PostController::class, 'index'])->name('index');
    Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('index');
    Route::get('admin/', [App\Http\Controllers\PostController::class, 'index'])->name('index');

    // // admin login
    // Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'adminlogin']);
    // Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'login']);
    // // Route::get('admin/dash', [App\Http\Controllers\AdminController::class, 'dash']);
    // Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // });

    // admin post add 

    Route::get('admin/members', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.members');
    Route::get('admin/editmember/{postid}', [App\Http\Controllers\AdminController::class, 'edit'])->name('editmember');
    Route::post('admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');

    Route::get('admin/pendingmembers', [App\Http\Controllers\AdminController::class, 'pendingMembers'])->name('admin.pendingmembers');
    Route::get('admin/pendingmembers/{postid}', [App\Http\Controllers\AdminController::class, 'pendingEdit'])->name('pendingmembers.editmember');
    Route::post('admin/pendingmembers/update/{id}', [App\Http\Controllers\AdminController::class, 'pendingUpdate'])->name('admin.pendingmembers.update');


    Route::get('admin/newmember', [App\Http\Controllers\AdminController::class, 'create'])->name('newmember');
    Route::post('admin/newmember', [App\Http\Controllers\AdminController::class, 'store'])->name('newmember');
    Route::get('admin/removemember/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('removemember');


    Route::get('/login/{service}', [LoginController::class, 'face']);
    Route::get('/login/{service}/callback', [LoginController::class, 'callback']);
    // } else {
    //     return redirect('/show');
    // }
});