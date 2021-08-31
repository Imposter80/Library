<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AdminUserController;
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
    Route::get('/login', [UserController::class ,'loginForm'])->name('login.create');  //показывает форму для входа
    Route::post('/login', [UserController::class ,'login'])->name('login');            //принимает данные из формы для входа
});



Route::get('/logout', [UserController::class ,'logout'])->name('logout') ->middleware('auth'); //выход пользователя



Route::group(['middleware' =>'admin', 'prefix' => 'admin', 'as'=>'admin','namespace' =>'Admin' ], function ()
{
    Route::get('/', [MainController::class, 'index'])->name('.main');

//users
    Route::get('/register' , [AdminUserController::class ,'create'])->name('register.create');
    Route::post('/register' , [AdminUserController::class ,'store'])->name('register.store');

    Route::get('/users' , [AdminUserController::class ,'list'])->name('register.list');

    Route::get('{id}/edit' , [AdminUserController::class ,'edit'])->name('register.edit');

    Route::put('users/{id}' , [AdminUserController::class ,'update'])->name('register.update');
    Route::delete('users/{id}' , [AdminUserController::class ,'destroy'])->name('register.destroy');


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
