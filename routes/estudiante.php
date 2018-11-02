<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('estudiante')->user();

    //dd($users);

    return view('estudiante.home');
})->name('home');

