<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use App\Notifications\IdeaPublished;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $ideas = Idea::where('user_id', Auth::id())->get();

        return view('ideas.index', ['title' => 'Ideas', 'ideas' => Auth::user()->ideas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create', ['title' => 'Create Idea']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)
    {
        // $request->validate([
        //     'description' => ['required', 'min:5', 'max:255'],
        // ]);

        // Idea::create(['description' => $request->description, 'state' => 'pending', 'user_id' => Auth::id()]);

        $idea = Auth::user()->ideas()->create(['description' => $request->description, 'state' => 'pending']);

        // Notify admins about new idea
        Auth::user()->notify(new IdeaPublished($idea));

        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        Gate::authorize('view', $idea);

        // if (Auth::user()->cannot('view', $idea)) {
        //     abort(404);
        // }

        return view('ideas.show', ['title' => 'Your idea', 'idea' => $idea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        // Gate::authorize('view', $idea);

        return view('ideas.edit', ['title' => 'Edit your idea', 'idea' => $idea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        $idea->update(['description' => $request->description]);

        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect('/ideas');
    }
}
