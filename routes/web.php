<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', ['title' => 'Welcome']);
Route::view('/about', 'about', ['title' => 'About']);
Route::view('/contact', 'contact', ['title' => 'Contact']);
