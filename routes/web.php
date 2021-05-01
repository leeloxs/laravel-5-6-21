<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MollieController;
use App\Http\Conrollers\PayController;
use App\Http\Controllers\OnepayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Payments1Controller;
use App\Http\Controllers\ReceiptPayment;



/*
|--------------------------------------------------------------------------
| Web Routes ( pages link )
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' -> ['auth','isUser']), function() {
  //  Route::get('/home', 'HomeController@index')->name("home");
Route::get('/myprofile','App\Http\Controllers\Frontend\UserController@myprofile');
Route::post('/myprofile-update','App\Http\Controllers\Frontend\UserController@profileupdate');

//Route::get('/payment1','App\Http\Controllers\Payments1Controller@payment1');
//Route::post('/payment1store','App\Http\Controllers\Payments1Controller@payment1store');

Route::get('/payment1', function(){
    return view('payment1');
});
Route::post('payment1store',[Payments1Controller::class,'payment1store']);

Route::get('/about', function () {
    return view('about');
});

//Route::get('contact', 'ContactController@create');

//Route::post('contact', 'ContactController@store');

//Route::get('/contact', 'HomeController@index')->name('contact');

//Route::post('/contact', 'HomeController@send_mail')->name('addContact');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    return view('home');
});

Route::get('/community', function () {
    return view('community');
});

Route::get('/donatesuccess', function () {
    return view('donatesuccess');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::post('/contactusstore','App\Http\Controllers\ContactController@contactusstore');

Route::get('/payment2', function () {
    return view('payment2');
});

Route::post('/receipt','App\Http\Controllers\ReceiptController@receipt');
//Route::post('receipt',[ReceiptController::class,'receipt']);

Route::get('/donate', function () {
    return view('donate');
});

Route::get('/financial', function () {
    return view('financial');
});

/*Route::get('/payment1', function () {
    return view('payment1');
});*/

Route::get('/payment2', function () {
    return view('payment2');
});


//Route::get('/contact-form', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form');
//Route::post('/contact-form', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');


//Route::post('submit', 'pays1@save');
//Route::post('payment1',[PayController::class,'addData']);



// payment 1 test
//Route::get('/payment1', [App\Http\Controllers\OnepayController::class, 'payment1'])->name('payment1');
//Route::post('/payment1', [App\Http\Controllers\OnepayController::class, 'storepayment1'])->name('payment1.store');



// payment stripe gateway
//Route::get('/stripayment', [PaymentController::class, 'stripayment']);
//Route::post('/transaction', [PaymentController::class, 'makePayment'])->name('make-payment');




Route::view("profile",'profile');
Route::view("form",'home');
Route::post("submit",'Editprofile@save');
//Route:get('/contact',[ContactController::class,'contact']);   //contact-form & contact function
//Route::post('/send-message',[ContactController::class,'sendEmail'])->name(contact.send);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('layouts\app');




Auth::routes();

//Posts
Route::get('posts', 'App\Http\Controllers\PostController@index')->name('posts.index');
Route::post('posts', 'App\Http\Controllers\PostController@store')->name('posts.store');
Route::get('posts/showPage', 'App\Http\Controllers\PostController@showPostPage')->name('posts.showPage');

//Items
Route::get('items', 'App\Http\Controllers\ItemController@index')->name('items.index');
Route::post('items', 'App\Http\Controllers\ItemController@store')->name('items.store');
Route::get('items/showPage', 'App\Http\Controllers\ItemController@showItemPage')->name('items.showPage');

