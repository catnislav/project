<x-layout :$title>
    @if (count($ideas))
        <div>
            {{-- <h2 class="text-lg font-medium">Saved Ideas</h2> --}}
            <ul class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                @foreach ($ideas as $idea)
                    <li>
                        <div class="card card-border bg-base-100">
                            <div class="card-body">
                                <span class="badge badge-soft badge-primary ml-auto">
                                    {{ $idea->state }}
                                </span>
                                <h2 class="card-title hidden">Card Title</h2>
                                <a href="/ideas/{{ $idea->id }}" class="underline hover:no-underline">
                                    {{ $idea->description }}
                                </a>

                                <div class="card-actions justify-end hidden">
                                    <button class="btn btn-primary">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="flex items-center justify-end gap-x-6 mt-6">
                <a class="btn btn-primary" href="/ideas/create">Create a new idea</a>
            </div>
        </div>
    @else
        <p class="mt-3 text-sm/6 text-gray-600">No ideas created yet. <a href="/ideas/create"
                class="text-indigo-600 underline hover:text-indigo-500 hover:no-underline">Create a new one !</a></p>
    @endif
</x-layout>