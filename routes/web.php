<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SocialController;
// use App\Http\Controllers\Auth\GoogleController;

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
Route::resource('products', ProductController::class);

Route::resource('customers', CustomerController::class);

// Route::get('/search',[CustomerController::class,'search']);

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\HomeController@languageDemo');
Auth::routes();
// Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class,'redirectToGoogle']);
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class,'handleGoogleCallback']);
// Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class,'redirectToGoogle');
// Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class,'handleGoogleCallback');

// Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
// Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
// Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
// Route::get('/send-mail', [MailController::class, 'index']);

Route::get('/send-mail', function(){
    $details['email'] = 'riddhi@topsinfosolutions.com';
  
    dispatch(new App\Jobs\BulkEmail($details));
  
    dd('done');
});
Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'CustomerController@pagenotfound']);


Route::get('/components', function (){
    return view('master');
  });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
