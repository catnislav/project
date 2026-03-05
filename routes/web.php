<?php

// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

Route::view('/', 'welcome', ['title' => 'Welcome']);
Route::view('/about', 'about', ['title' => 'About']);
Route::view('/contact', 'contact', ['title' => 'Contact']);

Route::get('/ideas', function () {
    // $ideas = session('ideas', []); // Get ideas from session
    // $ideas = DB::table('ideas')->get(); // Get ideas from database
    $ideas = Idea::all(); // Get ideas using Eloquent model
    // $ideas = Idea::where('state', 'pending')->get(); // Get only pending ideas
    // $ideas = Idea::query()->when(request('state'), function ($query, $state) {
    //     $query->where('state', $state);
    // })->get(); // Get only pending ideas using query builder

    return view('ideas', ['title' => 'Ideas', 'ideas' => $ideas]);
});
Route::post('/ideas', function (Illuminate\Http\Request $request) {
    // dd(request()->all()); // Get all fields
    $idea = request('idea'); // Get only the 'idea' field
    // $idea2 = \Illuminate\Support\Facades\Request::input('idea'); // Get only the 'idea' field using the Request facade
    // $idea3 = $request->idea; // Get only the 'idea' field using the request object
    // session()->push('ideas', $idea); // Save idea to session
    Idea::create(['description' => $idea, 'state' => 'pending']); // Save idea to database using Eloquent model
    return redirect('/ideas');
});
Route::get('/ideas/delete', function () {
    // session()->forget('ideas'); // Clear ideas from session
    Idea::truncate(); // Clear ideas from database using Eloquent model
    return redirect('/ideas');
});
