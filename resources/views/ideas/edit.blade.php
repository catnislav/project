<x-layout :$title>
    <h1>{{ $title }}</h1>
    <x-form.index method="PATCH" action="/ideas/{{ $idea->id }}" buttonText="Update" :value="$idea->description" />
</x-layout>