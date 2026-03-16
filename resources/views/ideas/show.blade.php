<x-layout :$title>
    <div>
        <p class="mt-2">
            Description: {{ $idea->description }}
        </p>
        <p class="mt-2">
            State: {{ $idea->state }}
        </p>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/ideas/{{ $idea->id }}/edit" class="text-sm/6 font-semibold text-gray-900">Edit</a>
        <form action="/ideas/{{ $idea->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 cursor-pointer">Delete</button>
        </form>
    </div>
</x-layout>