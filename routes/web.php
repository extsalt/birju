<?php

Route::get('/', function () {
    if (auth()->check()) return redirect('/dashboard');

    return view('welcome');
});


Route::get('/login', function () {
    if (auth()->check()) return redirect('/dashboard');

    return view('welcome');
});

Route::get('/register', function () {
    if (auth()->check()) return redirect('/dashboard');

    return view('register');
});

Route::post('/login', 'LoginController@login')->name('login');
Route::post('/register', 'RegisterController@register');

Route::get('/dashboard', 'DashboardController@index')->name('home');

Route::get('/logout', function () {
    if (auth()->check()) {

        auth()->logout();

        return back()->with('success', 'Logged out.');
    }

    return back()->with('danger', 'wtf! what you trying to do nigga!');
});

Route::post('/apps', 'AppController@store');

Route::post('/posts', 'PostController@store');


Route::get('/posts', function () {
    return view('post');
});

Route::get('/timeline', function () {
    return \App\Post::query()->with('photos')->latest()->get();
});

Route::get('/birju', function () {
    return view('birju.index');
});

Route::post('/birju/process', function () {
    return request()->all();
});

Route::post('/birju/optimise', 'PhotoOptimiseController@optimise');
