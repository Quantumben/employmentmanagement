<?php

namespace Tests\Feature;

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
}
