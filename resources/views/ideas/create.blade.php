<x-layout :$title>
    <h1>{{ $title }}</h1>
    <x-form.index method="POST" action="/ideas" buttonText="Save">
        <p class="mt-3 text-sm/6 text-gray-600">Have an idea you want to save for later ?</p>
    </x-form.index>
</x-layout>