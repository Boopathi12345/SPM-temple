<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('checking','App\Http\Controllers\PoosarifamilytreeController@checking');

Route::get('mail','App\Http\Controllers\PoosarifamilytreeController@mail');

Route::post('addAdminrole','App\Http\Controllers\RoleController@addData');

// UserDetails
Route::post('adduser','App\Http\Controllers\UserDetailsController@create');
Route::post('edituser','App\Http\Controllers\UserDetailsController@update');
Route::get('ActiveUserValue','App\Http\Controllers\UserDetailsController@ActiveUserValue');
Route::delete('DestroyUser','App\Http\Controllers\UserDetailsController@destroy');
Route::get('INActiveUser','App\Http\Controllers\UserDetailsController@INActiveUser');
Route::get('Emailchecking','App\Http\Controllers\UserDetailsController@Emailchecking');
// Festival
Route::post('addfestval','App\Http\Controllers\FestivalController@create');
Route::get('ShowFestval','App\Http\Controllers\FestivalController@show');
Route::post('editfestval','App\Http\Controllers\FestivalController@update');
Route::get('FestivelValue','App\Http\Controllers\FestivalController@check');
Route::delete('DeleteFestival','App\Http\Controllers\FestivalController@destroy');

// Events
Route::post('addevents','App\Http\Controllers\EventsController@create');
Route::get('Showevents','App\Http\Controllers\EventsController@show');
Route::post('editevents','App\Http\Controllers\EventsController@update');
Route::get('EventsValue','App\Http\Controllers\EventsController@check');
Route::delete('DeleteEvents','App\Http\Controllers\EventsController@destroy');


// poosari_family 
Route::get('Poosarisview','App\Http\Controllers\PoosarifamilytreeController@show');
Route::post('AddPoosari','App\Http\Controllers\PoosarifamilytreeController@create');
Route::get('EditviewPoosari','App\Http\Controllers\PoosarifamilytreeController@editshowvalue');
Route::post('Editdpoosari','App\Http\Controllers\PoosarifamilytreeController@update');
Route::delete('deletepoosari','App\Http\Controllers\PoosarifamilytreeController@destroy');

// Dharmagarth family tree
Route::get('Dharmagarthasview','App\Http\Controllers\DharmagarthaController@show');
Route::post('AddDharmagartha','App\Http\Controllers\DharmagarthaController@create');
Route::get('EditviewDharmagartha','App\Http\Controllers\DharmagarthaController@editshowvalue');
Route::post('EditdDharmagartha','App\Http\Controllers\DharmagarthaController@update');
Route::delete('deleteDharmagartha','App\Http\Controllers\DharmagarthaController@destroy');

// Route::get('mail','App\Http\Controllers\PoosarifamilytreeController@mail');  

 // role
Route::post('addrole','App\Http\Controllers\RoleController@addData');
Route::get('ShowroleAll','App\Http\Controllers\RoleController@showRole');
Route::get('RoleValue','App\Http\Controllers\RoleController@get_input');
Route::delete('deleteRole','App\Http\Controllers\RoleController@destroy');
Route::get('showrole','App\Http\Controllers\RoleController@store');
Route::post('updateRole','App\Http\Controllers\RoleController@update');
Route::get('permissonfullvalue','App\Http\Controllers\PermissonController@PermissonFullvalue');
 
 
 // blog
Route::post('addBlog','App\Http\Controllers\BlogController@create');
Route::get('showBlog','App\Http\Controllers\BlogController@show');
Route::post('editBlog','App\Http\Controllers\BlogController@update');
Route::get('blogValue','App\Http\Controllers\BlogController@check');
Route::delete('deleteBlog','App\Http\Controllers\BlogController@destroy');
 
  // Gallery 
Route::post('addGallery','App\Http\Controllers\GalleryController@create');
Route::get('showGallery','App\Http\Controllers\GalleryController@show');
Route::post('editGallery','App\Http\Controllers\GalleryController@update');
Route::get('galleryValue','App\Http\Controllers\GalleryController@check');
Route::delete('deleteGallery','App\Http\Controllers\GalleryController@destroy');
  
Route::post('addPayment','App\Http\Controllers\PaymentController@create');
Route::get('showPayment','App\Http\Controllers\PaymentController@show');
Route::post('editPayment','App\Http\Controllers\PaymentController@update');
Route::get('paymentValue','App\Http\Controllers\PaymentController@check');
Route::delete('deletePayment','App\Http\Controllers\PaymentController@destroy');
Route::get('DashboardChart','App\Http\Controllers\PaymentController@monthchart');
Route::get('DashboardCount','App\Http\Controllers\PaymentController@DashboardCount');
// Expenses
Route::get('ShowExpenses','App\Http\Controllers\ExpensesController@show');
Route::post('AddExpenses','App\Http\Controllers\ExpensesController@create');
Route::get('EditviewExpenses','App\Http\Controllers\ExpensesController@editshowvalue');
Route::post('EditExpenses','App\Http\Controllers\ExpensesController@update');
Route::delete('DeleteExpenses','App\Http\Controllers\ExpensesController@destroy');
Route::get('Nologinuser','App\Http\Controllers\UserDetailsController@Nologinuser');
