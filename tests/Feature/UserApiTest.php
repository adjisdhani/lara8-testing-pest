<?php

use Illuminate\Support\Facades\Hash;
use App\Models\User;

it('creates a new user successfully', function () {
    $payload = [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'password' => 'password',
    ];

    $response = $this->postJson('/api/users', $payload);

    $response->assertStatus(201)
             ->assertJsonStructure([
                 'id',
                 'name',
                 'email',
                 'created_at',
                 'updated_at',
             ]);

    $this->assertDatabaseHas('users', [
        'email' => 'johndoe@example.com',
    ]);
});

it('fails to create user with invalid data', function () {
    $payload = [
        'name' => '',
        'email' => 'invalid-email',
        'password' => '',
    ];

    $response = $this->postJson('/api/users', $payload);

    $response->assertStatus(422)
             ->assertJsonValidationErrors(['name', 'email', 'password']);
});

it('prevents creating a user with duplicate email', function () {
    User::create([
        'name' => 'Existing User',
        'email' => 'existing@example.com',
        'password' => Hash::make('password'),
    ]);

    $payload = [
        'name' => 'New User',
        'email' => 'existing@example.com',
        'password' => 'password',
    ];

    $response = $this->postJson('/api/users', $payload);

    $response->assertStatus(422)
             ->assertJsonValidationErrors(['email']);
});
