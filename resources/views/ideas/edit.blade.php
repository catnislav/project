<x-layout :$title>
    <x-form.index method="PATCH" action="/ideas/{{ $idea->id }}" buttonText="Update" :value="$idea->description" />
</x-layout>