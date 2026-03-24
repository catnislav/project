<?php

it('registers a new user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john.doe@example.com')
        ->fill('password', 'password')
        ->press('@register-button')
        ->assertSee('Welcome, John Doe');

    expect(auth()->user()->count())->toBe(1);
    expect(auth()->user()->name)->toBe('John Doe');
    expect(auth()->user()->email)->toBe('john.doe@example.com');
    expect(auth()->user()->password)->not()->toBe('password');

    $this->assertAuthenticated();
});
