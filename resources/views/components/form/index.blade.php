<form method="{{ $method === 'PATCH' ? 'POST' : $method }}" action="{{ $action }}">
    @csrf
    @if($method === 'PATCH')
        @method('PATCH')
    @endif
    <div class="col-span-full">
        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
        <div class=" mt-2">
            <textarea id="description" name="description" rows="3"
                class="textarea w-full @error('description') textarea-error @enderror">{{ $value ?? '' }}</textarea>

            <x-form.error name="description" />
        </div>
    </div>

    <div>{{ $slot }}</div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</form>