<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * test users endpoint
     *
     * @test
     * @return void
     */
    public function it_can_get_all_users()
    {
        $response = $this->json('GET', 'api/v1/users');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_can_save_a_user()
    {
        $payload = [
            'username' => $this->faker->name,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->json('POST', 'api/v1/users', $payload);

        $response->assertStatus(200);

        $this->assertDatabaseCount('users', 1);
    }

     /**
     * @test
     */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $payload = [
            'username' => $this->faker->name,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $user->email,
        ];


        $response = $this->json('PUT', 'api/v1/users/' . $user->id, $payload );

        $response->assertStatus(200);
    }

     /**
     * @test
     */
    public function it_can_delete_a_user()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $response = $this->json('DELETE', 'api/v1/users/' . $user->id,);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }

     /**
     * @test
     */
    public function it_can_search_a_user_by_username()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $response = $this->json('GET', 'api/v1/users/search/' . $user->username,);

        $response->assertStatus(200);

    }
}
