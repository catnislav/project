<x-layout :$title>
    <div>
        <p class="mt-2">
            Description: {{ $idea->description }}
        </p>
        <p class="mt-2">
            State: {{ $idea->state }}
        </p>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-2">
        <a href="/ideas" class="btn btn-ghost mr-auto">Back</a>
        <a href="/ideas/{{ $idea->id }}/edit" class="btn btn-primary">Edit</a>
        <form action="/ideas/{{ $idea->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
</x-layout>
