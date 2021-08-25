<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;


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

//Route::get('/', function () {
//    return view('pages/index');
//});
Route::view('/' , 'pages/index' )->name('pages.index');

Route::group(['middleware' => 'guest'], function ()
{
    Route::get('/register' , [UserController::class ,'create'])->name('register.create');
    Route::post('/register' , [UserController::class ,'store'])->name('register.store');

    Route::get('/login', [UserController::class ,'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class ,'login'])->name('login');

});

Route::get('/logout', [UserController::class ,'logout'])->name('logout') ->middleware('auth');

Route::group(['middleware' =>'admin', 'prefix'=>'admin', 'namespace' =>'Admin'], function ()
{
    Route::get('/', [MainController::class, 'index']);
});











//Route::name('user.')->group(function (){
//    Route::view('/private', 'private' )->middleware('auth')->name('private');
//
//    Route::get('/login', function (){
//        if(Auth::check()){
//            return redirect(route('user.private'));
//        }
//        return view('login');
//    })->name('login');
//
//   // Route::post('/login', )
//    //Route::get('/logout', []) ->name('logout');
//    Route::get('/registration', function (){
//        if(Auth::check()){
//            return redirect(route('user.private'));
//        }
//        return view('registration');
//    })->name('registration');
//
//    //Route::post('/registration', []);
//
//
//
//});
