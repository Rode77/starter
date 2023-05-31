<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SecondController;
use App\Http\Controllers\NewsController;


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

Route::get('/', function () {
    
    
        return view('welcome');
});


Route::get('/x', function () {
    return 'welcome x';
});

//->withoutMiddleware('auth')
Route::group(['namespace' => 'Admin'],function() {
Route::get('second', [SecondController::class,'showString']);
Route::get('show1', [SecondController::class,'showString1']);
Route::get('show2', [SecondController::class,'showString2']);
Route::get('show3', [SecondController::class,'showString3']);
});

Route::get('login',function(){
    return 'Must be access';
})->name('login');



Route::resource('news',NewsController::class);

Route::get('/',[NewsController::class,'index']);

Route::get('/land',function(){

    return view('landing');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');




