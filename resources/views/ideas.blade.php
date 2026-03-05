<x-layout :$title>
    <h1>{{ $title }}</h1>
    <x-form />
    @if (count($ideas))
        <div class="mt-6">
            <h2 class="text-lg font-medium">Saved Ideas</h2>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($ideas as $idea)
                    <li>{{ $idea }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-layout>
