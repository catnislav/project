<x-layout :$title>
    <h1 class="text-lg font-medium mt-6">{{ $title }}</h1>

    @if (count($ideas))
        <div class="mt-6">
            {{-- <h2 class="text-lg font-medium">Saved Ideas</h2> --}}
            <ul class="list-disc pl-5">
                @foreach ($ideas as $idea)
                    <li>
                        <a href="/ideas/{{ $idea->id }}" class="underline hover:no-underline">
                            {{ $idea->description }}
                        </a>
                        <span class="float-right">
                            {{ $idea->state }}
                        </span>

                    </li>
                @endforeach
            </ul>

            <div class="flex items-center justify-end gap-x-6 mt-6">
                <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    href="/ideas/create">Create a new idea</a>
            </div>
        </div>
    @else
        <p class="mt-3 text-sm/6 text-gray-600">No ideas created yet. <a href="/ideas/create"
                class="underline hover:no-underline">Create a new one !</a></p>
    @endif
</x-layout>