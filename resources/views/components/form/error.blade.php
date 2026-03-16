@props([
    'name' => 'required',
])
@error($name)
    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
@enderror
{{-- @if ($errors->has('description'))
    <p class="mt-2 text-xs text-red-600">{{ $errors->first('description') }}</p>
@endif --}}
