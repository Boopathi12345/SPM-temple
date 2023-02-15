<?php

use Illuminate\Support\Facades\Route;

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
use App\Mail\MailPage;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::get('/mailpage', function () {
    return view('mailpage');
});
Route::get('/demo', function () {
    return view('demo');
});

// Route::get('/mail', function () {
//     return new MailPage();
// });

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/index', function () {
    return view('index');
})->middleware('auth');

Route::get('/role', function () {
    return view('role');
})->middleware('auth');

Route::get('/blogs', function () {
    return view('blogs');
})->middleware('auth');
Route::get('/gallery_page', function () {
    return view('gallery');
})->middleware('auth');
// Route::get('/gallery_page', function () {
//     return view('gallery');
// });
// Route::get('/demo', function () {
//     return view('demo');
// })->middleware('auth');
Route::get('/payment_page', function () {
    return view('payment');
})->middleware('auth');
Route::get('/adduser', function () {
    return view('adduser');
})->middleware('auth');
Route::get('/userlist', function () {
    return view('userlist');
})->middleware('auth');
Route::get('edituser/{id}', 'App\Http\Controllers\UserDetailsController@GetUserData')->middleware('auth');
Route::get('profile/{id}', 'App\Http\Controllers\UserDetailsController@ProfileData')->middleware('auth');

Route::get('/festivals', function () {
    return view('festival');
})->middleware('auth');
Route::get('/event', function () {
    return view('events');
})->middleware('auth');

Route::get('/poosaris', function () {
    return view('poosari');
})->middleware('auth');

Route::get('/dharmagarth', function () {
    return view('dharmagartha');
})->middleware('auth');

Route::get('/expenses', function () {
    return view('expenses');
})->middleware('auth');
Route::get('/', function () {
    return view('frontend_view.home');
});

Route::get('/frontend_view.home', function () {
    return view('frontend_view.home');
});


Route::get('/user/poosari', function () {
    return view('frontend_view.poosari');
});

Route::get('/user/dharmagartha', function () {
    return view('frontend_view.dharmagartha');
});
Route::get('/user/festival', function () {
    return view('frontend_view.festival');
});
Route::get('/user/events', function () {
    return view('frontend_view.events');
});
Route::get('/user/gallery', function () {
    return view('frontend_view.gallery');
});
Route::get('/user/blog', function () {
    return view('frontend_view.blogs');
});
Route::get('/user/contact', function () {
    return view('frontend_view.contact');
});
// Route::get('/user/festivaldetail_page', function () {
//     return view('frontend_view.festivaldetail_page');
// });
Route::get('/user/about_us', function () {
    return view('frontend_view.about_us');
});

Route::get('/user/festivaldetail_page/{id}', 'App\Http\Controllers\FestivalController@festival_view_page');

Route::get('/user/blogdetail_page/{id}', 'App\Http\Controllers\BlogController@blog_view_page');
Route::get('/user/eventsdetail_page/{id}', 'App\Http\Controllers\EventsController@events_view_page');
