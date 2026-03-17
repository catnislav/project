<x-layout :$title>
    <form action="/login" method="POST">
        @csrf

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Login</legend>

            <label class="label">Email</label>
            <input type="email" class="input" placeholder="Email" name="email" />
            <x-form.error name="email" class="mt-2" />

            <label class="label">Password</label>
            <input type="password" class="input" placeholder="Password" name="password" />
            <x-form.error name="password" class="mt-2" />

            <button class="btn btn-neutral mt-4">Login</button>
        </fieldset>

        <x-form.error class="mt-2" />
    </form>
</x-layout>