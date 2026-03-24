<x-layout :$title>
    <form action="/register" method="POST">
        @csrf

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Register</legend>

            <label class="label">Name</label>
            <input type="text" class="input" placeholder="Name" name="name" required />
            <x-form.error name="name" class="mt-2" />

            <label class="label">Email</label>
            <input type="email" class="input" placeholder="Email" name="email" required />
            <x-form.error name="email" class="mt-2" />

            <label class="label">Password</label>
            <input type="password" class="input" placeholder="Password" name="password" required />
            <x-form.error name="password" class="mt-2" />

            <button class="btn btn-neutral mt-4" data-test="register-button">Register</button>
        </fieldset>
    </form>
</x-layout>
