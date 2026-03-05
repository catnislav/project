<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', ['title' => 'Welcome']);
Route::view('/about', 'about', ['title' => 'About']);
Route::view('/contact', 'contact', ['title' => 'Contact']);

Route::get('/ideas', function () {
    $ideas = session('ideas', []); // Get ideas from session, default to empty array
    return view('ideas', ['title' => 'Ideas', 'ideas' => $ideas]);
});
Route::post('/ideas', function (Illuminate\Http\Request $request) {
    // dd(request()->all()); // all fields
    $idea = request('idea'); // only the 'idea' field
    // $idea2 = \Illuminate\Support\Facades\Request::input('idea');
    // $idea3 = $request->idea;
    session()->push('ideas', $idea);
    return redirect('/ideas');
});
Route::get('/ideas/delete', function () {
    session()->forget('ideas');
    return redirect('/ideas');
});
