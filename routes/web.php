<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//Two factor routes
Route::get('verify/resend', 'App\Http\Controllers\Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'App\Http\Controllers\Auth\TwoFactorController')->only(['index', 'store']);

//public routes
Route::post('/checkEmail', [App\Http\Controllers\HomeController::class, 'checkEmail'])->name('checkEmail')->withoutMiddleware(['auth']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

//Routes Associated with admin middlware
Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::get('/dashboard',[AdminController::class,'admin_index'])->name('admin_index');
    Route::get('/user-search', [AdminController::class, 'userSearch'])->name('userSearch');
       
});

//Routes Associated with user middlware
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','twofactor']], function(){
    Route::get('/profile',[UserController::class,'userProfile'])->name('userProfile');
    Route::get('/password/change', [UserController::class, 'showChangePasswordForm'])->name('passwords.change');
    Route::post('/password/change', [UserController::class, 'changePassword'])->name('changePassword');
    
});

//route to download file
Route::get('files/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/public/'.'/id_verification/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
    else
    {
        return response('No Such Resource', 400);
    }
})->name('downloadFile');
