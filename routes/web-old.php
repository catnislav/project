<?php

// use Illuminate\Support\Facades\DB;
use App\Models\Idea;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', ['title' => 'Welcome']);
Route::view('/about', 'about', ['title' => 'About']);
Route::view('/contact', 'contact', ['title' => 'Contact']);

// Show ideas
Route::get('/ideas', function () {
    // $ideas = session('ideas', []); // Get ideas from session
    // $ideas = DB::table('ideas')->get(); // Get ideas from database
    $ideas = Idea::all(); // Get ideas using Eloquent model
    // $ideas = Idea::where('state', 'pending')->get(); // Get only pending ideas
    // $ideas = Idea::query()->when(request('state'), function ($query, $state) {
    //     $query->where('state', $state);
    // })->get(); // Get only pending ideas using query builder

    // return view('ideas/index', ['title' => 'Ideas', 'ideas' => $ideas]);
    return view('ideas.index', ['title' => 'Ideas', 'ideas' => $ideas]);
});

// Show idea by id
// Route::get('/ideas/{id}', function ($id) {
//     // $idea = Idea::where('id', $id)->first(); // Get idea by id using Eloquent model
//     $idea = Idea::findOrFail($id); // Get idea by id using Eloquent model (shortcut)

//     // if (is_null($idea)) {
//     //     abort(404); // Return 404 error if idea not found
//     // }

//     return view('ideas.show', ['idea' => $idea]);
// });

// Create idea
Route::get('/ideas/create', function () {
    return view('ideas.create', ['title' => 'Create Idea']);
});

// Store idea
Route::post('/ideas', function (Illuminate\Http\Request $request) {
    // $request->validate([
    //     'description' => ['required', 'min:5', 'max:255'],
    // ]);
    request()->validate([
        'description' => ['required', 'min:5', 'max:255'],
    ]);
    // dd(request()->all()); // Get all fields
    $idea = request('description'); // Get only the 'idea' field
    // $idea2 = \Illuminate\Support\Facades\Request::input('idea'); // Get only the 'idea' field using the Request facade
    // $idea3 = $request->idea; // Get only the 'idea' field using the request object
    // session()->push('ideas', $idea); // Save idea to session
    Idea::create(['description' => $idea, 'state' => 'pending']); // Save idea to database using Eloquent model

    return redirect('/ideas');
});

// Show idea
Route::get('/ideas/{idea}', function (Idea $idea) {
    return view('ideas.show', ['title' => 'Your idea', 'idea' => $idea]);
});

// Edit idea
Route::get('/ideas/{idea}/edit', function (Idea $idea) {
    return view('ideas.edit', ['title' => 'Edit your idea', 'idea' => $idea]);
});

// Update idea
Route::patch('/ideas/{idea}', function (Idea $idea) {
    $idea->update(['description' => request('description')]); // Update idea using Eloquent model

    return redirect("/ideas/{$idea->id}");
});

// Delete idea
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete(); // Delete idea using Eloquent model

    return redirect('/ideas');
});

// Delete all ideas
// Route::get('/ideas/delete', function () {
//     // session()->forget('ideas'); // Clear ideas from session
//     Idea::truncate(); // Clear ideas from database using Eloquent model

//     return redirect('/ideas');
// });
