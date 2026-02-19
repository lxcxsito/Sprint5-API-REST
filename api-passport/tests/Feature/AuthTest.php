<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use Laravel\Passport\ClientRepository;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear Personal Access Client de Passport en la BD de testing
        $clientRepository = new ClientRepository();
        $clientRepository->createPersonalAccessClient(
            null,
            'Test Personal Access Client',
            'http://localhost'
        );
    }

    /** @test */
    public function user_can_register_successfully()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Lucas',
            'email' => 'lucas@example.com',
            'password' => 'secret123'
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'user' => ['id', 'name', 'email'],
                     'token'
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => 'lucas@example.com'
        ]);
    }

    /** @test */
    public function registration_fails_with_existing_email()
    {
        User::create([
            'name' => 'Lucas',
            'email' => 'lucas@example.com',
            'password' => Hash::make('secret123')
        ]);

        $response = $this->postJson('/api/register', [
            'name' => 'Lucas2',
            'email' => 'lucas@example.com',
            'password' => 'secret123'
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email']);
    }

    /** @test */
    public function registration_fails_with_short_password()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Lucas',
            'email' => 'lucas2@example.com',
            'password' => '123'
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['password']);
    }

    /** @test */
    public function user_can_login_successfully()
    {
        User::create([
            'name' => 'Lucas',
            'email' => 'lucas@example.com',
            'password' => Hash::make('secret123')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'lucas@example.com',
            'password' => 'secret123'
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'user' => ['id', 'name', 'email'],
                     'token'
                 ]);
    }

    /** @test */
    public function login_fails_with_wrong_password()
    {
        User::create([
            'name' => 'Lucas',
            'email' => 'lucas@example.com',
            'password' => Hash::make('secret123')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'lucas@example.com',
            'password' => 'wrongpassword'
        ]);

        $response->assertStatus(401)
                 ->assertJson(['message' => 'Credenciales incorrectas']);
    }

    /** @test */
    public function protected_route_requires_authentication()
    {
        // Llamamos a /api/user que está protegida por auth:api
        $response = $this->getJson('/api/user');

        $response->assertStatus(401);
    }

    /** @test */
    public function authenticated_user_can_access_protected_route()
    {
        $user = User::create([
            'name' => 'Lucas',
            'email' => 'lucas@example.com',
            'password' => Hash::make('secret123')
        ]);

        Passport::actingAs($user);

        $response = $this->getJson('/api/user');

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $user->id,
                     'email' => $user->email
                 ]);
    }

    /** @test */
    public function authenticated_user_can_logout()
    {
        $user = User::create([
            'name' => 'Lucas',
            'email' => 'lucas@example.com',
            'password' => Hash::make('secret123')
        ]);

        // Creamos token real para logout
        $token = $user->createToken('TestToken')->accessToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->postJson('/api/logout');

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Sesión cerrada']);
    }

    /** @test */
    public function logout_fails_for_unauthenticated_user()
    {
        $response = $this->postJson('/api/logout');

        $response->assertStatus(401);
    }
}
