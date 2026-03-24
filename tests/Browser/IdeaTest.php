<?php

use App\Models\User;

it('shows all ideas', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $user->ideas()->create([
        'description' => 'Build a thing',
    ]);

    visit('/ideas')
        ->assertSee('Build a thing');
});

// it('shows a single idea', function () {
//     //
// });

// it('shows an edit form to update a single idea', function () {
//     //
// });
